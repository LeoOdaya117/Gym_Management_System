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

          
                
        
    </div>
    <form id="calculatorForm" class="main-form">
        <label for="weight">Weight (kg):</label>
        <input type="number" name="weight" step="0.01" required><br>

        <label for="height">Height (cm):</label>
        <input type="number" name="height" step="0.01" required><br>

        <button type="button" id="calculateButton">Calculate BMI</button>
    </form>

    <div class="modal" id="resultModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">BMI Result</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalResult">
                    <div class="form-container">
                        <form id="resultForm">
                            <div class="form-group">
                                <label for="bmi">BMI:</label>
                                <input type="text" class="form-control" id="bmi" name="bmi" readonly>
                            </div>
                            <div class="form-group">
                                <label for="classification">Classification:</label>
                                <input type="text" class="form-control" id="classification" name="classification" readonly>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="saveButton" class="btn btn-primary">Save Result</button>
                    <button type="button" class="closebtn btn" data-dismiss="modal">Close</button>
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
                var weight = parseFloat($("input[name='weight']").val());
                var height = parseFloat($("input[name='height']").val());

                // Check if any field is empty
                if (!weight || !height) {
                    // Show error message if any field is empty
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please fill in all fields!',
                    });
                    return; // Stop further execution
                }

                // Calculate BMI
                var bmi = weight / ((height / 100) * (height / 100));
                bmi = bmi.toFixed(2);

                // Determine BMI classification
                var classification;
                if (bmi < 18.5) {
                    classification = "Underweight";
                } else if (bmi >= 18.5 && bmi < 25) {
                    classification = "Normal weight";
                } else if (bmi >= 25 && bmi < 30) {
                    classification = "Overweight";
                } else {
                    classification = "Obese";
                }

                // Display result in the modal
                $("#bmi").val(bmi);
                $("#classification").val(classification);
                $("#resultModal").modal("show");
            });

            $("#saveButton").click(function() {
                // Here, you can send the form data to your server or save it locally using JavaScript
                var formData = $("#resultForm").serialize();

                // Show success message and reset form
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'BMI result saved!',
                    showConfirmButton: true,
                }).then(function() {
                    $("#resultModal").modal("hide");
                    document.getElementById("calculatorForm").reset();
                });
            });
        });
    </script>




    
    

</body>
</html>
 

<?php 

include("include_user/footer.php");
?>