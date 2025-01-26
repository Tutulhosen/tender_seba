-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 13, 2017 at 04:15 AM
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
-- Database: `mtraders_soft`
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
(5, 'generate_invoice', 'Generate sales and return invoice'),
(6, 'stock_manage', 'insert and update product, stock entry'),
(7, 'setup_user', 'Add and Edit setup information');

-- --------------------------------------------------------

--
-- Table structure for table `mt_categories`
--

CREATE TABLE `mt_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_desc` varchar(255) NOT NULL,
  `category_created` datetime NOT NULL,
  `category_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mt_categories`
--

INSERT INTO `mt_categories` (`category_id`, `category_name`, `category_desc`, `category_created`, `category_updated`) VALUES
(8, 'Circuit Breaker', 'Circuit Breaker Category Description', '2017-10-30 16:53:26', '2017-10-30 10:53:26'),
(9, 'Cable', 'Cable Category Description', '2017-10-30 16:53:37', '2017-10-30 10:53:37'),
(10, 'Fan', 'Fan Category Description', '2017-10-30 16:53:46', '2017-10-30 10:53:46'),
(11, 'Bulb', 'Bulb Category Description', '2017-10-30 16:53:58', '2017-10-30 10:53:58'),
(12, 'Switch', 'Switch Category Description', '2017-10-30 16:54:26', '2017-10-30 10:54:26');

-- --------------------------------------------------------

--
-- Table structure for table `mt_companies`
--

CREATE TABLE `mt_companies` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_desc` varchar(255) NOT NULL,
  `company_created` datetime NOT NULL,
  `company_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mt_companies`
--

INSERT INTO `mt_companies` (`company_id`, `company_name`, `company_desc`, `company_created`, `company_updated`) VALUES
(20, 'BRB', 'BRB Company Description-', '2017-10-30 16:43:41', '2017-10-30 10:48:09'),
(21, 'BBS', 'BBS Company Description-', '2017-10-30 16:43:54', '2017-10-30 10:48:13'),
(22, 'BYA', 'BYA Company Description-', '2017-10-30 16:44:53', '2017-10-30 10:48:04'),
(23, 'Energypac', 'Energypac Company Description-', '2017-10-30 16:45:13', '2017-10-30 10:47:55'),
(24, 'Partex', 'Partex Company Description-', '2017-10-30 16:45:33', '2017-10-30 10:47:42'),
(25, 'ACI', 'ACI Company Description', '2017-11-06 15:59:19', '2017-11-06 09:59:19');

-- --------------------------------------------------------

--
-- Table structure for table `mt_countries`
--

CREATE TABLE `mt_countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `country_short_name` varchar(255) NOT NULL,
  `country_created` datetime NOT NULL,
  `country_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mt_countries`
--

INSERT INTO `mt_countries` (`country_id`, `country_name`, `country_short_name`, `country_created`, `country_updated`) VALUES
(11, 'Bangladesh', 'BD', '2017-10-30 16:48:46', '2017-10-30 10:48:46'),
(12, 'India', 'Ind', '2017-10-30 16:49:00', '2017-10-30 10:49:00'),
(13, 'New Zealand', 'NZ', '2017-10-30 16:49:10', '2017-10-30 10:49:10'),
(14, 'England', 'Eng', '2017-10-30 16:49:31', '2017-10-30 10:49:31'),
(15, 'Australia', 'Aus', '2017-10-30 16:49:39', '2017-10-30 10:49:39');

-- --------------------------------------------------------

--
-- Table structure for table `mt_customers`
--

CREATE TABLE `mt_customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_contact_person` varchar(255) NOT NULL,
  `customer_contact_details` varchar(255) NOT NULL,
  `customer_created` datetime NOT NULL,
  `customer_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mt_customers`
--

INSERT INTO `mt_customers` (`customer_id`, `customer_name`, `customer_address`, `customer_contact_person`, `customer_contact_details`, `customer_created`, `customer_updated`) VALUES
(6, 'Md. Mafizur Rahman', 'Adabor Thana, Shymoli', 'Mafiz', '+88 01671 016 713', '2017-10-30 16:50:24', '2017-10-30 10:50:24'),
(7, 'Md. Zuel Ali', 'Kollanpur, Dhaka', 'Zuel', '+88 0147 123 456', '2017-10-30 16:51:07', '2017-10-30 10:51:07'),
(8, 'Mr. Rafiq', 'Adabor Housing', 'Rafiq', '+88 0147 123 456', '2017-10-30 16:51:41', '2017-10-30 10:51:41');

-- --------------------------------------------------------

