-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 18, 2025 at 12:54 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asesmen-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` bigint UNSIGNED NOT NULL,
  `answer_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_siswa` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_soal` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_option_chosen` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `answer_code`, `nis`, `nama_siswa`, `id_soal`, `id_option_chosen`, `created_at`, `updated_at`) VALUES
(2, 'vsTt5M4Ldr', '1000', NULL, 'ADNK01', 1, '2025-11-05 06:55:23', '2025-11-05 06:55:23'),
(3, 'TKNwMTGaVc', '1000', NULL, 'ADNK02', 1, '2025-11-05 06:55:43', '2025-11-05 06:55:43'),
(4, 'ZqZRBAAtwg', '1000', NULL, 'ADNK03', 1, '2025-11-05 06:55:45', '2025-11-05 06:55:45'),
(5, 'oo4868VzMa', '1000', NULL, 'ADNK04', 1, '2025-11-05 06:55:48', '2025-11-05 06:55:48'),
(6, 'Z98G7W2F0S', '1000', NULL, 'ADNK05', 1, '2025-11-05 06:55:50', '2025-11-05 06:55:50'),
(7, 'Srb1ZRjOTZ', '1000', NULL, 'ADNK06', 1, '2025-11-05 06:55:51', '2025-11-05 06:55:51'),
(8, 'Xkva4bTMNp', '1000', NULL, 'ADNK07', 1, '2025-11-05 06:55:53', '2025-11-05 06:55:53'),
(9, 'B5NrIah4R1', '1000', NULL, 'ADNK08', 1, '2025-11-05 06:55:54', '2025-11-05 06:55:54'),
(10, '24wDBvBNAf', '1000', NULL, 'ADNK09', 1, '2025-11-05 06:55:56', '2025-11-05 06:55:56'),
(11, 'gOpJMM4UIP', '1000', NULL, 'ADNK10', 1, '2025-11-05 06:55:57', '2025-11-05 06:55:57'),
(12, '4z5rJt8ZCK', '1000', NULL, 'ADNK11', 1, '2025-11-05 06:55:59', '2025-11-05 06:55:59'),
(13, 'qFFKtImcXT', '1000', NULL, 'ADNK12', 1, '2025-11-05 06:56:00', '2025-11-05 06:56:00'),
(14, '9KgxadZDlP', '1000', NULL, 'ADNK13', 1, '2025-11-05 06:56:02', '2025-11-05 06:56:02'),
(15, 'hwv9mAsvTi', '1000', NULL, 'ADNK14', 1, '2025-11-05 06:56:03', '2025-11-05 06:56:03'),
(16, 'oqw5gQ2a6l', '1000', NULL, 'ADNK15', 1, '2025-11-05 06:56:05', '2025-11-05 06:56:05'),
(17, 'MJJ9I8ff0S', '1000', NULL, 'ADNK16', 2, '2025-11-05 06:56:07', '2025-11-05 06:56:07'),
(18, '8ft4FcK6NU', '1000', NULL, 'ADNK17', 2, '2025-11-05 06:56:09', '2025-11-05 06:56:09'),
(19, 'ZzH8NhsinK', '1000', NULL, 'ADNK18', 2, '2025-11-05 06:56:10', '2025-11-05 06:56:10'),
(20, 'Y0MqAGUO0s', '1000', NULL, 'ADNK19', 2, '2025-11-05 06:56:12', '2025-11-05 06:56:12'),
(21, 'VZqRFExUNL', '1000', NULL, 'ADNK20', 2, '2025-11-05 06:56:13', '2025-11-05 06:56:13'),
(22, '5caKHTHpzd', '1000', NULL, 'ADNK21', 2, '2025-11-05 06:56:15', '2025-11-05 06:56:15'),
(23, 'FhggC3Z6dx', '1000', NULL, 'ADNK22', 2, '2025-11-05 06:56:16', '2025-11-05 06:56:16'),
(24, 'XUVDLWuUoW', '1000', NULL, 'ADNK23', 2, '2025-11-05 06:56:18', '2025-11-05 06:56:18'),
(25, 'Mxpk9zGP2V', '1000', NULL, 'ADNK24', 2, '2025-11-05 06:56:19', '2025-11-05 06:56:19'),
(26, 'yZr2AeJ1V1', '1000', NULL, 'ADNK25', 2, '2025-11-05 06:56:20', '2025-11-05 06:56:20'),
(27, 'eRh5EyFNRV', '1000', NULL, 'ADNK26', 2, '2025-11-05 06:56:22', '2025-11-05 06:56:22'),
(28, 'ygysoDaChd', '1000', NULL, 'ADNK27', 2, '2025-11-05 06:56:24', '2025-11-05 06:56:24'),
(29, 'rFG1aC8pwG', '1000', NULL, 'ADNK28', 2, '2025-11-05 06:56:25', '2025-11-05 06:56:25'),
(30, 'xf2G5KZwsl', '1000', NULL, 'ADNK29', 2, '2025-11-05 06:56:27', '2025-11-05 06:56:27'),
(31, 'GEXUeOqHR6', '1000', NULL, 'ADNK30', 2, '2025-11-05 06:56:28', '2025-11-05 06:56:28'),
(32, 'LMU3ZvZnzC', '1000', NULL, 'ADNK31', 3, '2025-11-05 06:56:37', '2025-11-05 06:56:37'),
(33, 'UPrGXoFA0A', '1000', NULL, 'ADNK32', 3, '2025-11-05 06:56:38', '2025-11-05 06:56:38'),
(34, '4jUqSE8Yil', '1000', NULL, 'ADNK33', 3, '2025-11-05 06:56:39', '2025-11-05 06:56:39'),
(35, 'bXWkxlHSKM', '1000', NULL, 'ADNK34', 3, '2025-11-05 06:56:40', '2025-11-05 06:56:40'),
(36, 'PWV9Fe0X92', '1000', NULL, 'ADNK35', 3, '2025-11-05 06:56:42', '2025-11-05 06:56:42'),
(37, 'eXEF0ZIxNY', '1000', NULL, 'ADNK36', 3, '2025-11-05 06:56:43', '2025-11-05 06:56:43'),
(38, 'fdf1kPHLFB', '1000', NULL, 'ADNK37', 3, '2025-11-05 06:56:44', '2025-11-05 06:56:44'),
(39, 'hIwUOwrbM0', '1000', NULL, 'ADNK38', 3, '2025-11-05 06:56:45', '2025-11-05 06:56:45'),
(40, '96v14BOPWu', '1000', NULL, 'ADNK39', 3, '2025-11-05 06:56:47', '2025-11-05 06:56:47'),
(41, 'yp9XJpNPNF', '1000', NULL, 'ADNK40', 3, '2025-11-05 06:56:49', '2025-11-05 06:56:49'),
(42, 'AcDehkqq5G', '1000', NULL, 'ADNK41', 3, '2025-11-05 06:56:50', '2025-11-05 06:56:50'),
(43, 'QURKIpB1F8', '1000', NULL, 'ADNK42', 1, '2025-11-05 06:56:53', '2025-11-05 06:56:53'),
(44, 'wQHb670z26', '1000', NULL, 'ADNK43', 3, '2025-11-05 06:56:54', '2025-11-05 06:56:54'),
(45, 'v5VdHemKLX', '1000', NULL, 'ADNK44', 2, '2025-11-05 06:56:56', '2025-11-05 06:56:56'),
(46, '1zFwzbiTqy', '1001', NULL, 'ADNK01', 2, '2025-11-06 00:09:46', '2025-11-06 00:09:46'),
(47, '2JfBAu6IZC', '1001', NULL, 'ADNK02', 2, '2025-11-06 00:09:48', '2025-11-06 00:09:48'),
(48, 'yHIHgLcaRv', '1001', NULL, 'ADNK03', 2, '2025-11-06 00:09:50', '2025-11-06 00:09:50'),
(49, 'XG1GqG1Rnw', '1001', NULL, 'ADNK04', 2, '2025-11-06 00:09:51', '2025-11-06 00:09:51'),
(50, 't1FOF02yMS', '1001', NULL, 'ADNK05', 2, '2025-11-06 00:09:52', '2025-11-06 00:09:52'),
(51, 'oETUV6buZl', '1001', NULL, 'ADNK06', 2, '2025-11-06 00:09:54', '2025-11-06 00:09:54'),
(52, '8mISOtt9Uo', '1001', NULL, 'ADNK07', 2, '2025-11-06 00:09:56', '2025-11-06 00:09:56'),
(53, 'EpJrZB6fJI', '1001', NULL, 'ADNK08', 2, '2025-11-06 00:09:57', '2025-11-06 00:09:57'),
(54, 'XOj9fQEVUJ', '1001', NULL, 'ADNK09', 2, '2025-11-06 00:09:58', '2025-11-06 00:09:58'),
(55, '6vIBo0R2h3', '1001', NULL, 'ADNK10', 2, '2025-11-06 00:10:00', '2025-11-06 00:10:00'),
(56, 'ipIAqKJQlH', '1001', NULL, 'ADNK11', 2, '2025-11-06 00:10:02', '2025-11-06 00:10:02'),
(57, 'jLJZRuoZ2q', '1001', NULL, 'ADNK12', 2, '2025-11-06 00:10:04', '2025-11-06 00:10:04'),
(58, 'CVKTFD2IUP', '1001', NULL, 'ADNK13', 2, '2025-11-06 00:10:05', '2025-11-06 00:10:05'),
(59, 'lnpB2iVNpe', '1001', NULL, 'ADNK14', 2, '2025-11-06 00:10:07', '2025-11-06 00:10:07'),
(60, 'f9Vq0jMjJ9', '1001', NULL, 'ADNK15', 2, '2025-11-06 00:10:09', '2025-11-06 00:10:09'),
(61, 'fnMFj3IYfm', '1001', NULL, 'ADNK16', 2, '2025-11-06 00:10:10', '2025-11-06 00:10:10'),
(62, 'u9eHSI0Bud', '1001', NULL, 'ADNK17', 2, '2025-11-06 00:10:12', '2025-11-06 00:10:12'),
(63, 'tN0e95dW3W', '1001', NULL, 'ADNK18', 2, '2025-11-06 00:10:13', '2025-11-06 00:10:13'),
(64, '6BOi0GkpgM', '1001', NULL, 'ADNK19', 2, '2025-11-06 00:10:14', '2025-11-06 00:10:14'),
(65, 'tdRdNp1gGg', '1001', NULL, 'ADNK20', 2, '2025-11-06 00:10:16', '2025-11-06 00:10:16'),
(66, 'vv1a36zEY8', '1001', NULL, 'ADNK21', 2, '2025-11-06 00:10:17', '2025-11-06 00:10:17'),
(67, 'ZUV4eQEAaS', '1001', NULL, 'ADNK22', 2, '2025-11-06 00:10:18', '2025-11-06 00:10:18'),
(68, 'LARHj1q1Ms', '1001', NULL, 'ADNK23', 3, '2025-11-06 00:10:20', '2025-11-06 00:10:20'),
(69, 'QAnZxKrS6i', '1001', NULL, 'ADNK24', 1, '2025-11-06 00:10:21', '2025-11-06 00:10:21'),
(70, 'GFw7b6VKHH', '1001', NULL, 'ADNK25', 2, '2025-11-06 00:10:23', '2025-11-06 00:10:23'),
(71, 'GxcaOvL4JE', '1001', NULL, 'ADNK26', 3, '2025-11-06 00:10:24', '2025-11-06 00:10:24'),
(72, 'uK2cyUWrTo', '1001', NULL, 'ADNK27', 3, '2025-11-06 00:10:25', '2025-11-06 00:10:25'),
(73, 'bTo2FbZP7T', '1001', NULL, 'ADNK28', 3, '2025-11-06 00:10:26', '2025-11-06 00:10:26'),
(74, 'FL2xuQ7cNQ', '1001', NULL, 'ADNK29', 3, '2025-11-06 00:10:27', '2025-11-06 00:10:27'),
(75, 'XERhQALtTi', '1001', NULL, 'ADNK30', 1, '2025-11-06 00:10:28', '2025-11-06 00:10:28'),
(76, 'Rd453Mbjje', '1001', NULL, 'ADNK31', 3, '2025-11-06 00:10:29', '2025-11-06 00:10:29'),
(77, 'ra92BrCFNy', '1001', NULL, 'ADNK32', 3, '2025-11-06 00:10:31', '2025-11-06 00:10:31'),
(78, 'ea7RZIPaoG', '1001', NULL, 'ADNK33', 1, '2025-11-06 00:10:32', '2025-11-06 00:10:32'),
(79, 'As6qoEM1iw', '1001', NULL, 'ADNK34', 3, '2025-11-06 00:10:34', '2025-11-06 00:10:34'),
(80, 'HX6N5ejzi4', '1001', NULL, 'ADNK35', 3, '2025-11-06 00:10:35', '2025-11-06 00:10:35'),
(81, 'pAod7eOLZD', '1001', NULL, 'ADNK36', 3, '2025-11-06 00:10:36', '2025-11-06 00:10:36'),
(82, 'Hv3klUCejV', '1001', NULL, 'ADNK37', 3, '2025-11-06 00:10:37', '2025-11-06 00:10:37'),
(83, 'LeCfmxTCXc', '1001', NULL, 'ADNK38', 3, '2025-11-06 00:10:39', '2025-11-06 00:10:39'),
(84, 'v5okTeO9ox', '1001', NULL, 'ADNK39', 3, '2025-11-06 00:10:40', '2025-11-06 00:10:40'),
(85, 'dEBp71kKF3', '1001', NULL, 'ADNK40', 3, '2025-11-06 00:10:41', '2025-11-06 00:10:41'),
(86, '5XimF87LE9', '1001', NULL, 'ADNK41', 3, '2025-11-06 00:10:42', '2025-11-06 00:10:42'),
(87, '1PfeYgPFNH', '1001', NULL, 'ADNK42', 3, '2025-11-06 00:10:43', '2025-11-06 00:10:43'),
(88, 'ffzyGyBAPf', '1001', NULL, 'ADNK43', 3, '2025-11-06 00:10:44', '2025-11-06 00:10:44'),
(89, 'xJDqbU2Tnh', '1001', NULL, 'ADNK44', 3, '2025-11-06 00:10:45', '2025-11-06 00:10:45'),
(90, 'ins6guqav6', '1002', NULL, 'ADNK01', 3, '2025-11-07 02:29:09', '2025-11-07 02:29:09'),
(91, 'bp7tF2EKmR', '1002', NULL, 'ADNK02', 3, '2025-11-07 02:29:12', '2025-11-07 02:29:12'),
(92, 'i7nj5Gew3E', '1002', NULL, 'ADNK03', 3, '2025-11-07 02:29:16', '2025-11-07 02:29:16'),
(93, 'rpGftgAekP', '1002', NULL, 'ADNK04', 3, '2025-11-07 02:29:18', '2025-11-07 02:29:18'),
(94, 'oX1HcNzbcW', '1002', NULL, 'ADNK05', 3, '2025-11-07 02:29:19', '2025-11-07 02:29:19'),
(95, 'NhM0ibcaEL', '1002', NULL, 'ADNK06', 3, '2025-11-07 02:29:20', '2025-11-07 02:29:20'),
(96, 'HTCfz45YET', '1002', NULL, 'ADNK07', 3, '2025-11-07 02:29:22', '2025-11-07 02:29:22'),
(97, 'HI4cV7C9zv', '1002', NULL, 'ADNK08', 3, '2025-11-07 02:29:23', '2025-11-07 02:29:23'),
(98, 'qSHslo3X8p', '1002', NULL, 'ADNK09', 3, '2025-11-07 02:29:25', '2025-11-07 02:29:25'),
(99, 'phC8xyaNVl', '1002', NULL, 'ADNK10', 3, '2025-11-07 02:29:31', '2025-11-07 02:29:31'),
(100, 'pDbfDItQCZ', '1002', NULL, 'ADNK11', 3, '2025-11-07 02:29:43', '2025-11-07 02:29:43'),
(101, 'wvPki8qDyT', '1002', NULL, 'ADNK12', 3, '2025-11-07 02:29:48', '2025-11-07 02:29:48'),
(102, 'rmrakeJ4PK', '1002', NULL, 'ADNK13', 3, '2025-11-07 02:29:49', '2025-11-07 02:29:49'),
(103, 'wjxNGPwtqr', '1002', NULL, 'ADNK14', 3, '2025-11-07 02:29:51', '2025-11-07 02:29:51'),
(104, 'AA4cahQfJX', '1002', NULL, 'ADNK15', 3, '2025-11-07 02:29:55', '2025-11-07 02:29:55'),
(105, 'JbrfysaMLN', '1002', NULL, 'ADNK16', 3, '2025-11-07 02:29:57', '2025-11-07 02:29:57'),
(106, 'dsycxtKdPb', '1002', NULL, 'ADNK17', 3, '2025-11-07 02:29:59', '2025-11-07 02:29:59'),
(107, 'fQzRqjGiDT', '1002', NULL, 'ADNK18', 3, '2025-11-07 02:30:01', '2025-11-07 02:30:01'),
(108, 'sWbC8W3UlK', '1002', NULL, 'ADNK19', 3, '2025-11-07 02:30:02', '2025-11-07 02:30:02'),
(109, 'APUFR1zeCl', '1002', NULL, 'ADNK20', 3, '2025-11-07 02:30:03', '2025-11-07 02:30:03'),
(110, '8wvpYQHs4n', '1002', NULL, 'ADNK21', 1, '2025-11-07 02:30:05', '2025-11-07 02:30:05'),
(111, 'fvr4wcDBQc', '1002', NULL, 'ADNK22', 2, '2025-11-07 02:30:06', '2025-11-07 02:30:06'),
(112, '3aqhI9ckzU', '1002', NULL, 'ADNK23', 1, '2025-11-07 02:30:07', '2025-11-07 02:30:07'),
(113, 'Fy1tyubxzC', '1002', NULL, 'ADNK24', 2, '2025-11-07 02:30:09', '2025-11-07 02:30:09'),
(114, 'YxnTtdC1vY', '1002', NULL, 'ADNK25', 1, '2025-11-07 02:30:10', '2025-11-07 02:30:10'),
(115, 'oHcjEzgeSL', '1002', NULL, 'ADNK26', 2, '2025-11-07 02:30:12', '2025-11-07 02:30:12'),
(116, 'Y06mlWsSuz', '1002', NULL, 'ADNK27', 2, '2025-11-07 02:30:16', '2025-11-07 02:30:16'),
(117, 'C7rQVUGTwu', '1002', NULL, 'ADNK28', 1, '2025-11-07 02:30:17', '2025-11-07 02:30:17'),
(118, 'u7hdDXT64p', '1002', NULL, 'ADNK29', 2, '2025-11-07 02:30:19', '2025-11-07 02:30:19'),
(119, 'NllaVpgl0M', '1002', NULL, 'ADNK30', 1, '2025-11-07 02:30:20', '2025-11-07 02:30:20'),
(120, 'gxchjXMFWz', '1002', NULL, 'ADNK31', 3, '2025-11-07 02:30:21', '2025-11-07 02:30:21'),
(121, 'bewSwugZa0', '1002', NULL, 'ADNK32', 3, '2025-11-07 02:30:23', '2025-11-07 02:30:23'),
(122, 'tJ4n1b9pkg', '1002', NULL, 'ADNK33', 3, '2025-11-07 02:30:24', '2025-11-07 02:30:24'),
(123, 'Frplh7GNR8', '1002', NULL, 'ADNK34', 2, '2025-11-07 02:30:25', '2025-11-07 02:30:25'),
(124, 'kbBoHXag6b', '1002', NULL, 'ADNK35', 2, '2025-11-07 02:30:27', '2025-11-07 02:30:27'),
(125, 'bZZqG7RBBZ', '1002', NULL, 'ADNK36', 1, '2025-11-07 02:30:28', '2025-11-07 02:30:28'),
(126, '9EfxhNPovW', '1002', NULL, 'ADNK37', 2, '2025-11-07 02:30:29', '2025-11-07 02:30:29'),
(127, 'yDand2kdB3', '1002', NULL, 'ADNK38', 2, '2025-11-07 02:30:30', '2025-11-07 02:30:30'),
(128, 'OlfLzI2CrO', '1002', NULL, 'ADNK39', 2, '2025-11-07 02:30:32', '2025-11-07 02:30:32'),
(129, 'A7H1ATi7Tf', '1002', NULL, 'ADNK40', 2, '2025-11-07 02:30:33', '2025-11-07 02:30:33'),
(130, 'ULVhUBY1Of', '1002', NULL, 'ADNK41', 2, '2025-11-07 02:30:34', '2025-11-07 02:30:34'),
(131, 'M03zzZV4PD', '1002', NULL, 'ADNK42', 3, '2025-11-07 02:30:36', '2025-11-07 02:30:36'),
(132, 'cRrHjsyYgX', '1002', NULL, 'ADNK43', 1, '2025-11-07 02:30:38', '2025-11-07 02:30:38'),
(133, 'gfMDzyCEiH', '1002', NULL, 'ADNK44', 1, '2025-11-07 02:30:39', '2025-11-07 02:30:39'),
(134, 'I5socRPuZs', '1003', 'Timbul Dabukke', 'ADNK01', 1, '2025-11-07 05:36:33', '2025-11-07 05:47:01'),
(135, 'omSgIDbY2t', '1003', 'Timbul Dabukke', 'ADNK02', 1, '2025-11-07 05:36:36', '2025-11-07 05:47:01'),
(136, 'gNeOE50cXn', '1003', 'Timbul Dabukke', 'ADNK04', 2, '2025-11-07 05:36:39', '2025-11-07 05:47:01'),
(137, 'WAhm60qqq3', '1003', 'Timbul Dabukke', 'ADNK03', 2, '2025-11-07 05:36:44', '2025-11-07 05:47:01'),
(138, 'gqFA18nXjx', '1003', 'Timbul Dabukke', 'ADNK05', 3, '2025-11-07 05:36:47', '2025-11-07 05:47:01'),
(139, 'cd9ErW4C03', '1004', 'Syahrini Wulan Maryati', 'ADNK01', 1, '2025-11-07 05:47:35', '2025-11-07 05:47:47'),
(140, '78MbgEXmJI', '1004', 'Syahrini Wulan Maryati', 'ADNK02', 1, '2025-11-07 05:47:37', '2025-11-07 05:47:47'),
(141, 'AOKAegT1Rw', '1004', 'Syahrini Wulan Maryati', 'ADNK03', 2, '2025-11-07 05:47:38', '2025-11-07 05:47:47'),
(142, 'Kleh74gucW', '1004', 'Syahrini Wulan Maryati', 'ADNK04', 3, '2025-11-07 05:47:40', '2025-11-07 05:47:47'),
(143, 'M3IZNDq2a1', '1004', 'Syahrini Wulan Maryati', 'ADNK05', 2, '2025-11-07 05:47:41', '2025-11-07 05:47:47'),
(144, 'l6PoHsSP8I', '1004', 'Syahrini Wulan Maryati', 'ADNK06', 1, '2025-11-07 05:47:43', '2025-11-07 05:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(2, 'A', 'Anda dengan kecenderungan gaya belajar visual. \r\nAnda akan mencapai prestasi belajar yang optimal apabila memanfaatkan kemampuan visual Anda.\r\nAnda dapat membuat sendiri peta konsep atau ringkasan materi perkuliahan.', '2025-11-05 03:25:47', '2025-11-05 03:25:47'),
(3, 'B', 'Anda memiliki kecenderungan gaya belajar auditori.\r\nAnda yang memiliki kecenderungan gaya belajar auditori akan mencapai prestasi belajar yang optimal apabila Anda mempelajari materi perkuliahan dari mendengarkan baik melalui penjelasan langsung dari dosen, diskusi dengan dosen dan teman mahasiswa, maupun melalui rekaman materi yang sedang dipelajari.', '2025-11-05 03:25:47', '2025-11-05 03:25:47'),
(4, 'C', 'Anda memiliki kecenderungan gaya belajar kinestetik.\r\nAnda dengan gaya belajar kinestetik akan mencapai prestasi belajar secara optimal apabila Anda terlibat langsung secara fisik dalam kegiatan belajar.\r\nAnda dapat mengutak-atik atau memanipulasi materi perkuliahan atau media yang digunakan dalam menjelaskan materi perkuliahan.', '2025-11-05 03:25:47', '2025-11-05 03:25:47'),
(5, 'A dan B', 'Anda memiliki gabungan gaya belajar visual dan auditori.\r\nAda hal tertentu yang Anda akan belajar efektif jika menggunakan gaya belajar visual, dan ada hal lain yang Anda akan belajar efektif jika menggunakan gaya belajar auditori.\r\nBahkan, kadang jika kedua gaya belajar digunakan, akan lebih optimal.', '2025-11-05 03:25:47', '2025-11-05 03:25:47'),
(6, 'A dan C', 'Anda memiliki gabungan gaya belajar visual dan kinestetik.\r\nAda hal tertentu yang Anda akan belajar efektif jika menggunakan gaya belajar visual, dan ada hal lain yang Anda akan belajar efektif jika menggunakan gaya belajar kinestetik.\r\nBahkan, kadang jika kedua gaya belajar digunakan, akan lebih optimal.', '2025-11-05 03:25:47', '2025-11-05 03:25:47'),
(7, 'B dan C', 'Anda memiliki gabungan gaya belajar auditori dan kinestetik.\r\nAda hal tertentu yang Anda akan belajar efektif jika menggunakan gaya belajar auditori, dan ada hal lain yang Anda akan belajar efektif jika menggunakan gaya belajar kinestetik.\r\nBahkan, kadang jika kedua gaya belajar digunakan, akan lebih optimal.', '2025-11-05 03:25:47', '2025-11-05 03:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_10_31_003843_create_questions_table', 1),
(5, '2025_10_31_004406_create_answers_table', 1),
(6, '2025_11_03_023440_create_siswa_table', 1),
(7, '2025_11_03_055710_create_categories_table', 1),
(8, '2025_11_07_123742_add_nama_siswa_to_answers_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint UNSIGNED NOT NULL,
  `id_soal` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_option_a` int NOT NULL,
  `option_a` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_option_b` int NOT NULL,
  `option_b` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_option_c` int NOT NULL,
  `option_c` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` enum('A','B','C') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `id_soal`, `question_text`, `id_option_a`, `option_a`, `id_option_b`, `option_b`, `id_option_c`, `option_c`, `category`, `created_at`, `updated_at`) VALUES
(2, 'ADNK01', 'Pada waktu belajar untuk Penilaian atau Ulangan Harian,Penilaian tengah semester dan Penilaian akhir semester apakah anda memilih :', 1, 'membaca catatan, membaca judul dan sub-judul dalam buku, dan melihat diagram dan ilustrasi', 2, 'meminta seseorang memberi anda pertanyaan, atau menghafal dalam hati sendirian', 3, 'membuat catatan pada kartu dan membuat model atau diagram', 'A', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(3, 'ADNK02', 'Apa yang kalian lakukan sewaktu anda mendengarkan musik?', 1, 'berkhayal melihat benda-benda yang sesuai dengan musik yang sedang didengarkan', 2, 'berdendang mengikuti alunan musik tersebut', 3, 'bergerak mengikuti musik tersebut, mengetukkan kaki mengikuti irama, dsb.', 'A', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(4, 'ADNK03', 'Pada waktu kalian sedang memecahkan masalah,apakah anda :', 1, 'membuat daftar, mengatur langkah, dan mengeceknya setelah langkah itu dikerjakan', 2, 'menelpon teman atau ahli untuk membicarakan masalah tersebut', 3, 'menguraikan (menganalisa) masalah itu atau melakukan semua langkah yang anda pikirkan', 'A', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(5, 'ADNK04', 'Jika kalian membaca untuk sekedar hiburan ,apakah kalian memilih:', 1, 'buku perjalanan dengan banyak gambar di dalamnya', 2, 'cerita misteri yang penuh dengan percakapan di dalamnya', 3, 'buku yang dapat menjawab pertanyaan dan memecahkan masalah anda', 'A', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(6, 'ADNK05', 'Untuk mempelajari bagaimana kerja komputer,apakah anda memilih :', 1, 'menonton film tentang cara kerja computer', 2, 'mendengarkan seseorang menjelaskan cara keja computer', 3, 'membongkar komputer dan mencoba menemukan sendiri cara kerjanya', 'A', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(7, 'ADNK06', 'Anda baru saja memasuki museum ilmu pengetahuan,seperti taman pintar,Tekno park,dll apa yang anda lakukan pertama kali?', 1, 'melihat sekeliling dan menemukan peta yang menunjukkan lokasi berbagai benda yang dipamerkan', 2, 'berbicara dengan penjaga museum dan bertanya kepadanya tentang benda-benda yang dipamerkan', 3, 'melihat pada benda pertama yang kelihatan menarik, dan baru kemudian membaca petunjuk lokasi benda-benda lainnya', 'A', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(8, 'ADNK07', 'Jenis restoran atau rumah makan apa yang anda tidak sukai?', 1, 'restoran yang lampunya terlalu terang', 2, 'restoran yang musiknya terlalu keras', 3, 'restoran yang kursinya tidak nyaman', 'A', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(9, 'ADNK08', 'Apa kira – kira yang anda lakukan pada waktu kalian merasa senang?', 1, 'meringis (tersenyum)', 2, 'berteriak dengan senang', 3, 'melompat dengan senang', 'A', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(10, 'ADNK09', 'Seandainya anda berada pada suatu acara pesta,entah pernikahan atau yang lainnya,apa yang akan kira – kira paling anda ingat pada keesokan harinya?', 1, 'muka orang-orang dalam pesta, tetapi bukan namanya', 2, 'nama orang-orang dalam pesta, tetapi bukan mukanya', 3, 'sesuatu yang anda lakukan dan katakan selama dalam pesta', 'A', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(11, 'ADNK10', 'Pada waktu kalian bercerita,apakan anda memilih untuk:', 1, 'menulisnya', 2, 'menceritakannya dengan suara keras', 3, 'memerankannya', 'A', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(12, 'ADNK11', 'Apa yang paling mengganggu bagi kalian pada waktu anda mencoba untuk berkonsentrasi?', 1, 'gangguan visual', 2, 'suara gaduh', 3, 'gangguan lainnya seperti rasa lapar, sepatu yang sempit, atau rasa khawatir', 'A', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(13, 'ADNK12', 'Apa yang kira – kira anda lakukan ketika kalian sedang marah?', 1, 'cemberut atau memperlihatkan muka marah', 2, 'berteriak atau “mengamuk”', 3, 'menghentakkan kaki dengan keras dan membanting pintu', 'A', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(14, 'ADNK13', 'Apa yang kira – kira kalian lakukan ,jika anda sedang antre untuk menonton Bioskop?', 1, 'melihat-lihat pada poster iklan film lainnya', 2, 'berbicara dengan orang di sebelah anda', 3, 'mengetukkan kaki atau berjalan ke arah lain', 'A', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(15, 'ADNK14', 'Apakah anda lebih suka mengikuti :', 1, 'kelas melukis', 2, 'kelas music', 3, 'kelas olah raga', 'A', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(16, 'ADNK15', 'Pada waktu belajar untuk tes, apakah anda memilih', 1, 'membaca catatan, membaca judul dan sub-judul dalam buku, dan melihat diagram dan ilustrasi', 2, 'meminta seseorang memberi anda pertanyaan, atau menghafal dalam hati sendirian', 3, 'membuat catatan pada kartu dan membuat model atau diagram', 'B', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(17, 'ADNK16', 'Apa yang anda lakukan pada waktu mendengarkan musik?', 1, 'berkhayal (melihat benda-benda yang sesuai dengan musik yang sedang didengarkan)', 2, 'berdendang mengikuti alunan musik tersebut', 3, 'bergerak mengikuti musik tersebut, mengetukkan kaki mengikuti irama, dsb', 'B', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(18, 'ADNK17', 'Pada waktu anda memecahkan masalah, apakah anda', 1, 'membuat daftar, mengatur langkah, dan mengeceknya setelah langkah itu dikerjakan', 2, 'menelpon teman atau ahli untuk membicarakan masalah tersebut', 3, 'menguraikan (menganalisa) masalah itu atau melakukan semua langkah yang anda pikirkan', 'B', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(19, 'ADNK18', 'Jika anda ingin membaca untuk hiburan, apakah anda memilih', 1, 'buku perjalanan dengan banyak gambar di dalamnya', 2, 'cerita misteri yang penuh dengan percakapan di dalamnya', 3, 'buku yang dapat menjawab pertanyaan dan memecahkan masalah anda', 'B', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(20, 'ADNK19', 'Untuk mempelajari bagaimana cara kerja komputer, apakah anda memilih', 1, 'menonton film tentang cara kerja computer', 2, 'mendengarkan seseorang menjelaskan cara keja computer', 3, 'membongkar komputer dan mencoba menemukan sendiri cara kerjanya', 'B', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(21, 'ADNK20', 'Anda baru saja memasuki museum ilmu pengetahuan, apa yang anda lakukan pertama kali?', 1, 'melihat sekeliling dan menemukan peta yang menunjukkan lokasi berbagai benda yang dipamerkan', 2, 'berbicara dengan penjaga museum dan bertanya kepadanya tentang benda-benda yang dipamerkan', 3, 'melihat pada benda pertama yang kelihatan menarik, dan baru kemudian membaca petunjuk lokasi benda-benda lainnya', 'B', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(22, 'ADNK21', 'Jenis restoran apa yang tidak anda sukai?', 1, 'restoran yang lampunya terlalu terang', 2, 'restoran yang musiknya terlalu keras', 3, 'restoran yang kursinya tidak nyaman', 'B', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(23, 'ADNK22', 'Apakah anda lebih suka mengikuti', 1, 'kelas melukis', 2, 'kelas music', 3, 'kelas olah raga', 'B', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(24, 'ADNK23', 'Apa yang kira-kira anda lakukan pada waktu anda merasa senang?', 1, 'meringis (tersenyum)', 2, 'berteriak dengan senang', 3, 'melompat dengan senang', 'B', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(25, 'ADNK24', 'Seandainya anda berada pada suatu pesta, apa yang kira-kira akan paling anda ingat pada keesokan harinya?', 1, 'muka orang-orang dalam pesta, tetapi bukan namanya', 2, 'nama orang-orang dalam pesta, tetapi bukan mukanya', 3, 'sesuatu yang anda lakukan dan katakan selama dalam pesta', 'B', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(26, 'ADNK25', 'Pada waktu anda bercerita, apakah anda memilih untuk', 1, 'menulisnya', 2, 'menceritakannya dengan suara keras', 3, 'memerankannya', 'B', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(27, 'ADNK26', 'Apa yang paling mengganggu bagi anda pada waktu anda mencoba untuk berkonsentrasi?', 1, 'gangguan visual', 2, 'suara gaduh', 3, 'gangguan lainnya seperti rasa lapar, sepatu yang sempit, atau rasa khawatir', 'B', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(28, 'ADNK27', 'Apa yang kira-kira anda lakukan pada waktu anda marah?', 1, 'cemberut atau memperlihatkan muka marah', 2, 'berteriak atau “mengamuk”', 3, 'menghentakkan kaki dengan keras dan membanting pintu', 'B', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(29, 'ADNK28', 'Apa yang kira-kira akan anda lakukan pada waktu berdiri menunggu antrian di gedung bioskop?', 1, 'melihat-lihat pada poster iklan film lainnya', 2, 'berbicara dengan orang di sebelah anda', 3, 'mengetukkan kaki atau berjalan ke arah lain', 'B', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(30, 'ADNK29', 'Ketika berbicara, kecenderungan gaya bicara saya...', 1, 'Cepat', 2, 'Berirama', 3, 'Lambat', 'C', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(31, 'ADNK30', 'Saya...', 1, 'Mampu merencanakan dan mengatur kegiatan jangka panjang dengan baik', 2, 'Mampu mengulang dan menirukan nada, perubahan, dan warna suara', 3, 'Mahir dalam mengerjakan puzzle, teka-teki, menyusun potongan-potongan Gambar', 'C', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(32, 'ADNK31', '3.	Saya dapat mengingat dengan baik informasi yang...', 1, 'Tertulis di papan tulis atau yang diberikan melalui tugas membaca', 2, 'Disampaikan melalui penjelasan guru, diskusi, atau rekaman', 3, 'Diberikan dengan cara menuliskannya berkali-kali', 'C', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(33, 'ADNK32', 'Saya menghafal sesuatu...', 1, 'Dengan membayangkannya', 2, 'Dengan mengucapkannya dengan suara yang keras', 3, 'Sambil berjalan dan melihat-lihat keadaan sekeliling', 'C', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(34, 'ADNK33', 'Saya merasa sulit...', 1, 'Mengingat perintah lisan kecuali jika dituliskan', 2, 'Menulis tetapi pandai bercerita', 3, 'Duduk tenang untuk waktu yang lama', 'C', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(35, 'ADNK34', 'Saya lebih suka...', 1, 'Membaca daripada dibacakan', 2, 'Mendengar daripada membaca', 3, 'Menggunakan model dan praktek atau praktikum', 'C', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(36, 'ADNK35', 'Saya suka...', 1, 'Mencoret-coret selama menelepon, mendengarkan musik, atau menghadiri rapat', 2, 'Membaca keras-keras dan mendengarkan musik/pembicaraan', 3, 'Mengetuk-ngetuk pena, jari, atau kaki saat mendengarkan musik/pembicaraan', 'C', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(37, 'ADNK36', 'Saya lebih suka melakukan...', 1, 'Demonstrasi daripada berpidato', 2, 'Diskusi dan berbicara panjang lebar', 3, 'Berolahraga dan kegiatan fisik lainnya', 'C', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(38, 'ADNK37', 'Saya lebih menyukai...', 1, 'Seni rupa daripada musik', 2, 'Musik daripada seni rupa', 3, 'Olahraga dan kegiatan fisik lainnya', 'C', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(39, 'ADNK38', 'Ketika mengerjakan sesuatu, saya selalu...', 1, 'Mengikuti petunjuk dan gambar yang disediakan', 2, 'Membicarakan dengan orang lain atau berbicara sendiri keras-keras', 3, 'Mencari tahu cara kerjanya sambil mengerjakannya', 'C', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(40, 'ADNK39', 'Konsentrasi saya terganggu oleh...', 1, 'Ketidakteraturan atau gerakan', 2, 'suara atau keributan', 3, 'Kegiatan di sekeliling', 'C', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(41, 'ADNK40', 'Saya lebih mudah belajar melalui kegiatan...', 1, 'Membaca', 2, 'Mendengarkan dan berdiskusi', 3, 'Praktek atau praktikum', 'C', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(42, 'ADNK41', 'Saya berbicara dengan...', 1, 'Singkat dan tidak senang mendengarkan pembicaraan panjang', 2, 'Cepat dan senang mendengarkan', 3, 'Menggunakan isyarat tubuh dan gerakan-gerakan ekspresif', 'C', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(43, 'ADNK42', 'Untuk mengetahui suasana hati seseorang, saya …', 1, 'Melihat ekspresi wajahnya', 2, 'Mendengarkan nada suara', 3, 'Memperhatikan gerakan badannya', 'C', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(44, 'ADNK43', 'Untuk mengisi waktu luang, saya lebih suka ...', 1, 'Menonton televisi atau menyaksikan pertunjukan', 2, 'Mendengarkan radio, musik, atau membaca', 3, 'Melakukan permainan atau bekerja dengan menggunakan tangan', 'C', '2025-11-05 06:44:42', '2025-11-05 06:44:42'),
(45, 'ADNK44', 'Ketika mengajarkan sesuatu kepada orang lain, saya lebih suka ...', 1, 'Menunjukkannya', 2, 'Menceritakannya', 3, 'Mendemonstrasikannya dan meminta mereka untuk mencobanya', 'C', '2025-11-05 06:44:42', '2025-11-05 06:44:42');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('kLZ7b5YpTn4ipLODi2XBMPLnUwxxhxRnNHlO5J2w', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibFRRU3F1WmpsSHVXRGY0REZQUnBtMk5ZUXVSdE0xV0ZLUGV3NlFEaCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJuaXMiO3M6NDoiMTAwNCI7fQ==', 1762494470);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint UNSIGNED NOT NULL,
  `nis` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_siswa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama_siswa`, `kelas`, `created_at`, `updated_at`) VALUES
