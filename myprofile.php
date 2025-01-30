<?php


  session_start();

  if (!isset($_SESSION['Username'])) {
    header("Location: index.php");
    exit();
  }
  if (isset($_SESSION['Photo'])) {
    $imagephoto = $_SESSION['Photo'];
    
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
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />


</head>

<body>




<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">


  <div class="card-header d-inline " style="font-size: 20px; font-weight: bold;">

    My Profile
    

  </div>


  <div class="card-body">

  <div class="container-xl px-4 mt-4">
<!-- Account page navigation-->

<hr class="mt-0 mb-4">
<div class="row">
    <div class="col-xl-4">
        <!-- Profile picture card-->
        <div class="card mb-4 mb-xl-0">
            <div class="card-header">Profile Picture</div>
            <div class="card-body text-center">
                <!-- Profile picture image-->
                <img class="img-account-profile rounded-circle mb-2" id="profileImage" src="" alt="" style="max-width: 100%; height: auto;" name="myprofile-photo">
                <!-- Profile picture help block-->
                <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                <!-- Display the button to open the file dialog -->
                <button class="btn btn-primary" id="chooseImageBtn" type="button">Upload new Image</button>
                <!-- Hidden input for file upload -->
                <input type="file" id="imageInput" accept="image/*" style="display: none;">
            </div>
        </div>

    </div>
    <div class="col-xl-8">
        <!-- Account details card-->
        <div class="card mb-4">
            <div class="card-header">Account Details</div>
            <div class="card-body">
                <form action="" method="post" id="myprofile_form">
                    <!-- Form Group (username)-->
                    <div class="mb-3">
                        <label class="small mb-1" for="myprofile-username">Email </label>
                        <input class="form-control" id="myprofile-username" type="text" placeholder="Enter your username" name="myprofile-username">
                    </div>
                    <!-- Form Row-->
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (first name)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="myprofile-Fname">First name</label>
                            <input class="form-control" id="myprofile-Fname" type="text" placeholder="Enter your first name" name="myprofile-Fname">
                        </div>
                        <!-- Form Group (last name)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="myprofile-Lname">Last name</label>
                            <input class="form-control" id="myprofile-Lname" type="text" placeholder="Enter your last name" name="myprofile-Lname">
                        </div>
                    </div>
                   
                    <!-- Form Row        -->
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (organization name)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="myprofile-Age">Age</label>
                            <input class="form-control" id="myprofile-Age" type="text" placeholder="Enter your Age" name="myprofile-Age">
                        </div>
                        <!-- Form Group (location)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="myprofile-Gender">Gender</label>
                            <input class="form-control" id="myprofile-Gender" type="text" placeholder="Enter your Gender" name="myprofile-Gender">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="small mb-1" for="myprofile-username">Account Level </label>
                        <input class="form-control" id="myprofile-AccountType" type="text"  name="myprofile-username" disabled>
                    </div>
                    
                    <!-- Form Row-->
                    <!-- <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                            <label class="small mb-1" for="myprofile-Weight">Weight</label>
                            <input class="form-control" id="myprofile-Weight" type="tel" placeholder="Enter your Weight in Kilogram" name="myprofile-Weight">
                        </div>
                        <div class="col-md-6">
                            <label class="small mb-1" for="myprofile-Height">Height</label>
                            <input class="form-control" id="myprofile-Height" type="number" placeholder="Enter your Height in centimeter" name="myprofile-Height">
                        </div>
                    </div>
                    <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                            <label class="small mb-1" for="myprofile-BMR">BMR</label>
                            <input class="form-control" step="0.01"  placeholder="0.00" id="myprofile-BMR" type="number" placeholder="Enter your BMR" name="myprofile-BMR" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="small mb-1" for="myprofile-DCT">Daily Calorie Target</label>
                            <input class="form-control" step="0.01"  placeholder="0.00" id="myprofile-DCT" type="number"  placeholder="Enter your Daily Calorie Target" name="myprofile-DCT" readonly>
                        </div>
                    </div>
                     <div class="mb-3">
                        <label class="small mb-1" for="myprofile-ActLvl">Activity Level</label>
                        <select class="form-select" id="myprofile-ActLvl" name="myprofile-ActLvl">
                            <option value="None"></option>
                            <option value="Sedentary (little or no exercise)">Sedentary (little or no exercise)</option>
                            <option value="Lightly active (light exercise or sports 1-3 days a week)">Lightly active (light exercise or sports 1-3 days a week)</option>
                            <option value="Moderately active (moderate exercise or sports 3-5 days a week)">Moderately active (moderate exercise or sports 3-5 days a week)</option>
                            <option value="Very active (hard exercise or sports 6-7 days a week)">Very active (hard exercise or sports 6-7 days a week)</option>
                            <option value="Super active (very hard exercise, physical job, or training twice a day)">Super active (very hard exercise, physical job, or training twice a day)</option>
                        </select>
                    </div> -->

                    <!-- Save changes button-->
                    <button class="btn btn-primary" type="submit">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

    
  </div>
</div>

</div>

  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <script src="javascript/myprofile.js"></script>
      
   
</body>

</html>

<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>