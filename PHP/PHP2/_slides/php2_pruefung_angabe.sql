-- phpMyAdmin SQL Dump

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Datenbank: `php2_pruefung`
--
CREATE DATABASE IF NOT EXISTS `php2_pruefung` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `php2_pruefung`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fluege`
--

DROP TABLE IF EXISTS `fluege`;
CREATE TABLE IF NOT EXISTS `fluege` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `flugnr` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abflug` datetime DEFAULT NULL,
  `ankunft` datetime DEFAULT NULL,
  `start_flgh` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ziel_flgh` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `flugnr` (`flugnr`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `fluege`
--

INSERT INTO `fluege` (`id`, `flugnr`, `abflug`, `ankunft`, `start_flgh`, `ziel_flgh`) VALUES
(1, 'OS 920', '2021-03-20 08:10:00', '2021-03-20 09:00:00', 'Salzburg SZG', 'Wien VIE'),
(2, 'EW 8141', '2021-03-20 08:15:00', '2021-03-20 09:05:00', 'Salzburg SZG', 'Berlin TXL'),
(3, 'EW 9393', '2021-03-20 08:40:00', '2021-03-20 09:35:00', 'Salzburg SZG', 'Düsseldorf DUS'),
(4, 'EW 8140', '2021-03-20 07:35:00', '2021-03-20 08:25:00', 'Berlin TXL', 'Salzburg SZG'),
(5, 'EW 9392', '2021-03-20 08:05:00', '2021-03-20 08:55:00', 'Düsseldorf DUS', 'Salzburg SZG'),
(6, 'TOM2670F', '2021-03-20 09:10:00', '2021-03-20 10:35:00', 'Manchester MAN', 'Salzburg SZG'),
(7, 'TF 9012', '2021-03-20 10:15:00', '2021-03-20 12:00:00', 'Göteborg GOT', 'Salzburg SZG'),
(8, 'LS 1655', '2021-03-20 11:00:00', '2021-03-20 12:25:00', 'London STN', 'Salzburg SZG'),
(9, 'HV 5407', '2021-03-20 13:30:00', '2021-03-20 14:25:00', 'Rotterdam RTM', 'Salzburg SZG'),
(10, 'S7 791', '2021-03-20 15:05:00', '2021-03-20 17:30:00', 'Moskau DME', 'Salzburg SZG'),
(11, 'OS 263', '2021-03-20 10:45:00', '2021-03-20 11:30:00', 'Salzburg SZG', 'Frankfurt FRA'),
(12, 'DY 4474', '2021-03-20 11:40:00', '2021-03-20 13:00:00', 'Salzburg SZG', 'Stockholm ARN'),
(13, 'SK 2620', '2021-03-20 12:55:00', '2021-03-20 14:25:00', 'Salzburg SZG', 'Kopenhagen CPH'),
(14, 'EZY2116', '2021-03-20 15:55:00', '2021-03-20 18:40:00', 'Salzburg SZG', 'Luton LTN');
COMMIT;
