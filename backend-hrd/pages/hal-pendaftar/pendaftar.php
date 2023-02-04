<?php 
session_start();
$username = $_SESSION['username'];
if($username == ''){
    header('location:../../../login.php');
}

include "../../../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Data Pendaftar</title>
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
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
  
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

  <!-- cek apakah sudah login -->
 
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="../../index.php"><img src="../../images/logo aku-nobg-tex.png" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="../../index.php"><img src="../../images/logo aku-nobg-notext.png" alt="logo"/></a>
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
                <li class="nav-item"><a class="nav-link" href="pendaftar.php">Kelola Pendaftar</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="../hal-user/admin.php">
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
          <div class="row-cols">
            
            <div class="col-xl-13 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <h4 class="card-title nav-item" id="teksDouble">DATA PENDAFTAR</h4>
                   

        <form action="pendaftar.php" method="GET">
        <ul class="navbar-nav">
            <li class="nav-item nav-search">
            <div class="input-group">
              <div class="input-group-prepend " id="navbar-search-icon">
               &nbsp;&nbsp;&nbsp;&nbsp;
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Cari Nama Pendaftar atau Minat Posisi" name="pencarian">
              <?php 
                if(isset($_GET['pencarian'])){
                $cari = $_GET['pencarian'];
                }
              ?>
            </div>
            </li>
        </ul>
        </form>
                  
                  <div  class="table-responsive">
                    <br>

                    <!-- <a style="margin-right:5px;" 
                    class="btn btn-inverse-primary btn-rounded btn-fw float-right" href="cetak_pendaftar_periode.php" target="_blank">
                    <i class="ti-calendar btn-icon-prepend">
                    </i>Pilih Tanggal</a> -->

                    <a style="margin-left:12px;" 
                    class="btn btn-inverse-primary btn-rounded btn-fw float-left" href="cetak_pendaftar.php" target="_blank">
                    <i class="ti-printer btn-icon-prepend">
                    </i>Cetak Laporan</a>
 
                    <br><br><br><br>
                    
                    <table class="table table-hover">    
                      
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Minat Posisi</th>
                        <th>Tgl Apply</th>
                        <th>Hasil Seleksi</th>
                        <th>Tgl Wawancara</th>
                        <th>Hasil Wawancara</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Opsi</th>
                    </tr>
                    </thead>


                      <?php
                      //semua row dari kedua table (table pendaftar dan table job) dikombinasikan/dapat ditampilkan
                      // $queryAdmin = "SELECT * FROM pendaftar INNER JOIN job ON pendaftar.idjob = job.idjob";
                      // if(isset($_GET['pencarian'])){
                      //     $cari = $_GET['pencarian'];
                      //     //mengambil semua row dari table asal dan table tujuan dengan kondisi nilai key yang terkait saja
                      //     $cariData = mysqli_query($koneksi,"SELECT * FROM pendaftar INNER JOIN job ON pendaftar.idjob = job.idjob
                      //       WHERE name LIKE '%".$cari."%'");  
                      // }
                      // else{
                      //     $cariData = mysqli_query($koneksi, $queryAdmin);  
                      // }

                      //INNER JOIN 2 TABEL: PENDAFTAR & JOB | FOREIGN & PRIMARY KEY: idjob
                      $queryAdmin = "SELECT * FROM pendaftar INNER JOIN job ON pendaftar.idjob = job.idjob";
                      if(isset($_GET['pencarian'])){
                          $cari = $_GET['pencarian'];
                          //mengambil semua row dari table pendaftar 
                          $cariData = mysqli_query($koneksi,"SELECT * FROM pendaftar INNER JOIN job ON pendaftar.idjob = job.idjob
                            WHERE name LIKE '%".$cari."%' OR jobname LIKE '%".$cari."%' ORDER BY idreg ");  
                      }
                      else{
                          $cariData = mysqli_query($koneksi, $queryAdmin);  
                      }
                      //INNER JOIN END

                      $no = "";
                      while($data = mysqli_fetch_array($cariData)){
                      $no++;

                      //datapendaftar
                        $idreg = $data['idreg'];
                        $idjob = $data['idjob'];
                        $name = $data['name'];

                        $jobname = $data['jobname'];
                        
                        $gender = $data['gender'];
                        $tgl_lahir = date_format(date_create($data['tgl_lahir']),"d M Y");
                        $alamat = $data['alamat'];
                        $pend_terakhir = $data['pend_terakhir'];
                        $email = $data['email'];
                        $telp = $data['telp'];
                        $linkedin = $data['url_linkedin'];
                        $cv = $data['url_cv'];
                        $date = date_format(date_create($data['date']),"d M Y");

                        //status
                        $tgl_wcr_change = date_format(date_create($data['tgl_wcr']),"d M Y");

                        $status_seleksi = $data['status_seleksi'];
                        $tgl_wcr = $data['tgl_wcr'];
                        $status_wcr = $data['status_wcr'];
                      ?>

                      <tbody>
                        <tr>
                          <!-- <td><?php echo $no; ?></td> -->
                          <td><?php echo $idreg; ?></td>
                          <td><?php echo $name;?></td>
                          <td><label class="badge badge-info"><?php echo $jobname;?></label></td>
                          <td><?php echo $date; ?></td>
                          
                          <?php if($status_seleksi == 'Pending'){ ?>
                          <td align="center"><label class="badge badge-warning"><?=$status_seleksi;?></label></td>
                          <?php } elseif($status_seleksi == 'Lolos'){ ?>
                          <td align="center"><label class="badge badge-success"><?=$status_seleksi;?></label></td>
                          <?php } else{ ?> <!-- Tidak Lolos -->
                          <td align="center"><label class="badge badge-danger"><?=$status_seleksi;?></label></td>
                          <?php } ?>
                          
                          <td align="center"><?=$tgl_wcr_change;?></td>
                          
                          <?php if($status_wcr == 'Pending'){ ?>
                          <td align="center"><label class="badge badge-warning"><?=$status_wcr;?></label></td>
                          <?php } elseif($status_wcr == 'Lolos & Diterima'){ ?>
                          <td align="center"><label class="badge badge-success"><?=$status_wcr;?></label></td>
                          <?php } else{ ?> <!-- Tidak Lolos -->
                          <td align="center"><label class="badge badge-danger"><?=$status_wcr;?></label></td>
                          <?php } ?>
                          
                          <td>
                            <a href="detail_pendaftar.php?id=<?php echo $idreg; ?>" type="button" class="btn btn-rounded btn-sm btn-info ">
                              <i class="mdi mdi-information-variant btn-icon-prepend"></i>Detail 
                            </a> &nbsp;
                            <a href="ubah_status.php?id=<?php echo $idreg; ?>" type="button" class="btn btn-rounded btn-sm btn-warning ">
                              <i class="mdi mdi-border-color btn-icon-prepend"></i>Update 
                            </a> &nbsp;
                            <a href="hapus_pendaftar.php?id=<?php echo $idreg; ?>" type="button" class="btn btn-rounded btn-sm btn-danger" 
                              onclick="return confirm('Delete data ini?')">
                              <i class="mdi mdi-delete-forever btn-icon-prepend"></i>Delete
                            </a>
                          </td>
                        </tr>
                      </tbody>
                      <?php 
                            } 
                      ?>

                    </table>
                  </div>
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