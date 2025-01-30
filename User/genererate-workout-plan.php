<?php 
session_start();

if (!isset($_SESSION['Username'])) {
  header("Location: pages-login.html");
  exit();
}

include("include_user/header.php");
include("include_user/nabvar.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            
            background-color: #f0f0f0;
        }

        .card-body{
          text-align: center;
          
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

        .table-responsive {
        overflow-x: auto;
        max-width: 100%;
        }

        /* Add this if you want horizontal scroll bars on smaller screens */
        @media (max-width: 767px) {
        .table-responsive {
            display: block;
            overflow-x: scroll;
        }
        }

        /* Additional styling to make the table more readable on smaller screens */
        table {
        width: 100%;
        margin: 0;
        }

        table th, table td {
        padding: 8px;
        white-space: nowrap; /* Prevent line breaks in table cells */
        }

        .table-responsive {
            max-height: 500px; /* Adjust the height as needed */
            overflow-y: scroll;
        }

    </style>
    
</head>
<body>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Workout Plan Generator</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item ">Workout Planner</li>
      <li class="breadcrumb-item active">Workout Plan Generator</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
  <div class="row">
    <div class="container-fluid">
        <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div> -->

        
    <div class="card shadow mb-4">
   

      <div class="card-body mt-4">
        <form method="post" action="">
            <label for="calories">Enter your daily calories:</label>
            <input type="number" step="0.01"  placeholder="0.00" name="calories" id="calories"><br>

            <label for="weightGoal">Select your weight goal:</label>
            <select name="weightGoal" id="weightGoal">
                <option value="Lose Weight">Lose Weight</option>
                <option value="Gain Weight">Gain Weight</option>
                <option selected value="Maintain Weight">Maintain Weight</option>
            </select><br>

            <label for="dietType">Select your diet type:</label>
            <select name="dietType" id="dietType">
                <option value="Vegetarian">Vegetarian</option>
                <option value="Non-Vegetarian">Non-Vegetarian</option>
                <option value="Random Diet">Random Diet</option>
            </select><br>

            <input type="submit" name="generateDiet" value="Generate Diet Plan" class="btn btn-success">
            <form method="post" action="">
              <input type="submit" name="saveDiet" value="Save Diet Plan" class="btn btn-primary">

            </form>
        </form>





<hr>
        
        <div id="dietplanto" class="table-responsive mt-3">
            <?php

            $dietPlan = [];

            if (isset($_POST["generateDiet"])) {
               

                // Get user input
                $calories = (float)$_POST["calories"];
                $_SESSION['calories'] = $calories;
                $weightGoal = $_POST["weightGoal"];
                if (isset($_POST["dietType"])) {
                    $diet = $_POST["dietType"];
                } else {
                    // Handle the case where "dietType" is not set
                    $diet = "Random Diet"; // Set a default value or handle it as needed
                }

                if( $weightGoal === 'Lose Weight'){
                    $calories = $calories - (500);
                }
                else if($weightGoal === 'Gain Weight') {
                    $calories = $calories + (500);
                }
                $_SESSION['dietType'] =$diet;
                
                $_SESSION['weightGoal'] =$weightGoal;
                
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
                $lunchCalories = ($calories * 0.40); // 35% of daily calories, divided by 7 days
                $dinnerCalories = ($calories * 0.30); // 25% of daily calories, divided by 7 days

                // Generate the diet plan
                for ($day = 1; $day <= 7; $day++) {
                    $mealTypes = ['breakfast', 'lunch', 'dinner'];

                    echo "<table id='exampletable' class='text-center mb-3'>";
                    echo "<tr><th colspan='7' class='text-center bg-success '><h4 class='fw-bold'>Day $day</h4></th></tr>";
                    echo "<tr>
                        <th class='text-center'>MEAL TYPE</th>
                        <th class='text-center'>FOOD</th>
                        <th class='text-center'>SERVING</th>
                        <th class='text-center'>CALORIES</th>
                        <th class='text-center'>PROTEIN</th>
                        <th class='text-center'>CARB</th>
                        <th class='text-center'>FATS</th>
                        </tr>";
                        $totalCaloriesInADay = 0;
                        $totalProteinInADay = 0;
                        $totalFatInADay = 0;
                        $totalCarbohydratesInADay = 0;

                    foreach ($mealTypes as $mealType) {
                        echo "<tr class='text-center'><th class='text-center'>$mealType</th></tr>";

                        if ($mealType === 'breakfast') {
                            $mealCalories = $breakfastCalories;
                        } elseif ($mealType === 'lunch') {
                            $mealCalories = $lunchCalories;
                        } else {
                            $mealCalories = $dinnerCalories;
                        }

                        $totalMealCalories = 0;
                        $totalMealProtein = 0;
                        $totalMealFat = 0;
                        $totalMealCarbohydrates = 0;
                        $foodsInMeal = []; // Array to store foods in this meal

                        while ($totalMealCalories < $mealCalories) {
                            $food = selectFood($conn, $mealType, $mealCalories - $totalMealCalories, $diet);
                            if (!$food) {
                                break;
                            }

                            // Check if the food is already in the meal
                            $foodIndex = array_search($food['name'], array_column($foodsInMeal, 'name'));

                            if ($foodIndex !== false) {
                                // If the food is in the meal, update its serving and calories
                                $foodsInMeal[$foodIndex]['serving'] += $food['serving'];
                                $foodsInMeal[$foodIndex]['calories'] += $food['calories'];
                                $foodsInMeal[$foodIndex]['protein'] += $food['protein'];
                                $foodsInMeal[$foodIndex]['fat'] += $food['fat'];
                                $foodsInMeal[$foodIndex]['carbohydrates'] += $food['carbohydrates'];
                            } else {
                                // If the food is not in the meal, add it to the meal
                                $foodsInMeal[] = $food;
                            }

                            $totalMealCalories += $food['calories'];
                            $totalMealProtein += $food['protein'];
                            $totalMealFat += $food['fat'];
                            $totalMealCarbohydrates += $food['carbohydrates'];
                        }
                        $totalCaloriesInADay += $totalMealCalories;
                        $totalProteinInADay += $totalMealProtein;
                        $totalFatInADay += $totalMealFat;
                        $totalCarbohydratesInADay += $totalMealCarbohydrates;

                        // Display the foods in this meal
                        foreach ($foodsInMeal as $foodInMeal) {
                            echo "<tr><td></td><td class='food-name text-center'>" . $foodInMeal['name'] . "</td><td text-center>" . $foodInMeal['serving'] . "g</td>
                            <td class='calories text-center'>" . $foodInMeal['calories'] . "kcal</td>
                            <td class='protein text-center'>" . $foodInMeal['protein'] . "g</td>
                            <td class='carbohydrates text-center'>" . $foodInMeal['carbohydrates'] . "g</td>
                            <td class='fat text-center'>" . $foodInMeal['fat'] . "g</td>
                            </tr>";
                        }
                        //var_dump($foodsInMeal);
                        $dietPlan[] = $foodsInMeal;

                    }

                    // Calculate and display the total calories for the day
                    echo "<tr><th colspan='3'>TOTAL</th><td>$totalCaloriesInADay kCal</td>";
                    echo "<td>$totalProteinInADay g</td>";
                
                    echo "<td>$totalCarbohydratesInADay g</td>";
                    echo "<td>$totalFatInADay g</td></tr>";
                    echo "</table>";
                   
                }
                $conn->close();
                $_SESSION['dietPlan'] = $dietPlan;
            
            }

            function selectFood($conn, $mealType, $remainingCalories, $diet) {
                $sql = "SELECT * FROM foods WHERE meal = ? AND calories <= ? AND diet = ? ORDER BY RAND() LIMIT 1";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sdd", $mealType, $remainingCalories, $diet);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    return $result->fetch_assoc();
                } else {
                    return null;
                }
            }

            
            if (isset($_POST["saveDiet"])) {
                $dietPlan = $_SESSION['dietPlan'];
                $diet = $_SESSION['dietType'];
                $calories = $_SESSION['calories'];
                $weightGoal = $_SESSION['weightGoal'];
                $userId = $_SESSION['Username'];
                $dietPlanSerialized = serialize($dietPlan);
                
                // Create a timestamp for the current time
                date_default_timezone_set('Asia/Manila');
                $timestamp = date('Y-m-d H:i:s'); // Format as 'YYYY-MM-DD HH:MM:SS'
            
                // Prepare the SQL query with placeholders
                $sql = "INSERT INTO diet_plans (user_id, calories, weight_goal, diet_type, diet_plan, created_at) VALUES (:user_id, :calories, :weight_goal, :diet_type, :diet_plan, :created_at)";
                $stmt = $conn->prepare($sql);
            
                if ($stmt) {
                    // Bind values to the placeholders
                    $stmt->bindValue(':user_id', $userId);
                    $stmt->bindValue(':calories', $calories);
                    $stmt->bindValue(':weight_goal', $weightGoal);
                    $stmt->bindValue(':diet_type', $diet);
                    $stmt->bindValue(':diet_plan', $dietPlanSerialized);
                    $stmt->bindValue(':created_at', $timestamp); // Bind the timestamp
            
                    if ($stmt->execute()) {
                        echo "<script>alert('Diet plan saved successfully.');</script>";
                    } else {
                        echo "<script>alert('Error saving the diet plan.');</script>";
                    }
                } else {
                    echo "<script>alert('Error preparing the statement.');</script>";
                }
            
                $conn = null; // Close the PDO connection
            }
            
            
            

            // function saveDietPlans($conn, $userId, $calories, $weightGoal, $diet, $dietPlans) {
            //     $sql = "INSERT INTO diet_plans (user_id, calories, weight_goal, diet_type, diet_plan) VALUES (?, ?, ?, ?, ?)";
            //     $stmt = $conn->prepare($sql);

            //     if ($stmt) {
            //         foreach ($dietPlans as $dayPlan) {
            //             $dietPlan = serialize($dayPlan);
            //             $stmt->bind_param("issss", $userId, $calories, $weightGoal, $diet, $dietPlan);
            //             if (!$stmt->execute()) {
            //                 return false;
            //             }
            //         }
            //         return true;
            //     }
            //     return false;
            // }
            // function captureHTMLContent() {
            //     ob_start(); // Start output buffering
            //     include('generate-diet-plan.php'); // Replace with the filename of your template
            //     $content = ob_get_clean(); // Get the buffered content
            //     return $content;
            // }
            
        
            
            
            ?>
        
    </div>
</div>
</div>



        
    
    </div>
</div>
</section>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="assets/js/user-index.js"></script>
<script src="assets/js/navbar.js"></script>
</body>
</html>
 

<?php 

include("include_user/footer.php");
?>