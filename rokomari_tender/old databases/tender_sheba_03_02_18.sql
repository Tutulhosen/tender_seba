-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2018 at 07:56 AM
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
-- Table structure for table `ec_car_types`
--

CREATE TABLE `ec_car_types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `basic_price` double NOT NULL,
  `basic_hour` int(11) NOT NULL,
  `per_hour_ot_price` double NOT NULL,
  `mileage_cost` double NOT NULL,
  `night_hold_allowance` double NOT NULL,
  `food_allowance` int(11) NOT NULL,
  `cars` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `img_url` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ec_car_types`
--

INSERT INTO `ec_car_types` (`id`, `type_name`, `basic_price`, `basic_hour`, `per_hour_ot_price`, `mileage_cost`, `night_hold_allowance`, `food_allowance`, `cars`, `status`, `img_url`, `created`, `updated`) VALUES
(8, 'Exclusive', 40006, 10, 300, 30, 1300, 100, 'Toyota, Cololla', 1, 'http://localhost/elite_car/images/car_type/8.jpg', '2017-12-09 15:43:39', '2018-01-10 11:10:58'),
(9, 'MidClass', 3000, 10, 200, 20, 1200, 154, 'Pajero', 1, 'http://localhost/elite_car/images/car_type/9.jpg', '2017-12-09 16:17:02', '2017-12-11 12:17:02'),
(10, 'Economic', 2000, 10, 100, 10, 1000, 87, 'Hundai', 1, 'http://localhost/elite_car/images/car_type/10.jpg', '2017-12-09 16:18:25', '2017-12-11 10:35:12');

-- --------------------------------------------------------

--
-- Table structure for table `ec_driver_daily_det`
--

