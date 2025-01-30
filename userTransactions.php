<?php


session_start();

if (!isset($_SESSION['Username']) && !isset($_SESSION['IdNum']) ) {
  header("Location: index.php");
  exit();
}

if (isset($_GET['tab'])) {

    $_SESSION['currentTab'] = $_GET['tab'];
}

$userID = $_SESSION['IdNum'];
if(isset($_SESSION["AccountType"])){
    if($_SESSION["AccountType"] == "Admin"){
        include('includes/header.php');
        include('includes/navbar.php');
    }
    else{
        include('include_user/header.php');
        include('include_user/navbar.php');
        include('config.php');
    }
}

$idnum = $_SESSION['IdNum'];
$query = "SELECT * FROM membership WHERE membershipid = ?";
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $idnum); // Using the placeholder index 1 for the first parameter

$stmt->execute();
$membership = $stmt->fetch(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="cache-control" content="no-cache">
  <meta http-equiv="expires" content="0">
  <meta http-equiv="pragma" content="no-cache">

  <title>Trinos Gym Membership</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link rel="stylesheet" href="/css/myprofile.css">
  
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Arial', sans-serif;
    }
    .card {
      margin-bottom: 20px;
      border: 2px solid #343a40;
      border-radius: 10px;
    }
    .separator {
      border-top: 1px solid #dee2e6;
      margin: 20px 0;
    }




  </style>
</head>
<body>

<div class="container mt-4">
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h4 class="text-center mb-4">Pending Transaction</h4>
            </div>
            <div class="col-12 separator"></div>
            <div class="col-md-6" id="pendingTransactionsContainer">
                            

            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Add this script at the bottom of your HTML body -->
<script>
    // Function to fetch pending transactions using AJAX
    function fetchPendingTransactions() {
            $.ajax({
                url: 'fetch_pending_transactions.php', // URL of the PHP file to fetch data from
                type: 'GET',
                success: function(data) {
                    // Update the content of the container with the data received
                    $('#pendingTransactionsContainer').html(data);
                },
                error: function(xhr, status, error) {
                    // Handle errors if any
                    console.error(xhr.responseText);
                }
            });
        }


        fetchPendingTransactions();


        setInterval(fetchPendingTransactions, 2000); 


        $(document).ready(function () {
            // Delegate the event handling to the document for dynamically loaded content
            $(document).on('click', '.cancel-button', function () {
                var form = $(this).closest('.cancel-form');
                var salesID = form.find('input[name="salesID"]').val();

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, cancel it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Use AJAX to cancel the subscription without reloading the page
                        $.ajax({
                            type: 'POST',
                            url: 'cancel_transaction.php',
                            data: { salesID: salesID },
                            success: function(response) {
                                if (response == 'success') {
                                    Swal.fire('Cancelled!', 'Transaction has been cancelled.', 'success');
                                    // Optionally, you can remove the canceled subscription from the page
                                    form.closest('.card').remove();
                                } else {
                                    Swal.fire('Error', 'Failed to cancel subscription.', 'error');
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

</script>

</body>
</html>


<?php
include('include_user/scripts.php');
//include('includes/footer.php');
?>