-- --------------------------------------------------------
-- Host:                         107.182.142.204
-- Versi server:                 5.5.41-cll-lve - MySQL Community Server (GPL)
-- OS Server:                    Linux
-- HeidiSQL Versi:               9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping structure for table kztszete_pm.analisa_rab
CREATE TABLE IF NOT EXISTS `analisa_rab` (
  `ANALISA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SATUAN_NAMA` varchar(100) DEFAULT NULL,
  `KATEGORI_ANALISA_ID` int(11) DEFAULT NULL,
  `LOKASI_UPAH_ID` int(11) DEFAULT NULL,
  `ANALISA_KODE` varchar(100) DEFAULT NULL,
  `ANALISA_NAMA` varchar(1000) DEFAULT NULL,
  `ANALISA_TOTAL` varchar(100) DEFAULT NULL,
  `ANALISA_ACTIVE` int(11) DEFAULT '1',
  PRIMARY KEY (`ANALISA_ID`),
  KEY `FK_RELATIONSHIP_21` (`SATUAN_NAMA`),
  KEY `FK_KATEG_ANALISIS` (`KATEGORI_ANALISA_ID`),
  KEY `FK_master_analisa_lokasi` (`LOKASI_UPAH_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.analisa_rab: ~40 rows (approximately)
DELETE FROM `analisa_rab`;
/*!40000 ALTER TABLE `analisa_rab` DISABLE KEYS */;
INSERT INTO `analisa_rab` (`ANALISA_ID`, `SATUAN_NAMA`, `KATEGORI_ANALISA_ID`, `LOKASI_UPAH_ID`, `ANALISA_KODE`, `ANALISA_NAMA`, `ANALISA_TOTAL`, `ANALISA_ACTIVE`) VALUES
	(6, 'M3', 2, 1, 'HSPK/PEK.COBA-0004', 'Analisa Coba', '6082000', 1),
	(7, 'M3', 2, 1, 'HSPK/PEK.PNDSI-0001', '  Membuat Pondasi Batu Belah  1 : 6 ', '519572.5', 1),
	(8, 'M3', 2, 1, 'HSPK/PEK.BTNSTR-0004', '  Membuat  Beton   1 : 2 : 3', '682100', 1),
	(9, 'M3', 2, 1, 'HSPK/PEK.TNH-0001', 'Galian Tanah ', '45000', 1),
	(10, 'M3', 2, 1, 'HSPK/PEK.TNH-0002', 'Urugan Tanah  Kembali', '17500', 1),
	(11, 'M3', 2, 1, 'HSPK/PEK.TNH-0003', 'Urugan Sirtu + Pemadatan', '124500', 1),
	(12, 'M3', 2, 1, 'HSPK/PEK.TNH-0004', 'Urugan pasir', '115250', 1),
	(13, 'M3', 2, 1, 'HSPK/PEK.PNDSI-0001', '  Membuat Pondasi Batu Belah  1 : 6 ', '519572.5', 1),
	(14, 'M3', 2, 1, 'HSPK/PEK.PNDSI-0002', '  Membuat Pasangan  Batu Kosong (Aanstamping)', '114375', 1),
	(15, 'M2', 2, 1, 'HSPK/PEK.PSGN-0001', 'Pasangan bata merah 1 Pc : 6 ps', '114245', 1),
	(16, 'M2', 2, 1, 'HSPK/PEK.PSGN-0003', 'Plesteran dinding 1 pc : 6 ps tb. 1,5 cm', '32020.5', 1),
	(17, 'M3', 2, 1, 'HSPK/PEK.TNH-0001', 'Galian Tanah ', '45000', 1),
	(18, 'M3', 2, 1, 'HSPK/PEK.TNH-0002', 'Urugan Tanah  Kembali', '17500', 1),
	(19, 'M3', 2, 1, 'HSPK/PEK.TNH-0005', 'Urugan Tanah  Perataan & Pemadatan', '26000', 1),
	(20, 'M3', 2, 1, 'HSPK/PEK.TNH-0003', 'Urugan Sirtu + Pemadatan', '124500', 1),
	(21, 'M3', 2, 1, 'HSPK/PEK.PNDSI-0001', '  Membuat Pondasi Batu Belah  1 : 6 ', '557785', 1),
	(22, 'M3', 2, 1, 'HSPK/PEK.PNDSI-0002', '  Membuat Pasangan  Batu Kosong (Aanstamping)', '118275', 1),
	(23, 'M2', 2, 1, 'HSPK/PEK.BTNSTR-0001', 'Lantai kerja tb 5cm (site mix)', '34150', 1),
	(24, 'M3', 2, 1, 'HSPK/PEK.BTNSTR-0002', 'Lantai kerja  (site mix)', '683000', 1),
	(25, 'M2', 2, 1, 'HSPK/PEK.PSGN-0001', 'Pasangan bata merah 1 Pc : 6 ps', '119700', 1),
	(26, 'M2', 2, 1, 'HSPK/PEK.PSGN-0003', 'Plesteran dinding 1 pc : 6 ps tb. 1,5 cm', '34060', 1),
	(27, 'M3', 2, 1, 'HSPK/PEK.TNH-0001', 'Galian Tanah ', '45000', 1),
	(28, 'M3', 2, 1, 'HSPK/PEK.PNDSI-0002', '  Membuat Pasangan  Batu Kosong (Aanstamping)', '118275', 1),
	(29, 'M2', 2, 1, 'HSPK/PEK.PSGN-0001', 'Pasangan bata merah 1 Pc : 6 ps', '119700', 1),
	(30, 'M2', 2, 1, 'HSPK/PEK.BTNSTR-0001', 'Lantai kerja tb 5cm (site mix)', '34150', 1),
	(31, 'M3', 2, 1, 'HSPK/PEK.BTNSTR-0002', 'Lantai kerja  (site mix)', '683000', 1),
	(32, 'M3', 2, 1, 'HSPK/PEK.BTNSTR-0004', '  Membuat  Beton   1 : 2 : 3', '753000', 1),
	(33, 'M2', 2, 1, 'HSPK/PEK.PSGN-0001', 'Pasangan bata merah 1 Pc : 6 ps', '120300', 1),
	(34, 'M3', 2, 1, 'HSPK/PEK.PNDSI-0001', '  Membuat Pondasi Batu Belah  1 : 6 ', '577200', 1),
	(35, 'M3', 2, 1, 'HSPK/PEK.TNH-0001', 'Galian Tanah ', '45000', 1),
	(36, 'M3', 2, 1, 'HSPK/PEK.BTNSTR-0005', 'Cor plat lantai 15 cm (Ready Mix) K-225', '375121', 1),
	(37, 'M3', 2, 1, 'HSPK/PEK.TNH-0005', 'Urugan Tanah  Perataan & Pemadatan', '119700', 1),
	(38, 'M3', 2, 1, 'HSPK/PEK.TNH-0006', 'Buang Tanah  Sementara', '34150', 1),
	(39, 'M3', 2, 1, 'HSPK/PEK.TNH-0007', 'Buang Tanah  Keluar Lokasi', '683000', 1),
	(40, 'M3', 2, 1, 'HSPK/PEK.TNH-0008', 'Buang Gragal  Keluar Lokasi', '753000', 1),
	(41, 'M3', 2, 1, 'HSPK/PEK.PNDSI-0001', '  Membuat Pondasi Batu Belah  1 : 6 ', '120300', 1),
	(42, 'M2', 2, 1, 'HSPK/PEK.PSGN-0003', 'Plesteran dinding 1 pc : 6 ps tb. 1,5 cm', '34435', 1),
	(43, 'M3', 2, 1, 'HSPK/PEK.PNDSI-0002', '  Membuat Pasangan  Batu Kosong (Aanstamping)', '577200', 1),
	(44, 'M2', 2, 1, 'HSPK/PEK.BTNSTR-0001', 'Lantai kerja tb 5cm (site mix)', '45000', 1),
	(45, 'M2', 2, 1, 'HSPK/PEK.BTNSTR-0002', 'Lantai kerja  (site mix)', '375121', 1);
/*!40000 ALTER TABLE `analisa_rab` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.bpm
CREATE TABLE IF NOT EXISTS `bpm` (
  `BPM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PEMINTA_BARANG_ID` int(11) DEFAULT NULL,
  `PROJECT_ID` int(11) DEFAULT NULL,
  `PETUGAS_GUDANG_ID` int(11) DEFAULT NULL,
  `GUDANG_ID` int(11) DEFAULT NULL,
  `VALIDATOR_ID` int(11) DEFAULT NULL,
  `STATUS_BPM_ID` int(11) DEFAULT NULL,
  `BPM_KODE` varchar(100) DEFAULT NULL,
  `BPM_TANGGAL` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `BPM_KETERANGAN` text,
  PRIMARY KEY (`BPM_ID`),
  KEY `FK_RELATIONSHIP_61` (`VALIDATOR_ID`),
  KEY `FK_RELATIONSHIP_62` (`PETUGAS_GUDANG_ID`),
  KEY `FK_RELATIONSHIP_63` (`GUDANG_ID`),
  KEY `FK_RELATIONSHIP_64` (`PEMINTA_BARANG_ID`),
  KEY `FK_RELATIONSHIP_65` (`STATUS_BPM_ID`),
  KEY `FK_PROJECT_BPM` (`PROJECT_ID`),
  CONSTRAINT `FK_RELATIONSHIP_61` FOREIGN KEY (`VALIDATOR_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_RELATIONSHIP_62` FOREIGN KEY (`PETUGAS_GUDANG_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_RELATIONSHIP_63` FOREIGN KEY (`GUDANG_ID`) REFERENCES `master_gudang` (`GUDANG_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_RELATIONSHIP_64` FOREIGN KEY (`PEMINTA_BARANG_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_RELATIONSHIP_65` FOREIGN KEY (`STATUS_BPM_ID`) REFERENCES `status_bpm` (`STATUS_BPM_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.bpm: ~0 rows (approximately)
DELETE FROM `bpm`;
/*!40000 ALTER TABLE `bpm` DISABLE KEYS */;
/*!40000 ALTER TABLE `bpm` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.departemen
CREATE TABLE IF NOT EXISTS `departemen` (
  `DEPARTEMEN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DEPARTEMEN_NAMA` varchar(100) DEFAULT NULL,
  `DEPARTEMEN_ACTIVE` int(11) NOT NULL DEFAULT '1',
  `test` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`DEPARTEMEN_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.departemen: ~11 rows (approximately)
DELETE FROM `departemen`;
/*!40000 ALTER TABLE `departemen` DISABLE KEYS */;
INSERT INTO `departemen` (`DEPARTEMEN_ID`, `DEPARTEMEN_NAMA`, `DEPARTEMEN_ACTIVE`, `test`) VALUES
	(1, 'RAB', 1, NULL),
	(2, 'Purchasing', 1, NULL),
	(3, 'Keuangan', 1, NULL),
	(4, 'Top Management', 1, NULL),
	(5, 'Halo', 1, NULL),
	(6, 'Halo2', 1, NULL),
	(8, 'halo3', 1, NULL),
	(14, 'tes', 1, NULL),
	(15, 'halso', 1, '0halso'),
	(16, 'dfs', 1, '16dfs'),
	(17, 'Perencanaan', 1, NULL);
/*!40000 ALTER TABLE `departemen` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.detail_analisa
CREATE TABLE IF NOT EXISTS `detail_analisa` (
  `DETAIL_ANALISA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `BARANG_ID` int(11) DEFAULT NULL,
  `UPAH_ID` int(11) DEFAULT NULL,
  `ANALISA_ID` int(11) DEFAULT NULL,
  `DETAIL_ANALISA_KOEFISIEN` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`DETAIL_ANALISA_ID`),
  KEY `FK_RELATIONSHIP_14` (`ANALISA_ID`),
  KEY `FK_RELATIONSHIP_27` (`UPAH_ID`),
  KEY `FK_RELATIONSHIP_30` (`BARANG_ID`),
  CONSTRAINT `FK_RELATIONSHIP_14` FOREIGN KEY (`ANALISA_ID`) REFERENCES `master_analisa` (`ANALISA_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.detail_analisa: ~113 rows (approximately)
DELETE FROM `detail_analisa`;
/*!40000 ALTER TABLE `detail_analisa` DISABLE KEYS */;
INSERT INTO `detail_analisa` (`DETAIL_ANALISA_ID`, `BARANG_ID`, `UPAH_ID`, `ANALISA_ID`, `DETAIL_ANALISA_KOEFISIEN`) VALUES
	(100, 77, NULL, 21, '1.35'),
	(101, 63, NULL, 21, '0.37'),
	(102, 23, NULL, 21, '0.054'),
	(103, 117, NULL, 21, '2.15'),
	(104, 97, NULL, 21, '0.004'),
	(105, 34, NULL, 21, '0.008'),
	(106, NULL, 32, 21, '1'),
	(107, 19, NULL, 22, '0.050'),
	(108, 30, NULL, 22, '0.050'),
	(109, 31, NULL, 22, '1.2'),
	(110, 97, NULL, 22, '0.01'),
	(111, 34, NULL, 22, '0.01'),
	(112, 2, NULL, 22, '0.05'),
	(113, 23, NULL, 22, '0.06'),
	(114, 21, NULL, 22, '0.450'),
	(115, NULL, 33, 22, '1'),
	(116, 77, NULL, 23, '1.667'),
	(117, 23, NULL, 23, '5'),
	(118, 94, NULL, 23, '2'),
	(119, 61, NULL, 23, '2'),
	(120, 68, NULL, 23, '1'),
	(121, 128, NULL, 23, '1.05'),
	(122, 96, NULL, 23, '45'),
	(123, 117, NULL, 23, '0.25'),
	(124, 97, NULL, 23, '0.02'),
	(125, 34, NULL, 23, '0.04'),
	(126, 31, NULL, 23, '1.5'),
	(127, NULL, 34, 23, '1'),
	(131, NULL, 36, 25, '1'),
	(136, NULL, 37, 26, '1'),
	(137, 123, NULL, 27, '1.05'),
	(138, NULL, 38, 27, '1'),
	(139, 27, NULL, 28, '1.05'),
	(140, NULL, 39, 28, '1'),
	(142, NULL, 40, 29, '1'),
	(143, NULL, 41, 30, '1'),
	(144, NULL, 42, 31, '1'),
	(145, NULL, 43, 32, '1'),
	(150, 77, NULL, 24, '0.3'),
	(151, 23, NULL, 24, '0.05'),
	(152, 95, NULL, 24, '0.25'),
	(153, NULL, 35, 24, '1'),
	(154, 4, NULL, 33, '1.1'),
	(155, 26, NULL, 33, '0.561'),
	(156, 117, NULL, 33, '2.925'),
	(157, NULL, 44, 33, '1.5'),
	(158, NULL, 45, 33, '0.6'),
	(159, NULL, 46, 33, '0.06'),
	(160, NULL, 47, 33, '0.075'),
	(167, 117, NULL, 35, '0.25'),
	(168, 97, NULL, 35, '0.02'),
	(169, 125, NULL, 35, '0.04'),
	(170, NULL, 48, 35, '1'),
	(171, 27, NULL, 34, '0.3'),
	(172, NULL, 44, 34, '0.78'),
	(173, NULL, 45, 34, '0.39'),
	(174, NULL, 46, 34, '0.039'),
	(175, NULL, 47, 34, '0.039'),
	(176, 117, NULL, 37, '5'),
	(177, 117, NULL, 37, '5'),
	(178, 97, NULL, 37, '0.4'),
	(179, 97, NULL, 37, '0.4'),
	(180, 125, NULL, 37, '0.8'),
	(181, 125, NULL, 37, '0.8'),
	(182, NULL, 44, 37, '2'),
	(183, NULL, 44, 37, '2'),
	(184, NULL, 45, 37, '0.35'),
	(185, NULL, 45, 37, '0.35'),
	(186, NULL, 46, 37, '0.035'),
	(187, NULL, 46, 37, '0.035'),
	(188, NULL, 47, 37, '0.010'),
	(189, NULL, 47, 37, '0.010'),
	(204, 117, NULL, 39, '5'),
	(205, 97, NULL, 39, '0.4'),
	(206, 125, NULL, 39, '0.8'),
	(207, NULL, 44, 39, '2'),
	(208, NULL, 45, 39, '0.35'),
	(209, NULL, 46, 39, '0.035'),
	(210, NULL, 47, 39, '0.01'),
	(211, 117, NULL, 40, '5'),
	(212, 97, NULL, 40, '0.5'),
	(213, 125, NULL, 40, '0.8'),
	(214, NULL, 44, 40, '2'),
	(215, NULL, 45, 40, '0.35'),
	(216, NULL, 46, 40, '0.035'),
	(217, NULL, 47, 40, '0.01'),
	(218, 117, NULL, 41, '5.8'),
	(219, 97, NULL, 41, '0.54'),
	(220, 125, NULL, 41, '0.81'),
	(221, NULL, 44, 41, '2'),
	(222, NULL, 45, 41, '0.35'),
	(223, NULL, 46, 41, '0.035'),
	(224, NULL, 47, 41, '0.01'),
	(233, 103, NULL, 42, '6.67'),
	(234, 163, NULL, 42, '126.04'),
	(235, 62, NULL, 42, '6.67'),
	(236, 162, NULL, 42, '1.03'),
	(237, NULL, 49, 42, '1'),
	(238, NULL, 50, 42, '126.04'),
	(239, NULL, 51, 42, '6.67'),
	(240, NULL, 52, 42, '1'),
	(241, 96, NULL, 43, '62'),
	(242, 117, NULL, 43, '0.21'),
	(243, 26, NULL, 43, '0.04'),
	(244, NULL, 44, 43, '0.65'),
	(245, NULL, 45, 43, '0.2'),
	(246, 117, NULL, 44, '0.099'),
	(247, 26, NULL, 44, '0.025'),
	(248, NULL, 44, 44, '0.2'),
	(249, NULL, 45, 44, '0.15'),
	(250, 1, NULL, 45, '12'),
	(251, 3, NULL, 45, '10'),
	(252, NULL, 33, 45, '10');
/*!40000 ALTER TABLE `detail_analisa` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.detail_analisa_rab
CREATE TABLE IF NOT EXISTS `detail_analisa_rab` (
  `DETAIL_ANALISA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `BARANG_ID` int(11) DEFAULT NULL,
  `UPAH_ID` int(11) DEFAULT NULL,
  `ANALISA_ID` int(11) DEFAULT NULL,
  `DETAIL_ANALISA_KOEFISIEN` varchar(100) DEFAULT NULL,
  `DETAIL_ANALISA_HARGA` varchar(100) DEFAULT NULL,
  `DETAIL_ANALISA_TOTAL` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`DETAIL_ANALISA_ID`),
  KEY `FK_RELATIONSHIP_14` (`ANALISA_ID`),
  KEY `FK_RELATIONSHIP_27` (`UPAH_ID`),
  KEY `FK_RELATIONSHIP_30` (`BARANG_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=212 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.detail_analisa_rab: ~155 rows (approximately)
DELETE FROM `detail_analisa_rab`;
/*!40000 ALTER TABLE `detail_analisa_rab` DISABLE KEYS */;
INSERT INTO `detail_analisa_rab` (`DETAIL_ANALISA_ID`, `BARANG_ID`, `UPAH_ID`, `ANALISA_ID`, `DETAIL_ANALISA_KOEFISIEN`, `DETAIL_ANALISA_HARGA`, `DETAIL_ANALISA_TOTAL`) VALUES
	(16, 1, NULL, 6, '12', '485000', '5820000'),
	(17, 3, NULL, 6, '10', '3700', '37000'),
	(18, NULL, 33, 6, '10', '22500', '225000'),
	(19, 4, NULL, 7, '1.1', '125000', '137500'),
	(20, 26, NULL, 7, '0.561', '135000', '75735.00000000001'),
	(21, 117, NULL, 7, '2.925', '54500', '159412.5'),
	(22, NULL, 44, 7, '1.5', '60000', '90000'),
	(23, NULL, 45, 7, '0.6', '75000', '45000'),
	(24, NULL, 46, 7, '0.06', '80000', '4800'),
	(25, NULL, 47, 7, '0.075', '95000', '7125'),
	(26, 117, NULL, 8, '5.8', '54500', '316100'),
	(27, 97, NULL, 8, '0.54', '115000', '62100.00000000001'),
	(28, 125, NULL, 8, '0.81', '190000', '153900'),
	(29, NULL, 44, 8, '2', '60000', '120000'),
	(30, NULL, 45, 8, '0.35', '75000', '26250'),
	(31, NULL, 46, 8, '0.035', '80000', '2800.0000000000005'),
	(32, NULL, 47, 8, '0.01', '95000', '950'),
	(33, NULL, 36, 9, '1', '45000', '45000'),
	(34, NULL, 37, 10, '1', '17500', '17500'),
	(35, 123, NULL, 11, '1.05', '90000', '94500'),
	(36, NULL, 38, 11, '1', '30000', '30000'),
	(38, 27, NULL, 12, '1.05', '105000', '110250'),
	(39, NULL, 39, 12, '1', '5000', '5000'),
	(41, 4, NULL, 13, '1.1', '125000', '137500'),
	(42, 26, NULL, 13, '0.561', '135000', '75735.00000000001'),
	(43, 117, NULL, 13, '2.925', '54500', '159412.5'),
	(44, NULL, 44, 13, '1.5', '60000', '90000'),
	(45, NULL, 45, 13, '0.6', '75000', '45000'),
	(46, NULL, 46, 13, '0.06', '80000', '4800'),
	(47, NULL, 47, 13, '0.075', '95000', '7125'),
	(48, 27, NULL, 14, '0.3', '105000', '31500'),
	(49, NULL, 44, 14, '0.78', '60000', '46800'),
	(50, NULL, 45, 14, '0.39', '75000', '29250'),
	(51, NULL, 46, 14, '0.039', '80000', '3120'),
	(52, NULL, 47, 14, '0.039', '95000', '3705'),
	(55, 96, NULL, 15, '62', '700', '43400'),
	(56, 117, NULL, 15, '0.21', '54500', '11445'),
	(57, 26, NULL, 15, '0.04', '135000', '5400'),
	(58, NULL, 44, 15, '0.65', '60000', '39000'),
	(59, NULL, 45, 15, '0.2', '75000', '15000'),
	(62, 117, NULL, 16, '0.099', '54500', '5395.5'),
	(63, 26, NULL, 16, '0.025', '135000', '3375'),
	(64, NULL, 44, 16, '0.2', '60000', '12000'),
	(65, NULL, 45, 16, '0.15', '75000', '11250'),
	(66, NULL, 36, 17, '1', '45000', '45000'),
	(67, NULL, 37, 18, '1', '17500', '17500'),
	(68, NULL, 40, 19, '1', '26000', '26000'),
	(69, 123, NULL, 20, '1.05', '90000', '94500'),
	(70, NULL, 38, 20, '1', '30000', '30000'),
	(72, 4, NULL, 21, '1.1', '125000', '137500'),
	(73, 26, NULL, 21, '0.561', '135000', '75735.00000000001'),
	(74, 117, NULL, 21, '2.925', '65000', '190125'),
	(75, NULL, 44, 21, '1.5', '65000', '97500'),
	(76, NULL, 45, 21, '0.6', '75000', '45000'),
	(77, NULL, 46, 21, '0.06', '80000', '4800'),
	(78, NULL, 47, 21, '0.075', '95000', '7125'),
	(79, 27, NULL, 22, '0.3', '105000', '31500'),
	(80, NULL, 44, 22, '0.78', '65000', '50700'),
	(81, NULL, 45, 22, '0.39', '75000', '29250'),
	(82, NULL, 46, 22, '0.039', '80000', '3120'),
	(83, NULL, 47, 22, '0.039', '95000', '3705'),
	(86, 117, NULL, 23, '0.25', '65000', '16250'),
	(87, 97, NULL, 23, '0.02', '115000', '2300'),
	(88, 125, NULL, 23, '0.04', '190000', '7600'),
	(89, NULL, 48, 23, '1', '8000', '8000'),
	(93, 117, NULL, 24, '5', '65000', '325000'),
	(94, 97, NULL, 24, '0.4', '115000', '46000'),
	(95, 125, NULL, 24, '0.8', '190000', '152000'),
	(96, NULL, 44, 24, '2', '65000', '130000'),
	(97, NULL, 45, 24, '0.35', '75000', '26250'),
	(98, NULL, 46, 24, '0.035', '80000', '2800.0000000000005'),
	(99, NULL, 47, 24, '0.01', '95000', '950'),
	(100, 96, NULL, 25, '62', '700', '43400'),
	(101, 117, NULL, 25, '0.21', '65000', '13650'),
	(102, 26, NULL, 25, '0.04', '135000', '5400'),
	(103, NULL, 44, 25, '0.65', '65000', '42250'),
	(104, NULL, 45, 25, '0.2', '75000', '15000'),
	(107, 117, NULL, 26, '0.099', '65000', '6435'),
	(108, 26, NULL, 26, '0.025', '135000', '3375'),
	(109, NULL, 44, 26, '0.2', '65000', '13000'),
	(110, NULL, 45, 26, '0.15', '75000', '11250'),
	(114, NULL, 36, 27, '1', '45000', '45000'),
	(115, 27, NULL, 28, '0.3', '105000', '31500'),
	(116, NULL, 44, 28, '0.78', '65000', '50700'),
	(117, NULL, 45, 28, '0.39', '75000', '29250'),
	(118, NULL, 46, 28, '0.039', '80000', '3120'),
	(119, NULL, 47, 28, '0.039', '95000', '3705'),
	(122, 96, NULL, 29, '62', '700', '43400'),
	(123, 117, NULL, 29, '0.21', '65000', '13650'),
	(124, 26, NULL, 29, '0.04', '135000', '5400'),
	(125, NULL, 44, 29, '0.65', '65000', '42250'),
	(126, NULL, 45, 29, '0.2', '75000', '15000'),
	(129, 117, NULL, 30, '0.25', '65000', '16250'),
	(130, 97, NULL, 30, '0.02', '115000', '2300'),
	(131, 125, NULL, 30, '0.04', '190000', '7600'),
	(132, NULL, 48, 30, '1', '8000', '8000'),
	(136, 117, NULL, 31, '5', '65000', '325000'),
	(137, 97, NULL, 31, '0.4', '115000', '46000'),
	(138, 125, NULL, 31, '0.8', '190000', '152000'),
	(139, NULL, 44, 31, '2', '65000', '130000'),
	(140, NULL, 45, 31, '0.35', '75000', '26250'),
	(141, NULL, 46, 31, '0.035', '80000', '2800.0000000000005'),
	(142, NULL, 47, 31, '0.01', '95000', '950'),
	(143, 117, NULL, 32, '5.8', '65000', '377000'),
	(144, 97, NULL, 32, '0.54', '115000', '62100.00000000001'),
	(145, 125, NULL, 32, '0.81', '190000', '153900'),
	(146, NULL, 44, 32, '2', '65000', '130000'),
	(147, NULL, 45, 32, '0.35', '75000', '26250'),
	(148, NULL, 46, 32, '0.035', '80000', '2800.0000000000005'),
	(149, NULL, 47, 32, '0.01', '95000', '950'),
	(150, 96, NULL, 33, '62', '700', '43400'),
	(151, 117, NULL, 33, '0.21', '65000', '13650'),
	(152, 26, NULL, 33, '0.04', '150000', '6000'),
	(153, NULL, 44, 33, '0.65', '65000', '42250'),
	(154, NULL, 45, 33, '0.2', '75000', '15000'),
	(157, 4, NULL, 34, '1.1', '135000', '148500'),
	(158, 26, NULL, 34, '0.561', '150000', '84150.00000000001'),
	(159, 117, NULL, 34, '2.925', '65000', '190125'),
	(160, NULL, 44, 34, '1.5', '65000', '97500'),
	(161, NULL, 45, 34, '0.6', '75000', '45000'),
	(162, NULL, 46, 34, '0.06', '80000', '4800'),
	(163, NULL, 47, 34, '0.075', '95000', '7125'),
	(164, NULL, 36, 35, '1', '45000', '45000'),
	(165, 103, NULL, 36, '6.67', '1800', '12006'),
	(166, 163, NULL, 36, '126.04', NULL, NULL),
	(167, 62, NULL, 36, '6.67', '9000', '60030'),
	(168, 162, NULL, 36, '1.03', NULL, NULL),
	(169, NULL, 49, 36, '1', '35000', '35000'),
	(170, NULL, 50, 36, '126.04', '2000', '252080'),
	(171, NULL, 51, 36, '6.67', '1500', '10005'),
	(172, NULL, 52, 36, '1', '6000', '6000'),
	(180, NULL, 40, 37, '1', '26000', '26000'),
	(181, NULL, 41, 38, '1', '16000', '16000'),
	(182, NULL, 42, 39, '1', '75000', '75000'),
	(183, NULL, 43, 40, '1', '30000', '30000'),
	(184, 4, NULL, 41, '1.1', '135000', '148500'),
	(185, 26, NULL, 41, '0.561', '150000', '84150.00000000001'),
	(186, 117, NULL, 41, '2.925', '65000', '190125'),
	(187, NULL, 44, 41, '1.5', '65000', '97500'),
	(188, NULL, 45, 41, '0.6', '75000', '45000'),
	(189, NULL, 46, 41, '0.06', '80000', '4800'),
	(190, NULL, 47, 41, '0.075', '95000', '7125'),
	(191, 117, NULL, 42, '0.099', '65000', '6435'),
	(192, 26, NULL, 42, '0.025', '150000', '3750'),
	(193, NULL, 44, 42, '0.2', '65000', '13000'),
	(194, NULL, 45, 42, '0.15', '75000', '11250'),
	(198, 27, NULL, 43, '0.3', '120000', '36000'),
	(199, NULL, 44, 43, '0.78', '65000', '50700'),
	(200, NULL, 45, 43, '0.39', '75000', '29250'),
	(201, NULL, 46, 43, '0.039', '80000', '3120'),
	(202, NULL, 47, 43, '0.039', '95000', '3705'),
	(205, 117, NULL, 44, '0.25', '65000', '16250'),
	(206, 97, NULL, 44, '0.02', '115000', '2300'),
	(207, 125, NULL, 44, '0.04', '190000', '7600'),
	(208, NULL, 48, 44, '1', '8000', '8000');
/*!40000 ALTER TABLE `detail_analisa_rab` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.detail_bpm
CREATE TABLE IF NOT EXISTS `detail_bpm` (
  `BPM_ID` int(11) NOT NULL,
  `BARANG_ID` int(11) NOT NULL,
  `STOK_BPM` varchar(100) DEFAULT NULL,
  `RAB_ID` int(11) NOT NULL,
  PRIMARY KEY (`BPM_ID`,`RAB_ID`,`BARANG_ID`),
  KEY `FK_RELATIONSHIP_67` (`BARANG_ID`),
  KEY `FK_detail_bpm_rab_transaction` (`RAB_ID`),
  CONSTRAINT `FK_detail_bpm_bpm` FOREIGN KEY (`BPM_ID`) REFERENCES `bpm` (`BPM_ID`),
  CONSTRAINT `FK_detail_bpm_rab_transaction` FOREIGN KEY (`RAB_ID`) REFERENCES `rab_transaction` (`RAB_ID`),
  CONSTRAINT `FK_RELATIONSHIP_67` FOREIGN KEY (`BARANG_ID`) REFERENCES `master_barang` (`BARANG_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.detail_bpm: ~0 rows (approximately)
DELETE FROM `detail_bpm`;
/*!40000 ALTER TABLE `detail_bpm` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_bpm` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.detail_hm
CREATE TABLE IF NOT EXISTS `detail_hm` (
  `HM_ID` int(11) NOT NULL,
  `BARANG_ID` int(11) NOT NULL,
  `VOLUME` varchar(100) NOT NULL,
  PRIMARY KEY (`HM_ID`,`BARANG_ID`),
  KEY `FK1_BARANG_ID` (`BARANG_ID`),
  CONSTRAINT `FK1_BARANG_ID` FOREIGN KEY (`BARANG_ID`) REFERENCES `master_barang` (`BARANG_ID`),
  CONSTRAINT `FK1_HM_ID` FOREIGN KEY (`HM_ID`) REFERENCES `hutang_barang` (`HUTANG_BARANG_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Detail_hm menyimpan data-data item material yang dipinjam ol';

-- Dumping data for table kztszete_pm.detail_hm: ~0 rows (approximately)
DELETE FROM `detail_hm`;
/*!40000 ALTER TABLE `detail_hm` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_hm` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.detail_km
CREATE TABLE IF NOT EXISTS `detail_km` (
  `KM_ID` int(11) DEFAULT NULL,
  `BARANG_ID` int(11) DEFAULT NULL,
  `VOLUME` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Detail km berisi data item dari material yang dikembalikan dari hutang. diisi materialnya dan volumen yang dikembalikan. Asumsi bisa terjadi 1x hutang dan pengembalian 2x';

-- Dumping data for table kztszete_pm.detail_km: ~0 rows (approximately)
DELETE FROM `detail_km`;
/*!40000 ALTER TABLE `detail_km` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_km` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.detail_lpb
CREATE TABLE IF NOT EXISTS `detail_lpb` (
  `PENERIMAAN_BARANG_ID` int(11) NOT NULL,
  `BARANG_ID` int(11) NOT NULL,
  `PO_ID` int(11) NOT NULL,
  `VOLUME_LPB` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`PENERIMAAN_BARANG_ID`,`BARANG_ID`,`PO_ID`),
  KEY `FK_RELATIONSHIP_60` (`BARANG_ID`),
  KEY `FKPO_ID_1` (`PO_ID`),
  CONSTRAINT `FKPO_ID_1` FOREIGN KEY (`PO_ID`) REFERENCES `purchase_order` (`PURCHASE_ORDER_ID`),
  CONSTRAINT `FK_RELATIONSHIP_59` FOREIGN KEY (`PENERIMAAN_BARANG_ID`) REFERENCES `penerimaan_barang` (`PENERIMAAN_BARANG_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_RELATIONSHIP_60` FOREIGN KEY (`BARANG_ID`) REFERENCES `master_barang` (`BARANG_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.detail_lpb: ~5 rows (approximately)
DELETE FROM `detail_lpb`;
/*!40000 ALTER TABLE `detail_lpb` DISABLE KEYS */;
INSERT INTO `detail_lpb` (`PENERIMAAN_BARANG_ID`, `BARANG_ID`, `PO_ID`, `VOLUME_LPB`) VALUES
	(15, 96, 14, '80'),
	(15, 117, 14, '2'),
	(16, 117, 14, '2'),
	(17, 96, 14, '80'),
	(17, 117, 14, '2');
/*!40000 ALTER TABLE `detail_lpb` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.detail_overhead
CREATE TABLE IF NOT EXISTS `detail_overhead` (
  `DETAIL_OVERHEAD_ID` int(11) NOT NULL AUTO_INCREMENT,
  `BARANG_ID` int(11) DEFAULT NULL,
  `PAKET_OVERHEAD_MATERIAL_ID` int(11) DEFAULT NULL,
  `ANALISA_ID` int(11) DEFAULT NULL,
  `PAKET_OVERHEAD_UPAH_ID` int(11) DEFAULT NULL,
  `OVERHEAD_ID` int(11) DEFAULT NULL,
  `DETAIL_OVERHEAD_KOEFISIEN` varchar(100) DEFAULT NULL,
  `DETAIL_OVERHEAD_HARGA` varchar(100) DEFAULT NULL,
  `DETAIL_OVERHEAD_TOTAL` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`DETAIL_OVERHEAD_ID`),
  KEY `FK_detail_overhead_barang` (`BARANG_ID`),
  KEY `FK_detail_overhead_analisa` (`ANALISA_ID`),
  KEY `FK_detail_overhead_paket_material` (`PAKET_OVERHEAD_MATERIAL_ID`),
  KEY `FK_detail_overhead_paket_upah` (`PAKET_OVERHEAD_UPAH_ID`),
  KEY `FK_overhead_id_2` (`OVERHEAD_ID`),
  CONSTRAINT `FK_detail_overhead_paket_material` FOREIGN KEY (`PAKET_OVERHEAD_MATERIAL_ID`) REFERENCES `paket_overhead_material` (`PAKET_OVERHEAD_MATERIAL_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table kztszete_pm.detail_overhead: ~7 rows (approximately)
DELETE FROM `detail_overhead`;
/*!40000 ALTER TABLE `detail_overhead` DISABLE KEYS */;
INSERT INTO `detail_overhead` (`DETAIL_OVERHEAD_ID`, `BARANG_ID`, `PAKET_OVERHEAD_MATERIAL_ID`, `ANALISA_ID`, `PAKET_OVERHEAD_UPAH_ID`, `OVERHEAD_ID`, `DETAIL_OVERHEAD_KOEFISIEN`, `DETAIL_OVERHEAD_HARGA`, `DETAIL_OVERHEAD_TOTAL`) VALUES
	(1, NULL, 5, NULL, NULL, 1, '1', '1000000', '1000000'),
	(2, 97, NULL, NULL, NULL, 1, '2', '115000', '230000'),
	(3, 117, NULL, NULL, NULL, 4, '5', '65000', '325000'),
	(4, NULL, NULL, NULL, 46, 6, '10', '80000', '800000'),
	(5, 30, NULL, NULL, NULL, 7, '1', '105000', '105000'),
	(6, NULL, 6, NULL, NULL, 7, '1', '120000', '120000'),
	(7, NULL, NULL, NULL, 44, 8, '20', '65000', '1300000');
/*!40000 ALTER TABLE `detail_overhead` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.detail_pekerjaan
CREATE TABLE IF NOT EXISTS `detail_pekerjaan` (
  `KATEGORI_PEKERJAAN_ID` int(11) DEFAULT NULL,
  `ANALISA_ID` int(11) DEFAULT NULL,
  `RAB_ID` int(11) DEFAULT NULL,
  `SUBCON_ID` int(11) DEFAULT NULL,
  `DETAIL_PEKERJAAN_VOLUME` varchar(100) DEFAULT NULL,
  `DETAIL_PEKERJAAN_TOTAL` varchar(100) DEFAULT NULL,
  `DETAIL_PEKERJAAN_URUTAN` int(11) DEFAULT NULL,
  KEY `FK_RELATIONSHIP_12` (`RAB_ID`),
  KEY `FK_RELATIONSHIP_13` (`KATEGORI_PEKERJAAN_ID`),
  KEY `FK_RELATIONSHIP_31` (`ANALISA_ID`),
  KEY `FK_RELATIONSHIP_32` (`SUBCON_ID`),
  CONSTRAINT `FK_RELATIONSHIP_13` FOREIGN KEY (`KATEGORI_PEKERJAAN_ID`) REFERENCES `kategori_paket_pekerjaan` (`KATEGORI_PEKERJAAN_ID`),
  CONSTRAINT `FK_RELATIONSHIP_32` FOREIGN KEY (`SUBCON_ID`) REFERENCES `subcon` (`SUBCON_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.detail_pekerjaan: ~26 rows (approximately)
DELETE FROM `detail_pekerjaan`;
/*!40000 ALTER TABLE `detail_pekerjaan` DISABLE KEYS */;
INSERT INTO `detail_pekerjaan` (`KATEGORI_PEKERJAAN_ID`, `ANALISA_ID`, `RAB_ID`, `SUBCON_ID`, `DETAIL_PEKERJAAN_VOLUME`, `DETAIL_PEKERJAAN_TOTAL`, `DETAIL_PEKERJAAN_URUTAN`) VALUES
	(70, 7, 1, NULL, '5', '2597862.5', 1),
	(70, 8, 1, NULL, '7', '4774700', 2),
	(77, 17, 3, NULL, '200', '9000000', 1),
	(77, 18, 3, NULL, '200', '3500000', 2),
	(78, 19, 3, NULL, '150', '3900000', 1),
	(78, 20, 3, NULL, '150', '18675000', 2),
	(79, 21, 3, NULL, '100', '55778500', 1),
	(79, 22, 3, NULL, '100', '11827500', 2),
	(80, 23, 3, NULL, '100', '3415000', 1),
	(80, 24, 3, NULL, '100', '68300000', 2),
	(81, 25, 3, NULL, '50', '5985000', 1),
	(81, 26, 3, NULL, '50', '1703000', 2),
	(82, 27, 4, NULL, '40', '1800000', 1),
	(82, NULL, 4, 11, '5', '2500000', 2),
	(83, 28, 4, NULL, '50', '5913750', 1),
	(84, 29, 4, NULL, '40', '4788000', 1),
	(88, 37, 2, NULL, '100', '4500000', 1),
	(88, 38, 2, NULL, '10', '341500', 2),
	(88, 39, 2, NULL, '5', '3415000', 3),
	(88, 40, 2, NULL, '12', '9036000', 4),
	(89, 41, 2, NULL, '14', '1684200', 1),
	(89, 42, 2, NULL, '13', '447655', 2),
	(89, 43, 2, NULL, '14', '8080800', 3),
	(90, 44, 2, NULL, '15', '675000', 1),
	(90, 45, 2, NULL, '16', '6001936', 2),
	(90, NULL, 2, 13, '20', '30000000', 3);
/*!40000 ALTER TABLE `detail_pekerjaan` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.detail_pm
CREATE TABLE IF NOT EXISTS `detail_pm` (
  `PM_ID` int(11) NOT NULL DEFAULT '0',
  `BARANG_ID` int(11) NOT NULL DEFAULT '0',
  `VOLUME` int(11) DEFAULT NULL,
  PRIMARY KEY (`PM_ID`,`BARANG_ID`),
  KEY `FK2_BARANG_DET` (`BARANG_ID`),
  CONSTRAINT `FK1_PM_ID_DET` FOREIGN KEY (`PM_ID`) REFERENCES `kembali_barang` (`KEMBALI_BARANG_ID`),
  CONSTRAINT `FK2_BARANG_DET` FOREIGN KEY (`BARANG_ID`) REFERENCES `master_barang` (`BARANG_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.detail_pm: ~0 rows (approximately)
DELETE FROM `detail_pm`;
/*!40000 ALTER TABLE `detail_pm` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_pm` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.detail_po
CREATE TABLE IF NOT EXISTS `detail_po` (
  `PURCHASE_ORDER_ID` int(11) NOT NULL,
  `BARANG_ID` int(11) NOT NULL,
  `PERMINTAAN_PEMBELIAN_ID` int(11) DEFAULT NULL,
  `VOLUME_PO` varchar(100) DEFAULT NULL,
  `HARGA_MATERI_PO` varchar(100) DEFAULT NULL,
  `HARGA_AWAL` varchar(100) DEFAULT NULL,
  `DISKON1` varchar(100) DEFAULT NULL,
  `DISKON2` varchar(100) DEFAULT NULL,
  `DISKON3` varchar(100) DEFAULT NULL,
  `HARGA_STLH_DISKON` varchar(100) NOT NULL,
  `HARGA_PAJAK` varchar(100) NOT NULL,
  `HARGA_FINAL` varchar(100) NOT NULL,
  PRIMARY KEY (`PURCHASE_ORDER_ID`,`BARANG_ID`),
  KEY `FK_RELATIONSHIP_48` (`BARANG_ID`),
  CONSTRAINT `FK_RELATIONSHIP_47` FOREIGN KEY (`PURCHASE_ORDER_ID`) REFERENCES `purchase_order` (`PURCHASE_ORDER_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Harga Materi PO adalah Harga per satuan\r\nHarga Awal adalah h';

-- Dumping data for table kztszete_pm.detail_po: ~12 rows (approximately)
DELETE FROM `detail_po`;
/*!40000 ALTER TABLE `detail_po` DISABLE KEYS */;
INSERT INTO `detail_po` (`PURCHASE_ORDER_ID`, `BARANG_ID`, `PERMINTAAN_PEMBELIAN_ID`, `VOLUME_PO`, `HARGA_MATERI_PO`, `HARGA_AWAL`, `DISKON1`, `DISKON2`, `DISKON3`, `HARGA_STLH_DISKON`, `HARGA_PAJAK`, `HARGA_FINAL`) VALUES
	(8, 97, 2, '42.5', '115000', '4887500', '0', '0', '0', '4887500', '488750', '4398750'),
	(10, 4, 4, '5', '125000', '625000', '0', '0', '0', '625000', '0', '625000'),
	(10, 117, 4, '20', '54500', '1090000', '0', '0', '0', '1090000', '0', '1090000'),
	(11, 26, 5, '1', '100000', '100000', '0', '0', '0', '100000', '0', '100000'),
	(11, 117, 5, '5', '55000', '275000', '0', '0', '0', '275000', '0', '275000'),
	(12, 117, 2, '5', '65000', '325000', '0', '0', '0', '325000', '32500', '292500'),
	(13, 26, 1, '59', '135000', '7965000', '0', '0', '0', '7965000', '0', '7965000'),
	(13, 96, 1, '3100', '700', '2170000', '0', '0', '0', '2170000', '0', '2170000'),
	(14, 26, 3, '1.6', '135000', '216000', '0', '0', '0', '216000', '21600', '194400'),
	(14, 27, 3, '15', '105000', '1575000', '0', '0', '0', '1575000', '157500', '1417500'),
	(14, 96, 3, '2480', '700', '1736000', '0', '0', '0', '1736000', '173600', '1562400'),
	(14, 117, 3, '8.4', '65000', '546000', '0', '0', '0', '546000', '54600', '491400');
/*!40000 ALTER TABLE `detail_po` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.detail_transaksi_opname
CREATE TABLE IF NOT EXISTS `detail_transaksi_opname` (
  `OPNAME_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PERMINTAAN_PEKERJAAN_ID` int(11) NOT NULL,
  `ANALISA_ID` int(11) NOT NULL,
  `VOLUME_OPNAME` float NOT NULL,
  `HARGA_OPNAME` float NOT NULL,
  PRIMARY KEY (`OPNAME_ID`,`PERMINTAAN_PEKERJAAN_ID`,`ANALISA_ID`),
  KEY `FK_PK` (`PERMINTAAN_PEKERJAAN_ID`),
  KEY `FK_ANALISA` (`ANALISA_ID`),
  CONSTRAINT `FK_detail_transaksi_opname_analisa_rab` FOREIGN KEY (`ANALISA_ID`) REFERENCES `analisa_rab` (`ANALISA_ID`),
  CONSTRAINT `FK_OPNAME` FOREIGN KEY (`OPNAME_ID`) REFERENCES `opname` (`OPNAME_ID`),
  CONSTRAINT `FK_PK` FOREIGN KEY (`PERMINTAAN_PEKERJAAN_ID`) REFERENCES `permintaan_pekerjaan` (`PERMINTAAN_PEKERJAAN_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.detail_transaksi_opname: ~8 rows (approximately)
DELETE FROM `detail_transaksi_opname`;
/*!40000 ALTER TABLE `detail_transaksi_opname` DISABLE KEYS */;
INSERT INTO `detail_transaksi_opname` (`OPNAME_ID`, `PERMINTAAN_PEKERJAAN_ID`, `ANALISA_ID`, `VOLUME_OPNAME`, `HARGA_OPNAME`) VALUES
	(5, 3, 17, 200, 45000),
	(5, 3, 19, 150, 26000),
	(5, 3, 20, 150, 30000),
	(5, 3, 21, 100, 15000),
	(5, 3, 22, 100, 86775),
	(5, 3, 23, 100, 9000),
	(5, 3, 24, 100, 160000),
	(5, 3, 25, 50, 57250);
/*!40000 ALTER TABLE `detail_transaksi_opname` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.detail_transaksi_pk
CREATE TABLE IF NOT EXISTS `detail_transaksi_pk` (
  `PERMINTAAN_PEKERJAAN_ID` int(11) NOT NULL,
  `ANALISA_ID` int(11) NOT NULL,
  `VOLUME_PK` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`PERMINTAAN_PEKERJAAN_ID`,`ANALISA_ID`),
  KEY `FK_detail_transaksi_pk_analisa_rab` (`ANALISA_ID`),
  CONSTRAINT `FK_detail_transaksi_pk_analisa_rab` FOREIGN KEY (`ANALISA_ID`) REFERENCES `analisa_rab` (`ANALISA_ID`),
  CONSTRAINT `FK_detail_transaksi_pk_permintaan_pekerjaan` FOREIGN KEY (`PERMINTAAN_PEKERJAAN_ID`) REFERENCES `permintaan_pekerjaan` (`PERMINTAAN_PEKERJAAN_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.detail_transaksi_pk: ~15 rows (approximately)
DELETE FROM `detail_transaksi_pk`;
/*!40000 ALTER TABLE `detail_transaksi_pk` DISABLE KEYS */;
INSERT INTO `detail_transaksi_pk` (`PERMINTAAN_PEKERJAAN_ID`, `ANALISA_ID`, `VOLUME_PK`) VALUES
	(1, 15, '10'),
	(2, 7, '3'),
	(2, 8, '7'),
	(3, 17, '200'),
	(3, 19, '150'),
	(3, 20, '150'),
	(3, 21, '100'),
	(3, 22, '100'),
	(3, 23, '100'),
	(3, 24, '100'),
	(3, 25, '50'),
	(3, 26, '50'),
	(4, 27, '20'),
	(5, 41, '12'),
	(5, 44, '1');
/*!40000 ALTER TABLE `detail_transaksi_pk` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.detail_transaksi_pp
CREATE TABLE IF NOT EXISTS `detail_transaksi_pp` (
  `DETAIL_PP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PERMINTAAN_PEMBELIAN_ID` int(11) NOT NULL,
  `BARANG_ID` int(11) DEFAULT NULL,
  `SUBCON_ID` int(11) DEFAULT NULL,
  `VOLUME_PP` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`DETAIL_PP_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.detail_transaksi_pp: ~11 rows (approximately)
DELETE FROM `detail_transaksi_pp`;
/*!40000 ALTER TABLE `detail_transaksi_pp` DISABLE KEYS */;
INSERT INTO `detail_transaksi_pp` (`DETAIL_PP_ID`, `PERMINTAAN_PEMBELIAN_ID`, `BARANG_ID`, `SUBCON_ID`, `VOLUME_PP`) VALUES
	(1, 1, 96, NULL, '3100'),
	(2, 1, 26, NULL, '59'),
	(3, 2, 117, NULL, '5'),
	(4, 3, 96, NULL, '2480'),
	(5, 3, 26, NULL, '1.6'),
	(6, 3, 27, NULL, '15'),
	(7, 3, 117, NULL, '8.4'),
	(8, 3, NULL, 11, '5'),
	(9, 4, 4, NULL, '110.00000000000001'),
	(10, 4, 97, NULL, '42'),
	(11, 4, 27, NULL, '30');
/*!40000 ALTER TABLE `detail_transaksi_pp` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.enroll
CREATE TABLE IF NOT EXISTS `enroll` (
  `PENGGUNA_ID` int(11) NOT NULL,
  `PENUGASAN_ID` int(11) NOT NULL,
  `PROJECT_ID` int(11) NOT NULL,
  `URUTAN` int(11) DEFAULT NULL,
  `TANGGAL_ENROLL` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`PENGGUNA_ID`,`PENUGASAN_ID`,`PROJECT_ID`),
  KEY `fk_project_id` (`PROJECT_ID`),
  KEY `fk_penugasan_id` (`PENUGASAN_ID`),
  CONSTRAINT `fk_pengguna` FOREIGN KEY (`PENGGUNA_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`),
  CONSTRAINT `fk_penugasan_id` FOREIGN KEY (`PENUGASAN_ID`) REFERENCES `penugasan` (`PENUGASAN_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.enroll: ~20 rows (approximately)
DELETE FROM `enroll`;
/*!40000 ALTER TABLE `enroll` DISABLE KEYS */;
INSERT INTO `enroll` (`PENGGUNA_ID`, `PENUGASAN_ID`, `PROJECT_ID`, `URUTAN`, `TANGGAL_ENROLL`) VALUES
	(1, 1, 2, 1, '2015-04-14 14:28:43'),
	(1, 1, 3, 1, '2015-04-14 15:05:25'),
	(1, 4, 2, 2, '2015-04-14 14:28:45'),
	(1, 4, 3, 1, '2015-04-14 15:05:27'),
	(1, 4, 4, 0, '2015-04-15 00:38:25'),
	(3, 3, 2, 0, '2015-04-14 14:28:44'),
	(3, 3, 3, 0, '2015-04-14 15:05:26'),
	(3, 4, 2, 0, '2015-04-14 14:28:44'),
	(3, 4, 3, 0, '2015-04-14 15:05:27'),
	(4, 2, 2, 0, '2015-04-14 14:28:43'),
	(4, 2, 3, 0, '2015-04-14 15:05:26'),
	(4, 4, 2, 1, '2015-04-14 14:28:44'),
	(5, 1, 4, 1, '2015-04-15 00:38:24'),
	(5, 2, 4, 0, '2015-04-15 00:38:25'),
	(5, 3, 4, 0, '2015-04-15 00:38:25'),
	(5, 3, 5, 0, '2015-04-15 07:02:29'),
	(5, 4, 4, 1, '2015-04-15 00:38:26'),
	(6, 1, 5, 1, '2015-04-15 07:02:29'),
	(6, 2, 5, 0, '2015-04-15 07:02:29'),
	(7, 4, 5, 0, '2015-04-15 07:02:30');
/*!40000 ALTER TABLE `enroll` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.file_design
CREATE TABLE IF NOT EXISTS `file_design` (
  `RAB_DESIGN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `RAB_ID` int(11) DEFAULT NULL,
  `RAB_DESIGN_NAME` varchar(1000) DEFAULT NULL,
  `RAB_DESIGN_URL` varchar(2000) DEFAULT NULL,
  `RAB_DESIGN_DESC` text,
  PRIMARY KEY (`RAB_DESIGN_ID`),
  KEY `FK_RELATIONSHIP_35` (`RAB_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.file_design: ~0 rows (approximately)
DELETE FROM `file_design`;
/*!40000 ALTER TABLE `file_design` DISABLE KEYS */;
/*!40000 ALTER TABLE `file_design` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.gudangxbarang
CREATE TABLE IF NOT EXISTS `gudangxbarang` (
  `GUDANG_ID` int(11) NOT NULL,
  `BARANG_ID` int(11) NOT NULL,
  `STOK_GUDANGXBARANG` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`GUDANG_ID`,`BARANG_ID`),
  KEY `FK_RELATIONSHIP_53` (`BARANG_ID`),
  CONSTRAINT `FK_RELATIONSHIP_52` FOREIGN KEY (`GUDANG_ID`) REFERENCES `master_gudang` (`GUDANG_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_RELATIONSHIP_53` FOREIGN KEY (`BARANG_ID`) REFERENCES `master_barang` (`BARANG_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.gudangxbarang: ~0 rows (approximately)
DELETE FROM `gudangxbarang`;
/*!40000 ALTER TABLE `gudangxbarang` DISABLE KEYS */;
/*!40000 ALTER TABLE `gudangxbarang` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.hak_akses
CREATE TABLE IF NOT EXISTS `hak_akses` (
  `ROLE_ID` int(11) NOT NULL,
  `TIPE_ID` int(11) NOT NULL,
  `MODULES_ID` int(11) NOT NULL,
  PRIMARY KEY (`ROLE_ID`,`MODULES_ID`,`TIPE_ID`),
  KEY `FK_RELATIONSHIP_7` (`MODULES_ID`),
  CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`ROLE_ID`) REFERENCES `roles` (`ROLE_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`MODULES_ID`) REFERENCES `modules` (`MODULES_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.hak_akses: ~547 rows (approximately)
DELETE FROM `hak_akses`;
/*!40000 ALTER TABLE `hak_akses` DISABLE KEYS */;
INSERT INTO `hak_akses` (`ROLE_ID`, `TIPE_ID`, `MODULES_ID`) VALUES
	(1, -1, 1),
	(2, -1, 1),
	(3, -1, 1),
	(4, -1, 1),
	(5, -1, 1),
	(6, -1, 1),
	(7, -1, 1),
	(8, -1, 1),
	(9, -1, 1),
	(10, -1, 1),
	(11, -1, 1),
	(1, -1, 2),
	(2, -1, 2),
	(3, -1, 2),
	(4, -1, 2),
	(5, -1, 2),
	(6, -1, 2),
	(7, -1, 2),
	(8, -1, 2),
	(9, -1, 2),
	(10, -1, 2),
	(11, -1, 2),
	(1, -1, 3),
	(2, -1, 3),
	(3, -1, 3),
	(4, -1, 3),
	(5, -1, 3),
	(6, -1, 3),
	(7, -1, 3),
	(8, -1, 3),
	(9, -1, 3),
	(10, -1, 3),
	(11, -1, 3),
	(1, -1, 4),
	(2, -1, 4),
	(3, -1, 4),
	(4, -1, 4),
	(5, -1, 4),
	(6, -1, 4),
	(7, -1, 4),
	(8, -1, 4),
	(9, -1, 4),
	(10, -1, 4),
	(11, -1, 4),
	(1, -1, 5),
	(2, -1, 5),
	(3, -1, 5),
	(4, -1, 5),
	(5, -1, 5),
	(6, -1, 5),
	(7, -1, 5),
	(8, -1, 5),
	(9, -1, 5),
	(10, -1, 5),
	(11, -1, 5),
	(1, -1, 6),
	(2, -1, 6),
	(3, -1, 6),
	(4, -1, 6),
	(5, -1, 6),
	(6, -1, 6),
	(7, -1, 6),
	(8, -1, 6),
	(9, -1, 6),
	(10, -1, 6),
	(11, -1, 6),
	(1, -1, 7),
	(2, -1, 7),
	(3, -1, 7),
	(4, -1, 7),
	(5, -1, 7),
	(6, -1, 7),
	(7, -1, 7),
	(8, -1, 7),
	(9, -1, 7),
	(10, -1, 7),
	(11, -1, 7),
	(1, -1, 8),
	(2, -1, 8),
	(3, -1, 8),
	(4, -1, 8),
	(5, -1, 8),
	(6, -1, 8),
	(7, -1, 8),
	(8, -1, 8),
	(9, -1, 8),
	(10, -1, 8),
	(11, -1, 8),
	(1, -1, 9),
	(2, -1, 9),
	(3, -1, 9),
	(4, -1, 9),
	(5, -1, 9),
	(6, -1, 9),
	(7, -1, 9),
	(8, -1, 9),
	(9, -1, 9),
	(10, -1, 9),
	(11, -1, 9),
	(1, -1, 10),
	(2, -1, 10),
	(3, -1, 10),
	(4, -1, 10),
	(5, -1, 10),
	(6, -1, 10),
	(7, -1, 10),
	(8, -1, 10),
	(9, -1, 10),
	(10, -1, 10),
	(11, -1, 10),
	(1, -1, 11),
	(2, -1, 11),
	(3, -1, 11),
	(4, -1, 11),
	(5, -1, 11),
	(6, -1, 11),
	(7, -1, 11),
	(8, -1, 11),
	(9, -1, 11),
	(10, -1, 11),
	(11, -1, 11),
	(1, -1, 12),
	(2, -1, 12),
	(3, -1, 12),
	(4, -1, 12),
	(5, -1, 12),
	(6, -1, 12),
	(7, -1, 12),
	(8, -1, 12),
	(9, -1, 12),
	(10, -1, 12),
	(11, -1, 12),
	(1, -1, 13),
	(2, -1, 13),
	(3, -1, 13),
	(4, -1, 13),
	(5, -1, 13),
	(6, -1, 13),
	(7, -1, 13),
	(8, -1, 13),
	(9, -1, 13),
	(10, -1, 13),
	(11, -1, 13),
	(1, -1, 14),
	(2, -1, 14),
	(3, -1, 14),
	(4, -1, 14),
	(5, -1, 14),
	(6, -1, 14),
	(7, -1, 14),
	(8, -1, 14),
	(9, -1, 14),
	(10, -1, 14),
	(11, -1, 14),
	(1, -1, 15),
	(2, -1, 15),
	(3, -1, 15),
	(4, -1, 15),
	(5, -1, 15),
	(6, -1, 15),
	(7, -1, 15),
	(8, -1, 15),
	(9, -1, 15),
	(10, -1, 15),
	(11, -1, 15),
	(1, -1, 16),
	(2, -1, 16),
	(3, -1, 16),
	(4, -1, 16),
	(5, -1, 16),
	(6, -1, 16),
	(7, -1, 16),
	(8, -1, 16),
	(9, -1, 16),
	(10, -1, 16),
	(11, -1, 16),
	(1, -1, 17),
	(2, -1, 17),
	(3, -1, 17),
	(4, -1, 17),
	(5, -1, 17),
	(6, -1, 17),
	(7, -1, 17),
	(8, -1, 17),
	(9, -1, 17),
	(10, -1, 17),
	(11, -1, 17),
	(1, -1, 18),
	(2, -1, 18),
	(3, -1, 18),
	(4, -1, 18),
	(5, -1, 18),
	(6, -1, 18),
	(7, -1, 18),
	(8, -1, 18),
	(9, -1, 18),
	(10, -1, 18),
	(11, -1, 18),
	(1, -1, 19),
	(2, -1, 19),
	(3, -1, 19),
	(4, -1, 19),
	(5, -1, 19),
	(6, -1, 19),
	(7, -1, 19),
	(8, -1, 19),
	(9, -1, 19),
	(10, -1, 19),
	(11, -1, 19),
	(1, -1, 20),
	(2, -1, 20),
	(3, -1, 20),
	(4, -1, 20),
	(5, -1, 20),
	(6, -1, 20),
	(7, -1, 20),
	(8, -1, 20),
	(9, -1, 20),
	(10, -1, 20),
	(11, -1, 20),
	(1, -1, 21),
	(2, -1, 21),
	(3, -1, 21),
	(4, -1, 21),
	(5, -1, 21),
	(6, -1, 21),
	(7, -1, 21),
	(8, -1, 21),
	(9, -1, 21),
	(10, -1, 21),
	(11, -1, 21),
	(1, -1, 22),
	(2, -1, 22),
	(3, -1, 22),
	(4, -1, 22),
	(5, -1, 22),
	(6, -1, 22),
	(7, -1, 22),
	(8, -1, 22),
	(9, -1, 22),
	(10, -1, 22),
	(11, -1, 22),
	(1, -1, 23),
	(2, -1, 23),
	(3, -1, 23),
	(4, -1, 23),
	(5, -1, 23),
	(6, -1, 23),
	(7, -1, 23),
	(8, -1, 23),
	(9, -1, 23),
	(10, -1, 23),
	(11, -1, 23),
	(1, -1, 24),
	(2, -1, 24),
	(3, -1, 24),
	(4, -1, 24),
	(5, -1, 24),
	(6, -1, 24),
	(7, -1, 24),
	(8, -1, 24),
	(9, -1, 24),
	(10, -1, 24),
	(11, -1, 24),
	(1, -1, 25),
	(2, -1, 25),
	(3, -1, 25),
	(4, -1, 25),
	(5, -1, 25),
	(6, -1, 25),
	(7, -1, 25),
	(8, -1, 25),
	(9, -1, 25),
	(10, -1, 25),
	(11, -1, 25),
	(1, -1, 26),
	(2, -1, 26),
	(3, -1, 26),
	(4, -1, 26),
	(5, -1, 26),
	(6, -1, 26),
	(7, -1, 26),
	(8, -1, 26),
	(9, -1, 26),
	(10, -1, 26),
	(11, -1, 26),
	(1, -1, 27),
	(2, -1, 27),
	(3, -1, 27),
	(4, -1, 27),
	(5, -1, 27),
	(6, -1, 27),
	(7, -1, 27),
	(8, -1, 27),
	(9, -1, 27),
	(10, -1, 27),
	(11, -1, 27),
	(1, -1, 28),
	(2, -1, 28),
	(3, -1, 28),
	(4, -1, 28),
	(5, -1, 28),
	(6, -1, 28),
	(7, -1, 28),
	(8, -1, 28),
	(9, -1, 28),
	(10, -1, 28),
	(11, -1, 28),
	(1, -1, 29),
	(2, -1, 29),
	(3, -1, 29),
	(4, -1, 29),
	(5, -1, 29),
	(6, -1, 29),
	(7, -1, 29),
	(8, -1, 29),
	(9, -1, 29),
	(10, -1, 29),
	(11, -1, 29),
	(1, -1, 30),
	(2, -1, 30),
	(3, -1, 30),
	(4, -1, 30),
	(5, -1, 30),
	(6, -1, 30),
	(7, -1, 30),
	(8, -1, 30),
	(9, -1, 30),
	(10, -1, 30),
	(11, -1, 30),
	(1, -1, 31),
	(2, -1, 31),
	(3, -1, 31),
	(4, -1, 31),
	(5, -1, 31),
	(6, -1, 31),
	(7, -1, 31),
	(8, -1, 31),
	(9, -1, 31),
	(10, -1, 31),
	(11, -1, 31),
	(1, -1, 32),
	(2, -1, 32),
	(3, -1, 32),
	(4, -1, 32),
	(5, -1, 32),
	(6, -1, 32),
	(7, -1, 32),
	(8, -1, 32),
	(9, -1, 32),
	(10, -1, 32),
	(11, -1, 32),
	(1, -1, 33),
	(2, -1, 33),
	(3, -1, 33),
	(4, -1, 33),
	(5, -1, 33),
	(6, -1, 33),
	(7, -1, 33),
	(8, -1, 33),
	(9, -1, 33),
	(10, -1, 33),
	(11, -1, 33),
	(1, -1, 34),
	(2, -1, 34),
	(3, -1, 34),
	(4, -1, 34),
	(5, -1, 34),
	(6, -1, 34),
	(7, -1, 34),
	(8, -1, 34),
	(9, -1, 34),
	(10, -1, 34),
	(11, -1, 34),
	(1, -1, 35),
	(2, -1, 35),
	(3, -1, 35),
	(4, -1, 35),
	(5, -1, 35),
	(6, -1, 35),
	(7, -1, 35),
	(8, -1, 35),
	(9, -1, 35),
	(10, -1, 35),
	(11, -1, 35),
	(1, -1, 36),
	(2, -1, 36),
	(3, -1, 36),
	(4, -1, 36),
	(5, -1, 36),
	(6, -1, 36),
	(7, -1, 36),
	(8, -1, 36),
	(9, -1, 36),
	(10, -1, 36),
	(11, -1, 36),
	(1, -1, 37),
	(2, -1, 37),
	(3, -1, 37),
	(4, -1, 37),
	(5, -1, 37),
	(6, -1, 37),
	(7, -1, 37),
	(8, -1, 37),
	(9, -1, 37),
	(10, -1, 37),
	(11, -1, 37),
	(1, 0, 38),
	(2, -1, 38),
	(3, -1, 38),
	(4, -1, 38),
	(5, -1, 38),
	(6, -1, 38),
	(7, -1, 38),
	(8, -1, 38),
	(9, -1, 38),
	(10, -1, 38),
	(11, -1, 38),
	(1, 0, 39),
	(2, -1, 39),
	(3, -1, 39),
	(4, -1, 39),
	(5, -1, 39),
	(6, -1, 39),
	(7, -1, 39),
	(8, -1, 39),
	(9, -1, 39),
	(10, -1, 39),
	(11, -1, 39),
	(1, 0, 41),
	(2, -1, 41),
	(3, -1, 41),
	(4, -1, 41),
	(5, -1, 41),
	(6, -1, 41),
	(7, -1, 41),
	(8, -1, 41),
	(9, -1, 41),
	(10, -1, 41),
	(11, -1, 41),
	(1, 0, 42),
	(2, -1, 42),
	(3, -1, 42),
	(4, -1, 42),
	(5, -1, 42),
	(6, -1, 42),
	(7, -1, 42),
	(8, -1, 42),
	(9, -1, 42),
	(10, -1, 42),
	(11, -1, 42),
	(1, 0, 43),
	(2, -1, 43),
	(3, -1, 43),
	(4, -1, 43),
	(5, -1, 43),
	(6, -1, 43),
	(7, -1, 43),
	(8, -1, 43),
	(9, -1, 43),
	(10, -1, 43),
	(11, -1, 43),
	(1, 0, 44),
	(2, -1, 44),
	(3, -1, 44),
	(4, -1, 44),
	(5, -1, 44),
	(6, -1, 44),
	(7, -1, 44),
	(8, -1, 44),
	(9, -1, 44),
	(10, -1, 44),
	(11, -1, 44),
	(1, 0, 45),
	(2, -1, 45),
	(3, -1, 45),
	(4, -1, 45),
	(5, -1, 45),
	(6, -1, 45),
	(7, -1, 45),
	(8, -1, 45),
	(9, -1, 45),
	(10, -1, 45),
	(11, -1, 45),
	(1, 0, 46),
	(2, -1, 46),
	(3, 0, 46),
	(4, -1, 46),
	(5, -1, 46),
	(6, 0, 46),
	(7, -1, 46),
	(8, -1, 46),
	(9, -1, 46),
	(10, -1, 46),
	(11, -1, 46),
	(1, 0, 47),
	(2, -1, 47),
	(3, 0, 47),
	(4, -1, 47),
	(5, -1, 47),
	(6, 0, 47),
	(7, -1, 47),
	(8, -1, 47),
	(9, 0, 47),
	(10, -1, 47),
	(11, 0, 47),
	(1, 0, 48),
	(2, -1, 48),
	(3, -1, 48),
	(4, -1, 48),
	(5, -1, 48),
	(6, -1, 48),
	(7, 0, 48),
	(8, -1, 48),
	(9, -1, 48),
	(10, -1, 48),
	(11, -1, 48),
	(1, 0, 49),
	(2, -1, 49),
	(3, 0, 49),
	(4, -1, 49),
	(5, -1, 49),
	(6, -1, 49),
	(7, -1, 49),
	(8, 0, 49),
	(9, -1, 49),
	(10, -1, 49),
	(11, -1, 49),
	(1, 0, 50),
	(2, -1, 50),
	(3, 0, 50),
	(4, -1, 50),
	(5, -1, 50),
	(6, -1, 50),
	(7, -1, 50),
	(8, -1, 50),
	(9, 0, 50),
	(10, -1, 50),
	(11, 0, 50),
	(1, 0, 51),
	(2, -1, 51),
	(3, -1, 51),
	(4, -1, 51),
	(5, -1, 51),
	(6, -1, 51),
	(7, 0, 51),
	(8, -1, 51),
	(9, -1, 51),
	(10, -1, 51),
	(11, -1, 51),
	(1, -1, 52),
	(2, -1, 52),
	(3, -1, 52),
	(4, -1, 52),
	(5, -1, 52),
	(6, -1, 52),
	(7, -1, 52),
	(8, -1, 52),
	(9, 0, 52),
	(10, -1, 52),
	(11, -1, 52),
	(1, 0, 53),
	(2, -1, 53),
	(3, 0, 53),
	(4, -1, 53),
	(5, -1, 53),
	(6, -1, 53),
	(7, -1, 53),
	(8, -1, 53),
	(9, -1, 53),
	(10, -1, 53),
	(11, 0, 53),
	(1, 0, 54),
	(2, -1, 54),
	(3, -1, 54),
	(4, -1, 54),
	(5, -1, 54),
	(6, -1, 54),
	(7, -1, 54),
	(8, -1, 54),
	(9, -1, 54),
	(10, -1, 54),
	(11, 0, 54),
	(1, 0, 55),
	(2, -1, 55),
	(3, 0, 55),
	(4, -1, 55),
	(5, -1, 55),
	(6, -1, 55),
	(7, -1, 55),
	(8, -1, 55),
	(9, 0, 55),
	(10, -1, 55),
	(11, 0, 55),
	(1, 0, 56),
	(2, -1, 56),
	(3, -1, 56),
	(4, -1, 56),
	(5, -1, 56),
	(6, -1, 56),
	(7, -1, 56),
	(8, -1, 56),
	(9, 0, 56),
	(10, -1, 56),
	(11, 0, 56),
	(1, 0, 57),
	(2, -1, 57),
	(3, 0, 57),
	(4, -1, 57),
	(5, -1, 57),
	(6, -1, 57),
	(7, -1, 57),
	(8, -1, 57),
	(9, -1, 57),
	(10, -1, 57),
	(11, 0, 57),
	(1, 0, 58),
	(2, -1, 58),
	(3, -1, 58),
	(4, -1, 58),
	(5, -1, 58),
	(6, -1, 58),
	(7, -1, 58),
	(8, -1, 58),
	(9, -1, 58),
	(10, 0, 58),
	(11, 0, 58),
	(1, -1, 59),
	(2, -1, 59),
	(3, -1, 59),
	(4, -1, 59),
	(5, -1, 59),
	(6, -1, 59),
	(7, -1, 59),
	(8, -1, 59),
	(9, -1, 59),
	(10, -1, 59),
	(11, -1, 59),
	(1, -1, 60),
	(2, -1, 60),
	(3, -1, 60),
	(4, -1, 60),
	(5, -1, 60),
	(6, -1, 60),
	(7, -1, 60),
	(8, -1, 60),
	(9, -1, 60),
	(10, -1, 60),
	(11, -1, 60),
	(1, -1, 61),
	(2, -1, 61),
	(3, -1, 61),
	(4, -1, 61),
	(5, -1, 61),
	(6, -1, 61),
	(7, -1, 61),
	(8, -1, 61),
	(9, -1, 61),
	(10, -1, 61),
	(11, -1, 61),
	(1, -1, 62),
	(2, -1, 62),
	(3, -1, 62),
	(4, -1, 62),
	(5, -1, 62),
	(6, -1, 62),
	(7, -1, 62),
	(8, -1, 62),
	(9, -1, 62),
	(10, -1, 62),
	(11, -1, 62),
	(1, -1, 63),
	(2, -1, 63),
	(3, -1, 63),
	(4, -1, 63),
	(5, -1, 63),
	(6, -1, 63),
	(7, -1, 63),
	(8, -1, 63),
	(9, -1, 63),
	(10, -1, 63),
	(11, -1, 63),
	(1, -1, 64),
	(2, -1, 64),
	(3, -1, 64),
	(4, -1, 64),
	(5, -1, 64),
	(6, -1, 64),
	(7, -1, 64),
	(8, -1, 64),
	(9, -1, 64),
	(10, -1, 64),
	(11, -1, 64);
/*!40000 ALTER TABLE `hak_akses` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.hutang_barang
CREATE TABLE IF NOT EXISTS `hutang_barang` (
  `HUTANG_BARANG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `HUTANG_BARANG_KODE` varchar(50) DEFAULT NULL,
  `TANGGAL_TRANSAKSI_HM` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `PETUGAS_ID` int(11) DEFAULT NULL,
  `VALIDATOR_ID` int(11) DEFAULT NULL,
  `RAB_PENERIMA` int(11) DEFAULT '0',
  `RAB_PEMBERI` int(11) DEFAULT '0',
  `TANGGAL_MULAI_HUTANG` timestamp NULL DEFAULT NULL,
  `TANGGAL_PREDIKSI_KEMBALI` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`HUTANG_BARANG_ID`),
  KEY `RAB_PEMBERI_FK` (`RAB_PEMBERI`),
  KEY `RAB_PENERIMA_FK` (`RAB_PENERIMA`),
  KEY `FK_PETUGAS_ID` (`PETUGAS_ID`),
  KEY `FK_VALIDATOR` (`VALIDATOR_ID`),
  CONSTRAINT `FK_PETUGAS_ID` FOREIGN KEY (`PETUGAS_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`),
  CONSTRAINT `FK_VALIDATOR` FOREIGN KEY (`VALIDATOR_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table yang mengakomdasi penyimpanan data dari fungsi HUTANG ';

-- Dumping data for table kztszete_pm.hutang_barang: ~0 rows (approximately)
DELETE FROM `hutang_barang`;
/*!40000 ALTER TABLE `hutang_barang` DISABLE KEYS */;
/*!40000 ALTER TABLE `hutang_barang` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.invoice
CREATE TABLE IF NOT EXISTS `invoice` (
  `INVOICE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LPB_ID` int(11) DEFAULT NULL,
  `TANGGAL_TRANSAKSI` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TOTAL_HARGA_INVOICE` varchar(50) NOT NULL DEFAULT '0',
  `PETUGAS_ID` int(11) NOT NULL DEFAULT '0',
  `VALIDATION_ID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`INVOICE_ID`),
  KEY `FK_LPB_ID_1` (`LPB_ID`),
  KEY `FK2_PETUGAS_ID_INV` (`PETUGAS_ID`),
  KEY `FK3_VALIDATION_ID` (`VALIDATION_ID`),
  CONSTRAINT `FK2_PETUGAS_ID_INV` FOREIGN KEY (`PETUGAS_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`),
  CONSTRAINT `FK3_VALIDATION_ID` FOREIGN KEY (`VALIDATION_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`),
  CONSTRAINT `FK_LPB_ID_1` FOREIGN KEY (`LPB_ID`) REFERENCES `penerimaan_barang` (`PENERIMAAN_BARANG_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Invoice mengakomodasi data-data Invoice dari LPB';

-- Dumping data for table kztszete_pm.invoice: ~0 rows (approximately)
DELETE FROM `invoice`;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.kategori_analisa
CREATE TABLE IF NOT EXISTS `kategori_analisa` (
  `KATEGORI_ANALISA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `KATEGORI_ANALISA_NAMA` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`KATEGORI_ANALISA_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.kategori_analisa: ~2 rows (approximately)
DELETE FROM `kategori_analisa`;
/*!40000 ALTER TABLE `kategori_analisa` DISABLE KEYS */;
INSERT INTO `kategori_analisa` (`KATEGORI_ANALISA_ID`, `KATEGORI_ANALISA_NAMA`) VALUES
	(1, 'MAINTENANCE'),
	(2, 'PEMBANGUNAN');
/*!40000 ALTER TABLE `kategori_analisa` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.kategori_barang
CREATE TABLE IF NOT EXISTS `kategori_barang` (
  `KATEGORI_BARANG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `KATEGORI_BARANG_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`KATEGORI_BARANG_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.kategori_barang: ~1 rows (approximately)
DELETE FROM `kategori_barang`;
/*!40000 ALTER TABLE `kategori_barang` DISABLE KEYS */;
INSERT INTO `kategori_barang` (`KATEGORI_BARANG_ID`, `KATEGORI_BARANG_NAMA`) VALUES
	(1, 'Bahan Konstruksi');
/*!40000 ALTER TABLE `kategori_barang` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.kategori_pajak
CREATE TABLE IF NOT EXISTS `kategori_pajak` (
  `KATEGORI_PAJAK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `KATEGORI_PAJAK_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`KATEGORI_PAJAK_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.kategori_pajak: ~3 rows (approximately)
DELETE FROM `kategori_pajak`;
/*!40000 ALTER TABLE `kategori_pajak` DISABLE KEYS */;
INSERT INTO `kategori_pajak` (`KATEGORI_PAJAK_ID`, `KATEGORI_PAJAK_NAMA`) VALUES
	(1, 'Include'),
	(2, 'Exclude'),
	(3, 'No Tax');
/*!40000 ALTER TABLE `kategori_pajak` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.kategori_paket_pekerjaan
CREATE TABLE IF NOT EXISTS `kategori_paket_pekerjaan` (
  `KATEGORI_PEKERJAAN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `KATEGORI_PEKERJAAN_NAMA` varchar(100) DEFAULT NULL,
  `KATEGORI_PEKERJAAN_URUTAN` int(11) DEFAULT NULL,
  PRIMARY KEY (`KATEGORI_PEKERJAAN_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.kategori_paket_pekerjaan: ~90 rows (approximately)
DELETE FROM `kategori_paket_pekerjaan`;
/*!40000 ALTER TABLE `kategori_paket_pekerjaan` DISABLE KEYS */;
INSERT INTO `kategori_paket_pekerjaan` (`KATEGORI_PEKERJAAN_ID`, `KATEGORI_PEKERJAAN_NAMA`, `KATEGORI_PEKERJAAN_URUTAN`) VALUES
	(1, 'KATEGORI A', 1),
	(2, 'KATEGORI B', 2),
	(3, 'PEKERJAAN PERSIAPAN', 1),
	(4, 'PEKERJAAN GALIAN', 2),
	(5, 'PEKERJAAN BATU BATA', 3),
	(6, 'PEKERJAAN PERSIAPAN', 1),
	(7, 'PEKERJAAN GALIAN', 2),
	(8, 'PEKERJAAN BATU BATA', 3),
	(9, 'PEKERJAAN PERSIAPAN', 1),
	(10, 'PEKERJAAN PONDASI', 2),
	(11, 'KATEGORI A', 1),
	(12, 'KATEGORI B', 2),
	(13, 'KATEGORI A', 1),
	(14, 'KATEGORI B', 2),
	(15, 'KATEGORI A', 1),
	(16, 'KATEGORI B', 2),
	(17, 'KATEGORI A', 1),
	(18, 'KATEGORI B', 2),
	(19, 'PEKERJAAN PERSIAPAN', 1),
	(20, 'PEKERJAAN PONDASI', 2),
	(21, 'PEKERJAAN BANGUNAN', 3),
	(22, 'PEKERJAAN FINISHING', 4),
	(23, 'PEKERJAAN TAMBAHAN', 5),
	(24, 'PEKERJAAN PERSIAPAN', 1),
	(25, 'PEKERJAAN PONDASI', 2),
	(26, 'PEKERJAAN BANGUNAN', 3),
	(27, 'PEKERJAAN FINISHING', 4),
	(28, 'PEKERJAAN TAMBAHAN', 5),
	(29, 'KATEGORI A', 1),
	(30, 'KATEGORI B', 2),
	(31, 'PEKERJAAN PERSIAPAN', 1),
	(32, 'PEKERJAAN GALIAN', 2),
	(33, 'PEKERJAAN BATU BATA', 3),
	(34, NULL, 1),
	(35, NULL, 2),
	(36, NULL, 3),
	(37, NULL, 4),
	(38, NULL, 5),
	(39, NULL, 6),
	(40, NULL, 7),
	(41, 'KATEGORI A', 1),
	(42, 'KATEGORI B', 2),
	(43, 'KATEGORI A', 1),
	(44, 'KATEGORI B', 2),
	(45, 'KATEGORI A', 1),
	(46, 'KATEGORI B', 2),
	(47, 'PEKERJAAN PERSIAPAN', 1),
	(48, 'PEKERJAAN PONDASI', 2),
	(49, 'PERSIAPAN', 1),
	(50, 'PONDASI', 2),
	(51, 'PEMBANGUNAN INTI', 3),
	(52, 'PEMASANGAN TORNADO', 4),
	(53, 'PEMBERSIHAN', 5),
	(54, 'PERSIAPAN', 1),
	(55, 'PERSIAPAN', 1),
	(56, 'PONDASI', 2),
	(57, 'PEMBANGUNAN', 3),
	(58, 'PERSIAPAN', 1),
	(59, 'PONDASI', 2),
	(60, 'PEMBANGUNAN', 3),
	(61, 'PEMBERSIHAN', 4),
	(62, 'PERSIAPAN', 1),
	(63, 'PONDASI', 2),
	(64, 'BANGUNAN', 3),
	(65, NULL, 1),
	(66, NULL, 1),
	(67, NULL, 1),
	(68, NULL, 1),
	(69, 'KATEGORI A', 1),
	(70, 'KATEGORI A', 1),
	(71, 'PERSIAPAN', 1),
	(72, 'PONDASI', 2),
	(73, 'BANGUNAN', 3),
	(74, 'PERSIAPAN', 1),
	(75, 'PONDASI', 2),
	(76, 'BANGUNAN', 3),
	(77, 'PERSIAPAN', 1),
	(78, 'PEKERJAAN TANAH', 2),
	(79, 'PEKERJAAN PONDASI', 3),
	(80, 'PEKERJAAN LANTAI', 4),
	(81, 'PEKERJAAN PASANGAN', 5),
	(82, 'PERSIAPAN', 1),
	(83, 'PONDASI', 2),
	(84, 'BANGUNAN', 3),
	(85, 'PERSIAPAN', 1),
	(86, 'PONDASI', 2),
	(87, 'BANGUNAN', 3),
	(88, 'PERSIAPAN', 1),
	(89, 'PONDASI', 2),
	(90, 'BANGUNAN', 3);
/*!40000 ALTER TABLE `kategori_paket_pekerjaan` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.kategori_pk
CREATE TABLE IF NOT EXISTS `kategori_pk` (
  `KATEGORI_PK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `KATEGORI_PK_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`KATEGORI_PK_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.kategori_pk: ~2 rows (approximately)
DELETE FROM `kategori_pk`;
/*!40000 ALTER TABLE `kategori_pk` DISABLE KEYS */;
INSERT INTO `kategori_pk` (`KATEGORI_PK_ID`, `KATEGORI_PK_NAMA`) VALUES
	(1, 'Overhead'),
	(2, 'Upah');
/*!40000 ALTER TABLE `kategori_pk` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.kategori_po
CREATE TABLE IF NOT EXISTS `kategori_po` (
  `KATEGORI_PO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `KATEGORI_PO_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`KATEGORI_PO_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.kategori_po: ~2 rows (approximately)
DELETE FROM `kategori_po`;
/*!40000 ALTER TABLE `kategori_po` DISABLE KEYS */;
INSERT INTO `kategori_po` (`KATEGORI_PO_ID`, `KATEGORI_PO_NAMA`) VALUES
	(1, 'Overhead'),
	(2, 'Bahan');
/*!40000 ALTER TABLE `kategori_po` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.kategori_pp
CREATE TABLE IF NOT EXISTS `kategori_pp` (
  `KATEGORI_PP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `KATEGORI_PP_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`KATEGORI_PP_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.kategori_pp: ~2 rows (approximately)
DELETE FROM `kategori_pp`;
/*!40000 ALTER TABLE `kategori_pp` DISABLE KEYS */;
INSERT INTO `kategori_pp` (`KATEGORI_PP_ID`, `KATEGORI_PP_NAMA`) VALUES
	(1, 'Overhead'),
	(2, 'Bahan');
/*!40000 ALTER TABLE `kategori_pp` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.kategori_supplier
CREATE TABLE IF NOT EXISTS `kategori_supplier` (
  `KATEGORI_SUPPLIER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `KATEGORI_SUPPLIER_NAMA` varchar(100) DEFAULT NULL,
  `KATEGORI_SUPPLIER_ACTIVE` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`KATEGORI_SUPPLIER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.kategori_supplier: ~4 rows (approximately)
DELETE FROM `kategori_supplier`;
/*!40000 ALTER TABLE `kategori_supplier` DISABLE KEYS */;
INSERT INTO `kategori_supplier` (`KATEGORI_SUPPLIER_ID`, `KATEGORI_SUPPLIER_NAMA`, `KATEGORI_SUPPLIER_ACTIVE`) VALUES
	(1, 'Kategori A', 0),
	(2, 'Supplier Semen', 0),
	(3, 'Supplier Bahan Bangunan', 1),
	(4, 'Supplier Bahan Besi', 1);
/*!40000 ALTER TABLE `kategori_supplier` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.kembali_barang
CREATE TABLE IF NOT EXISTS `kembali_barang` (
  `KEMBALI_BARANG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `KEMBALI_BARANG_KODE` varchar(50) NOT NULL,
  `TANGGAL_TRANSAKSI` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `HM_ID` int(11) NOT NULL,
  `PETUGAS_ID` int(11) NOT NULL,
  `VALIDATOR_ID` int(11) NOT NULL,
  PRIMARY KEY (`KEMBALI_BARANG_ID`),
  KEY `FK_HMID` (`HM_ID`),
  KEY `FK2_PETUGAS` (`PETUGAS_ID`),
  KEY `FK3_VALIDATOR` (`VALIDATOR_ID`),
  CONSTRAINT `FK2_PETUGAS` FOREIGN KEY (`PETUGAS_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`),
  CONSTRAINT `FK3_VALIDATOR` FOREIGN KEY (`VALIDATOR_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`),
  CONSTRAINT `FK_HMID` FOREIGN KEY (`HM_ID`) REFERENCES `hutang_barang` (`HUTANG_BARANG_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='kembali barang mengakomodasi fitur PENGEMBALIAN_MATERIAL (PM';

-- Dumping data for table kztszete_pm.kembali_barang: ~0 rows (approximately)
DELETE FROM `kembali_barang`;
/*!40000 ALTER TABLE `kembali_barang` DISABLE KEYS */;
/*!40000 ALTER TABLE `kembali_barang` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.log_activity
CREATE TABLE IF NOT EXISTS `log_activity` (
  `LOG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LOG_NAME` varchar(1000) DEFAULT NULL,
  `LOG_USER` varchar(100) DEFAULT NULL,
  `LOG_MENU` varchar(100) DEFAULT NULL,
  `LOG_COMMAND` varchar(100) DEFAULT NULL,
  `LOG_MODEL` varchar(100) DEFAULT NULL,
  `LOG_DETAIL` text,
  `LOG_KEY` text,
  `LOG_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`LOG_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2390 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.log_activity: 2.324 rows
DELETE FROM `log_activity`;
/*!40000 ALTER TABLE `log_activity` DISABLE KEYS */;
INSERT INTO `log_activity` (`LOG_ID`, `LOG_NAME`, `LOG_USER`, `LOG_MENU`, `LOG_COMMAND`, `LOG_MODEL`, `LOG_DETAIL`, `LOG_KEY`, `LOG_DATE`) VALUES
	(66, 'Administrator', 'administrator', 'user-management/departemen/save', 'insert', 'departemen', '{"DEPARTEMEN_NAMA":"Perencanaan","DEPARTEMEN_ACTIVE":1}', NULL, '2015-04-07 15:01:54'),
	(67, 'Administrator', 'administrator', 'user-management/departemen/save', 'insert', 'departemen', '{"DEPARTEMEN_NAMA":"Perencanaan","DEPARTEMEN_ACTIVE":1}', NULL, '2015-04-07 15:01:55'),
	(68, 'Administrator', 'administrator', 'user-management/departemen/save', 'insert', 'departemen', '{"DEPARTEMEN_NAMA":"Pelaksanaan","DEPARTEMEN_ACTIVE":1}', NULL, '2015-04-07 15:02:11'),
	(69, 'Administrator', 'administrator', 'user-management/departemen/save', 'insert', 'departemen', '{"DEPARTEMEN_NAMA":"Pelaksanaan","DEPARTEMEN_ACTIVE":1}', NULL, '2015-04-07 15:02:11'),
	(70, 'Administrator', 'administrator', 'user-management/departemen/save', 'insert', 'departemen', '{"DEPARTEMEN_NAMA":"Monitoring","DEPARTEMEN_ACTIVE":1}', NULL, '2015-04-07 15:02:26'),
	(71, 'Administrator', 'administrator', 'user-management/departemen/save', 'insert', 'departemen', '{"DEPARTEMEN_NAMA":"Monitoring","DEPARTEMEN_ACTIVE":1}', NULL, '2015-04-07 15:02:27'),
	(72, 'Administrator', 'administrator', 'user-management/perusahaan/insert', 'insert', 'perusahaan', '{"PERUSAHAAN_NAMA":"STE","PERUSAHAAN_KODE":"STE01","PERUSAHAAN_EMAIL":"info@ste.com","PERUSAHAAN_ALAMAT":"Surabaya","PERUSAHAAN_TELP":"031 123456","PERUSAHAAN_ACTIVE":1}', NULL, '2015-04-07 15:06:47'),
	(73, 'Administrator', 'administrator', 'projects/mainproject/addNew', 'insert', 'main_project', '{"MAIN_PROJECT_NAMA":"THEME PARK WARU","MAIN_PROJECT_KODE":"PRO0001","MAIN_PROJECT_DESCRIPTION":"Sebuag proyek besar pembangunan wahana hiburan Surabaya-Sidoarjo","MAIN_PROJECT_ACTIVE":1,"PERUSAHAAN_ID":"3"}', NULL, '2015-04-07 15:09:09'),
	(74, 'Administrator', 'administrator', 'master/barang/delete', 'update', 'master_barang', '{"BARANG_ACTIVE":0}', '{"BARANG_ID":"93"}', '2015-04-07 15:21:31'),
	(75, 'Administrator', 'administrator', 'master/barang/delete', 'delete', 'master_barang', NULL, '{"BARANG_ID":"93"}', '2015-04-07 15:21:31'),
	(76, 'Administrator', 'administrator', 'master/upah/insert', 'insert', 'master_upah', '{"LOKASI_UPAH_ID":"1","SATUAN_UPAH_ID":"2","UPAH_KODE":"UPH0001","UPAH_HARGA":"15000","UPAH_NAMA":"Upah Kerja Borongan Pagar Sementara Dari Gedeg t. 2m"}', NULL, '2015-04-07 15:38:36'),
	(77, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'master_analisa', '{"SATUAN_NAMA":"M","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PRSP-0001","ANALISA_NAMA":"Pagar Sementara Dari Gedeg t. 2m","ANALISA_TOTAL":"185711.5","ANALISA_ACTIVE":1}', NULL, '2015-04-07 15:39:09'),
	(78, 'Administrator', 'administrator', 'rab/analisa/delete', 'update', 'master_analisa', '{"ANALISA_ACTIVE":0}', '{"ANALISA_ID":"20"}', '2015-04-07 15:50:56'),
	(79, 'Administrator', 'administrator', 'rab/analisa/delete', 'delete', 'master_analisa', NULL, '{"ANALISA_ID":"20"}', '2015-04-07 15:50:57'),
	(80, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'master_analisa', '{"SATUAN_NAMA":"M","KATEGORI_ANALISA_ID":"1","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PRSP-0001","ANALISA_NAMA":"Pagar Sementara Dari Gedeg t. 2m","ANALISA_TOTAL":"185711.5","ANALISA_ACTIVE":1}', NULL, '2015-04-07 15:55:34'),
	(81, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"77","ANALISA_ID":"21","DETAIL_ANALISA_KOEFISIEN":"1.350","DETAIL_ANALISA_HARGA":"19250","DETAIL_ANALISA_TOTAL":25987.5}', NULL, '2015-04-07 15:55:35'),
	(82, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"63","ANALISA_ID":"21","DETAIL_ANALISA_KOEFISIEN":"0.370","DETAIL_ANALISA_HARGA":"67500","DETAIL_ANALISA_TOTAL":24975}', NULL, '2015-04-07 15:55:35'),
	(83, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"23","ANALISA_ID":"21","DETAIL_ANALISA_KOEFISIEN":"0.054","DETAIL_ANALISA_HARGA":"11000","DETAIL_ANALISA_TOTAL":594}', NULL, '2015-04-07 15:55:36'),
	(84, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"117","ANALISA_ID":"21","DETAIL_ANALISA_KOEFISIEN":"2.150","DETAIL_ANALISA_HARGA":"54500","DETAIL_ANALISA_TOTAL":117175}', NULL, '2015-04-07 15:55:37'),
	(85, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"97","ANALISA_ID":"21","DETAIL_ANALISA_KOEFISIEN":"0.004","DETAIL_ANALISA_HARGA":"115000","DETAIL_ANALISA_TOTAL":460}', NULL, '2015-04-07 15:55:37'),
	(86, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"34","ANALISA_ID":"21","DETAIL_ANALISA_KOEFISIEN":"0.008","DETAIL_ANALISA_HARGA":"190000","DETAIL_ANALISA_TOTAL":1520}', NULL, '2015-04-07 15:55:38'),
	(87, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"32","ANALISA_ID":"21","DETAIL_ANALISA_KOEFISIEN":"1","DETAIL_ANALISA_HARGA":"15000","DETAIL_ANALISA_TOTAL":15000}', NULL, '2015-04-07 15:55:38'),
	(88, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'update', 'master_analisa', '{"SATUAN_NAMA":"M","KATEGORI_ANALISA_ID":"1","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PRSP-0001","ANALISA_NAMA":"Pagar Sementara Dari Gedeg t. 2m","ANALISA_TOTAL":"185711.5","ANALISA_ACTIVE":1}', '{"ANALISA_ID":"21"}', '2015-04-07 15:57:02'),
	(89, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'delete', 'detail_analisa', NULL, '{"ANALISA_ID":"21"}', '2015-04-07 15:57:03'),
	(90, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"77","ANALISA_ID":"21","DETAIL_ANALISA_KOEFISIEN":1.35,"DETAIL_ANALISA_HARGA":19250,"DETAIL_ANALISA_TOTAL":25987.5}', NULL, '2015-04-07 15:57:03'),
	(91, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"63","ANALISA_ID":"21","DETAIL_ANALISA_KOEFISIEN":0.37,"DETAIL_ANALISA_HARGA":67500,"DETAIL_ANALISA_TOTAL":24975}', NULL, '2015-04-07 15:57:04'),
	(92, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"23","ANALISA_ID":"21","DETAIL_ANALISA_KOEFISIEN":0.054,"DETAIL_ANALISA_HARGA":11000,"DETAIL_ANALISA_TOTAL":594}', NULL, '2015-04-07 15:57:04'),
	(93, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"117","ANALISA_ID":"21","DETAIL_ANALISA_KOEFISIEN":2.15,"DETAIL_ANALISA_HARGA":54500,"DETAIL_ANALISA_TOTAL":117175}', NULL, '2015-04-07 15:57:05'),
	(94, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"97","ANALISA_ID":"21","DETAIL_ANALISA_KOEFISIEN":0.004,"DETAIL_ANALISA_HARGA":115000,"DETAIL_ANALISA_TOTAL":460}', NULL, '2015-04-07 15:57:05'),
	(95, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"34","ANALISA_ID":"21","DETAIL_ANALISA_KOEFISIEN":0.008,"DETAIL_ANALISA_HARGA":190000,"DETAIL_ANALISA_TOTAL":1520}', NULL, '2015-04-07 15:57:06'),
	(96, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"32","ANALISA_ID":"21","DETAIL_ANALISA_KOEFISIEN":"1","DETAIL_ANALISA_HARGA":15000,"DETAIL_ANALISA_TOTAL":15000}', NULL, '2015-04-07 15:57:06'),
	(97, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'update', 'master_analisa', '{"SATUAN_NAMA":"M","KATEGORI_ANALISA_ID":"1","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PRSP-0001","ANALISA_NAMA":"Pagar Sementara Dari Gedeg t. 2m","ANALISA_TOTAL":"200711.5","ANALISA_ACTIVE":1}', '{"ANALISA_ID":"21"}', '2015-04-07 15:58:20'),
	(98, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'delete', 'detail_analisa', NULL, '{"ANALISA_ID":"21"}', '2015-04-07 15:58:20'),
	(99, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"77","ANALISA_ID":"21","DETAIL_ANALISA_KOEFISIEN":1.35,"DETAIL_ANALISA_HARGA":19250,"DETAIL_ANALISA_TOTAL":25987.5}', NULL, '2015-04-07 15:58:21'),
	(100, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"63","ANALISA_ID":"21","DETAIL_ANALISA_KOEFISIEN":0.37,"DETAIL_ANALISA_HARGA":67500,"DETAIL_ANALISA_TOTAL":24975}', NULL, '2015-04-07 15:58:22'),
	(101, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"23","ANALISA_ID":"21","DETAIL_ANALISA_KOEFISIEN":0.054,"DETAIL_ANALISA_HARGA":11000,"DETAIL_ANALISA_TOTAL":594}', NULL, '2015-04-07 15:58:22'),
	(102, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"117","ANALISA_ID":"21","DETAIL_ANALISA_KOEFISIEN":2.15,"DETAIL_ANALISA_HARGA":54500,"DETAIL_ANALISA_TOTAL":117175}', NULL, '2015-04-07 15:58:23'),
	(103, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"97","ANALISA_ID":"21","DETAIL_ANALISA_KOEFISIEN":0.004,"DETAIL_ANALISA_HARGA":115000,"DETAIL_ANALISA_TOTAL":460}', NULL, '2015-04-07 15:58:23'),
	(104, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"34","ANALISA_ID":"21","DETAIL_ANALISA_KOEFISIEN":0.008,"DETAIL_ANALISA_HARGA":190000,"DETAIL_ANALISA_TOTAL":1520}', NULL, '2015-04-07 15:58:24'),
	(105, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"32","ANALISA_ID":"21","DETAIL_ANALISA_KOEFISIEN":"2","DETAIL_ANALISA_HARGA":15000,"DETAIL_ANALISA_TOTAL":30000}', NULL, '2015-04-07 15:58:25'),
	(106, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'update', 'master_analisa', '{"SATUAN_NAMA":"M","KATEGORI_ANALISA_ID":"1","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PRSP-0001","ANALISA_NAMA":"Pagar Sementara Dari Gedeg t. 2m","ANALISA_TOTAL":"185711.5","ANALISA_ACTIVE":1}', '{"ANALISA_ID":"21"}', '2015-04-07 16:00:34'),
	(107, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'delete', 'detail_analisa', NULL, '{"ANALISA_ID":"21"}', '2015-04-07 16:00:35'),
	(108, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"77","ANALISA_ID":"21","DETAIL_ANALISA_KOEFISIEN":1.35,"DETAIL_ANALISA_HARGA":19250,"DETAIL_ANALISA_TOTAL":25987.5}', NULL, '2015-04-07 16:00:36'),
	(109, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"63","ANALISA_ID":"21","DETAIL_ANALISA_KOEFISIEN":0.37,"DETAIL_ANALISA_HARGA":67500,"DETAIL_ANALISA_TOTAL":24975}', NULL, '2015-04-07 16:00:36'),
	(110, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"23","ANALISA_ID":"21","DETAIL_ANALISA_KOEFISIEN":0.054,"DETAIL_ANALISA_HARGA":11000,"DETAIL_ANALISA_TOTAL":594}', NULL, '2015-04-07 16:00:37'),
	(111, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"117","ANALISA_ID":"21","DETAIL_ANALISA_KOEFISIEN":2.15,"DETAIL_ANALISA_HARGA":54500,"DETAIL_ANALISA_TOTAL":117175}', NULL, '2015-04-07 16:00:37'),
	(112, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"97","ANALISA_ID":"21","DETAIL_ANALISA_KOEFISIEN":0.004,"DETAIL_ANALISA_HARGA":115000,"DETAIL_ANALISA_TOTAL":460}', NULL, '2015-04-07 16:00:38'),
	(113, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"34","ANALISA_ID":"21","DETAIL_ANALISA_KOEFISIEN":0.008,"DETAIL_ANALISA_HARGA":190000,"DETAIL_ANALISA_TOTAL":1520}', NULL, '2015-04-07 16:00:39'),
	(114, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"32","ANALISA_ID":"21","DETAIL_ANALISA_KOEFISIEN":"1","DETAIL_ANALISA_HARGA":15000,"DETAIL_ANALISA_TOTAL":15000}', NULL, '2015-04-07 16:00:39'),
	(115, 'Administrator', 'administrator', 'master/barang/delete', 'update', 'master_barang', '{"BARANG_ACTIVE":0}', '{"BARANG_ID":"120"}', '2015-04-07 16:04:41'),
	(116, 'Administrator', 'administrator', 'master/barang/delete', 'delete', 'master_barang', NULL, '{"BARANG_ID":"120"}', '2015-04-07 16:04:41'),
	(117, 'Administrator', 'administrator', 'master/upah/insert', 'insert', 'master_upah', '{"LOKASI_UPAH_ID":"1","SATUAN_UPAH_ID":"2","UPAH_KODE":"UPH0002","UPAH_HARGA":"22500","UPAH_NAMA":"Upah Kerja Borongan Pagar Dari Seng Gelombang t= 2 m"}', NULL, '2015-04-07 16:10:29'),
	(118, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'master_analisa', '{"SATUAN_NAMA":"M","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PRSP-0002","ANALISA_NAMA":"Pagar Dari Seng Gelombang t= 2 m","ANALISA_TOTAL":"665372.5","ANALISA_ACTIVE":1}', NULL, '2015-04-07 16:10:57'),
	(119, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"19","ANALISA_ID":"22","DETAIL_ANALISA_KOEFISIEN":"0.050","DETAIL_ANALISA_HARGA":"4350000","DETAIL_ANALISA_TOTAL":217500}', NULL, '2015-04-07 16:10:58'),
	(120, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"30","ANALISA_ID":"22","DETAIL_ANALISA_KOEFISIEN":"0.050","DETAIL_ANALISA_HARGA":"105000","DETAIL_ANALISA_TOTAL":5250}', NULL, '2015-04-07 16:10:58'),
	(121, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"31","ANALISA_ID":"22","DETAIL_ANALISA_KOEFISIEN":"1.2","DETAIL_ANALISA_HARGA":"75000","DETAIL_ANALISA_TOTAL":90000}', NULL, '2015-04-07 16:10:59'),
	(122, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"97","ANALISA_ID":"22","DETAIL_ANALISA_KOEFISIEN":"0.01","DETAIL_ANALISA_HARGA":"115000","DETAIL_ANALISA_TOTAL":1150}', NULL, '2015-04-07 16:11:00'),
	(123, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"34","ANALISA_ID":"22","DETAIL_ANALISA_KOEFISIEN":"0.01","DETAIL_ANALISA_HARGA":"190000","DETAIL_ANALISA_TOTAL":1900}', NULL, '2015-04-07 16:11:00'),
	(124, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"2","ANALISA_ID":"22","DETAIL_ANALISA_KOEFISIEN":"0.05","DETAIL_ANALISA_HARGA":"6400000","DETAIL_ANALISA_TOTAL":320000}', NULL, '2015-04-07 16:11:01'),
	(125, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"23","ANALISA_ID":"22","DETAIL_ANALISA_KOEFISIEN":"0.06","DETAIL_ANALISA_HARGA":"11000","DETAIL_ANALISA_TOTAL":660}', NULL, '2015-04-07 16:11:01'),
	(126, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"21","ANALISA_ID":"22","DETAIL_ANALISA_KOEFISIEN":"0.450","DETAIL_ANALISA_HARGA":"14250","DETAIL_ANALISA_TOTAL":6412.5}', NULL, '2015-04-07 16:11:02'),
	(127, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"33","ANALISA_ID":"22","DETAIL_ANALISA_KOEFISIEN":"1","DETAIL_ANALISA_HARGA":"22500","DETAIL_ANALISA_TOTAL":22500}', NULL, '2015-04-07 16:11:02'),
	(128, 'Administrator', 'administrator', 'master/upah/insert', 'insert', 'master_upah', '{"LOKASI_UPAH_ID":"1","SATUAN_UPAH_ID":"3","UPAH_KODE":"UPH0003","UPAH_HARGA":"100000","UPAH_NAMA":"Upah Kerja Borongan Direksi Keet + Rabat 3x6m"}', NULL, '2015-04-07 16:25:18'),
	(129, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'master_analisa', '{"SATUAN_NAMA":"M2","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PRSP-0003","ANALISA_NAMA":"Direksi Keet + Rabat 3x6m","ANALISA_TOTAL":"564664.75","ANALISA_ACTIVE":1}', NULL, '2015-04-07 16:25:38'),
	(130, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"77","ANALISA_ID":"23","DETAIL_ANALISA_KOEFISIEN":"1.667","DETAIL_ANALISA_HARGA":"19250","DETAIL_ANALISA_TOTAL":32089.75}', NULL, '2015-04-07 16:25:38'),
	(131, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"23","ANALISA_ID":"23","DETAIL_ANALISA_KOEFISIEN":"5","DETAIL_ANALISA_HARGA":"11000","DETAIL_ANALISA_TOTAL":55000}', NULL, '2015-04-07 16:25:39'),
	(132, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"94","ANALISA_ID":"23","DETAIL_ANALISA_KOEFISIEN":"2","DETAIL_ANALISA_HARGA":"1150","DETAIL_ANALISA_TOTAL":2300}', NULL, '2015-04-07 16:25:39'),
	(133, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"61","ANALISA_ID":"23","DETAIL_ANALISA_KOEFISIEN":"2","DETAIL_ANALISA_HARGA":"51750","DETAIL_ANALISA_TOTAL":103500}', NULL, '2015-04-07 16:25:40'),
	(134, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"68","ANALISA_ID":"23","DETAIL_ANALISA_KOEFISIEN":"1","DETAIL_ANALISA_HARGA":"15000","DETAIL_ANALISA_TOTAL":15000}', NULL, '2015-04-07 16:25:41'),
	(135, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"128","ANALISA_ID":"23","DETAIL_ANALISA_KOEFISIEN":"1.05","DETAIL_ANALISA_HARGA":"85000","DETAIL_ANALISA_TOTAL":89250}', NULL, '2015-04-07 16:25:42'),
	(136, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"96","ANALISA_ID":"23","DETAIL_ANALISA_KOEFISIEN":"45","DETAIL_ANALISA_HARGA":"700","DETAIL_ANALISA_TOTAL":31500}', NULL, '2015-04-07 16:25:42'),
	(137, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"117","ANALISA_ID":"23","DETAIL_ANALISA_KOEFISIEN":"0.25","DETAIL_ANALISA_HARGA":"54500","DETAIL_ANALISA_TOTAL":13625}', NULL, '2015-04-07 16:25:43'),
	(138, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"97","ANALISA_ID":"23","DETAIL_ANALISA_KOEFISIEN":"0.02","DETAIL_ANALISA_HARGA":"115000","DETAIL_ANALISA_TOTAL":2300}', NULL, '2015-04-07 16:25:44'),
	(139, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"34","ANALISA_ID":"23","DETAIL_ANALISA_KOEFISIEN":"0.04","DETAIL_ANALISA_HARGA":"190000","DETAIL_ANALISA_TOTAL":7600}', NULL, '2015-04-07 16:25:44'),
	(140, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"31","ANALISA_ID":"23","DETAIL_ANALISA_KOEFISIEN":"1.5","DETAIL_ANALISA_HARGA":"75000","DETAIL_ANALISA_TOTAL":112500}', NULL, '2015-04-07 16:25:45'),
	(141, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"34","ANALISA_ID":"23","DETAIL_ANALISA_KOEFISIEN":"1","DETAIL_ANALISA_HARGA":"100000","DETAIL_ANALISA_TOTAL":100000}', NULL, '2015-04-07 16:25:46'),
	(142, 'Administrator', 'administrator', 'master/upah/insert', 'insert', 'master_upah', '{"LOKASI_UPAH_ID":"1","SATUAN_UPAH_ID":"1","UPAH_KODE":"UPH0004","UPAH_HARGA":"5000","UPAH_NAMA":"Upah Kerja Borongan Bouwplank"}', NULL, '2015-04-07 16:30:04'),
	(143, 'Administrator', 'administrator', 'master/upah/update', 'update', 'master_upah', '{"LOKASI_UPAH_ID":"1","SATUAN_UPAH_ID":"2","UPAH_KODE":"UPH0004","UPAH_HARGA":"5000","UPAH_NAMA":"Upah Kerja Borongan Bouwplank"}', '{"UPAH_ID":"35"}', '2015-04-07 16:30:33'),
	(144, 'Administrator', 'administrator', 'master/upah/insert', 'insert', 'master_upah', '{"LOKASI_UPAH_ID":"1","SATUAN_UPAH_ID":"3","UPAH_KODE":"UPH0005","UPAH_HARGA":"45000","UPAH_NAMA":"Upah Kerja Borongan Galian Tanah"}', NULL, '2015-04-07 16:34:26'),
	(145, 'Administrator', 'administrator', 'master/upah/update', 'update', 'master_upah', '{"LOKASI_UPAH_ID":"1","SATUAN_UPAH_ID":"4","UPAH_KODE":"UPH0005","UPAH_HARGA":"45000","UPAH_NAMA":"Upah Kerja Borongan Galian Tanah"}', '{"UPAH_ID":"36"}', '2015-04-07 16:34:49'),
	(146, 'Administrator', 'administrator', 'master/upah/insert', 'insert', 'master_upah', '{"LOKASI_UPAH_ID":"1","SATUAN_UPAH_ID":"4","UPAH_KODE":"UPH006","UPAH_HARGA":"17500","UPAH_NAMA":"Upah Kerja Borongan Urugan Tanah  Kembali"}', NULL, '2015-04-07 16:36:02'),
	(147, 'Administrator', 'administrator', 'master/upah/insert', 'insert', 'master_upah', '{"LOKASI_UPAH_ID":"1","SATUAN_UPAH_ID":"4","UPAH_KODE":"UPH0007","UPAH_HARGA":"30000","UPAH_NAMA":"Upah Kerja Borongan Urugan Sirtu + Pemadatan"}', NULL, '2015-04-07 16:36:51'),
	(148, 'Administrator', 'administrator', 'master/upah/insert', 'insert', 'master_upah', '{"LOKASI_UPAH_ID":"1","SATUAN_UPAH_ID":"4","UPAH_KODE":"UPH0008","UPAH_HARGA":"5000","UPAH_NAMA":"Upah Kerja Borongan Urugan pasir"}', NULL, '2015-04-07 16:37:18'),
	(149, 'Administrator', 'administrator', 'master/upah/insert', 'insert', 'master_upah', '{"LOKASI_UPAH_ID":"1","SATUAN_UPAH_ID":"4","UPAH_KODE":"UPH0009","UPAH_HARGA":"26000","UPAH_NAMA":"Upah Kerja Borongan Urugan Tanah  Perataan & Pemadatan"}', NULL, '2015-04-07 16:37:48'),
	(150, 'Administrator', 'administrator', 'master/upah/insert', 'insert', 'master_upah', '{"LOKASI_UPAH_ID":"1","SATUAN_UPAH_ID":"4","UPAH_KODE":"UPH0010","UPAH_HARGA":"16000","UPAH_NAMA":"Upah Kerja Borongan Buang Tanah  Sementara"}', NULL, '2015-04-07 16:38:14'),
	(151, 'Administrator', 'administrator', 'master/upah/insert', 'insert', 'master_upah', '{"LOKASI_UPAH_ID":"1","SATUAN_UPAH_ID":"4","UPAH_KODE":"UPH0011","UPAH_HARGA":"75000","UPAH_NAMA":"Upah Kerja Borongan Buang Tanah  Keluar Lokasi"}', NULL, '2015-04-07 16:38:50'),
	(152, 'Administrator', 'administrator', 'master/upah/insert', 'insert', 'master_upah', '{"LOKASI_UPAH_ID":"1","SATUAN_UPAH_ID":"4","UPAH_KODE":"UPH0012","UPAH_HARGA":"30000","UPAH_NAMA":"Upah Kerja Borongan Buang Gragal  Keluar Lokasi"}', NULL, '2015-04-07 16:39:33'),
	(153, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'master_analisa', '{"SATUAN_NAMA":"M","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK \\/PRSP- 0004","ANALISA_NAMA":"Bouwplank","ANALISA_TOTAL":"12825","ANALISA_ACTIVE":1}', NULL, '2015-04-07 16:40:03'),
	(154, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"77","ANALISA_ID":"24","DETAIL_ANALISA_KOEFISIEN":"0.3","DETAIL_ANALISA_HARGA":"19250","DETAIL_ANALISA_TOTAL":5775}', NULL, '2015-04-07 16:40:04'),
	(155, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"23","ANALISA_ID":"24","DETAIL_ANALISA_KOEFISIEN":"0.05","DETAIL_ANALISA_HARGA":"11000","DETAIL_ANALISA_TOTAL":550}', NULL, '2015-04-07 16:40:05'),
	(156, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"95","ANALISA_ID":"24","DETAIL_ANALISA_KOEFISIEN":"0.25","DETAIL_ANALISA_HARGA":"26000","DETAIL_ANALISA_TOTAL":6500}', NULL, '2015-04-07 16:40:05'),
	(157, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'master_analisa', '{"SATUAN_NAMA":"M3","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PEK.TNH-0001","ANALISA_NAMA":"Galian Tanah ","ANALISA_TOTAL":"45000","ANALISA_ACTIVE":1}', NULL, '2015-04-07 16:41:28'),
	(158, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"36","ANALISA_ID":"25","DETAIL_ANALISA_KOEFISIEN":"1","DETAIL_ANALISA_HARGA":"45000","DETAIL_ANALISA_TOTAL":45000}', NULL, '2015-04-07 16:41:29'),
	(159, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'update', 'master_analisa', '{"SATUAN_NAMA":"M","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PRSP- 0004","ANALISA_NAMA":"Bouwplank","ANALISA_TOTAL":"17825","ANALISA_ACTIVE":1}', '{"ANALISA_ID":"24"}', '2015-04-07 16:43:20'),
	(160, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'delete', 'detail_analisa', NULL, '{"ANALISA_ID":"24"}', '2015-04-07 16:43:21'),
	(161, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"77","ANALISA_ID":"24","DETAIL_ANALISA_KOEFISIEN":0.3,"DETAIL_ANALISA_HARGA":19250,"DETAIL_ANALISA_TOTAL":5775}', NULL, '2015-04-07 16:43:21'),
	(162, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"23","ANALISA_ID":"24","DETAIL_ANALISA_KOEFISIEN":0.05,"DETAIL_ANALISA_HARGA":11000,"DETAIL_ANALISA_TOTAL":550}', NULL, '2015-04-07 16:43:22'),
	(163, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"95","ANALISA_ID":"24","DETAIL_ANALISA_KOEFISIEN":0.25,"DETAIL_ANALISA_HARGA":26000,"DETAIL_ANALISA_TOTAL":6500}', NULL, '2015-04-07 16:43:22'),
	(164, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"35","ANALISA_ID":"24","DETAIL_ANALISA_KOEFISIEN":"1","DETAIL_ANALISA_HARGA":"5000","DETAIL_ANALISA_TOTAL":5000}', NULL, '2015-04-07 16:43:23'),
	(165, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'master_analisa', '{"SATUAN_NAMA":"M3","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PEK.TNH-0002","ANALISA_NAMA":"Urugan Tanah  Kembali","ANALISA_TOTAL":"17500","ANALISA_ACTIVE":1}', NULL, '2015-04-07 16:45:15'),
	(166, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"37","ANALISA_ID":"26","DETAIL_ANALISA_KOEFISIEN":"1","DETAIL_ANALISA_HARGA":"17500","DETAIL_ANALISA_TOTAL":17500}', NULL, '2015-04-07 16:45:17'),
	(167, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'master_analisa', '{"SATUAN_NAMA":"M3","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PEK.TNH-0003","ANALISA_NAMA":"Urugan Sirtu + Pemadatan","ANALISA_TOTAL":"124500","ANALISA_ACTIVE":1}', NULL, '2015-04-07 16:46:38'),
	(168, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"123","ANALISA_ID":"27","DETAIL_ANALISA_KOEFISIEN":"1.05","DETAIL_ANALISA_HARGA":"90000","DETAIL_ANALISA_TOTAL":94500}', NULL, '2015-04-07 16:46:39'),
	(169, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"38","ANALISA_ID":"27","DETAIL_ANALISA_KOEFISIEN":"1","DETAIL_ANALISA_HARGA":"30000","DETAIL_ANALISA_TOTAL":30000}', NULL, '2015-04-07 16:46:39'),
	(170, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'master_analisa', '{"SATUAN_NAMA":"M3","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PEK.TNH-0004","ANALISA_NAMA":"Urugan pasir","ANALISA_TOTAL":"115250","ANALISA_ACTIVE":1}', NULL, '2015-04-07 16:53:38'),
	(171, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"27","ANALISA_ID":"28","DETAIL_ANALISA_KOEFISIEN":"1.05","DETAIL_ANALISA_HARGA":"105000","DETAIL_ANALISA_TOTAL":110250}', NULL, '2015-04-07 16:53:39'),
	(172, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"39","ANALISA_ID":"28","DETAIL_ANALISA_KOEFISIEN":"1","DETAIL_ANALISA_HARGA":"5000","DETAIL_ANALISA_TOTAL":5000}', NULL, '2015-04-07 16:53:40'),
	(173, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'master_analisa', '{"SATUAN_NAMA":"M3","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PEK.TNH-0004","ANALISA_NAMA":"Urugan Tanah  Perataan & Pemadatan","ANALISA_TOTAL":"26000","ANALISA_ACTIVE":1}', NULL, '2015-04-07 16:55:23'),
	(174, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"40","ANALISA_ID":"29","DETAIL_ANALISA_KOEFISIEN":"1","DETAIL_ANALISA_HARGA":"26000","DETAIL_ANALISA_TOTAL":26000}', NULL, '2015-04-07 16:55:24'),
	(175, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'update', 'master_analisa', '{"SATUAN_NAMA":"M3","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PEK.TNH-0005","ANALISA_NAMA":"Urugan Tanah  Perataan & Pemadatan","ANALISA_TOTAL":"26000","ANALISA_ACTIVE":1}', '{"ANALISA_ID":"29"}', '2015-04-07 16:56:08'),
	(176, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'delete', 'detail_analisa', NULL, '{"ANALISA_ID":"29"}', '2015-04-07 16:56:09'),
	(177, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"40","ANALISA_ID":"29","DETAIL_ANALISA_KOEFISIEN":1,"DETAIL_ANALISA_HARGA":26000,"DETAIL_ANALISA_TOTAL":26000}', NULL, '2015-04-07 16:56:10'),
	(178, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'master_analisa', '{"SATUAN_NAMA":"M3","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PEK.TNH-0006","ANALISA_NAMA":"Buang Tanah  Sementara","ANALISA_TOTAL":"16000","ANALISA_ACTIVE":1}', NULL, '2015-04-07 16:57:13'),
	(179, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"41","ANALISA_ID":"30","DETAIL_ANALISA_KOEFISIEN":"1","DETAIL_ANALISA_HARGA":"16000","DETAIL_ANALISA_TOTAL":16000}', NULL, '2015-04-07 16:57:14'),
	(180, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'master_analisa', '{"SATUAN_NAMA":"M3","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PEK.TNH-0007","ANALISA_NAMA":"Buang Tanah  Keluar Lokasi","ANALISA_TOTAL":"75000","ANALISA_ACTIVE":1}', NULL, '2015-04-07 16:58:44'),
	(181, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"42","ANALISA_ID":"31","DETAIL_ANALISA_KOEFISIEN":"1","DETAIL_ANALISA_HARGA":"75000","DETAIL_ANALISA_TOTAL":75000}', NULL, '2015-04-07 16:58:45'),
	(182, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'master_analisa', '{"SATUAN_NAMA":"M3","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PEK.TNH-0008","ANALISA_NAMA":"Buang Gragal  Keluar Lokasi","ANALISA_TOTAL":"30000","ANALISA_ACTIVE":1}', NULL, '2015-04-07 17:00:02'),
	(183, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"43","ANALISA_ID":"32","DETAIL_ANALISA_KOEFISIEN":"1","DETAIL_ANALISA_HARGA":"30000","DETAIL_ANALISA_TOTAL":30000}', NULL, '2015-04-07 17:00:02'),
	(184, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'update', 'master_analisa', '{"SATUAN_NAMA":"M","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PRSP-0004","ANALISA_NAMA":"Bouwplank","ANALISA_TOTAL":"17825","ANALISA_ACTIVE":1}', '{"ANALISA_ID":"24"}', '2015-04-07 17:00:47'),
	(185, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'delete', 'detail_analisa', NULL, '{"ANALISA_ID":"24"}', '2015-04-07 17:00:48'),
	(186, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"77","ANALISA_ID":"24","DETAIL_ANALISA_KOEFISIEN":0.3,"DETAIL_ANALISA_HARGA":19250,"DETAIL_ANALISA_TOTAL":5775}', NULL, '2015-04-07 17:00:51'),
	(187, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"23","ANALISA_ID":"24","DETAIL_ANALISA_KOEFISIEN":0.05,"DETAIL_ANALISA_HARGA":11000,"DETAIL_ANALISA_TOTAL":550}', NULL, '2015-04-07 17:00:55'),
	(188, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"95","ANALISA_ID":"24","DETAIL_ANALISA_KOEFISIEN":0.25,"DETAIL_ANALISA_HARGA":26000,"DETAIL_ANALISA_TOTAL":6500}', NULL, '2015-04-07 17:00:58'),
	(189, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"35","ANALISA_ID":"24","DETAIL_ANALISA_KOEFISIEN":1,"DETAIL_ANALISA_HARGA":5000,"DETAIL_ANALISA_TOTAL":5000}', NULL, '2015-04-07 17:01:02'),
	(190, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'update', 'master_analisa', '{"SATUAN_NAMA":"M","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PRSP-0004","ANALISA_NAMA":"Bouwplank","ANALISA_TOTAL":"17825","ANALISA_ACTIVE":1}', '{"ANALISA_ID":"24"}', '2015-04-07 17:01:05'),
	(191, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'delete', 'detail_analisa', NULL, '{"ANALISA_ID":"24"}', '2015-04-07 17:01:07'),
	(192, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"77","ANALISA_ID":"24","DETAIL_ANALISA_KOEFISIEN":0.3,"DETAIL_ANALISA_HARGA":19250,"DETAIL_ANALISA_TOTAL":5775}', NULL, '2015-04-07 17:01:08'),
	(193, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"23","ANALISA_ID":"24","DETAIL_ANALISA_KOEFISIEN":0.05,"DETAIL_ANALISA_HARGA":11000,"DETAIL_ANALISA_TOTAL":550}', NULL, '2015-04-07 17:01:10'),
	(194, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"95","ANALISA_ID":"24","DETAIL_ANALISA_KOEFISIEN":0.25,"DETAIL_ANALISA_HARGA":26000,"DETAIL_ANALISA_TOTAL":6500}', NULL, '2015-04-07 17:01:11'),
	(195, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"35","ANALISA_ID":"24","DETAIL_ANALISA_KOEFISIEN":1,"DETAIL_ANALISA_HARGA":5000,"DETAIL_ANALISA_TOTAL":5000}', NULL, '2015-04-07 17:01:12'),
	(196, 'Administrator', 'administrator', 'master/barang/delete', 'update', 'master_barang', '{"BARANG_ACTIVE":0}', '{"BARANG_ID":"98"}', '2015-04-07 17:05:36'),
	(197, 'Administrator', 'administrator', 'master/barang/delete', 'delete', 'master_barang', NULL, '{"BARANG_ID":"98"}', '2015-04-07 17:05:37'),
	(198, 'Administrator', 'administrator', 'master/upah/insert', 'insert', 'master_upah', '{"LOKASI_UPAH_ID":"1","SATUAN_UPAH_ID":"1","UPAH_KODE":"UPH.HARIAN.001","UPAH_HARGA":"60000","UPAH_NAMA":"Pekerja"}', NULL, '2015-04-07 17:08:20'),
	(199, 'Administrator', 'administrator', 'master/upah/insert', 'insert', 'master_upah', '{"LOKASI_UPAH_ID":"1","SATUAN_UPAH_ID":"1","UPAH_KODE":"UPH.HARIAN.002","UPAH_HARGA":"75000","UPAH_NAMA":"TUKANG BATU"}', NULL, '2015-04-07 17:09:01'),
	(200, 'Administrator', 'administrator', 'master/upah/insert', 'insert', 'master_upah', '{"LOKASI_UPAH_ID":"1","SATUAN_UPAH_ID":"1","UPAH_KODE":"UPH.HARIAN.003","UPAH_HARGA":"80000","UPAH_NAMA":"KEPALA TUKANG BATU"}', NULL, '2015-04-07 17:10:02'),
	(201, 'Administrator', 'administrator', 'master/upah/insert', 'insert', 'master_upah', '{"LOKASI_UPAH_ID":"1","SATUAN_UPAH_ID":"1","UPAH_KODE":"UPH.HARIAN.004","UPAH_HARGA":"95000","UPAH_NAMA":"  Mandor"}', NULL, '2015-04-07 17:10:30'),
	(202, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'master_analisa', '{"SATUAN_NAMA":"M3","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PEK.PNDSI-0001","ANALISA_NAMA":"  Membuat Pondasi Batu Belah  1 : 6 ","ANALISA_TOTAL":"519572.5","ANALISA_ACTIVE":1}', NULL, '2015-04-07 17:12:37'),
	(203, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"4","ANALISA_ID":"33","DETAIL_ANALISA_KOEFISIEN":"1.1","DETAIL_ANALISA_HARGA":"125000","DETAIL_ANALISA_TOTAL":137500}', NULL, '2015-04-07 17:12:40'),
	(204, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"26","ANALISA_ID":"33","DETAIL_ANALISA_KOEFISIEN":"0.561","DETAIL_ANALISA_HARGA":"135000","DETAIL_ANALISA_TOTAL":75735}', NULL, '2015-04-07 17:12:42'),
	(205, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"117","ANALISA_ID":"33","DETAIL_ANALISA_KOEFISIEN":"2.925","DETAIL_ANALISA_HARGA":"54500","DETAIL_ANALISA_TOTAL":159412.5}', NULL, '2015-04-07 17:12:43'),
	(206, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"44","ANALISA_ID":"33","DETAIL_ANALISA_KOEFISIEN":"1.5","DETAIL_ANALISA_HARGA":"60000","DETAIL_ANALISA_TOTAL":90000}', NULL, '2015-04-07 17:12:44'),
	(207, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"45","ANALISA_ID":"33","DETAIL_ANALISA_KOEFISIEN":"0.6","DETAIL_ANALISA_HARGA":"75000","DETAIL_ANALISA_TOTAL":45000}', NULL, '2015-04-07 17:12:45'),
	(208, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"46","ANALISA_ID":"33","DETAIL_ANALISA_KOEFISIEN":"0.06","DETAIL_ANALISA_HARGA":"80000","DETAIL_ANALISA_TOTAL":4800}', NULL, '2015-04-07 17:12:46'),
	(209, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"47","ANALISA_ID":"33","DETAIL_ANALISA_KOEFISIEN":"0.075","DETAIL_ANALISA_HARGA":"95000","DETAIL_ANALISA_TOTAL":7125}', NULL, '2015-04-07 17:12:47'),
	(210, 'Administrator', 'administrator', 'master/barang/insert', 'insert', 'master_barang', '{"SATUAN_NAMA":"M3","KATEGORI_BARANG_ID":"1","BARANG_KODE":"MAT000160","BARANG_NAMA":"Batu pecah 15\\/20 cm","BARANG_KETERANGAN":"","BARANG_HARGA":"125000"}', NULL, '2015-04-07 17:15:34'),
	(211, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'master_analisa', '{"SATUAN_NAMA":"M3","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PEK.PNDSI-0001","ANALISA_NAMA":"  Membuat Pasangan  Batu Kosong (Aanstamping)","ANALISA_TOTAL":"264375","ANALISA_ACTIVE":1}', NULL, '2015-04-07 17:18:13'),
	(212, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"12253","ANALISA_ID":"34","DETAIL_ANALISA_KOEFISIEN":"1.2","DETAIL_ANALISA_HARGA":"125000","DETAIL_ANALISA_TOTAL":150000}', NULL, '2015-04-07 17:18:14'),
	(213, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"27","ANALISA_ID":"34","DETAIL_ANALISA_KOEFISIEN":"0.3","DETAIL_ANALISA_HARGA":"105000","DETAIL_ANALISA_TOTAL":31500}', NULL, '2015-04-07 17:18:14'),
	(214, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"44","ANALISA_ID":"34","DETAIL_ANALISA_KOEFISIEN":"0.78","DETAIL_ANALISA_HARGA":"60000","DETAIL_ANALISA_TOTAL":46800}', NULL, '2015-04-07 17:18:15'),
	(215, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"45","ANALISA_ID":"34","DETAIL_ANALISA_KOEFISIEN":"0.39","DETAIL_ANALISA_HARGA":"75000","DETAIL_ANALISA_TOTAL":29250}', NULL, '2015-04-07 17:18:15'),
	(216, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"46","ANALISA_ID":"34","DETAIL_ANALISA_KOEFISIEN":"0.039","DETAIL_ANALISA_HARGA":"80000","DETAIL_ANALISA_TOTAL":3120}', NULL, '2015-04-07 17:18:16'),
	(217, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"47","ANALISA_ID":"34","DETAIL_ANALISA_KOEFISIEN":"0.039","DETAIL_ANALISA_HARGA":"95000","DETAIL_ANALISA_TOTAL":3705}', NULL, '2015-04-07 17:18:16'),
	(218, 'Administrator', 'administrator', 'master/barang/insert', 'insert', 'master_barang', '{"SATUAN_NAMA":"Ball","KATEGORI_BARANG_ID":"1","BARANG_KODE":"","BARANG_NAMA":"BARANG COBA","BARANG_KETERANGAN":"","BARANG_HARGA":"1000"}', NULL, '2015-04-07 17:18:53'),
	(219, 'Administrator', 'administrator', 'master/barang/delete', 'update', 'master_barang', '{"BARANG_ACTIVE":0}', '{"BARANG_ID":"12254"}', '2015-04-07 17:19:35'),
	(220, 'Administrator', 'administrator', 'master/barang/delete', 'delete', 'master_barang', NULL, '{"BARANG_ID":"12254"}', '2015-04-07 17:19:36'),
	(221, 'Administrator', 'administrator', 'master/barang/insert', 'insert', 'master_barang', '{"SATUAN_NAMA":"Ball","KATEGORI_BARANG_ID":"1","BARANG_KODE":"","BARANG_NAMA":"COBA BARANG","BARANG_KETERANGAN":"","BARANG_HARGA":"193133"}', NULL, '2015-04-07 17:22:45'),
	(222, 'Administrator', 'administrator', 'master/barang/delete', 'update', 'master_barang', '{"BARANG_ACTIVE":0}', '{"BARANG_ID":"160"}', '2015-04-07 17:24:36'),
	(223, 'Administrator', 'administrator', 'master/barang/delete', 'delete', 'master_barang', NULL, '{"BARANG_ID":"160"}', '2015-04-07 17:24:36'),
	(224, 'Administrator', 'administrator', 'master/upah/insert', 'insert', 'master_upah', '{"LOKASI_UPAH_ID":"1","SATUAN_UPAH_ID":"3","UPAH_KODE":"UPH0013","UPAH_HARGA":"8000","UPAH_NAMA":"Upah Kerja Borongan Lantai kerja tb 5cm (site mix)"}', NULL, '2015-04-07 17:28:57'),
	(225, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'master_analisa', '{"SATUAN_NAMA":"M2","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PEK.BTNSTR-0001","ANALISA_NAMA":"Lantai kerja tb 5cm (site mix)","ANALISA_TOTAL":"31525","ANALISA_ACTIVE":1}', NULL, '2015-04-07 17:29:44'),
	(226, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"117","ANALISA_ID":"35","DETAIL_ANALISA_KOEFISIEN":"0.25","DETAIL_ANALISA_HARGA":"54500","DETAIL_ANALISA_TOTAL":13625}', NULL, '2015-04-07 17:29:45'),
	(227, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"97","ANALISA_ID":"35","DETAIL_ANALISA_KOEFISIEN":"0.02","DETAIL_ANALISA_HARGA":"115000","DETAIL_ANALISA_TOTAL":2300}', NULL, '2015-04-07 17:29:46'),
	(228, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"125","ANALISA_ID":"35","DETAIL_ANALISA_KOEFISIEN":"0.04","DETAIL_ANALISA_HARGA":"190000","DETAIL_ANALISA_TOTAL":7600}', NULL, '2015-04-07 17:29:46'),
	(229, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"48","ANALISA_ID":"35","DETAIL_ANALISA_KOEFISIEN":"1","DETAIL_ANALISA_HARGA":"8000","DETAIL_ANALISA_TOTAL":8000}', NULL, '2015-04-07 17:29:47'),
	(230, 'Administrator', 'administrator', 'master/barang/insert', 'insert', 'master_barang', '{"SATUAN_NAMA":"Ball","KATEGORI_BARANG_ID":"1","BARANG_KODE":"","BARANG_NAMA":"MATERIAL 1 COBA","BARANG_KETERANGAN":"","BARANG_HARGA":"32532532"}', NULL, '2015-04-07 17:31:09'),
	(231, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'update', 'master_analisa', '{"SATUAN_NAMA":"M3","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PEK.PNDSI-0002","ANALISA_NAMA":"  Membuat Pasangan  Batu Kosong (Aanstamping)","ANALISA_TOTAL":"114375","ANALISA_ACTIVE":1}', '{"ANALISA_ID":"34"}', '2015-04-07 17:31:36'),
	(232, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'delete', 'detail_analisa', NULL, '{"ANALISA_ID":"34"}', '2015-04-07 17:31:37'),
	(233, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"27","ANALISA_ID":"34","DETAIL_ANALISA_KOEFISIEN":0.3,"DETAIL_ANALISA_HARGA":105000,"DETAIL_ANALISA_TOTAL":31500}', NULL, '2015-04-07 17:31:37'),
	(234, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"44","ANALISA_ID":"34","DETAIL_ANALISA_KOEFISIEN":0.78,"DETAIL_ANALISA_HARGA":60000,"DETAIL_ANALISA_TOTAL":46800}', NULL, '2015-04-07 17:31:38'),
	(235, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"45","ANALISA_ID":"34","DETAIL_ANALISA_KOEFISIEN":0.39,"DETAIL_ANALISA_HARGA":75000,"DETAIL_ANALISA_TOTAL":29250}', NULL, '2015-04-07 17:31:38'),
	(236, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"46","ANALISA_ID":"34","DETAIL_ANALISA_KOEFISIEN":0.039,"DETAIL_ANALISA_HARGA":80000,"DETAIL_ANALISA_TOTAL":3120}', NULL, '2015-04-07 17:31:39'),
	(237, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"47","ANALISA_ID":"34","DETAIL_ANALISA_KOEFISIEN":0.039,"DETAIL_ANALISA_HARGA":95000,"DETAIL_ANALISA_TOTAL":3705}', NULL, '2015-04-07 17:31:39'),
	(238, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'master_analisa', '{"SATUAN_NAMA":"M2","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PEK.BTNSTR-0002","ANALISA_NAMA":"Lantai kerja  (site mix)","ANALISA_TOTAL":"620500","ANALISA_ACTIVE":1}', NULL, '2015-04-07 17:38:10'),
	(239, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'master_analisa', '{"SATUAN_NAMA":"M2","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PEK.BTNSTR-0002","ANALISA_NAMA":"Lantai kerja  (site mix)","ANALISA_TOTAL":"620500","ANALISA_ACTIVE":1}', NULL, '2015-04-07 17:38:10'),
	(240, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"117","ANALISA_ID":"37","DETAIL_ANALISA_KOEFISIEN":"5","DETAIL_ANALISA_HARGA":"54500","DETAIL_ANALISA_TOTAL":272500}', NULL, '2015-04-07 17:38:11'),
	(241, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"117","ANALISA_ID":"37","DETAIL_ANALISA_KOEFISIEN":"5","DETAIL_ANALISA_HARGA":"54500","DETAIL_ANALISA_TOTAL":272500}', NULL, '2015-04-07 17:38:11'),
	(242, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"97","ANALISA_ID":"37","DETAIL_ANALISA_KOEFISIEN":"0.4","DETAIL_ANALISA_HARGA":"115000","DETAIL_ANALISA_TOTAL":46000}', NULL, '2015-04-07 17:38:11'),
	(243, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"97","ANALISA_ID":"37","DETAIL_ANALISA_KOEFISIEN":"0.4","DETAIL_ANALISA_HARGA":"115000","DETAIL_ANALISA_TOTAL":46000}', NULL, '2015-04-07 17:38:12'),
	(244, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"125","ANALISA_ID":"37","DETAIL_ANALISA_KOEFISIEN":"0.8","DETAIL_ANALISA_HARGA":"190000","DETAIL_ANALISA_TOTAL":152000}', NULL, '2015-04-07 17:38:12'),
	(245, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"125","ANALISA_ID":"37","DETAIL_ANALISA_KOEFISIEN":"0.8","DETAIL_ANALISA_HARGA":"190000","DETAIL_ANALISA_TOTAL":152000}', NULL, '2015-04-07 17:38:12'),
	(246, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"44","ANALISA_ID":"37","DETAIL_ANALISA_KOEFISIEN":"2","DETAIL_ANALISA_HARGA":"60000","DETAIL_ANALISA_TOTAL":120000}', NULL, '2015-04-07 17:38:12'),
	(247, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"44","ANALISA_ID":"37","DETAIL_ANALISA_KOEFISIEN":"2","DETAIL_ANALISA_HARGA":"60000","DETAIL_ANALISA_TOTAL":120000}', NULL, '2015-04-07 17:38:13'),
	(248, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"45","ANALISA_ID":"37","DETAIL_ANALISA_KOEFISIEN":"0.35","DETAIL_ANALISA_HARGA":"75000","DETAIL_ANALISA_TOTAL":26250}', NULL, '2015-04-07 17:38:13'),
	(249, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"45","ANALISA_ID":"37","DETAIL_ANALISA_KOEFISIEN":"0.35","DETAIL_ANALISA_HARGA":"75000","DETAIL_ANALISA_TOTAL":26250}', NULL, '2015-04-07 17:38:13'),
	(250, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"46","ANALISA_ID":"37","DETAIL_ANALISA_KOEFISIEN":"0.035","DETAIL_ANALISA_HARGA":"80000","DETAIL_ANALISA_TOTAL":2800}', NULL, '2015-04-07 17:38:13'),
	(251, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"46","ANALISA_ID":"37","DETAIL_ANALISA_KOEFISIEN":"0.035","DETAIL_ANALISA_HARGA":"80000","DETAIL_ANALISA_TOTAL":2800}', NULL, '2015-04-07 17:38:14'),
	(252, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"47","ANALISA_ID":"37","DETAIL_ANALISA_KOEFISIEN":"0.010","DETAIL_ANALISA_HARGA":"95000","DETAIL_ANALISA_TOTAL":950}', NULL, '2015-04-07 17:38:14'),
	(253, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"47","ANALISA_ID":"37","DETAIL_ANALISA_KOEFISIEN":"0.010","DETAIL_ANALISA_HARGA":"95000","DETAIL_ANALISA_TOTAL":950}', NULL, '2015-04-07 17:38:14'),
	(254, 'Administrator', 'administrator', 'rab/analisa/delete', 'update', 'master_analisa', '{"ANALISA_ACTIVE":0}', '{"ANALISA_ID":"37"}', '2015-04-07 17:38:46'),
	(255, 'Administrator', 'administrator', 'rab/analisa/delete', 'delete', 'master_analisa', NULL, '{"ANALISA_ID":"37"}', '2015-04-07 17:38:47'),
	(256, 'Administrator', 'administrator', 'rab/analisa/delete', 'update', 'master_analisa', '{"ANALISA_ACTIVE":0}', '{"ANALISA_ID":"36"}', '2015-04-07 17:39:39'),
	(257, 'Administrator', 'administrator', 'rab/analisa/delete', 'delete', 'master_analisa', NULL, '{"ANALISA_ID":"36"}', '2015-04-07 17:39:40'),
	(258, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'master_analisa', '{"SATUAN_NAMA":"M3","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PEK.BTNSTR-0002","ANALISA_NAMA":"Lantai kerja  (site mix)","ANALISA_TOTAL":"620500","ANALISA_ACTIVE":1}', NULL, '2015-04-07 17:42:18'),
	(259, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'master_analisa', '{"SATUAN_NAMA":"M3","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PEK.BTNSTR-0002","ANALISA_NAMA":"Lantai kerja  (site mix)","ANALISA_TOTAL":"620500","ANALISA_ACTIVE":1}', NULL, '2015-04-07 17:42:19'),
	(260, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"117","ANALISA_ID":"39","DETAIL_ANALISA_KOEFISIEN":"5","DETAIL_ANALISA_HARGA":"54500","DETAIL_ANALISA_TOTAL":272500}', NULL, '2015-04-07 17:42:20'),
	(261, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"117","ANALISA_ID":"39","DETAIL_ANALISA_KOEFISIEN":"5","DETAIL_ANALISA_HARGA":"54500","DETAIL_ANALISA_TOTAL":272500}', NULL, '2015-04-07 17:42:20'),
	(262, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"97","ANALISA_ID":"39","DETAIL_ANALISA_KOEFISIEN":"0.4","DETAIL_ANALISA_HARGA":"115000","DETAIL_ANALISA_TOTAL":46000}', NULL, '2015-04-07 17:42:20'),
	(263, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"97","ANALISA_ID":"39","DETAIL_ANALISA_KOEFISIEN":"0.4","DETAIL_ANALISA_HARGA":"115000","DETAIL_ANALISA_TOTAL":46000}', NULL, '2015-04-07 17:42:20'),
	(264, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"125","ANALISA_ID":"39","DETAIL_ANALISA_KOEFISIEN":"0.8","DETAIL_ANALISA_HARGA":"190000","DETAIL_ANALISA_TOTAL":152000}', NULL, '2015-04-07 17:42:21'),
	(265, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"125","ANALISA_ID":"39","DETAIL_ANALISA_KOEFISIEN":"0.8","DETAIL_ANALISA_HARGA":"190000","DETAIL_ANALISA_TOTAL":152000}', NULL, '2015-04-07 17:42:21'),
	(266, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"44","ANALISA_ID":"39","DETAIL_ANALISA_KOEFISIEN":"2","DETAIL_ANALISA_HARGA":"60000","DETAIL_ANALISA_TOTAL":120000}', NULL, '2015-04-07 17:42:21'),
	(267, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"44","ANALISA_ID":"39","DETAIL_ANALISA_KOEFISIEN":"2","DETAIL_ANALISA_HARGA":"60000","DETAIL_ANALISA_TOTAL":120000}', NULL, '2015-04-07 17:42:21'),
	(268, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"45","ANALISA_ID":"39","DETAIL_ANALISA_KOEFISIEN":"0.35","DETAIL_ANALISA_HARGA":"75000","DETAIL_ANALISA_TOTAL":26250}', NULL, '2015-04-07 17:42:22'),
	(269, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"45","ANALISA_ID":"39","DETAIL_ANALISA_KOEFISIEN":"0.35","DETAIL_ANALISA_HARGA":"75000","DETAIL_ANALISA_TOTAL":26250}', NULL, '2015-04-07 17:42:22'),
	(270, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"46","ANALISA_ID":"39","DETAIL_ANALISA_KOEFISIEN":"0.035","DETAIL_ANALISA_HARGA":"80000","DETAIL_ANALISA_TOTAL":2800}', NULL, '2015-04-07 17:42:22'),
	(271, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"46","ANALISA_ID":"39","DETAIL_ANALISA_KOEFISIEN":"0.035","DETAIL_ANALISA_HARGA":"80000","DETAIL_ANALISA_TOTAL":2800}', NULL, '2015-04-07 17:42:22'),
	(272, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"47","ANALISA_ID":"39","DETAIL_ANALISA_KOEFISIEN":"0.01","DETAIL_ANALISA_HARGA":"95000","DETAIL_ANALISA_TOTAL":950}', NULL, '2015-04-07 17:42:23'),
	(273, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"47","ANALISA_ID":"39","DETAIL_ANALISA_KOEFISIEN":"0.01","DETAIL_ANALISA_HARGA":"95000","DETAIL_ANALISA_TOTAL":950}', NULL, '2015-04-07 17:42:23'),
	(274, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'update', 'master_analisa', '{"SATUAN_NAMA":"M3","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PEK.BTNSTR-0002","ANALISA_NAMA":"Lantai kerja  (site mix)","ANALISA_TOTAL":"620500","ANALISA_ACTIVE":1}', '{"ANALISA_ID":"39"}', '2015-04-07 17:45:04'),
	(275, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'delete', 'detail_analisa', NULL, '{"ANALISA_ID":"39"}', '2015-04-07 17:45:05'),
	(276, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"117","ANALISA_ID":"39","DETAIL_ANALISA_KOEFISIEN":5,"DETAIL_ANALISA_HARGA":54500,"DETAIL_ANALISA_TOTAL":272500}', NULL, '2015-04-07 17:45:05'),
	(277, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"97","ANALISA_ID":"39","DETAIL_ANALISA_KOEFISIEN":0.4,"DETAIL_ANALISA_HARGA":115000,"DETAIL_ANALISA_TOTAL":46000}', NULL, '2015-04-07 17:45:06'),
	(278, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"125","ANALISA_ID":"39","DETAIL_ANALISA_KOEFISIEN":0.8,"DETAIL_ANALISA_HARGA":190000,"DETAIL_ANALISA_TOTAL":152000}', NULL, '2015-04-07 17:45:06'),
	(279, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"44","ANALISA_ID":"39","DETAIL_ANALISA_KOEFISIEN":2,"DETAIL_ANALISA_HARGA":60000,"DETAIL_ANALISA_TOTAL":120000}', NULL, '2015-04-07 17:45:07'),
	(280, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"45","ANALISA_ID":"39","DETAIL_ANALISA_KOEFISIEN":0.35,"DETAIL_ANALISA_HARGA":75000,"DETAIL_ANALISA_TOTAL":26250}', NULL, '2015-04-07 17:45:07'),
	(281, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"46","ANALISA_ID":"39","DETAIL_ANALISA_KOEFISIEN":0.035,"DETAIL_ANALISA_HARGA":80000,"DETAIL_ANALISA_TOTAL":2800}', NULL, '2015-04-07 17:45:08'),
	(282, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"47","ANALISA_ID":"39","DETAIL_ANALISA_KOEFISIEN":0.01,"DETAIL_ANALISA_HARGA":95000,"DETAIL_ANALISA_TOTAL":950}', NULL, '2015-04-07 17:45:08'),
	(283, 'Administrator', 'administrator', 'rab/analisa/delete', 'update', 'master_analisa', '{"ANALISA_ACTIVE":0}', '{"ANALISA_ID":"38"}', '2015-04-07 17:45:45'),
	(284, 'Administrator', 'administrator', 'rab/analisa/delete', 'delete', 'master_analisa', NULL, '{"ANALISA_ID":"38"}', '2015-04-07 17:45:45'),
	(285, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'master_analisa', '{"SATUAN_NAMA":"M3","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PEK.BTNSTR-0003","ANALISA_NAMA":"Membuat beton  1 Pc : 3 Ps : 5 Kr (site mix)","ANALISA_TOTAL":"632000","ANALISA_ACTIVE":1}', NULL, '2015-04-07 17:49:37'),
	(286, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"117","ANALISA_ID":"40","DETAIL_ANALISA_KOEFISIEN":"5","DETAIL_ANALISA_HARGA":"54500","DETAIL_ANALISA_TOTAL":272500}', NULL, '2015-04-07 17:49:38'),
	(287, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"97","ANALISA_ID":"40","DETAIL_ANALISA_KOEFISIEN":"0.5","DETAIL_ANALISA_HARGA":"115000","DETAIL_ANALISA_TOTAL":57500}', NULL, '2015-04-07 17:49:38'),
	(288, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"125","ANALISA_ID":"40","DETAIL_ANALISA_KOEFISIEN":"0.8","DETAIL_ANALISA_HARGA":"190000","DETAIL_ANALISA_TOTAL":152000}', NULL, '2015-04-07 17:49:39'),
	(289, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"44","ANALISA_ID":"40","DETAIL_ANALISA_KOEFISIEN":"2","DETAIL_ANALISA_HARGA":"60000","DETAIL_ANALISA_TOTAL":120000}', NULL, '2015-04-07 17:49:39'),
	(290, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"45","ANALISA_ID":"40","DETAIL_ANALISA_KOEFISIEN":"0.35","DETAIL_ANALISA_HARGA":"75000","DETAIL_ANALISA_TOTAL":26250}', NULL, '2015-04-07 17:49:40'),
	(291, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"46","ANALISA_ID":"40","DETAIL_ANALISA_KOEFISIEN":"0.035","DETAIL_ANALISA_HARGA":"80000","DETAIL_ANALISA_TOTAL":2800}', NULL, '2015-04-07 17:49:40'),
	(292, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"47","ANALISA_ID":"40","DETAIL_ANALISA_KOEFISIEN":"0.01","DETAIL_ANALISA_HARGA":"95000","DETAIL_ANALISA_TOTAL":950}', NULL, '2015-04-07 17:49:41'),
	(293, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'master_analisa', '{"SATUAN_NAMA":"M3","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PEK.BTNSTR-0004","ANALISA_NAMA":"  Membuat  Beton   1 : 2 : 3","ANALISA_TOTAL":"682100","ANALISA_ACTIVE":1}', NULL, '2015-04-07 17:54:51'),
	(294, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"117","ANALISA_ID":"41","DETAIL_ANALISA_KOEFISIEN":"5.8","DETAIL_ANALISA_HARGA":"54500","DETAIL_ANALISA_TOTAL":316100}', NULL, '2015-04-07 17:54:51'),
	(295, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"97","ANALISA_ID":"41","DETAIL_ANALISA_KOEFISIEN":"0.54","DETAIL_ANALISA_HARGA":"115000","DETAIL_ANALISA_TOTAL":62100}', NULL, '2015-04-07 17:54:52'),
	(296, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"125","ANALISA_ID":"41","DETAIL_ANALISA_KOEFISIEN":"0.81","DETAIL_ANALISA_HARGA":"190000","DETAIL_ANALISA_TOTAL":153900}', NULL, '2015-04-07 17:54:52'),
	(297, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"44","ANALISA_ID":"41","DETAIL_ANALISA_KOEFISIEN":"2","DETAIL_ANALISA_HARGA":"60000","DETAIL_ANALISA_TOTAL":120000}', NULL, '2015-04-07 17:54:53'),
	(298, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"45","ANALISA_ID":"41","DETAIL_ANALISA_KOEFISIEN":"0.35","DETAIL_ANALISA_HARGA":"75000","DETAIL_ANALISA_TOTAL":26250}', NULL, '2015-04-07 17:54:54'),
	(299, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"46","ANALISA_ID":"41","DETAIL_ANALISA_KOEFISIEN":"0.035","DETAIL_ANALISA_HARGA":"80000","DETAIL_ANALISA_TOTAL":2800}', NULL, '2015-04-07 17:54:54'),
	(300, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"47","ANALISA_ID":"41","DETAIL_ANALISA_KOEFISIEN":"0.01","DETAIL_ANALISA_HARGA":"95000","DETAIL_ANALISA_TOTAL":950}', NULL, '2015-04-07 17:54:55'),
	(301, 'Administrator', 'administrator', 'master/barang/insert', 'insert', 'master_barang', '{"SATUAN_NAMA":"M3","KATEGORI_BARANG_ID":"1","BARANG_KODE":"","BARANG_NAMA":"Cor K-225 Ready mix t.10 cm","BARANG_KETERANGAN":"","BARANG_HARGA":"759033"}', NULL, '2015-04-07 18:01:38'),
	(302, 'Administrator', 'administrator', 'master/barang/insert', 'insert', 'master_barang', '{"SATUAN_NAMA":"Kg","KATEGORI_BARANG_ID":"1","BARANG_KODE":"","BARANG_NAMA":"Besi 10-150","BARANG_KETERANGAN":"","BARANG_HARGA":"7950"}', NULL, '2015-04-07 18:03:02'),
	(303, 'Administrator', 'administrator', 'master/upah/insert', 'insert', 'master_upah', '{"LOKASI_UPAH_ID":"1","SATUAN_UPAH_ID":"4","UPAH_KODE":"UPH0014","UPAH_HARGA":"35000","UPAH_NAMA":"Upah Cor K-225 Ready mix t.15 cm"}', NULL, '2015-04-07 18:06:53'),
	(304, 'Administrator', 'administrator', 'master/upah/insert', 'insert', 'master_upah', '{"LOKASI_UPAH_ID":"1","SATUAN_UPAH_ID":"3","UPAH_KODE":"UPH0015","UPAH_HARGA":"2000","UPAH_NAMA":"Upah pembesian"}', NULL, '2015-04-07 18:08:11'),
	(305, 'Administrator', 'administrator', 'master/upah/update', 'update', 'master_upah', '{"LOKASI_UPAH_ID":"1","SATUAN_UPAH_ID":"5","UPAH_KODE":"UPH0015","UPAH_HARGA":"2000","UPAH_NAMA":"Upah pembesian"}', '{"UPAH_ID":"50"}', '2015-04-07 18:08:46'),
	(306, 'Administrator', 'administrator', 'master/upah/insert', 'insert', 'master_upah', '{"LOKASI_UPAH_ID":"1","SATUAN_UPAH_ID":"3","UPAH_KODE":"UPH0016","UPAH_HARGA":"1500","UPAH_NAMA":"Upah Plastic sheet"}', NULL, '2015-04-07 18:09:39'),
	(307, 'Administrator', 'administrator', 'master/upah/insert', 'insert', 'master_upah', '{"LOKASI_UPAH_ID":"1","SATUAN_UPAH_ID":"3","UPAH_KODE":"UPH0017","UPAH_HARGA":"6000","UPAH_NAMA":"Upah Floor hardenner ex. Sika natural color 3 kg\\/m2"}', NULL, '2015-04-07 18:10:13'),
	(308, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'master_analisa', '{"SATUAN_NAMA":"M3","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PEK.BTNSTR-0005","ANALISA_NAMA":"Cor plat lantai 15 cm (Ready Mix) K-225","ANALISA_TOTAL":"2158942.99","ANALISA_ACTIVE":1}', NULL, '2015-04-07 18:11:43'),
	(309, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"103","ANALISA_ID":"42","DETAIL_ANALISA_KOEFISIEN":"1.03","DETAIL_ANALISA_HARGA":"759033","DETAIL_ANALISA_TOTAL":781803.99}', NULL, '2015-04-07 18:11:44'),
	(310, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"62","ANALISA_ID":"42","DETAIL_ANALISA_KOEFISIEN":"126.04","DETAIL_ANALISA_HARGA":"7950","DETAIL_ANALISA_TOTAL":1002018}', NULL, '2015-04-07 18:11:44'),
	(311, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"162","ANALISA_ID":"42","DETAIL_ANALISA_KOEFISIEN":"6.67","DETAIL_ANALISA_HARGA":"1800","DETAIL_ANALISA_TOTAL":12006}', NULL, '2015-04-07 18:11:45'),
	(312, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"163","ANALISA_ID":"42","DETAIL_ANALISA_KOEFISIEN":"6.67","DETAIL_ANALISA_HARGA":"9000","DETAIL_ANALISA_TOTAL":60030}', NULL, '2015-04-07 18:11:46'),
	(313, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"49","ANALISA_ID":"42","DETAIL_ANALISA_KOEFISIEN":"1","DETAIL_ANALISA_HARGA":"35000","DETAIL_ANALISA_TOTAL":35000}', NULL, '2015-04-07 18:11:47'),
	(314, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"50","ANALISA_ID":"42","DETAIL_ANALISA_KOEFISIEN":"126.04","DETAIL_ANALISA_HARGA":"2000","DETAIL_ANALISA_TOTAL":252080}', NULL, '2015-04-07 18:11:48'),
	(315, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"51","ANALISA_ID":"42","DETAIL_ANALISA_KOEFISIEN":"6.67","DETAIL_ANALISA_HARGA":"1500","DETAIL_ANALISA_TOTAL":10005}', NULL, '2015-04-07 18:11:48'),
	(316, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"52","ANALISA_ID":"42","DETAIL_ANALISA_KOEFISIEN":"1","DETAIL_ANALISA_HARGA":"6000","DETAIL_ANALISA_TOTAL":6000}', NULL, '2015-04-07 18:11:49'),
	(317, 'Administrator', 'administrator', 'projects/mainproject/update', 'update', 'main_project', '{"MAIN_PROJECT_NAMA":"THEME PARK WARU","MAIN_PROJECT_KODE":"MPRO0004","MAIN_PROJECT_DESCRIPTION":"Sebuag proyek besar pembangunan wahana hiburan Surabaya-Sidoarjo"}', '{"MAIN_PROJECT_ID":"4"}', '2015-04-07 18:33:38'),
	(318, 'Administrator', 'administrator', 'projects/mainproject/update', 'update', 'main_project', '{"MAIN_PROJECT_NAMA":"THEME PARK WARU","MAIN_PROJECT_KODE":"MPRO0001","MAIN_PROJECT_DESCRIPTION":"Sebuag proyek besar pembangunan wahana hiburan Surabaya-Sidoarjo"}', '{"MAIN_PROJECT_ID":"4"}', '2015-04-07 18:34:24'),
	(319, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'rab_transaction', '{"RAB_NAMA":"RAB_GERBANG","RAB_KODE":"001\\/RAB\\/PRO00001\\/IV\\/2015","ESTIMATOR_ID":"1","PROJECT_ID":"1","RAB_TOTAL":"37400000","RAB_ACTIVE":1,"RAB_STATUS_APPROVAL_ID":1,"RAB_AFTER_OVERHEAD":39270000,"LOKASI_UPAH_ID":"1"}', NULL, '2015-04-07 19:14:00'),
	(320, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"PERSIAPAN","KATEGORI_PEKERJAAN_URUTAN":1}', NULL, '2015-04-07 19:14:02'),
	(321, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"54","ANALISA_ID":"25","RAB_ID":"5","DETAIL_PEKERJAAN_VOLUME":200,"DETAIL_PEKERJAAN_TOTAL":9000000,"DETAIL_PEKERJAAN_URUTAN":1}', NULL, '2015-04-07 19:14:03'),
	(322, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"54","ANALISA_ID":"26","RAB_ID":"5","DETAIL_PEKERJAAN_VOLUME":200,"DETAIL_PEKERJAAN_TOTAL":3500000,"DETAIL_PEKERJAAN_URUTAN":2}', NULL, '2015-04-07 19:14:04'),
	(323, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"54","ANALISA_ID":"27","RAB_ID":"5","DETAIL_PEKERJAAN_VOLUME":200,"DETAIL_PEKERJAAN_TOTAL":24900000,"DETAIL_PEKERJAAN_URUTAN":3}', NULL, '2015-04-07 19:14:06'),
	(324, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'update', 'rab_transaction', '{"RAB_MATERIAL":18900000,"RAB_UPAH":18500000}', '{"RAB_ID":"5"}', '2015-04-07 19:14:10'),
	(325, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'update', 'rab_transaction', '{"RAB_NAMA":"RAB_GERBANG","RAB_KODE":"001\\/RAB\\/PRO00001\\/IV\\/2015","PROJECT_ID":"1","RAB_TOTAL":"230768782.10000002","RAB_ACTIVE":1,"RAB_STATUS_APPROVAL_ID":1,"RAB_AFTER_OVERHEAD":242307221.205,"LOKASI_UPAH_ID":"1"}', '{"RAB_ID":"5"}', '2015-04-07 19:16:16'),
	(326, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'delete', 'detail_pekerjaan', NULL, '{"RAB_ID":"5"}', '2015-04-07 19:16:16'),
	(327, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"PERSIAPAN","KATEGORI_PEKERJAAN_URUTAN":"1"}', NULL, '2015-04-07 19:16:17'),
	(328, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"55","ANALISA_ID":"25","RAB_ID":"5","DETAIL_PEKERJAAN_VOLUME":200,"DETAIL_PEKERJAAN_TOTAL":9000000,"DETAIL_PEKERJAAN_URUTAN":1}', NULL, '2015-04-07 19:16:18'),
	(329, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"55","ANALISA_ID":"26","RAB_ID":"5","DETAIL_PEKERJAAN_VOLUME":200,"DETAIL_PEKERJAAN_TOTAL":3500000,"DETAIL_PEKERJAAN_URUTAN":2}', NULL, '2015-04-07 19:16:19'),
	(330, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"55","ANALISA_ID":"27","RAB_ID":"5","DETAIL_PEKERJAAN_VOLUME":200,"DETAIL_PEKERJAAN_TOTAL":24900000,"DETAIL_PEKERJAAN_URUTAN":3}', NULL, '2015-04-07 19:16:19'),
	(331, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"PONDASI","KATEGORI_PEKERJAAN_URUTAN":2}', NULL, '2015-04-07 19:16:20'),
	(332, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"56","ANALISA_ID":"33","RAB_ID":"5","DETAIL_PEKERJAAN_VOLUME":75,"DETAIL_PEKERJAAN_TOTAL":38967937.5,"DETAIL_PEKERJAAN_URUTAN":1}', NULL, '2015-04-07 19:16:21'),
	(333, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"56","ANALISA_ID":"34","RAB_ID":"5","DETAIL_PEKERJAAN_VOLUME":75,"DETAIL_PEKERJAAN_TOTAL":8578125,"DETAIL_PEKERJAAN_URUTAN":2}', NULL, '2015-04-07 19:16:21'),
	(334, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"PEMBANGUNAN","KATEGORI_PEKERJAAN_URUTAN":3}', NULL, '2015-04-07 19:16:22'),
	(335, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"57","ANALISA_ID":"39","RAB_ID":"5","DETAIL_PEKERJAAN_VOLUME":50,"DETAIL_PEKERJAAN_TOTAL":31025000,"DETAIL_PEKERJAAN_URUTAN":1}', NULL, '2015-04-07 19:16:23'),
	(336, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"57","ANALISA_ID":"40","RAB_ID":"5","DETAIL_PEKERJAAN_VOLUME":45,"DETAIL_PEKERJAAN_TOTAL":28440000,"DETAIL_PEKERJAAN_URUTAN":2}', NULL, '2015-04-07 19:16:23'),
	(337, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"57","ANALISA_ID":"42","RAB_ID":"5","DETAIL_PEKERJAAN_VOLUME":40,"DETAIL_PEKERJAAN_TOTAL":86357719.6,"DETAIL_PEKERJAAN_URUTAN":3}', NULL, '2015-04-07 19:16:24'),
	(338, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'update', 'rab_transaction', '{"RAB_MATERIAL":344505686.9,"RAB_UPAH":62108400}', '{"RAB_ID":"5"}', '2015-04-07 19:16:26'),
	(339, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'update', 'master_analisa', '{"SATUAN_NAMA":"M3","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PEK.BTNSTR-0005","ANALISA_NAMA":"Cor plat lantai 15 cm (Ready Mix) K-225","ANALISA_TOTAL":"2158942.99","ANALISA_ACTIVE":1}', '{"ANALISA_ID":"42"}', '2015-04-07 20:18:32'),
	(340, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'delete', 'detail_analisa', NULL, '{"ANALISA_ID":"42"}', '2015-04-07 20:18:32'),
	(341, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"103","ANALISA_ID":"42","DETAIL_ANALISA_KOEFISIEN":"6.67","DETAIL_ANALISA_HARGA":"1800","DETAIL_ANALISA_TOTAL":12006}', NULL, '2015-04-07 20:18:33'),
	(342, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"163","ANALISA_ID":"42","DETAIL_ANALISA_KOEFISIEN":"126.04","DETAIL_ANALISA_HARGA":"7950","DETAIL_ANALISA_TOTAL":1002018}', NULL, '2015-04-07 20:18:34'),
	(343, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"62","ANALISA_ID":"42","DETAIL_ANALISA_KOEFISIEN":"6.67","DETAIL_ANALISA_HARGA":"9000","DETAIL_ANALISA_TOTAL":60030}', NULL, '2015-04-07 20:18:35'),
	(344, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"162","ANALISA_ID":"42","DETAIL_ANALISA_KOEFISIEN":"1.03","DETAIL_ANALISA_HARGA":"759033","DETAIL_ANALISA_TOTAL":781803.99}', NULL, '2015-04-07 20:18:35'),
	(345, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"49","ANALISA_ID":"42","DETAIL_ANALISA_KOEFISIEN":1,"DETAIL_ANALISA_HARGA":35000,"DETAIL_ANALISA_TOTAL":35000}', NULL, '2015-04-07 20:18:36'),
	(346, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"50","ANALISA_ID":"42","DETAIL_ANALISA_KOEFISIEN":126.04,"DETAIL_ANALISA_HARGA":2000,"DETAIL_ANALISA_TOTAL":252080}', NULL, '2015-04-07 20:18:36'),
	(347, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"51","ANALISA_ID":"42","DETAIL_ANALISA_KOEFISIEN":6.67,"DETAIL_ANALISA_HARGA":1500,"DETAIL_ANALISA_TOTAL":10005}', NULL, '2015-04-07 20:18:37'),
	(348, 'Administrator', 'administrator', 'rab/analisa/updateAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"52","ANALISA_ID":"42","DETAIL_ANALISA_KOEFISIEN":1,"DETAIL_ANALISA_HARGA":6000,"DETAIL_ANALISA_TOTAL":6000}', NULL, '2015-04-07 20:18:38'),
	(349, 'Administrator', 'administrator', 'master/gudang/insert', 'insert', 'master_gudang', '{"GUDANG_KODE":"GUD00001","GUDANG_NAMA":"GUDANG STE","GUDANG_LOKASI":"SURABAYA"}', NULL, '2015-04-07 20:31:12'),
	(350, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'update', 'rab_transaction', '{"RAB_NAMA":"RAB_GERBANG","RAB_KODE":"001\\/RAB\\/PRO00001\\/IV\\/2015","PROJECT_ID":"1","RAB_TOTAL":"235768782.1","RAB_ACTIVE":1,"RAB_STATUS_APPROVAL_ID":1,"RAB_AFTER_OVERHEAD":247557221.205,"LOKASI_UPAH_ID":"1"}', '{"RAB_ID":"5"}', '2015-04-07 20:36:03'),
	(351, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'delete', 'detail_pekerjaan', NULL, '{"RAB_ID":"5"}', '2015-04-07 20:36:03'),
	(352, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"PERSIAPAN","KATEGORI_PEKERJAAN_URUTAN":"1"}', NULL, '2015-04-07 20:36:04'),
	(353, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"58","ANALISA_ID":"25","RAB_ID":"5","DETAIL_PEKERJAAN_VOLUME":200,"DETAIL_PEKERJAAN_TOTAL":9000000,"DETAIL_PEKERJAAN_URUTAN":1}', NULL, '2015-04-07 20:36:05'),
	(354, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"58","ANALISA_ID":"26","RAB_ID":"5","DETAIL_PEKERJAAN_VOLUME":200,"DETAIL_PEKERJAAN_TOTAL":3500000,"DETAIL_PEKERJAAN_URUTAN":2}', NULL, '2015-04-07 20:36:05'),
	(355, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"58","ANALISA_ID":"27","RAB_ID":"5","DETAIL_PEKERJAAN_VOLUME":200,"DETAIL_PEKERJAAN_TOTAL":24900000,"DETAIL_PEKERJAAN_URUTAN":3}', NULL, '2015-04-07 20:36:06'),
	(356, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"PONDASI","KATEGORI_PEKERJAAN_URUTAN":"2"}', NULL, '2015-04-07 20:36:06'),
	(357, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"59","ANALISA_ID":"33","RAB_ID":"5","DETAIL_PEKERJAAN_VOLUME":75,"DETAIL_PEKERJAAN_TOTAL":38967937.5,"DETAIL_PEKERJAAN_URUTAN":1}', NULL, '2015-04-07 20:36:07'),
	(358, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"59","ANALISA_ID":"34","RAB_ID":"5","DETAIL_PEKERJAAN_VOLUME":75,"DETAIL_PEKERJAAN_TOTAL":8578125,"DETAIL_PEKERJAAN_URUTAN":2}', NULL, '2015-04-07 20:36:08'),
	(359, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"PEMBANGUNAN","KATEGORI_PEKERJAAN_URUTAN":"3"}', NULL, '2015-04-07 20:36:08'),
	(360, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"60","ANALISA_ID":"39","RAB_ID":"5","DETAIL_PEKERJAAN_VOLUME":50,"DETAIL_PEKERJAAN_TOTAL":31025000,"DETAIL_PEKERJAAN_URUTAN":1}', NULL, '2015-04-07 20:36:09'),
	(361, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"60","ANALISA_ID":"40","RAB_ID":"5","DETAIL_PEKERJAAN_VOLUME":45,"DETAIL_PEKERJAAN_TOTAL":28440000,"DETAIL_PEKERJAAN_URUTAN":2}', NULL, '2015-04-07 20:36:10'),
	(362, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"60","ANALISA_ID":"42","RAB_ID":"5","DETAIL_PEKERJAAN_VOLUME":40,"DETAIL_PEKERJAAN_TOTAL":86357719.6,"DETAIL_PEKERJAAN_URUTAN":3}', NULL, '2015-04-07 20:36:10'),
	(363, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"PEMBERSIHAN","KATEGORI_PEKERJAAN_URUTAN":4}', NULL, '2015-04-07 20:36:11'),
	(364, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'subcon', '{"SUBCON_NAMA":"Sewa Listrik dan Penerangan","SUBCON_HARGA":1000000,"SATUAN_NAMA":"Ball"}', NULL, '2015-04-07 20:36:12'),
	(365, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"61","SUBCON_ID":"9","RAB_ID":"5","DETAIL_PEKERJAAN_VOLUME":5,"DETAIL_PEKERJAAN_TOTAL":5000000,"DETAIL_PEKERJAAN_URUTAN":1}', NULL, '2015-04-07 20:36:13'),
	(366, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'update', 'rab_transaction', '{"RAB_MATERIAL":173660382.1,"RAB_UPAH":62108400}', '{"RAB_ID":"5"}', '2015-04-07 20:36:14'),
	(367, 'Administrator', 'administrator', 'master/overhead/simpanOverhead', 'insert', 'overhead', '{"OVERHEAD_NAMA":"OVERHEAD_RAB_GERBANG","OVERHEAD_KODE":"001\\/MOV\\/RAB_TORNADO\\/IV\\/2015","RAB_ID":"5","OVERHEAD_TOTAL":"3590000","OVERHEAD_TIPE":"barang","OVERHEAD_ACTIVE":1}', NULL, '2015-04-07 20:49:58'),
	(368, 'Administrator', 'administrator', 'master/overhead/simpanOverhead', 'insert', 'paket_overhead_material', '{"PAKET_OVERHEAD_MATERIAL_NAMA":"Sewa Alat Berat","PAKET_OVERHEAD_MATERIAL_HARGA":"500000","SATUAN_NAMA":"Set"}', NULL, '2015-04-07 20:49:59'),
	(369, 'Administrator', 'administrator', 'master/overhead/simpanOverhead', 'insert', 'detail_overhead', '{"OVERHEAD_ID":"1","PAKET_OVERHEAD_MATERIAL_ID":"4","DETAIL_OVERHEAD_KOEFISIEN":"5","DETAIL_OVERHEAD_HARGA":"500000","DETAIL_OVERHEAD_TOTAL":2500000}', NULL, '2015-04-07 20:50:00'),
	(370, 'Administrator', 'administrator', 'master/overhead/simpanOverhead', 'insert', 'detail_overhead', '{"OVERHEAD_ID":"1","BARANG_ID":"117","DETAIL_OVERHEAD_KOEFISIEN":"20","DETAIL_OVERHEAD_HARGA":"54500","DETAIL_OVERHEAD_TOTAL":1090000}', NULL, '2015-04-07 20:50:01'),
	(371, 'Administrator', 'administrator', 'master/top/insert', 'insert', 'top', '{"TOP_KODE":"1D","TOP_VALUE":"1","TOP_DESCRIPTION":"1 Hari"}', NULL, '2015-04-07 21:03:43'),
	(372, 'Administrator', 'administrator', 'master/top/insert', 'insert', 'top', '{"TOP_KODE":"1D","TOP_VALUE":"1","TOP_DESCRIPTION":"1 Hari"}', NULL, '2015-04-07 21:03:43'),
	(373, 'Administrator', 'administrator', 'master/top/insert', 'insert', 'top', '{"TOP_KODE":"7D","TOP_VALUE":"7","TOP_DESCRIPTION":"7 Hari"}', NULL, '2015-04-07 21:04:07'),
	(374, 'Administrator', 'administrator', 'master/top/update', 'update', 'top', '{"TOP_KODE":"3D","TOP_VALUE":"3","TOP_DESCRIPTION":"3 Hari"}', '{"TOP_ID":"15"}', '2015-04-07 21:04:59'),
	(375, 'Administrator', 'administrator', 'master/supplier/insert', 'insert', 'master_supplier', '{"KATEGORI_SUPPLIER_ID":"3","SUPPLIER_KODE":"SUP0001","SUPPLIER_NAMA":"PT BANGUNAN JAYA","TOP_KODE":"7D","SUPPLIER_ALAMAT":"SURABAYA","SUPPLIER_DESKRIPSI":""}', NULL, '2015-04-07 21:07:27'),
	(376, 'Administrator', 'administrator', 'p-material/po/simpanPo', 'insert', 'purchase_order', '{"SUPPLIER_ID":"5","STATUS_PO_ID":"2","PAJAK_ID":"2","GUDANG_ID":"13","PURCHASE_ORDER_KODE":" 001\\/PO\\/RAB_GERBANG\\/IV\\/2015","PURCHASE_ORDER_TOTAL":"2070000"}', NULL, '2015-04-07 22:58:33'),
	(377, 'Administrator', 'administrator', 'p-material/po/simpanPo', 'insert', 'purchase_order', '{"SUPPLIER_ID":"5","STATUS_PO_ID":"2","PAJAK_ID":"2","GUDANG_ID":"13","PURCHASE_ORDER_KODE":" 001\\/PO\\/RAB_GERBANG\\/IV\\/2015","PURCHASE_ORDER_TOTAL":"2070000"}', NULL, '2015-04-07 23:01:15'),
	(378, 'Administrator', 'administrator', 'p-material/po/simpanPo', 'insert', 'purchase_order', '{"TOP_ID":"16","SUPPLIER_ID":"5","STATUS_PO_ID":"2","PAJAK_ID":"2","GUDANG_ID":"13","PURCHASE_ORDER_KODE":"001\\/PP\\/RAB_GERBANG\\/IV\\/2015","PURCHASE_ORDER_TOTAL":"4398750"}', NULL, '2015-04-07 23:26:55'),
	(379, 'Administrator', 'administrator', 'p-material/po/simpanPo', 'insert', 'detail_po', '{"PURCHASE_ORDER_ID":"8","BARANG_ID":"97","PERMINTAAN_PEMBELIAN_ID":"2","VOLUME_PO":42.5,"HARGA_MATERI_PO":115000,"HARGA_AWAL":4887500,"DISKON1":0,"DISKON2":0,"DISKON3":0,"HARGA_STLH_DISKON":4887500,"HARGA_PAJAK":488750,"HARGA_FINAL":4398750}', NULL, '2015-04-07 23:26:56'),
	(380, 'Administrator', 'administrator', 'p-material/po/simpanPo', 'insert', 'purchase_order', '{"TOP_ID":"16","SUPPLIER_ID":"5","STATUS_PO_ID":"2","PAJAK_ID":"2","GUDANG_ID":"13","PURCHASE_ORDER_KODE":"001\\/POOV\\/RAB_GERBANG\\/IV\\/2015","PURCHASE_ORDER_TOTAL":"0"}', NULL, '2015-04-07 23:34:40'),
	(381, 'Administrator', 'administrator', 'p-material/po/simpanPo', 'insert', 'detail_po', '{"PURCHASE_ORDER_ID":"9","BARANG_ID":"4","PERMINTAAN_PEMBELIAN_ID":"4","VOLUME_PO":0,"HARGA_MATERI_PO":125000,"HARGA_AWAL":0,"DISKON1":0,"DISKON2":0,"DISKON3":0,"HARGA_STLH_DISKON":0,"HARGA_PAJAK":0,"HARGA_FINAL":0}', NULL, '2015-04-07 23:34:41'),
	(382, 'Administrator', 'administrator', 'p-material/po/simpanPo', 'insert', 'detail_po', '{"PURCHASE_ORDER_ID":"9","BARANG_ID":"117","PERMINTAAN_PEMBELIAN_ID":"4","VOLUME_PO":0,"HARGA_MATERI_PO":54500,"HARGA_AWAL":0,"DISKON1":0,"DISKON2":0,"DISKON3":0,"HARGA_STLH_DISKON":0,"HARGA_PAJAK":0,"HARGA_FINAL":0}', NULL, '2015-04-07 23:34:42'),
	(383, 'Administrator', 'administrator', 'p-material/po/simpanPo', 'insert', 'purchase_order', '{"TOP_ID":"16","SUPPLIER_ID":"5","STATUS_PO_ID":"2","PAJAK_ID":"2","GUDANG_ID":"13","PURCHASE_ORDER_KODE":"001\\/POOV\\/RAB_GERBANG\\/IV\\/2015","PURCHASE_ORDER_TOTAL":"1715000"}', NULL, '2015-04-07 23:41:31'),
	(384, 'Administrator', 'administrator', 'p-material/po/simpanPo', 'insert', 'detail_po', '{"PURCHASE_ORDER_ID":"10","BARANG_ID":"4","PERMINTAAN_PEMBELIAN_ID":"4","VOLUME_PO":5,"HARGA_MATERI_PO":125000,"HARGA_AWAL":625000,"DISKON1":0,"DISKON2":0,"DISKON3":0,"HARGA_STLH_DISKON":625000,"HARGA_PAJAK":0,"HARGA_FINAL":625000}', NULL, '2015-04-07 23:41:33'),
	(385, 'Administrator', 'administrator', 'p-material/po/simpanPo', 'insert', 'detail_po', '{"PURCHASE_ORDER_ID":"10","BARANG_ID":"117","PERMINTAAN_PEMBELIAN_ID":"4","VOLUME_PO":20,"HARGA_MATERI_PO":54500,"HARGA_AWAL":1090000,"DISKON1":0,"DISKON2":0,"DISKON3":0,"HARGA_STLH_DISKON":1090000,"HARGA_PAJAK":0,"HARGA_FINAL":1090000}', NULL, '2015-04-07 23:41:34'),
	(386, 'Administrator', 'administrator', 'p-material/lpb/newLPB', 'insert', 'penerimaan_barang', '{"PENERIMAAN_BARANG_KODE":"LPB00001","LPB_SURAT_JALAN":"777777","LPB_KENDARAAN":"L 123 KK","STATUS_LPB_ID":2}', NULL, '2015-04-08 09:28:28'),
	(387, 'Administrator', 'administrator', 'p-material/lpb/newLPB', 'insert', 'penerimaan_barang', '{"PENERIMAAN_BARANG_KODE":"LPB00001","LPB_SURAT_JALAN":"777777","LPB_KENDARAAN":"L 123 KK","STATUS_LPB_ID":2}', NULL, '2015-04-08 09:29:42'),
	(388, 'Administrator', 'administrator', 'p-material/lpb/newLPB', 'insert', 'penerimaan_barang', '{"PENERIMAAN_BARANG_KODE":"LPB00001","LPB_SURAT_JALAN":"777777","LPB_KENDARAAN":"L 123 KK","STATUS_LPB_ID":2}', NULL, '2015-04-08 09:41:13'),
	(389, 'Administrator', 'administrator', 'p-material/lpb/newLPB', 'insert', 'penerimaan_barang', '{"PENERIMAAN_BARANG_KODE":"LPB00001","LPB_SURAT_JALAN":"888888","LPB_KENDARAAN":"L 123 KK","STATUS_LPB_ID":2}', NULL, '2015-04-08 10:39:02'),
	(390, 'Administrator', 'administrator', 'p-material/lpb/newLPB', 'insert', 'detail_lpb', '{"PENERIMAAN_BARANG_ID":9,"BARANG_ID":"97","VOLUME_LPB":"42.5","PO_ID":"8"}', NULL, '2015-04-08 10:39:03'),
	(391, 'Administrator', 'administrator', 'p-material/lpb/newLPB', 'insert', 'stok', '{"RAB_ID":"5","BARANG_ID":"97","VOLUME":"42.5"}', NULL, '2015-04-08 10:39:04'),
	(392, 'Administrator', 'administrator', 'p-material/lpb/newLPB', 'insert', 'penerimaan_barang', '{"PENERIMAAN_BARANG_KODE":"LPB12016","LPB_SURAT_JALAN":"364552","LPB_KENDARAAN":"L 123 KK","STATUS_LPB_ID":2}', NULL, '2015-04-08 10:50:37'),
	(393, 'Administrator', 'administrator', 'p-material/lpb/newLPB', 'insert', 'detail_lpb', '{"PENERIMAAN_BARANG_ID":10,"BARANG_ID":"4","VOLUME_LPB":"5","PO_ID":"10"}', NULL, '2015-04-08 10:50:38'),
	(394, 'Administrator', 'administrator', 'p-material/lpb/newLPB', 'insert', 'stok', '{"RAB_ID":"5","BARANG_ID":"4","VOLUME":"5"}', NULL, '2015-04-08 10:50:39'),
	(395, 'Administrator', 'administrator', 'p-material/lpb/newLPB', 'insert', 'detail_lpb', '{"PENERIMAAN_BARANG_ID":10,"BARANG_ID":"117","VOLUME_LPB":"20","PO_ID":"10"}', NULL, '2015-04-08 10:50:39'),
	(396, 'Administrator', 'administrator', 'p-material/lpb/newLPB', 'insert', 'stok', '{"RAB_ID":"5","BARANG_ID":"117","VOLUME":"20"}', NULL, '2015-04-08 10:50:40'),
	(397, 'Administrator', 'administrator', 'p-material/bpm/BPMAdd', 'insert', 'bpm', '{"BPM_KODE":"BPM00001","BPM_KETERANGAN":false,"STATUS_BPM_ID":1}', NULL, '2015-04-08 11:04:58'),
	(398, 'Administrator', 'administrator', 'p-material/bpm/BPMAdd', 'update', 'stok', '{"VOLUME":5}', '{"RAB_ID":5,"BARANG_ID":117}', '2015-04-08 11:04:59'),
	(399, 'Administrator', 'administrator', 'p-material/bpm/BPMAdd', 'update', 'stok', '{"VOLUME":5}', '{"RAB_ID":5,"BARANG_ID":97}', '2015-04-08 11:05:00'),
	(400, 'Administrator', 'administrator', 'p-material/bpm/BPMAdd', 'update', 'stok', '{"VOLUME":2}', '{"RAB_ID":5,"BARANG_ID":4}', '2015-04-08 11:05:02'),
	(401, 'Administrator', 'administrator', 'estimasi/estimasi/save', 'update', 'rab_transaction', '{"ESTIMASI_JUMLAH_ORANG":1,"ESTIMASI_CUACA":1,"ESTIMASI_UMUR_BANGUNAN":1,"ESTIMASI_TOTAL_WAKTU":2146}', '{"RAB_ID":"5"}', '2015-04-08 13:12:19'),
	(402, 'Administrator', 'administrator', 'estimasi/estimasi/save', 'update', 'rab_transaction', '{"ESTIMASI_JUMLAH_ORANG":1,"ESTIMASI_CUACA":1,"ESTIMASI_UMUR_BANGUNAN":1,"ESTIMASI_TOTAL_WAKTU":2146}', '{"RAB_ID":"5"}', '2015-04-08 13:12:19'),
	(403, 'Administrator', 'administrator', 'estimasi/estimasi/validate', 'update', 'rab_transaction', '{"VALIDATOR_ID":"1","RAB_STATUS_APPROVAL_ID":2}', '{"RAB_ID":"5"}', '2015-04-08 13:12:21'),
	(404, 'Administrator', 'administrator', 'projects/mainproject/addNew', 'insert', 'main_project', '{"MAIN_PROJECT_NAMA":"pembangunan j","MAIN_PROJECT_KODE":"","MAIN_PROJECT_DESCRIPTION":"","MAIN_PROJECT_ACTIVE":1,"PERUSAHAAN_ID":"3"}', NULL, '2015-04-08 13:22:18'),
	(405, 'Administrator', 'administrator', 'projects/mainproject/addNew', 'insert', 'main_project', '{"MAIN_PROJECT_NAMA":"PEMBANGUNAN KANTOR","MAIN_PROJECT_KODE":"","MAIN_PROJECT_DESCRIPTION":"Pembangunan Kantor","MAIN_PROJECT_ACTIVE":1,"PERUSAHAAN_ID":"3"}', NULL, '2015-04-08 13:22:22'),
	(406, 'Administrator', 'administrator', 'projects/mainproject/addNew', 'insert', 'main_project', '{"MAIN_PROJECT_NAMA":"pembangunan kantor","MAIN_PROJECT_KODE":"","MAIN_PROJECT_DESCRIPTION":"","MAIN_PROJECT_ACTIVE":1,"PERUSAHAAN_ID":"3"}', NULL, '2015-04-08 13:23:05'),
	(407, 'Administrator', 'administrator', 'projects/mainproject/addNew', 'insert', 'main_project', '{"MAIN_PROJECT_NAMA":"pembangunan kantor","MAIN_PROJECT_KODE":"","MAIN_PROJECT_DESCRIPTION":"","MAIN_PROJECT_ACTIVE":1,"PERUSAHAAN_ID":"3"}', NULL, '2015-04-08 13:23:11'),
	(408, 'Administrator', 'administrator', 'projects/mainproject/delete', 'update', 'main_project', '{"MAIN_PROJECT_ACTIVE":0}', '{"MAIN_PROJECT_ID":"8"}', '2015-04-08 13:24:41'),
	(409, 'Administrator', 'administrator', 'projects/mainproject/delete', 'delete', 'main_project', NULL, '{"MAIN_PROJECT_ID":"8"}', '2015-04-08 13:24:41'),
	(410, 'Administrator', 'administrator', 'projects/mainproject/delete', 'update', 'main_project', '{"MAIN_PROJECT_ACTIVE":0}', '{"MAIN_PROJECT_ID":"8"}', '2015-04-08 13:24:49'),
	(411, 'Administrator', 'administrator', 'projects/mainproject/delete', 'delete', 'main_project', NULL, '{"MAIN_PROJECT_ID":"8"}', '2015-04-08 13:24:49'),
	(412, 'Administrator', 'administrator', 'projects/mainproject/delete', 'update', 'main_project', '{"MAIN_PROJECT_ACTIVE":0}', '{"MAIN_PROJECT_ID":"8"}', '2015-04-08 13:24:54'),
	(413, 'Administrator', 'administrator', 'projects/mainproject/delete', 'delete', 'main_project', NULL, '{"MAIN_PROJECT_ID":"8"}', '2015-04-08 13:24:54'),
	(414, 'Administrator', 'administrator', 'projects/mainproject/delete', 'update', 'main_project', '{"MAIN_PROJECT_ACTIVE":0}', '{"MAIN_PROJECT_ID":"8"}', '2015-04-08 13:25:00'),
	(415, 'Administrator', 'administrator', 'projects/mainproject/delete', 'delete', 'main_project', NULL, '{"MAIN_PROJECT_ID":"8"}', '2015-04-08 13:25:00'),
	(416, 'Administrator', 'administrator', 'projects/mainproject/delete', 'update', 'main_project', '{"MAIN_PROJECT_ACTIVE":0}', '{"MAIN_PROJECT_ID":"8"}', '2015-04-08 13:25:28'),
	(417, 'Administrator', 'administrator', 'projects/mainproject/delete', 'delete', 'main_project', NULL, '{"MAIN_PROJECT_ID":"8"}', '2015-04-08 13:25:28'),
	(418, 'Administrator', 'administrator', 'projects/mainproject/delete', 'update', 'main_project', '{"MAIN_PROJECT_ACTIVE":0}', '{"MAIN_PROJECT_ID":"8"}', '2015-04-08 13:26:16'),
	(419, 'Administrator', 'administrator', 'projects/mainproject/delete', 'delete', 'main_project', NULL, '{"MAIN_PROJECT_ID":"8"}', '2015-04-08 13:26:17'),
	(420, 'Administrator', 'administrator', 'projects/mainproject/delete', 'update', 'main_project', '{"MAIN_PROJECT_ACTIVE":0}', '{"MAIN_PROJECT_ID":"8"}', '2015-04-08 13:26:23'),
	(421, 'Administrator', 'administrator', 'projects/mainproject/delete', 'delete', 'main_project', NULL, '{"MAIN_PROJECT_ID":"8"}', '2015-04-08 13:26:24'),
	(422, 'Administrator', 'administrator', 'projects/mainproject/delete', 'update', 'main_project', '{"MAIN_PROJECT_ACTIVE":0}', '{"MAIN_PROJECT_ID":"7"}', '2015-04-08 13:26:27'),
	(423, 'Administrator', 'administrator', 'projects/mainproject/delete', 'delete', 'main_project', NULL, '{"MAIN_PROJECT_ID":"7"}', '2015-04-08 13:26:27'),
	(424, 'Administrator', 'administrator', 'projects/mainproject/delete', 'update', 'main_project', '{"MAIN_PROJECT_ACTIVE":0}', '{"MAIN_PROJECT_ID":"8"}', '2015-04-08 13:26:55'),
	(425, 'Administrator', 'administrator', 'projects/mainproject/delete', 'delete', 'main_project', NULL, '{"MAIN_PROJECT_ID":"8"}', '2015-04-08 13:26:55'),
	(426, 'Administrator', 'administrator', 'projects/mainproject/delete', 'update', 'main_project', '{"MAIN_PROJECT_ACTIVE":0}', '{"MAIN_PROJECT_ID":"5"}', '2015-04-08 13:27:01'),
	(427, 'Administrator', 'administrator', 'projects/mainproject/delete', 'delete', 'main_project', NULL, '{"MAIN_PROJECT_ID":"5"}', '2015-04-08 13:27:01'),
	(428, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'master_analisa', '{"SATUAN_NAMA":"M2","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PEK.PSGN-0001","ANALISA_NAMA":"Pasangan bata merah 1 Pc : 6 ps","ANALISA_TOTAL":"114245","ANALISA_ACTIVE":1}', NULL, '2015-04-08 13:33:32'),
	(429, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"96","ANALISA_ID":"43","DETAIL_ANALISA_KOEFISIEN":"62","DETAIL_ANALISA_HARGA":"700","DETAIL_ANALISA_TOTAL":43400}', NULL, '2015-04-08 13:33:33'),
	(430, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"117","ANALISA_ID":"43","DETAIL_ANALISA_KOEFISIEN":"0.21","DETAIL_ANALISA_HARGA":"54500","DETAIL_ANALISA_TOTAL":11445}', NULL, '2015-04-08 13:33:33'),
	(431, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"26","ANALISA_ID":"43","DETAIL_ANALISA_KOEFISIEN":"0.04","DETAIL_ANALISA_HARGA":"135000","DETAIL_ANALISA_TOTAL":5400}', NULL, '2015-04-08 13:33:34'),
	(432, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"44","ANALISA_ID":"43","DETAIL_ANALISA_KOEFISIEN":"0.65","DETAIL_ANALISA_HARGA":"60000","DETAIL_ANALISA_TOTAL":39000}', NULL, '2015-04-08 13:33:35'),
	(433, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"45","ANALISA_ID":"43","DETAIL_ANALISA_KOEFISIEN":"0.2","DETAIL_ANALISA_HARGA":"75000","DETAIL_ANALISA_TOTAL":15000}', NULL, '2015-04-08 13:33:35'),
	(434, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'master_analisa', '{"SATUAN_NAMA":"M2","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_KODE":"HSPK\\/PEK.PSGN-0003","ANALISA_NAMA":"Plesteran dinding 1 pc : 6 ps tb. 1,5 cm","ANALISA_TOTAL":"32020.5","ANALISA_ACTIVE":1}', NULL, '2015-04-08 13:36:23'),
	(435, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"117","ANALISA_ID":"44","DETAIL_ANALISA_KOEFISIEN":"0.099","DETAIL_ANALISA_HARGA":"54500","DETAIL_ANALISA_TOTAL":5395.5}', NULL, '2015-04-08 13:36:23'),
	(436, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"26","ANALISA_ID":"44","DETAIL_ANALISA_KOEFISIEN":"0.025","DETAIL_ANALISA_HARGA":"135000","DETAIL_ANALISA_TOTAL":3375}', NULL, '2015-04-08 13:36:24'),
	(437, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"44","ANALISA_ID":"44","DETAIL_ANALISA_KOEFISIEN":"0.2","DETAIL_ANALISA_HARGA":"60000","DETAIL_ANALISA_TOTAL":12000}', NULL, '2015-04-08 13:36:24'),
	(438, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"45","ANALISA_ID":"44","DETAIL_ANALISA_KOEFISIEN":"0.15","DETAIL_ANALISA_HARGA":"75000","DETAIL_ANALISA_TOTAL":11250}', NULL, '2015-04-08 13:36:25'),
	(439, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'rab_transaction', '{"RAB_NAMA":"RAB_PAGAR","RAB_KODE":"","ESTIMATOR_ID":"1","PROJECT_ID":"2","RAB_TOTAL":"9761462.1","RAB_ACTIVE":1,"RAB_STATUS_APPROVAL_ID":1,"RAB_AFTER_OVERHEAD":10249535.205,"LOKASI_UPAH_ID":"1"}', NULL, '2015-04-08 13:40:43'),
	(440, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"PERSIAPAN","KATEGORI_PEKERJAAN_URUTAN":1}', NULL, '2015-04-08 13:40:44'),
	(441, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"62","ANALISA_ID":"25","RAB_ID":"6","DETAIL_PEKERJAAN_VOLUME":12,"DETAIL_PEKERJAAN_TOTAL":540000,"DETAIL_PEKERJAAN_URUTAN":1}', NULL, '2015-04-08 13:40:44'),
	(442, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"62","ANALISA_ID":"26","RAB_ID":"6","DETAIL_PEKERJAAN_VOLUME":5.6,"DETAIL_PEKERJAAN_TOTAL":98000,"DETAIL_PEKERJAAN_URUTAN":2}', NULL, '2015-04-08 13:40:45'),
	(443, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"62","ANALISA_ID":"34","RAB_ID":"6","DETAIL_PEKERJAAN_VOLUME":2,"DETAIL_PEKERJAAN_TOTAL":228750,"DETAIL_PEKERJAAN_URUTAN":3}', NULL, '2015-04-08 13:40:45'),
	(444, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"PONDASI","KATEGORI_PEKERJAAN_URUTAN":2}', NULL, '2015-04-08 13:40:46'),
	(445, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"63","ANALISA_ID":"33","RAB_ID":"6","DETAIL_PEKERJAAN_VOLUME":5.6,"DETAIL_PEKERJAAN_TOTAL":2909606,"DETAIL_PEKERJAAN_URUTAN":1}', NULL, '2015-04-08 13:40:47'),
	(446, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"BANGUNAN","KATEGORI_PEKERJAAN_URUTAN":3}', NULL, '2015-04-08 13:40:47'),
	(447, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"64","ANALISA_ID":"43","RAB_ID":"6","DETAIL_PEKERJAAN_VOLUME":40,"DETAIL_PEKERJAAN_TOTAL":4569800,"DETAIL_PEKERJAAN_URUTAN":1}', NULL, '2015-04-08 13:40:48'),
	(448, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"64","ANALISA_ID":"44","RAB_ID":"6","DETAIL_PEKERJAAN_VOLUME":44.2,"DETAIL_PEKERJAAN_TOTAL":1415306.1,"DETAIL_PEKERJAAN_URUTAN":2}', NULL, '2015-04-08 13:40:48'),
	(449, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'update', 'rab_transaction', '{"RAB_MATERIAL":4947282.1,"RAB_UPAH":4814180}', '{"RAB_ID":"6"}', '2015-04-08 13:40:50'),
	(450, 'Administrator', 'administrator', 'estimasi/estimasi/validate', 'update', 'rab_transaction', '{"VALIDATOR_ID":"1","RAB_STATUS_APPROVAL_ID":2}', '{"RAB_ID":"5"}', '2015-04-08 13:45:25'),
	(451, 'Administrator', 'administrator', 'estimasi/estimasi/save', 'update', 'rab_transaction', '{"ESTIMASI_JUMLAH_ORANG":3,"ESTIMASI_CUACA":2,"ESTIMASI_UMUR_BANGUNAN":2,"ESTIMASI_TOTAL_WAKTU":34}', '{"RAB_ID":"6"}', '2015-04-08 14:00:40'),
	(452, 'Administrator', 'administrator', 'estimasi/estimasi/validate', 'update', 'rab_transaction', '{"VALIDATOR_ID":"1","RAB_STATUS_APPROVAL_ID":2}', '{"RAB_ID":"6"}', '2015-04-08 14:01:13'),
	(453, 'Administrator', 'administrator', 'estimasi/estimasi/save', 'update', 'rab_transaction', '{"ESTIMASI_JUMLAH_ORANG":3,"ESTIMASI_CUACA":1,"ESTIMASI_UMUR_BANGUNAN":1,"ESTIMASI_TOTAL_WAKTU":32}', '{"RAB_ID":"6"}', '2015-04-08 14:01:15'),
	(454, 'Administrator', 'administrator', 'estimasi/estimasi/save', 'update', 'rab_transaction', '{"ESTIMASI_JUMLAH_ORANG":3,"ESTIMASI_CUACA":1,"ESTIMASI_UMUR_BANGUNAN":2,"ESTIMASI_TOTAL_WAKTU":33}', '{"RAB_ID":"6"}', '2015-04-08 14:01:36'),
	(455, 'Administrator', 'administrator', 'p-material/po/simpanPo', 'insert', 'purchase_order', '{"RAB_ID":"6","KATEGORI_PP_ID":"2","TOP_ID":"14","SUPPLIER_ID":"5","STATUS_PO_ID":"2","PAJAK_ID":"2","KATEGORI_PAJAK_ID":"3","GUDANG_ID":"13","PURCHASE_ORDER_KODE":"001\\/PO\\/RAB_PAGAR\\/IV\\/2015","PURCHASE_ORDER_TOTAL":"375000"}', NULL, '2015-04-08 14:17:53'),
	(456, 'Administrator', 'administrator', 'p-material/po/simpanPo', 'insert', 'detail_po', '{"PURCHASE_ORDER_ID":"11","BARANG_ID":"117","PERMINTAAN_PEMBELIAN_ID":"5","VOLUME_PO":5,"HARGA_MATERI_PO":55000,"HARGA_AWAL":275000,"DISKON1":0,"DISKON2":0,"DISKON3":0,"HARGA_STLH_DISKON":275000,"HARGA_PAJAK":0,"HARGA_FINAL":275000}', NULL, '2015-04-08 14:17:53'),
	(457, 'Administrator', 'administrator', 'p-material/po/simpanPo', 'insert', 'detail_po', '{"PURCHASE_ORDER_ID":"11","BARANG_ID":"26","PERMINTAAN_PEMBELIAN_ID":"5","VOLUME_PO":1,"HARGA_MATERI_PO":100000,"HARGA_AWAL":100000,"DISKON1":0,"DISKON2":0,"DISKON3":0,"HARGA_STLH_DISKON":100000,"HARGA_PAJAK":0,"HARGA_FINAL":100000}', NULL, '2015-04-08 14:17:54'),
	(458, 'Administrator', 'administrator', 'master/barang/update', 'update', 'master_barang', '{"SATUAN_NAMA":"Sak","KATEGORI_BARANG_ID":"1","BARANG_KODE":"MAT000117","BARANG_NAMA":"Semen portland 40Kg","BARANG_KETERANGAN":"Ini adalah keterangan","BARANG_HARGA":"60000"}', '{"BARANG_ID":"117"}', '2015-04-08 14:22:39'),
	(459, 'Administrator', 'administrator', 'master/overhead/simpanOverhead', 'insert', 'overhead', '{"OVERHEAD_NAMA":"","OVERHEAD_KODE":"","RAB_ID":"6","OVERHEAD_TOTAL":"120000","OVERHEAD_TIPE":"barang","OVERHEAD_ACTIVE":1}', NULL, '2015-04-08 14:51:13'),
	(460, 'Administrator', 'administrator', 'master/overhead/simpanOverhead', 'insert', 'detail_overhead', '{"OVERHEAD_ID":"2","BARANG_ID":"117","DETAIL_OVERHEAD_KOEFISIEN":"2","DETAIL_OVERHEAD_HARGA":"60000","DETAIL_OVERHEAD_TOTAL":120000}', NULL, '2015-04-08 14:51:14'),
	(461, 'Administrator', 'administrator', 'p-material/bpm/BPMAdd', 'insert', 'bpm', '{"BPM_KODE":"BPM00002","BPM_KETERANGAN":"","STATUS_BPM_ID":1}', NULL, '2015-04-08 15:01:54'),
	(462, 'Administrator', 'administrator', 'p-material/bpm/BPMAdd', 'update', 'stok', '{"VOLUME":0}', '{"RAB_ID":5,"BARANG_ID":4}', '2015-04-08 15:01:55'),
	(463, 'Administrator', 'administrator', 'p-material/bpm/BPMAdd', 'update', 'stok', '{"VOLUME":3}', '{"RAB_ID":5,"BARANG_ID":97}', '2015-04-08 15:01:56'),
	(464, 'Administrator', 'administrator', 'p-material/bpm/BPMAdd', 'update', 'stok', '{"VOLUME":0}', '{"RAB_ID":5,"BARANG_ID":117}', '2015-04-08 15:01:57'),
	(465, 'Administrator', 'administrator', 'p-material/bpm/BPMAdd', 'insert', 'bpm', '{"BPM_KODE":"BPM00003","BPM_KETERANGAN":"","STATUS_BPM_ID":1}', NULL, '2015-04-08 16:36:50'),
	(466, 'Administrator', 'administrator', 'p-material/bpm/BPMAdd', 'update', 'stok', '{"VOLUME":0}', '{"RAB_ID":5,"BARANG_ID":97}', '2015-04-08 16:36:51'),
	(467, 'Administrator', 'administrator', 'p-material/lpb/newLPB', 'insert', 'penerimaan_barang', '{"LPB_SURAT_JALAN":"sdfghbftyhbh","LPB_KENDARAAN":"wedfghhjlk","STATUS_LPB_ID":2}', NULL, '2015-04-09 17:02:44'),
	(468, 'Administrator', 'administrator', 'p-material/lpb/newLPB', 'insert', 'penerimaan_barang', '{"LPB_SURAT_JALAN":"sdfghbftyhbh","LPB_KENDARAAN":"wedfghhjlk","STATUS_LPB_ID":2}', NULL, '2015-04-09 17:03:22'),
	(469, 'Administrator', 'administrator', 'p-material/lpb/newLPB', 'insert', 'detail_lpb', '{"PENERIMAAN_BARANG_ID":12,"BARANG_ID":"117","VOLUME_LPB":"3","PO_ID":"11"}', NULL, '2015-04-09 17:03:23'),
	(470, 'Administrator', 'administrator', 'p-material/lpb/newLPB', 'insert', 'stok', '{"RAB_ID":"6","BARANG_ID":"117","VOLUME":"3"}', NULL, '2015-04-09 17:03:23'),
	(471, 'Administrator', 'administrator', 'p-material/lpb/newLPB', 'insert', 'detail_lpb', '{"PENERIMAAN_BARANG_ID":12,"BARANG_ID":"26","VOLUME_LPB":"1","PO_ID":"11"}', NULL, '2015-04-09 17:03:24'),
	(472, 'Administrator', 'administrator', 'p-material/lpb/newLPB', 'insert', 'stok', '{"RAB_ID":"6","BARANG_ID":"26","VOLUME":"1"}', NULL, '2015-04-09 17:03:25'),
	(473, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'roles', '{"ROLE_NAMA":"Operator LPB","ROLE_ACTIVE":1}', NULL, '2015-04-09 19:57:30'),
	(474, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"1"}', NULL, '2015-04-09 19:57:31'),
	(475, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"2"}', NULL, '2015-04-09 19:57:31'),
	(476, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"3"}', NULL, '2015-04-09 19:57:32'),
	(477, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"4"}', NULL, '2015-04-09 19:57:32'),
	(478, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"5"}', NULL, '2015-04-09 19:57:33'),
	(479, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"6"}', NULL, '2015-04-09 19:57:33'),
	(480, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"7"}', NULL, '2015-04-09 19:57:34'),
	(481, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"8"}', NULL, '2015-04-09 19:57:35'),
	(482, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"9"}', NULL, '2015-04-09 19:57:35'),
	(483, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"10"}', NULL, '2015-04-09 19:57:36'),
	(484, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"11"}', NULL, '2015-04-09 19:57:36'),
	(485, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"12"}', NULL, '2015-04-09 19:57:37'),
	(486, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"13"}', NULL, '2015-04-09 19:57:37'),
	(487, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"14"}', NULL, '2015-04-09 19:57:38'),
	(488, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"15"}', NULL, '2015-04-09 19:57:38'),
	(489, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"16"}', NULL, '2015-04-09 19:57:39'),
	(490, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"17"}', NULL, '2015-04-09 19:57:39'),
	(491, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"18"}', NULL, '2015-04-09 19:57:40'),
	(492, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"19"}', NULL, '2015-04-09 19:57:40'),
	(493, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"20"}', NULL, '2015-04-09 19:57:41'),
	(494, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"21"}', NULL, '2015-04-09 19:57:41'),
	(495, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"22"}', NULL, '2015-04-09 19:57:42'),
	(496, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"23"}', NULL, '2015-04-09 19:57:42'),
	(497, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"24"}', NULL, '2015-04-09 19:57:43'),
	(498, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"25"}', NULL, '2015-04-09 19:57:43'),
	(499, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"26"}', NULL, '2015-04-09 19:57:44'),
	(500, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"27"}', NULL, '2015-04-09 19:57:44'),
	(501, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"28"}', NULL, '2015-04-09 19:57:45'),
	(502, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"29"}', NULL, '2015-04-09 19:57:45'),
	(503, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"30"}', NULL, '2015-04-09 19:57:46'),
	(504, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"31"}', NULL, '2015-04-09 19:57:47'),
	(505, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"32"}', NULL, '2015-04-09 19:57:47'),
	(506, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"33"}', NULL, '2015-04-09 19:57:48'),
	(507, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"34"}', NULL, '2015-04-09 19:57:49'),
	(508, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"35"}', NULL, '2015-04-09 19:57:50'),
	(509, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"36"}', NULL, '2015-04-09 19:57:51'),
	(510, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"37"}', NULL, '2015-04-09 19:57:51'),
	(511, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"38"}', NULL, '2015-04-09 19:57:52'),
	(512, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"39"}', NULL, '2015-04-09 19:57:52'),
	(513, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":5,"TIPE_ID":-1,"MODULES_ID":"40"}', NULL, '2015-04-09 19:57:53'),
	(514, 'Administrator', 'administrator', 'projects/mainproject/addNew', 'insert', 'main_project', '{"MAIN_PROJECT_NAMA":"Proyek Bangunan Felix","MAIN_PROJECT_KODE":false,"MAIN_PROJECT_DESCRIPTION":"Proyek dilakukan di Surabaya, Jatim","MAIN_PROJECT_ACTIVE":1,"PERUSAHAAN_ID":"3"}', NULL, '2015-04-12 10:05:05'),
	(515, 'Administrator', 'administrator', 'projects/mainproject/update', 'update', 'main_project', '{"MAIN_PROJECT_NAMA":"Proyek Bangunan Dani","MAIN_PROJECT_KODE":false,"MAIN_PROJECT_DESCRIPTION":"Proyek dilakukan di Surabaya, Jawa Timur"}', '{"MAIN_PROJECT_ID":"9"}', '2015-04-12 10:22:21'),
	(516, 'Administrator', 'administrator', 'projects/mainproject/update', 'update', 'main_project', '{"MAIN_PROJECT_NAMA":"Proyek Bangunan Handani","MAIN_PROJECT_DESCRIPTION":"Proyek dilakukan di Surabaya, Jawa Timur"}', '{"MAIN_PROJECT_ID":"9"}', '2015-04-12 10:26:31'),
	(517, 'Administrator', 'administrator', 'master/barang/update', 'update', 'master_barang', '{"SATUAN_NAMA":"M2","KATEGORI_BARANG_ID":"1","BARANG_NAMA":"Alumunium Composite Panel","BARANG_KETERANGAN":"Ini adalah keterangan dari aluminium composite","BARANG_HARGA":"465000","LAST_EDITED_BY_USER_ID":"1","LAST_EDITED_TIMESTAMP":1428849409}', '{"BARANG_ID":"1"}', '2015-04-12 21:36:51'),
	(518, 'Administrator', 'administrator', 'master/barang/update', 'update', 'master_barang', '{"SATUAN_NAMA":"M2","KATEGORI_BARANG_ID":"1","BARANG_NAMA":"Alumunium Composite Panel","BARANG_KETERANGAN":"Ini adalah keterangan dari aluminium composite panel","BARANG_HARGA":"465000","LAST_EDITED_BY_USER_ID":"1","LAST_EDITED_TIMESTAMP":"NOW()"}', '{"BARANG_ID":"1"}', '2015-04-12 21:37:55'),
	(519, 'Administrator', 'administrator', 'master/barang/update', 'update', 'master_barang', '{"SATUAN_NAMA":"M2","KATEGORI_BARANG_ID":"1","BARANG_NAMA":"Alumunium Composite Panel","BARANG_KETERANGAN":"Ini adalah keterangan dari aluminium composite panel tes","BARANG_HARGA":"465000","LAST_EDITED_BY_USER_ID":"1","LAST_EDITED_TIMESTAMP":"2015-04-12 16:41:05"}', '{"BARANG_ID":"1"}', '2015-04-12 21:41:08'),
	(520, 'Administrator', 'administrator', 'master/barang/update', 'update', 'master_barang', '{"SATUAN_NAMA":"M2","KATEGORI_BARANG_ID":"1","BARANG_NAMA":"Alumunium Composite Panel","BARANG_KETERANGAN":"Ini adalah keterangan dari aluminium composite panel tes","BARANG_HARGA_TEMP":"475000","LAST_EDITED_BY_USER_ID":"1","LAST_EDITED_TIMESTAMP":"2015-04-12 18:24:50","STATUS_VALIDASI_ID":5}', '{"BARANG_ID":"1"}', '2015-04-12 23:24:55'),
	(521, 'Administrator', 'administrator', 'master/barang/validate', 'update', 'master_barang', '{"VALIDATED_BY_USER_ID":"1","VALIDATED_TIMESTAMP":"2015-04-12 19:54:43","STATUS_VALIDASI_ID":3}', '{"BARANG_ID":"4"}', '2015-04-13 00:54:47'),
	(522, 'Administrator', 'administrator', 'master/barang/validate', 'update', 'master_barang', '{"VALIDATED_BY_USER_ID":"1","VALIDATED_TIMESTAMP":"2015-04-12 19:57:43","STATUS_VALIDASI_ID":3}', '{"BARANG_ID":"1"}', '2015-04-13 00:57:45'),
	(523, 'Administrator', 'administrator', 'p-material/lpb/newLPB', 'insert', 'penerimaan_barang', '{"LPB_SURAT_JALAN":"hjdsadkas","LPB_KENDARAAN":"hdjksfhkdfsd","STATUS_LPB_ID":1,"PETUGAS_ID":null,"ID":13}', NULL, '2015-04-13 10:34:09'),
	(524, 'Administrator', 'administrator', 'p-material/lpb/newLPB', 'insert', 'detail_lpb', '{"PENERIMAAN_BARANG_ID":13,"BARANG_ID":"26","VOLUME_LPB":"1","PO_ID":"11","ID":0}', NULL, '2015-04-13 10:34:10'),
	(525, 'Administrator', 'administrator', 'p-material/lpb/newLPB', 'insert', 'detail_lpb', '{"PENERIMAAN_BARANG_ID":13,"BARANG_ID":"117","VOLUME_LPB":"5","PO_ID":"11","ID":0}', NULL, '2015-04-13 10:34:10'),
	(526, 'Administrator', 'administrator', 'master/barang/insert', 'insert', 'master_barang', '{"SATUAN_NAMA":"M3","KATEGORI_BARANG_ID":"1","BARANG_NAMA":"Tes","BARANG_KETERANGAN":"Ini keterangan barang tes","BARANG_HARGA":"20000","CREATED_BY_USER_ID":"1","CREATED_TIMESTAMP":"2015-04-13 14:52:48","STATUS_VALIDASI_ID":"1","ID":164}', NULL, '2015-04-13 19:52:49'),
	(527, 'Administrator', 'administrator', 'master/barang/update', 'update', 'master_barang', '{"SATUAN_NAMA":"Ball","KATEGORI_BARANG_ID":"1","BARANG_NAMA":"","BARANG_KETERANGAN":"","BARANG_HARGA_TEMP":"","LAST_EDITED_BY_USER_ID":"1","LAST_EDITED_TIMESTAMP":"2015-04-13 15:17:25","STATUS_VALIDASI_ID":5}', '{"BARANG_ID":""}', '2015-04-13 20:17:27'),
	(528, 'Administrator', 'administrator', 'master/barang/update', 'update', 'master_barang', '{"SATUAN_NAMA":"Ball","KATEGORI_BARANG_ID":"1","BARANG_NAMA":"","BARANG_KETERANGAN":"","BARANG_HARGA_TEMP":"","LAST_EDITED_BY_USER_ID":"1","LAST_EDITED_TIMESTAMP":"2015-04-13 15:32:56","STATUS_VALIDASI_ID":"5"}', '{"BARANG_ID":""}', '2015-04-13 20:32:58'),
	(529, 'Administrator', 'administrator', 'master/barang/update', 'update', 'master_barang', '{"SATUAN_NAMA":"Ball","KATEGORI_BARANG_ID":"1","BARANG_NAMA":"","BARANG_KETERANGAN":"","BARANG_HARGA_TEMP":"","LAST_EDITED_BY_USER_ID":"1","LAST_EDITED_TIMESTAMP":"2015-04-13 15:35:40","STATUS_VALIDASI_ID":"5"}', '{"BARANG_ID":""}', '2015-04-13 20:35:42'),
	(530, 'Administrator', 'administrator', 'master/barang/update', 'update', 'master_barang', '{"SATUAN_NAMA":"Ball","KATEGORI_BARANG_ID":"1","BARANG_NAMA":"","BARANG_KETERANGAN":"","BARANG_HARGA_TEMP":"","LAST_EDITED_BY_USER_ID":"1","LAST_EDITED_TIMESTAMP":"2015-04-13 15:37:00","STATUS_VALIDASI_ID":"5"}', '{"BARANG_ID":""}', '2015-04-13 20:37:02'),
	(531, 'Administrator', 'administrator', 'master/barang/update', 'update', 'master_barang', '{"SATUAN_NAMA":"M3","KATEGORI_BARANG_ID":"1","BARANG_NAMA":"Balok kayu borneo 5\\/7","BARANG_KETERANGAN":"Ini adalah keterangan","BARANG_HARGA_TEMP":"6400000","LAST_EDITED_BY_USER_ID":"1","LAST_EDITED_TIMESTAMP":"2015-04-13 15:52:53","STATUS_VALIDASI_ID":"5"}', '{"BARANG_ID":"2"}', '2015-04-13 20:52:55'),
	(532, 'Administrator', 'administrator', 'master/barang/update', 'update', 'master_barang', '{"SATUAN_NAMA":"M3","KATEGORI_BARANG_ID":"1","BARANG_NAMA":"Balok kayu borneo 5\\/7","BARANG_KETERANGAN":"Ini adalah keterangan","BARANG_HARGA_TEMP":"6400000","LAST_EDITED_BY_USER_ID":"1","LAST_EDITED_TIMESTAMP":"2015-04-13 15:54:02","STATUS_VALIDASI_ID":"1"}', '{"BARANG_ID":"2"}', '2015-04-13 20:54:04'),
	(533, 'Administrator', 'administrator', 'master/barang/update', 'update', 'master_barang', '{"SATUAN_NAMA":"M3","KATEGORI_BARANG_ID":"1","BARANG_NAMA":"Balok kayu borneo 5\\/7","BARANG_KETERANGAN":"Ini adalah keterangan","BARANG_HARGA_TEMP":"6400000","LAST_EDITED_BY_USER_ID":"1","LAST_EDITED_TIMESTAMP":"2015-04-13 15:54:24","STATUS_VALIDASI_ID":"1"}', '{"BARANG_ID":"2"}', '2015-04-13 20:54:26'),
	(534, 'Administrator', 'administrator', 'master/barang/update', 'update', 'master_barang', '{"SATUAN_NAMA":"M3","KATEGORI_BARANG_ID":"1","BARANG_NAMA":"Batu belah 15\\/20 cm","BARANG_KETERANGAN":"Ini adalah keterangan","BARANG_HARGA_TEMP":"125000","LAST_EDITED_BY_USER_ID":"1","LAST_EDITED_TIMESTAMP":"2015-04-13 15:54:46","STATUS_VALIDASI_ID":"1"}', '{"BARANG_ID":"4"}', '2015-04-13 20:54:48'),
	(535, 'Administrator', 'administrator', 'master/barang/update', 'update', 'master_barang', '{"SATUAN_NAMA":"M3","KATEGORI_BARANG_ID":"1","BARANG_NAMA":"Balok kayu borneo 5\\/7","BARANG_KETERANGAN":"Ini adalah keterangan","BARANG_HARGA_TEMP":"6400000","LAST_EDITED_BY_USER_ID":"1","LAST_EDITED_TIMESTAMP":"2015-04-13 15:57:30","STATUS_VALIDASI_ID":"2"}', '{"BARANG_ID":"2"}', '2015-04-13 20:57:32'),
	(536, 'Administrator', 'administrator', 'master/barang/update', 'update', 'master_barang', '{"SATUAN_NAMA":"M3","KATEGORI_BARANG_ID":"1","BARANG_NAMA":"Batu belah 15\\/20 cm","BARANG_KETERANGAN":"Ini adalah keterangan","BARANG_HARGA_TEMP":"125000","LAST_EDITED_BY_USER_ID":"1","LAST_EDITED_TIMESTAMP":"2015-04-13 15:58:18","STATUS_VALIDASI_ID":"2"}', '{"BARANG_ID":"4"}', '2015-04-13 20:58:20'),
	(537, 'Administrator', 'administrator', 'master/barang/update', 'update', 'master_barang', '{"SATUAN_NAMA":"M2","KATEGORI_BARANG_ID":"1","BARANG_NAMA":"Alumunium Composite Panel","BARANG_KETERANGAN":"Ini adalah keterangan dari aluminium composite panel tes","BARANG_HARGA_TEMP":"475000","LAST_EDITED_BY_USER_ID":"1","LAST_EDITED_TIMESTAMP":"2015-04-13 16:05:00","STATUS_VALIDASI_ID":"5"}', '{"BARANG_ID":"1"}', '2015-04-13 21:05:02'),
	(538, 'Administrator', 'administrator', 'master/barang/update', 'update', 'master_barang', '{"SATUAN_NAMA":"M2","KATEGORI_BARANG_ID":"1","BARANG_NAMA":"Alumunium Composite Panel","BARANG_KETERANGAN":"Ini adalah keterangan dari aluminium composite panel tes","BARANG_HARGA_TEMP":"485000","LAST_EDITED_BY_USER_ID":"1","LAST_EDITED_TIMESTAMP":"2015-04-13 16:07:47","STATUS_VALIDASI_ID":"5"}', '{"BARANG_ID":"1"}', '2015-04-13 21:07:49'),
	(539, 'Administrator', 'administrator', 'master/upah/validate', 'update', 'master_upah', '{"VALIDATED_BY_USER_ID":"1","VALIDATED_TIMESTAMP":"2015-04-13 17:25:54","STATUS_VALIDASI_ID":3}', '{"UPAH_ID":"32"}', '2015-04-13 22:25:56'),
	(540, 'Administrator', 'administrator', 'master/upah/insert', 'insert', 'master_upah', '{"LOKASI_UPAH_ID":"1","SATUAN_UPAH_ID":"1","UPAH_HARGA_TEMP":"15750","UPAH_NAMA":"Tes","CREATED_BY_USER_ID":"1","CREATED_TIMESTAMP":"2015-04-13 17:31:10","STATUS_VALIDASI_ID":"1","ID":53}', NULL, '2015-04-13 22:31:13'),
	(541, 'Administrator', 'administrator', 'master/upah/update', 'update', 'master_upah', '{"LOKASI_UPAH_ID":"1","SATUAN_UPAH_ID":"1","UPAH_HARGA_TEMP":"15750","UPAH_NAMA":"Tes","LAST_EDITED_BY_USER_ID":"1","LAST_EDITED_TIMESTAMP":"2015-04-13 17:32:00","STATUS_VALIDASI_ID":"2"}', '{"UPAH_ID":"53"}', '2015-04-13 22:32:02'),
	(542, 'Administrator', 'administrator', 'master/upah/update', 'update', 'master_upah', '{"LOKASI_UPAH_ID":"1","SATUAN_UPAH_ID":"2","UPAH_HARGA_TEMP":"15600","UPAH_NAMA":"Upah Kerja Borongan Pagar Sementara Dari Gedeg t. 2m","LAST_EDITED_BY_USER_ID":"1","LAST_EDITED_TIMESTAMP":"2015-04-13 17:34:25","STATUS_VALIDASI_ID":"5"}', '{"UPAH_ID":"32"}', '2015-04-13 22:34:26'),
	(543, 'Administrator', 'administrator', 'master/upah/validate', 'update', 'master_upah', '{"VALIDATED_BY_USER_ID":"1","VALIDATED_TIMESTAMP":"2015-04-13 17:45:25","STATUS_VALIDASI_ID":"4"}', '{"UPAH_ID":"33"}', '2015-04-13 22:45:26'),
	(544, 'Administrator', 'administrator', 'master/barang/validate', 'update', 'master_barang', '{"VALIDATED_BY_USER_ID":"1","VALIDATED_TIMESTAMP":"2015-04-13 17:45:40","STATUS_VALIDASI_ID":"4"}', '{"BARANG_ID":"2"}', '2015-04-13 22:45:42'),
	(545, 'Administrator', 'administrator', 'master/upah/validate', 'update', 'master_upah', '{"VALIDATED_BY_USER_ID":"1","VALIDATED_TIMESTAMP":"2015-04-13 17:52:36","STATUS_VALIDASI_ID":"6"}', '{"UPAH_ID":"32"}', '2015-04-13 22:52:37'),
	(546, 'Administrator', 'administrator', 'master/upah/validate', 'update', 'master_upah', '{"VALIDATED_BY_USER_ID":"1","VALIDATED_TIMESTAMP":"2015-04-13 17:57:31","STATUS_VALIDASI_ID":"3"}', '{"UPAH_ID":"34"}', '2015-04-13 22:57:33'),
	(547, 'Administrator', 'administrator', 'master/upah/validate', 'update', 'master_upah', '{"VALIDATED_BY_USER_ID":"1","VALIDATED_TIMESTAMP":"2015-04-13 18:42:39","STATUS_VALIDASI_ID":"3"}', '{"UPAH_ID":"32"}', '2015-04-13 23:42:41'),
	(548, 'Administrator', 'administrator', 'master/barang/validate', 'update', 'master_barang', '{"VALIDATED_BY_USER_ID":"1","VALIDATED_TIMESTAMP":"2015-04-13 18:43:51","STATUS_VALIDASI_ID":"3"}', '{"BARANG_ID":"1"}', '2015-04-13 23:43:53'),
	(549, 'Administrator', 'administrator', 'master/barang/validate', 'update', 'master_barang', '{"VALIDATED_BY_USER_ID":"1","VALIDATED_TIMESTAMP":"2015-04-13 18:44:40","STATUS_VALIDASI_ID":"3"}', '{"BARANG_ID":"2"}', '2015-04-13 23:44:42'),
	(550, 'Administrator', 'administrator', 'master/barang/validate', 'update', 'master_barang', '{"VALIDATED_BY_USER_ID":"1","VALIDATED_TIMESTAMP":"2015-04-13 18:45:12","STATUS_VALIDASI_ID":"3"}', '{"BARANG_ID":"3"}', '2015-04-13 23:45:14'),
	(551, 'Administrator', 'administrator', 'master/upah/validate', 'update', 'master_upah', '{"VALIDATED_BY_USER_ID":"1","VALIDATED_TIMESTAMP":"2015-04-13 18:45:25","STATUS_VALIDASI_ID":"3"}', '{"UPAH_ID":"33"}', '2015-04-13 23:45:27'),
	(552, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'master_analisa', '{"SATUAN_NAMA":"M3","KATEGORI_ANALISA_ID":"2","LOKASI_UPAH_ID":"1","ANALISA_NAMA":"Analisa Coba","ANALISA_TOTAL":"6080000","ANALISA_ACTIVE":1,"ID":45}', NULL, '2015-04-13 23:49:32'),
	(553, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"1","ANALISA_ID":"45","DETAIL_ANALISA_KOEFISIEN":"12","DETAIL_ANALISA_HARGA":"485000","DETAIL_ANALISA_TOTAL":5820000,"ID":250}', NULL, '2015-04-13 23:49:34'),
	(554, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"BARANG_ID":"3","ANALISA_ID":"45","DETAIL_ANALISA_KOEFISIEN":"10","DETAIL_ANALISA_HARGA":"3500","DETAIL_ANALISA_TOTAL":35000,"ID":251}', NULL, '2015-04-13 23:49:35'),
	(555, 'Administrator', 'administrator', 'rab/analisa/simpanAnalisa', 'insert', 'detail_analisa', '{"UPAH_ID":"33","ANALISA_ID":"45","DETAIL_ANALISA_KOEFISIEN":"10","DETAIL_ANALISA_HARGA":"22500","DETAIL_ANALISA_TOTAL":225000,"ID":252}', NULL, '2015-04-13 23:49:36'),
	(556, 'Administrator', 'administrator', 'master/barang/update', 'update', 'master_barang', '{"SATUAN_NAMA":"Bh","KATEGORI_BARANG_ID":"1","BARANG_NAMA":"Batako 10 X 20 X 40","BARANG_KETERANGAN":"Ini adalah keterangan","BARANG_HARGA_TEMP":"3700","LAST_EDITED_BY_USER_ID":"1","LAST_EDITED_TIMESTAMP":"2015-04-13 19:26:32","STATUS_VALIDASI_ID":"5"}', '{"BARANG_ID":"3"}', '2015-04-14 00:26:34'),
	(557, 'Administrator', 'administrator', 'master/barang/validate', 'update', 'master_barang', '{"VALIDATED_BY_USER_ID":"1","VALIDATED_TIMESTAMP":"2015-04-13 19:29:02","STATUS_VALIDASI_ID":"3"}', '{"BARANG_ID":"3"}', '2015-04-14 00:29:04'),
	(558, 'Administrator', 'administrator', 'master/barang/validate', 'update', 'master_barang', '{"VALIDATED_BY_USER_ID":"1","VALIDATED_TIMESTAMP":"2015-04-14 00:51:55","STATUS_VALIDASI_ID":"3"}', '{"BARANG_ID":"4"}', '2015-04-14 05:51:56'),
	(559, 'Administrator', 'administrator', 'master/upah/validate', 'update', 'master_upah', '{"VALIDATED_BY_USER_ID":"1","VALIDATED_TIMESTAMP":"2015-04-14 00:52:55","STATUS_VALIDASI_ID":"3"}', '{"UPAH_ID":"34"}', '2015-04-14 05:52:56'),
	(560, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'rab_transaction', '{"ESTIMATOR_ID":"1","PROJECT_ID":"1","RAB_TOTAL":"60820000","RAB_ACTIVE":1,"RAB_STATUS_APPROVAL_ID":1,"RAB_AFTER_OVERHEAD":63861000,"LOKASI_UPAH_ID":"1","ID":9}', NULL, '2015-04-14 09:26:42'),
	(561, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":null,"KATEGORI_PEKERJAAN_URUTAN":1,"ID":65}', NULL, '2015-04-14 09:26:44'),
	(562, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'rab_transaction', '{"ESTIMATOR_ID":"1","PROJECT_ID":"1","RAB_TOTAL":"0","RAB_ACTIVE":1,"RAB_STATUS_APPROVAL_ID":1,"RAB_AFTER_OVERHEAD":0,"LOKASI_UPAH_ID":"1","ID":10}', NULL, '2015-04-14 09:30:36'),
	(563, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":null,"KATEGORI_PEKERJAAN_URUTAN":1,"ID":66}', NULL, '2015-04-14 09:30:37'),
	(564, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"66","ANALISA_ID":"3","RAB_ID":"10","DETAIL_PEKERJAAN_VOLUME":0,"DETAIL_PEKERJAAN_TOTAL":0,"DETAIL_PEKERJAAN_URUTAN":1,"ID":0}', NULL, '2015-04-14 09:30:39'),
	(565, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'rab_transaction', '{"ESTIMATOR_ID":"1","PROJECT_ID":"1","RAB_TOTAL":"60820000","RAB_ACTIVE":1,"RAB_STATUS_APPROVAL_ID":1,"RAB_AFTER_OVERHEAD":63861000,"LOKASI_UPAH_ID":"1","ID":11}', NULL, '2015-04-14 09:39:08'),
	(566, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":null,"KATEGORI_PEKERJAAN_URUTAN":1,"ID":67}', NULL, '2015-04-14 09:39:11'),
	(567, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"67","ANALISA_ID":"4","RAB_ID":"11","DETAIL_PEKERJAAN_VOLUME":10,"DETAIL_PEKERJAAN_TOTAL":60820000,"DETAIL_PEKERJAAN_URUTAN":1,"ID":0}', NULL, '2015-04-14 09:39:18'),
	(568, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'rab_transaction', '{"ESTIMATOR_ID":"1","PROJECT_ID":"1","RAB_TOTAL":"30410000","RAB_ACTIVE":1,"RAB_STATUS_APPROVAL_ID":1,"RAB_AFTER_OVERHEAD":31930500,"LOKASI_UPAH_ID":"1","ID":12}', NULL, '2015-04-14 09:42:16'),
	(569, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":null,"KATEGORI_PEKERJAAN_URUTAN":1,"ID":68}', NULL, '2015-04-14 09:42:17'),
	(570, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"68","ANALISA_ID":"5","RAB_ID":"12","DETAIL_PEKERJAAN_VOLUME":5,"DETAIL_PEKERJAAN_TOTAL":30410000,"DETAIL_PEKERJAAN_URUTAN":1,"ID":0}', NULL, '2015-04-14 09:42:21'),
	(571, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'rab_transaction', '{"ESTIMATOR_ID":"1","PROJECT_ID":"1","RAB_TOTAL":"30410000","RAB_ACTIVE":1,"RAB_STATUS_APPROVAL_ID":1,"RAB_AFTER_OVERHEAD":31930500,"LOKASI_UPAH_ID":"1","ID":14}', NULL, '2015-04-14 09:53:07'),
	(572, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":null,"KATEGORI_PEKERJAAN_URUTAN":1,"ID":69}', NULL, '2015-04-14 09:53:09'),
	(573, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"69","ANALISA_ID":"6","RAB_ID":"14","DETAIL_PEKERJAAN_VOLUME":5,"DETAIL_PEKERJAAN_TOTAL":30410000,"DETAIL_PEKERJAAN_URUTAN":1,"ID":0}', NULL, '2015-04-14 09:53:13'),
	(574, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'update', 'rab_transaction', '{"RAB_MATERIAL":29285000,"RAB_UPAH":1125000}', '{"RAB_ID":"14"}', '2015-04-14 09:53:17'),
	(575, 'Administrator', 'administrator', 'master/barang/update', 'update', 'master_barang', '{"SATUAN_NAMA":"Bh","KATEGORI_BARANG_ID":"1","BARANG_NAMA":"Batako 10 X 20 X 40","BARANG_KETERANGAN":"Ini adalah keterangan","BARANG_HARGA_TEMP":"3500","LAST_EDITED_BY_USER_ID":"1","LAST_EDITED_TIMESTAMP":"2015-04-14 05:10:42","STATUS_VALIDASI_ID":"5"}', '{"BARANG_ID":"3"}', '2015-04-14 10:10:43'),
	(576, 'Administrator', 'administrator', 'master/barang/validate', 'update', 'master_barang', '{"VALIDATED_BY_USER_ID":"1","VALIDATED_TIMESTAMP":"2015-04-14 05:17:06","STATUS_VALIDASI_ID":"3"}', '{"BARANG_ID":"3"}', '2015-04-14 10:17:08'),
	(577, 'Administrator', 'administrator', 'projects/mainproject/addNew', 'insert', 'main_project', '{"MAIN_PROJECT_NAMA":"THEME PARK WARU","MAIN_PROJECT_KODE":false,"MAIN_PROJECT_DESCRIPTION":"Pembangunan taman wisata","MAIN_PROJECT_ACTIVE":1,"PERUSAHAAN_ID":"3","ID":1}', NULL, '2015-04-14 11:58:49'),
	(578, 'Administrator', 'administrator', 'projects/mainproject/addNew', 'insert', 'main_project', '{"MAIN_PROJECT_NAMA":"PEMBANGUNAN KANTOR","MAIN_PROJECT_KODE":false,"MAIN_PROJECT_DESCRIPTION":"","MAIN_PROJECT_ACTIVE":1,"PERUSAHAAN_ID":"3","ID":2}', NULL, '2015-04-14 12:34:38'),
	(579, 'Administrator', 'administrator', 'rab/analisa/delete', 'update', 'master_analisa', '{"ANALISA_ACTIVE":0}', '{"ANALISA_ID":"45"}', '2015-04-14 12:54:43'),
	(580, 'Administrator', 'administrator', 'rab/analisa/delete', 'delete', 'master_analisa', NULL, '{"ANALISA_ID":"45"}', '2015-04-14 12:54:44'),
	(581, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'rab_transaction', '{"ESTIMATOR_ID":"4","PROJECT_ID":"2","RAB_TOTAL":"7372562.5","RAB_ACTIVE":1,"RAB_STATUS_APPROVAL_ID":1,"RAB_AFTER_OVERHEAD":7741190.625,"LOKASI_UPAH_ID":"1","LUAS_BANGUNAN":"100","ID":1}', NULL, '2015-04-14 14:44:34'),
	(582, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"KATEGORI A","KATEGORI_PEKERJAAN_URUTAN":1,"ID":70}', NULL, '2015-04-14 14:44:36'),
	(583, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"70","ANALISA_ID":"7","RAB_ID":"1","DETAIL_PEKERJAAN_VOLUME":5,"DETAIL_PEKERJAAN_TOTAL":2597862.5,"DETAIL_PEKERJAAN_URUTAN":1,"ID":0}', NULL, '2015-04-14 14:44:39'),
	(584, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"70","ANALISA_ID":"8","RAB_ID":"1","DETAIL_PEKERJAAN_VOLUME":7,"DETAIL_PEKERJAAN_TOTAL":4774700,"DETAIL_PEKERJAAN_URUTAN":2,"ID":0}', NULL, '2015-04-14 14:44:43'),
	(585, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'update', 'rab_transaction', '{"RAB_MATERIAL":5587937.5,"RAB_UPAH":1784625}', '{"RAB_ID":"1"}', '2015-04-14 14:44:46'),
	(586, 'Administrator', 'administrator', 'projects/project/delete', 'update', 'project', '{"PROJECT_ACTIVE":0}', '{"PROJECT_ID":"1"}', '2015-04-14 15:02:57'),
	(587, 'Administrator', 'administrator', 'projects/project/delete', 'delete', 'project', NULL, '{"PROJECT_ID":"1"}', '2015-04-14 15:02:57'),
	(588, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'rab_transaction', '{"ESTIMATOR_ID":"4","PROJECT_ID":"3","RAB_TOTAL":"48855340","RAB_ACTIVE":1,"RAB_STATUS_APPROVAL_ID":1,"RAB_AFTER_OVERHEAD":51298107,"LOKASI_UPAH_ID":"1","LUAS_BANGUNAN":"100","ID":2}', NULL, '2015-04-14 15:09:44'),
	(589, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"PERSIAPAN","KATEGORI_PEKERJAAN_URUTAN":1,"ID":71}', NULL, '2015-04-14 15:09:45'),
	(590, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"71","ANALISA_ID":"9","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":100,"DETAIL_PEKERJAAN_TOTAL":4500000,"DETAIL_PEKERJAAN_URUTAN":1,"ID":0}', NULL, '2015-04-14 15:09:46'),
	(591, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"71","ANALISA_ID":"10","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":50,"DETAIL_PEKERJAAN_TOTAL":875000,"DETAIL_PEKERJAAN_URUTAN":2,"ID":0}', NULL, '2015-04-14 15:09:47'),
	(592, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"71","ANALISA_ID":"11","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":50,"DETAIL_PEKERJAAN_TOTAL":6225000,"DETAIL_PEKERJAAN_URUTAN":3,"ID":0}', NULL, '2015-04-14 15:09:49'),
	(593, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"71","ANALISA_ID":"12","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":30,"DETAIL_PEKERJAAN_TOTAL":3457500,"DETAIL_PEKERJAAN_URUTAN":4,"ID":0}', NULL, '2015-04-14 15:09:50'),
	(594, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"PONDASI","KATEGORI_PEKERJAAN_URUTAN":2,"ID":72}', NULL, '2015-04-14 15:09:51'),
	(595, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"72","ANALISA_ID":"13","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":50,"DETAIL_PEKERJAAN_TOTAL":25978625,"DETAIL_PEKERJAAN_URUTAN":1,"ID":0}', NULL, '2015-04-14 15:09:52'),
	(596, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"72","ANALISA_ID":"14","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":30,"DETAIL_PEKERJAAN_TOTAL":3431250,"DETAIL_PEKERJAAN_URUTAN":2,"ID":0}', NULL, '2015-04-14 15:09:53'),
	(597, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"BANGUNAN","KATEGORI_PEKERJAAN_URUTAN":3,"ID":73}', NULL, '2015-04-14 15:09:54'),
	(598, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"73","ANALISA_ID":"15","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":30,"DETAIL_PEKERJAAN_TOTAL":3427350,"DETAIL_PEKERJAAN_URUTAN":1,"ID":0}', NULL, '2015-04-14 15:09:55'),
	(599, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"73","ANALISA_ID":"16","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":30,"DETAIL_PEKERJAAN_TOTAL":960615,"DETAIL_PEKERJAAN_URUTAN":2,"ID":0}', NULL, '2015-04-14 15:09:57'),
	(600, 'Administrator', 'administrator', 'rab/rabs/simpanRAB', 'update', 'rab_transaction', '{"RAB_MATERIAL":29680340,"RAB_UPAH":19175000}', '{"RAB_ID":"2"}', '2015-04-14 15:09:59'),
	(601, 'Administrator', 'administrator', 'estimasi/estimasi/save', 'update', 'rab_transaction', '{"ESTIMASI_JUMLAH_ORANG":1,"ESTIMASI_CUACA":1,"ESTIMASI_UMUR_BANGUNAN":1,"ESTIMASI_TOTAL_WAKTU":447}', '{"RAB_ID":"2"}', '2015-04-14 15:32:21'),
	(602, 'Administrator', 'administrator', 'estimasi/estimasi/save', 'update', 'rab_transaction', '{"ESTIMASI_JUMLAH_ORANG":10,"ESTIMASI_CUACA":10,"ESTIMASI_UMUR_BANGUNAN":10,"ESTIMASI_TOTAL_WAKTU":65}', '{"RAB_ID":"2"}', '2015-04-14 15:42:50'),
	(603, 'Administrator', 'administrator', 'user-management/role/delete', 'update', 'roles', '{"ROLE_ACTIVE":0}', '{"ROLE_ID":"2"}', '2015-04-14 16:57:06'),
	(604, 'Administrator', 'administrator', 'user-management/role/delete', 'delete', 'roles', NULL, '{"ROLE_ID":"2"}', '2015-04-14 16:57:06'),
	(605, 'Administrator', 'administrator', 'user-management/role/delete', 'update', 'roles', '{"ROLE_ACTIVE":0}', '{"ROLE_ID":"3"}', '2015-04-14 16:57:20'),
	(606, 'Administrator', 'administrator', 'user-management/role/delete', 'delete', 'roles', NULL, '{"ROLE_ID":"3"}', '2015-04-14 16:57:20'),
	(607, 'Administrator', 'administrator', 'user-management/role/delete', 'update', 'roles', '{"ROLE_ACTIVE":0}', '{"ROLE_ID":"4"}', '2015-04-14 16:57:32'),
	(608, 'Administrator', 'administrator', 'user-management/role/delete', 'delete', 'roles', NULL, '{"ROLE_ID":"4"}', '2015-04-14 16:57:32'),
	(609, 'Administrator', 'administrator', 'user-management/role/delete', 'update', 'roles', '{"ROLE_ACTIVE":0}', '{"ROLE_ID":"5"}', '2015-04-14 16:57:43'),
	(610, 'Administrator', 'administrator', 'user-management/role/delete', 'delete', 'roles', NULL, '{"ROLE_ID":"5"}', '2015-04-14 16:57:43'),
	(611, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'roles', '{"ROLE_NAMA":"Operator Barang","ROLE_ACTIVE":1,"ID":6}', NULL, '2015-04-14 16:58:14'),
	(612, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"1","ID":0}', NULL, '2015-04-14 16:58:14'),
	(613, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"2","ID":0}', NULL, '2015-04-14 16:58:15'),
	(614, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"3","ID":0}', NULL, '2015-04-14 16:58:15'),
	(615, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"4","ID":0}', NULL, '2015-04-14 16:58:16'),
	(616, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"5","ID":0}', NULL, '2015-04-14 16:58:16'),
	(617, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"6","ID":0}', NULL, '2015-04-14 16:58:17'),
	(618, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"7","ID":0}', NULL, '2015-04-14 16:58:17'),
	(619, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"8","ID":0}', NULL, '2015-04-14 16:58:18'),
	(620, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"9","ID":0}', NULL, '2015-04-14 16:58:19'),
	(621, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"10","ID":0}', NULL, '2015-04-14 16:58:20'),
	(622, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"11","ID":0}', NULL, '2015-04-14 16:58:20'),
	(623, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"12","ID":0}', NULL, '2015-04-14 16:58:21'),
	(624, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"13","ID":0}', NULL, '2015-04-14 16:58:21'),
	(625, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"14","ID":0}', NULL, '2015-04-14 16:58:22'),
	(626, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"15","ID":0}', NULL, '2015-04-14 16:58:22'),
	(627, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"16","ID":0}', NULL, '2015-04-14 16:58:23'),
	(628, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"17","ID":0}', NULL, '2015-04-14 16:58:23'),
	(629, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"18","ID":0}', NULL, '2015-04-14 16:58:24'),
	(630, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"19","ID":0}', NULL, '2015-04-14 16:58:24'),
	(631, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"20","ID":0}', NULL, '2015-04-14 16:58:25'),
	(632, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"21","ID":0}', NULL, '2015-04-14 16:58:26'),
	(633, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"22","ID":0}', NULL, '2015-04-14 16:58:26'),
	(634, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"23","ID":0}', NULL, '2015-04-14 16:58:27'),
	(635, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"24","ID":0}', NULL, '2015-04-14 16:58:27'),
	(636, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"25","ID":0}', NULL, '2015-04-14 16:58:28'),
	(637, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"26","ID":0}', NULL, '2015-04-14 16:58:28'),
	(638, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"27","ID":0}', NULL, '2015-04-14 16:58:29'),
	(639, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"28","ID":0}', NULL, '2015-04-14 16:58:29'),
	(640, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"29","ID":0}', NULL, '2015-04-14 16:58:30'),
	(641, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"30","ID":0}', NULL, '2015-04-14 16:58:30'),
	(642, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"31","ID":0}', NULL, '2015-04-14 16:58:31'),
	(643, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"32","ID":0}', NULL, '2015-04-14 16:58:31'),
	(644, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"33","ID":0}', NULL, '2015-04-14 16:58:32'),
	(645, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"34","ID":0}', NULL, '2015-04-14 16:58:33'),
	(646, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"35","ID":0}', NULL, '2015-04-14 16:58:34'),
	(647, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"36","ID":0}', NULL, '2015-04-14 16:58:34'),
	(648, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"37","ID":0}', NULL, '2015-04-14 16:58:35'),
	(649, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"38","ID":0}', NULL, '2015-04-14 16:58:35'),
	(650, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"39","ID":0}', NULL, '2015-04-14 16:58:36'),
	(651, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"41","ID":0}', NULL, '2015-04-14 16:58:36'),
	(652, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"42","ID":0}', NULL, '2015-04-14 16:58:37'),
	(653, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"43","ID":0}', NULL, '2015-04-14 16:58:38'),
	(654, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"44","ID":0}', NULL, '2015-04-14 16:58:38'),
	(655, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"45","ID":0}', NULL, '2015-04-14 16:58:39'),
	(656, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"46","ID":0}', NULL, '2015-04-14 16:58:40'),
	(657, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"47","ID":0}', NULL, '2015-04-14 16:58:41'),
	(658, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"48","ID":0}', NULL, '2015-04-14 16:58:42'),
	(659, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"49","ID":0}', NULL, '2015-04-14 16:58:42'),
	(660, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"50","ID":0}', NULL, '2015-04-14 16:58:43'),
	(661, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"51","ID":0}', NULL, '2015-04-14 16:58:43'),
	(662, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"52","ID":0}', NULL, '2015-04-14 16:58:44'),
	(663, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"53","ID":0}', NULL, '2015-04-14 16:58:44'),
	(664, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"54","ID":0}', NULL, '2015-04-14 16:58:45'),
	(665, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"55","ID":0}', NULL, '2015-04-14 16:58:46'),
	(666, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"56","ID":0}', NULL, '2015-04-14 16:58:46'),
	(667, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"57","ID":0}', NULL, '2015-04-14 16:58:47'),
	(668, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":6,"TIPE_ID":-1,"MODULES_ID":"58","ID":0}', NULL, '2015-04-14 16:58:47'),
	(669, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"1"}', '2015-04-14 17:53:50'),
	(670, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"2"}', '2015-04-14 17:53:50'),
	(671, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"3"}', '2015-04-14 17:53:51'),
	(672, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"4"}', '2015-04-14 17:53:51'),
	(673, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"5"}', '2015-04-14 17:53:52'),
	(674, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"6"}', '2015-04-14 17:53:52'),
	(675, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"7"}', '2015-04-14 17:53:53'),
	(676, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"8"}', '2015-04-14 17:53:53'),
	(677, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"9"}', '2015-04-14 17:53:54'),
	(678, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"10"}', '2015-04-14 17:53:54'),
	(679, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"11"}', '2015-04-14 17:53:55'),
	(680, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"12"}', '2015-04-14 17:53:55'),
	(681, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"13"}', '2015-04-14 17:53:56'),
	(682, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"14"}', '2015-04-14 17:53:56'),
	(683, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"15"}', '2015-04-14 17:53:57'),
	(684, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"16"}', '2015-04-14 17:53:57'),
	(685, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"17"}', '2015-04-14 17:53:58'),
	(686, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"18"}', '2015-04-14 17:53:58'),
	(687, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"19"}', '2015-04-14 17:53:59'),
	(688, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"20"}', '2015-04-14 17:53:59'),
	(689, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"21"}', '2015-04-14 17:53:59'),
	(690, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"22"}', '2015-04-14 17:54:00'),
	(691, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"23"}', '2015-04-14 17:54:00'),
	(692, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"24"}', '2015-04-14 17:54:01'),
	(693, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"25"}', '2015-04-14 17:54:01'),
	(694, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"26"}', '2015-04-14 17:54:02'),
	(695, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"27"}', '2015-04-14 17:54:02'),
	(696, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"28"}', '2015-04-14 17:54:03'),
	(697, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"29"}', '2015-04-14 17:54:03'),
	(698, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"30"}', '2015-04-14 17:54:04'),
	(699, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"31"}', '2015-04-14 17:54:04'),
	(700, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"32"}', '2015-04-14 17:54:05'),
	(701, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"33"}', '2015-04-14 17:54:05'),
	(702, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"34"}', '2015-04-14 17:54:06'),
	(703, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"35"}', '2015-04-14 17:54:06'),
	(704, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"36"}', '2015-04-14 17:54:07'),
	(705, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"37"}', '2015-04-14 17:54:07'),
	(706, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"38"}', '2015-04-14 17:54:08'),
	(707, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"39"}', '2015-04-14 17:54:08'),
	(708, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"41"}', '2015-04-14 17:54:09'),
	(709, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"42"}', '2015-04-14 17:54:10'),
	(710, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"43"}', '2015-04-14 17:54:10'),
	(711, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"44"}', '2015-04-14 17:54:11'),
	(712, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"45"}', '2015-04-14 17:54:12'),
	(713, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"46"}', '2015-04-14 17:54:12'),
	(714, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"47"}', '2015-04-14 17:54:13'),
	(715, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"48"}', '2015-04-14 17:54:13'),
	(716, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"49"}', '2015-04-14 17:54:14'),
	(717, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"50"}', '2015-04-14 17:54:14'),
	(718, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"51"}', '2015-04-14 17:54:15'),
	(719, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"52"}', '2015-04-14 17:54:15'),
	(720, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"53"}', '2015-04-14 17:54:16'),
	(721, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"54"}', '2015-04-14 17:54:16'),
	(722, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"55"}', '2015-04-14 17:54:17'),
	(723, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"56"}', '2015-04-14 17:54:17'),
	(724, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"57"}', '2015-04-14 17:54:18'),
	(725, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"6","MODULES_ID":"58"}', '2015-04-14 17:54:18'),
	(726, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":46,"ROLE_ID":"6"}', '2015-04-14 17:54:19'),
	(727, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":47,"ROLE_ID":"6"}', '2015-04-14 17:54:19'),
	(728, 'Administrator', 'administrator', 'estimasi/estimasi/save', 'update', 'rab_transaction', '{"ESTIMASI_JUMLAH_ORANG":10,"ESTIMASI_CUACA":10,"ESTIMASI_UMUR_BANGUNAN":10,"ESTIMASI_TOTAL_WAKTU":50}', '{"RAB_ID":"2"}', '2015-04-14 18:54:00'),
	(729, 'Administrator', 'administrator', 'estimasi/estimasi/save', 'update', 'rab_transaction', '{"ESTIMASI_JUMLAH_ORANG":15,"ESTIMASI_CUACA":10,"ESTIMASI_UMUR_BANGUNAN":10,"ESTIMASI_TOTAL_WAKTU":40}', '{"RAB_ID":"2"}', '2015-04-14 20:24:55'),
	(730, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'roles', '{"ROLE_NAMA":"Validator Barang dan Upah","ROLE_ACTIVE":1}', '{"id":7}', '2015-04-14 21:45:13'),
	(731, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"1"}', '{"id":0}', '2015-04-14 21:45:14'),
	(732, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"2"}', '{"id":0}', '2015-04-14 21:45:16'),
	(733, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"3"}', '{"id":0}', '2015-04-14 21:45:17'),
	(734, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"4"}', '{"id":0}', '2015-04-14 21:45:17'),
	(735, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"5"}', '{"id":0}', '2015-04-14 21:45:18'),
	(736, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"6"}', '{"id":0}', '2015-04-14 21:45:19'),
	(737, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"7"}', '{"id":0}', '2015-04-14 21:45:20'),
	(738, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"8"}', '{"id":0}', '2015-04-14 21:45:20'),
	(739, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"9"}', '{"id":0}', '2015-04-14 21:45:22'),
	(740, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"10"}', '{"id":0}', '2015-04-14 21:45:22'),
	(741, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"11"}', '{"id":0}', '2015-04-14 21:45:23'),
	(742, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"12"}', '{"id":0}', '2015-04-14 21:45:24'),
	(743, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"13"}', '{"id":0}', '2015-04-14 21:45:25'),
	(744, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"14"}', '{"id":0}', '2015-04-14 21:45:26'),
	(745, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"15"}', '{"id":0}', '2015-04-14 21:45:26'),
	(746, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"16"}', '{"id":0}', '2015-04-14 21:45:27'),
	(747, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"17"}', '{"id":0}', '2015-04-14 21:45:28'),
	(748, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"18"}', '{"id":0}', '2015-04-14 21:45:29'),
	(749, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"19"}', '{"id":0}', '2015-04-14 21:45:29'),
	(750, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"20"}', '{"id":0}', '2015-04-14 21:45:30'),
	(751, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"21"}', '{"id":0}', '2015-04-14 21:45:31'),
	(752, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"22"}', '{"id":0}', '2015-04-14 21:45:31'),
	(753, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"23"}', '{"id":0}', '2015-04-14 21:45:32'),
	(754, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"24"}', '{"id":0}', '2015-04-14 21:45:33'),
	(755, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"25"}', '{"id":0}', '2015-04-14 21:45:34'),
	(756, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"26"}', '{"id":0}', '2015-04-14 21:45:34'),
	(757, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"27"}', '{"id":0}', '2015-04-14 21:45:35'),
	(758, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"28"}', '{"id":0}', '2015-04-14 21:45:36'),
	(759, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"29"}', '{"id":0}', '2015-04-14 21:45:37'),
	(760, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"30"}', '{"id":0}', '2015-04-14 21:45:38'),
	(761, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"31"}', '{"id":0}', '2015-04-14 21:45:41'),
	(762, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"32"}', '{"id":0}', '2015-04-14 21:45:44'),
	(763, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"33"}', '{"id":0}', '2015-04-14 21:45:44'),
	(764, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"34"}', '{"id":0}', '2015-04-14 21:45:45'),
	(765, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"35"}', '{"id":0}', '2015-04-14 21:45:46'),
	(766, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"36"}', '{"id":0}', '2015-04-14 21:45:47'),
	(767, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"37"}', '{"id":0}', '2015-04-14 21:45:48'),
	(768, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"38"}', '{"id":0}', '2015-04-14 21:45:49'),
	(769, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"39"}', '{"id":0}', '2015-04-14 21:45:49'),
	(770, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"41"}', '{"id":0}', '2015-04-14 21:45:51'),
	(771, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"42"}', '{"id":0}', '2015-04-14 21:45:52'),
	(772, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"43"}', '{"id":0}', '2015-04-14 21:45:52'),
	(773, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"44"}', '{"id":0}', '2015-04-14 21:45:54'),
	(774, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"45"}', '{"id":0}', '2015-04-14 21:45:54'),
	(775, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"46"}', '{"id":0}', '2015-04-14 21:45:55'),
	(776, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"47"}', '{"id":0}', '2015-04-14 21:45:56'),
	(777, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"48"}', '{"id":0}', '2015-04-14 21:45:57'),
	(778, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"49"}', '{"id":0}', '2015-04-14 21:45:58'),
	(779, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"50"}', '{"id":0}', '2015-04-14 21:45:58'),
	(780, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"51"}', '{"id":0}', '2015-04-14 21:45:59'),
	(781, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"52"}', '{"id":0}', '2015-04-14 21:46:00'),
	(782, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"53"}', '{"id":0}', '2015-04-14 21:46:01'),
	(783, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"54"}', '{"id":0}', '2015-04-14 21:46:02'),
	(784, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"55"}', '{"id":0}', '2015-04-14 21:46:02'),
	(785, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"56"}', '{"id":0}', '2015-04-14 21:46:03'),
	(786, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"57"}', '{"id":0}', '2015-04-14 21:46:04'),
	(787, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":7,"TIPE_ID":-1,"MODULES_ID":"58"}', '{"id":0}', '2015-04-14 21:46:06'),
	(788, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'roles', '{"ROLE_NAMA":"Operator Upah","ROLE_ACTIVE":1}', '{"id":8}', '2015-04-14 21:46:39'),
	(789, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"1"}', '{"id":0}', '2015-04-14 21:46:40'),
	(790, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"2"}', '{"id":0}', '2015-04-14 21:46:41'),
	(791, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"3"}', '{"id":0}', '2015-04-14 21:46:42'),
	(792, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"4"}', '{"id":0}', '2015-04-14 21:46:42'),
	(793, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"5"}', '{"id":0}', '2015-04-14 21:46:43'),
	(794, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"6"}', '{"id":0}', '2015-04-14 21:46:44'),
	(795, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"7"}', '{"id":0}', '2015-04-14 21:46:45'),
	(796, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"8"}', '{"id":0}', '2015-04-14 21:46:47'),
	(797, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"9"}', '{"id":0}', '2015-04-14 21:46:48'),
	(798, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"10"}', '{"id":0}', '2015-04-14 21:46:49'),
	(799, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"11"}', '{"id":0}', '2015-04-14 21:46:50'),
	(800, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"12"}', '{"id":0}', '2015-04-14 21:46:50'),
	(801, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"13"}', '{"id":0}', '2015-04-14 21:46:51'),
	(802, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"14"}', '{"id":0}', '2015-04-14 21:46:52'),
	(803, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"15"}', '{"id":0}', '2015-04-14 21:46:53'),
	(804, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"16"}', '{"id":0}', '2015-04-14 21:46:54'),
	(805, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"17"}', '{"id":0}', '2015-04-14 21:46:55'),
	(806, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"18"}', '{"id":0}', '2015-04-14 21:46:56'),
	(807, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"19"}', '{"id":0}', '2015-04-14 21:46:57'),
	(808, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"20"}', '{"id":0}', '2015-04-14 21:46:58'),
	(809, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"21"}', '{"id":0}', '2015-04-14 21:46:58'),
	(810, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"22"}', '{"id":0}', '2015-04-14 21:46:59'),
	(811, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"23"}', '{"id":0}', '2015-04-14 21:47:00'),
	(812, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"24"}', '{"id":0}', '2015-04-14 21:47:00'),
	(813, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"25"}', '{"id":0}', '2015-04-14 21:47:01'),
	(814, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"26"}', '{"id":0}', '2015-04-14 21:47:02'),
	(815, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"27"}', '{"id":0}', '2015-04-14 21:47:03'),
	(816, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"28"}', '{"id":0}', '2015-04-14 21:47:03'),
	(817, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"29"}', '{"id":0}', '2015-04-14 21:47:04'),
	(818, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"30"}', '{"id":0}', '2015-04-14 21:47:05'),
	(819, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"31"}', '{"id":0}', '2015-04-14 21:47:06'),
	(820, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"32"}', '{"id":0}', '2015-04-14 21:47:06'),
	(821, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"33"}', '{"id":0}', '2015-04-14 21:47:07'),
	(822, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"34"}', '{"id":0}', '2015-04-14 21:47:08'),
	(823, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"35"}', '{"id":0}', '2015-04-14 21:47:09'),
	(824, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"36"}', '{"id":0}', '2015-04-14 21:47:10'),
	(825, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"37"}', '{"id":0}', '2015-04-14 21:47:11'),
	(826, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"38"}', '{"id":0}', '2015-04-14 21:47:12'),
	(827, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"39"}', '{"id":0}', '2015-04-14 21:47:13'),
	(828, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"41"}', '{"id":0}', '2015-04-14 21:47:14'),
	(829, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"42"}', '{"id":0}', '2015-04-14 21:47:15'),
	(830, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"43"}', '{"id":0}', '2015-04-14 21:47:16'),
	(831, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"44"}', '{"id":0}', '2015-04-14 21:47:17'),
	(832, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"45"}', '{"id":0}', '2015-04-14 21:47:18'),
	(833, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"46"}', '{"id":0}', '2015-04-14 21:47:19'),
	(834, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"47"}', '{"id":0}', '2015-04-14 21:47:20'),
	(835, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"48"}', '{"id":0}', '2015-04-14 21:47:20'),
	(836, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"49"}', '{"id":0}', '2015-04-14 21:47:21'),
	(837, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"50"}', '{"id":0}', '2015-04-14 21:47:22'),
	(838, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"51"}', '{"id":0}', '2015-04-14 21:47:23'),
	(839, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"52"}', '{"id":0}', '2015-04-14 21:47:24'),
	(840, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"53"}', '{"id":0}', '2015-04-14 21:47:25'),
	(841, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"54"}', '{"id":0}', '2015-04-14 21:47:26'),
	(842, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"55"}', '{"id":0}', '2015-04-14 21:47:27'),
	(843, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"56"}', '{"id":0}', '2015-04-14 21:47:27'),
	(844, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"57"}', '{"id":0}', '2015-04-14 21:47:28'),
	(845, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":8,"TIPE_ID":-1,"MODULES_ID":"58"}', '{"id":0}', '2015-04-14 21:47:29'),
	(846, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'roles', '{"ROLE_NAMA":"Estimator RAB","ROLE_ACTIVE":1}', '{"id":9}', '2015-04-14 21:49:01'),
	(847, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"1"}', '{"id":0}', '2015-04-14 21:49:02'),
	(848, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"2"}', '{"id":0}', '2015-04-14 21:49:04'),
	(849, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"3"}', '{"id":0}', '2015-04-14 21:49:05'),
	(850, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"4"}', '{"id":0}', '2015-04-14 21:49:06'),
	(851, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"5"}', '{"id":0}', '2015-04-14 21:49:07'),
	(852, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"6"}', '{"id":0}', '2015-04-14 21:49:08'),
	(853, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"7"}', '{"id":0}', '2015-04-14 21:49:09'),
	(854, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"8"}', '{"id":0}', '2015-04-14 21:49:11'),
	(855, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"9"}', '{"id":0}', '2015-04-14 21:49:11'),
	(856, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"10"}', '{"id":0}', '2015-04-14 21:49:12'),
	(857, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"11"}', '{"id":0}', '2015-04-14 21:49:13'),
	(858, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"12"}', '{"id":0}', '2015-04-14 21:49:13'),
	(859, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"13"}', '{"id":0}', '2015-04-14 21:49:15'),
	(860, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"14"}', '{"id":0}', '2015-04-14 21:49:16'),
	(861, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"15"}', '{"id":0}', '2015-04-14 21:49:16'),
	(862, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"16"}', '{"id":0}', '2015-04-14 21:49:17'),
	(863, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"17"}', '{"id":0}', '2015-04-14 21:49:18'),
	(864, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"18"}', '{"id":0}', '2015-04-14 21:49:18'),
	(865, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"19"}', '{"id":0}', '2015-04-14 21:49:19'),
	(866, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"20"}', '{"id":0}', '2015-04-14 21:49:20'),
	(867, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"21"}', '{"id":0}', '2015-04-14 21:49:21'),
	(868, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"22"}', '{"id":0}', '2015-04-14 21:49:21'),
	(869, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"23"}', '{"id":0}', '2015-04-14 21:49:22'),
	(870, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"24"}', '{"id":0}', '2015-04-14 21:49:23'),
	(871, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"25"}', '{"id":0}', '2015-04-14 21:49:24'),
	(872, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"26"}', '{"id":0}', '2015-04-14 21:49:25'),
	(873, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"27"}', '{"id":0}', '2015-04-14 21:49:26'),
	(874, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"28"}', '{"id":0}', '2015-04-14 21:49:27'),
	(875, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"29"}', '{"id":0}', '2015-04-14 21:49:27'),
	(876, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"30"}', '{"id":0}', '2015-04-14 21:49:28'),
	(877, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"31"}', '{"id":0}', '2015-04-14 21:49:29'),
	(878, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"32"}', '{"id":0}', '2015-04-14 21:49:31'),
	(879, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"33"}', '{"id":0}', '2015-04-14 21:49:32'),
	(880, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"34"}', '{"id":0}', '2015-04-14 21:49:32'),
	(881, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"35"}', '{"id":0}', '2015-04-14 21:49:35'),
	(882, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"36"}', '{"id":0}', '2015-04-14 21:49:36'),
	(883, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"37"}', '{"id":0}', '2015-04-14 21:49:36'),
	(884, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"38"}', '{"id":0}', '2015-04-14 21:49:38'),
	(885, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"39"}', '{"id":0}', '2015-04-14 21:49:38'),
	(886, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"41"}', '{"id":0}', '2015-04-14 21:49:39'),
	(887, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"42"}', '{"id":0}', '2015-04-14 21:49:40'),
	(888, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"43"}', '{"id":0}', '2015-04-14 21:49:42'),
	(889, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"44"}', '{"id":0}', '2015-04-14 21:49:45'),
	(890, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"45"}', '{"id":0}', '2015-04-14 21:49:48'),
	(891, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"46"}', '{"id":0}', '2015-04-14 21:49:51'),
	(892, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"47"}', '{"id":0}', '2015-04-14 21:49:53'),
	(893, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"48"}', '{"id":0}', '2015-04-14 21:49:54'),
	(894, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"49"}', '{"id":0}', '2015-04-14 21:49:56'),
	(895, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"50"}', '{"id":0}', '2015-04-14 21:49:58'),
	(896, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"51"}', '{"id":0}', '2015-04-14 21:50:01'),
	(897, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"52"}', '{"id":0}', '2015-04-14 21:50:05'),
	(898, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"53"}', '{"id":0}', '2015-04-14 21:50:09'),
	(899, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"54"}', '{"id":0}', '2015-04-14 21:50:13'),
	(900, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"55"}', '{"id":0}', '2015-04-14 21:50:14'),
	(901, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"56"}', '{"id":0}', '2015-04-14 21:50:14'),
	(902, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"57"}', '{"id":0}', '2015-04-14 21:50:15'),
	(903, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":9,"TIPE_ID":-1,"MODULES_ID":"58"}', '{"id":0}', '2015-04-14 21:50:16'),
	(904, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'roles', '{"ROLE_NAMA":"Validator RAB","ROLE_ACTIVE":1}', '{"id":10}', '2015-04-14 21:54:06'),
	(905, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"1"}', '{"id":0}', '2015-04-14 21:54:06'),
	(906, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"2"}', '{"id":0}', '2015-04-14 21:54:08'),
	(907, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"3"}', '{"id":0}', '2015-04-14 21:54:08'),
	(908, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"4"}', '{"id":0}', '2015-04-14 21:54:09'),
	(909, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"5"}', '{"id":0}', '2015-04-14 21:54:10'),
	(910, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"6"}', '{"id":0}', '2015-04-14 21:54:11'),
	(911, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"7"}', '{"id":0}', '2015-04-14 21:54:12'),
	(912, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"8"}', '{"id":0}', '2015-04-14 21:54:14'),
	(913, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"9"}', '{"id":0}', '2015-04-14 21:54:15'),
	(914, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"10"}', '{"id":0}', '2015-04-14 21:54:16'),
	(915, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"11"}', '{"id":0}', '2015-04-14 21:54:16'),
	(916, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"12"}', '{"id":0}', '2015-04-14 21:54:17'),
	(917, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"13"}', '{"id":0}', '2015-04-14 21:54:18'),
	(918, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"14"}', '{"id":0}', '2015-04-14 21:54:19'),
	(919, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"15"}', '{"id":0}', '2015-04-14 21:54:20'),
	(920, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"16"}', '{"id":0}', '2015-04-14 21:54:21'),
	(921, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"17"}', '{"id":0}', '2015-04-14 21:54:21'),
	(922, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"18"}', '{"id":0}', '2015-04-14 21:54:22'),
	(923, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"19"}', '{"id":0}', '2015-04-14 21:54:23'),
	(924, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"20"}', '{"id":0}', '2015-04-14 21:54:24'),
	(925, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"21"}', '{"id":0}', '2015-04-14 21:54:25'),
	(926, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"22"}', '{"id":0}', '2015-04-14 21:54:26'),
	(927, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"23"}', '{"id":0}', '2015-04-14 21:54:27'),
	(928, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"24"}', '{"id":0}', '2015-04-14 21:54:27'),
	(929, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"25"}', '{"id":0}', '2015-04-14 21:54:28'),
	(930, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"26"}', '{"id":0}', '2015-04-14 21:54:29'),
	(931, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"27"}', '{"id":0}', '2015-04-14 21:54:29'),
	(932, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"28"}', '{"id":0}', '2015-04-14 21:54:30'),
	(933, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"29"}', '{"id":0}', '2015-04-14 21:54:31'),
	(934, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"30"}', '{"id":0}', '2015-04-14 21:54:32'),
	(935, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"31"}', '{"id":0}', '2015-04-14 21:54:33'),
	(936, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"32"}', '{"id":0}', '2015-04-14 21:54:34'),
	(937, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"33"}', '{"id":0}', '2015-04-14 21:54:34'),
	(938, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"34"}', '{"id":0}', '2015-04-14 21:54:35'),
	(939, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"35"}', '{"id":0}', '2015-04-14 21:54:36'),
	(940, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"36"}', '{"id":0}', '2015-04-14 21:54:37'),
	(941, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"37"}', '{"id":0}', '2015-04-14 21:54:38'),
	(942, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"38"}', '{"id":0}', '2015-04-14 21:54:39'),
	(943, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"39"}', '{"id":0}', '2015-04-14 21:54:41'),
	(944, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"41"}', '{"id":0}', '2015-04-14 21:54:42'),
	(945, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"42"}', '{"id":0}', '2015-04-14 21:54:43'),
	(946, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"43"}', '{"id":0}', '2015-04-14 21:54:43'),
	(947, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"44"}', '{"id":0}', '2015-04-14 21:54:44'),
	(948, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"45"}', '{"id":0}', '2015-04-14 21:54:45'),
	(949, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"46"}', '{"id":0}', '2015-04-14 21:54:45'),
	(950, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"47"}', '{"id":0}', '2015-04-14 21:54:46'),
	(951, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"48"}', '{"id":0}', '2015-04-14 21:54:47'),
	(952, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"49"}', '{"id":0}', '2015-04-14 21:54:48'),
	(953, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"50"}', '{"id":0}', '2015-04-14 21:54:48'),
	(954, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"51"}', '{"id":0}', '2015-04-14 21:54:49'),
	(955, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"52"}', '{"id":0}', '2015-04-14 21:54:50'),
	(956, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"53"}', '{"id":0}', '2015-04-14 21:54:51'),
	(957, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"54"}', '{"id":0}', '2015-04-14 21:54:52'),
	(958, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"55"}', '{"id":0}', '2015-04-14 21:54:52'),
	(959, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"56"}', '{"id":0}', '2015-04-14 21:54:54'),
	(960, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"57"}', '{"id":0}', '2015-04-14 21:54:54'),
	(961, 'Administrator', 'administrator', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":10,"TIPE_ID":-1,"MODULES_ID":"58"}', '{"id":0}', '2015-04-14 21:54:55'),
	(962, 'Administrator', 'administrator', 'user-management/departemen/save', 'insert', 'departemen', '{"DEPARTEMEN_NAMA":"Perencanaan","DEPARTEMEN_ACTIVE":1}', '{"id":17}', '2015-04-14 21:58:18'),
	(963, 'Administrator', 'administrator', 'user-management/departemen/save', 'insert', 'departemen', '{"DEPARTEMEN_NAMA":"Perencanaan","DEPARTEMEN_ACTIVE":1}', NULL, '2015-04-14 21:58:18'),
	(964, 'Administrator', 'administrator', 'user-management/pengguna/save', 'insert', 'pengguna', '{"PENGGUNA_NAMA":"Sindung Anggar Kusuma","DEPARTEMEN_ID":"17","PENGGUNA_USERNAME":"sindung","PENGGUNA_PASSWORD":"af3d072dd62819e1007c1b843244d152","PENGGUNA_EMAIL":"sindung.its@gmail.com","PENGGUNA_HP":"085733310238","PENGGUNA_ACTIVE":1}', '{"id":5}', '2015-04-14 21:59:32'),
	(965, 'Administrator', 'administrator', 'user-management/role/addRole', 'insert', 'penggunaxroles', '{"PENGGUNA_ID":"5","ROLE_ID":"6"}', '{"id":0}', '2015-04-14 22:01:06'),
	(966, 'Administrator', 'administrator', 'user-management/role/addRole', 'insert', 'penggunaxroles', '{"PENGGUNA_ID":"5","ROLE_ID":"8"}', '{"id":0}', '2015-04-14 22:01:27'),
	(967, 'Sindung Anggar Kusuma', 'sindung', 'master/barang/update', 'update', 'master_barang', '{"SATUAN_NAMA":"Sak","KATEGORI_BARANG_ID":"1","BARANG_NAMA":"Semen portland 40Kg","BARANG_KETERANGAN":"Ini adalah keterangan","BARANG_HARGA_TEMP":"65000","LAST_EDITED_BY_USER_ID":"5","LAST_EDITED_TIMESTAMP":"2015-04-14 17:04:33","STATUS_VALIDASI_ID":"5"}', '{"BARANG_ID":"117"}', '2015-04-14 22:04:36'),
	(968, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/addRole', 'insert', 'penggunaxroles', '{"PENGGUNA_ID":"5","ROLE_ID":"7"}', '{"id":0}', '2015-04-14 22:05:42'),
	(969, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"1"}', '2015-04-14 22:11:43'),
	(970, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"2"}', '2015-04-14 22:11:45'),
	(971, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"3"}', '2015-04-14 22:11:46'),
	(972, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"4"}', '2015-04-14 22:11:47'),
	(973, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"5"}', '2015-04-14 22:11:48'),
	(974, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"6"}', '2015-04-14 22:11:49'),
	(975, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"7"}', '2015-04-14 22:11:50'),
	(976, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"8"}', '2015-04-14 22:11:52'),
	(977, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"9"}', '2015-04-14 22:11:53'),
	(978, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"10"}', '2015-04-14 22:11:54'),
	(979, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"11"}', '2015-04-14 22:11:55'),
	(980, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"12"}', '2015-04-14 22:11:57'),
	(981, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"13"}', '2015-04-14 22:11:57'),
	(982, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"14"}', '2015-04-14 22:11:59'),
	(983, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"15"}', '2015-04-14 22:12:00'),
	(984, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"16"}', '2015-04-14 22:12:01'),
	(985, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"17"}', '2015-04-14 22:12:02'),
	(986, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"18"}', '2015-04-14 22:12:03'),
	(987, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"19"}', '2015-04-14 22:12:05'),
	(988, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"20"}', '2015-04-14 22:12:06'),
	(989, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"21"}', '2015-04-14 22:12:07'),
	(990, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"22"}', '2015-04-14 22:12:15'),
	(991, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"23"}', '2015-04-14 22:12:21'),
	(992, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"24"}', '2015-04-14 22:12:22'),
	(993, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"25"}', '2015-04-14 22:12:28'),
	(994, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"26"}', '2015-04-14 22:12:29'),
	(995, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"27"}', '2015-04-14 22:12:32'),
	(996, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"28"}', '2015-04-14 22:12:33'),
	(997, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"29"}', '2015-04-14 22:12:34'),
	(998, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"30"}', '2015-04-14 22:12:35'),
	(999, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"31"}', '2015-04-14 22:12:36'),
	(1000, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"32"}', '2015-04-14 22:12:37'),
	(1001, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"33"}', '2015-04-14 22:12:38'),
	(1002, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"34"}', '2015-04-14 22:12:40'),
	(1003, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"35"}', '2015-04-14 22:12:43'),
	(1004, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"36"}', '2015-04-14 22:12:44'),
	(1005, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"37"}', '2015-04-14 22:12:45'),
	(1006, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"38"}', '2015-04-14 22:12:47'),
	(1007, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"39"}', '2015-04-14 22:12:48'),
	(1008, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"41"}', '2015-04-14 22:12:49'),
	(1009, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"42"}', '2015-04-14 22:12:50'),
	(1010, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"43"}', '2015-04-14 22:12:51'),
	(1011, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"44"}', '2015-04-14 22:12:52'),
	(1012, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"45"}', '2015-04-14 22:12:54'),
	(1013, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"46"}', '2015-04-14 22:12:56'),
	(1014, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"47"}', '2015-04-14 22:12:57'),
	(1015, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"48"}', '2015-04-14 22:12:59'),
	(1016, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"49"}', '2015-04-14 22:13:01'),
	(1017, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"50"}', '2015-04-14 22:13:02'),
	(1018, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"51"}', '2015-04-14 22:13:03'),
	(1019, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"52"}', '2015-04-14 22:13:04'),
	(1020, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"53"}', '2015-04-14 22:13:05'),
	(1021, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"54"}', '2015-04-14 22:13:06'),
	(1022, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"55"}', '2015-04-14 22:13:07'),
	(1023, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"56"}', '2015-04-14 22:13:08'),
	(1024, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"57"}', '2015-04-14 22:13:09'),
	(1025, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"58"}', '2015-04-14 22:13:11'),
	(1026, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":48,"ROLE_ID":"7"}', '2015-04-14 22:13:12'),
	(1027, 'Sindung Anggar Kusuma', 'sindung', 'master/barang/validate', 'update', 'master_barang', '{"VALIDATED_BY_USER_ID":"5","VALIDATED_TIMESTAMP":"2015-04-14 17:20:15","STATUS_VALIDASI_ID":"3"}', '{"BARANG_ID":"117"}', '2015-04-14 22:20:18'),
	(1028, 'Administrator', 'administrator', 'p-upah/op/save', 'insert', 'opname', '{"STATUS_OP_ID":1,"KATEGORI_OP_ID":0,"RAB_ID":2,"PETUGAS_ID":"1"}', '{"id":1}', '2015-04-14 22:23:35'),
	(1029, 'Administrator', 'administrator', 'p-upah/op/save', 'insert', 'opname', '{"STATUS_OP_ID":1,"KATEGORI_OP_ID":0,"RAB_ID":2,"PETUGAS_ID":"1"}', '{"id":2}', '2015-04-14 22:29:02'),
	(1030, 'Administrator', 'administrator', 'p-upah/op/save', 'insert', 'detail_transaksi_opname', '{"OPNAME_ID":2,"PERMINTAAN_PEKERJAAN_ID":1,"ANALISA_ID":15,"VOLUME_OPNAME":8}', '{"id":2}', '2015-04-14 22:29:03'),
	(1031, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"1"}', '2015-04-14 22:29:13'),
	(1032, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"2"}', '2015-04-14 22:29:14'),
	(1033, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"3"}', '2015-04-14 22:29:15'),
	(1034, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"4"}', '2015-04-14 22:29:16'),
	(1035, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"5"}', '2015-04-14 22:29:17'),
	(1036, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"6"}', '2015-04-14 22:29:18'),
	(1037, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"7"}', '2015-04-14 22:29:19'),
	(1038, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"8"}', '2015-04-14 22:29:20'),
	(1039, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"9"}', '2015-04-14 22:29:21'),
	(1040, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"10"}', '2015-04-14 22:29:22'),
	(1041, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"11"}', '2015-04-14 22:29:23'),
	(1042, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"12"}', '2015-04-14 22:29:24'),
	(1043, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"13"}', '2015-04-14 22:29:25'),
	(1044, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"14"}', '2015-04-14 22:29:26'),
	(1045, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"15"}', '2015-04-14 22:29:27'),
	(1046, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"16"}', '2015-04-14 22:29:28'),
	(1047, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"17"}', '2015-04-14 22:29:28'),
	(1048, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"18"}', '2015-04-14 22:29:29'),
	(1049, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"19"}', '2015-04-14 22:29:30'),
	(1050, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"20"}', '2015-04-14 22:29:31'),
	(1051, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"21"}', '2015-04-14 22:29:32'),
	(1052, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"22"}', '2015-04-14 22:29:33'),
	(1053, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"23"}', '2015-04-14 22:29:34'),
	(1054, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"24"}', '2015-04-14 22:29:36'),
	(1055, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"25"}', '2015-04-14 22:29:37'),
	(1056, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"26"}', '2015-04-14 22:29:38'),
	(1057, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"27"}', '2015-04-14 22:29:39'),
	(1058, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"28"}', '2015-04-14 22:29:40'),
	(1059, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"29"}', '2015-04-14 22:29:41'),
	(1060, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"30"}', '2015-04-14 22:29:42'),
	(1061, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"31"}', '2015-04-14 22:29:43'),
	(1062, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"32"}', '2015-04-14 22:29:44'),
	(1063, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"33"}', '2015-04-14 22:29:45'),
	(1064, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"34"}', '2015-04-14 22:29:46'),
	(1065, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"35"}', '2015-04-14 22:29:46'),
	(1066, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"36"}', '2015-04-14 22:29:48'),
	(1067, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"37"}', '2015-04-14 22:29:48'),
	(1068, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"38"}', '2015-04-14 22:29:49'),
	(1069, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"39"}', '2015-04-14 22:29:50'),
	(1070, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"41"}', '2015-04-14 22:29:51'),
	(1071, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"42"}', '2015-04-14 22:29:52'),
	(1072, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"43"}', '2015-04-14 22:29:54'),
	(1073, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"44"}', '2015-04-14 22:29:54'),
	(1074, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"45"}', '2015-04-14 22:29:55'),
	(1075, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"46"}', '2015-04-14 22:29:57'),
	(1076, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"47"}', '2015-04-14 22:29:59'),
	(1077, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"48"}', '2015-04-14 22:30:00'),
	(1078, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"49"}', '2015-04-14 22:30:02'),
	(1079, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"50"}', '2015-04-14 22:30:03'),
	(1080, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"51"}', '2015-04-14 22:30:04'),
	(1081, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"52"}', '2015-04-14 22:30:05'),
	(1082, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"53"}', '2015-04-14 22:30:06'),
	(1083, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"54"}', '2015-04-14 22:30:07'),
	(1084, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"55"}', '2015-04-14 22:30:08'),
	(1085, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"56"}', '2015-04-14 22:30:10'),
	(1086, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"57"}', '2015-04-14 22:30:11'),
	(1087, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"8","MODULES_ID":"58"}', '2015-04-14 22:30:12'),
	(1088, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":49,"ROLE_ID":"8"}', '2015-04-14 22:30:13'),
	(1089, 'Sindung Anggar Kusuma', 'sindung', 'master/upah/update', 'update', 'master_upah', '{"LOKASI_UPAH_ID":"1","SATUAN_UPAH_ID":"1","UPAH_HARGA_TEMP":"65000","UPAH_NAMA":"Pekerja","LAST_EDITED_BY_USER_ID":"5","LAST_EDITED_TIMESTAMP":"2015-04-14 17:55:10","STATUS_VALIDASI_ID":"5"}', '{"UPAH_ID":"44"}', '2015-04-14 22:55:13'),
	(1090, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"1"}', '2015-04-14 22:55:49'),
	(1091, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"2"}', '2015-04-14 22:55:50'),
	(1092, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"3"}', '2015-04-14 22:55:51'),
	(1093, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"4"}', '2015-04-14 22:55:52'),
	(1094, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"5"}', '2015-04-14 22:55:54'),
	(1095, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"6"}', '2015-04-14 22:55:55'),
	(1096, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"7"}', '2015-04-14 22:55:57'),
	(1097, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"8"}', '2015-04-14 22:55:58'),
	(1098, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"9"}', '2015-04-14 22:56:00'),
	(1099, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"10"}', '2015-04-14 22:56:01'),
	(1100, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"11"}', '2015-04-14 22:56:02'),
	(1101, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"12"}', '2015-04-14 22:56:03'),
	(1102, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"13"}', '2015-04-14 22:56:04'),
	(1103, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"14"}', '2015-04-14 22:56:06'),
	(1104, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"15"}', '2015-04-14 22:56:08'),
	(1105, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"16"}', '2015-04-14 22:56:10'),
	(1106, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"17"}', '2015-04-14 22:56:11'),
	(1107, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"18"}', '2015-04-14 22:56:12'),
	(1108, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"19"}', '2015-04-14 22:56:14'),
	(1109, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"20"}', '2015-04-14 22:56:15'),
	(1110, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"21"}', '2015-04-14 22:56:16'),
	(1111, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"22"}', '2015-04-14 22:56:17'),
	(1112, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"23"}', '2015-04-14 22:56:18'),
	(1113, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"24"}', '2015-04-14 22:56:19'),
	(1114, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"25"}', '2015-04-14 22:56:20'),
	(1115, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"26"}', '2015-04-14 22:56:22'),
	(1116, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"27"}', '2015-04-14 22:56:23'),
	(1117, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"28"}', '2015-04-14 22:56:24'),
	(1118, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"29"}', '2015-04-14 22:56:25'),
	(1119, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"30"}', '2015-04-14 22:56:26'),
	(1120, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"31"}', '2015-04-14 22:56:27'),
	(1121, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"32"}', '2015-04-14 22:56:28'),
	(1122, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"33"}', '2015-04-14 22:56:30'),
	(1123, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"34"}', '2015-04-14 22:56:33'),
	(1124, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"35"}', '2015-04-14 22:56:34'),
	(1125, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"36"}', '2015-04-14 22:56:35'),
	(1126, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"37"}', '2015-04-14 22:56:36'),
	(1127, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"38"}', '2015-04-14 22:56:38'),
	(1128, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"39"}', '2015-04-14 22:56:39'),
	(1129, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"41"}', '2015-04-14 22:56:40'),
	(1130, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"42"}', '2015-04-14 22:56:41'),
	(1131, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"43"}', '2015-04-14 22:56:42'),
	(1132, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"44"}', '2015-04-14 22:56:43'),
	(1133, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"45"}', '2015-04-14 22:56:44'),
	(1134, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"46"}', '2015-04-14 22:56:46'),
	(1135, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"47"}', '2015-04-14 22:56:47'),
	(1136, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"48"}', '2015-04-14 22:56:48'),
	(1137, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"49"}', '2015-04-14 22:56:49'),
	(1138, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"50"}', '2015-04-14 22:56:51'),
	(1139, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"51"}', '2015-04-14 22:56:52'),
	(1140, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"52"}', '2015-04-14 22:56:54'),
	(1141, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"53"}', '2015-04-14 22:56:55'),
	(1142, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"54"}', '2015-04-14 22:56:56'),
	(1143, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"55"}', '2015-04-14 22:56:58'),
	(1144, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"56"}', '2015-04-14 22:57:01'),
	(1145, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"57"}', '2015-04-14 22:57:03'),
	(1146, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"7","MODULES_ID":"58"}', '2015-04-14 22:57:04'),
	(1147, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":48,"ROLE_ID":"7"}', '2015-04-14 22:57:05'),
	(1148, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":51,"ROLE_ID":"7"}', '2015-04-14 22:57:06'),
	(1149, 'Sindung Anggar Kusuma', 'sindung', 'master/upah/validate', 'update', 'master_upah', '{"VALIDATED_BY_USER_ID":"5","VALIDATED_TIMESTAMP":"2015-04-14 17:59:51","STATUS_VALIDASI_ID":"6"}', '{"UPAH_ID":"44"}', '2015-04-14 22:59:53'),
	(1150, 'Sindung Anggar Kusuma', 'sindung', 'master/upah/update', 'update', 'master_upah', '{"LOKASI_UPAH_ID":"1","SATUAN_UPAH_ID":"1","UPAH_HARGA_TEMP":"65000","UPAH_NAMA":"Pekerja","LAST_EDITED_BY_USER_ID":"5","LAST_EDITED_TIMESTAMP":"2015-04-14 18:02:11","STATUS_VALIDASI_ID":"5"}', '{"UPAH_ID":"44"}', '2015-04-14 23:02:14'),
	(1151, 'Sindung Anggar Kusuma', 'sindung', 'master/upah/validate', 'update', 'master_upah', '{"VALIDATED_BY_USER_ID":"5","VALIDATED_TIMESTAMP":"2015-04-14 18:06:18","STATUS_VALIDASI_ID":"3"}', '{"UPAH_ID":"44"}', '2015-04-14 23:06:21'),
	(1152, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'update', 'rab_transaction', '{"PROJECT_ID":"3","RAB_TOTAL":"78855340","RAB_ACTIVE":1,"RAB_STATUS_APPROVAL_ID":1,"RAB_AFTER_OVERHEAD":82798107,"LOKASI_UPAH_ID":"1","LUAS_BANGUNAN":"100"}', '{"RAB_ID":"2"}', '2015-04-14 23:07:18'),
	(1153, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'delete', 'detail_pekerjaan', NULL, '{"RAB_ID":"2"}', '2015-04-14 23:07:19'),
	(1154, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"PERSIAPAN","KATEGORI_PEKERJAAN_URUTAN":"1"}', '{"id":74}', '2015-04-14 23:07:20'),
	(1155, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"74","ANALISA_ID":"16","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":100,"DETAIL_PEKERJAAN_TOTAL":4500000,"DETAIL_PEKERJAAN_URUTAN":1}', '{"id":0}', '2015-04-14 23:07:23'),
	(1156, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"74","ANALISA_ID":"16","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":50,"DETAIL_PEKERJAAN_TOTAL":875000,"DETAIL_PEKERJAAN_URUTAN":2}', '{"id":0}', '2015-04-14 23:07:25'),
	(1157, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"74","ANALISA_ID":"16","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":50,"DETAIL_PEKERJAAN_TOTAL":6225000,"DETAIL_PEKERJAAN_URUTAN":3}', '{"id":0}', '2015-04-14 23:07:27'),
	(1158, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"74","ANALISA_ID":"16","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":30,"DETAIL_PEKERJAAN_TOTAL":3457500,"DETAIL_PEKERJAAN_URUTAN":4}', '{"id":0}', '2015-04-14 23:07:29'),
	(1159, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"PONDASI","KATEGORI_PEKERJAAN_URUTAN":"2"}', '{"id":75}', '2015-04-14 23:07:30'),
	(1160, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"75","ANALISA_ID":"16","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":50,"DETAIL_PEKERJAAN_TOTAL":25978625,"DETAIL_PEKERJAAN_URUTAN":1}', '{"id":0}', '2015-04-14 23:07:32'),
	(1161, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"75","ANALISA_ID":"16","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":30,"DETAIL_PEKERJAAN_TOTAL":3431250,"DETAIL_PEKERJAAN_URUTAN":2}', '{"id":0}', '2015-04-14 23:07:34'),
	(1162, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"BANGUNAN","KATEGORI_PEKERJAAN_URUTAN":"3"}', '{"id":76}', '2015-04-14 23:07:35'),
	(1163, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"76","ANALISA_ID":"16","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":30,"DETAIL_PEKERJAAN_TOTAL":3427350,"DETAIL_PEKERJAAN_URUTAN":1}', '{"id":0}', '2015-04-14 23:07:38'),
	(1164, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"76","ANALISA_ID":"16","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":30,"DETAIL_PEKERJAAN_TOTAL":960615,"DETAIL_PEKERJAAN_URUTAN":2}', '{"id":0}', '2015-04-14 23:07:40'),
	(1165, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'subcon', '{"SUBCON_NAMA":"Pembersihan Awal & Akhir Proyek","SUBCON_HARGA":1500000,"SATUAN_NAMA":"M3"}', '{"id":10}', '2015-04-14 23:07:41'),
	(1166, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"76","SUBCON_ID":"10","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":20,"DETAIL_PEKERJAAN_TOTAL":30000000,"DETAIL_PEKERJAAN_URUTAN":3}', '{"id":0}', '2015-04-14 23:07:42'),
	(1167, 'Administrator', 'administrator', 'rab/rabs/updateRAB', 'update', 'rab_transaction', '{"RAB_MATERIAL":33629700,"RAB_UPAH":8602500}', '{"RAB_ID":"2"}', '2015-04-14 23:07:45'),
	(1168, 'Administrator', 'administrator', 'p-upah/op/save', 'insert', 'opname', '{"STATUS_OP_ID":1,"KATEGORI_OP_ID":1,"RAB_ID":2,"PETUGAS_ID":"1","OPNAME_TOTAL_HARGA":162000}', '{"id":3}', '2015-04-14 23:26:19'),
	(1169, 'Administrator', 'administrator', 'p-upah/op/save', 'insert', 'detail_transaksi_opname', '{"OPNAME_ID":3,"PERMINTAAN_PEKERJAAN_ID":1,"ANALISA_ID":15,"VOLUME_OPNAME":3}', '{"id":3}', '2015-04-14 23:26:20'),
	(1170, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'update', 'roles', '{"ROLE_ID":"9","ROLE_NAMA":"Estimator"}', '{"ROLE_ID":"9"}', '2015-04-14 23:27:02'),
	(1171, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'update', 'roles', '{"ROLE_ID":"9","ROLE_NAMA":"Estimator"}', '["9"]', '2015-04-14 23:27:02'),
	(1172, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"1"}', '2015-04-14 23:29:36'),
	(1173, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"2"}', '2015-04-14 23:29:37'),
	(1174, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"3"}', '2015-04-14 23:29:38'),
	(1175, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"4"}', '2015-04-14 23:29:39'),
	(1176, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"5"}', '2015-04-14 23:29:39'),
	(1177, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"6"}', '2015-04-14 23:29:40'),
	(1178, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"7"}', '2015-04-14 23:29:41'),
	(1179, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"8"}', '2015-04-14 23:29:42'),
	(1180, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"9"}', '2015-04-14 23:29:42'),
	(1181, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"10"}', '2015-04-14 23:29:43'),
	(1182, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"11"}', '2015-04-14 23:29:44'),
	(1183, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"12"}', '2015-04-14 23:29:44'),
	(1184, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"13"}', '2015-04-14 23:29:45'),
	(1185, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"14"}', '2015-04-14 23:29:46'),
	(1186, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"15"}', '2015-04-14 23:29:47'),
	(1187, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"16"}', '2015-04-14 23:29:47'),
	(1188, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"17"}', '2015-04-14 23:29:48'),
	(1189, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"18"}', '2015-04-14 23:29:49'),
	(1190, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"19"}', '2015-04-14 23:29:50'),
	(1191, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"20"}', '2015-04-14 23:29:50'),
	(1192, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"21"}', '2015-04-14 23:29:51'),
	(1193, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"22"}', '2015-04-14 23:29:52'),
	(1194, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"23"}', '2015-04-14 23:29:53'),
	(1195, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"24"}', '2015-04-14 23:29:54'),
	(1196, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"25"}', '2015-04-14 23:29:54'),
	(1197, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"26"}', '2015-04-14 23:29:55'),
	(1198, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"27"}', '2015-04-14 23:29:56'),
	(1199, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"28"}', '2015-04-14 23:29:56'),
	(1200, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"29"}', '2015-04-14 23:29:57'),
	(1201, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"30"}', '2015-04-14 23:29:58'),
	(1202, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"31"}', '2015-04-14 23:29:59'),
	(1203, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"32"}', '2015-04-14 23:29:59'),
	(1204, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"33"}', '2015-04-14 23:30:00'),
	(1205, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"34"}', '2015-04-14 23:30:01'),
	(1206, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"35"}', '2015-04-14 23:30:02'),
	(1207, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"36"}', '2015-04-14 23:30:03'),
	(1208, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"37"}', '2015-04-14 23:30:03'),
	(1209, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"38"}', '2015-04-14 23:30:04'),
	(1210, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"39"}', '2015-04-14 23:30:05'),
	(1211, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"41"}', '2015-04-14 23:30:06'),
	(1212, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"42"}', '2015-04-14 23:30:07'),
	(1213, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"43"}', '2015-04-14 23:30:08'),
	(1214, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"44"}', '2015-04-14 23:30:09'),
	(1215, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"45"}', '2015-04-14 23:30:09'),
	(1216, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"46"}', '2015-04-14 23:30:10'),
	(1217, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"47"}', '2015-04-14 23:30:10'),
	(1218, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"48"}', '2015-04-14 23:30:11'),
	(1219, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"49"}', '2015-04-14 23:30:12'),
	(1220, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"50"}', '2015-04-14 23:30:13'),
	(1221, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"51"}', '2015-04-14 23:30:13'),
	(1222, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"52"}', '2015-04-14 23:30:14'),
	(1223, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"53"}', '2015-04-14 23:30:15'),
	(1224, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"54"}', '2015-04-14 23:30:16'),
	(1225, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"55"}', '2015-04-14 23:30:16'),
	(1226, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"56"}', '2015-04-14 23:30:17'),
	(1227, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"57"}', '2015-04-14 23:30:18'),
	(1228, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"58"}', '2015-04-14 23:30:18'),
	(1229, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":47,"ROLE_ID":"9"}', '2015-04-14 23:30:19'),
	(1230, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":50,"ROLE_ID":"9"}', '2015-04-14 23:30:20'),
	(1231, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":52,"ROLE_ID":"9"}', '2015-04-14 23:30:21'),
	(1232, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":53,"ROLE_ID":"9"}', '2015-04-14 23:30:22'),
	(1233, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":55,"ROLE_ID":"9"}', '2015-04-14 23:30:22'),
	(1234, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":56,"ROLE_ID":"9"}', '2015-04-14 23:30:23'),
	(1235, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":57,"ROLE_ID":"9"}', '2015-04-14 23:30:24'),
	(1236, 'Sindung Anggar Kusuma', 'sindung', 'master/overhead/simpanOverhead', 'insert', 'overhead', '{"OVERHEAD_NAMA":"OVERHEAD_TORNADO","OVERHEAD_KODE":"","RAB_ID":"2","OVERHEAD_TOTAL":"1230000","OVERHEAD_TIPE":"barang","OVERHEAD_ACTIVE":1}', '{"id":1}', '2015-04-14 23:45:39'),
	(1237, 'Sindung Anggar Kusuma', 'sindung', 'master/overhead/simpanOverhead', 'insert', 'paket_overhead_material', '{"PAKET_OVERHEAD_MATERIAL_NAMA":"Sewa Listrik","PAKET_OVERHEAD_MATERIAL_HARGA":"1000000","SATUAN_NAMA":"Set"}', '{"id":5}', '2015-04-14 23:45:40'),
	(1238, 'Sindung Anggar Kusuma', 'sindung', 'master/overhead/simpanOverhead', 'insert', 'detail_overhead', '{"OVERHEAD_ID":"1","PAKET_OVERHEAD_MATERIAL_ID":"5","DETAIL_OVERHEAD_KOEFISIEN":"1","DETAIL_OVERHEAD_HARGA":"1000000","DETAIL_OVERHEAD_TOTAL":1000000}', '{"id":1}', '2015-04-14 23:45:41'),
	(1239, 'Sindung Anggar Kusuma', 'sindung', 'master/overhead/simpanOverhead', 'insert', 'detail_overhead', '{"OVERHEAD_ID":"1","BARANG_ID":"97","DETAIL_OVERHEAD_KOEFISIEN":"2","DETAIL_OVERHEAD_HARGA":"115000","DETAIL_OVERHEAD_TOTAL":230000}', '{"id":2}', '2015-04-14 23:45:42'),
	(1240, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'roles', '{"ROLE_NAMA":"Project Manager","ROLE_ACTIVE":1}', '{"id":11}', '2015-04-14 23:48:51'),
	(1241, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"1"}', '{"id":0}', '2015-04-14 23:48:52'),
	(1242, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"2"}', '{"id":0}', '2015-04-14 23:48:53'),
	(1243, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"3"}', '{"id":0}', '2015-04-14 23:48:53'),
	(1244, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"4"}', '{"id":0}', '2015-04-14 23:48:54'),
	(1245, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"5"}', '{"id":0}', '2015-04-14 23:48:55'),
	(1246, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"6"}', '{"id":0}', '2015-04-14 23:48:55'),
	(1247, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"7"}', '{"id":0}', '2015-04-14 23:48:56'),
	(1248, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"8"}', '{"id":0}', '2015-04-14 23:48:57'),
	(1249, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"9"}', '{"id":0}', '2015-04-14 23:48:57'),
	(1250, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"10"}', '{"id":0}', '2015-04-14 23:48:58'),
	(1251, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"11"}', '{"id":0}', '2015-04-14 23:48:59'),
	(1252, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"12"}', '{"id":0}', '2015-04-14 23:48:59'),
	(1253, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"13"}', '{"id":0}', '2015-04-14 23:49:00'),
	(1254, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"14"}', '{"id":0}', '2015-04-14 23:49:00'),
	(1255, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"15"}', '{"id":0}', '2015-04-14 23:49:01'),
	(1256, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"16"}', '{"id":0}', '2015-04-14 23:49:02'),
	(1257, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"17"}', '{"id":0}', '2015-04-14 23:49:02'),
	(1258, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"18"}', '{"id":0}', '2015-04-14 23:49:03'),
	(1259, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"19"}', '{"id":0}', '2015-04-14 23:49:03'),
	(1260, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"20"}', '{"id":0}', '2015-04-14 23:49:04'),
	(1261, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"21"}', '{"id":0}', '2015-04-14 23:49:04'),
	(1262, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"22"}', '{"id":0}', '2015-04-14 23:49:05'),
	(1263, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"23"}', '{"id":0}', '2015-04-14 23:49:06'),
	(1264, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"24"}', '{"id":0}', '2015-04-14 23:49:06'),
	(1265, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"25"}', '{"id":0}', '2015-04-14 23:49:07'),
	(1266, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"26"}', '{"id":0}', '2015-04-14 23:49:07'),
	(1267, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"27"}', '{"id":0}', '2015-04-14 23:49:08'),
	(1268, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"28"}', '{"id":0}', '2015-04-14 23:49:08'),
	(1269, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"29"}', '{"id":0}', '2015-04-14 23:49:09'),
	(1270, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"30"}', '{"id":0}', '2015-04-14 23:49:10'),
	(1271, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"31"}', '{"id":0}', '2015-04-14 23:49:10'),
	(1272, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"32"}', '{"id":0}', '2015-04-14 23:49:11'),
	(1273, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"33"}', '{"id":0}', '2015-04-14 23:49:11'),
	(1274, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"34"}', '{"id":0}', '2015-04-14 23:49:12'),
	(1275, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"35"}', '{"id":0}', '2015-04-14 23:49:12'),
	(1276, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"36"}', '{"id":0}', '2015-04-14 23:49:13'),
	(1277, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"37"}', '{"id":0}', '2015-04-14 23:49:14'),
	(1278, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"38"}', '{"id":0}', '2015-04-14 23:49:14'),
	(1279, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"39"}', '{"id":0}', '2015-04-14 23:49:15'),
	(1280, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"41"}', '{"id":0}', '2015-04-14 23:49:15'),
	(1281, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"42"}', '{"id":0}', '2015-04-14 23:49:16'),
	(1282, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"43"}', '{"id":0}', '2015-04-14 23:49:17'),
	(1283, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"44"}', '{"id":0}', '2015-04-14 23:49:18'),
	(1284, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"45"}', '{"id":0}', '2015-04-14 23:49:18'),
	(1285, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"46"}', '{"id":0}', '2015-04-14 23:49:19'),
	(1286, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"47"}', '{"id":0}', '2015-04-14 23:49:19'),
	(1287, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"48"}', '{"id":0}', '2015-04-14 23:49:20'),
	(1288, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"49"}', '{"id":0}', '2015-04-14 23:49:21'),
	(1289, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"50"}', '{"id":0}', '2015-04-14 23:49:21'),
	(1290, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"51"}', '{"id":0}', '2015-04-14 23:49:22'),
	(1291, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"52"}', '{"id":0}', '2015-04-14 23:49:23'),
	(1292, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"53"}', '{"id":0}', '2015-04-14 23:49:23'),
	(1293, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"54"}', '{"id":0}', '2015-04-14 23:49:24'),
	(1294, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"55"}', '{"id":0}', '2015-04-14 23:49:25'),
	(1295, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"56"}', '{"id":0}', '2015-04-14 23:49:25'),
	(1296, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"57"}', '{"id":0}', '2015-04-14 23:49:26'),
	(1297, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/save', 'insert', 'hak_akses', '{"ROLE_ID":11,"TIPE_ID":-1,"MODULES_ID":"58"}', '{"id":0}', '2015-04-14 23:49:26'),
	(1298, 'Sindung Anggar Kusuma', 'sindung', 'master/overhead/simpanOverhead', 'insert', 'overhead', '{"OVERHEAD_NAMA":"1","OVERHEAD_KODE":"1","RAB_ID":"2","OVERHEAD_TOTAL":"350000","OVERHEAD_TIPE":"upah","OVERHEAD_ACTIVE":1}', '{"id":2}', '2015-04-14 23:50:48'),
	(1299, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"1"}', '2015-04-14 23:56:08'),
	(1300, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"2"}', '2015-04-14 23:56:08'),
	(1301, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"3"}', '2015-04-14 23:56:09'),
	(1302, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"4"}', '2015-04-14 23:56:10'),
	(1303, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"5"}', '2015-04-14 23:56:11'),
	(1304, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"6"}', '2015-04-14 23:56:12'),
	(1305, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"7"}', '2015-04-14 23:56:12'),
	(1306, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"8"}', '2015-04-14 23:56:13'),
	(1307, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"9"}', '2015-04-14 23:56:14'),
	(1308, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"10"}', '2015-04-14 23:56:15'),
	(1309, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"11"}', '2015-04-14 23:56:16'),
	(1310, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"12"}', '2015-04-14 23:56:17'),
	(1311, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"13"}', '2015-04-14 23:56:17'),
	(1312, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"14"}', '2015-04-14 23:56:18'),
	(1313, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"15"}', '2015-04-14 23:56:19'),
	(1314, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"16"}', '2015-04-14 23:56:20'),
	(1315, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"17"}', '2015-04-14 23:56:20'),
	(1316, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"18"}', '2015-04-14 23:56:21'),
	(1317, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"19"}', '2015-04-14 23:56:22'),
	(1318, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"20"}', '2015-04-14 23:56:23'),
	(1319, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"21"}', '2015-04-14 23:56:23'),
	(1320, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"22"}', '2015-04-14 23:56:24'),
	(1321, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"23"}', '2015-04-14 23:56:25'),
	(1322, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"24"}', '2015-04-14 23:56:25'),
	(1323, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"25"}', '2015-04-14 23:56:26'),
	(1324, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"26"}', '2015-04-14 23:56:27'),
	(1325, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"27"}', '2015-04-14 23:56:28'),
	(1326, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"28"}', '2015-04-14 23:56:28'),
	(1327, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"29"}', '2015-04-14 23:56:29'),
	(1328, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"30"}', '2015-04-14 23:56:30'),
	(1329, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"31"}', '2015-04-14 23:56:31'),
	(1330, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"32"}', '2015-04-14 23:56:31'),
	(1331, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"33"}', '2015-04-14 23:56:32'),
	(1332, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"34"}', '2015-04-14 23:56:33'),
	(1333, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"35"}', '2015-04-14 23:56:34'),
	(1334, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"36"}', '2015-04-14 23:56:35'),
	(1335, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"37"}', '2015-04-14 23:56:35'),
	(1336, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"38"}', '2015-04-14 23:56:36'),
	(1337, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"39"}', '2015-04-14 23:56:37'),
	(1338, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"41"}', '2015-04-14 23:56:38'),
	(1339, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"42"}', '2015-04-14 23:56:38'),
	(1340, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"43"}', '2015-04-14 23:56:39'),
	(1341, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"44"}', '2015-04-14 23:56:40'),
	(1342, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"45"}', '2015-04-14 23:56:41'),
	(1343, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"46"}', '2015-04-14 23:56:42'),
	(1344, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"47"}', '2015-04-14 23:56:43'),
	(1345, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"48"}', '2015-04-14 23:56:44'),
	(1346, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"49"}', '2015-04-14 23:56:46'),
	(1347, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"50"}', '2015-04-14 23:56:47'),
	(1348, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"51"}', '2015-04-14 23:56:47'),
	(1349, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"52"}', '2015-04-14 23:56:48'),
	(1350, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"53"}', '2015-04-14 23:56:49'),
	(1351, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"54"}', '2015-04-14 23:56:50'),
	(1352, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"55"}', '2015-04-14 23:56:51'),
	(1353, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"56"}', '2015-04-14 23:56:51'),
	(1354, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"57"}', '2015-04-14 23:56:52'),
	(1355, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"58"}', '2015-04-14 23:56:53'),
	(1356, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":47,"ROLE_ID":"11"}', '2015-04-14 23:56:54'),
	(1357, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":50,"ROLE_ID":"11"}', '2015-04-14 23:56:55'),
	(1358, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":53,"ROLE_ID":"11"}', '2015-04-14 23:56:56'),
	(1359, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":54,"ROLE_ID":"11"}', '2015-04-14 23:56:57'),
	(1360, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":55,"ROLE_ID":"11"}', '2015-04-14 23:56:57'),
	(1361, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":57,"ROLE_ID":"11"}', '2015-04-14 23:56:58'),
	(1362, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":58,"ROLE_ID":"11"}', '2015-04-14 23:56:59'),
	(1363, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/addRole', 'insert', 'penggunaxroles', '{"PENGGUNA_ID":"5","ROLE_ID":"11"}', '{"id":0}', '2015-04-14 23:57:16'),
	(1364, 'Administrator', 'administrator', 'p-upah/op/save', 'insert', 'opname', '{"STATUS_OP_ID":1,"KATEGORI_OP_ID":1,"RAB_ID":2,"PETUGAS_ID":"1","OPNAME_TOTAL_HARGA":0}', '{"id":4}', '2015-04-14 23:58:51'),
	(1365, 'Administrator', 'administrator', 'p-upah/op/save', 'insert', 'detail_transaksi_opname', '{"OPNAME_ID":4,"PERMINTAAN_PEKERJAAN_ID":1,"ANALISA_ID":15,"VOLUME_OPNAME":-1}', '{"id":4}', '2015-04-14 23:58:52'),
	(1366, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"1"}', '2015-04-15 00:00:41'),
	(1367, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"2"}', '2015-04-15 00:00:44'),
	(1368, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"3"}', '2015-04-15 00:00:45'),
	(1369, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"4"}', '2015-04-15 00:00:46'),
	(1370, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"5"}', '2015-04-15 00:00:47'),
	(1371, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"6"}', '2015-04-15 00:00:47'),
	(1372, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"7"}', '2015-04-15 00:00:48'),
	(1373, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"8"}', '2015-04-15 00:00:49'),
	(1374, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"9"}', '2015-04-15 00:00:49'),
	(1375, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"10"}', '2015-04-15 00:00:50'),
	(1376, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"11"}', '2015-04-15 00:00:51'),
	(1377, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"12"}', '2015-04-15 00:00:51'),
	(1378, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"13"}', '2015-04-15 00:00:52'),
	(1379, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"14"}', '2015-04-15 00:00:53'),
	(1380, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"15"}', '2015-04-15 00:00:54'),
	(1381, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"16"}', '2015-04-15 00:00:54'),
	(1382, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"17"}', '2015-04-15 00:00:55'),
	(1383, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"18"}', '2015-04-15 00:00:56'),
	(1384, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"19"}', '2015-04-15 00:00:57'),
	(1385, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"20"}', '2015-04-15 00:00:57'),
	(1386, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"21"}', '2015-04-15 00:00:58'),
	(1387, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"22"}', '2015-04-15 00:00:59'),
	(1388, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"23"}', '2015-04-15 00:00:59'),
	(1389, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"24"}', '2015-04-15 00:01:00'),
	(1390, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"25"}', '2015-04-15 00:01:01'),
	(1391, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"26"}', '2015-04-15 00:01:02'),
	(1392, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"27"}', '2015-04-15 00:01:02'),
	(1393, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"28"}', '2015-04-15 00:01:03'),
	(1394, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"29"}', '2015-04-15 00:01:04'),
	(1395, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"30"}', '2015-04-15 00:01:04'),
	(1396, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"31"}', '2015-04-15 00:01:05'),
	(1397, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"32"}', '2015-04-15 00:01:06'),
	(1398, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"33"}', '2015-04-15 00:01:07'),
	(1399, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"34"}', '2015-04-15 00:01:07'),
	(1400, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"35"}', '2015-04-15 00:01:08'),
	(1401, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"36"}', '2015-04-15 00:01:08'),
	(1402, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"37"}', '2015-04-15 00:01:09'),
	(1403, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"38"}', '2015-04-15 00:01:10'),
	(1404, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"39"}', '2015-04-15 00:01:11'),
	(1405, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"41"}', '2015-04-15 00:01:12'),
	(1406, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"42"}', '2015-04-15 00:01:13'),
	(1407, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"43"}', '2015-04-15 00:01:13'),
	(1408, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"44"}', '2015-04-15 00:01:14'),
	(1409, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"45"}', '2015-04-15 00:01:15'),
	(1410, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"46"}', '2015-04-15 00:01:15'),
	(1411, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"47"}', '2015-04-15 00:01:16'),
	(1412, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"48"}', '2015-04-15 00:01:17'),
	(1413, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"49"}', '2015-04-15 00:01:18'),
	(1414, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"50"}', '2015-04-15 00:01:19'),
	(1415, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"51"}', '2015-04-15 00:01:20'),
	(1416, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"52"}', '2015-04-15 00:01:21'),
	(1417, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"53"}', '2015-04-15 00:01:22'),
	(1418, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"54"}', '2015-04-15 00:01:23'),
	(1419, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"55"}', '2015-04-15 00:01:23'),
	(1420, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"56"}', '2015-04-15 00:01:24'),
	(1421, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"57"}', '2015-04-15 00:01:25'),
	(1422, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"58"}', '2015-04-15 00:01:26'),
	(1423, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":47,"ROLE_ID":"11"}', '2015-04-15 00:01:26'),
	(1424, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":50,"ROLE_ID":"11"}', '2015-04-15 00:01:27'),
	(1425, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":53,"ROLE_ID":"11"}', '2015-04-15 00:01:28'),
	(1426, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":55,"ROLE_ID":"11"}', '2015-04-15 00:01:28'),
	(1427, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":57,"ROLE_ID":"11"}', '2015-04-15 00:01:29'),
	(1428, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":58,"ROLE_ID":"11"}', '2015-04-15 00:01:30'),
	(1429, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"1"}', '2015-04-15 00:11:15'),
	(1430, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"2"}', '2015-04-15 00:11:16'),
	(1431, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"3"}', '2015-04-15 00:11:16'),
	(1432, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"4"}', '2015-04-15 00:11:17'),
	(1433, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"5"}', '2015-04-15 00:11:18'),
	(1434, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"6"}', '2015-04-15 00:11:18'),
	(1435, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"7"}', '2015-04-15 00:11:19'),
	(1436, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"8"}', '2015-04-15 00:11:19'),
	(1437, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"9"}', '2015-04-15 00:11:20'),
	(1438, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"10"}', '2015-04-15 00:11:20'),
	(1439, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"11"}', '2015-04-15 00:11:21'),
	(1440, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"12"}', '2015-04-15 00:11:22'),
	(1441, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"13"}', '2015-04-15 00:11:22'),
	(1442, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"14"}', '2015-04-15 00:11:23'),
	(1443, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"15"}', '2015-04-15 00:11:23'),
	(1444, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"16"}', '2015-04-15 00:11:24'),
	(1445, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"17"}', '2015-04-15 00:11:24'),
	(1446, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"18"}', '2015-04-15 00:11:25'),
	(1447, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"19"}', '2015-04-15 00:11:25'),
	(1448, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"20"}', '2015-04-15 00:11:26'),
	(1449, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"21"}', '2015-04-15 00:11:27'),
	(1450, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"22"}', '2015-04-15 00:11:27'),
	(1451, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"23"}', '2015-04-15 00:11:28'),
	(1452, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"24"}', '2015-04-15 00:11:28'),
	(1453, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"25"}', '2015-04-15 00:11:29'),
	(1454, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"26"}', '2015-04-15 00:11:29'),
	(1455, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"27"}', '2015-04-15 00:11:30'),
	(1456, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"28"}', '2015-04-15 00:11:31'),
	(1457, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"29"}', '2015-04-15 00:11:31'),
	(1458, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"30"}', '2015-04-15 00:11:32'),
	(1459, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"31"}', '2015-04-15 00:11:33'),
	(1460, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"32"}', '2015-04-15 00:11:33'),
	(1461, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"33"}', '2015-04-15 00:11:34'),
	(1462, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"34"}', '2015-04-15 00:11:34'),
	(1463, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"35"}', '2015-04-15 00:11:35'),
	(1464, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"36"}', '2015-04-15 00:11:35'),
	(1465, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"37"}', '2015-04-15 00:11:36'),
	(1466, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"38"}', '2015-04-15 00:11:36'),
	(1467, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"39"}', '2015-04-15 00:11:37'),
	(1468, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"41"}', '2015-04-15 00:11:38'),
	(1469, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"42"}', '2015-04-15 00:11:38'),
	(1470, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"43"}', '2015-04-15 00:11:39'),
	(1471, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"44"}', '2015-04-15 00:11:39'),
	(1472, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"45"}', '2015-04-15 00:11:40'),
	(1473, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"46"}', '2015-04-15 00:11:40'),
	(1474, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"47"}', '2015-04-15 00:11:41'),
	(1475, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"48"}', '2015-04-15 00:11:41'),
	(1476, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"49"}', '2015-04-15 00:11:42'),
	(1477, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"50"}', '2015-04-15 00:11:43'),
	(1478, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"51"}', '2015-04-15 00:11:43'),
	(1479, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"52"}', '2015-04-15 00:11:44'),
	(1480, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"53"}', '2015-04-15 00:11:44'),
	(1481, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"54"}', '2015-04-15 00:11:45'),
	(1482, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"55"}', '2015-04-15 00:11:45'),
	(1483, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"56"}', '2015-04-15 00:11:46'),
	(1484, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"57"}', '2015-04-15 00:11:46'),
	(1485, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"58"}', '2015-04-15 00:11:47'),
	(1486, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":47,"ROLE_ID":"11"}', '2015-04-15 00:11:48'),
	(1487, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":50,"ROLE_ID":"11"}', '2015-04-15 00:11:48'),
	(1488, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":53,"ROLE_ID":"11"}', '2015-04-15 00:11:49'),
	(1489, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":55,"ROLE_ID":"11"}', '2015-04-15 00:11:49'),
	(1490, 'Administrator', 'administrator', 'p-upah/op/delete', 'delete', 'detail_transaksi_opname', NULL, '{"OPNAME_ID":4}', '2015-04-15 00:12:36'),
	(1491, 'Administrator', 'administrator', 'p-upah/op/delete', 'delete', 'opname', NULL, '{"OPNAME_ID":4}', '2015-04-15 00:12:36'),
	(1492, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"1"}', '2015-04-15 00:17:57'),
	(1493, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"2"}', '2015-04-15 00:17:58'),
	(1494, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"3"}', '2015-04-15 00:17:59'),
	(1495, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"4"}', '2015-04-15 00:17:59'),
	(1496, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"5"}', '2015-04-15 00:18:00'),
	(1497, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"6"}', '2015-04-15 00:18:01'),
	(1498, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"7"}', '2015-04-15 00:18:02'),
	(1499, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"8"}', '2015-04-15 00:18:02'),
	(1500, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"9"}', '2015-04-15 00:18:03'),
	(1501, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"10"}', '2015-04-15 00:18:03'),
	(1502, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"11"}', '2015-04-15 00:18:04'),
	(1503, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"12"}', '2015-04-15 00:18:04'),
	(1504, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"13"}', '2015-04-15 00:18:05'),
	(1505, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"14"}', '2015-04-15 00:18:06'),
	(1506, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"15"}', '2015-04-15 00:18:06'),
	(1507, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"16"}', '2015-04-15 00:18:07'),
	(1508, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"17"}', '2015-04-15 00:18:07'),
	(1509, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"18"}', '2015-04-15 00:18:08'),
	(1510, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"19"}', '2015-04-15 00:18:08'),
	(1511, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"20"}', '2015-04-15 00:18:09'),
	(1512, 'Administrator', 'administrator', 'p-upah/op/setujui', 'update', 'opname', '{"STATUS_OP_ID":2,"VALIDATOR_ID":"1"}', '{"OPNAME_ID":3}', '2015-04-15 00:18:09'),
	(1513, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"21"}', '2015-04-15 00:18:09'),
	(1514, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"22"}', '2015-04-15 00:18:10'),
	(1515, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"23"}', '2015-04-15 00:18:11'),
	(1516, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"24"}', '2015-04-15 00:18:12'),
	(1517, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"25"}', '2015-04-15 00:18:12'),
	(1518, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"26"}', '2015-04-15 00:18:13'),
	(1519, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"27"}', '2015-04-15 00:18:13'),
	(1520, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"28"}', '2015-04-15 00:18:14'),
	(1521, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"29"}', '2015-04-15 00:18:14'),
	(1522, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"30"}', '2015-04-15 00:18:15'),
	(1523, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"31"}', '2015-04-15 00:18:15'),
	(1524, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"32"}', '2015-04-15 00:18:16'),
	(1525, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"33"}', '2015-04-15 00:18:16'),
	(1526, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"34"}', '2015-04-15 00:18:17'),
	(1527, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"35"}', '2015-04-15 00:18:17'),
	(1528, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"36"}', '2015-04-15 00:18:18'),
	(1529, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"37"}', '2015-04-15 00:18:18'),
	(1530, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"38"}', '2015-04-15 00:18:19'),
	(1531, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"39"}', '2015-04-15 00:18:20'),
	(1532, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"41"}', '2015-04-15 00:18:20'),
	(1533, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"42"}', '2015-04-15 00:18:21'),
	(1534, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"43"}', '2015-04-15 00:18:22'),
	(1535, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"44"}', '2015-04-15 00:18:22'),
	(1536, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"45"}', '2015-04-15 00:18:23'),
	(1537, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"46"}', '2015-04-15 00:18:23'),
	(1538, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"47"}', '2015-04-15 00:18:24'),
	(1539, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"48"}', '2015-04-15 00:18:24'),
	(1540, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"49"}', '2015-04-15 00:18:25'),
	(1541, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"50"}', '2015-04-15 00:18:25'),
	(1542, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"51"}', '2015-04-15 00:18:26'),
	(1543, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"52"}', '2015-04-15 00:18:27'),
	(1544, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"53"}', '2015-04-15 00:18:27'),
	(1545, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"54"}', '2015-04-15 00:18:28'),
	(1546, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"55"}', '2015-04-15 00:18:28'),
	(1547, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"56"}', '2015-04-15 00:18:29'),
	(1548, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"57"}', '2015-04-15 00:18:29'),
	(1549, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"58"}', '2015-04-15 00:18:30'),
	(1550, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":47,"ROLE_ID":"11"}', '2015-04-15 00:18:30'),
	(1551, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":50,"ROLE_ID":"11"}', '2015-04-15 00:18:31'),
	(1552, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":53,"ROLE_ID":"11"}', '2015-04-15 00:18:32'),
	(1553, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":55,"ROLE_ID":"11"}', '2015-04-15 00:18:32'),
	(1554, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":57,"ROLE_ID":"11"}', '2015-04-15 00:18:33'),
	(1555, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/simpanRAB', 'insert', 'rab_transaction', '{"ESTIMATOR_ID":"5","PROJECT_ID":"4","RAB_TOTAL":"182084000","RAB_ACTIVE":1,"RAB_STATUS_APPROVAL_ID":1,"RAB_AFTER_OVERHEAD":191188200,"LOKASI_UPAH_ID":"1","LUAS_BANGUNAN":"200"}', '{"id":3}', '2015-04-15 00:43:50'),
	(1556, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/simpanRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"PERSIAPAN","KATEGORI_PEKERJAAN_URUTAN":1}', '{"id":77}', '2015-04-15 00:43:51'),
	(1557, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"77","ANALISA_ID":"17","RAB_ID":"3","DETAIL_PEKERJAAN_VOLUME":200,"DETAIL_PEKERJAAN_TOTAL":9000000,"DETAIL_PEKERJAAN_URUTAN":1}', '{"id":0}', '2015-04-15 00:43:53'),
	(1558, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"77","ANALISA_ID":"18","RAB_ID":"3","DETAIL_PEKERJAAN_VOLUME":200,"DETAIL_PEKERJAAN_TOTAL":3500000,"DETAIL_PEKERJAAN_URUTAN":2}', '{"id":0}', '2015-04-15 00:43:54'),
	(1559, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/simpanRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"PEKERJAAN TANAH","KATEGORI_PEKERJAAN_URUTAN":2}', '{"id":78}', '2015-04-15 00:43:55'),
	(1560, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"78","ANALISA_ID":"19","RAB_ID":"3","DETAIL_PEKERJAAN_VOLUME":150,"DETAIL_PEKERJAAN_TOTAL":3900000,"DETAIL_PEKERJAAN_URUTAN":1}', '{"id":0}', '2015-04-15 00:43:56'),
	(1561, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"78","ANALISA_ID":"20","RAB_ID":"3","DETAIL_PEKERJAAN_VOLUME":150,"DETAIL_PEKERJAAN_TOTAL":18675000,"DETAIL_PEKERJAAN_URUTAN":2}', '{"id":0}', '2015-04-15 00:43:57'),
	(1562, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/simpanRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"PEKERJAAN PONDASI","KATEGORI_PEKERJAAN_URUTAN":3}', '{"id":79}', '2015-04-15 00:43:58'),
	(1563, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"79","ANALISA_ID":"21","RAB_ID":"3","DETAIL_PEKERJAAN_VOLUME":100,"DETAIL_PEKERJAAN_TOTAL":55778500,"DETAIL_PEKERJAAN_URUTAN":1}', '{"id":0}', '2015-04-15 00:44:00'),
	(1564, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"79","ANALISA_ID":"22","RAB_ID":"3","DETAIL_PEKERJAAN_VOLUME":100,"DETAIL_PEKERJAAN_TOTAL":11827500,"DETAIL_PEKERJAAN_URUTAN":2}', '{"id":0}', '2015-04-15 00:44:01'),
	(1565, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/simpanRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"PEKERJAAN LANTAI","KATEGORI_PEKERJAAN_URUTAN":4}', '{"id":80}', '2015-04-15 00:44:01'),
	(1566, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"80","ANALISA_ID":"23","RAB_ID":"3","DETAIL_PEKERJAAN_VOLUME":100,"DETAIL_PEKERJAAN_TOTAL":3415000,"DETAIL_PEKERJAAN_URUTAN":1}', '{"id":0}', '2015-04-15 00:44:03'),
	(1567, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"80","ANALISA_ID":"24","RAB_ID":"3","DETAIL_PEKERJAAN_VOLUME":100,"DETAIL_PEKERJAAN_TOTAL":68300000,"DETAIL_PEKERJAAN_URUTAN":2}', '{"id":0}', '2015-04-15 00:44:04'),
	(1568, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/simpanRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"PEKERJAAN PASANGAN","KATEGORI_PEKERJAAN_URUTAN":5}', '{"id":81}', '2015-04-15 00:44:05'),
	(1569, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"81","ANALISA_ID":"25","RAB_ID":"3","DETAIL_PEKERJAAN_VOLUME":50,"DETAIL_PEKERJAAN_TOTAL":5985000,"DETAIL_PEKERJAAN_URUTAN":1}', '{"id":0}', '2015-04-15 00:44:06'),
	(1570, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"81","ANALISA_ID":"26","RAB_ID":"3","DETAIL_PEKERJAAN_VOLUME":50,"DETAIL_PEKERJAAN_TOTAL":1703000,"DETAIL_PEKERJAAN_URUTAN":2}', '{"id":0}', '2015-04-15 00:44:08'),
	(1571, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/simpanRAB', 'update', 'rab_transaction', '{"RAB_MATERIAL":116189000,"RAB_UPAH":65895000}', '{"RAB_ID":"3"}', '2015-04-15 00:44:09'),
	(1572, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"1"}', '2015-04-15 00:48:12'),
	(1573, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"2"}', '2015-04-15 00:48:13'),
	(1574, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"3"}', '2015-04-15 00:48:13'),
	(1575, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"4"}', '2015-04-15 00:48:14'),
	(1576, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"5"}', '2015-04-15 00:48:14'),
	(1577, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"6"}', '2015-04-15 00:48:15'),
	(1578, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"7"}', '2015-04-15 00:48:16'),
	(1579, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"8"}', '2015-04-15 00:48:16'),
	(1580, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"9"}', '2015-04-15 00:48:17'),
	(1581, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"10"}', '2015-04-15 00:48:17'),
	(1582, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"11"}', '2015-04-15 00:48:18'),
	(1583, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"12"}', '2015-04-15 00:48:19'),
	(1584, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"13"}', '2015-04-15 00:48:20'),
	(1585, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"14"}', '2015-04-15 00:48:20'),
	(1586, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"15"}', '2015-04-15 00:48:21'),
	(1587, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"16"}', '2015-04-15 00:48:21'),
	(1588, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"17"}', '2015-04-15 00:48:22'),
	(1589, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"18"}', '2015-04-15 00:48:23'),
	(1590, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"19"}', '2015-04-15 00:48:23'),
	(1591, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"20"}', '2015-04-15 00:48:24'),
	(1592, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"21"}', '2015-04-15 00:48:25'),
	(1593, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"22"}', '2015-04-15 00:48:26'),
	(1594, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"23"}', '2015-04-15 00:48:26'),
	(1595, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"24"}', '2015-04-15 00:48:27'),
	(1596, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"25"}', '2015-04-15 00:48:28'),
	(1597, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"26"}', '2015-04-15 00:48:28'),
	(1598, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"27"}', '2015-04-15 00:48:29'),
	(1599, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"28"}', '2015-04-15 00:48:29'),
	(1600, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"29"}', '2015-04-15 00:48:30'),
	(1601, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"30"}', '2015-04-15 00:48:30'),
	(1602, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"31"}', '2015-04-15 00:48:31'),
	(1603, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"32"}', '2015-04-15 00:48:31'),
	(1604, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"33"}', '2015-04-15 00:48:32'),
	(1605, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"34"}', '2015-04-15 00:48:33'),
	(1606, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"35"}', '2015-04-15 00:48:33'),
	(1607, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"36"}', '2015-04-15 00:48:34'),
	(1608, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"37"}', '2015-04-15 00:48:35'),
	(1609, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"38"}', '2015-04-15 00:48:36'),
	(1610, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"39"}', '2015-04-15 00:48:37'),
	(1611, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"41"}', '2015-04-15 00:48:37'),
	(1612, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"42"}', '2015-04-15 00:48:38'),
	(1613, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"43"}', '2015-04-15 00:48:39'),
	(1614, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"44"}', '2015-04-15 00:48:39'),
	(1615, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"45"}', '2015-04-15 00:48:40'),
	(1616, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"46"}', '2015-04-15 00:48:41'),
	(1617, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"47"}', '2015-04-15 00:48:41'),
	(1618, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"48"}', '2015-04-15 00:48:42'),
	(1619, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"49"}', '2015-04-15 00:48:44'),
	(1620, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"50"}', '2015-04-15 00:48:44'),
	(1621, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"51"}', '2015-04-15 00:48:46'),
	(1622, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"52"}', '2015-04-15 00:48:47'),
	(1623, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"53"}', '2015-04-15 00:48:47'),
	(1624, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"54"}', '2015-04-15 00:48:48'),
	(1625, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"55"}', '2015-04-15 00:48:49'),
	(1626, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"56"}', '2015-04-15 00:48:49'),
	(1627, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"57"}', '2015-04-15 00:48:50'),
	(1628, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"58"}', '2015-04-15 00:48:51'),
	(1629, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":47,"ROLE_ID":"11"}', '2015-04-15 00:48:51'),
	(1630, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":50,"ROLE_ID":"11"}', '2015-04-15 00:48:52'),
	(1631, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":53,"ROLE_ID":"11"}', '2015-04-15 00:48:52'),
	(1632, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":55,"ROLE_ID":"11"}', '2015-04-15 00:48:53'),
	(1633, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":56,"ROLE_ID":"11"}', '2015-04-15 00:48:53'),
	(1634, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":57,"ROLE_ID":"11"}', '2015-04-15 00:48:54'),
	(1635, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":58,"ROLE_ID":"11"}', '2015-04-15 00:48:54'),
	(1636, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"1"}', '2015-04-15 00:50:46'),
	(1637, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"2"}', '2015-04-15 00:50:47'),
	(1638, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"3"}', '2015-04-15 00:50:47'),
	(1639, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"4"}', '2015-04-15 00:50:48'),
	(1640, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"5"}', '2015-04-15 00:50:48'),
	(1641, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"6"}', '2015-04-15 00:50:49'),
	(1642, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"7"}', '2015-04-15 00:50:49'),
	(1643, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"8"}', '2015-04-15 00:50:50'),
	(1644, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"9"}', '2015-04-15 00:50:50'),
	(1645, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"10"}', '2015-04-15 00:50:51'),
	(1646, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"11"}', '2015-04-15 00:50:51'),
	(1647, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"12"}', '2015-04-15 00:50:52'),
	(1648, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"13"}', '2015-04-15 00:50:52'),
	(1649, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"14"}', '2015-04-15 00:50:53'),
	(1650, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"15"}', '2015-04-15 00:50:53'),
	(1651, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"16"}', '2015-04-15 00:50:54'),
	(1652, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"17"}', '2015-04-15 00:50:55'),
	(1653, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"18"}', '2015-04-15 00:50:55'),
	(1654, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"19"}', '2015-04-15 00:50:56'),
	(1655, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"20"}', '2015-04-15 00:50:56'),
	(1656, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"21"}', '2015-04-15 00:50:57'),
	(1657, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"22"}', '2015-04-15 00:50:57'),
	(1658, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"23"}', '2015-04-15 00:50:58'),
	(1659, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"24"}', '2015-04-15 00:50:58'),
	(1660, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"25"}', '2015-04-15 00:50:59'),
	(1661, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"26"}', '2015-04-15 00:51:00'),
	(1662, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"27"}', '2015-04-15 00:51:00'),
	(1663, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"28"}', '2015-04-15 00:51:01'),
	(1664, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"29"}', '2015-04-15 00:51:01'),
	(1665, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"30"}', '2015-04-15 00:51:02'),
	(1666, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"31"}', '2015-04-15 00:51:02'),
	(1667, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"32"}', '2015-04-15 00:51:03'),
	(1668, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"33"}', '2015-04-15 00:51:03'),
	(1669, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"34"}', '2015-04-15 00:51:04'),
	(1670, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"35"}', '2015-04-15 00:51:04'),
	(1671, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"36"}', '2015-04-15 00:51:05'),
	(1672, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"37"}', '2015-04-15 00:51:05'),
	(1673, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"38"}', '2015-04-15 00:51:06'),
	(1674, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"39"}', '2015-04-15 00:51:07'),
	(1675, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"41"}', '2015-04-15 00:51:07'),
	(1676, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"42"}', '2015-04-15 00:51:08'),
	(1677, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"43"}', '2015-04-15 00:51:08'),
	(1678, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"44"}', '2015-04-15 00:51:09'),
	(1679, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"45"}', '2015-04-15 00:51:09'),
	(1680, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"46"}', '2015-04-15 00:51:10'),
	(1681, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"47"}', '2015-04-15 00:51:10'),
	(1682, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"48"}', '2015-04-15 00:51:11'),
	(1683, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"49"}', '2015-04-15 00:51:11'),
	(1684, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"50"}', '2015-04-15 00:51:12'),
	(1685, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"51"}', '2015-04-15 00:51:12'),
	(1686, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"52"}', '2015-04-15 00:51:13'),
	(1687, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"53"}', '2015-04-15 00:51:14'),
	(1688, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"54"}', '2015-04-15 00:51:14'),
	(1689, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"55"}', '2015-04-15 00:51:15'),
	(1690, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"56"}', '2015-04-15 00:51:15'),
	(1691, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"57"}', '2015-04-15 00:51:16'),
	(1692, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"11","MODULES_ID":"58"}', '2015-04-15 00:51:16'),
	(1693, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":47,"ROLE_ID":"11"}', '2015-04-15 00:51:17'),
	(1694, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":50,"ROLE_ID":"11"}', '2015-04-15 00:51:17'),
	(1695, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":53,"ROLE_ID":"11"}', '2015-04-15 00:51:18'),
	(1696, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":54,"ROLE_ID":"11"}', '2015-04-15 00:51:18'),
	(1697, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":55,"ROLE_ID":"11"}', '2015-04-15 00:51:19'),
	(1698, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":56,"ROLE_ID":"11"}', '2015-04-15 00:51:19'),
	(1699, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":57,"ROLE_ID":"11"}', '2015-04-15 00:51:20'),
	(1700, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":58,"ROLE_ID":"11"}', '2015-04-15 00:51:20'),
	(1701, 'Administrator', 'administrator', 'p-upah/op/reject', 'update', 'opname', '{"STATUS_OP_ID":4,"VALIDATOR_ID":"1"}', '{"OPNAME_ID":3}', '2015-04-15 01:39:36'),
	(1702, 'Sindung Anggar Kusuma', 'sindung', 'p-material/lpb/delete', 'delete', 'detail_lpb', NULL, '{"PENERIMAAN_BARANG_ID":13}', '2015-04-15 04:12:30'),
	(1703, 'Sindung Anggar Kusuma', 'sindung', 'p-material/lpb/delete', 'delete', 'penerimaan_barang', NULL, '{"PENERIMAAN_BARANG_ID":13}', '2015-04-15 04:12:31'),
	(1704, 'Sindung Anggar Kusuma', 'sindung', 'master/overhead/simpanOverhead', 'insert', 'overhead', '{"OVERHEAD_NAMA":"ovupah1","OVERHEAD_KODE":"ovupah1","RAB_ID":"3","OVERHEAD_TOTAL":"800000","OVERHEAD_TIPE":"upah","OVERHEAD_ACTIVE":1}', '{"id":3}', '2015-04-15 04:35:10'),
	(1705, 'Sindung Anggar Kusuma', 'sindung', 'master/overhead/simpanOverhead', 'insert', 'overhead', '{"OVERHEAD_NAMA":"a","OVERHEAD_KODE":"a","RAB_ID":"3","OVERHEAD_TOTAL":"325000","OVERHEAD_TIPE":"barang","OVERHEAD_ACTIVE":1}', '{"id":4}', '2015-04-15 04:39:15'),
	(1706, 'Sindung Anggar Kusuma', 'sindung', 'master/overhead/simpanOverhead', 'insert', 'detail_overhead', '{"OVERHEAD_ID":"4","BARANG_ID":"117","DETAIL_OVERHEAD_KOEFISIEN":"5","DETAIL_OVERHEAD_HARGA":"65000","DETAIL_OVERHEAD_TOTAL":325000}', '{"id":3}', '2015-04-15 04:39:16'),
	(1707, 'Sindung Anggar Kusuma', 'sindung', 'p-material/po/simpanPo', 'insert', 'purchase_order', '{"RAB_ID":"3","KATEGORI_PP_ID":"1","TOP_ID":"15","SUPPLIER_ID":"5","STATUS_PO_ID":"2","PAJAK_ID":"2","KATEGORI_PAJAK_ID":"2","GUDANG_ID":"13","PURCHASE_ORDER_KODE":"","PURCHASE_ORDER_TOTAL":"292500"}', '{"id":12}', '2015-04-15 04:48:15'),
	(1708, 'Sindung Anggar Kusuma', 'sindung', 'p-material/po/simpanPo', 'insert', 'detail_po', '{"PURCHASE_ORDER_ID":"12","BARANG_ID":"117","PERMINTAAN_PEMBELIAN_ID":"2","VOLUME_PO":5,"HARGA_MATERI_PO":65000,"HARGA_AWAL":325000,"DISKON1":0,"DISKON2":0,"DISKON3":0,"HARGA_STLH_DISKON":325000,"HARGA_PAJAK":32500,"HARGA_FINAL":292500}', '{"id":0}', '2015-04-15 04:48:16'),
	(1709, 'Sindung Anggar Kusuma', 'sindung', 'p-material/po/simpanPo', 'insert', 'purchase_order', '{"RAB_ID":"3","KATEGORI_PP_ID":"2","TOP_ID":"16","SUPPLIER_ID":"5","STATUS_PO_ID":"2","PAJAK_ID":"2","KATEGORI_PAJAK_ID":"3","GUDANG_ID":"13","PURCHASE_ORDER_KODE":"","PURCHASE_ORDER_TOTAL":"10135000"}', '{"id":13}', '2015-04-15 04:50:25'),
	(1710, 'Sindung Anggar Kusuma', 'sindung', 'p-material/po/simpanPo', 'insert', 'detail_po', '{"PURCHASE_ORDER_ID":"13","BARANG_ID":"96","PERMINTAAN_PEMBELIAN_ID":"1","VOLUME_PO":3100,"HARGA_MATERI_PO":700,"HARGA_AWAL":2170000,"DISKON1":0,"DISKON2":0,"DISKON3":0,"HARGA_STLH_DISKON":2170000,"HARGA_PAJAK":0,"HARGA_FINAL":2170000}', '{"id":0}', '2015-04-15 04:50:26'),
	(1711, 'Sindung Anggar Kusuma', 'sindung', 'p-material/po/simpanPo', 'insert', 'detail_po', '{"PURCHASE_ORDER_ID":"13","BARANG_ID":"26","PERMINTAAN_PEMBELIAN_ID":"1","VOLUME_PO":59,"HARGA_MATERI_PO":135000,"HARGA_AWAL":7965000,"DISKON1":0,"DISKON2":0,"DISKON3":0,"HARGA_STLH_DISKON":7965000,"HARGA_PAJAK":0,"HARGA_FINAL":7965000}', '{"id":0}', '2015-04-15 04:50:27'),
	(1712, 'Sindung Anggar Kusuma', 'sindung', 'p-material/lpb/newLPB', 'insert', 'penerimaan_barang', '{"LPB_SURAT_JALAN":"248971294","LPB_KENDARAAN":"L 1333 KK","STATUS_LPB_ID":2,"PETUGAS_ID":null}', '{"id":14}', '2015-04-15 04:57:41'),
	(1713, 'Sindung Anggar Kusuma', 'sindung', 'p-material/lpb/newLPB', 'insert', 'detail_lpb', '{"PENERIMAAN_BARANG_ID":14,"BARANG_ID":"117","VOLUME_LPB":"5","PO_ID":"12"}', '{"id":0}', '2015-04-15 04:57:41'),
	(1714, 'Sindung Anggar Kusuma', 'sindung', 'p-material/lpb/newLPB', 'insert', 'detail_lpb', '{"PENERIMAAN_BARANG_ID":14,"BARANG_ID":"26","VOLUME_LPB":"59","PO_ID":"13"}', '{"id":0}', '2015-04-15 04:57:42'),
	(1715, 'Sindung Anggar Kusuma', 'sindung', 'p-material/lpb/newLPB', 'insert', 'detail_lpb', '{"PENERIMAAN_BARANG_ID":14,"BARANG_ID":"96","VOLUME_LPB":"3100","PO_ID":"13"}', '{"id":0}', '2015-04-15 04:57:42'),
	(1716, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"1"}', '2015-04-15 05:21:25'),
	(1717, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"2"}', '2015-04-15 05:21:25'),
	(1718, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"3"}', '2015-04-15 05:21:26'),
	(1719, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"4"}', '2015-04-15 05:21:26'),
	(1720, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"5"}', '2015-04-15 05:21:27'),
	(1721, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"6"}', '2015-04-15 05:21:28'),
	(1722, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"7"}', '2015-04-15 05:21:28'),
	(1723, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"8"}', '2015-04-15 05:21:29'),
	(1724, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"9"}', '2015-04-15 05:21:29'),
	(1725, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"10"}', '2015-04-15 05:21:30'),
	(1726, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"11"}', '2015-04-15 05:21:30'),
	(1727, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"12"}', '2015-04-15 05:21:31'),
	(1728, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"13"}', '2015-04-15 05:21:32'),
	(1729, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"14"}', '2015-04-15 05:21:33'),
	(1730, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"15"}', '2015-04-15 05:21:33'),
	(1731, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"16"}', '2015-04-15 05:21:34'),
	(1732, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"17"}', '2015-04-15 05:21:34'),
	(1733, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"18"}', '2015-04-15 05:21:35'),
	(1734, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"19"}', '2015-04-15 05:21:35'),
	(1735, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"20"}', '2015-04-15 05:21:36'),
	(1736, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"21"}', '2015-04-15 05:21:36'),
	(1737, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"22"}', '2015-04-15 05:21:37'),
	(1738, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"23"}', '2015-04-15 05:21:38'),
	(1739, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"24"}', '2015-04-15 05:21:38'),
	(1740, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"25"}', '2015-04-15 05:21:39'),
	(1741, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"26"}', '2015-04-15 05:21:39'),
	(1742, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"27"}', '2015-04-15 05:21:40'),
	(1743, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"28"}', '2015-04-15 05:21:40'),
	(1744, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"29"}', '2015-04-15 05:21:41'),
	(1745, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"30"}', '2015-04-15 05:21:42'),
	(1746, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"31"}', '2015-04-15 05:21:42'),
	(1747, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"32"}', '2015-04-15 05:21:43'),
	(1748, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"33"}', '2015-04-15 05:21:44'),
	(1749, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"34"}', '2015-04-15 05:21:45'),
	(1750, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"35"}', '2015-04-15 05:21:45'),
	(1751, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"36"}', '2015-04-15 05:21:46'),
	(1752, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"37"}', '2015-04-15 05:21:46'),
	(1753, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"38"}', '2015-04-15 05:21:47'),
	(1754, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"39"}', '2015-04-15 05:21:47'),
	(1755, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"41"}', '2015-04-15 05:21:48'),
	(1756, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"42"}', '2015-04-15 05:21:49'),
	(1757, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"43"}', '2015-04-15 05:21:49'),
	(1758, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"44"}', '2015-04-15 05:21:50'),
	(1759, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"45"}', '2015-04-15 05:21:50'),
	(1760, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"46"}', '2015-04-15 05:21:51'),
	(1761, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"47"}', '2015-04-15 05:21:51'),
	(1762, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"48"}', '2015-04-15 05:21:52'),
	(1763, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"49"}', '2015-04-15 05:21:52'),
	(1764, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"50"}', '2015-04-15 05:21:53'),
	(1765, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"51"}', '2015-04-15 05:21:54'),
	(1766, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"52"}', '2015-04-15 05:21:54'),
	(1767, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"53"}', '2015-04-15 05:21:55'),
	(1768, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"54"}', '2015-04-15 05:21:55'),
	(1769, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"55"}', '2015-04-15 05:21:56'),
	(1770, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"56"}', '2015-04-15 05:21:56'),
	(1771, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"57"}', '2015-04-15 05:21:57'),
	(1772, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"9","MODULES_ID":"58"}', '2015-04-15 05:21:57'),
	(1773, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":47,"ROLE_ID":"9"}', '2015-04-15 05:21:58'),
	(1774, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":50,"ROLE_ID":"9"}', '2015-04-15 05:21:58'),
	(1775, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":52,"ROLE_ID":"9"}', '2015-04-15 05:21:59'),
	(1776, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":55,"ROLE_ID":"9"}', '2015-04-15 05:22:00'),
	(1777, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":56,"ROLE_ID":"9"}', '2015-04-15 05:22:00'),
	(1778, 'Sindung Anggar Kusuma', 'sindung', 'user-management/pengguna/save', 'insert', 'pengguna', '{"PENGGUNA_NAMA":"Sukirman","DEPARTEMEN_ID":"17","PENGGUNA_USERNAME":"sukirman","PENGGUNA_PASSWORD":"25d55ad283aa400af464c76d713c07ad","PENGGUNA_EMAIL":"","PENGGUNA_HP":"","PENGGUNA_ACTIVE":1}', '{"id":6}', '2015-04-15 05:22:46'),
	(1779, 'Sindung Anggar Kusuma', 'sindung', 'user-management/role/addRole', 'insert', 'penggunaxroles', '{"PENGGUNA_ID":"6","ROLE_ID":"9"}', '{"id":0}', '2015-04-15 05:23:16'),
	(1780, 'Sukirman', 'sukirman', 'user-management/pengguna/save', 'insert', 'pengguna', '{"PENGGUNA_NAMA":"Handoko","DEPARTEMEN_ID":"4","PENGGUNA_USERNAME":"handoko","PENGGUNA_PASSWORD":"25d55ad283aa400af464c76d713c07ad","PENGGUNA_EMAIL":"","PENGGUNA_HP":"","PENGGUNA_ACTIVE":1}', '{"id":7}', '2015-04-15 05:27:16'),
	(1781, 'Sukirman', 'sukirman', 'user-management/role/addRole', 'insert', 'penggunaxroles', '{"PENGGUNA_ID":"7","ROLE_ID":"7"}', '{"id":0}', '2015-04-15 05:27:51'),
	(1782, 'Sukirman', 'sukirman', 'user-management/role/addRole', 'insert', 'penggunaxroles', '{"PENGGUNA_ID":"7","ROLE_ID":"10"}', '{"id":0}', '2015-04-15 05:28:12'),
	(1783, 'Administrator', 'administrator', 'p-upah/pk/save', 'insert', 'permintaan_pekerjaan', '{"RAB_ID":"2","KATEGORI_PK_ID":"2","STATUS_PK_ID":1,"TOTAL_PK":"0"}', '{"id":2}', '2015-04-15 06:09:13'),
	(1784, 'Administrator', 'administrator', 'p-upah/pk/save', 'insert', 'detail_transaksi_pk', '{"PERMINTAAN_PEKERJAAN_ID":2,"ANALISA_ID":"8","VOLUME_PK":"7"}', '{"id":0}', '2015-04-15 06:09:13'),
	(1785, 'Administrator', 'administrator', 'p-upah/pk/save', 'insert', 'detail_transaksi_pk', '{"PERMINTAAN_PEKERJAAN_ID":2,"ANALISA_ID":"7","VOLUME_PK":"3"}', '{"id":0}', '2015-04-15 06:09:14'),
	(1786, 'Sukirman', 'sukirman', 'rab/rabs/simpanRAB', 'insert', 'rab_transaction', '{"ESTIMATOR_ID":"6","PROJECT_ID":"5","RAB_TOTAL":"15001750","RAB_ACTIVE":1,"RAB_STATUS_APPROVAL_ID":1,"RAB_AFTER_OVERHEAD":15751837.5,"LOKASI_UPAH_ID":"1","LUAS_BANGUNAN":"50"}', '{"id":4}', '2015-04-15 07:05:26'),
	(1787, 'Sukirman', 'sukirman', 'rab/rabs/simpanRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"PERSIAPAN","KATEGORI_PEKERJAAN_URUTAN":1}', '{"id":82}', '2015-04-15 07:05:26'),
	(1788, 'Sukirman', 'sukirman', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"82","ANALISA_ID":"27","RAB_ID":"4","DETAIL_PEKERJAAN_VOLUME":40,"DETAIL_PEKERJAAN_TOTAL":1800000,"DETAIL_PEKERJAAN_URUTAN":1}', '{"id":0}', '2015-04-15 07:05:28'),
	(1789, 'Sukirman', 'sukirman', 'rab/rabs/simpanRAB', 'insert', 'subcon', '{"SUBCON_NAMA":"Sewa Alat Gali","SUBCON_HARGA":500000,"SATUAN_NAMA":"Set"}', '{"id":11}', '2015-04-15 07:05:29'),
	(1790, 'Sukirman', 'sukirman', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"82","SUBCON_ID":"11","RAB_ID":"4","DETAIL_PEKERJAAN_VOLUME":5,"DETAIL_PEKERJAAN_TOTAL":2500000,"DETAIL_PEKERJAAN_URUTAN":2}', '{"id":0}', '2015-04-15 07:05:30'),
	(1791, 'Sukirman', 'sukirman', 'rab/rabs/simpanRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"PONDASI","KATEGORI_PEKERJAAN_URUTAN":2}', '{"id":83}', '2015-04-15 07:05:30'),
	(1792, 'Sukirman', 'sukirman', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"83","ANALISA_ID":"28","RAB_ID":"4","DETAIL_PEKERJAAN_VOLUME":50,"DETAIL_PEKERJAAN_TOTAL":5913750,"DETAIL_PEKERJAAN_URUTAN":1}', '{"id":0}', '2015-04-15 07:05:32'),
	(1793, 'Sukirman', 'sukirman', 'rab/rabs/simpanRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"BANGUNAN","KATEGORI_PEKERJAAN_URUTAN":3}', '{"id":84}', '2015-04-15 07:05:33'),
	(1794, 'Sukirman', 'sukirman', 'rab/rabs/simpanRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"84","ANALISA_ID":"29","RAB_ID":"4","DETAIL_PEKERJAAN_VOLUME":40,"DETAIL_PEKERJAAN_TOTAL":4788000,"DETAIL_PEKERJAAN_URUTAN":1}', '{"id":0}', '2015-04-15 07:05:35'),
	(1795, 'Sukirman', 'sukirman', 'rab/rabs/simpanRAB', 'update', 'rab_transaction', '{"RAB_MATERIAL":6573000,"RAB_UPAH":8428750}', '{"RAB_ID":"4"}', '2015-04-15 07:05:36'),
	(1796, 'Administrator', 'administrator', 'p-material/lpb/validate', 'update', 'penerimaan_barang', '{"VALIDATOR_ID":"1","STATUS_LPB_ID":3}', '{"PENERIMAAN_BARANG_ID":14}', '2015-04-15 07:18:37'),
	(1797, 'Handoko', 'handoko', 'user-management/role/deleteRole', 'delete', 'penggunaxroles', NULL, '{"ROLE_ID":"7","PENGGUNA_ID":"5"}', '2015-04-15 07:48:54'),
	(1798, 'Handoko', 'handoko', 'user-management/role/deleteRole', 'delete', 'penggunaxroles', NULL, '{"ROLE_ID":"11","PENGGUNA_ID":"5"}', '2015-04-15 07:53:14'),
	(1799, 'Handoko', 'handoko', 'user-management/role/addRole', 'insert', 'penggunaxroles', '{"PENGGUNA_ID":"5","ROLE_ID":"11"}', '{"id":0}', '2015-04-15 07:58:31'),
	(1800, 'Administrator', 'administrator', 'p-material/lpb/validate', 'insert', 'stok', '{"RAB_ID":"3","BARANG_ID":"26","GUDANG_ID":"13","VOLUME":"59"}', '{"id":0}', '2015-04-15 08:06:09'),
	(1801, 'Administrator', 'administrator', 'p-material/lpb/validate', 'insert', 'stok', '{"RAB_ID":"3","BARANG_ID":"96","GUDANG_ID":"13","VOLUME":"3100"}', '{"id":0}', '2015-04-15 08:06:09'),
	(1802, 'Administrator', 'administrator', 'p-material/lpb/validate', 'insert', 'stok', '{"RAB_ID":"3","BARANG_ID":"117","GUDANG_ID":"13","VOLUME":"5"}', '{"id":0}', '2015-04-15 08:06:10'),
	(1803, 'Administrator', 'administrator', 'p-material/lpb/validate', 'update', 'penerimaan_barang', '{"VALIDATOR_ID":"1","STATUS_LPB_ID":3}', '{"PENERIMAAN_BARANG_ID":14}', '2015-04-15 08:06:11'),
	(1804, 'Administrator', 'administrator', 'p-material/bpm/BPMAdd', 'insert', 'bpm', '{"BPM_KETERANGAN":"untuk membangun pagar","STATUS_BPM_ID":1}', '{"id":3}', '2015-04-15 08:39:41'),
	(1805, 'Administrator', 'administrator', 'p-material/bpm/BPMAdd', 'insert', 'bpm', '{"BPM_KETERANGAN":"untuk membangun pagar","STATUS_BPM_ID":1}', '{"id":4}', '2015-04-15 08:40:15'),
	(1806, 'Administrator', 'administrator', 'p-material/bpm/BPMAdd', 'insert', 'bpm', '{"BPM_KETERANGAN":"jkkjkj","STATUS_BPM_ID":1,"PETUGAS_GUDANG_ID":null}', '{"id":5}', '2015-04-15 08:47:06'),
	(1807, 'Administrator', 'administrator', 'p-material/bpm/BPMAdd', 'insert', 'bpm', '{"BPM_KETERANGAN":"","STATUS_BPM_ID":1,"PETUGAS_GUDANG_ID":null}', '{"id":6}', '2015-04-15 08:50:28'),
	(1808, 'Administrator', 'administrator', 'user-management/role/addRole', 'insert', 'penggunaxroles', '{"PENGGUNA_ID":"7","ROLE_ID":"11"}', '{"id":0}', '2015-04-15 08:52:40'),
	(1809, 'Administrator', 'administrator', 'p-material/bpm/BPMAdd', 'insert', 'bpm', '{"BPM_KETERANGAN":"","STATUS_BPM_ID":1,"PETUGAS_GUDANG_ID":null,"GUDANG_ID":13}', '{"id":7}', '2015-04-15 09:00:21'),
	(1810, 'Handoko', 'handoko', 'p-material/bpm/BPMAdd', 'insert', 'bpm', '{"BPM_KETERANGAN":"","STATUS_BPM_ID":2,"PETUGAS_GUDANG_ID":null,"GUDANG_ID":13}', '{"id":8}', '2015-04-15 09:31:59'),
	(1811, 'Administrator', 'administrator', 'p-upah/pk/save', 'insert', 'permintaan_pekerjaan', '{"RAB_ID":"3","KATEGORI_PK_ID":"2","STATUS_PK_ID":2,"TOTAL_PK":"0"}', '{"id":3}', '2015-04-15 11:08:55'),
	(1812, 'Administrator', 'administrator', 'p-upah/pk/save', 'insert', 'detail_transaksi_pk', '{"PERMINTAAN_PEKERJAAN_ID":3,"ANALISA_ID":"25","VOLUME_PK":"50"}', '{"id":0}', '2015-04-15 11:08:56'),
	(1813, 'Administrator', 'administrator', 'p-upah/pk/save', 'insert', 'detail_transaksi_pk', '{"PERMINTAAN_PEKERJAAN_ID":3,"ANALISA_ID":"26","VOLUME_PK":"50"}', '{"id":0}', '2015-04-15 11:08:57'),
	(1814, 'Administrator', 'administrator', 'p-upah/pk/save', 'insert', 'detail_transaksi_pk', '{"PERMINTAAN_PEKERJAAN_ID":3,"ANALISA_ID":"22","VOLUME_PK":"100"}', '{"id":0}', '2015-04-15 11:08:57'),
	(1815, 'Administrator', 'administrator', 'p-upah/pk/save', 'insert', 'detail_transaksi_pk', '{"PERMINTAAN_PEKERJAAN_ID":3,"ANALISA_ID":"21","VOLUME_PK":"100"}', '{"id":0}', '2015-04-15 11:08:58'),
	(1816, 'Administrator', 'administrator', 'p-upah/pk/save', 'insert', 'detail_transaksi_pk', '{"PERMINTAAN_PEKERJAAN_ID":3,"ANALISA_ID":"17","VOLUME_PK":"200"}', '{"id":0}', '2015-04-15 11:08:59'),
	(1817, 'Administrator', 'administrator', 'p-upah/pk/save', 'insert', 'detail_transaksi_pk', '{"PERMINTAAN_PEKERJAAN_ID":3,"ANALISA_ID":"24","VOLUME_PK":"100"}', '{"id":0}', '2015-04-15 11:09:00'),
	(1818, 'Administrator', 'administrator', 'p-upah/pk/save', 'insert', 'detail_transaksi_pk', '{"PERMINTAAN_PEKERJAAN_ID":3,"ANALISA_ID":"23","VOLUME_PK":"100"}', '{"id":0}', '2015-04-15 11:09:00'),
	(1819, 'Administrator', 'administrator', 'p-upah/pk/save', 'insert', 'detail_transaksi_pk', '{"PERMINTAAN_PEKERJAAN_ID":3,"ANALISA_ID":"20","VOLUME_PK":"150"}', '{"id":0}', '2015-04-15 11:09:01'),
	(1820, 'Administrator', 'administrator', 'p-upah/pk/save', 'insert', 'detail_transaksi_pk', '{"PERMINTAAN_PEKERJAAN_ID":3,"ANALISA_ID":"19","VOLUME_PK":"150"}', '{"id":0}', '2015-04-15 11:09:02'),
	(1821, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"1"}', '2015-04-15 11:12:11'),
	(1822, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"2"}', '2015-04-15 11:12:12'),
	(1823, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"3"}', '2015-04-15 11:12:13'),
	(1824, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"4"}', '2015-04-15 11:12:13'),
	(1825, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"5"}', '2015-04-15 11:12:14'),
	(1826, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"6"}', '2015-04-15 11:12:15'),
	(1827, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"7"}', '2015-04-15 11:12:15'),
	(1828, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"8"}', '2015-04-15 11:12:16'),
	(1829, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"9"}', '2015-04-15 11:12:16'),
	(1830, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"10"}', '2015-04-15 11:12:18'),
	(1831, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"11"}', '2015-04-15 11:12:19'),
	(1832, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"12"}', '2015-04-15 11:12:20'),
	(1833, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"13"}', '2015-04-15 11:12:21'),
	(1834, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"14"}', '2015-04-15 11:12:22'),
	(1835, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"15"}', '2015-04-15 11:12:22'),
	(1836, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"16"}', '2015-04-15 11:12:23'),
	(1837, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"17"}', '2015-04-15 11:12:24'),
	(1838, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"18"}', '2015-04-15 11:12:24'),
	(1839, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"19"}', '2015-04-15 11:12:25'),
	(1840, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"20"}', '2015-04-15 11:12:25'),
	(1841, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"21"}', '2015-04-15 11:12:26'),
	(1842, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"22"}', '2015-04-15 11:12:27'),
	(1843, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"23"}', '2015-04-15 11:12:27'),
	(1844, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"24"}', '2015-04-15 11:12:28'),
	(1845, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"25"}', '2015-04-15 11:12:29'),
	(1846, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"26"}', '2015-04-15 11:12:29'),
	(1847, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"27"}', '2015-04-15 11:12:30'),
	(1848, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"28"}', '2015-04-15 11:12:31'),
	(1849, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"29"}', '2015-04-15 11:12:31'),
	(1850, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"30"}', '2015-04-15 11:12:32'),
	(1851, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"31"}', '2015-04-15 11:12:32'),
	(1852, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"32"}', '2015-04-15 11:12:33'),
	(1853, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"33"}', '2015-04-15 11:12:34'),
	(1854, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"34"}', '2015-04-15 11:12:34'),
	(1855, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"35"}', '2015-04-15 11:12:35'),
	(1856, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"36"}', '2015-04-15 11:12:36'),
	(1857, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"37"}', '2015-04-15 11:12:36'),
	(1858, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"38"}', '2015-04-15 11:12:37'),
	(1859, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"39"}', '2015-04-15 11:12:38'),
	(1860, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"41"}', '2015-04-15 11:12:38'),
	(1861, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"42"}', '2015-04-15 11:12:39'),
	(1862, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"43"}', '2015-04-15 11:12:40'),
	(1863, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"44"}', '2015-04-15 11:12:40'),
	(1864, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"45"}', '2015-04-15 11:12:41'),
	(1865, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"46"}', '2015-04-15 11:12:42'),
	(1866, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"47"}', '2015-04-15 11:12:43'),
	(1867, 'Sindung Anggar Kusuma', 'sindung', 'master/overhead/simpanOverhead', 'insert', 'overhead', '{"OVERHEAD_NAMA":"","OVERHEAD_KODE":false,"RAB_ID":"3","OVERHEAD_TOTAL":"800000","OVERHEAD_TIPE":"upah","OVERHEAD_ACTIVE":1}', '{"id":5}', '2015-04-15 11:43:08'),
	(1868, 'Sindung Anggar Kusuma', 'sindung', 'master/overhead/simpanOverhead', 'insert', 'overhead', '{"OVERHEAD_NAMA":"","OVERHEAD_KODE":false,"RAB_ID":"3","OVERHEAD_TOTAL":"800000","OVERHEAD_TIPE":"upah","OVERHEAD_ACTIVE":1}', '{"id":6}', '2015-04-15 11:45:12'),
	(1869, 'Sindung Anggar Kusuma', 'sindung', 'master/overhead/simpanOverhead', 'insert', 'detail_overhead', '{"OVERHEAD_ID":"6","PAKET_OVERHEAD_UPAH_ID":"46","DETAIL_OVERHEAD_KOEFISIEN":"10","DETAIL_OVERHEAD_HARGA":"80000","DETAIL_OVERHEAD_TOTAL":800000}', '{"id":4}', '2015-04-15 11:45:13'),
	(1870, 'Handoko', 'handoko', 'p-material/po/simpanPo', 'insert', 'purchase_order', '{"RAB_ID":"4","KATEGORI_PP_ID":"2","TOP_ID":"16","SUPPLIER_ID":"5","STATUS_PO_ID":"2","PAJAK_ID":"2","KATEGORI_PAJAK_ID":"1","GUDANG_ID":"13","PURCHASE_ORDER_TOTAL":"3665700"}', '{"id":14}', '2015-04-15 11:55:36'),
	(1871, 'Handoko', 'handoko', 'p-material/po/simpanPo', 'insert', 'detail_po', '{"PURCHASE_ORDER_ID":"14","BARANG_ID":"96","PERMINTAAN_PEMBELIAN_ID":"3","VOLUME_PO":2480,"HARGA_MATERI_PO":700,"HARGA_AWAL":1736000,"DISKON1":0,"DISKON2":0,"DISKON3":0,"HARGA_STLH_DISKON":1736000,"HARGA_PAJAK":173600,"HARGA_FINAL":1562400}', '{"id":0}', '2015-04-15 11:55:37'),
	(1872, 'Handoko', 'handoko', 'p-material/po/simpanPo', 'insert', 'detail_po', '{"PURCHASE_ORDER_ID":"14","BARANG_ID":"26","PERMINTAAN_PEMBELIAN_ID":"3","VOLUME_PO":1.6,"HARGA_MATERI_PO":135000,"HARGA_AWAL":216000,"DISKON1":0,"DISKON2":0,"DISKON3":0,"HARGA_STLH_DISKON":216000,"HARGA_PAJAK":21600,"HARGA_FINAL":194400}', '{"id":0}', '2015-04-15 11:55:38'),
	(1873, 'Handoko', 'handoko', 'p-material/po/simpanPo', 'insert', 'detail_po', '{"PURCHASE_ORDER_ID":"14","BARANG_ID":"27","PERMINTAAN_PEMBELIAN_ID":"3","VOLUME_PO":15,"HARGA_MATERI_PO":105000,"HARGA_AWAL":1575000,"DISKON1":0,"DISKON2":0,"DISKON3":0,"HARGA_STLH_DISKON":1575000,"HARGA_PAJAK":157500,"HARGA_FINAL":1417500}', '{"id":0}', '2015-04-15 11:55:38'),
	(1874, 'Handoko', 'handoko', 'p-material/po/simpanPo', 'insert', 'detail_po', '{"PURCHASE_ORDER_ID":"14","BARANG_ID":"117","PERMINTAAN_PEMBELIAN_ID":"3","VOLUME_PO":8.4,"HARGA_MATERI_PO":65000,"HARGA_AWAL":546000,"DISKON1":0,"DISKON2":0,"DISKON3":0,"HARGA_STLH_DISKON":546000,"HARGA_PAJAK":54600,"HARGA_FINAL":491400}', '{"id":0}', '2015-04-15 11:55:39'),
	(1875, 'Handoko', 'handoko', 'master/overhead/simpanOverhead', 'insert', 'overhead', '{"OVERHEAD_NAMA":"kode","OVERHEAD_KODE":"kode","RAB_ID":"4","OVERHEAD_TOTAL":"225000","OVERHEAD_TIPE":"barang","OVERHEAD_ACTIVE":1}', '{"id":7}', '2015-04-15 12:16:03'),
	(1876, 'Handoko', 'handoko', 'master/overhead/simpanOverhead', 'insert', 'detail_overhead', '{"OVERHEAD_ID":"7","BARANG_ID":"30","DETAIL_OVERHEAD_KOEFISIEN":"1","DETAIL_OVERHEAD_HARGA":"105000","DETAIL_OVERHEAD_TOTAL":105000}', '{"id":5}', '2015-04-15 12:16:04'),
	(1877, 'Handoko', 'handoko', 'master/overhead/simpanOverhead', 'insert', 'paket_overhead_material', '{"PAKET_OVERHEAD_MATERIAL_NAMA":"Alat Pembersih","PAKET_OVERHEAD_MATERIAL_HARGA":"120000","SATUAN_NAMA":"Set"}', '{"id":6}', '2015-04-15 12:16:04'),
	(1878, 'Handoko', 'handoko', 'master/overhead/simpanOverhead', 'insert', 'detail_overhead', '{"OVERHEAD_ID":"7","PAKET_OVERHEAD_MATERIAL_ID":"6","DETAIL_OVERHEAD_KOEFISIEN":"1","DETAIL_OVERHEAD_HARGA":"120000","DETAIL_OVERHEAD_TOTAL":120000}', '{"id":6}', '2015-04-15 12:16:05'),
	(1879, 'Handoko', 'handoko', 'master/overhead/simpanOverhead', 'insert', 'overhead', '{"OVERHEAD_NAMA":"overhead upah galian","OVERHEAD_KODE":false,"RAB_ID":"3","OVERHEAD_TOTAL":"1300000","OVERHEAD_TIPE":"upah","OVERHEAD_ACTIVE":1}', '{"id":8}', '2015-04-15 12:28:33'),
	(1880, 'Handoko', 'handoko', 'master/overhead/simpanOverhead', 'insert', 'detail_overhead', '{"OVERHEAD_ID":"8","PAKET_OVERHEAD_UPAH_ID":"44","DETAIL_OVERHEAD_KOEFISIEN":"20","DETAIL_OVERHEAD_HARGA":"65000","DETAIL_OVERHEAD_TOTAL":1300000}', '{"id":7}', '2015-04-15 12:28:34'),
	(1881, 'Sindung Anggar Kusuma', 'sindung', 'master/barang/update', 'update', 'master_barang', '{"SATUAN_NAMA":"M3","KATEGORI_BARANG_ID":"1","BARANG_NAMA":"Batu belah 15\\/20 cm","BARANG_KETERANGAN":"Ini adalah keterangan","BARANG_HARGA_TEMP":"135000","LAST_EDITED_BY_USER_ID":"5","LAST_EDITED_TIMESTAMP":"2015-04-15 08:17:52","STATUS_VALIDASI_ID":"5"}', '{"BARANG_ID":"4"}', '2015-04-15 13:17:56'),
	(1882, 'Handoko', 'handoko', 'master/barang/validate', 'update', 'master_barang', '{"VALIDATED_BY_USER_ID":"7","VALIDATED_TIMESTAMP":"2015-04-15 08:19:42","STATUS_VALIDASI_ID":"3"}', '{"BARANG_ID":"4"}', '2015-04-15 13:19:46'),
	(1883, 'Sindung Anggar Kusuma', 'sindung', 'master/barang/update', 'update', 'master_barang', '{"SATUAN_NAMA":"M3","KATEGORI_BARANG_ID":"1","BARANG_NAMA":"Pasir pasang","BARANG_KETERANGAN":"Ini adalah keterangan","BARANG_HARGA_TEMP":"150000","LAST_EDITED_BY_USER_ID":"5","LAST_EDITED_TIMESTAMP":"2015-04-15 08:22:05","STATUS_VALIDASI_ID":"5"}', '{"BARANG_ID":"26"}', '2015-04-15 13:22:09'),
	(1884, 'Handoko', 'handoko', 'master/barang/validate', 'update', 'master_barang', '{"VALIDATED_BY_USER_ID":"7","VALIDATED_TIMESTAMP":"2015-04-15 08:22:49","STATUS_VALIDASI_ID":"3"}', '{"BARANG_ID":"26"}', '2015-04-15 13:22:53'),
	(1885, 'Sindung Anggar Kusuma', 'sindung', 'master/barang/update', 'update', 'master_barang', '{"SATUAN_NAMA":"M3","KATEGORI_BARANG_ID":"1","BARANG_NAMA":"Pasir Urug","BARANG_KETERANGAN":"Ini adalah keterangan","BARANG_HARGA_TEMP":"120000","LAST_EDITED_BY_USER_ID":"5","LAST_EDITED_TIMESTAMP":"2015-04-15 08:29:45","STATUS_VALIDASI_ID":"5"}', '{"BARANG_ID":"27"}', '2015-04-15 13:29:49'),
	(1886, 'Handoko', 'handoko', 'master/barang/validate', 'update', 'master_barang', '{"VALIDATED_BY_USER_ID":"7","VALIDATED_TIMESTAMP":"2015-04-15 08:31:21","STATUS_VALIDASI_ID":"3"}', '{"BARANG_ID":"27"}', '2015-04-15 13:31:25'),
	(1887, 'Administrator', 'administrator', 'p-upah/op/save', 'insert', 'opname', '{"STATUS_OP_ID":1,"KATEGORI_OP_ID":2,"RAB_ID":3,"PETUGAS_ID":"1","OPNAME_TOTAL_HARGA":2147483647}', '{"id":5}', '2015-04-15 13:35:43'),
	(1888, 'Administrator', 'administrator', 'p-upah/op/save', 'insert', 'detail_transaksi_opname', '{"OPNAME_ID":5,"PERMINTAAN_PEKERJAAN_ID":3,"ANALISA_ID":17,"VOLUME_OPNAME":200,"HARGA_OPNAME":"45000"}', '{"id":5}', '2015-04-15 13:35:44'),
	(1889, 'Administrator', 'administrator', 'p-upah/op/save', 'insert', 'detail_transaksi_opname', '{"OPNAME_ID":5,"PERMINTAAN_PEKERJAAN_ID":3,"ANALISA_ID":19,"VOLUME_OPNAME":150,"HARGA_OPNAME":"26000"}', '{"id":5}', '2015-04-15 13:35:44'),
	(1890, 'Administrator', 'administrator', 'p-upah/op/save', 'insert', 'detail_transaksi_opname', '{"OPNAME_ID":5,"PERMINTAAN_PEKERJAAN_ID":3,"ANALISA_ID":20,"VOLUME_OPNAME":150,"HARGA_OPNAME":"30000"}', '{"id":5}', '2015-04-15 13:35:45'),
	(1891, 'Administrator', 'administrator', 'p-upah/op/save', 'insert', 'detail_transaksi_opname', '{"OPNAME_ID":5,"PERMINTAAN_PEKERJAAN_ID":3,"ANALISA_ID":21,"VOLUME_OPNAME":100,"HARGA_OPNAME":"15000"}', '{"id":5}', '2015-04-15 13:35:46'),
	(1892, 'Administrator', 'administrator', 'p-upah/op/save', 'insert', 'detail_transaksi_opname', '{"OPNAME_ID":5,"PERMINTAAN_PEKERJAAN_ID":3,"ANALISA_ID":22,"VOLUME_OPNAME":100,"HARGA_OPNAME":"86775"}', '{"id":5}', '2015-04-15 13:35:46'),
	(1893, 'Administrator', 'administrator', 'p-upah/op/save', 'insert', 'detail_transaksi_opname', '{"OPNAME_ID":5,"PERMINTAAN_PEKERJAAN_ID":3,"ANALISA_ID":23,"VOLUME_OPNAME":100,"HARGA_OPNAME":"9000"}', '{"id":5}', '2015-04-15 13:35:47'),
	(1894, 'Administrator', 'administrator', 'p-upah/op/save', 'insert', 'detail_transaksi_opname', '{"OPNAME_ID":5,"PERMINTAAN_PEKERJAAN_ID":3,"ANALISA_ID":24,"VOLUME_OPNAME":100,"HARGA_OPNAME":"160000"}', '{"id":5}', '2015-04-15 13:35:47'),
	(1895, 'Administrator', 'administrator', 'p-upah/op/save', 'insert', 'detail_transaksi_opname', '{"OPNAME_ID":5,"PERMINTAAN_PEKERJAAN_ID":3,"ANALISA_ID":25,"VOLUME_OPNAME":50,"HARGA_OPNAME":"57250"}', '{"id":5}', '2015-04-15 13:35:48'),
	(1896, 'Handoko', 'handoko', 'estimasi/estimasi/save', 'update', 'rab_transaction', '{"ESTIMASI_JUMLAH_ORANG":20,"ESTIMASI_CUACA":2,"ESTIMASI_UMUR_BANGUNAN":5,"ESTIMASI_TOTAL_WAKTU":54}', '{"RAB_ID":"3"}', '2015-04-15 13:41:23'),
	(1897, 'Handoko', 'handoko', 'estimasi/estimasi/save', 'update', 'rab_transaction', '{"ESTIMASI_JUMLAH_ORANG":13,"ESTIMASI_CUACA":2,"ESTIMASI_UMUR_BANGUNAN":5,"ESTIMASI_TOTAL_WAKTU":78}', '{"RAB_ID":"3"}', '2015-04-15 13:49:33'),
	(1898, 'Handoko', 'handoko', 'p-upah/pk/save', 'insert', 'permintaan_pekerjaan', '{"RAB_ID":"4","KATEGORI_PK_ID":"2","STATUS_PK_ID":2,"TOTAL_PK":"0"}', '{"id":4}', '2015-04-15 14:05:25'),
	(1899, 'Handoko', 'handoko', 'p-upah/pk/save', 'insert', 'detail_transaksi_pk', '{"PERMINTAAN_PEKERJAAN_ID":4,"ANALISA_ID":"27","VOLUME_PK":"20"}', '{"id":0}', '2015-04-15 14:05:26'),
	(1900, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'update', 'rab_transaction', '{"PROJECT_ID":"3","RAB_TOTAL":"64695051","RAB_ACTIVE":1,"RAB_STATUS_APPROVAL_ID":1,"RAB_AFTER_OVERHEAD":67929803.55,"LOKASI_UPAH_ID":"1","LUAS_BANGUNAN":"100"}', '{"RAB_ID":"2"}', '2015-04-15 22:34:55'),
	(1901, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'delete', 'detail_pekerjaan', NULL, '{"RAB_ID":"2"}', '2015-04-15 22:34:59'),
	(1902, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"PERSIAPAN","KATEGORI_PEKERJAAN_URUTAN":"1"}', '{"id":85}', '2015-04-15 22:35:05'),
	(1903, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"85","ANALISA_ID":"29","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":100,"DETAIL_PEKERJAAN_TOTAL":4500000,"DETAIL_PEKERJAAN_URUTAN":1}', '{"id":0}', '2015-04-15 22:35:08'),
	(1904, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"85","ANALISA_ID":"30","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":10,"DETAIL_PEKERJAAN_TOTAL":341500,"DETAIL_PEKERJAAN_URUTAN":2}', '{"id":0}', '2015-04-15 22:35:10'),
	(1905, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"85","ANALISA_ID":"31","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":5,"DETAIL_PEKERJAAN_TOTAL":3415000,"DETAIL_PEKERJAAN_URUTAN":3}', '{"id":0}', '2015-04-15 22:35:12'),
	(1906, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"85","ANALISA_ID":"32","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":12,"DETAIL_PEKERJAAN_TOTAL":9036000,"DETAIL_PEKERJAAN_URUTAN":4}', '{"id":0}', '2015-04-15 22:35:14'),
	(1907, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"PONDASI","KATEGORI_PEKERJAAN_URUTAN":"2"}', '{"id":86}', '2015-04-15 22:35:15'),
	(1908, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"86","ANALISA_ID":"33","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":14,"DETAIL_PEKERJAAN_TOTAL":1684200,"DETAIL_PEKERJAAN_URUTAN":1}', '{"id":0}', '2015-04-15 22:35:17'),
	(1909, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"86","ANALISA_ID":"33","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":30,"DETAIL_PEKERJAAN_TOTAL":960615,"DETAIL_PEKERJAAN_URUTAN":2}', '{"id":0}', '2015-04-15 22:35:19'),
	(1910, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"86","ANALISA_ID":"34","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":14,"DETAIL_PEKERJAAN_TOTAL":8080800,"DETAIL_PEKERJAAN_URUTAN":3}', '{"id":0}', '2015-04-15 22:35:21'),
	(1911, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"BANGUNAN","KATEGORI_PEKERJAAN_URUTAN":"3"}', '{"id":87}', '2015-04-15 22:35:21'),
	(1912, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"87","ANALISA_ID":"35","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":15,"DETAIL_PEKERJAAN_TOTAL":675000,"DETAIL_PEKERJAAN_URUTAN":1}', '{"id":0}', '2015-04-15 22:35:24'),
	(1913, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"87","ANALISA_ID":"36","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":16,"DETAIL_PEKERJAAN_TOTAL":6001936,"DETAIL_PEKERJAAN_URUTAN":2}', '{"id":0}', '2015-04-15 22:35:26'),
	(1914, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'insert', 'subcon', '{"SUBCON_NAMA":"Pembersihan Awal & Akhir Proyek","SUBCON_HARGA":1500000,"SATUAN_NAMA":"M3"}', '{"id":12}', '2015-04-15 22:35:27'),
	(1915, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"87","SUBCON_ID":"12","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":20,"DETAIL_PEKERJAAN_TOTAL":30000000,"DETAIL_PEKERJAAN_URUTAN":3}', '{"id":0}', '2015-04-15 22:35:28'),
	(1916, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'update', 'rab_transaction', '{"RAB_MATERIAL":56143126,"RAB_UPAH":18730310}', '{"RAB_ID":"2"}', '2015-04-15 22:35:31'),
	(1917, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'update', 'rab_transaction', '{"PROJECT_ID":"3","RAB_TOTAL":"64182091","RAB_ACTIVE":1,"RAB_STATUS_APPROVAL_ID":1,"RAB_AFTER_OVERHEAD":67391195.55,"LOKASI_UPAH_ID":"1","LUAS_BANGUNAN":"100"}', '{"RAB_ID":"2"}', '2015-04-15 22:38:38'),
	(1918, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'delete', 'detail_pekerjaan', NULL, '{"RAB_ID":"2"}', '2015-04-15 22:38:39'),
	(1919, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"PERSIAPAN","KATEGORI_PEKERJAAN_URUTAN":"1"}', '{"id":88}', '2015-04-15 22:38:40'),
	(1920, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"88","ANALISA_ID":"37","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":100,"DETAIL_PEKERJAAN_TOTAL":4500000,"DETAIL_PEKERJAAN_URUTAN":1}', '{"id":0}', '2015-04-15 22:38:44'),
	(1921, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"88","ANALISA_ID":"38","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":10,"DETAIL_PEKERJAAN_TOTAL":341500,"DETAIL_PEKERJAAN_URUTAN":2}', '{"id":0}', '2015-04-15 22:38:48'),
	(1922, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"88","ANALISA_ID":"39","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":5,"DETAIL_PEKERJAAN_TOTAL":3415000,"DETAIL_PEKERJAAN_URUTAN":3}', '{"id":0}', '2015-04-15 22:39:26'),
	(1923, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"88","ANALISA_ID":"40","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":12,"DETAIL_PEKERJAAN_TOTAL":9036000,"DETAIL_PEKERJAAN_URUTAN":4}', '{"id":0}', '2015-04-15 22:39:28'),
	(1924, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"PONDASI","KATEGORI_PEKERJAAN_URUTAN":"2"}', '{"id":89}', '2015-04-15 22:39:30'),
	(1925, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"89","ANALISA_ID":"41","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":14,"DETAIL_PEKERJAAN_TOTAL":1684200,"DETAIL_PEKERJAAN_URUTAN":1}', '{"id":0}', '2015-04-15 22:39:32'),
	(1926, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"89","ANALISA_ID":"42","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":13,"DETAIL_PEKERJAAN_TOTAL":447655,"DETAIL_PEKERJAAN_URUTAN":2}', '{"id":0}', '2015-04-15 22:39:34'),
	(1927, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"89","ANALISA_ID":"43","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":14,"DETAIL_PEKERJAAN_TOTAL":8080800,"DETAIL_PEKERJAAN_URUTAN":3}', '{"id":0}', '2015-04-15 22:39:37'),
	(1928, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'insert', 'kategori_paket_pekerjaan', '{"KATEGORI_PEKERJAAN_NAMA":"BANGUNAN","KATEGORI_PEKERJAAN_URUTAN":"3"}', '{"id":90}', '2015-04-15 22:39:38'),
	(1929, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"90","ANALISA_ID":"44","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":15,"DETAIL_PEKERJAAN_TOTAL":675000,"DETAIL_PEKERJAAN_URUTAN":1}', '{"id":0}', '2015-04-15 22:40:14'),
	(1930, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"90","ANALISA_ID":"45","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":16,"DETAIL_PEKERJAAN_TOTAL":6001936,"DETAIL_PEKERJAAN_URUTAN":2}', '{"id":0}', '2015-04-15 22:40:15'),
	(1931, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'insert', 'subcon', '{"SUBCON_NAMA":"Pembersihan Awal & Akhir Proyek","SUBCON_HARGA":1500000,"SATUAN_NAMA":"M3"}', '{"id":13}', '2015-04-15 22:40:18'),
	(1932, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'insert', 'detail_pekerjaan', '{"KATEGORI_PEKERJAAN_ID":"90","SUBCON_ID":"13","RAB_ID":"2","DETAIL_PEKERJAAN_VOLUME":20,"DETAIL_PEKERJAAN_TOTAL":30000000,"DETAIL_PEKERJAAN_URUTAN":3}', '{"id":0}', '2015-04-15 22:40:19'),
	(1933, 'Sindung Anggar Kusuma', 'sindung', 'rab/rabs/updateRAB', 'update', 'rab_transaction', '{"RAB_MATERIAL":36947505,"RAB_UPAH":7307050}', '{"RAB_ID":"2"}', '2015-04-15 22:40:39'),
	(1934, 'Administrator', 'administrator', 'p-upah/pk/save', 'insert', 'permintaan_pekerjaan', '{"RAB_ID":"2","KATEGORI_PK_ID":"2","STATUS_PK_ID":2,"TOTAL_PK":"0"}', '{"id":5}', '2015-04-16 10:05:23'),
	(1935, 'Administrator', 'administrator', 'p-upah/pk/save', 'insert', 'detail_transaksi_pk', '{"PERMINTAAN_PEKERJAAN_ID":5,"ANALISA_ID":"41","VOLUME_PK":"12"}', '{"id":0}', '2015-04-16 10:05:24'),
	(1936, 'Administrator', 'administrator', 'p-upah/pk/save', 'insert', 'detail_transaksi_pk', '{"PERMINTAAN_PEKERJAAN_ID":5,"ANALISA_ID":"44","VOLUME_PK":"1"}', '{"id":0}', '2015-04-16 10:05:25'),
	(1937, 'Administrator', 'administrator', 'user-management/role/deleteRole', 'delete', 'penggunaxroles', NULL, '{"ROLE_ID":"1","PENGGUNA_ID":"1"}', '2015-04-16 13:53:09'),
	(1938, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"1"}', '2015-04-16 13:56:08'),
	(1939, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"2"}', '2015-04-16 13:56:08'),
	(1940, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"3"}', '2015-04-16 13:56:09'),
	(1941, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"4"}', '2015-04-16 13:56:09'),
	(1942, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"5"}', '2015-04-16 13:56:10'),
	(1943, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"6"}', '2015-04-16 13:56:11'),
	(1944, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"7"}', '2015-04-16 13:56:11'),
	(1945, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"8"}', '2015-04-16 13:56:12'),
	(1946, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"9"}', '2015-04-16 13:56:13'),
	(1947, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"10"}', '2015-04-16 13:56:14'),
	(1948, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"11"}', '2015-04-16 13:56:15'),
	(1949, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"12"}', '2015-04-16 13:56:16'),
	(1950, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"13"}', '2015-04-16 13:56:16'),
	(1951, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"14"}', '2015-04-16 13:56:17'),
	(1952, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"15"}', '2015-04-16 13:56:18'),
	(1953, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"16"}', '2015-04-16 13:56:18'),
	(1954, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"17"}', '2015-04-16 13:56:19'),
	(1955, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"18"}', '2015-04-16 13:56:19'),
	(1956, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"19"}', '2015-04-16 13:56:20'),
	(1957, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"20"}', '2015-04-16 13:56:20'),
	(1958, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"21"}', '2015-04-16 13:56:21'),
	(1959, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"22"}', '2015-04-16 13:56:21'),
	(1960, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"23"}', '2015-04-16 13:56:22'),
	(1961, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"24"}', '2015-04-16 13:56:22'),
	(1962, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"25"}', '2015-04-16 13:56:23'),
	(1963, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"26"}', '2015-04-16 13:56:24'),
	(1964, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"27"}', '2015-04-16 13:56:25'),
	(1965, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"28"}', '2015-04-16 13:56:25'),
	(1966, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"29"}', '2015-04-16 13:56:26'),
	(1967, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"30"}', '2015-04-16 13:56:26'),
	(1968, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"31"}', '2015-04-16 13:56:27'),
	(1969, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"32"}', '2015-04-16 13:56:27'),
	(1970, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"33"}', '2015-04-16 13:56:28'),
	(1971, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"34"}', '2015-04-16 13:56:29'),
	(1972, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"35"}', '2015-04-16 13:56:30'),
	(1973, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"36"}', '2015-04-16 13:56:30'),
	(1974, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"37"}', '2015-04-16 13:56:31'),
	(1975, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"38"}', '2015-04-16 13:56:31'),
	(1976, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"39"}', '2015-04-16 13:56:32'),
	(1977, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"41"}', '2015-04-16 13:56:32'),
	(1978, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"42"}', '2015-04-16 13:56:33'),
	(1979, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"43"}', '2015-04-16 13:56:33'),
	(1980, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"44"}', '2015-04-16 13:56:34'),
	(1981, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"45"}', '2015-04-16 13:56:34'),
	(1982, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"46"}', '2015-04-16 13:56:35'),
	(1983, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"47"}', '2015-04-16 13:56:36'),
	(1984, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"48"}', '2015-04-16 13:56:36'),
	(1985, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"49"}', '2015-04-16 13:56:37'),
	(1986, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"50"}', '2015-04-16 13:56:37'),
	(1987, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"51"}', '2015-04-16 13:56:38'),
	(1988, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"52"}', '2015-04-16 13:56:38'),
	(1989, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"53"}', '2015-04-16 13:56:39'),
	(1990, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"54"}', '2015-04-16 13:56:39'),
	(1991, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"55"}', '2015-04-16 13:56:40'),
	(1992, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"56"}', '2015-04-16 13:56:40'),
	(1993, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"57"}', '2015-04-16 13:56:41'),
	(1994, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"58"}', '2015-04-16 13:56:42'),
	(1995, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":46,"ROLE_ID":"12"}', '2015-04-16 13:56:42'),
	(1996, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":47,"ROLE_ID":"12"}', '2015-04-16 13:56:43'),
	(1997, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":48,"ROLE_ID":"12"}', '2015-04-16 13:56:43'),
	(1998, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":49,"ROLE_ID":"12"}', '2015-04-16 13:56:44'),
	(1999, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":50,"ROLE_ID":"12"}', '2015-04-16 13:56:44'),
	(2000, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":51,"ROLE_ID":"12"}', '2015-04-16 13:56:45'),
	(2001, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":52,"ROLE_ID":"12"}', '2015-04-16 13:56:46'),
	(2002, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":53,"ROLE_ID":"12"}', '2015-04-16 13:56:46'),
	(2003, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":54,"ROLE_ID":"12"}', '2015-04-16 13:56:47'),
	(2004, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":55,"ROLE_ID":"12"}', '2015-04-16 13:56:47'),
	(2005, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":56,"ROLE_ID":"12"}', '2015-04-16 13:56:48'),
	(2006, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":57,"ROLE_ID":"12"}', '2015-04-16 13:56:48'),
	(2007, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":58,"ROLE_ID":"12"}', '2015-04-16 13:56:49'),
	(2008, 'Administrator', 'administrator', 'user-management/role/addRole', 'insert', 'penggunaxroles', '{"PENGGUNA_ID":"1","ROLE_ID":"1"}', '{"id":0}', '2015-04-16 13:57:04'),
	(2009, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"1"}', '2015-04-16 13:58:54'),
	(2010, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"2"}', '2015-04-16 13:58:54'),
	(2011, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"3"}', '2015-04-16 13:58:55'),
	(2012, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"4"}', '2015-04-16 13:58:55'),
	(2013, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"5"}', '2015-04-16 13:58:56'),
	(2014, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"6"}', '2015-04-16 13:58:56'),
	(2015, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"7"}', '2015-04-16 13:58:57'),
	(2016, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"8"}', '2015-04-16 13:58:57'),
	(2017, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"9"}', '2015-04-16 13:58:58'),
	(2018, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"10"}', '2015-04-16 13:58:58'),
	(2019, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"11"}', '2015-04-16 13:58:59'),
	(2020, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"12"}', '2015-04-16 13:58:59'),
	(2021, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"13"}', '2015-04-16 13:59:00'),
	(2022, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"14"}', '2015-04-16 13:59:01'),
	(2023, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"15"}', '2015-04-16 13:59:01'),
	(2024, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"16"}', '2015-04-16 13:59:02'),
	(2025, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"17"}', '2015-04-16 13:59:02'),
	(2026, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"18"}', '2015-04-16 13:59:03'),
	(2027, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"19"}', '2015-04-16 13:59:03'),
	(2028, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"20"}', '2015-04-16 13:59:04'),
	(2029, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"21"}', '2015-04-16 13:59:04'),
	(2030, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"22"}', '2015-04-16 13:59:05'),
	(2031, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"23"}', '2015-04-16 13:59:05'),
	(2032, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"24"}', '2015-04-16 13:59:06'),
	(2033, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"25"}', '2015-04-16 13:59:06'),
	(2034, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"26"}', '2015-04-16 13:59:07'),
	(2035, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"27"}', '2015-04-16 13:59:07'),
	(2036, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"28"}', '2015-04-16 13:59:08'),
	(2037, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"29"}', '2015-04-16 13:59:08'),
	(2038, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"30"}', '2015-04-16 13:59:09'),
	(2039, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"31"}', '2015-04-16 13:59:09'),
	(2040, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"32"}', '2015-04-16 13:59:10'),
	(2041, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"33"}', '2015-04-16 13:59:10'),
	(2042, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"34"}', '2015-04-16 13:59:11'),
	(2043, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"35"}', '2015-04-16 13:59:11'),
	(2044, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"36"}', '2015-04-16 13:59:12'),
	(2045, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"37"}', '2015-04-16 13:59:12'),
	(2046, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"38"}', '2015-04-16 13:59:13'),
	(2047, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"39"}', '2015-04-16 13:59:13'),
	(2048, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"41"}', '2015-04-16 13:59:14'),
	(2049, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"42"}', '2015-04-16 13:59:14'),
	(2050, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"43"}', '2015-04-16 13:59:15'),
	(2051, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"44"}', '2015-04-16 13:59:16'),
	(2052, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"45"}', '2015-04-16 13:59:16'),
	(2053, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"46"}', '2015-04-16 13:59:17'),
	(2054, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"47"}', '2015-04-16 13:59:17'),
	(2055, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"48"}', '2015-04-16 13:59:18'),
	(2056, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"49"}', '2015-04-16 13:59:18'),
	(2057, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"50"}', '2015-04-16 13:59:19'),
	(2058, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"51"}', '2015-04-16 13:59:19'),
	(2059, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"52"}', '2015-04-16 13:59:20'),
	(2060, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"53"}', '2015-04-16 13:59:20'),
	(2061, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"54"}', '2015-04-16 13:59:21'),
	(2062, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"55"}', '2015-04-16 13:59:21'),
	(2063, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"56"}', '2015-04-16 13:59:22'),
	(2064, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"57"}', '2015-04-16 13:59:22'),
	(2065, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"12","MODULES_ID":"58"}', '2015-04-16 13:59:23'),
	(2066, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":38,"ROLE_ID":"12"}', '2015-04-16 13:59:24'),
	(2067, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":39,"ROLE_ID":"12"}', '2015-04-16 13:59:24'),
	(2068, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":41,"ROLE_ID":"12"}', '2015-04-16 13:59:25'),
	(2069, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":42,"ROLE_ID":"12"}', '2015-04-16 13:59:25'),
	(2070, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":43,"ROLE_ID":"12"}', '2015-04-16 13:59:26'),
	(2071, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":44,"ROLE_ID":"12"}', '2015-04-16 13:59:26'),
	(2072, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":45,"ROLE_ID":"12"}', '2015-04-16 13:59:27'),
	(2073, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":46,"ROLE_ID":"12"}', '2015-04-16 13:59:27'),
	(2074, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":47,"ROLE_ID":"12"}', '2015-04-16 13:59:28'),
	(2075, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":48,"ROLE_ID":"12"}', '2015-04-16 13:59:28'),
	(2076, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":49,"ROLE_ID":"12"}', '2015-04-16 13:59:29'),
	(2077, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":50,"ROLE_ID":"12"}', '2015-04-16 13:59:29'),
	(2078, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":51,"ROLE_ID":"12"}', '2015-04-16 13:59:30'),
	(2079, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":52,"ROLE_ID":"12"}', '2015-04-16 13:59:30'),
	(2080, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":53,"ROLE_ID":"12"}', '2015-04-16 13:59:31'),
	(2081, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":54,"ROLE_ID":"12"}', '2015-04-16 13:59:31'),
	(2082, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":55,"ROLE_ID":"12"}', '2015-04-16 13:59:32'),
	(2083, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":56,"ROLE_ID":"12"}', '2015-04-16 13:59:32'),
	(2084, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":57,"ROLE_ID":"12"}', '2015-04-16 13:59:33'),
	(2085, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":58,"ROLE_ID":"12"}', '2015-04-16 13:59:33'),
	(2086, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"1"}', '2015-04-16 13:59:59'),
	(2087, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"2"}', '2015-04-16 14:00:00'),
	(2088, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"3"}', '2015-04-16 14:00:01'),
	(2089, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"4"}', '2015-04-16 14:00:01'),
	(2090, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"5"}', '2015-04-16 14:00:02'),
	(2091, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"6"}', '2015-04-16 14:00:02'),
	(2092, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"7"}', '2015-04-16 14:00:03'),
	(2093, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"8"}', '2015-04-16 14:00:03'),
	(2094, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"9"}', '2015-04-16 14:00:04'),
	(2095, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"10"}', '2015-04-16 14:00:04'),
	(2096, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"11"}', '2015-04-16 14:00:05'),
	(2097, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"12"}', '2015-04-16 14:00:05'),
	(2098, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"13"}', '2015-04-16 14:00:06'),
	(2099, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"14"}', '2015-04-16 14:00:06'),
	(2100, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"15"}', '2015-04-16 14:00:07'),
	(2101, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"16"}', '2015-04-16 14:00:07'),
	(2102, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"17"}', '2015-04-16 14:00:08'),
	(2103, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"18"}', '2015-04-16 14:00:08'),
	(2104, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"19"}', '2015-04-16 14:00:09'),
	(2105, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"20"}', '2015-04-16 14:00:09'),
	(2106, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"21"}', '2015-04-16 14:00:10'),
	(2107, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"22"}', '2015-04-16 14:00:10'),
	(2108, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"23"}', '2015-04-16 14:00:11'),
	(2109, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"24"}', '2015-04-16 14:00:11'),
	(2110, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"25"}', '2015-04-16 14:00:12'),
	(2111, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"26"}', '2015-04-16 14:00:12'),
	(2112, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"27"}', '2015-04-16 14:00:13'),
	(2113, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"28"}', '2015-04-16 14:00:13'),
	(2114, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"29"}', '2015-04-16 14:00:14'),
	(2115, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"30"}', '2015-04-16 14:00:14'),
	(2116, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"31"}', '2015-04-16 14:00:15'),
	(2117, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"32"}', '2015-04-16 14:00:15'),
	(2118, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"33"}', '2015-04-16 14:00:16'),
	(2119, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"34"}', '2015-04-16 14:00:17'),
	(2120, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"35"}', '2015-04-16 14:00:18'),
	(2121, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"36"}', '2015-04-16 14:00:18'),
	(2122, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"37"}', '2015-04-16 14:00:19'),
	(2123, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"38"}', '2015-04-16 14:00:19'),
	(2124, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"39"}', '2015-04-16 14:00:20'),
	(2125, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"41"}', '2015-04-16 14:00:20'),
	(2126, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"42"}', '2015-04-16 14:00:21'),
	(2127, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"43"}', '2015-04-16 14:00:21'),
	(2128, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"44"}', '2015-04-16 14:00:22'),
	(2129, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"45"}', '2015-04-16 14:00:22'),
	(2130, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"46"}', '2015-04-16 14:00:23'),
	(2131, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"47"}', '2015-04-16 14:00:23'),
	(2132, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"48"}', '2015-04-16 14:00:24'),
	(2133, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"49"}', '2015-04-16 14:00:24'),
	(2134, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"50"}', '2015-04-16 14:00:25'),
	(2135, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"51"}', '2015-04-16 14:00:25'),
	(2136, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"52"}', '2015-04-16 14:00:26'),
	(2137, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"53"}', '2015-04-16 14:00:26'),
	(2138, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"54"}', '2015-04-16 14:00:27'),
	(2139, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"55"}', '2015-04-16 14:00:27'),
	(2140, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"56"}', '2015-04-16 14:00:28'),
	(2141, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"57"}', '2015-04-16 14:00:28'),
	(2142, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"58"}', '2015-04-16 14:00:29'),
	(2143, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":38,"ROLE_ID":"1"}', '2015-04-16 14:00:30'),
	(2144, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":39,"ROLE_ID":"1"}', '2015-04-16 14:00:30'),
	(2145, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":41,"ROLE_ID":"1"}', '2015-04-16 14:00:31'),
	(2146, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":42,"ROLE_ID":"1"}', '2015-04-16 14:00:32'),
	(2147, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":43,"ROLE_ID":"1"}', '2015-04-16 14:00:32'),
	(2148, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":44,"ROLE_ID":"1"}', '2015-04-16 14:00:33'),
	(2149, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":45,"ROLE_ID":"1"}', '2015-04-16 14:00:33'),
	(2150, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":46,"ROLE_ID":"1"}', '2015-04-16 14:00:34'),
	(2151, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":47,"ROLE_ID":"1"}', '2015-04-16 14:00:34'),
	(2152, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":48,"ROLE_ID":"1"}', '2015-04-16 14:00:35'),
	(2153, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":49,"ROLE_ID":"1"}', '2015-04-16 14:00:35'),
	(2154, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":50,"ROLE_ID":"1"}', '2015-04-16 14:00:36'),
	(2155, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":51,"ROLE_ID":"1"}', '2015-04-16 14:00:36'),
	(2156, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":52,"ROLE_ID":"1"}', '2015-04-16 14:00:37'),
	(2157, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":54,"ROLE_ID":"1"}', '2015-04-16 14:00:38'),
	(2158, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":55,"ROLE_ID":"1"}', '2015-04-16 14:00:38'),
	(2159, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":56,"ROLE_ID":"1"}', '2015-04-16 14:00:39'),
	(2160, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":57,"ROLE_ID":"1"}', '2015-04-16 14:00:39'),
	(2161, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":58,"ROLE_ID":"1"}', '2015-04-16 14:00:40'),
	(2162, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"1"}', '2015-04-16 14:27:33'),
	(2163, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"2"}', '2015-04-16 14:27:34'),
	(2164, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"3"}', '2015-04-16 14:27:34'),
	(2165, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"4"}', '2015-04-16 14:27:35'),
	(2166, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"5"}', '2015-04-16 14:27:35'),
	(2167, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"6"}', '2015-04-16 14:27:36'),
	(2168, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"7"}', '2015-04-16 14:27:36'),
	(2169, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"8"}', '2015-04-16 14:27:37'),
	(2170, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"9"}', '2015-04-16 14:27:37'),
	(2171, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"10"}', '2015-04-16 14:27:38'),
	(2172, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"11"}', '2015-04-16 14:27:38'),
	(2173, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"12"}', '2015-04-16 14:27:39'),
	(2174, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"13"}', '2015-04-16 14:27:39'),
	(2175, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"14"}', '2015-04-16 14:27:40'),
	(2176, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"15"}', '2015-04-16 14:27:40'),
	(2177, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"16"}', '2015-04-16 14:27:41'),
	(2178, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"17"}', '2015-04-16 14:27:42'),
	(2179, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"18"}', '2015-04-16 14:27:42'),
	(2180, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"19"}', '2015-04-16 14:27:43'),
	(2181, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"20"}', '2015-04-16 14:27:43'),
	(2182, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"21"}', '2015-04-16 14:27:44'),
	(2183, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"22"}', '2015-04-16 14:27:44'),
	(2184, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"23"}', '2015-04-16 14:27:45'),
	(2185, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"24"}', '2015-04-16 14:27:45'),
	(2186, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"25"}', '2015-04-16 14:27:46'),
	(2187, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"26"}', '2015-04-16 14:27:46'),
	(2188, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"27"}', '2015-04-16 14:27:47'),
	(2189, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"28"}', '2015-04-16 14:27:47'),
	(2190, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"29"}', '2015-04-16 14:27:48'),
	(2191, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"30"}', '2015-04-16 14:27:48'),
	(2192, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"31"}', '2015-04-16 14:27:49'),
	(2193, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"32"}', '2015-04-16 14:27:49'),
	(2194, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"33"}', '2015-04-16 14:27:50'),
	(2195, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"34"}', '2015-04-16 14:27:50'),
	(2196, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"35"}', '2015-04-16 14:27:51'),
	(2197, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"36"}', '2015-04-16 14:27:51'),
	(2198, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"37"}', '2015-04-16 14:27:52'),
	(2199, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"38"}', '2015-04-16 14:27:53'),
	(2200, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"39"}', '2015-04-16 14:27:53'),
	(2201, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"41"}', '2015-04-16 14:27:54'),
	(2202, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"42"}', '2015-04-16 14:27:54'),
	(2203, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"43"}', '2015-04-16 14:27:55'),
	(2204, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"44"}', '2015-04-16 14:27:55'),
	(2205, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"45"}', '2015-04-16 14:27:56'),
	(2206, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"46"}', '2015-04-16 14:27:56'),
	(2207, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"47"}', '2015-04-16 14:27:57'),
	(2208, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"48"}', '2015-04-16 14:27:57'),
	(2209, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"49"}', '2015-04-16 14:27:58'),
	(2210, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"50"}', '2015-04-16 14:27:58'),
	(2211, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"51"}', '2015-04-16 14:27:59'),
	(2212, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"52"}', '2015-04-16 14:27:59'),
	(2213, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"53"}', '2015-04-16 14:28:00'),
	(2214, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"54"}', '2015-04-16 14:28:00'),
	(2215, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"55"}', '2015-04-16 14:28:01'),
	(2216, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"56"}', '2015-04-16 14:28:01'),
	(2217, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"57"}', '2015-04-16 14:28:02'),
	(2218, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"58"}', '2015-04-16 14:28:02'),
	(2219, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":38,"ROLE_ID":"1"}', '2015-04-16 14:28:03'),
	(2220, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":39,"ROLE_ID":"1"}', '2015-04-16 14:28:03'),
	(2221, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":41,"ROLE_ID":"1"}', '2015-04-16 14:28:04'),
	(2222, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":42,"ROLE_ID":"1"}', '2015-04-16 14:28:04'),
	(2223, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":43,"ROLE_ID":"1"}', '2015-04-16 14:28:05'),
	(2224, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":44,"ROLE_ID":"1"}', '2015-04-16 14:28:05'),
	(2225, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":45,"ROLE_ID":"1"}', '2015-04-16 14:28:06'),
	(2226, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":46,"ROLE_ID":"1"}', '2015-04-16 14:28:06'),
	(2227, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":47,"ROLE_ID":"1"}', '2015-04-16 14:28:07'),
	(2228, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":48,"ROLE_ID":"1"}', '2015-04-16 14:28:07'),
	(2229, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":49,"ROLE_ID":"1"}', '2015-04-16 14:28:08'),
	(2230, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":50,"ROLE_ID":"1"}', '2015-04-16 14:28:08'),
	(2231, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":51,"ROLE_ID":"1"}', '2015-04-16 14:28:09'),
	(2232, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":54,"ROLE_ID":"1"}', '2015-04-16 14:28:09'),
	(2233, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":55,"ROLE_ID":"1"}', '2015-04-16 14:28:10'),
	(2234, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":56,"ROLE_ID":"1"}', '2015-04-16 14:28:10'),
	(2235, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":57,"ROLE_ID":"1"}', '2015-04-16 14:28:11'),
	(2236, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":58,"ROLE_ID":"1"}', '2015-04-16 14:28:11'),
	(2237, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"1"}', '2015-04-16 14:42:23'),
	(2238, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"2"}', '2015-04-16 14:42:23'),
	(2239, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"3"}', '2015-04-16 14:42:24'),
	(2240, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"4"}', '2015-04-16 14:42:24'),
	(2241, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"5"}', '2015-04-16 14:42:25'),
	(2242, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"6"}', '2015-04-16 14:42:25'),
	(2243, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"7"}', '2015-04-16 14:42:26'),
	(2244, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"8"}', '2015-04-16 14:42:26'),
	(2245, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"9"}', '2015-04-16 14:42:27'),
	(2246, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"10"}', '2015-04-16 14:42:27'),
	(2247, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"11"}', '2015-04-16 14:42:28'),
	(2248, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"12"}', '2015-04-16 14:42:28'),
	(2249, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"13"}', '2015-04-16 14:42:29'),
	(2250, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"14"}', '2015-04-16 14:42:29'),
	(2251, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"15"}', '2015-04-16 14:42:30'),
	(2252, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"16"}', '2015-04-16 14:42:30'),
	(2253, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"17"}', '2015-04-16 14:42:31'),
	(2254, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"18"}', '2015-04-16 14:42:31'),
	(2255, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"19"}', '2015-04-16 14:42:32'),
	(2256, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"20"}', '2015-04-16 14:42:32'),
	(2257, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"21"}', '2015-04-16 14:42:33'),
	(2258, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"22"}', '2015-04-16 14:42:33'),
	(2259, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"23"}', '2015-04-16 14:42:34'),
	(2260, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"24"}', '2015-04-16 14:42:34'),
	(2261, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"25"}', '2015-04-16 14:42:35'),
	(2262, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"26"}', '2015-04-16 14:42:35'),
	(2263, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"27"}', '2015-04-16 14:42:36'),
	(2264, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"28"}', '2015-04-16 14:42:36'),
	(2265, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"29"}', '2015-04-16 14:42:37'),
	(2266, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"30"}', '2015-04-16 14:42:37'),
	(2267, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"31"}', '2015-04-16 14:42:38'),
	(2268, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"32"}', '2015-04-16 14:42:38'),
	(2269, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"33"}', '2015-04-16 14:42:39'),
	(2270, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"34"}', '2015-04-16 14:42:39'),
	(2271, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"35"}', '2015-04-16 14:42:40'),
	(2272, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"36"}', '2015-04-16 14:42:40'),
	(2273, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"37"}', '2015-04-16 14:42:41'),
	(2274, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"38"}', '2015-04-16 14:42:41'),
	(2275, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"39"}', '2015-04-16 14:42:42'),
	(2276, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"41"}', '2015-04-16 14:42:42'),
	(2277, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"42"}', '2015-04-16 14:42:43'),
	(2278, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"43"}', '2015-04-16 14:42:44'),
	(2279, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"44"}', '2015-04-16 14:42:44'),
	(2280, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"45"}', '2015-04-16 14:42:45'),
	(2281, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"46"}', '2015-04-16 14:42:45'),
	(2282, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"47"}', '2015-04-16 14:42:46'),
	(2283, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"48"}', '2015-04-16 14:42:46'),
	(2284, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"49"}', '2015-04-16 14:42:47'),
	(2285, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"50"}', '2015-04-16 14:42:47'),
	(2286, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"51"}', '2015-04-16 14:42:48'),
	(2287, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"52"}', '2015-04-16 14:42:48'),
	(2288, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"53"}', '2015-04-16 14:42:49'),
	(2289, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"54"}', '2015-04-16 14:42:49'),
	(2290, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"55"}', '2015-04-16 14:42:50'),
	(2291, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"56"}', '2015-04-16 14:42:50'),
	(2292, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"57"}', '2015-04-16 14:42:51'),
	(2293, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"1","MODULES_ID":"58"}', '2015-04-16 14:42:51'),
	(2294, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":38,"ROLE_ID":"1"}', '2015-04-16 14:42:52'),
	(2295, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":39,"ROLE_ID":"1"}', '2015-04-16 14:42:52'),
	(2296, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":41,"ROLE_ID":"1"}', '2015-04-16 14:42:53'),
	(2297, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":42,"ROLE_ID":"1"}', '2015-04-16 14:42:53'),
	(2298, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":43,"ROLE_ID":"1"}', '2015-04-16 14:42:54'),
	(2299, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":44,"ROLE_ID":"1"}', '2015-04-16 14:42:54'),
	(2300, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":45,"ROLE_ID":"1"}', '2015-04-16 14:42:55'),
	(2301, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":46,"ROLE_ID":"1"}', '2015-04-16 14:42:55'),
	(2302, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":47,"ROLE_ID":"1"}', '2015-04-16 14:42:56'),
	(2303, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":48,"ROLE_ID":"1"}', '2015-04-16 14:42:56'),
	(2304, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":49,"ROLE_ID":"1"}', '2015-04-16 14:42:57'),
	(2305, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":50,"ROLE_ID":"1"}', '2015-04-16 14:42:57'),
	(2306, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":51,"ROLE_ID":"1"}', '2015-04-16 14:42:58'),
	(2307, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":53,"ROLE_ID":"1"}', '2015-04-16 14:42:58'),
	(2308, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":54,"ROLE_ID":"1"}', '2015-04-16 14:42:59'),
	(2309, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":55,"ROLE_ID":"1"}', '2015-04-16 14:42:59'),
	(2310, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":56,"ROLE_ID":"1"}', '2015-04-16 14:43:00'),
	(2311, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":57,"ROLE_ID":"1"}', '2015-04-16 14:43:00'),
	(2312, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":58,"ROLE_ID":"1"}', '2015-04-16 14:43:01'),
	(2313, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"1"}', '2015-04-17 10:18:04'),
	(2314, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"2"}', '2015-04-17 10:18:04'),
	(2315, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"3"}', '2015-04-17 10:18:05'),
	(2316, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"4"}', '2015-04-17 10:18:05'),
	(2317, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"5"}', '2015-04-17 10:18:06'),
	(2318, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"6"}', '2015-04-17 10:18:06'),
	(2319, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"7"}', '2015-04-17 10:18:07'),
	(2320, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"8"}', '2015-04-17 10:18:07'),
	(2321, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"9"}', '2015-04-17 10:18:08'),
	(2322, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"10"}', '2015-04-17 10:18:08'),
	(2323, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"11"}', '2015-04-17 10:18:09'),
	(2324, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"12"}', '2015-04-17 10:18:09'),
	(2325, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"13"}', '2015-04-17 10:18:10'),
	(2326, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"14"}', '2015-04-17 10:18:10'),
	(2327, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"15"}', '2015-04-17 10:18:11'),
	(2328, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"16"}', '2015-04-17 10:18:11'),
	(2329, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"17"}', '2015-04-17 10:18:12'),
	(2330, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"18"}', '2015-04-17 10:18:12'),
	(2331, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"19"}', '2015-04-17 10:18:13'),
	(2332, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"20"}', '2015-04-17 10:18:13'),
	(2333, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"21"}', '2015-04-17 10:18:14'),
	(2334, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"22"}', '2015-04-17 10:18:14'),
	(2335, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"23"}', '2015-04-17 10:18:15'),
	(2336, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"24"}', '2015-04-17 10:18:15'),
	(2337, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"25"}', '2015-04-17 10:18:16'),
	(2338, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"26"}', '2015-04-17 10:18:16'),
	(2339, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"27"}', '2015-04-17 10:18:17'),
	(2340, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"28"}', '2015-04-17 10:18:18'),
	(2341, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"29"}', '2015-04-17 10:18:18'),
	(2342, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"30"}', '2015-04-17 10:18:19'),
	(2343, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"31"}', '2015-04-17 10:18:20'),
	(2344, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"32"}', '2015-04-17 10:18:21'),
	(2345, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"33"}', '2015-04-17 10:18:21'),
	(2346, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"34"}', '2015-04-17 10:18:22'),
	(2347, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"35"}', '2015-04-17 10:18:22'),
	(2348, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"36"}', '2015-04-17 10:18:23'),
	(2349, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"37"}', '2015-04-17 10:18:24'),
	(2350, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"38"}', '2015-04-17 10:18:24'),
	(2351, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"39"}', '2015-04-17 10:18:25'),
	(2352, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"41"}', '2015-04-17 10:18:25'),
	(2353, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"42"}', '2015-04-17 10:18:26'),
	(2354, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"43"}', '2015-04-17 10:18:26'),
	(2355, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"44"}', '2015-04-17 10:18:27'),
	(2356, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"45"}', '2015-04-17 10:18:27'),
	(2357, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"46"}', '2015-04-17 10:18:28'),
	(2358, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"47"}', '2015-04-17 10:18:28'),
	(2359, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"48"}', '2015-04-17 10:18:29'),
	(2360, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"49"}', '2015-04-17 10:18:29'),
	(2361, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"50"}', '2015-04-17 10:18:30'),
	(2362, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"51"}', '2015-04-17 10:18:30'),
	(2363, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"52"}', '2015-04-17 10:18:31'),
	(2364, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"53"}', '2015-04-17 10:18:31'),
	(2365, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"54"}', '2015-04-17 10:18:32'),
	(2366, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"55"}', '2015-04-17 10:18:32'),
	(2367, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"56"}', '2015-04-17 10:18:33'),
	(2368, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"57"}', '2015-04-17 10:18:33'),
	(2369, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"58"}', '2015-04-17 10:18:34'),
	(2370, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"59"}', '2015-04-17 10:18:34'),
	(2371, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"60"}', '2015-04-17 10:18:35'),
	(2372, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"61"}', '2015-04-17 10:18:35'),
	(2373, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"62"}', '2015-04-17 10:18:36'),
	(2374, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"63"}', '2015-04-17 10:18:36'),
	(2375, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":-1}', '{"ROLE_ID":"10","MODULES_ID":"64"}', '2015-04-17 10:18:37'),
	(2376, 'Administrator', 'administrator', 'user-management/role/mapModulePermission', 'update', 'hak_akses', '{"TIPE_ID":0}', '{"MODULES_ID":58,"ROLE_ID":"10"}', '2015-04-17 10:18:37'),
	(2377, 'Administrator', 'administrator', 'p-material/lpb/newLPB', 'insert', 'penerimaan_barang', '{"LPB_SURAT_JALAN":"SJ\\/1023","LPB_KENDARAAN":"L 102 N","STATUS_LPB_ID":1,"PETUGAS_ID":null}', '{"id":15}', '2015-04-20 16:38:04'),
	(2378, 'Administrator', 'administrator', 'p-material/lpb/newLPB', 'insert', 'detail_lpb', '{"PENERIMAAN_BARANG_ID":15,"BARANG_ID":"96","VOLUME_LPB":"80","PO_ID":"14"}', '{"id":0}', '2015-04-20 16:38:05'),
	(2379, 'Administrator', 'administrator', 'p-material/lpb/newLPB', 'insert', 'detail_lpb', '{"PENERIMAAN_BARANG_ID":15,"BARANG_ID":"117","VOLUME_LPB":"2","PO_ID":"14"}', '{"id":0}', '2015-04-20 16:38:06'),
	(2380, 'Administrator', 'administrator', 'p-material/lpb/newLPB', 'insert', 'penerimaan_barang', '{"LPB_SURAT_JALAN":"SJ\\/1023","LPB_KENDARAAN":"L 102 N","STATUS_LPB_ID":1,"PETUGAS_ID":null}', '{"id":16}', '2015-04-20 16:59:48'),
	(2381, 'Administrator', 'administrator', 'p-material/lpb/newLPB', 'insert', 'detail_lpb', '{"PENERIMAAN_BARANG_ID":16,"BARANG_ID":"117","VOLUME_LPB":"2","PO_ID":"14"}', '{"id":0}', '2015-04-20 16:59:49'),
	(2382, 'Administrator', 'administrator', 'p-material/lpb/newLPB', 'insert', 'penerimaan_barang', '{"LPB_SURAT_JALAN":"SJ\\/102345","LPB_KENDARAAN":"L 1023 NB","STATUS_LPB_ID":1,"PETUGAS_ID":null}', '{"id":17}', '2015-04-20 17:08:20'),
	(2383, 'Administrator', 'administrator', 'p-material/lpb/newLPB', 'insert', 'detail_lpb', '{"PENERIMAAN_BARANG_ID":17,"BARANG_ID":"96","VOLUME_LPB":"80","PO_ID":"14"}', '{"id":0}', '2015-04-20 17:08:22'),
	(2384, 'Administrator', 'administrator', 'p-material/lpb/newLPB', 'insert', 'detail_lpb', '{"PENERIMAAN_BARANG_ID":17,"BARANG_ID":"117","VOLUME_LPB":"2","PO_ID":"14"}', '{"id":0}', '2015-04-20 17:08:23'),
	(2385, 'Administrator', 'administrator', 'user-management/role/addRole', 'insert', 'penggunaxroles', '{"PENGGUNA_ID":"3","ROLE_ID":"1"}', '{"id":0}', '2015-04-22 21:40:24'),
	(2386, 'Administrator', 'administrator', 'user-management/role/addRole', 'insert', 'penggunaxroles', '{"PENGGUNA_ID":"4","ROLE_ID":"1"}', '{"id":0}', '2015-04-22 21:58:44'),
	(2387, 'Administrator', 'administrator', 'rab/rabs/validasi', 'update', 'rab_transaction', '{"RAB_STATUS_APPROVAL_ID":null}', '{"RAB_ID":"1"}', '2015-04-22 22:02:47'),
	(2388, 'Administrator', 'administrator', 'rab/rabs/validasi', 'update', 'rab_transaction', '{"RAB_STATUS_APPROVAL_ID":"3"}', '{"RAB_ID":"1"}', '2015-04-22 22:05:53'),
	(2389, 'Ardiansyah Baskara', 'ade', 'rab/rabs/validasi', 'update', 'rab_transaction', '{"RAB_STATUS_APPROVAL_ID":"4"}', '{"RAB_ID":"2"}', '2015-04-22 22:18:52');
/*!40000 ALTER TABLE `log_activity` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.lokasi_upah
CREATE TABLE IF NOT EXISTS `lokasi_upah` (
  `LOKASI_UPAH_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LOKASI_UPAH_NAMA` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`LOKASI_UPAH_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.lokasi_upah: ~2 rows (approximately)
DELETE FROM `lokasi_upah`;
/*!40000 ALTER TABLE `lokasi_upah` DISABLE KEYS */;
INSERT INTO `lokasi_upah` (`LOKASI_UPAH_ID`, `LOKASI_UPAH_NAMA`) VALUES
	(1, 'SURABAYA'),
	(2, 'JAKARTA');
/*!40000 ALTER TABLE `lokasi_upah` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.main_project
CREATE TABLE IF NOT EXISTS `main_project` (
  `MAIN_PROJECT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MAIN_PROJECT_NAMA` varchar(100) DEFAULT NULL,
  `MAIN_PROJECT_KODE` varchar(100) DEFAULT NULL,
  `MAIN_PROJECT_DESCRIPTION` text,
  `MAIN_PROJECT_ACTIVE` int(11) DEFAULT NULL,
  `PERUSAHAAN_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`MAIN_PROJECT_ID`),
  KEY `FK_perusahaan_id` (`PERUSAHAAN_ID`),
  CONSTRAINT `FK_perusahaan_id` FOREIGN KEY (`PERUSAHAAN_ID`) REFERENCES `perusahaan` (`PERUSAHAAN_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.main_project: ~2 rows (approximately)
DELETE FROM `main_project`;
/*!40000 ALTER TABLE `main_project` DISABLE KEYS */;
INSERT INTO `main_project` (`MAIN_PROJECT_ID`, `MAIN_PROJECT_NAMA`, `MAIN_PROJECT_KODE`, `MAIN_PROJECT_DESCRIPTION`, `MAIN_PROJECT_ACTIVE`, `PERUSAHAAN_ID`) VALUES
	(1, 'THEME PARK WARU', 'MPRO00001', 'Pembangunan taman wisata', 1, 3),
	(2, 'PEMBANGUNAN KANTOR', 'MPRO00002', '', 1, 3);
/*!40000 ALTER TABLE `main_project` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.master_analisa
CREATE TABLE IF NOT EXISTS `master_analisa` (
  `ANALISA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ANALISA_NAMA` varchar(1000) DEFAULT NULL,
  `SATUAN_NAMA` varchar(100) DEFAULT NULL,
  `KATEGORI_ANALISA_ID` int(11) DEFAULT NULL,
  `LOKASI_UPAH_ID` int(11) DEFAULT NULL,
  `ANALISA_KODE` varchar(100) DEFAULT NULL,
  `ANALISA_ACTIVE` int(11) DEFAULT '1',
  PRIMARY KEY (`ANALISA_ID`),
  KEY `FK_RELATIONSHIP_21` (`SATUAN_NAMA`),
  KEY `FK_KATEG_ANALISIS` (`KATEGORI_ANALISA_ID`),
  KEY `FK_master_analisa_lokasi` (`LOKASI_UPAH_ID`),
  CONSTRAINT `FK_kategori_analisis` FOREIGN KEY (`KATEGORI_ANALISA_ID`) REFERENCES `kategori_analisa` (`KATEGORI_ANALISA_ID`),
  CONSTRAINT `FK_master_analisa` FOREIGN KEY (`SATUAN_NAMA`) REFERENCES `satuan_barang` (`SATUAN_NAMA`),
  CONSTRAINT `FK_master_analisa_lokasi` FOREIGN KEY (`LOKASI_UPAH_ID`) REFERENCES `lokasi_upah` (`LOKASI_UPAH_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.master_analisa: ~26 rows (approximately)
DELETE FROM `master_analisa`;
/*!40000 ALTER TABLE `master_analisa` DISABLE KEYS */;
INSERT INTO `master_analisa` (`ANALISA_ID`, `ANALISA_NAMA`, `SATUAN_NAMA`, `KATEGORI_ANALISA_ID`, `LOKASI_UPAH_ID`, `ANALISA_KODE`, `ANALISA_ACTIVE`) VALUES
	(20, 'Pagar Sementara Dari Gedeg t. 2m', 'M', 2, 1, 'HSPK/PRSP-0001', 0),
	(21, 'Pagar Sementara Dari Gedeg t. 2m', 'M', 1, 1, 'HSPK/PRSP-0001', 1),
	(22, 'Pagar Dari Seng Gelombang t= 2 m', 'M', 2, 1, 'HSPK/PRSP-0002', 1),
	(23, 'Direksi Keet + Rabat 3x6m', 'M2', 2, 1, 'HSPK/PRSP-0003', 1),
	(24, 'Bouwplank', 'M', 2, 1, 'HSPK/PRSP-0004', 1),
	(25, 'Galian Tanah ', 'M3', 2, 1, 'HSPK/PEK.TNH-0001', 1),
	(26, 'Urugan Tanah  Kembali', 'M3', 2, 1, 'HSPK/PEK.TNH-0002', 1),
	(27, 'Urugan Sirtu + Pemadatan', 'M3', 2, 1, 'HSPK/PEK.TNH-0003', 1),
	(28, 'Urugan pasir', 'M3', 2, 1, 'HSPK/PEK.TNH-0004', 1),
	(29, 'Urugan Tanah  Perataan & Pemadatan', 'M3', 2, 1, 'HSPK/PEK.TNH-0005', 1),
	(30, 'Buang Tanah  Sementara', 'M3', 2, 1, 'HSPK/PEK.TNH-0006', 1),
	(31, 'Buang Tanah  Keluar Lokasi', 'M3', 2, 1, 'HSPK/PEK.TNH-0007', 1),
	(32, 'Buang Gragal  Keluar Lokasi', 'M3', 2, 1, 'HSPK/PEK.TNH-0008', 1),
	(33, '  Membuat Pondasi Batu Belah  1 : 6 ', 'M3', 2, 1, 'HSPK/PEK.PNDSI-0001', 1),
	(34, '  Membuat Pasangan  Batu Kosong (Aanstamping)', 'M3', 2, 1, 'HSPK/PEK.PNDSI-0002', 1),
	(35, 'Lantai kerja tb 5cm (site mix)', 'M2', 2, 1, 'HSPK/PEK.BTNSTR-0001', 1),
	(36, 'Lantai kerja  (site mix)', 'M2', 2, 1, 'HSPK/PEK.BTNSTR-0002', 0),
	(37, 'Lantai kerja  (site mix)', 'M2', 2, 1, 'HSPK/PEK.BTNSTR-0002', 0),
	(38, 'Lantai kerja  (site mix)', 'M3', 2, 1, 'HSPK/PEK.BTNSTR-0002', 0),
	(39, 'Lantai kerja  (site mix)', 'M3', 2, 1, 'HSPK/PEK.BTNSTR-0002', 1),
	(40, 'Membuat beton  1 Pc : 3 Ps : 5 Kr (site mix)', 'M3', 2, 1, 'HSPK/PEK.BTNSTR-0003', 1),
	(41, '  Membuat  Beton   1 : 2 : 3', 'M3', 2, 1, 'HSPK/PEK.BTNSTR-0004', 1),
	(42, 'Cor plat lantai 15 cm (Ready Mix) K-225', 'M3', 2, 1, 'HSPK/PEK.BTNSTR-0005', 1),
	(43, 'Pasangan bata merah 1 Pc : 6 ps', 'M2', 2, 1, 'HSPK/PEK.PSGN-0001', 1),
	(44, 'Plesteran dinding 1 pc : 6 ps tb. 1,5 cm', 'M2', 2, 1, 'HSPK/PEK.PSGN-0003', 1),
	(45, 'Analisa Coba', 'M3', 2, 1, 'HSPK/PEK.COBA-0004', 0);
/*!40000 ALTER TABLE `master_analisa` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.master_barang
CREATE TABLE IF NOT EXISTS `master_barang` (
  `BARANG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `KATEGORI_BARANG_ID` int(11) DEFAULT NULL,
  `SATUAN_NAMA` varchar(100) DEFAULT NULL,
  `BARANG_KODE` varchar(100) DEFAULT NULL,
  `BARANG_NAMA` varchar(1000) DEFAULT NULL,
  `BARANG_KETERANGAN` text,
  `BARANG_HARGA` varchar(100) DEFAULT NULL,
  `BARANG_HARGA_TEMP` varchar(100) DEFAULT NULL,
  `STATUS_VALIDASI_ID` int(11) DEFAULT NULL,
  `BARANG_ACTIVE` int(11) DEFAULT '1',
  `CREATED_BY_USER_ID` int(11) DEFAULT NULL,
  `VALIDATED_BY_USER_ID` int(11) DEFAULT NULL,
  `LAST_EDITED_BY_USER_ID` int(11) DEFAULT NULL,
  `CREATED_TIMESTAMP` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `VALIDATED_TIMESTAMP` timestamp NULL DEFAULT NULL,
  `LAST_EDITED_TIMESTAMP` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`BARANG_ID`),
  KEY `FK_RELATIONSHIP_19` (`KATEGORI_BARANG_ID`),
  KEY `FK_RELATIONSHIP_20` (`SATUAN_NAMA`)
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.master_barang: ~165 rows (approximately)
DELETE FROM `master_barang`;
/*!40000 ALTER TABLE `master_barang` DISABLE KEYS */;
INSERT INTO `master_barang` (`BARANG_ID`, `KATEGORI_BARANG_ID`, `SATUAN_NAMA`, `BARANG_KODE`, `BARANG_NAMA`, `BARANG_KETERANGAN`, `BARANG_HARGA`, `BARANG_HARGA_TEMP`, `STATUS_VALIDASI_ID`, `BARANG_ACTIVE`, `CREATED_BY_USER_ID`, `VALIDATED_BY_USER_ID`, `LAST_EDITED_BY_USER_ID`, `CREATED_TIMESTAMP`, `VALIDATED_TIMESTAMP`, `LAST_EDITED_TIMESTAMP`) VALUES
	(1, 1, 'M2', 'MAT000001', 'Alumunium Composite Panel', 'Ini adalah keterangan dari aluminium composite panel tes', '485000', '485000', 3, 1, 1, 1, 1, '2015-04-12 16:41:05', '2015-04-13 18:43:51', '2015-04-13 16:07:47'),
	(2, 1, 'M3', 'MAT000002', 'Balok kayu borneo 5/7', 'Ini adalah keterangan', '6400000', '6400000', 3, 1, 1, 1, 1, NULL, '2015-04-13 18:44:40', '2015-04-13 15:57:30'),
	(3, 1, 'Bh', 'MAT000003', 'Batako 10 X 20 X 40', 'Ini adalah keterangan', '3500', '3500', 3, 1, 1, 1, 1, NULL, '2015-04-14 05:17:06', '2015-04-14 05:10:42'),
	(4, 1, 'M3', 'MAT000004', 'Batu belah 15/20 cm', 'Ini adalah keterangan', '135000', '135000', 3, 1, 1, 7, 5, NULL, '2015-04-15 08:19:42', '2015-04-15 08:17:52'),
	(5, 1, 'Kg', 'MAT000005', 'Besi siku 50.50.5', 'Ini adalah keterangan', '7950', '7950', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(6, 1, 'Ls', 'MAT000006', 'Beton decking', 'Ini adalah keterangan', '10000', '10000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(7, 1, 'M3', 'MAT000007', 'Beton Readymix K - 225', 'Ini adalah keterangan', '667575', '667575', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(8, 1, 'M3', 'MAT000008', 'Beton Readymix K - 250', 'Ini adalah keterangan', '683596.8', '683596.8', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(9, 1, 'M3', 'MAT000009', 'Beton Readymix K - 300', 'Ini adalah keterangan', '704959.2', '704959.2', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(10, 1, 'M3', 'MAT000010', 'Beton Readymix K - 450', 'Ini adalah keterangan', '801090', '801090', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(11, 1, 'M3', 'MAT000011', 'Beton Readymix K - 500', 'Ini adalah keterangan', '835269.84', '835269.84', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(12, 1, 'M3', 'MAT000012', 'Beton Readymix K-350', 'Ini adalah keterangan', '726321.6', '726321.6', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(13, 1, 'M3', 'MAT000013', 'Beton Readymix K-400', 'Ini adalah keterangan', '769046.4', '769046.4', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(14, 1, 'M2', 'MAT000014', 'Coating', 'Ini adalah keterangan', '15000', '15000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(15, 1, 'M2', 'MAT000015', 'Form oil', 'Ini adalah keterangan', '4600', '4600', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(16, 1, 'Bh', 'MAT000016', 'Form tie', 'Ini adalah keterangan', '8050', '8050', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(17, 1, 'Set', 'MAT000017', 'Horry beam', 'Ini adalah keterangan', '14375', '14375', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(18, 1, 'Roll', 'MAT000018', 'Kawat berduri', 'Ini adalah keterangan', '57500', '57500', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(19, 1, 'M3', 'MAT000019', 'Kayu Meranti (usuk) 4/6', 'Ini adalah keterangan', '4350000', '4350000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(20, 1, 'M3', 'MAT000020', 'Kayu meranti bekisting', 'Ini adalah keterangan', '2530000', '2530000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(21, 1, 'Kg', 'MAT000021', 'Meni Besi', 'Ini adalah keterangan', '14250', '14250', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(22, 1, 'Lbr', 'MAT000022', 'Multipleks 12 mm', 'Ini adalah keterangan', '125000', '125000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(23, 1, 'Kg', 'MAT000023', 'Paku Biasa 2" - 5"', 'Ini adalah keterangan', '11000', '11000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(24, 1, 'Lbr', 'MAT000024', 'Panel beton', 'Ini adalah keterangan', '143000', '143000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(25, 1, 'M2', 'MAT000025', 'Paras Jogya', 'Ini adalah keterangan', '175000', '175000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(26, 1, 'M3', 'MAT000026', 'Pasir pasang', 'Ini adalah keterangan', '150000', '150000', 3, 1, 1, 7, 5, NULL, '2015-04-15 08:22:49', '2015-04-15 08:22:05'),
	(27, 1, 'M3', 'MAT000027', 'Pasir Urug', 'Ini adalah keterangan', '120000', '120000', 3, 1, 1, 7, 5, NULL, '2015-04-15 08:31:21', '2015-04-15 08:29:45'),
	(28, 1, 'Set', 'MAT000028', 'Pipe support', 'Ini adalah keterangan', '11500', '11500', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(29, 1, 'Set', 'MAT000029', 'Schafolding', 'Ini adalah keterangan', '30000', '30000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(30, 1, 'Sak', 'MAT000030', 'Semen PC (abu-abu) @ 40 Kg', 'Ini adalah keterangan', '105000', '105000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(31, 1, 'Lbr', 'MAT000031', 'Seng gelombang ', 'Ini adalah keterangan', '75000', '75000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(32, 1, 'Jam', 'MAT000032', 'Sewa Concrete Pump', 'Ini adalah keterangan', '431250', '431250', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(33, 1, 'Jam', 'MAT000033', 'Sewa vibrator', 'Ini adalah keterangan', '17250', '17250', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(34, 1, 'M3', 'MAT000034', 'Split (batu pecah)/Tenslah 1 / 2', 'Ini adalah keterangan', '190000', '190000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(35, 1, 'Btg', 'MAT000035', 'Tiang beton T = 2,5 m', 'Ini adalah keterangan', '222750', '222750', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(36, 1, 'Btg', 'MAT000036', 'Tiang beton T = 3,5 m', 'Ini adalah keterangan', '222750', '222750', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(37, 1, 'M2', 'MAT000037', 'Atap zincalume', 'Ini adalah keterangan', '50000', '50000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(38, 1, 'Bh', 'MAT000038', 'Bata merah 5 x 11 x 22 cm', 'Ini adalah keterangan', '450', '450', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(39, 1, 'Bh', 'MAT000039', 'Baut sambungan', 'Ini adalah keterangan', '4250', '4250', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(40, 1, 'Kg', 'MAT000040', 'Besi  ? 6 mm', 'Ini adalah keterangan', '7950', '7950', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(41, 1, 'Kg', 'MAT000041', 'Besi  ? 8 mm', 'Ini adalah keterangan', '7950', '7950', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(42, 1, 'Kg', 'MAT000042', 'Besi  ? 10 mm', 'Ini adalah keterangan', '7950', '7950', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(43, 1, 'Kg', 'MAT000043', 'Besi  ? 12 mm', 'Ini adalah keterangan', '7950', '7950', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(44, 1, 'Kg', 'MAT000044', 'Besi  ? D13 mm', 'Ini adalah keterangan', '7950', '7950', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(45, 1, 'Kg', 'MAT000045', 'Besi  ? D16 mm', 'Ini adalah keterangan', '7950', '7950', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(46, 1, 'Kg', 'MAT000046', 'Besi  ? D19 mm', 'Ini adalah keterangan', '7950', '7950', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(47, 1, 'Kg', 'MAT000047', 'Besi  ? D22 mm', 'Ini adalah keterangan', '7950', '7950', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(48, 1, 'Ljr', 'MAT000048', 'Besi siku lubang @3m (ekstra 2 plat + 6 baut mur)', 'Ini adalah keterangan', '72000', '72000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(49, 1, 'Ljr', 'MAT000049', 'Besi siku lubang @4m (ekstra 2 plat + 6 baut mur)', 'Ini adalah keterangan', '96000', '96000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(50, 1, 'M\'', 'MAT000050', 'buis beton 30 cm', 'Ini adalah keterangan', '36500', '36500', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(51, 1, 'Kg', 'MAT000051', 'Casting', 'Ini adalah keterangan', '2000', '2000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(52, 1, 'Kg', 'MAT000052', 'Cat', 'Ini adalah keterangan', '1075', '1075', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(53, 1, 'Kg', 'MAT000053', 'Cat besi', 'Ini adalah keterangan', '40000', '40000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(54, 1, 'Kg', 'MAT000054', 'Cat dinding Eksterior Ex. Dulux Weathershield', 'Ini adalah keterangan', '86000', '86000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(55, 1, 'Kg', 'MAT000055', 'Cat dinding Interior Ex. Catylac / Setara', 'Ini adalah keterangan', '25000', '25000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(56, 1, 'Kg', 'MAT000056', 'Cat dinding Interior Ex. Movylac / Setara', 'Ini adalah keterangan', '40000', '40000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(57, 1, 'Kg', 'MAT000057', 'Cat meni', 'Ini adalah keterangan', '20000', '20000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(58, 1, 'Kg', 'MAT000058', 'CNP 125.50.20.2,3', 'Ini adalah keterangan', '6500', '6500', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(59, 1, 'Bh', 'MAT000059', 'Drilling', 'Ini adalah keterangan', '300', '300', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(60, 1, 'Bh', 'MAT000060', 'Drilling screw', 'Ini adalah keterangan', '350', '350', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(61, 1, 'Bh', 'MAT000061', 'Engsel', 'Ini adalah keterangan', '51750', '51750', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(62, 1, 'M2', 'MAT000062', 'Floor hardenner ex. Sika 3 Kg/M2 natural color', 'Ini adalah keterangan', '9000', '9000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(63, 1, 'Lbr', 'MAT000063', 'Gedek uk. 1,8 x 3 mtr', 'Ini adalah keterangan', '67500', '67500', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(64, 1, 'Kg', 'MAT000064', 'Gording CNP 125', 'Ini adalah keterangan', '6500', '6500', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(65, 1, 'M2', 'MAT000065', 'Granite Tile  60 x 60 Cm', 'Ini adalah keterangan', '186978.5', '186978.5', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(66, 1, 'M2', 'MAT000066', 'GRC 20x40 cm', 'Ini adalah keterangan', '55000', '55000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(67, 1, 'Lbr', 'MAT000067', 'GRC Clad 10mm 1,2 x 2,4 m', 'Ini adalah keterangan', '163500', '163500', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(68, 1, 'Bh', 'MAT000068', 'Grendel', 'Ini adalah keterangan', '15000', '15000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(69, 1, 'Lbr', 'MAT000069', 'Gypsum board 1,2 x 2,4', 'Ini adalah keterangan', '54000', '54000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(70, 1, 'Ljr', 'MAT000070', 'Hollow 2x4', 'Ini adalah keterangan', '18500', '18500', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(71, 1, 'Ljr', 'MAT000071', 'Hollow 4x4', 'Ini adalah keterangan', '24000', '24000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(72, 1, 'M2', 'MAT000072', 'Kaca polos tb. 5mm', 'Ini adalah keterangan', '70000', '70000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(73, 1, 'M2', 'MAT000073', 'Kaca Polos Tebal 5 mm', 'Ini adalah keterangan', '85000', '85000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(74, 1, 'Kg', 'MAT000074', 'Kalsium', 'Ini adalah keterangan', '1050', '1050', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(75, 1, 'Bh', 'MAT000075', 'Kansteen 8x40x20 ', 'Ini adalah keterangan', '23600', '23600', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(76, 1, 'Kg', 'MAT000076', 'kawat  bendrat', 'Ini adalah keterangan', '15000', '15000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(77, 1, 'Btg', 'MAT000077', 'Kayu  5/7 (randu/sengon) (asms. 1.5x pakai)', 'Ini adalah keterangan', '19250', '19250', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(78, 1, 'Btg', 'MAT000078', 'Kayu gelam', 'Ini adalah keterangan', '10000', '10000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(79, 1, 'M2', 'MAT000079', 'keramik 20 x 20 Cm', 'Ini adalah keterangan', '71507', '71507', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(80, 1, 'M2', 'MAT000080', 'keramik 30 x 30 Cm', 'Ini adalah keterangan', '81661.5', '81661.5', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(81, 1, 'M2', 'MAT000081', 'keramik 40 x 40 Cm', 'Ini adalah keterangan', '93910.725', '93910.725', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(82, 1, 'M2', 'MAT000082', 'keramik 50 x 50 Cm', 'Ini adalah keterangan', '117388.4063', '117388.4063', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(83, 1, 'M2', 'MAT000083', 'keramik 60 x 60 Cm', 'Ini adalah keterangan', '134996.6672', '134996.6672', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(84, 1, 'M2', 'MAT000084', 'Keramik dinding 20 x 25 Cm', 'Ini adalah keterangan', '72921.5', '72921.5', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(85, 1, 'Lbr', 'MAT000085', 'Kertas gosok', 'Ini adalah keterangan', '3000', '3000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(86, 1, 'Daun', 'MAT000086', 'Krepyak Nako', 'Ini adalah keterangan', '15000', '15000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(87, 1, 'Bh', 'MAT000087', 'Kuas / Roll', 'Ini adalah keterangan', '10000', '10000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(88, 1, 'Bh', 'MAT000088', 'Kuas 3 "', 'Ini adalah keterangan', '10000', '10000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(89, 1, 'Bh', 'MAT000089', 'Kuas 3 "', 'Ini adalah keterangan', '10000', '10000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(90, 1, 'Bks', 'MAT000090', 'Lem Rajawali', 'Ini adalah keterangan', '9187.5', '9187.5', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(91, 1, 'Lbr', 'MAT000091', 'Multipleks 9 mm', 'Ini adalah keterangan', '100000', '100000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(92, 1, 'Bh', 'MAT000092', 'mur trekstang', 'Ini adalah keterangan', '510', '510', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(93, 1, 'Kg', 'MAT000093', 'Paku biasa 2" - 5"', 'Ini adalah keterangan', '11000', '11000', 3, 0, 1, 1, NULL, NULL, NULL, NULL),
	(94, 1, 'Kg', 'MAT000094', 'Paku payung', 'Ini adalah keterangan', '1150', '1150', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(95, 1, 'Lbr', 'MAT000095', 'Papan randu/sengon 2/20 (asms. 1,5 x pakai)', 'Ini adalah keterangan', '26000', '26000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(96, 1, 'Buah', 'MAT000096', 'Bata merah', 'Ini adalah keterangan', '700', '700', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(97, 1, 'M3', 'MAT000097', 'Pasir Beton', 'Ini adalah keterangan', '115000', '115000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(98, 1, 'M3', 'MAT000098', 'Pasir pasang', 'Ini adalah keterangan', '135000', '135000', 3, 0, 1, 1, NULL, NULL, NULL, NULL),
	(99, 1, 'M3', 'MAT000099', 'Pasir urug', 'Ini adalah keterangan', '105000', '105000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(100, 1, 'Bh', 'MAT000100', 'Paving Abu-abu tb. 8 cm', 'Ini adalah keterangan', '1442', '1442', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(101, 1, 'Ljr', 'MAT000101', 'Pipa Kotak 2x4', 'Ini adalah keterangan', '135000', '135000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(102, 1, 'Ljr', 'MAT000102', 'Pipa Kotak 3x6', 'Ini adalah keterangan', '215000', '215000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(103, 1, 'M2', 'MAT000103', 'Plastic sheet', 'Ini adalah keterangan', '1800', '1800', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(104, 1, 'Kg', 'MAT000104', 'Plat MS t=6mm', 'Ini adalah keterangan', '9500', '9500', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(105, 1, 'Kg', 'MAT000105', 'Plat Strip 50.5 - 10', 'Ini adalah keterangan', '7500', '7500', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(106, 1, 'M\'', 'MAT000106', 'Plester gypsum', 'Ini adalah keterangan', '2750', '2750', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(107, 1, 'Lbr', 'MAT000107', 'Plywood tebal 9 mm, 6 mm  (asms. 2.5x pakai)', 'Ini adalah keterangan', '120000', '120000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(108, 1, 'M\'', 'MAT000108', 'pvc 1 1/4" D', 'Ini adalah keterangan', '5750', '5750', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(109, 1, 'M\'', 'MAT000109', 'pvc 3" D', 'Ini adalah keterangan', '13125', '13125', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(110, 1, 'M\'', 'MAT000110', 'pvc 3/4" aw', 'Ini adalah keterangan', '4250', '4250', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(111, 1, 'M\'', 'MAT000111', 'pvc 4" D', 'Ini adalah keterangan', '20750', '20750', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(112, 1, 'M\'', 'MAT000112', 'pvc galvanis 3/4"', 'Ini adalah keterangan', '25000', '25000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(113, 1, 'Ljr', 'MAT000113', 'Rangka metal furing', 'Ini adalah keterangan', '30000', '30000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(114, 1, 'M\'', 'MAT000114', 'Sealant', 'Ini adalah keterangan', '5000', '5000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(115, 1, 'Bh', 'MAT000115', 'Sekrup', 'Ini adalah keterangan', '300', '300', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(116, 1, 'Bh', 'MAT000116', 'Sekrup gypsum', 'Ini adalah keterangan', '300', '300', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(117, 1, 'Sak', 'MAT000117', 'Semen portland 40Kg', 'Ini adalah keterangan', '65000', '65000', 3, 1, 1, 5, 5, NULL, '2015-04-14 17:20:15', '2015-04-14 17:04:33'),
	(118, 1, 'Kg', 'MAT000118', 'Semen Putih', 'Ini adalah keterangan', '1875', '1875', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(119, 1, 'Kg', 'MAT000119', 'Semen warna', 'Ini adalah keterangan', '1890', '1890', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(120, 1, 'Lbr', 'MAT000120', 'Seng gelombang', 'Ini adalah keterangan', '75000', '75000', 3, 0, 1, 1, NULL, NULL, NULL, NULL),
	(121, 1, 'Kg', 'MAT000121', 'Siku 60.60.6', 'Ini adalah keterangan', '8300', '8300', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(122, 1, 'M3', 'MAT000122', 'Sirtu ayak', 'Ini adalah keterangan', '90000', '90000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(123, 1, 'M3', 'MAT000123', 'Sirtu urug', 'Ini adalah keterangan', '90000', '90000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(124, 1, 'Buah', 'MAT000124', 'Skrup', 'Ini adalah keterangan', '1000', '1000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(125, 1, 'M3', 'MAT000125', 'Tensla 1/2', 'Ini adalah keterangan', '190000', '190000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(126, 1, 'Kg', 'MAT000126', 'Thiner', 'Ini adalah keterangan', '11833.33333', '11833.33333', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(127, 1, 'Bh', 'MAT000127', 'Topi uskup tb. 8 cm', 'Ini adalah keterangan', '2583.333333', '2583.333333', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(128, 1, 'Lbr', 'MAT000128', 'Triplek 6 mm', 'Ini adalah keterangan', '85000', '85000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(129, 1, 'M2', 'MAT000129', 'Wiremesh M-5', 'Ini adalah keterangan', '19841.26984', '19841.26984', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(130, 1, 'M2', 'MAT000130', 'zincalume 0,35mm ex. Bluescope', 'Ini adalah keterangan', '86500', '86500', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(131, 1, 'Kg', 'MAT000131', 'Kolom WF 150,75,5,7 mm', 'Ini adalah keterangan', '9500', '9500', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(132, 1, 'Kg', 'MAT000132', 'Rafter WF 150,75,5,7 mm', 'Ini adalah keterangan', '9500', '9500', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(133, 1, 'Kg', 'MAT000133', 'Stiffener  WF untuk Sambungan  Plat Simpul (Kolom & Rafter)', 'Ini adalah keterangan', '9500', '9500', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(134, 1, 'Kg', 'MAT000134', 'Konsul (Potongan WF 150,75,5,7 mm)', 'Ini adalah keterangan', '9500', '9500', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(135, 1, 'Kg', 'MAT000135', 'Konsul Talang Air ( WF 150,75,5,7 mm)', 'Ini adalah keterangan', '9500', '9500', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(136, 1, 'Kg', 'MAT000136', 'Gording CNP 100,50,20,2.3', 'Ini adalah keterangan', '6500', '6500', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(137, 1, 'Kg', 'MAT000137', 'Gording Konsul CNP 100,50,20,2.3', 'Ini adalah keterangan', '6500', '6500', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(138, 1, 'Kg', 'MAT000138', 'Plat Tapak  / Base Plate MS - 9 mm', 'Ini adalah keterangan', '9500', '9500', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(139, 1, 'Kg', 'MAT000139', 'Plat simpul / rib  MS - 9 mm utk (Konsul,Kolom & Rafter)', 'Ini adalah keterangan', '9500', '9500', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(140, 1, 'Kg', 'MAT000140', 'Plat gording & Regel  MS - 6 mm ', 'Ini adalah keterangan', '9500', '9500', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(141, 1, 'Kg', 'MAT000141', 'Regel Double CNP  100,50,20,2.3', 'Ini adalah keterangan', '6500', '6500', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(142, 1, 'Kg', 'MAT000142', 'Regel  Gigi Anjing  ? 10 mm ', 'Ini adalah keterangan', '7950', '7950', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(143, 1, 'Kg', 'MAT000143', 'Trekstang ? 10 mm ', 'Ini adalah keterangan', '7950', '7950', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(144, 1, 'Kg', 'MAT000144', 'Ikatan angin ? 16 mm', 'Ini adalah keterangan', '7950', '7950', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(145, 1, 'Bh', 'MAT000145', 'Jarum pengeras 5/8"', 'Ini adalah keterangan', '24150', '24150', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(146, 1, 'Bh', 'MAT000146', 'Angker Baut  ? 3/4" - 70 cm', 'Ini adalah keterangan', '32600', '32600', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(147, 1, 'Bh', 'MAT000147', 'Baut mur (sambungan) ?3/4" x 2"', 'Ini adalah keterangan', '5925', '5925', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(148, 1, 'Bh', 'MAT000148', 'Baut + Mur trekstang ? 3/8 - 1 "', 'Ini adalah keterangan', '510', '510', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(149, 1, 'Bh', 'MAT000149', 'Baut + Mur gording ? 1/2 - 1 1/2 "', 'Ini adalah keterangan', '1015', '1015', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(150, 1, 'M2', 'MAT000150', 'Pintu Gudang Plat Besi  uk (4.5 x 6.5 )m (By Sub Kont)include rel pintu', 'Ini adalah keterangan', '600000', '600000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(151, 1, 'M2', 'MAT000151', 'Atap Zincalumn 0,35 mm, Ex. Utomo deck ', 'Ini adalah keterangan', '57000', '57000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(152, 1, 'M', 'MAT000152', 'Nok Galvalumn 0,35 mm, Lebar 90 cm', 'Ini adalah keterangan', '24500', '24500', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(153, 1, 'Bh', 'MAT000153', 'Drilling screw', 'Ini adalah keterangan', '350', '350', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(154, 1, 'Doz', 'MAT000154', 'Paku Riffet', 'Ini adalah keterangan', '654000', '654000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(155, 1, 'Bh', 'MAT000155', 'Dynabolt M -16', 'Ini adalah keterangan', '2250', '2250', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(156, 1, 'M', 'MAT000156', 'Talang datar Galvalumn 0,4 mm x 900 mm', 'Ini adalah keterangan', '38000', '38000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(157, 1, 'Kg', 'MAT000157', 'Beugel talang + talang tegak  plat strip 5 mm x 30 mm', 'Ini adalah keterangan', '11500', '11500', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(158, 1, 'M', 'MAT000158', 'Flashing galvalum 0.35 mm x 450mm', 'Ini adalah keterangan', '53000', '53000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(159, 1, 'Bh', 'MAT000159', 'Jorongan talang', 'Ini adalah keterangan', '20000', '20000', 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(160, 1, 'Ball', 'MAT000160', 'COBA BARANG', '', NULL, NULL, 3, 0, 1, 1, NULL, NULL, NULL, NULL),
	(161, 1, 'Ball', 'MAT000161', 'MATERIAL 1 COBA', '', NULL, NULL, 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(162, 1, 'M3', 'MAT000162', 'Cor K-225 Ready mix t.10 cm', '', NULL, NULL, 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(163, 1, 'Kg', 'MAT000163', 'Besi 10-150', '', NULL, NULL, 3, 1, 1, 1, NULL, NULL, NULL, NULL),
	(164, 1, 'M3', 'MAT000164', 'Tes', 'Ini keterangan barang tes', '20000', '20000', 3, 1, 1, 1, NULL, '2015-04-13 14:52:48', NULL, NULL);
/*!40000 ALTER TABLE `master_barang` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.master_gudang
CREATE TABLE IF NOT EXISTS `master_gudang` (
  `GUDANG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `GUDANG_KODE` varchar(100) DEFAULT NULL,
  `GUDANG_NAMA` varchar(100) DEFAULT NULL,
  `GUDANG_LOKASI` text,
  `GUDANG_DESCRIPTION` text,
  `GUDANG_ACTIVE` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`GUDANG_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.master_gudang: ~1 rows (approximately)
DELETE FROM `master_gudang`;
/*!40000 ALTER TABLE `master_gudang` DISABLE KEYS */;
INSERT INTO `master_gudang` (`GUDANG_ID`, `GUDANG_KODE`, `GUDANG_NAMA`, `GUDANG_LOKASI`, `GUDANG_DESCRIPTION`, `GUDANG_ACTIVE`) VALUES
	(13, 'GUD00013', 'GUDANG STE', 'SURABAYA', NULL, 1);
/*!40000 ALTER TABLE `master_gudang` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.master_supplier
CREATE TABLE IF NOT EXISTS `master_supplier` (
  `SUPPLIER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `KATEGORI_SUPPLIER_ID` int(11) DEFAULT NULL,
  `SUPPLIER_KODE` varchar(100) DEFAULT NULL,
  `SUPPLIER_NAMA` varchar(150) DEFAULT NULL,
  `SUPPLIER_ALAMAT` text,
  `SUPPLIER_DESKRIPSI` text,
  `SUPPLIER_ACTIVE` int(11) DEFAULT '1',
  `TOP_KODE` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`SUPPLIER_ID`),
  KEY `FK_RELATIONSHIP_43` (`KATEGORI_SUPPLIER_ID`),
  CONSTRAINT `FK_RELATIONSHIP_43` FOREIGN KEY (`KATEGORI_SUPPLIER_ID`) REFERENCES `kategori_supplier` (`KATEGORI_SUPPLIER_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.master_supplier: ~1 rows (approximately)
DELETE FROM `master_supplier`;
/*!40000 ALTER TABLE `master_supplier` DISABLE KEYS */;
INSERT INTO `master_supplier` (`SUPPLIER_ID`, `KATEGORI_SUPPLIER_ID`, `SUPPLIER_KODE`, `SUPPLIER_NAMA`, `SUPPLIER_ALAMAT`, `SUPPLIER_DESKRIPSI`, `SUPPLIER_ACTIVE`, `TOP_KODE`) VALUES
	(5, 3, 'SUP00005', 'PT BANGUNAN JAYA', 'SURABAYA', '', 1, '7D');
/*!40000 ALTER TABLE `master_supplier` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.master_upah
CREATE TABLE IF NOT EXISTS `master_upah` (
  `UPAH_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SATUAN_UPAH_ID` int(11) DEFAULT NULL,
  `UPAH_KODE` varchar(100) DEFAULT NULL,
  `UPAH_NAMA` varchar(1000) DEFAULT NULL,
  `UPAH_HARGA_TEMP` varchar(100) DEFAULT NULL,
  `UPAH_HARGA` varchar(100) DEFAULT NULL,
  `UPAH_ACTIVE` int(11) DEFAULT '1',
  `LOKASI_UPAH_ID` int(11) DEFAULT NULL,
  `STATUS_VALIDASI_ID` int(11) DEFAULT NULL,
  `CREATED_BY_USER_ID` int(11) DEFAULT NULL,
  `CREATED_TIMESTAMP` timestamp NULL DEFAULT NULL,
  `LAST_EDITED_BY_USER_ID` int(11) DEFAULT NULL,
  `LAST_EDITED_TIMESTAMP` timestamp NULL DEFAULT NULL,
  `VALIDATED_BY_USER_ID` int(11) DEFAULT NULL,
  `VALIDATED_TIMESTAMP` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`UPAH_ID`),
  KEY `FK_RELATIONSHIP_15` (`SATUAN_UPAH_ID`),
  KEY `FK_lokasi_id` (`LOKASI_UPAH_ID`),
  CONSTRAINT `FK_lokasi_id` FOREIGN KEY (`LOKASI_UPAH_ID`) REFERENCES `lokasi_upah` (`LOKASI_UPAH_ID`),
  CONSTRAINT `FK_master_upah` FOREIGN KEY (`SATUAN_UPAH_ID`) REFERENCES `satuan_upah` (`SATUAN_UPAH_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.master_upah: ~22 rows (approximately)
DELETE FROM `master_upah`;
/*!40000 ALTER TABLE `master_upah` DISABLE KEYS */;
INSERT INTO `master_upah` (`UPAH_ID`, `SATUAN_UPAH_ID`, `UPAH_KODE`, `UPAH_NAMA`, `UPAH_HARGA_TEMP`, `UPAH_HARGA`, `UPAH_ACTIVE`, `LOKASI_UPAH_ID`, `STATUS_VALIDASI_ID`, `CREATED_BY_USER_ID`, `CREATED_TIMESTAMP`, `LAST_EDITED_BY_USER_ID`, `LAST_EDITED_TIMESTAMP`, `VALIDATED_BY_USER_ID`, `VALIDATED_TIMESTAMP`) VALUES
	(32, 2, 'UPH0001', 'Upah Kerja Borongan Pagar Sementara Dari Gedeg t. 2m', '15600', '15600', 1, 1, 3, NULL, NULL, 1, '2015-04-13 17:34:25', 1, '2015-04-13 18:42:39'),
	(33, 2, 'UPH0002', 'Upah Kerja Borongan Pagar Dari Seng Gelombang t= 2 m', '22500', '22500', 1, 1, 3, NULL, NULL, NULL, NULL, 1, '2015-04-13 18:45:25'),
	(34, 3, 'UPH0003', 'Upah Kerja Borongan Direksi Keet + Rabat 3x6m', '100000', '100000', 1, 1, 3, NULL, NULL, NULL, NULL, 1, '2015-04-14 00:52:55'),
	(35, 2, 'UPH0004', 'Upah Kerja Borongan Bouwplank', '5000', '5000', 1, 1, 3, NULL, NULL, NULL, NULL, 1, NULL),
	(36, 4, 'UPH0005', 'Upah Kerja Borongan Galian Tanah', '45000', '45000', 1, 1, 3, NULL, NULL, NULL, NULL, 1, NULL),
	(37, 4, 'UPH006', 'Upah Kerja Borongan Urugan Tanah  Kembali', '17500', '17500', 1, 1, 3, NULL, NULL, NULL, NULL, 1, NULL),
	(38, 4, 'UPH0007', 'Upah Kerja Borongan Urugan Sirtu + Pemadatan', '30000', '30000', 1, 1, 3, NULL, NULL, NULL, NULL, 1, NULL),
	(39, 4, 'UPH0008', 'Upah Kerja Borongan Urugan pasir', '5000', '5000', 1, 1, 3, NULL, NULL, NULL, NULL, 1, NULL),
	(40, 4, 'UPH0009', 'Upah Kerja Borongan Urugan Tanah  Perataan & Pemadatan', '26000', '26000', 1, 1, 3, NULL, NULL, NULL, NULL, 1, NULL),
	(41, 4, 'UPH0010', 'Upah Kerja Borongan Buang Tanah  Sementara', '16000', '16000', 1, 1, 3, NULL, NULL, NULL, NULL, 1, NULL),
	(42, 4, 'UPH0011', 'Upah Kerja Borongan Buang Tanah  Keluar Lokasi', '75000', '75000', 1, 1, 3, NULL, NULL, NULL, NULL, 1, NULL),
	(43, 4, 'UPH0012', 'Upah Kerja Borongan Buang Gragal  Keluar Lokasi', '30000', '30000', 1, 1, 3, NULL, NULL, NULL, NULL, 1, NULL),
	(44, 1, 'UPH.HARIAN.001', 'Pekerja', '65000', '65000', 1, 1, 3, NULL, NULL, 5, '2015-04-14 18:02:11', 5, '2015-04-14 18:06:18'),
	(45, 1, 'UPH.HARIAN.002', 'TUKANG BATU', '75000', '75000', 1, 1, 3, NULL, NULL, NULL, NULL, 1, NULL),
	(46, 1, 'UPH.HARIAN.003', 'KEPALA TUKANG BATU', '80000', '80000', 1, 1, 3, NULL, NULL, NULL, NULL, 1, NULL),
	(47, 1, 'UPH.HARIAN.004', '  Mandor', '95000', '95000', 1, 1, 3, NULL, NULL, NULL, NULL, 1, NULL),
	(48, 3, 'UPH0013', 'Upah Kerja Borongan Lantai kerja tb 5cm (site mix)', '8000', '8000', 1, 1, 3, NULL, NULL, NULL, NULL, 1, NULL),
	(49, 4, 'UPH0014', 'Upah Cor K-225 Ready mix t.15 cm', '35000', '35000', 1, 1, 3, NULL, NULL, NULL, NULL, 1, NULL),
	(50, 5, 'UPH0015', 'Upah pembesian', '2000', '2000', 1, 1, 3, NULL, NULL, NULL, NULL, 1, NULL),
	(51, 3, 'UPH0016', 'Upah Plastic sheet', '1500', '1500', 1, 1, 3, NULL, NULL, NULL, NULL, 1, NULL),
	(52, 3, 'UPH0017', 'Upah Floor hardenner ex. Sika natural color 3 kg/m2', '6000', '6000', 1, 1, 3, NULL, NULL, NULL, NULL, 1, NULL),
	(53, 1, 'UPH0053', 'Tes', '15750', '15750', 1, 1, 3, 1, '2015-04-13 17:31:10', 1, '2015-04-13 17:32:00', 1, NULL);
/*!40000 ALTER TABLE `master_upah` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.modules
CREATE TABLE IF NOT EXISTS `modules` (
  `MODULES_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MODULES_MNEMONIC` varchar(256) DEFAULT NULL,
  `MODULES_NAMA` varchar(128) DEFAULT NULL,
  `MODULES_LEVEL` int(11) DEFAULT '1',
  `MODULES_PARENT` int(11) DEFAULT NULL,
  PRIMARY KEY (`MODULES_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.modules: ~63 rows (approximately)
DELETE FROM `modules`;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
INSERT INTO `modules` (`MODULES_ID`, `MODULES_MNEMONIC`, `MODULES_NAMA`, `MODULES_LEVEL`, `MODULES_PARENT`) VALUES
	(1, 'admin', 'Manajemen Sistem', 0, 0),
	(2, 'perencanaan', 'Perencanaan', 0, 0),
	(3, 'master_perencanaan', 'Master Perencanaan', 0, 0),
	(4, 'master_pelaksanaan', 'Master Pelaksanaan', 0, 0),
	(5, 'pelaksanaan', 'Pelaksanaan', 0, 0),
	(6, 'monitoring', 'Monitoring', 0, 0),
	(7, 'perusahaan', 'Perusahaan', 1, 1),
	(8, 'departemen', 'Departemen', 1, 1),
	(9, 'pengguna', 'Pengguna', 1, 1),
	(10, 'role', 'Role', 1, 1),
	(11, 'barang', 'Barang', 1, 2),
	(12, 'upah', 'Upah', 1, 2),
	(13, 'analisa', 'Analisa', 1, 2),
	(14, 'proyek', 'Proyek', 1, 2),
	(15, 'rab', 'RAB', 1, 2),
	(16, 'satuan_barang', 'Satuan Barang', 1, 3),
	(17, 'kategori_barang', 'Kategori Barang', 1, 3),
	(18, 'satuan_upah', 'Satuan Upah', 1, 3),
	(19, 'lokasi_upah', 'Lokasi Upah', 1, 3),
	(20, 'supplier', 'Supplier', 1, 4),
	(21, 'kategori_supplier', 'Kategori Supplier', 1, 4),
	(22, 'gudang', 'Gudang', 1, 4),
	(23, 'top', 'TOP', 1, 4),
	(24, 'pajak', 'Pajak', 1, 4),
	(25, 'dashboard', 'Dashboard', 1, 5),
	(26, 'overhead_material', 'Overhead Material', 1, 5),
	(27, 'overhead_upah', 'Overhead Upah', 1, 5),
	(28, 'pp', 'Permintaan Pembelian', 1, 5),
	(29, 'pk', 'Permintaan Pekerjaan', 1, 5),
	(30, 'po', 'Purchase Order', 1, 5),
	(31, 'op', 'Opname Pekerjaan', 1, 5),
	(32, 'lpb', 'Laporan Penerimaan Barang', 1, 5),
	(33, 'bpm', 'Bon Pemakaian Material', 1, 5),
	(34, 'hm', 'Hutang Material', 1, 5),
	(35, 'pm', 'Pengembalian Material', 1, 5),
	(36, 'invoice', 'Invoice', 1, 5),
	(37, 'payment', 'Payment', 1, 5),
	(38, 'admin', 'Creator Perusahaan', 2, 7),
	(39, 'viewer', 'Viewer Perusahaan', 2, 7),
	(41, 'admin', 'Creator Departemen', 2, 8),
	(42, 'viewer', 'Viewer Departemen', 2, 8),
	(43, 'admin', 'Creator Pengguna', 2, 9),
	(44, 'viewer', 'Viewer Pengguna', 2, 9),
	(45, 'admin', 'Admin Role', 2, 10),
	(46, 'admin', 'Admin Barang', 2, 11),
	(47, 'viewer', 'Viewer Barang', 2, 11),
	(48, 'validator', 'Validator Barang', 2, 11),
	(49, 'admin', 'Admin Upah', 2, 12),
	(50, 'viewer', 'Viewer Upah', 2, 12),
	(51, 'validator', 'Validator Upah', 2, 12),
	(52, 'admin', 'Admin Analisa', 2, 13),
	(53, 'viewer', 'Viewer Analisa', 2, 13),
	(54, 'admin', 'Admin Proyek', 2, 14),
	(55, 'viewer', 'Viewer Proyek', 2, 14),
	(56, 'estimator', 'Estimator RAB', 2, 15),
	(57, 'viewer', 'Viewer RAB', 2, 15),
	(58, 'validator', 'Validator RAB', 2, 15),
	(59, 'admin', 'Admin Overhead Material', 2, 26),
	(60, 'viewer', 'Viewer Overhead Material', 2, 26),
	(61, 'validator', 'Validator Overhead Material', 2, 26),
	(62, 'admin', 'Admin Overhead Upah', 2, 27),
	(63, 'viewer', 'Viewer Overhead Upah', 2, 27),
	(64, 'validator', 'Validator Overhead Upah', 2, 27);
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.opname
CREATE TABLE IF NOT EXISTS `opname` (
  `OPNAME_ID` int(11) NOT NULL AUTO_INCREMENT,
  `VALIDATOR_ID` int(11) DEFAULT NULL,
  `PETUGAS_ID` int(11) DEFAULT NULL,
  `RAB_ID` int(11) DEFAULT NULL,
  `KATEGORI_OP_ID` int(11) DEFAULT NULL,
  `OPNAME_KODE` varchar(100) DEFAULT NULL,
  `OPNAME_TANGGAL` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `OPNAME_TOTAL_HARGA` varchar(50) DEFAULT NULL,
  `STATUS_OP_ID` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`OPNAME_ID`),
  KEY `FK_VAL_ID` (`VALIDATOR_ID`),
  KEY `FK_PET_ID_1` (`PETUGAS_ID`),
  KEY `FK_opname_rab_transaction_2` (`RAB_ID`),
  CONSTRAINT `FK_opname_rab_transaction_2` FOREIGN KEY (`RAB_ID`) REFERENCES `rab_transaction` (`RAB_ID`),
  CONSTRAINT `FK_opname_rab_transaction` FOREIGN KEY (`RAB_ID`) REFERENCES `rab_transaction` (`RAB_ID`),
  CONSTRAINT `FK_PET_ID_1` FOREIGN KEY (`PETUGAS_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`),
  CONSTRAINT `FK_VAL_ID` FOREIGN KEY (`VALIDATOR_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='Table seperti pada Purchase order. tujuannya meminta gaji setiap progress dari tenaga kerja\r\n\r\nKategori_OP_ID diisi 1 atau 2. Bila 1 digunakan untuk OPNAME OVERHEAD, bila 2 digunakan untuk OPNAME MATERIAL';

-- Dumping data for table kztszete_pm.opname: ~1 rows (approximately)
DELETE FROM `opname`;
/*!40000 ALTER TABLE `opname` DISABLE KEYS */;
INSERT INTO `opname` (`OPNAME_ID`, `VALIDATOR_ID`, `PETUGAS_ID`, `RAB_ID`, `KATEGORI_OP_ID`, `OPNAME_KODE`, `OPNAME_TANGGAL`, `OPNAME_TOTAL_HARGA`, `STATUS_OP_ID`) VALUES
	(5, NULL, 1, 3, 2, '001/OP/RAB_PEMBANGUNAN_PAGAR_1/IV/2015', '2015-04-15 13:35:43', '2147483647', 1);
/*!40000 ALTER TABLE `opname` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.overhead
CREATE TABLE IF NOT EXISTS `overhead` (
  `OVERHEAD_ID` int(11) NOT NULL AUTO_INCREMENT,
  `RAB_ID` int(11) DEFAULT NULL,
  `OVERHEAD_KODE` varchar(50) DEFAULT NULL,
  `OVERHEAD_NAMA` varchar(500) DEFAULT NULL,
  `OVERHEAD_CREATE` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `OVERHEAD_ACTIVE` int(11) DEFAULT NULL,
  `OVERHEAD_TOTAL` varchar(100) DEFAULT NULL,
  `OVERHEAD_TIPE` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`OVERHEAD_ID`),
  KEY `FK_RAB_ID_OVER` (`RAB_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.overhead: ~8 rows (approximately)
DELETE FROM `overhead`;
/*!40000 ALTER TABLE `overhead` DISABLE KEYS */;
INSERT INTO `overhead` (`OVERHEAD_ID`, `RAB_ID`, `OVERHEAD_KODE`, `OVERHEAD_NAMA`, `OVERHEAD_CREATE`, `OVERHEAD_ACTIVE`, `OVERHEAD_TOTAL`, `OVERHEAD_TIPE`) VALUES
	(1, 2, '001/MOV/RAB_PEMBANGUNAN_WAHANA_TORNADO_1/IV/2015', 'OVERHEAD_TORNADO', '2015-04-14 23:45:39', 1, '1230000', 'barang'),
	(2, 2, '002/UOV/RAB_PEMBANGUNAN_WAHANA_TORNADO_1/IV/2015', '1', '2015-04-14 23:50:48', 1, '350000', 'upah'),
	(3, 3, '001/UOV/RAB_PEMBANGUNAN_PAGAR_1/IV/2015', 'ovupah1', '2015-04-15 04:35:10', 1, '800000', 'upah'),
	(4, 3, '002/MOV/RAB_PEMBANGUNAN_PAGAR_1/IV/2015', 'a', '2015-04-15 04:39:15', 1, '325000', 'barang'),
	(5, 3, '003/UOV/RAB_PEMBANGUNAN_PAGAR_1/IV/2015', '', '2015-04-15 11:43:07', 1, '800000', 'upah'),
	(6, 3, '004/UOV/RAB_PEMBANGUNAN_PAGAR_1/IV/2015', '', '2015-04-15 11:45:12', 1, '800000', 'upah'),
	(7, 4, '001/MOV/RAB_PEMBANGUNAN_KANTOR_INDUK_1/IV/2015', 'kode', '2015-04-15 12:16:03', 1, '225000', 'barang'),
	(8, 3, '005/UOV/RAB_PEMBANGUNAN_PAGAR_1/IV/2015', 'overhead upah galian', '2015-04-15 12:28:33', 1, '1300000', 'upah');
/*!40000 ALTER TABLE `overhead` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.pajak
CREATE TABLE IF NOT EXISTS `pajak` (
  `PAJAK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PAJAK_NAMA` varchar(100) DEFAULT NULL,
  `PAJAK_VALUE` varchar(100) DEFAULT NULL,
  `PAJAK_DESCRIPTION` text,
  `PAJAK_ACTIVE` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`PAJAK_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.pajak: ~2 rows (approximately)
DELETE FROM `pajak`;
/*!40000 ALTER TABLE `pajak` DISABLE KEYS */;
INSERT INTO `pajak` (`PAJAK_ID`, `PAJAK_NAMA`, `PAJAK_VALUE`, `PAJAK_DESCRIPTION`, `PAJAK_ACTIVE`) VALUES
	(2, 'PPN', '10', 'Pajak Pendapatan Negara', 1),
	(3, 'PPH', '2.5', 'Pajak Penghasilan', 1);
/*!40000 ALTER TABLE `pajak` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.paket_overhead_material
CREATE TABLE IF NOT EXISTS `paket_overhead_material` (
  `PAKET_OVERHEAD_MATERIAL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SATUAN_NAMA` varchar(100) DEFAULT NULL,
  `PAKET_OVERHEAD_MATERIAL_NAMA` varchar(1000) DEFAULT NULL,
  `PAKET_OVERHEAD_MATERIAL_HARGA` varchar(100) DEFAULT NULL,
  `PAKET_OVERHEAD_MATERIAL_KETERANGAN` text,
  PRIMARY KEY (`PAKET_OVERHEAD_MATERIAL_ID`),
  KEY `FK_RELATIONSHIP_22` (`SATUAN_NAMA`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.paket_overhead_material: ~3 rows (approximately)
DELETE FROM `paket_overhead_material`;
/*!40000 ALTER TABLE `paket_overhead_material` DISABLE KEYS */;
INSERT INTO `paket_overhead_material` (`PAKET_OVERHEAD_MATERIAL_ID`, `SATUAN_NAMA`, `PAKET_OVERHEAD_MATERIAL_NAMA`, `PAKET_OVERHEAD_MATERIAL_HARGA`, `PAKET_OVERHEAD_MATERIAL_KETERANGAN`) VALUES
	(4, 'Set', 'Sewa Alat Berat', '500000', NULL),
	(5, 'Set', 'Sewa Listrik', '1000000', NULL),
	(6, 'Set', 'Alat Pembersih', '120000', NULL);
/*!40000 ALTER TABLE `paket_overhead_material` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.paket_overhead_upah
CREATE TABLE IF NOT EXISTS `paket_overhead_upah` (
  `PAKET_OVERHEAD_UPAH_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SATUAN_UPAH_ID` int(11) DEFAULT NULL,
  `PAKET_OVERHEAD_UPAH_NAMA` varchar(1000) DEFAULT NULL,
  `PAKET_OVERHEAD_UPAH_HARGA` varchar(100) DEFAULT NULL,
  `PAKET_OVERHEAD_UPAH_KETERANGAN` text,
  PRIMARY KEY (`PAKET_OVERHEAD_UPAH_ID`),
  KEY `FK_RELATIONSHIP_22` (`SATUAN_UPAH_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.paket_overhead_upah: ~0 rows (approximately)
DELETE FROM `paket_overhead_upah`;
/*!40000 ALTER TABLE `paket_overhead_upah` DISABLE KEYS */;
/*!40000 ALTER TABLE `paket_overhead_upah` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.payment
CREATE TABLE IF NOT EXISTS `payment` (
  `PAYMENT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `INVOICE_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`PAYMENT_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.payment: 0 rows
DELETE FROM `payment`;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.penerimaan_barang
CREATE TABLE IF NOT EXISTS `penerimaan_barang` (
  `PENERIMAAN_BARANG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PETUGAS_ID` int(11) DEFAULT NULL,
  `SUPPLIER_ID` int(11) DEFAULT NULL,
  `VALIDATOR_ID` int(11) DEFAULT NULL,
  `STATUS_LPB_ID` int(11) DEFAULT NULL,
  `GUDANG_ID` int(11) DEFAULT NULL,
  `PENERIMAAN_BARANG_KODE` varchar(100) DEFAULT NULL,
  `PENERIMAAN_BARANG_TANGGAL` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `LPB_SURAT_JALAN` varchar(100) DEFAULT NULL,
  `LPB_KENDARAAN` varchar(100) DEFAULT NULL,
  `LPB_EXPEDISI` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`PENERIMAAN_BARANG_ID`),
  KEY `FK_RELATIONSHIP_51` (`VALIDATOR_ID`),
  KEY `FK_RELATIONSHIP_55` (`PETUGAS_ID`),
  KEY `FK_RELATIONSHIP_56` (`SUPPLIER_ID`),
  KEY `FK_RELATIONSHIP_58` (`STATUS_LPB_ID`),
  KEY `FKGUDANG` (`GUDANG_ID`),
  CONSTRAINT `FKGUDANG` FOREIGN KEY (`GUDANG_ID`) REFERENCES `master_gudang` (`GUDANG_ID`),
  CONSTRAINT `FK_RELATIONSHIP_51` FOREIGN KEY (`VALIDATOR_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_RELATIONSHIP_55` FOREIGN KEY (`PETUGAS_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_RELATIONSHIP_56` FOREIGN KEY (`SUPPLIER_ID`) REFERENCES `master_supplier` (`SUPPLIER_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_RELATIONSHIP_58` FOREIGN KEY (`STATUS_LPB_ID`) REFERENCES `status_lpb` (`STATUS_LPB_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.penerimaan_barang: ~3 rows (approximately)
DELETE FROM `penerimaan_barang`;
/*!40000 ALTER TABLE `penerimaan_barang` DISABLE KEYS */;
INSERT INTO `penerimaan_barang` (`PENERIMAAN_BARANG_ID`, `PETUGAS_ID`, `SUPPLIER_ID`, `VALIDATOR_ID`, `STATUS_LPB_ID`, `GUDANG_ID`, `PENERIMAAN_BARANG_KODE`, `PENERIMAAN_BARANG_TANGGAL`, `LPB_SURAT_JALAN`, `LPB_KENDARAAN`, `LPB_EXPEDISI`) VALUES
	(15, NULL, NULL, NULL, 1, NULL, '00001/LPB/IV/2015', '2015-04-20 16:38:04', 'SJ/1023', 'L 102 N', NULL),
	(16, NULL, NULL, NULL, 1, NULL, '00002/LPB/IV/2015', '2015-04-20 16:59:48', 'SJ/1023', 'L 102 N', NULL),
	(17, NULL, NULL, NULL, 1, NULL, '00003/LPB/IV/2015', '2015-04-20 17:08:19', 'SJ/102345', 'L 1023 NB', NULL);
/*!40000 ALTER TABLE `penerimaan_barang` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.pengguna
CREATE TABLE IF NOT EXISTS `pengguna` (
  `PENGGUNA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DEPARTEMEN_ID` int(11) DEFAULT NULL,
  `PENGGUNA_NAMA` varchar(1000) DEFAULT NULL,
  `PENGGUNA_USERNAME` varchar(1000) DEFAULT NULL,
  `PENGGUNA_PASSWORD` varchar(1000) DEFAULT NULL,
  `PENGGUNA_PASSWORD_VAL` varchar(1000) NOT NULL DEFAULT '0',
  `PENGGUNA_EMAIL` varchar(1000) DEFAULT NULL,
  `PENGGUNA_HP` varchar(100) DEFAULT NULL,
  `PENGGUNA_ACTIVE` int(11) DEFAULT NULL,
  `PENGGUNA_DAFTAR` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `PENGGUNA_SIGN_PASSWORD` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`PENGGUNA_ID`),
  KEY `fk_departemen` (`DEPARTEMEN_ID`),
  CONSTRAINT `fk_departemen` FOREIGN KEY (`DEPARTEMEN_ID`) REFERENCES `departemen` (`DEPARTEMEN_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.pengguna: ~7 rows (approximately)
DELETE FROM `pengguna`;
/*!40000 ALTER TABLE `pengguna` DISABLE KEYS */;
INSERT INTO `pengguna` (`PENGGUNA_ID`, `DEPARTEMEN_ID`, `PENGGUNA_NAMA`, `PENGGUNA_USERNAME`, `PENGGUNA_PASSWORD`, `PENGGUNA_PASSWORD_VAL`, `PENGGUNA_EMAIL`, `PENGGUNA_HP`, `PENGGUNA_ACTIVE`, `PENGGUNA_DAFTAR`, `PENGGUNA_SIGN_PASSWORD`) VALUES
	(1, 4, 'Administrator', 'administrator', '25d55ad283aa400af464c76d713c07ad', '0', 'admin@admin.com', '0812345678', 1, '2015-04-12 23:04:41', '25d55ad283aa400af464c76d713c07ad'),
	(2, 4, 'Dmitri Chaniyago', 'demit', '25d55ad283aa400af464c76d713c07ad', '0', '', '', 1, '2015-04-12 23:04:43', '25d55ad283aa400af464c76d713c07ad'),
	(3, 1, 'Ardiansyah Baskara', 'ade', '25d55ad283aa400af464c76d713c07ad', '0', '', '', 1, '2015-04-12 23:04:45', '25d55ad283aa400af464c76d713c07ad'),
	(4, 2, 'Sukma Ardianto', 'sukma', '25d55ad283aa400af464c76d713c07ad', '0', '', '', 1, '2015-04-12 23:04:47', '25d55ad283aa400af464c76d713c07ad'),
	(5, 17, 'Sindung Anggar Kusuma', 'sindung', 'af3d072dd62819e1007c1b843244d152', '0', 'sindung.its@gmail.com', '085733310238', 1, '2015-04-14 22:19:44', '25d55ad283aa400af464c76d713c07ad'),
	(6, 17, 'Sukirman', 'sukirman', '25d55ad283aa400af464c76d713c07ad', '0', '', '', 1, '2015-04-15 13:02:01', '25d55ad283aa400af464c76d713c07ad'),
	(7, 4, 'Handoko', 'handoko', '25d55ad283aa400af464c76d713c07ad', '0', '', '', 1, '2015-04-15 13:02:03', '25d55ad283aa400af464c76d713c07ad');
/*!40000 ALTER TABLE `pengguna` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.penggunaxroles
CREATE TABLE IF NOT EXISTS `penggunaxroles` (
  `PENGGUNA_ID` int(11) NOT NULL,
  `ROLE_ID` int(11) NOT NULL,
  PRIMARY KEY (`PENGGUNA_ID`,`ROLE_ID`),
  KEY `fk_role1` (`ROLE_ID`),
  CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`PENGGUNA_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_role1` FOREIGN KEY (`ROLE_ID`) REFERENCES `roles` (`ROLE_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.penggunaxroles: ~10 rows (approximately)
DELETE FROM `penggunaxroles`;
/*!40000 ALTER TABLE `penggunaxroles` DISABLE KEYS */;
INSERT INTO `penggunaxroles` (`PENGGUNA_ID`, `ROLE_ID`) VALUES
	(1, 1),
	(3, 1),
	(4, 1),
	(5, 6),
	(7, 7),
	(5, 8),
	(6, 9),
	(7, 10),
	(5, 11),
	(7, 11);
/*!40000 ALTER TABLE `penggunaxroles` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.penugasan
CREATE TABLE IF NOT EXISTS `penugasan` (
  `PENUGASAN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PENUGASAN_NAMA` longtext,
  PRIMARY KEY (`PENUGASAN_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.penugasan: ~4 rows (approximately)
DELETE FROM `penugasan`;
/*!40000 ALTER TABLE `penugasan` DISABLE KEYS */;
INSERT INTO `penugasan` (`PENUGASAN_ID`, `PENUGASAN_NAMA`) VALUES
	(1, 'creator'),
	(2, 'estimator'),
	(3, 'pm'),
	(4, 'validator');
/*!40000 ALTER TABLE `penugasan` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.permintaan_pekerjaan
CREATE TABLE IF NOT EXISTS `permintaan_pekerjaan` (
  `PERMINTAAN_PEKERJAAN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `VALIDATOR_ID` int(11) DEFAULT NULL,
  `STATUS_PK_ID` int(11) DEFAULT NULL,
  `PETUGAS_ID` int(11) DEFAULT NULL,
  `RAB_ID` int(11) DEFAULT NULL,
  `KATEGORI_PK_ID` int(11) DEFAULT NULL,
  `TOTAL_PK` varchar(100) DEFAULT NULL,
  `PERMINTAAN_PEKERJAAN_KODE` varchar(100) DEFAULT NULL,
  `PERMINTAAN_PEKERJAAN_TANGGAL` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`PERMINTAAN_PEKERJAAN_ID`),
  KEY `FK_RELATIONSHIP_10` (`PETUGAS_ID`),
  KEY `FK_RELATIONSHIP_16` (`STATUS_PK_ID`),
  KEY `FK_RELATIONSHIP_17` (`KATEGORI_PK_ID`),
  KEY `FK_RELATIONSHIP_50` (`VALIDATOR_ID`),
  KEY `FK_RAB_PK` (`RAB_ID`),
  CONSTRAINT `FK_KATEG_PK` FOREIGN KEY (`KATEGORI_PK_ID`) REFERENCES `kategori_pk` (`KATEGORI_PK_ID`),
  CONSTRAINT `FK_PETUGAS_PK` FOREIGN KEY (`PETUGAS_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`),
  CONSTRAINT `FK_STATUS_PK` FOREIGN KEY (`STATUS_PK_ID`) REFERENCES `status_pk` (`STATUS_PK_ID`),
  CONSTRAINT `FK_VALID_ID` FOREIGN KEY (`VALIDATOR_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='INFO:\r\nPermintaan pekerjaan Nama saya Hapus !!!!. Nanti cukup kode saja';

-- Dumping data for table kztszete_pm.permintaan_pekerjaan: ~5 rows (approximately)
DELETE FROM `permintaan_pekerjaan`;
/*!40000 ALTER TABLE `permintaan_pekerjaan` DISABLE KEYS */;
INSERT INTO `permintaan_pekerjaan` (`PERMINTAAN_PEKERJAAN_ID`, `VALIDATOR_ID`, `STATUS_PK_ID`, `PETUGAS_ID`, `RAB_ID`, `KATEGORI_PK_ID`, `TOTAL_PK`, `PERMINTAAN_PEKERJAAN_KODE`, `PERMINTAAN_PEKERJAAN_TANGGAL`) VALUES
	(1, NULL, 1, 1, 2, 1, '10000', '001/PKOV//IV/2015', '2015-04-14 19:53:02'),
	(2, NULL, 1, NULL, 2, 2, '0', '002/PK/RAB_PEMBANGUNAN_WAHANA_TORNADO_1/IV/2015', '2015-04-15 06:09:12'),
	(3, NULL, 2, NULL, 3, 2, '0', '001/PK/RAB_PEMBANGUNAN_PAGAR_1/IV/2015', '2015-04-15 11:08:54'),
	(4, NULL, 2, NULL, 4, 2, '0', '001/PK/RAB_PEMBANGUNAN_KANTOR_INDUK_1/IV/2015', '2015-04-15 14:05:25'),
	(5, NULL, 2, NULL, 2, 2, '0', '003/PK/RAB_PEMBANGUNAN_WAHANA_TORNADO_1/IV/2015', '2015-04-16 10:05:23');
/*!40000 ALTER TABLE `permintaan_pekerjaan` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.permintaan_pembelian
CREATE TABLE IF NOT EXISTS `permintaan_pembelian` (
  `PERMINTAAN_PEMBELIAN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `VALIDATOR_ID` int(11) DEFAULT NULL,
  `STATUS_PP_ID` int(11) DEFAULT NULL,
  `PETUGAS_ID` int(11) DEFAULT NULL,
  `RAB_ID` int(11) DEFAULT NULL,
  `TOTAL_HARGA_PP` varchar(100) DEFAULT NULL,
  `KATEGORI_PP_ID` int(11) DEFAULT NULL,
  `GUDANG_ID` int(11) DEFAULT NULL,
  `PERMINTAAN_PEMBELIAN_KODE` varchar(100) DEFAULT NULL,
  `PERMINTAAN_PEMBELIAN_TANGGAL` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`PERMINTAAN_PEMBELIAN_ID`),
  KEY `FK_RELATIONSHIP_10` (`PETUGAS_ID`),
  KEY `FK_RELATIONSHIP_16` (`STATUS_PP_ID`),
  KEY `FK_RELATIONSHIP_17` (`KATEGORI_PP_ID`),
  KEY `FK_RELATIONSHIP_50` (`VALIDATOR_ID`),
  KEY `FK_GUD_PP` (`GUDANG_ID`),
  KEY `FK_REL_RAB_PP` (`RAB_ID`),
  CONSTRAINT `FK_GUD_PP` FOREIGN KEY (`GUDANG_ID`) REFERENCES `master_gudang` (`GUDANG_ID`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`PETUGAS_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `FK_RELATIONSHIP_16` FOREIGN KEY (`STATUS_PP_ID`) REFERENCES `status_pp` (`STATUS_PP_ID`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `FK_RELATIONSHIP_17` FOREIGN KEY (`KATEGORI_PP_ID`) REFERENCES `kategori_pp` (`KATEGORI_PP_ID`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `FK_RELATIONSHIP_50` FOREIGN KEY (`VALIDATOR_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.permintaan_pembelian: ~4 rows (approximately)
DELETE FROM `permintaan_pembelian`;
/*!40000 ALTER TABLE `permintaan_pembelian` DISABLE KEYS */;
INSERT INTO `permintaan_pembelian` (`PERMINTAAN_PEMBELIAN_ID`, `VALIDATOR_ID`, `STATUS_PP_ID`, `PETUGAS_ID`, `RAB_ID`, `TOTAL_HARGA_PP`, `KATEGORI_PP_ID`, `GUDANG_ID`, `PERMINTAAN_PEMBELIAN_KODE`, `PERMINTAAN_PEMBELIAN_TANGGAL`) VALUES
	(1, NULL, 2, NULL, 3, NULL, 2, 13, '001/PP/RAB_PEMBANGUNAN_PAGAR_1/IV/2015', '2015-04-15 03:56:46'),
	(2, NULL, 2, NULL, 3, NULL, 1, 13, '002/PPOV/RAB_PEMBANGUNAN_PAGAR_1/IV/2015', '2015-04-15 04:46:47'),
	(3, NULL, 2, NULL, 4, NULL, 2, 13, '001/PP/RAB_PEMBANGUNAN_KANTOR_INDUK_1/IV/2015', '2015-04-15 09:39:49'),
	(4, NULL, 2, NULL, 3, NULL, 2, 13, '003/PP/RAB_PEMBANGUNAN_PAGAR_1/IV/2015', '2015-04-15 11:43:34');
/*!40000 ALTER TABLE `permintaan_pembelian` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.perusahaan
CREATE TABLE IF NOT EXISTS `perusahaan` (
  `PERUSAHAAN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PERUSAHAAN_NAMA` varchar(200) DEFAULT NULL,
  `PERUSAHAAN_KODE` varchar(100) DEFAULT NULL,
  `PERUSAHAAN_ALAMAT` varchar(500) DEFAULT NULL,
  `PERUSAHAAN_EMAIL` varchar(50) DEFAULT NULL,
  `PERUSAHAAN_TELP` varchar(50) DEFAULT NULL,
  `PERUSAHAAN_ACTIVE` int(11) DEFAULT '1',
  PRIMARY KEY (`PERUSAHAAN_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table kztszete_pm.perusahaan: ~1 rows (approximately)
DELETE FROM `perusahaan`;
/*!40000 ALTER TABLE `perusahaan` DISABLE KEYS */;
INSERT INTO `perusahaan` (`PERUSAHAAN_ID`, `PERUSAHAAN_NAMA`, `PERUSAHAAN_KODE`, `PERUSAHAAN_ALAMAT`, `PERUSAHAAN_EMAIL`, `PERUSAHAAN_TELP`, `PERUSAHAAN_ACTIVE`) VALUES
	(3, 'STE', 'STE01', 'Surabaya', 'info@ste.com', '031 123456', 1);
/*!40000 ALTER TABLE `perusahaan` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.poxlpb
CREATE TABLE IF NOT EXISTS `poxlpb` (
  `ID_PO` int(11) NOT NULL DEFAULT '1',
  `ID_LPB` int(11) NOT NULL DEFAULT '1',
  `ID_BARANG` int(11) NOT NULL DEFAULT '1',
  `VOLUME_BARNG` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_PO`,`ID_BARANG`,`ID_LPB`),
  UNIQUE KEY `ID_PO_ID_LPB` (`ID_PO`,`ID_LPB`),
  KEY `FK_LPB_X_PO` (`ID_LPB`),
  KEY `FK_BARANG` (`ID_BARANG`),
  CONSTRAINT `FK_BARANG` FOREIGN KEY (`ID_BARANG`) REFERENCES `master_barang` (`BARANG_ID`),
  CONSTRAINT `FK_LPB_X_PO` FOREIGN KEY (`ID_LPB`) REFERENCES `penerimaan_barang` (`PENERIMAAN_BARANG_ID`),
  CONSTRAINT `FK_PO_X_LPB` FOREIGN KEY (`ID_PO`) REFERENCES `purchase_order` (`PURCHASE_ORDER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.poxlpb: ~0 rows (approximately)
DELETE FROM `poxlpb`;
/*!40000 ALTER TABLE `poxlpb` DISABLE KEYS */;
/*!40000 ALTER TABLE `poxlpb` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.project
CREATE TABLE IF NOT EXISTS `project` (
  `PROJECT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PROJECT_NAMA` varchar(1000) DEFAULT NULL,
  `PROJECT_KODE` varchar(1000) DEFAULT NULL,
  `PROJECT_ACTIVE` int(11) DEFAULT NULL,
  `PROJECT_CREATE` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `PROJECT_DESCRIPTION` text,
  `PROJECT_STATUS` int(11) DEFAULT '1',
  `PROJECT_URL_FOLDER` varchar(256) DEFAULT NULL,
  `MAIN_PROJECT_ID` int(11) DEFAULT NULL,
  `PROJECT_START` timestamp NULL DEFAULT NULL,
  `PROJECT_PAUSE` timestamp NULL DEFAULT NULL,
  `PROJECT_TOTAL_HARI_PAUSE` int(11) DEFAULT NULL,
  `PROJECT_END` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PROJECT_ID`),
  KEY `FK_STATUS_PROJ` (`PROJECT_STATUS`),
  KEY `FK_main_project` (`MAIN_PROJECT_ID`),
  CONSTRAINT `FK_STATUS_PROJ` FOREIGN KEY (`PROJECT_STATUS`) REFERENCES `status_project` (`STATUS_PROJECT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.project: ~5 rows (approximately)
DELETE FROM `project`;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` (`PROJECT_ID`, `PROJECT_NAMA`, `PROJECT_KODE`, `PROJECT_ACTIVE`, `PROJECT_CREATE`, `PROJECT_DESCRIPTION`, `PROJECT_STATUS`, `PROJECT_URL_FOLDER`, `MAIN_PROJECT_ID`, `PROJECT_START`, `PROJECT_PAUSE`, `PROJECT_TOTAL_HARI_PAUSE`, `PROJECT_END`) VALUES
	(1, 'PEMBANGUNAN GERBANG ROLLER COASTER', 'PRO00001', 0, '2015-04-14 12:33:51', '', 1, NULL, 1, NULL, NULL, NULL, NULL),
	(2, 'Coba proyek', 'PRO00002', 1, '2015-04-14 14:28:43', 'Coba', 1, NULL, 1, '2015-04-14 15:28:39', NULL, NULL, NULL),
	(3, 'PEMBANGUNAN WAHANA TORNADO', 'PRO00003', 1, '2015-04-14 15:05:25', '', 3, NULL, 1, '2015-04-14 15:56:47', NULL, NULL, NULL),
	(4, 'PEMBANGUNAN PAGAR', 'PRO00004', 1, '2015-04-15 00:38:24', '', 3, NULL, 2, '2015-04-15 04:22:59', NULL, NULL, NULL),
	(5, 'PEMBANGUNAN KANTOR INDUK', 'PRO00005', 1, '2015-04-15 07:02:29', '', 3, NULL, 2, '2015-04-15 09:24:08', NULL, NULL, NULL);
/*!40000 ALTER TABLE `project` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.purchase_order
CREATE TABLE IF NOT EXISTS `purchase_order` (
  `PURCHASE_ORDER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `RAB_ID` int(11) DEFAULT NULL,
  `SUPPLIER_ID` int(11) DEFAULT NULL,
  `STATUS_PO_ID` int(11) DEFAULT NULL,
  `KATEGORI_PAJAK_ID` int(11) DEFAULT NULL,
  `PAJAK_ID` int(11) DEFAULT NULL,
  `PETUGAS_ID` int(11) DEFAULT NULL,
  `VALIDATOR_ID` int(11) DEFAULT NULL,
  `GUDANG_ID` int(11) DEFAULT NULL,
  `TOP_ID` int(11) DEFAULT NULL,
  `KATEGORI_PP_ID` int(11) DEFAULT NULL,
  `PURCHASE_ORDER_KODE` varchar(50) DEFAULT NULL,
  `PURCHASE_ORDER_TANGGAL` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `PURCHASE_ORDER_TOTAL` varchar(100) NOT NULL,
  `TANGGAL_HARUS_BAYAR` int(11) DEFAULT NULL,
  PRIMARY KEY (`PURCHASE_ORDER_ID`),
  KEY `FK_RELATIONSHIP_41` (`PETUGAS_ID`),
  KEY `FK_RELATIONSHIP_45` (`SUPPLIER_ID`),
  KEY `FK_RELATIONSHIP_46` (`STATUS_PO_ID`),
  KEY `FK_RELATIONSHIP_49` (`VALIDATOR_ID`),
  KEY `FK_GUDANG_PO` (`GUDANG_ID`),
  KEY `FK_purchase_order_pajak` (`PAJAK_ID`),
  CONSTRAINT `FK_GUDANG_PO` FOREIGN KEY (`GUDANG_ID`) REFERENCES `master_gudang` (`GUDANG_ID`),
  CONSTRAINT `FK_purchase_order_pajak` FOREIGN KEY (`PAJAK_ID`) REFERENCES `pajak` (`PAJAK_ID`),
  CONSTRAINT `FK_RELATIONSHIP_41` FOREIGN KEY (`PETUGAS_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_RELATIONSHIP_45` FOREIGN KEY (`SUPPLIER_ID`) REFERENCES `master_supplier` (`SUPPLIER_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_RELATIONSHIP_46` FOREIGN KEY (`STATUS_PO_ID`) REFERENCES `status_po` (`STATUS_PO_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_RELATIONSHIP_49` FOREIGN KEY (`VALIDATOR_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COMMENT='TANGGAL HARUS BAYAR diisi number dalam satuan hari. Ditujukk';

-- Dumping data for table kztszete_pm.purchase_order: ~6 rows (approximately)
DELETE FROM `purchase_order`;
/*!40000 ALTER TABLE `purchase_order` DISABLE KEYS */;
INSERT INTO `purchase_order` (`PURCHASE_ORDER_ID`, `RAB_ID`, `SUPPLIER_ID`, `STATUS_PO_ID`, `KATEGORI_PAJAK_ID`, `PAJAK_ID`, `PETUGAS_ID`, `VALIDATOR_ID`, `GUDANG_ID`, `TOP_ID`, `KATEGORI_PP_ID`, `PURCHASE_ORDER_KODE`, `PURCHASE_ORDER_TANGGAL`, `PURCHASE_ORDER_TOTAL`, `TANGGAL_HARUS_BAYAR`) VALUES
	(8, 5, 5, 2, 2, 2, NULL, NULL, 13, 16, 2, '001/PO/RAB_GERBANG/IV/2015', '2015-04-08 11:10:05', '4398750', NULL),
	(10, 5, 5, 2, 3, 2, NULL, NULL, 13, 16, 1, '001/POOV/RAB_GERBANG/IV/2015', '2015-04-08 11:10:15', '1715000', NULL),
	(11, 6, 5, 2, 3, 2, NULL, NULL, 13, 14, 2, '001/PO/RAB_PAGAR/IV/2015', '2015-04-08 14:17:52', '375000', NULL),
	(12, 3, 5, 2, 2, 2, NULL, NULL, 13, 15, 1, '001/POOV/RAB_PEMBANGUNAN_PAGAR_1/IV/2015', '2015-04-15 04:48:14', '292500', NULL),
	(13, 3, 5, 2, 3, 2, NULL, NULL, 13, 16, 2, '002/PO/RAB_PEMBANGUNAN_PAGAR_1/IV/2015', '2015-04-15 04:50:25', '10135000', NULL),
	(14, 4, 5, 2, 1, 2, NULL, NULL, 13, 16, 2, '001/PO/RAB_PEMBANGUNAN_KANTOR_INDUK_1/IV/2015', '2015-04-15 11:55:36', '3665700', NULL);
/*!40000 ALTER TABLE `purchase_order` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.rab_status_approval
CREATE TABLE IF NOT EXISTS `rab_status_approval` (
  `RAB_STATUS_APPROVAL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `RAB_STATUS_APPROVAL_NAMA` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`RAB_STATUS_APPROVAL_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.rab_status_approval: ~5 rows (approximately)
DELETE FROM `rab_status_approval`;
/*!40000 ALTER TABLE `rab_status_approval` DISABLE KEYS */;
INSERT INTO `rab_status_approval` (`RAB_STATUS_APPROVAL_ID`, `RAB_STATUS_APPROVAL_NAMA`) VALUES
	(1, 'Draft'),
	(2, 'Waiting for validation'),
	(3, 'Validated'),
	(4, 'Rejected'),
	(5, 'Revision');
/*!40000 ALTER TABLE `rab_status_approval` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.rab_transaction
CREATE TABLE IF NOT EXISTS `rab_transaction` (
  `RAB_ID` int(11) NOT NULL AUTO_INCREMENT,
  `RAB_STATUS_APPROVAL_ID` int(11) DEFAULT NULL,
  `ESTIMATOR_ID` int(11) DEFAULT NULL,
  `VALIDATOR_ID` int(11) DEFAULT NULL,
  `PROJECT_ID` int(11) DEFAULT NULL,
  `RAB_NAMA` varchar(500) DEFAULT NULL,
  `RAB_KODE` varchar(2000) DEFAULT NULL,
  `RAP_KODE` varchar(2000) DEFAULT NULL,
  `RAB_MATERIAL` varchar(100) DEFAULT NULL,
  `RAB_UPAH` varchar(100) DEFAULT NULL,
  `RAB_TOTAL` varchar(100) DEFAULT NULL,
  `RAB_AFTER_OVERHEAD` varchar(100) DEFAULT NULL,
  `RAB_ACTIVE` int(11) DEFAULT NULL,
  `RAB_CREATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ESTIMASI_UMUR_BANGUNAN` int(11) DEFAULT NULL,
  `ESTIMASI_JUMLAH_ORANG` int(11) DEFAULT NULL,
  `ESTIMASI_CUACA` int(11) DEFAULT NULL,
  `ESTIMASI_TOTAL_WAKTU` int(11) DEFAULT NULL,
  `LOKASI_UPAH_ID` int(11) DEFAULT NULL,
  `LUAS_BANGUNAN` varchar(100) DEFAULT NULL,
  `VALIDASI_COUNTER` int(11) DEFAULT '0',
  PRIMARY KEY (`RAB_ID`),
  KEY `FK_ESTIMATOR` (`ESTIMATOR_ID`),
  KEY `FK_RELATIONSHIP_24` (`RAB_STATUS_APPROVAL_ID`),
  KEY `FK_PROJECT` (`PROJECT_ID`),
  KEY `FK_VALIDATOR_RAB` (`VALIDATOR_ID`),
  KEY `FK_rab_lokasi` (`LOKASI_UPAH_ID`),
  CONSTRAINT `FK_ESTIMATOR` FOREIGN KEY (`ESTIMATOR_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`),
  CONSTRAINT `FK_rab_lokasi` FOREIGN KEY (`LOKASI_UPAH_ID`) REFERENCES `lokasi_upah` (`LOKASI_UPAH_ID`),
  CONSTRAINT `FK_RELATIONSHIP_24` FOREIGN KEY (`RAB_STATUS_APPROVAL_ID`) REFERENCES `rab_status_approval` (`RAB_STATUS_APPROVAL_ID`),
  CONSTRAINT `FK_VALIDATOR_RAB` FOREIGN KEY (`VALIDATOR_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.rab_transaction: ~4 rows (approximately)
DELETE FROM `rab_transaction`;
/*!40000 ALTER TABLE `rab_transaction` DISABLE KEYS */;
INSERT INTO `rab_transaction` (`RAB_ID`, `RAB_STATUS_APPROVAL_ID`, `ESTIMATOR_ID`, `VALIDATOR_ID`, `PROJECT_ID`, `RAB_NAMA`, `RAB_KODE`, `RAP_KODE`, `RAB_MATERIAL`, `RAB_UPAH`, `RAB_TOTAL`, `RAB_AFTER_OVERHEAD`, `RAB_ACTIVE`, `RAB_CREATE`, `ESTIMASI_UMUR_BANGUNAN`, `ESTIMASI_JUMLAH_ORANG`, `ESTIMASI_CUACA`, `ESTIMASI_TOTAL_WAKTU`, `LOKASI_UPAH_ID`, `LUAS_BANGUNAN`, `VALIDASI_COUNTER`) VALUES
	(1, 3, 4, NULL, 2, 'RAB_Coba_proyek_1', '001/RAB/PRO00002/IV/2015', NULL, '5587937.5', '1784625', '7372562.5', '7741190.625', 1, '2015-04-22 22:05:52', NULL, NULL, NULL, NULL, 1, '100', 3),
	(2, 4, 4, NULL, 3, 'RAB_PEMBANGUNAN_WAHANA_TORNADO_1', '001/RAB/PRO00003/IV/2015', NULL, '36947505', '7307050', '64182091', '67391195.55', 1, '2015-04-22 22:18:51', 10, 15, 10, 40, 1, '100', 1),
	(3, 1, 5, NULL, 4, 'RAB_PEMBANGUNAN_PAGAR_1', '001/RAB/PRO00004/IV/2015', NULL, '116189000', '65895000', '182084000', '191188200', 1, '2015-04-22 10:40:00', 5, 13, 2, 78, 1, '200', 0),
	(4, 1, 6, NULL, 5, 'RAB_PEMBANGUNAN_KANTOR_INDUK_1', '001/RAB/PRO00005/IV/2015', NULL, '6573000', '8428750', '15001750', '15751837.5', 1, '2015-04-22 10:40:02', NULL, NULL, NULL, NULL, 1, '50', 0);
/*!40000 ALTER TABLE `rab_transaction` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `ROLE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ROLE_NAMA` varchar(1000) DEFAULT NULL,
  `ROLE_ACTIVE` int(1) DEFAULT '1',
  PRIMARY KEY (`ROLE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.roles: ~11 rows (approximately)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`ROLE_ID`, `ROLE_NAMA`, `ROLE_ACTIVE`) VALUES
	(1, 'Administrator', 1),
	(2, 'Manajer', 0),
	(3, 'Operator', 0),
	(4, 'Supervisor', 0),
	(5, 'Operator LPB', 0),
	(6, 'Operator Barang', 1),
	(7, 'Validator Barang dan Upah', 1),
	(8, 'Operator Upah', 1),
	(9, 'Estimator', 1),
	(10, 'Validator RAB', 1),
	(11, 'Project Manager', 1);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.satuan_barang
CREATE TABLE IF NOT EXISTS `satuan_barang` (
  `SATUAN_NAMA` varchar(100) NOT NULL,
  PRIMARY KEY (`SATUAN_NAMA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.satuan_barang: ~37 rows (approximately)
DELETE FROM `satuan_barang`;
/*!40000 ALTER TABLE `satuan_barang` DISABLE KEYS */;
INSERT INTO `satuan_barang` (`SATUAN_NAMA`) VALUES
	('Ball'),
	('Bh'),
	('Bj'),
	('Bks'),
	('Box'),
	('Btg'),
	('Btl'),
	('Buah'),
	('Can'),
	('Daun'),
	('Doz'),
	('Drm'),
	('Dus'),
	('Gln'),
	('Jam'),
	('Jrg'),
	('Kg'),
	('Klg'),
	('Ktg'),
	('Lbr'),
	('Lbs'),
	('Ljr'),
	('Ls'),
	('Ltr'),
	('M'),
	('M\''),
	('M2'),
	('M3'),
	('Pack'),
	('Pail'),
	('Pcs'),
	('Psg'),
	('Roll'),
	('Sak'),
	('Set'),
	('Tbg'),
	('Unit');
/*!40000 ALTER TABLE `satuan_barang` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.satuan_upah
CREATE TABLE IF NOT EXISTS `satuan_upah` (
  `SATUAN_UPAH_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SATUAN_UPAH_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`SATUAN_UPAH_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.satuan_upah: ~5 rows (approximately)
DELETE FROM `satuan_upah`;
/*!40000 ALTER TABLE `satuan_upah` DISABLE KEYS */;
INSERT INTO `satuan_upah` (`SATUAN_UPAH_ID`, `SATUAN_UPAH_NAMA`) VALUES
	(1, '1 ORANG/HR/8 JAM'),
	(2, 'M'),
	(3, 'M2'),
	(4, 'M3'),
	(5, 'Kg');
/*!40000 ALTER TABLE `satuan_upah` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.status_bpm
CREATE TABLE IF NOT EXISTS `status_bpm` (
  `STATUS_BPM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `STATUS_BPM_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`STATUS_BPM_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.status_bpm: ~3 rows (approximately)
DELETE FROM `status_bpm`;
/*!40000 ALTER TABLE `status_bpm` DISABLE KEYS */;
INSERT INTO `status_bpm` (`STATUS_BPM_ID`, `STATUS_BPM_NAMA`) VALUES
	(1, 'Draft'),
	(2, 'On Validation'),
	(3, 'Validated');
/*!40000 ALTER TABLE `status_bpm` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.status_lpb
CREATE TABLE IF NOT EXISTS `status_lpb` (
  `STATUS_LPB_ID` int(11) NOT NULL AUTO_INCREMENT,
  `STATUS_LPB_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`STATUS_LPB_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.status_lpb: ~6 rows (approximately)
DELETE FROM `status_lpb`;
/*!40000 ALTER TABLE `status_lpb` DISABLE KEYS */;
INSERT INTO `status_lpb` (`STATUS_LPB_ID`, `STATUS_LPB_NAMA`) VALUES
	(1, 'Draft'),
	(2, 'Waiting Validation'),
	(3, 'Validated'),
	(4, 'Rejected'),
	(5, 'Waiting for updated validation'),
	(6, 'Update Rejected');
/*!40000 ALTER TABLE `status_lpb` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.status_pk
CREATE TABLE IF NOT EXISTS `status_pk` (
  `STATUS_PK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `STATUS_PK_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`STATUS_PK_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.status_pk: ~3 rows (approximately)
DELETE FROM `status_pk`;
/*!40000 ALTER TABLE `status_pk` DISABLE KEYS */;
INSERT INTO `status_pk` (`STATUS_PK_ID`, `STATUS_PK_NAMA`) VALUES
	(1, 'Draft'),
	(2, 'On Validation'),
	(3, 'Validated');
/*!40000 ALTER TABLE `status_pk` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.status_po
CREATE TABLE IF NOT EXISTS `status_po` (
  `STATUS_PO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `STATUS_PO_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`STATUS_PO_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.status_po: ~3 rows (approximately)
DELETE FROM `status_po`;
/*!40000 ALTER TABLE `status_po` DISABLE KEYS */;
INSERT INTO `status_po` (`STATUS_PO_ID`, `STATUS_PO_NAMA`) VALUES
	(1, 'Draft'),
	(2, 'On Validation'),
	(3, 'Validated');
/*!40000 ALTER TABLE `status_po` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.status_pp
CREATE TABLE IF NOT EXISTS `status_pp` (
  `STATUS_PP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `STATUS_PP_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`STATUS_PP_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.status_pp: ~3 rows (approximately)
DELETE FROM `status_pp`;
/*!40000 ALTER TABLE `status_pp` DISABLE KEYS */;
INSERT INTO `status_pp` (`STATUS_PP_ID`, `STATUS_PP_NAMA`) VALUES
	(1, 'Draft'),
	(2, 'On Validation'),
	(3, 'Validated');
/*!40000 ALTER TABLE `status_pp` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.status_project
CREATE TABLE IF NOT EXISTS `status_project` (
  `STATUS_PROJECT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `STATUS_PROJECT_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`STATUS_PROJECT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.status_project: ~5 rows (approximately)
DELETE FROM `status_project`;
/*!40000 ALTER TABLE `status_project` DISABLE KEYS */;
INSERT INTO `status_project` (`STATUS_PROJECT_ID`, `STATUS_PROJECT_NAMA`) VALUES
	(1, 'Perencanaan'),
	(2, 'Siap Jalan'),
	(3, 'Berjalan'),
	(4, 'Selesai'),
	(5, 'Pending');
/*!40000 ALTER TABLE `status_project` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.status_validasi
CREATE TABLE IF NOT EXISTS `status_validasi` (
  `STATUS_VALIDASI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `STATUS_VALIDASI_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`STATUS_VALIDASI_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.status_validasi: ~6 rows (approximately)
DELETE FROM `status_validasi`;
/*!40000 ALTER TABLE `status_validasi` DISABLE KEYS */;
INSERT INTO `status_validasi` (`STATUS_VALIDASI_ID`, `STATUS_VALIDASI_NAMA`) VALUES
	(1, 'Draft'),
	(2, 'Waiting for validation'),
	(3, 'Validated'),
	(4, 'Rejected'),
	(5, 'Waiting for updated validation'),
	(6, 'Update rejected');
/*!40000 ALTER TABLE `status_validasi` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.stok
CREATE TABLE IF NOT EXISTS `stok` (
  `RAB_ID` int(11) NOT NULL,
  `BARANG_ID` int(11) NOT NULL,
  `VOLUME` varchar(100) NOT NULL,
  `GUDANG_ID` int(11) NOT NULL,
  PRIMARY KEY (`RAB_ID`,`BARANG_ID`,`GUDANG_ID`),
  KEY `FK_BARANG_ID` (`BARANG_ID`),
  KEY `FK_GUDANG` (`GUDANG_ID`),
  CONSTRAINT `FK_BARANG_ID` FOREIGN KEY (`BARANG_ID`) REFERENCES `master_barang` (`BARANG_ID`),
  CONSTRAINT `FK_GUDANG` FOREIGN KEY (`GUDANG_ID`) REFERENCES `master_gudang` (`GUDANG_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Berisi data-data items dari stok barang RAB.\r\n';

-- Dumping data for table kztszete_pm.stok: ~0 rows (approximately)
DELETE FROM `stok`;
/*!40000 ALTER TABLE `stok` DISABLE KEYS */;
/*!40000 ALTER TABLE `stok` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.subcon
CREATE TABLE IF NOT EXISTS `subcon` (
  `SUBCON_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SATUAN_NAMA` varchar(100) DEFAULT NULL,
  `SUBCON_NAMA` varchar(1000) DEFAULT NULL,
  `SUBCON_HARGA` varchar(100) DEFAULT NULL,
  `SUBCON_KETERANGAN` text,
  PRIMARY KEY (`SUBCON_ID`),
  KEY `FK_RELATIONSHIP_22` (`SATUAN_NAMA`),
  CONSTRAINT `FK_RELATIONSHIP_22` FOREIGN KEY (`SATUAN_NAMA`) REFERENCES `satuan_barang` (`SATUAN_NAMA`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.subcon: ~5 rows (approximately)
DELETE FROM `subcon`;
/*!40000 ALTER TABLE `subcon` DISABLE KEYS */;
INSERT INTO `subcon` (`SUBCON_ID`, `SATUAN_NAMA`, `SUBCON_NAMA`, `SUBCON_HARGA`, `SUBCON_KETERANGAN`) VALUES
	(9, 'Ball', 'Sewa Listrik dan Penerangan', '1000000', NULL),
	(10, 'M3', 'Pembersihan Awal & Akhir Proyek', '1500000', NULL),
	(11, 'Set', 'Sewa Alat Gali', '500000', NULL),
	(12, 'M3', 'Pembersihan Awal & Akhir Proyek', '1500000', NULL),
	(13, 'M3', 'Pembersihan Awal & Akhir Proyek', '1500000', NULL);
/*!40000 ALTER TABLE `subcon` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.top
CREATE TABLE IF NOT EXISTS `top` (
  `TOP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TOP_KODE` varchar(100) DEFAULT NULL,
  `TOP_VALUE` int(11) DEFAULT NULL,
  `TOP_DESCRIPTION` text,
  `TOP_ACTIVE` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`TOP_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.top: ~3 rows (approximately)
DELETE FROM `top`;
/*!40000 ALTER TABLE `top` DISABLE KEYS */;
INSERT INTO `top` (`TOP_ID`, `TOP_KODE`, `TOP_VALUE`, `TOP_DESCRIPTION`, `TOP_ACTIVE`) VALUES
	(14, '1D', 1, '1 Hari', 1),
	(15, '3D', 3, '3 Hari', 1),
	(16, '7D', 7, '7 Hari', 1);
/*!40000 ALTER TABLE `top` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.tugasxpengguna
CREATE TABLE IF NOT EXISTS `tugasxpengguna` (
  `PENGGUNA_ID` int(11) NOT NULL,
  `PENUGASAN_ID` int(11) NOT NULL,
  PRIMARY KEY (`PENGGUNA_ID`,`PENUGASAN_ID`),
  KEY `fk_2penugasan` (`PENUGASAN_ID`),
  CONSTRAINT `fk_1` FOREIGN KEY (`PENGGUNA_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`),
  CONSTRAINT `fk_2penugasan` FOREIGN KEY (`PENUGASAN_ID`) REFERENCES `penugasan` (`PENUGASAN_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.tugasxpengguna: ~0 rows (approximately)
DELETE FROM `tugasxpengguna`;
/*!40000 ALTER TABLE `tugasxpengguna` DISABLE KEYS */;
/*!40000 ALTER TABLE `tugasxpengguna` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.validasi
CREATE TABLE IF NOT EXISTS `validasi` (
  `MODULE_ID` int(11) NOT NULL,
  `PENGGUNA_ID` int(11) NOT NULL,
  `VALIDASI_TANGGAL` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`MODULE_ID`,`PENGGUNA_ID`),
  KEY `FK_RELATIONSHIP_29` (`PENGGUNA_ID`),
  CONSTRAINT `FK_RELATIONSHIP_29` FOREIGN KEY (`PENGGUNA_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.validasi: ~0 rows (approximately)
DELETE FROM `validasi`;
/*!40000 ALTER TABLE `validasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `validasi` ENABLE KEYS */;


-- Dumping structure for view kztszete_pm.view_analisa_volume
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_analisa_volume` (
	`RAB_ID` INT(11) NOT NULL,
	`ANALISA_ID` INT(11) NULL,
	`VOLUME` DOUBLE NULL
) ENGINE=MyISAM;


-- Dumping structure for table kztszete_pm.view_enroll_user
CREATE TABLE IF NOT EXISTS `view_enroll_user` (
  `PROJECT_ID` int(11) NOT NULL,
  `PENGGUNA_ID` int(11) NOT NULL,
  `PENUGASAN_ID` int(11) NOT NULL,
  `TANGGAL_ENROLL` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `PENGGUNA_NAMA` varchar(1000) DEFAULT NULL,
  `DEPARTEMEN_ID` int(11) DEFAULT NULL,
  `PENGGUNA_ACTIVE` int(11) DEFAULT NULL,
  `PENUGASAN_NAMA` longtext,
  `PROJECT_NAMA` varchar(1000) DEFAULT NULL,
  `PROJECT_KODE` varchar(1000) DEFAULT NULL,
  `PROJECT_ACTIVE` int(11) DEFAULT NULL,
  `PROJECT_DESCRIPTION` text,
  `PROJECT_STATUS` int(11) DEFAULT NULL,
  `PROJECT_CREATE` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.view_enroll_user: 0 rows
DELETE FROM `view_enroll_user`;
/*!40000 ALTER TABLE `view_enroll_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `view_enroll_user` ENABLE KEYS */;


-- Dumping structure for view kztszete_pm.view_overhead_bahan
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_overhead_bahan` (
	`RAB_ID` INT(11) NULL,
	`KATEGORI_OVERHEAD` VARCHAR(17) NOT NULL COLLATE 'utf8mb4_general_ci',
	`DETAIL_OVERHEAD_ID` INT(11) NOT NULL,
	`OVERHEAD_MATERIAL_ID` INT(11) NULL,
	`OVERHEAD_MATERIAL_KODE` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`OVERHEAD_MATERIAL_NAMA` VARCHAR(1000) NULL COLLATE 'latin1_swedish_ci',
	`OVERHEAD_ID` INT(11) NULL,
	`VOLUME_SISA` DOUBLE NULL,
	`TOTAL_VOLUME` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`HARGA_SATUAN` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`TOTAL_HARGA` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`SATUAN_NAMA` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`OVERHEAD_KODE` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`OVERHEAD_NAMA` VARCHAR(500) NULL COLLATE 'latin1_swedish_ci',
	`OVERHEAD_TIPE` VARCHAR(10) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for table kztszete_pm.view_overhead_material
CREATE TABLE IF NOT EXISTS `view_overhead_material` (
  `RAB_ID` int(11) DEFAULT NULL,
  `KATEGORI_OVERHEAD` varchar(17) CHARACTER SET utf8mb4 NOT NULL DEFAULT '',
  `DETAIL_OVERHEAD_ID` int(11) NOT NULL DEFAULT '0',
  `OVERHEAD_MATERIAL_ID` int(11) DEFAULT NULL,
  `OVERHEAD_MATERIAL_KODE` varchar(100) DEFAULT NULL,
  `OVERHEAD_MATERIAL_NAMA` varchar(1000) DEFAULT NULL,
  `OVERHEAD_ID` int(11) DEFAULT NULL,
  `VOLUME_SISA` double DEFAULT NULL,
  `TOTAL_VOLUME` varchar(100) DEFAULT NULL,
  `HARGA_SATUAN` varchar(100) DEFAULT NULL,
  `TOTAL_HARGA` varchar(100) DEFAULT NULL,
  `SATUAN_NAMA` varchar(100) DEFAULT NULL,
  `OVERHEAD_KODE` varchar(50) DEFAULT NULL,
  `OVERHEAD_NAMA` varchar(500) DEFAULT NULL,
  `OVERHEAD_TIPE` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.view_overhead_material: 0 rows
DELETE FROM `view_overhead_material`;
/*!40000 ALTER TABLE `view_overhead_material` DISABLE KEYS */;
/*!40000 ALTER TABLE `view_overhead_material` ENABLE KEYS */;


-- Dumping structure for view kztszete_pm.view_overhead_paket_bahan
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_overhead_paket_bahan` (
	`RAB_ID` INT(11) NULL,
	`KATEGORI_OVERHEAD` VARCHAR(23) NOT NULL COLLATE 'utf8mb4_general_ci',
	`DETAIL_OVERHEAD_ID` INT(11) NOT NULL,
	`OVERHEAD_MATERIAL_ID` INT(11) NOT NULL,
	`OVERHEAD_MATERIAL_KODE` VARCHAR(2) NOT NULL COLLATE 'utf8mb4_general_ci',
	`OVERHEAD_MATERIAL_NAMA` VARCHAR(1000) NULL COLLATE 'latin1_swedish_ci',
	`OVERHEAD_ID` INT(11) NULL,
	`VOLUME_SISA` DOUBLE NULL,
	`TOTAL_VOLUME` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`HARGA_SATUAN` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`TOTAL_HARGA` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`SATUAN_NAMA` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`OVERHEAD_KODE` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`OVERHEAD_NAMA` VARCHAR(500) NULL COLLATE 'latin1_swedish_ci',
	`OVERHEAD_TIPE` VARCHAR(10) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for table kztszete_pm.view_overhead_paket_material
CREATE TABLE IF NOT EXISTS `view_overhead_paket_material` (
  `RAB_ID` int(11) DEFAULT NULL,
  `KATEGORI_OVERHEAD` varchar(23) CHARACTER SET utf8mb4 NOT NULL DEFAULT '',
  `DETAIL_OVERHEAD_ID` int(11) NOT NULL DEFAULT '0',
  `OVERHEAD_MATERIAL_ID` int(11) NOT NULL DEFAULT '0',
  `OVERHEAD_MATERIAL_KODE` varchar(2) CHARACTER SET utf8mb4 NOT NULL DEFAULT '',
  `OVERHEAD_MATERIAL_NAMA` varchar(1000) DEFAULT NULL,
  `OVERHEAD_ID` int(11) DEFAULT NULL,
  `VOLUME_SISA` double DEFAULT NULL,
  `TOTAL_VOLUME` varchar(100) DEFAULT NULL,
  `HARGA_SATUAN` varchar(100) DEFAULT NULL,
  `TOTAL_HARGA` varchar(100) DEFAULT NULL,
  `SATUAN_NAMA` varchar(100) DEFAULT NULL,
  `OVERHEAD_KODE` varchar(50) DEFAULT NULL,
  `OVERHEAD_NAMA` varchar(500) DEFAULT NULL,
  `OVERHEAD_TIPE` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.view_overhead_paket_material: 0 rows
DELETE FROM `view_overhead_paket_material`;
/*!40000 ALTER TABLE `view_overhead_paket_material` DISABLE KEYS */;
/*!40000 ALTER TABLE `view_overhead_paket_material` ENABLE KEYS */;


-- Dumping structure for view kztszete_pm.view_pk
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_pk` (
	`RAB_ID` INT(11) NULL,
	`RAB_KODE` VARCHAR(2000) NULL COLLATE 'latin1_swedish_ci',
	`RAB_TOTAL` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`RAB_AFTER_OVERHEAD` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`PK_ID` INT(11) NOT NULL,
	`PK_KODE` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`PK_TANGGAL` TIMESTAMP NOT NULL,
	`STATUS_PK_ID` INT(11) NULL,
	`STATUS_PK_NAMA` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`KATEGORI_PK_ID` INT(11) NULL,
	`KATEGORI_PK_NAMA` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`PETUGAS_ID` INT(11) NULL,
	`PETUGAS_NAMA` VARCHAR(1000) NULL COLLATE 'latin1_swedish_ci',
	`VALIDATOR_ID` INT(11) NULL,
	`VALIDATOR_NAMA` VARCHAR(1000) NULL COLLATE 'latin1_swedish_ci',
	`VOLUME_PK` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`TOTAL` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`ANALISA_ID` INT(11) NULL,
	`ANALISA_KODE` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`ANALISA_NAMA` VARCHAR(1000) NULL COLLATE 'latin1_swedish_ci',
	`SATUAN` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`VOLUME` DOUBLE NULL,
	`HARGA_SATUAN` DOUBLE NULL
) ENGINE=MyISAM;


-- Dumping structure for view kztszete_pm.view_pk_rap
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_pk_rap` (
	`RAB_ID` INT(11) NULL,
	`RAB_KODE` VARCHAR(2000) NULL COLLATE 'latin1_swedish_ci',
	`RAB_NAMA` VARCHAR(500) NULL COLLATE 'latin1_swedish_ci',
	`RAB_TOTAL` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`RAB_AFTER_OVERHEAD` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`ANALISA_ID` INT(11) NOT NULL,
	`ANALISA_NAMA` VARCHAR(1000) NULL COLLATE 'latin1_swedish_ci',
	`SATUAN_NAMA` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`KATEGORI_ANALISA_ID` INT(11) NULL,
	`LOKASI_UPAH_ID` INT(11) NULL,
	`ANALISA_KODE` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`ANALISA_ACTIVE` INT(11) NULL,
	`DETAIL_PEKERJAAN_TOTAL` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`ANALISA_VOLUME` DOUBLE NULL,
	`ANALISA_VOLUME_SISA` DOUBLE NULL,
	`UPAH_ANALISA_HARGA` DOUBLE NULL
) ENGINE=MyISAM;


-- Dumping structure for view kztszete_pm.view_pp
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_pp` (
	`PERMINTAAN_PEMBELIAN_ID` INT(11) NOT NULL,
	`PERMINTAAN_PEMBELIAN_KODE` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`PERMINTAAN_PEMBELIAN_TANGGAL` TIMESTAMP NOT NULL,
	`VALIDATOR_ID` INT(11) NULL,
	`VALIDATOR_NAMA` VARCHAR(1000) NULL COLLATE 'latin1_swedish_ci',
	`STATUS_PP_ID` INT(11) NULL,
	`STATUS_PP_NAMA` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`PETUGAS_ID` INT(11) NULL,
	`PETUGAS_NAMA` VARCHAR(1000) NULL COLLATE 'latin1_swedish_ci',
	`PROJECT_KODE` VARCHAR(1000) NULL COLLATE 'latin1_swedish_ci',
	`PROJECT_ID` INT(11) NULL,
	`PROJECT_NAMA` VARCHAR(1000) NULL COLLATE 'latin1_swedish_ci',
	`PROJECT_ACTIVE` INT(11) NULL,
	`RAB_ID` INT(11) NULL,
	`RAB_NAMA` VARCHAR(500) NULL COLLATE 'latin1_swedish_ci',
	`RAB_TOTAL` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`RAB_AFTER_OVERHEAD` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`RAB_ACTIVE` INT(11) NULL,
	`KATEGORI_PP_ID` INT(11) NULL,
	`KATEGORI_PP_NAMA` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`BARANG_ID` INT(11) NULL,
	`SUBCON_ID` INT(11) NULL,
	`VOLUME_PP` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`BARANG_NAMA` TEXT NULL COLLATE 'latin1_swedish_ci',
	`BARANG_HARGA` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`BARANG_KODE` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`SATUAN_NAMA` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`KATEGORI_BARANG_ID` INT(11) NULL,
	`KATEGORI_BARANG_NAMA` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`GUDANG_ID` INT(11) NULL,
	`GUDANG_NAMA` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`GUDANG_ACTIVE` INT(11) NULL
) ENGINE=MyISAM;


-- Dumping structure for view kztszete_pm.view_rap
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_rap` (
	`RAB_ID` INT(11) NULL,
	`RAB_KODE` VARCHAR(2000) NULL COLLATE 'latin1_swedish_ci',
	`BARANG_ID` INT(11) NOT NULL,
	`KATEGORI_BARANG_ID` INT(11) NULL,
	`SATUAN_NAMA` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`BARANG_KODE` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`BARANG_NAMA` VARCHAR(1000) NULL COLLATE 'latin1_swedish_ci',
	`BARANG_KETERANGAN` TEXT NULL COLLATE 'latin1_swedish_ci',
	`BARANG_HARGA` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`BARANG_HARGA_TEMP` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`BARANG_ACTIVE` INT(11) NULL,
	`BARANG_VOLUME_TERPAKAI` DOUBLE NULL,
	`BARANG_VOLUME` DOUBLE NULL,
	`KATEGORI_BARANG_NAMA` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view kztszete_pm.view_subcon
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_subcon` (
	`RAB_KODE` VARCHAR(2000) NULL COLLATE 'latin1_swedish_ci',
	`RAB_NAMA` VARCHAR(500) NULL COLLATE 'latin1_swedish_ci',
	`RAB_MATERIAL` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`KATEGORI_PEKERJAAN_ID` INT(11) NULL,
	`ANALISA_ID` INT(11) NULL,
	`RAB_ID` INT(11) NULL,
	`SUBCON_ID` INT(11) NULL,
	`DETAIL_PEKERJAAN_VOLUME` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`DETAIL_PEKERJAAN_TOTAL` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`DETAIL_PEKERJAAN_URUTAN` INT(11) NULL,
	`SUBCON_NAMA` VARCHAR(1000) NULL COLLATE 'latin1_swedish_ci',
	`SATUAN_NAMA` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`VOLUME_SISA` DOUBLE NULL,
	`DETAIL_PEKERJAAN_HARGA` DOUBLE NULL
) ENGINE=MyISAM;


-- Dumping structure for trigger kztszete_pm.bpm_before_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='';
DELIMITER //
CREATE TRIGGER `bpm_before_insert` BEFORE INSERT ON `bpm` FOR EACH ROW BEGIN
  declare incre int default 0;
  declare kode varchar(50) default 'BPM';
  declare kodePro varchar(50) default '';
  declare bulan varchar(50) default '';
  declare tahun varchar(50) default '';
  
  select COALESCE(MAX(CAST(substring(BPM_KODE,1,3) AS UNSIGNED)),0) into incre from bpm where month(BPM_TANGGAL) = month(now()) and PROJECT_ID = NEW.PROJECT_ID ;
  set  incre= incre+1;
  select PROJECT_KODE into kodePro from project where PROJECT_ID=NEW.PROJECT_ID;
  select month(now()) into bulan;

  CASE bulan 
  	when 1 then SET bulan = 'I';
  	when 2 then SET bulan = 'II';
  	when 3 then SET bulan = 'III';
  	when 4 then SET bulan = 'IV';
  	when 5 then SET bulan = 'V';
  	when 6 then SET bulan = 'VI';
  	when 7 then SET bulan = 'VII';
  	when 8 then SET bulan = 'VIII';
  	when 9 then SET bulan = 'IX';
  	when 10 then SET bulan = 'X';
  	when 11 then SET bulan = 'XI';
  	when 12 then SET bulan = 'XII';
  	else SET bulan = 0;
  END CASE;
  
  select year(now()) into tahun;
  
  set NEW.BPM_KODE = CONCAT(LPAD(incre,3,0),'/',kode,'/',kodePro,'/',bulan,'/',tahun);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Dumping structure for trigger kztszete_pm.hutang_barang_before_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='';
DELIMITER //
CREATE TRIGGER `hutang_barang_before_insert` BEFORE INSERT ON `hutang_barang` FOR EACH ROW BEGIN
  declare incre int default 0;
  declare kode varchar(50) default 'HM';
  declare kodePro varchar(50) default '';
  declare bulan varchar(50) default '';
  declare tahun varchar(50) default '';
  
 
  select COALESCE(MAX(CAST(substring(HUTANG_BARANG_KODE,1,3) AS UNSIGNED)),0) into incre from hutang_barang where month(TANGGAL_TRANSAKSI_HM) = month(now()) ;
  set  incre= incre+1;
  
--    select REPLACE(RAB_NAMA,' ','_') into kodePro from rab_transaction where RAB_ID = NEW.RAB_ID;
  select month(now()) into bulan;

  CASE bulan 
  	when 1 then SET bulan = 'I';
  	when 2 then SET bulan = 'II';
  	when 3 then SET bulan = 'III';
  	when 4 then SET bulan = 'IV';
  	when 5 then SET bulan = 'V';
  	when 6 then SET bulan = 'VI';
  	when 7 then SET bulan = 'VII';
  	when 8 then SET bulan = 'VIII';
  	when 9 then SET bulan = 'IX';
  	when 10 then SET bulan = 'X';
  	when 11 then SET bulan = 'XI';
  	when 12 then SET bulan = 'XII';
  	else SET bulan = 0;
  END CASE;
  
  select year(now()) into tahun;
  
  set NEW.HUTANG_BARANG_KODE = CONCAT(LPAD(incre,3,0),'/',kode,'/',bulan,'/',tahun);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Dumping structure for trigger kztszete_pm.kembali_barang_before_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='';
DELIMITER //
CREATE TRIGGER `kembali_barang_before_insert` BEFORE INSERT ON `kembali_barang` FOR EACH ROW BEGIN
  declare incre int default 0;
  declare kode varchar(50) default 'KM';
  declare kodePro varchar(50) default '';
  declare bulan varchar(50) default '';
  declare tahun varchar(50) default '';
  
 
  select COALESCE(MAX(CAST(substring(KEMBALI_BARANG_KODE,1,3) AS UNSIGNED)),0) into incre from kembali_barang where month(TANGGAL_TRANSAKSI) = month(now()) ;
  set  incre= incre+1;
  
--    select REPLACE(RAB_NAMA,' ','_') into kodePro from rab_transaction where RAB_ID = NEW.RAB_ID;
  select month(now()) into bulan;

  CASE bulan 
  	when 1 then SET bulan = 'I';
  	when 2 then SET bulan = 'II';
  	when 3 then SET bulan = 'III';
  	when 4 then SET bulan = 'IV';
  	when 5 then SET bulan = 'V';
  	when 6 then SET bulan = 'VI';
  	when 7 then SET bulan = 'VII';
  	when 8 then SET bulan = 'VIII';
  	when 9 then SET bulan = 'IX';
  	when 10 then SET bulan = 'X';
  	when 11 then SET bulan = 'XI';
  	when 12 then SET bulan = 'XII';
  	else SET bulan = 0;
  END CASE;
  
  select year(now()) into tahun;
  
  set NEW.KEMBALI_BARANG_KODE = CONCAT(LPAD(incre,3,0),'/',kode,'/',bulan,'/',tahun);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Dumping structure for trigger kztszete_pm.main_project_before_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='';
DELIMITER //
CREATE TRIGGER `main_project_before_insert` BEFORE INSERT ON `main_project` FOR EACH ROW BEGIN
 declare datas int default 0;

  SELECT `AUTO_INCREMENT` into datas FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'kztszete_pm' AND   TABLE_NAME   = 'main_project';
 set NEW.MAIN_PROJECT_KODE = CONCAT("MPRO",LPAD(datas,5,0));
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Dumping structure for trigger kztszete_pm.master_barang_before_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='';
DELIMITER //
CREATE TRIGGER `master_barang_before_insert` BEFORE INSERT ON `master_barang` FOR EACH ROW BEGIN
declare datas int default 0;

 SELECT `AUTO_INCREMENT` into datas FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'kztszete_pm' AND   TABLE_NAME   = 'master_barang';
 set NEW.BARANG_KODE = CONCAT("MAT",LPAD(datas,6,0));
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Dumping structure for trigger kztszete_pm.master_gudang_before_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='';
DELIMITER //
CREATE TRIGGER `master_gudang_before_insert` BEFORE INSERT ON `master_gudang` FOR EACH ROW BEGIN
  declare datas int default 0;

 SELECT `AUTO_INCREMENT` into datas FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'kztszete_pm' AND   TABLE_NAME   = 'master_gudang';
 set NEW.GUDANG_KODE = CONCAT("GUD",LPAD(datas,5,0));
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Dumping structure for trigger kztszete_pm.master_supplier_before_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='';
DELIMITER //
CREATE TRIGGER `master_supplier_before_insert` BEFORE INSERT ON `master_supplier` FOR EACH ROW BEGIN
 declare datas int default 0;

 SELECT `AUTO_INCREMENT` into datas FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'kztszete_pm' AND   TABLE_NAME   = 'master_supplier';
 set NEW.SUPPLIER_KODE = CONCAT("SUP",LPAD(datas,5,0));
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Dumping structure for trigger kztszete_pm.master_upah_before_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='';
DELIMITER //
CREATE TRIGGER `master_upah_before_insert` BEFORE INSERT ON `master_upah` FOR EACH ROW BEGIN
 declare datas int default 0;

 SELECT `AUTO_INCREMENT` into datas FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'kztszete_pm' AND   TABLE_NAME   = 'master_upah';
 set NEW.UPAH_KODE = CONCAT("UPH",LPAD(datas,4,0));
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Dumping structure for trigger kztszete_pm.opname_before_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='';
DELIMITER //
CREATE TRIGGER `opname_before_insert` BEFORE INSERT ON `opname` FOR EACH ROW BEGIN
  declare incre int default 0;
  declare kode varchar(50) default 'PP';
  declare kodePro varchar(50) default '';
  declare bulan varchar(50) default '';
  declare tahun varchar(50) default '';
  
  case NEW.KATEGORI_OP_ID
    when 1 then SET kode = 'OPOV';
    when 2 then SET kode = 'OP';
    else SET kode = 'undefined';
  END CASE;
  
  select COALESCE(MAX(CAST(substring(OPNAME_KODE,1,3) AS UNSIGNED)),0) into incre from opname where month(OPNAME_TANGGAL) = month(now()) and RAB_ID = NEW.RAB_ID;
  set  incre= incre+1;
  
    select REPLACE(RAB_NAMA,' ','_') into kodePro from rab_transaction where RAB_ID = NEW.RAB_ID;
  select month(now()) into bulan;

  CASE bulan 
  	when 1 then SET bulan = 'I';
  	when 2 then SET bulan = 'II';
  	when 3 then SET bulan = 'III';
  	when 4 then SET bulan = 'IV';
  	when 5 then SET bulan = 'V';
  	when 6 then SET bulan = 'VI';
  	when 7 then SET bulan = 'VII';
  	when 8 then SET bulan = 'VIII';
  	when 9 then SET bulan = 'IX';
  	when 10 then SET bulan = 'X';
  	when 11 then SET bulan = 'XI';
  	when 12 then SET bulan = 'XII';
  	else SET bulan = 0;
  END CASE;
  
  select year(now()) into tahun;
  
  set NEW.OPNAME_KODE = CONCAT(LPAD(incre,3,0),'/',kode,'/',kodePro,'/',bulan,'/',tahun);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Dumping structure for trigger kztszete_pm.overhead_before_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='';
DELIMITER //
CREATE TRIGGER `overhead_before_insert` BEFORE INSERT ON `overhead` FOR EACH ROW BEGIN
  declare incre int default 0;
  declare kode varchar(50) default 'MOV';
  declare kodePro varchar(50) default '';
  declare bulan varchar(50) default '';
  declare tahun varchar(50) default '';
  
  case NEW.OVERHEAD_TIPE 
    when 'upah' then SET kode = 'UOV';
    when 'barang' then SET kode = 'MOV';
    else SET kode = 'undefined';
  END CASE;
  
  select COALESCE(MAX(CAST(substring(OVERHEAD_KODE,1,3) AS UNSIGNED)),0) into incre from overhead where month(OVERHEAD_CREATE) = month(now()) and RAB_ID = NEW.RAB_ID;
  set  incre= incre+1;
  
  select REPLACE(RAB_NAMA,' ','_') into kodePro from rab_transaction where RAB_ID = NEW.RAB_ID;

  select month(now()) into bulan;

  CASE bulan 
  	when 1 then SET bulan = 'I';
  	when 2 then SET bulan = 'II';
  	when 3 then SET bulan = 'III';
  	when 4 then SET bulan = 'IV';
  	when 5 then SET bulan = 'V';
  	when 6 then SET bulan = 'VI';
  	when 7 then SET bulan = 'VII';
  	when 8 then SET bulan = 'VIII';
  	when 9 then SET bulan = 'IX';
  	when 10 then SET bulan = 'X';
  	when 11 then SET bulan = 'XI';
  	when 12 then SET bulan = 'XII';
  	else SET bulan = 0;
  END CASE;
  
  select year(now()) into tahun;
  
  set NEW.OVERHEAD_KODE = CONCAT(LPAD(incre,3,0),'/',kode,'/',kodePro,'/',bulan,'/',tahun);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Dumping structure for trigger kztszete_pm.penerimaan_barang_before_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='';
DELIMITER //
CREATE TRIGGER `penerimaan_barang_before_insert` BEFORE INSERT ON `penerimaan_barang` FOR EACH ROW BEGIN
  declare incre int default 0;
  declare kode varchar(50) default 'LPB';
  declare kodePro varchar(50) default '';
  declare bulan varchar(50) default '';
  declare tahun varchar(50) default '';
  
  
  
  select COALESCE(MAX(CAST(substring(PENERIMAAN_BARANG_KODE,1,5) AS UNSIGNED)),0) into incre from penerimaan_barang where month(PENERIMAAN_BARANG_TANGGAL) = month(now());
  set  incre= incre+1;
  
--  select GUDANG_KODE into kodePro from master_gudang where GUDANG_ID = 
  select month(now()) into bulan;

  CASE bulan 
  	when 1 then SET bulan = 'I';
  	when 2 then SET bulan = 'II';
  	when 3 then SET bulan = 'III';
  	when 4 then SET bulan = 'IV';
  	when 5 then SET bulan = 'V';
  	when 6 then SET bulan = 'VI';
  	when 7 then SET bulan = 'VII';
  	when 8 then SET bulan = 'VIII';
  	when 9 then SET bulan = 'IX';
  	when 10 then SET bulan = 'X';
  	when 11 then SET bulan = 'XI';
  	when 12 then SET bulan = 'XII';
  	else SET bulan = 0;
  END CASE;
  
  select year(now()) into tahun;
  
  set NEW.PENERIMAAN_BARANG_KODE = CONCAT(LPAD(incre,5,0),'/',kode,'/',bulan,'/',tahun);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Dumping structure for trigger kztszete_pm.permintaan_pekerjaan_before_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='';
DELIMITER //
CREATE TRIGGER `permintaan_pekerjaan_before_insert` BEFORE INSERT ON `permintaan_pekerjaan` FOR EACH ROW BEGIN
  declare incre int default 0;
  declare kode varchar(50) default 'Pk';
  declare kodePro varchar(50) default '';
  declare bulan varchar(50) default '';
  declare tahun varchar(50) default '';
  
  case NEW.KATEGORI_PK_ID
    when 1 then SET kode = 'PKOV';
    when 2 then SET kode = 'PK';
    else SET kode = 'undefined';
  END CASE;
  
  select COALESCE(MAX(CAST(substring(PERMINTAAN_PEKERJAAN_KODE,1,3) AS UNSIGNED)),0) into incre from permintaan_pekerjaan where month(PERMINTAAN_PEKERJAAN_TANGGAL) = month(now()) and RAB_ID = NEW.RAB_ID;
  set  incre= incre+1;
  
    select REPLACE(RAB_NAMA,' ','_') into kodePro from rab_transaction where RAB_ID = NEW.RAB_ID;
  select month(now()) into bulan;

  CASE bulan 
  	when 1 then SET bulan = 'I';
  	when 2 then SET bulan = 'II';
  	when 3 then SET bulan = 'III';
  	when 4 then SET bulan = 'IV';
  	when 5 then SET bulan = 'V';
  	when 6 then SET bulan = 'VI';
  	when 7 then SET bulan = 'VII';
  	when 8 then SET bulan = 'VIII';
  	when 9 then SET bulan = 'IX';
  	when 10 then SET bulan = 'X';
  	when 11 then SET bulan = 'XI';
  	when 12 then SET bulan = 'XII';
  	else SET bulan = 0;
  END CASE;
  
  select year(now()) into tahun;
  
  set NEW.PERMINTAAN_PEKERJAAN_KODE = CONCAT(LPAD(incre,3,0),'/',kode,'/',kodePro,'/',bulan,'/',tahun);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Dumping structure for trigger kztszete_pm.permintaan_pembelian_before_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='';
DELIMITER //
CREATE TRIGGER `permintaan_pembelian_before_insert` BEFORE INSERT ON `permintaan_pembelian` FOR EACH ROW BEGIN
  declare incre int default 0;
  declare kode varchar(50) default 'PP';
  declare kodePro varchar(50) default '';
  declare bulan varchar(50) default '';
  declare tahun varchar(50) default '';
  
  case NEW.KATEGORI_PP_ID
    when 1 then SET kode = 'PPOV';
    when 2 then SET kode = 'PP';
    else SET kode = 'undefined';
  END CASE;
  
  select COALESCE(MAX(CAST(substring(PERMINTAAN_PEMBELIAN_KODE,1,3) AS UNSIGNED)),0) into incre from permintaan_pembelian where month(PERMINTAAN_PEMBELIAN_TANGGAL) = month(now()) and RAB_ID = NEW.RAB_ID;
  set  incre= incre+1;
  
    select REPLACE(RAB_NAMA,' ','_') into kodePro from rab_transaction where RAB_ID = NEW.RAB_ID;
    
  select month(now()) into bulan;

  CASE bulan 
  	when 1 then SET bulan = 'I';
  	when 2 then SET bulan = 'II';
  	when 3 then SET bulan = 'III';
  	when 4 then SET bulan = 'IV';
  	when 5 then SET bulan = 'V';
  	when 6 then SET bulan = 'VI';
  	when 7 then SET bulan = 'VII';
  	when 8 then SET bulan = 'VIII';
  	when 9 then SET bulan = 'IX';
  	when 10 then SET bulan = 'X';
  	when 11 then SET bulan = 'XI';
  	when 12 then SET bulan = 'XII';
  	else SET bulan = 0;
  END CASE;
  
  select year(now()) into tahun;
  
  set NEW.PERMINTAAN_PEMBELIAN_KODE = CONCAT(LPAD(incre,3,0),'/',kode,'/',kodePro,'/',bulan,'/',tahun);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Dumping structure for trigger kztszete_pm.perusahaan_before_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='';
DELIMITER //
CREATE TRIGGER `perusahaan_before_insert` BEFORE INSERT ON `perusahaan` FOR EACH ROW BEGIN
 declare datas int default 0;

  SELECT `AUTO_INCREMENT` into datas FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'kztszete_pm' AND   TABLE_NAME   = 'perusahaan';
 set NEW.PERUSAHAAN_KODE = CONCAT("PERU",LPAD(datas,4,0));
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Dumping structure for trigger kztszete_pm.project_before_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='';
DELIMITER //
CREATE TRIGGER `project_before_insert` BEFORE INSERT ON `project` FOR EACH ROW BEGIN
declare datas int default 0;

 SELECT `AUTO_INCREMENT` into datas FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'kztszete_pm' AND   TABLE_NAME   = 'project';
 set NEW.PROJECT_KODE = CONCAT("PRO",LPAD(datas,5,0));
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Dumping structure for trigger kztszete_pm.purchase_order_before_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='';
DELIMITER //
CREATE TRIGGER `purchase_order_before_insert` BEFORE INSERT ON `purchase_order` FOR EACH ROW BEGIN
  declare incre int default 0;
  declare kode varchar(50) default 'PP';
  declare kodePro varchar(50) default '';
  declare bulan varchar(50) default '';
  declare tahun varchar(50) default '';
  
  case NEW.KATEGORI_PP_ID
    when 1 then SET kode = 'POOV';
    when 2 then SET kode = 'PO';
    else SET kode = 'undefined';
  END CASE;
  
  select COALESCE(MAX(CAST(substring(PURCHASE_ORDER_KODE,1,3) AS UNSIGNED)),0) into incre from purchase_order where month(PURCHASE_ORDER_TANGGAL) = month(now()) and RAB_ID = NEW.RAB_ID;
  set  incre= incre+1;
  
    select REPLACE(RAB_NAMA,' ','_') into kodePro from rab_transaction where RAB_ID = NEW.RAB_ID;
  select month(now()) into bulan;

  CASE bulan 
  	when 1 then SET bulan = 'I';
  	when 2 then SET bulan = 'II';
  	when 3 then SET bulan = 'III';
  	when 4 then SET bulan = 'IV';
  	when 5 then SET bulan = 'V';
  	when 6 then SET bulan = 'VI';
  	when 7 then SET bulan = 'VII';
  	when 8 then SET bulan = 'VIII';
  	when 9 then SET bulan = 'IX';
  	when 10 then SET bulan = 'X';
  	when 11 then SET bulan = 'XI';
  	when 12 then SET bulan = 'XII';
  	else SET bulan = 0;
  END CASE;
  
  select year(now()) into tahun;
  
  set NEW.PURCHASE_ORDER_KODE = CONCAT(LPAD(incre,3,0),'/',kode,'/',kodePro,'/',bulan,'/',tahun);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Dumping structure for trigger kztszete_pm.rab_transaction_before_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='';
DELIMITER //
CREATE TRIGGER `rab_transaction_before_insert` BEFORE INSERT ON `rab_transaction` FOR EACH ROW BEGIN
  declare incre int default 0;
  declare kode varchar(50) default 'RAB';
  declare kodePro varchar(50) default '';
  declare bulan varchar(50) default '';
  declare tahun varchar(50) default '';
  declare rabnm varchar(1000) default '';
  declare versirab int default '';
  
  select COALESCE(MAX(CAST(substring(rab.RAB_KODE,1,3) AS UNSIGNED)),0) into incre from rab_transaction rab, project p where rab.PROJECT_ID = p.PROJECT_ID and month(rab.RAB_CREATE) = month(now()) and p.PROJECT_ID=NEW.PROJECT_ID ;
  set  incre= incre+1;
  select PROJECT_KODE into kodePro from project where PROJECT_ID=NEW.PROJECT_ID;
  select month(now()) into bulan;
  

 select REPLACE(PROJECT_NAMA,' ','_') into rabnm from project where PROJECT_ID = NEW.PROJECT_ID;
 select count(*) into versirab from rab_transaction where PROJECT_ID= NEW.PROJECT_ID;
 
  CASE bulan 
  	when 1 then SET bulan = 'I';
  	when 2 then SET bulan = 'II';
  	when 3 then SET bulan = 'III';
  	when 4 then SET bulan = 'IV';
  	when 5 then SET bulan = 'V';
  	when 6 then SET bulan = 'VI';
  	when 7 then SET bulan = 'VII';
  	when 8 then SET bulan = 'VIII';
  	when 9 then SET bulan = 'IX';
  	when 10 then SET bulan = 'X';
  	when 11 then SET bulan = 'XI';
  	when 12 then SET bulan = 'XII';
  	else SET bulan = 0;
  END CASE;
  
  select year(now()) into tahun;
  
  set NEW.RAB_KODE = CONCAT(LPAD(incre,3,0),'/',kode,'/',kodePro,'/',bulan,'/',tahun);
  set NEW.RAB_NAMA = CONCAT('RAB_',rabnm,'_',versirab+1);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Dumping structure for view kztszete_pm.view_analisa_volume
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `view_analisa_volume`;
CREATE ALGORITHM=UNDEFINED  SQL SECURITY DEFINER VIEW `view_analisa_volume` AS select `rab_transaction`.`RAB_ID` AS `RAB_ID`,`detail_pekerjaan`.`ANALISA_ID` AS `ANALISA_ID`,sum(`detail_pekerjaan`.`DETAIL_PEKERJAAN_VOLUME`) AS `VOLUME` from ((`rab_transaction` join `detail_pekerjaan` on((`rab_transaction`.`RAB_ID` = `detail_pekerjaan`.`RAB_ID`))) join `master_analisa` on((`master_analisa`.`ANALISA_ID` = `detail_pekerjaan`.`ANALISA_ID`))) where ((`detail_pekerjaan`.`ANALISA_ID` is not null) and (`rab_transaction`.`RAB_ACTIVE` = 1)) group by `detail_pekerjaan`.`ANALISA_ID`,`detail_pekerjaan`.`RAB_ID`;


-- Dumping structure for view kztszete_pm.view_overhead_bahan
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `view_overhead_bahan`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_overhead_bahan` AS select `overhead`.`RAB_ID` AS `RAB_ID`,'Overhead Material' AS `KATEGORI_OVERHEAD`,`detail_overhead`.`DETAIL_OVERHEAD_ID` AS `DETAIL_OVERHEAD_ID`,`detail_overhead`.`BARANG_ID` AS `OVERHEAD_MATERIAL_ID`,`master_barang`.`BARANG_KODE` AS `OVERHEAD_MATERIAL_KODE`,`master_barang`.`BARANG_NAMA` AS `OVERHEAD_MATERIAL_NAMA`,`detail_overhead`.`OVERHEAD_ID` AS `OVERHEAD_ID`,(`detail_overhead`.`DETAIL_OVERHEAD_KOEFISIEN` - ifnull((select ifnull(sum(`vPP`.`VOLUME_PP`),0) from `view_pp` `vPP` where ((`vPP`.`RAB_ID` = `overhead`.`RAB_ID`) and (`vPP`.`BARANG_ID` = `detail_overhead`.`BARANG_ID`) and (`vPP`.`KATEGORI_PP_ID` = 1)) group by `vPP`.`BARANG_ID`),0)) AS `VOLUME_SISA`,`detail_overhead`.`DETAIL_OVERHEAD_KOEFISIEN` AS `TOTAL_VOLUME`,`detail_overhead`.`DETAIL_OVERHEAD_HARGA` AS `HARGA_SATUAN`,`detail_overhead`.`DETAIL_OVERHEAD_TOTAL` AS `TOTAL_HARGA`,`master_barang`.`SATUAN_NAMA` AS `SATUAN_NAMA`,`overhead`.`OVERHEAD_KODE` AS `OVERHEAD_KODE`,`overhead`.`OVERHEAD_NAMA` AS `OVERHEAD_NAMA`,`overhead`.`OVERHEAD_TIPE` AS `OVERHEAD_TIPE` from ((`detail_overhead` join `master_barang` on((`detail_overhead`.`BARANG_ID` = `master_barang`.`BARANG_ID`))) join `overhead` on((`detail_overhead`.`OVERHEAD_ID` = `overhead`.`OVERHEAD_ID`))) where (`overhead`.`OVERHEAD_TIPE` = 'barang');


-- Dumping structure for view kztszete_pm.view_overhead_paket_bahan
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `view_overhead_paket_bahan`;
CREATE ALGORITHM=UNDEFINED  SQL SECURITY DEFINER VIEW `view_overhead_paket_bahan` AS select `overhead`.`RAB_ID` AS `RAB_ID`,'Paket Overhead Material' AS `KATEGORI_OVERHEAD`,`detail_overhead`.`DETAIL_OVERHEAD_ID` AS `DETAIL_OVERHEAD_ID`,`paket_overhead_material`.`PAKET_OVERHEAD_MATERIAL_ID` AS `OVERHEAD_MATERIAL_ID`,'LS' AS `OVERHEAD_MATERIAL_KODE`,`paket_overhead_material`.`PAKET_OVERHEAD_MATERIAL_NAMA` AS `OVERHEAD_MATERIAL_NAMA`,`detail_overhead`.`OVERHEAD_ID` AS `OVERHEAD_ID`,(`detail_overhead`.`DETAIL_OVERHEAD_KOEFISIEN` - ifnull((select ifnull(sum(`vPP`.`VOLUME_PP`),0) from `view_pp` `vPP` where ((`vPP`.`RAB_ID` = `overhead`.`RAB_ID`) and (`vPP`.`BARANG_ID` = `detail_overhead`.`PAKET_OVERHEAD_MATERIAL_ID`) and (`vPP`.`KATEGORI_PP_ID` = 1)) group by `vPP`.`BARANG_ID`),0)) AS `VOLUME_SISA`,`detail_overhead`.`DETAIL_OVERHEAD_KOEFISIEN` AS `TOTAL_VOLUME`,`detail_overhead`.`DETAIL_OVERHEAD_HARGA` AS `HARGA_SATUAN`,`detail_overhead`.`DETAIL_OVERHEAD_TOTAL` AS `TOTAL_HARGA`,`paket_overhead_material`.`SATUAN_NAMA` AS `SATUAN_NAMA`,`overhead`.`OVERHEAD_KODE` AS `OVERHEAD_KODE`,`overhead`.`OVERHEAD_NAMA` AS `OVERHEAD_NAMA`,`overhead`.`OVERHEAD_TIPE` AS `OVERHEAD_TIPE` from ((`detail_overhead` join `paket_overhead_material` on((`detail_overhead`.`PAKET_OVERHEAD_MATERIAL_ID` = `paket_overhead_material`.`PAKET_OVERHEAD_MATERIAL_ID`))) join `overhead` on((`detail_overhead`.`OVERHEAD_ID` = `overhead`.`OVERHEAD_ID`))) where (`overhead`.`OVERHEAD_TIPE` = 'barang');


-- Dumping structure for view kztszete_pm.view_pk
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `view_pk`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_pk` AS select `rab`.`RAB_ID` AS `RAB_ID`,`rab`.`RAB_KODE` AS `RAB_KODE`,`rab`.`RAB_TOTAL` AS `RAB_TOTAL`,`rab`.`RAB_AFTER_OVERHEAD` AS `RAB_AFTER_OVERHEAD`,`pk`.`PERMINTAAN_PEKERJAAN_ID` AS `PK_ID`,`pk`.`PERMINTAAN_PEKERJAAN_KODE` AS `PK_KODE`,`pk`.`PERMINTAAN_PEKERJAAN_TANGGAL` AS `PK_TANGGAL`,`pk`.`STATUS_PK_ID` AS `STATUS_PK_ID`,`pk_status`.`STATUS_PK_NAMA` AS `STATUS_PK_NAMA`,`pk`.`KATEGORI_PK_ID` AS `KATEGORI_PK_ID`,`kategori`.`KATEGORI_PK_NAMA` AS `KATEGORI_PK_NAMA`,`pk`.`PETUGAS_ID` AS `PETUGAS_ID`,`petugas`.`PENGGUNA_NAMA` AS `PETUGAS_NAMA`,`pk`.`VALIDATOR_ID` AS `VALIDATOR_ID`,`validator`.`PENGGUNA_NAMA` AS `VALIDATOR_NAMA`,`detail`.`VOLUME_PK` AS `VOLUME_PK`,`pk`.`TOTAL_PK` AS `TOTAL`,`ma`.`ANALISA_ID` AS `ANALISA_ID`,`ma`.`ANALISA_KODE` AS `ANALISA_KODE`,`ma`.`ANALISA_NAMA` AS `ANALISA_NAMA`,`ma`.`SATUAN_NAMA` AS `SATUAN`,`view_analisa_volume`.`VOLUME` AS `VOLUME`,sum(`da`.`DETAIL_ANALISA_TOTAL`) AS `HARGA_SATUAN` from (((((((((`permintaan_pekerjaan` `pk` left join `rab_transaction` `rab` on((`pk`.`RAB_ID` = `rab`.`RAB_ID`))) left join `status_pk` `pk_status` on((`pk`.`STATUS_PK_ID` = `pk_status`.`STATUS_PK_ID`))) left join `kategori_pk` `kategori` on((`pk`.`KATEGORI_PK_ID` = `kategori`.`KATEGORI_PK_ID`))) left join `pengguna` `petugas` on((`pk`.`PETUGAS_ID` = `petugas`.`PENGGUNA_ID`))) left join `pengguna` `validator` on((`pk`.`VALIDATOR_ID` = `validator`.`PENGGUNA_ID`))) left join `detail_transaksi_pk` `detail` on((`detail`.`PERMINTAAN_PEKERJAAN_ID` = `pk`.`PERMINTAAN_PEKERJAAN_ID`))) left join `analisa_rab` `ma` on((`ma`.`ANALISA_ID` = `detail`.`ANALISA_ID`))) left join `detail_analisa_rab` `da` on((`da`.`ANALISA_ID` = `ma`.`ANALISA_ID`))) left join `view_analisa_volume` on(((`view_analisa_volume`.`ANALISA_ID` = `ma`.`ANALISA_ID`) and (`rab`.`RAB_ID` = `view_analisa_volume`.`RAB_ID`)))) where (`rab`.`RAB_ACTIVE` = 1) group by `ma`.`ANALISA_ID`,`rab`.`RAB_ID`,`pk`.`PERMINTAAN_PEKERJAAN_ID`;


-- Dumping structure for view kztszete_pm.view_pk_rap
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `view_pk_rap`;
CREATE ALGORITHM=UNDEFINED  SQL SECURITY DEFINER VIEW `view_pk_rap` AS select distinct `rab`.`RAB_ID` AS `RAB_ID`,`rab`.`RAB_KODE` AS `RAB_KODE`,`rab`.`RAB_NAMA` AS `RAB_NAMA`,`rab`.`RAB_TOTAL` AS `RAB_TOTAL`,`rab`.`RAB_AFTER_OVERHEAD` AS `RAB_AFTER_OVERHEAD`,`ma`.`ANALISA_ID` AS `ANALISA_ID`,`ma`.`ANALISA_NAMA` AS `ANALISA_NAMA`,`ma`.`SATUAN_NAMA` AS `SATUAN_NAMA`,`ma`.`KATEGORI_ANALISA_ID` AS `KATEGORI_ANALISA_ID`,`ma`.`LOKASI_UPAH_ID` AS `LOKASI_UPAH_ID`,`ma`.`ANALISA_KODE` AS `ANALISA_KODE`,`ma`.`ANALISA_ACTIVE` AS `ANALISA_ACTIVE`,ifnull(`dp`.`DETAIL_PEKERJAAN_TOTAL`,0) AS `DETAIL_PEKERJAAN_TOTAL`,`dp2`.`VOLUME` AS `ANALISA_VOLUME`,(`dp2`.`VOLUME` - ifnull((select ifnull(sum(`pk`.`VOLUME_PK`),0) from `view_pk` `pk` where ((`pk`.`RAB_ID` = `dp`.`RAB_ID`) and (`pk`.`ANALISA_ID` = `dp`.`ANALISA_ID`) and (`pk`.`KATEGORI_PK_ID` = 2)) group by `pk`.`ANALISA_ID`),0)) AS `ANALISA_VOLUME_SISA`,sum(`detail_analisa_rab`.`DETAIL_ANALISA_TOTAL`) AS `UPAH_ANALISA_HARGA` from ((((`analisa_rab` `ma` left join `detail_pekerjaan` `dp` on((`ma`.`ANALISA_ID` = `dp`.`ANALISA_ID`))) left join `detail_analisa_rab` on((`detail_analisa_rab`.`ANALISA_ID` = `ma`.`ANALISA_ID`))) left join `rab_transaction` `rab` on((`rab`.`RAB_ID` = `dp`.`RAB_ID`))) join `view_analisa_volume` `dp2` on(((`dp2`.`RAB_ID` = `rab`.`RAB_ID`) and (`dp2`.`ANALISA_ID` = `ma`.`ANALISA_ID`)))) where ((`rab`.`RAB_ACTIVE` = 1) and (`detail_analisa_rab`.`UPAH_ID` is not null)) group by `ma`.`ANALISA_ID`,`rab`.`RAB_ID`;


-- Dumping structure for view kztszete_pm.view_pp
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `view_pp`;
CREATE ALGORITHM=UNDEFINED  SQL SECURITY DEFINER VIEW `view_pp` AS select `pp`.`PERMINTAAN_PEMBELIAN_ID` AS `PERMINTAAN_PEMBELIAN_ID`,`pp`.`PERMINTAAN_PEMBELIAN_KODE` AS `PERMINTAAN_PEMBELIAN_KODE`,`pp`.`PERMINTAAN_PEMBELIAN_TANGGAL` AS `PERMINTAAN_PEMBELIAN_TANGGAL`,`validator`.`PENGGUNA_ID` AS `VALIDATOR_ID`,`validator`.`PENGGUNA_NAMA` AS `VALIDATOR_NAMA`,`status_pp`.`STATUS_PP_ID` AS `STATUS_PP_ID`,`status_pp`.`STATUS_PP_NAMA` AS `STATUS_PP_NAMA`,`petugas`.`PENGGUNA_ID` AS `PETUGAS_ID`,`petugas`.`PENGGUNA_NAMA` AS `PETUGAS_NAMA`,`project`.`PROJECT_KODE` AS `PROJECT_KODE`,`project`.`PROJECT_ID` AS `PROJECT_ID`,`project`.`PROJECT_NAMA` AS `PROJECT_NAMA`,`project`.`PROJECT_ACTIVE` AS `PROJECT_ACTIVE`,`rab_transaction`.`RAB_ID` AS `RAB_ID`,`rab_transaction`.`RAB_NAMA` AS `RAB_NAMA`,`rab_transaction`.`RAB_TOTAL` AS `RAB_TOTAL`,`rab_transaction`.`RAB_AFTER_OVERHEAD` AS `RAB_AFTER_OVERHEAD`,`rab_transaction`.`RAB_ACTIVE` AS `RAB_ACTIVE`,`kategori_pp`.`KATEGORI_PP_ID` AS `KATEGORI_PP_ID`,`kategori_pp`.`KATEGORI_PP_NAMA` AS `KATEGORI_PP_NAMA`,`detail_transaksi_pp`.`BARANG_ID` AS `BARANG_ID`,`detail_transaksi_pp`.`SUBCON_ID` AS `SUBCON_ID`,`detail_transaksi_pp`.`VOLUME_PP` AS `VOLUME_PP`,(case ifnull(`detail_transaksi_pp`.`SUBCON_ID`,'NULL') when 'NULL' then (select `master_barang`.`BARANG_NAMA` AS `BARANG_NAMA`) else (select `subcon`.`SUBCON_NAMA` AS `BARANG_NAMA` from `subcon` where (`subcon`.`SUBCON_ID` = `detail_transaksi_pp`.`SUBCON_ID`)) end) AS `BARANG_NAMA`,(case ifnull(`detail_transaksi_pp`.`SUBCON_ID`,'NULL') when 'NULL' then (select `master_barang`.`BARANG_HARGA` AS `BARANG_HARGA`) else (select `subcon`.`SUBCON_HARGA` AS `SUBCON_HARGA` from `subcon` where (`subcon`.`SUBCON_ID` = `detail_transaksi_pp`.`SUBCON_ID`)) end) AS `BARANG_HARGA`,(case ifnull(`detail_transaksi_pp`.`SUBCON_ID`,'NULL') when 'NULL' then (select `master_barang`.`BARANG_KODE` AS `BARANG_KODE`) else convert((select 'SUBCON' AS `SUBCON`) using latin1) end) AS `BARANG_KODE`,(case ifnull(`detail_transaksi_pp`.`SUBCON_ID`,'NULL') when 'NULL' then (select `master_barang`.`SATUAN_NAMA` AS `SATUAN_NAMA`) else (select `subcon`.`SATUAN_NAMA` AS `SATUAN_NAMA` from `subcon` where (`subcon`.`SUBCON_ID` = `detail_transaksi_pp`.`SUBCON_ID`)) end) AS `SATUAN_NAMA`,`master_barang`.`KATEGORI_BARANG_ID` AS `KATEGORI_BARANG_ID`,`kategori_barang`.`KATEGORI_BARANG_NAMA` AS `KATEGORI_BARANG_NAMA`,`master_gudang`.`GUDANG_ID` AS `GUDANG_ID`,`master_gudang`.`GUDANG_NAMA` AS `GUDANG_NAMA`,`master_gudang`.`GUDANG_ACTIVE` AS `GUDANG_ACTIVE` from ((((((((((`permintaan_pembelian` `pp` left join `pengguna` `validator` on((`validator`.`PENGGUNA_ID` = `pp`.`VALIDATOR_ID`))) left join `status_pp` on((`status_pp`.`STATUS_PP_ID` = `pp`.`STATUS_PP_ID`))) left join `pengguna` `petugas` on((`petugas`.`PENGGUNA_ID` = `pp`.`PETUGAS_ID`))) left join `rab_transaction` on((`rab_transaction`.`RAB_ID` = `pp`.`RAB_ID`))) left join `project` on((`project`.`PROJECT_ID` = `rab_transaction`.`PROJECT_ID`))) left join `kategori_pp` on((`kategori_pp`.`KATEGORI_PP_ID` = `pp`.`KATEGORI_PP_ID`))) left join `detail_transaksi_pp` on((`detail_transaksi_pp`.`PERMINTAAN_PEMBELIAN_ID` = `pp`.`PERMINTAAN_PEMBELIAN_ID`))) left join `master_barang` on((`master_barang`.`BARANG_ID` = `detail_transaksi_pp`.`BARANG_ID`))) left join `master_gudang` on((`master_gudang`.`GUDANG_ID` = `pp`.`GUDANG_ID`))) left join `kategori_barang` on((`kategori_barang`.`KATEGORI_BARANG_ID` = `master_barang`.`KATEGORI_BARANG_ID`)));


-- Dumping structure for view kztszete_pm.view_rap
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `view_rap`;
CREATE ALGORITHM=UNDEFINED  SQL SECURITY DEFINER VIEW `view_rap` AS select `detail_pekerjaan`.`RAB_ID` AS `RAB_ID`,`rab_transaction`.`RAB_KODE` AS `RAB_KODE`,`master_barang`.`BARANG_ID` AS `BARANG_ID`,`master_barang`.`KATEGORI_BARANG_ID` AS `KATEGORI_BARANG_ID`,`master_barang`.`SATUAN_NAMA` AS `SATUAN_NAMA`,`master_barang`.`BARANG_KODE` AS `BARANG_KODE`,`master_barang`.`BARANG_NAMA` AS `BARANG_NAMA`,`master_barang`.`BARANG_KETERANGAN` AS `BARANG_KETERANGAN`,`master_barang`.`BARANG_HARGA` AS `BARANG_HARGA`,`master_barang`.`BARANG_HARGA_TEMP` AS `BARANG_HARGA_TEMP`,`master_barang`.`BARANG_ACTIVE` AS `BARANG_ACTIVE`,(select coalesce(sum(`vPP`.`VOLUME_PP`),0) AS `VOLUME_PP` from `view_pp` `vPP` where ((`vPP`.`RAB_ID` = `detail_pekerjaan`.`RAB_ID`) and (`vPP`.`BARANG_ID` = `master_barang`.`BARANG_ID`) and (`vPP`.`KATEGORI_PP_ID` = 2)) group by `vPP`.`BARANG_ID`) AS `BARANG_VOLUME_TERPAKAI`,sum((`detail_pekerjaan`.`DETAIL_PEKERJAAN_VOLUME` * `detail_analisa`.`DETAIL_ANALISA_KOEFISIEN`)) AS `BARANG_VOLUME`,`kategori_barang`.`KATEGORI_BARANG_NAMA` AS `KATEGORI_BARANG_NAMA` from ((((((`detail_pekerjaan` join `master_analisa` on((`detail_pekerjaan`.`ANALISA_ID` = `master_analisa`.`ANALISA_ID`))) join `kategori_paket_pekerjaan` on((`detail_pekerjaan`.`KATEGORI_PEKERJAAN_ID` = `kategori_paket_pekerjaan`.`KATEGORI_PEKERJAAN_ID`))) join `detail_analisa` on((`master_analisa`.`ANALISA_ID` = `detail_analisa`.`ANALISA_ID`))) join `master_barang` on((`detail_analisa`.`BARANG_ID` = `master_barang`.`BARANG_ID`))) join `kategori_barang` on((`master_barang`.`KATEGORI_BARANG_ID` = `kategori_barang`.`KATEGORI_BARANG_ID`))) join `rab_transaction` on((`rab_transaction`.`RAB_ID` = `detail_pekerjaan`.`RAB_ID`))) group by `master_barang`.`BARANG_ID`,`detail_pekerjaan`.`RAB_ID`;


-- Dumping structure for view kztszete_pm.view_subcon
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `view_subcon`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_subcon` AS select `rab_transaction`.`RAB_KODE` AS `RAB_KODE`,`rab_transaction`.`RAB_NAMA` AS `RAB_NAMA`,`rab_transaction`.`RAB_MATERIAL` AS `RAB_MATERIAL`,`detail_pekerjaan`.`KATEGORI_PEKERJAAN_ID` AS `KATEGORI_PEKERJAAN_ID`,`detail_pekerjaan`.`ANALISA_ID` AS `ANALISA_ID`,`detail_pekerjaan`.`RAB_ID` AS `RAB_ID`,`detail_pekerjaan`.`SUBCON_ID` AS `SUBCON_ID`,`detail_pekerjaan`.`DETAIL_PEKERJAAN_VOLUME` AS `DETAIL_PEKERJAAN_VOLUME`,`detail_pekerjaan`.`DETAIL_PEKERJAAN_TOTAL` AS `DETAIL_PEKERJAAN_TOTAL`,`detail_pekerjaan`.`DETAIL_PEKERJAAN_URUTAN` AS `DETAIL_PEKERJAAN_URUTAN`,`subcon`.`SUBCON_NAMA` AS `SUBCON_NAMA`,`subcon`.`SATUAN_NAMA` AS `SATUAN_NAMA`,(`detail_pekerjaan`.`DETAIL_PEKERJAAN_VOLUME` - ifnull((select ifnull(sum(`vPP`.`VOLUME_PP`),0) from `view_pp` `vPP` where ((`vPP`.`RAB_ID` = `detail_pekerjaan`.`RAB_ID`) and (`vPP`.`SUBCON_ID` = `detail_pekerjaan`.`SUBCON_ID`)) group by `vPP`.`SUBCON_ID`),0)) AS `VOLUME_SISA`,(`detail_pekerjaan`.`DETAIL_PEKERJAAN_TOTAL` / `detail_pekerjaan`.`DETAIL_PEKERJAAN_VOLUME`) AS `DETAIL_PEKERJAAN_HARGA` from (((`detail_pekerjaan` join `subcon` on((`subcon`.`SUBCON_ID` = `detail_pekerjaan`.`SUBCON_ID`))) join `kategori_paket_pekerjaan` on((`detail_pekerjaan`.`KATEGORI_PEKERJAAN_ID` = `kategori_paket_pekerjaan`.`KATEGORI_PEKERJAAN_ID`))) join `rab_transaction` on((`rab_transaction`.`RAB_ID` = `detail_pekerjaan`.`RAB_ID`)));
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
