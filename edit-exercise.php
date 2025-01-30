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
                    //echo "EXERCISE ID: " . $id;
                  } else {
                    echo "ID parameter not found in URL";
                  }

                  
                
                  $edit_exercise_name = "";
                  $edit_description = "";
                //   $edit_calorie_burn_rate = "";
                //   $edit_muscle_building = "";
                  $edit_category_id = "";
                  $edit_Part_Of_Body = "";
                  $edit_equipment = "";
                  $edit_difficulty = "";
                  $edit_instructions = "";
                  $edit_image_url = "";
                  $edit_video_url = "";
                
                  if (isset( $id)){
                    

                    $editsql = "SELECT * FROM exercises WHERE ExerciseID ='$id'";
                    
                      // Prepare the SQL statement
                    $stmt = $conn->prepare($editsql);
                  
                    // Execute the query
                    $result = $stmt->execute();
                    if ($result) {
                        // Loop through and display all the data
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                          
                          $edit_exercise_name = $row["ExerciseName"];
                          $edit_description = $row["Description"];
                        //   $edit_calorie_burn_rate = $row["CalorieBurnRate"];
                        //   $edit_muscle_building = $row["MuscleBuilding"];
                          $edit_category_id = $row["Goal"];
                          $edit_Part_Of_Body = $row["PartOfBody"];
                          $edit_set = $row["set"];
                          $edit_reps = $row["reps"];
                          $edit_duration = $row["duration"];
                          $edit_equipment = $row["EquipmentID"];
                          $edit_difficulty = $row["Difficulty"];
                          $edit_instructions = $row["Instructions"];
                          $edit_image_url = $row["ImageURL"];
                          $edit_video_url = $row["VideoURL"];
                        }

                        
                    } else {
                        echo "No exercise data available.";
                    }
                  
                    // Close the database connection
                    $conn = null;
                  }
                  $exerciseid = json_encode($id);
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
            <h6 class="m-0 font-weight-bold text-primary"> EDIT Exercise/Workout </h6>
        </div>
        <div class="card-body">
        
        <div class="card">
    <div class="card-body">
        <form action="" method="POST" id="edit-form-exercise">
            <div class="row">
                <div class="col-md-6">
                    <!-- Column 1 -->
                    <div class="form-group">
                        <label for="exercise_name">Exercise Name:</label>
                        <input type="text" class="form-control" id="edit_exercise_name" name="edit_exercise_name" value="<?php echo $edit_exercise_name;?>" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="edit_description" name="edit_description" required><?php echo $edit_description;?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="equipment">Set:</label>
                        <input type="text" class="form-control" id="edit_set" name="edit_set" value="<?php echo $edit_set;?>" placeholder="Enter set">
                    </div>
                    <div class="form-group">
                        <label for="equipment">Reps:</label>
                        <input type="text" class="form-control" id="edit_reps" name="edit_reps" value="<?php echo $edit_reps;?>" placeholder="Enter reps">
                    </div>
                    
                    <div class="form-group">
                        <label for="difficulty">Difficulty:</label>
                        <select class="form-control" id="edit_difficulty" name="edit_difficulty" required>
                            <option value="BEGINNER" <?php if ($edit_difficulty === "BEGINNER") echo "selected"; ?>>BEGINNER</option>
                            <option value="INTERMEDIATE" <?php if ($edit_difficulty === "INTERMEDIATE") echo "selected"; ?>>INTERMEDIATE</option>
                            <option value="ADVANCED" <?php if ($edit_difficulty === "ADVANCED") echo "selected"; ?>>ADVANCED</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category:</label>
                        <select class="form-control" id="edit_category_id" name="edit_category_id" required>
                            <option value="Weight Loss" <?php if ($edit_category_id === "Weight Loss") echo "selected"; ?>>Weight Loss</option>
                            <option value="Gain Weight" <?php if ($edit_category_id === "Gain Weight") echo "selected"; ?>>Gain Weight</option>
                            <option value="Maintain Weight" <?php if ($edit_category_id === "Maintain Weight") echo "selected"; ?>>Maintain Weight</option>
                            <option value="Muscle Gain" <?php if ($edit_category_id === "Muscle Gain") echo "selected"; ?>>Muscle Gain</option>
                            <!-- Add more categories as needed -->
                        </select>
                    </div>
                    <!-- Add more fields for column 1 -->
                </div>
                <div class="col-md-6">
                    <!-- Column 2 -->
                    <div class="form-group">
                        <label for="category_id">Part of the Body:</label>
                        <select class="form-control" id="edit_Part_Of_Body" name="edit_Part_Of_Body" required>
                            <option value="Core" <?php if ($edit_Part_Of_Body === "Core") echo "selected"; ?>>Core</option>
                            <option value="Legs" <?php if ($edit_Part_Of_Body === "Legs") echo "selected"; ?>>Legs</option>
                            <option value="Upper Body" <?php if ($edit_Part_Of_Body === "Upper Body") echo "selected"; ?>>Upper Body</option>
                            <option value="Back" <?php if ($edit_Part_Of_Body === "Back") echo "selected"; ?>>Back</option>
                            <option value="Full Body" <?php if ($edit_Part_Of_Body === "Full Body") echo "selected"; ?>>Full Body</option>
                            
                            <!-- Add more categories as needed -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="equipment">Equipment:</label>
                        <input type="text" class="form-control" id="edit_equipment" name="edit_equipment" value="<?php echo $edit_equipment;?>" placeholder="Enter equipment details">
                    </div>
                    <div class="form-group">
                        <label for="equipment">Duration:</label>
                        <input type="text" class="form-control" id="edit_duration" name="edit_duration" value="<?php echo $edit_duration;?>" placeholder="Enter reps">
                    </div>
                    <div class="form-group">
                        <label for="image_url">Image URL:</label>
                        <input type="text" class="form-control" id="edit_image_url" name="edit_image_url" value="<?php echo $edit_image_url;?>" placeholder="https://example.com/exercise_image.jpg">
                    </div>
                    <div class="form-group">
                        <label for="video_url">Video URL:</label>
                        <input type="text" class="form-control" id="edit_video_url" name="edit_video_url" value="<?php echo $edit_video_url;?>" placeholder="https://example.com/exercise_video.mp4">
                    </div> 
                    <div class="form-group">
                        <label for="instructions">Instructions:</label>
                        <textarea class="form-control" id="edit_instructions" name="edit_instructions" required><?php echo $edit_instructions;?></textarea>
                    </div>
                    
                    <!-- Add more fields for column 2 -->
                </div>
            </div>
            <div class="row">
                <!-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="calorie_burn_rate">Calorie Burn Rate:</label>
                        <input type="number" class="form-control" id="edit_calorie_burn_rate" name="edit_calorie_burn_rate" value="<?php echo $edit_calorie_burn_rate;?>" required>
                    </div>
                    <div class="form-group">
                        <label for="muscle_building">Muscle-Building:</label>
                        <select class="form-control" id="edit_muscle_building" name="edit_muscle_building" required>
                            <option value="1" <?php if ($edit_muscle_building === "1") echo "selected"; ?>>Yes</option>
                            <option value="0" <?php if ($edit_muscle_building === "0") echo "selected"; ?>>No</option>
                        </select>
                    </div>

                </div> -->
                

            </div>
            
            <div class="modal-footer">
                <a href="exercise.php" class="btn btn-secondary">Close</a>
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
    var exerciseid = <?php echo $exerciseid; ?>;
</script>
<script src="javascript/edit.js"></script>
</body>

</html>

<?php
include('includes/scripts.php');

?>