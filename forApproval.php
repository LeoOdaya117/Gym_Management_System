<?php


  session_start();

  if (!isset($_SESSION['Username'])) {
    header("Location: home.php");
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
  <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="insert_admin.php" method="POST">

          <div class="modal-body">

            <div class="form-group">
              <label> First Name </label>
              <input type="text" name="first_name" class="form-control" placeholder="Enter First Name">
            </div>
            <div class="form-group">
              <label> Last Name </label>
              <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name">
            </div>
            <div class="form-group">
              <label>Username/Email</label>
              <input type="text" name="username" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
              <label>Confirm Password</label>
              <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="register_user" class="btn btn-primary">Add</button>
          </div>
        </form>

      </div>
    </div>
  </div>


  <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header d-inline " style="font-size: 20px; font-weight: bold;">

        For Approval
  

      </div>

      <div class="card-body">

        <div class="table-responsive">

          <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead class="table-dark">
              <tr class="text-center">
                <th> No. </th>
                <th> First Name </th>
                <th> Last Name </th>
                <th>Email </th>
                <th>Date </th>
                <th>Action </th>
              </tr>
            </thead>
            <tbody class="text-center">

              <?php

                $sql = "SELECT * FROM account WHERE AccountType = 'User' AND `status` = 'Pending' ORDER BY registrationdate DESC";

                // Prepare the SQL statement
                $stmt = $conn->prepare($sql);

                // Execute the query
                $result = $stmt->execute();

                if ($stmt->rowCount() > 0) {
                  // Loop through and display all the data
                  $count= 1;
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "
                            <tr class='text-center'>
                              <td>{$count}</td>
                              <td>{$row['Firstname']}</td>
                              <td>{$row['Lastname']}</td>
                              <td>{$row['Username']}</td>
                              <td>{$row['registrationdate']}</td>
                              <td>
                                <div class='btn-group p-1' role='group'>
                                    
                                    <button class='btn btn-success approve-button mx-1' data-approve-id='{$row['IdNum']}'><i class='fa-solid fa-check'></i></button>
                                    <button class='btn btn-danger delete-button' data-delete-type='reject' data-delete-id='{$row['IdNum']}'><i class='fa-solid fa-x'></i></button>
                                    </div>
                                </td>
                            </tr>
                        ";
                        $count += 1;
                  }
                } else {
                  echo "
                          <tr>
                              <td colspan='5' class='text-center'>No Data Available.</td>
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

      
  <script src="javascript/forApproval.js"></script>



</body>

</html>

<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>