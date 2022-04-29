-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th4 04, 2022 lúc 03:32 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ma`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `abum`
--

CREATE TABLE `abum` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `isorder` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `langid` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `title` mediumtext NOT NULL,
  `description` longtext DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `istype` tinyint(4) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `langid` varchar(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `title`, `description`, `photo`, `status`, `istype`, `link`, `langid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(16, 'Banner1', '<p>test</p>', 'storage/photos/1/banner/1_bg.jpeg', 1, 1, NULL, 'en', '2022-03-30 21:06:44', '2022-03-30 21:06:44', NULL),
(17, 'banner2', '<p>tee</p>', 'storage/photos/1/banner/2_bg.jpeg', 1, 1, NULL, 'en', '2022-03-30 21:06:58', '2022-03-30 21:06:58', NULL),
(18, '3', '<p>tes</p>', 'storage/photos/1/banner/3_bg.jpeg', 1, 1, NULL, 'en', '2022-03-30 21:07:21', '2022-03-30 21:07:21', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `slug` varchar(500) NOT NULL,
  `summary` longtext NOT NULL,
  `content` longtext NOT NULL,
  `photo` varchar(255) NOT NULL,
  `ishome` tinyint(1) NOT NULL,
  `isorder` int(11) NOT NULL,
  `keyword` longtext DEFAULT NULL,
  `meta` longtext DEFAULT NULL,
  `pagetitle` longtext DEFAULT NULL,
  `status` int(11) NOT NULL,
  `langid` varchar(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `slug` varchar(500) NOT NULL,
  `istype` int(11) NOT NULL,
  `ismenu` int(11) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `isorder` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `langid` varchar(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `slug`, `istype`, `ismenu`, `photo`, `isorder`, `status`, `langid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(25, 0, 'Home', 'home', 1, 1, NULL, 1, 1, 'en', '2022-03-30 21:00:04', '2022-03-30 21:00:04', NULL),
(26, 0, 'Service', 'service', 3, 1, NULL, 2, 1, 'en', '2022-03-30 21:00:19', '2022-03-30 21:00:19', NULL),
(27, 0, 'Work', 'work', 5, 1, NULL, 3, 1, 'en', '2022-03-30 21:00:39', '2022-03-30 21:00:39', NULL),
(28, 0, 'About', 'about', 2, 1, NULL, 4, 1, 'en', '2022-03-30 21:00:49', '2022-03-30 21:00:49', NULL),
(29, 0, 'Contact', 'contact', 4, 1, NULL, 5, 1, 'en', '2022-03-30 21:01:02', '2022-03-30 21:01:02', NULL),
(30, 26, 'Web Development', 'web-development', 3, 1, 'storage/photos/1/service/config1.png', 1, 1, 'en', '2022-03-30 21:10:42', '2022-03-30 21:10:42', NULL),
(31, 26, 'Mobile UI Design', 'mobile-ui-design', 3, 1, 'storage/photos/1/service/config2.png', 2, 1, 'en', '2022-03-30 21:11:23', '2022-03-30 21:11:23', NULL),
(32, 26, 'Joomla Development', 'joomla-development', 3, 1, 'storage/photos/1/service/config3.png', 3, 1, 'en', '2022-03-30 21:11:52', '2022-03-30 21:11:52', NULL),
(33, 26, 'Android Development', 'android-development', 3, 1, 'storage/photos/1/service/config4.png', 4, 1, 'en', '2022-03-30 21:12:56', '2022-03-30 21:12:56', NULL),
(34, 26, 'Customice CMS', 'customice-cms', 3, 1, 'storage/photos/1/service/config5.png', 5, 1, 'en', '2022-03-30 21:13:31', '2022-03-30 21:13:31', NULL),
(35, 26, 'Email marketing', 'email-marketing', 3, 1, 'storage/photos/1/service/config6.png', 6, 1, 'en', '2022-03-30 21:14:03', '2022-03-30 21:14:03', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(5000) NOT NULL,
  `note` longtext NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', '2019-09-19 05:14:15', '2019-09-19 05:14:15', NULL),
(2, 'permission_create', '2019-09-19 05:14:15', '2019-09-19 05:14:15', NULL),
(3, 'permission_edit', '2019-09-19 05:14:15', '2019-09-19 05:14:15', NULL),
(4, 'permission_show', '2019-09-19 05:14:15', '2019-09-19 05:14:15', NULL),
(5, 'permission_delete', '2019-09-19 05:14:15', '2019-09-19 05:14:15', NULL),
(6, 'permission_access', '2019-09-19 05:14:15', '2019-09-19 05:14:15', NULL),
(7, 'role_create', '2019-09-19 05:14:15', '2019-09-19 05:14:15', NULL),
(8, 'role_edit', '2019-09-19 05:14:15', '2019-09-19 05:14:15', NULL),
(9, 'role_show', '2019-09-19 05:14:15', '2019-09-19 05:14:15', NULL),
(10, 'role_delete', '2019-09-19 05:14:15', '2019-09-19 05:14:15', NULL),
(11, 'role_access', '2019-09-19 05:14:15', '2019-09-19 05:14:15', NULL),
(12, 'user_create', '2019-09-19 05:14:15', '2019-09-19 05:14:15', NULL),
(13, 'user_edit', '2019-09-19 05:14:15', '2019-09-19 05:14:15', NULL),
(14, 'user_show', '2019-09-19 05:14:15', '2019-09-19 05:14:15', NULL),
(15, 'user_delete', '2019-09-19 05:14:15', '2019-09-19 05:14:15', NULL),
(16, 'user_access', '2019-09-19 05:14:15', '2019-09-19 05:14:15', NULL),
(17, 'service_create', '2019-09-19 05:14:15', '2022-03-24 02:19:00', '2022-03-24 02:19:00'),
(18, 'service_edit', '2019-09-19 05:14:15', '2022-03-24 02:18:58', '2022-03-24 02:18:58'),
(19, 'service_show', '2019-09-19 05:14:15', '2022-03-24 02:18:56', '2022-03-24 02:18:56'),
(20, 'service_delete', '2019-09-19 05:14:15', '2022-03-24 02:18:54', '2022-03-24 02:18:54'),
(21, 'service_access', '2019-09-19 05:14:15', '2022-03-24 02:18:52', '2022-03-24 02:18:52'),
(22, 'employee_create', '2019-09-19 05:14:15', '2022-03-24 02:18:50', '2022-03-24 02:18:50'),
(23, 'employee_edit', '2019-09-19 05:14:15', '2022-03-24 02:18:48', '2022-03-24 02:18:48'),
(24, 'employee_show', '2019-09-19 05:14:15', '2022-03-24 02:18:46', '2022-03-24 02:18:46'),
(25, 'employee_delete', '2019-09-19 05:14:15', '2022-03-24 02:18:44', '2022-03-24 02:18:44'),
(26, 'employee_access', '2019-09-19 05:14:15', '2022-03-24 02:18:42', '2022-03-24 02:18:42'),
(27, 'client_create', '2019-09-19 05:14:15', '2022-03-24 02:18:40', '2022-03-24 02:18:40'),
(28, 'client_edit', '2019-09-19 05:14:15', '2022-03-24 02:18:38', '2022-03-24 02:18:38'),
(29, 'client_show', '2019-09-19 05:14:15', '2022-03-24 02:18:35', '2022-03-24 02:18:35'),
(30, 'client_delete', '2019-09-19 05:14:15', '2022-03-24 02:18:32', '2022-03-24 02:18:32'),
(31, 'client_access', '2019-09-19 05:14:15', '2022-03-24 02:18:30', '2022-03-24 02:18:30'),
(32, 'appointment_create', '2019-09-19 05:14:15', '2022-03-24 02:18:28', '2022-03-24 02:18:28'),
(33, 'appointment_edit', '2019-09-19 05:14:15', '2022-03-24 02:18:27', '2022-03-24 02:18:27'),
(34, 'appointment_show', '2019-09-19 05:14:15', '2022-03-24 02:18:25', '2022-03-24 02:18:25'),
(35, 'appointment_delete', '2019-09-19 05:14:15', '2022-03-24 02:18:23', '2022-03-24 02:18:23'),
(36, 'appointment_access', '2019-09-19 05:14:15', '2022-03-24 02:18:21', '2022-03-24 02:18:21'),
(37, 'abum_access', '2022-03-24 02:19:10', '2022-03-24 02:19:10', NULL),
(38, 'abum_create', '2022-03-24 02:19:19', '2022-03-24 02:19:19', NULL),
(39, 'abum_edit', '2022-03-24 02:19:26', '2022-03-24 02:19:26', NULL),
(40, 'abum_delete', '2022-03-24 02:19:34', '2022-03-24 02:19:34', NULL),
(41, 'gallery_access', '2022-03-24 02:19:42', '2022-03-24 20:54:41', '2022-03-24 20:54:41'),
(42, 'gallery_create', '2022-03-24 02:19:52', '2022-03-24 20:54:38', '2022-03-24 20:54:38'),
(43, 'gallery_edit', '2022-03-24 02:19:59', '2022-03-24 20:54:36', '2022-03-24 20:54:36'),
(44, 'gallery_delete', '2022-03-24 02:20:12', '2022-03-24 20:54:34', '2022-03-24 20:54:34'),
(45, 'banner_access', '2022-03-24 20:57:13', '2022-03-24 20:57:13', NULL),
(46, 'banner_create', '2022-03-24 20:57:22', '2022-03-24 20:57:22', NULL),
(47, 'banner_edit', '2022-03-24 20:57:33', '2022-03-24 20:57:33', NULL),
(48, 'banner_delete', '2022-03-24 20:57:42', '2022-03-24 20:57:42', NULL),
(49, 'category_access', '2022-03-30 20:42:02', '2022-03-30 20:42:02', NULL),
(50, 'category_create', '2022-03-30 20:42:10', '2022-03-30 20:42:10', NULL),
(51, 'category_edit', '2022-03-30 20:42:18', '2022-03-30 20:42:18', NULL),
(52, 'category_delete', '2022-03-30 20:42:29', '2022-03-30 20:42:29', NULL),
(53, 'blog_access', '2022-03-30 20:42:52', '2022-03-30 20:42:52', NULL),
(54, 'blog_create', '2022-03-30 20:43:05', '2022-03-30 20:43:05', NULL),
(55, 'blog_edit', '2022-03-30 20:43:14', '2022-03-30 20:43:14', NULL),
(56, 'blog_delete', '2022-03-30 20:43:25', '2022-03-30 20:43:25', NULL),
(57, 'setting_access', '2022-03-30 20:43:35', '2022-03-30 20:43:35', NULL),
(58, 'setting_create', '2022-03-30 20:43:43', '2022-03-30 20:43:43', NULL),
(59, 'setting_edit', '2022-03-30 20:43:54', '2022-03-30 20:43:54', NULL),
(60, 'setting_delete', '2022-03-30 20:44:02', '2022-03-30 20:44:02', NULL),
(61, 'contact_access', '2022-03-30 20:45:32', '2022-03-30 20:45:32', NULL),
(62, 'contact_create', '2022-03-30 20:45:41', '2022-03-30 20:45:41', NULL),
(63, 'contact_edit', '2022-03-30 20:45:50', '2022-03-30 20:45:50', NULL),
(64, 'contact_delete', '2022-03-30 20:45:58', '2022-03-30 20:45:58', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', '2019-09-19 05:08:28', '2019-09-19 05:08:28', NULL),
(2, 'User', '2019-09-19 05:08:28', '2019-09-19 05:08:28', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `map` mediumtext DEFAULT NULL,
  `video` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `openhour` varchar(4000) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `langid` varchar(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `setting`
--

INSERT INTO `setting` (`id`, `logo`, `map`, `video`, `email`, `openhour`, `facebook`, `twitter`, `linkedin`, `address`, `phone`, `langid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'storage/photos/1/logo/istockphoto-1067616104-612x612.jpeg', NULL, NULL, 'hiennt@maglobal-co.com', '8:00 - 17:00', NULL, NULL, NULL, 'Tokyo - Japan', '21212', 'en', '2022-03-30 21:04:40', '2022-03-30 21:04:40', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$Y.jEitizf.DW3V7gxCnMr.SdWN2i1w4gobo28vTLGaFajqcjUl8Oy', NULL, '2019-09-19 05:08:28', '2019-09-19 05:08:28', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `abum`
--
ALTER TABLE `abum`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Chỉ mục cho bảng `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Chỉ mục cho bảng `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Chỉ mục cho bảng `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `role_id_fk_360589` (`role_id`),
  ADD KEY `permission_id_fk_360589` (`permission_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `user_id_fk_360598` (`user_id`),
  ADD KEY `role_id_fk_360598` (`role_id`);

--
-- Chỉ mục cho bảng `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `abum`
--
ALTER TABLE `abum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_id_fk_360589` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_id_fk_360589` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_id_fk_360598` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_360598` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
