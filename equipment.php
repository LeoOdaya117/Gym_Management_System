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

<div class="modal fade" id="addEquipment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Equipment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" id="equipment-form">

                    <div class="modal-body">

                        <form action="process_exercise.php" method="POST">
                            <div class="form-group">
                                <label for="exercise_name">Equipment Name:</label>
                                <input type="text" class="form-control" id="equipment_name" name="equipment_name"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" id="description" name="description" required></textarea>
                            </div>
                            
                        
                            <div class="form-group">
                                <label for="image_url">Image URL:</label>
                                <input type="text" class="form-control" id="image_url" name="image_url"
                                    placeholder="https://example.com/exercise_image.jpg">
                            </div>
                         
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="saveEquipment" id="saveEquipment" class="btn btn-primary">Save</button>
                    </div>
                </form>



            </div>
        </div>
    </div>


  <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">


        <div class="card-header d-inline " style="font-size: 20px; font-weight: bold;">

            Equipment
            <button type="button" class="btn btn-dark float-sm-right" data-toggle="modal"
                data-target="#addEquipment">
                Add New Equipment
            </button>

        <!-- Topbar Search -->


        </div>

        <div class="container" style="margin-top: 20px; margin-bottom:20px">

            <div class="table-responsive">

            <table id="example" class="table table-striped table-bordered table-hover"  style="width:100%; font-size: 12px; ">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Equipment Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

                        <?php
                            include('config.php');

                            $sql = "SELECT * FROM Equipment";

                            // Prepare the SQL statement
                            $stmt = $conn->prepare($sql);

                            // Execute the query
                            $result = $stmt->execute();

                            // Check if there are any rows in the result set
                            if ($stmt->rowCount() > 0) {
                                // Loop through and display all the data
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo "
                                        <tr>
                                            <td>{$row['equipmentID']}</td>
                                            <td>{$row['equipmentName']}</td>
                                            <td class='text-left'>{$row['equipmentDescription']}</td>
                                            <td class='text-sm'>
                                                <div class='btn-group p-1' role='group'>
                                                    <a class='btn btn-sm btn-success update-button mr-1' href='edit-equipment.php?edit_id={$row['equipmentID']}' title='Edit Button'><i class='fa-solid fa-pen-to-square'></i></a>
                                                    <button class='btn  btn-sm  btn-danger delete-button' data-delete-type='equipment' data-delete-id='{$row['equipmentID']}' title='Delete Button'><i class='fa-solid fa-trash'></i></button>
                                                    </div>
                                            </td>
                                        </tr>
                                        ";
                                }
                            } else {
                                // Display a message when there are no results
                                echo "
                                    <tr>
                                        <td colspan='4' class='text-center'>No exercise data available.</td>
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
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script></scripts>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="javascript/equipment.js"></script>


</body>

</html>

<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>