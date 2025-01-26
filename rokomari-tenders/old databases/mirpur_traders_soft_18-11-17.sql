-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2017 at 05:19 AM
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
(8, 'Cable', 'Cable Category Description', '2017-11-12 12:35:01', '2017-11-12 06:36:02'),
(9, 'Circuit Breaker', 'Circuit Breaker Description', '2017-11-12 12:35:31', '2017-11-12 06:35:31');

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
(22, 'BRB', 'BRB Company Description--', '2017-11-12 12:27:00', '2017-11-12 06:27:49'),
(23, 'BBS', 'BBS  Company Description', '2017-11-12 12:27:30', '2017-11-12 06:27:30'),
(24, 'RR', '', '2017-11-12 16:53:12', '2017-11-12 10:53:12'),
(25, 'Partex', '', '2017-11-12 16:56:50', '2017-11-12 10:56:50'),
(26, 'ACI', '', '2017-11-12 16:59:21', '2017-11-12 10:59:21');

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
(12, 'Bangladesh', 'BD', '2017-11-12 12:28:10', '2017-11-12 06:28:10'),
(13, 'Thailand', 'THA-', '2017-11-12 12:28:41', '2017-11-12 06:28:54');

-- --------------------------------------------------------

--
-- Table structure for table `mt_customers`
--

CREATE TABLE `mt_customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_company_name` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_contact_person` varchar(255) NOT NULL,
  `customer_contact_details` varchar(255) NOT NULL,
  `customer_created` datetime NOT NULL,
  `customer_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mt_customers`
--

INSERT INTO `mt_customers` (`customer_id`, `customer_name`, `customer_company_name`, `customer_address`, `customer_contact_person`, `customer_contact_details`, `customer_created`, `customer_updated`) VALUES
(9, 'Md. Mafizur Rahman', 'MySoftHeaven BD LTD', 'Customer Address', 'Contact Person', '+123456789', '2017-11-12 12:30:26', '2017-11-12 06:30:26'),
(10, 'Cash Customer', 'Cash Customer Company-', 'Cash Customer Address-', 'Cash Customer Contact Person', 'Cash Customer Contact', '2017-11-12 12:31:18', '2017-11-12 06:32:54');

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
(354, 9, 'Buy Prd. Sales Inv. : 258', 258, 503.15, 0, -503.15, '2017-11-12', '2017-11-12 11:04:19'),
(356, 9, 'Buy Prd. Sales Inv. : 260', 260, 10, 0, -513.15, '2017-11-12', '2017-11-12 12:18:21'),
(357, 9, 'Buy Prd. Sales Inv. : 261', 261, 9.9, 0, -523.05, '2017-11-12', '2017-11-12 12:20:56'),
(358, 9, 'Ret. Prd. Sales Inv. : 258', 258, 0, 481.37, -41.68, '2017-11-12', '2017-11-12 12:22:22'),
(359, 9, 'Sales Inv. : 261 <> Ret. Inv. : 163', 261, 0, 4.75, -36.93, '2017-11-13', '2017-11-13 03:19:09'),
(360, 9, 'ddd', 261, 0, 500, 463.07, '2017-11-13', '2017-11-13 03:29:06'),
(362, 9, 'Sales Inv. : 261 <> Ret. Inv. : 165', 261, 0, 1.98, 465.05, '2017-11-13', '2017-11-13 03:32:07');

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
(107, '1 x 95 RM', '', 8, 20, 12, '2017-11-12', 1, '2017-11-12 16:51:54', '2017-11-12 10:51:54');

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
(190, 107, 22, 10, 0, 15, 145.88, 9, 44.98, 57.1, 43.4, 0.4, 0, 0, '2017-11-12 16:51:54', '2017-11-13 03:39:46'),
(191, 107, 23, 234, 0, 14, 245.95, 9, 50, 61.95, 50, 50, 34, 0, '2017-11-12 16:51:54', '2017-11-13 03:39:46'),
(192, 107, 24, 500, 0, 500, 101.5, 9, 20.1, 20.1, 20.1, 20.1, 20.1, 1, '0000-00-00 00:00:00', '2017-11-12 12:22:22'),
(193, 107, 25, 20, 0, 20, 20, 9, 10, 10, 0, 0, 0, 0, '0000-00-00 00:00:00', '2017-11-12 10:57:30'),
(194, 107, 26, 300, 0, 300, 30, 9, 30, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2017-11-12 11:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `mt_receive_invoice`
--

CREATE TABLE `mt_receive_invoice` (
  `receive_inv_no` int(11) NOT NULL,
  `receive_inv_ref` varchar(255) DEFAULT NULL,
  `receive_inv_date` date NOT NULL,
  `receive_inv_total_amount` double NOT NULL,
  `receive_inv_total_product` int(11) NOT NULL,
  `receive_inv_created` datetime NOT NULL,
  `receive_inv_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mt_receive_invoice`
--

INSERT INTO `mt_receive_invoice` (`receive_inv_no`, `receive_inv_ref`, `receive_inv_date`, `receive_inv_total_amount`, `receive_inv_total_product`, `receive_inv_created`, `receive_inv_updated`) VALUES
(1, '', '2017-11-13', 357.69, 2, '2017-11-13 09:39:45', '2017-11-13 03:39:45');

-- --------------------------------------------------------

--
-- Table structure for table `mt_receive_invoice_products`
--

CREATE TABLE `mt_receive_invoice_products` (
  `id` int(11) NOT NULL,
  `receive_inv_no` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `purchase_price` double NOT NULL,
  `commission` double NOT NULL,
  `amount` double NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mt_receive_invoice_products`
