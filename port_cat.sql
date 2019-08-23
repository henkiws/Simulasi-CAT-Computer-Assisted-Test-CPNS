-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2019 at 03:06 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `port_cat`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer_sheet`
--

CREATE TABLE `answer_sheet` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ljk_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `question_group` int(11) DEFAULT NULL,
  `option_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'jawaban benar',
  `answer_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'jawaban user',
  `value` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answer_sheet`
--

INSERT INTO `answer_sheet` (`id`, `ljk_id`, `question_id`, `question_group`, `option_id`, `answer_id`, `value`) VALUES
(1, 3, 1, 1, NULL, NULL, NULL),
(2, 3, 3, 2, NULL, NULL, NULL),
(3, 3, 2, 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ljk`
--

CREATE TABLE `ljk` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `skor_twk` int(11) NOT NULL DEFAULT 0,
  `skor_tiu` int(11) NOT NULL DEFAULT 0,
  `skor_tkp` int(11) NOT NULL DEFAULT 0,
  `skor_total` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0:belum selesai 1:selesai',
  `keterangan` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ljk`
--

INSERT INTO `ljk` (`id`, `user_id`, `skor_twk`, `skor_tiu`, `skor_tkp`, `skor_total`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
(3, 3, 0, 0, 0, 0, 0, NULL, '2019-08-23 13:01:58', '2019-08-23 13:01:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_11_08_103613_create_questions_table', 1),
(4, '2018_11_08_103644_create_options_table', 1),
(5, '2018_11_08_134250_Add_isText_option_table', 1),
(6, '2018_11_08_134402_Add_isText_questions_table', 1),
(7, '2018_11_10_221527_create_permission_tables', 1),
(8, '2018_11_13_122124_add_sofdeletes_option_table', 1),
(9, '2018_11_27_131644_create_user_detail_table', 1),
(10, '2018_11_27_142444_create_ljk_table', 1),
(11, '2018_11_27_142556_create_answer_sheet_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `choise` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` tinyint(4) NOT NULL COMMENT '0:false; 1:true',
  `istext` tinyint(4) NOT NULL COMMENT '1:text; 0:image',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `choise`, `answer`, `istext`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'pohon beringin', 0, 1, '2019-08-23 12:47:04', '2019-08-23 12:47:04', NULL),
(2, 1, 'padi dan kapas', 0, 1, '2019-08-23 12:47:04', '2019-08-23 12:47:04', NULL),
(3, 1, 'rantai emas', 5, 1, '2019-08-23 12:47:04', '2019-08-23 12:47:04', NULL),
(4, 1, 'banteng', 0, 1, '2019-08-23 12:47:04', '2019-08-23 12:47:04', NULL),
(5, 1, 'kalung emas', 0, 1, '2019-08-23 12:47:04', '2019-08-23 12:47:04', NULL),
(6, 2, 'satu', 1, 1, '2019-08-23 12:49:05', '2019-08-23 12:49:05', NULL),
(7, 2, 'dua', 2, 1, '2019-08-23 12:49:05', '2019-08-23 12:49:05', NULL),
(8, 2, 'tiga', 5, 1, '2019-08-23 12:49:05', '2019-08-23 12:49:05', NULL),
(9, 2, 'empat', 4, 1, '2019-08-23 12:49:05', '2019-08-23 12:49:05', NULL),
(10, 2, 'lima', 3, 1, '2019-08-23 12:49:05', '2019-08-23 12:49:05', NULL),
(11, 3, 'pil satu', 0, 1, '2019-08-23 12:49:42', '2019-08-23 12:49:42', NULL),
(12, 3, 'pil dua', 0, 1, '2019-08-23 12:49:42', '2019-08-23 12:49:42', NULL),
(13, 3, 'pil tiga', 0, 1, '2019-08-23 12:49:42', '2019-08-23 12:49:42', NULL),
(14, 3, 'pil empat', 5, 1, '2019-08-23 12:49:42', '2019-08-23 12:49:42', NULL),
(15, 3, 'pil lima', 0, 1, '2019-08-23 12:49:42', '2019-08-23 12:49:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_group` tinyint(4) NOT NULL COMMENT '1:TWK; 2:TIU; 3:TKP',
  `istext` tinyint(4) NOT NULL COMMENT '1:text; 0:image',
  `information` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pembahasan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `question_type`, `question_group`, `istext`, `information`, `pembahasan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'lambang sila kelima adalah', 'pancasila', 1, 1, NULL, NULL, '2019-08-23 12:47:04', '2019-08-23 12:47:04', NULL),
(2, 'ini pertanyaananya misalnyaa', 'tanggung jawab', 3, 1, 'heheheheh', NULL, '2019-08-23 12:49:05', '2019-08-23 12:49:05', NULL),
(3, 'pertanyaan di TIU yaaa', 'kecerdasan', 2, 1, NULL, NULL, '2019-08-23 12:49:42', '2019-08-23 12:49:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'web', '2019-08-23 12:04:04', '2019-08-23 12:04:04'),
(2, 'user', 'web', '2019-08-23 12:04:13', '2019-08-23 12:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(6) DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'henki', 'user@mail.com', '$2y$10$7AYR4CnTHREYt8IzMpWUdOkXwdYtCDu.AXPQtB4KwUqKPkyJ5vorm', 1, NULL, '2019-08-23 12:29:27', '2019-08-23 12:29:27'),
(4, 'superadmin', 'admin@mail.com', '$2y$10$q2GC2WxEsP06gcDpofp62erudYXIxFddlx6ByRAm8TgWEHX4b1Iwq', 1, NULL, '2019-08-23 12:42:16', '2019-08-23 12:42:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `date_birth` date NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(4) NOT NULL COMMENT '1:male; 0:female',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `user_id`, `date_birth`, `address`, `gender`, `created_at`, `updated_at`) VALUES
(1, 3, '1995-08-19', 'adadehh', 1, '2019-08-23 12:29:27', '2019-08-23 12:29:27'),
(2, 4, '1111-11-11', 'admin', 1, '2019-08-23 12:42:16', '2019-08-23 12:42:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer_sheet`
--
ALTER TABLE `answer_sheet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answer_sheet_ljk_id_foreign` (`ljk_id`),
  ADD KEY `answer_sheet_question_id_foreign` (`question_id`),
  ADD KEY `answer_sheet_option_id_foreign` (`option_id`),
  ADD KEY `answer_sheet_answer_id_foreign` (`answer_id`);

--
-- Indexes for table `ljk`
--
ALTER TABLE `ljk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ljk_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `options_question_id_foreign` (`question_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_detail_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer_sheet`
--
ALTER TABLE `answer_sheet`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ljk`
--
ALTER TABLE `ljk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer_sheet`
--
ALTER TABLE `answer_sheet`
  ADD CONSTRAINT `answer_sheet_answer_id_foreign` FOREIGN KEY (`answer_id`) REFERENCES `options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answer_sheet_ljk_id_foreign` FOREIGN KEY (`ljk_id`) REFERENCES `ljk` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answer_sheet_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answer_sheet_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ljk`
--
ALTER TABLE `ljk`
  ADD CONSTRAINT `ljk_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD CONSTRAINT `user_detail_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
