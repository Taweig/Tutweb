SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `koffers` (
  `id`            INT(11) NOT NULL AUTO_INCREMENT,
  `username`      VARCHAR(255) NOT NULL,
  `password`      VARCHAR(255) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `videos` (
  `ID`            INT(11) NOT NULL AUTO_INCREMENT,
  `title`         VARCHAR(255) NOT NULL,
  `description`   TEXT NOT NULL,
  `object`        VARCHAR(255) NOT NULL,
  `videosource`   VARCHAR(255) NOT NULL,
  `audiosource`   VARCHAR(255) NOT NULL,
  `images`        VARCHAR(255) NOT NULL,
  `name`          VARCHAR(255) NOT NULL,
  `dob`           DATE,
  `location`      VARCHAR(255) NOT NULL,
  `cast`          VARCHAR(255) NOT NULL,
  `year`          SMALLINT(4) DEFAULT 0,
  `category1`     TINYINT(2) DEFAULT 0,
  `category2`     TINYINT(2) DEFAULT 0,
  `category3`     TINYINT(2) DEFAULT 0,
  `rating`        FLOAT(10) DEFAULT 0,
  `tags`          VARCHAR(255) NOT NULL,
  `featured`      TINYINT(1) DEFAULT 0,
  `savedate`      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;
