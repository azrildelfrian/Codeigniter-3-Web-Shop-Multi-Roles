-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Nov 2023 pada 19.30
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dfstore`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hero_unit`
--

CREATE TABLE `hero_unit` (
  `id` int(11) NOT NULL,
  `label` varchar(100) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `file_foto` text NOT NULL,
  `status_acc` enum('pending','setuju','tolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `hero_unit`
--

INSERT INTO `hero_unit` (`id`, `label`, `deskripsi`, `file_foto`, `status_acc`) VALUES
(2, 'label2', 'lorem ipsum 2', 'slider22.jpg', 'setuju'),
(7, 'Gambar Toko Online', 'Ini adalah gambar contoh untuk toko online.', 'slider1.jpg', 'setuju'),
(11, 'Hero Toko Online', 'Ini adalah gambar contoh untuk toko onlinee.', 'slider23.jpg', 'setuju');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(120) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `kategori` enum('Pakaian Pria','Pakaian Wanita','Pakaian Anak','Elektronik','Kebutuhan Pokok','Kesehatan') NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` text NOT NULL,
  `status_acc` enum('pending','setuju','tolak') NOT NULL DEFAULT 'pending',
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_brg`, `nama_brg`, `deskripsi`, `kategori`, `harga`, `stok`, `gambar`, `status_acc`, `created_at`, `update_at`) VALUES
(1, 'Jaket Kulit Adidas Original', 'Jaket kulit asli merek Adidas.', 'Pakaian Pria', '450000.00', 2, 'jaket.jpg', 'setuju', '2022-12-13 11:11:00', '2022-12-13 14:17:26'),
(2, 'Jaket Wanita Bahan Kulit', 'Cocok untuk wanita yang suka memakai jaket kulit ataupun rider.', 'Pakaian Wanita', '1000000.00', 4, 'jaket2.jpg', 'setuju', '2022-12-13 11:11:00', '2022-12-13 11:11:00'),
(6, 'HP iPhone Xr', 'HP iPhone Xr versi ram 3/128', 'Elektronik', '4000000.00', 3, 'iponx.jpg', 'setuju', '2022-12-13 11:11:00', '2022-12-13 11:11:00'),
(7, 'Bola Futsal Specs Original', 'Bola untuk olahraga futsal merk specs berkualitas original dari pabrik.', 'Kesehatan', '100000.00', 9, 'ax2xSBVr2UQt2CcVFAWuv4gJUWZKzS89mwwZbVB2.jpg', 'setuju', '2022-12-13 11:11:00', '2022-12-13 11:11:00'),
(8, 'Game Need For Speed Underground 1 ', 'Game Need For Speed Underground 1 Versi CD', 'Kebutuhan Pokok', '100000.00', 10, '446005.jpg', 'setuju', '2022-12-13 11:11:00', '2022-12-13 11:11:00'),
(9, 'Pakaian Anak Perempuan', 'Pakaian anak perempuan fashionable', 'Pakaian Anak', '120000.00', 40, 'baju_anak_wanita.jpg', 'setuju', '2022-12-13 11:11:00', '2022-12-21 07:31:58'),
(13, 'Pakaian Anak Laki-laki Koko', 'Pakaian anak untuk laki-laki baju koko', 'Pakaian Anak', '125000.00', 36, 'Model-Baju-Anak-006.jpg', 'setuju', '2022-12-13 11:11:00', '2022-12-21 07:34:04'),
(14, 'Tas Sekolah ', 'Tas sekolah termurah.', 'Pakaian Anak', '200000.00', 37, 'tas_sekolah.jpeg', 'setuju', '2022-12-13 11:11:00', '2022-12-21 07:37:27'),
(17, 'Tas Wanita', 'Tas wanita baru dan termurah.', 'Pakaian Wanita', '150000.00', 20, 'tas_wanita.jpg', 'setuju', '2022-12-21 07:27:26', '2022-12-21 07:28:02'),
(18, 'Baju Batik Pria', 'Baju Batik Pria Baru dan Original.', 'Pakaian Pria', '200000.00', 32, 'batik.jpg', 'setuju', '2022-12-21 07:40:28', NULL),
(19, 'Baju Jas Pria/Baju Kerja Pria', 'Baju pria cocok untuk kerja maupun kegiatan lainnya.', 'Pakaian Pria', '350000.00', 26, 'Jas_Formal_Pria__Jas_Kerja__Jas_Nikah.jpg', 'setuju', '2022-12-21 07:42:09', NULL),
(20, 'Paket hemat kebutuhan pokok.', 'Paket hemat kebutuhan pokok yang berisi berbagai macam makanan.', 'Kebutuhan Pokok', '300000.00', 10, 'Contoh_Kebutuhan_Primer3.jpg', 'setuju', '2022-12-21 08:25:45', NULL),
(21, 'Pakaian Wanita Stylish', 'Pakaian/baju untuk wanita yang dapat digunakan untuk bepergian.', 'Pakaian Wanita', '210000.00', 24, 'f43aab4b-ccd6-468c-a9fb-4d70d53b4d37.jpg', 'setuju', '2022-12-21 08:33:48', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`id`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`) VALUES
(6, 'Azril Delfrian Adi Putra', 'Tabanan, Bali', '2022-12-13 20:10:49', '2022-12-14 20:10:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(66) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`id`, `id_invoice`, `id_brg`, `nama_brg`, `jumlah`, `harga`, `pilihan`) VALUES
(0, 1, 1, 'Jaket Kulit Adidas', 1, 500000, ''),
(0, 1, 2, 'Jaket lorem ipsum', 1, 1000000, ''),
(0, 3, 1, 'Jaket Kulit Adidas', 2, 500000, ''),
(0, 4, 1, 'Jaket Kulit Adidas', 1, 500000, ''),
(0, 4, 5, 'Kentang Beku', 1, 65000, ''),
(0, 5, 5, 'Kentang Beku', 1, 65000, ''),
(0, 5, 1, 'Jaket Kulit Adidas', 1, 500000, ''),
(0, 5, 2, 'Jaket lorem ipsum', 1, 1000000, ''),
(0, 5, 6, 'HP IPONG 99 MAX PRO ', 1, 300000000, ''),
(0, 5, 7, 'Bola Futsal Specs Original', 1, 100000, ''),
(0, 6, 1, 'Jaket Kulit Adidas Original', 1, 450000, ''),
(0, 6, 2, 'Jaket Wanita Bahan Kulit', 1, 1000000, ''),
(0, 6, 6, 'HP iPhone Xr', 1, 4000000, '');

--
-- Trigger `tbl_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tbl_pesanan` FOR EACH ROW BEGIN
	UPDATE tbl_barang SET stok = stok-NEW.jumlah
    WHERE id_brg = NEW.id_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(66) NOT NULL,
  `username` varchar(66) NOT NULL,
  `password` varchar(66) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama`, `username`, `password`, `role_id`) VALUES
(1, 'admin', 'admin', '123', 1),
(2, 'staff', 'staff', '123', 2),
(3, 'user', 'user', '321', 3),
(4, 'azril', 'azril', 'azril', 3),
(5, 'user', 'user', 'user', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hero_unit`
--
ALTER TABLE `hero_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indeks untuk tabel `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hero_unit`
--
ALTER TABLE `hero_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
