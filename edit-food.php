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
    

        $editsql = "SELECT * FROM foods WHERE id  ='$id'";
        
        $stmt = $conn->prepare($editsql);
        
        $result = $stmt->execute();
        if ($result) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                
                $name = $row["name"];
                $description = $row["description"];
                $meal = $row["meal"];
                $diet = $row["diet"];
                $calories = $row["calories"];
                $protein = $row["protein"];
                $fat = $row["fat"];
                $carbohydrates = $row["carbohydrates"];
                $serving = $row["serving"];
                $photo = $row["photo"];
                
            }
                
            
        } else {
            echo "No exercise data available.";
        }
        
        // Close the database connection
        $conn = null;
    }

    $foodID = json_encode($id);


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
            <h6 class="m-0 font-weight-bold" style="font-size: 20px; font-weight: bold;"> Edit Food Data </h6>
        </div>
        
        <div class="card">
            <div class="card-body">
            <form action="" method="POST" id="edit-form-food">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Food Name</label>
                            <input type="text" name="name" class="form-control" required value="<?php echo $name; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" required><?php echo $description;?></textarea>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Meal</label>
                            <select name="meal" class="form-control" required>
                                <option value="breakfast" <?php if($meal == 'breakfast') echo 'selected'; ?>>Breakfast</option>
                                <option value="lunch" <?php if($meal == 'lunch') echo 'selected'; ?>>Lunch</option>
                                <option value="dinner" <?php if($meal == 'dinner') echo 'selected'; ?>>Dinner</option>
                                <option value="snacks" <?php if($meal == 'snacks') echo 'selected'; ?>>Snacks</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Diet</label>
                            <select name="diet" class="form-control" required>
                                <option value="Vegetarian" <?php if($diet == 'Vegetarian') echo 'selected'; ?>>Vegetarian</option>
                                <option value="Non-vegetarian" <?php if($diet == 'Non-vegetarian') echo 'selected'; ?>>Non-vegetarian</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Calories</label>
                            <input type="text" name="calories" class="form-control" required value="<?php echo $calories; ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Protein</label>
                            <input type="text" name="protein" class="form-control" required value="<?php echo $protein; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Fat</label>
                            <input type="text" name="fat" class="form-control" required value="<?php echo $fat; ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Carbohydrates</label>
                            <input type="text" name="carbohydrates" class="form-control" required value="<?php echo $carbohydrates; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Serving</label>
                            <input type="text" name="serving" class="form-control" required value="<?php echo $serving; ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Photo</label>
                            <input type="text" name="photo" class="form-control" value="<?php echo $photo; ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group float-right">
                            <a href="Food.php" class="btn btn-secondary">Close</a>
                            <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </form>

            </div>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script>
    var foodID = <?php echo $foodID; ?>;
</script>
<script src="javascript/edit.js"></script>



</body>

</html>

<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>