-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 05, 2015 at 11:11 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tugas_akhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_paket`
--

CREATE TABLE IF NOT EXISTS `detail_paket` (
  `id_paket` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_module` int(11) NOT NULL,
  PRIMARY KEY (`id_paket`,`id_product`,`id_module`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_paket`
--

INSERT INTO `detail_paket` (`id_paket`, `id_product`, `id_module`) VALUES
(0, 0, 20),
(0, 0, 21),
(0, 0, 22),
(0, 0, 23),
(0, 0, 25),
(0, 0, 26),
(1, 15, 20),
(1, 15, 21),
(1, 15, 22),
(1, 16, 25),
(2, 15, 20),
(2, 15, 21),
(2, 15, 22),
(2, 15, 23),
(2, 15, 24),
(2, 16, 25),
(2, 16, 27);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE IF NOT EXISTS `detail_pembelian` (
  `id_member` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_template` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_module` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  PRIMARY KEY (`id_member`,`id_product`,`id_template`,`id_pembelian`,`id_module`,`id_paket`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_member`, `id_product`, `id_template`, `id_pembelian`, `id_module`, `id_paket`) VALUES
(33, 15, 3, 31, 20, 1),
(33, 15, 3, 31, 21, 1),
(33, 15, 3, 31, 22, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_product`
--

CREATE TABLE IF NOT EXISTS `detail_product` (
  `id_module` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  PRIMARY KEY (`id_module`,`id_product`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_product`
--

INSERT INTO `detail_product` (`id_module`, `id_product`) VALUES
(14, 7),
(16, 12),
(18, 13),
(20, 15),
(21, 15),
(22, 15),
(23, 15),
(24, 15),
(25, 16),
(26, 16),
(27, 16);

-- --------------------------------------------------------

--
-- Table structure for table `mst_admin`
--

CREATE TABLE IF NOT EXISTS `mst_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `flag_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mst_admin`
--

INSERT INTO `mst_admin` (`id_admin`, `nama_admin`, `email`, `password`, `flag_active`) VALUES
(3, 'fery', 'feryy@gmail.com', 'fery', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_member`
--

CREATE TABLE IF NOT EXISTS `mst_member` (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `flag_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_member`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `mst_member`
--

INSERT INTO `mst_member` (`id_member`, `nama`, `telp`, `email`, `password`, `flag_active`, `is_admin`) VALUES
(32, 'hendrikkk', '(085) 738-9912', 'hendrik@mail.com', '71daf33a616dfc880f754f7ab7598c16', 0, 0),
(33, 'Jauhar Ali Firdaus', '(085) 732-8991', 'jauharfirdaus78@gmail.com', 'feebc8554051e8b0069154847775ac87', 1, 1),
(34, 'Hendrik Pratama Putra', '(0857) 2134-1123', 'HendrikP@gmail.com', '71daf33a616dfc880f754f7ab7598c16', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mst_module`
--

CREATE TABLE IF NOT EXISTS `mst_module` (
  `id_module` int(11) NOT NULL AUTO_INCREMENT,
  `nama_module` varchar(50) NOT NULL,
  `harga_module` int(11) NOT NULL,
  `penjelasan` text NOT NULL,
  `flag_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_module`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `mst_module`
--

INSERT INTO `mst_module` (`id_module`, `nama_module`, `harga_module`, `penjelasan`, `flag_active`) VALUES
(1, 'Procurement', 400000, '<p>Procurement adalah proses untuk mendapatkan barang dan jasa dengan kemungkinan pengeluaran yang terbaik, dalam kualitas dan kuantitas yang tepat, waktu yang tepat, dan pada tempat yang tepat untuk menghasilkan keuntungan atau kegunaan secara langsung bagi pemerintah, perusahaan atau bagi pribadi yang dilakukan melalui sebuah kontrak.</p>\r\n', 0),
(2, 'Visitor', 500000, '<p>Visitor adalah pengunjung yang sedang membuka blog / website kita, baik membuka karena sengaja, maupun membuka karena kebetulan.<br />\r\nStatistik ini menunjukkan seluruh jumlah kunjungan yang terjadi. Jadi satu pengunjung atau satu IP address dapat terhitung beberapa kali sebanyak kunjungan yang terjadi.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div id="__if72ru4sdfsdfruh7fewui_once" style="display:none;">&nbsp;</div>\r\n\r\n<div id="__zsc_once">&nbsp;</div>\r\n\r\n<div id="__hggasdgjhsagd_once" style="display:none;">&nbsp;</div>\r\n', 0),
(3, 'Vendor', 500000, '<p>Vendor atau supplier adalah lembaga, perorangan atau pihak ketiga yang menyediakan bahan, jasa, produk untuk diolah atau dijual kembali atau dibutuhkan oleh perusahaan untuk meningkatkan kinerja perusahaan.</p>\r\n', 1),
(4, 'Admin Procurement', 500000, '<p>Admin adalah kepanjangan dari administrator yang digunakan untuk mengelola atau ruang untuk mengelola</p>\r\n', 1),
(5, 'Auction', 600000, '<p>Auction (lelang) adalah mekanisme pasar dimana penjual menawarkan produk dan pembeli melakukan penawaran secara berurutan secara kompetitif hingga harga terakhir dicapai. Lelang bisa dilakuan secara online, offline, maupun pada situs pribadi. Di dalam online auction menerapkan konsep dynamic pricing, yaitu harga yang berubah berdasarkan pada hubungan penawaran dan permintaan pada waktu tertentu.</p>\r\n', 1),
(6, 'Bidding', 500000, '<p>Bidding adalah penempatan iklan anda terus pada posisi pertama, caranya, bila iklan anda tidak berada ditingkat teratas maka anda dapat melakukan bidding untuk meningkatkan iklan anda pada tempat teratas. Sebagai contoh : PT. A dan PT. B menawarkan jasa yang sama yaitu jasa tenaga kerja, dan PT. A menempatkan kata kunci &lsquo;tenaga kerja&rsquo; dengan nilai Rp. 100, dimana yang menempatkan PT. A di posisi teratas dalam search engine. Melihat hal ini PT. B yang sebelumnya menempatkan kata kunci &lsquo;tenaga kerja&rsquo; dengan nilai Rp. 80 menaikkan nilainya menjadi Rp. 125, maka otomatis posisi PT. A tergeser dan yang mendapati urusan paling atas adalah PT. B, begitu seterusnya.</p>\r\n', 1),
(7, 'Rekam Medis', 700000, '<p>Rekam medis adalah keterangan baik yang tertulis maupun terekam tentang identitas ,<br />\r\nanamnesa,penentuan fisik , laboratorium, diagnosa segala pelayanan dan tindakan medik<br />\r\nyang diberikan kepada pasien dan pengobatan baik yang dirawat inap , rawat jalan maupun<br />\r\nyang mendapatkan pelayanan gawat darurat.<br />\r\nRekam medis mempunyai pengertian yang sangat luas , tidak hanya sekedar kegiatan<br />\r\npencatatan, akan tetapi mempunyai pengertian sebagai suatu sistem penyelenggaraan rekam<br />\r\nmedis yaitu mulai pencatatan selama pasien mendapatkan pelayanan medik , dilanjutkan<br />\r\ndengan penanganan berkas rekam medis yang meliputi penyelenggaraan penyimpanan serta<br />\r\npengeluaran berkas dari tempat penyimpanan untuk melayani permintaan/peminjaman<br />\r\napabila dari pasien atau untuk keperluan lainnya.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div id="__if72ru4sdfsdfruh7fewui_once" style="display:none;">&nbsp;</div>\r\n\r\n<div id="__zsc_once">&nbsp;</div>\r\n\r\n<div id="__hggasdgjhsagd_once" style="display:none;">&nbsp;</div>\r\n', 0),
(8, 'Rawat Jalan', 700000, '<p>Rawat jalan adalah pelayanan medis kepada seorang pasien untuk tujuan pengamatan, diagnosis, pengobatan, rehabilitasi, dan pelayanan kesehatan lainnya, tanpa mengharuskan pasien tersebut dirawat inap. Keuntungannya, pasien tidak perlu mengeluarkan biaya untuk menginap (opname).</p>\r\n', 1),
(9, 'Rawat Inap', 600000, '<p>Rawat inap (<em>opname</em>) adalah istilah yang berarti proses perawatan pasien oleh tenaga kesehatan profesional akibat penyakit tertentu, di mana pasien diinapkan di suatu ruangan di rumah sakit . Ruang rawat inap adalah ruang tempat pasien dirawat. Ruangan ini dulunya sering hanya berupa bangsal yang dihuni oleh banyak orang sekaligus. Saat ini, ruang rawat inap di banyak rumah sakit sudah sangat mirip dengan kamar-kamar hotel. Pasien yang berobat jalan di Unit Rawat Jalan, akan mendapatkan surat rawat dari dokter yang merawatnya, bila pasien tersebut memerlukan perawatan di dalam rumah sakit, atau menginap di rumah sakit.</p>\r\n', 1),
(10, 'Laboraturium', 700000, '<p>Laboratorium (disingkat lab) adalah tempat riset ilmiah, eksperimen, pengukuran ataupun pelatihan ilmiah dilakukan. Laboratorium biasanya dibuat untuk memungkinkan dilakukannya kegiatan-kegiatan tersebut secara terkendali. Laboratorium ilmiah biasanya dibedakan menurut disiplin ilmunya, misalnya laboratorium fisika, laboratorium kimia, laboratorium biokimia, laboratorium komputer, dan laboratorium bahasa.</p>\r\n', 1),
(11, 'Sistem Informasi Bedah', 700000, '<p>Sistem informasi yang menunjukkan tentang jadwal, dan lain sebagainya yang berubungan dengan bedah.</p>\r\n', 1),
(13, 'Apotek', 800000, '<p>Apotek Adalah sebuah</p>\r\n', 1),
(14, 'Penjualan', 500000, '<p>zsdfvsdvdvfdv sdvsdc</p>\r\n', 0),
(15, 'Receptionist', 600000, '<p>Adalah Sebuah</p>\r\n', 0),
(16, 'mkl', 500000, '<p>Scsas</p>\r\n', 0),
(17, 'Pemesanan', 600000, '<p>Pemesanan Adalah</p>\r\n', 1),
(18, 'Barang', 600000, '<p>Barang</p>\r\n', 1),
(19, 'Obat', 0, '<p>Obat Adalah</p>\r\n\r\n<div id="__if72ru4sdfsdfruh7fewui_once" style="display:none;">&nbsp;</div>\r\n\r\n<div id="__zsc_once">&nbsp;</div>\r\n\r\n<div id="__hggasdgjhsagd_once" style="display:none;">&nbsp;</div>\r\n', 0),
(20, 'Admin Procurement', 600000, '<p>Admin Procurement Adalah Orang yang dapat mengakses dan menambah, mengedit, menghapus data pada Aplikasi</p>\r\n\r\n<div id="__if72ru4sdfsdfruh7fewui_once" style="display:none;">&nbsp;</div>\r\n\r\n<div id="__zsc_once">&nbsp;</div>\r\n\r\n<div id="__hggasdgjhsagd_once" style="display:none;">&nbsp;</div>\r\n', 1),
(21, 'Auction', 600000, '<p>Auction (lelang) adalah mekanisme pasar dimana penjual menawarkan produk dan pembeli melakukan penawaran secara berurutan secara kompetitif hingga harga terakhir dicapai.</p>\r\n\r\n<div id="__if72ru4sdfsdfruh7fewui_once" style="display:none;">&nbsp;</div>\r\n\r\n<div id="__zsc_once">&nbsp;</div>\r\n\r\n<div id="__hggasdgjhsagd_once" style="display:none;">&nbsp;</div>\r\n', 1),
(22, 'Bidding', 700000, '<p><em>Bidding</em> adalah suatu dokumen yang berisi permohonan resmi pengajuan penyelenggaraan suatu konvensi. Suatu penawaran untuk menjadi tuan rumah penyelenggaraan konvensi</p>\r\n', 1),
(23, 'Vendor', 700000, '<p>Suatu lembaga, perorangan, atau pihak ketiga yang menyediakan bahan, produk, maupun jasa untuk diolah, dijual kembali, atau digunakan oleh perusahaan untuk meningkatkan kinerja perusahaan tersebut.</p>\r\n', 1),
(24, 'Visitor', 800000, '<p>Visitor adalah pengunjung yang sedang membuka blog / website kita, baik membuka karena sengaja, maupun membuka karena kebetulan.</p>\r\n', 1),
(26, 'Apotek', 700000, '<p>Apotek adalah</p>\r\n', 0),
(25, 'Rawat Inap', 600000, '<p>Rawat Inap Adalah......................</p>\r\n\r\n<div id="__if72ru4sdfsdfruh7fewui_once" style="display:none;">&nbsp;</div>\r\n\r\n<div id="__zsc_once">&nbsp;</div>\r\n\r\n<div id="__hggasdgjhsagd_once" style="display:none;">&nbsp;</div>\r\n', 1),
(27, 'Rawat Jalan', 800000, '<p>Rawat Jalan</p>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_paket`
--

CREATE TABLE IF NOT EXISTS `mst_paket` (
  `id_paket` int(11) NOT NULL AUTO_INCREMENT,
  `nama_paket` varchar(200) NOT NULL,
  `flag_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_paket`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mst_paket`
--

INSERT INTO `mst_paket` (`id_paket`, `nama_paket`, `flag_active`) VALUES
(1, 'Paket Platinum', 0),
(2, 'Paket Gold', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_pembelian`
--

CREATE TABLE IF NOT EXISTS `mst_pembelian` (
  `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(256) NOT NULL,
  `harga_aplikasi` decimal(11,2) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `flag_active` tinyint(1) NOT NULL DEFAULT '1',
  `id_member` int(11) NOT NULL,
  PRIMARY KEY (`id_pembelian`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `mst_pembelian`
--

INSERT INTO `mst_pembelian` (`id_pembelian`, `source`, `harga_aplikasi`, `tanggal_pemesanan`, `flag_active`, `id_member`) VALUES
(21, 'http://localhost/tugasaplikasi/upload/coffee-312521_640.png', '0.00', '2015-07-14', 1, 33),
(20, 'http://localhost/tugasaplikasi/upload/coffee-312521_640.png', '0.00', '2015-07-14', 1, 33),
(19, 'http://localhost/tugasaplikasi/upload/eHOSPITAL_logo_(200X60).jpg', '0.00', '2015-07-14', 1, 33),
(17, 'http://localhost/tugasaplikasi/upload/eHOSPITAL_logo_(200X60).jpg', '0.00', '2015-07-14', 1, 33),
(18, 'http://localhost/tugasaplikasi/upload/eHOSPITAL_logo_(200X60).jpg', '0.00', '2015-07-14', 1, 33),
(22, 'http://localhost/tugasaplikasi/upload/e-procurement.jpg', '0.00', '2015-07-15', 1, 33),
(23, 'http://localhost/tugasaplikasi/upload/eHOSPITAL_logo_(200X60).jpg', '0.00', '2015-07-22', 1, 33),
(24, 'http://localhost/tugasaplikasi/upload/eHOSPITAL_logo_(200X60).jpg', '0.00', '2015-07-22', 1, 33),
(25, 'http://localhost/tugasaplikasi/upload/eHOSPITAL_logo_(200X60).jpg', '0.00', '2015-07-22', 1, 33),
(26, 'http://localhost/tugasaplikasi/upload/eHOSPITAL_logo_(200X60).jpg', '0.00', '2015-07-22', 1, 33),
(27, 'http://localhost/tugasaplikasi/upload/eHOSPITAL_logo_(200X60).jpg', '2000000.00', '2015-07-22', 1, 33),
(28, 'http://localhost/tugasaplikasi/upload/e-procurement.jpg', '1500000.00', '2015-07-22', 0, 33),
(29, 'http://localhost/tugasaplikasi/upload/e-procurement.jpg', '2600000.00', '2015-07-22', 0, 33),
(30, 'http://localhost/tugasaplikasi/upload/e-procurement.jpg', '2600000.00', '2015-07-22', 0, 33),
(31, 'http://localhost/tugasaplikasi/upload/e-procurement.jpg', '1900000.00', '2015-07-26', 1, 33);

-- --------------------------------------------------------

--
-- Table structure for table `mst_product`
--

CREATE TABLE IF NOT EXISTS `mst_product` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `nama_product` varchar(50) NOT NULL,
  `source` varchar(200) NOT NULL,
  `penjelasanP` text NOT NULL,
  `flag_active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_product`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `mst_product`
--

INSERT INTO `mst_product` (`id_product`, `nama_product`, `source`, `penjelasanP`, `flag_active`) VALUES
(16, 'E-Hospital', 'http://localhost/tugasaplikasi/upload/E-Hospital.jpg', 'eHospital dalam arti yang terbatas seperti yang dikembangkan oleh IC Innovatian (registrasi Online, eMedical Record, eResipe, rujukan interen , Permintaan penunjang diagnostik, termasuk informasi pelayanan rumah sakit , ruang perawatan dan lain sebagainya) telah banyak digunakan di rumah sakit yang besar\r\nAplikasi yang dikembangkan tersebut menggunakan metoda Bridge System yaitu mengintegrasikan HIS dengan CIS.', 1),
(15, 'E-Procurement', 'http://localhost/tugasaplikasi/upload/e-procurement.jpg', 'E-procurement merupakan sistem pengadaan barang atau jasa dengan menggunakan media elektronik seperti internet atau jaringan komputer. E-procurement diterapkan dalam proses pembelian dan penjualan secara online supaya lebih efisien dan efektif. E-procurement mengurangi proses-proses yang tidak diperlukan dalam sebuah proses bisnis. Dalam prakteknya, e-procurement mengurangi penggunaan kertas, menghemat waktu dan mengurangi penggunaan tenaga kerja dalam prosesnya.\r\n', 1),
(19, 'Online Shop', 'http://localhost/tugasaplikasi/upload/online-shop.png', 'Online shop adalah', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_template`
--

CREATE TABLE IF NOT EXISTS `mst_template` (
  `id_template` int(11) NOT NULL AUTO_INCREMENT,
  `nama_template` varchar(50) NOT NULL,
  `penjelasan` text NOT NULL,
  `source` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `flag_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_template`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mst_template`
--

INSERT INTO `mst_template` (`id_template`, `nama_template`, `penjelasan`, `source`, `url`, `flag_active`) VALUES
(2, 'Android Blue', '<p>sdljncsldkcsmldkfmsd vsdlkvnsldnvsd csd,cnsl,dncdfncsd sdkjncsd</p>\r\n', 'http://localhost/tugasaplikasi/upload/menu1.jpg', 'http://localhost/tugasaplikasi/upload/menu1.jpg', 1),
(3, 'template blue', '<p>Template</p>\r\n', 'http://localhost/tugasaplikasi/upload/menu1.jpg', 'http://www.google.com', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_paket`
--
CREATE TABLE IF NOT EXISTS `view_paket` (
`id_paket` int(11)
,`nama_paket` varchar(200)
,`id_module` int(11)
,`nama_module` varchar(50)
,`harga_module` int(11)
,`nama_product` varchar(50)
,`id_product` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pembelian`
--
CREATE TABLE IF NOT EXISTS `view_pembelian` (
`id_pembelian` int(11)
,`source` varchar(256)
,`harga_aplikasi` decimal(11,2)
,`tanggal_pemesanan` date
,`flag_active` tinyint(1)
,`id_member` int(11)
,`id_paket` int(11)
,`nama_paket` varchar(200)
,`id_module` int(11)
,`nama_module` varchar(50)
,`id_template` int(11)
,`nama_template` varchar(50)
,`nama_product` varchar(50)
,`id_product` int(11)
,`nama` varchar(50)
,`telp` varchar(20)
,`email` varchar(200)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_product_module`
--
CREATE TABLE IF NOT EXISTS `view_product_module` (
`id_product` int(11)
,`nama_product` varchar(50)
,`source` varchar(200)
,`flag_active` int(11)
,`id_module` int(11)
,`nama_module` varchar(50)
,`harga_module` int(11)
,`penjelasan` text
);
-- --------------------------------------------------------

--
-- Structure for view `view_paket`
--
DROP TABLE IF EXISTS `view_paket`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_paket` AS select `mst_paket`.`id_paket` AS `id_paket`,`mst_paket`.`nama_paket` AS `nama_paket`,`mst_module`.`id_module` AS `id_module`,`mst_module`.`nama_module` AS `nama_module`,`mst_module`.`harga_module` AS `harga_module`,`mst_product`.`nama_product` AS `nama_product`,`mst_product`.`id_product` AS `id_product` from (((`mst_paket` join `detail_paket` on((`detail_paket`.`id_paket` = `mst_paket`.`id_paket`))) join `mst_product` on((`detail_paket`.`id_product` = `mst_product`.`id_product`))) join `mst_module` on((`detail_paket`.`id_module` = `mst_module`.`id_module`)));

-- --------------------------------------------------------

--
-- Structure for view `view_pembelian`
--
DROP TABLE IF EXISTS `view_pembelian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pembelian` AS select `mst_pembelian`.`id_pembelian` AS `id_pembelian`,`mst_pembelian`.`source` AS `source`,`mst_pembelian`.`harga_aplikasi` AS `harga_aplikasi`,`mst_pembelian`.`tanggal_pemesanan` AS `tanggal_pemesanan`,`mst_pembelian`.`flag_active` AS `flag_active`,`mst_pembelian`.`id_member` AS `id_member`,`mst_paket`.`id_paket` AS `id_paket`,`mst_paket`.`nama_paket` AS `nama_paket`,`mst_module`.`id_module` AS `id_module`,`mst_module`.`nama_module` AS `nama_module`,`mst_template`.`id_template` AS `id_template`,`mst_template`.`nama_template` AS `nama_template`,`mst_product`.`nama_product` AS `nama_product`,`mst_product`.`id_product` AS `id_product`,`mst_member`.`nama` AS `nama`,`mst_member`.`telp` AS `telp`,`mst_member`.`email` AS `email` from ((((((`mst_pembelian` left join `mst_member` on((`mst_pembelian`.`id_member` = `mst_member`.`id_member`))) left join `detail_pembelian` on((`detail_pembelian`.`id_pembelian` = `mst_pembelian`.`id_pembelian`))) left join `mst_product` on((`detail_pembelian`.`id_product` = `mst_product`.`id_product`))) left join `mst_template` on((`detail_pembelian`.`id_template` = `mst_template`.`id_template`))) join `mst_module` on((`detail_pembelian`.`id_module` = `mst_module`.`id_module`))) join `mst_paket` on((`mst_paket`.`id_paket` = `detail_pembelian`.`id_paket`))) where (`mst_pembelian`.`flag_active` = 1);

-- --------------------------------------------------------

--
-- Structure for view `view_product_module`
--
DROP TABLE IF EXISTS `view_product_module`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_product_module` AS select `pr`.`id_product` AS `id_product`,`pr`.`nama_product` AS `nama_product`,`pr`.`source` AS `source`,`pr`.`flag_active` AS `flag_active`,`md`.`id_module` AS `id_module`,`md`.`nama_module` AS `nama_module`,`md`.`harga_module` AS `harga_module`,`md`.`penjelasan` AS `penjelasan` from ((`mst_product` `pr` join `detail_product` `dp` on((`pr`.`id_product` = `dp`.`id_product`))) join `mst_module` `md` on((`md`.`id_module` = `dp`.`id_module`))) where ((`pr`.`flag_active` = 1) and (`md`.`flag_active` = 1));
