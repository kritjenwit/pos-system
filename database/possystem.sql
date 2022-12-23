-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.27-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.2.0.6576
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table pos-system.product_info
CREATE TABLE IF NOT EXISTS `product_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `product_type` varchar(50) DEFAULT NULL,
  `product_brand` varchar(50) DEFAULT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table pos-system.product_info: ~5 rows (approximately)
INSERT INTO `product_info` (`id`, `product_id`, `product_type`, `product_brand`, `product_name`, `product_price`) VALUES
	(1, 1, 'เสื้อยืด', 'nike', 'เสื้อรุ่น 555', 750),
	(2, 2, 'เสื้อเชิร์ต', 'GQ', 'เสื้อสีขาว', 750),
	(3, 4, 'รองเท้า', 'nike', 'รองเท้าNike', 750),
	(4, 3, 'เสื้อกันหนาว', 'nike', 'เสื้อสีดำ', 750),
	(5, 5, 'เสื้อเชิร์ต', 'G2000', 'เสื้อสีขาวรุ่น 158', 750);

-- Dumping structure for table pos-system.sale_amount
CREATE TABLE IF NOT EXISTS `sale_amount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `product_type` varchar(50) DEFAULT '0',
  `product_brand` varchar(50) NOT NULL DEFAULT '0',
  `product_name` varchar(50) NOT NULL DEFAULT '0',
  `amount` int(11) NOT NULL DEFAULT 0,
  `price` int(11) NOT NULL DEFAULT 0,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table pos-system.sale_amount: ~49 rows (approximately)
