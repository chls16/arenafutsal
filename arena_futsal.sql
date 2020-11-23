-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2020 at 02:20 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arena_futsal`
--

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE `airport` (
  `id` int(11) NOT NULL,
  `id_destination` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `iso` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`id`, `id_destination`, `name`, `iso`) VALUES
(1, 2, 'Halim Perdana Kusuma', 'HLP'),
(2, 2, 'Soekarno-Hatta', 'CGK'),
(3, 1, 'Husein Sastranegara', 'BDO'),
(4, 7, 'Achmad Yani', 'SRG'),
(5, 3, 'Juanda Airport', 'SUB'),
(6, 4, 'Adisumarmo Airport', 'SOC'),
(7, 6, 'Adisucipto', 'JOG'),
(8, 8, 'Sultan Iskandar Muda', 'BTJ'),
(9, 10, 'Radint Inten II Airport', 'TKG'),
(10, 5, 'Tunggul Wulung', 'CXP'),
(11, 9, 'Fatmawati-Soekarno Airport', 'BKS');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `noid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `id_users`, `name`, `noid`) VALUES
(1, 4, 'ilham', '213123213'),
(2, 4, 'nopia', '3213123'),
(3, 4, 'siti', '2321320'),
(4, 4, 'sinop', '30103012301'),
(5, 4, 'sinoptu', '132123121240');

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `id` int(11) NOT NULL,
  `lapangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`id`, `lapangan`) VALUES
(1, 'Bandung'),
(2, 'Jakarta'),
(3, 'Surabaya'),
(4, 'Solo'),
(5, 'Cilacap'),
(6, 'Yogyakarta'),
(7, 'Semarang'),
(8, 'Aceh'),
(9, 'Bengkulu'),
(10, 'Lampung');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(10) NOT NULL,
  `reservation_code` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `reservation_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `seat_code` varchar(10) NOT NULL,
  `rute_id` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `reservation_code`, `customer_id`, `reservation_date`, `seat_code`, `rute_id`, `status`) VALUES
(1, 'TOM28021', 1, '2018-02-28 01:50:54', '015', 6, 0),
(2, 'TOM28022', 2, '2018-02-28 01:50:54', '030', 6, 0),
(3, 'TOM28023', 3, '2018-02-28 02:10:04', '014', 6, 0),
(4, 'TOM28024', 4, '2018-02-28 02:52:27', '014', 5, 0),
(5, 'TOM28025', 5, '2018-02-28 02:52:27', '015', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `id` int(11) NOT NULL,
  `depart_at` datetime NOT NULL,
  `rute_from` varchar(50) NOT NULL,
  `rute_to` varchar(50) NOT NULL,
  `arrival` datetime NOT NULL,
  `price` varchar(13) NOT NULL,
  `id_transportation` varchar(13) NOT NULL,
  `creat_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`id`, `depart_at`, `rute_from`, `rute_to`, `arrival`, `price`, `id_transportation`, `creat_date`) VALUES
(1, '2018-02-28 07:00:00', '1', '7', '2018-02-28 08:00:00', '750000', '1', '2018-02-24 21:45:53'),
(2, '2018-02-28 08:00:00', '2', '7', '2018-02-28 08:55:00', '900000', '3', '2018-02-25 08:47:41'),
(3, '2018-02-28 18:00:00', '10', '1', '2018-02-28 19:05:00', '450000', '2', '2018-02-24 21:50:56'),
(4, '2018-02-28 19:00:00', '1', '6', '2018-02-28 20:15:00', '600000', '1', '2018-02-24 21:53:40'),
(5, '2018-02-28 18:00:00', '2', '6', '2018-02-28 19:55:00', '500000', '2', '2018-02-24 21:56:04'),
(6, '2018-02-28 01:00:00', '2', '6', '2018-02-28 02:00:00', '300000', '4', '2018-02-26 23:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `transportation`
--

CREATE TABLE `transportation` (
  `id` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(13) NOT NULL,
  `description` text NOT NULL,
  `seat_qty` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transportation`
--

INSERT INTO `transportation` (`id`, `img`, `name`, `code`, `description`, `seat_qty`) VALUES
(1, 'gi.png', 'Garuda Indonesia', 'GIA', 'Ini adalah pesawat perfect', 90),
(2, 'la.png', 'Lion Air', 'LNI', 'pesawat singa', 90),
(3, 'Logo+Citilink.png', 'CITILINK', 'CTV', 'best plane 2k18', 90),
(4, 'batik-air.png', 'Batik Air', 'BTK', 'Pesawat berbatik', 90);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `username`, `telepon`, `password`, `level`) VALUES
(8, 'Chelsea Ramadanti Anisah Putri', 'chelsea.rputri@gmail.com', 'chiii', '0897674668797', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(10, 'zainal', 'zainzain@gmail.com', 'zain', '089765675646', '81dc9bdb52d04dc20036dbd8313ed055', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reservation_code` (`reservation_code`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transportation`
--
ALTER TABLE `transportation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airport`
--
ALTER TABLE `airport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transportation`
--
ALTER TABLE `transportation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
