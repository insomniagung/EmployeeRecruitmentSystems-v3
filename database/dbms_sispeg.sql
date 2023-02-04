-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2023 at 11:41 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbms_sispeg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'hrd', 'hrd', 'hrd');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `idjob` varchar(50) NOT NULL,
  `jobname` varchar(30) NOT NULL,
  `jobqualification` text NOT NULL,
  `jobdesc` text NOT NULL,
  `jobstart` date NOT NULL,
  `jobend` date NOT NULL,
  `registerend` date NOT NULL,
  `jobadded` timestamp NOT NULL DEFAULT current_timestamp(),
  `jobloc` text NOT NULL,
  `workingtype` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`idjob`, `jobname`, `jobqualification`, `jobdesc`, `jobstart`, `jobend`, `registerend`, `jobadded`, `jobloc`, `workingtype`) VALUES
('JOB0001', 'Staff Human Resource', 'Laki-laki / Perempuan (Maksimal 28 Tahun), Pendidikan S1, Mampu berkomunikasi dengan baik', 'Mengoperasikan komputer khususnya Office, Menjadi media komunikasi internal bagi karyawan, Membantu melakukan training dan pengembangan karyawan', '2022-08-03', '2023-08-03', '2023-08-03', '2022-08-03 10:08:24', 'Jakarta', 'Mix Sistem'),
('JOB0002', 'Human Resource Development', 'Laki-laki / Perempuan (Maksimal 35 Tahun), Pendidikan S1, Memiliki Pengalaman Kerja (Minimal 2 Tahun), Mampu berkomunikasi dengan baik, Siap bekerja dengan penuh tanggung jawab', 'Menjadi leader dari Staff Human Resource, Mengoperasikan komputer khususnya Office, Menjadi media komunikasi internal bagi karyawan, Melakukan training dan pengembangan karyawan ', '2022-08-05', '2023-08-05', '2023-08-05', '2022-08-05 08:34:02', 'Bekasi', 'WFO'),
('JOB0003', 'Staff Data Scientist', 'Laki-laki / Perempuan (Maksimal 28 Tahun), Pendidikan S1, Mampu berkomunikasi dengan baik', 'Melakukan Cross-Industry Standard Process for Data Mining (CRISP-DM)', '2022-11-12', '2023-11-12', '2023-11-12', '2022-11-12 03:42:57', 'Depok', 'WFH'),
('JOB0005', 'Staff Network Engineering', 'Laki-laki / Perempuan (Maksimal 28 Tahun), Pendidikan S1, Mampu berkomunikasi dengan baik', 'Memasang, mengkonfigurasi dan mendukung peralatan jaringan termasuk akselerator WAN, server proxy, router, DHCP, DNS dan router , Menyelidiki apabila ada kesalahan dalam jaringan, Melaporkan status jaringan kepada pemangku kebijakan. ', '2022-11-12', '2022-11-12', '2022-11-12', '2022-11-12 03:48:56', 'Jakarta', 'WFO'),
('JOB0006', 'Staff IT Support', 'Laki-laki / Perempuan (Maksimal 28 Tahun), Pendidikan TKJ, Mampu berkomunikasi dengan baik', 'Memastikan perangkat komputer dapat digunakan dengan baik, Memastikan software komputer dapat digunakan, Memelihara dan memonitoring sistem jaringan komputer.', '2022-11-12', '2023-11-12', '2023-11-12', '2022-11-12 03:50:39', 'Bekasi', 'WFO'),
('JOB0007', 'Staff Cleaning Service', 'Laki-laki/Perempuan (Minimal 18 tahun), SMA Sederajat', 'Membersihkan dan merapikan ruangan di lingkungan perusahaan', '2022-11-13', '2023-11-13', '2023-11-13', '2022-11-13 14:46:53', 'Bekasi', 'WFH');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `idreg` varchar(50) NOT NULL,
  `idjob` varchar(50) NOT NULL,
  `name` varchar(55) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `pend_terakhir` varchar(50) NOT NULL,
  `url_linkedin` text NOT NULL,
  `url_cv` text NOT NULL,
  `ijazah` varchar(250) NOT NULL,
  `sertifikat` varchar(250) NOT NULL,
  `sim` varchar(250) NOT NULL,
  `status_seleksi` varchar(50) NOT NULL,
  `tgl_wcr` date NOT NULL,
  `status_wcr` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`idreg`, `idjob`, `name`, `gender`, `tgl_lahir`, `alamat`, `email`, `telp`, `pend_terakhir`, `url_linkedin`, `url_cv`, `ijazah`, `sertifikat`, `sim`, `status_seleksi`, `tgl_wcr`, `status_wcr`, `date`) VALUES
('REG0001', 'JOB0001', 'Ari Ramadhan', 'Laki-laki', '1999-08-14', 'Bekasi', 'agung6n@gmail.com', '+6285781598383', 'SMA Sederajat', 'https://bit.ly/in-agung14', 'https://bit.ly/cv-agung6n', '385319057_Agung Gunawan_Ijazah.pdf', '1644367210_Agung Gunawan_Sertif.pdf', '1009959733_Agung Gunawan_SIM.pdf', 'Pending', '2022-08-11', 'Pending', '2022-08-04 09:37:15'),
('REG0002', 'JOB0001', 'M. Syamsul Muhyidin', 'Laki-laki', '1999-08-28', 'Bekasi', 'msyamsul@gmail.com', '+6285776501232', 'S1', 'https://bit.ly/in-syam', 'https://bit.ly/cv-msyamsul', '1227825130_M. Syamsul Muhyidin_Ijazah.pdf', '1264861997_M. Syamsul Muhyidin_Sertif.pdf', '1397211231_M. Syamsul Muhyidin_SIM.pdf', 'Lolos', '2022-08-12', 'Pending', '2022-08-04 18:53:38'),
('REG0003', 'JOB0002', 'Firda Febrian', 'Perempuan', '1999-02-12', 'Bogor', 'firdafeb12@gmail.com', '+6285716867330', 'SMA Sederajat', 'https://bit.ly/in-firda', 'https://bit.ly/cv-firdafeb', '2104996941_Firda Febrian_Ijazah.pdf', '447875664_Firda Febrian_Sertif.pdf', '1939397256_Firda Febrian_SIM.pdf', 'Lolos', '2022-08-12', 'Tidak Lolos', '2022-08-05 08:42:00'),
('REG0004', 'JOB0001', 'Agung Gunawan', 'Laki-laki', '1999-08-14', 'Bekasi', 'agung6n@gmail.com', '+6285781598383', 'SMA Sederajat', 'https://bit.ly/in-agung14', 'https://bit.ly/cv-agung6n', '1174754642_Agung Gunawan_Ijazah.pdf', '1012775044_Agung Gunawan_Sertif.pdf', '1772401070_Agung Gunawan_SIM.pdf', 'Lolos', '2022-08-12', 'Lolos & Diterima', '2022-08-05 16:44:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`idjob`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`idreg`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
