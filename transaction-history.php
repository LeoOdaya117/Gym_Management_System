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

  <title>Transaction History</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link rel="stylesheet" href="/css/myprofile.css">


</head>

<body>

  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>


</body>

</html>

<?php
include('include_user/scripts.php');
//include('includes/footer.php');
?>
