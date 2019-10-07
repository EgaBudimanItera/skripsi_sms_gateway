-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2019 at 06:49 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_lsj_sms_gateway`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`) VALUES
('admin', '200ceb26807d6bf99fd6f4f0d1ca54d4', 'Administrator', 'yasir.herwendi@yahoo.com', '082282999777', 'admin', 'N'),
('finance', '57336afd1f4b40dfd9f5731e35302fe5', 'Bag.Keuangan', 'finance@gmail.com', '082282999777', 'admin', 'N'),
('manager', '1d0258c2440a8d19e716292b231e3190', 'Manager Perusahaan', 'manager@gmail.com', '082282999777', 'admin', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE IF NOT EXISTS `header` (
`id_header` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`id_header`, `judul`, `url`, `gambar`, `tgl_posting`) VALUES
(21, 'Header1', '', '1.jpg', '2011-03-29'),
(22, 'Header2', '', '2.jpg', '2011-03-29'),
(23, 'Header3', '', '3.jpg', '2011-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `kategori_seo` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `kategori_seo`) VALUES
(25, 'Lipstik', 'lipstik'),
(24, 'Bedak', 'bedak'),
(27, 'Facial Wash', 'facial-wash'),
(29, 'Cream Wajah', 'cream-wajah'),
(30, 'Foundation', 'foundation'),
(31, 'Blush On', 'blush-on'),
(32, 'Aye Shadow', 'aye-shadow'),
(33, 'parfum', 'parfum'),
(34, 'minyak rambut', 'minyak-rambut'),
(38, 'Pensil alis', 'pensil-alis'),
(37, 'Mascara & aye linear', 'mascara--aye-linear'),
(39, 'Serum mask', 'serum-mask'),
(40, 'remover', 'remover');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE IF NOT EXISTS `konfirmasi` (
`id_konfirmasi` int(5) NOT NULL,
  `id_orders` int(5) NOT NULL,
  `nama_kustomer` varchar(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `norek` varchar(50) NOT NULL,
  `pemilik` varchar(50) NOT NULL,
  `nominal` varchar(50) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `tgl_konfirmasi` date NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konfirmasi`, `id_orders`, `nama_kustomer`, `bank`, `norek`, `pemilik`, `nominal`, `gambar`, `tgl_konfirmasi`, `keterangan`) VALUES
(43, 17, 'rika agustina', 'Bank Mandiri', '114.000.456.992.0', 'CV LAUT SELATAN JAYA', '2190000', 'IMG_20190730_072830.jpg', '2019-08-12', 'Angsuran ke-1'),
(42, 16, 'sujarwo', 'Bank Mandiri', '114.000.456.992.0', 'CV LAUT SELATAN JAYA', '2865000', 'IMG_20190729_104207.jpg', '2019-08-12', 'Angsuran ke-1'),
(40, 14, 'anggi saputra', 'Bank Mandiri', '114.000.456.992.0', 'CV LAUT SELATAN JAYA', '3855000', 'IMG_20190729_104007.jpg', '2019-08-11', 'Angsuran ke-1'),
(41, 15, 'dita anggita', 'Bank Mandiri', '114.000.456.992.0', 'CV LAUT SELATAN JAYA', '2000000', 'IMG_20190729_104024.jpg', '2019-08-11', 'Angsuran ke-1'),
(36, 11, 'adelina dhamayanti', 'Bank Mandiri', '114.000.456.992.0', 'CV LAUT SELATAN JAYA', '500000', 'IMG_20190729_104007.jpg', '2019-08-11', 'Angsuran ke-1'),
(37, 10, 'adityo', 'Bank Mandiri', '114.000.456.992.0', 'CV LAUT SELATAN JAYA', '1600000', 'IMG_20190730_072834.jpg', '2019-08-11', 'Angsuran ke 2'),
(38, 12, 'adityo', 'Bank Mandiri', '114.000.456.992.0', 'CV LAUT SELATAN JAYA', '1000000', 'IMG_20190730_072830.jpg', '2019-08-11', 'angsuran ke-3'),
(39, 13, 'nopal gilang', 'Bank Mandiri', '114.000.456.992.0', 'CV LAUT SELATAN JAYA', '2500000', 'IMG_20190729_104147.jpg', '2019-08-11', 'Angsuran ke-1'),
(35, 7, 'kurnia adi saputra', 'Bank Mandiri', '114.000.456.992.0', 'CV LAUT SELATAN JAYA', '2000000', 'IMG_20190730_072728.jpg', '2019-01-05', 'angsuran ke-1'),
(44, 18, 'mardiana indri', 'Bank Mandiri', '114.000.456.992.0', 'CV LAUT SELATAN JAYA', '2175000', 'IMG_20190729_104147.jpg', '2019-08-12', 'Angsuran ke-1'),
(45, 19, 'anggun suciati', 'Bank Mandiri', '114.000.456.992.0', 'CV LAUT SELATAN JAYA', '2000000', 'IMG_20190729_104007.jpg', '2019-08-12', 'Angsuran ke-1'),
(46, 21, 'adelina dhamayanti', 'Bank Mandiri', '114.000.456.992.0', 'CV LAUT SELATAN JAYA', '1725000', 'IMG_20190730_072830.jpg', '2019-08-14', 'Angsuran ke-1'),
(47, 40, 'dian irawan', 'Bank Mandiri', '114.000.456.992.0', 'CV LAUT SELATAN JAYA', '1800000', 'IMG_20190730_072830.jpg', '2019-05-03', 'Angsuran ke-1'),
(48, 42, 'ulfa mustika', 'Bank Mandiri', '114.000.456.992.0', 'CV LAUT SELATAN JAYA', '1900000', 'IMG_20190729_104007.jpg', '2019-05-06', 'Angsuran ke-1'),
(49, 37, 'ulfa mustika', 'Bank Mandiri', '114.000.456.992.0', 'CV LAUT SELATAN JAYA', '180000', 'IMG_20190729_104022.jpg', '2019-05-06', 'Angsuran ke 2'),
(50, 36, 'ulfa mustika', 'Bank Mandiri', '114.000.456.992.0', 'CV LAUT SELATAN JAYA', '181000', 'bukti pembayaran.jpeg', '2019-05-06', 'angsuran ke-3'),
(51, 35, 'ulfa mustika', 'Bank Mandiri', '114.000.456.992.0', 'CV LAUT SELATAN JAYA', '33000', 'IMG_20190729_104147.jpg', '2019-05-06', 'Angsuran ke-4'),
(52, 32, 'ulfa mustika', 'Bank Mandiri', '114.000.456.992.0', 'CV LAUT SELATAN JAYA', '230000', 'IMG_20190729_104007.jpg', '2019-05-06', 'angsuran ke-5'),
(53, 41, 'dian irawan', 'Bank Mandiri', '114.000.456.992.0', 'CV LAUT SELATAN JAYA', '375000', 'IMG_20190729_104207.jpg', '2019-05-06', 'Angsuran ke-1'),
(54, 39, 'yassir', 'Bank Mandiri', '114.000.456.992.0', 'CV LAUT SELATAN JAYA', '45000', 'IMG_20190729_104207.jpg', '2019-05-06', 'Angsuran ke-1'),
(55, 34, 'yassir', 'Bank Mandiri', '114.000.456.992.0', 'CV LAUT SELATAN JAYA', '60000', 'IMG_20190730_072834.jpg', '2019-05-06', 'Angsuran ke 2'),
(56, 33, 'yassir', 'Bank Mandiri', '114.000.456.992.0', 'CV LAUT SELATAN JAYA', '150000', 'IMG_20190730_072830.jpg', '2019-05-06', 'angsuran ke-3'),
(57, 43, 'adityo', 'Bank Mandiri', '114.000.456.992.0', 'CV LAUT SELATAN JAYA', '3984500', 'IMG_20190819_085812.jpg', '2019-05-09', 'angsuran ke-6'),
(58, 44, 'dian irawan', 'Bank Mandiri', '114.000.456.992.0', 'CV LAUT SELATAN JAYA', '1500000', 'IMG_20190729_104024.jpg', '2019-05-09', 'Angsuran ke 2'),
(59, 45, 'ulfa mustika', 'Bank Mandiri', '114.000.456.992.0', 'CV LAUT SELATAN JAYA', '2000000', 'IMG_20190729_104007.jpg', '2019-05-09', 'Angsuran ke-1'),
(60, 46, 'dian irawan', 'Bank Mandiri', '114.000.456.992.0', 'CV LAUT SELATAN JAYA', '1125000', 'IMG_20190730_072830.jpg', '2019-05-10', 'Angsuran ke 2'),
(61, 47, 'ulfa mustika', 'Bank Mandiri', '114.000.456.992.0', 'CV LAUT SELATAN JAYA', '500000', 'IMG_20190729_104147.jpg', '2019-05-10', 'Angsuran ke-1'),
(62, 57, 'ulfa mustika', 'Mandiri', '114.000.456.992.0', 'CV LAUT SELATAN JAYA', '450000', 'IMG_20190729_104007.jpg', '2019-08-30', 'pembayaran tunai'),
(63, 58, 'nurmuhayat', 'BNI', '931.2626.1983', 'CV LAUT SELATAN JAYA', '280000', 'IMG_20190729_104147.jpg', '2019-08-30', 'pembayaran tunai'),
(64, 59, 'wahyu irawan', 'BCA', '321998069', 'CV LAUT SELATAN JAYA', '100000', 'IMG_20190819_085812.jpg', '2019-08-30', 'Angsuran ke-1'),
(65, 60, 'ulfa mustika', 'Mandiri', '114.000.456.992.0', 'ulfa', '100000', '17.jpg', '2019-08-31', 'Angsuran ke-1');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
`id_kota` int(3) NOT NULL,
  `id_perusahaan` int(10) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `ongkos_kirim` int(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `id_perusahaan`, `nama_kota`, `ongkos_kirim`) VALUES
(13, 6, 'Bandar Lampung', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kustomer`
--

CREATE TABLE IF NOT EXISTS `kustomer` (
`id_kustomer` int(5) NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `telpon` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('N','Y') DEFAULT 'Y',
  `nama_toko` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kustomer`
--

INSERT INTO `kustomer` (`id_kustomer`, `password`, `nama_lengkap`, `alamat`, `email`, `telpon`, `aktif`, `nama_toko`) VALUES
(30, '202cb962ac59075b964b07152d234b70', 'Lita Amalia', 'Tanjung Senang', 'lita@gmail.com', '+6282282999777', 'Y', ''),
(31, '202cb962ac59075b964b07152d234b70', 'Maya', 'Tanjung Bintang', 'maya@gmail.com', '+6285213764424', 'Y', ''),
(32, '202cb962ac59075b964b07152d234b70', 'Mita Amalia', 'Kota Baru', 'mita@gmail.com', '+6285213764424', 'Y', ''),
(28, '202cb962ac59075b964b07152d234b70', 'Retno Murdaningrum', 'Jl.Darusallam No.31 Langkapura Baru, Kemiling. Bandar Lampung - 35154', 'retno@gmail.com', '+6282376747914', 'Y', ''),
(29, '202cb962ac59075b964b07152d234b70', 'Desta Dwi', 'Kota Baru', 'desta@gmail.com', '+6282282999777', 'Y', ''),
(42, 'cfce9735de7c3873a55331a4e74b70fc', 'rudy pratama', 'panjang, bandar lampung', 'rudypratama@gmail.com', '+6285696728504', 'Y', ''),
(34, '202cb962ac59075b964b07152d234b70', 'Ulfa', 'Teluk Betung', 'ulfa@gmail.com', '+6282179402425', 'Y', ''),
(41, '34cb624491c8b24a27991ba9a1d5ad51', 'adelina dhamayanti', 'sukaraja', 'adelinadhamayanti@gmail.com', '+6281360603165', 'Y', ''),
(36, 'f976b57bb9dd27aa2e7e7df2825893a6', 'indri', 'sukaraja', 'indriyunita@gmail.com', '+6281272702428', 'Y', ''),
(37, 'fae38bd94701cdf2a9d114425cb40292', 'dwi ayu ', 'sarijo', 'dwiayu@gmail.com', '+628979298066', 'Y', ''),
(38, 'd6a4740b2da6818f9d2da4fba80a72bf', 'adityo', 'sukaraja', 'adityo@gmail.com', '+6285268256313', 'Y', ''),
(39, '6f3792a964f0e3a5f06a35dfe609716c', 'sayu', 'kedaton', 'sayu@gmail.com', '+6282167610707', 'Y', ''),
(40, '7fb37b2fcb7ec6b925eacbf71f9f9b65', 'yassir', 'kedaton', 'yassir@gmail.com', '+6282282999777', 'Y', ''),
(43, 'f872533a62f1a23afa0291337401561f', 'mustika intan suri', 'way gubak', 'mustikaintan@gmail.com', '+6289675007916', 'Y', ''),
(44, 'c46335eb267e2e1cde5b017acb4cd799', 'kurnia adi saputra', 'sarijo', 'kurniaadi@gmail.com', '+6289631395644', 'Y', ''),
(45, 'f4f068e71e0d87bf0ad51e6214ab84e9', 'angel salsa bila', 'talang', 'angelsalsa@gmail.com', '+6285840678865', 'Y', ''),
(46, '71f7be7b8496f7ece8454b1bcdcd2162', 'mardiana indri', 'sukaraja', 'mardianaindri30@yahoo.com', '+6281272702448', 'Y', ''),
(47, 'e26026b73cdc3b59012c318ba26b5518', 'zeta rama marcella', 'talang', 'zetarama@gmail.com', '+6289655311618', 'Y', ''),
(48, 'f97de4a9986d216a6e0fea62b0450da9', 'mardiana sulistyawati', 'sukaraja', 'mardiana93@gmail.com', '+6281377779480', 'Y', ''),
(49, '32c9e71e866ecdbc93e497482aa6779f', 'wahyu irawan', 'sukaraja', 'irawanwahyu@gmail.com', '+6281377779544', 'Y', ''),
(50, '04b9c07a5ce95c5997dfbee5a3df33a3', 'sutopo', 'sukaraja', 'sutopo70@gmail.com', '+6295268256313', 'Y', ''),
(51, 'e32994c67f9a773e841f9e97bd26f014', 'rika agustina', 'sukarame', 'agustinarika@gmail.com', '+6282185452189', 'Y', ''),
(52, 'a211e1c515ecd464f816b70601108b4c', 'sujarwo', 'sukarame', 'sujarwo09@gmail.com', '+6281379372314', 'Y', ''),
(53, '00dfc53ee86af02e742515cdcf075ed3', 'budiono', 'sukaraja', 'budiono16@gmail.com', '+6281379656200', 'Y', ''),
(54, '6efc67e68005e7503df580d11e5e7a23', 'nopal gilang', 'sukaraja', 'gilangnopal@gmail.com', '+62895620413751', 'Y', ''),
(55, '091443dd922ce3d4eac16a291d787fb0', 'mirnawati', 'lampung selatan', 'mirnawati@gmail.com', '+6282282717041', 'Y', ''),
(56, '9f2ce71b362a7c4c5fb11b2b3b56e8d7', 'nabilla melisa putri', 'sukarame', 'nabilla2105@gmail.com', '+6281282451767', 'Y', ''),
(57, 'cf5bdfb40421ac1f30cc4d45b66b5a81', 'mira jaya', 'kupang teba', 'mirajaya@gmail.com', '+6289628772619', 'Y', ''),
(58, 'd78b154c99fe7f06ebc02ebd63d1c87c', 'roni apriano', 'untung suropati', 'aprianoroni@gmail.com', '+6282373620874', 'Y', ''),
(59, '8d045450ae16dc81213a75b725ee2760', 'aji saputra', 'hanura', 'saputraaji@gmail.com', '+6289651363239', 'Y', ''),
(60, 'ebbc3c26a34b609dc46f5c3378f96e08', 'almaida mahriva', 'bakung', 'almaidamahriva@gmail.com', '+6285809488978', 'Y', ''),
(61, 'ce0e5bf55e4f71749eade7a8b95c4e46', 'andi saputra', 'teluk betung selatan', 'andisaputra@gmail.com', '+628975453534', 'Y', ''),
(62, '7e51eea5fa101ed4dade9ad3a7a072bb', 'andhika setiawan', 'sukaraja', 'andhikasetiawan@gmail.com', '+6289631211750', 'Y', ''),
(63, '4a283e1f5eb8628c8631718fe87f5917', 'anggi saputra', 'ranaau', 'anggisaputra@gmail.com', '+6282281700216', 'Y', ''),
(64, '22c037a5577d20d5250ff67dfec1d502', 'anggun suciati', 'way kanan', 'suciatianggun@gmail.com', '+6285832802755', 'Y', ''),
(65, 'c46335eb267e2e1cde5b017acb4cd799', 'adi sucipto', 'kedaton', 'adisucipto@gmail.com', '+6281271118883', 'Y', ''),
(66, '0a57258559de00695ffb0f1d46bba388', 'eliyana', 'panjang, bandar lampung', 'eliyana@gmail.com', '+6285369555897', 'Y', ''),
(67, '43317d3fd0d3344a7152250b9fd0dc2f', 'ajeng maryana', 'pengajaran', 'maryanaajeng@gmail.com', '+6282176896971', 'Y', ''),
(68, '0bfdcd8914a53e117fda8d10954810e8', 'nurhayanti', 'talang', 'nurhayanti@gmail.com', '+628975452003', 'Y', ''),
(69, '08ca451b5ef1a7c86763d31e7711a522', 'sinta erna sari', 'karang pucung', 'ernasinta@gmail.com', '+6282177378526', 'Y', ''),
(89, '1855c11f044cc8944e8cdac9cae5def8', 'nurmuhayat', 'panjang, bandar lampung', 'nurmuhayat@gmail.com', '+6281360603165', 'Y', 'toko dayat'),
(72, '7904a54f7baa776b3c5538bd3de3d447', 'deri awan', 'lampung selatan', 'deriawan@gmail.com', '+6289684883594', 'Y', ''),
(73, 'e274648aed611371cf5c30a30bbe1d65', 'dina andini', 'menggala', 'andinidina@gmail.com', '+6289608990324', 'Y', ''),
(74, '2bb55d712c4dcbda95497e811b696352', 'gio alfarizi', 'punduh pidada', 'gioindri@gmail.com', '+6282280583942', 'Y', ''),
(75, '56af1302e6e440e4dbcfa3cf0af4887f', 'adiska aprilia', 'padang cermin', 'nengdiska@gmail.com', '+6282178277874', 'Y', ''),
(76, '3351374649a3645cf743feafeb13c2df', 'luki ardi julian', 'sukabumi', 'lukiardi@gmail.com', '+62895328432828', 'Y', ''),
(77, '76af47488ac4ecce7c29005f15cf7d0e', 'irmayani@gmail.com', 'umbul kluwih', 'irmayani@gmail.com', '+6287737772354', 'Y', ''),
(78, 'c5542ae432b3656e207b1380614266b5', 'suginah', 'hanura', 'suginah@gmail.com', '+6282306074165', 'Y', ''),
(79, 'e6b047aa9378bce37a5260a949d1ea3e', 'dita anggita', 'lempasing', 'dittaanggita@gmail.com', '+6289615233244', 'Y', ''),
(80, 'e210b2d4726eb89e951f1952be84c02f', 'oki purnomo', 'tanggamus', 'okipurnomo@gmail.com', '+628994304246', 'Y', ''),
(81, '42867493d4d4874f331d288df0044baa', 'sarjono', 'talang padang', 'sarjono@gmail.com', '+6282113129589', 'Y', ''),
(82, '23111cf70745859063eec8a99d6206d9', 'ulfa mustika', 'kedaton', 'ulfamustika@gmail.com', '+6282179402425', 'Y', 'Toko Aska'),
(83, 'a8e5bcafa1b85e06ed3fdf1ab65e1bb7', 'dejen ermawan', 'sukamaju indah', 'dejenermawan@gmail.com', '+6282289111179', 'Y', ''),
(84, 'f97de4a9986d216a6e0fea62b0450da9', 'dian irawan', 'tanjung bintang', 'dianirawan@gmail.com', '+6289629196761', 'Y', ''),
(85, '671b73f699c20aed9a5d7130f0040b4a', 'sayu niasih', 'kedaton', 'sayunia@gmail.com', '+6285766748010', 'Y', ''),
(86, '1755e8df56655122206c7c1d16b1c7e3', 'rudi haryono', 'jalan pulau bawean 2', 'rudihartono@gmail.com', '+6281360603165', 'Y', ''),
(87, '6f3792a964f0e3a5f06a35dfe609716c', 'wayan ahmad denny', 'teluk betung selatan', 'dennyway88@gmail.com', '+6282167610707', 'Y', ''),
(88, 'b626b66df044ee336f452bd5d88debb5', 'tya ayu pertiwi', 'bandar jaya', 'tyaayupertiwi@gmail.com', '+6285956317394', 'Y', '');

-- --------------------------------------------------------

--
-- Table structure for table `mainmenu`
--

CREATE TABLE IF NOT EXISTS `mainmenu` (
`id_main` int(5) NOT NULL,
  `nama_menu` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `link` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mainmenu`
--

INSERT INTO `mainmenu` (`id_main`, `nama_menu`, `link`, `aktif`) VALUES
(10, 'BERANDA', 'index.php', 'Y'),
(11, 'PROFIL PERUSAHAAN', 'profil-kami.html', 'Y'),
(13, 'KERANJANG BELANJA', 'keranjang-belanja.html', 'N'),
(14, 'CARA PEMBELIAN', 'cara-pembelian.html', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE IF NOT EXISTS `modul` (
`id_modul` int(5) NOT NULL,
  `nama_modul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `static_content` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `status` enum('user','admin') COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  `urutan` int(5) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `link`, `static_content`, `gambar`, `status`, `aktif`, `urutan`) VALUES
(18, 'Tambah Produk', '?module=produk', '', '', 'admin', 'Y', 5),
(42, 'Lihat Order Masuk', '?module=order', '', '', 'admin', 'Y', 8),
(10, 'Manajemen Modul', '?module=modul', '', '', 'admin', 'Y', 19),
(31, 'Tambah Kategori Produk', '?module=kategori', '', '', 'admin', 'Y', 4),
(43, 'Edit Profil', '?module=profil', 'Selamat datang di website online CV. LAUT SELATAN JAYA, kami hadir di Kota Bandar Lampung untuk memberikan solusi guna menunjang kebutuhan masyarakat lampung khususnya dan masyarakat Indonesia pada umum-nya.\r\n<br/>\r\nBeralamat di Jl.Laks.Malahayati No.58, Pesawahan, Teluk Betung Selatan. Kota Bandar Lampung.', '12sfhijau.jpg', 'admin', 'Y', 7),
(44, 'Lihat Pesan Masuk', '?module=hubungi', '', '', 'admin', 'Y', 9),
(45, ' Edit Cara Pembelian', '?module=carabeli', 'Panduan cara pembelian online CV. LAUT SELATAN JAYA : <br/><br/><br/>\r\n1.Lakukan pendaftaran jika anda belum menjadi member <br/>\r\n2.Login lah sesuai dengan email dan password yang anda gunakan saat mendaftar <br/>\r\n3.Klik tombol BELI pada produk yang anda kehendaki untuk di beli secara online <br/>\r\n4.Klik tombol Selesai Belanja jika anda sudah menyelesaikan pemilihan produk yang mau di beli <br/>\r\n5.Pilih jasa pengiriman yang tersedia, dan sesuaikan dengan data kota tujuan yang anda kehendaki untuk dikirim produk-nya. <br/>\r\n6.Lakukan konfirmasi pembayaran jika anda sudah mentransfer pembayaran <br/>\r\n7.Status order anda akan berubah menjadi LUNAS jika pembayaran sudah kami terima dan barang akan langsung kami kirim ke alamat anda.<br/>\r\n\r\n\r\n\r\n\r\n\r\n', 'gedung.jpg', 'admin', 'Y', 10),
(47, 'Edit Link Terkait', '?module=banner', '', '', 'user', 'Y', 13),
(48, 'Edit Ongkos Kirim', '?module=ongkoskirim', '', '', 'user', 'Y', 11),
(49, 'Ganti Password', '?module=password', '', '', 'user', 'Y', 1),
(53, 'User Yahoo Messenger', '?module=ym', '', '', 'user', 'Y', 15),
(52, 'Lihat Laporan Transaksi', '?module=laporan', '', '', 'user', 'Y', 14),
(56, 'Edit Jasa Pengiriman', '?module=jasapengiriman', 'Selamat Datang di website resmi PT.Argo. Selamat berbelanja online...', 'hai.jpg', 'user', 'Y', 12),
(57, 'Edit Rekening Bank', '?module=bank', '', '', 'user', 'Y', 16),
(58, 'Edit Selamat Datang', '?module=welcome', 'PT.Argo\r\n', 'gedung.jpg', 'user', 'Y', 6),
(59, 'Ganti Header', '?module=header', '', '', 'user', 'Y', 18),
(61, 'Edit Menu Utama', '?module=menuutama', '', '', 'user', 'Y', 2),
(62, 'Edit Sub Menu', '?module=submenu', '', '', 'user', 'Y', 3),
(63, 'Edit Download Katalog', '?module=download', '', '', 'user', 'Y', 17);

-- --------------------------------------------------------

--
-- Table structure for table `mod_bank`
--

CREATE TABLE IF NOT EXISTS `mod_bank` (
`id_bank` int(5) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `no_rekening` varchar(100) NOT NULL,
  `pemilik` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mod_bank`
--

INSERT INTO `mod_bank` (`id_bank`, `nama_bank`, `no_rekening`, `pemilik`, `gambar`) VALUES
(1, 'Mandiri', '114.000.456.992.0', 'CV.LAUT SELATAN JAYA', 'mandiri.gif'),
(2, 'BNI', '931.2626.1983', 'CV.Laut Selatan Jaya', 'bni.gif'),
(3, 'BCA', '321998069', 'CV.Laut Selatan Jaya', 'bca.png'),
(4, 'BRI', '112.334.556.7', 'CV.Laut Selatan Jaya', 'bri.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id_orders` int(5) NOT NULL,
  `nama_kustomer` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `alamat` text COLLATE latin1_general_ci NOT NULL,
  `telpon` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `status_order` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT 'Order',
  `tgl_order` date NOT NULL,
  `jam_order` time NOT NULL,
  `id_kota` int(3) NOT NULL,
  `total_order` int(15) NOT NULL,
  `bayar` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_toko` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_orders`, `nama_kustomer`, `alamat`, `telpon`, `email`, `status_order`, `tgl_order`, `jam_order`, `id_kota`, `total_order`, `bayar`, `nama_toko`) VALUES
(29, 'ulfa mustika', 'kedaton', '+6282179402425', 'ulfamustika@gmail.com', 'Order', '2019-05-02', '14:51:52', 13, 110000, '', ''),
(28, 'ulfa mustika', 'kedaton', '+6282179402425', 'ulfamustika@gmail.com', 'Order', '2019-05-02', '14:42:53', 13, 520000, '', ''),
(32, 'ulfa mustika', 'kedaton', '+6282179402425', 'ulfamustika@gmail.com', 'Order', '2019-02-11', '15:10:00', 13, 230000, '', ''),
(33, 'yassir', 'kedaton', '+6282282999777', 'yassir@gmail.com', 'Order', '2019-02-11', '15:13:54', 13, 300000, '', ''),
(26, 'ulfa mustika', 'kedaton', '+6282179402425', 'ulfamustika@gmail.com', 'Order', '2019-05-02', '10:36:09', 13, 1545000, '', ''),
(24, 'yassir', 'kedaton', '+6282282999777', 'yassir@gmail.com', 'Order', '2019-05-01', '22:16:04', 13, 30900, '', ''),
(25, 'yassir', 'kedaton', '+6282282999777', 'yassir@gmail.com', 'Order', '2019-05-01', '22:26:44', 13, 63900, '', ''),
(23, 'yassir', 'kedaton', '+6282282999777', 'yassir@gmail.com', 'Order', '2019-05-01', '22:00:11', 13, 680000, '', ''),
(22, 'dejen ermawan', 'sukamaju indah', '+6282289111179', 'dejenermawan@gmail.com', 'Order', '2019-08-14', '11:10:30', 13, 1110000, '', ''),
(21, 'adelina dhamayanti', 'sukaraja', '+6281360603165', 'adelinadhamayanti@gmail.com', 'Lunas', '2019-08-14', '10:03:40', 13, 1725000, '', ''),
(20, 'Lita Amalia', 'Tanjung Senang', '+6282282999777', 'lita@gmail.com', 'Order', '2019-08-13', '11:32:59', 13, 182000, '', ''),
(30, 'sayu niasih', 'kedaton', '+6285766748010', 'sayunia@gmail.com', 'Order', '2019-05-02', '14:58:35', 13, 165000, '', ''),
(31, 'sayu niasih', 'kedaton', '+6285766748010', 'sayunia@gmail.com', 'Order', '2019-01-10', '15:05:53', 13, 150000, '', ''),
(34, 'yassir', 'kedaton', '+6282282999777', 'yassir@gmail.com', 'Lunas', '2019-02-11', '15:42:29', 13, 60000, '', ''),
(35, 'ulfa mustika', 'kedaton', '+6282179402425', 'ulfamustika@gmail.com', 'Lunas', '2019-02-11', '15:43:45', 13, 33000, '', ''),
(36, 'ulfa mustika', 'kedaton', '+6282179402425', 'ulfamustika@gmail.com', 'Lunas', '2019-02-11', '15:49:37', 13, 181000, '', ''),
(37, 'ulfa mustika', 'kedaton', '+6282179402425', 'ulfamustika@gmail.com', 'Lunas', '2019-02-11', '15:54:43', 13, 180000, '', ''),
(38, 'adi sucipto', 'kedaton', '+6281271118883', 'adisucipto@gmail.com', 'Lunas', '2019-02-11', '17:34:19', 13, 1600000, '', ''),
(39, 'yassir', 'kedaton', '+6282282999777', 'yassir@gmail.com', 'Lunas', '2019-05-03', '01:56:57', 13, 45000, '', ''),
(40, 'dian irawan', 'tanjung bintang', '+6289629196761', 'dianirawan@gmail.com', 'Lunas', '2019-05-03', '22:19:11', 13, 1800000, '', ''),
(41, 'dian irawan', 'tanjung bintang', '+6289629196761', 'dianirawan@gmail.com', 'Lunas', '2019-05-06', '15:38:40', 13, 375000, '', ''),
(42, 'ulfa mustika', 'kedaton', '+6282179402425', 'ulfamustika@gmail.com', 'Lunas', '2019-05-06', '15:39:46', 13, 1900000, '', ''),
(43, 'adityo', 'sukaraja', '+6285268256313', 'adityo@gmail.com', 'Lunas', '2019-05-09', '20:31:39', 13, 3984500, '', ''),
(44, 'dian irawan', 'tanjung bintang', '+6289629196761', 'dianirawan@gmail.com', 'Order', '2019-05-09', '20:34:09', 13, 2157180, '', ''),
(45, 'ulfa mustika', 'kedaton', '+6282179402425', 'ulfamustika@gmail.com', 'Order', '2019-05-09', '20:38:38', 13, 2982000, '', ''),
(46, 'dian irawan', 'tanjung bintang', '+6289629196761', 'dianirawan@gmail.com', 'Order', '2019-05-10', '09:58:02', 13, 2125000, '', ''),
(47, 'ulfa mustika', 'kedaton', '+6282179402425', 'ulfamustika@gmail.com', 'Order', '2019-05-10', '18:10:13', 13, 725000, '', ''),
(48, 'adi sucipto', 'kedaton', '+6281271118883', 'adisucipto@gmail.com', 'Order', '2019-05-10', '18:24:14', 13, 299000, '', ''),
(49, 'ulfa mustika', 'kedaton', '+6282179402425', 'ulfamustika@gmail.com', 'Order', '2019-08-26', '18:28:17', 13, 1100000, '', ''),
(50, 'wayan ahmad denny', 'teluk betung selatan', '+6282167610707', 'dennyway88@gmail.com', 'Order', '2019-08-26', '18:30:02', 13, 120000, '', ''),
(51, 'tya ayu pertiwi', 'bandar jaya', '+6285956317394', 'tyaayupertiwi@gmail.com', 'Order', '2019-08-26', '18:41:19', 13, 2975000, '', ''),
(52, 'tya ayu pertiwi', 'bandar jaya', '+6285956317394', 'tyaayupertiwi@gmail.com', 'Order', '2019-08-26', '18:58:39', 13, 2750000, '', ''),
(53, 'ulfa mustika', 'kedaton', '+6282179402425', 'ulfamustika@gmail.com', 'Order', '2019-08-30', '14:41:25', 13, 42000, 'CREDIT', 'Toko Aska'),
(54, 'ulfa mustika', 'kedaton', '+6282179402425', 'ulfamustika@gmail.com', 'Order', '2019-08-30', '15:19:33', 13, 45000, 'CASH', ''),
(55, 'ulfa mustika', 'kedaton', '+6282179402425', 'ulfamustika@gmail.com', 'Order', '2019-08-30', '15:22:32', 13, 79200, 'CREDIT', ''),
(56, 'ulfa mustika', 'kedaton', '+6282179402425', 'ulfamustika@gmail.com', 'Order', '2019-08-30', '15:23:28', 13, 54000, 'CREDIT', ''),
(57, 'ulfa mustika', 'kedaton', '+6282179402425', 'ulfamustika@gmail.com', 'Lunas', '2019-08-30', '19:58:00', 13, 450000, 'CASH', ''),
(58, 'nurmuhayat', 'kota bumi', '+6281532320215', 'nurmuhayat@gmail.com', 'Order', '2019-08-30', '21:16:32', 13, 280000, 'CASH', ''),
(59, 'wahyu irawan', 'sukaraja', '+6281377779544', 'irawanwahyu@gmail.com', 'Order', '2019-08-30', '21:33:25', 13, 186000, 'CREDIT', ''),
(60, 'ulfa mustika', 'kedaton', '+6282179402425', 'ulfamustika@gmail.com', 'Order', '2019-08-31', '17:41:03', 13, 230000, 'CASH', 'Toko Aska');

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE IF NOT EXISTS `orders_detail` (
  `id_orders` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`id_orders`, `id_produk`, `jumlah`) VALUES
(49, 205, 20),
(48, 206, 12),
(48, 172, 10),
(47, 205, 5),
(47, 203, 10),
(46, 198, 35),
(46, 205, 10),
(45, 186, 25),
(45, 185, 30),
(45, 183, 15),
(45, 180, 25),
(45, 179, 5),
(45, 178, 8),
(45, 172, 22),
(45, 171, 17),
(44, 199, 20),
(44, 198, 10),
(44, 197, 15),
(44, 195, 20),
(43, 200, 10),
(43, 201, 10),
(43, 202, 12),
(43, 203, 10),
(43, 204, 17),
(43, 207, 15),
(43, 205, 10),
(43, 206, 20),
(42, 171, 50),
(41, 182, 2),
(41, 181, 10),
(40, 179, 100),
(39, 184, 1),
(39, 183, 1),
(38, 186, 100),
(37, 179, 10),
(36, 186, 1),
(36, 182, 5),
(35, 182, 1),
(34, 171, 1),
(34, 184, 1),
(33, 178, 20),
(32, 183, 10),
(31, 178, 10),
(30, 187, 5),
(29, 189, 2),
(28, 126, 10),
(27, 186, 10),
(26, 181, 50),
(25, 187, 1),
(25, 181, 1),
(24, 181, 1),
(23, 187, 10),
(23, 177, 10),
(22, 185, 30),
(22, 171, 15),
(21, 185, 50),
(21, 182, 25),
(20, 186, 5),
(20, 185, 2),
(20, 184, 3),
(50, 206, 10),
(51, 202, 5),
(51, 205, 50),
(52, 205, 50),
(53, 206, 1),
(53, 208, 1),
(54, 206, 1),
(54, 204, 1),
(55, 204, 2),
(56, 203, 1),
(57, 202, 10),
(58, 197, 10),
(58, 206, 5),
(59, 172, 10),
(60, 208, 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders_temp`
--

CREATE TABLE IF NOT EXISTS `orders_temp` (
`id_orders_temp` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jumlah` int(5) NOT NULL,
  `tgl_order_temp` date NOT NULL,
  `jam_order_temp` time NOT NULL,
  `stok_temp` int(5) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=151 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `orders_temp`
--

INSERT INTO `orders_temp` (`id_orders_temp`, `id_produk`, `id_session`, `jumlah`, `tgl_order_temp`, `jam_order_temp`, `stok_temp`) VALUES
(144, 200, 'f8148fe2fe0c4c4017940ecb4506f063', 1, '2019-08-30', '20:29:44', 435),
(143, 205, 'f8148fe2fe0c4c4017940ecb4506f063', 1, '2019-08-30', '20:29:27', 746);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
`id_produk` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `produk_seo` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(20) NOT NULL,
  `stok` int(5) NOT NULL,
  `berat` decimal(5,2) unsigned NOT NULL DEFAULT '0.00',
  `tgl_masuk` date NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `dibeli` int(5) NOT NULL DEFAULT '1',
  `diskon` int(5) NOT NULL DEFAULT '0',
  `kode_produk` varchar(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=209 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `produk_seo`, `deskripsi`, `harga`, `stok`, `berat`, `tgl_masuk`, `gambar`, `dibeli`, `diskon`, `kode_produk`) VALUES
(187, 30, 'Pixy stick foundation natural beige 9g', 'pixy-stick-foundation-natural-beige-9g', '', 33000, 750, '0.00', '2019-08-13', '39fdc.jpg', 1, 0, '2013411'),
(191, 37, 'Pixy  Volumizing waterproof mascara', 'pixy--volumizing-waterproof-mascara', 'Pixy  Volumizing waterproof mascara membuat bulu mata tamak lebih banyak dan lebih tebal disetiap helainya. Formulanya yang tahan air membuat warna hitam melekat lebih tahan lama dan tdak mudah luntur. ', 37000, 475, '0.00', '2019-05-06', '7maskara1.jpg', 1, 0, '34516278'),
(189, 25, 'lipstik', 'lipstik', '', 55000, 500, '0.00', '2019-05-02', '682.jpg', 1, 0, '200916234'),
(160, 24, 'Pixy loose powder ivory 12g', 'pixy-loose-powder-ivory-12g', 'Pixy loose powder merupakan bedak tabur yang menyerap kelebihan minyak pada wajah. Menghasilkan makeup yang halus, alami, dan berkilau.', 21000, 800, '0.00', '2019-05-03', '464.jpg', 1, 0, '2016312'),
(161, 24, 'Pixy loose powder natural beige 12g', 'pixy-loose-powder-natural-beige-12g', 'Pixy loose powder merupakan bedak tabur yang menyerap kelebihan minyak pada wajah. Menghasilkan makeup yang halus, alami, dan berkilau.', 21000, 750, '0.00', '2019-05-03', '3462.jpg', 1, 0, '2016462'),
(162, 24, 'Pixy loose powder yellow beige 12g', 'pixy-loose-powder-yellow-beige-12g', 'Pixy loose powder merupakan bedak tabur yang menyerap kelebihan minyak pada wajah. Menghasilkan makeup yang halus, alami, dan berkilau.', 21000, 675, '0.00', '2019-05-03', '7864.jpg', 1, 0, '2016412'),
(168, 32, 'pixy line and shadow green 1,2g', 'pixy-line-and-shadow-green-12g', 'Pensil multi fungsi yang dapat digunakan sebagai eyesshadow,ayelinear, dan dasar, eyesshadow.Mudah dioleskan dan dipadukan serta warna terlihat sangat jelas.', 32000, 540, '0.00', '2019-05-03', '94shadow1.jpg', 11, 0, '4127401'),
(169, 32, 'pixy line and shadow white1,2g', 'pixy-line-and-shadow-white12g', 'Pensil multi fungsi yang dapat digunakan sebagai eyesshadow,ayelinear, dan dasar, eyesshadow.Mudah dioleskan dan dipadukan serta warna terlihat sangat jela', 32000, 850, '0.00', '2019-05-03', '94shadow1.jpg', 16, 0, '4127601'),
(170, 32, 'pixy line and shadow blue 1,2g', 'pixy-line-and-shadow-blue-12g', 'Pensil multi fungsi yang dapat digunakan sebagai eyesshadow,ayelinear, dan dasar, eyesshadow.Mudah dioleskan dan dipadukan serta warna terlihat sangat jelas.', 32000, 756, '0.00', '2019-05-03', '89shadow2.jpg', 26, 0, '4127701'),
(190, 31, 'Pixy blush on cornation bloom  (06) 3,5g', 'pixy-blush-on-cornation-bloom--06-35g', '', 35000, 750, '0.00', '2019-05-06', '69blushon.jpg', 1, 0, '4123602'),
(192, 24, 'Pixy Dewy cushion ', 'pixy-dewy-cushion-', 'Pixy Dewy cushion  merupakan base make-up yang memiliki formula cair dan dipadukan dengan sponge khusus untuk menciptakan make-up yang memiliki daya tutup optimal dan membuat wajah tampak lebih cerah. ', 120000, 775, '0.00', '2019-05-06', '91bbc1.jpg', 1, 0, '20009182'),
(193, 24, 'Pixy make it glow silky powser cake TWC', 'pixy-make-it-glow-silky-powser-cake-twc', 'Pixy make it glow silky powser cake TWC adalah bedak padat dengan formula two way cake yang teksturnya ringan dan halus dapat membuat kulit wajah tampak natural dengan hasil yang tampak halus bercahaya dan tahan lama. diperkaya dengan ekstrak botani yang mampu melembabkan kulit dan smooth polished powder yang mampu menempel pada kulit dengan baik. ', 70000, 900, '0.00', '2019-05-06', '50bbg2.jpg', 1, 0, '20981726'),
(194, 27, 'Pixy Facial Scrub Dull Off Polish 100g', 'pixy-facial-scrub-dull-off-polish-100g', 'Gunakan Pixy Facial Scrub Dull Off Polish untuk mengatasi kulit kusam dengan cara mengurangi kelebihan minyak, semngangkat sel kulit mati, dan membuat wajah tampak lebih cerah. ', 22000, 890, '0.00', '2019-05-06', '30ffb2.jpg', 1, 0, '20086132'),
(195, 27, 'Pixy Facial Foam Brightening', 'pixy-facial-foam-brightening', 'Pixy Facial Foam Brightening merupakan sabun wajah yang mengandung AHA & HS protein untuk mengangkat kotoran, debu, serta minyak berlebih pada kulit tanpa membuatnya terasa kering. Kulit terasa lebih lembut juga segar. Formula 2 way bright dari panduan natural whitening powder dan derivant vitamin c membuat kulit tampak lebih cerah. diperkaya dengan ekstrak lidah buaya. ', 23000, 375, '0.00', '2019-05-06', '26brightening.jpg', 1, 0, '20065431'),
(198, 25, 'Pixy lip cream matte', 'pixy-lip-cream-matte', 'Pixy lip cream matte, 100% original.. terdedia 6 pilihan warna yaitu : 01 chis rose, 02 party red, 03 classic red, 04 fun fuschia, 05 edgy plum, 06 bold maroon', 45000, 800, '0.00', '2019-05-06', '63lipps.jpg', 1, 0, '200987611'),
(197, 27, 'Pixy Facial Foarm Anti acne', 'pixy-facial-foarm-anti-acne', 'Sabun wajah dengan tiga keistimewaan, melindungi kulit dari bakteri penyebab jerawat, membuat warna kulit nampak lebih cerah dan menyejukkan kulit wajah berjerawat. ', 22000, 750, '0.00', '2019-05-06', '78antiacne.jpg', 1, 0, '20981324'),
(199, 25, 'Silky fit lipstick semi matte', 'silky-fit-lipstick-semi-matte', 'Silky fit lipstick semi matte tersedia dengan banyak varian warna..', 45859, 760, '0.00', '2019-05-06', '15matte.jpg', 1, 0, '20198763'),
(200, 38, 'Pixy ayebrow crayon', 'pixy-ayebrow-crayon', 'Eye brow dengan tekstur creamy yang tidak menggumpal, mudah menyatu dengan rambut alis. formulanya yang lembut dan mudah dioleskan serta menghasilkan warna yang tegas dan jelas brush cap membantu meratakan sehingga menghasilkan tampilan yang lebih sempurna. ', 35000, 435, '0.00', '2019-05-06', '58pa1.jpg', 11, 0, '20016543'),
(201, 38, 'Pixy eye brow', 'pixy-eye-brow', 'Eye brow dengan tekstur creamy yang tidak menggumpal, mudah menyatu dengan rambut alis. formulanya yang lembut dan mudah dioleskan serta menghasilkan warna yang tegas dan jelas brush cap membantu meratakan sehingga menghasilkan tampilan yang lebih sempurna. ', 27500, 540, '0.00', '2019-05-06', '51pa2.jpg', 11, 0, '29018265'),
(202, 25, 'pixy mate in love', 'pixy-mate-in-love', 'pixy mate in love merupakan lipstik yang sangat matte dan ringan pada saat digunakan. menghasilkan warna yang sangat maksimal. ', 45000, 738, '0.00', '2019-05-06', '71PIXY_Matte_In_Love_L_1.jpg', 13, 0, '20981524'),
(203, 0, 'Pixt lash fantasy maskara ', 'pixt-lash-fantasy-maskara-', '- Pixy lash  fantasy maskara  12 ml\r\n - Elastic fiber dalam base coat memisahkan tiap helai bulu mata dan membuatnya tampak lebih tebal dan panjang. \r\n - warna hitam yang pekat dari top coat memberi hasil akhir yang fantastis.', 45000, 590, '0.00', '2019-05-06', '40maskara2.jpg', 11, 0, '20987611'),
(204, 37, 'Pixy waterproof mascara', 'pixy-waterproof-mascara', ' - Elastic fiber dalam base coat memisahkan tiap helai bulu mata dan membuatnya tampak lebih tebal dan panjang. \r\n - warna hitam yang pekat dari top coat memberi hasil akhir yang fantastis.', 33000, 538, '0.00', '2019-05-06', '61maskara3.jpg', 18, 0, '20019876'),
(205, 30, 'Pixy make it glow base make-up', 'pixy-make-it-glow-base-makeup', 'Mengandung mosturaizing botanical extract yang dapat memberikan hasil kulit tampak sehat dan natural. light reflection technology dapat menyamarkan ketidaksempurnaan pada kulit seperti pori pori yang membesar flek hitam dan warna kulit yang tidak rata. ', 55000, 746, '0.00', '2019-05-06', '62mig1.jpg', 11, 0, '22678902'),
(206, 39, 'Pixy white aqua serum set mask ', 'pixy-white-aqua-serum-set-mask-', 'Pixy white aqua serum set mask  merupakan serum dalam bentuk masker dengan paduan vitamin c, sodlum hyaluronate, dan mosturaizing agent untuk membantu merawat kulit agar tetap sehat, tampak cerah, dan terasa lembut. tersedia dua varian, yaitu : pure bright ( nasker charcoal ) dan revitalize ( masker bamboo ) ', 12000, 637, '0.00', '2019-05-06', '90masker.jpg', 21, 0, '2230983'),
(207, 39, 'Pixy white aqua concentrated brightening serum', 'pixy-white-aqua-concentrated-brightening-serum', 'Pixy white aqua concentrated brightening serum memiliki kandungan utama skin bright vitamin B3  dan ekstrak mulberry yang diketahui dapat membantu menghambat proses pembentukan melanin sehingga membantu kulittampak lebih cerah dan tetap sehat pada pagi hari.  ', 67900, 760, '0.00', '2019-05-06', '52serum.jpg', 16, 0, '2002033'),
(208, 40, 'pixy makeup remover', 'pixy-makeup-remover', 'Pixy makeup remover dapat gigunakan untuk membersihkan sisa makeup', 23000, 1000, '0.00', '2019-05-10', '7613.jpg', 1, 0, '22015678'),
(185, 28, 'Pixy Cleansing Express anti acne 100ml', 'pixy-cleansing-express-anti-acne-100ml', 'Keunggulan Pixy Cleansing Express anti acne dilengkapi dengan 2 way bright & natural whitening powder. Soya bean letichin dan derivant vitamin c yang mampu membuat wajah bersih dan semakin cerah. ditambah pula kandungan aha didalamnya yang mampu mengangkat sel kulit mati', 18000, 920, '0.00', '2019-01-03', '81images (24).jpg', 101, 0, '2001472'),
(184, 27, 'Pixy white aqua gel facial foam', 'pixy-white-aqua-gel-facial-foam', 'Sabun pembersih wajah berbahan dasar air yang segar, ringan, serta membuat kulit terasa halus dan lembut. mengurangi tanda-tanda kulit lelah seperti kusam, kering, dan berminyak', 22000, 508, '0.00', '2019-01-03', '45images (18).jpg', 3, 0, '20916254'),
(183, 28, 'Pixy beauty water', 'pixy-beauty-water', 'Face mist ini digunakan setelah selesai bermakeup dengan menyemprotkan secara merata ke seluruh wajah dari jarak 10-15cm. jangan lupa untuk menutup mata saat penggunaan, agar face mist tidak masuk ke mata', 23000, 499, '0.00', '2019-01-03', '7314.jpg', 152, 0, '209817253'),
(123, 29, 'Pixy day mosturaizing cream whitening 50g', 'pixy-day-mosturaizing-cream-whitening-50g', 'Pixy day mosturaizing cream whitening merupakan pelembab wajah yang tidak mengkilap dan tidak lengket. Menganndung paduan antara Naatural whitening powder dan derivat vitamin c utuk kulit tampak lebih cerah.', 22000, 457, '0.00', '2019-05-03', '1516.jpg', 1, 0, '20089716'),
(124, 29, 'Pixy white aqua gel cream night cream 50ml', 'pixy-white-aqua-gel-cream-night-cream-50ml', 'Pixy white aqua gel cream night cream merupakan krim malam dengan hydra active yang mampu melembabkan dan menyegarkan kulit, sehingga kulit nampak lebih cerah dan segar kembali. diperkaya dengan natural whitening complex untuk membantu mencerahkan kulit dan menyamarkan noda serta vitamin E dan Ginkgo Biloba yang dikenal sebagai antioksidan.', 47000, 375, '0.00', '2019-05-03', '4617.jpg', 1, 0, '200785'),
(125, 29, 'Pixy white aqua gel cream night cream 18ml', 'pixy-white-aqua-gel-cream-night-cream-18ml', 'Pixy white aqua gel cream night cream merupakan krim malam dengan hydra active yang mampu melembabkan dan menyegarkan kulit, sehingga kulit nampak lebih cerah dan segar kembali. diperkaya dengan natural whitening complex untuk membantu mencerahkan kulit dan menyamarkan noda serta vitamin E dan Ginkgo Biloba yang dikenal sebagai antioksidan.', 25000, 550, '0.00', '2019-05-03', '3417.jpg', 1, 0, '200782'),
(126, 29, 'Pixy white aqua gel cream day cream 50ml', 'pixy-white-aqua-gel-cream-day-cream-50ml', 'Pixy white aqua gel day cream hydra active day cream SPF 30 & PA++ saat beraktifitas di siang hari kulit harus dilindungi dari sinar matahari dan dijaga kelembapannya sehingga kulit tetap sehat dan segar. \r\nPixy white aqua gel day cream mengandung hydra active melembabkan dan menyegarkan kulit sehingga kulit tampak sehat dan segar kembali .', 52000, 500, '0.00', '2019-05-03', '69daycream.jpg', 1, 0, '200795'),
(127, 29, 'Pixy white aqua gel cream day cream 18ml', 'pixy-white-aqua-gel-cream-day-cream-18ml', 'Pixy white aqua gel day cream hydra active day cream SPF 30 & PA++ saat beraktifitas di siang hari kulit harus dilindungi dari sinar matahari dan dijaga kelembapannya sehingga kulit tetap sehat dan segar. \r\nPixy white aqua gel day cream mengandung hydra active melembabkan dan menyegarkan kulit sehingga kulit tampak sehat dan segar kembali .', 24000, 735, '0.00', '2019-05-03', '38daycream.jpg', 1, 0, '200792'),
(186, 28, 'Pixy milk cleanser brightening 100ml', 'pixy-milk-cleanser-brightening-100ml', 'susu pembersih wajah yang mengandung aha dan ekstrak lidah buaya. mampu mengangkat kotoran, debu, serta makeup. membuat kulit bersih dan terasa lebih lembut. formula 2-way bright dari panduan natural whitening powder dan derivat vitamin c membuat kulit nampak lebih cerah', 16000, 409, '0.00', '2019-01-03', '19brightening.jpg', 172, 0, '2001222'),
(130, 24, 'Pixy two way cake perfect fit ivory 12,2g', 'pixy-two-way-cake-perfect-fit-ivory-122g', 'Pixy two way cake perfect fit (refill) merupakan bedak dengan formula yang menyatu sempurna untuk hasil tata rias halus dan tahan lama. mengandung 2 way whitening, squalane oil untuk mencegah kulit kering dan SPF 15.', 37000, 450, '0.00', '2019-05-03', '5bedak1.jpg', 1, 0, '2020141'),
(178, 33, 'Pucelle mist cologne japanese seasons', 'pucelle-mist-cologne-japanese-seasons', 'cologne dalam bentuk spray dengan keharuman unik, lembut, dan tahan lama dari bunga-bunga tiap musim di jepang untuk mengekspresikan suasana 4 musim di jepang', 15000, 775, '0.00', '2019-01-03', '11cologne.jpg', 71, 0, '30981325'),
(179, 33, 'Pucelle mist cologne pink me sweet angel', 'pucelle-mist-cologne-pink-me-sweet-angel', 'Pucelle mist cologne merupakan aroma yang menakjubkan. ini akan memperkuat anda dan energi anda hanya satu sepmrot. cologne ini dirancang dengan cara yang tidak akan menyebabkan kerusakan pada kulit anda. hal ini sangat lembut pada kulit sensitif. pucelle mist colegne membantu anda tidak hanya menekan bau badan tetapi juga melembabkan kulit anda. hal ini dikemas dalam flacon kuning tenang hijau dan ringan dengan stopper transparan. ', 18000, 590, '0.00', '2019-01-03', '45pmc.jpg', 111, 0, '30981324'),
(180, 28, 'eye and lip makeupe remover', 'eye-and-lip-makeupe-remover', 'Dengan formula bebas alkohol sesuai untuk daerah mata dan bibir yang sensitif. efektif membersihkan riasan mata yang waterproof di daerah mata dan lip matte, tanpa menyebabkan rasa lengket. tidak menyebabkan kulit kering walau dipakai secara berulang', 20000, 750, '0.00', '2019-01-03', '15images (20).jpg', 61, 0, '20192678'),
(181, 30, 'Pixy bb cream bright fix cream 30ml', 'pixy-bb-cream-bright-fix-cream-30ml', 'Pixy bb cream bright fix cream  diformulasikan dengan Smart lock powder yang mempertahankan makeup tampak cerah dan tidak kusam hingga 12 jam. Teksturnya ringan menutup noda diwajah tanpa terkesan tebal. dapat digunakan dengan atau tanpa bedak. Natural whitening extract & derivat vit c sebagai whitening agent', 30900, 640, '0.00', '2019-01-03', '10bbc.jpg', 61, 0, '201425679'),
(171, 33, 'parfum spalding', 'parfum-spalding', 'Brand : Spalding\r\nProduct : Eau de toilette \r\nVolume : 100ml\r\n Fragrance Profile : Sporty Refresing\r\n \r\nSPALDING EAU DE TOILLETE \r\n\r\nSPALDING EAU DE TOILLETE  dengan aroma citrus yang segar, menambah daya tarik anda\r\n ', 38000, 624, '0.00', '2019-01-02', '34spalding.jpg', 52, 0, '30981241'),
(172, 33, 'Parfum gatsby urban', 'parfum-gatsby-urban', 'Gatsby Urban cologne energy wewangian yang modern dan cerdas memberikan kesan pribadi yang keren dan selalu bergaya', 15500, 725, '0.00', '2019-01-02', '89urban.jpg', 27, 0, '30981240'),
(173, 34, 'gatsby gel', 'gatsby-gel', 'gatsby water gloss super hard untuk tampilan gaya rambut yang lebih aktif, berdaya set sangat kuat dan tahan lebih lama.', 30000, 700, '0.00', '2019-01-02', '38images (12).jpg', 1, 0, '341667890'),
(174, 25, 'pixy lipstik maatte', 'pixy-lipstik-maatte', 'Lipstik dengan hasil matte dan daya tutup tinggi serta tahan lama. diperkaya dengan mosturaizing agent dengan vitamin e untuk menjaga bibir lembab dan cantik', 36500, 650, '0.00', '2019-01-02', '38lipmatte.jpg', 31, 0, '20001327'),
(175, 25, 'pixy liptint', 'pixy-liptint', 'Produk pertama yaitu tint me merupakan produk multifungsi untuk bibir dan pipi berbentuk tint. Tint me hadir dengan tiga warna yaitu : red, on pink, dan thant orange. Tint me juga diperkaya dengn honey extract yang seharusnya bakal meminimalisir resiko bibir kering dan bakal merawat bibir akan nampak sehat', 44000, 800, '0.00', '2019-01-02', '50download.jpg', 71, 0, '20001326'),
(176, 34, 'gatsby pommade', 'gatsby-pommade', 'Produk penata rambut tipe pomade untuk membentuk gaya rambut slicked back dengan efek klimis yang tinggi & mudah dibilas. efek klimis tinggi untuk membuat gaya rambut slicked back dan tampilan gaya rambut klimis dengan formula yang mudah dibilas.', 40000, 875, '0.00', '2019-01-03', '49download (1).jpg', 1, 0, '67812367'),
(177, 34, 'gatsby styling wax powder & spikes', 'gatsby-styling-wax-powder--spikes', 'power & spikes cocok untuk kamu yang ingin membentuk gaya rambut berdiri tajam & kuat. dilengkapi dengan fungsi yang tahan lama & dapat diatur ulang. menghasilkan tampilan matte hingga alami', 35000, 900, '0.00', '2019-01-03', '78images (14).jpg', 1, 0, '30981239');

-- --------------------------------------------------------

--
-- Table structure for table `produk_in`
--

CREATE TABLE IF NOT EXISTS `produk_in` (
`id_in` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `jml_in` int(5) NOT NULL,
  `tgl_in` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_in`
--

INSERT INTO `produk_in` (`id_in`, `id_produk`, `jml_in`, `tgl_in`) VALUES
(105, 186, 10, '2019-08-13'),
(106, 185, 10, '2019-08-13'),
(107, 184, 10, '2019-08-13'),
(108, 186, 500, '2019-08-13'),
(109, 187, 750, '2019-08-13'),
(110, 185, 960, '2019-08-13'),
(111, 183, 500, '2019-08-13'),
(112, 182, 600, '2019-08-13'),
(113, 181, 650, '2019-08-13'),
(114, 180, 750, '2019-08-13'),
(115, 179, 700, '2019-08-14'),
(116, 178, 775, '2019-08-14'),
(117, 177, 900, '2019-08-14'),
(118, 176, 875, '2019-08-14'),
(119, 184, 500, '2019-08-14'),
(120, 175, 800, '2019-08-14'),
(121, 174, 650, '2019-08-14'),
(122, 173, 700, '2019-08-14'),
(123, 172, 725, '2019-08-14'),
(124, 171, 675, '2019-08-14'),
(125, 170, 756, '2019-08-14'),
(126, 169, 850, '2019-08-14'),
(127, 168, 540, '2019-08-14'),
(128, 162, 675, '2019-08-14'),
(129, 161, 750, '2019-08-14'),
(130, 160, 800, '2019-08-14'),
(131, 130, 450, '2019-08-14'),
(132, 127, 735, '2019-08-14'),
(133, 126, 500, '2019-08-14'),
(134, 125, 550, '2019-08-14'),
(135, 124, 375, '2019-08-14'),
(136, 123, 457, '2019-08-14'),
(137, 188, 100, '2019-08-14'),
(138, 189, 500, '2019-05-02'),
(139, 190, 750, '2019-05-06'),
(140, 197, 750, '2019-05-06'),
(141, 196, 600, '2019-05-06'),
(142, 195, 375, '2019-05-06'),
(143, 194, 890, '2019-05-06'),
(144, 193, 900, '2019-05-06'),
(145, 192, 775, '2019-05-06'),
(146, 191, 475, '2019-05-06'),
(147, 198, 800, '2019-05-06'),
(148, 199, 760, '2019-05-06'),
(149, 200, 445, '2019-05-06'),
(150, 202, 750, '2019-05-06'),
(151, 201, 550, '2019-05-06'),
(152, 203, 600, '2019-05-06'),
(153, 204, 555, '2019-05-06'),
(154, 205, 756, '2019-05-06'),
(155, 206, 657, '2019-05-06'),
(156, 207, 775, '2019-05-06'),
(157, 208, 500, '2019-05-10'),
(158, 208, 500, '2019-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `shop_pengiriman`
--

CREATE TABLE IF NOT EXISTS `shop_pengiriman` (
`id_perusahaan` int(10) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_pengiriman`
--

INSERT INTO `shop_pengiriman` (`id_perusahaan`, `nama_perusahaan`, `gambar`) VALUES
(6, 'FREE ONGKIR', ''),
(5, 'GOJEK', '');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE IF NOT EXISTS `sms` (
`id_sms` int(5) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tgl_jto` date NOT NULL,
  `nominal` varchar(50) NOT NULL,
  `tgl_sms` date NOT NULL,
  `status_sms` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`id_sms`, `no_hp`, `nama_customer`, `keterangan`, `tgl_jto`, `nominal`, `tgl_sms`, `status_sms`) VALUES
(3, '+6282179402425', 'ulfa mustika', 'Total order:', '2019-09-25', '1.100.000', '2019-08-26', 'NEW ORDER'),
(4, '+6282167610707', 'wayan ahmad denny', 'Total order:', '2019-09-25', '120.000', '2019-08-26', 'NEW ORDER'),
(5, '+6285956317394', 'tya ayu pertiwi', 'Total order:', '2019-09-25', '2.975.000', '2019-08-26', 'NEW ORDER'),
(6, '+6285956317394', 'tya ayu pertiwi', 'Total order:', '2019-09-25', '2.750.000', '2019-08-26', 'NEW ORDER'),
(7, '+6282179402425', 'ulfa mustika', 'Total order:', '2019-09-29', '35.000', '2019-08-30', 'NEW ORDER'),
(8, '+6282179402425', 'ulfa mustika', 'Total order:', '2019-09-29', '45.000', '2019-08-30', 'NEW ORDER'),
(9, '+6282179402425', 'ulfa mustika', 'Total order:', '2019-09-29', '66.000', '2019-08-30', 'NEW ORDER'),
(10, '+6282179402425', 'ulfa mustika', 'Total order:', '2019-09-29', '45.000', '2019-08-30', 'NEW ORDER'),
(11, '+6282179402425', 'ulfa mustika', 'Total order:', '2019-09-29', '450.000', '2019-08-30', 'NEW ORDER'),
(12, '+6281532320215', 'nurmuhayat', 'Total order:', '2019-09-29', '280.000', '2019-08-30', 'NEW ORDER'),
(13, '+6281377779544', 'wahyu irawan', 'Total order:', '2019-09-29', '155.000', '2019-08-30', 'NEW ORDER'),
(14, '+6282179402425', 'ulfa mustika', 'Total order:', '2019-09-30', '230.000', '2019-08-31', 'NEW ORDER');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password1` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktivasi` int(6) NOT NULL DEFAULT '0',
  `cek_aktivasi` int(6) NOT NULL DEFAULT '0',
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
 ADD PRIMARY KEY (`id_header`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
 ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
 ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `kustomer`
--
ALTER TABLE `kustomer`
 ADD PRIMARY KEY (`id_kustomer`);

--
-- Indexes for table `mainmenu`
--
ALTER TABLE `mainmenu`
 ADD PRIMARY KEY (`id_main`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
 ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `mod_bank`
--
ALTER TABLE `mod_bank`
 ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id_orders`);

--
-- Indexes for table `orders_temp`
--
ALTER TABLE `orders_temp`
 ADD PRIMARY KEY (`id_orders_temp`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
 ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `produk_in`
--
ALTER TABLE `produk_in`
 ADD PRIMARY KEY (`id_in`);

--
-- Indexes for table `shop_pengiriman`
--
ALTER TABLE `shop_pengiriman`
 ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
 ADD PRIMARY KEY (`id_sms`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
MODIFY `id_header` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
MODIFY `id_konfirmasi` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
MODIFY `id_kota` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `kustomer`
--
ALTER TABLE `kustomer`
MODIFY `id_kustomer` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `mainmenu`
--
ALTER TABLE `mainmenu`
MODIFY `id_main` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
MODIFY `id_modul` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `mod_bank`
--
ALTER TABLE `mod_bank`
MODIFY `id_bank` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id_orders` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `orders_temp`
--
ALTER TABLE `orders_temp`
MODIFY `id_orders_temp` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=151;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
MODIFY `id_produk` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=209;
--
-- AUTO_INCREMENT for table `produk_in`
--
ALTER TABLE `produk_in`
MODIFY `id_in` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=159;
--
-- AUTO_INCREMENT for table `shop_pengiriman`
--
ALTER TABLE `shop_pengiriman`
MODIFY `id_perusahaan` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
MODIFY `id_sms` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