--
-- Table structure for table `mt_customer_payment`
--

CREATE TABLE `mt_customer_payment` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_details` varchar(255) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `debit` double NOT NULL,
  `credit` double NOT NULL,
  `balance` double NOT NULL,
  `date` date NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mt_customer_payment`
--

INSERT INTO `mt_customer_payment` (`id`, `customer_id`, `payment_details`, `invoice_no`, `debit`, `credit`, `balance`, `date`, `created`) VALUES
(269, 6, 'Buy Prd. Sales Inv. : 210', 210, 5732.02, 0, -5732.02, '2017-10-30', '2017-10-30 12:04:11'),
(270, 6, 'Ret. Prd. Sales Inv. : 210', 210, 0, 2497.94, -3234.08, '2017-10-30', '2017-10-30 12:16:04'),
(271, 6, 'Paid', 210, 0, 4000, 765.92, '2017-10-30', '2017-10-30 12:22:54'),
(273, 6, 'Buy Prd. Sales Inv. : 212', 212, 990, 0, -224.08, '2017-10-30', '2017-10-30 12:23:49'),
(274, 6, 'Paid', 212, 0, 1000, 775.92, '2017-10-30', '2017-10-30 12:25:14'),
(275, 6, 'Buy Prd. Sales Inv. : 213', 213, 742.5, 0, 33.42, '2017-10-30', '2017-10-30 12:26:06'),
(276, 6, 'Buy Prd. Sales Inv. : 214', 214, 712.5, 0, -679.08, '2017-11-06', '2017-11-06 12:03:07'),
(277, 6, 'Ret. Prd. Sales Inv. : 214', 214, 0, 285, -394.08, '2017-11-06', '2017-11-06 12:31:10'),
(278, 6, 'previous due', 214, 0, 100, -294.08, '2017-11-06', '2017-11-06 12:38:48');

-- --------------------------------------------------------

--
-- Table structure for table `mt_products`
--

CREATE TABLE `mt_products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` varchar(255) DEFAULT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_sub_cat_id` int(11) NOT NULL,
  `product_country_id` int(11) NOT NULL,
  `product_date` date NOT NULL,
  `color_wise_inv` int(4) NOT NULL DEFAULT '0',
  `product_created` datetime NOT NULL,
  `product_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mt_products`
--

INSERT INTO `mt_products` (`product_id`, `product_name`, `product_desc`, `product_category_id`, `product_sub_cat_id`, `product_country_id`, `product_date`, `color_wise_inv`, `product_created`, `product_updated`) VALUES
(98, 'DP01 Circuit Breaker', 'DP01 Circuit Breaker Product Description', 8, 21, 11, '2017-10-30', 0, '0000-00-00 00:00:00', '2017-10-30 11:21:55'),
(99, '1x1.3 Rm (3-W)', '', 9, 23, 12, '2017-10-30', 1, '2017-10-30 17:27:13', '2017-10-30 11:27:13'),
(100, 'SP01 Circuit Breaker', '', 8, 22, 13, '2017-10-30', 0, '2017-10-30 17:30:09', '2017-10-30 11:30:09'),
(101, '1x1.0 Re (1-W)', '', 9, 24, 14, '2017-10-30', 1, '2017-10-30 17:31:34', '2017-10-30 11:31:34'),
(102, 'SP34 Circuit Breaker', '', 8, 22, 15, '2017-10-30', 0, '2017-10-30 17:49:16', '2017-10-30 11:49:16'),
(103, 'DP20 Circuit Breaker', '', 8, 21, 11, '2017-10-30', 0, '2017-10-30 17:50:18', '2017-10-30 11:50:18'),
(104, 'DP88 Circuit Breaker', '', 8, 21, 11, '2017-10-30', 0, '2017-10-30 17:51:52', '2017-10-30 11:51:52'),
(105, '1x1.3 Re (5-w)', '', 9, 24, 11, '2017-11-06', 1, '2017-11-06 16:07:25', '2017-11-06 10:09:50'),
(106, '1x1.90 Re Cable', '', 9, 24, 0, '2017-11-06', 1, '2017-11-06 16:08:42', '2017-11-06 10:08:42'),
(107, 'PVC Cable BYA : 1X 1.5 Rm (7-W)', 'www', 9, 23, 11, '2017-11-06', 1, '2017-11-06 18:22:25', '2017-11-06 12:22:25');

-- --------------------------------------------------------

--
-- Table structure for table `mt_product_to_company`
--

CREATE TABLE `mt_product_to_company` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `retail_price` double NOT NULL,
  `wholesale_price` double NOT NULL,
  `purchase_price` double NOT NULL,
  `total_qty` double NOT NULL,
  `unit_id` int(11) NOT NULL,
  `red_qty` double NOT NULL,
  `black_qty` double NOT NULL,
  `yellow_qty` double NOT NULL,
  `green_qty` double NOT NULL,
  `blue_qty` double NOT NULL,
  `other_qty` double NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mt_product_to_company`
