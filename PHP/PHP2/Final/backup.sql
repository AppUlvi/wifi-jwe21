-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 20, 2021 at 01:11 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `php2_pruefung`
--

-- --------------------------------------------------------

--
-- Table structure for table `fluege`
--

CREATE TABLE `fluege` (
  `id` int(10) UNSIGNED NOT NULL,
  `flugnr` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abflug` datetime DEFAULT NULL,
  `ankunft` datetime DEFAULT NULL,
  `start_flgh` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ziel_flgh` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fluege`
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

-- --------------------------------------------------------

--
-- Table structure for table `fluege_passagiere`
--

CREATE TABLE `fluege_passagiere` (
  `id` int(10) UNSIGNED NOT NULL,
  `fluege_id` int(10) UNSIGNED DEFAULT NULL,
  `passagiere_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `passagiere`
--

CREATE TABLE `passagiere` (
  `passagier_id` int(10) UNSIGNED NOT NULL,
  `fluege_id` int(10) UNSIGNED NOT NULL,
  `vorname` varchar(190) CHARACTER SET utf8mb4 NOT NULL,
  `nachname` varchar(190) CHARACTER SET utf8mb4 NOT NULL,
  `geburtsdatum` date NOT NULL,
  `flugangst` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `passagiere`
--

INSERT INTO `passagiere` (`passagier_id`, `fluege_id`, `vorname`, `nachname`, `geburtsdatum`, `flugangst`) VALUES
(1, 2, 'Alpha', 'Klamm', '1999-02-03', 0),
(2, 13, 'Gamma', 'Changed', '1988-03-01', 0),
(3, 9, 'Test', 'Licht', '1999-12-01', 0),
(4, 11, 'Beta', 'Beta', '1988-02-02', 1),
(5, 14, 'Zwiebel', 'Changed', '1988-05-01', 0),
(6, 11, 'Hat', 'Angst', '2010-01-01', 1),
(8, 14, 'Last ', 'Test', '1997-01-01', 0),
(9, 14, 'Kopf', 'Schmerzen', '1977-04-04', 1),
(10, 13, 'SK', 'Test', '1988-04-04', 0),
(11, 9, 'HV', 'Test', '1999-04-04', 1),
(12, 10, 'Final', 'Final', '1995-05-05', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fluege`
--
ALTER TABLE `fluege`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flugnr` (`flugnr`);

--
-- Indexes for table `fluege_passagiere`
--
ALTER TABLE `fluege_passagiere`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fluege_id` (`fluege_id`),
  ADD KEY `passagiere_id` (`passagiere_id`);

--
-- Indexes for table `passagiere`
--
ALTER TABLE `passagiere`
  ADD PRIMARY KEY (`passagier_id`),
  ADD KEY `fluege_id` (`fluege_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fluege`
--
ALTER TABLE `fluege`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `fluege_passagiere`
--
ALTER TABLE `fluege_passagiere`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `passagiere`
--
ALTER TABLE `passagiere`
  MODIFY `passagier_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fluege_passagiere`
--
ALTER TABLE `fluege_passagiere`
  ADD CONSTRAINT `fluege_passagiere_ibfk_1` FOREIGN KEY (`fluege_id`) REFERENCES `fluege` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fluege_passagiere_ibfk_2` FOREIGN KEY (`passagiere_id`) REFERENCES `passagiere` (`passagier_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `passagiere`
--
ALTER TABLE `passagiere`
  ADD CONSTRAINT `passagiere_ibfk_1` FOREIGN KEY (`fluege_id`) REFERENCES `fluege` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
