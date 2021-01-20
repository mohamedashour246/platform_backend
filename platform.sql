-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 20, 2021 at 09:51 PM
-- Server version: 10.3.25-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.3.26-1+ubuntu20.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `platform`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `type_id` int(11) NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `admin_id`, `type_id`, `notes`, `image`, `active`, `created_at`, `updated_at`, `lang`, `name`, `phone`, `address`) VALUES
(1, 'ahmedsami', 'ahmedsamigeek@gmail.com', '$2y$10$FQEBc.XR35x4nUxRoSDSi.jfSuyuTf0uWYty.xZH2yPhysnFT64km', 1, 1, 'super admin', 'idbhMujBTv63JW3X2PNoWWXORA2Fl52eGqkarvEK.jpeg', 0, '2020-11-06 06:37:00', '2021-01-19 16:44:50', '', 'احمد سامى', NULL, NULL),
(7, 'nehad', 'nehad@gmail.com', '$2y$10$GnAkxX5BJWGoSlcoxKsG6.828gTjFlEBbS2V3TOWKoeWZcIZ8km7i', 1, 1, 'notes', 'WotHMfIdxkYqnXCABiIX3xAgWYSdn3ut99t42LOO.jpeg', 1, '2020-11-09 06:17:26', '2020-11-11 06:12:50', NULL, 'نهاد سامى', NULL, NULL),
(37, 'engahmed', 'engahmed@yahoo.com', '$2y$10$97NpP/a1x5s4GYmeGUEN9ONUF0ChM/m1.hua5ePAFOdDwww4i01H.', 1, 1, NULL, 'k6rK4Mgb5OkrPq9KPIRQHuhvy1W9LvF118bCmNKI.jpeg', 1, '2020-11-15 05:22:09', '2021-01-19 13:05:29', NULL, 'مهندس احمد', NULL, NULL),
(44, 'zenab', 'zenbaahedm@yahoo.com', '$2y$10$5ZL221tfytDvhiHYcH9Bb.LZdi3exbxXehqvULA6Kz0Y8UWNb8QGG', 1, 3, NULL, 'sCr5IEwWqvdzQzgOLqfObQ8iLzSflWUmqntivwsB.jpeg', 1, '2020-12-12 11:10:26', '2021-01-19 13:05:30', NULL, 'زينب احمد', '01014340345698', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_permissions`
--

CREATE TABLE `admin_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL COMMENT 'who added this permission to this admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_permissions`
--

INSERT INTO `admin_permissions` (`id`, `admin_id`, `permission_id`, `added_by`, `created_at`, `updated_at`) VALUES
(8, 20, 1, 1, '2020-11-09 14:32:13', '2020-11-09 14:32:13'),
(9, 20, 2, 1, '2020-11-09 14:32:13', '2020-11-09 14:32:13'),
(10, 20, 3, 1, '2020-11-09 14:32:13', '2020-11-09 14:32:13'),
(11, 20, 4, 1, '2020-11-09 14:32:13', '2020-11-09 14:32:13'),
(12, 20, 5, 1, '2020-11-09 14:32:13', '2020-11-09 14:32:13'),
(13, 20, 6, 1, '2020-11-09 14:32:13', '2020-11-09 14:32:13'),
(14, 20, 8, 1, '2020-11-09 14:32:13', '2020-11-09 14:32:13'),
(15, 20, 9, 1, '2020-11-09 14:32:13', '2020-11-09 14:32:13'),
(16, 20, 11, 1, '2020-11-09 14:32:13', '2020-11-09 14:32:13'),
(83, 21, 1, 1, '2020-11-11 04:18:52', '2020-11-11 04:18:52'),
(84, 21, 2, 1, '2020-11-11 04:18:52', '2020-11-11 04:18:52'),
(85, 21, 3, 1, '2020-11-11 04:18:52', '2020-11-11 04:18:52'),
(86, 21, 4, 1, '2020-11-11 04:18:52', '2020-11-11 04:18:52'),
(87, 21, 5, 1, '2020-11-11 04:18:52', '2020-11-11 04:18:52'),
(88, 21, 6, 1, '2020-11-11 04:18:52', '2020-11-11 04:18:52'),
(89, 21, 7, 1, '2020-11-11 04:18:52', '2020-11-11 04:18:52'),
(90, 21, 8, 1, '2020-11-11 04:18:52', '2020-11-11 04:18:52'),
(91, 21, 9, 1, '2020-11-11 04:18:52', '2020-11-11 04:18:52'),
(92, 21, 10, 1, '2020-11-11 04:18:52', '2020-11-11 04:18:52'),
(93, 21, 11, 1, '2020-11-11 04:18:52', '2020-11-11 04:18:52'),
(94, 21, 12, 1, '2020-11-11 04:18:52', '2020-11-11 04:18:52'),
(101, 30, 5, 1, '2020-11-11 06:12:31', '2020-11-11 06:12:31'),
(102, 30, 6, 1, '2020-11-11 06:12:31', '2020-11-11 06:12:31'),
(103, 30, 7, 1, '2020-11-11 06:12:31', '2020-11-11 06:12:31'),
(104, 30, 8, 1, '2020-11-11 06:12:31', '2020-11-11 06:12:31'),
(105, 30, 9, 1, '2020-11-11 06:12:31', '2020-11-11 06:12:31'),
(106, 30, 10, 1, '2020-11-11 06:12:31', '2020-11-11 06:12:31'),
(107, 7, 1, 1, '2020-11-11 06:12:50', '2020-11-11 06:12:50'),
(108, 7, 2, 1, '2020-11-11 06:12:50', '2020-11-11 06:12:50'),
(109, 7, 6, 1, '2020-11-11 06:12:50', '2020-11-11 06:12:50'),
(110, 7, 9, 1, '2020-11-11 06:12:50', '2020-11-11 06:12:50'),
(111, 7, 10, 1, '2020-11-11 06:12:50', '2020-11-11 06:12:50'),
(112, 7, 11, 1, '2020-11-11 06:12:50', '2020-11-11 06:12:50'),
(113, 7, 13, 1, '2020-11-11 06:12:50', '2020-11-11 06:12:50'),
(114, 44, 1, 1, '2020-12-12 11:10:26', '2020-12-12 11:10:26'),
(115, 44, 2, 1, '2020-12-12 11:10:26', '2020-12-12 11:10:26'),
(116, 44, 3, 1, '2020-12-12 11:10:26', '2020-12-12 11:10:26'),
(117, 44, 4, 1, '2020-12-12 11:10:26', '2020-12-12 11:10:26'),
(118, 44, 5, 1, '2020-12-12 11:10:26', '2020-12-12 11:10:26'),
(119, 44, 6, 1, '2020-12-12 11:10:26', '2020-12-12 11:10:26'),
(120, 44, 7, 1, '2020-12-12 11:10:26', '2020-12-12 11:10:26'),
(121, 44, 9, 1, '2020-12-12 11:10:26', '2020-12-12 11:10:26'),
(122, 44, 10, 1, '2020-12-12 11:10:26', '2020-12-12 11:10:26'),
(123, 44, 12, 1, '2020-12-12 11:10:26', '2020-12-12 11:10:26'),
(124, 44, 13, 1, '2020-12-12 11:10:26', '2020-12-12 11:10:26'),
(125, 45, 1, 1, '2021-01-19 16:08:03', '2021-01-19 16:08:03'),
(126, 45, 2, 1, '2021-01-19 16:08:03', '2021-01-19 16:08:03'),
(127, 45, 5, 1, '2021-01-19 16:08:03', '2021-01-19 16:08:03'),
(128, 45, 6, 1, '2021-01-19 16:08:03', '2021-01-19 16:08:03'),
(129, 45, 7, 1, '2021-01-19 16:08:03', '2021-01-19 16:08:03'),
(130, 45, 8, 1, '2021-01-19 16:08:03', '2021-01-19 16:08:03'),
(131, 45, 9, 1, '2021-01-19 16:08:03', '2021-01-19 16:08:03'),
(132, 45, 10, 1, '2021-01-19 16:08:03', '2021-01-19 16:08:03'),
(133, 45, 11, 1, '2021-01-19 16:08:03', '2021-01-19 16:08:03'),
(134, 45, 14, 1, '2021-01-19 16:08:03', '2021-01-19 16:08:03'),
(135, 45, 15, 1, '2021-01-19 16:08:03', '2021-01-19 16:08:03'),
(136, 45, 16, 1, '2021-01-19 16:08:03', '2021-01-19 16:08:03'),
(137, 45, 17, 1, '2021-01-19 16:08:03', '2021-01-19 16:08:03'),
(138, 45, 18, 1, '2021-01-19 16:08:03', '2021-01-19 16:08:03'),
(139, 45, 19, 1, '2021-01-19 16:08:03', '2021-01-19 16:08:03'),
(140, 45, 20, 1, '2021-01-19 16:08:03', '2021-01-19 16:08:03'),
(141, 45, 21, 1, '2021-01-19 16:08:03', '2021-01-19 16:08:03');

-- --------------------------------------------------------

--
-- Table structure for table `admin_types`
--

CREATE TABLE `admin_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'added_by',
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `deletable` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'can be deleted or not',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_types`
--

INSERT INTO `admin_types` (`id`, `name_ar`, `name_en`, `slug`, `admin_id`, `active`, `deletable`, `created_at`, `updated_at`) VALUES
(1, 'مدير عام', 'super admin', 'supderadmin', '1', 1, 0, '2020-11-02 06:44:52', '2020-11-02 06:44:52'),
(2, 'مشرف', 'Admin', 'admin', '1', 1, 0, '2020-10-01 14:41:14', '2020-12-01 13:55:30'),
(3, 'محاسب', 'Accountant', 'accountant', '1', 1, 0, '2020-10-01 14:41:14', '2020-10-01 14:40:37'),
(4, 'خدمه عملاء', 'customer service', 'customerservice', '1', 1, 0, '2020-12-09 14:36:55', '2020-12-09 14:36:55'),
(6, 'كبير المشرفين', 'head admins', 'head-admins', '1', 1, 1, '2020-12-21 09:16:08', '2020-12-21 09:16:08');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `private_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `market_id` int(11) NOT NULL,
  `merchant_id` int(11) DEFAULT NULL,
  `phones` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  `governorate_id` int(11) NOT NULL,
  `longitude` decimal(10,7) NOT NULL,
  `latitude` decimal(10,7) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `street_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building_type_id` int(11) NOT NULL,
  `floor_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apratment_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avenue_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `market_id`, `merchant_id`, `phones`, `email`, `city_id`, `governorate_id`, `longitude`, `latitude`, `created_at`, `updated_at`, `street_name`, `building_type_id`, `floor_number`, `apratment_number`, `building_number`, `avenue_number`, `place_number`) VALUES
