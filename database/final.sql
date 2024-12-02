-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2024 at 01:10 PM
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
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_status` tinyint(4) NOT NULL DEFAULT 0,
  `delivery_status` tinyint(4) NOT NULL DEFAULT 0,
  `delivery_date` timestamp NULL DEFAULT NULL,
  `order_final_amount` decimal(20,3) DEFAULT NULL,
  `order_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `payment_status`, `delivery_status`, `delivery_date`, `order_final_amount`, `order_status`, `created_at`) VALUES
(1, 1, 1, 1, 1, '2024-07-19 13:01:54', 100000.000, 1, '2024-07-19 13:09:17'),
(2, 2, 2, 1, 1, '2024-07-19 13:01:54', 100000.000, 1, '2024-07-19 13:09:17'),
(3, 3, 3, 1, 1, '2024-07-19 13:01:54', 100000.000, 1, '2024-07-19 13:09:17'),
(4, 4, 4, 1, 1, '2024-07-19 13:01:54', 100000.000, 1, '2024-07-19 13:09:17'),
(5, 5, 5, 1, 1, '2024-07-19 13:01:54', 100000.000, 1, '2024-07-19 13:09:17'),
(6, 6, 6, 1, 1, '2024-07-19 13:01:54', 100000.000, 1, '2024-07-19 13:09:17'),
(7, 7, 7, 1, 1, '2024-07-19 13:01:54', 100000.000, 1, '2024-07-19 13:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `number` int(11) NOT NULL DEFAULT 1,
  `final_product_price` decimal(20,3) DEFAULT NULL,
  `final_total_price` decimal(20,3) DEFAULT NULL COMMENT 'number * final_total_price',
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `number`, `final_product_price`, `final_total_price`, `created_at`) VALUES
(1, 1, 1, 1, 100000.000, 200000.000, '2024-07-19 13:58:40'),
(2, 2, 2, 2, 100000.000, 200000.000, '2024-07-19 13:58:41'),
(3, 3, 3, 3, 100000.000, 200000.000, '2024-07-19 13:58:42'),
(4, 4, 4, 4, 100000.000, 200000.000, '2024-07-19 13:58:43'),
(5, 5, 5, 5, 100000.000, 200000.000, '2024-07-19 13:58:44');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(20,3) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `gateway` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `bank_first_response` text DEFAULT NULL,
  `bank_second_response` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => inactive, 1 => active',
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `amount`, `user_id`, `gateway`, `transaction_id`, `bank_first_response`, `bank_second_response`, `status`, `created_at`) VALUES
(1, 10000.000, 1, 'Saman-Gateway', 'The-transaction-id-1', 'The-transaction-is-success-1', 'Evrey-things-is-ok-1', 1, '2024-07-18 11:13:12'),
(2, 20000.000, 2, 'Sasan-Gateway', 'The-transaction-id-2', 'The-transaction-is-success-2', 'Evrey-things-is-ok-2', 1, '2024-07-18 11:13:13'),
(3, 30000.000, 3, 'Satar-Gateway', 'The-transaction-id-3', 'The-transaction-is-success-3', 'Evrey-things-is-ok-3', 1, '2024-07-18 11:13:14'),
(4, 40000.000, 4, 'Jaber-Gateway', 'The-transaction-id-4', 'The-transaction-is-success-4', 'Evrey-things-is-ok-4', 1, '2024-07-18 11:13:15'),
(5, 50000.000, 5, 'Ali-Gateway', 'The-transaction-id-5', 'The-transaction-is-success-5', 'Evrey-things-is-ok-5', 1, '2024-07-18 11:13:16');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `price` decimal(20,3) NOT NULL,
  `discount` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 => inactive, 1 => active',
  `sold_number` tinyint(4) NOT NULL DEFAULT 0,
  `frozen_number` tinyint(4) NOT NULL DEFAULT 0,
  `marketable_number` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `description`, `image`, `price`, `discount`, `status`, `sold_number`, `frozen_number`, `marketable_number`, `created_at`) VALUES
(1, 'this is content for first', 'image-path-1', 1000000.000, 10, 1, 0, 0, 0, '2024-07-17 15:16:30'),
(2, 'this is content for second', 'image-path-2', 1100000.000, 11, 1, 0, 0, 0, '2024-07-17 15:16:31'),
(3, 'this is content for third', 'image-path-3', 1200000.000, 12, 1, 0, 0, 0, '2024-07-17 15:16:32'),
(4, 'this is content for fourth', 'image-path-4', 1300000.000, 13, 1, 0, 0, 0, '2024-07-17 15:16:33'),
(5, 'this is content for fifth', 'image-path-5', 1400000.000, 14, 1, 0, 0, 0, '2024-07-17 15:16:34'),
(6, 'this is content for sixth', 'image-path-6', 1500000.000, 15, 1, 0, 0, 0, '2024-07-17 15:16:35'),
(6, 'this is content for seventh', 'image-path-7', 1600000.000, 16, 1, 0, 0, 0, '2024-07-17 15:16:36'),
(7, 'this is content for eighth', 'image-path-8', 1700000.000, 17, 1, 0, 0, 0, '2024-07-17 15:16:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => user, 1 => admin',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => is not, 1 => is',
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `mobile`, `first_name`, `last_name`, `email_verified_at`, `mobile_verified_at`, `password`, `remember_token`, `user_type`, `status`, `created_at`) VALUES
(1, 'first@gmail.com', '09999999999', 'First', 'Member', NULL, NULL, '1pass', NULL, 1, 1, '2024-06-19 18:05:25'),
(2, 'second@gmail.com', '09999999998', 'Second', 'mEmber', NULL, NULL, '2pass', NULL, 1, 1, '2024-06-19 18:05:26'),
(3, 'third@gmail.com', '09999999997', 'Third', 'meMber', NULL, NULL, '3pass', NULL, 1, 1, '2024-06-19 18:05:27'),
(4, 'fourth@gmail.com', '09999999996', 'Forth', 'memBer', NULL, NULL, '4pass', NULL, 1, 1, '2024-06-19 18:05:28'),
(5, 'fifth@gmail.com', '09999999995', 'Fifth', 'membEr', NULL, NULL, '5pass', NULL, 1, 1, '2024-06-19 18:05:29'),
(6, 'sixth@gmail.com', '09999999994', 'Sixth', 'membeR', NULL, NULL, '6pass', NULL, 1, 1, '2024-06-19 18:05:30'),
(7, 'seventh@gmail.com', '09999999993', 'Seven', 'memberM', NULL, NULL, '7pass', NULL, 1, 1, '2024-06-19 18:05:31'),
(8, 'eighth@gmail.com', '09999999992', 'Eighth', 'membermE', NULL, NULL, '8pass', NULL, 1, 1, '2024-06-19 18:05:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
