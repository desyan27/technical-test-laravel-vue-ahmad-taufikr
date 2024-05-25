-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2024 at 08:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `technical_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ct_id` bigint(20) UNSIGNED NOT NULL,
  `ct_code` varchar(255) NOT NULL,
  `ct_name` varchar(255) NOT NULL,
  `ct_created_at` timestamp NULL DEFAULT NULL,
  `ct_updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ct_id`, `ct_code`, `ct_name`, `ct_created_at`, `ct_updated_at`) VALUES
(2, 'CT-002', 'Kosmetik', '2024-05-22 00:18:11', '2024-05-24 23:51:14'),
(3, 'CT-003', 'Alat Musik', '2024-05-22 00:18:11', '2024-05-24 23:29:44'),
(4, 'CT-004', 'Elektronik', '2024-05-22 00:18:11', '2024-05-24 23:28:44'),
(5, 'CT-005', 'Laptop', '2024-05-22 00:18:11', '2024-05-23 11:46:50'),
(7, 'CT-006', 'Komputer', '2024-05-24 23:51:31', '2024-05-24 23:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_05_17_060320_create_products_table', 1),
(5, '2024_05_17_071913_create_categories_table', 1),
(6, '2024_05_17_072749_create_orders_table', 1),
(7, '2024_05_17_074219_add_foreign_key_to_table_products', 1),
(8, '2024_05_17_074539_add_foreign_key_to_table_orders', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `or_id` bigint(20) UNSIGNED NOT NULL,
  `or_pd_id` bigint(20) UNSIGNED NOT NULL,
  `or_amount` bigint(20) NOT NULL,
  `or_created_at` timestamp NULL DEFAULT NULL,
  `or_updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`or_id`, `or_pd_id`, `or_amount`, `or_created_at`, `or_updated_at`) VALUES
(1, 2, 900, '2024-05-15 23:20:13', '2024-05-24 23:33:53'),
(2, 9, 519, '2024-04-23 05:00:09', '2024-05-16 07:31:41'),
(5, 9, 894, '2024-05-01 20:59:49', '2024-05-16 20:54:38'),
(8, 8, 800, '2024-04-22 12:18:38', '2024-05-23 11:26:20'),
(9, 5, 899, '2024-05-03 13:57:05', '2024-05-24 23:29:10'),
(11, 1, 345, '2024-05-22 12:24:06', '2024-05-22 12:24:06'),
(16, 12, 500, '2024-05-24 23:34:16', '2024-05-24 23:34:16'),
(17, 1, 678, '2024-05-24 23:52:06', '2024-05-24 23:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pd_id` bigint(20) UNSIGNED NOT NULL,
  `pd_code` varchar(255) NOT NULL,
  `pd_ct_id` bigint(20) UNSIGNED NOT NULL,
  `pd_name` varchar(255) NOT NULL,
  `pd_price` bigint(20) NOT NULL,
  `pd_created_at` timestamp NULL DEFAULT NULL,
  `pd_updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pd_id`, `pd_code`, `pd_ct_id`, `pd_name`, `pd_price`, `pd_created_at`, `pd_updated_at`) VALUES
