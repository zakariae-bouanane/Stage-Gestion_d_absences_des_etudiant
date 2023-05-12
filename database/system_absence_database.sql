-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 30, 2023 at 05:51 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `system_absence`
--

-- --------------------------------------------------------

--
-- Table structure for table `absence`
--

CREATE TABLE `absence` (
  `id_abs` int(11) NOT NULL,
  `stg_name_abs` varchar(255) NOT NULL,
  `when_abs` varchar(255) NOT NULL,
  `full_when_string` varchar(255) NOT NULL,
  `sumain_du` date NOT NULL,
  `year` year(4) NOT NULL,
  `id_grp` int(11) NOT NULL,
  `id_stg` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(20) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `isSuperAdmin` enum('1','0') DEFAULT '0',
  `DateCreation` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `full_name`, `email`, `pass`, `isSuperAdmin`, `DateCreation`) VALUES
(1, 'Oussama El Meriami', 'oussama@gmail.com', '2dd6fa1cb7e91b3485a434b1b5a5850c', '1', '2023-03-29 12:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `filière`
--

CREATE TABLE `filière` (
  `id_fill` int(11) NOT NULL,
  `Nom_fill` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `groupe`
--

CREATE TABLE `groupe` (
  `id_grp` int(11) NOT NULL,
  `Nom_grp` varchar(255) NOT NULL,
  `id_fill` int(11) NOT NULL,
  `anne` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stagiaires`
--

CREATE TABLE `stagiaires` (
  `id_etudiant` bigint(20) NOT NULL,
  `Matricule` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Prenom2` varchar(255) DEFAULT NULL,
  `DatedeNaissance` datetime DEFAULT NULL,
  `Actif` enum('oui','non') NOT NULL,
  `id_g` int(11) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`id_abs`),
  ADD KEY `id_stg` (`id_stg`),
  ADD KEY `abs_grp` (`id_grp`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filière`
--
ALTER TABLE `filière`
  ADD PRIMARY KEY (`id_fill`);

--
-- Indexes for table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id_grp`),
  ADD KEY `fk1` (`id_fill`);

--
-- Indexes for table `stagiaires`
--
ALTER TABLE `stagiaires`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD KEY `fk2` (`id_g`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absence`
--
ALTER TABLE `absence`
  MODIFY `id_abs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `filière`
--
ALTER TABLE `filière`
  MODIFY `id_fill` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id_grp` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `abs_grp` FOREIGN KEY (`id_grp`) REFERENCES `groupe` (`id_grp`);

--
-- Constraints for table `groupe`
--
ALTER TABLE `groupe`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`id_fill`) REFERENCES `filière` (`id_fill`);

--
-- Constraints for table `stagiaires`
--
ALTER TABLE `stagiaires`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`id_g`) REFERENCES `groupe` (`id_grp`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
