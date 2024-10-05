-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Oct 05, 2024 at 08:00 AM
-- Server version: 8.1.0
-- PHP Version: 8.2.8

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
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int NOT NULL,
  `secname` varchar(50) NOT NULL,
  `grade` varchar(3) NOT NULL,
  `school_year` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `teacher_id` varchar(50) NOT NULL,
  `dnm` int DEFAULT NULL,
  `fairly` int DEFAULT NULL,
  `satisfactory` int DEFAULT NULL,
  `vsatisfactory` int DEFAULT NULL,
  `outstanding` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `secname`, `grade`, `school_year`, `teacher_id`, `dnm`, `fairly`, `satisfactory`, `vsatisfactory`, `outstanding`, `created_at`, `updated_at`) VALUES
(1, 'try change', '1', '2014-2016', '2021-0003213121', NULL, NULL, NULL, NULL, NULL, '2024-10-05 06:04:18', '2024-10-05 07:15:25'),
(2, 'Section 2', '2', '2014-2015', '2021-0003213121', NULL, NULL, NULL, NULL, NULL, '2024-10-05 06:28:04', '2024-10-05 06:28:04'),
(3, 'Section 3', '3', '2014-2015', '2022-2131312312331', NULL, NULL, NULL, NULL, NULL, '2024-10-05 06:29:21', '2024-10-05 06:29:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
