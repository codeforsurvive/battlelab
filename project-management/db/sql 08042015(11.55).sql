-- --------------------------------------------------------
-- Host:                         107.182.142.204
-- Versi server:                 5.5.41-cll-lve - MySQL Community Server (GPL)
-- OS Server:                    Linux
-- HeidiSQL Versi:               9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for kztszete_pm
CREATE DATABASE IF NOT EXISTS `kztszete_pm` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `kztszete_pm`;

SET FOREIGN_KEY_CHECKS=0;

-- Dumping structure for table kztszete_pm.bpm
CREATE TABLE IF NOT EXISTS `bpm` (
  `BPM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PEMINTA_BARANG_ID` int(11) DEFAULT NULL,
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
  CONSTRAINT `FK_RELATIONSHIP_61` FOREIGN KEY (`VALIDATOR_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_RELATIONSHIP_62` FOREIGN KEY (`PETUGAS_GUDANG_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_RELATIONSHIP_63` FOREIGN KEY (`GUDANG_ID`) REFERENCES `master_gudang` (`GUDANG_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_RELATIONSHIP_64` FOREIGN KEY (`PEMINTA_BARANG_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_RELATIONSHIP_65` FOREIGN KEY (`STATUS_BPM_ID`) REFERENCES `status_bpm` (`STATUS_BPM_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.bpm: ~1 rows (approximately)
DELETE FROM `bpm`;
/*!40000 ALTER TABLE `bpm` DISABLE KEYS */;
INSERT INTO `bpm` (`BPM_ID`, `PEMINTA_BARANG_ID`, `PETUGAS_GUDANG_ID`, `GUDANG_ID`, `VALIDATOR_ID`, `STATUS_BPM_ID`, `BPM_KODE`, `BPM_TANGGAL`, `BPM_KETERANGAN`) VALUES
	(2, NULL, NULL, NULL, NULL, 1, 'BPM00001', '2015-04-08 11:04:58', '0');
/*!40000 ALTER TABLE `bpm` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.departemen
CREATE TABLE IF NOT EXISTS `departemen` (
  `DEPARTEMEN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DEPARTEMEN_NAMA` varchar(100) DEFAULT NULL,
  `DEPARTEMEN_ACTIVE` int(11) NOT NULL DEFAULT '1',
  `test` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`DEPARTEMEN_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.departemen: ~10 rows (approximately)
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
	(16, 'dfs', 1, '16dfs');
/*!40000 ALTER TABLE `departemen` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.detail_analisa
CREATE TABLE IF NOT EXISTS `detail_analisa` (
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
  KEY `FK_RELATIONSHIP_30` (`BARANG_ID`),
  CONSTRAINT `FK_RELATIONSHIP_14` FOREIGN KEY (`ANALISA_ID`) REFERENCES `master_analisa` (`ANALISA_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.detail_analisa: ~101 rows (approximately)
DELETE FROM `detail_analisa`;
/*!40000 ALTER TABLE `detail_analisa` DISABLE KEYS */;
INSERT INTO `detail_analisa` (`DETAIL_ANALISA_ID`, `BARANG_ID`, `UPAH_ID`, `ANALISA_ID`, `DETAIL_ANALISA_KOEFISIEN`, `DETAIL_ANALISA_HARGA`, `DETAIL_ANALISA_TOTAL`) VALUES
	(100, 77, NULL, 21, '1.35', '19250', '25987.5'),
	(101, 63, NULL, 21, '0.37', '67500', '24975'),
	(102, 23, NULL, 21, '0.054', '11000', '594'),
	(103, 117, NULL, 21, '2.15', '54500', '117175'),
	(104, 97, NULL, 21, '0.004', '115000', '460'),
	(105, 34, NULL, 21, '0.008', '190000', '1520'),
	(106, NULL, 32, 21, '1', '15000', '15000'),
	(107, 19, NULL, 22, '0.050', '4350000', '217500'),
	(108, 30, NULL, 22, '0.050', '105000', '5250'),
	(109, 31, NULL, 22, '1.2', '75000', '90000'),
	(110, 97, NULL, 22, '0.01', '115000', '1150'),
	(111, 34, NULL, 22, '0.01', '190000', '1900'),
	(112, 2, NULL, 22, '0.05', '6400000', '320000'),
	(113, 23, NULL, 22, '0.06', '11000', '660'),
	(114, 21, NULL, 22, '0.450', '14250', '6412.5'),
	(115, NULL, 33, 22, '1', '22500', '22500'),
	(116, 77, NULL, 23, '1.667', '19250', '32089.75'),
	(117, 23, NULL, 23, '5', '11000', '55000'),
	(118, 94, NULL, 23, '2', '1150', '2300'),
	(119, 61, NULL, 23, '2', '51750', '103500'),
	(120, 68, NULL, 23, '1', '15000', '15000'),
	(121, 128, NULL, 23, '1.05', '85000', '89250'),
	(122, 96, NULL, 23, '45', '700', '31500'),
	(123, 117, NULL, 23, '0.25', '54500', '13625'),
	(124, 97, NULL, 23, '0.02', '115000', '2300'),
	(125, 34, NULL, 23, '0.04', '190000', '7600'),
	(126, 31, NULL, 23, '1.5', '75000', '112500'),
	(127, NULL, 34, 23, '1', '100000', '100000'),
	(131, NULL, 36, 25, '1', '45000', '45000'),
	(136, NULL, 37, 26, '1', '17500', '17500'),
	(137, 123, NULL, 27, '1.05', '90000', '94500'),
	(138, NULL, 38, 27, '1', '30000', '30000'),
	(139, 27, NULL, 28, '1.05', '105000', '110250'),
	(140, NULL, 39, 28, '1', '5000', '5000'),
	(142, NULL, 40, 29, '1', '26000', '26000'),
	(143, NULL, 41, 30, '1', '16000', '16000'),
	(144, NULL, 42, 31, '1', '75000', '75000'),
	(145, NULL, 43, 32, '1', '30000', '30000'),
	(150, 77, NULL, 24, '0.3', '19250', '5775'),
	(151, 23, NULL, 24, '0.05', '11000', '550'),
	(152, 95, NULL, 24, '0.25', '26000', '6500'),
	(153, NULL, 35, 24, '1', '5000', '5000'),
	(154, 4, NULL, 33, '1.1', '125000', '137500'),
	(155, 26, NULL, 33, '0.561', '135000', '75735'),
	(156, 117, NULL, 33, '2.925', '54500', '159412.5'),
	(157, NULL, 44, 33, '1.5', '60000', '90000'),
	(158, NULL, 45, 33, '0.6', '75000', '45000'),
	(159, NULL, 46, 33, '0.06', '80000', '4800'),
	(160, NULL, 47, 33, '0.075', '95000', '7125'),
	(167, 117, NULL, 35, '0.25', '54500', '13625'),
	(168, 97, NULL, 35, '0.02', '115000', '2300'),
	(169, 125, NULL, 35, '0.04', '190000', '7600'),
	(170, NULL, 48, 35, '1', '8000', '8000'),
	(171, 27, NULL, 34, '0.3', '105000', '31500'),
	(172, NULL, 44, 34, '0.78', '60000', '46800'),
	(173, NULL, 45, 34, '0.39', '75000', '29250'),
	(174, NULL, 46, 34, '0.039', '80000', '3120'),
	(175, NULL, 47, 34, '0.039', '95000', '3705'),
	(176, 117, NULL, 37, '5', '54500', '272500'),
	(177, 117, NULL, 37, '5', '54500', '272500'),
	(178, 97, NULL, 37, '0.4', '115000', '46000'),
	(179, 97, NULL, 37, '0.4', '115000', '46000'),
	(180, 125, NULL, 37, '0.8', '190000', '152000'),
	(181, 125, NULL, 37, '0.8', '190000', '152000'),
	(182, NULL, 44, 37, '2', '60000', '120000'),
	(183, NULL, 44, 37, '2', '60000', '120000'),
	(184, NULL, 45, 37, '0.35', '75000', '26250'),
	(185, NULL, 45, 37, '0.35', '75000', '26250'),
	(186, NULL, 46, 37, '0.035', '80000', '2800'),
	(187, NULL, 46, 37, '0.035', '80000', '2800'),
	(188, NULL, 47, 37, '0.010', '95000', '950'),
	(189, NULL, 47, 37, '0.010', '95000', '950'),
	(204, 117, NULL, 39, '5', '54500', '272500'),
	(205, 97, NULL, 39, '0.4', '115000', '46000'),
	(206, 125, NULL, 39, '0.8', '190000', '152000'),
	(207, NULL, 44, 39, '2', '60000', '120000'),
	(208, NULL, 45, 39, '0.35', '75000', '26250'),
	(209, NULL, 46, 39, '0.035', '80000', '2800'),
	(210, NULL, 47, 39, '0.01', '95000', '950'),
	(211, 117, NULL, 40, '5', '54500', '272500'),
	(212, 97, NULL, 40, '0.5', '115000', '57500'),
	(213, 125, NULL, 40, '0.8', '190000', '152000'),
	(214, NULL, 44, 40, '2', '60000', '120000'),
	(215, NULL, 45, 40, '0.35', '75000', '26250'),
	(216, NULL, 46, 40, '0.035', '80000', '2800'),
	(217, NULL, 47, 40, '0.01', '95000', '950'),
	(218, 117, NULL, 41, '5.8', '54500', '316100'),
	(219, 97, NULL, 41, '0.54', '115000', '62100'),
	(220, 125, NULL, 41, '0.81', '190000', '153900'),
	(221, NULL, 44, 41, '2', '60000', '120000'),
	(222, NULL, 45, 41, '0.35', '75000', '26250'),
	(223, NULL, 46, 41, '0.035', '80000', '2800'),
	(224, NULL, 47, 41, '0.01', '95000', '950'),
	(233, 103, NULL, 42, '6.67', '1800', '12006'),
	(234, 163, NULL, 42, '126.04', '7950', '1002018'),
	(235, 62, NULL, 42, '6.67', '9000', '60030'),
	(236, 162, NULL, 42, '1.03', '759033', '781803.99'),
	(237, NULL, 49, 42, '1', '35000', '35000'),
	(238, NULL, 50, 42, '126.04', '2000', '252080'),
	(239, NULL, 51, 42, '6.67', '1500', '10005'),
	(240, NULL, 52, 42, '1', '6000', '6000');
/*!40000 ALTER TABLE `detail_analisa` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.detail_bpm
CREATE TABLE IF NOT EXISTS `detail_bpm` (
  `BPM_ID` int(11) NOT NULL,
  `BARANG_ID` int(11) NOT NULL,
  `STOK_BPM` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`BPM_ID`,`BARANG_ID`),
  KEY `FK_RELATIONSHIP_67` (`BARANG_ID`),
  CONSTRAINT `FK_RELATIONSHIP_66` FOREIGN KEY (`BPM_ID`) REFERENCES `bpm` (`BPM_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_RELATIONSHIP_67` FOREIGN KEY (`BARANG_ID`) REFERENCES `master_barang` (`BARANG_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.detail_bpm: ~3 rows (approximately)
DELETE FROM `detail_bpm`;
/*!40000 ALTER TABLE `detail_bpm` DISABLE KEYS */;
INSERT INTO `detail_bpm` (`BPM_ID`, `BARANG_ID`, `STOK_BPM`) VALUES
	(2, 4, '2'),
	(2, 97, '5'),
	(2, 117, '5');
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

-- Dumping data for table kztszete_pm.detail_lpb: ~3 rows (approximately)
DELETE FROM `detail_lpb`;
/*!40000 ALTER TABLE `detail_lpb` DISABLE KEYS */;
INSERT INTO `detail_lpb` (`PENERIMAAN_BARANG_ID`, `BARANG_ID`, `PO_ID`, `VOLUME_LPB`) VALUES
	(9, 97, 8, '42.5'),
	(10, 4, 10, '5'),
	(10, 117, 10, '20');
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
  CONSTRAINT `FK_detail_overhead_paket_material` FOREIGN KEY (`PAKET_OVERHEAD_MATERIAL_ID`) REFERENCES `paket_overhead_material` (`PAKET_OVERHEAD_MATERIAL_ID`),
  CONSTRAINT `FK_overhead_id_2` FOREIGN KEY (`OVERHEAD_ID`) REFERENCES `overhead` (`OVERHEAD_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table kztszete_pm.detail_overhead: ~2 rows (approximately)
DELETE FROM `detail_overhead`;
/*!40000 ALTER TABLE `detail_overhead` DISABLE KEYS */;
INSERT INTO `detail_overhead` (`DETAIL_OVERHEAD_ID`, `BARANG_ID`, `PAKET_OVERHEAD_MATERIAL_ID`, `ANALISA_ID`, `PAKET_OVERHEAD_UPAH_ID`, `OVERHEAD_ID`, `DETAIL_OVERHEAD_KOEFISIEN`, `DETAIL_OVERHEAD_HARGA`, `DETAIL_OVERHEAD_TOTAL`) VALUES
	(12, NULL, 4, NULL, NULL, 1, '5', '500000', '2500000'),
	(13, 117, NULL, NULL, NULL, 1, '20', '54500', '1090000');
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
  CONSTRAINT `FK_RELATIONSHIP_12` FOREIGN KEY (`RAB_ID`) REFERENCES `rab_transaction` (`RAB_ID`),
  CONSTRAINT `FK_RELATIONSHIP_13` FOREIGN KEY (`KATEGORI_PEKERJAAN_ID`) REFERENCES `kategori_paket_pekerjaan` (`KATEGORI_PEKERJAAN_ID`),
  CONSTRAINT `FK_RELATIONSHIP_31` FOREIGN KEY (`ANALISA_ID`) REFERENCES `master_analisa` (`ANALISA_ID`),
  CONSTRAINT `FK_RELATIONSHIP_32` FOREIGN KEY (`SUBCON_ID`) REFERENCES `subcon` (`SUBCON_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.detail_pekerjaan: ~9 rows (approximately)
DELETE FROM `detail_pekerjaan`;
/*!40000 ALTER TABLE `detail_pekerjaan` DISABLE KEYS */;
INSERT INTO `detail_pekerjaan` (`KATEGORI_PEKERJAAN_ID`, `ANALISA_ID`, `RAB_ID`, `SUBCON_ID`, `DETAIL_PEKERJAAN_VOLUME`, `DETAIL_PEKERJAAN_TOTAL`, `DETAIL_PEKERJAAN_URUTAN`) VALUES
	(58, 25, 5, NULL, '200', '9000000', 1),
	(58, 26, 5, NULL, '200', '3500000', 2),
	(58, 27, 5, NULL, '200', '24900000', 3),
	(59, 33, 5, NULL, '75', '38967937.5', 1),
	(59, 34, 5, NULL, '75', '8578125', 2),
	(60, 39, 5, NULL, '50', '31025000', 1),
	(60, 40, 5, NULL, '45', '28440000', 2),
	(60, 42, 5, NULL, '40', '86357719.6', 3),
	(61, NULL, 5, 9, '5', '5000000', 1);
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

-- Dumping data for table kztszete_pm.detail_po: ~3 rows (approximately)
DELETE FROM `detail_po`;
/*!40000 ALTER TABLE `detail_po` DISABLE KEYS */;
INSERT INTO `detail_po` (`PURCHASE_ORDER_ID`, `BARANG_ID`, `PERMINTAAN_PEMBELIAN_ID`, `VOLUME_PO`, `HARGA_MATERI_PO`, `HARGA_AWAL`, `DISKON1`, `DISKON2`, `DISKON3`, `HARGA_STLH_DISKON`, `HARGA_PAJAK`, `HARGA_FINAL`) VALUES
	(8, 97, 2, '42.5', '115000', '4887500', '0', '0', '0', '4887500', '488750', '4398750'),
	(10, 4, 4, '5', '125000', '625000', '0', '0', '0', '625000', '0', '625000'),
	(10, 117, 4, '20', '54500', '1090000', '0', '0', '0', '1090000', '0', '1090000');
/*!40000 ALTER TABLE `detail_po` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.detail_transaksi_pk
CREATE TABLE IF NOT EXISTS `detail_transaksi_pk` (
  `PERMINTAAN_PEKERJAAN_ID` int(11) NOT NULL,
  `ANALISA_ID` int(11) NOT NULL,
  `VOLUME_PK` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`PERMINTAAN_PEKERJAAN_ID`,`ANALISA_ID`),
  KEY `FK_RELATIONSHIP_9` (`ANALISA_ID`),
  CONSTRAINT `FK_ANALISA_ID` FOREIGN KEY (`ANALISA_ID`) REFERENCES `master_analisa` (`ANALISA_ID`),
  CONSTRAINT `FK_PK_DETAIL` FOREIGN KEY (`PERMINTAAN_PEKERJAAN_ID`) REFERENCES `permintaan_pekerjaan` (`PERMINTAAN_PEKERJAAN_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.detail_transaksi_pk: ~0 rows (approximately)
DELETE FROM `detail_transaksi_pk`;
/*!40000 ALTER TABLE `detail_transaksi_pk` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_transaksi_pk` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.detail_transaksi_pp
CREATE TABLE IF NOT EXISTS `detail_transaksi_pp` (
  `DETAIL_PP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PERMINTAAN_PEMBELIAN_ID` int(11) NOT NULL,
  `BARANG_ID` int(11) DEFAULT NULL,
  `SUBCON_ID` int(11) DEFAULT NULL,
  `VOLUME_PP` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`DETAIL_PP_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.detail_transaksi_pp: ~14 rows (approximately)
DELETE FROM `detail_transaksi_pp`;
/*!40000 ALTER TABLE `detail_transaksi_pp` DISABLE KEYS */;
INSERT INTO `detail_transaksi_pp` (`DETAIL_PP_ID`, `PERMINTAAN_PEMBELIAN_ID`, `BARANG_ID`, `SUBCON_ID`, `VOLUME_PP`) VALUES
	(10, 2, 27, NULL, '22.5'),
	(11, 2, 26, NULL, '42.075'),
	(12, 2, 97, NULL, '42.5'),
	(13, 2, NULL, 9, '5'),
	(14, 3, 4, NULL, '82.5'),
	(15, 3, 163, NULL, '5041.6'),
	(16, 3, 162, NULL, '41.2'),
	(17, 3, 62, NULL, '266.8'),
	(18, 3, 103, NULL, '266.8'),
	(19, 3, 117, NULL, '694.375'),
	(20, 3, 123, NULL, '210'),
	(21, 3, 125, NULL, '76'),
	(22, 4, 117, NULL, '20'),
	(23, 4, 4, NULL, '5');
/*!40000 ALTER TABLE `detail_transaksi_pp` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.enroll
CREATE TABLE IF NOT EXISTS `enroll` (
  `PENGGUNA_ID` int(11) NOT NULL,
  `PENUGASAN_ID` int(11) NOT NULL,
  `PROJECT_ID` int(11) NOT NULL,
  `TANGGAL_ENROLL` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`PENGGUNA_ID`,`PENUGASAN_ID`,`PROJECT_ID`),
  KEY `fk_project_id` (`PROJECT_ID`),
  KEY `fk_penugasan_id` (`PENUGASAN_ID`),
  CONSTRAINT `fk_pengguna` FOREIGN KEY (`PENGGUNA_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`),
  CONSTRAINT `fk_penugasan_id` FOREIGN KEY (`PENUGASAN_ID`) REFERENCES `penugasan` (`PENUGASAN_ID`),
  CONSTRAINT `fk_project_id` FOREIGN KEY (`PROJECT_ID`) REFERENCES `project` (`PROJECT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.enroll: ~5 rows (approximately)
DELETE FROM `enroll`;
/*!40000 ALTER TABLE `enroll` DISABLE KEYS */;
INSERT INTO `enroll` (`PENGGUNA_ID`, `PENUGASAN_ID`, `PROJECT_ID`, `TANGGAL_ENROLL`) VALUES
	(1, 1, 1, '2015-04-07 18:38:15'),
	(1, 2, 1, '2015-04-07 18:38:38'),
	(1, 3, 1, '2015-04-07 18:38:55'),
	(1, 4, 1, '2015-04-07 18:39:16'),
	(1, 5, 1, '2015-04-07 18:39:30');
/*!40000 ALTER TABLE `enroll` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.file_design
CREATE TABLE IF NOT EXISTS `file_design` (
  `RAB_DESIGN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `RAB_ID` int(11) DEFAULT NULL,
  `RAB_DESIGN_NAME` varchar(1000) DEFAULT NULL,
  `RAB_DESIGN_URL` varchar(2000) DEFAULT NULL,
  `RAB_DESIGN_DESC` text,
  PRIMARY KEY (`RAB_DESIGN_ID`),
  KEY `FK_RELATIONSHIP_35` (`RAB_ID`),
  CONSTRAINT `FK_RELATIONSHIP_35` FOREIGN KEY (`RAB_ID`) REFERENCES `rab_transaction` (`RAB_ID`)
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

-- Dumping data for table kztszete_pm.hak_akses: ~148 rows (approximately)
DELETE FROM `hak_akses`;
/*!40000 ALTER TABLE `hak_akses` DISABLE KEYS */;
INSERT INTO `hak_akses` (`ROLE_ID`, `TIPE_ID`, `MODULES_ID`) VALUES
	(1, -1, 1),
	(2, -1, 1),
	(3, -1, 1),
	(4, -1, 1),
	(1, -1, 2),
	(2, -1, 2),
	(3, -1, 2),
	(4, -1, 2),
	(1, -1, 3),
	(2, -1, 3),
	(3, -1, 3),
	(4, -1, 3),
	(1, -1, 4),
	(2, -1, 4),
	(3, -1, 4),
	(4, -1, 4),
	(1, -1, 5),
	(2, -1, 5),
	(3, -1, 5),
	(4, -1, 5),
	(1, -1, 6),
	(2, -1, 6),
	(3, -1, 6),
	(4, -1, 6),
	(1, -1, 7),
	(2, -1, 7),
	(3, -1, 7),
	(4, -1, 7),
	(1, -1, 8),
	(2, -1, 8),
	(3, -1, 8),
	(4, -1, 8),
	(1, -1, 9),
	(2, -1, 9),
	(3, -1, 9),
	(4, -1, 9),
	(1, -1, 10),
	(2, -1, 10),
	(3, -1, 10),
	(4, -1, 10),
	(1, -1, 11),
	(2, -1, 11),
	(3, -1, 11),
	(4, -1, 11),
	(1, -1, 12),
	(2, -1, 12),
	(3, -1, 12),
	(4, -1, 12),
	(1, -1, 13),
	(2, -1, 13),
	(3, -1, 13),
	(4, -1, 13),
	(1, 0, 14),
	(2, -1, 14),
	(3, -1, 14),
	(4, -1, 14),
	(1, 1, 15),
	(2, -1, 15),
	(3, -1, 15),
	(4, -1, 15),
	(1, 1, 16),
	(2, -1, 16),
	(3, -1, 16),
	(4, -1, 16),
	(1, 1, 17),
	(2, -1, 17),
	(3, -1, 17),
	(4, -1, 17),
	(1, 1, 18),
	(2, -1, 18),
	(3, -1, 18),
	(4, -1, 18),
	(1, -1, 19),
	(2, -1, 19),
	(3, -1, 19),
	(4, -1, 19),
	(1, -1, 20),
	(2, -1, 20),
	(3, -1, 20),
	(4, -1, 20),
	(1, -1, 21),
	(2, -1, 21),
	(3, -1, 21),
	(4, -1, 21),
	(1, -1, 22),
	(2, -1, 22),
	(3, -1, 22),
	(4, -1, 22),
	(1, -1, 23),
	(2, -1, 23),
	(3, -1, 23),
	(4, -1, 23),
	(1, -1, 24),
	(2, -1, 24),
	(3, -1, 24),
	(4, -1, 24),
	(1, -1, 25),
	(2, -1, 25),
	(3, -1, 25),
	(4, -1, 25),
	(1, -1, 26),
	(2, -1, 26),
	(3, -1, 26),
	(4, -1, 26),
	(1, -1, 27),
	(2, -1, 27),
	(3, -1, 27),
	(4, -1, 27),
	(1, -1, 28),
	(2, -1, 28),
	(3, -1, 28),
	(4, -1, 28),
	(1, -1, 29),
	(2, -1, 29),
	(3, -1, 29),
	(4, -1, 29),
	(1, -1, 30),
	(2, -1, 30),
	(3, -1, 30),
	(4, -1, 30),
	(1, -1, 31),
	(2, -1, 31),
	(3, -1, 31),
	(4, -1, 31),
	(1, -1, 32),
	(2, -1, 32),
	(3, -1, 32),
	(4, -1, 32),
	(1, -1, 33),
	(2, -1, 33),
	(3, -1, 33),
	(4, -1, 33),
	(1, -1, 34),
	(2, -1, 34),
	(3, -1, 34),
	(4, -1, 34),
	(1, -1, 35),
	(2, -1, 35),
	(3, -1, 35),
	(4, -1, 35),
	(1, -1, 36),
	(2, -1, 36),
	(3, -1, 36),
	(4, -1, 36),
	(1, -1, 37),
	(2, -1, 37),
	(3, -1, 37),
	(4, -1, 37);
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
  CONSTRAINT `FK_VALIDATOR` FOREIGN KEY (`VALIDATOR_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`),
  CONSTRAINT `RAB_PEMBERI_FK` FOREIGN KEY (`RAB_PEMBERI`) REFERENCES `rab_transaction` (`RAB_ID`),
  CONSTRAINT `RAB_PENERIMA_FK` FOREIGN KEY (`RAB_PENERIMA`) REFERENCES `rab_transaction` (`RAB_ID`)
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
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.kategori_paket_pekerjaan: ~61 rows (approximately)
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
	(61, 'PEMBERSIHAN', 4);
/*!40000 ALTER TABLE `kategori_paket_pekerjaan` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.kategori_pk
CREATE TABLE IF NOT EXISTS `kategori_pk` (
  `KATEGORI_PK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `KATEGORI_PK_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`KATEGORI_PK_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.kategori_pk: ~0 rows (approximately)
DELETE FROM `kategori_pk`;
/*!40000 ALTER TABLE `kategori_pk` DISABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=401 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.log_activity: 335 rows
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
	(400, 'Administrator', 'administrator', 'p-material/bpm/BPMAdd', 'update', 'stok', '{"VOLUME":2}', '{"RAB_ID":5,"BARANG_ID":4}', '2015-04-08 11:05:02');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.main_project: ~1 rows (approximately)
DELETE FROM `main_project`;
/*!40000 ALTER TABLE `main_project` DISABLE KEYS */;
INSERT INTO `main_project` (`MAIN_PROJECT_ID`, `MAIN_PROJECT_NAMA`, `MAIN_PROJECT_KODE`, `MAIN_PROJECT_DESCRIPTION`, `MAIN_PROJECT_ACTIVE`, `PERUSAHAAN_ID`) VALUES
	(4, 'THEME PARK WARU', 'MPRO0001', 'Sebuag proyek besar pembangunan wahana hiburan Surabaya-Sidoarjo', 1, 3);
/*!40000 ALTER TABLE `main_project` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.master_analisa
CREATE TABLE IF NOT EXISTS `master_analisa` (
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
  KEY `FK_master_analisa_lokasi` (`LOKASI_UPAH_ID`),
  CONSTRAINT `FK_kategori_analisis` FOREIGN KEY (`KATEGORI_ANALISA_ID`) REFERENCES `kategori_analisa` (`KATEGORI_ANALISA_ID`),
  CONSTRAINT `FK_master_analisa` FOREIGN KEY (`SATUAN_NAMA`) REFERENCES `satuan_barang` (`SATUAN_NAMA`),
  CONSTRAINT `FK_master_analisa_lokasi` FOREIGN KEY (`LOKASI_UPAH_ID`) REFERENCES `lokasi_upah` (`LOKASI_UPAH_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.master_analisa: ~23 rows (approximately)
DELETE FROM `master_analisa`;
/*!40000 ALTER TABLE `master_analisa` DISABLE KEYS */;
INSERT INTO `master_analisa` (`ANALISA_ID`, `SATUAN_NAMA`, `KATEGORI_ANALISA_ID`, `LOKASI_UPAH_ID`, `ANALISA_KODE`, `ANALISA_NAMA`, `ANALISA_TOTAL`, `ANALISA_ACTIVE`) VALUES
	(20, 'M', 2, 1, 'HSPK/PRSP-0001', 'Pagar Sementara Dari Gedeg t. 2m', '185711.5', 0),
	(21, 'M', 1, 1, 'HSPK/PRSP-0001', 'Pagar Sementara Dari Gedeg t. 2m', '185711.5', 1),
	(22, 'M', 2, 1, 'HSPK/PRSP-0002', 'Pagar Dari Seng Gelombang t= 2 m', '665372.5', 1),
	(23, 'M2', 2, 1, 'HSPK/PRSP-0003', 'Direksi Keet + Rabat 3x6m', '564664.75', 1),
	(24, 'M', 2, 1, 'HSPK/PRSP-0004', 'Bouwplank', '17825', 1),
	(25, 'M3', 2, 1, 'HSPK/PEK.TNH-0001', 'Galian Tanah ', '45000', 1),
	(26, 'M3', 2, 1, 'HSPK/PEK.TNH-0002', 'Urugan Tanah  Kembali', '17500', 1),
	(27, 'M3', 2, 1, 'HSPK/PEK.TNH-0003', 'Urugan Sirtu + Pemadatan', '124500', 1),
	(28, 'M3', 2, 1, 'HSPK/PEK.TNH-0004', 'Urugan pasir', '115250', 1),
	(29, 'M3', 2, 1, 'HSPK/PEK.TNH-0005', 'Urugan Tanah  Perataan & Pemadatan', '26000', 1),
	(30, 'M3', 2, 1, 'HSPK/PEK.TNH-0006', 'Buang Tanah  Sementara', '16000', 1),
	(31, 'M3', 2, 1, 'HSPK/PEK.TNH-0007', 'Buang Tanah  Keluar Lokasi', '75000', 1),
	(32, 'M3', 2, 1, 'HSPK/PEK.TNH-0008', 'Buang Gragal  Keluar Lokasi', '30000', 1),
	(33, 'M3', 2, 1, 'HSPK/PEK.PNDSI-0001', '  Membuat Pondasi Batu Belah  1 : 6 ', '519572.5', 1),
	(34, 'M3', 2, 1, 'HSPK/PEK.PNDSI-0002', '  Membuat Pasangan  Batu Kosong (Aanstamping)', '114375', 1),
	(35, 'M2', 2, 1, 'HSPK/PEK.BTNSTR-0001', 'Lantai kerja tb 5cm (site mix)', '31525', 1),
	(36, 'M2', 2, 1, 'HSPK/PEK.BTNSTR-0002', 'Lantai kerja  (site mix)', '620500', 0),
	(37, 'M2', 2, 1, 'HSPK/PEK.BTNSTR-0002', 'Lantai kerja  (site mix)', '620500', 0),
	(38, 'M3', 2, 1, 'HSPK/PEK.BTNSTR-0002', 'Lantai kerja  (site mix)', '620500', 0),
	(39, 'M3', 2, 1, 'HSPK/PEK.BTNSTR-0002', 'Lantai kerja  (site mix)', '620500', 1),
	(40, 'M3', 2, 1, 'HSPK/PEK.BTNSTR-0003', 'Membuat beton  1 Pc : 3 Ps : 5 Kr (site mix)', '632000', 1),
	(41, 'M3', 2, 1, 'HSPK/PEK.BTNSTR-0004', '  Membuat  Beton   1 : 2 : 3', '682100', 1),
	(42, 'M3', 2, 1, 'HSPK/PEK.BTNSTR-0005', 'Cor plat lantai 15 cm (Ready Mix) K-225', '2158942.99', 1);
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
  `BARANG_ACTIVE` int(11) DEFAULT '1',
  PRIMARY KEY (`BARANG_ID`),
  KEY `FK_RELATIONSHIP_19` (`KATEGORI_BARANG_ID`),
  KEY `FK_RELATIONSHIP_20` (`SATUAN_NAMA`)
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.master_barang: ~175 rows (approximately)
DELETE FROM `master_barang`;
/*!40000 ALTER TABLE `master_barang` DISABLE KEYS */;
INSERT INTO `master_barang` (`BARANG_ID`, `KATEGORI_BARANG_ID`, `SATUAN_NAMA`, `BARANG_KODE`, `BARANG_NAMA`, `BARANG_KETERANGAN`, `BARANG_HARGA`, `BARANG_HARGA_TEMP`, `BARANG_ACTIVE`) VALUES
	(1, 1, 'M2', 'MAT000001', 'Alumunium Composite Panel', 'Ini adalah keterangan', '465000', '465000', 1),
	(2, 1, 'M3', 'MAT000002', 'Balok kayu borneo 5/7', 'Ini adalah keterangan', '6400000', '6400000', 1),
	(3, 1, 'Bh', 'MAT000003', 'Batako 10 X 20 X 40', 'Ini adalah keterangan', '3500', '3500', 1),
	(4, 1, 'M3', 'MAT000004', 'Batu belah 15/20 cm', 'Ini adalah keterangan', '125000', '125000', 1),
	(5, 1, 'Kg', 'MAT000005', 'Besi siku 50.50.5', 'Ini adalah keterangan', '7950', '7950', 1),
	(6, 1, 'Ls', 'MAT000006', 'Beton decking', 'Ini adalah keterangan', '10000', '10000', 1),
	(7, 1, 'M3', 'MAT000007', 'Beton Readymix K - 225', 'Ini adalah keterangan', '667575', '667575', 1),
	(8, 1, 'M3', 'MAT000008', 'Beton Readymix K - 250', 'Ini adalah keterangan', '683596.8', '683596.8', 1),
	(9, 1, 'M3', 'MAT000009', 'Beton Readymix K - 300', 'Ini adalah keterangan', '704959.2', '704959.2', 1),
	(10, 1, 'M3', 'MAT000010', 'Beton Readymix K - 450', 'Ini adalah keterangan', '801090', '801090', 1),
	(11, 1, 'M3', 'MAT000011', 'Beton Readymix K - 500', 'Ini adalah keterangan', '835269.84', '835269.84', 1),
	(12, 1, 'M3', 'MAT000012', 'Beton Readymix K-350', 'Ini adalah keterangan', '726321.6', '726321.6', 1),
	(13, 1, 'M3', 'MAT000013', 'Beton Readymix K-400', 'Ini adalah keterangan', '769046.4', '769046.4', 1),
	(14, 1, 'M2', 'MAT000014', 'Coating', 'Ini adalah keterangan', '15000', '15000', 1),
	(15, 1, 'M2', 'MAT000015', 'Form oil', 'Ini adalah keterangan', '4600', '4600', 1),
	(16, 1, 'Bh', 'MAT000016', 'Form tie', 'Ini adalah keterangan', '8050', '8050', 1),
	(17, 1, 'Set', 'MAT000017', 'Horry beam', 'Ini adalah keterangan', '14375', '14375', 1),
	(18, 1, 'Roll', 'MAT000018', 'Kawat berduri', 'Ini adalah keterangan', '57500', '57500', 1),
	(19, 1, 'M3', 'MAT000019', 'Kayu Meranti (usuk) 4/6', 'Ini adalah keterangan', '4350000', '4350000', 1),
	(20, 1, 'M3', 'MAT000020', 'Kayu meranti bekisting', 'Ini adalah keterangan', '2530000', '2530000', 1),
	(21, 1, 'Kg', 'MAT000021', 'Meni Besi', 'Ini adalah keterangan', '14250', '14250', 1),
	(22, 1, 'Lbr', 'MAT000022', 'Multipleks 12 mm', 'Ini adalah keterangan', '125000', '125000', 1),
	(23, 1, 'Kg', 'MAT000023', 'Paku Biasa 2" - 5"', 'Ini adalah keterangan', '11000', '11000', 1),
	(24, 1, 'Lbr', 'MAT000024', 'Panel beton', 'Ini adalah keterangan', '143000', '143000', 1),
	(25, 1, 'M2', 'MAT000025', 'Paras Jogya', 'Ini adalah keterangan', '175000', '175000', 1),
	(26, 1, 'M3', 'MAT000026', 'Pasir pasang', 'Ini adalah keterangan', '135000', '135000', 1),
	(27, 1, 'M3', 'MAT000027', 'Pasir Urug', 'Ini adalah keterangan', '105000', '105000', 1),
	(28, 1, 'Set', 'MAT000028', 'Pipe support', 'Ini adalah keterangan', '11500', '11500', 1),
	(29, 1, 'Set', 'MAT000029', 'Schafolding', 'Ini adalah keterangan', '30000', '30000', 1),
	(30, 1, 'Sak', 'MAT000030', 'Semen PC (abu-abu) @ 40 Kg', 'Ini adalah keterangan', '105000', '105000', 1),
	(31, 1, 'Lbr', 'MAT000031', 'Seng gelombang ', 'Ini adalah keterangan', '75000', '75000', 1),
	(32, 1, 'Jam', 'MAT000032', 'Sewa Concrete Pump', 'Ini adalah keterangan', '431250', '431250', 1),
	(33, 1, 'Jam', 'MAT000033', 'Sewa vibrator', 'Ini adalah keterangan', '17250', '17250', 1),
	(34, 1, 'M3', 'MAT000034', 'Split (batu pecah)/Tenslah 1 / 2', 'Ini adalah keterangan', '190000', '190000', 1),
	(35, 1, 'Btg', 'MAT000035', 'Tiang beton T = 2,5 m', 'Ini adalah keterangan', '222750', '222750', 1),
	(36, 1, 'Btg', 'MAT000036', 'Tiang beton T = 3,5 m', 'Ini adalah keterangan', '222750', '222750', 1),
	(37, 1, 'M2', 'MAT000037', 'Atap zincalume', 'Ini adalah keterangan', '50000', '50000', 1),
	(38, 1, 'Bh', 'MAT000038', 'Bata merah 5 x 11 x 22 cm', 'Ini adalah keterangan', '450', '450', 1),
	(39, 1, 'Bh', 'MAT000039', 'Baut sambungan', 'Ini adalah keterangan', '4250', '4250', 1),
	(40, 1, 'Kg', 'MAT000040', 'Besi  ? 6 mm', 'Ini adalah keterangan', '7950', '7950', 1),
	(41, 1, 'Kg', 'MAT000041', 'Besi  ? 8 mm', 'Ini adalah keterangan', '7950', '7950', 1),
	(42, 1, 'Kg', 'MAT000042', 'Besi  ? 10 mm', 'Ini adalah keterangan', '7950', '7950', 1),
	(43, 1, 'Kg', 'MAT000043', 'Besi  ? 12 mm', 'Ini adalah keterangan', '7950', '7950', 1),
	(44, 1, 'Kg', 'MAT000044', 'Besi  ? D13 mm', 'Ini adalah keterangan', '7950', '7950', 1),
	(45, 1, 'Kg', 'MAT000045', 'Besi  ? D16 mm', 'Ini adalah keterangan', '7950', '7950', 1),
	(46, 1, 'Kg', 'MAT000046', 'Besi  ? D19 mm', 'Ini adalah keterangan', '7950', '7950', 1),
	(47, 1, 'Kg', 'MAT000047', 'Besi  ? D22 mm', 'Ini adalah keterangan', '7950', '7950', 1),
	(48, 1, 'Ljr', 'MAT000048', 'Besi siku lubang @3m (ekstra 2 plat + 6 baut mur)', 'Ini adalah keterangan', '72000', '72000', 1),
	(49, 1, 'Ljr', 'MAT000049', 'Besi siku lubang @4m (ekstra 2 plat + 6 baut mur)', 'Ini adalah keterangan', '96000', '96000', 1),
	(50, 1, 'M\'', 'MAT000050', 'buis beton 30 cm', 'Ini adalah keterangan', '36500', '36500', 1),
	(51, 1, 'Kg', 'MAT000051', 'Casting', 'Ini adalah keterangan', '2000', '2000', 1),
	(52, 1, 'Kg', 'MAT000052', 'Cat', 'Ini adalah keterangan', '1075', '1075', 1),
	(53, 1, 'Kg', 'MAT000053', 'Cat besi', 'Ini adalah keterangan', '40000', '40000', 1),
	(54, 1, 'Kg', 'MAT000054', 'Cat dinding Eksterior Ex. Dulux Weathershield', 'Ini adalah keterangan', '86000', '86000', 1),
	(55, 1, 'Kg', 'MAT000055', 'Cat dinding Interior Ex. Catylac / Setara', 'Ini adalah keterangan', '25000', '25000', 1),
	(56, 1, 'Kg', 'MAT000056', 'Cat dinding Interior Ex. Movylac / Setara', 'Ini adalah keterangan', '40000', '40000', 1),
	(57, 1, 'Kg', 'MAT000057', 'Cat meni', 'Ini adalah keterangan', '20000', '20000', 1),
	(58, 1, 'Kg', 'MAT000058', 'CNP 125.50.20.2,3', 'Ini adalah keterangan', '6500', '6500', 1),
	(59, 1, 'Bh', 'MAT000059', 'Drilling', 'Ini adalah keterangan', '300', '300', 1),
	(60, 1, 'Bh', 'MAT000060', 'Drilling screw', 'Ini adalah keterangan', '350', '350', 1),
	(61, 1, 'Bh', 'MAT000061', 'Engsel', 'Ini adalah keterangan', '51750', '51750', 1),
	(62, 1, 'M2', 'MAT000062', 'Floor hardenner ex. Sika 3 Kg/M2 natural color', 'Ini adalah keterangan', '9000', '9000', 1),
	(63, 1, 'Lbr', 'MAT000063', 'Gedek uk. 1,8 x 3 mtr', 'Ini adalah keterangan', '67500', '67500', 1),
	(64, 1, 'Kg', 'MAT000064', 'Gording CNP 125', 'Ini adalah keterangan', '6500', '6500', 1),
	(65, 1, 'M2', 'MAT000065', 'Granite Tile  60 x 60 Cm', 'Ini adalah keterangan', '186978.5', '186978.5', 1),
	(66, 1, 'M2', 'MAT000066', 'GRC 20x40 cm', 'Ini adalah keterangan', '55000', '55000', 1),
	(67, 1, 'Lbr', 'MAT000067', 'GRC Clad 10mm 1,2 x 2,4 m', 'Ini adalah keterangan', '163500', '163500', 1),
	(68, 1, 'Bh', 'MAT000068', 'Grendel', 'Ini adalah keterangan', '15000', '15000', 1),
	(69, 1, 'Lbr', 'MAT000069', 'Gypsum board 1,2 x 2,4', 'Ini adalah keterangan', '54000', '54000', 1),
	(70, 1, 'Ljr', 'MAT000070', 'Hollow 2x4', 'Ini adalah keterangan', '18500', '18500', 1),
	(71, 1, 'Ljr', 'MAT000071', 'Hollow 4x4', 'Ini adalah keterangan', '24000', '24000', 1),
	(72, 1, 'M2', 'MAT000072', 'Kaca polos tb. 5mm', 'Ini adalah keterangan', '70000', '70000', 1),
	(73, 1, 'M2', 'MAT000073', 'Kaca Polos Tebal 5 mm', 'Ini adalah keterangan', '85000', '85000', 1),
	(74, 1, 'Kg', 'MAT000074', 'Kalsium', 'Ini adalah keterangan', '1050', '1050', 1),
	(75, 1, 'Bh', 'MAT000075', 'Kansteen 8x40x20 ', 'Ini adalah keterangan', '23600', '23600', 1),
	(76, 1, 'Kg', 'MAT000076', 'kawat  bendrat', 'Ini adalah keterangan', '15000', '15000', 1),
	(77, 1, 'Btg', 'MAT000077', 'Kayu  5/7 (randu/sengon) (asms. 1.5x pakai)', 'Ini adalah keterangan', '19250', '19250', 1),
	(78, 1, 'Btg', 'MAT000078', 'Kayu gelam', 'Ini adalah keterangan', '10000', '10000', 1),
	(79, 1, 'M2', 'MAT000079', 'keramik 20 x 20 Cm', 'Ini adalah keterangan', '71507', '71507', 1),
	(80, 1, 'M2', 'MAT000080', 'keramik 30 x 30 Cm', 'Ini adalah keterangan', '81661.5', '81661.5', 1),
	(81, 1, 'M2', 'MAT000081', 'keramik 40 x 40 Cm', 'Ini adalah keterangan', '93910.725', '93910.725', 1),
	(82, 1, 'M2', 'MAT000082', 'keramik 50 x 50 Cm', 'Ini adalah keterangan', '117388.4063', '117388.4063', 1),
	(83, 1, 'M2', 'MAT000083', 'keramik 60 x 60 Cm', 'Ini adalah keterangan', '134996.6672', '134996.6672', 1),
	(84, 1, 'M2', 'MAT000084', 'Keramik dinding 20 x 25 Cm', 'Ini adalah keterangan', '72921.5', '72921.5', 1),
	(85, 1, 'Lbr', 'MAT000085', 'Kertas gosok', 'Ini adalah keterangan', '3000', '3000', 1),
	(86, 1, 'Daun', 'MAT000086', 'Krepyak Nako', 'Ini adalah keterangan', '15000', '15000', 1),
	(87, 1, 'Bh', 'MAT000087', 'Kuas / Roll', 'Ini adalah keterangan', '10000', '10000', 1),
	(88, 1, 'Bh', 'MAT000088', 'Kuas 3 "', 'Ini adalah keterangan', '10000', '10000', 1),
	(89, 1, 'Bh', 'MAT000089', 'Kuas 3 "', 'Ini adalah keterangan', '10000', '10000', 1),
	(90, 1, 'Bks', 'MAT000090', 'Lem Rajawali', 'Ini adalah keterangan', '9187.5', '9187.5', 1),
	(91, 1, 'Lbr', 'MAT000091', 'Multipleks 9 mm', 'Ini adalah keterangan', '100000', '100000', 1),
	(92, 1, 'Bh', 'MAT000092', 'mur trekstang', 'Ini adalah keterangan', '510', '510', 1),
	(93, 1, 'Kg', 'MAT000093', 'Paku biasa 2" - 5"', 'Ini adalah keterangan', '11000', '11000', 0),
	(94, 1, 'Kg', 'MAT000094', 'Paku payung', 'Ini adalah keterangan', '1150', '1150', 1),
	(95, 1, 'Lbr', 'MAT000095', 'Papan randu/sengon 2/20 (asms. 1,5 x pakai)', 'Ini adalah keterangan', '26000', '26000', 1),
	(96, 1, 'Buah', 'MAT000096', 'Bata merah', 'Ini adalah keterangan', '700', '700', 1),
	(97, 1, 'M3', 'MAT000097', 'Pasir Beton', 'Ini adalah keterangan', '115000', '115000', 1),
	(98, 1, 'M3', 'MAT000098', 'Pasir pasang', 'Ini adalah keterangan', '135000', '135000', 0),
	(99, 1, 'M3', 'MAT000099', 'Pasir urug', 'Ini adalah keterangan', '105000', '105000', 1),
	(100, 1, 'Bh', 'MAT000100', 'Paving Abu-abu tb. 8 cm', 'Ini adalah keterangan', '1442', '1442', 1),
	(101, 1, 'Ljr', 'MAT000101', 'Pipa Kotak 2x4', 'Ini adalah keterangan', '135000', '135000', 1),
	(102, 1, 'Ljr', 'MAT000102', 'Pipa Kotak 3x6', 'Ini adalah keterangan', '215000', '215000', 1),
	(103, 1, 'M2', 'MAT000103', 'Plastic sheet', 'Ini adalah keterangan', '1800', '1800', 1),
	(104, 1, 'Kg', 'MAT000104', 'Plat MS t=6mm', 'Ini adalah keterangan', '9500', '9500', 1),
	(105, 1, 'Kg', 'MAT000105', 'Plat Strip 50.5 - 10', 'Ini adalah keterangan', '7500', '7500', 1),
	(106, 1, 'M\'', 'MAT000106', 'Plester gypsum', 'Ini adalah keterangan', '2750', '2750', 1),
	(107, 1, 'Lbr', 'MAT000107', 'Plywood tebal 9 mm, 6 mm  (asms. 2.5x pakai)', 'Ini adalah keterangan', '120000', '120000', 1),
	(108, 1, 'M\'', 'MAT000108', 'pvc 1 1/4" D', 'Ini adalah keterangan', '5750', '5750', 1),
	(109, 1, 'M\'', 'MAT000109', 'pvc 3" D', 'Ini adalah keterangan', '13125', '13125', 1),
	(110, 1, 'M\'', 'MAT000110', 'pvc 3/4" aw', 'Ini adalah keterangan', '4250', '4250', 1),
	(111, 1, 'M\'', 'MAT000111', 'pvc 4" D', 'Ini adalah keterangan', '20750', '20750', 1),
	(112, 1, 'M\'', 'MAT000112', 'pvc galvanis 3/4"', 'Ini adalah keterangan', '25000', '25000', 1),
	(113, 1, 'Ljr', 'MAT000113', 'Rangka metal furing', 'Ini adalah keterangan', '30000', '30000', 1),
	(114, 1, 'M\'', 'MAT000114', 'Sealant', 'Ini adalah keterangan', '5000', '5000', 1),
	(115, 1, 'Bh', 'MAT000115', 'Sekrup', 'Ini adalah keterangan', '300', '300', 1),
	(116, 1, 'Bh', 'MAT000116', 'Sekrup gypsum', 'Ini adalah keterangan', '300', '300', 1),
	(117, 1, 'Sak', 'MAT000117', 'Semen portland 40Kg', 'Ini adalah keterangan', '54500', '54500', 1),
	(118, 1, 'Kg', 'MAT000118', 'Semen Putih', 'Ini adalah keterangan', '1875', '1875', 1),
	(119, 1, 'Kg', 'MAT000119', 'Semen warna', 'Ini adalah keterangan', '1890', '1890', 1),
	(120, 1, 'Lbr', 'MAT000120', 'Seng gelombang', 'Ini adalah keterangan', '75000', '75000', 0),
	(121, 1, 'Kg', 'MAT000121', 'Siku 60.60.6', 'Ini adalah keterangan', '8300', '8300', 1),
	(122, 1, 'M3', 'MAT000122', 'Sirtu ayak', 'Ini adalah keterangan', '90000', '90000', 1),
	(123, 1, 'M3', 'MAT000123', 'Sirtu urug', 'Ini adalah keterangan', '90000', '90000', 1),
	(124, 1, 'Buah', 'MAT000124', 'Skrup', 'Ini adalah keterangan', '1000', '1000', 1),
	(125, 1, 'M3', 'MAT000125', 'Tensla 1/2', 'Ini adalah keterangan', '190000', '190000', 1),
	(126, 1, 'Kg', 'MAT000126', 'Thiner', 'Ini adalah keterangan', '11833.33333', '11833.33333', 1),
	(127, 1, 'Bh', 'MAT000127', 'Topi uskup tb. 8 cm', 'Ini adalah keterangan', '2583.333333', '2583.333333', 1),
	(128, 1, 'Lbr', 'MAT000128', 'Triplek 6 mm', 'Ini adalah keterangan', '85000', '85000', 1),
	(129, 1, 'M2', 'MAT000129', 'Wiremesh M-5', 'Ini adalah keterangan', '19841.26984', '19841.26984', 1),
	(130, 1, 'M2', 'MAT000130', 'zincalume 0,35mm ex. Bluescope', 'Ini adalah keterangan', '86500', '86500', 1),
	(131, 1, 'Kg', 'MAT000131', 'Kolom WF 150,75,5,7 mm', 'Ini adalah keterangan', '9500', '9500', 1),
	(132, 1, 'Kg', 'MAT000132', 'Rafter WF 150,75,5,7 mm', 'Ini adalah keterangan', '9500', '9500', 1),
	(133, 1, 'Kg', 'MAT000133', 'Stiffener  WF untuk Sambungan  Plat Simpul (Kolom & Rafter)', 'Ini adalah keterangan', '9500', '9500', 1),
	(134, 1, 'Kg', 'MAT000134', 'Konsul (Potongan WF 150,75,5,7 mm)', 'Ini adalah keterangan', '9500', '9500', 1),
	(135, 1, 'Kg', 'MAT000135', 'Konsul Talang Air ( WF 150,75,5,7 mm)', 'Ini adalah keterangan', '9500', '9500', 1),
	(136, 1, 'Kg', 'MAT000136', 'Gording CNP 100,50,20,2.3', 'Ini adalah keterangan', '6500', '6500', 1),
	(137, 1, 'Kg', 'MAT000137', 'Gording Konsul CNP 100,50,20,2.3', 'Ini adalah keterangan', '6500', '6500', 1),
	(138, 1, 'Kg', 'MAT000138', 'Plat Tapak  / Base Plate MS - 9 mm', 'Ini adalah keterangan', '9500', '9500', 1),
	(139, 1, 'Kg', 'MAT000139', 'Plat simpul / rib  MS - 9 mm utk (Konsul,Kolom & Rafter)', 'Ini adalah keterangan', '9500', '9500', 1),
	(140, 1, 'Kg', 'MAT000140', 'Plat gording & Regel  MS - 6 mm ', 'Ini adalah keterangan', '9500', '9500', 1),
	(141, 1, 'Kg', 'MAT000141', 'Regel Double CNP  100,50,20,2.3', 'Ini adalah keterangan', '6500', '6500', 1),
	(142, 1, 'Kg', 'MAT000142', 'Regel  Gigi Anjing  ? 10 mm ', 'Ini adalah keterangan', '7950', '7950', 1),
	(143, 1, 'Kg', 'MAT000143', 'Trekstang ? 10 mm ', 'Ini adalah keterangan', '7950', '7950', 1),
	(144, 1, 'Kg', 'MAT000144', 'Ikatan angin ? 16 mm', 'Ini adalah keterangan', '7950', '7950', 1),
	(145, 1, 'Bh', 'MAT000145', 'Jarum pengeras 5/8"', 'Ini adalah keterangan', '24150', '24150', 1),
	(146, 1, 'Bh', 'MAT000146', 'Angker Baut  ? 3/4" - 70 cm', 'Ini adalah keterangan', '32600', '32600', 1),
	(147, 1, 'Bh', 'MAT000147', 'Baut mur (sambungan) ?3/4" x 2"', 'Ini adalah keterangan', '5925', '5925', 1),
	(148, 1, 'Bh', 'MAT000148', 'Baut + Mur trekstang ? 3/8 - 1 "', 'Ini adalah keterangan', '510', '510', 1),
	(149, 1, 'Bh', 'MAT000149', 'Baut + Mur gording ? 1/2 - 1 1/2 "', 'Ini adalah keterangan', '1015', '1015', 1),
	(150, 1, 'M2', 'MAT000150', 'Pintu Gudang Plat Besi  uk (4.5 x 6.5 )m (By Sub Kont)include rel pintu', 'Ini adalah keterangan', '600000', '600000', 1),
	(151, 1, 'M2', 'MAT000151', 'Atap Zincalumn 0,35 mm, Ex. Utomo deck ', 'Ini adalah keterangan', '57000', '57000', 1),
	(152, 1, 'M', 'MAT000152', 'Nok Galvalumn 0,35 mm, Lebar 90 cm', 'Ini adalah keterangan', '24500', '24500', 1),
	(153, 1, 'Bh', 'MAT000153', 'Drilling screw', 'Ini adalah keterangan', '350', '350', 1),
	(154, 1, 'Doz', 'MAT000154', 'Paku Riffet', 'Ini adalah keterangan', '654000', '654000', 1),
	(155, 1, 'Bh', 'MAT000155', 'Dynabolt M -16', 'Ini adalah keterangan', '2250', '2250', 1),
	(156, 1, 'M', 'MAT000156', 'Talang datar Galvalumn 0,4 mm x 900 mm', 'Ini adalah keterangan', '38000', '38000', 1),
	(157, 1, 'Kg', 'MAT000157', 'Beugel talang + talang tegak  plat strip 5 mm x 30 mm', 'Ini adalah keterangan', '11500', '11500', 1),
	(158, 1, 'M', 'MAT000158', 'Flashing galvalum 0.35 mm x 450mm', 'Ini adalah keterangan', '53000', '53000', 1),
	(159, 1, 'Bh', 'MAT000159', 'Jorongan talang', 'Ini adalah keterangan', '20000', '20000', 1),
	(160, 1, 'Ball', 'MAT000160', 'COBA BARANG', '', '193133', NULL, 0),
	(161, 1, 'Ball', 'MAT000161', 'MATERIAL 1 COBA', '', '32532532', NULL, 1),
	(162, 1, 'M3', 'MAT000162', 'Cor K-225 Ready mix t.10 cm', '', '759033', NULL, 1),
	(163, 1, 'Kg', 'MAT000163', 'Besi 10-150', '', '7950', NULL, 1);
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
  `UPAH_HARGA` varchar(100) DEFAULT NULL,
  `UPAH_ACTIVE` int(11) DEFAULT '1',
  `LOKASI_UPAH_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`UPAH_ID`),
  KEY `FK_RELATIONSHIP_15` (`SATUAN_UPAH_ID`),
  KEY `FK_lokasi_id` (`LOKASI_UPAH_ID`),
  CONSTRAINT `FK_lokasi_id` FOREIGN KEY (`LOKASI_UPAH_ID`) REFERENCES `lokasi_upah` (`LOKASI_UPAH_ID`),
  CONSTRAINT `FK_master_upah` FOREIGN KEY (`SATUAN_UPAH_ID`) REFERENCES `satuan_upah` (`SATUAN_UPAH_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.master_upah: ~21 rows (approximately)
DELETE FROM `master_upah`;
/*!40000 ALTER TABLE `master_upah` DISABLE KEYS */;
INSERT INTO `master_upah` (`UPAH_ID`, `SATUAN_UPAH_ID`, `UPAH_KODE`, `UPAH_NAMA`, `UPAH_HARGA`, `UPAH_ACTIVE`, `LOKASI_UPAH_ID`) VALUES
	(32, 2, 'UPH0001', 'Upah Kerja Borongan Pagar Sementara Dari Gedeg t. 2m', '15000', 1, 1),
	(33, 2, 'UPH0002', 'Upah Kerja Borongan Pagar Dari Seng Gelombang t= 2 m', '22500', 1, 1),
	(34, 3, 'UPH0003', 'Upah Kerja Borongan Direksi Keet + Rabat 3x6m', '100000', 1, 1),
	(35, 2, 'UPH0004', 'Upah Kerja Borongan Bouwplank', '5000', 1, 1),
	(36, 4, 'UPH0005', 'Upah Kerja Borongan Galian Tanah', '45000', 1, 1),
	(37, 4, 'UPH006', 'Upah Kerja Borongan Urugan Tanah  Kembali', '17500', 1, 1),
	(38, 4, 'UPH0007', 'Upah Kerja Borongan Urugan Sirtu + Pemadatan', '30000', 1, 1),
	(39, 4, 'UPH0008', 'Upah Kerja Borongan Urugan pasir', '5000', 1, 1),
	(40, 4, 'UPH0009', 'Upah Kerja Borongan Urugan Tanah  Perataan & Pemadatan', '26000', 1, 1),
	(41, 4, 'UPH0010', 'Upah Kerja Borongan Buang Tanah  Sementara', '16000', 1, 1),
	(42, 4, 'UPH0011', 'Upah Kerja Borongan Buang Tanah  Keluar Lokasi', '75000', 1, 1),
	(43, 4, 'UPH0012', 'Upah Kerja Borongan Buang Gragal  Keluar Lokasi', '30000', 1, 1),
	(44, 1, 'UPH.HARIAN.001', 'Pekerja', '60000', 1, 1),
	(45, 1, 'UPH.HARIAN.002', 'TUKANG BATU', '75000', 1, 1),
	(46, 1, 'UPH.HARIAN.003', 'KEPALA TUKANG BATU', '80000', 1, 1),
	(47, 1, 'UPH.HARIAN.004', '  Mandor', '95000', 1, 1),
	(48, 3, 'UPH0013', 'Upah Kerja Borongan Lantai kerja tb 5cm (site mix)', '8000', 1, 1),
	(49, 4, 'UPH0014', 'Upah Cor K-225 Ready mix t.15 cm', '35000', 1, 1),
	(50, 5, 'UPH0015', 'Upah pembesian', '2000', 1, 1),
	(51, 3, 'UPH0016', 'Upah Plastic sheet', '1500', 1, 1),
	(52, 3, 'UPH0017', 'Upah Floor hardenner ex. Sika natural color 3 kg/m2', '6000', 1, 1);
/*!40000 ALTER TABLE `master_upah` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.modules
CREATE TABLE IF NOT EXISTS `modules` (
  `MODULES_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MODULES_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`MODULES_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.modules: ~40 rows (approximately)
DELETE FROM `modules`;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
INSERT INTO `modules` (`MODULES_ID`, `MODULES_NAMA`) VALUES
	(1, 'accounting'),
	(2, 'login'),
	(3, 'dashboard'),
	(4, 'estimasi'),
	(5, 'file'),
	(6, 'master'),
	(7, 'modules'),
	(8, 'monitor'),
	(9, 'p-material'),
	(10, 'p-upah'),
	(11, 'project'),
	(12, 'rabs'),
	(13, 'raps'),
	(14, 'report'),
	(15, 'pengguna'),
	(16, 'jabatan'),
	(17, 'departemen'),
	(18, 'role'),
	(19, 'analisa'),
	(20, 'lpu'),
	(21, 'op'),
	(22, 'pk'),
	(23, 'bayar_upah'),
	(24, 'bpm'),
	(25, 'lpb'),
	(26, 'pb'),
	(27, 'po'),
	(28, 'pp'),
	(29, 'surat_jalan'),
	(30, 'barang'),
	(31, 'gudang'),
	(32, 'kategorisupplier'),
	(33, 'overhead'),
	(34, 'pajak'),
	(35, 'supplier'),
	(36, 'upah'),
	(37, 'estimasi'),
	(38, 'mainproject'),
	(39, 'perusahaan'),
	(40, 'top');
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.overhead
CREATE TABLE IF NOT EXISTS `overhead` (
  `OVERHEAD_ID` int(11) NOT NULL AUTO_INCREMENT,
  `RAB_ID` int(11) DEFAULT NULL,
  `OVERHEAD_KODE` varchar(50) DEFAULT NULL,
  `OVERHEAD_NAMA` varchar(500) DEFAULT NULL,
  `OVERHEAD_ACTIVE` int(11) DEFAULT NULL,
  `OVERHEAD_TOTAL` varchar(100) DEFAULT NULL,
  `OVERHEAD_TIPE` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`OVERHEAD_ID`),
  KEY `FK_RAB_ID_OVER` (`RAB_ID`),
  CONSTRAINT `FK_RAB_ID_OVER` FOREIGN KEY (`RAB_ID`) REFERENCES `rab_transaction` (`RAB_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.overhead: ~1 rows (approximately)
DELETE FROM `overhead`;
/*!40000 ALTER TABLE `overhead` DISABLE KEYS */;
INSERT INTO `overhead` (`OVERHEAD_ID`, `RAB_ID`, `OVERHEAD_KODE`, `OVERHEAD_NAMA`, `OVERHEAD_ACTIVE`, `OVERHEAD_TOTAL`, `OVERHEAD_TIPE`) VALUES
	(1, 5, '001/MOV/RAB_GERBANG/IV/2015', 'OVERHEAD_RAB_GERBANG', 1, '3590000', 'barang');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.paket_overhead_material: ~1 rows (approximately)
DELETE FROM `paket_overhead_material`;
/*!40000 ALTER TABLE `paket_overhead_material` DISABLE KEYS */;
INSERT INTO `paket_overhead_material` (`PAKET_OVERHEAD_MATERIAL_ID`, `SATUAN_NAMA`, `PAKET_OVERHEAD_MATERIAL_NAMA`, `PAKET_OVERHEAD_MATERIAL_HARGA`, `PAKET_OVERHEAD_MATERIAL_KETERANGAN`) VALUES
	(4, 'Set', 'Sewa Alat Berat', '500000', NULL);
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
  CONSTRAINT `FK_RELATIONSHIP_51` FOREIGN KEY (`VALIDATOR_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_RELATIONSHIP_55` FOREIGN KEY (`PETUGAS_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_RELATIONSHIP_56` FOREIGN KEY (`SUPPLIER_ID`) REFERENCES `master_supplier` (`SUPPLIER_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_RELATIONSHIP_58` FOREIGN KEY (`STATUS_LPB_ID`) REFERENCES `status_lpb` (`STATUS_LPB_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.penerimaan_barang: ~2 rows (approximately)
DELETE FROM `penerimaan_barang`;
/*!40000 ALTER TABLE `penerimaan_barang` DISABLE KEYS */;
INSERT INTO `penerimaan_barang` (`PENERIMAAN_BARANG_ID`, `PETUGAS_ID`, `SUPPLIER_ID`, `VALIDATOR_ID`, `STATUS_LPB_ID`, `PENERIMAAN_BARANG_KODE`, `PENERIMAAN_BARANG_TANGGAL`, `LPB_SURAT_JALAN`, `LPB_KENDARAAN`, `LPB_EXPEDISI`) VALUES
	(9, NULL, NULL, NULL, 2, ' 001/LPB/RAB_GERBANG/IV/2015', '2015-04-08 10:44:58', '888888', 'L 123 KK', NULL),
	(10, NULL, NULL, NULL, 2, '002/LPB/RAB_GERBANG/IV/2015', '2015-04-08 10:52:15', '364552', 'L 123 KK', NULL);
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
  PRIMARY KEY (`PENGGUNA_ID`),
  KEY `fk_departemen` (`DEPARTEMEN_ID`),
  CONSTRAINT `fk_departemen` FOREIGN KEY (`DEPARTEMEN_ID`) REFERENCES `departemen` (`DEPARTEMEN_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.pengguna: ~4 rows (approximately)
DELETE FROM `pengguna`;
/*!40000 ALTER TABLE `pengguna` DISABLE KEYS */;
INSERT INTO `pengguna` (`PENGGUNA_ID`, `DEPARTEMEN_ID`, `PENGGUNA_NAMA`, `PENGGUNA_USERNAME`, `PENGGUNA_PASSWORD`, `PENGGUNA_PASSWORD_VAL`, `PENGGUNA_EMAIL`, `PENGGUNA_HP`, `PENGGUNA_ACTIVE`, `PENGGUNA_DAFTAR`) VALUES
	(1, 4, 'Administrator', 'administrator', '25d55ad283aa400af464c76d713c07ad', '0', 'admin@admin.com', '0812345678', 1, '2015-04-04 00:16:43'),
	(2, 4, 'Dmitri Chaniyago', 'demit', '25d55ad283aa400af464c76d713c07ad', '0', '', '', 1, '2015-03-04 11:05:20'),
	(3, 1, 'Ardiansyah Baskara', 'ade', '25d55ad283aa400af464c76d713c07ad', '0', '', '', 1, '2015-03-04 11:05:51'),
	(4, 2, 'Sukma Ardianto', 'sukma', '25d55ad283aa400af464c76d713c07ad', '0', '', '', 1, '2015-03-04 11:06:27');
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

-- Dumping data for table kztszete_pm.penggunaxroles: ~1 rows (approximately)
DELETE FROM `penggunaxroles`;
/*!40000 ALTER TABLE `penggunaxroles` DISABLE KEYS */;
INSERT INTO `penggunaxroles` (`PENGGUNA_ID`, `ROLE_ID`) VALUES
	(1, 1);
/*!40000 ALTER TABLE `penggunaxroles` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.penugasan
CREATE TABLE IF NOT EXISTS `penugasan` (
  `PENUGASAN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PENUGASAN_NAMA` longtext,
  PRIMARY KEY (`PENUGASAN_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.penugasan: ~5 rows (approximately)
DELETE FROM `penugasan`;
/*!40000 ALTER TABLE `penugasan` DISABLE KEYS */;
INSERT INTO `penugasan` (`PENUGASAN_ID`, `PENUGASAN_NAMA`) VALUES
	(1, 'creator'),
	(2, 'estimator'),
	(3, 'pm'),
	(4, 'pp'),
	(5, 'po');
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
  CONSTRAINT `FK_RAB_PK` FOREIGN KEY (`RAB_ID`) REFERENCES `rab_transaction` (`RAB_ID`),
  CONSTRAINT `FK_STATUS_PK` FOREIGN KEY (`STATUS_PK_ID`) REFERENCES `status_pk` (`STATUS_PK_ID`),
  CONSTRAINT `FK_VALID_ID` FOREIGN KEY (`VALIDATOR_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='INFO:\r\nPermintaan pekerjaan Nama saya Hapus !!!!. Nanti cukup kode saja';

-- Dumping data for table kztszete_pm.permintaan_pekerjaan: ~0 rows (approximately)
DELETE FROM `permintaan_pekerjaan`;
/*!40000 ALTER TABLE `permintaan_pekerjaan` DISABLE KEYS */;
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
  `PERMINTAAN_PEMBELIAN_NAMA` varchar(50) DEFAULT NULL,
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
  CONSTRAINT `FK_RELATIONSHIP_50` FOREIGN KEY (`VALIDATOR_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `FK_REL_RAB_PP` FOREIGN KEY (`RAB_ID`) REFERENCES `rab_transaction` (`RAB_ID`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.permintaan_pembelian: ~3 rows (approximately)
DELETE FROM `permintaan_pembelian`;
/*!40000 ALTER TABLE `permintaan_pembelian` DISABLE KEYS */;
INSERT INTO `permintaan_pembelian` (`PERMINTAAN_PEMBELIAN_ID`, `VALIDATOR_ID`, `STATUS_PP_ID`, `PETUGAS_ID`, `RAB_ID`, `TOTAL_HARGA_PP`, `KATEGORI_PP_ID`, `GUDANG_ID`, `PERMINTAAN_PEMBELIAN_NAMA`, `PERMINTAAN_PEMBELIAN_KODE`, `PERMINTAAN_PEMBELIAN_TANGGAL`) VALUES
	(2, NULL, 2, NULL, 5, NULL, 2, 13, NULL, '001/PP/RAB_GERBANG/IV/2015', '2015-04-07 23:44:11'),
	(3, NULL, 2, NULL, 5, NULL, 2, 13, NULL, '002/PP/RAB_GERBANG/IV/2015', '2015-04-07 20:55:58'),
	(4, NULL, 2, NULL, 5, NULL, 1, 13, NULL, '001/PPOV/RAB_GERBANG/IV/2015', '2015-04-07 23:32:03');
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
  `PROJECT_STATUS` int(11) DEFAULT NULL,
  `PROJECT_URL_FOLDER` varchar(256) DEFAULT NULL,
  `MAIN_PROJECT_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`PROJECT_ID`),
  KEY `FK_STATUS_PROJ` (`PROJECT_STATUS`),
  KEY `FK_main_project` (`MAIN_PROJECT_ID`),
  CONSTRAINT `FK_main_project` FOREIGN KEY (`MAIN_PROJECT_ID`) REFERENCES `main_project` (`MAIN_PROJECT_ID`),
  CONSTRAINT `FK_STATUS_PROJ` FOREIGN KEY (`PROJECT_STATUS`) REFERENCES `status_project` (`STATUS_PROJECT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.project: ~1 rows (approximately)
DELETE FROM `project`;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` (`PROJECT_ID`, `PROJECT_NAMA`, `PROJECT_KODE`, `PROJECT_ACTIVE`, `PROJECT_CREATE`, `PROJECT_DESCRIPTION`, `PROJECT_STATUS`, `PROJECT_URL_FOLDER`, `MAIN_PROJECT_ID`) VALUES
	(1, 'PEMBANGUNAN GERBANG MASUK WAHANA', 'PRO00001', 1, '2015-04-07 18:31:43', '', NULL, NULL, 4);
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COMMENT='TANGGAL HARUS BAYAR diisi number dalam satuan hari. Ditujukk';

-- Dumping data for table kztszete_pm.purchase_order: ~2 rows (approximately)
DELETE FROM `purchase_order`;
/*!40000 ALTER TABLE `purchase_order` DISABLE KEYS */;
INSERT INTO `purchase_order` (`PURCHASE_ORDER_ID`, `RAB_ID`, `SUPPLIER_ID`, `STATUS_PO_ID`, `KATEGORI_PAJAK_ID`, `PAJAK_ID`, `PETUGAS_ID`, `VALIDATOR_ID`, `GUDANG_ID`, `TOP_ID`, `KATEGORI_PP_ID`, `PURCHASE_ORDER_KODE`, `PURCHASE_ORDER_TANGGAL`, `PURCHASE_ORDER_TOTAL`, `TANGGAL_HARUS_BAYAR`) VALUES
	(8, 5, 5, 2, 2, 2, NULL, NULL, 13, 16, 2, '001/PO/RAB_GERBANG/IV/2015', '2015-04-08 11:10:05', '4398750', NULL),
	(10, 5, 5, 2, 3, 2, NULL, NULL, 13, 16, 1, '001/POOV/RAB_GERBANG/IV/2015', '2015-04-08 11:10:15', '1715000', NULL);
/*!40000 ALTER TABLE `purchase_order` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.rab_status_approval
CREATE TABLE IF NOT EXISTS `rab_status_approval` (
  `RAB_STATUS_APPROVAL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `RAB_STATUS_APPROVAL_NAMA` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`RAB_STATUS_APPROVAL_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.rab_status_approval: ~3 rows (approximately)
DELETE FROM `rab_status_approval`;
/*!40000 ALTER TABLE `rab_status_approval` DISABLE KEYS */;
INSERT INTO `rab_status_approval` (`RAB_STATUS_APPROVAL_ID`, `RAB_STATUS_APPROVAL_NAMA`) VALUES
	(1, 'Draft'),
	(2, 'On Validation'),
	(3, 'Validated');
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
  PRIMARY KEY (`RAB_ID`),
  KEY `FK_ESTIMATOR` (`ESTIMATOR_ID`),
  KEY `FK_RELATIONSHIP_24` (`RAB_STATUS_APPROVAL_ID`),
  KEY `FK_PROJECT` (`PROJECT_ID`),
  KEY `FK_VALIDATOR_RAB` (`VALIDATOR_ID`),
  KEY `FK_rab_lokasi` (`LOKASI_UPAH_ID`),
  CONSTRAINT `FK_ESTIMATOR` FOREIGN KEY (`ESTIMATOR_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`),
  CONSTRAINT `FK_PROJECT` FOREIGN KEY (`PROJECT_ID`) REFERENCES `project` (`PROJECT_ID`),
  CONSTRAINT `FK_rab_lokasi` FOREIGN KEY (`LOKASI_UPAH_ID`) REFERENCES `lokasi_upah` (`LOKASI_UPAH_ID`),
  CONSTRAINT `FK_RELATIONSHIP_24` FOREIGN KEY (`RAB_STATUS_APPROVAL_ID`) REFERENCES `rab_status_approval` (`RAB_STATUS_APPROVAL_ID`),
  CONSTRAINT `FK_VALIDATOR_RAB` FOREIGN KEY (`VALIDATOR_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.rab_transaction: ~1 rows (approximately)
DELETE FROM `rab_transaction`;
/*!40000 ALTER TABLE `rab_transaction` DISABLE KEYS */;
INSERT INTO `rab_transaction` (`RAB_ID`, `RAB_STATUS_APPROVAL_ID`, `ESTIMATOR_ID`, `VALIDATOR_ID`, `PROJECT_ID`, `RAB_NAMA`, `RAB_KODE`, `RAB_MATERIAL`, `RAB_UPAH`, `RAB_TOTAL`, `RAB_AFTER_OVERHEAD`, `RAB_ACTIVE`, `RAB_CREATE`, `ESTIMASI_UMUR_BANGUNAN`, `ESTIMASI_JUMLAH_ORANG`, `ESTIMASI_CUACA`, `ESTIMASI_TOTAL_WAKTU`, `LOKASI_UPAH_ID`) VALUES
	(5, 1, 1, NULL, 1, 'RAB_GERBANG', '001/RAB/PRO00001/IV/2015', '173660382.1', '62108400', '235768782.1', '247557221.205', 1, '2015-04-07 20:36:14', NULL, NULL, NULL, NULL, 1);
/*!40000 ALTER TABLE `rab_transaction` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `ROLE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ROLE_NAMA` varchar(1000) DEFAULT NULL,
  `ROLE_ACTIVE` int(1) DEFAULT '1',
  PRIMARY KEY (`ROLE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.roles: ~4 rows (approximately)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`ROLE_ID`, `ROLE_NAMA`, `ROLE_ACTIVE`) VALUES
	(1, 'Administrator', 1),
	(2, 'Manajer', 1),
	(3, 'Operator', 1),
	(4, 'Supervisor', 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.status_lpb: ~3 rows (approximately)
DELETE FROM `status_lpb`;
/*!40000 ALTER TABLE `status_lpb` DISABLE KEYS */;
INSERT INTO `status_lpb` (`STATUS_LPB_ID`, `STATUS_LPB_NAMA`) VALUES
	(1, 'Draft'),
	(2, 'On Validation'),
	(3, 'Validated');
/*!40000 ALTER TABLE `status_lpb` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.status_pk
CREATE TABLE IF NOT EXISTS `status_pk` (
  `STATUS_PK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `STATUS_PK_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`STATUS_PK_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.status_pk: ~0 rows (approximately)
DELETE FROM `status_pk`;
/*!40000 ALTER TABLE `status_pk` DISABLE KEYS */;
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

-- Dumping data for table kztszete_pm.status_project: ~0 rows (approximately)
DELETE FROM `status_project`;
/*!40000 ALTER TABLE `status_project` DISABLE KEYS */;
/*!40000 ALTER TABLE `status_project` ENABLE KEYS */;


-- Dumping structure for table kztszete_pm.stok
CREATE TABLE IF NOT EXISTS `stok` (
  `RAB_ID` int(11) NOT NULL,
  `BARANG_ID` int(11) NOT NULL,
  `VOLUME` varchar(100) NOT NULL,
  PRIMARY KEY (`RAB_ID`,`BARANG_ID`),
  KEY `FK_BARANG_ID` (`BARANG_ID`),
  CONSTRAINT `FK_BARANG_ID` FOREIGN KEY (`BARANG_ID`) REFERENCES `master_barang` (`BARANG_ID`),
  CONSTRAINT `FK_RAB_ID_STOK` FOREIGN KEY (`RAB_ID`) REFERENCES `rab_transaction` (`RAB_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Berisi data-data items dari stok barang RAB.\r\n';

-- Dumping data for table kztszete_pm.stok: ~3 rows (approximately)
DELETE FROM `stok`;
/*!40000 ALTER TABLE `stok` DISABLE KEYS */;
INSERT INTO `stok` (`RAB_ID`, `BARANG_ID`, `VOLUME`) VALUES
	(5, 4, '2'),
	(5, 97, '5'),
	(5, 117, '5');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.subcon: ~1 rows (approximately)
DELETE FROM `subcon`;
/*!40000 ALTER TABLE `subcon` DISABLE KEYS */;
INSERT INTO `subcon` (`SUBCON_ID`, `SATUAN_NAMA`, `SUBCON_NAMA`, `SUBCON_HARGA`, `SUBCON_KETERANGAN`) VALUES
	(9, 'Ball', 'Sewa Listrik dan Penerangan', '1000000', NULL);
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
  CONSTRAINT `FK_RELATIONSHIP_28` FOREIGN KEY (`MODULE_ID`) REFERENCES `rab_transaction` (`RAB_ID`),
  CONSTRAINT `FK_RELATIONSHIP_29` FOREIGN KEY (`PENGGUNA_ID`) REFERENCES `pengguna` (`PENGGUNA_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kztszete_pm.validasi: ~0 rows (approximately)
DELETE FROM `validasi`;
/*!40000 ALTER TABLE `validasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `validasi` ENABLE KEYS */;


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
	`ANALISA_ID` INT(11) NOT NULL,
	`ANALISA_KODE` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`SATUAN` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`VOLUME` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
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
	`SATUAN_NAMA` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`KATEGORI_ANALISA_ID` INT(11) NULL,
	`LOKASI_UPAH_ID` INT(11) NULL,
	`ANALISA_KODE` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`ANALISA_NAMA` VARCHAR(1000) NULL COLLATE 'latin1_swedish_ci',
	`ANALISA_TOTAL` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`ANALISA_ACTIVE` INT(11) NULL,
	`DETAIL_PEKERJAAN_TOTAL` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`ANALISA_VOLUME` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`ANALISA_VOLUME_SISA` DOUBLE NULL,
	`UPAH_ANALISA_HARGA` DOUBLE NULL
) ENGINE=MyISAM;


-- Dumping structure for view kztszete_pm.view_pp
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_pp` (
	`PERMINTAAN_PEMBELIAN_ID` INT(11) NOT NULL,
	`PERMINTAAN_PEMBELIAN_NAMA` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
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


-- Dumping structure for trigger kztszete_pm.rab_transaction_before_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='';
DELIMITER //
CREATE TRIGGER `rab_transaction_before_insert` BEFORE INSERT ON `rab_transaction` FOR EACH ROW BEGIN
  declare incre int default 0;
  declare kode varchar(50) default 'RAB';
  declare kodePro varchar(50) default '';
  declare bulan varchar(50) default '';
  declare tahun varchar(50) default '';
  
  select PROJECT_KODE into kodePro from project where PROJECT_ID=NEW.PROJECT_ID;
  
  select month(now()) into bulan;
  select year(now()) into tahun;
  
  set NEW.RAB_KODE = CONCAT(LPAD(incre,3,0),'/',kode,'/',kodePro,'/',bulan,'/',tahun);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Dumping structure for view kztszete_pm.view_overhead_bahan
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `view_overhead_bahan`;
CREATE ALGORITHM=UNDEFINED   SQL SECURITY DEFINER VIEW `view_overhead_bahan` AS select `overhead`.`RAB_ID` AS `RAB_ID`,'Overhead Material' AS `KATEGORI_OVERHEAD`,`detail_overhead`.`DETAIL_OVERHEAD_ID` AS `DETAIL_OVERHEAD_ID`,`detail_overhead`.`BARANG_ID` AS `OVERHEAD_MATERIAL_ID`,`master_barang`.`BARANG_KODE` AS `OVERHEAD_MATERIAL_KODE`,`master_barang`.`BARANG_NAMA` AS `OVERHEAD_MATERIAL_NAMA`,`detail_overhead`.`OVERHEAD_ID` AS `OVERHEAD_ID`,(`detail_overhead`.`DETAIL_OVERHEAD_KOEFISIEN` - ifnull((select ifnull(sum(`vPP`.`VOLUME_PP`),0) from `view_pp` `vPP` where ((`vPP`.`RAB_ID` = `overhead`.`RAB_ID`) and (`vPP`.`BARANG_ID` = `detail_overhead`.`BARANG_ID`) and (`vPP`.`KATEGORI_PP_ID` = 1)) group by `vPP`.`BARANG_ID`),0)) AS `VOLUME_SISA`,`detail_overhead`.`DETAIL_OVERHEAD_KOEFISIEN` AS `TOTAL_VOLUME`,`detail_overhead`.`DETAIL_OVERHEAD_HARGA` AS `HARGA_SATUAN`,`detail_overhead`.`DETAIL_OVERHEAD_TOTAL` AS `TOTAL_HARGA`,`master_barang`.`SATUAN_NAMA` AS `SATUAN_NAMA`,`overhead`.`OVERHEAD_KODE` AS `OVERHEAD_KODE`,`overhead`.`OVERHEAD_NAMA` AS `OVERHEAD_NAMA`,`overhead`.`OVERHEAD_TIPE` AS `OVERHEAD_TIPE` from ((`detail_overhead` join `master_barang` on((`detail_overhead`.`BARANG_ID` = `master_barang`.`BARANG_ID`))) join `overhead` on((`detail_overhead`.`OVERHEAD_ID` = `overhead`.`OVERHEAD_ID`))) where (`overhead`.`OVERHEAD_TIPE` = 'barang');


-- Dumping structure for view kztszete_pm.view_overhead_paket_bahan
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `view_overhead_paket_bahan`;
CREATE ALGORITHM=UNDEFINED   SQL SECURITY DEFINER VIEW `view_overhead_paket_bahan` AS select `overhead`.`RAB_ID` AS `RAB_ID`,'Paket Overhead Material' AS `KATEGORI_OVERHEAD`,`detail_overhead`.`DETAIL_OVERHEAD_ID` AS `DETAIL_OVERHEAD_ID`,`paket_overhead_material`.`PAKET_OVERHEAD_MATERIAL_ID` AS `OVERHEAD_MATERIAL_ID`,'LS' AS `OVERHEAD_MATERIAL_KODE`,`paket_overhead_material`.`PAKET_OVERHEAD_MATERIAL_NAMA` AS `OVERHEAD_MATERIAL_NAMA`,`detail_overhead`.`OVERHEAD_ID` AS `OVERHEAD_ID`,(`detail_overhead`.`DETAIL_OVERHEAD_KOEFISIEN` - ifnull((select ifnull(sum(`vPP`.`VOLUME_PP`),0) from `view_pp` `vPP` where ((`vPP`.`RAB_ID` = `overhead`.`RAB_ID`) and (`vPP`.`BARANG_ID` = `detail_overhead`.`PAKET_OVERHEAD_MATERIAL_ID`) and (`vPP`.`KATEGORI_PP_ID` = 1)) group by `vPP`.`BARANG_ID`),0)) AS `VOLUME_SISA`,`detail_overhead`.`DETAIL_OVERHEAD_KOEFISIEN` AS `TOTAL_VOLUME`,`detail_overhead`.`DETAIL_OVERHEAD_HARGA` AS `HARGA_SATUAN`,`detail_overhead`.`DETAIL_OVERHEAD_TOTAL` AS `TOTAL_HARGA`,`paket_overhead_material`.`SATUAN_NAMA` AS `SATUAN_NAMA`,`overhead`.`OVERHEAD_KODE` AS `OVERHEAD_KODE`,`overhead`.`OVERHEAD_NAMA` AS `OVERHEAD_NAMA`,`overhead`.`OVERHEAD_TIPE` AS `OVERHEAD_TIPE` from ((`detail_overhead` join `paket_overhead_material` on((`detail_overhead`.`PAKET_OVERHEAD_MATERIAL_ID` = `paket_overhead_material`.`PAKET_OVERHEAD_MATERIAL_ID`))) join `overhead` on((`detail_overhead`.`OVERHEAD_ID` = `overhead`.`OVERHEAD_ID`))) where (`overhead`.`OVERHEAD_TIPE` = 'barang');


-- Dumping structure for view kztszete_pm.view_pk
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `view_pk`;
CREATE ALGORITHM=UNDEFINED   SQL SECURITY DEFINER VIEW `view_pk` AS select `rab`.`RAB_ID` AS `RAB_ID`,`rab`.`RAB_KODE` AS `RAB_KODE`,`rab`.`RAB_TOTAL` AS `RAB_TOTAL`,`rab`.`RAB_AFTER_OVERHEAD` AS `RAB_AFTER_OVERHEAD`,`pk`.`PERMINTAAN_PEKERJAAN_ID` AS `PK_ID`,`pk`.`PERMINTAAN_PEKERJAAN_KODE` AS `PK_KODE`,`pk`.`PERMINTAAN_PEKERJAAN_TANGGAL` AS `PK_TANGGAL`,`pk`.`STATUS_PK_ID` AS `STATUS_PK_ID`,`pk_status`.`STATUS_PK_NAMA` AS `STATUS_PK_NAMA`,`pk`.`KATEGORI_PK_ID` AS `KATEGORI_PK_ID`,`kategori`.`KATEGORI_PK_NAMA` AS `KATEGORI_PK_NAMA`,`pk`.`PETUGAS_ID` AS `PETUGAS_ID`,`petugas`.`PENGGUNA_NAMA` AS `PETUGAS_NAMA`,`pk`.`VALIDATOR_ID` AS `VALIDATOR_ID`,`validator`.`PENGGUNA_NAMA` AS `VALIDATOR_NAMA`,`detail`.`VOLUME_PK` AS `VOLUME_PK`,`ma`.`ANALISA_ID` AS `ANALISA_ID`,`ma`.`ANALISA_KODE` AS `ANALISA_KODE`,`ma`.`SATUAN_NAMA` AS `SATUAN`,`dp`.`DETAIL_PEKERJAAN_VOLUME` AS `VOLUME`,sum(`da`.`DETAIL_ANALISA_TOTAL`) AS `HARGA_SATUAN` from (((((((((`permintaan_pekerjaan` `pk` left join `rab_transaction` `rab` on((`pk`.`RAB_ID` = `rab`.`RAB_ID`))) left join `status_pk` `pk_status` on((`pk`.`STATUS_PK_ID` = `pk_status`.`STATUS_PK_ID`))) left join `kategori_pk` `kategori` on((`pk`.`KATEGORI_PK_ID` = `kategori`.`KATEGORI_PK_ID`))) left join `pengguna` `petugas` on((`pk`.`PETUGAS_ID` = `petugas`.`PENGGUNA_ID`))) left join `pengguna` `validator` on((`pk`.`VALIDATOR_ID` = `validator`.`PENGGUNA_ID`))) left join `detail_transaksi_pk` `detail` on((`detail`.`PERMINTAAN_PEKERJAAN_ID` = `pk`.`PERMINTAAN_PEKERJAAN_ID`))) join `master_analisa` `ma` on((`ma`.`ANALISA_ID` = `detail`.`ANALISA_ID`))) join `detail_analisa` `da` on((`da`.`ANALISA_ID` = `ma`.`ANALISA_ID`))) join `detail_pekerjaan` `dp` on((`dp`.`ANALISA_ID` = `ma`.`ANALISA_ID`))) where (`rab`.`RAB_ACTIVE` = 1) group by `ma`.`ANALISA_ID`;


-- Dumping structure for view kztszete_pm.view_pk_rap
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `view_pk_rap`;
CREATE ALGORITHM=UNDEFINED   SQL SECURITY DEFINER VIEW `view_pk_rap` AS select distinct `rab_transaction`.`RAB_ID` AS `RAB_ID`,`rab_transaction`.`RAB_KODE` AS `RAB_KODE`,`rab_transaction`.`RAB_NAMA` AS `RAB_NAMA`,`rab_transaction`.`RAB_TOTAL` AS `RAB_TOTAL`,`rab_transaction`.`RAB_AFTER_OVERHEAD` AS `RAB_AFTER_OVERHEAD`,`ma`.`ANALISA_ID` AS `ANALISA_ID`,`ma`.`SATUAN_NAMA` AS `SATUAN_NAMA`,`ma`.`KATEGORI_ANALISA_ID` AS `KATEGORI_ANALISA_ID`,`ma`.`LOKASI_UPAH_ID` AS `LOKASI_UPAH_ID`,`ma`.`ANALISA_KODE` AS `ANALISA_KODE`,`ma`.`ANALISA_NAMA` AS `ANALISA_NAMA`,`ma`.`ANALISA_TOTAL` AS `ANALISA_TOTAL`,`ma`.`ANALISA_ACTIVE` AS `ANALISA_ACTIVE`,ifnull(`dp`.`DETAIL_PEKERJAAN_TOTAL`,0) AS `DETAIL_PEKERJAAN_TOTAL`,`dp`.`DETAIL_PEKERJAAN_VOLUME` AS `ANALISA_VOLUME`,(`dp`.`DETAIL_PEKERJAAN_VOLUME` - ifnull((select ifnull(sum(`pk`.`VOLUME_PK`),0) from `view_pk` `pk` where ((`pk`.`RAB_ID` = `dp`.`RAB_ID`) and (`pk`.`ANALISA_ID` = `dp`.`ANALISA_ID`) and (`pk`.`KATEGORI_PK_ID` = 2)) group by `pk`.`ANALISA_ID`),0)) AS `ANALISA_VOLUME_SISA`,sum(`detail_analisa`.`DETAIL_ANALISA_TOTAL`) AS `UPAH_ANALISA_HARGA` from (((`master_analisa` `ma` left join `detail_pekerjaan` `dp` on((`ma`.`ANALISA_ID` = `dp`.`ANALISA_ID`))) left join `detail_analisa` on((`detail_analisa`.`ANALISA_ID` = `ma`.`ANALISA_ID`))) left join `rab_transaction` on((`rab_transaction`.`RAB_ID` = `dp`.`RAB_ID`))) where ((`rab_transaction`.`RAB_ACTIVE` = 1) and (`detail_analisa`.`UPAH_ID` is not null)) group by `rab_transaction`.`RAB_ID`,`ma`.`ANALISA_ID`;


-- Dumping structure for view kztszete_pm.view_pp
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `view_pp`;
CREATE ALGORITHM=UNDEFINED   SQL SECURITY DEFINER VIEW `view_pp` AS select `pp`.`PERMINTAAN_PEMBELIAN_ID` AS `PERMINTAAN_PEMBELIAN_ID`,`pp`.`PERMINTAAN_PEMBELIAN_NAMA` AS `PERMINTAAN_PEMBELIAN_NAMA`,`pp`.`PERMINTAAN_PEMBELIAN_KODE` AS `PERMINTAAN_PEMBELIAN_KODE`,`pp`.`PERMINTAAN_PEMBELIAN_TANGGAL` AS `PERMINTAAN_PEMBELIAN_TANGGAL`,`validator`.`PENGGUNA_ID` AS `VALIDATOR_ID`,`validator`.`PENGGUNA_NAMA` AS `VALIDATOR_NAMA`,`status_pp`.`STATUS_PP_ID` AS `STATUS_PP_ID`,`status_pp`.`STATUS_PP_NAMA` AS `STATUS_PP_NAMA`,`petugas`.`PENGGUNA_ID` AS `PETUGAS_ID`,`petugas`.`PENGGUNA_NAMA` AS `PETUGAS_NAMA`,`project`.`PROJECT_KODE` AS `PROJECT_KODE`,`project`.`PROJECT_ID` AS `PROJECT_ID`,`project`.`PROJECT_NAMA` AS `PROJECT_NAMA`,`project`.`PROJECT_ACTIVE` AS `PROJECT_ACTIVE`,`rab_transaction`.`RAB_ID` AS `RAB_ID`,`rab_transaction`.`RAB_NAMA` AS `RAB_NAMA`,`rab_transaction`.`RAB_TOTAL` AS `RAB_TOTAL`,`rab_transaction`.`RAB_AFTER_OVERHEAD` AS `RAB_AFTER_OVERHEAD`,`rab_transaction`.`RAB_ACTIVE` AS `RAB_ACTIVE`,`kategori_pp`.`KATEGORI_PP_ID` AS `KATEGORI_PP_ID`,`kategori_pp`.`KATEGORI_PP_NAMA` AS `KATEGORI_PP_NAMA`,`detail_transaksi_pp`.`BARANG_ID` AS `BARANG_ID`,`detail_transaksi_pp`.`SUBCON_ID` AS `SUBCON_ID`,`detail_transaksi_pp`.`VOLUME_PP` AS `VOLUME_PP`,(case ifnull(`detail_transaksi_pp`.`SUBCON_ID`,'NULL') when 'NULL' then (select `master_barang`.`BARANG_NAMA` AS `BARANG_NAMA`) else (select `subcon`.`SUBCON_NAMA` AS `BARANG_NAMA` from `subcon` where (`subcon`.`SUBCON_ID` = `detail_transaksi_pp`.`SUBCON_ID`)) end) AS `BARANG_NAMA`,(case ifnull(`detail_transaksi_pp`.`SUBCON_ID`,'NULL') when 'NULL' then (select `master_barang`.`BARANG_HARGA` AS `BARANG_HARGA`) else (select `subcon`.`SUBCON_HARGA` AS `SUBCON_HARGA` from `subcon` where (`subcon`.`SUBCON_ID` = `detail_transaksi_pp`.`SUBCON_ID`)) end) AS `BARANG_HARGA`,(case ifnull(`detail_transaksi_pp`.`SUBCON_ID`,'NULL') when 'NULL' then (select `master_barang`.`BARANG_KODE` AS `BARANG_KODE`) else convert((select 'SUBCON' AS `SUBCON`) using latin1) end) AS `BARANG_KODE`,(case ifnull(`detail_transaksi_pp`.`SUBCON_ID`,'NULL') when 'NULL' then (select `master_barang`.`SATUAN_NAMA` AS `SATUAN_NAMA`) else (select `subcon`.`SATUAN_NAMA` AS `SATUAN_NAMA` from `subcon` where (`subcon`.`SUBCON_ID` = `detail_transaksi_pp`.`SUBCON_ID`)) end) AS `SATUAN_NAMA`,`master_barang`.`KATEGORI_BARANG_ID` AS `KATEGORI_BARANG_ID`,`kategori_barang`.`KATEGORI_BARANG_NAMA` AS `KATEGORI_BARANG_NAMA`,`master_gudang`.`GUDANG_ID` AS `GUDANG_ID`,`master_gudang`.`GUDANG_NAMA` AS `GUDANG_NAMA`,`master_gudang`.`GUDANG_ACTIVE` AS `GUDANG_ACTIVE` from ((((((((((`permintaan_pembelian` `pp` left join `pengguna` `validator` on((`validator`.`PENGGUNA_ID` = `pp`.`VALIDATOR_ID`))) left join `status_pp` on((`status_pp`.`STATUS_PP_ID` = `pp`.`STATUS_PP_ID`))) left join `pengguna` `petugas` on((`petugas`.`PENGGUNA_ID` = `pp`.`PETUGAS_ID`))) left join `rab_transaction` on((`rab_transaction`.`RAB_ID` = `pp`.`RAB_ID`))) left join `project` on((`project`.`PROJECT_ID` = `rab_transaction`.`PROJECT_ID`))) left join `kategori_pp` on((`kategori_pp`.`KATEGORI_PP_ID` = `pp`.`KATEGORI_PP_ID`))) left join `detail_transaksi_pp` on((`detail_transaksi_pp`.`PERMINTAAN_PEMBELIAN_ID` = `pp`.`PERMINTAAN_PEMBELIAN_ID`))) left join `master_barang` on((`master_barang`.`BARANG_ID` = `detail_transaksi_pp`.`BARANG_ID`))) left join `master_gudang` on((`master_gudang`.`GUDANG_ID` = `pp`.`GUDANG_ID`))) left join `kategori_barang` on((`kategori_barang`.`KATEGORI_BARANG_ID` = `master_barang`.`KATEGORI_BARANG_ID`)));


-- Dumping structure for view kztszete_pm.view_rap
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `view_rap`;
CREATE ALGORITHM=UNDEFINED   SQL SECURITY DEFINER VIEW `view_rap` AS select `detail_pekerjaan`.`RAB_ID` AS `RAB_ID`,`rab_transaction`.`RAB_KODE` AS `RAB_KODE`,`master_barang`.`BARANG_ID` AS `BARANG_ID`,`master_barang`.`KATEGORI_BARANG_ID` AS `KATEGORI_BARANG_ID`,`master_barang`.`SATUAN_NAMA` AS `SATUAN_NAMA`,`master_barang`.`BARANG_KODE` AS `BARANG_KODE`,`master_barang`.`BARANG_NAMA` AS `BARANG_NAMA`,`master_barang`.`BARANG_KETERANGAN` AS `BARANG_KETERANGAN`,`master_barang`.`BARANG_HARGA` AS `BARANG_HARGA`,`master_barang`.`BARANG_HARGA_TEMP` AS `BARANG_HARGA_TEMP`,`master_barang`.`BARANG_ACTIVE` AS `BARANG_ACTIVE`,(select coalesce(sum(`vPP`.`VOLUME_PP`),0) AS `VOLUME_PP` from `view_pp` `vPP` where ((`vPP`.`RAB_ID` = `detail_pekerjaan`.`RAB_ID`) and (`vPP`.`BARANG_ID` = `master_barang`.`BARANG_ID`) and (`vPP`.`KATEGORI_PP_ID` = 2)) group by `vPP`.`BARANG_ID`) AS `BARANG_VOLUME_TERPAKAI`,sum((`detail_pekerjaan`.`DETAIL_PEKERJAAN_VOLUME` * `detail_analisa`.`DETAIL_ANALISA_KOEFISIEN`)) AS `BARANG_VOLUME`,`kategori_barang`.`KATEGORI_BARANG_NAMA` AS `KATEGORI_BARANG_NAMA` from ((((((`detail_pekerjaan` join `master_analisa` on((`detail_pekerjaan`.`ANALISA_ID` = `master_analisa`.`ANALISA_ID`))) join `kategori_paket_pekerjaan` on((`detail_pekerjaan`.`KATEGORI_PEKERJAAN_ID` = `kategori_paket_pekerjaan`.`KATEGORI_PEKERJAAN_ID`))) join `detail_analisa` on((`master_analisa`.`ANALISA_ID` = `detail_analisa`.`ANALISA_ID`))) join `master_barang` on((`detail_analisa`.`BARANG_ID` = `master_barang`.`BARANG_ID`))) join `kategori_barang` on((`master_barang`.`KATEGORI_BARANG_ID` = `kategori_barang`.`KATEGORI_BARANG_ID`))) join `rab_transaction` on((`rab_transaction`.`RAB_ID` = `detail_pekerjaan`.`RAB_ID`))) group by `master_barang`.`BARANG_ID`,`detail_pekerjaan`.`RAB_ID`;


-- Dumping structure for view kztszete_pm.view_subcon
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `view_subcon`;
CREATE ALGORITHM=UNDEFINED   SQL SECURITY DEFINER VIEW `view_subcon` AS select `rab_transaction`.`RAB_KODE` AS `RAB_KODE`,`rab_transaction`.`RAB_NAMA` AS `RAB_NAMA`,`rab_transaction`.`RAB_MATERIAL` AS `RAB_MATERIAL`,`detail_pekerjaan`.`KATEGORI_PEKERJAAN_ID` AS `KATEGORI_PEKERJAAN_ID`,`detail_pekerjaan`.`ANALISA_ID` AS `ANALISA_ID`,`detail_pekerjaan`.`RAB_ID` AS `RAB_ID`,`detail_pekerjaan`.`SUBCON_ID` AS `SUBCON_ID`,`detail_pekerjaan`.`DETAIL_PEKERJAAN_VOLUME` AS `DETAIL_PEKERJAAN_VOLUME`,`detail_pekerjaan`.`DETAIL_PEKERJAAN_TOTAL` AS `DETAIL_PEKERJAAN_TOTAL`,`detail_pekerjaan`.`DETAIL_PEKERJAAN_URUTAN` AS `DETAIL_PEKERJAAN_URUTAN`,`subcon`.`SUBCON_NAMA` AS `SUBCON_NAMA`,`subcon`.`SATUAN_NAMA` AS `SATUAN_NAMA`,(`detail_pekerjaan`.`DETAIL_PEKERJAAN_VOLUME` - ifnull((select ifnull(sum(`vPP`.`VOLUME_PP`),0) from `view_pp` `vPP` where ((`vPP`.`RAB_ID` = `detail_pekerjaan`.`RAB_ID`) and (`vPP`.`SUBCON_ID` = `detail_pekerjaan`.`SUBCON_ID`)) group by `vPP`.`SUBCON_ID`),0)) AS `VOLUME_SISA`,(`detail_pekerjaan`.`DETAIL_PEKERJAAN_TOTAL` / `detail_pekerjaan`.`DETAIL_PEKERJAAN_VOLUME`) AS `DETAIL_PEKERJAAN_HARGA` from (((`detail_pekerjaan` join `subcon` on((`subcon`.`SUBCON_ID` = `detail_pekerjaan`.`SUBCON_ID`))) join `kategori_paket_pekerjaan` on((`detail_pekerjaan`.`KATEGORI_PEKERJAAN_ID` = `kategori_paket_pekerjaan`.`KATEGORI_PEKERJAAN_ID`))) join `rab_transaction` on((`rab_transaction`.`RAB_ID` = `detail_pekerjaan`.`RAB_ID`)));
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
