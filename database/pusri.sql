-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2020 at 02:40 AM
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
  `id` int(10) UNSIGNED NOT NULL,
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
(1, 'c447d184-5c5a-4b96-9d30-ec285714f6bf', 20191868, 1, NULL, '243259311.pdf', 'Testing 1', '2020-01-09 16:14:36', '2020-01-09 16:24:16', NULL),
(2, '9ebe910d-da49-414c-ad84-2bbeeddfddd7', 20191869, 1, NULL, 'BLANKO REKENING.pdf', 'Testing 2', '2020-01-09 16:24:16', '2020-01-09 16:26:13', NULL),
(3, '50d137b2-9ac5-4730-9856-98165d0d043f', 20191869, 1, NULL, 'Catatan KEGIATAN HARIAN.pdf', 'Testing 3', '2020-01-09 16:26:13', '2020-01-09 16:27:29', NULL),
(4, '03be59f6-dcac-4110-9f81-d8d176d0ce11', 20191867, 1, NULL, 'Daftar hadir mahasiswa.pdf', 'Testing 4', '2020-01-09 16:27:29', '2020-01-09 16:28:15', NULL),
(5, '1bb82a73-0d2c-4f0f-987f-c3e32ae00b12', 20191867, 2, NULL, '243259311.pdf', 'Testing 1', '2020-01-09 16:28:57', '2020-01-09 16:30:22', NULL),
(6, '271b7db2-0f01-40c3-a41c-7506542cc2b9', 20191867, 1, NULL, 'Daftar Nilai.pdf', 'Testing 5', '2020-01-09 16:28:15', '2020-01-09 16:30:51', NULL);

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
(1, 20191869, 'Muhammad Agung Hikmatullah', 'L', 'Jambi, Kota Jambi', '2020-01-07 02:04:02', '2020-01-07 02:04:02'),
(2, 20191867, 'Darmawan Abinugroho', 'L', 'Muara Enim', '2020-01-07 18:01:49', '2020-01-07 18:01:49'),
(3, 20191868, 'Dewi Chayanti', 'P', 'Lahat', '2020-01-07 18:02:14', '2020-01-07 18:02:14'),
(5, 20191871, 'Abi be', 'L', 'Enim', '2020-01-09 00:55:07', '2020-01-09 00:55:07');

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
(3, '2020_01_06_131305_create_karyawans_table', 2),
(4, '2020_01_08_013621_create_contracts_table', 3),
(5, '2020_01_08_020346_add_soft_delete_to_contracts', 4),
(6, '2020_01_08_084139_add_uuid_to_contracts', 5),
(13, '2020_01_09_025750_create_post_contracts_table', 6);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `uuid`, `user_id`, `nama`, `file`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '89bb4a7f-4ef5-4781-9923-4abe62fd0876', 20191868, 'Test Kontrak 1', 'SURAT PERNYATAAN pusri.pdf', 'Testing 6', '2020-01-09 16:14:36', '2020-01-09 16:30:51', NULL),
(2, 'ce8e393d-a404-45f5-aaa9-46cc6e8c72a2', 20191868, 'Test Kontrak 2', 'BLANKO REKENING.pdf', 'Testing 2', '2020-01-09 16:28:57', '2020-01-09 16:30:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Agung', 'agung@email.com', 'admin', NULL, '$2y$10$1tDwBI4NRD4Uc6eJ2j3aV.44467oF0PYRz9zlKw3CFQs3Le3QvBi.', 'mVVFqW9MpvS36vrgvEGIkYU46cuSDaeoDRRuFBY2WmBNUVrGvMj2MD0ilixq', '2020-01-07 01:58:49', '2020-01-07 01:58:49'),
(20191867, 'Darmawan Abinugroho', 'abi@email.com', 'access_user', NULL, '$2y$10$9106ZJC.2SFNwDgQyakxee3IY7KLhFmJGAvc1Hxirbvr16utfDSH2', '3D3go5fvFEHt3d2IO5D0KyqtsdvFPRoglyrnXlnYe0A94wyh7y7Inuh1AIWc', '2020-01-07 18:01:49', '2020-01-07 18:01:49'),
(20191868, 'Dewi Chayanti', 'dewi@email.com', 'admin', NULL, '$2y$10$4MgnQuo8Uarsbo7B/tHOMO1h0NHrpEi9NjMYnmRe6L0I3diF1fXga', 'pZFRqef7UOJh5PY2Ob7qd45BCUVH3NvmchmuH328lpPCZ7RQKmfQG7kK2hXu', '2020-01-07 18:02:14', '2020-01-07 18:02:14'),
(20191869, 'Muhammad Agung Hikmatullah', 'magunghkm@email.com', 'std_user', NULL, '$2y$10$WqMQgA9hL2qiUe5AuJdQguGxxoMlmgP0G4Aa44Sxh7pcVl3TY3diW', 'E2zUkGl5EpoF1YAVFwiNhDm1BtMrPxmL5DEJZ5OAYKxgHU4ZSAOaIxD4npuQ', '2020-01-07 02:04:01', '2020-01-07 02:04:01'),
(20191870, 'Muhammad Farhan', 'farhan@email.com', 'std_user', NULL, '$2y$10$5WNE220h68eyf.8rYm7IhuryfcClJGPB1Psz1Tw02PUCoPVuNN2fq', '9NrxKN28dUi3vxA8adva2AoNuonLAbdxfS2TEqYIZBY9OXOytBU0qLc7aIjD', '2020-01-07 20:34:29', '2020-01-07 20:34:29'),
(20191871, 'Abi be', 'abi_be@email.com', 'access_user', NULL, '$2y$10$JGhF3BH1LvJZrMF9vT2D8uuNxdFDlM5xltO9Nc.NKt2U5LCutBFZK', 'QZ4sHP3kK5o6uloajzCiYTItIHizbTHfsgCYA4VvZA915ygJk0LBGrb0nnHh', '2020-01-09 00:55:07', '2020-01-09 00:55:07');

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `karyawans`
--
ALTER TABLE `karyawans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
