<?php
include('config.php');

$userID = "";
$fullName = "";
date_default_timezone_set('Asia/Manila');
$timeIn = date('Y-m-d H:i:s');


if(isset($_POST['userID'], $_POST['fullName'])){
    $userID = $_POST['userID'];
    $fullName = $_POST['fullName'];
   
}

if ($userID && $fullName && $timeIn) {
    // Check if user has already timed in on the current day
    $query = "SELECT * FROM attendance WHERE user_id = :userID AND DATE(timeIn) = CURDATE()";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':userID', $userID);
    $stmt->execute();
    $existingRecord = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingRecord) {
        // Update the existing record with the new time out
        $query = "UPDATE attendance SET timeOut = :timeIn WHERE user_id = :userID AND DATE(timeIn) = CURDATE()";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':timeIn', $timeIn);
        if ($stmt->execute()) {
            echo "timeOut";
        } else {
            echo "Error updating Time Out";
        }
    } else {
        // Insert a new attendance record
        $query = "INSERT INTO attendance (user_id, FullName, timeIn) VALUES (:userID, :fullName, :timeIn)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':fullName', $fullName);
        $stmt->bindParam(':timeIn', $timeIn);
        
        if ($stmt->execute()) {
            echo "timeIn";
        } else {
            echo "Error saving attendance";
        }
    }
} else {
    echo "Invalid data provided";
}
?>
