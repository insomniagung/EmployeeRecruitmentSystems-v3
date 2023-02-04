<?php
include '../../../koneksi.php';
$id=$_GET['id'];

$cek=mysqli_query($koneksi,"DELETE FROM pendaftar WHERE idreg='$id'")or die(mysqli_error()); 
echo "<script>alert('Delete data berhasil.');window.location='pendaftar.php'</script>";	

// if($cek>0){
// 	echo "<script>alert('Delete data berhasil.');window.location='job.php'</script>";	
// }else{
// 	echo "<script>alert('Delete data gagal.');window.location='job.php'</script>";
// }

?>