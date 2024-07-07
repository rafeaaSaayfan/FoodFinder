-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 07, 2024 at 11:06 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodfinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `restaurant_id` bigint UNSIGNED NOT NULL,
  `menu_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `restaurant_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `category` enum('appetizers','sandwiches','meals','pizzas','desserts','drinks') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `restaurant_id`, `name`, `description`, `image`, `price`, `category`, `created_at`, `updated_at`) VALUES
(1, 30, 'cola', 'cola with ice', '17191838209560.jpg', 0.60, 'drinks', '2024-06-23 20:03:40', '2024-06-23 20:03:40'),
(2, 30, 'big king', 'double cheese and steak', '17191838557641.jpg', 7.00, 'sandwiches', '2024-06-23 20:04:15', '2024-06-23 20:04:15'),
(3, 30, 'chicken', 'with potato, ketchup and garlic', '17191839659384.jpg', 8.00, 'meals', '2024-06-23 20:06:05', '2024-06-23 20:06:05'),
(4, 30, 'pizza', 'double cheese', '17191841531003.jpg', 6.00, 'pizzas', '2024-06-23 20:09:13', '2024-06-23 20:09:13'),
(5, 30, 'gateau', 'with caramel', '17191842073620.jpg', 2.00, 'desserts', '2024-06-23 20:10:07', '2024-06-23 20:10:07'),
(6, 30, 'tawook', 'extra garlic', '17191842388034.jpg', 4.00, 'sandwiches', '2024-06-23 20:10:38', '2024-06-23 20:10:38'),
(7, 30, 'toast', 'big one', '17191842852756.jpg', 1.00, 'appetizers', '2024-06-23 20:11:25', '2024-06-23 20:11:25'),
(11, 30, 'normal burger', 'burger', '17192479049976.jpg', 3.50, 'sandwiches', '2024-06-24 13:51:44', '2024-06-24 13:51:44'),
(12, 30, 'shawarma', 'shawarma steak', '17192479284812.jpg', 3.00, 'sandwiches', '2024-06-24 13:52:08', '2024-06-24 13:52:08'),
(14, 30, 'steak', 'steak', '17192479811253.jpg', 5.00, 'sandwiches', '2024-06-24 13:53:01', '2024-06-24 13:53:01'),
(15, 30, 'potato', 'potato', '17192480032902.jpg', 2.50, 'sandwiches', '2024-06-24 13:53:23', '2024-06-24 13:53:23'),
(16, 31, 'lemon', 'lemon', '17195193628332.jpg', 0.60, 'drinks', '2024-06-27 17:16:02', '2024-06-27 17:16:02'),
(17, 31, 'peperoni', 'peperoni', '17195193937904.jpg', 4.00, 'pizzas', '2024-06-27 17:16:33', '2024-06-27 17:16:33'),
(18, 30, '2kl', 'tekol 2akle', '17197719997297.jpg', 5.00, 'desserts', '2024-06-30 15:26:39', '2024-06-30 15:26:39'),
(19, 37, 'steak', '3 steak', '17203631103379.jpg', 9.00, 'meals', '2024-07-07 11:38:30', '2024-07-07 11:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_05_31_180931_create_restaurants_table', 1),
(9, '2024_06_04_143238_create_restaurant_images_table', 2),
(10, '2024_06_21_213424_create_restaurant_reviews_table', 3),
(13, '2024_06_22_130712_create_menus_table', 4),
(18, '2024_06_24_230432_create_carts_table', 5),
(21, '2024_06_28_151954_create_orders_table', 6),
(24, '2024_06_28_161833_create_order_details_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `restaurant_id` bigint UNSIGNED NOT NULL,
  `total_price` double(8,2) NOT NULL,
  `status` enum('canceled','pending','accepted','completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `restaurant_id`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(2, 20, 31, 8.00, 'canceled', '2024-06-28 13:24:03', '2024-06-29 15:25:17'),
(3, 20, 30, 29.60, 'canceled', '2024-06-28 13:24:26', '2024-06-30 22:39:28'),
(4, 20, 30, 2.00, 'canceled', '2024-06-28 16:48:30', '2024-07-07 19:00:21'),
(5, 20, 30, 1.00, 'canceled', '2024-06-28 17:30:14', '2024-06-30 12:44:19'),
(6, 20, 31, 4.00, 'canceled', '2024-06-28 17:37:12', '2024-06-29 15:32:10'),
(7, 20, 30, 1.00, 'canceled', '2024-06-28 17:40:26', '2024-07-07 19:14:30'),
(8, 20, 30, 1.00, 'canceled', '2024-06-28 17:46:55', '2024-07-07 19:04:03'),
(9, 20, 30, 1.00, 'accepted', '2024-06-28 17:47:43', '2024-07-06 12:04:35'),
(10, 20, 31, 4.00, 'pending', '2024-06-28 17:48:18', '2024-06-29 19:19:28'),
(11, 20, 30, 29.60, 'canceled', '2024-06-28 13:24:26', '2024-07-07 19:33:33'),
(12, 52, 31, 4.00, 'pending', '2024-06-30 12:36:56', '2024-07-03 10:43:34'),
(13, 20, 30, 21.00, 'completed', '2024-06-30 14:39:46', '2024-07-07 19:36:12'),
(14, 20, 30, 8.00, 'completed', '2024-06-30 15:24:34', '2024-06-30 20:59:34'),
(15, 52, 30, 15.00, 'canceled', '2024-07-03 10:43:08', '2024-07-07 19:28:58'),
(16, 20, 30, 16.00, 'canceled', '2024-07-06 11:39:15', '2024-07-07 19:36:00'),
(17, 20, 30, 4.00, 'completed', '2024-07-06 12:02:34', '2024-07-07 19:36:10');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `menu_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `menu_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(2, 2, 17, 2, 8.00, '2024-06-28 13:24:03', '2024-06-28 13:24:03'),
(3, 3, 2, 2, 14.00, '2024-06-28 13:24:26', '2024-06-28 13:24:26'),
(4, 3, 14, 3, 15.00, '2024-06-28 13:24:26', '2024-06-28 13:24:26'),
(5, 3, 1, 1, 0.60, '2024-06-28 13:24:26', '2024-06-28 13:24:26'),
(6, 4, 7, 2, 2.00, '2024-06-28 16:48:30', '2024-06-28 16:48:30'),
(7, 5, 7, 1, 1.00, '2024-06-28 17:30:14', '2024-06-28 17:30:14'),
(8, 6, 17, 1, 4.00, '2024-06-28 17:37:12', '2024-06-28 17:37:12'),
(9, 7, 7, 1, 1.00, '2024-06-28 17:40:26', '2024-06-28 17:40:26'),
(10, 8, 7, 1, 1.00, '2024-06-28 17:46:55', '2024-06-28 17:46:55'),
(11, 9, 7, 1, 1.00, '2024-06-28 17:47:43', '2024-06-28 17:47:43'),
(12, 10, 17, 1, 4.00, '2024-06-28 17:48:18', '2024-06-28 17:48:18'),
(13, 12, 17, 1, 4.00, '2024-06-30 12:36:56', '2024-06-30 12:36:56'),
(14, 13, 2, 3, 21.00, '2024-06-30 14:39:46', '2024-06-30 14:39:46'),
(15, 14, 6, 1, 4.00, '2024-06-30 15:24:34', '2024-06-30 15:24:34'),
(16, 14, 5, 2, 4.00, '2024-06-30 15:24:34', '2024-06-30 15:24:34'),
(17, 15, 2, 1, 7.00, '2024-07-03 10:43:08', '2024-07-03 10:43:08'),
(18, 15, 6, 2, 8.00, '2024-07-03 10:43:08', '2024-07-03 10:43:08'),
(19, 16, 7, 1, 1.00, '2024-07-06 11:39:15', '2024-07-06 11:39:15'),
(20, 16, 2, 1, 7.00, '2024-07-06 11:39:15', '2024-07-06 11:39:15'),
(21, 16, 6, 2, 8.00, '2024-07-06 11:39:15', '2024-07-06 11:39:15'),
(22, 17, 5, 2, 4.00, '2024-07-06 12:02:34', '2024-07-06 12:02:34');

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` bigint UNSIGNED NOT NULL,
  `owner_id` bigint UNSIGNED NOT NULL,
  `restaurant_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `restaurant_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','approved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `owner_id`, `restaurant_name`, `description`, `address`, `restaurant_phone`, `restaurant_email`, `status`, `created_at`, `updated_at`) VALUES
(30, 52, 'sanfour', 'best restaurant in the world', 'https://maps.app.goo.gl/y5NDDbcSjjxEPziH7', '69987787', 'sanfour@gmail.com', 'approved', '2024-05-18 13:34:38', '2024-07-07 11:36:06'),
(31, 53, 'atyab akleh', 'The best restaurant foods in barja', 'https://maps.app.goo.gl/TVuWctgK7z48rdy47', '69987787', 'sanfour7@gmail.com', 'approved', '2024-06-24 22:06:46', '2024-07-07 11:36:11'),
(32, 54, 'bet dik', 'dhwgdybewd sbdhef', 'https://maps.app.goo.gl/isjtBQLCCDC8WtxB8', '69987787', 'betdik@gmail.com', 'approved', '2024-06-03 13:59:19', '2024-07-07 11:36:16'),
(33, 55, 'hamed', 'n dnwjdwnd', 'https://maps.app.goo.gl/isjtBQLCCDC8WtxB8', '69987787', 'hamed@gmail.com', 'approved', '2024-07-06 11:10:42', '2024-07-07 11:36:23'),
(37, 59, 'Shawarman', 'shawarma restaurant but we have also a steak', 'https://maps.app.goo.gl/UcHZtMaC28Df3i1F8', '69987787', 'Shawarman@gmail.com', 'approved', '2024-07-06 11:30:07', '2024-07-07 11:39:12'),
(39, 63, 'Abu nabil', 'hshgdgss sds', 'https://maps.app.goo.gl/isjtBQLCCDC8WtxB8', '69987787', 'abunabil@gmail.com', 'approved', '2024-07-07 11:12:44', '2024-07-07 11:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_images`
--

CREATE TABLE `restaurant_images` (
  `id` bigint UNSIGNED NOT NULL,
  `restaurant_id` bigint UNSIGNED NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_image_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_image_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_image_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_image_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant_images`
--

INSERT INTO `restaurant_images` (`id`, `restaurant_id`, `profile_image`, `detail_image_1`, `detail_image_2`, `detail_image_3`, `detail_image_4`, `created_at`, `updated_at`) VALUES
(16, 30, '17201358306580.jpg', '17189751964015.jpg', '1718974771681.jpg', '17189743207974.jpg', '17189746447933.jpg', '2024-06-18 13:34:38', '2024-07-04 20:30:30'),
(17, 31, '17192777648745.jpg', '17192777646201.jpeg', '1719277764531.jpg', '17192777641227.jpg', '17192777643675.jpg', '2024-06-24 22:06:46', '2024-06-24 22:09:24'),
(18, 32, '17200260914795.jpg', '17200260919553.jpg', '17200260914337.jpg', '17200260918092.jpg', '17200260912692.jpg', '2024-07-03 13:59:19', '2024-07-03 14:01:31'),
(19, 33, '17202755493714.jpg', '17202755491675.jpg', '17202755498757.jpg', '17202755494007.jpg', '17202755496475.jpg', '2024-07-06 11:10:42', '2024-07-06 11:19:09'),
(23, 37, '17203632916009.jpg', '17203631941987.jpeg', '17203631942942.jpg', '17203631941673.jpg', '17203631941424.jpg', '2024-07-06 11:30:07', '2024-07-07 11:41:31'),
(24, 39, '17203616724364.jpg', '17203616729079.jpg', '17203616725350.jpeg', '17203616723526.jpg', '17203616727454.jpg', '2024-07-07 11:12:44', '2024-07-07 11:14:32');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_reviews`
--

CREATE TABLE `restaurant_reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `restaurant_id` bigint UNSIGNED NOT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant_reviews`
--

INSERT INTO `restaurant_reviews` (`id`, `user_id`, `restaurant_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 20, 30, '5', NULL, '2024-06-21 20:56:42', '2024-07-06 12:00:17'),
(2, 52, 30, '2', NULL, '2024-06-21 21:26:38', '2024-07-01 16:58:55'),
(3, 53, 31, '5', NULL, '2024-06-24 22:11:00', '2024-06-24 22:11:02'),
(4, 52, 31, '5', NULL, '2024-06-24 22:28:58', '2024-07-01 16:58:50'),
(5, 20, 31, '4', NULL, '2024-07-01 11:47:35', '2024-07-07 11:51:03'),
(7, 20, 32, '2', NULL, '2024-07-07 11:43:48', '2024-07-07 11:50:49'),
(8, 20, 33, '2', NULL, '2024-07-07 11:43:56', '2024-07-07 11:43:56'),
(9, 20, 37, '5', NULL, '2024-07-07 11:44:02', '2024-07-07 11:50:36'),
(10, 20, 39, '3', NULL, '2024-07-07 11:44:11', '2024-07-07 11:44:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'UTC',
  `default_language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `last_login` datetime DEFAULT NULL,
  `profile_progress_step` int NOT NULL DEFAULT '0',
  `profile_completed` tinyint(1) NOT NULL DEFAULT '0',
  `role` enum('customer','restaurant_owner','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `email_verified_at`, `password`, `phone_number`, `profile_img`, `address`, `timezone`, `default_language`, `last_login`, `profile_progress_step`, `profile_completed`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(20, 'rafeh', 'saayfan', 'rafeh_saayfan', 'rafehsaayfan@gmail.com', '2024-06-01 13:02:31', '$2y$10$BWqGU88F9Yu4V/FEzGgmEeSgHUAuwaaTp9AHHzN7oeZuiyTV8jkkq', '71412898', '17184901717015.png', 'https://maps.app.goo.gl/jX2wS48pw3bXeviN6', 'UTC', 'en', NULL, 4, 1, 'admin', NULL, '2024-06-01 13:00:38', '2024-07-04 13:52:03'),
(52, NULL, NULL, NULL, 'fouadtakuch@gmail.com', '2024-06-18 16:35:45', '$2y$10$HkK9m1rl5OzyYl9bwemrpOxMcQyGCtQa2Hu9Fbc/fQFm/Vm/DniA.', NULL, NULL, 'https://maps.app.goo.gl/B2tbt6tjU7nCQF3S7', 'UTC', 'en', NULL, 4, 1, 'restaurant_owner', NULL, '2024-06-18 13:34:38', '2024-06-30 12:36:56'),
(53, NULL, NULL, NULL, 'roberts@gmail.com', '2024-06-25 01:07:05', '$2y$10$ThDtAuF7t2LyMxpBXYPvN.IR0LZBkEXTCPdPVRgR8Qs3skDYhX2v.', '71412898', NULL, NULL, 'UTC', 'en', NULL, 4, 1, 'restaurant_owner', NULL, '2024-06-24 22:06:46', '2024-07-03 21:02:00'),
(54, NULL, NULL, NULL, 'roberts7@gmail.com', '2024-07-03 16:59:48', '$2y$10$FOpBh2Jdq9pQeFj814br8.v2Hh4OU6D9mq.I0CQ2zaLh7bpwUlBMG', NULL, NULL, NULL, 'UTC', 'en', NULL, 4, 1, 'restaurant_owner', NULL, '2024-07-03 13:59:19', '2024-07-03 14:01:47'),
(55, NULL, NULL, NULL, 'DocBooker@gmail.com', '2024-07-06 14:14:17', '$2y$10$cdX9P81ANaofz19WIaFVD.cxknMEPj.x0qvSMQ3kLSlgVcWk2TsC2', NULL, NULL, NULL, 'UTC', 'en', NULL, 4, 1, 'restaurant_owner', NULL, '2024-07-06 11:10:42', '2024-07-06 11:19:26'),
(59, NULL, NULL, NULL, 'ahmad_seifddin@gmail.com', '2024-07-06 14:30:18', '$2y$10$rei.z2SE9J82lseqjBTlGOnrFe7fWW2Sp8Nf226.3g0HoAUJzoDeK', NULL, NULL, NULL, 'UTC', 'en', NULL, 4, 1, 'restaurant_owner', NULL, '2024-07-06 11:30:07', '2024-07-06 11:31:38'),
(61, NULL, NULL, NULL, 'chebbo@gmail.com', '2024-07-07 00:08:35', '$2y$10$W5E6A8UDYzRCq/YhknMTMe5VINioSo0w3Zeebml84oVp8I6Ab2XrO', NULL, NULL, NULL, 'UTC', 'en', NULL, 0, 0, 'customer', NULL, '2024-07-06 21:08:24', '2024-07-06 21:08:24'),
(62, NULL, NULL, NULL, 'lanchun@gmail.com', '2024-07-07 00:09:24', '$2y$10$bUVVWzHHb8PnuxTGjlqhcO2DogkzX0I8N6sfVYdamUA4gCBDFc0Bm', NULL, NULL, NULL, 'UTC', 'en', NULL, 0, 0, 'customer', NULL, '2024-07-06 21:09:13', '2024-07-06 21:09:13'),
(63, NULL, NULL, NULL, 'yousuf@gmail.com', '2024-07-07 14:13:05', '$2y$10$p/9yAg1dBhrE8eXXDeeQD.2fM/2vxoXpW./y0bzjVgGLpzExDbZwu', NULL, NULL, NULL, 'UTC', 'en', NULL, 4, 1, 'restaurant_owner', NULL, '2024-07-07 11:12:44', '2024-07-07 11:14:35'),
(64, NULL, NULL, NULL, 'kahoul@gmail.com', '2024-07-07 19:57:39', '$2y$10$/Ys7dbvTho/5xpEFT55H..6JG.lcStS7rBDHr9u791eYI4nV7bfJu', NULL, NULL, NULL, 'UTC', 'en', NULL, 0, 0, 'customer', NULL, '2024-07-07 16:57:22', '2024-07-07 16:57:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_restaurant_id_foreign` (`restaurant_id`),
  ADD KEY `carts_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_restaurant_id_foreign` (`restaurant_id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `restaurants_restaurant_email_unique` (`restaurant_email`),
  ADD KEY `restaurants_owner_id_foreign` (`owner_id`);

--
-- Indexes for table `restaurant_images`
--
ALTER TABLE `restaurant_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_images_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `restaurant_reviews`
--
ALTER TABLE `restaurant_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_reviews_user_id_foreign` (`user_id`),
  ADD KEY `restaurant_reviews_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `restaurant_images`
--
ALTER TABLE `restaurant_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `restaurant_reviews`
--
ALTER TABLE `restaurant_reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `restaurants_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `restaurant_images`
--
ALTER TABLE `restaurant_images`
  ADD CONSTRAINT `restaurant_images_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `restaurant_reviews`
--
ALTER TABLE `restaurant_reviews`
  ADD CONSTRAINT `restaurant_reviews_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `restaurant_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
