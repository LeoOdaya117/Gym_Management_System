<?php


session_start();

if (!isset($_SESSION['Username'])) {
  header("Location: home.php");
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

  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

</head>

<body>

  <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Staff</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <form action="" method="POST" id="staff-form">

            <div class="modal-body">

              <div class="form-group">
                <label> First Name </label>
                <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" required>
              </div>
              <div class="form-group">
                <label> Last Name </label>
                <input type="text" name="last_name" class="form-control" placeholder="Enter Username" required>
              </div>
              <div class="form-group">
                <label>Username/Email</label>
                <input type="text" name="username" class="form-control" placeholder="Enter Email" required>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
              </div>
              <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password"
                  required>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="register_admin" class="btn btn-primary">Add</button>
            </div>
          </form>

      </div>
    </div>
  </div>


  <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">


      <div class="card-header d-inline " style="font-size: 20px; font-weight: bold;">

        Staff List
        <button type="button" class="btn btn-dark float-sm-right" data-toggle="modal" data-target="#addadminprofile">
          Add Staff Memeber
        </button>

      </div>


      <div class="card-body">

        <div class="table-responsive">

          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead class="table-dark">
              <tr class="text-center">
                <th> ID </th>
                <th> Name </th>
                <th>Email </th>
                <th>Edit </th>
              </tr>
            </thead>
            <tbody>
              <?php


              $sql = "SELECT * FROM account where AccountType='Staff'";

              // Prepare the SQL statement
              $stmt = $conn->prepare($sql);

              // Execute the query
              $result = $stmt->execute();

              if ($stmt->rowCount() > 0) {
                // Loop through and display all the data
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  echo "
                      <tr class='text-center'>
                      <td>{$row['IdNum']}</td>
                      <td>{$row['Firstname']} {$row['Lastname']}</td>
                      <td>{$row['Username']}</td>
                      
                      <td>
                          <div class='btn-group p-1' role='group'>
                              <a class='btn btn-success update-button mr-1' href='edit-staff.php?edit_id={$row['IdNum']}'><i class='fa-solid fa-pen-to-square'></i></a>
                              <button class='btn btn-danger delete-button' data-delete-type='admin' data-delete-id='{$row['IdNum']}'><i class='fa-solid fa-trash'></i></button>
                              </div>
                          </td>
                      </tr>
                  ";
                }
              } else {
                echo "
                    <tr>
                        <td colspan='5' class='text-center'>No user data available.</td>
                    </tr>
                  ";
              }

              // Close the database connection
              $conn = null;
              ?>

            </tbody>
          </table>

        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->


  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <script src="javascript/staff_list.js"></script>
      
  
  

</body>

</html>

<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>