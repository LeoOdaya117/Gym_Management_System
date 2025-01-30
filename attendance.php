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

  <div class="card shadow mb-4">

    <div class="card-header d-inline align-items-between" style="font-size: 20px; font-weight: bold;">
        <div class="d-inline-block">Attendance List</div>
          
        <div class="float-right">
          <a href="qr/scancode.html" target="new_blank" class="btn btn-primary btn-sm">QR Attendance</a>
          <div class="d-inline-block " title="Date Picker">
            <form method="POST">
                <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" name="selectedDate" data-target="#datetimepicker" style="width: 150px;"/>
                    <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                    <button class="btn btn-warning btn-sm" type="submit" name="filterbtn">
                    Filter
                    </button>
                </div>
            </form>

        </div>
        </div>
        
        
    </div>




      <div class="card-body">

        <div class="table-responsive">

        <table id="attendanceTable" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead class="table-dark">
                <tr class="text-center">
                    <th> ID </th>
                    <th> Full Name </th>
                    <th>Time In</th>
                    <th>Time Out</th>
                </tr>
            </thead>
            <tbody class="text-center">
            <?php
                include('config.php');

                if(isset($_POST['filterbtn'])){
                  // Check if the selectedDate POST variable is set
                  if (isset($_POST["selectedDate"])) {
                      // Get the selected date and format it properly
                      $selectedDate = $_POST["selectedDate"];
                      // Use prepared statement to prevent SQL injection
                      $sql = "SELECT * FROM attendance WHERE DATE(timeIn) = :selectedDate";
                      // Prepare the SQL statement
                      $stmt = $conn->prepare($sql);
                      // Bind the parameter
                      $stmt->bindParam(':selectedDate', $selectedDate);
                  } else {
                      // If selectedDate is not set, use current date
                      $selectedDate = date('Y-m-d');
                      // Use prepared statement to prevent SQL injection
                      $sql = "SELECT * FROM attendance WHERE DATE(timeIn) = :selectedDate";
                      // Prepare the SQL statement
                      $stmt = $conn->prepare($sql);
                      // Bind the parameter
                      $stmt->bindParam(':selectedDate', $selectedDate);
                  }
              
                  // Execute the query
                  $result = $stmt->execute();
              
                  // Check if there are any rows in the result set
                  if ($stmt->rowCount() > 0) {
                      // Loop through and display all the data
                      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                          echo "
                              <tr>
                                  <td>{$row['user_id']}</td>
                                  <td>{$row['FullName']}</td>
                                  <td>{$row['timeIn']}</td>
                                  <td>{$row['timeOut']}</td>
                              </tr>
                          ";
                      }
                  } else {
                      // Display a message when there are no results
                      echo "
                          <tr>
                              <td colspan='4' class='text-center'>No attendance records available for the selected date.</td>
                          </tr>
                      ";
                  }
                }
                else{
                  $sql = "SELECT * FROM attendance WHERE DATE(timeIn) = CURDATE()";
                  // Prepare the SQL statement
                  $stmt = $conn->prepare($sql);

                  $result = $stmt->execute();
              
                  // Check if there are any rows in the result set
                  if ($stmt->rowCount() > 0) {
                      // Loop through and display all the data
                      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                          echo "
                              <tr>
                                  <td>{$row['user_id']}</td>
                                  <td>{$row['FullName']}</td>
                                  <td>{$row['timeIn']}</td>
                                  <td>{$row['timeOut']}</td>
                              </tr>
                          ";
                      }
                  } else {
                      // Display a message when there are no results
                      echo "
                          <tr>
                              <td colspan='4' class='text-center'>No attendance records available for the selected date.</td>
                          </tr>
                      ";
                  }
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/js/tempusdominus-bootstrap-4.min.js"></script>

      
  <script src="javascript/attendance.js"></script>


</body>

</html>

<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>