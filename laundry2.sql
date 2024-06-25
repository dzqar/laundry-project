-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2023 at 03:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_bahan`
--

CREATE TABLE `tbl_data_bahan` (
  `id_bahan` int(11) NOT NULL,
  `nama_bahan` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `status` enum('Tersedia','Habis') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_data_bahan`
--

INSERT INTO `tbl_data_bahan` (`id_bahan`, `nama_bahan`, `stok`, `status`) VALUES
(1, 'Parfum', 94, 'Tersedia'),
(2, 'Deterjen', 29, 'Tersedia'),
(5, 'Rinso', 6, 'Tersedia'),
(6, 'Pemutih', 20, 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_metode`
--

CREATE TABLE `tbl_data_metode` (
  `id_data_metode` int(11) NOT NULL,
  `id_metode` int(11) NOT NULL,
  `nama_data_metode` varchar(50) NOT NULL,
  `estimasi` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_data_metode`
--

INSERT INTO `tbl_data_metode` (`id_data_metode`, `id_metode`, `nama_data_metode`, `estimasi`, `harga`) VALUES
(1, 1, 'Cuci Biasa', 0, 0),
(2, 1, 'Cuci Kilat', 2, 7500),
(3, 2, 'Sendiri', 0, 0),
(4, 2, 'Antar - Jemput', 0, 3000),
(7, 3, 'Cash', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_layanan`
--

CREATE TABLE `tbl_layanan` (
  `id_layanan` int(50) NOT NULL,
  `nama_layanan` varchar(30) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `jenis_layanan` enum('Satuan','Kiloan') NOT NULL,
  `estimasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_layanan`
--

INSERT INTO `tbl_layanan` (`id_layanan`, `nama_layanan`, `harga`, `jenis_layanan`, `estimasi`) VALUES
(1, 'Cuci Saja / kg', 6000, 'Kiloan', 3),
(2, 'Kering Saja / kg', 6000, 'Kiloan', 3),
(3, 'Jas', 20000, 'Satuan', 3),
(8, 'Batik', 20000, 'Satuan', 3),
(11, 'Seprai', 15000, 'Satuan', 3),
(12, 'Sepatu', 35000, 'Satuan', 3),
(14, 'Tas', 35000, 'Satuan', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_metode`
--

CREATE TABLE `tbl_metode` (
  `id_metode` int(11) NOT NULL,
  `nama_metode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_metode`
--

INSERT INTO `tbl_metode` (`id_metode`, `nama_metode`) VALUES
(1, 'Pencucian'),
(2, 'Pengambilan'),
(3, 'Pembayaran');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesan`
--

CREATE TABLE `tbl_pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `nama_layanan` varchar(50) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `metode_pengambilan` varchar(50) NOT NULL,
  `metode_pencucian` varchar(50) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `tgl_pengambilan` date NOT NULL,
  `total_biaya` int(10) NOT NULL,
  `status` enum('Belum Diterima','Proses','Selesai','Batal','Transaksi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pesan`
--

INSERT INTO `tbl_pesan` (`id_pesan`, `id_kasir`, `id_customer`, `nama_layanan`, `jumlah`, `metode_pengambilan`, `metode_pencucian`, `tgl_pesan`, `tgl_pengambilan`, `total_biaya`, `status`) VALUES
(1, 2, 14, 'Sepatu', 2, 'Antar - Jemput', 'Cuci Kilat', '2023-12-03 21:08:46', '2023-12-07', 80500, 'Transaksi'),
(2, 2, 12, 'Kering Saja / kg', 1, 'Antar - Jemput', 'Cuci Kilat', '2023-12-03 21:19:33', '2023-12-04', 16500, 'Transaksi'),
(3, 2, 11, 'Batik', 3, 'Antar - Jemput', 'Cuci Kilat', '2023-12-03 21:22:26', '2023-12-10', 70500, 'Transaksi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `id_review` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pesan` int(11) NOT NULL,
  `review` text NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`id_review`, `id_user`, `id_pesan`, `review`, `rating`) VALUES
(1, 14, 1, 'Keren! Bintang 5 deh pokoknya di jasa laundry ini 😝', 5),
(2, 12, 2, 'Bener-bener tepat waktu 😯', 4),
(3, 11, 3, 'Seperti biasa, tepat waktu 😎', 5);

--
-- Triggers `tbl_review`
--
DELIMITER $$
CREATE TRIGGER `UPDATE STATUS TBL_TRANSAKSI` AFTER INSERT ON `tbl_review` FOR EACH ROW BEGIN
UPDATE tbl_transaksi SET status=4 WHERE id_pesan=NEW.id_pesan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `id_pesan` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `metode_pembayaran` varchar(40) NOT NULL,
  `total_biaya` int(10) NOT NULL,
  `status` enum('Proses','Selesai','Batal','Ulasan Diberikan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_kasir`, `id_pesan`, `id_customer`, `tgl_transaksi`, `metode_pembayaran`, `total_biaya`, `status`) VALUES
(1, 2, 1, 14, '2023-12-03 21:15:14', 'Cash', 80500, 'Ulasan Diberikan'),
(2, 2, 2, 12, '2023-12-03 21:19:57', 'Cash', 16500, 'Ulasan Diberikan'),
(3, 2, 3, 11, '2023-12-03 21:25:01', 'Cash', 70500, 'Ulasan Diberikan');

--
-- Triggers `tbl_transaksi`
--
DELIMITER $$
CREATE TRIGGER `UPDATE_STATUS_PESAN` AFTER INSERT ON `tbl_transaksi` FOR EACH ROW BEGIN
UPDATE tbl_pesan SET status=5 WHERE id_pesan=NEW.id_pesan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` enum('admin','manager','kasir','customer') NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `alamat`, `no_tlp`, `username`, `password`, `level`, `foto`) VALUES
(1, 'Kiki', 'asda', '41231', 'customer', '123', 'customer', 'default.png'),
(2, 'Rogi', 'Terminal', '123', 'kasir', '12345678', 'kasir', 'default.png'),
(3, 'Nabil', 'Depok', '088225778343', 'manager', '12345678', 'manager', 'default.png'),
(4, '', '', '', 'admin', '123', 'admin', 'default.png'),
(5, '', '', '', 'koko', '12345678', 'manager', 'default.png'),
(6, 'Dzaky Aditya Rahman', 'JAKARTA', '088225778343', 'zaki', '12345678', 'customer', 'default.png'),
(7, '', '', '', 'kasir2', '', 'kasir', 'default.png'),
(8, 'Mimi', 'Depok', '0128371923', 'mimi', '123', 'manager', 'default.png'),
(9, 'Raditya Meyka Harry Sandhiva', 'Depok', '085717828598', 'radit', '11', 'customer', 'default.png'),
(10, 'Cici', 'Depok', '52341', 'cici', '123', 'kasir', 'default.png'),
(11, 'Alfatiha', 'Depok', '0812768112', 'alfat', '12345678', 'customer', 'default.png'),
(12, 'Budi', 'Semarang', '31423462', 'buditabudi', '12345678', 'customer', 'default.png'),
(14, 'Ryan Gosling', 'Banten', '082937129323', 'Ryan', 'gosling123', 'customer', '1682681988_Picsart_23-12-02_22-30-53-470.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_data_bahan`
--
ALTER TABLE `tbl_data_bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `tbl_data_metode`
--
ALTER TABLE `tbl_data_metode`
  ADD PRIMARY KEY (`id_data_metode`);

--
-- Indexes for table `tbl_layanan`
--
ALTER TABLE `tbl_layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `tbl_metode`
--
ALTER TABLE `tbl_metode`
  ADD PRIMARY KEY (`id_metode`);

--
-- Indexes for table `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`id_review`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_data_bahan`
--
ALTER TABLE `tbl_data_bahan`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_data_metode`
--
ALTER TABLE `tbl_data_metode`
  MODIFY `id_data_metode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_layanan`
--
ALTER TABLE `tbl_layanan`
  MODIFY `id_layanan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_metode`
--
ALTER TABLE `tbl_metode`
  MODIFY `id_metode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
