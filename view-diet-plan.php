<?php


session_start();

if (!isset($_SESSION['Username'])) {
    header("Location: index.php");
    exit();
}

if (isset($_GET['tab'])) {

  $_SESSION['currentTab'] = $_GET['tab'];
}

include('include_user/header.php');
include('include_user/navbar.php');
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

  <title>Diet Plan</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

</head>

<body>

  


  <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">


      <div class="card-header d-inline " style="font-size: 20px; font-weight: bold;">

        Diet Plans
        

      </div>


      <div class="card-body">

        <div class="table-responsive">

          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead class="table-dark">
              <tr class="text-center">
                <th> ID </th>
                <th> Daily Calories </th>
                <th>Goal </th>
                <th>Diet Type</th>
                <th>Date Created</th>
                <th>Edit </th>
              </tr>
            </thead>
            <tbody>
              <?php

                $user = $_SESSION['Username'];
                $sql = "SELECT * FROM diet_plans where user_id =  $user order by created_at asc";       

              // Prepare the SQL statement
                $stmt = $conn->prepare($sql);

                // Execute the query
                $result = $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    // Loop through and display all the data
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "
                        <tr class='text-center'>
                          <td>{$row['id']}</td>
                          <td>{$row['calories']}</td>
                          <td>{$row['weight_goal']}</td>
                          <td>{$row['diet_type']}</td>
                          <td>{$row['created_at']}</td>
                          
                          <td>
                              <div class='btn-group p-1' role='group'>
                                  <a class='btn btn-success update-button mr-1' href='edit-admin.php?edit_id={$row['id']}'><i class='fa-solid fa-eye'></i></a>    
                                  <a class='btn btn-primary update-button mr-1' href='edit-admin.php?edit_id={$row['id']}'><i class='fa-solid fa-download'></i></a>
                                  <button class='btn btn-danger delete-button' data-delete-type='dietplan' data-delete-id='{$row['id']}'><i class='fa-solid fa-trash'></i></button>
                                </div>
                          </td>
                        </tr>
                    ";
                    }
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
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

      
  <script>
        $(document).ready(function() {
            $('#example').on('click', '.delete-button', function() {
                // Get the delete type and ID from data attributes
                const deleteType = $(this).data('delete-type');
                const deleteID = $(this).data('delete-id');

                // Show a confirmation SweetAlert with a dynamic message
                Swal.fire({
                    title: 'Confirm Delete',
                    text: `Are you sure you want to delete this ${deleteType}?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: `Yes, delete ${deleteType}`
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = `delete.php?delete_${deleteType}_id=${deleteID}`;
                    }
                });
            });
        });

    </script>
  <script>
    new DataTable('#example');
  </script>

</body>

</html>

<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>