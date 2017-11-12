-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 12, 2017 at 04:03 PM
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
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `major` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `major`, `created_at`, `updated_at`) VALUES
(1, 'Menjahit', '2017-10-27 22:10:54', '2017-10-27 22:10:54'),
(2, 'Otomotif', '2017-10-27 22:11:04', '2017-10-27 22:11:04');

-- --------------------------------------------------------

--
-- Table structure for table `course_experience`
--

CREATE TABLE `course_experience` (
  `registrant_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `organizer` varchar(100) NOT NULL,
  `graduation_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_experience`
--

INSERT INTO `course_experience` (`registrant_id`, `course_id`, `organizer`, `graduation_year`) VALUES
(1, 1, 'A', 2010),
(1, 2, 'Tunas Jaya', 2012);

-- --------------------------------------------------------

--
-- Table structure for table `criterias`
--

CREATE TABLE `criterias` (
  `id` int(11) NOT NULL,
  `group_criteria` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `partial_weight` decimal(5,3) DEFAULT NULL,
  `global_weight` decimal(5,3) DEFAULT NULL,
  `preference` tinyint(2) DEFAULT NULL COMMENT '1. Type 1: Usual criterion\n2. Type 2: Quasi-criterion (U-Shape)\n3. Type 3: Criterion with linear preference (V-Shape)\n4. Type 4: Level criterion\n5. Type 5: Criterion with linear preference and indifference area\n6. Type 6: Gaussian criterion',
  `parameter_p` decimal(10,3) DEFAULT NULL,
  `parameter_q` decimal(10,3) DEFAULT NULL,
  `parameter_s` decimal(10,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `educational_background`
--

CREATE TABLE `educational_background` (
  `registrant_id` int(11) NOT NULL,
  `education_id` int(11) NOT NULL,
  `name_institution` varchar(100) NOT NULL,
  `graduation_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `educational_background`
--

INSERT INTO `educational_background` (`registrant_id`, `education_id`, `name_institution`, `graduation_year`) VALUES
(1, 2, 'SDN 1 Bantul', 2004),
(1, 3, 'SMP 1 Bantul', 2007),
(1, 6, 'SMA 1 Bantul', 2015),
(1, 7, 'SMK 1 Bantul', 2015),
(1, 8, 'UGM Jogja', 2013),
(1, 9, 'UGM', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `id` int(11) NOT NULL,
  `stage` varchar(50) DEFAULT NULL,
  `major` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`id`, `stage`, `major`, `created_at`, `updated_at`) VALUES
(2, 'SD', '', '2017-10-27 21:55:21', '2017-10-27 21:55:21'),
(3, 'SMP', '', '2017-10-27 21:56:54', '2017-11-08 07:29:45'),
(5, 'SMA', 'IPA', '2017-10-27 21:57:37', '2017-11-08 07:29:53'),
(6, 'SMA', 'IPS', '2017-10-30 20:37:20', '2017-11-08 07:30:01'),
(7, 'SMK', 'Multimedia', '2017-11-08 07:00:49', '2017-11-08 07:29:35'),
(8, 'S1', 'Akutansi', '2017-11-08 19:59:02', '2017-11-09 09:06:02'),
(9, 'S2', 'Manajemen', '2017-11-09 09:06:18', '2017-11-09 09:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `pairwise_comparisons`
--

CREATE TABLE `pairwise_comparisons` (
  `criteria1_id` int(11) NOT NULL,
  `criteria2_id` int(11) NOT NULL,
  `nilai` decimal(5,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `display_name` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'user-list', 'Menampilkan daftar Pengguna', 'Hanya melihat daftar Pengguna', '2017-10-17 21:14:43', '2017-10-17 21:14:43'),
(2, 'user-create', 'Membuat Pengguna', 'Membuat Pengguna baru', '2017-10-17 21:14:43', '2017-10-17 21:14:43'),
(3, 'user-edit', 'Edit Pengguna', 'Edit Pengguna', '2017-10-17 21:14:43', '2017-10-17 21:14:43'),
(4, 'user-delete', 'Hapus Pengguna', 'Hapus Pengguna', '2017-10-17 21:14:43', '2017-10-17 21:14:43'),
(5, 'role-list', 'Menampilkan daftar Role', 'Hanya melihat daftar Role', '2017-10-17 21:14:43', '2017-10-17 21:14:43'),
(6, 'role-create', 'Membuat Role', 'Membuat Role baru', '2017-10-17 21:14:43', '2017-10-17 21:14:43'),
(7, 'role-edit', 'Edit Role', 'Edit Role', '2017-10-17 21:14:43', '2017-10-17 21:14:43'),
(8, 'role-delete', 'Hapus Role', 'Hapus Role', '2017-10-17 21:14:43', '2017-10-17 21:14:43'),
(9, 'vocational-list', 'Menampilkan daftar Kejuruan', 'Hanya melihat daftar Kejuruan', '2017-10-17 21:14:43', '2017-10-17 21:14:43'),
(10, 'vocational-create', 'Membuat Kejuruan', 'Membuat Kejuruan baru', '2017-10-17 21:14:43', '2017-10-17 21:14:43'),
(11, 'vocational-edit', 'Edit Kejuruan', 'Edit Kejuruan', '2017-10-17 21:14:43', '2017-10-17 21:14:43'),
(12, 'vocational-delete', 'Hapus Kejuruan', 'Hapus Kejuruan', '2017-10-17 21:14:43', '2017-10-17 21:14:43');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission_role`
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
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(5, 9),
(8, 1),
(9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `registrants`
--

CREATE TABLE `registrants` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `place_birth` varchar(50) DEFAULT NULL,
  `date_birth` date DEFAULT NULL,
  `order_child` tinyint(2) DEFAULT NULL,
  `amount_sibling` tinyint(2) DEFAULT NULL,
  `religion` varchar(15) DEFAULT NULL,
  `biological_mother_name` varchar(100) DEFAULT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `parent_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registrants`
--

INSERT INTO `registrants` (`id`, `user_id`, `address`, `phone_number`, `gender`, `place_birth`, `date_birth`, `order_child`, `amount_sibling`, `religion`, `biological_mother_name`, `father_name`, `parent_address`, `created_at`, `updated_at`) VALUES
(1, 6, 'alamat abc', '1234567890', 'Perempuan', 'ttl abc', '1996-01-23', 4, 3, 'Konghucu', 'ibu abc', 'ayah abc', 'alamat ortu abc', NULL, '2017-11-05 23:52:53'),
(2, 11, 'alamat', '1', '3', 'tempat', '2017-11-01', 2, 3, '1', 'ibu', 'ayah', 'alamat ortu', NULL, NULL),
(3, 13, 'a', '1', '2', 'b', '2017-11-08', 1, 2, '3', 'c', 'd', 'e', NULL, NULL),
(4, 5, 'alamat 3', '333333', 'Perempuan', 'ttl3', '2017-11-02', 3, 5, 'Kristen', 'ibu3', 'ayah3', 'ortu3', '2017-11-06 03:03:50', '2017-11-06 03:03:50'),
(5, 17, 'Alamat 10', '0861010', 'Perempuan', 'ttl10', '1998-07-16', 2, 4, 'Budha', 'ibu 10', 'ayah 10', 'ortu 10', '2017-11-07 21:27:46', '2017-11-07 21:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `registrant_id` int(11) NOT NULL,
  `sub_vocational_id` int(11) NOT NULL,
  `register_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `result_selections`
--

CREATE TABLE `result_selections` (
  `id` int(11) NOT NULL,
  `selection_id` int(11) NOT NULL,
  `criteria_id` int(11) NOT NULL,
  `nilai` decimal(10,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `display_name` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'Superadmin', 'Superadmin merupakan peneliti', '2017-10-17 21:15:20', '2017-10-17 21:15:20'),
(2, 'admin', 'Admin', 'Admin merupakan staf', '2017-10-17 21:15:46', '2017-10-17 21:15:46'),
(3, 'kepala', 'Kepala BLK', 'Kepala merupakan pembuat keputusan', '2017-10-17 21:16:12', '2017-10-17 21:16:12'),
(5, 'pendaftar', 'Pendaftar', 'Pendaftar merupakan calon peserta seleksi', '2017-10-17 21:17:32', '2017-10-25 11:13:56'),
(8, 'a', 'a', 'a', '2017-10-25 11:18:18', '2017-10-25 11:18:18'),
(9, 'b', 'b test', 'b', '2017-10-25 11:18:25', '2017-10-30 20:44:35');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(1, 1),
(5, 5),
(5, 6),
(5, 9),
(5, 11),
(5, 13),
(5, 14),
(5, 15),
(5, 16),
(5, 17),
(5, 18),
(8, 8),
(8, 10),
(8, 12);

-- --------------------------------------------------------

--
-- Table structure for table `selections`
--

CREATE TABLE `selections` (
  `id` int(11) NOT NULL,
  `registrant_id` int(11) NOT NULL,
  `sub_vocational_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `information` varchar(500) DEFAULT NULL,
  `written_value` decimal(3,3) DEFAULT NULL,
  `interview_value` decimal(3,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sub_vocationals`
--

CREATE TABLE `sub_vocationals` (
  `id` int(11) NOT NULL,
  `vocational_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `quota` int(11) DEFAULT NULL,
  `long_training` varchar(10) DEFAULT NULL,
  `goal` varchar(500) DEFAULT NULL,
  `unit_competence` varchar(500) DEFAULT NULL,
  `requirement_participant` varchar(500) DEFAULT NULL,
  `final_registration_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_vocationals`
--

INSERT INTO `sub_vocationals` (`id`, `vocational_id`, `name`, `quota`, `long_training`, `goal`, `unit_competence`, `requirement_participant`, `final_registration_date`, `created_at`, `updated_at`) VALUES
(2, 1, 'sub otomotif', 16, '100', 'test tujuan', 'unit', 'syarat', '2017-11-11 12:48:15', '2017-10-31 00:08:01', '2017-10-31 05:48:18'),
(3, 4, 'sub test 1 edit', 30, '300', 'tujuan test edit', 'unit test edit', 'syarat test edit', '2017-11-30 16:59:59', '2017-10-31 00:23:17', '2017-10-31 00:30:40'),
(4, 1, 'test 2', 10, '100', '10', '10', '10', '2017-11-02 16:11:58', '2017-10-31 01:01:46', '2017-10-31 05:29:37'),
(5, 1, 'test 2', 10, '100', '10', '10', '01', '2017-11-11 12:11:29', '2017-10-31 02:05:31', '2017-10-31 05:28:15'),
(6, 1, 'coba', 1, '1', '1', '1', '1', '2017-11-16 12:11:49', '2017-10-31 05:27:44', '2017-10-31 05:39:53'),
(7, 5, 'coba 2', 1, '1', '1', '1q', '1', '2017-12-27 16:59:59', '2017-10-31 05:28:58', '2017-10-31 19:45:14'),
(8, 4, 'te', 1, '1', '1', '1', '1', '2017-11-11 16:59:59', '2017-10-31 05:48:06', '2017-10-31 05:48:06');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `registrant_id` int(11) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  `last_certificate` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `registrant_id`, `photo`, `ktp`, `last_certificate`, `created_at`, `updated_at`) VALUES
(1, 1, 'photo_1679091c5a880faf6fb5e6087eb1b2dc.jpg', 'ktp_1679091c5a880faf6fb5e6087eb1b2dc.pdf', 'lastcertificate_1679091c5a880faf6fb5e6087eb1b2dc.pdf', NULL, '2017-11-07 21:25:11'),
(2, 3, 'e', 'f', 'g', NULL, NULL),
(5, 2, 'f', 'h', 'j', NULL, NULL),
(6, 4, 'foto3', 'ktp3', 'ijazah3', '2017-11-06 03:03:50', '2017-11-06 03:03:50'),
(7, 5, 'photo_70efdf2ec9b086079795c442636b55fb.jpg', 'ktp_70efdf2ec9b086079795c442636b55fb.pdf', 'lastcertificate_70efdf2ec9b086079795c442636b55fb.docx', '2017-11-07 21:27:46', '2017-11-07 21:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `identity_number` varchar(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `identity_number`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '12345678', 'Dewi Anisa Istiqomah', 'dewianisaist@gmail.com', '$2y$10$2pNzr3yp2GYlVrqq5Wmfb.bRpA77/vfgf203DaENMV12dPqN9J0Yq', 'dBkSjmSqrt2YvYVy9kuzl3gwaCd0DiDiTo1l1mTBZH6YtRnH90uSmJjApKTW', '2017-10-17 21:16:53', '2017-11-01 23:46:58'),
(5, '44444444', 'pendaftar 3', 'pendaftar3@tes.com', '$2y$10$a6rU.U6LUP531qy06kJuwuZFTJQ9F/QgagDsw01AAx9koPlhdtpJi', 'XREU371rNZXNgyyiZzk8fWStBE5YIp8KBWC6vDsrc8hZYmaaKTjYkrHVAvXw', '2017-10-17 23:27:11', '2017-11-06 03:04:08'),
(6, '11111111', 'pendaftar 1abc ok', 'pendaftar1abc@tes.com', '$2y$10$OeonwX8NnwEcm2yX7.OJUukXUYWOdn/sPuANroPexuh4N.zlF/ojO', '6sMEUBiznNu8WX6U0MjWBCqGR9GJGkf1GZC3SvObcTtQZl0G0ihjnZZzgTrE', '2017-10-18 06:45:21', '2017-11-12 07:55:46'),
(8, '77777777', 'z', 'ana@tes.comx', '$2y$10$49i22d1tkyUSUwYiTPmodORiK5zwJb247XG9AfpakJ4G6QXrXK70q', NULL, '2017-10-25 11:19:33', '2017-10-25 11:19:33'),
(9, '55555555', 'b', 'b@tes.com', '$2y$10$kxjdNEVAZyF5/qN8gOYrM.STdJTGf1CLk7VniOORMwhIqtycRbryO', NULL, '2017-10-25 11:19:52', '2017-10-25 11:19:52'),
(10, '88888888', 'a', 'f@tes.com', '$2y$10$GfMTtAXagRgRALezrb90iukwxlGDSGts96oV9KEKcCvr4yRA.9pte', NULL, '2017-10-25 11:20:11', '2017-10-25 11:48:04'),
(11, '22222222', 'd', 'sinta@tes.com', '$2y$10$mdNfNiZPGkT7NIwBBelWReTb010bNp0G2psfLjlIBx9LX3UMZAiU6', 'NqWucyChEdDtUPFrk5dfAJfi5BhsbUwCbd1KLk3Ea3s8jTGQCwS63qMU0CoJ', '2017-10-25 12:36:00', '2017-11-06 03:04:23'),
(12, '66666666', 'n', 'n@tes.com', '$2y$10$NXW.iTljrQPvVBnjW4.Lie7W29yMdWd3IGikT6i64dxRFvBWRq.1y', NULL, '2017-10-25 12:36:48', '2017-10-25 12:36:48'),
(13, '33333333', 'm', 'm@tes.com', '$2y$10$49JH7QJLNw0uYfOFNofMXeka5vY8bPw6CVgI4qNHoaRsQeiQnrvyi', 'pPLjnFOF3ttRsUtx6YBj3eLvQhRtup3FAZXyI2zJZOxxQKmBh6jd8C2HBpD8', '2017-10-25 12:37:27', '2017-11-06 03:04:57'),
(14, '0987654321', 'k', 'k@tes.com', '$2y$10$9vWduI9BkQxo.FnLxUcLFOeofM7WoGwlTsdt3v6yPgt9zl1LNIlNK', NULL, '2017-10-25 12:37:55', '2017-10-25 12:37:55'),
(15, '567890', 'hello', 'hello@test.com', '$2y$10$YUl7GobZsmT2ZZzjUo5omuMthtcu/NFXbRgdMzu8SrSgsgsHciDUm', NULL, '2017-10-25 12:38:20', '2017-10-25 12:38:20'),
(16, '123123', 'lala', 'la@tes.com', '$2y$10$WizBsbCIvCNzIyUdL7apy.npg24clkIcn0jQv78wsOS9gNLQkxZr.', '80NAWmTUfrr5wSBgSsC3Mwr7V7XyERsxlwE72qfeiRWvxDLwqfJu5i3WjSrk', '2017-10-25 13:03:24', '2017-10-25 13:05:24'),
(17, '101010', 'pendaftar10', 'pendaftar10@tes.com', '$2y$10$IqshMWOtcLZ91WrA6eG04e4p7mLlJalpMboQmP90F0qmiH36/HjNG', NULL, '2017-11-07 21:26:19', '2017-11-07 21:26:19'),
(18, '898989', 'siena', 'siena@test.com', '$2y$10$JFgde4oi9T6A1ZmSkKqn8OlfdqB/E6VQwYCbKvSVzL6.C.v3ma7BS', 'AehUgT37lkxk8DDiJJ9FXtQiIpNB741iQP48Lmn7SHe1jGnc79TD1UFGePam', '2017-11-09 10:46:22', '2017-11-09 10:48:50');

-- --------------------------------------------------------

--
-- Table structure for table `vocationals`
--

CREATE TABLE `vocationals` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vocationals`
--

INSERT INTO `vocationals` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Otomotif', 'otomotif', '2017-10-25 11:33:02', '2017-10-31 02:04:27'),
(4, 'test 1', 'test 1', '2017-10-30 20:43:48', '2017-10-31 02:04:19'),
(5, 'test 2', 'test 2', '2017-10-31 02:04:12', '2017-10-31 02:04:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_experience`
--
ALTER TABLE `course_experience`
  ADD PRIMARY KEY (`registrant_id`,`course_id`,`organizer`,`graduation_year`),
  ADD KEY `fk_pendaftar_has_kursus_kursus1_idx` (`course_id`),
  ADD KEY `fk_pendaftar_has_kursus_pendaftar1_idx` (`registrant_id`);

--
-- Indexes for table `criterias`
--
ALTER TABLE `criterias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_criterias_criterias1_idx` (`group_criteria`);

--
-- Indexes for table `educational_background`
--
ALTER TABLE `educational_background`
  ADD PRIMARY KEY (`registrant_id`,`education_id`,`name_institution`,`graduation_year`),
  ADD KEY `fk_pendaftar_has_pendidikan_pendidikan1_idx` (`education_id`),
  ADD KEY `fk_pendaftar_has_pendidikan_pendaftar1_idx` (`registrant_id`);

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pairwise_comparisons`
--
ALTER TABLE `pairwise_comparisons`
  ADD PRIMARY KEY (`criteria1_id`,`criteria2_id`),
  ADD KEY `fk_pairwise_comparison_criterias1_idx` (`criteria1_id`),
  ADD KEY `fk_pairwise_comparisons_criterias1_idx` (`criteria2_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `fk_roles_has_permissions_roles1_idx` (`role_id`),
  ADD KEY `fk_roles_has_permissions_permissions1_idx` (`permission_id`);

--
-- Indexes for table `registrants`
--
ALTER TABLE `registrants`
  ADD PRIMARY KEY (`id`,`user_id`),
  ADD KEY `fk_pendaftar_users1_idx` (`user_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`registrant_id`,`sub_vocational_id`),
  ADD KEY `fk_pendaftar_has_sub_kejuruan_sub_kejuruan1_idx` (`sub_vocational_id`),
  ADD KEY `fk_pendaftar_has_sub_kejuruan_pendaftar1_idx` (`registrant_id`);

--
-- Indexes for table `result_selections`
--
ALTER TABLE `result_selections`
  ADD PRIMARY KEY (`id`,`selection_id`,`criteria_id`),
  ADD KEY `fk_result_selections_selections1_idx` (`selection_id`),
  ADD KEY `fk_result_selections_criterias1_idx` (`criteria_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`role_id`,`user_id`),
  ADD KEY `fk_roles_has_users_roles1_idx` (`role_id`),
  ADD KEY `fk_roles_has_users_users1_idx` (`user_id`);

--
-- Indexes for table `selections`
--
ALTER TABLE `selections`
  ADD PRIMARY KEY (`id`,`registrant_id`,`sub_vocational_id`),
  ADD KEY `fk_selections_registrants1_idx` (`registrant_id`),
  ADD KEY `fk_selections_sub_vocationals1_idx` (`sub_vocational_id`);

--
-- Indexes for table `sub_vocationals`
--
ALTER TABLE `sub_vocationals`
  ADD PRIMARY KEY (`id`,`vocational_id`),
  ADD KEY `fk_sub_kejuruan_kejuruan1_idx` (`vocational_id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`,`registrant_id`),
  ADD KEY `fk_upload_pendaftar1_idx` (`registrant_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `no_identitas_UNIQUE` (`identity_number`);

--
-- Indexes for table `vocationals`
--
ALTER TABLE `vocationals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `educational_background`
--
ALTER TABLE `educational_background`
  MODIFY `registrant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `registrants`
--
ALTER TABLE `registrants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `result_selections`
--
ALTER TABLE `result_selections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `selections`
--
ALTER TABLE `selections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sub_vocationals`
--
ALTER TABLE `sub_vocationals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `vocationals`
--
ALTER TABLE `vocationals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_experience`
--
ALTER TABLE `course_experience`
  ADD CONSTRAINT `fk_pendaftar_has_kursus_kursus1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pendaftar_has_kursus_pendaftar1` FOREIGN KEY (`registrant_id`) REFERENCES `registrants` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `criterias`
--
ALTER TABLE `criterias`
  ADD CONSTRAINT `fk_criterias_criterias1` FOREIGN KEY (`group_criteria`) REFERENCES `criterias` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `educational_background`
--
ALTER TABLE `educational_background`
  ADD CONSTRAINT `fk_pendaftar_has_pendidikan_pendaftar1` FOREIGN KEY (`registrant_id`) REFERENCES `registrants` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pendaftar_has_pendidikan_pendidikan1` FOREIGN KEY (`education_id`) REFERENCES `educations` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `pairwise_comparisons`
--
ALTER TABLE `pairwise_comparisons`
  ADD CONSTRAINT `fk_pairwise_comparison_criterias1` FOREIGN KEY (`criteria1_id`) REFERENCES `criterias` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pairwise_comparisons_criterias1` FOREIGN KEY (`criteria2_id`) REFERENCES `criterias` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `fk_roles_has_permissions_permissions1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_roles_has_permissions_roles1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `registrants`
--
ALTER TABLE `registrants`
  ADD CONSTRAINT `fk_pendaftar_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `fk_pendaftar_has_sub_kejuruan_pendaftar1` FOREIGN KEY (`registrant_id`) REFERENCES `registrants` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pendaftar_has_sub_kejuruan_sub_kejuruan1` FOREIGN KEY (`sub_vocational_id`) REFERENCES `sub_vocationals` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `result_selections`
--
ALTER TABLE `result_selections`
  ADD CONSTRAINT `fk_result_selections_criterias1` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_result_selections_selections1` FOREIGN KEY (`selection_id`) REFERENCES `selections` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `fk_roles_has_users_roles1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_roles_has_users_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `selections`
--
ALTER TABLE `selections`
  ADD CONSTRAINT `fk_selections_registrants1` FOREIGN KEY (`registrant_id`) REFERENCES `registrants` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_selections_sub_vocationals1` FOREIGN KEY (`sub_vocational_id`) REFERENCES `sub_vocationals` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `sub_vocationals`
--
ALTER TABLE `sub_vocationals`
  ADD CONSTRAINT `fk_sub_kejuruan_kejuruan1` FOREIGN KEY (`vocational_id`) REFERENCES `vocationals` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `fk_upload_pendaftar1` FOREIGN KEY (`registrant_id`) REFERENCES `registrants` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
