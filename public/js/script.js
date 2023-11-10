$(document).ready(function(){
    

        $('.select2js').select2({
            dropdownParent: $("#issueBookModal"),
            width: '100%'
        });

    $('#searchStudent').on('click', function(e){
        e.preventDefault();
    
        var student_id = $("#stuId").val();
    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/checkout-book/" + student_id,
            type: "POST",
            data: { student_id: student_id },
            dataType: "json",
            success: function(response) {
                alert(JSON.stringify(response));
            },
            error: function(xhr, status, error) {
                if (xhr.responseJSON && xhr.responseJSON.error) {
                    alert(xhr.responseJSON.error);
                } else {
                    alert("An error occurred: " + error);
                }
            }
        });
        
        
    });
    
});