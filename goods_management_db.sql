-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2023 at 03:23 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goods_management_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_models`
--

CREATE TABLE `access_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `access_model` varchar(255) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `access_models`
--

INSERT INTO `access_models` (`id`, `access_model`, `value`, `created_at`, `updated_at`) VALUES
(1, 'access-model', NULL, '2022-06-15 05:10:04', '2022-06-15 05:10:04'),
(2, 'user-type', NULL, '2022-06-15 05:10:21', '2022-06-15 23:23:37'),
(3, 'users', NULL, '2022-06-15 05:10:34', '2022-06-15 23:24:28'),
(4, 'dashboard', NULL, '2022-06-15 23:12:58', '2022-06-15 23:12:58'),
(5, 'access-point', NULL, '2022-06-15 23:15:57', '2022-06-15 23:15:57'),
(6, 'permission', NULL, '2022-06-20 22:33:30', '2022-06-20 22:33:30'),
(8, 'category', NULL, '2023-07-02 09:24:28', '2023-07-02 09:24:28'),
(9, 'sub-category', NULL, '2023-07-02 11:24:47', '2023-07-02 11:24:47'),
(10, 'customer', NULL, '2023-07-02 12:20:43', '2023-07-02 12:20:43'),
(11, 'employee', NULL, '2023-07-02 13:33:51', '2023-07-02 13:33:51'),
(12, 'goods', NULL, '2023-07-02 14:00:08', '2023-07-02 14:00:08'),
(13, 'size', NULL, '2023-07-07 23:27:55', '2023-07-07 23:27:55'),
(14, 'delivery-type', NULL, '2023-07-07 23:35:27', '2023-07-07 23:35:27'),
(15, 'contactus', NULL, '2023-07-08 17:55:20', '2023-07-08 17:55:20'),
(16, 'reviews', NULL, '2023-07-08 18:03:48', '2023-07-08 18:03:48');

-- --------------------------------------------------------

--
-- Table structure for table `access_points`
--

