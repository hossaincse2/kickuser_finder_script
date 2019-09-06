-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2016 at 02:29 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kik_user`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `metakey` varchar(500) NOT NULL,
  `metadescription` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `description`, `metakey`, `metadescription`, `date`) VALUES
(3, 'This is nazmul Blog', 'liquam fringilla, sapien eget scelerisque placerat, lorem libero cursus \r\nlorem, sed sodales lorem libero eu sapien. Nunc mattis feugiat justo vel\r\n faucibus. Nulla consequat feugiat malesuada. Ut justo nulla, <strong>facilisis vel molestie id</strong>,\r\n dictum ut arcu. Nunc ipsum nulla, eleifend non blandit quis, luctus \r\nquis orci. Cras blandit turpis mattis nulla ultrices interdum. Mauris \r\npretium pretium dictum. Nunc commodo, felis sed dictum bibendum, risus \r\njusto iaculis dui, nec euismod orci sem eget neque. Donec in metus \r\nmetus, vitae eleifend lorem. Ut vestibulum gravida venenatis. Vestibulum\r\n ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia \r\nCurae; Pellentesque suscipit tincidunt magna non mollis. Fusce tempus \r\ntincidunt nisi, in luctus elit pellentesque quis. Sed velit mi, \r\nullamcorper ut tempor ut, mattis eu lacus. Morbi rhoncus aliquet tellus,\r\n id accumsan enim sollicitudin vitae.', 'html,css,js', 'asdsad d', '2016-02-19 05:00:00'),
(4, 'BLOG POST TITLE HERE', 'liquam fringilla, sapien eget scelerisque placerat, lorem libero cursus \r\nlorem, sed sodales lorem libero eu sapien. Nunc mattis feugiat justo vel\r\n faucibus. Nulla consequat feugiat malesuada. Ut justo nulla, <strong>facilisis vel molestie id</strong>,\r\n dictum ut arcu. Nunc ipsum nulla, eleifend non blandit quis, luctus \r\nquis orci. Cras blandit turpis mattis nulla ultrices interdum. Mauris \r\npretium pretium dictum. Nunc commodo, felis sed dictum bibendum, risus \r\njusto iaculis dui, nec euismod orci sem eget neque. Donec in metus \r\nmetus, vitae eleifend lorem. Ut vestibulum gravida venenatis. Vestibulum\r\n ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia \r\nCurae; Pellentesque suscipit tincidunt magna non mollis. Fusce tempus \r\ntincidunt nisi, in luctus elit pellentesque quis. Sed velit mi, \r\nullamcorper ut tempor ut, mattis eu lacus. Morbi rhoncus aliquet tellus,\r\n id accumsan enim sollicitudin vitae.', 'html,css,js', 'Fusce tempus tincidunt nisi, in luctus elit pellentesque quis. Sed velit mi, ullamcorper ut tempor ut, mattis eu lacus. Morbi rhoncus aliquet tellus, id accumsan enim sollicitudin vitae.', '2016-02-19 00:19:00'),
(5, 'Welcome Kik users', 'liquam fringilla, sapien eget scelerisque placerat, lorem libero cursus \r\nlorem, sed sodales lorem libero eu sapien. Nunc mattis feugiat justo vel\r\n faucibus. Nulla consequat feugiat malesuada. Ut justo nulla, <strong>facilisis vel molestie id</strong>,\r\n dictum ut arcu. Nunc ipsum nulla, eleifend non blandit quis, luctus \r\nquis orci. Cras blandit turpis mattis nulla ultrices interdum. Mauris \r\npretium pretium dictum. Nunc commodo, felis sed dictum bibendum, risus \r\njusto iaculis dui, nec euismod orci sem eget neque. Donec in metus \r\nmetus, vitae eleifend lorem. Ut vestibulum gravida venenatis. Vestibulum\r\n ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia \r\nCurae; Pellentesque suscipit tincidunt magna non mollis. Fusce tempus \r\ntincidunt nisi, in luctus elit pellentesque quis. Sed velit mi, \r\nullamcorper ut tempor ut, mattis eu lacus. Morbi rhoncus aliquet tellus,\r\n id accumsan enim sollicitudin vitae.', 'html,css,js', 'asd sad', '2016-02-19 03:00:00'),
(6, 'liquam fringilla, sapien eget scelerisque', 'liquam fringilla, sapien eget scelerisque placerat, lorem libero cursus \r\nlorem, sed sodales lorem libero eu sapien. Nunc mattis feugiat justo vel\r\n faucibus. Nulla consequat feugiat malesuada. Ut justo nulla, <strong>facilisis vel molestie id</strong>,\r\n dictum ut arcu. Nunc ipsum nulla, eleifend non blandit quis, luctus \r\nquis orci. Cras blandit turpis mattis nulla ultrices interdum. Mauris \r\npretium pretium dictum. Nunc commodo, felis sed dictum bibendum, risus \r\njusto iaculis dui, nec euismod orci sem eget neque. Donec in metus \r\nmetus, vitae eleifend lorem. Ut vestibulum gravida venenatis. Vestibulum\r\n ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia \r\nCurae; Pellentesque suscipit tincidunt magna non mollis. Fusce tempus \r\ntincidunt nisi, in luctus elit pellentesque quis. Sed velit mi, \r\nullamcorper ut tempor ut, mattis eu lacus. Morbi rhoncus aliquet tellus,\r\n id accumsan enim sollicitudin vitae.', 'html,css,js', 'liquam fringilla, sapien eget scelerisqueliquam fringilla, sapien eget scelerisqueliquam fringilla, sapien eget scelerisque', '2016-02-19 06:22:33');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE IF NOT EXISTS `blog_comments` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `blog_id`, `author`, `contact_email`, `website`, `comment`, `date`) VALUES
(1, 3, 'Hossain', 'sdasad@gmail.com', '', 'sdf s dfsdf dsf', '2016-02-19 07:24:24'),
(2, 0, 'Hossain', 'sdasad@gmail.com', 'http://www.w3schools.com', 'asd asd', '2016-02-19 07:25:04'),
(3, 5, 'Hossain', 'sdasad@gmail.com', 'http://www.w3schools.com', 'sd fsd fds fsdfsf', '2016-02-19 07:26:14'),
(4, 5, 'Nazmul', 'sdasad@gmail.com', 'http://www.w3schools.com', 'asdsdsa dfdsf', '2016-02-19 07:37:53'),
(5, 6, 'Hossain', 'sdasad@gmail.com', 'http://www.w3schools.com', 'hi', '2016-02-19 10:02:45');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `profileid` varchar(100) NOT NULL,
  `comments` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `profileid`, `comments`, `date`) VALUES
(1, 'Hossain', '0', 'hi', '2016-02-13 22:31:09'),
(2, 'Hossain', 'Nazmul', 'Hi nazmul', '2016-02-13 22:32:43'),
(3, 'Nazmul', '0', 'Today is Fulgun', '2016-02-13 23:14:26'),
(4, 'Sumaia', 'Sumaia', 'hi', '2016-02-14 00:06:03'),
(5, 'Naima', '9', 'hi', '2016-02-14 01:47:35'),
(6, 'Nandita', '0', 'Hi Everyone', '2016-02-14 04:33:53'),
(7, 'Selim', '0', 'hi', '2016-02-14 21:17:32'),
(8, 'Selim', '0', 'Hi I am selim I Am NOW kik User by smarty', '2016-02-16 07:09:32'),
(9, 'Selim', '0', 'hello', '2016-02-16 07:42:36'),
(10, 'Selim', '0', 'Hi Selim', '2016-02-16 07:43:49'),
(11, 'Mousumi', '0', 'hi', '2016-02-16 08:15:56'),
(12, 'Selim', 'Sakil', 'hi', '2016-02-17 05:49:18'),
(13, 'Selim', 'Sakil', 'hello', '2016-02-17 05:50:16'),
(14, 'Selim', 'Mousumi', 'http://localhost/smartykik/kikuser/img/noimage.jpg', '2016-02-17 06:37:52'),
(15, 'Selim', 'hossain11', 'hi', '2016-02-17 06:56:11'),
(16, 'Nazmul001', '0', 'gguguyg', '2016-02-19 13:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `comments_blog_reply`
--

CREATE TABLE IF NOT EXISTS `comments_blog_reply` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `replycomment` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments_blog_reply`
--

INSERT INTO `comments_blog_reply` (`id`, `comment_id`, `blog_id`, `replycomment`, `date`) VALUES
(1, 3, 0, 'sdfds fsdf sdfsfsf', '2016-02-19 09:17:34'),
(2, 0, 4, 'ada sdsad', '2016-02-19 09:23:26'),
(3, 0, 4, 'dsfsd fsd f', '2016-02-19 09:28:41'),
(4, 3, 5, 'd sa dsdsad', '2016-02-19 09:31:22'),
(5, 4, 5, 's dffsdf d', '2016-02-19 09:32:52'),
(6, 3, 5, 'asd sdsa d', '2016-02-19 09:45:41'),
(7, 4, 5, 'dsf sd fsd f', '2016-02-19 09:48:02'),
(8, 5, 6, 'How are you', '2016-02-19 10:03:05');

-- --------------------------------------------------------

--
-- Table structure for table `comments_reply`
--

CREATE TABLE IF NOT EXISTS `comments_reply` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `profileid` varchar(100) NOT NULL,
  `replycomment` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments_reply`
--

INSERT INTO `comments_reply` (`id`, `comment_id`, `user_id`, `profileid`, `replycomment`, `date`) VALUES
(1, 1, 'Hossain', '0', 'hello', '2016-02-13 22:31:17'),
(2, 2, 'Hossain', 'Nazmul', 'How are you', '2016-02-13 22:32:51'),
(3, 4, 'Sumaia', 'Sumaia', 'df f', '2016-02-14 00:06:11'),
(4, 5, 'Naima', '9', 'my name is hossain', '2016-02-14 01:47:49'),
(5, 6, 'Nandita', '0', 'Hello', '2016-02-14 04:34:14'),
(6, 7, 'Selim', '0', 'hay', '2016-02-14 21:17:42'),
(7, 10, 'Sakil', 'Selim', 'hi', '2016-02-17 12:01:02'),
(8, 8, 'Sakil', 'Selim', 'What a nice comment', '2016-02-17 12:01:35'),
(9, 10, 'Sakil', 'Selim', 'Hello RS', '2016-02-17 12:03:25'),
(10, 13, 'Sakil', '0', 'sdfd ff', '2016-02-17 12:17:04'),
(11, 14, 'Mousumi', '0', 'hi', '2016-02-17 13:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL,
  `country_code` char(2) NOT NULL,
  `counrty_name` varchar(80) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=240 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country_code`, `counrty_name`) VALUES
