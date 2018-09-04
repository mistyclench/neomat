-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2017 at 09:21 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `employee_no` varchar(15) DEFAULT NULL,
  `employee_name` varchar(50) NOT NULL,
  `employee_phone` varchar(15) DEFAULT NULL,
  `employee_address` varchar(100) DEFAULT NULL,
  `employee_national_id` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `is_admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `employee_no`, `employee_name`, `employee_phone`, `employee_address`, `employee_national_id`, `password`, `is_admin`) VALUES
(1, '1', 'admin', '01234567891', 'Dhaka', '12344311324', '12345678', 1),
(2, NULL, 'mike', '13245678', 'Rajshahi', '1234', '12345678', 0),
(3, NULL, 'Hasan', '0123123123', 'hasan@b.com', '132413241324', '12345678', 2),
(4, NULL, 'michael', '123123123', 'Gulshan', '123123123', '12345678', 3),
(5, NULL, 'Arif', '123123123', 'Johurabad', '123123123', '123123123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Foot Wear'),
(3, 'Furnitures'),
(4, 'Electronics'),
(5, 'Dressing');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_logo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_logo`) VALUES
(1, 'Shalom chemists', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_contact` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_contact`) VALUES
(7, 'Anik', '1234'),
(8, 'Fuad', '12345678'),
(9, 'Hemel', '1324442342'),
(10, 'Rafiq', '01234567');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_id` int(11) NOT NULL,
  `selling_date` datetime NOT NULL,
  `customer_id` int(11) NOT NULL,
  `employee_no` varchar(15) DEFAULT NULL,
  `amount` double(20,2) NOT NULL,
  `discount` double(20,2) NOT NULL,
  `vat` double(20,2) NOT NULL,
  `cash_given` double(20,2) NOT NULL,
  `cash_back` double(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `selling_date`, `customer_id`, `employee_no`, `amount`, `discount`, `vat`, `cash_given`, `cash_back`) VALUES
(8, '2014-08-05 22:05:55', 7, '1', 800.00, 0.00, 0.00, 1600.00, 0.00),
(9, '2014-08-05 22:08:34', 8, '1', 200.00, 0.00, 0.00, 200.00, 0.00),
(10, '2014-08-05 23:25:27', 7, '1', 20.00, 0.00, 0.00, 20.00, 0.00),
(11, '2014-08-06 15:24:02', 7, '1', 844.00, 0.00, 0.00, 844.00, 0.00),
(12, '2014-08-08 01:34:34', 9, '1', 50.00, 0.00, 0.00, 50.00, 0.00),
(13, '2014-08-09 02:58:45', 7, '1', 1500.00, 0.00, 0.00, 1500.00, 0.00),
(14, '2014-08-09 03:06:00', 10, '1', 3800.00, 0.00, 0.00, 3800.00, 0.00),
(15, '2014-08-11 04:08:14', 7, '1', 1590.00, 5.00, 1.50, 1600.00, 67.00),
(16, '2014-08-12 00:14:29', 7, '1', 1500.00, 10.00, 15.00, 2000.00, 447.00),
(18, '2014-08-13 00:42:35', 7, '1', 80.00, 5.00, 1.50, 100.00, 22.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `products_pk` int(11) NOT NULL,
  `product_id` varchar(15) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_type` int(11) NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_size` varchar(15) DEFAULT NULL,
  `product_price` double(20,2) NOT NULL,
  `buying_price` double(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`products_pk`, `product_id`, `product_name`, `product_type`, `product_category`, `product_size`, `product_price`, `buying_price`) VALUES
(3, '1', 'Bata', 3, 1, '11', 800.00, 700.00),
(4, 'E1', 'Buzzer', 0, 4, '', 10.00, 5.00),
(5, 'E2', 'LED', 0, 0, '', 2.00, 0.30),
(6, 'E3', 'Red LED', 0, 4, '', 2.00, 0.30),
(7, 'P1', 'Panjabi', 5, 5, '41', 1500.00, 500.00);

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `return_id` int(11) NOT NULL,
  `return_date` datetime NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product_id` varchar(15) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` double(20,2) NOT NULL,
  `refund_invoice_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returns`
--

INSERT INTO `returns` (`return_id`, `return_date`, `invoice_id`, `product_id`, `quantity`, `amount`, `refund_invoice_id`) VALUES
(1, '2014-08-12 21:44:46', 9, 'E2', 10, 20.00, 18);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product_id` varchar(15) NOT NULL,
  `quantity` int(11) NOT NULL,
  `return_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `invoice_id`, `product_id`, `quantity`, `return_quantity`) VALUES
(13, 8, '1', 2, 0),
(14, 9, 'E1', 10, 0),
(15, 9, 'E2', 50, 10),
(16, 10, 'E2', 10, 0),
(17, 11, '1', 1, 0),
(18, 11, 'E3', 2, 0),
(19, 11, 'E2', 20, 0),
(20, 12, 'E1', 5, 0),
(21, 13, 'P1', 1, 0),
(22, 14, '1', 1, 0),
(23, 14, 'P1', 2, 0),
(24, 15, 'P1', 1, 0),
(25, 15, 'E1', 5, 0),
(26, 15, 'E2', 20, 0),
(27, 16, 'P1', 1, 0),
(29, 18, 'E2', 50, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `stocks_pk` int(11) NOT NULL,
  `stock_id` varchar(15) NOT NULL,
  `product_id` varchar(15) NOT NULL,
  `import_quantity` int(11) NOT NULL,
  `current_quantity` int(11) NOT NULL,
  `import_date` datetime NOT NULL,
  `is_deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`stocks_pk`, `stock_id`, `product_id`, `import_quantity`, `current_quantity`, `import_date`, `is_deleted`) VALUES
(3, '1', '1', 10, 6, '2014-08-04 14:50:40', 0),
(4, '1', 'E1', 100, 80, '2014-08-04 14:53:09', 0),
(5, '1', 'E2', 1000, 860, '2014-08-04 14:54:03', 0),
(6, '1', 'E3', 10, 8, '2014-08-04 15:01:11', 0),
(7, '2', 'P1', 20, 15, '2014-08-07 01:19:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`type_id`, `type_name`, `category_id`) VALUES
(2, 'Table 4 Legged', 3),
(3, 'Sandal', 1),
(4, 'Boot', 1),
(5, 'Men upper', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_pk`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`return_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`stocks_pk`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `products_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `stocks_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
