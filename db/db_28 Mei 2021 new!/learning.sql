-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 09:22 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `id_kelas` varchar(255) NOT NULL,
  `id_mapel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nama_guru`, `nip_guru`, `alamat_guru`, `telpon_guru`, `id_kelas`, `id_mapel`) VALUES
(6, 'spirit4', '11223355', 'aji stone5', '0899999944', '8; 9', '1; 2');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(255) DEFAULT NULL,
  `wali_kelas` varchar(255) DEFAULT NULL,
  `lokasi_kelas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `wali_kelas`, `lokasi_kelas`) VALUES
(1, 'VI A', '1', 'qwd'),
(2, 'VI B', '1', 'asdqwdqw');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` int(11) NOT NULL,
  `nama_mapel` varchar(255) DEFAULT NULL,
  `kelas_mapel` varchar(255) DEFAULT NULL,
  `pengajar_mapel` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `nama_mapel`, `kelas_mapel`, `pengajar_mapel`, `status`) VALUES
(1, 'bing', '10', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pengumpulan`
--

CREATE TABLE `pengumpulan` (
  `id` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `id_tugas_soal` int(11) NOT NULL,
  `jawaban` text NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `created_date` datetime NOT NULL,
  `status_jawaban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumpulan`
--

INSERT INTO `pengumpulan` (`id`, `id_tugas`, `id_tugas_soal`, `jawaban`, `created_by`, `created_date`, `status_jawaban`) VALUES
(1, 11, 1, 'Rohani Situmorang', '1', '0000-00-00 00:00:00', 0),
(2, 11, 2, 'b', '1', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama_siswa` varchar(250) NOT NULL,
  `nip_siswa` varchar(250) NOT NULL,
  `alamat_siswa` text NOT NULL,
  `telpon_siswa` varchar(250) NOT NULL,
  `kelas_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama_siswa`, `nip_siswa`, `alamat_siswa`, `telpon_siswa`, `kelas_siswa`) VALUES
(1, 'Agung', '10042932', 'Perumahan Sarmen Raya', '10042932', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `open_date` datetime NOT NULL,
  `close_date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id`, `id_mapel`, `id_kelas`, `open_date`, `close_date`, `created_by`, `created_datetime`, `status`) VALUES
(11, 1, 1, '2021-05-24 10:00:00', '2021-05-24 11:30:00', '2', '2021-05-24 15:18:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tugas_soal`
--

CREATE TABLE `tugas_soal` (
  `id` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `soal` text NOT NULL,
  `soal_opsi_a` text,
  `soal_opsi_b` text,
  `soal_opsi_c` text,
  `soal_opsi_d` text,
  `jenis_soal` int(11) NOT NULL DEFAULT '0' COMMENT '0 : Pertanyaan, 1 : Opsional',
  `status_soal` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas_soal`
--

INSERT INTO `tugas_soal` (`id`, `id_tugas`, `soal`, `soal_opsi_a`, `soal_opsi_b`, `soal_opsi_c`, `soal_opsi_d`, `jenis_soal`, `status_soal`) VALUES
(1, 11, 'Siapa yg mesan web ini ?', NULL, NULL, NULL, NULL, 0, 0),
(2, 11, 'Berapa harga web ini ?', '2 juta', '3 juta', '4 juta', '5 juta', 1, 0);

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
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `role`, `nip`, `status`) VALUES
(1, 'tata usaha', 'admin', '0cbc56ec9d8fc81863be950e8abacc38415ab00c2d00a947bd6a11946e44bccc3a063115e16b6fbabe63a7cf9fae30330379275586f1401be489a7171f304253muKE4ItKNaRzYC1NyjsgUmL9b5L/Nuk800fMAMwQ70I=', 0, '', 1),
(2, 'guru', 'guru', 'b61415d4eb58ccc92e9a1e56875274e6e675322eb8ba754e5bbccef922f9230186c876c27d68f498f21c72768d8084d5a668626cb2d4802fc79283d86e9f4ee33QWE3+dWz/GiVKYnUDKm20kNMZFXnPUvVjZ5l+d3V+E=', 1, '', 1),
(3, 'siswa', 'siswa', '8b1cb840a42210105083e7498b3d8ebeeafd4cdc25f65b2994212387143be95abda2532460f41d461a10d13a1c0b2321b550e894d068eb7268c9a5b5c9b9cb11IPNF/XFjbQIYtKdxf5z4+uCWhIDj2kZovtu8APQ8V3E=', 2, '10042932', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengumpulan`
--
ALTER TABLE `pengumpulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tugas_soal`
--
ALTER TABLE `tugas_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
