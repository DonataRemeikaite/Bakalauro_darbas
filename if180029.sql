-- Adminer 4.8.1 MySQL 5.5.5-10.5.15-MariaDB-0+deb11u1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `nuotraukos`;
CREATE TABLE `nuotraukos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `viesbucio_id` int(11) NOT NULL,
  `nuotraukos_url` varchar(1500) COLLATE utf8_lithuanian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;


DROP TABLE IF EXISTS `paslaugos`;
CREATE TABLE `paslaugos` (
  `paslaugosid` int(11) NOT NULL AUTO_INCREMENT,
  `pavadinimas` varchar(32) COLLATE utf8_lithuanian_ci NOT NULL,
  `kaina` double NOT NULL,
  PRIMARY KEY (`paslaugosid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;


DROP TABLE IF EXISTS `skrydziai`;
CREATE TABLE `skrydziai` (
  `skrydzioid` int(11) NOT NULL AUTO_INCREMENT,
  `kryptis_is` varchar(32) COLLATE utf8_lithuanian_ci NOT NULL,
  `kryptis_i` varchar(32) COLLATE utf8_lithuanian_ci NOT NULL,
  `kompanija` varchar(32) COLLATE utf8_lithuanian_ci NOT NULL,
  `isvykimo_data` datetime NOT NULL,
  `grizimo_data` datetime NOT NULL,
  `isvykimo_kaina` double NOT NULL,
  `grizimo_kaina` double NOT NULL,
  `galutine_kaina` double NOT NULL,
  `nuotrauka_url` varchar(1500) COLLATE utf8_lithuanian_ci DEFAULT NULL,
  PRIMARY KEY (`skrydzioid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

INSERT INTO `skrydziai` (`skrydzioid`, `kryptis_is`, `kryptis_i`, `kompanija`, `isvykimo_data`, `grizimo_data`, `isvykimo_kaina`, `grizimo_kaina`, `galutine_kaina`, `nuotrauka_url`) VALUES
(1,	'Vilnius',	'Turkija',	'GetJet',	'2022-06-14 05:40:00',	'2022-06-21 09:35:00',	65,	92,	157,	'turkija.jpg'),
(2,	'Kaunas',	'Egiptas',	'Avion Express',	'2022-06-09 08:10:00',	'2022-06-16 15:40:00',	89,	95,	184,	'egiptas.jpg'),
(3,	'Vilnius',	'Turkija',	'GetJet',	'2022-07-05 05:40:00',	'2022-07-12 09:35:00',	59.99,	89.99,	149.98,	'turkija.jpg'),
(4,	'Kaunas',	'Egiptas',	'Avion Express',	'2022-06-02 08:10:00',	'2022-06-09 15:40:00',	153.49,	113.99,	267.48,	'egiptas.jpg'),
(5,	'Vilnius',	'Graikija',	'Airline',	'2022-06-04 04:15:00',	'2022-06-11 12:25:00',	55,	65,	120,	'graikija.jpg'),
(6,	'Vilnius',	'Turkija',	'GetJet',	'2022-06-21 05:40:00',	'2022-06-28 09:35:00',	35,	74.99,	109.99,	'turkija.jpg'),
(7,	'Kaunas',	'Egiptas',	'Avion Express',	'2022-06-16 08:10:00',	'2022-06-23 15:40:00',	41.35,	53,	94.35,	'egiptas.jpg'),
(8,	'Kaunas',	'Egiptas',	'Avion Express',	'2022-06-23 08:10:00',	'2022-06-30 15:40:00',	45,	52.99,	97.99,	'egiptas.jpg'),
(9,	'Vilnius',	'Turkija',	'GetJet',	'2022-06-28 05:40:00',	'2022-07-05 09:35:00',	67,	88,	155,	'turkija.jpg');

DROP TABLE IF EXISTS `uzsakymai`;
CREATE TABLE `uzsakymai` (
  `uzsakymoid` int(11) NOT NULL AUTO_INCREMENT,
  `skrydzioid` int(11) NOT NULL,
  `viesbucioid` int(11) NOT NULL,
  `vartid` int(11) NOT NULL,
  `paslaugos` longtext COLLATE utf8_lithuanian_ci DEFAULT NULL,
  PRIMARY KEY (`uzsakymoid`),
  KEY `skrydzioid` (`skrydzioid`),
  KEY `viesbucioid` (`viesbucioid`),
  KEY `vartid` (`vartid`),
  CONSTRAINT `uzsakymai_ibfk_1` FOREIGN KEY (`skrydzioid`) REFERENCES `skrydziai` (`skrydzioid`),
  CONSTRAINT `uzsakymai_ibfk_2` FOREIGN KEY (`viesbucioid`) REFERENCES `viesbuciai` (`viesbucioid`),
  CONSTRAINT `uzsakymai_ibfk_4` FOREIGN KEY (`vartid`) REFERENCES `vartotojai` (`vartid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;


DROP TABLE IF EXISTS `vartotojai`;
CREATE TABLE `vartotojai` (
  `vartid` int(11) NOT NULL AUTO_INCREMENT,
  `vardas` varchar(32) COLLATE utf8_lithuanian_ci NOT NULL,
  `pavarde` varchar(32) COLLATE utf8_lithuanian_ci NOT NULL,
  `gimimo_data` date NOT NULL,
  `el_pastas` varchar(64) COLLATE utf8_lithuanian_ci NOT NULL,
  `pr_vardas` varchar(32) COLLATE utf8_lithuanian_ci NOT NULL,
  `slaptazodis` varchar(64) COLLATE utf8_lithuanian_ci NOT NULL,
  `tipas` varchar(64) COLLATE utf8_lithuanian_ci DEFAULT NULL,
  PRIMARY KEY (`vartid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;


DROP TABLE IF EXISTS `viesbuciai`;
CREATE TABLE `viesbuciai` (
  `viesbucioid` int(11) NOT NULL AUTO_INCREMENT,
  `pavadinimas` varchar(128) COLLATE utf8_lithuanian_ci NOT NULL,
  `kryptis_i` varchar(32) COLLATE utf8_lithuanian_ci NOT NULL,
  `atvykimo_data` datetime NOT NULL,
  `isvykimo_data` datetime NOT NULL,
  `zvaigzdutes` int(11) NOT NULL,
  `maitinimas` varchar(32) COLLATE utf8_lithuanian_ci NOT NULL,
  `vieta` varchar(32) COLLATE utf8_lithuanian_ci NOT NULL,
  `tema` varchar(32) COLLATE utf8_lithuanian_ci NOT NULL,
  `kaina` double NOT NULL,
  `aprasymas` mediumtext COLLATE utf8_lithuanian_ci NOT NULL,
  PRIMARY KEY (`viesbucioid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;


-- 2022-06-02 17:25:49
