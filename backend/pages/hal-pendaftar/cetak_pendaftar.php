<?php 
  include '../../../koneksi.php';

  $date_now = date("Y-m-d");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Laporan Pendaftar (<?php echo $date_now?>)</title>
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
    <h2>LAPORAN PENDAFTAR</h2>
    <h4>PT Arie Karya Utama</h4>
    <hr width="10%" align="left">

    <br>
    <h6>Info Pribadi Pendaftar</h6>
  </left>

  <table align="center" class="table table-dark table-bordered">
    <thead>
    <tr>
      <!-- <th>NO.</th> -->
      <th>ID REG</th>
      <th>NAMA</th>
      <th>MINAT JOB</th>
      <th>GENDER</th>
      <th>LAHIR</th>
      <th>ALAMAT</th>
      <!-- <th>EMAIL</th>
      <th>TELP</th> -->
      <th>PENDIDIKAN</th>
      <!-- <th>LINKEDIN</th>
      <th>CV</th> -->
      <th>TGL DAFTAR</th>
    </tr>
  </thead>

    <?php
    $query = mysqli_query($koneksi,"SELECT * FROM pendaftar INNER JOIN job ON pendaftar.idjob = job.idjob");
    // $no = 1;
    while($data = mysqli_fetch_array($query)){
    $tgl_lahir = date_format(date_create($data['tgl_lahir']),"d M Y");
    ?>
  <tbody>
    <tr>
      <td><?php echo $data['idreg']; ?></td>
      <td><?php echo $data['name'];?></td>
      <td><?php echo $data['jobname']; ?></td>
      <td><?php echo $data['gender'];?></td>
      <td><?php echo $tgl_lahir ?></td>
      <td><?php echo $data['alamat'];?></td>
      <!-- <td><?php echo $data['email'];?></td>
      <td><?php echo $data['telp'];?></td> -->
      <td><?php echo $data['pend_terakhir'];?></td>
      <!-- <td><?php echo $data['url_linkedin'];?></td>
      <td><?php echo $data['url_cv'];?></td> -->
      <td><?php echo $data['date'];?></td>
    </tr>
  </tbody>
    <?php 
    } 
    ?>
  </table>

<br><br>

<left>
<h6>Info Kontak Pendaftar</h6>
</left>
  <!-- TABEL 2 -->
  <table align="center" class="table table-dark table-bordered">
    <thead>
    <tr>
      <!-- <th>NO.</th> -->
      <th>ID REG</th>
      <!-- <th>MINAT JOB</th> -->
      <th>NAMA</th>
      <!-- <th>GENDER</th>
      <th>LAHIR</th>
      <th>ALAMAT</th> -->
      <th>EMAIL</th>
      <th>TELP</th>
      <!-- <th>PENDIDIKAN</th> -->
      <th>LINKEDIN</th>
      <th>CV</th>
      <!-- <th>TGL DAFTAR</th> -->
    </tr>
  </thead>

    <?php
    $query = mysqli_query($koneksi,"SELECT * FROM pendaftar INNER JOIN job ON pendaftar.idjob = job.idjob");
    // $no = 1;
    while($data = mysqli_fetch_array($query)){
    $tgl_lahir = date_format(date_create($data['tgl_lahir']),"d M Y");
    ?>
  <tbody>
    <tr>
      <td><?php echo $data['idreg']; ?></td>
      <!-- <td><?php echo $data['jobname']; ?></td> -->
      <td><?php echo $data['name'];?></td>
      <!-- <td><?php echo $data['gender'];?></td>
      <td><?php echo $tgl_lahir ?></td>
      <td><?php echo $data['alamat'];?></td> -->
      <td><?php echo $data['email'];?></td>
      <td><?php echo $data['telp'];?></td>
      <!-- <td><?php echo $data['pend_terakhir'];?></td> -->
      <td><?php echo $data['url_linkedin'];?></td>
      <td><?php echo $data['url_cv'];?></td>
      <!-- <td><?php echo $data['date'];?></td> -->
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