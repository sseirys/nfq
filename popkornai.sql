-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 17, 2017 at 06:56 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `popkornai`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(16) COLLATE utf8_lithuanian_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `total_price` double NOT NULL,
  `customer` varchar(128) COLLATE utf8_lithuanian_ci NOT NULL,
  `address` varchar(128) COLLATE utf8_lithuanian_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_lithuanian_ci NOT NULL,
  `tel_nr` varchar(16) COLLATE utf8_lithuanian_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_lithuanian_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `status`, `quantity`, `unit_price`, `total_price`, `customer`, `address`, `city`, `tel_nr`, `email`, `date`) VALUES
(2, 'sent', 5, 5, 0, 'Vietiniai pankai', 'Pankų rojus', 'Kaunas', '868868686', 'pankas@tankistualeja.lt', '2017-09-17 16:22:23'),
(7, 'new', 22, 5, 110, 'dqwd', 'wqdqw', 'Kaunas', 'sdq', 'pankas@tankistualeja.lt', '2017-09-17 17:52:53');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
