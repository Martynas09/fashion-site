-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2023 at 08:22 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashion_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `google2fa_secret` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `google2fa_secret`) VALUES
(1, 'admin', '$2y$10$GB56FDqws/F1bY9JTZM6PO9FP7Zq5bLJHeCW6MG1lYdK9bsacFsyi', 'KJYHISDRIFLDAV3TIFFTEQTGGEZVAMLMFLJPJHOPJDEDRU3J4XUNVRJOY6XMSVYS');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `group_activity_id` bigint(20) UNSIGNED NOT NULL,
  `notified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `name`, `group_activity_id`, `notified`) VALUES
(1, 'Veikla 1', 1, 0),
(2, 'Veikla 2', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `group_activity`
--

CREATE TABLE `group_activity` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `free_spaces` int(11) NOT NULL,
  `start_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_activity`
--

INSERT INTO `group_activity` (`id`, `title`, `description`, `size`, `free_spaces`, `start_time`) VALUES
(1, 'Veikla 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam finibus dolor eget nulla mollis tempus. Maecenas a nibh pharetra, efficitur leo ac, ultrices magna. Donec non consequat sem.', 10, 8, NULL),
(2, 'Veikla 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam finibus dolor eget nulla mollis tempus. Maecenas a nibh pharetra, efficitur leo ac, ultrices magna. Donec non consequat sem.', 12, 11, '2022-12-15 03:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `group_member`
--

CREATE TABLE `group_member` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` enum('vyras','moteris','nepateikta') NOT NULL,
  `age` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `group_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_member`
--

INSERT INTO `group_member` (`id`, `email`, `gender`, `age`, `name`, `surname`, `phone_number`, `group_id`) VALUES
(1, 'martynas@gmail.com', 'vyras', 22, 'Test', 'Test', '86868686', 1),
(2, 'jonas.jonaitis@gmail.com', 'nepateikta', 25, 'Jonas', 'Jonaitis', '86868686', 2),
(3, 'martynas200012@gmail.com', 'vyras', 22, 'neMartynas', 'neGaulia', '8686868686', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_10_11_152826_create_post', 1),
(3, '2022_10_11_152846_create_photo', 1),
(4, '2022_10_11_152855_create_service', 1),
(5, '2022_10_11_152902_create_group_activity', 1),
(6, '2022_10_11_152903_create_group', 1),
(7, '2022_10_11_152934_create_admin', 1),
(8, '2022_10_11_152945_create_group_member', 1),
(9, '2022_12_15_095824_purchased_service', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo_url` varchar(255) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `group_activity_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `photo_url`, `post_id`, `service_id`, `group_activity_id`) VALUES
(2, '278793805_531647018370850_2802047824868302734_n.jpg', 1, NULL, NULL),
(3, '269729920_456480402554179_7881039311592518541_n.png', 2, NULL, NULL),
(4, 'photo-1483985988355-763728e1935b.png', NULL, 2, NULL),
(5, 'premium_photo-1664202526132-7da09cfeb243.png', NULL, 3, NULL),
(6, 'sincerely-media-dGxOgeXAXm8-unsplash.jpg', NULL, NULL, 1),
(8, 'photo-1483985988355-763728e1935b.png', NULL, NULL, 2),
(9, 'headway-5QgIuuBxKwM-unsplash.jpg', NULL, NULL, 1),
(10, 'charlesdeluvio-Lks7vei-eAg-unsplash.jpg', NULL, NULL, 1),
(12, 'charlesdeluvio-Lks7vei-eAg-unsplash.jpg', NULL, 2, NULL),
(13, 'headway-5QgIuuBxKwM-unsplash.jpg', NULL, 2, NULL),
(15, 'headway-5QgIuuBxKwM-unsplash.jpg', NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `description`, `created_at`) VALUES
(1, NULL, '2022-12-15'),
(2, NULL, '2022-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `purchased_service`
--

CREATE TABLE `purchased_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `status` enum('užsakyta','vykdoma','užbaigta') NOT NULL,
  `created_at` date NOT NULL,
  `order_number` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchased_service`
--

INSERT INTO `purchased_service` (`id`, `service_id`, `email`, `name`, `phone_number`, `status`, `created_at`, `order_number`) VALUES
(3, 2, 'martynas200012@gmail.com', 'Martynas', '860073930', 'užsakyta', '2022-12-15', '#00000003'),
(4, 2, 'martynas200012@gmail.com', 'Studentas', '8686868686', 'užbaigta', '2022-12-16', '#00000003'),
(5, 3, 'testas@gmail.com', 'Testas', '860073967', 'užsakyta', '2022-12-16', '#00000004'),
(6, 2, 'martynas200012@gmail.com', 'Martynas Gaulia', '860073930', 'užsakyta', '2023-01-05', '#00000034'),
(8, 5, 'martynas@gmail.com', 'Martynas Gaulia', '860073930', 'užbaigta', '2023-01-07', '#00000034');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `title`, `description`, `price`) VALUES
(2, 'Paslauga 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam finibus dolor eget nulla mollis tempus. Maecenas a nibh pharetra, efficitur leo ac, ultrices magna. Donec non consequat sem.', 50),
(3, 'Paslauga 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam finibus dolor eget nulla mollis tempus. Maecenas a nibh pharetra, efficitur leo ac, ultrices magna. Donec non consequat sem..', 70);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_group_activity_id_foreign` (`group_activity_id`);

--
-- Indexes for table `group_activity`
--
ALTER TABLE `group_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_member`
--
ALTER TABLE `group_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_member_group_id_foreign` (`group_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchased_service`
--
ALTER TABLE `purchased_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `group_activity`
--
ALTER TABLE `group_activity`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `group_member`
--
ALTER TABLE `group_member`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchased_service`
--
ALTER TABLE `purchased_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `group_group_activity_id_foreign` FOREIGN KEY (`group_activity_id`) REFERENCES `group_activity` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `group_member`
--
ALTER TABLE `group_member`
  ADD CONSTRAINT `group_member_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
