-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2021 at 03:17 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hubsoe`
--

-- --------------------------------------------------------

--
-- Table structure for table `daerah`
--

CREATE TABLE `daerah` (
  `id` int(11) NOT NULL,
  `daerah_name` varchar(100) NOT NULL,
  `negeri` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daerah`
--

INSERT INTO `daerah` (`id`, `daerah_name`, `negeri`) VALUES
(1, 'Bachok', 1),
(2, 'Gua Musang', 1),
(3, 'Jeli', 1),
(4, 'Kota Bharu', 1),
(5, 'Kuala Krai', 1),
(6, 'Machang', 1),
(7, 'Pasir Mas', 1),
(8, 'Pasir Putih', 1),
(9, 'Tanah Merah', 1),
(10, 'Tumpat', 1),
(11, 'Wakaf Bharu', 1),
(12, 'Marang', 13),
(13, 'Ketereh', 1),
(14, 'Jerteh', 13),
(15, 'Paka', 13),
(16, 'Kuala Berang', 13),
(17, 'Johor Bahru', 2),
(18, 'Tebrau', 2),
(19, 'Pasir Gudang', 2),
(20, 'Bukit Indah', 2),
(21, 'Skudai', 2),
(22, 'Kluang', 2),
(23, 'Batu Pahat', 2),
(24, 'Muar', 2),
(25, 'Ulu Tiram', 2),
(26, 'Senai', 2),
(27, 'Segamat', 2),
(28, 'Kulai', 2),
(29, 'Kota Tinggi', 2),
(30, 'Pontian Kechil', 2),
(31, 'Tangkak', 2),
(32, 'Bukit Bakri', 2),
(33, 'Yong Peng', 2),
(34, 'Pekan Nenas', 2),
(35, 'Labis', 2),
(36, 'Mersing', 2),
(37, 'Simpang Renggam', 2),
(38, 'Parit Raja', 2),
(39, 'Kelapa Sawit', 2),
(40, 'Buloh Kasap', 2),
(41, 'Chaah', 2),
(42, 'Sungai Petani', 3),
(43, 'Alor Setar', 3),
(44, 'Kulim', 3),
(45, 'Jitra', 3),
(46, 'Baling', 3),
(47, 'Pendang', 3),
(48, 'Langkawi', 3),
(49, 'Yan', 3),
(50, 'Sik', 3),
(51, 'Kuala Nerang', 3),
(52, 'Pokok Sena', 3),
(53, 'Bandar Baharu', 3),
(54, 'Kuala Terengganu', 13),
(55, 'Chukai', 13),
(56, 'Dungun', 13),
(57, 'Kerteh', 13),
(58, 'Bandaraya Melaka', 4),
(59, 'Bukit Baru', 4),
(60, 'Ayer Keroh', 4),
(61, 'Klebang', 4),
(62, 'Masjid Tanah', 4),
(63, 'Sungai Udang', 4),
(64, 'Batu Berendam', 4),
(65, 'Alor Gajah', 4),
(66, 'Bukit Rambai', 4),
(67, 'Ayer Molek', 4),
(68, 'Bemban', 4),
(69, 'Kuala Sungai Baru', 4),
(70, 'Pulau Sebang', 4),
(71, 'Seremban', 5),
(72, 'Port Dickson', 5),
(73, 'Nilai', 5),
(74, 'Bahau', 5),
(75, 'Tampin', 5),
(76, 'Kuala Pilah', 5),
(77, 'Kuantan', 6),
(78, 'Temerloh', 6),
(79, 'Bentong', 6),
(80, 'Mentakab', 6),
(81, 'Raub', 6),
(82, 'Jerantut', 6),
(83, 'Pekan', 6),
(84, 'Kuala Lipis', 6),
(85, 'Bandar Jengka', 6),
(86, 'Bukit Tinggi', 6),
(106, 'Ipoh', 7),
(107, 'Taiping', 7),
(108, 'Sitiawan', 7),
(109, 'Simpang Empat', 7),
(110, 'Teluk Intan', 7),
(111, 'Batu Gajah', 7),
(112, 'Lumut', 7),
(113, 'Kampung Koh', 7),
(114, 'Kuala Kangsar', 7),
(115, 'Sungai Siput Utara', 7),
(116, 'Tapah', 7),
(117, 'Bidor', 7),
(118, 'Parit Buntar', 7),
(119, 'Ayer Tawar', 7),
(120, 'Bagan Serai', 7),
(121, 'Tanjung Malim', 7),
(122, 'Lawan Kuda Baharu', 7),
(123, 'Pantai Remis', 7),
(124, 'Kampar', 7),
(125, 'Kangar', 8),
(126, 'Kuala Perlis', 8),
(127, 'Bukit Mertajam', 9),
(128, 'Georgetown', 9),
(129, 'Sungai Ara', 9),
(130, 'Gelugor', 9),
(131, 'Air Itam', 9),
(132, 'Butterworth', 9),
(133, 'Val dOr', 9),
(134, 'Perai', 9),
(135, 'Nibong Tebal', 9),
(136, 'Permatang Pauh', 9),
(137, 'Tanjung Tokong', 9),
(138, 'Kepala Batas', 9),
(139, 'Tanjung Bungah', 9),
(140, 'Juru', 9),
(141, 'Kota Kinabalu', 10),
(142, 'Sandakan', 10),
(143, 'Tawau', 10),
(144, 'Lahad Datu', 10),
(145, 'Keningau', 10),
(146, 'Putatan', 10),
(147, 'Donggongon', 10),
(148, 'Semporna', 10),
(149, 'Kudat', 10),
(150, 'Kunak', 10),
(151, 'Papar', 10),
(152, 'Ranau', 10),
(153, 'Beaufort', 10),
(154, 'Kinarut', 10),
(155, 'Kota Belud', 10),
(156, 'Kuching', 11),
(157, 'Miri', 11),
(158, 'Sibu', 11),
(159, 'Bintulu', 11),
(160, 'Limbang', 11),
(161, 'Sarikei', 11),
(162, 'Sri Aman', 11),
(163, 'Kapit', 11),
(164, 'Batu Delapan Bazaar', 11),
(165, 'Kota Samarahan', 11),
(166, 'Subang Jaya', 12),
(167, 'Klang', 12),
(168, 'Ampang Jaya', 12),
(169, 'Shah Alam', 12),
(170, 'Petaling Jaya', 12),
(171, 'Cheras', 12),
(172, 'Kajang', 12),
(173, 'Selayang Baru', 12),
(174, 'Rawang', 12),
(175, 'Taman Greenwood', 12),
(176, 'Semenyih', 12),
(177, 'Banting', 12),
(178, 'Balakong', 12),
(179, 'Gombak Setia', 12),
(180, 'Kuala Selangor', 12),
(181, 'Serendah', 12),
(182, 'Bukit Beruntung', 12),
(183, 'Pengkalan Kundang', 12),
(184, 'Jenjarom', 12),
(185, 'Sungai Besar', 12),
(186, 'Batu Arang', 12),
(187, 'Tanjung Sepat', 12),
(188, 'Kuang', 12),
(189, 'Kuala Kubu Baharu', 12),
(190, 'Batang Berjuntai', 12),
(191, 'Bandar Baru Salak Tinggi', 12),
(192, 'Sekinchan', 12),
(193, 'Sabak', 12),
(194, 'Tanjung Karang', 12),
(195, 'Beranang', 12),
(196, 'Sungai Pelek', 12),
(198, '', 1),
(199, 'Gua Musangsdfsd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `negeri`
--

CREATE TABLE `negeri` (
  `negeri_name` varchar(15) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `negeri`
--

INSERT INTO `negeri` (`negeri_name`, `id`) VALUES
('Kelantan', 1),
('Johor', 2),
('Kedah', 3),
('Melaka', 4),
('Negeri Sembilan', 5),
('Pahang', 6),
('Perak', 7),
('Perlis', 8),
('Pulau Pinang', 9),
('Sabah', 10),
('Sarawak', 11),
('Selangor', 12),
('Terengganu', 13),
('Kuala Lumpur', 14);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`) VALUES
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(225) NOT NULL,
  `postcode` int(7) NOT NULL,
  `city` int(11) NOT NULL,
  `state` varchar(100) NOT NULL,
  `location` varchar(225) NOT NULL,
  `longitude` varchar(225) NOT NULL,
  `latitude` varchar(225) NOT NULL,
  `profile_file` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `user_id`, `age`, `address`, `postcode`, `city`, `state`, `location`, `longitude`, `latitude`, `profile_file`) VALUES
(1, 12, 0, 'Skyhint Enterprise Tingakat Satu', 16100, 4, '1', 'KFC Jalan Pengkalan Chepa, Jalan Pengkalan Chepa, Kota Bharu, Kelantan, Malaysia', '102.2673491', '6.1472444', '60dbc6166e53c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`user_id`, `code`, `created_at`, `type`) VALUES
(11, 'TvPZDhzQFtU4otZ08vF6avHivHUkLktX', 1624895055, 1),
(12, 'HfqIMXYN6AZJqc_u7Sqz8scqbgtVw54f', 1625004492, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usahawan`
--

CREATE TABLE `usahawan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(225) NOT NULL,
  `postcode` varchar(7) NOT NULL,
  `city` int(11) NOT NULL,
  `state` varchar(100) NOT NULL,
  `location` varchar(225) NOT NULL,
  `longitude` varchar(225) NOT NULL,
  `latitude` varchar(225) NOT NULL,
  `profile_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usahawan`
--

INSERT INTO `usahawan` (`id`, `user_id`, `age`, `address`, `postcode`, `city`, `state`, `location`, `longitude`, `latitude`, `profile_file`) VALUES
(1, 11, 26, 'Skyhint Enterprise Tingakat Satu', '16100', 4, '1', 'Edusage Network, Kota Bharu, Kelantan, Malaysia', '102.2764503', '6.1561491', '60dbc3eb2129c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT 0,
  `last_login_at` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `email`, `role`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`, `status`, `password_reset_token`) VALUES
(10, 'superadmin', 'Super Administrator', '', 0, '$2y$10$G2CqfuUqiTshvYmzFbh/seDgLVXbHRvUrb8fu.8UxCHgyaF9vd3pG', '', 1624467684, NULL, NULL, NULL, 1624467474, 1624467474, 0, NULL, 10, ''),
(11, 'iqramrafien21@gmail.com', 'IQRAM RAFIEN', 'iqramrafien21@gmail.com', 1, '$2y$10$u9uqOZjMUbcQleTF0vzOfOIzmfo54rcsMoX0r6WI/WSToQP9EJWqq', 'wAkoWzyn9YtDTWT8M-qTrrHBkpbu88lT', 1624893933, NULL, NULL, '::1', 1624893783, 1624893783, 0, 1625004683, 10, ''),
(12, 'iqramrafien@gmail.com', 'Fakhrul Iqram', 'iqramrafien@gmail.com', 2, '$2y$10$WBb4.a5zRbEwE/hNuZ9vpu2mynXI3RcFXYx7r0QXDjLDQT7X5t5Uu', 'pd_NFm4flNQHaH1RGF3Mkm0GTYixwdlL', NULL, NULL, NULL, '::1', 1625004492, 1625004492, 0, 1625015564, 10, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daerah`
--
ALTER TABLE `daerah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `negeri`
--
ALTER TABLE `negeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Indexes for table `usahawan`
--
ALTER TABLE `usahawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daerah`
--
ALTER TABLE `daerah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `negeri`
--
ALTER TABLE `negeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usahawan`
--
ALTER TABLE `usahawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
