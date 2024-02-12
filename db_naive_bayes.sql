/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : db_naive_bayes

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 12/02/2024 12:42:40
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for classifications
-- ----------------------------
DROP TABLE IF EXISTS `classifications`;
CREATE TABLE `classifications`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `testing_id` bigint NOT NULL,
  `cukup_puas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `puas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tidak_puas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_prediksi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_asli` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of classifications
-- ----------------------------
INSERT INTO `classifications` VALUES (1, 2076, '4.9016017260022E-15', '0.010249883168278', '0', 'PUAS', 'PUAS', NULL, NULL);
INSERT INTO `classifications` VALUES (2, 2077, '5.3422684268001E-5', '0', '4.5696005157763E-6', 'CUKUP PUAS', 'CUKUP PUAS', NULL, NULL);
INSERT INTO `classifications` VALUES (3, 2078, '2.9409610356013E-14', '0.010249883168278', '0', 'PUAS', 'PUAS', NULL, NULL);
INSERT INTO `classifications` VALUES (4, 2079, '0', '0', '0', 'TIDAK PUAS', 'CUKUP PUAS', NULL, NULL);
INSERT INTO `classifications` VALUES (5, 2080, '8.8228831068039E-14', '0.00079483004698623', '0', 'PUAS', 'PUAS', NULL, NULL);
INSERT INTO `classifications` VALUES (6, 2081, '2.3098307973613E-9', '8.8026513171125E-11', '0', 'CUKUP PUAS', 'CUKUP PUAS', NULL, NULL);
INSERT INTO `classifications` VALUES (7, 2082, '2.0947700337738E-12', '0', '0', 'CUKUP PUAS', 'CUKUP PUAS', NULL, NULL);
INSERT INTO `classifications` VALUES (8, 2083, '6.1270021575027E-15', '0.0068614920382689', '0', 'PUAS', 'PUAS', NULL, NULL);
INSERT INTO `classifications` VALUES (9, 2084, '0', '2.2825796720704E-6', '0', 'PUAS', 'PUAS', NULL, NULL);
INSERT INTO `classifications` VALUES (10, 2085, '2.9257856766576E-9', '6.3590248321353E-7', '0', 'PUAS', 'PUAS', NULL, NULL);
INSERT INTO `classifications` VALUES (11, 2086, '3.7252173117616E-12', '1.007143885345E-6', '0', 'PUAS', 'PUAS', NULL, NULL);
INSERT INTO `classifications` VALUES (12, 2087, '7.0293005615791E-6', '0', '1.1184336926725E-5', 'TIDAK PUAS', 'TIDAK PUAS', NULL, NULL);

-- ----------------------------
-- Table structure for datasets
-- ----------------------------
DROP TABLE IF EXISTS `datasets`;
CREATE TABLE `datasets`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nim` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jurusan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `q1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `q2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `q3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `q4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `q5` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `q6` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `q7` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `q8` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `q9` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `q10` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `q11` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `q12` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `q13` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `q14` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `q15` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hasil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rata_rata` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `random_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2088 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of datasets
-- ----------------------------
INSERT INTO `datasets` VALUES (1968, 'Laki - Laki', 'Laki - Laki', '221071010', 'Manajemen', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', 'training', 'CUKUP PUAS', '3.00', '5.41', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (1969, 'Laki - Laki', 'Laki - Laki', '211053006', 'Sistem Informasi', '4', '3', '4', '3', '5', '4', '4', '3', '3', '4', '4', '4', '4', '4', '5', 'training', 'PUAS', '3.87', '4.11', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (1970, 'Laki - Laki', 'Laki - Laki', '231137015', 'Teknik Aeronautika', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'training', 'PUAS', '5.00', '7.74', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (1971, 'Laki - Laki', 'Laki - Laki', '231137011', 'Teknik Aeronautika', '3', '4', '4', '3', '4', '4', '3', '3', '4', '5', '4', '3', '4', '3', '5', 'training', 'PUAS', '3.73', '1.69', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (1972, 'Perempuan', 'Perempuan', '211021004', 'Teknik Elektro', '5', '4', '5', '5', '5', '5', '3', '1', '1', '1', '5', '5', '5', '5', '5', 'training', 'PUAS', '4.00', '3.89', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (1973, 'Laki - Laki', 'Laki - Laki', '201051005', 'Sistem Informasi', '3', '2', '3', '3', '3', '2', '2', '3', '3', '3', '3', '3', '3', '3', '3', 'training', 'TIDAK PUAS', '2.80', '5.03', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (1974, 'Laki - Laki', 'Laki - Laki', '231011001', 'Teknik Penerbangan', '4', '4', '4', '4', '4', '3', '3', '4', '4', '4', '4', '4', '4', '4', '4', 'training', 'PUAS', '3.87', '1.41', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (1975, 'Laki - Laki', 'Laki - Laki', '221071004', 'Manajemen', '4', '4', '4', '4', '4', '4', '4', '4', '2', '2', '2', '3', '3', '3', '3', 'training', 'CUKUP PUAS', '3.33', '1.63', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (1976, 'Laki - Laki', 'Laki - Laki', '231051015', 'Sistem Informasi', '4', '2', '4', '5', '5', '4', '3', '2', '4', '4', '3', '5', '5', '5', '3', 'training', 'PUAS', '3.87', '5.26', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (1977, 'Laki - Laki', 'Laki - Laki', '231025010', 'Teknik Elektro', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', 'training', 'CUKUP PUAS', '3.00', '6.8', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (1978, 'Perempuan', 'Perempuan', '221073003', 'Manajemen', '5', '4', '5', '5', '4', '4', '4', '4', '4', '5', '5', '5', '5', '5', '5', 'training', 'PUAS', '4.60', '7.19', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (1979, 'Laki - Laki', 'Laki - Laki', '221071015', 'Manajemen', '4', '4', '4', '5', '4', '3', '3', '3', '3', '3', '3', '4', '3', '3', '4', 'training', 'PUAS', '3.53', '5.25', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (1980, 'Perempuan', 'Perempuan', '181051004', 'Sistem Informasi', '2', '3', '3', '2', '3', '3', '3', '3', '2', '3', '3', '3', '3', '3', '3', 'training', 'TIDAK PUAS', '2.80', '9.03', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (1981, 'Laki - Laki', 'Laki - Laki', '231052003', 'Sistem Informasi', '3', '3', '4', '4', '5', '4', '3', '3', '2', '2', '3', '3', '3', '3', '2', 'training', 'CUKUP PUAS', '3.13', '9.86', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (1982, 'Perempuan', 'Perempuan', '231041002', 'Manajemen Informatika', '5', '5', '5', '5', '5', '4', '4', '4', '4', '5', '5', '5', '5', '5', '5', 'training', 'PUAS', '4.73', '4.55', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (1983, 'Perempuan', 'Perempuan', '221051015', 'Sistem Informasi', '2', '2', '2', '2', '2', '3', '3', '2', '3', '2', '3', '2', '2', '2', '2', 'training', 'TIDAK PUAS', '2.27', '5.74', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (1984, 'Perempuan', 'Perempuan', '231011026', 'Teknik Penerbangan', '4', '4', '4', '4', '4', '3', '3', '3', '3', '4', '3', '4', '4', '4', '3', 'training', 'PUAS', '3.60', '4.38', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (1985, 'Laki - Laki', 'Laki - Laki', '231137018', 'Teknik Aeronautika', '4', '4', '5', '5', '5', '4', '4', '5', '4', '4', '4', '5', '5', '5', '4', 'training', 'PUAS', '4.47', '8.82', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (1986, 'Perempuan', 'Perempuan', '211021007', 'Teknik Elektro', '3', '3', '3', '3', '4', '3', '4', '4', '4', '4', '4', '4', '4', '4', '4', 'training', 'PUAS', '3.67', '8.54', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (1987, 'Laki - Laki', 'Laki - Laki', '231051008', 'Sistem Informasi', '4', '4', '3', '3', '5', '2', '3', '3', '4', '4', '3', '3', '4', '4', '3', 'training', 'CUKUP PUAS', '3.47', '1.77', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (1988, 'Laki - Laki', 'Laki - Laki', '201011062', 'Teknik Penerbangan', '4', '3', '3', '3', '4', '3', '3', '4', '2', '3', '3', '3', '3', '3', '4', 'training', 'CUKUP PUAS', '3.20', '3.95', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (1989, 'Laki - Laki', 'Laki - Laki', '211053007', 'Sistem Informasi', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'training', 'PUAS', '5.00', '6.24', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (1990, 'Laki - Laki', 'Laki - Laki', '211021003', 'Teknik Elektro', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', 'training', 'CUKUP PUAS', '3.00', '9.94', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (1991, 'Laki - Laki', 'Laki - Laki', '201053014', 'Sistem Informasi', '4', '3', '4', '4', '4', '2', '2', '3', '2', '3', '3', '4', '4', '4', '3', 'training', 'CUKUP PUAS', '3.27', '2.48', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (1992, 'Perempuan', 'Perempuan', '211031006', 'Teknik Industri', '3', '3', '3', '3', '4', '2', '2', '2', '3', '3', '3', '4', '4', '3', '3', 'training', 'CUKUP PUAS', '3.00', '6.99', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (1993, 'Laki - Laki', 'Laki - Laki', '231021005', 'Teknik Elektro', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', 'training', 'CUKUP PUAS', '3.00', '8.22', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (1994, 'Perempuan', 'Perempuan', '231011036', 'Teknik Penerbangan', '5', '5', '5', '5', '5', '3', '3', '5', '3', '2', '4', '5', '5', '5', '4', 'training', 'PUAS', '4.27', '8.04', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (1995, 'Laki - Laki', 'Laki - Laki', '221011041', 'Teknik Penerbangan', '3', '3', '3', '3', '3', '3', '3', '4', '3', '3', '3', '3', '3', '3', '3', 'training', 'CUKUP PUAS', '3.07', '6.27', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (1996, 'Laki - Laki', 'Laki - Laki', '231021006', 'Teknik Elektro', '5', '4', '5', '5', '5', '2', '2', '2', '3', '2', '2', '5', '5', '5', '4', 'training', 'PUAS', '3.73', '5.8', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (1997, 'Laki - Laki', 'Laki - Laki', '231011038', 'Teknik Penerbangan', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', 'training', 'CUKUP PUAS', '3.00', '8.05', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (1998, 'Laki - Laki', 'Laki - Laki', '231011017', 'Teknik Penerbangan', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', 'training', 'PUAS', '4.00', '2.93', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (1999, 'Perempuan', 'Perempuan', '231051009', 'Sistem Informasi', '4', '4', '5', '5', '4', '5', '5', '5', '4', '5', '4', '4', '4', '4', '5', 'training', 'PUAS', '4.47', '2.12', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (2000, 'Laki - Laki', 'Laki - Laki', '211031007', 'Teknik Industri', '4', '3', '4', '4', '5', '5', '1', '1', '2', '3', '2', '4', '5', '5', '2', 'training', 'CUKUP PUAS', '3.33', '8.26', '2024-01-28 06:40:01', '2024-01-28 06:40:01');
INSERT INTO `datasets` VALUES (2001, 'Laki - Laki', 'Laki - Laki', '211031005', 'Teknik Industri', '4', '4', '5', '5', '5', '3', '3', '1', '3', '3', '2', '4', '5', '5', '3', 'training', 'PUAS', '3.67', '1.66', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2002, 'Laki - Laki', 'Laki - Laki', '231051018', 'Sistem Informasi', '4', '4', '5', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', 'training', 'PUAS', '4.07', '6.24', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2003, 'Laki - Laki', 'Laki - Laki', '231137023', 'Teknik Aeronautika', '4', '4', '4', '4', '5', '4', '4', '4', '4', '4', '4', '4', '4', '4', '5', 'training', 'PUAS', '4.13', '8.46', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2004, 'Laki - Laki', 'Laki - Laki', '231051004', 'Sistem Informasi', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', 'training', 'PUAS', '4.00', '1.94', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2005, 'Perempuan', 'Perempuan', '201051008', 'Sistem Informasi', '3', '2', '2', '3', '4', '2', '2', '2', '1', '3', '2', '3', '4', '3', '2', 'training', 'TIDAK PUAS', '2.53', '5.1', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2006, 'Laki - Laki', 'Laki - Laki', '231025006', 'Teknik Elektro', '5', '5', '4', '4', '5', '4', '4', '4', '3', '4', '3', '3', '4', '5', '5', 'training', 'PUAS', '4.13', '7.83', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2007, 'Laki - Laki', 'Laki - Laki', '221051008', 'Sistem Informasi', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'training', 'PUAS', '5.00', '2.44', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2008, 'Laki - Laki', 'Laki - Laki', '212051002', 'Sistem Informasi', '4', '3', '5', '4', '5', '5', '5', '5', '3', '5', '4', '5', '3', '4', '5', 'training', 'PUAS', '4.33', '3.34', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2009, 'Laki - Laki', 'Laki - Laki', '231023004', 'Teknik Elektro', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'training', 'PUAS', '5.00', '8.2', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2010, 'Laki - Laki', 'Laki - Laki', '231051010', 'Sistem Informasi', '4', '4', '5', '4', '5', '4', '4', '5', '4', '5', '4', '5', '5', '5', '5', 'training', 'PUAS', '4.53', '4.92', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2011, 'Laki - Laki', 'Laki - Laki', '231021003', 'Teknik Elektro', '1', '2', '3', '2', '5', '1', '1', '1', '3', '3', '2', '4', '5', '4', '3', 'training', 'TIDAK PUAS', '2.67', '8.35', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2012, 'Laki - Laki', 'Laki - Laki', '221051018', 'Sistem Informasi', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'training', 'PUAS', '5.00', '8.56', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2013, 'Laki - Laki', 'Laki - Laki', '231023005', 'Teknik Elektro', '3', '3', '3', '3', '4', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', 'training', 'CUKUP PUAS', '3.07', '8.1', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2014, 'Perempuan', 'Perempuan', '231137017', 'Teknik Aeronautika', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'training', 'PUAS', '5.00', '7.12', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2015, 'Perempuan', 'Perempuan', '231051011', 'Sistem Informasi', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '2', 'training', 'TIDAK PUAS', '2.93', '3.05', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2016, 'Laki - Laki', 'Laki - Laki', '231137007', 'Teknik Aeronautika', '5', '5', '5', '5', '5', '5', '5', '4', '4', '5', '5', '5', '5', '5', '4', 'training', 'PUAS', '4.80', '5.39', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2017, 'Laki - Laki', 'Laki - Laki', '231011033', 'Teknik Penerbangan', '4', '4', '4', '5', '5', '5', '5', '5', '4', '4', '5', '5', '5', '5', '5', 'training', 'PUAS', '4.67', '8.47', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2018, 'Laki - Laki', 'Laki - Laki', '211033001', 'Teknik Industri', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', 'training', 'PUAS', '4.00', '7.96', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2019, 'Perempuan', 'Perempuan', '221073006', 'Manajemen', '5', '4', '5', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', 'training', 'PUAS', '4.13', '1.08', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2020, 'Laki - Laki', 'Laki - Laki', '231041001', 'Manajemen Informatika', '4', '4', '4', '4', '5', '3', '3', '3', '3', '4', '4', '4', '5', '5', '4', 'training', 'PUAS', '3.93', '7.65', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2021, 'Perempuan', 'Perempuan', '221073019', 'Manajemen', '3', '3', '3', '2', '4', '2', '2', '3', '3', '3', '2', '3', '3', '3', '3', 'training', 'TIDAK PUAS', '2.80', '3.43', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2022, 'Laki - Laki', 'Laki - Laki', '231137008', 'Teknik Aeronautika', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'training', 'PUAS', '5.00', '6.43', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2023, 'Perempuan', 'Perempuan', '211073004', 'Manajemen', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', 'training', 'PUAS', '4.00', '1.43', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2024, 'Laki - Laki', 'Laki - Laki', '221071022', 'Manajemen', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '4', 'training', 'TIDAK PUAS', '2.13', '4.1', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2025, 'Laki - Laki', 'Laki - Laki', '201051001', 'Sistem Informasi', '3', '3', '3', '3', '3', '2', '2', '2', '2', '2', '2', '3', '3', '3', '2', 'training', 'TIDAK PUAS', '2.53', '7.78', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2026, 'Laki - Laki', 'Laki - Laki', '201051007', 'Sistem Informasi', '4', '4', '4', '4', '5', '4', '3', '3', '4', '5', '4', '4', '4', '4', '4', 'training', 'PUAS', '4.00', '1.96', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2027, 'Laki - Laki', 'Laki - Laki', '231023001', 'Teknik Elektro', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', 'training', 'CUKUP PUAS', '3.00', '9.36', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2028, 'Perempuan', 'Perempuan', '201041008', 'Manajemen Informatika', '3', '3', '3', '3', '3', '2', '3', '2', '3', '3', '3', '3', '3', '3', '3', 'training', 'TIDAK PUAS', '2.87', '9.22', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2029, 'Laki - Laki', 'Laki - Laki', '231137030', 'Teknik Aeronautika', '3', '2', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', 'training', 'TIDAK PUAS', '2.93', '7.05', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2030, 'Laki - Laki', 'Laki - Laki', '201041002', 'Sistem Informasi', '2', '2', '1', '1', '2', '2', '1', '2', '3', '3', '3', '2', '1', '2', '2', 'training', 'TIDAK PUAS', '1.93', '6.39', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2031, 'Laki - Laki', 'Laki - Laki', '201051014', 'Sistem Informasi', '3', '3', '3', '3', '3', '2', '2', '2', '2', '3', '3', '3', '3', '3', '3', 'training', 'TIDAK PUAS', '2.73', '7.48', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2032, 'Laki - Laki', 'Laki - Laki', '211021002', 'Teknik Elektro', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'training', 'PUAS', '5.00', '8.17', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2033, 'Laki - Laki', 'Laki - Laki', '211021011', 'Teknik Elektro', '3', '3', '4', '3', '3', '2', '3', '3', '2', '3', '3', '3', '3', '3', '3', 'training', 'TIDAK PUAS', '2.93', '8.52', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2034, 'Perempuan', 'Perempuan', '222054001', 'Sistem Informasi', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '4', 'training', 'PUAS', '4.93', '5.54', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2035, 'Perempuan', 'Perempuan', '201051009', 'Sistem Informasi', '3', '3', '4', '4', '5', '2', '2', '3', '3', '3', '3', '4', '5', '5', '3', 'training', 'CUKUP PUAS', '3.47', '8.43', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2036, 'Laki - Laki', 'Laki - Laki', '231011044', 'Teknik Penerbangan', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', 'training', 'CUKUP PUAS', '3.00', '1.32', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2037, 'Laki - Laki', 'Laki - Laki', '211053004', 'Sistem Informasi', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '4', '4', 'training', 'CUKUP PUAS', '3.13', '1.19', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2038, 'Laki - Laki', 'Laki - Laki', '201033003', 'Teknik Industri', '4', '4', '4', '4', '4', '3', '3', '3', '4', '3', '4', '4', '4', '4', '4', 'training', 'PUAS', '3.73', '8.1', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2039, 'Laki - Laki', 'Laki - Laki', '221071023', 'Manajemen', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'training', 'PUAS', '5.00', '9.49', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2040, 'Laki - Laki', 'Laki - Laki', '211021005', 'Teknik Elektro', '2', '3', '2', '3', '2', '3', '2', '3', '2', '3', '3', '2', '3', '3', '3', 'training', 'TIDAK PUAS', '2.60', '8.44', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2041, 'Laki - Laki', 'Laki - Laki', '231074006', 'Manajemen', '5', '5', '5', '5', '5', '4', '4', '4', '4', '4', '4', '5', '5', '5', '4', 'training', 'PUAS', '4.53', '6.03', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2042, 'Perempuan', 'Perempuan', '221073016', 'Manajemen', '2', '2', '2', '3', '3', '2', '2', '2', '2', '3', '2', '3', '3', '3', '3', 'training', 'TIDAK PUAS', '2.47', '3.79', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2043, 'Perempuan', 'Perempuan', '191061007', 'Akutansi', '3', '3', '4', '3', '4', '5', '4', '5', '4', '4', '4', '5', '4', '4', '5', 'training', 'PUAS', '4.07', '4.24', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2044, 'Perempuan', 'Perempuan', '231011029', 'Teknik Penerbangan', '4', '4', '4', '4', '4', '3', '3', '3', '3', '3', '4', '4', '4', '4', '4', 'training', 'PUAS', '3.67', '3.56', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2045, 'Laki - Laki', 'Laki - Laki', '231137002', 'Teknik Aeronautika', '4', '4', '4', '4', '5', '4', '3', '3', '3', '4', '3', '4', '4', '3', '4', 'training', 'PUAS', '3.73', '1.85', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2046, 'Laki - Laki', 'Laki - Laki', '221051017', 'Sistem Informasi', '5', '4', '5', '4', '5', '4', '4', '4', '4', '4', '4', '5', '5', '5', '5', 'training', 'PUAS', '4.47', '4.53', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2047, 'Laki - Laki', 'Laki - Laki', '191053009', 'Sistem Informasi', '4', '4', '4', '4', '4', '4', '2', '2', '4', '4', '2', '4', '4', '4', '4', 'training', 'PUAS', '3.60', '8.39', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2048, 'Laki - Laki', 'Laki - Laki', '231137027', 'Teknik Aeronautika', '3', '2', '2', '2', '4', '3', '2', '2', '3', '2', '2', '3', '3', '3', '3', 'training', 'TIDAK PUAS', '2.60', '6.36', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2049, 'Perempuan', 'Perempuan', '221051914', 'Sistem Informasi', '4', '5', '4', '4', '4', '3', '3', '4', '3', '4', '4', '4', '3', '4', '4', 'training', 'PUAS', '3.80', '3.61', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2050, 'Perempuan', 'Perempuan', '231051016', 'Sistem Informasi', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '2', 'training', 'TIDAK PUAS', '2.93', '5.94', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2051, 'Perempuan', 'Perempuan', '231137003', 'Teknik Aeronautika', '4', '4', '5', '5', '4', '4', '4', '4', '4', '4', '4', '4', '5', '4', '5', 'training', 'PUAS', '4.27', '7.64', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2052, 'Laki - Laki', 'Laki - Laki', '201051003', 'Sistem Informasi', '4', '3', '5', '5', '4', '3', '3', '4', '3', '5', '5', '5', '5', '5', '5', 'training', 'PUAS', '4.27', '5.45', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2053, 'Perempuan', 'Perempuan', '201041011', 'Manajemen Informatika', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', 'training', 'PUAS', '4.00', '9.59', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2054, 'Laki - Laki', 'Laki - Laki', '191011020', 'Teknik Penerbangan', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', 'training', 'PUAS', '4.00', '2.39', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2055, 'Laki - Laki', 'Laki - Laki', '231011043', 'Teknik Penerbangan', '5', '4', '4', '5', '5', '4', '5', '4', '4', '4', '4', '5', '5', '5', '5', 'training', 'PUAS', '4.53', '5.41', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2056, 'Laki - Laki', 'Laki - Laki', '231137024', 'Teknik Aeronautika', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'training', 'PUAS', '5.00', '3.82', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2057, 'Laki - Laki', 'Laki - Laki', '231021004', 'Teknik Elektro', '4', '3', '4', '3', '4', '3', '3', '3', '3', '3', '3', '4', '4', '4', '3', 'training', 'CUKUP PUAS', '3.40', '8.95', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2058, 'Laki - Laki', 'Laki - Laki', '231025007', 'Teknik Elektro', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', 'training', 'CUKUP PUAS', '3.00', '8.29', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2059, 'Perempuan', 'Perempuan', '231054001', 'Sistem Informasi', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', 'training', 'PUAS', '4.00', '4.49', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2060, 'Perempuan', 'Perempuan', '211137010', 'Teknik Aeronautika', '2', '2', '3', '3', '4', '2', '2', '3', '3', '4', '4', '3', '3', '3', '4', 'training', 'CUKUP PUAS', '3.00', '9.28', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2061, 'Perempuan', 'Perempuan', '221073020', 'Manajemen', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', 'training', 'CUKUP PUAS', '3.00', '7.39', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2062, 'Perempuan', 'Perempuan', '211073012', 'Manajemen', '3', '3', '3', '3', '3', '4', '4', '3', '3', '3', '3', '3', '3', '3', '4', 'training', 'CUKUP PUAS', '3.20', '1.18', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2063, 'Laki - Laki', 'Laki - Laki', '231011020', 'Teknik Penerbangan', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', 'training', 'PUAS', '4.00', '3', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2064, 'Laki - Laki', 'Laki - Laki', '211051010', 'Sistem Informasi', '4', '3', '4', '4', '4', '3', '4', '3', '3', '4', '3', '4', '5', '5', '4', 'training', 'PUAS', '3.80', '1.61', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2065, 'Laki - Laki', 'Laki - Laki', '231011060', 'Teknik Penerbangan', '4', '3', '2', '4', '5', '3', '4', '2', '2', '3', '3', '4', '3', '5', '3', 'training', 'CUKUP PUAS', '3.33', '6.06', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2066, 'Laki - Laki', 'Laki - Laki', '231011024', 'Teknik Penerbangan', '3', '4', '3', '3', '4', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', 'training', 'CUKUP PUAS', '3.13', '2.77', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2067, 'Laki - Laki', 'Laki - Laki', '221051004', 'Sistem Informasi', '3', '3', '3', '3', '2', '3', '4', '3', '3', '3', '3', '3', '2', '3', '3', 'training', 'TIDAK PUAS', '2.93', '9.11', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2068, 'Perempuan', 'Perempuan', '221071009', 'Manajemen', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '2', '3', '2', '3', 'training', 'TIDAK PUAS', '2.87', '2.67', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2069, 'Laki - Laki', 'Laki - Laki', '201073028', 'Manajemen', '4', '4', '5', '4', '4', '4', '4', '4', '4', '5', '5', '5', '4', '4', '4', 'training', 'PUAS', '4.27', '5.69', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2070, 'Laki - Laki', 'Laki - Laki', '231011056', 'Teknik Penerbangan', '4', '4', '4', '5', '5', '3', '3', '4', '4', '4', '4', '4', '4', '4', '5', 'training', 'PUAS', '4.07', '4.06', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2071, 'Perempuan', 'Perempuan', '211021012', 'Teknik Elektro', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', 'training', 'PUAS', '4.00', '3.31', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2072, 'Laki - Laki', 'Laki - Laki', '201011014', 'Teknik Penerbangan', '4', '3', '3', '3', '4', '3', '3', '4', '4', '4', '3', '4', '4', '4', '4', 'training', 'PUAS', '3.60', '3.48', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2073, 'Laki - Laki', 'Laki - Laki', '231025008', 'Teknik Elektro', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', 'training', 'PUAS', '4.00', '6.71', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2074, 'Laki - Laki', 'Laki - Laki', '231137010', 'Teknik Aeronautika', '4', '3', '4', '4', '5', '4', '5', '5', '4', '4', '4', '5', '4', '4', '4', 'training', 'PUAS', '4.20', '5.06', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2075, 'Perempuan', 'Perempuan', '231025009', 'Teknik Elektro', '3', '3', '3', '1', '1', '1', '1', '3', '3', '3', '3', '2', '2', '3', '2', 'training', 'TIDAK PUAS', '2.27', '5.48', '2024-01-28 06:40:02', '2024-01-28 06:40:02');
INSERT INTO `datasets` VALUES (2076, 'Indra kurniawan', 'Laki - Laki', '231137013', 'Teknik Aeronautika', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', 'testing', 'PUAS', '4.00', '3.79', '2024-01-28 06:40:17', '2024-01-28 06:40:17');
INSERT INTO `datasets` VALUES (2077, 'Fajar Febriyan Nurgroho ', 'Laki - Laki', '231137031', 'Teknik Aeronautika', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', 'testing', 'CUKUP PUAS', '3.00', '2.74', '2024-01-28 06:40:17', '2024-01-28 06:40:17');
INSERT INTO `datasets` VALUES (2078, 'Almaga Faldias Vigo ', 'Laki - Laki', '201011021', 'Teknik Penerbangan', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', 'testing', 'PUAS', '4.00', '3.76', '2024-01-28 06:40:17', '2024-01-28 06:40:17');
INSERT INTO `datasets` VALUES (2079, 'Anisa Fauziah', 'Perempuan', '211063001', 'Akutansi', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', 'testing', 'CUKUP PUAS', '3.00', '1.1', '2024-01-28 06:40:17', '2024-01-28 06:40:17');
INSERT INTO `datasets` VALUES (2080, 'Rita Sugiarti', 'Perempuan', '211071015', 'Manajemen', '4', '4', '4', '4', '4', '4', '4', '4', '3', '4', '4', '4', '4', '4', '4', 'testing', 'PUAS', '3.93', '1.13', '2024-01-28 06:40:17', '2024-01-28 06:40:17');
INSERT INTO `datasets` VALUES (2081, 'Lastri Sihotang ', 'Perempuan', '221071014', 'Manajemen', '3', '3', '4', '4', '4', '3', '2', '2', '3', '3', '3', '4', '4', '4', '4', 'testing', 'CUKUP PUAS', '3.33', '4.72', '2024-01-28 06:40:17', '2024-01-28 06:40:17');
INSERT INTO `datasets` VALUES (2082, 'DISKY DIRGA DIWANGKARA ', 'Laki - Laki', '231137025', 'Teknik Aeronautika', '3', '3', '2', '3', '4', '4', '4', '4', '4', '4', '4', '3', '3', '4', '3', 'testing', 'CUKUP PUAS', '3.47', '5.29', '2024-01-28 06:40:17', '2024-01-28 06:40:17');
INSERT INTO `datasets` VALUES (2083, 'Dea Annisa Nabilah Putri ', 'Perempuan', '211051013', 'Sistem Informasi', '4', '4', '4', '4', '5', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', 'testing', 'PUAS', '4.07', '1.41', '2024-01-28 06:40:17', '2024-01-28 06:40:17');
INSERT INTO `datasets` VALUES (2084, 'Debita ', 'Perempuan', '201061003', 'Akutansi', '4', '4', '4', '4', '4', '4', '3', '4', '3', '4', '4', '4', '4', '4', '3', 'testing', 'PUAS', '3.80', '2.38', '2024-01-28 06:40:17', '2024-01-28 06:40:17');
INSERT INTO `datasets` VALUES (2085, 'Andhara Colletta R F', 'Perempuan', '201011079', 'Teknik Penerbangan', '5', '3', '5', '5', '5', '3', '3', '3', '3', '4', '3', '5', '5', '5', '5', 'testing', 'PUAS', '4.13', '3.05', '2024-01-28 06:40:17', '2024-01-28 06:40:17');
INSERT INTO `datasets` VALUES (2086, 'Sabda Noor Hidayat', 'Laki - Laki', '231011008', 'Teknik Penerbangan', '4', '4', '3', '4', '5', '3', '2', '3', '4', '4', '4', '5', '5', '5', '5', 'testing', 'PUAS', '4.00', '3.78', '2024-01-28 06:40:17', '2024-01-28 06:40:17');
INSERT INTO `datasets` VALUES (2087, 'Lina puspitasari', 'Perempuan', '231051003', 'Sistem Informasi', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '2', 'testing', 'TIDAK PUAS', '2.93', '7.37', '2024-01-28 06:40:17', '2024-01-28 06:40:17');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2024_01_25_055655_create_datasets_table', 1);
INSERT INTO `migrations` VALUES (6, '2024_01_26_054416_create_probabilitas_labels_table', 2);
INSERT INTO `migrations` VALUES (7, '2024_01_26_083003_create_probabilities_table', 3);
INSERT INTO `migrations` VALUES (8, '2024_01_26_133509_create_classifications_table', 4);
INSERT INTO `migrations` VALUES (9, '2024_01_27_044726_create_visitors_table', 5);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for probabilitas_labels
-- ----------------------------
DROP TABLE IF EXISTS `probabilitas_labels`;
CREATE TABLE `probabilitas_labels`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of probabilitas_labels
-- ----------------------------
INSERT INTO `probabilitas_labels` VALUES (1, 'Jenis Kelamin', NULL, NULL);
INSERT INTO `probabilitas_labels` VALUES (2, 'Jurusan', NULL, NULL);
INSERT INTO `probabilitas_labels` VALUES (3, 'Kecepatan petugas dalam melayani mahasiswa', NULL, NULL);
INSERT INTO `probabilitas_labels` VALUES (4, 'Respon petugas ketika menerima kritik dan saran', NULL, NULL);
INSERT INTO `probabilitas_labels` VALUES (5, 'Komunikasi petugas yang baik dengan mahasiswa', NULL, NULL);
INSERT INTO `probabilitas_labels` VALUES (6, 'Kemampuan petugas dalam melayani peminjaman dan pengembelian buku', NULL, NULL);
INSERT INTO `probabilitas_labels` VALUES (7, 'Petugas berpakaian rapih dan sopan', NULL, NULL);
INSERT INTO `probabilitas_labels` VALUES (8, 'Perkembangan teknologi yang digunakan perpustakaan Unsurya', NULL, NULL);
INSERT INTO `probabilitas_labels` VALUES (9, 'Kualitas sarana dan prasarana yang ada diperpustakaan Unsurya', NULL, NULL);
INSERT INTO `probabilitas_labels` VALUES (10, 'Tingkat kenyamanan dalam ruang perpustakaan Unsurya', NULL, NULL);
INSERT INTO `probabilitas_labels` VALUES (11, 'Penyediaan buku terbaru yang ada diperpustakaan Unsurya', NULL, NULL);
INSERT INTO `probabilitas_labels` VALUES (12, 'Kondisi dan kelayakan fisik buku yang ada diperpustakaan Unsurya', NULL, NULL);
INSERT INTO `probabilitas_labels` VALUES (13, 'Sarana pembelajaran yang tersedia diruang perpus Unsurya', NULL, NULL);
INSERT INTO `probabilitas_labels` VALUES (14, 'Ketanggapan petugas dalam melayani mahasiswa', NULL, NULL);
INSERT INTO `probabilitas_labels` VALUES (15, 'Kesopanan petugas dalam melayani', NULL, NULL);
INSERT INTO `probabilitas_labels` VALUES (16, 'Petugas perpustakaan bersikap adil kesemua mahasiswa', NULL, NULL);
INSERT INTO `probabilitas_labels` VALUES (17, 'Kondisi ruang perpustakaan yang bersih dan buku tertata rapih dirak', NULL, NULL);

-- ----------------------------
-- Table structure for probabilities
-- ----------------------------
DROP TABLE IF EXISTS `probabilities`;
CREATE TABLE `probabilities`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `label_id` bigint NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cukup_puas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `puas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tidak_puas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 56 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of probabilities
-- ----------------------------
INSERT INTO `probabilities` VALUES (1, 1, 'Laki - Laki', '20', '44', '11', NULL, NULL);
INSERT INTO `probabilities` VALUES (2, 1, 'Perempuan', '5', '18', '10', NULL, NULL);
INSERT INTO `probabilities` VALUES (3, 2, 'Akutansi', '0', '1', '0', NULL, NULL);
INSERT INTO `probabilities` VALUES (4, 2, 'Manajemen', '4', '7', '4', NULL, NULL);
INSERT INTO `probabilities` VALUES (5, 2, 'Manajemen Informatika', '0', '3', '1', NULL, NULL);
INSERT INTO `probabilities` VALUES (6, 2, 'Sistem Informasi', '5', '18', '10', NULL, NULL);
INSERT INTO `probabilities` VALUES (7, 2, 'Teknik Aeronautika', '1', '11', '2', NULL, NULL);
INSERT INTO `probabilities` VALUES (8, 2, 'Teknik Elektro', '7', '8', '4', NULL, NULL);
INSERT INTO `probabilities` VALUES (9, 2, 'Teknik Industri', '2', '3', '0', NULL, NULL);
INSERT INTO `probabilities` VALUES (10, 2, 'Teknik Penerbangan', '6', '11', '0', NULL, NULL);
INSERT INTO `probabilities` VALUES (11, 3, 'CUKUP PUAS', '17', '3', '14', NULL, NULL);
INSERT INTO `probabilities` VALUES (12, 3, 'PUAS', '7', '59', '0', NULL, NULL);
INSERT INTO `probabilities` VALUES (13, 3, 'TIDAK PUAS', '1', '0', '7', NULL, NULL);
INSERT INTO `probabilities` VALUES (14, 4, 'CUKUP PUAS', '21', '8', '12', NULL, NULL);
INSERT INTO `probabilities` VALUES (15, 4, 'PUAS', '3', '53', '0', NULL, NULL);
INSERT INTO `probabilities` VALUES (16, 4, 'TIDAK PUAS', '1', '1', '9', NULL, NULL);
INSERT INTO `probabilities` VALUES (17, 5, 'CUKUP PUAS', '18', '2', '13', NULL, NULL);
INSERT INTO `probabilities` VALUES (18, 5, 'PUAS', '6', '60', '1', NULL, NULL);
INSERT INTO `probabilities` VALUES (19, 5, 'TIDAK PUAS', '1', '0', '7', NULL, NULL);
INSERT INTO `probabilities` VALUES (20, 6, 'CUKUP PUAS', '19', '5', '13', NULL, NULL);
INSERT INTO `probabilities` VALUES (21, 6, 'PUAS', '6', '57', '0', NULL, NULL);
INSERT INTO `probabilities` VALUES (22, 6, 'TIDAK PUAS', '0', '0', '8', NULL, NULL);
INSERT INTO `probabilities` VALUES (23, 7, 'CUKUP PUAS', '12', '0', '11', NULL, NULL);
INSERT INTO `probabilities` VALUES (24, 7, 'PUAS', '13', '62', '4', NULL, NULL);
INSERT INTO `probabilities` VALUES (25, 7, 'TIDAK PUAS', '0', '0', '6', NULL, NULL);
INSERT INTO `probabilities` VALUES (26, 8, 'CUKUP PUAS', '16', '14', '9', NULL, NULL);
INSERT INTO `probabilities` VALUES (27, 8, 'PUAS', '4', '47', '0', NULL, NULL);
INSERT INTO `probabilities` VALUES (28, 8, 'TIDAK PUAS', '5', '1', '12', NULL, NULL);
INSERT INTO `probabilities` VALUES (29, 9, 'CUKUP PUAS', '17', '17', '8', NULL, NULL);
INSERT INTO `probabilities` VALUES (30, 9, 'PUAS', '3', '43', '1', NULL, NULL);
INSERT INTO `probabilities` VALUES (31, 9, 'TIDAK PUAS', '5', '2', '12', NULL, NULL);
INSERT INTO `probabilities` VALUES (32, 10, 'CUKUP PUAS', '19', '10', '11', NULL, NULL);
INSERT INTO `probabilities` VALUES (33, 10, 'PUAS', '3', '47', '0', NULL, NULL);
INSERT INTO `probabilities` VALUES (34, 10, 'TIDAK PUAS', '3', '5', '10', NULL, NULL);
INSERT INTO `probabilities` VALUES (35, 11, 'CUKUP PUAS', '18', '14', '13', NULL, NULL);
INSERT INTO `probabilities` VALUES (36, 11, 'PUAS', '1', '47', '0', NULL, NULL);
INSERT INTO `probabilities` VALUES (37, 11, 'TIDAK PUAS', '6', '1', '8', NULL, NULL);
INSERT INTO `probabilities` VALUES (38, 12, 'CUKUP PUAS', '21', '4', '17', NULL, NULL);
INSERT INTO `probabilities` VALUES (39, 12, 'PUAS', '2', '55', '0', NULL, NULL);
INSERT INTO `probabilities` VALUES (40, 12, 'TIDAK PUAS', '2', '3', '4', NULL, NULL);
INSERT INTO `probabilities` VALUES (41, 13, 'CUKUP PUAS', '22', '7', '14', NULL, NULL);
INSERT INTO `probabilities` VALUES (42, 13, 'PUAS', '1', '52', '0', NULL, NULL);
INSERT INTO `probabilities` VALUES (43, 13, 'TIDAK PUAS', '2', '3', '7', NULL, NULL);
INSERT INTO `probabilities` VALUES (44, 14, 'CUKUP PUAS', '19', '2', '14', NULL, NULL);
INSERT INTO `probabilities` VALUES (45, 14, 'PUAS', '6', '60', '1', NULL, NULL);
INSERT INTO `probabilities` VALUES (46, 14, 'TIDAK PUAS', '0', '0', '6', NULL, NULL);
INSERT INTO `probabilities` VALUES (47, 15, 'CUKUP PUAS', '19', '3', '14', NULL, NULL);
INSERT INTO `probabilities` VALUES (48, 15, 'PUAS', '6', '59', '2', NULL, NULL);
INSERT INTO `probabilities` VALUES (49, 15, 'TIDAK PUAS', '0', '0', '5', NULL, NULL);
INSERT INTO `probabilities` VALUES (50, 16, 'CUKUP PUAS', '18', '3', '16', NULL, NULL);
INSERT INTO `probabilities` VALUES (51, 16, 'PUAS', '7', '59', '1', NULL, NULL);
INSERT INTO `probabilities` VALUES (52, 16, 'TIDAK PUAS', '0', '0', '4', NULL, NULL);
INSERT INTO `probabilities` VALUES (53, 17, 'CUKUP PUAS', '19', '3', '13', NULL, NULL);
INSERT INTO `probabilities` VALUES (54, 17, 'PUAS', '4', '59', '1', NULL, NULL);
INSERT INTO `probabilities` VALUES (55, 17, 'TIDAK PUAS', '2', '0', '7', NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `photo_profile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Administrator Zero', 'admin@zero.com', '2024-01-26 04:00:39', 'http://localhost/naive-bayes-for-hosting/assets/images/user/1706423965maxresdefault.jpg', '$2y$12$Bs50ZEdyKHlSQB0sKtoFRuiK1qiR9.M6DN51Yzk.shS2nqMPCHTGK', '1', '08123478501', 'Laki - Laki', 'Purwakarta', 'X9H72GBojo5cOFPAERq01YBZAaAhajvWBzUi707JK4kz8H0AkTXADp12dIhq', '2024-01-26 04:00:39', '2024-01-28 06:39:25');

-- ----------------------------
-- Table structure for visitors
-- ----------------------------
DROP TABLE IF EXISTS `visitors`;
CREATE TABLE `visitors`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `visit_date` date NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of visitors
-- ----------------------------
INSERT INTO `visitors` VALUES (1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2024-01-27', '2024-01-27 04:50:40', '2024-01-27 04:50:40');
INSERT INTO `visitors` VALUES (2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2024-01-27', '2024-01-27 05:31:35', '2024-01-27 05:31:35');
INSERT INTO `visitors` VALUES (3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2024-01-28', '2024-01-28 02:55:10', '2024-01-28 02:55:10');
INSERT INTO `visitors` VALUES (4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2024-01-28', '2024-01-28 03:35:34', '2024-01-28 03:35:34');

SET FOREIGN_KEY_CHECKS = 1;
