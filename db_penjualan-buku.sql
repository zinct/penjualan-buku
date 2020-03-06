-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2020 at 03:42 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penjualan-buku`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id` int(11) NOT NULL,
  `nama_buku` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `harga` int(100) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id`, `nama_buku`, `image`, `harga`, `stok`) VALUES
(24, 'The Ultimate Book Of Recipes', 'buku1.png', 87000, 2),
(25, 'Smartest Children In The History', 'buku2.png', 328000, 2),
(26, 'Elizabeth &amp; Jude', 'buku3.png', 142000, 7),
(27, 'The World Of Abstract Art', 'buku4.png', 213000, 5),
(28, 'The World Blue\'s', 'buku5.png', 24000, 2),
(29, 'Stolen Moon', 'buku6.png', 152000, 4),
(30, 'Food Journal', 'buku7.png', 310000, 1),
(31, 'Memories Of Sea', 'buku8.png', 98000, 12),
(32, 'The Girl\'s Playground', 'buku9.png', 142000, 13),
(33, 'Spark', 'buku10.png', 320000, 0),
(34, 'Success From Small Bussines', 'buku11.png', 132000, 9),
(35, 'Tokyo on Foot', 'buku12.png', 428000, 1),
(36, 'The Wall Of Nationality', 'buku13.png', 86000, 14),
(37, 'The End Of Food', 'buku14.png', 184000, 4),
(38, 'Harper Life', 'buku15.png', 345000, 1),
(39, 'The Brief Of History', 'buku16.png', 215000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `id` int(11) NOT NULL,
  `pendapatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_laporan`
--

INSERT INTO `tb_laporan` (`id`, `pendapatan`) VALUES
(21, '320000'),
(22, '345000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `pemesanan_id` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kode_pos` varchar(100) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `is_success` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`pemesanan_id`, `nama_pelanggan`, `user_id`, `telp`, `alamat`, `kode_pos`, `buku_id`, `jumlah_buku`, `kode_transaksi`, `bukti_pembayaran`, `is_success`) VALUES
(29, 'Upi DKV 2', 8, '085321757616', 'Bandung, Jln, Sadang', '56231', 33, 1, '85E23EF1128648', 'CVSYCxOUYAAzwV4.jpg', 1),
(32, 'David Fadlillah', 9, '085321757616', 'Bandung, Ducil', '56231', 38, 1, '95E2DA0E197796', '6-0.jpg', 1),
(33, 'David Fadlillah', 9, '085321757616', 'Bandung, Ducil', '56231', 36, 3, '95E2DA10BAE133', 'images.jpg', 2),
(34, 'Zinct_gaming', 9, '085321757616', 'Bandung, Ducil', '56231', 29, 2, '95E2DA156BDA01', 'struk_belanja.jpg', 2),
(35, 'Upi DKV 2', 8, '085321757616', 'Bandung', '56231', 32, 1, '85E2DA1B6BD651', '', 3),
(36, 'Upi DKV 2', 8, '085321757616', 'Bandung', '56231', 34, 1, '85E2DA1C7D17DC', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama_user`, `email`, `password`, `role_id`) VALUES
(4, 'Indra Mahesa', 'indramahesa128@gmail.com', '$2y$10$8/5.GfTOQOCKN/5CdMxxzeeV5FY.EePRSANfvKfDgrWN.RebRLt1e', 1),
(8, 'luthfiyyah Jummanisa Firdaus', 'shyreenupi30@gmail.com', '$2y$10$ccNlfsc2dVgfuJE4nELjieijvRQpg5JW2.QqRdU50IE5kfCan1.IC', 2),
(9, 'david fadlillah', 'David123@gmail.com', '$2y$10$aWLqN89o3V/6DmVR94p2POzVFzufPcqLjgmOz1LmJ1VJ0lEAu9BeC', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD PRIMARY KEY (`pemesanan_id`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  MODIFY `pemesanan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
