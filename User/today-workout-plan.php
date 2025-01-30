<?php 
session_start();

if (!isset($_SESSION['Username'])) {
  header("Location: pages-login.html");
  exit();
}

include("include_user/header.php");
include("include_user/nabvar.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Add some additional styling for better visualization */

        .holder {
            overflow-y: auto; /* Enable vertical scrolling when needed */
        }

        /* Styling for card */
        .card {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out;
            overflow: hidden; /* Prevent content overflow */
            margin-bottom: 20px;
            width: 100%; /* Take up full width by default */
            max-width: 400px; /* Limit maximum width */
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* Styling for card header */
        .card-header {
            color: white;
            font-size: 18px;
            font-weight: bold;
            padding: 10px;
            border-radius: 8px 8px 0 0;
            background-color: #007bff; /* Header background color */
        }

        /* Styling for card body */
        .card-body {
           
            padding: 10px;
            display: flex; /* Use flexbox for layout */
            align-items: center; /* Center items vertically */
        }

        /* Styling for image inside card */
        .card-img {
            width: 100px; /* Set fixed width for image */
            height: 100px; /* Set fixed height for image */
            border-radius: 8px; /* Add border radius for rounded corners */
            margin-right: 10px; /* Add spacing between image and text */
        }

        /* Styling for card title */
        .card-title {
            margin-top: -15px; /* Remove default margin */
           
            font-size: 16px; /* Adjust font size */
        }

        /* Styling for card text */
        .card-text {
            margin-bottom: 0; /* Remove default margin */
            font-size: 14px; /* Adjust font size */
        }

        /* Styling for label */
        .label {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        /* Styling for flexbox container */
        .flex-container {
            display: flex;
            align-items: center;
        }

        /* Styling for flexbox items */
        .flex-item {
            flex: 2; /* Distribute available space equally */
        }

        /* Styling for button */
        .btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 6px 12px; /* Smaller padding */
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        /* Styling for button hover */
        .btn:hover {
            background-color: #0056b3;
        }
        .info-icon-container {
            position: absolute;
            top: 10px; /* Adjust as needed */
            right: 10px; /* Adjust as needed */
        }

        .info-icon {
    font-size: 24px; /* Adjust the font size as needed */
}
        
    </style>
</head>
<body>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Exercise List</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Workout Planner</li>
                <li class="breadcrumb-item"><a href="workoutplans.php">Workout Plans</a></li>
                <li class="breadcrumb-item"><a href="7days-workout-plan.php">Workout List</a></li>
                <li class="breadcrumb-item active">Exercise List</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
    <div class="row">
        <div class="col-m day">
            
            <div class="row">

                <!-- DIV FOR THE Breakfast CARD -->
                <div id="breakfastFood">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-3 food-card">
                                <div class="card-body food-content">
                                    <div class="flex-container">
                                        <img src="https://elements-video-cover-images-0.imgix.net/607353d0-90ae-4323-9b95-90cbc1b4a895/video_preview/video_preview_0000.jpg?auto=compress&h=800&w=1200&fit=crop&crop=edges&fm=jpeg&s=0c6e4f28586dff445074ec6e3c48a900" alt="Food Image" class="card-img">
                                        <div class="flex-item">
                                            <h5 class="card-title mr-2">Exercise Name</h5>
                                            <p class="card-text">Sets: </p>
                                            <p class="card-text">Reps: </p>
                                        </div>
                                    </div>
                                    <div class="info-icon-container">
                                        <a href="#info-modal" >
                                            <i class="fa-solid fa-circle-info info-icon" onclick="openInfoModal('foodId123')"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        
                    </div>
                    
                </div>

                
            </div>
        </div>
    </div>

<div class="modal fade" id="info-modal" tabindex="-1" aria-labelledby="info-modal-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="info-modal-label">Execise Details</h5>
        
      </div>
      <div class="modal-body">
            <!-- YouTube embedded video centered -->
            <div class="mb-3 text-center">
                <h6>Video:</h6>
                <div class="embed-responsive embed-responsive-16by9 mx-auto">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/b75M62-tsxw" allowfullscreen></iframe>
                </div>
            </div>

            <!-- Details of the exercise -->
            <div class="mb-3">
                <h6>Exercise Name:</h6>
                <p>Exercise Name Goes Here</p>
            </div>
            <div class="mb-3">
                <h6>Description:</h6>
                <p>Description Goes Here</p>
            </div>
            <div class="mb-3">
                <h6>Sets & Reps:</h6>
                <p>Sets & Reps Go Here</p>
            </div>
            <div class="mb-3">
                <h6>Equipment:</h6>
                <p>Equipment Goes Here</p>
            </div>
            <!-- Add more details as needed -->
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


</section>





</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="assets/js/user-index.js"></script>
<script src="assets/js/navbar.js"></script>

<script>
    function openInfoModal(foodId) {
        // Do something with the foodId, such as displaying information in the modal
        console.log('Food ID:', foodId);
        
        // Show the modal
        var modal = new bootstrap.Modal(document.getElementById('info-modal'));
        modal.show();

    }

</script>
</body>
</html>




 

<?php 

include("include_user/footer.php");
?>