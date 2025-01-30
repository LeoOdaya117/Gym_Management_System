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

    } else {
        echo "<script>alert('ID parameter not found in URL')</script>";
    }

    if (isset($id)){
    

        $editsql = "SELECT * FROM equipment WHERE equipmentID  ='$id'";
        
        $stmt = $conn->prepare($editsql);
        
        $result = $stmt->execute();
        if ($result) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                
                $equipmentName = $row["equipmentName"];
                $equipmentDescription = $row["equipmentDescription"];
                $image = $row["image"];
            }
                
            
        } else {
            echo "No exercise data available.";
        }
        
        // Close the database connection
        $conn = null;
    }

    $equipmentID = json_encode($id);


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

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="font-size: 20px; font-weight: bold;"> Edit Equipment Data </h6>
        </div>
        
        <div class="card">
            <div class="card-body">
                <form action="" method="POST" id="edit-form-equipment">
                    <div class="form-group">
                        <label class="font-weight-bold"> Equipment Name </label>
                        <input type="text" name="equipmentName" class="form-control"  required value="<?php echo $equipmentName;?>">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold"> Description </label>
                        <input type="text" name="equipmentDescription" class="form-control"  required value="<?php echo $equipmentDescription;?>">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">image</label>
                        <input type="text" name="image" class="form-control" required value="<?php echo $image;?>">
                    </div>
                    <div class="form-group float-right">
                        <a href="equipment.php" class="btn btn-secondary">Close</a>   
                        <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script>
    var equipmentID = <?php echo $equipmentID; ?>;
</script>
<script src="javascript/edit.js"></script>



</body>

</html>

<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>