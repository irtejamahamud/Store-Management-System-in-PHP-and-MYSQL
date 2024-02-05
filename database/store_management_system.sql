-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2024 at 06:11 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL,
  `category_entrydate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_entrydate`) VALUES
(1, 'Laptop', '2023-03-08'),
(2, 'Mobile', '2023-03-07'),
(3, 'Monitor', '2023-03-07'),
(4, 'Tablet', '2023-03-08'),
(5, 'RAM', '2023-05-16'),
(6, 'Memory', '2023-10-23'),
(7, 'Desktop', '2024-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `customer_address` varchar(50) NOT NULL,
  `customer_DOB` varchar(10) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_address`, `customer_DOB`, `customer_email`, `customer_password`) VALUES
(1, 'Abdul Karim', 'Gazipur', '1999-07-14', 'abdulkarim@gmail.com', '4082a3f4262d8ee6407b8469c0ad2e7d'),
(2, 'Irteja Mahmud', 'Ghulshan-2', '2001-12-17', 'irteja@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'Ashik Hasan', 'Dinajpur', '1999-07-19', 'ashik@gmail.com', '202a22e7e45c151d50ff47045c6f8e5e'),
(4, 'Pankaj Mahanta', 'Savar', '2002-07-16', 'pan123@gmail.com', 'c6d1a1da97cafeb2a0c42b0a7e8f204d'),
(7, 'Nazmul Hasan', 'Kanchan', '2001-08-14', 'nazmul@gmail.com', '9f06ec202e8e76d47c640e8f40c70628'),
(8, 'Abid Hasan', 'Jatrabari', '2001-08-14', 'abid@gmail.com', '7b47ec1a52f0704f4437070e077ae105'),
(9, 'Tanjim Mahtab', 'Kanchan', '2001-08-14', 'tanjim@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(10, 'Rabby Khan', 'Uttora', '2001-02-06', 'rabby@gmail.com', 'bf73402246c80a9e7cf6b9ec8c78b633');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_product_id` int(11) NOT NULL,
  `order_product_qty` int(11) NOT NULL,
  `order_product_price` float(9,2) NOT NULL,
  `order_customer_id` int(11) NOT NULL,
  `order_product_entrydate` varchar(10) NOT NULL,
  `order_status` varchar(12) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_product_id`, `order_product_qty`, `order_product_price`, `order_customer_id`, `order_product_entrydate`, `order_status`) VALUES
(1, 2, 6, 16380.00, 2, '2023-12-21', 'approved'),
(2, 2, 5, 16380.00, 3, '2023-12-21', 'approved'),
(3, 5, 3, 17325.00, 2, '2023-12-21', 'approved'),
(4, 2, 10, 16380.00, 2, '2023-12-21', 'approved'),
(6, 1, 20, 36750.00, 4, '2023-12-22', 'approved'),
(7, 1, 50, 36750.00, 5, '2023-12-23', 'approved'),
(8, 4, 5, 33600.00, 6, '2023-12-22', 'rejected'),
(9, 5, 2, 17325.00, 6, '2023-12-23', 'rejected'),
(10, 1, 5, 36750.00, 2, '2023-12-23', 'approved'),
(11, 6, 4, 2100.00, 2, '2023-12-23', 'approved'),
(12, 5, 35, 17325.00, 2, '2023-12-25', 'rejected'),
(13, 2, 3, 16380.00, 2, '2023-12-11', 'approved'),
(14, 7, 10, 15750.00, 2, '2024-01-02', 'approved'),
(15, 1, 5, 36750.00, 2, '2024-01-02', 'pending'),
(16, 6, 3, 2100.00, 1, '2024-01-02', 'pending'),
(17, 8, 2, 72450.00, 4, '2024-01-02', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_category` int(3) NOT NULL,
  `product_code` varchar(10) NOT NULL,
  `product_entrydate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_category`, `product_code`, `product_entrydate`) VALUES
(1, 'Hp 840 g1', 1, 'hp0001', '2023-05-23'),
(2, 'Infinix Hot 11S', 2, 'infinix001', '2023-05-23'),
(3, 'Hp 840 g5', 1, 'hp0002', '2023-05-30'),
(4, 'Oppo A1', 2, 'opp001', '2023-06-07'),
(5, 'SAMSUNG C24F390FHW', 3, 'sm0001', '2023-06-07'),
(6, 'SSD', 6, 'ssd123', '2023-10-23'),
(7, 'Realme Narzo 50', 2, 'realme', '2024-01-02'),
(8, 'Hp Probook x360 440 g1', 1, 'Hp Probook', '2024-01-02'),
(9, 'HP P204v 19.5 Inch HD LED', 3, 'monitor12', '2024-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `store_product`
--

CREATE TABLE `store_product` (
  `store_product_id` int(11) NOT NULL,
  `store_product_name` int(10) NOT NULL,
  `store_product_qty` int(11) NOT NULL,
  `store_product_entrydate` varchar(10) NOT NULL,
  `store_product_price` float(9,2) NOT NULL,
  `available_qty` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store_product`
--

INSERT INTO `store_product` (`store_product_id`, `store_product_name`, `store_product_qty`, `store_product_entrydate`, `store_product_price`, `available_qty`) VALUES
(1, 2, 110, '2023-05-17', 15600.00, 86),
(2, 1, 5, '2023-05-23', 25000.00, 5),
(3, 3, 10, '2023-05-30', 35000.00, 10),
(4, 1, 200, '2023-05-30', 35000.00, 120),
(5, 4, 20, '2023-06-07', 32000.00, 20),
(6, 5, 20, '2023-06-07', 16500.00, 17),
(7, 6, 20, '2023-10-23', 2000.00, 7),
(8, 7, 30, '2024-01-02', 15000.00, 20),
(9, 2, 30, '2024-01-02', 16500.00, 30),
(10, 8, 15, '2024-01-02', 69000.00, 13),
(11, 1, 30, '2024-01-02', 10200.00, 30);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_first_name` varchar(20) DEFAULT NULL,
  `user_last_name` varchar(20) DEFAULT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first_name`, `user_last_name`, `user_email`, `user_password`) VALUES
(1, 'Irteja', 'Mahmud', 'irtejamahamud9@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'Pankaj', 'Mahanta', 'pan123@gmail.com', 'b4e367e5f88d3f5fd76efb967257411b'),
(5, 'tanjim', 'mahtab', 'tanjim@gmail.com', '85bb34f7197f2a441d0d619862c57ae3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `store_product`
--
ALTER TABLE `store_product`
  ADD PRIMARY KEY (`store_product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`,`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `store_product`
--
ALTER TABLE `store_product`
  MODIFY `store_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
