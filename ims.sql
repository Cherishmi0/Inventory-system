-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 05, 2022 at 10:57 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `brand_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `code` varchar(128) NOT NULL,
  `status` int(1) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `name`, `code`, `status`, `date_added`, `date_modified`) VALUES
(1, 'Brand 1', 'B1', 1, '2022-03-01 10:43:23', '2022-03-01 10:43:35'),
(2, 'Nike', 'NK', 1, '0000-00-00 00:00:00', '2022-03-01 12:39:03'),
(3, 'Puma', 'PM11', 1, '0000-00-00 00:00:00', '2022-03-01 12:49:49'),
(4, 'Fila', 'FL', 1, '2022-03-01 12:54:56', '2022-03-01 12:54:56'),
(5, 'puma1', 'PM', 1, '2022-03-03 12:04:54', '2022-03-03 12:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(1, 'Toilet Paper'),
(2, 'Hand Towel'),
(3, 'Hand Soap');

-- --------------------------------------------------------

--
-- Table structure for table `dispatch`
--

DROP TABLE IF EXISTS `dispatch`;
CREATE TABLE IF NOT EXISTS `dispatch` (
  `dispatch_id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(16) NOT NULL,
  `site` int(11) DEFAULT NULL,
  `stock_id` int(32) NOT NULL,
  `quantity` decimal(32,2) NOT NULL,
  `unit` int(11) NOT NULL,
  `description` text NOT NULL,
  `dispatched_user` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`dispatch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dispatch`
--

INSERT INTO `dispatch` (`dispatch_id`, `created_by`, `site`, `stock_id`, `quantity`, `unit`, `description`, `dispatched_user`, `created_at`) VALUES
(1, 2, 2, 18, '2.00', 0, 'dsds', '', '2020-10-28 16:45:11'),
(2, 1, 3, 18, '3.00', 0, 'asasasa', '', '2020-10-28 21:55:08'),
(3, 1, 3, 19, '40.00', 0, 'sdsdsd', '', '2020-10-28 22:08:13'),
(4, 1, 2, 18, '12.00', 0, 'dfdfd', '', '2020-10-28 23:08:24'),
(5, 1, 1, 19, '20.00', 0, 'Test', '', '2020-11-26 01:08:20'),
(6, 1, 1, 19, '2.00', 0, 'hhu', '', '2020-11-26 01:44:50'),
(7, 1, 3, 18, '2.00', 0, 'ABCD', '', '2020-11-26 01:52:18'),
(8, 1, 4, 22, '10.00', 0, 'Test', '', '2020-11-25 15:48:19'),
(9, 2, 4, 20, '5.00', 0, 'Test User', 'David', '2020-12-02 16:49:17'),
(10, 2, 4, 18, '6.00', 2, 'Test Unit Box', 'Sanga', '2020-12-02 17:17:11'),
(11, 2, 4, 21, '1.00', 2, 'Test Bottle', 'David', '2020-12-02 17:25:49'),
(12, 2, 4, 27, '1.00', 2, 'Can', 'David', '2020-12-02 17:47:45'),
(13, 2, 4, 18, '1.00', 2, 'umbo', 'David', '2020-12-02 17:50:57'),
(14, 2, 4, 20, '1.00', 3, 'asas', 'asas', '2020-12-02 18:16:22'),
(15, 2, 4, 28, '1.00', 4, 'Can efe', 'Sanga', '2020-12-02 18:19:48');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
CREATE TABLE IF NOT EXISTS `request` (
  `request_id` int(32) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `company` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `note` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`request_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `name`, `company`, `email`, `phone`, `note`, `created_at`) VALUES
(4, 'Haritha', '', 'haritha@gmail.com', '0405405555', 'Test request', '2020-11-10 12:41:26'),
(5, 'David', 'Mazda', 'david@gmail.com', '0401234567', 'Checking Details', '2020-11-25 23:19:30'),
(6, 'Jack', 'BCD', 'bcd@gmail.com', '0405400000', 'Testgsgsg', '2020-11-26 02:53:23');

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

DROP TABLE IF EXISTS `sites`;
CREATE TABLE IF NOT EXISTS `sites` (
  `siteId` int(11) NOT NULL AUTO_INCREMENT,
  `siteName` varchar(256) NOT NULL,
  `siteEmail` varchar(256) NOT NULL,
  `phone` int(32) NOT NULL,
  `addressStreet` varchar(256) NOT NULL,
  `suburb` varchar(256) NOT NULL,
  `postCode` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`siteId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`siteId`, `siteName`, `siteEmail`, `phone`, `addressStreet`, `suburb`, `postCode`, `date`) VALUES