(1, 'AF', 'AFGHANISTAN'),
(2, 'AL', 'ALBANIA'),
(3, 'DZ', 'ALGERIA'),
(4, 'AS', 'AMERICAN SAMOA'),
(5, 'AD', 'ANDORRA'),
(6, 'AO', 'ANGOLA'),
(7, 'AI', 'ANGUILLA'),
(8, 'AQ', 'ANTARCTICA'),
(9, 'AG', 'ANTIGUA AND BARBUDA'),
(10, 'AR', 'ARGENTINA'),
(11, 'AM', 'ARMENIA'),
(12, 'AW', 'ARUBA'),
(13, 'AU', 'AUSTRALIA'),
(14, 'AT', 'AUSTRIA'),
(15, 'AZ', 'AZERBAIJAN'),
(16, 'BS', 'BAHAMAS'),
(17, 'BH', 'BAHRAIN'),
(18, 'BD', 'BANGLADESH'),
(19, 'BB', 'BARBADOS'),
(20, 'BY', 'BELARUS'),
(21, 'BE', 'BELGIUM'),
(22, 'BZ', 'BELIZE'),
(23, 'BJ', 'BENIN'),
(24, 'BM', 'BERMUDA'),
(25, 'BT', 'BHUTAN'),
(26, 'BO', 'BOLIVIA'),
(27, 'BA', 'BOSNIA AND HERZEGOVINA'),
(28, 'BW', 'BOTSWANA'),
(29, 'BV', 'BOUVET ISLAND'),
(30, 'BR', 'BRAZIL'),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY'),
(32, 'BN', 'BRUNEI DARUSSALAM'),
(33, 'BG', 'BULGARIA'),
(34, 'BF', 'BURKINA FASO'),
(35, 'BI', 'BURUNDI'),
(36, 'KH', 'CAMBODIA'),
(37, 'CM', 'CAMEROON'),
(38, 'CA', 'CANADA'),
(39, 'CV', 'CAPE VERDE'),
(40, 'KY', 'CAYMAN ISLANDS'),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC'),
(42, 'TD', 'CHAD'),
(43, 'CL', 'CHILE'),
(44, 'CN', 'CHINA'),
(45, 'CX', 'CHRISTMAS ISLAND'),
(46, 'CC', 'COCOS (KEELING) ISLANDS'),
(47, 'CO', 'COLOMBIA'),
(48, 'KM', 'COMOROS'),
(49, 'CG', 'CONGO'),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE'),
(51, 'CK', 'COOK ISLANDS'),
(52, 'CR', 'COSTA RICA'),
(53, 'CI', 'COTE D''IVOIRE'),
(54, 'HR', 'CROATIA'),
(55, 'CU', 'CUBA'),
(56, 'CY', 'CYPRUS'),
(57, 'CZ', 'CZECH REPUBLIC'),
(58, 'DK', 'DENMARK'),
(59, 'DJ', 'DJIBOUTI'),
(60, 'DM', 'DOMINICA'),
(61, 'DO', 'DOMINICAN REPUBLIC'),
(62, 'EC', 'ECUADOR'),
(63, 'EG', 'EGYPT'),
(64, 'SV', 'EL SALVADOR'),
(65, 'GQ', 'EQUATORIAL GUINEA'),
(66, 'ER', 'ERITREA'),
(67, 'EE', 'ESTONIA'),
(68, 'ET', 'ETHIOPIA'),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)'),
(70, 'FO', 'FAROE ISLANDS'),
(71, 'FJ', 'FIJI'),
(72, 'FI', 'FINLAND'),
(73, 'FR', 'FRANCE'),
(74, 'GF', 'FRENCH GUIANA'),
(75, 'PF', 'FRENCH POLYNESIA'),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES'),
(77, 'GA', 'GABON'),
(78, 'GM', 'GAMBIA'),
(79, 'GE', 'GEORGIA'),
(80, 'DE', 'GERMANY'),
(81, 'GH', 'GHANA'),
(82, 'GI', 'GIBRALTAR'),
(83, 'GR', 'GREECE'),
(84, 'GL', 'GREENLAND'),
(85, 'GD', 'GRENADA'),
(86, 'GP', 'GUADELOUPE'),
(87, 'GU', 'GUAM'),
(88, 'GT', 'GUATEMALA'),
(89, 'GN', 'GUINEA'),
(90, 'GW', 'GUINEA-BISSAU'),
(91, 'GY', 'GUYANA'),
(92, 'HT', 'HAITI'),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS'),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)'),
(95, 'HN', 'HONDURAS'),
(96, 'HK', 'HONG KONG'),
(97, 'HU', 'HUNGARY'),
(98, 'IS', 'ICELAND'),
(99, 'IN', 'INDIA'),
(100, 'ID', 'INDONESIA'),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF'),
(102, 'IQ', 'IRAQ'),
(103, 'IE', 'IRELAND'),
(104, 'IL', 'ISRAEL'),
(105, 'IT', 'ITALY'),
(106, 'JM', 'JAMAICA'),
(107, 'JP', 'JAPAN'),
(108, 'JO', 'JORDAN'),
(109, 'KZ', 'KAZAKHSTAN'),
(110, 'KE', 'KENYA'),
(111, 'KI', 'KIRIBATI'),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE''S REPUBLIC OF'),
(113, 'KR', 'KOREA, REPUBLIC OF'),
(114, 'KW', 'KUWAIT'),
(115, 'KG', 'KYRGYZSTAN'),
(116, 'LA', 'LAO PEOPLE''S DEMOCRATIC REPUBLIC'),
(117, 'LV', 'LATVIA'),
(118, 'LB', 'LEBANON'),
(119, 'LS', 'LESOTHO'),
(120, 'LR', 'LIBERIA'),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA'),
(122, 'LI', 'LIECHTENSTEIN'),
(123, 'LT', 'LITHUANIA'),
(124, 'LU', 'LUXEMBOURG'),
(125, 'MO', 'MACAO'),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF'),
(127, 'MG', 'MADAGASCAR'),
(128, 'MW', 'MALAWI'),
(129, 'MY', 'MALAYSIA'),
(130, 'MV', 'MALDIVES'),
(131, 'ML', 'MALI'),
(132, 'MT', 'MALTA'),
(133, 'MH', 'MARSHALL ISLANDS'),
(134, 'MQ', 'MARTINIQUE'),
(135, 'MR', 'MAURITANIA'),
(136, 'MU', 'MAURITIUS'),
(137, 'YT', 'MAYOTTE'),
(138, 'MX', 'MEXICO'),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF'),
(140, 'MD', 'MOLDOVA, REPUBLIC OF'),
(141, 'MC', 'MONACO'),
(142, 'MN', 'MONGOLIA'),
(143, 'MS', 'MONTSERRAT'),
(144, 'MA', 'MOROCCO'),
(145, 'MZ', 'MOZAMBIQUE'),
(146, 'MM', 'MYANMAR'),
(147, 'NA', 'NAMIBIA'),
(148, 'NR', 'NAURU'),
(149, 'NP', 'NEPAL'),
(150, 'NL', 'NETHERLANDS'),
(151, 'AN', 'NETHERLANDS ANTILLES'),
(152, 'NC', 'NEW CALEDONIA'),
(153, 'NZ', 'NEW ZEALAND'),
(154, 'NI', 'NICARAGUA'),
(155, 'NE', 'NIGER'),
(156, 'NG', 'NIGERIA'),
(157, 'NU', 'NIUE'),
(158, 'NF', 'NORFOLK ISLAND'),
(159, 'MP', 'NORTHERN MARIANA ISLANDS'),
(160, 'NO', 'NORWAY'),
(161, 'OM', 'OMAN'),
(162, 'PK', 'PAKISTAN'),
(163, 'PW', 'PALAU'),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED'),
(165, 'PA', 'PANAMA'),
(166, 'PG', 'PAPUA NEW GUINEA'),
(167, 'PY', 'PARAGUAY'),
(168, 'PE', 'PERU'),
(169, 'PH', 'PHILIPPINES'),
(170, 'PN', 'PITCAIRN'),
(171, 'PL', 'POLAND'),
(172, 'PT', 'PORTUGAL'),
(173, 'PR', 'PUERTO RICO'),
(174, 'QA', 'QATAR'),
(175, 'RE', 'REUNION'),
(176, 'RO', 'ROMANIA'),
(177, 'RU', 'RUSSIAN FEDERATION'),
(178, 'RW', 'RWANDA'),
(179, 'SH', 'SAINT HELENA'),
(180, 'KN', 'SAINT KITTS AND NEVIS'),
(181, 'LC', 'SAINT LUCIA'),
(182, 'PM', 'SAINT PIERRE AND MIQUELON'),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES'),
(184, 'WS', 'SAMOA'),
(185, 'SM', 'SAN MARINO'),
(186, 'ST', 'SAO TOME AND PRINCIPE'),
(187, 'SA', 'SAUDI ARABIA'),
(188, 'SN', 'SENEGAL'),
(189, 'CS', 'SERBIA AND MONTENEGRO'),
(190, 'SC', 'SEYCHELLES'),
(191, 'SL', 'SIERRA LEONE'),
(192, 'SG', 'SINGAPORE'),
(193, 'SK', 'SLOVAKIA'),
(194, 'SI', 'SLOVENIA'),
(195, 'SB', 'SOLOMON ISLANDS'),
(196, 'SO', 'SOMALIA'),
(197, 'ZA', 'SOUTH AFRICA'),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS'),
(199, 'ES', 'SPAIN'),
(200, 'LK', 'SRI LANKA'),
(201, 'SD', 'SUDAN'),
(202, 'SR', 'SURINAME'),
(203, 'SJ', 'SVALBARD AND JAN MAYEN'),
(204, 'SZ', 'SWAZILAND'),
(205, 'SE', 'SWEDEN'),
(206, 'CH', 'SWITZERLAND'),
(207, 'SY', 'SYRIAN ARAB REPUBLIC'),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA'),
(209, 'TJ', 'TAJIKISTAN'),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF'),
(211, 'TH', 'THAILAND'),
(212, 'TL', 'TIMOR-LESTE'),
(213, 'TG', 'TOGO'),
(214, 'TK', 'TOKELAU'),
(215, 'TO', 'TONGA'),
(216, 'TT', 'TRINIDAD AND TOBAGO'),
(217, 'TN', 'TUNISIA'),
(218, 'TR', 'TURKEY'),
(219, 'TM', 'TURKMENISTAN'),
(220, 'TC', 'TURKS AND CAICOS ISLANDS'),
(221, 'TV', 'TUVALU'),
(222, 'UG', 'UGANDA'),
(223, 'UA', 'UKRAINE'),
(224, 'AE', 'UNITED ARAB EMIRATES'),
(225, 'GB', 'UNITED KINGDOM'),
(226, 'US', 'UNITED STATES'),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS'),
(228, 'UY', 'URUGUAY'),
(229, 'UZ', 'UZBEKISTAN'),
(230, 'VU', 'VANUATU'),
(231, 'VE', 'VENEZUELA'),
(232, 'VN', 'VIET NAM'),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH'),
(234, 'VI', 'VIRGIN ISLANDS, U.S.'),
(235, 'WF', 'WALLIS AND FUTUNA'),
(236, 'EH', 'WESTERN SAHARA'),
(237, 'YE', 'YEMEN'),
(238, 'ZM', 'ZAMBIA'),
(239, 'ZW', 'ZIMBABWE');

