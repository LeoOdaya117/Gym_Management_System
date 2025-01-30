<?php

include('../config.php');
include('../function.php');

if(isset($_GET['email'])){
    $username = $_GET['email'];
} else {
    echo 'Please provide an email or contact the developer to resolve this problem.';
    exit;
}

// Query to check if there is a record of a workout plan for the given email
$query = "SELECT COUNT(*) AS count FROM account WHERE `Username` = :Username";
$stmt = $conn->prepare($query);
$stmt->bindParam(':Username', $username);
$stmt->execute();
$result = $stmt->fetchColumn();


if ($result > 0 ) {
    echo "Found";
} else {
    echo "Account Not Found";
}

?>
