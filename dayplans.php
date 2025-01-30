<?php
session_start();

if (!isset($_SESSION['Username'])) {
  header("Location: home.php");
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

    .holder {
      overflow-y: auto; /* Enable vertical scrolling when needed */
    }

    .day {
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

    /* Styling for current day and previous days */
    .current-day,
    .previous-days {
      font-size: 14px;
      margin-bottom: 10px;
    }

    .current-day {
      color: #007bff;
      display: flex;
      justify-content: space-between;
    }

    .back-button {
      font-size: 14px;
      color: #007bff;
      cursor: pointer;
      display: flex;
      align-items: center;
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

  <div class="holder">
    <div class="card">
      <div class="card-header bg-dark">
        <h2 class="text-center mb-0">Day 1 Exercies</h2>
      </div>
      <div class="card-body">

        
        <div class="current-day">
        <div class="back-button" onclick="goBack()">
        <i class="fas fa-arrow-left left"></i><span class="ml-1">Back</span>
        </div>
         
        </div>

       


        <div class="row">
            


            <div class="col-md-4 day">
                <div class="card mb-3 exercise-card">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://elements-video-cover-images-0.imgix.net/607353d0-90ae-4323-9b95-90cbc1b4a895/video_preview/video_preview_0000.jpg?auto=compress&h=800&w=1200&fit=crop&crop=edges&fm=jpeg&s=0c6e4f28586dff445074ec6e3c48a900" class="img-fluid rounded-start exercise-img" alt="Exercise 1">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body exercise-content">
                                <h5 class="card-title">Exercise Name</h5>
                                <p class="card-text">Exercise Description</p>
                                <p class="card-text d-block">
                                    <small class="text-body-secondary">Number of Reps: 10</small> 
                                    <button class="btn btn-primary ">Done</button>
                                </p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            

          <!-- Repeat the above structure for the remaining previous days -->

        </div>

      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

  <script>
    function goBack(){
      window.location.href = "weekplans.php";

    }
  </script>
</body>

</html>

<?php
include('include_user/scripts.php');
//include('includes/footer.php');
?>
