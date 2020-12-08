-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2020 at 04:28 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `sinopsis` varchar(500) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `nomor_pinjam` int(255) DEFAULT NULL,
  `nama_pinjam` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `cover`, `judul`, `slug`, `penulis`, `penerbit`, `sinopsis`, `created_at`, `updated_at`, `nomor_pinjam`, `nama_pinjam`, `status`) VALUES
(1, 'tfios.jpg', 'The fault In Our Star', 'the-fault-in-our-star', 'John Green', 'Gramedia', 'The Fault in Our Stars adalah novel keenam yang dikarang oleh penulis Amerika Serikat John Green. Novel ini mengisahkan tentang seorang pasien kanker berusia enam belas tahun bernama Hazel, yang dipaksa oleh orang tuanya untuk menghadiri kelompok pendukung, di mana dia kemudian bertemu dan jatuh cinta dengan Augustus Waters yang berusia tujuh belas tahun, seorang mantan pemain basket dan diamputasi.', NULL, '2020-12-07 16:57:31', 0, '', 1),
(2, 'mock.jpg', 'Mockingjay', 'mockingjay', 'Suzanne Collins', 'Gramedia Pustaka Utama', 'Mockingjay adalah sebuah novel fiksi ilmiah tahun 2010 yang dikarang oleh penulis asal Amerika Serikat, Suzanne Collins. Novel ini adalah seri ketiga dan terakhir dari trilogi The Hunger Games, setelah The Hunger Games (2008) dan Catching Fire (2009).', NULL, '2020-12-07 17:20:30', 0, '', 1),
(4, 'violet.jpg', 'Violet Bent Backwards over the Grass', 'violet-bent-backwards-over-the-grass', 'Lana Del Rey', 'Simon & Schuster', 'Violet Bent Backwards over the Grass is the debut book by American singer and songwriter Lana Del Rey', '2020-12-06 23:34:37', '2020-12-07 17:20:38', 0, '', 1),
(19, 'alice.jpg', 'Alice Adventures in Wonderland', 'alice-adventures-in-wonderland', 'Lewis Carroll', 'Gramedia', 'Alice\'s Adventures in Wonderland is an 1865 novel by English author Lewis Carroll. It tells of a young girl named Alice, who falls through a rabbit hole into a subterranean fantasy world populated by peculiar, anthropomorphic creatures. It is considered to be one of the best examples of the literary nonsense genre', '2020-12-07 10:14:10', '2020-12-07 18:26:08', 112213, 'jonathan', 0),
(29, 'nobook.jpg', 'Buku Budi', 'buku-budi', 'Budi', 'Budi', 'Ini Buku Budi', '2020-12-07 19:14:45', '2020-12-07 21:26:58', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_level` int(1) NOT NULL DEFAULT 2,
  `user_name` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_password` varchar(200) DEFAULT NULL,
  `user_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_level`, `user_name`, `user_email`, `user_password`, `user_created_at`) VALUES
(1, 1, 'admin', 'admin@gm.co', '$2y$10$PLlowVjWFJKiAMXPUPRHJ.TWxDBIYL/RYpd9xyfJ62Wpdd9NyP51S', '2020-12-07 07:59:01'),
(3, 2, 'asep', 'abc@gmail.com', '$2y$10$F67seDJAuPNPy/dYfc9tp.Vxvt.DhnC1icsfCZtnCgaN1d9wtvp6K', '2020-12-07 08:01:19'),
(4, 2, 'buds', 'buds@mail.com', '$2y$10$PXPFmINOjvp9ZV6W8KWRze2mlGmYAP6lZbZ/8if1Qd/u/hp27/40S', '2020-12-08 03:26:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
