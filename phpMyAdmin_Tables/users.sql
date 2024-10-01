-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Oct 01, 2024 at 07:50 AM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `fname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sid` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tid` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bday` date DEFAULT NULL,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lrn` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eligibility` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `mname`, `lname`, `sid`, `tid`, `email`, `sex`, `bday`, `role`, `lrn`, `section`, `eligibility`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Daniel Andrey', 'Dela Cruz', 'Angat', '2', '2021-0003213121', 'angat@gmail.com', 'male', '2002-07-23', 'teacher', NULL, NULL, NULL, '$2y$12$.vMv3ntAMdwI86cI2IysA.yWUupW75bmoENRmCQTyesaA1wTxOiTW', NULL, '2024-09-26 03:42:16', '2024-09-26 03:42:16'),
(2, 'Carl Justin', 'B.', 'Bustamante', '1', '2022-2131312312331', 'bustamante@gmail.com', 'male', '2015-12-28', 'teacher', NULL, NULL, NULL, '$2y$12$O227JdRMS9sUSCEu7Wn7duqQdXURP04miOkGfi5mytUKyndaIjqf6', NULL, '2024-09-26 05:53:57', '2024-09-26 05:53:57'),
(3, 'Daniela', 'Drea', 'Brillantes', '2', '2021-0003213121', 'student1@gmail.com', 'female', '2024-09-02', 'student', '2020-140112', NULL, NULL, '$2y$12$7ROXOSJ7Y7HnY61Q0yZO6.RnePNL4CSwBi5ToiSUBlqrPPO7ON2Uy', NULL, '2024-09-30 07:27:53', '2024-10-01 07:38:57'),
(4, 'Carla', 'Lopez', 'Bustamante', '2', '2021-0003213121', 'student2@gmail.com', 'female', '2024-05-27', 'student', '2020-140113', NULL, NULL, '$2y$12$mhl7QQfS1o0ZVb/pPeWldeBlo094L9BRskJdoPU3PtR0R24bk38ou', NULL, '2024-09-30 13:51:24', '2024-09-30 13:51:24'),
(5, 'Gabriela', 'Hernandez', 'Suarez', '2', '2021-0003213121', 'student3@gmail.com', 'female', '2024-04-30', 'student', '2020-140114', NULL, NULL, '$2y$12$4Bpbwh4U82xlN2lX27s8.OTe7089yJzfVsKXT/S9EW0i4kqAy9.L6', NULL, '2024-09-30 13:52:45', '2024-09-30 13:52:45'),
(6, 'Mathea', 'Mason', 'Pinlac', '2', '2021-0003213121', 'student4@gmail.com', 'female', '2024-02-27', 'student', '2020-140115', NULL, NULL, '$2y$12$g3jokdQYBhY8kuY3dF3qb.yVIysgb2jdNIewsjWCt3UYVPhOHtO0a', NULL, '2024-09-30 13:54:12', '2024-09-30 13:54:12'),
(7, 'Klara', 'Mendoza', 'Salas', '2', '2021-0003213121', 'student5@gmail.com', 'female', '2024-05-02', 'student', '2020-140116', NULL, NULL, '$2y$12$rqElT0xfOothrxHN4mVvhO3y.Sj6LVHC4kR22N/lkU15DAEnHqUv2', NULL, '2024-09-30 13:55:37', '2024-09-30 13:55:37'),
(8, 'Jethra', 'Linam', 'Moreno', '2', '2021-0003213121', 'student6@gmail.com', 'female', '2024-03-05', 'student', '2020-140117', NULL, NULL, '$2y$12$8lzPXFgKnbvXqQFfJ2.GlODm6wv.ksrXcnyqWRZVBzKwQW4EJLi/C', NULL, '2024-09-30 13:57:02', '2024-09-30 13:57:02'),
(9, 'Daniel Andrey', 'Dela Cruz', 'Angat', '2', '2021-0003213121', 'student7@gmail.com', 'male', '2023-11-03', 'student', '2020-140118', NULL, NULL, '$2y$12$t7hMbIp94Xh9fwe5d.HC1.hq/RBeFEFuX3ZRMeAK4p8bIDXwyNV6W', NULL, '2024-09-30 13:58:21', '2024-09-30 13:58:21'),
(10, 'Carl Justin', 'Mendez', 'Katapang', '2', '2021-0003213121', 'student8@gmail.com', 'male', '2023-11-04', 'student', '2020-140119', NULL, NULL, '$2y$12$R92ap/CEY/KTBTtZdPB6suVGd6oeoH05GtnZE1WwtlNKqjP6pJgGi', NULL, '2024-09-30 13:59:38', '2024-09-30 13:59:38'),
(11, 'Aaron', 'Suarez', 'Gomez', '2', '2021-0003213121', 'student9@gmail.com', 'male', '2024-04-10', 'student', '2020-140120', NULL, NULL, '$2y$12$rYMb6YmKNSbAR0FsxccpU.Bo7x9IjWLmuXAc8rI3orWIP4.NU6FlW', NULL, '2024-09-30 14:00:45', '2024-09-30 14:00:45'),
(12, 'Matthew Aaron', 'Pinlac', 'Robredo', '2', '2021-0003213121', 'student10@gmail.com', 'male', '2024-01-11', 'student', '2020-140121', NULL, NULL, '$2y$12$d1/PuyrqnUMn0gN33XNSmOwgB4BboNq9fvP2j76qGMNKVgBC.Ipde', NULL, '2024-09-30 14:01:55', '2024-09-30 14:01:55'),
(13, 'Klarenz', 'Villanueva', 'Dumagat', '2', '2021-0003213121', 'student11@gmail.com', 'male', '2024-03-07', 'student', '2020-140122', NULL, NULL, '$2y$12$4ItiYLC4SHIQm9kAXJVBDux4DNmQUxJkqyDs3C56cbq9tfZS63XzC', NULL, '2024-09-30 14:02:45', '2024-09-30 14:02:45'),
(14, 'Carl Jethro', 'Merzedez', 'Aurelio', '2', '2021-0003213121', 'student12@gmail.com', 'male', '2024-01-09', 'student', '2020-140123', NULL, NULL, '$2y$12$WGUjXQr9k.W7ZTsoenA8Ku1E07tCuIYdz0eckLbg3OpuIMqpaeqYu', NULL, '2024-09-30 14:03:49', '2024-09-30 14:03:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
