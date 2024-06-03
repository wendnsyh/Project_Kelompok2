-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 01:51 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

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
-- Table structure for table `announcement`
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
-- Table structure for table `batal_pindah`
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
-- Dumping data for table `batal_pindah`
--

INSERT INTO `batal_pindah` (`id_batal_pindah`, `id_pejabat`, `nik`, `alamat_batal_pindah`, `surat_pengantar`, `alasan`, `tanggal_batal_pindah`) VALUES
(1, 1, '1', 'se', '', 'a', '2024-06-04'),
(2, 1, '1', 'se', '', 'a', '2024-06-04');

-- --------------------------------------------------------

--
-- Table structure for table `belum_menikah`
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
-- Dumping data for table `belum_menikah`
--

INSERT INTO `belum_menikah` (`id_belum_menikah`, `id_pejabat`, `nik`, `surat_pengantar`, `alasan`, `tanggal_belum_menikah`) VALUES
(1, 1, '12312', 'userMuhammad_Wendy_Martadiansyah2.jpg', 'Banyak', '2024-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `cerai_mati`
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
-- Table structure for table `data_pegawai`
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
-- Dumping data for table `data_pegawai`
--

INSERT INTO `data_pegawai` (`id_pegawai`, `nik`, `nama_pegawai`, `no_telepon`, `alamat`, `jenis_kelamin`, `jabatan`, `tanggal_masuk`, `status`, `foto`) VALUES
(0, '3657', 'Muhammad Wendy Martadiansyah', '0895391063103', 'JL Raya puspitek serpong, gang salem 3', 'Laki-laki', 'IT Developer', '2023-12-26', 'Pegawai Tetap', 'th_(1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `domisili`
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
-- Dumping data for table `domisili`
--

INSERT INTO `domisili` (`id_domisili`, `id_pejabat`, `nik`, `surat_pengantar`, `alasan`, `tanggal_domisili`) VALUES
(1, 2, '12312', 'img1557401465.jpg', 'Kbeutuhan', '2024-06-02'),
(2, 2, '12312', 'userMuhammad_Wendy_Martadiansyah.jpg', 'Kbeutuhanas', '2024-06-02'),
(3, 1, '12312', 'userMuhammad_Wendy_Martadiansyah2.jpg', 'Banyak', '2024-06-02'),
(4, 2, '12312', 'userMuhammad_Wendy_Martadiansyah21.jpg', 'Kbeutuhan', '2024-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `izin_keluarga`
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
-- Dumping data for table `izin_keluarga`
--

INSERT INTO `izin_keluarga` (`id_izin_keluarga`, `id_pejabat`, `nik_ayah`, `nik_anak`, `surat_pengantar`, `tujuan_izin_keluarga`, `tanggal_izin_keluarga`) VALUES
(1, 1, '12312', '123456', 'userMuhammad_Wendy_M1.jpg', 'Belanda', '2024-06-02'),
(2, 2, '12312', '12312', 'img15574014651.jpg', 'Belanda', '2024-06-02'),
(3, 2, '12312', '12312', 'img15574014652.jpg', 'Belandaaa', '2024-06-03');

-- --------------------------------------------------------

--
-- Table structure for table `kelahiran`
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
-- Table structure for table `kematian`
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
-- Table structure for table `menikah`
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
-- Dumping data for table `menikah`
--

INSERT INTO `menikah` (`id_menikah`, `id_pejabat`, `nik`, `surat_pengantar`, `alasan`, `tanggal_menikah`) VALUES
(1, 2, '12312', 'img15574014651.jpg', 'Banyak', '2024-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `pejabat`
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
-- Dumping data for table `pejabat`
--

INSERT INTO `pejabat` (`id_pejabat`, `jenis_kelamin`, `alamat`, `nama_pejabat`, `foto`, `nip_pejabat`, `jabatan_pejabat`) VALUES
(1, 'Laki-laki', 'j', 'k', '', 9090, 'k'),
(2, 'Perempuan', 'Buaran 5', 'Azizi', '', 12345, 'Sekretaris Kelurahan');

-- --------------------------------------------------------

--
-- Table structure for table `pemakaman`
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
-- Dumping data for table `pemakaman`
--

INSERT INTO `pemakaman` (`id_pemakaman`, `id_pejabat`, `nik`, `tanggal_lahir`, `tempat_pemakaman`, `hari_pemakaman`, `tanggal_dimakamkan`, `jam_dimakamkan`, `surat_pengantar`, `tanggal_pemakaman`) VALUES
(1, 1, '12312', '0000-00-00', 'TPU', 'Selasa', '2024-06-03', '15:36', 'img1557401465.jpg', '2024-06-03');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
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
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`nik`, `no_kk`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `rt`, `rw`, `agama`, `status_perkawinan`, `pendidikan`, `pekerjaan`, `status`, `golongan_darah`, `kewarganegaraan`, `foto`) VALUES
(12312, 11, 'Es Teh', 'tanhgerang', '2024-06-06', 'Laki Laki', 'Di rumah', '12', 'Perumahan Bumi Karaw', 'Konghucu', 'Menikah', 'S3', 'wqwq', 'Tetap', '0', 'Warga Negara Asing', '1717156855_userMuhammad_Wendy_M2.jpg'),
(123456, 1233, 'Muhammad Wendy', 'tanhgerang', '2024-06-05', 'Laki Laki', 'alsut', '12', 'Kepala Dusun Krajan ', 'Islam', 'Menikah', 'S2', 'wqwq', 'Tetap', '0', 'Warga Negara Asing', 'default.png'),
(221212, 211111111, 'nama', 'qqw', '2024-05-01', 'Laki-laki', 'wew', '12', 'Kepala Dusun Sukamaj', 'islam', 'menikah', 'S3', 'wIRA', 'Tetap', '0', 'Indonesia', 'userPria.png'),
(123456989, 1233, 'Muhammad Wendy Martadiansyah', 'tangerang', '2024-06-03', 'Laki Laki', 'alsut', 'q', 'Kepala Dusun Krajan ', 'Katholik', 'Belum Menikah', 'Tidak Sekolah', 'wqwq', 'Tetap', 'q', 'Indonesia', '1717312654_Diagram_Tanpa_Judula.jpg'),
(2147483647, 1233, 'Muhammad Wendy', 'tanhgerang', '2024-05-29', 'Laki Laki', 'Di rumah', '12', 'Kepala Dusun Sukamul', 'Islam', 'Menikah', 'S3', 'wqwq', 'Tetap', '0', 'Warga Negara Asing', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `penghasilan`
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
-- Dumping data for table `penghasilan`
--

INSERT INTO `penghasilan` (`id_penghasilan`, `id_pejabat`, `nik`, `keperluan_penghasilan`, `jumlah_penghasilan`, `surat_pengantar`, `tanggal_penghasilan`) VALUES
(1, 1, '12312', 'qw', '10000', 'img1557401465.jpg', '0000-00-00'),
(2, 2, '12312', 'qw', '10000', 'img15574014651.jpg', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `pindah`
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
-- Dumping data for table `pindah`
--

INSERT INTO `pindah` (`id_pindah`, `id_pejabat`, `nik_kepala_keluarga`, `nik_pemohon`, `alasan_pindah`, `alamat_pindah`, `rt_pindah`, `rw_pindah`, `desa_pindah`, `kecamatan_pindah`, `kota_pindah`, `provinsi_pindah`, `kode_pos_pindah`, `tanggal_pindah`, `surat_pengantar`) VALUES
(1, 0, '12312', '12312', 'Keamanan', 'JL Raya puspitek serpong, gang salem 3', '1', '12', 'Serpong', 'Serping', 'Kota Tangerang Selatan', 'Banten', 15311, '2024-06-03', 'img155740146512.jpg'),
(2, 0, '12312', '12312', 'Pendidikan', 'alsut', '1', '12', 'Serpong', 'Serping', 'Kota Tangerang Selatan', 'Banten', 15311, '2024-06-03', 'img15574014652.jpg'),
(3, 0, '12312', '12312', 'Pendidikan', 'JL Raya puspitek serpong, gang salem 3', '1', '12', 'Serpong', 'Serping', 'Kota Tangerang Selatan', 'Banten', 15311, '2024-06-03', 'img155740146521.jpg'),
(4, 0, '123456', '221212', 'Pendidikan', 'Di rumah', '1', '12', 'Serpong', 'Serping', 'Kota Tangerang Selatan', 'Banten', 0, '2024-06-03', 'userMuhammad_Wendy_M1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pindahdatang`
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
-- Table structure for table `sktm`
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
-- Dumping data for table `sktm`
--

INSERT INTO `sktm` (`id_sktm`, `id_pejabat`, `nik_ayah`, `surat_pengantar`, `nik_anak`, `alasan`, `tanggal_sktm`) VALUES
(2, 2, '12312', 'userMuhammad_Wendy_M.jpg', '123456', '', '2024-06-01'),
(3, 1, '12312', 'userMuhammad_Wendy_Martadiansyah4.jpg', '12312', '12', '2024-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `surat_kelahiran`
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
-- Dumping data for table `surat_kelahiran`
--

INSERT INTO `surat_kelahiran` (`id_surat_kelahiran`, `id_pejabat`, `nik_ayah`, `nik_ibu`, `nik_pelapor`, `nama_anak`, `kelamin_anak`, `tempat_lahir_anak`, `tanggal_lahir_anak`, `jam_lahir_anak`, `hari_lahir_anak`, `hubungan_sebagai`, `tanggal_surat_kelahiran`, `surat_pengantar`, `bukti_kelahiran`) VALUES
(1, 1, '12121', '1212', '1212', 'wendy', 'laki -laki', 'tangerang', '2024-06-04', '19:09', 'senin', 'anak', '0000-00-00', 'anya.jpg', 'anya.jpg'),
(2, 1, '12121', '1212', '1212', 'wendy', 'laki -laki', 'tangerang', '2024-06-04', '19:09', 'senin', 'anak', '0000-00-00', 'anya.jpg', 'anya.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `surat_kematian`
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
-- Dumping data for table `surat_kematian`
--

INSERT INTO `surat_kematian` (`id_surat_kematian`, `id_pejabat`, `nik`, `nik_pelapor`, `umur_pelapor`, `tempat_kematian`, `tanggal_kematian`, `jam_kematian`, `hari_kematian`, `sebab_kematian`, `hubungan_sebagai`, `surat_pengantar`, `tanggal_surat_kematian`) VALUES
(0, 1, '12312', '12312', 12, 'Tangerang', '2024-05-27', '22:50', 'Selasa', '', 'anak', 'img1557401465.jpg', '2024-06-02'),
(1, 1, '2147483647', '2147483647', 30, 'Tegal', '1990-11-11', '10:30', '', '', 'abah', '', '2019-11-15'),
(2, 1, '12346777', '123456789', 2, 'Tegal', '0000-00-00', '11:11', '', '', 'ibu', '', '2019-11-21'),
(7, 2, '3215260607060001', '3215260400820003', 21, 'Tangerang', '2024-04-30', '00:14', 'Senin', '', 'anak', '', '2024-05-13'),
(9, 2, '3215260401050001', '12345622222', 21, 'Tangerang', '2024-05-22', '15:32', 'Jumat', '', 'anak', '', '2024-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `tanah`
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
-- Table structure for table `usaha`
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
-- Dumping data for table `usaha`
--

INSERT INTO `usaha` (`id_usaha`, `id_pejabat`, `nik`, `nama_usaha`, `sejak_usaha`, `alamat_usaha`, `bukti_usaha`, `surat_pengantar`, `tanggal_usaha`) VALUES
(2, 1, '12312', 'Muhammad Wendy', '2018', 'wqwq', 'userMuhammad_Wendy_Martadiansyah1.jpg', 'userMuhammad_Wendy_Martadiansyah1.jpg', '2024-06-01'),
(3, 1, '12312', 'Es Teh', '2018', 'alsut', 'userMuhammad_Wendy_Martadiansyah3.jpg', 'userMuhammad_Wendy_Martadiansyah3.jpg', '2024-06-02'),
(4, 2, '12312', 'Milo', '1212', 'Lengkong', 'img1557401465.jpg', 'img1557401465.jpg', '2024-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(126) CHARACTER SET latin1 NOT NULL,
  `email` varchar(120) CHARACTER SET latin1 NOT NULL,
  `image` varchar(126) CHARACTER SET latin1 NOT NULL,
  `password` varchar(256) CHARACTER SET latin1 NOT NULL,
  `hak_akses` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `tanggal_input` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `image`, `password`, `hak_akses`, `is_active`, `tanggal_input`) VALUES
(2, 'Ryan alfaret hidayah', 'ryanalfareth@gmail.com', 'pro1700544701.png', '$2y$10$JYfJAvYRGrVahg69WB33z.RdjrRMoFkxAjqjrfwYC9eFjo0.3H00u', 2, 1, 1700540437),
(3, 'wendy', 'wendy123@gmail.com', 'default.jpg', '$2y$10$2dNTX/xeQpDlOr6fr5NWyOOC4wDLy6sPJHQfr/IJQwUVbWd/o2yai', 2, 0, 1702471920),
(4, 'Muhammad Wendy', 'wendy.martadiandsyah75@gmail.com', 'userMuhammad_Wendy.jpg', '$2y$10$lHd1GvKTTIwmUCPI1Zi6p./MtXUX9F7SGxvX6tGkFY98boqjzdA3G', 1, 1, 1702635137),
(5, 'wend', 'martadiansyah89@gmail.com', 'default.jpg', '$2y$10$f/vX3hieuAaY0Z0NB3q2Uei6aFq9zv/0NuE7jcBlAEgGdSJwWu6z.', 1, 1, 1702643830),
(6, 'Muhammad Wendy Martadiansyah', '19220300@bsi.ac.id', 'userMuhammad_Wendy_Martadiansyah2.jpg', '$2y$10$loISv2C1VO2wU4LwHJNpketRKcqzS7N7Wv/nDLsvhTz3hHc.sXEva', 1, 1, 1703424339),
(7, 'Muhammad Wendy Martadiansyah', 'wendy.diansyah94@gmail.com', 'userMuhammad_Wendy_Martadiansyah2.jpg', '$2y$10$Jx7BPdbxzFHAgRDbO9/1ze0IJM.PeDmNs7DEKOwhDV28uk4tlUU/u', 1, 1, 1703506425),
(8, 'azri', 'azri123@gmail.com', 'default.jpg', '$2y$10$CD3dZe3J7yjulEF2JtSCNeKaBooMVdtf6.AVM/OHJCgJvX0fU4YNm', 1, 1, 1703507029),
(9, 'pangad tampan', 'pangad123@gmail.com', 'anya.jpg', '$2y$10$fWa2Vea/g8ThFzDim8Il/O83XoWulFqfgYTtnv9gwJc/RGD9Yetnq', 1, 1, 1703507340),
(10, 'Muhammad Wendy Martadiansyah', 'wendy94@gmail.com', 'userMuhammad_Wendy_Martadiansyah2.jpg', '$2y$10$meCASMoCsmUz/iksvDE3yuwvX5GEAaM88PZN7DR6A81a.Wk.9LB6a', 2, 1, 1703514923),
(11, 'Muhammad Wendy Martadiansyah', 'diansyah94@gmail.com', 'userMuhammad_Wendy_Martadiansyah2.jpg', '$2y$10$uCzqt4aHAIWhUqJq.d9WneFhFaxq/9t6Z0h7LaUWoA3QpIMxe2aXq', 1, 1, 1703602603),
(12, 'admin', 'admin@gmail.com', 'useradmin.jpeg', '$2y$10$WSL1XaXL5ARMfWJSdadjk.EMbmxUvsNKzZ9sqknhl1Z1hEdn607.u', 1, 1, 1704172451),
(13, 'Pria', 'wendy.martadiandsyah70@gmail.com', 'userPria.jpg', '$2y$10$73G6Z9SA8H/FQ7scHV8eROzFRyKrTGTMhpHHJRxgBtieIjKBUNECW', 1, 1, 1717090675);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batal_pindah`
--
ALTER TABLE `batal_pindah`
  ADD PRIMARY KEY (`id_batal_pindah`);

--
-- Indexes for table `belum_menikah`
--
ALTER TABLE `belum_menikah`
  ADD PRIMARY KEY (`id_belum_menikah`);

--
-- Indexes for table `cerai_mati`
--
ALTER TABLE `cerai_mati`
  ADD PRIMARY KEY (`id_cerai_mati`);

--
-- Indexes for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `domisili`
--
ALTER TABLE `domisili`
  ADD PRIMARY KEY (`id_domisili`);

--
-- Indexes for table `izin_keluarga`
--
ALTER TABLE `izin_keluarga`
  ADD PRIMARY KEY (`id_izin_keluarga`);

--
-- Indexes for table `kelahiran`
--
ALTER TABLE `kelahiran`
  ADD PRIMARY KEY (`id_kelahiran`);

--
-- Indexes for table `menikah`
--
ALTER TABLE `menikah`
  ADD PRIMARY KEY (`id_menikah`);

--
-- Indexes for table `pejabat`
--
ALTER TABLE `pejabat`
  ADD PRIMARY KEY (`id_pejabat`);

--
-- Indexes for table `pemakaman`
--
ALTER TABLE `pemakaman`
  ADD PRIMARY KEY (`id_pemakaman`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `penghasilan`
--
ALTER TABLE `penghasilan`
  ADD PRIMARY KEY (`id_penghasilan`);

--
-- Indexes for table `pindah`
--
ALTER TABLE `pindah`
  ADD PRIMARY KEY (`id_pindah`);

--
-- Indexes for table `pindahdatang`
--
ALTER TABLE `pindahdatang`
  ADD PRIMARY KEY (`no_kk`);

--
-- Indexes for table `sktm`
--
ALTER TABLE `sktm`
  ADD PRIMARY KEY (`id_sktm`);

--
-- Indexes for table `surat_kelahiran`
--
ALTER TABLE `surat_kelahiran`
  ADD PRIMARY KEY (`id_surat_kelahiran`);

--
-- Indexes for table `surat_kematian`
--
ALTER TABLE `surat_kematian`
  ADD PRIMARY KEY (`id_surat_kematian`);

--
-- Indexes for table `tanah`
--
ALTER TABLE `tanah`
  ADD PRIMARY KEY (`id_tanah`);

--
-- Indexes for table `usaha`
--
ALTER TABLE `usaha`
  ADD PRIMARY KEY (`id_usaha`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `batal_pindah`
--
ALTER TABLE `batal_pindah`
  MODIFY `id_batal_pindah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `belum_menikah`
--
ALTER TABLE `belum_menikah`
  MODIFY `id_belum_menikah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cerai_mati`
--
ALTER TABLE `cerai_mati`
  MODIFY `id_cerai_mati` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `domisili`
--
ALTER TABLE `domisili`
  MODIFY `id_domisili` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `izin_keluarga`
--
ALTER TABLE `izin_keluarga`
  MODIFY `id_izin_keluarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelahiran`
--
ALTER TABLE `kelahiran`
  MODIFY `id_kelahiran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menikah`
--
ALTER TABLE `menikah`
  MODIFY `id_menikah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pejabat`
--
ALTER TABLE `pejabat`
  MODIFY `id_pejabat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemakaman`
--
ALTER TABLE `pemakaman`
  MODIFY `id_pemakaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `nik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `penghasilan`
--
ALTER TABLE `penghasilan`
  MODIFY `id_penghasilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pindah`
--
ALTER TABLE `pindah`
  MODIFY `id_pindah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pindahdatang`
--
ALTER TABLE `pindahdatang`
  MODIFY `no_kk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sktm`
--
ALTER TABLE `sktm`
  MODIFY `id_sktm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `surat_kelahiran`
--
ALTER TABLE `surat_kelahiran`
  MODIFY `id_surat_kelahiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tanah`
--
ALTER TABLE `tanah`
  MODIFY `id_tanah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usaha`
--
ALTER TABLE `usaha`
  MODIFY `id_usaha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
