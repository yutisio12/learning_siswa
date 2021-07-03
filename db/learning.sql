-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2021 at 01:06 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `nip_guru` varchar(255) NOT NULL,
  `alamat_guru` text NOT NULL,
  `telpon_guru` varchar(255) NOT NULL,
  `id_kelas` varchar(255) DEFAULT NULL,
  `id_mapel` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nama_guru`, `nip_guru`, `alamat_guru`, `telpon_guru`, `id_kelas`, `id_mapel`, `status`) VALUES
(17, 'Sinta Pertiwi Manurung', '96010617', 'Batuaji', '082389453271', '14', '13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(255) DEFAULT NULL,
  `wali_kelas` varchar(255) DEFAULT NULL,
  `lokasi_kelas` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `wali_kelas`, `lokasi_kelas`, `status`) VALUES
(14, '1', '', 'Sebelah Kiri Kantin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` int(11) NOT NULL,
  `nama_mapel` varchar(255) DEFAULT NULL,
  `kelas_mapel` varchar(255) DEFAULT NULL,
  `pengajar_mapel` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_hapus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `nama_mapel`, `kelas_mapel`, `pengajar_mapel`, `status`, `status_hapus`) VALUES
(13, 'Bahasa Indonesia', '14', '17', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengumpulan`
--

CREATE TABLE `pengumpulan` (
  `id` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `id_tugas_soal` int(11) NOT NULL,
  `jawaban` text NOT NULL,
  `file` text DEFAULT NULL,
  `created_by` varchar(250) NOT NULL,
  `created_date` datetime NOT NULL,
  `status_jawaban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumpulan`
--

INSERT INTO `pengumpulan` (`id`, `id_tugas`, `id_tugas_soal`, `jawaban`, `file`, `created_by`, `created_date`, `status_jawaban`) VALUES
(36, 19, 22, 'b', 'Jawaban020210703111215.jpg', '25', '2021-07-03 11:12:15', 0),
(37, 19, 23, 'b', 'Jawaban120210703111215.jpg', '25', '2021-07-03 11:12:15', 0),
(38, 19, 24, 'b', 'Jawaban220210703111215.jpg', '25', '2021-07-03 11:12:15', 0),
(39, 19, 25, 'c', 'Jawaban320210703111215.jpg', '25', '2021-07-03 11:12:15', 0),
(40, 19, 26, 'b', 'Jawaban420210703111215.jpg', '25', '2021-07-03 11:12:15', 0),
(41, 19, 27, 'c', 'Jawaban520210703111215.jpg', '25', '2021-07-03 11:12:15', 0),
(42, 19, 28, 'a', 'Jawaban620210703111215.jpg', '25', '2021-07-03 11:12:15', 0),
(43, 19, 29, 'a', 'Jawaban720210703111215.jpg', '25', '2021-07-03 11:12:15', 0),
(44, 19, 30, 'a', 'Jawaban820210703111215.jpg', '25', '2021-07-03 11:12:15', 0),
(45, 19, 31, 'a', 'Jawaban920210703111215.jpg', '25', '2021-07-03 11:12:15', 0),
(46, 19, 22, 'b', 'Jawaban020210703111332.jpg', '25', '2021-07-03 11:13:32', 0),
(47, 19, 23, 'b', 'Jawaban120210703111332.jpg', '25', '2021-07-03 11:13:32', 0),
(48, 19, 24, 'b', 'Jawaban220210703111332.jpg', '25', '2021-07-03 11:13:32', 0),
(49, 19, 25, 'c', 'Jawaban320210703111332.jpg', '25', '2021-07-03 11:13:32', 0),
(50, 19, 26, 'b', 'Jawaban420210703111332.jpg', '25', '2021-07-03 11:13:32', 0),
(51, 19, 27, 'c', 'Jawaban520210703111332.jpg', '25', '2021-07-03 11:13:32', 0),
(52, 19, 28, 'a', 'Jawaban620210703111332.jpg', '25', '2021-07-03 11:13:32', 0),
(53, 19, 29, 'a', 'Jawaban720210703111332.jpg', '25', '2021-07-03 11:13:32', 0),
(54, 19, 30, 'a', 'Jawaban820210703111332.jpg', '25', '2021-07-03 11:13:32', 0),
(55, 19, 31, 'a', 'Jawaban920210703111332.jpg', '25', '2021-07-03 11:13:32', 0),
(64, 21, 43, 'a', NULL, '25', '2021-07-03 13:00:53', 0),
(65, 21, 44, 'b', NULL, '25', '2021-07-03 13:00:53', 0),
(66, 21, 45, 'd', NULL, '25', '2021-07-03 13:00:53', 0),
(67, 21, 46, 'a', NULL, '25', '2021-07-03 13:00:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `semester` int(11) DEFAULT NULL,
  `nilai` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id`, `id_siswa`, `id_kelas`, `id_mapel`, `id_tugas`, `semester`, `nilai`, `created_by`, `created_date`) VALUES
