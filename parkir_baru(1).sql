-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2022 at 02:58 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parkir_baru`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi_petugas`
--

CREATE TABLE `absensi_petugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_masuk_absen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_keluar_absen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `car_parks_id` int(5) DEFAULT NULL,
  `mall_id` int(11) NOT NULL,
  `plat_nomor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_masuk` time NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_keluar` time DEFAULT NULL,
  `tanggal_keluar` datetime DEFAULT NULL,
  `biaya_parkir` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `car_parks_id`, `mall_id`, `plat_nomor`, `jam_masuk`, `tanggal_masuk`, `status`, `jam_keluar`, `tanggal_keluar`, `biaya_parkir`, `deleted_at`, `created_at`, `updated_at`) VALUES
(24, NULL, 1, 'K 888 I', '23:50:00', '2022-04-18', 'KELUAR', '00:08:47', '2022-04-19 00:19:50', 10000, NULL, '2022-04-19 16:50:41', '2022-04-19 17:08:47'),
(26, NULL, 1, 'Q 23 R', '15:14:00', '2022-04-20', 'KELUAR', '16:09:50', '2022-04-20 16:09:50', 10000, NULL, '2022-04-20 08:14:41', '2022-04-20 09:09:50'),
(33, NULL, 1, 'A rrrr D', '15:25:00', '2022-04-20', 'KELUAR', '16:12:46', '2022-04-20 16:12:46', 10000, NULL, '2022-04-20 08:25:09', '2022-04-20 09:12:46'),
(34, NULL, 1, 'A gkhgkh 0', '15:28:00', '2022-04-20', 'KELUAR', '16:20:49', '2022-04-20 16:20:49', 10000, NULL, '2022-04-20 08:28:31', '2022-04-20 09:20:49'),
(35, NULL, 1, 'T 000 l', '15:29:00', '2022-04-20', 'KELUAR', '16:19:27', '2022-04-20 16:19:27', 10000, NULL, '2022-04-20 08:29:18', '2022-04-20 09:19:27'),
(38, NULL, 1, 'L 6870 UE', '13:36:00', '2022-05-01', 'KELUAR', '13:39:43', '2022-04-26 13:39:43', 10000, NULL, '2022-04-26 06:36:22', '2022-04-26 06:39:43'),
(40, NULL, 1, 'K 0101 K', '14:52:00', '2022-04-27', 'KELUAR', '14:53:07', '2022-04-27 14:53:07', 10000, NULL, '2022-04-27 07:52:04', '2022-04-27 07:53:07'),
(41, NULL, 1, 'L 99 KG', '14:52:00', '2022-04-27', 'KELUAR', '14:53:09', '2022-04-27 14:53:09', 10000, NULL, '2022-04-27 07:52:26', '2022-04-27 07:53:09'),
(42, NULL, 1, 'L 99 KA', '14:53:00', '2022-04-27', 'KELUAR', '14:53:36', '2022-04-27 14:53:36', 10000, NULL, '2022-04-27 07:53:22', '2022-04-27 07:53:36'),
(43, NULL, 1, 'L 787 KY', '15:07:00', '2022-04-27', 'KELUAR', '15:09:39', '2022-04-27 15:09:39', 10000, NULL, '2022-04-27 08:07:16', '2022-04-27 08:09:39'),
(44, NULL, 1, 'W 111 K', '15:07:00', '2022-04-27', 'PARKING', NULL, NULL, NULL, NULL, '2022-04-27 08:07:28', '2022-04-27 08:07:28');

-- --------------------------------------------------------

--
-- Table structure for table `car_parks`
--

CREATE TABLE `car_parks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mall_id` int(11) DEFAULT NULL,
  `nama_ruang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lantai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_parks`
--

