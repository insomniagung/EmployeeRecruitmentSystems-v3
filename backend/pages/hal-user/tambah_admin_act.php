<?php
include '../../../koneksi.php';
$id=$_POST['id'];
$username=$_POST['username'];
$password=$_POST['password'];
$role=$_POST['role'];

mysqli_query($koneksi,"INSERT INTO admin VALUES('$id','$username','$password','$role')");
echo "<script>alert('Create data berhasil.');window.location='admin.php'</script>";
?>