<?php
$koneksi = mysqli_connect("localhost","root","","dbms_sispeg");
 
// Check connection
if (mysqli_connect_errno()){
	echo "koneksi database gagal : " . mysqli_connect_error();
}
 
?>