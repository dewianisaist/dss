-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 13, 2017 at 06:16 AM
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
-- Table structure for table `jadwal_seleksi`
--

CREATE TABLE `jadwal_seleksi` (
  `seleksi_id` int(11) NOT NULL,
  `sub_kejuruan_id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` varchar(20) DEFAULT NULL,
  `tempat` varchar(100) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kejuruan`
--

CREATE TABLE `kejuruan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

CREATE TABLE `kursus` (
  `id` int(11) NOT NULL,
  `jurusan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `jenis_kelamin` tinyint(1) DEFAULT NULL COMMENT '1. Laki-laki\n2. Perempuan',
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `anak_ke` tinyint(2) DEFAULT NULL,
  `jumlah_saudara` tinyint(2) DEFAULT NULL,
  `agama` tinyint(1) DEFAULT NULL COMMENT '1. Islam\n2. Katolik\n3. Kristen\n4. Hindu\n5. Budha\n6. Konghucu',
  `nama_ibu_kandung` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `pendaftar_id` int(11) NOT NULL,
  `sub_kejuruan_id` int(11) NOT NULL,
  `tanggal_mendaftar` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int(11) NOT NULL,
  `jenjang` varchar(50) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pengalaman_kursus`
--

CREATE TABLE `pengalaman_kursus` (
  `pendaftar_id` int(11) NOT NULL,
  `kursus_id` int(11) NOT NULL,
  `penyelenggara` varchar(100) DEFAULT NULL,
  `tahun_lulus` year(4) DEFAULT NULL
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
(1, 'role-list', 'Menampilkan daftar Role', 'Hanya melihat daftar Role', '2017-10-12 21:13:44', '2017-10-12 21:13:44'),
(2, 'role-create', 'Membuat Role', 'Membuat Role baru', '2017-10-12 21:13:44', '2017-10-12 21:13:44'),
(3, 'role-edit', 'Edit Role', 'Edit Role', '2017-10-12 21:13:44', '2017-10-12 21:13:44'),
(4, 'role-delete', 'Hapus Role', 'Hapus Role', '2017-10-12 21:13:44', '2017-10-12 21:13:44'),
(5, 'item-list', 'Menampilkan daftar Item', 'Hanya melihat daftar Item', '2017-10-12 21:13:44', '2017-10-12 21:13:44'),
(6, 'item-create', 'Membuat Item', 'Membuat Item baru', '2017-10-12 21:13:44', '2017-10-12 21:13:44'),
(7, 'item-edit', 'Edit Item', 'Edit Item', '2017-10-12 21:13:44', '2017-10-12 21:13:44'),
(8, 'item-delete', 'Hapus Item', 'Hapus Item', '2017-10-12 21:13:44', '2017-10-12 21:13:44');

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
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pendidikan`
--

CREATE TABLE `riwayat_pendidikan` (
  `pendaftar_id` int(11) NOT NULL,
  `pendidikan_id` int(11) NOT NULL,
  `nama_institusi` varchar(100) DEFAULT NULL,
  `tahun_lulus` year(4) DEFAULT NULL
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
(2, 'Staf', 'Staf', 'Staf bertugas sebagai admin', '2017-10-12 21:14:37', '2017-10-12 21:14:37'),
(3, 'Kepala', 'Kepala BLK', 'Kepala BLK bertugas sebagai pembuat keputusan', '2017-10-12 21:15:13', '2017-10-12 21:15:13');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `seleksi`
--

CREATE TABLE `seleksi` (
  `id` int(11) NOT NULL,
  `pendaftar_id` int(11) NOT NULL,
  `nilai_tertulis` varchar(45) DEFAULT NULL,
  `nilai_wawancara` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sub_kejuruan`
--

CREATE TABLE `sub_kejuruan` (
  `id` int(11) NOT NULL,
  `kejuruan_id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `kuota` varchar(10) DEFAULT NULL,
  `lama_pelatihan` varchar(10) DEFAULT NULL,
  `tujuan` varchar(500) DEFAULT NULL,
  `unit_kompetensi` varchar(500) DEFAULT NULL,
  `persyaratan_peserta` varchar(500) DEFAULT NULL,
  `tanggal_akhir_pendaftaran` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `pendaftar_id` int(11) NOT NULL,
  `pas_foto` varchar(255) DEFAULT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  `ijazah_terakhir` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `no_identitas` varchar(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `no_identitas`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '12345678', 'Dewi', 'dewi@tes.com', '$2y$10$QDG9mohLPkJwkY.S8gQZxuaXgq5KqRQY5MtTDm1o.c0', NULL, '2017-10-12 21:15:56', '2017-10-12 21:15:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal_seleksi`
--
ALTER TABLE `jadwal_seleksi`
  ADD PRIMARY KEY (`seleksi_id`,`sub_kejuruan_id`),
  ADD KEY `fk_seleksi_has_sub_kejuruan_sub_kejuruan1_idx` (`sub_kejuruan_id`),
  ADD KEY `fk_seleksi_has_sub_kejuruan_seleksi1_idx` (`seleksi_id`);

--
-- Indexes for table `kejuruan`
--
ALTER TABLE `kejuruan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id`,`users_id`),
  ADD KEY `fk_pendaftar_users1_idx` (`users_id`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`pendaftar_id`,`sub_kejuruan_id`),
  ADD KEY `fk_pendaftar_has_sub_kejuruan_sub_kejuruan1_idx` (`sub_kejuruan_id`),
  ADD KEY `fk_pendaftar_has_sub_kejuruan_pendaftar1_idx` (`pendaftar_id`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengalaman_kursus`
--
ALTER TABLE `pengalaman_kursus`
  ADD PRIMARY KEY (`pendaftar_id`,`kursus_id`),
  ADD KEY `fk_pendaftar_has_kursus_kursus1_idx` (`kursus_id`),
  ADD KEY `fk_pendaftar_has_kursus_pendaftar1_idx` (`pendaftar_id`);

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
-- Indexes for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  ADD PRIMARY KEY (`pendaftar_id`,`pendidikan_id`),
  ADD KEY `fk_pendaftar_has_pendidikan_pendidikan1_idx` (`pendidikan_id`),
  ADD KEY `fk_pendaftar_has_pendidikan_pendaftar1_idx` (`pendaftar_id`);

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
-- Indexes for table `seleksi`
--
ALTER TABLE `seleksi`
  ADD PRIMARY KEY (`id`,`pendaftar_id`),
  ADD KEY `fk_seleksi_pendaftar1_idx` (`pendaftar_id`);

--
-- Indexes for table `sub_kejuruan`
--
ALTER TABLE `sub_kejuruan`
  ADD PRIMARY KEY (`id`,`kejuruan_id`),
  ADD KEY `fk_sub_kejuruan_kejuruan1_idx` (`kejuruan_id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`,`pendaftar_id`),
  ADD KEY `fk_upload_pendaftar1_idx` (`pendaftar_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `no_identitas_UNIQUE` (`no_identitas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kejuruan`
--
ALTER TABLE `kejuruan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kursus`
--
ALTER TABLE `kursus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sub_kejuruan`
--
ALTER TABLE `sub_kejuruan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_seleksi`
--
ALTER TABLE `jadwal_seleksi`
  ADD CONSTRAINT `fk_seleksi_has_sub_kejuruan_seleksi1` FOREIGN KEY (`seleksi_id`) REFERENCES `seleksi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_seleksi_has_sub_kejuruan_sub_kejuruan1` FOREIGN KEY (`sub_kejuruan_id`) REFERENCES `sub_kejuruan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD CONSTRAINT `fk_pendaftar_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `fk_pendaftar_has_sub_kejuruan_pendaftar1` FOREIGN KEY (`pendaftar_id`) REFERENCES `pendaftar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pendaftar_has_sub_kejuruan_sub_kejuruan1` FOREIGN KEY (`sub_kejuruan_id`) REFERENCES `sub_kejuruan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pengalaman_kursus`
--
ALTER TABLE `pengalaman_kursus`
  ADD CONSTRAINT `fk_pendaftar_has_kursus_kursus1` FOREIGN KEY (`kursus_id`) REFERENCES `kursus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pendaftar_has_kursus_pendaftar1` FOREIGN KEY (`pendaftar_id`) REFERENCES `pendaftar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `fk_roles_has_permissions_permissions1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_roles_has_permissions_roles1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  ADD CONSTRAINT `fk_pendaftar_has_pendidikan_pendaftar1` FOREIGN KEY (`pendaftar_id`) REFERENCES `pendaftar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pendaftar_has_pendidikan_pendidikan1` FOREIGN KEY (`pendidikan_id`) REFERENCES `pendidikan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `fk_roles_has_users_roles1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_roles_has_users_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seleksi`
--
ALTER TABLE `seleksi`
  ADD CONSTRAINT `fk_seleksi_pendaftar1` FOREIGN KEY (`pendaftar_id`) REFERENCES `pendaftar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sub_kejuruan`
--
ALTER TABLE `sub_kejuruan`
  ADD CONSTRAINT `fk_sub_kejuruan_kejuruan1` FOREIGN KEY (`kejuruan_id`) REFERENCES `kejuruan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `upload`
--
ALTER TABLE `upload`
  ADD CONSTRAINT `fk_upload_pendaftar1` FOREIGN KEY (`pendaftar_id`) REFERENCES `pendaftar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
