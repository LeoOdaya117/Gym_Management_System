<?php
// Include your database configuration file
include("../config.php");
include("../function.php");

function generateUniqueWorkoutPlanID($conn, $idNum) {
    $newID = 0;
    $query = "SELECT MAX(WorkoutPlanID) AS MaxID FROM workoutplan WHERE IdNum = ?";
    $statement = $conn->prepare($query);
    $statement->execute([$idNum]);
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    $maxID = $row['MaxID'];

    // Increment the maximum ID to generate a new unique ID
    return $newID = $maxID + 1;

}

// Function to insert a workout plan entry into the database
function insertWorkoutPlanEntry($conn, $idnum, $workouplanid, $planName, $goal, $day, $difficulty, $exerciseID, $dateCreated, $status) {
    // Prepare the SQL statement
    $query = "INSERT INTO `workoutplan`(`IdNum`, `WorkoutPlanID`,`planName`, `goal`, `Day`, `Difficulty`, `ExerciseID`, `DateCreated`, `Status`) VALUES (:IdNum, :WorkoutPlanID,:planName, :goal, :day, :difficulty, :exerciseID, :dateCreated, :status)";

    $statement = $conn->prepare($query);

    // Bind parameters
    $statement->bindParam(':IdNum', $idnum);
    $statement->bindParam(':WorkoutPlanID', $workouplanid);
    $statement->bindParam(':planName', $planName);
    $statement->bindParam(':goal', $goal);
    $statement->bindParam(':day', $day);
    $statement->bindParam(':difficulty', $difficulty);
    $statement->bindParam(':exerciseID', $exerciseID);
    $statement->bindParam(':dateCreated', $dateCreated);
    $statement->bindParam(':status', $status);

    // Execute the statement
    $result = $statement->execute();

    return $result;
}

function getExercisesByDifficultyAndFocusArea($conn, $difficulty, $focusArea, $limit, $goal) {


    if ($focusArea === 'Full Body') {
        // Select all exercises except those with focus area 'Full body'
        if($difficulty !== 'BEGINNER'){
            $query = "SELECT `ExerciseID`, `ExerciseName` FROM exercises WHERE  PartOfBody != 'Full Body' AND `GOAL` = :goal ORDER BY RAND() LIMIT :limit";
            $statement = $conn->prepare($query);
            $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
            $statement->bindParam(':goal', $goal);
        }
        else{
            $query = "SELECT `ExerciseID`, `ExerciseName` FROM exercises WHERE Difficulty = :difficulty AND PartOfBody != 'Full Body' AND `GOAL` = :goal ORDER BY RAND() LIMIT :limit";
            $statement = $conn->prepare($query);
    
            $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
            $statement->bindParam(':difficulty', $difficulty);
            $statement->bindParam(':goal', $goal);
        }

       
    } else {
        // Select exercises based on the provided focus area
        if($difficulty !== 'BEGINNER'){
            $query = "SELECT `ExerciseID`, `ExerciseName` FROM exercises WHERE  PartOfBody = :focusArea AND `GOAL` = :goal ORDER BY RAND() LIMIT :limit";

            $statement = $conn->prepare($query);
    
            $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
            $statement->bindParam(':focusArea', $focusArea);
            $statement->bindParam(':goal', $goal);
        }
        else{
            $query = "SELECT `ExerciseID`, `ExerciseName` FROM exercises WHERE Difficulty = :difficulty AND PartOfBody = :focusArea AND `GOAL` = :goal ORDER BY RAND() LIMIT :limit";

            $statement = $conn->prepare($query);
    
            $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
            $statement->bindParam(':focusArea', $focusArea);
            $statement->bindParam(':difficulty', $difficulty);
            $statement->bindParam(':goal', $goal);
        }
    }

    
    $statement->execute();
    $exercises = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $exercises;
}




// Define user's available workout days, chosen focus area, and difficulty level
$userAvailability = [
    '1' => 'Core',
    '2' => 'Legs',
    '3' => 'Upper Body',
    '4' => 'Cardio',
    '5' => 'Back',
    '6' => 'Lower Body',
    '7' => '' // Empty for rest day
];



$planName = "7-Day Diet Plan"; // Adjust based on your plan name
$dateCreated = date('Y-m-d H:i:s'); // Current date and time
$status = "Active"; // Adjust based on plan status


// Retrieve POST data and call createDietPlan function
$id = isset($_POST["email"]) ? getUserID($_POST["email"]) : '';
$userDifficulty = isset($_POST["fitnesslevel"]) ? $_POST["fitnesslevel"] : '';
$goal = isset($_POST["goal"]) ? $_POST["goal"] : '';

$workouplanid = generateUniqueWorkoutPlanID($conn,$id);
// Retrieve workout plan string from POST data
$workoutPlanString = isset($_POST["workoutPlan"]) ? $_POST["workoutPlan"] : '';

// Explode the workout plan string to get individual workout plan items
$workoutPlanArray = explode(",", $workoutPlanString);



// Now $workoutPlanAssociative has keys starting from 1



if ($userDifficulty === 'BEGINNER') {
    $numberOfExercises = 5; 
}
elseif ($userDifficulty === 'INTERMEDIATE') {
    $numberOfExercises = 8; 
}
elseif ($userDifficulty === 'ADVANCED') {
    $numberOfExercises = 10; 
}

$workoutPlan = [];

$success = true; // Assume success initially

// Loop through each day of the week
foreach ($workoutPlanArray  as $dayName => $focusArea) {
    // Check if the day is a rest day
    if ($focusArea === '' || $focusArea === 'Rest Day')  {
        // Mark the day as a rest day
        $workoutPlan[$dayName] = "Rest Day";
        $success = insertWorkoutPlanEntry($conn, $id, $workouplanid,$planName, $goal, $dayName, $userDifficulty, 'Rest Day', $dateCreated, $status);

    } else {
        // Get exercises for the chosen difficulty level and focus area
        $exercises = getExercisesByDifficultyAndFocusArea($conn, $userDifficulty, $focusArea, $numberOfExercises, $goal);

        // Add the exercises to the workout plan for the current day
        $workoutPlan[$dayName] = $exercises;

        // Insert the workout plan entries into the database
        foreach ($exercises as $exercise) {
           
            $exerciseID = $exercise['ExerciseID'];
            $success = insertWorkoutPlanEntry($conn, $id, $workouplanid,$planName, $goal, $dayName, $userDifficulty, $exerciseID, $dateCreated, $status);
            if (!$success) {
                $success = false;
                break 2; // Break out of both inner and outer loop
            }
        }
    }
}

if ($success) {
    echo "Success";
} else {
    echo "Failed to insert workout plan entries";
}


// // Loop through each day of the week
// foreach ($userAvailability as $dayName => $focusArea) {
//     // Check if the day is a rest day
//     if ($focusArea === '') {
//         // Mark the day as a rest day
//         $workoutPlan[$dayName] = "Rest Day";
//     } else {
//         // Get exercises for the chosen difficulty level and focus area
//         $exercises = getExercisesByDifficultyAndFocusArea($conn, $userDifficulty, $focusArea, $numberOfExercises);

//         // Add the exercises to the workout plan for the current day
//         $workoutPlan[$dayName] = $exercises;
//     }
// }

// // Return the workout plan in JSON format
// header('Content-Type: application/json');
// echo json_encode($workoutPlan);
?>
