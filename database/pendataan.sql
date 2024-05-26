-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Bulan Mei 2024 pada 08.28
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendataan2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `batal_pindah`
--

CREATE TABLE `batal_pindah` (
  `id_batal_pindah` int(50) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `alamat_batal_pindah` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tanggal_batal_pindah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `batal_pindah`
--

INSERT INTO `batal_pindah` (`id_batal_pindah`, `id_pejabat`, `nik`, `alamat_batal_pindah`, `foto`, `tanggal_batal_pindah`) VALUES
(1, 1, '2147483647', 'bhbhjbjhb', '', '2019-11-15'),
(2, 1, '42432', '6', '', '2019-11-15'),
(3, 1, '3215260112990001', 'dfdfdsfsd', '', '2019-11-25'),
(4, 2, '12345622222', 'JL Raya puspitek serpong, gang salem 3fgf', '', '2024-05-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `belum_menikah`
--

CREATE TABLE `belum_menikah` (
  `id_belum_menikah` int(50) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `surat_pengantar` varchar(255) NOT NULL,
  `tanggal_belum_menikah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `belum_menikah`
--

INSERT INTO `belum_menikah` (`id_belum_menikah`, `id_pejabat`, `nik`, `surat_pengantar`, `tanggal_belum_menikah`) VALUES
(1, 1, '123456789', '', '2019-11-15'),
(2, 1, '3215260112990001', '', '2019-11-25'),
(3, 0, '36756465', '', '2024-05-01'),
(4, 0, '36756465', '', '2024-05-01'),
(5, 0, '', '', '2024-05-24'),
(6, 0, '', '', '2024-05-24'),
(7, 0, '', '', '2024-05-24'),
(8, 0, '', '', '2024-05-24'),
(9, 0, '', '', '2024-05-24'),
(10, 0, '', '', '2024-05-24'),
(11, 0, '', '', '2024-05-24'),
(12, 0, '', '', '2024-05-24'),
(13, 0, '', '', '2024-05-24'),
(14, 0, '', '', '2024-05-24'),
(16, 2, '3215260401050001', '', '2024-05-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `belum_sekolah`
--

CREATE TABLE `belum_sekolah` (
  `id_belum_sekolah` int(50) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `tanggal_belum_sekolah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `belum_sekolah`
--

INSERT INTO `belum_sekolah` (`id_belum_sekolah`, `id_pejabat`, `nik`, `tanggal_belum_sekolah`) VALUES
(1, 1, '42432', '2019-11-15'),
(2, 1, '3215260112990001', '2019-11-25'),
(3, 1, '12345622222', '2024-05-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cerai_mati`
--

CREATE TABLE `cerai_mati` (
  `id_cerai_mati` int(50) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tanggal_cerai_mati` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cerai_mati`
--

INSERT INTO `cerai_mati` (`id_cerai_mati`, `id_pejabat`, `nik`, `foto`, `tanggal_cerai_mati`) VALUES
(1, 1, '123456789', '', '2019-11-14'),
(2, 1, '3215260112990001', '', '2019-11-25'),
(3, 2, '12345622222', '', '2024-05-25'),
(4, 1, '12345622222', '', '2024-05-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `domisili`
--

CREATE TABLE `domisili` (
  `id_domisili` int(50) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `no_surat_rt` varchar(255) NOT NULL,
  `tanggal_domisili` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `domisili`
--

INSERT INTO `domisili` (`id_domisili`, `id_pejabat`, `nik`, `no_surat_rt`, `tanggal_domisili`) VALUES
(2, 1, '123456789', '1', '2019-11-15'),
(3, 1, '12312421424', '123', '2019-11-21'),
(4, 1, '321560400820003', '123', '2019-11-23'),
(5, 2, '3215260112990001', 'svsd', '2024-05-21'),
(6, 1, '123456', 'oo000', '2024-05-19'),
(7, 2, '123456', '00', '2024-05-21'),
(8, 1, '12345622222', '890090', '2024-05-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `haji`
--

CREATE TABLE `haji` (
  `id_haji` int(50) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tanggal_haji` date NOT NULL,
  `tanggal_berangkat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `haji`
--

INSERT INTO `haji` (`id_haji`, `id_pejabat`, `nik`, `foto`, `tanggal_haji`, `tanggal_berangkat`) VALUES
(3, 1, '232323423', '', '2019-11-15', '0000-00-00'),
(4, 1, '12346777', '', '2019-11-15', '0000-00-00'),
(5, 1, '123456789', '', '2019-11-15', '0000-00-00'),
(6, 1, '3215260607060001', '', '2019-11-25', '0000-00-00'),
(7, 2, '12345622222', '', '2024-05-26', '2024-06-08'),
(8, 1, '12345622222', '', '2024-05-26', '2024-05-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `izin_keluarga`
--

CREATE TABLE `izin_keluarga` (
  `id_izin_keluarga` int(50) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik_ayah` varchar(30) NOT NULL,
  `nik_anak` varchar(30) NOT NULL,
  `tujuan_izin_keluarga` varchar(100) NOT NULL,
  `tanggal_izin_keluarga` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `izin_keluarga`
--

INSERT INTO `izin_keluarga` (`id_izin_keluarga`, `id_pejabat`, `nik_ayah`, `nik_anak`, `tujuan_izin_keluarga`, `tanggal_izin_keluarga`) VALUES
(2, 1, '2147483647', '75765757', 'Tegal', '2019-11-15'),
(3, 1, '75765757', '123456789', 'Tegal', '2019-11-15'),
(4, 1, '3215260112990001', '3215260112990001', 'sddvdf', '2019-11-25'),
(6, 2, '12345622222', '12345622222', 'Belanda', '2024-05-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelahiran`
--

CREATE TABLE `kelahiran` (
  `id_kelahiran` bigint(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pukul` time NOT NULL,
  `jenis_kelahiran` varchar(50) NOT NULL,
  `anak_ke` varchar(2) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `alamat` varchar(59) NOT NULL,
  `berat_bayi` varchar(10) NOT NULL,
  `panjang_bayi` varchar(10) NOT NULL,
  `nik_ayah` varchar(16) NOT NULL,
  `nama_ayah` varchar(20) NOT NULL,
  `pekerjaan_ayah` varchar(50) NOT NULL,
  `alamat_ayah` varchar(100) NOT NULL,
  `nik_ibu` varchar(16) NOT NULL,
  `nama_ibu` varchar(20) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `alamat_ibu` varchar(100) NOT NULL,
  `rt` varchar(120) NOT NULL,
  `rw` varchar(120) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelahiran`
--

INSERT INTO `kelahiran` (`id_kelahiran`, `nama`, `hari`, `tempat_lahir`, `tanggal_lahir`, `pukul`, `jenis_kelahiran`, `anak_ke`, `jenis_kelamin`, `alamat`, `berat_bayi`, `panjang_bayi`, `nik_ayah`, `nama_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nik_ibu`, `nama_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `rt`, `rw`, `keterangan`) VALUES
(11, 'wqwq', '1', 'Karwang', '2019-10-28', '00:00:00', 'Laki Laki', 'La', 'Laki Laki', 'Wanajaya RT 021 / 005', '0', '0', '0000000000000000', 'Agit Suhendar', 'Buruh', 'Wanajaya RT 021 / 005', '0000000000000000', 'Desih', 'Mengurus Rumah Tangga', 'Wanajaya RT 021 / 005', '12', 'Kepala Dusun Krajan 2', '22'),
(12, 'Haris Rifqiyana Sofyan', 'Kamis', 'Karawang', '2019-08-29', '14:49:00', 'Laki Laki', 'La', 'Laki Laki', 'Perum Gading Elok 2  RT 029 / 001', '0', '0', '0000000000000000', 'Ahmad Sofyan', 'Buruh', 'Perum Gading Elok 2  RT 029 / 001', '0000000000000000', 'Yani Septiani', 'Mengurus Rumah Tangga', 'Perum Gading Elok 2  RT 029 / 001', '', '', ''),
(13, 'Az Zahra', 'Senin', 'Karwang', '2019-07-01', '00:00:00', 'Laki Laki', 'La', 'Perempuan', 'Sukamaju', '0', '0', '0000000000000000', 'Ahmad M', 'Buruh', 'Sukamaju', '0000000000000000', 'Vanni V', 'Mengurus Rumah Tangga', 'Sukamaju', '', '', ''),
(14, 'Muhammad Wendy', '3', '', '2024-04-24', '22:54:00', '', '', 'Laki Laki', 'JL Raya Puspitek Serpong, Gang Salem 3 ', '', '', '', 'Qw', '', '', '', 'Qwq', '', '', 'q', 'Kepala Dusun Krajan 1', 'qwqw'),
(15, 'Anavel', '1', 'tangerang', '2024-04-01', '01:01:00', '', '', 'Laki Laki', 'JL Raya Puspitek Serpong, Gang Salem 3 ', '', '', '', 'Wendy', '', '', '', 'Jisoo', '', '', '12', 'Perumahan Bumi Karawang Permai', 'lahir sukes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kematian`
--

CREATE TABLE `kematian` (
  `id_kematian` int(11) NOT NULL,
  `nik` bigint(16) NOT NULL,
  `nama_kepala_keluarga` varchar(100) NOT NULL,
  `no_kk` varchar(32) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` varchar(10) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `rt` varchar(20) NOT NULL,
  `rw` varchar(50) NOT NULL,
  `kewarganegaraan` varchar(20) NOT NULL,
  `hari_wafat` varchar(20) NOT NULL,
  `tanggal_wafat` date NOT NULL,
  `pukul` time NOT NULL,
  `sebab_wafat` varchar(50) NOT NULL,
  `tempat_wafat` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `nik_ayah` varchar(50) NOT NULL,
  `nama_ayah` varchar(128) NOT NULL,
  `tanggal_lahir_ayah` date NOT NULL,
  `pekerjaan_ayah` varchar(100) NOT NULL,
  `alamat_ayah` varchar(200) NOT NULL,
  `nik_ibu` varchar(50) NOT NULL,
  `nama_ibu` varchar(200) NOT NULL,
  `tanggal_lahir_ibu` date NOT NULL,
  `pekerjaan_ibu` varchar(29) NOT NULL,
  `alamat_ibu` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kematian`
--

INSERT INTO `kematian` (`id_kematian`, `nik`, `nama_kepala_keluarga`, `no_kk`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `pekerjaan`, `alamat`, `rt`, `rw`, `kewarganegaraan`, `hari_wafat`, `tanggal_wafat`, `pukul`, `sebab_wafat`, `tempat_wafat`, `keterangan`, `nik_ayah`, `nama_ayah`, `tanggal_lahir_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nik_ibu`, `nama_ibu`, `tanggal_lahir_ibu`, `pekerjaan_ibu`, `alamat_ibu`) VALUES
(1, 0, '', '', 'Qwqw', 'tangerang', '20', 'Laki Laki', 'Kristen', '-', '-', '2', 'Perumahan Gading Elok 2', '', 'Senin', '2024-05-10', '23:19:00', '', '', '', '', '', '0000-00-00', '', '', '', '', '0000-00-00', '', ''),
(2, 0, '', '', 'Orang', 'tangerang', '20', 'Laki Laki', 'Konghucu', '-', '-', '2', 'Kepala Dusun WarnaJaya', '', 'Senin', '2024-05-13', '17:24:00', '', '', '', '', '', '0000-00-00', '', '', '', '', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menikah`
--

CREATE TABLE `menikah` (
  `id_menikah` int(50) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `tanggal_menikah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menikah`
--

INSERT INTO `menikah` (`id_menikah`, `id_pejabat`, `nik`, `tanggal_menikah`) VALUES
(1, 1, '42432', '2019-11-15'),
(2, 1, '2147483647', '2019-11-16'),
(8, 1, '12345622222', '2024-05-22'),
(9, 1, '3215265010760002', '2024-05-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pejabat`
--

CREATE TABLE `pejabat` (
  `id_pejabat` int(11) NOT NULL,
  `nama_pejabat` varchar(255) NOT NULL,
  `nip_pejabat` varchar(255) NOT NULL,
  `jabatan_pejabat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pejabat`
--

INSERT INTO `pejabat` (`id_pejabat`, `nama_pejabat`, `nip_pejabat`, `jabatan_pejabat`) VALUES
(1, 'Selamet. S.Kom', '19640112 199203 1 008', 'Kepala Desa'),
(2, 'Rohman', '-asasas', 'Sekertaris Desa'),
(3, 'asas', '-', 'Kepala Desa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemakaman`
--

CREATE TABLE `pemakaman` (
  `id_pemakaman` int(50) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_pemakaman` varchar(255) NOT NULL,
  `hari_pemakaman` varchar(30) NOT NULL,
  `tanggal_dimakamkan` date NOT NULL,
  `jam_dimakamkan` varchar(10) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tanggal_pemakaman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemakaman`
--

INSERT INTO `pemakaman` (`id_pemakaman`, `id_pejabat`, `nik`, `tanggal_lahir`, `tempat_pemakaman`, `hari_pemakaman`, `tanggal_dimakamkan`, `jam_dimakamkan`, `foto`, `tanggal_pemakaman`) VALUES
(1, 1, '2147483647', '0000-00-00', 'Tegal', '4', '0000-00-00', '10:30', '', '2019-11-15'),
(2, 1, '42432', '0000-00-00', 'Tegal', '', '0000-00-00', '11:11', '', '2019-11-20'),
(3, 1, '3215260112990001', '0000-00-00', 'vssd', '', '0000-00-00', '22:02', '', '2019-11-25'),
(4, 1, '3215260400820003', '0000-00-00', 'assaa', '', '0000-00-00', '11:01', '', '2019-11-25'),
(5, 2, '3215260401050001', '0000-00-00', 'Tangerang', 'Minggu', '2024-05-26', '16:19', '', '2024-05-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk`
--

CREATE TABLE `penduduk` (
  `nik` bigint(16) NOT NULL,
  `no_kk` bigint(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(50) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `status_perkawinan` varchar(20) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `golongan_darah` varchar(20) NOT NULL,
  `kewarganegaraan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penduduk`
--

INSERT INTO `penduduk` (`nik`, `no_kk`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `rt`, `rw`, `agama`, `status_perkawinan`, `pendidikan`, `pekerjaan`, `status`, `golongan_darah`, `kewarganegaraan`) VALUES
(12345622222, 1233, 'Wendy', 'Tangerang', '2024-05-21', 'Laki Laki', 'Itc Roxy Mas, Jalan ', '12', 'Kepala Dusun Sukamulya', 'Islam', 'Belum Menikah', 'S3', '-', 'Tetap', '0', 'Warga Negara Asing'),
(3215260401050001, 3215262108070011, 'Tedi Rahman', 'Karawang', '2005-01-04', 'Laki Laki', 'Sukamaju ,Desa Warung Bambu , Kecamatan Karawang Timur Kota Karawan. 41371    ', '010', 'Kepala Dusun Sukamaju', 'Islam', 'Belum Menikah', 'S3', 'Belum Bekerja', 'Tetap', '-', 'Indonesia'),
(3215265010760002, 3215260807190011, 'Entin Sutini', 'Karawang', '1976-10-10', 'Perempuan', 'Krajan 1', '002', 'Kepala Dusun Krajan 1', 'Islam', 'Belum Menikah', 'SMA', 'Mengurus Rumah Tangg', 'Tetap', '-', 'Indonesia'),
(9223372036854775807, 9223372036854775807, 'Muhammad Wen', 'Tanhgerang', '2024-05-27', 'Laki Laki', 'Alsut     ', '12', 'Perumahan Bumi Karawang Permai', 'Islam', 'Menikah', 'S3', 'Pekerja Keras', 'Tetap', 'B', 'Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penghasilan`
--

CREATE TABLE `penghasilan` (
  `id_penghasilan` int(50) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `keperluan_penghasilan` text NOT NULL,
  `jumlah_penghasilan` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tanggal_penghasilan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penghasilan`
--

INSERT INTO `penghasilan` (`id_penghasilan`, `id_pejabat`, `nik`, `keperluan_penghasilan`, `jumlah_penghasilan`, `foto`, `tanggal_penghasilan`) VALUES
(1, 1, '2147483647', 'dsss', 24324324, '', '2019-11-14'),
(2, 1, '3215260112990001', 'fdsg', 2125, '', '2019-11-25'),
(3, 2, '3215260112990001', 'qw', 10000, '', '2024-03-27'),
(4, 1, '12345622222', 'qw', 10000, '', '2024-05-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pindah`
--

CREATE TABLE `pindah` (
  `id_pindah` int(50) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik_kepala_keluarga` varchar(30) NOT NULL,
  `nik_pemohon` varchar(30) NOT NULL,
  `alasan_pindah` varchar(255) NOT NULL,
  `alamat_pindah` varchar(255) NOT NULL,
  `dusun_pindah` varchar(255) NOT NULL,
  `rt_pindah` varchar(5) NOT NULL,
  `rw_pindah` varchar(5) NOT NULL,
  `desa_pindah` varchar(255) NOT NULL,
  `kecamatan_pindah` varchar(255) NOT NULL,
  `kabupaten_pindah` varchar(255) NOT NULL,
  `provinsi_pindah` varchar(255) NOT NULL,
  `kode_pos_pindah` int(5) NOT NULL,
  `telepon_pindah` varchar(12) NOT NULL,
  `tanggal_pindah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pindah`
--

INSERT INTO `pindah` (`id_pindah`, `id_pejabat`, `nik_kepala_keluarga`, `nik_pemohon`, `alasan_pindah`, `alamat_pindah`, `dusun_pindah`, `rt_pindah`, `rw_pindah`, `desa_pindah`, `kecamatan_pindah`, `kabupaten_pindah`, `provinsi_pindah`, `kode_pos_pindah`, `telepon_pindah`, `tanggal_pindah`) VALUES
(1, 1, '75765757', '111111111', 'Keamanan', 'Kp cikedokan desa sukadanau Rt 01/01 dusun 1 no 142, cikarang barat', 'adsd', '7', '77676', 'kkuhuhb', '17845', 'Tegal', 'JAWA BARAT', 17845, '087730384035', '2019-11-19'),
(2, 1, '3215260112990001', '3215261607780001', 'Kesehatan', 'cikarang', 'mojo', '12', '1', 'benge', 'asu', 'krwg', 'jwbarat', 535261, '094898349849', '2019-11-25'),
(3, 1, '12345622222', '12345622222', 'Keamanan', 'Lengkong', 'a', 'q', 'a', 'a', 'a', 'a', 'a', 0, '12121', '2024-05-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pindahdatang`
--

CREATE TABLE `pindahdatang` (
  `no_kk` bigint(20) NOT NULL,
  `nama_kepala_keluarga` varchar(128) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `rt` varchar(50) NOT NULL,
  `rw` varchar(50) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alasan_pindah` varchar(100) NOT NULL,
  `alamat_tujuan` varchar(100) NOT NULL,
  `jenis_pindah` varchar(100) NOT NULL,
  `klasifikasi_pindah` varchar(100) NOT NULL,
  `status_kk_pindah` varchar(100) NOT NULL,
  `status_kk_tdk_pindah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pindahdatang`
--

INSERT INTO `pindahdatang` (`no_kk`, `nama_kepala_keluarga`, `alamat`, `rt`, `rw`, `nik`, `nama`, `alasan_pindah`, `alamat_tujuan`, `jenis_pindah`, `klasifikasi_pindah`, `status_kk_pindah`, `status_kk_tdk_pindah`) VALUES
(3215260203160013, 'Nasih Sunarwan', 'Sukamulya ', '15', 'Kepala Dusun Sukamulya', 'Nasih sunarwan', '3215260203160013', 'Keluarga', 'Krajan II rt 11 / 002  ', 'Kepala Keluarga dan Seluruh Anggota Keluarga', 'Dalam satu Desa', 'Nomor KK Tetap', 'Nomor KK Tetap'),
(3215261310170007, 'Iwan Kosasih ', 'Krajan 2 . RT 006 / 002  ', '006', 'Kepala Dusun Krajan 2', '3215261310170007', 'Iwan Kosasih ', 'Pekerjaan', 'Gintung RT 001 /003 Kutamekar Ciampel  ', 'Kepala Keluarga', 'Antar Kecamatan', 'Nomor KK Tetap', 'Nomor KK Tetap'),
(3215261604100004, 'Melani', 'Sukamulya', '16', 'Kepala Dusun Sukamulya', '3215261604100004', 'Meelani', 'Pekerjaan', 'Dusun Sentul RT 001 / 001 Cikampek', 'Kepala Keluarga dan Seluruh Anggota Keluarga', 'Antar Kab/Kota', 'Nomor KK Tetap', ''),
(3215262401110019, 'A Dadang Juhara', 'Krajan 1   ', '001', 'Kepala Dusun Krajan 1', '3215262401110019', 'A Dadang Juhara', 'Pekerjaan', 'Jl Veteran Guro RT  001/ 001 no )3 Karawang Wetan   ', 'Kepala Keluarga', 'Antar Desa', 'Nomor KK Tetap', 'Nomor KK Tetap'),
(3215263105110013, 'Andri Apriyani', 'Sukamulya', '17', 'Kepala Dusun Sukamulya', '3215263105110013', 'Andri Apriyani', 'Keluarga', 'Cinangsi RT 002 / 008 Selaksana Bungutsari Tasikmalaya', 'Kepala Keluarga dan Seluruh Anggota Keluarga', 'Antar Kab/Kota', 'Nomor KK Tetap', ''),
(3216111005810010, 'Suryat Man Epeur', 'Wanajaya', '21', 'Kepala Dusun WarnaJaya', '3216111005810010', 'Suryat Man Epeur', 'Pekerjaan', 'Ciluwang Selak ', 'Kepala Keluarga dan Seluruh Anggota Keluarga', 'Antar Kecamatan', 'Nomor KK Tetap', ''),
(3278080708830003, 'Dede Kurnia', 'Sukamaju ', '011', 'Kepala Dusun Sukamaju', '3278080708830003', 'Dede Kurnia', 'Keluarga', 'Pangatang Bawah No.10/ 17 C RT 008 / 008 karawang', 'Kepala Keluarga dan Sebagian Keluarga lainnya', 'Antar Desa', 'Nomor KK Tetap', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'penduduk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skck`
--

CREATE TABLE `skck` (
  `id_skck` int(50) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `tanggal_skck` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `skck`
--

INSERT INTO `skck` (`id_skck`, `id_pejabat`, `nik`, `tanggal_skck`) VALUES
(3, 1, '123456789', '2019-11-15'),
(4, 1, '75765757', '2019-11-15'),
(5, 1, '232323423', '2019-11-15'),
(6, 1, '3215260112990001', '2019-11-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sktm`
--

CREATE TABLE `sktm` (
  `id_sktm` int(50) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik_anak` varchar(30) NOT NULL,
  `nik_ayah` varchar(16) NOT NULL,
  `tanggal_sktm` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sktm`
--

INSERT INTO `sktm` (`id_sktm`, `id_pejabat`, `nik_anak`, `nik_ayah`, `tanggal_sktm`) VALUES
(11, 3, '123456', '123456', '2024-05-21'),
(12, 1, '12345622222', '12345622222', '2024-05-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_kelahiran`
--

CREATE TABLE `surat_kelahiran` (
  `id_surat_kelahiran` int(50) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik_ayah` varchar(30) NOT NULL,
  `nik_ibu` varchar(30) NOT NULL,
  `nik_pelapor` varchar(30) NOT NULL,
  `nama_anak` varchar(255) NOT NULL,
  `kelamin_anak` varchar(15) NOT NULL,
  `tempat_lahir_anak` varchar(255) NOT NULL,
  `tanggal_lahir_anak` date NOT NULL,
  `jam_lahir_anak` varchar(10) NOT NULL,
  `hari_lahir_anak` varchar(20) NOT NULL,
  `hubungan_sebagai` varchar(100) NOT NULL,
  `tanggal_surat_kelahiran` date NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_kelahiran`
--

INSERT INTO `surat_kelahiran` (`id_surat_kelahiran`, `id_pejabat`, `nik_ayah`, `nik_ibu`, `nik_pelapor`, `nama_anak`, `kelamin_anak`, `tempat_lahir_anak`, `tanggal_lahir_anak`, `jam_lahir_anak`, `hari_lahir_anak`, `hubungan_sebagai`, `tanggal_surat_kelahiran`, `foto`) VALUES
(2, 1, '123456789', '2147483647', '2147483647', 'syarif', 'Laki-Laki', 'Tegal', '2020-04-17', '11:11', '', 'abah', '2019-11-14', ''),
(3, 1, '12346777', '75765757', '12346777', 'khoirul syarif', 'Perempuan', 'Tegal', '0000-00-00', '11:11', '', 'abah', '2019-11-20', ''),
(7, 2, '123456', '3215260607060001', '3215260607060001', 'gatau', 'Laki-Laki', 'Tangerang', '2024-05-10', '20:07', 'Senin', 'anak', '2024-05-10', ''),
(8, 2, '123456', '123456', '123456', 'www', 'Laki-Laki', 'Tangerang', '2024-05-19', '03:13', 'Senin', 'anak', '2024-05-19', ''),
(15, 1, '12345622222', '12345622222', '12345622222', 'Pria', 'Laki-Laki', 'Tangerang', '2024-05-24', '02:01', 'Selasa', 'anak', '2024-05-23', '1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_kematian`
--

CREATE TABLE `surat_kematian` (
  `id_surat_kematian` int(50) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `nik_pelapor` varchar(30) NOT NULL,
  `umur_pelapor` int(11) NOT NULL,
  `tempat_kematian` varchar(255) NOT NULL,
  `tanggal_kematian` date NOT NULL,
  `jam_kematian` varchar(10) NOT NULL,
  `hari_kematian` varchar(20) NOT NULL,
  `sebab_kematian` varchar(255) NOT NULL,
  `hubungan_sebagai` varchar(100) NOT NULL,
  `tanggal_surat_kematian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_kematian`
--

INSERT INTO `surat_kematian` (`id_surat_kematian`, `id_pejabat`, `nik`, `nik_pelapor`, `umur_pelapor`, `tempat_kematian`, `tanggal_kematian`, `jam_kematian`, `hari_kematian`, `sebab_kematian`, `hubungan_sebagai`, `tanggal_surat_kematian`) VALUES
(1, 1, '2147483647', '2147483647', 30, 'Tegal', '1990-11-11', '10:30', '', '', 'abah', '2019-11-15'),
(2, 1, '12346777', '123456789', 2, 'Tegal', '0000-00-00', '11:11', '', '', 'ibu', '2019-11-21'),
(7, 2, '3215260607060001', '3215260400820003', 21, 'Tangerang', '2024-04-30', '00:14', 'Senin', '', 'anak', '2024-05-13'),
(9, 2, '3215260401050001', '12345622222', 21, 'Tangerang', '2024-05-22', '15:32', 'Jumat', '', 'anak', '2024-05-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `usaha`
--

CREATE TABLE `usaha` (
  `id_usaha` int(50) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `nama_usaha` varchar(255) NOT NULL,
  `sejak_usaha` varchar(4) NOT NULL,
  `alamat_usaha` varchar(255) NOT NULL,
  `tanggal_usaha` date NOT NULL,
  `bukti_usaha` varchar(255) NOT NULL,
  `surat_pengantar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `tanggal_input` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `level` enum('staff desa','penduduk') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `image`, `password`, `role_id`, `is_active`, `tanggal_input`, `alamat`, `level`) VALUES
(17, 'ryan', 'ryan@gmail.com', '', '$2y$10$KWwKbOJJiLZwt3hHUD/JF.jprXUlyOrkbbOhft2HBKijmiecypcIG', 2, 1, 1710303052, '', 'staff desa'),
(21, 'Admin', 'Admin@gmail.com', 'pro1715072345.jpg', '$2y$10$9ZFCa3CQca3gne1pT.oZpuddSGG1Aw4PwQKAg4i6q2kq0Bl6JBV0u', 1, 1, 1715067073, 'dasana indah', 'staff desa'),
(22, 'Anwar joko', 'hhh@gmail.com', 'default.jpg', '$2y$10$nhLGlPvJgV6DAUMOD5LZk.gzYxRvFBPNfo2njVtLoWxXlA3Kz.JUe', 1, 1, 1716636753, '', 'staff desa'),
(23, 'Anwar', 'Admin11@gmail.com', 'default.jpg', '$2y$10$DzmipeRIF44.HEt3qb.GauOm/LQgd9kQ6wkz3qPbS1JNMoG8EWIaW', 1, 1, 1716636783, '', 'staff desa'),
(24, 'JOKO', 'joko@gmail.com', 'userjoko_anwar.jpg', '$2y$10$wJN8IJiw8s/RMnmf9YICPuuBjHFoLguqD4P0Z06lUpkF5mEltrgRq', 1, 1, 1716637718, '', 'staff desa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `batal_pindah`
--
ALTER TABLE `batal_pindah`
  ADD PRIMARY KEY (`id_batal_pindah`);

--
-- Indeks untuk tabel `belum_menikah`
--
ALTER TABLE `belum_menikah`
  ADD PRIMARY KEY (`id_belum_menikah`);

--
-- Indeks untuk tabel `belum_sekolah`
--
ALTER TABLE `belum_sekolah`
  ADD PRIMARY KEY (`id_belum_sekolah`);

--
-- Indeks untuk tabel `cerai_mati`
--
ALTER TABLE `cerai_mati`
  ADD PRIMARY KEY (`id_cerai_mati`);

--
-- Indeks untuk tabel `domisili`
--
ALTER TABLE `domisili`
  ADD PRIMARY KEY (`id_domisili`);

--
-- Indeks untuk tabel `haji`
--
ALTER TABLE `haji`
  ADD PRIMARY KEY (`id_haji`);

--
-- Indeks untuk tabel `izin_keluarga`
--
ALTER TABLE `izin_keluarga`
  ADD PRIMARY KEY (`id_izin_keluarga`);

--
-- Indeks untuk tabel `kelahiran`
--
ALTER TABLE `kelahiran`
  ADD PRIMARY KEY (`id_kelahiran`);

--
-- Indeks untuk tabel `kematian`
--
ALTER TABLE `kematian`
  ADD PRIMARY KEY (`id_kematian`);

--
-- Indeks untuk tabel `menikah`
--
ALTER TABLE `menikah`
  ADD PRIMARY KEY (`id_menikah`);

--
-- Indeks untuk tabel `pejabat`
--
ALTER TABLE `pejabat`
  ADD PRIMARY KEY (`id_pejabat`);

--
-- Indeks untuk tabel `pemakaman`
--
ALTER TABLE `pemakaman`
  ADD PRIMARY KEY (`id_pemakaman`);

--
-- Indeks untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `penghasilan`
--
ALTER TABLE `penghasilan`
  ADD PRIMARY KEY (`id_penghasilan`);

--
-- Indeks untuk tabel `pindah`
--
ALTER TABLE `pindah`
  ADD PRIMARY KEY (`id_pindah`);

--
-- Indeks untuk tabel `pindahdatang`
--
ALTER TABLE `pindahdatang`
  ADD PRIMARY KEY (`no_kk`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `skck`
--
ALTER TABLE `skck`
  ADD PRIMARY KEY (`id_skck`);

--
-- Indeks untuk tabel `sktm`
--
ALTER TABLE `sktm`
  ADD PRIMARY KEY (`id_sktm`);

--
-- Indeks untuk tabel `surat_kelahiran`
--
ALTER TABLE `surat_kelahiran`
  ADD PRIMARY KEY (`id_surat_kelahiran`);

--
-- Indeks untuk tabel `surat_kematian`
--
ALTER TABLE `surat_kematian`
  ADD PRIMARY KEY (`id_surat_kematian`);

--
-- Indeks untuk tabel `usaha`
--
ALTER TABLE `usaha`
  ADD PRIMARY KEY (`id_usaha`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `batal_pindah`
--
ALTER TABLE `batal_pindah`
  MODIFY `id_batal_pindah` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `belum_menikah`
--
ALTER TABLE `belum_menikah`
  MODIFY `id_belum_menikah` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `belum_sekolah`
--
ALTER TABLE `belum_sekolah`
  MODIFY `id_belum_sekolah` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `cerai_mati`
--
ALTER TABLE `cerai_mati`
  MODIFY `id_cerai_mati` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `domisili`
--
ALTER TABLE `domisili`
  MODIFY `id_domisili` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `haji`
--
ALTER TABLE `haji`
  MODIFY `id_haji` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `izin_keluarga`
--
ALTER TABLE `izin_keluarga`
  MODIFY `id_izin_keluarga` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kelahiran`
--
ALTER TABLE `kelahiran`
  MODIFY `id_kelahiran` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `kematian`
--
ALTER TABLE `kematian`
  MODIFY `id_kematian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT untuk tabel `menikah`
--
ALTER TABLE `menikah`
  MODIFY `id_menikah` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pemakaman`
--
ALTER TABLE `pemakaman`
  MODIFY `id_pemakaman` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penghasilan`
--
ALTER TABLE `penghasilan`
  MODIFY `id_penghasilan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pindah`
--
ALTER TABLE `pindah`
  MODIFY `id_pindah` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `skck`
--
ALTER TABLE `skck`
  MODIFY `id_skck` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `sktm`
--
ALTER TABLE `sktm`
  MODIFY `id_sktm` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `surat_kelahiran`
--
ALTER TABLE `surat_kelahiran`
  MODIFY `id_surat_kelahiran` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `surat_kematian`
--
ALTER TABLE `surat_kematian`
  MODIFY `id_surat_kematian` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `usaha`
--
ALTER TABLE `usaha`
  MODIFY `id_usaha` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
