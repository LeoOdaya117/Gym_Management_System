<?php
include('config.php');

if(isset($_POST['selectedDate'])){
    $selectedDate = $_POST['selectedDate'];

    // Prepare the SQL statement to fetch attendance data for the selected date
    $sql = "SELECT * FROM attendance WHERE DATE(timeIn) = :selectedDate";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':selectedDate', $selectedDate);
    $stmt->execute();

    $attendanceData = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($attendanceData); // Return the attendance data as JSON
} else {
    echo "Error: Selected date not provided.";
}
?>
