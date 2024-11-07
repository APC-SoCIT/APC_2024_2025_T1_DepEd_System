-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 07, 2024 at 01:50 PM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `fname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sid` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tid` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bday` date DEFAULT NULL,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lrn` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` mediumint DEFAULT NULL,
  `eligibility` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `mname`, `lname`, `sid`, `tid`, `email`, `sex`, `bday`, `role`, `lrn`, `section`, `eligibility`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Daniel Andrey', 'C.', 'Angat', '2', '2021-140119', 'angat@gmail.com', 'female', '2002-07-24', 'teacher', NULL, NULL, NULL, '$2y$12$uUE3hxoqldT0Nzp7Z2UguOG7DUyBMYgBfUNtbMp5NlRTlRsC9CM6u', NULL, '2024-10-27 15:57:07', '2024-10-28 21:06:22'),
(2, 'Daniel Andrey', 'D.', 'Angat', '2', '2021-140119', 'student1@gmail.com', 'male', '2024-10-01', 'student', '2022-140001', 3, NULL, '$2y$12$04iD8F/0G7qRUc5qFiHiBeKkZwwc5foLwLcZhLU8IuIxksVYR6MlG', NULL, '2024-10-27 15:59:44', '2024-10-27 16:44:40'),
(3, 'Matthew Aaron', 'B.', 'Pinlac', '2', '2021-140119', 'student2@gmail.com', 'male', '2024-10-08', 'student', '2022-140002', 4, NULL, '$2y$12$aEhdh3aTP.Z40BjkzkVzEOwuk3IX9ofcI0EQ2ic871fj/jutGAJWG', NULL, '2024-10-27 16:01:50', '2024-10-27 16:44:54'),
(4, 'Aaron Gabriel', 'C.', 'Suarez', '2', '2021-140119', 'student3@gmail.com', 'male', '2024-10-04', 'student', '2022-140003', 4, NULL, '$2y$12$NLMEQ2CVuhMiOle.H./UWOFeJndNvK4CFjgUzeeOoOC6Y2bwV7716', NULL, '2024-10-27 16:03:09', '2024-10-27 16:44:54'),
(5, 'Carl Justin', 'A.', 'Bustamante', '2', '2021-140119', 'student4@gmail.com', 'male', '2024-10-05', 'student', '2022-140004', 3, NULL, '$2y$12$G6b4Jw/h2f6Oyonio8vue.jr/1fAeXcMFgshnbcpU25Do8BdlHS4G', NULL, '2024-10-27 16:04:02', '2024-10-28 21:07:11'),
(6, 'Carl Jethro', 'E.', 'Espiritu', '2', '2021-140119', 'student5@gmail.com', 'male', '2024-10-11', 'student', '2022-140005', 3, NULL, '$2y$12$KPks31F3I1IP0aTsB3nAnuAdo6wFQoVvb6QUjEa.DNugcdEiBMd0K', NULL, '2024-10-27 16:04:39', '2024-10-27 16:44:40'),
(7, 'Klarenz', 'F.', 'Villanueva', '2', '2021-140119', 'student6@gmail.com', 'male', '2024-10-10', 'student', '2022-140006', 4, NULL, '$2y$12$9FvGlOB.ux2X0QfPK3iS5OIG7PmRbtkuj.iL1GH/brhinZRCA6pLS', NULL, '2024-10-27 16:05:11', '2024-10-27 16:44:54'),
(8, 'Jhoanna', 'G.', 'Robles', '2', '2021-140119', 'student7@gmail.com', 'female', '2024-10-16', 'student', '2022-140007', 4, NULL, '$2y$12$/yezJStksxVMemXc6jVmWOJGKlOV34rFOQ0DzISeLmzzpyxA2lowO', NULL, '2024-10-27 16:07:30', '2024-10-27 16:44:54'),
(9, 'Aiah', 'H.', 'Arceta', '2', '2021-140119', 'student8@gmail.com', 'female', '2024-10-19', 'student', '2022-140008', 3, NULL, '$2y$12$K4txgG7t7wFAHfl4MNal9uIOYKxR.mb3QmnvxFAlSppq7cLeaklei', NULL, '2024-10-27 16:08:47', '2024-10-27 16:44:40'),
(10, 'Colet', 'I.', 'Vergara', '2', '2021-140119', 'student9@gmail.com', 'female', '2024-10-12', 'student', '2022-140009', 4, NULL, '$2y$12$vEwQP9lcnYX7AmFwW/LIvOZB819kSwCJrxjeCE2heU4xwIbxKSTK6', NULL, '2024-10-27 16:10:04', '2024-10-27 16:44:54'),
(11, 'Maloi', 'J.', 'Ricalde', '2', '2021-140119', 'student10@gmail.com', 'female', '2024-10-26', 'student', '2022-140010', 4, NULL, '$2y$12$wc9Jn0mt8QLuocwwrbKP3.j0ZihCoThFOZ8UaKgNFjaXlAHLmGgvO', NULL, '2024-10-27 16:11:19', '2024-10-27 16:44:54'),
(12, 'Mikha', 'K.', 'Lim', '2', '2021-140119', 'student11@gmail.com', 'female', '2024-10-19', 'student', '2022-140011', 3, NULL, '$2y$12$7wwqs1WXJwecS/8VwMRA1OzdR2sk8RLkjyTaaEeSKHfDx2OpHhdV2', NULL, '2024-10-27 16:12:10', '2024-10-27 16:44:40'),
(13, 'Sheena', 'L.', 'Catacutan', '2', '2021-140119', 'student12@gmail.com', 'female', '2024-10-04', 'student', '2022-140012', 3, NULL, '$2y$12$MuQcHQ1K/gr4apKG2WHwLuUTQbq6wzrBZBa4euqurj4bkq6W.KiAa', NULL, '2024-10-27 16:13:11', '2024-10-27 16:44:40'),
(14, '', '', '', '', '', 'admin@gmail.com', 'male', '2024-12-01', 'admin', NULL, NULL, NULL, '$2y$12$WRJABw.viIekx5IPCHe6QOiela8w0vLo85DhKw9jlsO3tPsf9rscC', NULL, '2024-11-02 19:36:42', '2024-11-02 19:36:42');

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
