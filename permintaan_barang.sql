-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jul 2023 pada 11.03
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `permintaan_barang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_barang`
--

CREATE TABLE `data_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `volume` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_barang`
--

INSERT INTO `data_barang` (`id_barang`, `nama_barang`, `volume`, `satuan`, `keterangan`, `created_at`) VALUES
(10, 'asd', 2, 'sda', 'asd', '2023-07-21 03:02:47'),
(11, 'asdadas', 342, 'asd', 'dasdas', '2023-07-21 03:03:46'),
(12, 'suryaasd', 13, 'asd', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magni aut iste aliquam veritatis natus tempora nihil, reprehenderit illum, doloribus velit facilis dolor quod quibusdam accusantium? Sit, nostrum totam iste nihil fugit animi ad ut quae aperiam vel numquam dignissimos velit quis eum distinctio! Labore molestiae unde magnam officiis neque quaerat eveniet vel accusantium maxime ducimus! Suscipit qui, similique provident quis reprehenderit reiciendis natus quod quidem, laboriosam, totam corporis sequi nam officiis inventore magni illo expedita mollitia a fuga in eaque tempora magnam consequatur harum! Saepe tempore modi veniam! Iste eveniet molestias doloribus quod unde nemo perspiciatis ratione, quas nam nihil.', '2023-07-21 08:15:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`) VALUES
(19, 'surya', 'suryasaurus', '$2y$10$AEFm9//mdNgIL7kbsXoXse3sgKAtn1IYYK.fQGFfhWO38jOv9WrdW');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
