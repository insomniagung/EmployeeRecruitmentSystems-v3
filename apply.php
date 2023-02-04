<?php
session_start();
include 'koneksi.php';
date_default_timezone_set("Asia/Bangkok");
// $date_now = date("Y-m-d", strtotime("-19 years"));
$date_now = date("Y-m-d");
$date_wawancara = date('Y-m-d', strtotime('+7 days', strtotime($date_now))); //operasi penjumlahan tanggal sebanyak 7 hari

$getid = $_GET['id'];
$getdata = mysqli_query($koneksi,"SELECT * FROM job WHERE idjob='$getid'");
$data = mysqli_fetch_array($getdata);
                    
                    $idjob = $data['idjob'];
                    $namajob = $data['jobname'];
                    $qualificationjob = $data['jobqualification'];
                    $descjob = $data['jobdesc'];
                    $mulai = date_format(date_create($data['jobstart']),"d M Y");
                    $selesai = date_format(date_create($data['jobend']),"d M Y");
                    $periode = $mulai." - ".$selesai;
                    $deadline = date_format(date_create($data['registerend']),"d M Y");
                    $jobloc = $data['jobloc'];
                    $workingtype = $data['workingtype'];

                    if(isset($_POST['apply'])){
                        $idreg = $_POST['idreg'];
                        $name = $_POST['name'];
                        $gender = $_POST['gender'];
                        $tgl_lahir = $_POST['tgl_lahir'];
                        $alamat = $_POST['alamat'];                        
                        $email = $_POST['email'];
                        $telpon = $_POST['telpon'];
                        $pend_terakhir = $_POST['pend_terakhir'];
                        $linkedin = $_POST['linkedin'];
                        $cv = $_POST['cv'];

                        //Status
                        $status_seleksi = $_POST['status_seleksi'];
                        $tgl_wcr = $_POST['tgl_wcr'];
                        $status_wcr = $_POST['status_wcr'];


                        //Upload Ijazah
                        $rand = rand();
                        $ekstensi = array('pdf');
                        $filename = $_FILES['ijazah']['name'];
                        $ukuran = $_FILES['ijazah']['size'];
                        $ext = pathinfo($filename, PATHINFO_EXTENSION);

                        //Upload Sertifikat
                        $rand1 = rand();
                        $ekstensi1 = array('pdf');
                        $filename1 = $_FILES['sertifikat']['name'];
                        $ukuran1 = $_FILES['sertifikat']['size'];
                        $ext1 = pathinfo($filename1, PATHINFO_EXTENSION);

                        //Upload SIM
                        $rand2 = rand();
                        $ekstensi2 = array('pdf');
                        $filename2 = $_FILES['sim']['name'];
                        $ukuran2 = $_FILES['sim']['size'];
                        $ext2 = pathinfo($filename2, PATHINFO_EXTENSION);

                        if(!in_array($ext,$ekstensi)){
                            // header("location:apply.job?alert=gagal_ekstensi");
                            header("location:index.php?gagal_upload_ijazah");
                        }
                        elseif(!in_array($ext1,$ekstensi1)){ //JIKA Sertifikat tidak diinput
                            // header("location:apply.job?alert=gagal_ekstensi");
                                $xx = $rand.'_'.$name.'_'.$filename;
                                move_uploaded_file($_FILES['ijazah']['tmp_name'],'upload/'.$rand.'_'.$name.'_'.$filename);

                                $xx2 = $rand2.'_'.$name.'_'.$filename2;
                                move_uploaded_file($_FILES['sim']['tmp_name'],'upload/'.$rand2.'_'.$name.'_'.$filename2);
                            
                            $insertdata = mysqli_query($koneksi,"INSERT INTO pendaftar (idreg,idjob,name,gender,tgl_lahir,alamat,email,telp,pend_terakhir,url_linkedin,url_cv,ijazah,sim,status_seleksi,tgl_wcr,status_wcr)
                                values('$idreg','$idjob','$name','$gender','$tgl_lahir','$alamat','$email','$telpon','$pend_terakhir','$linkedin','$cv','$xx','$xx2','$status_seleksi','$tgl_wcr','$status_wcr')");

                            header('location:backend-hrd/pages/info/thanks.php');
                        }
                        elseif(!in_array($ext2,$ekstensi2)){
                            // header("location:apply.job?alert=gagal_ekstensi");
                            header("location:index.php?gagal_upload_sim");
                        } 
                        else{
                            if($ukuran < 2048 * 1000){ //2MB
                                $xx = $rand.'_'.$name.'_'.$filename;
                                move_uploaded_file($_FILES['ijazah']['tmp_name'],'upload/'.$rand.'_'.$name.'_'.$filename);

                                $xx1 = $rand1.'_'.$name.'_'.$filename1; 
                                move_uploaded_file($_FILES['sertifikat']['tmp_name'],'upload/'.$rand1.'_'.$name.'_'.$filename1);

                                $xx2 = $rand2.'_'.$name.'_'.$filename2;
                                move_uploaded_file($_FILES['sim']['tmp_name'],'upload/'.$rand2.'_'.$name.'_'.$filename2);

                                $insertdata = mysqli_query($koneksi,"INSERT INTO pendaftar (idreg,idjob,name,gender,tgl_lahir,alamat,email,telp,pend_terakhir,url_linkedin,url_cv,ijazah,sertifikat,sim,status_seleksi,tgl_wcr,status_wcr)
                                values('$idreg','$idjob','$name','$gender','$tgl_lahir','$alamat','$email','$telpon','$pend_terakhir','$linkedin','$cv','$xx','$xx1','$xx2','$status_seleksi','$tgl_wcr','$status_wcr')");
                                
                                if($insertdata){
                                    header('location:backend-hrd/pages/info/thanks.php');
                                } 
                                else {
                                    echo 'Gagal Untuk Dikirim
                                    <meta http-equiv="refresh" content="3;url=apply.php?id="$getid"" />';
                                    
                                     }                                
                            }
                        }
                    
// $insertdata = mysqli_query($koneksi,"INSERT INTO pendaftar (idreg,idjob,name,gender,tgl_lahir,alamat,email,telp,pend_terakhir,url_linkedin,url_cv)
//                         values('$idreg','$idjob','$name','$gender','$tgl_lahir','$alamat','$email','$telpon','$pend_terakhir','$linkedin','$cv')");
//                         if($insertdata){
//                             header('location:backend/pages/info/thanks.php');
//                         } else {
//                             echo 'Gagal Untuk Dikirim
//                             <meta http-equiv="refresh" content="3;url=apply.php?id="$getid"" />';
//                         }
                    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Website PT AKU | Karir</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link rel="shortcut icon" href="img/new/logo aku-nobg-notext.png" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        
        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="index.php"><img src="img/new/logo aku-nobg-notext.png"/>&nbsp;&nbsp;</a>
                <a href="" class="navbar-brand p-0">
                    <h1 class="m-0"> PT ARIE KARYA UTAMA</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="benefit.php" class="nav-item nav-link">Benefit</a>
                        <a href="karir.php" class="nav-item nav-link active">Karir</a>
                        <a href="pengumuman.php" class="nav-item nav-link">Pengumuman</a>
                    </div>
                    <a href="login.php" target="_blank" class="btn btn-secondary text-light rounded-pill py-2 px-4 ms-3">Administrator</a>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-primary hero-header mb-5">
                <div class="container my-5 py-5 px-lg-5">
                    <div class="row g-5 py-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="text-white mb-4 animated zoomIn">Mari bergabung bersama kami dalam mewujudkan lingkungan yang bersih dan sehat.</h1>
                            <p class="text-white pb-3 animated zoomIn">PT Arie Karya Utama atau PT AKU merupakan perusahaan jasa kebersihan yang bergerak dalam bidang jasa pengangkutan dan pengelolaan sampah limbah yang telah beroperasi sejak tahun 2006. PT AKU secara resmi menjadi bagian dari Dinas Lingkungan Hidup (DLH) Provinsi DKI Jakarta sebagai mitra pengangkut, khususnya di dalam pengangkutan dan pengelolaan sampah kawasan komersial.</p>
                        </div>
                        <div class="col-lg-6 text-center text-lg-start">
                            <!-- <img class="img-fluid" src="img/hero.png" alt=""> -->
                            <img class="img-fluid" src="img/new/team_work.svg" width="440px" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Full Screen Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content" style="background: rgba(29, 29, 39, 0.7);">
                    <div class="modal-header border-0">
                        <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center justify-content-center">
                        <div class="input-group" style="max-width: 600px;">
                            <input type="text" class="form-control bg-transparent border-light p-3" placeholder="Type search keyword">
                            <button class="btn btn-light px-4"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Full Screen Search End -->

        <!-- Informasi Karir Start -->
        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="position-relative d-inline text-primary ps-4">Karir Yang Anda Pilih</h6>
                    <h2 class="mt-3"><?=$namajob;?></h2>
                    <h5 class="mb-3">Periode Pendaftaran: <?=$periode;?></h5>
                </div>
                <br><br>
                <div class="row g-4">
                    <!-- <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                        <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                            <div class="service-icon flex-shrink-0">
                                <i class="fa fa-clock fa-2x"></i>
                            </div>
                            <h5 class="mb-3">Jangka Waktu Pendaftaran</h5>
                            <p><?=$periode;?></p> 
                        </div>
                    </div> -->
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                        <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                            <div class="service-icon flex-shrink-0">
                                <i class="fa fa-newspaper fa-2x"></i>
                            </div>
                            <h5 class="mb-3">Kualifikasi</h5>
                            <p class="mb-5"><?=$qualificationjob;?></p>
                            
                            <!-- <a class="btn px-3 mt-auto mx-auto" href="">Read More</a> -->
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                        <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                            <div class="service-icon flex-shrink-0">
                                <i class="fa fa-user fa-2x"></i>
                            </div>
                            <h5 class="mb-3">Job Deskripsi</h5>
                            <p class="mb-5"><?=$descjob;?></p>
                            
                            <!-- <a class="btn px-3 mt-auto mx-auto" href="">Read More</a> -->
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                        <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                            <div class="service-icon flex-shrink-0">
                                <i class="fa fa-info fa-2x"></i>
                            </div>
                            <h5 class="mb-3">Keterangan</h5>
                            <p class="mb-1"><?=$workingtype;?></p>
                            <p class="mb-0">Penempatan Area <?=$jobloc;?></p>
                            <!-- <a class="btn px-3 mt-auto mx-auto" href="">Read More</a> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Informasi Karir End -->


        <!-- Form Pendaftaran Start -->
        <div class="container-xxl py-5 bg-white rounded">
            <div class="container px-lg-5">
                <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h2 class="mt-2">Form Pendaftaran</h2>
                </div>
            <form method="post" enctype="multipart/form-data">
                <div style="margin-left: 20%">
                    <table style="width: 75%" class="text-dark" border="0" cellpadding="5">
                    <?php 
                        $query1 =  mysqli_query($koneksi, "SELECT max(idreg) as idterbesar1 FROM pendaftar");
                        $data1 = mysqli_fetch_array($query1);
                        
                        // $idBertambah1 = $data1['idterbesar1'];
                        // $urutan1 = $idBertambah1;
                        // $urutan1++;
                        // $idOtomatis1=$urutan1;
                        // $id1 = $idOtomatis1;

                        //<--- OTOMATIS IDREG | START --->
                        $kodeJob1 = $data1['idterbesar1'];
                        $urutan1 = (int) substr($kodeJob1, 4, 4);
                        $urutan1++;

                        $huruf1 = "REG";
                        $kodeJob1 = $huruf1 . sprintf("%04s", $urutan1);
                        $id1 = $kodeJob1;
                        //<--- OTOMATIS IDJOB | END --->                  
                    ?>

                    <tr>
                        <td>Kode Registrasi</td>
                        <td><input type="text" value="<?=$id1;?>" class="form-control rounded-pill ps-5 pe-5 text-dark" disabled></td>
                    </tr>
                    <tr>
                        <td colspan="2"><i style="color: red;">*Kode Registrasi harap diingat, karena akan digunakan sebagai penanda informasi selanjutnya.</i><br><br></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td><input type="" name="name" class="form-control rounded-pill ps-5 pe-5 text-dark" required></td>
                    
                    <input type="hidden" name="idreg" value="<?php echo $id1;?>">
                    </tr>
                    
                    <tr>    
                        <td>Tanggal Lahir</td>
                        <td><input type="date" class="form-control rounded-pill ps-5 pe-5 text-dark" name="tgl_lahir" 
                            max="2003-12-28" min="1986-12-28" required></td> <!-- minimal umur: 18 tahun (2004), maksimal umur: 35 tahun (1987) -->

<!--                         <td><input type="date" class="form-control" name="tgl_lahir" min="1970-01-02" max="<?=$date_now;?>" required></td> -->
                    </tr>   
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>
                            <select name="gender" class="form-control rounded-pill ps-5 pe-5 text-dark" 
                            style="background-color: white;" required>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </td>
                    </tr>
                    <tr colspan="2">
                        <td>Pendidikan Terakhir &nbsp;&nbsp;&nbsp;</td>
                        <td>
                            <select name="pend_terakhir" class="form-control rounded-pill ps-5 pe-5 text-dark" 
                            style="background-color: white;" required>
                                <option value="SMA Sederajat">SMA Sederajat</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><textarea name="alamat" rows="2" class="form-control rounded-pill ps-5 pe-5 text-dark" required></textarea></td>                                        
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="email" class="form-control rounded-pill ps-5 pe-5 text-dark" required></td>
                    </tr>
                    <tr>
                        <td>No. Telepon / WhatsApp</td>
                        <td><input type="text" name="telpon" value="+62" class="form-control rounded-pill ps-5 pe-5 text-dark" required></td>
                    </tr>
                    <tr>
                        <td>URL LinkedIn</td>
                        <td><input type="url" name="linkedin" class="form-control rounded-pill ps-5 pe-5 text-dark" value="https://" placeholder="mis: http://linkedin.com/in/username"></td>
                    </tr>
                    <tr>
                        <td>URL Curriculum Vitae</td>
                        <td><input type="url" name="cv" class="form-control rounded-pill ps-5 pe-5 text-dark" value="https://" 
                            placeholder="mis: https://drive.google.com/file" required></td>
                    </tr>
                    <tr>
                        <td>Upload file Ijazah <i style="color: red;">(.pdf)</i></td>
                        <td><input type="file" name="ijazah" class="form-control rounded-pill ps-5 pe-5 text-dark" 
                            required></td>
                    </tr>
                    <tr>
                        <td>Upload Sertifikat Keterampilan <i style="color: red;">(.pdf)</i></td>
                        <td><input type="file" name="sertifikat" class="form-control rounded-pill ps-5 pe-5 text-dark" 
                            ></td>
                    </tr>
                    <tr>
                        <td>Upload SIM<i style="color: red;">(.pdf)</i></td>
                        <td><input type="file" name="sim" class="form-control rounded-pill ps-5 pe-5 text-dark" required></td>
                    </tr>

                    <!-- Status -->
                    <tr>
                    <td><input type="text" name="status_seleksi" value="Pending" hidden></td>
                    </tr>
                    <tr>
                    <td><input type="date" name="tgl_wcr" value="<?=$date_wawancara;?>" hidden></td>
                    </tr>
                    <tr>
                    <td><input type="text" name="status_wcr" value="Pending" hidden></td>
                    </tr>

                                                                                                         
                </table>
                </div>
                <div class="mt-3" style="text-align: center;">
                <br>
    <!-- <button type="submit" name="apply" class="btn btn-primary btn-lg font-weight-medium auth-form-btn rounded-pill">Submit</button> -->
    <button type="submit" name="apply" class="btn btn-primary btn-lg font-weight-medium auth-form-btn rounded-pill" onclick="return confirm('Data sudah benar?')">Submit</button>
    <!-- <button type="reset" name="reset" class="btn btn-primary btn-lg font-weight-medium auth-form-btn rounded-pill">Reset</button> -->

    <a href="karir.php" class="btn btn-light btn-lg font-weight-medium auth-form-btn rounded-pill" style="background-color: #B8B8B8;">Kembali</a>
                </div>
            </form>
            </div>
        </div>
        <!-- Form Pendaftaran End -->

        <!-- Footer Start -->
        <div class="container-fluid bg-primary text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Get In Touch</h5>
                        <p><i class="fa fa-map-marker-alt me-3"></i>Kantor Pusat</p>
                        <p>
                        Jl. Proklamasi Blok D 24-25, RT 001/023, Kel. Abadijaya,
                        Kec. Sukmajaya Kota Depok, Jawa Barat. 16417</p>
                        <!-- <p><i class="fa fa-phone-alt me-3"></i>(021)77831787 atau 77832358</p>
                        <p><i class="fa fa-envelope me-3"></i>ariekarya@gmail.com</p> -->
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="col-md-8 col-lg-3">
                        <h5 class="text-white mb-4">Get In Touch</h5>
                        <p><i class="fa fa-map-marker-alt me-3"></i>www.ariekaryautama.com</p>
                        <p><i class="fa fa-phone-alt me-3"></i>(021)77831787 atau 77832358</p>
                        <p><i class="fa fa-envelope me-3"></i>ariekarya@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="container px-lg-5">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; Sistem Penerimaan Pegawai. 
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="#">Apply</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>