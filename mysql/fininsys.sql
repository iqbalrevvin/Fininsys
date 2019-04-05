-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05 Apr 2019 pada 13.49
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
(3, 103);

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
(101, 2, 2, 'Lembaga', 'buildings', '#', '', 0, 0),
(102, 1, 2, 'Data Sekolah', 'home', 'Sekolah', '', 101, 0),
(103, 2, 2, 'Data Ponpes', 'home', 'Ponpes', '', 101, 0);

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
(2, '::1', 'iqbalrevvin', '$2y$08$f/k81A2BSMWDketqFDGro.oO4jp0qfX2WZLMpCqgc5YAwaMnYqIs2', NULL, 'iqbalrevvin@gmail.com', NULL, NULL, NULL, NULL, 1554396817, 1554398107, 1, 'Iqbal', 'Revvin', '2c158-iqbal.png', '081223142314');

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
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

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
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
