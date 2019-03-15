/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : lamke

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-03-15 18:45:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` char(50) NOT NULL,
  `login_count` int(4) NOT NULL,
  `login_time` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '85', '1527575548', '123');
INSERT INTO `admin` VALUES ('3', '123456', 'e10adc3949ba59abbe56e057f20f883e', '2', '1523612305', null);

-- ----------------------------
-- Table structure for `banner`
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `lang` varchar(11) NOT NULL DEFAULT 'cn' COMMENT '语言',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of banner
-- ----------------------------
INSERT INTO `banner` VALUES ('1', '20180504\\2aa6c948e152d18955d39ce568ca48cf.jpg', 'English——banner1', 'http://www.baidu.com', 'en');
INSERT INTO `banner` VALUES ('5', '20180504\\ff5d2d8b646e2e6baebd484574834b2f.jpg', '中文——轮播图', 'http://www.baidu.com', 'cn');

-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name_cn` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL,
  `cate_path` varchar(255) NOT NULL,
  `cate_name_en` varchar(255) NOT NULL DEFAULT 'cn',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('61', '童装', '62', '62', 'Children\'s garments');
INSERT INTO `category` VALUES ('62', '服装', '0', '0', 'dress');
INSERT INTO `category` VALUES ('63', '女装', '62', '62', 'Women\'s clothes');
INSERT INTO `category` VALUES ('64', '玩具', '0', '0', 'toy');
INSERT INTO `category` VALUES ('65', '居家', '0', '0', 'Home');

-- ----------------------------
-- Table structure for `download`
-- ----------------------------
DROP TABLE IF EXISTS `download`;
CREATE TABLE `download` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of download
-- ----------------------------
INSERT INTO `download` VALUES ('1', '创新方资料包', 'http://www.baidu.com', '1');

-- ----------------------------
-- Table structure for `link`
-- ----------------------------
DROP TABLE IF EXISTS `link`;
CREATE TABLE `link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link_name_cn` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `link_name_en` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of link
-- ----------------------------

