<?php
// Include your database configuration file
include("../config.php");
include("../function.php");

$userID = 20240207002; // Example user ID
$fitnessLevel = 'INTERMEDIATE'; // Example fitness level
$goal = 'Weight Loss'; // Example fitness goal
$userAvailability = [
    1 => 'Core',
    2 => 'Legs',
    3 => 'Upper Body',
    4 => 'Cardio',
    5 => 'Back',
    6 => 'Lower Body',
    7 => 'Rest Day'
];
$userFocusAreas = [
    1 => 'Core',
    2 => 'Legs',
    3 => 'Upper Body',
    4 => 'Cardio',
    5 => 'Back',
    6 => 'Lower Body',
    7 => ''
];

// Generate 7-day workout plan using collaborative filtering
$workoutPlan = generateWorkoutPlan($conn, $userID, $fitnessLevel, $goal, $userAvailability, $userFocusAreas);

$formattedWorkoutPlan = [];
foreach ($workoutPlan as $day => $exercises) {
    // If it's a rest day, store the value directly
    if ($exercises === 'Rest Day') {
        $formattedWorkoutPlan[$day] = $exercises;
    } else {
        // If it's not a rest day, extract exercise names from the array of recommendations
        $exerciseNames = array_column($exercises, 'ExerciseID');
        $formattedWorkoutPlan[$day] = $exerciseNames;
    }
}

// Output the workout plan (you can format this as needed)
header('Content-Type: application/json');
echo json_encode($formattedWorkoutPlan);

// Function to generate workout plan using collaborative filtering
function generateWorkoutPlan($conn, $userID, $fitnessLevel, $goal, $userAvailability, $userFocusAreas) {
    $workoutPlan = [];

    // Loop through each day of the week
    foreach ($userAvailability as $day => $availability) {
        // Check if it's a rest day
        if ($availability === 'Rest Day') {
            $workoutPlan[$day] = 'Rest Day';
        } else {
            // Use collaborative filtering to recommend exercises for the current day and focus area
            $recommendedExercises = recommendExercises($conn, $userID, $fitnessLevel, $goal, $availability, $userFocusAreas[$day]);
            
            // Store recommended exercises for the current day in the workout plan
            $workoutPlan[$day] = $recommendedExercises;
        }
    }

    return $workoutPlan;
}

// Function to recommend exercises using collaborative filtering
function recommendExercises($conn, $userID, $fitnessLevel, $goal, $availability, $focusArea) {
    // Implement collaborative filtering algorithm to recommend exercises based on user interactions
    $recommendedExercises = collaborativeFilteringAlgorithm($conn, $userID, $fitnessLevel, $goal, $availability, $focusArea);
    
    // Determine the exercise limit based on fitness level
    $limit = getLimitByFitnessLevel($fitnessLevel);
    
    // Limit the number of recommended exercises
    $limitedExercises = array_slice($recommendedExercises, 0, $limit);

    return $limitedExercises;
}

function getLimitByFitnessLevel($fitnessLevel) {
    if ($fitnessLevel === 'BEGINNER') {
        return 6;
    } elseif ($fitnessLevel === 'INTERMEDIATE') {
        return 8;
    } elseif ($fitnessLevel === 'ADVANCED') {
        return 10;
    } else {
        // Default to 6 if fitness level is not recognized
        return 6;
    }
}


function collaborativeFilteringAlgorithm($conn, $userID, $fitnessLevel, $goal, $availability, $focusArea) {

    $userLikedExercises = getUserPastWorkoutExercises($conn, $userID);

    $similarUsers = getSimilarUsers($conn, $userID, $fitnessLevel);

    $similarUsersExercises = [];
    foreach ($similarUsers as $similarUser) {
        $similarUserLikedExercises = getUserPastWorkoutExercises($conn, $similarUser['UserID']);
        $similarUsersExercises = array_merge($similarUsersExercises, $similarUserLikedExercises);
    }

    $recommendedExercises = array_filter($similarUsersExercises, function($exercise) {
        return $exercise['ExerciseID'] !== 'Rest Day'; // Filter out "Rest Day" entries
    });


    return $recommendedExercises;
}

function getUserPastWorkoutExercises($conn, $userID) {
    $query = "SELECT `ExerciseID`, `goal`, `Difficulty` FROM `workoutplan` WHERE `IdNum` = :userID";
    $statement = $conn->prepare($query);
    $statement->bindParam(':userID', $userID);
    $statement->execute();
    $pastWorkoutExercises = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    return $pastWorkoutExercises;
}


function getSimilarUsers($conn, $userID, $fitnessLevel) {
    // Query similar users based on fitness level from workoutplan table
    $query = "SELECT IdNum AS UserID FROM workoutplan WHERE Difficulty = :fitnessLevel AND IdNum != :userID LIMIT 5";
    $statement = $conn->prepare($query);
    $statement->bindParam(':fitnessLevel', $fitnessLevel);
    $statement->bindParam(':userID', $userID);
    $statement->execute();
    $similarUsers = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $similarUsers;
}
?>
