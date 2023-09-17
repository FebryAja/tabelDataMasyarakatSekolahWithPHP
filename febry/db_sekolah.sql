-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Feb 2023 pada 12.14
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` varchar(7) NOT NULL,
  `nik` char(16) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `golongan_darah` enum('A','B','AB','O') NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `agama` enum('islam','kristen','buddha','hindu') NOT NULL,
  `status_perkawinan` enum('menikah','belum menikah') NOT NULL,
  `pekerjaan` enum('bekerja','belum bekerja') NOT NULL,
  `kewarganegaraan` enum('WNI','WNA') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `golongan_darah`, `alamat`, `agama`, `status_perkawinan`, `pekerjaan`, `kewarganegaraan`) VALUES
('121232', '121221', 'Ashiap', 'jhjh', '1322-12-13', 'L', 'B', 'asdasdw', 'buddha', 'menikah', 'belum bekerja', 'WNI'),
('23423', '234234', 'asdaw', 'awdad', '2023-02-07', 'P', 'A', 'wadaadad', 'islam', 'menikah', 'belum bekerja', 'WNI'),
('5654', '8765', 'Agus', 'mhhgy', '2023-02-08', 'L', 'B', 'nggft', 'islam', 'menikah', 'bekerja', 'WNI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` varchar(7) NOT NULL,
  `nik` char(16) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `golongan_darah` enum('A','B','AB','O') NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `agama` enum('islam','kristen','buddha','hindu') NOT NULL,
  `status_perkawinan` enum('menikah','belum menikah') NOT NULL,
  `pekerjaan` enum('bekerja','belum bekerja') NOT NULL,
  `kewarganegaraan` enum('WNI','WNA') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `golongan_darah`, `alamat`, `agama`, `status_perkawinan`, `pekerjaan`, `kewarganegaraan`) VALUES
('1232', '123123', 'dfedfes', 'frfgr', '1212-12-23', 'L', 'AB', 'fgdgfd', 'kristen', 'menikah', 'belum bekerja', 'WNI'),
('21232', '12131', 'Halo deck', 'hagsdhjags', '2009-12-23', 'P', 'A', 'fsddfsfe', 'kristen', 'menikah', 'belum bekerja', 'WNI'),
('2342', '5643', 'iasdhasd', 'bbhg', '2023-02-05', 'L', 'B', 'kjkjju', 'islam', 'belum menikah', 'belum bekerja', 'WNI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` varchar(7) NOT NULL,
  `nik` char(16) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `golongan_darah` enum('A','B','AB','O') NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `agama` enum('islam','kristen','buddha','hindu') NOT NULL,
  `status_perkawinan` enum('menikah','belum menikah') NOT NULL,
  `pekerjaan` enum('bekerja','belum bekerja') NOT NULL,
  `kewarganegaraan` enum('WNI','WNA') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `golongan_darah`, `alamat`, `agama`, `status_perkawinan`, `pekerjaan`, `kewarganegaraan`) VALUES
('111', '111', 'Asadeasade', 'ashiap', '4223-12-23', 'P', 'A', 'Ashiap ya ges ya ', 'kristen', 'menikah', 'belum bekerja', 'WNI'),
('121212', '121213', 'Jajang Nursidik', 'Banteng Kecebur', '3412-02-21', 'L', 'B', 'Jalan Jalan Wae Bosen', 'islam', 'menikah', 'belum bekerja', 'WNA'),
('12313', '4234', 'Sumimi Anjay', 'Jakarsu', '2023-02-16', 'P', 'A', 'Kebon kebonan', 'kristen', 'menikah', 'belum bekerja', 'WNI'),
('2222', '453453', 'Fangsuiiii', 'jakarta', '2212-09-23', 'L', 'A', 'dfsdf', 'kristen', 'menikah', 'belum bekerja', 'WNA'),
('2342', '342342', 'Febry ', 'fcsasfsa', '2023-01-30', 'L', 'O', 'bandung', 'islam', 'belum menikah', 'belum bekerja', 'WNI'),
('2342123', '21313', 'udin', 'hdhasda', '2023-02-23', 'L', 'A', 'ASqs', 'islam', 'menikah', 'belum bekerja', 'WNI'),
('34124', '124124', 'Asep', 'Bandung', '2023-02-05', 'L', 'A', 'Jalan jalan ae', 'buddha', 'menikah', 'belum bekerja', 'WNI'),
('34565', '2342', 'Sucipto', 'Jakarta', '2023-02-13', 'L', 'A', 'Ashiap', 'islam', 'menikah', 'belum bekerja', 'WNI'),
('4234', '7656', 'Mamat', 'Bandung', '2023-02-07', 'L', 'AB', 'Jalan mana aja boleh', 'kristen', 'menikah', 'belum bekerja', 'WNI'),
('52435', '2442', 'Kamaludin Ashiap', 'Jakarta', '2023-01-01', 'L', 'A', 'Jalan Pelamar Kerja Dimana', 'buddha', 'belum menikah', 'bekerja', 'WNA'),
('6578', '543685', 'Junaedin Putri', 'Banjar', '2023-01-30', 'L', 'B', 'Jalan Simpang Semok', 'hindu', 'menikah', 'belum bekerja', 'WNA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `peran` enum('siswa','guru','karyawan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `peran`) VALUES
(5, 'admin', '$2y$10$SVlvCf/qa/qFg9Hw1cW7B.3kL5i7pTPG62GbaWEszQ9GYU6C1erO.', 'siswa'),
(6, 'admin2', '$2y$10$wYQ/bMqvuIwplBJL7ZmT6.nsHFjalftQ9XQ2eSC3sMid3a2dcKjS.', 'guru'),
(7, 'admin3', '$2y$10$7.OsJwR6/GAxxBzyQcom9eJqjYqxThDAiuIW0qkmg9XGmlX3DhYkO', 'karyawan'),
(8, 'admin4', '$2y$10$QbgAhXh0M4Srn8VnBOv4fOhhoH3iYizJ2O3EmQmCfML0El.Xnc41y', 'guru');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
