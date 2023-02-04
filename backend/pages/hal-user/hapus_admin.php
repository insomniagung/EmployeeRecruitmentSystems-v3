<?php
include '../../../koneksi.php';
$id =$_GET['id'];

mysqli_query($koneksi,"DELETE FROM admin WHERE id='$id'")or die(mysqli_error()); 
echo "<script>alert('Delete data berhasil.');window.location='admin.php'</script>";
?>