-- --------------------------------------------------------

--
-- Table structure for table `last_login`
--

CREATE TABLE IF NOT EXISTS `last_login` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `last_login`
--

INSERT INTO `last_login` (`id`, `user_id`, `email`, `date`) VALUES
(1, 'Hossain', 'hossain1@gmail.com', '2016-02-13 23:29:13'),
(2, 'Nazmul', 'hossain2@gmail.com', '2016-02-13 23:57:57'),
(3, 'Selim', 'hossain5@gmail.com', '2016-02-13 23:58:06'),
(4, 'Sumaia', 'hossain7@gmail.com', '2016-02-13 23:58:15'),
(5, 'Mousumi', 'hossain9@gmail.com', '2016-02-14 00:09:57'),
(6, 'Nandita', 'hossain8@gmail.com', '2016-02-14 00:27:48'),
(7, 'Nandita', 'hossain8@gmail.com', '2016-02-14 01:00:00'),
(8, 'Naima', 'hossain3@gmail.com', '2016-02-14 01:19:29'),
(9, 'Nazmul', 'hossain2@gmail.com', '2016-02-14 02:00:48'),
(10, 'Naima', 'hossain3@gmail.com', '2016-02-14 02:10:58'),
(11, 'Nazmul', 'hossain2@gmail.com', '2016-02-14 02:15:41'),
(12, 'Selim', 'hossain5@gmail.com', '2016-02-14 02:19:36'),
(13, 'Nazmul', 'hossain2@gmail.com', '2016-02-14 02:46:56'),
(14, 'Selim', 'hossain5@gmail.com', '2016-02-14 04:23:07'),
(15, 'Nandita', 'hossain8@gmail.com', '2016-02-14 04:30:46'),
(16, 'Pijush', 'hossain4@gmail.com', '2016-02-14 05:10:23'),
(17, 'Selim', 'hossain5@gmail.com', '2016-02-14 20:18:39'),
(18, 'Selim', 'hossain5@gmail.com', '2016-02-14 20:37:20'),
(19, 'Selim', 'hossain5@gmail.com', '2016-02-14 21:34:12'),
(20, 'Selim', 'hossain5@gmail.com', '2016-02-14 21:34:16'),
(21, 'Selim', 'hossain5@gmail.com', '2016-02-14 21:35:32'),
(22, 'Selim', 'hossain5@gmail.com', '2016-02-14 21:36:11'),
(23, 'Selim', 'hossain5@gmail.com', '2016-02-14 21:36:18'),
(24, 'Selim', 'hossain5@gmail.com', '2016-02-14 21:37:04'),
(25, 'Selim', 'hossain5@gmail.com', '2016-02-14 21:37:09'),
(26, 'Selim', 'hossain5@gmail.com', '2016-02-14 21:37:20'),
(27, 'Selim', 'hossain5@gmail.com', '2016-02-14 21:37:58'),
(28, 'Selim', 'hossain5@gmail.com', '2016-02-14 21:38:02'),
(29, 'Selim', 'hossain5@gmail.com', '2016-02-14 21:39:19'),
(30, 'Selim', 'hossain5@gmail.com', '2016-02-14 22:03:45'),
(31, 'Selim', 'hossain5@gmail.com', '2016-02-15 13:14:24'),
(32, 'Selim', 'hossain5@gmail.com', '2016-02-15 13:18:54'),
(33, 'Selim', 'hossain5@gmail.com', '2016-02-15 13:19:08'),
(34, 'Selim', 'hossain5@gmail.com', '2016-02-15 13:27:00'),
(35, 'Selim', 'hossain5@gmail.com', '2016-02-15 13:27:15'),
(36, 'Selim', 'hossain5@gmail.com', '2016-02-15 13:37:58'),
(37, 'Selim', 'hossain5@gmail.com', '2016-02-15 13:45:47'),
(38, 'Selim', 'hossain5@gmail.com', '2016-02-16 05:49:56'),
(39, 'Selim', 'hossain5@gmail.com', '2016-02-16 06:30:47'),
(40, 'Selim', 'hossain5@gmail.com', '2016-02-16 06:43:16'),
(41, 'Selim', 'hossain5@gmail.com', '2016-02-16 07:57:58'),
(42, 'Mousumi', 'hossain9@gmail.com', '2016-02-16 08:15:11'),
(43, 'Sumaia', 'hossain7@gmail.com', '2016-02-16 09:00:23'),
(44, 'Selim', 'hossain5@gmail.com', '2016-02-17 04:45:27'),
(45, 'Selim', 'hossain5@gmail.com', '2016-02-17 06:30:29'),
(46, 'Selim', 'hossain5@gmail.com', '2016-02-17 06:55:46'),
(47, 'Mousumi', 'hossain9@gmail.com', '2016-02-17 08:28:44'),
(48, 'hossain113', 'admin10038642@gmail.com', '2016-02-17 09:35:04'),
(49, 'hossain113', 'admin10038642@gmail.com', '2016-02-17 09:36:44'),
(50, 'Selim', 'hossain5@gmail.com', '2016-02-17 10:13:58'),
(51, 'Sakil', 'hossain6@gmail.com', '2016-02-17 11:18:34'),
(52, 'Pijush', 'hossain4@gmail.com', '2016-02-17 11:30:31'),
(53, 'Selim', 'hossain5@gmail.com', '2016-02-17 11:34:43'),
(54, 'Sakil', 'hossain6@gmail.com', '2016-02-17 11:53:58'),
(55, 'Mousumi', 'hossain9@gmail.com', '2016-02-17 12:20:28'),
(56, 'Sumaia', 'hossain7@gmail.com', '2016-02-17 12:48:22'),
(57, 'Mousumi', 'hossain9@gmail.com', '2016-02-17 12:53:27'),
(58, 'Selim', 'hossain5@gmail.com', '2016-02-17 13:07:36'),
(59, 'Mousumi', 'hossain9@gmail.com', '2016-02-17 13:13:56'),
(60, 'Mousumi', 'hossain9@gmail.com', '2016-02-17 14:01:20'),
(61, 'Selim', 'hossain5@gmail.com', '2016-02-17 14:12:42'),
(62, 'Selim', 'hossain5@gmail.com', '2016-02-17 14:59:47'),
(63, 'Nazmul001', 'nazmul2@gmail.com', '2016-02-17 15:00:01'),
(64, 'Selim', 'hossain5@gmail.com', '2016-02-17 15:12:23'),
(65, 'Mousumi', 'hossain9@gmail.com', '2016-02-17 15:16:12'),
(66, 'Nazmul001', 'nazmul2@gmail.com', '2016-02-18 05:07:59'),
(67, 'Nazmul001', 'nazmul2@gmail.com', '2016-02-18 05:08:34'),
(68, 'Nazmul001', 'nazmul2@gmail.com', '2016-02-18 05:09:10'),
(69, 'Nazmul001', 'nazmul2@gmail.com', '2016-02-18 05:09:36'),
(70, 'Nazmul001', 'nazmul2@gmail.com', '2016-02-18 05:10:01'),
(71, 'Selim', 'hossain5@gmail.com', '2016-02-18 05:10:23'),
(72, 'Selim', 'hossain5@gmail.com', '2016-02-18 05:10:43'),
(73, 'Selim', 'hossain5@gmail.com', '2016-02-18 05:11:25'),
(74, 'Selim', 'hossain5@gmail.com', '2016-02-18 05:11:41'),
(75, 'Nazmul001', 'nazmul2@gmail.com', '2016-02-18 05:11:55'),
(76, 'Selim', 'hossain5@gmail.com', '2016-02-18 05:14:37'),
(77, 'Nazmul001', 'nazmul2@gmail.com', '2016-02-18 05:18:37'),
(78, 'Nazmul001', 'nazmul2@gmail.com', '2016-02-18 05:24:15'),
(79, 'Selim', 'hossain5@gmail.com', '2016-02-18 05:25:22'),
(80, 'Selim', 'hossain5@gmail.com', '2016-02-18 05:25:31'),
(81, 'Selim', 'hossain5@gmail.com', '2016-02-18 05:26:12'),
(82, 'Selim', 'hossain5@gmail.com', '2016-02-18 05:26:21'),
(83, 'Selim', 'hossain5@gmail.com', '2016-02-18 05:27:34'),
(84, 'Selim', 'hossain5@gmail.com', '2016-02-18 05:27:44'),
(85, 'Selim', 'hossain5@gmail.com', '2016-02-18 05:28:00'),
(86, 'Nazmul001', 'nazmul2@gmail.com', '2016-02-18 05:30:38'),
(87, 'Nazmul001', 'nazmul2@gmail.com', '2016-02-18 05:32:13'),
(88, 'Nazmul001', 'nazmul2@gmail.com', '2016-02-18 05:36:16'),
(89, 'Nazmul001', 'nazmul2@gmail.com', '2016-02-18 05:36:49'),
(90, 'Nazmul001', 'nazmul2@gmail.com', '2016-02-18 05:37:15'),
(91, 'Nazmul001', 'nazmul2@gmail.com', '2016-02-18 05:38:19'),
(92, 'Nazmul001', 'nazmul2@gmail.com', '2016-02-18 05:41:57'),
(93, 'Nazmul001', 'nazmul2@gmail.com', '2016-02-18 05:44:05'),
(94, 'Selim', 'hossain5@gmail.com', '2016-02-18 06:17:07'),
(95, 'Selim', 'hossain5@gmail.com', '2016-02-18 06:17:30'),
(96, 'Sumaia', 'hossain7@gmail.com', '2016-02-18 07:06:38'),
(97, 'Mousumi', 'hossain9@gmail.com', '2016-02-18 07:07:55'),
(98, 'Mousumi', 'hossain9@gmail.com', '2016-02-18 07:08:31'),
(99, 'Sumaia', 'hossain7@gmail.com', '2016-02-18 07:08:44'),
(100, 'Sumaia', 'hossain7@gmail.com', '2016-02-18 07:11:59'),
(101, 'Sumaia', 'hossain7@gmail.com', '2016-02-18 07:12:13'),
(102, 'Sumaia', 'hossain7@gmail.com', '2016-02-18 07:12:20'),
(103, 'Sumaia', 'hossain7@gmail.com', '2016-02-18 08:55:23'),
(104, 'Nandita', 'hossain8@gmail.com', '2016-02-18 11:41:47'),
(105, 'Mousumi', 'hossain9@gmail.com', '2016-02-18 15:19:46'),
(106, 'Nandita', 'hossain8@gmail.com', '2016-02-19 04:02:53'),
(107, 'Nandita', 'hossain8@gmail.com', '2016-02-19 10:35:20'),
(108, 'Nandita', 'hossain8@gmail.com', '2016-02-19 11:01:53'),
(109, 'Nandita', 'hossain8@gmail.com', '2016-02-19 11:05:53'),
(110, 'Nandita', 'hossain8@gmail.com', '2016-02-19 12:08:09'),
(111, 'Sumaia', 'hossain7@gmail.com', '2016-02-19 12:11:58'),
(112, 'Nazmul001', 'nazmul2@gmail.com', '2016-02-19 13:04:17'),
(113, 'Mousumi', 'hossain9@gmail.com', '2016-02-19 14:09:50');

