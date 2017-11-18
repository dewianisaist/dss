-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 17, 2017 at 11:45 PM
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
(1, 'Menjahit', '2017-11-17 15:44:35', '2017-11-17 15:44:35'),
(2, 'Akutansi', '2017-11-17 15:44:44', '2017-11-17 15:44:44'),
(3, 'Otomotif', '2017-11-17 15:44:51', '2017-11-17 15:44:51');

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
(1, 'SD', '', '2017-11-17 15:43:46', '2017-11-17 15:43:46'),
(2, 'SMP', '', '2017-11-17 15:43:52', '2017-11-17 15:43:52'),
(3, 'SMA', 'IPS', '2017-11-17 15:44:01', '2017-11-17 15:44:01'),
(4, 'SMA', 'IPA', '2017-11-17 15:44:08', '2017-11-17 15:44:08'),
(5, 'SMK', 'Multimedia', '2017-11-17 15:44:17', '2017-11-17 15:44:17'),
(6, 'Perguruan Tinggi', 'Akutansi', '2017-11-17 15:44:25', '2017-11-17 15:44:25');

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
(1, 'user-list', 'Menampilkan daftar Pengguna', 'Hanya melihat daftar Pengguna', '2017-11-17 15:35:24', '2017-11-17 15:35:24'),
(2, 'user-create', 'Membuat Pengguna', 'Membuat Pengguna baru', '2017-11-17 15:35:24', '2017-11-17 15:35:24'),
(3, 'user-edit', 'Edit Pengguna', 'Edit Pengguna', '2017-11-17 15:35:24', '2017-11-17 15:35:24'),
(4, 'user-delete', 'Hapus Pengguna', 'Hapus Pengguna', '2017-11-17 15:35:24', '2017-11-17 15:35:24'),
(5, 'role-list', 'Menampilkan daftar Role', 'Hanya melihat daftar Role', '2017-11-17 15:35:24', '2017-11-17 15:35:24'),
(6, 'role-create', 'Membuat Role', 'Membuat Role baru', '2017-11-17 15:35:24', '2017-11-17 15:35:24'),
(7, 'role-edit', 'Edit Role', 'Edit Role', '2017-11-17 15:35:24', '2017-11-17 15:35:24'),
(8, 'role-delete', 'Hapus Role', 'Hapus Role', '2017-11-17 15:35:24', '2017-11-17 15:35:24'),
(9, 'vocational-list', 'Menampilkan daftar Kejuruan', 'Hanya melihat daftar Kejuruan', '2017-11-17 15:35:24', '2017-11-17 15:35:24'),
(10, 'vocational-create', 'Membuat Kejuruan', 'Membuat Kejuruan baru', '2017-11-17 15:35:24', '2017-11-17 15:35:24'),
(11, 'vocational-edit', 'Edit Kejuruan', 'Edit Kejuruan', '2017-11-17 15:35:24', '2017-11-17 15:35:24'),
(12, 'vocational-delete', 'Hapus Kejuruan', 'Hapus Kejuruan', '2017-11-17 15:35:24', '2017-11-17 15:35:24');

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
(5, 9);

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
  `id` int(11) NOT NULL,
  `selection_id` int(11) NOT NULL,
  `criteria_id` int(11) NOT NULL,
  `value` decimal(10,3) DEFAULT NULL,
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
(1, 'Superadmin', 'Peneliti', 'Peneliti memiliki semua kewenangan', '2017-11-17 15:36:58', '2017-11-17 15:36:58'),
(2, 'Admin', 'Staf', 'Staf melakukan pengelolaan data', '2017-11-17 15:37:35', '2017-11-17 15:37:35'),
(3, 'Kepala', 'Kepala BLK', 'Kepala BLK merupakan pembuat keputusan', '2017-11-17 15:38:20', '2017-11-17 15:38:20'),
(4, 'Kajur', 'Kepala Jurusan', 'Kapala jurusan memberikan penilain seleksi', '2017-11-17 15:39:04', '2017-11-17 15:39:04'),
(5, 'Pendaftar', 'Pendaftar', 'Pendaftar merupakan peserta seleksi', '2017-11-17 15:40:01', '2017-11-17 15:40:01');

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
(5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `selections`
--

CREATE TABLE `selections` (
  `id` int(11) NOT NULL,
  `registrant_id` int(11) NOT NULL,
  `selection_schedule_id` int(11) NOT NULL,
  `written_value` decimal(3,3) DEFAULT NULL,
  `interview_value` decimal(3,3) DEFAULT NULL,
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
(1, 1, 'Otomotif sub 1', 16, '170', 'tujuan oto sub', 'unit oto sub', 'syarat oto sub', '2017-12-09 16:59:59', '2017-11-17 15:42:02', '2017-11-17 15:42:02'),
(2, 1, 'Otomotif sub 2', 16, '100', 'tujuan oto 2', 'unit oto 2', 'syarat oto 2', '2017-12-15 16:59:59', '2017-11-17 15:42:49', '2017-11-17 15:42:49'),
(3, 1, 'Menjahit sub 1', 20, '200', 'tujuan jahit 1', 'unit jahit 1', 'syarat jahit 1', '2017-12-08 22:43:32', '2017-11-17 15:43:36', '2017-11-17 15:43:36');

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
(1, '12345678', 'Dewi Anisa Istiqomah', 'dewianisaist@gmail.com', '$2y$10$3K.6S08H.JGFMCu/Z0gu9.GHxbkaIC9.x5gkqofK0YujEaRS45DzO', NULL, '2017-11-17 15:39:27', '2017-11-17 15:39:27'),
(2, '11111111', 'pendaftar 1', 'pendaftar1@tes.com', '$2y$10$Rbip4G2xkC4L/ZeLdFTDneQDS3LzBNTCLLz6N10t.zxCFJ3fTlTM2', NULL, '2017-11-17 15:40:28', '2017-11-17 15:40:28');

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
(1, 'Otomotif', 'tes oto', '2017-11-17 15:40:53', '2017-11-17 15:40:53'),
(2, 'Menjahit', 'tes jahit', '2017-11-17 15:41:04', '2017-11-17 15:41:04');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `result_selections`
--
ALTER TABLE `result_selections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `selections`
--
ALTER TABLE `selections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `selection_schedules`
--
ALTER TABLE `selection_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sub_vocationals`
--
ALTER TABLE `sub_vocationals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
