-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 25, 2018 at 12:44 AM
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
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `user_id` int(11) NOT NULL,
  `criteria_id` int(11) NOT NULL,
  `option` varchar(15) DEFAULT NULL,
  `suggestion` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `conversion`
--

CREATE TABLE `conversion` (
  `id` int(11) NOT NULL,
  `criteria_id` int(11) NOT NULL,
  `resource` varchar(255) DEFAULT NULL,
  `range_value` decimal(20,3) DEFAULT NULL,
  `conversion_value` decimal(20,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'Jahit', '2018-01-24 09:31:26', '2018-01-24 09:31:46'),
(2, 'Komputer', '2018-01-24 09:31:33', '2018-01-24 09:31:33'),
(3, 'Stir', '2018-01-24 09:31:38', '2018-01-24 09:31:38');

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
  `partial_weight` decimal(20,3) DEFAULT NULL,
  `global_weight` decimal(20,3) DEFAULT NULL,
  `preference` varchar(10) DEFAULT NULL,
  `max_min` varchar(10) DEFAULT NULL,
  `parameter_p` decimal(20,3) DEFAULT NULL,
  `parameter_q` decimal(20,3) DEFAULT NULL,
  `parameter_s` decimal(20,3) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `criterias`
--

INSERT INTO `criterias` (`id`, `group_criteria`, `name`, `description`, `partial_weight`, `global_weight`, `preference`, `max_min`, `parameter_p`, `parameter_q`, `parameter_s`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Kriteria 1', 'Test kriteria 1 (Sumber: XYZ, 2018)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-01-24 09:33:24', '2018-01-24 09:33:24');

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
(1, 'SD', '', '2018-01-24 09:30:24', '2018-01-24 09:30:24'),
(2, 'SMP', '', '2018-01-24 09:30:29', '2018-01-24 09:30:29'),
(3, 'SMA', 'IPA', '2018-01-24 09:30:37', '2018-01-24 09:30:37'),
(4, 'SMA', 'IPS', '2018-01-24 09:30:44', '2018-01-24 09:30:44'),
(5, 'SMK', 'Teknik Kendaraan Ringan', '2018-01-24 09:31:01', '2018-01-24 09:31:01'),
(6, 'SMK', 'Multimedia', '2018-01-24 09:31:11', '2018-01-24 09:31:11');

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
(1, 'user-list', 'Menampilkan daftar Pengguna', 'Hanya melihat daftar Pengguna', '2018-01-24 09:12:27', '2018-01-24 09:12:27'),
(2, 'user-create', 'Membuat Pengguna', 'Membuat Pengguna baru', '2018-01-24 09:12:27', '2018-01-24 09:12:27'),
(3, 'user-edit', 'Edit Pengguna', 'Edit Pengguna', '2018-01-24 09:12:27', '2018-01-24 09:12:27'),
(4, 'user-delete', 'Hapus Pengguna', 'Hapus Pengguna', '2018-01-24 09:12:27', '2018-01-24 09:12:27'),
(5, 'role-list', 'Menampilkan daftar Role', 'Hanya melihat daftar Role', '2018-01-24 09:12:27', '2018-01-24 09:12:27'),
(6, 'role-create', 'Membuat Role', 'Membuat Role baru', '2018-01-24 09:12:27', '2018-01-24 09:12:27'),
(7, 'role-edit', 'Edit Role', 'Edit Role', '2018-01-24 09:12:27', '2018-01-24 09:12:27'),
(8, 'role-delete', 'Hapus Role', 'Hapus Role', '2018-01-24 09:12:27', '2018-01-24 09:12:27'),
(9, 'vocational-list', 'Menampilkan daftar Kejuruan', 'Hanya melihat daftar Kejuruan', '2018-01-24 09:12:27', '2018-01-24 09:12:27'),
(10, 'vocational-create', 'Membuat Kejuruan', 'Membuat Kejuruan baru', '2018-01-24 09:12:27', '2018-01-24 09:12:27'),
(11, 'vocational-edit', 'Edit Kejuruan', 'Edit Kejuruan', '2018-01-24 09:12:27', '2018-01-24 09:12:27'),
(12, 'vocational-delete', 'Hapus Kejuruan', 'Hapus Kejuruan', '2018-01-24 09:12:27', '2018-01-24 09:12:27');

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
(2, 9),
(3, 1),
(3, 5),
(3, 9),
(4, 1),
(4, 9),
(5, 9),
(6, 9);

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
(1, 2, 'Bantul', '0857123456', 'Laki-laki', 'Bantul', '1998-06-16', 0, 0, 'Islam', '', '', '', '2018-01-24 09:21:23', '2018-01-24 09:21:23');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `registrant_id` int(11) NOT NULL,
  `sub_vocational_id` int(11) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `result_selections`
--

CREATE TABLE `result_selections` (
  `selection_id` int(11) NOT NULL,
  `criteria_id` int(11) NOT NULL,
  `value` decimal(20,3) DEFAULT NULL
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
(1, 'staf', 'Staf', 'Melakukan pengelolaan data', NULL, NULL),
(2, 'pendaftar', 'Pendaftar', 'Calon peserta perlatihan', '2018-01-24 09:14:23', '2018-01-24 09:14:23'),
(3, 'kepala', 'Kepala BLK', 'Pembuat keputusan dan mengawasi setiap proses', '2018-01-24 09:16:08', '2018-01-24 09:16:08'),
(4, 'kasubag_tu', 'Kepala Sub-Bagian Tata Usaha', 'Melakukan pengawasan', '2018-01-24 09:17:25', '2018-01-24 09:17:25'),
(5, 'koor_instruktur', 'Koordinator Instruktur', 'Melakukan pengawasan', '2018-01-24 09:18:09', '2018-01-24 09:18:09'),
(6, 'kajur', 'Kepala Kejuruan', 'Melakukan pengawasan', '2018-01-24 09:18:34', '2018-01-24 09:18:34');

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
(1, 4),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 5),
(4, 1),
(4, 6),
(5, 1),
(5, 7),
(6, 1),
(6, 8),
(6, 9);

-- --------------------------------------------------------

--
-- Table structure for table `selections`
--

CREATE TABLE `selections` (
  `id` int(11) NOT NULL,
  `registrant_id` int(11) NOT NULL,
  `selection_schedule_id` int(11) NOT NULL,
  `written_value` decimal(5,2) DEFAULT NULL,
  `interview_value` varchar(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 1, '2018-02-28', '08:00', 'R. Teori 1', 'Pakaian rapi dan sepatu', '2018-01-24 09:32:38', '2018-01-24 09:32:50');

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
(1, 1, 'Sub Kejuruan 1', 16, '480', 'Tujuan Kejuruan 1', 'Unit Kompetensi Kejuruan 1', 'Syarat Kejuruan 1', '2018-02-09 16:59:59', '2018-01-24 09:28:02', '2018-01-24 09:28:02'),
(2, 2, 'Sub Kejuruan 2', 16, '180', 'Tujuan Kejuruan 2', 'Unit Kompetensi  Kejuruan 2', 'Syarat Kejuruan 2', '2018-02-24 16:59:59', '2018-01-24 09:29:09', '2018-01-24 09:29:09'),
(3, 2, 'Sub Kejuruan 2.1', 16, '180', 'Tujuan Kejuruan 2.1', 'Unit Kompetensi Kejuruan 2.1', 'Syarat Kejuruan 2.1', '2018-02-13 16:59:59', '2018-01-24 09:30:12', '2018-01-24 09:30:12');

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
(1, 1, NULL, NULL, NULL, '2018-01-24 09:21:23', '2018-01-24 09:21:23');

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
(1, '12345678', 'Dewi Anisa Istiqomah', 'dewianisaist@gmail.com', '$2y$10$vPSli1wHAX4DWVyzOrkTPeQjvV866fPbX3Bccx..YucEPbspw2T6u', 'VcslAx1gmiv5acJ6WslN2RPl9awHClIo0KW2oJGEc68F2CmFZM0XFczluG4j', '2018-01-24 09:03:21', '2018-01-24 09:22:58'),
(2, '11111111', 'Pendaftar 1', 'pendaftar1@test.com', '$2y$10$bl8eboXpSsiJOIRmKjbfleQLFubefs.cHDlkHAkkxk4D6CoDhRz56', 'YybXjCB4x77ThmWViD97KdPiECRhtchrwZFihVWsWHuOTENhXjuh5rLicPRX', '2018-01-24 09:20:41', '2018-01-24 09:21:34'),
(3, '22222222', 'Pendaftar 2', 'pendaftar2@test.com', '$2y$10$R4hZLCU3iN3P9gMlmu5/PuDTrjy5OQtkk4muI5AE7UFYB.jdCD8Bm', 'qC68olE1LyqtMMh2g9isTdKSMrKnMm2bpEMwdNf0HszZhktGobDNblxQh3bp', '2018-01-24 09:22:03', '2018-01-24 09:22:09'),
(4, '101010', 'Staf OK', 'staf@test.com', '$2y$10$pcn2Nx6iqWagbKTjuEzU..5IZLRXSUUmEjkPlTARRC/L6Ozv1LjDS', NULL, '2018-01-24 09:23:26', '2018-01-24 09:24:30'),
(5, '202020', 'Kepala OK', 'kepala@test.com', '$2y$10$cReRzY3Fj0H.BgmzJejtbO5y.LB1bJnbuJfHmuf/Z/T6Ik5ebOIP.', NULL, '2018-01-24 09:23:48', '2018-01-24 09:23:48'),
(6, '303030', 'Kasubag TU OK', 'kasubagtu@test.com', '$2y$10$oAx9BMsSqe5OqLtaArzOV.cos9dEOSZRGIfnmz.13QJmVpU/keiFK', NULL, '2018-01-24 09:24:21', '2018-01-24 09:24:21'),
(7, '404040', 'Koor Instruktur', 'koorinstruktur@test.com', '$2y$10$mZ53j64OhYuZZtJ1sVAZmupS82SQQxYu6/iVd5xXGZ4u.e6LdkI76', NULL, '2018-01-24 09:24:57', '2018-01-24 09:24:57'),
(8, '505050', 'Kajur 1 OK', 'kajur1@test.com', '$2y$10$lCwBc6GV7rqhaM9wzZauQeC5NO3sN1hAKkw1fixjfggtVBMB3hfvi', NULL, '2018-01-24 09:25:23', '2018-01-24 09:25:23'),
(9, '606060', 'Kajur 2 OK', 'kajur2@test.com', '$2y$10$vl.y0DHNDa5jjbMyh1lgfOE9GEUHUd7Sey7wSUIqSp0q3ATHEVGha', NULL, '2018-01-24 09:25:54', '2018-01-24 09:25:54');

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
(1, 'Kejuruan 1', 'Test Kejuruan 1', '2018-01-24 09:26:19', '2018-01-24 09:26:19'),
(2, 'Kejuruan 2', 'Test Kejuruan 2', '2018-01-24 09:26:31', '2018-01-24 09:26:31'),
(3, 'Kejuruan 3', 'Test Kejuruan 3', '2018-01-24 09:26:42', '2018-01-24 09:26:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`user_id`,`criteria_id`),
  ADD KEY `fk_criterias_has_users_users1_idx` (`user_id`),
  ADD KEY `fk_criterias_has_users_criterias1_idx` (`criteria_id`);

--
-- Indexes for table `conversion`
--
ALTER TABLE `conversion`
  ADD PRIMARY KEY (`id`,`criteria_id`),
  ADD KEY `fk_conversion_criterias1_idx` (`criteria_id`);

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
  ADD PRIMARY KEY (`registrant_id`,`sub_vocational_id`,`register_date`),
  ADD KEY `fk_pendaftar_has_sub_kejuruan_sub_kejuruan1_idx` (`sub_vocational_id`),
  ADD KEY `fk_pendaftar_has_sub_kejuruan_pendaftar1_idx` (`registrant_id`);

--
-- Indexes for table `result_selections`
--
ALTER TABLE `result_selections`
  ADD PRIMARY KEY (`selection_id`,`criteria_id`),
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
  ADD KEY `fk_selections_selection_schedules1_idx` (`selection_schedule_id`),
  ADD KEY `fk_selections_registrants1_idx` (`registrant_id`);

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
-- AUTO_INCREMENT for table `conversion`
--
ALTER TABLE `conversion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `educational_background`
--
ALTER TABLE `educational_background`
  MODIFY `registrant_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `registrants`
--
ALTER TABLE `registrants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `selections`
--
ALTER TABLE `selections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `selection_schedules`
--
ALTER TABLE `selection_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sub_vocationals`
--
ALTER TABLE `sub_vocationals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `vocationals`
--
ALTER TABLE `vocationals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `choices`
--
ALTER TABLE `choices`
  ADD CONSTRAINT `fk_criterias_has_users_criterias1` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_criterias_has_users_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `conversion`
--
ALTER TABLE `conversion`
  ADD CONSTRAINT `fk_conversion_criterias1` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_selections_registrants1` FOREIGN KEY (`registrant_id`) REFERENCES `registrants` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