-- --------------------------------------------------------

--
-- Table structure for table `meta`
--

CREATE TABLE IF NOT EXISTS `meta` (
  `id` int(11) NOT NULL,
  `metakey` text NOT NULL,
  `metadescription` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meta`
--

INSERT INTO `meta` (`id`, `metakey`, `metadescription`) VALUES
(1, 'html,css,js', 'This is kik user meta');

-- --------------------------------------------------------

--
-- Table structure for table `profileview`
--

CREATE TABLE IF NOT EXISTS `profileview` (
  `profileview_id` bigint(20) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `visitor_user_id` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=444 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profileview`
--

INSERT INTO `profileview` (`profileview_id`, `user_id`, `visitor_user_id`, `ip`, `date_time`) VALUES
(1, 'Hossain', 'Hossain', '::1', '2016-02-13 22:31:00'),
(2, 'Hossain', 'Hossain', '::1', '2016-02-13 22:32:25'),
(3, 'Hossain', 'Nazmul', '::1', '2016-02-13 22:32:32'),
(4, 'Hossain', 'Nazmul', '::1', '2016-02-13 22:32:42'),
(5, 'Hossain', 'Nazmul', '::1', '2016-02-13 22:32:43'),
(6, 'Hossain', 'Nazmul', '::1', '2016-02-13 22:32:51'),
(7, 'Hossain', 'Nazmul', '::1', '2016-02-13 22:38:09'),
(8, 'Hossain', 'Hossain', '::1', '2016-02-13 22:38:21'),
(9, 'Hossain', 'Hossain', '::1', '2016-02-13 22:45:22'),
(10, 'Hossain', 'Hossain', '::1', '2016-02-13 22:46:41'),
(11, 'Hossain', 'Hossain', '::1', '2016-02-13 22:46:53'),
(12, 'Hossain', 'Nazmul', '::1', '2016-02-13 23:10:34'),
(13, 'Hossain', 'Nazmul', '::1', '2016-02-13 23:12:32'),
(14, 'Hossain', 'Nazmul', '::1', '2016-02-13 23:13:45'),
(15, 'Nazmul', 'Nazmul', '::1', '2016-02-13 23:14:42'),
(16, 'Nazmul', 'Hossain', '::1', '2016-02-13 23:14:53'),
(17, 'Naima', 'Naima', '::1', '2016-02-13 23:22:00'),
(18, 'Naima', 'Naima', '::1', '2016-02-13 23:25:21'),
(19, 'Naima', 'Naima', '::1', '2016-02-13 23:25:27'),
(20, 'Naima', 'Naima', '::1', '2016-02-13 23:25:57'),
(21, 'Naima', 'Nazmul', '::1', '2016-02-13 23:26:49'),
(22, 'Naima', 'Nazmul', '::1', '2016-02-13 23:26:56'),
(23, 'Hossain', 'Nazmul', '::1', '2016-02-13 23:29:30'),
(24, 'Hossain', 'Selim', '::1', '2016-02-13 23:30:31'),
(25, 'Hossain', 'Nazmul', '::1', '2016-02-13 23:37:39'),
(26, 'Hossain', 'Nazmul', '::1', '2016-02-13 23:40:15'),
(27, 'Hossain', 'Nazmul', '::1', '2016-02-13 23:41:58'),
(28, 'Hossain', '1', '::1', '2016-02-13 23:50:07'),
(29, 'Hossain', 'Hossain', '::1', '2016-02-13 23:50:43'),
(30, 'Sumaia', 'Nandita', '::1', '2016-02-13 23:59:23'),
(31, 'Sumaia', 'Sumaia', '::1', '2016-02-13 23:59:40'),
(32, 'Sumaia', 'Sumaia', '::1', '2016-02-14 00:01:55'),
(33, 'Sumaia', 'Sumaia', '::1', '2016-02-14 00:04:38'),
(34, 'Sumaia', 'Sumaia', '::1', '2016-02-14 00:05:55'),
(35, 'Sumaia', 'Sumaia', '::1', '2016-02-14 00:06:03'),
(36, 'Sumaia', 'Sumaia', '::1', '2016-02-14 00:06:03'),
(37, 'Sumaia', 'Sumaia', '::1', '2016-02-14 00:06:11'),
(38, 'Mousumi', 'Mousumi', '::1', '2016-02-14 00:10:07'),
(39, 'Mousumi', '9', '::1', '2016-02-14 00:12:27'),
(40, 'Mousumi', 'Mousumi', '::1', '2016-02-14 00:13:40'),
(41, 'Mousumi', 'Mousumi', '::1', '2016-02-14 00:15:40'),
(42, 'Mousumi', 'Mousumi', '::1', '2016-02-14 00:15:47'),
(43, 'Nandita', 'Hossain', '::1', '2016-02-14 00:30:58'),
(44, 'Nandita', 'Nazmul', '::1', '2016-02-14 00:31:02'),
(45, 'Nandita', 'Hossain', '::1', '2016-02-14 00:33:35'),
(46, 'Nandita', 'Hossain', '::1', '2016-02-14 00:42:52'),
(47, 'Nandita', 'Hossain', '::1', '2016-02-14 00:44:34'),
(48, 'Nandita', 'Hossain', '::1', '2016-02-14 00:45:11'),
(49, 'Nandita', 'Hossain', '::1', '2016-02-14 00:46:46'),
(50, '0', 'Naima', '::1', '2016-02-14 00:47:00'),
(51, '0', 'Naima', '::1', '2016-02-14 00:47:38'),
(52, '0', 'Naima', '::1', '2016-02-14 00:48:50'),
(53, '0', 'Nazmul', '::1', '2016-02-14 00:49:15'),
(54, '0', 'Hossain', '::1', '2016-02-14 00:49:36'),
(55, 'Nandita', 'Hossain', '::1', '2016-02-14 01:00:18'),
(56, '1', 'Hossain', '::1', '2016-02-14 01:19:20'),
(57, 'Naima', 'Nandita', '::1', '2016-02-14 01:19:53'),
(58, 'Naima', 'Nandita', '::1', '2016-02-14 01:19:58'),
(59, 'Naima', 'Nazmul', '::1', '2016-02-14 01:20:19'),
(60, 'Naima', 'Nazmul', '::1', '2016-02-14 01:20:23'),
(61, 'Naima', '9', '::1', '2016-02-14 01:47:27'),
(62, 'Naima', '9', '::1', '2016-02-14 01:47:35'),
(63, 'Naima', '9', '::1', '2016-02-14 01:47:35'),
(64, 'Naima', '9', '::1', '2016-02-14 01:47:49'),
(65, 'Naima', 'Nazmul', '::1', '2016-02-14 01:54:44'),
(66, '0', '9', '::1', '2016-02-14 01:58:00'),
(67, '0', '9', '::1', '2016-02-14 01:58:24'),
(68, '0', 'Pijush', '::1', '2016-02-14 01:59:47'),
(69, 'Nazmul', 'Pijush', '::1', '2016-02-14 02:00:59'),
(70, 'Nazmul', 'Nazmul', '::1', '2016-02-14 02:02:20'),
(71, 'Nazmul', 'Nazmul', '::1', '2016-02-14 02:06:32'),
(72, '0', 'Mousumi', '::1', '2016-02-14 02:07:15'),
(73, '0', 'Pijush', '::1', '2016-02-14 02:07:26'),
(74, '0', 'Pijush', '::1', '2016-02-14 02:09:17'),
(75, '0', 'Naima', '::1', '2016-02-14 02:10:40'),
(76, 'Naima', 'Nazmul', '::1', '2016-02-14 02:11:11'),
(77, 'Naima', 'Pijush', '::1', '2016-02-14 02:11:20'),
(78, 'Naima', 'Nazmul', '::1', '2016-02-14 02:11:45'),
(79, 'Naima', 'Mousumi', '::1', '2016-02-14 02:11:51'),
(80, 'Naima', 'Mousumi', '::1', '2016-02-14 02:12:50'),
(81, 'Naima', 'Mousumi', '::1', '2016-02-14 02:14:05'),
(82, 'Naima', 'Mousumi', '::1', '2016-02-14 02:14:09'),
(83, 'Naima', 'Mousumi', '::1', '2016-02-14 02:14:22'),
(84, 'Nazmul', 'Nazmul', '::1', '2016-02-14 02:15:50'),
(85, 'Naima', 'Selim', '::1', '2016-02-14 02:16:19'),
(86, 'Nazmul', 'Sumaia', '::1', '2016-02-14 03:19:32'),
(87, 'Nazmul', 'Sumaia', '::1', '2016-02-14 03:20:17'),
(88, 'Nandita', 'Nazmul', '::1', '2016-02-14 04:34:57'),
(89, 'Nandita', 'Nazmul', '::1', '2016-02-14 04:39:01'),
(90, 'Selim', 'Naima', '::1', '2016-02-14 21:22:38'),
(91, 'Selim', 'Sakil', '::1', '2016-02-14 21:23:19'),
(92, 'Selim', 'Nandita', '::1', '2016-02-14 22:02:37'),
(93, 'Selim', 'Naima', '::1', '2016-02-14 22:03:22'),
(94, 'Mousumi', 'Naima', '::1', '2016-02-16 08:37:56'),
(95, 'Selim', 'Naima', '::1', '2016-02-17 04:48:00'),
(96, 'Selim', 'Pijush', '::1', '2016-02-17 04:48:40'),
(97, 'Selim', 'Pijush', '::1', '2016-02-17 04:50:48'),
(98, 'Selim', 'Selim', '::1', '2016-02-17 04:51:19'),
(99, 'Selim', 'Nandita', '::1', '2016-02-17 04:51:47'),
(100, 'Selim', 'Sakil', '::1', '2016-02-17 04:53:46'),
(101, 'Selim', 'Sakil', '::1', '2016-02-17 04:54:02'),
(102, 'Selim', 'Sakil', '::1', '2016-02-17 04:57:22'),
(103, 'Selim', 'Sakil', '::1', '2016-02-17 04:58:08'),
(104, 'Selim', 'Sumaia', '::1', '2016-02-17 04:59:41'),
(105, 'Selim', 'Sumaia', '::1', '2016-02-17 05:03:00'),
(106, 'Selim', 'Nazmul', '::1', '2016-02-17 05:03:45'),
(107, 'Selim', 'Naima', '::1', '2016-02-17 05:08:45'),
(108, 'Selim', 'Naima', '::1', '2016-02-17 05:09:09'),
(109, 'Selim', 'Naima', '::1', '2016-02-17 05:09:38'),
(110, 'Selim', 'Pijush', '::1', '2016-02-17 05:15:59'),
(111, 'Selim', 'Pijush', '::1', '2016-02-17 05:16:09'),
(112, 'Selim', 'Pijush', '::1', '2016-02-17 05:16:26'),
(113, 'Selim', 'Pijush', '::1', '2016-02-17 05:16:35'),
(114, 'Selim', 'Pijush', '::1', '2016-02-17 05:16:50'),
(115, 'Selim', 'Pijush', '::1', '2016-02-17 05:16:55'),
(116, 'Selim', 'Pijush', '::1', '2016-02-17 05:18:59'),
(117, 'Selim', 'Pijush', '::1', '2016-02-17 05:19:28'),
(118, 'Selim', 'Pijush', '::1', '2016-02-17 05:19:57'),
(119, 'Selim', 'Pijush', '::1', '2016-02-17 05:20:03'),
(120, 'Selim', 'Pijush', '::1', '2016-02-17 05:20:07'),
(121, 'Selim', 'Nandita', '::1', '2016-02-17 05:20:16'),
(122, 'Selim', 'Nandita', '::1', '2016-02-17 05:20:20'),
(123, 'Selim', 'Nandita', '::1', '2016-02-17 05:21:44'),
(124, 'Selim', 'Nandita', '::1', '2016-02-17 05:22:47'),
(125, 'Selim', 'Nandita', '::1', '2016-02-17 05:26:37'),
(126, 'Selim', 'Nandita', '::1', '2016-02-17 05:27:07'),
(127, 'Selim', 'Nandita', '::1', '2016-02-17 05:27:25'),
(128, 'Selim', 'Nandita', '::1', '2016-02-17 05:31:20'),
(129, 'Selim', 'Nandita', '::1', '2016-02-17 05:39:23'),
(130, 'Selim', 'Nandita', '::1', '2016-02-17 05:40:11'),
(131, 'Selim', 'Nandita', '::1', '2016-02-17 05:42:20'),
(132, 'Selim', 'Nandita', '::1', '2016-02-17 05:42:26'),
(133, 'Selim', 'Nandita', '::1', '2016-02-17 05:42:33'),
(134, 'Selim', 'Nandita', '::1', '2016-02-17 05:43:08'),
(135, 'Selim', 'Nandita', '::1', '2016-02-17 05:43:13'),
(136, 'Selim', 'Nandita', '::1', '2016-02-17 05:43:16'),
(137, 'Selim', 'Naima', '::1', '2016-02-17 05:45:16'),
(138, 'Selim', 'Naima', '::1', '2016-02-17 05:45:20'),
(139, 'Selim', 'Naima', '::1', '2016-02-17 05:45:22'),
(140, 'Selim', 'Naima', '::1', '2016-02-17 05:45:25'),
(141, 'Selim', 'Mousumi', '::1', '2016-02-17 05:46:08'),
(142, 'Selim', 'Mousumi', '::1', '2016-02-17 05:46:12'),
(143, 'Selim', 'Mousumi', '::1', '2016-02-17 05:46:15'),
(144, 'Selim', 'Mousumi', '::1', '2016-02-17 05:46:19'),
(145, 'Selim', 'Mousumi', '::1', '2016-02-17 05:46:21'),
(146, 'Selim', 'Sakil', '::1', '2016-02-17 05:48:58'),
(147, 'Selim', 'Sakil', '::1', '2016-02-17 05:49:12'),
(148, 'Selim', 'Sakil', '::1', '2016-02-17 05:49:18'),
(149, 'Selim', 'Sakil', '::1', '2016-02-17 05:50:04'),
(150, 'Selim', 'Sakil', '::1', '2016-02-17 05:50:10'),
(151, 'Selim', 'Sakil', '::1', '2016-02-17 05:50:16'),
(152, 'Selim', 'Sakil', '::1', '2016-02-17 05:50:16'),
(153, 'Selim', 'Sakil', '::1', '2016-02-17 05:51:08'),
(154, 'Selim', 'Sakil', '::1', '2016-02-17 05:52:36'),
(155, 'Selim', 'Sakil', '::1', '2016-02-17 05:52:37'),
(156, 'Selim', 'Selim', '::1', '2016-02-17 05:52:45'),
(157, 'Selim', 'Selim', '::1', '2016-02-17 05:52:50'),
(158, 'Selim', 'Mousumi', '::1', '2016-02-17 05:53:06'),
(159, 'Selim', 'Mousumi', '::1', '2016-02-17 05:53:12'),
(160, 'Selim', 'Mousumi', '::1', '2016-02-17 05:54:10'),
(161, 'Selim', 'Mousumi', '::1', '2016-02-17 05:54:21'),
(162, 'Selim', 'Mousumi', '::1', '2016-02-17 05:56:37'),
(163, 'Selim', 'Mousumi', '::1', '2016-02-17 05:56:46'),
(164, 'Selim', 'Mousumi', '::1', '2016-02-17 05:56:50'),
(165, 'Selim', 'Naima', '::1', '2016-02-17 05:57:14'),
(166, '0', 'Pijush', '::1', '2016-02-17 06:04:12'),
(167, '0', 'Pijush', '::1', '2016-02-17 06:05:58'),
(168, '0', 'Pijush', '::1', '2016-02-17 06:06:07'),
(169, '0', 'Pijush', '::1', '2016-02-17 06:07:26'),
(170, '0', 'Pijush', '::1', '2016-02-17 06:07:32'),
(171, '0', 'Pijush', '::1', '2016-02-17 06:07:36'),
(172, '0', 'Pijush', '::1', '2016-02-17 06:08:04'),
(173, '0', '', '::1', '2016-02-17 06:08:06'),
(174, '0', 'Pijush', '::1', '2016-02-17 06:09:11'),
(175, '0', '', '::1', '2016-02-17 06:09:18'),
(176, '0', 'Pijush', '::1', '2016-02-17 06:09:56'),
(177, '0', 'Pijush', '::1', '2016-02-17 06:10:03'),
(178, '0', 'Pijush', '::1', '2016-02-17 06:10:07'),
(179, '0', 'Pijush', '::1', '2016-02-17 06:10:10'),
(180, '0', 'hossain11', '::1', '2016-02-17 06:11:44'),
(181, '0', 'hossain11', '::1', '2016-02-17 06:11:50'),
(182, '0', 'hossain11', '::1', '2016-02-17 06:11:55'),
(183, '0', 'hossain11', '::1', '2016-02-17 06:12:01'),
(184, '0', 'Naima', '::1', '2016-02-17 06:12:45'),
(185, '0', 'Naima', '::1', '2016-02-17 06:12:48'),
(186, '0', 'Sakil', '::1', '2016-02-17 06:13:08'),
(187, '0', 'Sakil', '::1', '2016-02-17 06:13:11'),
(188, '0', 'Sakil', '::1', '2016-02-17 06:15:02'),
(189, '0', 'Sakil', '::1', '2016-02-17 06:15:38'),
(190, '0', 'Sakil', '::1', '2016-02-17 06:17:21'),
(191, '0', 'Sakil', '::1', '2016-02-17 06:19:58'),
(192, '0', 'Sakil', '::1', '2016-02-17 06:20:06'),
(193, '0', 'Sakil', '::1', '2016-02-17 06:20:32'),
(194, '0', 'Sakil', '::1', '2016-02-17 06:21:09'),
(195, '0', 'Sakil', '::1', '2016-02-17 06:21:12'),
(196, '0', 'Sakil', '::1', '2016-02-17 06:21:17'),
(197, '0', 'Sakil', '::1', '2016-02-17 06:21:20'),
(198, '0', 'Sakil', '::1', '2016-02-17 06:25:37'),
(199, '0', 'Sakil', '::1', '2016-02-17 06:25:44'),
(200, '0', 'Sakil', '::1', '2016-02-17 06:27:08'),
(201, '0', 'Sakil', '::1', '2016-02-17 06:27:14'),
(202, '0', 'Sakil', '::1', '2016-02-17 06:27:19'),
(203, '0', 'hossain11', '::1', '2016-02-17 06:28:02'),
(204, '0', 'hossain11', '::1', '2016-02-17 06:29:22'),
(205, '0', 'Naima', '::1', '2016-02-17 06:29:44'),
(206, '0', 'Naima', '::1', '2016-02-17 06:29:57'),
(207, '0', 'Naima', '::1', '2016-02-17 06:30:02'),
(208, '0', 'Naima', '::1', '2016-02-17 06:30:06'),
(209, 'Selim', 'Mousumi', '::1', '2016-02-17 06:31:14'),
(210, 'Selim', 'Mousumi', '::1', '2016-02-17 06:36:26'),
(211, 'Selim', 'Mousumi', '::1', '2016-02-17 06:37:18'),
(212, 'Selim', 'Mousumi', '::1', '2016-02-17 06:37:52'),
(213, 'Selim', 'Mousumi', '::1', '2016-02-17 06:37:52'),
(214, 'Selim', 'Mousumi', '::1', '2016-02-17 06:37:59'),
(215, 'Selim', 'Mousumi', '::1', '2016-02-17 06:39:04'),
(216, '0', 'hossain113', '::1', '2016-02-17 06:46:14'),
(217, '0', 'Naima', '::1', '2016-02-17 06:46:28'),
(218, 'Selim', 'Hossain', '::1', '2016-02-17 06:48:34'),
(219, 'Selim', 'hossain11', '::1', '2016-02-17 06:49:29'),
(220, '0', '', '::1', '2016-02-17 06:50:00'),
(221, '0', 'hossain113', '::1', '2016-02-17 06:55:08'),
(222, '0', 'Hossain', '::1', '2016-02-17 06:55:26'),
(223, 'Selim', 'hossain11', '::1', '2016-02-17 06:55:59'),
(224, 'Selim', 'hossain11', '::1', '2016-02-17 06:56:05'),
(225, 'Selim', 'hossain11', '::1', '2016-02-17 06:56:11'),
(226, 'Selim', 'hossain11', '::1', '2016-02-17 06:56:11'),
(227, '1', 'Naima', '::1', '2016-02-17 08:23:11'),
(228, '1', 'Naima', '::1', '2016-02-17 08:27:17'),
(229, '1', 'Naima', '::1', '2016-02-17 08:27:21'),
(230, 'Mousumi', 'Naima', '::1', '2016-02-17 08:29:28'),
(231, 'Mousumi', 'Naima', '::1', '2016-02-17 08:30:31'),
(232, 'Mousumi', 'Naima', '::1', '2016-02-17 08:31:18'),
(233, 'Mousumi', 'Naima', '::1', '2016-02-17 08:32:26'),
(234, 'Mousumi', 'Naima', '::1', '2016-02-17 08:33:19'),
(235, 'Mousumi', 'Naima', '::1', '2016-02-17 08:33:28'),
(236, 'Mousumi', 'Naima', '::1', '2016-02-17 08:33:28'),
(237, 'Mousumi', 'Naima', '::1', '2016-02-17 08:33:29'),
(238, 'Mousumi', 'Naima', '::1', '2016-02-17 08:33:30'),
(239, 'Mousumi', 'Naima', '::1', '2016-02-17 08:33:40'),
(240, 'Mousumi', 'Naima', '::1', '2016-02-17 08:34:06'),
(241, '1', 'Naima', '::1', '2016-02-17 08:38:34'),
(242, '1', 'Naima', '::1', '2016-02-17 08:38:49'),
(243, '1', 'Naima', '::1', '2016-02-17 08:39:39'),
(244, '1', 'Naima', '::1', '2016-02-17 08:40:01'),
(245, '1', 'Naima', '::1', '2016-02-17 08:40:46'),
(246, 'Mousumi', 'Naima', '::1', '2016-02-17 08:42:46'),
(247, '1', 'Naima', '::1', '2016-02-17 08:43:14'),
(248, '1', 'Naima', '::1', '2016-02-17 08:45:07'),
(249, '1', 'Naima', '::1', '2016-02-17 08:45:50'),
(250, '1', 'Naima', '::1', '2016-02-17 08:46:36'),
(251, '1', 'Naima', '::1', '2016-02-17 08:47:47'),
(252, '1', 'Naima', '::1', '2016-02-17 08:48:33'),
(253, '1', 'Naima', '::1', '2016-02-17 08:49:07'),
(254, '1', 'Naima', '::1', '2016-02-17 08:49:59'),
(255, '1', 'Naima', '::1', '2016-02-17 08:50:14'),
(256, '1', 'Naima', '::1', '2016-02-17 08:52:30'),
(257, '1', 'Naima', '::1', '2016-02-17 08:53:21'),
(258, '1', 'Naima', '::1', '2016-02-17 08:54:11'),
(259, '1', 'Naima', '::1', '2016-02-17 08:55:50'),
(260, '1', 'Naima', '::1', '2016-02-17 08:57:23'),
(261, '1', 'Naima', '::1', '2016-02-17 08:59:27'),
(262, '1', 'Naima', '::1', '2016-02-17 08:59:54'),
(263, '1', 'Naima', '::1', '2016-02-17 09:00:13'),
(264, '1', 'Naima', '::1', '2016-02-17 09:00:25'),
(265, '1', 'Naima', '::1', '2016-02-17 09:00:57'),
(266, '1', 'Naima', '::1', '2016-02-17 09:01:31'),
(267, '1', 'Naima', '::1', '2016-02-17 09:02:30'),
(268, '1', 'Naima', '::1', '2016-02-17 09:02:47'),
(269, '1', 'Naima', '::1', '2016-02-17 09:06:31'),
(270, '1', 'Naima', '::1', '2016-02-17 09:06:44'),
(271, 'Mousumi', 'Naima', '::1', '2016-02-17 09:10:28'),
(272, 'Mousumi', 'Naima', '::1', '2016-02-17 09:12:19'),
(273, 'Mousumi', 'Naima', '::1', '2016-02-17 09:12:42'),
(274, 'Mousumi', 'Naima', '::1', '2016-02-17 09:13:29'),
(275, 'Mousumi', 'Naima', '::1', '2016-02-17 09:13:53'),
(276, '1', 'Naima', '::1', '2016-02-17 09:14:51'),
(277, '1', 'Naima', '::1', '2016-02-17 09:16:53'),
(278, '1', 'Naima', '::1', '2016-02-17 09:17:12'),
(279, '1', 'Naima', '::1', '2016-02-17 09:18:01'),
(280, '1', 'Pijush', '::1', '2016-02-17 09:18:17'),
(281, '1', 'hossain11', '::1', '2016-02-17 09:18:36'),
(282, '1', 'hossain11', '::1', '2016-02-17 09:19:02'),
(283, '1', 'hossain11', '::1', '2016-02-17 09:22:07'),
(284, '1', 'hossain11', '::1', '2016-02-17 09:22:49'),
(285, '1', 'hossain11', '::1', '2016-02-17 09:23:19'),
(286, '1', 'hossain11', '::1', '2016-02-17 09:23:44'),
(287, '1', 'hossain11', '::1', '2016-02-17 09:24:22'),
(288, '1', 'hossain11', '::1', '2016-02-17 09:26:28'),
(289, '1', 'hossain11', '::1', '2016-02-17 09:27:38'),
(290, '1', 'Sakil', '::1', '2016-02-17 09:28:12'),
(291, '1', 'Sakil', '::1', '2016-02-17 09:28:18'),
(292, '1', 'Sakil', '::1', '2016-02-17 09:31:40'),
(293, '0', 'Naima', '::1', '2016-02-17 09:34:37'),
(294, '0', 'Naima', '::1', '2016-02-17 09:34:48'),
(295, '0', 'Pijush', '::1', '2016-02-17 09:35:09'),
(296, '0', 'Naima', '::1', '2016-02-17 09:35:30'),
(297, '0', 'Naima', '::1', '2016-02-17 09:36:21'),
(298, '0', 'Naima', '::1', '2016-02-17 09:36:28'),
(299, 'hossain113', 'Naima', '::1', '2016-02-17 09:37:15'),
(300, 'hossain113', 'Naima', '::1', '2016-02-17 09:37:23'),
(301, 'hossain113', 'Naima', '::1', '2016-02-17 09:40:52'),
(302, '1', 'Sakil', '::1', '2016-02-17 09:40:57'),
(303, '1', 'Sakil', '::1', '2016-02-17 09:48:46'),
(304, '1', 'Sakil', '::1', '2016-02-17 09:48:51'),
(305, '1', 'Pijush', '::1', '2016-02-17 09:49:31'),
(306, '1', 'Pijush', '::1', '2016-02-17 09:50:09'),
(307, 'hossain113', 'Naima', '::1', '2016-02-17 10:11:30'),
(308, 'Selim', 'Naima', '::1', '2016-02-17 10:14:08'),
(309, 'Selim', 'Naima', '::1', '2016-02-17 10:14:15'),
(310, 'Selim', 'Naima', '::1', '2016-02-17 10:15:06'),
(311, 'hossain113', 'Sakil', '::1', '2016-02-17 10:15:31'),
(312, 'hossain113', 'Sakil', '::1', '2016-02-17 10:15:39'),
(313, 'Selim', 'Naima', '::1', '2016-02-17 10:16:14'),
(314, 'Selim', 'Naima', '::1', '2016-02-17 10:16:19'),
(315, 'Selim', 'Naima', '::1', '2016-02-17 10:17:49'),
(316, 'Selim', 'Naima', '::1', '2016-02-17 10:19:30'),
(317, 'Selim', 'Naima', '::1', '2016-02-17 10:19:49'),
(318, 'Selim', 'Naima', '::1', '2016-02-17 10:20:09'),
(319, 'Selim', 'Naima', '::1', '2016-02-17 10:20:30'),
(320, 'Selim', 'Naima', '::1', '2016-02-17 10:21:04'),
(321, 'Selim', 'Pijush', '::1', '2016-02-17 10:21:21'),
(322, 'Selim', 'Pijush', '::1', '2016-02-17 10:27:36'),
(323, 'Selim', 'Pijush', '::1', '2016-02-17 10:27:50'),
(324, 'Selim', 'Pijush', '::1', '2016-02-17 10:30:21'),
(325, 'Selim', 'Pijush', '::1', '2016-02-17 10:30:26'),
(326, 'Selim', 'Pijush', '::1', '2016-02-17 10:30:39'),
(327, 'Selim', 'Naima', '::1', '2016-02-17 10:35:10'),
(328, 'Selim', 'Naima', '::1', '2016-02-17 10:35:13'),
(329, 'Selim', 'Naima', '::1', '2016-02-17 10:35:16'),
(330, 'Selim', 'Naima', '::1', '2016-02-17 10:35:19'),
(331, 'hossain113', 'Naima', '::1', '2016-02-17 10:51:31'),
(332, '0', 'Selim', '::1', '2016-02-17 11:00:43'),
(333, '0', 'Selim', '::1', '2016-02-17 11:01:27'),
(334, '0', 'Selim', '::1', '2016-02-17 11:02:09'),
(335, '0', 'Selim', '::1', '2016-02-17 11:02:11'),
(336, '0', 'Pijush', '::1', '2016-02-17 11:05:53'),
(337, '0', 'Pijush', '::1', '2016-02-17 11:08:07'),
(338, '0', 'Pijush', '::1', '2016-02-17 11:08:11'),
(339, '0', 'Pijush', '::1', '2016-02-17 11:08:18'),
(340, '0', 'Pijush', '::1', '2016-02-17 11:08:27'),
(341, '0', 'Pijush', '::1', '2016-02-17 11:11:38'),
(342, '0', 'Naima', '::1', '2016-02-17 11:16:01'),
(343, '0', 'Naima', '::1', '2016-02-17 11:16:13'),
(344, '0', 'Naima', '::1', '2016-02-17 11:16:16'),
(345, '0', 'Naima', '::1', '2016-02-17 11:16:19'),
(346, '0', 'Naima', '::1', '2016-02-17 11:16:24'),
(347, '0', 'Naima', '::1', '2016-02-17 11:16:57'),
(348, '0', 'Selim', '::1', '2016-02-17 11:18:09'),
(349, 'Sakil', 'Naima', '::1', '2016-02-17 11:22:44'),
(350, 'Sakil', 'Naima', '::1', '2016-02-17 11:22:54'),
(351, 'Sakil', 'Naima', '::1', '2016-02-17 11:23:21'),
(352, 'Sakil', 'Naima', '::1', '2016-02-17 11:23:34'),
(353, 'Sakil', 'Naima', '::1', '2016-02-17 11:23:50'),
(354, 'Sakil', 'Naima', '::1', '2016-02-17 11:26:29'),
(355, 'Sakil', 'Naima', '::1', '2016-02-17 11:26:43'),
(356, 'Pijush', 'Naima', '::1', '2016-02-17 11:32:45'),
(357, 'Pijush', 'Naima', '::1', '2016-02-17 11:52:12'),
(358, '0', 'Pijush', '::1', '2016-02-17 11:53:23'),
(359, 'Sakil', 'Naima', '::1', '2016-02-17 11:54:11'),
(360, 'Sakil', 'Selim', '::1', '2016-02-17 11:54:34'),
(361, 'Sakil', 'Selim', '::1', '2016-02-17 11:54:45'),
(362, '0', 'Nandita', '::1', '2016-02-17 12:19:35'),
(363, 'Selim', 'Naima', '::1', '2016-02-17 12:27:35'),
(364, 'Selim', 'Naima', '::1', '2016-02-17 12:31:33'),
(365, 'Sumaia', 'Pijush', '::1', '2016-02-17 12:48:52'),
(366, '0', 'Nandita', '::1', '2016-02-17 12:52:39'),
(367, '0', 'Nandita', '::1', '2016-02-17 12:53:09'),
(368, 'Mousumi', 'Naima', '::1', '2016-02-17 13:42:05'),
(369, 'Mousumi', 'Naima', '::1', '2016-02-17 13:42:24'),
(370, 'Mousumi', 'Naima', '::1', '2016-02-17 13:48:14'),
(371, 'Mousumi', 'Naima', '::1', '2016-02-17 13:48:48'),
(372, 'Mousumi', 'Naima', '::1', '2016-02-17 13:49:04'),
(373, 'Mousumi', 'Naima', '::1', '2016-02-17 13:49:53'),
(374, 'Mousumi', 'Pijush', '::1', '2016-02-17 13:51:46'),
(375, 'Mousumi', 'Sakil', '::1', '2016-02-17 13:52:10'),
(376, '0', 'hossain11', '::1', '2016-02-17 13:53:51'),
(377, '0', 'Naima', '::1', '2016-02-17 13:55:32'),
(378, '0', 'Naima', '::1', '2016-02-17 13:59:22'),
(379, '0', 'Naima', '::1', '2016-02-17 14:00:22'),
(380, 'Mousumi', 'Naima', '::1', '2016-02-17 14:01:45'),
(381, 'Mousumi', 'Pijush', '::1', '2016-02-17 14:01:53'),
(382, 'Mousumi', 'Pijush', '::1', '2016-02-17 14:02:03'),
(383, '0', 'Naima', '::1', '2016-02-17 14:08:37'),
(384, '0', 'Naima', '::1', '2016-02-17 14:10:10'),
(385, '0', 'Naima', '::1', '2016-02-17 14:10:55'),
(386, '0', 'Naima', '::1', '2016-02-17 14:11:19'),
(387, '0', 'Naima', '::1', '2016-02-17 14:12:24'),
(388, 'Selim', 'Selim', '::1', '2016-02-17 14:15:10'),
(389, 'Selim', 'Selim', '::1', '2016-02-17 14:17:46'),
(390, 'Selim', 'Sakil', '::1', '2016-02-17 14:18:03'),
(391, 'Selim', 'Pijush', '::1', '2016-02-17 14:32:03'),
(392, 'Selim', 'Pijush', '::1', '2016-02-17 14:32:08'),
(393, 'Nazmul001', 'Nazmul001', '::1', '2016-02-17 15:00:25'),
(394, 'Nazmul001', 'Nazmul001', '::1', '2016-02-17 15:00:36'),
(395, 'Selim', 'Naima', '::1', '2016-02-18 05:30:04'),
(396, '0', 'Pijush', '::1', '2016-02-18 05:30:16'),
(397, '0', 'Naima', '::1', '2016-02-18 05:36:07'),
(398, '0', 'Naima', '::1', '2016-02-18 05:38:06'),
(399, '0', 'Naima', '::1', '2016-02-18 05:38:19'),
(400, '0', 'Pijush', '::1', '2016-02-18 07:23:57'),
(401, '0', 'Sakil', '::1', '2016-02-18 07:29:43'),
(402, '0', 'Sakil', '::1', '2016-02-18 07:34:34'),
(403, '0', 'Sakil', '::1', '2016-02-18 07:34:59'),
(404, '0', 'Sakil', '::1', '2016-02-18 07:35:19'),
(405, '0', 'Sakil', '::1', '2016-02-18 07:38:38'),
(406, '0', 'Sakil', '::1', '2016-02-18 07:43:06'),
(407, '0', 'Sakil', '::1', '2016-02-18 07:44:22'),
(408, '0', 'Sakil', '::1', '2016-02-18 07:45:21'),
(409, '0', 'Sakil', '::1', '2016-02-18 07:46:30'),
(410, '0', 'Nandita', '::1', '2016-02-18 10:13:13'),
(411, '0', 'Naima', '::1', '2016-02-18 10:13:22'),
(412, '0', 'Selim', '::1', '2016-02-18 10:15:28'),
(413, '0', 'Hossain', '::1', '2016-02-18 10:15:48'),
(414, '0', 'Selim', '::1', '2016-02-18 10:16:05'),
(415, '0', 'Nazmul001', '::1', '2016-02-18 11:30:37'),
(416, '0', 'Naima', '::1', '2016-02-18 11:38:36'),
(417, 'Nandita', 'Pijush', '::1', '2016-02-19 04:04:20'),
(418, 'Nandita', 'Pijush', '::1', '2016-02-19 04:10:27'),
(419, 'Nandita', 'Pijush', '::1', '2016-02-19 04:12:17'),
(420, 'Nandita', 'hossain11', '::1', '2016-02-19 04:25:14'),
(421, 'Nandita', 'hossain113', '::1', '2016-02-19 04:28:40'),
(422, '1', 'Naima', '::1', '2016-02-19 10:32:43'),
(423, '1', 'Naima', '::1', '2016-02-19 10:34:36'),
(424, 'Nandita', 'Pijush', '::1', '2016-02-19 10:54:38'),
(425, 'Nandita', 'Pijush', '::1', '2016-02-19 10:56:46'),
(426, 'Nandita', 'Pijush', '::1', '2016-02-19 10:58:28'),
(427, 'Nandita', 'Pijush', '::1', '2016-02-19 10:59:02'),
(428, 'Nandita', 'Selim', '::1', '2016-02-19 11:08:48'),
(429, 'Nandita', 'Selim', '::1', '2016-02-19 11:09:23'),
(430, '0', 'Sakil', '::1', '2016-02-19 12:08:31'),
(431, '0', 'Sakil', '::1', '2016-02-19 12:10:41'),
(432, '0', 'Sakil', '::1', '2016-02-19 12:11:24'),
(433, '0', 'Sakil', '::1', '2016-02-19 12:11:34'),
(434, 'Sumaia', 'Naima', '::1', '2016-02-19 12:12:11'),
(435, 'Sumaia', 'Naima', '::1', '2016-02-19 12:13:05'),
(436, 'Sumaia', 'Naima', '::1', '2016-02-19 12:14:47'),
(437, '0', 'Naima', '::1', '2016-02-19 13:00:27'),
(438, '0', 'Naima', '::1', '2016-02-19 13:03:45'),
(439, '0', 'Pijush', '::1', '2016-02-19 13:04:01'),
(440, '0', 'Sakil', '::1', '2016-02-19 13:04:09'),
(441, 'Sumaia', 'Naima', '::1', '2016-02-19 13:10:29'),
(442, '0', 'hossaincse256', '::1', '2016-02-19 14:08:15'),
(443, 'Mousumi', 'hossain113', '::1', '2016-02-19 14:10:22');

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE IF NOT EXISTS `reg` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`id`, `fullname`, `user_name`, `user_email`, `user_pass`) VALUES
(1, 'MD Hossain', 'admin', 'admin@gmail.com', '$2y$10$RY46cDH0ouHmv7G0D5iLR.9nqCsvP6tiOaFbvuN82paAoUD47cfa6'),
(2, 'admin', 'hossain', 'hossaincse2@gmail.com', '$2y$10$CXdHwfpt3qnkGxqJr1U0COCWahuzxXDk7BCNX2ms/kxWKmhjmDBAC'),
(3, 'Mohammad Hossain', 'hossain33', 'admin123@gmail.com', '$2y$10$jAIWTKP8BLZSIIOgkI16M.2ihlaPt0pnrfDFGZC59QLczKDECFM8m'),
(5, 'Mohammad Hossain', 'hossain334', 'admin5656@gmail.com', '$2y$10$I47IZd7NrXq2q4tqoELwd.BLRDXou0dFs..pSNWGJ.tnVF4fw0sc6');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `kikuser` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `other_accounts` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `profile_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `report_id` varchar(100) NOT NULL,
  `report` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `user_id`, `report_id`, `report`, `date`) VALUES
(1, 'Naima', 'Nandita', 'sd sds d', '2016-02-14 01:19:58'),
(2, 'Naima', 'Nazmul', 's dsad sd', '2016-02-14 01:20:23'),
(5, 'hossain113', 'Naima', 'sdf sf d', '2016-02-17 09:37:23'),
(6, 'Hossain', 'Sakil', 'sad asd', '2016-02-17 09:48:51'),
(8, 'hossain113', 'Sakil', 'asds d', '2016-02-17 10:15:39'),
(9, 'Selim', 'Naima', 'sadsad', '2016-02-17 10:16:19'),
(10, 'Mousumi', 'Pijush', 'aaaaa', '2016-02-17 14:02:04'),
(11, 'Selim', 'Pijush', 'sdsd', '2016-02-17 14:32:08');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe_mail`
--

