-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2021 at 12:00 AM
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
-- Database: `sic_swiss`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `category` varchar(10) NOT NULL,
  `applicant_name` varchar(225) NOT NULL,
  `nationality` varchar(225) NOT NULL,
  `id_number` varchar(15) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `age` int(11) NOT NULL,
  `phoneNo` varchar(50) NOT NULL,
  `officeNo` varchar(50) NOT NULL,
  `faxNo` varchar(50) NOT NULL,
  `email` varchar(225) NOT NULL,
  `instiBusName` varchar(225) NOT NULL,
  `type` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `logo_file` varchar(225) NOT NULL,
  `project_name` varchar(225) NOT NULL,
  `project_description` text NOT NULL,
  `medium` varchar(10) NOT NULL,
  `reference` varchar(100) DEFAULT NULL,
  `aggrement_disclaimer` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `application_item`
--

CREATE TABLE `application_item` (
  `id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `idNumber` varchar(15) NOT NULL,
  `instiBusName` varchar(225) NOT NULL,
  `phoneNo` varchar(50) NOT NULL,
  `email` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_enName` varchar(100) NOT NULL DEFAULT '',
  `country_enNationality` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_enName`, `country_enNationality`) VALUES
(1, 'AF', 'Afghanistan', 'Afghan'),
(2, 'AL', 'Albania', 'Albanian'),
(3, 'AX', 'Aland Islands', 'Aland Islander'),
(4, 'DZ', 'Algeria', 'Algerian'),
(5, 'AS', 'American Samoa', 'American Samoan'),
(6, 'AD', 'Andorra', 'Andorran'),
(7, 'AO', 'Angola', 'Angolan'),
(8, 'AI', 'Anguilla', 'Anguillan'),
(9, 'AQ', 'Antarctica', 'Antarctican'),
(10, 'AG', 'Antigua and Barbuda', 'Antiguan'),
(11, 'AR', 'Argentina', 'Argentinian'),
(12, 'AM', 'Armenia', 'Armenian'),
(13, 'AW', 'Aruba', 'Aruban'),
(14, 'AU', 'Australia', 'Australian'),
(15, 'AT', 'Austria', 'Austrian'),
(16, 'AZ', 'Azerbaijan', 'Azerbaijani'),
(17, 'BS', 'Bahamas', 'Bahamian'),
(18, 'BH', 'Bahrain', 'Bahraini'),
(19, 'BD', 'Bangladesh', 'Bangladeshi'),
(20, 'BB', 'Barbados', 'Barbadian'),
(21, 'BY', 'Belarus', 'Belarusian'),
(22, 'BE', 'Belgium', 'Belgian'),
(23, 'BZ', 'Belize', 'Belizean'),
(24, 'BJ', 'Benin', 'Beninese'),
(25, 'BL', 'Saint Barthelemy', 'Saint Barthelmian'),
(26, 'BM', 'Bermuda', 'Bermudan'),
(27, 'BT', 'Bhutan', 'Bhutanese'),
(28, 'BO', 'Bolivia', 'Bolivian'),
(29, 'BA', 'Bosnia and Herzegovina', 'Bosnian / Herzegovinian'),
(30, 'BW', 'Botswana', 'Botswanan'),
(31, 'BV', 'Bouvet Island', 'Bouvetian'),
(32, 'BR', 'Brazil', 'Brazilian'),
(33, 'IO', 'British Indian Ocean Territory', 'British Indian Ocean Territory'),
(34, 'BN', 'Brunei Darussalam', 'Bruneian'),
(35, 'BG', 'Bulgaria', 'Bulgarian'),
(36, 'BF', 'Burkina Faso', 'Burkinabe'),
(37, 'BI', 'Burundi', 'Burundian'),
(38, 'KH', 'Cambodia', 'Cambodian'),
(39, 'CM', 'Cameroon', 'Cameroonian'),
(40, 'CA', 'Canada', 'Canadian'),
(41, 'CV', 'Cape Verde', 'Cape Verdean'),
(42, 'KY', 'Cayman Islands', 'Caymanian'),
(43, 'CF', 'Central African Republic', 'Central African'),
(44, 'TD', 'Chad', 'Chadian'),
(45, 'CL', 'Chile', 'Chilean'),
(46, 'CN', 'China', 'Chinese'),
(47, 'CX', 'Christmas Island', 'Christmas Islander'),
(48, 'CC', 'Cocos (Keeling) Islands', 'Cocos Islander'),
(49, 'CO', 'Colombia', 'Colombian'),
(50, 'KM', 'Comoros', 'Comorian'),
(51, 'CG', 'Congo', 'Congolese'),
(52, 'CK', 'Cook Islands', 'Cook Islander'),
(53, 'CR', 'Costa Rica', 'Costa Rican'),
(54, 'HR', 'Croatia', 'Croatian'),
(55, 'CU', 'Cuba', 'Cuban'),
(56, 'CY', 'Cyprus', 'Cypriot'),
(57, 'CW', 'Curaçao', 'Curacian'),
(58, 'CZ', 'Czech Republic', 'Czech'),
(59, 'DK', 'Denmark', 'Danish'),
(60, 'DJ', 'Djibouti', 'Djiboutian'),
(61, 'DM', 'Dominica', 'Dominican'),
(62, 'DO', 'Dominican Republic', 'Dominican'),
(63, 'EC', 'Ecuador', 'Ecuadorian'),
(64, 'EG', 'Egypt', 'Egyptian'),
(65, 'SV', 'El Salvador', 'Salvadoran'),
(66, 'GQ', 'Equatorial Guinea', 'Equatorial Guinean'),
(67, 'ER', 'Eritrea', 'Eritrean'),
(68, 'EE', 'Estonia', 'Estonian'),
(69, 'ET', 'Ethiopia', 'Ethiopian'),
(70, 'FK', 'Falkland Islands (Malvinas)', 'Falkland Islander'),
(71, 'FO', 'Faroe Islands', 'Faroese'),
(72, 'FJ', 'Fiji', 'Fijian'),
(73, 'FI', 'Finland', 'Finnish'),
(74, 'FR', 'France', 'French'),
(75, 'GF', 'French Guiana', 'French Guianese'),
(76, 'PF', 'French Polynesia', 'French Polynesian'),
(77, 'TF', 'French Southern and Antarctic Lands', 'French'),
(78, 'GA', 'Gabon', 'Gabonese'),
(79, 'GM', 'Gambia', 'Gambian'),
(80, 'GE', 'Georgia', 'Georgian'),
(81, 'DE', 'Germany', 'German'),
(82, 'GH', 'Ghana', 'Ghanaian'),
(83, 'GI', 'Gibraltar', 'Gibraltar'),
(84, 'GG', 'Guernsey', 'Guernsian'),
(85, 'GR', 'Greece', 'Greek'),
(86, 'GL', 'Greenland', 'Greenlandic'),
(87, 'GD', 'Grenada', 'Grenadian'),
(88, 'GP', 'Guadeloupe', 'Guadeloupe'),
(89, 'GU', 'Guam', 'Guamanian'),
(90, 'GT', 'Guatemala', 'Guatemalan'),
(91, 'GN', 'Guinea', 'Guinean'),
(92, 'GW', 'Guinea-Bissau', 'Guinea-Bissauan'),
(93, 'GY', 'Guyana', 'Guyanese'),
(94, 'HT', 'Haiti', 'Haitian'),
(95, 'HM', 'Heard and Mc Donald Islands', 'Heard and Mc Donald Islanders'),
(96, 'HN', 'Honduras', 'Honduran'),
(97, 'HK', 'Hong Kong', 'Hongkongese'),
(98, 'HU', 'Hungary', 'Hungarian'),
(99, 'IS', 'Iceland', 'Icelandic'),
(100, 'IN', 'India', 'Indian'),
(101, 'IM', 'Isle of Man', 'Manx'),
(102, 'ID', 'Indonesia', 'Indonesian'),
(103, 'IR', 'Iran', 'Iranian'),
(104, 'IQ', 'Iraq', 'Iraqi'),
(105, 'IE', 'Ireland', 'Irish'),
(106, 'IL', 'Israel', 'Israeli'),
(107, 'IT', 'Italy', 'Italian'),
(108, 'CI', 'Ivory Coast', 'Ivory Coastian'),
(109, 'JE', 'Jersey', 'Jersian'),
(110, 'JM', 'Jamaica', 'Jamaican'),
(111, 'JP', 'Japan', 'Japanese'),
(112, 'JO', 'Jordan', 'Jordanian'),
(113, 'KZ', 'Kazakhstan', 'Kazakh'),
(114, 'KE', 'Kenya', 'Kenyan'),
(115, 'KI', 'Kiribati', 'I-Kiribati'),
(116, 'KP', 'Korea(North Korea)', 'North Korean'),
(117, 'KR', 'Korea(South Korea)', 'South Korean'),
(118, 'XK', 'Kosovo', 'Kosovar'),
(119, 'KW', 'Kuwait', 'Kuwaiti'),
(120, 'KG', 'Kyrgyzstan', 'Kyrgyzstani'),
(121, 'LA', 'Lao PDR', 'Laotian'),
(122, 'LV', 'Latvia', 'Latvian'),
(123, 'LB', 'Lebanon', 'Lebanese'),
(124, 'LS', 'Lesotho', 'Basotho'),
(125, 'LR', 'Liberia', 'Liberian'),
(126, 'LY', 'Libya', 'Libyan'),
(127, 'LI', 'Liechtenstein', 'Liechtenstein'),
(128, 'LT', 'Lithuania', 'Lithuanian'),
(129, 'LU', 'Luxembourg', 'Luxembourger'),
(130, 'LK', 'Sri Lanka', 'Sri Lankian'),
(131, 'MO', 'Macau', 'Macanese'),
(132, 'MK', 'Macedonia', 'Macedonian'),
(133, 'MG', 'Madagascar', 'Malagasy'),
(134, 'MW', 'Malawi', 'Malawian'),
(135, 'MY', 'Malaysia', 'Malaysian'),
(136, 'MV', 'Maldives', 'Maldivian'),
(137, 'ML', 'Mali', 'Malian'),
(138, 'MT', 'Malta', 'Maltese'),
(139, 'MH', 'Marshall Islands', 'Marshallese'),
(140, 'MQ', 'Martinique', 'Martiniquais'),
(141, 'MR', 'Mauritania', 'Mauritanian'),
(142, 'MU', 'Mauritius', 'Mauritian'),
(143, 'YT', 'Mayotte', 'Mahoran'),
(144, 'MX', 'Mexico', 'Mexican'),
(145, 'FM', 'Micronesia', 'Micronesian'),
(146, 'MD', 'Moldova', 'Moldovan'),
(147, 'MC', 'Monaco', 'Monacan'),
(148, 'MN', 'Mongolia', 'Mongolian'),
(149, 'ME', 'Montenegro', 'Montenegrin'),
(150, 'MS', 'Montserrat', 'Montserratian'),
(151, 'MA', 'Morocco', 'Moroccan'),
(152, 'MZ', 'Mozambique', 'Mozambican'),
(153, 'MM', 'Myanmar', 'Myanmarian'),
(154, 'NA', 'Namibia', 'Namibian'),
(155, 'NR', 'Nauru', 'Nauruan'),
(156, 'NP', 'Nepal', 'Nepalese'),
(157, 'NL', 'Netherlands', 'Dutch'),
(158, 'AN', 'Netherlands Antilles', 'Dutch Antilier'),
(159, 'NC', 'New Caledonia', 'New Caledonian'),
(160, 'NZ', 'New Zealand', 'New Zealander'),
(161, 'NI', 'Nicaragua', 'Nicaraguan'),
(162, 'NE', 'Niger', 'Nigerien'),
(163, 'NG', 'Nigeria', 'Nigerian'),
(164, 'NU', 'Niue', 'Niuean'),
(165, 'NF', 'Norfolk Island', 'Norfolk Islander'),
(166, 'MP', 'Northern Mariana Islands', 'Northern Marianan'),
(167, 'NO', 'Norway', 'Norwegian'),
(168, 'OM', 'Oman', 'Omani'),
(169, 'PK', 'Pakistan', 'Pakistani'),
(170, 'PW', 'Palau', 'Palauan'),
(171, 'PS', 'Palestine', 'Palestinian'),
(172, 'PA', 'Panama', 'Panamanian'),
(173, 'PG', 'Papua New Guinea', 'Papua New Guinean'),
(174, 'PY', 'Paraguay', 'Paraguayan'),
(175, 'PE', 'Peru', 'Peruvian'),
(176, 'PH', 'Philippines', 'Filipino'),
(177, 'PN', 'Pitcairn', 'Pitcairn Islander'),
(178, 'PL', 'Poland', 'Polish'),
(179, 'PT', 'Portugal', 'Portuguese'),
(180, 'PR', 'Puerto Rico', 'Puerto Rican'),
(181, 'QA', 'Qatar', 'Qatari'),
(182, 'RE', 'Reunion Island', 'Reunionese'),
(183, 'RO', 'Romania', 'Romanian'),
(184, 'RU', 'Russian', 'Russian'),
(185, 'RW', 'Rwanda', 'Rwandan'),
(186, 'KN', 'Saint Kitts and Nevis', 'Kittitian/Nevisian'),
(187, 'MF', 'Saint Martin (French part)', 'St. Martian(French)'),
(188, 'SX', 'Sint Maarten (Dutch part)', 'St. Martian(Dutch)'),
(189, 'LC', 'Saint Pierre and Miquelon', 'St. Pierre and Miquelon'),
(190, 'VC', 'Saint Vincent and the Grenadines', 'Saint Vincent and the Grenadines'),
(191, 'WS', 'Samoa', 'Samoan'),
(192, 'SM', 'San Marino', 'Sammarinese'),
(193, 'ST', 'Sao Tome and Principe', 'Sao Tomean'),
(194, 'SA', 'Saudi Arabia', 'Saudi Arabian'),
(195, 'SN', 'Senegal', 'Senegalese'),
(196, 'RS', 'Serbia', 'Serbian'),
(197, 'SC', 'Seychelles', 'Seychellois'),
(198, 'SL', 'Sierra Leone', 'Sierra Leonean'),
(199, 'SG', 'Singapore', 'Singaporean'),
(200, 'SK', 'Slovakia', 'Slovak'),
(201, 'SI', 'Slovenia', 'Slovenian'),
(202, 'SB', 'Solomon Islands', 'Solomon Island'),
(203, 'SO', 'Somalia', 'Somali'),
(204, 'ZA', 'South Africa', 'South African'),
(205, 'GS', 'South Georgia and the South Sandwich', 'South Georgia and the South Sandwich'),
(206, 'SS', 'South Sudan', 'South Sudanese'),
(207, 'ES', 'Spain', 'Spanish'),
(208, 'SH', 'Saint Helena', 'St. Helenian'),
(209, 'SD', 'Sudan', 'Sudanese'),
(210, 'SR', 'Suriname', 'Surinamese'),
(211, 'SJ', 'Svalbard and Jan Mayen', 'Svalbardian/Jan Mayenian'),
(212, 'SZ', 'Swaziland', 'Swazi'),
(213, 'SE', 'Sweden', 'Swedish'),
(214, 'CH', 'Switzerland', 'Swiss'),
(215, 'SY', 'Syria', 'Syrian'),
(216, 'TW', 'Taiwan', 'Taiwanese'),
(217, 'TJ', 'Tajikistan', 'Tajikistani'),
(218, 'TZ', 'Tanzania', 'Tanzanian'),
(219, 'TH', 'Thailand', 'Thai'),
(220, 'TL', 'Timor-Leste', 'Timor-Lestian'),
(221, 'TG', 'Togo', 'Togolese'),
(222, 'TK', 'Tokelau', 'Tokelaian'),
(223, 'TO', 'Tonga', 'Tongan'),
(224, 'TT', 'Trinidad and Tobago', 'Trinidadian/Tobagonian'),
(225, 'TN', 'Tunisia', 'Tunisian'),
(226, 'TR', 'Turkey', 'Turkish'),
(227, 'TM', 'Turkmenistan', 'Turkmen'),
(228, 'TC', 'Turks and Caicos Islands', 'Turks and Caicos Islands'),
(229, 'TV', 'Tuvalu', 'Tuvaluan'),
(230, 'UG', 'Uganda', 'Ugandan'),
(231, 'UA', 'Ukraine', 'Ukrainian'),
(232, 'AE', 'United Arab Emirates', 'Emirati'),
(233, 'GB', 'United Kingdom', 'British'),
(234, 'US', 'United States', 'American'),
(235, 'UM', 'US Minor Outlying Islands', 'US Minor Outlying Islander'),
(236, 'UY', 'Uruguay', 'Uruguayan'),
(237, 'UZ', 'Uzbekistan', 'Uzbek'),
(238, 'VU', 'Vanuatu', 'Vanuatuan'),
(239, 'VE', 'Venezuela', 'Venezuelan'),
(240, 'VN', 'Vietnam', 'Vietnamese'),
(241, 'VI', 'Virgin Islands (U.S.)', 'American Virgin Islander'),
(242, 'VA', 'Vatican City', 'Vatican'),
(243, 'WF', 'Wallis and Futuna Islands', 'Wallisian/Futunan'),
(244, 'EH', 'Western Sahara', 'Sahrawian'),
(245, 'YE', 'Yemen', 'Yemeni'),
(246, 'ZM', 'Zambia', 'Zambian'),
(247, 'ZW', 'Zimbabwe', 'Zimbabwean');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1625987463),
('m140209_132017_init', 1625987507),
('m140403_174025_create_account_table', 1625987509),
('m140504_113157_update_tables', 1625987510),
('m140504_130429_create_token_table', 1625987512),
('m140830_171933_fix_ip_field', 1625987514),
('m140830_172703_change_account_table_name', 1625987514),
('m141222_110026_update_ip_field', 1625987515),
('m141222_135246_alter_username_length', 1625987515),
('m150614_103145_update_social_account_table', 1625987516),
('m150623_212711_fix_username_notnull', 1625987516),
('m151218_234654_add_timezone_to_profile', 1625987516),
('m160929_103127_add_last_login_at_to_user_table', 1625987517);

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
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_account`
--

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(4, 'yOwLbldyfspFNS4JP1C6ntpcGTZT5BTA', 1626228829, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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

INSERT INTO `user` (`id`, `username`, `fullname`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`, `status`, `password_reset_token`) VALUES
(3, 'iqramrafien21@gmail.com', '', 'iqramrafien21@gmail.com', '$2y$10$Ky2Vd8q4cmJhs15pZhrYDefiioIMJpG4PIaMLy3Pw0LH6.mrvKSze', 'PumdGONlKAzCKqXEY4CbW9YpbpXy_bf4', 1626127406, NULL, NULL, '::1', 1626127374, 1626127374, 0, 1626292234, 10, ''),
(4, 'iqramrafien@gmail.com', '', 'iqramrafien@gmail.com', '$2y$10$2J2pUPr3ATjr76ywNoojrOZqj4zan12LksIBeuqXQr77W1OPbHZqK', 'gJBv5DJKVds8BgWA13w0wbWmPufkRwNA', NULL, NULL, NULL, '::1', 1626228829, 1626228829, 0, NULL, 10, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_item`
--
ALTER TABLE `application_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

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
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `application_item`
--
ALTER TABLE `application_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
