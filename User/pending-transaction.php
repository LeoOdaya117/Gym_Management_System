<?php 
session_start();

if (!isset($_SESSION['Username'])) {
  header("Location: pages-login.html");
  exit();
}

include("include_user/header.php");
include("include_user/nabvar.php");
include("config.php");

$userID = $_SESSION['IdNum'];
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
    <title>TrinosGym</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
<main id="main" class="main">

    <div class="pagetitle">
    <h1>Pending</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="index.html">Transaction</a></li>
        <li class="breadcrumb-item active">Pending</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
  
    <div class="row">
        <div class="contaner-fluid">
        
            <div class="row">
   
                <div class="col-md-6" id="pendingTransactionsContainer">
                            

                </div>



    
        </div>
    
        </div>
    </div>



            
                
    
    </section>



</div>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script src="assets/js/navbar.js"></script>
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
include("include_user/footer.php");
?>

