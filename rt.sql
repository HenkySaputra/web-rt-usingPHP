-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2022 at 06:48 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rt`
--

-- --------------------------------------------------------

--
-- Table structure for table `kart_keluarga`
--

CREATE TABLE `kart_keluarga` (
  `kk_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_kk` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `jenis_pekerjaan` varchar(255) NOT NULL,
  `golongan_darah` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_rumah` int(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `tgl_buat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kart_keluarga`
--

INSERT INTO `kart_keluarga` (`kk_id`, `category_id`, `nama`, `no_kk`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `pendidikan`, `jenis_pekerjaan`, `golongan_darah`, `alamat`, `no_rumah`, `gambar`, `keterangan`, `status`, `tgl_buat`) VALUES
(55, 29, 'Henky Saputra ', '19203901203013 ', 'Wanita ', 'Sumber Sari Rt 2 ', '26-04-2001', 'Islam ', 'ada ', 'Wanita ', 'dwda ', 'adawda ', 100, 'berkas1649341914.JPG', 'ada', 1, '2022-04-07 14:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `email`, `username`, `alamat`, `password`) VALUES
(10, 'admin@gmail.com', 'admin', 'Rt 39 Lempake', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`category_id`, `category_name`) VALUES
(30, 'Anak-Anak'),
(34, 'Ibu-Ibu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kegiatan`
--

CREATE TABLE `tb_kegiatan` (
  `kegiatan_id` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `kegiatan_image` varchar(255) NOT NULL,
  `kegiatan_description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `tgl_buat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kegiatan`
--

INSERT INTO `tb_kegiatan` (`kegiatan_id`, `nama_kegiatan`, `kegiatan_image`, `kegiatan_description`, `status`, `tgl_buat`) VALUES
(41, 'Memencing Asik', 'gambar1645010726.png', 'Banyak Ikannya Asik', 1, '2022-02-16 11:25:26'),
(43, 'Perlomban 17  apa ya', 'berkas1648006072.png', 'Perlombaan asik pabji', 1, '2022-02-16 12:53:45');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `email`, `username`, `alamat`, `password`) VALUES
(10, 'henkyoffline@gmail.com', 'Henky', 'Pramuka 5B', '81dc9bdb52d04dc20036dbd8313ed055'),
(11, 'indriyatulmufida26@gmail.com', 'Indri', 'Pramuka 5B', '827ccb0eea8a706c4c34a16891f84e7b'),
(12, 'henkyoffline@gmail.com', 'Henky', 'Pramuka 5B', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kart_keluarga`
--
ALTER TABLE `kart_keluarga`
  ADD PRIMARY KEY (`kk_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`kegiatan_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kart_keluarga`
--
ALTER TABLE `kart_keluarga`
  MODIFY `kk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  MODIFY `kegiatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
