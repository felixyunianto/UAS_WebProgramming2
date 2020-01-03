-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 03, 2020 at 09:33 PM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.26-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `utsweb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(10) NOT NULL,
  `id_matkul` int(10) NOT NULL,
  `nim` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `id_matkul`, `nim`, `status`, `tanggal`) VALUES
(1, 1, 17090121, 1, '2019-12-26 15:17:42'),
(2, 1, 1, 1, '2019-12-26 15:23:41'),
(3, 1, 1, 1, '2019-12-26 15:25:17'),
(4, 3, 17090121, 1, '2020-01-01 02:33:49'),
(5, 1, 17090121, 1, '2020-01-01 02:42:29');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `nama`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nidn` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mata_kuliah` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `deleted` enum('undeleted','deleted') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nidn`, `nama`, `email`, `password`, `mata_kuliah`, `alamat`, `deleted`) VALUES
(40121, 'M. Muzaqi, S.Kom', 'muzaqi@gmail.com', '123456', 'Web Programming 2', 'Gatau', 'undeleted'),
(40122, 'Nurul Renaningtiyas, M.Kom', 'nurulrenaningtiyas@gmail.com', '123456', 'Enterprise Resource Planning', 'Gatau', 'undeleted'),
(40124, 'Slamet Wiyono, S.Pd, M.Eng', 'slamet@gmail.com', '123456', 'E-Business and E-Commerce', 'Gatau', 'undeleted'),
(40125, 'Sena Wijayanto, S.Pd, M.T', 'sena@gmail.com', '123456', 'Object Oriented Programming 2', 'Gatau', 'undeleted'),
(40126, 'Priyanto Tamami, S.Kom', 'tamami@gmail.com', '123456', 'Data Warehouse', 'Gatau', 'deleted');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(2) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` int(14) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `semester` int(1) NOT NULL,
  `deleted` enum('undeleted','deleted') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `kelas`, `email`, `password`, `no_hp`, `alamat`, `semester`, `deleted`) VALUES
(17090001, 'Felix Yunianto Gunawan', 'B', 'felixyunianto@gmail.com', 'felix12345', 87473657, 'PAI', 8, 'undeleted');

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `id_matkul` int(10) NOT NULL,
  `nama_matkul` varchar(50) NOT NULL,
  `nidn` int(11) NOT NULL,
  `semester` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `nama_matkul`, `nidn`, `semester`) VALUES
(1, 'Web Programming 2', 40121, 5),
(2, 'Framework PHP', 40121, 6),
(3, 'Database', 40122, 5);

-- --------------------------------------------------------

--
-- Table structure for table `reset_password`
--

CREATE TABLE `reset_password` (
  `id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nidn`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id_matkul`),
  ADD UNIQUE KEY `nama_matkul` (`nama_matkul`),
  ADD KEY `nidn` (`nidn`);

--
-- Indexes for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `nidn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40127;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `nim` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17090002;
--
-- AUTO_INCREMENT for table `reset_password`
--
ALTER TABLE `reset_password`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
