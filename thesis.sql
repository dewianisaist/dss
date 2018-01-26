-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 26, 2018 at 07:30 AM
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
  `option` varchar(15) NOT NULL,
  `suggestion` varchar(1) NOT NULL
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
(1, 'Jahit', '2018-01-25 23:05:23', '2018-01-25 23:05:23'),
(2, 'Stir', '2018-01-25 23:05:31', '2018-01-25 23:05:31'),
(3, 'Komputer', '2018-01-25 23:05:38', '2018-01-25 23:05:38');

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
(1, 2, '-', 2015);

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
(1, NULL, 'Kriteria 1', 'Sumber kriteria 1 (XYZ, 2017)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-01-25 23:08:56', '2018-01-25 23:08:56'),
(2, NULL, 'Kriteria 2', 'Sumber kriteria 2 (XYZ, 2015)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-01-25 23:09:11', '2018-01-25 23:09:11');

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
(1, 1, '-', 2004),
(1, 2, '-', 2007),
(1, 3, '-', 2010),
(3, 1, '-', 2010);

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
(1, 'SD', '', '2018-01-25 23:04:30', '2018-01-25 23:04:30'),
(2, 'SMP', '', '2018-01-25 23:04:35', '2018-01-25 23:04:35'),
(3, 'SMA', 'IPA', '2018-01-25 23:04:43', '2018-01-25 23:04:43'),
(4, 'SMA', 'IPS', '2018-01-25 23:04:53', '2018-01-25 23:04:53'),
(5, 'SMK', 'Teknik Kendaraan Ringan', '2018-01-25 23:05:02', '2018-01-25 23:05:02'),
(6, 'SMK', 'Multimedia', '2018-01-25 23:05:09', '2018-01-25 23:05:09');

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
(1, 'registrant-list', 'Menampilkan data pendaftar', 'Menampilkan data pendaftar', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(2, 'registrant-edit', 'Edit data pendaftar', 'Edit data pendaftar', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(3, 'educational_background-list', 'Menampilkan daftar riwayat pendidikan', 'Menampilkan daftar riwayat pendidikan', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(4, 'educational_background-create', 'Menambahkan riwayat pendidikan', 'Menambahkan riwayat pendidikan', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(5, 'educational_background-edit', 'Edit riwayat pendidikan', 'Edit riwayat pendidikan', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(6, 'educational_background-delete', 'Hapus riwayat pendidikan', 'Hapus riwayat pendidikan', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(7, 'course_experience-list', 'Menampilkan daftar pengalaman kursus', 'Menampilkan daftar pengalaman kursus', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(8, 'course_experience-create', 'Menambahkan pengalaman kursus', 'Menambahkan pengalaman kursus', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(9, 'course_experience-edit', 'Edit pengalaman kursus', 'Edit pengalaman kursus', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(10, 'course_experience-delete', 'Hapus pengalaman kursus', 'Hapus pengalaman kursus', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(11, 'registration-list', 'Menampilkan riwayat pendaftaran', 'Menampilkan riwayat pendaftaran', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(12, 'registration-create', 'Melakukan pendaftaran', 'Melakukan pendaftaran', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(13, 'user-list', 'Menampilkan daftar akun pengguna', 'Menampilkan daftar akun pengguna', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(14, 'user-create', 'Membuat akun pengguna', 'Membuat akun pengguna', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(15, 'user-edit', 'Edit akun pengguna', 'Edit akun pengguna', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(16, 'user-delete', 'Hapus akun pengguna', 'Hapus akun pengguna', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(17, 'role-list', 'Menampilkan daftar role', 'Menampilkan daftar role', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(18, 'role-create', 'Membuat role', 'Membuat role', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(19, 'role-edit', 'Edit role', 'Edit role', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(20, 'role-delete', 'Hapus role', 'Hapus role', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(21, 'vocational-list', 'Menampilkan daftar kejuruan', 'Menampilkan daftar kejuruan', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(22, 'vocational-create', 'Membuat kejuruan', 'Membuat kejuruan', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(23, 'vocational-edit', 'Edit kejuruan', 'Edit kejuruan', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(24, 'vocational-delete', 'Hapus kejuruan', 'Hapus kejuruan', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(25, 'education-list', 'Menampilkan daftar pendidikan', 'Menampilkan daftar pendidikan', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(26, 'education-create', 'Menambahkan pendidikan', 'Menambahkan pendidikan', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(27, 'education-edit', 'Edit pendidikan', 'Edit pendidikan', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(28, 'education-delete', 'Hapus pendidikan', 'Hapus pendidikan', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(29, 'course-list', 'Menampilkan daftar kursus', 'Menampilkan daftar kursus', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(30, 'course-create', 'Menambahkan kursus', 'Menambahkan kursus', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(31, 'course-edit', 'Edit kursus', 'Edit kursus', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(32, 'course-delete', 'Hapus kursus', 'Hapus kursus', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(33, 'profile_user-list', 'Menampilkan profile user', 'Menampilkan profile user', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(34, 'profile_user-edit', 'Edit profile user', 'Edit profile user', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(35, 'subvocational-list', 'Menampilkan daftar sub-kejuruan', 'Menampilkan daftar sub-kejuruan', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(36, 'subvocational-create', 'Membuat sub-kejuruan', 'Membuat sub-kejuruan', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(37, 'subvocational-edit', 'Edit sub-kejuruan', 'Edit sub-kejuruan', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(38, 'subvocational-delete', 'Hapus sub-kejuruan', 'Hapus sub-kejuruan', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(39, 'criteria-list', 'Menampilkan daftar kriteria', 'Menampilkan daftar kriteria', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(40, 'criteria-create', 'Membuat kriteria', 'Membuat kriteria', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(41, 'criteria-edit', 'Edit kriteria', 'Edit kriteria', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(42, 'criteria-delete', 'Hapus kriteria', 'Hapus kriteria', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(43, 'preference-list', 'Menampilkan daftar preference', 'Menampilkan daftar preference', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(44, 'preference-create', 'Membuat preference', 'Membuat preference', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(45, 'preference-edit', 'Edit preference', 'Edit preference', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(46, 'preference-delete', 'Hapus preference', 'Hapus preference', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(47, 'manage_registrant-list', 'Menampilkan daftar data pendaftar', 'Menampilkan daftar data pendaftar', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(48, 'questionnaire-list', 'Menampilkan isian kuesioner kriteria', 'Menampilkan isian kuesioner kriteria', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(49, 'questionnaire-create', 'Mengisi kuesioner kriteria', 'Mengisi kuesioner kriteria', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(50, 'selectionschedule-list', 'Menampilkan daftar jadwal seleksi', 'Menampilkan daftar jadwal seleksi', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(51, 'selectionschedule-create', 'Membuat jadwal seleksi', 'Membuat jadwal seleksi', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(52, 'selectionschedule-edit', 'Edit jadwal seleksi', 'Edit jadwal seleksi', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(53, 'selectionschedule-delete', 'Hapus jadwal seleksi', 'Hapus jadwal seleksi', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(54, 'selection-list', 'Menampilkan daftar nilai seleksi', 'Menampilkan daftar nilai seleksi', '2018-01-25 22:23:15', '2018-01-25 22:23:15'),
(55, 'selection-edit', 'Memasukkan nilai seleksi', 'Memasukkan nilai seleksi', '2018-01-25 22:23:15', '2018-01-25 22:23:15');

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
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 47),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
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
(3, 33),
(3, 34),
(3, 43),
(3, 44),
(3, 45),
(3, 46),
(3, 47),
(3, 48),
(3, 49),
(3, 50),
(3, 51),
(3, 52),
(3, 53),
(3, 54),
(4, 33),
(4, 34),
(4, 47),
(4, 48),
(4, 49),
(4, 50),
(4, 54),
(5, 33),
(5, 34),
(5, 47),
(5, 48),
(5, 49),
(5, 50),
(5, 54),
(6, 33),
(6, 34),
(6, 47),
(6, 48),
(6, 49),
(6, 50),
(6, 54),
(6, 55);

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
(1, 8, 'Jetis, Bantul, DIY', '0864324567', 'Laki-laki', 'Bantul', '1996-08-16', 0, 0, 'Islam', '', '', '', '2018-01-25 23:11:46', '2018-01-25 23:11:46'),
(2, 9, 'Kweden, Bantul, DIY', '0987267382', 'Laki-laki', 'Bantul', '1999-07-22', 0, 0, 'Islam', '', '', '', '2018-01-25 23:15:25', '2018-01-25 23:15:25'),
(3, 10, 'Pepe, Bantul, DIY', '085736489', 'Laki-laki', 'Bantul', '2018-01-26', 2, 3, 'Islam', 'Ibu 3', 'Ayah 3', 'Pepe, Bantul, DIY', '2018-01-25 23:19:11', '2018-01-25 23:19:11');

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
(1, 2, '2018-01-26 06:13:16'),
(1, 4, '2018-01-26 06:13:24'),
(2, 4, '2018-01-26 06:15:52');

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
(1, 'staf', 'Staf', 'Melakukan pengelolaan data', '2018-01-25 22:27:36', '2018-01-25 22:27:36'),
(2, 'pendaftar', 'Pendaftar', 'Calon peserta pelatihan', '2018-01-25 22:28:47', '2018-01-25 22:28:47'),
(3, 'kepala', 'Kepala', 'Pembuat keputusan dan melakukan pengawasan pada proses seleksi peserta pelatihan', '2018-01-25 22:44:58', '2018-01-25 22:44:58'),
(4, 'kasubag_tu', 'Kepala Sub-Bagian Tata Usaha', 'Melakukan pengawasan terhadap pengelolaan data', '2018-01-25 22:48:56', '2018-01-25 22:48:56'),
(5, 'koor_instruktur', 'Koordinator Instruktur', 'Melakukan pengawasan ', '2018-01-25 22:51:35', '2018-01-25 22:51:35'),
(6, 'kajur', 'Kepala Kejuruan', 'Menilai seleksi peserta pelatihan', '2018-01-25 22:54:17', '2018-01-25 22:54:17');

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
(1, 2),
(2, 1),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(3, 1),
(3, 3),
(4, 1),
(4, 4),
(5, 1),
(5, 5),
(6, 1),
(6, 6),
(6, 7);

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
(1, 1, '2018-03-01', '08:00', 'R. Teori 1', '', '2018-01-25 23:06:24', '2018-01-25 23:06:24'),
(2, 2, '2018-03-01', '08:00', 'R. TKR 1', 'Pakaian rapi dan bersepatu', '2018-01-25 23:06:52', '2018-01-25 23:08:16'),
(3, 3, '2018-03-02', '08:00', 'R. TKR 1', 'Pakaian rapi dan bersepatu', '2018-01-25 23:07:20', '2018-01-25 23:08:12'),
(4, 4, '2018-03-02', '08:00', 'R. Teori 1', 'Pakaian rapi dan bersepatu', '2018-01-25 23:07:39', '2018-01-25 23:08:02');

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
(1, 1, 'Sub Kejuruan 1.1', 16, '180', 'Tujuan 1.1', 'UK 1.1', 'Syarat 1.1', '2018-02-10 16:59:59', '2018-01-25 23:01:06', '2018-01-25 23:01:06'),
(2, 2, 'Sub Kejuruan 2.1', 16, '180', 'Tujuan 2.1', 'UK 2.1', 'Syarat 2.1', '2018-02-17 16:59:59', '2018-01-25 23:02:26', '2018-01-25 23:02:26'),
(3, 2, 'Sub Kejuruan 2.2', 16, '180', 'Tujuan 2.2', 'UK 2.2', 'Syarat 2.2', '2018-03-03 16:59:59', '2018-01-25 23:03:21', '2018-01-25 23:03:21'),
(4, 3, 'Sub Kejuruan 3.1', 16, '180', 'Tujuan 3.1', 'Uk 3.1', 'Syarat 3.1', '2018-02-09 16:59:59', '2018-01-25 23:04:20', '2018-01-25 23:04:20');

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
(1, 1, 'photo_c9f0f895fb98ab9159f51fd0297e236d.jpeg', 'ktp_c9f0f895fb98ab9159f51fd0297e236d.pdf', 'lastcertificate_c9f0f895fb98ab9159f51fd0297e236d.pdf', '2018-01-25 23:11:46', '2018-01-25 23:27:27'),
(2, 2, NULL, NULL, NULL, '2018-01-25 23:15:25', '2018-01-25 23:15:25'),
(3, 3, 'photo_d3d9446802a44259755d38e6d163e820.png', 'ktp_d3d9446802a44259755d38e6d163e820.pdf', 'lastcertificate_d3d9446802a44259755d38e6d163e820.pdf', '2018-01-25 23:19:11', '2018-01-25 23:24:10');

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
(1, '12345678', 'Dewi Anisa Istiqomah', 'dewianisaist@gmail.com', '$2y$10$UgFPf7CHy555J5kD/W4rHu.R5/SqMFcPUcAg4R0bLmAGl3cB4LDES', 'D8zFYE8MbejYol1cxNQ0TIVWQnaO9zFZW7Mkc4sm1mCk3xDbvsxmdtLhNpVz', '2018-01-25 21:43:23', '2018-01-25 23:09:30'),
(2, '101010', 'Staf BLK', 'staf@test.com', '$2y$10$2Dj/fj3BfJKJ2Ld51zaP4e8UrpbdIDsvOuxoG5a8pIBCTOl6HhdoW', NULL, '2018-01-25 22:55:13', '2018-01-25 22:55:13'),
(3, '303030', 'Kepala BLK', 'kepala@test.com', '$2y$10$0nTbkBOgWx5Sh4WhDbDppO0tKMDpEHJEcRRYS1E5qrj1Bkmoof4d6', NULL, '2018-01-25 22:55:42', '2018-01-25 22:55:42'),
(4, '404040', 'Kasubag TU BLK', 'kasubagtu@test.com', '$2y$10$kghNJtutmg6lIWZvy88CVuKHJxShtgBbCXObIwCigwHLPrYFoABte', NULL, '2018-01-25 22:56:30', '2018-01-25 22:56:30'),
(5, '505050', 'Koor Instruktur BLK', 'koorinstruktur@test.com', '$2y$10$yeyMaS6R1vdiWcg37VyqB.bdIGWZoWQjzTaySbq.HN5vk4NxGDzG6', NULL, '2018-01-25 22:56:55', '2018-01-25 22:56:55'),
(6, '606060', 'Kajur BLK 1 ', 'kajur1@test.com', '$2y$10$sDQWW0HGL0/MLJl2mQwJAul3AS3k6BCu8It0YeB8Y8pe2v0O0zlpG', NULL, '2018-01-25 22:57:57', '2018-01-25 22:57:57'),
(7, '707070', 'Kajur BLK 2', 'kajur2@test.com', '$2y$10$TSAPE8R5GgvQ.fUrtieHeuU8rfAUI7.QG1ARKhAaT0oJ2jZ.3j37m', NULL, '2018-01-25 22:58:26', '2018-01-25 22:58:26'),
(8, '11111111', 'Pendaftar 1', 'pendaftar1@test.com', '$2y$10$dz36hH18xdTzu2d9c.jK3.Ioq2j0PHuUoxJNgmv37iHSoylMhJ2gW', 'jeMVyyrgqt8JTjQzoiaeb3xRtpNhk9URcTYp3bBypIjTjOrc7oU8DPue3eYK', '2018-01-25 23:09:48', '2018-01-25 23:27:39'),
(9, '22222222', 'Pendaftar 2', 'pendaftar2@test.com', '$2y$10$d10teskyn3A8Eq3GIdW1.uKnJrXnvS6a8uw5PbANfgDMwVYECNtVq', 'fNGAYNgarGsB1mzQxqa9cxDLIH8bSUtajTh4OrkKnjCSeMxpCuhqpgYwMijC', '2018-01-25 23:13:59', '2018-01-25 23:15:59'),
(10, '33333333', 'Pendaftar 3', 'pendaftar3@test.com', '$2y$10$K.25Oa63VN4dcFwIYro5UuvFMPis1e5XEYLyAUUMwDl5yR6OcCC9S', '8rMUSQfyZs1pOWqk3h2P4WJxgqjwhYUuhQyggCm2GiwNRGDhwZIo1CdUf7oF', '2018-01-25 23:17:29', '2018-01-25 23:26:41'),
(11, '44444444', 'Pendaftar 4', 'pendaftar4@test.com', '$2y$10$d2Hs8ozrVtTm/4CBsbblsuwxH9eUJgdYNlFwBLAdLMC7vTMZEbyH.', 'S84pNxll0ucY4drdrbaGnBXaEKp6ViuMz6Exvy3PzxPFp6PsMuKag7ITLwtj', '2018-01-25 23:28:13', '2018-01-25 23:28:18');

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
(1, 'Kejuruan 1', 'Test kejuruan 1', '2018-01-25 22:59:45', '2018-01-25 22:59:45'),
(2, 'Kejuruan 2', 'Test kejuruan 2', '2018-01-25 22:59:58', '2018-01-25 22:59:58'),
(3, 'Kejuruan 3', 'Test kejuruan 3', '2018-01-25 23:00:08', '2018-01-25 23:00:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`user_id`,`criteria_id`,`option`,`suggestion`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `educational_background`
--
ALTER TABLE `educational_background`
  MODIFY `registrant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `registrants`
--
ALTER TABLE `registrants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sub_vocationals`
--
ALTER TABLE `sub_vocationals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
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
