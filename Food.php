<?php


session_start();

if (!isset($_SESSION['Username'])) {
  header("Location: home.php");
  exit();
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        .dt-button{
            border-radius: 20px;
         }
    </style>

    <title>Document</title>
    
    
</head>

<body>

<div class="modal fade" id="addFood" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Food</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form action="" method="POST" id="food-form">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Food_Name">Food Name</label>
                            <input type="text" name="Food_Name" id="Food_Name" class="form-control" placeholder="Enter Food Name" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="Meal">Meal</label>
                            <select name="Meal" id="Meal" class="form-control" required>
                                <option value="" disabled selected> --Select Meal--</option>
                                <option value="Breakfast">Breakfast</option>
                                <option value="Lunch">Lunch</option>
                                <option value="Dinner">Dinner</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Diet">Diet</label>
                            <select name="Diet" id="Diet" class="form-control" required>
                                <option value="" disabled selected>--Select Diet--</option>
                                <option value="Vegetarian">Vegetarian</option>
                                <option value="Non-Vegetarian">Non-Vegetarian</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Calories">Calories</label>
                            <input type="text" name="Calories" id="Calories" class="form-control" placeholder="Enter Calories" required>
                        </div>
                        <div class="form-group">
                            <label for="Protein">Protein</label>
                            <input type="text" name="Protein" id="Protein" class="form-control" placeholder="Enter Protein" required>
                        </div>
                        <div class="form-group">
                            <label for="Fat">Fat</label>
                            <input type="text" name="Fat" id="Fat" class="form-control" placeholder="Enter Fat" required>
                        </div>
                        <div class="form-group">
                            <label for="Carb">Carb</label>
                            <input type="text" name="Carb" id="Carb" class="form-control" placeholder="Enter Carb" required>
                        </div>
                        <div class="form-group">
                            <label for="Serving">Serving</label>
                            <input type="text" name="Serving" id="Serving" class="form-control" placeholder="Enter Serving" required>
                        </div>
                        <div class="form-group">
                            <label for="Serving">Image Link</label>
                            <input type="text" name="image_link" id="image_link" class="form-control" placeholder="https://example.com/exercise_image.jpg" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="addFood" class="btn btn-primary">Add</button>
                    </div>
                </form>


            </div>
        </div>
    </div>


  <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">


        <div class="card-header d-inline " style="font-size: 20px; font-weight: bold;">

            Food Module
            <button type="button" class="btn btn-dark float-sm-right" data-toggle="modal"
                data-target="#addFood">
                Add New Food
            </button>

        <!-- Topbar Search -->


        </div>

        <div class="container" style="margin-top: 20px; margin-bottom:20px">

            <div class="table-responsive">

            <table id="example" class="table table-striped table-bordered table-hover" style="width:100%; font-size: 12px;">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Food</th>
                            <th>Meal</th>
                            <th>Diet</th>
                            <!-- <th>Calories</th>
                            <th>Protein</th>
                            <th>Fat</th>
                            <th>Carb</th> -->
                            <th>Serving</th>
                            <th>Info</th>
                        </tr>
                    </thead>
                    <tbody class="">

                        <?php
                            include('config.php');

                           
                            $sql = "SELECT * FROM foods order by `name` ASC";
                            // Prepare the SQL statement
                            $stmt = $conn->prepare($sql);

                            // Execute the query
                            $result = $stmt->execute();

                            // Check if there are any rows in the result set
                            if ($stmt->rowCount() > 0) {
                                $count = 1;
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo "
                                        <tr>
                                            <td class='text-center'>{$count}</td>
                                            <td >{$row['name']}</td>
                                            <td class='text-center'>{$row['meal']}</td>
                                            <td class='text-center'>{$row['diet']}</td>
                                            
                                            <td>{$row['serving']}</td>
                                            <td class='text-sm text-center'>
                                                <div class='btn-group p-1' role='group'>
                                                    <a class='btn  btn-sm  btn-success update-button mr-1' href='edit-food.php?edit_id={$row['id']}' title='Edit Button'><i class='fa-solid fa-pen-to-square'></i></a>
                                                    <button class='btn  btn-sm  btn-danger delete-button' data-delete-type='food' data-delete-id='{$row['id']}' title='Delete Button'><i class='fa-solid fa-trash'></i></button>
                                                    </div>
                                            </td>
                                        </tr>
                                        ";
                                        $count = $count +1;
                                }
                            } else {
                                // Display a message when there are no results
                                echo "
                                    <tr>
                                        <td colspan='7' class='text-center'>No exercise data available.</td>
                                    </tr>
                                    ";
                            }
                            // <td>{$row['calories']}</td>
                            // <td>{$row['protein']}</td>
                            // <td>{$row['fat']}</td>
                            // <td>{$row['carbohydrates']}</td>
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
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script></scripts>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="javascript/food.js"></script>
    

</body>

</html>

<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>