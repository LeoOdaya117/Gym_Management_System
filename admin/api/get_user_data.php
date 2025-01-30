<?php
include("config.php");
session_start();

$userId = $_SESSION["Username"]; // Assuming "Username" is the user's ID or username

$query = "SELECT `Firstname`,`Lastname`, `Username`, `AccountType`, `Age`, `Gender`, `Weight`, `Height`, `BMR`, `DCT`, `ActLvl`, `photo` 
        FROM `account` WHERE Username = :userId";
$stmt = $conn->prepare($query);

if ($stmt) {
    $stmt->bindParam(':userId', $userId, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        echo json_encode($result); // Return user data as JSON
    } else {
        echo json_encode(array("error" => "User not found"));
    }
} else {
    echo json_encode(array("error" => "Database query error: " . $conn->errorInfo()[2]));
}
?>
