SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;

USE `gestionconges`;

DROP TABLE IF EXISTS `conges`;
CREATE TABLE `conges` (
  `datedebut` date NOT NULL,
  `datefin` date NOT NULL,
  `nbjours` decimal(10,2) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
