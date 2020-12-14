-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 13, 2020 at 12:25 PM
-- Server version: 5.7.28
-- PHP Version: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nic`
--

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
CREATE TABLE IF NOT EXISTS `district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`, `status`, `date_added`) VALUES
(1, 'Alipurduar', 1, '2020-12-10 05:53:31'),
(2, 'Bankura', 1, '2020-12-10 05:53:31'),
(3, 'Birbhum', 1, '2020-12-10 05:53:31'),
(4, 'Cooch Behar', 1, '2020-12-10 05:53:31'),
(5, 'Dakshin Dinajpur', 1, '2020-12-10 05:53:31'),
(6, 'Darjeeling', 1, '2020-12-10 05:53:31'),
(7, 'Hooghly', 1, '2020-12-10 05:53:31'),
(8, 'Howrah', 1, '2020-12-10 05:53:31'),
(9, 'Jalpaiguri', 1, '2020-12-10 05:55:55'),
(10, 'Jhargram', 1, '2020-12-10 05:55:55'),
(11, 'Kalimpong', 1, '2020-12-10 05:55:55'),
(12, 'Kolkata', 1, '2020-12-10 05:55:55'),
(13, 'Malda', 1, '2020-12-10 05:55:55'),
(14, 'Murshidabad', 1, '2020-12-10 05:55:55'),
(15, 'Nadia', 1, '2020-12-10 05:55:55'),
(16, 'North 24 Parganas', 1, '2020-12-10 05:55:55'),
(17, '24 Parganas', 0, '2020-12-10 05:55:55'),
(18, 'Medinipur ', 1, '2020-12-10 05:58:48'),
(19, 'Paschim Medinipur ', 1, '2020-12-10 05:58:48'),
(20, 'Paschim Burdwan ', 1, '2020-12-10 05:58:48'),
(21, 'Purba Burdwan ', 1, '2020-12-10 05:58:48'),
(22, 'Purba Medinipur ', 1, '2020-12-10 05:58:48'),
(23, 'Purulia', 1, '2020-12-10 05:58:48'),
(24, 'South 24 Parganas', 1, '2020-12-10 05:58:48'),
(25, 'Uttar Dinajpur ', 1, '2020-12-10 05:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registration_id` int(11) NOT NULL,
  `type` enum('profile_image','others') NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date_uploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nic_sessions`
--

DROP TABLE IF EXISTS `nic_sessions`;
CREATE TABLE IF NOT EXISTS `nic_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nic_sessions`
--

INSERT INTO `nic_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('9hevrsufp54slnn3ve605sgqulc3ruhk', '::1', 1607862280, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373836323238303b6361706368615f776f72647c693a32323937313b757365727c4f3a383a22737464436c617373223a323a7b733a323a226964223b733a313a2231223b733a393a22757365725f6e616d65223b733a353a2261646d696e223b7d),
('oshf64pnf55bqvef87ht4kbi5lakf9ki', '::1', 1607862280, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373836323238303b6361706368615f776f72647c693a34363834383b757365727c4f3a383a22737464436c617373223a323a7b733a323a226964223b733a313a2231223b733a393a22757365725f6e616d65223b733a353a2261646d696e223b7d),
('2ec48fa65rrrklio14ma4b7rl9p4bd43', '::1', 1607857881, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373835373838313b6361706368615f776f72647c693a36303538343b757365727c4f3a383a22737464436c617373223a323a7b733a323a226964223b733a313a2231223b733a393a22757365725f6e616d65223b733a353a2261646d696e223b7d),
('tmkcpancmvcaqpbgf4p6dlkjnqrr4t1n', '::1', 1607857552, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373835373535323b6361706368615f776f72647c693a38383037353b757365727c4f3a383a22737464436c617373223a323a7b733a323a226964223b733a313a2231223b733a393a22757365725f6e616d65223b733a353a2261646d696e223b7d737563636573737c733a32373a225265636f72642075706461746564205375636365737366756c6c79223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226e6577223b7d),
('lq776p5q0ost0s3r2jjulb3humnjenha', '::1', 1607856730, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373835363733303b6361706368615f776f72647c693a38383037353b757365727c4f3a383a22737464436c617373223a323a7b733a323a226964223b733a313a2231223b733a393a22757365725f6e616d65223b733a353a2261646d696e223b7d737563636573737c733a32373a225265636f72642075706461746564205375636365737366756c6c79223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226e6577223b7d),
('89ju0q3ttq98gtactsabsvf6oi1tqf7r', '::1', 1607856355, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373835363335353b6361706368615f776f72647c693a38383037353b757365727c4f3a383a22737464436c617373223a323a7b733a323a226964223b733a313a2231223b733a393a22757365725f6e616d65223b733a353a2261646d696e223b7d),
('c07dblrho1rbkuchr1tgk61e23f5ofto', '::1', 1607855923, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373835353932333b6361706368615f776f72647c693a38383037353b757365727c4f3a383a22737464436c617373223a323a7b733a323a226964223b733a313a2231223b733a393a22757365725f6e616d65223b733a353a2261646d696e223b7d),
('2h54hajs7e8cs0q4nfqbfjjahs84vtm8', '::1', 1607855616, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373835353631363b6361706368615f776f72647c693a38383037353b757365727c4f3a383a22737464436c617373223a323a7b733a323a226964223b733a313a2231223b733a393a22757365725f6e616d65223b733a353a2261646d696e223b7d),
('bdm9vm69jpe5hln9q9or22on25blt64p', '::1', 1607852598, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373835323539383b6361706368615f776f72647c693a38383037353b757365727c4f3a383a22737464436c617373223a323a7b733a323a226964223b733a313a2231223b733a393a22757365725f6e616d65223b733a353a2261646d696e223b7d),
('l7cugfppn2emhb7pbaiihqtplbar2t22', '::1', 1607852906, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373835323930363b6361706368615f776f72647c693a38383037353b757365727c4f3a383a22737464436c617373223a323a7b733a323a226964223b733a313a2231223b733a393a22757365725f6e616d65223b733a353a2261646d696e223b7d),
('rbb9tfkbiah74iekbm9s87t91o24abc4', '::1', 1607853214, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373835333231343b6361706368615f776f72647c693a38383037353b757365727c4f3a383a22737464436c617373223a323a7b733a323a226964223b733a313a2231223b733a393a22757365725f6e616d65223b733a353a2261646d696e223b7d),
('c5t0vvjd597t2bdrmmcnj6f52ilrhp36', '::1', 1607853584, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630373835333538343b6361706368615f776f72647c693a38383037353b757365727c4f3a383a22737464436c617373223a323a7b733a323a226964223b733a313a2231223b733a393a22757365725f6e616d65223b733a353a2261646d696e223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(16) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `guardians_name` varchar(255) NOT NULL,
  `gender` enum('m','f','o') NOT NULL,
  `dob` date NOT NULL,
  `age` varchar(255) NOT NULL,
  `district_id` int(11) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `registration_date` datetime NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `reg_dis_idx` (`district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `code`, `name`, `guardians_name`, `gender`, `dob`, `age`, `district_id`, `mobile_no`, `email`, `photo`, `status`, `registration_date`, `date_updated`) VALUES
(1, 'WB2020UHC0000001', 'Co Scholastic Areas', 'xcvxcv', 'm', '2006-07-12', '14', 2, '9007291400', 'bapay.9@gmail.com', 'asset/uploads/2020_12_11_09_10_545fd3379e05192.jpg', 0, '2020-12-11 09:10:54', '2020-12-11 09:10:54'),
(2, NULL, 'swarna sekhar dhar', 'kusankur dhar', 'f', '1982-09-12', '38', 14, '9007291400', 'bapay.9@gmail.com', 'asset/uploads/2020_12_11_09_14_545fd3388e9194b.jpg', 0, '2020-12-11 09:14:54', '2020-12-13 10:46:31'),
(3, 'WB2020MEZ0000003', 'Co Scholastic Areas', 'xcvxcv', 'm', '2006-07-12', '14', 9, '9007291400', 'bapay.9@gmail.com', 'asset/uploads/2020_12_11_09_15_155fd338a3a3400.jpg', 0, '2020-12-11 09:15:15', '2020-12-12 17:40:25'),
(4, 'WB2020KNA0000004', 'Co Scholastic Areas', 'xcvxcv', 'm', '2006-07-12', '14', 6, '9007291400', 'bapay.9@gmail.com', 'asset/uploads/2020_12_11_09_15_515fd338c7ed146.jpg', 0, '2020-12-11 09:15:51', '2020-12-12 17:40:25'),
(5, 'WB2020GFG0000005', 'Co Scholastic Areas', 'xcvxcv', 'm', '2006-07-12', '14', 9, '9007291400', 'bapay.9@gmail.com', 'asset/uploads/2020_12_11_09_15_575fd338cdb29e5.jpg', 0, '2020-12-11 09:15:57', '2020-12-12 17:40:25'),
(6, 'WB2020GQP0000006', 'Co Scholastic Areas', 'xcvxcv', 'f', '2006-07-12', '14', 2, '9007291400', 'bapay.9@gmail.com', 'asset/uploads/2020_12_11_09_18_145fd33956a01ac.jpg', 0, '2020-12-11 09:18:14', '2020-12-12 20:53:29'),
(7, 'WB2020FMY0000007', 'Co Scholastic Areas', 'xcvxcv', 'm', '2006-07-12', '14', 11, '9007291400', 'bapay.9@gmail.com', 'asset/uploads/2020_12_11_09_30_185fd33c2a35f25.jpg', 0, '2020-12-11 09:30:18', '2020-12-12 18:06:30'),
(8, 'WB2020RPE0000008', 'Co Scholastic Areas', 'xcvxcv', 'm', '2006-07-12', '14', 2, '9007291400', 'bapay.9@gmail.com', 'asset/uploads/2020_12_11_09_30_235fd33c2faeff9.jpg', 0, '2020-12-11 09:30:23', '2020-12-11 09:30:23'),
(9, 'WB2020JKU0000009', 'Co Scholastic Areas', 'xcvxcv', 'm', '2006-07-12', '14', 14, '9007291400', 'bapay.9@gmail.com', 'asset/uploads/2020_12_11_09_31_285fd33c70ef801.jpg', 0, '2020-12-11 09:31:28', '2020-12-12 17:39:53'),
(10, 'WB2020JWZ0000010', 'Co Scholastic Areas', 'xcvxcv', 'm', '2006-07-12', '14', 2, '9007291400', 'bapay.9@gmail.com', 'asset/uploads/2020_12_11_09_32_005fd33c90741ca.jpg', 0, '2020-12-11 09:32:00', '2020-12-11 09:32:00'),
(11, 'WB2020YLK0000011', 'Co Scholastic Areas', 'xcvxcv', 'm', '2006-07-12', '14', 18, '9007291400', 'bapay.9@gmail.com', 'asset/uploads/2020_12_11_09_32_355fd33cb3aa790.jpg', 0, '2020-12-11 09:32:35', '2020-12-12 17:41:23'),
(12, 'WB2020CSC0000012', 'Co Scholastic Areas', 'xcvxcv', 'm', '2006-07-12', '14', 2, '9007291400', 'bapay.9@gmail.com', 'asset/uploads/2020_12_11_09_33_505fd33cfebd6e9.jpg', 0, '2020-12-11 09:33:50', '2020-12-11 09:33:50'),
(13, 'WB2020NNQ0000013', 'Co Scholastic Areas', 'xcvxcv', 'f', '2006-07-12', '14', 14, '9007291400', 'bapay.9@gmail.com', 'asset/uploads/2020_12_11_09_34_425fd33d32b5768.jpg', 0, '2020-12-11 09:34:42', '2020-12-12 20:53:29'),
(14, 'WB2020UUR0000014', 'Co Scholastic Areas', 'xcvxcv', 'm', '2006-07-12', '14', 2, '9007291400', 'bapay.9@gmail.com', 'asset/uploads/2020_12_11_09_35_385fd33d6ad8027.jpg', 0, '2020-12-11 09:35:38', '2020-12-11 09:35:38'),
(15, 'WB2020VAK0000015', 'Co Scholastic Areas', 'xcvxcv', 'm', '2006-07-12', '14', 9, '9007291400', 'bapay.9@gmail.com', 'asset/uploads/2020_12_11_09_40_515fd33ea3b4a51.jpg', 0, '2020-12-11 09:40:51', '2020-12-12 17:40:25'),
(16, 'WB2020UMV0000016', 'Co Scholastic Areas', 'xcvxcv', 'f', '2006-07-12', '14', 2, '9007291400', 'bapay.9@gmail.com', 'asset/uploads/2020_12_11_09_41_485fd33edc9a952.jpg', 0, '2020-12-11 09:41:48', '2020-12-12 20:53:29'),
(17, 'WB2020GCP0000017', 'Co Scholastic Areas', 'xcvxcv', 'm', '2006-07-12', '14', 14, '9007291400', 'bapay.9@gmail.com', 'asset/uploads/2020_12_11_09_44_115fd33f6b2ce50.jpg', 0, '2020-12-11 09:44:11', '2020-12-12 17:39:53'),
(18, 'WB2020HSC0000018', 'Co Scholastic Areas', 'xcvxcv', 'f', '2006-07-12', '14', 18, '9007291400', 'bapay.9@gmail.com', 'asset/uploads/2020_12_11_09_44_365fd33f84c510e.jpg', 0, '2020-12-11 09:44:36', '2020-12-12 20:53:29'),
(19, 'WB2020DGG0000019', 'Co Scholastic Areas', 'xcvxcv', 'm', '2006-07-12', '14', 11, '9007291400', 'bapay.9@gmail.com', 'asset/uploads/2020_12_11_09_46_165fd33fe83dc36.jpg', 0, '2020-12-11 09:46:16', '2020-12-12 18:06:30'),
(20, 'WB2020SJL0000020', 'Co Scholastic Areas', 'xcvxcv', 'm', '2006-07-12', '14', 9, '9007291400', 'bapay.9@gmail.com', 'asset/uploads/2020_12_11_09_46_465fd340069dcc7.jpg', 0, '2020-12-11 09:46:46', '2020-12-12 17:40:25'),
(21, 'WB2020NDI0000021', 'Co Scholastic Areas', 'xcvxcv', 'm', '2006-07-12', '14', 11, '9007291400', 'bapay.9@gmail.com', 'asset/uploads/2020_12_11_09_50_525fd340fccaa9e.jpg', 0, '2020-12-11 09:50:52', '2020-12-12 18:06:30'),
(22, 'WB2020OOP0000022', 'Co Scholastic Areas', 'xcvxcv', 'f', '2006-07-12', '14', 14, '9007291400', 'bapay.9@gmail.com', 'asset/uploads/2020_12_11_10_00_445fd3434c84626.jpg', 0, '2020-12-11 10:00:44', '2020-12-12 20:53:29'),
(23, 'WB2020ZTI0000023', 'Co Scholastic Areas', 'xcvxcv', 'm', '2006-07-12', '14', 18, '9007291400', 'bapay.9@gmail.com', 'asset/uploads/2020_12_11_17_20_195fd3aa5309c91.jpg', 0, '2020-12-11 17:20:19', '2020-12-12 17:41:23'),
(24, 'WB2020NYF0000024', 'Mamata Rajbanshi dhar', 'SWARNA SEKhaR DHAR', 'm', '1970-01-01', '22', 14, '5554784521', 'msekhar.dhar@gmail.com', 'asset/uploads/2020_12_13_11_12_515fd5f7339639f.jpg', 0, '2020-12-13 11:12:51', '2020-12-13 11:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `date_updated`) VALUES
(1, 'admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-12-11 17:56:22');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `nic_district_id` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