CREATE TABLE `access_points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) NOT NULL,
  `access_model_id` bigint(20) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `access_points`
--

INSERT INTO `access_points` (`id`, `value`, `access_model_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'View', 3, NULL, '2022-06-15 05:10:48', '2022-06-15 05:10:48'),
(2, 'Save', 3, NULL, '2022-06-15 05:10:58', '2022-06-15 05:10:58'),
(3, 'Update', 3, NULL, '2022-06-15 05:11:02', '2022-06-15 05:11:02'),
(4, 'Delete', 3, NULL, '2022-06-15 05:11:07', '2022-06-15 05:11:07'),
(5, 'View', 2, NULL, '2022-06-15 05:11:44', '2022-06-15 05:11:44'),
(6, 'Save', 2, NULL, '2022-06-15 05:11:48', '2022-06-15 05:11:48'),
(7, 'View', 1, NULL, '2022-06-15 05:12:06', '2022-06-15 05:12:06'),
(8, 'Save', 1, NULL, '2022-06-15 05:12:10', '2022-06-15 05:12:10'),
(9, 'Add-More', 1, NULL, '2022-06-15 05:12:13', '2022-06-15 05:12:13'),
(10, 'Delete', 1, NULL, '2022-06-15 05:12:16', '2022-06-15 05:12:16'),
(11, 'View', 4, NULL, '2022-06-15 23:14:59', '2022-06-15 23:14:59'),
(12, 'View', 5, NULL, '2022-06-15 23:16:07', '2022-06-15 23:16:07'),
(13, 'Save', 5, NULL, '2022-06-15 23:16:11', '2022-06-15 23:16:11'),
(14, 'View', 6, NULL, '2022-06-20 22:34:04', '2022-06-20 22:34:04'),
(15, 'Save', 6, NULL, '2022-06-20 22:34:10', '2022-06-20 22:34:10'),
(16, 'Update', 1, NULL, '2022-06-21 00:25:50', '2022-06-21 00:25:50'),
(17, 'Update', 5, NULL, '2022-06-21 01:00:44', '2022-06-21 01:00:44'),
(18, 'Delete', 5, NULL, '2022-06-21 01:00:48', '2022-06-21 01:00:48'),
(19, 'Update', 2, NULL, '2022-06-21 01:16:11', '2022-06-21 01:16:11'),
(20, 'Delete', 2, NULL, '2022-06-21 01:16:21', '2022-06-21 01:16:21'),
(21, 'Add-More', 2, NULL, '2022-06-21 01:28:20', '2022-06-21 01:28:20'),
(22, 'Update', 6, NULL, '2022-06-21 01:30:32', '2022-06-21 01:30:32'),
(23, 'Delete', 6, NULL, '2022-06-21 01:30:36', '2022-06-21 01:30:36'),
(24, 'View', 8, NULL, '2023-07-02 09:24:37', '2023-07-02 09:24:37'),
(25, 'Save', 8, NULL, '2023-07-02 09:24:40', '2023-07-02 09:24:40'),
(26, 'Update', 8, NULL, '2023-07-02 09:24:43', '2023-07-02 09:24:43'),
(27, 'Delete', 8, NULL, '2023-07-02 09:24:45', '2023-07-02 09:24:45'),
(28, 'View', 9, NULL, '2023-07-02 11:24:54', '2023-07-02 11:24:54'),
(29, 'Save', 9, NULL, '2023-07-02 11:24:57', '2023-07-02 11:24:57'),
(30, 'Update', 9, NULL, '2023-07-02 11:25:00', '2023-07-02 11:25:00'),
(31, 'Delete', 9, NULL, '2023-07-02 11:25:02', '2023-07-02 11:25:02'),
(32, 'View', 10, NULL, '2023-07-02 12:20:51', '2023-07-02 12:20:51'),
(33, 'Save', 10, NULL, '2023-07-02 12:20:54', '2023-07-02 12:20:54'),
(34, 'Update', 10, NULL, '2023-07-02 12:20:56', '2023-07-02 12:20:56'),
(35, 'Delete', 10, NULL, '2023-07-02 12:20:58', '2023-07-02 12:20:58'),
(36, 'View', 11, NULL, '2023-07-02 13:34:00', '2023-07-02 13:34:00'),
(37, 'Save', 11, NULL, '2023-07-02 13:34:02', '2023-07-02 13:34:02'),
(38, 'Update', 11, NULL, '2023-07-02 13:34:05', '2023-07-02 13:34:05'),
(39, 'Delete', 11, NULL, '2023-07-02 13:34:07', '2023-07-02 13:34:07'),
(40, 'View', 12, NULL, '2023-07-02 14:00:15', '2023-07-02 14:00:15'),
(41, 'Save', 12, NULL, '2023-07-02 14:00:17', '2023-07-02 14:00:17'),
(42, 'Update', 12, NULL, '2023-07-02 14:00:19', '2023-07-02 14:00:19'),
(43, 'Delete', 12, NULL, '2023-07-02 14:00:22', '2023-07-02 14:00:22'),
(44, 'View', 13, NULL, '2023-07-07 23:28:03', '2023-07-07 23:28:03'),
(45, 'Save', 13, NULL, '2023-07-07 23:28:07', '2023-07-07 23:28:07'),
(46, 'Update', 13, NULL, '2023-07-07 23:28:15', '2023-07-07 23:28:15'),
(47, 'Delete', 13, NULL, '2023-07-07 23:28:17', '2023-07-07 23:28:17'),
(48, 'View', 14, NULL, '2023-07-07 23:35:34', '2023-07-07 23:35:34'),
(49, 'Save', 14, NULL, '2023-07-07 23:35:37', '2023-07-07 23:35:37'),
(50, 'Update', 14, NULL, '2023-07-07 23:35:39', '2023-07-07 23:35:39'),
(51, 'Delete', 14, NULL, '2023-07-07 23:35:42', '2023-07-07 23:35:42'),
(52, 'View', 15, NULL, '2023-07-08 17:55:28', '2023-07-08 17:55:28'),
(53, 'Save', 15, NULL, '2023-07-08 17:55:30', '2023-07-08 17:55:30'),
(54, 'Update', 15, NULL, '2023-07-08 17:55:36', '2023-07-08 17:55:36'),
(55, 'Delete', 15, NULL, '2023-07-08 17:55:39', '2023-07-08 17:55:39'),
(56, 'View', 16, NULL, '2023-07-08 18:03:56', '2023-07-08 18:03:56'),
(57, 'Save', 16, NULL, '2023-07-08 18:03:58', '2023-07-08 18:03:58'),
(58, 'Update', 16, NULL, '2023-07-08 18:04:00', '2023-07-08 18:04:00'),
(59, 'Delete', 16, NULL, '2023-07-08 18:04:03', '2023-07-08 18:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(2, 'Electronics', '2023-07-02 11:29:36', '2023-07-02 11:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `contact_reviews`
--

CREATE TABLE `contact_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `status` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_reviews`
--

INSERT INTO `contact_reviews` (`id`, `customer_id`, `title`, `comments`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'Delivery', 'Good Delivery', 1, '2023-07-08 06:21:57', '2023-07-08 18:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `customer_id`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 4, 'Admin1', 'bfdjszkbgfufizdsehgb.dsbvuzehgf', '2023-07-08 17:57:49', '2023-07-08 17:57:49');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_fname` varchar(255) NOT NULL,
  `customer_sname` varchar(255) NOT NULL,
  `customer_tp` varchar(255) DEFAULT NULL,
  `customer_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_fname`, `customer_sname`, `customer_tp`, `customer_email`, `password`, `address`, `created_at`, `updated_at`) VALUES
(4, 'Nisharughaan', 'Paramajothy', '0764541258', 'nisharu99@gmail.com', '$2y$10$dZ8DL4fN0v.eABRQXmdy4e0wnoAtC9dDyvcRaT/yy.G/mVQLhyw0i', 'st. patrick\'s road, jaffna', '2023-07-07 11:14:51', '2023-07-07 11:14:51');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_types`
--

CREATE TABLE `delivery_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `delivery_name` varchar(255) NOT NULL,
  `delivery_amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_types`
--

INSERT INTO `delivery_types` (`id`, `delivery_name`, `delivery_amount`, `created_at`, `updated_at`) VALUES
(1, 'Normal', 1000, '2023-07-07 23:56:40', '2023-07-07 23:56:40'),
(2, 'Express', 1500, '2023-07-07 23:56:51', '2023-07-07 23:56:51');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_fname` varchar(255) NOT NULL,
  `employee_sname` varchar(255) NOT NULL,
  `employee_tp` varchar(255) DEFAULT NULL,
  `employee_email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_fname`, `employee_sname`, `employee_tp`, `employee_email`, `address`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Lionel', 'Messi', '0761245789', 'messi10@gmail.com', 'Kokkuvil', 1, '2023-07-08 15:29:16', '2023-07-08 15:30:09'),
(3, 'Cristiano', 'Ronaldo', '766352741', 'cr7@gmail.com', 'Colombo', 0, '2023-07-08 16:46:04', '2023-07-08 16:46:04');

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
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `delivery_type_id` bigint(20) UNSIGNED NOT NULL,
  `tracking_number` varchar(255) NOT NULL,
  `good_name` varchar(255) NOT NULL,
  `dropoff_date` date NOT NULL,
  `dropoff_address` varchar(255) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `status` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`id`, `category_id`, `sub_category_id`, `customer_id`, `employee_id`, `size_id`, `delivery_type_id`, `tracking_number`, `good_name`, `dropoff_date`, `dropoff_address`, `delivery_address`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 4, NULL, 2, 1, 'LGE-#00001', 'Dell', '2023-07-09', 'jaffna', 'Colombo', 1750, 0, '2023-07-09 05:50:34', '2023-07-09 05:50:34'),
(2, 2, 1, 4, NULL, 3, 2, 'LGE-#00002', 'Dell', '2023-07-09', 'jaffna', 'Colombo', 2500, 3, '2023-07-09 16:49:38', '2023-07-13 01:44:14');

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `goods_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `arrival_date` date NOT NULL,
  `departure_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2013_02_10_144934_create_user_types_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_02_10_150020_create_access_models_table', 1),
(7, '2022_02_10_150102_create_access_points_table', 1),
(8, '2022_02_10_150345_create_permissions_table', 1),
(9, '2022_06_21_075745_create_sample_data_table', 2),
(10, '2023_07_02_143142_create_categories_table', 3),
(11, '2023_07_02_143414_create_sub_categories_table', 3),
(12, '2023_07_02_143441_create_customers_table', 3),
(13, '2023_07_02_143507_create_employees_table', 3),
(15, '2023_07_02_143637_create_inventories_table', 3),
(16, '2023_07_02_143734_create_receivers_table', 3),
(17, '2023_07_02_143804_create_contact_us_table', 3),
(18, '2023_07_02_143829_create_contact_reviews_table', 3),
(22, '2023_07_02_143509_create_delivery_types_table', 4),
(28, '2023_07_02_143535_create_goods_table', 6),
(29, '2023_07_02_143508_create_sizes_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type_id` bigint(20) UNSIGNED NOT NULL,
  `permission` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `user_type_id`, `permission`, `created_at`, `updated_at`) VALUES
