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
  <title>Subscription Requests</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />


</head>

<body>
  


  <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header d-inline " style="font-size: 20px; font-weight: bold;">

      Subscription Requests
  

      </div>

      <div class="card-body">

        <div class="table-responsive">

        <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead class="table-dark">
                <tr class="text-center">
                    <th> No. </th>
                    <th> ID </th>
                    <th> Full Name </th>
                    <th>Email </th>
                    <th>Plan </th>
                    <th>Amount To Pay </th>
                    <th>Date </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                $sql = "SELECT 
                            sales.salesID AS SalesID,
                            account.IdNum AS ID,
                            account.Firstname AS FirstName,
                            account.Lastname AS LastName,
                            account.Username AS Email,
                            subscription.subscriptionNAME AS Plan,
                            sales.price AS AmountToPay,
                            sales.date_created AS Date,
                            sales.status AS Status
                        FROM 
                            sales
                        JOIN 
                            account ON sales.IdNum = account.IdNum
                        JOIN 
                            subscription ON sales.subscriptionID = subscription.id
                        WHERE 
                            sales.status = 'Pending' ORDER BY `Date` DESC;
                    ";

                // Prepare the SQL statement
                $stmt = $conn->prepare($sql);

                // Execute the query
                $result = $stmt->execute();
                $count = 1;
                if ($stmt->rowCount() > 0) {
                    // Loop through and display all the data
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      $formattedDatetime = date('M d, Y h:i A', strtotime($row['Date']));
                      $AmountToPay = number_format($row['AmountToPay'], 2);
                        echo "
                            <tr class='text-center'>
                                <td>{$count}</td>
                                <td>{$row['SalesID']}</td>
                                <td>{$row['FirstName']} {$row['LastName']}</td>
                                <td>{$row['Email']}</td>
                                <td>{$row['Plan']}</td>
                                <td>₱ {$AmountToPay}</td>
                                <td>{$formattedDatetime}</td>
                                <td>
                                    <div class='btn-group p-1' role='group'>
                                        <a class='btn btn-sm btn-success update-button mr-1' href='transact.php?id={$row['SalesID']}' title='Transact'><i class='fa-solid fa-cart-shopping'></i></a>
                                        <button class='btn btn-sm btn-danger delete-button' data-delete-type='reject' data-delete-id='{$row['SalesID']}' title='Cancel Transaction'><i class='fa-solid fa-rectangle-xmark'></i></button>
                                    </div>
                                </td>
                            </tr>
                        ";
                        $count += 1;
                    }
                } else {
                    echo "
                        <tr>
                            <td colspan='8' class='text-center'>No Data Available.</td>
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

      
  <script src="javascript/paymentrequest.js"></script>


</body>

</html>

<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>