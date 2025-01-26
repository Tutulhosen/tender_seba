-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2017 at 10:40 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mirpur_traders_soft`
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
(1, 'Circuit Breaker', 'Category of circuit breaker', '2017-10-12 11:21:36', '2017-10-12 05:21:36'),
(2, 'Bulb', 'Bulb Description', '2017-10-12 11:22:30', '2017-10-17 06:29:16'),
(3, 'Fan', 'Fan Description--', '2017-10-17 12:30:27', '2017-10-28 09:35:36'),
(4, 'Cable', 'Cable Category Description', '2017-10-17 12:34:19', '2017-10-17 06:34:19'),
(5, 'Switch', 'Switch Category Description', '2017-10-17 16:57:12', '2017-10-17 10:57:12'),
(6, '2222', '', '0000-00-00 00:00:00', '2017-10-30 07:59:29'),
(7, 'dfsdf', '', '2017-10-30 14:00:25', '2017-10-30 08:00:25');

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
(9, 'BRB', 'BRB Cables', '2017-10-17 12:25:22', '2017-10-17 06:25:22'),
(10, 'BBS', 'BBS Cables', '2017-10-17 12:25:34', '2017-10-17 06:25:34'),
(12, 'Partex', 'Partex Cables', '2017-10-17 12:26:02', '2017-10-17 06:26:02'),
(13, 'Poly', 'Cables', '2017-10-17 12:26:18', '2017-10-17 06:26:18'),
(14, 'KDK', 'KDK Company Description', '2017-10-17 12:58:58', '2017-10-17 06:58:58'),
(15, 'Panasonic', 'Panasonic Company Description', '2017-10-17 12:59:32', '2017-10-17 06:59:32'),
(16, 'ACI', 'ACI Limited', '2017-10-17 16:55:14', '2017-10-17 10:55:14'),
(17, 'Energypac', 'Energypac Electronics Ltd.', '2017-10-17 17:14:33', '2017-10-17 11:14:33'),
(18, 'RR', '2', '2017-10-28 15:22:00', '2017-10-28 09:22:00'),
(19, 'XYZ--', 'XYZ Company Description', '0000-00-00 00:00:00', '2017-10-30 07:58:28'),
(20, 'poi', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'dfsdfds', '', '2017-10-30 14:01:21', '0000-00-00 00:00:00');

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
(5, 'Bangladesh', 'BD', '2017-10-17 12:26:30', '2017-10-17 06:26:30'),
(6, 'India', 'IND', '2017-10-17 12:26:42', '2017-10-17 06:26:42'),
(7, 'New Zealand', 'NZ', '2017-10-17 12:26:54', '2017-10-17 06:26:54'),
(8, 'Thailand', 'THA', '2017-10-17 12:27:55', '2017-10-17 06:27:55'),
(9, 'dfsdf', '', '0000-00-00 00:00:00', '2017-10-30 08:01:58'),
(10, 'adfsdfsdfsd---', '', '2017-10-30 14:02:10', '2017-10-30 08:02:10'),
(11, 'ddd', 'ddd', '2017-10-30 15:30:28', '2017-10-30 09:30:28');

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
(1, 'Md. Mafizur Rahman', 'Adabor Thana, Shymoli, Dhaka', 'Mafiz--', '+88 01671 397 450', '2017-10-19 10:47:28', '2017-10-19 04:50:09'),
(2, 'Corporate Customer--', 'Corporate Customer Address', 'Corporate Customer Contact Person', 'Corporate Customer Contact Details', '2017-10-19 10:49:56', '2017-10-19 04:50:03'),
(3, 'adsfdsfdsf', '', '', '', '0000-00-00 00:00:00', '2017-10-30 08:02:49'),
(4, '--dsfdsf', '', '', '', '2017-10-30 14:03:15', '2017-10-30 08:03:15');

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
(266, 1, 'Buy Product. Sales Invoice Number : 1710291509249087', 2147483647, 1323.83, 0, -1323.83, '2017-10-28', '2017-10-29 03:54:39'),
(267, 1, 'Return Product. Sales Inv No: 1710291509249087', 2147483647, 0, 427.88, -895.95, '2017-10-28', '2017-10-29 04:02:13'),
(268, 1, 'Return Product. Sales Inv No: 1710291509249087', 2147483647, 0, 99.96, -795.99, '2017-10-28', '2017-10-29 04:08:56'),
(269, 1, 'Return Product. Sales Inv No: 1710291509249087', 2147483647, 0, 52.86, -743.13, '2017-10-28', '2017-10-29 04:09:32'),
(270, 1, 'Buy Prd. Sales Inv. : 208', 208, 11.27, 0, -754.4, '2017-10-29', '2017-10-29 12:18:46'),
(271, 1, 'Ret. Prd. Sales Inv. : 208', 208, 0, 5.64, -748.76, '2017-10-29', '2017-10-29 12:20:08'),
(272, 1, 'Buy Prd. Sales Inv. : 209', 209, 918, 0, -1666.76, '2017-10-30', '2017-10-30 06:55:13');

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
(94, 'DP01 Circuit Breaker--', '', 1, 8, 5, '2017-10-28', 0, '0000-00-00 00:00:00', '2017-10-30 09:31:41'),
(95, '1 x 95 RM', '', 4, 14, 7, '2017-10-28', 1, '0000-00-00 00:00:00', '2017-10-29 03:50:31'),
(96, '11', '11', 2, 10, 0, '2017-10-30', 0, '0000-00-00 00:00:00', '2017-10-30 11:22:50');

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
(172, 94, 9, 102, 82, 72, 101, 6, 0, 0, 0, 0, 0, 0, '2017-10-29 09:44:57', '2017-10-30 06:55:13'),
(173, 94, 17, 120, 100, 80, 120, 6, 0, 0, 0, 0, 0, 0, '2017-10-29 09:44:57', '2017-10-29 03:44:57'),
(174, 94, 15, 122, 112, 102, 73, 6, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2017-10-29 04:02:13'),
(175, 95, 9, 125, 105, 100, 14.59, 3, 4.59, 5, 3, 1, 1, 0, '2017-10-29 09:50:31', '2017-10-29 12:20:08'),
(176, 95, 12, 111, 101, 100, 19.2, 3, 4.2, 5, 5, 2, 2, 1, '2017-10-29 09:50:31', '2017-10-29 04:02:13'),
(177, 96, 13, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, '2017-10-30 17:22:50', '2017-10-30 11:22:50');

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
(127, 2147483647, 1, '2017-10-28', 427.88, '0000-00-00 00:00:00', '2017-10-29 04:02:13'),
(128, 2147483647, 1, '2017-10-28', 99.96, '0000-00-00 00:00:00', '2017-10-29 04:08:56'),
(129, 2147483647, 1, '2017-10-28', 52.86, '0000-00-00 00:00:00', '2017-10-29 04:09:31'),
(130, 208, 1, '2017-10-29', 5.64, '0000-00-00 00:00:00', '2017-10-29 12:20:08');

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
(100, 2147483647, 95, 9, '9', 35, 0, 0, 39.85, '0000-00-00 00:00:00', '2017-10-29 04:02:13'),
(101, 2147483647, 94, 15, '15', 2, 0, 0, 234.24, '0000-00-00 00:00:00', '2017-10-29 04:02:13'),
(102, 2147483647, 95, 12, '12', 45, 0, 0, 49.45, '0000-00-00 00:00:00', '2017-10-29 04:02:13'),
(103, 2147483647, 95, 12, '12', 1, 0, 0, 104.34, '0000-00-00 00:00:00', '2017-10-29 04:02:13'),
(104, 2147483647, 94, 9, '9', 1, 0, 0, 99.96, '0000-00-00 00:00:00', '2017-10-29 04:08:56'),
(105, 2147483647, 95, 9, '9', 25, 0, 0, 52.86, '0000-00-00 00:00:00', '2017-10-29 04:09:32'),
(106, 208, 95, 9, '9', 5, 0, 0, 5.64, '0000-00-00 00:00:00', '2017-10-29 12:20:08');

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
(207, 1, '2017-10-28', 743.13, 743.13, 5, '0000-00-00 00:00:00', '2017-10-29 04:09:32'),
(208, 1, '2017-10-29', 5.63, 748.76, 1, '0000-00-00 00:00:00', '2017-10-29 12:20:08'),
(209, 1, '2017-10-30', 918, 1666.76, 1, '0000-00-00 00:00:00', '2017-10-30 06:55:13');

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
(371, 2147483647, 94, 9, '', 1, 1, 2, 399.84, '0000-00-00 00:00:00', '2017-10-29 04:08:56'),
(372, 2147483647, 95, 9, 'red', 10, 1, 1, 21.14, '0000-00-00 00:00:00', '2017-10-29 04:09:32'),
(373, 2147483647, 94, 15, '', 2, 3, 4, 234.24, '0000-00-00 00:00:00', '2017-10-29 04:02:13'),
(374, 2147483647, 95, 12, 'red', 45, 4, 1, 87.91, '0000-00-00 00:00:00', '2017-10-29 04:02:13'),
(375, 2147483647, 95, 12, 'black', 1, 3, 6, 0, '0000-00-00 00:00:00', '2017-10-29 04:02:13'),
(376, 208, 95, 9, 'red', 5, 1, 2, 5.63, '0000-00-00 00:00:00', '2017-10-29 12:20:08'),
(377, 209, 94, 9, '', 10, 1, 10, 918, '0000-00-00 00:00:00', '2017-10-30 06:55:13');

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
(336, 94, 'DP01 Circuit Breaker', 9, 'BRB', NULL, 0, 100, 100, 100, 6, 'Piece', 6, 'Piece', '2017-10-29', 'New Product', '2017-10-29 03:44:57'),
(337, 94, 'DP01 Circuit Breaker', 17, 'Energypac', NULL, 0, 120, 120, 120, 6, 'Piece', 6, 'Piece', '2017-10-29', 'New Product', '2017-10-29 03:44:57'),
(338, 94, 'DP01 Circuit Breaker', 9, 'BRB', NULL, 100, 115, 15, 15, 6, 'Piece', 6, 'Piece', '2017-10-29', 'Stock Entry', '2017-10-29 03:46:55'),
(339, 94, 'DP01 Circuit Breaker', 15, 'Panasonic', NULL, 0, 75, 75, 75, 6, 'Piece', 6, 'Piece', '2017-10-29', 'New Company', '2017-10-29 03:46:55'),
(340, 95, '1 x 95 RM', 9, 'BRB', NULL, 0, 15, 15, 15, 3, 'Coil', 3, 'Coil', '2017-10-29', 'New Product', '2017-10-29 03:50:31'),
(341, 95, '1 x 95 RM', 12, 'Partex', NULL, 0, 20, 20, 20, 3, 'Coil', 3, 'Coil', '2017-10-29', 'New Product', '2017-10-29 03:50:31'),
(342, 94, 'DP01 Circuit Breaker', 9, 'BRB', 2147483647, 115, 110, 5, 5, 6, 'Piece', 1, 'Yard', '2017-10-29', 'Product Sales', '2017-10-29 03:54:39'),
(343, 95, '1 x 95 RM', 9, 'BRB', 2147483647, 15, 14.08, 100, 0.92, 3, 'Coil', 1, 'Yard', '2017-10-29', 'Product Sales', '2017-10-29 03:54:39'),
(344, 94, 'DP01 Circuit Breaker', 15, 'Panasonic', 2147483647, 75, 71, 4, 4, 6, 'Piece', 3, 'Coil', '2017-10-29', 'Product Sales', '2017-10-29 03:54:39'),
(345, 95, '1 x 95 RM', 12, 'Partex', 2147483647, 20, 18.75, 125, 1.25, 3, 'Coil', 4, 'Meter', '2017-10-29', 'Product Sales', '2017-10-29 03:54:39'),
(346, 95, '1 x 95 RM', 12, 'Partex', 2147483647, 18.75, 17.75, 1, 1, 3, 'Coil', 3, 'Coil', '2017-10-29', 'Product Sales', '2017-10-29 03:54:39'),
(347, 95, '1 x 95 RM', 9, 'BRB', 2147483647, 14.08, 14.4, 35, 0.32, 3, 'Coil', 1, 'Yard', '2017-10-29', 'Return Product', '2017-10-29 04:02:13'),
(348, 94, 'DP01 Circuit Breaker', 15, 'Panasonic', 2147483647, 71, 73, 2, 2, 6, 'Piece', 3, 'Coil', '2017-10-29', 'Return Product', '2017-10-29 04:02:13'),
(349, 95, '1 x 95 RM', 12, 'Partex', 2147483647, 17.75, 18.2, 45, 0.45, 3, 'Coil', 4, 'Meter', '2017-10-29', 'Return Product', '2017-10-29 04:02:13'),
(350, 95, '1 x 95 RM', 12, 'Partex', 2147483647, 18.2, 19.2, 1, 1, 3, 'Coil', 3, 'Coil', '2017-10-29', 'Return Product', '2017-10-29 04:02:13'),
(351, 94, 'DP01 Circuit Breaker', 9, 'BRB', 2147483647, 110, 111, 1, 1, 6, 'Piece', 1, 'Yard', '2017-10-29', 'Return Product', '2017-10-29 04:08:56'),
(352, 95, '1 x 95 RM', 9, 'BRB', 2147483647, 14.4, 14.63, 25, 0.23, 3, 'Coil', 1, 'Yard', '2017-10-29', 'Return Product', '2017-10-29 04:09:32'),
(353, 95, '1 x 95 RM', 9, 'BRB', 208, 14.63, 14.54, 10, 0.09, 3, 'Coil', 1, 'Yard', '2017-10-29', 'Product Sales', '2017-10-29 12:18:46'),
(354, 95, '1 x 95 RM', 9, 'BRB', 208, 14.54, 14.59, 5, 0.05, 3, 'Coil', 1, 'Yard', '2017-10-29', 'Return Product', '2017-10-29 12:20:08'),
(355, 94, 'DP01 Circuit Breaker', 9, 'BRB', 209, 111, 101, 10, 10, 6, 'Piece', 1, 'Yard', '2017-10-30', 'Product Sales', '2017-10-30 06:55:13'),
(356, 96, '11', 13, 'Poly', NULL, 0, 1, 1, 1, 1, 'Yard', 1, 'Yard', '2017-10-30', 'New Product', '2017-10-30 11:22:50');

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
(8, 1, 'DP Circuit Breaker', 'DP Circuit Breaker Sub Category Description', '2017-10-17 12:31:07', '2017-10-17 06:31:07'),
(9, 1, 'SP Circuit Breaker', 'SP Circuit Breaker Sub Category Description', '2017-10-17 12:31:27', '2017-10-17 06:31:27'),
(10, 2, 'Energy Bulb', 'Energy Bulb Sub Category Description', '2017-10-17 12:31:52', '2017-10-17 06:31:52'),
(11, 2, 'Tube Light', 'Tube Light Sub Category Description', '2017-10-17 12:32:10', '2017-10-17 06:32:10'),
(12, 3, 'Ceiling Fan', 'Ceiling Fan Sub Category Description', '2017-10-17 12:32:33', '2017-10-17 06:32:33'),
(13, 3, 'Table Fan', 'Table Fan Sub Category Description', '2017-10-17 12:32:49', '2017-10-17 06:32:49'),
(14, 4, 'RM Cable', 'RM Cable Sub Category Description', '2017-10-17 12:35:10', '2017-10-17 06:35:10'),
(15, 4, 'DM Cable', 'DM Cable Sub Category Description', '2017-10-17 12:35:28', '2017-10-17 06:35:28'),
(16, 3, 'Wall Fan', 'Wall Fan Sub Category Description', '2017-10-17 12:59:51', '2017-10-17 06:59:51'),
(17, 5, 'Gang Switch', 'Gang Switch Sub Category Description', '2017-10-17 16:57:39', '2017-10-17 10:57:39'),
(18, 5, 'Legrand Belanko Switch', 'Legrand Belanko Switch Sub Category Description', '2017-10-17 17:00:26', '2017-10-17 11:00:26'),
(19, 1, 'dd', '', '0000-00-00 00:00:00', '2017-10-30 08:05:42');

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
(1, 'Yard', 'Y', '2017-10-12 10:00:59', '2017-10-16 06:08:25'),
(3, 'Coil', 'C', '2017-10-12 10:01:23', '2017-10-16 06:08:33'),
(4, 'Meter', 'M', '2017-10-16 13:12:39', '2017-10-16 07:12:39'),
(5, 'Feet', 'f', '2017-10-16 13:12:46', '2017-10-16 07:12:46'),
(6, 'Piece', 'P', '2017-10-17 12:28:19', '2017-10-17 06:28:19'),
(7, '111', '', '0000-00-00 00:00:00', '2017-10-30 08:04:54'),
(8, '--', '', '2017-10-30 14:05:18', '2017-10-30 08:05:18');

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
(1, '127.0.0.1', 'administrator', '$2y$08$7G9a1dqcBsczIU71PfjC1.CzkObDQpU5mXk9QL41e3Ach1IfYRl4i', '', 'administrator@gmail.com', NULL, NULL, NULL, 1496699848, 1509355443, 1, 'Rafiq 1', 'Ahmed', '', '', '', '0000-00-00'),
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

-- --------------------------------------------------------

--
-- Table structure for table `users_groups_0`
--

CREATE TABLE `users_groups_0` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups_0`
--

