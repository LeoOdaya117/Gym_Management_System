
 <!-- Sidebar -->

 <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - PC Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
  <div class="sidebar-brand-icon  mx-1">
    <!-- <img src="" alt=""> -->
    <img src="img/logo.png" alt="logo" width="40" height="40">
  </div>
  <div class="sidebar-brand-text" id="tabname"> Trinos Gym</div>
 
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="user-index.php?tab=Dashboard" >
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Membership
</div>

<!-- Nav Item - Pages Collapse Menu -->

<!-- <li class="nav-item">
  <a class="nav-link" href="myprofile.php">
  <i class="fa-solid fa-user"></i>
    <span>My Profile</span></a>
</li> -->
<li class="nav-item">
  <a class="nav-link"  href="membership.php?tab=Membership">
    <i class="fa-solid fa-address-card left"></i>
    <span>Membership</span></a>
</li>
<!-- <li class="nav-item">
  <a class="nav-link" href="usertransactions.php">
    <i class="fa-solid fa-address-card left"></i>
    <span>Transactions</span></a>
</li> -->

<!-- Add this block for Transaction -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#transactionNav" aria-expanded="true" aria-controls="collapsePages">
        <i class="fa-solid fa-money-bill-wave"></i>
        <span>Transaction</span>
    </a>
    <div id="transactionNav" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Transaction Menu</h6>

            <a class="collapse-item"  href="usertransactions.php?tab=Pending Transaction">Pending Transaction</a>
            <div class="collapse-divider"></div>

            <a class="collapse-item"  href="transaction-history.php?tab=Transaction History">Transaction History</a>
            <div class="collapse-divider"></div>
        </div>
    </div>
</li>

<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Tools
</div>

<!-- Nav Item - BMR Calculator -->

<li class="nav-item">
  <a class="nav-link" href="BMRCalculator.php?tab=BMR Calculator">
    <i class="fa-solid fa-calculator"></i>
    <span>BMR Calculator</span></a>
</li>

<!-- Nav Item - Diet Planner Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#showDietNav" aria-expanded="true" aria-controls="collapsePages">
  <i class="fa-solid fa-utensils"></i>
    <span>Diet Planner</span>
  </a>
  <div id="showDietNav" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Diet Plan Setting</h6>

      <a class="collapse-item" href="genererate-diet-plan.php?tab=Generate Diet Plan">Generate Diet Plan</a>
      <div class="collapse-divider"></div>

      <a class="collapse-item" href="dietplans.php?tab=Diet Plan">Diet Plan</a>
      <div class="collapse-divider"></div>

    </div>
  </div>
</li>

<!-- Nav Item - Diet Planner Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#showProgramNav" aria-expanded="true" aria-controls="collapsePages">
  <i class="fa-solid fa-dumbbell"></i>
    <span>Program Generator</span></a>
  </a>
  <div id="showProgramNav" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Program Setting</h6>

      <a class="collapse-item" href="genererate-diet-plan.php?tab=Generate Program">Generate Program</a>
      <div class="collapse-divider"></div>

      <a class="collapse-item" href="programs.php?tab=Programs">Programs</a>
      <div class="collapse-divider"></div>

    </div>
  </div>
</li>


<hr class="sidebar-divider">
<div class="sidebar-heading">
  Account Setting
</div>
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#accountCollapse" aria-expanded="true" aria-controls="accountCollapse">
    <i class="fa-solid fa-gear"></i>
    <span>Account Settings</span>
  </a>
  <div id="accountCollapse" class="collapse" aria-labelledby="headingAccount" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Account Setting</h6>
      <a class="collapse-item" href="change-password.php?tab=Change Password">Change Password</a>
      <div class="collapse-divider"></div>
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

<!-- <li class="nav-item text-light mb-3">
  <a class="nav-link text-center">
    
    <span>Copyright &copy; TrinosGym 2023</span></a>
</li> -->




</ul>
<!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar PHONE TOPBAR -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"> 

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-1">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search/TITLE -->
          <a class="fw-bold d-flex justify-content-center "> <!-- mx-3 -->
              <!-- <div class="sidebar-brand-icon rotate-n-15" style="font-size: 24px;">
                  <i class="fas fa-dumbbell text-dark"></i>
              </div> -->
              <div class="text-dark mx-2" style="font-size: 24px;" id="tabname"><?php echo $_SESSION['currentTab'];?></div>
          </a>
          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

               <!-- Nav Item - Alerts -->
               <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
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
     
                <a class="dropdown-item" href="myprofile.php?tab=My Profile">
                  <i class="fa-solid fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  My Profile
                </a>
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
    <div class="modal-dialog modal-dialog-centered" role="document">
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