--

INSERT INTO `mt_receive_invoice_products` (`id`, `receive_inv_no`, `product_id`, `company_id`, `color`, `quantity`, `purchase_price`, `commission`, `amount`, `created`, `updated`) VALUES
(1, 1, 107, 22, 'black', 13, 15, 1, 193.05, '2017-11-13 09:39:45', '2017-11-13 03:39:45'),
(2, 1, 107, 23, 'black', 12, 14, 2, 164.64, '2017-11-13 09:39:46', '2017-11-13 03:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `mt_return_invoice`
--

CREATE TABLE `mt_return_invoice` (
  `return_inv_no` int(11) NOT NULL,
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

INSERT INTO `mt_return_invoice` (`return_inv_no`, `sales_inv_no`, `customer_id`, `return_inv_date`, `return_inv_total_amount`, `return_inv_created`, `return_inv_updated`) VALUES
(162, 258, 9, '2017-11-12', 481.37, '2017-11-12 18:22:22', '2017-11-12 12:22:22'),
(163, 261, 9, '2017-11-13', 4.75, '2017-11-13 09:19:09', '2017-11-13 03:19:09'),
(165, 261, 9, '2017-11-13', 1.98, '2017-11-13 09:32:07', '2017-11-13 03:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `mt_return_invoice_products`
--

CREATE TABLE `mt_return_invoice_products` (
  `id` int(11) NOT NULL,
  `return_inv_no` int(11) NOT NULL,
  `sales_inv_no` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `return_quantity` double NOT NULL,
  `return_unit_id` int(11) NOT NULL,
  `return_commission` double NOT NULL,
  `return_amount` double NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mt_return_invoice_products`
--

INSERT INTO `mt_return_invoice_products` (`id`, `return_inv_no`, `sales_inv_no`, `product_id`, `company_id`, `color`, `return_quantity`, `return_unit_id`, `return_commission`, `return_amount`, `created`, `updated`) VALUES
(124, 162, 258, 107, 22, 'red', 3, 0, 3, 0.26, '2017-11-12 18:22:22', '2017-11-12 12:22:22'),
(125, 162, 258, 107, 23, 'black', 5, 0, 5, 11.11, '2017-11-12 18:22:22', '2017-11-12 12:22:22'),
(126, 162, 258, 107, 24, 'yellow', 1, 0, 6, 470, '2017-11-12 18:22:22', '2017-11-12 12:22:22'),
(127, 163, 261, 107, 22, 'black', 0.5, 0, 5, 4.75, '2017-11-13 09:19:09', '2017-11-13 03:19:09'),
(128, 165, 261, 107, 22, 'black', 0.2, 0, 1, 1.98, '2017-11-13 09:32:07', '2017-11-13 03:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `mt_sales_invoice`
--

CREATE TABLE `mt_sales_invoice` (
  `sales_inv_no` int(11) NOT NULL,
  `sales_inv_customer` int(11) NOT NULL,
  `sales_inv_date` date NOT NULL,
  `sales_inv_total_amount` double NOT NULL,
  `sales_inv_pre_amount` double NOT NULL,
  `sales_inv_net_amount` double NOT NULL,
  `sales_inv_total_product` int(11) NOT NULL,
  `sales_inv_created` datetime NOT NULL,
  `sales_inv_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mt_sales_invoice`
--

INSERT INTO `mt_sales_invoice` (`sales_inv_no`, `sales_inv_customer`, `sales_inv_date`, `sales_inv_total_amount`, `sales_inv_pre_amount`, `sales_inv_net_amount`, `sales_inv_total_product`, `sales_inv_created`, `sales_inv_updated`) VALUES
(258, 9, '2017-11-12', 503.15, 0, 503.15, 3, '2017-11-12 17:04:19', '2017-11-12 11:04:19'),
(260, 9, '2017-11-12', 10, -503.15, 513.15, 1, '2017-11-12 18:18:21', '2017-11-12 12:18:21'),
(261, 9, '2017-11-12', 9.9, -513.15, 523.05, 1, '2017-11-12 18:20:56', '2017-11-12 12:20:56');

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
  `sale_price` double NOT NULL,
  `commission` double NOT NULL,
  `amount` double NOT NULL,
  `sale_qty_after_return` double NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mt_sales_invoice_products`
--

INSERT INTO `mt_sales_invoice_products` (`id`, `sales_inv_no`, `product_id`, `company_id`, `color`, `quantity`, `unit_id`, `sale_price`, `commission`, `amount`, `sale_qty_after_return`, `created`, `updated`) VALUES
(412, 258, 107, 22, 'red', 5, 10, 0.09, 1, 0.45, 2, '2017-11-12 17:04:19', '2017-11-12 12:22:22'),
(413, 258, 107, 23, 'black', 10, 11, 2.34, 3, 22.7, 5, '2017-11-12 17:04:19', '2017-11-12 12:22:22'),
(414, 258, 107, 24, 'yellow', 1, 9, 500, 4, 480, 0, '2017-11-12 17:04:19', '2017-11-12 12:22:22'),
(415, 260, 107, 22, 'black', 1, 9, 10, 0, 10, 1, '2017-11-12 18:18:21', '2017-11-12 12:18:21'),
(416, 261, 107, 22, 'black', 1, 9, 10, 1, 9.9, 0.3, '2017-11-12 18:20:56', '2017-11-13 03:32:07');

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
  `color` varchar(255) NOT NULL,
  `sales_inv_no` int(11) DEFAULT NULL,
  `receive_inv_no` int(11) DEFAULT NULL,
  `return_inv_no` int(11) DEFAULT NULL,
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

INSERT INTO `mt_stock_log` (`log_id`, `product_id`, `product_name`, `company_id`, `company_name`, `color`, `sales_inv_no`, `receive_inv_no`, `return_inv_no`, `before_total_qty`, `after_total_qty`, `insert_qty`, `convert_qty`, `before_unit`, `before_unit_name`, `insert_unit`, `insert_unit_name`, `stock_date`, `system_msg`, `system_date`) VALUES
(442, 107, '1 x 95 RM', 22, 'BRB', 'R: 40 <> Bla: 40 <> Y: 43 <> ', NULL, NULL, 0, 0, 123, 123, 123, 9, 'Coil', 9, 'Coil', '2017-11-12', 'New Product', '2017-11-12 10:51:54'),
(443, 107, '1 x 95 RM', 23, 'BBS', 'R: 50 <> Bla: 50 <> Y: 50 <> G: 50 <> Blu: 34 <> ', NULL, NULL, 0, 0, 234, 234, 234, 9, 'Coil', 9, 'Coil', '2017-11-12', 'New Product', '2017-11-12 10:51:54'),
(444, 107, '1 x 95 RM', 22, 'BRB', 'Bla: 0.4 <> Y: 0.4 <> G: 0.4 <> ', NULL, NULL, 0, 123, 124.2, 120, 1.2, 9, 'Coil', 11, 'Meter', '2017-11-12', 'Stock Entry', '2017-11-12 10:54:27'),
(445, 107, '1 x 95 RM', 24, 'RR', 'Bla: 0.4 <> Y: 0.4 <> G: 0.4 <> ', NULL, NULL, 0, 0, 101, 101, 101, 9, 'Coil', 9, 'Coil', '2017-11-12', 'New Company', '2017-11-12 10:54:27'),
(446, 107, '1 x 95 RM', 22, 'BRB', 'R: 5 <> Bla: 5 <> ', NULL, NULL, 0, 124.2, 134.2, 10, 10, 9, 'Coil', 9, 'Coil', '2017-11-12', 'Stock Entry', '2017-11-12 10:57:30'),
(447, 107, '1 x 95 RM', 25, 'Partex', '', NULL, NULL, 0, 0, 20, 20, 20, 9, 'Coil', 9, 'Coil', '2017-11-12', 'New Company', '2017-11-12 10:57:30'),
(448, 107, '1 x 95 RM', 24, 'RR', 'R: 0.1 <> Bla: 0.1 <> Y: 0.1 <> G: 0.1 <> Blu: 0.1 <> ', NULL, NULL, 0, 101, 101.5, 50, 0.5, 9, 'Coil', 11, 'Meter', '2017-11-12', 'Stock Entry', '2017-11-12 11:00:07'),
(449, 107, '1 x 95 RM', 26, 'ACI', 'R: 30 <> ', NULL, NULL, 0, 0, 30, 30, 30, 9, 'Coil', 9, 'Coil', '2017-11-12', 'New Company', '2017-11-12 11:00:07'),
(450, 107, '1 x 95 RM', 22, 'BRB', 'red', 258, NULL, 0, 134.2, 134.15, 5, 0.05, 9, 'Coil', 10, 'Yard', '2017-11-12', 'Product Sales', '2017-11-12 11:04:19'),
(451, 107, '1 x 95 RM', 23, 'BBS', 'black', 258, NULL, 0, 234, 233.9, 10, 0.1, 9, 'Coil', 11, 'Meter', '2017-11-12', 'Product Sales', '2017-11-12 11:04:19'),
(452, 107, '1 x 95 RM', 24, 'RR', 'yellow', 258, NULL, 0, 101.5, 100.5, 1, 1, 9, 'Coil', 9, 'Coil', '2017-11-12', 'Product Sales', '2017-11-12 11:04:19'),
(453, 107, '1 x 95 RM', 22, 'BRB', 'black', 260, NULL, 0, 134.15, 133.15, 1, 1, 9, 'Coil', 9, 'Coil', '2017-11-12', 'Product Sales', '2017-11-12 12:18:21'),
(454, 107, '1 x 95 RM', 22, 'BRB', 'black', 261, NULL, 0, 133.15, 132.15, 1, 1, 9, 'Coil', 9, 'Coil', '2017-11-12', 'Product Sales', '2017-11-12 12:20:56'),
(455, 107, '1 x 95 RM', 22, 'BRB', 'red', 258, NULL, 0, 132.15, 132.18, 3, 0.03, 9, 'Coil', 10, 'Yard', '2017-11-12', 'Return Product', '2017-11-12 12:22:22'),
(456, 107, '1 x 95 RM', 23, 'BBS', 'black', 258, NULL, 0, 233.9, 233.95, 5, 0.05, 9, 'Coil', 11, 'Meter', '2017-11-12', 'Return Product', '2017-11-12 12:22:22'),
(457, 107, '1 x 95 RM', 24, 'RR', 'yellow', 258, NULL, 0, 100.5, 101.5, 1, 1, 9, 'Coil', 9, 'Coil', '2017-11-12', 'Return Product', '2017-11-12 12:22:22'),
(458, 107, '1 x 95 RM', 22, 'BRB', 'black', 261, NULL, 0, 132.18, 132.68, 0.5, 0.5, 9, 'Coil', 9, 'Coil', '2017-11-13', 'Return Product', '2017-11-13 03:19:09'),
(459, 107, '1 x 95 RM', 22, 'BRB', 'black', 261, NULL, 165, 132.68, 132.88, 0.2, 0.2, 9, 'Coil', 9, 'Coil', '2017-11-13', 'Return Product', '2017-11-13 03:32:07'),
(460, 107, '1 x 95 RM', 22, 'BRB', 'black', NULL, 1, NULL, 132.88, 145.88, 13, 13, 9, 'Coil', 9, 'Coil', '2017-11-13', 'Stock Entry', '2017-11-13 03:39:46'),
(461, 107, '1 x 95 RM', 23, 'BBS', 'black', NULL, 1, NULL, 233.95, 245.95, 12, 12, 9, 'Coil', 9, 'Coil', '2017-11-13', 'Stock Entry', '2017-11-13 03:39:46');

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
(20, 8, 'RM Cable', 'RM Cable Sub Category Description', '2017-11-12 12:36:36', '2017-11-12 06:36:36'),
(21, 9, 'DP Circuit Breaker', 'DP Circuit Breaker Sub Category Description', '2017-11-12 12:37:15', '2017-11-12 06:44:07'),
(22, 8, 'Re Cable', '', '2017-11-12 15:00:04', '2017-11-12 09:00:04'),
(23, 9, 'SP Circuit Breaker', '', '2017-11-12 15:02:03', '2017-11-12 09:02:03');

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
(9, 'Coil', 'C', '2017-11-12 12:33:29', '2017-11-12 06:33:29'),
(10, 'Yard', 'Y', '2017-11-12 12:33:37', '2017-11-12 06:33:37'),
(11, 'Meter', 'M', '2017-11-12 12:33:47', '2017-11-12 06:33:47'),
(12, 'Piece', 'P', '2017-11-12 12:34:09', '2017-11-12 06:34:09'),
(13, 'Feet', 'F', '2017-11-12 12:34:15', '2017-11-12 06:34:15');

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
(1, '127.0.0.1', 'administrator', '$2y$08$7G9a1dqcBsczIU71PfjC1.CzkObDQpU5mXk9QL41e3Ach1IfYRl4i', '', 'administrator@gmail.com', NULL, NULL, NULL, 1496699848, 1510542794, 1, 'Rafiq 1', 'Ahmed', '', '', '', '0000-00-00'),
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
-- Indexes for table `mt_receive_invoice`
--
ALTER TABLE `mt_receive_invoice`
  ADD PRIMARY KEY (`receive_inv_no`);

--
-- Indexes for table `mt_receive_invoice_products`
--
ALTER TABLE `mt_receive_invoice_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mt_return_invoice`
--
ALTER TABLE `mt_return_invoice`
  ADD PRIMARY KEY (`return_inv_no`);

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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mt_companies`
--
ALTER TABLE `mt_companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `mt_countries`
--
ALTER TABLE `mt_countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mt_customers`
--
ALTER TABLE `mt_customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mt_customer_payment`
--
ALTER TABLE `mt_customer_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=363;

--
-- AUTO_INCREMENT for table `mt_products`
--
ALTER TABLE `mt_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `mt_product_to_company`
--
ALTER TABLE `mt_product_to_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `mt_receive_invoice`
--
ALTER TABLE `mt_receive_invoice`
  MODIFY `receive_inv_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mt_receive_invoice_products`
--
ALTER TABLE `mt_receive_invoice_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mt_return_invoice`
--
ALTER TABLE `mt_return_invoice`
  MODIFY `return_inv_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `mt_return_invoice_products`
--
ALTER TABLE `mt_return_invoice_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `mt_sales_invoice`
--
ALTER TABLE `mt_sales_invoice`
  MODIFY `sales_inv_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT for table `mt_sales_invoice_products`
--
ALTER TABLE `mt_sales_invoice_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=417;

--
-- AUTO_INCREMENT for table `mt_stock_log`
--
ALTER TABLE `mt_stock_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=462;

--
-- AUTO_INCREMENT for table `mt_sub_categories`
--
ALTER TABLE `mt_sub_categories`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `mt_units`
--
ALTER TABLE `mt_units`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
