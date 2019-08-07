-- --------------------------------------------------------
-- 主機:                           127.0.0.1
-- 伺服器版本:                        10.3.16-MariaDB - mariadb.org binary distribution
-- 伺服器操作系統:                      Win64
-- HeidiSQL 版本:                  10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- 傾印 phpday2019 的資料庫結構
CREATE DATABASE IF NOT EXISTS `phpday2019` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `phpday2019`;

-- 傾印  表格 phpday2019.order 結構
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `address` varchar(50) NOT NULL DEFAULT '0',
  `phone` varchar(50) NOT NULL DEFAULT '0',
  `total_price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='訂單';

-- 取消選取資料匯出。
-- 傾印  表格 phpday2019.order_item 結構
CREATE TABLE IF NOT EXISTS `order_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL DEFAULT 0 COMMENT '訂單編號',
  `product_id` int(11) NOT NULL COMMENT '產品編號',
  `price` decimal(10,2) DEFAULT NULL COMMENT '價格',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='訂單項目';

-- 取消選取資料匯出。
-- 傾印  表格 phpday2019.products 結構
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL COMMENT '產品分類ID',
  `name` varchar(50) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 取消選取資料匯出。
-- 傾印  表格 phpday2019.product_category 結構
CREATE TABLE IF NOT EXISTS `product_category` (
  `id` int(11) DEFAULT NULL,
  `name` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='產品分類';

-- 取消選取資料匯出。
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
