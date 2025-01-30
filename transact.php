<?php


  session_start();

  if (!isset($_SESSION['Username'])) {
    header("Location: index.php");
    exit();
  }
  
 
  include('includes/header.php');
  include('includes/navbar.php');
  include('config.php');
  function generateSalesID($connection) {
    // Prefix for the sales ID
    $prefix = "GYM";
    
    // Get the current date
    $date = date("Ymd");

    // Count the number of records in the table
    $query = "SELECT COUNT(*) as count FROM sales";
    $result = $connection->query($query); // Use PDO query method

    if ($result) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $count = $row['count'] + 1;
    } else {
        // Handle error
        die("Error: " . $connection->errorInfo()[2]);
    }

    // Create the sales ID by combining prefix, date, and unique number
    $salesID = $prefix . $date . str_pad($count, 4, "0", STR_PAD_LEFT);

    return $salesID;
}

    $walkinno = isset($_GET['walkinno']) ? $_GET['walkinno'] : null;
    $walkinname = isset($_GET['walkinname']) ? $_GET['walkinname'] : null;
    $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : null;
    $transactionId = isset($_GET['id']) ? $_GET['id'] : null;
    $cartContent =[];
    if ($transactionId) {
        // Query the database to retrieve the subscription plan associated with the transaction ID
        $sql = "SELECT * FROM sales WHERE salesID = :transactionId AND status = 'Pending'";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':transactionId', $transactionId);
        $stmt->execute();
        $salesRecord = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($salesRecord) {
            $productId = $salesRecord['subscriptionID'];
            // Assuming there's a relationship between sales records and subscription plans
            $sql = "SELECT subscriptionName, Price FROM subscription WHERE id = :productId";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':productId', $productId);
            $stmt->execute();
            $subscriptionPlan = $stmt->fetch(PDO::FETCH_ASSOC);

            // Convert the subscription plan to JSON for JavaScript usage
            $cartContent = json_encode($subscriptionPlan);
            
        } else {
            // Handle case where no sales record is found for the provided transaction ID
            // For example, redirect to an error page or display an error message
        }
    } else {
        $transactionId = generateSalesID($conn);
    }

    

    $transactionNo = json_encode($transactionId);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="cache-control" content="no-cache">
  <meta http-equiv="expires" content="0">
  <meta http-equiv="pragma" content="no-cache">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .transaction-id {
    text-align: right;
    margin-bottom: 10px;
}
  </style>
</head>

<body>



<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header d-inline align-items-spacebetween" >

        <span style="font-size: 20px; font-weight: bold;">Payment Form</span>

        <span class="float-right"><span><strong>Transaction ID:</strong></span> <?php echo $transactionId;?></span>
    </div>

        <div class="card-body">

            <div class="container">
                <div class="row">
                    <!-- Subscription Plan List -->
                    <div class="col-md-6">
                        <h2>Subscription Plans</h2>
                        
                        <div class="list-group" id="subscriptionList">
                            <!-- Subscription plans will be added dynamically here -->
                        </div>
                    </div>
                    <!-- Cart -->
                    <div class="col-md-6">
                        

                        <h2>Cart</h2>
                        <ul class="list-group" id="cart">
                            <!-- Cart items will be added dynamically here -->
                        </ul>
                        <hr>
                        <h4>Total: ₱ <span id="total">0</span></h4>
                        <div class="mb-3">
                            <label for="cashAmount" class="form-label">Cash Amount</label>
                            <input type="number" class="form-control" id="cashAmount" oninput="calculateChange()" name="cashAmount" required>
                        </div>
                        <div class="mb-3">
                            <label for="changeAmount" class="form-label">Change Amount</label>
                            <input type="text" class="form-control" id="changeAmount" name="changeAmount" readonly>
                        </div>
                        <button class="btn btn-primary" onclick="saveTransaction('<?php echo $user_id; ?>', '<?php echo $transactionId; ?>', '<?php echo $walkinno; ?>', '<?php echo $walkinname; ?>')">Pay</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>


<script>
var cartContent = <?php echo $cartContent; ?>;
var transactionNo = <?php echo $transactionNo; ?>;
var user_id = <?php echo isset($user_idjson) ? $user_idjson : 'null'; ?>;
</script>
<script src="javascript/transact.js"></script>


</body>

</html>

<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>