(1, 'فرع الجلاء', 10, 6, '0101434034560 -02154578790 - 012454678980', 'test@gmail.com', 1, 1, '47.7767770', '29.6615640', '2020-11-02 06:44:52', '2020-11-02 06:44:52', '', 0, NULL, NULL, NULL, NULL, NULL),
(2, 'فرع المحمديه', 10, 6, '0101434034560 -02154578790 - 012454678980', 'email@gmail.com', 2, 3, '47.2820700', '29.4321820', '2020-11-02 06:44:52', '2020-11-02 06:44:52', '', 0, NULL, NULL, NULL, NULL, NULL),
(3, 'فرع بلقاس', 10, 6, '01014340346', NULL, 41, 9, '47.5316618', '29.5555406', '2021-01-04 16:25:24', '2021-01-04 16:25:24', '', 0, NULL, NULL, NULL, NULL, NULL),
(5, 'فرع طلخا', 6, 6, '01014340346', NULL, 41, 10, '47.5632475', '29.5686803', '2021-01-04 16:30:16', '2021-01-04 16:30:16', '', 0, NULL, NULL, NULL, NULL, NULL),
(6, 'فرع الجيزه', 10, 6, '01014340346', NULL, 41, 10, '47.6662443', '29.6856676', '2021-01-04 16:32:10', '2021-01-04 16:32:10', '', 0, NULL, NULL, NULL, NULL, NULL),
(7, 'فرع دمياط', 10, 6, '01014340346', NULL, 41, 10, '47.5206754', '29.8680389', '2021-01-04 16:32:32', '2021-01-04 17:42:20', '', 0, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `building_types`
--

CREATE TABLE `building_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `building_types`
--

INSERT INTO `building_types` (`id`, `name_ar`, `name_en`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'منزل', 'House', 1, '2020-11-02 06:44:52', '2020-10-07 13:02:18'),
(2, 'عمارة', 'Building', 1, '2020-11-02 06:44:52', '2020-11-02 06:44:52'),
(3, 'مجمع تجاري', 'Mall', 1, '2020-11-02 06:44:52', '2020-09-22 15:37:40'),
(4, 'مكتب', 'OFFICE', 1, '2020-11-02 06:44:52', '2020-11-02 06:44:52');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `governorate_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name_ar`, `name_en`, `governorate_id`, `admin_id`, `active`, `created_at`, `updated_at`) VALUES
(5, 'wefwef', 'weefwef', 1, 1, 1, '2020-11-22 11:42:28', '2020-11-22 11:42:28'),
(6, 'الفروانيه', 'Al Farwaniyah', 2, 1, 1, '2020-11-22 11:46:53', '2020-11-22 11:46:53'),
(7, 'الصليبية', 'alsalibia', 2, 1, 1, '2020-11-22 11:47:23', '2020-11-22 11:47:23'),
(9, 'صباح الناصر', 'Sabah Al Nasser', 2, 1, 1, '2020-11-22 11:48:00', '2020-11-22 11:48:00'),
(10, 'العمريه', 'Omariya', 2, 1, 1, '2020-11-22 11:48:12', '2020-11-22 11:48:12'),
(11, 'العارضيه السكنيه', 'Ardiya alsakaniya', 2, 1, 1, '2020-11-22 11:48:28', '2020-11-22 11:48:28'),
(12, 'الرقعي', 'Rigai', 2, 1, 1, '2020-11-22 11:48:42', '2020-11-22 11:48:42'),
(13, 'الرحاب', 'Rehab', 2, 1, 1, '2020-11-22 11:49:07', '2020-11-22 11:49:07'),
(14, 'جليب الشيوخ', 'Jeleeb Al-Shuyoukh', 2, 1, 1, '2020-11-22 11:49:16', '2020-11-22 11:49:16'),
(15, 'الاندلس', 'Andalous', 2, 1, 1, '2020-11-22 11:49:30', '2020-11-22 11:49:30'),
(16, 'الضجيج', 'Al-Dajeej', 2, 1, 1, '2020-11-22 11:51:04', '2020-11-22 11:51:04'),
(17, 'اشبيلية', 'Al-Ishbiliya', 2, 1, 1, '2020-11-22 11:51:17', '2020-11-22 11:51:17'),
(18, 'الري', 'Rai', 2, 1, 1, '2020-11-22 11:51:30', '2020-11-22 11:51:30'),
(19, 'صباح السالم', 'Sabah Al Salem', 4, 1, 1, '2020-11-22 11:52:22', '2020-11-22 11:52:22'),
(20, 'العدان', 'aleadan', 4, 1, 1, '2020-11-22 11:52:34', '2020-11-22 11:52:34'),
(21, 'القصور', 'alqusur', 4, 1, 1, '2020-11-22 11:52:45', '2020-11-22 11:52:45'),
(22, 'القرين', 'alqurain', 4, 1, 1, '2020-11-22 11:52:57', '2020-11-22 11:52:57'),
(23, 'عبدالله السالم', 'eabdallah alssalim', 4, 1, 1, '2020-11-22 11:53:13', '2020-11-22 11:53:13'),
(24, 'المسيله', 'almasila', 4, 1, 1, '2020-11-22 11:53:25', '2020-11-22 11:53:25'),
(25, 'المسايل', 'almasayil', 4, 1, 1, '2020-11-22 11:53:40', '2020-11-22 11:53:40'),
(26, 'ابوفطيره', 'abo fatira', 4, 1, 1, '2020-11-22 11:53:52', '2020-11-22 11:53:52'),
(27, 'ابوالحصاني', 'abwalhsani', 4, 1, 1, '2020-11-22 11:54:06', '2020-11-22 11:54:06'),
(28, 'subhan', 'صبحان', 4, 1, 1, '2020-11-22 11:54:24', '2020-11-22 11:54:24'),
(29, 'الفنيطيس', 'alfnytys', 4, 1, 1, '2020-11-22 11:54:34', '2020-11-22 11:54:34'),
(30, 'مبارك الكبير', 'mubarak alkabir', 4, 1, 1, '2020-11-22 11:54:52', '2020-11-22 11:54:52'),
(31, 'الفنطاس', 'Fintas', 3, 1, 1, '2020-11-22 11:55:59', '2020-11-22 11:55:59'),
(32, 'العقيلة', 'Eqaila', 3, 1, 1, '2020-11-22 11:56:08', '2020-11-22 11:56:08'),
(33, 'الظهر', 'Daher', 3, 1, 1, '2020-11-22 11:56:22', '2020-11-22 11:56:22'),
(34, 'المهبولة', 'Mahboula', 3, 1, 1, '2020-11-22 11:56:33', '2020-11-22 11:56:33'),
(35, 'الرقة', 'Riqqah', 3, 1, 1, '2020-11-22 11:56:47', '2020-11-22 11:56:47'),
(36, 'هدية', 'Hadiya', 3, 1, 1, '2020-11-22 11:57:01', '2020-11-22 11:57:01'),
(37, 'ابو حليفة', 'Abu Halifa', 3, 1, 1, '2020-11-22 11:57:13', '2020-11-22 11:57:13'),
(38, 'الصباحية', 'Subahiya', 3, 1, 1, '2020-11-22 11:57:24', '2020-11-22 11:57:24'),
(41, 'الاحمدي', 'Ahmadi', 12, 1, 1, '2020-11-22 11:57:57', '2020-11-22 11:57:57'),
(45, 'ميناء عبد الله', 'Mina Abd Allah', 12, 1, 0, '2020-11-22 11:59:15', '2020-11-22 11:59:15');

-- --------------------------------------------------------

--
-- Table structure for table `city_delivery_prices`
--

CREATE TABLE `city_delivery_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_city` int(11) NOT NULL,
  `to_city` int(11) NOT NULL,
  `price` double(8,2) DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `market_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city_delivery_prices`
--

INSERT INTO `city_delivery_prices` (`id`, `from_city`, `to_city`, `price`, `admin_id`, `market_id`, `created_at`, `updated_at`) VALUES
(3, 5, 11, 50.00, 1, NULL, '2020-11-24 17:49:28', '2020-12-13 11:19:19'),
(4, 5, 10, 74.00, 1, NULL, '2020-12-01 20:35:07', '2020-12-01 20:35:07'),
(13, 13, 6, 8.00, 1, 10, '2020-12-20 09:17:48', '2020-12-20 09:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name_ar`, `name_en`, `code`, `admin_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 'مصر', 'egypt', '+20', 1, 1, '2020-11-02 06:44:52', '2020-11-02 06:44:52'),
(2, 'الكوييت', 'Kuwait', '+965', 1, 1, '2020-11-02 06:44:52', '2020-11-02 06:44:52');

-- --------------------------------------------------------

--
-- Table structure for table `customer_addresses`
--

CREATE TABLE `customer_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `governorate_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `street_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building_type_id` int(11) NOT NULL,
  `floor_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apratment_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avenue_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` decimal(10,7) NOT NULL,
  `latitude` decimal(10,7) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `market_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` enum('merchant','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_addresses`
--

INSERT INTO `customer_addresses` (`id`, `name`, `code`, `phone1`, `phone2`, `governorate_id`, `city_id`, `street_name`, `building_type_id`, `floor_number`, `apratment_number`, `building_number`, `avenue_number`, `place_number`, `longitude`, `latitude`, `created_at`, `updated_at`, `market_id`, `user_id`, `user_type`, `business_type`) VALUES
(23, 'احمد سامى', 'Cu1610658494', '01014340346', '010143403487', 1, 7, 'شارع المعز', 2, '3', NULL, '2', '2', '5', '47.9903410', '29.3785860', '2020-12-14 09:41:02', '2020-12-14 09:41:02', 10, 6, 'merchant', NULL),
(24, 'احمد سامى', 'Cu16106584215', '01014340346', '010143403487', 1, 7, 'شارع المعز', 2, '3', NULL, '2', '2', '5', '47.9903410', '29.3785860', '2020-12-14 09:41:28', '2020-12-14 09:41:28', 10, 6, 'merchant', NULL),
(25, 'احمد سامى', 'Cu161065747', '01014340346', '010143403487', 1, 7, 'شارع المعز', 2, '3', NULL, '2', '2', '5', '47.9903410', '29.3785860', '2020-12-14 09:42:01', '2020-12-14 09:42:01', 10, 6, 'merchant', NULL),
(26, 'احمد سامى', 'Cu1610658497', '01014340346', '010143403487', 1, 7, 'شارع المعز', 2, '3', NULL, '2', '2', '5', '47.9903410', '29.3785860', '2020-12-14 09:43:25', '2020-12-14 09:43:25', 10, 6, 'merchant', NULL),
(27, 'rwerwer', 'Cu161065849499', '01014340346', '010143403487', 1, 7, 'شارع المعز', 2, '3', NULL, '2', '2', '5', '47.9903410', '29.3785860', '2020-12-14 09:47:20', '2020-12-14 09:47:20', 10, 6, 'merchant', NULL),
(28, 'نهاد سامى', 'Cu161065849490', '02455879454', NULL, 8, 9, '22', 1, '87', NULL, '22', '22', '55', '47.9903410', '29.3785860', '2020-12-14 13:26:55', '2020-12-14 13:26:55', 10, 6, 'merchant', NULL),
(29, 'زينب احمد', 'Cu161065849200', '245487987', '798798789', 12, 41, '3', 4, '33', NULL, '33', '33', '33', '47.9903410', '29.3785860', '2020-12-14 14:02:36', '2021-01-07 11:37:01', 10, 6, 'merchant', NULL),
(30, 'احمد جلال', 'Cu16106584300', '0101465874', '0106547897', 8, 41, 'اسم الشارع', 1, '3', NULL, '1', '2', '3', '47.3833464', '29.7202602', '2021-01-07 10:42:25', '2021-01-07 10:42:25', 10, 6, 'merchant', NULL),
(31, 'احمد جلال', 'Cu161065500', '0101465874', '0106547897', 8, 41, 'اسم الشارع', 1, '3', NULL, '1', '2', '3', '47.3833464', '29.7202602', '2021-01-07 10:43:24', '2021-01-07 10:43:24', 10, 6, 'merchant', NULL),
(33, 'ضيضيضصي', 'Cu16106584600', '4234234234', '234234234', 10, 41, '4', 1, '4', NULL, '44', '44', '44', '47.4355314', '29.5232814', '2021-01-07 10:44:45', '2021-01-07 10:44:45', 10, 6, 'merchant', NULL),
(34, 'ققصثقثصقصثق', 'Cu1610658497000', '353453', '3445345', 11, 41, '5', 1, '5', NULL, '5', '5', NULL, '47.4520109', '29.4276381', '2021-01-07 10:45:32', '2021-01-07 10:45:32', 10, 6, 'merchant', NULL),
(35, '343434', 'Cu16106584800', '34343', '343434', 12, 41, '3434', 3, '3434', '5', '3434', '3434', '4434', '48.0084513', '29.3705081', '2021-01-07 14:34:22', '2021-01-07 15:18:02', 10, 6, 'merchant', '4343434'),
(36, 'نهاد سامى', 'Cu1610659802', '010143403467', '012457896545487', 2, 17, '301', 1, '5', NULL, '5', '5', '1', '47.9816440', '29.3499717', '2021-01-14 12:19:08', '2021-01-14 18:38:15', 10, 6, 'merchant', 'ماكولات'),
(37, 'werwerwer', 'Cu16106584949', 'werwer', 'werwer', 1, 5, '3', 1, '3', NULL, '3', '3', '3', '47.9830668', '29.3084172', '2021-01-14 19:08:14', '2021-01-14 19:08:14', 10, 6, 'merchant', 'werwerwer'),
(38, 'zenab ahmed', 'Cu161066299614', '0102465798', '54354352543', 2, 11, '4', 3, '4', NULL, '4', '4', '4', '47.8981863', '29.2886524', '2021-01-14 20:23:16', '2021-01-14 20:23:16', 10, 6, 'merchant', 'foods'),
(39, 'خالد احمد', 'Cu161108707219', '01014345787', '36598455787', 2, 11, '310', 2, '2', NULL, '2', '2', '3', '47.8970920', '29.2875669', '2021-01-19 18:11:12', '2021-01-19 18:11:12', 10, 1, 'admin', 'ماكولات');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_prices`
--

CREATE TABLE `delivery_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_governorate` int(11) NOT NULL,
  `to_governorate` int(11) NOT NULL,
  `market_id` int(11) DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_prices`
--

INSERT INTO `delivery_prices` (`id`, `from_governorate`, `to_governorate`, `market_id`, `admin_id`, `price`, `created_at`, `updated_at`) VALUES
(11, 1, 9, NULL, 1, 60.00, '2020-11-23 12:57:18', '2020-11-24 10:27:19'),
(12, 1, 10, NULL, 1, 7.00, '2020-11-23 12:57:18', '2020-11-23 12:57:18'),
(13, 1, 11, NULL, 1, 8.00, '2020-11-23 12:57:18', '2020-11-23 12:57:18'),
(15, 1, 12, NULL, 1, 7.00, '2020-11-23 12:59:43', '2020-11-23 12:59:43'),
(16, 2, 1, NULL, 1, 4.00, '2020-11-24 06:26:37', '2020-11-24 06:26:37'),
(17, 2, 3, NULL, 1, 7.00, '2020-11-24 06:26:37', '2020-11-24 06:26:37'),
(18, 2, 4, NULL, 1, 9.00, '2020-11-24 06:26:37', '2020-11-24 06:26:37'),
(19, 2, 8, NULL, 1, 5.00, '2020-11-24 06:26:37', '2020-11-24 06:26:37'),
(20, 2, 9, NULL, 1, 4.00, '2020-11-24 06:26:37', '2020-11-24 06:26:37'),
(21, 2, 10, NULL, 1, 4.00, '2020-11-24 06:26:38', '2020-11-24 06:26:38'),
(38, 12, 1, NULL, 1, 7.00, '2020-11-24 10:47:52', '2020-11-24 10:47:52'),
(39, 12, 2, NULL, 1, 4.00, '2020-11-24 10:47:52', '2020-11-24 10:47:52'),
(40, 12, 3, NULL, 1, 5.00, '2020-11-24 10:47:52', '2020-11-24 10:47:52'),
(41, 12, 4, NULL, 1, 9.00, '2020-11-24 10:47:52', '2020-11-24 10:47:52'),
(42, 12, 8, NULL, 1, 7.00, '2020-11-24 10:47:52', '2020-11-24 10:47:52'),
(43, 12, 9, NULL, 1, 4.00, '2020-11-24 10:47:52', '2020-11-24 10:47:52'),
(44, 12, 10, NULL, 1, 1.00, '2020-11-24 10:47:52', '2020-11-24 10:47:52'),
(45, 12, 11, NULL, 1, 1.00, '2020-11-24 10:47:52', '2020-11-24 10:47:52');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'driver username which uses it to login in',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `available` tinyint(4) NOT NULL DEFAULT 1,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_start_time` time NOT NULL,
  `working_end_time` time NOT NULL,
  `bounce` int(11) NOT NULL,
  `car_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `code`, `phone`, `username`, `password`, `admin_id`, `country_id`, `active`, `available`, `notes`, `image`, `working_start_time`, `working_end_time`, `bounce`, `car_number`, `longitude`, `latitude`, `created_at`, `updated_at`) VALUES
