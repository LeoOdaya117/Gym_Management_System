<?php

ob_start();
session_start();

if (!isset($_SESSION['Username'])) {
  header("Location: home.php");
  exit();
}

include('includes/header.php');
include('includes/navbar.php');
include('config.php');


if (isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
    // Now $id contains the value from the URL parameter 'id'
    // echo "USER ID: " . $id;
  } else {
    echo "ID parameter not found in URL";
  }
  
  
  
  $edit_first = "";
  $edit_last = "";
  $edit_username = "";
  $edit_password = "";
  $accountType = "";
  
  if (isset( $id)){
    
  
    $editsql = "SELECT * FROM account WHERE IdNum ='$id'";
    
      // Prepare the SQL statement
    $stmt = $conn->prepare($editsql);
  
    // Execute the query
    $result = $stmt->execute();
    if ($result) {
        // Loop through and display all the data
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          
            $edit_first = $row["Firstname"];
            $edit_last = $row["Lastname"];
            $edit_username = $row["Username"];
            $hashpass = $row["Password"];  
            $accountType = $row["AccountType"];
        }
            
        
    } else {
        echo "No exercise data available.";
    }
  
    // Close the database connection
    $conn = null;
  }
  
  

    $idjson = json_encode($id);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="pragma" content="no-cache">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    

    <title>Document</title>
    
    
</head>

<body>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> EDIT Staff's Data </h6>
        </div>
        <div class="card-body">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST" id="edit-staff-form">
                        <div class="form-group">
                            <label> Fist Name </label>
                            <input type="text" name="edit_first" class="form-control" placeholder="Enter Username" required value="<?php echo $edit_first;?>">
                        </div>
                        <div class="form-group">
                            <label> Last Name </label>
                            <input type="text" name="edit_last" class="form-control" placeholder="Enter Username" required value="<?php echo $edit_last;?>">
                        </div>
                        <div class="form-group">
                            <label>Username/Email</label>
                            <input type="text" name="edit_username" class="form-control" placeholder="Enter Email"required value="<?php echo $edit_username;?>">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="edit_password" class="form-control" placeholder="Enter Password" required value="<?php echo $hashpass;?>">
                        </div>
                    
                    <div class="modal-footer">


                    <a href="staff_list.php" class="btn btn-secondary">Close</a>   
                        <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
                    </div>
                </form>



    </div>
</div>

        </div>
    </div>
</div>

</div>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script>
    var staffid = <?php echo $idjson; ?>;
</script>
<script src="javascript/edit.js"></script>



</body>

</html>

<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>