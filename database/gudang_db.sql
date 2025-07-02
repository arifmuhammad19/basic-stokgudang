-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Feb 2024 pada 14.48
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudang_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id` int(11) NOT NULL,
  `kode` varchar(16) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id`, `kode`, `nama`, `harga`, `stok`) VALUES
(11, 'KD01', 'Coffe Beans', 50000, 50),
(12, 'KD02', 'Susu GreenFields', 55000, 30),
(13, 'KD03', 'Susu Bubuk Krimer', 60000, 12),
(14, 'KD04', 'Gelas Plastik', 20000, 300),
(15, 'KD06', 'Sedotan', 45000, 1000),
(16, 'KD07', 'Gula Aren', 15000, 500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keluar`
--

CREATE TABLE `tb_keluar` (
  `id` int(11) NOT NULL,
  `kode` varchar(16) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_keluar`
--

INSERT INTO `tb_keluar` (`id`, `kode`, `tanggal`, `jumlah`) VALUES
(6, 'KD02', '2020-08-19', 3),
(7, 'KD06', '2024-02-10', 5),
(8, 'KD07', '2024-02-10', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_masuk`
--

CREATE TABLE `tb_masuk` (
  `id` int(11) NOT NULL,
  `kode` varchar(16) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_masuk`
--

INSERT INTO `tb_masuk` (`id`, `kode`, `tanggal`, `jumlah`) VALUES
(46, 'KD01', '2020-08-13', 3),
(47, 'KD02', '2020-08-19', 10),
(48, 'KD06', '2024-02-10', 10),
(49, 'KD06', '2024-02-10', 11),
(50, 'KD07', '2024-02-10', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_toko`
--

CREATE TABLE `tb_toko` (
  `id` int(11) NOT NULL,
  `pemilik` varchar(256) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(16) NOT NULL,
  `email` varchar(256) NOT NULL,
  `instagram` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_toko`
--

INSERT INTO `tb_toko` (`id`, `pemilik`, `nama`, `alamat`, `telp`, `email`, `instagram`) VALUES
(1, 'Urip Nursalim', 'Pilona coffe', 'Jl. Klp. Gading Bar. No.22 Blok AG.15, Gading, Kec. Serpong, Kabupaten Tangerang, Banten 15810', '081997745662', 'KOPIUNTUKMU@pilonacoffe.com', '@pionacoffee');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `foto` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `nama`, `foto`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'avatar.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode` (`kode`);

--
-- Indeks untuk tabel `tb_keluar`
--
ALTER TABLE `tb_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `KODE02` (`kode`);

--
-- Indeks untuk tabel `tb_masuk`
--
ALTER TABLE `tb_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `KODE01` (`kode`);

--
-- Indeks untuk tabel `tb_toko`
--
ALTER TABLE `tb_toko`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_keluar`
--
ALTER TABLE `tb_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_masuk`
--
ALTER TABLE `tb_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `tb_toko`
--
ALTER TABLE `tb_toko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_keluar`
--
ALTER TABLE `tb_keluar`
  ADD CONSTRAINT `KODE02` FOREIGN KEY (`kode`) REFERENCES `tb_barang` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_masuk`
--
ALTER TABLE `tb_masuk`
  ADD CONSTRAINT `KODE01` FOREIGN KEY (`kode`) REFERENCES `tb_barang` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
