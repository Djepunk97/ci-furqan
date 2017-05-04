-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28 Apr 2017 pada 12.52
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furqan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `downvote_jawaban`
--

CREATE TABLE `downvote_jawaban` (
  `id_downvote_j` int(10) NOT NULL,
  `id_jawaban` int(10) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `downvote_pertanyaan`
--

CREATE TABLE `downvote_pertanyaan` (
  `id_downvote_p` int(10) NOT NULL,
  `id_pertanyaan` int(10) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban`
--

CREATE TABLE `jawaban` (
  `id_jawaban` int(10) NOT NULL,
  `isi` text NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_pertanyaan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int(5) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `upvote_jawaban`
--

CREATE TABLE `upvote_jawaban` (
  `id_upvote_j` int(10) NOT NULL,
  `id_jawaban` int(10) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `upvote_pertanyaan`
--

CREATE TABLE `upvote_pertanyaan` (
  `id_upvote_p` int(10) NOT NULL,
  `id_pertanyaan` int(10) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(32) NOT NULL,
  `tentang` text NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `tentang`, `level`) VALUES
(1, 'fahrul fanani ghizbunaza', 'fahrul.gh@gmail.com', '7815696ecbf1c96e6894b779456d330e', 'asd', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `downvote_jawaban`
--
ALTER TABLE `downvote_jawaban`
  ADD PRIMARY KEY (`id_downvote_j`);

--
-- Indexes for table `downvote_pertanyaan`
--
ALTER TABLE `downvote_pertanyaan`
  ADD PRIMARY KEY (`id_downvote_p`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indexes for table `upvote_jawaban`
--
ALTER TABLE `upvote_jawaban`
  ADD PRIMARY KEY (`id_upvote_j`);

--
-- Indexes for table `upvote_pertanyaan`
--
ALTER TABLE `upvote_pertanyaan`
  ADD PRIMARY KEY (`id_upvote_p`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `downvote_jawaban`
--
ALTER TABLE `downvote_jawaban`
  MODIFY `id_downvote_j` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `downvote_pertanyaan`
--
ALTER TABLE `downvote_pertanyaan`
  MODIFY `id_downvote_p` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_jawaban` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `upvote_jawaban`
--
ALTER TABLE `upvote_jawaban`
  MODIFY `id_upvote_j` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `upvote_pertanyaan`
--
ALTER TABLE `upvote_pertanyaan`
  MODIFY `id_upvote_p` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
