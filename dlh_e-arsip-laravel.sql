-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2022 at 06:06 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dlh_e-arsip-laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `archives`
--

CREATE TABLE `archives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `field_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `archives`
--

INSERT INTO `archives` (`id`, `title`, `document`, `category_id`, `field_id`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum', 'archives/t6rvwSIagsHVff2seIWN4cXAOxgY2lNBoWhjJP9M.pdf', 1, 1, '2022-02-07 22:07:55', '2022-04-14 20:45:02'),
(2, 'Laporan Laba Rugi 2021', 'archives/SMCqBHcs8nzbpKEjXEVK9wNQADUDKTZu6ZXuOSYs.pdf', 3, 2, '2022-02-08 01:29:10', '2022-02-08 01:29:10'),
(5, 'Laporan Posisi Keuangan Januari 2022', 'archives/Z1m81W2bDY3C3USOnx2GEhdtJ2O4jEFfmfqfdjbQ.pdf', 3, 2, '2022-02-16 01:04:15', '2022-02-16 01:04:15'),
(6, 'Surat Pengesahan Anggota Baru', 'archives/V0gHUMIpqSq72GHOMgm0AkQIePHQeAGuGgCDSGDj.docx', 7, 1, '2022-02-16 01:05:15', '2022-02-16 01:05:15'),
(7, 'Surat Pemberitahuan WFH Februari 2022', 'archives/FrbEydpel4925doTj6emiUidmb31sOG0OaaUnlXG.jpg', 1, 4, '2022-02-16 01:05:56', '2022-02-16 01:05:56'),
(8, 'Surat Pemberitahuan WFO Desember 2021', 'archives/5uT1fz4AmCj0XeZOiiGBmZJ0UDt6IOJZ8H5zBRtj.jpg', 7, 1, '2022-02-16 01:06:45', '2022-02-16 01:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Surat Keputusan', '2022-02-07 09:22:32', '2022-02-07 09:22:32'),
(2, 'Surat Peringatan', '2022-02-07 09:22:32', '2022-02-07 09:22:32'),
(3, 'Laporan Keuangan', '2022-02-07 09:22:32', '2022-02-07 09:22:32'),
(4, 'Surat Tugas', '2022-02-07 09:22:32', '2022-02-07 09:22:32'),
(6, 'Surat Perintah Pimpinan', '2022-02-07 23:00:00', '2022-02-07 23:00:07'),
(7, 'Berita Acara', '2022-02-16 00:52:24', '2022-02-16 00:55:29');

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
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Penataan, Pengawasan dan Peningkatan Kapasitas Lingkungan Hidup', '2022-02-07 09:22:32', '2022-03-06 03:08:42'),
(2, 'Pengendalian Pencemaran dan Kerusakan Lingkungan Hidup', '2022-02-07 09:22:32', '2022-03-06 03:08:50'),
(3, 'Pengelolaan Sampah dan Limbah Bahan Berbahaya dan Beracun', '2022-02-07 09:22:32', '2022-03-06 03:08:55'),
(4, 'Sekretariat', '2022-02-07 09:22:32', '2022-02-07 23:04:15');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_07_071210_create_categories_table', 1),
(6, '2022_02_07_071706_create_fields_table', 1),
(7, '2022_02_07_071905_create_archives_table', 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@gmail.com', 'admin', '$2y$10$UalRPlXDX97vm4FqjmbxHOHlR.XWktWvUrdTHoMiU6wfoDCWxFdOe', 'p3UCN1IVuVtLVsqSmMPbaZI7CIwnWO4GkitbuY21PKFKmbrB9ekoR8eyr4ny', '2022-02-07 09:22:32', '2022-02-12 00:44:06'),
(2, 'Admin Bidang Penataan', 'admin_penataan@gmail.com', 'Penataan, Pengawasan dan Peningkatan Kapasitas Lingkungan Hidup', '$2y$10$q913kfOMTf57Gm.kR29n4.onoIIAogc8nDhcOZDjt1OgWh4sELVb6', 'k8ryQ1EHqQw1aofvP5F6nPwGvNjG4DrQxfjXWXvy6kNhahYlCLQmi79ezfom', '2022-02-07 09:22:33', '2022-04-14 21:05:43'),
(3, 'Admin Bidang Pengendalian', 'admin_pengendalian@gmail.com', 'Pengendalian Pencemaran dan Kerusakan Lingkungan Hidup', '$2y$10$XFIL1qRTM2x4ZFeMtUvWA.myRQ.PourHqY7KavSKAAFcW6OL/L5yC', NULL, '2022-02-07 09:22:33', '2022-04-14 21:05:29'),
(4, 'Admin Bidang Pengelolaan Limbah', 'admin_pengelolaan_limbah@gmail.com', 'Pengelolaan Sampah dan Limbah Bahan Berbahaya dan Beracun', '$2y$10$GTp/0j.8J4kEYMvZgqMmKuTCjEl1Bv.GqXhCPc/kuwAOt.QOqHUiO', NULL, '2022-02-07 09:22:33', '2022-04-14 21:06:06'),
(6, 'Admin Bidang Sekretariat', 'admin_sekretariat@gmail.com', 'Sekretariat', '$2y$10$mJAt.c0jhInnGEIQiZiTQeNwDBY2iWnv5UawYsdfW.9jf2JYGKv1m', NULL, '2022-02-07 23:32:49', '2022-02-07 23:33:08'),
(8, 'Admin TU', 'admin_tu@gmail.com', 'Penataan, Pengawasan dan Peningkatan Kapasitas Lingkungan Hidup', '$2y$10$A7jSSVYr4WEAv8kypWhhxe3rokvH.4CHkrra4/A5ASPvKuV9UTPpq', NULL, '2022-02-07 23:46:22', '2022-03-06 03:08:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archives`
--
ALTER TABLE `archives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `archives_category_id_foreign` (`category_id`),
  ADD KEY `archives_field_id_foreign` (`field_id`);

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
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fields_name_unique` (`name`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archives`
--
ALTER TABLE `archives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `archives`
--
ALTER TABLE `archives`
  ADD CONSTRAINT `archives_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `archives_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
