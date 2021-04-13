-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2021 at 02:24 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_berita` varchar(20) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `keywords` text DEFAULT NULL,
  `status_berita` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `judul_gambar` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `id_produk`, `judul_gambar`, `gambar`, `tanggal_update`) VALUES
(1, 7, 'mama', 'Jellyfish.jpg', '2019-11-27 12:25:16'),
(2, 18, 'yakin', 'Desert.jpg', '2019-12-05 13:12:20'),
(4, 18, 'mama', 'Tulips8.jpg', '2019-12-09 04:13:13'),
(5, 1, 'aaaa', 'B612-2015-07-14-15-42-15.jpg', '2020-05-12 16:04:41'),
(6, 4, 'Lucca Black', '02.jpg', '2020-05-13 12:19:22'),
(7, 4, '3', '03.jpg', '2020-05-13 12:19:45'),
(8, 4, '4', '05.jpeg', '2020-05-13 12:20:04'),
(9, 12, 'Genta Trucker - Green', 'genta-trucker-green-1572428094-naEcq7ybPkKI.jpg', '2020-06-05 09:00:32'),
(10, 13, 'Gecco Jogger - Navy', 'gecco-jogger-navy-1572428306-ikmGHnM0qihC.jpg', '2020-06-05 09:05:13'),
(11, 13, 'Gecco Jogger - Navy', 'gecco-jogger-navy-1572428306-iYXAHmy7OEH0.jpg', '2020-06-05 09:05:25');

-- --------------------------------------------------------

--
-- Table structure for table `header_transaksi`
--

CREATE TABLE `header_transaksi` (
  `id_header_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `rekening_pelanggan` varchar(255) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `kurir` varchar(20) NOT NULL,
  `id_rekening` int(11) DEFAULT NULL,
  `tanggal_bayar` varchar(255) DEFAULT NULL,
  `nama_bank` varchar(255) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `urutan`, `tanggal_update`) VALUES
(13, 'sepatu', 'Sepatu', 1, '2020-05-12 04:58:34'),
(14, 'sandal', 'Sandal', 2, '2020-05-12 04:58:48'),
(15, 'baju', 'Baju', 3, '2020-05-12 04:59:04'),
(16, 'celana', 'Celana', 4, '2020-05-12 04:59:25'),
(17, 'tas', 'Tas', 5, '2020-05-12 04:59:40'),
(18, 'ransel', 'Ransel', 5, '2020-06-05 08:38:41'),
(19, 'masker', 'Masker', 6, '2020-06-05 08:51:59'),
(20, 'apparel-top', 'Apparel Top', 7, '2020-06-05 08:58:59'),
(21, 'apparel-bottom', 'Apparel Bottom', 8, '2020-06-28 04:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `namaweb` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `metatext` text DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `tagline`, `email`, `website`, `keywords`, `metatext`, `telepon`, `alamat`, `facebook`, `instagram`, `deskripsi`, `logo`, `icon`, `rekening_pembayaran`, `tanggal_update`) VALUES
(1, 'Republic', 'You Are Gantlemen', 'hidayatr1234@gmail.com', 'http://toko-online.com', 'republic, sepatu, fashion  ', 'ok             ', '082122222222', 'Kp. Baru', 'https://www.facebook.com/rahmat.hidayatt.779/', 'https://www.instagram.com/hidayat_r78/', ' Republic berawal dari mimpi seorang anak muda yang gelisah melihat banyaknya brand fashion yang melakukan mark up harga terlalu tinggi sehingga membuat harga tidak terjangkau, sehingga terciptalah cita - cita menciptakan solusi tampil tampan dengan harga terjangkau bagi pria pria muda Indonesia. Dimulai dari pertengahan tahun 2014 dengan sangat sederhana dan hanya bermodalkan keberanian, Republic hadir membawa misi untuk ikut bertanggung jawab menjadikan setiap pria Indonesia memiliki sikap gentlemen dengan konten - konten edukasi pria di berbagai media sosialnya dan jurnal Republic di website. Inilah 3 value utama dari brand Republic yang ingin disampaikan ke setiap gentlemen seluruh Indonesia. Menjadi brand yang dipercaya oleh setiap stakeholders internal dan eksternal kami (trustworthy), memberikan informasi dan edukasi sebagai seorang pria (gentlemen) dan merasakan pengalaman berbeda memiliki produk terbaik negeri dengan kombinasi estetika dan kenyamanan (prestigious). ', 'gambar.png', 'logo881.jpg', 'ok             ', '2021-04-13 12:23:41');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telepon` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pesan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(125) NOT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `provinsi` varchar(125) NOT NULL,
  `kota` varchar(128) NOT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_user`, `status_pelanggan`, `nama_pelanggan`, `email`, `password`, `telepon`, `alamat`, `provinsi`, `kota`, `tanggal_daftar`, `tanggal_update`) VALUES
