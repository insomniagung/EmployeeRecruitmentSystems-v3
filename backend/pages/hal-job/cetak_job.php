<?php 
  include '../../../koneksi.php';

  $date_now = date("Y-m-d");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Laporan Job  (<?php echo $date_now?>)</title>
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="../../images/logo aku-nobg-notext.png" />

<style>
      html, body {
        width:  fit-content;
        height: fit-content;
        margin-left: 100px;
        margin-right: 100px;
      }
</style>

</head>
<body>
  
  <left>
    <br><br><br>
    <h2>LAPORAN JOB</h2>
    <h4>PT Arie Karya Utama</h4>
    <hr width="10%" align="left">
    <br>
  </left>

  <table align="center" class="table table-dark table-bordered">
    <thead>
    <tr>
      <!-- <th>NO.</th> -->
      <th>ID JOB</th>
      <th>NAMA JOB</th>
      <th>JOBDESC</th>
      <th>PERIODE</th>
      <!-- <th>PERIODE MULAI</th> -->
      <!-- <th>PERIODE AKHIR</th> -->
      <th>DEADLINE</th>
      <th>PENEMPATAN</th>
      <th>SISTEM</th>
      <th>JOB DIBUAT</th>
    </tr>
  </thead>

    <?php
    $query = mysqli_query($koneksi,"SELECT * FROM job");
    // $no = 1;
    while($data = mysqli_fetch_array($query)){
    $jobstart = date_format(date_create($data['jobstart']),"d M Y");
    $jobend = date_format(date_create($data['jobend']),"d M Y");
    $periode = $jobstart." - ".$jobend;
    $registerend = date_format(date_create($data['registerend']),"d M Y");
    

    ?>
  <tbody>
    <tr>
      <!-- <td><?php echo $no++;?></td> --> 
      <td><?php echo $data['idjob']; ?></td>
      <td><?php echo $data['jobname'];?></td>
      <td><?php echo $data['jobdesc'];?></td>
      <!-- <td><?php echo $jobstart;?></td>
      <td><?php echo $jobend;?></td> -->
      <td><?php echo $periode?></td>
      <td><?php echo $registerend;?></td>
      <td><?php echo $data['jobloc'];?></td>
      <td><?php echo $data['workingtype'];?></td>
      <td><?php echo $data['jobadded'];?></td>
    </tr>
  </tbody>
    <?php 
    } 
    ?>
  </table>
<!-- </div>
 -->
 
  <!-- CETAK -->
  <script>
    window.print();
  </script>

</body>
</html>