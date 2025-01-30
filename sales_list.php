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





  <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header d-inline align-items-between" style="font-size: 20px; font-weight: bold;">

        Sales List
  
       
      </div>

      <div class="card-body">

        <div class="table-responsive">

          <table id="example" class="table table-striped table-bordered table-hover" style="width:100%; font-size: 12px;">
            <thead class="table-dark">
              <tr class="text-center">
              <th> # </th>
                <th> Invoice No. </th>
                <th> User ID </th>
                <th>Plan </th>
                <th>Price </th>
                <th>Cash </th>
                <th>Change </th>
                <th>Method </th>
                <th>Payment Date </th>
                <th>User </th>
                <th>Action </th>
              </tr>
            </thead>
            <tbody class="text-center">

              <?php

                $sql = "SELECT
                sales.*, 
                subscription.subscriptionName,
                account.Firstname,
                account.Lastname
                FROM 
                sales AS sales
                INNER JOIN 
                subscription ON sales.subscriptionID = subscription.id
                INNER JOIN 
                account ON sales.User = account.IdNum
                WHERE sales.status = 'Complete' ORDER BY payment_date DESC";

                // Prepare the SQL statement
                $stmt = $conn->prepare($sql);

                // Execute the query
                $result = $stmt->execute();

                if ($stmt->rowCount() > 0) {
                  // Loop through and display all the data
                  $count = 1;
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                    $formattedDatetime = date('M d, Y h:i A', strtotime($row['payment_date']));
                    $price = number_format($row['price'], 2);
                    $payment = number_format($row['payment'], 2);
                    $changeMoney = number_format($row['changeMoney'], 2);
                    echo "
                            <tr class='text-center'>
                              <td>$count</td>
                              <td>{$row['salesID']}</td>
                              <td>{$row['IdNum']}</td>
                              <td>{$row['subscriptionName']}</td>
                              <td>₱ {$price}</td>
                              <td>₱ {$payment}</td>
                              <td>₱ {$changeMoney}</td>
                              <td>{$row['paymentMethod']}</td>
                              <td>{$formattedDatetime}</td>
                              <td>{$row['Firstname']} {$row['Lastname']}</td>
                              <td>
                                <div class='btn-group p-1' role='group'>
                                    <a class='btn btn-sm bg-gradient-warning approve-button mr-1' href='view_invoice.php?id={$row['salesID']}' title='View Invoice'><i class='fa-solid fa-file-invoice'></i></a>
                                    </div>
                                </td>
                            </tr>
                        ";

                        $count = $count+ 1;
                  }
                } else {
                  echo "
                          <tr>
                              <td colspan='11' class='text-center'>No Data Available.</td>
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