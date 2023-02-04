<?php 

session_start();
$username = $_SESSION['username'];
if($username == ''){
    header('location:../login.php');
}

include "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css"> <!-- INI WAJIB BUAT BISA MAKE ICON -->
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
<!--   <link rel="shortcut icon" href="images/logo-mini.svg" /> -->
  <link rel="shortcut icon" href="images/logo aku-nobg-notext.png" />
<style type="text/css"> 
/* Tambahan*/
  #myBtn {
    display: none;
    position: fixed;
    bottom: 40px;
    left: 60px;
    z-index: 99;
    border: none;
    outline: none;
    background-color: #004FB2;
    color: white;
    cursor: pointer;
    padding: 15px;
    border-radius: 10px;
  }

  #myBtn:hover {
    background-color: #2c3e50;
  }

</style>
</head>

<body>

<button onclick="topFunction()" id="myBtn" title="Go to top">Back To Top</button>
<script>
// fungsi ketika user men scroll ke bawah 40 px maka tombol back to top akan muncul
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}
// fungsi ketika user meng klik tombol back to top maka halaman akan menscroll ke atas
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>

  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.php"><img src="images/logo aku-nobg-tex.png" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="../../index.php"><img src="images/logo aku-nobg-notext.png" alt="logo"/></a>
        <!-- <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/logo-mini.svg" alt="logo"/></a> -->
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <!-- <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li> -->
        </ul>
        
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a href="../logout.php" class="dropdown-item" onclick="return confirm('Yakin ingin logout?')">
                <i class="ti-power-off text-primary"></i>Logout
            </a>
          </li>
        </ul>

        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>

    <!-- PANEL MENU KIRI [START] -->
    <div class="container-fluid page-body-wrapper">
      <!--  partial:partials/_sidebar.html  --> 
      <nav class="sidebar sidebar-offcanvas" id="sidebar" >
        <ul class="nav">
    
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Data Menu</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="pages/hal-job/job.php">Kelola Job</a></li>
                <li class="nav-item"><a class="nav-link" href="pages/hal-pendaftar/pendaftar.php">Kelola Pendaftar</a></li>
              </ul>
            </div>
          </li>

          <!-- <li class="nav-item">
            <a class="nav-link" href="pages/info-statistik/statistik.php">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Statistik</span>
            </a>
          </li> -->

          <li class="nav-item">
            <a class="nav-link" href="pages/hal-user/admin.php">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">User Account</span>
            </a>
          </li>
          
        </ul>
      </nav>
    <!-- PANEL MENU KIRI [END] -->

    <!-- PANEL UTAMA [START] -->
      <div class="main-panel">
        <div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Selamat Datang, <?php echo $_SESSION['username']; ?>.</h3>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="images/dashboard/intervw.svg" alt="people" height="290">

                <div class="weather-info">
                    <div class="d-flex">
                      <div>
                        <h2 class="mb-0 font-weight-normal"><i class="icon-flag mr-2"></i></h2>
                      </div>
                      
                      <div class="ml-2">
                        <h4 class="location font-weight-normal">PT. AKU</h4>
                        <h6 class="font-weight-normal">Arie Karya Utama</h6>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="col-md-5 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                  	<?php
                      $datajob = mysqli_query($koneksi, "SELECT * FROM job");
                      $jumlahjob = mysqli_num_rows($datajob);
                     ?>
                    <div class="card-body">
                      <a href="pages/hal-job/job.php" style="color: #fff;text-decoration: none">
                        <p class="mb-4">DATA JOB</p>
                        <p class="fs-30 mb-2"><?php echo $jumlahjob; ?></p>
                      <p>Posisi Pekerjaan Tersedia</p>
                      </a>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-light-danger">
                  	<?php
                      $datapendaftar = mysqli_query($koneksi, "SELECT * FROM pendaftar");
                      $jumlahpendaftar = mysqli_num_rows($datapendaftar);
                    ?>
                    <div class="card-body">
                      <a href="pages/hal-pendaftar/pendaftar.php" style="color: #fff;text-decoration: none">
                      <p class="mb-4">DATA PENDAFTAR</p>
                      <p class="fs-30 mb-2"><?php echo $jumlahpendaftar; ?></p>
                      <p>Pendaftar</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-dark-blue">  
                      <?php
                      $datauser = mysqli_query($koneksi, "SELECT * FROM admin");
                      $jumlahuser = mysqli_num_rows($datauser);
                      ?>                    
                    <div class="card-body">
                      <a href="pages/hal-user/admin.php" style="color: #fff;text-decoration: none">
                      <p class="mb-4">DATA USER</p>
                      <p class="fs-30 mb-2"><?php echo $jumlahuser; ?></p>
                      <p>Admin</p>
                      </a>
                    </div>
                  </div>
                </div>
                
                <!-- <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Number of Clients</p>
                      <p class="fs-30 mb-2">47033</p>
                      <p>0.22% (30 days)</p>
                    </div>
                  </div>
                </div> -->

              </div>
            </div>
          </div>
        </div>

        <!-- content-wrapper ends -->

        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022. Sistem Penerimaan Pegawai Berbasis Web.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Administrator PT AKU. <i class="ti-flag text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>