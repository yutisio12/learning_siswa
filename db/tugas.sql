-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2021 at 12:42 PM
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
(1, 1, 1, '2021-05-23 10:19:49', '2021-05-23 10:19:49', '1', '2021-05-23 10:19:49', 0),
(2, 2, 2, '2021-05-23 10:19:49', '2021-05-23 10:19:49', '2', '2021-05-23 10:19:49', 1),
(3, 1, 1, '2021-05-23 10:00:00', '2021-05-23 11:00:00', '1', '2021-05-23 11:59:12', 0),
(4, 1, 2, '2021-05-23 12:00:00', '2021-05-25 12:00:00', '1', '2021-05-23 12:03:16', 0),
(5, 1, 1, '2021-05-12 11:01:00', '2021-05-13 12:12:00', '1', '2021-05-23 12:10:00', 0),
(6, 1, 1, '2021-05-14 10:00:00', '2021-05-17 11:00:00', '1', '2021-05-23 12:12:18', 0),
(7, 1, 2, '2021-05-12 10:00:00', '2021-05-03 11:00:00', '1', '2021-05-23 12:14:26', 0),
(8, 1, 1, '2021-05-17 09:00:00', '2021-05-18 10:00:00', '1', '2021-05-23 12:15:09', 0),
(9, 1, 1, '2021-05-11 00:00:00', '2021-05-20 00:00:00', '1', '2021-05-23 12:16:17', 0),
(10, 1, 2, '2021-05-19 11:00:00', '2021-05-19 11:30:00', '1', '2021-05-23 12:17:36', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
