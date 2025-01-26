-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 16, 2023 at 08:36 AM
-- Server version: 5.5.52-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tenderseba_db`
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
(15, 'Agro/Fisheries/Forestry/Food/Feed', '', '2018-02-28 12:02:00', '2018-02-28 06:02:48'),
(16, 'Art/Craft/Fashion/Entertainment', '', '2018-02-28 12:02:00', '2018-02-28 06:02:48'),
(17, 'Automobiles/Vehicles/Transportation', '', '2018-02-28 12:02:00', '2018-02-28 06:02:48'),
(18, 'Business-Support/Professional Services', '', '2018-02-28 12:02:00', '2018-02-28 06:02:48'),
(19, 'Chemicals/Fertilizers/Paints/Dyes', '', '2018-02-28 12:02:00', '2018-02-28 06:02:48'),
(20, 'Construction/Building Materials', '', '2018-02-28 12:02:00', '2018-02-28 06:02:48'),
(21, 'Construction/Infrastructure Works', '', '2018-02-28 12:02:00', '2018-02-28 06:02:48'),
(22, 'Consultancy Services', '', '2018-02-28 12:02:00', '2018-02-28 06:02:48'),
(23, 'Electrical Systems/Energy/Power/Gas', '', '2018-02-28 12:02:00', '2018-02-28 06:02:48'),
(24, 'Electronic &amp; ICT Products', '', '2018-02-28 12:02:00', '2018-02-28 06:02:48'),
(25, 'Furniture, Decoration &amp; Households', '', '2018-02-28 12:02:00', '2018-02-28 06:02:48'),
(26, 'Garments/Apparel/Textiles', '', '2018-02-28 12:02:00', '2018-02-28 06:02:48'),
(27, 'Hardware/Tools/Metals/Minerals', '', '2018-02-28 12:02:00', '2018-02-28 06:02:48'),
(28, 'Health, Medical &amp; Pharma', '', '2018-02-28 12:02:00', '2018-02-28 06:02:48'),
(29, 'ICT and Telecom Services', '', '2018-02-28 12:02:00', '2018-02-28 06:02:48'),
(30, 'Machineries/Instruments/Plants', '', '2018-02-28 12:02:00', '2018-02-28 06:02:48'),
(31, 'Office-Supplies/Printing/Packaging', '', '2018-02-28 12:02:00', '2018-02-28 06:02:48'),
(32, 'Physical/Labor-Intensive Works', '', '2018-02-28 12:02:00', '2018-02-28 06:02:48'),
(33, 'Plastic/Rubber/Leather/Jute Goods', '', '2018-02-28 12:02:00', '2018-02-28 06:02:48'),
(34, 'Sales/Auction/Leasing/Hiring/Others', '', '2018-02-28 12:02:00', '2018-02-28 06:02:48');

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
(5, 5, 'Barguna', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(6, 5, 'Barisal', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(7, 5, 'Bhola', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(8, 5, 'Jhalokati', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(9, 5, 'Patuakhali', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(10, 5, 'Pirojpur', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(11, 6, 'Bandarban', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(12, 6, 'Brahmanbaria', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(13, 6, 'Chandpur', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(14, 6, 'Chittagong', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(15, 6, 'Comilla', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(16, 6, 'Cox Bazar', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(17, 6, 'Feni', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(18, 6, 'Khagrachhari', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(19, 6, 'Lakshmipur', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(20, 6, 'Noakhali', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(21, 6, 'Rangamati', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(23, 7, 'Dhaka', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(24, 7, 'Faridpur', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(25, 7, 'Gazipur', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(26, 7, 'Gopalganj', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(27, 7, 'Jamalpur', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(28, 7, 'Kishoreganj', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(29, 7, 'Madaripur', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(30, 7, 'Manikganj', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(31, 7, 'Munshiganj', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(32, 7, 'Mymensingh', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(33, 7, 'Narayanganj', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(34, 7, 'Narsingdi', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(35, 7, 'Netrakona', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(36, 7, 'Rajbari', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(37, 7, 'Shariatpur', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(38, 7, 'Sherpur', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(39, 7, 'Tangail', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(40, 8, 'India', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(41, 9, 'Bagerhat', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(42, 9, 'Chuadanga', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(43, 9, 'Jessore', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(44, 9, 'Jhenaidah', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(45, 9, 'Khulna', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(46, 9, 'Kushtia', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(47, 9, 'Magura', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(48, 9, 'Meherpur', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(49, 9, 'Narail', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(50, 9, 'Satkhira', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(52, 10, 'Pakistan', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(53, 11, 'Bogra', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(54, 11, 'Chapainawabganj', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(55, 11, 'Dinajpur', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(56, 11, 'Gaibandha', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(57, 11, 'Joypurhat', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(58, 11, 'Kurigram', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(59, 11, 'Lalmonirhat', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(60, 11, 'Naogaon', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(61, 11, 'Natore', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(62, 11, 'Nilphamari', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(63, 11, 'Pabna', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(64, 11, 'Panchagarh', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(65, 11, 'Rajshahi', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(66, 11, 'Rangpur', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(67, 11, 'Sirajganj', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(68, 11, 'Thakurgaon', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(69, 12, 'Habiganj', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(70, 12, 'Maulvibazar', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(71, 12, 'Sunamganj', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20'),
(72, 12, 'Sylhet', '', '2018-02-18 12:02:00', '2018-02-28 06:04:20');

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
(5, 'Barisal', '', '2018-02-28 12:04:00', '2018-02-28 06:06:03'),
(6, 'Chittagong', '', '2018-02-28 12:04:00', '2018-02-28 06:06:03'),
(7, 'Dhaka', '', '2018-02-28 12:04:00', '2018-02-28 06:06:03'),
(8, 'India', '', '2018-02-28 12:04:00', '2018-02-28 06:06:03'),
(9, 'Khulna', '', '2018-02-28 12:04:00', '2018-02-28 06:06:03'),
(10, 'Pakistan', '', '2018-02-28 12:04:00', '2018-02-28 06:06:03'),
(11, 'Rajshahi', '', '2018-02-28 12:04:00', '2018-02-28 06:06:03'),
(12, 'Sylhet', '', '2018-02-28 12:04:00', '2018-02-28 06:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `ts_feedbacks`
--

CREATE TABLE `ts_feedbacks` (
  `feedback_id` int(11) NOT NULL,
  `webu_id` int(11) NOT NULL,
  `feedback_subject` varchar(150) NOT NULL,
  `feedback_description` text NOT NULL,
  `feedback_seen` int(1) NOT NULL DEFAULT '1' COMMENT '1 = Unseen, 2 = Seen',
  `feedback_created` datetime NOT NULL,
  `feedback_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ts_feedbacks`
--

INSERT INTO `ts_feedbacks` (`feedback_id`, `webu_id`, `feedback_subject`, `feedback_description`, `feedback_seen`, `feedback_created`, `feedback_updated`) VALUES
(1, 46, 'test', 'test', 2, '2019-12-10 15:59:59', '2019-12-10 10:00:06');

-- --------------------------------------------------------

--
-- Table structure for table `ts_feedback_answers`
--

CREATE TABLE `ts_feedback_answers` (
  `answer_id` int(11) NOT NULL,
  `feedback_id` int(11) NOT NULL,
  `answer_from` int(1) NOT NULL COMMENT '1 = User, 2 = From Us',
  `answer_answer` text NOT NULL,
  `answer_created` datetime NOT NULL,
  `answer_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ts_feedback_answers`
--

INSERT INTO `ts_feedback_answers` (`answer_id`, `feedback_id`, `answer_from`, `answer_answer`, `answer_created`, `answer_updated`) VALUES
(1, 1, 2, 'ok', '2019-12-10 16:00:16', '2019-12-10 10:00:16');

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
(4, 'Cabinet Division', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(5, 'Finance Division/Ministry of Finance', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(6, 'Internal Resources Division', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(7, 'Local Government Division', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(8, 'Ministry of Agriculture', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(9, 'Ministry of Chittagong Hills Tracts Affairs', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(10, 'Ministry of Civil Aviation and Tourism', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(11, 'Ministry of Commerce', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(12, 'Ministry of Cultural Affairs', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(13, 'Ministry of Defense', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(14, 'Ministry of Education', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(15, 'Ministry of Environment and Forests', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(16, 'Ministry of Fisheries and Livestock', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(17, 'Ministry of Food', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(18, 'Ministry of Health and Family Welfare', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(19, 'Ministry of Home Affairs', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(20, 'Ministry of Housing and Public Works', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(21, 'Ministry of Industries', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(22, 'Ministry of Information', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(23, 'Ministry of Law, Justice and Parliamentary Affairs', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(24, 'Ministry of Planning', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(25, 'Ministry of Posts, Telecommunications and Information Technology', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(26, 'Ministry of Power, Energy and Mineral Resources', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(27, 'Ministry of Primary and Mass Education', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(28, 'Ministry of Public Administration', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(29, 'Ministry of Railways', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(30, 'Ministry of Religious Affairs', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(31, 'Ministry of Road Transport and Bridges', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(32, 'Ministry of Science and ICT', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(33, 'Ministry of Shipping', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(34, 'Ministry of Social Welfare', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(35, 'Ministry of Textile and Jute', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(36, 'Ministry of Water Resources', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(37, 'Ministry of Women and Children Affairs', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(38, 'Ministry of Youth & Sports', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(39, 'Prime Minister\'s Office', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(40, 'Rural Development & Cooperative Division', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(41, 'Statistics Division', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(42, 'Unclassified Govt. Sector', 2, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(43, 'Agro/Fisheries/Food', 3, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(44, 'Association/Regulatory Body/Watchdog', 3, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(45, 'Bank/Insurance/Financial Institutes', 3, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(46, 'Conglomerates/Group of Companies', 3, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(47, 'Education/Research/Training', 3, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(48, 'Embassy & High Commission', 3, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(49, 'Energy/Power/Minerals/Oil/Gas', 3, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(50, 'Foreign Agency', 3, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(51, 'Hospitals/Clinics', 3, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(52, 'Hotel/Hospitality/Tourism', 3, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(53, 'Manufacturing & Processing Industry', 3, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(54, 'NGO/MFI/Social Protection', 3, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(55, 'Rural/Urban Development', 3, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(56, 'Unclassified Private Sector', 3, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(57, 'Bangladesh Women Health Coalition (BWHC)', 1, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(58, 'Bishwa Sahitta Kendro', 1, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(59, 'BRAC', 1, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(60, 'CARE Bangladesh', 1, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(61, 'CARITAS Bangladesh', 1, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(62, 'Community Development Association (CDA)', 1, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(63, 'Crown Agents', 1, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(64, 'Dhaka Ahsania Mission', 1, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(65, 'Others NGO', 1, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(66, 'Oxfam GB', 1, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(67, 'RDRS Bangladesh', 1, '2018-02-27 05:23:00', '2018-02-27 11:23:54'),
(68, 'WaterAid Bangladesh', 1, '2018-02-27 05:23:00', '2018-02-27 11:23:54');

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
(1, 46, 12, 2019, '2019-12-10', 3, 'good', 1000, '2019-12-10 13:01:44', '2019-12-10 07:02:54');

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
(1, 'RFP', '2018-01-27 17:05:50', '2018-02-05 12:44:42'),
(2, 'Enlistment', '2018-01-27 17:06:30', '2018-02-05 12:44:29'),
(3, 'IFT', '2018-01-27 17:07:06', '2018-02-05 12:44:03'),
(4, 'Auc/Sal', '2018-01-27 17:07:47', '2018-02-05 12:44:56'),
(5, 'Preq', '2018-01-27 17:08:09', '2018-02-05 12:44:18'),
(6, 'Election', '2018-01-27 17:16:57', '2018-01-27 11:16:57'),
(7, 'EOI(Firm)', '2018-02-28 12:27:23', '2018-02-28 06:27:23'),
(8, 'EOI(Invd)', '2018-02-28 12:27:46', '2018-02-28 06:27:46'),
(9, 'RFQ', '2018-02-28 12:27:55', '2018-02-28 06:27:55');

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
(4, 'Ajkaler Khabar', '', '0000-00-00 00:00:00', '2018-02-27 11:30:51'),
(5, 'Alokito Bangladesh', '', '0000-00-00 00:00:00', '2018-02-27 11:30:51'),
(6, 'Amader Orthoneety', '', '0000-00-00 00:00:00', '2018-02-27 11:31:09'),
(7, 'Amader Shomoy', '', '0000-00-00 00:00:00', '2018-02-27 11:31:09'),
(8, 'Amar Sangbad', '', '0000-00-00 00:00:00', '2018-02-27 11:31:26'),
(9, 'Azadi', '', '0000-00-00 00:00:00', '2018-02-27 11:31:26'),
(10, 'Bangladesh Protidin', '', '0000-00-00 00:00:00', '2018-02-27 11:31:44'),
(11, 'Bangladesh Today', '', '0000-00-00 00:00:00', '2018-02-27 11:31:44'),
(12, 'Bhorer Dak', '', '0000-00-00 00:00:00', '2018-02-27 11:32:11'),
(13, 'Bhorer Darpan', '', '0000-00-00 00:00:00', '2018-02-27 11:32:11'),
(14, 'Bhorer Kagoj', '', '0000-00-00 00:00:00', '2018-02-27 11:32:22'),
(15, 'Bonik Barta', '', '0000-00-00 00:00:00', '2018-02-27 11:32:22'),
(16, 'Company Website', '', '0000-00-00 00:00:00', '2018-02-27 11:32:38'),
(17, 'Daily Industry', '', '0000-00-00 00:00:00', '2018-02-27 11:32:38'),
(18, 'Daily Observer', '', '0000-00-00 00:00:00', '2018-02-27 11:33:06'),
(19, 'Daily Peoples Time', '', '0000-00-00 00:00:00', '2018-02-27 11:33:06'),
(20, 'Daily Star', '', '0000-00-00 00:00:00', '2018-02-27 11:33:23'),
(21, 'Daily Sun', '', '0000-00-00 00:00:00', '2018-02-27 11:33:23'),
(22, 'Dhaka Tribune', '', '0000-00-00 00:00:00', '2018-02-27 11:33:33'),
(23, 'Dinkal', '', '0000-00-00 00:00:00', '2018-02-27 11:33:33'),
(24, 'Financial Express', '', '0000-00-00 00:00:00', '2018-02-27 11:33:56'),
(25, 'Independent', '', '0000-00-00 00:00:00', '2018-02-27 11:33:56'),
(26, 'Inqilab', '', '0000-00-00 00:00:00', '2018-02-27 11:34:48'),
(27, 'Ittefaq', '', '0000-00-00 00:00:00', '2018-02-27 11:34:48'),
(28, 'Jaijaidin', '', '0000-00-00 00:00:00', '2018-02-27 11:36:29'),
(29, 'Janakantha', '', '0000-00-00 00:00:00', '2018-02-27 11:36:29'),
(30, 'Janata', '', '0000-00-00 00:00:00', '2018-02-27 11:36:43'),
(31, 'Jugantor', '', '0000-00-00 00:00:00', '2018-02-27 11:36:43'),
(32, 'Juger Alo', '', '0000-00-00 00:00:00', '2018-02-27 11:36:58'),
(33, 'Kaler Kantho', '', '0000-00-00 00:00:00', '2018-02-27 11:36:58'),
(34, 'Karatoa', '', '0000-00-00 00:00:00', '2018-02-27 11:37:11'),
(35, 'Karnapluli', '', '0000-00-00 00:00:00', '2018-02-27 11:37:11'),
(36, 'Khabar', '', '0000-00-00 00:00:00', '2018-02-27 11:37:29'),
(37, 'Khaborpatra', '', '0000-00-00 00:00:00', '2018-02-27 11:37:29'),
(38, 'Khola Kagoj', '', '0000-00-00 00:00:00', '2018-02-27 11:37:54'),
(39, 'Manabzamin', '', '0000-00-00 00:00:00', '2018-02-27 11:37:54'),
(40, 'Manobkantha', '', '0000-00-00 00:00:00', '2018-02-27 11:38:07'),
(41, 'Munshigonjer Kagoj', '', '0000-00-00 00:00:00', '2018-02-27 11:38:07'),
(42, 'Naya Diganto', '', '0000-00-00 00:00:00', '2018-02-27 11:38:24'),
(43, 'New Age', '', '0000-00-00 00:00:00', '2018-02-27 11:38:24'),
(44, 'New Nation', '', '0000-00-00 00:00:00', '2018-02-27 11:38:39'),
(45, 'News Today', '', '0000-00-00 00:00:00', '2018-02-27 11:38:39'),
(46, 'Our Time', '', '0000-00-00 00:00:00', '2018-02-27 11:39:09'),
(47, 'Prothom Alo', '', '0000-00-00 00:00:00', '2018-02-27 11:39:09'),
(48, 'Protidiner Sangbad', '', '0000-00-00 00:00:00', '2018-02-27 11:39:21'),
(49, 'Purbakon', '', '0000-00-00 00:00:00', '2018-02-27 11:39:21'),
(50, 'Purbanchal', '', '0000-00-00 00:00:00', '2018-02-27 11:40:19'),
(51, 'Sangbad', '', '0000-00-00 00:00:00', '2018-02-27 11:40:19'),
(52, 'Sangbad Pratidin', '', '0000-00-00 00:00:00', '2018-02-27 11:40:33'),
(53, 'Sangram', '', '0000-00-00 00:00:00', '2018-02-27 11:40:33'),
(54, 'Shamokal', '', '0000-00-00 00:00:00', '2018-02-27 11:40:47'),
(55, 'Sonali Sangbad', '', '0000-00-00 00:00:00', '2018-02-27 11:40:47'),
(56, 'Sunshine', '', '0000-00-00 00:00:00', '2018-02-27 11:41:01'),
(57, 'Suprobhat Bangladesh', '', '0000-00-00 00:00:00', '2018-02-27 11:41:01'),
(58, 'Sylheter Dak', '', '0000-00-00 00:00:00', '2018-02-27 11:41:39'),
(59, 'TenderBazar', '', '0000-00-00 00:00:00', '2018-02-27 11:41:39'),
(60, 'The Asian Age', '', '0000-00-00 00:00:00', '2018-02-27 11:41:56'),
(61, 'Vorer Pata', '', '0000-00-00 00:00:00', '2018-02-27 11:41:56'),
(62, 'RokomariTender', '', '0000-00-00 00:00:00', '2018-02-27 11:42:08');

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
(25, 15, 'Agro Machineries/Equipments', '', '2018-02-26 18:06:38', '2018-02-26 12:06:38'),
(26, 15, 'Agro/Fishing/Forestry Related Consultancy', '', '0000-00-00 00:00:00', '2018-02-26 12:07:40'),
(27, 15, 'Animal Feed/Veterinary Medicines', '', '0000-00-00 00:00:00', '2018-02-26 12:07:40'),
(28, 15, 'Catering/Cooking/Food/Diet Services', '', '0000-00-00 00:00:00', '2018-02-26 12:34:00'),
(29, 15, 'Dairy Products', '', '0000-00-00 00:00:00', '2018-02-26 12:34:00'),
(30, 15, 'Drinks/Beverage', '', '0000-00-00 00:00:00', '2018-02-26 12:34:20'),
(31, 15, 'Fertilizers/Agrochemicals', '', '0000-00-00 00:00:00', '2018-02-26 12:34:20'),
(32, 15, 'Fish, Fishing &amp; Aquaculture', '', '0000-00-00 00:00:00', '2018-02-26 12:34:40'),
(33, 15, 'Flowers and Related Items', '', '0000-00-00 00:00:00', '2018-02-26 12:34:40'),
(34, 15, 'Fruits', '', '0000-00-00 00:00:00', '2018-02-26 12:35:03'),
(35, 15, 'Grinding-Works', '', '0000-00-00 00:00:00', '2018-02-26 12:35:03'),
(36, 15, 'Groceries &amp; Spices', '', '0000-00-00 00:00:00', '2018-02-26 12:35:21'),
(37, 15, 'Livestock &amp; Animal Products', '', '0000-00-00 00:00:00', '2018-02-26 12:35:21'),
(38, 15, 'Oil (Edible/Vegetable/Others)', '', '0000-00-00 00:00:00', '2018-02-26 12:35:39'),
(39, 15, 'Pesticides &amp; Pest-Control', '', '0000-00-00 00:00:00', '2018-02-26 12:35:39'),
(40, 15, 'Processed Food', '', '0000-00-00 00:00:00', '2018-02-26 12:35:58'),
(41, 15, 'Rice/Paddy/Dal/Corns/Grains/Straw/Husk', '', '0000-00-00 00:00:00', '2018-02-26 12:35:58'),
(42, 15, 'Seeds/Nursery/Tree Plantation', '', '0000-00-00 00:00:00', '2018-02-26 12:36:18'),
(43, 15, 'Sugar/Gur/Sugarcane/Molasses', '', '0000-00-00 00:00:00', '2018-02-26 12:36:18'),
(44, 15, 'Tobacco and Related Items', '', '0000-00-00 00:00:00', '2018-02-26 12:36:39'),
(45, 15, 'Tree/Bush/Grass Cutting', '', '0000-00-00 00:00:00', '2018-02-26 12:36:39'),
(46, 15, 'Unspecified Food Items', '', '0000-00-00 00:00:00', '2018-02-26 12:37:18'),
(47, 15, 'Vegetables/Curry', '', '0000-00-00 00:00:00', '2018-02-26 12:37:18'),
(48, 15, 'Wood/Timber/Bamboo/Forestry Goods', '', '0000-00-00 00:00:00', '2018-02-26 12:37:33'),
(49, 16, 'Calligraphy/Carving/Painting Works', '', '0000-00-00 00:00:00', '2018-02-26 12:43:32'),
(50, 16, 'Ceramics/Earthenware/Glassware', '', '0000-00-00 00:00:00', '2018-02-26 12:43:32'),
(51, 16, 'Cosmetics &amp; Toiletries', '', '0000-00-00 00:00:00', '2018-02-26 12:43:55'),
(52, 16, 'Eyewear/Optical Frame &amp; Lens', '', '0000-00-00 00:00:00', '2018-02-26 12:43:55'),
(53, 16, 'Gift/Promotional Items', '', '0000-00-00 00:00:00', '2018-02-26 12:44:15'),
(54, 16, 'Handicraft/Homecraft/Officecraft', '', '0000-00-00 00:00:00', '2018-02-26 12:44:15'),
(55, 16, 'Jewelries/Ornaments', '', '0000-00-00 00:00:00', '2018-02-26 12:44:35'),
(56, 16, 'Musical Instruments &amp; Related Items', '', '0000-00-00 00:00:00', '2018-02-26 12:44:35'),
(57, 16, 'Sports/Gym/Fitness Items', '', '0000-00-00 00:00:00', '2018-02-26 12:44:52'),
(59, 17, 'CNG Conversion and Ancillaries', '', '0000-00-00 00:00:00', '2018-02-26 12:59:37'),
(60, 17, 'Construction Vehicles', '', '0000-00-00 00:00:00', '2018-02-26 12:59:37'),
(61, 17, 'Filling Station/CNG Refueling Machineries', '', '0000-00-00 00:00:00', '2018-02-26 12:59:58'),
(62, 17, 'Fuel/Lub/Petroleum/Industrial Oil', '', '0000-00-00 00:00:00', '2018-02-26 12:59:58'),
(63, 17, 'Military Vehicles', '', '0000-00-00 00:00:00', '2018-02-26 13:00:20'),
(64, 17, 'Railway Related Construction', '', '0000-00-00 00:00:00', '2018-02-26 13:00:20'),
(65, 17, 'Railway Spare Parts/Ancillaries', '', '0000-00-00 00:00:00', '2018-02-26 13:01:06'),
(66, 17, 'Rent-a-Car/Vehicle Hiring/Driving', '', '0000-00-00 00:00:00', '2018-02-26 13:01:06'),
(67, 17, 'Sales/Disposal of Vehicle&amp;Motor-Parts', '', '0000-00-00 00:00:00', '2018-02-26 13:01:25'),
(68, 17, 'Transport Services (Land/Water/Air)', '', '0000-00-00 00:00:00', '2018-02-26 13:01:25'),
(69, 17, 'Transportation &amp; Communication Consultancy', '', '0000-00-00 00:00:00', '2018-02-26 13:01:46'),
(70, 17, 'Transportation/Shipping/Logistic/Freight Services', '', '0000-00-00 00:00:00', '2018-02-26 13:01:46'),
(71, 17, 'Transports, Ancillaries &amp; Related Services (Air)', '', '0000-00-00 00:00:00', '2018-02-26 13:02:09'),
(72, 17, 'Transports, Ancillaries &amp; Related Services (Land)', '', '0000-00-00 00:00:00', '2018-02-26 13:02:09'),
(73, 17, 'Transports, Ancillaries &amp; Related Services (Water)', '', '0000-00-00 00:00:00', '2018-02-26 13:02:41'),
(74, 17, 'Travel Agent/Tour Operators', '', '0000-00-00 00:00:00', '2018-02-26 13:02:41'),
(75, 17, 'Two/Three Wheelers', '', '0000-00-00 00:00:00', '2018-02-26 13:03:00'),
(76, 17, 'Tyres/Tubes', '', '0000-00-00 00:00:00', '2018-02-26 13:03:00'),
(77, 18, 'Advertizing/Marketing/Media Services', '', '0000-00-00 00:00:00', '2018-02-26 13:07:52'),
(78, 18, 'Building Maintenance/Care-Taking Services', '', '0000-00-00 00:00:00', '2018-02-26 13:07:52'),
(79, 18, 'C&F-Agents', '', '0000-00-00 00:00:00', '2018-02-26 13:08:43'),
(80, 18, 'Cash Management/Security Services', '', '0000-00-00 00:00:00', '2018-02-26 13:08:43'),
(81, 18, 'Catering/Cooking/Food/Diet Services', '', '0000-00-00 00:00:00', '2018-02-26 13:09:12'),
(82, 18, 'Certification/Inspection/Quality Control', '', '0000-00-00 00:00:00', '2018-02-26 13:09:12'),
(83, 18, 'Courier/Parcel Services', '', '0000-00-00 00:00:00', '2018-02-26 13:09:30'),
(84, 18, 'Documentation/Translation/Interpretation', '', '0000-00-00 00:00:00', '2018-02-26 13:09:30'),
(85, 18, 'Event Management', '', '0000-00-00 00:00:00', '2018-02-26 13:09:49'),
(86, 18, 'Finance/Law/Legal/Audit/Tax', '', '0000-00-00 00:00:00', '2018-02-26 13:09:49'),
(87, 18, 'Hotel/Accommodation/Housekeeping', '', '0000-00-00 00:00:00', '2018-02-26 13:10:06'),
(88, 18, 'Insurance Services', '', '0000-00-00 00:00:00', '2018-02-26 13:10:06'),
(89, 18, 'Interior Design/Decoration Works', '', '0000-00-00 00:00:00', '2018-02-26 13:10:54'),
(90, 18, 'Joint-Venture/Sponsorship', '', '0000-00-00 00:00:00', '2018-02-26 13:10:54'),
(91, 18, 'Manpower Supply (Guard/Driver/Clark/MLSS etc.)', '', '0000-00-00 00:00:00', '2018-02-26 13:11:15'),
(92, 18, 'Market Survey/Data Collection', '', '0000-00-00 00:00:00', '2018-02-26 13:11:15'),
(93, 18, 'Office Stationeries/Printing Materials', '', '0000-00-00 00:00:00', '2018-02-26 13:11:35'),
(94, 18, 'Patent/Royalties/Copyrights/Trademark Services', '', '0000-00-00 00:00:00', '2018-02-26 13:11:35'),
(95, 18, 'Photography Services', '', '2018-02-27 10:10:23', '2018-02-27 04:10:23'),
(96, 18, 'Printing/Packaging/Publication Works', '', '0000-00-00 00:00:00', '2018-02-27 04:15:00'),
(97, 18, 'Rent-a-Car/Vehicle Hiring/Driving', '', '0000-00-00 00:00:00', '2018-02-27 04:15:00'),
(98, 18, 'Skilled/Technical Professionals', '', '0000-00-00 00:00:00', '2018-02-27 04:15:24'),
(99, 18, 'Tailoring/Dress Making/Sewing Works', '', '0000-00-00 00:00:00', '2018-02-27 04:15:24'),
(100, 18, 'Travel Agent/Tour Operators', '', '0000-00-00 00:00:00', '2018-02-27 04:15:48'),
(101, 18, 'Utility Bill Collection &amp; Related Services', '', '0000-00-00 00:00:00', '2018-02-27 04:15:48'),
(102, 19, 'Abrasive Products', '', '0000-00-00 00:00:00', '2018-02-27 04:19:29'),
(103, 19, 'Chemicals and Reagents', '', '0000-00-00 00:00:00', '2018-02-27 04:19:29'),
(104, 19, 'Fertilizers/Agrochemicals', '', '0000-00-00 00:00:00', '2018-02-27 04:19:50'),
(105, 19, 'Fuel/Lub/Petroleum/Industrial Oil', '', '0000-00-00 00:00:00', '2018-02-27 04:19:50'),
(106, 19, 'Paints, Dyes, Coatings &amp; PTFE Products', '', '0000-00-00 00:00:00', '2018-02-27 04:20:32'),
(107, 19, 'Paper Raw Materials', '', '0000-00-00 00:00:00', '2018-02-27 04:20:32'),
(108, 19, 'Pesticides &amp; Pest-Control', '', '0000-00-00 00:00:00', '2018-02-27 04:20:48'),
(109, 19, 'Pharmaceutical Raw Materials', '', '0000-00-00 00:00:00', '2018-02-27 04:20:48'),
(110, 19, 'Various Gases (Natural/Industrial)', '', '0000-00-00 00:00:00', '2018-02-27 04:21:17'),
(111, 19, 'Water-Treatment/Chemical/Refinery Plant', '', '0000-00-00 00:00:00', '2018-02-27 04:21:17'),
(112, 20, 'Brick/Bat/Chips/Gravels/Refractories', '', '0000-00-00 00:00:00', '2018-02-27 04:28:53'),
(113, 20, 'Cement/Asbestos', '', '0000-00-00 00:00:00', '2018-02-27 04:28:53'),
(114, 20, 'Construction Machineries', '', '0000-00-00 00:00:00', '2018-02-27 04:30:04'),
(115, 20, 'Curtains/Venetians/Vertical Blinds', '', '0000-00-00 00:00:00', '2018-02-27 04:30:04'),
(116, 20, 'Doors/ Windows/Gates', '', '0000-00-00 00:00:00', '2018-02-27 04:30:21'),
(117, 20, 'False-Ceiling', '', '0000-00-00 00:00:00', '2018-02-27 04:30:21'),
(118, 20, 'Glass/Glasswares', '', '0000-00-00 00:00:00', '2018-02-27 04:30:42'),
(119, 20, 'Insulating-Materials', '', '0000-00-00 00:00:00', '2018-02-27 04:30:42'),
(120, 20, 'Iron/Steel/Aluminium/Ingots/Structural Items', '', '0000-00-00 00:00:00', '2018-02-27 04:31:07'),
(121, 20, 'Minerals, Metals &amp; Alloys', '', '0000-00-00 00:00:00', '2018-02-27 04:31:07'),
(122, 20, 'Pipes, Tubes &amp; Flow Control Equipment/Fittings', '', '0000-00-00 00:00:00', '2018-02-27 04:31:35'),
(123, 20, 'Plywood/Partex/Board', '', '0000-00-00 00:00:00', '2018-02-27 04:31:35'),
(124, 20, 'Sand/Soil/Earth', '', '0000-00-00 00:00:00', '2018-02-27 04:31:58'),
(125, 20, 'Sanitary/Sewers/Plumbing/Water Related Works/Items', '', '0000-00-00 00:00:00', '2018-02-27 04:31:58'),
(126, 20, 'Tiles/Sanitary-Wares', '', '0000-00-00 00:00:00', '2018-02-27 04:32:27'),
(127, 20, 'Tin-Shed/Corrugated Sheet', '', '0000-00-00 00:00:00', '2018-02-27 04:32:27'),
(128, 20, 'Unspecified Construction/Conservation Items', '', '0000-00-00 00:00:00', '2018-02-27 04:32:57'),
(129, 20, 'Wood/Timber/Bamboo/Forestry Goods', '', '0000-00-00 00:00:00', '2018-02-27 04:32:57'),
(130, 21, 'Bridge/Culvert/Flyover Construction', '', '0000-00-00 00:00:00', '2018-02-27 05:27:57'),
(131, 21, 'Building &amp; Related Infrastructural Works', '', '0000-00-00 00:00:00', '2018-02-27 05:27:57'),
(132, 21, 'Building Demolition/Dismantaling Works', '', '0000-00-00 00:00:00', '2018-02-27 05:28:19'),
(133, 21, 'Dam/Barrage/Embankment/Irrigation Works', '', '0000-00-00 00:00:00', '2018-02-27 05:28:19'),
(134, 21, 'Dredging/Trenching Works', '', '0000-00-00 00:00:00', '2018-02-27 05:28:36'),
(135, 21, 'Electrification/Cabling/Wiring Works', '', '0000-00-00 00:00:00', '2018-02-27 05:28:36'),
(136, 21, 'Engineering Survey/Feasibility Study', '', '0000-00-00 00:00:00', '2018-02-27 05:28:55'),
(137, 21, 'Foundry/Engineering/Metal Works', '', '0000-00-00 00:00:00', '2018-02-27 05:28:55'),
(138, 21, 'Interior Design/Decoration Works', '', '0000-00-00 00:00:00', '2018-02-27 05:29:14'),
(139, 21, 'Land Development/Earth-Works', '', '0000-00-00 00:00:00', '2018-02-27 05:29:14'),
(140, 21, 'Masonry/Wooden/Carpentry Works', '', '0000-00-00 00:00:00', '2018-02-27 05:29:34'),
(141, 21, 'Painting/Limewash/Varnish Works', '', '0000-00-00 00:00:00', '2018-02-27 05:29:34'),
(142, 21, 'Platform/Ghat/Jetty/Port Construction Works', '', '0000-00-00 00:00:00', '2018-02-27 05:29:55'),
(143, 21, 'Power/Gas Generation Works', '', '0000-00-00 00:00:00', '2018-02-27 05:29:55'),
(144, 21, 'Power/Gas Transmission &amp; Distribution Works', '', '0000-00-00 00:00:00', '2018-02-27 05:30:16'),
(145, 21, 'Railway Related Construction', '', '0000-00-00 00:00:00', '2018-02-27 05:30:16'),
(146, 21, 'Road/Runway/Pavement Construction', '', '0000-00-00 00:00:00', '2018-02-27 05:30:37'),
(147, 21, 'Sanitary/Sewers/Plumbing/Water Related Works/Items', '', '0000-00-00 00:00:00', '2018-02-27 05:30:37'),
(148, 21, 'Steel Related Infrastructural Works', '', '0000-00-00 00:00:00', '2018-02-27 05:30:53'),
(149, 21, 'Thai Aluminium Works', '', '0000-00-00 00:00:00', '2018-02-27 05:30:53'),
(150, 21, 'Unspecified Development-Works/Projects', '', '0000-00-00 00:00:00', '2018-02-27 05:31:12'),
(151, 21, 'Water-Treatment/Chemical/Refinery Plant', '', '0000-00-00 00:00:00', '2018-02-27 05:31:12'),
(152, 22, 'Acoustical Design', '', '0000-00-00 00:00:00', '2018-02-27 05:42:24'),
(153, 22, 'Advertizing/Marketing/Media Services', '', '0000-00-00 00:00:00', '2018-02-27 05:42:24'),
(154, 22, 'Agro/Fishing/Forestry Related Consultancy', '', '0000-00-00 00:00:00', '2018-02-27 05:42:52'),
(155, 22, 'Architectural Design', '', '0000-00-00 00:00:00', '2018-02-27 05:42:52'),
(156, 22, 'Civil Engineering Consultancy', '', '0000-00-00 00:00:00', '2018-02-27 05:43:15'),
(157, 22, 'Education/Art/Culture Related Consultancy', '', '0000-00-00 00:00:00', '2018-02-27 05:43:15'),
(158, 22, 'Energy/Power/Gas/Minerals Related Consultancy', '', '0000-00-00 00:00:00', '2018-02-27 05:43:36'),
(159, 22, 'Engineering Survey/Feasibility Study', '', '0000-00-00 00:00:00', '2018-02-27 05:43:36'),
(160, 22, 'Environment/Geology/Climate Related Consultancy', '', '0000-00-00 00:00:00', '2018-02-27 05:43:55'),
(161, 22, 'Finance/Law/Legal/Audit/Tax', '', '0000-00-00 00:00:00', '2018-02-27 05:43:55'),
(162, 22, 'Flood/Disaster/Rehabilitation Related Consultancy', '', '0000-00-00 00:00:00', '2018-02-27 05:44:11'),
(163, 22, 'Health, Nutrition, Immunization &amp; Related Services', '', '0000-00-00 00:00:00', '2018-02-27 05:44:11'),
(164, 22, 'Human Rights Related Consultancy', '', '0000-00-00 00:00:00', '2018-02-27 05:44:31'),
(165, 22, 'Management/HR/Development Studies', '', '0000-00-00 00:00:00', '2018-02-27 05:44:31'),
(166, 22, 'Market Survey/Data Collection', '', '0000-00-00 00:00:00', '2018-02-27 05:44:54'),
(167, 22, 'Networking/Data/Telecom Services', '', '0000-00-00 00:00:00', '2018-02-27 05:44:54'),
(168, 22, 'Procurement &amp; Logistics Related Consultancy', '', '0000-00-00 00:00:00', '2018-02-27 05:45:15'),
(169, 22, 'Rural/Urban Development', '', '0000-00-00 00:00:00', '2018-02-27 05:45:15'),
(170, 22, 'Skilled/Technical Professionals', '', '0000-00-00 00:00:00', '2018-02-27 05:45:32'),
(171, 22, 'Social Communication/Civic Awareness', '', '0000-00-00 00:00:00', '2018-02-27 05:45:32'),
(172, 22, 'Socio-Economic Studies', '', '0000-00-00 00:00:00', '2018-02-27 05:45:51'),
(173, 22, 'Software Development', '', '0000-00-00 00:00:00', '2018-02-27 05:45:51'),
(174, 22, 'Training/Examination Management', '', '0000-00-00 00:00:00', '2018-02-27 05:46:10'),
(175, 22, 'Transportation &amp; Communication Consultancy', '', '0000-00-00 00:00:00', '2018-02-27 05:46:10'),
(176, 22, 'Water/Irrigation/Sanitation Related Consultancy', '', '0000-00-00 00:00:00', '2018-02-27 05:46:26'),
(178, 23, 'AC/Dehumidifier/HVAC/Cooling-Systems', '', '0000-00-00 00:00:00', '2018-02-27 06:01:21'),
(179, 23, 'Air-Treatment &amp; Air-Cleaning Products', '', '0000-00-00 00:00:00', '2018-02-27 06:01:21'),
(180, 23, 'Battery/UPS/IPS/Stabilizers/Power-Supplies', '', '0000-00-00 00:00:00', '2018-02-27 06:01:48'),
(181, 23, 'Boiler &amp; Related Ancillaries', '', '0000-00-00 00:00:00', '2018-02-27 06:01:48'),
(182, 23, 'Cables/Wires/Conductors', '', '0000-00-00 00:00:00', '2018-02-27 06:02:10'),
(183, 23, 'Circuit Breaker/Switchgear', '', '0000-00-00 00:00:00', '2018-02-27 06:02:10'),
(184, 23, 'Electrical Pole/Tower', '', '0000-00-00 00:00:00', '2018-02-27 06:02:27'),
(185, 23, 'Electrical/Industrial Fan', '', '0000-00-00 00:00:00', '2018-02-27 06:02:27'),
(186, 23, 'Electrification/Cabling/Wiring Works', '', '0000-00-00 00:00:00', '2018-02-27 06:02:45'),
(187, 23, 'Energy/Power/Gas/Minerals Related Consultancy', '', '0000-00-00 00:00:00', '2018-02-27 06:02:45'),
(188, 23, 'Fuel/Lub/Petroleum/Industrial Oil', '', '0000-00-00 00:00:00', '2018-02-27 06:03:02'),
(189, 23, 'Generator/Dynamo &amp; Ancillaries', '', '0000-00-00 00:00:00', '2018-02-27 06:03:02'),
(190, 23, 'Household/Home Appliances', '', '0000-00-00 00:00:00', '2018-02-27 06:03:19'),
(191, 23, 'Insulating-Materials', '', '0000-00-00 00:00:00', '2018-02-27 06:03:19'),
(192, 23, 'Lift/Escalator/Elevators &amp; Ancillaries', '', '0000-00-00 00:00:00', '2018-02-27 06:03:51'),
(193, 23, 'Lighting Fixtures/Signs/Signals', '', '0000-00-00 00:00:00', '2018-02-27 06:03:51'),
(194, 23, 'Meter (Electric/Gas/Water etc.)', '', '0000-00-00 00:00:00', '2018-02-27 06:04:09'),
(195, 23, 'Misc. Electrical/Electronic Supplies/Fittings', '', '0000-00-00 00:00:00', '2018-02-27 06:04:09'),
(196, 23, 'Power/Gas Generation Works', '', '0000-00-00 00:00:00', '2018-02-27 06:04:29'),
(197, 23, 'Power/Gas Transmission &amp; Distribution Works', '', '0000-00-00 00:00:00', '2018-02-27 06:04:29'),
(198, 23, 'Pump/Motor and Ancillaries', '', '0000-00-00 00:00:00', '2018-02-27 06:04:48'),
(199, 23, 'Solar Power/Panel &amp; Ancillaries', '', '0000-00-00 00:00:00', '2018-02-27 06:04:48'),
(200, 23, 'Transformer/Alternator &amp; Ancillaries', '', '0000-00-00 00:00:00', '2018-02-27 06:05:06'),
(201, 23, 'Various Gases (Natural/Industrial)', '', '0000-00-00 00:00:00', '2018-02-27 06:05:06'),
(202, 24, 'Battery/UPS/IPS/Stabilizers/Power-Supplies', '', '0000-00-00 00:00:00', '2018-02-27 06:42:25'),
(203, 24, 'Camera/CCTV', '', '0000-00-00 00:00:00', '2018-02-27 06:42:25'),
(204, 24, 'Clocks/Watches/Timepieces', '', '0000-00-00 00:00:00', '2018-02-27 06:42:52'),
(205, 24, 'Computers, Accessories &amp; Peripherals', '', '0000-00-00 00:00:00', '2018-02-27 06:42:52'),
(206, 24, 'Financial Equipments/Machineries', '', '0000-00-00 00:00:00', '2018-02-27 06:43:14'),
(207, 24, 'Household/Home Appliances', '', '0000-00-00 00:00:00', '2018-02-27 06:43:14'),
(208, 24, 'Lighting Fixtures/Signs/Signals', '', '0000-00-00 00:00:00', '2018-02-27 06:43:31'),
(209, 24, 'Misc. Electrical/Electronic Supplies/Fittings', '', '0000-00-00 00:00:00', '2018-02-27 06:43:31'),
(210, 24, 'Networking/Telecom/Wireless Devices', '', '0000-00-00 00:00:00', '2018-02-27 06:43:52'),
(211, 24, 'Phone/FAX/PABX/Intercom', '', '0000-00-00 00:00:00', '2018-02-27 06:43:52'),
(212, 24, 'Photocopy/Lamination/Binding Machine', '', '0000-00-00 00:00:00', '2018-02-27 06:44:15'),
(213, 24, 'Printers/Plotters &amp; Ancillaries', '', '0000-00-00 00:00:00', '2018-02-27 06:44:15'),
(214, 24, 'Projector/Scanner/Display &amp; Imaing Items', '', '0000-00-00 00:00:00', '2018-02-27 06:44:38'),
(215, 24, 'Refrigerator/Fridge', '', '0000-00-00 00:00:00', '2018-02-27 06:44:38'),
(216, 24, 'Scientific/Lab/Measuring/Analytical Instruments', '', '0000-00-00 00:00:00', '2018-02-27 06:45:00'),
(217, 24, 'Security/Safety/Fire-Fighting/Access-Control', '', '0000-00-00 00:00:00', '2018-02-27 06:45:00'),
(218, 24, 'Sound/Acoustic/PA Systems', '', '0000-00-00 00:00:00', '2018-02-27 06:45:18'),
(219, 24, 'Television', '', '0000-00-00 00:00:00', '2018-02-27 06:45:18'),
(220, 25, 'Carpets/Rugs/Mats', '', '0000-00-00 00:00:00', '2018-02-27 06:54:26'),
(221, 25, 'Ceramics/Earthenware/Glassware', '', '0000-00-00 00:00:00', '2018-02-27 06:54:26'),
(222, 25, 'Cleaning/Filtering/Washing Items &amp; Machineries', '', '0000-00-00 00:00:00', '2018-02-27 06:54:44'),
(223, 25, 'Cosmetics &amp; Toiletries', '', '0000-00-00 00:00:00', '2018-02-27 06:54:44'),
(224, 25, 'Curtains/Venetians/Vertical Blinds', '', '0000-00-00 00:00:00', '2018-02-27 06:55:00'),
(225, 25, 'Doors/ Windows/Gates', '', '0000-00-00 00:00:00', '2018-02-27 06:55:00'),
(226, 25, 'False-Ceiling', '', '0000-00-00 00:00:00', '2018-02-27 06:55:21'),
(227, 25, 'Foam/EVA-Sheets', '', '0000-00-00 00:00:00', '2018-02-27 06:55:21'),
(228, 25, 'Furniture (Wood/Steel/Iron/Plastic)', '', '0000-00-00 00:00:00', '2018-02-27 06:55:38'),
(229, 25, 'Home Textiles', '', '0000-00-00 00:00:00', '2018-02-27 06:55:38'),
(230, 25, 'Household Supplies (Non-Electric)', '', '0000-00-00 00:00:00', '2018-02-27 06:55:57'),
(231, 25, 'Household/Home Appliances', '', '0000-00-00 00:00:00', '2018-02-27 06:55:57'),
(232, 25, 'Interior Design/Decoration Works', '', '0000-00-00 00:00:00', '2018-02-27 06:56:14'),
(233, 25, 'Painting/Limewash/Varnish Works', '', '0000-00-00 00:00:00', '2018-02-27 06:56:14'),
(234, 25, 'Plywood/Partex/Board', '', '0000-00-00 00:00:00', '2018-02-27 06:56:31'),
(235, 25, 'Refrigerator/Fridge', '', '0000-00-00 00:00:00', '2018-02-27 06:56:31'),
(236, 25, 'Umbrella', '', '0000-00-00 00:00:00', '2018-02-27 06:56:44'),
(237, 26, 'Bags/Sacks/Cases/Trunks', '', '0000-00-00 00:00:00', '2018-02-27 06:59:49'),
(238, 26, 'Blanket/Jacket/Sweater', '', '0000-00-00 00:00:00', '2018-02-27 06:59:49'),
(239, 26, 'Cap/Hat/Belt', '', '0000-00-00 00:00:00', '2018-02-27 07:00:07'),
(240, 26, 'Carpets/Rugs/Mats', '', '0000-00-00 00:00:00', '2018-02-27 07:00:07'),
(241, 26, 'Fabric/Cloth/Cotton/Linen', '', '0000-00-00 00:00:00', '2018-02-27 07:00:26'),
(242, 26, 'Garment Accessories', '', '0000-00-00 00:00:00', '2018-02-27 07:00:26'),
(243, 26, 'Garmentwear/Readymade Garments', '', '0000-00-00 00:00:00', '2018-02-27 07:00:43'),
(244, 26, 'Geo-Textiles/Geo-Nets', '', '0000-00-00 00:00:00', '2018-02-27 07:00:43'),
(245, 26, 'Home Textiles', '', '0000-00-00 00:00:00', '2018-02-27 07:01:00'),
(246, 26, 'Hosiery/Socks', '', '0000-00-00 00:00:00', '2018-02-27 07:01:00'),
(247, 26, 'Mineral Textiles/Clothes', '', '0000-00-00 00:00:00', '2018-02-27 07:01:16'),
(248, 26, 'Rope/Twine/Thread/Yarn/Net', '', '0000-00-00 00:00:00', '2018-02-27 07:01:16'),
(249, 26, 'Tailoring/Dress Making/Sewing Works', '', '0000-00-00 00:00:00', '2018-02-27 07:01:34'),
(250, 26, 'Tent/Canopy', '', '0000-00-00 00:00:00', '2018-02-27 07:01:34'),
(251, 26, 'Uniform/Workwear', '', '0000-00-00 00:00:00', '2018-02-27 07:01:54'),
(252, 27, 'Abrasive Products', '', '0000-00-00 00:00:00', '2018-02-27 07:07:12'),
(253, 27, 'Cables/Wires/Conductors', '', '0000-00-00 00:00:00', '2018-02-27 07:07:12'),
(254, 27, 'Container/Carton/Cylinder/Reservoirs', '', '0000-00-00 00:00:00', '2018-02-27 07:07:29'),
(255, 27, 'Foundry/Engineering/Metal Works', '', '0000-00-00 00:00:00', '2018-02-27 07:07:29'),
(256, 27, 'Hardware/Mechanical Components', '', '0000-00-00 00:00:00', '2018-02-27 07:07:46'),
(257, 27, 'Iron/Steel/Aluminium/Ingots/Structural Items', '', '0000-00-00 00:00:00', '2018-02-27 07:07:46'),
(258, 27, 'Material Handling Equipments/Machineries', '', '0000-00-00 00:00:00', '2018-02-27 07:09:00'),
(259, 27, 'Minerals, Metals &amp; Alloys', '', '0000-00-00 00:00:00', '2018-02-27 07:09:00'),
(260, 27, 'Pipes, Tubes &amp; Flow Control Equipment/Fittings', '', '0000-00-00 00:00:00', '2018-02-27 07:09:19'),
(261, 27, 'Tin-Shed/Corrugated Sheet', '', '0000-00-00 00:00:00', '2018-02-27 07:09:19'),
(262, 27, 'Tubewell/Deep-Tubewell', '', '0000-00-00 00:00:00', '2018-02-27 07:09:33'),
(263, 28, 'Animal Feed/Veterinary Medicines', '', '0000-00-00 00:00:00', '2018-02-27 07:13:35'),
(264, 28, 'Eyewear/Optical Frame &amp; Lens', '', '0000-00-00 00:00:00', '2018-02-27 07:13:35'),
(265, 28, 'Health, Nutrition, Immunization &amp; Related Services', '', '0000-00-00 00:00:00', '2018-02-27 07:13:55'),
(266, 28, 'Medical Equipments/MSR Goods', '', '0000-00-00 00:00:00', '2018-02-27 07:13:55'),
(267, 28, 'Medicines/Drugs/Vaccines', '', '0000-00-00 00:00:00', '2018-02-27 07:14:12'),
(268, 28, 'Pharmaceutical Raw Materials', '', '0000-00-00 00:00:00', '2018-02-27 07:14:12'),
(269, 28, 'Scientific/Lab/Measuring/Analytical Instruments', '', '0000-00-00 00:00:00', '2018-02-27 07:14:34'),
(270, 28, 'Sports/Gym/Fitness Items', '', '0000-00-00 00:00:00', '2018-02-27 07:14:34'),
(271, 29, 'Animation, Graphic/Website Design', '', '0000-00-00 00:00:00', '2018-02-27 09:10:36'),
(272, 29, 'Data Entry/Data Processing', '', '0000-00-00 00:00:00', '2018-02-27 09:10:36'),
(273, 29, 'Digitizing/Scanning/Archiving/OMR/OCR', '', '0000-00-00 00:00:00', '2018-02-27 09:10:59'),
(274, 29, 'ICT Support &amp; Maintenance Services', '', '0000-00-00 00:00:00', '2018-02-27 09:10:59'),
(275, 29, 'ICT Training', '', '0000-00-00 00:00:00', '2018-02-27 09:11:20'),
(276, 29, 'Networking/Data/Telecom Services', '', '0000-00-00 00:00:00', '2018-02-27 09:11:20'),
(277, 29, 'Off-The-Shelf/Systems Software', '', '0000-00-00 00:00:00', '2018-02-27 09:11:39'),
(278, 29, 'Software Development', '', '0000-00-00 00:00:00', '2018-02-27 09:11:39'),
(279, 30, 'AC/Dehumidifier/HVAC/Cooling-Systems', '', '0000-00-00 00:00:00', '2018-02-27 09:19:18'),
(280, 30, 'Agro Machineries/Equipments', '', '0000-00-00 00:00:00', '2018-02-27 09:19:18'),
(281, 30, 'Air-Treatment &amp; Air-Cleaning Products', '', '0000-00-00 00:00:00', '2018-02-27 09:19:39'),
(282, 30, 'Apparels/Jute Machineries and Spares', '', '0000-00-00 00:00:00', '2018-02-27 09:19:39'),
(283, 30, 'Boiler &amp; Related Ancillaries', '', '0000-00-00 00:00:00', '2018-02-27 09:19:59'),
(284, 30, 'Cleaning/Filtering/Washing Items &amp; Machineries', '', '0000-00-00 00:00:00', '2018-02-27 09:19:59'),
(285, 30, 'Construction Machineries', '', '0000-00-00 00:00:00', '2018-02-27 09:20:18'),
(286, 30, 'Construction Vehicles', '', '0000-00-00 00:00:00', '2018-02-27 09:20:18'),
(287, 30, 'Defense Items (Army/Air/Navy/Marine/Police)', '', '0000-00-00 00:00:00', '2018-02-27 09:20:38'),
(288, 30, 'Filling Station/CNG Refueling Machineries', '', '0000-00-00 00:00:00', '2018-02-27 09:20:38'),
(289, 30, 'Film/Photographic Machineries', '', '0000-00-00 00:00:00', '2018-02-27 09:20:59'),
(290, 30, 'Financial Equipments/Machineries', '', '0000-00-00 00:00:00', '2018-02-27 09:20:59'),
(291, 30, 'Generator/Dynamo &amp; Ancillaries', '', '0000-00-00 00:00:00', '2018-02-27 09:21:21'),
(292, 30, 'Geological/Mining/Survey Equipments', '', '0000-00-00 00:00:00', '2018-02-27 09:21:21'),
(293, 30, 'Lift/Escalator/Elevators &amp; Ancillaries', '', '0000-00-00 00:00:00', '2018-02-27 09:21:41'),
(294, 30, 'Manufacturing &amp; Processing Machineries', '', '0000-00-00 00:00:00', '2018-02-27 09:21:41'),
(295, 30, 'Material Handling Equipments/Machineries', '', '0000-00-00 00:00:00', '2018-02-27 09:22:00'),
(296, 30, 'Medical Equipments/MSR Goods', '', '0000-00-00 00:00:00', '2018-02-27 09:22:00'),
(297, 30, 'Meteorological Machineries/Equipments', '', '0000-00-00 00:00:00', '2018-02-27 09:22:19'),
(298, 30, 'Misc. Machineries/Equipments', '', '0000-00-00 00:00:00', '2018-02-27 09:22:19'),
(299, 30, 'Photocopy/Lamination/Binding Machine', '', '0000-00-00 00:00:00', '2018-02-27 09:22:37'),
(300, 30, 'Pipes, Tubes &amp; Flow Control Equipment/Fittings', '', '0000-00-00 00:00:00', '2018-02-27 09:22:37'),
(301, 30, 'Port/Marine/Navigational  Machineries', '', '0000-00-00 00:00:00', '2018-02-27 09:22:57'),
(302, 30, 'Power/Gas Generation Works', '', '0000-00-00 00:00:00', '2018-02-27 09:22:57'),
(303, 30, 'Power/Gas Transmission &amp; Distribution Works', '', '0000-00-00 00:00:00', '2018-02-27 09:23:16'),
(304, 30, 'Printing/Packaging Machineries', '', '0000-00-00 00:00:00', '2018-02-27 09:23:16'),
(305, 30, 'Pump/Motor and Ancillaries', '', '0000-00-00 00:00:00', '2018-02-27 09:23:32'),
(306, 30, 'Rescue Equipments', '', '0000-00-00 00:00:00', '2018-02-27 09:23:32'),
(307, 30, 'Scientific/Lab/Measuring/Analytical Instruments', '', '0000-00-00 00:00:00', '2018-02-27 09:23:54'),
(308, 30, 'Solar Power/Panel &amp; Ancillaries', '', '0000-00-00 00:00:00', '2018-02-27 09:23:54'),
(309, 30, 'Transformer/Alternator &amp; Ancillaries', '', '0000-00-00 00:00:00', '2018-02-27 09:24:22'),
(310, 30, 'Water-Treatment/Chemical/Refinery Plant', '', '0000-00-00 00:00:00', '2018-02-27 09:24:22'),
(311, 31, 'Binding/Laminating/Photocopy Services', '', '0000-00-00 00:00:00', '2018-02-27 09:28:17'),
(312, 31, 'Book/Journal/Magazine Suppliers', '', '0000-00-00 00:00:00', '2018-02-27 09:28:17'),
(313, 31, 'Education/Training Material Suppliers', '', '0000-00-00 00:00:00', '2018-02-27 09:28:36'),
(314, 31, 'Office Stationeries/Printing Materials', '', '0000-00-00 00:00:00', '2018-02-27 09:28:36'),
(315, 31, 'Paper and Related Products', '', '0000-00-00 00:00:00', '2018-02-27 09:28:54'),
(316, 31, 'Photocopy/Lamination/Binding Machine', '', '0000-00-00 00:00:00', '2018-02-27 09:28:54'),
(317, 31, 'Printing/Packaging Machineries', '', '0000-00-00 00:00:00', '2018-02-27 09:29:18'),
(318, 31, 'Printing/Packaging/Publication Works', '', '0000-00-00 00:00:00', '2018-02-27 09:29:18'),
(319, 32, 'Bagging/Sewing/Stacking Works', '', '0000-00-00 00:00:00', '2018-02-27 09:30:47'),
(320, 32, 'Cleaning-Works/Garbage/Waste-Disposals', '', '0000-00-00 00:00:00', '2018-02-27 09:30:47'),
(321, 32, 'Cobbler', '', '0000-00-00 00:00:00', '2018-02-27 09:31:04'),
(322, 32, 'Gardening Works', '', '0000-00-00 00:00:00', '2018-02-27 09:31:04'),
(323, 32, 'Hair Dressing/Barber', '', '0000-00-00 00:00:00', '2018-02-27 09:31:24'),
(324, 32, 'Labor/Handling-Works', '', '0000-00-00 00:00:00', '2018-02-27 09:31:24'),
(325, 32, 'Land Development/Earth-Works', '', '0000-00-00 00:00:00', '2018-02-27 09:31:42'),
(326, 32, 'Laundry Works', '', '0000-00-00 00:00:00', '2018-02-27 09:31:42'),
(327, 32, 'Loading/Unloading Works', '', '0000-00-00 00:00:00', '2018-02-27 09:32:01'),
(328, 32, 'Manpower Supply (Guard/Driver/Clark/MLSS etc.)', '', '0000-00-00 00:00:00', '2018-02-27 09:32:01'),
(329, 32, 'Masonry/Wooden/Carpentry Works', '', '0000-00-00 00:00:00', '2018-02-27 09:32:21'),
(330, 32, 'Pesticides &amp; Pest-Control', '', '0000-00-00 00:00:00', '2018-02-27 09:32:21'),
(331, 32, 'Rent-a-Car/Vehicle Hiring/Driving', '', '0000-00-00 00:00:00', '2018-02-27 09:32:37'),
(332, 32, 'Tailoring/Dress Making/Sewing Works', '', '0000-00-00 00:00:00', '2018-02-27 09:32:37'),
(333, 32, 'Tree/Bush/Grass Cutting', '', '0000-00-00 00:00:00', '2018-02-27 09:32:54'),
(335, 33, 'Bags/Sacks/Cases/Trunks', '', '0000-00-00 00:00:00', '2018-02-27 09:51:33'),
(336, 33, 'Blanket/Jacket/Sweater', '', '0000-00-00 00:00:00', '2018-02-27 09:51:33'),
(337, 33, 'Cap/Hat/Belt', '', '0000-00-00 00:00:00', '2018-02-27 09:52:01'),
(338, 33, 'Carpets/Rugs/Mats', '', '0000-00-00 00:00:00', '2018-02-27 09:52:01'),
(339, 33, 'Container/Carton/Cylinder/Reservoirs', '', '0000-00-00 00:00:00', '2018-02-27 09:52:19'),
(340, 33, 'Footwear &amp; Accessories', '', '0000-00-00 00:00:00', '2018-02-27 09:52:19'),
(341, 33, 'Jute-Fiber/Raw-Jute', '', '0000-00-00 00:00:00', '2018-02-27 09:52:43'),
(342, 33, 'Leather Goods', '', '0000-00-00 00:00:00', '2018-02-27 09:52:43'),
(343, 33, 'Misc. Plastic/Rubber/Synthetic-Goods', '', '0000-00-00 00:00:00', '2018-02-27 09:53:03'),
(344, 33, 'Pipes, Tubes &amp; Flow Control Equipment/Fittings', '', '0000-00-00 00:00:00', '2018-02-27 09:53:03'),
(345, 33, 'Plastic/Rubber Sheets &amp; Films', '', '0000-00-00 00:00:00', '2018-02-27 09:53:45'),
(346, 33, 'Rope/Twine/Thread/Yarn/Net', '', '0000-00-00 00:00:00', '2018-02-27 09:53:45'),
(347, 33, 'Tent/Canopy', '', '0000-00-00 00:00:00', '2018-02-27 09:54:02'),
(348, 33, 'Tyres/Tubes', '', '0000-00-00 00:00:00', '2018-02-27 09:54:02'),
(349, 33, 'Unspecified Jute/Plastic/Rubber Goods', '', '0000-00-00 00:00:00', '2018-02-27 09:54:12'),
(350, 34, 'Hiring/Rental', '', '0000-00-00 00:00:00', '2018-02-27 09:56:11'),
(351, 34, 'Leasing', '', '0000-00-00 00:00:00', '2018-02-27 09:56:11'),
(352, 34, 'Membership Sale/Auction', '', '0000-00-00 00:00:00', '2018-02-27 09:56:28'),
(353, 34, 'Rental of Satellite Space', '', '0000-00-00 00:00:00', '2018-02-27 09:56:28'),
(354, 34, 'Sales/Auction of Agro/Forestry Products', '', '0000-00-00 00:00:00', '2018-02-27 09:56:45'),
(355, 34, 'Sales/Auction of Books/Printed Items', '', '0000-00-00 00:00:00', '2018-02-27 09:56:45'),
(356, 34, 'Sales/Auction of Building/Infra/Land/Properties', '', '0000-00-00 00:00:00', '2018-02-27 09:57:07'),
(357, 34, 'Sales/Auction of Chemical Products', '', '0000-00-00 00:00:00', '2018-02-27 09:57:07'),
(358, 34, 'Sales/Auction of Containers/Drum/Barrels', '', '0000-00-00 00:00:00', '2018-02-27 09:57:25'),
(359, 34, 'Sales/Auction of Electrical/Electronic Goods', '', '0000-00-00 00:00:00', '2018-02-27 09:57:25'),
(360, 34, 'Sales/Auction of Factories/Plant/Mill', '', '0000-00-00 00:00:00', '2018-02-27 09:57:43'),
(361, 34, 'Sales/Auction of Food Products', '', '0000-00-00 00:00:00', '2018-02-27 09:57:43'),
(362, 34, 'Sales/Auction of Furniture/Household Goods', '', '0000-00-00 00:00:00', '2018-02-27 09:58:01'),
(363, 34, 'Sales/Auction of Garments/Leather/Jute Goods', '', '0000-00-00 00:00:00', '2018-02-27 09:58:01'),
(364, 34, 'Sales/Auction of ICT/Telecom Goods', '', '0000-00-00 00:00:00', '2018-02-27 09:58:33'),
(365, 34, 'Sales/Auction of Jewelry/Metalic Items', '', '0000-00-00 00:00:00', '2018-02-27 09:58:33'),
(366, 34, 'Sales/Auction of Live Animals', '', '0000-00-00 00:00:00', '2018-02-27 09:58:51'),
(367, 34, 'Sales/Auction of Machineries/Hardware', '', '0000-00-00 00:00:00', '2018-02-27 09:58:51'),
(368, 34, 'Sales/Auction of Molasses/Chitagur', '', '0000-00-00 00:00:00', '2018-02-27 09:59:15'),
(369, 34, 'Sales/Auction of Plastic/Rubber/Synthetic Goods', '', '0000-00-00 00:00:00', '2018-02-27 09:59:15'),
(370, 34, 'Sales/Auction of Scrap/Defunct- Goods', '', '0000-00-00 00:00:00', '2018-02-27 09:59:31'),
(371, 34, 'Sales/Auction of Soil/Sand/Building Materials', '', '0000-00-00 00:00:00', '2018-02-27 09:59:31'),
(372, 34, 'Sales/Auction of Unpurified Products', '', '0000-00-00 00:00:00', '2018-02-27 09:59:56'),
(373, 34, 'Sales/Disposal of Vehicle&amp;Motor-Parts', '', '0000-00-00 00:00:00', '2018-02-27 09:59:56'),
(374, 34, 'Toll Collections', '', '0000-00-00 00:00:00', '2018-02-27 10:00:53'),
(375, 34, 'Unspecified/Unclassified Goods/Works/Services', '', '0000-00-00 00:00:00', '2018-02-27 10:00:53');

-- --------------------------------------------------------

--
-- Table structure for table `ts_tariffs`
--

CREATE TABLE `ts_tariffs` (
  `tariff_id` int(11) NOT NULL,
  `tariff_name` varchar(20) NOT NULL,
  `tariff_duration` int(11) NOT NULL,
  `tariff_month_year` int(1) NOT NULL COMMENT '1 = Month, 2 = Year',
  `tariff_amount` int(11) NOT NULL,
  `tariff_remarks` varchar(255) NOT NULL,
  `tariff_bd_overseas` int(1) NOT NULL COMMENT '1 = BD, 2 = Overseas',
  `tariff_status` int(1) NOT NULL COMMENT '1 = Active, 2 = Deactive',
  `tariff_created` datetime NOT NULL,
  `tariff_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ts_tariffs`
--

INSERT INTO `ts_tariffs` (`tariff_id`, `tariff_name`, `tariff_duration`, `tariff_month_year`, `tariff_amount`, `tariff_remarks`, `tariff_bd_overseas`, `tariff_status`, `tariff_created`, `tariff_updated`) VALUES
(1, 'Monthly', 1, 1, 300, 'Monthly- 300tk BD users', 1, 2, '2018-02-04 18:46:16', '2018-02-05 04:20:31'),
(2, '3-Monthly', 3, 1, 800, '3-Monthly-800tk for bd users', 1, 1, '2018-02-04 18:47:45', '2018-02-05 04:20:27'),
(3, 'Yearly', 1, 2, 2000, 'Yearly-2000 for overseas user', 2, 1, '2018-02-04 18:51:30', '2018-02-05 04:20:22'),
(4, '6-Monthly', 6, 1, 1500, '6-Month 1500tk for bd users', 1, 2, '2018-02-04 19:06:16', '2018-02-05 04:20:19'),
(5, 'BD-Yearly', 1, 2, 3000, 'BD-Yearly 3000tk for bd users', 1, 1, '2018-02-04 19:08:57', '2018-02-05 04:20:14'),
(6, 'Not Using', 0, 1, 0, '00', 1, 2, '2018-02-04 19:10:03', '2018-02-05 04:18:47'),
(7, 'test', 20, 1, 100, 'good', 1, 2, '2019-12-10 16:49:13', '2019-12-10 10:51:01');

-- --------------------------------------------------------

--
-- Table structure for table `ts_tenders`
--

CREATE TABLE `ts_tenders` (
  `tender_auto_id` int(11) NOT NULL,
  `tender_title` text NOT NULL,
  `tender_manual_id` varchar(20) NOT NULL,
  `tender_doc_price` varchar(100) NOT NULL,
  `tender_security_amount` varchar(255) NOT NULL,
  `tender_published_on` date NOT NULL,
  `tender_closed_on` date NOT NULL,
  `tender_closed_time` varchar(8) NOT NULL,
  `tender_prebid_meeting` date NOT NULL,
  `tender_opening` date DEFAULT NULL,
  `tender_opening_time` varchar(8) DEFAULT NULL,
  `tender_schedule_purchase` date DEFAULT NULL,
  `tender_sche_pur_time` varchar(8) DEFAULT NULL,
  `tender_inviter` int(11) NOT NULL,
  `tender_source` int(11) NOT NULL,
  `tender_division` int(11) NOT NULL,
  `tender_district` int(11) NOT NULL,
  `tender_procuring_div` int(11) DEFAULT NULL,
  `tender_procuring_dist` int(11) DEFAULT NULL,
  `tender_category` int(11) NOT NULL,
  `tender_sub_category` int(11) NOT NULL,
  `tender_pro_method` int(11) NOT NULL,
  `tender_call_type` int(1) NOT NULL COMMENT '1 = Tender, 2 = Corrigendum, 3 = Cancellation, 4 = republished',
  `tender_on` int(1) NOT NULL COMMENT '1 = Goods, 2 = Works, 3 = Services',
  `tender_bidding_type` int(1) NOT NULL COMMENT '1 = Local, 2 = International',
  `tender_img_url` varchar(255) NOT NULL,
  `tender_view` int(11) NOT NULL,
  `tender_created` datetime NOT NULL,
  `tender_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ts_tenders`
--

INSERT INTO `ts_tenders` (`tender_auto_id`, `tender_title`, `tender_manual_id`, `tender_doc_price`, `tender_security_amount`, `tender_published_on`, `tender_closed_on`, `tender_closed_time`, `tender_prebid_meeting`, `tender_opening`, `tender_opening_time`, `tender_schedule_purchase`, `tender_sche_pur_time`, `tender_inviter`, `tender_source`, `tender_division`, `tender_district`, `tender_procuring_div`, `tender_procuring_dist`, `tender_category`, `tender_sub_category`, `tender_pro_method`, `tender_call_type`, `tender_on`, `tender_bidding_type`, `tender_img_url`, `tender_view`, `tender_created`, `tender_updated`) VALUES
(25, 'Invitation for supply of back pack brush cutter, grass-cutter machine, installation.', '0000000001', 'See image for detail', 'See image for details', '2018-03-01', '2018-03-29', '12:00 PM', '2018-03-15', NULL, NULL, '2018-03-04', NULL, 60, 4, 5, 5, NULL, NULL, 30, 294, 1, 2, 1, 1, 'http://173.212.223.213/tender_seba/images/tender/25.jpg', 0, '2018-03-05 18:40:00', '2018-03-05 13:49:29'),
(26, 'Invitation for making of assault course ground', '0000000002', 'See image for detail', 'See image for details', '2018-03-01', '2018-03-02', '12:00 pm', '2018-03-06', NULL, NULL, '2018-03-04', NULL, 4, 4, 6, 11, NULL, NULL, 15, 25, 2, 3, 1, 1, 'http://173.212.223.213/tender_seba/images/tender/26.jpg', 1, '2018-03-05 18:48:59', '2018-03-05 13:49:33'),
(27, 'Invitation for construction, improvement of palisading, classroom, barbed-fencing-work, stage, culvert, boundary-wall, installation of deep-tube-well, guide-wall, supply of sewing-machine, bicycle', '0000000003', 'See image for detail', 'See image for details', '2018-03-03', '2018-03-04', '12:00 am', '2018-03-04', '2018-03-10', NULL, '2018-03-06', NULL, 5, 5, 7, 23, NULL, NULL, 17, 59, 4, 1, 1, 1, 'http://173.212.223.213/tender_seba/images/tender/27.jpg', 0, '2018-03-05 18:51:09', '2018-03-05 13:45:19'),
(28, 'Invitation for construction of monument and repair, alternation & maintenance of hospital (e-Tender)', '0000000004', 'See image for detail', 'See image for details', '2018-03-07', '2018-03-08', '12:00 pm', '2018-03-09', NULL, NULL, NULL, NULL, 4, 4, 8, 40, NULL, NULL, 18, 77, 9, 1, 1, 1, 'http://173.212.223.213/tender_seba/images/tender/28.jpg', 3, '2018-03-05 18:58:26', '2023-01-09 05:06:57'),
(29, 'Invitation for construction of memorial plate and building (3 Lots)', '0000000005', 'Tk 400 per lot', 'Tk 7500, 11500, 12500 respectively', '2018-03-25', '2018-04-07', '12:16 pm', '2018-05-05', NULL, NULL, NULL, NULL, 4, 4, 5, 5, NULL, NULL, 15, 25, 1, 1, 1, 1, '', 0, '2018-03-05 19:02:30', '2018-03-05 13:45:36'),
(30, 'Auction for sales of properties', '0000000006', 'See image for detail', 'See image for details', '2018-03-13', '2018-03-15', '12:00 pm', '2018-03-13', NULL, NULL, NULL, NULL, 5, 47, 11, 53, NULL, NULL, 18, 82, 4, 1, 1, 1, 'http://173.212.223.213/tender_seba/images/tender/30.jpg', 1, '2018-03-01 19:19:41', '2021-01-10 12:04:19'),
(31, 'Auction for sales of properties1', '0000000007', 'See image for detail', 'See image for details', '2018-03-18', '2018-03-19', '10:00 AM', '2018-03-20', NULL, NULL, NULL, NULL, 6, 7, 9, 41, NULL, NULL, 19, 102, 5, 2, 2, 2, 'http://173.212.223.213/tender_seba/images/tender/31.jpg', 1, '2018-03-01 19:22:22', '2023-02-11 17:04:37'),
(32, 'Request for Proposal (RFP) for making of manuscript', '0000000008', 'See image for detail', 'See image for details', '2018-03-19', '2018-03-29', '12:00 pm', '2018-03-21', NULL, NULL, NULL, NULL, 8, 9, 5, 6, NULL, NULL, 15, 26, 1, 3, 3, 1, 'http://173.212.223.213/tender_seba/images/tender/32.jpg', 5, '2018-03-01 19:24:41', '2019-12-10 11:12:32'),
(33, 'Corrigendum notice (amendment made on this tender has been running in second slot again)', '0000000009', '313tk', 'See image for details', '2018-01-24', '2018-02-27', '12:00 pm', '2018-03-20', NULL, NULL, NULL, NULL, 43, 6, 10, 52, NULL, NULL, 24, 202, 7, 2, 2, 2, 'http://173.212.223.213/tender_seba/images/tender/33.jpg', 1, '2018-03-01 19:45:02', '2019-12-10 11:08:44'),
(34, 'Invitation for painting, lettering of KM-post of bridge culvert railing post parapet wall guide post, reconstruction of culvert, palisading, earth-filling, supply, filling of bats and local sand for repairing of damaged pavement (e-Tender)', '0000000010', 'See image for details', 'See image for details', '2018-03-04', '2018-03-05', '12:16 pm', '2018-03-06', '2018-03-07', '10:00 am', '2018-03-08', '03:00 pm', 7, 4, 5, 9, NULL, NULL, 20, 115, 1, 4, 1, 2, 'http://173.212.223.213/tender_seba/images/tender/34.jpg', 21, '2018-03-05 18:53:47', '2023-02-13 05:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `ts_user_cat_list`
--

CREATE TABLE `ts_user_cat_list` (
  `ucat_id` int(11) NOT NULL,
  `ucat_user_id` int(11) NOT NULL,
  `ucat_sub_cat_id` int(11) NOT NULL,
  `ucat_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ts_user_cat_list`
--

INSERT INTO `ts_user_cat_list` (`ucat_id`, `ucat_user_id`, `ucat_sub_cat_id`, `ucat_updated`) VALUES
(20, 30, 20, '2018-02-24 08:43:43'),
(21, 30, 22, '2018-02-24 08:43:43'),
(22, 30, 21, '2018-02-24 08:43:43'),
(23, 31, 20, '2018-02-24 08:57:20'),
(24, 31, 22, '2018-02-24 08:57:20'),
(25, 32, 21, '2018-02-24 10:10:25'),
(26, 32, 22, '2018-02-24 10:10:25'),
(27, 29, 20, '2018-02-25 13:20:01'),
(28, 29, 22, '2018-02-25 13:20:01'),
(29, 29, 24, '2018-02-25 13:20:01'),
(54, 1, 49, '2018-03-04 12:45:31'),
(55, 1, 50, '2018-03-04 12:45:31'),
(56, 1, 51, '2018-03-04 12:45:31'),
(57, 1, 25, '2018-03-04 12:45:31'),
(58, 1, 26, '2018-03-04 12:45:31'),
(59, 1, 27, '2018-03-04 12:45:31'),
(73, 43, 49, '2018-04-09 06:34:36'),
(74, 43, 50, '2018-04-09 06:34:36'),
(75, 43, 51, '2018-04-09 06:34:36'),
(76, 43, 29, '2018-04-09 06:34:36'),
(77, 43, 30, '2018-04-09 06:34:36'),
(78, 43, 31, '2018-04-09 06:34:36'),
(79, 43, 32, '2018-04-09 06:34:36'),
(80, 43, 34, '2018-04-09 06:34:36'),
(81, 43, 36, '2018-04-09 06:34:36'),
(82, 43, 38, '2018-04-09 06:34:36');

-- --------------------------------------------------------

--
-- Table structure for table `ts_user_fav_ten_list`
--

CREATE TABLE `ts_user_fav_ten_list` (
  `ufav_id` int(11) NOT NULL,
  `ufav_user_id` int(11) NOT NULL,
  `ufav_tender_id` int(11) NOT NULL,
  `ufav_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ts_user_fav_ten_list`
--

INSERT INTO `ts_user_fav_ten_list` (`ufav_id`, `ufav_user_id`, `ufav_tender_id`, `ufav_created`) VALUES
(45, 43, 33, '2018-03-11 06:36:31'),
(47, 43, 27, '2018-03-11 06:46:19'),
(48, 43, 34, '2018-03-11 06:47:00');

-- --------------------------------------------------------

--
-- Table structure for table `ts_web_user`
--

CREATE TABLE `ts_web_user` (
  `webu_id` int(11) NOT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8 NOT NULL,
  `webu_full_name` varchar(100) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `salt` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `forgotten_password_code` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `forgotten_password_time` int(10) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `activation_code` varchar(255) NOT NULL,
  `created_on` int(10) UNSIGNED NOT NULL,
  `webu_status` int(1) NOT NULL COMMENT '1 = Active, 2 = Deactive',
  `webu_email` varchar(70) NOT NULL,
  `webu_phone` varchar(20) NOT NULL,
  `webu_web_access` int(1) NOT NULL COMMENT '1 = Running, 2 = Suspend',
  `webu_web_acc_exp` date NOT NULL,
  `webu_email_alert` int(1) NOT NULL COMMENT '1 = Running, 2 = Suspend',
  `webu_email_al_exp` date NOT NULL,
  `webu_sms_alert` int(1) NOT NULL COMMENT '1 = Running, 2 = Suspend',
  `webu_sms_al_exp` date NOT NULL,
  `webu_auto_reminder` int(1) NOT NULL COMMENT '1 = Running, 2 = Suspend',
  `webu_auto_re_exp` date NOT NULL,
  `webu_company_name` varchar(150) NOT NULL,
  `webu_designation` varchar(100) NOT NULL,
  `webu_company_type` int(11) NOT NULL,
  `webu_company_address` varchar(255) NOT NULL,
  `webu_website` varchar(255) NOT NULL,
  `webu_created` datetime NOT NULL,
  `webu_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ts_web_user`
--

INSERT INTO `ts_web_user` (`webu_id`, `ip_address`, `webu_full_name`, `password`, `salt`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `last_login`, `activation_code`, `created_on`, `webu_status`, `webu_email`, `webu_phone`, `webu_web_access`, `webu_web_acc_exp`, `webu_email_alert`, `webu_email_al_exp`, `webu_sms_alert`, `webu_sms_al_exp`, `webu_auto_reminder`, `webu_auto_re_exp`, `webu_company_name`, `webu_designation`, `webu_company_type`, `webu_company_address`, `webu_website`, `webu_created`, `webu_updated`) VALUES
(43, '202.133.91.102', 'Ismail', '$2y$08$wCRQw4BNt.hd1R/2J7SVyOnIIIxDXz5ghNothRy5VMp2ncvbo4nQu', NULL, NULL, NULL, NULL, 1673240084, '', 1519908399, 1, 'ismail13hossen@gmail.com', '01671397450', 0, '0000-00-00', 1, '2018-03-31', 0, '0000-00-00', 0, '0000-00-00', '', '', 0, '', '', '2018-03-01 18:46:39', '2023-01-09 04:54:44'),
(44, '103.222.22.141', 'Pollob', '$2y$08$S83/Gpe/apLv4KesJB7zE.l2YxvLUOwaC1hHBv8TtBc/bY0.flCOC', NULL, NULL, NULL, NULL, NULL, '', 1520258779, 1, 'pollob8@gmail.com', '01671397451', 0, '0000-00-00', 1, '2018-03-31', 0, '0000-00-00', 0, '0000-00-00', '', '', 0, '', '', '2018-03-05 20:06:19', '2018-03-05 14:07:01'),
(45, '202.133.91.102', 'araf', '$2y$08$z1rqVsVg0Zwfs2Gf6bpqKOXNsyq/OhSqO65NumsyOgvIDYmDZVkvy', NULL, 'w1b-JDlTx3GIaEbJMrE2weeaa282344ed53223f4', 1576037116, NULL, NULL, 'a6bc6782c8caafd137f2916c45f934ddf307bc41', 1523187049, 0, 'araf@gmail.com', '01671397454', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', '', '', 0, '', '', '2018-04-08 17:30:49', '2019-12-11 04:05:16'),
(46, '202.133.91.102', 'kaoser', '$2y$08$mMTKoP0DE456uTo7.esxjeb48vZc/m9AusN9pAkuoIqffJQBbAp7q', NULL, NULL, NULL, NULL, 1576036956, '', 1575945661, 1, 'kaosermahmud.cse@gmail.com', '01845845486', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', '', '', 0, '', '', '2019-12-10 08:41:01', '2019-12-11 04:02:36'),
(47, '202.133.91.102', '', '$2y$08$8nrwhmj8ZFeHMe.WLl6QSuZEj/2PnefT0EuzIRzJhQku8czo7is1W', NULL, NULL, NULL, NULL, 1576042092, '', 1576041295, 1, 'kaosermahmud.cse@gmail.com', '', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', '', '', 0, '', '', '2019-12-11 11:14:55', '2019-12-11 05:28:12'),
(48, '202.133.91.102', '', '$2y$08$4QEXoP68iPwSQ6ODIUwd3uR8v.vscaykVJkOfUuwKrAOmKmhbyEPG', NULL, NULL, NULL, NULL, 1576041458, '', 1576041396, 1, 'kaosermahmud111@gmail.com', '', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', '', '', 0, '', '', '2019-12-11 11:16:36', '2019-12-11 05:17:38'),
(49, '114.130.119.110', 'Khalid', '$2y$08$gtr8uGTLrMAbN8Er58VUqeK8JGnGAqhdImxQLD9t2rC9PR/S52gUu', NULL, NULL, NULL, NULL, NULL, '451add36787c90da2a0b7c4794baa56276fef21b', 1671614259, 0, 'khalid@gmail.com', '01689322376', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', '', '', 0, '', '', '2022-12-21 15:17:39', '2022-12-21 09:17:39');

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
(1, '127.0.0.1', 'administrator', '$2y$08$7G9a1dqcBsczIU71PfjC1.CzkObDQpU5mXk9QL41e3Ach1IfYRl4i', '', 'administrator@gmail.com', NULL, NULL, '5Blh.PxSoRMYy1QEGejR3O', 1496699848, 1675942516, 1, 'Rafiq 1', 'Ahmed', '', '', '', '0000-00-00'),
(4, '::1', 'mafizur@sat', '$2y$08$DoRmezjKRG/4h1kmtKK7/e.vg5DYWrYhdV6g/kLxR5hRD2Po5J5ZC', NULL, 'mafizur.sat@gmail.com', NULL, NULL, NULL, 1502622274, 1507461581, 1, 'Mafizur', 'Rahman', '', '', '', '0000-00-00'),
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
(76, 4, 2),
(52, 25, 7),
(51, 27, 5),
(54, 28, 6),
(55, 29, 2),
(57, 30, 2),
(58, 31, 2),
(59, 32, 2),
(60, 33, 2),
(61, 34, 2),
(62, 35, 2),
(63, 36, 2),
(64, 37, 2),
(65, 38, 2),
(66, 39, 2),
(67, 40, 2),
(68, 41, 2),
(69, 42, 2),
(70, 43, 2),
(71, 44, 2),
(72, 45, 2),
(73, 46, 2),
(74, 47, 2),
(75, 48, 2),
(77, 49, 2);

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
-- Indexes for table `ts_feedbacks`
--
ALTER TABLE `ts_feedbacks`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `ts_feedback_answers`
--
ALTER TABLE `ts_feedback_answers`
  ADD PRIMARY KEY (`answer_id`);

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
-- Indexes for table `ts_tariffs`
--
ALTER TABLE `ts_tariffs`
  ADD PRIMARY KEY (`tariff_id`);

--
-- Indexes for table `ts_tenders`
--
ALTER TABLE `ts_tenders`
  ADD PRIMARY KEY (`tender_auto_id`);

--
-- Indexes for table `ts_user_cat_list`
--
ALTER TABLE `ts_user_cat_list`
  ADD PRIMARY KEY (`ucat_id`);

--
-- Indexes for table `ts_user_fav_ten_list`
--
ALTER TABLE `ts_user_fav_ten_list`
  ADD PRIMARY KEY (`ufav_id`);

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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `ts_districts`
--
ALTER TABLE `ts_districts`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `ts_divisions`
--
ALTER TABLE `ts_divisions`
  MODIFY `division_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `ts_feedbacks`
--
ALTER TABLE `ts_feedbacks`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ts_feedback_answers`
--
ALTER TABLE `ts_feedback_answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ts_inviters`
--
ALTER TABLE `ts_inviters`
  MODIFY `inviter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `ts_payment_history`
--
ALTER TABLE `ts_payment_history`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ts_procurement_methods`
--
ALTER TABLE `ts_procurement_methods`
  MODIFY `pro_method_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ts_sources`
--
ALTER TABLE `ts_sources`
  MODIFY `source_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `ts_sub_categories`
--
ALTER TABLE `ts_sub_categories`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=376;
--
-- AUTO_INCREMENT for table `ts_tariffs`
--
ALTER TABLE `ts_tariffs`
  MODIFY `tariff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ts_tenders`
--
ALTER TABLE `ts_tenders`
  MODIFY `tender_auto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `ts_user_cat_list`
--
ALTER TABLE `ts_user_cat_list`
  MODIFY `ucat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `ts_user_fav_ten_list`
--
ALTER TABLE `ts_user_fav_ten_list`
  MODIFY `ufav_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `ts_web_user`
--
ALTER TABLE `ts_web_user`
  MODIFY `webu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