(1, 'PD-001', 5, 'tempore repellat et', 144878, '2024-05-13 04:25:01', '2024-05-24 23:28:21'),
(2, 'PD-002', 5, 'nemo odit voluptatibus', 11709, '2024-04-28 23:42:37', '2024-05-20 18:30:16'),
(4, 'PD-004', 4, 'optio exercitationem aut', 632230, '2024-04-23 18:08:44', '2024-05-17 14:23:52'),
(5, 'PD-005', 5, 'dolore sunt maxime', 510071, '2024-05-09 05:53:47', '2024-05-11 07:02:51'),
(7, 'PD-007', 3, 'quaerat qui quia', 764013, '2024-05-14 17:21:51', '2024-05-20 10:52:09'),
(8, 'PD-008', 4, 'voluptas blanditiis natus', 110005, '2024-04-23 10:38:33', '2024-04-30 03:01:51'),
(9, 'PD-009', 2, 'quis sint est', 936156, '2024-05-10 07:15:03', '2024-05-19 16:31:08'),
(12, 'PD-012', 3, 'Piano', 400000, '2024-05-22 04:26:18', '2024-05-24 23:29:32');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('TGWMiG9nw7MGxqWax7Ul5dpK2QtUNrYwpMGQ4bho', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36 Edg/125.0.0.0', 'YToyOntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoibFRtanhVQVJzWm54SWVoVXlsUjNtNUx1OW56N1JMN3RYRWtSYnZneCI7fQ==', 1716619948);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `us_id` bigint(20) UNSIGNED NOT NULL,
  `us_name` varchar(255) NOT NULL,
  `us_password` varchar(255) NOT NULL,
  `us_email` varchar(255) NOT NULL,
  `us_phone_number` varchar(255) DEFAULT NULL,
  `us_address` text DEFAULT NULL,
  `us_created_at` timestamp NULL DEFAULT NULL,
  `us_updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`us_id`, `us_name`, `us_password`, `us_email`, `us_phone_number`, `us_address`, `us_created_at`, `us_updated_at`) VALUES
(1, 'Prof. Lowell', '$2y$12$XBSMKJayS.HN0cI/Vgeqg.6L.JxYaQKyX3fJBgvnkBF/r/n4ypB4S', 'alayna22@example.net', '+15517377', '28842 Maggio Rest Suite 108\nNasirmouth, AL 34627', '2024-04-28 21:55:13', '2024-05-24 23:30:30'),
(2, 'Mrs. Joyce Langosh DVM', '$2y$12$i2Ki2KbQsZUMsprnCCjjWuyjPxn3I6u4o9CBzpSNvHms/sstZRSmu', 'pthiel@example.com', '786.824.8180', '2918 Trisha Bypass Apt. 169\nMerrittfurt, CA 92698', '2024-04-24 19:45:18', '2024-05-07 09:20:41'),
(3, 'Eino Hintz Pruchell', '$2y$12$VQpWNGc.yIuhfEEecvVzWOzrNoognK0tnXVEefunV6o7UrasMxI0a', 'russel.skylar@example.net', '+56600333', '51332 Rice Circles Apt. 430\nPort Montana, VA 69325', '2024-05-20 13:58:30', '2024-05-24 23:31:27'),
(4, 'Enrico Yost', '$2y$12$FCaSyjUKGdyfXK/PMYuUruaZ8BR5HNWMPLbgCBtR6yMvA8MFLdAqy', 'ubechtelar@example.org', '774-306-3645', '1294 Hazle Islands\nArlenemouth, AR 18201', '2024-05-07 15:35:38', '2024-05-21 13:39:10'),
(5, 'Mr. Aric Frami', '$2y$12$OKTKhT3W2qyFI7a5GtcEu.Uoch88ghcoOnucb9ggJi50Mby3DTuD2', 'miller.moen@example.com', '1-845-820-6959', '4181 Wilkinson Springs\nWest Jamie, MA 41839', '2024-05-02 05:47:50', '2024-05-13 02:12:47'),
(6, 'Victoria Reichert', '$2y$12$S9T5tjRHXqMFaG0tJ48bpeSKPjDbLxY1IwrIcKn1LwknBqtR4m/f.', 'kuhn.edmond@example.net', '+18139883839', '9484 Hammes Haven\nNew Adrianna, MT 41704-7836', '2024-04-26 10:11:55', '2024-05-13 03:21:46'),
(7, 'Samir Lowe', '$2y$12$qjgYMbVOZazfkQ0CLjv4zOW9/Vb3og/U78cjrmUNzVTdgzm0kcx.S', 'nienow.cathy@example.com', '+1 (856) 770-6877', '96166 Ratke Circle Suite 175\nNew Marisashire, SD 33602', '2024-05-04 15:54:20', '2024-05-24 23:33:26'),
(9, 'Marcelle Hamill', '$2y$12$oL7Nkp58d8Ka7NZMK4zCQOrTUi0GxQ2HhtnzypBVYPSAlHTeH18LG', 'idella.goodwin@example.org', '(602) 362-3897', '82619 Bahringer Falls Suite 943\nEast Raheem, TN 82170', '2024-05-06 16:57:15', '2024-05-07 08:53:10'),
(11, 'admin27', '$2y$12$sqm2HM8rad0qPcwROAwhVOem9D659E6/SndGm74Xfn4ChaUqxYvTq', 'admin27@mail.com', '081563963956', 'gg.pabaki 1 no.2', '2024-05-22 00:21:47', '2024-05-24 22:51:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`or_id`),
  ADD KEY `orders_or_pd_id_foreign` (`or_pd_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pd_id`),
  ADD KEY `products_pd_ct_id_foreign` (`pd_ct_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`us_id`),
  ADD UNIQUE KEY `users_us_email_unique` (`us_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ct_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `or_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pd_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `us_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_or_pd_id_foreign` FOREIGN KEY (`or_pd_id`) REFERENCES `products` (`pd_id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_pd_ct_id_foreign` FOREIGN KEY (`pd_ct_id`) REFERENCES `categories` (`ct_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
