-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2019 at 06:21 AM
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
(4, 'Yellow', NULL, '', 1, '2019-12-07 11:57:50', '2019-12-07 11:57:50'),
(5, 'Bata', NULL, '', 1, '2019-12-15 11:33:30', '2019-12-15 11:33:30'),
(6, 'Asus', NULL, '', 1, '2019-12-15 11:34:19', '2019-12-15 11:34:19'),
(7, 'Urban Fashion BD', NULL, '', 1, '2019-12-15 11:35:58', '2019-12-15 11:35:58'),
(8, 'Richman', NULL, '', 1, '2019-12-15 11:37:31', '2019-12-15 11:37:31'),
(9, 'Ecstasy', NULL, '', 1, '2019-12-15 11:37:43', '2019-12-15 11:37:43');

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
(7, 'Sports & Outdoor', 'This is T-shirt', 'admin/images/images.jpg', 1, '2019-11-22 12:23:21', '2019-12-15 11:41:16'),
(8, 'Clothes', 'Description', 'admin/images/1-500x500.jpg', 1, '2019-11-28 20:53:57', '2019-12-15 11:40:52'),
(9, 'Health & Beauty', NULL, 'admin/images/men-s-backpacking-shirt-travel100-burgundy.jpg', 1, '2019-12-03 09:57:57', '2019-12-15 11:40:32'),
(10, 'Electronics Devices', NULL, '', 1, '2019-12-07 11:58:04', '2019-12-15 11:38:01'),
(11, 'Home & Lifestyle', NULL, '', 1, '2019-12-15 11:41:51', '2019-12-15 11:41:51'),
(12, 'Watches & Accessories', NULL, '', 1, '2019-12-15 11:42:42', '2019-12-15 11:42:42');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `commenter_id` int(11) NOT NULL,
  `commentable_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `commenter_id`, `commentable_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 17, '9', 'Nice product', '2019-12-29 23:58:30', '2019-12-29 23:58:30'),
