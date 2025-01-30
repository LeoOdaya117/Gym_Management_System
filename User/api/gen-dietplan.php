<?php
include("../config.php");
include("../function.php");

// Function to generate a unique DietPlanID for the user's diet plan
function generateUniqueDietPlanID($conn, $idNum) {
    // Get the maximum DietPlanID for the given IdNum from the database
    $query = "SELECT MAX(DietPlanID) AS MaxID FROM dietplan WHERE IdNum = ?";
    $statement = $conn->prepare($query);
    $statement->execute([$idNum]);
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    $maxID = $row['MaxID'];

    // Increment the maximum ID to generate a new unique ID
    $newID = $maxID + 1;

    // Insert the new DietPlanID into the database for the user
    $insertQuery = "INSERT INTO dietplan (IdNum, DietPlanID) VALUES (?, ?)";
    $insertStatement = $conn->prepare($insertQuery);
    $insertStatement->execute([$idNum, $newID]);

    // Return the newly generated DietPlanID
    return $newID;
}

// Function to create a 7-day diet plan

// Function to create a 7-day diet plan
// Function to create a 7-day diet plan
// Function to create a 7-day diet plan
function createDietPlan($conn, $idNum, $targetCalorie, $goal, $diettype) {
    if (empty($idNum) || empty($targetCalorie) || empty($goal)) {
        echo "Error: One or more parameters are empty.";
        return;
    }

    // Generate a unique DietPlanID for the user's diet plan
    $dietPlanID = generateUniqueDietPlanID($conn, $idNum);

    $days = ['1', '2', '3', '4', '5', '6', '7'];
    $mealTypes = ['Breakfast', 'Lunch', 'Dinner', 'Snack'];

    // Maximum number of foods per meal
    $maxFoodsPerMeal = 3;

    // Prepare SQL statement for insertion
    $insertStatement = $conn->prepare("INSERT INTO dietplan (DietPlanID, IdNum, planName, goal, targetCalorie, Day, mealType, FoodID, Serving, DateCreated) VALUES (?, ?, '7-Day Diet Plan', ?, ?, ?, ?, ?, ?, NOW())");

     // Prepare SQL statement for updating serving
    $updateStatement = $conn->prepare("UPDATE dietplan SET Serving = Serving * 2 WHERE DietPlanID = ? AND IdNum = ? AND Day = ? AND mealType = ? AND FoodID = ?");

    // Iterate over each day
    foreach ($days as $day) {
        // Iterate over each meal type
        foreach ($mealTypes as $mealType) {
            // Determine the target calorie for this meal type
            $mealCalorie = $targetCalorie * getMealCaloriePercentage($mealType);

            // Fetch foods until the maximum number of foods per meal is reached
            $remainingCalorie = $mealCalorie;
            $foodsAdded = 0;

            // Check if this is lunch or dinner to ensure rice is included
            $includeRice = ($mealType === 'Lunch' || $mealType === 'Dinner');

            $includeProteinPowder = ($mealType === 'Breakfast');

            while ($remainingCalorie > 0 && $foodsAdded < $maxFoodsPerMeal) {

                //for breakfast
                if($mealType === 'Breakfast' && $foodsAdded === 0 && $goal == "Muscle Gain"){
                    $food = getProteinPowderForMeal($conn, $mealType, $remainingCalorie, $diettype);
                } else {
                    // Fetch any other food item
                    $food = getRandomFoodByMealType($conn, $mealType, $remainingCalorie, $diettype);
                }
                // Fetch rice for lunch or dinner as the first item
                if ($includeRice && $foodsAdded === 1) {
                    $food = getRiceForMeal($conn, $mealType, $remainingCalorie, $diettype);
                } else {
                    // Fetch any other food item
                    $food = getRandomFoodByMealType($conn, $mealType, $remainingCalorie, $diettype);
                }

                

                // If no suitable food found, break the loop
                if (!$food) {
                    break;
                }

                $foodID = $food['id'];
                $foodCalories = $food['calories'];

                $existingFood = checkExistingFood($conn, $dietPlanID, $idNum, $day, $mealType, $foodID);
                

                // Calculate the maximum serving to meet or exceed the remaining calorie limit
                $maxServing = floor($remainingCalorie / $foodCalories);

                // Limit serving to avoid exceeding the maximum number of foods per meal
                $serving = min($maxServing, $maxFoodsPerMeal - $foodsAdded);

                // Insert the food item into the diet plan
                if ($existingFood) {
                    // If the food item already exists, update the serving by doubling it
                    $updateStatement->execute([$dietPlanID, $idNum, $day, $mealType, $foodID]);
                } else {
                    // If the food item doesn't exist, insert it into the diet plan
                    $insertStatement->execute([$dietPlanID, $idNum, $goal, $mealCalorie, $day, $mealType, $foodID, $serving]);
                }
                // Subtract the calorie intake for this food item from the remaining calorie limit
                $remainingCalorie -= $foodCalories * $serving;
                $foodsAdded ++;
            }
        }
    }

    echo "Success";
}



