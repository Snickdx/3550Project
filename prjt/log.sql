-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2013 at 10:01 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `start` varchar(255) NOT NULL,
  `end` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `username`, `start`, `end`) VALUES
(5, 'me', '6/12/2013-9:54:22', '6/12/2013-9:54:24'),
(6, '868', '6/12/2013-9:54:42', '6/12/2013-9:54:43'),
(7, '101', '6/12/2013-9:58:20', '6/12/2013-9:58:22'),
(8, 'me2', '6/12/2013-9:59:27', '6/12/2013-10:6:21'),
(9, 'me2', '6/12/2013-21:45:39', '6/12/2013-21:45:46'),
(10, 'me', '6/12/2013-21:45:53', '6/12/2013-21:46:1'),
(11, '101', '6/12/2013-21:46:5', '6/12/2013-21:47:3'),
(12, 'me', '6/12/2013-21:53:38', '6/12/2013-21:58:32'),
(13, 'me', '6/12/2013-21:58:39', '6/12/2013-22:0:20');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
