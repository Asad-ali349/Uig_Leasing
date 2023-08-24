-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2022 at 04:56 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sample_leasing`
--

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `id` int(11) NOT NULL,
  `dealer_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `invoice_number` varchar(255) DEFAULT NULL,
  `contract_type_id` int(11) DEFAULT NULL,
  `payment_days` int(11) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `total_years` int(11) DEFAULT NULL,
  `months` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `paid_amount` decimal(10,2) DEFAULT 0.00,
  `interest_rate` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`id`, `dealer_id`, `customer_id`, `invoice_number`, `contract_type_id`, `payment_days`, `payment_method`, `total_years`, `months`, `amount`, `paid_amount`, `interest_rate`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '1313', 1, NULL, NULL, 2, 24, '132.00', '0.00', NULL, 2, '2022-01-25 11:30:05', '2022-02-23 15:14:32'),
(2, 1, 1, '121212', 2, NULL, NULL, 3, 36, '234562.00', '0.00', NULL, 1, '2022-01-25 11:39:01', '2022-01-25 11:39:01'),
(3, 1, 1, '123', 2, NULL, NULL, 2, 24, '123.00', '0.00', 20, 1, '2022-01-29 11:59:23', '2022-01-29 11:59:23'),
(4, 1, 4, '454554', 1, NULL, NULL, 3, 36, '12.00', '0.00', 10, 1, '2022-01-29 12:04:06', '2022-01-29 12:04:06'),
(5, 1, 1, '9663', 2, NULL, NULL, 2, 24, '9666.00', '0.00', NULL, 1, '2022-01-29 12:05:55', '2022-01-29 12:05:55'),
(6, 1, 1, '1913700', 2, NULL, NULL, 3, 36, '1232.00', '0.00', 20, 1, '2022-01-29 12:08:13', '2022-01-29 12:08:13'),
(7, 1, 5, 'd23dw', 1, NULL, NULL, 2, 24, '13.00', '0.00', 50, 1, '2022-01-31 07:21:00', '2022-01-31 07:21:00'),
(8, 1, 6, '12312', 2, NULL, NULL, 1, 12, '23.00', '0.00', 40, 1, '2022-01-31 07:35:24', '2022-01-31 07:35:24'),
(9, 1, 1, '13', 1, NULL, 'Weekly', 1, 12, '1200.00', '0.00', 50, 1, '2022-02-01 10:39:04', '2022-02-01 10:39:04'),
(10, 1, 1, '13', 1, NULL, 'Weekly', 1, 12, '1200.00', '0.00', 50, 1, '2022-02-01 10:42:51', '2022-02-01 10:42:51'),
(11, 1, 1, '13', 1, NULL, 'Weekly', 1, 12, '1200.00', '0.00', 50, 1, '2022-02-01 10:46:57', '2022-02-01 10:46:57'),
(12, 1, 1, '13', 1, NULL, 'Weekly', 1, 12, '1200.00', '0.00', 50, 1, '2022-02-01 10:50:11', '2022-02-01 10:50:11'),
(13, 1, 1, '13', 1, NULL, 'Weekly', 1, 12, '1200.00', '0.00', 50, 1, '2022-02-01 10:51:39', '2022-02-01 10:51:39'),
(14, 1, 1, '13', 1, NULL, 'Weekly', 1, 12, '1200.00', '0.00', 50, 1, '2022-02-01 10:58:16', '2022-02-01 10:58:16'),
(15, 1, 1, '13', 1, NULL, 'Weekly', 1, 12, '1200.00', '0.00', 50, 1, '2022-02-01 10:59:42', '2022-02-01 10:59:42'),
(16, 1, 1, '13', 1, NULL, 'Weekly', 1, 12, '1200.00', '0.00', 50, 1, '2022-02-01 10:59:58', '2022-02-01 10:59:58'),
(17, 1, 1, '13', 1, NULL, 'Weekly', 1, 12, '1200.00', '0.00', 50, 1, '2022-02-01 11:00:51', '2022-02-01 11:00:51'),
(18, 1, 1, '13', 1, NULL, 'Weekly', 1, 12, '1200.00', '0.00', 50, 1, '2022-02-01 11:02:54', '2022-02-01 11:02:54'),
(19, 1, 1, '13231', 1, NULL, 'Weekly', 1, 12, '12000.00', '0.00', 50, 1, '2022-02-01 11:24:13', '2022-02-01 11:24:13'),
(20, 1, 1, '13231', 1, NULL, 'Weekly', 1, 12, '12000.00', '0.00', 50, 1, '2022-02-01 11:24:40', '2022-02-01 11:24:40'),
(21, 1, 1, '1212312', 1, NULL, 'Weekly', 1, 12, '2300.00', '0.00', 50, 1, '2022-02-01 13:08:19', '2022-02-01 13:08:19'),
(22, 1, 1, '96345', 1, NULL, 'Weekly', 1, 12, '963000.00', '0.00', 50, 1, '2022-02-01 13:09:20', '2022-02-01 13:09:20'),
(23, 1, 1, '96345', 1, NULL, 'Weekly', 1, 12, '963000.00', '0.00', 50, 1, '2022-02-01 13:11:25', '2022-02-01 13:11:25'),
(24, 1, 1, '96345', 1, NULL, 'Weekly', 1, 12, '963000.00', '0.00', 50, 1, '2022-02-01 13:12:00', '2022-02-01 13:12:00'),
(25, 1, 1, '96345', 1, NULL, 'Weekly', 1, 12, '963000.00', '0.00', 50, 1, '2022-02-01 13:12:47', '2022-02-01 13:12:47'),
(26, 1, 1, '96345', 1, NULL, 'Weekly', 1, 12, '963000.00', '0.00', 50, 1, '2022-02-01 13:49:23', '2022-02-01 13:49:23'),
(27, 1, 1, '1913700', 1, NULL, 'Weekly', 1, 12, '12000.00', '0.00', 50, 1, '2022-02-01 13:55:03', '2022-02-01 13:55:03'),
(28, 1, 1, '99999', 1, NULL, 'Bi weekly', 2, 24, '14000.00', '0.00', 50, 1, '2022-02-01 13:56:21', '2022-02-01 13:56:21'),
(29, 1, 1, '1546', 1, NULL, 'Monthly', 3, 36, '16000.00', '0.00', 50, 1, '2022-02-01 13:57:30', '2022-02-01 13:57:30'),
(30, 1, 1, '111101', 2, NULL, 'Weekly', 2, 24, '17000.00', '0.00', 40, 1, '2022-02-02 09:00:33', '2022-02-02 09:00:33'),
(31, 1, 1, '23135423', 2, NULL, 'Bi weekly', 3, 36, '20000.00', '0.00', 40, 1, '2022-02-03 10:32:39', '2022-02-03 10:32:39'),
(32, 1, 1, '966666', 1, NULL, 'Bi weekly', 3, 36, '15000.00', '0.00', 50, 1, '2022-02-03 10:34:59', '2022-02-03 10:34:59'),
(33, 1, 1, '23232', 1, NULL, 'Weekly', 3, 36, '12000.00', '0.00', 50, 1, '2022-02-05 09:23:57', '2022-02-05 09:23:57'),
(34, 1, 2, '966666', 2, NULL, 'Weekly', 3, 36, '12000.00', '0.00', 40, 1, '2022-02-06 10:52:25', '2022-02-06 10:52:25'),
(35, 1, 1, '123', 1, NULL, 'Weekly', 2, 24, '9000.00', '0.00', 50, 1, '2022-02-07 02:34:54', '2022-02-07 02:34:54'),
(36, 1, 1, '123', 1, NULL, 'Weekly', 2, 24, '12000.00', '0.00', 50, 1, '2022-02-07 02:36:03', '2022-02-07 02:36:03'),
(37, 1, 1, '123454', 1, NULL, 'Bi weekly', 2, 24, '3000.00', '0.00', 50, 1, '2022-02-07 02:40:22', '2022-02-07 02:40:22'),
(38, 1, 1, '912394544', 1, NULL, 'Bi weekly', 2, 24, '2000.00', '0.00', 50, 1, '2022-02-07 02:46:02', '2022-02-07 02:46:03'),
(39, 1, 1, '100021', 1, NULL, 'Bi weekly', 2, 24, NULL, '0.00', 50, 1, '2022-02-07 03:10:50', '2022-02-07 03:10:50'),
(40, 1, 1, '100021', 1, NULL, 'Bi weekly', 2, 24, '3000.00', '0.00', 50, 1, '2022-02-07 03:11:32', '2022-02-07 03:11:32'),
(41, 1, 1, '100021', 1, NULL, 'Bi weekly', 2, 24, '3000.00', '0.00', 50, 1, '2022-02-07 03:12:02', '2022-02-07 03:12:02'),
(42, 1, 1, '100021', 1, NULL, 'Bi weekly', 2, 24, '3000.00', '0.00', 50, 1, '2022-02-07 03:12:44', '2022-02-07 03:12:44'),
(43, 1, 1, '100021', 1, NULL, 'Bi weekly', 2, 24, '3000.00', '0.00', 50, 1, '2022-02-07 03:13:22', '2022-02-07 03:13:22'),
(44, 1, 7, '002165', 1, NULL, 'Bi weekly', 2, 24, '5000.00', '0.00', 50, 1, '2022-02-07 04:11:08', '2022-02-07 04:11:08'),
(45, 1, 9, '002165', 1, NULL, 'Bi weekly', 2, 24, '5000.00', '0.00', 50, 1, '2022-02-07 04:15:40', '2022-02-07 04:15:40'),
(46, 1, 1, '794613', 1, NULL, 'Weekly', 1, 12, '5000.00', '0.00', 50, 1, '2022-02-08 10:27:40', '2022-02-08 10:27:41'),
(47, 1, 1, '1913700', 1, NULL, 'Weekly', 2, 24, '100.00', '0.00', 50, 1, '2022-02-08 10:43:36', '2022-02-08 10:43:36'),
(48, 1, 1, '896523', 2, NULL, 'Monthly', 2, 24, '2000.00', '0.00', 40, 1, '2022-02-08 10:56:18', '2022-02-08 10:56:19'),
(49, 1, 1, '89898998', 2, NULL, 'Weekly', 3, 36, '20000.00', '0.00', 40, 1, '2022-02-11 10:36:03', '2022-02-11 10:36:04'),
(50, 1, 2, '78541', 1, NULL, 'Bi weekly', 2, 24, '1000.00', '0.00', 50, 1, '2022-02-11 10:40:42', '2022-02-11 10:40:42'),
(51, 1, 1, '98988', 1, NULL, 'Weekly', 3, 36, '2000.00', '0.00', 50, 1, '2022-02-11 11:49:42', '2022-02-11 11:49:42'),
(52, 1, 1, '45525', 1, NULL, 'Bi weekly', 3, 36, '8000.00', '0.00', 50, 1, '2022-02-11 11:51:52', '2022-02-11 11:51:53'),
(53, 1, 10, '22222', 1, NULL, 'Weekly', 2, 24, '1.00', '0.00', 50, 1, '2022-02-21 10:02:30', '2022-02-21 10:02:32'),
(54, 1, 10, '22222', 1, NULL, 'Weekly', 2, 24, '1.00', '0.00', 50, 1, '2022-02-21 10:02:33', '2022-02-21 10:02:33'),
(55, 1, 10, '22222', 1, NULL, 'Weekly', 2, 24, '1.00', '0.00', 50, 1, '2022-02-21 10:02:34', '2022-02-21 10:02:35'),
(56, 1, 10, '22222', 1, NULL, 'Weekly', 2, 24, '1.00', '0.00', 50, 1, '2022-02-21 10:02:37', '2022-02-21 10:02:37'),
(57, 1, 10, '22222', 1, NULL, 'Weekly', 1, 12, '19049.00', '0.00', 50, 1, '2022-02-21 10:26:59', '2022-02-21 10:26:59'),
(58, 1, 10, '121', 1, NULL, 'Weekly', 1, 12, '264.00', '0.00', 50, 1, '2022-02-21 10:28:54', '2022-02-21 10:28:54'),
(59, 1, 10, '121', 1, NULL, 'Weekly', 1, 12, '264.00', '0.00', 50, 1, '2022-02-21 10:28:57', '2022-02-21 10:28:57'),
(60, 1, 10, '1111', 1, NULL, 'Weekly', 1, 12, '77176.00', '0.00', 50, 1, '2022-02-21 10:30:02', '2022-02-21 10:30:02'),
(61, 1, 1, '45120', 1, NULL, 'Weekly', 1, 12, '4000.00', '0.00', 50, 1, '2022-03-12 14:42:05', '2022-03-12 14:42:06');

-- --------------------------------------------------------

--
-- Table structure for table `contract_products`
--

CREATE TABLE `contract_products` (
  `id` int(11) NOT NULL,
  `contract_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_description` varchar(5000) DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contract_products`
--

INSERT INTO `contract_products` (`id`, `contract_id`, `product_name`, `product_description`, `product_price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 'product3', 'hyiuhjk', '4546.00', NULL, '2022-01-25 11:30:05', '2022-01-25 11:30:05'),
(2, 1, 'product2', 'jhjhk', '889.00', NULL, '2022-01-25 11:30:06', '2022-01-25 11:30:06'),
(3, 2, 'p1', 'hgjgjgh', '121.00', NULL, '2022-01-25 11:39:02', '2022-01-25 11:39:02'),
(4, 3, 'qwwq', 'daf', '4354.00', NULL, '2022-01-29 11:59:23', '2022-01-29 11:59:23'),
(5, 4, 'product3', 'klnkhklmkn', '56.00', NULL, '2022-01-29 12:04:06', '2022-01-29 12:04:06'),
(6, 5, 'p5', 'asas', '98.00', NULL, '2022-01-29 12:05:55', '2022-01-29 12:05:55'),
(7, 6, 'p6', 'kjygkgkhj', '4545.00', NULL, '2022-01-29 12:08:13', '2022-01-29 12:08:13'),
(8, 7, 'sdsd', '2323232', '233.00', NULL, '2022-01-31 07:21:01', '2022-01-31 07:21:01'),
(9, 8, 'qwwq', 'hlunbgio/1245', '89986.00', NULL, '2022-01-31 07:35:24', '2022-01-31 07:35:24'),
(10, 9, 'as', 'aaaaaa', '132.00', NULL, '2022-02-01 10:39:05', '2022-02-01 10:39:05'),
(11, 10, 'as', 'aaaaaa', '132.00', NULL, '2022-02-01 10:42:51', '2022-02-01 10:42:51'),
(12, 11, 'as', 'aaaaaa', '132.00', NULL, '2022-02-01 10:46:57', '2022-02-01 10:46:57'),
(13, 12, 'as', 'aaaaaa', '132.00', NULL, '2022-02-01 10:50:12', '2022-02-01 10:50:12'),
(14, 13, 'as', 'aaaaaa', '132.00', NULL, '2022-02-01 10:51:39', '2022-02-01 10:51:39'),
(15, 14, 'as', 'aaaaaa', '132.00', NULL, '2022-02-01 10:58:16', '2022-02-01 10:58:16'),
(16, 15, 'as', 'aaaaaa', '132.00', NULL, '2022-02-01 10:59:42', '2022-02-01 10:59:42'),
(17, 16, 'as', 'aaaaaa', '132.00', NULL, '2022-02-01 10:59:59', '2022-02-01 10:59:59'),
(18, 17, 'as', 'aaaaaa', '132.00', NULL, '2022-02-01 11:00:51', '2022-02-01 11:00:51'),
(19, 18, 'as', 'aaaaaa', '132.00', NULL, '2022-02-01 11:02:54', '2022-02-01 11:02:54'),
(20, 19, 'as', 'aaaaaa', '132.00', NULL, '2022-02-01 11:24:13', '2022-02-01 11:24:13'),
(21, 20, 'as', 'aaaaaa', '132.00', NULL, '2022-02-01 11:24:40', '2022-02-01 11:24:40'),
(22, 21, 'p1', 'fdfdfdf', '34.00', NULL, '2022-02-01 13:08:19', '2022-02-01 13:08:19'),
(23, 22, 'product3', 'dlskdjsdjk', '43434.00', NULL, '2022-02-01 13:09:20', '2022-02-01 13:09:20'),
(24, 23, 'product3', 'dlskdjsdjk', '43434.00', NULL, '2022-02-01 13:11:25', '2022-02-01 13:11:25'),
(25, 24, 'product3', 'dlskdjsdjk', '43434.00', NULL, '2022-02-01 13:12:00', '2022-02-01 13:12:00'),
(26, 25, 'product3', 'dlskdjsdjk', '43434.00', NULL, '2022-02-01 13:12:47', '2022-02-01 13:12:47'),
(27, 26, 'product3', 'dlskdjsdjk', '43434.00', NULL, '2022-02-01 13:49:23', '2022-02-01 13:49:23'),
(28, 27, 'sssssss', 'sdjkkldf', '23.00', NULL, '2022-02-01 13:55:04', '2022-02-01 13:55:04'),
(29, 28, 'as', 'fdjflkd', '34.00', NULL, '2022-02-01 13:56:21', '2022-02-01 13:56:21'),
(30, 29, 'dw', 'dkw;dkw', '4556.00', NULL, '2022-02-01 13:57:30', '2022-02-01 13:57:30'),
(31, 30, 'ghhggh', 'jklgfdfghlhgfdf', '4545.00', NULL, '2022-02-02 09:00:34', '2022-02-02 09:00:34'),
(32, 31, 'product 1', 'aaaaaaaaaaaaaa', '500.00', 1500, '2022-02-03 10:32:40', '2022-02-03 10:32:40'),
(33, 31, 'product 2', 'aaaaaaaaaaaaa', '1200.00', 121, '2022-02-03 10:32:40', '2022-02-03 10:32:40'),
(34, 32, 'p1', 'aaaa', '10.00', 20, '2022-02-03 10:35:00', '2022-02-03 10:35:00'),
(35, 32, 'p2', 'bbbbbb', '20.00', 30, '2022-02-03 10:35:00', '2022-02-03 10:35:00'),
(36, 33, 'p1', 'It is a product', '6000.00', 2, '2022-02-05 09:23:57', '2022-02-05 09:23:57'),
(37, 34, 'p1', 'sdslkl', '13.00', 1312, '2022-02-06 10:52:25', '2022-02-06 10:52:25'),
(38, 35, 'p1', 'i am product', '300.00', 10, '2022-02-07 02:34:54', '2022-02-07 02:34:54'),
(39, 35, 'p2', 'i am product 2', '900.00', 10, '2022-02-07 02:34:54', '2022-02-07 02:34:54'),
(40, 36, 'p1', 'i am product', '300.00', 10, '2022-02-07 02:36:03', '2022-02-07 02:36:03'),
(41, 36, 'p2', 'sslkdj', '900.00', 10, '2022-02-07 02:36:03', '2022-02-07 02:36:03'),
(42, 37, 'p1', 'slkdjslkd', '200.00', 10, '2022-02-07 02:40:22', '2022-02-07 02:40:22'),
(43, 37, 'p2', 'slkdjsjdl;', '100.00', 10, '2022-02-07 02:40:22', '2022-02-07 02:40:22'),
(44, 38, 'p1', 'slkdjslkd', '200.00', 10, '2022-02-07 02:46:03', '2022-02-07 02:46:03'),
(45, 40, 'p2', 'lakjdl;s', '300.00', NULL, '2022-02-07 03:11:32', '2022-02-07 03:11:32'),
(46, 41, 'p2', 'lakjdl;s', '300.00', NULL, '2022-02-07 03:12:02', '2022-02-07 03:12:02'),
(47, 42, 'p2', 'lakjdl;s', '300.00', NULL, '2022-02-07 03:12:44', '2022-02-07 03:12:44'),
(48, 43, 'p2', 'lakjdl;s', '300.00', NULL, '2022-02-07 03:13:22', '2022-02-07 03:13:22'),
(49, 44, 'p12', 'jhghfjh', '20.00', NULL, '2022-02-07 04:11:08', '2022-02-07 04:11:08'),
(50, 44, 'p11', 'ifdfgkhlkhgfhdgfgdhhg', '30.00', NULL, '2022-02-07 04:11:08', '2022-02-07 04:11:08'),
(51, 45, 'p12', 'jhghfjh', '20.00', NULL, '2022-02-07 04:15:40', '2022-02-07 04:15:40'),
(52, 45, 'p11', 'ifdfgkhlkhgfhdgfgdhhg', '30.00', NULL, '2022-02-07 04:15:40', '2022-02-07 04:15:40'),
(53, 46, 'p454', ',dskjcl', '500.00', 10, '2022-02-08 10:27:41', '2022-02-08 10:27:41'),
(54, 47, 'asas', 'jdshdjh', '10.00', 10, '2022-02-08 10:43:36', '2022-02-08 10:43:36'),
(55, 48, 'j5s', 'asdfghjkl;', '200.00', 10, '2022-02-08 10:56:18', '2022-02-08 10:56:18'),
(56, 49, 'priduct', 'lksdjlskd', '200.00', 100, '2022-02-11 10:36:04', '2022-02-11 10:36:04'),
(57, 50, 'product3', 'hfgjhkjjkh', '100.00', NULL, '2022-02-11 10:40:42', '2022-02-11 10:40:42'),
(58, 51, 'as', 'jhghgjgh', '200.00', 10, '2022-02-11 11:49:42', '2022-02-11 11:49:42'),
(59, 52, 'product3', 'sdfghjkl', '80.00', 100, '2022-02-11 11:51:53', '2022-02-11 11:51:53'),
(60, 53, 'product 1', '1', '1.00', 1, '2022-02-21 10:02:31', '2022-02-21 10:02:31'),
(61, 54, 'product 1', '1', '1.00', 1, '2022-02-21 10:02:33', '2022-02-21 10:02:33'),
(62, 55, 'product 1', '1', '1.00', 1, '2022-02-21 10:02:34', '2022-02-21 10:02:34'),
(63, 56, 'product 1', '1', '1.00', 1, '2022-02-21 10:02:37', '2022-02-21 10:02:37'),
(64, 57, '2323', '11', '43.00', NULL, '2022-02-21 10:26:59', '2022-02-21 10:26:59'),
(65, 58, '21', '121', '22.00', NULL, '2022-02-21 10:28:54', '2022-02-21 10:28:54'),
(66, 59, '21', '121', '22.00', NULL, '2022-02-21 10:28:57', '2022-02-21 10:28:57'),
(67, 60, 'product3', 'ggugg', '877.00', NULL, '2022-02-21 10:30:02', '2022-02-21 10:30:02'),
(68, 61, 'test', 'sdkhsldlks', '200.00', 20, '2022-03-12 14:42:06', '2022-03-12 14:42:06');

-- --------------------------------------------------------

--
-- Table structure for table `contract_type`
--

CREATE TABLE `contract_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `interest_rate` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contract_type`
--

INSERT INTO `contract_type` (`id`, `name`, `interest_rate`, `created_at`, `updated_at`) VALUES
(1, 'lease', 50, '2021-12-18 12:17:31', '2022-01-30 05:47:30'),
(2, 'loan', 40, '2021-12-18 12:17:31', '2022-02-21 11:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `home_contact` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `ssn` varchar(255) DEFAULT NULL,
  `drive_license_number` varchar(255) DEFAULT NULL,
  `liscense_issue_date` varchar(255) DEFAULT NULL,
  `license_expiry` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `home_type` tinyint(4) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `license_copy_img` varchar(500) DEFAULT NULL,
  `signature` varchar(10000) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `token` varchar(255) DEFAULT NULL,
  `is_bank_verified` tinyint(4) NOT NULL DEFAULT 0,
  `is_verified` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `password`, `contact`, `home_contact`, `dob`, `ssn`, `drive_license_number`, `liscense_issue_date`, `license_expiry`, `street`, `city`, `state`, `zip`, `country`, `home_type`, `image`, `license_copy_img`, `signature`, `status`, `token`, `is_bank_verified`, `is_verified`, `created_at`, `updated_at`) VALUES