(2, 17, '9', 'Wow', '2019-12-30 00:13:14', '2019-12-30 00:13:14'),
(3, 17, '11', 'Nice', '2019-12-30 00:23:35', '2019-12-30 00:23:35'),
(4, 17, '11', 'Very nice and wow product', '2019-12-30 00:25:33', '2019-12-30 00:25:33'),
(5, 17, '11', 'hi', '2019-12-30 00:28:20', '2019-12-30 00:28:20'),
(6, 17, '10', 'Nice product', '2019-12-30 00:29:18', '2019-12-30 00:29:18'),
(7, 21, '13', 'Well', '2019-12-30 00:39:00', '2019-12-30 00:39:00'),
(8, 21, '9', 'Not Bad', '2019-12-30 00:39:30', '2019-12-30 00:39:30'),
(9, 21, '9', 'good', '2019-12-30 00:43:56', '2019-12-30 00:43:56');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email_address`, `phone_no`, `provider`, `provider_id`, `password`, `address`, `created_at`, `updated_at`) VALUES
(17, 'Yeamin', 'Hossain', 'yeamin510@gmail.com', '01750691974', '', '', '$2y$10$Vq9oK9xA4M/izE1kEuQNTer6KMoKlQLjO7DrqZbwpFiEXsXiuy2ty', NULL, '2019-12-18 01:24:41', '2019-12-18 01:24:41'),
(21, 'Abdur', 'Karim', 'karim@gmail.com', '01829409162', '', '', '$2y$10$aYPf.IE99LCrVQPdGj109.SHm9cqNHnMGZxi8io7/qKLE.Oueptl.', 'Uttara', '2019-12-21 14:12:39', '2019-12-21 14:12:39'),
(22, 'Rahim', 'Mia', 'rahim@gmail.com', '01650321456', '', '', '$2y$10$pAk08QZI7TLQX6l.4iCgIuNKWi4d90mxLv5kf7u.X9DsqJQz9mVcW', NULL, '2019-12-21 14:29:43', '2019-12-21 14:29:43'),
(23, 'Rakib', 'Uddin', 'rakib@gmail.com', '01750', '', '', '$2y$10$cepRFB9ftgm2cErwJ4s8XeDWiNYRmmG5E0dLG9Ju9JHJeYOueUK9m', NULL, '2019-12-21 14:31:19', '2019-12-21 14:31:19');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_11_19_175400_create_categories_table', 1),
(4, '2019_11_23_052509_create_brands_table', 2),
(5, '2019_12_03_160921_create_products_table', 3),
(6, '2018_12_23_120000_create_shoppingcart_table', 4),
(7, '2019_12_17_043042_create_customers_table', 5),
(9, '2019_12_21_165659_create_orders_table', 7),
(10, '2019_12_21_170416_create_order_details_table', 7),
(11, '2019_12_21_170514_create_payments_table', 7),
(13, '2019_12_21_111701_create_shipping_addresses_table', 8),
(14, '2014_10_12_000000_create_users_table', 9),
(15, '2019_12_30_051724_create_comments_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `order_total` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `shipping_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(3, 17, 2, '1,000.00', 'pending', '2019-12-21 14:00:36', '2019-12-21 14:00:36'),
(4, 17, 3, '3,000.00', 'pending', '2019-12-21 14:03:43', '2019-12-21 14:03:43'),
(5, 21, 1, '4,000.00', 'pending', '2019-12-21 14:15:07', '2019-12-21 14:15:07'),
(6, 21, 2, '100.00', 'pending', '2019-12-21 14:17:26', '2019-12-21 14:17:26'),
(7, 21, 3, '500.00', 'pending', '2019-12-21 14:27:20', '2019-12-21 14:27:20'),
(8, 23, 4, '6,000.00', 'pending', '2019-12-21 14:32:54', '2019-12-21 14:32:54'),
(9, 17, 5, '1,500.00', 'pending', '2019-12-29 00:53:13', '2019-12-29 00:53:13');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(10,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_quantity`, `created_at`, `updated_at`) VALUES
(2, 3, 10, 'Mobile', 1000.00, 1, '2019-12-21 14:00:36', '2019-12-21 14:00:36'),
(3, 4, 11, 'Shoe', 1500.00, 2, '2019-12-21 14:03:43', '2019-12-21 14:03:43'),
(4, 5, 13, 'Full Sleeve Casual Shirt', 2000.00, 1, '2019-12-21 14:15:07', '2019-12-21 14:15:07'),
(5, 5, 10, 'Mobile', 1000.00, 2, '2019-12-21 14:15:07', '2019-12-21 14:15:07'),
(6, 6, 9, 'Headphone', 100.00, 1, '2019-12-21 14:17:26', '2019-12-21 14:17:26'),
(7, 7, 9, 'Headphone', 100.00, 5, '2019-12-21 14:27:21', '2019-12-21 14:27:21'),
(8, 8, 13, 'Full Sleeve Casual Shirt', 2000.00, 3, '2019-12-21 14:32:54', '2019-12-21 14:32:54'),
(9, 9, 11, 'Shoe', 1500.00, 1, '2019-12-29 00:53:13', '2019-12-29 00:53:13');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('yeamin510@gmail.com', '$2y$10$LQMz/aUKWerH1shKfoj3EeYVWBg5JW6kpWJvhtSrZ8XXT9mNQF1U2', '2019-12-17 00:45:58');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_info` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `payment_info`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 2, 'cash', 'pending', '2019-12-21 13:59:02', '2019-12-21 13:59:02'),
(2, 3, 'cash', 'pending', '2019-12-21 14:00:36', '2019-12-21 14:00:36'),
(3, 4, 'cash', 'pending', '2019-12-21 14:03:43', '2019-12-21 14:03:43'),
(4, 5, 'cash', 'pending', '2019-12-21 14:15:07', '2019-12-21 14:15:07'),
(5, 6, 'cash', 'pending', '2019-12-21 14:17:26', '2019-12-21 14:17:26'),
(6, 7, 'cash', 'pending', '2019-12-21 14:27:21', '2019-12-21 14:27:21'),
(7, 8, 'cash', 'pending', '2019-12-21 14:32:54', '2019-12-21 14:32:54'),
(8, 9, 'cash', 'pending', '2019-12-29 00:53:13', '2019-12-29 00:53:13');

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
  `uploaded_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `brand_id`, `product_name`, `short_desc`, `long_desc`, `discount_price`, `product_price`, `quantity`, `size`, `image`, `gallery_image`, `status`, `uploaded_by`, `created_at`, `updated_at`) VALUES
(9, 7, 4, 'Headphone', 'this is headphone', 'ddd', 150.00, 200.00, 10, 'l', 'admin/images/product_images/20191207185149_images.jpg', '[\"admin\\/images\\/product_images\\/1-500x500.jpg\",\"admin\\/images\\/product_images\\/41TxNIo3cQL.jpg\",\"admin\\/images\\/product_images\\/46-bfrybluesht02-being-fab-original-imaekjr8ymhnxznp.jpeg\"]', 1, '1', '2019-12-07 12:51:49', '2019-12-29 00:19:24'),
(10, 7, 3, 'Mobile', 'wwww', 'aa', 1000.00, 1200.00, 33, 'xl', 'admin/images/product_images/20191214045649_41TxNIo3cQL.jpg', '[\"admin\\/images\\/product_images\\/46-bfrybluesht02-being-fab-original-imaekjr8ymhnxznp.jpeg\",\"admin\\/images\\/product_images\\/ERIDANUS-2017-Men-s-Plaid-Cotton-Dress-Shirts-Male-High-Quality-Long-Sleeve-Slim-Fit-Business.webp\"]', 1, '1', '2019-12-13 22:56:49', '2019-12-13 22:56:49'),
(11, 7, 7, 'Shoe', 'Product details of Sprint Grey Mash Sneaker for Men\r\nProduct Type: Sneaker\r\nColor: Grey\r\nHeel Height: Low\r\nMain Material: Mash\r\nSole: Rubberize Eva\r\nGender: Men\r\nAbout Apex\r\nApex offers an array of shoes and sandals from the finest quality leather and craftsmanship wrapped in comfort only for those men who value authenticity and originality above everything. When designing an Apex equal emphasis is given to classic designs comfort and durability.\r\nSpecifications of Sprint Grey Mash Sneaker for Men\r\nBrandSprintSKU109710652_BD-1026374915Main MaterialBonded FabricMen Shoes ClosureSlip-on & Pull-onShoe StyleCasual', 'Product details of Sprint Grey Mash Sneaker for Men\r\nProduct Type: Sneaker\r\nColor: Grey\r\nHeel Height: Low\r\nMain Material: Mash\r\nSole: Rubberize Eva\r\nGender: Men\r\nAbout Apex\r\nApex offers an array of shoes and sandals from the finest quality leather and craftsmanship wrapped in comfort only for those men who value authenticity and originality above everything. When designing an Apex equal emphasis is given to classic designs comfort and durability.\r\nSpecifications of Sprint Grey Mash Sneaker for Men\r\nBrandSprintSKU109710652_BD-1026374915Main MaterialBonded FabricMen Shoes ClosureSlip-on & Pull-onShoe StyleCasualProduct details of Sprint Grey Mash Sneaker for Men\r\nProduct Type: Sneaker\r\nColor: Grey\r\nHeel Height: Low\r\nMain Material: Mash\r\nSole: Rubberize Eva\r\nGender: Men\r\nAbout Apex\r\nApex offers an array of shoes and sandals from the finest quality leather and craftsmanship wrapped in comfort only for those men who value authenticity and originality above everything. When designing an Apex equal emphasis is given to classic designs comfort and durability.\r\nSpecifications of Sprint Grey Mash Sneaker for Men\r\nBrandSprintSKU109710652_BD-1026374915Main MaterialBonded FabricMen Shoes ClosureSlip-on & Pull-onShoe StyleCasual', 1500.00, 2000.00, 20, 'xl', 'admin/images/product_images/20191215174838_f-p-1.jpg', '[\"admin\\/images\\/product_images\\/f-p-1.jpg\"]', 1, '3', '2019-12-15 11:48:38', '2019-12-15 11:48:38'),
(12, 12, 4, 'Northern Casual Shoe', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, 3000.00, 15, 'xxl', 'admin/images/product_images/20191215175212_i5.jpg', '[\"admin\\/images\\/product_images\\/i3.jpg\"]', 1, '4', '2019-12-15 11:52:12', '2019-12-15 11:52:12'),
(13, 8, 9, 'Full Sleeve Casual Shirt', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, 2000.00, 10, 'xxl', 'admin/images/product_images/20191215175456_1-500x500.jpg', '[\"admin\\/images\\/product_images\\/41TxNIo3cQL.jpg\",\"admin\\/images\\/product_images\\/46-bfrybluesht02-being-fab-original-imaekjr8ymhnxznp.jpeg\",\"admin\\/images\\/product_images\\/ERIDANUS-2017-Men-s-Plaid-Cotton-Dress-Shirts-Male-High-Quality-Long-Sleeve-Slim-Fit-Business.webp\"]', 1, '4', '2019-12-15 11:54:56', '2019-12-15 11:54:56');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_addresses`
--

