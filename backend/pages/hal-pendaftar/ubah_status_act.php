<?php
include '../../../koneksi.php';
$id=$_POST['id'];
$status_seleksi=$_POST['status_seleksi'];
$tgl_wcr=$_POST['tgl_wcr'];
$status_wcr=$_POST['status_wcr'];



mysqli_query($koneksi,"UPDATE pendaftar SET status_seleksi='$status_seleksi', tgl_wcr='$tgl_wcr', status_wcr='$status_wcr' WHERE idreg='$id'");

echo "<script>alert('Update data berhasil.');window.location='pendaftar.php'</script>";
// header('location:admin.php');

?>