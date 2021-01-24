-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2021 at 06:50 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ghozalitrans`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id_bus` int(11) NOT NULL,
  `jenis_bus` varchar(45) DEFAULT NULL,
  `fasilitas_bus` varchar(150) DEFAULT NULL,
  `jumlah_tempatduduk` int(11) NOT NULL,
  `jumlah_bus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id_bus`, `jenis_bus`, `fasilitas_bus`, `jumlah_tempatduduk`, `jumlah_bus`) VALUES
(4, 'Besar', 'TV , Android , AC , Musik', 60, 6),
(5, 'Medium', 'TV , Android , AC , Musik', 35, 2);

-- --------------------------------------------------------

--
-- Table structure for table `foto_bus`
--

CREATE TABLE `foto_bus` (
  `id_foto_bus` int(11) NOT NULL,
  `id_bus` int(11) DEFAULT NULL,
  `gambar1` varchar(45) DEFAULT NULL,
  `gambar2` varchar(45) DEFAULT NULL,
  `gambar3` varchar(45) DEFAULT NULL,
  `gambar4` varchar(45) DEFAULT NULL,
  `gambar5` varchar(45) DEFAULT NULL,
  `gambar6` varchar(45) DEFAULT NULL,
  `gambar7` varchar(45) DEFAULT NULL,
  `gambar8` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_bus`
--

INSERT INTO `foto_bus` (`id_foto_bus`, `id_bus`, `gambar1`, `gambar2`, `gambar3`, `gambar4`, `gambar5`, `gambar6`, `gambar7`, `gambar8`) VALUES
(1, 4, 'Besar-bus1.jpg', 'Besar-bus2.jpg', 'Besar-bus3.jpg', 'Besar-bus4.jpg', 'Besar-bus5.jpg', 'Besar-bus6.jpg', 'Besar-bus7.jpg', NULL),
(2, 5, 'Medium-bus1.jpg', 'Medium-bus22.jpg', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `id_bus` int(11) NOT NULL,
  `jenis_paket` varchar(45) DEFAULT NULL,
  `jumlah_hari` int(11) DEFAULT NULL,
  `jumlah_bus` int(11) NOT NULL,
  `harga_paket` double DEFAULT NULL,
  `rute1` varchar(45) DEFAULT NULL,
  `gambar1` varchar(45) NOT NULL,
  `type` enum('paket','non-paket') NOT NULL DEFAULT 'paket'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `id_bus`, `jenis_paket`, `jumlah_hari`, `jumlah_bus`, `harga_paket`, `rute1`, `gambar1`, `type`) VALUES
(8, 0, 'Banyuwangi', 1, 0, 2500000, 'Roxy , Watu dodol , pancoran', '', 'non-paket'),
(9, 0, 'Malang', 1, 0, 5000000, 'Jatim park 1, Jatimpark 2', 'paket_Malang2.png', 'paket'),
(10, 0, 'surabaya', 1, 0, 0, 'aa,cc,vv', '', 'non-paket'),
(11, 0, 'surabaya', 1, 0, 0, 'aa,cc,vv', '', 'non-paket'),
(12, 0, 'surabaya', 2, 0, 100000, 'kapal selam, grand city', '', 'paket'),
(13, 0, 'banyuwangi', 2, 0, 0, 'candi borobudur, malioboro, ', '', 'non-paket'),
(14, 0, 'banyuwangi', 2, 0, 0, 'candi borobudur, malioboro, ', '', 'non-paket'),
(15, 0, 'banyuwangi', 2, 0, 0, 'candi borobudur, malioboro', '', 'non-paket'),
(16, 0, 'banyuwangi', 2, 0, 0, 'candi borobudur, malioboro, ', '', 'non-paket'),
(17, 0, 'banyuwangi', 1, 0, 0, 'candi borobudur, malioboro', '', 'non-paket'),
(18, 0, 'surabaya', 1, 0, 0, 'aa,cc,vv', '', 'non-paket'),
(19, 0, 'banyuwangi', 2, 0, 0, 'kemiren', '', 'non-paket'),
(20, 0, 'banyuwangi', 1, 0, 0, 'kemiren', '', 'non-paket'),
(21, 0, 'banyuwangi', 1, 0, 0, 'kemiren', '', 'non-paket'),
(22, 0, 'surabaya', 1, 0, 0, 'aaaaa', '', 'non-paket'),
(23, 0, '1', 1, 0, 0, 'aaaaa', '', 'non-paket'),
(24, 0, 'surabaya', 1, 0, 0, 'malang', '', 'non-paket'),
(25, 0, 'surabaya', 1, 0, 0, 'malang', '', 'non-paket'),
(26, 0, 'surabaya', 1, 0, 0, 'malang', '', 'non-paket'),
(27, 0, 'surabaya', 2, 0, 0, 'malang', '', 'non-paket'),
(28, 0, 'surabaya', 1, 0, 0, 'malang', '', 'non-paket'),
(29, 0, 'Wisata Religi', 2, 0, 100000, 'kapal selam, grand city', '', 'paket'),
(30, 0, 'jatim park5', 1, 0, 0, 'aa,cc,vv', '', 'non-paket');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_bus` int(11) DEFAULT NULL,
  `id_paket` int(11) DEFAULT NULL,
  `nama_pemesanan` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `tanggal_pesan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tanggal_keberangkatan` date DEFAULT NULL,
  `lokasi_jemput` varchar(50) NOT NULL,
  `total_harga` double DEFAULT NULL,
  `jumlah_bus` int(11) NOT NULL,
  `total_bayar` double DEFAULT NULL,
  `status` enum('pending','dibayar','approve','cancel') NOT NULL DEFAULT 'pending',
  `bukti_bayar` varchar(150) DEFAULT NULL,
  `otp` varchar(10) DEFAULT NULL,
  `otp_confirm` tinyint(4) DEFAULT '0',
  `tanggal_bayar` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_user`, `id_bus`, `id_paket`, `nama_pemesanan`, `alamat`, `no_telp`, `tanggal_pesan`, `tanggal_keberangkatan`, `lokasi_jemput`, `total_harga`, `jumlah_bus`, `total_bayar`, `status`, `bukti_bayar`, `otp`, `otp_confirm`, `tanggal_bayar`) VALUES
(21, 5, 4, 9, 'obby istiyono', 'Banyuwangi , Muncar', '082257704121', '2020-11-30 13:12:13', '2020-12-04', 'Sd 5 Tapanrejo Muncar', 5000000, 0, NULL, 'approve', NULL, 'a16274', 1, NULL),
(22, 5, 5, 8, 'obby istiyono', 'Banyuwangi , Muncar', '082257704121', '2020-11-30 13:17:30', '2020-12-05', 'Sd 2 Belambangan', 0, 1, NULL, 'approve', NULL, 'cd3722', 1, NULL),
(23, 7, 4, 10, 'pamungkas', 'genteng', '081333282193', '2020-12-01 03:54:11', '2020-12-01', 'terminal banyuwangi', 0, 1, NULL, 'pending', NULL, '7cdfd1', 0, NULL),
(24, 7, 4, 11, 'pamungkas', 'genteng', '081333282193', '2020-12-01 03:59:10', '2020-12-01', 'terminal banyuwangi', 1000, 2, 1000, 'dibayar', 'bukti_bayar_24.PNG', 'ed0ebe', 1, '2020-11-30 21:59:10'),
(25, 7, 4, 13, 'pamungkas', 'genteng', '081333282193', '2020-12-19 02:42:16', '2020-12-19', 'genteng', 0, 2, NULL, 'pending', NULL, '3d1f1e', 0, NULL),
(26, 7, 4, 14, 'pamungkas', 'genteng', '081333282193', '2020-12-19 02:45:16', '2020-12-19', 'genteng', 0, 2, NULL, 'approve', NULL, 'aab650', 1, NULL),
(27, 7, 4, 15, 'pamungkas', 'genteng kopen', '081333282193', '2020-12-27 14:20:19', '2020-12-27', 'genteng', 0, 2, 0, 'dibayar', 'bukti_bayar_27.PNG', '890521', 1, '2020-12-27 08:20:19'),
(28, 7, 4, 16, 'pamungkas', 'genteng', '081333282193', '2021-01-15 08:27:57', '2021-01-15', 'genteng', 0, 2, NULL, 'pending', NULL, '6e4f31', 0, NULL),
(29, 7, 4, 17, 'pamungkas', 'genteng', '081333282193', '2021-01-15 08:30:13', '2021-01-15', 'genteng', 0, 3, NULL, 'approve', NULL, '16be8b', 1, NULL),
(30, 7, 4, 18, 'pamungkas', 'genteng', '081333282193', '2021-01-22 19:23:00', '2021-01-23', 'terminal banyuwangi', 0, 1, NULL, 'pending', NULL, '722edc', 0, NULL),
(31, 7, 4, 19, 'pamungkas', 'genteng', '081389485362', '2021-01-22 19:30:35', '2021-01-23', 'banyuwangi', 0, 2, NULL, 'pending', NULL, '53c60c', 0, NULL),
(32, 7, 5, 20, 'pamungkas', 'genteng', '081333282193', '2021-01-22 19:32:32', '2021-01-23', 'banyuwangi', 0, 1, NULL, 'pending', NULL, 'bb2fbd', 0, NULL),
(33, 7, 4, 21, 'pamungkas', 'genteng', '081333282193', '2021-01-22 19:34:36', '2021-01-24', 'banyuwangi', 0, 1, NULL, 'pending', NULL, 'e7ca7b', 0, NULL),
(34, 7, 4, 22, 'pamungkas', 'genteng', '081333282193', '2021-01-22 19:39:37', '2021-01-23', 'terminal banyuwangi', 0, 1, NULL, 'pending', NULL, 'ea7542', 0, NULL),
(35, 7, 4, 23, 'pamungkas', 'genteng', '081333282193', '2021-01-22 19:41:39', '2021-01-25', 'terminal banyuwangi', 0, 1, NULL, 'pending', NULL, 'e619bd', 0, NULL),
(36, 8, 5, 24, 'venard', 'surabaya', '081333282193', '2021-01-23 10:50:32', '2021-01-24', 'terminal banyuwangi', 0, 1, NULL, 'pending', NULL, '0e37a0', 0, NULL),
(37, 8, 5, 25, 'venard', 'surabaya', '081333282193', '2021-01-23 10:52:23', '2021-01-24', 'terminal banyuwangi', 0, 1, NULL, 'pending', NULL, 'be84f4', 0, NULL),
(38, 8, 5, 26, 'venard', 'surabaya', '081333282193', '2021-01-23 10:57:14', '2021-01-25', 'terminal banyuwangi', 0, 1, NULL, 'pending', NULL, '74ba7b', 0, NULL),
(39, 8, 4, 27, 'venard', 'surabaya', '081333282193', '2021-01-23 10:58:09', '2021-01-23', 'terminal banyuwangi', 0, 1, NULL, 'pending', NULL, '26216c', 0, NULL),
(40, 8, 4, 8, 'venard', 'surabaya', '22558796654', '2021-01-23 11:00:34', '2021-01-24', 'terminal banyuwangi', 0, 1, NULL, 'pending', NULL, 'fed79f', 0, NULL),
(41, 8, 4, 8, 'venard', 'surabaya', '081333282193', '2021-01-23 13:51:10', '2021-01-25', 'terminal banyuwangi', 1000000, 1, 1000000, 'dibayar', 'bukti_bayar_41.PNG', '8ed9a4', 1, '2021-01-23 07:51:10'),
(42, 7, 5, 28, 'pamungkas', 'genteng', '081333282193', '2021-01-23 13:53:39', '2021-01-23', 'terminal banyuwangi', 2000000, 1, 2000000, 'dibayar', 'bukti_bayar_42.PNG', '850e6e', 1, '2021-01-23 07:53:39'),
(43, 7, 5, 30, 'pamungkas', 'genteng', '081333282193', '2021-01-23 14:11:35', '2021-01-25', 'terminal banyuwangi', 0, 1, NULL, 'pending', NULL, '4dc365', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jenis_pengeluaran` varchar(150) DEFAULT NULL,
  `jumlah_biaya_pengeluaran` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `tanggal`, `jenis_pengeluaran`, `jumlah_biaya_pengeluaran`) VALUES
