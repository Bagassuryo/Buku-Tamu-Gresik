-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Apr 2026 pada 03.00
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bukutamu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `USERNAME_ADMIN` varchar(50) NOT NULL,
  `PASSWORD` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`USERNAME_ADMIN`, `PASSWORD`) VALUES
('admin', '$2y$10$jCqinaDm73hqgrNMLmLJ9OoLZLC2eqto2g2/aWB0oTpr2x3rxiUMK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL,
  `LAYANAN` enum('BIDANG SIP','BIDANG SPBE','BIDANG TI','KEPALA DINAS KOMINFO','RADIO','SEKRETARIAT','SEKRETARIS DINAS KOMINFO') NOT NULL,
  `NAMA_TAMU` varchar(50) NOT NULL,
  `NO_HP` varchar(20) NOT NULL,
  `ASAL_INSTANSI` text NOT NULL,
  `KETERANGAN` text NOT NULL,
  `TANGGAL` date NOT NULL DEFAULT current_timestamp(),
  `DATANG` time NOT NULL DEFAULT current_timestamp(),
  `PULANG` time DEFAULT NULL,
  `FOTO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`ID_USER`, `LAYANAN`, `NAMA_TAMU`, `NO_HP`, `ASAL_INSTANSI`, `KETERANGAN`, `TANGGAL`, `DATANG`, `PULANG`, `FOTO`) VALUES
(1, 'SEKRETARIS DINAS KOMINFO', 'adipati nugroho indo kusumo', '111111111', 'UPN VETERAN JAWA TIMUR', 'asdwandbabdiuawhiohsjdabduiahusduadiwadhauh', '2026-04-01', '15:20:14', '12:35:39', 'coba.png'),
(2, 'BIDANG TI', 'smash', '111111111', 'gresik', 'bermain', '2026-04-01', '15:20:14', '12:35:39', 'coba.png'),
(3, 'BIDANG TI', 'smash', '111111111', 'gresik', 'bermain', '2026-04-01', '15:20:14', '12:35:39', 'coba.png'),
(4, 'BIDANG TI', 'smash', '111111111', 'gresik', 'bermain', '2026-04-01', '15:20:14', '12:35:39', 'coba.png'),
(5, 'BIDANG TI', 'smash', '111111111', 'gresik', 'bermain', '2026-04-01', '15:20:14', '12:35:39', 'coba.png'),
(6, 'BIDANG TI', 'smash', '111111111', 'gresik', 'bermain', '2026-04-01', '15:20:14', '12:35:39', 'coba.png'),
(7, 'BIDANG TI', 'smash', '111111111', 'gresik', 'bermain', '2026-04-01', '15:20:14', '12:35:39', 'coba.png'),
(8, 'BIDANG TI', 'smash', '111111111', 'gresik', 'bermain', '2026-04-01', '15:20:14', '12:35:39', 'coba.png'),
(9, 'BIDANG TI', 'smash', '111111111', 'gresik', 'bermain', '2026-04-01', '15:20:14', '12:35:39', 'coba.png'),
(10, 'BIDANG TI', 'smash', '111111111', 'gresik', 'bermain', '2026-04-01', '15:20:14', '12:35:39', 'coba.png'),
(11, 'BIDANG TI', 'smash', '111111111', 'gresik', 'bermain', '2026-04-01', '15:20:14', '12:35:39', 'coba.png'),
(12, 'BIDANG TI', 'smash', '111111111', 'gresik', 'bermain', '2026-04-01', '15:20:14', '12:35:39', 'coba.png'),
(13, 'RADIO', 'adipati nugroho indo kusumo', '812039284', 'surabaya lamongan gresik', 'mencoba kembali apa yang rusak', '2026-04-05', '00:00:00', '13:04:27', ''),
(14, 'BIDANG SPBE', 'Jiwo sujiwo', '2147483647', 'warung kopi ayam jago', 'mau memberikan ayam jago kecepatan wifi 1000000 mbps', '2026-04-09', '12:46:10', '13:06:32', ''),
(15, 'BIDANG SIP', 'as', '2147483647', 'asdawd', 'asd', '2026-04-09', '12:57:31', '13:06:11', 'foto_1775714251.png'),
(16, 'KEPALA DINAS KOMINFO', 'dwa', '2147483647', 'asd', 'daw', '2026-04-09', '12:57:48', '13:06:28', ''),
(17, 'BIDANG SIP', 'as', '2147483647', 'asd', 'adwa', '2026-04-09', '12:58:53', '13:06:20', 'foto_1775714333.png'),
(18, 'KEPALA DINAS KOMINFO', 'asdwa', '2147483647', 'as', 'sdw', '2026-04-09', '13:00:07', '13:06:24', 'foto_1775714407.png'),
(19, 'BIDANG SPBE', 'sujiwo jiwo', '2147483647', 'ayam jago', 'ngopi santuy', '2026-04-09', '13:14:30', '13:06:36', ''),
(20, 'KEPALA DINAS KOMINFO', 'sujiwo jiwo', '2147483647', 'ayam jago', 'jagojagojagojago', '2026-04-09', '13:20:49', '13:06:04', ''),
(21, 'BIDANG TI', '123', '2147483647', '123', '123', '2026-04-09', '13:32:37', '13:06:08', 'foto_1775716357.png'),
(22, 'SEKRETARIS DINAS KOMINFO', '123', '2147483647', '123', '123', '2026-04-09', '13:33:04', '13:04:19', 'foto_1775716384.png'),
(23, 'KEPALA DINAS KOMINFO', 'ggus', '2147483647', 'gresi', 'k', '2026-04-13', '13:22:29', '13:23:20', 'foto_1776061349.png'),
(24, 'BIDANG SIP', 'Muhammad Nasrulloh Muqsith', '2147483647', 'UPN VETERAN JAWA TIMUR', 'KEPERLUAN ANDA', '2026-04-14', '07:55:06', NULL, 'foto_1776128106.png'),
(25, 'BIDANG SIP', 'Erwin', '082135523934', 'Pondok Permata Suci', 'ANDA', '2026-04-14', '07:59:05', NULL, 'foto_1776128345.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`USERNAME_ADMIN`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
