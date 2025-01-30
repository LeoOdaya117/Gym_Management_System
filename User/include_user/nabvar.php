

<!-- <script src="assets/js/user-index.js"></script> -->

<div class="d-flex align-items-center justify-content-between">
     <!-- <a href="index.html" class="logo d-flex align-items-center"> 
        <img src="assets/img/trinos_logo.jpg" alt="LOGO">
        <span class="d-none d-lg-block">TrinosGym</span>
      </a>-->
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <!-- <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div>End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <!-- <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li>End Search Icon -->


        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <?php 
          $picture = $_SESSION['Photo'];
            if(isset($picture)) {
                
                echo '<img src="' . $picture . '" class="rounded-circle" id="user-picture" alt="Picture">';
            } else {
              $picture = 'img/user.png';
              echo '<img src="img/user.png" class="rounded-circle" id="user-picture" alt="Picture">';
                
            } 
          ?>

          
            <span class="d-none d-md-block dropdown-toggle ps-2" id="navbar-username"> <?php echo $_SESSION['Firstname'] . " " . $_SESSION['Lastname'];?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6 id="sidebar-username"></h6>
              <span id="navbar-position"></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="user_profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
          </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      

      <li class="nav-item">
        <a class="nav-link collapsed" href="membership.php">
        <i class="fa-solid fa-address-card left"></i>
          <span>Subscription</span>
        </a>
      </li><!-- End Subscription Page Nav -->



      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
        <i class="fa-solid fa-money-bill-wave"></i><span>Transactions</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="pending-transaction.php">
              <i class="bi bi-circle"></i><span>Pending</span>
            </a>
          </li>
          <li>
            <a href="user-transaction-history.php">
              <i class="bi bi-circle"></i><span>History</span>
            </a>
          </li>
        
        </ul>
      </li><!-- End Icons Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#Workout-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Workout Planner</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="Workout-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
            <a href="genererate-workout-plan.php">
              <i class="bi bi-circle"></i><span>Workout Plan Generator</span>
            </a>
          </li>
          <li>
            <a href="workoutplans.php">
              <i class="bi bi-circle"></i><span>Workout Plans</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#Diet-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Diet Planner</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="Diet-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
            <a href="genererate-diet-plan.php">
              <i class="bi bi-circle"></i><span>Diet Plan Generator</span>
            </a>
          </li>
          <li>
            <a href="dietplans.php">
              <i class="bi bi-circle"></i><span>Diet Plans</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->


      <li class="nav-heading">Tools</li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="bmr-calculator.php">
        <i class="fa-solid fa-calculator"></i>
          <span>BMR Calculator</span>
        </a>
      </li><!-- End Error 404 Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="bmi-calculator.php">
        <i class="fa-solid fa-calculator"></i>
          <span>BMI Calculator</span>
        </a>
      </li><!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->


  

  



