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
<html>
<head>
    <title>Calorie Calculator</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
  
    <style>

        #title {
            background-color: #333;
            color: #fff;
            padding: 10px;
            margin-bottom: 4rem;
        }

        /* Add a specific class to target the main form */
        .main-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 5px #888;
            width: 90%; /* Set the width to 90% of the container */
            max-width: 600px; /* Limit the maximum width to 600px */
            margin: 0 auto; /* Center the container horizontally */
        }

        /* Restyle other elements as needed */
        .main-form label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
            width: auto;
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


<main id="main" class="main">

<div class="pagetitle">
  <h1>BMR Calculator</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">BMR Calculator</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
    <div class="row">
        <div class="container-fluid">

          
                
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
   

            <div class="modal" id="resultModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">BMR Result</h5>
                        
                            
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closebtn">Close</button>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>
</section>
</main>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="assets/js/navbar.js"></script>
    <script>
            $(document).ready(function() {

                $("#calculateButton").click(function() {


                    // Get form values
                    var gender = $("input[name='gender']:checked").val();
                    var weight = parseFloat($("input[name='weight']").val());
                    var height = parseFloat($("input[name='height']").val());
                    var age = parseInt($("input[name='age']").val()); // Fix here
                    var activity = $("select[name='activity']").val();


                    // Check if any field is empty
                    if (!gender || !weight || !height || !age || !activity) {
                        // Show error message if any field is empty
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Please fill in all fields!',
                        });
                        return; // Stop further execution
                    }

                    // Perform your calculations here
                    var bmr = 0;
                    var dailyCalories = 0;

                    if (gender === 'male') {
                        bmr = 88.362 + (13.397 * weight) + (4.799 * height) - (5.677 * age);
                    } else if (gender === 'female') {
                        bmr = 447.593 + (9.247 * weight) + (3.098 * height) - (4.330 * age);
                    }

                    var activityFactors = {
                        'Sedentary (little or no exercise)': 1.2,
                        'Lightly active (light exercise or sports 1-3 days a week)': 1.375,
                        'Moderately active (moderate exercise or sports 3-5 days a week)': 1.55,
                        'Very active (hard exercise or sports 6-7 days a week)': 1.725,
                        'Super active (very hard exercise, physical job, or training twice a day)': 1.9
                    };

                    dailyCalories = bmr * activityFactors[activity];
                    bmr = bmr.toFixed(2);
                    dailyCalories = dailyCalories.toFixed(2);

                    // Build result HTML
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
                var formData = $("#resultForm").serialize();

                // Check if the form is valid
                if (!$('#resultForm')[0].checkValidity()) {
                    // If the form is not valid, show an error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please fill in all fields!',
                    });
                    return; // Stop further execution
                }

                // If the form is valid, show a confirmation message
                Swal.fire({
                    icon: 'info',
                    title: 'Confirmation',
                    text: 'Are you sure you want to save this result?',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If the user confirms, proceed with saving the result
                        $.ajax({
                            type: "POST",
                            url: "save_bmr.php",
                            data: formData,
                            success: function(response) {
                                // Show success message and reset form
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: response,
                                    showConfirmButton: true,
                                }).then(function() {
                                    $("#resultModal").modal("hide");
                                    document.getElementById("calculatorForm").reset();
                                });
                            }
                        });
                    }
                });
            });

            });


            

    </script>




    
    

</body>
</html>
 

<?php 

include("include_user/footer.php");
?>