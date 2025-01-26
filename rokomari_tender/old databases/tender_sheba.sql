-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2018 at 07:46 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tender_sheba`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(5, 'generate_invoice', 'generate sale and return invoice'),
(6, 'stock_manage', 'insert product, stock entry, product update'),
(7, 'setup_user', 'Add, Edit Setup Information');

-- --------------------------------------------------------

--
-- Table structure for table `ts_categories`
--

CREATE TABLE `ts_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_desc` varchar(255) NOT NULL,
  `category_created` datetime NOT NULL,
  `category_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ts_categories`
--

INSERT INTO `ts_categories` (`category_id`, `category_name`, `category_desc`, `category_created`, `category_updated`) VALUES
(8, 'AgroCat', 'Cable Category Description', '2017-11-12 12:35:01', '2018-01-27 04:26:00'),
(9, 'Circuit Breaker', 'Circuit Breaker Description', '2017-11-12 12:35:31', '2017-11-12 06:35:31'),
(10, 'adsdfds', '', '2018-01-31 11:48:15', '2018-01-31 05:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `ts_districts`
--

CREATE TABLE `ts_districts` (
  `district_id` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  `district_name` varchar(20) NOT NULL,
  `district_short_name` varchar(10) NOT NULL,
  `district_created` datetime NOT NULL,
  `district_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ts_districts`
--

INSERT INTO `ts_districts` (`district_id`, `division_id`, `district_name`, `district_short_name`, `district_created`, `district_updated`) VALUES
(1, 1, 'fgf', 'Ctg Dis', '2018-01-25 16:50:02', '2018-01-31 05:47:29'),
(2, 1, 'Raojan', 'Rj Dis', '2018-01-25 17:06:26', '2018-01-25 11:06:26'),
(3, 2, 'Dhaka Sodor', 'Dhk Sr Dis', '2018-01-25 17:06:58', '2018-01-25 11:06:58'),
(4, 1, 'sdfd', '', '2018-01-31 11:46:53', '2018-01-31 05:46:53');

-- --------------------------------------------------------

--
-- Table structure for table `ts_divisions`
--

CREATE TABLE `ts_divisions` (
  `division_id` int(11) NOT NULL,
  `division_name` varchar(20) NOT NULL,
  `division_short_name` varchar(10) NOT NULL,
  `division_created` datetime NOT NULL,
  `division_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ts_divisions`
--

INSERT INTO `ts_divisions` (`division_id`, `division_name`, `division_short_name`, `division_created`, `division_updated`) VALUES
(1, 'Chittagong', 'Ctg', '2018-01-25 15:31:12', '2018-01-25 09:50:53'),
(2, 'Dhaka', 'Dhk', '2018-01-25 15:51:13', '2018-01-25 09:51:13'),
(3, 'Borisal', 'Bor', '2018-01-25 15:51:33', '2018-01-25 09:51:33'),
(4, 'ddd', '', '2018-01-31 11:44:57', '2018-01-31 05:44:57');

-- --------------------------------------------------------

--
-- Table structure for table `ts_inviters`
--

CREATE TABLE `ts_inviters` (
  `inviter_id` int(11) NOT NULL,
  `inviter_name` varchar(100) NOT NULL,
  `inviter_type` tinyint(1) NOT NULL COMMENT '1 = NGO, 2 = Government, 3 = Private',
  `inviter_created` datetime NOT NULL,
  `inviter_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ts_inviters`
--

INSERT INTO `ts_inviters` (`inviter_id`, `inviter_name`, `inviter_type`, `inviter_created`, `inviter_updated`) VALUES
(1, 'East West Uni', 1, '2018-01-24 10:17:20', '2018-01-24 05:06:39'),
(2, 'East West Uni1', 2, '2018-01-24 11:03:16', '2018-01-24 05:03:34'),
(3, 'qq', 1, '2018-01-31 11:08:36', '2018-01-31 05:08:36');

-- --------------------------------------------------------

--
-- Table structure for table `ts_payment_history`
--

CREATE TABLE `ts_payment_history` (
  `payment_id` int(11) NOT NULL,
  `webu_id` int(11) NOT NULL,
  `payment_month` int(11) NOT NULL,
  `payment_year` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_by` int(1) NOT NULL COMMENT '1 = Bkash, 2 = Bank, 3 = Cash',
  `payment_remarks` varchar(255) NOT NULL,
  `payment_amount` int(11) NOT NULL,
  `payment_created` datetime NOT NULL,
  `payment_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ts_payment_history`
