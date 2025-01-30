<?php
session_start();

if (!isset($_SESSION['Username']) ) {
  header("Location: index.php");
  exit();
}



if (isset($_GET['tab'])) {

  $_SESSION['currentTab'] = $_GET['tab'];
}

include('includes/header.php');
include('includes/navbar.php');
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
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> <!-- Include ApexCharts library -->
  <style>
  .badge-position {
    position: absolute;
    top: -10px;
    right: -10px;
    border-radius: 50%;
    background-color: #dc3545;
    color: #fff;
    padding: 5px;
  }

  #icons{
    font-size: 20px;
  }
</style>

</head>

<body>
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    
  </div>

  <div class="row">
   

    <div class="col-xl-3 col-md-6 mb-4" style="cursor: pointer;" title="Total earnings Today in the Gym">
      <div class="card border-left-success shadow h-100 py-2" onclick="goTo('sales')">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col-8">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Today's Earning</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800" id="todaysEarningValue">Loading...</div>
            </div>
            <div class="col-4 text-center">
              <i class="fa-solid fa-money-bill-trend-up fa-2x"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4" style="cursor: pointer;" title="Total earnings for this month in the Gym">
      <div class="card border-left-success shadow h-100 py-2" onclick="goTo('sales')">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col-8">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">This Month Earnings</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800" id="thimonthEarningValue">Loading...</div>
            </div>
            <div class="col-4 text-center">
              <i class="fa-solid fa-money-bill-trend-up fa-2x"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4" style="cursor: pointer;" title="Number of Active accounts in the system">
        <div class="card border-left-primary shadow h-100 py-2" onclick="goTo('member_status')">
            <div class="card-body text-center">
                <h5 class="card-title">Active Members</h5>
                <div class="d-flex justify-content-center align-items-center" >

                    <i class="fa-solid fa-user-plus"  id='icons' ></i>
                    <div class="badge badge-position" id='active_members'>
                     0
                    </div>
                </div>
            </div>
        </div>
    </div>

   

    <div class="col-xl-3 col-md-6 mb-4" style="cursor: pointer;" title="Number of Pending Account Under Review">
        <div class="card border-left-warning shadow h-100 py-2" onclick="goTo('forApproval')">
            <div class="card-body text-center">
                <h5 class="card-title">Pending Registration</h5>
                <div class="d-flex justify-content-center align-items-center" >
                    <!-- <i class="fa-solid fa-calendar-check" ></i> -->
                    <i class="fa-solid fa-user-lock" id='icons'></i>
                    <div class="badge badge-position" id='total_pending'>
                     0
                    </div>
                </div>
            </div>
        </div>
    </div>

    



    <div class="col-xl-3 col-md-6 mb-4" style="cursor: pointer;" title="Number Subscription Request from the Users">
        <div class="card border-left-danger shadow h-100 py-2" onclick="goTo('subscription')">
            <div class="card-body text-center">
                <h5 class="card-title">Subscription Request</h5>
                <div class="d-flex justify-content-center align-items-center" >
                    <!-- <i class="fa-solid fa-calendar-check" ></i> -->
                    <i class="fa-solid fa-money-bill-transfer" id='icons'></i>
                    <div class="badge badge-position" id="total_request">
                      0
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4" style="cursor: pointer;" title="Number of People in the Gym">
        <div class="card border-left-success shadow h-100 py-2" onclick="goTo('attendance')">
            <div class="card-body text-center">
                <h5 class="card-title">Present Members</h5>
                <div class="d-flex justify-content-center align-items-center" >
                    <i class="fa-solid fa-calendar-check" id='icons'></i>
                    <div class="badge badge-position" id="present_member">
                        10
                    </div>
                </div>
            </div>
        </div>
    </div>

    
  </div>


  <div class="card">
    <div class="card-header">
      <strong>Sales Graph</strong>
      <!-- Option select -->
      <div style="float: right;">
        <select class="form-select form-select-sm" id="optionSelect">
          <option  value="week">Week</option>
          <option value="month" selected>Month</option>
          <option value="year">Year</option>
        </select>
      </div>
    </div>
    <div class="card-body">
      <div id="chart"></div>
    </div>
</div>

</div>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> <!-- Include Bootstrap JS -->

<script src="javascript/admin-index.js"></script>
</body>

</html>

<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>
