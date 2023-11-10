$(document).ready(function(){


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


    //--- Delete Student
    $("#studentTable").on('click', '.delete_student', function(){

        var id = $(this).attr('data-id');
        var obj = $(this);
        if(confirm('Are you sure?')){
            $.ajax({
                url: 'delete-student/'+id,
                type: 'GET',
                success: function(res){
                    if(res.status == 'success'){
                        toastr.success(res.message, 'Success', {timeOut: 5000});
                        var row = $(obj).closest('tr');
                        $('#studentTable').dataTable().fnDeleteRow(row);
                    }else{
                        toastr.error(res.message, 'Error', {timeOut: 5000});
                    }
                    console.log(res);
                },
                error: function(res){
                    toastr.error('Something went wrong', 'Error', {timeOut: 5000});
                    console.log(res);
                }
            });
        };

    });


    //--- Add New Student
    $("#newStudentFrom").on('submit', function(e){
        e.preventDefault();

        var formData = $(this).serialize();
        
        $.ajax({
            url: '/add-studentPost',
            type: 'POST',
            data: formData,
            dataType: 'json',
            beforeSend: function(){
                $("#saveNewStudent").html("Wait <i class='fas fa-spinner fa-spin'></i>").attr('disabled', true);
               },
            success: function(data){
                table = $("#studentTable").DataTable();
                table.row.add([
                    data.student.id,
                    data.student.name,
                    data.student.email,
                    data.student.class,
                    '0',
                    '<span class="badge badge-sm badge-success">Active</span>',
                    '<a href="{{ route(`edit.student`, ``) + data.student.id }}" class="btn btn-link"><i class="fa-solid fa-pen-to-square"></i></a> <a href="javascript:void(0)" class="btn btn-link delete_student" data-id=" ' + data.student.id + '"><i class="fa-solid fa-trash text-danger"></i></a>',
                    ]).draw();
                // $("#studentTable tbody").prepend(`
                //     <tr>
                //         <td>`+ data.student.id +`</td>
                //         <td>`+ data.student.name +`</td>
                //         <td>`+ data.student.email +`</td>
                //         <td>`+ data.student.class +`</td>
                //         <td>0</td>
                //         <td>
                //         <span class="badge badge-sm badge-success">
                //         Active
                //         </span>
                //         </td>
                //         <td>
                //             <a href="{{ route('edit.student', '') + data.student.id }}" class="btn btn-link">
                //                 <i class="fa-solid fa-pen-to-square"></i>
                //             </a>
                //             <a href="javascript:void(0)" class="btn btn-link delete_student" data-id="`+ data.student.id +`">
                //                 <i class="fa-solid fa-trash text-danger"></i>
                //             </a>
                //         </td>
                //     </tr>
                // `);

                toastr.success(data.message, 'Success',  {timeOut: 5000});
                $('#addStudentModal').modal('hide');
                $("#saveNewStudent").html("Save User").attr('disabled', false);
                emptyFormFields();
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
                    $("#saveNewStudent").html("Save User").attr('disabled', false);
                } else {
                    alert('Something went wrong.');
                }
            }

        });

    });


});