$(document).ready(function() {
    $('#example').on('click', '.delete-button', function() {

        const deleteID = $(this).data('delete-id');

        // Show a confirmation SweetAlert with a dynamic message
        Swal.fire({
            title: 'Confirm Rejection',
            text: `Are you sure you want to cancel this?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: `Yes, cancel it`
        }).then((result) => {
            // if (result.isConfirmed) {
            //     window.location.href = `delete.php?delete_${deleteType}_id=${deleteID}`;
            // }

            if (result.isConfirmed) {
                // Use AJAX to cancel the subscription without reloading the page
                $.ajax({
                    type: 'POST',
                    url: 'cancel_transaction.php',
                    data: { salesID: deleteID },
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire('Cancelled!', 'Transaction has been cancelled.', 'success')
                            .then(function () {
                                window.location.href = 'paymentrequest.php';
                            });
                        } else {
                            Swal.fire('Error', response , 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error', 'Failed to cancel subscription.', 'error');
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

new DataTable('#example');
});