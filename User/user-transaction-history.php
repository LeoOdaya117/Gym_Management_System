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
// $query = "SELECT * FROM membership WHERE membershipid = ?";
// $stmt = $conn->prepare($query);
// $stmt->bindParam(1, $idnum); // Using the placeholder index 1 for the first parameter

// $stmt->execute();
// $membership = $stmt->fetch(PDO::FETCH_ASSOC);

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
    <h1>History</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a>Transaction</a></li>
        <li class="breadcrumb-item active">History</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
  
    <div class="row">
        <div class="contaner-fluid">
        <div class="container mt-4">
  <div class="row">
   
  <div class="col-md-6">
                <!-- Pending Subscription Section -->
                <?php
                    // Assuming you have a database connection established ($conn)
                    $pendingQuery = "SELECT * FROM Sales WHERE `idNum`= $userID AND `status` = 'Pending' ORDER BY date_created ASC ";
                    $pendingStmt = $conn->prepare($pendingQuery);
                    $pendingStmt->execute();
                    $pendingSubscriptions = $pendingStmt->fetchAll(PDO::FETCH_ASSOC);

                    if (count($pendingSubscriptions) > 0) {
                        foreach ($pendingSubscriptions as $pendingSubscription) {
                            // Fetch subscription details based on subscriptionID
                            $subscriptionQuery = "SELECT * FROM subscription WHERE id = ?";
                            $subscriptionStmt = $conn->prepare($subscriptionQuery);
                            $subscriptionStmt->bindParam(1, $pendingSubscription['subscriptionID']);
                            $subscriptionStmt->execute();
                            $subscriptionDetails = $subscriptionStmt->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $subscriptionDetails['subscriptionName']; ?></h5>
                                    <p class="card-text"><?php echo $subscriptionDetails['subscriptionDescription']; ?></p>
                                    <p class="card-text"><strong>Payment ID:</strong> <?php echo $pendingSubscription['salesID']; ?></p>
                                    <p class="card-text"><strong>Price:</strong> ₱<?php echo $pendingSubscription['price']; ?></p>
                                    <p class="card-text"><strong>Status:</strong> <?php echo $pendingSubscription['status']; ?></p>
                                    <p class="card-text"><strong>Payment Method:</strong> <?php echo $pendingSubscription['paymentMethod']; ?></p>
                                    <p class="card-text"><strong>Subscription Date:</strong> <?php echo $pendingSubscription['date_created']; ?></p>
                                    <!-- Inside the foreach loop, after displaying subscription details -->
                                    <form method="post" action="cancel_transaction.php" class="cancel-form">
                                        <input type="hidden" name="salesID" value="<?php echo $pendingSubscription['salesID']; ?>">
                                        <button type="button" class="btn btn-danger cancel-button">Cancel Subscription</button>
                                    </form>
                                </div>
                            </div>
                            <?php
                        }
                    } else {


                        echo '<div class="d-flex align-items-center justify-content-center">No pending transactions.</div>';

                    }
                ?>
                <!-- End of Pending Subscription Section -->
            </div>


  
    
   

    
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
    $(document).ready(function () {
        $('.cancel-button').click(function () {
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