(12, 0, 'Pending', 'Rahmat Hidayat', 'hidayatr1234@gmail.com', '05f8df4b609c688ad99f7dfd1bba518fdb4b7ec9', '082122222222', ' Kp. Baru Suksel, Kebon Jeruk, Jakarta Barat', '', '', '2021-04-13 14:19:35', '2021-04-13 12:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `slug_produk` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `keywords` text DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `berat` float DEFAULT NULL,
  `ukuran` int(11) DEFAULT NULL,
  `status_produk` varchar(20) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_user`, `id_kategori`, `kode_produk`, `nama_produk`, `slug_produk`, `keterangan`, `keywords`, `harga`, `stok`, `gambar`, `berat`, `ukuran`, `status_produk`, `tanggal_post`, `tanggal_update`) VALUES
(4, 9, 17, 'Ta01', 'Lucca Black', 'lucca-black-ta01', '<h1><strong>Lucca Black hadir untuk para pria agar semakin Gantlemen&nbsp;</strong></h1>\r\n', ' tas pria, gantlemen  ', 250000, 992, '01.jpg', 0, 0, 'Publish', '2020-05-13 14:18:59', '2020-05-15 05:44:37'),
(8, 9, 18, 'Ran01', 'Backpack Kamo', 'backpack-kamo-ran01', '<p>Ransel Kece</p>\r\n', ' Ransel, tas', 200000, 1000, 'BACKPACK_KAMO_ransel.jpg', 10000, 0, 'Publish', '2020-06-05 10:41:49', '2020-06-05 08:41:49'),
(9, 9, 18, 'Ran02', 'Prosto Cream', 'prosto-cream-ran02', '<p>Mangstap</p>\r\n', ' tas', 210000, 1000, 'Tas_Ransel_Prosto_Cream_Tas_canvas_Backpack_Ta.jpg', 10000, 0, 'Publish', '2020-06-05 10:43:37', '2020-06-05 08:43:37'),
(11, 9, 19, 'Mas01', 'Masker The Republic', 'masker-the-republic-mas01', '<p>Masker 5 pcs</p>\r\n', ' masker', 60000, 10000, 'masker.jpg', 200, 0, 'Publish', '2020-06-05 10:53:30', '2020-06-05 08:53:30'),
(12, 9, 20, 'Top01', 'Genta Trucker - Green', 'genta-trucker-green-top01', '<p>mantap</p>\r\n', ' sdfasdf', 220000, 998, 'Genta_trucker_green.jpg', 500, 0, 'Publish', '2020-06-05 11:00:08', '2020-06-30 05:01:56'),
(13, 14, 21, 'Bot01', 'Gecco Jogger - Navyi', 'gecco-jogger-navyi-bot01', '<p>Gokil</p>\r\n', ' celana ', 180000, 1000, 'gecco-jogger-navy-1572428305-vHgMH50yqpR8.jpg', 500, 0, 'Publish', '2020-06-05 11:04:56', '2020-06-28 04:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `nomor_rekening`, `nama_pemilik`, `gambar`, `tanggal_post`) VALUES
(3, 'BCA', '3974111999', 'Rahmat Hidayat', NULL, '2021-04-13 12:21:45');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `kurir` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_pelanggan`, `kode_transaksi`, `id_produk`, `harga`, `kurir`, `jumlah`, `total_harga`, `tanggal_transaksi`, `tanggal_update`) VALUES
(14, 0, 11, '13052020UIETOLUF', 3, 20000, '0', 1, 20000, '2020-05-13 00:00:00', '2020-05-13 06:32:08'),
(16, 0, 11, '13052020ZB7ZPJUN', 3, 20000, '0', 1, 20000, '2020-05-13 00:00:00', '2020-05-13 07:06:09'),
(17, 0, 11, '13052020ZIBTGDUF', 3, 20000, '0', 2, 40000, '2020-05-13 00:00:00', '2020-05-13 11:38:37'),
(18, 0, 11, '130520205MJ9PCFH', 4, 250000, '0', 1, 250000, '2020-05-13 00:00:00', '2020-05-13 12:36:20'),
(19, 0, 11, '13052020I3SU2XZY', 4, 250000, '0', 1, 250000, '2020-05-13 00:00:00', '2020-05-13 12:39:06'),
(20, 0, 11, '14052020APCIPZVL', 6, 20000, '0', 1, 20000, '2020-05-14 00:00:00', '2020-05-14 07:28:23'),
(21, 0, 11, '14052020V4RN2IRL', 5, 20000, '0', 1, 20000, '2020-05-14 00:00:00', '2020-05-14 07:38:52'),
(22, 0, 11, '14052020V4RN2IRL', 4, 250000, '0', 1, 250000, '2020-05-14 00:00:00', '2020-05-14 07:38:52'),
(23, 0, 11, '14052020BRF3AQME', 4, 250000, '0', 1, 250000, '2020-05-14 00:00:00', '2020-05-14 07:46:45'),
(24, 0, 11, '14052020NRBKTSU0', 4, 250000, '0', 2, 500000, '2020-05-14 00:00:00', '2020-05-14 08:14:13'),
(25, 0, 11, '14052020IZV14N69', 4, 250000, '0', 1, 250000, '2020-05-14 00:00:00', '2020-05-14 08:51:42'),
(26, 0, 11, '14052020AN4U61P9', 6, 20000, '0', 7, 140000, '2020-05-14 00:00:00', '2020-05-14 09:16:47'),
(27, 0, 11, '15052020BMSDVJCO', 4, 250000, '0', 1, 250000, '2020-05-15 00:00:00', '2020-05-15 05:44:37'),
(28, 0, 11, '02062020BAWHT14E', 5, 20000, '0', 1, 20000, '2020-06-02 00:00:00', '2020-06-02 12:54:25'),
(29, 0, 11, '05062020XAL41ERN', 5, 20000, '0', 1, 20000, '2020-06-05 00:00:00', '2020-06-05 07:02:05'),
(30, 0, 11, '05062020K80HPONO', 5, 20000, 'pos', 1, 20000, '2020-06-05 00:00:00', '2020-06-05 07:03:31'),
(31, 0, 11, '05062020BJKK4CMA', 5, 20000, 'jne', 1, 20000, '2020-06-05 00:00:00', '2020-06-05 07:18:46'),
(32, 0, 11, '050620207PKNUBNA', 5, 20000, 'POS', 1, 20000, '2020-06-05 00:00:00', '2020-06-05 07:24:29'),
(33, 0, 11, '06062020JO0BDJAV', 12, 220000, 'POS', 1, 220000, '2020-06-06 00:00:00', '2020-06-06 05:59:48'),
(34, 0, 11, '30062020WBEOAH5I', 12, 220000, 'JNE', 1, 220000, '2020-06-30 00:00:00', '2020-06-30 05:01:56');

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `transaksi_barang` BEFORE INSERT ON `transaksi` FOR EACH ROW BEGIN
	UPDATE produk SET stok=stok-NEW.jumlah
    WHERE id_produk=NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(125) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `tanggal_update`) VALUES
(14, 'admin', 'admin@gmail.com', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin', '2020-05-15 06:39:20'),
(15, 'Rahmat Hidayat', 'Hidayatr1234@gmail.com', 'pangestujava', '05f8df4b609c688ad99f7dfd1bba518fdb4b7ec9', 'Admin', '2021-04-13 12:16:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD PRIMARY KEY (`id_header_transaksi`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`),
  ADD UNIQUE KEY `nomor_rekening` (`nomor_rekening`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  MODIFY `id_header_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
