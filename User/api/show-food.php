<?php
include("../config.php");
function getDietPlan($conn, $idNum) {
    $query = "SELECT dp.*, f.name AS FoodName, f.calories
              FROM dietplan dp
              JOIN foods f ON dp.FoodID = f.id
              WHERE dp.IdNum = :idNum AND dp.DietPlanID = (
                  SELECT MAX(DietPlanID) FROM dietplan WHERE IdNum = :idNum
              )
              ORDER BY dp.Day, FIELD(dp.mealType, 'Breakfast', 'Lunch', 'Dinner', 'Snack')";
    
    $statement = $conn->prepare($query);
    $statement->bindParam(':idNum', $idNum);
    $statement->execute();
    $dietPlanItems = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Group diet plan items by day and meal
    $groupedDietPlan = [];
    foreach ($dietPlanItems as $item) {
        $day = $item['Day'];
        $mealType = $item['mealType'];
        $groupedDietPlan[$day][$mealType][] = $item;
    }

    return $groupedDietPlan;
}



$idNum = 20240207002; // Example idNum
$dietPlan = getDietPlan($conn, $idNum);

// Display the latest diet plan
foreach ($dietPlan as $day => $meals) {
    echo "<h2>Day $day</h2>";
    $totalCaloriesDay = 0; // Initialize total calorie for the day
    foreach ($meals as $mealType => $items) {
        echo "<h3>$mealType</h3>";
        foreach ($items as $item) {
            echo "<p>Food Name: {$item['FoodName']}</p>";
            echo "<p>Serving: {$item['Serving']} g</p>";
            echo "<p>Calories: {$item['calories']} kcal</p>";
            echo "<hr>";
            $totalCaloriesDay += $item['calories']; // Add calories for this meal to total calories for the day
        }
        // Calculate and display total calorie for the meal
        $totalCaloriesMeal = array_sum(array_column($items, 'calories'));
        echo "<p><strong>Total Calories for $mealType: $totalCaloriesMeal kcal</strong></p>";
    }
    // Display total calorie for the day
    echo "<p><strong>Total Calories for Day $day: $totalCaloriesDay kcal</strong></p>";
}

?>
