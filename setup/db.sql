SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `koffers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `videos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Videosource` varchar(255) NOT NULL,
  `AudioSource` text NOT NULL,
  `Thumbnailsource` varchar(255) NOT NULL,
  `Tags` varchar(255) NOT NULL,
  `Setting` varchar(255) NOT NULL,
  `Characters` varchar(255) NOT NULL,
  `Year` int(11) NOT NULL,
  `Interesting` int(11) NOT NULL,
  `Happiness` int(11) NOT NULL,
  `Amusing` int(11) NOT NULL,
  `Rating` tinyint(4) NOT NULL,
  `Title` text NOT NULL,
  `Description` text NOT NULL,
  `Featured` tinyint(1) DEFAULT NULL,
  UNIQUE KEY `ID` (`ID`,`Videosource`,`Thumbnailsource`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;
