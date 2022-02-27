-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2022 at 09:30 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sips`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `id_akun` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `level` varchar(10) DEFAULT NULL,
  `tanggal_register` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_akun`
--

INSERT INTO `tbl_akun` (`id_akun`, `nama`, `username`, `email`, `password`, `level`, `tanggal_register`) VALUES
(2, 'Ilham Lutfi', 'admin', 'ilham@gmail.com', '$2y$10$lJOCd4y8Q4J9emLHpvtcCeoI6JvuEnxmZ15IRiTAaxwfJV.q/6976', '1', '2022-02-27 07:19:32'),
(3, 'putra 1', 'putra 1', 'putra1@gmail.com', '$2y$10$UB78czDirNYdsqPfvmgVpupwhUk9B4Qx9n1cv4SddgXj.bkUAxar.', '0', '2022-02-27 08:25:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL,
  `tanggal_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`id_jurusan`, `nama_jurusan`, `tanggal_input`) VALUES
(2, 'Teknik Mesin', '2022-02-12 04:14:00'),
(121, 'Teknik Informatika', '2022-02-19 03:57:39'),
(132, 'Teknik Sipil', '2022-02-19 03:57:50'),
(133, 'Teknik Kimia', '2022-02-19 03:58:07'),
(134, 'Teknik Elektro', '2022-02-19 03:58:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendaftaran`
--

CREATE TABLE `tbl_pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `jurusan_id` varchar(100) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `tempat` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nama_ortu` varchar(100) NOT NULL,
  `pekerjaan_ortu` varchar(150) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `file` varchar(150) NOT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pendaftaran`
--

INSERT INTO `tbl_pendaftaran` (`id_pendaftaran`, `jurusan_id`, `nisn`, `nama`, `alamat`, `tempat`, `tanggal_lahir`, `asal_sekolah`, `nama_ortu`, `pekerjaan_ortu`, `no_telepon`, `file`, `tanggal_daftar`) VALUES
(3, '134', '123456700', 'Putra 1', 'Kayuara Sekayu', 'Kayuara', '2022-02-01', 'SMP N 2 SEKAYU', 'Tono Budiman', 'PNS', '086765452323', '62109d5d71d8e.pdf', '2022-02-27 02:19:04'),
(4, '133', '2135128', 'Putri', 'Sekayu', 'Betung', '2022-02-08', 'SMK BETUNG', 'Budiono', 'Wiraswasta', '082373737312', '6219ad4e91580.pdf', '2022-02-26 04:32:14'),
(6, '121', '131231', 'edo 1', 'Sekayu 1', 'Bandung 1', '2022-02-21', 'SMA BANDUNG 1', 'Saptono 1', 'Petani1', '097219838912731', '6219e5c3c0e4c.pdf', '2022-02-26 08:35:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
