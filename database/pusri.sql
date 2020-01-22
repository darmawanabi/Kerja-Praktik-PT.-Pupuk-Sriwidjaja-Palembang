-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2020 at 05:16 PM
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
(3, 20191869, 'Muhammad Agung Hikmatullah', 'L', 'Jambi', '2020-01-14 01:51:48', '2020-01-14 01:51:48'),
(6, 20191870, 'Muhmmad Farhan', 'L', 'PIM', '2020-01-16 19:13:05', '2020-01-16 19:13:05'),
(7, 20191871, 'Sendy Ramadhan', 'L', 'Sekip', '2020-01-19 23:56:47', '2020-01-19 23:56:47');

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
(1, 20191867, 1, NULL, '243259311.pdf', 'Upload', '2020-01-22 14:21:17', '2020-01-22 14:21:17', NULL),
(2, 2522, 2, NULL, '243259311.pdf', 'Upload', '2020-01-22 14:44:29', '2020-01-22 14:44:29', NULL),
(3, 2522, 3, NULL, '243259311.pdf', 'Upload', '2020-01-22 14:44:49', '2020-01-22 14:44:49', NULL);

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
(1, 2522, 1, NULL, '243259311.pdf', 'Upload', '2020-01-22 15:14:47', '2020-01-22 15:14:47', NULL),
(2, 20191867, 2, NULL, '243259311.pdf', 'Upload', '2020-01-22 16:04:34', '2020-01-22 16:04:34', NULL),
(3, 20191867, 3, NULL, '243259311.pdf', 'Upload', '2020-01-22 16:05:01', '2020-01-22 16:05:01', NULL),
(4, 20191867, 3, NULL, 'BLANKO REKENING.pdf', 'Revisi', '2020-01-22 16:13:05', '2020-01-22 16:13:05', NULL),
(5, 20191867, 2, NULL, 'BLANKO REKENING.pdf', 'Revisi', '2020-01-22 16:13:23', '2020-01-22 16:13:23', NULL);

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
(7, '2020_01_13_021148_create_log_perizinans_table', 1),
(8, '2020_01_17_023108_create_jobs_table', 2),
(11, '2020_01_20_010926_create_todos_table', 3),
(12, '2020_01_18_150214_create_table_masters_table', 4),
(13, '2020_01_20_022821_create_table_master_perizinans_table', 4);

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
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perizinans`
--

INSERT INTO `perizinans` (`id`, `uuid`, `user_id`, `post_perizinan_id`, `parent_id`, `file`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '8e16c209-e772-4171-b6b6-730a706b82e7', 20191867, 3, NULL, '243259311.pdf', 'Testing 1', '2020-01-22 16:05:01', '2020-01-22 16:13:05', NULL),
(2, 'd5f1cf01-7117-4716-87a5-e6e87ea62297', 20191867, 2, NULL, '243259311.pdf', 'Testing 1', '2020-01-22 16:04:34', '2020-01-22 16:13:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `table_master_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
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

