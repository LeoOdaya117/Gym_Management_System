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

<div class="modal fade" id="addExercises" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Exercises</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" id="exercise-form">

                    <div class="modal-body">

                        <form action="process_exercise.php" method="POST">
                            <div class="form-group">
                                <label for="exercise_name">Exercise Name:</label>
                                <input type="text" class="form-control" id="exercise_name" name="exercise_name"
                                    required placeholder="Enter Exercise name">
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" id="description" name="description" required placeholder="Enter exercise description"> </textarea>
                            </div>

                            <div class="row">
                                <!-- First column (6 columns wide on medium and larger screens) -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName">Set:</label>
                                        <input type="text" class="form-control" id="set" name="set" required placeholder="Enter exercise set">
                                    </div>
                                </div>

                                <!-- Second column (6 columns wide on medium and larger screens) -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lastName">Reps:</label>
                                        <input type="text" class="form-control" id="reps" name="reps" required placeholder="Enter exercise repitition">
                                    </div>
                                </div>
                            </div>

                            <!-- Second row with a single column -->
                            <div class="row">
                       
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Duration:</label>
                                        <input type="text" class="form-control" id="duration" name="duration" required placeholder="Enter exercise duration">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label for="calorie_burn_rate">Calorie Burn Rate:</label>
                                <input type="number" class="form-control" id="calorie_burn_rate"
                                    name="calorie_burn_rate" required>
                            </div> -->
                            <!-- <div class="form-group">
                                <label for="muscle_building">Muscle-Building:</label>
                                <select class="form-control" id="muscle_building" name="muscle_building" required>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div> -->
                            <div class="form-group">
                                <label for="category_id">Category:</label>
                                <select class="form-control" id="category_id" name="category_id" required>
                                    <option value="" disabled selected>--Select a Category--</option>
                                    <option value="Weight Loss">Weight Loss</option>
                                    <option value="Gain Weight">Gain Weight</option>
                                    <option value="Maintain Weight">Maintain Weight</option>
                                    <option value="Muscle Gain">Muscle Gain</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Part_Of_Body">Part of the Body:</label>
                                <select class="form-control" id="Part_Of_Body" name="Part_Of_Body" required>
                                    <option value="" disabled selected>--Select part of the Body--</option>
                                    <option value="Core">Core</option>
                                    <option value="Legs">Legs</option>
                                    <option value="Upper Body">Upper Body</option>
                                    <option value="Cardio">Cardio</option>
                                    <option value="Back">Back</option>
                                    <option value="Full Body">Full Body</option>
                                    
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <label for="Part_Of_Body">Part of the Body:</label>
                                <input type="text" class="form-control" id="Part_Of_Body" name="Part_Of_Body"
                                    placeholder="Enter Part of the Body">
                            </div> -->
                            <div class="form-group">
                                <label for="equipment">Equipment:</label>
                                <input type="text" class="form-control" id="equipment" name="equipment"
                                    placeholder="Enter equipment details">
                            </div>
                            <div class="form-group">
                                <label for="difficulty">Difficulty:</label>
                                <select class="form-control" id="difficulty" name="difficulty" required>
                                    <option value="" disabled selected>--Select Difficulty--</option>
                                    <option value="BEGINNER">BEGINNER</option>
                                    <option value="INTERMEDIATE">INTERMEDIATE</option>
                                    <option value="ADVANCED">ADVANCED</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="instructions">Instructions:</label>
                                <textarea class="form-control" id="instructions" name="instructions"
                                    required placeholder="Enter exercise instruction"></textarea>
                            </div>
                            <!-- New Fields for Image and Video URLs -->
                            <div class="form-group">
                                <label for="image_url">Image URL:</label>
                                <input type="text" class="form-control" id="image_url" name="image_url"
                                    placeholder="https://example.com/exercise_image.jpg">
                            </div>
                            <div class="form-group">
                                <label for="video_url">Video URL:</label>
                                <input type="text" class="form-control" id="video_url" name="video_url"
                                    placeholder="https://example.com/exercise_video.mp4">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


  <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">


        <div class="card-header d-inline " style="font-size: 20px; font-weight: bold;">

            Exercises
            <button type="button" class="btn btn-dark float-sm-right" data-toggle="modal"
                data-target="#addExercises">
                Add New Exercise
            </button>

        <!-- Topbar Search -->


        </div>

        <div class="container" style="margin-top: 20px; margin-bottom:20px">

            <div class="table-responsive">

            <table id="example" class="table table-striped table-bordered table-hover"  style="width:100%; font-size: 12px; ">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Exercise</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Equipment</th>
                            <th>Difficulty</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

                        <?php
                            include('config.php');

                            if (isset($_POST["search_exercise"])) {
                                $search_exercise = $_POST["search_exercise"];

                                // SQL query to search for exercises based on ExerciseName using a wildcard (%)
                                $sql = "SELECT * FROM Exercises WHERE ExerciseName LIKE '%$search_exercise%'";
                            } else {
                                $sql = "SELECT * FROM Exercises ORDER BY ExerciseName";
                            }

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
                                            <td>{$count}</td>
                                            <td>{$row['ExerciseName']}</td>
                                            <td class='text-left'>{$row['Description']}</td>
                                            <td>{$row['PartOfBody']}</td>
                                            <td>{$row['EquipmentID']}</td>
                                            <td>{$row['Difficulty']}</td>
                                            <td class='text-sm'>
                                                <div class='btn-group p-1' role='group'>
                                                    <a class='btn btn-success btn-sm update-button mr-1' href='edit-exercise.php?edit_id={$row['ExerciseID']}' title='Edit Button'><i class='fa-solid fa-pen-to-square'></i></a>
                                                    <button class='btn btn-danger btn-sm delete-button' data-delete-type='exercise' data-delete-id='{$row['ExerciseID']}' title='Delete Button'><i class='fa-solid fa-trash'></i></button>
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

    <script src="javascript/exercise.js"></script>
    

</body>

</html>

<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>