// Function to get the calorie percentage for each meal type
function getMealCaloriePercentage($mealType) {
    switch ($mealType) {
        case 'Breakfast':
            return 0.25; // 25% of daily calorie intake for breakfast
        case 'Lunch':
            return 0.35; // 35% of daily calorie intake for lunch
        case 'Dinner':
            return 0.35; // 35% of daily calorie intake for dinner
        case 'Snack':
            return 0.05; // 5% of daily calorie intake for snack
        default:
            return 0.0;
    }
}
// Function to get rice for a specific meal
function getRiceForMeal($conn, $mealType, $calorieLimit, $diettype) {
    if ($diettype == null || $diettype == "None") {
        $query = "SELECT * FROM foods WHERE meal = ? AND name = 'Rice' AND calories <= ? ORDER BY RAND() LIMIT 1";
        $statement = $conn->prepare($query);
        $statement->execute([$mealType, $calorieLimit]);
    }
     else {
        $query = "SELECT * FROM foods WHERE meal = ? AND name = 'Rice' AND calories <= ? AND diet = ? ORDER BY RAND() LIMIT 1";
        $statement = $conn->prepare($query);
        $statement->execute([$mealType, $calorieLimit, $diettype]);
    }
    
    return $statement->fetch(PDO::FETCH_ASSOC);
}

function getProteinPowderForMeal($conn, $mealType, $calorieLimit, $diettype) {
    $query = "SELECT * FROM foods WHERE meal = ? AND name = 'Protein Powder' AND calories <= ? AND diet = ? ORDER BY RAND() LIMIT 1";
    $statement = $conn->prepare($query);
    $statement->execute([$mealType, $calorieLimit, $diettype]);
    return $statement->fetch(PDO::FETCH_ASSOC);
}


// Function to fetch random food item by meal type
function getRandomFoodByMealType($conn, $mealType, $calorieLimit, $diettype) {
    if ($diettype == null || $diettype == "None") {
        $query = "SELECT * FROM foods WHERE meal = ? AND calories <= ? AND name != 'Rice' ORDER BY RAND() LIMIT 1";
        $statement = $conn->prepare($query);
        $statement->execute([$mealType, $calorieLimit]);
    } else {
        $query = "SELECT * FROM foods WHERE meal = ? AND calories <= ? AND diet = ? AND name != 'Rice' ORDER BY RAND() LIMIT 1";
        $statement = $conn->prepare($query);
        $statement->execute([$mealType, $calorieLimit, $diettype]);
    }
    
    return $statement->fetch(PDO::FETCH_ASSOC);
}

// Function to check if the food item already exists for a particular meal on a given day
function checkExistingFood($conn, $dietPlanID, $idNum, $day, $mealType, $foodID) {
    $query = "SELECT * FROM dietplan WHERE DietPlanID = ? AND IdNum = ? AND Day = ? AND mealType = ? AND FoodID = ?";
    $statement = $conn->prepare($query);
    $statement->execute([$dietPlanID, $idNum, $day, $mealType, $foodID]);
    return $statement->fetch(PDO::FETCH_ASSOC);
}

// Retrieve POST data and call createDietPlan function
$idNum = isset($_POST["email"]) ? getUserID($_POST["email"]) : '';
$targetCalorie = isset($_POST["targetCalorie"]) ? $_POST["targetCalorie"] : '';
$goal = isset($_POST["goal"]) ? $_POST["goal"] : '';
$diettype = isset($_POST["diettype"]) ? $_POST["diettype"] : '';

createDietPlan($conn, $idNum, $targetCalorie, $goal, $diettype);
?>
