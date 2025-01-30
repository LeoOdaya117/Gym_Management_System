<?php


session_start();

if (!isset($_SESSION['Username']) && !isset($_SESSION['IdNum']) ) {
  header("Location: home.php");
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


<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="subscriptionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Subscription Details</h5>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
      </div>
        <div class="modal-body">
            <!-- Subscription details will be displayed here -->
            <p id="subscriptionDetails"></p>

            <!-- Payment selection -->
            <hr>
            <p class="mb-4"><strong>Select Payment Method:</strong></p>

            <!-- Cash Option -->
            <div class="form-check">
                <input class="form-check-input" type="radio" name="paymentOption" id="cashOption" value="Cash">
                <label class="form-check-label" for="cashOption" style="font-weight: bold;">
                    <span style="color: #28a745; font-weight: bold;">CASH</span>
                </label>
            </div>

            <!-- GCash Option -->
            <div class="form-check d-flex align-items-center">
                <input class="form-check-input" type="radio" name="paymentOption" id="gcashOption" value="GCash">
                <label class="form-check-label" for="gcashOption" style="font-weight: bold;">
                    <img src="img/gcash-logo-vector.png" alt="Gcash Logo" width="80" height="80">
                </label>
            </div>

            <!-- Add more payment options as needed -->

            <!-- End of Payment Options -->
        </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="subscribe()">Subscribe</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>



<div class="container mt-4">
  <div class="row">
    <div class="col-12">
      <h3 class="text-center mb-4">Trinos Gym Membership</h3>
    </div>
    <div class="col-12">
     <!-- User's Current Membership Card -->
     <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Your Current Membership</h5>
                    <?php if ($_SESSION["AccountType"] == "User" && is_array($membership) && isset($membership['plan']) && isset($membership['dueDate'])): ?>
                        <p class="card-text">You are currently subscribed to the <strong><?php echo $membership['plan']; ?></strong> plan. Enjoy unlimited access to our gym facilities!</p>
                        <p class="card-text"><strong>Membership End Date:</strong> <?php echo $membership['dueDate']; ?></p>
                    <?php elseif (is_array($membership)): ?>
                        <p class="card-text">You are not subscribed to any membership plan.</p>
                    <?php else: ?>
                        <p class="card-text">Membership information not available.</p>
                    <?php endif; ?>
                </div>
            </div>
    </div>



    <div class="col-12 separator"></div> <!-- Separator -->
    
    <div class="col-md-6">
        <!-- Subscription Plans Cards -->
        <h4 class="text-center mb-4">Available Subscriptions</h4>
        <?php
            // Assuming you have a database connection established ($conn)
            $query = "SELECT * FROM subscription WHERE `status` = 'Active' ORDER BY Price ASC ";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $subscriptionPlans = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($subscriptionPlans as $plan) {
        ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $plan['subscriptionName']; ?></h5>
                    <p class="card-text"><?php echo $plan['subscriptionDescription']; ?></p>
                    <p class="card-text"><strong>Price:</strong> ₱<?php echo $plan['Price']; ?></p>
                    <form method="post"> <!-- Replace "subscribe.php" with the actual subscription handling script -->
                    <input type="hidden" name="plan_id" value="<?php echo $plan['id']; ?>">
                    <input type="hidden" name="plan_name" value="<?php echo $plan['subscriptionName']; ?>">
                    <input type="hidden" name="price" value="<?php echo $plan['Price']; ?>">
                    <input type="hidden" name="duration" value="<?php echo $plan['numberOfDays']; ?>">
                    <button type="button" class="btn btn-primary btn-block" onclick="subscribePlan(<?php echo $plan['id']; ?>, '<?php echo $plan['subscriptionName']; ?>', <?php echo $plan['Price']; ?>, <?php echo $plan['numberOfDays']; ?>)">Subscribe</button>


                    </form>
                </div>
            </div>
        <?php
            }
        ?>
    </div>

    
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  function showSubscriptionDetails(planName, price) {
      var subscriptionDetailsElement = document.getElementById('subscriptionDetails');
      
      // Clear previous content
      subscriptionDetailsElement.innerHTML = '';

      // Create elements for plan name and price
      var planNameElement = document.createElement('p');
      planNameElement.innerText = 'Plan: ' + planName;
      
      var priceElement = document.createElement('p');
      priceElement.innerText = 'Price: ' + price;

      // Style the elements
      planNameElement.style.fontWeight = 'bold';
      priceElement.style.color = '#007bff'; // Set the color as per your preference

      // Append elements to the container
      subscriptionDetailsElement.appendChild(planNameElement);
      subscriptionDetailsElement.appendChild(priceElement);
  }

  function subscribePlan(planId, planName, price, duration) {
      // Your logic to handle subscription details here

      
      document.querySelector('input[name="plan_name"]').value = planName;
      document.querySelector('input[name="price"]').value = price;
      document.querySelector('input[name="duration"]').value = duration;

      // Example: Display subscription details in the modal
      showSubscriptionDetails(planName, '₱' + price);
      // Add your logic to save the transaction in the Sales table
    
      
      // Show the modal
      $('#subscriptionModal').modal('show');
  }


  function subscribe() {
    // Get the selected payment option
    var paymentOption = document.querySelector('input[name="paymentOption"]:checked');
    
    if (paymentOption) {
      var selectedPayment = paymentOption.value;
      var planName = document.querySelector('input[name="plan_name"]').value;
      var price = document.querySelector('input[name="price"]').value;
      var duration = document.querySelector('input[name="duration"]').value;

      

      if (selectedPayment == 'GCash') {
        Swal.fire({
          icon: 'info',
          title: 'Information',
          text: 'Subscription Unsuccessful! GCash is under development.',
          showConfirmButton: true
        }).then(function() {
          // Handle redirection or any other action
        });
      } else {
        // Swal.fire({
        //   icon: 'success',
        //   title: 'Success',
        //   text: 'Subscription Pending! Please Pay in the counter! Show the ID to the cashier. Payment ID: 123',
        //   showConfirmButton: true
        // }).then(function() {
        //   saveTransaction(planName, price, selectedPayment);
        //   window.location.href = 'membership.php';
        // });
          // saveTransaction(planName, price, selectedPayment);
          // window.location.href = 'membership.php';

          Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    
                    saveTransaction(planName, price, selectedPayment);
                }
            });
      }

      // Close the modal
      $('#subscriptionModal').modal('hide');
    } else {
      Swal.fire({
            icon: 'warning',
            title: 'Warning',
            text: 'Please select a payment option.',
            showConfirmButton: true
            }).then(function() {
                
        });
    }
  }
  

// Function to save the transaction in the Sales table
function saveTransaction(planName, price, paymentMethod) {
    // Assuming you have a database connection established ($conn)

    // Using AJAX to send the request to the server
    $.ajax({
        type: "POST",
        url: "saveTransaction.php",
        data: {
            planName: planName,
            price: price,
            paymentMethod: paymentMethod
        },
        success: function (response) {
            // Handle the response from the server (if needed)
            Swal.fire({
              icon: 'success',
              title: 'Success',
              text: response,
              showConfirmButton: true
            }).then(function() {
              
            });
           
        },
        error: function (error) {
            // Handle errors (if any)
            Swal.fire({
              icon: 'error',
              title: 'Success',
              text: error,
              showConfirmButton: true
            }).then(function() {
              
            });
            console.error(error);
        }
    });
}

</script>

</body>
</html>


<?php
include('include_user/scripts.php');
//include('includes/footer.php');
?>