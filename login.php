<?php 
session_start();
include 'koneksi.php';

if(isset($_POST['login'])){
$username=$_POST['username'];
$password=$_POST['password'];
$query=mysqli_query($koneksi,"SELECT * FROM admin WHERE username='$username' and password='$password'")or die(mysqli_error());
$cocok=mysqli_num_rows($query);
$r=mysqli_fetch_array($query);
 
if ($cocok > 0){
  if ($r['role']=="admin") {
    $_SESSION['username']=$username;
    $_SESSION['role']= $r['role'];
    echo "<script type='text/javascript'>alert('Berhasil login sebagai Admin.');window.location.href='backend/index.php';</script>";
  } 
  else if ($r['role']=="hrd"){ 
    $id = $r['id'];
    $queryp = mysqli_query($koneksi, "SELECT * FROM admin WHERE id = '$id'");
    $q = mysqli_fetch_assoc($queryp);
    
    $_SESSION['username'] = $username;
    $_SESSION['id'] = $id;
    $_SESSION['role'] = $r['role'];
    echo "<script type='text/javascript'>alert('Berhasil login sebagai HRD.');window.location.href='backend-hrd/index.php';</script>";
  }
}
else{
  $error=true;
  echo "<script type='text/javascript'>alert('Username atau password salah.');</script>";
} 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login Administrator</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="backend/vendors/feather/feather.css">
  <link rel="stylesheet" href="backend/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="backend/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="backend/css/vertical-layout-light/style.css">

<!--   cek pesan notifikasi-->  

<?php 
  if(isset($_GET['pesan'])){
    if($_GET['pesan'] == "gagal"){
      echo "<script>alert('Login gagal, mohon cek username dan password.');history.go(-1);</script>";
    }
    else if($_GET['pesan'] == "belum_login"){
      echo "<script>alert('Anda harus login untuk dapat mengakses halaman administrator.')</script>";
    }
    // else if($_GET['pesan'] == "logout"){
    //   echo "<script>alert('Berhasil logout.')</script>";
    // }
  }
?>

<!--((LOGO PAGE))   <link rel="shortcut icon" href="admin/images/favicon.png" /> -->
<link rel="shortcut icon" href="backend/images/logo aku-nobg-notext.png" />
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="backend/images/logo aku-nobg-tex.png" alt="logo">
              </div>
              <h4>Silakan login sebelum memulai.</h4>
              <h6 class="font-weight-light">Masukkan username dan password.</h6>
              <form class="pt-3" method="POST">
<!--                 <form class="pt-3" method="post" action="backend/cek_login.php"> -->
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="username" placeholder="username" name="username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" placeholder="password" name="password">
                </div>
                <div class="mt-3">
                  <input name="login" id="login" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" value="Login">
                </div>
                <div class='mt-4'>
                <h6 class="font-weight-light">Copyright © 2022. PT AKU.</h6>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="backend/vendors/js/vendor.bundle.base.js"></script>
  <script src="backend/js/off-canvas.js"></script>
  <script src="backend/js/hoverable-collapse.js"></script>
  <script src="backend/js/template.js"></script>
  <script src="backend/js/settings.js"></script>
  <script src="backend/js/todolist.js"></script>
</body>
</html>