INSERT INTO `car_parks` (`id`, `mall_id`, `nama_ruang`, `lantai`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 'TP1', '1', NULL, '2022-04-27 08:09:39', 'belum'),
(2, 1, 'TP2', '1', NULL, '2022-04-27 07:53:09', 'belum'),
(3, 1, 'TP3', '1', NULL, '2022-04-19 05:56:07', 'belum'),
(5, 1, 'TP4', '2', NULL, '2022-04-19 05:56:08', 'belum'),
(6, 1, 'TP5', '2', NULL, '2022-04-19 05:56:10', 'belum'),
(7, 1, 'TP6', '1', '2022-04-18 23:53:24', '2022-04-18 23:53:24', 'belum'),
(8, 1, 'TP7', '2', '2022-04-19 05:46:56', '2022-04-19 05:46:56', 'belum'),
(9, 1, 'TP8', '2', '2022-04-19 05:47:51', '2022-04-19 05:47:51', 'belum'),
(10, 1, 'TP9', '2', '2022-04-19 05:48:01', '2022-04-19 05:48:01', 'belum'),
(12, 2, 'R1', '1', '2022-04-27 06:29:10', '2022-04-27 06:29:10', 'belum');

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
-- Table structure for table `malls`
--

CREATE TABLE `malls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_mall` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `malls`
--

INSERT INTO `malls` (`id`, `nama_mall`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Tunjungan Plaza', NULL, NULL, NULL),
(2, 'Royal Plaza', NULL, NULL, NULL),
(3, 'Delta Plaza', NULL, NULL, NULL);

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
(4, '2022_04_02_161929_alter_users_add_username', 2),
(5, '2022_04_03_061618_create_parking_list_table', 3),
(6, '2022_04_03_062304_create_parking_list_table', 4),
(7, '2022_04_05_143257_create_report_table', 5),
(8, '2022_04_05_144954_alter_parking_list_add_report_id', 6),
(9, '2022_04_05_163056_alter_parking_list_add_biaya', 7),
(10, '2022_04_05_193325_create_mall__table', 8),
(11, '2022_04_06_083719_create_kendaraan_table', 9),
(12, '2022_04_06_083845_alter_users_add_roles', 10),
(13, '2022_04_06_084246_create_absensi_table', 11),
(14, '2022_04_06_153309_create_cars_table', 12),
(15, '2022_04_07_053707_alter_users_add_mall_id', 13),
(16, '2022_04_13_034659_create_malls_table', 14),
(17, '2022_04_13_035155_create_malls_table', 15),
(18, '2022_04_13_065046_create_car_park_table', 16),
(19, '2022_04_13_065429_create_car_parks_table', 17),
(20, '2022_04_13_085448_create_car_parks_table', 18),
(21, '2022_04_15_174123_alter_car_parks_add_status', 19);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mall_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `username`, `roles`, `mall_id`) VALUES
(1, 'Muhammad Hanif Rifqi', 'hanif.rifqi17@gmail.com', NULL, '$2y$10$WY3UzHSbF0KUl/TV0wonhuGKguBpO0n76DnU5fToJ775t2hpDGxvO', NULL, '2022-04-02 09:27:39', '2022-04-02 09:27:39', 'Savira', 'PETUGAS MASUK', 1),
(2, 'vira', 'stanceworking@gmail.com', NULL, '$2y$10$WNdbeeJZDytSfMHtT1p39ePqrIzKE75IC2xXmv5LY9bgFDx32YHS.', NULL, '2022-04-02 20:49:22', '2022-04-02 20:49:22', 'vira', 'PETUGAS KELUAR', 1),
(3, 'Yudha ard', 'yuda@gmail.com', NULL, '$2y$10$6fpJ74QDd8dBhs51U9bTOeFMyjysz1my1tMrTeLDbhYNB74AUYKYS', NULL, '2022-04-15 09:57:42', '2022-04-15 09:57:42', 'yud', 'PETUGAS RUANG', 1),
(4, 'admin', 'admin@gmail.com', NULL, '$2y$10$OBgj9sQnNnzfiCM7SqZT8epmoxDeLu/aGexRPCXoekMHsM4BKtotu', NULL, '2022-04-17 07:48:01', '2022-04-17 07:48:01', 'admin', 'ADMIN', NULL),
(6, 'lololo', 'lololo@gmail.com', NULL, '$2y$10$af2.tgiSNFEx69pc6hTe0eNu8If7w2QhDnnxCR/8AhsATjA7ldQw.', NULL, '2022-04-27 03:30:41', '2022-04-27 03:30:41', 'lolo', 'PETUGAS RUANG', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi_petugas`
--
ALTER TABLE `absensi_petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_parks`
--
ALTER TABLE `car_parks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `malls`
--
ALTER TABLE `malls`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi_petugas`
--
ALTER TABLE `absensi_petugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `car_parks`
--
ALTER TABLE `car_parks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `malls`
--
ALTER TABLE `malls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
