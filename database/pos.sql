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


-- Dumping database structure for pos-system
CREATE DATABASE IF NOT EXISTS `pos-system` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `pos-system`;

-- Dumping structure for table pos-system.sale_amount
CREATE TABLE IF NOT EXISTS `sale_amount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL,
  `product_type` varchar(50) NOT NULL DEFAULT '0',
  `product_brand` varchar(50) NOT NULL DEFAULT '0',
  `product_name` varchar(50) NOT NULL DEFAULT '0',
  `amount` int(11) NOT NULL DEFAULT 0,
  `price` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table pos-system.sale_amount: ~9 rows (approximately)
DELETE FROM `sale_amount`;
INSERT INTO `sale_amount` (`id`, `user_id`, `product_id`, `product_type`, `product_brand`, `product_name`, `amount`, `price`, `date`) VALUES
	(1, 1, 1, 'เสื้อยืด', 'nike', 'เสื้อยืดรุ่น555', 2, 1500, '2022-12-20 15:42:39'),
	(2, 1, 1, 'เสื้อยืด', 'nike', 'เสื้อยืดรุ่น555', 2, 1500, '2022-12-20 15:42:50'),
	(3, 1, 1, 'เสื้อยืด', 'nike', 'เสื้อยืดรุ่น555', 2, 1500, '2022-12-20 15:42:51'),
	(4, 1, 1, 'เสื้อยืด', 'nike', 'เสื้อยืดรุ่น555', 2, 1500, '2022-12-20 15:42:51'),
	(5, 1, 1, 'เสื้อยืด', 'nike', 'เสื้อยืดรุ่น555', 2, 1500, '2022-12-20 15:42:51'),
	(6, 1, 1, 'เสื้อยืด', 'nike', 'เสื้อยืดรุ่น555', 2, 1500, '2022-12-20 15:42:51'),
	(7, 1, 1, 'เสื้อยืด', 'nike', 'เสื้อยืดรุ่น555', 2, 1500, '2022-12-20 15:42:51'),
	(8, 1, 1, 'เสื้อยืด', 'nike', 'เสื้อยืดรุ่น555', 2, 1500, '2022-12-20 15:42:51'),
	(9, 1, 1, 'เสื้อยืด', 'nike', 'เสื้อยืดรุ่น555', 2, 1500, '2022-12-20 15:42:52');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
