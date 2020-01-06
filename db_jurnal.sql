-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2016 at 11:27 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jurnal`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE IF NOT EXISTS `akun` (
  `kode_akun` varchar(32) NOT NULL,
  `nama_akun` varchar(255) NOT NULL,
  `level` varchar(2) DEFAULT NULL,
  `akun_induk` varchar(32) DEFAULT NULL,
  `saldo_normal` enum('debit','kredit') DEFAULT NULL,
  `aktif` enum('ya','tidak') DEFAULT NULL,
  `saldo` int(11) DEFAULT NULL,
  `saldo_awal` int(11) DEFAULT NULL,
  `tanggal_saldowal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `saldo_normalreport` enum('debit','kredit') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`kode_akun`, `nama_akun`, `level`, `akun_induk`, `saldo_normal`, `aktif`, `saldo`, `saldo_awal`, `tanggal_saldowal`, `saldo_normalreport`) VALUES
('09080901', 'akun coba', '4', 'gosok gosok berhadiah', 'debit', NULL, 2147483647, NULL, '2016-05-18 12:49:59', 'debit'),
('1', 'aktiva', '1', 'aktiva', 'debit', NULL, 0, NULL, '2016-05-15 08:04:21', 'debit'),
('11', 'aktiva lancar', '2', 'aktiva', 'debit', NULL, 0, NULL, '2016-05-15 08:04:53', 'debit'),
('1101', 'kas dan setara kas', '3', 'aktiva', 'debit', NULL, 0, NULL, '2016-05-15 08:24:38', 'debit'),
('110101', 'kas di tangan', '4', 'aktiva', 'debit', NULL, 0, NULL, '2016-05-15 08:25:46', 'debit'),
('11010101', 'kas besar keuangan', '5', 'aktiva', 'debit', NULL, -50000000, NULL, '2016-05-15 08:26:11', 'debit'),
('11010102', 'kas kecil keuangan', '5', 'aktiva', 'debit', NULL, 0, NULL, '2016-05-15 08:37:15', 'debit'),
('11010103', 'kas kasir unit bisnis', '5', 'aktiva', 'debit', NULL, 0, NULL, '2016-05-15 08:38:06', 'debit'),
('110102', 'kas bank', '4', 'aktiva', 'debit', NULL, 887500, NULL, '2016-05-15 08:38:27', 'debit'),
('1102', 'piutang', '3', 'aktiva', 'debit', NULL, 0, NULL, '2016-05-15 08:39:14', 'debit'),
('110201', 'piutang usaha', '4', 'aktiva', 'debit', NULL, 614480, NULL, '2016-05-15 08:39:48', 'debit'),
('110202', 'piutang pemilik dan staf rsdea', '4', 'aktiva', 'debit', NULL, 1141325, NULL, '2016-05-15 08:42:23', 'debit'),
('110203', 'piutang konsultan', '4', 'aktiva', 'debit', NULL, 0, NULL, '2016-05-15 08:42:52', 'debit'),
('110205', 'piutang pihak kerjasama', '4', 'aktiva', 'debit', NULL, 32217250, NULL, '2016-05-15 08:43:27', 'debit'),
('110206', 'piutang pph 25', '4', 'aktiva', 'debit', NULL, 0, NULL, '2016-05-15 08:43:47', 'debit'),
('1103', 'biaya dibayar di muka', '3', 'aktiva', 'debit', NULL, 0, NULL, '2016-05-15 08:44:10', 'debit'),
('2', 'kewajiban', '1', 'kewajiban', 'debit', NULL, 0, NULL, '2016-06-09 08:16:22', 'debit');

-- --------------------------------------------------------

--
-- Table structure for table `buku_besar`
--

