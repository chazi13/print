-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 21, 2019 at 12:05 PM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `print`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `foto`, `username`, `password`) VALUES
(1, 'Administrator', 'assets/img/foto_profil/1560931285.png', 'admin', 'cbbb842e45cfca6aed3c902a59fd8a10');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE IF NOT EXISTS `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `jml_pesan` int(11) NOT NULL,
  `desain` tinyint(1) NOT NULL,
  `file` varchar(100) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `jml_pesan`, `desain`, `file`, `catatan`, `id_produk`, `id_transaksi`) VALUES
(1, 2, 1, 'upload/adi_purnomo/1560844817.png', 'papapapapa', 1, 1),
(2, 1, 1, 'upload/adi_purnomo/1560844839.png', 'kakakakakak', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `gambar`) VALUES
(1, 'Uncategorized', ''),
(5, 'Indoor', 'assets/img/produk/Indoor/kat-icon.png'),
(6, 'Outdoor', 'assets/img/produk/Outdoor/kat-icon.png'),
(7, 'Display', 'assets/img/produk/Display/kat-icon.png'),
(8, 'Digital A3', 'assets/img/produk/Digital A3/kat-icon.png'),
(9, 'T-Shirt', 'assets/img/produk/T-Shirt/kat-icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE IF NOT EXISTS `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `jml_pesan` int(11) NOT NULL,
  `desain` tinyint(1) NOT NULL DEFAULT '0',
  `file` varchar(100) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi_pembayaran`
--

CREATE TABLE IF NOT EXISTS `konfirmasi_pembayaran` (
  `id_konfirmasi` int(11) NOT NULL,
  `nama_bank` varchar(20) NOT NULL,
  `nama_akun` varchar(50) NOT NULL,
  `no_rek` varchar(20) NOT NULL,
  `file_bukti` varchar(100) NOT NULL,
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi_pembayaran`
--

INSERT INTO `konfirmasi_pembayaran` (`id_konfirmasi`, `nama_bank`, `nama_akun`, `no_rek`, `file_bukti`, `id_transaksi`) VALUES
(1, 'Mandiri', 'Adi Purnomo', '0124151212612', 'upload/bukti/pembayaran/1560852370.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE IF NOT EXISTS `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_prov` varchar(100) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `nama_kec` varchar(100) NOT NULL,
  `metode` enum('JNE REG','JNE YES') NOT NULL,
  `harga` decimal(10,0) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_prov`, `nama_kota`, `nama_kec`, `metode`, `harga`) VALUES
(1, 'DKI Jakarta', 'Kepulauan Seribu', 'Kepulauan Seribu Utara', 'JNE REG', '11000'),
(2, 'DKI Jakarta', 'Kepulauan Seribu', 'Kepulauan Seribu Utara', 'JNE YES', '15000'),
(5, 'DKI Jakarta', 'Jakarta Utara', 'Koja', 'JNE REG', '11000'),
(6, 'DKI Jakarta', 'Jakarta Utara', 'Koja', 'JNE YES', '15000'),
(7, 'DKI Jakarta', 'Kepulauan Seribu', 'Kepulauan Seribu Selatan', 'JNE REG', '11000'),
(8, 'DKI Jakarta', 'Kepulauan Seribu', 'Kepulauan Seribu Selatan', 'JNE YES', '15000'),
(9, 'Banten', 'Serang', 'Curug', 'JNE REG', '15000'),
(10, 'Banten', 'Serang', 'Curug', 'JNE YES', '18000'),
(11, 'Banten', 'Lebak', 'Cibadak', 'JNE REG', '13000'),
(12, 'Banten', 'Lebak', 'Cibadak', 'JNE YES', '16000'),
(13, 'Jawa Barat', 'Bogor', 'Bogor Timur', 'JNE REG', '13000');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `keterangan` text NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `gambar`, `harga`, `keterangan`, `id_kategori`) VALUES
(1, 'PAKET Roll Up Banner 60 x 160 (cm)', 'assets/img/produk/Display/1558668244.png.png', '212900', 'Albatros + Laminating + Display Stand Roll Up', 7),
(2, 'PAKET Pop Up Table', 'assets/img/produk/Display/1558668141.png.png', '2070000', 'Sticker + Laminating + Pop Up Table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE IF NOT EXISTS `testimoni` (
  `id_testi` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `pesan` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id_testi`, `tgl`, `pesan`, `status`, `id_user`) VALUES
(1, '2019-06-21 04:12:48', 'Hasil bagus, desain juga keren, thanks ya jasa cetak.', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(10) NOT NULL,
  `tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `metode_pengiriman` varchar(10) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `resi` varchar(20) DEFAULT NULL,
  `bukti_kirim` varchar(100) DEFAULT NULL,
  `total` decimal(10,0) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `tgl`, `metode_pengiriman`, `alamat`, `resi`, `bukti_kirim`, `total`, `status`, `id_user`) VALUES
(1, '#TRK-0001', '2019-06-18 15:02:32', 'jne_reg', '0', '21093530075131', 'upload/bukti/kirim/1560855563.png', '2624800', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL DEFAULT 'no-foto.png',
  `email` varchar(50) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `foto`, `email`, `telp`, `provinsi`, `kota`, `kecamatan`, `alamat`, `keterangan`, `password`) VALUES
(1, 'Adi Purnomo 1', 'foto-profil-adi-purnomo-1.png', 'adi.pur@mail.com', '0851217151', 'Banten', 'Lebak', 'Cibadak', 'Jl. Komjen.Pol.M.Jasin No.20, Tugu', '', 'c063064dd2c579fce5632b0ba39e8ccc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
