-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2023 at 07:10 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proiectsn`
--
CREATE DATABASE IF NOT EXISTS `proiectsn` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `proiectsn`;

-- --------------------------------------------------------

--
-- Table structure for table `clienti`
--

CREATE TABLE `clienti` (
  `IDClient` int(4) UNSIGNED NOT NULL,
  `Nume` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `Adresa` varchar(64) NOT NULL,
  `Telefon` varchar(15) NOT NULL,
  `IDFkOras` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clienti`
--

INSERT INTO `clienti` (`IDClient`, `Nume`, `password`, `Adresa`, `Telefon`, `IDFkOras`) VALUES
(1, 'Marius Frunza', '81dc9bdb52d04dc20036dbd8313ed055', 'Str. Strada 385', '0700393493', 1),
(2, 'Alexandru Stavar', '81dc9bdb52d04dc20036dbd8313ed055', 'Str. Strada 987', '0730985985', 3),
(3, 'Admin', '81dc9bdb52d04dc20036dbd8313ed055', 'N/A', 'N/A', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orase`
--

CREATE TABLE `orase` (
  `idoras` int(10) UNSIGNED NOT NULL,
  `oras` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orase`
--

INSERT INTO `orase` (`idoras`, `oras`) VALUES
(3, 'Arad'),
(1, 'Bucuresti'),
(2, 'Constanta'),
(5, 'Craiova'),
(4, 'Timisoara');

-- --------------------------------------------------------

--
-- Table structure for table `produse`
--

CREATE TABLE `produse` (
  `IDProdus` int(11) NOT NULL,
  `NumeProdus` varchar(64) NOT NULL,
  `PretProdus` int(11) NOT NULL,
  `Cantitate` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produse`
--

INSERT INTO `produse` (`IDProdus`, `NumeProdus`, `PretProdus`, `Cantitate`) VALUES
(1, 'MB Asus B650-PLUS', 699, 40),
(2, 'AMD Ryzen 7950x', 2199, 20),
(3, 'WD Black SN850X', 350, 50);

-- --------------------------------------------------------

--
-- Table structure for table `servicii`
--

CREATE TABLE `servicii` (
  `IDService` int(11) NOT NULL,
  `NumeService` varchar(64) NOT NULL,
  `PretService` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servicii`
--

INSERT INTO `servicii` (`IDService`, `NumeService`, `PretService`) VALUES
(1, 'Instalare OS', 100),
(2, 'Depanare calculator', 200),
(3, 'Instalare hardware', 70);

-- --------------------------------------------------------

--
-- Table structure for table `tehnicieni`
--

CREATE TABLE `tehnicieni` (
  `IDTehnician` int(11) NOT NULL,
  `numeteh` varchar(64) NOT NULL,
  `Adresa` varchar(64) NOT NULL,
  `Telefon` varchar(15) NOT NULL,
  `FkIDOras` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tehnicieni`
--

INSERT INTO `tehnicieni` (`IDTehnician`, `numeteh`, `Adresa`, `Telefon`, `FkIDOras`) VALUES
(1, 'George Nicolau', 'Str. Firmei nr. 111', '0735985985', 1),
(2, 'Matei Salcudeanu', 'Str. Firmei 111', '0738999888', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tranzactii`
--

CREATE TABLE `tranzactii` (
  `IDTranzactie` int(11) NOT NULL,
  `IDFKClient` int(11) NOT NULL,
  `IDFKProdus` int(11) NOT NULL,
  `IDFKService` int(11) NOT NULL,
  `IDFKTehnician` int(11) NOT NULL,
  `Suma` int(10) UNSIGNED NOT NULL,
  `Data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tranzactii`
--

INSERT INTO `tranzactii` (`IDTranzactie`, `IDFKClient`, `IDFKProdus`, `IDFKService`, `IDFKTehnician`, `Suma`, `Data`) VALUES
(1, 1, 2, 1, 1, 250, '2022-12-28'),
(2, 2, 1, 2, 2, 300, '2022-12-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`IDClient`);

--
-- Indexes for table `orase`
--
ALTER TABLE `orase`
  ADD PRIMARY KEY (`idoras`),
  ADD UNIQUE KEY `oras` (`oras`),
  ADD UNIQUE KEY `oras_2` (`oras`);

--
-- Indexes for table `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`IDProdus`),
  ADD UNIQUE KEY `NumeProdus` (`NumeProdus`),
  ADD UNIQUE KEY `NumeProdus_2` (`NumeProdus`);

--
-- Indexes for table `servicii`
--
ALTER TABLE `servicii`
  ADD PRIMARY KEY (`IDService`),
  ADD UNIQUE KEY `NumeService` (`NumeService`);

--
-- Indexes for table `tehnicieni`
--
ALTER TABLE `tehnicieni`
  ADD PRIMARY KEY (`IDTehnician`);

--
-- Indexes for table `tranzactii`
--
ALTER TABLE `tranzactii`
  ADD PRIMARY KEY (`IDTranzactie`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clienti`
--
ALTER TABLE `clienti`
  MODIFY `IDClient` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orase`
--
ALTER TABLE `orase`
  MODIFY `idoras` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produse`
--
ALTER TABLE `produse`
  MODIFY `IDProdus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `servicii`
--
ALTER TABLE `servicii`
  MODIFY `IDService` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tehnicieni`
--
ALTER TABLE `tehnicieni`
  MODIFY `IDTehnician` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tranzactii`
--
ALTER TABLE `tranzactii`
  MODIFY `IDTranzactie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
