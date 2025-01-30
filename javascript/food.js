$(document).ready(function() {
    $.fn.dataTable.ext.errMode = 'throw';
    var table = $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                text: '<i class="fa-solid fa-copy"></i>',
                className: 'dt-button copy-button',
                titleAttr: 'Copy',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4]
                }
            },
            {
                extend: 'excelHtml5',
                text: '<i class="fa-solid fa-file-excel"></i>',
                className: 'dt-button excel-button',
                titleAttr: 'Export as Excel',
                customize: function(excel) {
                    const currentDate = new Date();
                    const formattedDate = currentDate.toLocaleDateString();
                    const currentTime = currentDate.toLocaleTimeString();
                    const dateTime = `Date: ${formattedDate} Time: ${currentTime}`;

                    // Add the date and time as a comment at the end of the CSV
                    return excel;
                },
                filename: function() {
                    const currentDate = new Date();
                    const formattedDate = currentDate.toLocaleDateString().replace(/\//g, '');
                    const currentTime = currentDate.toLocaleTimeString().replace(/:/g, '').replace(/\s/g, '');

                    return 'ListOfFoods_' + formattedDate + currentTime;
                },
                exportOptions: {
                    columns: [0, 1, 2, 3, 4]
                }
            },
            {
                extend: 'csvHtml5',
                text: '<i class="fa-solid fa-file-csv"></i>',
                className: 'dt-button csv-button',
                title: '',
                titleAttr: 'Export as CSV',
                customize: function(csv) {
                    const currentDate = new Date();
                    const formattedDate = currentDate.toLocaleDateString();
                    const currentTime = currentDate.toLocaleTimeString();
                    const dateTime = `Date: ${formattedDate} Time: ${currentTime}`;

                    // Add the date and time as a comment at the end of the CSV
                    return csv;
                },
                filename: function() {
                    const currentDate = new Date();
                    const formattedDate = currentDate.toLocaleDateString().replace(/\//g, '');
                    const currentTime = currentDate.toLocaleTimeString().replace(/:/g, '').replace(/\s/g, '');

                    return 'ListOfFoods_' + formattedDate + currentTime;
                },
                exportOptions: {
                    columns: [0, 1, 2, 3, 4]
                }
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fa-solid fa-file-pdf"></i>',
                className: 'dt-button pdf-button',
                title: 'List of Foods',
                titleAttr: 'Export to PDF',
                customize: function(doc) {
                const currentDate = new Date();
                const formattedDate = currentDate.toLocaleDateString();
                const currentTime = currentDate.toLocaleTimeString();
                const dateTime = `Date: ${formattedDate} Time: ${currentTime}`;

                // Add the date and time as a comment at the end of the PDF
                doc.content.push({
                    text: dateTime,
                    fontSize: 10,
                    margin: [0, 0, 0, 12], // Adjust margin as needed
                    alignment: 'center',
                });
                },
                filename: function() {
                const currentDate = new Date();
                const formattedDate = currentDate.toLocaleDateString().replace(/\//g, '');
                const currentTime = currentDate.toLocaleTimeString().replace(/:/g, '').replace(/\s/g, '');

                return 'ListOfFoods_' + formattedDate + currentTime;
                },
                exportOptions: {
                    columns: [0, 1, 2, 3, 4]
                }
            }
        ]
    });
});


$(document).ready(function() {
    $('#example').on('click', '.delete-button', function() {
        // Get the delete type and ID from data attributes
        const deleteType = $(this).data('delete-type');
        const deleteID = $(this).data('delete-id');

        // Show a confirmation SweetAlert with a dynamic message
        Swal.fire({
            title: 'Confirm Delete',
            text: `Are you sure you want to delete this ${deleteType}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: `Yes, delete ${deleteType}`
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
                                text: "Food Deleted successfully!",
                                showConfirmButton: true,
                            }).then(function () {
                                window.location.href = "Food.php";
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
    $('#food-form').submit(function (event) { 
        
        event.preventDefault();                 
        var form = document.getElementById('food-form'); 
        var formData = new FormData(form); 


        Swal.fire({
            title: 'Confirm Saving',
            text: `Are you sure you want to Add this ?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: `Yes, save it`
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({ 

                    url: 'admin/api/insert_food.php', 
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
                                text: "Food Added Successful",
                                showConfirmButton: true,
                            }).then(function () {
                                window.location.href = "Food.php";
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
// window.onload = promptForPassword();