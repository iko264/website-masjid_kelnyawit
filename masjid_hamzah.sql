-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jun 12, 2026 at 08:07 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `masjid_hamzah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `dokumentasi_kegiatan`
--

CREATE TABLE `dokumentasi_kegiatan` (
  `id_kegiatan` int NOT NULL,
  `nama_kegiatan` varchar(150) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text NOT NULL,
  `dokumentasi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dokumentasi_kegiatan`
--

INSERT INTO `dokumentasi_kegiatan` (`id_kegiatan`, `nama_kegiatan`, `tanggal`, `deskripsi`, `dokumentasi`, `created_at`) VALUES
(2, 'Serum', '2026-06-26', 'yga ydg y uga bioher9 aiu y waih dyt wadas d;ay pauishd kasjdh 9iawe aihsd ioauy sid apishdbpiauwy iuasdwa', '1781075307_WhatsApp_Image_2026-06-09_at_22.15.32.jpeg', '2026-06-10 07:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_khatib`
--

CREATE TABLE `jadwal_khatib` (
  `id_khatib` int NOT NULL,
  `tanggal` date NOT NULL,
  `nama_khatib` varchar(100) NOT NULL,
  `muadzin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jadwal_khatib`
--

INSERT INTO `jadwal_khatib` (`id_khatib`, `tanggal`, `nama_khatib`, `muadzin`, `created_at`) VALUES
(1, '2026-06-12', 'Musmuallim, S.Pd.I., M.Pd.I.', 'Rifky', '2026-06-10 01:43:06'),
(2, '2026-06-19', 'Dr. Nurul Hidayat, S.Pt., M.Cs.', 'Javier', '2026-06-10 01:43:06'),
(3, '2026-06-26', 'Amin Hidayat', 'Zulfan', '2026-06-10 01:43:06'),
(4, '2026-07-03', 'Heri Irawan, S.T., M.T.', 'Mirza', '2026-06-10 01:43:06'),
(6, '2026-07-10', 'Ir. Imron Rosyadi, S.T., M.Sc.', 'Ryan', '2026-06-10 03:20:59');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_muadzin`
--

CREATE TABLE `jadwal_muadzin` (
  `id_muadzin` int NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') NOT NULL,
  `waktu_sholat` enum('Dzuhur','Ashar','Jumat') NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jadwal_muadzin`
--

INSERT INTO `jadwal_muadzin` (`id_muadzin`, `hari`, `waktu_sholat`, `nama_petugas`, `created_at`) VALUES
(29, 'Senin', 'Dzuhur', 'Ahmad', '2026-06-09 17:43:14'),
(30, 'Senin', 'Ashar', 'Ryan', '2026-06-09 17:43:14'),
(31, 'Selasa', 'Dzuhur', 'Zulfan', '2026-06-09 17:43:14'),
(32, 'Selasa', 'Ashar', 'Mirza', '2026-06-09 17:43:14'),
(33, 'Rabu', 'Dzuhur', 'Hammed', '2026-06-09 17:43:14'),
(34, 'Rabu', 'Ashar', 'Arun', '2026-06-09 17:43:14'),
(35, 'Kamis', 'Dzuhur', 'Rifky', '2026-06-09 17:43:14'),
(36, 'Kamis', 'Ashar', 'Fikri', '2026-06-09 17:43:14'),
(37, 'Jumat', 'Dzuhur', '-', '2026-06-09 17:43:14'),
(38, 'Jumat', 'Ashar', 'Zidan', '2026-06-09 17:43:14'),
(39, 'Sabtu', 'Dzuhur', 'Rinaldi', '2026-06-09 17:43:14'),
(40, 'Sabtu', 'Ashar', 'Rheyan', '2026-06-09 17:43:14'),
(41, 'Minggu', 'Dzuhur', 'Ammar', '2026-06-09 17:43:14'),
(42, 'Minggu', 'Ashar', 'Rasydan', '2026-06-09 17:43:14');

-- --------------------------------------------------------

--
-- Table structure for table `kas_masjid`
--

CREATE TABLE `kas_masjid` (
  `id_kas` int NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_transaksi` enum('Pemasukan','Pengeluaran') NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `nominal` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kas_masjid`
--

INSERT INTO `kas_masjid` (`id_kas`, `tanggal`, `jenis_transaksi`, `keterangan`, `nominal`, `created_at`) VALUES
(1, '2026-06-05', 'Pengeluaran', 'jumat berkah', 80000, '2026-06-10 10:40:45'),
(2, '2026-06-12', 'Pemasukan', 'infak jumat', 1000000, '2026-06-10 10:43:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `dokumentasi_kegiatan`
--
ALTER TABLE `dokumentasi_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `jadwal_khatib`
--
ALTER TABLE `jadwal_khatib`
  ADD PRIMARY KEY (`id_khatib`);

--
-- Indexes for table `jadwal_muadzin`
--
ALTER TABLE `jadwal_muadzin`
  ADD PRIMARY KEY (`id_muadzin`);

--
-- Indexes for table `kas_masjid`
--
ALTER TABLE `kas_masjid`
  ADD PRIMARY KEY (`id_kas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dokumentasi_kegiatan`
--
ALTER TABLE `dokumentasi_kegiatan`
  MODIFY `id_kegiatan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwal_khatib`
--
ALTER TABLE `jadwal_khatib`
  MODIFY `id_khatib` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jadwal_muadzin`
--
ALTER TABLE `jadwal_muadzin`
  MODIFY `id_muadzin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `kas_masjid`
--
ALTER TABLE `kas_masjid`
  MODIFY `id_kas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
