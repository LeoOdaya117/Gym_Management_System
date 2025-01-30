<?php
session_start();

if (!isset($_SESSION['Username'])) {
  header("Location: index.php");
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
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="cache-control" content="no-cache">
  <meta http-equiv="expires" content="0">
  <meta http-equiv="pragma" content="no-cache">

  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Chart.js library -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
.bmi-indicator {
  
    position: relative;
}

.bmi-graph {
    width: 100%; /* Width of the BMI graph */
    background-color: #f0f0f0; /* Background color of the graph */
    border-radius: 5px; /* Rounded corners */
    position: relative;
    display: flex;
    align-items: center;
}

.color-bar {
    width: 100%;
    display: flex;
    gap: 5px; /* Adjust spacing between color ranges */
    justify-content: space-between;
}

.color-range {
    width: 100%;
    height: 20px;
    font-weight: bolder;
    font-size: 12px; /* Adjust font size as needed */
    text-align: center;
    border-radius: 5px; /* Rounded corners */
}


.pointer {
    position: absolute;
    bottom: -10px; /* Adjust bottom position of the pointer */
    width: 0;
    height: 0;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-top: 10px solid #000; /* Color of the pointer */
    transform: translateX(-50%);
}

.bmi-type{
  font-size: 15px;
}

.separator {
      border-top: 1px solid #dee2e6;
      margin: 20px 0;
}

.bmi-color{
    width: 15px;
    height: 15px;
    margin-right: 5px;
    border-radius: 10px; /* Rounded corners */
    /* background-color: #036bfc; */
}

.current-height{
  margin-right: -0.5rem;
  font-size: 20px;
  font-weight: bolder;
  z-index: 2;
}
  </style>
</head>

<body>
  <div class="container-fluid">
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div> -->


    <!-- Add this button inside your container, below the Weight Graph Representation section -->
    <div class="container mt-2">

      <h1>Report</h1>
      <div class="col-12 separator"></div>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Weight</h3>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#weightLogModal">
              Log
            </button>
            
        </div>
          
        <div class="card">
          <!-- <h5 class="card-header"></h5> -->
          <div class="card-body">
            <div class="container">
              <p>Current</p>
              <h3 class="mt-n2" id="current-weight">96.5 kg</h3>   
              <canvas id="lineChart" width="400" height="200"></canvas>
            </div>
          </div>
        </div>


        <div class="d-flex justify-content-between align-items-center mt-3 mb-3">
            <h3>BMI</h3>
            <!-- <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#weightLogModal">
              Edit
            </button> -->
          
        </div>

        <div class="card">
          <div class="card-body">
              <div class="container">
                    <div class="d-flex justify-content-between align-items-center mt-3 mb-1">
                        <h3 class="mt-n2" id="current-bmi">35.5</h3>
                        <div class="d-flex align-items-center mt-n3">
                            
                            <p class="bmi-type" id="bmi-type"> 
                              <div class="bmi-color" id="bmi-color"></div>
                              <span id="weight-status"></span>
                            </p>
                        </div>
                    </div>

                    <div class="bmi-indicator">
                          <div class="bmi-graph">
                            <!-- <div class="pointer" style="left: calc(50% - 5px);"></div> Adjust left position based on user's BMI -->
                              <div class="color-bar align-content-center">
                                  <div class="color-range" style="background-color: #036bfc;"></div>
                                  <div class="color-range" style="background-color: #007bff;"></div>
                                  <div class="color-range" style="background-color: #03b5fc;"></div>
                                  <div class="color-range" style="background-color: #fcce03;"></div>
                                  <div class="color-range" style="background-color: #fc7703;"></div>
                                  <div class="color-range" style="background-color: #fc1c03;">  </div>
                              </div>
                              
                          </div>
                            <div class="color-bar align-content-center">
                                <div class="color-range" >15</div>
                                <div class="color-range">16</div>
                                <div class="color-range" >18.5</div>
                                <div class="color-range" >25</div>
                                <div class="color-range" >30</div>
                                <div class="color-range">35-40</div>
                            </div>
                    </div>
                    <hr>

                    <div class="d-flex justify-content-between align-items-center mb-1">
                      <P>Height</P>

                        <div class="d-flex align-items-center">
                            <p class="bmi-type" id="bmi-type"> 
                                <span class="current-height" id="current-height">165 cm</span>
                                
                                <i class="fa-solid fa-pencil ml-3" data-bs-toggle="modal" data-bs-target="#heightChangeModal"></i>
                            </p>
                        </div>
                    </div>

              </div>
        </div>
      </div>


    </div>

    
   



    



    <!-- Add this modal code below the canvas element -->
    <div class="modal fade" id="weightLogModal" tabindex="-1" aria-labelledby="weightLogModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="weightLogModalLabel">Log Your Weight</h5>
            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
          </div>
          <div class="modal-body">
            <!-- Weight log form -->
            <form id="weightLogForm">
              <div class="mb-3">
                <label for="weightInput" class="form-label">Weight (in kg)</label>
                <input type="number" class="form-control" id="weightInput" required>
              </div>
              <div class="modal-footer" style="display: flex; ">
                  <button type="button" class="btn btn-light btn-lg" data-bs-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary btn-lg" id="submitWeightBtn">Save</button>
              </div>

              
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal For changing Height -->
    <div class="modal fade" id="heightChangeModal" tabindex="-1" aria-labelledby="heightModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="heightModalLabel">Height</h5>
            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
          </div>
          <div class="modal-body">
            <!-- Weight log form -->
            <form id="heightLogForm">
              <div class="mb-3">
                <label for="heightInput" class="form-label">Height (in cm)</label>
                <input type="number" class="form-control" id="heighttInput" required>
              </div>
              <div class="modal-footer" style="display: flex; ">
                  <button type="button" class="btn btn-light btn-lg" data-bs-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary btn-lg" id="submitHeighttBtn">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



    <script src="javascript/user-index.js"></script>


</body>

</html>

<?php
include('include_user/scripts.php');
//include('includes/footer.php');
?>
