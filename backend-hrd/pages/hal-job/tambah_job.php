<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
$username = $_SESSION['username'];
if($username == ''){
    header('location:../../../login.php');
}

include "../../../koneksi.php";
?>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Create New | Job</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css"> <!-- INI WAJIB BUAT BISA MAKE ICON -->
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/logo aku-nobg-notext.png" />
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


#teksDouble{
/*text-align: center;*/
margin-left:1rem;
}

</style>
</head>

<body>

<button onclick="topFunction()" id="myBtn" title="Go to top">Back To Top</button>
<script>
// fungsi ketika user men scroll ke bawah 20 px maka tombol back to top akan muncul
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

</head>

<body>
<div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="../../index.php"><img src="../../images/logo aku-nobg-tex.png" class="mr-2" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          
        </ul>

        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a href="../../../logout.php" class="dropdown-item" onclick="return confirm('Yakin ingin logout?')">
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
            <a class="nav-link" href="../../index.php">
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
                <li class="nav-item"><a class="nav-link" href="../hal-job/job.php">Kelola Job</a></li>
                <li class="nav-item"><a class="nav-link" href="../hal-pendaftar/pendaftar.php">Kelola Pendaftar</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="admin.php">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">User Account</span>
            </a>
          </li>
          
        </ul>
      </nav>
    <!-- PANEL MENU KIRI [END] -->

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
                       
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <?php 
                  $query =  mysqli_query($koneksi, "SELECT max(idjob) as idterbesar FROM job");
                  $data = mysqli_fetch_array($query);

                  // $idBertambah = $data['idterbesar'];
                  // $urutan = $idBertambah;
                  // $urutan++;
                  // $idOtomatis=$urutan;
                  // $id = $idOtomatis; 

                  //<--- OTOMATIS IDJOB | START --->
                  $kodeJob = $data['idterbesar'];
                  $urutan = (int) substr($kodeJob, 4, 4);
                  $urutan++;

                  $huruf = "JOB";
                  $kodeJob = $huruf . sprintf("%04s", $urutan);
                  $id = $kodeJob;
                  //<--- OTOMATIS IDJOB | END --->

                ?>
                  <h4 class="card-title">Create New</h4>
                  <form class="forms-sample" method="POST" action="tambah_job_act.php">
                    <div class="form-group">
                      <label">ID</label>
                      <input type="text" class="form-control" name="id" value="<?php echo $id ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>Job Name</label>
                      <input type="text" class="form-control" name="jobname" placeholder="Nama Pekerjaan">
                    </div>
                    <div class="form-group">
                      <label>Job Qualification</label>
                      <textarea name="jobqualification" rows="10" class="form-control" placeholder="Kualifikasi Pekerjaan"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Job Desc</label>
                      <textarea name="jobdesc" rows="10" class="form-control" placeholder="Deskripsi Pekerjaan"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Job Start</label>
                      <input type="date" class="form-control" name="jobstart">
                    </div>
                    <div class="form-group">
                      <label>Job End</label>
                      <input type="date" class="form-control" name="jobend">
                    </div>
                    <div class="form-group">
                      <label>Register End</label>
                      <input type="date" class="form-control" name="registerend">
                    </div>
                    
                    <!-- <div class="form-group">
                      <label>Job Location</label>
                      <input type="text" class="form-control" name="jobloc" placeholder="Lokasi Pekerjaan">
                    </div> -->
                    <div class="form-group">
                      <label>Job Location</label><br>
                      <label>&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="jobloc" value="Bekasi" checked>&nbsp;&nbsp;&nbsp;Bekasi
                      </label>
                      <label>&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="jobloc" value="Jakarta">&nbsp;&nbsp;&nbsp;Jakarta
                      </label>
                      <label>&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="jobloc" value="Depok">&nbsp;&nbsp;&nbsp;Depok
                      </label>
                    </div>

                    <div class="form-group">
                      <label>Working Type</label>
                      <select name="workingtype" class="form-control">
                                    <option value="WFH">WFH (Bekerja dari rumah)</option>
                                    <option value="WFO">WFO (Bekerja di pabrik)</option>
                                    <option value="Mix Sistem">Mix (WFH & WFO / Bergantian)</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a class="btn btn-light" href="job.php">Cancel</a>
                  </form>
                </div>
              </div>
            </div>
                      
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022. Sistem Penerimaan Pegawai Berbasis Web.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Administrator PT AKU <i class="ti-flag text-danger ml-1"></i></span>
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
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
