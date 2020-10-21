-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 25, 2019 at 02:37 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `design`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_status` int(11) NOT NULL DEFAULT '0',
  `image` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `email`, `password`, `contact`, `account_status`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@g.c', '$2y$10$HxCNYZKFMRuUguYVyqi79eB8a0BMCh9.Ml6/1F6rlE6TcBysHf2qO', '1234567890', 0, '1561978473.jpg', 'qipS8y5l33mfSuOX9OiTOIL16xQddidK9Rj8qdF5PYLAuc8r3e4W3uIKQUFp', '2019-06-26 00:26:42', '2019-06-26 00:26:42'),
(4, 'appukuttan', 'appu@g.c', '$2y$10$FBwlDc0A2Hv1vHW0vzCPzOTyAWmcCE/f3rvS9bBvv0ynfTNkXFO7O', '1234567890', 0, '1561978473.jpg', NULL, '2019-06-28 22:22:56', '2019-06-28 22:22:56'),
(5, 'anju', 'anju@g.c', '$2y$10$98w2FTRxNZdmeHLRoFWVe.37oMYwRZVJf1g61fuzx0Dxun.ecIiba', '1234567890', 0, '1561978473.jpg', NULL, '2019-06-28 22:25:02', '2019-06-28 22:25:02');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `app_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `job_id` int(10) UNSIGNED NOT NULL,
  `employeer_id` int(10) UNSIGNED NOT NULL,
  `app_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `interview_date` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`app_id`, `user_id`, `job_id`, `employeer_id`, `app_status`, `status`, `created_at`, `updated_at`, `interview_date`) VALUES
(1, 1, 1, 1, '1', 0, '2019-07-05 23:24:27', '2019-07-10 04:00:30', '12 July 2019 - 15:15'),
(5, 2, 1, 1, '0', 0, '2019-07-06 04:12:06', '2019-07-09 03:25:08', '18 July 2019 - 15:30'),
(11, 5, 2, 1, '1', 0, '2019-07-11 22:13:16', '2019-07-11 22:17:42', '19 July 2019 - 18:30'),
(13, 5, 1, 1, '0', 0, '2019-07-11 23:24:13', '2019-07-11 23:24:13', NULL),
(19, 1, 2, 1, '0', 0, '2019-07-15 00:29:23', '2019-07-15 00:29:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Call center', '2019-06-27 04:25:45', '2019-06-27 04:25:45', 0),
(2, 'plumbing', '2019-07-03 04:03:01', '2019-07-03 04:03:01', 0),
(3, 'electrical', '2019-07-03 04:03:14', '2019-07-03 04:03:14', 0),
(4, 'Technical', '2019-07-08 03:10:54', '2019-07-08 03:10:54', 0),
(5, 'Data entry', '2019-07-08 03:11:15', '2019-07-08 03:11:15', 0),
(6, 'Accounting', '2019-07-08 03:11:32', '2019-07-08 03:11:32', 0),
(7, 'Management', '2019-07-08 03:11:47', '2019-07-08 03:11:47', 0),
(8, 'Engenearing', '2019-07-08 03:12:06', '2019-07-08 03:12:06', 0),
(9, 'physial', '2019-07-08 03:12:28', '2019-07-08 03:12:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `district_id` int(10) UNSIGNED NOT NULL,
  `state_id` int(10) UNSIGNED NOT NULL,
  `district_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`district_id`, `state_id`, `district_name`, `updated_at`, `created_at`) VALUES
(1, 1, 'Kozhikode', '2019-06-27 01:52:10', '2019-06-27 01:52:10'),
(2, 1, 'WAYANAD', '2019-06-29 01:55:21', '2019-06-29 01:55:21');

-- --------------------------------------------------------

--
-- Table structure for table `employeers`
--

CREATE TABLE `employeers` (
  `employeer_id` int(10) UNSIGNED NOT NULL,
  `employeer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_status` int(11) NOT NULL DEFAULT '0',
  `aproval_status` int(11) NOT NULL DEFAULT '0',
  `employeer_cirtificate` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nation_id` int(10) UNSIGNED NOT NULL,
  `state_id` int(10) UNSIGNED NOT NULL,
  `district_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employeers`
--

INSERT INTO `employeers` (`employeer_id`, `employeer_name`, `email`, `password`, `about`, `contact`, `account_status`, `aproval_status`, `employeer_cirtificate`, `nation_id`, `state_id`, `district_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'cmc pvt ltd', 'emp1@g.c', '$2y$10$J2APuw6ROgq6NYYdVa.JaeV5ZREtQj2vW9bBiEdT3JFYOqq0j2T3S', 'emp', '1234567890', 0, 1, '1562914644.pdf', 1, 1, 1, '701CjpMS7Ff9wU4DHrRodFmKtJdufueUgumAA2TevrcIWqJT60xkWQLhFduF', '2019-07-02 06:25:59', '2019-07-12 01:27:24'),
(2, 'emp2', 'emp2@g.c', '$2y$10$tFxI4sM2dNrCtlyWZl/Joe/HkT/dKZiD2ZT5GkU73hn0W5n1QqbS.', 'emp2', '1234567890', 0, 1, '/tmp/php7kgFfn', 1, 1, 1, 'tXeqM9Q61q7xy0Brggh5sL7bfXgXrgTnryelBkEO16Cjkx6ldgeB6QMJTzE5', '2019-07-04 04:13:23', '2019-07-04 22:08:41'),
(3, 'emp3', 'emp3@g.c', '$2y$10$isx3mxCacKBsxisHgJpPZemYhuC.2CmBeybbO/3pUq.wI29EMI9g6', 'emp3', '1234567890', 0, 0, '/tmp/phpOn0WDK', 1, 1, 1, NULL, '2019-07-04 04:31:54', '2019-07-04 06:11:31');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(10) UNSIGNED NOT NULL,
  `employeer_id` int(10) UNSIGNED NOT NULL,
  `job_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_discription` longblob NOT NULL,
  `quali_id_1` int(10) UNSIGNED NOT NULL,
  `subject_id_1` int(10) UNSIGNED NOT NULL,
  `quali_id_2` int(10) UNSIGNED DEFAULT NULL,
  `subject_id_2` int(10) UNSIGNED DEFAULT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `sub_cat_id` int(10) UNSIGNED DEFAULT NULL,
  `nation_id` int(10) UNSIGNED NOT NULL,
  `state_id` int(10) UNSIGNED NOT NULL,
  `district_id` int(10) UNSIGNED NOT NULL,
  `experience` int(255) NOT NULL DEFAULT '0',
  `job_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` int(11) NOT NULL,
  `job_status` int(11) NOT NULL DEFAULT '0',
  `verification_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `employeer_id`, `job_name`, `job_discription`, `quali_id_1`, `subject_id_1`, `quali_id_2`, `subject_id_2`, `cat_id`, `sub_cat_id`, `nation_id`, `state_id`, `district_id`, `experience`, `job_type`, `salary`, `job_status`, `verification_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'plumber', 0x506c756d62696e6720697320616e792073797374656d207468617420636f6e7665797320666c7569647320666f72206120776964652072616e6765206f66206170706c69636174696f6e732e20506c756d62696e6720757365732070697065732c2076616c7665732c20706c756d62696e672066697874757265732c2074616e6b732c20616e64206f7468657220617070617261747573657320746f20636f6e76657920666c756964732e48656174696e6720616e6420636f6f6c696e67202848564143292c2077617374652072656d6f76616c2c20616e6420706f7461626c652077617465722064656c69766572792061726520616d6f6e6720746865206d6f737420636f6d6d6f6e207573657320666f7220706c756d62696e672c20627574206974206973206e6f74206c696d6974656420746f207468657365206170706c69636174696f6e732e2054686520776f726420646572697665732066726f6d20746865204c6174696e20666f72206c6561642c20706c756d62756d2c2061732074686520666972737420656666656374697665207069706573207573656420696e2074686520526f6d616e206572612077657265206c6561642070697065732e, 2, 1, NULL, NULL, 2, NULL, 1, 1, 1, 2, '1', 120000, 0, 1, '2019-07-03 05:56:09', '2019-07-15 01:29:51'),
