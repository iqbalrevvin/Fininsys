-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09 Apr 2019 pada 16.06
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fininsys`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_peserta_didik`
--

CREATE TABLE `detail_peserta_didik` (
  `idDetail_pd` int(111) NOT NULL,
  `idPd` int(111) NOT NULL,
  `idKelas` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `nisn` char(10) NOT NULL,
  `nipd` varchar(15) NOT NULL,
  `pindahan` enum('Ya','Tidak') NOT NULL,
  `tgl_pindah` date NOT NULL,
  `pindah_di_semester` varchar(2) NOT NULL,
  `tidak_naik_kelas` enum('Ya','Tidak') NOT NULL,
  `tidak_naik_semester` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'developer', 'Developer Akses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups_header`
--

CREATE TABLE `groups_header` (
  `id_header_menu` int(11) NOT NULL,
  `id_groups` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `groups_header`
--

INSERT INTO `groups_header` (`id_header_menu`, `id_groups`) VALUES
(0, 1),
(1, 1),
(1, 3),
(2, 1),
(2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups_menu`
--

CREATE TABLE `groups_menu` (
  `id_groups` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `groups_menu`
--

INSERT INTO `groups_menu` (`id_groups`, `id_menu`) VALUES
(1, 83),
(1, 85),
(1, 86),
(2, 86),
(1, 91),
(2, 91),
(1, 90),
(2, 90),
(1, 87),
(2, 87),
(1, 88),
(2, 88),
(1, 89),
(2, 89),
(1, 92),
(1, 94),
(1, 96),
(1, 93),
(1, 99),
(3, 99),
(1, 100),
(3, 100),
(3, 94),
(3, 96),
(3, 83),
(3, 85),
(3, 92),
(3, 93),
(1, 101),
(3, 101),
(1, 102),
(3, 102),
(1, 103),
(3, 103),
(1, 104),
(3, 104),
(1, 105),
(3, 105),
(1, 106),
(3, 106),
(1, 108),
(3, 108),
(1, 109),
(3, 109),
(1, 110),
(3, 110),
(1, 111),
(3, 111),
(1, 112),
(3, 112),
(1, 113),
(3, 113),
(1, 114),
(3, 114),
(1, 115),
(3, 115),
(1, 116),
(3, 116),
(1, 117),
(3, 117),
(1, 118),
(3, 118),
(1, 119),
(3, 119),
(1, 120),
(3, 120),
(1, 121),
(3, 121),
(1, 122),
(3, 122),
(1, 123),
(3, 123);

-- --------------------------------------------------------

--
-- Struktur dari tabel `header_menu`
--

CREATE TABLE `header_menu` (
  `id_header_menu` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `header` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `header_menu`
--

INSERT INTO `header_menu` (`id_header_menu`, `sort`, `header`) VALUES
(1, 1, 'Konfigurasi'),
(2, 2, 'Master Data');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `idKelas` int(11) NOT NULL,
  `idProdi` int(11) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `id_header_menu` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `url` varchar(150) NOT NULL,
  `menu_id` varchar(150) NOT NULL,
  `level_one` int(11) NOT NULL DEFAULT '0',
  `level_two` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `sort`, `id_header_menu`, `label`, `icon`, `url`, `menu_id`, `level_one`, `level_two`) VALUES
(83, 1, 1, 'Dashboard', 'dashboard', 'config/index', '', 0, 0),
(85, 3, 1, 'Autentikasi', 'lock', '#', '', 0, 0),
(92, 5, 1, 'Menu Management', 'list-2', '#', 'menu-menu', 0, 0),
(93, 6, 1, 'Pengaturan Aplikasi', 'cogwheel', 'config/settings', '', 0, 0),
(94, 1, 1, 'Pengguna', 'user', 'config/users', '', 85, 0),
(96, 3, 1, 'Hak Akses', 'users', 'config/groups', '', 85, 0),
(99, 1, 1, 'Menu Management', 'list', 'config/header_menu', '', 92, 0),
(100, 2, 1, 'Icon', 'lifebuoy', 'config/icon', '', 92, 0),
(101, 0, 2, 'Lembaga', 'buildings', '#', '', 0, 0),
(102, 1, 2, 'Data Sekolah', 'home', 'Sekolah', '', 101, 0),
(103, 2, 2, 'Data Ponpes', 'home', 'Ponpes', '', 101, 0),
(104, 2, 2, 'Sekolah', 'home-1', '#', '', 0, 0),
(105, 1, 2, 'Program Studi', 'interface-9', 'prodi', '', 104, 0),
(106, 2, 2, 'Kelas', 'home', 'kelas', '', 104, 0),
(108, 3, 2, 'Akademik', 'edit-1', '#', '', 0, 0),
(109, 1, 2, 'Kurikulum', 'tabs', 'kurikulum', '', 108, 0),
(110, 2, 2, 'Ekstrakulikuler', 'music', 'ekstrakulikuler', '', 108, 0),
(111, 3, 2, 'Mata Pelajaran', 'list', 'matpel', '', 108, 0),
(112, 4, 2, 'Peserta Didik', 'users', '#', '', 0, 0),
(113, 1, 2, 'Data Peserta Didik', 'users', 'pesertadidik', '', 112, 0),
(114, 5, 2, 'Tenaga Pendidik', 'users-1', '#', '', 0, 0),
(115, 1, 2, 'Data Tenaga Pendidik', 'users-1', '', 'tenagapendidik', 114, 0),
(116, 3, 2, 'Jabatan Struktural', 'medal', 'jabatan', '', 104, 0),
(117, 6, 2, 'Data Pendukung', 'cogwheel-2', '#', '', 0, 0),
(118, 0, 2, 'Data Alamat', 'map-location', '#', '', 117, 0),
(119, 1, 2, 'Data Desa', 'placeholder-3', 'datadesa', '', 117, 118),
(120, 2, 2, 'Data Kecamatan', 'placeholder-3', 'datakecamatan', '', 117, 118),
(121, 3, 2, 'Data Kab/Kota', 'placeholder-3', 'datakabupaten', '', 117, 118),
(122, 4, 2, 'Data Provinsi', 'placeholder-3', 'dataprovinsi', '', 117, 118),
(123, 2, 2, 'Data Pekerjaan', 'presentation', 'datapekerjaan', '', 117, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ortu_peserta_didik`
--

CREATE TABLE `ortu_peserta_didik` (
  `idOrtu_pd` int(111) NOT NULL,
  `idPd` int(111) NOT NULL,
  `NIK_ayah` char(16) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `tahun_lahir_ayah` char(4) NOT NULL,
  `pendidikan_ayah` varchar(10) NOT NULL,
  `pekerjaan_ayah` varchar(50) NOT NULL,
  `penghasilan_ayah` varchar(100) NOT NULL,
  `NIK_ibu` char(16) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `tahun_lahir_ibu` char(4) NOT NULL,
  `pendidikan_ibu` varchar(10) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `penghasilan_ibu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta_didik`
--

CREATE TABLE `peserta_didik` (
  `idPd` int(111) NOT NULL,
  `NIK_pd` char(16) NOT NULL,
  `nama_pd` varchar(100) NOT NULL,
  `jk_pd` enum('Laki-Laki','Perempuan') NOT NULL,
  `tempat_lahir_pd` varchar(50) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `no_telp_pd` varchar(14) NOT NULL,
  `email_pd` varchar(100) NOT NULL,
  `foto_pd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_studi`
--

CREATE TABLE `program_studi` (
  `idProdi` int(11) NOT NULL,
  `idSekolah` int(11) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL,
  `singkatan_prodi` varchar(50) NOT NULL,
  `jumlah_semester` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

CREATE TABLE `sekolah` (
  `idSekolah` int(11) NOT NULL,
  `jenjang_sekolah` enum('SD','SMP','SMA','SMK') NOT NULL,
  `npsn` int(11) NOT NULL,
  `nama_sekolah` int(11) NOT NULL,
  `alamat_sekolah` varchar(100) NOT NULL,
  `desa_sekolah` varchar(50) NOT NULL,
  `kecamatan_sekolah` varchar(50) NOT NULL,
  `kabupaten_sekolah` varchar(50) NOT NULL,
  `provinsi_sekolah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id_settings` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `instansi` varchar(150) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `logo` varchar(150) NOT NULL,
  `versi` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id_settings`, `judul`, `instansi`, `alamat`, `logo`, `versi`) VALUES
(1, 'Fininsys', 'Rasana Rasyidah', 'kampung Buleud rt 04 rw 04 desa Cintadamai kecamatan Sukaresmi Garut - Jawa Barat.', 'aa493-yayasan-fiks.jpg', '1.0.0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `photo`, `phone`) VALUES
(1, '127.0.0.1', 'admin', '$2y$08$v.Lr4yujxQxzZNdmCpgJWu7WLR5hzFDxkh0mRRmSuBartWDE93ySO', '', 'admin@admin.com', NULL, 'asGsHoh0iWTpOuVLM.EMUO900526bdd0557906ac', 1421981304, NULL, 1268889823, 1554394235, 1, 'Administrator', '-', '9a7eb-ketua-yayasan.jpg', '1234567890'),
(2, '::1', 'iqbalrevvin', '$2y$08$f/k81A2BSMWDketqFDGro.oO4jp0qfX2WZLMpCqgc5YAwaMnYqIs2', NULL, 'iqbalrevvin@gmail.com', NULL, NULL, NULL, NULL, 1554396817, 1554799049, 1, 'Iqbal', 'Revvin', '2c158-iqbal.png', '081223142314');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(8, 1, 1),
(10, 2, 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_header_menu`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_header_menu` (
`id_groups` int(11)
,`id_header_menu` int(11)
,`header` varchar(50)
,`sort` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_menu`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_menu` (
`id_groups` int(11)
,`id_menu` int(11)
,`sort` int(11)
,`id_header_menu` int(11)
,`label` varchar(50)
,`icon` varchar(50)
,`url` varchar(150)
,`menu_id` varchar(150)
,`level_one` int(11)
,`level_two` int(11)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_header_menu`
--
DROP TABLE IF EXISTS `view_header_menu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_header_menu`  AS  select `gh`.`id_groups` AS `id_groups`,`hm`.`id_header_menu` AS `id_header_menu`,`hm`.`header` AS `header`,`hm`.`sort` AS `sort` from (`groups_header` `gh` join `header_menu` `hm` on((`gh`.`id_header_menu` = `hm`.`id_header_menu`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_menu`
--
DROP TABLE IF EXISTS `view_menu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_menu`  AS  select `gm`.`id_groups` AS `id_groups`,`m`.`id_menu` AS `id_menu`,`m`.`sort` AS `sort`,`m`.`id_header_menu` AS `id_header_menu`,`m`.`label` AS `label`,`m`.`icon` AS `icon`,`m`.`url` AS `url`,`m`.`menu_id` AS `menu_id`,`m`.`level_one` AS `level_one`,`m`.`level_two` AS `level_two` from (`groups_menu` `gm` join `menu` `m` on((`gm`.`id_menu` = `m`.`id_menu`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_peserta_didik`
--
ALTER TABLE `detail_peserta_didik`
  ADD PRIMARY KEY (`idDetail_pd`),
  ADD UNIQUE KEY `nisn` (`nisn`),
  ADD UNIQUE KEY `nipd` (`nipd`),
  ADD KEY `idPd` (`idPd`),
  ADD KEY `idKelas` (`idKelas`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header_menu`
--
ALTER TABLE `header_menu`
  ADD PRIMARY KEY (`id_header_menu`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`idKelas`),
  ADD KEY `idProdi` (`idProdi`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `ortu_peserta_didik`
--
ALTER TABLE `ortu_peserta_didik`
  ADD PRIMARY KEY (`idOrtu_pd`),
  ADD UNIQUE KEY `NIK_ayah` (`NIK_ayah`),
  ADD KEY `idPd` (`idPd`),
  ADD KEY `NIK_ibu` (`NIK_ibu`);

--
-- Indexes for table `peserta_didik`
--
ALTER TABLE `peserta_didik`
  ADD PRIMARY KEY (`idPd`);

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`idProdi`),
  ADD KEY `idSekolah` (`idSekolah`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`idSekolah`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id_settings`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_peserta_didik`
--
ALTER TABLE `detail_peserta_didik`
  MODIFY `idDetail_pd` int(111) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `header_menu`
--
ALTER TABLE `header_menu`
  MODIFY `id_header_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `idKelas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `ortu_peserta_didik`
--
ALTER TABLE `ortu_peserta_didik`
  MODIFY `idOrtu_pd` int(111) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peserta_didik`
--
ALTER TABLE `peserta_didik`
  MODIFY `idPd` int(111) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_studi`
--
ALTER TABLE `program_studi`
  MODIFY `idProdi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `idSekolah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id_settings` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_peserta_didik`
--
ALTER TABLE `detail_peserta_didik`
  ADD CONSTRAINT `detail_peserta_didik_ibfk_1` FOREIGN KEY (`idPd`) REFERENCES `peserta_didik` (`idPd`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_peserta_didik_ibfk_4` FOREIGN KEY (`idKelas`) REFERENCES `kelas` (`idKelas`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`idProdi`) REFERENCES `program_studi` (`idProdi`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ortu_peserta_didik`
--
ALTER TABLE `ortu_peserta_didik`
  ADD CONSTRAINT `ortu_peserta_didik_ibfk_1` FOREIGN KEY (`idPd`) REFERENCES `peserta_didik` (`idPd`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `program_studi`
--
ALTER TABLE `program_studi`
  ADD CONSTRAINT `program_studi_ibfk_1` FOREIGN KEY (`idSekolah`) REFERENCES `sekolah` (`idSekolah`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