(2, 'Austin', 'austin@gmail.com', 400401234, 'Bell', 'Heidelberg', 3081, '2020-11-25 13:54:34'),
(3, 'ABCD', 'abcd@gmail.com', 1234561234, 'Bells', 'Heidelberg', 3030, '2020-11-25 13:56:13'),
(4, 'ONJC', 'ONJC@gmail.com', 405404040, 'bell', 'Mel', 2222, '2020-11-25 22:33:35'),
(5, 'Warringal', 'warringal@gmail.com', 392741300, '216 Burgundy St', 'Heidelberg', 3084, '2020-11-26 01:25:04'),
(6, 'Parc', 'parc@gmail.com', 505554444, 'Bell', 'Heidelberg', 3084, '2020-11-26 02:55:15'),
(7, 'WareHouse', 'ware@gmail.com', 101010101, 'bell', 'Howard', 3333, '2020-11-30 21:24:13'),
(8, 'Lahiru', 'lahiru@gmail.com', 405405066, 'Orr', 'Orr', 2222, '2020-11-30 21:30:31'),
(9, 'lla', 'lan@gmail.com', 405405066, 'acd', 'acsd', 1111, '2020-11-30 21:31:06'),
(10, 'qwe', 'qwe@gmail.com', 405405066, 'qwe', 'qwe', 1111, '2020-11-30 21:32:13'),
(11, 'dfg', 'sdsf@gmail.com', 405540044, 'dfdf', 'ererer', 2222, '2020-11-30 21:38:47'),
(12, 'SRI', 'sri@gmail.com', 405405066, 'LSSS', 'RUWAN', 1211, '2020-11-30 21:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `stock_id` int(32) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `category_id` int(32) NOT NULL,
  `code` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `quantity` decimal(15,2) NOT NULL,
  `unit` int(32) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `status` int(32) NOT NULL,
  `created_by` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`stock_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `title`, `category_id`, `code`, `description`, `quantity`, `unit`, `price`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(19, 'H/Towel Comp 19.5X29.5 24X90 (KLEENEX)', 1, '4440D', 'H/Towel Comp 19.5X29.5 24X90 (KLEENEX)', '78.00', 0, '230.00', 1, '1', '2020-10-25 08:00:47', '2020-10-25 08:00:47'),
(18, 'Toilet Roll 2Ply 400Sht (KLEENEX)', 1, '4735', 'Toilet Roll 2Ply 400Sht (KLEENEX)', '1.00', 0, '450.00', 1, '1', '2020-10-25 07:52:57', '2020-10-25 07:52:57'),
(20, 'Softcare Blue Hand Soap 5Lt J/DIV', 1, '5827209', 'Softcare Blue Hand Soap 5Lt J/DIV     ', '94.00', 0, '22.00', 1, '2', '2020-11-25 10:09:22', '2020-11-25 22:09:22'),
(21, 'BLKY 6334 Hygienic Wash 1000ml/Ctn', 3, '6334120', 'BLKY 6334 Hygienic Wash 1000ml/Ctn', '49.00', 0, '45.00', 1, '1', '2020-11-26 01:03:11', '2020-11-26 01:03:11'),
(22, '/Tissue 20.5X19.5cm 48X100/Ctn (KLEENEX)', 3, '4720', '/Tissue 20.5X19.5cm 48X100/Ctn (KLEENEX)     ', '111.00', 0, '123.00', 1, '1', '2020-11-26 02:38:56', '2020-11-26 02:38:56'),
(25, 'Surage Plus Hand Soap DAB', 3, '5000', 'Surage Plus Hand Soap DAB', '1.00', 2, '150.00', 1, '2', '2020-12-03 04:41:25', '2020-12-03 04:41:25'),
(26, 'Surage Plus Hand Soap DAB -', 3, '5000', 'Surage Plus Hand Soap DAB --', '2.00', 2, '100.00', 1, '2', '2020-12-03 04:43:58', '2020-12-03 04:43:58'),
(27, 'Soap Can', 3, '2020202', 'Soap Can', '27.00', 2, '12.00', 1, '2', '2020-12-03 04:46:11', '2020-12-03 04:46:11'),
(28, 'Drink Coke', 3, '1989', 'Drink Coke', '1.00', 5, '20.00', 1, '2', '2020-12-03 05:19:04', '2020-12-03 05:19:04');

-- --------------------------------------------------------

--
-- Table structure for table `stock_intermediate`
--

DROP TABLE IF EXISTS `stock_intermediate`;
CREATE TABLE IF NOT EXISTS `stock_intermediate` (
  `stock_intermediate_id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_id` varchar(256) NOT NULL,
  `quantity` int(32) NOT NULL,
  `unit` int(32) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `user_id` varchar(256) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 for add, 1 for update',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`stock_intermediate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock_intermediate`
--

INSERT INTO `stock_intermediate` (`stock_intermediate_id`, `stock_id`, `quantity`, `unit`, `price`, `user_id`, `type`, `date_added`) VALUES
(3, '18', 23, 0, '450.00', '1', 0, '2020-10-25 07:52:57'),
(4, '18', 4, 0, '450.00', '1', 1, '2020-10-25 07:59:00'),
(5, '19', 33, 0, '230.00', '1', 0, '2020-10-25 08:00:47'),
(6, '19', 3, 0, '34.00', '1', 1, '2020-10-25 08:01:05'),
(7, '19', 44, 0, '45.00', '1', 1, '2020-10-25 08:08:52'),
(8, '19', 2, 0, '2.00', '1', 1, '2020-10-25 08:10:08'),
(9, '19', 33, 0, '33.00', '1', 1, '2020-10-27 12:30:47'),
(10, '20', 100, 0, '22.00', '2', 0, '2020-11-25 22:09:22'),
(11, '19', 30, 0, '230.00', '2', 1, '2020-11-25 22:36:00'),
(12, '21', 50, 0, '45.00', '1', 0, '2020-11-26 01:03:11'),
(13, '22', 78, 0, '123.00', '1', 0, '2020-11-26 02:38:56'),
(14, '22', 20, 0, '123.00', '1', 1, '2020-11-26 02:40:04'),
(15, '23', 12, 0, '11.00', '1', 0, '2020-12-01 01:15:48'),
(16, '24', 11, 0, '0.00', '1', 0, '2020-12-01 01:24:06'),
(17, '22', 21, 0, '122.00', '1', 1, '2020-12-01 04:08:36'),
(18, '22', 2, 0, '123.00', '2', 1, '2020-12-01 04:13:24'),
(19, '25', 1, 2, '150.00', '2', 0, '2020-12-03 04:41:25'),
(20, '26', 2, 2, '100.00', '2', 0, '2020-12-03 04:43:58'),
(21, '27', 1, 2, '12.00', '2', 0, '2020-12-03 04:46:11'),
(22, '28', 2, 5, '20.00', '2', 0, '2020-12-03 05:19:04'),
(23, '27', 22, 0, '12.00', '2', 1, '2020-12-03 05:21:03'),
(24, '27', 5, 0, '11.00', '2', 1, '2020-12-03 05:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `role` int(4) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `status` int(1) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `phone`, `role`, `email`, `password`, `status`, `brand_id`, `date_added`, `date_modified`) VALUES
(1, 'Sampath ', 'Gamage', '0421157048', 1, 'nadishka99@gmail.com', '3c53c76b347e0edfd52721db36c937ec', 1, 1, '2022-02-27 21:56:51', '2022-02-27 10:56:51'),
(2, 'Wickramarathne', 'Vidana ', '65445454', 1, 'nadishkakk99@gmail.com', '3c53c76b347e0edfd52721db36c937ec', 1, 1, '2022-02-27 21:59:13', '2022-02-27 10:59:13'),
(3, 'Nadishka ', 'Vidana Gamage', '55888999', 2, 'nadishka9@gmail.com', '213da506cd735430483095b5f995770e', 1, 1, '2022-02-27 22:00:22', '2022-02-27 11:00:22');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