(1, '2020-08-02', 'Listrik', 100000),
(2, '2020-08-20', 'Air PDAM', 50000),
(3, '2020-08-20', 'Listrik', 100000),
(4, '2021-01-22', 'Ban Bocor', 10000),
(5, '2021-01-21', 'Service Bus', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `surat_tugas`
--

CREATE TABLE `surat_tugas` (
  `id_surat_tugas` int(11) NOT NULL,
  `id_pemesanan` int(11) DEFAULT NULL,
  `no_polisi` varchar(25) NOT NULL,
  `id_bus` int(11) DEFAULT NULL,
  `warna_bus` varchar(30) NOT NULL,
  `id_supir` int(11) DEFAULT NULL,
  `kernet` varchar(40) DEFAULT NULL,
  `uang_saku` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_tugas`
--

INSERT INTO `surat_tugas` (`id_surat_tugas`, `id_pemesanan`, `no_polisi`, `id_bus`, `warna_bus`, `id_supir`, `kernet`, `uang_saku`) VALUES
(4, 16, 'P 3241 AG', 5, 'Hitam', 6, 'Riyadi', 500000),
(5, 17, 'N 4562 PK', 4, 'Orange', 3, 'Gugun', 25000000),
(6, 26, 'P 12345 TG', 4, 'ungu', 3, 'gogon', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `level_user` enum('admin','penyewa','pemilik','supir') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `alamat`, `no_telp`, `username`, `password`, `level_user`) VALUES
(1, 'REVALDI', 'banyuwangi', '0210989098', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'ghozali', 'banyuwangi', '082257704121', 'pemilik', '21232f297a57a5a743894a0e4a801fc3', 'pemilik'),
(3, 'firman', 'banyuwangi', NULL, 'supir', '21232f297a57a5a743894a0e4a801fc3', 'supir'),
(4, 'sinta prastiwi', 'banyuwangi', '081230427660', 'sinta', '0cc175b9c0f1b6a831c399e269772661', 'penyewa'),
(5, 'obby istiyono', 'Banyuwangi , Muncar', '082257704121', 'obby', '98cd35fdafe033687c6523ddcd9974c0', 'penyewa'),
(6, 'Slamet', 'Banyuwangi , Muncar', '082141998431', 'slamet', 'c5a42d9667c760e1b7c064e25536e570', 'supir'),
(7, 'pamungkas', 'genteng', '081333282193', 'revaldi', 'fcaae88031c0a010f700da6ade559da8', 'penyewa'),
(8, 'venard', 'surabaya', '22558796654', 'veve', '6f12d5164b5f02f813af60bc0efc971c', 'penyewa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id_bus`);

--
-- Indexes for table `foto_bus`
--
ALTER TABLE `foto_bus`
  ADD PRIMARY KEY (`id_foto_bus`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  ADD PRIMARY KEY (`id_surat_tugas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id_bus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `foto_bus`
--
ALTER TABLE `foto_bus`
  MODIFY `id_foto_bus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  MODIFY `id_surat_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
