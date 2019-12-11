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
CREATE DATABASE IF NOT EXISTS `pbkk` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `pbkk`;

-- Dumping structure for table pbkk.users
CREATE TABLE IF NOT EXISTS `users` (
  `ID_USER` int(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `NAME` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `ROLE` varchar(64) DEFAULT NULL,
  `LAST_LOGIN` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_USER`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table pbkk.users: ~17 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`ID_USER`, `USERNAME`, `PASSWORD`, `NAME`, `EMAIL`, `ROLE`, `LAST_LOGIN`) VALUES
	(1, 'marde12345', '$2y$12$ZHFKcUdiUTFYQktKOWZFYeGkDsH0f1mmLqClrWkI27NM3MkzIdmDG', 'Marde Fasma', 'm@m', 'admin', '2019-12-05 08:29:37'),
	(3, '123', '$2y$12$RzU4czk3Yjc0QWhPTHVhbeLyJ8WvNOsv3W7l82VFtgSkJiUpcwpHm', '123', '123@123', 'user', '0000-00-00 00:00:00'),
	(4, 'user', '$2y$12$UnUrbm9GNVpUTGVrSTZrau6cFH7YuC6ZNeGjErUNhJkenBtwAoA7G', 'Akun user', 'user@user', 'user', '0000-00-00 00:00:00'),
	(5, 'seller1', '$2y$12$Qi95YVpMcUowRzVrSnBjWOMoeY8zZwieFJ2w/QfqHKq/4KreztgZi', 'Akun seller', 'sel@sel', 'seller', '2019-12-05 12:04:57'),
	(6, 'seller2', '$2y$12$SmZwdkt1bk84NWNuNmk4QOO95ycZWqUo28RjBy92rrHh9QAtypMpq', 'Akun seller', 'sel@sel', 'seller', '0000-00-00 00:00:00'),
	(9, 'seller4', '$2y$12$SldScTZicWFVUDRuQkJVR.sXwKAv3A.kYJ0/D/lxPHViZ8hgz2fSO', 'Akun seller', 'sel@sel', 'seller', '0000-00-00 00:00:00'),
	(10, 'buyer1', '$2y$12$RnhENmhzUHRUMjI4TVlJM.DCfL8GLEoxs0w4ZumB1szvzti1OuuJ2', 'Akun Beli', 'b@b', 'user', '0000-00-00 00:00:00'),
	(11, '111', '$2y$12$NWE4clpwMUJkRTNuLzdFYO0OCveUw6VfMeHsFRx0p8n0luFoke.Le', 'Akun User', 'a@a', 'user', '0000-00-00 00:00:00'),
	(12, 'dimas123', '$2y$12$aEFxNTNmVjdqUWRXSWNWaOhCrc.raSiswK4lPALPU5579EtlT85UW', 'Dimas', 'dimas@dimas', 'seller', '0000-00-00 00:00:00'),
	(13, 'beli', '$2y$12$TjNqYVg0ZDRoMjBQclJucueHgPtpTLd9TOb1ZR78/YwdOgdOBAx0S', 'Pembeli', 'beli@gmail.com', 'user', '0000-00-00 00:00:00'),
	(14, '1234123', '$2y$12$ZDFkMm1uM25iaG1xaWVZYuupEpfRO9wlM8E2T27s1zZwKO90xQDne', '123', '123@123', 'user', '0000-00-00 00:00:00'),
	(15, '1234123', '$2y$12$eFl1TkIydDB1WkRqNEZhe.PcrT7Fm7o9pivY6FKHDdbkuaUlN5GXi', '123', '123@123', 'user', '0000-00-00 00:00:00'),
	(16, '123', '$2y$12$dzgxSmZtN3k3VklGK1FyZe3Nluaw45CGPWd8QLNY763Da0HhMxC4.', '123', '123@123', 'user', '0000-00-00 00:00:00'),
	(17, '123', '$2y$12$UmUvWHNIN0s5YnZMUkZSW.MRmfFfoyAUEIOw/8m3aHEtickgucyXe', '123', '123@123', 'user', '0000-00-00 00:00:00'),
	(18, '123', '$2y$12$cFZEa2lxelZER2RPUEwzYOoCXOdLaytNzY9AV7rxfUn1zFgzj9P46', '123', '123@123', 'user', '0000-00-00 00:00:00'),
	(19, '123', '$2y$12$WFBIdzJLTDhUZmhabkhLcuuBs85a0eO77Lx0dJnQJSqIICJ3TH0TC', '123', '123@123', 'user', '0000-00-00 00:00:00'),
	(20, '123', '$2y$12$MkllUVhLM2FUcWNra2pLQufYiqHuWxQstHfZ0SwW2ubEfVu2JzJqG', '123', '123@123', 'user', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
