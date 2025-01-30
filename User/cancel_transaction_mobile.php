<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have a database connection established ($conn)
    include('config.php');

    $salesID = $_POST['salesID'];

    // Update the status to inactive
    $cancelQuery = "UPDATE Sales SET status = 'Inactive' WHERE salesID = ?";
    $cancelStmt = $conn->prepare($cancelQuery);
    $cancelStmt->bindParam(1, $salesID);
    
    if ($cancelStmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    
    echo    "Unauthorized Access!";
}
?>