CREATE TABLE `shipping_addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_addresses`
--

INSERT INTO `shipping_addresses` (`id`, `customer_id`, `full_name`, `email_address`, `phone_no`, `address`, `created_at`, `updated_at`) VALUES
(1, 21, 'Abdur Karim', 'karim@gmail.com', '01829409162', 'Uttara', '2019-12-21 14:15:00', '2019-12-21 14:15:00'),
(2, 21, 'Abdur Karim', 'karim@gmail.com', '01750', 'Uttara', '2019-12-21 14:17:22', '2019-12-21 14:17:22'),
(3, 21, 'Abdur Karim', 'karim@gmail.com', '01829409162', 'Uttara', '2019-12-21 14:27:17', '2019-12-21 14:27:17'),
(4, 23, 'Rakib Uddin', 'rakib@gmail.com', '01750', 'dhaka', '2019-12-21 14:32:47', '2019-12-21 14:32:47'),
(5, 17, 'Yeamin Hossain', 'yeamin510@gmail.com', '01750691974', 'Uttara', '2019-12-29 00:53:03', '2019-12-29 00:53:03'),
(6, 17, 'Yeamin Hossain', 'yeamin510@gmail.com', '01750691974', 'Dhaka', '2019-12-29 00:54:39', '2019-12-29 00:54:39'),
(7, 21, 'Abdur Karim', 'karim@gmail.com', '01829409162', 'Uttara', '2019-12-30 00:44:23', '2019-12-30 00:44:23'),
(8, 21, 'Abdur Karim', 'karim@gmail.com', '01829409162', 'Uttara', '2019-12-30 00:54:09', '2019-12-30 00:54:09'),
(9, 21, 'Abdur Karim', 'karim@gmail.com', '01829409162', 'Uttara', '2019-12-30 00:57:52', '2019-12-30 00:57:52');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shoppingcart`
--

INSERT INTO `shoppingcart` (`identifier`, `instance`, `content`, `created_at`, `updated_at`) VALUES
('username2', 'default', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:2:{s:32:\"041046abcadc49d6f2e8e0d2a118e200\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":10:{s:5:\"rowId\";s:32:\"041046abcadc49d6f2e8e0d2a118e200\";s:2:\"id\";i:9;s:3:\"qty\";i:1;s:4:\"name\";s:9:\"Headphone\";s:5:\"price\";d:100;s:6:\"weight\";d:0;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:1:{s:6:\"images\";s:53:\"admin/images/product_images/20191207185149_images.jpg\";}}s:7:\"taxRate\";i:21;s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:46:\"\0Gloudemans\\Shoppingcart\\CartItem\0discountRate\";i:0;}s:32:\"2e90d778a6aa0b768e18b0c27876086e\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":10:{s:5:\"rowId\";s:32:\"2e90d778a6aa0b768e18b0c27876086e\";s:2:\"id\";i:11;s:3:\"qty\";i:1;s:4:\"name\";s:4:\"Shoe\";s:5:\"price\";d:1500;s:6:\"weight\";d:0;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:1:{s:6:\"images\";s:52:\"admin/images/product_images/20191215174838_f-p-1.jpg\";}}s:7:\"taxRate\";i:0;s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:46:\"\0Gloudemans\\Shoppingcart\\CartItem\0discountRate\";i:0;}}}', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` int(11) NOT NULL DEFAULT '3',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `phone`, `email`, `email_verified_at`, `address`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Md Eamin Hossain', '017506919', 'admin@gmail.com', NULL, 'dhaka', '$2y$10$jHlj.J.IpeVEjTpB96CWGuS5UVzsq/y.7iE8RNN7BlYNVo8LPZavy', '1', '42cjjKCg0L3kUAiyP8rkNpzHPigORJIFMIpsLBYWsFRCVsDtNZD1Ytg4QloI', '2019-12-22 08:53:46', '2019-12-22 08:53:46'),
(3, 2, 'Vendor', '017575273', 'vendor@gmail.com', NULL, 'Rangpur', '$2y$10$I9eYnzBpVpJDzZSHAPBEBOTpXbn2dxhc2IqHw/MLJ4KSaGXmUihfi', '1', NULL, '2019-12-22 09:02:17', '2019-12-22 09:02:17'),
(5, 2, 'Karim', '015', 'karim@gmail.com', NULL, 'Bagura', '$2y$10$8LtEuOpWf3oumdDqes.boem0KW4eITxxhDj1zKp/JDl7yvMD2dBNm', '1', NULL, '2019-12-29 00:34:03', '2019-12-29 00:34:03');

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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_address_unique` (`email_address`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
