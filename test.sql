/*
Navicat MySQL Data Transfer

Source Server         : 湖心亭看雪
Source Server Version : 60004
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 60004
File Encoding         : 65001

Date: 2015-04-12 10:47:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `baidu`
-- ----------------------------
DROP TABLE IF EXISTS `baidu`;
CREATE TABLE `baidu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `search_text` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baidu
-- ----------------------------
INSERT INTO `baidu` VALUES ('1', 'aaaa');
INSERT INTO `baidu` VALUES ('2', 'bbbb');
INSERT INTO `baidu` VALUES ('3', 'abcdef');
INSERT INTO `baidu` VALUES ('4', 'eeeeedfaf');
INSERT INTO `baidu` VALUES ('6', '哈哈哈哈');
INSERT INTO `baidu` VALUES ('7', '啦啦啦啦');
INSERT INTO `baidu` VALUES ('8', '百度一下');
INSERT INTO `baidu` VALUES ('9', '武汉理工大学');
INSERT INTO `baidu` VALUES ('10', '武汉大学');
INSERT INTO `baidu` VALUES ('11', '华中科技大学');
