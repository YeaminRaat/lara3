-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2019 at 06:16 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lara3`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_desc` mediumtext COLLATE utf8mb4_unicode_ci,
  `brand_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_desc`, `brand_image`, `brand_status`, `created_at`, `updated_at`) VALUES
(2, 'Samsung', 'this is description', 'admin/images/WL450_AG_FR.webp', 1, '2019-11-22 23:54:34', '2019-12-07 11:57:32'),
(3, 'Dell', 'Hello Dell.', 'admin/images/men-s-backpacking-shirt-travel100-burgundy.jpg', 1, '2019-11-23 00:00:42', '2019-12-07 11:57:17'),
(4, 'Yellow', NULL, '', 1, '2019-12-07 11:57:50', '2019-12-07 11:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_desc` mediumtext COLLATE utf8mb4_unicode_ci,
  `cat_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `cat_desc`, `cat_image`, `cat_status`, `created_at`, `updated_at`) VALUES
(7, 'T-shirt', 'This is T-shirt', 'admin/images/images.jpg', 1, '2019-11-22 12:23:21', '2019-12-01 01:05:09'),
(8, 'Jeans', 'Description', 'admin/images/1-500x500.jpg', 1, '2019-11-28 20:53:57', '2019-12-06 00:29:24'),
(9, 'Pants', 'this is pant', 'admin/images/men-s-backpacking-shirt-travel100-burgundy.jpg', 1, '2019-12-03 09:57:57', '2019-12-12 02:01:39'),
(10, 'Electronics', NULL, '', 1, '2019-12-07 11:58:04', '2019-12-07 13:34:03');

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
(3, '2019_11_19_175400_create_categories_table', 1),
(4, '2019_11_23_052509_create_brands_table', 2),
(5, '2019_12_03_160921_create_products_table', 3);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` double(10,2) DEFAULT NULL,
  `product_price` double(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `brand_id`, `product_name`, `short_desc`, `long_desc`, `discount_price`, `product_price`, `quantity`, `size`, `image`, `gallery_image`, `status`, `created_at`, `updated_at`) VALUES
(9, 7, 4, 'Headphone', 'dd', 'ddd', 100.00, 150.00, 2, 'l', 'admin/images/product_images/20191207185149_images.jpg', '[\"admin\\/images\\/product_images\\/1-500x500.jpg\",\"admin\\/images\\/product_images\\/41TxNIo3cQL.jpg\",\"admin\\/images\\/product_images\\/46-bfrybluesht02-being-fab-original-imaekjr8ymhnxznp.jpeg\"]', 1, '2019-12-07 12:51:49', '2019-12-07 12:51:49'),
(10, 7, 3, 'Mobile', 'wwww', 'aa', 1000.00, 1200.00, 33, 'xl', 'admin/images/product_images/20191214045649_41TxNIo3cQL.jpg', '[\"admin\\/images\\/product_images\\/46-bfrybluesht02-being-fab-original-imaekjr8ymhnxznp.jpeg\",\"admin\\/images\\/product_images\\/ERIDANUS-2017-Men-s-Plaid-Cotton-Dress-Shirts-Male-High-Quality-Long-Sleeve-Slim-Fit-Business.webp\"]', 1, '2019-12-13 22:56:49', '2019-12-13 22:56:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md Eamin Hossain', 'yeamin510@gmail.com', NULL, '$2y$10$7RXWbpZSdem2Z7RxpPmsGefkb0iws6MujDytFqMq65TWmwa4sld5u', 'WTcsD6IpmKHjETUxgwhG2XL38tEQcPnDvFZiFoJcXMt50eyekXNFQ8ILhBlL', '2019-11-22 11:48:21', '2019-12-06 23:08:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_brand_name_unique` (`brand_name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_cat_name_unique` (`cat_name`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
