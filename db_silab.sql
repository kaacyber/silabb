-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 18, 2020 at 04:25 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_silab`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_aset`
--

CREATE TABLE `tb_aset` (
  `kode_aset` int(20) NOT NULL,
  `id_lokasi` int(20) NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `spesifikasi` text NOT NULL,
  `jumlah` int(20) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_aset`
--

INSERT INTO `tb_aset` (`kode_aset`, `id_lokasi`, `nama_barang`, `spesifikasi`, `jumlah`, `satuan`, `keterangan`, `foto`) VALUES
(1, 1, 'LCD Proyektor', 'Merk Sony', 1, 'Buah', 'Baik', 'ERD.jpg'),
(3, 2, 'LCD Monitor', 'Monitor ', 5, 'buah', 'baik', ''),
(4, 1, 'Printer', 'printer epson', 50, 'buah', 'bagus', 'asd.jpg'),
(5, 19, 'Komputer all in one', 'Sony', 10, 'buah', 'baik', 'kwowkwo.jpg'),
(12, 10, 'kabel kabel', 'utp', 50, 'meter', 'baik', 'Screenshot_2020-04-21-19-47-47-01.png'),
(13, 1, 'Meja 2 orang', 'meja kayu', 20, 'buah', 'kondisi baik', 'phantump.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `id_lokasi` int(10) NOT NULL,
  `id_prodi` int(10) NOT NULL,
  `nama_lab` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lokasi`
--

INSERT INTO `tb_lokasi` (`id_lokasi`, `id_prodi`, `nama_lab`) VALUES
(1, 1, 'Lab 1 Bawah MI'),
(2, 1, 'Lab Atas MI'),
(3, 2, 'Lab SI/Ilkom'),
(4, 3, 'Lab SI/Ilkom'),
(9, 5, 'Lab 1 Elektronika'),
(10, 5, 'Lab 2 Listrik'),
(11, 5, 'Workshop 1'),
(12, 5, 'Workshop 2'),
(13, 6, 'Kecantikan'),
(14, 6, 'Lab 1 Busana'),
(15, 6, 'Lab 2 Busana'),
(16, 6, 'Lab Hidang'),
(17, 6, 'Lab Produksi 1'),
(18, 6, 'Lab Produksi 2'),
(19, 4, 'Lab LCI');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelaporan`
--

CREATE TABLE `tb_pelaporan` (
  `id_pelaporan` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `tgl_lapor` date NOT NULL,
  `kode_aset` int(20) NOT NULL,
  `deskripsi_laporan` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `tanggapan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pelaporan`
--

INSERT INTO `tb_pelaporan` (`id_pelaporan`, `id_user`, `tgl_lapor`, `kode_aset`, `deskripsi_laporan`, `status`, `tanggapan`) VALUES
(28, 38, '2020-06-17', 13, 'meja patah', 'Sudah Ditanggapi', 'baik akan saya perbaiki');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id_prodi` int(10) NOT NULL,
  `nama_prodi` varchar(200) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `fakultas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_prodi`
--

INSERT INTO `tb_prodi` (`id_prodi`, `nama_prodi`, `jurusan`, `fakultas`) VALUES
(1, 'Manajemen Informatika', 'Teknik Informatika', 'Teknik dan Kejuruan'),
(2, 'Ilmu Komputer', 'Teknik Informatika', 'Teknik dan Kejuruan'),
(3, 'Sistem Informasi', 'Teknik Informatika', 'Teknik dan Kejuruan'),
(4, 'Pendidikan Teknik Informatika', 'Teknik Informatika', 'Teknik dan Kejuruan'),
(5, 'Pendidikan Teknik Elektro', 'Teknologi Industri', 'Teknik dan Kejuruan'),
(6, 'Pendidikan Kesejahteraan Keluarga', 'Teknologi Industri', 'Teknik dan Kejuruan'),
(13, 'Pendidikan Teknik Nuklir', 'Teknik Nuklir', 'Teknik dan Kejuruan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `password`, `jabatan`) VALUES
(27, 'Putu Modi Julianto', '$2y$10$5j71pw7xsXNl5eKGwRMOjuW0Mg6Jbehal.DHTxqasuXZcqVbePxn6', 'Kepala Laboran'),
(38, 'Julianto Modi Putu', '$2y$10$ziVXwHyNpwH.UQL0gRS69uITZUYdBHV6xHKxeeadjA/9G95VPRMlS', 'Laboran');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_aset`
--
ALTER TABLE `tb_aset`
  ADD PRIMARY KEY (`kode_aset`);

--
-- Indexes for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `tb_pelaporan`
--
ALTER TABLE `tb_pelaporan`
  ADD PRIMARY KEY (`id_pelaporan`);

--
-- Indexes for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_aset`
--
ALTER TABLE `tb_aset`
  MODIFY `kode_aset` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  MODIFY `id_lokasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tb_pelaporan`
--
ALTER TABLE `tb_pelaporan`
  MODIFY `id_pelaporan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  MODIFY `id_prodi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
