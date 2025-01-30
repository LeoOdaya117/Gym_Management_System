<?php


  session_start();

  if (!isset($_SESSION['Username'])) {
    header("Location: home.php");
    exit();
  }

  if (isset($_GET['tab'])) {

    $_SESSION['currentTab'] = $_GET['tab'];
  }
  if (isset($_SESSION['Photo'])) {
    $imagephoto = $_SESSION['Photo'];
    
  }
  if(isset($_SESSION["AccountType"])){
    if($_SESSION["AccountType"] == "Admin"){
        include('includes/header.php');
        include('includes/navbar.php');
    }
    else{
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

        Change Password
        

      </div>

      <div class="card-body">

      <form action="" method="POST" id="password-change-form">
                <div class="form-group">
                    <label>Current Password</label>
                    <input type="password" name="current_password" class="form-control" placeholder="Enter Current Password" required >
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="edit_password" class="form-control" placeholder="Enter Password" required >
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="edit_confirm_password" class="form-control" placeholder="Confirm Password" required >
                </div>
            
            <div class="modal-footer">
                <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
            </div>
        </form>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->

  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <script src="javascript/update-password.js"></script></script>


</body>

</html>

<?php
if(isset($_SESSION["AccountType"])){
  if($_SESSION["AccountType"] == "Admin"){

      include('includes/scripts.php');

  }
  else{

      include('include_user/scripts.php');
  }
}
?>