--

INSERT INTO `mt_product_to_company` (`id`, `product_id`, `company_id`, `retail_price`, `wholesale_price`, `purchase_price`, `total_qty`, `unit_id`, `red_qty`, `black_qty`, `yellow_qty`, `green_qty`, `blue_qty`, `other_qty`, `created`, `updated`) VALUES
(188, 98, 20, 100, 80, 70, 84, 12, 0, 0, 0, 0, 0, 0, '2017-10-30 17:21:25', '2017-10-30 12:23:49'),
(189, 98, 21, 120, 100, 90, 120, 12, 0, 0, 0, 0, 0, 0, '2017-10-30 17:21:25', '2017-10-30 11:21:25'),
(190, 98, 23, 140, 120, 110, 140, 12, 0, 0, 0, 0, 0, 0, '2017-10-30 17:21:25', '2017-10-30 11:21:25'),
(191, 98, 24, 150, 130, 120, 150, 12, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2017-10-30 11:25:16'),
(192, 99, 20, 150, 130, 120, 42, 11, 7, 5, 5, 5, 10, 10, '2017-10-30 17:27:13', '2017-11-06 12:31:10'),
(193, 99, 24, 160, 140, 130, 60, 11, 10, 10, 10, 10, 10, 10, '2017-10-30 17:27:13', '2017-10-30 11:27:13'),
(194, 99, 21, 170, 150, 140, 63, 11, 0, 13, 10, 10, 20, 10, '0000-00-00 00:00:00', '2017-10-30 12:16:04'),
(195, 99, 22, 180, 160, 150, 80, 11, 20, 20, 20, 10, 10, 0, '0000-00-00 00:00:00', '2017-10-30 11:28:08'),
(196, 100, 20, 101, 91, 81, 130, 11, 0, 0, 0, 0, 0, 0, '2017-10-30 17:30:09', '2017-10-30 11:54:46'),
(197, 100, 23, 111, 95, 75, 120, 11, 0, 0, 0, 0, 0, 0, '2017-10-30 17:30:09', '2017-10-30 11:30:09'),
(198, 101, 20, 125, 115, 105, 125, 11, 25, 25, 25, 25, 25, 0, '2017-10-30 17:31:34', '2017-10-30 11:31:34'),
(199, 101, 22, 225, 215, 202, 218, 11, 43, 50, 50, 50, 5, 20, '2017-10-30 17:31:34', '2017-10-30 12:16:04'),
(200, 102, 20, 147, 123, 102, 167, 11, 0, 0, 0, 0, 0, 0, '2017-10-30 17:49:16', '2017-10-30 11:54:02'),
(201, 102, 21, 147, 123, 112, 159, 11, 0, 0, 0, 0, 0, 0, '2017-10-30 17:49:16', '2017-10-30 11:49:16'),
(202, 103, 20, 365, 345, 321, 365, 11, 0, 0, 0, 0, 0, 0, '2017-10-30 17:50:18', '2017-10-30 11:50:18'),
(203, 103, 22, 369, 358, 357, 368.98, 11, 0, 0, 0, 0, 0, 0, '2017-10-30 17:50:18', '2017-10-30 12:16:04'),
(204, 104, 20, 247, 234, 223, 247, 11, 0, 0, 0, 0, 0, 0, '2017-10-30 17:51:52', '2017-10-30 11:51:52'),
(205, 104, 23, 269, 258, 247, 269, 11, 0, 0, 0, 0, 0, 0, '2017-10-30 17:51:52', '2017-10-30 11:51:52'),
(206, 100, 21, 111, 101, 91, 150, 11, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2017-10-30 11:54:46'),
(207, 105, 20, 258, 247, 236, 260, 11, 58, 50, 51, 51, 50, 0, '2017-11-06 16:07:25', '2017-11-06 10:11:10'),
(208, 106, 20, 199, 166, 133, 199, 11, 33, 33, 33, 25, 25, 50, '2017-11-06 16:08:42', '2017-11-06 10:08:42'),
(209, 106, 21, 299, 277, 255, 299, 11, 99, 50, 50, 25, 25, 50, '2017-11-06 16:08:42', '2017-11-06 10:08:42'),
(210, 105, 21, 222, 210, 200, 2, 11, 0, 1, 0, 0, 0, 1, '0000-00-00 00:00:00', '2017-11-06 10:11:10'),
(211, 107, 20, 1435, 1435, 1363, 10, 11, 5, 5, 0, 0, 0, 0, '2017-11-06 18:22:25', '2017-11-06 12:22:25');

-- --------------------------------------------------------

--
-- Table structure for table `mt_return_invoice`
--

CREATE TABLE `mt_return_invoice` (
  `return_inv_id` int(11) NOT NULL,
  `sales_inv_no` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `return_inv_date` date NOT NULL,
  `return_inv_total_amount` double NOT NULL,
  `return_inv_created` datetime NOT NULL,
  `return_inv_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mt_return_invoice`
--

INSERT INTO `mt_return_invoice` (`return_inv_id`, `sales_inv_no`, `customer_id`, `return_inv_date`, `return_inv_total_amount`, `return_inv_created`, `return_inv_updated`) VALUES
(128, 210, 6, '2017-10-30', 2497.94, '0000-00-00 00:00:00', '2017-10-30 12:16:04'),
(129, 214, 6, '2017-11-06', 285, '0000-00-00 00:00:00', '2017-11-06 12:31:09');

-- --------------------------------------------------------

--
-- Table structure for table `mt_return_invoice_products`
--

CREATE TABLE `mt_return_invoice_products` (
  `id` int(11) NOT NULL,
  `sales_inv_no` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `return_quantity` double NOT NULL,
  `return_unit_id` int(11) NOT NULL,
  `commission` int(11) NOT NULL,
  `return_amount` double NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mt_return_invoice_products`
--

INSERT INTO `mt_return_invoice_products` (`id`, `sales_inv_no`, `product_id`, `company_id`, `color`, `return_quantity`, `return_unit_id`, `commission`, `return_amount`, `created`, `updated`) VALUES
(100, 210, 98, 20, '20', 4, 0, 0, 392, '0000-00-00 00:00:00', '2017-10-30 12:16:04'),
(101, 210, 99, 21, '21', 5, 0, 0, 816, '0000-00-00 00:00:00', '2017-10-30 12:16:04'),
(102, 210, 101, 22, '22', 6, 0, 0, 1282.5, '0000-00-00 00:00:00', '2017-10-30 12:16:04'),
(103, 210, 103, 22, '22', 7, 0, 0, 7.44, '0000-00-00 00:00:00', '2017-10-30 12:16:04'),
(104, 214, 99, 20, '20', 2, 0, 0, 285, '0000-00-00 00:00:00', '2017-11-06 12:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `mt_sales_invoice`
--

CREATE TABLE `mt_sales_invoice` (
  `sales_inv_no` int(11) NOT NULL,
  `sales_inv_customer` int(11) NOT NULL,
  `sales_inv_date` date NOT NULL,
  `sales_inv_total_amount` double NOT NULL,
  `sales_inv_net_amount` double NOT NULL,
  `sales_inv_total_product` int(11) NOT NULL,
  `sales_inv_created` datetime NOT NULL,
  `sales_inv_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mt_sales_invoice`
--

INSERT INTO `mt_sales_invoice` (`sales_inv_no`, `sales_inv_customer`, `sales_inv_date`, `sales_inv_total_amount`, `sales_inv_net_amount`, `sales_inv_total_product`, `sales_inv_created`, `sales_inv_updated`) VALUES
(210, 6, '2017-10-30', 3234.08, 3234.08, 4, '0000-00-00 00:00:00', '2017-10-30 12:16:04'),
(212, 6, '2017-10-30', 990, 224.08, 1, '0000-00-00 00:00:00', '2017-10-30 12:23:49'),
(213, 6, '2017-10-30', 742.5, -33.42, 1, '0000-00-00 00:00:00', '2017-10-30 12:26:06'),
(214, 6, '2017-11-06', 427.5, 394.08, 1, '0000-00-00 00:00:00', '2017-11-06 12:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `mt_sales_invoice_products`
--

CREATE TABLE `mt_sales_invoice_products` (
  `id` int(11) NOT NULL,
  `sales_inv_no` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `unit_id` int(11) NOT NULL,
  `commission` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mt_sales_invoice_products`
--

INSERT INTO `mt_sales_invoice_products` (`id`, `sales_inv_no`, `product_id`, `company_id`, `color`, `quantity`, `unit_id`, `commission`, `amount`, `created`, `updated`) VALUES
(372, 210, 98, 20, '', 6, 9, 2, 588, '0000-00-00 00:00:00', '2017-10-30 12:16:04'),
(373, 210, 99, 21, 'black', 7, 11, 4, 1142.4, '0000-00-00 00:00:00', '2017-10-30 12:16:04'),
(374, 210, 101, 22, 'red', 7, 12, 5, 1496.25, '0000-00-00 00:00:00', '2017-10-30 12:16:04'),
(375, 210, 103, 22, '', 7, 13, 6, 7.43, '0000-00-00 00:00:00', '2017-10-30 12:16:04'),
(376, 212, 98, 20, '', 10, 12, 1, 990, '0000-00-00 00:00:00', '2017-10-30 12:23:49'),
(377, 213, 99, 20, 'black', 5, 11, 1, 742.5, '0000-00-00 00:00:00', '2017-10-30 12:26:06'),
(378, 214, 99, 20, 'red', 3, 11, 5, 427.5, '0000-00-00 00:00:00', '2017-11-06 12:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `mt_stock_log`
--

CREATE TABLE `mt_stock_log` (
  `log_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `sales_inv_no` int(11) DEFAULT NULL,
  `before_total_qty` double NOT NULL,
  `after_total_qty` double NOT NULL,
  `insert_qty` double NOT NULL,
  `convert_qty` double NOT NULL,
  `before_unit` int(11) NOT NULL,
  `before_unit_name` varchar(255) NOT NULL,
  `insert_unit` int(11) NOT NULL,
  `insert_unit_name` varchar(255) NOT NULL,
  `stock_date` date NOT NULL,
  `system_msg` varchar(255) NOT NULL,
  `system_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mt_stock_log`
--

INSERT INTO `mt_stock_log` (`log_id`, `product_id`, `product_name`, `company_id`, `company_name`, `sales_inv_no`, `before_total_qty`, `after_total_qty`, `insert_qty`, `convert_qty`, `before_unit`, `before_unit_name`, `insert_unit`, `insert_unit_name`, `stock_date`, `system_msg`, `system_date`) VALUES
(348, 98, 'DP01 Circuit Breaker', 20, 'BRB', NULL, 0, 100, 100, 100, 12, 'Piece', 12, 'Piece', '2017-10-30', 'New Product', '2017-10-30 11:21:25'),
(349, 98, 'DP01 Circuit Breaker', 21, 'BBS', NULL, 0, 120, 120, 120, 12, 'Piece', 12, 'Piece', '2017-10-30', 'New Product', '2017-10-30 11:21:25'),
(350, 98, 'DP01 Circuit Breaker', 23, 'Energypac', NULL, 0, 140, 140, 140, 12, 'Piece', 12, 'Piece', '2017-10-30', 'New Product', '2017-10-30 11:21:25'),
(351, 98, 'DP01 Circuit Breaker', 24, 'Partex', NULL, 0, 150, 150, 150, 12, 'Piece', 12, 'Piece', '2017-10-30', 'New Company', '2017-10-30 11:25:16'),
(352, 99, '1x1.3 Rm (3-W)', 20, 'BRB', NULL, 0, 50, 50, 50, 11, 'Coil', 11, 'Coil', '2017-10-30', 'New Product', '2017-10-30 11:27:13'),
(353, 99, '1x1.3 Rm (3-W)', 24, 'Partex', NULL, 0, 60, 60, 60, 11, 'Coil', 11, 'Coil', '2017-10-30', 'New Product', '2017-10-30 11:27:13'),
(354, 99, '1x1.3 Rm (3-W)', 21, 'BBS', NULL, 0, 70, 70, 70, 11, 'Coil', 11, 'Coil', '2017-10-30', 'New Company', '2017-10-30 11:28:08'),
(355, 99, '1x1.3 Rm (3-W)', 22, 'BYA', NULL, 0, 80, 80, 80, 11, 'Coil', 11, 'Coil', '2017-10-30', 'New Company', '2017-10-30 11:28:08'),
(356, 100, 'SP01 Circuit Breaker', 20, 'BRB', NULL, 0, 100, 100, 100, 11, 'Coil', 11, 'Coil', '2017-10-30', 'New Product', '2017-10-30 11:30:09'),
(357, 100, 'SP01 Circuit Breaker', 23, 'Energypac', NULL, 0, 120, 120, 120, 11, 'Coil', 11, 'Coil', '2017-10-30', 'New Product', '2017-10-30 11:30:09'),
(358, 101, '1x1.0 Re (1-W)', 20, 'BRB', NULL, 0, 125, 125, 125, 11, 'Coil', 11, 'Coil', '2017-10-30', 'New Product', '2017-10-30 11:31:34'),
(359, 101, '1x1.0 Re (1-W)', 22, 'BYA', NULL, 0, 225, 225, 225, 11, 'Coil', 11, 'Coil', '2017-10-30', 'New Product', '2017-10-30 11:31:34'),
(360, 102, 'SP34 Circuit Breaker', 20, 'BRB', NULL, 0, 147, 147, 147, 11, 'Coil', 11, 'Coil', '2017-10-30', 'New Product', '2017-10-30 11:49:16'),
(361, 102, 'SP34 Circuit Breaker', 21, 'BBS', NULL, 0, 159, 159, 159, 11, 'Coil', 11, 'Coil', '2017-10-30', 'New Product', '2017-10-30 11:49:16'),
(362, 103, 'DP20 Circuit Breaker', 20, 'BRB', NULL, 0, 365, 365, 365, 11, 'Coil', 11, 'Coil', '2017-10-30', 'New Product', '2017-10-30 11:50:18'),
(363, 103, 'DP20 Circuit Breaker', 22, 'BYA', NULL, 0, 369, 369, 369, 11, 'Coil', 11, 'Coil', '2017-10-30', 'New Product', '2017-10-30 11:50:18'),
(364, 104, 'DP88 Circuit Breaker', 20, 'BRB', NULL, 0, 247, 247, 247, 11, 'Coil', 11, 'Coil', '2017-10-30', 'New Product', '2017-10-30 11:51:52'),
(365, 104, 'DP88 Circuit Breaker', 23, 'Energypac', NULL, 0, 269, 269, 269, 11, 'Coil', 11, 'Coil', '2017-10-30', 'New Product', '2017-10-30 11:51:52'),
(366, 102, 'SP34 Circuit Breaker', 20, 'BRB', NULL, 147, 167, 20, 20, 11, 'Coil', 11, 'Coil', '2017-10-30', 'Stock Entry', '2017-10-30 11:54:02'),
(367, 100, 'SP01 Circuit Breaker', 20, 'BRB', NULL, 100, 130, 30, 30, 11, 'Coil', 11, 'Coil', '2017-10-30', 'Stock Entry', '2017-10-30 11:54:46'),
(368, 100, 'SP01 Circuit Breaker', 21, 'BBS', NULL, 0, 150, 150, 150, 11, 'Coil', 11, 'Coil', '2017-10-30', 'New Company', '2017-10-30 11:54:46'),
(374, 98, 'DP01 Circuit Breaker', 20, 'BRB', 210, 100, 90, 10, 10, 12, 'Piece', 9, 'Yard', '2017-10-30', 'Product Sales', '2017-10-30 12:04:11'),
(375, 99, '1x1.3 Rm (3-W)', 21, 'BBS', 210, 70, 58, 12, 12, 11, 'Coil', 11, 'Coil', '2017-10-30', 'Product Sales', '2017-10-30 12:04:11'),
(376, 101, '1x1.0 Re (1-W)', 22, 'BYA', 210, 225, 212, 13, 13, 11, 'Coil', 12, 'Piece', '2017-10-30', 'Product Sales', '2017-10-30 12:04:11'),
(377, 103, 'DP20 Circuit Breaker', 22, 'BYA', 210, 369, 368.96, 14, 0.04, 11, 'Coil', 13, 'Feet', '2017-10-30', 'Product Sales', '2017-10-30 12:04:11'),
(378, 98, 'DP01 Circuit Breaker', 20, 'BRB', 210, 90, 94, 4, 4, 12, 'Piece', 9, 'Yard', '2017-10-30', 'Return Product', '2017-10-30 12:16:04'),
(379, 99, '1x1.3 Rm (3-W)', 21, 'BBS', 210, 58, 63, 5, 5, 11, 'Coil', 11, 'Coil', '2017-10-30', 'Return Product', '2017-10-30 12:16:04'),
(380, 101, '1x1.0 Re (1-W)', 22, 'BYA', 210, 212, 218, 6, 6, 11, 'Coil', 12, 'Piece', '2017-10-30', 'Return Product', '2017-10-30 12:16:04'),
(381, 103, 'DP20 Circuit Breaker', 22, 'BYA', 210, 368.96, 368.98, 7, 0.02, 11, 'Coil', 13, 'Feet', '2017-10-30', 'Return Product', '2017-10-30 12:16:04'),
(382, 98, 'DP01 Circuit Breaker', 20, 'BRB', 212, 94, 84, 10, 10, 12, 'Piece', 12, 'Piece', '2017-10-30', 'Product Sales', '2017-10-30 12:23:49'),
(383, 99, '1x1.3 Rm (3-W)', 20, 'BRB', 213, 50, 45, 5, 5, 11, 'Coil', 11, 'Coil', '2017-10-30', 'Product Sales', '2017-10-30 12:26:06'),
(384, 105, '1x1.3 Re Cable', 20, 'BRB', NULL, 0, 258, 258, 258, 11, 'Coil', 11, 'Coil', '2017-11-06', 'New Product', '2017-11-06 10:07:25'),
(385, 106, '1x1.90 Re Cable', 20, 'BRB', NULL, 0, 199, 199, 199, 11, 'Coil', 11, 'Coil', '2017-11-06', 'New Product', '2017-11-06 10:08:42'),
(386, 106, '1x1.90 Re Cable', 21, 'BBS', NULL, 0, 299, 299, 299, 11, 'Coil', 11, 'Coil', '2017-11-06', 'New Product', '2017-11-06 10:08:42'),
(387, 105, '1x1.3 Re (5-w)', 20, 'BRB', NULL, 258, 260, 2, 2, 11, 'Coil', 11, 'Coil', '2017-11-06', 'Stock Entry', '2017-11-06 10:11:10'),
(388, 105, '1x1.3 Re (5-w)', 21, 'BBS', NULL, 0, 2, 2, 2, 11, 'Coil', 11, 'Coil', '2017-11-06', 'New Company', '2017-11-06 10:11:10'),
(389, 99, '1x1.3 Rm (3-W)', 20, 'BRB', 214, 45, 40, 5, 5, 11, 'Coil', 11, 'Coil', '2017-11-06', 'Product Sales', '2017-11-06 12:03:07'),
(390, 107, 'PVC Cable BYA : 1X 1.5 Rm (7-W)', 20, 'BRB', NULL, 0, 10, 10, 10, 11, 'Coil', 11, 'Coil', '2017-11-06', 'New Product', '2017-11-06 12:22:25'),
(391, 99, '1x1.3 Rm (3-W)', 20, 'BRB', 214, 40, 42, 2, 2, 11, 'Coil', 11, 'Coil', '2017-11-06', 'Return Product', '2017-11-06 12:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `mt_sub_categories`
--

CREATE TABLE `mt_sub_categories` (
  `sub_cat_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_cat_name` varchar(255) NOT NULL,
  `sub_cat_desc` varchar(255) NOT NULL,
  `sub_cat_created` datetime NOT NULL,
  `sub_cat_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mt_sub_categories`
--

INSERT INTO `mt_sub_categories` (`sub_cat_id`, `category_id`, `sub_cat_name`, `sub_cat_desc`, `sub_cat_created`, `sub_cat_updated`) VALUES
(21, 8, 'DP Circuit Breaker', '', '2017-10-30 16:54:41', '2017-10-30 10:54:41'),
(22, 8, 'SP Circuit Breaker', 'SP Circuit Breaker Sub Category Description', '2017-10-30 16:54:58', '2017-10-30 10:54:58'),
(23, 9, 'RM Cable', 'RM Cable Sub Category Description', '2017-10-30 16:55:27', '2017-10-30 10:55:27'),
(24, 9, 'Re Cable', '', '2017-10-30 16:55:40', '2017-10-30 10:55:40'),
(25, 10, 'Table Fan', '', '2017-10-30 16:56:25', '2017-10-30 10:56:25'),
(26, 10, 'Wall Fan', '', '2017-10-30 16:56:37', '2017-10-30 10:56:37'),
(27, 10, 'Stand Fan', 'Stand Fan Sub Category Description', '2017-11-06 16:00:24', '2017-11-06 10:00:24');

-- --------------------------------------------------------

--
-- Table structure for table `mt_units`
--

CREATE TABLE `mt_units` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `unit_short_name` varchar(255) NOT NULL,
  `unit_created` datetime NOT NULL,
  `unit_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mt_units`
--

INSERT INTO `mt_units` (`unit_id`, `unit_name`, `unit_short_name`, `unit_created`, `unit_updated`) VALUES
(9, 'Yard', 'Y', '2017-10-30 16:51:52', '2017-10-30 10:51:52'),
(10, 'Meter', 'M', '2017-10-30 16:51:59', '2017-10-30 10:51:59'),
(11, 'Coil', 'C', '2017-10-30 16:52:05', '2017-10-30 10:52:05'),
(12, 'Piece', 'P', '2017-10-30 16:52:13', '2017-10-30 10:52:13'),
(13, 'Feet', 'F', '2017-10-30 16:52:20', '2017-10-30 10:52:20');

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
(1, '127.0.0.1', 'administrator', '$2y$08$7G9a1dqcBsczIU71PfjC1.CzkObDQpU5mXk9QL41e3Ach1IfYRl4i', '', 'administrator@gmail.com', NULL, NULL, 'TiDqVI0jqqwZmj2vnBMTo.', 1496699848, 1510135786, 1, 'Rafiq ', 'Ahmed', '', '', '', '0000-00-00'),
(25, '103.222.22.141', 'setupuser', '$2y$08$5VIDiwR81XlqoWxGfSo04.kq9cVUQrT6chW3ejlIDjYVfSWXEGkMm', NULL, 'setup@user.com', NULL, NULL, NULL, 1509357425, 1510053590, 1, 'setup', 'user', '', '', '', '0000-00-00'),
(26, '103.222.22.141', 'stockmanager', '$2y$08$efB9uipt4jMAJma/jzePMOzXxBVZxsF23N3qi0TxTUt1s9wbkCyie', NULL, 'stock@manager.com', NULL, NULL, NULL, 1509357620, 1510053669, 1, 'stock', 'manager', '', '', '', '0000-00-00'),
(27, '103.222.22.141', 'invoicegenerator', '$2y$08$d9nhj7Gm.mMU91p0bOPzsOg55LBrIAYIgGp1/dSyeslefPquT.vMy', NULL, 'invoice@generator.com', NULL, NULL, NULL, 1509357803, 1510053620, 1, 'invoice', 'generator', '', '', '', '0000-00-00'),
(28, '103.222.22.141', 'generaluser', '$2y$08$HfC9koHonbdWfXBrApzgO.SgCsaOxXZbP3h3kJwz4unvYhnqNgogC', NULL, 'general@user.com', NULL, NULL, NULL, 1509357845, NULL, 1, 'general', 'user', '', '', '', '0000-00-00');

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
(25, 1, 1),
(46, 25, 7),
(48, 26, 6),
(50, 27, 5),
(51, 28, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mt_categories`
--
ALTER TABLE `mt_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `mt_companies`
--
ALTER TABLE `mt_companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `mt_countries`
--
ALTER TABLE `mt_countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `mt_customers`
--
ALTER TABLE `mt_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `mt_customer_payment`
--
ALTER TABLE `mt_customer_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mt_products`
--
ALTER TABLE `mt_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `mt_product_to_company`
--
ALTER TABLE `mt_product_to_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mt_return_invoice`
--
ALTER TABLE `mt_return_invoice`
  ADD PRIMARY KEY (`return_inv_id`);

--
-- Indexes for table `mt_return_invoice_products`
--
ALTER TABLE `mt_return_invoice_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mt_sales_invoice`
--
ALTER TABLE `mt_sales_invoice`
  ADD PRIMARY KEY (`sales_inv_no`);

--
-- Indexes for table `mt_sales_invoice_products`
--
ALTER TABLE `mt_sales_invoice_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mt_stock_log`
--
ALTER TABLE `mt_stock_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `mt_sub_categories`
--
ALTER TABLE `mt_sub_categories`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- Indexes for table `mt_units`
--
ALTER TABLE `mt_units`
  ADD PRIMARY KEY (`unit_id`);

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
-- AUTO_INCREMENT for table `mt_categories`
--
ALTER TABLE `mt_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `mt_companies`
--
ALTER TABLE `mt_companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `mt_countries`
--
ALTER TABLE `mt_countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `mt_customers`
--
ALTER TABLE `mt_customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `mt_customer_payment`
--
ALTER TABLE `mt_customer_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;
--
-- AUTO_INCREMENT for table `mt_products`
--
ALTER TABLE `mt_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `mt_product_to_company`
--
ALTER TABLE `mt_product_to_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;
--
-- AUTO_INCREMENT for table `mt_return_invoice`
--
ALTER TABLE `mt_return_invoice`
  MODIFY `return_inv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT for table `mt_return_invoice_products`
--
ALTER TABLE `mt_return_invoice_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `mt_sales_invoice`
--
ALTER TABLE `mt_sales_invoice`
  MODIFY `sales_inv_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;
--
-- AUTO_INCREMENT for table `mt_sales_invoice_products`
--
ALTER TABLE `mt_sales_invoice_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=379;
--
-- AUTO_INCREMENT for table `mt_stock_log`
--
ALTER TABLE `mt_stock_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=392;
--
-- AUTO_INCREMENT for table `mt_sub_categories`
--
ALTER TABLE `mt_sub_categories`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `mt_units`
--
ALTER TABLE `mt_units`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