INSERT INTO `sale_amount` (`id`, `user_id`, `product_id`, `product_type`, `product_brand`, `product_name`, `amount`, `price`, `date`) VALUES
	(1, 1, 1, 'เสื้อยืด', 'nike', 'เสื้อยืดรุ่น555', 2, 1500, '2022-12-20 15:42:39'),
	(2, 1, 1, 'เสื้อยืด', 'nike', 'เสื้อยืดรุ่น555', 2, 1500, '2022-12-20 15:42:50'),
	(3, 1, 1, 'เสื้อยืด', 'nike', 'เสื้อยืดรุ่น555', 2, 1500, '2022-12-20 15:42:51'),
	(4, 1, 1, 'เสื้อยืด', 'nike', 'เสื้อยืดรุ่น555', 2, 1500, '2022-12-20 15:42:51'),
	(5, 1, 1, 'เสื้อยืด', 'nike', 'เสื้อยืดรุ่น555', 2, 1500, '2022-12-20 15:42:51'),
	(6, 1, 1, 'เสื้อยืด', 'nike', 'เสื้อยืดรุ่น555', 2, 1500, '2022-12-20 15:42:51'),
	(7, 1, 1, 'เสื้อยืด', 'nike', 'เสื้อยืดรุ่น555', 2, 1500, '2022-12-20 15:42:51'),
	(8, 1, 1, 'เสื้อยืด', 'nike', 'เสื้อยืดรุ่น555', 2, 1500, '2022-12-20 15:42:51'),
	(9, 1, 1, 'เสื้อยืด', 'nike', 'เสื้อยืดรุ่น555', 2, 1500, '2022-12-20 15:42:52'),
	(10, 1, 2, 'เสื้อเชิร์ต', 'GQ', 'เสื้อสีขาว', 2, 1500, '2022-12-21 09:41:02'),
	(11, 1, 2, 'เสื้อเชิร์ต', 'GQ', 'เสื้อสีขาว', 2, 1500, '2022-12-21 09:41:04'),
	(12, 1, 2, 'เสื้อเชิร์ต', 'GQ', 'เสื้อสีขาว', 2, 1500, '2022-12-21 09:41:04'),
	(13, 1, 2, 'เสื้อเชิร์ต', 'GQ', 'เสื้อสีขาว', 2, 1500, '2022-12-21 09:41:04'),
	(14, 1, 2, 'เสื้อเชิร์ต', 'GQ', 'เสื้อสีขาว', 2, 1500, '2022-12-21 09:41:04'),
	(15, 1, 2, 'เสื้อเชิร์ต', 'GQ', 'เสื้อสีขาว', 2, 1500, '2022-12-21 09:41:05'),
	(16, 1, 2, 'เสื้อเชิร์ต', 'GQ', 'เสื้อสีขาว', 2, 1500, '2022-12-21 09:41:05'),
	(17, 1, 2, 'เสื้อเชิร์ต', 'GQ', 'เสื้อสีขาว', 2, 1500, '2022-12-21 09:41:05'),
	(18, 1, 2, 'เสื้อเชิร์ต', 'GQ', 'เสื้อสีขาว', 2, 1500, '2022-12-21 09:41:05'),
	(19, 1, 2, 'เสื้อเชิร์ต', 'GQ', 'เสื้อสีขาว', 2, 1500, '2022-12-21 09:41:05'),
	(20, 1, 3, 'เสื้อกันหนาว', 'nike', 'เสื้อสีดำ', 2, 1500, '2022-12-21 09:44:28'),
	(21, 1, 3, 'เสื้อกันหนาว', 'nike', 'เสื้อสีดำ', 2, 1500, '2022-12-21 09:45:09'),
	(22, 1, 3, 'เสื้อกันหนาว', 'nike', 'เสื้อสีดำ', 2, 1500, '2022-12-21 09:45:09'),
	(23, 1, 3, 'เสื้อกันหนาว', 'nike', 'เสื้อสีดำ', 2, 1500, '2022-12-21 09:45:09'),
	(24, 1, 3, 'เสื้อกันหนาว', 'nike', 'เสื้อสีดำ', 2, 1500, '2022-12-21 09:45:09'),
	(25, 1, 3, 'เสื้อกันหนาว', 'nike', 'เสื้อสีดำ', 2, 1500, '2022-12-21 09:45:10'),
	(26, 1, 5, 'เสื้อเชิร์ต', 'G2000', 'เส้อสีขาวรุ่น 158', 2, 1500, '2022-12-21 09:52:46'),
	(27, 1, 5, 'เสื้อเชิร์ต', 'G2000', 'เส้อสีขาวรุ่น 158', 2, 1500, '2022-12-21 09:52:46'),
	(28, 1, 5, 'เสื้อเชิร์ต', 'G2000', 'เส้อสีขาวรุ่น 158', 2, 1500, '2022-12-21 09:52:46'),
	(29, 1, 5, 'เสื้อเชิร์ต', 'G2000', 'เส้อสีขาวรุ่น 158', 2, 1500, '2022-12-21 09:52:47'),
	(30, 0, 2, 'Jacket', 'GQ', 'GQ Jacket', 2, 1400, '2022-12-21 10:32:46'),
	(31, 0, 2, 'Jacket', 'GQ', 'GQ Jacket', 2, 1400, '2022-12-21 10:33:45'),
	(32, 0, 2, 'Jacket', 'GQ', 'GQ Jacket', 2, 1400, '2022-12-21 10:34:25'),
	(33, 0, 2, 'Jacket', 'GQ', 'GQ Jacket', 2, 1400, '2022-12-21 10:35:36'),
	(34, 0, 2, 'Jacket', 'GQ', 'GQ Jacket', 2, 1400, '2022-12-21 10:37:31'),
	(35, 0, 2, 'Jacket', 'GQ', 'GQ Jacket', 2, 1400, '2022-12-21 10:39:05'),
	(36, 0, 2, 'Hood', 'GQ', 'GQ HoodBys', 2, 1400, '2022-12-21 11:08:21'),
	(37, 0, 2, 'GQ', 'เสื้อสีขาว', 'เสื้อเชิร์ต', 12, 9000, '2022-12-23 12:49:05'),
	(38, 0, 2, 'GQ', 'เสื้อสีขาว', 'เสื้อเชิร์ต', 2, 1500, '2022-12-23 12:52:22'),
	(39, 0, 2, 'GQ', 'เสื้อสีขาว', 'เสื้อเชิร์ต', 4, 3000, '2022-12-23 12:53:14'),
	(40, 0, 2, 'GQ', 'เสื้อสีขาว', 'เสื้อเชิร์ต', 1, 750, '2022-12-23 12:54:09'),
	(41, 0, 1, 'nike', 'เสื้อรุ่น 555', 'เสื้อยืด', 2, 1500, '2022-12-23 12:54:37'),
	(42, 0, 2, 'GQ', 'เสื้อสีขาว', 'เสื้อเชิร์ต', 24, 18000, '2022-12-23 12:57:50'),
	(43, 0, 1, 'nike', 'เสื้อรุ่น 555', 'เสื้อยืด', 1, 750, '2022-12-23 12:59:39'),
	(44, 0, 1, 'nike', 'เสื้อรุ่น 555', 'เสื้อยืด', 1, 750, '2022-12-23 13:04:03'),
	(45, 0, 1, 'nike', 'เสื้อรุ่น 555', 'เสื้อยืด', 1, 750, '2022-12-23 13:04:23'),
	(46, 0, 2, 'GQ', 'เสื้อสีขาว', 'เสื้อเชิร์ต', 5, 3750, '2022-12-23 13:19:03'),
	(47, 0, 1, 'nike', 'เสื้อรุ่น 555', 'เสื้อยืด', 4, 3000, '2022-12-23 13:21:02'),
	(48, 0, 2, 'GQ', 'เสื้อสีขาว', 'เสื้อเชิร์ต', 4, 3000, '2022-12-23 13:21:28'),
	(49, 0, 1, 'nike', 'เสื้อรุ่น 555', 'เสื้อยืด', 1, 750, '2022-12-23 13:28:25');

