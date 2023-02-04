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

// mysqli_query($koneksi,"INSERT INTO job VALUES('$id','$jn','$jd','$js','$je','$re','$jl','$wt')");

mysqli_query($koneksi,"INSERT INTO job (idjob,jobname,jobqualification,jobdesc,jobstart,jobend,registerend,jobloc,workingtype) VALUES ('$id','$jn','$jq','$jd','$js','$je','$re','$jl','$wt')");

echo "<script>alert('Create data berhasil.');window.location='job.php'</script>";
?>