$(document).ready(function(){
    

    // --- Checkout Books Search

    $("#checkoutBookSearch").on('submit', function(e){
        e.preventDefault();

        var formData = $(this).serialize();

        if($("#stuId").val() == ''){
            toastr.error('Please search with Name or ID', 'Field Empty', {timeOut: 5000});
            return false;
        }
        
        
        $.ajax({
            url: 'checkout-bookSearch',
            type: 'post',
            data: formData,
            beforeSend: function(){
                $("#checkoutBooksSeachBtn").text('Searching...').attr('disabled', true);
            },
            success: function(data){

                if(data.status == "error"){
                    toastr.error(data.message, {timeOut: 5000});
                    $("#checkoutBooksSeachBtn").text('Search').attr('disabled', false);
                    $("#studentsDetailsOptions").empty().append(data.stuHTML);
                    $("#bookIusseDiv").hide();
                    $("#bookIssueTable tbody").empty()

                }else{
                toastr.info(data.message, {timeOut: 5000});    
                $("#studentsDetailsOptions").empty().append(data.stuHTML);
                $("#bookIusseDiv").show('inline');
                $("#bookIssueTable tbody").empty().append(data.html);
                $("#bookIssueTable").DataTable();
                $("#checkoutBooksSeachBtn").text('Search').attr('disabled', false);
                $("#fineAmountDays").html("Rs"+data.finefromSettings.fine_amount +"/"+data.finefromSettings.fine_days+"Days");
                }
            },
            error: function(data){
                $("#checkoutBooksSeachBtn").text('Search').attr('disabled', false);
                toastr.error(data.message, 'Not Found', {timeOut: 5000});
                // $("#studentsDetailsOptions").empty();
                $("#bookIusseDiv").hide();
            }
        });

    });


    // --- Get Books Details for Modal drop down options
    $(document).on('click', '.IssueBookBtn', function(){
        $("#issueBookModal").modal({backdrop: false}).modal("show");
       $.ajax({
        url: '/get-books',
        type: 'get',
        success: function(data){
            $("#bookTitle").empty().append(data.options);
        },
        error: function(){
          toastr.error("Something went wrong!", 'Error', {timeOut: 5000});     
        }
       });  
    });

    // --- Save Issue Book
    $("#bookIssueForm").on('submit', function(e){
        e.preventDefault();
        var bookid = $('.select2js').find(':selected').val();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var stu_id = $(".IssueBookBtn").attr('data-stuID');
        $.ajax({
            url: "issue-bookPost",
            type: 'post',
            data: {'book_id':bookid, 'stu_id': stu_id},
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            beforeSend: function (){
              $('#IsuseBookSaveBtn').html("Issuing <i class='fas fa-spinner fa-spin'></i>").prop('disabled', true)
            },
            success: function(data){
               if(data.status == "success"){
                toastr.success(data.message, 'Success', {timeOut: 3000});
                $("#issueBookModal").modal("hide");
                 $('#IsuseBookSaveBtn').text('Issue Book').prop('disabled', false)
                 $("#bookIusseDiv").show('inline');
                 var table = $('#bookIssueTable').DataTable();
                 table.row.add([
                    data.html.id,
                    data.html.isbn,
                    data.html.title,
                    data.html.created_at,
                    '', '0', '<span class="Badge badge-warning">Issued</span>',
                    '<a class="btn btn-warning btn-sm bookReturnBtn" data-id="' + data.html.id + '"><i class="fas fa-arrow-circle-left"></i> Return</a>'
                 ]).draw();
                 
               }else{
                toastr.error(data.message, "Error", {timeOut: 5000});
                $('#IsuseBookSaveBtn').text('Issue Book').prop('disabled', false)
               }
            }
    });
});


    // --- Book Return 
    $(document).on('click', '.bookReturnBtn', function(){
        var id = $(this).attr('data-id');
        var obj = $(this);

        if(confirm('Are you sure want to return book?')){
        $.ajax({
            url: '/return-book/'+id,
            type: 'get',
            beforeSend: function(){
                $(obj).html("Wait <i class='fas fa-spinner fa-spin'></i>").attr('disabled', true);
            },
            success: function(data){
                if(data.status == 'success'){
                toastr.success(data.message, 'Success', {timeOut: 5000});
                console.log(data);
                var row = $(obj).closest('tr');
                // $('#bookIssueTable').DataTable().fnDeleteRow(row);
                row.find('td:eq(4)').text(data.bookinf.date_return);
                row.find('td:eq(5)').text(data.bookinf.fine_amount);
                row.find('td:eq(6)').html('<span class="badge badge-success badge-sm">Returned</span>');
                row.find('td:eq(7)').html('<button class="btn btn-secondary btn-sm disabled"><i class="fa-solid fa-circle-check"></i> Done</button>');
                }else{
                toastr.error(data.message, 'Error', {timeOut: 5000});
                }
            },
            error: function(data){
                toastr.error(data.message, 'Error', {timeOut: 5000});
                console.log(data);
            },
            complete: function(){
                $(obj).html("<i class='fas fa-arrow-circle-left'></i> Return</a>").attr('disabled', false);
            }
        });
    }
});

// --- end of the document
});