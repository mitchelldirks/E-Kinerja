-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2019 at 02:31 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahp-tiara`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `NIP` varchar(20) NOT NULL,
  `periode` varchar(30) NOT NULL,
  `lihat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `NIP`, `periode`, `lihat`) VALUES
(1, '31221', '2019-November', 1),
(2, '2016230114', '2019-November', 1),
(3, '31221', '2019-Desember', 0),
(4, '14045', '2019-November', 1);

-- --------------------------------------------------------

--
-- Table structure for table `desc_kriteria`
--

CREATE TABLE `desc_kriteria` (
  `id_desc` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(30) NOT NULL,
  `nama_jabatan` varchar(40) NOT NULL,
  `job_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama_jabatan`, `job_desc`) VALUES
(1, 'Karyawan', 'Menyatakan bahwa kinerja merupakan terjemahan dari kata performance yang memiliki arti sebagai sebuah hasil kerja seorang pegawai atau pekerja, sebuah proses manajemen yang mana hasil kerja tersebut harus memiliki sebuah bukti konkret yang juga dapat diukur.');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `NIP` varchar(40) NOT NULL,
  `nama_karyawan` varchar(125) NOT NULL,
  `JK` varchar(50) DEFAULT NULL,
  `Jabatan` varchar(50) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`NIP`, `nama_karyawan`, `JK`, `Jabatan`, `status`) VALUES
('14045', 'Ronald McDonald', 'Pria', '14045', 'ok'),
('2016230114', 'Adli', 'Pria', '1', 'ok'),
('31221', 'Edwahi', 'Pria', '1', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kriteria` varchar(125) NOT NULL,
  `seo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kriteria`, `seo`) VALUES
(1, 'Ketaatan SOP', 'Ketaatan_SOP'),
(2, 'Kualitas Kinerja', 'Kualitas_Kinerja'),
(3, 'Pembelajaran', 'Pembelajaran'),
(4, 'Sumbang Pikir Ilmiah', 'Sumbang_Pikir_Ilmiah'),
(5, 'Integritas', 'Integritas'),
(6, 'Disiplin Kehadiran', 'Disiplin_Kehadiran');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_alternatif`
--

CREATE TABLE `nilai_alternatif` (
  `id_nilai_alternatif` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `periode` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_alternatif`
--

INSERT INTO `nilai_alternatif` (`id_nilai_alternatif`, `id_alternatif`, `id_kriteria`, `nilai`, `periode`) VALUES
(1, 1, 1, 100, '2019-November'),
(2, 1, 2, 100, '2019-November'),
(3, 1, 3, 100, '2019-November'),
(4, 1, 4, 100, '2019-November'),
(5, 1, 5, 100, '2019-November'),
(6, 1, 6, 100, '2019-November'),
(7, 2, 1, 70, '2019-November'),
(8, 2, 2, 70, '2019-November'),
(9, 2, 3, 70, '2019-November'),
(10, 2, 4, 80, '2019-November'),
(11, 2, 5, 70, '2019-November'),
(12, 2, 6, 50, '2019-November'),
(13, 3, 1, 80, '2019-Desember'),
(14, 3, 2, 72, '2019-Desember'),
(15, 3, 3, 68, '2019-Desember'),
(16, 3, 4, 88, '2019-Desember'),
(17, 3, 5, 92, '2019-Desember'),
(18, 3, 6, 35, '2019-Desember'),
(19, 4, 1, 80, '2019-November'),
(20, 4, 2, 80, '2019-November'),
(21, 4, 3, 80, '2019-November'),
(22, 4, 4, 80, '2019-November'),
(23, 4, 5, 80, '2019-November'),
(24, 4, 6, 80, '2019-November');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_kriteria`
--

CREATE TABLE `nilai_kriteria` (
  `id_nilai` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_kriteria`
--

INSERT INTO `nilai_kriteria` (`id_nilai`, `id_kriteria`, `nilai`) VALUES
(1, 1, 15),
(2, 2, 40),
(3, 3, 5),
(4, 4, 5),
(5, 5, 15),
(6, 6, 20);

-- --------------------------------------------------------

--
-- Table structure for table `pemberian_skor`
--

CREATE TABLE `pemberian_skor` (
  `id_pemberian` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `data_awal` varchar(225) NOT NULL,
  `konversi` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id_periode` int(5) NOT NULL,
  `periode` varchar(30) NOT NULL,
  `label` varchar(30) NOT NULL,
  `tahun` int(5) NOT NULL,
  `bulan` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id_periode`, `periode`, `label`, `tahun`, `bulan`) VALUES
(2, '2019-November', '2019 November', 2019, 'November'),
(4, '2019-Desember', '2019 Desember', 2019, 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id_temp` int(11) NOT NULL,
  `NIP` varchar(40) NOT NULL,
  `nama_dosen` varchar(40) NOT NULL,
  `Pengajaran` int(5) DEFAULT NULL,
  `Penelitian_n_Publikasi` int(5) DEFAULT NULL,
  `Pengabdian_Masyarakat` int(5) DEFAULT NULL,
  `Penunjang` int(5) DEFAULT NULL,
  `creator` varchar(20) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `periode` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'operator', 'operator', 'operator', 'operator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `desc_kriteria`
--
ALTER TABLE `desc_kriteria`
  ADD PRIMARY KEY (`id_desc`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD PRIMARY KEY (`id_nilai_alternatif`);

--
-- Indexes for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `pemberian_skor`
--
ALTER TABLE `pemberian_skor`
  ADD PRIMARY KEY (`id_pemberian`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id_temp`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `desc_kriteria`
--
ALTER TABLE `desc_kriteria`
  MODIFY `id_desc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  MODIFY `id_nilai_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pemberian_skor`
--
ALTER TABLE `pemberian_skor`
  MODIFY `id_pemberian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id_temp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