(37, 25, 14, 13, 21, 1, '50', '99999', '2021-07-03 13:00:53');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama_siswa` varchar(250) NOT NULL,
  `nip_siswa` varchar(20) NOT NULL,
  `alamat_siswa` text NOT NULL,
  `telpon_siswa` varchar(250) NOT NULL,
  `kelas_siswa` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama_siswa`, `nip_siswa`, `alamat_siswa`, `telpon_siswa`, `kelas_siswa`, `status`) VALUES
(9, 'Maria Enjelina Situmorang', '3015789191', 'Batuaji', '0895603671151', 14, 1),
(10, 'tes', '123', 'tes', '1234', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` int(11) NOT NULL,
  `running_number` varchar(250) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `semester` int(11) DEFAULT NULL,
  `open_date` datetime NOT NULL,
  `close_date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id`, `running_number`, `id_mapel`, `id_kelas`, `semester`, `open_date`, `close_date`, `created_by`, `created_datetime`, `status`) VALUES
(17, '000001', 13, 14, 1, '2021-07-03 15:40:00', '2021-07-04 15:40:00', '24', '2021-07-03 10:40:44', 0),
(19, '000002', 13, 14, 1, '2021-07-03 15:43:00', '2021-07-04 15:43:00', '24', '2021-07-03 10:43:36', 0),
(20, '000003', 13, 14, 2, '2021-07-03 10:00:00', '2021-07-04 11:00:00', '24', '2021-07-03 11:22:28', 0),
(21, '000004', 13, 14, 1, '2021-07-03 10:00:00', '2021-07-10 13:00:00', '24', '2021-07-03 12:02:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tugas_soal`
--

CREATE TABLE `tugas_soal` (
  `id` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `soal` text NOT NULL,
  `soal_opsi_a` text DEFAULT NULL,
  `soal_opsi_b` text DEFAULT NULL,
  `soal_opsi_c` text DEFAULT NULL,
  `soal_opsi_d` text DEFAULT NULL,
  `jawaban_benar` varchar(1) NOT NULL,
  `jenis_soal` int(11) NOT NULL DEFAULT 0 COMMENT '0 : Pertanyaan, 1 : Opsional',
  `status_soal` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas_soal`
--

INSERT INTO `tugas_soal` (`id`, `id_tugas`, `soal`, `soal_opsi_a`, `soal_opsi_b`, `soal_opsi_c`, `soal_opsi_d`, `jawaban_benar`, `jenis_soal`, `status_soal`) VALUES
(20, 17, 'sebutkan nama hewan', NULL, NULL, NULL, NULL, 'a', 0, 0),
(21, 18, 'sebutkan nama hewan', 'kursi', 'kelinci', '', '', 'a', 1, 1),
(22, 19, 'sebutkan nama hewan', 'kursi', 'kelinci', 'meja', 'sendok', 'b', 1, 0),
(23, 19, 'sebutkan nama hewan', 'kursi', 'kelinci', 'meja', 'sendok', 'b', 1, 0),
(24, 19, 'sebutkan nama hewan', 'sendok', 'kelinci', 'meja', 'kursi', 'b', 1, 0),
(25, 19, 'sebutkan nama hewan', 'sendok', 'meja', 'kelinci', 'kursi', 'c', 1, 0),
(26, 19, 'sebutkan nama hewan', 'sendok ', 'kelinci', 'kursi', ' meja', 'b', 1, 0),
(27, 19, 'sebutkan nama hewan', 'sendok ', 'meja', 'kelinci', 'kursi', 'b', 1, 0),
(28, 19, 'sebutkan nama hewan', 'sendok', 'meja', 'kelinci', 'kursi', 'b', 1, 0),
(29, 19, 'sebutkan nama hewan', 'sendok', 'meja', 'kelinci', 'kursi', 'c', 1, 0),
(30, 19, 'sebutkan nama hewan', 'sendok', 'neja', 'kelinci', 'kursi', 'c', 1, 0),
(31, 19, 'sebutkan nama hewan', 'sendok', 'meja', 'kelinci', 'kursi', 'c', 1, 0),
(32, 20, 'soal essay 1', NULL, NULL, NULL, NULL, '', 0, 0),
(33, 20, 'soal essay 2', NULL, NULL, NULL, NULL, '', 0, 0),
(34, 20, 'soal essay 3', NULL, NULL, NULL, NULL, '', 0, 0),
(35, 20, 'soal essay 4', NULL, NULL, NULL, NULL, '', 0, 0),
(36, 20, 'soal essay 5', NULL, NULL, NULL, NULL, '', 0, 0),
(43, 21, 'a', 'a', 'a', 'a', 'a', 'a', 1, 0),
(44, 21, 'b', 'v', 'v', 'v', 'd', 'a', 1, 0),
(45, 21, 'asd', 'asd', 'asd', 'asd', 'asd', 'a', 1, 0),
(46, 21, 'asd', 'asd', 'asd', 'asd', 'asd', 'a', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` text NOT NULL,
  `role` int(11) NOT NULL,
  `nip` varchar(250) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `status_hapus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `role`, `nip`, `status`, `status_hapus`) VALUES
(1, 'tata usaha', 'admin', '76ebef54a323742cc4e0da4acc27b04e2113a551568cc3236e7153fae5e7c63f6fb8f7105ef144b342bece2298465c20178d22561541fe1c89c6f3664f560216WYkE0NMJw+Ny1QaBCtKrZmqTjK3C0+Xiv237vPzLdxM=', 0, '10042932', 1, NULL),
(24, 'Sinta Pertiwi Manurung', 'sinta_guru', '3e61e9c6676a6139e99b28abee028acb0dfbc77e962a375196d867443dc96b0166410612949167d6645f4f505c6b337155e0e53ed4d3590d5700b2cb93c5bf7ekx+ZeyAppMG9KLoVOJkDluYDC7WLThQpDaGNGSUeEn4=', 1, '96010617', 1, NULL),
(25, 'Maria Enjelina Situmorang', 'maria_siswa', '4bbc0ca31be78009ecf87218399d170a0b0c061d8fb5010af2ea908d337c938d478d4f609512808f9bfa92dd8b9d1c27ea3d17e0748da625bb34fbb59f415280BZ52vSziY+kK5tXBHkb+xrXAfoCQ+JpAm3tABwT3kyY=', 2, '3015789191', 1, NULL),
(99999, 'System', 'System', '', 99999, '99999', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip_guru` (`nip_guru`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengumpulan`
--
ALTER TABLE `pengumpulan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip_siswa` (`nip_siswa`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas_soal`
--
ALTER TABLE `tugas_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pengumpulan`
--
ALTER TABLE `pengumpulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tugas_soal`
--
ALTER TABLE `tugas_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100000;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
