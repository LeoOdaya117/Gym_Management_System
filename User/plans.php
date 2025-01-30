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
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
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
    width: 100%; 
    height: 150px; 
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


  body{
    padding: 20px;
  }

  .image-container {
  position: relative;
  width: 100%;
  height: auto;
  border-radius: 10px;
  overflow: hidden;
  }

  .card-img {
      width: 100%;
      height: 150px;
     
  }

  .card-img-overlay {
      position: absolute;
      top: 0;
      left: 0;
      padding: 20px;
      background-color: rgba(0, 0, 0, 0.3     );
      border-radius: 8px;
      color: white;
  }

  .card-title {
      text-align: center;
      font-size: 24px;
      margin-bottom: 10px;
      font-family: 'Poppins', sans-serif; /* Change font family to Poppins */
      margin-bottom: 0%;

  }

  .card-text {
      font-size: 16px;
      font-family: 'Poppins', sans-serif; /* Change font family to Poppins */

  }
    .card-title-container {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
  }
  </style>
</head>
<body>
<main id="main" class="main">

<div class="pagetitle">
  <!-- <h1>Plans</h1> -->
  <nav>
    <!-- <ol class="breadcrumb">

      <li class="breadcrumb-item">Diet Planner</li>
      <li class="breadcrumb-item"><a href="dietplans_noheader.php">Diet Plans</a></li>
      <li class="breadcrumb-item active">Week Plan</li>
    </ol> -->
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
  <div class="row">
    <div class="col-md-4 day">
     

      <div class="card" id="workout_card" onclick="gotolink('Workout')">
          <div class="card-img-overlay">
              <div class="card-title-container">
                  <h5 class="card-title">Workout Plans</h5>
              </div>
          </div>
          <img src="../img/discover/back.jpg" class="card-img" alt="Abs Training">
      </div>

      
    </div>

    <div class="col-md-4 day">
      <div class="card" id="workout_card" onclick="gotolink('Diet')">
          <div class="card-img-overlay">
              <div class="card-title-container">
              <h5 class="card-title">Diet Plans</h5>
              </div>
          </div>
          <img src="../img/discover/diet.jpeg" class="card-img" alt="food image">
      </div>
      
    </div>
  </div>
</section>

</main>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="assets/js/user-index.js"></script>
  <script src="assets/js/navbar.js"></script>

  <script>
    function gotolink(route){
        if(route == "Workout"){
          window.location.href = 'workoutplan_noheader.php';
        }
        else{
          window.location.href = 'dietplans_noheader.php';
        }
    }
    
  </script>
  

</body>
</html>


 

<?php 

// include("include_user/footer.php");
?>