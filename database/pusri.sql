-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2020 at 10:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pusri`
--

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `uuid`, `user_id`, `post_id`, `parent_id`, `file`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '20c1e6b3-c2d7-4062-9474-34875c5b7761', 20191867, 1, NULL, '243259311.pdf', 'Testing 1', '2020-01-14 08:53:29', '2020-01-14 08:54:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `karyawans`
--

CREATE TABLE `karyawans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karyawans`
--

INSERT INTO `karyawans` (`id`, `user_id`, `nama`, `jenis_kelamin`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 20191867, 'Darmawan Abinugroho', 'L', 'Enim', '2020-01-14 01:50:53', '2020-01-14 01:50:53'),
(2, 20191868, 'Dewi Chayanti', 'P', 'Lahat', '2020-01-14 01:51:24', '2020-01-14 01:51:24'),
(3, 20191869, 'Muhammad Agung Hikmatullah', 'L', 'Jambi', '2020-01-14 01:51:48', '2020-01-14 01:51:48');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `post_id`, `parent_id`, `file`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 20191867, 1, NULL, '243259311.pdf', 'Upload', '2020-01-14 08:53:30', '2020-01-14 08:53:30', NULL),
(2, 20191867, 1, NULL, '243259311.pdf', 'Download', '2020-01-14 08:53:37', '2020-01-14 08:53:37', NULL),
(3, 20191867, 1, NULL, '243259311.pdf', 'Download', '2020-01-14 08:53:44', '2020-01-14 08:53:44', NULL),
(4, 20191867, 1, NULL, '243259311.pdf', 'Download', '2020-01-14 08:53:59', '2020-01-14 08:53:59', NULL),
(5, 20191867, 1, NULL, 'BLANKO REKENING.pdf', 'Revisi', '2020-01-14 08:54:28', '2020-01-14 08:54:28', NULL),
(6, 20191867, 1, NULL, '243259311.pdf', 'Download', '2020-01-14 08:54:39', '2020-01-14 08:54:39', NULL),
(7, 20191867, 1, NULL, 'BLANKO REKENING.pdf', 'Download', '2020-01-14 08:54:46', '2020-01-14 08:54:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `log_perizinans`
--

CREATE TABLE `log_perizinans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_perizinan_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log_perizinans`
--

INSERT INTO `log_perizinans` (`id`, `user_id`, `post_perizinan_id`, `parent_id`, `file`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 20191867, 3, NULL, '243259311.pdf', 'Upload', '2020-01-14 09:06:06', '2020-01-14 09:06:06', NULL),
(2, 20191867, 3, NULL, 'BLANKO REKENING.pdf', 'Revisi', '2020-01-14 09:12:54', '2020-01-14 09:12:54', NULL),
(3, 20191867, 3, NULL, 'BLANKO REKENING.pdf', 'Download', '2020-01-14 09:25:46', '2020-01-14 09:25:46', NULL),
(4, 20191867, 3, NULL, 'BLANKO REKENING.pdf', 'Download', '2020-01-14 09:26:24', '2020-01-14 09:26:24', NULL),
(5, 20191867, 3, NULL, 'BLANKO REKENING.pdf', 'Download', '2020-01-14 09:26:38', '2020-01-14 09:26:38', NULL),
(6, 20191867, 3, NULL, '243259311.pdf', 'Download', '2020-01-14 09:26:44', '2020-01-14 09:26:44', NULL);

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
(3, '2020_01_06_131305_create_karyawans_table', 1),
(4, '2020_01_09_025750_create_post_contracts_table', 1),
(5, '2020_01_10_041807_create_logs_table', 1),
(6, '2020_01_12_152502_create_perizinan_table', 1),
(7, '2020_01_13_021148_create_log_perizinans_table', 1);

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
-- Table structure for table `perizinans`
--

CREATE TABLE `perizinans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_perizinan_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_perizinan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_berakhir` date NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perizinans`
--

