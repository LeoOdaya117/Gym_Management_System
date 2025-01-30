<?php 
session_start();

if (!isset($_SESSION['Username'])) {
  header("Location: pages-login.html");
  exit();
}

$WorkoutPlanID = $_GET["id"];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/breadcrumb.css">
    <link rel="stylesheet" href="assets/css/dietplan.css">   
  </style>
</head>
<body>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Week Plan</h1>
  <nav>
    <ol class="breadcrumb">
      <!-- <li class="breadcrumb-item"><a href="index.php">Home</a></li> -->
      <li class="breadcrumb-item" id="plan">Plan</li>
      <li class="breadcrumb-item" onclick="gotonextURL('workoutplan_noheader.php')">Workout Plans</li>
      <li class="breadcrumb-item active">Week Plan</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
  <div class="row">
        <div class="col-md-4 day" onclick="day('0')">
          <div class="card">
            <div class="card-body">
            <h5 class="card-title">Monday</h5>
              <p class="card-text">Workout Plan details for Monday...</p>
            </div>
          </div>
        </div>

        <div class="col-md-4 day" onclick="day('1')">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tuesday</h5>
              <p class="card-text">Workout Plan details for Tuesday...</p>
            </div>
          </div>
        </div>

        <div class="col-md-4 day" onclick="day('2')">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Wednesday</h5>
              <p class="card-text">Workout Plan details for Wednesday...</p>
            </div>
          </div>
        </div>

        <div class="col-md-4 day" onclick="day('3')">
          <div class="card">
            <div class="card-body">
            <h5 class="card-title">Thursday</h5>
              <p class="card-text">Workout Plan details for Thursday...</p>
            </div>
          </div>
        </div>

        <div class="col-md-4 day" onclick="day('4')">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Friday</h5>
              <p class="card-text">Workout Plan details for Friday...</p>
            </div>
          </div>
        </div>

        <div class="col-md-4 day" onclick="day('5')">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Saturday</h5>
              <p class="card-text">Workout Plan details for Saturday..</p>
            </div>
          </div>
        </div>

        <div class="col-md-4 day" onclick="day('6')">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Sunday</h5>
              <p class="card-text">Workout Plan details for Sunday...</p>
            </div>
          </div>
        </div>

        

    </div>
</section>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="assets/js/workoutplan.js"></script>
<script>
  

  function day(day) {
    const urlParams = new URLSearchParams(window.location.search);
    const WorkoutPlanID = urlParams.get('id');
    window.location.href = "today-Workout-plan_no_header.php?WorkoutPlanID=" + WorkoutPlanID + "&day=" + day;
  }



</script>

</body>
</html>


 

<?php 

include("include_user/footer.php");
?>