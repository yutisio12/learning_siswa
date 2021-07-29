-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2021 at 12:54 PM
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
(17, 'Sinta Pertiwi Manurung', '96010617', 'Batuaji', '082389453271', '14; 15', '13', 1),
(18, 'system', '99999', 'Neraka', '0909', '15', '13', 1);

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
(14, 'Kelas 1', '', 'Sebelah Kiri Kantin', 1),
(15, 'Kelas 2', '', 'bt aji', 1);

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
(70, 25, 50, '<p>2</p>\r\n', NULL, '25', '2021-07-29 04:31:52', 0);

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
(45, 25, 14, 13, 28, 1, '100', '24', '0000-00-00 00:00:00'),
(46, 100000, 14, 13, 28, 1, '80', '24', '0000-00-00 00:00:00'),
(47, 99999, 14, 13, 28, 1, '90', '24', '0000-00-00 00:00:00'),
(48, 25, 14, 13, 29, 1, '100', '24', '0000-00-00 00:00:00'),
(49, 100000, 14, 13, 29, 1, '80', '24', '0000-00-00 00:00:00'),
(50, 99999, 14, 13, 29, 1, '95', '24', '0000-00-00 00:00:00');

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
(10, 'tes', '123', 'tes', '1234', 14, 1),
(11, 'system', '99999', 'system', '123456', 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` int(11) NOT NULL,
  `running_number` varchar(250) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nama_tugas` varchar(255) DEFAULT NULL,
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

INSERT INTO `tugas` (`id`, `running_number`, `id_mapel`, `id_kelas`, `nama_tugas`, `semester`, `open_date`, `close_date`, `created_by`, `created_datetime`, `status`) VALUES
(28, '000001', 13, 14, 'Tugas 1', 1, '2021-07-29 14:02:00', '2021-07-29 15:02:00', '24', '2021-07-29 09:02:07', 0),
(29, '000002', 13, 14, 'tugas 2', 1, '2021-07-29 14:12:00', '2021-08-06 16:12:00', '24', '2021-07-29 09:12:12', 0);

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
(50, 25, '1+1 =', NULL, NULL, NULL, NULL, '', 0, 0),
(51, 28, '1+1', NULL, NULL, NULL, NULL, '', 0, 0),
(52, 29, 'apa itu', NULL, NULL, NULL, NULL, '', 0, 0);

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
(99999, 'System', 'System', '', 1, '99999', 1, 0),
(100000, 'tes', 'tes', '6824cdbabccd094233c2d3ebc804604c1241f3b55999d2ced31b35d1c8eb444fdd8742072ed14396ae9317300c93114fc30b2821a20a315c5fba53f4e75d2f8e6Qlst+sSUuLGHtUWKxeZtykVev20+ytTtT2XGld0F98=', 2, '123', 1, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pengumpulan`
--
ALTER TABLE `pengumpulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tugas_soal`
--
ALTER TABLE `tugas_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100001;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