INSERT INTO `users_groups_0` (`id`, `user_id`, `group_id`) VALUES
(45, 1, 1),
(26, 2, 1),
(27, 3, 1),
(28, 4, 1),
(15, 5, 2),
(16, 6, 2),
(17, 7, 2),
(18, 8, 2),
(19, 9, 2),
(20, 10, 2),
(21, 11, 2),
(31, 12, 4),
(23, 13, 2),
(32, 13, 4),
(24, 14, 2),
(33, 14, 4),
(34, 15, 4),
(35, 16, 4),
(36, 17, 4),
(37, 18, 4),
(38, 19, 4),
(39, 20, 4),
(40, 21, 4),
(41, 22, 4),
(42, 23, 4),
(43, 24, 4),
(44, 25, 4);

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
-- Indexes for table `users_groups_0`
--
ALTER TABLE `users_groups_0`
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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `mt_companies`
--
ALTER TABLE `mt_companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `mt_countries`
--
ALTER TABLE `mt_countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `mt_customers`
--
ALTER TABLE `mt_customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mt_customer_payment`
--
ALTER TABLE `mt_customer_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;
--
-- AUTO_INCREMENT for table `mt_products`
--
ALTER TABLE `mt_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `mt_product_to_company`
--
ALTER TABLE `mt_product_to_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;
--
-- AUTO_INCREMENT for table `mt_return_invoice`
--
ALTER TABLE `mt_return_invoice`
  MODIFY `return_inv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT for table `mt_return_invoice_products`
--
ALTER TABLE `mt_return_invoice_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `mt_sales_invoice`
--
ALTER TABLE `mt_sales_invoice`
  MODIFY `sales_inv_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;
--
-- AUTO_INCREMENT for table `mt_sales_invoice_products`
--
ALTER TABLE `mt_sales_invoice_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=378;
--
-- AUTO_INCREMENT for table `mt_stock_log`
--
ALTER TABLE `mt_stock_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=357;
--
-- AUTO_INCREMENT for table `mt_sub_categories`
--
ALTER TABLE `mt_sub_categories`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `mt_units`
--
ALTER TABLE `mt_units`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
-- AUTO_INCREMENT for table `users_groups_0`
--
ALTER TABLE `users_groups_0`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
