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


  <style>
    .today-due-date {
        background-color: lightblue; /* Change this to your desired background color */
    }

  </style>
</head>

<body>

<div class="modal fade" id="addWalkin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Walk In</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" data-toggle="modal"
                          data-target="#list" title="List Button">
                          <i class="fa-solid fa-list"></i>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label for="exercise_name">Full Name:</label>
                        <input type="text" class="form-control" id="customer_name" name="customer_name"
                            required>
                    </div>

                    
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" name="walkinbtn" id="walkinbtn" class="btn btn-success">Transact</button>
                </div>



            </div>
        </div>
    </div>

  <!-- ITEM LIST MODAL -->
    <div class="modal fade" id="list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Walk In List</h5>
                    <button type="button" class="btn-success"  data-dismiss="modal" aria-label="Close" data-toggle="modal"
                          data-target="#addWalkin" title="Add Walk in Button">
                          <i class="fa-solid fa-circle-plus"></i>
                    </button>

                </div>
                <div class="modal-body">
                    <div class="container align-content-center" id="walkin_members">
                      <div class="form-group">
                          <input type="text" class="form-control" id="search_walkin" name="search_walkin"
                              placeholder="Search...">
                      </div>
                        <!-- Table will be dynamically populated here -->
                        <table id="listtable" class="table table-striped" id="walkin_table" style="margin-left: 10px">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Due Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="walkin_table_body">
                                <!-- Table rows will be dynamically generated here -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


  <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header d-inline " style="font-size: 20px; font-weight: bold;">

        Make Transaction
        <button type="button" class="btn btn-success float-sm-right"  data-toggle="modal"
                data-target="#list">
          Walk In
        </button>

      </div>

      <div class="card-body">

        <div class="table-responsive">

          <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead class="table-dark">
              <tr class="text-center">
                <th> # </th>
                <th> Full Name </th>
                <!-- <th> Last Name </th> -->
                <th>Email </th>
                <th>Plan </th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="text-center">

            <?php

              $sql = "SELECT a.*, m.plan
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
                  $plan='';
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $color = '';
                      if($row['plan'] ==null){
                          $plan = "No Current Plan";
                      }
                      else{
                        $plan = $row['plan'];
                      }
                      if($row['status'] == 'Inactive'){
                        $color = 'bg-warning';
                      }
                      else{
                        $color = '';
                      }
                      echo "
                          <tr class='text-center $color' >
                              <td>$count</td>
                              <td>{$row['Firstname']}  {$row['Lastname']}</td>
                              <td>{$row['Username']}</td>
                              <td>{$plan}</td>
                              <td class='$color'>{$row['status']}</td>
                              <td>
                                <a class='btn btn-sm btn-success approve-button mr-1 ' href='transact.php?user_id={$row['IdNum']} ' title='Make Transaction'>
                                  Add Plan
                                </a>

                              </td>
                              
                          </tr>
                      ";
                      $count = $count + 1;
                  }
              } else {
                  echo "
                      <tr>
                          <td colspan='5' class='text-center'>No user data available.</td>
                      </tr>
                  ";
              }

             

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
  <script src="javascript/make_transact.js"></script>
      
   



</body>

</html>

<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>