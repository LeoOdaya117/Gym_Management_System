<?php 
session_start();

if (!isset($_SESSION['Username'])) {
  header("Location: pages-login.html");
  exit();
}


$workouplanid = $_GET['WorkoutPlanID'];
$day = $_GET['day'];
$daytoday = "";

if($day == 0){
    $daytoday ="Monday";
}elseif($day == 1){
    $daytoday = "Tuesday";
}elseif($day == 2){
    $daytoday = "Wednesday";
}elseif($day == 3){
    $daytoday = "Thursday";
}elseif($day == 4){
    $daytoday = "Friday";
}elseif($day == 5){
    $daytoday = "Saturday";
}elseif($day == 6){
    $daytoday = "Sunday";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/breadcrumb.css">
    <link rel="stylesheet" href="assets/css/dietplan.css">   
    <style>
        /* Add some additional styling for better visualization */
        body{
            padding: 20px;
        }
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

.instruction-content {
    font-size: 15px;
    max-height: 50px; /* Adjust as needed */
    overflow: hidden;
    transition: max-height 0.3s ease;
}

.instruction-content.expanded {
    max-height: none;
}


.description-content {
    font-size: 15px;
    max-height: 50px; /* Adjust as needed */
    overflow: hidden;
    transition: max-height 0.3s ease;
}

.description-content.expanded {
    max-height: none;
}
        
    </style>
</head>
<body>
<main id="main" class="main">
    <div class="pagetitle">
        <h1><?php echo $daytoday;?> Exercises</h1>
        <nav>
            <ol class="breadcrumb">
                <!-- <li class="breadcrumb-item"><a href="index.php">Home</a></li> -->
           
                <li class="breadcrumb-item" id="plan">Plan</li>

                <li class="breadcrumb-item" onclick="gotonextURL('workoutplan_noheader.php')">Workout Plans</li>
                <li class="breadcrumb-item" onclick="gotonextURL('7days-workout-plan_no_header.php?id=<?php echo $workouplanid;?>')">Day List</li>
                <li class="breadcrumb-item active">Exercise List</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
    <div class="row">
        <div class="col-m day">
            
            <div class="row">

                <!-- DIV FOR THE Exercise CARD -->
                <div id="exercisecard">
                    <div class="row">
                        

                        
                    </div>
                    
                </div>

                
            </div>
        </div>
    </div>



</section>





</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://www.youtube.com/iframe_api"></script>
<script src="assets/js/workoutplan.js"></script>

</body>
</html>




 

<?php 

include("include_user/footer.php");
?>