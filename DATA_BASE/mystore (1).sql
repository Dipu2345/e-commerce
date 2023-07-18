-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2023 at 08:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Debashis12', 'debashispandadipu@gmail.com', '1234'),
(2, 'pramod', 'ram@gmail.com', '111'),
(3, 'deabashis', 'debashis@gmail.com', '$2y$10$qsx6m1rE.4p.tPFDv8i7yenCR.26vzZ8Zm5wdDGcIwuex6lICpai6');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'TITAN'),
(2, 'TIMEX'),
(3, 'FOSSIL'),
(4, 'EmperioArmani'),
(5, 'BOAT'),
(6, 'NOISE'),
(7, 'FASTRACK');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'MEN'),
(2, 'WOMEN'),
(3, 'SMART WATCH'),
(4, 'ANALOG WATCH'),
(5, 'ROUND DIAL'),
(6, 'SQUARE DIAL');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Name` varchar(100) NOT NULL,
  `mob-no` int(12) NOT NULL,
  `e-mail` varchar(100) NOT NULL,
  `sub` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Name`, `mob-no`, `e-mail`, `sub`, `description`) VALUES
('', 0, ' ', ' ', ' '),
('', 0, ' ', ' ', ' '),
('', 0, ' ', ' ', ' '),
('', 0, ' ', ' ', ' '),
('', 0, ' ', ' ', ' '),
('', 0, ' ', ' ', ' '),
('Srikanta panda', 2147483647, ' debashispandadipu@gmail.com', ' wdw', ' wwewdwd'),
('rohit kumar', 2147483647, ' rakesh@gmail.com', ' tuo', ' given');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 1, 859883088, 2, 1, 'pending'),
(2, 1, 34440273, 8, 1, 'pending'),
(3, 1, 1242113897, 8, 1, 'pending'),
(4, 1, 978265678, 2, 1, 'pending'),
(5, 1, 1554624677, 8, 1, 'pending'),
(6, 1, 1865186705, 2, 1, 'pending'),
(7, 1, 1221861724, 8, 1, 'pending'),
(8, 1, 1075223776, 4, 1, 'pending'),
(9, 1, 866021398, 2, 2, 'pending'),
(10, 1, 2011136978, 3, 1, 'pending'),
(11, 1, 938200946, 8, 1, 'pending'),
(12, 1, 1457937964, 6, 1, 'pending'),
(13, 1, 1942268132, 3, 2, 'pending'),
(14, 1, 1862955391, 12, 1, 'pending'),
(15, 1, 1514932759, 3, 1, 'pending'),
(16, 1, 1710208741, 3, 1, 'pending'),
(17, 1, 1341235664, 4, 1, 'pending'),
(18, 1, 451154862, 3, 1, 'pending'),
(19, 1, 1250206034, 12, 1, 'pending'),
(20, 1, 923036130, 12, 2, 'pending'),
(21, 1, 1341768255, 4, 1, 'pending'),
(22, 1, 2045935651, 2, 1, 'pending'),
(23, 1, 49138752, 10, 2, 'pending'),
(24, 1, 542077712, 4, 2, 'pending'),
(25, 1, 1810146398, 6, 1, 'pending'),
(26, 1, 393883164, 9, 5, 'pending'),
(27, 1, 69117054, 2, 2, 'pending'),
(28, 1, 220457262, 11, 1, 'pending'),
(29, 1, 1664194383, 9, 2, 'pending'),
(30, 1, 1495593621, 2, 1, 'pending'),
(31, 1, 254759860, 6, 2, 'pending'),
(32, 1, 1837538714, 3, 1, 'pending'),
(33, 1, 817682010, 3, 6, 'pending'),
(34, 1, 216408662, 11, 1, 'pending'),
(35, 1, 728641735, 3, 2, 'pending'),
(36, 1, 1533174097, 3, 1, 'pending'),
(37, 1, 1839583312, 3, 1, 'pending'),
(38, 1, 1200670382, 3, 1, 'pending'),
(39, 1, 1537758246, 3, 1, 'pending'),
(40, 1, 1740397290, 2, 2, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(2, 'Titan Evoke', '1.43\" AMOLED Display 1000 Nits Brightness', 'wrist watch men watch watch', 1, 1, 'titan5.webp', 'titan4.webp', 'titan6.webp', '9999', '2023-05-28 15:35:34', 'true'),
(3, 'Titan Snob X Blue Dial', 'Stainless Steel Strap Watch for Girls', 'wrist watch girl watch ', 0, 0, 'titan7.webp', 'titan8.webp', 'titan9.webp', '6999', '2023-06-09 07:39:08', 'true'),
(4, 'Dazel RAZA', 'Dazel Raza from TITAN  IP68 Water Resistance Free Home Trial', 'women watch,watch,female watch,girl watch', 2, 1, 'dazel from raja titan watch img 1.webp', 'dazel from raja titan watch img 2.webp', 'dazel from raja titan watch img 4.webp', '5699', '2023-05-29 07:20:17', 'true'),
(6, 'FASTRACK REFLEX POWER', '1.96\" SUPER AMOLED ARCHED DISPLAY|SINGLESYNC BT CALLING', 'fastrack watch,wrist watch,watch,men watch,', 6, 7, 'Fastrack Reflex Power1.96 img 2.webp', 'Fastrack Reflex Power 1.96 img 1.webp', 'Fastrack Reflex Power1.96 img 4.webp', '4995', '2023-05-29 07:29:49', 'true'),
(8, 'FOSSIL Airlift', 'Airlift Multifunction Olive Green Leather Watch', 'wrist watch,fossil watch,men watches,watch', 1, 3, 'fossil1.jpeg', 'fossil2.jpeg', 'fossil3.jpeg', '8099', '2023-05-29 15:38:20', 'true'),
(9, 'TIMEX x GUJARAT TITANS', 'MEN ANALOG WHITE DIAL COLOURED QUARTZ WATCH, ROUND DIAL WITH 39 MM CASE WIDTH ', 'timex watch,wrist watch,watch,analog watch', 1, 2, 'timex_gujurat_titans.jpg', 'titan_gujurat_1450_1.jpg', 'timex_gujurat_titans2.jpg', '1450', '2023-07-03 12:35:48', 'true'),
(10, 'TIMEX MEN SMART FIT 2.0', ' BLUETOOTH CALLING, FULL TOUCH, ACTIVITY TRACKING, HRM, SPO2, BLOOD PRESSURE, MULTIPLE WATCH FACES', 'timex smart watch,men timex smart watch,smart watch,watch,wrist watch', 1, 2, 'timex_men_smartfit.jpg', 'timex_men_smartfit1.jpg', 'timex_men_smartfit3150.jpg', '3150', '2023-07-03 12:43:12', 'true'),
(11, 'EMPORIO ARMANI', 'Chronograph Black Silicone Watch', 'emperio armani ,armani watch,wrist watch', 1, 4, 'e_armani.webp', 'e_armni.webp', 'e_armani24000.webp', '19000', '2023-07-03 12:50:29', 'true'),
(12, 'Titan Smart', 'Touch Screen Watch with Blue Strap, Built-in-Alexa,Health tracker, & Water Resistant', 'titan smart,titan watch,titan round dial,titan watch,wrist watch', 5, 1, 'titan_smart.webp', 'titan_smart1.webp', 'titan_smart5770.webp', '5770', '2023-07-03 12:55:28', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(25, 1, 11398, 542077712, 1, '2023-07-06 21:48:07', 'complete'),
(26, 1, 4995, 1810146398, 1, '2023-07-07 07:05:42', 'complete'),
(28, 1, 19998, 69117054, 1, '2023-07-07 07:09:05', 'complete'),
(29, 1, 19000, 220457262, 1, '2023-07-07 07:20:01', 'complete'),
(30, 1, 2900, 1664194383, 1, '2023-07-07 07:28:50', 'complete'),
(31, 1, 9999, 1495593621, 1, '2023-07-07 07:36:55', 'complete'),
(32, 1, 9990, 254759860, 1, '2023-07-07 07:53:52', 'complete'),
(33, 1, 6999, 1837538714, 1, '2023-07-07 08:06:57', 'complete'),
(34, 1, 41994, 817682010, 1, '2023-07-07 08:11:55', 'complete'),
(35, 1, 19000, 216408662, 1, '2023-07-07 08:27:50', 'complete'),
(36, 1, 13998, 728641735, 1, '2023-07-07 08:29:45', 'complete'),
(37, 1, 6999, 1533174097, 1, '2023-07-07 08:34:07', 'complete'),
(38, 1, 6999, 1839583312, 1, '2023-07-07 08:36:36', 'complete'),
(39, 1, 6999, 1200670382, 1, '2023-07-07 08:46:18', 'complete'),
(40, 1, 6999, 1537758246, 1, '2023-07-07 09:13:57', 'complete'),
(41, 1, 19998, 1740397290, 1, '2023-07-07 09:15:03', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(15, 10, 2011136978, 6999, 'Netbanking', '2023-07-03 05:30:33'),
(16, 11, 938200946, 8099, 'Cash on Delivery', '2023-07-04 07:03:14'),
(17, 13, 1942268132, 13998, 'pay with razorpay', '2023-07-05 19:21:39'),
(18, 19, 451154862, 6999, 'Cash On Delivery', '2023-07-05 21:12:40'),
(19, 37, 1533174097, 6999, 'RAZORPAY', '2023-07-07 08:34:07'),
(20, 37, 1533174097, 6999, 'RAZORPAY', '2023-07-07 08:34:14'),
(21, 38, 1839583312, 6999, 'RAZORPAY', '2023-07-07 08:36:36'),
(22, 38, 1839583312, 6999, 'RAZORPAY', '2023-07-07 08:40:46'),
(23, 39, 1200670382, 6999, 'RAZORPAY', '2023-07-07 08:46:18'),
(24, 39, 1200670382, 6999, 'RAZORPAY', '2023-07-07 08:46:20'),
(25, 40, 1537758246, 6999, 'RAZORPAY', '2023-07-07 09:13:57'),
(26, 41, 1740397290, 19998, 'RAZORPAY', '2023-07-07 09:15:03'),
(27, 41, 1740397290, 19998, 'RAZORPAY', '2023-07-07 09:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(155) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(1, 'debashis', 'debashispandadipu@gmail.com', '$2y$10$dcuMxYuoHiRJKMTB7vi0ee8Jshg3c/LHUg3Rla7YR2lRMHSn0vQaS', 'myimg.jpg', '::1', 'At-sampoi. Po-kulana', '7751898809'),
(2, 'panda', 'panda@gmail.com', '$2y$10$nKvYCTkGyNClVANdP7DzS.Xj9cbFuT7i/qSorIw5PFC4z.irVQjye', 'dazel from raja titan watch img 2.webp', '::1', 'At-sampoi. Po-kulana', '7751898809');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
