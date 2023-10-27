-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2023 at 06:40 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studio`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2018-03-28 23:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `kode_booking` varchar(8) NOT NULL,
  `id_studio` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `waktu` varchar(10) NOT NULL,
  `durasi` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tgl_booking` date NOT NULL,
  `bukti_bayar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`kode_booking`, `id_studio`, `tgl`, `waktu`, `durasi`, `status`, `email`, `tgl_booking`, `bukti_bayar`) VALUES
('TRX00001', 16, '2023-07-18', '14.00', 2, 'Menunggu Pembayaran', 'samsul@gmail.com', '2023-07-17', '');

-- --------------------------------------------------------

--
-- Table structure for table `cek_booking`
--

CREATE TABLE `cek_booking` (
  `kode_booking` varchar(8) NOT NULL,
  `id_studio` int(11) NOT NULL,
  `tgl_booking` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cek_booking`
--

INSERT INTO `cek_booking` (`kode_booking`, `id_studio`, `tgl_booking`, `status`) VALUES
('TRX00001', 16, '2023-07-18', 'Menunggu Pembayaran'),
('TRX00001', 16, '2023-07-18', 'Menunggu Pembayaran');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id_cu` int(11) NOT NULL,
  `nama_visit` varchar(100) DEFAULT NULL,
  `email_visit` varchar(120) DEFAULT NULL,
  `telp_visit` char(16) DEFAULT NULL,
  `pesan` longtext,
  `tgl_posting` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id_cu`, `nama_visit`, `email_visit`, `telp_visit`, `pesan`, `tgl_posting`, `status`) VALUES
(3, 'asd', 'asd@asd.asd', '123', 'asd', '2023-07-13 13:24:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contactusinfo`
--

CREATE TABLE `contactusinfo` (
  `id_info` int(11) NOT NULL,
  `alamat_kami` tinytext,
  `email_kami` varchar(255) DEFAULT NULL,
  `telp_kami` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactusinfo`
--

INSERT INTO `contactusinfo` (`id_info`, `alamat_kami`, `email_kami`, `telp_kami`) VALUES
(1, 'Gg. Amal Bhakti No. 8, Binjai Estate, Kec. Binjai Sel., Kota Binjai, Sumatera Utara 20736', 'emailstudio@gmail.com', '08536385997');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `CreationDate`, `UpdationDate`) VALUES
(16, 'Studio', '2023-07-17 06:33:12', NULL),
(17, 'Gitar', '2023-07-17 06:33:44', NULL),
(18, 'Piano', '2023-07-17 06:33:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studio`
--

CREATE TABLE `studio` (
  `id_studio` int(11) NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `deskripsi` longtext,
  `harga` int(11) DEFAULT NULL,
  `image1` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studio`
--

INSERT INTO `studio` (`id_studio`, `nama`, `id_kategori`, `deskripsi`, `harga`, `image1`, `RegDate`, `UpdationDate`) VALUES
(15, 'Ibanez GRG121DX', 17, 'RG adalah gitar yang paling dikenal dan khas di lini Ibanez. Logam selama tiga dekade telah menempa mesin berperforma tinggi ini, mengasahnya untuk kecepatan dan kekuatan. Apakah Anda menyukai jembatan hardtail (tetap) atau sistem tremolo penguncian terkemuka di industri kami, RG adalah instrumen presisi. Gitar tidak harus mahal untuk terdengar bagus. Seri GIO dikembangkan untuk pemain yang menginginkan kualitas Ibanez dalam paket yang lebih terjangkau.\r\n\r\nMereka tidak hanya terlihat dan bermain lebih baik daripada yang lainnya dalam kisaran harga mereka, tetapi inspeksi, pengaturan, dan garansi mereka yang ketat sama dengan model Ibanez yang lebih mahal.', 100000, 'ibanes.jpg', '2023-07-17 08:17:28', '2023-07-17 11:47:37'),
(16, 'Studio Large', 16, 'Studio dengan kelengkapan alat musik yang maksimal untuk membuat rekaman', 500000, 'studio.jpg', '2023-07-17 11:48:29', NULL),
(17, 'Yamaha Digital Piano DGX 670', 18, 'DGX-670 adalah piano digital untuk menikmati beragam aktivitas, mulai dari bermain piano langsung hingga dimainkan bersama alat musik lain. Di samping kualitas piano yang tinggi, Automatic Accompaniment Styles canggih menyediakan musik latar dalam berbagai aliran musik termasuk pop, R&B, dan jazz. Tampilkan partitur musik untuk membantu latihan, hubungkan ke smartphone, mikrofon, dan peralatan lainnya, dan temukan banyak cara lain untuk menikmati musik dengan alat musik yang dilengkapi beragam fitur ini.', 200000, 'piano.jpg', '2023-07-17 11:48:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `type`, `detail`) VALUES
(5, 'Rekening', 'rekening', '																																												123456789 Bank ABCD a/n Pemilik Studio											'),
(3, 'Tentang Kami', 'aboutus', '																																	<div class=\"x9f619 xjbqb8w x78zum5 x168nmei x13lgxp2 x5pf9jr xo71vjh x1uhb9sk x1plvlek xryxfnj x1c4vz4f x2lah0s x1q0g3np xqjyukv x1qjc9v5 x1oa3qoh x1nhvcw1\"><span class=\"x1lliihq x1plvlek xryxfnj x1n2onr6 x193iq5w xeuugli x1fj9vlw x13faqbe x1vvkbs x1s928wv xhkezso x1gmr53x x1cpjm7i x1fgarty x1943h6x x1i0vuye xvs91rp x1s688f x5n08af x10wh9bi x1wdrske x8viiok x18hxmgj\" dir=\"auto\" style=\"line-height: var(--base-line-clamp-line-height); --base-line-clamp-line-height: 18px;\"><font size=\"4\">NADA MUSIC STUDIO ðŸ‡²ðŸ‡¨</font></span></div><div class=\"x9f619 xjbqb8w x78zum5 x168nmei x13lgxp2 x5pf9jr xo71vjh x1n2onr6 x1plvlek xryxfnj x1c4vz4f x2lah0s xdt5ytf xqjyukv x1qjc9v5 x1oa3qoh x1nhvcw1\"><div class=\"_aacl _aaco _aacu _aacy _aad6 _aade\" dir=\"auto\"><br></div><div class=\"_aacl _aaco _aacu _aacy _aad6 _aade\" dir=\"auto\">Produk/Layanan</div></div><h1 class=\"_aacl _aaco _aacu _aacx _aad6 _aade\" dir=\"auto\"><font size=\"3\">ðŸ”Š SOUNDSYSTEM</font>  <br><font size=\"3\">ðŸŽ¸ BAND/ACAUSTIC</font><br><font size=\"3\">ðŸŽ¹ ORGAN TUNGGAL</font>  <br><font size=\"3\">ðŸ¥ STUDIO BAND</font></h1>																						');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(120) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `telp` char(15) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `ktp` varchar(120) NOT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `email`, `password`, `telp`, `alamat`, `ktp`, `RegDate`, `UpdationDate`) VALUES
(7, 'Samsul', 'samsul@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '081212121313', 'Medan', '07092022132814id.png', '2022-09-07 11:28:14', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`kode_booking`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id_cu`);

--
-- Indexes for table `contactusinfo`
--
ALTER TABLE `contactusinfo`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `studio`
--
ALTER TABLE `studio`
  ADD PRIMARY KEY (`id_studio`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id_cu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contactusinfo`
--
ALTER TABLE `contactusinfo`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `studio`
--
ALTER TABLE `studio`
  MODIFY `id_studio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
