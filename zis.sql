-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 04:52 PM
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
-- Database: `zis`
--

-- --------------------------------------------------------

--
-- Table structure for table `mustahiq`
--

CREATE TABLE `mustahiq` (
  `id_mustahiq` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nik` varchar(15) NOT NULL,
  `kelamin` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mustahiq`
--

INSERT INTO `mustahiq` (`id_mustahiq`, `nama`, `nik`, `kelamin`, `alamat`) VALUES
(9, 'sultan', '140810210066', 'Laki-laki', 'Bekasi');

-- --------------------------------------------------------

--
-- Table structure for table `muzakki`
--

CREATE TABLE `muzakki` (
  `id_muzakki` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nik` varchar(15) NOT NULL,
  `kelamin` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `muzakki`
--

INSERT INTO `muzakki` (`id_muzakki`, `nama`, `nik`, `kelamin`, `alamat`) VALUES
(12, 'luthfi', '140810210018', 'Laki-laki', 'Bogor');

-- --------------------------------------------------------

--
-- Table structure for table `panitia`
--

CREATE TABLE `panitia` (
  `id_panitia` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nik` varchar(15) NOT NULL,
  `kelamin` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panitia`
--

INSERT INTO `panitia` (`id_panitia`, `nama`, `nik`, `kelamin`, `alamat`) VALUES
(1, 'guntur', '140810210026', 'Laki-laki', 'Depok'),
(18, 'luthfi', '140810210018', 'Laki-laki', 'Bogor'),
(19, 'sultan', '140810210066', 'Laki-laki', 'Bekasi');

-- --------------------------------------------------------

--
-- Table structure for table `sumbangan`
--

CREATE TABLE `sumbangan` (
  `id_sumbangan` int(11) NOT NULL,
  `nominal` varchar(30) NOT NULL,
  `jenis_sumbangan` varchar(30) NOT NULL,
  `id_muzakki` int(11) NOT NULL,
  `id_mustahiq` int(11) NOT NULL,
  `id_panitiaPenerima` int(11) NOT NULL,
  `id_panitiaPenyalur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sumbangan`
--

INSERT INTO `sumbangan` (`id_sumbangan`, `nominal`, `jenis_sumbangan`, `id_muzakki`, `id_mustahiq`, `id_panitiaPenerima`, `id_panitiaPenyalur`) VALUES
(52, '250000', 'Zakat', 12, 9, 1, 1),
(53, '250000', 'Shadaqah', 12, 9, 18, 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mustahiq`
--
ALTER TABLE `mustahiq`
  ADD PRIMARY KEY (`id_mustahiq`);

--
-- Indexes for table `muzakki`
--
ALTER TABLE `muzakki`
  ADD PRIMARY KEY (`id_muzakki`);

--
-- Indexes for table `panitia`
--
ALTER TABLE `panitia`
  ADD PRIMARY KEY (`id_panitia`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `sumbangan`
--
ALTER TABLE `sumbangan`
  ADD PRIMARY KEY (`id_sumbangan`),
  ADD KEY `id_muzakki` (`id_muzakki`),
  ADD KEY `id_mustahiq` (`id_mustahiq`),
  ADD KEY `id_panitiaPenerima` (`id_panitiaPenerima`),
  ADD KEY `id_panitiaPenyalur` (`id_panitiaPenyalur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mustahiq`
--
ALTER TABLE `mustahiq`
  MODIFY `id_mustahiq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `muzakki`
--
ALTER TABLE `muzakki`
  MODIFY `id_muzakki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `panitia`
--
ALTER TABLE `panitia`
  MODIFY `id_panitia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sumbangan`
--
ALTER TABLE `sumbangan`
  MODIFY `id_sumbangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sumbangan`
--
ALTER TABLE `sumbangan`
  ADD CONSTRAINT `sumbangan_ibfk_1` FOREIGN KEY (`id_mustahiq`) REFERENCES `mustahiq` (`id_mustahiq`),
  ADD CONSTRAINT `sumbangan_ibfk_2` FOREIGN KEY (`id_muzakki`) REFERENCES `muzakki` (`id_muzakki`),
  ADD CONSTRAINT `sumbangan_ibfk_3` FOREIGN KEY (`id_panitiaPenerima`) REFERENCES `panitia` (`id_panitia`),
  ADD CONSTRAINT `sumbangan_ibfk_4` FOREIGN KEY (`id_panitiaPenyalur`) REFERENCES `panitia` (`id_panitia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
