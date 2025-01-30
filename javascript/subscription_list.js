$(document).ready(function () {  
    $('#subcription-form').submit(function (event) { 
        
        event.preventDefault();                 
        var form = document.getElementById('subcription-form'); 
        var formData = new FormData(form); 


        Swal.fire({
            title: 'Confirm Data',
            text: `Are you sure you want to add this data?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: `Yes, save it`
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({ 

                    url: 'save_subscription.php', 
                    method: 'POST', 
                    data: formData, 
                    processData: false, 
                    contentType: false, 
                    success: function (response) {                       
                        response = response.trim();
                    if(response === "Success"){
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: "Subscription Plan Added successfully!",
                            showConfirmButton: true,
                        }).then(function () {
                            window.location.href = "subscription_list.php";
                        });
                    }
                    else{
                        Swal.fire({
                            icon: "info",
                            title: "Result",
                            text: response,
                            showConfirmButton: true,
                        });
                    }
                        
                    }
                    
                }); 
            }
        });
        
        

    }); 
}); 

$(document).ready(function() {
    $('#example').on('click', '.delete-button', function() {
        // Get the delete type and ID from data attributes
        const deleteType = $(this).data('delete-type');
        const deleteID = $(this).data('delete-id');

        // Show a confirmation SweetAlert with a dynamic message
        Swal.fire({
            title: 'Confirm Rejection',
            text: `Are you sure you want to Delete this?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: `Yes, delete it`
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "delete.php",
                    data: {
                        deleteType: deleteType,
                        deleteID: deleteID,
                    },
                    success: function (response) {

                        response = response.trim();
                        if(response === "Success"){
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Subsctription Deleted successfully!",
                                showConfirmButton: true,
                            }).then(function () {
                                window.location.href = "subscription_list.php";
                            });
                        }
                    
              
                    
                    },
                    error: function (error) {
                  
                        Swal.fire({
                            icon: "error",
                            title: "Result",
                            text: error,
                            showConfirmButton: true,
                        })
                    }
                });
            }
        });
    });
});



$(document).ready(function () {
    $.fn.dataTable.ext.errMode = 'throw';

    $('#example').DataTable();
    

});

function promptForPassword() {
    Swal.fire({
        title: 'Enter Password',
        input: 'password',
        inputAttributes: {
            autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Submit',
        cancelButtonText: 'Cancel',
        showLoaderOnConfirm: true,
        preConfirm: (password) => {
            // Perform Ajax call to verify password
            return $.ajax({
                url: 'admin/api/verify_password.php', // Replace with the URL of your PHP script for password verification
                type: 'POST',
                data: { password: password },
                dataType: 'json',
                success: function(response) {
                    if (response.valid) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Password Correct!',
                            text: 'You have been granted access.',
                            confirmButtonText: 'Close'
                        });
                        // Add your logic to redirect or show the content here
                    } else {
                        Swal.showValidationMessage('Incorrect password. Please try again.');
                    }
                }
            });
        },
        allowOutsideClick: false, // Prevent closing on click outside
        allowEscapeKey: false // Prevent closing with keyboard ESC key
    }).then((result) => {
        if (result.dismiss === Swal.DismissReason.cancel) {
            // Cancel button was clicked
            window.location.href = 'admin-index.php';
        }
    });
}






// Call the function to prompt for password when the page loads
// window.onload = promptForPassword;