(1, 'احمد سامى', '789654', '01014340346', 'sami', '$2y$10$1dVdkutw1/TCzM64DFMwe.EEKo6MJFwvt5wuGRHtzOUAkLM8TlWba', 1, 2, 1, 0, NULL, 'N1Bb4qc4AzYZPwFwFPeRZ73rvFQ9HHPaWUL9m7YH.jpeg', '06:30:00', '20:30:00', 1, '8798933', NULL, NULL, '2020-11-12 04:38:33', '2021-01-19 16:56:33'),
(4, 'ahmed smsm', '7789654', '01014340348', 'smsm', '$2y$10$2jkMroCCfHFtw58trMiTJezbkpVolzaMEMH0SmIbBOXt1zzlY6vta', 1, 1, 1, 0, 'notes here about this driver', 'AFyruu7a3qL9ac58evlxRknzLWTi8L5JLWFz58EK.png', '00:00:00', '02:30:00', 1, '8798933', NULL, NULL, '2020-11-12 04:45:34', '2021-01-19 16:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `governorates`
--

CREATE TABLE `governorates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` float(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `governorates`
--

INSERT INTO `governorates` (`id`, `name_ar`, `name_en`, `country_id`, `admin_id`, `active`, `created_at`, `updated_at`, `price`) VALUES
(1, 'محاظة حولي', 'Hawalli Governorate', 2, 1, 1, '2020-11-13 20:55:22', '2020-11-21 07:34:31', NULL),
(2, 'محافظة الفروانية', 'Farwaniya Governorate', 2, 1, 1, '2020-11-13 20:55:22', '2020-11-13 20:55:22', NULL),
(3, 'محافظة الاحمدي', 'Ahmadi Governorate', 2, 1, 1, '2020-11-13 20:55:22', '2020-11-13 20:55:22', NULL),
(4, 'محافظة مبارك الكبير', 'Mubarak Al-Kabeer Governorate', 2, 1, 1, '2020-11-13 20:55:22', '2020-11-13 20:55:22', NULL),
(8, 'محافظة العاصمة', 'Capital Governorate', 2, 1, 1, '2020-11-23 08:50:26', '2020-11-23 08:50:26', NULL),
(9, 'محافظة الجهراء', 'Jahra Governorate', 2, 1, 1, '2020-11-23 08:50:41', '2020-11-23 08:50:41', NULL),
(10, 'محافظة صباح الأحمد', 'Sabah Al Ahmad', 2, 1, 1, '2020-11-23 08:50:54', '2020-11-23 08:50:54', NULL),
(11, 'محافظة كبد', 'Kabd', 2, 1, 1, '2020-11-23 08:51:08', '2020-11-23 08:51:08', NULL),
(12, 'علي صباح السالم ( ام الهيمان )', 'Ali Sabah Al Salem', 2, 1, 1, '2020-11-23 08:51:22', '2020-11-23 08:51:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ltm_translations`
--

CREATE TABLE `ltm_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `locale` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `key` text COLLATE utf8mb4_bin NOT NULL,
  `value` text COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `markets`
--

CREATE TABLE `markets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL COMMENT 'the admin who added this martket',
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phones` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `markets`
--

INSERT INTO `markets` (`id`, `name`, `admin_id`, `notes`, `logo`, `contract_image`, `address`, `active`, `created_at`, `updated_at`, `phones`, `expiration_date`) VALUES
(10, 'متجر سامى للمشويات', 1, NULL, 'oC6SDLRv4ZqL6tPUMxrGQLwg8ihr668RHZedX6cv.jpeg', '', 'الطائف - شارع شبرا - عمارة البنك السعودي الفرنسي - الدور الرابع -مكتب', 1, '2020-11-13 17:07:57', '2020-11-13 17:07:58', '05026220088 -05026220099', '2021-01-25'),
(11, 'متجر العطور', 2, NULL, 'TSzTu58TOjnPvc4ZJ33CUFsGPtk2r0jlKOed5zao.png', '', 'اى عنوان', 1, '2020-11-10 14:09:13', '2021-01-19 12:21:08', '0102454 - 4564654 -789465', '2021-01-06'),
(12, 'مشاوى ابو خالد', 1, '133333333333333333333', '7JJodFHtCUMFXJxlIV2jMvingULAzcD2Purn6QbI.jpeg', '', '3333333333333333', 1, '2020-11-09 06:55:53', '2021-01-19 12:21:26', '875478544 -854789', '2020-12-08'),
(14, 'متجر نواف للعطور', 1, 'سيبسي', 'wVaWxJImtEnpAZM8XpSQzdVTfgmSQME9gf2qDBTH.jpeg', 'TjIsYXYcN7yvFqhmXTafdhR856LC0ksTi4nMMUXe.jpeg', 'الجلاء - منصوره -', 1, '2020-12-21 07:05:59', '2020-12-21 07:06:01', '2620099 -  2620154', '2020-11-09');

-- --------------------------------------------------------

--
-- Table structure for table `market_bank_accounts`
--

CREATE TABLE `market_bank_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `market_id` int(11) NOT NULL,
  `account_owner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `swift_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `market_bank_accounts`
--

INSERT INTO `market_bank_accounts` (`id`, `market_id`, `account_owner_name`, `bank_account_number`, `bank_name`, `swift_code`, `notes`, `bank_address`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 10, 'احمد سامى جلال', '0125698745879654', 'بنك قطر الوطنى', 'KW-cdyusyduy', NULL, 'محافظه حوالى - شارع ال 90', 1, '2020-11-02 06:44:52', '2020-11-02 06:44:52'),
(2, 10, 'احمد سامى محمد', '09182764836384747777', 'البنك الكويتى الاهلى', 'SF989Dg65', NULL, 'محافظه حوالى - شارع ال 90', 1, '2020-11-02 06:44:52', '2020-11-02 06:44:52');

-- --------------------------------------------------------

--
-- Table structure for table `market_documents`
--

CREATE TABLE `market_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `market_id` int(11) NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `market_documents`
--

INSERT INTO `market_documents` (`id`, `market_id`, `file`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 10, '8dqaCIPxdKHQgLYMHW74DkQdPdKWtWba3PJRkObR.png', 1, '2020-11-13 17:08:04', '2020-11-13 17:08:04'),
(2, 10, 'zqGIgqsANZpk51KAhZ2KwM6lZhHXiBVVNWwwATnn.png', 1, '2020-11-15 03:07:30', '2020-11-15 03:07:30'),
(3, 10, 'ikTtiTaXH1nSUFn2K2pXulrH8gRm8vMZtdiIzHoY.jpeg', 1, '2020-11-15 03:08:27', '2020-11-15 03:08:27'),
(4, 10, 'RaPWfCfTDUrrzLVvyrQ9SLKbcqJcPRUdUEDfYBYD.jpeg', 1, '2020-11-15 03:08:47', '2020-11-15 03:08:47'),
(5, 10, 't0ZHBszrPp4dxfw4ows9odAy1M2UdUn7JtrFnmV7.jpeg', 1, '2020-11-15 03:09:17', '2020-11-15 03:09:17'),
(6, 10, '7NOgIug13Ste8S4Xku6fPPMhm4xUiPAnp6xuizQL.jpeg', 1, '2020-11-15 03:10:10', '2020-11-15 03:10:10'),
(7, 10, 'R8PIQkV0A9hoT31NnCEP1TQ44LTYbmiMffttQyQn.jpeg', 1, '2020-11-15 03:10:29', '2020-11-15 03:10:29'),
(8, 10, 'rvdyynZkxrwOtwWD5vNgmDQzE3lBJqRXDzVxBnn9.jpeg', 1, '2020-11-15 03:10:48', '2020-11-15 03:10:48'),
(9, 10, 'RCe3kKLmP4YZW2bLtAyIRRlDG5e0cTfvc6PSqlSa.jpeg', 1, '2020-11-15 03:11:46', '2020-11-15 03:11:46');

-- --------------------------------------------------------

--
-- Table structure for table `market_emails`
--

CREATE TABLE `market_emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `market_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `market_emails`
--

INSERT INTO `market_emails` (`id`, `email`, `notes`, `market_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'email1@gmail.com', 'بريد الطلبات', 10, 1, '2020-11-02 06:44:52', '2020-11-02 06:44:52'),
(2, 'email12@gmail.com', 'بريد ال sales', 10, 1, '2020-11-02 06:44:52', '2020-11-02 06:44:52'),
(3, 'email3@gmail.com', 'بريد التقارير', 10, 1, '2020-11-02 06:44:52', '2020-11-02 06:44:52'),
(4, 'email30@gmail.com', 'بريد الشكاوى', 10, 1, '2020-11-02 06:44:52', '2020-11-02 06:44:52');

-- --------------------------------------------------------

--
-- Table structure for table `merchants`
--

CREATE TABLE `merchants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'which this user allowd to login and use his account or not',
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `added_by_type` enum('administration','merchant_owner','employee') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'who added this merchant Administration is the delvarina owners , merchant owner is the owner of the marktes , employee is the employee on the markte ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `market_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merchants`
--

INSERT INTO `merchants` (`id`, `username`, `email`, `phone`, `password`, `active`, `image`, `notes`, `added_by`, `added_by_type`, `created_at`, `updated_at`, `market_id`, `name`, `type_id`) VALUES
(6, 'ahmedsami', 'ahmedsami@gmail.com', '010331434034', '$2y$10$4w/xwiynnJGtnVK.5LCesukI7304PUk6mY4lQZd12G2l5cDlApNw2', 1, '8gmVndHBnrjrR5uAPCDR7T6gZSa1uWcZXjuqkRuJ.jpeg', NULL, NULL, 'administration', '2020-11-13 17:08:04', '2021-01-04 12:48:21', 10, 'ahmed sami mohamed', 1),
(12, 'ahmedglal', NULL, '2145587968547', '$2y$10$t4P11FthOoe7QAuL63rMlOND2RUCUV5f4DXIzB/ZFTQPkVKoTT3/G', 1, 'aGdYwcfhC4kGmcAWOApPUD9EQ735gROU1hzFC72O.jpeg', NULL, 6, 'employee', '2021-01-07 19:05:13', '2021-01-07 19:20:53', 10, 'glal abdllah', 4);

-- --------------------------------------------------------

--
-- Table structure for table `merchant_permissions`
--

CREATE TABLE `merchant_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merchant_permissions`
--

INSERT INTO `merchant_permissions` (`id`, `merchant_id`, `permission_id`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 12, 1, 6, '2021-01-07 19:05:14', '2021-01-07 19:05:14'),
(2, 12, 2, 6, '2021-01-07 19:05:14', '2021-01-07 19:05:14'),
(3, 12, 3, 6, '2021-01-07 19:05:14', '2021-01-07 19:05:14'),
(4, 12, 4, 6, '2021-01-07 19:05:14', '2021-01-07 19:05:14'),
(5, 12, 8, 6, '2021-01-07 19:05:14', '2021-01-07 19:05:14'),
(6, 12, 9, 6, '2021-01-07 19:05:14', '2021-01-07 19:05:14'),
(7, 12, 10, 6, '2021-01-07 19:05:14', '2021-01-07 19:05:14'),
(8, 12, 11, 6, '2021-01-07 19:05:14', '2021-01-07 19:05:14'),
(9, 12, 15, 6, '2021-01-07 19:05:14', '2021-01-07 19:05:14'),
(10, 12, 16, 6, '2021-01-07 19:05:14', '2021-01-07 19:05:14'),
(11, 12, 17, 6, '2021-01-07 19:05:14', '2021-01-07 19:05:14'),
(12, 12, 19, 6, '2021-01-07 19:05:14', '2021-01-07 19:05:14'),
(13, 12, 20, 6, '2021-01-07 19:05:14', '2021-01-07 19:05:14'),
(14, 12, 21, 6, '2021-01-07 19:05:14', '2021-01-07 19:05:14'),
(15, 12, 1, 6, '2021-01-07 19:20:53', '2021-01-07 19:20:53'),
(16, 12, 2, 6, '2021-01-07 19:20:53', '2021-01-07 19:20:53'),
(17, 12, 3, 6, '2021-01-07 19:20:53', '2021-01-07 19:20:53'),
(18, 12, 4, 6, '2021-01-07 19:20:53', '2021-01-07 19:20:53'),
(19, 12, 8, 6, '2021-01-07 19:20:53', '2021-01-07 19:20:53'),
(20, 12, 9, 6, '2021-01-07 19:20:53', '2021-01-07 19:20:53'),
(21, 12, 10, 6, '2021-01-07 19:20:53', '2021-01-07 19:20:53'),
(22, 12, 11, 6, '2021-01-07 19:20:53', '2021-01-07 19:20:53'),
(23, 12, 15, 6, '2021-01-07 19:20:53', '2021-01-07 19:20:53'),
(24, 12, 16, 6, '2021-01-07 19:20:53', '2021-01-07 19:20:53'),
(25, 12, 17, 6, '2021-01-07 19:20:53', '2021-01-07 19:20:53'),
(26, 12, 1, 6, '2021-01-07 19:21:30', '2021-01-07 19:21:30'),
(27, 12, 2, 6, '2021-01-07 19:21:30', '2021-01-07 19:21:30'),
(28, 12, 3, 6, '2021-01-07 19:21:30', '2021-01-07 19:21:30'),
(29, 12, 4, 6, '2021-01-07 19:21:30', '2021-01-07 19:21:30'),
(30, 12, 8, 6, '2021-01-07 19:21:30', '2021-01-07 19:21:30'),
(31, 12, 9, 6, '2021-01-07 19:21:30', '2021-01-07 19:21:30'),
(32, 12, 10, 6, '2021-01-07 19:21:30', '2021-01-07 19:21:30'),
(33, 12, 11, 6, '2021-01-07 19:21:30', '2021-01-07 19:21:30'),
(34, 12, 15, 6, '2021-01-07 19:21:30', '2021-01-07 19:21:30'),
(35, 12, 16, 6, '2021-01-07 19:21:30', '2021-01-07 19:21:30'),
(36, 12, 17, 6, '2021-01-07 19:21:30', '2021-01-07 19:21:30'),
(37, 7, 1, 6, '2021-01-07 19:22:02', '2021-01-07 19:22:02'),
(38, 7, 2, 6, '2021-01-07 19:22:02', '2021-01-07 19:22:02'),
(39, 7, 3, 6, '2021-01-07 19:22:02', '2021-01-07 19:22:02'),
(40, 7, 8, 6, '2021-01-07 19:22:02', '2021-01-07 19:22:02'),
(41, 7, 9, 6, '2021-01-07 19:22:02', '2021-01-07 19:22:02'),
(42, 7, 10, 6, '2021-01-07 19:22:02', '2021-01-07 19:22:02'),
(43, 7, 14, 6, '2021-01-07 19:22:02', '2021-01-07 19:22:02'),
(44, 7, 15, 6, '2021-01-07 19:22:02', '2021-01-07 19:22:02'),
(45, 7, 16, 6, '2021-01-07 19:22:02', '2021-01-07 19:22:02'),
(46, 7, 1, 6, '2021-01-07 19:22:44', '2021-01-07 19:22:44'),
(47, 7, 2, 6, '2021-01-07 19:22:44', '2021-01-07 19:22:44'),
(48, 7, 3, 6, '2021-01-07 19:22:44', '2021-01-07 19:22:44'),
(49, 7, 8, 6, '2021-01-07 19:22:44', '2021-01-07 19:22:44'),
(50, 7, 9, 6, '2021-01-07 19:22:44', '2021-01-07 19:22:44'),
(51, 7, 10, 6, '2021-01-07 19:22:44', '2021-01-07 19:22:44'),
(52, 7, 14, 6, '2021-01-07 19:22:44', '2021-01-07 19:22:44'),
(53, 7, 15, 6, '2021-01-07 19:22:44', '2021-01-07 19:22:44'),
(54, 7, 16, 6, '2021-01-07 19:22:44', '2021-01-07 19:22:44'),
(55, 7, 18, 6, '2021-01-07 19:22:44', '2021-01-07 19:22:44'),
(56, 7, 19, 6, '2021-01-07 19:22:44', '2021-01-07 19:22:44'),
(57, 7, 20, 6, '2021-01-07 19:22:44', '2021-01-07 19:22:44');

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
(12, '2014_10_12_000000_create_users_table', 1),
(13, '2014_10_12_100000_create_password_resets_table', 1),
(14, '2019_08_19_000000_create_failed_jobs_table', 1),
(15, '2020_11_03_074526_create_merchants_table', 1),
(16, '2020_11_03_080035_create_admins_table', 1),
(17, '2020_11_03_080831_create_governorates_table', 1),
(18, '2020_11_03_080839_create_cities_table', 1),
(19, '2020_11_03_080920_create_countries_table', 1),
(20, '2020_11_03_081816_create_applications_table', 1),
(21, '2020_11_06_024425_create_markets_table', 1),
(22, '2020_11_06_024436_create_branches_table', 1),
(23, '2020_11_07_052009_add_lang_col_to_admins_table', 2),
(24, '2020_11_09_053139_create_permission_groups_table', 3),
(25, '2020_11_09_053300_create_permissions_table', 4),
(26, '2020_11_09_075606_create_admin_permissions_table', 5),
(27, '2020_11_11_085433_create_drivers_table', 6),
(28, '2020_11_13_055231_add_cols_martkes_table', 7),
(29, '2020_11_13_164708_add_market_id_col_merchants_table', 8),
(30, '2020_11_13_190056_create_market_documents_table', 9),
(31, '2020_11_13_204343_add_col_name_to_merchants_table', 10),
(32, '2020_11_14_091422_create_market_emails_table', 11),
(33, '2020_11_14_092129_create_market_bank_accounts_table', 12),
(37, '2014_04_02_193005_create_translations_table', 13),
(38, '2020_11_15_063757_create_trips_table', 13),
(39, '2020_11_22_133500_create_delivery_prices_table', 13),
(40, '2020_11_24_133449_create_city_delivery_prices_table', 14),
(41, '2020_11_26_114907_change_trip_table_cols', 15),
(42, '2020_11_30_071719_create_payment_methods_table', 16),
(43, '2020_11_30_090356_create_building_types_table', 17),
(44, '2020_11_30_130249_create_trip_items_table', 18),
(45, '2020_11_30_130536_create_customer_addresses_table', 19),
(46, '2020_12_11_142457_add_name_col_to_admins_table', 20),
(47, '2020_12_11_143226_create_admin_types_table', 21),
(48, '2020_12_12_120040_add_cols_to_admins_table', 22),
(50, '2020_12_20_133406_create_push_notifications_table', 23),
(51, '2021_01_07_201426_create_merchant_permissions_table', 24),
(52, '2021_01_14_150306_add_details_to_branches_table', 25),
(53, '2021_01_18_220658_add_expirdation_date_to_markets_table', 26);

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
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name_ar`, `name_en`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'كاش', 'Cash on delivery', 'cash', '2020-11-30 07:22:38', '2020-11-30 07:22:38'),
(2, 'كى نت', 'Knet', 'kent', '2020-11-30 07:22:38', '2020-11-30 07:22:38'),
(3, 'فيزا', 'Visa', 'visa', '2020-11-30 07:25:08', '2020-11-30 07:25:08');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `group_id`, `permission`, `description_ar`, `description_en`, `created_at`, `updated_at`) VALUES
(1, 1, 'add_admin', 'إضافه مشرف جديد', 'Add new admin', '2020-11-02 06:44:52', '2020-11-02 06:44:52'),
(2, 1, 'edit_admin', 'تعديل بيانات مشرف', 'Edit Admin details', '2020-11-02 06:44:52', '2020-11-02 06:44:52'),
(3, 1, 'delete_admin', 'حذف مشرف', 'Delete admin', '2020-10-01 14:41:14', '2020-10-01 12:28:26'),
(4, 1, 'active_admin', 'تفعيل & وقف المشرف', 'Activate & deactivate admin ', '2020-10-01 14:41:14', '2020-10-01 14:41:14'),
(5, 2, 'add_driver', 'إضافه سائق جديد', 'Add new driver', '2020-10-01 14:41:14', '2020-10-01 14:41:14'),
(6, 2, 'edit_driver', 'تعديل بيانات السائق', 'Edit driver details', '2020-10-01 14:41:14', '2020-10-01 14:41:14'),
(7, 2, 'delete_driver', 'حذف سائق', 'Delete Driver', '2020-10-01 14:41:14', '2020-10-01 14:41:14'),
(8, 3, 'add_trip', 'إضافه رحله جديده', 'Add new trip', '2020-11-09 06:54:42', '2020-11-09 06:54:42'),
(9, 3, 'edit_trip', 'تعديل بيانات الرحله', 'Edit Trip Details', '2020-11-09 06:54:42', '2020-11-09 06:54:42'),
(10, 3, 'delete_trip', 'حذف الرحله', 'Delete Trip', '2020-11-09 06:55:53', '2020-11-09 06:55:53'),
(11, 3, 'add_driver_to_trip', 'تعيين سائق للرحله', 'Add driver to trip', '2020-11-09 06:55:53', '2020-11-09 06:55:53'),
(12, 4, 'add_market', 'إضافه متجر جديد', 'Add new market', '2020-11-09 06:55:53', '2020-11-09 06:55:53'),
(13, 4, 'edit_market', 'تعديل بيانات المتجر', 'Edit market details', '2020-11-09 06:55:53', '2020-11-09 06:55:53'),
(14, 5, 'add_branch', 'اضافه فرع جديد', 'add new branch', '2021-01-04 20:21:17', '2021-01-04 20:21:17'),
(15, 5, 'edit_branch', 'تعديل بيانات الفرع', 'edit branch', '2021-01-04 20:21:17', '2021-01-04 20:21:17'),
(16, 5, 'show_branches', 'عرض كافه الفروع', 'show branches', '2021-01-06 20:22:30', '2021-01-06 20:22:30'),
(17, 5, 'delete_branch', 'حذف الفرع', 'delete branch', '2021-01-06 20:22:30', '2021-01-06 20:22:30'),
(18, 6, 'edit_permission', 'تعديل بيانات العميل ', 'edit permission', '2020-11-02 06:44:52', '2020-11-02 06:44:52'),
(19, 6, 'add_permisson', 'إضافه عميل جديد ', 'add permission', '2020-11-02 06:44:52', '2020-11-02 06:44:52'),
(20, 6, 'show_customers', 'عرض العملاء', 'show all customers', '2020-11-02 06:44:52', '2020-11-02 06:44:52'),
(21, 6, 'delete_customer', 'حذف العميل', 'delete customer', '2020-11-02 06:44:52', '2020-11-02 06:44:52');