(2, '1000', 'Ozy Putra', 'X', '2025-11-05 06:54:10', '2025-11-05 06:54:10'),
(3, '1001', 'Indah Safitri', 'X', '2025-11-06 00:09:43', '2025-11-06 00:09:43'),
(4, '1002', 'Salimah Nasyiah', 'X', '2025-11-07 02:29:03', '2025-11-07 02:29:03'),
(6, '1003', 'Timbul Dabukke', 'X', '2025-11-07 05:36:29', '2025-11-07 05:36:29'),
(7, '1004', 'Syahrini Wulan Maryati', 'X', '2025-11-07 05:47:31', '2025-11-07 05:47:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Super Admin', 'superadmin@smksa.com', '2025-11-05 03:19:13', '$2y$12$f.vp/Arzr3atAtdtkmEtnehFQEcMK4D7kq0M/766URevoEkUc7JNe', 'ZaUXxiCU6t1REpGzL3XDQyEhwcWTfrkTI7ITaEswpJoBkQZxQoDQkOXsm7yn', '2025-11-05 03:19:13', '2025-11-05 03:19:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `answers_answer_code_unique` (`answer_code`),
  ADD KEY `answers_id_soal_foreign` (`id_soal`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `questions_id_soal_unique` (`id_soal`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswa_nis_unique` (`nis`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_id_soal_foreign` FOREIGN KEY (`id_soal`) REFERENCES `questions` (`id_soal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
