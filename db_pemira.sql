-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2021 at 04:37 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pemira`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kandidat`
--

CREATE TABLE `tb_kandidat` (
  `id_kandidat` int(2) NOT NULL,
  `nama_ketua` varchar(100) NOT NULL,
  `nama_wakil` varchar(100) NOT NULL,
  `foto_paslon` varchar(100) NOT NULL,
  `visi` varchar(500) NOT NULL,
  `misi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kandidat`
--

INSERT INTO `tb_kandidat` (`id_kandidat`, `nama_ketua`, `nama_wakil`, `foto_paslon`, `visi`, `misi`) VALUES
(1, 'Ari Purwanto', 'Ikbal Hambali', '52051097_2096889773697435_5756621602577973248_n.jpg', 'Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau presentasi visual seperti font, tipografi, dan tata letak.', 'Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau presentasi visual seperti font, tipografi, dan tata letak.'),
(2, 'Heri', 'Heru', '62106950_2270216526364758_618928766156013568_n.jpg', 'Salam', 'Kenal');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemilih`
--

CREATE TABLE `tb_pemilih` (
  `id_pemilih` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ktm` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('Administrator','Petugas','Pemilih') NOT NULL,
  `status` enum('1','0') NOT NULL,
  `jenis` enum('PAN','PST') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `level`, `status`, `jenis`) VALUES
(1, 'Ariq Naufal Rabbani', 'Admin', 'Skiper85', 'Administrator', '1', 'PAN'),
(2, 'Alvin Marshall Saragih', '12170296', 'Pts-0221', 'Petugas', '1', 'PAN'),
(4, 'Ahmad Wahyudi', 'Ahmad', 'Pmr-0221', 'Pemilih', '0', 'PST'),
(5, 'Budi Setiawan', 'Budi', 'Pmr-0221', 'Pemilih', '1', 'PST'),
(6, 'Cahyo Wicaksono', 'Cahyo', 'Pmr-0221', 'Pemilih', '0', 'PST'),
(7, 'Ariq Naufal Rabbani', '12170454', 'Pmr-0221', 'Pemilih', '1', 'PST');

-- --------------------------------------------------------

--
-- Table structure for table `tb_vote`
--

CREATE TABLE `tb_vote` (
  `id_vote` int(11) NOT NULL,
  `id_kandidat` int(2) NOT NULL,
  `id_pemilih` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_vote`
--

INSERT INTO `tb_vote` (`id_vote`, `id_kandidat`, `id_pemilih`, `date`) VALUES
(3, 1, 4, '2021-01-24 17:22:41'),
(4, 1, 6, '2021-02-20 21:02:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kandidat`
--
ALTER TABLE `tb_kandidat`
  ADD PRIMARY KEY (`id_kandidat`);

--
-- Indexes for table `tb_pemilih`
--
ALTER TABLE `tb_pemilih`
  ADD PRIMARY KEY (`id_pemilih`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_vote`
--
ALTER TABLE `tb_vote`
  ADD PRIMARY KEY (`id_vote`),
  ADD KEY `id_kandidat` (`id_kandidat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kandidat`
--
ALTER TABLE `tb_kandidat`
  MODIFY `id_kandidat` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pemilih`
--
ALTER TABLE `tb_pemilih`
  MODIFY `id_pemilih` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_vote`
--
ALTER TABLE `tb_vote`
  MODIFY `id_vote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
