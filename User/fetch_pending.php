<?php

include("config.php");
include("function.php");



$username = $_POST["Username"];
$userID = getUserID($username);

// Prepare and execute query to fetch pending transactions for the current user
$pendingQuery = "SELECT * FROM Sales WHERE `idNum`= $userID AND `status` = 'Pending' ORDER BY date_created ASC ";
$pendingStmt = $conn->prepare($pendingQuery);
$pendingStmt->execute();
$pendingSubscriptions = $pendingStmt->fetchAll(PDO::FETCH_ASSOC);

// Initialize an array to hold the JSON data
$pendingTransactionsJSON = [];

// Check if there are pending transactions
if (count($pendingSubscriptions) > 0) {
    // Loop through pending transactions and generate JSON for each
    foreach ($pendingSubscriptions as $pendingSubscription) {
        // Fetch subscription details based on subscriptionID
        $subscriptionQuery = "SELECT * FROM subscription WHERE id = ?";
        $subscriptionStmt = $conn->prepare($subscriptionQuery);
        $subscriptionStmt->bindParam(1, $pendingSubscription['subscriptionID']);
        $subscriptionStmt->execute();
        $subscriptionDetails = $subscriptionStmt->fetch(PDO::FETCH_ASSOC);

        // Create JSON object for each pending transaction
        $pendingTransactionJSON = [
            "subscriptionName" => $subscriptionDetails['subscriptionName'],
            "subscriptionDescription" => $subscriptionDetails['subscriptionDescription'],
            "paymentID" => $pendingSubscription['salesID'],
            "price" => $pendingSubscription['price'],
            "status" => $pendingSubscription['status'],
            "paymentMethod" => $pendingSubscription['paymentMethod'],
            "subscriptionDate" => $pendingSubscription['date_created']
        ];

        // Add JSON object to the array
        $pendingTransactionsJSON[] = $pendingTransactionJSON;
    }
}

// Convert the array to JSON
$pendingTransactionsJSONString = json_encode($pendingTransactionsJSON);

// Output the JSON string
echo $pendingTransactionsJSONString;
?>
