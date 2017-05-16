-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16 Mei 2017 pada 10.48
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

--
-- Dumping data untuk tabel `jawaban`
--

INSERT INTO `jawaban` (`id_jawaban`, `isi`, `id_user`, `id_pertanyaan`) VALUES
(1, 'tidak', 3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(2) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'tidak tahu'),
(2, 'qur''an');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int(5) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `id_kategori` int(2) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `judul`, `isi`, `id_kategori`, `id_user`) VALUES
(1, 'mengapa tahu bulat?', 'jadi tahu kan bulat', 1, 3),
(2, 'jambu', 'mengapajambu jambret', 2, 1),
(3, 'tampankah saya?', 'benarkah?', 1, 3);

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
(1, 'fahrul fanani ghizbunaza', 'fahrul.gh@gmail.com', '7815696ecbf1c96e6894b779456d330e', 'asd', 0),
(2, 'a', 'a@a', '0cc175b9c0f1b6a831c399e269772661', 'a', 1),
(3, 'rochmad adhim', 'rochmad.adhim@gmail.com', '23fb792f0220a5ebd2c67e3efe29b276', 'adhim adalah nama saya', 1);

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
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

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
  MODIFY `id_jawaban` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
