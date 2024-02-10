-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2024 at 05:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `putno_osiguranje_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `dodatna_lica`
--

CREATE TABLE `dodatna_lica` (
  `id_grupa` int(11) NOT NULL,
  `id_nosilac` int(11) NOT NULL,
  `ime_prezime` varchar(100) NOT NULL,
  `datum_rodjenja` date NOT NULL,
  `broj_pasosa` int(9) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dodatna_lica`
--

INSERT INTO `dodatna_lica` (`id_grupa`, `id_nosilac`, `ime_prezime`, `datum_rodjenja`, `broj_pasosa`, `created_at`, `updated_at`) VALUES
(1, 19, 'Provera provera', '2000-11-11', 789789789, '2024-02-09 18:09:02', '2024-02-09 18:09:25'),
(2, 21, 'Test Test', '2000-05-05', 787878787, '2024-02-09 23:21:00', '2024-02-09 23:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `nosilac`
--

CREATE TABLE `nosilac` (
  `id_nosilac` int(11) NOT NULL,
  `ime_prezime` varchar(100) NOT NULL,
  `datum_rodjenja` date NOT NULL,
  `broj_pasos` int(9) NOT NULL,
  `telefon` varchar(12) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `datum_od` date NOT NULL,
  `datum_do` date NOT NULL,
  `id_polisa` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nosilac`
--

INSERT INTO `nosilac` (`id_nosilac`, `ime_prezime`, `datum_rodjenja`, `broj_pasos`, `telefon`, `email`, `datum_od`, `datum_do`, `id_polisa`, `created_at`, `updated_at`) VALUES
(19, 'Test Test', '2000-04-04', 444444444, '06789789789', 'test@gmail.com', '2024-06-06', '2024-08-06', 2, '2024-02-09 18:09:51', '2024-02-09 18:10:03'),
(20, 'Mika Mikic', '1999-12-12', 888888888, '0678978787', 'mika123@gmail.com', '2024-11-12', '2024-12-15', 1, '2024-02-09 18:09:51', '2024-02-09 18:10:03'),
(21, 'Testt Test', '2000-04-04', 666666666, '06555555558', 'test2@gmail.com', '2000-05-04', '2000-05-06', 2, '2024-02-09 23:21:00', '2024-02-09 23:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `polisa`
--

CREATE TABLE `polisa` (
  `id_polisa` int(11) NOT NULL,
  `naziv` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `polisa`
--

INSERT INTO `polisa` (`id_polisa`, `naziv`) VALUES
(2, 'grupno'),
(1, 'individualno');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dodatna_lica`
--
ALTER TABLE `dodatna_lica`
  ADD PRIMARY KEY (`id_grupa`),
  ADD UNIQUE KEY `broj_pasosa` (`broj_pasosa`),
  ADD KEY `id_nosilac` (`id_nosilac`);

--
-- Indexes for table `nosilac`
--
ALTER TABLE `nosilac`
  ADD PRIMARY KEY (`id_nosilac`),
  ADD UNIQUE KEY `broj_pasos` (`broj_pasos`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_polisa` (`id_polisa`);

--
-- Indexes for table `polisa`
--
ALTER TABLE `polisa`
  ADD PRIMARY KEY (`id_polisa`),
  ADD UNIQUE KEY `naziv` (`naziv`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dodatna_lica`
--
ALTER TABLE `dodatna_lica`
  MODIFY `id_grupa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nosilac`
--
ALTER TABLE `nosilac`
  MODIFY `id_nosilac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `polisa`
--
ALTER TABLE `polisa`
  MODIFY `id_polisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dodatna_lica`
--
ALTER TABLE `dodatna_lica`
  ADD CONSTRAINT `dodatna_lica_ibfk_1` FOREIGN KEY (`id_nosilac`) REFERENCES `nosilac` (`id_nosilac`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nosilac`
--
ALTER TABLE `nosilac`
  ADD CONSTRAINT `nosilac_ibfk_1` FOREIGN KEY (`id_polisa`) REFERENCES `polisa` (`id_polisa`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