CREATE TABLE IF NOT EXISTS `subscribe_mail` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ip_address2` varchar(100) NOT NULL,
  `curr_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribe_mail`
--

INSERT INTO `subscribe_mail` (`id`, `email`, `ip_address2`, `curr_date`) VALUES
(1, 'admin101@gmail.com', '::1', '0000-00-00 00:00:00'),
(4, 'admin@gmail.com', '::1', '0000-00-00 00:00:00'),
(5, 'admin101@gmail.com', '::1', '0000-00-00 00:00:00'),
(6, 'admin101@gmail.com', '::1', '0000-00-00 00:00:00'),
(7, 'admin103@gmail.com', '::1', '0000-00-00 00:00:00'),
(8, 'admin2@gmail.com', '::1', '0000-00-00 00:00:00'),
(9, 'sdfsdf@ggmail.com', '::1', '0000-00-00 00:00:00'),
(10, 'admin24545sdd5@gmail.com', '::1', '0000-00-00 00:00:00'),
(11, 'admin1043@gmail.com', '::1', '0000-00-00 00:00:00'),
(12, 'admin100@gmail.com', '::1', '0000-00-00 00:00:00'),
(13, 'admin1@gmail.com', '::1', '0000-00-00 00:00:00'),
(14, 'admin109@gmail.com', '::1', '0000-00-00 00:00:00'),
(15, 'admin100767@gmail.com', '::1', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `kikuser` varchar(100) NOT NULL,
  `about` text NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` int(11) NOT NULL,
  `agree` int(2) NOT NULL,
  `newsleter` int(2) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `other_accounts` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `profile_img` varchar(100) NOT NULL,
  `kik_img` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `suspended` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `kikuser`, `about`, `country`, `city`, `email`, `password`, `gender`, `agree`, `newsleter`, `phone`, `other_accounts`, `website`, `profile_img`, `kik_img`, `date`, `suspended`) VALUES
