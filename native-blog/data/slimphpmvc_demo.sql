/*
 Navicat Premium Data Transfer

 Source Server         : ::1_mysql
 Source Server Type    : MySQL
 Source Server Version : 50635
 Source Host           : localhost:3306
 Source Schema         : slimphpmvc_demo

 Target Server Type    : MySQL
 Target Server Version : 50635
 File Encoding         : 65001

 Date: 07/08/2017 16:52:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for author
-- ----------------------------
DROP TABLE IF EXISTS `author`;
CREATE TABLE `author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL COMMENT 'Shoud encrypt/hashing',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of author
-- ----------------------------
BEGIN;
INSERT INTO `author` VALUES (1, 'Hoang', 'Phan', 'hoangphan@email.com', '25f9e794323b453885f5181f1b624d0b');
COMMIT;

-- ----------------------------
-- Table structure for post
-- ----------------------------
DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '1' COMMENT 'Author for this post',
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of post
-- ----------------------------
BEGIN;
INSERT INTO `post` VALUES (1, 1, 'First post');
INSERT INTO `post` VALUES (2, 1, 'Second post here');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
