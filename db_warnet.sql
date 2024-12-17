-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 17, 2024 at 05:27 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_warnet`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_sewa`
--

CREATE TABLE `jenis_sewa` (
  `id` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jenis_sewa`
--

INSERT INTO `jenis_sewa` (`id`, `nama`, `harga`) VALUES
(1, 'Warnet RTX 2050', 8000),
(2, 'Warnet RTX 3090', 15000),
(3, 'Warnet RTX 4090', 20000),
(4, 'PlayStaion 2', 5000),
(5, 'PlayStaion 3', 10000),
(6, 'PlayStaion 4', 15000),
(7, 'PlayStaion 5', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `user_id`, `message`, `is_read`) VALUES
(7, 5, 'BUDIANNOR telah melakukan penyewaan dengan jenis penyewaan Warnet RTX 2050', 1),
(8, 5, 'BUDIANNOR telah melakukan penyewaan dengan jenis penyewaan Warnet RTX 2050', 1),
(9, 7, 'UDIN telah melakukan penyewaan dengan jenis penyewaan PlayStaion 4', 1),
(10, 6, 'ADMIN telah melakukan penyewaan dengan jenis penyewaan Warnet RTX 2050', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` int NOT NULL,
  `jenis_sewa_id` int NOT NULL,
  `user_id` int NOT NULL,
  `no_telp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tanggal_waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `durasi` int NOT NULL,
  `total_harga` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `jenis_sewa_id`, `user_id`, `no_telp`, `tanggal_waktu`, `durasi`, `total_harga`) VALUES
(19, 1, 5, '312312', '2024-12-17 15:58:36', 1, 8000),
(20, 5, 7, '123', '2024-12-17 17:06:06', 5, 50000),
(21, 1, 6, '123123', '2024-12-17 17:17:38', 1, 8000);

--
-- Triggers `rentals`
--
DELIMITER $$
CREATE TRIGGER `after_insert_rentals` AFTER INSERT ON `rentals` FOR EACH ROW BEGIN
-- isi pesan notifikasi "nama_user telah melakukan penyewaan dengan jenis penyewaaan jenis_sewa_id pada waktu tanggal_waktu lalu"
INSERT INTO notifikasi (user_id, message) VALUES (NEW.user_id, CONCAT((SELECT name FROM users WHERE id = NEW.user_id), ' telah melakukan penyewaan dengan jenis penyewaan ', (SELECT nama FROM jenis_sewa WHERE id = NEW.jenis_sewa_id)));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Admin','User') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `role`) VALUES
(5, 'budi', 'BUDIANNOR', '$2y$10$ReibtQOXZwSsi66k/2gRHuJcjGQovNH2fkP.xQ6UODGdbvmo2KWvO', 'User'),
(6, 'admin', 'ADMIN', '$2y$10$ZDh78mcpNDzqw8b1JgKxOOKkg/73yV0jG28lKBCT16TfJXxABdFuO', 'Admin'),
(7, 'udin', 'UDIN', '$2y$10$8hfpFujMirjV6JZPMiVZ/uo7c4os0LZqiCp9wIExaqzD86cQhUv0a', 'User'),
(8, 'ganteng', 'gua ganteng', '$2y$10$wmEkDF.pL4aJZIjXcx9dj.YpU8FeX9PsQYUxSoOEbsc2Va.TIEWvG', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_sewa`
--
ALTER TABLE `jenis_sewa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `jenis_sewa_id` (`jenis_sewa_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_sewa`
--
ALTER TABLE `jenis_sewa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rentals_ibfk_2` FOREIGN KEY (`jenis_sewa_id`) REFERENCES `jenis_sewa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
