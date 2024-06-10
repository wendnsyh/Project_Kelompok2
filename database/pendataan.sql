-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 03:49 AM
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
(1, 1, '12312', 'userMuhammad_Wendy_Martadiansyah2.jpg', 'Banyak', '2024-06-02'),
(3, 12, '123456', 'img155740146511.jpg', 'Banyak', '2024-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `ringkasan` text NOT NULL,
  `isi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `ringkasan`, `isi`, `created_at`, `updated_at`, `image`) VALUES
(1, 'Keshatan', 'kesehatan', 'dassssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '2024-06-08 07:35:37', '2024-06-09 15:58:22', 'people-holding-hands-dark-skin-tone-svgrepo-com1.png'),
(2, 'Gajian cuy', 'Ksehatan merupakan hal penting', 'hjgngg', '2024-06-09 11:04:21', '2024-06-09 11:04:21', 'img1557401465.jpg');

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

--
-- Dumping data for table `cerai_mati`
--

INSERT INTO `cerai_mati` (`id_cerai_mati`, `id_pejabat`, `nik`, `surat_pengantar`, `alasan`, `tanggal_cerai_mati`) VALUES
(3, 13, '123456', 'img155740146513.jpg', 'Banyak', '2024-06-09');

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
  `created_by` int(11) NOT NULL,
  `tanggal_domisili` date NOT NULL,
  `no_surat_rt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `domisili`
--

INSERT INTO `domisili` (`id_domisili`, `id_pejabat`, `nik`, `surat_pengantar`, `alasan`, `created_by`, `tanggal_domisili`, `no_surat_rt`) VALUES
(1, 2, '12312', 'img1557401465.jpg', 'Kbeutuhan', 0, '2024-06-02', 0),
(2, 2, '12312', 'userMuhammad_Wendy_Martadiansyah.jpg', 'Kbeutuhanas', 0, '2024-06-02', 0),
(3, 1, '12312', 'userMuhammad_Wendy_Martadiansyah2.jpg', 'Banyak', 0, '2024-06-02', 0),
(4, 2, '12312', 'userMuhammad_Wendy_Martadiansyah21.jpg', 'Kbeutuhan', 0, '2024-06-02', 0),
(5, 4, '12312', 'userMuhammad_Wendy_M.jpg', 'Ga betah', 0, '2024-06-09', 0),
(6, 4, '11111111111111111111111111', 'userMuhammad_Wendy_M1.jpg', 'ingin buat rumah', 2, '2024-06-09', 0),
(7, 4, '111111111111111000', 'userMuhammad_Wendy_M11.jpg', 'ingin buat rumah', 2, '2024-06-09', 0),
(8, 4, '111111111119090', 'userMuhammad_Wendy_M12.jpg', 'ingin buat rumah', 2, '2024-06-09', 0),
(9, 5, '11111111111111111111111111', 'img15574014652.jpg', 'Banyak', 2, '2024-06-09', 0),
(10, 4, '123456989', 'userMuhammad_Wendy_Martadiansyah1.jpg', 'Ga betah', 1, '2024-06-09', 0),
(11, 5, '12121', 'img155740146521.jpg', 'Banyak', 2, '2024-06-09', 0),
(14, 11, '123456', 'img155740146514.jpg', 'Kbeutuhan', 0, '2024-06-09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `image`) VALUES
(4, 'Gimana Kondisi Kelurahan Serpong?', 'keren', 'people-watching-online-fireworks-svgrepo-com1.png');

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
  `tanggal_izin_keluarga` date NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `izin_keluarga`
--

INSERT INTO `izin_keluarga` (`id_izin_keluarga`, `id_pejabat`, `nik_ayah`, `nik_anak`, `surat_pengantar`, `tujuan_izin_keluarga`, `tanggal_izin_keluarga`, `created_by`) VALUES
(1, 1, '12312', '123456', 'userMuhammad_Wendy_M1.jpg', 'Belanda', '2024-06-02', 0),
(2, 2, '12312', '12312', 'img15574014651.jpg', 'Belanda', '2024-06-02', 0),
(3, 2, '12312', '12312', 'img15574014652.jpg', 'Belandaaa', '2024-06-03', 0),
(4, 4, '12121', '12121', 'img15574014653.jpg', 'Belandaaa', '2024-06-09', 2),
(5, 4, '12312', '12312', 'userMuhammad_Wendy_M3.jpg', 'belanda', '2024-06-09', 1),
(7, 12, '123456', '123456', 'people-watching-online-fireworks-svgrepo-com.png', 'Belandaaa', '2024-06-09', 0);

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
  `jenis_kelamin` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nik_ayah` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(50) NOT NULL,
  `nik_ibu` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `rt` varchar(20) NOT NULL,
  `rw` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelahiran`
--

INSERT INTO `kelahiran` (`id_kelahiran`, `nama`, `hari`, `tempat_lahir`, `tanggal_lahir`, `pukul`, `jenis_kelamin`, `alamat`, `nik_ayah`, `nama_ayah`, `pekerjaan_ayah`, `nik_ibu`, `nama_ibu`, `pekerjaan_ibu`, `rt`, `rw`) VALUES
(1, 'Refy Fitriani Saputri', '1', 'Tangerang', '2024-06-09', '00:00:00', 'Laki Laki', 'Tangerang Selatan', '', 'Joko', '', '', 'Ijah', '', '01', 'Kepala Dusun Krajan '),
(2, 'Muhammad Wendy Martadiansyah', '', 'Tangerang', '2001-03-03', '04:06:00', 'Laki Laki', 'Itc Roxy Mas, Jalan', '', 'Wendy', '', '', 'Asa', '', '12', 'Kepala Dusun Krajan '),
(3, 'Muhammad Wendy Martadiansyah', '', 'Tangerang', '2024-06-02', '04:14:00', 'Laki Laki', 'Lengkong', '', 'Wendy', '', '', 'Asa', '', '12', '>Perumahan Gading El'),
(4, 'Muhammad Wendy Martadiansyah', '', 'Tangerang', '2024-06-02', '04:14:00', 'Laki Laki', 'Lengkong', '', 'Wendy', '', '', 'Asa', '', '12', '>Perumahan Gading El'),
(5, 'Muhammad Wendy Martadiansyah', '', 'Tangerang', '2001-02-12', '00:22:00', 'Laki Laki', 'JL Raya Puspitek Serpong, Gang Salem 3', '', 'Wendy', 'Buruh', '', 'Asa', 'Ibu Rumah Tangga', '12', 'Kepala Dusun Krajan ');

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

--
-- Dumping data for table `kematian`
--

INSERT INTO `kematian` (`id_kematian`, `nik`, `nama_kepala_keluarga`, `no_kk`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `pekerjaan`, `alamat`, `rt`, `rw`, `kewarganegaraan`, `hari_wafat`, `tanggal_wafat`, `pukul`, `sebab_wafat`, `tempat_wafat`, `keterangan`, `nik_ayah`, `nama_ayah`, `tanggal_lahir_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nik_ibu`, `nama_ibu`, `tanggal_lahir_ibu`, `pekerjaan_ibu`, `alamat_ibu`) VALUES
(6665865, '', '', '', 'Saepul', 'tangerang', '0000-00-00', 'Laki Laki', 'Konghucu', 'Karyawan swasta', 'tangerang selatan', '01', 'Kepala Dusun Sukamul', '', 'Selasa', '2024-06-09', '17:39:00', '', '', '', '', '', '0000-00-00', '', '', '', '', '0000-00-00', '', '');

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
(1, 2, '12312', 'img15574014651.jpg', 'Banyak', '2024-06-02'),
(3, 13, '123456', 'people-watching-online-fireworks-svgrepo-com.png', 'Banyak', '2024-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `pejabat`
--

CREATE TABLE `pejabat` (
  `id_pejabat` int(11) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nama_pejabat` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `nip_pejabat` int(11) NOT NULL,
  `jabatan_pejabat` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pejabat`
--

INSERT INTO `pejabat` (`id_pejabat`, `jenis_kelamin`, `alamat`, `nama_pejabat`, `image`, `nip_pejabat`, `jabatan_pejabat`) VALUES
(7, 'Laki Laki', 'Tangerang selatan', 'Yusup Mansur', 'userMuhammad_Wendy_Martadiansyah.jpg', 90909, 'lurah'),
(8, '', 'Tangerang Selatan\r\n', 'Shinta julia', 'userMuhammad_Wendy_Martadiansyah1.jpg', 909090, 'Wakil Lurah'),
(9, '', 'Tangerang selatan', 'Joko Susilo', 'userMuhammad_Wendy_Martadiansyah11.jpg', 808080, 'Sekertaris Kelurahan'),
(10, 'Laki Laki', 'Tangerang selatan\r\n', 'Arif yudo', 'userMuhammad_Wendy_Martadiansyah12.jpg', 707070, 'Seksi Pemerintahan'),
(11, 'Laki Laki', 'Tangerang selatan', 'Bambang Joko', 'userMuhammad_Wendy_Martadiansyah13.jpg', 606060, 'Seksi Pembangunan'),
(12, 'Laki Laki', 'Tangerang selatan', 'Jodi amat', 'userMuhammad_Wendy_Martadiansyah14.jpg', 505050, 'Seksi Sosial'),
(13, 'Perempuan', 'Tangerang selatan', 'Mahalini', 'userMuhammad_Wendy_Martadiansyah15.jpg', 404040, 'Seksi Kesejahteraan');

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
(1, 1, '12312', '0000-00-00', 'TPU', 'Selasa', '2024-06-03', '15:36', 'img1557401465.jpg', '2024-06-03'),
(3, 7, '123456', '0000-00-00', 'Tangerang', 'Sabtu', '2024-06-09', '23:24', 'img155740146511.jpg', '2024-06-09');

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
(123456, 1234, 'wendy martadiansya', 'tangerang', '2004-02-03', 'Laki Laki', 'tangerang selatan, pondok jagung', '01', 'Kepala Dusun Krajan ', 'Islam', 'Belum Menikah', 'SD', 'Karyawan swasta', 'Tetap', '-', 'Indonesia', ''),
(1234567, 12345, 'Ryan alfaret hidayah', 'Tangerang', '2004-03-01', 'Laki Laki', 'Tangerang selartan, bsd', '02', 'Kepala Dusun Krajan ', 'Kristen', 'Menikah', 'SMP', 'Pengusaha', 'Kontrak', '-', 'Indonesia', ''),
(12345678, 1234567, 'Yahya Hasani Fauzi', 'Tangerang', '2004-03-03', 'Laki Laki', 'Tangerang selatan, cicayur', '03', 'Kepala Dusun Sukamaj', 'Katholik', 'Menikah', 'SMA', 'Karyawan swasta', 'Tetap', '-', 'Warga Negara Asing', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `tanggal_penghasilan` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penghasilan`
--

INSERT INTO `penghasilan` (`id_penghasilan`, `id_pejabat`, `nik`, `keperluan_penghasilan`, `jumlah_penghasilan`, `surat_pengantar`, `tanggal_penghasilan`, `status`, `created_by`) VALUES
(1, 1, '12312', 'qw', '10000', 'img1557401465.jpg', '0000-00-00', '', 0),
(2, 2, '12312', 'qw', '10000', 'img15574014651.jpg', '0000-00-00', '', 0),
(7, 5, '12312', 'banyak', '10000', 'img155740146521.jpg', '0000-00-00', '', 1),
(11, 4, '12121', 'banyak', '10000', 'userMuhammad_Wendy_M14.jpg', '0000-00-00', '', 2),
(12, 5, '12121', 'banyak', '10000', 'img155740146522.jpg', '0000-00-00', '', 2),
(13, 5, '12121', 'banyak', '10000', 'userMuhammad_Wendy_M15.jpg', '0000-00-00', '', 2),
(17, 8, '123456', 'banyak', '1000000000000', 'img155740146513.jpg', '0000-00-00', '', 1);

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
(4, 0, '123456', '221212', 'Pendidikan', 'Di rumah', '1', '12', 'Serpong', 'Serping', 'Kota Tangerang Selatan', 'Banten', 0, '2024-06-03', 'userMuhammad_Wendy_M1.jpg'),
(5, 0, '12312', '12312', 'Pekerjaan', 'Lengkong', '12', '12', 'Serpong', 'Serping', 'awq', 'qwq', 0, '2024-06-08', 'img15574014653.jpg'),
(6, 0, '12312', '12312', 'Perumahan', 'JL Raya puspitek serpong, gang salem 3', '12', '12', 'Serpong', 'Serping', 'Kota Tangerang Selatan', 'qwq', 15311, '2024-06-08', 'img15574014654.jpg'),
(8, 5, '12312', '12312', 'Keamanan', 'itc roxy mas, jalan', '12', '12', 'Serpong', 'Serping', 'Silakan pilih kota Anda', 'qwq', 15311, '2024-06-08', 'img155740146522.jpg'),
(10, 8, '123456', '123456', 'Pendidikan', 'asa', '12', '12', 'asdasd', 'adasd', 'a', 'asdad', 0, '2024-06-09', 'img155740146514.jpg');

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
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'penduduk');

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
(3, 1, '12312', 'userMuhammad_Wendy_Martadiansyah4.jpg', '12312', '12', '2024-06-02'),
(5, 7, '123456', 'people-watching-online-fireworks-svgrepo-com.png', '123456', 'ingin buat rumah', '2024-06-09'),
(6, 7, '123456', 'people-watching-online-fireworks-svgrepo-com1.png', '123456', 'ingin buat rumah', '2024-06-09');

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
(2, 1, '12121', '1212', '1212', 'wendy', 'laki -laki', 'tangerang', '2024-06-04', '19:09', 'senin', 'anak', '0000-00-00', 'anya.jpg', 'anya.jpg'),
(3, 8, '123456', '123456', '123456', 'Muhammad Wendy', 'Laki-Laki', 'Tangerang', '2024-06-04', '12:22', 'Senin', 'anak kandung', '2024-06-09', 'people-watching-online-fireworks-svgrepo-com2.png', 'people-watching-online-fireworks-svgrepo-com2.png');

-- --------------------------------------------------------

--
-- Table structure for table `surat_kematian`
--

CREATE TABLE `surat_kematian` (
  `id_surat_kematian` int(11) NOT NULL,
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
(1, 1, '12312', '12312', 12, 'Tangerang', '2024-05-27', '22:50', 'Selasa', '', 'anak', 'img1557401465.jpg', '2024-06-02'),
(2, 1, '2147483647', '2147483647', 30, 'Tegal', '1990-11-11', '10:30', '', '', 'abah', '', '2019-11-15'),
(3, 1, '12346777', '123456789', 2, 'Tegal', '0000-00-00', '11:11', '', '', 'ibu', '', '2019-11-21'),
(4, 2, '3215260607060001', '3215260400820003', 21, 'Tangerang', '2024-04-30', '00:14', 'Senin', '', 'anak', '', '2024-05-13'),
(5, 2, '3215260401050001', '12345622222', 21, 'Tangerang', '2024-05-22', '15:32', 'Jumat', '', 'anak', '', '2024-05-22'),
(7, 7, '123456', '123456', 12121, 'Tangerang', '2024-06-09', '23:28', 'Rabu', '', 'anak', 'img155740146511.jpg', '2024-06-09');

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
(4, 2, '12312', 'Milo', '1212', 'Lengkong', 'img1557401465.jpg', 'img1557401465.jpg', '2024-06-02'),
(6, 12, '123456', 'Es Teh', '2018', 'JL Raya puspitek serpong, gang salem 3', 'people-watching-online-fireworks-svgrepo-com2.png', 'people-watching-online-fireworks-svgrepo-com2.png', '2024-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `image`, `password`, `role_id`, `is_active`, `tanggal_input`, `alamat`, `level`) VALUES
(34, 'Staf Desa', 'staff@gmail.com', 'userStaf_Desa.jpg', '$2y$10$Ul44eluwplgzq3.J3KF2ZuIZw6DaIzUcNnxxPZK67yTlorhbeFmh.', 1, 1, 1717929000, '', 'penduduk'),
(35, 'Penduduk desa', 'penduduk@gmail.com', 'gambar.jpg', '$2y$10$bZYskh/7oRO4AJ7z6c3JhOazca3vO0VGUidbmOJkcGzVci5ThbvdG', 1, 1, 1717929035, '', 'penduduk');

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
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cerai_mati`
--
ALTER TABLE `cerai_mati`
  ADD PRIMARY KEY (`id_cerai_mati`);

--
-- Indexes for table `domisili`
--
ALTER TABLE `domisili`
  ADD PRIMARY KEY (`id_domisili`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `batal_pindah`
--
ALTER TABLE `batal_pindah`
  MODIFY `id_batal_pindah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `belum_menikah`
--
ALTER TABLE `belum_menikah`
  MODIFY `id_belum_menikah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cerai_mati`
--
ALTER TABLE `cerai_mati`
  MODIFY `id_cerai_mati` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `domisili`
--
ALTER TABLE `domisili`
  MODIFY `id_domisili` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `izin_keluarga`
--
ALTER TABLE `izin_keluarga`
  MODIFY `id_izin_keluarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kelahiran`
--
ALTER TABLE `kelahiran`
  MODIFY `id_kelahiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menikah`
--
ALTER TABLE `menikah`
  MODIFY `id_menikah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pejabat`
--
ALTER TABLE `pejabat`
  MODIFY `id_pejabat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pemakaman`
--
ALTER TABLE `pemakaman`
  MODIFY `id_pemakaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `nik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `penghasilan`
--
ALTER TABLE `penghasilan`
  MODIFY `id_penghasilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pindah`
--
ALTER TABLE `pindah`
  MODIFY `id_pindah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pindahdatang`
--
ALTER TABLE `pindahdatang`
  MODIFY `no_kk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sktm`
--
ALTER TABLE `sktm`
  MODIFY `id_sktm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `surat_kelahiran`
--
ALTER TABLE `surat_kelahiran`
  MODIFY `id_surat_kelahiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `surat_kematian`
--
ALTER TABLE `surat_kematian`
  MODIFY `id_surat_kematian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tanah`
--
ALTER TABLE `tanah`
  MODIFY `id_tanah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usaha`
--
ALTER TABLE `usaha`
  MODIFY `id_usaha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
