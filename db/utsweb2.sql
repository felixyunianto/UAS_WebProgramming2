-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 12, 2019 at 08:12 AM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.25-1+ubuntu18.04.1+deb.sury.org+1

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
  `nim` char(8) NOT NULL,
  `nama_mahasiswa` varchar(50) NOT NULL,
  `nidn` int(11) NOT NULL,
  `nama_dosen` varchar(255) NOT NULL,
  `id_matkul` int(10) NOT NULL,
  `nama_matkul` varchar(50) NOT NULL,
  `tanggal_masuk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `nim`, `nama_mahasiswa`, `nidn`, `nama_dosen`, `id_matkul`, `nama_matkul`, `tanggal_masuk`) VALUES
(2, '17090121', 'Felix Yunianto Gunawan', 40121, 'M. Muzaqi, S.Kom', 1, 'Web Programming 2', '2019-11-06 12:08:51');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'admin', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nidn` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `mata_kuliah` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nidn`, `nama`, `mata_kuliah`, `alamat`) VALUES
(40121, 'M. Muzaqi, S.Kom', '', 'Gatau');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` char(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(2) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` int(14) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `semester` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `kelas`, `email`, `no_hp`, `alamat`, `semester`) VALUES
('17090017', 'Fitria Nurizqi Handayani', 'D', 'fitriarizqi07@gmail.com', 875614658, 'Wangandawa', 5),
('17090051', 'Desi Ayu Purwono', 'B', 'desipurwono@gmail.com', 12345678, 'Mbuh Kue', 5),
('17090110', 'Diki Priyanto', 'B', 'dhikipriyanto@gmail.com', 12345678, 'Bongkok', 5),
('17090121', 'Felix Yunianto Gunawan', 'B', 'felixyunianto@gmail.com', 1234567890, 'PAI', 5),
('6', 'asdhjkh', 'A', 'a@gmail.com', 81273871, 'lsfh', 8);

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
(1, 'Web Programming 2', 40121, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `nim` (`nim`),
  ADD KEY `nama_mahasiswa` (`nama_mahasiswa`),
  ADD KEY `nidn` (`nidn`),
  ADD KEY `nama_dosen` (`nama_dosen`),
  ADD KEY `id_matkul` (`id_matkul`),
  ADD KEY `nama_matkul` (`nama_matkul`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `absen_ibfk_2` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `absen_ibfk_3` FOREIGN KEY (`nama_mahasiswa`) REFERENCES `mahasiswa` (`nama`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `absen_ibfk_5` FOREIGN KEY (`id_matkul`) REFERENCES `matkul` (`id_matkul`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `absen_ibfk_6` FOREIGN KEY (`nama_matkul`) REFERENCES `matkul` (`nama_matkul`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `absen_ibfk_7` FOREIGN KEY (`nama_dosen`) REFERENCES `dosen` (`nama`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
