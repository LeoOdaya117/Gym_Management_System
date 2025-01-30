
<?php
    include('config.php');

    $deleteType ="";
    $deleteID = "";

    if(isset($_POST['deleteType'])){
        $deleteType = $_POST['deleteType'];
    }

    if(isset($_POST['deleteID'])){
        $deleteID = $_POST['deleteID'];
    }

    // DELETING SUBCRIPTION DATA
    if ($deleteType == "subscription") {

        $query = "DELETE FROM Subscription WHERE id = $deleteID";

        try {
            if ($conn->exec($query)) {
                echo 'Success';

            } else {
                echo 'Something went wrong!';
                
            }
        } catch (Throwable $th) {
            echo $th;
        }


        // Close the database connection
        $conn = null;
    }
    

    // DELETING EXERCISE DATA
    if ($deleteType == "exercise") {

        $query = "DELETE FROM `exercises` WHERE `ExerciseID` = '$deleteID'";

        try {
            if ($conn->exec($query)) {
                echo 'Success';

            } else {
                echo 'Something went wrong!';
                
            }
        } catch (Throwable $th) {
            echo $th;
        }


        // Close the database connection
        $conn = null;
    }


    // DELETING FOOD DATA
    if ($deleteType == "food") {

        $query = "DELETE FROM foods WHERE id = $deleteID";

        try {
            if ($conn->exec($query)) {
                echo 'Success';

            } else {
                echo 'Something went wrong!';
                
            }
        } catch (Throwable $th) {
            echo $th;
        }


        // Close the database connection
        $conn = null;
    }



    // DELETING ADMIN ACCOUNT
    if ($deleteType == "admin") {


        $query = "DELETE FROM account WHERE IdNum = '$deleteID'";

        try {
            if ($conn->exec($query)) {
                echo 'Success';

            } else {
                echo 'Something went wrong!';

            }
        } catch (Throwable $th) {
            echo $th;
        }

        // Close the database connection
        $conn = null;
    }

    // DELETING USER ACCOUNT
    if ($deleteType == "user") {

        $query = "DELETE FROM account WHERE IdNum = $deleteID";

        try {
            if ($conn->exec($query)) {
                // Use JavaScript to show a success SweetAlert and then redirect
                echo 'Success';
            } else {
                // Use JavaScript to show an error SweetAlert and then redirect
                echo 'Something went wrong!';
            }
        } catch (Throwable $th) {
            echo $th;
        }
        $conn = null;
    }

    // REJECT PENDING REGISTRATION
    if ($deleteType == "reject") {
       
        $query = "DELETE FROM account WHERE IdNum = $deleteID";

        try {
            if ($conn->exec($query)) {
                // Use JavaScript to show a success SweetAlert and then redirect
                echo 'Success';
            } else {
                // Use JavaScript to show an error SweetAlert and then redirect
                echo 'Something went wrong!';
            }
        } catch (Throwable $th) {
            echo $th;
        }
        $conn = null;
    }

    if (isset($_GET['delete_dietplan_id'])) {
        $delete_dietplan_id = $_GET['delete_dietplan_id'];


        $query = "DELETE FROM diet_plans WHERE id = $delete_dietplan_id";

        // Execute the query
        if ($conn->exec($query)) {
            // Use JavaScript to show an error SweetAlert and then redirect
            echo '<script type="text/JavaScript">
                Swal.fire({
                    icon: "success",
                    title: "Diet plan Deleted successfully!",
                    showConfirmButton: false,
                    timer: 1000
                }).then(function() {
                    window.location.href = "view-diet-plan.php"; 
                });
            </script>';
        } else {
            // Use JavaScript to show an error SweetAlert and then redirect
            echo '<script type="text/JavaScript">
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Something went wrong!",
                }).then(function() {
                    window.location.href = "view-diet-plan.php"; 
                });
            </script>';
        }

        // Close the database connection
        $conn = null;
    }


    // EQUIPMENT PART 
    if ($deleteType == "equipment") {

        $query = "DELETE FROM Equipment WHERE equipmentID = $deleteID";

        // Execute the query
        
        try {
            if ($conn->exec($query)) {
                // Use JavaScript to show a success SweetAlert and then redirect
                echo 'Success';
            } else {
                // Use JavaScript to show an error SweetAlert and then redirect
                echo 'Something went wrong!';
            }
        } catch (Throwable $th) {
            echo $th;
        }

        $conn = null;
    }

    // DELETING SUBSCRIPTION
    if ($deleteType == "subscription") {

        $query = "DELETE FROM subscription WHERE id = $deleteID";

        // Execute the query
        
        try {
            if ($conn->exec($query)) {
                // Use JavaScript to show a success SweetAlert and then redirect
                echo 'Success';
            } else {
                // Use JavaScript to show an error SweetAlert and then redirect
                echo 'Something went wrong!';
            }
        } catch (Throwable $th) {
            echo $th;
        }

        $conn = null;
    }
?>