-- --------------------------------------------------------

--
-- Table structure for table `permission_groups`
--

CREATE TABLE `permission_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_groups`
--

INSERT INTO `permission_groups` (`id`, `slug`, `name_ar`, `name_en`, `created_at`, `updated_at`) VALUES
(1, 'admins', 'المشرفين', 'Admins', '2020-11-09 06:43:51', '2020-11-09 06:43:51'),
(2, 'drivers', 'السائقين', 'Drivers', '2020-10-01 12:28:26', '2020-10-01 14:49:59'),
(3, 'trips', 'طلبات التوصيل', 'Trips', '2020-11-02 06:44:52', '2020-11-02 06:44:52'),
(4, 'markets', 'المتاجر', 'Markets', '2020-11-02 06:44:52', '2020-11-02 06:44:52'),
(5, 'branches', 'الفروع', 'branches', '2021-01-04 20:14:14', '2021-01-04 20:14:14'),
(6, 'customers', 'العملاء', 'customers', '2021-01-07 20:04:50', '2021-01-07 20:04:50');

-- --------------------------------------------------------

--
-- Table structure for table `push_notifications`
--

CREATE TABLE `push_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `drivers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `push_notifications`
--

INSERT INTO `push_notifications` (`id`, `title_ar`, `content_ar`, `title_en`, `content_en`, `drivers`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'صبصثب', 'صثثبصثب', 'صبصث', 'صثبثصب', '[\"4\", \"1\"]', 1, '2020-12-20 16:20:48', '2020-12-20 16:20:48'),
(2, 'صبصثب', 'صثثبصثب', 'صبصث', 'صثبثصب', '[\"4\"]', 1, '2020-12-20 16:28:20', '2020-12-20 16:28:20');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL,
  `market_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `order_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method_id` int(11) NOT NULL,
  `delivery_date_to_customer` datetime NOT NULL COMMENT 'Delivery date to the customer',
  `receipt_date_from_market` datetime NOT NULL COMMENT 'The date of receipt from the store',
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 means did not seen yet , 1 mean seen indeed',
  `paid` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 means not paid  , 1 means paid indeed',
  `status` int(11) NOT NULL,
  `error_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customer_address_id` int(11) NOT NULL,
  `bill_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `code`, `admin_id`, `market_id`, `branch_id`, `driver_id`, `order_price`, `delivery_price`, `payment_method_id`, `delivery_date_to_customer`, `receipt_date_from_market`, `notes`, `seen`, `paid`, `status`, `error_id`, `created_at`, `updated_at`, `customer_address_id`, `bill_image`, `order_image`) VALUES
