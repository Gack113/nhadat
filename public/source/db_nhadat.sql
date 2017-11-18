/*
Navicat MySQL Data Transfer

Source Server         : study
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_nhadat

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-11-17 22:06:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bills
-- ----------------------------
DROP TABLE IF EXISTS `bills`;
CREATE TABLE `bills` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `bills_ibfk_1` (`id_customer`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bills
-- ----------------------------
INSERT INTO `bills` VALUES ('21', '22', '2017-11-17', '6800000000', 'COD', 'Bạn của nam', '2017-11-17 02:27:33', '2017-11-17 02:27:33');

-- ----------------------------
-- Table structure for bill_detail
-- ----------------------------
DROP TABLE IF EXISTS `bill_detail`;
CREATE TABLE `bill_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `bill_detail_ibfk_2` (`id_product`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bill_detail
-- ----------------------------
INSERT INTO `bill_detail` VALUES ('26', '21', '1', '2', '3400000000', '2017-11-17 02:27:33', '2017-11-17 02:27:33');

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES ('21', 'Lê Ngọc Nam', 'nam', 'kugack@gmail.com', 'Q9', '0934110397', 'Đặt rồi đừng bán ai nha', '2017-11-17 01:11:22', '2017-11-17 01:11:22');
INSERT INTO `customer` VALUES ('22', 'Huỳnh Anh Thêm Lộc', 'nam', 'lochuynh@gmail.com', 'Bình Chánh', '090909099', 'Bạn của nam', '2017-11-17 02:27:33', '2017-11-17 02:27:33');

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type` int(10) unsigned DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new` tinyint(4) DEFAULT '0',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_id_type_foreign` (`id_type`),
  CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'Bán nhà 634/16 Trần Phú P6 TP Vũng Tàu', '1', 'Bán nhà 634/16 Trần Phú P6 TP Vũng Tàu\r\nDiện tích: Ngang 8m, Dài 18m, Tổng 150m2 (110 thổ cư)\r\nĐã xây dựng 1 căn nhà 1 lầu 1 trệt\r\nDiện tích: Ngang 4m, Dài 18m\r\n\r\n<br><br><h6>Liên hệ:  0165 3636 229</h6>', '3400000000', '0', '1510897473.jpg', 'Căn', 'TP. Vũng Tàu', '1', 'ban-nha-63416-tran-phu-p6-tp-vung-tau', '2017-11-16 12:53:53', '2017-11-17 12:44:33');
INSERT INTO `products` VALUES ('3', 'Bán nhà 634/16 Trần Phú P6 TP Vũng Tàu', '1', '<p><a href=\"http://nhadat.dev/nha-dat/3\" target=\"_blank\">Bán nhà</a> Vũng Tàu<br></p>', '300000000', '0', '1510900181.jpg', 'Căn', 'Long Thành', '1', 'ban-nha-63416-tran-phu-p6-tp-vung-tau-3', '2017-11-17 13:00:32', '2017-11-17 13:29:42');
INSERT INTO `products` VALUES ('4', 'Đây là bài đăng thử thứ 3', '2', '<p>lol</p>', '2000000000', '0', '1510900325.jpg', 'Mảnh', 'hahahah', '1', 'day-la-bai-dang-thu-thu-3-4', '2017-11-17 13:32:05', '2017-11-17 13:32:05');

-- ----------------------------
-- Table structure for product_images
-- ----------------------------
DROP TABLE IF EXISTS `product_images`;
CREATE TABLE `product_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_product` int(10) unsigned DEFAULT NULL,
  `new` int(10) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_image_id_product` (`id_product`),
  CONSTRAINT `fk_image_id_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of product_images
-- ----------------------------
INSERT INTO `product_images` VALUES ('71', '1', '1', '1510816545_0.jpg', '2017-11-16 14:15:45', '2017-11-16 14:15:45');
INSERT INTO `product_images` VALUES ('72', '1', '1', '1510816546_1.jpg', '2017-11-16 14:15:46', '2017-11-16 14:15:46');
INSERT INTO `product_images` VALUES ('73', '1', '1', '1510816546_2.jpg', '2017-11-16 14:15:46', '2017-11-16 14:15:46');
INSERT INTO `product_images` VALUES ('74', '1', '1', '1510816546_3.jpg', '2017-11-16 14:15:46', '2017-11-16 14:15:46');
INSERT INTO `product_images` VALUES ('75', '1', '1', '1510816546_4.jpg', '2017-11-16 14:15:46', '2017-11-16 14:15:46');
INSERT INTO `product_images` VALUES ('76', '1', '1', '1510816546_5.jpg', '2017-11-16 14:15:47', '2017-11-16 14:15:47');
INSERT INTO `product_images` VALUES ('89', '3', '1', '1510900181_0.jpg', '2017-11-17 13:29:41', '2017-11-17 13:29:41');
INSERT INTO `product_images` VALUES ('90', '3', '1', '1510900181_1.jpg', '2017-11-17 13:29:41', '2017-11-17 13:29:41');
INSERT INTO `product_images` VALUES ('91', '3', '1', '1510900181_2.jpg', '2017-11-17 13:29:41', '2017-11-17 13:29:41');
INSERT INTO `product_images` VALUES ('92', '3', '1', '1510900182_3.jpg', '2017-11-17 13:29:42', '2017-11-17 13:29:42');
INSERT INTO `product_images` VALUES ('93', '3', '1', '1510900182_4.jpg', '2017-11-17 13:29:42', '2017-11-17 13:29:42');
INSERT INTO `product_images` VALUES ('94', '3', '1', '1510900182_5.jpg', '2017-11-17 13:29:42', '2017-11-17 13:29:42');
INSERT INTO `product_images` VALUES ('95', '4', '1', '1510900325_0.jpg', '2017-11-17 13:32:05', '2017-11-17 13:32:05');
INSERT INTO `product_images` VALUES ('96', '4', '1', '1510900326_1.jpg', '2017-11-17 13:32:06', '2017-11-17 13:32:06');

-- ----------------------------
-- Table structure for slide
-- ----------------------------
DROP TABLE IF EXISTS `slide`;
CREATE TABLE `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of slide
-- ----------------------------
INSERT INTO `slide` VALUES ('1', '', 'banner1.jpg');
INSERT INTO `slide` VALUES ('2', '', 'banner2.jpg');
INSERT INTO `slide` VALUES ('3', '', 'banner3.jpg');
INSERT INTO `slide` VALUES ('4', '', 'banner4.jpg');
INSERT INTO `slide` VALUES ('5', '', 'banner5.jpg');
INSERT INTO `slide` VALUES ('6', '', 'banner6.jpg');

-- ----------------------------
-- Table structure for type_products
-- ----------------------------
DROP TABLE IF EXISTS `type_products`;
CREATE TABLE `type_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of type_products
-- ----------------------------
INSERT INTO `type_products` VALUES ('1', 'Nhà', 'Các loại nhà', '', '2017-11-16 16:32:00', '2017-11-16 16:32:03');
INSERT INTO `type_products` VALUES ('2', 'Đất', 'Các loại đất', '', '2017-11-16 16:32:07', '2017-11-16 16:32:10');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('7', 'Lê Ngọc Nam', 'Gack113', 'kugack@gmail.com', '$2y$10$mfv2tl9BPGRxfE5.dUdvGeSucHjokIEZBj3e8UkZ4.8f6OgOqy/J2', 'H5N0woHIx6ymmWcl0hxctx7bzawLXfwCQ0QfZqx3NmsCcIlCxed4EofzgAOl', '2017-11-16 02:02:39', '2017-11-16 02:28:25');
INSERT INTO `users` VALUES ('9', 'Huỳnh Anh Thêm Lộc', 'Loc113', 'Gack113@outlook.com', '$2y$10$5SI0eFEhyGjjNwnbkiNekuXRA0LJ0hT1OoVLh5.sg8MQDBBxP.xkW', null, '2017-11-16 02:41:18', '2017-11-16 02:41:18');
