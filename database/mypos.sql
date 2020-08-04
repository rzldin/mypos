-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2020 at 06:46 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mypos`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(50) NOT NULL,
  `app_name` varchar(150) NOT NULL,
  `app_logo` varchar(255) NOT NULL,
  `app_lokasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `gender`, `phone`, `address`, `created`, `updated`) VALUES
(1, 'Budi Suhartono', 'L', '0821132323', 'Jagakarsa, Jaksel', '2020-07-10 23:00:21', '2020-07-10 18:02:25'),
(2, 'Ana', 'P', '0821132323', 'Kebon Jeruk', '2020-07-10 23:00:50', NULL),
(3, 'Rizal', 'L', '0821132323', 'Depok', '2020-07-16 15:37:23', NULL),
(4, 'Yuko Saputri', 'P', '0821342142', 'Kyoto', '2020-07-16 15:37:47', NULL),
(5, 'Alay', 'L', '0821342142', 'Alay', '2020-07-16 15:38:02', NULL),
(6, 'Berbie', 'P', '08212112', 'Jakarta Timur', '2020-07-16 15:38:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_category`
--

CREATE TABLE `p_category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_category`
--

INSERT INTO `p_category` (`category_id`, `name`, `created`, `updated`) VALUES
(2, 'Makanan', '2020-07-10 23:41:35', NULL),
(3, 'Minuman', '2020-07-10 23:41:45', NULL),
(4, 'ATK', '2020-07-12 13:29:18', NULL),
(5, 'Pakaian', '2020-07-12 15:34:56', NULL),
(6, 'Jajanan', '2020-07-13 11:50:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_item`
--

CREATE TABLE `p_item` (
  `item_id` int(11) NOT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(10) NOT NULL DEFAULT 0,
  `gambar` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_item`
--

INSERT INTO `p_item` (`item_id`, `barcode`, `name`, `category_id`, `unit_id`, `price`, `stock`, `gambar`, `created`, `updated`) VALUES
(13, 'A001', 'Baju Batik', 5, 2, 10000, 15, 'Product-200712-5c4dee4425.jpeg', '2020-07-13 00:29:23', '2020-07-12 20:01:27'),
(14, 'J002', 'Sapi Galak', 2, 2, 10000, 30, 'Product-200712-915638c1bc.png', '2020-07-13 00:29:54', NULL),
(15, 'B001', 'Kambing Etawa', 2, 2, 1909090, 20, 'Product-200712-88b1791df9.jpg', '2020-07-13 00:30:19', '2020-07-12 19:59:48'),
(16, 'C001', 'Bakso', 2, 2, 10000, 12, 'default.png', '2020-07-13 01:03:26', '2020-07-12 20:14:46'),
(20, 'A002', 'Haus!', 3, 6, 500000, 17, 'Product-200715-39fb7bd384.png', '2020-07-15 21:44:45', NULL),
(21, 'A003', 'Nyoope', 3, 6, 500000, 0, 'Product-200715-cd99bd8a53.png', '2020-07-15 21:46:04', NULL),
(22, 'A004', 'Durian Musang King', 2, 2, 1000000, 135, 'Product-200715-ed6f4517a5.png', '2020-07-15 21:49:18', NULL),
(23, 'A007', 'Susu Kuda Liar', 3, 6, 250000, 12, 'default.png', '2020-07-16 01:14:08', NULL),
(24, 'A008', 'Permen Kaki', 6, 4, 2000, 49, 'default.png', '2020-07-16 01:14:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_unit`
--

CREATE TABLE `p_unit` (
  `unit_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_unit`
--

INSERT INTO `p_unit` (`unit_id`, `name`, `created`, `updated`) VALUES
(2, 'Kilogram', '2020-07-10 23:42:52', NULL),
(4, 'Buah', '2020-07-13 00:57:31', NULL),
(5, 'Pack', '2020-07-13 00:57:44', NULL),
(6, 'Lusin', '2020-07-13 00:57:53', NULL),
(7, 'Karton', '2020-07-13 11:51:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `address` varchar(100) NOT NULL,
  `desc` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `name`, `phone`, `address`, `desc`, `created`, `updated`) VALUES
(1, 'Toko A', '0821222112', 'pati', 'Toko Sembako', '2020-07-10 15:02:28', NULL),
(2, 'Toko ABC', '089271212', 'Klaten', 'Toko Kelontong', '2020-07-10 15:02:28', '2020-07-10 13:41:32'),
(7, 'Haus!', '0821342142', 'Sawangan, Depok', 'Toko Minuman', '2020-07-15 21:52:07', NULL),
(9, 'Toko Cak Lun', '08921212', 'Semarang', 'Toko Daging', '2020-07-15 21:53:00', NULL),
(10, 'Toko C', '0821132323', 'Kalimanuk', '', '2020-07-16 01:10:59', NULL),
(11, 'James', '1212121', 'Depok', 'Tukang Kopi', '2020-07-16 01:11:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_cart`
--

CREATE TABLE `t_cart` (
  `cart_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `discount_item` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_sale`
--

CREATE TABLE `t_sale` (
  `sale_id` int(11) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `final_price` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `uang_kembalian` int(11) NOT NULL,
  `note` text NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_sale`
--

INSERT INTO `t_sale` (`sale_id`, `invoice`, `customer_id`, `total_price`, `discount`, `final_price`, `cash`, `uang_kembalian`, `note`, `date`, `user_id`, `created`) VALUES
(2, 'MP2007190001', NULL, 20000, 0, 20000, 25000, 5000, 'sam sama', '2020-07-19', 1, '2020-07-19 21:06:14'),
(3, 'MP2007190002', NULL, 20000, 0, 20000, 50000, 30000, 'iya sama sama', '2020-07-19', 1, '2020-07-19 23:13:45'),
(4, 'MP2007190003', NULL, 40000, 2000, 38000, 50000, 12000, 'sampai jumpa', '2020-07-19', 1, '2020-07-19 23:14:50'),
(5, 'MP2007190004', NULL, 40000, 2000, 38000, 50000, 12000, 'sama sama', '2020-07-19', 1, '2020-07-19 23:16:28'),
(6, 'MP2007190005', NULL, 40000, 2000, 38000, 50000, 12000, 'sama sama', '2020-07-19', 1, '2020-07-19 23:17:01'),
(7, 'MP2007190006', NULL, 20000, 5000, 15000, 15000, 0, 'terima kasih', '2020-07-19', 1, '2020-07-19 23:19:19'),
(8, 'MP2007190007', NULL, 120000, 0, 120000, 150000, 30000, 'sdasdas', '2020-07-19', 1, '2020-07-19 23:20:28'),
(9, 'MP2007200001', NULL, 40000, 5000, 35000, 50000, 15000, 'terimakasih', '2020-07-20', 1, '2020-07-20 10:01:07'),
(10, 'MP2007200002', NULL, 40000, 5000, 35000, 50000, 15000, 'terimakasih', '2020-07-20', 1, '2020-07-20 10:01:24'),
(11, 'MP2007200003', NULL, 10000, 500, 9500, 20000, 10500, 'sama sama', '2020-07-20', 1, '2020-07-20 10:02:46'),
(12, 'MP2007200004', NULL, 10000, 500, 9500, 20000, 10500, 'sama sama', '2020-07-20', 1, '2020-07-20 10:03:14'),
(13, 'MP2007200005', NULL, 10000, 500, 9500, 10000, 500, 'sama sama', '2020-07-20', 1, '2020-07-20 10:03:50'),
(14, 'MP2007200006', NULL, 10000, 500, 9500, 10000, 500, 'sama sama', '2020-07-20', 1, '2020-07-20 10:03:56'),
(15, 'MP2007230001', NULL, 10000, 2000, 8000, 12000, 4000, 'okee', '2020-07-23', 1, '2020-07-23 21:30:08'),
(16, 'MP2007230002', NULL, 10000, 2000, 8000, 12000, 4000, 'okee', '2020-07-23', 1, '2020-07-23 21:30:15'),
(17, 'MP2007230003', NULL, 12000, 2500, 9500, 10000, 500, '', '2020-07-23', 1, '2020-07-23 21:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_sale_detail`
--

CREATE TABLE `t_sale_detail` (
  `sale_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `discount_item` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_sale_detail`
--

INSERT INTO `t_sale_detail` (`sale_id`, `item_id`, `price`, `qty`, `discount_item`, `total`) VALUES
(2, 13, 10000, 2, 0, 20000),
(3, 13, 10000, 2, 0, 20000),
(4, 16, 10000, 4, 0, 40000),
(5, 16, 10000, 4, 0, 40000),
(7, 16, 10000, 2, 0, 20000),
(8, 16, 10000, 12, 0, 120000),
(9, 16, 10000, 4, 0, 40000),
(11, 16, 10000, 1, 0, 10000),
(13, 16, 10000, 1, 0, 10000),
(15, 24, 2000, 5, 0, 10000),
(17, 24, 2000, 6, 0, 12000);

-- --------------------------------------------------------

--
-- Table structure for table `t_stock`
--

CREATE TABLE `t_stock` (
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` enum('in','out') NOT NULL,
  `detail` varchar(200) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `qty` int(10) NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_stock`
--

INSERT INTO `t_stock` (`stock_id`, `item_id`, `type`, `detail`, `supplier_id`, `qty`, `date`, `created`, `user_id`) VALUES
(1, 13, 'in', 'Lusinan', 1, 15, '2020-07-15', '2020-07-15 10:59:59', 1),
(3, 16, 'in', 'Sekarung', NULL, 12, '2020-07-15', '2020-07-15 13:11:37', 1),
(4, 15, 'in', 'Sepasang', 1, 23, '2020-07-15', '2020-07-15 13:16:40', 1),
(6, 14, 'in', 'Daging sapi kiloan', 9, 34, '2020-07-15', '2020-07-15 21:53:37', 1),
(10, 20, 'in', '10 Kardus', 7, 23, '2020-07-15', '2020-07-16 00:09:58', 1),
(14, 15, 'out', 'hilang', NULL, 3, '2020-07-15', '2020-07-16 00:50:27', 1),
(15, 14, 'out', 'hilang', NULL, 4, '2020-07-15', '2020-07-16 00:50:55', 1),
(16, 22, 'in', '1 Kontainer', 2, 100, '2020-07-15', '2020-07-16 00:53:09', 1),
(17, 22, 'out', 'Rusak', NULL, 25, '2020-07-15', '2020-07-16 00:53:44', 1),
(19, 22, 'in', 'Borongan', NULL, 60, '2020-07-15', '2020-07-16 00:58:26', 1),
(20, 24, 'in', 'Permen', 1, 20, '2020-07-20', '2020-07-20 11:00:24', 2),
(21, 24, 'in', 'Sekarung', NULL, 15, '2020-07-20', '2020-07-20 11:48:44', 2),
(22, 24, 'in', 'Borongan', 1, 12, '2020-07-20', '2020-07-20 14:27:23', 2),
(23, 24, 'in', '', 1, 2, '2020-07-20', '2020-07-20 14:37:31', 2),
(24, 23, 'in', '10 Kardus', NULL, 12, '2020-07-20', '2020-07-20 14:38:36', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `level` int(1) NOT NULL COMMENT '1:admin,2:kasir'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `address`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Rizal Aldin', 'Depok', 1),
(2, 'kasir1', '7b52009b64fd0a2a49e6d8a939753077792b0554', 'James', 'Solo, Jawa Tengah', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `p_category`
--
ALTER TABLE `p_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `p_item`
--
ALTER TABLE `p_item`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `p_unit`
--
ALTER TABLE `p_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `t_cart`
--
ALTER TABLE `t_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `t_sale`
--
ALTER TABLE `t_sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `t_sale_detail`
--
ALTER TABLE `t_sale_detail`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `t_stock`
--
ALTER TABLE `t_stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `p_category`
--
ALTER TABLE `p_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `p_item`
--
ALTER TABLE `p_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `p_unit`
--
ALTER TABLE `p_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `t_sale`
--
ALTER TABLE `t_sale`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `t_stock`
--
ALTER TABLE `t_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `p_item`
--
ALTER TABLE `p_item`
  ADD CONSTRAINT `p_item_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `p_category` (`category_id`),
  ADD CONSTRAINT `p_item_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `p_unit` (`unit_id`);

--
-- Constraints for table `t_cart`
--
ALTER TABLE `t_cart`
  ADD CONSTRAINT `t_cart_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_sale_detail`
--
ALTER TABLE `t_sale_detail`
  ADD CONSTRAINT `t_sale_detail_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `t_sale` (`sale_id`);

--
-- Constraints for table `t_stock`
--
ALTER TABLE `t_stock`
  ADD CONSTRAINT `t_stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_stock_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`),
  ADD CONSTRAINT `t_stock_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