(3, '131606799835', 1, 10, 1, 1, '200', '2', 2, '2021-01-19 19:00:00', '2020-11-20 21:00:00', NULL, 0, 0, 1, NULL, '2020-12-01 03:17:15', '2020-12-01 03:17:15', 15, NULL, NULL),
(4, '321606799872', 1, 10, 1, 1, '200', '2', 2, '2020-11-18 19:00:00', '2020-11-20 21:00:00', NULL, 0, 0, 1, NULL, '2020-12-01 03:17:52', '2020-12-01 03:17:52', 16, NULL, NULL),
(5, '91606799893', 1, 10, 1, 1, '200', '2', 2, '2020-11-18 19:00:00', '2020-11-20 21:00:00', NULL, 0, 0, 1, NULL, '2020-12-01 03:18:13', '2020-12-01 03:18:13', 17, NULL, NULL),
(6, '481606799915', 7, 10, 1, 1, '200', '2', 2, '2020-11-18 19:00:00', '2020-11-20 21:00:00', NULL, 0, 0, 1, NULL, '2020-12-01 03:18:35', '2020-12-01 03:18:35', 18, NULL, NULL),
(8, '251607961005', 1, 10, 2, 1, '33', '2', 2, '2021-01-19 19:00:00', '2020-12-16 07:00:00', NULL, 0, 0, 1, NULL, '2020-12-14 13:50:05', '2020-12-14 13:50:05', 28, NULL, NULL),
(9, '131607961021', 1, 10, 2, 4, '33', '2', 2, '2020-12-16 08:00:00', '2020-12-16 07:00:00', NULL, 0, 0, 1, NULL, '2020-12-14 13:50:21', '2020-12-14 13:50:21', 28, NULL, NULL),
(10, '131607961035', 1, 10, 2, 4, '33', '2', 2, '2020-12-16 08:00:00', '2020-12-16 07:00:00', NULL, 0, 0, 1, NULL, '2020-12-14 13:50:35', '2020-12-14 13:50:35', 28, NULL, NULL),
(11, '421607961035', 1, 10, 2, 1, '33', '2', 2, '2020-12-16 08:00:00', '2020-12-16 07:00:00', NULL, 0, 0, 1, NULL, '2020-12-14 13:50:35', '2020-12-14 13:50:35', 25, NULL, NULL),
(12, '331607975784', 7, 10, 1, 1, '33', '2', 1, '2020-12-20 15:00:00', '2020-12-15 01:30:00', NULL, 0, 0, 1, NULL, '2020-12-14 17:56:24', '2020-12-14 17:56:24', 28, NULL, NULL),
(13, '311607975855', 1, 10, 1, 4, '33', '2', 1, '2020-12-20 15:00:00', '2020-12-15 01:30:00', NULL, 0, 0, 1, NULL, '2020-12-14 17:57:35', '2020-12-14 17:57:35', 28, NULL, NULL),
(14, '411607975932', 37, 10, 1, 4, '33', '2', 1, '2020-12-20 15:00:00', '2020-12-15 01:30:00', NULL, 0, 0, 1, NULL, '2020-12-14 17:58:52', '2020-12-14 17:58:52', 28, NULL, NULL),
(15, '181607975941', 1, 10, 1, 1, '33', '2', 1, '2020-12-20 15:00:00', '2020-12-15 01:30:00', NULL, 0, 0, 1, NULL, '2020-12-14 17:59:01', '2020-12-14 17:59:01', 28, NULL, NULL),
(16, '211607975988', 1, 10, 1, 1, '33', '2', 1, '2020-12-20 15:00:00', '2020-12-15 01:30:00', NULL, 0, 0, 1, NULL, '2020-12-14 17:59:48', '2020-12-14 17:59:48', 28, NULL, NULL),
(17, '01607976034', 7, 10, 1, 4, '33', '2', 1, '2020-12-20 15:00:00', '2020-12-15 01:30:00', NULL, 0, 0, 1, NULL, '2021-01-19 14:49:36', '2020-12-14 18:00:34', 28, NULL, NULL),
(18, '421607976069', 1, 10, 1, 1, '33', '2', 1, '2020-12-20 15:00:00', '2020-12-15 01:30:00', NULL, 0, 0, 1, NULL, '2020-12-14 18:01:09', '2020-12-14 18:01:09', 28, NULL, NULL),
(19, '131607976069', 1, 10, 1, 4, '33', '2', 1, '2020-12-20 15:00:00', '2020-12-15 01:30:00', NULL, 0, 0, 1, NULL, '2021-01-19 14:49:36', '2020-12-14 18:01:09', 27, NULL, NULL),
(20, '191607976121', 44, 10, 1, 1, '33', '2', 1, '2021-01-19 19:00:00', '2020-12-15 01:30:00', NULL, 0, 0, 1, NULL, '2021-01-19 14:49:36', '2020-12-14 18:02:01', 28, NULL, NULL),
(21, '301607976121', 1, 10, 1, 1, '33', '2', 1, '2020-12-20 15:00:00', '2020-12-15 01:30:00', NULL, 0, 0, 1, NULL, '2020-12-14 18:02:01', '2020-12-14 18:02:01', 27, NULL, NULL),
(22, '291608033291', 1, 10, 2, 4, '7', '2', 2, '2020-12-16 01:30:00', '2020-12-16 00:00:00', NULL, 0, 0, 1, NULL, '2021-01-19 14:49:36', '2020-12-15 09:54:51', 28, NULL, NULL),
(23, '381608033291', 1, 10, 2, 4, '7', '2', 2, '2020-12-16 01:30:00', '2020-12-16 00:00:00', NULL, 0, 0, 1, NULL, '2020-12-15 09:54:51', '2020-12-15 09:54:51', 29, NULL, NULL),
(24, '221608033356', 1, 10, 2, 4, '7', '2', 2, '2020-12-16 01:30:00', '2020-12-16 00:00:00', NULL, 0, 0, 1, NULL, '2020-12-15 09:55:56', '2020-12-15 09:55:56', 28, NULL, NULL),
(25, '361608033356', 1, 10, 2, 4, '7', '2', 2, '2021-01-19 19:00:00', '2020-12-16 00:00:00', NULL, 0, 0, 1, NULL, '2020-12-15 09:55:56', '2020-12-15 09:55:56', 29, NULL, NULL),
(26, '271608033429', 1, 10, 2, 4, '323', '2', 1, '2020-12-16 02:00:00', '2020-12-15 00:30:00', NULL, 0, 0, 1, NULL, '2020-12-15 09:57:09', '2020-12-15 09:57:09', 23, NULL, NULL),
(27, '201608033429', 1, 10, 2, 4, '323', '2', 1, '2020-12-16 02:00:00', '2020-12-15 00:30:00', NULL, 0, 0, 1, NULL, '2020-12-15 09:57:09', '2020-12-15 09:57:09', 28, NULL, NULL),
(28, '91608033493', 1, 10, 1, 4, '33', '2', 1, '2020-12-15 00:00:00', '2020-12-16 02:30:00', NULL, 0, 0, 1, NULL, '2021-01-19 14:49:36', '2020-12-15 09:58:13', 28, NULL, NULL),
(29, '441608033493', 1, 10, 1, 4, '33', '2', 1, '2021-01-19 19:00:00', '2020-12-16 02:30:00', NULL, 0, 0, 1, NULL, '2021-01-19 14:49:36', '2020-12-15 09:58:13', 25, NULL, NULL),
(30, '01608757650', 1, 10, 1, 4, '100', NULL, 1, '2020-12-23 02:00:00', '2020-12-23 01:30:00', NULL, 0, 0, 1, NULL, '2021-01-19 14:49:36', '2020-12-23 19:07:30', 23, NULL, NULL),
(31, '31608757650', 1, 10, 1, 4, '100', NULL, 1, '2020-12-23 02:00:00', '2020-12-23 01:30:00', NULL, 0, 0, 1, NULL, '2021-01-19 14:49:36', '2020-12-23 19:07:30', 29, NULL, NULL),
(34, '61609876958', 6, 10, 1, NULL, '511', NULL, 1, '2021-01-06 01:30:00', '2021-01-05 00:30:00', NULL, 0, 0, 1, NULL, '2021-01-05 18:02:38', '2021-01-05 18:02:38', 24, NULL, NULL),
(36, '81609876958', 6, 10, 1, NULL, '511', NULL, 1, '2021-01-19 19:00:00', '2021-01-05 00:30:00', NULL, 0, 0, 1, NULL, '2021-01-19 14:49:36', '2021-01-05 18:02:38', 25, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trip_items`
--

CREATE TABLE `trip_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trip_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trip_items`
--

INSERT INTO `trip_items` (`id`, `trip_id`, `name`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 5, 'اسم المنتج', '2', '2020-12-01 03:18:13', '2020-12-01 03:18:13'),
(2, 6, 'اسم المنتج', '2', '2020-12-01 03:18:35', '2020-12-01 03:18:35'),
(3, 6, 'منتج2', '1', '2020-12-01 03:18:35', '2020-12-01 03:18:35'),
(4, 6, 'منتج3', '3', '2020-12-01 03:18:35', '2020-12-01 03:18:35'),
(5, 7, 'بببب', '1', '2020-12-14 13:43:06', '2020-12-14 13:43:06'),
(6, 8, 'بببب', '1', '2020-12-14 13:50:05', '2020-12-14 13:50:05'),
(7, 9, 'بببب', '1', '2020-12-14 13:50:21', '2020-12-14 13:50:21'),
(8, 11, 'بببب', '1', '2020-12-14 13:50:35', '2020-12-14 13:50:35'),
(9, 11, 'بببب', '1', '2020-12-14 13:50:35', '2020-12-14 13:50:35'),
(10, 13, 'منتج 1', '3', '2020-12-14 17:57:35', '2020-12-14 17:57:35'),
(11, 18, 'منتج', '2', '2020-12-14 18:01:09', '2020-12-14 18:01:09'),
(12, 18, 'منتج2', '74', '2020-12-14 18:01:09', '2020-12-14 18:01:09'),
(13, 19, 'منتج', '2', '2020-12-14 18:01:09', '2020-12-14 18:01:09'),
(14, 19, 'منتج2', '74', '2020-12-14 18:01:09', '2020-12-14 18:01:09'),
(15, 20, 'منتج', '2', '2020-12-14 18:02:01', '2020-12-14 18:02:01'),
(16, 20, 'منتج2', '74', '2020-12-14 18:02:01', '2020-12-14 18:02:01'),
(17, 21, 'منتج', '2', '2020-12-14 18:02:01', '2020-12-14 18:02:01'),
(18, 21, 'منتج2', '74', '2020-12-14 18:02:01', '2020-12-14 18:02:01'),
(19, 26, 'طبق مشويات كبير', '2', '2020-12-15 09:57:09', '2020-12-15 09:57:09'),
(20, 27, 'طبق مشويات كبير', '2', '2020-12-15 09:57:09', '2020-12-15 09:57:09'),
(21, 28, 'منتجات', '5', '2020-12-15 09:58:13', '2020-12-15 09:58:13'),
(22, 29, 'منتجات', '5', '2020-12-15 09:58:13', '2020-12-15 09:58:13'),
(23, 30, 'يسشيشس', '22', '2020-12-23 19:07:30', '2020-12-23 19:07:30'),
(24, 31, 'يسشيشس', '22', '2020-12-23 19:07:30', '2020-12-23 19:07:30'),
(25, 34, 'منتج', '1', '2021-01-05 18:02:38', '2021-01-05 18:02:38'),
(26, 34, 'منتج 25', '22', '2021-01-05 18:02:38', '2021-01-05 18:02:38'),
(27, 35, 'منتج', '1', '2021-01-05 18:02:38', '2021-01-05 18:02:38'),
(28, 35, 'منتج 25', '22', '2021-01-05 18:02:38', '2021-01-05 18:02:38'),
(29, 36, 'منتج', '1', '2021-01-05 18:02:38', '2021-01-05 18:02:38'),
(30, 36, 'منتج 25', '22', '2021-01-05 18:02:38', '2021-01-05 18:02:38');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ahmedsami', 'ahmedsamigeek@gmail.com', NULL, '$2y$10$./dqgWKIhbhK6tuS0iuPx.ZFbQLpcUgYP6CEC5rQh46hM3aChGqe.', NULL, '2020-11-06 04:36:42', '2020-11-06 04:36:42'),
(2, 'ahmed', 'ahmedsamigeek3@gmail.com', NULL, '$2y$10$1.rKuSV81MRE5pmKC9w5guc0D83/fnPJTqP65HvvOqBUHEG79n8V2', NULL, '2020-11-22 09:36:36', '2020-11-22 09:36:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_types`
--
ALTER TABLE `admin_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `building_types`
--
ALTER TABLE `building_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_delivery_prices`
--
ALTER TABLE `city_delivery_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_prices`
--
ALTER TABLE `delivery_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `governorates`
--
ALTER TABLE `governorates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ltm_translations`
--
ALTER TABLE `ltm_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markets`
--
ALTER TABLE `markets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `market_bank_accounts`
--
ALTER TABLE `market_bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `market_documents`
--
ALTER TABLE `market_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `market_emails`
--
ALTER TABLE `market_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchants`
--
ALTER TABLE `merchants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant_permissions`
--
ALTER TABLE `merchant_permissions`
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
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_groups`
--
ALTER TABLE `permission_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `push_notifications`
--
ALTER TABLE `push_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_items`
--
ALTER TABLE `trip_items`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `admin_types`
--
ALTER TABLE `admin_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `building_types`
--
ALTER TABLE `building_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `city_delivery_prices`
--
ALTER TABLE `city_delivery_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `delivery_prices`
--
ALTER TABLE `delivery_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `governorates`
--
ALTER TABLE `governorates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ltm_translations`
--
ALTER TABLE `ltm_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `markets`
--
ALTER TABLE `markets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `market_bank_accounts`
--
ALTER TABLE `market_bank_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `market_documents`
--
ALTER TABLE `market_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `market_emails`
--
ALTER TABLE `market_emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `merchants`
--
ALTER TABLE `merchants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `merchant_permissions`
--
ALTER TABLE `merchant_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `permission_groups`
--
ALTER TABLE `permission_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `push_notifications`
--
ALTER TABLE `push_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `trip_items`
--
ALTER TABLE `trip_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
