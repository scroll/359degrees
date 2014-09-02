-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 28, 2014 at 03:34 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db359`
--
CREATE DATABASE IF NOT EXISTS `db359` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db359`;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` int(11) NOT NULL,
  `txt` text COLLATE cp1251_bin NOT NULL,
  `width` int(5) NOT NULL,
  `postbind` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 COLLATE=cp1251_bin AUTO_INCREMENT=161 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `cat`, `txt`, `width`, `postbind`) VALUES
(125, 2, '<iframe src=''//player.vimeo.com/video/35160025'' width=''500'' height=''281'' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>', 540, 0),
(126, 2, '<iframe width=''1280'' height=''720'' src=''//www.youtube.com/embed/aKibLPORq2s'' frameborder=''0'' allowfullscreen></iframe>', 1320, 0),
(150, 3, '0', 0, 60),
(154, 2, '', 0, 0),
(155, 2, '', 0, 0),
(156, 2, '', 0, 0),
(157, 2, '', 0, 0),
(160, 2, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `txt` text COLLATE cp1251_bin NOT NULL,
  `cat` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 COLLATE=cp1251_bin AUTO_INCREMENT=73 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `txt`, `cat`) VALUES
(60, '<p style="text-align: left;">&nbsp;</p>\r\n<p style="text-align: left;"><em>This web site is hosted for free on Rasberry Pi.&nbsp; <br /></em></p>\r\n<p style="text-align: left;"><em>Powered by 5V 0.5A GSM charger.</em></p>\r\n<p style="text-align: left;"><em>The OS is Linux</em></p>\r\n<p style="text-align: left;">&nbsp;<img src="/359/upload/img/150.jpg" alt="" width="113" height="272" /></p>', 3),
(65, '<iframe src=''//player.vimeo.com/video/35160025?autoplay=0&loop=1'' width=''1170'' height=''669'' frameborder=''0'' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>', 1),
(72, '<h1>Shubidubi dubi</h1>', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE cp1251_bin NOT NULL,
  `password` varchar(255) COLLATE cp1251_bin NOT NULL,
  `auth` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 COLLATE=cp1251_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `auth`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
