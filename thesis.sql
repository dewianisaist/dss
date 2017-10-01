-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 01, 2017 at 04:45 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_permission` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `nip`, `password`, `remember_token`, `is_permission`, `created_at`, `updated_at`) VALUES
(1, '1234567890', '$2y$10$xbiTvjoS3JXzHuWuDVo1M.e2ynQ/6JqoEuec.tSZba5h31vlyTvRK', 'ibxSAUoiZjimXIAgLZGk8ogFGv5dmnAvn8WstEZFO0BdXtqi5h7UOMrYaCih', 0, '2017-09-27 21:40:07', '2017-09-27 21:45:10'),
(2, '22222222', '$2y$10$8MamFiQ2ghFamlCFHq.O4un9jkgka486tq7rwZ4TnInoPT3/.HxZS', '92jyopkkNcAZn3ytzoUNU5wrvVVtC94i2MqNddS751nwliVfg7cTnQ1bnQoS', 0, '2017-09-28 20:14:29', '2017-09-28 20:16:25'),
(3, '11111111', '$2y$10$vTY.zT8yHg981ndqPi73m.M56nHzmRdEdxqXOAG.M9asi4te5Yk1K', 'fBgdgzm4ahHxU8OfriD7Og4Vu0b0wpuS7fp3tuAHp6kixDqQpZRzFYv3q2Vi', 0, '2017-10-01 03:14:30', '2017-10-01 03:24:53'),
(4, '123456', '$2y$10$gAX530u2K4KPNPCiDraqDuU8uDeiTdgRzGnPQWJUXkma8/.ruYaH6', 'HKoSOSzY5fZAJF9raG6ehI8ZvMiJim8NeeYucpB0QJSOtn43RvagsfOCHx80', 0, '2017-10-01 03:25:22', '2017-10-01 03:25:45'),
(5, '33333333', '$2y$10$gfgOIXi09Z7.HI54nxOZuuRpk2sXamk4zhSDh012TDdcvTKG62ka6', 'IYFYnAr7FeeQxZqRv1TiCugCfPYJvL4H5O9VgIZj0XfCBawVAAdSU7KLk3tm', 0, '2017-10-01 03:41:53', '2017-10-01 03:55:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_09_27_044802_create_admins_table', 2),
('2017_09_27_052332_create_admins_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('rere@tes.com', '66ff3b26cbe893778573994274268cba5290c8108af7e88dbe8eda2295336458', '2017-09-25 13:26:44'),
('dewianisaist@gmail.com', '6b60628c060aae2b6776c8e78eee3735d9933db8c69f8e18c5048a4e9f6d1330', '2017-09-25 13:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dewi Anisa Istiqomah', 'dewianisaist@gmail.com', '$2y$10$regXckvVsoZSavlqlTMV9OGkmmcaf1gv1tC.TPuneF9pUXuMTvvPq', 'dssLhlBrYzSYYyIOAjSdErSCAZDVytvcB6p96j2f8yGzaLGqVpY0TwStbnuN', '2017-09-24 08:28:14', '2017-10-01 06:55:39'),
(2, 'ana', 'ana@tes.com', '$2y$10$kE69j3cFXxGBG/o8O8AEVe0MDtZtOfRUbDlU7ivbRa48pmC13PTAG', 'Qu0MzyFze7vM3f6SQyzfptkUOSgn9yAHjmNFiq5yuYsP3QwbP9tGuot846LF', '2017-09-24 21:04:52', '2017-09-24 21:05:03'),
(3, 'Rere', 'rere@tes.com', '$2y$10$aDJ5zZNNUgvAIjrMfc4zy.jAYe9SLIHoBUEvn8BU34OytNNUW/mWG', 'l21fzy646NyBOHLfqazDqYwcIDYkcxZn5STpxqt42nefjGwA7XfSAQyuTt9n', '2017-09-24 21:23:00', '2017-09-24 21:23:56'),
(4, 'aninda', 'aninda@tes.com', '$2y$10$c5ft8IW/jujUpC9k4sS5dOD6kIpL1VwFfogs3wTEuw8DowcB8WtsG', 'icd09Na3HMUC8ZmuY5NwPTVG6sQilH34LbuNdLNrStyGYdHcKvAn3dsXfxZq', '2017-10-01 03:35:48', '2017-10-01 03:41:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_nip_unique` (`nip`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
