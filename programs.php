<?php
session_start();

if (!isset($_SESSION['Username'])) {
  header("Location: index.php");
  exit();
}

if (isset($_GET['tab'])) {

  $_SESSION['currentTab'] = $_GET['tab'];
}

if (isset($_SESSION["AccountType"])) {
  if ($_SESSION["AccountType"] == "Admin") {
    include('includes/header.php');
    include('includes/navbar.php');
  } else {
    include('include_user/header.php');
    include('include_user/navbar.php');
    include('config.php');
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="cache-control" content="no-cache">
  <meta http-equiv="expires" content="0">
  <meta http-equiv="pragma" content="no-cache">

  <title>Programs</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link rel="stylesheet" href="/css/myprofile.css">

  <style>
    /* Add some additional styling for better visualization */
    body {
      background-color: #ffffff;
    }

    .holder{

        overflow-y: auto; /* Enable vertical scrolling when needed */

    }

    .week {
      margin-bottom: 20px;
    }

    .card {
      border: 1px solid #dee2e6;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: box-shadow 0.3s ease-in-out;
      overflow-y: auto;
    }

    .card:hover {
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    /* Styling for current week and previous weeks */
    .current-week,
    .previous-weeks {
      font-size: 14px;
      margin-bottom: 10px;
    }

    .current-week {
      color: #007bff;
    }

    /* Styling for card header */
    .card-header {
      color: white;
      font-size: 18px;
      font-weight: bold;
      padding: 10px;
      border-radius: 8px 8px 0 0;
    }
  </style>
</head>

<body>

  <div clas="holder">
    <div class="card">
      <div class="card-header bg-dark">
        <h2 class="text-center mb-0">Workout Plans</h2>
      </div>
      <div class="card-body">



        <div class="current-week">Current Week:</div>

        <!-- RECORDS OF CURRENT GENERATED WORKOUT PLAN -->


        <div class="row">
          <div class="col-md-4 week">
            <div class="card">
              <div class="card-body">
                <a href="weekplans.php"><h5 class="card-title">Week 3</h5></a>
                <p class="card-text">Plan details for Week 3...</p>
              </div>
            </div>
          </div>

        </div>

        <hr class="my-2">

        <div class="previous-weeks">Previous Weeks:</div>

        <!-- RECORDS OF PREVIOUS GENERATED WORKOUT PLAN -->

        <div class="row">
          <div class="col-md-4 week">
            <div class="card">
              <div class="card-body">
              <a href="weekplans.php"><h5 class="card-title">Week 1</h5></a>
                <p class="card-text">Plan details for Week 1...</p>
              </div>
            </div>
        </div>

          

      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

</body>

</html>

<?php
include('include_user/scripts.php');
//include('includes/footer.php');
?>