--

INSERT INTO `ts_payment_history` (`payment_id`, `webu_id`, `payment_month`, `payment_year`, `payment_date`, `payment_by`, `payment_remarks`, `payment_amount`, `payment_created`, `payment_updated`) VALUES
(1, 2, 1, 2016, '2018-01-28', 2, '----', 0, '2018-02-01 11:25:33', '2018-02-01 05:45:13'),
(2, 2, 2, 2016, '2018-01-29', 1, 'adsfsd', 0, '2018-02-03 11:09:31', '2018-02-03 05:09:31'),
(3, 2, 3, 2016, '2018-01-30', 3, 'sdfsdfd', 0, '2018-02-03 11:10:52', '2018-02-03 05:10:52'),
(4, 2, 4, 2016, '2018-01-31', 1, 'test pay1', 10001, '2018-02-03 11:19:58', '2018-02-03 06:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `ts_procurement_methods`
--

CREATE TABLE `ts_procurement_methods` (
  `pro_method_id` int(11) NOT NULL,
  `pro_method_name` varchar(30) NOT NULL,
  `pro_method_created` datetime NOT NULL,
  `pro_method_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ts_procurement_methods`
--

INSERT INTO `ts_procurement_methods` (`pro_method_id`, `pro_method_name`, `pro_method_created`, `pro_method_updated`) VALUES
(1, 'Auction121212', '2018-01-27 17:05:50', '2018-01-27 11:19:29'),
(2, 'Auction1', '2018-01-27 17:06:30', '2018-01-27 11:06:30'),
(3, 'Auction Auction Auction Auctio', '2018-01-27 17:07:06', '2018-01-27 11:07:06'),
(4, 'Auction4', '2018-01-27 17:07:47', '2018-01-27 11:07:47'),
(5, 'Auction ff', '2018-01-27 17:08:09', '2018-01-27 11:19:45'),
(6, 'Election', '2018-01-27 17:16:57', '2018-01-27 11:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `ts_sources`
--

CREATE TABLE `ts_sources` (
  `source_id` int(11) NOT NULL,
  `source_name` varchar(100) NOT NULL,
  `source_remarks` varchar(255) NOT NULL,
  `source_created` datetime NOT NULL,
  `source_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ts_sources`
--

INSERT INTO `ts_sources` (`source_id`, `source_name`, `source_remarks`, `source_created`, `source_updated`) VALUES
(1, 'Prothom Alo', 'lkja', '2018-01-25 10:51:24', '2018-01-25 04:51:24'),
(2, 'Prothom Aloq', '', '2018-01-25 11:00:10', '2018-01-25 08:40:47'),
(3, 'qqq', '', '2018-01-31 11:09:25', '2018-01-31 05:09:25');

-- --------------------------------------------------------

--
-- Table structure for table `ts_sub_categories`
--

CREATE TABLE `ts_sub_categories` (
  `sub_cat_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_cat_name` varchar(255) NOT NULL,
  `sub_cat_desc` varchar(255) NOT NULL,
  `sub_cat_created` datetime NOT NULL,
  `sub_cat_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ts_sub_categories`
--

INSERT INTO `ts_sub_categories` (`sub_cat_id`, `category_id`, `sub_cat_name`, `sub_cat_desc`, `sub_cat_created`, `sub_cat_updated`) VALUES
(20, 8, 'AgroSubCat2', 'RM Cable Sub Category Description', '2017-11-12 12:36:36', '2018-01-27 04:27:33'),
(21, 9, 'DP Circuit Breaker', 'DP Circuit Breaker Sub Category Description', '2017-11-12 12:37:15', '2017-11-12 06:44:07'),
(22, 8, 'AgroSubCat1', '', '2017-11-12 15:00:04', '2018-01-27 04:27:20'),
(23, 9, 'SP Circuit Breaker', '', '2017-11-12 15:02:03', '2017-11-12 09:02:03'),
(24, 8, 'Sub Category agro11', '', '2018-01-31 11:50:02', '2018-01-31 05:50:02');

-- --------------------------------------------------------

--
-- Table structure for table `ts_tenders`
--

CREATE TABLE `ts_tenders` (
  `tender_auto_id` int(11) NOT NULL,
  `tender_title` varchar(255) NOT NULL,
  `tender_manual_id` varchar(20) NOT NULL,
  `tender_doc_price` varchar(20) NOT NULL,
  `tender_security_amount` varchar(255) NOT NULL,
  `tender_published_on` date NOT NULL,
  `tender_closed_on` date NOT NULL,
  `tender_closed_time` varchar(8) NOT NULL,
  `tender_prebid_meeting` date NOT NULL,
  `tender_inviter` int(11) NOT NULL,
  `tender_source` int(11) NOT NULL,
  `tender_division` int(11) NOT NULL,
  `tender_district` int(11) NOT NULL,
  `tender_category` int(11) NOT NULL,
  `tender_sub_category` int(11) NOT NULL,
  `tender_pro_method` int(11) NOT NULL,
  `tender_call_type` int(1) NOT NULL COMMENT '1 = Tender, 2 = Corrigendum, 3 = Cancellation',
  `tender_on` int(1) NOT NULL COMMENT '1 = Goods, 2 = Works, 3 = Services',
  `tender_img_url` varchar(255) NOT NULL,
  `tender_created` datetime NOT NULL,
  `tender_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ts_tenders`
--

INSERT INTO `ts_tenders` (`tender_auto_id`, `tender_title`, `tender_manual_id`, `tender_doc_price`, `tender_security_amount`, `tender_published_on`, `tender_closed_on`, `tender_closed_time`, `tender_prebid_meeting`, `tender_inviter`, `tender_source`, `tender_division`, `tender_district`, `tender_category`, `tender_sub_category`, `tender_pro_method`, `tender_call_type`, `tender_on`, `tender_img_url`, `tender_created`, `tender_updated`) VALUES
(1, 'Tender1-updatedd', '0000001- updatedd', '300 Tk updatedd', 'See the image-updatedd', '2018-01-02', '2018-01-30', '12:00 dd', '0000-00-00', 1, 0, 0, 0, 0, 0, 0, 0, 0, '', '2018-01-24 12:42:13', '2018-01-24 10:02:15'),
(2, 'Tender2', '0000002', '300 Tk', 'See the image', '2018-01-24', '2018-02-01', '12:00 pm', '0000-00-00', 2, 0, 0, 0, 0, 0, 0, 0, 0, '', '2018-01-24 12:44:20', '2018-01-24 08:54:41'),
(3, 'Tender3', '0000003', '300 Tk', 'See the image', '2018-01-16', '2018-02-10', '12:00 pm', '0000-00-00', 1, 0, 0, 0, 0, 0, 0, 0, 0, '', '2018-01-24 14:52:15', '2018-01-24 08:52:15'),
(4, 'Tender4', '0000004', '1010 Tk.', 'See the image', '2018-01-01', '2018-02-10', '12:00 pm', '0000-00-00', 1, 0, 0, 0, 0, 0, 0, 0, 0, '', '2018-01-24 18:29:38', '2018-01-24 12:29:38'),
(5, 'Tender5', '0000005', '883 Tk.', 'See the image', '2018-01-01', '2018-01-23', '12:00 pm', '0000-00-00', 1, 0, 0, 0, 0, 0, 0, 0, 0, '', '2018-01-24 18:30:51', '2018-01-24 12:30:51'),
(6, 'Tender6', '0000006', '1010 Tk.', 'See the image', '2018-01-23', '2018-01-02', '12:00 pm', '0000-00-00', 1, 0, 0, 0, 0, 0, 0, 0, 0, '', '2018-01-24 18:33:37', '2018-01-24 12:33:37'),
(7, 'Tender7', '0000007', '300 Tk', 'See the image', '2018-01-01', '2018-01-29', '12:00 pm', '0000-00-00', 1, 0, 0, 0, 0, 0, 0, 0, 0, '', '2018-01-24 18:34:43', '2018-01-24 12:34:43'),
(8, 'Tender8', '0000008', '300 Tk', 'See the image', '2017-12-31', '2018-02-10', '12:00 pm', '0000-00-00', 1, 0, 0, 0, 0, 0, 0, 0, 0, 'http://localhost/tender_sheba/images/tender/8.jpg', '2018-01-24 18:37:06', '2018-01-24 12:37:06'),
(9, 'Tender1', '0000001', '300 Tk', 'See the image123', '2017-12-31', '2018-02-10', '12:00 pm', '0000-00-00', 1, 2, 0, 0, 0, 0, 0, 0, 0, 'http://localhost/tender_sheba/images/tender/9.jpg', '2018-01-25 10:15:53', '2018-01-25 08:49:18'),
(10, 'Tender9', '0000009', '300 Tk', 'See the image', '2018-01-23', '2018-01-24', '12:00 pm', '0000-00-00', 1, 1, 0, 0, 0, 0, 0, 0, 0, '', '2018-01-25 15:13:57', '2018-01-25 09:13:57'),
(11, 'Tender10', '0000010', '300 Tk', 'See the image', '2018-01-23', '2018-01-24', '12:00 pm', '0000-00-00', 1, 1, 0, 0, 0, 0, 0, 0, 0, 'http://localhost/tender_sheba/images/tender/11.jpg', '2018-01-25 15:14:37', '2018-01-25 09:14:37'),
(12, 'Tender12', '0000012', '300 Tk', 'See the image', '2018-01-27', '2018-01-28', '12:00 pm', '0000-00-00', 1, 1, 2, 1, 8, 20, 0, 0, 0, 'http://localhost/tender_sheba/images/tender/12.jpg', '2018-01-27 10:05:49', '2018-01-27 04:05:50'),
(13, 'Tender13', '0000013', '300 12', 'See the image1212', '2018-02-10', '2018-02-10', '12:00 af', '0000-00-00', 2, 2, 2, 1, 9, 21, 0, 0, 0, 'http://localhost/tender_sheba/images/tender/13.jpg', '2018-01-27 14:52:10', '2018-01-27 09:21:42'),
(14, 'Tender14', '0000014', '1300 Tk', 'See the image12', '2018-01-13', '2018-01-14', '13:00 pm', '0000-00-00', 1, 1, 1, 2, 9, 21, 2, 0, 0, '', '2018-01-27 18:22:32', '2018-01-27 12:32:37'),
(15, 'Tender15', '0000015', '315 Tk', 'See the image15', '2018-01-15', '2018-01-16', '12:15 pm', '2018-02-06', 2, 2, 1, 2, 8, 22, 3, 1, 3, 'http://localhost/tender_sheba/images/tender/15.jpg', '2018-01-28 12:49:23', '2018-01-28 11:03:32'),
(16, 'Tender16', '0000016', '316 Tk', 'See the image16', '2018-02-10', '2018-02-09', '12:16 pm', '2018-02-08', 1, 2, 1, 2, 8, 20, 1, 1, 1, 'http://localhost/tender_sheba/images/tender/16.png', '2018-01-31 10:36:11', '2018-01-31 04:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `ts_web_user`
--

CREATE TABLE `ts_web_user` (
  `webu_id` int(11) NOT NULL,
  `webu_full_name` varchar(100) NOT NULL,
  `webu_user_name` varchar(50) NOT NULL,
  `webu_password` varchar(255) NOT NULL,
  `webu_status` int(1) NOT NULL COMMENT '1 = Active, 2 = Deactive',
  `webu_email` varchar(255) NOT NULL,
  `webu_created` datetime NOT NULL,
  `webu_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ts_web_user`
--

INSERT INTO `ts_web_user` (`webu_id`, `webu_full_name`, `webu_user_name`, `webu_password`, `webu_status`, `webu_email`, `webu_created`, `webu_updated`) VALUES
(1, 'Ismail', 'ismail', '', 2, 'ismail@gmail.com', '2018-01-31 16:02:34', '2018-01-31 11:06:09'),
(2, 'Mr. Araf', 'araf', '', 1, 'ismail@gmail.com', '2018-01-31 17:11:40', '2018-01-31 11:12:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `mobile` varchar(20) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `status_update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `mobile`, `dob`, `status`, `status_update_date`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$08$7G9a1dqcBsczIU71PfjC1.CzkObDQpU5mXk9QL41e3Ach1IfYRl4i', '', 'administrator@gmail.com', NULL, NULL, NULL, 1496699848, 1517639883, 1, 'Rafiq 1', 'Ahmed', '', '', '', '0000-00-00'),
(4, '::1', 'mafizur@sat', '$2y$08$7G9a1dqcBsczIU71PfjC1.CzkObDQpU5mXk9QL41e3Ach1IfYRl4i', NULL, 'mafizur.sat@gmail.com', NULL, NULL, NULL, 1502622274, 1507461581, 1, 'Mafizur', 'Rahman', '', '', '', '0000-00-00'),
(25, '::1', 'setup_user', '$2y$08$4wDPY3j4JjMUjoovg2st4Ot0gT94TucidTmhzlTjpLB1jZOJh09da', NULL, 'mtraders@gmail.com', NULL, NULL, NULL, 1509337959, 1509356385, 1, 'setup', 'user', '', '', '', '0000-00-00'),
(27, '::1', 'invoice_generator', '$2y$08$FNI/jfRy.aZzFYV6iwaQzOZCjazb.Tl0U.FHzhmJGX.DmmBeLiSRm', NULL, 'invoice@generator.com', NULL, NULL, NULL, 1509347176, 1509420602, 1, 'invoice', 'generator', '', '', '', '0000-00-00'),
(28, '::1', 'stock_manager', '$2y$08$yM96PCu865bWHgfmHGxjQeGQv3tmzO.3tsFDhFyecjj4hrEQ6YxHe', NULL, 'stock@manager.com', NULL, NULL, NULL, 1509354653, 1509361048, 1, 'stock', 'manager', '', '', '', '0000-00-00'),
(29, '::1', 'general_user', '$2y$08$LrkdRFRqNl8EfDnwaEfP4.vP9/DHXYrImmgZEFsDSiyjF0wQA12SS', NULL, 'general@user.com', NULL, NULL, NULL, 1509355493, 1509356416, 1, 'general', 'user', '', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(47, 1, 1),
(52, 25, 7),
(51, 27, 5),
(54, 28, 6),
(55, 29, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ts_categories`
--
ALTER TABLE `ts_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `ts_districts`
--
ALTER TABLE `ts_districts`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `ts_divisions`
--
ALTER TABLE `ts_divisions`
  ADD PRIMARY KEY (`division_id`);

--
-- Indexes for table `ts_inviters`
--
ALTER TABLE `ts_inviters`
  ADD PRIMARY KEY (`inviter_id`);

--
-- Indexes for table `ts_payment_history`
--
ALTER TABLE `ts_payment_history`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `ts_procurement_methods`
--
ALTER TABLE `ts_procurement_methods`
  ADD PRIMARY KEY (`pro_method_id`);

--
-- Indexes for table `ts_sources`
--
ALTER TABLE `ts_sources`
  ADD PRIMARY KEY (`source_id`);

--
-- Indexes for table `ts_sub_categories`
--
ALTER TABLE `ts_sub_categories`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- Indexes for table `ts_tenders`
--
ALTER TABLE `ts_tenders`
  ADD PRIMARY KEY (`tender_auto_id`);

--
-- Indexes for table `ts_web_user`
--
ALTER TABLE `ts_web_user`
  ADD PRIMARY KEY (`webu_id`);

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
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ts_categories`
--
ALTER TABLE `ts_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ts_districts`
--
ALTER TABLE `ts_districts`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ts_divisions`
--
ALTER TABLE `ts_divisions`
  MODIFY `division_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ts_inviters`
--
ALTER TABLE `ts_inviters`
  MODIFY `inviter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ts_payment_history`
--
ALTER TABLE `ts_payment_history`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ts_procurement_methods`
--
ALTER TABLE `ts_procurement_methods`
  MODIFY `pro_method_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ts_sources`
--
ALTER TABLE `ts_sources`
  MODIFY `source_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ts_sub_categories`
--
ALTER TABLE `ts_sub_categories`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `ts_tenders`
--
ALTER TABLE `ts_tenders`
  MODIFY `tender_auto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ts_web_user`
--
ALTER TABLE `ts_web_user`
  MODIFY `webu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
