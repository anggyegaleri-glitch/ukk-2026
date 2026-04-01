-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 01, 2026 at 06:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_aspirasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`) VALUES
(120302, 'admin', 'zht');

-- --------------------------------------------------------

--
-- Table structure for table `tb_aspirasi`
--

CREATE TABLE `tb_aspirasi` (
  `id_aspirasi` int(11) NOT NULL,
  `status` enum('Menunggu','Proses','Selesai') NOT NULL,
  `id_pelaporan` int(5) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_aspirasi`
--

INSERT INTO `tb_aspirasi` (`id_aspirasi`, `status`, `id_pelaporan`, `feedback`) VALUES
(3001, 'Proses', 2001, 'akan segera terpenuhi, mohon menunggu'),
(3002, 'Selesai', 2002, 'terimakasih sudah menunggu, jika ada yg dirasa kurang puas bisa dilaporkan kembali'),
(3003, 'Menunggu', 2003, 'mohon menunggu, laporan anda sedang dalam proses pengajuan'),
(3004, 'Proses', 2004, 'akan segera terpenuhi, mohon menunggu langkah selanjutnya'),
(3005, 'Selesai', 2005, 'terimakasih sudah menunggu, jika ada yg dirasa kurang puas bisa dilaporkan kembali'),
(3006, 'Menunggu', 2006, 'mohon menunggu, laporan anda sedang dalam proses pengajuan'),
(3007, 'Proses', 2007, 'permintaan anda akan segera kami penuhi, mohon menunggu'),
(3008, 'Selesai', 2008, 'kami ucapkan terimakasih untuk laporan yang anda ajukan'),
(3009, 'Menunggu', 2009, 'mohon menunggu, laporan anda sedang dalam proses pengajuan'),
(30010, 'Proses', 20010, 'mohon menunggu, laporan anda sedang dalam proses pengajuan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_input_aspirasi`
--

CREATE TABLE `tb_input_aspirasi` (
  `id_pelaporan` int(11) NOT NULL,
  `nis` int(10) DEFAULT NULL,
  `id_kategori` int(5) DEFAULT NULL,
  `lokasi` varchar(50) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_input_aspirasi`
--

INSERT INTO `tb_input_aspirasi` (`id_pelaporan`, `nis`, `id_kategori`, `lokasi`, `ket`, `status`) VALUES
(1, 10010, 103, 'seluruh bagian sekolah', 'mau ac baruu', 'Menunggu'),
(2, 1008, 101, 'tempat wudhu', 'kerannya jelek', 'Menunggu'),
(4, 1002, 101, 'tempat wudhu', 'kerannya jelek', 'Menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(5) NOT NULL,
  `ket_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `ket_kategori`) VALUES
(101, 'Mushalla'),
(102, 'Wc'),
(103, 'Kelas'),
(104, 'Lab'),
(105, 'Parkiran'),
(106, 'Kantin'),
(107, 'Perpustakaan'),
(108, 'Keamanan'),
(109, 'Kebersihan'),
(200, 'Lingkungan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nis` int(10) NOT NULL,
  `kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `kelas`) VALUES
(1002, '12 rpl-2'),
(1003, '12 rpl-3'),
(1004, '12 tkj-1'),
(1005, '12 tkj-2'),
(1006, '12 tkj-3'),
(1007, '12 tja-1'),
(1008, '12 tja-2'),
(1009, '12 pf-1'),
(10010, '12 pf-2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_aspirasi`
--
ALTER TABLE `tb_aspirasi`
  ADD PRIMARY KEY (`id_aspirasi`),
  ADD KEY `id_pelaporan` (`id_pelaporan`);

--
-- Indexes for table `tb_input_aspirasi`
--
ALTER TABLE `tb_input_aspirasi`
  ADD PRIMARY KEY (`id_pelaporan`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD KEY `nis` (`nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120303;

--
-- AUTO_INCREMENT for table `tb_aspirasi`
--
ALTER TABLE `tb_aspirasi`
  MODIFY `id_aspirasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30011;

--
-- AUTO_INCREMENT for table `tb_input_aspirasi`
--
ALTER TABLE `tb_input_aspirasi`
  MODIFY `id_pelaporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_input_aspirasi`
--
ALTER TABLE `tb_input_aspirasi`
  ADD CONSTRAINT `tb_input_aspirasi_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`),
  ADD CONSTRAINT `tb_input_aspirasi_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
