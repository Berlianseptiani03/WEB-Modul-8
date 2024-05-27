-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Waktu pembuatan: 17 Des 2023 pada 18.49
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teratai_pampang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_penyetoran`
--

CREATE TABLE `form_penyetoran` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `noInduk` varchar(255) NOT NULL,
  `tglPenyetoran` date NOT NULL,
  `jenisSampah` varchar(255) NOT NULL,
  `berat` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `form_penyetoran`
--

INSERT INTO `form_penyetoran` (`id`, `nama`, `noInduk`, `tglPenyetoran`, `jenisSampah`, `berat`, `total`) VALUES
(2, 'AlMursalat', '0088', '2023-12-26', 'plastik', 123445.00, 99999999.99);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_penyetoran`
--

CREATE TABLE `transaksi_penyetoran` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `noInduk` varchar(255) NOT NULL,
  `tglPenjualan` date NOT NULL,
  `koranKertas` double NOT NULL,
  `kardus` double NOT NULL,
  `botolPlastik` double NOT NULL,
  `gelasPlastik` double NOT NULL,
  `kaca` double NOT NULL,
  `plastikNonBotol` double NOT NULL,
  `aluminium` double NOT NULL,
  `kalengBesi` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi_penyetoran`
--

INSERT INTO `transaksi_penyetoran` (`id`, `nama`, `noInduk`, `tglPenjualan`, `koranKertas`, `kardus`, `botolPlastik`, `gelasPlastik`, `kaca`, `plastikNonBotol`, `aluminium`, `kalengBesi`, `total`) VALUES
(6, 'AlMursalat', '123', '2023-12-19', 1, 2, 3, 4, 5, 6, 7, 8, 36000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `form_penyetoran`
--
ALTER TABLE `form_penyetoran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi_penyetoran`
--
ALTER TABLE `transaksi_penyetoran`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `form_penyetoran`
--
ALTER TABLE `form_penyetoran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksi_penyetoran`
--
ALTER TABLE `transaksi_penyetoran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
