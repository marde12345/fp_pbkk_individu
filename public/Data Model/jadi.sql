-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.37-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for pbkk
DROP DATABASE IF EXISTS `pbkk`;
CREATE DATABASE IF NOT EXISTS `pbkk` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `pbkk`;

-- Dumping structure for table pbkk.blog
CREATE TABLE IF NOT EXISTS `blog` (
  `id_blog` int(11) NOT NULL,
  `id_category` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `blogdesc` text,
  `blogimg` varchar(255) DEFAULT NULL,
  `blogcreated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `blogstatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_blog`),
  KEY `fk_relationship_3` (`id_category`),
  CONSTRAINT `fk_relationship_3` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pbkk.blog: ~0 rows (approximately)
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;

-- Dumping structure for table pbkk.category
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pbkk.category: ~0 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table pbkk.order
CREATE TABLE IF NOT EXISTS `order` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `ordertotal` int(11) DEFAULT NULL,
  `orderstatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_order`),
  KEY `fk_relationship_1` (`id_user`),
  CONSTRAINT `fk_relationship_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pbkk.order: ~0 rows (approximately)
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
/*!40000 ALTER TABLE `order` ENABLE KEYS */;

-- Dumping structure for table pbkk.order_detail
CREATE TABLE IF NOT EXISTS `order_detail` (
  `id_order_detail` int(11) NOT NULL,
  `id_order` int(11) DEFAULT NULL,
  `productquant` int(11) DEFAULT NULL,
  `productprice` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_order_detail`),
  KEY `fk_relationship_2` (`id_order`),
  CONSTRAINT `fk_relationship_2` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pbkk.order_detail: ~0 rows (approximately)
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;

-- Dumping structure for table pbkk.product
CREATE TABLE IF NOT EXISTS `product` (
  `id_product` int(11) NOT NULL,
  `id_category` int(11) DEFAULT NULL,
  `productname` varchar(255) DEFAULT NULL,
  `quant` int(11) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `viewers` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `prcreated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `prupdated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_product`),
  KEY `fk_relationship_4` (`id_category`),
  CONSTRAINT `fk_relationship_4` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pbkk.product: ~0 rows (approximately)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Dumping structure for table pbkk.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` char(60) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` decimal(15,0) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `verifcode` char(46) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_login` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `userstatus` int(11) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pbkk.user: ~0 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `username`, `password`, `name`, `email`, `phone`, `address`, `photo`, `verifcode`, `created_at`, `updated_at`, `last_login`, `userstatus`, `role`) VALUES
	(1, 'marde12345', '$2y$12$ZHFKcUdiUTFYQktKOWZFYeGkDsH0f1mmLqClrWkI27NM3MkzIdmDG', 'Marde Fasma', 'm@m', NULL, NULL, NULL, NULL, '2019-12-12 04:11:54', '0000-00-00 00:00:00', '2019-12-05 08:29:37', NULL, 'admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
