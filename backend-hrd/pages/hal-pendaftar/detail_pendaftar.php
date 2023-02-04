<?php 
session_start();
$username = $_SESSION['username'];
if($username == ''){
    header('location:../../../login.php');
}

include "../../../koneksi.php";
?>

<?php
// $getpendaftar = mysqli_query($koneksi,"select * from pendaftar");
// while($reg=mysqli_fetch_array($getpendaftar)){
//fungsi button

// $email = $reg['email'];
// $telp = $reg['telp'];
// $url_cv = $reg['url_cv'];
// $url_linkedin = $reg['url_linkedin'];
// $ijazah = $reg['ijazah'];
// $sertifikat = $reg['sertifikat'];
// $sim = $reg['sim'];
// }          
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Detail Pendaftar</title>
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
     
                <?php 
                        $id = $_GET['id'];
                        $query_mysqli = mysqli_query($koneksi,"SELECT * FROM pendaftar where idreg='$id'")or die(mysqli_error());
                        while($data = mysqli_fetch_array($query_mysqli)){

                        $status_seleksi = $data['status_seleksi'];
                        $status_wcr = $data['status_wcr'];

                        $date = date_format(date_create($data['date']),"d M Y");

                        $tgl_wcr_change = date_format(date_create($data['tgl_wcr']),"d M Y");
                ?>

                  <h4 class="card-title">Detail Pendaftar</h4>
                  
                  <form class="forms-sample">
                  
                    <div class="form-group">  
                      <!-- <input type="text" class="form-control" name="id" value="<?php echo $id ?>" > -->
                      <input type="hidden" class="form-control" name="id" value="<?php echo $data['idreg'] ?>" readonly>
                      <input type="hidden" class="form-control" name="id" value="<?php echo $data['idjob'] ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control" name="" value="<?php echo $data['name']; ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <input class="form-control" name="" readonly value="<?php echo $data['gender'];?>" readonly> </input>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <input type="date" class="form-control" name="" value="<?php echo $data['tgl_lahir'];?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>Pendidikan Terakhir</label>
                      <input type="text" class="form-control" name="" value="<?php echo $data['pend_terakhir'];?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" name="" value="<?php echo $data['email'];?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>Telepon</label>
                      <input type="text" class="form-control" name="" value="<?php echo $data['telp'];?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>alamat</label>
                      <input type="text" class="form-control" name="" value="<?php echo $data['alamat'];?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>URL LinkedIn</label>
                      <input type="text" class="form-control" name="" value="<?php echo $data['url_linkedin'];?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>URL CV</label>
                      <input type="text" class="form-control" name="" value="<?php echo $data['url_cv'];?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>File Ijazah</label>
                      <input type="text" class="form-control" name="" value="<?php echo $data['ijazah'];?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>File Sertifikat</label>
                      <input type="text" class="form-control" name="" value="<?php echo $data['sertifikat'];?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>File SIM</label>
                      <input type="text" class="form-control" name="" value="<?php echo $data['sim'];?>" readonly>
                    </div>                    
                    <div class="form-group">
                      <label>Tanggal Mendaftar</label>
                      <!-- <input type="text" class="form-control" name="" value="<?php echo $data['date'];?>" readonly> -->
                      <input type="text" class="form-control" name="" value="<?=$date;?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>Status Seleksi</label>
                      <input type="text" class="form-control" name="" value="<?php echo $data['status_seleksi'];?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>Status Wawancara</label>
                      <input type="text" class="form-control" name="" value="<?php echo $data['status_wcr'];?>" readonly>
                    </div>

                    <input type="text" class="form-control" name="" value="<?=$tgl_wcr_change;?>" hidden>

                
        <!-- FUNGSI TOMBOL -->
        <!-- <a class="btn btn-success mr-2" target="_blank" href="https://wa.me/<?=$data['telp'];?>">Send Whatsapp</a> -->    
        <a class="btn btn-inverse-dark mr-2 btn-sm" href="pendaftar.php"><i class="mdi mdi-step-backward btn-icon-prepend"></i> Kembali</a> | &nbsp;
        
        <?php IF ($status_seleksi=='Lolos'){?>
        <a class="btn btn-success mr-2 btn-sm" target="_blank" href="https://api.whatsapp.com/send?phone=<?=$data['telp'];?>&text=Halo%20%2A<?=$data['name'];?>%2A%2C%20dengan%20ID%20Registrasi%20%28%20%2A<?=$data['idreg'];?>%2A%20%29.%0AKami%20dari%20PT%20Arie%20Karya%20Utama%2C%20dengan%20ini%20menyatakan%20bahwa%20anda%20%3A%0A%0A%22LOLOS%20SELEKSI%20BERKAS%22%0A%0ASilakan%20anda%20datang%20ke%20PT%20Arie%20Karya%20Utama%20untuk%20melakukan%20Tes%20Wawancara%2C%20pada%20tanggal%20%2A<?=$tgl_wcr_change;?>%2A%20%2C%20Jam%2009.00%20WIB.%0A%0AInformasi%20resmi%20ini%20juga%20dapat%20anda%20lihat%20di%20website%20kami%20pada%20halaman%20Pengumuman%2C%20atau%20dengan%20url%3A%20%0Ahttp%3A%2F%2Flocalhost%2Fcoba%2Fpengumuman.php%20%0A%0ATerima%20Kasih%2C%0A%2AHuman%20Resource%20PT%20Arie%20Karya%20Utama%2A."><i class="mdi mdi-whatsapp btn-icon-prepend"></i> Kirim Hasil Seleksi</a>
        <?php } elseif ($status_seleksi=='Tidak Lolos') { ?>
        <a class="btn btn-success mr-2 btn-sm" target="_blank" href="https://api.whatsapp.com/send?phone=<?=$data['telp'];?>&text=Halo%20%2A<?=$data['name'];?>%2A%2C%20dengan%20ID%20Registrasi%20%28%20%2A<?=$data['idreg'];?>%2A%20%29.%0A%0ATerima%20kasih%20atas%20ketertarikan%20anda%20untuk%20melamar%20di%20PT%20Arie%20Karya%20Utama.%20Kami%20telah%20membaca%20berkas%20anda%2C%20namun%20tidak%20dapat%20meneruskannya%20ke%20tahap%20selanjutnya.%20Terima%20kasih%20atas%20waktu%20anda%20karena%20telah%20mengirim%20pendaftaran%20melalui%20website%20kami.%0A%0AInformasi%20resmi%20ini%20juga%20dapat%20anda%20lihat%20di%20website%20kami%20pada%20halaman%20Pengumuman%2C%20atau%20dengan%20url%3A%0Ahttp%3A%2F%2Flocalhost%2Fcoba%2Fpengumuman.php%0A%0ASemoga%20berhasil%20di%20lain%20kesempatan%2C%0A%2AHuman%20Resource%20PT%20Arie%20Karya%20Utama%2A."><i class="mdi mdi-whatsapp btn-icon-prepend"></i> Kirim Hasil Seleksi</a>
        <?php } else { ?>
        <a class="btn btn-success mr-2 btn-sm disabled"><i class="mdi mdi-whatsapp btn-icon-prepend"></i> Kirim Hasil Seleksi</a>
        <?php } ?>

        <?php IF ($status_wcr=='Lolos & Diterima'){?>
        <a class="btn btn-success mr-2 btn-sm" target="_blank" href="https://api.whatsapp.com/send?phone=<?=$data['telp'];?>&text=Halo%20%2A<?=$data['name'];?>%2A%2C%20dengan%20ID%20Registrasi%20%28%20%2A<?=$data['idreg'];?>%2A%20%29.%0AKami%20dari%20PT%20Arie%20Karya%20Utama%2C%20dengan%20ini%20menyatakan%20bahwa%20anda%20%3A%0A%0A%22LOLOS%20TES%20WAWANCARA%20%26%20DITERIMA%22%0A%0AUntuk%20selanjutnya%2C%20anda%20akan%20dihubungi%20oleh%20Ibu%20Retno%20%28HRD%29%20dengan%20nomor%20081805368254.%20%0A%0AInformasi%20resmi%20ini%20juga%20dapat%20anda%20temukan%20di%20website%20kami%20pada%20halaman%20Pengumuman%2C%20atau%20dengan%20url%20berikut:%20%0Ahttp://localhost/coba/pengumuman.php%0A%0ATerima%20Kasih%2C%0A%2AHuman%20Resource%20PT%20Arie%20Karya%20Utama%2A."><i class="mdi mdi-whatsapp btn-icon-prepend"></i> Kirim Hasil Wawancara</a>
        <?php } elseif ($status_wcr=='Tidak Lolos') { ?>
        <a class="btn btn-success mr-2 btn-sm" target="_blank" href="https://api.whatsapp.com/send?phone=<?=$data['telp'];?>&text=Halo%20%2A<?=$data['name'];?>%2A%2C%20dengan%20ID%20Registrasi%20%28%20%2A<?=$data['idreg'];?>%2A%20%29.%0A%0ATerima%20kasih%20atas%20ketertarikan%20anda%20untuk%20melamar%20di%20PT%20Arie%20Karya%20Utama.%20Berdasarkan%20tes%20wawancara%2C%20anda%20tidak%20lolos%20dan%20kami%20tidak%20dapat%20menerima%20anda.%20Terima%20kasih%20atas%20waktu%20anda%20karena%20telah%20mengirim%20pendaftaran%20melalui%20website%20kami%20hingga%20tahap%20kini.%0A%0AInformasi%20resmi%20ini%20juga%20dapat%20anda%20lihat%20di%20website%20kami%20pada%20halaman%20Pengumuman%2C%20atau%20dengan%20url%20berikut:%20%0Ahttp://localhost/coba/pengumuman.php%0A%0ASemoga%20berhasil%20di%20lain%20kesempatan%2C%0AHuman%20Resource%20PT%20Arie%20Karya%20Utama."><i class="mdi mdi-whatsapp btn-icon-prepend"></i> Kirim Hasil Wawancara</a>
        <?php } else { ?>
        <a class="btn btn-success mr-2 btn-sm disabled"><i class="mdi mdi-whatsapp btn-icon-prepend"></i> Kirim Hasil Wawancara</a>
        <?php } ?>    

        <a class="btn btn-success mr-2 btn-sm" target="_blank" href="mailto:<?=$data['email'];?>"><i class="mdi mdi-email btn-icon-prepend"></i> Kirim Email</a>
        | &nbsp;
        <a class="btn btn-info mr-2 btn-sm" target="_blank" href="<?=$data['url_linkedin'];?>"><i class="mdi mdi-linkedin-box btn-icon-prepend"></i> Cek LinkedIn</a>
        <a class="btn btn-info mr-2 btn-sm" target="_blank" href="<?=$data['url_cv'];?>"><i class="mdi mdi-file-cloud btn-icon-prepend"></i> Cek CV</a>
                    
        <a class="btn btn-danger mr-2 btn-sm" target="_blank" href="../../../upload/<?php echo $data['ijazah'];?>"><i class="mdi mdi-download btn-icon-prepend"></i> Ijazah</a>
        
        <?php if($data['sertifikat'] >= 0){ ?>
        <a class="btn btn-danger mr-2 btn-sm" target="_blank" href="../../../upload/<?php echo $data['sertifikat'];?>"><i class="mdi mdi-download btn-icon-prepend"></i> Sertifikat</a>
        <?php } else{ ?>
        <a class="btn btn-danger mr-2 disabled"><i class="mdi mdi-download btn-icon-prepend"></i> Sertifikat</a>
        <!-- <a class="btn btn-danger mr-2 btn-sm" href="#">Download Sertifikat</a> -->
        <?php } ?>

        <a class="btn btn-danger mr-2 btn-sm" target="_blank" href="../../../upload/<?php echo $data['sim'];?>"><i class="mdi mdi-download btn-icon-prepend"></i> SIM</a>
        <?php   } ?> <!-- PENUTUP -->


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