<?php
// Start session and include necessary files
session_start();
include("config.php");

// Check if user is logged in
if (!isset($_SESSION['Username'])) {
    // Redirect if not logged in
    header("Location: pages-login.html");
    exit();
}

// Get user ID from session
$userID = $_SESSION['IdNum'];

// Prepare and execute query to fetch pending transactions for the current user
$pendingQuery = "SELECT * FROM Sales WHERE `idNum`= $userID AND `status` = 'Pending' ORDER BY date_created ASC ";
$pendingStmt = $conn->prepare($pendingQuery);
$pendingStmt->execute();
$pendingSubscriptions = $pendingStmt->fetchAll(PDO::FETCH_ASSOC);

// Check if there are pending transactions
if (count($pendingSubscriptions) > 0) {
    // Loop through pending transactions and generate HTML for each
    foreach ($pendingSubscriptions as $pendingSubscription) {
        // Fetch subscription details based on subscriptionID
        $subscriptionQuery = "SELECT * FROM subscription WHERE id = ?";
        $subscriptionStmt = $conn->prepare($subscriptionQuery);
        $subscriptionStmt->bindParam(1, $pendingSubscription['subscriptionID']);
        $subscriptionStmt->execute();
        $subscriptionDetails = $subscriptionStmt->fetch(PDO::FETCH_ASSOC);

        // Generate HTML for pending transaction
        echo '<div class="card">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $subscriptionDetails['subscriptionName'] . '</h5>';
        echo '<p class="card-text">' . $subscriptionDetails['subscriptionDescription'] . '</p>';
        echo '<p class="card-text"><strong>Payment ID:</strong> ' . $pendingSubscription['salesID'] . '</p>';
        echo '<p class="card-text"><strong>Price:</strong> ₱' . $pendingSubscription['price'] . '</p>';
        echo '<p class="card-text"><strong>Status:</strong> ' . $pendingSubscription['status'] . '</p>';
        echo '<p class="card-text"><strong>Payment Method:</strong> ' . $pendingSubscription['paymentMethod'] . '</p>';
        echo '<p class="card-text"><strong>Subscription Date:</strong> ' . $pendingSubscription['date_created'] . '</p>';
        echo '<form method="post" action="cancel_transaction.php" class="cancel-form">';
        echo '<input type="hidden" name="salesID" value="' . $pendingSubscription['salesID'] . '">';
        echo '<button type="button" class="btn btn-danger cancel-button">Cancel Subscription</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
    }
} else {
    // If no pending transactions, display message
    echo '<div class="container text-center">No pending transactions.</div>';
}
?>
