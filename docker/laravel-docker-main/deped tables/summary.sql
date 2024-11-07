-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 28, 2024 at 04:54 AM
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
-- Table structure for table `summary`
--

CREATE TABLE `summary` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `section` int NOT NULL,
  `mt` int DEFAULT NULL,
  `filipino` int DEFAULT NULL,
  `english` int DEFAULT NULL,
  `math` int DEFAULT NULL,
  `ap` int DEFAULT NULL,
  `esp` int DEFAULT NULL,
  `mapeh` int DEFAULT NULL,
  `ga` int DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `summary`
--

INSERT INTO `summary` (`id`, `user_id`, `section`, `mt`, `filipino`, `english`, `math`, `ap`, `esp`, `mapeh`, `ga`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 88, 92, 90, 88, 92, 90, 89, 90, '2024-10-27 16:15:00', '2024-10-27 16:21:04'),
(2, 9, 1, 91, 89, 91, 91, 91, 91, 93, 91, '2024-10-27 16:15:00', '2024-10-27 16:24:08'),
(3, 6, 1, 88, 86, 82, 83, 92, 92, 89, 87, '2024-10-27 16:15:00', '2024-10-27 16:22:54'),
(4, 5, 1, 88, 85, 87, 88, 90, 91, 88, 88, '2024-10-27 16:15:00', '2024-10-27 16:22:03'),
(5, 10, 1, 76, 76, 76, 76, 76, 77, 76, 76, '2024-10-27 16:15:00', '2024-10-27 16:25:15'),
(6, 2, 1, 88, 89, 87, 88, 90, 92, 89, 89, '2024-10-27 16:15:00', '2024-10-27 16:19:58'),
(7, 3, 2, 88, 89, 87, 88, 90, 92, 89, 89, '2024-10-27 16:15:52', '2024-10-27 16:25:36'),
(8, 7, 2, 88, 86, 88, 86, 88, 88, 88, 87, '2024-10-27 16:15:52', '2024-10-27 16:26:40'),
(9, 8, 2, 92, 89, 91, 88, 92, 93, 89, 91, '2024-10-27 16:15:52', '2024-10-27 16:27:24'),
(10, 11, 2, 85, 85, 83, 77, 85, 87, 77, 83, '2024-10-27 16:15:52', '2024-10-27 16:28:10'),
(11, 12, 2, 92, 92, 90, 94, 92, 94, 95, 93, '2024-10-27 16:15:52', '2024-10-27 16:28:50'),
(12, 13, 2, 84, 84, 82, 83, 85, 86, 85, 84, '2024-10-27 16:15:52', '2024-10-27 16:29:58'),
(13, 2, 3, 89, NULL, NULL, NULL, NULL, NULL, NULL, 89, '2024-10-27 16:44:40', '2024-10-27 19:22:08'),
(14, 9, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:40', '2024-10-27 16:44:40'),
(15, 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:40', '2024-10-27 16:44:40'),
(16, 13, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:40', '2024-10-27 16:44:40'),
(17, 6, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:40', '2024-10-27 16:44:40'),
(18, 12, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:40', '2024-10-27 16:44:40'),
(19, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:54', '2024-10-27 16:44:54'),
(20, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:54', '2024-10-27 16:44:54'),
(21, 7, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:54', '2024-10-27 16:44:54'),
(22, 8, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:54', '2024-10-27 16:44:54'),
(23, 10, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:54', '2024-10-27 16:44:54'),
(24, 11, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:54', '2024-10-27 16:44:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `summary`
--
ALTER TABLE `summary`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `summary`
--
ALTER TABLE `summary`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
