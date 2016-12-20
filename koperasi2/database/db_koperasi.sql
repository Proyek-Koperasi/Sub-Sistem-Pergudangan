-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2016 at 01:29 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE IF NOT EXISTS `detail_penjualan` (
  `id_detail_penjualan` varchar(20) NOT NULL,
  `id_barang` int(3) NOT NULL,
  `jumlah_barang` int(3) NOT NULL,
  `harga_satuan` int(10) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `id_penjualan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail_penjualan`, `id_barang`, `jumlah_barang`, `harga_satuan`, `subtotal`, `id_penjualan`) VALUES
('DJL-20161031-231', 0, 12, 17000, 204000, 'PJL-20161031-1867'),
('DJL-20161031-5318', 0, 10, 13000, 130000, 'PJL-20161031-1867'),
('DJL-20161031-6849', 0, 12, 17000, 204000, 'PJL-20161031-2269');

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE IF NOT EXISTS `t_admin` (
`id_admin` int(3) NOT NULL,
  `nama_admin` varchar(25) NOT NULL,
  `username_admin` varchar(25) NOT NULL,
  `password_admin` varchar(255) NOT NULL,
  `hak_akses` int(2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `t_admin`
--

INSERT INTO `t_admin` (`id_admin`, `nama_admin`, `username_admin`, `password_admin`, `hak_akses`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_anggota`
--

CREATE TABLE IF NOT EXISTS `t_anggota` (
  `id_anggota` varchar(20) NOT NULL,
  `nama_anggota` varchar(45) NOT NULL,
  `username_anggota` varchar(25) NOT NULL,
  `password_anggota` varchar(255) NOT NULL,
  `alamat_anggota` varchar(25) NOT NULL,
  `telp_anggota` varchar(14) NOT NULL,
  `hak_akses` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_barang`
--

CREATE TABLE IF NOT EXISTS `t_barang` (
  `id_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `jumlah_barang` int(5) NOT NULL,
  `tanggal_pembuatan_barang` date NOT NULL,
  `tanggal_kadaluarsa_barang` date NOT NULL,
  `max_persediaan_barang` int(5) NOT NULL,
  `min_persediaan_barang` int(5) NOT NULL,
  `isi_satuan` varchar(6) NOT NULL,
  `harga_beli` int(7) NOT NULL,
  `harga_jual` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_barang`
--

INSERT INTO `t_barang` (`id_barang`, `nama_barang`, `jumlah_barang`, `tanggal_pembuatan_barang`, `tanggal_kadaluarsa_barang`, `max_persediaan_barang`, `min_persediaan_barang`, `isi_satuan`, `harga_beli`, `harga_jual`) VALUES
('BRG-20161121-19370', 'Minyak Goreng', 30, '2016-01-20', '2017-11-26', 40, 10, 'liter', 12000, 14500),
('BRG-20161121-66102', 'Gula', 23, '2016-09-30', '2017-11-30', 30, 10, 'kg', 11000, 12500);

-- --------------------------------------------------------

--
-- Table structure for table `t_detail_pembelian`
--

CREATE TABLE IF NOT EXISTS `t_detail_pembelian` (
  `id_detail_pembelian` varchar(20) NOT NULL,
  `id_pembelian` varchar(20) NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `jumlah_barang` int(4) NOT NULL,
  `harga_satuan` int(10) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_detail_pembelian`
--

INSERT INTO `t_detail_pembelian` (`id_detail_pembelian`, `id_pembelian`, `id_barang`, `jumlah_barang`, `harga_satuan`, `subtotal`) VALUES
('DBL-20161122-2389', 'PBL-20161122-798', 'BRG-20161121-19370', 20, 12000, 240000),
('DBL-20161122-2513', 'PBL-20161122-798', 'BRG-20161121-66102', 5, 11000, 55000),
('DBL-20161122-7001', 'PBL-20161122-1948', 'BRG-20161121-66102', 10, 11000, 110000),
('DBL-20161122-8975', 'PBL-20161122-1948', 'BRG-20161121-19370', 10, 12000, 120000);

-- --------------------------------------------------------

--
-- Table structure for table `t_pembelian`
--

CREATE TABLE IF NOT EXISTS `t_pembelian` (
  `id_pembelian` varchar(20) NOT NULL,
  `id_admin` varchar(20) NOT NULL,
  `id_supplier` varchar(20) NOT NULL,
  `tanggal_pembelian` datetime NOT NULL,
  `total_harga_pembelian` int(8) NOT NULL,
  `keterangan_pembelian` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pembelian`
--

INSERT INTO `t_pembelian` (`id_pembelian`, `id_admin`, `id_supplier`, `tanggal_pembelian`, `total_harga_pembelian`, `keterangan_pembelian`, `status`) VALUES
('PBL-20161122-1948', '1', 'SPL-20161121-66990', '2016-11-10 01:11:06', 230000, '', 0),
('PBL-20161122-798', '1', 'SPL-20161121-57994', '2016-11-22 01:11:33', 295000, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_penjualan`
--

CREATE TABLE IF NOT EXISTS `t_penjualan` (
  `id_penjualan` varchar(20) NOT NULL,
  `tanggal_penjualan` datetime NOT NULL,
  `total_harga_penjualan` int(8) NOT NULL,
  `keterangan_penjualan` varchar(50) NOT NULL,
  `id_anggota` varchar(20) NOT NULL,
  `id_admin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_penjualan`
--

INSERT INTO `t_penjualan` (`id_penjualan`, `tanggal_penjualan`, `total_harga_penjualan`, `keterangan_penjualan`, `id_anggota`, `id_admin`) VALUES
('PJL-20161031-1867', '2016-10-31 13:10:09', 334000, '', '', 'USR201610123'),
('PJL-20161031-2269', '2016-10-31 13:10:07', 204000, '', '', 'USR201610123');

-- --------------------------------------------------------

--
-- Table structure for table `t_supplier`
--

CREATE TABLE IF NOT EXISTS `t_supplier` (
  `id_supplier` varchar(20) NOT NULL,
  `nama_supplier` varchar(45) NOT NULL,
  `alamat_supplier` varchar(45) NOT NULL,
  `telp_supplier` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_supplier`
--

INSERT INTO `t_supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `telp_supplier`) VALUES
('SPL-20161121-57994', 'Siti Muzdalifatus S', 'Perum Puri Kartika Asri, Malang', '089623737468'),
('SPL-20161121-66990', 'Rizkyna Cahyaningrum', 'Perum Bumi Asri, Malang', '085426846393'),
('SPL-20161121-78553', 'Sari Anggraeni', 'Jl. Bandung No.112, Malang', '089733737468');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE IF NOT EXISTS `userlogin` (
  `idUser` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`idUser`, `username`, `password`, `level`) VALUES
('USR201610123', 'admin', '21232f297a57a5a74389', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
 ADD PRIMARY KEY (`id_detail_penjualan`), ADD KEY `id_barang` (`id_barang`), ADD KEY `id_penjualan` (`id_penjualan`);

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `t_anggota`
--
ALTER TABLE `t_anggota`
 ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `t_barang`
--
ALTER TABLE `t_barang`
 ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `t_detail_pembelian`
--
ALTER TABLE `t_detail_pembelian`
 ADD PRIMARY KEY (`id_detail_pembelian`), ADD KEY `id_pembelian` (`id_pembelian`), ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `t_pembelian`
--
ALTER TABLE `t_pembelian`
 ADD PRIMARY KEY (`id_pembelian`), ADD KEY `id_admin` (`id_admin`), ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `t_penjualan`
--
ALTER TABLE `t_penjualan`
 ADD PRIMARY KEY (`id_penjualan`), ADD KEY `id_anggota` (`id_anggota`), ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `t_supplier`
--
ALTER TABLE `t_supplier`
 ADD PRIMARY KEY (`id_supplier`), ADD KEY `id_supplier` (`id_supplier`), ADD KEY `id_supplier_2` (`id_supplier`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
 ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_admin`
--
ALTER TABLE `t_admin`
MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
