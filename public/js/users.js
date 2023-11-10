$(document).ready(function(){

    $("#studentTable").DataTable();

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
       }


    //-- Update the User table
    function updateUserTable(){
        var updateRoute = $('#updateTableRoute').val();
        $.ajax({
            url: updateRoute, 
            beforeSend: function () {
                $('#userTable tbody').append('<tr><td colspan="5" class="text-center">Please wait, data loading...</td></tr>');
            },            
            success: function(data){
                $('#userTable tbody').empty();
                $('#userTable tbody').append(data);
                $('#userTable').DataTable();
            }
        });
    };



    //-- Empty the form fields
    function emptyFormFields() {
        $("input[type=text]").val("");
        $("input[type=number]").val("");
        $("input[type=password]").val("");
        $("input[type=file]").val("");
        $("input[type=checkbox]").val("");
        $("input[type=date]").val("");
        $("input[type=time]").val("");
        $("input[type=tel]").val("");
        $("input[type=email]").val("");

    };  

    

    //--- Store the new user data ---
    $('#newUserFrom').on('submit', function(e){


        e.preventDefault();

        var formData = $(this).serialize();

        // Store data in ajax
        $.ajax({
           type: "post",
           url: $(this).attr('action'),
           data: formData,
           dataType: "json",
           beforeSend: function(){
            $("#saveNewUser").html("Wait <i class='fas fa-spinner fa-spin'></i>").attr('disabled', true);
           },
           success: function(data){

            //--- Empty and close the modal
            emptyFormFields();
            $("#addUserModal").modal('hide');
            $("#saveNewUser").html("Save User").attr('disabled', false);
            toastr.success('User added successfully!', 'Success', {timeOut: 5000});
            
            //--- Update the table with new row
            var table = $("#userTable").dataTable();
            table.row.add([
                data.user.id,
                data.user.name,
                data.user.email,
                '<span class="badge badge-success badge-sm">Active</span>',
                `<a href='javascript:void(0)' data-toggle='tooltip' title='Edit' class='btn btn-link edit_data' id='` + data.user.id + `' data-original-title='Edit'><i class='fa fa-edit'></i></a>
                <a href='javascript:void(0)' data-toggle='tooltip' title='Delete' class='btn btn-link delete_user' id='` + data.user.id + `' data-original-title='Delete'><i class='fa fa-trash text-danger'></i></a>`
            ]).draw();
           },

           error: function(data){
            if(data.status === 422){
                var errors = data.responseJSON.errors;
                var errorsHtml = '<ul>';
                $.each( errors, function( key, value ) {
                    errorsHtml += '<li>' + value[0] + '</li>';
                }); 
                errorsHtml += '</ul>';
                toastr.error(errorsHtml, 'Error', {timeOut: 5000});
                $("#saveNewUser").html("Save User").attr('disabled', false);
            } else {
                alert('Something went wrong.');
            }
        }
       });
    });
    //--- End of storing the new user data ---


    // -- Delete User ---
    $(document).on('click', '.delete_user', function(){
        if (confirm("Are you sure?")) 
        {
            var id = $(this).attr('id');
            var obj = $(this);
            $.ajax({
                type:'GET',
                // add route delete.user
                url: "user-destroy/"+id,
                success:function(response)
                {
                    if(response.status == "error"){
                        toastr.error(response.message, 'Error', {timeOut: 5000});
                    }else{
                        toastr.success('User delete successfully!', 'Success', {timeOut:5000})
                        var row = $(obj).closest('tr');
                        $('#userTable').dataTable().fnDeleteRow(row);
                    }
                },
                error: function(e)
                {
                    toastr.error('Something went wrong!', 'Error', {timeOut:5000})
                    console.log(e)
                }
            })
        }
    });


    // --- Update Settings
    $('#updateSettingsForm').on('submit', function(e){
        e.preventDefault();

        var formData = $(this).serialize();

        if(confirm('Are you sure want to update settings?'))
            {
                $.ajax({
                    url:'save-settings',
                    type: 'post',
                    data: formData,
                    beforeSend: function()
                    {
                        $('#updateSettingsBtn').text('Updating...').attr('disabled', true);
                    },
                    success: function(res){
                        toastr.success(res.message, 'Success', {timeOut:5000});
                        $('#updateSettingsBtn').text('Save Settings').attr('disabled', false);
                    },
                    error: function(res){
                        toastr.error(res.message, 'Error', {timeOut: 5000});
                        $('#updateSettingsBtn').text('Save Settings').attr('disabled', false);
                    }
                });
            }    
});


     // --- Load the function On Page Load ---
     updateUserTable();
});