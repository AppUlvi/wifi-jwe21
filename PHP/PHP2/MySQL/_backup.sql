-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 12, 2021 at 03:34 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `php2`
--

-- --------------------------------------------------------

--
-- Table structure for table `benutzer`
--

CREATE TABLE `benutzer` (
  `id` int(10) UNSIGNED NOT NULL,
  `benutzername` varchar(190) NOT NULL,
  `email` varchar(190) NOT NULL,
  `passwort` varchar(190) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `benutzer`
--

INSERT INTO `benutzer` (`id`, `benutzername`, `email`, `passwort`) VALUES
(1, 'Alpha', 'alpha@alp.ha', 'alpha'),
(2, 'Beta', 'lambda@be.ta', 'beta'),
(4, 'Sigma', 'sigma@sig.ma', 'sigma'),
(5, 'Lambda', 'lambda@lamb.da', 'lambda'),
(6, 'Kappa', 'kappa@kap.pa', 'kappa');

-- --------------------------------------------------------

--
-- Table structure for table `rezepte`
--

CREATE TABLE `rezepte` (
  `id` int(10) UNSIGNED NOT NULL,
  `benutzer_id` int(10) UNSIGNED DEFAULT NULL,
  `titel` varchar(190) NOT NULL,
  `beschreibung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rezepte`
--

INSERT INTO `rezepte` (`id`, `benutzer_id`, `titel`, `beschreibung`) VALUES
(1, 2, 'Kaiserschmarrn', 'Testbeschreibung');

-- --------------------------------------------------------

--
-- Table structure for table `rezepte_zutaten`
--

CREATE TABLE `rezepte_zutaten` (
  `id` int(10) UNSIGNED NOT NULL,
  `rezepte_id` int(10) UNSIGNED DEFAULT NULL,
  `zutaten_id` int(10) UNSIGNED DEFAULT NULL,
  `einheit` varchar(190) NOT NULL,
  `menge` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rezepte_zutaten`
--

INSERT INTO `rezepte_zutaten` (`id`, `rezepte_id`, `zutaten_id`, `einheit`, `menge`) VALUES
(1, 1, 3, 'Gramm', '500.00'),
(2, 1, 2, 'Stück', '3.00');

-- --------------------------------------------------------

--
-- Table structure for table `zutaten`
--

CREATE TABLE `zutaten` (
  `id` int(10) UNSIGNED NOT NULL,
  `titel` varchar(190) NOT NULL,
  `kcal_pro_100` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zutaten`
--

INSERT INTO `zutaten` (`id`, `titel`, `kcal_pro_100`) VALUES
(1, 'Milch', NULL),
(2, 'Eier', NULL),
(3, 'Mehl', NULL),
(4, 'Zucker', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `benutzer`
--
ALTER TABLE `benutzer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `benutzername` (`benutzername`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `rezepte`
--
ALTER TABLE `rezepte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `titel` (`titel`),
  ADD KEY `benutzer_id` (`benutzer_id`);

--
-- Indexes for table `rezepte_zutaten`
--
ALTER TABLE `rezepte_zutaten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rezepte_id` (`rezepte_id`),
  ADD KEY `rezepte_zutaten_ibfk_2` (`zutaten_id`);

--
-- Indexes for table `zutaten`
--
ALTER TABLE `zutaten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `titel` (`titel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `benutzer`
--
ALTER TABLE `benutzer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rezepte`
--
ALTER TABLE `rezepte`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rezepte_zutaten`
--
ALTER TABLE `rezepte_zutaten`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zutaten`
--
ALTER TABLE `zutaten`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rezepte`
--
ALTER TABLE `rezepte`
  ADD CONSTRAINT `rezepte_ibfk_1` FOREIGN KEY (`benutzer_id`) REFERENCES `benutzer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rezepte_zutaten`
--
ALTER TABLE `rezepte_zutaten`
  ADD CONSTRAINT `rezepte_zutaten_ibfk_1` FOREIGN KEY (`rezepte_id`) REFERENCES `rezepte` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rezepte_zutaten_ibfk_2` FOREIGN KEY (`zutaten_id`) REFERENCES `zutaten` (`id`) ON UPDATE CASCADE;