CREATE TABLE `ec_driver_daily_det` (
  `id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `start_lat` varchar(255) NOT NULL,
  `start_long` varchar(255) NOT NULL,
  `end_lat` varchar(255) NOT NULL,
  `end_long` varchar(255) NOT NULL,
  `distance` double NOT NULL,
  `night_stay` tinyint(4) NOT NULL DEFAULT '0',
  `other_cost` int(11) NOT NULL,
  `total_hour` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ec_driver_daily_det`
--

INSERT INTO `ec_driver_daily_det` (`id`, `driver_id`, `reservation_id`, `start_lat`, `start_long`, `end_lat`, `end_long`, `distance`, `night_stay`, `other_cost`, `total_hour`, `created`, `updated`) VALUES
(7, 17, 39, '123', '234', '234', '345', 78000, 1, 1234, 11, '2017-12-11 00:00:00', '2017-12-11 12:36:10'),
(8, 18, 36, 'dfsdf', 'dfsd', 'dfds', 'fsdfdsf', 7896541, 1, 10, 10, '2017-12-09 00:00:00', '2017-12-11 12:38:25'),
(9, 18, 36, 'dsfsdf', 'dstrretert', 'rretre', 'ret', 1234567, 0, 20, 11, '2017-12-10 00:00:00', '2017-12-11 12:40:34'),
(10, 18, 36, '134214', '234234', '79789897', '898989', 8909808, 1, 30, 12, '2017-12-11 00:00:00', '2017-12-11 12:47:41'),
(11, 16, 42, '123', '123', '123', '123', 1001, 1, 10, 11, '2017-12-26 00:00:00', '2017-12-28 03:43:36'),
(12, 16, 42, '236', '236', '236', '236', 1002, 0, 20, 12, '2017-12-28 00:00:00', '2017-12-28 03:43:36'),
(13, 16, 42, '233', '16', '2017-11-30', '789456', 321456, 1, 1000, 11, '2017-12-28 00:00:53', '2017-12-28 05:21:02'),
(14, 15, 43, '233', '16', '2017-11-30', '789456', 321456, 1, 1000, 0, '2018-01-06 14:18:35', '2018-01-06 08:19:06'),
(15, 15, 47, '233', '16', '2017-11-30', '789456', 321456, 1, 1000, 0, '2018-01-10 18:39:00', '2018-01-10 12:39:44'),
(16, 15, 47, '233', '16', '2017-11-30', '789456', 321456, 1, 1000, 0, '2018-01-10 18:40:00', '2018-01-10 12:42:58'),
(17, 16, 48, '233', '16', '2017-11-30', '789456', 321456, 1, 1000, 0, '2018-01-10 18:50:47', '2018-01-10 12:51:03'),
(18, 17, 49, '233', '16', '2017-11-30', '789456', 321456, 1, 1000, 0, '2018-01-10 18:56:27', '2018-01-10 12:56:42'),
(19, 17, 49, '233', '16', '2017-11-30', '789456', 321456, 1, 1000, 10, '2018-01-11 00:06:07', '2018-01-11 04:07:28'),
(20, 15, 50, '233', '16', '2017-11-30', '789456', 321456, 1, 1000, 0, '2018-01-11 10:16:13', '2018-01-11 04:16:30'),
(21, 16, 51, '233', '16', '2017-11-30', '789456', 321456, 1, 1000, 0, '2018-01-11 10:26:29', '2018-01-11 04:26:41');

-- --------------------------------------------------------

--
-- Table structure for table `ec_driver_tbl`
--

CREATE TABLE `ec_driver_tbl` (
  `id` int(11) NOT NULL,
  `driver_name` varchar(255) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `driver_email` varchar(255) NOT NULL,
  `driver_phone` varchar(255) NOT NULL,
  `driver_licence` varchar(255) NOT NULL,
  `car_reg_no` varchar(255) NOT NULL,
  `car_model` varchar(255) NOT NULL,
  `car_details` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 = available, 0 = unavailable',
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ec_driver_tbl`
--

INSERT INTO `ec_driver_tbl` (`id`, `driver_name`, `owner_name`, `driver_email`, `driver_phone`, `driver_licence`, `car_reg_no`, `car_model`, `car_details`, `password`, `status`, `created`, `updated`) VALUES
(15, 'Hossen', 'Ismail', 'hossen@gmail.com', '0123456789', '', '', '', '', '1234', 1, '2017-12-09 16:19:23', '2017-12-09 10:26:04'),
(16, 'Asraf', 'Araf', 'araf@gmail.com', '0123456788', '', '', '', '', '1234', 1, '2017-12-09 16:19:49', '2017-12-09 10:26:07'),
(17, 'Ali', 'Sakib Al Hasan', 'ali@gmail.com', '0123455555', '', '0123455555', 'car_model', '', '12345678', 1, '2017-12-09 18:21:36', '2017-12-28 05:55:22'),
(18, 'Rahman', 'Mahfiz', 'rahman@gmail.com', '0123444444', '', '', '', '', '1234', 1, '2017-12-09 18:21:58', '2017-12-09 12:21:58'),
(19, 'Alamgir Alam Bin Boktiar', 'Alamgir Alam Bin Boktiar', 'alamgir@gmail.com', '123456987', '', '', '', '', '1234', 1, '2017-12-10 09:57:02', '2017-12-11 11:52:53'),
(20, 'amdad', 'Amdad', 'amdad@gmail.com', '0123456988', '', '', '', '', '1234', 1, '2017-12-10 09:57:34', '2017-12-10 03:57:34'),
(21, 'belal', 'Hazrat', 'belal@gmail.com', '123456999', '', '', '', '', '1234', 0, '2017-12-10 10:24:07', '2017-12-10 05:16:09'),
(22, '', 'Sakib Al Hasan', 'sakib1@gmail.com', '09876543214', '', '', '', '', '12345678', 1, '2017-12-21 15:34:04', '2017-12-21 09:34:05'),
(23, '', 'Sakib Al Hasan', 'sakib11@gmail.com', '098765432141', '', '', '', '', '12345678', 1, '2017-12-21 15:34:48', '2017-12-21 09:34:48'),
(24, '', 'Sakib Al Hasan', 'sak1ib11@gmail.com', '0987654321411', '', '', '', '', '12345678', 1, '2017-12-21 15:38:23', '2017-12-21 09:38:23'),
(25, '', 'Sakib Al Hasan', 'sakd1ib11@gmail.com', '0987654321411s', '', '', '', '', '12345678', 1, '2017-12-21 15:39:57', '2017-12-21 09:39:57'),
(26, '', 'Sakib Al Hasan', 'sahkd1ib11@gmail.com', '0987654321411sk', '', '', '', '', '12345678', 1, '2017-12-21 15:41:09', '2017-12-21 09:41:09'),
(27, '', 'Sakib Al Hasan', 'sakib21@gmail.com', '098765432142', '', 'car_reg', 'car_model', '', '12345678', 1, '2017-12-26 18:03:11', '2017-12-26 12:03:11'),
(28, '', 'Sakib Al Hasan', 'saki1b21@gmail.com', '0987654312142', '', '', '', '', '12345678', 1, '2017-12-26 18:10:48', '2017-12-26 12:10:48'),
(29, '', 'Sakib Al Hasan', 'sa1ki1b21@gmail.com', '098765143214', '', 'car_reg', 'car_model', '', '12345678', 1, '2017-12-27 11:55:51', '2017-12-27 05:55:51'),
(30, '', 'Sakib Al Hasan', 'sa1kic1b21@gmail.com', '0987651c3214', '', 'car_regd', 'car_model', '', '12345678', 1, '2017-12-27 12:07:48', '2017-12-27 06:07:48'),
(31, 'dilam na', 'Sakib Al Hasan', 'sa431kic1b21@gmail.com', '011123455555', '', '012311455555', 'car_model', '', '12345678', 1, '2018-01-06 12:42:45', '2018-01-06 06:44:22');

-- --------------------------------------------------------

--
-- Table structure for table `ec_reservation`
--

CREATE TABLE `ec_reservation` (
  `id` int(11) NOT NULL,
  `app_user_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `no_of_days` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `tour_type` int(11) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `pickup_time` varchar(100) DEFAULT NULL,
  `place_name` varchar(255) DEFAULT NULL,
  `place_address` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0= new, 1 = cancel, 2 = assigned, 3 = running, 4 = complete',
  `remarks` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ec_reservation`
--

INSERT INTO `ec_reservation` (`id`, `app_user_id`, `type_id`, `no_of_days`, `start_date`, `tour_type`, `latitude`, `longitude`, `pickup_time`, `place_name`, `place_address`, `destination`, `status`, `remarks`, `created`, `updated`) VALUES
(35, 10, 8, 2, '2017-12-09', 0, '', '', '', 'place1', 'pickup1', '', 2, '', '2017-12-11 17:51:49', '2017-12-11 11:54:28'),
(36, 10, 8, 3, '2017-12-09', 0, '', '', '', 'place1', 'pickup1', '', 4, '', '2017-12-11 18:25:37', '2017-12-11 12:47:54'),
(37, 10, 9, 1, '2017-12-01', 0, '', '', '', 'place2', 'pickup2', '', 0, '', '2017-12-11 18:26:10', '2017-12-11 12:26:10'),
(38, 10, 10, 2, '2017-12-04', 0, '', '', '', 'adabor', 'thana', '', 1, 'asdf', '2017-12-11 18:26:31', '2018-01-10 08:37:42'),
(39, 10, 9, 1, '2017-12-11', 0, '', '', '', 'dd', 'fdfdfd', '', 4, '', '2017-12-11 18:26:46', '2018-01-11 06:38:05'),
(40, 11, 9, 3, '2017-12-10', 1, '789456', '321456', NULL, 'Adabor', 'Dhaka1212', NULL, 4, '', '2017-12-27 11:35:55', '2018-01-11 06:38:08'),
(41, 11, 9, 3, '2017-12-10', 1, '789456', '321456', NULL, 'Adabor', 'Dhaka1212', NULL, 4, '', '2017-12-27 11:37:49', '2018-01-11 06:38:11'),
(42, 11, 9, 3, '2017-12-26', 1, '789456', '321456', NULL, 'Adabor', 'Dhaka1212', NULL, 4, '', '2017-12-28 09:37:38', '2017-12-28 04:03:17'),
(43, 10, 8, 1, '2018-01-06', 0, '', '', '123', 'place61', 'pic up point61', 'sdfsadfsd11', 4, '', '2018-01-06 14:16:41', '2018-01-06 08:52:22'),
(44, 10, 8, 1, '2018-01-10', 1, '', '', '34time', '12plc', '23point', 'des', 0, 'remr', '2018-01-10 16:58:10', '2018-01-10 10:58:10'),
(45, 11, 9, 2, '2018-01-11', 2, 'Insert Manually', 'Insert Manually', '', 'plc nm', '', '', 0, '', '2018-01-10 17:00:17', '2018-01-10 11:00:17'),
(46, 11, 9, 3, '2017-12-28', 1, '789456', '321456', NULL, 'Adabor', 'Dhaka1212', NULL, 0, '', '2018-01-10 17:34:44', '2018-01-10 11:34:44'),
(47, 11, 9, 2, '2018-01-10', 1, '789456', '321456', NULL, 'Adabor', 'Dhaka1212', NULL, 4, '', '2018-01-10 18:37:15', '2018-01-10 12:41:08'),
(48, 11, 9, 1, '2018-01-10', 1, '789456', '321456', NULL, 'Adabor', 'Dhaka1212', NULL, 4, '', '2018-01-10 18:49:47', '2018-01-10 12:51:03'),
(49, 11, 9, 2, '2018-01-10', 1, '789456', '321456', NULL, 'Adabor', 'Dhaka1212', NULL, 4, '', '2018-01-10 18:55:44', '2018-01-11 04:07:28'),
(50, 11, 9, 1, '2018-01-11', 1, '789456', '321456', NULL, 'Adabor', 'Dhaka1212', NULL, 4, '', '2018-01-11 10:15:36', '2018-01-11 04:16:30'),
(51, 12, 9, 1, '2018-01-11', 1, '789456', '321456', NULL, 'Adabor', 'Dhaka1212', NULL, 4, '', '2018-01-11 10:24:37', '2018-01-11 04:26:41');

-- --------------------------------------------------------

--
-- Table structure for table `ec_reservation_assign`
--

CREATE TABLE `ec_reservation_assign` (
  `id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ec_reservation_assign`
--

INSERT INTO `ec_reservation_assign` (`id`, `reservation_id`, `driver_id`, `start_date`, `end_date`, `created`, `updated`) VALUES
(13, 41, 16, '2017-12-09', '2017-12-10', '2017-12-11 17:54:28', '2018-01-09 10:52:27'),
(14, 40, 16, '2017-12-09', '2017-12-11', '2017-12-11 18:25:44', '2018-01-09 10:52:50'),
(15, 39, 17, '2017-12-11', '2017-12-11', '2017-12-11 18:26:54', '2017-12-11 12:26:54'),
(16, 42, 16, '2017-12-26', '2018-01-01', '2017-12-28 00:00:00', '2018-01-09 11:02:15'),
(17, 43, 15, '2018-01-06', '2017-12-01', '2018-01-06 14:17:43', '2018-01-09 11:02:03'),
(18, 47, 15, '2018-01-10', '2018-01-10', '2018-01-10 18:37:32', '2018-01-10 12:40:46'),
(19, 48, 16, '2018-01-10', '2018-01-10', '2018-01-10 18:50:00', '2018-01-10 12:50:23'),
(20, 49, 17, '2018-01-10', '2018-01-11', '2018-01-10 18:55:58', '2018-01-10 12:55:58'),
(21, 50, 15, '2018-01-11', '2018-01-11', '2018-01-11 10:15:52', '2018-01-11 04:15:52'),
(22, 51, 16, '2018-01-11', '2018-01-11', '2018-01-11 10:25:19', '2018-01-11 04:25:19');

-- --------------------------------------------------------

--
-- Table structure for table `ec_reservation_fare`
--

CREATE TABLE `ec_reservation_fare` (
  `id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `total_day` int(11) NOT NULL,
  `per_day_cost` int(11) NOT NULL,
  `total_day_cost` int(11) NOT NULL,
  `total_distance` bigint(20) NOT NULL COMMENT 'in meter',
  `mileage_cost` double NOT NULL,
  `total_distance_cost` double NOT NULL,
  `total_night_stay` int(11) NOT NULL,
  `night_stay_allowance` int(11) NOT NULL,
  `total_night_stay_cost` int(11) NOT NULL,
  `total_hour` int(11) NOT NULL,
  `basic_hour` int(11) NOT NULL,
  `total_extra_hour` int(11) NOT NULL,
  `per_hour_cost` int(11) NOT NULL,
  `total_extra_hour_cost` int(11) NOT NULL,
  `other_cost_det` varchar(255) NOT NULL,
  `total_other_cost` int(11) NOT NULL,
  `per_day_food_allowance` int(11) NOT NULL,
  `total_food_allowance_cost` int(11) NOT NULL,
  `total_fare` double NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ec_tour_types`
--

CREATE TABLE `ec_tour_types` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ec_tour_types`
--

INSERT INTO `ec_tour_types` (`id`, `type`, `status`, `created`, `updated`) VALUES
(1, 'Airport Pickup', 1, '2017-12-27 11:17:23', '2017-12-27 05:17:14'),
(2, 'Full Day Service', 0, '2018-01-10 16:08:36', '2018-01-10 10:46:13'),
(3, 'Trip out of Dhaka', 1, '2018-01-10 16:08:51', '2018-01-10 10:08:51'),
(4, 'Custom Tour', 1, '2018-01-10 16:09:11', '2018-01-10 10:09:11'),
(5, 'Other--', 1, '2018-01-10 16:09:28', '2018-01-10 10:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `ec_user_tbl`
--

CREATE TABLE `ec_user_tbl` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_address_2` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = normal, 2 = corporate',
  `user_company` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ec_user_tbl`
--

INSERT INTO `ec_user_tbl` (`id`, `user_name`, `user_phone`, `user_email`, `user_address`, `user_address_2`, `user_password`, `user_type`, `user_company`, `created`, `updated`) VALUES
(10, 'Sakib', '0123456777', 'sakib@gmail.com', 'House-13, Road-12, Gulsan0=-2', 'Dhaka-1212, Bangladesh', '1234', 1, '', '2017-12-09 16:41:59', '2017-12-11 05:55:14'),
(11, 'Samiul', '0123456666', 'samiul@gmail.com', '', '', '1234', 1, '', '2017-12-09 16:42:22', '2017-12-09 10:42:22'),
(12, 'Rifat', '0123456789', 'rifat@gmail.com', '', '', '1234', 1, '', '2017-12-10 11:56:57', '2017-12-10 05:56:57'),
(13, 'user name 1', '01234567891', 'user12@gmail.com', NULL, 'add part22', '123456783', 1, 'update company', '2017-12-11 11:19:23', '2018-01-02 04:41:34'),
(14, 'user name 1', '09876543212', 'user1@gmail.com', NULL, '', '12345678', 1, '', '2017-12-21 16:24:08', '2017-12-21 10:24:08'),
(15, 'user name 1', '098765432121', 'u1ser1@gmail.com', NULL, '', '12345678', 1, '', '2017-12-21 16:24:34', '2017-12-21 10:24:34'),
(16, 'user name 1', '0987654321211', 'u11ser1@gmail.com', NULL, '', '12345678', 1, '', '2017-12-21 16:27:22', '2017-12-21 10:27:22'),
(17, 'user name 1', '09876541211', 'u111ser1@gmail.com', NULL, '', '12345678', 1, '', '2017-12-21 16:28:02', '2017-12-21 10:28:02'),
(18, 'user name 1', '09876541f211', 'u111sfer1@gmail.com', NULL, '', '12345678', 2, '', '2018-01-01 10:18:01', '2018-01-01 04:18:01'),
(19, 'user name 1', '09876541fh211', 'u111shfer1@gmail.com', NULL, '', '12345678', 2, 'the company name', '2018-01-02 10:39:45', '2018-01-02 04:39:45');

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
(9, 'Circuit Breaker', 'Circuit Breaker Description', '2017-11-12 12:35:31', '2017-11-12 06:35:31');

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
(1, 2, 'Chittagong', 'Ctg Dis', '2018-01-25 16:50:02', '2018-01-25 11:11:34'),
(2, 1, 'Raojan', 'Rj Dis', '2018-01-25 17:06:26', '2018-01-25 11:06:26'),
(3, 2, 'Dhaka Sodor', 'Dhk Sr Dis', '2018-01-25 17:06:58', '2018-01-25 11:06:58');

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
(3, 'Borisal', 'Bor', '2018-01-25 15:51:33', '2018-01-25 09:51:33');

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
(2, 'East West Uni1', 2, '2018-01-24 11:03:16', '2018-01-24 05:03:34');

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
(2, 'Prothom Aloq', '', '2018-01-25 11:00:10', '2018-01-25 08:40:47');

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
(23, 9, 'SP Circuit Breaker', '', '2017-11-12 15:02:03', '2017-11-12 09:02:03');

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
(15, 'Tender15', '0000015', '315 Tk', 'See the image15', '2018-01-15', '2018-01-16', '12:15 pm', '2018-02-06', 2, 2, 1, 2, 8, 22, 3, 1, 3, 'http://localhost/tender_sheba/images/tender/15.jpg', '2018-01-28 12:49:23', '2018-01-28 11:03:32');

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
(1, '127.0.0.1', 'administrator', '$2y$08$7G9a1dqcBsczIU71PfjC1.CzkObDQpU5mXk9QL41e3Ach1IfYRl4i', '', 'administrator@gmail.com', NULL, NULL, NULL, 1496699848, 1517136961, 1, 'Rafiq 1', 'Ahmed', '', '', '', '0000-00-00'),
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
-- Indexes for table `ec_car_types`
--
ALTER TABLE `ec_car_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_driver_daily_det`
--
ALTER TABLE `ec_driver_daily_det`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_driver_tbl`
--
ALTER TABLE `ec_driver_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_reservation`
--
ALTER TABLE `ec_reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `app user id` (`app_user_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `ec_reservation_assign`
--
ALTER TABLE `ec_reservation_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_reservation_fare`
--
ALTER TABLE `ec_reservation_fare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_tour_types`
--
ALTER TABLE `ec_tour_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_user_tbl`
--
ALTER TABLE `ec_user_tbl`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `ec_car_types`
--
ALTER TABLE `ec_car_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ec_driver_daily_det`
--
ALTER TABLE `ec_driver_daily_det`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ec_driver_tbl`
--
ALTER TABLE `ec_driver_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `ec_reservation`
--
ALTER TABLE `ec_reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `ec_reservation_assign`
--
ALTER TABLE `ec_reservation_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `ec_reservation_fare`
--
ALTER TABLE `ec_reservation_fare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ec_tour_types`
--
ALTER TABLE `ec_tour_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ec_user_tbl`
--
ALTER TABLE `ec_user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ts_categories`
--
ALTER TABLE `ts_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ts_districts`
--
ALTER TABLE `ts_districts`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ts_divisions`
--
ALTER TABLE `ts_divisions`
  MODIFY `division_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ts_inviters`
--
ALTER TABLE `ts_inviters`
  MODIFY `inviter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ts_procurement_methods`
--
ALTER TABLE `ts_procurement_methods`
  MODIFY `pro_method_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ts_sources`
--
ALTER TABLE `ts_sources`
  MODIFY `source_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ts_sub_categories`
--
ALTER TABLE `ts_sub_categories`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `ts_tenders`
--
ALTER TABLE `ts_tenders`
  MODIFY `tender_auto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ec_reservation`
--
ALTER TABLE `ec_reservation`
  ADD CONSTRAINT `reservation_app_user` FOREIGN KEY (`app_user_id`) REFERENCES `ec_user_tbl` (`id`),
  ADD CONSTRAINT `reservation_car_type` FOREIGN KEY (`type_id`) REFERENCES `ec_car_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