(1, 1, '[7,5,8,9,10,1,2,3,4,11,12,13,14,15,16,17,18,21,22,23,6,19,20,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59]', '2022-06-15 05:12:51', '2023-07-08 18:04:15'),
(2, 2, '[11,7,8,10,16]', '2022-06-21 02:06:02', '2022-06-21 02:19:27');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receivers`
--

CREATE TABLE `receivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `goods_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sample_data`
--

CREATE TABLE `sample_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size_name` varchar(255) NOT NULL,
  `dimension` varchar(255) NOT NULL,
  `size_amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size_name`, `dimension`, `size_amount`, `created_at`, `updated_at`) VALUES
(1, 'Small', '8 x 6 x 4 Inches', 500, '2023-07-09 05:56:06', '2023-07-09 05:56:06'),
(2, 'Medium', '10 x 9 x 4 Inches', 750, '2023-07-09 05:56:31', '2023-07-09 05:56:31'),
(3, 'Large', '12 x 12 x 10 Inches', 1000, '2023-07-09 05:56:55', '2023-07-09 05:56:55'),
(4, 'Extra Large', '20 x 18 x 12 Inches', 1250, '2023-07-09 05:57:16', '2023-07-09 05:57:16');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `sub_category_name`, `created_at`, `updated_at`) VALUES
(1, 2, 'Laptops', '2023-07-02 11:29:51', '2023-07-02 11:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `tp` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type_id` bigint(20) UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `tp`, `email`, `password`, `user_type_id`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, 'admin@gmail.com', '$2y$10$TueIfQmSPIp11ga3DkA1Zek3A7G/VTM.npLGDjKLDKystzFrfo03G', 1, NULL, NULL, NULL, NULL),
(3, 'Kumar', '0775858548', 'kumar@gmail.com', '$2y$10$deQzhZBNdQIrybjdHfiYOOQ5Jx.rWFTGBoGPrSjockH1YOMnJsGSy', 2, NULL, NULL, '2022-06-21 02:10:37', '2022-06-21 02:10:37');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'User', '2022-06-21 02:05:47', '2022-06-21 02:05:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_models`
--
ALTER TABLE `access_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `access_points`
--
ALTER TABLE `access_points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `access_points_access_model_id_foreign` (`access_model_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_reviews`
--
ALTER TABLE `contact_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_reviews_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_us_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_customer_email_unique` (`customer_email`);

--
-- Indexes for table `delivery_types`
--
ALTER TABLE `delivery_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_employee_email_unique` (`employee_email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `goods_tracking_number_unique` (`tracking_number`),
  ADD KEY `goods_category_id_foreign` (`category_id`),
  ADD KEY `goods_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `goods_customer_id_foreign` (`customer_id`),
  ADD KEY `goods_employee_id_foreign` (`employee_id`),
  ADD KEY `goods_size_id_foreign` (`size_id`),
  ADD KEY `goods_delivery_type_id_foreign` (`delivery_type_id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventories_goods_id_foreign` (`goods_id`),
  ADD KEY `inventories_employee_id_foreign` (`employee_id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_user_type_id_foreign` (`user_type_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `receivers`
--
ALTER TABLE `receivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receivers_employee_id_foreign` (`employee_id`),
  ADD KEY `receivers_goods_id_foreign` (`goods_id`);

--
-- Indexes for table `sample_data`
--
ALTER TABLE `sample_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_user_type_id_foreign` (`user_type_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_models`
--
ALTER TABLE `access_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `access_points`
--
ALTER TABLE `access_points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_reviews`
--
ALTER TABLE `contact_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `delivery_types`
--
ALTER TABLE `delivery_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receivers`
--
ALTER TABLE `receivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sample_data`
--
ALTER TABLE `sample_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `access_points`
--
ALTER TABLE `access_points`
  ADD CONSTRAINT `access_points_access_model_id_foreign` FOREIGN KEY (`access_model_id`) REFERENCES `access_models` (`id`);

--
-- Constraints for table `contact_reviews`
--
ALTER TABLE `contact_reviews`
  ADD CONSTRAINT `contact_reviews_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD CONSTRAINT `contact_us_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `goods_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `goods_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `goods_delivery_type_id_foreign` FOREIGN KEY (`delivery_type_id`) REFERENCES `delivery_types` (`id`),
  ADD CONSTRAINT `goods_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `goods_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`),
  ADD CONSTRAINT `goods_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`);

--
-- Constraints for table `inventories`
--
ALTER TABLE `inventories`
  ADD CONSTRAINT `inventories_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `inventories_goods_id_foreign` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`);

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_user_type_id_foreign` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`);

--
-- Constraints for table `receivers`
--
ALTER TABLE `receivers`
  ADD CONSTRAINT `receivers_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `receivers_goods_id_foreign` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`);

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_user_type_id_foreign` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
