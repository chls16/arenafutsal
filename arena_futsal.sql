-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2020 pada 09.52
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id` int(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_booking` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_lapangan` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id`, `id_user`, `tanggal_booking`, `id_lapangan`, `status`) VALUES
(1, 1, '2018-02-28 01:50:54', 0, 0),
(2, 2, '2018-02-28 01:50:54', 0, 0),
(3, 3, '2018-02-28 02:10:04', 0, 0),
(4, 4, '2018-02-28 02:52:27', 0, 0),
(5, 5, '2018-02-28 02:52:27', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `noid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `id_users`, `name`, `noid`) VALUES
(1, 4, 'ilham', '213123213'),
(2, 4, 'nopia', '3213123'),
(3, 4, 'siti', '2321320'),
(4, 4, 'sinop', '30103012301'),
(5, 4, 'sinoptu', '132123121240');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lapangan`
--

CREATE TABLE `lapangan` (
  `id` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  `lapangan` varchar(255) NOT NULL,
  `harga` int(12) NOT NULL,
  `keterangan` enum('Siang','Malam') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lapangan`
--

INSERT INTO `lapangan` (`id`, `img`, `lapangan`, `harga`, `keterangan`) VALUES
(1, 'st.jpg', 'Sintetis 1', 60000, 'Siang'),
(2, 'st.jpg', 'Sintetis 2', 60000, 'Siang'),
(3, 'tr.jpg', 'Taraflex 1', 75000, 'Siang'),
(4, 'tr.jpg', 'Taraflex 2', 75000, 'Siang'),
(5, 'st.jpg', 'Sintetis 1', 75000, 'Malam'),
(6, 'st.jpg', 'Sintetis 2', 75000, 'Malam'),
(7, 'tr.jpg', 'Taraflex 1', 90000, 'Malam'),
(8, 'tr.jpg', 'Taraflex 2', 90000, 'Malam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tarif`
--

CREATE TABLE `tarif` (
  `id` int(11) NOT NULL,
  `id_lapangan` int(11) NOT NULL,
  `harga` varchar(13) NOT NULL,
  `keterangan` enum('Siang','Malam') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tarif`
--

INSERT INTO `tarif` (`id`, `id_lapangan`, `harga`, `keterangan`) VALUES
(1, 1, '60000', 'Siang'),
(2, 2, '60000', 'Siang'),
(3, 3, '75000', 'Siang'),
(4, 4, '75000', 'Siang'),
(5, 1, '75000', 'Malam'),
(6, 2, '75000', 'Malam'),
(7, 3, '90000', 'Malam'),
(8, 4, '90000', 'Malam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `username`, `telepon`, `password`, `level`) VALUES
(1, 'Zainal Abidin', 'admin@admin.com', 'admin', '088814214', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'Chelsea Ramadanti Anisah Putri', 'chelsea.rputri@gmail.com', 'chiii', '0897674668797', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(3, 'DavidB', 'david@gmail.com', 'david1', '098', '5ff84c7646419ffeb65cb5625de99723', 0),
(4, 'zainal', 'zainzain@gmail.com', 'zain', '089765675646', '81dc9bdb52d04dc20036dbd8313ed055', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD UNIQUE KEY `id_user_2` (`id_user`),
  ADD KEY `id_lapangan` (`id_lapangan`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lapangan` (`id_lapangan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
