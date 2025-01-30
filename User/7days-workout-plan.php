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
    /* Add some additional styling for better visualization */

    .holder {
        overflow-y: auto; /* Enable vertical scrolling when needed */
    }

    /* Styling for card */
    .card {
      border: 1px solid #dee2e6;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: box-shadow 0.3s ease-in-out;
      overflow-y: auto;
      margin-bottom: 20px;
    }

    .card:hover {
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    /* Styling for card header */
    .card-header {
      color: white;
      font-size: 18px;
      font-weight: bold;
      padding: 10px;
      border-radius: 8px 8px 0 0;
    }

    /* Styling for current week card */
    .current-week {
      font-size: 14px;
      margin-bottom: 10px;
      color: #007bff;
    }

    /* Styling for previous week card */
    .previous-weeks {
      font-size: 14px;
      margin-bottom: 10px;
    }

    /* Background color for previous week card */
    .previous-week-card {
      background-color: #f8d7da; /* Example color for previous week card */
    }
  </style>
</head>
<body>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Week Plan</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">Workout Planner</li>
      <li class="breadcrumb-item"><a href="workoutplans.php">Workout Plans</a></li>
      <li class="breadcrumb-item active">Week Plan</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
<div class="row">
          <div class="col-md-4 day">
            <div class="card">
              <div class="card-body">
                <a href="today-Workout-plan.php?day=1"><h5 class="card-title">Day 1</h5></a>
                <p class="card-text">Workout Plan details for Day 1...</p>
              </div>
            </div>
          </div>

          <div class="col-md-4 day">
            <div class="card">
              <div class="card-body">
              <a href="today-Workout-plan.php?day=2"><h5 class="card-title">Day 2</h5></a>
                <p class="card-text">Workout Plan details for Day 2...</p>
              </div>
            </div>
          </div>

          <div class="col-md-4 day">
            <div class="card">
              <div class="card-body">
              <a href="today-Workout-plan.php?day=3"><h5 class="card-title">Day 3</h5></a>
                <p class="card-text">Workout Plan details for Day 3...</p>
              </div>
            </div>
          </div>

          <div class="col-md-4 day">
            <div class="card">
              <div class="card-body">
                <a href="today-Workout-plan.php?day=4"><h5 class="card-title">Day 4</h5></a>
                <p class="card-text">Workout Plan details for Day 4...</p>
              </div>
            </div>
          </div>

          <div class="col-md-4 day">
            <div class="card">
              <div class="card-body">
              <a href="today-Workout-plan.php?day=5"><h5 class="card-title">Day 5</h5></a>
                <p class="card-text">Workout Plan details for Day 5...</p>
              </div>
            </div>
          </div>

          <div class="col-md-4 day">
            <div class="card">
              <div class="card-body">
              <a href="today-Workout-plan.php?day=6"><h5 class="card-title">Day 6</h5></a>
                <p class="card-text">Workout Plan details for Day 6...</p>
              </div>
            </div>
          </div>

          <div class="col-md-4 day">
            <div class="card">
              <div class="card-body">
              <a href="today-Workout-plan.php?day=7"><h5 class="card-title">Day 7</h5></a>
                <p class="card-text">Workout Plan details for Day 7...</p>
              </div>
            </div>
          </div>

          <!-- Repeat the above structure for the remaining previous days -->

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