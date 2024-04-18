-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2024 at 08:17 PM
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
-- Database: `coba`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `nama`, `deskripsi`, `tanggal`, `user_id`) VALUES
(1, 'makan', 'makan makan', '2024-02-20', 1),
(2, 'minum', 'minum minum', '2024-02-20', 1),
(3, 'lari', 'lari lari', '2024-02-20', 2),
(4, 'asik', 'aja', '2024-02-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cobatabel`
--

CREATE TABLE `cobatabel` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `namaLengkap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cobatabel`
--

INSERT INTO `cobatabel` (`id`, `user`, `pw`, `email`, `alamat`, `namaLengkap`) VALUES
(2, 'ahmad', 'aja', 'a@a.a', 'bayur', 'ahamdaja'),
(3, 'ahmad', 'ahmad', 'ahmad@a.a', 'bayur', 'ahmadaja'),
(4, 'moyong', 'moyong', 'moyong@yul.cheon', 'moyong family', 'moyong yul-cheon'),
(5, 'anjay', 'anjay', 'anjay@a.a', 'anjay', 'anjay');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `album_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id`, `nama`, `url`, `deskripsi`, `tanggal`, `album_id`, `user_id`) VALUES
(28, 'download (1).jpg', '../uploads/download (1).jpg', 'uduk gurih wangi\r\n', '2024-03-22', 1, 3),
(29, 'download (2).jpg', '../uploads/download (2).jpg', 'seger kali bos', '2024-03-22', 2, 3),
(30, 'download (3).jpg', '../uploads/download (3).jpg', 'sepatu lari keren', '2024-03-22', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `komen`
--

CREATE TABLE `komen` (
  `id` int(11) NOT NULL,
  `gambar_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `komen` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komen`
--

INSERT INTO `komen` (`id`, `gambar_id`, `user_id`, `komen`, `tanggal`) VALUES
(1, 3, 0, 'halo', '2024-02-21'),
(2, 3, 0, 'halo', '2024-02-21'),
(3, 3, 0, 'oo', '2024-02-21'),
(4, 3, 1, 'asjak', '2024-02-21'),
(5, 4, 1, 'keren', '2024-02-21'),
(6, 21, 1, 'hai', '2024-02-21'),
(7, 21, 1, 'ganteng', '2024-02-21'),
(8, 25, 2, 'halo', '2024-02-21'),
(9, 23, 2, 'halo', '2024-02-21'),
(10, 25, 2, 'hai', '2024-02-21'),
(11, 23, 1, 'iii', '2024-02-21'),
(12, 28, 3, 'kelaz sir', '2024-03-22'),
(13, 29, 3, 'ngiler', '2024-03-22'),
(14, 30, 3, 'harga berapa mas', '2024-03-22'),
(15, 24, 3, 'sett', '2024-03-22'),
(16, 30, 1, 'bisa cod ga mas', '2024-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `likefoto`
--

CREATE TABLE `likefoto` (
  `id` int(11) NOT NULL,
  `gambar_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likefoto`
--

INSERT INTO `likefoto` (`id`, `gambar_id`, `user_id`, `tanggal`) VALUES
(1, 3, 1, '2024-02-20'),
(2, 3, 0, '2024-02-21'),
(3, 4, 1, '2024-02-21'),
(4, 7, 1, '2024-02-21'),
(5, 21, 1, '2024-02-21'),
(6, 25, 2, '2024-02-21'),
(7, 23, 2, '2024-02-21'),
(8, 24, 2, '2024-02-21'),
(9, 23, 1, '2024-02-21'),
(10, 25, 3, '2024-03-22'),
(11, 28, 3, '2024-03-22'),
(12, 29, 3, '2024-03-22'),
(13, 30, 3, '2024-03-22'),
(14, 30, 1, '2024-03-22'),
(15, 30, 2, '2024-04-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cobatabel`
--
ALTER TABLE `cobatabel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_id` (`album_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `komen`
--
ALTER TABLE `komen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gambar_id` (`gambar_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gambar_id` (`gambar_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cobatabel`
--
ALTER TABLE `cobatabel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `komen`
--
ALTER TABLE `komen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