(2, 1, 'programmer', 0x4a6f62204465736372697074696f6e2e20412050485020446576656c6f70657220697320726573706f6e7369626c6520666f72206372656174696e6720616e6420696d706c656d656e74696e6720616e206172726179206f66205765622d62617365642070726f6475637473207573696e67205048502c204d7953514c2c20416a61782c20616e64204a6176615363726970742e20596f7520646576656c6f70206261636b2d656e6420636f6d706f6e656e74732c20636f6e6e65637420746865206170706c69636174696f6e2077697468206f74686572207765622073657276696365732c20616e64206173736973742066726f6e742d656e6420646576656c6f7065727320627920656e737572696e6720746865697220776f726b20696e7465677261746573207769746820746865206170706c69636174696f6e2e, 3, 5, NULL, NULL, 8, NULL, 1, 1, 1, 0, '1', 120000, 0, 1, '2019-07-08 03:17:20', '2019-07-08 03:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `job_preferences`
--

CREATE TABLE `job_preferences` (
  `pref_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `job_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quali_id_1` int(10) UNSIGNED NOT NULL,
  `subject_id_1` int(10) UNSIGNED NOT NULL,
  `quali_id_2` int(10) UNSIGNED DEFAULT NULL,
  `subject_id_2` int(10) UNSIGNED DEFAULT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `sub_cat_id` int(10) UNSIGNED DEFAULT NULL,
  `nation_id` int(10) UNSIGNED NOT NULL,
  `state_id` int(10) UNSIGNED NOT NULL,
  `district_id` int(10) UNSIGNED NOT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exp_salary` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_preferences`
--

INSERT INTO `job_preferences` (`pref_id`, `user_id`, `job_name`, `quali_id_1`, `subject_id_1`, `quali_id_2`, `subject_id_2`, `cat_id`, `sub_cat_id`, `nation_id`, `state_id`, `district_id`, `experience`, `job_type`, `exp_salary`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2', 2, 4, NULL, NULL, 2, 2, 1, 1, 2, '2', '1', 120000, 0, '2019-07-03 06:17:20', '2019-07-15 05:31:09'),
(2, 2, '1', 2, 3, NULL, NULL, 1, 1, 1, 1, 1, '5', '1', 130000, 0, '2019-07-06 03:20:43', '2019-07-06 03:20:43'),
(4, 5, '2', 3, 5, NULL, NULL, 8, NULL, 1, 1, 1, '2', '1', 120000, 0, '2019-07-11 01:16:30', '2019-07-11 01:16:30'),
(5, 5, '2', 7, 20, NULL, NULL, 8, NULL, 1, 1, 1, '2', '1', 120000, 0, '2019-07-11 01:16:59', '2019-07-11 03:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `job_views`
--

CREATE TABLE `job_views` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `job_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_views`
--

INSERT INTO `job_views` (`id`, `user_id`, `job_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-07-24 02:14:32', '2019-07-24 02:14:32'),
(2, 1, 2, '2019-01-24 06:29:18', '2019-07-24 06:29:18'),
(3, 5, 1, '2019-07-24 23:04:39', '2019-07-24 23:04:39'),
(4, 5, 2, '2019-07-24 23:04:46', '2019-07-24 23:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `user_type` int(11) NOT NULL,
  `view_status` int(11) NOT NULL DEFAULT '0',
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `ticket_id`, `user_type`, `view_status`, `message`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'hai user can you please provide more details about your complaint  ', NULL, '2019-07-17 04:32:11', '2019-07-17 04:32:11'),
(2, 2, 1, 1, 'hai user can you please provide more details about your complaint  ', NULL, '2019-07-17 06:04:31', '2019-07-17 06:04:31'),
(3, 3, 1, 1, 'hai Arjun can you please provide more details about your complaint  ', NULL, '2019-07-18 22:03:51', '2019-07-18 22:03:51'),
(4, 1, 1, 1, 'hai user can you please provide more details about your complaint  ', NULL, '2019-07-18 22:07:39', '2019-07-18 22:07:39'),
(5, 3, 3, 1, 'hai', NULL, '2019-07-19 01:06:56', '2019-07-19 01:06:56'),
(6, 3, 3, 1, 'hello', NULL, '2019-07-19 01:10:59', '2019-07-19 01:10:59'),
(7, 3, 3, 1, 'how  r u', NULL, '2019-07-19 04:39:24', '2019-07-19 04:39:24'),
(8, 3, 3, 1, 'hey', NULL, '2019-07-19 04:40:25', '2019-07-19 04:40:25'),
(9, 3, 3, 1, 'hloo', NULL, '2019-07-19 04:41:30', '2019-07-19 04:41:30'),
(10, 3, 1, 1, 'hai...', NULL, '2019-07-19 04:59:32', '2019-07-19 04:59:32'),
(11, 1, 3, 1, 'yes', NULL, '2019-07-19 05:47:28', '2019-07-19 05:47:28'),
(12, 1, 1, 1, 'enthokeya vishesham', NULL, '2019-07-19 05:47:52', '2019-07-19 05:47:52'),
(13, 1, 3, 1, 'hai', NULL, '2019-07-19 05:48:00', '2019-07-19 05:48:00'),
(14, 1, 3, 1, 'eey sugam', NULL, '2019-07-19 05:48:16', '2019-07-19 05:48:16'),
(15, 1, 1, 1, 'haa', NULL, '2019-07-19 05:48:24', '2019-07-19 05:48:24'),
(16, 1, 3, 1, 'ok', NULL, '2019-07-19 05:48:41', '2019-07-19 05:48:41'),
(17, 4, 1, 1, 'hai user can you please provide more details about your complaint  ', NULL, '2019-07-19 05:49:55', '2019-07-19 05:49:55'),
(18, 5, 1, 1, 'hai user can you please provide more details about your complaint  ', NULL, '2019-07-19 05:50:14', '2019-07-19 05:50:14'),
(19, 5, 3, 1, 'ok', NULL, '2019-07-19 05:50:25', '2019-07-19 05:50:25'),
(20, 5, 3, 1, 'hey', NULL, '2019-07-19 06:12:34', '2019-07-19 06:12:34'),
(22, 5, 3, 1, 'ahah', NULL, '2019-07-19 06:21:33', '2019-07-19 06:21:33'),
(23, 5, 1, 1, 'mmm', NULL, '2019-07-19 06:23:56', '2019-07-19 06:23:56'),
(24, 5, 3, 1, 'ghj', NULL, '2019-07-19 06:27:13', '2019-07-19 06:27:13'),
(25, 5, 3, 1, 'hello', NULL, '2019-07-19 06:32:25', '2019-07-19 06:32:25'),
(26, 5, 1, 1, 'haa para', NULL, '2019-07-19 06:33:46', '2019-07-19 06:33:46'),
(27, 5, 1, 1, 'hloo', NULL, '2019-07-19 06:34:39', '2019-07-19 06:34:39'),
(28, 5, 3, 1, 'hoi', NULL, '2019-07-19 06:54:56', '2019-07-19 06:54:56'),
(29, 5, 3, 1, 'haa', NULL, '2019-07-19 06:55:21', '2019-07-19 06:55:21'),
(30, 5, 3, 1, 'kooi', NULL, '2019-07-19 06:55:50', '2019-07-19 06:55:50'),
(31, 5, 3, 1, 'hloo', NULL, '2019-07-19 06:56:09', '2019-07-19 06:56:09'),
(32, 5, 1, 1, 'ooo', NULL, '2019-07-19 06:56:44', '2019-07-19 06:56:44'),
(33, 5, 1, 1, 'evdeya', NULL, '2019-07-19 06:57:08', '2019-07-19 06:57:08'),
(34, 5, 1, 1, 'ive ind', NULL, '2019-07-19 06:59:01', '2019-07-19 06:59:01'),
(35, 5, 3, 1, 'evde', NULL, '2019-07-19 06:59:39', '2019-07-19 06:59:39'),
(36, 5, 1, 1, 'ivde', NULL, '2019-07-19 07:00:05', '2019-07-19 07:00:05'),
(37, 5, 3, 1, 'gud morning', NULL, '2019-07-22 22:07:37', '2019-07-22 22:07:37'),
(38, 5, 1, 1, 'gm', NULL, '2019-07-22 22:22:24', '2019-07-22 22:22:24'),
(39, 5, 3, 1, 'key', NULL, '2019-07-22 22:23:04', '2019-07-22 22:23:04'),
(40, 5, 1, 1, 'haa', NULL, '2019-07-22 22:23:17', '2019-07-22 22:23:17'),
(41, 5, 3, 1, 'hey', NULL, '2019-07-22 22:25:18', '2019-07-22 22:25:18'),
(42, 5, 1, 1, 'haaloo', NULL, '2019-07-22 22:25:56', '2019-07-22 22:25:56'),
(43, 5, 1, 1, 'hey', NULL, '2019-07-22 22:33:29', '2019-07-22 22:33:29'),
(44, 5, 1, 1, 'muthee', NULL, '2019-07-22 22:35:34', '2019-07-22 22:35:34'),
(45, 5, 3, 1, 'yes', NULL, '2019-07-22 22:36:28', '2019-07-22 22:36:28'),
(46, 5, 3, 1, 'hai', NULL, '2019-07-22 22:36:36', '2019-07-22 22:36:36'),
(47, 5, 3, 1, 'yesa', NULL, '2019-07-22 22:36:43', '2019-07-22 22:36:43'),
(48, 5, 1, 1, 'hey', NULL, '2019-07-22 22:36:57', '2019-07-22 22:36:57'),
(49, 5, 1, 1, 'enthokeya', NULL, '2019-07-22 22:37:08', '2019-07-22 22:37:08'),
(50, 5, 3, 1, 'yeaa', NULL, '2019-07-22 22:37:22', '2019-07-22 22:37:22'),
(51, 5, 1, 1, 'hh', NULL, '2019-07-22 22:37:39', '2019-07-22 22:37:39'),
(52, 5, 3, 1, 'haaai', NULL, '2019-07-22 22:38:07', '2019-07-22 22:38:07'),
(53, 5, 1, 1, 'mm para', NULL, '2019-07-22 22:43:48', '2019-07-22 22:43:48'),
(54, 5, 1, 1, 'entha', NULL, '2019-07-22 22:44:08', '2019-07-22 22:44:08'),
(55, 5, 3, 1, 'entha', NULL, '2019-07-22 22:44:26', '2019-07-22 22:44:26'),
(56, 5, 1, 1, 'nyg', NULL, '2019-07-22 22:45:02', '2019-07-22 22:45:02'),
(57, 5, 3, 1, 'pne', NULL, '2019-07-22 22:45:21', '2019-07-22 22:45:21'),
(58, 5, 1, 1, 'pne enth', NULL, '2019-07-22 22:45:56', '2019-07-22 22:45:56'),
(59, 5, 3, 1, 'haa', NULL, '2019-07-22 22:52:22', '2019-07-22 22:52:22'),
(60, 5, 1, 1, 'entha', NULL, '2019-07-22 22:52:35', '2019-07-22 22:52:35'),
(61, 5, 3, 1, 'aganen ponnu', NULL, '2019-07-22 22:53:12', '2019-07-22 22:53:12'),
(62, 5, 3, 1, 'mm', NULL, '2019-07-22 22:54:40', '2019-07-22 22:54:40'),
(63, 5, 1, 1, 'enth mm', NULL, '2019-07-22 22:54:59', '2019-07-22 22:54:59'),
(64, 5, 1, 1, 'ntg', NULL, '2019-07-22 22:55:16', '2019-07-22 22:55:16'),
(65, 5, 3, 1, 'yes', NULL, '2019-07-22 22:56:13', '2019-07-22 22:56:13'),
(66, 5, 1, 1, 'enth yes', NULL, '2019-07-22 22:56:41', '2019-07-22 22:56:41'),
(67, 5, 3, 1, 'yhrn', NULL, '2019-07-22 22:56:41', '2019-07-22 22:56:41'),
(68, 5, 1, 1, 'mm', NULL, '2019-07-22 22:57:03', '2019-07-22 22:57:03'),
(69, 5, 3, 1, 'mm', NULL, '2019-07-22 23:15:18', '2019-07-22 23:15:18'),
(70, 5, 3, 1, 'pne', NULL, '2019-07-22 23:16:13', '2019-07-22 23:16:13'),
(71, 5, 3, 1, 'uu', NULL, '2019-07-22 23:17:51', '2019-07-22 23:17:51'),
(72, 5, 3, 1, 'tg5t6t', NULL, '2019-07-22 23:18:00', '2019-07-22 23:18:00'),
(73, 5, 3, 1, 'pne', NULL, '2019-07-22 23:19:15', '2019-07-22 23:19:15'),
(74, 5, 3, 1, 'ha', NULL, '2019-07-22 23:21:37', '2019-07-22 23:21:37'),
(75, 5, 1, 1, 'm', NULL, '2019-07-22 23:22:33', '2019-07-22 23:22:33'),
(76, 5, 3, 1, 'fooi', NULL, '2019-07-22 23:26:28', '2019-07-22 23:26:28'),
(77, 5, 3, 1, 'mm', NULL, '2019-07-22 23:27:29', '2019-07-22 23:27:29'),
(78, 5, 3, 1, 'ha', NULL, '2019-07-22 23:31:18', '2019-07-22 23:31:18'),
(79, 5, 3, 1, 'jjjjjj', NULL, '2019-07-22 23:48:56', '2019-07-22 23:48:56'),
(80, 5, 3, 1, 'hai', NULL, '2019-07-23 00:20:57', '2019-07-23 00:20:57'),
(81, 5, 3, 1, 'yes', NULL, '2019-07-23 00:21:05', '2019-07-23 00:21:05'),
(82, 5, 3, 1, '\'', NULL, '2019-07-23 00:21:39', '2019-07-23 00:21:39'),
(83, 5, 3, 1, '\" \" /', NULL, '2019-07-23 00:21:48', '2019-07-23 00:21:48'),
(84, 5, 1, 1, 'mm', NULL, '2019-07-23 00:26:00', '2019-07-23 00:26:00'),
(85, 5, 3, 1, 'mm', NULL, '2019-07-23 00:26:21', '2019-07-23 00:26:21'),
(86, 5, 3, 1, 'haa', NULL, '2019-07-23 00:32:22', '2019-07-23 00:32:22'),
(87, 5, 3, 1, 'yeee', NULL, '2019-07-23 00:32:25', '2019-07-23 00:32:25'),
(88, 5, 1, 1, 'k', NULL, '2019-07-23 00:49:10', '2019-07-23 00:49:10'),
(89, 5, 3, 1, 'kaa', NULL, '2019-07-23 00:53:57', '2019-07-23 00:53:57'),
(90, 5, 1, 1, 'mm', NULL, '2019-07-23 00:54:12', '2019-07-23 00:54:12'),
(91, 1, 1, 1, 'mm', NULL, '2019-07-23 01:05:09', '2019-07-23 01:05:09'),
(92, 5, 1, 1, 'm', NULL, '2019-07-23 01:05:41', '2019-07-23 01:05:41'),
(93, 5, 1, 1, 'haa', NULL, '2019-07-23 01:05:46', '2019-07-23 01:05:46'),
(94, 1, 1, 1, 'k', NULL, '2019-07-23 01:06:10', '2019-07-23 01:06:10'),
(95, 6, 1, 1, 'hai user can you please provide more details about your complaint  ', NULL, '2019-07-23 02:13:29', '2019-07-23 02:13:29'),
(96, 9, 1, 1, 'hai user can you please provide more details about your complaint  ', NULL, '2019-07-23 03:27:27', '2019-07-23 03:27:27'),
(97, 14, 1, 1, 'hai  can you please provide more details about your complaint  ', NULL, '2019-07-23 03:28:24', '2019-07-23 03:28:24'),
(98, 14, 2, 1, 'yeah', NULL, '2019-07-23 03:33:42', '2019-07-23 03:33:42'),
(99, 10, 1, 1, 'hai user can you please provide more details about your complaint  ', NULL, '2019-07-23 05:22:50', '2019-07-23 05:22:50'),
(100, 11, 1, 1, 'hai user can you please provide more details about your complaint  ', NULL, '2019-07-23 05:22:52', '2019-07-23 05:22:52'),
(101, 12, 1, 1, 'hai user can you please provide more details about your complaint  ', NULL, '2019-07-23 05:22:55', '2019-07-23 05:22:55'),
(102, 13, 1, 1, 'hai user can you please provide more details about your complaint  ', NULL, '2019-07-23 05:22:56', '2019-07-23 05:22:56'),
(103, 21, 1, 1, 'hai user can you please provide more details about your complaint  ', NULL, '2019-07-23 05:22:59', '2019-07-23 05:22:59'),
(104, 7, 1, 1, 'hai user can you please provide more details about your complaint  ', NULL, '2019-07-23 05:23:04', '2019-07-23 05:23:04'),
(110, 1, 3, 1, 'kk', NULL, '2019-07-23 05:38:01', '2019-07-23 05:38:01'),
(111, 7, 3, 1, 'hai', NULL, '2019-07-24 05:32:51', '2019-07-24 05:32:51'),
(112, 7, 3, 1, 'rthrth', NULL, '2019-07-24 05:41:30', '2019-07-24 05:41:30'),
(113, 7, 3, 1, 'mmjk', NULL, '2019-07-24 06:17:09', '2019-07-24 06:17:09'),
(114, 7, 1, 0, 'sfsfws', NULL, '2019-07-25 00:01:34', '2019-07-25 00:01:34'),
(115, 7, 1, 0, 'efw', NULL, '2019-07-25 00:02:51', '2019-07-25 00:02:51'),
(116, 7, 1, 0, 'yjt', NULL, '2019-07-25 00:59:15', '2019-07-25 00:59:15'),
(117, 7, 1, 0, 'mm', NULL, '2019-07-25 00:59:33', '2019-07-25 00:59:33'),
(118, 7, 1, 0, 'k', NULL, '2019-07-25 01:02:01', '2019-07-25 01:02:01'),
(119, 7, 1, 0, 'm', NULL, '2019-07-25 01:06:41', '2019-07-25 01:06:41'),
(120, 7, 1, 0, 'ii', NULL, '2019-07-25 01:10:35', '2019-07-25 01:10:35'),
(121, 7, 1, 0, 'k.,,', NULL, '2019-07-25 01:10:49', '2019-07-25 01:10:49'),
(122, 7, 1, 0, NULL, '1564038042.jpeg', '2019-07-25 01:30:42', '2019-07-25 01:30:42'),
(123, 3, 3, 1, NULL, '1564039399.jpeg', '2019-07-25 01:53:19', '2019-07-25 01:53:19'),
(124, 3, 3, 1, 'mm', NULL, '2019-07-25 02:02:34', '2019-07-25 02:02:34'),
(125, 14, 2, 1, NULL, '1564040688.jpeg', '2019-07-25 02:14:48', '2019-07-25 02:14:48'),
(126, 3, 3, 1, NULL, '1564043609.jpg', '2019-07-25 03:03:29', '2019-07-25 03:03:29'),
(127, 3, 3, 1, 'mm', NULL, '2019-07-25 03:17:30', '2019-07-25 03:17:30'),
(128, 3, 3, 1, NULL, '1564044568.jpeg', '2019-07-25 03:19:28', '2019-07-25 03:19:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_06_1_064237_create_qualifications_table', 1),
(2, '2019_06_2_064252_create_subjects_table', 1),
(3, '2019_06_3_064148_create_categories_table', 1),
(4, '2019_06_4_064214_create_sub_categories_table', 1),
(5, '2019_06_5_064057_create_nations_table', 1),
(6, '2019_06_6_064107_create_states_table', 1),
(7, '2019_06_7_064119_create_districts_table', 1),
(8, '2019_06_8_063517_create_admins_table', 1),
(9, '2019_06_9_000000_create_users_table', 1),
(10, '2019_06_10_063546_create_employeers_table', 2),
(11, '2019_06_11_063951_create_job_preferences_table', 3),
(12, '2019_06_12_064007_create_jobs_table', 4),
(13, '2019_06_25_064029_create_applications_table', 4),
(14, '2019_10_12_100000_create_password_resets_table', 4),
(16, '2019_07_16_092546_create_tickets_table', 5),
(18, '2019_07_17_061547_create_messages_table', 6),
(19, '2019_07_24_063121_create_job_views_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `nations`
--

CREATE TABLE `nations` (
  `nation_id` int(10) UNSIGNED NOT NULL,
  `nation_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nations`
--

INSERT INTO `nations` (`nation_id`, `nation_name`, `created_at`, `updated_at`, `status`) VALUES
(1, 'India', '2019-06-26 23:08:53', '2019-06-26 23:08:53', 0),
(3, 'China', '2019-06-26 23:24:50', '2019-06-26 23:24:50', 0),
(4, 'Japan', '2019-06-26 23:25:12', '2019-06-26 23:25:12', 0),
(5, 'America', '2019-06-26 23:25:25', '2019-06-26 23:25:25', 0),
(6, 'Australia', '2019-06-26 23:26:02', '2019-06-26 23:26:02', 0),
(7, 'England', '2019-06-26 23:26:29', '2019-06-26 23:26:29', 0),
(8, 'UAE', '2019-06-26 23:26:52', '2019-06-26 23:26:52', 0),
(9, 'Germany', '2019-06-26 23:28:58', '2019-06-26 23:28:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `quali_id` int(10) UNSIGNED NOT NULL,
  `qualification_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`quali_id`, `qualification_name`, `created_at`, `updated_at`, `status`) VALUES
(1, 'SSLC', '2019-06-27 03:15:18', '2019-06-27 03:15:18', 0),
(2, 'PLUS-2', '2019-06-27 03:15:37', '2019-06-27 03:15:37', 0),
(3, 'UG', '2019-06-27 03:15:49', '2019-06-27 03:15:49', 0),
(4, 'PG', '2019-06-27 03:16:00', '2019-06-27 03:16:00', 0),
(5, 'BTECH', '2019-06-27 03:16:40', '2019-06-27 03:16:40', 0),
(6, 'MTECH', '2019-06-27 03:16:46', '2019-06-27 03:16:46', 0),
(7, 'DIPLOMA', '2019-06-27 03:17:06', '2019-06-27 03:17:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `state_id` int(10) UNSIGNED NOT NULL,
  `nation_id` int(10) UNSIGNED NOT NULL,
  `state_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`state_id`, `nation_id`, `state_name`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 'Kerala', '2019-06-27 01:19:03', '2019-06-27 01:19:03', 0),
(2, 1, 'Karnataka', '2019-06-27 04:54:35', '2019-06-27 04:54:35', 0),
(3, 1, 'Goa', '2019-06-27 04:55:35', '2019-06-27 04:55:35', 0),
(4, 1, 'Tamilnadu', '2019-06-27 04:56:16', '2019-06-27 04:56:16', 0),
(5, 1, 'Gujarat', '2019-06-27 04:56:45', '2019-06-27 04:56:45', 0),
(6, 1, 'Sikkim', '2019-06-27 04:57:08', '2019-06-27 04:57:08', 0),
(7, 1, 'Andhrapredesh', '2019-06-27 04:57:34', '2019-06-27 04:57:34', 0),
(8, 5, 'newyork', '2019-06-28 23:58:30', '2019-06-28 23:58:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(10) UNSIGNED NOT NULL,
  `quali_id` int(10) UNSIGNED NOT NULL,
  `subject_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `quali_id`, `subject_name`, `created_at`, `updated_at`, `status`) VALUES
(1, 2, 'BIO-SCIENCE', '2019-06-27 03:51:53', '2019-06-27 03:51:53', 0),
(2, 2, 'COMPUTER-SCIENCE', '2019-06-27 03:52:08', '2019-06-27 03:52:08', 0),
(3, 2, 'HUMANITIES', '2019-06-27 03:52:27', '2019-06-27 03:52:27', 0),
(4, 2, 'COMERCE', '2019-06-27 03:52:44', '2019-06-27 03:52:44', 0),
(5, 3, 'It', '2019-07-08 03:05:20', '2019-07-08 03:05:20', 0),
(6, 3, 'commerce', '2019-07-08 03:05:34', '2019-07-08 03:05:34', 0),
(7, 3, 'English', '2019-07-08 03:05:46', '2019-07-08 03:05:46', 0),
(8, 3, 'Malayalam', '2019-07-08 03:05:54', '2019-07-08 03:05:54', 0),
(9, 3, 'Mechanical', '2019-07-08 03:06:06', '2019-07-08 03:06:06', 0),
(10, 3, 'Electrical', '2019-07-08 03:06:17', '2019-07-08 03:06:17', 0),
(11, 3, 'Botany', '2019-07-08 03:06:55', '2019-07-08 03:06:55', 0),
(12, 3, 'physics', '2019-07-08 03:07:14', '2019-07-08 03:07:14', 0),
(13, 5, 'Mechanical', '2019-07-08 03:08:02', '2019-07-08 03:08:02', 0),
(14, 5, 'It', '2019-07-08 03:08:09', '2019-07-08 03:08:09', 0),
(15, 5, 'Electrical', '2019-07-08 03:08:15', '2019-07-08 03:08:15', 0),
(16, 5, 'Civil', '2019-07-08 03:08:23', '2019-07-08 03:08:23', 0),
(17, 5, 'Architecture', '2019-07-08 03:08:39', '2019-07-08 03:08:39', 0),
(18, 5, 'CS', '2019-07-08 03:08:52', '2019-07-08 03:08:52', 0),
(19, 7, 'Mechanical', '2019-07-08 03:09:09', '2019-07-08 03:09:09', 0),
(20, 7, 'Chemical', '2019-07-08 03:09:19', '2019-07-08 03:09:19', 0),
(21, 7, 'Tool and Die', '2019-07-08 03:09:34', '2019-07-08 03:09:34', 0),
(22, 4, 'commerce', '2019-07-08 03:09:57', '2019-07-08 03:09:57', 0),
(23, 4, 'it', '2019-07-08 03:10:04', '2019-07-08 03:10:04', 0),
(24, 4, 'CS', '2019-07-08 03:10:15', '2019-07-08 03:10:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `sub_cat_id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `sub_cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`sub_cat_id`, `cat_id`, `sub_cat_name`, `updated_at`, `created_at`, `status`) VALUES
(1, 1, 'Network providers', '2019-06-27 05:49:40', '2019-06-27 05:49:40', 0),
(2, 2, 'home', '2019-07-03 04:05:35', '2019-07-03 04:05:35', 0),
(3, 3, 'wiring', '2019-07-08 03:13:28', '2019-07-08 03:13:28', 0),
(4, 3, 'maintanence', '2019-07-08 03:13:44', '2019-07-08 03:13:44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `job_id` int(10) UNSIGNED DEFAULT NULL,
  `others` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `employeer_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `job_id`, `others`, `admin_id`, `employeer_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '1', 1, NULL, '2019-07-17 00:44:15', '2019-07-17 04:32:11'),
(2, 1, 1, NULL, 1, NULL, '2019-07-17 06:04:10', '2019-07-17 06:04:31'),
(3, 5, 1, NULL, 1, NULL, '2019-07-18 22:03:28', '2019-07-18 22:03:51'),
(4, 1, NULL, '1', 1, NULL, '2019-07-19 05:49:41', '2019-07-19 05:49:55'),
(5, 1, NULL, '1', 1, NULL, '2019-07-19 05:50:10', '2019-07-19 05:50:14'),
(6, 1, 1, NULL, 1, NULL, '2019-07-22 22:47:10', '2019-07-23 02:13:29'),
(7, 1, 2, NULL, 1, NULL, '2019-07-22 22:47:16', '2019-07-23 05:23:04'),
(9, 1, 1, NULL, 1, NULL, '2019-07-23 01:32:03', '2019-07-23 03:27:27'),
(10, 1, 1, NULL, 1, NULL, '2019-07-23 01:44:26', '2019-07-23 05:22:50'),
(11, 1, 1, NULL, 1, NULL, '2019-07-23 01:47:11', '2019-07-23 05:22:52'),
(12, 1, 1, NULL, 1, NULL, '2019-07-23 01:47:39', '2019-07-23 05:22:55'),
(13, 1, 1, NULL, 1, NULL, '2019-07-23 01:47:48', '2019-07-23 05:22:56'),
(14, NULL, NULL, '1', 1, 1, '2019-07-23 01:48:28', '2019-07-23 03:28:24'),
(21, 1, 1, NULL, 1, NULL, '2019-07-23 05:22:07', '2019-07-23 05:22:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `account_status` int(11) NOT NULL DEFAULT '0',
  `resume` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nation_id` int(10) UNSIGNED NOT NULL,
  `state_id` int(10) UNSIGNED NOT NULL,
  `district_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `contact`, `dob`, `account_status`, `resume`, `nation_id`, `state_id`, `district_id`, `remember_token`, `created_at`, `updated_at`, `image`) VALUES
(1, 'user', 'lyfolx@gmail.com', '$2y$10$ZAb6wuJEoKTzOcZkyiha0eULb2d2L5R6WgRciqq3040WUfo0bkdfK', '1234567890', '2019-07-02', 0, '1562820415.pdf', 1, 1, 1, 'MTTopd48s4g95E0loyRg8fZilPiiibYUwYmpKbcSi53acbthjNrfhBpRuetv', '2019-06-29 04:57:40', '2019-07-10 23:16:55', '1562820415.jpg'),
(2, 'user2', 'u2@g.c', '$2y$10$Vt/kZauUb5DHQ2BW41NXW.TiPL/Jrt9xqrf1bmi9WEcezFca4NRyi', '1234567890', '2019-07-31', 0, '1561963964.desktop', 1, 1, 1, '8flbUlJZO8boXGAQpjLjmI8S4P1bnSnO8KZHAaC0QEZ0jIcd0i7p4WifGpZY', '2019-07-01 01:22:44', '2019-07-01 01:22:44', '1561978473.jpg'),
(3, 'user3', 'u3@g.c', '$2y$10$DKiTmmE/ExdqX1sLfjAFZO8GbdvgX.rWGoI7Va8OBZHP4b6cN.gVq', '1234567890', '2019-07-23', 0, '1561978473.jpg', 1, 1, 2, 'Vvwp5xSzm7Luy4UJwzSfKG1aYeEZsl9R1HCzM9yfqMWQTEocSCNppdQ22SMz', '2019-07-01 05:24:34', '2019-07-05 03:19:28', '1561978473.jpg'),
(4, 'user5', 'u5@g.c', '$2y$10$yWgjoQTvPiU/wfEzcVuVfOjyAAXKUGASwVA1IS1/vnQcpzYIKT8Jq', '1234567890', '2019-07-17', 0, '1562065227.jpg', 1, 1, 2, '7W6KNC7JduedvAHSlOeW8ovCjMDrRyz2P67ryY0Zzx4xZGmVl42W34B8tOdj', '2019-07-02 05:30:27', '2019-07-05 03:22:24', '1562065227.jpg'),
(5, 'Arjun', 'arjun@gmail.com', '$2y$10$kQWOuD84wAlMUT0.DMYtBeICjlK/p0X3GpT1qAN.gpDiWFN9Q3AcG', '1234567890', '2019-07-29', 0, '1562822404.pdf', 1, 1, 1, 'kKFhE9a7cjZ17ekOr7R0H05zHrRszUcTcnVbrWoqx2JuN6GD6Ls4Fob5MclP', '2019-07-10 23:50:04', '2019-07-11 23:04:51', '1562822404.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`app_id`),
  ADD KEY `applications_user_id_foreign` (`user_id`),
  ADD KEY `applications_job_id_foreign` (`job_id`),
  ADD KEY `applications_employeer_id_foreign` (`employeer_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`district_id`),
  ADD KEY `districts_state_id_foreign` (`state_id`);

--
-- Indexes for table `employeers`
--
ALTER TABLE `employeers`
  ADD PRIMARY KEY (`employeer_id`),
  ADD UNIQUE KEY `employeers_email_unique` (`email`),
  ADD KEY `employeers_nation_id_foreign` (`nation_id`),
  ADD KEY `employeers_state_id_foreign` (`state_id`),
  ADD KEY `employeers_district_id_foreign` (`district_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `jobs_employeer_id_foreign` (`employeer_id`),
  ADD KEY `jobs_quali_id_1_foreign` (`quali_id_1`),
  ADD KEY `jobs_subject_id_1_foreign` (`subject_id_1`),
  ADD KEY `jobs_quali_id_2_foreign` (`quali_id_2`),
  ADD KEY `jobs_subject_id_2_foreign` (`subject_id_2`),
  ADD KEY `jobs_cat_id_foreign` (`cat_id`),
  ADD KEY `jobs_sub_cat_id_foreign` (`sub_cat_id`),
  ADD KEY `jobs_nation_id_foreign` (`nation_id`),
  ADD KEY `jobs_state_id_foreign` (`state_id`),
  ADD KEY `jobs_district_id_foreign` (`district_id`);

--
-- Indexes for table `job_preferences`
--
ALTER TABLE `job_preferences`
  ADD PRIMARY KEY (`pref_id`),
  ADD KEY `job_preferences_user_id_foreign` (`user_id`),
  ADD KEY `job_preferences_quali_id_1_foreign` (`quali_id_1`),
  ADD KEY `job_preferences_subject_id_1_foreign` (`subject_id_1`),
  ADD KEY `job_preferences_subject_id_2_foreign` (`subject_id_2`),
  ADD KEY `job_preferences_cat_id_foreign` (`cat_id`),
  ADD KEY `job_preferences_sub_cat_id_foreign` (`sub_cat_id`),
  ADD KEY `job_preferences_nation_id_foreign` (`nation_id`),
  ADD KEY `job_preferences_state_id_foreign` (`state_id`),
  ADD KEY `job_preferences_district_id_foreign` (`district_id`),
  ADD KEY `quali_id_2` (`quali_id_2`,`subject_id_2`),
  ADD KEY `quali_id_2_2` (`quali_id_2`,`subject_id_2`);

--
-- Indexes for table `job_views`
--
ALTER TABLE `job_views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_views_user_id_foreign` (`user_id`),
  ADD KEY `job_views_job_id_foreign` (`job_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_ticket_id_foreign` (`ticket_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nations`
--
ALTER TABLE `nations`
  ADD PRIMARY KEY (`nation_id`),
  ADD UNIQUE KEY `nation_name` (`nation_name`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`quali_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`state_id`),
  ADD KEY `states_nation_id_foreign` (`nation_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `subjects_quali_id_foreign` (`quali_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`sub_cat_id`),
  ADD KEY `sub_categories_cat_id_foreign` (`cat_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_foreign` (`user_id`),
  ADD KEY `tickets_job_id_foreign` (`job_id`),
  ADD KEY `tickets_admin_id_foreign` (`admin_id`),
  ADD KEY `tickets_employeer_id_foreign` (`employeer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_nation_id_foreign` (`nation_id`),
  ADD KEY `users_state_id_foreign` (`state_id`),
  ADD KEY `users_district_id_foreign` (`district_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `app_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `district_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employeers`
--
ALTER TABLE `employeers`
  MODIFY `employeer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `job_preferences`
--
ALTER TABLE `job_preferences`
  MODIFY `pref_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `job_views`
--
ALTER TABLE `job_views`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `nations`
--
ALTER TABLE `nations`
  MODIFY `nation_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `quali_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `state_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `sub_cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_employeer_id_foreign` FOREIGN KEY (`employeer_id`) REFERENCES `employeers` (`employeer_id`),
  ADD CONSTRAINT `applications_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`),
  ADD CONSTRAINT `applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`state_id`);

--
-- Constraints for table `employeers`
--
ALTER TABLE `employeers`
  ADD CONSTRAINT `employeers_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`district_id`),
  ADD CONSTRAINT `employeers_nation_id_foreign` FOREIGN KEY (`nation_id`) REFERENCES `nations` (`nation_id`),
  ADD CONSTRAINT `employeers_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`state_id`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`),
  ADD CONSTRAINT `jobs_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`district_id`),
  ADD CONSTRAINT `jobs_employeer_id_foreign` FOREIGN KEY (`employeer_id`) REFERENCES `employeers` (`employeer_id`),
  ADD CONSTRAINT `jobs_nation_id_foreign` FOREIGN KEY (`nation_id`) REFERENCES `nations` (`nation_id`),
  ADD CONSTRAINT `jobs_quali_id_1_foreign` FOREIGN KEY (`quali_id_1`) REFERENCES `qualifications` (`quali_id`),
  ADD CONSTRAINT `jobs_quali_id_2_foreign` FOREIGN KEY (`quali_id_2`) REFERENCES `qualifications` (`quali_id`),
  ADD CONSTRAINT `jobs_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`state_id`),
  ADD CONSTRAINT `jobs_sub_cat_id_foreign` FOREIGN KEY (`sub_cat_id`) REFERENCES `sub_categories` (`sub_cat_id`),
  ADD CONSTRAINT `jobs_subject_id_1_foreign` FOREIGN KEY (`subject_id_1`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `jobs_subject_id_2_foreign` FOREIGN KEY (`subject_id_2`) REFERENCES `subjects` (`subject_id`);

--
-- Constraints for table `job_preferences`
--
ALTER TABLE `job_preferences`
  ADD CONSTRAINT `job_preferences_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`),
  ADD CONSTRAINT `job_preferences_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`district_id`),
  ADD CONSTRAINT `job_preferences_nation_id_foreign` FOREIGN KEY (`nation_id`) REFERENCES `nations` (`nation_id`),
  ADD CONSTRAINT `job_preferences_quali_id_1_foreign` FOREIGN KEY (`quali_id_1`) REFERENCES `qualifications` (`quali_id`),
  ADD CONSTRAINT `job_preferences_quali_id_2_foreign` FOREIGN KEY (`quali_id_2`) REFERENCES `qualifications` (`quali_id`),
  ADD CONSTRAINT `job_preferences_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`state_id`),
  ADD CONSTRAINT `job_preferences_sub_cat_id_foreign` FOREIGN KEY (`sub_cat_id`) REFERENCES `sub_categories` (`sub_cat_id`),
  ADD CONSTRAINT `job_preferences_subject_id_1_foreign` FOREIGN KEY (`subject_id_1`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `job_preferences_subject_id_2_foreign` FOREIGN KEY (`subject_id_2`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `job_preferences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `job_views`
--
ALTER TABLE `job_views`
  ADD CONSTRAINT `job_views_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_views_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_nation_id_foreign` FOREIGN KEY (`nation_id`) REFERENCES `nations` (`nation_id`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_quali_id_foreign` FOREIGN KEY (`quali_id`) REFERENCES `qualifications` (`quali_id`);

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`admin_id`),
  ADD CONSTRAINT `tickets_employeer_id_foreign` FOREIGN KEY (`employeer_id`) REFERENCES `employeers` (`employeer_id`),
  ADD CONSTRAINT `tickets_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`),
  ADD CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`district_id`),
  ADD CONSTRAINT `users_nation_id_foreign` FOREIGN KEY (`nation_id`) REFERENCES `nations` (`nation_id`),
  ADD CONSTRAINT `users_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`state_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
