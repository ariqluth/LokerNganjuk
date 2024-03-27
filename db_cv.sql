-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 21, 2024 at 01:36 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

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
  `id` int UNSIGNED NOT NULL,
  `cv_nama` varchar(100) NOT NULL,
  `cv_tempat_lahir` varchar(50) NOT NULL,
  `cv_tanggal_lahir` date NOT NULL,
  `cv_jenis_kelamin` enum('laki-laki','perempuan') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cv_tinggi_badan` varchar(32) NOT NULL,
  `cv_berat_badan` varchar(32) NOT NULL,
  `cv_alamat` varchar(100) NOT NULL,
  `cv_hp` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cv_status` varchar(32) NOT NULL,
  `cv_email` varchar(32) NOT NULL,
  `cv_deskripsi_diri` text NOT NULL,
  `cv_foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_organisasi`
--

CREATE TABLE `tb_organisasi` (
  `id` int UNSIGNED NOT NULL,
  `id_cv` int UNSIGNED NOT NULL,
  `nama_organisasi` varchar(100) NOT NULL,
  `jabatan_organisasi` varchar(32) NOT NULL,
  `tahun_organisasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelatihan`
--

CREATE TABLE `tb_pelatihan` (
  `id` int UNSIGNED NOT NULL,
  `id_cv` int UNSIGNED NOT NULL,
  `nama_pelatihan` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lembaga_pelatihan` varchar(50) NOT NULL,
  `tahun_pelatihan` date NOT NULL,
  `dokumen_pelatihan` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendidikan`
--

CREATE TABLE `tb_pendidikan` (
  `id` int UNSIGNED NOT NULL,
  `id_cv` int UNSIGNED NOT NULL,
  `nama_pendidikan` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jurusan_pendidikan` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tahun_lulus` date NOT NULL,
  `dokumen_pendidikan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengalaman`
--

CREATE TABLE `tb_pengalaman` (
  `id` int UNSIGNED NOT NULL,
  `id_cv` int UNSIGNED NOT NULL,
  `tahun_mulai_pengalaman` date NOT NULL,
  `tahun_selesai_pengalaman` date NOT NULL,
  `tempat_pengalaman` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `deskripsi_pengalaman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sertifikasi`
--

CREATE TABLE `tb_sertifikasi` (
  `id` int UNSIGNED NOT NULL,
  `id_cv` int UNSIGNED NOT NULL,
  `nama_sertifikasi` varchar(100) NOT NULL,
  `lembaga_sertifikasi` varchar(50) NOT NULL,
  `tahun_sertifikasi` date NOT NULL,
  `dokumen_sertifikasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_skill`
--

CREATE TABLE `tb_skill` (
  `id` int UNSIGNED NOT NULL,
  `id_cv` int UNSIGNED NOT NULL,
  `nama_skill` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sosial_media`
--

CREATE TABLE `tb_sosial_media` (
  `id` int UNSIGNED NOT NULL,
  `id_cv` int UNSIGNED NOT NULL,
  `jenis_sosial_media` enum('Facebook','Instagram','Twitter','tidak punya') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'tidak punya',
  `nama_sosial_media` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int NOT NULL,
  `user_nama` varchar(100) NOT NULL,
  `user_hp` varchar(13) NOT NULL,
  `user_email` varchar(32) NOT NULL,
  `user_level` varchar(32) NOT NULL,
  `user_password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `user_nama`, `user_hp`, `user_email`, `user_level`, `user_password`) VALUES
(1, 'gigik', '081234700338', 'gigiktriyana@gmail.com', 'admin', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'ifank', '0812345', 'triyanagigik@gmail.com', 'manager', '099ebea48ea9666a7da2177267983138'),
(3, 'Ghani', '081232123123', 'ghanio@gmail.com', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99'),
(4, 'Raka', '0823123424', 'rakao@gmail.com', 'manager', '5f4dcc3b5aa765d61d8327deb882cf99');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_cv`
--
ALTER TABLE `tb_cv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_organisasi`
--
ALTER TABLE `tb_organisasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organisasi_id_cv_foreign` (`id_cv`);

--
-- Indexes for table `tb_pelatihan`
--
ALTER TABLE `tb_pelatihan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelatihan_id_cv_foreign` (`id_cv`);

--
-- Indexes for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendidikan_id_cv_foreign` (`id_cv`);

--
-- Indexes for table `tb_pengalaman`
--
ALTER TABLE `tb_pengalaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengalaman_id_cv_foreign` (`id_cv`);

--
-- Indexes for table `tb_sertifikasi`
--
ALTER TABLE `tb_sertifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sertifikasi_id_cv_foreign` (`id_cv`);

--
-- Indexes for table `tb_skill`
--
ALTER TABLE `tb_skill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skill_id_cv_foreign` (`id_cv`);

--
-- Indexes for table `tb_sosial_media`
--
ALTER TABLE `tb_sosial_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sosial_meida_id_cv_foreign` (`id_cv`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_cv`
--
ALTER TABLE `tb_cv`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_organisasi`
--
ALTER TABLE `tb_organisasi`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pelatihan`
--
ALTER TABLE `tb_pelatihan`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_pengalaman`
--
ALTER TABLE `tb_pengalaman`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_sertifikasi`
--
ALTER TABLE `tb_sertifikasi`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_skill`
--
ALTER TABLE `tb_skill`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_sosial_media`
--
ALTER TABLE `tb_sosial_media`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_organisasi`
--
ALTER TABLE `tb_organisasi`
  ADD CONSTRAINT `organisasi_id_cv_foreign` FOREIGN KEY (`id_cv`) REFERENCES `tb_cv` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tb_pelatihan`
--
ALTER TABLE `tb_pelatihan`
  ADD CONSTRAINT `pelatihan_id_cv_foreign` FOREIGN KEY (`id_cv`) REFERENCES `tb_cv` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  ADD CONSTRAINT `pendidikan_id_cv_foreign` FOREIGN KEY (`id_cv`) REFERENCES `tb_cv` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tb_pengalaman`
--
ALTER TABLE `tb_pengalaman`
  ADD CONSTRAINT `pengalaman_id_cv_foreign` FOREIGN KEY (`id_cv`) REFERENCES `tb_cv` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tb_sertifikasi`
--
ALTER TABLE `tb_sertifikasi`
  ADD CONSTRAINT `sertifikasi_id_cv_foreign` FOREIGN KEY (`id_cv`) REFERENCES `tb_cv` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tb_skill`
--
ALTER TABLE `tb_skill`
  ADD CONSTRAINT `skill_id_cv_foreign` FOREIGN KEY (`id_cv`) REFERENCES `tb_cv` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tb_sosial_media`
--
ALTER TABLE `tb_sosial_media`
  ADD CONSTRAINT `sosial_meida_id_cv_foreign` FOREIGN KEY (`id_cv`) REFERENCES `tb_cv` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
