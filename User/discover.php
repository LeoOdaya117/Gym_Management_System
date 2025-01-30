<?php 
session_start();

if (!isset($_SESSION['Username'])) {
  header("Location: pages-login.html");
  exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Discover Page</title>
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap">

    <link rel="stylesheet" href="assets/css/discover.css">
</head>
<body>
    <div class="pagetitle">

    </div>
    <div class="search-container">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search..." id="search">
                        <button class="btn btn-outline-secondary" type="button" id="search-button"><i class="fas fa-search"></i></button>
                    </div>
                    <div class="container d-inline mt-5" id="nav">
                        <span class="d-inline nav-item" data-category="workout" onclick="toggleCategory('workout')">Workouts</span>
                        <span class="d-inline nav-item" data-category="exercise" onclick="toggleCategory('exercise')">Exercise</span>
                        <span class="d-inline nav-item" data-category="food" onclick="toggleCategory('food')">Food</span>
                        <span class="d-inline nav-item" data-category="equipment" onclick="toggleCategory('equipment')">Equipment</span>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container container-content">

        <div class="workoutcontainer " id="workoutscontainer">

            <div class="first_div" id="first_div">
                <div class="warm-up " onclick="fetchWorkouts('warmup','warmup')">
                    <h3>WARM UP EXERCISE</h3>
                        <div class="card">
                            <div class="card-img-overlay">
                                <h5 class="card-title">ABS BEGINNER</h5>
                                <p class="card-text">16 EXERCISES</p>
                            </div>
                            <img src="../img/discover/warmup.png" class="card-img" alt="Abs Training">
                        </div>
                    </div>
                <div class="beginner ">
                    <h3>BEGINNER</h3>
                    <div class="card" onclick="fetchWorkouts('ABS','BEGINNER')">
                        <div class="card-img-overlay">
                            <h5 class="card-title">ABS BEGINNER</h5>
                            <p class="card-text">16 EXERCISES</p>
                        </div>
                        <img src="../img/discover/abs.jpg" class="card-img" alt="Abs Training">
                    </div>
                    <div class="card" onclick="fetchWorkouts('CHEST','BEGINNER')">
                        <div class="card-img-overlay">
                            <h5 class="card-title">CHEST BEGINNER</h5>
                            <p class="card-text">11 EXERCISES</p>
                        </div>
                        <img src="../img/discover/chest.jpg" class="card-img" alt="Abs Training">
                    </div>
                    <div class="card">
                        <div class="card-img-overlay" onclick="fetchWorkouts('ARM','BEGINNER')">
                            <h5 class="card-title">ARM BEGINNER</h5>
                            <p class="card-text">19 EXERCISES</p>
                        </div>
                        <img src="../img/discover/arm.jpg" class="card-img" alt="Abs Training">
                    </div>
                    <div class="card" onclick="fetchWorkouts('LEG','BEGINNER')">
                        <div class="card-img-overlay">
                            <h5 class="card-title">LEG BEGINNER</h5>
                            <p class="card-text">23 EXERCISES</p>
                        </div>
                        <img src="../img/discover/leg.jpg" class="card-img" alt="Abs Training">
                    </div>
                    <div class="card" onclick="fetchWorkouts('SHOULDER','BEGINNER')">
                        <div class="card-img-overlay">
                            <h5 class="card-title">SHOULDER & BACK BEGINNER</h5>
                            <p class="card-text">16 EXERCISES</p>
                        </div>
                        <img src="../img/discover/back.jpg" class="card-img" alt="Abs Training">
                    </div>
                </div>

                <div class="intermidiate mt-3 ">
                    <h3>INTERMEDIATE</h3>
                    <div class="card" onclick="fetchWorkouts('ABS','INTERMEDIATE')">
                        <div class="card-img-overlay">
                            <h5 class="card-title">ABS INTERMEDIATE</h5>
                            <p class="card-text">16 EXERCISES</p>
                        </div>
                        <img src="../img/discover/abs.jpg" class="card-img" alt="Abs Training">
                    </div>
                    <div class="card" onclick="fetchWorkouts('CHEST','INTERMEDIATE')">
                        <div class="card-img-overlay">
                            <h5 class="card-title">CHEST INTERMEDIATE</h5>
                            <p class="card-text">11 EXERCISES</p>
                        </div>
                        <img src="../img/discover/chest.jpg" class="card-img" alt="Abs Training">
                    </div>
                    <div class="card" onclick="fetchWorkouts('ARM','INTERMEDIATE')">
                        <div class="card-img-overlay">
                            <h5 class="card-title">ARM INTERMEDIATE</h5>
                            <p class="card-text">19 EXERCISES</p>
                        </div>
                        <img src="../img/discover/arm.jpg" class="card-img" alt="Abs Training">
                    </div>
                    <div class="card" onclick="fetchWorkouts('LEGS','INTERMEDIATE')">
                        <div class="card-img-overlay">
                            <h5 class="card-title">LEG INTERMEDIATE</h5>
                            <p class="card-text">23 EXERCISES</p>
                        </div>
                        <img src="../img/discover/leg.jpg" class="card-img" alt="Abs Training">
                    </div>
                    <div class="card" onclick="fetchWorkouts('SHOULDER','INTERMEDIATE')">
                        <div class="card-img-overlay">
                            <h5 class="card-title">SHOULDER & BACK INTERMEDIATE</h5>
                            <p class="card-text">16 EXERCISES</p>
                        </div>
                        <img src="../img/discover/back.jpg" class="card-img" alt="Abs Training">
                    </div>
                </div>

                <div class="advanced mt-3">
                    <h3>ADVANCED</h3>
                    <div class="card" onclick="fetchWorkouts('ABS','ADVANCED')">
                        <div class="card-img-overlay">
                            <h5 class="card-title">ABS ADVANCED</h5>
                            <p class="card-text">16 EXERCISES</p>
                        </div>
                        <img src="../img/discover/abs.jpg" class="card-img" alt="Abs Training">
                    </div>
                    <div class="card" onclick="fetchWorkouts('CHEST','ADVANCED')">
                        <div class="card-img-overlay">
                            <h5 class="card-title">CHEST ADVANCED</h5>
                            <p class="card-text">11 EXERCISES</p>
                        </div>
                        <img src="../img/discover/chest.jpg" class="card-img" alt="Abs Training">
                    </div>
                    <div class="card" onclick="fetchWorkouts('ARM','ADVANCED')">
                        <div class="card-img-overlay">
                            <h5 class="card-title">ARM ADVANCED</h5>
                            <p class="card-text">19 EXERCISES</p>
                        </div>
                        <img src="../img/discover/arm.jpg" class="card-img" alt="Abs Training">
                    </div>
                    <div class="card" onclick="fetchWorkouts('LEG','ADVANCED')">
                        <div class="card-img-overlay">
                            <h5 class="card-title">LEG ADVANCED</h5>
                            <p class="card-text">23 EXERCISES</p>
                        </div>
                        <img src="../img/discover/leg.jpg" class="card-img" alt="Abs Training">
                    </div>
                    <div class="card" onclick="fetchWorkouts('SHOULDER','ADVANCED')">
                        <div class="card-img-overlay">
                            <h5 class="card-title">SHOULDER & BACK ADVANCED</h5>
                            <p class="card-text">16 EXERCISES</p>
                        </div>
                        <img src="../img/discover/back.jpg" class="card-img" alt="Abs Training">
                    </div>
                </div>
            </div>
            
            <div class="second_div" id="second_div">
                <h1>WORKOUT</h1>
                <div class="workout-exercises fade-element">
                
                </div>
            </div>

            

            <div class="third_div" id="third_div">
                <h1>WARM UP</h1>
                <div class="warmup-exercise">
                </div>
            
            </div>

            
        </div>

        


        <div class="exercisecontainer fade-element" onclick="fetchExercises('');">
            <!-- <div class="card">
                <div class="card-img-overlay">
                    <h5 class="card-title">Push Up</h5>
                    <p class="card-text">Body Only</p>
                    <i class="fa-solid fa-circle-info info-icon" onclick="openInfoModal('exerciseId123', 'Push Up')"></i>


                </div>
                <img src="https://cdn.mos.cms.futurecdn.net/9ghCpUY6JaLtStkZkeH73T.jpg" class="card-img" alt="Push Up image">
            </div> -->
        </div>

        <div class="foodcontainer fade-element" onclick="fetchFood('');">
            <!-- <div class="card">
            <img src="https://www.shutterstock.com/image-photo/bunch-yellow-beautiful-bananas-on-600nw-2063683268.jpg" class="card-img" alt="Banana Picture">

                <div class="card-img-overlay">
                    <h5 class="card-title">Banna</h5>
                    <p class="card-text">Serving: 100g </p>
                    <i class="fa-solid fa-circle-info info-icon" onclick="openInfoModal('foodId123', 'Banana', 'food')"></i>
                </div>
            </div> -->
        </div>

        <div class="equipmentcontainer fade-element" onclick="fetchEquipment('');">
            <!-- <div class="card">
                <div class="image-container">
                    <img src="https://hips.hearstapps.com/hmg-prod/images/treadmill-testing-0367-1578930314.jpg" class="card-img" alt="Thread Mill Picture">
                    <div class="card-img-overlay">
                        <h5 class="card-title">Thread Mill</h5>
                        <p class="card-text"> </p>
                        <i class="fa-solid fa-circle-info info-icon" onclick="openInfoModal('equipmentId123', 'Treadmill', 'equipment')"></i>
                    </div>
                </div>
            </div> -->
        </div>




        
        
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://www.youtube.com/iframe_api"></script>
    <script src="assets/js/discover.js"></script>
    <script>
    // JavaScript to trigger fade effect on cards when the document is ready
    $(document).ready(function() {
        $('.fade-element').addClass('show');
    });
    </script>


</body>
</html>

<?php 
include("include_user/footer.php");
?>
