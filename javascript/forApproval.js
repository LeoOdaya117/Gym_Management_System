$(document).ready(function() {
    $('#example').on('click', '.delete-button', function() {
        // Get the delete type and ID from data attributes
        const deleteType = $(this).data('delete-type');
        const deleteID = $(this).data('delete-id');

        // Show a confirmation SweetAlert with a dynamic message
        Swal.fire({
            title: 'Confirm Rejection',
            text: `Are you sure you want to Reject this ${deleteType}?`,
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
                                text: "User Deleted successfully!",
                                showConfirmButton: true,
                            }).then(function () {
                                window.location.href = "forapproval.php";
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

$(document).ready(function() {
    $('#example').on('click', '.approve-button', function() {
        
        const user_ID = $(this).data('approve-id');

        // Show a confirmation SweetAlert with a dynamic message
        Swal.fire({
            title: 'Confirm Approval',
            text: `Are you sure you want to Approved this User?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: `Yes`
        }).then((result) => {
            if (result.isConfirmed) {
                // Send AJAX request to approve.php
                $.ajax({
                    type: 'POST',
                    url: 'approve.php',
                    data: { id: user_ID},
                    success: function (response) {
                        if (response === 'success') {
                            //alert('Account approved successfully!');
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Account approved successfully!",
                                showConfirmButton: true,
                            }).then(function () {
                              window.location.href = 'forapproval.php';
                            });
                            // You can update the UI or perform additional actions here
                            
                        } else {
                            alert('Failed to approve account!');
                            Swal.fire({
                                icon: "error",
                                title: "Result",
                                text: response,
                                showConfirmButton: true,
                            }).then(function () {
                              
                            });
                        }
                    },
                    error: function () {
                        alert('Error in AJAX request!');
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