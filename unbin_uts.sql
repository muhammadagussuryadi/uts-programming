/*
 Navicat Premium Data Transfer

 Source Server         : localku
 Source Server Type    : MySQL
 Source Server Version : 100138
 Source Host           : localhost:3306
 Source Schema         : unbin_uts

 Target Server Type    : MySQL
 Target Server Version : 100138
 File Encoding         : 65001

 Date: 18/09/2021 10:06:11
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_kelas
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kelas`;
CREATE TABLE `tbl_kelas`  (
  `id_kelas` int NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kompetensi_keahlian` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kelas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbl_pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pembayaran`;
CREATE TABLE `tbl_pembayaran`  (
  `id_pembayaran` int NOT NULL AUTO_INCREMENT,
  `id_petugas` int NOT NULL,
  `nisn` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_bayar` int NOT NULL,
  `bulan_dibayar` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tahun_dibayar` int NOT NULL,
  `id_spp` int NOT NULL,
  `jumlah_bayar` int NOT NULL,
  PRIMARY KEY (`id_pembayaran`) USING BTREE,
  INDEX `id_petugas`(`id_petugas`) USING BTREE,
  INDEX `nisn`(`nisn`) USING BTREE,
  INDEX `id_spp_pembayaran`(`id_spp`) USING BTREE,
  CONSTRAINT `id_petugas` FOREIGN KEY (`id_petugas`) REFERENCES `tbl_petugas` (`id_petugas`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `id_spp_pembayaran` FOREIGN KEY (`id_spp`) REFERENCES `tbl_spp` (`id_spp`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `nisn` FOREIGN KEY (`nisn`) REFERENCES `tbl_siswa` (`nisn`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbl_petugas
-- ----------------------------
DROP TABLE IF EXISTS `tbl_petugas`;
CREATE TABLE `tbl_petugas`  (
  `id_petugas` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_petugas` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `level` enum('Administrator','Petugas') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_petugas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbl_siswa
-- ----------------------------
DROP TABLE IF EXISTS `tbl_siswa`;
CREATE TABLE `tbl_siswa`  (
  `nisn` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nis` int NOT NULL,
  `nama` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_kelas` int NOT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `no_telp` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_spp` int NOT NULL,
  PRIMARY KEY (`nisn`) USING BTREE,
  INDEX `id_kelas`(`id_kelas`) USING BTREE,
  INDEX `id_spp`(`id_spp`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbl_spp
-- ----------------------------
DROP TABLE IF EXISTS `tbl_spp`;
CREATE TABLE `tbl_spp`  (
  `id_spp` int NOT NULL AUTO_INCREMENT,
  `tahun` int NOT NULL,
  `nominal` int NOT NULL,
  PRIMARY KEY (`id_spp`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
