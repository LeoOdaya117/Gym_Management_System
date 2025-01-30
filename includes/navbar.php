   <!-- Sidebar -->
   <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin-index.php">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-dumbbell"></i>
  </div>
  <div class="sidebar-brand-text mx-3">BFAG Pacita</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="admin-index.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Account
</div>

<!-- Nav Item - Pages Collapse Menu -->

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-folder"></i>
    <span>Account</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <!-- <h6 class="collapse-header">Account Setting</h6> -->
     <!-- <a class="collapse-item" href="login.php">Login</a>-->
      <!--<a class="collapse-item" href="register.php">Register</a>-->
      <a class="collapse-item" href="myprofile.php">My Profile</a>
      <a class="collapse-item" href="change-password.php">Change Password</a>
      
      <div class="collapse-divider"></div>
     <!-- <h6 class="collapse-header">Other Pages:</h6>-->
      <!--<a class="collapse-item" href="404.html">404 Page</a>-->
     <!-- <a class="collapse-item" href="blank.html">Blank Page</a>-->
    </div>
  </div>
</li>

<!-- <li class="nav-item">
  <a class="nav-link" href="myprofile.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>My Profile</span></a>
</li> -->


<!--  MEMBERSHIP -->
<hr class="sidebar-divider">
<div class="sidebar-heading">
  Gym Management
</div>
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#membershipCollapse" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-folder"></i>
    <span>  Gym Management</span>
  </a>
  <div id="membershipCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <!-- <h6 class="collapse-header">Account Setting</h6> -->
     <!-- <a class="collapse-item" href="login.php">Login</a>-->
      <!--<a class="collapse-item" href="register.php">Register</a>-->
      <a class="collapse-item" href="attendance.php">Attendance</a>
      <a class="collapse-item" href="member_status.php">Member's status</a>
      <!-- <a class="collapse-item" href="member_status.php">Notifications</a> -->
      <a class="collapse-item" href="forApproval.php">Pending For Approval</a>
      <a class="collapse-item" onclick="promptForPassword('staff_list.php')">Staff List</a>
      <a class="collapse-item"  onclick="promptForPassword('subscription_list.php')">Subscription List</a>
      <div class="collapse-divider"></div>
     <!-- <h6 class="collapse-header">Other Pages:</h6>-->
      <!--<a class="collapse-item" href="404.html">404 Page</a>-->
     <!-- <a class="collapse-item" href="blank.html">Blank Page</a>-->
    </div>
  </div>
</li>


<!-- Divider -->
<!-- <hr class="sidebar-divider">

Heading
<div class="sidebar-heading">
  Membership Management
</div>

<li class="nav-item">
  <a class="nav-link" href="users_datas.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Gym Members</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="forApproval.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Account For Approval</span></a>
</li> -->

<!-- PAYMENT TRANSACTION -->

<hr class="sidebar-divider">


<div class="sidebar-heading">
  Payment
</div>

<li class="nav-item">
  <a class="nav-link" href="make_transact.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Make Transaction</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="paymentRequest.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Subscription Requests</span></a>
</li>
<li class="nav-item">
  <a class="nav-link"  onclick="promptForPassword('sales_list.php')">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Sales List</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<!-- <div class="sidebar-heading">
  Data Management
</div> -->

<!-- Nav Item - Exercises -->
<!-- <li class="nav-item">
  <a class="nav-link" href="exercise.php">
    <i class="fas fa-fw fa-dumbbell"></i>
    <span>Exercise Data</span></a>
</li> -->

<!-- Nav Item - Food -->
<!-- <li class="nav-item">
  <a class="nav-link" href="food.php">
    <i class="fas fa-fw fa-utensils"></i>
    <span>Food Data</span></a>
</li> -->

<!--  DATA MANAGEMENT -->

<div class="sidebar-heading" >
  System Data Management
</div>
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dataCollapse" aria-expanded="true" aria-controls="collapsePages" >
    <i class="fas fa-fw fa-folder"></i>
    <span> Data</span>
  </a>
  <div id="dataCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar" >
    <div class="bg-white py-2 collapse-inner rounded">
      <!-- <h6 class="collapse-header">Account Setting</h6> -->
     <!-- <a class="collapse-item" href="login.php">Login</a>-->
      <!--<a class="collapse-item" href="register.php">Register</a>-->
      <a class="collapse-item" onclick="promptForPassword('exercise.php')" >Exercise Data</a>
      <a class="collapse-item" onclick="promptForPassword('equipment.php')">Equipment Data</a>
      <a class="collapse-item" onclick="promptForPassword('food.php')">Food Data</a>

      
      <div class="collapse-divider"></div>
     <!-- <h6 class="collapse-header">Other Pages:</h6>-->
      <!--<a class="collapse-item" href="404.html">404 Page</a>-->
     <!-- <a class="collapse-item" href="blank.html">Blank Page</a>-->
    </div>
  </div>
</li>




<hr class="sidebar-divider d-none d-md-block">
<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<li class="nav-item text-light mb-3">
  <a class="nav-link text-center">
    
    <span>Copyright &copy; BFAG Pacita 2024</span></a>
</li>




</ul>
<!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search/TITLE -->
          <a class="fw-bold d-flex justify-content-center mx-3">
              <!-- <div class="sidebar-brand-icon rotate-n-15" style="font-size: 24px;">
                  <i class="fas fa-dumbbell text-dark"></i>
              </div>
              <div class="text-dark mx-2" style="font-size: 24px;">TrinosGym</div> -->
          </a>

          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            

<!-- Nav Item - Alerts -->
<li class="nav-item dropdown no-arrow mx-1">
  <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bell fa-fw"></i>
    <!-- Counter - Alerts -->
    <span class="badge badge-danger badge-counter" id="notifNum">0</span>
  </a>
  <!-- Dropdown - Alerts -->
  <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
    <h6 class="dropdown-header">
      Alerts Center
    </h6>
    <div id="notificationList">
      <!-- Notifications will be appended here -->
    </div>
    <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
  </div>
</li>


            

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  
                <?php

                  if (isset($_SESSION['Firstname']) || isset($_SESSION['Lastname'])) {
                      echo $_SESSION['Firstname'] . " " . $_SESSION['Lastname'];
         
                  }
                ?>
                  
                </span>
                <img class="img-profile rounded-circle" id="user-profile" src="<?php
                    if (isset($_SESSION['Photo'])) {
                        $photo = $_SESSION['Photo'];
                        echo $photo ;
                    } else {
                        // Provide a default image source in case the photo is not set or doesn't exist
                        echo "https://source.unsplash.com/QAB-WJcbgJk/60x60";
                    }
                ?>" height="60" width="60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>

                <div class="dropdown-divider"></div> -->
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->


  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top" style="z-index:1">
    <i class="fas fa-angle-up"></i>
  </a>

  
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

          <form action="logout.php" method="POST"> 
          
            <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>

          </form>


        </div>
      </div>
    </div>
  </div>