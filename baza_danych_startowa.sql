-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Czas generowania: 24 Wrz 2020, 07:46
-- Wersja serwera: 8.0.21-0ubuntu0.20.04.4
-- Wersja PHP: 7.2.33-1+ubuntu20.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `prywatne_gamex`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `accounts`
--

CREATE TABLE `accounts` (
  `id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `blogs`
--

CREATE TABLE `blogs` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `filepath` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `opis` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `filepath`, `opis`, `thumb`, `slug`, `content`, `category`, `seo_title`, `seo_description`, `user_id`, `created_at`, `updated_at`) VALUES
(12, 'Automat do wyrobu girlandy żyłkowej 2 kolorowej', '/photos/shares/automat-do-wyrobu-girlandy.jpg', 'Automat do wyrobu girlandy żyłkowej 2 kolorowej', 'Automat do wyrobu girlandy żyłkowej 2 kolorowej', 'automat-do-wyrobu-girlandy-zylkowej-2-kolorowej', 'Automat do wyrobu girlandy żyłkowej 2 kolorowej', '10', 'Automat do wyrobu girlandy żyłkowej 2 kolorowej', 'Automat do wyrobu girlandy żyłkowej 2 kolorowej', '1', '2019-05-27 06:01:45', '2019-06-21 21:57:40'),
(13, 'Automat do cięcia i skręcania girlandy', '/photos/shares/test.jpg', 'Automat do cięcia i skręcania girlandy', 'Automat do cięcia i skręcania girlandy', 'automat-do-ciecia-i-skrecania-girlandy', 'Automat do cięcia i skręcania girlandy', '10', 'Automat do cięcia i skręcania girlandy', 'Automat do cięcia i skręcania girlandy', '1', '2019-05-27 06:02:18', '2019-06-20 19:16:14'),
(14, 'Zszywarka gałązek', '/photos/shares/test.jpg', 'Zszywarka gałązek', 'Zszywarka gałązek', 'zszywarka-galazek', 'Zszywarka gałązek', '10', 'Zszywarka gałązek', 'Zszywarka gałązek', '1', '2019-05-27 06:02:38', '2019-06-20 19:16:18'),
(15, 'Automat do cięcia i skręcania girlandy z wykroinikiem', '/photos/shares/test.jpg', 'Automat do cięcia i skręcania girlandy z wykroinikiem', 'Automat do cięcia i skręcania girlandy z wykroinikiem', 'automat-do-ciecia-i-skrecania-girlandy-z-wykroinikiem', 'Automat do cięcia i skręcania girlandy z wykroinikiem', '10', 'Automat do cięcia i skręcania girlandy z wykroinikiem', 'Automat do cięcia i skręcania girlandy z wykroinikiem', '1', '2019-05-27 06:02:50', '2019-06-20 19:16:22'),
(16, 'Gałęziarka', '/photos/shares/test.jpg', 'Gałęziarka', 'Gałęziarka', 'galeziarka', 'Gałęziarka', '10', 'Gałęziarka', 'Gałęziarka', '1', '2019-05-27 06:03:13', '2019-06-20 19:16:26'),
(17, 'Gałęziarka 2s', '/photos/shares/test.jpg', 'Gałęziarka 2s', 'Gałęziarka 2s', 'galeziarka-2s', 'Gałęziarka 2s', '10', 'Gałęziarka 2s', 'Gałęziarka 2s', '1', '2019-05-27 06:03:15', '2019-06-20 19:16:29'),
(18, 'Maszyna do łańcucha', '/photos/shares/test.jpg', 'Maszyna do łańcucha', 'Maszyna do łańcucha', 'maszyna-do-lancucha', 'Maszyna do łańcucha', '10', 'Maszyna do łańcucha', 'Maszyna do łańcucha', '1', '2019-05-27 06:03:22', '2019-06-20 19:16:34'),
(19, 'Maszyna do girlandy 2g', NULL, 'Maszyna do girlandy 2g', 'Maszyna do girlandy 2g', 'maszyna-do-girlandy-2g', 'Maszyna do girlandy 2g', '10', 'Maszyna do girlandy 2g', 'Maszyna do girlandy 2g', '1', '2019-05-27 06:03:31', '2019-05-27 06:03:31'),
(20, 'Maszyna do girlandy żyłkowej', '/photos/shares/test.jpg', 'Maszyna do girlandy żyłkowej', 'Maszyna do girlandy żyłkowej', 'maszyna-do-girlandy-zylkowej', 'Maszyna do girlandy żyłkowej', '10', 'Maszyna do girlandy żyłkowej', 'Maszyna do girlandy żyłkowej', '1', '2019-05-27 06:03:56', '2019-06-20 19:16:37'),
(21, 'Maszyna do śnieżenia choinek', NULL, 'Maszyna do śnieżenia choinek', 'Maszyna do śnieżenia choinek', 'maszyna-do-sniezenia-choinek', 'Maszyna do śnieżenia choinek', '10', 'Maszyna do śnieżenia choinek', 'Maszyna do śnieżenia choinek', '1', '2019-05-27 06:04:03', '2019-05-27 06:04:03'),
(22, 'Maszyna do składania choinek', NULL, 'Maszyna do składania choinek', 'Maszyna do składania choinek', 'maszyna-do-skladania-choinek', 'Maszyna do składania choinek', '10', 'Maszyna do składania choinek', 'Maszyna do składania choinek', '1', '2019-05-27 06:04:09', '2019-05-27 06:04:09'),
(23, 'Nacinarka folii w igle', NULL, 'Nacinarka folii w igle', 'Nacinarka folii w igle', 'nacinarka-folii-w-igle', 'Nacinarka folii w igle', '10', 'Nacinarka folii w igle', 'Nacinarka folii w igle', '1', '2019-05-27 06:04:17', '2019-05-27 06:04:17'),
(24, 'Nacinarka folii w igle wałkiem', NULL, 'Nacinarka folii w igle wałkiem', 'Nacinarka folii w igle wałkiem', 'nacinarka-folii-w-igle-walkiem', 'Nacinarka folii w igle wałkiem', '10', 'Nacinarka folii w igle wałkiem', 'Nacinarka folii w igle wałkiem', '1', '2019-05-27 06:04:54', '2019-05-27 06:04:54'),
(25, 'Obcinarka girlandy', NULL, 'Obcinarka girlandy', 'Obcinarka girlandy', 'obcinarka-girlandy', 'Obcinarka girlandy', '10', 'Obcinarka girlandy', 'Obcinarka girlandy', '1', '2019-05-27 06:05:02', '2019-05-27 06:05:02'),
(26, 'Obcinarka żyłki', NULL, 'Obcinarka arka żyłki', 'Obcinarka żyłki', 'obcinarka-zylki', 'Obcinarka żyłki', '10', 'Obcinarka żyłki', 'Obcinarka żyłki', '1', '2019-05-27 06:05:21', '2019-05-27 06:05:21'),
(27, 'Przecinarka wąski pasek', NULL, 'Przecinarka wąski pasek', 'Przecinarka wąski pasek', 'przecinarka-waski-pasek', 'Przecinarka wąski pasek', '10', 'Przecinarka wąski pasek', 'Przecinarka wąski pasek', '1', '2019-05-27 06:05:30', '2019-05-27 06:05:30'),
(28, 'Przewijarka drutów', NULL, 'Przewijarka drutów', 'Przewijarka drutów', 'przewijarka-drutow', 'Przewijarka drutów', '10', 'Przewijarka drutów', 'Przewijarka drutów', '1', '2019-05-27 06:05:47', '2019-05-27 06:05:47'),
(29, 'Skręcarka 2g', NULL, 'Skręcarka 2g', 'Skręcarka 2g', 'skrecarka-2g', 'Skręcarka 2g', '10', 'Skręcarka 2g', 'Skręcarka 2g', '1', '2019-05-27 06:05:58', '2019-05-27 06:05:58'),
(30, 'Wałek tnący', NULL, 'Wałek tnący', 'Wałek tnący', 'walek-tnacy', 'Wałek tnący', '10', 'Wałek tnący', 'Wałek tnący', '1', '2019-05-27 06:06:05', '2019-05-27 06:06:05');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `templates` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_green` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_white` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `seo_title`, `seo_description`, `thumb`, `templates`, `text_green`, `text_white`, `created_at`, `updated_at`) VALUES
(9, 'Girlandy', 'girlandy', 'In neque ante, luctus non dapibus et, aliquet sit amet lacus. Ut a turpis quam. Praesent rutrum elit mi, at feugiat purus facilisis at.', 'Girlandy', '21fdsfdsfds', NULL, 'kategoria', 'sdfsdf', 'sdf', '2019-05-26 15:50:11', '2019-08-13 19:09:12'),
(10, 'Maszyny do produkcji', 'maszyny-do-produkcji', 'In neque ante, luctus non dapibus et, aliquet sit amet lacus. Ut a turpis quam. Praesent rutrum elit mi, at feugiat purus facilisis at.', NULL, NULL, NULL, 'kategoria', NULL, NULL, '2019-05-26 15:50:15', '2019-08-12 21:10:22'),
(11, 'Podstawy pod wieńce', 'podstawy-pod-wience', 'In neque ante, luctus non dapibus et, aliquet sit amet lacus. Ut a turpis quam. Praesent rutrum elit mi, at feugiat purus facilisis at.', NULL, NULL, NULL, 'kategoria', 'nowy i lepsz', 'fsdfsdfsd', '2019-05-26 15:50:28', '2019-08-12 21:10:25'),
(12, 'Folia, drut, żyłka', 'folia-drut-zylka', 'In neque ante, luctus non dapibus et, aliquet sit amet lacus. Ut a turpis quam. Praesent rutrum elit mi, at feugiat purus facilisis at.', NULL, NULL, NULL, 'kategoria', NULL, NULL, '2019-05-26 15:50:30', '2019-08-12 21:10:27'),
(13, 'Uchwyty do choinek', 'uchwyty-do-choinek', 'In neque ante, luctus non dapibus et, aliquet sit amet lacus. Ut a turpis quam. Praesent rutrum elit mi, at feugiat purus facilisis at.', NULL, NULL, NULL, 'kategoria', NULL, NULL, '2019-05-26 15:50:34', '2019-08-12 21:10:30');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `forms`
--

CREATE TABLE `forms` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_id` int UNSIGNED NOT NULL,
  `parent` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `forms`
--

INSERT INTO `forms` (`id`, `name`, `title`, `url`, `order`, `menu_id`, `parent`, `created_at`, `updated_at`) VALUES
(1, 'fbhghbfg', 'hgfhgfhgf', 'hfghfg', '3', 1, NULL, '2019-08-16 06:23:40', '2020-04-30 05:12:32'),
(3, 'fsd', 'fsd', 'fds', '0', 1, 1, '2020-04-29 11:39:10', '2020-04-29 11:39:12');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `hooks`
--

CREATE TABLE `hooks` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `media`
--

CREATE TABLE `media` (
  `id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `menus`
--

CREATE TABLE `menus` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `menus`
--

INSERT INTO `menus` (`id`, `name`) VALUES
(1, 'bdhfjfgbd');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `menu_builders`
--

CREATE TABLE `menu_builders` (
  `id` int UNSIGNED NOT NULL,
  `menu_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_desc` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `menu_builders`
--

INSERT INTO `menu_builders` (`id`, `menu_title`, `menu_desc`, `created_at`, `updated_at`) VALUES
(1, 'Strona główna', 'menu od góry', '2019-05-17 19:47:06', '2019-05-17 19:47:06');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int UNSIGNED NOT NULL,
  `menu_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parents_items` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_parent` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `page_name`, `parents_items`, `page_number`, `page_title`, `page_parent`, `created_at`, `updated_at`) VALUES
(1, '1', 'Strona główna', '1', NULL, '/', NULL, '2019-05-17 19:47:06', '2019-05-25 19:48:04'),
(2, '1', 'Oferta', '2', NULL, '/oferta', NULL, '2019-05-17 19:47:06', '2019-05-17 19:47:06'),
(3, '1', 'Maszyny do produkcji', NULL, '1', '/maszyny-do-produkcji', '2', '2019-05-17 19:47:06', '2019-05-17 19:47:06'),
(4, '1', 'Uchwyty do choinek', NULL, '2', '/uchwyty-do-choinek', '2', '2019-05-17 19:47:06', '2019-05-17 19:47:06'),
(5, '1', 'Folia, drut, żyłka', NULL, '3', '/folia-drut-zylka', '2', '2019-05-17 19:47:06', '2019-05-17 19:47:06'),
(6, '1', 'Girlandy', NULL, '4', '/girlandy', '2', '2019-05-17 19:47:06', '2019-05-17 19:47:06'),
(7, '1', 'Podstawy pod wieńce', NULL, '5', '/podstawy-pod-wience', '2', '2019-05-17 19:47:06', '2019-05-17 19:47:06'),
(8, '1', 'Kontakt', '3', NULL, '/kontakt', NULL, '2019-05-17 19:47:06', '2019-05-17 19:47:06');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_02_09_162410_create_pages_table', 1),
(4, '2019_02_09_163055_create_menu_items_table', 1),
(5, '2019_02_14_214323_create_blogs_table', 1),
(6, '2019_02_14_214400_create_accounts_table', 1),
(7, '2019_02_14_214414_create_settings_table', 1),
(8, '2019_02_14_215629_create_media_table', 1),
(9, '2019_03_10_135806_create_menu_builders_table', 1),
(10, '2019_04_27_211027_create_roles_table', 1),
(11, '2019_04_27_211143_create_role_user_table', 1),
(12, '2019_05_17_215413_create_categories_table', 2),
(13, '2018_11_12_150644_hooks', 3),
(16, '2019_07_14_203505_create_sliders_table', 4),
(17, '2019_07_14_203617_create_slider_items_table', 4),
(18, '2019_06_25_050629_menu', 5),
(19, '2019_06_25_064659_create_forms_table', 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pages`
--

CREATE TABLE `pages` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `opis` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `templates` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `pages`
--

INSERT INTO `pages` (`id`, `title`, `opis`, `slug`, `templates`, `content`, `category`, `seo_title`, `seo_description`, `parent_id`, `user_id`, `thumb`, `created_at`, `updated_at`) VALUES
(1, 'home', 'strona startowa', 'home', 'homepage', 'Witam', 'brak', 'Gamex | Producent choinek i wieńcy', 'choinek itd.', NULL, '1', 'test', '2019-05-17 19:52:07', '2020-04-30 05:14:06'),
(3, 'kontakt', 'kontakt', 'kontakt', 'kontakt', 'kontakt', 'kontakt', 'kontakt', 'kontakt', NULL, '1', 'kontakt', '2019-07-08 18:47:28', '2019-07-08 18:47:28');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roles`
--

CREATE TABLE `roles` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2019-04-27 19:21:58', '2019-04-27 19:21:58'),
(2, 'moderator', 'Właściciel strony', '2019-04-27 19:21:58', '2019-04-27 19:21:58'),
(3, 'user', 'Zwykły użytkownik', '2019-04-27 19:21:58', '2019-04-27 19:21:58');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `role_user`
--

CREATE TABLE `role_user` (
  `id` int UNSIGNED NOT NULL,
  `role_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`) VALUES
(1, 1, 2),
(2, 2, 3),
(3, 3, 4),
(4, 3, 6),
(5, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `settings`
--

CREATE TABLE `settings` (
  `id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sliders`
--

CREATE TABLE `sliders` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'slider główny', 'to jest homepage', '2019-07-15 17:00:29', '2019-07-15 17:00:29'),
(2, 'drugie menu', 'test', '2019-07-15 17:50:17', '2019-07-15 17:50:17');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `slider_items`
--

CREATE TABLE `slider_items` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `more_info` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_slider` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `slider_items`
--

INSERT INTO `slider_items` (`id`, `title`, `description`, `more_info`, `link`, `display`, `button_text`, `id_slider`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'djgh', 'h', 'fghj', 'fghj', 'fghj', 'fghj', '2', '/photos/shares/automat-do-wyrobu-girlandy.jpg', '2019-08-03 17:58:50', '2019-08-03 17:58:50'),
(2, 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', '2', '/photos/shares/test.jpg', '2019-08-03 17:59:25', '2019-08-03 17:59:25'),
(3, 'fgh', 'fgh', 'fgh', 'fgh', 'fgh', 'fghh', '1', '/photos/shares/test.jpg', '2019-08-03 17:59:47', '2019-08-03 17:59:47');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test@o2.com', NULL, '$2y$10$yPOPd9R.7MZW4xCUCFmRQudlhFxuZDl5IRYz0Y/uUhAbu26Sne4V6', 'dMSgj1FeFqPAPLnAgHKMOSQS67madE5fNwJhOxW2S0dboIsUylAZQdpH8KSM', NULL, NULL),
(2, 'test', 'test@o2.pl', NULL, '$2y$10$ulzFQBJlyO8lUW4OtRPU2.CMnrgO//9m6K757MyYV2yniu53D4urm', NULL, '2019-04-27 19:21:58', '2019-04-27 19:21:58'),
(3, 'test1', 'test1@o2.pl', NULL, '$2y$10$fd5snqxYl1/K1RAq0hr0WOSCj7SFKqkQnXfLVT2qf.EWp/vxb9jLO', NULL, '2019-04-27 19:21:58', '2019-04-27 19:21:58'),
(4, 'test2', 'test2@o2.pl', NULL, '$2y$10$1vFkaDbFVCbjmcmKc9rMhu0gO3GqJASqtf0hGie9YeqUp1SB2.vGe', NULL, '2019-04-27 19:21:58', '2019-04-27 19:21:58'),
(5, 'test1234', 'test@1234.pl', NULL, '$2y$10$6qYwUbUfyDaQlaEOECBP0OzA7Du00YwD1oTTGg/G8QWnyi6nLpW66', NULL, '2019-04-27 19:22:43', '2019-04-27 19:22:43'),
(6, 'test1234', 'test1@1234.pl', NULL, '$2y$10$ialgGwEC9bWFb6qBo./UvOWB6LaHK7hq28Uq/03T4LBwNWmFqiHc6', NULL, '2019-04-27 19:23:23', '2019-04-27 19:23:23');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forms_menu_id_foreign` (`menu_id`),
  ADD KEY `forms_parent_foreign` (`parent`);

--
-- Indeksy dla tabeli `hooks`
--
ALTER TABLE `hooks`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `menu_builders`
--
ALTER TABLE `menu_builders`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeksy dla tabeli `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `slider_items`
--
ALTER TABLE `slider_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT dla tabel zrzutów
--

--
-- AUTO_INCREMENT dla tabeli `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `hooks`
--
ALTER TABLE `hooks`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `media`
--
ALTER TABLE `media`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `menu_builders`
--
ALTER TABLE `menu_builders`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT dla tabeli `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `slider_items`
--
ALTER TABLE `slider_items`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `forms`
--
ALTER TABLE `forms`
  ADD CONSTRAINT `forms_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `forms_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `forms` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
