-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2025 at 01:07 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `financial_dues`
--

-- --------------------------------------------------------

--
-- Table structure for table `report_dates`
--

CREATE TABLE `report_dates` (
  `id` bigint(20) NOT NULL,
  `report_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report_dates`
--

INSERT INTO `report_dates` (`id`, `report_date`) VALUES
(1, '2024-09-18');

-- --------------------------------------------------------

--
-- Table structure for table `totals`
--

CREATE TABLE `totals` (
  `id` bigint(20) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `total_item` decimal(10,2) DEFAULT 0.00,
  `b_total_item` decimal(10,2) DEFAULT 0.00,
  `c_total_item` decimal(10,2) DEFAULT 0.00,
  `d_total_item` decimal(10,2) DEFAULT 0.00,
  `e_total_item` decimal(10,2) DEFAULT 0.00,
  `f_total_item` decimal(10,2) DEFAULT 0.00,
  `g_total_item` decimal(10,2) DEFAULT 0.00,
  `h_total_item` decimal(10,2) DEFAULT 0.00,
  `i_total_item` decimal(10,2) DEFAULT 0.00,
  `result_item` decimal(10,2) DEFAULT 0.00,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `totals`
--

INSERT INTO `totals` (`id`, `item_name`, `total_item`, `b_total_item`, `c_total_item`, `d_total_item`, `e_total_item`, `f_total_item`, `g_total_item`, `h_total_item`, `i_total_item`, `result_item`, `description`) VALUES
(1, 'Item 1', '12.71', '0.00', '15.30', '0.00', '76.28', '15.95', '0.00', '0.00', '0.00', '0.00', 'مستخلصات { بند إستثمار }'),
(2, 'Item 2', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'فروق أسعار { بند إستثمار }'),
(3, 'Item 3', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'مستخلصات { بند صيانة }'),
(4, 'Item 4', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'فروق أسعار { بند صيانة }'),
(5, 'Item 5', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'مستخلصات { بند دأنين }'),
(6, 'Item 6', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'فروق أسعار { بند دأنين }'),
(7, 'Item 7', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'مستخلصات حياة كريمة'),
(8, 'Item 8', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'فروق أسعار { مستخلصات حياة كريمة }'),
(9, 'Item 9', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'جاري مستحقات 2023 { استثمار }'),
(10, 'Item 10', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'أعوام سابقة { صيانة }'),
(11, 'Item 11', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'تعويضات تم اعتمادها من مجلس الوزراء { استثمار }'),
(12, 'Item 12', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'تعويضات تم اعتمادها من مجلس الوزراء { صيانة }'),
(13, 'Item 13', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'فروق أسعار مواد حجرية');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `report_dates`
--
ALTER TABLE `report_dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `totals`
--
ALTER TABLE `totals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `report_dates`
--
ALTER TABLE `report_dates`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `totals`
--
ALTER TABLE `totals`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
