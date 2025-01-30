<?php
include('../config.php');
include('../function.php');


if(isset($_GET["email"]) && isset($_GET["date"]) && isset($_GET["day"]) && isset($_GET["workoutplanid"])){
    $email = $_GET["email"];
    $userID = getUserID($email);
    $date = $_GET["date"];
    $day = $_GET["day"];
    $workoutplanid = $_GET["workoutplanid"];
    
    // $sql = "SELECT COUNT(*) FROM attendance WHERE user_id = :IdNum AND DATE(timeIn) = :date";
    // $stmt=$conn->prepare($sql);
    // $stmt->bindParam(':IdNum', $userID, PDO::PARAM_INT); // Assuming $userID is an integer
    // $stmt->bindParam(':date', $date); // PDO will automatically determine the data type based on the value
    
    // $stmt->execute();
    
    // $result = $stmt->fetchColumn();
    

    // Calculate the new DateCreated by adding $day days to the original date
    $day -1;
    $newDateCreated = date('Y-m-d', strtotime($date . " + $day days"));

    $result = checkAttendance($conn,$userID,$newDateCreated);
    $exercise = checkExerciseForWorkoutplanID($conn,$userID,$workoutplanid, $day);
    $responseMessage = array();
    if ($result) {
        $responseMessage['status'] = 'Present';
        $responseMessage['date'] = $newDateCreated;
        $responseMessage['is_present'] = $result;
        $responseMessage['exercise'] = $exercise;
    } else {
        $responseMessage['status'] = 'Absent';
        $responseMessage['date'] = $newDateCreated;
        $responseMessage['is_present'] = $result;
        $responseMessage['exercise'] = $exercise;
    }
    
     // Output JSON response
     header('Content-Type: application/json');
     echo json_encode($responseMessage);
}else{
    $errorResponse = array('error' => 'Missing "email" or "date" in GET parameters.');
    
    // Output JSON error response
    header('Content-Type: application/json');
    echo json_encode($errorResponse);
}


function checkAttendance($conn, $idNum, $DateCreated ) {
    $query = "SELECT id, user_id,timeIn
              FROM attendance
              WHERE user_id = :idNum AND DATE(timeIn) = :DateCreated";
  
    $statement = $conn->prepare($query);
    $statement->bindParam(':idNum', $idNum);
    $statement->bindParam(':DateCreated', $DateCreated);
    $statement->execute();
  
    // Check if the attendance record exists
    $attendanceRecord = $statement->fetch(PDO::FETCH_ASSOC);
  
    // Return true if record exists, false otherwise
    return $attendanceRecord;
}

function checkExerciseForWorkoutplanID($conn, $idNum,$workoutplanid, $day) {
    $query = "SELECT ExerciseID
              FROM workoutplan
              WHERE IdNum = :IdNum AND WorkoutPlanID = :WorkoutPlanID AND `Day` = :exerciseday";
  
    $statement = $conn->prepare($query);
    $statement->bindParam(':IdNum', $idNum);
    $statement->bindParam(':WorkoutPlanID', $workoutplanid);
    $statement->bindParam(':exerciseday', $day);
    $statement->execute();
  
    // Check if the attendance record exists
    $exercise = $statement->fetch(PDO::FETCH_ASSOC);
  
    // Return true if record exists, false otherwise
    return $exercise['ExerciseID'];
}

?>