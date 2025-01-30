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
  <!-- <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
  </div> -->


  <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header d-inline " style="font-size: 20px; font-weight: bold;">

        Gym Members
        <!-- <button type="button" class="btn btn-dark float-sm-right" data-toggle="modal" data-target="#addadminprofile">
          Add New User
        </button> -->

      </div>

      <div class="card-body">

        <div class="table-responsive">

          <table id="example" class="table table-striped table-bordered table-hover" style="width:100%;">
            <thead class="table-dark">
              <tr class="text-center">
                <th> No. </th>
               
       
                <th> ID </th>
                <th> Full Name </th>
                <th>Email </th>
                <th>Plan </th>
                <th>Plan Expiration</th>
                <th>Status</th>
                
              </tr>
            </thead>
            <tbody class="text-center" >

            <?php

              $sql = "SELECT a.*, m.plan, m.dueDate
              FROM account a
              LEFT JOIN membership m ON a.IdNum = m.membershipid
              WHERE a.AccountType='User' AND a.status <> 'Pending' ORDER BY Firstname";

              // Prepare the SQL statement
              $stmt = $conn->prepare($sql);

              // Execute the query
              $result = $stmt->execute();

              if ($stmt->rowCount() > 0) {
                  // Loop through and display all the data
                  $count = 1;
                  $plan ="";
                  $avatar = "";
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                      $date = new DateTime($row['dueDate']);
                      
                      
                      if($row['plan'] ==null){
                          $plan = "No Current Plan";
                          $formattedDate = "";
                      }
                      else{
                        $plan = $row['plan'];
                        $formattedDate = $date->format('M d, Y');
                      }

                      if($row['photo'] ==null){
                          
                          $avatar = "img/No_image_available.jpg";
                      }
                      else{
                        $avatar = $row['photo'];
                      }

                      $currentDate = new DateTime();
                      $diff = $date->diff($currentDate)->days;
                      $color = "";
                      if($diff <= 2 && $row['dueDate'] !=null){
                        $color = "bg-warning tex-dark";
                      }
                      
                      if($date <= $currentDate && $row['dueDate'] !=null){
                        $color = "bg-danger tex-white";
                      }
                    

                      echo "
                          <tr class='$color'>
                              <td>$count</td>
                              
                              
                              <td>{$row['IdNum']}</td>
                              <td>{$row['Firstname']}  {$row['Lastname']}</td>
                              <td>{$row['Username']}</td>
                              <td>{$plan}</td> 
                              <td class='$color'>{$formattedDate}</td> 
                              <td>{$row['status']}</td>
                              
                          </tr>
                      ";
                      // <td><img src='{$avatar}' width=40 height=40 style='border-radius: 50%; border-style: solid;'></td>
                      $count = $count + 1;
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

      
  <script>
        $(document).ready(function() {
            $('#example').on('click', '.delete-button', function() {
                // Get the delete type and ID from data attributes
                const deleteType = $(this).data('delete-type');
                const deleteID = $(this).data('delete-id');

                // Show a confirmation SweetAlert with a dynamic message
                Swal.fire({
                    title: 'Confirm Delete',
                    text: `Are you sure you want to delete this ${deleteType}?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: `Yes, delete ${deleteType}`
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = `delete.php?delete_${deleteType}_id=${deleteID}`;
                    }
                });
            });
        });

    </script>
  <script>
    new DataTable('#example');
  </script>


</body>

</html>

<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>