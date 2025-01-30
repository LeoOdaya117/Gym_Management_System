<?php


  session_start();

  if (!isset($_SESSION['Username'])) {
    header("Location: index.php");
    exit();
  }



  include('includes/header.php');
  include('includes/navbar.php');
  include('config.php');

  $gym_name = "BROWN HOUSE FITNESS ACADEMY";
  $gym_add1 = "2F RPR Commercial Bldg,";
  $gym_add2 = "Pacita Ave, Pacita 1,";
  $gym_add3 = "San Pedro, Philippines";
  $paid_date = "";
  $services = "";
  $plan = "";
  $amount = "0.00";
  $changeMoney = "0.00";
  $amountpayable = "0.00";
  $cashier_name = "";
  $fullname = "";


  if (isset($_GET['id'])) {
      $sales_id = $_GET['id'];
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
              WHERE sales.salesID = :sales_id";

      // Prepare the SQL statement
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':sales_id', $sales_id);

      // Execute the query
      if (!$stmt->execute()) {
          // echo "Error executing SQL query: " . $stmt->errorInfo()[2];
          exit();
      }

      // Fetch the row
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      if (!$row) {
          // echo "No data found for salesID: $sales_id";
          exit();
      }

      // Extract data from the row
      $paid_date = isset($row['payment_date']) ? DateTime::createFromFormat('Y-m-d H:i:s', $row['payment_date'])->format('F j, Y - g:i a') : "";
      $services = 'Gym Membership';
      $plan = isset($row['subscriptionName']) ? $row['subscriptionName'] : "";
      $amount = isset($row['payment']) ? $row['payment'] : "0.00";
      $amount = number_format($amount, 2);
      $changeMoney = isset($row['changeMoney']) ? $row['changeMoney'] : "0.00";
      $changeMoney = number_format($changeMoney, 2);
      $amountpayable = isset($row['price']) ? $row['price'] : "0.00";
      $amountpayable = number_format($amountpayable, 2);
      $cashier_name = isset($row['Firstname'], $row['Lastname']) ? $row['Firstname'] . " " . $row['Lastname'] : "";

      // Fetch full name
      $sql = "SELECT Firstname, Lastname FROM account WHERE IdNum = :id_num";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':id_num', $row['IdNum']);
      if (!$stmt->execute()) {
          echo "Error executing SQL query: " . $stmt->errorInfo()[2];
          exit();
      }
      $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

      // Concatenate first name and last name
      $fullname = isset($dataRow['Firstname'], $dataRow['Lastname']) ? $dataRow['Firstname'] . " " . $dataRow['Lastname'] : "";
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

  <style>

/* Let's make sure all tables have defaults */
table td {
    vertical-align: top;
}

/* -------------------------------------
    BODY & CONTAINER
------------------------------------- */


.body-wrap {
    background-color: #f6f6f6;
    width: 100%;
}

.container {
    display: block !important;
    max-width: 600px !important;
    margin: 0 auto !important;
    /* makes it centered */
    clear: both !important;
}

.content {
    max-width: 600px;
    margin: 0 auto;
    display: block;
    padding: 20px;
}

/* -------------------------------------
    HEADER, FOOTER, MAIN
------------------------------------- */
.main {
    background: #fff;
    border: 1px solid #e9e9e9;
    border-radius: 3px;
}

.content-wrap {
    padding: 20px;
}



.footer {
    width: 100%;
    clear: both;
    color: #999;
    
}


/* -------------------------------------
    INVOICE
    Styles for the billing table
------------------------------------- */
.invoice {
    margin: 22px auto;
    text-align: left;
    width: 80%;
}
.invoice td {
    padding: 7px 0;
}
.invoice .invoice-items {
    width: 100%;
}
.invoice .invoice-items td {
    border-top: #eee 1px solid;
}
.invoice .invoice-items .total td {
    border-top: 2px solid #333;
    border-bottom: 2px solid #333;
    font-weight: 700;
}

/* -------------------------------------
    RESPONSIVE AND MOBILE FRIENDLY STYLES
------------------------------------- */
@media only screen and (max-width: 640px) {
   

    h2 {
        font-size: 18px !important;
    }


    .container {
        width: 100% !important;
    }

    .content, .content-wrap {
        padding: 10px !important;
    }

    .invoice {
        width: 100% !important;
    }
}

