<?php


session_start();

if (!isset($_SESSION['Username'])) {
  header("Location: home.php");
  exit();
}
if (isset($_GET['tab'])) {

    $_SESSION['currentTab'] = $_GET['tab'];
  }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Diet Plan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f0f0f0;
        }

        h1 {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 5px #888;
            display: inline-block;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0px 0px 5px #888;
        }

        th, td {
            border: 1px solid #ddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .meal-type {
            font-weight: bold;
        }

        .food-name {
            font-weight: normal;
        }
    </style>
</head>
<body>
    <h1>Diet Plan</h1>
    <form method="post" action="">
        <label for="calories">Enter your daily calories:</label>
        <input type="number" name="calories" id="calories" required><br>

        <label for "weightGoal">Select your weight goal:</label>
        <select name="weightGoal" id="weightGoal">
            <option value="Lose Weight">Lose Weight</option>
            <option value="Gain Weight">Gain Weight</option>
            <option value="Maintain Weight"></option>Maintain Weight</option>

        </select><br>

        <input type="submit" value="Generate Diet Plan">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get user input
        $calories = (float)$_POST["calories"];
        $weightGoal = (float)$_POST["weightGoal"];

        if( $weightGoal === -500){

            $calories = $calories - (500);

        }
        else if($weightGoal === 500)
        {
            $calories = $calories + (500);
        }

        // Database connection
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "gymdb";

        $conn = new mysqli($host, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Calculate daily calories for each meal based on percentages
        $breakfastCalories = ($calories * 0.30); // 30% of daily calories, divided by 7 days
        $lunchCalories = ($calories * 0.40) ; // 35% of daily calories, divided by 7 days
        $dinnerCalories = ($calories * 0.30); // 25% of daily calories, divided by 7 days

        // Generate the diet plan
        for ($day = 1; $day <= 7; $day++) {
            echo "<h2>Day $day</h2>";

            $mealTypes = ['breakfast', 'lunch', 'dinner'];

            echo "<table>";
            echo "<tr><th>MEAL TYPE</th><th>FOOD</th><th>SERVING</th><th>CALORIES</th></tr>";
            $totalCaloriesInADay = 0;
            foreach ($mealTypes as $mealType) {
                echo "<tr><th>$mealType</th></tr>";

                if ($mealType === 'breakfast') {
                    $mealCalories = $breakfastCalories;
                } elseif ($mealType === 'lunch') {
                    $mealCalories = $lunchCalories;
                } else {
                    $mealCalories = $dinnerCalories;
                }

                $totalMealCalories = 0;
                $foodsInMeal = []; // Array to store foods in this meal

                while ($totalMealCalories < $mealCalories) {
                    $food = selectFood($conn, $mealType, $mealCalories - $totalMealCalories);
                    if (!$food) {
                        break;
                    }

                    // Check if the food is already in the meal
                    $foodIndex = array_search($food['name'], array_column($foodsInMeal, 'name'));

                    if ($foodIndex !== false) {
                        // If the food is in the meal, update its serving and calories
                        $foodsInMeal[$foodIndex]['serving'] += $food['serving'];
                        $foodsInMeal[$foodIndex]['calories'] += $food['calories'];
                    } else {
                        // If the food is not in the meal, add it to the meal
                        $foodsInMeal[] = $food;
                    }

                    $totalMealCalories += $food['calories'];
                }
                $totalCaloriesInADay = $totalCaloriesInADay + $totalMealCalories;
                // Display the foods in this meal
                foreach ($foodsInMeal as $foodInMeal) {
                    echo "<tr><td></td><td class='food-name'>" . $foodInMeal['name'] . "</td><td>" . $foodInMeal['serving'] . "g</td><td>" . $foodInMeal['calories'] . "kcal</td></tr>";
                }
            }

            // Calculate and display the total calories for the day
            echo "<tr><th colspan='3'>TOTAL</th><td>$totalCaloriesInADay kCal</td></tr>";
            echo "</table>";
        }



        
        
        $conn->close();
    }

    function selectFood($conn, $mealType, $remainingCalories) {
        $sql = "SELECT * FROM foods WHERE meal = ? AND calories <= ? ORDER BY RAND() LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sd", $mealType, $remainingCalories);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
    ?>
</body>
</html>