INSERT INTO `perizinans` (`id`, `uuid`, `user_id`, `post_perizinan_id`, `parent_id`, `kategori`, `jenis_perizinan`, `tanggal_berakhir`, `file`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'b9b8e773-8352-473e-a504-9c5907739fc7', 20191867, 3, NULL, '3 Bulan', 'Perizinan A', '2020-04-17', '243259311.pdf', 'Testing 1', '2020-01-14 09:06:05', '2020-01-14 09:12:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `uuid`, `user_id`, `nama`, `jenis`, `file`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '9872b76e-07d6-4f8b-b4ce-70881688fecf', 20191867, 'Test Kontrak 1', 'Kontrak A', 'BLANKO REKENING.pdf', 'Testing 2', '2020-01-14 08:53:29', '2020-01-14 08:54:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_perizinans`
--

CREATE TABLE `post_perizinans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_perizinan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_berakhir` date NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_perizinans`
--

INSERT INTO `post_perizinans` (`id`, `uuid`, `user_id`, `nama`, `file`, `kategori`, `jenis_perizinan`, `tanggal_berakhir`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '880fb6ec-d914-467f-8fe5-22b40123a574', 20191867, 'Test Perizinan 1', '243259311.pdf', '3 Bulan', 'Perizinan A', '2020-04-17', 'Testing 1', '2020-01-14 09:00:29', '2020-01-14 09:00:29', NULL),
(2, '4bce9827-9bef-4cf2-82c1-5a0c746b6543', 20191867, 'Test Perizinan 2', NULL, '3 Bulan', 'Perizinan A', '2020-01-17', 'Testing 1', '2020-01-14 09:03:05', '2020-01-14 09:03:05', NULL),
(3, 'db2bd5f3-a742-4129-90cf-0499e212c1c6', 20191867, 'Test Perizinan 3', 'BLANKO REKENING.pdf', '3 Bulan', 'Perizinan A', '2020-04-17', 'Testing 2', '2020-01-14 09:06:05', '2020-01-14 09:12:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2522, 'Admin', 'admin', 'admin@email.com', NULL, '$2y$10$X61gK9BrBcKzi49iVMU3nOz8GEqiXA5B5wRAJCRzc0tvHo8wFtxwa', 'jCMpRKMuol8peYcn2vjFTWvUE363Zq3HetlrxxEXhjlvLS1iKIafIJ1Ed9BC', '2020-01-14 01:49:42', '2020-01-14 01:49:42'),
(20191867, 'Darmawan Abinugroho', 'access_user', 'abi@email.com', NULL, '$2y$10$Wobl98R5XHC7cOeaK460N.4XZrPVcsEx1Y.nUWFlfLRDNtCxYokdm', 'pHCJ1ApHxRWrYUtdQy5M3lY1KsOFg5dA5dnWRJtDAN4GSadmdiaa9FJtmwPZ', '2020-01-14 01:50:53', '2020-01-14 01:50:53'),
(20191868, 'Dewi Chayanti', 'std_user', 'dewi@email.com', NULL, '$2y$10$oLCwApiGbV93lXGpk1BJ6.6F2mWqVnqRCF5vJC5zXXDRkMubKuaKS', 'MqBmdV4Ld4X7AMBaeZVjh9Bnjz4aLdTWGFAwZQk8q5DqbFpBAv9MnfDDoOqV', '2020-01-14 01:51:24', '2020-01-14 01:51:24'),
(20191869, 'Muhammad Agung Hikmatullah', 'access_user', 'agung@email.com', NULL, '$2y$10$1cGNrly/fRQUEho5fvsvhe6SSOyjQ62HgvLiLngakThzaIAhKnmyO', 'IZzJ8cNaRNqYv5omFeKZvRx9jlWknlXrfVjBXs9Rhfcbxm1oUhuuhfZehRqL', '2020-01-14 01:51:48', '2020-01-14 01:51:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawans`
--
ALTER TABLE `karyawans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_perizinans`
--
ALTER TABLE `log_perizinans`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `perizinans`
--
ALTER TABLE `perizinans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_perizinans`
--
ALTER TABLE `post_perizinans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `users_id_unique` (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `karyawans`
--
ALTER TABLE `karyawans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `log_perizinans`
--
ALTER TABLE `log_perizinans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `perizinans`
--
ALTER TABLE `perizinans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post_perizinans`
--
ALTER TABLE `post_perizinans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
