-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2021 at 02:51 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `screen`
--

-- --------------------------------------------------------

--
-- Table structure for table `cradits`
--

CREATE TABLE `cradits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `credit` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` float NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cradits`
--

INSERT INTO `cradits` (`id`, `user_id`, `credit`, `cost`, `remarks`, `date`, `image`, `created_at`, `updated_at`) VALUES
(7, 4, 'Credit', 200, 'Good Work', '2021-02-12 14:53:00', '', '2021-02-11 15:53:00', '2021-02-11 15:53:00'),
(8, 7, 'Credit', 300, 'Good Works', '2021-02-12 15:53:00', '/images_1613040759.png', '2021-02-11 16:52:39', '2021-02-11 16:52:39'),
(9, 7, 'Credit', 300, 'Good Works', '2021-02-11 15:57:00', 'images/_1613041003.png', '2021-02-11 16:56:43', '2021-02-11 16:56:43'),
(10, 7, 'Debit', 277, 'Good Works', '2021-02-11 17:54:00', 'images/_1613041170.png', '2021-02-11 16:59:30', '2021-02-11 18:54:52'),
(11, 6, 'Credit', 123, 'Remarks 1', '2021-02-27 00:00:00', 'transactions/f4ONwOWTlyD4S7o4oeOI30D77D7Rb0R1Ia91eNcz.jpg', '2021-02-13 23:54:15', '2021-02-13 23:54:15'),
(12, 6, 'Debit', 456, 'Remarks 2', '2021-02-27 00:00:00', 'transactions/W9LMSZCyRg4aMlKSzaokkNw41fvsLdnyUD8SJKDs.jpg', '2021-02-13 23:54:15', '2021-02-13 23:54:15'),
(13, 4, 'Credit', 18000, 'Cash Deposit', '2021-02-14 00:00:00', 'transactions/4mQAle4eqh0l2nUOTRRPv59OpMrVUidI31yp92XY.jpg', '2021-02-14 04:26:43', '2021-02-14 04:26:43'),
(14, 7, 'Credit', 250000, 'Funds Transfer', '2021-02-14 00:00:00', 'transactions/9HIhZ4awtrKmB8nHCWpBkUXjPJfuywUQ3HwjRonk.jpg', '2021-02-14 16:28:37', '2021-02-14 16:28:37'),
(15, 6, 'Debit', 1850000, 'Custom Duty', '2021-02-14 00:00:00', 'transactions/0guvh2zNZehzWiyA854W0k5lwgKM06bRRKWNTFUe.jpg', '2021-02-14 16:29:28', '2021-02-14 16:29:28'),
(16, 7, 'Credit', 1000, 'hello its testing', '2021-02-15 00:00:00', 'transactions/bKdFxkLiGv79VeisCPoeh5BXWhmIlootGJ1X86N7.jpg', '2021-02-15 22:36:56', '2021-02-15 22:36:56'),
(17, 7, 'Debit', 123, 'debit', '2021-02-14 00:00:00', 'transactions/MsunGxmWzNiw43ExeYG3jk3Cgfm7ctfwKAvjMqMy.png', '2021-02-15 22:36:56', '2021-02-15 22:36:56'),
(18, 7, 'Debit', 900000, 'for negative value testing', '2021-02-18 00:00:00', 'transactions/lZ2CSD7Exhi4MAtbstBPTUrRrFlSA4kOBDSNCirK.jpg', '2021-02-19 17:46:17', '2021-02-19 17:46:17');

-- --------------------------------------------------------

--
-- Table structure for table `credits`
--

CREATE TABLE `credits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `credit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `debits`
--

CREATE TABLE `debits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `debit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_01_26_024418_create_statuses_table', 1),
(4, '2021_01_26_024752_create_notifications_table', 1),
(5, '2021_01_31_164358_create_cradits_table', 1),
(6, '2021_01_31_170356_create_users_table', 1),
(7, '2021_02_03_174326_create_credits_table', 1),
(8, '2021_02_03_174556_create_debits_table', 1),
(9, '2021_02_04_075448_create_logins_table', 2);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(6, 'App\\Models\\User', 6, '1613242279', '841bf12766b106b9adcab6de5b2fd9fc95bef9fec79444009e285a00b69ecb09', '[\"*\"]', '2021-02-14 01:01:31', '2021-02-14 00:51:19', '2021-02-14 01:01:31'),
(7, 'App\\Models\\User', 6, '1613395328', 'e2335bde14cebd9991aea5233441e55401c3f63dde4fd6e41259d2b2f39c14fa', '[\"*\"]', NULL, '2021-02-15 19:22:08', '2021-02-15 19:22:08'),
(8, 'App\\Models\\User', 6, '1613395633', 'bc96777b9b2c2f6d9819b082884e54bc34b3ee621918927c18dcdd79853b5721', '[\"*\"]', NULL, '2021-02-15 19:27:13', '2021-02-15 19:27:13'),
(9, 'App\\Models\\User', 6, '1613395642', '8aa25cba0f0e1613e322d4eeef624ceb374a3875c47514f6b3e26833d35d4ba3', '[\"*\"]', NULL, '2021-02-15 19:27:22', '2021-02-15 19:27:22'),
(10, 'App\\Models\\User', 6, '1613399713', '3befa7457a0a5dac1879ce4029aaa3e77392af456621f375499b7abb3b28d9b2', '[\"*\"]', NULL, '2021-02-15 20:35:13', '2021-02-15 20:35:13'),
(11, 'App\\Models\\User', 6, '1613400115', 'ca7701b12c029bc19960b09445f08153a38de89082ae2297fabb1c89a5281691', '[\"*\"]', '2021-02-15 22:22:01', '2021-02-15 20:41:55', '2021-02-15 22:22:01'),
(12, 'App\\Models\\User', 6, '1613402037', '6ad777a48a4c890b162cd5d0de575c2a94c74e26ddd0e0183464953f332ad04a', '[\"*\"]', NULL, '2021-02-15 21:13:57', '2021-02-15 21:13:57'),
(13, 'App\\Models\\User', 6, '1613402199', 'd0515c4aca32d41928d9eedac5e754a2bf5b4b260d8ead584eec25180401d4b0', '[\"*\"]', NULL, '2021-02-15 21:16:39', '2021-02-15 21:16:39'),
(14, 'App\\Models\\User', 6, '1613402283', '71ad14beafcfa3c0b7bab4cb3e423e4476dfeb9e8ef231074c97ea7365480b9f', '[\"*\"]', NULL, '2021-02-15 21:18:03', '2021-02-15 21:18:03'),
(15, 'App\\Models\\User', 6, '1613404582', '96ece7264d171e6ccae59132a150cc7cb467aad41fa932ceb4990f298ebb39b4', '[\"*\"]', NULL, '2021-02-15 21:56:22', '2021-02-15 21:56:22'),
(16, 'App\\Models\\User', 6, '1613405169', 'd64a49be73ecee40430f2d9d9f9e6410f1669e584934aac3579b00648e14b45d', '[\"*\"]', NULL, '2021-02-15 22:06:09', '2021-02-15 22:06:09'),
(17, 'App\\Models\\User', 6, '1613405227', 'c51775655bda2a766181320c8630e8f7a86b953a3ffe0533b226b7c4ec702303', '[\"*\"]', NULL, '2021-02-15 22:07:07', '2021-02-15 22:07:07'),
(18, 'App\\Models\\User', 6, '1613406492', '283a4a91a71a389d52b6a69bcdb6607de1a041c98a9eb2d30ddb13b258bccb61', '[\"*\"]', NULL, '2021-02-15 22:28:12', '2021-02-15 22:28:12'),
(19, 'App\\Models\\User', 6, '1613406512', 'c4b2588b7346bff47ac16b59c91e332ac483a403cab80bd15e01a58b269d4ec6', '[\"*\"]', NULL, '2021-02-15 22:28:32', '2021-02-15 22:28:32'),
(20, 'App\\Models\\User', 6, '1613407148', 'a509f6f3f06e133b33583b2d47ac2419d14a586cbf1c4a8069abab9b9e80ae1e', '[\"*\"]', NULL, '2021-02-15 22:39:08', '2021-02-15 22:39:08'),
(21, 'App\\Models\\User', 6, '1613407658', '858cd67ab50c65bf53831129c9cde9d8eed9003fa597120b357526b01fa716b3', '[\"*\"]', NULL, '2021-02-15 22:47:38', '2021-02-15 22:47:38'),
(22, 'App\\Models\\User', 6, '1613407667', 'c814ca1881a52020603388869cf977ebd14c2918d1f919cc111d492ab60dd7fe', '[\"*\"]', NULL, '2021-02-15 22:47:47', '2021-02-15 22:47:47'),
(23, 'App\\Models\\User', 6, '1613407839', '15e0f6d490f99a73a79412dbcfcab8154cff9d00ed54222218f90d6c2f2b2d4a', '[\"*\"]', NULL, '2021-02-15 22:50:39', '2021-02-15 22:50:39'),
(24, 'App\\Models\\User', 6, '1613407914', '4168e1396fd0ef2fd4728749f67e35c758fe9145c657804458722c62964f66f8', '[\"*\"]', NULL, '2021-02-15 22:51:54', '2021-02-15 22:51:54'),
(25, 'App\\Models\\User', 6, '1613411965', 'e149b6bc33328af0b43cf20fe16dfa6c4e41ab653552816c000e18a5addccab6', '[\"*\"]', '2021-02-16 00:02:21', '2021-02-15 23:59:25', '2021-02-16 00:02:21'),
(26, 'App\\Models\\User', 7, '1613413725', 'cb4831a49805c8e487337a146441d37f3fc3dd214cf819d4285559f8e5af6d54', '[\"*\"]', '2021-02-16 00:58:14', '2021-02-16 00:28:45', '2021-02-16 00:58:14'),
(27, 'App\\Models\\User', 7, '1613413773', '2ba9065891dd3e0e1f4f4b2e62b907a0a7d9b2365d7304f46d5ebfa0f6d03500', '[\"*\"]', '2021-02-16 00:36:31', '2021-02-16 00:29:33', '2021-02-16 00:36:31'),
(28, 'App\\Models\\User', 7, '1613414390', '3f0af0fa1f2becc1b45fb9c28055fcba56e55d3e4089f4630ec71a543d9e1554', '[\"*\"]', '2021-02-16 00:50:27', '2021-02-16 00:39:50', '2021-02-16 00:50:27'),
(29, 'App\\Models\\User', 7, '1613415537', '617fc320d2632346004a9f82fa91687abd3a48ae52dbb32eb2af01a67513ccfe', '[\"*\"]', '2021-02-16 01:01:38', '2021-02-16 00:58:57', '2021-02-16 01:01:38'),
(30, 'App\\Models\\User', 7, '1613415975', '6d71f01c4077ce11cbb6ec4d532b580f15e7fe70768f5eb05f488955e97fbc4c', '[\"*\"]', '2021-02-16 15:35:55', '2021-02-16 01:06:15', '2021-02-16 15:35:55'),
(31, 'App\\Models\\User', 7, '1613416510', '2523d87fcc1b9f76c749decb8382f5cd6ba4c1fa40daaa381114a19d351a3f6e', '[\"*\"]', '2021-02-16 02:49:10', '2021-02-16 01:15:10', '2021-02-16 02:49:10'),
(32, 'App\\Models\\User', 11, '1613421967', '86e407331ec980fe53aa0594db546ac3518ad7f33b679630c99e2d5862cb5bc5', '[\"*\"]', NULL, '2021-02-16 02:46:07', '2021-02-16 02:46:07'),
(33, 'App\\Models\\User', 7, '1613422175', '302cf3a2b86f3333d2741bdb63af6d7c8b4b264b8d281da4819555e378f68ff9', '[\"*\"]', '2021-02-16 02:58:00', '2021-02-16 02:49:35', '2021-02-16 02:58:00'),
(34, 'App\\Models\\User', 7, '1613422754', '4044b4549d0ca6de287423e83e18463f7852030c9a8bf3dba5061f5538880c15', '[\"*\"]', '2021-02-16 03:10:07', '2021-02-16 02:59:14', '2021-02-16 03:10:07'),
(35, 'App\\Models\\User', 7, '1613423490', 'ba806b7822b66adc2277c8fddadd5f9c4d1e067b34ba0b1c6d21d2d757665658', '[\"*\"]', '2021-02-16 03:23:44', '2021-02-16 03:11:30', '2021-02-16 03:23:44'),
(36, 'App\\Models\\User', 7, '1613424422', 'ce05662ed4021b87dcc173e8d7876f168f8826fdd8e2ae911f017533c1333b63', '[\"*\"]', '2021-02-16 03:27:03', '2021-02-16 03:27:02', '2021-02-16 03:27:03'),
(37, 'App\\Models\\User', 7, '1613424617', 'f05a691d807d4ec87afa7179f585f7c67a378052a8a360593b84c010054adb25', '[\"*\"]', NULL, '2021-02-16 03:30:17', '2021-02-16 03:30:17'),
(38, 'App\\Models\\User', 7, '1613424669', '28945001599d53a7e7c941b49eed1aca6c3e347addf5705cd2d6391b83db2a3d', '[\"*\"]', NULL, '2021-02-16 03:31:09', '2021-02-16 03:31:09'),
(39, 'App\\Models\\User', 7, '1613425788', 'cabcfdd027ea20ea8f47b2d524154e0fb6ff3995bc65062041634fa4c0d3622b', '[\"*\"]', '2021-02-16 03:52:40', '2021-02-16 03:49:48', '2021-02-16 03:52:40'),
(40, 'App\\Models\\User', 7, '1613426238', 'b7976ee5a3f50856a1be0f45436e1e068d4b51366d962b2392c818cf4d4b027f', '[\"*\"]', '2021-02-16 03:57:19', '2021-02-16 03:57:18', '2021-02-16 03:57:19'),
(41, 'App\\Models\\User', 7, '1613426400', 'b4ea1771cc11646a30977b76cde6419ebf2107d4a801056e89474869a8c132a6', '[\"*\"]', '2021-02-16 04:03:39', '2021-02-16 04:00:00', '2021-02-16 04:03:39'),
(42, 'App\\Models\\User', 7, '1613426839', '35fa986ef59410aeb4f0ee43185a0729cd972a6425e849cc0d2b161726212901', '[\"*\"]', '2021-02-16 04:07:20', '2021-02-16 04:07:19', '2021-02-16 04:07:20'),
(43, 'App\\Models\\User', 7, '1613426849', 'fa3129c2409956389e11c9bf9b0c462a9c438fc7b23483d21c95e1a33d9c76c0', '[\"*\"]', '2021-02-16 04:07:30', '2021-02-16 04:07:29', '2021-02-16 04:07:30'),
(44, 'App\\Models\\User', 7, '1613427098', '47923ce76618d79799e15d55650453f02486b5b603550297255829dad9472046', '[\"*\"]', '2021-02-16 04:32:15', '2021-02-16 04:11:38', '2021-02-16 04:32:15'),
(45, 'App\\Models\\User', 7, '1613428387', '2c992bf1446681059740ef437e399d87c14ab15d876ade8cc2e16178a848a168', '[\"*\"]', '2021-02-16 04:41:10', '2021-02-16 04:33:07', '2021-02-16 04:41:10'),
(46, 'App\\Models\\User', 7, '1613428893', '1e4b02cd88ff6c4ccdc16caf2a90a8d73364a0b27ea936489cf432a6710ebff4', '[\"*\"]', '2021-02-16 04:48:04', '2021-02-16 04:41:33', '2021-02-16 04:48:04'),
(47, 'App\\Models\\User', 7, '1613429306', 'bc7cd1fedc9ca56a229fb3f8c42b148abe1bd45456b2fa4f1e98b6e0ab0ec092', '[\"*\"]', '2021-02-16 04:48:35', '2021-02-16 04:48:26', '2021-02-16 04:48:35'),
(48, 'App\\Models\\User', 7, '1613429697', '3ec0024c4344070482ca0f26fade150e153689f2ae34626c1b4adc961377487e', '[\"*\"]', '2021-02-16 04:54:59', '2021-02-16 04:54:57', '2021-02-16 04:54:59'),
(49, 'App\\Models\\User', 7, '1613429956', 'aa73d5339a556b24c77ea20dec35edd3c35ac8adb088517024705b0b52069095', '[\"*\"]', '2021-02-16 05:01:30', '2021-02-16 04:59:16', '2021-02-16 05:01:30'),
(50, 'App\\Models\\User', 7, '1613430235', '42eb5fed48c62e84d60a723ce1bd89e397dbd78ea541a06e611315bc3b4a90f7', '[\"*\"]', '2021-02-16 05:06:06', '2021-02-16 05:03:55', '2021-02-16 05:06:06'),
(51, 'App\\Models\\User', 7, '1613430544', 'dbba978edcca182c930b59076f8b8fbe05df7bc9b52ff399cbb61eb7909087ad', '[\"*\"]', '2021-02-16 05:09:47', '2021-02-16 05:09:04', '2021-02-16 05:09:47'),
(52, 'App\\Models\\User', 7, '1613430680', 'c99f9d75effc30c22101f26c72a9c3c7dfcf8cd5b9efc9debecd9a11bb7cc182', '[\"*\"]', '2021-02-16 05:14:30', '2021-02-16 05:11:20', '2021-02-16 05:14:30'),
(53, 'App\\Models\\User', 7, '1613431607', 'ed17df1888bacbea797d2b84f19a75f51bdf9ae2a8278aa3fe759eb78a199cbf', '[\"*\"]', '2021-02-16 05:42:30', '2021-02-16 05:26:47', '2021-02-16 05:42:30'),
(54, 'App\\Models\\User', 7, '1613431952', '7242233e6fb0010d273bdd6293ced9b56d63c778163f92b9756ee96cd1fc6d86', '[\"*\"]', '2021-02-16 17:30:53', '2021-02-16 05:32:32', '2021-02-16 17:30:53'),
(55, 'App\\Models\\User', 7, '1613463941', '0daaaaae6e44ab65b72260c81b4cbf70062b98de7a172ed3224ba6255316f656', '[\"*\"]', '2021-02-19 17:46:28', '2021-02-16 14:25:41', '2021-02-19 17:46:28'),
(56, 'App\\Models\\User', 7, '1613466922', '6fab1ec4784e3ef0e965936052e24a3a5c9bafd0df4534bbd23f58f07f026e1d', '[\"*\"]', '2021-02-16 17:14:09', '2021-02-16 15:15:22', '2021-02-16 17:14:09'),
(57, 'App\\Models\\User', 7, '1613467787', 'b5c22678ede5efc0c6d8f0d9b4194838db66d35ba2bb4d34b4feec8e553f368e', '[\"*\"]', '2021-02-16 15:30:47', '2021-02-16 15:29:47', '2021-02-16 15:30:47'),
(58, 'App\\Models\\User', 7, '1613467895', 'badf6516168755bcbcec9f12d6b052814c3eb6e0d3d2900b1721e3d4db44c7b7', '[\"*\"]', '2021-02-16 15:33:13', '2021-02-16 15:31:35', '2021-02-16 15:33:13');

-- --------------------------------------------------------

--
-- Table structure for table `screens`
--

CREATE TABLE `screens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `screen_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `screens`
--

INSERT INTO `screens` (`id`, `user_id`, `date`, `screen_location`, `created_at`, `updated_at`) VALUES
(3, 7, '2021-02-15', 'hello mr bilal this is for testing', '2021-02-16 00:34:32', '2021-02-16 00:34:32'),
(4, 2, '2021-02-25', 'dfgh', '2021-02-25 05:16:45', '2021-02-25 05:16:45'),
(5, 4, '2021-02-25', 'dfg', '2021-02-25 05:19:01', '2021-02-25 05:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `f_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `email`, `email_verified_at`, `password`, `phone_no`, `address`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Akram', 'ansari', 'ansarimuhammad110@gmail.com', NULL, '5d5ripB9JDbMH#.', '0317107858', 'kharadar karaci', NULL, NULL, '2021-02-04 15:06:34', '2021-02-04 15:06:34'),
(2, 'Akram', 'ansari', 'ansarimuhammad1101@gmail.com', NULL, '$2y$10$ARMAarpaVDzouVPWeKEvI.965Dwyq.q6/Wg7XJwlDkFl5GxvtC316', '03171075878', 'kharadar\r\nlyari', NULL, NULL, '2021-02-04 19:19:26', '2021-02-04 19:19:26'),
(4, 'akram ansari', NULL, 'haseeb@gmail.com', NULL, '$2y$10$qHgxpdclTC9JJi67SIXgd.E2Nz3YM7ozVoJoHCHxivCuIYqmmqZAy', NULL, NULL, NULL, NULL, '2021-02-04 19:34:47', '2021-02-04 19:34:47'),
(6, 'Akram', NULL, 'admin@admin.com', NULL, '$2y$10$XGfAoq8xDoaigaK8bR3kveRcOvZucUPpFZFmTYZdHP2hfMZ0EgABW', '89797989', 'kharadar', 'users/cyzEaza8L79PTksjG381YKSa0lyeheSNujE0kdWb.jpg', NULL, '2021-02-06 03:31:53', '2021-02-14 01:01:27'),
(7, 'tabish', 'jawaid', 'mtabishjawaid@gmail.com', NULL, '$2y$10$XGfAoq8xDoaigaK8bR3kveRcOvZucUPpFZFmTYZdHP2hfMZ0EgABW', '03222483141', 'House 1', 'users/croyEqGv70gN6pPjrbHjyjnabEyWrrlJdclMcqzo.jpg', NULL, '2021-02-09 22:27:09', '2021-02-16 17:30:53'),
(8, 'q', NULL, 'abc@gmail.com', NULL, '123456', '02298222', 'sjsjhsjs', NULL, NULL, '2021-02-11 15:31:43', '2021-02-11 15:31:43'),
(9, 'Hassan', 'Babar', 'abc@yahoo.com', NULL, 'hassanbabar', '03333147737', 'House No 1 Block A Gulshan Karachi', NULL, NULL, '2021-02-13 18:20:05', '2021-02-13 18:20:19'),
(10, 'Example', NULL, 'example@apppend.com', NULL, 'admin123', '123456', 'example addresss', NULL, NULL, '2021-02-16 00:24:39', '2021-02-16 00:24:39'),
(11, 'User', NULL, 'usertwo@example.com', NULL, '$2y$10$oHtE6L7Yza3/HHTuQn9Z3uIHNiSfIPJ2lpX.cumCrUM9kqPNpfbeu', '1234567', 'Some Addresss', NULL, NULL, '2021-02-16 02:45:48', '2021-02-16 02:45:48'),
(12, 'Bilal', NULL, 'Bilal@gmail.com', NULL, '$2y$10$K/N6Dd/iHsOvw.2vFpOfXeOaLoh/Z0YSoqpMPAcaxc5Fgu../DH.O', '03212904308', 'Hs', NULL, NULL, '2021-02-16 02:48:36', '2021-02-16 02:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `user_screens`
--

CREATE TABLE `user_screens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `screen_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_screens`
--

INSERT INTO `user_screens` (`id`, `user_id`, `screen_id`, `date`, `name`, `created_at`, `updated_at`) VALUES
(1, 6, 7, '2021-02-09', 'qweqwe', '2021-02-09 22:27:51', '2021-02-09 22:27:51'),
(2, 7, 7, '2021-02-15', 'j', '2021-02-15 22:40:27', '2021-02-15 22:40:27'),
(3, 7, 7, '2021-02-15', 'hello mr bilal this is for testing notification', '2021-02-16 00:34:58', '2021-02-16 00:34:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cradits`
--
ALTER TABLE `cradits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credits`
--
ALTER TABLE `credits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debits`
--
ALTER TABLE `debits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `logins_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `screens`
--
ALTER TABLE `screens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_screens`
--
ALTER TABLE `user_screens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cradits`
--
ALTER TABLE `cradits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `credits`
--
ALTER TABLE `credits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `debits`
--
ALTER TABLE `debits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `screens`
--
ALTER TABLE `screens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_screens`
--
ALTER TABLE `user_screens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
