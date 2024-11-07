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
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `quarter` int NOT NULL,
  `section` int NOT NULL,
  `mt` int DEFAULT NULL,
  `filipino` int DEFAULT NULL,
  `english` int DEFAULT NULL,
  `math` int DEFAULT NULL,
  `ap` int DEFAULT NULL,
  `esp` int DEFAULT NULL,
  `mapeh` int DEFAULT NULL,
  `music` int DEFAULT NULL,
  `arts` int DEFAULT NULL,
  `pe` int DEFAULT NULL,
  `health` int DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `user_id`, `quarter`, `section`, `mt`, `filipino`, `english`, `math`, `ap`, `esp`, `mapeh`, `music`, `arts`, `pe`, `health`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 1, 86, 87, 87, 87, 89, 89, 87, 90, 86, 87, 86, '2024-10-27 16:15:00', '2024-10-27 16:21:04'),
(2, 4, 2, 1, 87, 100, 85, 87, 97, 92, 87, 87, 87, 88, 89, '2024-10-27 16:15:00', '2024-10-27 16:21:04'),
(3, 4, 3, 1, 90, 90, 98, 89, 91, 85, 90, 90, 90, 89, 90, '2024-10-27 16:15:00', '2024-10-27 16:21:04'),
(4, 4, 4, 1, 89, 89, 88, 88, 91, 93, 91, 88, 91, 93, 90, '2024-10-27 16:15:00', '2024-10-27 16:21:04'),
(5, 9, 1, 1, 90, 92, 90, 95, 95, 87, 95, 92, 90, 87, 95, '2024-10-27 16:15:00', '2024-10-27 16:24:08'),
(6, 9, 2, 1, 90, 87, 92, 90, 87, 95, 92, 90, 92, 90, 87, '2024-10-27 16:15:00', '2024-10-27 16:24:08'),
(7, 9, 3, 1, 92, 90, 87, 92, 90, 92, 90, 87, 95, 92, 90, '2024-10-27 16:15:00', '2024-10-27 16:24:08'),
(8, 9, 4, 1, 90, 87, 95, 87, 92, 90, 95, 95, 95, 95, 92, '2024-10-27 16:15:00', '2024-10-27 16:24:08'),
(9, 6, 1, 1, 86, 87, 86, 87, 89, 89, 87, 90, 86, 87, 86, '2024-10-27 16:15:00', '2024-10-27 16:22:54'),
(10, 6, 2, 1, 87, 78, 78, 87, 88, 92, 88, 87, 87, 88, 89, '2024-10-27 16:15:00', '2024-10-27 16:22:54'),
(11, 6, 3, 1, 90, 90, 88, 70, 98, 92, 90, 90, 90, 89, 90, '2024-10-27 16:15:00', '2024-10-27 16:22:54'),
(12, 6, 4, 1, 89, 89, 77, 88, 91, 93, 91, 88, 91, 93, 90, '2024-10-27 16:15:00', '2024-10-27 16:22:54'),
(13, 5, 1, 1, 86, 87, 87, 87, 89, 89, 87, 90, 86, 87, 86, '2024-10-27 16:15:00', '2024-10-27 16:22:03'),
(14, 5, 2, 1, 87, 88, 85, 87, 88, 89, 88, 87, 87, 88, 89, '2024-10-27 16:15:00', '2024-10-27 16:22:03'),
(15, 5, 3, 1, 90, 90, 88, 89, 91, 92, 85, 90, 90, 89, 90, '2024-10-27 16:15:00', '2024-10-27 16:22:03'),
(16, 5, 4, 1, 89, 75, 88, 88, 91, 93, 91, 88, 91, 93, 90, '2024-10-27 16:15:00', '2024-10-27 16:22:03'),
(17, 10, 1, 1, 75, 75, 75, 74, 81, 81, 81, 81, 75, 74, 72, '2024-10-27 16:15:00', '2024-10-27 16:25:15'),
(18, 10, 2, 1, 72, 72, 74, 75, 74, 72, 72, 75, 74, 72, 74, '2024-10-27 16:15:00', '2024-10-27 16:25:15'),
(19, 10, 3, 1, 81, 74, 72, 81, 72, 74, 75, 74, 72, 72, 74, '2024-10-27 16:15:00', '2024-10-27 16:25:15'),
(20, 10, 4, 1, 74, 81, 81, 72, 75, 81, 74, 81, 75, 81, 74, '2024-10-27 16:15:00', '2024-10-27 16:25:15'),
(21, 2, 1, 1, 86, 87, 86, 87, 89, 89, 87, 90, 86, 87, 86, '2024-10-27 16:15:00', '2024-10-27 16:19:58'),
(22, 2, 2, 1, 87, 88, 85, 87, 88, 92, 88, 87, 87, 88, 89, '2024-10-27 16:15:00', '2024-10-27 16:19:58'),
(23, 2, 3, 1, 90, 90, 88, 89, 91, 92, 90, 90, 90, 89, 90, '2024-10-27 16:15:00', '2024-10-27 16:19:58'),
(24, 2, 4, 1, 89, 89, 88, 88, 91, 93, 91, 88, 91, 93, 90, '2024-10-27 16:15:00', '2024-10-27 16:19:58'),
(25, 3, 1, 2, 86, 87, 86, 87, 89, 89, 87, 90, 86, 87, 86, '2024-10-27 16:15:52', '2024-10-27 16:25:36'),
(26, 3, 2, 2, 87, 88, 85, 87, 88, 92, 88, 87, 87, 88, 89, '2024-10-27 16:15:52', '2024-10-27 16:25:36'),
(27, 3, 3, 2, 90, 90, 88, 89, 91, 92, 90, 90, 90, 89, 90, '2024-10-27 16:15:52', '2024-10-27 16:25:36'),
(28, 3, 4, 2, 89, 89, 88, 88, 91, 93, 91, 88, 91, 93, 90, '2024-10-27 16:15:52', '2024-10-27 16:25:36'),
(29, 7, 1, 2, 81, 81, 95, 86, 89, 89, 89, 95, 81, 86, 89, '2024-10-27 16:15:52', '2024-10-27 16:26:40'),
(30, 7, 2, 2, 89, 89, 86, 89, 86, 81, 81, 89, 86, 81, 86, '2024-10-27 16:15:52', '2024-10-27 16:26:40'),
(31, 7, 3, 2, 95, 86, 81, 81, 95, 86, 95, 86, 89, 81, 86, '2024-10-27 16:15:52', '2024-10-27 16:26:40'),
(32, 7, 4, 2, 86, 89, 89, 89, 81, 95, 86, 95, 89, 95, 86, '2024-10-27 16:15:52', '2024-10-27 16:26:40'),
(33, 8, 1, 2, 86, 87, 96, 87, 89, 89, 87, 90, 86, 87, 86, '2024-10-27 16:15:52', '2024-10-27 16:27:24'),
(34, 8, 2, 2, 96, 88, 85, 87, 96, 96, 88, 87, 87, 88, 89, '2024-10-27 16:15:52', '2024-10-27 16:27:24'),
(35, 8, 3, 2, 90, 90, 88, 89, 91, 92, 90, 90, 90, 89, 90, '2024-10-27 16:15:52', '2024-10-27 16:27:24'),
(36, 8, 4, 2, 96, 89, 96, 88, 91, 93, 91, 96, 91, 93, 90, '2024-10-27 16:15:52', '2024-10-27 16:27:24'),
(37, 11, 1, 2, 73, 87, 86, 87, 89, 89, 73, 90, 86, 87, 86, '2024-10-27 16:15:52', '2024-10-27 16:28:10'),
(38, 11, 2, 2, 87, 73, 85, 73, 88, 73, 73, 87, 73, 88, 89, '2024-10-27 16:15:52', '2024-10-27 16:28:10'),
(39, 11, 3, 2, 90, 90, 73, 73, 73, 92, 90, 73, 90, 89, 90, '2024-10-27 16:15:52', '2024-10-27 16:28:10'),
(40, 11, 4, 2, 89, 89, 88, 73, 91, 93, 73, 88, 91, 93, 90, '2024-10-27 16:15:52', '2024-10-27 16:28:10'),
(41, 12, 1, 2, 100, 87, 86, 87, 89, 89, 100, 90, 86, 87, 86, '2024-10-27 16:15:52', '2024-10-27 16:28:50'),
(42, 12, 2, 2, 87, 100, 85, 100, 88, 92, 100, 87, 87, 88, 89, '2024-10-27 16:15:52', '2024-10-27 16:28:50'),
(43, 12, 3, 2, 90, 90, 100, 89, 91, 100, 90, 90, 90, 100, 100, '2024-10-27 16:15:52', '2024-10-27 16:28:50'),
(44, 12, 4, 2, 89, 89, 88, 100, 100, 93, 91, 88, 91, 93, 90, '2024-10-27 16:15:52', '2024-10-27 16:28:50'),
(45, 13, 1, 2, 70, 87, 86, 87, 89, 89, 70, 90, 86, 87, 86, '2024-10-27 16:15:52', '2024-10-27 16:29:58'),
(46, 13, 2, 2, 87, 70, 85, 87, 88, 70, 88, 70, 87, 88, 89, '2024-10-27 16:15:52', '2024-10-27 16:29:58'),
(47, 13, 3, 2, 90, 90, 70, 89, 70, 92, 90, 90, 70, 89, 70, '2024-10-27 16:15:52', '2024-10-27 16:29:58'),
(48, 13, 4, 2, 89, 89, 88, 70, 91, 93, 91, 88, 70, 70, 70, '2024-10-27 16:15:52', '2024-10-27 16:29:58'),
(49, 2, 1, 3, 89, 89, 89, 89, 89, 89, 89, 89, 88, 88, 88, '2024-10-27 16:44:40', '2024-10-27 19:34:54'),
(50, 2, 2, 3, 89, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:40', '2024-10-27 19:22:08'),
(51, 2, 3, 3, 89, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:40', '2024-10-27 19:22:08'),
(52, 2, 4, 3, 89, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:40', '2024-10-27 19:22:08'),
(53, 9, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:40', '2024-10-27 16:44:40'),
(54, 9, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:40', '2024-10-27 16:44:40'),
(55, 9, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:40', '2024-10-27 16:44:40'),
(56, 9, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:40', '2024-10-27 16:44:40'),
(57, 5, 1, 3, 88, 88, 88, 88, 88, 88, 88, NULL, NULL, NULL, NULL, '2024-10-27 16:44:40', '2024-10-27 19:35:47'),
(58, 5, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 88, 88, NULL, NULL, '2024-10-27 16:44:40', '2024-10-27 19:35:47'),
(59, 5, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 88, NULL, '2024-10-27 16:44:40', '2024-10-27 19:35:47'),
(60, 5, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 88, '2024-10-27 16:44:40', '2024-10-27 19:35:47'),
(61, 13, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:40', '2024-10-27 16:44:40'),
(62, 13, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:40', '2024-10-27 16:44:40'),
(63, 13, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:40', '2024-10-27 16:44:40'),
(64, 13, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:40', '2024-10-27 16:44:40'),
(65, 6, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:40', '2024-10-27 16:44:40'),
(66, 6, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:40', '2024-10-27 16:44:40'),
(67, 6, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:40', '2024-10-27 16:44:40'),
(68, 6, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:40', '2024-10-27 16:44:40'),
(69, 12, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:40', '2024-10-27 16:44:40'),
(70, 12, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:40', '2024-10-27 16:44:40'),
(71, 12, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:40', '2024-10-27 16:44:40'),
(72, 12, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:40', '2024-10-27 16:44:40'),
(73, 3, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:54', '2024-10-27 16:44:54'),
(74, 3, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:54', '2024-10-27 16:44:54'),
(75, 3, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:54', '2024-10-27 16:44:54'),
(76, 3, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:54', '2024-10-27 16:44:54'),
(77, 4, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:54', '2024-10-27 16:44:54'),
(78, 4, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:54', '2024-10-27 16:44:54'),
(79, 4, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:54', '2024-10-27 16:44:54'),
(80, 4, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:54', '2024-10-27 16:44:54'),
(81, 7, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:54', '2024-10-27 16:44:54'),
(82, 7, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:54', '2024-10-27 16:44:54'),
(83, 7, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:54', '2024-10-27 16:44:54'),
(84, 7, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:54', '2024-10-27 16:44:54'),
(85, 8, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:54', '2024-10-27 16:44:54'),
(86, 8, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:54', '2024-10-27 16:44:54'),
(87, 8, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:54', '2024-10-27 16:44:54'),
(88, 8, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:54', '2024-10-27 16:44:54'),
(89, 10, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:54', '2024-10-27 16:44:54'),
(90, 10, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:54', '2024-10-27 16:44:54'),
(91, 10, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:54', '2024-10-27 16:44:54'),
(92, 10, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:54', '2024-10-27 16:44:54'),
(93, 11, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:54', '2024-10-27 16:44:54'),
(94, 11, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:54', '2024-10-27 16:44:54'),
(95, 11, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:54', '2024-10-27 16:44:54'),
(96, 11, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-27 16:44:54', '2024-10-27 16:44:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
