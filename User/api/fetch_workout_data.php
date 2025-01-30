<?php
session_start();

// if (!isset($_SESSION['Username'])) {
//   header("Location: logout.php");
//   exit();
// }

// Include your database configuration file
include("../config.php");
include("../function.php");

// Function to get the diet plan for the specified day
function getDietPlan($conn, $idNum, $WorkoutPlanID, $day) {
    // Modify the query to join dietplan_details and foods tables
    $query = "SELECT wp.id as workoutExerciseID, wp.Status, wp.DateCreated, e.ExerciseID  ,e.ImageURL AS image, e.ExerciseName AS name, e.set, e.reps, e.duration, wp.Difficulty
              FROM workoutplan wp
              INNER JOIN exercises e ON wp.ExerciseID = e.ExerciseID
              WHERE wp.IdNum = :idNum AND wp.WorkoutPlanID = :WorkoutPlanID AND wp.Day = :day";

    $statement = $conn->prepare($query);
    $statement->bindParam(':idNum', $idNum);
    $statement->bindParam(':WorkoutPlanID', $WorkoutPlanID);
    $statement->bindParam(':day', $day);
    $statement->execute();
    $workoutplan = $statement->fetchAll(PDO::FETCH_ASSOC);


    $day -1;

    // Iterate through each workout plan item and add new fields
    foreach ($workoutplan as &$item) {
        // Retrieve the DateCreated for the current workout plan item
        $originalDateCreated = $item['DateCreated'];

        // Calculate the new DateCreated by adding $day days to the original date
        $newDateCreated = date('Y-m-d', strtotime($originalDateCreated . " - $day days"));

        // Update the item with the new DateCreated
        $item['DateCreated'] = $newDateCreated;

        // Check attendance for the current IdNum and DateCreated
        $attendanceRecord = checkAttendance($conn, $idNum, $newDateCreated);

        // Add new fields to the workout plan item based on attendance record
        if ($attendanceRecord) {
            $item['attendanceStatus'] = 'Present';
            $item['timeIn'] = $attendanceRecord['timeIn'];

        } else {
            $item['attendanceStatus'] = 'Absent';
            $item['timeIn'] = null;

            // Multiply set, reps, and duration values
           
            $item['reps'] = multiplyRangeValues($item['reps'], 2);
            $item['duration'] = multiplyDuration($item['duration'], 2);
        }


    }

    return $workoutplan;
}

// Function to multiply set or reps values in range format
function multiplyRangeValues($valueString, $factor) {
  // Regular expression patterns to match numeric values and descriptive terms
  $pattern = '/(\d+)\s+to\s+(\d+)(\s+.+)?/'; // Match numeric values and optional descriptive terms

  // Check if the input value string matches the defined pattern
  if (preg_match($pattern, $valueString, $matches)) {
      $minValue = intval($matches[1]);
      $maxValue = intval($matches[2]);
      $descriptiveString = isset($matches[3]) ? trim($matches[3]) : ''; // Get the descriptive string if present

      // Multiply the range values by the factor
      $newMinValue = $minValue * $factor;
      $newMaxValue = $maxValue * $factor;

      // Construct the updated value string with multiplied values and original descriptive terms
      return "$newMinValue to $newMaxValue $descriptiveString";
  }

  // If no match, return the original value string
  return $valueString;
}



// Function to multiply duration values in different formats (e.g., "30 to 60 seconds", "5 minutes")
function multiplyDuration($durationString, $factor) {
  // Extract numeric values from the string based on different formats
  if (strpos($durationString, 'seconds') !== false) {
      preg_match('/(\d+)\s+to\s+(\d+)\s+seconds/', $durationString, $matches);
      if (count($matches) >= 3) {
          $minValue = intval($matches[1]);
          $maxValue = intval($matches[2]);

          // Multiply the values by the factor
          $newMinValue = $minValue * $factor;
          $newMaxValue = $maxValue * $factor;

          // Format the updated range string
          return "$newMinValue to $newMaxValue seconds";
      }
  } elseif (strpos($durationString, 'minutes') !== false) {
      preg_match('/(\d+)\s+to\s+(\d+)\s+minutes/', $durationString, $matches);
        if (count($matches) >= 3) {
            $minValue = intval($matches[1]);
            $maxValue = intval($matches[2]);

            // Multiply the values by the factor
            $newMinValue = $minValue + 5;
            $newMaxValue = $maxValue + 5;

            // Format the updated range string
            return "$newMinValue to $newMaxValue minutes";
        } else {
            preg_match('/(\d+)\s+minutes/', $durationString, $matches);
            if (count($matches) >= 2) {
                $minutesValue = intval($matches[1]);

                // Multiply the value by the factor
                $newMinutesValue = $minutesValue + 10;

                // Format the updated duration string
                return "$newMinutesValue minutes";
            }
        }
    

  }

  // If no valid match, return the original duration string
  return $durationString;
}

// Function to check attendance based on IdNum and DateCreated
function checkAttendance($conn, $idNum, $DateCreated) {
  $query = "SELECT id, user_id, FullName, timeIn, timeOut
            FROM attendance
            WHERE user_id = :idNum AND DATE(timeIn) = :DateCreated";

  $statement = $conn->prepare($query);
  $statement->bindParam(':idNum', $idNum);
  $statement->bindParam(':DateCreated', $DateCreated);
  $statement->execute();

  // Fetch the attendance record (if it exists)
  $attendanceRecord = $statement->fetch(PDO::FETCH_ASSOC);

  return $attendanceRecord;
}

// Fetch the user's ID from the sess

if(isset( $_GET['IdNum'])){
  $idNum = getUserID($_GET['IdNum']);
}
else{
  $idNum = $_SESSION['IdNum'];
}


// Fetch the diet plan ID and day from URL parameters
$WorkoutPlanID = $_GET['WorkoutPlanID'];
$day = $_GET['day'];

// Fetch diet plan data for the specified day
$workoutplan = getDietPlan($conn, $idNum, $WorkoutPlanID, $day);

// Return the data in JSON format
header('Content-Type: application/json');
echo json_encode($workoutplan);
?>
