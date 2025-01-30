
<?php 
session_start();

if (!isset($_SESSION['Username'])) {
  header("Location: pages-login.html");
  exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/dietplan.css">
    <link rel="stylesheet" href="assets/css/breadcrumb.css">
</head>
<body>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Diet Plans</h1>
  <nav>
    <ol class="breadcrumb">

      <li class="breadcrumb-item" id="plan">Plan</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
<div class="row">
    <div class="container-fluid">
      <div clas="holder">
        <div class="">
         
            <div class="current-week">Current Diet Plan:</div>

            <!-- RECORDS OF CURRENT GENERATED WORKOUT PLAN -->
            

            <hr>

            <div class="previous-weeks">Previous Diet Plans:</div>

            <!-- RECORDS OF PREVIOUS GENERATED WORKOUT PLAN -->
       
        </div>
      </div>
    </div>
  </div>
</section>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="assets/js/dietplan.js"></script>
<!-- <script src="assets/js/navbar.js"></script> -->
<script>
$(document).ready(function() {
    // Make AJAX call to fetch current and previous diet plans
    $.ajax({
        url: 'api/get_diet_plans.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            // Update HTML content with the fetched data
            // Example: update current diet plan
            var currentDietPlanHTML = '';
            if (response.currentDietPlan.length === 0) {
                currentDietPlanHTML += '<div class="col-md-4 week">';
                currentDietPlanHTML += '<div class="card">';
                currentDietPlanHTML += '<div class="card-body">';
                currentDietPlanHTML += '<h5 class="card-title">No current records</h5>';
                currentDietPlanHTML += '<p class="card-text">There are no current diet plans available.</p>';
                currentDietPlanHTML += '</div></div></div>';
            } else {
                response.currentDietPlan.forEach(function(plan) {
                    currentDietPlanHTML += '<div class="col-md-4 week" onclick="dietplan(' + plan.DietPlanID + ')">';
                    currentDietPlanHTML += '<div class="card">';
                    currentDietPlanHTML += '<div class="card-body">';
                    currentDietPlanHTML += '<h5 class="card-title">Week ' + plan.DietPlanID + '</h5>';
                    currentDietPlanHTML += '<p class="card-text">Plan details for Week ' + plan.DietPlanID + '...</p>';
                    currentDietPlanHTML += '</div></div></div>';
                });
            }
            $('.current-week').after(currentDietPlanHTML);

            // Example: update previous diet plans
            var previousDietPlansHTML = '';
            if (response.previousDietPlans.length === 0) {
                previousDietPlansHTML += '<div class="col-md-4 week">';
                previousDietPlansHTML += '<div class="card">';
                previousDietPlansHTML += '<div class="card-body">';
                previousDietPlansHTML += '<h5 class="card-title">No previous records</h5>';
                previousDietPlansHTML += '<p class="card-text">There are no previous diet plans available.</p>';
                previousDietPlansHTML += '</div></div></div>';
            } else {
                response.previousDietPlans.forEach(function(plan) {
                    previousDietPlansHTML += '<div class="col-md-4 week" onclick="dietplan(' + plan.DietPlanID + ')">';
                    previousDietPlansHTML += '<div class="card previous-week-card">';
                    previousDietPlansHTML += '<div class="card-body">';
                    previousDietPlansHTML += '<h5 class="card-title">Diet Plan ' + plan.DietPlanID + '</h5>';
                    previousDietPlansHTML += '<p class="card-text">Diet Plan details for Diet Plan ' + plan.DietPlanID + '...</p>';
                    previousDietPlansHTML += '</div></div></div>';
                });
            }
            $('.previous-weeks').after(previousDietPlansHTML);

        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});
  

  function dietplan(DietPlanID) {
    
    window.location.href = "7days-diet-plan_noheader.php?id=" + DietPlanID;
  }

      // Get the reference to the <li> element
    var planElement = document.getElementById("plan");

    // Add a click event listener to the <li> element
    planElement.addEventListener("click", function() {
        // Get the current URL
        var currentUrl = window.location.href;

        // Check if the URL already contains parameters
        var separator = currentUrl.includes("?") ? "&" : "?";

        // Add or update the parameter 'type=plan' to the URL
        var newUrl = currentUrl + separator + "type=plan";

        // Redirect the user to the new URL
        window.location.href = newUrl;
    });

  </script>
</body>
</html>