-- ----------------------------
-- Table structure for `message`
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contents` varchar(255) DEFAULT NULL,
  `time` varchar(255) NOT NULL,
  `status` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of message
-- ----------------------------

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_cn` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `abstract_cn` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `content_cn` longtext NOT NULL,
  `vTimes` int(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `recommend` int(11) NOT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `abstract_en` varchar(255) DEFAULT NULL,
  `content_en` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('19', '新闻1', null, '新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1', '1526026142', '<p>新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1</p>', '0', '1', '0', '63', 'News1', 'News1News1News1News1News1News1News1News1News1News1', '<p>News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1</p>');
INSERT INTO `news` VALUES ('20', '行业新闻', null, '行业新闻行业新闻行业新闻行业新闻行业新闻', '1526281040', '<p>行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻</p>', '0', '1', '1', '64', 'industry news', 'industry news industry news industry news industry ', '<p>industry news industry news industry news industryindustry news industry news industry news industryindustry news industry news industry news industryindustry news industry news industry news industryindustry news industry news industry news industryindustry news industry news industry news industryindustry news industry news industry news industryindustry news industry news industry news industryindustry news industry news industry news industryindustry news industry news industry news industryindustry news industry news industry news industryindustry news industry news industry news industryindustry news industry news industry news industryindustry news industry news industry news industryindustry news industry news industry news industryindustry news industry news industry news industryindustry news industry news industry news industryindustry news industry news industry news industryindustry news industry news industry news industryindustry news industry news industry news industryindustry news industry news industry news industryindustry news industry news industry news industry</p>');
INSERT INTO `news` VALUES ('21', '行业新闻1', null, '行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1', '1526281126', '<p>行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1行业新闻1</p>', '0', '1', '1', '65', 'industry news1', 'industry news1 industry news1 industry news1 industry news1', '<p>industry news1 industry news1 industry news1 industry news1industry news1 industry news1 industry news1 industry news1industry news1 industry news1 industry news1 industry news1industry news1 industry news1 industry news1 industry news1industry news1 industry news1 industry news1 industry news1industry news1 industry news1 industry news1 industry news1industry news1 industry news1 industry news1 industry news1industry news1 industry news1 industry news1 industry news1industry news1 industry news1 industry news1 industry news1industry news1 industry news1 industry news1 industry news1industry news1 industry news1 industry news1 industry news1industry news1 industry news1 industry news1 industry news1industry news1 industry news1 industry news1 industry news1</p>');
INSERT INTO `news` VALUES ('22', '新闻1', null, '新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1', '1526281435', '<p><span style=\"white-space: pre;\"></span><span style=\"white-space: pre;\"></span></p><p>行业新闻<span style=\"white-space:pre\"></span>行业新闻行业新闻行业新闻行业新闻行业新闻<span style=\"white-space:pre\"></span>1526281040<span style=\"white-space:pre\"></span></p><p>行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻行业新闻</p><p><br/></p>', '0', '1', '1', '65', 'News1', 'News1News1News1News1News1News1News1News1News1News1', '<p>News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1News1</p>');

-- ----------------------------
-- Table structure for `news_cate`
-- ----------------------------
DROP TABLE IF EXISTS `news_cate`;
CREATE TABLE `news_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name_cn` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL,
  `cate_path` varchar(255) NOT NULL,
  `cate_name_en` varchar(255) NOT NULL DEFAULT 'cn',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news_cate
-- ----------------------------
INSERT INTO `news_cate` VALUES ('63', '公司新闻', '0', '0', 'Company news');
INSERT INTO `news_cate` VALUES ('64', '行业新闻', '0', '0', 'Industry news');
INSERT INTO `news_cate` VALUES ('65', '部门新闻', '63', '63', 'Department news');

-- ----------------------------
-- Table structure for `order`
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` varchar(255) NOT NULL,
  `num` int(11) DEFAULT '1',
  `name` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tel` varchar(255) NOT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contents` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `status` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order
-- ----------------------------

-- ----------------------------
-- Table structure for `product`
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_cn` varchar(255) NOT NULL COMMENT '标题',
  `goods_num` varchar(255) NOT NULL COMMENT '商品编号',
  `details_cn` longtext COMMENT '详情',
  `image` longtext NOT NULL COMMENT '封面图缩略图',
  `cate_id` int(11) NOT NULL COMMENT '上级id',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '状态 0：下架 1：上架',
  `price` int(11) NOT NULL COMMENT '价格',
  `simg` varchar(255) NOT NULL COMMENT '产品轮播图',
  `time` varchar(255) NOT NULL COMMENT '上传时间',
  `oldprice` int(11) DEFAULT NULL COMMENT '原价',
  `desc_cn` varchar(255) NOT NULL DEFAULT '0' COMMENT '描述',
  `name_en` varchar(255) NOT NULL DEFAULT 'cn',
  `recommend` int(5) NOT NULL DEFAULT '0',
  `details_en` longtext,
  `desc_en` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('79', '222', '222', '<p>2222</p>', '20180529\\118b81a0819e0fad6cb27638e86f3c8c.png,20180529\\ad1a3878cb7f03a7715303b400253b6a.png,', '62', '1', '222', '20180529\\e1aa849b3a7fc364f4e9d8e9bf4d9ec1.jpg', '1527577495', '222', '222', '2222', '0', '<p>2222</p>', '2222');
INSERT INTO `product` VALUES ('76', '333', '222', '<p>222</p>', '20180523\\33406e0cd6f3447f49b4b53cd2d4cb94.jpg,20180523\\b087fc00961f3e5be41963cbb5bdf1bd.jpg,', '62', '1', '222', '20180523\\2fcfd667f0ca40ae348baa952ba41379.jpg', '1527059217', '222', '222', '333', '1', '', '');
INSERT INTO `product` VALUES ('80', '111', '1111', '<p>111</p>', '20180529\\2c0a4baac4e63282c8ecca7bf3b7a041.jpg,20180529\\a714988c2a2488d3db80c2c26451f321.png,', '61', '1', '1', '20180529\\837f10559268eac4c0e65ee35d3c20e7.jpg', '1527577586', '1111', '111122222', '111', '0', '<p>2222</p>', '2222');
INSERT INTO `product` VALUES ('75', '222', '2222', '<p>11111</p>', '20180522\\b3c9504520ba8d89aed61db6803be8cf.jpg,20180522\\bd751b82a9130bfd1bbc31514fec7587.jpg,20180522\\6658c6458a343181aa6b7acc80564869.jpg,20180522\\08a880ae57bbb90f7745e00a0e3026bf.jpg,20180522\\aaca26b7954dfb8bc1532d68bc83d7b7.jpg,20180522\\664673e9c208701af1c58327cfef008a.jpg,', '63', '1', '222', '20180522\\9f36995fe811ff05da21064926899504.jpg', '1526958547', '222', '11111', '222', '1', '<p>22222</p>', '2222222');

-- ----------------------------
-- Table structure for `system`
-- ----------------------------
DROP TABLE IF EXISTS `system`;
CREATE TABLE `system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(255) DEFAULT NULL,
  `title_cn` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `copyright` varchar(255) DEFAULT NULL,
  `icp` varchar(255) DEFAULT NULL,
  `baidu_count` varchar(255) DEFAULT NULL,
  `logo_cn` varchar(255) DEFAULT NULL,
  `logo_en` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `address_cn` varchar(255) DEFAULT NULL,
  `address_en` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `fax_number` varchar(255) DEFAULT NULL,
  `profile_cn` longtext,
  `profile_en` longtext,
  `contact_cn` longtext,
  `contact_en` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of system
-- ----------------------------
INSERT INTO `system` VALUES ('1', '蓝科,Lankecms', '蓝科企业官网', '蓝科企业网站系统LankeCMS是采用PHP+MYSQL技术和MVC模式进行开发的，架构清晰，代码易于维护。支持伪静态功能，可生成google和百度地图，支持自定义url、关键字和描述，符合SEO标准。拥有企业网站常用的模块功能(企业简介模块、新闻模块、产品模块、下载模块、图片模块、在线留言、在线订单、友情链接、网站地图等)，强大灵活的后台管理功能，可为企业打造出专业且具有营销力的标准网站。', ' 2013 All Right Reserved', '08118166', '', '20180504\\f829149d12c751b63e5dc0a36ead9736.png', '20180504\\314a77f7e0ea9625e85c2918681a15bb.png', 'lamke website', '广东省广州市天河区天平架沙太路沙太路', 'Guangdong province Guangzhou Tianhe District Ping Ping Sha Tai Road Sha Tai Road', '020-87961814 ', '020-98-87961814', '<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(51, 51, 51); font-family: Arial, \" microsoft=\"\" font-size:=\"\" white-space:=\"\" background-color:=\"\">蓝科企业<a href=\"http://www.qq.com/\" target=\"_blank\" style=\"box-sizing: border-box; background-color: transparent; color: rgb(51, 122, 183); text-decoration-line: none; transition: 0.5s;\">网站系统</a>LankeCMS是采用PHP+MYSQL技术和MVC模式进行开发的，架构清晰，代码易于维护。支持伪静态功能，可生成google和百度地图，支持自定义url、关键字和描述，符合SEO标准。拥有企业网站常用的模块功能(企业简介模块、新闻模块、产品模块、下载模块、图片模块、在线留言、在线订单、友情链接、网站地图等)，强大灵活的后台管理功能，可为企业打造出专业且具有营销力的标准网站。</p><p><span style=\"color: rgb(51, 51, 51); font-family: Arial, \" microsoft=\"\" font-size:=\"\" background-color:=\"\">网站系统功能介绍：&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, \" microsoft=\"\" font-size:=\"\" white-space:=\"\" background-color:=\"\"/><span style=\"color: rgb(51, 51, 51); font-family: Arial, \" microsoft=\"\" font-size:=\"\" background-color:=\"\">1. 单页模块：可发布企业的各类信息，如企业简介、组织机构、企业荣誉、联系方式等，并可随意增删。&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, \" microsoft=\"\" font-size:=\"\" white-space:=\"\" background-color:=\"\"/><span style=\"color: rgb(51, 51, 51); font-family: Arial, \" microsoft=\"\" font-size:=\"\" background-color:=\"\">2. 新闻模块：可发布企业新闻和行业新闻等，支持二级栏目，栏目个数无限制。&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, \" microsoft=\"\" font-size:=\"\" white-space:=\"\" background-color:=\"\"/><span style=\"color: rgb(51, 51, 51); font-family: Arial, \" microsoft=\"\" font-size:=\"\" background-color:=\"\">3. 产品模块：产品支持二级分类，并可对产品直接下订单询价，且支持邮件通知，更符合企业营销。&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, \" microsoft=\"\" font-size:=\"\" white-space:=\"\" background-color:=\"\"/><span style=\"color: rgb(51, 51, 51); font-family: Arial, \" microsoft=\"\" font-size:=\"\" background-color:=\"\">4. 图片模块：以图片相册的方式，可发布成功案例或公司相册等栏目，更直观的展示企业的优越性。&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, \" microsoft=\"\" font-size:=\"\" white-space:=\"\" background-color:=\"\"/><span style=\"color: rgb(51, 51, 51); font-family: Arial, \" microsoft=\"\" font-size:=\"\" background-color:=\"\">5. 下载模块：用户可在后台上传文档资料，方便网站客户下载使用。&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, \" microsoft=\"\" font-size:=\"\" white-space:=\"\" background-color:=\"\"/><span style=\"color: rgb(51, 51, 51); font-family: Arial, \" microsoft=\"\" font-size:=\"\" background-color:=\"\">6. 在线留言：让客户的建议留言能及时反馈给企业，且支持邮件通知，让沟通变得更加方便。&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, \" microsoft=\"\" font-size:=\"\" white-space:=\"\" background-color:=\"\"/><span style=\"color: rgb(51, 51, 51); font-family: Arial, \" microsoft=\"\" font-size:=\"\" background-color:=\"\">7. 产品搜索：可对客户输入的关键字进行产品搜索，增加了网站的灵活性。&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, \" microsoft=\"\" font-size:=\"\" white-space:=\"\" background-color:=\"\"/><span style=\"color: rgb(51, 51, 51); font-family: Arial, \" microsoft=\"\" font-size:=\"\" background-color:=\"\">8. 产品复制：可对已添加的产品进行复制，从而提高了添加产品的效率。&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, \" microsoft=\"\" font-size:=\"\" white-space:=\"\" background-color:=\"\"/><span style=\"color: rgb(51, 51, 51); font-family: Arial, \" microsoft=\"\" font-size:=\"\" background-color:=\"\">9. 图片水印：可在后台设置公司的水印图片，以防止企业产品图片被盗用。&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, \" microsoft=\"\" font-size:=\"\" white-space:=\"\" background-color:=\"\"/><span style=\"color: rgb(51, 51, 51); font-family: Arial, \" microsoft=\"\" font-size:=\"\" background-color:=\"\">10. 邮件通知：在客户下订单或留言的同时，会发邮件到您指定的邮箱，让工作更有效率的。&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, \" microsoft=\"\" font-size:=\"\" white-space:=\"\" background-color:=\"\"/><span style=\"color: rgb(51, 51, 51); font-family: Arial, \" microsoft=\"\" font-size:=\"\" background-color:=\"\">11.搜索优化：全站支持伪静态，可自定义keywords、description、url，生成sitemap功能，添加内链和标签等功能。</span></p><p><br/></p>', '<p>The blue science enterprise website system LankeCMS is developed by using PHP+MYSQL technology and MVC mode. The structure is clear and the code is easy to maintain. It supports pseudo static function, generates Google and Baidu maps, supports custom URL, keywords and descriptions, and conforms to SEO standard. With the common module functions of the enterprise website (enterprise profile module, news module, product module, download module, picture module, online message, online order, friendship link, site map, etc.), the powerful and flexible background management function can create a professional and marketing standard website for the enterprise.</p><p><br/></p><p>Website system function introduction:</p><p>1. single page module: all kinds of information can be released, such as company profiles, organization, enterprise honor, contact information, etc., and can be added or deleted at will.</p><p>2. news module: it can release enterprise news and industry news, etc. it supports two columns, and the number of columns is unlimited.</p><p>3. product module: product support two level classification, and can directly order inquiry products, and support e-mail notification, more in line with enterprise marketing.</p><p>4. photo module: in the form of photo album, you can publish successful cases or company albums and other columns, showing the superiority of enterprises more intuitively.</p><p>5. download module: users can upload document materials in the background, so that website users can download and use them conveniently.</p><p>6. online message: let the customer&#39;s suggestion message be timely feedback to the enterprise, and support email notification, so that communication becomes more convenient.</p><p>7. product search: product search for keywords entered by customers increases the flexibility of the website.</p><p>8. product duplication: the product can be replicated, thus improving the efficiency of adding products.</p><p>9. picture watermark: you can set up the watermark picture in the background to prevent the theft of the product image.</p><p>10. mail notification: when ordering or leaving messages, customers will send mail to your designated mailbox to make the work more efficient.</p><p>11. search optimization: the whole station supports pseudo static. It can customize keywords, description and URL to generate sitemap functions, add inner chains and labels.</p><p><br/></p>', '<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; clear: both; color: rgb(51, 51, 51); font-family: Arial, &quot;microsoft yahei&quot;, Helvetica, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255); padding-top: 20px;\">联系人：钟若天</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; clear: both; color: rgb(51, 51, 51); font-family: Arial, &quot;microsoft yahei&quot;, Helvetica, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">手机：13933336666</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; clear: both; color: rgb(51, 51, 51); font-family: Arial, &quot;microsoft yahei&quot;, Helvetica, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">电话：020-87961814</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; clear: both; color: rgb(51, 51, 51); font-family: Arial, &quot;microsoft yahei&quot;, Helvetica, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">邮箱：Lankecms@163.com</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; clear: both; color: rgb(51, 51, 51); font-family: Arial, &quot;microsoft yahei&quot;, Helvetica, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">地址： 广东省广州市天河区天平架沙太路沙太路</p><p><br/></p>', '<p>Contact: the clock like the sky</p><p><br/></p><p>Cell phone: 13933336666</p><p><br/></p><p>Phone: 020-87961814</p><p><br/></p><p>Mailbox: Lankecms@163.com</p><p><br/></p><p>Address: Sha Tai Road, Tianhe District Ping Tai Sha Road, Guangzhou, Guangdong</p><p><br/></p>');
