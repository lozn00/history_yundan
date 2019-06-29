/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50045
Source Host           : localhost:3306
Source Database       : shop56

Target Server Type    : MYSQL
Target Server Version : 50045
File Encoding         : 65001

Date: 2015-01-22 12:26:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for daojian
-- ----------------------------
DROP TABLE IF EXISTS `daojian`;
CREATE TABLE `daojian` (
  `扫描单号` varchar(255) NOT NULL COMMENT '扫描单号',
  `id` int(11) NOT NULL auto_increment,
  `扫描时间` varchar(255) default NULL COMMENT '扫描时间',
  `上传时间` varchar(255) default NULL COMMENT '上传时间',
  `扫描站点` varchar(255) default NULL COMMENT '最新扫描站点',
  `上一站点` varchar(255) default NULL COMMENT '上一站点',
  `班次` varchar(255) default NULL COMMENT '班次',
  `预报总运单` varchar(255) default NULL COMMENT '预报总运单',
  `运单件数` varchar(255) default NULL COMMENT '运单件数',
  `运单重量` varchar(255) default NULL COMMENT '重量',
  `操作员` varchar(255) default NULL COMMENT '操作员',
  `寄件站点` varchar(255) default NULL COMMENT '寄件站点',
  `客户名称` varchar(255) default NULL COMMENT '客户名称',
  `收件人` varchar(255) default NULL COMMENT '收件人',
  `收件地址` varchar(255) default NULL COMMENT '收件地址',
  `件数` varchar(255) default NULL COMMENT '件数',
  `重量` varchar(255) default NULL COMMENT '重量',
  `订单号码` varchar(255) default NULL COMMENT '订单号码',
  `订单类型` varchar(255) default NULL COMMENT '订单类型',
  `包装类型` varchar(255) default NULL COMMENT '包装类型',
  `目的地` varchar(255) default NULL COMMENT '目的地',
  `派件站点` varchar(255) default NULL COMMENT '派件站点',
  `服务方式` varchar(255) default NULL COMMENT '服务方式',
  `商品` varchar(255) default NULL COMMENT '商品',
  `货款支付方式` varchar(255) default NULL COMMENT '货款支付方式',
  `代收货款` varchar(255) default NULL COMMENT '代收货款',
  `保价金额` varchar(255) default NULL COMMENT '保价金额',
  `派件员` varchar(255) default NULL COMMENT '派件员',
  `配送状态` varchar(255) default NULL COMMENT '配送状态',
  `退件状态` varchar(255) default NULL COMMENT '退件状态',
  `问题状态` varchar(255) default NULL COMMENT '问题状态',
  `问题描述` varchar(255) default NULL COMMENT '问题描述',
  `收件电话` varchar(255) default NULL COMMENT '收件电话',
  `收件手机` varchar(255) default NULL COMMENT '收件手机',
  `到付款` varchar(255) default NULL COMMENT '到付款',
  `声明价值` varchar(255) default NULL COMMENT '声明价值',
  `备注` varchar(255) default NULL COMMENT '备注',
  `签收人` varchar(255) default NULL COMMENT '签收人',
  `上传人` varchar(255) default NULL COMMENT '上传人',
  `签收日期` varchar(255) default NULL COMMENT '签收日期',
  `上传日期` varchar(255) default NULL COMMENT '上传日期',
  `寄件日期` varchar(255) default NULL COMMENT '寄件日期',
  `配送要求` varchar(255) default NULL COMMENT '配送要求',
  PRIMARY KEY  (`id`,`扫描单号`),
  UNIQUE KEY `number` (`扫描单号`)
) ENGINE=InnoDB AUTO_INCREMENT=248 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of daojian
-- ----------------------------
