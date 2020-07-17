-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28 Mei 2019 pada 09.08
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bijb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bhp_kodemanual`
--

CREATE TABLE IF NOT EXISTS `bhp_kodemanual` (
  `id` int(11) NOT NULL,
  `kode_group` char(20) DEFAULT NULL,
  `nama_group` char(100) DEFAULT NULL,
  `kode_jenis` char(20) DEFAULT NULL,
  `nama_jenis` char(100) DEFAULT NULL,
  `kode_merk` char(20) DEFAULT NULL,
  `nama_merk` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bhp_master`
--

CREATE TABLE IF NOT EXISTS `bhp_master` (
  `barcode` char(50) NOT NULL DEFAULT '',
  `nama_barang` varchar(250) DEFAULT NULL,
  `isi_barang` int(11) DEFAULT NULL,
  `kode_satuan` char(20) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL,
  `user_input` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bhp_pengajuan`
--

CREATE TABLE IF NOT EXISTS `bhp_pengajuan` (
  `kode_pengajuan` char(20) NOT NULL DEFAULT '',
  `tgl_pengajuan` date DEFAULT NULL,
  `total_pengajuan` int(11) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `status` char(20) DEFAULT NULL,
  `tgl_penerimaan` date DEFAULT NULL,
  `user_pengaju` int(11) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bhp_pengajuandetail`
--

CREATE TABLE IF NOT EXISTS `bhp_pengajuandetail` (
  `id_pengajuandet` char(20) NOT NULL DEFAULT '',
  `kode_pengajuan` char(20) DEFAULT NULL,
  `barcode` char(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `status` char(20) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bhp_satuanbarang`
--

CREATE TABLE IF NOT EXISTS `bhp_satuanbarang` (
  `kode_satuan` char(20) NOT NULL DEFAULT '',
  `nama_satuan` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bhp_stok`
--

CREATE TABLE IF NOT EXISTS `bhp_stok` (
  `barcode` char(50) NOT NULL DEFAULT '',
  `stok` int(11) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL,
  `user_input` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bhp_stokopname`
--

CREATE TABLE IF NOT EXISTS `bhp_stokopname` (
  `id_stokopname` char(20) NOT NULL DEFAULT '',
  `tgl_stokopname` date DEFAULT NULL,
  `barcode` char(50) DEFAULT NULL,
  `stok_data` int(11) DEFAULT NULL,
  `stok_nyata` int(11) DEFAULT NULL,
  `selisih` int(11) DEFAULT NULL,
  `keterangan` text,
  `tgl_input` date DEFAULT NULL,
  `user_input` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bhp_transaksi`
--

CREATE TABLE IF NOT EXISTS `bhp_transaksi` (
  `id_transaksiphb` char(20) NOT NULL DEFAULT '',
  `barcode` char(50) DEFAULT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `jenis_transaksi` char(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `kode_pengajuan` char(20) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL,
  `user_input` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ma_jenisasset`
--

CREATE TABLE IF NOT EXISTS `ma_jenisasset` (
  `kode_jenisasset` char(20) NOT NULL DEFAULT '',
  `kode_jns` char(10) DEFAULT NULL,
  `nama_jenisasset` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ma_jenisasset`
--

INSERT INTO `ma_jenisasset` (`kode_jenisasset`, `kode_jns`, `nama_jenisasset`) VALUES
('JA-1', '3', 'PERALATAN'),
('JA-2', '1', 'KENDARAAN'),
('JA-3', '2', 'TANAH DAN BANGUNAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ma_jenispajak`
--

CREATE TABLE IF NOT EXISTS `ma_jenispajak` (
  `kode_jnspajak` char(20) NOT NULL DEFAULT '',
  `nama_jnspajak` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ma_jenispajak`
--

INSERT INTO `ma_jenispajak` (`kode_jnspajak`, `nama_jnspajak`) VALUES
('JPJ-1', 'PAJAK 1'),
('JPJ-2', 'KIR/ KEUR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ma_jenispenyedia`
--

CREATE TABLE IF NOT EXISTS `ma_jenispenyedia` (
  `kode_jnspenyedia` char(10) NOT NULL DEFAULT '',
  `nama_jnspenyedia` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ma_jenispenyedia`
--

INSERT INTO `ma_jenispenyedia` (`kode_jnspenyedia`, `nama_jnspenyedia`) VALUES
('PV-1', 'ELEKTRONIK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ma_jenisperlakuan`
--

CREATE TABLE IF NOT EXISTS `ma_jenisperlakuan` (
  `kode_jnsperlakuan` char(20) NOT NULL DEFAULT '',
  `nama_jnsperlakuan` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ma_jenisperlakuan`
--

INSERT INTO `ma_jenisperlakuan` (`kode_jnsperlakuan`, `nama_jnsperlakuan`) VALUES
('JP-1', 'LAYAK'),
('JP-2', 'RUSAK'),
('JP-3', 'DIJUAL'),
('JP-4', 'HILANG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ma_kategoriasset`
--

CREATE TABLE IF NOT EXISTS `ma_kategoriasset` (
  `kode_kategori` char(20) NOT NULL DEFAULT '',
  `kode_k` int(10) DEFAULT NULL,
  `kode_jenisasset` char(20) DEFAULT NULL,
  `nama_kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ma_kategoriasset`
--

INSERT INTO `ma_kategoriasset` (`kode_kategori`, `kode_k`, `kode_jenisasset`, `nama_kategori`) VALUES
('KT-1', 4, 'JA-1', 'ELEKTRONIK'),
('KT-2', 2, 'JA-1', 'FURNITURE'),
('KT-3', 3, 'JA-2', 'RODA DUA'),
('KT-4', 4, 'JA-2', 'RODA EMPAT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ma_kondisiasset`
--

CREATE TABLE IF NOT EXISTS `ma_kondisiasset` (
  `kode_kondisiasset` char(20) NOT NULL DEFAULT '',
  `nama_kondisiasset` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ma_kondisiasset`
--

INSERT INTO `ma_kondisiasset` (`kode_kondisiasset`, `nama_kondisiasset`) VALUES
('KA-1', 'LAYAK'),
('KA-2', 'RUSAK'),
('KA-3', 'HILANG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ma_namabarang`
--

CREATE TABLE IF NOT EXISTS `ma_namabarang` (
  `kode_barang` char(20) NOT NULL DEFAULT '',
  `kode_kategori` char(20) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `kode_b` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ma_namabarang`
--

INSERT INTO `ma_namabarang` (`kode_barang`, `kode_kategori`, `nama_barang`, `kode_b`) VALUES
('BRG-1', 'KT-1', 'LAPTOP', '4'),
('BRG-2', 'KT-1', 'PC', '2'),
('BRG-3', 'KT-1', 'PRINTER', '3'),
('BRG-4', 'KT-2', 'MEJA', '1'),
('BRG-5', 'KT-2', 'LEMARI', '2'),
('BRG-6', 'KT-3', 'SEPEDA MOTOR', '1'),
('BRG-7', 'KT-4', 'MOBIL DINAS', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ma_sequence`
--

CREATE TABLE IF NOT EXISTS `ma_sequence` (
  `sequenceid` int(11) NOT NULL,
  `sequencename` varchar(200) DEFAULT NULL,
  `sequencevalue` int(11) DEFAULT NULL,
  `sequencedate` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ma_sequence`
--

INSERT INTO `ma_sequence` (`sequenceid`, `sequencename`, `sequencevalue`, `sequencedate`) VALUES
(2, 'PENGAJUAN BHP', 2, '2017-11-23'),
(10, 'ID ASSET', 6, '2019-05-28'),
(12, 'ID DISTRIBUSI', 4, '2017-12-20'),
(14, 'ID ASSET KENDARAAN', 2, '2017-12-19'),
(15, 'ID PAJAK', 6, '2017-08-19'),
(16, 'ID KIR', 2, '2017-08-26'),
(17, 'ID MAINTENANCE', 2, '2017-08-26'),
(18, 'SOPIR', 3, '2017-08-20'),
(19, 'ID PEMAKAIAN', 3, '2017-08-26'),
(20, 'ID ASSET TANAH', 2, '2017-11-20'),
(21, 'ID PAJAK TNHBGN', 1, '2017-08-25'),
(22, 'ID PAJAK KEND', 1, '2017-11-20'),
(23, 'PENGAJUAN DETAIL', 2, '2017-11-13'),
(24, 'TRANSAKSI BHP', 14, '2017-11-12'),
(25, 'PENAMBAHAN BRG', 1, '2017-11-12'),
(26, 'ID SEWA ASSET', 4, '2019-05-28'),
(27, 'KODE STOKOPNAME', 18, '2017-11-14'),
(28, 'KODE STOKAWAL', 6, '2017-09-12'),
(29, 'KODE STOK', 1, '2017-10-25'),
(30, 'KODE TEMPBHP', 38, '2017-09-17'),
(31, 'KODE SEWA ASSET', 1, '2017-11-18'),
(33, 'KODE TEMPASSET', 49, '2017-10-18'),
(35, 'KODE STOKOPNAME ASSET', 15, '2017-10-31'),
(36, 'ID PEMINJAMAN', 1, '2017-11-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ma_status`
--

CREATE TABLE IF NOT EXISTS `ma_status` (
  `id_status` int(11) NOT NULL DEFAULT '0',
  `nama_status` varchar(100) DEFAULT NULL,
  `order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ma_status`
--

INSERT INTO `ma_status` (`id_status`, `nama_status`, `order`) VALUES
(1, 'PENGAJUAN', 1),
(2, 'PROSES', 2),
(3, 'TERSEDIA', 3),
(4, 'DISTRIBUSI', 4),
(5, 'TERIMA', 5),
(6, 'DITUNDA', 6),
(7, 'DITOLAK', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ma_sumberanggaran`
--

CREATE TABLE IF NOT EXISTS `ma_sumberanggaran` (
  `kode_sumberanggaran` char(20) NOT NULL DEFAULT '',
  `nama_sumberanggaran` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ma_sumberanggaran`
--

INSERT INTO `ma_sumberanggaran` (`kode_sumberanggaran`, `nama_sumberanggaran`) VALUES
('SA-1', 'UANG KAS'),
('SA-2', 'ANGGARAN BIJB'),
('SA-3', 'PERALATAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ma_vendor`
--

CREATE TABLE IF NOT EXISTS `ma_vendor` (
  `kode_vendor` char(20) NOT NULL DEFAULT '',
  `jenis_vendor` char(50) DEFAULT NULL,
  `type_vendor` char(50) DEFAULT NULL,
  `nama_vendor` char(255) DEFAULT NULL,
  `kode_jnspenyedia` char(20) DEFAULT NULL,
  `alamat_vendor` varchar(500) DEFAULT NULL,
  `pajak` char(10) DEFAULT NULL,
  `pemilik` char(100) DEFAULT NULL,
  `no_telepon` char(20) DEFAULT NULL,
  `no_hp` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ma_vendor`
--

INSERT INTO `ma_vendor` (`kode_vendor`, `jenis_vendor`, `type_vendor`, `nama_vendor`, `kode_jnspenyedia`, `alamat_vendor`, `pajak`, `pemilik`, `no_telepon`, `no_hp`) VALUES
('VDR-15', 'perusahaan', 'asset', '-', NULL, '-', 'PKP', '-', '-', '-'),
('VDR-21', 'perusahaan', 'asset', 'ELEKTRONIK JAYA', 'PV-009', 'DIMANA SAJA', 'PKP', '-', '-', '-'),
('VDR-22', 'perusahaan', 'asset', 'ANGKASA KOMPUTER', 'PV-016', 'BEC 2 LT 1 BLOK Z17-18', 'PKP', '-', '022-20510090', '081939710327'),
('VDR-24', 'perorangan', 'asset', 'SMART-CD', 'PV-016', 'BEC L1-F7 BANDUNG', 'NONPKP', '-', '022-4200523', '-'),
('VDR-25', 'perusahaan', 'asset', 'MEGACOMP', 'PV-016', 'BEC JL. PURNAWARMAN 13-15 LT 1 BLOK AC-07', 'NONPKP', '-', '022-2051024', '-'),
('VDR-26', 'perusahaan', 'asset', 'ATM COMPUTER', 'PV-016', 'JL. PURNAWARMAN BEC LT 1', 'NONPKP', '-', '022-4213288', '-'),
('VDR-27', 'perorangan', 'asset', 'BELUM DIKETAHUI', 'PV-016', '-', 'PKP', '-', '-', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `struktur`
--

CREATE TABLE IF NOT EXISTS `struktur` (
  `id` int(11) NOT NULL DEFAULT '0',
  `tgl_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `direktorat` varchar(250) COLLATE latin1_general_ci DEFAULT NULL,
  `unit_kerja` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `nama_struktur` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `id_direktur` int(11) DEFAULT NULL,
  `id_divisi` int(11) DEFAULT NULL,
  `kode_direktorat` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `kode_struktur` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `kepanjangan` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `aktif` enum('aktif','unaktif') COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `struktur`
--

INSERT INTO `struktur` (`id`, `tgl_insert`, `direktorat`, `unit_kerja`, `nama_struktur`, `id_direktur`, `id_divisi`, `kode_direktorat`, `kode_struktur`, `kepanjangan`, `aktif`) VALUES
(1, '0000-00-00 00:00:00', 'Direktorat Utama', '', 'Direktur Utama', 0, 0, '', 'DIR', 'Direktur  Utama', 'unaktif'),
(2, '0000-00-00 00:00:00', '', '', 'Direktur Keuangan dan Investasi', 0, 0, '', 'DKI', 'Direktur Keuangan dan Investasi', 'unaktif'),
(3, '0000-00-00 00:00:00', '', '', 'Direktur Teknik dan Pengembangan Bisnis', 0, 0, '', 'DTPB', 'Direktur Teknik dan Pengembangan Bisnis', 'unaktif'),
(17, '0000-00-00 00:00:00', '', '', 'Unit Manajemen Proyek', 0, 0, '', 'UMP', 'Unit Manajemen Proyek', 'unaktif'),
(8, '0000-00-00 00:00:00', '', '', 'Legal', 0, 0, '', 'LEG', 'Legal', 'unaktif'),
(9, '0000-00-00 00:00:00', '', '', 'Panitia Khusus Pengadaan', 0, 0, '', 'PKP', 'Panitia Khusus Pengadaan', 'unaktif'),
(10, '0000-00-00 00:00:00', '', '', 'Staf Ahli / Madya', 0, 0, '', 'AM', 'Staf Ahli / Madya', 'unaktif'),
(11, '0000-00-00 00:00:00', '', '', 'Sekretaris Perusahaan', 0, 0, '', 'SP', 'Sekretaris Perusahaan', 'unaktif'),
(12, '0000-00-00 00:00:00', '', '', 'Manajemen Proyek', 0, 0, 'DTPU', 'MP', 'Manajemen Proyek', 'unaktif'),
(13, '0000-00-00 00:00:00', '', '', 'Manajemen Proyek Aerocity', 0, 0, '', 'MPA', 'Manajemen Proyek Aerocity', 'unaktif'),
(14, '0000-00-00 00:00:00', '', '', 'Pengembangan Bisnis Aviasi', 0, 0, '', 'PAV', 'Pengembangan Bisnis Aviasi', 'unaktif'),
(15, '0000-00-00 00:00:00', '', '', 'Pengembangan Bisnis Aerocity', 0, 0, '', 'PAE', 'Pengembangan Bisnis Aerocity', 'unaktif'),
(16, '0000-00-00 00:00:00', '', '', 'Pengembangan Bisnis Pendukung', 0, 0, '', 'PBP', 'Pengembangan Bisnis Pendukung', 'unaktif'),
(20, '0000-00-00 00:00:00', '', '', 'Relasi Investor', 0, 0, '', 'RI', 'Relasi Investor', 'unaktif'),
(21, '0000-00-00 00:00:00', '', '', 'Manajemen Risiko', 0, 0, '', 'MR', 'Manajemen Risiko', 'unaktif'),
(22, '0000-00-00 00:00:00', '', '', 'Satuan Pengawas Internal', 0, 0, '', 'SPI', 'Satuan Pengawas Internal', 'unaktif'),
(85, '0000-00-00 00:00:00', '', '', 'Performansi & Perencanaan Strategis', 0, 0, '', 'PPS', '', 'unaktif'),
(84, '0000-00-00 00:00:00', '', '', 'Keuangan & Akunting', 0, 0, '', 'KA', '', 'unaktif'),
(98, '0000-00-00 00:00:00', '', '', 'Pengembangan Bisnis', 0, 0, '', 'PB', 'Pengembangan Bisnis', 'unaktif'),
(99, '0000-00-00 00:00:00', '', '', 'Sumber Daya Manusia dan Pendukung', 0, 0, '', 'SDM', 'Sumber Daya Manusia dan Pendukung', 'unaktif'),
(100, '0000-00-00 00:00:00', '', '', 'Pengembangan Bisnis Properti', 0, 0, '', 'PBP', 'Pengembangan Bisnis Properti', 'unaktif'),
(101, '0000-00-00 00:00:00', '', '', 'Direktur Keuangan dan Umum', 0, 0, '', 'DKU', 'Direktur Keuangan dan Umum', 'unaktif'),
(102, '0000-00-00 00:00:00', '', '', 'Direktur Teknik dan Investasi', 0, 0, '', 'DTI', 'Direktur Teknik dan Investasi', 'unaktif'),
(103, '0000-00-00 00:00:00', 'Direktorat Utama', 'Departemen Management & Evaluasi Proyek Bandara', '', 63, 0, '', 'MP', '', 'aktif'),
(104, '0000-00-00 00:00:00', 'Direktorat Utama', 'Departemen Pengembangan Bisnis ICT & Pendukung', '', 63, 0, '', 'PI', '', 'aktif'),
(105, '0000-00-00 00:00:00', 'Direktorat Keuangan dan Umum', 'Divisi Keuangan & akunting', '', 79, 0, '', 'KA', '', 'aktif'),
(106, '0000-00-00 00:00:00', 'Direktorat Utama', 'Divisi Pengawasan Internal & Management Resiko', '', 63, 0, '', 'SPI', '', 'aktif'),
(107, '0000-00-00 00:00:00', 'Direktorat Utama', 'Divisi Pengembangan aerocity', '', 63, 0, '', 'PA', '', 'aktif'),
(108, '0000-00-00 00:00:00', 'Direktorat Bisnis dan Investasi', 'Divisi Pengembangan Bisnis Bandara', '', 80, 0, '', 'PB', '', 'aktif'),
(109, '0000-00-00 00:00:00', 'Direktorat Bisnis dan Investasi', 'Divisi Perencanaan Opreasional Bandara', '', 80, 0, '', 'PO', '', 'aktif'),
(110, '0000-00-00 00:00:00', 'Direktorat Utama', 'Divisi Perencanaan Strategis, Bisnis, & Perf', '', 63, 0, '', 'PPS', '', 'aktif'),
(111, '0000-00-00 00:00:00', 'Direktorat Keuangan dan Umum', 'Divisi SDM & Pendukung', '', 79, 0, '', 'SMP', '', 'aktif'),
(112, '0000-00-00 00:00:00', 'Direktorat Bisnis dan Investasi', 'Divisi Supporting Bisnis & Portfolio Investasi', '', 80, 0, '', 'BPI', '', 'aktif'),
(113, '0000-00-00 00:00:00', 'Direktorat Utama', 'Divisi Sekertaris Perusahaan & Legal', '', 63, 0, '', 'SP', '', 'aktif'),
(0, '2017-05-03 16:08:39', '', '', '', 63, 0, '', '', '', 'aktif'),
(115, '2017-05-09 04:04:05', 'Direktorat Keuangan dan Umum', 'Departemen Sumber Daya Manusia (SDM)', '', 79, 111, '', 'SDM', '', 'aktif'),
(116, '2017-05-09 04:06:05', 'Direktorat Keuangan dan Umum', 'Departemen Pendukung', '', 79, 111, '', 'PEN', '', 'aktif'),
(117, '2017-05-09 04:07:39', 'Direktorat Keuangan dan Umum', 'Departemen Pengadaan Barang dan Jasa', '', 79, 111, '', 'PBJ', '', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_asset`
--

CREATE TABLE IF NOT EXISTS `ta_asset` (
  `id_asset` char(20) NOT NULL DEFAULT '',
  `kode_asset` char(20) DEFAULT NULL,
  `kode_pengajuan` char(20) DEFAULT NULL,
  `kode_jenisasset` char(20) DEFAULT NULL,
  `kode_kategori` char(20) DEFAULT NULL,
  `kode_namabarang` char(20) DEFAULT NULL,
  `merk_asset` varchar(100) DEFAULT NULL,
  `tgl_pembelian` date DEFAULT NULL,
  `spesifikasi` varchar(500) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` bigint(20) DEFAULT NULL,
  `awal_garansi` date DEFAULT NULL,
  `akhir_garansi` date DEFAULT NULL,
  `kode_vendor` char(20) DEFAULT NULL,
  `img_objek` varchar(100) DEFAULT NULL,
  `img_kelengkapan` varchar(100) DEFAULT NULL,
  `kelengkapan` varchar(500) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `status` char(20) DEFAULT NULL,
  `kondisi_asset` varchar(100) DEFAULT NULL,
  `kepemilikan_asset` char(20) DEFAULT NULL,
  `aktif` char(10) DEFAULT NULL,
  `user_input` int(11) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL,
  `nama_karyawan` varchar(30) DEFAULT NULL,
  `divisi` varchar(100) DEFAULT NULL,
  `tipe_asset` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ta_asset`
--

INSERT INTO `ta_asset` (`id_asset`, `kode_asset`, `kode_pengajuan`, `kode_jenisasset`, `kode_kategori`, `kode_namabarang`, `merk_asset`, `tgl_pembelian`, `spesifikasi`, `jumlah`, `harga`, `awal_garansi`, `akhir_garansi`, `kode_vendor`, `img_objek`, `img_kelengkapan`, `kelengkapan`, `keterangan`, `status`, `kondisi_asset`, `kepemilikan_asset`, `aktif`, `user_input`, `tgl_input`, `nama_karyawan`, `divisi`, `tipe_asset`) VALUES
('20190527003', '19.05-3.2.1-4', NULL, 'JA-1', 'KT-2', 'BRG-4', 'asus', '2019-05-28', '1212', 1212, 1212, '2019-05-28', '2019-05-28', 'VDR-25', NULL, NULL, '1212', '1212', 'TERSEDIA', 'LAYAK', 'PERUSAHAAN', 'YES', 66, '2019-05-28', 'Moch. Iksan Tatang', 'Departemen Pengembangan Bisnis ICT & Pendukung', 'Inventaris');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_assetkendaraan`
--

CREATE TABLE IF NOT EXISTS `ta_assetkendaraan` (
  `id_assetkendaraan` char(20) NOT NULL DEFAULT '',
  `kode_asset` char(20) DEFAULT NULL,
  `no_kendaraan` char(20) DEFAULT NULL,
  `warna_kendaraan` char(50) DEFAULT NULL,
  `no_bpkb` char(20) DEFAULT NULL,
  `no_stnk` char(20) DEFAULT NULL,
  `nama_pdstnk` varchar(100) DEFAULT NULL,
  `alamat_pdstnk` varchar(500) DEFAULT NULL,
  `tahun_pembuatan` char(10) DEFAULT NULL,
  `tgl_pajak` date DEFAULT NULL,
  `img_stnk` varchar(100) DEFAULT NULL,
  `img_bpkb` varchar(100) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `user_input` int(11) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_assettnhbgn`
--

CREATE TABLE IF NOT EXISTS `ta_assettnhbgn` (
  `id_assettnhbgn` char(20) NOT NULL DEFAULT '',
  `kode_asset` char(20) DEFAULT NULL,
  `luas_tnhbgn` varchar(100) DEFAULT NULL,
  `jenissurat_tnhbgn` varchar(100) DEFAULT NULL,
  `tgl_pajak` date DEFAULT NULL,
  `lokasi_tnhbgn` varchar(250) DEFAULT NULL,
  `nama_tnhbgn` varchar(250) DEFAULT NULL,
  `img_tnhbgn` varchar(100) DEFAULT NULL,
  `latitude` char(50) DEFAULT NULL,
  `longitude` char(50) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_barcodeasset`
--

CREATE TABLE IF NOT EXISTS `ta_barcodeasset` (
  `id_barcode` varchar(20) NOT NULL DEFAULT '',
  `kode_asset` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ta_barcodeasset`
--

INSERT INTO `ta_barcodeasset` (`id_barcode`, `kode_asset`, `status`) VALUES
('201905271', '19.05-3.2.2-1', 'TERSEDIA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_distribusiasset`
--

CREATE TABLE IF NOT EXISTS `ta_distribusiasset` (
  `id_distribusi` char(20) NOT NULL DEFAULT '',
  `kode_asset` char(20) DEFAULT NULL,
  `tgl_distribusi` date DEFAULT NULL,
  `kelengkapan` varchar(500) DEFAULT NULL,
  `lokasi_distribusi` varchar(500) DEFAULT NULL,
  `penerima` int(11) DEFAULT NULL,
  `penanggung_jawab` int(11) DEFAULT NULL,
  `upload_bukti` char(100) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `status` char(100) DEFAULT NULL,
  `user_input` int(11) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_kirkendaraan`
--

CREATE TABLE IF NOT EXISTS `ta_kirkendaraan` (
  `id_kirkendaraan` char(20) NOT NULL DEFAULT '',
  `id_assetkendaraan` char(20) DEFAULT NULL,
  `tgl_kir` date DEFAULT NULL,
  `tempat_kir` varchar(500) DEFAULT NULL,
  `biaya_kir` bigint(20) DEFAULT NULL,
  `ujikir_ke` int(11) DEFAULT NULL,
  `img_kir` varchar(100) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `user_input` int(11) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_maintenkendaraan`
--

CREATE TABLE IF NOT EXISTS `ta_maintenkendaraan` (
  `id_maintenkendaraan` char(20) NOT NULL DEFAULT '',
  `id_assetkendaraan` char(20) DEFAULT NULL,
  `tgl_mainten` date DEFAULT NULL,
  `jenis_mainten` varchar(500) DEFAULT NULL,
  `kode_vendor` char(20) DEFAULT NULL,
  `biaya_mainten` bigint(20) DEFAULT NULL,
  `mainten_ke` int(11) DEFAULT NULL,
  `img_mainten` varchar(100) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `user_input` int(11) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_pajakkendaraan`
--

CREATE TABLE IF NOT EXISTS `ta_pajakkendaraan` (
  `id_pjkkendaraan` char(20) NOT NULL DEFAULT '',
  `id_assetkendaraan` char(20) DEFAULT NULL,
  `tgl_pajak` date DEFAULT NULL,
  `tahun_pajak` char(4) DEFAULT NULL,
  `kode_jnspajak` char(20) DEFAULT NULL,
  `biaya_pajak` bigint(20) DEFAULT NULL,
  `pajak_ke` int(11) DEFAULT NULL,
  `img_pajak` varchar(100) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `user_input` int(11) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_pajaktnhbgn`
--

CREATE TABLE IF NOT EXISTS `ta_pajaktnhbgn` (
  `id_pjktnhbgn` char(20) NOT NULL DEFAULT '',
  `id_assettnhbgn` char(20) DEFAULT NULL,
  `tgl_pajak` date DEFAULT NULL,
  `tahun_pajak` char(4) DEFAULT NULL,
  `kode_jnspajak` char(20) DEFAULT NULL,
  `biaya_pajak` bigint(20) DEFAULT NULL,
  `pajak_ke` int(11) DEFAULT NULL,
  `img_pajak` varchar(100) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `user_input` int(11) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_pemakaiankendaraan`
--

CREATE TABLE IF NOT EXISTS `ta_pemakaiankendaraan` (
  `id_pemakaian` char(20) NOT NULL DEFAULT '',
  `id_assetkendaraan` char(20) DEFAULT NULL,
  `tgl_awalpemakaian` date DEFAULT NULL,
  `tgl_selesaipemakaian` date DEFAULT NULL,
  `pemakai` varchar(250) DEFAULT NULL,
  `tujuan` varchar(250) DEFAULT NULL,
  `keperluan` varchar(250) DEFAULT NULL,
  `kode_sopir` int(11) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `user_input` int(11) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_peminjamanasset`
--

CREATE TABLE IF NOT EXISTS `ta_peminjamanasset` (
  `id_peminjaman` char(20) NOT NULL DEFAULT '',
  `tgl_peminjaman` date DEFAULT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `unit_peminjam` int(11) DEFAULT NULL,
  `user_peminjam` int(11) DEFAULT NULL,
  `keperluan` varchar(500) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `unit_asal` int(11) DEFAULT NULL,
  `pengguna_asal` int(11) DEFAULT NULL,
  `kode_asset` char(20) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `user_input` int(11) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_pengajuanasset`
--

CREATE TABLE IF NOT EXISTS `ta_pengajuanasset` (
  `id_pengajuan` char(16) NOT NULL DEFAULT '',
  `kode_pengajuan` char(20) DEFAULT NULL,
  `tgl_pengajuan` date DEFAULT NULL,
  `tgl_pemakaian` date DEFAULT NULL,
  `kode_jenisasset` char(20) DEFAULT NULL,
  `kode_kategori` char(20) DEFAULT NULL,
  `kode_barang` char(20) DEFAULT NULL,
  `spesifikasi_barang` varchar(500) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `kebutuhan` varchar(500) DEFAULT NULL,
  `perkiraan_harga` bigint(20) DEFAULT NULL,
  `sumber_anggaran` char(10) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `status` char(20) DEFAULT NULL,
  `ket_status` varchar(500) DEFAULT NULL,
  `tgl_penerimaan` date DEFAULT NULL,
  `pengaju` int(11) DEFAULT NULL,
  `user_input` int(11) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_perlakuanasset`
--

CREATE TABLE IF NOT EXISTS `ta_perlakuanasset` (
  `id_perlakuan` char(20) NOT NULL DEFAULT '',
  `kode_asset` char(20) DEFAULT NULL,
  `tgl_perlakuan` date DEFAULT NULL,
  `jenis_perlakuan` char(20) DEFAULT NULL,
  `detail` varchar(500) DEFAULT NULL,
  `pic` char(20) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL,
  `user_input` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_sewaasset`
--

CREATE TABLE IF NOT EXISTS `ta_sewaasset` (
  `id_asset` char(20) NOT NULL DEFAULT '',
  `kode_asset` char(20) DEFAULT NULL,
  `mulai_sewa` date DEFAULT NULL,
  `akhir_sewa` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `lama_sewa` int(11) DEFAULT NULL,
  `jenis_sewa` char(20) DEFAULT NULL,
  `harga_bulanan` bigint(20) DEFAULT NULL,
  `harga_tahunan` bigint(20) DEFAULT NULL,
  `img_bukti` varchar(100) DEFAULT NULL,
  `user_input` int(11) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_stokopname`
--

CREATE TABLE IF NOT EXISTS `ta_stokopname` (
  `id_stokopname` char(20) NOT NULL DEFAULT '',
  `tgl_stokopname` date DEFAULT NULL,
  `kode_asset` char(20) DEFAULT NULL,
  `kondisi_asset` char(50) DEFAULT NULL,
  `keterangan` text,
  `tgl_input` date DEFAULT NULL,
  `user_input` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_tglstokopname`
--

CREATE TABLE IF NOT EXISTS `ta_tglstokopname` (
  `id` int(11) NOT NULL,
  `tgl_stok_opname` date DEFAULT NULL,
  `jns_stok_opname` char(100) DEFAULT NULL,
  `status` char(20) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL,
  `user_input` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_assetopname`
--

CREATE TABLE IF NOT EXISTS `temp_assetopname` (
  `id_stokopname` char(20) NOT NULL DEFAULT '',
  `tgl_stokopname` date DEFAULT NULL,
  `kode_asset` char(20) DEFAULT NULL,
  `kondisi_asset` char(50) DEFAULT NULL,
  `keterangan` text,
  `tgl_input` date DEFAULT NULL,
  `user_input` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_bhpopname`
--

CREATE TABLE IF NOT EXISTS `temp_bhpopname` (
  `id_stokopname` char(20) NOT NULL DEFAULT '',
  `tgl_stokopname` date DEFAULT NULL,
  `barcode` char(50) DEFAULT NULL,
  `stok_data` int(11) DEFAULT NULL,
  `stok_nyata` int(11) DEFAULT NULL,
  `selisih` int(11) DEFAULT NULL,
  `keterangan` text,
  `tgl_input` date DEFAULT NULL,
  `user_input` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_login` varchar(100) DEFAULT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `user_name` varchar(200) DEFAULT NULL,
  `user_function` varchar(100) DEFAULT NULL,
  `kode_struktur` varchar(10) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `posisi` varchar(64) DEFAULT NULL,
  `nik` varchar(24) DEFAULT NULL,
  `user_avatar` varchar(30) DEFAULT NULL,
  `akses` varchar(100) DEFAULT NULL,
  `user_atasan` int(11) DEFAULT NULL,
  `sppd_atasan` int(11) DEFAULT NULL,
  `direksi_atasan` int(11) DEFAULT NULL,
  `status_atasan` varchar(50) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `rule_id` int(11) DEFAULT NULL,
  `id_struktur` int(11) DEFAULT NULL,
  `id_unitkerja` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_password`, `user_name`, `user_function`, `kode_struktur`, `jabatan`, `posisi`, `nik`, `user_avatar`, `akses`, `user_atasan`, `sppd_atasan`, `direksi_atasan`, `status_atasan`, `status`, `email`, `rule_id`, `id_struktur`, `id_unitkerja`) VALUES
(15, 'admin', 'd60b772c6205311fae6fae9f8509986da1fe7029', 'admin', '', 'ADMIN', 'Admin', NULL, NULL, '', '7', 63, 0, 0, '', 'super', 'admin', NULL, 63, 104),
(114, 'mahadiena@bijb.co.id', '26e945e40f54a0094f1d4b7e09c5da2f7a255efd', 'Mahadiena Fatmashara', 'Staf Lahan dan Perizinan', '', 'Junior Staf', 'Staf Lahan dan Perizinan', '179900089', '', NULL, 71, 71, 79, '', 'aktif', NULL, NULL, 0, 107),
(17, 'silvia@bijb.co.id', '99089e40b22a8bef5fce5c07b38a78266c521323', 'Silvia Zalzabila Kuswandi', 'Staf Pengembangan Bisnis Non-Aero', 'PB', 'Junior Staf', 'Staf Pengembangan Bisnis Non-Aero', '159900010', '', '4', 89, 89, 80, '', 'aktif', 'silvia@bijb.co.id', NULL, 0, 108),
(113, 'rinda@bijb.co.id', '79e1065c698780102d7f4db8abd8bab826025978', 'Rinda Harliana', 'Kepala Seksi Kerumahtanggaan dan Umum', '', 'Senior Staf', 'Kepala Seksi Kerumahtanggaan dan Umum', '179900091', '', NULL, 38, 38, 79, 'ats', 'aktif', NULL, NULL, 0, 116),
(19, 'ricky@bijb.co.id', '93f8116ce3b17ea6a1f5fbed6f2edb9eb41e5d20', 'M. Ricky Ariefianto', 'Staf Pengembangan Bisnis Non-Aero', 'PBP', 'Junior Staf', 'Staf Pengembangan Bisnis Non-Aero', '169900043', '', NULL, 89, 89, 80, '', 'aktif', 'ariskal16@gmail.com', NULL, 0, 108),
(20, 'annisa@bijb.co.id', '95108e72c3154568415081b7f9fa862eb2640088', 'Annisa Pangestuti', 'Kepala Departemen Manajemen Proyek', 'MP', 'Manajer', 'Kepala Departemen Manajemen Proyek', '159900019', '', NULL, 63, 63, 63, 'ats', 'aktif', 'annisa@bijb.co.id', NULL, 0, 103),
(21, 'emmy.ulfah@bijb.co.id', 'f0235f96fe9e160e1b0dd0ed906b132f8bdd2f32', 'Emmy Ulfah Utami', '', 'MP', 'Manajer', 'Kepala Departemen Perencanaan Produk dan Kemitraan', '159900017', '', NULL, 71, 71, 63, '', 'aktif', 'emmy.ulfah@bijb.co.id', NULL, 0, 107),
(72, 'alsa@bijb.co.id', 'f949bb15f709cf3bb00074d4838cb0084c27087a', 'Alsa Srijuanti', 'Bagian Umum', '', 'Non Staf', 'Bagian Umum', '169900050', '', NULL, 63, 38, 79, '', 'aktif', NULL, NULL, 0, 111),
(112, 'ermawan@bijb.co.id', '2e6199c070dd06f213da045f30670f70d371d52b', 'Ermawan Budi Nugroho', 'Staf ICT System Analyst', '', 'Junior Staf', 'Staf ICT System Analyst', '179900095', '', NULL, 93, 93, 63, '', 'aktif', NULL, NULL, 0, 104),
(24, 'dian.nurrahman@bijb.co.id', '6d8d4852e2fc814fd62d64a895ee7c609c402679', 'Dian Nurrahman', 'Kepala Divisi Supporting Bisnis dan Portofolio Investasi', 'RI', 'Senior Manajer', 'Kepala Divisi Supporting Bisnis dan Portofolio Investasi', '159900030', '', NULL, 80, 80, 80, 'ats', 'aktif', 'dian.nurrahman@bijb.co.id', NULL, 0, 112),
(25, 'hernantyo@bijb.co.id', '1ec8dd568829302717cafc5142c8a0576f4f7f4c', 'Hernantyo Setiawan', 'Kepala Divisi Perencanaan Strategis', 'PS', 'Senior Manajer', 'Kepala Divisi Perencanaan Strategis', '159900021', '', NULL, 80, 80, 63, 'ats', 'aktif', 'hernantyo@bijb.co.id', NULL, 0, 110),
(26, 'yoga@bijb.co.id', '84b9b103761851d040a3a078b10d63eeb31d78c2', 'M. Ilham Prayoga', 'Performansi & Perencanaan Strategis', 'PS', 'Junior Staf', 'Staf Manajemen Kinerja', '169900047', '', NULL, 25, 25, 63, 'ver', 'aktif', 'yoga@bijb.co.id', NULL, 0, 110),
(27, 'adi@bijb.co.id', '309d4d4ea25331877800f87b505085909f0e2d45', 'Adi Tiawarman', 'Staf Satuan Pengawas Internal\n', 'SPI', 'Senior Staf', 'Staf Satuan Pengawas Internal', '169900049', '', NULL, 103, 103, 63, '', 'aktif', 'adi@bijb.co.id', NULL, 0, 106),
(28, 'catur.sawistri@bijb.co.id', 'dd0bb1edc85de4a5f191c2367abf8a73d9fb0ca5', 'Catur Sawistri Rangkuti', 'Kepala Divisi Keuangan dan Akunting', 'KA', 'Senior Manajer', 'Kepala Divisi Keuangan dan Akunting', '149900001', '', NULL, 79, 79, 79, 'ats', 'aktif', 'catur.sawistri@bijb.co.id', NULL, 0, 105),
(29, 'lura@bijb.co.id', '822c44d6d2dd83938dd753b4dd1e31479cacb736', 'Lura Mustika Putteri', 'Staf Akunting dan Pajak', 'KA', 'Junior Staf', 'Staf Akunting dan Pajak', '159900014', '', NULL, 28, 28, 79, '', 'aktif', 'lura@bijb.co.id', NULL, 0, 105),
(30, 'dede.warsih@bijb.co.id', '891b445ec86767463df58703e0140f5349657890', 'Dede Warsih', 'Staf Keuangan', 'KA', 'Junior Staf', 'Staf Keuangan', '159900011', '', NULL, 28, 28, 79, '', 'aktif', 'dede.warsih@bijb.co.id', NULL, 0, 105),
(32, 'dicky@bijb.co.id', '5d4cc5b1be378595e6230f45a561e4c2bdf01773', 'Dicky Fria Senjaya', 'Kepala Departemen Sumber Daya Manusia', 'SDM', 'Manajer', 'Kepala Departemen Sumber Daya Manusia', '169900042', '', NULL, 79, 79, 79, 'ats', 'aktif', 'dicky@bijb.co.id', NULL, 77, 115),
(33, 'wfalosa@bijb.co.id', 'fe8629bc200dc8a95b079e8b581d3d077f800d71', 'Windha Falosa', 'Kepala Seksi Operasional SDM', 'SDM', 'Senior Staf', 'Kepala Seksi Operasional SDM', '159900033', '', NULL, 63, 32, 79, '', 'aktif', 'wfalosa@bijb.co.id', NULL, 83, 115),
(63, 'virda.dimas@bijb.co.id', 'e21a9b1d3504e196ee7527d110ab54444b9beca6', 'Virda Dimas Ekaputra', 'Direktur Utama', '', 'Direktur Utama', '', NULL, '', NULL, 63, 0, 0, 'dir', 'aktif', NULL, NULL, NULL, 111),
(68, 'ryan@bijb.co.id', 'c4c72a8ac6da94de333001fc59a49dbd4eed5e1c', 'Ryan Ramdhani', 'Plt. Kepala Seksi Pengadaan Barang dan Jasa', '', 'Senior Staf', 'Plt. Kepala Seksi Pengadaan Barang dan Jasa', '159900015', '', NULL, 86, 86, 79, '', 'aktif', NULL, NULL, 0, 117),
(36, 'juan@bijb.co.id', 'd06d536e5aff436aff3caca0cc0ca23e021183be', 'Juan Silva Febrianto P', 'Staf Administrasi Bagian Umum', 'SDM', 'Junior Staf', 'Staf Administrasi Bagian Umum', '159900013', '', NULL, 113, 113, 79, '', 'aktif', 'ariskal16@gmail.com', NULL, 0, 116),
(37, 'rangga@bijb.co.id', '2709e3761e4d77eb9722464e1a53664cde172eca', 'Rangga Alam Purnama', 'Staf Personalia', 'SDM', 'Junior Staf', 'Staf Personalia', '159900035', '', NULL, 63, 32, 79, '', 'aktif', 'rangga@bijb.co.id', NULL, 95, 115),
(38, 'ardinal@bijb.co.id', 'a04980e616a130d9853971678991dbfeb33a094d', 'Ardinal', 'Kepala Departemen Pendukung', 'LEG', 'Manajer', 'Kepala Departemen Pendukung', '159900020', '', NULL, 63, 79, 79, 'ats', 'aktif', 'ardinal@bijb.co.id', NULL, 73, 116),
(39, 'handika@bijb.co.id', 'fe9aebe755f9f071b4a8d9ad269ef4be3f2e780d', 'Handika Suryo', 'Plt. Kepala Deparatemen Legal', 'LEG', 'Manajer', 'Plt. Kepala Deparatemen Legal', '159900027', '', NULL, 63, 100, 63, '', 'aktif', 'handika@bijb.co.id', NULL, 0, 113),
(111, 'dida@bijb.co.id', '8bff124a15dbaa8e8215825bdcf0eb693750df71', 'Dida Yuda Prasetia', 'Staf Manajemen Proyek', '', 'Senior Staf', 'Staf Manajemen Proyek', '179900094', '', NULL, 20, 20, 63, '', 'aktif', NULL, NULL, 0, 103),
(41, 'anita@bijb.co.id', '4abf91d44a52da6645b361ee615aa4875a48c890', 'Anita Tresnawaty', 'Kepala Seksi Sekretaris Direksi', 'SP', 'Senior Staf', 'Kepala Seksi Sekretaris Direksi', '159900029', '', NULL, 63, 100, 63, '', 'aktif', 'anita@bijb.co.id', NULL, 82, 113),
(42, 'aradea@bijb.co.id', '3e9011d4cb2410478c29f2a923c1d52a9dbbde40', 'Aradea Adisudarma', 'Sekretaris Perusahaan', 'SP', 'Senior Staf', 'Staf Hubungan Masyarakat dan Dokumentasi', '159900023', '', NULL, 63, 100, 63, '', 'aktif', 'aradea@bijb.co.id', NULL, 90, 113),
(43, 'alamanda@bijb.co.id', '16cb682f157876032fa62107d22d0614c3f6a251', 'R. Ghassani Alamanda', 'Staf Sekretaris Komisaris', 'SP', 'Junior Staf', 'Staf Sekretaris Komisaris', '169900044', '', NULL, 63, 100, 63, '', 'aktif', 'alamanda@bijb.co.id', NULL, 96, 113),
(44, 'intan@bijb.co.id', 'f71a1ee66ba3c96187eda66f6ea02c0753e38280', 'Intan Noor Annisa', 'Staf Satuan Pengawas Internal', 'SP', 'Junior Staf', 'Staf Satuan Pengawas Internal', '159900012', '', NULL, 63, 103, 63, '', 'aktif', 'intan@bijb.co.id', NULL, 65, 106),
(45, ' asep.solihin@bijb.co.id ', '5c861632e04cb63ab13dce7f37d5107bf43f08dc', 'Asep Solihin ', 'Bagian Umum', 'GA', 'Non Staf', 'Bagian Umum', '159900028', '', NULL, 63, 38, 79, '', 'aktif', ' asep.solihin@bijb.co.id ', NULL, 71, 111),
(46, ' jessy@bijb.co.id ', '837025a536f4ed2efe98ccdaceda87d07f32d664', 'Jessy Zulhiansyah Rahmadi ', 'Bagian Umum', 'GA', 'Non Staf', 'Driver', '159900022', '', NULL, 63, 38, 79, '', 'aktif', ' jessy@bijb.co.id ', NULL, 71, 111),
(47, ' asep.fahar@bijb.co.id ', 'ef59d86c872b34f786d53e6e20bd92e399ce144c', 'Asep Fajar ', 'Supir Direksi', 'GA', 'Non Staf', 'Driver', '159900026', '', NULL, 63, 38, 79, '', 'aktif', ' asep.fahar@bijb.co.id ', NULL, 71, 111),
(48, 'muhamad.nurinsani@bijb.co.id', 'cefb2e6a2b4c3c0f080d9850be157123557a28b4', 'Muhamad Nur Insani ', 'Staf Manajemen Asset\n', 'GA', 'Junior Staf', 'Staf Manajemen Asset\n', '159900031', '', NULL, 113, 113, 79, '', 'aktif', ' nur.insani@bijb.co.id ', NULL, 0, 116),
(49, 'suryono@bijb.co.id', 'ceb9e19b636ec5b5911aca7dd686e4d6890c0b34', 'Suryono', 'Supir', 'GA', 'Non Staf', 'Driver', '159900005', '', NULL, 63, 38, 79, '', 'aktif', 'suryono@bijb.co.id', NULL, 97, 111),
(50, 'hendi@bijb.co.id', 'b763e28ff8679b09bc429c3e532f7f26daa4d78d', 'Hendi Kuswary', 'Supir Direksi', 'GA', 'Non Staf', 'Driver', '149900004', '', NULL, 63, 38, 79, '', 'aktif', 'hendi@bijb.co.id', NULL, 0, 111),
(70, 'ali@bijb.co.id', '55683e11a9c59e5df2f8fb9538174788ae3f1c15', 'Ali Zakaria', 'Kepala Departemen Supporting Bisnis', 'S', 'Manajer', 'Kepala Departemen Supporting Bisnis', '169900051', '', NULL, 63, 24, 80, 'ats', 'aktif', NULL, NULL, 98, 112),
(71, 'alfiansyah@bijb.co.id', 'f5171cadfb79982f8e62fb7d5da1a9c43e88f0c9', 'Alfiansyah', 'Kepala Divisi Pengembangan Aerocity', '', 'Senior Manajer', 'Kepala Divisi Pengembangan Aerocity', '169900058', '', NULL, 63, 63, 63, 'ats', 'aktif', NULL, NULL, 0, 107),
(52, 'khuzaimiyah@bijb.co.id', '1db11f8b2a2a2448975187ac282eb6303ee0274f', 'Khuzaimiyah Wati Jamal', 'Staf Administrasi Dokumen dan Tata Naskah', 'SDM', 'Junior Staf', 'Staf Administrasi Dokumen dan Tata Naskah', '169900052', '', NULL, 63, 38, 79, '', 'aktif', 'khuzaimiyah@bijb.co.id', NULL, 64, 111),
(109, 'meni@bijb.co.id', 'ef785ef9615e4a65c3e53000fb1eaba016b98d45', 'Meni Sunarni', 'Staf Anggaran', '', 'Junior Staf', 'Staf Anggaran', '179900087', '', NULL, 28, 28, 79, '', 'aktif', NULL, NULL, 0, 105),
(110, 'atika@bijb.co.id', 'a0bd0c650b99a8dacae838c2a4c3dd14ccff8908', 'Atika Almira', 'Staf Perencanaan Produk', '', 'Junior Staf', 'Staf Perencanaan Produk', '179900088', '', NULL, 21, 71, 63, '', 'aktif', NULL, NULL, 0, 107),
(66, 'kusnandar@bijb.co.id', '3e36740eb81cadc95cc2e4e703f0a60713a2b026', 'Kusnandar', 'Kepala Seksi Pengembangan Prosedur dan Teknologi Informasi', '', 'Senior Staf', 'Kepala Seksi Pengembangan Prosedur dan Teknologi Informasi', '149900002', '66.jpg', NULL, 93, 93, 63, '', 'aktif', NULL, NULL, 0, 104),
(75, 'udin@bijb.co.id', 'f9a6f65ec1b70333c8d21faa097156b7bafbdc0e', 'Udin Saripudin', '', '', 'Non Staf', NULL, NULL, '', NULL, 63, 0, 79, '', 'aktif', NULL, NULL, 0, 111),
(69, 'hilman@bijb.co.id', '4ef6d5bf12f7a2ad996269aeb4e3ea07e157219c', 'Hilman Arrasyid', 'Staf Perencanaan Proyek', '', 'Senior Staf', 'Staf Perencanaan Proyek', '169900046', '', NULL, 63, 20, 63, '', 'aktif', NULL, NULL, 12, 103),
(73, 'faradiani@bijb.co.id', '81eca4aed3c343e0995142fb2794ae15206f0cef', 'Faradiani Sekar Putri', 'Staf Pengembangan Bisnis Aero', '', 'Junior Staf', 'Staf Pengembangan Bisnis Aero', '169900056', '', NULL, 90, 90, 80, '', 'aktif', NULL, NULL, 0, 108),
(74, 'ginanjar@bijb.co.id', '8eac35314954cc6a5f343a82816c4fa6fd5581b9', 'Maulana Ginanjar Rachmandani', 'Kepala Departemen Lahan dan Perizinan', '', 'Manajer', 'Kepala Departemen Lahan dan Perizinan', '169900059', '', NULL, 63, 71, 79, '', 'aktif', NULL, NULL, 0, 107),
(76, 'rai@bijb.co.id', '388e483073be5d955442c1197b3b340b710be3d5', 'Rai Raksa Muhamad', 'Service Solution', '', 'Junior Staf', 'Service Solution', '179900082', '', NULL, 66, 93, 63, '', 'aktif', NULL, NULL, 99, 104),
(108, 'kenjana@bijb.co.id', 'd4f9ddc53fb168a834724af07f593e88737a0958', 'Kenjana Maudi Aulia', 'Staf Evaluasi Proyek', '', 'Junior Staf', 'Staf Evaluasi Proyek', '179900086', '', NULL, 20, 20, 63, '', 'aktif', NULL, NULL, 0, 103),
(78, 'andri@bijb.co.id', '05ebb7a6e54bc119e21e9a7a9082ce3137d90326', 'Andri Rayindra', 'Staf Legal', '', 'Junior Staf', 'Staff Legal', '169900060', '', NULL, 39, 39, 63, '', 'aktif', NULL, NULL, 0, 113),
(79, 'm.singgih@bijb.co.id', '99039c2df8589af9881e73011993e7c15c843b24', 'Muhamad Singgih', '', '', 'Direksi Komisaris', '', NULL, '', NULL, 63, 63, 0, 'dir', 'aktif', NULL, NULL, 101, 111),
(80, 'erwin@bijb.co.id', 'dbf756837b7eb30e7f5d2e1a5783719a130deec7', 'Erwin Syahputra', '', '', 'Direksi Komisaris', 'Direksi', NULL, '', NULL, 63, 63, 0, 'dir', 'aktif', NULL, NULL, 0, 111),
(81, 'tulus@bijb.co.id', '619c9492a694bc5352a07d2b28eb7cbab0743f0c', 'Tulus Pranowo', '', '', 'Direksi Komisaris', '', NULL, '', NULL, 63, 0, 0, '', 'aktif', NULL, 1, 0, 0),
(82, 'mit@bijb.co.id', '51542a3ef554196bf136fd98ef72ff631bf2b7e3', 'Moch. Iksan Tatang', '', '', 'Direksi Komisaris', '', NULL, '', NULL, 63, 0, 0, '', 'aktif', NULL, 1, 0, 0),
(83, 'aang@bijb.co.id', '491baa15bf6959d9f8ad847ed0f5593e1a493820', 'Aang Hamid Suganda', '', '', 'Direksi Komisaris', '', NULL, '', NULL, 63, 0, 0, '', 'aktif', NULL, 1, 0, 0),
(84, 'dilla.ibtida@bijb.co.id', '827effcdee4ed092bc5de99218c9a05672623d71', 'Dilla Duriatul Ibtida', 'Staf Relasi Investor', '', 'Senior Staf', 'Staf Relasi Investor', '169900055', '', NULL, 24, 24, 80, '', 'aktif', NULL, NULL, 20, 112),
(85, 'jamalis@bijb.co.id', '179c7617a89b833a07d42390e11c10fdab9459d0', 'Jamalis', 'Kepala Seksi Administrasi Dokumen dan Tata Naskah', '', 'Senior Staf', 'Kepala Seksi Administrasi Dokumen dan Tata Naskah', '169900065', '', NULL, 63, 38, 79, '', 'aktif', NULL, NULL, 9, 116),
(86, 'bambang@bijb.co.id', 'f8f1fe5649f8ec61cf5751df0078f51d7544be23', 'Bambang Trisilo', 'Kepala Departemen Pengadaan Barang dan Jasa', '', 'Manajer', 'Kepala Departemen Pengadaan Barang dan Jasa', '169900064', '', NULL, 63, 79, 79, 'ats', 'aktif', NULL, NULL, 9, 117),
(87, 'ariskal@bijb.co.id', 'eadfd847702a026a2924fde45f7086dc7ea3afde', 'Ariskal Munandar', 'Staf Evaluasi dan Monitoring Proyek', '', 'Junior Staf', 'Staf Evaluasi dan Monitoring Proyek', '169900066', '', NULL, 63, 20, 63, '', 'aktif', NULL, NULL, 12, 103),
(88, 'subagio@bijb.co.id', '1e83afbc803106143da60db19e39489ea592f621', 'Subagio Basiran', 'Kepala Divisi Perencanaan Operasional', '', 'Senior Manajer', 'Kepala Divisi Perencanaan Operasional', '169900069', '', NULL, 63, 80, 80, 'ats', 'aktif', NULL, NULL, 0, 109),
(89, 'sudibyo@bijb.co.id', 'c8c42fc502f41f8fe4eda33e62d95ba5dc4db295', 'Sudibyo', 'Kepala Departemen Pengembangan Bisnis Non-Aero', '', 'Manajer', 'Kepala Departemen Pengembangan Bisnis Non-Aero', '169900068', '', NULL, 25, 25, 80, 'ats', 'aktif', NULL, NULL, 0, 108),
(90, 'agus.kemal@bijb.co.id', 'cccd42f99beb085b0026b81b60d6794eb3c9b9f8', 'Agus Kemal', 'Kepala Departemen Pengembangan Bisnis Aero', '', 'Manajer', 'Kepala Departemen Pengembangan Bisnis Aero', '169900067', '', NULL, 25, 25, 80, 'ats', 'aktif', NULL, NULL, 0, 108),
(91, 'guest', 'f41782d3a63b43ab6d5209dc251fb4485ca27ba0', 'Guest', '', '', 'Non Staf', 'Staf Magang', NULL, '', NULL, 15, 0, 0, '', 'aktif', NULL, NULL, 0, 0),
(92, 'j.ginanjar@bijb.co.id', '82b1c1b5dafa70e1726673143b0564c3bd7ede14', 'Jajang Ginanjar', 'Staf Kemitraan', '', 'Senior Staf', 'Staf Kemitraan', '169900070', '', NULL, 63, 71, 63, '', 'aktif', NULL, NULL, 15, 107),
(93, 'dadan@bijb.co.id', 'e53b5725f5db077fbff9f9a84457a97d47fdfcac', 'A Dadan Hadiana', 'Kepala Departemen Pengembangan Bisnis ICT dan Pendukung', '', 'Manajer', 'Kepala Departemen Pengembangan Bisnis ICT dan Pendukung', '179900071', '', NULL, 63, 63, 63, 'ats', 'aktif', NULL, NULL, 1, 104),
(94, 'johnny.patta@gmail.com', 'bdef60ad2ff55d3867850bcef7db936f9d13efe2', 'Johnny Patta', '', '', 'Manajer', 'Stakeholder Management', NULL, '', NULL, 63, 0, 0, '', 'aktif', NULL, NULL, 0, 0),
(95, 'ananda@bijb.co.id', 'ac25a3e401f9e7d34fb49eeac0c93e2a4c7b9ca3', 'Ananda Suci Munggaran', 'Staf Relasi Investor', '', 'Junior Staf', 'Staf Relasi Investor', '179900075', '', NULL, 63, 24, 80, '', 'aktif', NULL, NULL, 0, 112),
(135, 'dendi@bijb.co.id', 'd53f3597ff7c65ba9a8341d467463cc037526143', 'Dendi Dewantoro', '', '', 'Junior Staf', 'Staf satuan Pengawas Internal', NULL, '', NULL, 103, 0, 0, '', 'aktif', NULL, NULL, 0, 0),
(97, 'leni@bijb.co.id', 'cc2e2e950073603aa6d72f0c79cd6c7788aa8912', 'Leni Jayanti', 'Staf Sistem dan Prosedur', '', 'Junior Staf', 'Staf Sistem dan Prosedur', '179900074', '', NULL, 63, 93, 0, '', 'aktif', NULL, NULL, 99, 104),
(98, 'ibnu@bijb.co.id', '1ee61b0a0bdd27d5699af00560c1abf548cd5d7e', 'Ibnu Sabilhaq', 'Staf Legal', '', 'Senior Staf', 'Staf Legal', '179900073', '', NULL, 63, 39, 63, '', 'aktif', NULL, NULL, 0, 113),
(99, 'intan.hilmi@bijb.co.id', '889fb012383f0d3b3d1de100ee2e78ea239d014c', 'Intan Nur Hilmi', 'Staf Manajemen Kinerja', '', 'Senior Staf', 'Staf Manajemen Kinerja', '179900076', '', NULL, 63, 25, 63, 'ver', 'aktif', NULL, NULL, 85, 110),
(100, 'wasfan@bijb.co.id', '6547c349e9e65ff012fb6ff17b2a32cefd92ab1c', 'Wasfan Wahyu Widodo', 'Kepala Divisi Sekretaris Perusahaan', '', 'Senior Manajer', 'Kepala Divisi Sekretaris Perusahaan', '179900077', '', NULL, 63, 63, 63, 'ats', 'aktif', NULL, NULL, 0, 113),
(101, 'nadia.ump@bijb.co.id', '01067aa245b6fa2bda91c1cb55c5d87509b6db7f', 'Nadia Maulina', '', '', 'Junior Staf', 'Administrasi Dokumentasi', NULL, '', NULL, 63, 0, 0, '', 'aktif', NULL, NULL, 0, 111),
(102, 'imron@bijb.co.id', 'ea817a36a942d93d34feae70ddcd8c66e282391a', 'Imron Junaidi', 'Supir Direksi', '', 'Non Staf', 'Driver', '179900078', '', NULL, 63, 38, 63, '', 'aktif', NULL, NULL, 0, 111),
(103, 'losa@bijb.co.id', '80902e1e8c270990e2a3c3d612ab8dfd0e11e6f5', 'Losa Priyaman', 'Kepala Divisi Satuan Pengawas Internal dan Manajemen Risiko', '', 'Senior Manajer', 'Kepala Divisi Satuan Pengawas Internal dan Manajemen Risiko', '179900081', '', NULL, 63, 63, 63, 'ats', 'aktif', NULL, NULL, 0, 106),
(105, 'bintoro@bijb.co.id', '0bb897b193cd3f5b340c8d85a95bc4ae6635938b', 'Bintoro Wicaksono', 'Kepala Seksi Pengembangan SDM', '', 'Senior Staf', 'Kepala Seksi Pengembangan SDM', '179900085', '', NULL, 63, 32, 79, '', 'aktif', NULL, NULL, 0, 115),
(106, 'andy@bijb.co.id', 'e67675e15e2be0bf3e8b89495da0669ac1c88398', 'Andy Samsul Arifin', 'Kepala Departemen Kesiapan Operasional', '', 'Manajer', 'Kepala Departemen Kesiapan Operasional', '179900083', '', NULL, 88, 88, 80, 'ats', 'aktif', NULL, NULL, 0, 109),
(107, 'slamet@bijb.co.id', '617b63846025d9af24bdb77b5f252126c7abea64', 'Slamet Rahardjo', 'Kepala Departemen Kesiapan Fasilitas', '', 'Manajer', 'Kepala Departemen Kesiapan Fasilitas', '179900084', '', NULL, 88, 88, 80, '', 'aktif', NULL, NULL, 0, 109),
(115, 'popy@bijb.co.id', 'b12f13ece43d4373ec915833a5e78b6e2981d93c', 'Popy Dewi Lestari', 'Staf Pengembangan Bisnis Aero', '', 'Junior Staf', 'Staf Pengembangan Bisnis Aero', '179900090', '', NULL, 90, 90, 80, '', 'aktif', NULL, NULL, 0, 108),
(116, 'kiki.amelia@bijb.co.id', '41623a6b615675a36aa09171b91f48ab0f0f9e19', 'Kiki Putri Amelia', 'Staf Kesiapan Operasional', '', 'Junior Staf', 'Staf Kesiapan Operasional', '179900093', '', NULL, 0, 106, 80, '', 'aktif', NULL, NULL, 0, 109),
(117, 'geusanfachreza@bijb.co.id', 'ef84c4e032825023534836e5b2341966909aaea3', 'Muhammad Geusan Fachreza', 'Staf Kesiapan Fasilitas', '', 'Junior Staf', 'Staf Kesiapan Fasilitas', '179900096', '', NULL, 0, 107, 80, '', 'aktif', NULL, NULL, 0, 109),
(118, 'teddy.hidayat@bijb.co.id', '03a030df46eb65de6bace0e144115c84d6169cd8', 'Teddy Hidayat', 'Supir', '', 'Non Staf', 'Driver', '179900092', '', NULL, 0, 38, 79, '', 'aktif', NULL, NULL, 0, 111),
(119, 'Driver', 'e29fd1b43ea26688a07d4f14dbbc3d5b64e7a95b', 'Driver', '', '', 'Non Staf', 'Driver', NULL, '', NULL, 36, 0, 0, '', 'aktif', NULL, NULL, 0, 111),
(120, 'deden@bijb.co.id', '483966c26bcd6ac6463a20989b481c560d59e947', 'Deden Deni Ari Sukandar', 'Staf Manajemen Jaringan', '', 'Senior Staf', 'Staf Manajemen Jaringan', '179900097', '', NULL, 93, 93, 63, '', 'aktif', NULL, NULL, 0, 104),
(121, 'rayiprastiti@gmail.com', 'd609d263c24009c76fb639b16d25fc67a1c34fef', 'Rayi Prastiti', '', '', 'Non Staf', 'Magang', NULL, '', NULL, 25, 0, 0, '', 'aktif', NULL, NULL, 85, 110),
(122, 'sbmitb', '3631f3ffe145e81b09903d69ab41395ef6f65898', 'SBM ITB', '', '', 'Non Staf', '', NULL, '', NULL, 0, 0, 0, '', 'aktif', NULL, NULL, 0, 111),
(123, 'jmt', '069a3f811a0de9ed0966c25dd029327519d700aa', 'JMT', '', '', 'Non Staf', 'Auditor', NULL, '', NULL, 0, 0, 0, '', 'aktif', NULL, NULL, 0, 0),
(124, 'saepudin@bijb.co.id', '5b8cbd26f4330e8f0a9a45013aa24ebe76c4ffb5', 'Saepudin', 'Security', '', 'Non Staf', 'Security', '179900080', '', NULL, 36, 0, 0, '', 'aktif', NULL, NULL, 0, 0),
(125, 'annisa.ilmianti@bijb.co.id', 'a3c93eb81499dbd4154670d80bf11763955e1e89', 'Annisa Nur Ilmianti', '', '', 'Junior Staf', 'Manajemen Pelaporan', NULL, '', NULL, 100, 100, 0, '', 'aktif', NULL, NULL, 82, 113),
(126, 'intan.sp@bijb.co.id', '3b4cef0baa6283929e1b181973fc7a7d6acd2cfd', 'Intan Noor Annisa SP', '', '', 'Junior Staf', '', NULL, '', NULL, 63, 100, 63, '', 'aktif', NULL, NULL, 82, 113),
(127, 'karyawan@bijb.co.id', 'bd40bb5b349fca17a4f2991ca893411d21fcb8c8', 'Dicky F Senjaya', 'Kepala Departemen Sumber Daya Manusia', '', 'Manajer', 'Seluruh Staff', NULL, '', NULL, 63, 63, 63, '', 'aktif', NULL, NULL, 0, 115),
(128, 'nizar@bijb.co.id', 'ab8e363db4901e96350d0fbdc628af84732c8bb9', 'Muhamad Nizar Novianto', '', '', 'Junior Staf', 'Staf Administrasi Tata Naskah dan Dokumen', NULL, '', NULL, 85, 0, 0, '', 'aktif', NULL, NULL, 0, 0),
(129, 'rachmatullah@bijb.co.id', '683ce2a3b0e5eb47d420bc32005f35b33594d872', 'Rachmatullah', '', '', 'Non Staf', 'Driver', NULL, '', NULL, 36, 0, 0, '', 'aktif', NULL, NULL, 0, 0),
(130, 'billy@bijb.co.id', '9b4c1f8c97fb2f915e34029434aa8744ce90b422', 'Billy Muhamad', 'Staf Penerima Hasil Pekerjaan', '', 'Senior Staf', 'Staf Penerima Hasil Pekerjaan', NULL, '', NULL, 86, 86, 79, '', 'aktif', NULL, NULL, 117, 117),
(133, 'olfi@bijb.co.id', '5a3c50c54227f46e1e9f6b4897d15e9ac3b0d303', 'Olfi Fitri Hasanah', 'Staf', '', 'Junior Staf', 'Staf', NULL, '', NULL, 86, 0, 0, '', 'aktif', NULL, NULL, 0, 0),
(134, 'fitha@bijb.co.id', '1A56555B41694C8AFC0AAF3EA6E6DC32F3C34ECE', 'Fitha Fitri', 'Staf Manajemen Proyek', '', 'Senior Staf', 'Staf Manajemen Proyek', NULL, '', NULL, 20, 20, 63, '', 'aktif', NULL, NULL, 103, 103),
(136, 'lingkan@bijb.co.id', '11ceb8427236af37c340871aedffc8b76b47fada', 'Lingkan Cahya Mawarlin', '', '', 'Junior Staf', 'Staf Anggaran', NULL, '', NULL, 28, 0, 0, '', 'aktif', NULL, NULL, 0, 0),
(137, 'irfan.pemprov', 'b6230f5e6e94952a3519dc3df2c0d53917fa67e2', 'Irfan Hadisiswanto', '', '', 'Direktur Utama', 'Pemegang Saham', NULL, '', NULL, 63, 0, 0, '', 'aktif', NULL, 1, 0, 0),
(138, 'arifin.pemprov', 'f64c0aece28b1e7a9da912b1a2aaddb219224799', 'Arifin', '', '', 'Direktur Utama', 'Pemegang Saham', NULL, '', NULL, 63, 0, 0, '', 'aktif', NULL, 1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bhp_kodemanual`
--
ALTER TABLE `bhp_kodemanual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bhp_master`
--
ALTER TABLE `bhp_master`
  ADD PRIMARY KEY (`barcode`);

--
-- Indexes for table `bhp_pengajuan`
--
ALTER TABLE `bhp_pengajuan`
  ADD PRIMARY KEY (`kode_pengajuan`);

--
-- Indexes for table `bhp_pengajuandetail`
--
ALTER TABLE `bhp_pengajuandetail`
  ADD PRIMARY KEY (`id_pengajuandet`);

--
-- Indexes for table `bhp_satuanbarang`
--
ALTER TABLE `bhp_satuanbarang`
  ADD PRIMARY KEY (`kode_satuan`);

--
-- Indexes for table `bhp_stok`
--
ALTER TABLE `bhp_stok`
  ADD PRIMARY KEY (`barcode`);

--
-- Indexes for table `bhp_stokopname`
--
ALTER TABLE `bhp_stokopname`
  ADD PRIMARY KEY (`id_stokopname`);

--
-- Indexes for table `bhp_transaksi`
--
ALTER TABLE `bhp_transaksi`
  ADD PRIMARY KEY (`id_transaksiphb`);

--
-- Indexes for table `ma_jenisasset`
--
ALTER TABLE `ma_jenisasset`
  ADD PRIMARY KEY (`kode_jenisasset`);

--
-- Indexes for table `ma_jenispajak`
--
ALTER TABLE `ma_jenispajak`
  ADD PRIMARY KEY (`kode_jnspajak`);

--
-- Indexes for table `ma_jenispenyedia`
--
ALTER TABLE `ma_jenispenyedia`
  ADD PRIMARY KEY (`kode_jnspenyedia`);

--
-- Indexes for table `ma_jenisperlakuan`
--
ALTER TABLE `ma_jenisperlakuan`
  ADD PRIMARY KEY (`kode_jnsperlakuan`);

--
-- Indexes for table `ma_kategoriasset`
--
ALTER TABLE `ma_kategoriasset`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `ma_kondisiasset`
--
ALTER TABLE `ma_kondisiasset`
  ADD PRIMARY KEY (`kode_kondisiasset`);

--
-- Indexes for table `ma_namabarang`
--
ALTER TABLE `ma_namabarang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `ma_sequence`
--
ALTER TABLE `ma_sequence`
  ADD PRIMARY KEY (`sequenceid`);

--
-- Indexes for table `ma_status`
--
ALTER TABLE `ma_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `ma_sumberanggaran`
--
ALTER TABLE `ma_sumberanggaran`
  ADD PRIMARY KEY (`kode_sumberanggaran`);

--
-- Indexes for table `ma_vendor`
--
ALTER TABLE `ma_vendor`
  ADD PRIMARY KEY (`kode_vendor`);

--
-- Indexes for table `struktur`
--
ALTER TABLE `struktur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ta_asset`
--
ALTER TABLE `ta_asset`
  ADD PRIMARY KEY (`id_asset`);

--
-- Indexes for table `ta_assetkendaraan`
--
ALTER TABLE `ta_assetkendaraan`
  ADD PRIMARY KEY (`id_assetkendaraan`);

--
-- Indexes for table `ta_assettnhbgn`
--
ALTER TABLE `ta_assettnhbgn`
  ADD PRIMARY KEY (`id_assettnhbgn`);

--
-- Indexes for table `ta_barcodeasset`
--
ALTER TABLE `ta_barcodeasset`
  ADD PRIMARY KEY (`id_barcode`);

--
-- Indexes for table `ta_distribusiasset`
--
ALTER TABLE `ta_distribusiasset`
  ADD PRIMARY KEY (`id_distribusi`);

--
-- Indexes for table `ta_kirkendaraan`
--
ALTER TABLE `ta_kirkendaraan`
  ADD PRIMARY KEY (`id_kirkendaraan`);

--
-- Indexes for table `ta_maintenkendaraan`
--
ALTER TABLE `ta_maintenkendaraan`
  ADD PRIMARY KEY (`id_maintenkendaraan`);

--
-- Indexes for table `ta_pajakkendaraan`
--
ALTER TABLE `ta_pajakkendaraan`
  ADD PRIMARY KEY (`id_pjkkendaraan`);

--
-- Indexes for table `ta_pajaktnhbgn`
--
ALTER TABLE `ta_pajaktnhbgn`
  ADD PRIMARY KEY (`id_pjktnhbgn`);

--
-- Indexes for table `ta_pemakaiankendaraan`
--
ALTER TABLE `ta_pemakaiankendaraan`
  ADD PRIMARY KEY (`id_pemakaian`);

--
-- Indexes for table `ta_peminjamanasset`
--
ALTER TABLE `ta_peminjamanasset`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `ta_pengajuanasset`
--
ALTER TABLE `ta_pengajuanasset`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `ta_perlakuanasset`
--
ALTER TABLE `ta_perlakuanasset`
  ADD PRIMARY KEY (`id_perlakuan`);

--
-- Indexes for table `ta_sewaasset`
--
ALTER TABLE `ta_sewaasset`
  ADD PRIMARY KEY (`id_asset`);

--
-- Indexes for table `ta_stokopname`
--
ALTER TABLE `ta_stokopname`
  ADD PRIMARY KEY (`id_stokopname`);

--
-- Indexes for table `ta_tglstokopname`
--
ALTER TABLE `ta_tglstokopname`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_assetopname`
--
ALTER TABLE `temp_assetopname`
  ADD PRIMARY KEY (`id_stokopname`);

--
-- Indexes for table `temp_bhpopname`
--
ALTER TABLE `temp_bhpopname`
  ADD PRIMARY KEY (`id_stokopname`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD KEY `fk_rule` (`rule_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bhp_kodemanual`
--
ALTER TABLE `bhp_kodemanual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ma_sequence`
--
ALTER TABLE `ma_sequence`
  MODIFY `sequenceid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `ta_tglstokopname`
--
ALTER TABLE `ta_tglstokopname`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