INSERT INTO `posts` (`id`, `uuid`, `table_master_id`, `parent_id`, `user_id`, `nama`, `jenis`, `file`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '82c6ec06-c03e-4e03-b4e7-41dceacbf91d', 2, NULL, 20191867, 'Test Kontrak 1', 'Kontrak A', '243259311.pdf', 'Testing 1', '2020-01-22 14:21:16', '2020-01-22 14:21:16', NULL),
(2, 'e1de8b66-100a-40c3-806a-802a92c06ce4', 2, NULL, 2522, 'Test Kontrak 2', 'Kontrak B', '243259311.pdf', 'Testing 1', '2020-01-22 14:44:29', '2020-01-22 14:44:29', NULL),
(3, 'aac7963d-0398-452a-8cc9-db0064a2d2c4', 1, NULL, 2522, 'Test Kontrak 3', 'Kontrak A', '243259311.pdf', 'Testing 1', '2020-01-22 14:44:49', '2020-01-22 14:44:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_perizinans`
--

CREATE TABLE `post_perizinans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `table_master_perizinan_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
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

INSERT INTO `post_perizinans` (`id`, `uuid`, `table_master_perizinan_id`, `parent_id`, `user_id`, `nama`, `file`, `kategori`, `jenis_perizinan`, `tanggal_berakhir`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2492a1f1-325a-4809-a0d0-03c32f4c33d8', 1, NULL, 2522, 'Test Perizinan 1', '243259311.pdf', '3 Bulan', 'Perizinan A', '2020-04-30', 'Testing 1', '2020-01-22 15:14:47', '2020-01-22 15:14:47', NULL),
(2, 'ead46ea2-375e-41a4-a82a-9d062a5f2e30', 1, NULL, 20191867, 'Test Perizinan 2', 'BLANKO REKENING.pdf', '3 Bulan', 'Perizinan A', '2021-01-22', 'Testing 2', '2020-01-22 16:04:34', '2020-01-22 16:13:23', NULL),
(3, '0a32e2d9-5eee-4668-ac05-18bdb7e99cc9', 6, NULL, 20191867, 'Test Perizinan 3', 'BLANKO REKENING.pdf', '6 Bulan', 'Perizinan B', '2021-04-29', 'Testing 2', '2020-01-22 16:05:01', '2020-01-22 16:13:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_masters`
--

CREATE TABLE `table_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_kontrak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_masters`
--

INSERT INTO `table_masters` (`id`, `jenis_kontrak`, `created_at`, `updated_at`) VALUES
(1, 'Kontrak A', '2020-01-21 01:10:16', '2020-01-22 01:43:20'),
(2, 'Kontrak B', '2020-01-21 01:10:28', '2020-01-21 01:10:28'),
(3, 'Kontrak C', '2020-01-21 18:23:23', '2020-01-21 18:23:23'),
(4, 'Kontrak D', '2020-01-22 01:26:21', '2020-01-22 08:12:10'),
(9, 'Kontrak E', '2020-01-22 08:11:58', '2020-01-22 08:12:15');

-- --------------------------------------------------------

--
-- Table structure for table `table_master_perizinans`
--

CREATE TABLE `table_master_perizinans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_perizinan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_master_perizinans`
--

INSERT INTO `table_master_perizinans` (`id`, `jenis_perizinan`, `created_at`, `updated_at`) VALUES
(1, 'Perizinan A', '2020-01-21 01:10:36', '2020-01-22 01:46:21'),
(6, 'Perizinan B', '2020-01-21 01:48:00', '2020-01-21 01:48:00'),
(7, 'Perizinan C', '2020-01-21 18:23:09', '2020-01-21 18:23:09'),
(8, 'Perizinan D', '2020-01-22 01:26:29', '2020-01-22 08:15:43'),
(10, 'Perizinan E', '2020-01-22 02:08:48', '2020-01-22 02:08:48');

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `repeat` int(11) NOT NULL,
  `when` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`id`, `post_id`, `name`, `repeat`, `when`, `created_at`, `updated_at`, `to`) VALUES
(1, 1, 'Test Perizinan 1', 3, '2020-01-23', '2020-01-22 15:14:48', '2020-01-22 15:14:48', 'admin@email.com'),
(2, 2, 'Test Perizinan 2', 3, '2020-10-15', '2020-01-22 16:04:34', '2020-01-22 16:13:23', 'abi@email.com'),
(3, 3, 'Test Perizinan 3', 3, '2020-10-22', '2020-01-22 16:05:01', '2020-01-22 16:13:05', 'abi@email.com');

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
(2522, 'Admin', 'admin', 'admin@email.com', NULL, '$2y$10$X61gK9BrBcKzi49iVMU3nOz8GEqiXA5B5wRAJCRzc0tvHo8wFtxwa', 'pE0z7asPi3MJI7N02qWkT5HHPp4hRxVxaJJjPhrICRuWuDjLMfM5EZnE1L1w', '2020-01-14 01:49:42', '2020-01-14 01:49:42'),
(20191867, 'Darmawan Abinugroho', 'access_user', 'abi@email.com', NULL, '$2y$10$Wobl98R5XHC7cOeaK460N.4XZrPVcsEx1Y.nUWFlfLRDNtCxYokdm', 'YKBP0YpVKZi7EYqwfiYjgfXeouk37E7ojxYgPzyrYDWaQfvp8hTFH0ulywP3', '2020-01-14 01:50:53', '2020-01-14 01:50:53'),
(20191868, 'Dewi Chayanti', 'std_user', 'dewi@email.com', NULL, '$2y$10$oLCwApiGbV93lXGpk1BJ6.6F2mWqVnqRCF5vJC5zXXDRkMubKuaKS', 'MqBmdV4Ld4X7AMBaeZVjh9Bnjz4aLdTWGFAwZQk8q5DqbFpBAv9MnfDDoOqV', '2020-01-14 01:51:24', '2020-01-14 01:51:24'),
(20191869, 'Muhammad Agung Hikmatullah', 'access_user', 'agung@email.com', NULL, '$2y$10$1cGNrly/fRQUEho5fvsvhe6SSOyjQ62HgvLiLngakThzaIAhKnmyO', 'IZzJ8cNaRNqYv5omFeKZvRx9jlWknlXrfVjBXs9Rhfcbxm1oUhuuhfZehRqL', '2020-01-14 01:51:48', '2020-01-14 01:51:48'),
(20191870, 'Muhmmad Farhan', 'std_user', 'farhan@email.com', NULL, '$2y$10$Wj.7NxB0.qP1x87iWMeSMevj.Si.NGea/TZ7xkfm3h.d.8QvFX8L.', 'AIMXc8VFR8OxaK3XVd3cMjRBFNoGN2EJMjtmIpFtd63v7BzEZ9Tt1jFFAtDK', '2020-01-16 19:13:01', '2020-01-16 19:13:01'),
(20191871, 'Sendy Ramadhan', 'std_user', 'sendy@email.com', NULL, '$2y$10$hArjx0kzkCMZaeoYWG..dOr54CYIRm8pr1YO4IyIpdW05qKkor5XC', 'hZggCX90gwIB0lQJv1Zm3MEX03kQ8fsP2USOADOleIYg9ICMzHJZ7m2jgh78', '2020-01-19 23:56:42', '2020-01-19 23:56:42');

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
-- Indexes for table `table_masters`
--
ALTER TABLE `table_masters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `table_masters_jenis_kontrak_unique` (`jenis_kontrak`);

--
-- Indexes for table `table_master_perizinans`
--
ALTER TABLE `table_master_perizinans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `table_master_perizinans_jenis_perizinan_unique` (`jenis_perizinan`);

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `karyawans`
--
ALTER TABLE `karyawans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `log_perizinans`
--
ALTER TABLE `log_perizinans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `perizinans`
--
ALTER TABLE `perizinans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post_perizinans`
--
ALTER TABLE `post_perizinans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table_masters`
--
ALTER TABLE `table_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `table_master_perizinans`
--
ALTER TABLE `table_master_perizinans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