(1, 'Aasd', 'asadking066@gmail.com', '$2y$10$JGWPEwfF9UApm52S/bV8n.Sfxei3nREn38QrvyyoGeMtOF2vz3Lu.', '123-456-7890', '098-765-4321', '2022-01-26', '111-11-1111', 'li1223aab', '2020-02-05', '2022-01-24', 'street', 'city', 'state', 1111, 'country', 1, 'customer_profile_picture/q4DUBXxgAK1FsHpdUGITRZs54xPRzeXttfhPIXPx.jpg', 'customer_license_picture/8YZKANH8qjgrfU4bzWwVo6orM4dcWk5KZNJEVghF.png', 'data:image/png;base64,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', 1, 'null', 1, 1, '2022-01-25 11:10:01', '2022-04-03 14:36:50'),
(2, 'Ahmad', 'ahmad@gmail.com', '$2y$10$JGWPEwfF9UApm52S/bV8n.Sfxei3nREn38QrvyyoGeMtOF2vz3Lu.', '123-456-78__', '123-456-78__', '2022-01-31', '989-89-8898', 'li1223aaac', '2022-01-17', '2022-01-21', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', 0, 'customer_profile_picture/lVbyQCUi6BcGoIrD25XppPKQ7r8N3LguquRHIavA.png', 'customer_license_picture/nN1m0GVoHAT08Z4KBuNNfKMJ13TG3JsnIM2hsiJm.png', 'data:image/png;base64,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', 1, 'null', 1, 1, '2022-01-25 11:30:04', '2022-04-03 14:42:10'),
(4, 'ali', 'muzammil@gmail.com', '100', '123-456-78__', '454-544-5454', '2022-01-22', '998-88-5522', 'li1223aaaa', '2022-01-11', '2022-01-17', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', 1, 'customer_profile_picture/tyCMZQ5BtoHpW0ft3gFENbE3yJJCksbLSn5i2dbe.jpg', 'customer_license_picture/UkIhlilMzoP2n813G61PPedZj5wBFnjOiqKrR7Ge.png', NULL, 1, NULL, 0, 0, '2022-01-29 12:04:05', '2022-01-29 12:04:06'),
(5, 'umer', 'iam.umerrajpoot2@gmail.com', '$2y$10$CjqJ/KeZNM3bxFRlsT1s2eLa5ci2bUDU4KL8V3HXjsuK0r1RnHyAW', '123-456-78__', '123-456-78__', '2022-01-26', '555-55-5555', 'lnn', '2022-02-01', '2022-02-01', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', 0, 'customer_profile_picture/vsG71XFCTb8wMXrDUP5I8O3lqFcZDsCDAAZN39kY.png', 'customer_license_picture/UQfqXLsEdDO1jqW6B4p7ARyahtqhECJrf6PpSdQr.png', NULL, 1, NULL, 0, 0, '2022-01-31 07:20:58', '2022-01-31 12:25:24'),
(6, 'umer', 'iam.umerrajpoot@gmail.com', '$2y$10$bnmuqqATfjedE9n5GHPPT.gNMSwvJKgQGsTXiVVw484Zz4jM/10E2', '123-456-78__', '123-456-78__', '2022-01-25', '666-65-5555', '78sslshs', '2022-01-26', '2022-01-17', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', 1, 'customer_profile_picture/3qA2NByuU7JLZlNmjD2VtyHFnGmoeXR4wvtVAxu4.jpg', 'customer_license_picture/ZD3SrFAjsf0G2GyuXYj7Q7SQTQTtKQMyb6Phj9gt.png', 'data:image/png;base64,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', 1, NULL, 0, 0, '2022-01-31 07:35:23', '2022-01-31 07:35:23'),
(7, 'ahsan', 'ahsan12@gmail.com', '$2y$10$VkIRgGCWRjrGYrrZQoZJHOEX/Hu0Syu1zOwh0kxSPemwxJpqbCQ2.', '122-222-3313', '112-132-1654', '2022-02-08', '325-128-9878', 'ahsa12n13456', '2022-03-01', '2022-03-01', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', 0, 'customer_profile_picture/CrclFCyLLHSrx4BYnAlKxcQSGrJIphNSZQVmDDBH.jpg', 'customer_license_picture/JpSPpJewzG8HLsCUcMrEhEvYpRpmilh4lpZ0OFxm.jpg', 'data:image/png;base64,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', 1, NULL, 0, 0, '2022-02-07 04:11:06', '2022-02-07 09:13:56'),
(8, 'ahsan', 'ahsa32n@gmail.com', '$2y$10$7KD0CLUTqcDNz/mNus5pOOY2XeZuEP5SS8wAv71pXgfaMuJzpSUlC', '122-222-3313', '112-132-1654', '2022-02-08', '325-68-987852', 'ahsan6313456', '2022-03-01', '2022-03-01', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', 0, NULL, NULL, 'data:image/png;base64,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', 1, NULL, 0, 0, '2022-02-07 04:14:04', '2022-02-07 09:14:43'),
(9, 'ahsan', 'ahsan@gmail.com', '$2y$10$JGWPEwfF9UApm52S/bV8n.Sfxei3nREn38QrvyyoGeMtOF2vz3Lu.', '122-222-3313', '112-132-1654', '2022-02-08', '325-68-9878', 'ahsan13456', '2022-03-01', '2022-03-01', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', 0, 'customer_profile_picture/uLKX79jCdWXl02mQFwpi9kX26sRcqUTqcVa44CUf.jpg', 'customer_license_picture/m1lEBFgpNWJUY1WJQ8DN2jFTEiHkmRXJx1vR6cfa.jpg', 'data:image/png;base64,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', 1, 'null', 0, 1, '2022-02-07 04:15:40', '2022-02-07 04:17:35'),
(10, 'Hammad', 'compind1@gmail.com', '$2y$10$O0aW3dMwubQwUpg5oWDRvO57zkOPqUw66UX1sOBiXeB5BXfhrZgJ6', '123-456-78__', '435-545-3345', '2022-02-23', '545-65-6543', '435445354', '2022-02-01', '2022-02-26', '1', '1', '1', 1, '1', 1, 'customer_profile_picture/rRyHxNx87BGd2fgK58CopSPurjuEu4Xu6JN2Oxok.jpg', 'customer_license_picture/uY9akNaZqDPuVh8bDygx93RnOstR0EdtDH79lfHh.png', 'data:image/png;base64,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', 1, 'null', 0, 1, '2022-02-21 09:47:20', '2022-02-21 10:00:43'),
(11, 'one', 'one@gmail.com', '$2y$10$b5N.LPxTB//HaQL4/T29sOJPxBnSAkU2w4q38drI4DokDr5aW8g02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'customer_profile_picture/GX3ivaoXrmlsvmY7ZsasW47KP4WgS7UFV5dqWAmI.jpg', 'customer_license_picture/SWCeUvKUQ1uNAWdtrZFqeLlEdY5THYAqYqubD1Gb.jpg', NULL, 1, 'null', 0, 1, '2022-02-21 12:55:01', '2022-02-21 12:58:42'),
(12, 'ind 1', 'ind1@gmail.com', '$2y$10$w2bu.KV8Y3G/L45NsCEucOjBNQjMgdqwXajRNAIvPldAApC511zZy', '123-456-78__', '123-456-78__', '2022-04-12', '788-00-7878', 'li1223aabc45', '2022-04-22', '2022-04-17', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', 0, 'customer_profile_picture/Ung6RvejMDu1N7sqofvZ7caT7kyN6cJjWTHjwsa0.png', 'customer_license_picture/MT45OcS1L8zdoFCs5LFM15doIGGeZ0lzRZA8SsqQ.png', 'data:image/png;base64,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', 1, NULL, 0, 0, '2022-04-03 05:25:52', '2022-04-03 10:42:02');

-- --------------------------------------------------------

--
-- Table structure for table `customer_bank`
--

CREATE TABLE `customer_bank` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_contact` varchar(255) DEFAULT NULL,
  `bank_routing` int(11) DEFAULT NULL,
  `account_type` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `account_open_date` varchar(255) DEFAULT NULL,
  `card_type` varchar(255) DEFAULT NULL,
  `card_number` varchar(255) DEFAULT NULL,
  `card_expiry` varchar(255) DEFAULT NULL,
  `card_cvv` int(11) DEFAULT NULL,
  `bank_city` varchar(255) DEFAULT NULL,
  `bank_state` varchar(255) DEFAULT NULL,
  `bank_zip` int(11) DEFAULT NULL,
  `bank_access_token` varchar(250) NOT NULL,
  `bank_stripe_customer_ach` varchar(250) NOT NULL,
  `is_bank_verified` smallint(6) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_bank`
--

INSERT INTO `customer_bank` (`id`, `customer_id`, `bank_name`, `bank_contact`, `bank_routing`, `account_type`, `account_number`, `account_open_date`, `card_type`, `card_number`, `card_expiry`, `card_cvv`, `bank_city`, `bank_state`, `bank_zip`, `bank_access_token`, `bank_stripe_customer_ach`, `is_bank_verified`, `created_at`, `updated_at`) VALUES
(1, 1, 'bankname', '123-456-7812', 1122, 'checking', '9638794657985', '2021-05', 'visa', '4242424242424242', '2022-07', 123, 'city', NULL, 52250, 'access-sandbox-4b44fb12-3252-4d45-a4dc-52b14893f929', 'cus_LRJl6x63RkIzjf', 1, '2022-01-25 11:17:22', '2022-04-03 14:42:22'),
(2, 2, 'bankname', '123-456-78__', 123, 'checking', '13445454545964', '2022-10', 'visa', '778710101324', '2022-10', 4596, 'city', 'pun', 52250, 'access-sandbox-9e5943b6-e029-4fc5-8fee-fbf86acdb7b5', 'cus_LRNEiBZ3lmaAxY', 1, '2022-01-25 11:30:05', '2022-04-03 09:32:46'),
(3, 4, 'bankname', '123-456-78__', 1122, 'saving', '9639878414', '2022-10', 'master card', '20321256152021', '2022-07', 132, 'city', 'pun', 52250, '', '', 0, '2022-01-29 12:04:05', '2022-03-27 16:15:06'),
(4, 5, 'Allied', '123-456-78__', 1122, 'checking', '963852741', '2022-10', 'amex', '887678985', '2022-07', 96636, 'city', 'pun', 52250, '', '', 0, '2022-01-31 07:20:59', '2022-03-27 16:15:06'),
(5, 6, 'Allied', '123-456-78__', 123, 'checking', '134450000hj64', '2022-09', 'amex', '798465123', '2022-06', 7946, 'city', 'pun', 52250, '', '', 0, '2022-01-31 07:35:23', '2022-03-27 16:15:06'),
(6, 7, 'bankname', '123-456-78__', 789, 'checking', '9876454513', '2022-06', 'visa', '4242454683', '2022-06', 963, 'city', 'pun', 52250, '', '', 0, '2022-02-07 04:11:07', '2022-03-27 16:15:06'),
(8, 9, 'bankname', '123-456-78__', 789, 'checking', '987645451328', '2022-06', 'visa', '424245468343', '2022-06', 963, 'city', 'pun', 52250, '', '', 0, '2022-02-07 04:15:40', '2022-03-27 16:15:06'),
(9, 12, 'Allied', '123-456-78__', 1122, 'saving', '96385274100', '2022-09', 'master card', '781074100', '2022-06', 8787, 'city', 'pun', 52250, '', '', 0, '2022-04-03 05:25:52', '2022-04-03 05:25:52');

-- --------------------------------------------------------

--
-- Table structure for table `customer_docs`
--

CREATE TABLE `customer_docs` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `contract_id` int(11) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer_income`
--

CREATE TABLE `customer_income` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `employer_name` varchar(255) DEFAULT NULL,
  `employer_city` varchar(255) DEFAULT NULL,
  `employer_state` varchar(255) DEFAULT NULL,
  `employer_zip` int(11) DEFAULT NULL,
  `employer_contact` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `direct_desposit` varchar(10) DEFAULT NULL,
  `income` decimal(10,2) DEFAULT NULL,
  `last_pay_date` date DEFAULT NULL,
  `next_pay_date` date DEFAULT NULL,
  `paid_time` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_income`
--

INSERT INTO `customer_income` (`id`, `customer_id`, `employer_name`, `employer_city`, `employer_state`, `employer_zip`, `employer_contact`, `profession`, `join_date`, `direct_desposit`, `income`, `last_pay_date`, `next_pay_date`, `paid_time`, `created_at`, `updated_at`) VALUES
(1, 1, 'zubair', 'city', 'pun', 52250, '123-456-7889', 'saleman', '2022-01-18', '1', '80000.00', '2022-01-15', '2022-01-30', '7', '2022-01-25 11:17:22', '2022-02-23 10:58:38'),
(2, 2, 'zubair', 'city', 'pun', 52250, '123-456-78__', 'salesman', '2022-01-15', '1', '889000.00', '2022-01-18', '2022-01-27', '7', '2022-01-25 11:30:05', '2022-02-06 10:51:46'),
(3, 4, 'Zain', 'city', 'pun', 52250, '123-456-78__', 'salesman', '2022-02-01', '0', '343434.00', '2022-01-26', '2022-01-13', 'Monthly', '2022-01-29 12:04:05', '2022-01-29 12:04:05'),
(4, 5, 'Zain', 'city', 'pun', 52250, '123-456-78__', 'salesman', '2022-01-26', '1', '546464.00', '2022-01-18', '2022-01-04', 'Weekly', '2022-01-31 07:20:59', '2022-01-31 07:20:59'),
(5, 6, 'Zain', 'city', 'pun', 52250, '123-456-78__', 'salesman', '2022-02-02', '1', '5000.00', '2021-12-31', '2022-01-04', 'Weekly', '2022-01-31 07:35:23', '2022-01-31 07:35:23'),
(6, 7, 'emp name', 'city', 'pun', 52250, '123-456-78__', 'salesman', '2022-02-24', '1', '343434.00', '2022-02-15', '2022-02-02', 'Bi Weekly', '2022-02-07 04:11:07', '2022-02-07 04:11:07'),
(7, 9, 'emp name', 'city', 'pun', 52250, '123-456-78__', 'salesman', '2022-02-24', '1', '343434.00', '2022-02-15', '2022-02-02', 'Bi Weekly', '2022-02-07 04:15:40', '2022-02-07 04:15:40'),
(8, 10, 'emp name', 'city', 'pun', 52250, '234-255-5555', 'profession', '2022-02-24', '1', '80000.00', '2022-02-10', '2022-02-03', '7', '2022-02-21 09:59:56', '2022-02-21 10:00:44'),
(9, 12, 'Zain', 'city', 'pun', 52250, '123-456-78__', 'salesman', '2022-04-30', '1', '343434.00', '2022-04-25', '2022-04-29', 'Bi Weekly', '2022-04-03 05:25:52', '2022-04-03 05:25:52');

-- --------------------------------------------------------

--
-- Table structure for table `customer_notes`
--

CREATE TABLE `customer_notes` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `notes` varchar(5000) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_notes`
--

INSERT INTO `customer_notes` (`id`, `customer_id`, `title`, `notes`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'customer notes', 'note detail to do', 0, '2022-01-25 11:19:39', '2022-01-25 11:19:51'),
(2, 10, '1', '1', 1, '2022-02-21 10:11:39', '2022-02-21 10:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `customer_relatives`
--

CREATE TABLE `customer_relatives` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `relative_name` varchar(255) DEFAULT NULL,
  `relative_city` varchar(255) DEFAULT NULL,
  `relative_state` varchar(255) DEFAULT NULL,
  `relative_zip` int(11) DEFAULT NULL,
  `relative_contact` varchar(255) DEFAULT NULL,
  `relationship` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_relatives`
--

INSERT INTO `customer_relatives` (`id`, `customer_id`, `relative_name`, `relative_city`, `relative_state`, `relative_zip`, `relative_contact`, `relationship`, `created_at`, `updated_at`) VALUES
(5, 4, 'relative 1', 'city', 'pun', 52250, '123-456-78__', 'brother', '2022-01-29 12:04:05', '2022-01-29 12:04:05'),
(6, 4, 'Sajjad', 'city', 'pun', 52250, '123-456-78__', 'relation2', '2022-01-29 12:04:05', '2022-01-29 12:04:05'),
(7, 5, 'Muzammil', 'city', 'pun', 52250, '123-456-78__', 'brother', '2022-01-31 07:20:58', '2022-01-31 07:20:58'),
(8, 5, 'Sajjad', 'city', 'pun', 52250, '123-456-78__', 'son', '2022-01-31 07:20:58', '2022-01-31 07:20:58'),
(9, 6, 'Muzammil', 'city', 'pun', 52250, '123-456-78__', 'relation', '2022-01-31 07:35:23', '2022-01-31 07:35:23'),
(10, 6, 'relative2', 'city', 'pun', 52250, '123-456-78__', 'relation2', '2022-01-31 07:35:23', '2022-01-31 07:35:23'),
(11, 2, 'relative 1', 'city', 'pun', 52250, '123-456-78__', 'relation', '2022-02-06 10:51:46', '2022-02-06 10:51:46'),
(12, 2, 'relative2', 'city', 'pun', 52250, '123-456-78__', 'son', '2022-02-06 10:51:46', '2022-02-06 10:51:46'),
(13, 7, 'Muzammil', 'city', 'pun', 52250, '123-456-78__', 'brother', '2022-02-07 04:11:07', '2022-02-07 04:11:07'),
(14, 7, 'Sajjad', 'city', 'pun', 52250, '123-456-78__', 'son', '2022-02-07 04:11:07', '2022-02-07 04:11:07'),
(15, 8, 'Muzammil', 'city', 'pun', 52250, '123-456-78__', 'brother', '2022-02-07 04:14:05', '2022-02-07 04:14:05'),
(16, 8, 'Sajjad', 'city', 'pun', 52250, '123-456-78__', 'son', '2022-02-07 04:14:05', '2022-02-07 04:14:05'),
(17, 9, 'Muzammil', 'city', 'pun', 52250, '123-456-78__', 'brother', '2022-02-07 04:15:40', '2022-02-07 04:15:40'),
(18, 9, 'Sajjad', 'city', 'pun', 52250, '123-456-78__', 'son', '2022-02-07 04:15:40', '2022-02-07 04:15:40'),
(21, 10, 'Muzammil', 'city', 'pun', 52250, '123-456-78__', 'relation', '2022-02-21 10:00:43', '2022-02-21 10:00:43'),
(22, 10, 'sajjad', '5324545432', 'pun', 52250, '344-324-5424', '2552525', '2022-02-21 10:00:43', '2022-02-21 10:00:43'),
(25, 1, 'Muzammil', 'city', 'pun', 52250, '123-456-78__', 'brother', '2022-02-23 10:58:38', '2022-02-23 10:58:38'),
(26, 1, 'Sajjad', 'city', 'pun', 52250, '123-456-7899', 'brother', '2022-02-23 10:58:38', '2022-02-23 10:58:38'),
(27, 12, 'Muzammil', 'city', 'pun', 52250, '123-456-789_', 'hsdgv', '2022-04-03 05:25:52', '2022-04-03 05:25:52'),
(28, 12, 'relative2454', 'city', 'pun', 52250, '123-456-789_', '2552525', '2022-04-03 05:25:52', '2022-04-03 05:25:52');

-- --------------------------------------------------------

--
-- Table structure for table `customer_ticket`
--

CREATE TABLE `customer_ticket` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `ticket_category_id` int(11) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `description` varchar(5000) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `ticket_status_id` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_ticket`
--

INSERT INTO `customer_ticket` (`id`, `customer_id`, `ticket_category_id`, `subject`, `description`, `document`, `ticket_status_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'customer ticket', 'description', NULL, 2, '2022-01-25 11:18:49', '2022-02-21 10:42:41'),
(2, 10, 1, '1', '1', NULL, 3, '2022-02-21 10:06:43', '2022-02-21 10:42:51'),
(3, 1, 6, 'ss', '1', NULL, 1, '2022-02-21 12:52:15', '2022-02-21 12:52:15');

-- --------------------------------------------------------

--
-- Table structure for table `customer_ticket_docs`
--

CREATE TABLE `customer_ticket_docs` (
  `id` int(11) NOT NULL,
  `document` varchar(255) DEFAULT NULL,
  `customer_ticket_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_ticket_docs`
--

INSERT INTO `customer_ticket_docs` (`id`, `document`, `customer_ticket_id`, `created_at`, `updated_at`) VALUES
(1, 'customer_ticket_docs/YAsvYeZbNTHYLHHVxRMxfCIm3ZdzzWh44rQMZpZK.png', 1, '2022-01-25 11:18:49', '2022-01-25 11:18:49'),
(2, 'customer_ticket_docs/MrZIJ0q4RkfBRtM2u3dL28Qe0cjVX028x72Q9Yrn.png', 2, '2022-02-21 10:06:43', '2022-02-21 10:06:43'),
(3, 'customer_ticket_docs/xS634hqeYi93LtwDRUNQVgYsCPItsUw9hwJzzHYo.jpg', 3, '2022-02-21 12:52:15', '2022-02-21 12:52:15');

-- --------------------------------------------------------

--
-- Table structure for table `customer_transaction`
--

CREATE TABLE `customer_transaction` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `contract_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `is_bank_transaction` tinyint(4) NOT NULL DEFAULT 0,
  `is_card_transaction` tinyint(4) NOT NULL DEFAULT 0,
  `transaction_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_transaction`
--

INSERT INTO `customer_transaction` (`id`, `invoice_id`, `contract_id`, `amount`, `is_bank_transaction`, `is_card_transaction`, `transaction_id`, `created_at`, `updated_at`) VALUES
(6, 2, 47, '32.46', 0, 0, 'ch_3KShxdF40gdBNDIa03U7nD6x', '2022-02-13 08:17:56', '2022-02-13 08:17:56'),
(7, 2, NULL, '100.00', 1, 0, 'py_1Kk1NwCFsM3hFkAbLuFS1wyw', '2022-04-02 02:28:36', '2022-04-02 02:28:36'),
(8, 2, NULL, '100.00', 1, 0, 'py_1KkR8JCFsM3hFkAb08fP5Sod', '2022-04-03 05:58:13', '2022-04-03 05:58:13'),
(9, 2, NULL, '100.00', 1, 0, 'py_1KkRQgCFsM3hFkAbxhs7cOqU', '2022-04-03 06:17:11', '2022-04-03 06:17:11'),
(10, 2, NULL, '100.00', 1, 0, 'py_1KkUTxCFsM3hFkAbmk9BRLcq', '2022-04-03 09:32:47', '2022-04-03 09:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `dealer`
--

CREATE TABLE `dealer` (
  `id` int(11) NOT NULL,
  `owner_name` varchar(255) DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `ein` varchar(255) DEFAULT NULL,
  `shop_address` varchar(255) DEFAULT NULL,
  `shop_city` varchar(255) DEFAULT NULL,
  `shop_state` varchar(255) DEFAULT NULL,
  `shop_zip` int(11) DEFAULT NULL,
  `shop_country` varchar(255) DEFAULT NULL,
  `tax_certificate_doc` varchar(255) DEFAULT NULL,
  `shop_logo` varchar(265) DEFAULT NULL,
  `shop_contact` varchar(255) DEFAULT NULL,
  `signature` varchar(10000) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(11) NOT NULL DEFAULT 0,
  `token` varchar(265) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dealer`
--

INSERT INTO `dealer` (`id`, `owner_name`, `shop_name`, `email`, `password`, `ein`, `shop_address`, `shop_city`, `shop_state`, `shop_zip`, `shop_country`, `tax_certificate_doc`, `shop_logo`, `shop_contact`, `signature`, `status`, `is_verified`, `token`, `created_at`, `updated_at`) VALUES
(1, 'Ali', 'Bonanza', 'asadking066@gmail.com', '$2y$10$TH06pFHR/IvIR68esvc5m.5IEN7bOnWwTPUSUVN4eqfARRnEDllOm', '99-9999999', 'street', 'city', 'state', 1, 'country', 'dealer_tax_picture/Gkae4KkPRVADA3mNrjwPQqzt9RkJVdsuYVuNZrhn.png', 'dealer_companylogo/vO7YUN2bTfb2qCzD8bRV1MDTUJkO9oIDXgWeWVpl.png', '797-979-7797', 'data:image/png;base64,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', 1, 1, NULL, '2022-01-25 11:22:08', '2022-02-21 10:25:31'),
(2, 'hammad', 'aaaa', 'hmmad@gmail.com', NULL, '88-8888888', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', 'dealer_tax_picture/8VhstlCwL0RhM3627pwi0fxNMb1POpM9VqufIJIH.jpg', 'dealer_companylogo/HTcOELLJENgDKVpJarfKZCSiJoXNwqSA2m7uI9IW.png', '123-456-78__', 'data:image/png;base64,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', 1, 0, NULL, '2022-02-21 12:29:41', '2022-02-23 16:08:58');

-- --------------------------------------------------------

--
-- Table structure for table `dealer_bank`
--

CREATE TABLE `dealer_bank` (
  `id` int(11) NOT NULL,
  `dealer_id` int(11) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `account_type` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `card_type` varchar(255) DEFAULT NULL,
  `card_number` varchar(255) DEFAULT NULL,
  `card_expiry` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dealer_bank`
--

INSERT INTO `dealer_bank` (`id`, `dealer_id`, `bank_name`, `account_type`, `account_number`, `card_type`, `card_number`, `card_expiry`, `created_at`, `updated_at`) VALUES
(14, 1, 'UBL', 'checking', '999456454255', 'visa', '95135745682', '2022-03-12', '2022-02-21 10:25:32', '2022-02-21 10:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `dealer_docs`
--

CREATE TABLE `dealer_docs` (
  `id` int(11) NOT NULL,
  `dealer_id` int(11) DEFAULT NULL,
  `contract_id` int(11) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dealer_invoices`
--

CREATE TABLE `dealer_invoices` (
  `id` int(11) NOT NULL,
  `dealer_id` int(11) DEFAULT NULL,
  `contract_id` int(11) DEFAULT NULL,
  `uig_fee` decimal(10,2) DEFAULT NULL,
  `processing_fee` decimal(10,2) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `paid_date` date DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dealer_invoices`
--

INSERT INTO `dealer_invoices` (`id`, `dealer_id`, `contract_id`, `uig_fee`, `processing_fee`, `amount`, `paid_date`, `status`, `created_at`, `updated_at`) VALUES
(4, 1, 52, '140.00', '59.04', '7380.60', NULL, 1, '2022-02-11 11:49:52', '2022-02-13 14:00:24'),
(5, 1, 52, '59.04', '619.40', '7380.60', NULL, 0, '2022-02-11 11:51:58', '2022-02-11 11:51:58'),
(6, 1, 53, '59.47', '59.04', '-58.47', NULL, 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(7, 1, 54, '59.47', '59.04', '-58.47', NULL, 0, '2022-02-21 10:02:46', '2022-02-21 10:02:46'),
(8, 1, 55, '59.47', '59.04', '-58.47', NULL, 0, '2022-02-21 10:02:48', '2022-02-21 10:02:48'),
(9, 1, 56, '59.47', '59.04', '-58.47', NULL, 0, '2022-02-21 10:02:50', '2022-02-21 10:02:50'),
(10, 1, 57, '1392.83', '59.04', '17656.17', NULL, 0, '2022-02-21 10:26:59', '2022-02-21 10:26:59'),
(11, 1, 58, '77.88', '59.04', '186.12', NULL, 0, '2022-02-21 10:28:54', '2022-02-21 10:28:54'),
(12, 1, 59, '77.88', '59.04', '186.12', NULL, 0, '2022-02-21 10:28:57', '2022-02-21 10:28:57'),
(13, 1, 60, '5461.72', '59.04', '71714.28', NULL, 0, '2022-02-21 10:30:02', '2022-02-21 10:30:02'),
(14, 1, 61, '339.40', '59.04', '3660.60', NULL, 0, '2022-03-12 14:42:08', '2022-03-12 14:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `dealer_notes`
--

CREATE TABLE `dealer_notes` (
  `id` int(11) NOT NULL,
  `dealer_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `notes` varchar(5000) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dealer_notes`
--

INSERT INTO `dealer_notes` (`id`, `dealer_id`, `title`, `notes`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'notes', 'description', 1, '2022-01-25 11:34:43', '2022-01-25 11:35:06'),
(2, 1, '1', '1', 0, '2022-02-21 10:36:31', '2022-02-21 10:36:31');

-- --------------------------------------------------------

--
-- Table structure for table `dealer_ticket`
--

CREATE TABLE `dealer_ticket` (
  `id` int(11) NOT NULL,
  `dealer_id` int(11) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `description` varchar(5000) DEFAULT NULL,
  `ticket_category_id` int(11) DEFAULT NULL,
  `ticket_status_id` int(11) NOT NULL DEFAULT 1,
  `document` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dealer_ticket`
--

INSERT INTO `dealer_ticket` (`id`, `dealer_id`, `subject`, `description`, `ticket_category_id`, `ticket_status_id`, `document`, `created_at`, `updated_at`) VALUES
(1, 1, 'subject', 'hjdhfhjdk', 1, 1, NULL, '2022-01-25 11:34:05', '2022-01-25 11:34:05'),
(2, 1, 'ghjghjghgj', '1', 1, 1, NULL, '2022-02-21 10:33:00', '2022-02-21 10:33:00'),
(3, 1, 'one', 'one', 1, 1, NULL, '2022-02-21 10:33:48', '2022-02-21 10:33:48'),
(4, 1, 'tic', 'clas', 1, 1, NULL, '2022-04-02 02:45:27', '2022-04-02 02:45:27');

-- --------------------------------------------------------

--
-- Table structure for table `dealer_ticket_docs`
--

CREATE TABLE `dealer_ticket_docs` (
  `id` int(11) NOT NULL,
  `document` varchar(255) DEFAULT NULL,
  `dealer_ticket_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dealer_ticket_docs`
--

INSERT INTO `dealer_ticket_docs` (`id`, `document`, `dealer_ticket_id`, `created_at`, `updated_at`) VALUES
(1, 'dealer_ticket_docs/McOF3apY2OTSLhYvx8PrmRWpETi5V17JuTBZRCaZ.png', 1, '2022-01-25 11:34:05', '2022-01-25 11:34:05'),
(2, 'dealer_ticket_docs/kIA6FrlvoMN2LzpC9hgCNQOJxJ43OqVX75fwF2CC.png', 2, '2022-02-21 10:33:01', '2022-02-21 10:33:01'),
(3, 'dealer_ticket_docs/1OqFu8zQXk0r4scWjfzAUkuFBoFv91XVHKP3p1Yt.svg', 3, '2022-02-21 10:33:48', '2022-02-21 10:33:48'),
(4, 'dealer_ticket_docs/0ELGOw3wy4Ov1nIr4XiKAnDBGlQ44ydx54U9DMQq.png', 3, '2022-02-21 10:35:43', '2022-02-21 10:35:43'),
(5, 'dealer_ticket_docs/EeGyQZDS9CYmdUeBl7LjY9VmJD493BsaaTSq9mwx.png', 4, '2022-04-02 02:45:27', '2022-04-02 02:45:27');

-- --------------------------------------------------------

--
-- Table structure for table `dealer_transaction`
--

CREATE TABLE `dealer_transaction` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `contract_id` int(11) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `transaction_id` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dealer_transaction`
--

INSERT INTO `dealer_transaction` (`id`, `invoice_id`, `contract_id`, `amount_paid`, `transaction_id`, `created_at`, `updated_at`) VALUES
(1, 4, 52, '7380.60', 'ch_kajhsjakdsjkdksbk', '2022-02-13 13:28:45', '2022-02-13 13:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `ssn` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `token` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `password`, `contact`, `address`, `city`, `state`, `zip`, `country`, `ssn`, `image`, `role_id`, `status`, `token`, `created_at`, `updated_at`) VALUES
(2, 'asad', 'asadking066@gmail.com', '$2y$10$LADKyUXr6NjqWqjjE46ce.PC6zuN/r6pgJ7SRMR4Q2he51kUo/1be', '222-222-2222', 'address', 'ssss', 'state', 1111, 'country', '111-11-1112', 'employee_profile_pic/XC06FAlGvodjHp5kLkyi9pA4KWTEw82dquHD0spC.jpg', 4, 1, NULL, '2021-12-29 09:50:47', '2022-01-25 11:55:20'),
(3, 'admin', 'admin@gmail.com', '$2y$10$eby3VJxwraaatrD0uBhR4OxNUAgEy6cUKv/.UD0QhH3hC3tOLAJlO', '159-879-3133', 'uio', 'ccccc', 'sssss', 11111, 'cccccc', '225-55-8889', 'employee_profile_pic/zfqg1yojYkozsD8nfYZH14HFaJfHDDg2LJCL2CM5.jpg', 1, 1, NULL, '2022-01-02 11:56:24', '2022-02-21 11:02:07'),
(4, 'asad', 'account@gmail.com', '$2y$10$Tzs.Eg9mfZZFyvVvFE9xquL8gzGaFCSxHMFsV/y2SxYdOz5s0S3S.', '111-111-1111', 'yuoiuyu', 'city', 'punjab', 52258, 'Pakistan', '222-22-2225', 'employee_profile_pic/RLxrPh8h9JOLcjGc4XUeGeVgsiM2BTVQ4pK0QpEb.jpg', 3, 1, NULL, '2022-01-05 13:53:36', '2022-02-23 11:33:00'),
(5, 'acpay', 'accountpay@gmail.com', '$2y$10$Tzs.Eg9mfZZFyvVvFE9xquL8gzGaFCSxHMFsV/y2SxYdOz5s0S3S.', '123-456-7822', 'uiuiu', 'city', 'pun', 52250, 'Pakistan', '121-21-2121', 'employee_profile_pic/DsKpadvzazePeTp7Y8uYOurtqFqVEh8b2X4w6fJM.jpg', 5, 1, NULL, '2022-01-05 18:30:39', '2022-01-15 09:25:26'),
(6, 'account receive', 'accountreceive@gmail.com', '$2y$10$Tzs.Eg9mfZZFyvVvFE9xquL8gzGaFCSxHMFsV/y2SxYdOz5s0S3S.', '963-852-7410', 'iuoiuoo', 'city', 'state', 1000, 'country', '885-54-6310', 'employee_profile_pic/3Amb3Xa1whMEYUICEflidV7waQiDGV18Y7pJPSeH.jpg', 6, 1, NULL, '2022-01-07 04:40:55', '2022-01-15 09:25:57'),
(7, 'customer service', 'customerservice@gmail.com', '$2y$10$Tzs.Eg9mfZZFyvVvFE9xquL8gzGaFCSxHMFsV/y2SxYdOz5s0S3S.', '100-345-3432', 'ghghg', 'cccc', 'sss', 1111, 'cccc', '911-23-6544', 'employee_profile_pic/Cppec5Vb87Rgje1cs0Cx45pc2iyi3UUkdHPdbmCi.jpg', 8, 1, NULL, '2022-01-09 09:04:22', '2022-01-15 09:24:11'),
(8, 'dealer service', 'dealerservice@gmail.com', '$2y$10$Tzs.Eg9mfZZFyvVvFE9xquL8gzGaFCSxHMFsV/y2SxYdOz5s0S3S.', '969-696-9696', 'uyyi', 'eeee', 'rrrrrr', 5555, 'yyyyy', '969-69-6969', 'employee_profile_pic/dwh9EkCSn5FWjKRWWIupHiJb7rFlDTlW0pmPfUWY.jpg', 7, 1, NULL, '2022-01-09 09:04:22', '2022-01-15 09:24:46'),
(9, 'rrr', 'manager@gmail.com', '$2y$10$Tzs.Eg9mfZZFyvVvFE9xquL8gzGaFCSxHMFsV/y2SxYdOz5s0S3S.', '123-456-78__', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '565-65-6565', 'employee_profile_pic/CLSGAv6i0NI3QeDEiPbVzwcHoJ4EsRejLjJTlu74.jpg', 2, 1, NULL, '2022-01-09 12:45:50', '2022-02-21 12:48:29'),
(15, 'asad', 'asadking06@gmail.com', '$2y$10$Tzs.Eg9mfZZFyvVvFE9xquL8gzGaFCSxHMFsV/y2SxYdOz5s0S3S.', '787-977-9790', NULL, 'city', 'pun', 52250, 'Pakistan', '111-51-213_', 'employee_profile_picture/J7RVFoOqxvQB8GoD7km6ENeKfBVxu5zDbhyCkx8Q.jpg', 6, 1, NULL, '2022-01-09 10:49:34', '2022-01-15 14:21:09'),
(22, 'asad', 'asadking056@gmail.com', '$2y$10$Tzs.Eg9mfZZFyvVvFE9xquL8gzGaFCSxHMFsV/y2SxYdOz5s0S3S.', '787-977-9799', NULL, 'city', 'pun', 52250, 'Pakistan', '111-11-213_', 'employee_profile_picture/4gBqpPHEQuzOOWS2sxbtCQ8qX4lJOssjkwhAxi1f.jpg', 6, 1, NULL, '2022-01-09 11:02:17', '2022-01-16 08:47:24'),
(23, 'ind 2', 'ind2@gmail.com', '$2y$10$NQCsNjDHZhlwEgPoS/Na0uKODeAWzhnpapypDUNv68gshgHAT/8Hm', '123-456-7899', NULL, 'city', 'pun', 52250, 'Pakistan', '965-23-1784', 'employee_profile_picture/mUQqvXkRN8OmWnK4w0wZ83IinFxfP0YfSDAJunYl.jpg', 3, 1, NULL, '2022-01-12 09:04:52', '2022-01-15 14:21:16'),
(24, 'asad', 'asadking068986@gmail.com', '$2y$10$HhHzS2Rs5CLvDJGLae2WA.XcKkmX/OqunHykXkEHuIwyf1nL11m22', '123-456-7890', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '999-45-13092', 'employee_profile_picture/nBc8RCY5YOPF2NYc7tIGGE4Aev08umsGvymbbq0L.jpg', 3, 1, NULL, '2022-01-31 09:07:20', '2022-01-31 14:09:52'),
(27, 'asad', 'asadking06886@gmail.com', '$2y$10$sfQdMMnQnLYRoYOCrbULwuQKsiwmq..lmKvTMzYhneqY5YulFt2uu', '123-456-7899', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '999-45-1301', 'employee_profile_picture/C94hnzfxwog3xUVXDk3J1DBg91htbgVhou9W9O2m.jpg', 3, 1, NULL, '2022-01-31 09:09:56', '2022-01-31 09:09:56'),
(28, 'Ali', 'ali95@gmail.com', '$2y$10$e5zMLSgZ/fNLTMG0drJCQ.Q5ok.LSiC.KsUs2/.h1PVoZvhBvwIuu', '123-456-7845', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '895-63-2124', 'employee_profile_picture/PQUA8mQYsUe4XifJSbUnjrRozW7JLALx3nzNxrTQ.png', 3, 1, NULL, '2022-01-31 10:11:46', '2022-01-31 10:11:46'),
(31, 'asad', 'asadk4ing066@gmail.com', '$2y$10$ePvQeSRCXixbNfX57ER6Ue.IXr0aVfY5TUFMO.d766c2GOLInNH/K', '233-233-2233', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '233-22-3323', 'employee_profile_picture/tuK69Lgz0DLQjgG35JHjPd4I3ABEVnCJiMU0BMp4.jpg', 4, 1, NULL, '2022-02-21 11:08:04', '2022-02-21 11:08:04'),
(34, 'asad', 'asading066@gmail.com', '$2y$10$zMdY5TV..ByuElFZDt1Te.ejKpSOFigeMMXsIv0Ana1y3pwMT6ADe', '233-233-2233', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '323-23-3321', 'employee_profile_picture/mVRUe77eh4ZXSqVkiQ3Mp4fV6ITnkDjBInHVODwf.jpg', 4, 1, NULL, '2022-02-21 11:08:30', '2022-02-21 11:08:30'),
(36, 'asad54', 'asa33ding066@gmail.com', '$2y$10$CeBFm6UHiBicgLdZ10CHJ./pTtOC/H2jpzoqjV2CYdZw1u7UMU1ZS', '221-232-3332', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '984-51-4600', 'employee_profile_picture/17m94zxpxRu2Pd58yU6TpSK8xYKxt3DJvPfvpIoJ.jpg', 4, 1, NULL, '2022-02-21 11:09:09', '2022-02-21 11:09:09'),
(37, 'asad', 'aseeadking066@gmail.com', '$2y$10$wdc.9hwA3pChslcqZ.4rr.1cArm1kqyI2z4xm2DKNu7ByZRK6zrjC', '345-455-4555', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '543-55-5454', 'employee_profile_picture/Zadmx9oNck5BOKU9dqJQ1eLmNfmIIQqo16mfcWKg.jpg', 4, 1, NULL, '2022-02-21 11:16:32', '2022-02-21 11:16:32'),
(38, 'asad', 'as56king066@gmail.com', '$2y$10$/GiP2y5UDbDKLOltQmGzWOE1SAhxmBw/DIOMRpHXOpxtiv3PwWZ.G', '132-222-2224', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '312-22-2222', 'employee_profile_picture/TfDwP301grxLjEO3Op0ImFR5RVYmF0zZQTx0QHnv.jpg', 7, 1, NULL, '2022-02-21 11:49:03', '2022-02-21 11:49:03'),
(41, 'asad', 'as5eqwj6king066@gmail.com', '$2y$10$Mng.zBeWgL8uEaYzOzZyP.pR5EIfUSkEXt3oR9r4HT4RZddU2B.eS', '132-222-2224', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '948-64-6516', 'employee_profile_picture/DoXSDeT8hmWbvENIqUyaHSDR2O6sKAhamOiykp5x.jpg', 7, 1, NULL, '2022-02-21 11:49:29', '2022-02-21 11:49:29');

-- --------------------------------------------------------

--
-- Table structure for table `employee_docs`
--

CREATE TABLE `employee_docs` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `contract_id` int(11) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_docs`
--

INSERT INTO `employee_docs` (`id`, `employee_id`, `contract_id`, `document`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'employee_docs/RDtma3RaVfhXQ0ZEUgfOsA4uaz6q0vQ3AczaaN1j.svg', '2022-02-21 10:48:03', '2022-02-21 10:48:03'),
(2, 2, 20, 'employee_docs/Tfeo9tg8jxJ43bw2WvIvSI7Hoj7PJKeC4CFLYNLy.svg', '2022-02-21 10:50:40', '2022-02-21 10:50:40'),
(3, 4, 18, 'employee_docs/OVafcQfPB11Uszld8vgLH4cClto9RWuO2NtVTuPZ.jpg', '2022-02-21 11:58:57', '2022-02-21 11:58:57'),
(4, 4, 1, 'employee_docs/GMLgN9V5TJZSCRj7y9cBgFYKmWCwnoPC3vHPfjnh.jpg', '2022-02-21 12:01:43', '2022-02-21 12:01:43'),
(5, 4, 1, 'employee_docs/yONNbBBxyf3QIR0q6khIXcFHuZtFqU57UZNb4WiY.jpg', '2022-02-21 12:02:38', '2022-02-21 12:02:38'),
(6, 4, 1, 'employee_docs/Xtt5oQ1YYCmvueIfi7M1fL2SPZPhr9LzppJ1xpGA.svg', '2022-02-21 12:04:55', '2022-02-21 12:04:55'),
(7, 5, 1, 'employee_docs/0aBC9SHPjdA3oZFdvc8MF01k5PwxMfcECx30RN76.jpg', '2022-02-21 12:38:33', '2022-02-21 12:38:33'),
(8, 5, 1, 'employee_docs/ldtYxQTu5uoQ0wc5NYuwpblWBx4fqhy9KcHUmYAK.jpg', '2022-02-21 12:43:26', '2022-02-21 12:43:26'),
(9, 6, 5, 'employee_docs/9XMzN4oac7Ms47WauZQKIi5sVYI7iDLrg9Pldq0u.jpg', '2022-02-21 12:45:58', '2022-02-21 12:45:58'),
(10, 3, 60, 'employee_docs/5uPJYeqLbVxwz56CvOqzCvNelWU008RWP3Se0GD5.jpg', '2022-02-23 10:35:07', '2022-02-23 10:35:07'),
(11, 3, 60, 'employee_docs/ftGvZcZJTDFITzwaGOT4R1GYlEWaSuda6D9P7HCk.jpg', '2022-02-23 10:35:44', '2022-02-23 10:35:44'),
(12, 9, 60, 'employee_docs/WV4WI0AU1zxnqJd74Uml0OSIqk5zP0hQPNI0G2GP.png', '2022-02-23 10:37:55', '2022-02-23 10:37:55');

-- --------------------------------------------------------

--
-- Table structure for table `employee_notes`
--

CREATE TABLE `employee_notes` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `title` varchar(265) DEFAULT NULL,
  `notes` varchar(5000) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_notes`
--

INSERT INTO `employee_notes` (`id`, `employee_id`, `title`, `notes`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, '1', '1', 0, '2022-02-21 10:52:42', '2022-02-21 10:52:42'),
(2, 3, '1', '1', 0, '2022-02-21 11:23:32', '2022-02-21 11:23:32');

-- --------------------------------------------------------

--
-- Table structure for table `employee_roles`
--

CREATE TABLE `employee_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_roles`
--

INSERT INTO `employee_roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2021-12-29 04:50:14', '2021-12-29 04:50:14'),
(2, 'manager', '2022-01-01 01:26:42', '2022-01-01 01:26:42'),
(3, 'accounts', '2022-01-01 01:26:42', '2022-01-01 01:26:42'),
(4, 'helpdesk', '2022-01-01 01:27:06', '2022-01-01 01:27:06'),
(5, 'account_pay', '2022-01-05 13:17:37', '2022-01-05 13:17:37'),
(6, 'account_receive', '2022-01-05 13:17:37', '2022-01-05 13:17:37'),
(7, 'dealer service', '2022-01-05 13:18:52', '2022-01-05 13:18:52'),
(8, 'customer service', '2022-01-05 13:18:52', '2022-01-05 13:18:52');

-- --------------------------------------------------------

--
-- Table structure for table `employee_todo_list`
--

CREATE TABLE `employee_todo_list` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `title` varchar(265) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `assign_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_todo_list`
--

INSERT INTO `employee_todo_list` (`id`, `employee_id`, `title`, `description`, `assign_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, '1', '11', 2, 0, '2022-02-21 10:53:29', '2022-02-21 10:53:29'),
(2, 3, '1', '1', 3, 0, '2022-02-21 11:23:46', '2022-02-21 11:23:46'),
(3, 4, '1', '1', 4, 1, '2022-02-21 12:00:10', '2022-02-21 12:00:20'),
(4, 9, 'abc', 'ssfsfsf', 9, 0, '2022-03-23 03:26:59', '2022-03-23 03:26:59');

-- --------------------------------------------------------

--
-- Table structure for table `interest_rate`
--

CREATE TABLE `interest_rate` (
  `id` int(11) NOT NULL,
  `is_loan` tinyint(4) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `created _at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interest_rate`
--

INSERT INTO `interest_rate` (`id`, `is_loan`, `rate`, `created _at`, `updated_at`) VALUES
(1, 1, 10, '2022-01-29 16:31:42', '2022-01-29 16:31:42'),
(2, 0, 20, '2022-01-29 16:31:42', '2022-01-29 16:31:42');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `contract_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `fee` decimal(10,2) DEFAULT NULL,
  `sales_tax` decimal(10,2) DEFAULT NULL,
  `total_amount_to_pay` decimal(10,2) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `paid_date` date DEFAULT NULL,
  `late_fee` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `contract_id`, `customer_id`, `amount`, `fee`, `sales_tax`, `total_amount_to_pay`, `due_date`, `paid_date`, `late_fee`, `status`, `created_at`, `updated_at`) VALUES
(1, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-02-15', NULL, '30.00', 0, '2022-02-08 10:43:36', '2022-02-18 17:48:43'),
(2, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-02-08', '2022-02-13', '30.00', 1, '2022-02-08 10:43:36', '2022-02-13 08:17:56'),
(3, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-02-01', '2022-02-13', '30.00', 1, '2022-02-08 10:43:36', '2022-02-13 07:43:13'),
(4, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-03-08', NULL, '0.00', 0, '2022-02-08 10:43:36', '2022-02-08 10:43:36'),
(5, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-03-15', NULL, '0.00', 0, '2022-02-08 10:43:36', '2022-02-08 10:43:36'),
(6, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-03-22', NULL, '0.00', 0, '2022-02-08 10:43:36', '2022-02-08 10:43:36'),
(7, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-03-29', NULL, '0.00', 0, '2022-02-08 10:43:36', '2022-02-08 10:43:36'),
(8, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-04-05', NULL, '0.00', 0, '2022-02-08 10:43:36', '2022-02-08 10:43:36'),
(9, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-04-12', NULL, '0.00', 0, '2022-02-08 10:43:36', '2022-02-08 10:43:36'),
(10, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-04-19', NULL, '0.00', 0, '2022-02-08 10:43:36', '2022-02-08 10:43:36'),
(11, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-04-26', NULL, '0.00', 0, '2022-02-08 10:43:37', '2022-02-08 10:43:37'),
(12, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-05-03', NULL, '0.00', 0, '2022-02-08 10:43:37', '2022-02-08 10:43:37'),
(13, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-05-10', NULL, '0.00', 0, '2022-02-08 10:43:37', '2022-02-08 10:43:37'),
(14, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-05-17', NULL, '0.00', 0, '2022-02-08 10:43:37', '2022-02-08 10:43:37'),
(15, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-05-24', NULL, '0.00', 0, '2022-02-08 10:43:37', '2022-02-08 10:43:37'),
(16, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-05-31', NULL, '0.00', 0, '2022-02-08 10:43:37', '2022-02-08 10:43:37'),
(17, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-06-07', NULL, '0.00', 0, '2022-02-08 10:43:37', '2022-02-08 10:43:37'),
(18, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-06-14', NULL, '0.00', 0, '2022-02-08 10:43:37', '2022-02-08 10:43:37'),
(19, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-06-21', NULL, '0.00', 0, '2022-02-08 10:43:37', '2022-02-08 10:43:37'),
(20, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-06-28', NULL, '0.00', 0, '2022-02-08 10:43:37', '2022-02-08 10:43:37'),
(21, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-07-05', NULL, '0.00', 0, '2022-02-08 10:43:37', '2022-02-08 10:43:37'),
(22, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-07-12', NULL, '0.00', 0, '2022-02-08 10:43:37', '2022-02-08 10:43:37'),
(23, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-07-19', NULL, '0.00', 0, '2022-02-08 10:43:38', '2022-02-08 10:43:38'),
(24, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-07-26', NULL, '0.00', 0, '2022-02-08 10:43:38', '2022-02-08 10:43:38'),
(25, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-08-02', NULL, '0.00', 0, '2022-02-08 10:43:38', '2022-02-08 10:43:38'),
(26, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-08-09', NULL, '0.00', 0, '2022-02-08 10:43:38', '2022-02-08 10:43:38'),
(27, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-08-16', NULL, '0.00', 0, '2022-02-08 10:43:38', '2022-02-08 10:43:38'),
(28, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-08-23', NULL, '0.00', 0, '2022-02-08 10:43:38', '2022-02-08 10:43:38'),
(29, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-08-30', NULL, '0.00', 0, '2022-02-08 10:43:38', '2022-02-08 10:43:38'),
(30, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-09-06', NULL, '0.00', 0, '2022-02-08 10:43:38', '2022-02-08 10:43:38'),
(31, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-09-13', NULL, '0.00', 0, '2022-02-08 10:43:38', '2022-02-08 10:43:38'),
(32, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-09-20', NULL, '0.00', 0, '2022-02-08 10:43:38', '2022-02-08 10:43:38'),
(33, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-09-27', NULL, '0.00', 0, '2022-02-08 10:43:38', '2022-02-08 10:43:38'),
(34, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-10-04', NULL, '0.00', 0, '2022-02-08 10:43:38', '2022-02-08 10:43:38'),
(35, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-10-11', NULL, '0.00', 0, '2022-02-08 10:43:39', '2022-02-08 10:43:39'),
(36, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-10-18', NULL, '0.00', 0, '2022-02-08 10:43:39', '2022-02-08 10:43:39'),
(37, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-10-25', NULL, '0.00', 0, '2022-02-08 10:43:39', '2022-02-08 10:43:39'),
(38, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-11-01', NULL, '0.00', 0, '2022-02-08 10:43:39', '2022-02-08 10:43:39'),
(39, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-11-08', NULL, '0.00', 0, '2022-02-08 10:43:39', '2022-02-08 10:43:39'),
(40, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-11-15', NULL, '0.00', 0, '2022-02-08 10:43:39', '2022-02-08 10:43:39'),
(41, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-11-22', NULL, '0.00', 0, '2022-02-08 10:43:39', '2022-02-08 10:43:39'),
(42, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-11-29', NULL, '0.00', 0, '2022-02-08 10:43:39', '2022-02-08 10:43:39'),
(43, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-12-06', NULL, '0.00', 0, '2022-02-08 10:43:39', '2022-02-08 10:43:39'),
(44, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-12-13', NULL, '0.00', 0, '2022-02-08 10:43:39', '2022-02-08 10:43:39'),
(45, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-12-20', NULL, '0.00', 0, '2022-02-08 10:43:39', '2022-02-08 10:43:39'),
(46, 47, 1, '2.27', NULL, '0.19', '2.46', '2022-12-27', NULL, '0.00', 0, '2022-02-08 10:43:39', '2022-02-08 10:43:39'),
(47, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-01-03', NULL, '0.00', 0, '2022-02-08 10:43:39', '2022-02-08 10:43:39'),
(48, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-01-10', NULL, '0.00', 0, '2022-02-08 10:43:39', '2022-02-08 10:43:39'),
(49, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-01-17', NULL, '0.00', 0, '2022-02-08 10:43:39', '2022-02-08 10:43:39'),
(50, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-01-24', NULL, '0.00', 0, '2022-02-08 10:43:39', '2022-02-08 10:43:39'),
(51, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-01-31', NULL, '0.00', 0, '2022-02-08 10:43:39', '2022-02-08 10:43:39'),
(52, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-02-07', NULL, '0.00', 0, '2022-02-08 10:43:39', '2022-02-08 10:43:39'),
(53, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-02-14', NULL, '0.00', 0, '2022-02-08 10:43:39', '2022-02-08 10:43:39'),
(54, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-02-21', NULL, '0.00', 0, '2022-02-08 10:43:39', '2022-02-08 10:43:39'),
(55, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-02-28', NULL, '0.00', 0, '2022-02-08 10:43:39', '2022-02-08 10:43:39'),
(56, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-03-07', NULL, '0.00', 0, '2022-02-08 10:43:39', '2022-02-08 10:43:39'),
(57, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-03-14', NULL, '0.00', 0, '2022-02-08 10:43:39', '2022-02-08 10:43:39'),
(58, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-03-21', NULL, '0.00', 0, '2022-02-08 10:43:40', '2022-02-08 10:43:40'),
(59, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-03-28', NULL, '0.00', 0, '2022-02-08 10:43:40', '2022-02-08 10:43:40'),
(60, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-04-04', NULL, '0.00', 0, '2022-02-08 10:43:40', '2022-02-08 10:43:40'),
(61, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-04-11', NULL, '0.00', 0, '2022-02-08 10:43:40', '2022-02-08 10:43:40'),
(62, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-04-18', NULL, '0.00', 0, '2022-02-08 10:43:40', '2022-02-08 10:43:40'),
(63, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-04-25', NULL, '0.00', 0, '2022-02-08 10:43:40', '2022-02-08 10:43:40'),
(64, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-05-02', NULL, '0.00', 0, '2022-02-08 10:43:40', '2022-02-08 10:43:40'),
(65, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-05-09', NULL, '0.00', 0, '2022-02-08 10:43:40', '2022-02-08 10:43:40'),
(66, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-05-16', NULL, '0.00', 0, '2022-02-08 10:43:40', '2022-02-08 10:43:40'),
(67, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-05-23', NULL, '0.00', 0, '2022-02-08 10:43:40', '2022-02-08 10:43:40'),
(68, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-05-30', NULL, '0.00', 0, '2022-02-08 10:43:40', '2022-02-08 10:43:40'),
(69, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-06-06', NULL, '0.00', 0, '2022-02-08 10:43:40', '2022-02-08 10:43:40'),
(70, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-06-13', NULL, '0.00', 0, '2022-02-08 10:43:40', '2022-02-08 10:43:40'),
(71, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-06-20', NULL, '0.00', 0, '2022-02-08 10:43:40', '2022-02-08 10:43:40'),
(72, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-06-27', NULL, '0.00', 0, '2022-02-08 10:43:40', '2022-02-08 10:43:40'),
(73, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-07-04', NULL, '0.00', 0, '2022-02-08 10:43:40', '2022-02-08 10:43:40'),
(74, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-07-11', NULL, '0.00', 0, '2022-02-08 10:43:40', '2022-02-08 10:43:40'),
(75, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-07-18', NULL, '0.00', 0, '2022-02-08 10:43:40', '2022-02-08 10:43:40'),
(76, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-07-25', NULL, '0.00', 0, '2022-02-08 10:43:40', '2022-02-08 10:43:40'),
(77, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-08-01', NULL, '0.00', 0, '2022-02-08 10:43:40', '2022-02-08 10:43:40'),
(78, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-08-08', NULL, '0.00', 0, '2022-02-08 10:43:40', '2022-02-08 10:43:40'),
(79, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-08-15', NULL, '0.00', 0, '2022-02-08 10:43:40', '2022-02-08 10:43:40'),
(80, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-08-22', NULL, '0.00', 0, '2022-02-08 10:43:40', '2022-02-08 10:43:40'),
(81, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-08-29', NULL, '0.00', 0, '2022-02-08 10:43:41', '2022-02-08 10:43:41'),
(82, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-09-05', NULL, '0.00', 0, '2022-02-08 10:43:41', '2022-02-08 10:43:41'),
(83, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-09-12', NULL, '0.00', 0, '2022-02-08 10:43:41', '2022-02-08 10:43:41'),
(84, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-09-19', NULL, '0.00', 0, '2022-02-08 10:43:41', '2022-02-08 10:43:41'),
(85, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-09-26', NULL, '0.00', 0, '2022-02-08 10:43:41', '2022-02-08 10:43:41'),
(86, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-10-03', NULL, '0.00', 0, '2022-02-08 10:43:41', '2022-02-08 10:43:41'),
(87, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-10-10', NULL, '0.00', 0, '2022-02-08 10:43:41', '2022-02-08 10:43:41'),
(88, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-10-17', NULL, '0.00', 0, '2022-02-08 10:43:41', '2022-02-08 10:43:41'),
(89, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-10-24', NULL, '0.00', 0, '2022-02-08 10:43:41', '2022-02-08 10:43:41'),
(90, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-10-31', NULL, '0.00', 0, '2022-02-08 10:43:41', '2022-02-08 10:43:41'),
(91, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-11-07', NULL, '0.00', 0, '2022-02-08 10:43:41', '2022-02-08 10:43:41'),
(92, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-11-14', NULL, '0.00', 0, '2022-02-08 10:43:41', '2022-02-08 10:43:41'),
(93, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-11-21', NULL, '0.00', 0, '2022-02-08 10:43:41', '2022-02-08 10:43:41'),
(94, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-11-28', NULL, '0.00', 0, '2022-02-08 10:43:41', '2022-02-08 10:43:41'),
(95, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-12-05', NULL, '0.00', 0, '2022-02-08 10:43:41', '2022-02-08 10:43:41'),
(96, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-12-12', NULL, '0.00', 0, '2022-02-08 10:43:41', '2022-02-08 10:43:41'),
(97, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-12-19', NULL, '0.00', 0, '2022-02-08 10:43:41', '2022-02-08 10:43:41'),
(98, 47, 1, '2.27', NULL, '0.19', '2.46', '2023-12-26', NULL, '0.00', 0, '2022-02-08 10:43:42', '2022-02-08 10:43:42'),
(99, 47, 1, '2.27', NULL, '0.19', '2.46', '2024-01-02', NULL, '0.00', 0, '2022-02-08 10:43:42', '2022-02-08 10:43:42'),
(100, 47, 1, '2.27', NULL, '0.19', '2.46', '2024-01-09', NULL, '0.00', 0, '2022-02-08 10:43:42', '2022-02-08 10:43:42'),
(101, 47, 1, '2.27', NULL, '0.19', '2.46', '2024-01-16', NULL, '0.00', 0, '2022-02-08 10:43:42', '2022-02-08 10:43:42'),
(102, 47, 1, '2.27', NULL, '0.19', '2.46', '2024-01-23', NULL, '0.00', 0, '2022-02-08 10:43:42', '2022-02-08 10:43:42'),
(103, 47, 1, '2.27', NULL, '0.19', '2.46', '2024-01-30', NULL, '0.00', 0, '2022-02-08 10:43:42', '2022-02-08 10:43:42'),
(104, 47, 1, '2.27', NULL, '0.19', '2.46', '2024-02-06', NULL, '0.00', 0, '2022-02-08 10:43:42', '2022-02-08 10:43:42'),
(105, 48, 1, '125.37', NULL, '10.34', '135.71', '2022-02-12', NULL, '0.00', 0, '2022-02-08 10:56:19', '2022-02-09 17:01:05'),
(106, 48, 1, '125.37', NULL, '10.34', '135.71', '2022-03-09', NULL, '0.00', 0, '2022-02-08 10:56:19', '2022-02-09 17:00:18'),
(107, 48, 1, '125.37', NULL, '10.34', '135.71', '2022-05-09', NULL, '0.00', 0, '2022-02-08 10:56:19', '2022-02-08 10:56:19'),
(108, 48, 1, '125.37', NULL, '10.34', '135.71', '2022-06-08', NULL, '0.00', 0, '2022-02-08 10:56:19', '2022-02-08 10:56:19'),
(109, 48, 1, '125.37', NULL, '10.34', '135.71', '2022-07-08', NULL, '0.00', 0, '2022-02-08 10:56:19', '2022-02-08 10:56:19'),
(110, 48, 1, '125.37', NULL, '10.34', '135.71', '2022-08-07', NULL, '0.00', 0, '2022-02-08 10:56:19', '2022-02-08 10:56:19'),
(111, 48, 1, '125.37', NULL, '10.34', '135.71', '2022-09-06', NULL, '0.00', 0, '2022-02-08 10:56:19', '2022-02-08 10:56:19'),
(112, 48, 1, '125.37', NULL, '10.34', '135.71', '2022-10-06', NULL, '0.00', 0, '2022-02-08 10:56:19', '2022-02-08 10:56:19'),
(113, 48, 1, '125.37', NULL, '10.34', '135.71', '2022-11-05', NULL, '0.00', 0, '2022-02-08 10:56:19', '2022-02-08 10:56:19'),
(114, 48, 1, '125.37', NULL, '10.34', '135.71', '2022-12-05', NULL, '0.00', 0, '2022-02-08 10:56:19', '2022-02-08 10:56:19'),
(115, 48, 1, '125.37', NULL, '10.34', '135.71', '2023-01-04', NULL, '0.00', 0, '2022-02-08 10:56:19', '2022-02-08 10:56:19'),
(116, 48, 1, '125.37', NULL, '10.34', '135.71', '2023-02-03', NULL, '0.00', 0, '2022-02-08 10:56:19', '2022-02-08 10:56:19'),
(117, 48, 1, '125.37', NULL, '10.34', '135.71', '2023-03-05', NULL, '0.00', 0, '2022-02-08 10:56:19', '2022-02-08 10:56:19'),
(118, 48, 1, '125.37', NULL, '10.34', '135.71', '2023-04-04', NULL, '0.00', 0, '2022-02-08 10:56:19', '2022-02-08 10:56:19'),
(119, 48, 1, '125.37', NULL, '10.34', '135.71', '2023-05-04', NULL, '0.00', 0, '2022-02-08 10:56:19', '2022-02-08 10:56:19'),
(120, 48, 1, '125.37', NULL, '10.34', '135.71', '2023-06-03', NULL, '0.00', 0, '2022-02-08 10:56:19', '2022-02-08 10:56:19'),
(121, 48, 1, '125.37', NULL, '10.34', '135.71', '2023-07-03', NULL, '0.00', 0, '2022-02-08 10:56:20', '2022-02-08 10:56:20'),
(122, 48, 1, '125.37', NULL, '10.34', '135.71', '2023-08-02', NULL, '0.00', 0, '2022-02-08 10:56:20', '2022-02-08 10:56:20'),
(123, 48, 1, '125.37', NULL, '10.34', '135.71', '2023-09-01', NULL, '0.00', 0, '2022-02-08 10:56:20', '2022-02-08 10:56:20'),
(124, 48, 1, '125.37', NULL, '10.34', '135.71', '2023-10-01', NULL, '0.00', 0, '2022-02-08 10:56:20', '2022-02-08 10:56:20'),
(125, 48, 1, '125.37', NULL, '10.34', '135.71', '2023-10-31', NULL, '0.00', 0, '2022-02-08 10:56:20', '2022-02-08 10:56:20'),
(126, 48, 1, '125.37', NULL, '10.34', '135.71', '2023-11-30', NULL, '0.00', 0, '2022-02-08 10:56:20', '2022-02-08 10:56:20'),
(127, 48, 1, '125.37', NULL, '10.34', '135.71', '2023-12-30', NULL, '0.00', 0, '2022-02-08 10:56:20', '2022-02-08 10:56:20'),
(128, 48, 1, '125.37', NULL, '10.34', '135.71', '2024-01-29', NULL, '0.00', 0, '2022-02-08 10:56:20', '2022-02-08 10:56:20'),
(129, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-02-18', NULL, '0.00', 0, '2022-02-11 10:36:04', '2022-02-11 10:36:04'),
(130, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-02-25', NULL, '0.00', 0, '2022-02-11 10:36:05', '2022-02-11 10:36:05'),
(131, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-03-04', NULL, '0.00', 0, '2022-02-11 10:36:05', '2022-02-11 10:36:05'),
(132, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-03-11', NULL, '0.00', 0, '2022-02-11 10:36:05', '2022-02-11 10:36:05'),
(133, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-03-18', NULL, '0.00', 0, '2022-02-11 10:36:05', '2022-02-11 10:36:05'),
(134, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-03-25', NULL, '0.00', 0, '2022-02-11 10:36:05', '2022-02-11 10:36:05'),
(135, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-04-01', NULL, '0.00', 0, '2022-02-11 10:36:05', '2022-02-11 10:36:05'),
(136, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-04-08', NULL, '0.00', 0, '2022-02-11 10:36:05', '2022-02-11 10:36:05'),
(137, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-04-15', NULL, '0.00', 0, '2022-02-11 10:36:05', '2022-02-11 10:36:05'),
(138, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-04-22', NULL, '0.00', 0, '2022-02-11 10:36:05', '2022-02-11 10:36:05'),
(139, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-04-29', NULL, '0.00', 0, '2022-02-11 10:36:05', '2022-02-11 10:36:05'),
(140, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-05-06', NULL, '0.00', 0, '2022-02-11 10:36:05', '2022-02-11 10:36:05'),
(141, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-05-13', NULL, '0.00', 0, '2022-02-11 10:36:06', '2022-02-11 10:36:06'),
(142, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-05-20', NULL, '0.00', 0, '2022-02-11 10:36:06', '2022-02-11 10:36:06'),
(143, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-05-27', NULL, '0.00', 0, '2022-02-11 10:36:06', '2022-02-11 10:36:06'),
(144, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-06-03', NULL, '0.00', 0, '2022-02-11 10:36:06', '2022-02-11 10:36:06'),
(145, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-06-10', NULL, '0.00', 0, '2022-02-11 10:36:06', '2022-02-11 10:36:06'),
(146, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-06-17', NULL, '0.00', 0, '2022-02-11 10:36:06', '2022-02-11 10:36:06'),
(147, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-06-24', NULL, '0.00', 0, '2022-02-11 10:36:06', '2022-02-11 10:36:06'),
(148, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-07-01', NULL, '0.00', 0, '2022-02-11 10:36:06', '2022-02-11 10:36:06'),
(149, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-07-08', NULL, '0.00', 0, '2022-02-11 10:36:06', '2022-02-11 10:36:06'),
(150, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-07-15', NULL, '0.00', 0, '2022-02-11 10:36:06', '2022-02-11 10:36:06'),
(151, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-07-22', NULL, '0.00', 0, '2022-02-11 10:36:06', '2022-02-11 10:36:06'),
(152, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-07-29', NULL, '0.00', 0, '2022-02-11 10:36:06', '2022-02-11 10:36:06'),
(153, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-08-05', NULL, '0.00', 0, '2022-02-11 10:36:06', '2022-02-11 10:36:06'),
(154, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-08-12', NULL, '0.00', 0, '2022-02-11 10:36:06', '2022-02-11 10:36:06'),
(155, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-08-19', NULL, '0.00', 0, '2022-02-11 10:36:06', '2022-02-11 10:36:06'),
(156, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-08-26', NULL, '0.00', 0, '2022-02-11 10:36:06', '2022-02-11 10:36:06'),
(157, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-09-02', NULL, '0.00', 0, '2022-02-11 10:36:06', '2022-02-11 10:36:06'),
(158, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-09-09', NULL, '0.00', 0, '2022-02-11 10:36:06', '2022-02-11 10:36:06'),
(159, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-09-16', NULL, '0.00', 0, '2022-02-11 10:36:07', '2022-02-11 10:36:07'),
(160, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-09-23', NULL, '0.00', 0, '2022-02-11 10:36:07', '2022-02-11 10:36:07'),
(161, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-09-30', NULL, '0.00', 0, '2022-02-11 10:36:07', '2022-02-11 10:36:07'),
(162, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-10-07', NULL, '0.00', 0, '2022-02-11 10:36:07', '2022-02-11 10:36:07'),
(163, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-10-14', NULL, '0.00', 0, '2022-02-11 10:36:07', '2022-02-11 10:36:07'),
(164, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-10-21', NULL, '0.00', 0, '2022-02-11 10:36:07', '2022-02-11 10:36:07'),
(165, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-10-28', NULL, '0.00', 0, '2022-02-11 10:36:07', '2022-02-11 10:36:07'),
(166, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-11-04', NULL, '0.00', 0, '2022-02-11 10:36:07', '2022-02-11 10:36:07'),
(167, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-11-11', NULL, '0.00', 0, '2022-02-11 10:36:07', '2022-02-11 10:36:07'),
(168, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-11-18', NULL, '0.00', 0, '2022-02-11 10:36:07', '2022-02-11 10:36:07'),
(169, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-11-25', NULL, '0.00', 0, '2022-02-11 10:36:07', '2022-02-11 10:36:07'),
(170, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-12-02', NULL, '0.00', 0, '2022-02-11 10:36:07', '2022-02-11 10:36:07'),
(171, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-12-09', NULL, '0.00', 0, '2022-02-11 10:36:07', '2022-02-11 10:36:07'),
(172, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-12-16', NULL, '0.00', 0, '2022-02-11 10:36:08', '2022-02-11 10:36:08'),
(173, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-12-23', NULL, '0.00', 0, '2022-02-11 10:36:08', '2022-02-11 10:36:08'),
(174, 49, 1, '221.13', NULL, '18.24', '239.37', '2022-12-30', NULL, '0.00', 0, '2022-02-11 10:36:08', '2022-02-11 10:36:08'),
(175, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-01-06', NULL, '0.00', 0, '2022-02-11 10:36:08', '2022-02-11 10:36:08'),
(176, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-01-13', NULL, '0.00', 0, '2022-02-11 10:36:08', '2022-02-11 10:36:08'),
(177, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-01-20', NULL, '0.00', 0, '2022-02-11 10:36:08', '2022-02-11 10:36:08'),
(178, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-01-27', NULL, '0.00', 0, '2022-02-11 10:36:08', '2022-02-11 10:36:08'),
(179, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-02-03', NULL, '0.00', 0, '2022-02-11 10:36:08', '2022-02-11 10:36:08'),
(180, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-02-10', NULL, '0.00', 0, '2022-02-11 10:36:08', '2022-02-11 10:36:08'),
(181, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-02-17', NULL, '0.00', 0, '2022-02-11 10:36:08', '2022-02-11 10:36:08'),
(182, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-02-24', NULL, '0.00', 0, '2022-02-11 10:36:08', '2022-02-11 10:36:08'),
(183, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-03-03', NULL, '0.00', 0, '2022-02-11 10:36:09', '2022-02-11 10:36:09'),
(184, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-03-10', NULL, '0.00', 0, '2022-02-11 10:36:09', '2022-02-11 10:36:09'),
(185, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-03-17', NULL, '0.00', 0, '2022-02-11 10:36:09', '2022-02-11 10:36:09'),
(186, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-03-24', NULL, '0.00', 0, '2022-02-11 10:36:09', '2022-02-11 10:36:09'),
(187, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-03-31', NULL, '0.00', 0, '2022-02-11 10:36:09', '2022-02-11 10:36:09'),
(188, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-04-07', NULL, '0.00', 0, '2022-02-11 10:36:09', '2022-02-11 10:36:09'),
(189, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-04-14', NULL, '0.00', 0, '2022-02-11 10:36:09', '2022-02-11 10:36:09'),
(190, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-04-21', NULL, '0.00', 0, '2022-02-11 10:36:09', '2022-02-11 10:36:09'),
(191, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-04-28', NULL, '0.00', 0, '2022-02-11 10:36:09', '2022-02-11 10:36:09'),
(192, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-05-05', NULL, '0.00', 0, '2022-02-11 10:36:09', '2022-02-11 10:36:09'),
(193, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-05-12', NULL, '0.00', 0, '2022-02-11 10:36:09', '2022-02-11 10:36:09'),
(194, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-05-19', NULL, '0.00', 0, '2022-02-11 10:36:09', '2022-02-11 10:36:09'),
(195, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-05-26', NULL, '0.00', 0, '2022-02-11 10:36:09', '2022-02-11 10:36:09'),
(196, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-06-02', NULL, '0.00', 0, '2022-02-11 10:36:09', '2022-02-11 10:36:09'),
(197, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-06-09', NULL, '0.00', 0, '2022-02-11 10:36:09', '2022-02-11 10:36:09'),
(198, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-06-16', NULL, '0.00', 0, '2022-02-11 10:36:09', '2022-02-11 10:36:09'),
(199, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-06-23', NULL, '0.00', 0, '2022-02-11 10:36:09', '2022-02-11 10:36:09'),
(200, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-06-30', NULL, '0.00', 0, '2022-02-11 10:36:09', '2022-02-11 10:36:09'),
(201, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-07-07', NULL, '0.00', 0, '2022-02-11 10:36:09', '2022-02-11 10:36:09'),
(202, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-07-14', NULL, '0.00', 0, '2022-02-11 10:36:09', '2022-02-11 10:36:09'),
(203, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-07-21', NULL, '0.00', 0, '2022-02-11 10:36:09', '2022-02-11 10:36:09'),
(204, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-07-28', NULL, '0.00', 0, '2022-02-11 10:36:09', '2022-02-11 10:36:09'),
(205, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-08-04', NULL, '0.00', 0, '2022-02-11 10:36:09', '2022-02-11 10:36:09'),
(206, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-08-11', NULL, '0.00', 0, '2022-02-11 10:36:09', '2022-02-11 10:36:09'),
(207, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-08-18', NULL, '0.00', 0, '2022-02-11 10:36:09', '2022-02-11 10:36:09'),
(208, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-08-25', NULL, '0.00', 0, '2022-02-11 10:36:10', '2022-02-11 10:36:10'),
(209, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-09-01', NULL, '0.00', 0, '2022-02-11 10:36:10', '2022-02-11 10:36:10'),
(210, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-09-08', NULL, '0.00', 0, '2022-02-11 10:36:10', '2022-02-11 10:36:10'),
(211, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-09-15', NULL, '0.00', 0, '2022-02-11 10:36:10', '2022-02-11 10:36:10'),
(212, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-09-22', NULL, '0.00', 0, '2022-02-11 10:36:10', '2022-02-11 10:36:10'),
(213, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-09-29', NULL, '0.00', 0, '2022-02-11 10:36:10', '2022-02-11 10:36:10'),
(214, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-10-06', NULL, '0.00', 0, '2022-02-11 10:36:10', '2022-02-11 10:36:10'),
(215, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-10-13', NULL, '0.00', 0, '2022-02-11 10:36:10', '2022-02-11 10:36:10'),
(216, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-10-20', NULL, '0.00', 0, '2022-02-11 10:36:10', '2022-02-11 10:36:10'),
(217, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-10-27', NULL, '0.00', 0, '2022-02-11 10:36:10', '2022-02-11 10:36:10'),
(218, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-11-03', NULL, '0.00', 0, '2022-02-11 10:36:10', '2022-02-11 10:36:10'),
(219, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-11-10', NULL, '0.00', 0, '2022-02-11 10:36:10', '2022-02-11 10:36:10'),
(220, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-11-17', NULL, '0.00', 0, '2022-02-11 10:36:10', '2022-02-11 10:36:10'),
(221, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-11-24', NULL, '0.00', 0, '2022-02-11 10:36:10', '2022-02-11 10:36:10'),
(222, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-12-01', NULL, '0.00', 0, '2022-02-11 10:36:10', '2022-02-11 10:36:10'),
(223, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-12-08', NULL, '0.00', 0, '2022-02-11 10:36:10', '2022-02-11 10:36:10'),
(224, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-12-15', NULL, '0.00', 0, '2022-02-11 10:36:10', '2022-02-11 10:36:10'),
(225, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-12-22', NULL, '0.00', 0, '2022-02-11 10:36:10', '2022-02-11 10:36:10'),
(226, 49, 1, '221.13', NULL, '18.24', '239.37', '2023-12-29', NULL, '0.00', 0, '2022-02-11 10:36:10', '2022-02-11 10:36:10'),
(227, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-01-05', NULL, '0.00', 0, '2022-02-11 10:36:10', '2022-02-11 10:36:10'),
(228, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-01-12', NULL, '0.00', 0, '2022-02-11 10:36:11', '2022-02-11 10:36:11'),
(229, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-01-19', NULL, '0.00', 0, '2022-02-11 10:36:11', '2022-02-11 10:36:11'),
(230, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-01-26', NULL, '0.00', 0, '2022-02-11 10:36:11', '2022-02-11 10:36:11'),
(231, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-02-02', NULL, '0.00', 0, '2022-02-11 10:36:11', '2022-02-11 10:36:11'),
(232, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-02-09', NULL, '0.00', 0, '2022-02-11 10:36:11', '2022-02-11 10:36:11'),
(233, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-02-16', NULL, '0.00', 0, '2022-02-11 10:36:11', '2022-02-11 10:36:11'),
(234, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-02-23', NULL, '0.00', 0, '2022-02-11 10:36:11', '2022-02-11 10:36:11'),
(235, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-03-01', NULL, '0.00', 0, '2022-02-11 10:36:11', '2022-02-11 10:36:11'),
(236, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-03-08', NULL, '0.00', 0, '2022-02-11 10:36:11', '2022-02-11 10:36:11'),
(237, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-03-15', NULL, '0.00', 0, '2022-02-11 10:36:11', '2022-02-11 10:36:11'),
(238, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-03-22', NULL, '0.00', 0, '2022-02-11 10:36:11', '2022-02-11 10:36:11'),
(239, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-03-29', NULL, '0.00', 0, '2022-02-11 10:36:11', '2022-02-11 10:36:11'),
(240, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-04-05', NULL, '0.00', 0, '2022-02-11 10:36:11', '2022-02-11 10:36:11'),
(241, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-04-12', NULL, '0.00', 0, '2022-02-11 10:36:11', '2022-02-11 10:36:11'),
(242, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-04-19', NULL, '0.00', 0, '2022-02-11 10:36:11', '2022-02-11 10:36:11'),
(243, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-04-26', NULL, '0.00', 0, '2022-02-11 10:36:11', '2022-02-11 10:36:11'),
(244, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-05-03', NULL, '0.00', 0, '2022-02-11 10:36:11', '2022-02-11 10:36:11'),
(245, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-05-10', NULL, '0.00', 0, '2022-02-11 10:36:12', '2022-02-11 10:36:12'),
(246, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-05-17', NULL, '0.00', 0, '2022-02-11 10:36:12', '2022-02-11 10:36:12'),
(247, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-05-24', NULL, '0.00', 0, '2022-02-11 10:36:12', '2022-02-11 10:36:12'),
(248, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-05-31', NULL, '0.00', 0, '2022-02-11 10:36:12', '2022-02-11 10:36:12'),
(249, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-06-07', NULL, '0.00', 0, '2022-02-11 10:36:12', '2022-02-11 10:36:12'),
(250, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-06-14', NULL, '0.00', 0, '2022-02-11 10:36:12', '2022-02-11 10:36:12'),
(251, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-06-21', NULL, '0.00', 0, '2022-02-11 10:36:12', '2022-02-11 10:36:12'),
(252, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-06-28', NULL, '0.00', 0, '2022-02-11 10:36:12', '2022-02-11 10:36:12'),
(253, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-07-05', NULL, '0.00', 0, '2022-02-11 10:36:12', '2022-02-11 10:36:12'),
(254, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-07-12', NULL, '0.00', 0, '2022-02-11 10:36:12', '2022-02-11 10:36:12'),
(255, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-07-19', NULL, '0.00', 0, '2022-02-11 10:36:12', '2022-02-11 10:36:12'),
(256, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-07-26', NULL, '0.00', 0, '2022-02-11 10:36:12', '2022-02-11 10:36:12'),
(257, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-08-02', NULL, '0.00', 0, '2022-02-11 10:36:12', '2022-02-11 10:36:12'),
(258, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-08-09', NULL, '0.00', 0, '2022-02-11 10:36:12', '2022-02-11 10:36:12'),
(259, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-08-16', NULL, '0.00', 0, '2022-02-11 10:36:12', '2022-02-11 10:36:12'),
(260, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-08-23', NULL, '0.00', 0, '2022-02-11 10:36:12', '2022-02-11 10:36:12'),
(261, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-08-30', NULL, '0.00', 0, '2022-02-11 10:36:12', '2022-02-11 10:36:12'),
(262, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-09-06', NULL, '0.00', 0, '2022-02-11 10:36:13', '2022-02-11 10:36:13'),
(263, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-09-13', NULL, '0.00', 0, '2022-02-11 10:36:13', '2022-02-11 10:36:13'),
(264, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-09-20', NULL, '0.00', 0, '2022-02-11 10:36:13', '2022-02-11 10:36:13'),
(265, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-09-27', NULL, '0.00', 0, '2022-02-11 10:36:13', '2022-02-11 10:36:13'),
(266, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-10-04', NULL, '0.00', 0, '2022-02-11 10:36:13', '2022-02-11 10:36:13'),
(267, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-10-11', NULL, '0.00', 0, '2022-02-11 10:36:13', '2022-02-11 10:36:13'),
(268, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-10-18', NULL, '0.00', 0, '2022-02-11 10:36:13', '2022-02-11 10:36:13'),
(269, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-10-25', NULL, '0.00', 0, '2022-02-11 10:36:13', '2022-02-11 10:36:13'),
(270, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-11-01', NULL, '0.00', 0, '2022-02-11 10:36:13', '2022-02-11 10:36:13'),
(271, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-11-08', NULL, '0.00', 0, '2022-02-11 10:36:13', '2022-02-11 10:36:13'),
(272, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-11-15', NULL, '0.00', 0, '2022-02-11 10:36:13', '2022-02-11 10:36:13'),
(273, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-11-22', NULL, '0.00', 0, '2022-02-11 10:36:13', '2022-02-11 10:36:13'),
(274, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-11-29', NULL, '0.00', 0, '2022-02-11 10:36:13', '2022-02-11 10:36:13'),
(275, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-12-06', NULL, '0.00', 0, '2022-02-11 10:36:13', '2022-02-11 10:36:13'),
(276, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-12-13', NULL, '0.00', 0, '2022-02-11 10:36:13', '2022-02-11 10:36:13'),
(277, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-12-20', NULL, '0.00', 0, '2022-02-11 10:36:13', '2022-02-11 10:36:13'),
(278, 49, 1, '221.13', NULL, '18.24', '239.37', '2024-12-27', NULL, '0.00', 0, '2022-02-11 10:36:13', '2022-02-11 10:36:13'),
(279, 49, 1, '221.13', NULL, '18.24', '239.37', '2025-01-03', NULL, '0.00', 0, '2022-02-11 10:36:13', '2022-02-11 10:36:13'),
(280, 49, 1, '221.13', NULL, '18.24', '239.37', '2025-01-10', NULL, '0.00', 0, '2022-02-11 10:36:13', '2022-02-11 10:36:13'),
(281, 49, 1, '221.13', NULL, '18.24', '239.37', '2025-01-17', NULL, '0.00', 0, '2022-02-11 10:36:13', '2022-02-11 10:36:13'),
(282, 49, 1, '221.13', NULL, '18.24', '239.37', '2025-01-24', NULL, '0.00', 0, '2022-02-11 10:36:13', '2022-02-11 10:36:13'),
(283, 49, 1, '221.13', NULL, '18.24', '239.37', '2025-01-31', NULL, '0.00', 0, '2022-02-11 10:36:13', '2022-02-11 10:36:13'),
(284, 49, 1, '221.13', NULL, '18.24', '239.37', '2025-02-07', NULL, '0.00', 0, '2022-02-11 10:36:14', '2022-02-11 10:36:14'),
(285, 50, 2, '32.09', NULL, '2.65', '34.74', '2022-02-26', NULL, '0.00', 0, '2022-02-11 10:40:42', '2022-02-11 10:40:42'),
(286, 50, 2, '32.09', NULL, '2.65', '34.74', '2022-03-13', NULL, '0.00', 0, '2022-02-11 10:40:43', '2022-02-11 10:40:43'),
(287, 50, 2, '32.09', NULL, '2.65', '34.74', '2022-03-28', NULL, '0.00', 0, '2022-02-11 10:40:43', '2022-02-11 10:40:43'),
(288, 50, 2, '32.09', NULL, '2.65', '34.74', '2022-04-12', NULL, '0.00', 0, '2022-02-11 10:40:43', '2022-02-11 10:40:43'),
(289, 50, 2, '32.09', NULL, '2.65', '34.74', '2022-04-27', NULL, '0.00', 0, '2022-02-11 10:40:43', '2022-02-11 10:40:43'),
(290, 50, 2, '32.09', NULL, '2.65', '34.74', '2022-05-12', NULL, '0.00', 0, '2022-02-11 10:40:43', '2022-02-11 10:40:43'),
(291, 50, 2, '32.09', NULL, '2.65', '34.74', '2022-05-27', NULL, '0.00', 0, '2022-02-11 10:40:43', '2022-02-11 10:40:43'),
(292, 50, 2, '32.09', NULL, '2.65', '34.74', '2022-06-11', NULL, '0.00', 0, '2022-02-11 10:40:44', '2022-02-11 10:40:44'),
(293, 50, 2, '32.09', NULL, '2.65', '34.74', '2022-06-26', NULL, '0.00', 0, '2022-02-11 10:40:44', '2022-02-11 10:40:44'),
(294, 50, 2, '32.09', NULL, '2.65', '34.74', '2022-07-11', NULL, '0.00', 0, '2022-02-11 10:40:44', '2022-02-11 10:40:44'),
(295, 50, 2, '32.09', NULL, '2.65', '34.74', '2022-07-26', NULL, '0.00', 0, '2022-02-11 10:40:44', '2022-02-11 10:40:44'),
(296, 50, 2, '32.09', NULL, '2.65', '34.74', '2022-08-10', NULL, '0.00', 0, '2022-02-11 10:40:44', '2022-02-11 10:40:44'),
(297, 50, 2, '32.09', NULL, '2.65', '34.74', '2022-08-25', NULL, '0.00', 0, '2022-02-11 10:40:44', '2022-02-11 10:40:44'),
(298, 50, 2, '32.09', NULL, '2.65', '34.74', '2022-09-09', NULL, '0.00', 0, '2022-02-11 10:40:44', '2022-02-11 10:40:44'),
(299, 50, 2, '32.09', NULL, '2.65', '34.74', '2022-09-24', NULL, '0.00', 0, '2022-02-11 10:40:44', '2022-02-11 10:40:44'),
(300, 50, 2, '32.09', NULL, '2.65', '34.74', '2022-10-09', NULL, '0.00', 0, '2022-02-11 10:40:44', '2022-02-11 10:40:44'),
(301, 50, 2, '32.09', NULL, '2.65', '34.74', '2022-10-24', NULL, '0.00', 0, '2022-02-11 10:40:44', '2022-02-11 10:40:44'),
(302, 50, 2, '32.09', NULL, '2.65', '34.74', '2022-11-08', NULL, '0.00', 0, '2022-02-11 10:40:44', '2022-02-11 10:40:44'),
(303, 50, 2, '32.09', NULL, '2.65', '34.74', '2022-11-23', NULL, '0.00', 0, '2022-02-11 10:40:44', '2022-02-11 10:40:44'),
(304, 50, 2, '32.09', NULL, '2.65', '34.74', '2022-12-08', NULL, '0.00', 0, '2022-02-11 10:40:44', '2022-02-11 10:40:44'),
(305, 50, 2, '32.09', NULL, '2.65', '34.74', '2022-12-23', NULL, '0.00', 0, '2022-02-11 10:40:44', '2022-02-11 10:40:44'),
(306, 50, 2, '32.09', NULL, '2.65', '34.74', '2023-01-07', NULL, '0.00', 0, '2022-02-11 10:40:44', '2022-02-11 10:40:44'),
(307, 50, 2, '32.09', NULL, '2.65', '34.74', '2023-01-22', NULL, '0.00', 0, '2022-02-11 10:40:45', '2022-02-11 10:40:45'),
(308, 50, 2, '32.09', NULL, '2.65', '34.74', '2023-02-06', NULL, '0.00', 0, '2022-02-11 10:40:45', '2022-02-11 10:40:45'),
(309, 50, 2, '32.09', NULL, '2.65', '34.74', '2023-02-21', NULL, '0.00', 0, '2022-02-11 10:40:45', '2022-02-11 10:40:45'),
(310, 50, 2, '32.09', NULL, '2.65', '34.74', '2023-03-08', NULL, '0.00', 0, '2022-02-11 10:40:45', '2022-02-11 10:40:45'),
(311, 50, 2, '32.09', NULL, '2.65', '34.74', '2023-03-23', NULL, '0.00', 0, '2022-02-11 10:40:45', '2022-02-11 10:40:45'),
(312, 50, 2, '32.09', NULL, '2.65', '34.74', '2023-04-07', NULL, '0.00', 0, '2022-02-11 10:40:45', '2022-02-11 10:40:45'),
(313, 50, 2, '32.09', NULL, '2.65', '34.74', '2023-04-22', NULL, '0.00', 0, '2022-02-11 10:40:45', '2022-02-11 10:40:45'),
(314, 50, 2, '32.09', NULL, '2.65', '34.74', '2023-05-07', NULL, '0.00', 0, '2022-02-11 10:40:45', '2022-02-11 10:40:45'),
(315, 50, 2, '32.09', NULL, '2.65', '34.74', '2023-05-22', NULL, '0.00', 0, '2022-02-11 10:40:45', '2022-02-11 10:40:45'),
(316, 50, 2, '32.09', NULL, '2.65', '34.74', '2023-06-06', NULL, '0.00', 0, '2022-02-11 10:40:45', '2022-02-11 10:40:45'),
(317, 50, 2, '32.09', NULL, '2.65', '34.74', '2023-06-21', NULL, '0.00', 0, '2022-02-11 10:40:45', '2022-02-11 10:40:45'),
(318, 50, 2, '32.09', NULL, '2.65', '34.74', '2023-07-06', NULL, '0.00', 0, '2022-02-11 10:40:45', '2022-02-11 10:40:45'),
(319, 50, 2, '32.09', NULL, '2.65', '34.74', '2023-07-21', NULL, '0.00', 0, '2022-02-11 10:40:45', '2022-02-11 10:40:45'),
(320, 50, 2, '32.09', NULL, '2.65', '34.74', '2023-08-05', NULL, '0.00', 0, '2022-02-11 10:40:45', '2022-02-11 10:40:45'),
(321, 50, 2, '32.09', NULL, '2.65', '34.74', '2023-08-20', NULL, '0.00', 0, '2022-02-11 10:40:45', '2022-02-11 10:40:45'),
(322, 50, 2, '32.09', NULL, '2.65', '34.74', '2023-09-04', NULL, '0.00', 0, '2022-02-11 10:40:45', '2022-02-11 10:40:45'),
(323, 50, 2, '32.09', NULL, '2.65', '34.74', '2023-09-19', NULL, '0.00', 0, '2022-02-11 10:40:45', '2022-02-11 10:40:45'),
(324, 50, 2, '32.09', NULL, '2.65', '34.74', '2023-10-04', NULL, '0.00', 0, '2022-02-11 10:40:46', '2022-02-11 10:40:46'),
(325, 50, 2, '32.09', NULL, '2.65', '34.74', '2023-10-19', NULL, '0.00', 0, '2022-02-11 10:40:46', '2022-02-11 10:40:46'),
(326, 50, 2, '32.09', NULL, '2.65', '34.74', '2023-11-03', NULL, '0.00', 0, '2022-02-11 10:40:46', '2022-02-11 10:40:46'),
(327, 50, 2, '32.09', NULL, '2.65', '34.74', '2023-11-18', NULL, '0.00', 0, '2022-02-11 10:40:46', '2022-02-11 10:40:46'),
(328, 50, 2, '32.09', NULL, '2.65', '34.74', '2023-12-03', NULL, '0.00', 0, '2022-02-11 10:40:46', '2022-02-11 10:40:46'),
(329, 50, 2, '32.09', NULL, '2.65', '34.74', '2023-12-18', NULL, '0.00', 0, '2022-02-11 10:40:46', '2022-02-11 10:40:46'),
(330, 50, 2, '32.09', NULL, '2.65', '34.74', '2024-01-02', NULL, '0.00', 0, '2022-02-11 10:40:46', '2022-02-11 10:40:46'),
(331, 50, 2, '32.09', NULL, '2.65', '34.74', '2024-01-17', NULL, '0.00', 0, '2022-02-11 10:40:46', '2022-02-11 10:40:46'),
(332, 50, 2, '32.09', NULL, '2.65', '34.74', '2024-02-01', NULL, '0.00', 0, '2022-02-11 10:40:46', '2022-02-11 10:40:46'),
(333, 50, 2, '32.09', NULL, '2.65', '34.74', '2024-02-16', NULL, '0.00', 0, '2022-02-11 10:40:46', '2022-02-11 10:40:46'),
(334, 50, 2, '32.09', NULL, '2.65', '34.74', '2024-03-02', NULL, '0.00', 0, '2022-02-11 10:40:46', '2022-02-11 10:40:46'),
(335, 50, 2, '32.09', NULL, '2.65', '34.74', '2024-03-17', NULL, '0.00', 0, '2022-02-11 10:40:46', '2022-02-11 10:40:46'),
(336, 50, 2, '32.09', NULL, '2.65', '34.74', '2024-04-01', NULL, '0.00', 0, '2022-02-11 10:40:46', '2022-02-11 10:40:46'),
(337, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-02-18', NULL, '0.00', 0, '2022-02-11 11:49:43', '2022-02-11 11:49:43'),
(338, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-02-25', NULL, '0.00', 0, '2022-02-11 11:49:43', '2022-02-11 11:49:43'),
(339, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-03-04', NULL, '0.00', 0, '2022-02-11 11:49:43', '2022-02-11 11:49:43'),
(340, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-03-11', NULL, '0.00', 0, '2022-02-11 11:49:43', '2022-02-11 11:49:43'),
(341, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-03-18', NULL, '0.00', 0, '2022-02-11 11:49:43', '2022-02-11 11:49:43'),
(342, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-03-25', NULL, '0.00', 0, '2022-02-11 11:49:43', '2022-02-11 11:49:43'),
(343, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-04-01', NULL, '0.00', 0, '2022-02-11 11:49:43', '2022-02-11 11:49:43'),
(344, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-04-08', NULL, '0.00', 0, '2022-02-11 11:49:43', '2022-02-11 11:49:43'),
(345, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-04-15', NULL, '0.00', 0, '2022-02-11 11:49:43', '2022-02-11 11:49:43'),
(346, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-04-22', NULL, '0.00', 0, '2022-02-11 11:49:43', '2022-02-11 11:49:43'),
(347, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-04-29', NULL, '0.00', 0, '2022-02-11 11:49:43', '2022-02-11 11:49:43'),
(348, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-05-06', NULL, '0.00', 0, '2022-02-11 11:49:43', '2022-02-11 11:49:43'),
(349, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-05-13', NULL, '0.00', 0, '2022-02-11 11:49:43', '2022-02-11 11:49:43'),
(350, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-05-20', NULL, '0.00', 0, '2022-02-11 11:49:43', '2022-02-11 11:49:43'),
(351, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-05-27', NULL, '0.00', 0, '2022-02-11 11:49:43', '2022-02-11 11:49:43'),
(352, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-06-03', NULL, '0.00', 0, '2022-02-11 11:49:43', '2022-02-11 11:49:43'),
(353, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-06-10', NULL, '0.00', 0, '2022-02-11 11:49:43', '2022-02-11 11:49:43'),
(354, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-06-17', NULL, '0.00', 0, '2022-02-11 11:49:43', '2022-02-11 11:49:43'),
(355, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-06-24', NULL, '0.00', 0, '2022-02-11 11:49:43', '2022-02-11 11:49:43'),
(356, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-07-01', NULL, '0.00', 0, '2022-02-11 11:49:43', '2022-02-11 11:49:43'),
(357, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-07-08', NULL, '0.00', 0, '2022-02-11 11:49:43', '2022-02-11 11:49:43'),
(358, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-07-15', NULL, '0.00', 0, '2022-02-11 11:49:44', '2022-02-11 11:49:44'),
(359, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-07-22', NULL, '0.00', 0, '2022-02-11 11:49:44', '2022-02-11 11:49:44'),
(360, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-07-29', NULL, '0.00', 0, '2022-02-11 11:49:44', '2022-02-11 11:49:44'),
(361, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-08-05', NULL, '0.00', 0, '2022-02-11 11:49:44', '2022-02-11 11:49:44'),
(362, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-08-12', NULL, '0.00', 0, '2022-02-11 11:49:44', '2022-02-11 11:49:44'),
(363, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-08-19', NULL, '0.00', 0, '2022-02-11 11:49:44', '2022-02-11 11:49:44'),
(364, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-08-26', NULL, '0.00', 0, '2022-02-11 11:49:44', '2022-02-11 11:49:44'),
(365, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-09-02', NULL, '0.00', 0, '2022-02-11 11:49:44', '2022-02-11 11:49:44'),
(366, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-09-09', NULL, '0.00', 0, '2022-02-11 11:49:44', '2022-02-11 11:49:44'),
(367, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-09-16', NULL, '0.00', 0, '2022-02-11 11:49:44', '2022-02-11 11:49:44'),
(368, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-09-23', NULL, '0.00', 0, '2022-02-11 11:49:44', '2022-02-11 11:49:44'),
(369, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-09-30', NULL, '0.00', 0, '2022-02-11 11:49:44', '2022-02-11 11:49:44'),
(370, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-10-07', NULL, '0.00', 0, '2022-02-11 11:49:44', '2022-02-11 11:49:44'),
(371, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-10-14', NULL, '0.00', 0, '2022-02-11 11:49:44', '2022-02-11 11:49:44'),
(372, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-10-21', NULL, '0.00', 0, '2022-02-11 11:49:45', '2022-02-11 11:49:45'),
(373, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-10-28', NULL, '0.00', 0, '2022-02-11 11:49:45', '2022-02-11 11:49:45'),
(374, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-11-04', NULL, '0.00', 0, '2022-02-11 11:49:45', '2022-02-11 11:49:45'),
(375, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-11-11', NULL, '0.00', 0, '2022-02-11 11:49:45', '2022-02-11 11:49:45'),
(376, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-11-18', NULL, '0.00', 0, '2022-02-11 11:49:45', '2022-02-11 11:49:45'),
(377, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-11-25', NULL, '0.00', 0, '2022-02-11 11:49:45', '2022-02-11 11:49:45'),
(378, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-12-02', NULL, '0.00', 0, '2022-02-11 11:49:45', '2022-02-11 11:49:45'),
(379, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-12-09', NULL, '0.00', 0, '2022-02-11 11:49:45', '2022-02-11 11:49:45'),
(380, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-12-16', NULL, '0.00', 0, '2022-02-11 11:49:45', '2022-02-11 11:49:45'),
(381, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-12-23', NULL, '0.00', 0, '2022-02-11 11:49:45', '2022-02-11 11:49:45'),
(382, 51, 1, '25.41', NULL, '2.10', '27.51', '2022-12-30', NULL, '0.00', 0, '2022-02-11 11:49:45', '2022-02-11 11:49:45'),
(383, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-01-06', NULL, '0.00', 0, '2022-02-11 11:49:45', '2022-02-11 11:49:45'),
(384, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-01-13', NULL, '0.00', 0, '2022-02-11 11:49:45', '2022-02-11 11:49:45'),
(385, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-01-20', NULL, '0.00', 0, '2022-02-11 11:49:45', '2022-02-11 11:49:45'),
(386, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-01-27', NULL, '0.00', 0, '2022-02-11 11:49:45', '2022-02-11 11:49:45'),
(387, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-02-03', NULL, '0.00', 0, '2022-02-11 11:49:45', '2022-02-11 11:49:45'),
(388, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-02-10', NULL, '0.00', 0, '2022-02-11 11:49:45', '2022-02-11 11:49:45'),
(389, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-02-17', NULL, '0.00', 0, '2022-02-11 11:49:45', '2022-02-11 11:49:45'),
(390, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-02-24', NULL, '0.00', 0, '2022-02-11 11:49:45', '2022-02-11 11:49:45'),
(391, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-03-03', NULL, '0.00', 0, '2022-02-11 11:49:45', '2022-02-11 11:49:45'),
(392, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-03-10', NULL, '0.00', 0, '2022-02-11 11:49:46', '2022-02-11 11:49:46'),
(393, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-03-17', NULL, '0.00', 0, '2022-02-11 11:49:46', '2022-02-11 11:49:46'),
(394, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-03-24', NULL, '0.00', 0, '2022-02-11 11:49:46', '2022-02-11 11:49:46'),
(395, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-03-31', NULL, '0.00', 0, '2022-02-11 11:49:46', '2022-02-11 11:49:46'),
(396, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-04-07', NULL, '0.00', 0, '2022-02-11 11:49:46', '2022-02-11 11:49:46'),
(397, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-04-14', NULL, '0.00', 0, '2022-02-11 11:49:47', '2022-02-11 11:49:47'),
(398, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-04-21', NULL, '0.00', 0, '2022-02-11 11:49:47', '2022-02-11 11:49:47'),
(399, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-04-28', NULL, '0.00', 0, '2022-02-11 11:49:47', '2022-02-11 11:49:47'),
(400, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-05-05', NULL, '0.00', 0, '2022-02-11 11:49:47', '2022-02-11 11:49:47'),
(401, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-05-12', NULL, '0.00', 0, '2022-02-11 11:49:47', '2022-02-11 11:49:47'),
(402, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-05-19', NULL, '0.00', 0, '2022-02-11 11:49:47', '2022-02-11 11:49:47'),
(403, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-05-26', NULL, '0.00', 0, '2022-02-11 11:49:47', '2022-02-11 11:49:47'),
(404, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-06-02', NULL, '0.00', 0, '2022-02-11 11:49:47', '2022-02-11 11:49:47'),
(405, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-06-09', NULL, '0.00', 0, '2022-02-11 11:49:47', '2022-02-11 11:49:47'),
(406, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-06-16', NULL, '0.00', 0, '2022-02-11 11:49:47', '2022-02-11 11:49:47'),
(407, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-06-23', NULL, '0.00', 0, '2022-02-11 11:49:47', '2022-02-11 11:49:47'),
(408, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-06-30', NULL, '0.00', 0, '2022-02-11 11:49:47', '2022-02-11 11:49:47'),
(409, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-07-07', NULL, '0.00', 0, '2022-02-11 11:49:47', '2022-02-11 11:49:47');
INSERT INTO `invoices` (`id`, `contract_id`, `customer_id`, `amount`, `fee`, `sales_tax`, `total_amount_to_pay`, `due_date`, `paid_date`, `late_fee`, `status`, `created_at`, `updated_at`) VALUES
(410, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-07-14', NULL, '0.00', 0, '2022-02-11 11:49:47', '2022-02-11 11:49:47'),
(411, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-07-21', NULL, '0.00', 0, '2022-02-11 11:49:47', '2022-02-11 11:49:47'),
(412, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-07-28', NULL, '0.00', 0, '2022-02-11 11:49:47', '2022-02-11 11:49:47'),
(413, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-08-04', NULL, '0.00', 0, '2022-02-11 11:49:47', '2022-02-11 11:49:47'),
(414, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-08-11', NULL, '0.00', 0, '2022-02-11 11:49:47', '2022-02-11 11:49:47'),
(415, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-08-18', NULL, '0.00', 0, '2022-02-11 11:49:47', '2022-02-11 11:49:47'),
(416, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-08-25', NULL, '0.00', 0, '2022-02-11 11:49:48', '2022-02-11 11:49:48'),
(417, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-09-01', NULL, '0.00', 0, '2022-02-11 11:49:48', '2022-02-11 11:49:48'),
(418, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-09-08', NULL, '0.00', 0, '2022-02-11 11:49:48', '2022-02-11 11:49:48'),
(419, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-09-15', NULL, '0.00', 0, '2022-02-11 11:49:48', '2022-02-11 11:49:48'),
(420, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-09-22', NULL, '0.00', 0, '2022-02-11 11:49:48', '2022-02-11 11:49:48'),
(421, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-09-29', NULL, '0.00', 0, '2022-02-11 11:49:48', '2022-02-11 11:49:48'),
(422, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-10-06', NULL, '0.00', 0, '2022-02-11 11:49:48', '2022-02-11 11:49:48'),
(423, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-10-13', NULL, '0.00', 0, '2022-02-11 11:49:48', '2022-02-11 11:49:48'),
(424, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-10-20', NULL, '0.00', 0, '2022-02-11 11:49:48', '2022-02-11 11:49:48'),
(425, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-10-27', NULL, '0.00', 0, '2022-02-11 11:49:48', '2022-02-11 11:49:48'),
(426, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-11-03', NULL, '0.00', 0, '2022-02-11 11:49:48', '2022-02-11 11:49:48'),
(427, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-11-10', NULL, '0.00', 0, '2022-02-11 11:49:48', '2022-02-11 11:49:48'),
(428, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-11-17', NULL, '0.00', 0, '2022-02-11 11:49:48', '2022-02-11 11:49:48'),
(429, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-11-24', NULL, '0.00', 0, '2022-02-11 11:49:48', '2022-02-11 11:49:48'),
(430, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-12-01', NULL, '0.00', 0, '2022-02-11 11:49:48', '2022-02-11 11:49:48'),
(431, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-12-08', NULL, '0.00', 0, '2022-02-11 11:49:48', '2022-02-11 11:49:48'),
(432, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-12-15', NULL, '0.00', 0, '2022-02-11 11:49:48', '2022-02-11 11:49:48'),
(433, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-12-22', NULL, '0.00', 0, '2022-02-11 11:49:48', '2022-02-11 11:49:48'),
(434, 51, 1, '25.41', NULL, '2.10', '27.51', '2023-12-29', NULL, '0.00', 0, '2022-02-11 11:49:48', '2022-02-11 11:49:48'),
(435, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-01-05', NULL, '0.00', 0, '2022-02-11 11:49:48', '2022-02-11 11:49:48'),
(436, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-01-12', NULL, '0.00', 0, '2022-02-11 11:49:48', '2022-02-11 11:49:48'),
(437, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-01-19', NULL, '0.00', 0, '2022-02-11 11:49:48', '2022-02-11 11:49:48'),
(438, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-01-26', NULL, '0.00', 0, '2022-02-11 11:49:48', '2022-02-11 11:49:48'),
(439, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-02-02', NULL, '0.00', 0, '2022-02-11 11:49:49', '2022-02-11 11:49:49'),
(440, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-02-09', NULL, '0.00', 0, '2022-02-11 11:49:49', '2022-02-11 11:49:49'),
(441, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-02-16', NULL, '0.00', 0, '2022-02-11 11:49:49', '2022-02-11 11:49:49'),
(442, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-02-23', NULL, '0.00', 0, '2022-02-11 11:49:49', '2022-02-11 11:49:49'),
(443, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-03-01', NULL, '0.00', 0, '2022-02-11 11:49:49', '2022-02-11 11:49:49'),
(444, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-03-08', NULL, '0.00', 0, '2022-02-11 11:49:49', '2022-02-11 11:49:49'),
(445, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-03-15', NULL, '0.00', 0, '2022-02-11 11:49:49', '2022-02-11 11:49:49'),
(446, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-03-22', NULL, '0.00', 0, '2022-02-11 11:49:49', '2022-02-11 11:49:49'),
(447, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-03-29', NULL, '0.00', 0, '2022-02-11 11:49:49', '2022-02-11 11:49:49'),
(448, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-04-05', NULL, '0.00', 0, '2022-02-11 11:49:49', '2022-02-11 11:49:49'),
(449, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-04-12', NULL, '0.00', 0, '2022-02-11 11:49:49', '2022-02-11 11:49:49'),
(450, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-04-19', NULL, '0.00', 0, '2022-02-11 11:49:49', '2022-02-11 11:49:49'),
(451, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-04-26', NULL, '0.00', 0, '2022-02-11 11:49:49', '2022-02-11 11:49:49'),
(452, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-05-03', NULL, '0.00', 0, '2022-02-11 11:49:49', '2022-02-11 11:49:49'),
(453, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-05-10', NULL, '0.00', 0, '2022-02-11 11:49:49', '2022-02-11 11:49:49'),
(454, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-05-17', NULL, '0.00', 0, '2022-02-11 11:49:49', '2022-02-11 11:49:49'),
(455, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-05-24', NULL, '0.00', 0, '2022-02-11 11:49:49', '2022-02-11 11:49:49'),
(456, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-05-31', NULL, '0.00', 0, '2022-02-11 11:49:49', '2022-02-11 11:49:49'),
(457, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-06-07', NULL, '0.00', 0, '2022-02-11 11:49:49', '2022-02-11 11:49:49'),
(458, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-06-14', NULL, '0.00', 0, '2022-02-11 11:49:49', '2022-02-11 11:49:49'),
(459, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-06-21', NULL, '0.00', 0, '2022-02-11 11:49:49', '2022-02-11 11:49:49'),
(460, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-06-28', NULL, '0.00', 0, '2022-02-11 11:49:49', '2022-02-11 11:49:49'),
(461, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-07-05', NULL, '0.00', 0, '2022-02-11 11:49:49', '2022-02-11 11:49:49'),
(462, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-07-12', NULL, '0.00', 0, '2022-02-11 11:49:49', '2022-02-11 11:49:49'),
(463, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-07-19', NULL, '0.00', 0, '2022-02-11 11:49:49', '2022-02-11 11:49:49'),
(464, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-07-26', NULL, '0.00', 0, '2022-02-11 11:49:49', '2022-02-11 11:49:49'),
(465, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-08-02', NULL, '0.00', 0, '2022-02-11 11:49:49', '2022-02-11 11:49:49'),
(466, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-08-09', NULL, '0.00', 0, '2022-02-11 11:49:50', '2022-02-11 11:49:50'),
(467, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-08-16', NULL, '0.00', 0, '2022-02-11 11:49:50', '2022-02-11 11:49:50'),
(468, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-08-23', NULL, '0.00', 0, '2022-02-11 11:49:50', '2022-02-11 11:49:50'),
(469, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-08-30', NULL, '0.00', 0, '2022-02-11 11:49:50', '2022-02-11 11:49:50'),
(470, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-09-06', NULL, '0.00', 0, '2022-02-11 11:49:50', '2022-02-11 11:49:50'),
(471, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-09-13', NULL, '0.00', 0, '2022-02-11 11:49:50', '2022-02-11 11:49:50'),
(472, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-09-20', NULL, '0.00', 0, '2022-02-11 11:49:50', '2022-02-11 11:49:50'),
(473, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-09-27', NULL, '0.00', 0, '2022-02-11 11:49:50', '2022-02-11 11:49:50'),
(474, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-10-04', NULL, '0.00', 0, '2022-02-11 11:49:50', '2022-02-11 11:49:50'),
(475, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-10-11', NULL, '0.00', 0, '2022-02-11 11:49:50', '2022-02-11 11:49:50'),
(476, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-10-18', NULL, '0.00', 0, '2022-02-11 11:49:50', '2022-02-11 11:49:50'),
(477, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-10-25', NULL, '0.00', 0, '2022-02-11 11:49:50', '2022-02-11 11:49:50'),
(478, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-11-01', NULL, '0.00', 0, '2022-02-11 11:49:50', '2022-02-11 11:49:50'),
(479, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-11-08', NULL, '0.00', 0, '2022-02-11 11:49:50', '2022-02-11 11:49:50'),
(480, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-11-15', NULL, '0.00', 0, '2022-02-11 11:49:50', '2022-02-11 11:49:50'),
(481, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-11-22', NULL, '0.00', 0, '2022-02-11 11:49:51', '2022-02-11 11:49:51'),
(482, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-11-29', NULL, '0.00', 0, '2022-02-11 11:49:51', '2022-02-11 11:49:51'),
(483, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-12-06', NULL, '0.00', 0, '2022-02-11 11:49:51', '2022-02-11 11:49:51'),
(484, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-12-13', NULL, '0.00', 0, '2022-02-11 11:49:51', '2022-02-11 11:49:51'),
(485, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-12-20', NULL, '0.00', 0, '2022-02-11 11:49:51', '2022-02-11 11:49:51'),
(486, 51, 1, '25.41', NULL, '2.10', '27.51', '2024-12-27', NULL, '0.00', 0, '2022-02-11 11:49:51', '2022-02-11 11:49:51'),
(487, 51, 1, '25.41', NULL, '2.10', '27.51', '2025-01-03', NULL, '0.00', 0, '2022-02-11 11:49:51', '2022-02-11 11:49:51'),
(488, 51, 1, '25.41', NULL, '2.10', '27.51', '2025-01-10', NULL, '0.00', 0, '2022-02-11 11:49:51', '2022-02-11 11:49:51'),
(489, 51, 1, '25.41', NULL, '2.10', '27.51', '2025-01-17', NULL, '0.00', 0, '2022-02-11 11:49:51', '2022-02-11 11:49:51'),
(490, 51, 1, '25.41', NULL, '2.10', '27.51', '2025-01-24', NULL, '0.00', 0, '2022-02-11 11:49:52', '2022-02-11 11:49:52'),
(491, 51, 1, '25.41', NULL, '2.10', '27.51', '2025-01-31', NULL, '0.00', 0, '2022-02-11 11:49:52', '2022-02-11 11:49:52'),
(492, 51, 1, '25.41', NULL, '2.10', '27.51', '2025-02-07', NULL, '0.00', 0, '2022-02-11 11:49:52', '2022-02-11 11:49:52'),
(493, 52, 1, '200.07', NULL, '16.51', '216.58', '2022-02-26', NULL, '0.00', 0, '2022-02-11 11:51:53', '2022-02-11 11:51:53'),
(494, 52, 1, '200.07', NULL, '16.51', '216.58', '2022-03-13', NULL, '0.00', 0, '2022-02-11 11:51:53', '2022-02-11 11:51:53'),
(495, 52, 1, '200.07', NULL, '16.51', '216.58', '2022-03-28', NULL, '0.00', 0, '2022-02-11 11:51:53', '2022-02-11 11:51:53'),
(496, 52, 1, '200.07', NULL, '16.51', '216.58', '2022-04-12', NULL, '0.00', 0, '2022-02-11 11:51:53', '2022-02-11 11:51:53'),
(497, 52, 1, '200.07', NULL, '16.51', '216.58', '2022-04-27', NULL, '0.00', 0, '2022-02-11 11:51:53', '2022-02-11 11:51:53'),
(498, 52, 1, '200.07', NULL, '16.51', '216.58', '2022-05-12', NULL, '0.00', 0, '2022-02-11 11:51:53', '2022-02-11 11:51:53'),
(499, 52, 1, '200.07', NULL, '16.51', '216.58', '2022-05-27', NULL, '0.00', 0, '2022-02-11 11:51:53', '2022-02-11 11:51:53'),
(500, 52, 1, '200.07', NULL, '16.51', '216.58', '2022-06-11', NULL, '0.00', 0, '2022-02-11 11:51:53', '2022-02-11 11:51:53'),
(501, 52, 1, '200.07', NULL, '16.51', '216.58', '2022-06-26', NULL, '0.00', 0, '2022-02-11 11:51:53', '2022-02-11 11:51:53'),
(502, 52, 1, '200.07', NULL, '16.51', '216.58', '2022-07-11', NULL, '0.00', 0, '2022-02-11 11:51:53', '2022-02-11 11:51:53'),
(503, 52, 1, '200.07', NULL, '16.51', '216.58', '2022-07-26', NULL, '0.00', 0, '2022-02-11 11:51:53', '2022-02-11 11:51:53'),
(504, 52, 1, '200.07', NULL, '16.51', '216.58', '2022-08-10', NULL, '0.00', 0, '2022-02-11 11:51:53', '2022-02-11 11:51:53'),
(505, 52, 1, '200.07', NULL, '16.51', '216.58', '2022-08-25', NULL, '0.00', 0, '2022-02-11 11:51:53', '2022-02-11 11:51:53'),
(506, 52, 1, '200.07', NULL, '16.51', '216.58', '2022-09-09', NULL, '0.00', 0, '2022-02-11 11:51:53', '2022-02-11 11:51:53'),
(507, 52, 1, '200.07', NULL, '16.51', '216.58', '2022-09-24', NULL, '0.00', 0, '2022-02-11 11:51:53', '2022-02-11 11:51:53'),
(508, 52, 1, '200.07', NULL, '16.51', '216.58', '2022-10-09', NULL, '0.00', 0, '2022-02-11 11:51:53', '2022-02-11 11:51:53'),
(509, 52, 1, '200.07', NULL, '16.51', '216.58', '2022-10-24', NULL, '0.00', 0, '2022-02-11 11:51:53', '2022-02-11 11:51:53'),
(510, 52, 1, '200.07', NULL, '16.51', '216.58', '2022-11-08', NULL, '0.00', 0, '2022-02-11 11:51:53', '2022-02-11 11:51:53'),
(511, 52, 1, '200.07', NULL, '16.51', '216.58', '2022-11-23', NULL, '0.00', 0, '2022-02-11 11:51:54', '2022-02-11 11:51:54'),
(512, 52, 1, '200.07', NULL, '16.51', '216.58', '2022-12-08', NULL, '0.00', 0, '2022-02-11 11:51:54', '2022-02-11 11:51:54'),
(513, 52, 1, '200.07', NULL, '16.51', '216.58', '2022-12-23', NULL, '0.00', 0, '2022-02-11 11:51:54', '2022-02-11 11:51:54'),
(514, 52, 1, '200.07', NULL, '16.51', '216.58', '2023-01-07', NULL, '0.00', 0, '2022-02-11 11:51:54', '2022-02-11 11:51:54'),
(515, 52, 1, '200.07', NULL, '16.51', '216.58', '2023-01-22', NULL, '0.00', 0, '2022-02-11 11:51:54', '2022-02-11 11:51:54'),
(516, 52, 1, '200.07', NULL, '16.51', '216.58', '2023-02-06', NULL, '0.00', 0, '2022-02-11 11:51:54', '2022-02-11 11:51:54'),
(517, 52, 1, '200.07', NULL, '16.51', '216.58', '2023-02-21', NULL, '0.00', 0, '2022-02-11 11:51:54', '2022-02-11 11:51:54'),
(518, 52, 1, '200.07', NULL, '16.51', '216.58', '2023-03-08', NULL, '0.00', 0, '2022-02-11 11:51:54', '2022-02-11 11:51:54'),
(519, 52, 1, '200.07', NULL, '16.51', '216.58', '2023-03-23', NULL, '0.00', 0, '2022-02-11 11:51:54', '2022-02-11 11:51:54'),
(520, 52, 1, '200.07', NULL, '16.51', '216.58', '2023-04-07', NULL, '0.00', 0, '2022-02-11 11:51:54', '2022-02-11 11:51:54'),
(521, 52, 1, '200.07', NULL, '16.51', '216.58', '2023-04-22', NULL, '0.00', 0, '2022-02-11 11:51:54', '2022-02-11 11:51:54'),
(522, 52, 1, '200.07', NULL, '16.51', '216.58', '2023-05-07', NULL, '0.00', 0, '2022-02-11 11:51:54', '2022-02-11 11:51:54'),
(523, 52, 1, '200.07', NULL, '16.51', '216.58', '2023-05-22', NULL, '0.00', 0, '2022-02-11 11:51:54', '2022-02-11 11:51:54'),
(524, 52, 1, '200.07', NULL, '16.51', '216.58', '2023-06-06', NULL, '0.00', 0, '2022-02-11 11:51:54', '2022-02-11 11:51:54'),
(525, 52, 1, '200.07', NULL, '16.51', '216.58', '2023-06-21', NULL, '0.00', 0, '2022-02-11 11:51:54', '2022-02-11 11:51:54'),
(526, 52, 1, '200.07', NULL, '16.51', '216.58', '2023-07-06', NULL, '0.00', 0, '2022-02-11 11:51:54', '2022-02-11 11:51:54'),
(527, 52, 1, '200.07', NULL, '16.51', '216.58', '2023-07-21', NULL, '0.00', 0, '2022-02-11 11:51:54', '2022-02-11 11:51:54'),
(528, 52, 1, '200.07', NULL, '16.51', '216.58', '2023-08-05', NULL, '0.00', 0, '2022-02-11 11:51:54', '2022-02-11 11:51:54'),
(529, 52, 1, '200.07', NULL, '16.51', '216.58', '2023-08-20', NULL, '0.00', 0, '2022-02-11 11:51:54', '2022-02-11 11:51:54'),
(530, 52, 1, '200.07', NULL, '16.51', '216.58', '2023-09-04', NULL, '0.00', 0, '2022-02-11 11:51:54', '2022-02-11 11:51:54'),
(531, 52, 1, '200.07', NULL, '16.51', '216.58', '2023-09-19', NULL, '0.00', 0, '2022-02-11 11:51:54', '2022-02-11 11:51:54'),
(532, 52, 1, '200.07', NULL, '16.51', '216.58', '2023-10-04', NULL, '0.00', 0, '2022-02-11 11:51:54', '2022-02-11 11:51:54'),
(533, 52, 1, '200.07', NULL, '16.51', '216.58', '2023-10-19', NULL, '0.00', 0, '2022-02-11 11:51:54', '2022-02-11 11:51:54'),
(534, 52, 1, '200.07', NULL, '16.51', '216.58', '2023-11-03', NULL, '0.00', 0, '2022-02-11 11:51:55', '2022-02-11 11:51:55'),
(535, 52, 1, '200.07', NULL, '16.51', '216.58', '2023-11-18', NULL, '0.00', 0, '2022-02-11 11:51:55', '2022-02-11 11:51:55'),
(536, 52, 1, '200.07', NULL, '16.51', '216.58', '2023-12-03', NULL, '0.00', 0, '2022-02-11 11:51:55', '2022-02-11 11:51:55'),
(537, 52, 1, '200.07', NULL, '16.51', '216.58', '2023-12-18', NULL, '0.00', 0, '2022-02-11 11:51:55', '2022-02-11 11:51:55'),
(538, 52, 1, '200.07', NULL, '16.51', '216.58', '2024-01-02', NULL, '0.00', 0, '2022-02-11 11:51:55', '2022-02-11 11:51:55'),
(539, 52, 1, '200.07', NULL, '16.51', '216.58', '2024-01-17', NULL, '0.00', 0, '2022-02-11 11:51:55', '2022-02-11 11:51:55'),
(540, 52, 1, '200.07', NULL, '16.51', '216.58', '2024-02-01', NULL, '0.00', 0, '2022-02-11 11:51:55', '2022-02-11 11:51:55'),
(541, 52, 1, '200.07', NULL, '16.51', '216.58', '2024-02-16', NULL, '0.00', 0, '2022-02-11 11:51:55', '2022-02-11 11:51:55'),
(542, 52, 1, '200.07', NULL, '16.51', '216.58', '2024-03-02', NULL, '0.00', 0, '2022-02-11 11:51:55', '2022-02-11 11:51:55'),
(543, 52, 1, '200.07', NULL, '16.51', '216.58', '2024-03-17', NULL, '0.00', 0, '2022-02-11 11:51:55', '2022-02-11 11:51:55'),
(544, 52, 1, '200.07', NULL, '16.51', '216.58', '2024-04-01', NULL, '0.00', 0, '2022-02-11 11:51:55', '2022-02-11 11:51:55'),
(545, 52, 1, '200.07', NULL, '16.51', '216.58', '2024-04-16', NULL, '0.00', 0, '2022-02-11 11:51:55', '2022-02-11 11:51:55'),
(546, 52, 1, '200.07', NULL, '16.51', '216.58', '2024-05-01', NULL, '0.00', 0, '2022-02-11 11:51:56', '2022-02-11 11:51:56'),
(547, 52, 1, '200.07', NULL, '16.51', '216.58', '2024-05-16', NULL, '0.00', 0, '2022-02-11 11:51:56', '2022-02-11 11:51:56'),
(548, 52, 1, '200.07', NULL, '16.51', '216.58', '2024-05-31', NULL, '0.00', 0, '2022-02-11 11:51:56', '2022-02-11 11:51:56'),
(549, 52, 1, '200.07', NULL, '16.51', '216.58', '2024-06-15', NULL, '0.00', 0, '2022-02-11 11:51:56', '2022-02-11 11:51:56'),
(550, 52, 1, '200.07', NULL, '16.51', '216.58', '2024-06-30', NULL, '0.00', 0, '2022-02-11 11:51:56', '2022-02-11 11:51:56'),
(551, 52, 1, '200.07', NULL, '16.51', '216.58', '2024-07-15', NULL, '0.00', 0, '2022-02-11 11:51:56', '2022-02-11 11:51:56'),
(552, 52, 1, '200.07', NULL, '16.51', '216.58', '2024-07-30', NULL, '0.00', 0, '2022-02-11 11:51:56', '2022-02-11 11:51:56'),
(553, 52, 1, '200.07', NULL, '16.51', '216.58', '2024-08-14', NULL, '0.00', 0, '2022-02-11 11:51:56', '2022-02-11 11:51:56'),
(554, 52, 1, '200.07', NULL, '16.51', '216.58', '2024-08-29', NULL, '0.00', 0, '2022-02-11 11:51:56', '2022-02-11 11:51:56'),
(555, 52, 1, '200.07', NULL, '16.51', '216.58', '2024-09-13', NULL, '0.00', 0, '2022-02-11 11:51:57', '2022-02-11 11:51:57'),
(556, 52, 1, '200.07', NULL, '16.51', '216.58', '2024-09-28', NULL, '0.00', 0, '2022-02-11 11:51:57', '2022-02-11 11:51:57'),
(557, 52, 1, '200.07', NULL, '16.51', '216.58', '2024-10-13', NULL, '0.00', 0, '2022-02-11 11:51:57', '2022-02-11 11:51:57'),
(558, 52, 1, '200.07', NULL, '16.51', '216.58', '2024-10-28', NULL, '0.00', 0, '2022-02-11 11:51:57', '2022-02-11 11:51:57'),
(559, 52, 1, '200.07', NULL, '16.51', '216.58', '2024-11-12', NULL, '0.00', 0, '2022-02-11 11:51:57', '2022-02-11 11:51:57'),
(560, 52, 1, '200.07', NULL, '16.51', '216.58', '2024-11-27', NULL, '0.00', 0, '2022-02-11 11:51:57', '2022-02-11 11:51:57'),
(561, 52, 1, '200.07', NULL, '16.51', '216.58', '2024-12-12', NULL, '0.00', 0, '2022-02-11 11:51:57', '2022-02-11 11:51:57'),
(562, 52, 1, '200.07', NULL, '16.51', '216.58', '2024-12-27', NULL, '0.00', 0, '2022-02-11 11:51:57', '2022-02-11 11:51:57'),
(563, 52, 1, '200.07', NULL, '16.51', '216.58', '2025-01-11', NULL, '0.00', 0, '2022-02-11 11:51:57', '2022-02-11 11:51:57'),
(564, 52, 1, '200.07', NULL, '16.51', '216.58', '2025-01-26', NULL, '0.00', 0, '2022-02-11 11:51:57', '2022-02-11 11:51:57'),
(565, 52, 1, '200.07', NULL, '16.51', '216.58', '2025-02-10', NULL, '0.00', 0, '2022-02-11 11:51:58', '2022-02-11 11:51:58'),
(566, 52, 1, '200.07', NULL, '16.51', '216.58', '2025-02-25', NULL, '0.00', 0, '2022-02-11 11:51:58', '2022-02-11 11:51:58'),
(567, 52, 1, '200.07', NULL, '16.51', '216.58', '2025-03-12', NULL, '0.00', 0, '2022-02-11 11:51:58', '2022-02-11 11:51:58'),
(568, 52, 1, '200.07', NULL, '16.51', '216.58', '2025-03-27', NULL, '0.00', 0, '2022-02-11 11:51:58', '2022-02-11 11:51:58'),
(569, 52, 1, '200.07', NULL, '16.51', '216.58', '2025-04-11', NULL, '0.00', 0, '2022-02-11 11:51:58', '2022-02-11 11:51:58'),
(570, 52, 1, '200.07', NULL, '16.51', '216.58', '2025-04-26', NULL, '0.00', 0, '2022-02-11 11:51:58', '2022-02-11 11:51:58'),
(571, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-02-28', NULL, '0.00', 0, '2022-02-21 10:02:32', '2022-02-21 10:02:32'),
(572, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-03-07', NULL, '0.00', 0, '2022-02-21 10:02:32', '2022-02-21 10:02:32'),
(573, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-03-14', NULL, '0.00', 0, '2022-02-21 10:02:32', '2022-02-21 10:02:32'),
(574, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-03-21', NULL, '0.00', 0, '2022-02-21 10:02:32', '2022-02-21 10:02:32'),
(575, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-03-28', NULL, '0.00', 0, '2022-02-21 10:02:32', '2022-02-21 10:02:32'),
(576, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-04-04', NULL, '0.00', 0, '2022-02-21 10:02:32', '2022-02-21 10:02:32'),
(577, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-04-11', NULL, '0.00', 0, '2022-02-21 10:02:32', '2022-02-21 10:02:32'),
(578, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-04-18', NULL, '0.00', 0, '2022-02-21 10:02:32', '2022-02-21 10:02:32'),
(579, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-04-25', NULL, '0.00', 0, '2022-02-21 10:02:32', '2022-02-21 10:02:32'),
(580, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-05-02', NULL, '0.00', 0, '2022-02-21 10:02:33', '2022-02-21 10:02:33'),
(581, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-05-09', NULL, '0.00', 0, '2022-02-21 10:02:33', '2022-02-21 10:02:33'),
(582, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-05-16', NULL, '0.00', 0, '2022-02-21 10:02:33', '2022-02-21 10:02:33'),
(583, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-05-23', NULL, '0.00', 0, '2022-02-21 10:02:33', '2022-02-21 10:02:33'),
(584, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-05-30', NULL, '0.00', 0, '2022-02-21 10:02:33', '2022-02-21 10:02:33'),
(585, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-02-28', NULL, '0.00', 0, '2022-02-21 10:02:33', '2022-02-21 10:02:33'),
(586, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-06-06', NULL, '0.00', 0, '2022-02-21 10:02:33', '2022-02-21 10:02:33'),
(587, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-03-07', NULL, '0.00', 0, '2022-02-21 10:02:33', '2022-02-21 10:02:33'),
(588, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-06-13', NULL, '0.00', 0, '2022-02-21 10:02:33', '2022-02-21 10:02:33'),
(589, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-03-14', NULL, '0.00', 0, '2022-02-21 10:02:33', '2022-02-21 10:02:33'),
(590, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-06-20', NULL, '0.00', 0, '2022-02-21 10:02:33', '2022-02-21 10:02:33'),
(591, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-03-21', NULL, '0.00', 0, '2022-02-21 10:02:33', '2022-02-21 10:02:33'),
(592, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-06-27', NULL, '0.00', 0, '2022-02-21 10:02:33', '2022-02-21 10:02:33'),
(593, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-03-28', NULL, '0.00', 0, '2022-02-21 10:02:33', '2022-02-21 10:02:33'),
(594, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-07-04', NULL, '0.00', 0, '2022-02-21 10:02:33', '2022-02-21 10:02:33'),
(595, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-04-04', NULL, '0.00', 0, '2022-02-21 10:02:33', '2022-02-21 10:02:33'),
(596, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-07-11', NULL, '0.00', 0, '2022-02-21 10:02:33', '2022-02-21 10:02:33'),
(597, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-04-11', NULL, '0.00', 0, '2022-02-21 10:02:33', '2022-02-21 10:02:33'),
(598, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-07-18', NULL, '0.00', 0, '2022-02-21 10:02:33', '2022-02-21 10:02:33'),
(599, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-04-18', NULL, '0.00', 0, '2022-02-21 10:02:33', '2022-02-21 10:02:33'),
(600, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-07-25', NULL, '0.00', 0, '2022-02-21 10:02:33', '2022-02-21 10:02:33'),
(601, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-04-25', NULL, '0.00', 0, '2022-02-21 10:02:33', '2022-02-21 10:02:33'),
(602, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-08-01', NULL, '0.00', 0, '2022-02-21 10:02:34', '2022-02-21 10:02:34'),
(603, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-05-02', NULL, '0.00', 0, '2022-02-21 10:02:34', '2022-02-21 10:02:34'),
(604, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-08-08', NULL, '0.00', 0, '2022-02-21 10:02:34', '2022-02-21 10:02:34'),
(605, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-05-09', NULL, '0.00', 0, '2022-02-21 10:02:34', '2022-02-21 10:02:34'),
(606, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-08-15', NULL, '0.00', 0, '2022-02-21 10:02:34', '2022-02-21 10:02:34'),
(607, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-05-16', NULL, '0.00', 0, '2022-02-21 10:02:34', '2022-02-21 10:02:34'),
(608, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-08-22', NULL, '0.00', 0, '2022-02-21 10:02:34', '2022-02-21 10:02:34'),
(609, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-05-23', NULL, '0.00', 0, '2022-02-21 10:02:34', '2022-02-21 10:02:34'),
(610, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-08-29', NULL, '0.00', 0, '2022-02-21 10:02:34', '2022-02-21 10:02:34'),
(611, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-05-30', NULL, '0.00', 0, '2022-02-21 10:02:34', '2022-02-21 10:02:34'),
(612, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-09-05', NULL, '0.00', 0, '2022-02-21 10:02:34', '2022-02-21 10:02:34'),
(613, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-06-06', NULL, '0.00', 0, '2022-02-21 10:02:34', '2022-02-21 10:02:34'),
(614, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-09-12', NULL, '0.00', 0, '2022-02-21 10:02:34', '2022-02-21 10:02:34'),
(615, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-06-13', NULL, '0.00', 0, '2022-02-21 10:02:34', '2022-02-21 10:02:34'),
(616, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-09-19', NULL, '0.00', 0, '2022-02-21 10:02:34', '2022-02-21 10:02:34'),
(617, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-06-20', NULL, '0.00', 0, '2022-02-21 10:02:34', '2022-02-21 10:02:34'),
(618, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-09-26', NULL, '0.00', 0, '2022-02-21 10:02:34', '2022-02-21 10:02:34'),
(619, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-06-27', NULL, '0.00', 0, '2022-02-21 10:02:35', '2022-02-21 10:02:35'),
(620, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-10-03', NULL, '0.00', 0, '2022-02-21 10:02:35', '2022-02-21 10:02:35'),
(621, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-07-04', NULL, '0.00', 0, '2022-02-21 10:02:35', '2022-02-21 10:02:35'),
(622, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-10-10', NULL, '0.00', 0, '2022-02-21 10:02:35', '2022-02-21 10:02:35'),
(623, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-02-28', NULL, '0.00', 0, '2022-02-21 10:02:35', '2022-02-21 10:02:35'),
(624, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-07-11', NULL, '0.00', 0, '2022-02-21 10:02:35', '2022-02-21 10:02:35'),
(625, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-03-07', NULL, '0.00', 0, '2022-02-21 10:02:35', '2022-02-21 10:02:35'),
(626, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-10-17', NULL, '0.00', 0, '2022-02-21 10:02:35', '2022-02-21 10:02:35'),
(627, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-07-18', NULL, '0.00', 0, '2022-02-21 10:02:35', '2022-02-21 10:02:35'),
(628, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-03-14', NULL, '0.00', 0, '2022-02-21 10:02:35', '2022-02-21 10:02:35'),
(629, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-10-24', NULL, '0.00', 0, '2022-02-21 10:02:35', '2022-02-21 10:02:35'),
(630, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-07-25', NULL, '0.00', 0, '2022-02-21 10:02:35', '2022-02-21 10:02:35'),
(631, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-03-21', NULL, '0.00', 0, '2022-02-21 10:02:35', '2022-02-21 10:02:35'),
(632, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-10-31', NULL, '0.00', 0, '2022-02-21 10:02:35', '2022-02-21 10:02:35'),
(633, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-08-01', NULL, '0.00', 0, '2022-02-21 10:02:35', '2022-02-21 10:02:35'),
(634, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-03-28', NULL, '0.00', 0, '2022-02-21 10:02:35', '2022-02-21 10:02:35'),
(635, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-11-07', NULL, '0.00', 0, '2022-02-21 10:02:35', '2022-02-21 10:02:35'),
(636, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-08-08', NULL, '0.00', 0, '2022-02-21 10:02:35', '2022-02-21 10:02:35'),
(637, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-04-04', NULL, '0.00', 0, '2022-02-21 10:02:35', '2022-02-21 10:02:35'),
(638, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-08-15', NULL, '0.00', 0, '2022-02-21 10:02:35', '2022-02-21 10:02:35'),
(639, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-11-14', NULL, '0.00', 0, '2022-02-21 10:02:35', '2022-02-21 10:02:35'),
(640, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-04-11', NULL, '0.00', 0, '2022-02-21 10:02:35', '2022-02-21 10:02:35'),
(641, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-04-18', NULL, '0.00', 0, '2022-02-21 10:02:36', '2022-02-21 10:02:36'),
(642, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-08-22', NULL, '0.00', 0, '2022-02-21 10:02:36', '2022-02-21 10:02:36'),
(643, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-04-25', NULL, '0.00', 0, '2022-02-21 10:02:36', '2022-02-21 10:02:36'),
(644, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-11-21', NULL, '0.00', 0, '2022-02-21 10:02:36', '2022-02-21 10:02:36'),
(645, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-08-29', NULL, '0.00', 0, '2022-02-21 10:02:36', '2022-02-21 10:02:36'),
(646, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-05-02', NULL, '0.00', 0, '2022-02-21 10:02:36', '2022-02-21 10:02:36'),
(647, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-11-28', NULL, '0.00', 0, '2022-02-21 10:02:36', '2022-02-21 10:02:36'),
(648, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-09-05', NULL, '0.00', 0, '2022-02-21 10:02:36', '2022-02-21 10:02:36'),
(649, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-05-09', NULL, '0.00', 0, '2022-02-21 10:02:36', '2022-02-21 10:02:36'),
(650, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-12-05', NULL, '0.00', 0, '2022-02-21 10:02:36', '2022-02-21 10:02:36'),
(651, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-09-12', NULL, '0.00', 0, '2022-02-21 10:02:36', '2022-02-21 10:02:36'),
(652, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-05-16', NULL, '0.00', 0, '2022-02-21 10:02:36', '2022-02-21 10:02:36'),
(653, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-12-12', NULL, '0.00', 0, '2022-02-21 10:02:36', '2022-02-21 10:02:36'),
(654, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-09-19', NULL, '0.00', 0, '2022-02-21 10:02:37', '2022-02-21 10:02:37'),
(655, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-05-23', NULL, '0.00', 0, '2022-02-21 10:02:37', '2022-02-21 10:02:37'),
(656, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-12-19', NULL, '0.00', 0, '2022-02-21 10:02:37', '2022-02-21 10:02:37'),
(657, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-09-26', NULL, '0.00', 0, '2022-02-21 10:02:37', '2022-02-21 10:02:37'),
(658, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-05-30', NULL, '0.00', 0, '2022-02-21 10:02:37', '2022-02-21 10:02:37'),
(659, 53, 10, '0.76', NULL, '0.06', '0.82', '2022-12-26', NULL, '0.00', 0, '2022-02-21 10:02:37', '2022-02-21 10:02:37'),
(660, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-06-06', NULL, '0.00', 0, '2022-02-21 10:02:37', '2022-02-21 10:02:37'),
(661, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-10-03', NULL, '0.00', 0, '2022-02-21 10:02:37', '2022-02-21 10:02:37'),
(662, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-01-02', NULL, '0.00', 0, '2022-02-21 10:02:37', '2022-02-21 10:02:37'),
(663, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-06-13', NULL, '0.00', 0, '2022-02-21 10:02:37', '2022-02-21 10:02:37'),
(664, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-10-10', NULL, '0.00', 0, '2022-02-21 10:02:37', '2022-02-21 10:02:37'),
(665, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-01-09', NULL, '0.00', 0, '2022-02-21 10:02:37', '2022-02-21 10:02:37'),
(666, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-10-17', NULL, '0.00', 0, '2022-02-21 10:02:37', '2022-02-21 10:02:37'),
(667, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-06-20', NULL, '0.00', 0, '2022-02-21 10:02:37', '2022-02-21 10:02:37'),
(668, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-01-16', NULL, '0.00', 0, '2022-02-21 10:02:37', '2022-02-21 10:02:37'),
(669, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-06-27', NULL, '0.00', 0, '2022-02-21 10:02:37', '2022-02-21 10:02:37'),
(670, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-10-24', NULL, '0.00', 0, '2022-02-21 10:02:37', '2022-02-21 10:02:37'),
(671, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-01-23', NULL, '0.00', 0, '2022-02-21 10:02:37', '2022-02-21 10:02:37'),
(672, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-02-28', NULL, '0.00', 0, '2022-02-21 10:02:37', '2022-02-21 10:02:37'),
(673, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-07-04', NULL, '0.00', 0, '2022-02-21 10:02:37', '2022-02-21 10:02:37'),
(674, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-10-31', NULL, '0.00', 0, '2022-02-21 10:02:37', '2022-02-21 10:02:37'),
(675, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-01-30', NULL, '0.00', 0, '2022-02-21 10:02:37', '2022-02-21 10:02:37'),
(676, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-03-07', NULL, '0.00', 0, '2022-02-21 10:02:37', '2022-02-21 10:02:37'),
(677, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-11-07', NULL, '0.00', 0, '2022-02-21 10:02:37', '2022-02-21 10:02:37'),
(678, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-07-11', NULL, '0.00', 0, '2022-02-21 10:02:37', '2022-02-21 10:02:37'),
(679, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-11-14', NULL, '0.00', 0, '2022-02-21 10:02:38', '2022-02-21 10:02:38'),
(680, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-02-06', NULL, '0.00', 0, '2022-02-21 10:02:38', '2022-02-21 10:02:38'),
(681, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-07-18', NULL, '0.00', 0, '2022-02-21 10:02:38', '2022-02-21 10:02:38'),
(682, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-03-14', NULL, '0.00', 0, '2022-02-21 10:02:38', '2022-02-21 10:02:38'),
(683, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-11-21', NULL, '0.00', 0, '2022-02-21 10:02:38', '2022-02-21 10:02:38'),
(684, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-03-21', NULL, '0.00', 0, '2022-02-21 10:02:38', '2022-02-21 10:02:38'),
(685, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-02-13', NULL, '0.00', 0, '2022-02-21 10:02:38', '2022-02-21 10:02:38'),
(686, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-11-28', NULL, '0.00', 0, '2022-02-21 10:02:38', '2022-02-21 10:02:38'),
(687, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-07-25', NULL, '0.00', 0, '2022-02-21 10:02:38', '2022-02-21 10:02:38'),
(688, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-03-28', NULL, '0.00', 0, '2022-02-21 10:02:38', '2022-02-21 10:02:38'),
(689, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-02-20', NULL, '0.00', 0, '2022-02-21 10:02:38', '2022-02-21 10:02:38'),
(690, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-08-01', NULL, '0.00', 0, '2022-02-21 10:02:38', '2022-02-21 10:02:38'),
(691, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-02-27', NULL, '0.00', 0, '2022-02-21 10:02:38', '2022-02-21 10:02:38'),
(692, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-04-04', NULL, '0.00', 0, '2022-02-21 10:02:38', '2022-02-21 10:02:38'),
(693, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-12-05', NULL, '0.00', 0, '2022-02-21 10:02:38', '2022-02-21 10:02:38'),
(694, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-08-08', NULL, '0.00', 0, '2022-02-21 10:02:38', '2022-02-21 10:02:38'),
(695, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-03-06', NULL, '0.00', 0, '2022-02-21 10:02:38', '2022-02-21 10:02:38'),
(696, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-12-12', NULL, '0.00', 0, '2022-02-21 10:02:38', '2022-02-21 10:02:38'),
(697, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-04-11', NULL, '0.00', 0, '2022-02-21 10:02:38', '2022-02-21 10:02:38'),
(698, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-08-15', NULL, '0.00', 0, '2022-02-21 10:02:38', '2022-02-21 10:02:38'),
(699, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-12-19', NULL, '0.00', 0, '2022-02-21 10:02:38', '2022-02-21 10:02:38'),
(700, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-04-18', NULL, '0.00', 0, '2022-02-21 10:02:38', '2022-02-21 10:02:38'),
(701, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-03-13', NULL, '0.00', 0, '2022-02-21 10:02:38', '2022-02-21 10:02:38'),
(702, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-08-22', NULL, '0.00', 0, '2022-02-21 10:02:38', '2022-02-21 10:02:38'),
(703, 54, 10, '0.76', NULL, '0.06', '0.82', '2022-12-26', NULL, '0.00', 0, '2022-02-21 10:02:38', '2022-02-21 10:02:38'),
(704, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-04-25', NULL, '0.00', 0, '2022-02-21 10:02:38', '2022-02-21 10:02:38'),
(705, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-03-20', NULL, '0.00', 0, '2022-02-21 10:02:38', '2022-02-21 10:02:38'),
(706, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-01-02', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(707, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-08-29', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(708, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-03-27', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(709, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-05-02', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(710, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-01-09', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(711, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-09-05', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(712, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-04-03', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(713, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-05-09', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(714, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-01-16', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(715, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-09-12', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(716, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-04-10', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(717, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-05-16', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(718, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-09-19', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(719, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-01-23', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(720, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-05-23', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(721, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-04-17', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(722, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-09-26', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(723, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-01-30', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(724, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-04-24', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(725, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-05-30', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(726, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-10-03', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(727, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-02-06', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(728, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-05-01', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(729, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-06-06', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(730, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-02-13', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(731, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-10-10', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(732, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-05-08', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(733, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-06-13', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(734, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-02-20', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(735, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-10-17', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(736, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-05-15', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(737, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-06-20', NULL, '0.00', 0, '2022-02-21 10:02:39', '2022-02-21 10:02:39'),
(738, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-02-27', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(739, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-10-24', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(740, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-06-27', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(741, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-05-22', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(742, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-03-06', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(743, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-10-31', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(744, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-07-04', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(745, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-05-29', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(746, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-11-07', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(747, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-03-13', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(748, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-07-11', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(749, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-06-05', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(750, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-03-20', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(751, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-11-14', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(752, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-06-12', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(753, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-07-18', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(754, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-03-27', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(755, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-11-21', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(756, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-07-25', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(757, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-06-19', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(758, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-04-03', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(759, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-11-28', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(760, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-08-01', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(761, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-06-26', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(762, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-04-10', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(763, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-12-05', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(764, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-08-08', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(765, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-07-03', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(766, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-04-17', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(767, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-12-12', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(768, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-07-10', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(769, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-08-15', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(770, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-12-19', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(771, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-04-24', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(772, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-08-22', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(773, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-07-17', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(774, 55, 10, '0.76', NULL, '0.06', '0.82', '2022-12-26', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(775, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-05-01', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(776, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-08-29', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(777, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-07-24', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(778, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-01-02', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(779, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-05-08', NULL, '0.00', 0, '2022-02-21 10:02:40', '2022-02-21 10:02:40'),
(780, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-07-31', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(781, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-05-15', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(782, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-01-09', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(783, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-09-05', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(784, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-08-07', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(785, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-01-16', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(786, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-05-22', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(787, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-09-12', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(788, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-05-29', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(789, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-08-14', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(790, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-09-19', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(791, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-01-23', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(792, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-06-05', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(793, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-08-21', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(794, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-09-26', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(795, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-01-30', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(796, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-06-12', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(797, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-08-28', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(798, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-10-03', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(799, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-06-19', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(800, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-09-04', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(801, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-02-06', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(802, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-10-10', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(803, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-06-26', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(804, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-09-11', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(805, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-02-13', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(806, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-09-18', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(807, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-07-03', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(808, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-10-17', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(809, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-02-20', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(810, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-09-25', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(811, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-10-24', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(812, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-07-10', NULL, '0.00', 0, '2022-02-21 10:02:41', '2022-02-21 10:02:41'),
(813, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-02-27', NULL, '0.00', 0, '2022-02-21 10:02:42', '2022-02-21 10:02:42'),
(814, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-10-02', NULL, '0.00', 0, '2022-02-21 10:02:42', '2022-02-21 10:02:42'),
(815, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-10-31', NULL, '0.00', 0, '2022-02-21 10:02:42', '2022-02-21 10:02:42'),
(816, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-07-17', NULL, '0.00', 0, '2022-02-21 10:02:42', '2022-02-21 10:02:42'),
(817, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-03-06', NULL, '0.00', 0, '2022-02-21 10:02:42', '2022-02-21 10:02:42'),
(818, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-10-09', NULL, '0.00', 0, '2022-02-21 10:02:42', '2022-02-21 10:02:42'),
(819, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-11-07', NULL, '0.00', 0, '2022-02-21 10:02:42', '2022-02-21 10:02:42'),
(820, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-07-24', NULL, '0.00', 0, '2022-02-21 10:02:42', '2022-02-21 10:02:42');
INSERT INTO `invoices` (`id`, `contract_id`, `customer_id`, `amount`, `fee`, `sales_tax`, `total_amount_to_pay`, `due_date`, `paid_date`, `late_fee`, `status`, `created_at`, `updated_at`) VALUES
(821, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-03-13', NULL, '0.00', 0, '2022-02-21 10:02:42', '2022-02-21 10:02:42'),
(822, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-10-16', NULL, '0.00', 0, '2022-02-21 10:02:42', '2022-02-21 10:02:42'),
(823, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-11-14', NULL, '0.00', 0, '2022-02-21 10:02:42', '2022-02-21 10:02:42'),
(824, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-07-31', NULL, '0.00', 0, '2022-02-21 10:02:42', '2022-02-21 10:02:42'),
(825, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-03-20', NULL, '0.00', 0, '2022-02-21 10:02:42', '2022-02-21 10:02:42'),
(826, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-10-23', NULL, '0.00', 0, '2022-02-21 10:02:42', '2022-02-21 10:02:42'),
(827, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-11-21', NULL, '0.00', 0, '2022-02-21 10:02:42', '2022-02-21 10:02:42'),
(828, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-08-07', NULL, '0.00', 0, '2022-02-21 10:02:42', '2022-02-21 10:02:42'),
(829, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-03-27', NULL, '0.00', 0, '2022-02-21 10:02:42', '2022-02-21 10:02:42'),
(830, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-10-30', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(831, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-04-03', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(832, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-08-14', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(833, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-11-28', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(834, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-12-05', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(835, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-08-21', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(836, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-04-10', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(837, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-11-06', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(838, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-08-28', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(839, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-12-12', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(840, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-04-17', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(841, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-11-13', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(842, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-04-24', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(843, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-09-04', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(844, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-12-19', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(845, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-11-20', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(846, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-09-11', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(847, 56, 10, '0.76', NULL, '0.06', '0.82', '2022-12-26', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(848, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-05-01', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(849, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-11-27', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(850, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-01-02', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(851, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-09-18', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(852, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-05-08', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(853, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-12-04', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(854, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-01-09', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(855, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-05-15', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(856, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-12-11', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(857, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-09-25', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(858, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-01-16', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(859, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-10-02', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(860, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-12-18', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(861, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-05-22', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(862, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-01-23', NULL, '0.00', 0, '2022-02-21 10:02:43', '2022-02-21 10:02:43'),
(863, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-05-29', NULL, '0.00', 0, '2022-02-21 10:02:44', '2022-02-21 10:02:44'),
(864, 53, 10, '0.76', NULL, '0.06', '0.82', '2023-12-25', NULL, '0.00', 0, '2022-02-21 10:02:44', '2022-02-21 10:02:44'),
(865, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-10-09', NULL, '0.00', 0, '2022-02-21 10:02:44', '2022-02-21 10:02:44'),
(866, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-01-30', NULL, '0.00', 0, '2022-02-21 10:02:44', '2022-02-21 10:02:44'),
(867, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-10-16', NULL, '0.00', 0, '2022-02-21 10:02:44', '2022-02-21 10:02:44'),
(868, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-02-06', NULL, '0.00', 0, '2022-02-21 10:02:44', '2022-02-21 10:02:44'),
(869, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-06-05', NULL, '0.00', 0, '2022-02-21 10:02:44', '2022-02-21 10:02:44'),
(870, 53, 10, '0.76', NULL, '0.06', '0.82', '2024-01-01', NULL, '0.00', 0, '2022-02-21 10:02:44', '2022-02-21 10:02:44'),
(871, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-10-23', NULL, '0.00', 0, '2022-02-21 10:02:44', '2022-02-21 10:02:44'),
(872, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-02-13', NULL, '0.00', 0, '2022-02-21 10:02:44', '2022-02-21 10:02:44'),
(873, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-06-12', NULL, '0.00', 0, '2022-02-21 10:02:44', '2022-02-21 10:02:44'),
(874, 53, 10, '0.76', NULL, '0.06', '0.82', '2024-01-08', NULL, '0.00', 0, '2022-02-21 10:02:44', '2022-02-21 10:02:44'),
(875, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-10-30', NULL, '0.00', 0, '2022-02-21 10:02:44', '2022-02-21 10:02:44'),
(876, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-02-20', NULL, '0.00', 0, '2022-02-21 10:02:44', '2022-02-21 10:02:44'),
(877, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-06-19', NULL, '0.00', 0, '2022-02-21 10:02:44', '2022-02-21 10:02:44'),
(878, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-11-06', NULL, '0.00', 0, '2022-02-21 10:02:44', '2022-02-21 10:02:44'),
(879, 53, 10, '0.76', NULL, '0.06', '0.82', '2024-01-15', NULL, '0.00', 0, '2022-02-21 10:02:44', '2022-02-21 10:02:44'),
(880, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-02-27', NULL, '0.00', 0, '2022-02-21 10:02:44', '2022-02-21 10:02:44'),
(881, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-11-13', NULL, '0.00', 0, '2022-02-21 10:02:44', '2022-02-21 10:02:44'),
(882, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-06-26', NULL, '0.00', 0, '2022-02-21 10:02:44', '2022-02-21 10:02:44'),
(883, 53, 10, '0.76', NULL, '0.06', '0.82', '2024-01-22', NULL, '0.00', 0, '2022-02-21 10:02:44', '2022-02-21 10:02:44'),
(884, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-03-06', NULL, '0.00', 0, '2022-02-21 10:02:44', '2022-02-21 10:02:44'),
(885, 53, 10, '0.76', NULL, '0.06', '0.82', '2024-01-29', NULL, '0.00', 0, '2022-02-21 10:02:44', '2022-02-21 10:02:44'),
(886, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-07-03', NULL, '0.00', 0, '2022-02-21 10:02:44', '2022-02-21 10:02:44'),
(887, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-11-20', NULL, '0.00', 0, '2022-02-21 10:02:44', '2022-02-21 10:02:44'),
(888, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-03-13', NULL, '0.00', 0, '2022-02-21 10:02:44', '2022-02-21 10:02:44'),
(889, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-07-10', NULL, '0.00', 0, '2022-02-21 10:02:44', '2022-02-21 10:02:44'),
(890, 53, 10, '0.76', NULL, '0.06', '0.82', '2024-02-05', NULL, '0.00', 0, '2022-02-21 10:02:44', '2022-02-21 10:02:44'),
(891, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-11-27', NULL, '0.00', 0, '2022-02-21 10:02:44', '2022-02-21 10:02:44'),
(892, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-03-20', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(893, 53, 10, '0.76', NULL, '0.06', '0.82', '2024-02-12', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(894, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-07-17', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(895, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-12-04', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(896, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-03-27', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(897, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-12-11', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(898, 53, 10, '0.76', NULL, '0.06', '0.82', '2024-02-19', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(899, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-07-24', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(900, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-04-03', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(901, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-12-18', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(902, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-07-31', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(903, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-04-10', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(904, 54, 10, '0.76', NULL, '0.06', '0.82', '2023-12-25', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(905, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-08-07', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(906, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-04-17', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(907, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-08-14', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(908, 54, 10, '0.76', NULL, '0.06', '0.82', '2024-01-01', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(909, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-04-24', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(910, 54, 10, '0.76', NULL, '0.06', '0.82', '2024-01-08', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(911, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-08-21', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(912, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-05-01', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(913, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-08-28', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(914, 54, 10, '0.76', NULL, '0.06', '0.82', '2024-01-15', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(915, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-05-08', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(916, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-09-04', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(917, 54, 10, '0.76', NULL, '0.06', '0.82', '2024-01-22', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(918, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-05-15', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(919, 54, 10, '0.76', NULL, '0.06', '0.82', '2024-01-29', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(920, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-09-11', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(921, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-05-22', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(922, 54, 10, '0.76', NULL, '0.06', '0.82', '2024-02-05', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(923, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-09-18', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(924, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-05-29', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(925, 54, 10, '0.76', NULL, '0.06', '0.82', '2024-02-12', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(926, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-09-25', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(927, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-06-05', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(928, 54, 10, '0.76', NULL, '0.06', '0.82', '2024-02-19', NULL, '0.00', 0, '2022-02-21 10:02:45', '2022-02-21 10:02:45'),
(929, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-10-02', NULL, '0.00', 0, '2022-02-21 10:02:46', '2022-02-21 10:02:46'),
(930, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-06-12', NULL, '0.00', 0, '2022-02-21 10:02:46', '2022-02-21 10:02:46'),
(931, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-10-09', NULL, '0.00', 0, '2022-02-21 10:02:46', '2022-02-21 10:02:46'),
(932, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-06-19', NULL, '0.00', 0, '2022-02-21 10:02:46', '2022-02-21 10:02:46'),
(933, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-10-16', NULL, '0.00', 0, '2022-02-21 10:02:46', '2022-02-21 10:02:46'),
(934, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-10-23', NULL, '0.00', 0, '2022-02-21 10:02:46', '2022-02-21 10:02:46'),
(935, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-06-26', NULL, '0.00', 0, '2022-02-21 10:02:46', '2022-02-21 10:02:46'),
(936, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-10-30', NULL, '0.00', 0, '2022-02-21 10:02:46', '2022-02-21 10:02:46'),
(937, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-07-03', NULL, '0.00', 0, '2022-02-21 10:02:46', '2022-02-21 10:02:46'),
(938, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-11-06', NULL, '0.00', 0, '2022-02-21 10:02:46', '2022-02-21 10:02:46'),
(939, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-07-10', NULL, '0.00', 0, '2022-02-21 10:02:46', '2022-02-21 10:02:46'),
(940, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-11-13', NULL, '0.00', 0, '2022-02-21 10:02:46', '2022-02-21 10:02:46'),
(941, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-07-17', NULL, '0.00', 0, '2022-02-21 10:02:46', '2022-02-21 10:02:46'),
(942, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-11-20', NULL, '0.00', 0, '2022-02-21 10:02:47', '2022-02-21 10:02:47'),
(943, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-07-24', NULL, '0.00', 0, '2022-02-21 10:02:47', '2022-02-21 10:02:47'),
(944, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-11-27', NULL, '0.00', 0, '2022-02-21 10:02:47', '2022-02-21 10:02:47'),
(945, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-07-31', NULL, '0.00', 0, '2022-02-21 10:02:47', '2022-02-21 10:02:47'),
(946, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-12-04', NULL, '0.00', 0, '2022-02-21 10:02:47', '2022-02-21 10:02:47'),
(947, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-08-07', NULL, '0.00', 0, '2022-02-21 10:02:47', '2022-02-21 10:02:47'),
(948, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-12-11', NULL, '0.00', 0, '2022-02-21 10:02:47', '2022-02-21 10:02:47'),
(949, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-08-14', NULL, '0.00', 0, '2022-02-21 10:02:47', '2022-02-21 10:02:47'),
(950, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-12-18', NULL, '0.00', 0, '2022-02-21 10:02:47', '2022-02-21 10:02:47'),
(951, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-08-21', NULL, '0.00', 0, '2022-02-21 10:02:47', '2022-02-21 10:02:47'),
(952, 55, 10, '0.76', NULL, '0.06', '0.82', '2023-12-25', NULL, '0.00', 0, '2022-02-21 10:02:47', '2022-02-21 10:02:47'),
(953, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-08-28', NULL, '0.00', 0, '2022-02-21 10:02:47', '2022-02-21 10:02:47'),
(954, 55, 10, '0.76', NULL, '0.06', '0.82', '2024-01-01', NULL, '0.00', 0, '2022-02-21 10:02:47', '2022-02-21 10:02:47'),
(955, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-09-04', NULL, '0.00', 0, '2022-02-21 10:02:47', '2022-02-21 10:02:47'),
(956, 55, 10, '0.76', NULL, '0.06', '0.82', '2024-01-08', NULL, '0.00', 0, '2022-02-21 10:02:47', '2022-02-21 10:02:47'),
(957, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-09-11', NULL, '0.00', 0, '2022-02-21 10:02:47', '2022-02-21 10:02:47'),
(958, 55, 10, '0.76', NULL, '0.06', '0.82', '2024-01-15', NULL, '0.00', 0, '2022-02-21 10:02:47', '2022-02-21 10:02:47'),
(959, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-09-18', NULL, '0.00', 0, '2022-02-21 10:02:47', '2022-02-21 10:02:47'),
(960, 55, 10, '0.76', NULL, '0.06', '0.82', '2024-01-22', NULL, '0.00', 0, '2022-02-21 10:02:47', '2022-02-21 10:02:47'),
(961, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-09-25', NULL, '0.00', 0, '2022-02-21 10:02:47', '2022-02-21 10:02:47'),
(962, 55, 10, '0.76', NULL, '0.06', '0.82', '2024-01-29', NULL, '0.00', 0, '2022-02-21 10:02:47', '2022-02-21 10:02:47'),
(963, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-10-02', NULL, '0.00', 0, '2022-02-21 10:02:47', '2022-02-21 10:02:47'),
(964, 55, 10, '0.76', NULL, '0.06', '0.82', '2024-02-05', NULL, '0.00', 0, '2022-02-21 10:02:47', '2022-02-21 10:02:47'),
(965, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-10-09', NULL, '0.00', 0, '2022-02-21 10:02:48', '2022-02-21 10:02:48'),
(966, 55, 10, '0.76', NULL, '0.06', '0.82', '2024-02-12', NULL, '0.00', 0, '2022-02-21 10:02:48', '2022-02-21 10:02:48'),
(967, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-10-16', NULL, '0.00', 0, '2022-02-21 10:02:48', '2022-02-21 10:02:48'),
(968, 55, 10, '0.76', NULL, '0.06', '0.82', '2024-02-19', NULL, '0.00', 0, '2022-02-21 10:02:48', '2022-02-21 10:02:48'),
(969, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-10-23', NULL, '0.00', 0, '2022-02-21 10:02:48', '2022-02-21 10:02:48'),
(970, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-10-30', NULL, '0.00', 0, '2022-02-21 10:02:48', '2022-02-21 10:02:48'),
(971, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-11-06', NULL, '0.00', 0, '2022-02-21 10:02:48', '2022-02-21 10:02:48'),
(972, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-11-13', NULL, '0.00', 0, '2022-02-21 10:02:48', '2022-02-21 10:02:48'),
(973, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-11-20', NULL, '0.00', 0, '2022-02-21 10:02:48', '2022-02-21 10:02:48'),
(974, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-11-27', NULL, '0.00', 0, '2022-02-21 10:02:48', '2022-02-21 10:02:48'),
(975, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-12-04', NULL, '0.00', 0, '2022-02-21 10:02:48', '2022-02-21 10:02:48'),
(976, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-12-11', NULL, '0.00', 0, '2022-02-21 10:02:48', '2022-02-21 10:02:48'),
(977, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-12-18', NULL, '0.00', 0, '2022-02-21 10:02:48', '2022-02-21 10:02:48'),
(978, 56, 10, '0.76', NULL, '0.06', '0.82', '2023-12-25', NULL, '0.00', 0, '2022-02-21 10:02:48', '2022-02-21 10:02:48'),
(979, 56, 10, '0.76', NULL, '0.06', '0.82', '2024-01-01', NULL, '0.00', 0, '2022-02-21 10:02:48', '2022-02-21 10:02:48'),
(980, 56, 10, '0.76', NULL, '0.06', '0.82', '2024-01-08', NULL, '0.00', 0, '2022-02-21 10:02:48', '2022-02-21 10:02:48'),
(981, 56, 10, '0.76', NULL, '0.06', '0.82', '2024-01-15', NULL, '0.00', 0, '2022-02-21 10:02:49', '2022-02-21 10:02:49'),
(982, 56, 10, '0.76', NULL, '0.06', '0.82', '2024-01-22', NULL, '0.00', 0, '2022-02-21 10:02:49', '2022-02-21 10:02:49'),
(983, 56, 10, '0.76', NULL, '0.06', '0.82', '2024-01-29', NULL, '0.00', 0, '2022-02-21 10:02:49', '2022-02-21 10:02:49'),
(984, 56, 10, '0.76', NULL, '0.06', '0.82', '2024-02-05', NULL, '0.00', 0, '2022-02-21 10:02:49', '2022-02-21 10:02:49'),
(985, 56, 10, '0.76', NULL, '0.06', '0.82', '2024-02-12', NULL, '0.00', 0, '2022-02-21 10:02:49', '2022-02-21 10:02:49'),
(986, 56, 10, '0.76', NULL, '0.06', '0.82', '2024-02-19', NULL, '0.00', 0, '2022-02-21 10:02:50', '2022-02-21 10:02:50'),
(987, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-02-28', NULL, '0.00', 0, '2022-02-21 10:26:59', '2022-02-21 10:26:59'),
(988, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-03-07', NULL, '0.00', 0, '2022-02-21 10:26:59', '2022-02-21 10:26:59'),
(989, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-03-14', NULL, '0.00', 0, '2022-02-21 10:27:00', '2022-02-21 10:27:00'),
(990, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-03-21', NULL, '0.00', 0, '2022-02-21 10:27:00', '2022-02-21 10:27:00'),
(991, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-03-28', NULL, '0.00', 0, '2022-02-21 10:27:00', '2022-02-21 10:27:00'),
(992, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-04-04', NULL, '0.00', 0, '2022-02-21 10:27:00', '2022-02-21 10:27:00'),
(993, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-04-11', NULL, '0.00', 0, '2022-02-21 10:27:00', '2022-02-21 10:27:00'),
(994, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-04-18', NULL, '0.00', 0, '2022-02-21 10:27:00', '2022-02-21 10:27:00'),
(995, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-04-25', NULL, '0.00', 0, '2022-02-21 10:27:00', '2022-02-21 10:27:00'),
(996, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-05-02', NULL, '0.00', 0, '2022-02-21 10:27:00', '2022-02-21 10:27:00'),
(997, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-05-09', NULL, '0.00', 0, '2022-02-21 10:27:00', '2022-02-21 10:27:00'),
(998, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-05-16', NULL, '0.00', 0, '2022-02-21 10:27:01', '2022-02-21 10:27:01'),
(999, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-05-23', NULL, '0.00', 0, '2022-02-21 10:27:01', '2022-02-21 10:27:01'),
(1000, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-05-30', NULL, '0.00', 0, '2022-02-21 10:27:01', '2022-02-21 10:27:01'),
(1001, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-06-06', NULL, '0.00', 0, '2022-02-21 10:27:01', '2022-02-21 10:27:01'),
(1002, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-06-13', NULL, '0.00', 0, '2022-02-21 10:27:01', '2022-02-21 10:27:01'),
(1003, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-06-20', NULL, '0.00', 0, '2022-02-21 10:27:01', '2022-02-21 10:27:01'),
(1004, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-06-27', NULL, '0.00', 0, '2022-02-21 10:27:01', '2022-02-21 10:27:01'),
(1005, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-07-04', NULL, '0.00', 0, '2022-02-21 10:27:01', '2022-02-21 10:27:01'),
(1006, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-07-11', NULL, '0.00', 0, '2022-02-21 10:27:01', '2022-02-21 10:27:01'),
(1007, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-07-18', NULL, '0.00', 0, '2022-02-21 10:27:01', '2022-02-21 10:27:01'),
(1008, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-07-25', NULL, '0.00', 0, '2022-02-21 10:27:01', '2022-02-21 10:27:01'),
(1009, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-08-01', NULL, '0.00', 0, '2022-02-21 10:27:01', '2022-02-21 10:27:01'),
(1010, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-08-08', NULL, '0.00', 0, '2022-02-21 10:27:01', '2022-02-21 10:27:01'),
(1011, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-08-15', NULL, '0.00', 0, '2022-02-21 10:27:01', '2022-02-21 10:27:01'),
(1012, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-08-22', NULL, '0.00', 0, '2022-02-21 10:27:02', '2022-02-21 10:27:02'),
(1013, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-08-29', NULL, '0.00', 0, '2022-02-21 10:27:02', '2022-02-21 10:27:02'),
(1014, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-09-05', NULL, '0.00', 0, '2022-02-21 10:27:02', '2022-02-21 10:27:02'),
(1015, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-09-12', NULL, '0.00', 0, '2022-02-21 10:27:02', '2022-02-21 10:27:02'),
(1016, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-09-19', NULL, '0.00', 0, '2022-02-21 10:27:02', '2022-02-21 10:27:02'),
(1017, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-09-26', NULL, '0.00', 0, '2022-02-21 10:27:02', '2022-02-21 10:27:02'),
(1018, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-10-03', NULL, '0.00', 0, '2022-02-21 10:27:02', '2022-02-21 10:27:02'),
(1019, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-10-10', NULL, '0.00', 0, '2022-02-21 10:27:02', '2022-02-21 10:27:02'),
(1020, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-10-17', NULL, '0.00', 0, '2022-02-21 10:27:02', '2022-02-21 10:27:02'),
(1021, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-10-24', NULL, '0.00', 0, '2022-02-21 10:27:02', '2022-02-21 10:27:02'),
(1022, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-10-31', NULL, '0.00', 0, '2022-02-21 10:27:02', '2022-02-21 10:27:02'),
(1023, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-11-07', NULL, '0.00', 0, '2022-02-21 10:27:02', '2022-02-21 10:27:02'),
(1024, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-11-14', NULL, '0.00', 0, '2022-02-21 10:27:02', '2022-02-21 10:27:02'),
(1025, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-11-21', NULL, '0.00', 0, '2022-02-21 10:27:02', '2022-02-21 10:27:02'),
(1026, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-11-28', NULL, '0.00', 0, '2022-02-21 10:27:02', '2022-02-21 10:27:02'),
(1027, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-12-05', NULL, '0.00', 0, '2022-02-21 10:27:02', '2022-02-21 10:27:02'),
(1028, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-12-12', NULL, '0.00', 0, '2022-02-21 10:27:02', '2022-02-21 10:27:02'),
(1029, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-12-19', NULL, '0.00', 0, '2022-02-21 10:27:02', '2022-02-21 10:27:02'),
(1030, 57, 10, '468.43', NULL, '38.65', '507.08', '2022-12-26', NULL, '0.00', 0, '2022-02-21 10:27:02', '2022-02-21 10:27:02'),
(1031, 57, 10, '468.43', NULL, '38.65', '507.08', '2023-01-02', NULL, '0.00', 0, '2022-02-21 10:27:02', '2022-02-21 10:27:02'),
(1032, 57, 10, '468.43', NULL, '38.65', '507.08', '2023-01-09', NULL, '0.00', 0, '2022-02-21 10:27:02', '2022-02-21 10:27:02'),
(1033, 57, 10, '468.43', NULL, '38.65', '507.08', '2023-01-16', NULL, '0.00', 0, '2022-02-21 10:27:02', '2022-02-21 10:27:02'),
(1034, 57, 10, '468.43', NULL, '38.65', '507.08', '2023-01-23', NULL, '0.00', 0, '2022-02-21 10:27:02', '2022-02-21 10:27:02'),
(1035, 57, 10, '468.43', NULL, '38.65', '507.08', '2023-01-30', NULL, '0.00', 0, '2022-02-21 10:27:02', '2022-02-21 10:27:02'),
(1036, 57, 10, '468.43', NULL, '38.65', '507.08', '2023-02-06', NULL, '0.00', 0, '2022-02-21 10:27:02', '2022-02-21 10:27:02'),
(1037, 57, 10, '468.43', NULL, '38.65', '507.08', '2023-02-13', NULL, '0.00', 0, '2022-02-21 10:27:02', '2022-02-21 10:27:02'),
(1038, 57, 10, '468.43', NULL, '38.65', '507.08', '2023-02-20', NULL, '0.00', 0, '2022-02-21 10:27:02', '2022-02-21 10:27:02'),
(1039, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-02-28', NULL, '0.00', 0, '2022-02-21 10:28:54', '2022-02-21 10:28:54'),
(1040, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-03-07', NULL, '0.00', 0, '2022-02-21 10:28:54', '2022-02-21 10:28:54'),
(1041, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-03-14', NULL, '0.00', 0, '2022-02-21 10:28:54', '2022-02-21 10:28:54'),
(1042, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-03-21', NULL, '0.00', 0, '2022-02-21 10:28:54', '2022-02-21 10:28:54'),
(1043, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-03-28', NULL, '0.00', 0, '2022-02-21 10:28:54', '2022-02-21 10:28:54'),
(1044, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-04-04', NULL, '0.00', 0, '2022-02-21 10:28:54', '2022-02-21 10:28:54'),
(1045, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-04-11', NULL, '0.00', 0, '2022-02-21 10:28:54', '2022-02-21 10:28:54'),
(1046, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-04-18', NULL, '0.00', 0, '2022-02-21 10:28:55', '2022-02-21 10:28:55'),
(1047, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-04-25', NULL, '0.00', 0, '2022-02-21 10:28:55', '2022-02-21 10:28:55'),
(1048, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-05-02', NULL, '0.00', 0, '2022-02-21 10:28:55', '2022-02-21 10:28:55'),
(1049, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-05-09', NULL, '0.00', 0, '2022-02-21 10:28:55', '2022-02-21 10:28:55'),
(1050, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-05-16', NULL, '0.00', 0, '2022-02-21 10:28:55', '2022-02-21 10:28:55'),
(1051, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-05-23', NULL, '0.00', 0, '2022-02-21 10:28:55', '2022-02-21 10:28:55'),
(1052, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-05-30', NULL, '0.00', 0, '2022-02-21 10:28:56', '2022-02-21 10:28:56'),
(1053, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-06-06', NULL, '0.00', 0, '2022-02-21 10:28:56', '2022-02-21 10:28:56'),
(1054, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-06-13', NULL, '0.00', 0, '2022-02-21 10:28:56', '2022-02-21 10:28:56'),
(1055, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-06-20', NULL, '0.00', 0, '2022-02-21 10:28:56', '2022-02-21 10:28:56'),
(1056, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-06-27', NULL, '0.00', 0, '2022-02-21 10:28:56', '2022-02-21 10:28:56'),
(1057, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-07-04', NULL, '0.00', 0, '2022-02-21 10:28:56', '2022-02-21 10:28:56'),
(1058, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-07-11', NULL, '0.00', 0, '2022-02-21 10:28:56', '2022-02-21 10:28:56'),
(1059, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-07-18', NULL, '0.00', 0, '2022-02-21 10:28:56', '2022-02-21 10:28:56'),
(1060, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-07-25', NULL, '0.00', 0, '2022-02-21 10:28:56', '2022-02-21 10:28:56'),
(1061, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-08-01', NULL, '0.00', 0, '2022-02-21 10:28:57', '2022-02-21 10:28:57'),
(1062, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-08-08', NULL, '0.00', 0, '2022-02-21 10:28:57', '2022-02-21 10:28:57'),
(1063, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-08-15', NULL, '0.00', 0, '2022-02-21 10:28:57', '2022-02-21 10:28:57'),
(1064, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-08-22', NULL, '0.00', 0, '2022-02-21 10:28:57', '2022-02-21 10:28:57'),
(1065, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-08-29', NULL, '0.00', 0, '2022-02-21 10:28:57', '2022-02-21 10:28:57'),
(1066, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-09-05', NULL, '0.00', 0, '2022-02-21 10:28:57', '2022-02-21 10:28:57'),
(1067, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-09-12', NULL, '0.00', 0, '2022-02-21 10:28:57', '2022-02-21 10:28:57'),
(1068, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-02-28', NULL, '0.00', 0, '2022-02-21 10:28:57', '2022-02-21 10:28:57'),
(1069, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-09-19', NULL, '0.00', 0, '2022-02-21 10:28:57', '2022-02-21 10:28:57'),
(1070, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-03-07', NULL, '0.00', 0, '2022-02-21 10:28:57', '2022-02-21 10:28:57'),
(1071, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-09-26', NULL, '0.00', 0, '2022-02-21 10:28:57', '2022-02-21 10:28:57'),
(1072, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-03-14', NULL, '0.00', 0, '2022-02-21 10:28:57', '2022-02-21 10:28:57'),
(1073, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-10-03', NULL, '0.00', 0, '2022-02-21 10:28:57', '2022-02-21 10:28:57'),
(1074, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-10-10', NULL, '0.00', 0, '2022-02-21 10:28:57', '2022-02-21 10:28:57'),
(1075, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-03-21', NULL, '0.00', 0, '2022-02-21 10:28:57', '2022-02-21 10:28:57'),
(1076, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-03-28', NULL, '0.00', 0, '2022-02-21 10:28:57', '2022-02-21 10:28:57'),
(1077, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-10-17', NULL, '0.00', 0, '2022-02-21 10:28:57', '2022-02-21 10:28:57'),
(1078, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-04-04', NULL, '0.00', 0, '2022-02-21 10:28:58', '2022-02-21 10:28:58'),
(1079, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-10-24', NULL, '0.00', 0, '2022-02-21 10:28:58', '2022-02-21 10:28:58'),
(1080, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-04-11', NULL, '0.00', 0, '2022-02-21 10:28:58', '2022-02-21 10:28:58'),
(1081, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-10-31', NULL, '0.00', 0, '2022-02-21 10:28:58', '2022-02-21 10:28:58'),
(1082, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-04-18', NULL, '0.00', 0, '2022-02-21 10:28:58', '2022-02-21 10:28:58'),
(1083, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-11-07', NULL, '0.00', 0, '2022-02-21 10:28:58', '2022-02-21 10:28:58'),
(1084, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-04-25', NULL, '0.00', 0, '2022-02-21 10:28:58', '2022-02-21 10:28:58'),
(1085, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-11-14', NULL, '0.00', 0, '2022-02-21 10:28:58', '2022-02-21 10:28:58'),
(1086, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-11-21', NULL, '0.00', 0, '2022-02-21 10:28:58', '2022-02-21 10:28:58'),
(1087, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-05-02', NULL, '0.00', 0, '2022-02-21 10:28:58', '2022-02-21 10:28:58'),
(1088, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-11-28', NULL, '0.00', 0, '2022-02-21 10:28:58', '2022-02-21 10:28:58'),
(1089, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-05-09', NULL, '0.00', 0, '2022-02-21 10:28:58', '2022-02-21 10:28:58'),
(1090, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-12-05', NULL, '0.00', 0, '2022-02-21 10:28:58', '2022-02-21 10:28:58'),
(1091, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-05-16', NULL, '0.00', 0, '2022-02-21 10:28:58', '2022-02-21 10:28:58'),
(1092, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-12-12', NULL, '0.00', 0, '2022-02-21 10:28:58', '2022-02-21 10:28:58'),
(1093, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-05-23', NULL, '0.00', 0, '2022-02-21 10:28:58', '2022-02-21 10:28:58'),
(1094, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-12-19', NULL, '0.00', 0, '2022-02-21 10:28:58', '2022-02-21 10:28:58'),
(1095, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-05-30', NULL, '0.00', 0, '2022-02-21 10:28:58', '2022-02-21 10:28:58'),
(1096, 58, 10, '7.68', NULL, '0.63', '8.31', '2022-12-26', NULL, '0.00', 0, '2022-02-21 10:28:58', '2022-02-21 10:28:58'),
(1097, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-06-06', NULL, '0.00', 0, '2022-02-21 10:28:58', '2022-02-21 10:28:58'),
(1098, 58, 10, '7.68', NULL, '0.63', '8.31', '2023-01-02', NULL, '0.00', 0, '2022-02-21 10:28:58', '2022-02-21 10:28:58'),
(1099, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-06-13', NULL, '0.00', 0, '2022-02-21 10:28:58', '2022-02-21 10:28:58'),
(1100, 58, 10, '7.68', NULL, '0.63', '8.31', '2023-01-09', NULL, '0.00', 0, '2022-02-21 10:28:59', '2022-02-21 10:28:59'),
(1101, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-06-20', NULL, '0.00', 0, '2022-02-21 10:28:59', '2022-02-21 10:28:59'),
(1102, 58, 10, '7.68', NULL, '0.63', '8.31', '2023-01-16', NULL, '0.00', 0, '2022-02-21 10:28:59', '2022-02-21 10:28:59'),
(1103, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-06-27', NULL, '0.00', 0, '2022-02-21 10:28:59', '2022-02-21 10:28:59'),
(1104, 58, 10, '7.68', NULL, '0.63', '8.31', '2023-01-23', NULL, '0.00', 0, '2022-02-21 10:28:59', '2022-02-21 10:28:59'),
(1105, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-07-04', NULL, '0.00', 0, '2022-02-21 10:28:59', '2022-02-21 10:28:59'),
(1106, 58, 10, '7.68', NULL, '0.63', '8.31', '2023-01-30', NULL, '0.00', 0, '2022-02-21 10:28:59', '2022-02-21 10:28:59'),
(1107, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-07-11', NULL, '0.00', 0, '2022-02-21 10:28:59', '2022-02-21 10:28:59'),
(1108, 58, 10, '7.68', NULL, '0.63', '8.31', '2023-02-06', NULL, '0.00', 0, '2022-02-21 10:28:59', '2022-02-21 10:28:59'),
(1109, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-07-18', NULL, '0.00', 0, '2022-02-21 10:28:59', '2022-02-21 10:28:59'),
(1110, 58, 10, '7.68', NULL, '0.63', '8.31', '2023-02-13', NULL, '0.00', 0, '2022-02-21 10:28:59', '2022-02-21 10:28:59'),
(1111, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-07-25', NULL, '0.00', 0, '2022-02-21 10:28:59', '2022-02-21 10:28:59'),
(1112, 58, 10, '7.68', NULL, '0.63', '8.31', '2023-02-20', NULL, '0.00', 0, '2022-02-21 10:28:59', '2022-02-21 10:28:59'),
(1113, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-08-01', NULL, '0.00', 0, '2022-02-21 10:28:59', '2022-02-21 10:28:59'),
(1114, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-08-08', NULL, '0.00', 0, '2022-02-21 10:28:59', '2022-02-21 10:28:59'),
(1115, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-08-15', NULL, '0.00', 0, '2022-02-21 10:28:59', '2022-02-21 10:28:59'),
(1116, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-08-22', NULL, '0.00', 0, '2022-02-21 10:29:00', '2022-02-21 10:29:00'),
(1117, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-08-29', NULL, '0.00', 0, '2022-02-21 10:29:00', '2022-02-21 10:29:00'),
(1118, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-09-05', NULL, '0.00', 0, '2022-02-21 10:29:00', '2022-02-21 10:29:00'),
(1119, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-09-12', NULL, '0.00', 0, '2022-02-21 10:29:00', '2022-02-21 10:29:00'),
(1120, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-09-19', NULL, '0.00', 0, '2022-02-21 10:29:00', '2022-02-21 10:29:00'),
(1121, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-09-26', NULL, '0.00', 0, '2022-02-21 10:29:00', '2022-02-21 10:29:00'),
(1122, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-10-03', NULL, '0.00', 0, '2022-02-21 10:29:00', '2022-02-21 10:29:00'),
(1123, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-10-10', NULL, '0.00', 0, '2022-02-21 10:29:00', '2022-02-21 10:29:00'),
(1124, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-10-17', NULL, '0.00', 0, '2022-02-21 10:29:00', '2022-02-21 10:29:00'),
(1125, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-10-24', NULL, '0.00', 0, '2022-02-21 10:29:00', '2022-02-21 10:29:00'),
(1126, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-10-31', NULL, '0.00', 0, '2022-02-21 10:29:00', '2022-02-21 10:29:00'),
(1127, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-11-07', NULL, '0.00', 0, '2022-02-21 10:29:00', '2022-02-21 10:29:00'),
(1128, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-11-14', NULL, '0.00', 0, '2022-02-21 10:29:00', '2022-02-21 10:29:00'),
(1129, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-11-21', NULL, '0.00', 0, '2022-02-21 10:29:00', '2022-02-21 10:29:00'),
(1130, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-11-28', NULL, '0.00', 0, '2022-02-21 10:29:01', '2022-02-21 10:29:01'),
(1131, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-12-05', NULL, '0.00', 0, '2022-02-21 10:29:01', '2022-02-21 10:29:01'),
(1132, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-12-12', NULL, '0.00', 0, '2022-02-21 10:29:01', '2022-02-21 10:29:01'),
(1133, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-12-19', NULL, '0.00', 0, '2022-02-21 10:29:01', '2022-02-21 10:29:01'),
(1134, 59, 10, '7.68', NULL, '0.63', '8.31', '2022-12-26', NULL, '0.00', 0, '2022-02-21 10:29:01', '2022-02-21 10:29:01'),
(1135, 59, 10, '7.68', NULL, '0.63', '8.31', '2023-01-02', NULL, '0.00', 0, '2022-02-21 10:29:01', '2022-02-21 10:29:01'),
(1136, 59, 10, '7.68', NULL, '0.63', '8.31', '2023-01-09', NULL, '0.00', 0, '2022-02-21 10:29:01', '2022-02-21 10:29:01'),
(1137, 59, 10, '7.68', NULL, '0.63', '8.31', '2023-01-16', NULL, '0.00', 0, '2022-02-21 10:29:01', '2022-02-21 10:29:01'),
(1138, 59, 10, '7.68', NULL, '0.63', '8.31', '2023-01-23', NULL, '0.00', 0, '2022-02-21 10:29:01', '2022-02-21 10:29:01'),
(1139, 59, 10, '7.68', NULL, '0.63', '8.31', '2023-01-30', NULL, '0.00', 0, '2022-02-21 10:29:01', '2022-02-21 10:29:01'),
(1140, 59, 10, '7.68', NULL, '0.63', '8.31', '2023-02-06', NULL, '0.00', 0, '2022-02-21 10:29:02', '2022-02-21 10:29:02'),
(1141, 59, 10, '7.68', NULL, '0.63', '8.31', '2023-02-13', NULL, '0.00', 0, '2022-02-21 10:29:02', '2022-02-21 10:29:02'),
(1142, 59, 10, '7.68', NULL, '0.63', '8.31', '2023-02-20', NULL, '0.00', 0, '2022-02-21 10:29:02', '2022-02-21 10:29:02'),
(1143, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-02-28', NULL, '0.00', 0, '2022-02-21 10:30:02', '2022-02-21 10:30:02'),
(1144, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-03-07', NULL, '0.00', 0, '2022-02-21 10:30:02', '2022-02-21 10:30:02'),
(1145, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-03-14', NULL, '0.00', 0, '2022-02-21 10:30:03', '2022-02-21 10:30:03'),
(1146, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-03-21', NULL, '0.00', 0, '2022-02-21 10:30:03', '2022-02-21 10:30:03'),
(1147, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-03-28', NULL, '0.00', 0, '2022-02-21 10:30:03', '2022-02-21 10:30:03'),
(1148, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-04-04', NULL, '0.00', 0, '2022-02-21 10:30:03', '2022-02-21 10:30:03'),
(1149, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-04-11', NULL, '0.00', 0, '2022-02-21 10:30:03', '2022-02-21 10:30:03'),
(1150, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-04-18', NULL, '0.00', 0, '2022-02-21 10:30:03', '2022-02-21 10:30:03'),
(1151, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-04-25', NULL, '0.00', 0, '2022-02-21 10:30:03', '2022-02-21 10:30:03'),
(1152, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-05-02', NULL, '0.00', 0, '2022-02-21 10:30:03', '2022-02-21 10:30:03'),
(1153, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-05-09', NULL, '0.00', 0, '2022-02-21 10:30:03', '2022-02-21 10:30:03'),
(1154, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-05-16', NULL, '0.00', 0, '2022-02-21 10:30:03', '2022-02-21 10:30:03'),
(1155, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-05-23', NULL, '0.00', 0, '2022-02-21 10:30:03', '2022-02-21 10:30:03'),
(1156, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-05-30', NULL, '0.00', 0, '2022-02-21 10:30:03', '2022-02-21 10:30:03'),
(1157, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-06-06', NULL, '0.00', 0, '2022-02-21 10:30:03', '2022-02-21 10:30:03'),
(1158, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-06-13', NULL, '0.00', 0, '2022-02-21 10:30:03', '2022-02-21 10:30:03'),
(1159, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-06-20', NULL, '0.00', 0, '2022-02-21 10:30:03', '2022-02-21 10:30:03'),
(1160, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-06-27', NULL, '0.00', 0, '2022-02-21 10:30:03', '2022-02-21 10:30:03'),
(1161, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-07-04', NULL, '0.00', 0, '2022-02-21 10:30:03', '2022-02-21 10:30:03'),
(1162, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-07-11', NULL, '0.00', 0, '2022-02-21 10:30:03', '2022-02-21 10:30:03'),
(1163, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-07-18', NULL, '0.00', 0, '2022-02-21 10:30:04', '2022-02-21 10:30:04'),
(1164, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-07-25', NULL, '0.00', 0, '2022-02-21 10:30:04', '2022-02-21 10:30:04'),
(1165, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-08-01', NULL, '0.00', 0, '2022-02-21 10:30:04', '2022-02-21 10:30:04'),
(1166, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-08-08', NULL, '0.00', 0, '2022-02-21 10:30:04', '2022-02-21 10:30:04'),
(1167, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-08-15', NULL, '0.00', 0, '2022-02-21 10:30:04', '2022-02-21 10:30:04'),
(1168, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-08-22', NULL, '0.00', 0, '2022-02-21 10:30:04', '2022-02-21 10:30:04'),
(1169, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-08-29', NULL, '0.00', 0, '2022-02-21 10:30:04', '2022-02-21 10:30:04'),
(1170, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-09-05', NULL, '0.00', 0, '2022-02-21 10:30:04', '2022-02-21 10:30:04'),
(1171, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-09-12', NULL, '0.00', 0, '2022-02-21 10:30:04', '2022-02-21 10:30:04'),
(1172, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-09-19', NULL, '0.00', 0, '2022-02-21 10:30:04', '2022-02-21 10:30:04'),
(1173, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-09-26', NULL, '0.00', 0, '2022-02-21 10:30:04', '2022-02-21 10:30:04'),
(1174, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-10-03', NULL, '0.00', 0, '2022-02-21 10:30:04', '2022-02-21 10:30:04'),
(1175, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-10-10', NULL, '0.00', 0, '2022-02-21 10:30:04', '2022-02-21 10:30:04'),
(1176, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-10-17', NULL, '0.00', 0, '2022-02-21 10:30:04', '2022-02-21 10:30:04'),
(1177, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-10-24', NULL, '0.00', 0, '2022-02-21 10:30:04', '2022-02-21 10:30:04'),
(1178, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-10-31', NULL, '0.00', 0, '2022-02-21 10:30:04', '2022-02-21 10:30:04'),
(1179, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-11-07', NULL, '0.00', 0, '2022-02-21 10:30:04', '2022-02-21 10:30:04'),
(1180, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-11-14', NULL, '0.00', 0, '2022-02-21 10:30:04', '2022-02-21 10:30:04'),
(1181, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-11-21', NULL, '0.00', 0, '2022-02-21 10:30:05', '2022-02-21 10:30:05'),
(1182, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-11-28', NULL, '0.00', 0, '2022-02-21 10:30:05', '2022-02-21 10:30:05'),
(1183, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-12-05', NULL, '0.00', 0, '2022-02-21 10:30:05', '2022-02-21 10:30:05'),
(1184, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-12-12', NULL, '0.00', 0, '2022-02-21 10:30:05', '2022-02-21 10:30:05'),
(1185, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-12-19', NULL, '0.00', 0, '2022-02-21 10:30:05', '2022-02-21 10:30:05'),
(1186, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2022-12-26', NULL, '0.00', 0, '2022-02-21 10:30:05', '2022-02-21 10:30:05'),
(1187, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2023-01-02', NULL, '0.00', 0, '2022-02-21 10:30:05', '2022-02-21 10:30:05'),
(1188, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2023-01-09', NULL, '0.00', 0, '2022-02-21 10:30:05', '2022-02-21 10:30:05'),
(1189, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2023-01-16', NULL, '0.00', 0, '2022-02-21 10:30:05', '2022-02-21 10:30:05'),
(1190, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2023-01-23', NULL, '0.00', 0, '2022-02-21 10:30:05', '2022-02-21 10:30:05'),
(1191, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2023-01-30', NULL, '0.00', 0, '2022-02-21 10:30:05', '2022-02-21 10:30:05'),
(1192, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2023-02-06', NULL, '0.00', 0, '2022-02-21 10:30:05', '2022-02-21 10:30:05'),
(1193, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2023-02-13', NULL, '0.00', 0, '2022-02-21 10:30:05', '2022-02-21 10:30:05'),
(1194, 60, 10, '1894.16', NULL, '156.27', '2050.43', '2023-02-20', NULL, '0.00', 0, '2022-02-21 10:30:05', '2022-02-21 10:30:05'),
(1195, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-03-19', NULL, '0.00', 0, '2022-03-12 14:42:06', '2022-03-12 14:42:06'),
(1196, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-03-26', NULL, '0.00', 0, '2022-03-12 14:42:06', '2022-03-12 14:42:06'),
(1197, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-04-02', NULL, '0.00', 0, '2022-03-12 14:42:06', '2022-03-12 14:42:06'),
(1198, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-04-09', NULL, '0.00', 0, '2022-03-12 14:42:06', '2022-03-12 14:42:06'),
(1199, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-04-16', NULL, '0.00', 0, '2022-03-12 14:42:06', '2022-03-12 14:42:06'),
(1200, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-04-23', NULL, '0.00', 0, '2022-03-12 14:42:07', '2022-03-12 14:42:07'),
(1201, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-04-30', NULL, '0.00', 0, '2022-03-12 14:42:07', '2022-03-12 14:42:07'),
(1202, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-05-07', NULL, '0.00', 0, '2022-03-12 14:42:07', '2022-03-12 14:42:07'),
(1203, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-05-14', NULL, '0.00', 0, '2022-03-12 14:42:07', '2022-03-12 14:42:07'),
(1204, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-05-21', NULL, '0.00', 0, '2022-03-12 14:42:07', '2022-03-12 14:42:07'),
(1205, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-05-28', NULL, '0.00', 0, '2022-03-12 14:42:07', '2022-03-12 14:42:07'),
(1206, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-06-04', NULL, '0.00', 0, '2022-03-12 14:42:07', '2022-03-12 14:42:07'),
(1207, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-06-11', NULL, '0.00', 0, '2022-03-12 14:42:07', '2022-03-12 14:42:07'),
(1208, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-06-18', NULL, '0.00', 0, '2022-03-12 14:42:07', '2022-03-12 14:42:07'),
(1209, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-06-25', NULL, '0.00', 0, '2022-03-12 14:42:07', '2022-03-12 14:42:07'),
(1210, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-07-02', NULL, '0.00', 0, '2022-03-12 14:42:07', '2022-03-12 14:42:07'),
(1211, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-07-09', NULL, '0.00', 0, '2022-03-12 14:42:07', '2022-03-12 14:42:07'),
(1212, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-07-16', NULL, '0.00', 0, '2022-03-12 14:42:07', '2022-03-12 14:42:07'),
(1213, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-07-23', NULL, '0.00', 0, '2022-03-12 14:42:07', '2022-03-12 14:42:07'),
(1214, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-07-30', NULL, '0.00', 0, '2022-03-12 14:42:07', '2022-03-12 14:42:07'),
(1215, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-08-06', NULL, '0.00', 0, '2022-03-12 14:42:07', '2022-03-12 14:42:07'),
(1216, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-08-13', NULL, '0.00', 0, '2022-03-12 14:42:07', '2022-03-12 14:42:07'),
(1217, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-08-20', NULL, '0.00', 0, '2022-03-12 14:42:07', '2022-03-12 14:42:07'),
(1218, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-08-27', NULL, '0.00', 0, '2022-03-12 14:42:07', '2022-03-12 14:42:07'),
(1219, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-09-03', NULL, '0.00', 0, '2022-03-12 14:42:07', '2022-03-12 14:42:07'),
(1220, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-09-10', NULL, '0.00', 0, '2022-03-12 14:42:07', '2022-03-12 14:42:07'),
(1221, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-09-17', NULL, '0.00', 0, '2022-03-12 14:42:07', '2022-03-12 14:42:07'),
(1222, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-09-24', NULL, '0.00', 0, '2022-03-12 14:42:07', '2022-03-12 14:42:07'),
(1223, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-10-01', NULL, '0.00', 0, '2022-03-12 14:42:07', '2022-03-12 14:42:07'),
(1224, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-10-08', NULL, '0.00', 0, '2022-03-12 14:42:07', '2022-03-12 14:42:07'),
(1225, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-10-15', NULL, '0.00', 0, '2022-03-12 14:42:07', '2022-03-12 14:42:07'),
(1226, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-10-22', NULL, '0.00', 0, '2022-03-12 14:42:08', '2022-03-12 14:42:08');
INSERT INTO `invoices` (`id`, `contract_id`, `customer_id`, `amount`, `fee`, `sales_tax`, `total_amount_to_pay`, `due_date`, `paid_date`, `late_fee`, `status`, `created_at`, `updated_at`) VALUES
(1227, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-10-29', NULL, '0.00', 0, '2022-03-12 14:42:08', '2022-03-12 14:42:08'),
(1228, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-11-05', NULL, '0.00', 0, '2022-03-12 14:42:08', '2022-03-12 14:42:08'),
(1229, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-11-12', NULL, '0.00', 0, '2022-03-12 14:42:08', '2022-03-12 14:42:08'),
(1230, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-11-19', NULL, '0.00', 0, '2022-03-12 14:42:08', '2022-03-12 14:42:08'),
(1231, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-11-26', NULL, '0.00', 0, '2022-03-12 14:42:08', '2022-03-12 14:42:08'),
(1232, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-12-03', NULL, '0.00', 0, '2022-03-12 14:42:08', '2022-03-12 14:42:08'),
(1233, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-12-10', NULL, '0.00', 0, '2022-03-12 14:42:08', '2022-03-12 14:42:08'),
(1234, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-12-17', NULL, '0.00', 0, '2022-03-12 14:42:08', '2022-03-12 14:42:08'),
(1235, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-12-24', NULL, '0.00', 0, '2022-03-12 14:42:08', '2022-03-12 14:42:08'),
(1236, 61, 1, '99.31', NULL, '8.19', '107.50', '2022-12-31', NULL, '0.00', 0, '2022-03-12 14:42:08', '2022-03-12 14:42:08'),
(1237, 61, 1, '99.31', NULL, '8.19', '107.50', '2023-01-07', NULL, '0.00', 0, '2022-03-12 14:42:08', '2022-03-12 14:42:08'),
(1238, 61, 1, '99.31', NULL, '8.19', '107.50', '2023-01-14', NULL, '0.00', 0, '2022-03-12 14:42:08', '2022-03-12 14:42:08'),
(1239, 61, 1, '99.31', NULL, '8.19', '107.50', '2023-01-21', NULL, '0.00', 0, '2022-03-12 14:42:08', '2022-03-12 14:42:08'),
(1240, 61, 1, '99.31', NULL, '8.19', '107.50', '2023-01-28', NULL, '0.00', 0, '2022-03-12 14:42:08', '2022-03-12 14:42:08'),
(1241, 61, 1, '99.31', NULL, '8.19', '107.50', '2023-02-04', NULL, '0.00', 0, '2022-03-12 14:42:08', '2022-03-12 14:42:08'),
(1242, 61, 1, '99.31', NULL, '8.19', '107.50', '2023-02-11', NULL, '0.00', 0, '2022-03-12 14:42:08', '2022-03-12 14:42:08'),
(1243, 61, 1, '99.31', NULL, '8.19', '107.50', '2023-02-18', NULL, '0.00', 0, '2022-03-12 14:42:08', '2022-03-12 14:42:08'),
(1244, 61, 1, '99.31', NULL, '8.19', '107.50', '2023-02-25', NULL, '0.00', 0, '2022-03-12 14:42:08', '2022-03-12 14:42:08'),
(1245, 61, 1, '99.31', NULL, '8.19', '107.50', '2023-03-04', NULL, '0.00', 0, '2022-03-12 14:42:08', '2022-03-12 14:42:08'),
(1246, 61, 1, '99.31', NULL, '8.19', '107.50', '2023-03-11', NULL, '0.00', 0, '2022-03-12 14:42:08', '2022-03-12 14:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_category`
--

CREATE TABLE `ticket_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_category`
--

INSERT INTO `ticket_category` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'help desk', '2021-12-19 10:51:08', '2021-12-19 10:51:08'),
(2, 'accounting', '2021-12-19 10:51:08', '2021-12-19 10:51:08'),
(3, 'Account Pay', '2022-01-05 19:25:33', '2022-01-05 19:25:33'),
(4, 'Account Receive', '2022-01-05 19:25:33', '2022-01-05 19:25:33'),
(5, 'Customer Service', '2022-01-05 19:26:19', '2022-01-05 19:26:19'),
(6, 'Dealer Service', '2022-01-05 19:26:19', '2022-01-05 19:26:19'),
(7, 'manager', '2022-01-09 13:09:41', '2022-01-09 13:09:41'),
(8, 'Admin', '2022-01-09 13:09:41', '2022-01-09 13:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_status`
--

CREATE TABLE `ticket_status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_status`
--

INSERT INTO `ticket_status` (`id`, `status_name`, `created_at`, `updated_at`) VALUES
(1, 'Pending', '2021-12-20 06:39:34', '2021-12-20 06:39:34'),
(2, 'Inprogress', '2021-12-20 06:39:34', '2021-12-20 06:39:34'),
(3, 'Completed', '2021-12-20 06:39:52', '2021-12-20 06:39:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contract_type-id` (`contract_type_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `dealer_id` (`dealer_id`);

--
-- Indexes for table `contract_products`
--
ALTER TABLE `contract_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contract_id` (`contract_id`);

--
-- Indexes for table `contract_type`
--
ALTER TABLE `contract_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `drive_license_number` (`drive_license_number`),
  ADD UNIQUE KEY `ssn` (`ssn`);

--
-- Indexes for table `customer_bank`
--
ALTER TABLE `customer_bank`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `card_number` (`card_number`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customer_docs`
--
ALTER TABLE `customer_docs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contract_id` (`contract_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customer_income`
--
ALTER TABLE `customer_income`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customer_notes`
--
ALTER TABLE `customer_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customer_relatives`
--
ALTER TABLE `customer_relatives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customer_ticket`
--
ALTER TABLE `customer_ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `ticket_category_id` (`ticket_category_id`),
  ADD KEY `ticket_status_id` (`ticket_status_id`);

--
-- Indexes for table `customer_ticket_docs`
--
ALTER TABLE `customer_ticket_docs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_id` (`customer_ticket_id`);

--
-- Indexes for table `customer_transaction`
--
ALTER TABLE `customer_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_id` (`invoice_id`);

--
-- Indexes for table `dealer`
--
ALTER TABLE `dealer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `ein` (`ein`);

--
-- Indexes for table `dealer_bank`
--
ALTER TABLE `dealer_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dealer_docs`
--
ALTER TABLE `dealer_docs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dealer_id` (`dealer_id`),
  ADD KEY `contract_id` (`contract_id`);

--
-- Indexes for table `dealer_invoices`
--
ALTER TABLE `dealer_invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dealer_id` (`dealer_id`),
  ADD KEY `contract_id` (`contract_id`);

--
-- Indexes for table `dealer_notes`
--
ALTER TABLE `dealer_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dealer_id` (`dealer_id`);

--
-- Indexes for table `dealer_ticket`
--
ALTER TABLE `dealer_ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dealer_id` (`dealer_id`),
  ADD KEY `ticket_catgeory_id` (`ticket_category_id`),
  ADD KEY `ticket_status-id` (`ticket_status_id`);

--
-- Indexes for table `dealer_ticket_docs`
--
ALTER TABLE `dealer_ticket_docs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_id` (`dealer_ticket_id`);

--
-- Indexes for table `dealer_transaction`
--
ALTER TABLE `dealer_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `contract_id` (`contract_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `ssn` (`ssn`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `employee_docs`
--
ALTER TABLE `employee_docs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contract_id` (`contract_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `employee_notes`
--
ALTER TABLE `employee_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `employee_roles`
--
ALTER TABLE `employee_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_todo_list`
--
ALTER TABLE `employee_todo_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assign_by` (`assign_by`);

--
-- Indexes for table `interest_rate`
--
ALTER TABLE `interest_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contract_id` (`contract_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `ticket_category`
--
ALTER TABLE `ticket_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_status`
--
ALTER TABLE `ticket_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `contract_products`
--
ALTER TABLE `contract_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `contract_type`
--
ALTER TABLE `contract_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer_bank`
--
ALTER TABLE `customer_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer_docs`
--
ALTER TABLE `customer_docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_income`
--
ALTER TABLE `customer_income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer_notes`
--
ALTER TABLE `customer_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_relatives`
--
ALTER TABLE `customer_relatives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `customer_ticket`
--
ALTER TABLE `customer_ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_ticket_docs`
--
ALTER TABLE `customer_ticket_docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_transaction`
--
ALTER TABLE `customer_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dealer`
--
ALTER TABLE `dealer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dealer_bank`
--
ALTER TABLE `dealer_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dealer_docs`
--
ALTER TABLE `dealer_docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dealer_invoices`
--
ALTER TABLE `dealer_invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dealer_notes`
--
ALTER TABLE `dealer_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dealer_ticket`
--
ALTER TABLE `dealer_ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dealer_ticket_docs`
--
ALTER TABLE `dealer_ticket_docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dealer_transaction`
--
ALTER TABLE `dealer_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `employee_docs`
--
ALTER TABLE `employee_docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employee_notes`
--
ALTER TABLE `employee_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_roles`
--
ALTER TABLE `employee_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee_todo_list`
--
ALTER TABLE `employee_todo_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `interest_rate`
--
ALTER TABLE `interest_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1247;

--
-- AUTO_INCREMENT for table `ticket_category`
--
ALTER TABLE `ticket_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ticket_status`
--
ALTER TABLE `ticket_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`contract_type_id`) REFERENCES `contract_type` (`id`),
  ADD CONSTRAINT `contract_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `contract_ibfk_3` FOREIGN KEY (`dealer_id`) REFERENCES `dealer` (`id`);

--
-- Constraints for table `contract_products`
--
ALTER TABLE `contract_products`
  ADD CONSTRAINT `contract_products_ibfk_1` FOREIGN KEY (`contract_id`) REFERENCES `contract` (`id`);

--
-- Constraints for table `customer_bank`
--
ALTER TABLE `customer_bank`
  ADD CONSTRAINT `customer_bank_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `customer_docs`
--
ALTER TABLE `customer_docs`
  ADD CONSTRAINT `customer_docs_ibfk_1` FOREIGN KEY (`contract_id`) REFERENCES `contract` (`id`),
  ADD CONSTRAINT `customer_docs_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `customer_income`
--
ALTER TABLE `customer_income`
  ADD CONSTRAINT `customer_income_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `customer_notes`
--
ALTER TABLE `customer_notes`
  ADD CONSTRAINT `customer_notes_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `customer_relatives`
--
ALTER TABLE `customer_relatives`
  ADD CONSTRAINT `customer_relatives_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `customer_ticket`
--
ALTER TABLE `customer_ticket`
  ADD CONSTRAINT `customer_ticket_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `customer_ticket_ibfk_3` FOREIGN KEY (`ticket_category_id`) REFERENCES `ticket_category` (`id`),
  ADD CONSTRAINT `customer_ticket_ibfk_4` FOREIGN KEY (`ticket_status_id`) REFERENCES `ticket_status` (`id`);

--
-- Constraints for table `customer_ticket_docs`
--
ALTER TABLE `customer_ticket_docs`
  ADD CONSTRAINT `customer_ticket_docs_ibfk_1` FOREIGN KEY (`customer_ticket_id`) REFERENCES `customer_ticket` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_transaction`
--
ALTER TABLE `customer_transaction`
  ADD CONSTRAINT `customer_transaction_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`);

--
-- Constraints for table `dealer_docs`
--
ALTER TABLE `dealer_docs`
  ADD CONSTRAINT `dealer_docs_ibfk_1` FOREIGN KEY (`dealer_id`) REFERENCES `dealer` (`id`),
  ADD CONSTRAINT `dealer_docs_ibfk_2` FOREIGN KEY (`contract_id`) REFERENCES `contract` (`id`);

--
-- Constraints for table `dealer_invoices`
--
ALTER TABLE `dealer_invoices`
  ADD CONSTRAINT `dealer_invoices_ibfk_1` FOREIGN KEY (`dealer_id`) REFERENCES `dealer` (`id`),
  ADD CONSTRAINT `dealer_invoices_ibfk_2` FOREIGN KEY (`contract_id`) REFERENCES `contract` (`id`);

--
-- Constraints for table `dealer_notes`
--
ALTER TABLE `dealer_notes`
  ADD CONSTRAINT `dealer_notes_ibfk_1` FOREIGN KEY (`dealer_id`) REFERENCES `dealer` (`id`);

--
-- Constraints for table `dealer_ticket`
--
ALTER TABLE `dealer_ticket`
  ADD CONSTRAINT `dealer_ticket_ibfk_1` FOREIGN KEY (`dealer_id`) REFERENCES `dealer` (`id`),
  ADD CONSTRAINT `dealer_ticket_ibfk_2` FOREIGN KEY (`ticket_category_id`) REFERENCES `ticket_category` (`id`),
  ADD CONSTRAINT `dealer_ticket_ibfk_3` FOREIGN KEY (`ticket_status_id`) REFERENCES `ticket_status` (`id`);

--
-- Constraints for table `dealer_ticket_docs`
--
ALTER TABLE `dealer_ticket_docs`
  ADD CONSTRAINT `dealer_ticket_docs_ibfk_1` FOREIGN KEY (`dealer_ticket_id`) REFERENCES `dealer_ticket` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dealer_transaction`
--
ALTER TABLE `dealer_transaction`
  ADD CONSTRAINT `dealer_transaction_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `dealer_invoices` (`id`),
  ADD CONSTRAINT `dealer_transaction_ibfk_2` FOREIGN KEY (`contract_id`) REFERENCES `contract` (`id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `employee_roles` (`id`);

--
-- Constraints for table `employee_docs`
--
ALTER TABLE `employee_docs`
  ADD CONSTRAINT `employee_docs_ibfk_1` FOREIGN KEY (`contract_id`) REFERENCES `contract` (`id`),
  ADD CONSTRAINT `employee_docs_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `employee_notes`
--
ALTER TABLE `employee_notes`
  ADD CONSTRAINT `employee_notes_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `employee_todo_list`
--
ALTER TABLE `employee_todo_list`
  ADD CONSTRAINT `employee_todo_list_ibfk_1` FOREIGN KEY (`assign_by`) REFERENCES `employees` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`contract_id`) REFERENCES `contract` (`id`),
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
