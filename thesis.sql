-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 04, 2017 at 07:59 AM
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
(1, 'Menyetir', '2017-11-19 06:33:29', '2017-11-19 06:33:29'),
(2, 'Bahasa Inggris', '2017-11-19 06:33:36', '2017-11-19 06:33:36'),
(3, 'Komputer', '2017-11-19 06:33:46', '2017-11-19 06:33:46');

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

-- --------------------------------------------------------

--
-- Table structure for table `criterias`
--

CREATE TABLE `criterias` (
  `id` int(11) NOT NULL,
  `group_criteria` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `partial_weight` decimal(5,3) DEFAULT NULL,
  `global_weight` decimal(5,3) DEFAULT NULL,
  `preference` tinyint(2) DEFAULT NULL COMMENT '1. Type 1: Usual criterion\n2. Type 2: Quasi-criterion (U-Shape)\n3. Type 3: Criterion with linear preference (V-Shape)\n4. Type 4: Level criterion\n5. Type 5: Criterion with linear preference and indifference area\n6. Type 6: Gaussian criterion',
  `max_min` varchar(10) DEFAULT NULL,
  `parameter_p` decimal(20,3) DEFAULT NULL,
  `parameter_q` decimal(20,3) DEFAULT NULL,
  `parameter_s` decimal(20,3) DEFAULT NULL,
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
(1, 1, 'SDN 1 Bantul', 2007),
(1, 2, 'SMP', 2010),
(1, 3, 'SMA 1 Bantul', 2013),
(2, 1, 'SD Bantul Timur ', 2009);

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
(1, 'SD', '', '2017-11-19 06:32:41', '2017-11-19 06:32:41'),
(2, 'SMP', '', '2017-11-19 06:32:46', '2017-11-19 06:32:46'),
(3, 'SMA', 'IPA', '2017-11-19 06:32:51', '2017-11-19 06:33:05'),
(4, 'SMA', 'IPS', '2017-11-19 06:33:00', '2017-11-19 06:33:00'),
(5, 'SMK', 'Multimedia', '2017-11-19 06:33:13', '2017-11-19 06:33:13');

-- --------------------------------------------------------

--
-- Table structure for table `history_criterias`
--

CREATE TABLE `history_criterias` (
  `id` int(11) NOT NULL,
  `criteria_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '0: null\n1: fix',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pairwise_comparisons`
--

CREATE TABLE `pairwise_comparisons` (
  `criteria1_id` int(11) NOT NULL,
  `criteria2_id` int(11) NOT NULL,
  `value` decimal(20,3) DEFAULT NULL,
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
(1, 'user-list', 'Menampilkan daftar Pengguna', 'Hanya melihat daftar Pengguna', '2017-11-19 03:11:39', '2017-11-19 03:11:39'),
(2, 'user-create', 'Membuat Pengguna', 'Membuat Pengguna baru', '2017-11-19 03:11:39', '2017-11-19 03:11:39'),
(3, 'user-edit', 'Edit Pengguna', 'Edit Pengguna', '2017-11-19 03:11:39', '2017-11-19 03:11:39'),
(4, 'user-delete', 'Hapus Pengguna', 'Hapus Pengguna', '2017-11-19 03:11:39', '2017-11-19 03:11:39'),
(5, 'role-list', 'Menampilkan daftar Role', 'Hanya melihat daftar Role', '2017-11-19 03:11:39', '2017-11-19 03:11:39'),
(6, 'role-create', 'Membuat Role', 'Membuat Role baru', '2017-11-19 03:11:39', '2017-11-19 03:11:39'),
(7, 'role-edit', 'Edit Role', 'Edit Role', '2017-11-19 03:11:39', '2017-11-19 03:11:39'),
(8, 'role-delete', 'Hapus Role', 'Hapus Role', '2017-11-19 03:11:39', '2017-11-19 03:11:39'),
(9, 'vocational-list', 'Menampilkan daftar Kejuruan', 'Hanya melihat daftar Kejuruan', '2017-11-19 03:11:39', '2017-11-19 03:11:39'),
(10, 'vocational-create', 'Membuat Kejuruan', 'Membuat Kejuruan baru', '2017-11-19 03:11:39', '2017-11-19 03:11:39'),
(11, 'vocational-edit', 'Edit Kejuruan', 'Edit Kejuruan', '2017-11-19 03:11:39', '2017-11-19 03:11:39'),
(12, 'vocational-delete', 'Hapus Kejuruan', 'Hapus Kejuruan', '2017-11-19 03:11:39', '2017-11-19 03:11:39');

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
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(3, 1),
(3, 5),
(3, 9),
(4, 9),
(5, 1),
(5, 9),
(6, 9),
(7, 9),
(7, 10),
(7, 11),
(7, 12);

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
(1, 11, 'Alamat pendaftar 1', '08511111111', 'Perempuan', 'tl1', '1998-07-22', 2, 3, 'Konghucu', 'ibu 1', 'ayah 1', 'alamat ortu 1', '2017-11-19 06:44:05', '2017-11-19 06:44:05'),
(2, 12, 'pendatar 2 alamat', '086222222', 'Perempuan', 'tl2', '1996-01-30', 1, 0, 'Islam', 'ibu2', 'ayah2', 'ortu 2 alamat', '2017-11-27 07:22:12', '2017-11-27 07:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `registrant_id` int(11) NOT NULL,
  `sub_vocational_id` int(11) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`registrant_id`, `sub_vocational_id`, `register_date`) VALUES
(1, 1, '2017-11-27 08:17:05'),
(1, 3, '2017-11-27 13:46:35'),
(2, 3, '2017-11-27 07:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `result_selections`
--

CREATE TABLE `result_selections` (
  `id` int(11) NOT NULL,
  `selection_id` int(11) NOT NULL,
  `criteria_id` int(11) NOT NULL,
  `value` decimal(20,3) DEFAULT NULL,
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
(1, 'superadmin', 'Peneliti', 'Mempunyai hak akses untuk semua fitur', '2017-11-19 03:18:35', '2017-11-19 03:18:35'),
(2, 'admin', 'Staf', 'Melakukan kegiatan operasional', '2017-11-19 03:18:35', '2017-11-19 03:18:35'),
(3, 'kepala', 'Kepala', 'Sebagai pembuat keputusan', '2017-11-19 03:18:35', '2017-11-19 03:18:35'),
(4, 'pendaftar', 'Pendaftar', 'Calon peserta pelatihan yang mengikuti seleksi', '2017-11-19 03:18:35', '2017-11-19 03:18:35'),
(5, 'kasubag', 'Kepala Sub-Bagian TU', 'Bertanggung jawab terhadap operasional', '2017-11-19 03:18:35', '2017-11-19 03:18:35'),
(6, 'koor', 'Koordinator Instruktur', 'Bertanggung jawab terhadap kepala kejuruan', '2017-11-19 03:18:35', '2017-11-19 03:18:35'),
(7, 'kajur', 'Kepala Kejuruan', 'Bertanggungjawab terhadap pelaksanaan seleksi', '2017-11-19 03:18:35', '2017-11-19 03:18:35');

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
(1, 4),
(2, 10),
(3, 5),
(4, 11),
(4, 12),
(4, 13),
(5, 6),
(6, 7),
(7, 8),
(7, 9);

-- --------------------------------------------------------

--
-- Table structure for table `selections`
--

CREATE TABLE `selections` (
  `id` int(11) NOT NULL,
  `registrant_id` int(11) NOT NULL,
  `selection_schedule_id` int(11) NOT NULL,
  `written_value` decimal(5,2) DEFAULT NULL,
  `interview_value` decimal(5,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `selections`
--

INSERT INTO `selections` (`id`, `registrant_id`, `selection_schedule_id`, `written_value`, `interview_value`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '85.00', '90.00', NULL, '2017-11-20 01:07:08'),
(19, 1, 3, NULL, NULL, '2017-12-03 08:04:46', '2017-12-03 08:04:46'),
(20, 2, 3, NULL, NULL, '2017-12-03 08:05:33', '2017-12-03 08:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `selection_schedules`
--

CREATE TABLE `selection_schedules` (
  `id` int(11) NOT NULL,
  `sub_vocational_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `information` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `selection_schedules`
--

INSERT INTO `selection_schedules` (`id`, `sub_vocational_id`, `date`, `time`, `place`, `information`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-12-16', '08:00', 'R. Oto 1', '', '2017-11-19 06:34:21', '2017-11-19 06:34:21'),
(2, 2, '2017-12-23', '08:00', 'R. Oto 2', 'pakaian rapi, sepatu, ktp', '2017-11-19 06:35:53', '2017-11-19 06:35:53'),
(3, 3, '2017-12-09', '09:00', 'R. Menjahit ', '', '2017-11-27 06:45:29', '2017-11-27 06:45:29'),
(4, 1, '2017-12-02', '10:00', 'R. Oto 1', '', '2017-11-27 06:47:50', '2017-11-27 06:47:50');

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
(1, 1, 'Otomotif sub 1', 16, '200', 'tujuan oto', 'unit oto', 'syarat oto', '2017-12-10 16:59:59', '2017-11-19 06:31:04', '2017-11-19 06:31:04'),
(2, 1, 'Otomotif sub 2', 16, '180', 'tujuan oto 2', 'unit oto 2', 'syarat oto 2', '2017-12-16 16:59:59', '2017-11-19 06:31:50', '2017-12-03 06:52:50'),
(3, 2, 'Menjahit sub 1', 20, '360', 'tujuan menjahit', 'unit menjahit', 'syarat menjahit', '2017-12-09 16:59:59', '2017-11-19 06:32:33', '2017-12-03 06:53:34');

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
(1, 1, 'photo_6512bd43d9caa6e02c990b0a82652dca.jpg', 'ktp_6512bd43d9caa6e02c990b0a82652dca.pdf', 'lastcertificate_6512bd43d9caa6e02c990b0a82652dca.pdf', '2017-11-19 06:44:05', '2017-11-19 06:44:05'),
(2, 2, NULL, NULL, NULL, '2017-11-27 07:22:12', '2017-11-27 07:22:12');

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
(4, '12345678', 'Dewi Anisa Istiqomah', 'dewianisaist@gmail.com', '$2y$10$32W17DK3I/80n6eEaXpyO.penHp3MxX0/mJPaKUZjsV.nAEZ/bxxq', 'MFOlJofdb63WRR391WEe6GpdyXshVhTXBBVx297hK78oDofdLxk2wp4Rz3Fy', '2017-11-19 03:34:38', '2017-12-03 07:52:29'),
(5, '101010', 'Mr. A', 'a@test.com', '$2y$10$x6TtTvd.irZAZk3YiLN1K.qkRsbbP3W5BTgH3TRGj/c8kSKNeBJ1q', NULL, '2017-11-19 06:38:36', '2017-11-19 06:38:36'),
(6, '202020', 'Mr. B', 'b@test.com', '$2y$10$FDBdZeAblrqwlT6R5vNRwO2tLddckXNyo1sd80ywvN8YucQTG.BYO', NULL, '2017-11-19 06:39:02', '2017-11-19 06:39:02'),
(7, '303030', 'Mr. C', 'c@test.com', '$2y$10$n8m5QZuLr3BY60jeEwEjE.UqkNGPmz2wTuxN1m7549G2ojiMA4TRK', NULL, '2017-11-19 06:39:25', '2017-11-19 06:39:25'),
(8, '404040', 'Mr. D', 'd@test.com', '$2y$10$Y4kH1fhMZNsuyMy1VJ5S7O87CPg3idIIn61uTC6fsf2FGa6Me960.', NULL, '2017-11-19 06:39:50', '2017-11-19 06:39:50'),
(9, '505050', 'Mr. E', 'e@test.com', '$2y$10$pa..L.AHLOuV1lk2ZS.WNec9t4bN1i0OLhnsmpyjZl46pyEbwyAXq', NULL, '2017-11-19 06:40:13', '2017-11-19 06:40:13'),
(10, '909090', 'Mr. I', 'i@test.com', '$2y$10$QRa/GJqNpmAaHwu.taPNbeDbjpBN1v.jV71HphFqbobjjEq3d/9Fa', NULL, '2017-11-19 06:40:35', '2017-11-19 06:40:35'),
(11, '11111111', 'Pendaftar 1', 'pendaftar1@test.com', '$2y$10$DTeZ/tKboguYLw5MDRU0g.PfHwCYINrjVeWfAn8/Bw7Wqqaj4ntRa', 'qaRbkgR0B8uTfnJWyhRSLUBi6hrqjYDTgWewrxgfoJsVDTWY6DNLKQT7rJUm', '2017-11-19 06:41:31', '2017-11-20 23:28:40'),
(12, '22222222', 'pendaftar 2', 'pendaftar2@test.com', '$2y$10$sVLDXXQeFxtq.tHlHKU2BO3bw0xCCe8lxiPc/ZNOLDu2zWIR.8LhC', 'lGN87FtJjiYPAXQ3BbtwD91fcnxfRZHO3lpqXDJQl34y76wYpOWAB7SzFvrN', '2017-11-27 07:10:52', '2017-11-27 07:29:05'),
(13, '33333333', 'Pendaftar 3', 'pendaftar3@test.com', '$2y$10$ickdd4kU9bC8BakMxzVrdeTn069ueTLUMXWJUnp6/1sahEk6TNxJC', '5sHzQD3JbWHHlgpr1dYIa5HiwVt8AkuHJiNPbriulBU0szOhQrWMPpSvEBoj', '2017-11-27 07:24:48', '2017-11-27 07:25:05');

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
(1, 'Otomotif', 'test otomotif', '2017-11-19 06:29:54', '2017-11-19 06:29:54'),
(2, 'Menjahit', 'test menjahit', '2017-11-19 06:30:06', '2017-11-19 06:30:06');

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
-- Indexes for table `history_criterias`
--
ALTER TABLE `history_criterias`
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
  ADD PRIMARY KEY (`registrant_id`,`sub_vocational_id`,`register_date`),
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
  ADD PRIMARY KEY (`id`,`registrant_id`,`selection_schedule_id`),
  ADD KEY `fk_selections_registrants1_idx` (`registrant_id`),
  ADD KEY `fk_selections_selection_schedules1_idx` (`selection_schedule_id`);

--
-- Indexes for table `selection_schedules`
--
ALTER TABLE `selection_schedules`
  ADD PRIMARY KEY (`id`,`sub_vocational_id`),
  ADD KEY `fk_selection_schedules_sub_vocationals1_idx` (`sub_vocational_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `educational_background`
--
ALTER TABLE `educational_background`
  MODIFY `registrant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `history_criterias`
--
ALTER TABLE `history_criterias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `registrants`
--
ALTER TABLE `registrants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `result_selections`
--
ALTER TABLE `result_selections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `selections`
--
ALTER TABLE `selections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `selection_schedules`
--
ALTER TABLE `selection_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sub_vocationals`
--
ALTER TABLE `sub_vocationals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `vocationals`
--
ALTER TABLE `vocationals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  ADD CONSTRAINT `fk_selections_selection_schedules1` FOREIGN KEY (`selection_schedule_id`) REFERENCES `selection_schedules` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `selection_schedules`
--
ALTER TABLE `selection_schedules`
  ADD CONSTRAINT `fk_selection_schedules_sub_vocationals1` FOREIGN KEY (`sub_vocational_id`) REFERENCES `sub_vocationals` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
