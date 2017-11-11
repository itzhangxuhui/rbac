/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : rbac

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-11-11 22:21:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for think_auth
-- ----------------------------
DROP TABLE IF EXISTS `think_auth`;
CREATE TABLE `think_auth` (
  `auth_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `auth_name` varchar(20) NOT NULL COMMENT '名称',
  `auth_pid` smallint(6) unsigned NOT NULL COMMENT '父id',
  `auth_c` varchar(32) NOT NULL DEFAULT '' COMMENT '控制器',
  `auth_a` varchar(32) NOT NULL DEFAULT '' COMMENT '操作方法',
  `auth_path` varchar(32) NOT NULL COMMENT '全路径',
  `auth_level` tinyint(4) NOT NULL DEFAULT '0' COMMENT '级别',
  PRIMARY KEY (`auth_id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_auth
-- ----------------------------
INSERT INTO `think_auth` VALUES ('44', '商品管理', '0', '', '', '44', '0');
INSERT INTO `think_auth` VALUES ('45', '商品添加', '44', 'Goods', 'add', '44-45', '1');
INSERT INTO `think_auth` VALUES ('46', '商品列表', '44', 'Goods', 'goodsList', '44-46', '1');
INSERT INTO `think_auth` VALUES ('47', '会员管理', '0', '', '', '47', '0');
INSERT INTO `think_auth` VALUES ('48', '会员添加', '47', 'Users', 'add', '47-48', '1');
INSERT INTO `think_auth` VALUES ('49', '会员列表', '47', 'Users', 'usersList', '47-49', '1');
INSERT INTO `think_auth` VALUES ('51', '系统设置', '0', '', '', '51', '0');
INSERT INTO `think_auth` VALUES ('52', '管理员添加', '51', 'Manager', 'add', '51-52', '1');
INSERT INTO `think_auth` VALUES ('53', '管理员列表', '51', 'Manager', 'managerList', '51-53', '1');
INSERT INTO `think_auth` VALUES ('54', '角色添加', '51', 'Role', 'add', '51-54', '1');
INSERT INTO `think_auth` VALUES ('55', '角色列表', '51', 'Role', 'roleList', '51-55', '1');
INSERT INTO `think_auth` VALUES ('56', '权限添加', '51', 'Auth', 'add', '51-56', '1');
INSERT INTO `think_auth` VALUES ('57', '权限列表', '51', 'Auth', 'authList', '51-57', '1');

-- ----------------------------
-- Table structure for think_manager
-- ----------------------------
DROP TABLE IF EXISTS `think_manager`;
CREATE TABLE `think_manager` (
  `mg_id` int(11) NOT NULL AUTO_INCREMENT,
  `mg_name` varchar(32) NOT NULL,
  `mg_pwd` varchar(32) NOT NULL,
  `mg_time` int(10) unsigned NOT NULL COMMENT '时间',
  `mg_role_id` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '角色id',
  PRIMARY KEY (`mg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_manager
-- ----------------------------
INSERT INTO `think_manager` VALUES ('1', 'admin', '670b14728ad9902aecba32e22fa4f6bd', '1510279263', '0');
INSERT INTO `think_manager` VALUES ('2', 'xiaoming', '670b14728ad9902aecba32e22fa4f6bd', '1510279263', '16');
INSERT INTO `think_manager` VALUES ('3', 'fengfeng', '670b14728ad9902aecba32e22fa4f6bd', '1510279263', '15');

-- ----------------------------
-- Table structure for think_role
-- ----------------------------
DROP TABLE IF EXISTS `think_role`;
CREATE TABLE `think_role` (
  `role_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(20) NOT NULL COMMENT '角色名称',
  `role_auth_ids` varchar(128) NOT NULL DEFAULT '' COMMENT '权限ids,1,2,5',
  `role_auth_ac` text COMMENT '模块-操作',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_role
-- ----------------------------
INSERT INTO `think_role` VALUES ('15', '经理', '47,48,49', 'Users-add,Users-usersList,');
INSERT INTO `think_role` VALUES ('16', '主管', '47,48,49', 'Users-add,Users-usersList,');