CREATE TABLE IF NOT EXISTS `buku_besar` (
  `kode_bukubesar` int(11) NOT NULL,
  `kode_akun` varchar(32) NOT NULL,
  `tanggal_insert` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tanggal_posting` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `keterangan` text NOT NULL,
  `debet` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `saldo` int(11) NOT NULL,
  `kode_jurnal` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku_besar`
--

INSERT INTO `buku_besar` (`kode_bukubesar`, `kode_akun`, `tanggal_insert`, `tanggal_posting`, `keterangan`, `debet`, `kredit`, `saldo`, `kode_jurnal`) VALUES
(1, '110101', '2016-06-04 18:36:55', '2016-06-04 11:36:55', '', 12000, 0, 0, 'JUR.04-06-2016.1'),
(2, '11010102', '2016-06-04 18:37:34', '2016-06-04 11:37:34', '', 0, 7000, 0, 'JUR.04-06-2016.1'),
(3, '11010101', '2016-06-05 00:57:59', '2016-06-04 17:57:59', '', 678, 0, 0, 'JUR.04-06-2016.2'),
(4, '110201', '2016-06-05 18:02:13', '2016-06-05 11:02:13', '', 12000, 0, 0, 'JUR.05-06-2016.4'),
(5, '110202', '2016-06-05 18:02:16', '2016-06-05 11:02:16', '', 0, 4000, 0, 'JUR.05-06-2016.4'),
(6, '110203', '2016-06-05 18:02:19', '2016-06-05 11:02:19', '', 0, 8000, 0, 'JUR.05-06-2016.4'),
(7, '11010103', '2016-06-05 18:46:55', '2016-06-05 11:46:55', '', 0, 5000, 0, 'JUR.04-06-2016.1'),
(8, '11010101', '2016-06-09 11:29:11', '2016-06-09 04:29:11', '', 10000, 0, 0, 'JUR.09-06-2016.1'),
(9, '2', '2016-06-21 13:30:12', '2016-06-21 06:30:12', '', 120000, 0, 0, 'JUR.21-06-2016.2'),
(10, '11010102', '2016-06-24 00:12:29', '2016-06-23 17:12:29', '', 0, 6000, 0, 'JUR.09-06-2016.1');

-- --------------------------------------------------------

--
-- Table structure for table `detail_jurnal_temp`
--

CREATE TABLE IF NOT EXISTS `detail_jurnal_temp` (
  `kode_jurnal` varchar(32) NOT NULL,
  `kode_akun` varchar(32) NOT NULL,
  `debet` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `status` enum('post','unpost') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_jurnal_temp`
--

INSERT INTO `detail_jurnal_temp` (`kode_jurnal`, `kode_akun`, `debet`, `kredit`, `status`) VALUES
('JUR.09-06-2016.1', '11010101', 10000, 0, 'post'),
('JUR.09-06-2016.1', '11010102', 0, 6000, 'post'),
('JUR.09-06-2016.1', '11010103', 0, 4000, 'unpost'),
('JUR.21-06-2016.2', '09080901', 0, 120000, 'unpost'),
('JUR.21-06-2016.2', '2', 120000, 0, 'post');

--
-- Triggers `detail_jurnal_temp`
--
DELIMITER $$
CREATE TRIGGER `buku besar` AFTER UPDATE ON `detail_jurnal_temp`
 FOR EACH ROW insert into buku_besar(kode_akun, kode_jurnal, debet, kredit) values (old.kode_akun, old.kode_jurnal, old.debet, old.kredit)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `kode_jabatan` varchar(32) NOT NULL,
  `nama_jabatan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`kode_jabatan`, `nama_jabatan`) VALUES
('jab1', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_temp`
--

CREATE TABLE IF NOT EXISTS `jurnal_temp` (
  `kode_jurnal` varchar(32) NOT NULL,
  `tanggal_jurnal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tanggal_posting` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kode_jenisbayar` varchar(32) NOT NULL,
  `referensi` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `kode_pegawai` varchar(32) DEFAULT NULL,
  `kode_postransaksi` varchar(32) NOT NULL,
  `status` enum('post','unpost') NOT NULL DEFAULT 'unpost',
  `cek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurnal_temp`
--

INSERT INTO `jurnal_temp` (`kode_jurnal`, `tanggal_jurnal`, `tanggal_posting`, `kode_jenisbayar`, `referensi`, `keterangan`, `kode_pegawai`, `kode_postransaksi`, `status`, `cek`) VALUES
('JUR.09-06-2016.1', '2016-06-09 04:29:00', '2016-06-09 04:29:00', 'cash', '123', 'coba - coba', 'peg.001', 'rawat inap', 'post', 1),
('JUR.21-06-2016.2', '2016-06-21 06:29:43', '2016-06-21 06:29:43', 'cash', 'man1', 'yah nyoba doang', 'peg.001', 'rawat inap', 'post', 1);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE IF NOT EXISTS `laporan` (
  `kode_laporan` int(11) NOT NULL,
  `kode_akun` varchar(32) NOT NULL,
  `tanggal_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `kode_pegawai` varchar(32) NOT NULL,
  `kode_jabatan` varchar(32) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `kelamin` enum('laki-laki','perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`kode_pegawai`, `kode_jabatan`, `nama`, `kelamin`, `alamat`, `email`, `password`) VALUES
('peg.001', 'jab1', 'administrator', 'laki-laki', 'batu', 'admin@rsdea.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`kode_akun`);

--
-- Indexes for table `buku_besar`
--
ALTER TABLE `buku_besar`
  ADD PRIMARY KEY (`kode_bukubesar`);

--
-- Indexes for table `detail_jurnal_temp`
--
ALTER TABLE `detail_jurnal_temp`
  ADD PRIMARY KEY (`kode_jurnal`,`kode_akun`),
  ADD KEY `kode_jurnal` (`kode_jurnal`,`kode_akun`),
  ADD KEY `kode_akun` (`kode_akun`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`kode_jabatan`);

--
-- Indexes for table `jurnal_temp`
--
ALTER TABLE `jurnal_temp`
  ADD PRIMARY KEY (`kode_jurnal`),
  ADD KEY `kode_pegawai` (`kode_pegawai`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`kode_laporan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`kode_pegawai`),
  ADD KEY `kode_jabatan` (`kode_jabatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku_besar`
--
ALTER TABLE `buku_besar`
  MODIFY `kode_bukubesar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `kode_laporan` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_jurnal_temp`
--
ALTER TABLE `detail_jurnal_temp`
  ADD CONSTRAINT `detail_jurnal_temp_ibfk_1` FOREIGN KEY (`kode_akun`) REFERENCES `akun` (`kode_akun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_jurnal_temp_ibfk_2` FOREIGN KEY (`kode_jurnal`) REFERENCES `jurnal_temp` (`kode_jurnal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jurnal_temp`
--
ALTER TABLE `jurnal_temp`
  ADD CONSTRAINT `jurnal_temp_ibfk_1` FOREIGN KEY (`kode_pegawai`) REFERENCES `pegawai` (`kode_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`kode_jabatan`) REFERENCES `jabatan` (`kode_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
