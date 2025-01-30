<?php 

include('../config.php');
include('../function.php');

if(isset($_GET['email'])){
    $username = getUserID($_GET['email']);
} else {
    echo 'Please provide an email or contact the developer to resolve this problem.';
    exit;
}


try {

    // SQL query to select membership details
    $sql = "SELECT `membershipid`, `plan`, `startDate`, `dueDate`, `status` FROM `membership` WHERE  `membershipid`= '$username' AND `dueDate` > NOW()";
    
    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);
    
    // Execute the query
    $stmt->execute();
    
    // Fetch all rows (membership details)
    $memberships = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Check if any active subscriptions were found
    if (count($memberships) > 0) {
        // User has an active subscription
        echo "Active";
        // You can access the subscription details from the $memberships array
        // print_r($memberships); // Output membership details for debugging
    } else {
        // No active subscriptions found
        echo "Inactive";
       
    }
    
} catch(PDOException $e) {
    // Handle database connection errors
    echo "Connection failed: " . $e->getMessage();
}


?>