-- Dumping structure for table pos-system.shop_db
CREATE TABLE IF NOT EXISTS `shop_db` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `product_name` varchar(255) NOT NULL DEFAULT '0',
  `product_type` varchar(255) NOT NULL DEFAULT '0',
  `product_brand` varchar(255) NOT NULL DEFAULT '0',
  `amount` int(255) DEFAULT 0,
  `price` int(255) NOT NULL DEFAULT 0,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table pos-system.shop_db: ~23 rows (approximately)
INSERT INTO `shop_db` (`id`, `product_id`, `product_name`, `product_type`, `product_brand`, `amount`, `price`, `date`) VALUES
	(21, 1, 'เสื้อยืด', 'nike', 'เสื้อรุ่น 555', 2, 1500, '2022-12-22 16:20:31'),
	(22, 1, 'เสื้อยืด', 'nike', 'เสื้อรุ่น 555', 2, 1500, '2022-12-22 16:21:10'),
	(23, 2, 'เสื้อเชิร์ต', 'GQ', 'เสื้อสีขาว', 2, 1500, '2022-12-22 16:21:14'),
	(24, 2, 'เสื้อเชิร์ต', 'GQ', 'เสื้อสีขาว', 2, 1500, '2022-12-22 16:21:51'),
	(25, 1, 'เสื้อยืด', 'nike', 'เสื้อรุ่น 555', 2, 1500, '2022-12-22 16:40:26'),
	(26, 2, 'เสื้อเชิร์ต', 'GQ', 'เสื้อสีขาว', 10, 7500, '2022-12-22 16:40:53'),
	(27, 2, 'เสื้อเชิร์ต', 'GQ', 'เสื้อสีขาว', 10, 7500, '2022-12-22 16:41:37'),
	(28, 4, 'รองเท้า', 'nike', 'รองเท้าNike', 5, 3750, '2022-12-22 16:41:57'),
	(29, 4, 'รองเท้า', 'nike', 'รองเท้าNike', 5, 3750, '2022-12-22 16:44:35'),
	(30, 4, 'รองเท้า', 'nike', 'รองเท้าNike', 5, 3750, '2022-12-22 16:45:18'),
	(31, 4, 'รองเท้า', 'nike', 'รองเท้าNike', 5, 3750, '2022-12-22 16:52:43'),
	(32, 4, 'รองเท้า', 'nike', 'รองเท้าNike', 5, 3750, '2022-12-22 16:52:50'),
	(33, 4, 'รองเท้า', 'nike', 'รองเท้าNike', 5, 3750, '2022-12-22 16:55:15'),
	(34, 1, 'เสื้อยืด', 'nike', 'เสื้อรุ่น 555', 1, 750, '2022-12-23 11:59:33'),
	(35, 4, 'รองเท้า', 'nike', 'รองเท้าNike', 14, 10500, '2022-12-23 12:00:21'),
	(36, 2, 'เสื้อเชิร์ต', 'GQ', 'เสื้อสีขาว', 4, 3000, '2022-12-23 12:27:16'),
	(37, 2, 'เสื้อเชิร์ต', 'GQ', 'เสื้อสีขาว', 2, 1500, '2022-12-23 12:40:37'),
	(38, 5, 'เสื้อเชิร์ต', 'G2000', 'เสื้อสีขาวรุ่น 158', 1, 750, '2022-12-23 12:41:21'),
	(39, 4, 'รองเท้า', 'nike', 'รองเท้าNike', 4, 3000, '2022-12-23 12:42:06'),
	(40, 1, 'เสื้อยืด', 'nike', 'เสื้อรุ่น 555', 1, 750, '2022-12-23 12:42:37'),
	(41, 1, 'เสื้อยืด', 'nike', 'เสื้อรุ่น 555', 12, 9000, '2022-12-23 12:43:26'),
	(42, 2, 'เสื้อเชิร์ต', 'GQ', 'เสื้อสีขาว', 23, 17250, '2022-12-23 12:46:15'),
	(43, 2, 'เสื้อเชิร์ต', 'GQ', 'เสื้อสีขาว', 12, 9000, '2022-12-23 12:47:09');

