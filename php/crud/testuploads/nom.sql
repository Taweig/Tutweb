-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 03, 2013 at 03:10 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nom`
--
CREATE DATABASE IF NOT EXISTS `nom` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `nom`;

-- --------------------------------------------------------

--
-- Table structure for table `koffers`
--

CREATE TABLE IF NOT EXISTS `koffers` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(65) NOT NULL,
  `password` varchar(65) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `koffers`
--

INSERT INTO `koffers` (`id`, `username`, `password`) VALUES
(1, '001', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Videosource` varchar(255) NOT NULL,
  `Audiosource` varchar(255) NOT NULL,
  `Thumbnailsource` varchar(255) NOT NULL,
  `Tags` varchar(255) NOT NULL,
  `Setting` varchar(255) NOT NULL,
  `Characters` varchar(255) NOT NULL,
  `Year` int(11) NOT NULL,
  `Emotion` int(11) NOT NULL,
  `Happiness` int(11) NOT NULL,
  `Amusing` int(11) NOT NULL,
  `Rating` tinyint(4) NOT NULL,
  UNIQUE KEY `ID` (`ID`,`Videosource`,`Thumbnailsource`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`ID`, `Date`, `Videosource`, `Audiosource`, `Thumbnailsource`, `Tags`, `Setting`, `Characters`, `Year`, `Emotion`, `Happiness`, `Amusing`, `Rating`) VALUES
(1, '0000-00-00', 'sdthsethn', 'test1', '', 'test1', 'test', 'test', 2012, 3, 3, 3, 1),
(3, '2013-12-02', 'test', 'test', 'gitcheatsheet.png', 'test', 'test', 'test', 2013, 1, 2, 3, 1),
(4, '2013-12-02', 'test', 'test', 'lolz', 'test', 'test', 'test', 1991, 1, 2, 3, 4),
(5, '2013-12-02', 'test', 'test', 'ola', 'test', 'test', 'test', 1992, 6, 5, 4, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
