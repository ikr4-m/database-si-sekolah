/*
Navicat MySQL Data Transfer

Source Server         : xampp_localhost
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : si-sekolah

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2019-09-18 22:06:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbl_guru`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_guru`;
CREATE TABLE `tbl_guru` (
  `id_guru` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nip` varchar(10) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `id_mapel` bigint(20) NOT NULL,
  `alamat` varchar(191) NOT NULL,
  PRIMARY KEY (`id_guru`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_guru
-- ----------------------------
INSERT INTO `tbl_guru` VALUES ('3', '444', 'Muhammad Yasir', '1', 'GOR Sudiang');

-- ----------------------------
-- Table structure for `tbl_jurusan`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_jurusan`;
CREATE TABLE `tbl_jurusan` (
  `id_jurusan` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_jurusan` char(3) NOT NULL,
  `nama_jurusan` varchar(191) NOT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_jurusan
-- ----------------------------
INSERT INTO `tbl_jurusan` VALUES ('1', 'RPL', 'Rekayasa Perangkat Lunak');
INSERT INTO `tbl_jurusan` VALUES ('2', 'TKJ', 'Teknik Komputer Jaringan');
INSERT INTO `tbl_jurusan` VALUES ('5', 'MMD', 'Multimedia Digital');

-- ----------------------------
-- Table structure for `tbl_mapel`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_mapel`;
CREATE TABLE `tbl_mapel` (
  `id_mapel` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_mapel` char(5) NOT NULL,
  `nama_mapel` varchar(191) NOT NULL,
  PRIMARY KEY (`id_mapel`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_mapel
-- ----------------------------
INSERT INTO `tbl_mapel` VALUES ('1', 'PWAB', 'Pemograman Web & Aplikasi Berjalan');
INSERT INTO `tbl_mapel` VALUES ('2', 'BSDA', 'Basis Data');
INSERT INTO `tbl_mapel` VALUES ('4', 'PGBO', 'Pemograman Berorientasi Objek');
INSERT INTO `tbl_mapel` VALUES ('5', 'SMDG', 'Simulasi Digital');

-- ----------------------------
-- Table structure for `tbl_siswa`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_siswa`;
CREATE TABLE `tbl_siswa` (
  `id_siswa` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nis` varchar(10) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `kelas` int(2) NOT NULL,
  `rombel` int(2) NOT NULL,
  `id_jurusan` bigint(20) NOT NULL,
  `alamat` varchar(191) NOT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_siswa
-- ----------------------------
INSERT INTO `tbl_siswa` VALUES ('1', '172-001', 'A. Muh. Syahrul', '3', '1', '1', 'Mangga 3');

-- ----------------------------
-- View structure for `view_guru`
-- ----------------------------
DROP VIEW IF EXISTS `view_guru`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_guru` AS select `tbl_guru`.`id_guru` AS `id_guru`,`tbl_guru`.`nip` AS `nip`,`tbl_guru`.`nama` AS `nama`,`tbl_guru`.`id_mapel` AS `id_mapel`,`tbl_mapel`.`kode_mapel` AS `kode_mapel`,`tbl_mapel`.`nama_mapel` AS `nama_mapel`,`tbl_guru`.`alamat` AS `alamat` from (`tbl_guru` join `tbl_mapel` on((`tbl_guru`.`id_mapel` = `tbl_mapel`.`id_mapel`))) ;

-- ----------------------------
-- View structure for `view_siswa`
-- ----------------------------
DROP VIEW IF EXISTS `view_siswa`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_siswa` AS select `tbl_siswa`.`id_siswa` AS `id_siswa`,`tbl_siswa`.`nis` AS `nis`,`tbl_siswa`.`nama` AS `nama`,`tbl_siswa`.`kelas` AS `kelas`,`tbl_siswa`.`rombel` AS `rombel`,`tbl_siswa`.`id_jurusan` AS `id_jurusan`,`tbl_jurusan`.`kode_jurusan` AS `kode_jurusan`,`tbl_jurusan`.`nama_jurusan` AS `nama_jurusan`,`tbl_siswa`.`alamat` AS `alamat` from (`tbl_siswa` join `tbl_jurusan` on((`tbl_siswa`.`id_jurusan` = `tbl_jurusan`.`id_jurusan`))) ;
