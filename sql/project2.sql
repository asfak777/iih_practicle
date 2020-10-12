-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2020 at 04:03 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project2`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(5, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(6, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(7, '2016_06_01_000004_create_oauth_clients_table', 2),
(8, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('02df754f115dd5a7cfa9a62148148e66ad097cf229cc50c5938fd1b4b6cbbb63314f1e7cb27c0e51', 17, 1, 'MyApp', '[]', 0, '2020-08-12 04:16:19', '2020-08-12 04:16:19', '2021-08-12 09:46:19'),
('08a86a608dcf3925a3fd8c14c6f26b7ef3fd76953f81937bb72c8d84fcf4b3bb528bb6124a86e8ae', 17, 1, 'MyApp', '[]', 0, '2020-08-12 05:08:53', '2020-08-12 05:08:53', '2021-08-12 10:38:53'),
('1302d73e520f2f4872da6de83abdf3af3604b4707c1595e3dddda8493657ebeddda74d7b801672c2', 17, 1, 'MyApp', '[]', 0, '2020-08-12 04:10:57', '2020-08-12 04:10:57', '2021-08-12 09:40:57'),
('233de6f7d6744d4c549c2fc36ac34b6acb085bb81bafdd5457ca6d5b45c5c57722aa521ee2f63655', 11, 1, 'MyApp', '[]', 0, '2020-08-12 01:17:51', '2020-08-12 01:17:51', '2021-08-12 06:47:51'),
('255c97f2171b6747c753dabd1e677415c9fa8c6fbeec680f4581674aa8829d9e29c4cc9226ca4ccb', 8, 1, 'MyApp', '[]', 0, '2020-08-12 01:11:48', '2020-08-12 01:11:48', '2021-08-12 06:41:48'),
('2f9c0b7a4d91aa8daa866bf3d4f6421b86d08341a662a9ebe0d1e18fb9dbeb8b6ac49108775c115b', 7, 1, 'MyApp', '[]', 0, '2020-08-12 01:10:53', '2020-08-12 01:10:53', '2021-08-12 06:40:53'),
('3270ec3c28e9869dd3967cf30f289040eb05d537091a5f3438c1b336d6de179bd8eda4e4a97142fe', 4, 1, 'MyApp', '[]', 0, '2020-07-11 06:10:33', '2020-07-11 06:10:33', '2021-07-11 11:40:33'),
('409f7264da289412d045b9fc834244e181aa39d4a86593432c380788a59e5568e389d959ba162eb5', 10, 1, 'MyApp', '[]', 0, '2020-08-12 01:12:35', '2020-08-12 01:12:35', '2021-08-12 06:42:35'),
('521f5a71c26f5c432419c440a917be4e06619330058d4946f8f2f55cb01ad0852bb65f29e6e3d279', 4, 1, 'MyApp', '[]', 0, '2020-07-11 06:11:17', '2020-07-11 06:11:17', '2021-07-11 11:41:17'),
('5777373fff4653dc932a057254fbfa409ff54c45b63175856a1793668c63de7ab7d49e9c9bed6693', 6, 1, 'MyApp', '[]', 0, '2020-08-12 01:12:58', '2020-08-12 01:12:58', '2021-08-12 06:42:58'),
('64e19238f19d29413ff745aa8075822c7a6f57c2ff5d582156bfdbe42db1f9208a1b14eb5652082d', 4, 1, 'MyApp', '[]', 0, '2020-07-11 05:57:21', '2020-07-11 05:57:21', '2021-07-11 11:27:21'),
('67dc77f09e6feb662812fa82c6580787da91791d161ca71cd47569079c8b15e496c10109eb3f45fa', 10, 1, 'MyApp', '[]', 0, '2020-08-12 01:13:12', '2020-08-12 01:13:12', '2021-08-12 06:43:12'),
('700d719dc4483e224b63f5135a86580f2eead5f3c0fdbc4800602daa5a02db629c100b3e54a53959', 4, 1, 'MyApp', '[]', 0, '2020-07-11 06:13:00', '2020-07-11 06:13:00', '2021-07-11 11:43:00'),
('70b758d32736439445e004455d49fe55efaa8f961f0d5598643037ab09e5c3d23fb4b18291f1cf6a', 6, 1, 'MyApp', '[]', 0, '2020-07-11 10:02:26', '2020-07-11 10:02:26', '2021-07-11 15:32:26'),
('8c8ed4bd7406246161e300ed4bfe355bf2b850dfd799aad38868f0626b5d4f7e45f6126f897ae41f', 4, 1, 'MyApp', '[]', 0, '2020-07-11 05:51:41', '2020-07-11 05:51:41', '2021-07-11 11:21:41'),
('8e440cfbdbdd9d9076c7417ffa83e7ac3a7fdb15e75b4ff98028fbdbeaaab77878e0df5aaa26cff3', 10, 1, 'MyApp', '[]', 0, '2020-08-12 01:20:54', '2020-08-12 01:20:54', '2021-08-12 06:50:54'),
('92ec9a17582815f749a764a8f8c48def8c97ba2c8923fa919cded3b3830e7c83df9659ff92041823', 4, 1, 'MyApp', '[]', 0, '2020-07-11 06:10:20', '2020-07-11 06:10:20', '2021-07-11 11:40:20'),
('936f1b8ed7a271772d2bdec9f5e412caf02bea8e5b87cb657e0139d8acc410cf7eb4e7015936383a', 6, 1, 'MyApp', '[]', 0, '2020-08-12 01:07:23', '2020-08-12 01:07:23', '2021-08-12 06:37:23'),
('97d50b7901a263afddd90dc66913f2556e7a8a72fa8290fcbe81f96411dc6ce68d1379a09488798d', 11, 1, 'MyApp', '[]', 0, '2020-08-12 01:20:30', '2020-08-12 01:20:30', '2021-08-12 06:50:30'),
('a0ba216b51747c023ac16265bc62cf07edc3df8000d7b5aa80344accf94a33cc9cf56b4a7e5df94f', 6, 1, 'MyApp', '[]', 0, '2020-07-11 10:01:25', '2020-07-11 10:01:25', '2021-07-11 15:31:25'),
('a171d214fe342804c2f179f71e18605d15ffd6237f51b0cc4d95cef20aaedab1b6f84d570374336c', 4, 1, 'MyApp', '[]', 0, '2020-07-11 06:09:15', '2020-07-11 06:09:15', '2021-07-11 11:39:15'),
('b1dac57656cdc8f73f05189f11a505e37e814c4b6dcb997ad7f05c38cadf3bcf9f5acb35dec8e50b', 10, 1, 'MyApp', '[]', 0, '2020-08-12 01:13:46', '2020-08-12 01:13:46', '2021-08-12 06:43:46'),
('b838a01df810b4cea0f6add24be24bb645c1d96484c433b2560a2f01168f581320cb62104a35d46b', 17, 1, 'MyApp', '[]', 0, '2020-08-12 04:11:24', '2020-08-12 04:11:24', '2021-08-12 09:41:24'),
('ecea874ea4d1e384ac417af62abb638f5334f1f1c7a04ed9a36b8a37778e80df8682622431bfa629', 17, 1, 'MyApp', '[]', 0, '2020-08-12 04:11:15', '2020-08-12 04:11:15', '2021-08-12 09:41:15'),
('f8dfb4df6c910ee92a04e1892d90671e82f35c32b175be5b7be8cc74ff2fe1cfe4cf90f5e8a74ae5', 16, 1, 'MyApp', '[]', 0, '2020-08-12 04:10:03', '2020-08-12 04:10:03', '2021-08-12 09:40:03'),
('fa378568d9c3261fb8b653910dfbbb22eb9a2232b708633e5ee3f3ac8ec8b0af0fae615ab5efb2b8', 17, 1, 'MyApp', '[]', 0, '2020-08-12 04:12:02', '2020-08-12 04:12:02', '2021-08-12 09:42:02'),
('fb183603b35be541a9dd09ec1b687a8eb9ad530f2dd957629663c9c8a6d4b93247ce7168de808663', 9, 1, 'MyApp', '[]', 0, '2020-08-12 01:12:07', '2020-08-12 01:12:07', '2021-08-12 06:42:07');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'manektech-practical Personal Access Client', 'QT4oaZYnuY8WjETVPmDgwUP8NUbBtmD8V8gS7CsQ', NULL, 'http://localhost', 1, 0, 0, '2020-07-11 04:24:45', '2020-07-11 04:24:45'),
(2, NULL, 'manektech-practical Password Grant Client', 'kbdRZtTNLPOMfkrfMDYe4AYDAkVWKRPQy9vP28Y1', 'users', 'http://localhost', 0, 1, 0, '2020-07-11 04:24:45', '2020-07-11 04:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-07-11 04:24:45', '2020-07-11 04:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$blPJMqfk8MUjLwA6teXOtOT.8RVWrtJzTiKWLbfZXRQkSpy11rio.', '2020-08-12 02:57:52'),
('dhiren@yahoo.com', '$2y$10$Rz5dvxRzbNXFH0QD1i/pMuIY5x7bJouZ8BYuIrTBs8UDSAO7ORzIC', '2020-10-03 02:38:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(10) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'User', 'admin@gmail.com', 8548774878, NULL, '$2y$10$DG6gUzy8OBFDofTPd.JCXOSPCiraTtVFOfnYpiH7a5QSeabi7YPkC', NULL, 1, '2020-08-12 05:51:37', '2020-08-12 05:51:37'),
(15, 'Hiren', 'Patel', 'hiren@gmail.com', 8547858489, NULL, '$2y$10$eUrT.MjBI3EHyZaNzJNZ3ewIo5wZ8E/j6VWZUGg5k0BiEMEQJOrKS', NULL, 0, '2020-08-12 04:05:36', '2020-08-12 04:10:42'),
(17, 'Asfak', 'Malek', 'asfak@gmail.com', 8544785544, NULL, '$2y$10$DG6gUzy8OBFDofTPd.JCXOSPCiraTtVFOfnYpiH7a5QSeabi7YPkC', NULL, 1, '2020-08-12 04:10:57', '2020-08-12 04:10:57'),
(18, 'aa', 'bb', 'test111@yaho.com', 23232323, NULL, '$2y$10$dg0yLtfQWnKAZ9peZrzbyuNV6bOMFM2hd/6m8fDLaZNGJ.fmodVLS', NULL, 0, '2020-09-11 04:34:47', '2020-09-11 04:34:47'),
(19, 'abc', 'xyz', 'abc@yahoo.com', 848787, NULL, '$2y$10$9zSA53WDFZMyXxVBhKEKO.kwmTpNyCcghroYbyZr7lYnpSCcd3mK2', NULL, 0, '2020-10-03 01:22:59', '2020-10-03 01:22:59'),
(20, 'aaaaaaaa', 'ddddddd', 'dhiren@yahoo.com', 323423423, NULL, '$2y$10$Mmulk1JogXC/I89H2uQ7POIi54JBZC/PgdDTyhrpZ4WrJSIKM0Vnq', NULL, 0, '2020-10-03 02:04:15', '2020-10-03 02:04:15'),
(21, 'dddddddddd', 'aaaaaa', 'asn@yahoo.com', 32323232, NULL, '$2y$10$eqNMNxinvW5z3.YSo6DWz.uH6lvt7Jv/yUymDF8c.AYbFbEpaemC.', NULL, 0, '2020-10-03 02:06:14', '2020-10-03 02:06:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
