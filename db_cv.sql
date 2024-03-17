-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2024 at 01:41 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cv`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_cv`
--

CREATE TABLE `tb_cv` (
  `id_cv` int(11) NOT NULL,
  `cv_nama` varchar(100) NOT NULL,
  `cv_tempat_lahir` varchar(50) NOT NULL,
  `cv_tanggal_lahir` date NOT NULL,
  `cv_jenis_kelamin` varchar(15) NOT NULL,
  `cv_tinggi_badan` varchar(32) NOT NULL,
  `cv_berat_badan` varchar(32) NOT NULL,
  `cv_alamat` varchar(100) NOT NULL,
  `cv_hp` varchar(13) NOT NULL,
  `cv_status` varchar(32) NOT NULL,
  `cv_email` varchar(32) NOT NULL,
  `cv_deskripsi_diri` text NOT NULL,
  `cv_foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_cv`
--

INSERT INTO `tb_cv` (`id_cv`, `cv_nama`, `cv_tempat_lahir`, `cv_tanggal_lahir`, `cv_jenis_kelamin`, `cv_tinggi_badan`, `cv_berat_badan`, `cv_alamat`, `cv_hp`, `cv_status`, `cv_email`, `cv_deskripsi_diri`, `cv_foto`) VALUES
(1, 'Gigik Triyana Roselia Nursanti', 'Nganjuk', '2001-04-16', 'Perempuan', '145 cm', '48 kg', 'Dusun Goklingo, Desa Setren Kec, Rejoso Kab. Nganjuk', '081234700338', 'Belum Menikah', 'gigiktriyana@gmail.com', '', ''),
(2, 'ifa', 'ngk', '2024-02-02', 'p', '170', '50', 'jgmrt', '0897', 'blm', 'kk@hh', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_organisasi`
--

CREATE TABLE `tb_organisasi` (
  `id_organisasi` int(11) NOT NULL,
  `id_cv` int(11) NOT NULL,
  `nama_organisasi` varchar(100) NOT NULL,
  `jabatan_organisasi` varchar(32) NOT NULL,
  `tahun_organisasi` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelatihan`
--

CREATE TABLE `tb_pelatihan` (
  `id_pelatihan` int(11) NOT NULL,
  `id_cv` int(11) NOT NULL,
  `nama_pelatihan` varchar(100) NOT NULL,
  `lembaga_pelatihan` varchar(50) NOT NULL,
  `tahun_pelatihan` int(4) NOT NULL,
  `dokumen_pelatihan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendidikan`
--

CREATE TABLE `tb_pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `id_cv` int(100) NOT NULL,
  `pendidikan_nama` varchar(100) NOT NULL,
  `pendidikan_jurusan` varchar(100) NOT NULL,
  `tahun_lulus` int(32) NOT NULL,
  `dokumen_pendidikan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengalaman`
--

CREATE TABLE `tb_pengalaman` (
  `id_pengalaman` int(11) NOT NULL,
  `id_cv` int(11) NOT NULL,
  `tahun_mulai_pengalaman` int(4) NOT NULL,
  `tahun_selesai_pengalaman` int(4) NOT NULL,
  `tempat_pengalaman` varchar(100) NOT NULL,
  `deskripsi_pengalaman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sertifikasi`
--

CREATE TABLE `tb_sertifikasi` (
  `id_sertifikasi` int(11) NOT NULL,
  `id_cv` int(11) NOT NULL,
  `nama_sertifikasi` varchar(100) NOT NULL,
  `lembaga_sertifikasi` varchar(50) NOT NULL,
  `tahun_sertifikasi` int(4) NOT NULL,
  `dokumen_sertifikasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_skill`
--

CREATE TABLE `tb_skill` (
  `id_skill` int(11) NOT NULL,
  `id_cv` int(11) NOT NULL,
  `nama_skill` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sosial_media`
--

CREATE TABLE `tb_sosial_media` (
  `id_sosial_media` int(11) NOT NULL,
  `id_cv` int(11) NOT NULL,
  `jenis_sosial_media` varchar(100) NOT NULL,
  `nama_sosial_media` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `user_nama` varchar(100) NOT NULL,
  `user_hp` varchar(13) NOT NULL,
  `user_email` varchar(32) NOT NULL,
  `user_level` varchar(32) NOT NULL,
  `user_password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `user_nama`, `user_hp`, `user_email`, `user_level`, `user_password`) VALUES
(1, 'gigik', '081234700338', 'gigiktriyana@gmail.com', 'admin', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'ifank', '0812345', 'triyanagigik@gmail.com', 'manager', '099ebea48ea9666a7da2177267983138');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_cv`
--
ALTER TABLE `tb_cv`
  ADD PRIMARY KEY (`id_cv`);

--
-- Indexes for table `tb_organisasi`
--
ALTER TABLE `tb_organisasi`
  ADD PRIMARY KEY (`id_organisasi`);

--
-- Indexes for table `tb_pelatihan`
--
ALTER TABLE `tb_pelatihan`
  ADD PRIMARY KEY (`id_pelatihan`);

--
-- Indexes for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `tb_pengalaman`
--
ALTER TABLE `tb_pengalaman`
  ADD PRIMARY KEY (`id_pengalaman`);

--
-- Indexes for table `tb_sertifikasi`
--
ALTER TABLE `tb_sertifikasi`
  ADD PRIMARY KEY (`id_sertifikasi`);

--
-- Indexes for table `tb_skill`
--
ALTER TABLE `tb_skill`
  ADD PRIMARY KEY (`id_skill`);

--
-- Indexes for table `tb_sosial_media`
--
ALTER TABLE `tb_sosial_media`
  ADD PRIMARY KEY (`id_sosial_media`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
