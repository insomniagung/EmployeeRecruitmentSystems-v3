<?php
include '../../../koneksi.php';
$id=$_POST['id'];
$username=$_POST['username'];
$password=$_POST['password'];


mysqli_query($koneksi,"UPDATE admin SET username='$username', password='$password' WHERE id='$id'");
echo "<script>alert('Update data berhasil.');window.location='admin.php'</script>";
// header('location:admin.php');

?>