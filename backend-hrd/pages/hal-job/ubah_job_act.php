<?php
include '../../../koneksi.php';
$id=$_POST['id'];
$jn=$_POST['jobname'];
$jq=$_POST['jobqualification'];
$jd=$_POST['jobdesc'];
$js=$_POST['jobstart'];
$je=$_POST['jobend'];
$re=$_POST['registerend'];
$jl=$_POST['jobloc'];
$wt=$_POST['workingtype'];



mysqli_query($koneksi,"UPDATE job SET jobname='$jn', jobqualification='$jq', jobdesc='$jd', jobstart='$js', jobend='$je',
										registerend='$re', jobloc='$jl', workingtype='$wt' WHERE idjob='$id'");

echo "<script>alert('Update data berhasil.');window.location='job.php'</script>";
// header('location:admin.php');

?>