-- Dumping structure for table pos-system.stock
CREATE TABLE IF NOT EXISTS `stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `date_time` date DEFAULT NULL,
  `remain` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table pos-system.stock: ~5 rows (approximately)
INSERT INTO `stock` (`id`, `product_id`, `product_name`, `type`, `date_time`, `remain`) VALUES
	(2, '1', 'เสื้อรุ่น 555', 'เสื้อยืด', '2022-12-23', 21),
	(3, '2', 'เสื้อสีขาว', 'เสื้อเชิร์ต', '2022-12-23', 36),
	(4, '3', 'เสื้อสีดำ', 'เสื้อกันหนาว', '2022-12-22', 30),
	(5, '4', 'รองเท้าNike', 'รองเท้า', '2022-12-23', 17),
	(6, '5', 'เสื้อสีขาวรุ่น 158', 'เสื้อเชิร์ต', '2022-12-23', 6);

-- Dumping structure for table pos-system.users_account
CREATE TABLE IF NOT EXISTS `users_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table pos-system.users_account: ~3 rows (approximately)
INSERT INTO `users_account` (`id`, `username`, `password`, `role`, `date`) VALUES
	(5, 'admin', '1234', 'admin', '2022-12-22 12:48:17'),
	(6, 'john', '1234', 'user', '2022-12-22 12:49:33'),
	(7, 'gaba', '1234', 'user', '2022-12-22 13:18:46');

-- Dumping structure for table pos-system.users_info
CREATE TABLE IF NOT EXISTS `users_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table pos-system.users_info: ~3 rows (approximately)
INSERT INTO `users_info` (`id`, `user_id`, `firstname`, `lastname`, `phone`, `address`, `date`) VALUES
	(6, 5, 'admin', 'minnein', '063xxxxxxx', 'bangkok, 10000', '2022-12-22 12:48:17'),
	(7, 6, 'John', 'smith', '098xxxxxxx', 'bangkok, 100000', '2022-12-22 12:49:33'),
	(8, 7, 'Gaba', 'Baga', '069xxxxxxx', 'Bangkok, 10000', '2022-12-22 13:18:46');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
