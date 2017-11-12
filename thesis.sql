-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 13, 2017 at 12:51 AM
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
(1, 'user-list', 'Menampilkan daftar Pengguna', 'Hanya melihat daftar Pengguna', '2017-11-12 16:41:15', '2017-11-12 16:41:15'),
(2, 'user-create', 'Membuat Pengguna', 'Membuat Pengguna baru', '2017-11-12 16:41:15', '2017-11-12 16:41:15'),
(3, 'user-edit', 'Edit Pengguna', 'Edit Pengguna', '2017-11-12 16:41:15', '2017-11-12 16:41:15'),
(4, 'user-delete', 'Hapus Pengguna', 'Hapus Pengguna', '2017-11-12 16:41:15', '2017-11-12 16:41:15'),
(5, 'role-list', 'Menampilkan daftar Role', 'Hanya melihat daftar Role', '2017-11-12 16:41:15', '2017-11-12 16:41:15'),
(6, 'role-create', 'Membuat Role', 'Membuat Role baru', '2017-11-12 16:41:15', '2017-11-12 16:41:15'),
(7, 'role-edit', 'Edit Role', 'Edit Role', '2017-11-12 16:41:15', '2017-11-12 16:41:15'),
(8, 'role-delete', 'Hapus Role', 'Hapus Role', '2017-11-12 16:41:15', '2017-11-12 16:41:15'),
(9, 'vocational-list', 'Menampilkan daftar Kejuruan', 'Hanya melihat daftar Kejuruan', '2017-11-12 16:41:15', '2017-11-12 16:41:15'),
(10, 'vocational-create', 'Membuat Kejuruan', 'Membuat Kejuruan baru', '2017-11-12 16:41:16', '2017-11-12 16:41:16'),
(11, 'vocational-edit', 'Edit Kejuruan', 'Edit Kejuruan', '2017-11-12 16:41:16', '2017-11-12 16:41:16'),
(12, 'vocational-delete', 'Hapus Kejuruan', 'Hapus Kejuruan', '2017-11-12 16:41:16', '2017-11-12 16:41:16');

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
(2, 5),
(2, 9),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(4, 9);

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
(1, 'Superadmin', 'Peneliti', 'Peneliti memiliki seluruh akses dari aplikasi', '2017-11-12 16:44:17', '2017-11-12 16:44:17'),
(2, 'Kepala', 'Kepala BLK', 'Kepala merupakan pengambil keputusan', '2017-11-12 16:45:34', '2017-11-12 16:45:34'),
(3, 'Admin', 'Staf', 'Staf bertugas mengelola aplikasi', '2017-11-12 16:47:13', '2017-11-12 16:47:45'),
(4, 'Pendaftar', 'Pendaftar', 'Pendaftar merupakan calon peserta pelatihan', '2017-11-12 16:48:24', '2017-11-12 16:48:24');

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
(2, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `selections`
--

CREATE TABLE `selections` (
  `id` int(11) NOT NULL,
  `registrant_id` int(11) NOT NULL,
  `written_value` decimal(3,3) DEFAULT NULL,
  `interview_value` decimal(3,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `selection_schedule_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `selection_schedules`
--

CREATE TABLE `selection_schedules` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `information` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sub_vocational_id` int(11) NOT NULL
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
(1, '12345678', 'Dewi Anisa Istiqomah', 'dewianisaist@gmail.com', '$2y$10$KTbhBqSPeGjpLMBK0KI0aeBLEPv/0Vm./WTq.dZ75vtC/Ht3kUzdm', NULL, '2017-11-12 16:48:44', '2017-11-12 16:48:44'),
(2, '11111111', 'Mr A', 'a@test.com', '$2y$10$StsVs1gOhb55qdw8VFo8o.NYhB8QhtxF/XbEWog6f0afK1TsNrrl2', NULL, '2017-11-12 16:49:39', '2017-11-12 16:49:39'),
(3, '22222222', 'Mr B', 'b@test.com', '$2y$10$5uxNWFx2sO3M9OSCUAJvvOEbHetm8eNs9DT2MNrSqBelJnhKaw1K6', NULL, '2017-11-12 16:50:01', '2017-11-12 16:50:01'),
(4, '101010', 'pendaftar1', 'pendaftar1@test.com', '$2y$10$m2yWb1jKj2FWp2iZpzWUvuD.Wl/picZOOwKKsVf94zvN1yfxAE0kO', NULL, '2017-11-12 16:51:07', '2017-11-12 16:51:07');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `selections`
--
ALTER TABLE `selections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sub_vocationals`
--
ALTER TABLE `sub_vocationals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `vocationals`
--
ALTER TABLE `vocationals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
