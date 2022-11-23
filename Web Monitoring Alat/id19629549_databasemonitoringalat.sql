-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 23 Nov 2022 pada 10.27
-- Versi server: 10.5.16-MariaDB
-- Versi PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id19629549_databasemonitoringalat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat`
--

CREATE TABLE `alat` (
  `idalat` int(11) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `namaalat` varchar(200) NOT NULL,
  `gambar` varchar(1000) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `kondisi` varchar(200) NOT NULL,
  `tgldibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `alat`
--

INSERT INTO `alat` (`idalat`, `idkategori`, `nama`, `namaalat`, `gambar`, `deskripsi`, `kondisi`, `tgldibuat`) VALUES
(67, 13, 'George Marlissa', 'AWOS DISPLAY', 'produk/16PNWW3R6j4L6.jpg', 'aman sentosa', 'Aktif', '2022-11-15 18:15:28'),
(68, 13, 'George Marlissa', 'Campbell Stokes', 'produk/16R4S2jZmAyoE.jpg', 'Normal', 'Aktif', '2022-11-16 13:09:01'),
(69, 13, 'George Marlissa', 'PANCI PENGUAPAN', 'produk/16scgzySSIt86.jpg', 'Bagus sekali', 'Aktif', '2022-11-16 13:11:35'),
(70, 13, 'George Marlissa', 'SARS', 'produk/16piY6H4PXxIs.png', 'Normal', 'Aktif', '2022-11-16 13:13:11'),
(71, 13, 'George Marlissa', 'BAROMETER', 'produk/16u6xWIEijIEk.jpg', 'Normal dan bagus', 'Aktif', '2022-11-16 13:14:28'),
(72, 13, 'George Marlissa', 'PM10', 'produk/167GXITHqozfI.jpg', 'Baik dan berjalan dengan normal', 'Aktif', '2022-11-16 13:16:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int(11) NOT NULL,
  `namakategori` varchar(30) NOT NULL,
  `tgldibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`idkategori`, `namakategori`, `tgldibuat`) VALUES
(13, 'Teknisi', '2022-11-15 18:13:46'),
(15, 'Teknisi Udara', '2022-11-15 18:14:10'),
(16, 'Forcaster', '2022-11-15 18:14:43'),
(17, 'Observe', '2022-11-15 18:14:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `idkonfirmasi` int(11) NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL,
  `payment` varchar(10) NOT NULL,
  `namarekening` varchar(25) NOT NULL,
  `tglbayar` date NOT NULL,
  `tglsubmit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `userid` int(11) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgljoin` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(7) NOT NULL DEFAULT 'Member',
  `lastlogin` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`userid`, `namalengkap`, `email`, `password`, `notelp`, `alamat`, `tgljoin`, `role`, `lastlogin`) VALUES
(0, 'George Marlissa', 'Admin', '$2y$10$yCM.ocEGREJFHGL5D9W.g.KX5d6JBqXBtkHZvzgHhaw2WpueitB6i', '082199256040', 'Stasiun Kelas met 1 Deo Sorong', '2022-09-27 05:56:47', 'Admin', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`idalat`),
  ADD UNIQUE KEY `gambar` (`gambar`) USING HASH,
  ADD UNIQUE KEY `gambar_2` (`gambar`) USING HASH,
  ADD KEY `idkategori` (`idkategori`);
ALTER TABLE `alat` ADD FULLTEXT KEY `gambar_3` (`gambar`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indeks untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`idkonfirmasi`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alat`
--
ALTER TABLE `alat`
  MODIFY `idalat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alat`
--
ALTER TABLE `alat`
  ADD CONSTRAINT `idkategori` FOREIGN KEY (`idkategori`) REFERENCES `kategori` (`idkategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
