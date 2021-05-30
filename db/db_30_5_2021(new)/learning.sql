-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2021 at 11:07 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

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
  `id_kelas` varchar(255) DEFAULT NULL,
  `id_mapel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nama_guru`, `nip_guru`, `alamat_guru`, `telpon_guru`, `id_kelas`, `id_mapel`) VALUES
(9, 'Guru Kimia', 'kimia', 'kimia', '1', '1; 2', '1; 2'),
(10, 'Guru Fisika', 'fisika', 'fisika', '1', '2', '1');

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
(1, 'KIMIA', '9', '-'),
(2, 'FISIKA', '8', '-');

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
(1, 'FISIKA', '2', '8', '1'),
(2, 'KIMIA', '1', '9', '1');

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
(3, 0, 5, 'P = VxNxRxt', '11', '2021-05-29 10:25:58', 0),
(4, 0, 6, 'a', '11', '2021-05-29 10:25:58', 0),
(5, 1, 5, 'p v n r t', '11', '2021-05-29 11:52:21', 0),
(6, 1, 6, 'a', '11', '2021-05-29 11:52:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `nilai` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id`, `id_siswa`, `id_mapel`, `id_tugas`, `nilai`, `created_by`) VALUES
(20, 11, 1, 1, '100', '8');

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
  `kelas_siswa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama_siswa`, `nip_siswa`, `alamat_siswa`, `telpon_siswa`, `kelas_siswa`) VALUES
(1, 'siswa_1', 'siswa_1', 'siswa_1', '1', 1),
(2, 'siswa_2', 'siswa_2', 'siswa_2', '1', 2);

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
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id`, `id_mapel`, `id_kelas`, `open_date`, `close_date`, `created_by`, `created_datetime`, `status`) VALUES
(1, 1, 2, '2021-05-29 10:00:00', '2021-05-29 11:00:00', '8', '2021-05-29 10:23:54', 1),
(2, 2, 1, '2021-05-30 03:40:00', '2021-05-30 04:40:00', '8', '2021-05-29 22:40:31', 0),
(3, 2, 1, '2021-05-30 12:28:00', '2021-05-30 14:28:00', '9', '2021-05-30 07:28:24', 0);

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
  `jenis_soal` int(11) NOT NULL DEFAULT 0 COMMENT '0 : Pertanyaan, 1 : Opsional',
  `status_soal` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas_soal`
--

INSERT INTO `tugas_soal` (`id`, `id_tugas`, `soal`, `soal_opsi_a`, `soal_opsi_b`, `soal_opsi_c`, `soal_opsi_d`, `jenis_soal`, `status_soal`) VALUES
(5, 1, 'Apa rumus tekanan ?', NULL, NULL, NULL, NULL, 0, 0),
(6, 1, 'Siapa Thomas Alfa Edison', 'Penemu', 'Penipu', 'Puncuri', 'Pembunuh', 1, 0);

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
(1, 'tata usaha', 'admin', '0e159e02ac79f402696862cef65057c4df93352a929ac0ffcb4e33bfda1e3f119a5c9b430fc9b836af4b175b7687f12bad9f051691bf0129deb47242b03f27c06DrT0WBaUuvt0nJVnBD8KZb4AKanm2x/+CY6DdO0xSo=', 0, '10042932', 1),
(8, 'Guru Fisika', 'fisika', '945ef024349973241e2832b49dcf1294fd4806756484d265132120b40434fbab99a7243d49c6eb845be0ea0d00105035354ce95f14dd8ee5c5d882b14bbc40c0MtKXpFSfGiZDRGdzEeuYrg7mDT8g+RtkVaREJBn3mns=', 1, 'fisika', 1),
(9, 'Guru Kimia', 'kimia', '20886a86118ed516e7d206da049c9057444859db01fcb1a312e1fde25c07a910ec2aa96a8b2aedd2864d705dfd0f243bf6ab462327b86a099e43f364d316bea6Al/qFJHXjgBIyKWviwUKk9fKiWOUevoAunPOWmtRoKE=', 1, 'kimia', 1),
(10, 'siswa 1', 'siswa_1', 'c447bac691de1ce480619247887582f86697f7059fe8006dc4fea6fc25e48d77d69b9540cd43283bca1172d4c0bd22f3352bcae552cd4eeb6cd5c8fcf7129dc6NcQThdo3R1s9FWv0/qxe6TSBwdw4d7ibruZxBUIyGs8=', 2, 'siswa_1', 1),
(11, 'siswa 2', 'siswa_2', 'fa41a44e5c608cede94dde415c67cda37d8c5887a978974c467c9b16ee6a481714f2f2c93f3b15f5c952fc70782910648788154feeea79da6414f42cc0700386EAZ3/rL2g8Gsvk48k8cLGT2QDriiHQ2PYFQkWKKHewc=', 2, 'siswa_2', 1);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengumpulan`
--
ALTER TABLE `pengumpulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tugas_soal`
--
ALTER TABLE `tugas_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
