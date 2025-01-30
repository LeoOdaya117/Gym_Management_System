<?php


session_start();

if (!isset($_SESSION['Username'])) {
  header("Location: home.php");
  exit();
}

if (isset($_GET['tab'])) {

    $_SESSION['currentTab'] = $_GET['tab'];
  }

include('include_user/header.php');
include('include_user/navbar.php');
include('config.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Calorie Calculator</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

    
  
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
            margin-bottom: 4rem;
        }

        /* Add a specific class to target the main form */
        .main-form {
            background-color: #fff;
            margin-top: -2rem;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 5px #888;
            display: inline-block;
        }

        /* Restyle other elements as needed */
        .main-form label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        .main-form input[type="text"],
        .main-form input[type="number"],
        .main-form select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .main-form input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .main-form input[type="submit"]:hover {
            background-color: #555;
        }

        /* Add a container with custom background for the modal form */
        .form-container {
                background-color: #f0f0f0;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0px 0px 5px #888;
            }

       
    </style>
</head>
<body>


<div class="container">
        <h1>Calorie Calculator</h1>
        <form id="calculatorForm" class="main-form">
            <label for="gender">Gender:</label>
            <input type="radio" name="gender" value="male" required> Male
            <input type="radio" name="gender" value="female" required> Female<br>

            <label for="weight">Weight (kg):</label>
            <input type="number" name="weight" step="0.01" required><br>

            <label for="height">Height (cm):</label>
            <input type="number" name="height" step="0.01" required><br>

            <label for="age">Age (years):</label>
            <input type="number" name="age" required><br>

            <label for="activity">Activity Level:</label>
            <select name="activity" required>
                <option value="Sedentary (little or no exercise)">Sedentary (little or no exercise)</option>
                <option value="Lightly active (light exercise or sports 1-3 days a week)">Lightly active (light exercise or sports 1-3 days a week)</option>
                <option value="Moderately active (moderate exercise or sports 3-5 days a week)">Moderately active (moderate exercise or sports 3-5 days a week)</option>
                <option value="Very active (hard exercise or sports 6-7 days a week)">Very active (hard exercise or sports 6-7 days a week)</option>
                <option value="Super active (very hard exercise, physical job, or training twice a day)">Super active (very hard exercise, physical job, or training twice a day)</option>
            </select><br>

            <!-- <label for="weightLossRate">Desired Weight Loss Rate (lb/week):</label>
            <input type="number" name="weightLossRate" step="0.01" required><br> -->
            <br>
            <button type="button" id="calculateButton" class="btn btn-primary">Calculate</button>
        </form>
    </div>

    <div class="modal" id="resultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">BMR Result</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalResult">
                <!-- Add a container with a custom background for the form -->
                <div class="form-container">
                    <form id="resultForm">
                        <div class="form-group">
                            <label for="bmr">BMR:</label>
                            <input type="text" class="form-control" id="bmr" name="bmr" readonly>
                        </div>
                        <div class="form-group">
                            <label for="activityLevel">Activity Level:</label>
                            <input type="text" class="form-control" id="activityLevel" name="activityLevel" readonly>
                        </div>
                        <div class="form-group">
                            <label for="dailyCalories">Daily Calorie Target:</label>
                            <input type="text" class="form-control" id="dailyCalories" name="dailyCalories" readonly>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="saveButton" class="btn btn-primary">Save Result</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#calculateButton").click(function() {
                // Get form values
        
                var gender = $("input[name='gender']:checked").val();
                var weight = parseFloat($("input[name='weight']").val());
                var height = parseFloat($("input[name='height']").val());
                var age = parseInt($("input[name='age']").val());
                var activity = $("select[name='activity']").val();
                // var weightLossRate = parseFloat($("input[name='weightLossRate']").val());

                // Perform your calculations here
               // Inside the click function for the "Calculate" button
                var bmr = 0;
                var dailyCalories = 0;
                // var weightLossCalories = 0;

                if (gender === 'male') {
                    bmr = 88.362 + (13.397 * weight) + (4.799 * height) - (5.677 * age);
                } else if (gender === 'female') {
                    bmr = 447.593 + (9.247 * weight) + (3.098 * height) - (4.330 * age);
                }

                var activityFactors = {
                    'Sedentary (little or no exercise)': 1.2,
                    'Lightly active (light exercise or sports 1-3 days a week)': 1.375,
                    'Moderately active (moderate exercise or sports 3-5 days a week)	': 1.55,
                    'Very active (hard exercise or sports 6-7 days a week)': 1.725,
                    'Super active (very hard exercise, physical job, or training twice a day)': 1.9
                };

                dailyCalories = bmr * activityFactors[activity];
                //var calorieDeficit = weightLossRate * 3500;
                // weightLossCalories =  calorieDeficit - dailyCalories;

                bmr = bmr.toFixed(2);
                dailyCalories = dailyCalories.toFixed(2);
                // weightLossCalories = weightLossCalories.toFixed(2);

                // Build result HTMl

                var bmr_resultdocument = document.getElementById("bmr");
                bmr_resultdocument.value = bmr + " kcal";
                var activityLevel_resultdocument = document.getElementById("activityLevel");
                activityLevel_resultdocument.value = activity;
                var dailyCalories_resultdocument = document.getElementById("dailyCalories");
                dailyCalories_resultdocument.value = dailyCalories + " kcal";
                // Show the modal
                $("#resultModal").modal("show");
            });

            $("#saveButton").click(function() {
                // Here, you can send the form data to your server or save it locally using JavaScript
                // Example: send the form data to the server using AJAX
                var formData = $("#resultForm").serialize();
                $.ajax({
                    type: "POST",
                    url: "save_bmr.php", // Replace with the actual URL to handle the data
                    data: formData,
                    success: function(response) {
                        // Handle the server's response if needed
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response,
                            showConfirmButton: true,
                        }).then(function() {
                            window.location.href = 'bmrcalculator.php';  
                        });
                    }
                });
            });
        });
    </script>


    
    
</body>
</html>
<?php
include('include_user/scripts.php');
//include('includes/footer.php');
?>