(1, 'MD', 'Hossain', 'Hossain', 'Mosumi', '', '', 'Dhaka', 'admin245455@gmail.com', '123456', 1, 1, 1, '01776427516', 'skype', 'fdgd gfd g', '', 'http://profilepics.cf.kik.com/BS9wjsomh5fCgNGQk8HLm3XhFTk/thumb.jpg', '2016-02-13 22:26:37', 2),
(2, '', '', 'Nazmul', 'nazmul', '', 'Bangladesh', 'Dhaka', 'hossain2@gmail.com', '123456', 1, 1, 1, '', '', '', '', 'http://profilepics.cf.kik.com/xIrofUKyHIdr7hCg_MTeOo8aUlI/thumb.jpg', '2016-02-13 22:27:00', 2),
(3, 'Mousumi', 'Sarkar', 'Naima', 'naima', 's dsads dd', 'United Kingdom', 'Dhaka', 'hossain3@gmail.com', '123456', 1, 1, 1, '01776427516', 'hossain.cse2(skype)', 'http://www.w3schools.com', '', 'http://profilepics.cf.kik.com/BS9wjsomh5fCgNGQk8HLm3XhFTk/thumb.jpg', '2016-02-13 22:27:18', 1),
(4, '', '', 'Pijush', 'pijush', '', 'United States', 'London', 'hossain4@gmail.com', '123456', 1, 1, 1, '', '', '', '', 'http://profilepics.cf.kik.com/_wX5RXg5s7ZV29salYzl1k2N8IY/thumb.jpg', '2016-02-13 22:28:31', 1),
(5, 'Nandita', 'Hossain', 'Selim', 'pijush', 'f ggfg fdg', 'United Kingdom', 'London', 'hossain5@gmail.com', '123456', 1, 1, 1, '01776427516', 'hossain.cse2(skype)', 'http://www.w3schools.com', '', 'http://profilepics.cf.kik.com/_wX5RXg5s7ZV29salYzl1k2N8IY/thumb.jpg', '2016-02-13 22:28:43', 1),
(6, '', '', 'Sakil', 'sakil', '', 'United Kingdom', 'London', 'hossain6@gmail.com', '123456', 1, 1, 1, '', '', '', '', 'http://profilepics.cf.kik.com/JM_t-uxDc5aOMc-VOnHbfyCuXOU/thumb.jpg', '2016-02-13 22:28:59', 1),
(7, '', '', 'Sumaia', 'sumaia', '', 'United Kingdom', 'London', 'hossain7@gmail.com', '123456', 1, 1, 1, '', '', '', '', '', '2016-02-13 22:29:19', 1),
(8, 'Nandita', 'Ray', 'Nandita', 'nandita', 'Please fill in the basic personal information in the following fields.Please fill in the basic personal information in the following fields.', 'United Kingdom', 'London', 'hossain8@gmail.com', '123456', 2, 1, 1, '01776427516', '', '', '', '', '2016-02-13 22:29:41', 1),
(9, 'Mousumi', 'Sarkar', 'Mousumi', 'pijush', 'Please fill in the basic personal information in the following fields. Please fill in the basic personal information in the following fields.Please fill in the basic personal information in the following fields.', 'United Kingdom', 'Lakshmipur', 'hossain9@gmail.com', '123456', 2, 1, 1, '01776427516', 'hossain.cse2(skype)', 'http://www.w3schools.com', '', '', '2016-02-14 00:09:44', 1),
(10, '', '', 'hossain11', 'pijush', '', 'United Kingdom', '', 'admin1@gmail.com', '1234567', 1, 0, 0, '', '', '', '', 'http://profilepics.cf.kik.com/_wX5RXg5s7ZV29salYzl1k2N8IY/thumb.jpg', '2016-02-15 14:14:10', 1),
(11, '', '', 'hossain113', 'pijush', '', 'United Kingdom', '', 'admin10038642@gmail.com', '123456', 1, 0, 0, '', '', '', '', 'http://profilepics.cf.kik.com/_wX5RXg5s7ZV29salYzl1k2N8IY/thumb.jpg', '2016-02-15 14:22:06', 1),
(12, '', '', 'hossaincse256', 'pijush', '', 'India', '', 'admin10009df86@gmail.com', '123456', 1, 0, 0, '', '', '', '', 'http://profilepics.cf.kik.com/_wX5RXg5s7ZV29salYzl1k2N8IY/thumb.jpg', '2016-02-17 14:55:36', 1),
(13, '', '', 'Nazmul001', 'pijush', 'We are not finished yet though. Currently, the code is storing this information for every user. We want it to remember only those users who specifically request this functionality. To do this, we run a simple check before we create the additional cookie. This check looks to see if the remember me checkbox has been checked, and only creates our new cookie if it has. Like so:', 'India', 'Dhaka', 'nazmul2@gmail.com', '123456', 1, 0, 0, '', '', '', '', 'http://profilepics.cf.kik.com/_wX5RXg5s7ZV29salYzl1k2N8IY/thumb.jpg', '2016-02-17 14:57:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_timeline`
--

CREATE TABLE IF NOT EXISTS `user_timeline` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `timeline_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE IF NOT EXISTS `vote` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `profileid` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`id`, `user_id`, `profileid`, `date`) VALUES
(1, 'Hossain', 'Hossain', '2016-02-13 22:38:23'),
(2, 'Nazmul', 'Hossain', '2016-02-13 23:14:55'),
(3, 'Naima', 'Naima', '2016-02-13 23:25:24'),
(7, 'Naima', 'Nazmul', '2016-02-13 23:26:59'),
(8, 'Hossain', 'Selim', '2016-02-13 23:30:35'),
(9, 'Hossain', 'Pijush', '2016-02-13 23:47:23'),
(10, 'Hossain', 'Nandita', '2016-02-13 23:47:24'),
(11, 'Hossain', 'Sumaia', '2016-02-13 23:47:25'),
(12, 'Hossain', 'Nazmul', '2016-02-13 23:47:26'),
(13, 'Hossain', 'Sakil', '2016-02-13 23:47:26'),
(14, 'Hossain', 'Naima', '2016-02-13 23:47:27'),
(15, 'Sumaia', 'Nandita', '2016-02-13 23:59:24'),
(16, 'Mousumi', 'Mousumi', '2016-02-14 00:10:11'),
(17, 'Naima', 'Mousumi', '2016-02-14 02:12:15'),
(18, 'Naima', 'Sakil', '2016-02-14 02:16:55'),
(19, 'Selim', 'Selim', '2016-02-14 04:23:22'),
(20, 'Nandita', 'Sakil', '2016-02-14 04:44:09'),
(21, 'Selim', 'Naima', '2016-02-14 21:22:40'),
(22, 'Selim', 'Sakil', '2016-02-14 21:23:22'),
(23, 'Mousumi', 'Naima', '2016-02-17 08:33:45'),
(24, '1', 'Naima', '2016-02-17 08:45:55'),
(25, '1', 'hossain11', '2016-02-17 09:23:22'),
(26, '1', 'Sakil', '2016-02-17 09:28:15'),
(27, '1', 'Pijush', '2016-02-17 09:50:07'),
(28, 'Sakil', 'Naima', '2016-02-17 11:26:50'),
(29, 'Pijush', 'hossain11', '2016-02-17 11:45:48'),
(30, 'Pijush', 'Nazmul', '2016-02-17 11:48:45'),
(31, 'Pijush', 'Hossain', '2016-02-17 11:49:43'),
(32, 'Pijush', 'Pijush', '2016-02-17 11:50:40'),
(33, 'Pijush', 'hossain113', '2016-02-17 11:51:04'),
(34, 'Pijush', 'Naima', '2016-02-17 11:51:13'),
(35, 'Sakil', 'Selim', '2016-02-17 11:54:40'),
(36, 'Nazmul001', 'Nazmul001', '2016-02-17 15:00:27'),
(37, 'Nandita', 'hossain11', '2016-02-19 04:25:18'),
(38, 'Nandita', 'hossain113', '2016-02-19 04:28:54'),
(39, 'Mousumi', 'Nandita', '2016-02-19 14:18:06'),
(40, 'Mousumi', 'hossain11', '2016-02-19 14:18:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments_blog_reply`
--
ALTER TABLE `comments_blog_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments_reply`
--
ALTER TABLE `comments_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `last_login`
--
ALTER TABLE `last_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta`
--
ALTER TABLE `meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profileview`
--
ALTER TABLE `profileview`
  ADD PRIMARY KEY (`profileview_id`);

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribe_mail`
--
ALTER TABLE `subscribe_mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_timeline`
--
ALTER TABLE `user_timeline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `comments_blog_reply`
--
ALTER TABLE `comments_blog_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `comments_reply`
--
ALTER TABLE `comments_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=240;
--
-- AUTO_INCREMENT for table `last_login`
--
ALTER TABLE `last_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `meta`
--
ALTER TABLE `meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `profileview`
--
ALTER TABLE `profileview`
  MODIFY `profileview_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=444;
--
-- AUTO_INCREMENT for table `reg`
--
ALTER TABLE `reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `subscribe_mail`
--
ALTER TABLE `subscribe_mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user_timeline`
--
ALTER TABLE `user_timeline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
