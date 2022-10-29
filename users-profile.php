  <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FFS - Profile</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="user-assests/img/.png" rel="icon">
  <link href="user-assests/img/.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="user-assests/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="user-assests/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="user-assests/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="user-assests/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="user-assests/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="user-assests/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="user-assests/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="user-assests/css/style.css" rel="stylesheet">
</head>

<body>
  <?php
  // Session start
  session_start();
  // checking whether the user logged in or not 
  if($_SESSION['Email'])
  {
    // if login is successful then the page is redirected normally.
  }
  // if the user tried to access the dashbaord page without any login
  else
  {
    // redirecting to login page .
    header("location:login.html");
  }
  ?>

  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <i class="bi bi-list toggle-sidebar-btn"></i>
      <a href="index.html" class="logo d-flex align-items-center" style="margin-left:20px ;">
        <img src="user-assests/img/" alt="">
        <span class="d-lg-block">CRS</span>
      </a>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="index.html" 
          style="margin-right:20px">
            <i class="bi bi-house-door"></i>
            <span class="d-none d-md-block ps-2">Home</span>
          </a>
        </li>
        <br>
        <li class="nav-item dropdown pe-3">
          <?php
            require'config.php';
            $mail=$_SESSION['Email'];
            $sql ="select * from attendance where Email='$mail'";
            $query=mysqli_query($con,$sql) or die(mysqli_error());
            while($fetch=mysqli_fetch_array($query)){
          ?>
          
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="user-assests/img/.png" alt="" class="rounded-circle">
            <i class="bi bi-person"></i>
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $fetch['Username']?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $fetch['Username']?></h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="faq.php">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="signout.php">
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
        <a class="nav-link collapsed" href="dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="feedback.php">
          <i class="bi bi-person"></i>
          <span>Feedback</span>
        </a>
      </li><!-- End Feedback Page Nav -->

      <li class="nav-item">
        <a class="nav-link" href="users-profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="faq.php">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle" >
      <h2 class="text-primary fw-bold">Profile</h2>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item" ><a href="dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="user-assests/img/user.jpg" alt="" class="rounded-circle">
              <!-- <i class="bi bi-person"></i> -->
              <h2><?php echo $fetch['Username']?></h2>
              <h5><?php echo $_SESSION['Email']?></h5>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

              <!--   <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li> -->
                <!-- <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li> -->

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $fetch['Username']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Year</div>
                    <div class="col-lg-9 col-md-8">E-3</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Attendance Percentage</div>
                    <div class="col-lg-9 col-md-8"><?php echo $fetch['Attendance']?>%</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['Email']?></div>
                  </div>

                </div>
               
                <!-- <div class="tab-pane fade profile-edit pt-3" id="profile-edit"> -->

                  <!-- Profile Edit Form -->
               <!--    <form action="update-details.php" method="post"> -->
                    <!-- <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">                        
                        <div class="pt-2">
                          <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div> -->

                    <!-- <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="username" type="text" class="form-control" id="fullName" value="<?php echo $fetch['Username']?>"/>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">D.O.B</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="date" type="date" class="form-control" id="idno" 
                        value="<?php echo $fetch['dob']?>"/>
                      </div>
                    </div> -->

                    <!-- <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Year</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="job" type="text" class="form-control" id="year" value="E-3">
                      </div>
                    </div> -->

                    <!-- <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone" 
                        value="<?php echo $fetch['Phone']?>"/>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" 
                        value="<?php echo $fetch['Email']?>"/>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" name="update">Update</button>
                    </div>
                  </form> -->
                  <!-- End Profile Edit Form -->
                   <?php
                        }
                    ?>
                <!-- </div> -->

                <!-- <div class="tab-pane fade pt-3" id="profile-change-password"> -->
                  <!-- Change Password Form -->
                  <!-- <form action="update-details.php" method="post">
                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword" required/>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label" 
                      name="newpassword">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword" required/>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="confirmpass" type="password" class="form-control" id="renewPassword" required/>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" name="change">Change Password</button>
                    </div>
                  </form> -->
                  <!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>FFS</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by CSE - Students
      </div>
    </div>
  </footer><!-- End Footer -->
  <!-- Vendor JS Files -->
  <script src="user-assests/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="user-assests/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="user-assests/vendor/chart.js/chart.min.js"></script>
  <script src="user-assests/vendor/echarts/echarts.min.js"></script>
  <script src="user-assests/vendor/quill/quill.min.js"></script>
  <script src="user-assests/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="user-assests/vendor/tinymce/tinymce.min.js"></script>
  <script src="user-assests/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="user-assests/js/main.js"></script>

</body>

</html>