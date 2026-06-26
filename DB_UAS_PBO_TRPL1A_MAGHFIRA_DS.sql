-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 26, 2026 at 12:49 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas_pbo_trpl1a_maghfira dhinantyas sardwita`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_mahasiswa`
--

CREATE TABLE `tabel_mahasiswa` (
  `id_mahasiswa` int NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `semester` int NOT NULL,
  `tarif_ukt_nominal` decimal(10,2) NOT NULL,
  `jenis_pembiyaan` enum('Mandiri','Bidikmisi','Prestasi') NOT NULL,
  `golongan_ukt` varchar(10) DEFAULT NULL,
  `nama_wali` varchar(100) DEFAULT NULL,
  `nomor_kip_kuliah` varchar(50) DEFAULT NULL,
  `dana_saku_subsidi` decimal(10,2) DEFAULT NULL,
  `nama_instansi_beasiswa` varchar(100) DEFAULT NULL,
  `minimal_ipk_syarat` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_mahasiswa`
--

INSERT INTO `tabel_mahasiswa` (`id_mahasiswa`, `nama_mahasiswa`, `nim`, `semester`, `tarif_ukt_nominal`, `jenis_pembiyaan`, `golongan_ukt`, `nama_wali`, `nomor_kip_kuliah`, `dana_saku_subsidi`, `nama_instansi_beasiswa`, `minimal_ipk_syarat`) VALUES
(1, 'Ahmad Fauzi', '230101001', 2, 5000000.00, 'Mandiri', 'Golongan 4', 'Budi Santoso', NULL, NULL, NULL, NULL),
(2, 'Siti Aminah', '230101002', 2, 6500000.00, 'Mandiri', 'Golongan 5', 'Hendra Wijaya', NULL, NULL, NULL, NULL),
(3, 'Rian Hidayat', '230101003', 4, 5000000.00, 'Mandiri', 'Golongan 4', 'Slamet Riyadi', NULL, NULL, NULL, NULL),
(4, 'Dina Lestari', '230101004', 4, 8000000.00, 'Mandiri', 'Golongan 6', 'Agus Susanto', NULL, NULL, NULL, NULL),
(5, 'Budi Pratama', '230101005', 6, 6500000.00, 'Mandiri', 'Golongan 5', 'Deddy Corbuzier', NULL, NULL, NULL, NULL),
(6, 'Citra Dewi', '230101006', 6, 5000000.00, 'Mandiri', 'Golongan 4', 'Indra Hermawan', NULL, NULL, NULL, NULL),
(7, 'Eko Prasetyo', '230101007', 2, 8000000.00, 'Mandiri', 'Golongan 6', 'Joko Widodo', NULL, NULL, NULL, NULL),
(8, 'Fajar Nugraha', '230101008', 2, 0.00, 'Bidikmisi', NULL, NULL, 'KIP-2023-9901', 1200000.00, NULL, NULL),
(9, 'Gita Gutawa', '230101009', 2, 0.00, 'Bidikmisi', NULL, NULL, 'KIP-2023-9902', 1200000.00, NULL, NULL),
(10, 'Hadi Syahputra', '230101010', 4, 0.00, 'Bidikmisi', NULL, NULL, 'KIP-2022-8801', 1200000.00, NULL, NULL),
(11, 'Indah Permata', '230101011', 4, 0.00, 'Bidikmisi', NULL, NULL, 'KIP-2022-8802', 1200000.00, NULL, NULL),
(12, 'Joko Tingkir', '230101012', 6, 0.00, 'Bidikmisi', NULL, NULL, 'KIP-2021-7701', 1250000.00, NULL, NULL),
(13, 'Kurnia Sandi', '230101013', 6, 0.00, 'Bidikmisi', NULL, NULL, 'KIP-2021-7702', 1250000.00, NULL, NULL),
(14, 'Larasati Putri', '230101014', 2, 0.00, 'Bidikmisi', NULL, NULL, 'KIP-2023-9903', 1200000.00, NULL, NULL),
(15, 'Muhammad Ali', '230101015', 2, 1500000.00, 'Prestasi', NULL, NULL, NULL, NULL, 'Djarum Foundation', 3.50),
(16, 'Nadia Vega', '230101016', 2, 2000000.00, 'Prestasi', NULL, NULL, NULL, NULL, 'Yayasan Toyota Astra', 3.30),
(17, 'Oki Setiana', '230101017', 4, 0.00, 'Prestasi', NULL, NULL, NULL, NULL, 'Beasiswa Bank Indonesia', 3.50),
(18, 'Putra Perkasa', '230101018', 4, 1500000.00, 'Prestasi', NULL, NULL, NULL, NULL, 'Djarum Foundation', 3.50),
(19, 'Qori Sandioriva', '230101019', 6, 2000000.00, 'Prestasi', NULL, NULL, NULL, NULL, 'Yayasan Toyota Astra', 3.30),
(20, 'Rini Wulandari', '230101020', 6, 0.00, 'Prestasi', NULL, NULL, NULL, NULL, 'Beasiswa Bank Indonesia', 3.50),
(21, 'Sultan Hasanuddin', '230101021', 2, 1500000.00, 'Prestasi', NULL, NULL, NULL, NULL, 'Djarum Foundation', 3.50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_mahasiswa`
--
ALTER TABLE `tabel_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_mahasiswa`
--
ALTER TABLE `tabel_mahasiswa`
  MODIFY `id_mahasiswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
