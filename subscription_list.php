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
  <div class="modal fade" id="addSubcription" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Plan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="POST" id="subcription-form">

          <div class="modal-body">

            <div class="form-group">
              <label> Subscription Name </label>
              <input type="text" name="subcription_name" class="form-control" placeholder="Enter Subscription Name">
            </div>
            <div class="form-group">
              <label> Description </label>
              <input type="text" name="description" class="form-control" placeholder="Enter Description">
            </div>
            <div class="form-group">
              <label>Price</label>
              <input type="number" name="price" class="form-control" placeholder="Enter Price">
            </div>
            <div class="form-group">
              <label>No. Days</label>
              <input type="number" name="days" class="form-control" placeholder="Enter No. Days">
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Close</button>
            <button type="submit" name="save_subscription" class="btn btn-primary  btn-lg">Add</button>
          </div>
        </form>

      </div>
    </div>
  </div>


  <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header d-inline align-items-between" style="font-size: 20px; font-weight: bold;">

        Subscription List
  
        <button type="button" class="btn btn-dark float-sm-right" data-toggle="modal" data-target="#addSubcription">
          Add New Plan
        </button>
      </div>

      <div class="card-body">

        <div class="table-responsive">

          <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead class="table-dark">
              <tr class="text-center">
                <th> # </th>
                <th> Subscription Name </th>
                <th> Description </th>
                <th>No. Days </th>
                <th>Price </th>
                <th>Action </th>
              </tr>
            </thead>
            <tbody class="text-center">

              <?php

                $sql = "SELECT * FROM subscription where `status` = 'Active' ORDER BY numberOfDays ASC";

                // Prepare the SQL statement
                $stmt = $conn->prepare($sql);

                // Execute the query
                $result = $stmt->execute();

                if ($stmt->rowCount() > 0) {
                  // Loop through and display all the data
                  $count = 1;
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "
                            <tr class='text-center'>
                              <td>$count</td>
                              <td>{$row['subscriptionName']}</td>
                              <td>{$row['subscriptionDescription']}</td>
                              <td>{$row['numberOfDays']}</td>
                              <td>{$row['Price']}</td>
                              <td>
                                <div class='btn-group p-1' role='group'>
                                    <a class='btn btn-success approve-button mr-1' href='edit-subsctiption.php?edit_id={$row['id']}' title='Edit Button'><i class='fa-solid fa-pen-to-square'></i></a>
                                    <button class='btn btn-danger delete-button' data-delete-type='subscription' data-delete-id='{$row['id']}'><i class='fa-solid fa-trash'></i></button>
                                    </div>
                                </td>
                            </tr>
                        ";

                        $count = $count+ 1;
                  }
                } else {
                  echo "
                          <tr>
                              <td colspan='6' class='text-center'>No Data Available.</td>
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

      
  <script src="javascript/subscription_list.js"></script>



</body>

</html>

<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>