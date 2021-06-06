-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2021 at 09:24 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akhlak`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `kd_akun` varchar(10) NOT NULL,
  `kd_pengguna` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(41) NOT NULL,
  `level_akses` enum('ADMIN','MANAGER','AGEN') NOT NULL,
  `status` enum('AKTIF','BANNED') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`kd_akun`, `kd_pengguna`, `username`, `password`, `level_akses`, `status`) VALUES
('KDA0000001', 'KDP0000001', 'KDP0000001', '47906466eff3d919d45714d3efaa0b4e776e9b65', 'ADMIN', 'AKTIF'),
('KDA0000002', 'KDP0000002', 'KDP0000002', '75b596b974a9fb1c86b5e14753ae75d914c84b3d', 'AGEN', 'AKTIF'),
('KDA0000003', 'KDP0000003', 'KDP0000003', '75b596b974a9fb1c86b5e14753ae75d914c84b3d', 'MANAGER', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kegiatan`
--

CREATE TABLE `tb_kegiatan` (
  `kd_kegiatan` varchar(10) NOT NULL,
  `nama_kegiatan` varchar(200) NOT NULL,
  `bulan_kegiatan` date NOT NULL,
  `tanggal_kumpul` date NOT NULL,
  `jumlah_rkap_laporan` int(11) NOT NULL,
  `status` enum('TERSEDIA','HAPUS') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kegiatan`
--

INSERT INTO `tb_kegiatan` (`kd_kegiatan`, `nama_kegiatan`, `bulan_kegiatan`, `tanggal_kumpul`, `jumlah_rkap_laporan`, `status`) VALUES
('KDK0000001', 'ayammm', '2021-07-01', '2021-05-28', 10, 'TERSEDIA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `kd_laporan` varchar(10) NOT NULL,
  `kd_kegiatan` varchar(10) NOT NULL,
  `kd_unit` varchar(10) NOT NULL,
  `laporan` varchar(100) NOT NULL,
  `tanggal_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `kd_pengguna` varchar(10) NOT NULL,
  `kd_unit` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`kd_pengguna`, `kd_unit`, `nama`) VALUES
('KDP0000001', 'KDU0000004', 'Muhammad Rizki'),
('KDP0000002', 'KDU0000003', 'Isrina barara'),
('KDP0000003', 'KDU0000003', 'namakabagpulautiga');

-- --------------------------------------------------------

--
-- Table structure for table `tb_unit`
--

CREATE TABLE `tb_unit` (
  `kd_unit` varchar(10) NOT NULL,
  `unit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_unit`
--

INSERT INTO `tb_unit` (`kd_unit`, `unit`) VALUES
('KDU0000003', 'kebun pulau tiga'),
('KDU0000004', 'Kantor Pusat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`kd_akun`),
  ADD KEY `kd_pengguna` (`kd_pengguna`);

--
-- Indexes for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`kd_kegiatan`);

--
-- Indexes for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD PRIMARY KEY (`kd_laporan`),
  ADD KEY `kd_kegiatan` (`kd_kegiatan`),
  ADD KEY `kd_unit` (`kd_unit`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`kd_pengguna`),
  ADD KEY `kode_unit` (`kd_unit`);

--
-- Indexes for table `tb_unit`
--
ALTER TABLE `tb_unit`
  ADD PRIMARY KEY (`kd_unit`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD CONSTRAINT `tb_akun_ibfk_1` FOREIGN KEY (`kd_pengguna`) REFERENCES `tb_pengguna` (`kd_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD CONSTRAINT `tb_laporan_ibfk_1` FOREIGN KEY (`kd_kegiatan`) REFERENCES `tb_kegiatan` (`kd_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_laporan_ibfk_2` FOREIGN KEY (`kd_unit`) REFERENCES `tb_unit` (`kd_unit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD CONSTRAINT `tb_pengguna_ibfk_1` FOREIGN KEY (`kd_unit`) REFERENCES `tb_unit` (`kd_unit`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
