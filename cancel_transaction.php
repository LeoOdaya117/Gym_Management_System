<?php
session_start();

if (!isset($_SESSION['Username']) && !isset($_SESSION['IdNum'])) {
    header("Location: home.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have a database connection established ($conn)
    include('config.php');

    $salesID = $_POST['salesID'];

    if(!isset($salesID)){
        echo 'No value';
    }
    else{
        // Update the status to inactive
        $cancelQuery = "UPDATE Sales SET status = 'Inactive' WHERE salesID = ?";
        $cancelStmt = $conn->prepare($cancelQuery);
        $cancelStmt->bindParam(1, $salesID);
        
        if ($cancelStmt->execute()) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
    
} else {
    // Redirect to a suitable page if accessed directly without a POST request
    header("Location: userTransactions.php");
    exit();
}
?>
