-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Waktu pembuatan: 15 Nov 2024 pada 06.45
-- Versi server: 8.0.35
-- Versi PHP: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan_masyarakat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `Pengaduan`
--

CREATE TABLE `Pengaduan` (
  `id_pengaduan` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `judul_pengaduan` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `status_pengaduan` enum('diajukan','diproses','selesai') DEFAULT 'diajukan',
  `tanggal_pengaduan` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `Pengaduan`
--

INSERT INTO `Pengaduan` (`id_pengaduan`, `id_user`, `judul_pengaduan`, `deskripsi`, `status_pengaduan`, `tanggal_pengaduan`) VALUES
(1, 2, 'sdsadasd', 'asdsadsadsa', 'selesai', '2024-11-13 07:22:36'),
(2, 2, 'bencana', '3rweqdsa', 'diproses', '2024-11-14 06:59:59'),
(3, 2, '3r2qwe', 'wqds', 'diproses', '2024-11-14 07:00:35'),
(4, 2, 'wqds', 'qewfsacxz', 'selesai', '2024-11-14 07:01:59'),
(5, 2, 'tooooo', 'ygfcgvhbnjk', 'diajukan', '2024-11-14 07:02:10'),
(6, 2, 'ij', 'wklmax,', 'selesai', '2024-11-14 07:03:48'),
(7, 2, '23rqfewsa', 'grefdvs', 'selesai', '2024-11-14 07:13:03'),
(8, 2, 'bencana', 'banjir bANDANG KAREN MASYARAKAT BANYAK YANG BUANG SAMPAH\r\n', 'selesai', '2024-11-14 07:26:31'),
(9, 2, 'JN', 'JNKML\r\n', 'selesai', '2024-11-14 07:26:47'),
(10, 2, 'kebakaran', 'banyak rumah yanng hancur', 'selesai', '2024-11-14 07:40:41'),
(11, 2, 'rwjegfndklms v,', 'kemfwlds;,cxz', 'selesai', '2024-11-15 02:10:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `User`
--

CREATE TABLE `User` (
  `id_user` int NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role` enum('public','admin') DEFAULT 'public'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `User`
--

INSERT INTO `User` (`id_user`, `nama`, `username`, `password`, `email`, `role`) VALUES
(1, 'Admin', 'admin', '$2y$10$gHOBGPqve0jrN3VqG4Z5Luy.ww6GvkdhxYIoFHnKyl.uTWoTdVzZe', 'admin@example.com', 'admin'),
(2, 'User Public', 'public', '$2y$10$.zMHeRzkqp1AgYQ4CEKFcepZc0xWaapt3wZZsJhLEzxNA11iIHB7q', 'public@example.com', 'public'),
(3, NULL, 'raihan nazhiif', '$2y$10$AMQFhTS7MkJJGvkbwiZxQ.ww9xn.3KoTgF3MR63VHkH6qGHUy3jvW', 'raihannazhiifyudhistira@gmail.com', 'public'),
(4, NULL, 'hyunbin', '$2y$10$FGzGud8l/KWYjXyRA2Q4iO9DLktj3wA1JFXWfGqKC2rLtnkT9wS52', 'raihannazhiifyudhistira@gmail.com', 'public'),
(5, NULL, '343er34klm', '$2y$10$GLH0Wg8MgCOpHkrU9FyX8u0LWK9B0Y5480X9wcGxGSvjjGQlKq2de', 'raihannazhiifyudhistira@gmail.com', 'public'),
(6, NULL, 'ewqfdSA', '$2y$10$Km4kwml34bpA29bVPiVy0.Sf/dD1Y.sJJwqWsiwTlB4fPIKn1fWMa', 'raihannazhiifyudhistira@gmail.com', 'public');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `Pengaduan`
--
ALTER TABLE `Pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `Pengaduan`
--
ALTER TABLE `Pengaduan`
  MODIFY `id_pengaduan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `User`
--
ALTER TABLE `User`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `Pengaduan`
--
ALTER TABLE `Pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `User` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
