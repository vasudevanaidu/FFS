<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FFS - Dashboard</title>
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
  <!-- ======= Header ======= -->
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
        <?php
            require'config.php';
            $mail=$_SESSION['Email'];
            $sql ="select * from details where Email='$mail'";
            $query=mysqli_query($con,$sql) or die(mysqli_error());
            while($fetch=mysqli_fetch_array($query)){
                    ?>
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="user-assests/img/.png" alt="" class="rounded-circle">
            <i class="bi bi-person"></i>
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $fetch['Username']?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $fetch['Username']?></h6>              
            </li>
            <?php
              }
            ?>
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
        <a class="nav-link " href="dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Feedback - Results</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item" ><a href="dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item active">Feedback</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-6">
          <div class="card info-card" >
            <div class="card-body">
              <h5 class="card-title">Year <span>| Semester</span></h5>
                <div class="d-flex">
                    <div class="ps-3">
                      <h6>E-3</h6>
                      <span class="small pt-1 fw-bold">Sem -1</span> 
                    </div>
                  </div>
            </div>
        </div>
      </div>

        <div class="col-lg-6">
          <div class="card info-card">
            <div class="card-body">
              <h5 class="card-title">Subject <span>| Subject code</span></h5>
                <div class="d-flex align-items-center">
                    <div class="ps-3">
                      <h6 name="subjectname" value="Operating Systems">Operating Systems</h6>
                        <span class="small pt-2 fw-bold" name="subjectcode" value="CS3183">CS3183</span>
                    </div>
                  </div>
            </div>
          </div>
        </div>

        <div class="col-lg-12">
            <div class="card">
            <div class="card-body">
              <h5 class="card-title text-center">Pie Chart</h5>
              <?php
                include "config.php"; 
                //create table tablename as select d.email,s.q1,s.q2,s.q3,s.q4,s.q5,s.q6,s.q7 from attendance d, feedback_results s where d.Email = s.Email and d.attendance>=75;
                $sqlq1= "SELECT AVG(q1) AS average1 FROM sorteddetails1";
                $sqlq2= "SELECT AVG(q2) AS average2 FROM sorteddetails1";
                $sqlq3= "SELECT AVG(q3) AS average3 FROM sorteddetails1";
                $sqlq4= "SELECT AVG(q4) AS average4 FROM sorteddetails1";
                $sqlq5= "SELECT AVG(q5) AS average5 FROM sorteddetails1";
              
                $query1=mysqli_query($con,$sqlq1);
                $query2=mysqli_query($con,$sqlq2);
                $query3=mysqli_query($con,$sqlq3);
                $query4=mysqli_query($con,$sqlq4);
                $query5=mysqli_query($con,$sqlq5);

                $row1 = mysqli_fetch_assoc($query1);
                $row2 = mysqli_fetch_assoc($query2); 
                $row3 = mysqli_fetch_assoc($query3);  
                $row4 = mysqli_fetch_assoc($query4); 
                $row5 = mysqli_fetch_assoc($query5); 
                
                $q1avg = $row1['average1'];
                $q2avg = $row2['average2'];
                $q3avg = $row3['average3'];
                $q4avg = $row4['average4'];
                $q5avg = $row5['average5'];


                ?>
              <!-- Pie Chart -->
              <div id="pieChart" style="min-height: 600px;" class="echart"></div>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#pieChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      orient: 'vertical',
                      left: 'left'
                    },
                    series: [{
                      name: 'Access From',
                      type: 'pie',
                      radius: '50%',
                      data: [{
                          value: <?php echo $q1avg?>,
                          name: 'Explanation'
                        },
                        {
                          value: <?php echo $q2avg?>,
                          name: 'Doubts-clarification'
                        },
                        {
                          value: <?php echo $q3avg?>,
                          name: 'Punctuality'
                        },
                        {
                          value: <?php echo $q4avg?>,
                          name: 'Behaviour'
                        },
                        {
                          value: <?php echo $q5avg?>,
                          name: 'communication'
                        },
                      ],
                      emphasis: {
                        itemStyle: {
                          shadowBlur: 10,
                          shadowOffsetX: 0,
                          shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                      }
                    }]
                  });
                });
              </script>
              <!-- End Pie Chart -->

            </div>
          </div>
        </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

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
  <script src="user-assests/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="user-assests/vendor/quill/quill.min.js"></script>
    <script src="user-assests/vendor/echarts/echarts.min.js"></script>
  <script src="user-assests/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="user-assests/vendor/tinymce/tinymce.min.js"></script>

  <!-- Template Main JS File -->
  <script src="user-assests/js/main.js"></script>

</body>

</html>