@media print {
  body * {
    visibility: hidden;
   
  }

  .print-container, .print-container * {
    visibility: visible;
  }

  .print-container {
    position: absolute;
    left: 0px;
    top: 0px;
    right: 0px;
  }
}
</style>
</head>

<body>
  

<form role="form" action="sales_list.php" method="POST">
    <table class="body-wrap">
        <tbody>
            <tr>
                <td>

                </td>
                    <td class="container" width="600">
                        <div class="content">
                            <table class="main" width="100%" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td class="content-wrap aligncenter print-container">
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tbody><tr>
                                                <td class="content-block">
                                                    <h3 class="text-center">Payment Receipt</h3>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="content-block">
                                                    <table class="invoice">
                                                        <tbody>
                                                        <tr>
                                                            <td class="text-center" style="font-size:14px;"><strong> <?php echo $gym_name;?></strong> <br><?php echo $gym_add1;?><br> <?php echo $gym_add2;?><br><?php echo $gym_add3;?> </div></td> <!--  Last Payment: <?php //echo $paid_date?> -->
                                                        </tr>
                                                        <tr>
                                                            <td><div style="float:left"><strong>Invoice #</strong><br> <?php echo $sales_id;?>  </div><div style="float:right"><strong>Service By:</strong> <br><?php echo $cashier_name;?></div></td> <!--  Last Payment: <?php //echo $paid_date?> -->
                                                        </tr>

                                                        <tr>
                                                        <td class="text-center" style="font-size:14px;"><b>Member: <?php echo $fullname; ?></b>  <br>
                                                          Paid On: <?php //echo date("F j, Y - g:i a"); 
                                                          echo $paid_date;?>
                                                        </td>
                                                        
                                                        </tr>
                                                       
                                                        <tr>
                                                            <td>
                                                                <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                                    <tbody>
                                                                    
                                                                    <tr>
                                                                        <td><b>Service Taken</b></td>
                                                                        <td class="alignright"><b>Valid Upto</b></td>
                                                                    </tr>
                                                                    
                                                                    
                                                                    <tr>
                                                                        <td><?php echo $services; ?></td>
                                                                        <td class="alignright"><?php echo   $plan;?></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td><?php echo 'Price'; ?></td>
                                                                        <td class="alignright"><?php echo '₱ '.$amountpayable?></td>
                                                                    </tr>
                                                                    
                                                                   
                                                                    
                                                                    <tr class="total">
                                                                        <td class="alignright" width="80%">Total Amount</td>
                                                                        <td class="alignright">₱ <?php echo $amountpayable; ?></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td><?php echo 'Cash:'; ?></td>
                                                                        <td class="alignright"><?php echo '₱ '.$amount?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo 'Change:'; ?></td>
                                                                        <td class="alignright"><?php echo '₱ '.$changeMoney?></td>
                                                                       
                                                                    </tr>
                                                                    

                                                                </tbody></table>
                                                            </td>
                                                        </tr>
                                                    </tbody></table>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="content-block text-center">
                                                We sincerely appreciate your promptness regarding all payments from your side.
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                            </tbody></table>
                            <div class="footer">
                                <table width="100%">
                                    <tbody><tr>
                                        <td class="aligncenter content-block"><button class="btn btn-danger mt-2" onclick="window.print()"><i class="fas fa-print"></i> Print</button></td>
                                    </tr>
                                </tbody></table>
                        </div>
                        </div>
                    </td>
                <td></td>
            </tr>
        </tbody>
    </table>
                                                               
                
</form>


  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
      
  <script>
        // Call printJS after the DOM is loaded
        document.addEventListener("DOMContentLoaded", function() {
            printJS({
                printable: 'yourElementId', // ID of the element you want to print
                type: 'html', // 'html' or 'image' or 'pdf'
                scanStyles: false, // Set to true to include styles from CSS files linked in HTML
                paperSize: { width: '2.25in', height: 'infinite' }, // Thermal paper roll width (2.25 inches)
                maxWidth: 800, // Maximum width of content on the printed page
                font: 'Arial', // Font family to use
                honorMarginPadding: false, // Set to true to honor margin and padding properties in CSS
            });
        });
    </script>




</body>

</html>

<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>