-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 07, 2024 at 01:51 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `refactorian`
--

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `name`, `region`, `division`, `district`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Guadalupe Viejo Elementary School', 'NCR', 'Makati', 'District I', 'Progreso St. Guadalupe, Viejo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Makati Elementary School', 'NCR', 'Makati', 'District I', 'General Luna St Poblacion', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Heneral Pio Del Pilar Elementary School', 'NCR', 'Makati', 'District 2', 'P. Binay Cor. Arnaiz St., Pio Del Pilar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'La Paz Elementary School', 'NCR', 'Makati', 'District 3', 'Dumas St., Barangay La Paz', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Test1', 'NCR', 'Makati', 'District 2', 'test', '2024-11-06 17:43:38', '2024-11-06 17:43:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
