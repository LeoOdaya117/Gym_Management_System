<?php

include('config.php');
include('function.php');
date_default_timezone_set('Asia/Manila');


try {
    // Assuming you have a database connection established ($conn)
    if (!isset($_POST['username']) || !isset($_POST['planName']) || !isset($_POST['price']) || !isset($_POST['paymentMethod'])) {
        throw new Exception("Missing required parameters.");
    }
    $idnum = getUserID($_POST['username']);
    $planName = $_POST['planName'];
    $price = $_POST['price'];
    $paymentMethod = $_POST['paymentMethod'];

     // Check if there is a current pending transaction for the user
     $hasPendingTransaction = checkPendingTransaction($idnum);

     if ($hasPendingTransaction) {
         // If there is a pending transaction, return a specific message
         echo "You have a current pending transaction!";
         exit; // Stop further execution
     }

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

    
   


    //Insert to notifcation table
    $adminID = getAdminID();
    $messageCategory = "Subscription Request";
    $messageContent = "A new subscription request has been received.";
    $status = "Unread";
    $noticationSQL = "INSERT INTO `notifications` (`IdNum`, `messageCategory`, `messageContent`, `status`, `notifDate`) VALUES (?,?, ?, ?, NOW())";
    $notifcationStmt = $conn->prepare($noticationSQL);
    $notifcationStmt->bindParam(1, $adminID);
    $notifcationStmt->bindParam(2, $messageCategory);
    $notifcationStmt->bindParam(3, $messageContent);
    $notifcationStmt->bindParam(4, $status);
    $notifcationStmt->execute();

    echo "Subscription Request Successful!";

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

function checkPendingTransaction($idnum) {
    global $conn;

    // Query to check if there is a pending transaction for the user
    $query = "SELECT COUNT(*) AS count FROM Sales WHERE IdNum = :idnum AND status = 'Pending'";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':idnum', $idnum);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $result['count'];

    return ($count > 0); // Return true if there is a pending transaction, false otherwise
}
?>
