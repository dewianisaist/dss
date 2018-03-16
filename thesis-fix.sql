-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 16, 2018 at 02:31 PM
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
-- Table structure for table `choice`
--

CREATE TABLE `choice` (
  `user_id` int(11) NOT NULL,
  `criteria_id` int(11) NOT NULL,
  `option` varchar(15) NOT NULL,
  `suggestion` varchar(1) NOT NULL
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
(1, 'Menjahit', '2018-03-14 20:32:34', '2018-03-14 20:32:34'),
(2, 'Bahasa Inggris', '2018-03-14 20:32:41', '2018-03-14 20:32:41'),
(3, 'Stir Mobil', '2018-03-14 20:32:51', '2018-03-14 20:32:51'),
(4, 'Sablon', '2018-03-14 20:33:07', '2018-03-14 20:33:07');

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
  `name` varchar(500) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `citation` varchar(1000) DEFAULT NULL,
  `information` varchar(1000) DEFAULT NULL,
  `partial_weight` decimal(20,3) DEFAULT NULL,
  `global_weight` decimal(20,3) DEFAULT NULL,
  `preference` varchar(10) DEFAULT NULL,
  `max_min` varchar(10) DEFAULT NULL,
  `parameter_p` decimal(20,3) DEFAULT NULL,
  `parameter_q` decimal(20,3) DEFAULT NULL,
  `parameter_s` decimal(20,3) DEFAULT NULL,
  `step` varchar(1) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `ref_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `criterias`
--

INSERT INTO `criterias` (`id`, `group_criteria`, `name`, `description`, `citation`, `information`, `partial_weight`, `global_weight`, `preference`, `max_min`, `parameter_p`, `parameter_q`, `parameter_s`, `step`, `status`, `ref_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Pengalaman pelatihan', 'Kriteria yang digunakan untuk mengetahui keterampilan yang sudah dimilikinya. Data diperoleh dari pengalaman pelatihan yang diisikan pendaftar dan wawancara.', 'Noe, 2012\r\nIvancevich, 2013\r\nBogdanovic, 2016\r\nKumar, 2013\r\nRouyendegh,2012\r\nEl-Santawy, 2012\r\nBlume, 2010\r\nRobertson, 2001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 05:55:57', '2018-03-16 05:55:57'),
(2, NULL, 'Orientasi masa depan', 'Kriteria yang digunakan untuk mengetahui rencana yang dilakukan pendaftar setelah mengikuti pelatihan. Data diperoleh dari wawancara.', 'Noe, 2012\r\nGungor, 2009', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 05:56:32', '2018-03-16 05:56:32'),
(3, NULL, 'Rekomendasi', 'Kriteria yang digunakan untuk mengetahui apakah pendaftar merupakan rekomendasi dari pegawai atau pihak tertentu. Rekomendasi ini diusulkan oleh suatu pihak yang menyatakan bahwa seseorang memiliki potensi yang baik. Data diperoleh dari wawancara.', 'Noe, 2012\r\nIvancevich, 2013', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 05:57:05', '2018-03-16 05:57:05'),
(4, NULL, 'Kesehatan', 'Kriteria yang digunakan untuk mengetahui kondisi kesehatan jasmani pendaftar yang meliputi tekanan darah, apakah mengidap penyakit tertentu, dll. Data diperoleh dari tes kesehatan, yang ditunjukkan dengan surat keterangan dokter.', 'Noe, 2012\r\nSiti, 2010\r\nSafrizal, 2015\r\nRobertson, 2001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 05:57:55', '2018-03-16 05:57:55'),
(5, NULL, 'Kepribadian', 'Kriteria yang digunakan untuk mengkategorikan individu seperti apa. Data diperoleh melalui tes inventori kepribadian, yaitu berupa kuesioner yang mendorong individu untuk melaporkan reaksi atau perasaannya dalam situasi tertentu.', 'Noe, 2012\r\nIvancevich, 2013\r\nSiti, 2010\r\nRobertson, 2001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 05:58:22', '2018-03-16 05:58:22'),
(6, NULL, 'Pengetahuan', 'Kriteria yang digunakan untuk mengukur tingkat pemahaman seseorang terhadap suatu bidang keilmuan. Data diperoleh dari ujian tertulis. ', 'Noe, 2012\r\nSiti, 2010\r\nBogdanovic, 2016\r\nEl-Santawy, 2012\r\nUbaidi, 2015\r\nOswald, 2000\r\nRobertson, 2001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 05:58:58', '2018-03-16 05:58:58'),
(7, NULL, 'Keterampilan teknis', 'Kriteria yang digunakan untuk mengukur kemampuan pendaftar dalam hal keterampilan teknis suatu bidang keilmuan. Data diperoleh dari ujian praktik.', 'Noe, 2012\r\nIvancevich, 2013\r\nSiti, 2010\r\nKumar, 2013\r\nRouyendegh, 2012', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 05:59:24', '2018-03-16 05:59:24'),
(8, NULL, 'Kejujuran', 'Kriteria yang digunakan untuk mengetahui tingkat kejujuran seseorang. Data diperoleh dari tes kejujuran atau melalui kesesuaian jawaban yang diisikan pendaftar dalam form pendaftaran dengan wawancara.', 'Noe, 2012\r\nIvancevich, 2013\r\nRobertson, 2001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 05:59:55', '2018-03-16 05:59:55'),
(9, NULL, 'Bebas obat-obatan terlarang', 'Kriteria yang digunakan untuk mengetahui apakah pendaftar tidak menggunakan obat-obatan terlarang. Data diperoleh dari tes bebas obat-obatan terlarang, yang ditunjukkan dengan surat keterangan bebas narkoba.', 'Noe, 2012', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 06:00:27', '2018-03-16 06:00:27'),
(10, NULL, 'Sikap', 'Kriteria yang digunakan untuk mengetahui apakah pendaftar memiliki sikap, sopan dan santun yang baik atau tidak. Data diperoleh dari sikap pendaftar saat wawancara.', 'Noe, 2012\r\nIvancevich, 2013\r\nSiti, 2010\r\nGungor, 2009', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 06:00:50', '2018-03-16 06:00:50'),
(11, NULL, 'Pendidikan formal', 'Kriteria yang digunakan untuk mengetahui profil pendaftar apakah profilnya sesuai dengan yang diharapkan atau tidak. Data diperoleh dari riwayat pendidikan yang diisikan pendaftar.', 'Noe, 2012\r\nIvancevich, 2013\r\nKelemis, 2010\r\nEl-Santawy, 2012\r\nUbaidi, 2015\r\nBlume, 2010\r\nRobertson, 2001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 06:01:18', '2018-03-16 06:01:18'),
(12, NULL, 'Pengalaman pekerjaan', 'Kriteria yang digunakan untuk mengetahui keterampilan yang dimiliki pendaftar. Data diperoleh dari wawancara.', 'Noe, 2012\r\nIvancevich, 2013\r\nKelemis, 2010', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 06:01:42', '2018-03-16 06:01:42'),
(13, NULL, 'Jenis kelamin', 'Kriteria yang digunakan untuk mengetahui profil pendaftar apakah profilnya sesuai dengan yang diharapkan atau tidak. Data diperoleh dari jenis kelamin yang diisikan pendaftar.', 'Noe, 2012\r\nIvancevich, 2013\r\nHough, 2001\r\nBlume, 2010', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 06:02:08', '2018-03-16 06:02:08'),
(14, NULL, 'Usia', 'Kriteria yang digunakan untuk mengetahui profil pendaftar apakah profilnya sesuai dengan yang diharapkan atau tidak. Data diperoleh dari tanggal lahir yang diisikan pendaftar.', 'Noe, 2012\r\nIvancevich, 2013\r\nGungor, 2009\r\nRouyendegh,2012\r\nEl-Santawy, 2012\r\nSafrizal, 2015\r\nHough, 2001\r\nVinchur, 1998\r\nBlume, 2010\r\nRobertson, 2001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 06:02:32', '2018-03-16 06:02:32'),
(15, NULL, 'Kefasihan bahasa asing', 'Kriteria yang digunakan untuk mengetahui kemampuan bahasa asing pendaftar. Jika pelatihan menggunakan bahasa asing, dapat membantu dalam berkomunikasi. Data diperoleh dari wawancara.', 'Noe, 2012\r\nBogdanovic, 2016\r\nChen, 2013\r\nSafrizal, 2015\r\nOswald, 2000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 06:03:09', '2018-03-16 06:03:09'),
(16, NULL, 'Motivasi', 'Kriteria yang digunakan untuk mengetahui alasan mengikuti pelatihan. Motivasi yang baik akan mempengaruhi usaha untuk mencapai tujuannya. Data diperoleh dari wawancara.', 'Noe, 2012\r\nIvancevich, 2013\r\nGungor, 2009\r\nUbaidi, 2015\r\nBlume, 2010', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 06:03:37', '2018-03-16 06:03:37'),
(17, NULL, 'Mental', 'Kriteria yang digunakan untuk mengetahui kesehatan mental pendaftar. Data diperoleh dari tes psikologi atau melalui wawancara.', 'Noe, 2012\r\nIvancevich, 2013', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 06:03:58', '2018-03-16 06:03:58'),
(18, NULL, 'Pertimbangan keluarga', 'Kriteria yang digunakan untuk mengetahui latar belakang keluarga, misal: pekerjaan orang tua, anak ke berapa, berapa bersaudara, dll. Data diperoleh dari wawancara.', 'Noe, 2012', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 06:04:18', '2018-03-16 06:04:18'),
(19, NULL, 'Ras dan etnis', 'Kriteria yang digunakan untuk mengetahui asal ras dan etnis pendaftar. Data diperoleh dari wawancara.', 'Ivancevich, 2013\r\nHough, 2001\r\nOswald, 2000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 06:04:51', '2018-03-16 06:04:51'),
(20, NULL, 'Status perkawinan', 'Kriteria yang digunakan untuk mengetahui status perkawinan pendaftar. Status perkawinan seseorang pada bidang keilmuan tertentu dapat menjadi pertimbangan. Data diperoleh dari wawancara.', 'Ivancevich, 2013', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 06:05:08', '2018-03-16 06:05:08'),
(21, NULL, 'Karakteristik fisik', 'Kriteria yang digunakan untuk mengetahui karakteristik fisik pendaftar, misal: tinggal badan, berat badan, rambut, dll. Data diperoleh dari tes kesehatan yang ditunjukkan dengan surat keterangan dokter.', 'Ivancevich, 2013\r\nSafrizal, 2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 06:05:32', '2018-03-16 06:05:32'),
(22, NULL, 'Kemampuan kognitif', 'Kriteria yang digunakan untuk mengetahui kemampuan kognitif, yang dapat diukur dengan kemampuan verbal dan matematika. Data diperoleh dari tes psikologi.', 'Noe, 2012\r\nIvancevich, 2013', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 06:05:52', '2018-03-16 06:05:52'),
(23, NULL, 'Keterampilan komputer', 'Kriteria yang digunakan untuk mengukur kemampuan pendaftar dalam hal keterampilan komputer. Data diperoleh dari ujian praktik dengan mengoperasikan komputer.', 'Gungor, 2009\r\nBogdanovic, 2016', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 06:06:16', '2018-03-16 06:06:16'),
(24, NULL, 'Penampilan', 'Kriteria yang digunakan untuk menilai penampilan pendaftar, misal: kerapian berpakaian, penampilan yang sopan dan tidak berlebihan, dll. Data diperoleh dari penilaian penampilan saat melakukan wawancara.', 'Gungor, 2009\r\nSafrizal, 2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 06:06:37', '2018-03-16 06:06:37'),
(25, NULL, 'Keterampilan komunikasi', 'Kriteria yang digunakan untuk mengetahui kemampuan berkomunikasi. Komunikasi yang baik akan mempermudah untuk menangkap ilmu dalam pelatihan. Data diperoleh dari wawancara.', 'Bogdanovic, 2016\r\nKumar, 2013\r\nKelemis, 2010\r\nChen, 2013', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 06:06:59', '2018-03-16 06:06:59'),
(26, NULL, 'Percaya diri', 'Kriteria yang digunakan untuk mengetahui tingkat kepercayaan diri pendaftar. Data diperoleh dari wawancara.', 'Rouyendegh, 2012', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 06:07:19', '2018-03-16 06:07:19'),
(27, NULL, 'Kemantapan emosional', 'Kriteria yang digunakan untuk mengetahui kemantapan emosional. Data diperoleh dari tes EQ (Emotional Questions).', 'Chen, 2013\r\nVinchur, 1998\r\nBarrett, 2003', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 06:08:05', '2018-03-16 06:08:05'),
(28, NULL, 'Komitmen', 'Kriteria yang digunakan untuk mengetahui komitmen pendaftar apakah setelah dinyatakan lulus, pendaftar tidak akan mengundurkan diri dan serius mengikuti pelatihan. Data diperoleh dari wawancara.', 'Ubaidi, 2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 06:08:23', '2018-03-16 06:08:23'),
(29, NULL, 'Keuangan', 'Kriteria yang digunakan untuk mengetahui konsisi ekonomi pendaftar. Data diperoleh dari wawancara.', 'Noe, 2012', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 06:08:54', '2018-03-16 06:08:54'),
(30, NULL, 'Potensi', 'Kriteria yang digunakan untuk mengukur potensi. Potensi yaitu kemampuan dan kualitas yang dimiliki oleh seseorang namun belum dipergunakan secara maksimal. Data diperoleh dari pengukuran potensi diri yang dilakukan melalui diri sendiri (self assessment), melalui feedback dari orang lain dan tes-tes psikologi seperti tes kecerdasan, tes kepribadian, tes kepemimpinan, tes kreativitas dll.', 'Vinchur, 1998\r\nRobertson, 2001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 06:09:14', '2018-03-16 06:09:14'),
(31, NULL, 'Kesungguhan', 'Kriteria yang digunakan untuk mengukur tingkat kesungguhan pendaftar. Kesungguhan dapat tercermin dari apakah pendaftar mengikuti semua proses seleksi dengan baik, datang ontime, sesuai persyaratan, dll. Data diperoleh dari wawancara.', 'Blume, 2010\r\nVinchur, 1998\r\nBarrett, 2003\r\nOswald, 2000\r\nRobertson, 2001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 06:09:35', '2018-03-16 06:09:35'),
(32, NULL, 'Kesan baik', 'Kriteria yang digunakan untuk mengetahui apakah pendaftar memberikan kesan yang baik atau tidak. Kesan baik dapat diperoleh dari sikap, penampilan, sopan, santun yang baik. Data diperoleh dari wawancara.', 'Barrett, 2003', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '2018-03-16 06:09:57', '2018-03-16 06:09:57');

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
(1, 'SD dan sederajat', '', '2018-03-14 09:27:11', '2018-03-14 09:27:47'),
(2, 'SMP dan sederajat', '', '2018-03-14 09:27:16', '2018-03-14 09:27:53'),
(3, 'SMA dan sederajat', 'IPA', '2018-03-14 09:28:06', '2018-03-14 09:28:06'),
(4, 'SMA dan sederajat', 'IPS', '2018-03-14 09:28:15', '2018-03-14 09:28:15'),
(5, 'SMK', 'Teknik Sepeda Motor', '2018-03-14 20:29:04', '2018-03-14 20:29:04'),
(6, 'SMK', 'Digital Komunikasi Visual', '2018-03-14 20:29:41', '2018-03-14 20:30:32'),
(7, 'SMK', 'Akutansi', '2018-03-14 20:29:59', '2018-03-14 20:29:59'),
(8, 'SMK', 'Teknik Kendaraan Ringan', '2018-03-14 20:30:22', '2018-03-14 20:30:22'),
(9, 'SMK', 'Teknik Permesinan', '2018-03-14 20:31:01', '2018-03-14 20:31:01'),
(10, 'SMK', 'Teknik Otomotif', '2018-03-14 20:31:11', '2018-03-14 20:31:11');

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
(1, 'registrant-list', 'Menampilkan data pendaftar', 'Menampilkan data pendaftar', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(2, 'registrant-edit', 'Edit data pendaftar', 'Edit data pendaftar', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(3, 'educational_background-list', 'Menampilkan daftar riwayat pendidikan', 'Menampilkan daftar riwayat pendidikan', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(4, 'educational_background-create', 'Menambahkan riwayat pendidikan', 'Menambahkan riwayat pendidikan', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(5, 'educational_background-edit', 'Edit riwayat pendidikan', 'Edit riwayat pendidikan', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(6, 'educational_background-delete', 'Hapus riwayat pendidikan', 'Hapus riwayat pendidikan', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(7, 'course_experience-list', 'Menampilkan daftar pengalaman kursus', 'Menampilkan daftar pengalaman kursus', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(8, 'course_experience-create', 'Menambahkan pengalaman kursus', 'Menambahkan pengalaman kursus', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(9, 'course_experience-edit', 'Edit pengalaman kursus', 'Edit pengalaman kursus', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(10, 'course_experience-delete', 'Hapus pengalaman kursus', 'Hapus pengalaman kursus', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(11, 'registration-list', 'Menampilkan riwayat pendaftaran', 'Menampilkan riwayat pendaftaran', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(12, 'registration-create', 'Melakukan pendaftaran', 'Melakukan pendaftaran', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(13, 'user-list', 'Menampilkan daftar akun pengguna', 'Menampilkan daftar akun pengguna', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(14, 'user-create', 'Membuat akun pengguna', 'Membuat akun pengguna', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(15, 'user-edit', 'Edit akun pengguna', 'Edit akun pengguna', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(16, 'user-delete', 'Hapus akun pengguna', 'Hapus akun pengguna', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(17, 'role-list', 'Menampilkan daftar role', 'Menampilkan daftar role', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(18, 'role-create', 'Membuat role', 'Membuat role', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(19, 'role-edit', 'Edit role', 'Edit role', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(20, 'role-delete', 'Hapus role', 'Hapus role', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(21, 'vocational-list', 'Menampilkan daftar kejuruan', 'Menampilkan daftar kejuruan', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(22, 'vocational-create', 'Membuat kejuruan', 'Membuat kejuruan', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(23, 'vocational-edit', 'Edit kejuruan', 'Edit kejuruan', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(24, 'vocational-delete', 'Hapus kejuruan', 'Hapus kejuruan', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(25, 'education-list', 'Menampilkan daftar pendidikan', 'Menampilkan daftar pendidikan', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(26, 'education-create', 'Menambahkan pendidikan', 'Menambahkan pendidikan', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(27, 'education-edit', 'Edit pendidikan', 'Edit pendidikan', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(28, 'education-delete', 'Hapus pendidikan', 'Hapus pendidikan', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(29, 'course-list', 'Menampilkan daftar kursus', 'Menampilkan daftar kursus', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(30, 'course-create', 'Menambahkan kursus', 'Menambahkan kursus', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(31, 'course-edit', 'Edit kursus', 'Edit kursus', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(32, 'course-delete', 'Hapus kursus', 'Hapus kursus', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(33, 'profile_user-list', 'Menampilkan profile user', 'Menampilkan profile user', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(34, 'profile_user-edit', 'Edit profile user', 'Edit profile user', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(35, 'subvocational-list', 'Menampilkan daftar sub-kejuruan', 'Menampilkan daftar sub-kejuruan', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(36, 'subvocational-create', 'Membuat sub-kejuruan', 'Membuat sub-kejuruan', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(37, 'subvocational-edit', 'Edit sub-kejuruan', 'Edit sub-kejuruan', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(38, 'subvocational-delete', 'Hapus sub-kejuruan', 'Hapus sub-kejuruan', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(39, 'criteria-list', 'Menampilkan daftar kriteria', 'Menampilkan daftar kriteria', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(40, 'criteria-create', 'Membuat kriteria', 'Membuat kriteria', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(41, 'criteria-edit', 'Edit kriteria', 'Edit kriteria', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(42, 'criteria-delete', 'Hapus kriteria', 'Hapus kriteria', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(43, 'preference-list', 'Menampilkan daftar preference', 'Menampilkan daftar preference', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(44, 'preference-create', 'Membuat preference', 'Membuat preference', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(45, 'preference-edit', 'Edit preference', 'Edit preference', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(46, 'preference-delete', 'Hapus preference', 'Hapus preference', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(47, 'manage_registrant-list', 'Menampilkan daftar data pendaftar', 'Menampilkan daftar data pendaftar', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(48, 'questionnaire-list', 'Menampilkan isian kuesioner kriteria', 'Menampilkan isian kuesioner kriteria', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(49, 'questionnaire-create', 'Mengisi kuesioner kriteria', 'Mengisi kuesioner kriteria', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(50, 'selectionschedule-list', 'Menampilkan daftar jadwal seleksi', 'Menampilkan daftar jadwal seleksi', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(51, 'selectionschedule-create', 'Membuat jadwal seleksi', 'Membuat jadwal seleksi', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(52, 'selectionschedule-edit', 'Edit jadwal seleksi', 'Edit jadwal seleksi', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(53, 'selectionschedule-delete', 'Hapus jadwal seleksi', 'Hapus jadwal seleksi', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(54, 'selection-list', 'Menampilkan daftar nilai seleksi', 'Menampilkan daftar nilai seleksi', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(55, 'selection-edit', 'Memasukkan nilai seleksi', 'Memasukkan nilai seleksi', '2018-01-26 20:23:15', '2018-01-26 20:23:15'),
(56, 'resultstep1-list', 'Menampilkan hasil kriteria pada tahap 1', 'Menampilkan hasil kriteria pada tahap 1', '2018-03-14 01:22:48', '2018-03-14 01:22:48'),
(57, 'criteriastep2-list', 'Menampilkan kriteria pada tahap 2', 'Menampilkan kriteria pada tahap 2', '2018-03-14 01:22:48', '2018-03-14 01:22:48'),
(58, 'criteriastep2-create', 'Menambahkan kriteria pada tahap 2', 'Menambahkan kriteria pada tahap 2', '2018-03-14 01:22:48', '2018-03-14 01:22:48'),
(59, 'criteriastep2-edit', 'Edit kriteria pada tahap 2', 'Edit kriteria pada tahap 2', '2018-03-14 01:22:48', '2018-03-14 01:22:48'),
(60, 'criteriastep2-delete', 'Hapus kriteria pada tahap 2', 'Hapus kriteria pada tahap 2', '2018-03-14 01:22:48', '2018-03-14 01:22:48'),
(61, 'criteriastep2-use', 'Menggunakan kriteria pada tahap sebelumnya', 'Menggunakan kriteria pada tahap sebelumnya', '2018-03-14 01:22:48', '2018-03-14 01:22:48'),
(62, 'criteriagroup-list', 'Menampilkan hierarki (kelompok kriteria)', 'Menampilkan hierarki (kelompok kriteria)', '2018-03-14 01:22:48', '2018-03-14 01:22:48'),
(63, 'criteriagroup-create', 'Menambahkan kelompok kriteria', 'Menambahkan kelompok kriteria', '2018-03-14 01:22:48', '2018-03-14 01:22:48'),
(64, 'criteriagroup-edit', 'Edit kelompok kriteria', 'Edit kelompok kriteria', '2018-03-14 01:22:48', '2018-03-14 01:22:48'),
(65, 'criteriagroup-delete', 'Hapus kelompok kriteria', 'Hapus kelompok kriteria', '2018-03-14 01:22:48', '2018-03-14 01:22:48'),
(66, 'criteriagroup-add', 'Tambahkan kriteria ke kelompok kriteria', 'Tambahkan kriteria ke kelompok kriteria', '2018-03-14 01:22:48', '2018-03-14 01:22:48'),
(67, 'criteriagroup-out', 'Keluarkan kriteria dari kelompok kriteria', 'Keluarkan kriteria dari kelompok kriteria', '2018-03-14 01:22:48', '2018-03-14 01:22:48'),
(68, 'weights-list', 'Menampilkan bobot kriteria', 'Menampilkan bobot kriteria', '2018-03-14 01:22:48', '2018-03-14 01:22:48'),
(69, 'weights-pairwise', 'Melakukan perbandingan berpasangan', 'Melakukan perbandingan berpasangan', '2018-03-14 01:22:48', '2018-03-14 01:22:48'),
(70, 'result_selection-list', 'Menampilkan daftar data alternatif untuk penilaian', 'Menampilkan daftar data alternatif untuk penilaian', '2018-03-14 01:22:48', '2018-03-14 01:22:48'),
(71, 'result_selection-assessment', 'Melakukan penilaian terhadap alternatif', 'Melakukan penilaian terhadap alternatif', '2018-03-14 01:22:48', '2018-03-14 01:22:48'),
(72, 'result_selection-clear', 'Hapus penilaian terhadap alternatif', 'Hapus penilaian terhadap alternatif', '2018-03-14 01:22:48', '2018-03-14 01:22:48'),
(73, 'result_selection-count', 'Menghitung penilaian alternatif', 'Menghitung penilaian alternatif', '2018-03-14 01:22:48', '2018-03-14 01:22:48'),
(74, 'result-list', 'Menampilkan hasil seleksi', 'Menampilkan hasil seleksi', '2018-03-14 01:22:48', '2018-03-14 01:22:48');

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
(1, 74),
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
(2, 74),
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
(3, 54),
(3, 56),
(3, 57),
(3, 58),
(3, 59),
(3, 60),
(3, 61),
(3, 62),
(3, 63),
(3, 64),
(3, 65),
(3, 66),
(3, 67),
(3, 68),
(3, 69),
(3, 70),
(3, 71),
(3, 72),
(3, 73),
(3, 74),
(4, 33),
(4, 34),
(4, 47),
(4, 48),
(4, 49),
(4, 50),
(4, 54),
(4, 56),
(4, 57),
(4, 62),
(4, 74),
(5, 33),
(5, 34),
(5, 47),
(5, 48),
(5, 49),
(5, 50),
(5, 54),
(5, 56),
(5, 57),
(5, 62),
(5, 74),
(6, 33),
(6, 34),
(6, 47),
(6, 48),
(6, 49),
(6, 50),
(6, 54),
(6, 55),
(6, 56),
(6, 57),
(6, 62),
(6, 74);

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
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` int(11) NOT NULL,
  `registrant_id` int(11) NOT NULL,
  `sub_vocational_id` int(11) NOT NULL,
  `register_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `result_selection`
--

CREATE TABLE `result_selection` (
  `selection_id` int(11) NOT NULL,
  `criteria_id` int(11) NOT NULL,
  `value` varchar(3) DEFAULT NULL
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
(1, 'staf', 'Staf', 'Mengelola data', NULL, NULL),
(2, 'pendaftar', 'Pendaftar', 'Peserta seleksi pelatihan', '2018-01-26 20:32:08', '2018-01-26 20:32:08'),
(3, 'kepala', 'Kepala', 'Pembuat keputusan dan mengawasi seluruh proses seleksi pelatihan', '2018-01-26 20:37:17', '2018-01-26 20:37:17'),
(4, 'kasubag_tu', 'Kepala Sub-Bagian Tata Usaha', 'Terlibat dalam menentukan kriteria dan melakukan pengawasan proses seleksi peserta pelatihan', '2018-01-26 20:39:33', '2018-01-26 20:39:33'),
(5, 'koor_instruktur', 'Koordinator Instruktur', 'Terlibat dalam menentukan kriteria dan melakukan pengawasan proses seleksi peserta pelatihan', '2018-01-26 20:40:43', '2018-01-26 20:42:34'),
(6, 'kajur', 'Kepala Kejuruan', 'Terlibat dalam menentukan kriteria, menilai tes seleksi dan melakukan pengawasan proses seleksi peserta pelatihan', '2018-01-26 20:41:57', '2018-01-26 20:42:55');

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
(1, 10),
(3, 1),
(3, 2),
(4, 1),
(4, 3),
(5, 1),
(5, 7),
(6, 1),
(6, 4),
(6, 5),
(6, 6),
(6, 7),
(6, 8),
(6, 9),
(6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `selections`
--

CREATE TABLE `selections` (
  `id` int(11) NOT NULL,
  `registration_id` int(11) NOT NULL,
  `selection_schedule_id` int(11) NOT NULL,
  `written_value` varchar(3) DEFAULT NULL,
  `interview_value` varchar(3) DEFAULT NULL,
  `recommendation` varchar(5) DEFAULT NULL,
  `ranking` varchar(5) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
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
  `information` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `selection_schedules`
--

INSERT INTO `selection_schedules` (`id`, `sub_vocational_id`, `date`, `time`, `place`, `information`, `created_at`, `updated_at`) VALUES
(1, 3, '2016-06-29', '08:00', 'R. Teknik Sepeda Motor', '-', '2018-03-14 21:19:26', '2018-03-14 21:19:26');

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
  `goal` varchar(1000) DEFAULT NULL,
  `unit_competence` varchar(1000) DEFAULT NULL,
  `requirement_participant` varchar(1000) DEFAULT NULL,
  `final_registration_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_vocationals`
--

INSERT INTO `sub_vocationals` (`id`, `vocational_id`, `name`, `quota`, `long_training`, `goal`, `unit_competence`, `requirement_participant`, `final_registration_date`, `created_at`, `updated_at`) VALUES
(1, 1, 'Las Listrik/Industri', 16, '240', '-', '-', '-', '2018-08-25 16:59:59', '2018-03-14 19:27:48', '2018-03-14 21:23:27'),
(2, 1, 'Mesin Produksi', 16, '240', '-', '-', '-', '2018-03-15 02:28:17', '2018-03-14 19:28:22', '2018-03-14 19:28:22'),
(3, 2, 'Teknik Sepeda Motor', 16, '240', '-', '-', '-', '2018-06-28 16:59:59', '2018-03-14 19:28:52', '2018-03-14 21:27:36'),
(4, 2, 'Teknik Kendaraan Ringan', 16, '240', '-', '-', '-', '2018-08-17 16:59:59', '2018-03-14 19:29:37', '2018-03-14 21:26:12'),
(5, 3, 'Instalasi Penerangan', 16, '240', '-', '-', '-', '2018-08-17 16:59:59', '2018-03-14 19:30:16', '2018-03-14 21:24:41'),
(6, 3, 'Teknik Refriqerasi Domestik', 16, '240', '-', '-', '-', '2018-08-17 16:59:59', '2018-03-14 19:30:59', '2018-03-14 21:25:35'),
(7, 3, 'Instalasi Rumah Tangga', 16, '240', '-', '-', '-', '2018-03-15 02:31:23', '2018-03-14 19:31:25', '2018-03-14 19:31:25'),
(8, 4, 'Konstruksi Kayu', 16, '240', '-', '-', '-', '2018-03-15 02:31:50', '2018-03-14 19:31:52', '2018-03-14 19:31:52'),
(9, 4, 'Mebel/Furniture', 16, '240', '-', '-', '-', '2018-08-10 16:59:59', '2018-03-14 19:32:21', '2018-03-14 21:23:58'),
(10, 4, 'Finishing', 16, '240', '-', '-', '-', '2018-03-15 02:32:36', '2018-03-14 19:32:38', '2018-03-14 19:32:38'),
(11, 5, 'Office Tools', 16, '240', 'SETELAH MENGIKUTI PELATIHAN PESERTA MAMPU: \r\n1. MENERAPKAN PROSEDUR KESEHATAN, KESELAMATAN, DAN KEAMANAN KERJA \r\n2. MENGOPERASIKAN PROGRAM SOFTWARE: PENGOLAH KATA, LEMBAR SEBAR, PRESENTASI \r\n3. MELAKUKAN PENCETAKAN DOKUMEN \r\n4. MELAKUKAN PEMELIHARAAN', '1. MENGETIK PADA PAPAN KETIK STANDAR \r\n2. MENGOPERASIKAN KOMPUTER YANG BERDIRI SENDIRI \r\n3. MENGOPERASIKAN PRINTER \r\n4. MENGOPERASIKAN SISTEM OPERASI MICROSOFT WINDOWS \r\n5. MENGOPERASIKAN PIRANTI LUNAK PENGOLAH KATA TINGKAT DASAR \r\n6. MENGOPERASIKAN PIRANTI LUNAK LEMBAR SEBAR TINGKAT DASAR \r\n7. MENGOPERASIKAN PIRANTI LUNAK PRESENTASI \r\n8. MENGOPERASIKAN PIRANTI LUNAK PENGOLAH KATA TINGKAT MAJU \r\n9. MENGOPERASIKAN PIRANTI LUNAK SEBAR TINGKAT MAJU', '- PENDIDIKAN SMA SEDERAJAT \r\n- USIA 18 - 35 TAHUN \r\n- LAKI-LAKI/PEREMPUAN \r\n- TIDAK BUTA WARNA \r\n- SEHAT JASMANI DAN ROHANI \r\n- LULUS SELEKSI', '2018-08-24 16:59:59', '2018-03-14 19:45:54', '2018-03-14 21:22:10'),
(12, 5, 'Graphic Design', 16, '240', '-', '-', '-', '2018-03-15 02:54:55', '2018-03-14 19:54:58', '2018-03-14 19:54:58'),
(13, 6, 'Pengolahan Hasil Pertanian', 16, '240', 'SETELAH SELESAI MENGIKUTI PELATIHAN PESERTA MAMPU: \r\n1. MENGIDENTIFIKASI BAHAN/KOMODITAS PANGAN \r\n2. MENGIDENTIFIKASI PERALATAN YANG DIGUNAKAN \r\n3. MENGIKUTI PROSEDUR MENJAGA KESEHATAN DAN KESELAMATAN KERJA (K3) \r\n4. KEWIRAUSAHAAN \r\n5. MELAKUKAN PROSES PEMBUATAN SUSU KEDELAI \r\n6. MELAKUKAN PROSES PRODUKSI ROTI \r\n7. MENYIAPKAN DAN MEMBUAT KUE \r\n8. MENYIAPKAN DAN MEMBUAT SALAD (GADO-GADO, PECEL, URAP, RUJAK, DAN SEJENISNYA) \r\n9. MENYIAPKAN DAN MEMBUAT ADONAN BERAGI \r\n10. MEMPRODUKSI MANISAN BUAH', 'MENGIDENTIFIKASI BAHAN/KOMODITAS PERTANIAN \r\n2. MENGIDENTIFIKASI PERALATAN YANG DIGUNAKAN \r\n3. MENGIKUTI PROSEDUR MENJAGA KESEHATAN DAN KESELAMATAN KERJA \r\n4. KEWIRAUSAHAAN \r\n5. MEMBUAT MAKANAN DARI ADONAN BERAGI \r\n6. MENYIAPKAN DAN MEMBUAT KUE \r\n7. MEMASAK ANEKA MASAKAN IKAN LAUT', '- PENDIDIKAN MINIMAL SMP SEDERAJAT \r\n- USIA MINIMAL 17 TAHUN \r\n- SEHAT JASMANI DAN ROHANI \r\n- LULUS SELEKSI', '2018-08-10 16:59:59', '2018-03-14 19:56:58', '2018-03-14 21:22:45'),
(14, 6, 'Pengolahan Hasil Perikanan', 16, '240', '-', '-', '-', '2018-03-15 02:58:05', '2018-03-14 19:58:07', '2018-03-14 19:58:07'),
(15, 6, 'Mixed Farming', 16, '240', '-', '-', '-', '2018-03-15 02:58:54', '2018-03-14 19:58:58', '2018-03-14 19:58:58'),
(16, 7, 'Menjahit', 16, '240', 'SETELAH MENGIKUTI PELATIHAN, PESERTA MAMPU MENGUKUR BADAN, MEMBUAT POLA PAKAIAN, MERENCANAKAN KEBUTUHAN BAHAN PAKAIAN, MEMOTONG BAHAN PAKAIAN DAN MENJAHIT DENGAN MESIN.', '1. MENGUKUR BADAN \r\n2. MEMBUAT POLA PAKAIAN I \r\n3. MEMBUAT POLA PAKAIAN II \r\n4. MERENCANAKAN KEBUTUHAN BAHAN PAKAIAN \r\n5. MEMOTONG BAHAN PAKAIAN \r\n6. MENJAHIT DENGAN MESIN II', '- PENDIDIKAN MINIMAL SD \r\n- USIA 17 - 40 TAHUN \r\n- PRIA DAN WANITA \r\n- SEHAT JASMANI DAN ROHANI \r\n- LULUS SELEKSI', '2018-08-10 16:59:59', '2018-03-14 20:00:01', '2018-03-14 21:21:31'),
(17, 7, 'Teknik Batik Tulis', 16, '240', '-', '-', '-', '2018-03-15 03:00:47', '2018-03-14 20:00:49', '2018-03-14 20:00:49'),
(18, 7, 'Sablon', 16, '160', '-', '-', '-', '2018-03-15 03:01:37', '2018-03-14 20:01:40', '2018-03-14 20:01:40'),
(19, 7, 'Kecantikan', 16, '160', '-', '-', '-', '2018-03-15 03:02:16', '2018-03-14 20:02:25', '2018-03-14 20:02:25'),
(20, 8, 'Bahasa Inggris', 16, '240', '-', '-', '-', '2018-08-24 16:59:59', '2018-03-14 20:42:13', '2018-03-14 21:20:39');

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
(1, '12345678', 'Dewi Anisa Istiqomah', 'dewianisaist@gmail.com', '$2y$10$/Gt5a7PjYJceUvNSwJ9YCeJLNPogK6MCRcm2MrcLp22Sg2.KSOVVe', 'v6T6YMkRNM0E5HOiVQsH9KbFy76DMgI3uOWXFoSFJd16Q2rIHrNhrqYT3Si5', '2018-01-26 20:23:49', '2018-03-14 20:33:51'),
(2, '196408021983032001', 'Siti Astuti S.E.', 'test1@test.com', '$2y$10$eJe79LR5pDuJWN7t0hmIr.6Fa.Rk3bw9jJeRPNXxZut0vGiXOmDi.', NULL, '2018-03-14 05:48:13', '2018-03-14 05:49:50'),
(3, '196307171989032004', 'Sukartini, B.Sc.', 'test2@test.com', '$2y$10$/qEVtU2eAL/2nGWCmFC/zuohyhlBrvkcaRoH9Dwj4Bmzo2buGuRKq', NULL, '2018-03-14 05:49:37', '2018-03-14 05:50:18'),
(4, '196112161981031002', 'Indriyono, S.Pd.', 'test3@test.com', '$2y$10$d.gFdwdmSx0yvJ9MLIhnIuRiyF7ixJ482FwfoaiJNr42mqgKxZvki', NULL, '2018-03-14 05:51:43', '2018-03-14 05:51:43'),
(5, '196101031982031008', 'Slamet Triraharjo, S.Pd.', 'test4@test.com', '$2y$10$B4Nugd.mt/QCfj18qQIX1up/aGVdXmWAmPeFGEyK.kYLQEvhSFSwu', NULL, '2018-03-14 05:53:12', '2018-03-14 08:59:07'),
(6, '196212141985032009', 'Sukiyem', 'test5@test.com', '$2y$10$PZa8pMNLtwZBG9jG1ZQK/.XMoXDc5.fDC.h8Ff6dW/WHZwcNoj3U2', NULL, '2018-03-14 05:54:09', '2018-03-14 05:54:09'),
(7, '196204041983031023', 'Sumaryanto, S.Pd.', 'test6@test.com', '$2y$10$Gb0YMtakF0tqfLwMWUY1.Onv70JBbr3Nxa6B931DbhGQVAgEfumbm', NULL, '2018-03-14 08:58:49', '2018-03-14 08:58:49'),
(8, '196211011983031009', 'PC. Toto Sudarjanto, S.Pd.', 'test7@test.com', '$2y$10$qQYwr.VfjphSh9j6TX3/GeZM4BtvkVtA0F6vKkvVUDiuwVsbUqu8e', NULL, '2018-03-14 09:01:55', '2018-03-14 09:01:55'),
(9, '196501021986031010', 'Sukasno, S.Pd.', 'test8@test.com', '$2y$10$wNq0oxLI/RkRcU8g8E6/Iu5aWKkniKFRo/CI9xA6V4kHxakqJWmry', NULL, '2018-03-14 09:03:08', '2018-03-14 09:03:08'),
(10, '197512092010011007', 'Saryanto, S.T.', 'test9@test.com', '$2y$10$KDztZbgRRrKFfoA2Wov2IuJ3/CHb7tDy0XjOM8X8JaDA5bxF.pcDa', NULL, '2018-03-14 09:04:28', '2018-03-14 09:04:28');

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
(1, 'Teknologi Mekanik', '-', '2018-03-14 19:20:58', '2018-03-14 19:21:12'),
(2, 'Otomotif', '-', '2018-03-14 19:21:23', '2018-03-14 19:21:23'),
(3, 'Listrik', '-', '2018-03-14 19:21:36', '2018-03-14 19:21:36'),
(4, 'Bangunan', '-', '2018-03-14 19:21:46', '2018-03-14 19:21:46'),
(5, 'Teknik Informasi dan Komunikasi', '-', '2018-03-14 19:22:05', '2018-03-14 19:22:05'),
(6, 'Pertanian', '-', '2018-03-14 19:23:03', '2018-03-14 19:23:03'),
(7, 'Aneka Kejuruan', '-', '2018-03-14 19:23:37', '2018-03-14 19:23:37'),
(8, 'Bisnis dan Manajemen', '-', '2018-03-14 20:41:56', '2018-03-14 20:41:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `choice`
--
ALTER TABLE `choice`
  ADD PRIMARY KEY (`user_id`,`criteria_id`,`option`,`suggestion`),
  ADD KEY `fk_criterias_has_users_users1_idx` (`user_id`),
  ADD KEY `fk_criterias_has_users_criterias1_idx` (`criteria_id`);

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
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`,`registrant_id`,`sub_vocational_id`),
  ADD KEY `fk_registration_registrants1_idx` (`registrant_id`),
  ADD KEY `fk_registration_sub_vocationals1_idx` (`sub_vocational_id`);

--
-- Indexes for table `result_selection`
--
ALTER TABLE `result_selection`
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
  ADD PRIMARY KEY (`id`,`registration_id`,`selection_schedule_id`),
  ADD KEY `fk_selections_selection_schedules1_idx` (`selection_schedule_id`),
  ADD KEY `fk_selections_registrations1_idx` (`registration_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `educational_background`
--
ALTER TABLE `educational_background`
  MODIFY `registrant_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `registrants`
--
ALTER TABLE `registrants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `vocationals`
--
ALTER TABLE `vocationals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `choice`
--
ALTER TABLE `choice`
  ADD CONSTRAINT `fk_criterias_has_users_criterias1` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_criterias_has_users_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `fk_registration_registrants1` FOREIGN KEY (`registrant_id`) REFERENCES `registrants` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_registration_sub_vocationals1` FOREIGN KEY (`sub_vocational_id`) REFERENCES `sub_vocationals` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `result_selection`
--
ALTER TABLE `result_selection`
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
  ADD CONSTRAINT `fk_selections_registrations1` FOREIGN KEY (`registration_id`) REFERENCES `registrations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
