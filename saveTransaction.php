<?php
session_start();
include('config.php');

if (!isset($_SESSION['Username']) && !isset($_SESSION['IdNum'])) {
    header("Location: home.php");
    exit();
}

$idnum = $_SESSION['IdNum'];

try {
    // Assuming you have a database connection established ($conn)
    if (!isset($_POST['planName']) || !isset($_POST['price']) || !isset($_POST['paymentMethod'])) {
        throw new Exception("Missing required parameters.");
    }

    $planName = $_POST['planName'];
    $price = $_POST['price'];
    $paymentMethod = $_POST['paymentMethod'];

    // Fetch subscriptionID based on planName
    $subscriptionQuery = "SELECT id FROM subscription WHERE subscriptionName = ?";
    $subscriptionStmt = $conn->prepare($subscriptionQuery);
    $subscriptionStmt->bindParam(1, $planName);
    $subscriptionStmt->execute();
    $subscriptionResult = $subscriptionStmt->fetch(PDO::FETCH_ASSOC);

    if (!$subscriptionResult) {
        throw new Exception("Subscription not found for planName: $planName");
    }

    $subscriptionID = $subscriptionResult['id'];
    $salesID = generateSalesID($conn);


    // Insert into Sales table
    $saveTransactionQuery = "INSERT INTO Sales (salesID, IdNum, subscriptionID, price, status, date_created, paymentMethod) VALUES (?,?, ?, ?, ?, NOW(), ?)";
    $saveTransactionStmt = $conn->prepare($saveTransactionQuery);
    $saveTransactionStmt->bindParam(1, $salesID);
    $saveTransactionStmt->bindParam(2, $idnum);
    $saveTransactionStmt->bindParam(3, $subscriptionID);
    $saveTransactionStmt->bindParam(4, $price);
    $status = ($paymentMethod == 'Cash') ? 'Pending' : 'SomeOtherStatus'; // Change 'SomeOtherStatus' accordingly
    $saveTransactionStmt->bindParam(5, $status);
    $saveTransactionStmt->bindParam(6, $paymentMethod);
    $saveTransactionStmt->execute();

    
    echo "Subscription Pending! Please Pay in the counter! Payment ID: " . $salesID;



} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

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
?>
