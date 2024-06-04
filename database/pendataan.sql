-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jun 2024 pada 10.45
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
-- Database: `pendataan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `deskripsi` varchar(512) NOT NULL,
  `tanggal` date NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `batal_pindah`
--

CREATE TABLE `batal_pindah` (
  `id_batal_pindah` int(11) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `alamat_batal_pindah` varchar(255) NOT NULL,
  `surat_pengantar` varchar(255) NOT NULL,
  `alasan` varchar(255) NOT NULL,
  `tanggal_batal_pindah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `batal_pindah`
--

INSERT INTO `batal_pindah` (`id_batal_pindah`, `id_pejabat`, `nik`, `alamat_batal_pindah`, `surat_pengantar`, `alasan`, `tanggal_batal_pindah`) VALUES
(1, 1, '1', 'se', '', 'a', '2024-06-04'),
(2, 1, '1', 'se', '', 'a', '2024-06-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `belum_menikah`
--

CREATE TABLE `belum_menikah` (
  `id_belum_menikah` int(11) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `surat_pengantar` varchar(255) NOT NULL,
  `alasan` varchar(255) NOT NULL,
  `tanggal_belum_menikah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `belum_menikah`
--

INSERT INTO `belum_menikah` (`id_belum_menikah`, `id_pejabat`, `nik`, `surat_pengantar`, `alasan`, `tanggal_belum_menikah`) VALUES
(1, 1, '12312', 'userMuhammad_Wendy_Martadiansyah2.jpg', 'Banyak', '2024-06-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cerai_mati`
--

CREATE TABLE `cerai_mati` (
  `id_cerai_mati` int(11) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `surat_pengantar` varchar(255) NOT NULL,
  `alasan` varchar(255) NOT NULL,
  `tanggal_cerai_mati` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_pegawai` varchar(225) NOT NULL,
  `no_telepon` varchar(120) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status` varchar(60) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pegawai`
--

INSERT INTO `data_pegawai` (`id_pegawai`, `nik`, `nama_pegawai`, `no_telepon`, `alamat`, `jenis_kelamin`, `jabatan`, `tanggal_masuk`, `status`, `foto`) VALUES
(0, '3657', 'Muhammad Wendy Martadiansyah', '0895391063103', 'JL Raya puspitek serpong, gang salem 3', 'Laki-laki', 'IT Developer', '2023-12-26', 'Pegawai Tetap', 'th_(1).jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `domisili`
--

CREATE TABLE `domisili` (
  `id_domisili` int(11) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `surat_pengantar` varchar(255) NOT NULL,
  `alasan` varchar(255) NOT NULL,
  `tanggal_domisili` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `domisili`
--

INSERT INTO `domisili` (`id_domisili`, `id_pejabat`, `nik`, `surat_pengantar`, `alasan`, `tanggal_domisili`) VALUES
(1, 2, '12312', 'img1557401465.jpg', 'Kbeutuhan', '2024-06-02'),
(2, 2, '12312', 'userMuhammad_Wendy_Martadiansyah.jpg', 'Kbeutuhanas', '2024-06-02'),
(3, 1, '12312', 'userMuhammad_Wendy_Martadiansyah2.jpg', 'Banyak', '2024-06-02'),
(4, 2, '12312', 'userMuhammad_Wendy_Martadiansyah21.jpg', 'Kbeutuhan', '2024-06-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `izin_keluarga`
--

CREATE TABLE `izin_keluarga` (
  `id_izin_keluarga` int(11) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik_ayah` varchar(50) NOT NULL,
  `nik_anak` varchar(50) NOT NULL,
  `surat_pengantar` varchar(255) NOT NULL,
  `tujuan_izin_keluarga` varchar(255) NOT NULL,
  `tanggal_izin_keluarga` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `izin_keluarga`
--

INSERT INTO `izin_keluarga` (`id_izin_keluarga`, `id_pejabat`, `nik_ayah`, `nik_anak`, `surat_pengantar`, `tujuan_izin_keluarga`, `tanggal_izin_keluarga`) VALUES
(1, 1, '12312', '123456', 'userMuhammad_Wendy_M1.jpg', 'Belanda', '2024-06-02'),
(2, 2, '12312', '12312', 'img15574014651.jpg', 'Belanda', '2024-06-02'),
(3, 2, '12312', '12312', 'img15574014652.jpg', 'Belandaaa', '2024-06-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelahiran`
--

CREATE TABLE `kelahiran` (
  `id_kelahiran` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pukul` time NOT NULL,
  `jenis_kelahiran` varchar(20) NOT NULL,
  `anak_ke` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `berat_bayi` varchar(20) NOT NULL,
  `panjang_bayi` varchar(20) NOT NULL,
  `nik_ayah` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(50) NOT NULL,
  `alamat_ayah` varchar(255) NOT NULL,
  `nik_ibu` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `alamat_ibu` varchar(255) NOT NULL,
  `rt` varchar(20) NOT NULL,
  `rw` varchar(20) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kematian`
--

CREATE TABLE `kematian` (
  `id_kematian` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama_kepala_keluarga` varchar(50) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `rt` varchar(20) NOT NULL,
  `rw` varchar(20) NOT NULL,
  `kewarganegaraan` varchar(50) NOT NULL,
  `hari_wafat` varchar(50) NOT NULL,
  `tanggal_wafat` date NOT NULL,
  `pukul` time NOT NULL,
  `sebab_wafat` varchar(70) NOT NULL,
  `tempat_wafat` varchar(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `nik_ayah` varchar(20) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `tanggal_lahir_ayah` date NOT NULL,
  `pekerjaan_ayah` varchar(50) NOT NULL,
  `alamat_ayah` varchar(255) NOT NULL,
  `nik_ibu` varchar(20) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `tanggal_lahir_ibu` date NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `alamat_ibu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menikah`
--

CREATE TABLE `menikah` (
  `id_menikah` int(11) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `surat_pengantar` varchar(255) NOT NULL,
  `alasan` varchar(255) NOT NULL,
  `tanggal_menikah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menikah`
--

INSERT INTO `menikah` (`id_menikah`, `id_pejabat`, `nik`, `surat_pengantar`, `alasan`, `tanggal_menikah`) VALUES
(1, 2, '12312', 'img15574014651.jpg', 'Banyak', '2024-06-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pejabat`
--

CREATE TABLE `pejabat` (
  `id_pejabat` int(11) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nama_pejabat` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nip_pejabat` int(11) NOT NULL,
  `jabatan_pejabat` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pejabat`
--

INSERT INTO `pejabat` (`id_pejabat`, `jenis_kelamin`, `alamat`, `nama_pejabat`, `foto`, `nip_pejabat`, `jabatan_pejabat`) VALUES
(1, 'Laki-laki', 'j', 'k', '', 9090, 'k'),
(2, 'Perempuan', 'Buaran 5', 'Azizi', '', 12345, 'Sekretaris Kelurahan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemakaman`
--

CREATE TABLE `pemakaman` (
  `id_pemakaman` int(11) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_pemakaman` varchar(50) NOT NULL,
  `hari_pemakaman` varchar(50) NOT NULL,
  `tanggal_dimakamkan` date NOT NULL,
  `jam_dimakamkan` varchar(50) NOT NULL,
  `surat_pengantar` varchar(255) NOT NULL,
  `tanggal_pemakaman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemakaman`
--

INSERT INTO `pemakaman` (`id_pemakaman`, `id_pejabat`, `nik`, `tanggal_lahir`, `tempat_pemakaman`, `hari_pemakaman`, `tanggal_dimakamkan`, `jam_dimakamkan`, `surat_pengantar`, `tanggal_pemakaman`) VALUES
(1, 1, '12312', '0000-00-00', 'TPU', 'Selasa', '2024-06-03', '15:36', 'img1557401465.jpg', '2024-06-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk`
--

CREATE TABLE `penduduk` (
  `nik` int(11) NOT NULL,
  `no_kk` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `rt` varchar(20) NOT NULL,
  `rw` varchar(20) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `status_perkawinan` varchar(50) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `golongan_darah` varchar(50) NOT NULL,
  `kewarganegaraan` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penduduk`
--

INSERT INTO `penduduk` (`nik`, `no_kk`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `rt`, `rw`, `agama`, `status_perkawinan`, `pendidikan`, `pekerjaan`, `status`, `golongan_darah`, `kewarganegaraan`, `foto`) VALUES
(12312, 11, 'Es Teh', 'tanhgerang', '2024-06-06', 'Laki Laki', 'Di rumah', '12', 'Perumahan Bumi Karaw', 'Konghucu', 'Menikah', 'S3', 'wqwq', 'Tetap', '0', 'Warga Negara Asing', '1717156855_userMuhammad_Wendy_M2.jpg'),
(123456, 1233, 'Muhammad Wendy', 'tanhgerang', '2024-06-05', 'Laki Laki', 'alsut', '12', 'Kepala Dusun Krajan ', 'Islam', 'Menikah', 'S2', 'wqwq', 'Tetap', '0', 'Warga Negara Asing', 'default.png'),
(221212, 211111111, 'nama', 'qqw', '2024-05-01', 'Laki-laki', 'wew', '12', 'Kepala Dusun Sukamaj', 'islam', 'menikah', 'S3', 'wIRA', 'Tetap', '0', 'Indonesia', 'userPria.png'),
(123456989, 1233, 'Muhammad Wendy Martadiansyah', 'tangerang', '2024-06-03', 'Laki Laki', 'alsut', 'q', 'Kepala Dusun Krajan ', 'Katholik', 'Belum Menikah', 'Tidak Sekolah', 'wqwq', 'Tetap', 'q', 'Indonesia', '1717312654_Diagram_Tanpa_Judula.jpg'),
(2147483647, 1233, 'Muhammad Wendy', 'tanhgerang', '2024-05-29', 'Laki Laki', 'Di rumah', '12', 'Kepala Dusun Sukamul', 'Islam', 'Menikah', 'S3', 'wqwq', 'Tetap', '0', 'Warga Negara Asing', 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(3, 'Pria', 'wendy.martadiandsyah75@gmail.com', 'asas', '1212', '2024-06-03 12:15:39'),
(4, 'Pria', 'wendy.martadiandsyah75@gmail.com', 'asas', '123', '2024-06-03 12:16:36'),
(5, 'Pria', 'wendy.martadiandsyah75@gmail.com', 'asas', '1212', '2024-06-03 12:19:27'),
(6, 'Pria', 'wendy.martadiandsyah75@gmail.com', 'rehan gay', 'gay banget', '2024-06-04 08:00:03'),
(7, 'Felix Siauw', 'ryan@gmail.com', 'Kelurahan Serpong mendukung GAY', 'Tolong rubah atau anda kami kirim FPI', '2024-06-04 08:17:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penghasilan`
--

CREATE TABLE `penghasilan` (
  `id_penghasilan` int(11) NOT NULL,
  `id_pejabat` int(11) NOT NULL COMMENT 'foto',
  `nik` varchar(20) NOT NULL,
  `keperluan_penghasilan` varchar(50) NOT NULL,
  `jumlah_penghasilan` varchar(50) NOT NULL,
  `surat_pengantar` varchar(255) NOT NULL,
  `tanggal_penghasilan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penghasilan`
--

INSERT INTO `penghasilan` (`id_penghasilan`, `id_pejabat`, `nik`, `keperluan_penghasilan`, `jumlah_penghasilan`, `surat_pengantar`, `tanggal_penghasilan`) VALUES
(1, 1, '12312', 'qw', '10000', 'img1557401465.jpg', '0000-00-00'),
(2, 2, '12312', 'qw', '10000', 'img15574014651.jpg', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pindah`
--

CREATE TABLE `pindah` (
  `id_pindah` int(11) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik_kepala_keluarga` varchar(20) NOT NULL,
  `nik_pemohon` varchar(20) NOT NULL,
  `alasan_pindah` varchar(50) NOT NULL,
  `alamat_pindah` varchar(255) NOT NULL,
  `rt_pindah` varchar(20) NOT NULL,
  `rw_pindah` varchar(20) NOT NULL,
  `desa_pindah` varchar(20) NOT NULL,
  `kecamatan_pindah` varchar(20) NOT NULL,
  `kota_pindah` varchar(25) NOT NULL,
  `provinsi_pindah` varchar(25) NOT NULL,
  `kode_pos_pindah` int(11) NOT NULL,
  `tanggal_pindah` date NOT NULL,
  `surat_pengantar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pindah`
--

INSERT INTO `pindah` (`id_pindah`, `id_pejabat`, `nik_kepala_keluarga`, `nik_pemohon`, `alasan_pindah`, `alamat_pindah`, `rt_pindah`, `rw_pindah`, `desa_pindah`, `kecamatan_pindah`, `kota_pindah`, `provinsi_pindah`, `kode_pos_pindah`, `tanggal_pindah`, `surat_pengantar`) VALUES
(1, 0, '12312', '12312', 'Keamanan', 'JL Raya puspitek serpong, gang salem 3', '1', '12', 'Serpong', 'Serping', 'Kota Tangerang Selatan', 'Banten', 15311, '2024-06-03', 'img155740146512.jpg'),
(2, 0, '12312', '12312', 'Pendidikan', 'alsut', '1', '12', 'Serpong', 'Serping', 'Kota Tangerang Selatan', 'Banten', 15311, '2024-06-03', 'img15574014652.jpg'),
(3, 0, '12312', '12312', 'Pendidikan', 'JL Raya puspitek serpong, gang salem 3', '1', '12', 'Serpong', 'Serping', 'Kota Tangerang Selatan', 'Banten', 15311, '2024-06-03', 'img155740146521.jpg'),
(4, 0, '123456', '221212', 'Pendidikan', 'Di rumah', '1', '12', 'Serpong', 'Serping', 'Kota Tangerang Selatan', 'Banten', 0, '2024-06-03', 'userMuhammad_Wendy_M1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pindahdatang`
--

CREATE TABLE `pindahdatang` (
  `no_kk` int(11) NOT NULL,
  `nama_kepala_keluarga` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `rt` varchar(20) NOT NULL,
  `rw` varchar(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `alasan_pindah` varchar(70) NOT NULL,
  `alamat_tujuan` varchar(255) NOT NULL,
  `tanggal_pindah` date NOT NULL,
  `jenis_pindah` varchar(50) NOT NULL,
  `klasifikasi_pindah` varchar(50) NOT NULL,
  `status_kk_pindah` varchar(50) NOT NULL,
  `status_kk_tdk_pindah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Struktur dari tabel `sktm`
--

CREATE TABLE `sktm` (
  `id_sktm` int(11) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik_ayah` varchar(20) NOT NULL,
  `surat_pengantar` varchar(255) NOT NULL,
  `nik_anak` varchar(20) NOT NULL,
  `alasan` varchar(255) NOT NULL,
  `tanggal_sktm` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sktm`
--

INSERT INTO `sktm` (`id_sktm`, `id_pejabat`, `nik_ayah`, `surat_pengantar`, `nik_anak`, `alasan`, `tanggal_sktm`) VALUES
(2, 2, '12312', 'userMuhammad_Wendy_M.jpg', '123456', '', '2024-06-01'),
(3, 1, '12312', 'userMuhammad_Wendy_Martadiansyah4.jpg', '12312', '12', '2024-06-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_kelahiran`
--

CREATE TABLE `surat_kelahiran` (
  `id_surat_kelahiran` int(11) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik_ayah` varchar(50) NOT NULL,
  `nik_ibu` varchar(50) NOT NULL,
  `nik_pelapor` varchar(50) NOT NULL,
  `nama_anak` varchar(50) NOT NULL,
  `kelamin_anak` varchar(50) NOT NULL,
  `tempat_lahir_anak` varchar(50) NOT NULL,
  `tanggal_lahir_anak` date NOT NULL,
  `jam_lahir_anak` varchar(50) NOT NULL,
  `hari_lahir_anak` varchar(50) NOT NULL,
  `hubungan_sebagai` varchar(50) NOT NULL,
  `tanggal_surat_kelahiran` date NOT NULL,
  `surat_pengantar` varchar(255) NOT NULL,
  `bukti_kelahiran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_kelahiran`
--

INSERT INTO `surat_kelahiran` (`id_surat_kelahiran`, `id_pejabat`, `nik_ayah`, `nik_ibu`, `nik_pelapor`, `nama_anak`, `kelamin_anak`, `tempat_lahir_anak`, `tanggal_lahir_anak`, `jam_lahir_anak`, `hari_lahir_anak`, `hubungan_sebagai`, `tanggal_surat_kelahiran`, `surat_pengantar`, `bukti_kelahiran`) VALUES
(1, 1, '12121', '1212', '1212', 'wendy', 'laki -laki', 'tangerang', '2024-06-04', '19:09', 'senin', 'anak', '0000-00-00', 'anya.jpg', 'anya.jpg'),
(2, 1, '12121', '1212', '1212', 'wendy', 'laki -laki', 'tangerang', '2024-06-04', '19:09', 'senin', 'anak', '0000-00-00', 'anya.jpg', 'anya.jpg');

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
  `surat_pengantar` varchar(255) NOT NULL,
  `tanggal_surat_kematian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_kematian`
--

INSERT INTO `surat_kematian` (`id_surat_kematian`, `id_pejabat`, `nik`, `nik_pelapor`, `umur_pelapor`, `tempat_kematian`, `tanggal_kematian`, `jam_kematian`, `hari_kematian`, `sebab_kematian`, `hubungan_sebagai`, `surat_pengantar`, `tanggal_surat_kematian`) VALUES
(0, 1, '12312', '12312', 12, 'Tangerang', '2024-05-27', '22:50', 'Selasa', '', 'anak', 'img1557401465.jpg', '2024-06-02'),
(1, 1, '2147483647', '2147483647', 30, 'Tegal', '1990-11-11', '10:30', '', '', 'abah', '', '2019-11-15'),
(2, 1, '12346777', '123456789', 2, 'Tegal', '0000-00-00', '11:11', '', '', 'ibu', '', '2019-11-21'),
(7, 2, '3215260607060001', '3215260400820003', 21, 'Tangerang', '2024-04-30', '00:14', 'Senin', '', 'anak', '', '2024-05-13'),
(9, 2, '3215260401050001', '12345622222', 21, 'Tangerang', '2024-05-22', '15:32', 'Jumat', '', 'anak', '', '2024-05-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanah`
--

CREATE TABLE `tanah` (
  `id_tanah` int(11) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tanggal_haji` date NOT NULL,
  `tanggal_berangkat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `usaha`
--

CREATE TABLE `usaha` (
  `id_usaha` int(11) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama_usaha` varchar(50) NOT NULL,
  `sejak_usaha` varchar(50) NOT NULL,
  `alamat_usaha` varchar(255) NOT NULL,
  `bukti_usaha` varchar(255) NOT NULL,
  `surat_pengantar` varchar(255) NOT NULL,
  `tanggal_usaha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `usaha`
--

INSERT INTO `usaha` (`id_usaha`, `id_pejabat`, `nik`, `nama_usaha`, `sejak_usaha`, `alamat_usaha`, `bukti_usaha`, `surat_pengantar`, `tanggal_usaha`) VALUES
(2, 1, '12312', 'Muhammad Wendy', '2018', 'wqwq', 'userMuhammad_Wendy_Martadiansyah1.jpg', 'userMuhammad_Wendy_Martadiansyah1.jpg', '2024-06-01'),
(3, 1, '12312', 'Es Teh', '2018', 'alsut', 'userMuhammad_Wendy_Martadiansyah3.jpg', 'userMuhammad_Wendy_Martadiansyah3.jpg', '2024-06-02'),
(4, 2, '12312', 'Milo', '1212', 'Lengkong', 'img1557401465.jpg', 'img1557401465.jpg', '2024-06-02');

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
(17, 'ryan', 'ryan@gmail.com', '', '$2y$10$KWwKbOJJiLZwt3hHUD/JF.jprXUlyOrkbbOhft2HBKijmiecypcIG', 1, 1, 1710303052, '', 'staff desa'),
(26, 'Admin 1', 'admin1@gmail.com', '', '$2y$10$YZGynBx4mczwaRUDzx9T2O5.qzr8p3Fk5DWbYs4Lof5g12vNYen4y', 1, 1, 1717390441, '', 'staff desa'),
(27, 'Admin 2', 'admin2@gmail.com', '', '$2y$10$TFijuVwItiWM8T8JLOz.du0KDLsD5ObMR/WYLJDmW6Itl4o38XlNm', 2, 1, 1717390483, '', 'staff desa'),
(28, 'Joko', 'joko@gmail.com', 'userJoko.png', '$2y$10$ebZYeMCB3YSzQlCbZY0UxOid1abL4Z2ubgRh7gsfys3RLsKO5TEgG', 2, 1, 1717467584, '', 'penduduk'),
(29, 'Ryan alfaret hidayah', 'ryan1@gmail.com', 'gambar.jpg', '$2y$10$edtFYMd/3VK/muHKYb5Fp.SeTqsIlu5idCSrN7R7/OQoiv5HIlD8O', 2, 1, 1717485042, '', 'penduduk'),
(30, 'wendy', 'wendy@gmail.com', 'gambar.jpg', '$2y$10$TjlndRwbTI.HYRASkzFZb.7CYxW3kf8cVVvDCqH4Wdxqn0gZq431y', 2, 1, 1717485997, '', 'penduduk');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `cerai_mati`
--
ALTER TABLE `cerai_mati`
  ADD PRIMARY KEY (`id_cerai_mati`);

--
-- Indeks untuk tabel `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `domisili`
--
ALTER TABLE `domisili`
  ADD PRIMARY KEY (`id_domisili`);

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
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `tanah`
--
ALTER TABLE `tanah`
  ADD PRIMARY KEY (`id_tanah`);

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
-- AUTO_INCREMENT untuk tabel `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `batal_pindah`
--
ALTER TABLE `batal_pindah`
  MODIFY `id_batal_pindah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `belum_menikah`
--
ALTER TABLE `belum_menikah`
  MODIFY `id_belum_menikah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `cerai_mati`
--
ALTER TABLE `cerai_mati`
  MODIFY `id_cerai_mati` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `domisili`
--
ALTER TABLE `domisili`
  MODIFY `id_domisili` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `izin_keluarga`
--
ALTER TABLE `izin_keluarga`
  MODIFY `id_izin_keluarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kelahiran`
--
ALTER TABLE `kelahiran`
  MODIFY `id_kelahiran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menikah`
--
ALTER TABLE `menikah`
  MODIFY `id_menikah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pejabat`
--
ALTER TABLE `pejabat`
  MODIFY `id_pejabat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pemakaman`
--
ALTER TABLE `pemakaman`
  MODIFY `id_pemakaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `nik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `penghasilan`
--
ALTER TABLE `penghasilan`
  MODIFY `id_penghasilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pindah`
--
ALTER TABLE `pindah`
  MODIFY `id_pindah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pindahdatang`
--
ALTER TABLE `pindahdatang`
  MODIFY `no_kk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sktm`
--
ALTER TABLE `sktm`
  MODIFY `id_sktm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `surat_kelahiran`
--
ALTER TABLE `surat_kelahiran`
  MODIFY `id_surat_kelahiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tanah`
--
ALTER TABLE `tanah`
  MODIFY `id_tanah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `usaha`
--
ALTER TABLE `usaha`
  MODIFY `id_usaha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
