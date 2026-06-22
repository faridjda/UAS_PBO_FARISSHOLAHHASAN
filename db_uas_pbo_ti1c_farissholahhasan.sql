-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2026 at 06:12 AM
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
-- Database: `db_uas_pbo_ti1c_farissholahhasan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_karyawan`
--

CREATE TABLE `tabel_karyawan` (
  `id_karyawan` int NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `hari_kerja_masuk` int NOT NULL,
  `gaji_dasar_per_hari` decimal(12,2) NOT NULL,
  `jenis_karyawan` enum('Kontrak','Tetap','Magang') NOT NULL,
  `durasi_kontrak_bulan` int DEFAULT NULL,
  `agensi_penyalur` varchar(100) DEFAULT NULL,
  `tunjangan_kesehatan` decimal(12,2) DEFAULT NULL,
  `opsi_saham_id` varchar(50) DEFAULT NULL,
  `uang_saku_bulanan` decimal(12,2) DEFAULT NULL,
  `sertifikat_kampus_merdeka` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_karyawan`
--

INSERT INTO `tabel_karyawan` (`id_karyawan`, `nama_karyawan`, `departemen`, `hari_kerja_masuk`, `gaji_dasar_per_hari`, `jenis_karyawan`, `durasi_kontrak_bulan`, `agensi_penyalur`, `tunjangan_kesehatan`, `opsi_saham_id`, `uang_saku_bulanan`, `sertifikat_kampus_merdeka`) VALUES
(1, 'Budi Santoso', 'IT', 22, '150000.00', 'Tetap', NULL, NULL, '500000.00', 'OPT-001', NULL, NULL),
(2, 'Citra Dewi', 'HRD', 20, '140000.00', 'Tetap', NULL, NULL, '450000.00', 'OPT-002', NULL, NULL),
(3, 'Eko Prasetyo', 'Finance', 21, '160000.00', 'Tetap', NULL, NULL, '500000.00', 'OPT-003', NULL, NULL),
(4, 'Fitriani', 'Marketing', 22, '135000.00', 'Tetap', NULL, NULL, '400000.00', 'OPT-004', NULL, NULL),
(5, 'Gilang Ramadan', 'IT', 19, '155000.00', 'Tetap', NULL, NULL, '550000.00', 'OPT-005', NULL, NULL),
(6, 'Hendra Wijaya', 'Operations', 23, '145000.00', 'Tetap', NULL, NULL, '450000.00', 'OPT-006', NULL, NULL),
(7, 'Indah Permata', 'Legal', 22, '170000.00', 'Tetap', NULL, NULL, '600000.00', 'OPT-007', NULL, NULL),
(8, 'Joko Susilo', 'IT', 20, '120000.00', 'Kontrak', 12, 'PT Mitra Utama', NULL, NULL, NULL, NULL),
(9, 'Kartika Sari', 'Marketing', 22, '110000.00', 'Kontrak', 6, 'PT Bakti Solusi', NULL, NULL, NULL, NULL),
(10, 'Laksana Tri', 'Operations', 21, '115000.00', 'Kontrak', 12, 'PT Mitra Utama', NULL, NULL, NULL, NULL),
(11, 'Mega Utami', 'HRD', 18, '125000.00', 'Kontrak', 24, 'PT Talent Scout', NULL, NULL, NULL, NULL),
(12, 'Nugroho Adi', 'Finance', 22, '130000.00', 'Kontrak', 6, 'PT Bakti Solusi', NULL, NULL, NULL, NULL),
(13, 'Oki Setiawan', 'IT', 20, '125000.00', 'Kontrak', 12, 'PT Mitra Utama', NULL, NULL, NULL, NULL),
(14, 'Putri Amelia', 'Marketing', 21, '110000.00', 'Kontrak', 6, 'PT Talent Scout', NULL, NULL, NULL, NULL),
(15, 'Rian Hidayat', 'IT', 20, '50000.00', 'Magang', NULL, NULL, NULL, NULL, '1200000.00', 'Sertifikat MSIB Batch 5'),
(16, 'Sinta Bella', 'HRD', 22, '45000.00', 'Magang', NULL, NULL, NULL, NULL, '1000000.00', 'Sertifikat MSIB Batch 5'),
(17, 'Taufik Hidayat', 'Finance', 19, '50000.00', 'Magang', NULL, NULL, NULL, NULL, '1200000.00', 'Sertifikat MSIB Batch 6'),
(18, 'Utami Rizki', 'Marketing', 21, '45000.00', 'Magang', NULL, NULL, NULL, NULL, '1000000.00', 'Sertifikat PMM Batch 4'),
(19, 'Viko Pratama', 'IT', 20, '50000.00', 'Magang', NULL, NULL, NULL, NULL, '1200000.00', 'Sertifikat MSIB Batch 6'),
(20, 'Wulan Dari', 'Legal', 22, '55000.00', 'Magang', NULL, NULL, NULL, NULL, '1300000.00', 'Sertifikat PMM Batch 4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_karyawan`
--
ALTER TABLE `tabel_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_karyawan`
--
ALTER TABLE `tabel_karyawan`
  MODIFY `id_karyawan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
