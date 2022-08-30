-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2021 at 01:00 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electronics`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `about_id` int(10) NOT NULL,
  `about_heading` text NOT NULL,
  `about_short_desc` text NOT NULL,
  `about_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`about_id`, `about_heading`, `about_short_desc`, `about_desc`) VALUES
(1, 'About Us', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. </p><p>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_country` text NOT NULL,
  `admin_job` varchar(255) NOT NULL,
  `admin_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_country`, `admin_job`, `admin_about`) VALUES
(1, 'LomkileNtetha', 'admin@gmail.com', 'admin123', '71XfvEPFvvS._AC_SL1500_.jpg', '50899604', 'Lesotho', 'sales Administartor', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(2, 'admin', 'electronics@admin.com', '12345', '51CZuPt2xDL._AC_SL1000_.jpg', '1234567890', 'Lesotho', 'support adminstrator', 'My admin');

-- --------------------------------------------------------

--
-- Table structure for table `boxes_section`
--

CREATE TABLE `boxes_section` (
  `box_id` int(10) NOT NULL,
  `box_title` varchar(100) NOT NULL,
  `box_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boxes_section`
--

INSERT INTO `boxes_section` (`box_id`, `box_title`, `box_desc`) VALUES
(1, 'WE LOVE OUR CUSTOMERS', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.'),
(2, 'BEST PRICES', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.'),
(3, '100% SATISFICTION & GUARENTED', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.');

-- --------------------------------------------------------

--
-- Table structure for table `bundle_product_relation`
--

CREATE TABLE `bundle_product_relation` (
  `rel_id` int(10) NOT NULL,
  `rel_title` varchar(255) NOT NULL,
  `product_id` int(10) NOT NULL,
  `bundle_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bundle_product_relation`
--

INSERT INTO `bundle_product_relation` (`rel_id`, `rel_title`, `product_id`, `bundle_id`) VALUES
(1, 'Relation 1', 1, 15),
(2, 'Relation 2', 2, 15),
(3, 'Relation 3', 4, 15),
(4, 'Relation 4', 10, 15),
(5, 'Test Relation', 2, 1),
(6, 'Test Relation 2', 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`, `product_price`, `size`) VALUES
(31, '127.0.0.1', 2, '300', 'small'),
(32, '127.0.0.1', 1, '350', 'small'),
(28, '127.0.0.1', 8, '400', 'small'),
(35, '::1', 2, '150', '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` varchar(100) NOT NULL,
  `cat_top` varchar(100) NOT NULL,
  `cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_top`, `cat_image`) VALUES
(7, 'Smartphone', 'Yes', '31+rHqWgOrL._AC_.jpg'),
(8, 'Laptops', 'Yes', '714+yuXQFmS._AC_SL1500_.jpg'),
(9, 'Desktop', 'Yes', '71tc+dV74aL._AC_SL1500_.jpg'),
(10, 'SmartWatches', 'Yes', '51i6UseuG1L._AC_SL1000_.jpg'),
(11, 'Speaker', 'Yes', ''),
(12, 'Headset', 'Yes', '51bRSWrEc7S._AC_SL1500_.jpg'),
(13, 'Accessories', 'Yes', '61ldiaa7rwL._AC_SL1500_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(10) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `contact_heading` text NOT NULL,
  `contact_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `contact_email`, `contact_heading`, `contact_desc`) VALUES
(1, 'devtech@gmail.com', 'Contact Us ', 'If you have any questions, please feel free to <a href=\"http://localhost/ecommerce/contact.php\" target=\"_blank\">contact us</a>. Our customer service is working for you 24/7');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `coupon_title` varchar(255) NOT NULL,
  `coupon_price` varchar(255) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_limit` int(10) NOT NULL,
  `coupon_used` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `product_id`, `coupon_title`, `coupon_price`, `coupon_code`, `coupon_limit`, `coupon_used`) VALUES
(5, 26, 'hhh', '22', '666', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` varchar(100) NOT NULL,
  `customer_city` varchar(100) NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_confirm_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`, `customer_confirm_code`) VALUES
(14, 'Lomkile Ntetha', 'ecom@gmail.com', '1111', 'Lesotho', 'feffe', '1234567', 'qqqee', '51bRSWrEc7S._AC_SL1500_.jpg', '::1', '1814464607'),
(15, 'Mr Ngatane', 'tumisangngatane@gmail.com', 'Tumi@94', 'Lesotho', 'maseru', '50841602', 'Tsenola', '51biqZP8+2L._AC_SX679_.jpg', '::1', '1561069124'),
(16, 'Lomkile Ntetha', 'admin@gmail.com', 'Test@123', '', 'feffe', '1234567', 'qqqee', '51kyjYuOZhL._AC_SX679_.jpg', '::1', '1107352865');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` varchar(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(1, 5, 68, 679423457, 2, 'medium', '2018-10-07 18:25:38', 'Complete'),
(2, 5, 12, 679423457, 1, 'large', '2018-10-07 14:24:28', 'pending'),
(3, 4, 24, 72826274, 2, 'medium', '2018-10-23 07:00:46', 'pending'),
(4, 4, 240, 72826274, 2, 'small', '2018-10-23 07:00:47', 'pending'),
(5, 4, 100, 72826274, 1, 'medium', '2018-10-23 07:00:47', 'pending'),
(6, 4, 50, 72826274, 1, 'medium', '2018-10-23 07:00:47', 'pending'),
(7, 4, 75, 72826274, 1, 'small', '2018-10-23 07:00:48', 'pending'),
(8, 4, 70, 1039424096, 1, 'large', '2018-10-23 14:23:36', 'pending'),
(9, 4, 90, 1178884563, 1, 'small', '2018-10-25 17:09:31', 'Complete'),
(10, 4, 10, 795767235, 1, 'medium', '2018-10-25 17:16:08', 'Complete'),
(11, 4, 34, 795767235, 1, 'large', '2018-10-25 17:16:08', 'Complete'),
(12, 13, 80, 2127736964, 2, 'medium', '2021-11-15 02:50:25', 'Complete'),
(13, 13, 1200, 2127736964, 3, 'small', '2021-10-29 02:57:07', 'pending'),
(14, 13, 600, 2127736964, 2, 'medium', '2021-10-29 03:13:13', 'Complete'),
(15, 13, 4000, 2127736964, 1, 'small', '2021-10-29 02:57:08', 'pending'),
(16, 13, 5000, 2127736964, 1, 'medium', '2021-10-29 02:57:08', 'pending'),
(17, 13, 2500, 2127736964, 1, 'large', '2021-10-29 02:57:08', 'pending'),
(18, 13, 400, 1602936763, 1, 'small', '2021-10-29 05:13:33', 'pending'),
(19, 13, 2497, 1602936763, 1, 'small', '2021-10-29 05:13:33', 'pending'),
(20, 13, 4000, 1711953748, 1, 'small', '2021-10-30 23:00:38', 'pending'),
(21, 13, 14000, 1711953748, 2, 'small', '2021-10-30 23:00:38', 'pending'),
(22, 13, 2497, 1711953748, 1, 'small', '2021-10-30 23:00:38', 'pending'),
(23, 13, 2497, 2073587211, 1, 'medium', '2021-10-31 10:30:49', 'pending'),
(24, 13, 800, 2073587211, 2, 'small', '2021-10-31 10:30:50', 'pending'),
(25, 15, 400, 11911087, 1, 'small', '2021-10-31 11:44:50', 'Complete'),
(26, 13, 400, 1573951160, 1, 'small', '2021-11-27 09:34:27', 'pending'),
(27, 13, 5000, 1573951160, 1, 'small', '2021-11-27 09:34:28', 'pending'),
(28, 13, 5000, 1573951160, 2, 'small', '2021-11-27 09:34:28', 'pending'),
(29, 13, 800, 1573951160, 2, 'small', '2021-11-27 09:34:28', 'pending'),
(30, 13, 360, 1573951160, 2, 'small', '2021-11-27 09:34:28', 'pending'),
(31, 13, 300, 1623200192, 1, 'small', '2021-11-27 11:42:54', 'pending'),
(32, 13, 400, 1227778727, 1, 'small', '2021-11-27 11:55:40', 'pending'),
(33, 13, 4994, 366260723, 2, 'small', '2021-11-27 12:08:38', 'pending'),
(34, 13, 57431, 1341472997, 23, 'small', '2021-11-27 12:16:08', 'pending'),
(35, 13, 7491, 1862162622, 3, 'small', '2021-11-27 12:22:57', 'pending'),
(36, 13, 29964, 360354258, 12, 'large', '2021-11-27 12:29:23', 'pending'),
(37, 13, 54934, 763571604, 22, 'medium', '2021-11-27 13:00:15', 'pending'),
(38, 13, 400, 1532587275, 1, 'small', '2021-11-27 13:20:05', 'pending'),
(39, 13, 4994, 385296383, 2, 'small', '2021-11-27 13:25:35', 'pending'),
(40, 13, 200, 385296383, 1, 'small', '2021-11-27 13:25:35', 'pending'),
(41, 13, 2497, 1227200072, 1, 'small', '2021-11-29 12:31:06', 'pending'),
(42, 13, 300, 917138144, 2, '', '2021-11-29 14:04:54', 'pending'),
(43, 13, 12485, 917138144, 5, '', '2021-11-29 14:04:54', 'pending'),
(44, 13, 8000, 917138144, 2, '', '2021-11-29 14:04:54', 'pending'),
(45, 13, 600, 917138144, 3, '', '2021-11-29 14:04:54', 'pending'),
(46, 13, 350, 917138144, 1, '', '2021-11-29 14:04:54', 'pending'),
(47, 14, 300, 1968620154, 2, '', '2021-12-13 19:07:05', 'Complete'),
(48, 14, 150, 2132291175, 1, '', '2021-12-13 19:07:33', 'Complete'),
(49, 16, 800, 1344840070, 2, '', '2021-12-14 07:02:29', 'Complete'),
(50, 16, 300, 1344840070, 2, '', '2021-12-14 07:03:31', 'Complete'),
(51, 16, 800, 1344840070, 2, '', '2021-12-14 07:06:20', 'Complete'),
(52, 16, 300, 996141342, 2, '', '2021-12-14 07:07:51', 'Complete'),
(53, 16, 800, 996141342, 2, '', '2021-12-14 05:23:37', 'pending'),
(54, 16, 800, 996141342, 2, '', '2021-12-14 05:23:37', 'pending'),
(55, 16, 300, 1886994386, 2, '', '2021-12-14 09:08:34', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_type`
--

CREATE TABLE `enquiry_type` (
  `enquiry_id` int(10) NOT NULL,
  `enquiry_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiry_type`
--

INSERT INTO `enquiry_type` (`enquiry_id`, `enquiry_title`) VALUES
(1, 'Order Support'),
(2, 'Technical Supports'),
(3, 'Price Concern'),
(4, 'Delivery Problems');

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

CREATE TABLE `icons` (
  `icon_id` int(10) NOT NULL,
  `icon_product` int(10) NOT NULL,
  `icon_title` varchar(255) NOT NULL,
  `icon_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `icons`
--

INSERT INTO `icons` (`icon_id`, `icon_product`, `icon_title`, `icon_image`) VALUES
(1, 15, 'Icon 1', 'icon1.png'),
(2, 14, 'Icon 2', 'icon2.png'),
(3, 13, 'Icon 3', 'icon3.png'),
(4, 12, 'Icon 4', 'icon4.png'),
(5, 1, 'New Icon', '-_SEO_-_Webmarketing_-_Code_-_Developer_-_Web_-_Development-512.png'),
(7, 13, 'New Icon', '-_SEO_-_Webmarketing_-_Code_-_Developer_-_Web_-_Development-512.png');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `manufacturer_id` int(10) NOT NULL,
  `manufacturer_title` varchar(100) NOT NULL,
  `manufacturer_top` varchar(100) NOT NULL,
  `manufacturer_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`manufacturer_id`, `manufacturer_title`, `manufacturer_top`, `manufacturer_image`) VALUES
(7, 'Samsung', 'No', 'samsung-logo-white-background-samsung-logo-white-background-editorial-illustration-company-samsung-168841211.jpg'),
(8, 'Apple', 'Yes', 'index.png'),
(9, 'Huawei', 'Yes', 'Huawei-Logo-2018-present.jpg'),
(10, 'Motorola', 'Yes', 'mtorola.png'),
(11, 'Lenovo', 'Yes', 'lenovo.png'),
(12, 'Acer', 'Yes', 'acer.png'),
(13, 'HP', 'Yes', 'hp.png'),
(14, 'Dell', 'Yes', 'dell.jpg'),
(15, 'Sony', 'Yes', 'download.png');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `ref_no` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES
(21, 1344840070, 800, 'M-Pesa', 123456, 12344, '2021-12-14'),
(22, 996141342, 300, 'bank', 1234567, 234567, '2021-12-14'),
(23, 996141342, 300, 'Ecocash', 123456, 12345, '2021-12-14'),
(24, 1344840070, 800, 'bank', 12345, 1234567, '2021-12-23');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` varchar(100) NOT NULL,
  `order_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `size`, `order_status`) VALUES
(12, 13, 2127736964, 26, 2, 'medium', 'Complete'),
(13, 13, 2127736964, 28, 3, 'small', 'pending'),
(14, 13, 2127736964, 21, 2, 'medium', 'Complete'),
(15, 13, 2127736964, 16, 1, 'small', 'pending'),
(16, 13, 2127736964, 25, 1, 'medium', 'pending'),
(17, 13, 2127736964, 27, 1, 'large', 'pending'),
(18, 13, 1602936763, 28, 1, 'small', 'pending'),
(19, 13, 1602936763, 33, 1, 'small', 'pending'),
(20, 13, 1711953748, 16, 1, 'small', 'pending'),
(21, 13, 1711953748, 20, 2, 'small', 'pending'),
(22, 13, 1711953748, 33, 1, 'small', 'pending'),
(23, 13, 2073587211, 33, 1, 'medium', 'pending'),
(24, 13, 2073587211, 34, 2, 'small', 'pending'),
(25, 15, 11911087, 29, 1, 'small', 'Complete'),
(26, 13, 1573951160, 28, 1, 'small', 'pending'),
(27, 13, 1573951160, 25, 1, 'small', 'pending'),
(28, 13, 1573951160, 27, 2, 'small', 'pending'),
(29, 13, 1573951160, 34, 2, 'small', 'pending'),
(30, 13, 1573951160, 22, 2, 'small', 'pending'),
(31, 13, 1623200192, 31, 1, 'small', 'pending'),
(32, 13, 1227778727, 34, 1, 'small', 'pending'),
(33, 13, 366260723, 33, 2, 'small', 'pending'),
(34, 13, 1341472997, 33, 23, 'small', 'pending'),
(35, 13, 1862162622, 33, 3, 'small', 'pending'),
(36, 13, 360354258, 33, 12, 'large', 'pending'),
(37, 13, 763571604, 33, 22, 'medium', 'pending'),
(38, 13, 1532587275, 34, 1, 'small', 'pending'),
(39, 13, 385296383, 33, 2, 'small', 'pending'),
(40, 13, 385296383, 17, 1, 'small', 'pending'),
(41, 13, 1227200072, 33, 1, 'small', 'pending'),
(42, 13, 917138144, 35, 2, '', 'pending'),
(43, 13, 917138144, 33, 5, '', 'pending'),
(44, 13, 917138144, 16, 2, '', 'pending'),
(45, 13, 917138144, 24, 3, '', 'pending'),
(46, 13, 917138144, 30, 1, '', 'pending'),
(47, 14, 1968620154, 35, 2, '', 'Complete'),
(48, 14, 2132291175, 35, 1, '', 'Complete'),
(49, 16, 1344840070, 28, 2, '', 'Complete'),
(50, 16, 1344840070, 35, 2, '', 'Complete'),
(51, 16, 1344840070, 34, 2, '', 'Complete'),
(52, 16, 996141342, 35, 2, '', 'Complete'),
(53, 16, 996141342, 34, 2, '', 'pending'),
(54, 16, 996141342, 28, 2, '', 'pending'),
(55, 16, 1886994386, 35, 2, '', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `manufacturer_id` int(10) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` varchar(255) NOT NULL,
  `product_url` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_psp_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_features` text NOT NULL,
  `product_video` text NOT NULL,
  `product_keywords` varchar(100) NOT NULL,
  `product_label` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `manufacturer_id`, `add_date`, `product_title`, `product_url`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_psp_price`, `product_desc`, `product_features`, `product_video`, `product_keywords`, `product_label`, `status`) VALUES
(16, 2, 7, 7, '2021-10-26 20:47:04', 'Samsung Acore 12', '', '51CIUTsM28L._AC_SL1000_.jpg', '41ndBTiQIyL._AC_.jpg', '41LRH4zy0fL._AC_.jpg', 4000, 3950, 'With a Triple pro-grade camera, smooth 120Hz refresh rate display, and \r\nan all-day intelligent battery¹ that charges up in minutes, the Samsung \r\nGalaxy S20 FE 5G delivers outstanding innovation. The Triple-lens camera\r\n system will not only take bright and high quality images and videos, \r\nbut can also zoom in from afar, thanks to the 30X Space Zoom. The single\r\n take AI mode will let you capture multiple images and videos with just a\r\n touch of a button. Shooting at night? No problem. With the help of \r\nNight Mode, the Galaxy S20 FE 5G phone can capture crystal-clear images \r\nwithout flash. The Samsung Galaxy S20 FE 5G series is tailor-made for \r\nthose who want the latest technology without compromise. Choose from a \r\nwide range of six colorful hues in a sleek matte finish. ¹Battery power \r\nconsumption depends on usage patterns and results may vary.\r\n\r\n', '<ul class=\"a-unordered-list a-vertical a-spacing-mini\"><li><span class=\"a-list-item\">\r\nPRO-GRADE CAMERA: Features high-powered, pro lenses for beautiful photographs in any light with 3X optical zoom.\r\n\r\n</span></li><li><span class=\"a-list-item\">\r\n30X SPACE ZOOM: Zoom in close from afar or magnify details of something nearby with the power of 30X Space Zoom.\r\n\r\n</span></li><li><span class=\"a-list-item\">\r\nNIGHT MODE: Capture crisp images and vibrant videos with Night Mode and \r\ncapture high-quality content in low light. Compatible Samsung Galaxy \r\ndevice or Samsung TV required. Devices will work on any compatible \r\nnetwork. Wireless voice, data and messaging services are compatible with\r\n most GSM networks such as AT&T and T-Mobile and CDMA networks such \r\nas Verizon, Sprint and US Cellular\r\n\r\n</span></li><li><span class=\"a-list-item\">\r\nSINGLE-TAKE AI: One tap of the screen captures multiple images and videos all at once.\r\n\r\n</span></li><li><span class=\"a-list-item\">\r\nPOWER OF 5G: Get next-level power with Samsung Galaxy 5G: More sharing, more gaming, and more experiences.\r\n\r\n</span></li><li><span class=\"a-list-item\">\r\nCOLORS TO SUIT YOUR STYLE: Choose from six colorful hues in a sleek matte finish.\r\n\r\n</span></li></ul>', '<p align=\"right\"><br></p>', '     PRO-GRADE CAMERA: Features high-powered, pro lenses for beautiful photographs in any light with', 'New', 'product'),
(17, 2, 11, 15, '2021-10-17 05:28:06', 'Sony Bluetooth Speaker', '', '61JCeQFCboL._AC_SL1500_.jpg', '61bLt3sxlnL._AC_SL1500_.jpg', '61cjOfrZHkL._AC_SL1500_.jpg', 200, 180, '<p id=\"anchor1-2\" class=\"mod_text\" style=\"margin-right: 0px; margin-bottom: 1.5rem; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, Meiryo, sans-serif; font-size: medium;\">This web site is owned, operated and maintained by or for Sony Corporation (\"SONY\").</p><p id=\"anchor1-3\" class=\"mod_text\" style=\"margin-right: 0px; margin-bottom: 1.5rem; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, Meiryo, sans-serif; font-size: medium;\">Please read these terms and conditions of use (\"Terms and Conditions\") carefully before accessing and browsing this web site (\"Web Site\"). You can use this web site only if you agree to and accept the Terms and Conditions without limitation or reservation.</p><p id=\"anchor1-4\" class=\"mod_text\" style=\"margin-right: 0px; margin-bottom: 1.5rem; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, Meiryo, sans-serif; font-size: medium;\">SONY may, at its sole and exclusive discretion, change, alter, modify, add, and/or remove portions of the Terms and Conditions at any time by updating the contents of this page. So you are requested to visit this page and check the then effective Terms and Conditions periodically.</p><p id=\"anchor1-5\" class=\"mod_text\" style=\"margin-right: 0px; margin-bottom: 1.5rem; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, Meiryo, sans-serif; font-size: medium;\">This Web Site is linked to other web sites, also operated by Sony Group Corporation or its affiliates (\"SONY Site\"). In addition to the Terms and Conditions, use of each SONY Site shall also be subject to the terms and conditions particular to such SONY Site. In the event that any of the terms, conditions, and notices contained in the Terms and Conditions conflict with the terms and conditions particular to such SONY Site, then the terms and conditions particular to such SONY Site shall prevail and govern such SONY Site.</p>', '<p id=\"anchor1-2\" class=\"mod_text\" style=\"margin-right: 0px; margin-bottom: 1.5rem; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, Meiryo, sans-serif; font-size: medium;\">This web site is owned, operated and maintained by or for Sony Corporation (\"SONY\").</p><p id=\"anchor1-3\" class=\"mod_text\" style=\"margin-right: 0px; margin-bottom: 1.5rem; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, Meiryo, sans-serif; font-size: medium;\">Please read these terms and conditions of use (\"Terms and Conditions\") carefully before accessing and browsing this web site (\"Web Site\"). You can use this web site only if you agree to and accept the Terms and Conditions without limitation or reservation.</p><p id=\"anchor1-4\" class=\"mod_text\" style=\"margin-right: 0px; margin-bottom: 1.5rem; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, Meiryo, sans-serif; font-size: medium;\">SONY may, at its sole and exclusive discretion, change, alter, modify, add, and/or remove portions of the Terms and Conditions at any time by updating the contents of this page. So you are requested to visit this page and check the then effective Terms and Conditions periodically.</p><p id=\"anchor1-5\" class=\"mod_text\" style=\"margin-right: 0px; margin-bottom: 1.5rem; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, Meiryo, sans-serif; font-size: medium;\">This Web Site is linked to other web sites, also operated by Sony Group Corporation or its affiliates (\"SONY Site\"). In addition to the Terms and Conditions, use of each SONY Site shall also be subject to the terms and conditions particular to such SONY Site. In the event that any of the terms, conditions, and notices contained in the Terms and Conditions conflict with the terms and conditions particular to such SONY Site, then the terms and conditions particular to such SONY Site shall prevail and govern such SONY Site.</p>', '<p><br></p><table class=\"table table-bordered\"><tbody><tr><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td></tr></tbody></table><p><br></p>', 'This web site is owned, operated and maintained by or for Sony Corporation (\"SONY\").  Please read th', 'New', 'product'),
(18, 2, 12, 10, '2021-10-26 21:05:48', 'Bluetooth Headset ', '', '51bRSWrEc7S._AC_SL1500_.jpg', '61ewxzletOS._AC_SL1500_.jpg', '61kiU1iGP0S._AC_SL1500_.jpg', 120, 100, '<span style=\"font-family: Roboto, arial, sans-serif; font-size: 16px;\">Big brand wireless headphones mean big noise and big tech. And you won’t find a better selection of big-brand wireless headphones than at JB, both online and instore. With in-ear, over-ear and on-ear wireless headphones, they’re perfect whether you’re on the move, on the sofa or on the computer.</span>', '<span style=\"font-family: Roboto, arial, sans-serif; font-size: 16px;\">Big brand wireless headphones mean big noise and big tech. And you won’t find a better selection of big-brand wireless headphones than at JB, both online and instore. With in-ear, over-ear and on-ear wireless headphones, they’re perfect whether you’re on the move, on the sofa or on the computer.</span>', '<p>adadaa</p>', 'motorola', 'Sale', 'product'),
(19, 8, 7, 8, '2021-10-26 21:12:56', 'Iphone 11', '', '51biqZP8+2L._AC_SX679_.jpg', '41ndBTiQIyL._AC_.jpg', '41LRH4zy0fL._AC_.jpg', 11200, 10000, '<p><span style=\"font-family: Roboto, arial, sans-serif; font-size: 16px;\">Big brand wireless headphones mean big noise and big tech. And you won’t find a better selection of big-brand wireless headphones than at JB, both online and instore. With in-ear, over-ear and on-ear wireless headphones, they’re perfect whether you’re on the move, on the sofa or on the computer.</span><br></p>', '<p><span style=\"font-family: Roboto, arial, sans-serif; font-size: 16px;\">Big brand wireless headphones mean big noise and big tech. And you won’t find a better selection of big-brand wireless headphones than at JB, both online and instore. With in-ear, over-ear and on-ear wireless headphones, they’re perfect whether you’re on the move, on the sofa or on the computer.</span><br></p>', '<p><span style=\"font-family: Roboto, arial, sans-serif; font-size: 16px;\">Big brand wireless headphones mean big noise and big tech. And you won’t find a better selection of big-brand wireless headphones than at JB, both online and instore. With in-ear, over-ear and on-ear wireless headphones, they’re perfect whether you’re on the move, on the sofa or on the computer.</span><br></p>', 'Iphone', 'Gift', 'product'),
(20, 8, 7, 9, '2021-10-26 21:16:45', 'huawei P40 lite', '', '61aXyzIePhL._AC_SL1500_.jpg', '51-jJuScwYL._AC_.jpg', '51H0K5Ve0EL._AC_SX679_.jpg', 9000, 7000, '<p><span style=\"font-family: Roboto, arial, sans-serif; font-size: 16px;\">Big brand wireless headphones mean big noise and big tech. And you won’t find a better selection of big-brand wireless headphones than at JB, both online and instore. With in-ear, over-ear and on-ear wireless headphones, they’re perfect whether you’re on the move, on the sofa or on the computer.</span><br></p>', '<p><span style=\"font-family: Roboto, arial, sans-serif; font-size: 16px;\">Big brand wireless headphones mean big noise and big tech. And you won’t find a better selection of big-brand wireless headphones than at JB, both online and instore. With in-ear, over-ear and on-ear wireless headphones, they’re perfect whether you’re on the move, on the sofa or on the computer.</span><br></p>', '<p><span style=\"font-family: Roboto, arial, sans-serif; font-size: 16px;\">Big brand wireless headphones mean big noise and big tech. And you won’t find a better selection of big-brand wireless headphones than at JB, both online and instore. With in-ear, over-ear and on-ear wireless headphones, they’re perfect whether you’re on the move, on the sofa or on the computer.</span><br></p>', 'Hauwei', 'Gift', 'product'),
(21, 2, 13, 8, '2021-10-26 21:23:08', 'smart wathches', '', '51i6UseuG1L._AC_SL1000_.jpg', '51kyjYuOZhL._AC_SX679_.jpg', '51kyjYuOZhL._AC_SX679_.jpg', 500, 300, '<p><span style=\"font-family: Roboto, arial, sans-serif; font-size: 16px;\">Big brand wireless headphones mean big noise and big tech. And you won’t find a better selection of big-brand wireless headphones than at JB, both online and instore. With in-ear, over-ear and on-ear wireless headphones, they’re perfect whether you’re on the move, on the sofa or on the computer.</span><br></p>', '<p><span style=\"font-family: Roboto, arial, sans-serif; font-size: 16px;\">JB, both online and instore. With in-ear, over-ear and on-ear wireless headphones, they’re perfect whether you’re on the move, on the sofa or on the computer.</span><br></p>', '<span style=\"font-family: Roboto, arial, sans-serif; font-size: 16px;\">JB, both online and instore. With in-ear, over-ear and on-ear wireless headphones, they’re perfect whether you’re on the move, on the sofa or on the computer.</span>', 'smart wathches', 'Sale', 'product'),
(22, 2, 12, 7, '2021-10-26 21:59:32', 'Bluetooth Headset  Large', '', '71ESw+xAo+L._AC_SL1500_.jpg', '51OF7sr7e6L._AC_SL1200_.jpg', '71ESw+xAo+L._AC_SL1500_.jpg', 200, 180, '<p><span style=\"font-family: Roboto, arial, sans-serif; font-size: 16px;\">JB, both online and instore. With in-ear, over-ear and on-ear wireless headphones, they’re perfect whether you’re on the move, on the sofa or on the computer.</span><br></p>', '<p><br></p>', '<p><br></p>', 'Headset', 'Sale', 'product'),
(23, 2, 11, 8, '2021-10-26 22:07:50', 'Bluetooth  Speaker portable', '', '81IQoGyGdFS._AC_SL1500_.jpg', '81MxGe9fflL._AC_SL1500_.jpg', '81IYQr6ElIL._AC_SL1500_.jpg', 260, 122, '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">??Powerful Bass Bluetooth Speakers?——?double Bass and double tweeters?A21 Bluetooth Speaker is a portable Bluetooth speaker, it have 4 loudspeakers including double Bass, double tweeters and a rear heavy bass guide tube. With this speaker, you’ll feel as if you’re at a live concert, with clear high notes, deep bass and true HD sound.60W Big power blueooth speaker can provide very powerful stereo and amazing bass sound. It will bring you an unprecedented listening experience.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">??Bluetooth speaker with lights?——?Cool flashing Lights?The wireless bluetooth speaker has flashing LED lights, which dance with the music., and the flashing strobe makes music more dynamic and attractive. This cool colorful light can be controlled (you can control the light switch by \"double-click the pause button\"). You can enjoy the lights for home party, beach, camping or outdoor travel</span></li></ul>', '<p><br></p>', '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">??Powerful Bass Bluetooth Speakers?——?double Bass and double tweeters?A21 Bluetooth Speaker is a portable Bluetooth speaker, it have 4 loudspeakers including double Bass, double tweeters and a rear heavy bass guide tube. With this speaker, you’ll feel as if you’re at a live concert, with clear high notes, deep bass and true HD sound.60W Big power blueooth speaker can provide very powerful stereo and amazing bass sound. It will bring you an unprecedented listening experience.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">??Bluetooth speaker with lights?——?Cool flashing Lights?The wireless bluetooth speaker has flashing LED lights, which dance with the music., and the flashing strobe makes music more dynamic and attractive. This cool colorful light can be controlled (you can control the light switch by \"double-click the pause button\"). You can enjoy the lights for home party, beach, camping or outdoor travel</span></li></ul>', 'speaker', 'New', 'product'),
(24, 2, 11, 7, '2021-10-28 16:54:42', 'Samsung Bluetooth Speaker', '', '71vhXdq7VOL._AC_SL1500_.jpg', '61vACJNRDuL._AC_SL1500_.jpg', '71AdO55iOEL._AC_SL1500_.jpg', 230, 200, '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: \"Amazon Ember\", Arial, sans-serif;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">??Powerful Bass Bluetooth Speakers?——?double Bass and double tweeters?A21 Bluetooth Speaker is a portable Bluetooth speaker, it have 4 loudspeakers including double Bass, double tweeters and a rear heavy bass guide tube. With this speaker, you’ll feel as if you’re at a live concert, with clear high notes, deep bass and true HD sound.60W Big power blueooth speaker can provide very powerful stereo and amazing bass sound. It will bring you an unprecedented listening experience.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">??Bluetooth speaker with lights?——?Cool flashing Lights?The wireless bluetooth speaker has flashing LED lights, which dance with the music., and the flashing strobe makes music more dynamic and attractive. This cool colorful light can be controlled (you can control the light switch by \"double-click the pause button\"). You can enjoy the lights for home party, beach, camping or outdoor travel</span></li></ul>', '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: \"Amazon Ember\", Arial, sans-serif;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">??Powerful Bass Bluetooth Speakers?——?double Bass and double tweeters?A21 Bluetooth Speaker is a portable Bluetooth speaker, it have 4 loudspeakers including double Bass, double tweeters and a rear heavy bass guide tube. With this speaker, you’ll feel as if you’re at a live concert, with clear high notes, deep bass and true HD sound.60W Big power blueooth speaker can provide very powerful stereo and amazing bass sound. It will bring you an unprecedented listening experience.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">??Bluetooth speaker with lights?——?Cool flashing Lights?The wireless bluetooth speaker has flashing LED lights, which dance with the music., and the flashing strobe makes music more dynamic and attractive. This cool colorful light can be controlled (you can control the light switch by \"double-click the pause button\"). You can enjoy the lights for home party, beach, camping or outdoor travel</span></li></ul>', '<ul><li><br></li></ul>', 'speaker', 'Sale', 'product'),
(25, 7, 8, 12, '2021-10-26 22:15:56', 'Acer ceron core i3', '', '71+2H96GHZL._AC_SL1500_.jpg', '71k95iZEk5S._AC_SL1500_.jpg', '71CYU9UGgaS._AC_SL1500_.jpg', 5000, 4500, '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Powerful Productivity: AMD Ryzen 3 3350U delivers desktop-class performance and amazing battery life in a slim notebook. With Precision Boost, get up to 3.5GHz for your high-demand applications</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Maximized Visuals: See even more on the stunning 15.6\" Full HD display with 82.58% screen-to-body, 16:9 aspect ratio and narrow bezels</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Backlit Keyboard and Fingerprint Reader: Biometric fingerprint reader and Windows Hello sign-in options help keep your Acer PC secure</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Internal Specifications: 4GB DDR4 on-board memory (1 slot available); 128GB NVMe solid-state drive storage (1 hard drive bay available) to store your files and media</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Acer\'s Purified.Voice technology, features enhanced digital signal processing to cancel out background noise, improve speech accuracy and far-field pickup, which not only makes calls clearer, but makes talking to Alexa easier than before.</span></li></ul>', '<ul><li><br></li></ul>', '<div><ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Powerful Productivity: AMD Ryzen 3 3350U delivers desktop-class performance and amazing battery life in a slim notebook. With Precision Boost, get up to 3.5GHz for your high-demand applications</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Maximized Visuals: See even more on the stunning 15.6\" Full HD display with 82.58% screen-to-body, 16:9 aspect ratio and narrow bezels</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Backlit Keyboard and Fingerprint Reader: Biometric fingerprint reader and Windows Hello sign-in options help keep your Acer PC secure</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Internal Specifications: 4GB DDR4 on-board memory (1 slot available); 128GB NVMe solid-state drive storage (1 hard drive bay available) to store your files and media</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Acer\'s Purified.Voice technology, features enhanced digital signal processing to cancel out background noise, improve speech accuracy and far-field pickup, which not only makes calls clearer, but makes talking to Alexa easier than before.</span></li></ul></div>', 'acer core i3', 'New', 'product'),
(26, 2, 12, 7, '2021-10-26 22:18:41', 'Bluetooth Headset ', '', '61ld32dDaDL._AC_SL1500_.jpg', '71NSLb-gmgL._AC_SL1500_.jpg', '61kiU1iGP0S._AC_SL1500_.jpg', 50, 40, '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Powerful Productivity: AMD Ryzen 3 3350U delivers desktop-class performance and amazing battery life in a slim notebook. With Precision Boost, get up to 3.5GHz for your high-demand applications</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Maximized Visuals: See even more on the stunning 15.6\" Full HD display with 82.58% screen-to-body, 16:9 aspect ratio and narrow bezels</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Backlit Keyboard and Fingerprint Reader: Biometric fingerprint reader and Windows Hello sign-in options help keep your Acer PC secure</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Internal Specifications: 4GB DDR4 on-board memory (1 slot available); 128GB NVMe solid-state drive storage (1 hard drive bay available) to store your files and media</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Acer\'s Purified.Voice technology, features enhanced digital signal processing to cancel out background noise, improve speech accuracy and far-field pickup, which not only makes calls clearer, but makes talking to Alexa easier than before.</span></li></ul>', '<ul><li><br></li></ul>', '<ul><li><br></li></ul>', 'Iphone', 'Sale', 'product'),
(27, 7, 9, 13, '2021-10-26 22:23:48', 'Hp Moniter', '', '81eRAX3sB6L._AC_SL1500_.jpg', '71ggiRj93iL._AC_SL1500_.jpg', '71tc+dV74aL._AC_SL1500_.jpg', 2500, 2300, '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Powerful Productivity: AMD Ryzen 3 3350U delivers desktop-class performance and amazing battery life in a slim notebook. With Precision Boost, get up to 3.5GHz for your high-demand applications</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Maximized Visuals: See even more on the stunning 15.6\" Full HD display with 82.58% screen-to-body, 16:9 aspect ratio and narrow bezels</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Backlit Keyboard and Fingerprint Reader: Biometric fingerprint reader and Windows Hello sign-in options help keep your Acer PC secure</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Internal Specifications: 4GB DDR4 on-board memory (1 slot available); 128GB NVMe solid-state drive storage (1 hard drive bay available) to store your files and media</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Acer\'s Purified.Voice technology, features enhanced digital signal processing to cancel out background noise, improve speech accuracy and far-field pickup, which not only makes calls clearer, but makes talking to Alexa easier than before.</span></li></ul>', '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: \"Amazon Ember\", Arial, sans-serif;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Powerful Productivity: AMD Ryzen 3 3350U delivers desktop-class performance and amazing battery life in a slim notebook. With Precision Boost, get up to 3.5GHz for your high-demand applications</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Maximized Visuals: See even more on the stunning 15.6\" Full HD display with 82.58% screen-to-body, 16:9 aspect ratio and narrow bezels</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Backlit Keyboard and Fingerprint Reader: Biometric fingerprint reader and Windows Hello sign-in options help keep your Acer PC secure</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Internal Specifications: 4GB DDR4 on-board memory (1 slot available); 128GB NVMe solid-state drive storage (1 hard drive bay available) to store your files and media</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Acer\'s Purified.Voice technology, features enhanced digital signal processing to cancel out background noise, improve speech accuracy and far-field pickup, which not only makes calls clearer, but makes talking to Alexa easier than before.</span></li></ul>', '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: \"Amazon Ember\", Arial, sans-serif;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Powerful Productivity: AMD Ryzen 3 3350U delivers desktop-class performance and amazing battery life in a slim notebook. With Precision Boost, get up to 3.5GHz for your high-demand applications</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Maximized Visuals: See even more on the stunning 15.6\" Full HD display with 82.58% screen-to-body, 16:9 aspect ratio and narrow bezels</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Backlit Keyboard and Fingerprint Reader: Biometric fingerprint reader and Windows Hello sign-in options help keep your Acer PC secure</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Internal Specifications: 4GB DDR4 on-board memory (1 slot available); 128GB NVMe solid-state drive storage (1 hard drive bay available) to store your files and media</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Acer', 'Powerful Productivity: AMD Ryzen 3 3350U delivers desktop-class performance and amazing battery life', 'New', 'product'),
(28, 2, 11, 14, '2021-10-26 22:26:23', 'speaker mix what what', '', '61t8l2xdkZL._AC_SL1001_.jpg', '71bXo6fVC2L._AC_SL1500_.jpg', '71cfg46NYNL._AC_SL1001_.jpg', 400, 450, '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Powerful Productivity: AMD Ryzen 3 3350U delivers desktop-class performance and amazing battery life in a slim notebook. With Precision Boost, get up to 3.5GHz for your high-demand applications</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Maximized Visuals: See even more on the stunning 15.6\" Full HD display with 82.58% screen-to-body, 16:9 aspect ratio and narrow bezels</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Backlit Keyboard and Fingerprint Reader: Biometric fingerprint reader and Windows Hello sign-in options help keep your Acer PC secure</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Internal Specifications: 4GB DDR4 on-board memory (1 slot available); 128GB NVMe solid-state drive storage (1 hard drive bay available) to store your files and media</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Acer\'s Purified.Voice technology, features enhanced digital signal processing to cancel out background noise, improve speech accuracy and far-field pickup, which not only makes calls clearer, but makes talking to Alexa easier than before.</span></li></ul>', '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Powerful Productivity: AMD Ryzen 3 3350U delivers desktop-class performance and amazing battery life in a slim notebook. With Precision Boost, get up to 3.5GHz for your high-demand applications</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Maximized Visuals: See even more on the stunning 15.6\" Full HD display with 82.58% screen-to-body, 16:9 aspect ratio and narrow bezels</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Backlit Keyboard and Fingerprint Reader: Biometric fingerprint reader and Windows Hello sign-in options help keep your Acer PC secure</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Internal Specifications: 4GB DDR4 on-board memory (1 slot available); 128GB NVMe solid-state drive storage (1 hard drive bay available) to store your files and media</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Acer\'s Purified.Voice technology, features enhanced digital signal processing to cancel out background noise, improve speech accuracy and far-field pickup, which not only makes calls clearer, but makes talking to Alexa easier than before.</span></li></ul>', '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Powerful Productivity: AMD Ryzen 3 3350U delivers desktop-class performance and amazing battery life in a slim notebook. With Precision Boost, get up to 3.5GHz for your high-demand applications</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Maximized Visuals: See even more on the stunning 15.6\" Full HD display with 82.58% screen-to-body, 16:9 aspect ratio and narrow bezels</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Backlit Keyboard and Fingerprint Reader: Biometric fingerprint reader and Windows Hello sign-in options help keep your Acer PC secure</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Internal Specifications: 4GB DDR4 on-board memory (1 slot available); 128GB NVMe solid-state drive storage (1 hard drive bay available) to store your files and media</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Acer\'s Purified.Voice technology, features enhanced digital signal processing to cancel out background noise, improve speech accuracy and far-field pickup, which not only makes calls clearer, but makes talking to Alexa easier than before.</span></li></ul>', 'speaker', 'New', 'product'),
(29, 2, 13, 9, '2021-10-26 22:28:14', 'Car phone Holder', '', '61z3W3Kgd0L._AC_SL1500_.jpg', '71bLl8awV6L._AC_SL1500_.jpg', '61NyYFUFIIL._AC_SL1500_.jpg', 450, 400, '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Powerful Productivity: AMD Ryzen 3 3350U delivers desktop-class performance and amazing battery life in a slim notebook. With Precision Boost, get up to 3.5GHz for your high-demand applications</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Maximized Visuals: See even more on the stunning 15.6\" Full HD display with 82.58% screen-to-body, 16:9 aspect ratio and narrow bezels</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Backlit Keyboard and Fingerprint Reader: Biometric fingerprint reader and Windows Hello sign-in options help keep your Acer PC secure</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Internal Specifications: 4GB DDR4 on-board memory (1 slot available); 128GB NVMe solid-state drive storage (1 hard drive bay available) to store your files and media</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Acer\'s Purified.Voice technology, features enhanced digital signal processing to cancel out background noise, improve speech accuracy and far-field pickup, which not only makes calls clearer, but makes talking to Alexa easier than before.</span></li></ul>', '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Powerful Productivity: AMD Ryzen 3 3350U delivers desktop-class performance and amazing battery life in a slim notebook. With Precision Boost, get up to 3.5GHz for your high-demand applications</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Maximized Visuals: See even more on the stunning 15.6\" Full HD display with 82.58% screen-to-body, 16:9 aspect ratio and narrow bezels</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Backlit Keyboard and Fingerprint Reader: Biometric fingerprint reader and Windows Hello sign-in options help keep your Acer PC secure</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Internal Specifications: 4GB DDR4 on-board memory (1 slot available); 128GB NVMe solid-state drive storage (1 hard drive bay available) to store your files and media</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Acer\'s Purified.Voice technology, features enhanced digital signal processing to cancel out background noise, improve speech accuracy and far-field pickup, which not only makes calls clearer, but makes talking to Alexa easier than before.</span></li></ul>', '<ul><li><br></li></ul>', 'Hauwei', 'Sale', 'product'),
(30, 2, 12, 7, '2021-11-29 11:39:34', 'Headset  Samsung', '', '815PM0CRkHL._AC_SL1500_.jpg', '81eSefFarHL._AC_SL1500_.jpg', '71ixHEO-5IL._AC_SL1500_.jpg', 450, 350, '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: \"Amazon Ember\", Arial, sans-serif;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Powerful Productivity: AMD Ryzen 3 3350U delivers desktop-class performance and amazing battery life in a slim notebook. With Precision Boost, get up to 3.5GHz for your high-demand applications</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Maximized Visuals: See even more on the stunning 15.6\" Full HD display with 82.58% screen-to-body, 16:9 aspect ratio and narrow bezels</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Backlit Keyboard and Fingerprint Reader: Biometric fingerprint reader and Windows Hello sign-in options help keep your Acer PC secure</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Internal Specifications: 4GB DDR4 on-board memory (1 slot available); 128GB NVMe solid-state drive storage (1 hard drive bay available) to store your files and media</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Acer\'s Purified.Voice technology, features enhanced digital signal processing to cancel out background noise, improve speech accuracy and far-field pickup, which not only makes calls clearer, but makes talking to Alexa easier than before.</span></li></ul>', '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: \"Amazon Ember\", Arial, sans-serif;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Powerful Productivity: AMD Ryzen 3 3350U delivers desktop-class performance and amazing battery life in a slim notebook. With Precision Boost, get up to 3.5GHz for your high-demand applications</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Maximized Visuals: See even more on the stunning 15.6\" Full HD display with 82.58% screen-to-body, 16:9 aspect ratio and narrow bezels</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Backlit Keyboard and Fingerprint Reader: Biometric fingerprint reader and Windows Hello sign-in options help keep your Acer PC secure</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Internal Specifications: 4GB DDR4 on-board memory (1 slot available); 128GB NVMe solid-state drive storage (1 hard drive bay available) to store your files and media</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Acer\'s Purified.Voice technology, features enhanced digital signal processing to cancel out background noise, improve speech accuracy and far-field pickup, which not only makes calls clearer, but makes talking to Alexa easier than before.</span></li></ul>', '<ol><li><br></li></ol>', 'speaker', 'Gift', 'product'),
(32, 2, 13, 9, '2021-10-27 17:53:43', 'Car accesseries device', '', '71XfvEPFvvS._AC_SL1500_.jpg', '71XaQxz0yzL._AC_SL1500_.jpg', '81ozk8mbFrL._AC_SL1500_.jpg', 350, 350, '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" amazon=\"\" ember\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Delightful sound experience delivered by the uniquely designed powerful 16W speaker that makes your music as lively as it can get.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">While looking classic & trendy, the portable compact design comes with convenient loop strip makes it easy to bring the beat wherever you go.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Built-in Microphone with Voice Assistant Support for you to enjoy a more convenient, hands-free calling experience. You can also access your favorite voice assistants from your speaker.</span></li></ul>', '<p><br></p><table class=\"table table-bordered\"><tbody><tr><td><ul class=\"a-unordered-list a-vertical a-spacing-mini\" amazon=\"\" ember\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Delightful sound experience delivered by the uniquely designed powerful 16W speaker that makes your music as lively as it can get.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">While looking classic &amp; trendy, the portable compact design comes with convenient loop strip makes it easy to bring the beat wherever you go.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Built-in Microphone with Voice Assistant Support for you to enjoy a more convenient, hands-free calling experience. You can also access your favorite voice assistants from your speaker.</span></li></ul></td></tr></tbody></table><p><br></p>', '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" amazon=\"\" ember\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Delightful sound experience delivered by the uniquely designed powerful 16W speaker that makes your music as lively as it can get.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">While looking classic & trendy, the portable compact design comes with convenient loop strip makes it easy to bring the beat wherever you go.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Built-in Microphone with Voice Assistant Support for you to enjoy a more convenient, hands-free calling experience. You can also access your favorite voice assistants from your speaker.</span></li></ul>', 'speaker', 'New', 'product'),
(33, 7, 9, 8, '2021-10-28 16:02:28', 'Desk top Apple', '', '81LvwMJOShL._AC_SL1500_.jpg', '81Da5AxqQCL._AC_SL1500_.jpg', '81fWqIWUJ0L._AC_SL1500_.jpg', 3000, 2497, '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" amazon=\"\" ember\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; padding: 0px; list-style: none; font-family: Montserrat, sans-serif; color: rgb(15, 17, 17);\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Dual EQ mode: Designed with two equalizer modes normal &amp; deep bass mode, so that you can choose your music/ video listening experience the way you want it to be. Frequency Range : 80Hz to 20KHz</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Delightful sound experience delivered by the uniquely designed powerful 16W speaker that makes your music as lively as it can get.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">While looking classic &amp; trendy, the portable compact design comes with convenient loop strip makes it easy to bring the beat wherever you go.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Built-in Microphone with Voice Assistant Support for you to enjoy a more convenient, hands-free calling experience. You can also access your favorite voice assistants from your speaker.</span></li></ul>', '<ol><li><br></li></ol><ul class=\"a-unordered-list a-vertical a-spacing-mini\" amazon=\"\" ember\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; padding: 0px; list-style: none; font-family: Montserrat, sans-serif; color: rgb(15, 17, 17);\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Dual EQ mode: Designed with two equalizer modes normal &amp; deep bass mode, so that you can choose your music/ video listening experience the way you want it to be. Frequency Range : 80Hz to 20KHz</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Delightful sound experience delivered by the uniquely designed powerful 16W speaker that makes your music as lively as it can get.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">While looking classic &amp; trendy, the portable compact design comes with convenient loop strip makes it easy to bring the beat wherever you go.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Built-in Microphone with Voice Assistant Support for you to enjoy a more convenient, hands-free calling experience. You can also access your favorite voice assistants from your speaker.</span></li></ul>', '<p><br></p><table class=\"table table-bordered\"><tbody><tr><td><br></td></tr></tbody></table><ul class=\"a-unordered-list a-vertical a-spacing-mini\" amazon=\"\" ember\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; padding: 0px; list-style: none; font-family: Montserrat, sans-serif; color: rgb(15, 17, 17);\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Dual EQ mode: Designed with two equalizer modes normal &amp; deep bass mode, so that you can choose your music/ video listening experience the way you want it to be. Frequency Range : 80Hz to 20KHz</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Delightful sound experience delivered by the uniquely designed powerful 16W speaker that makes your music as lively as it can get.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">While looking classic &amp; trendy, the portable compact design comes with convenient loop strip makes it easy to bring the beat wherever you go.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Built-in Microphone with Voice Assistant Support for you to enjoy a more convenient, hands-free calling experience. You can also access your favorite voice assistants from your speaker.</span></li></ul>', 'new', 'Gift', 'product');
INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `manufacturer_id`, `add_date`, `product_title`, `product_url`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_psp_price`, `product_desc`, `product_features`, `product_video`, `product_keywords`, `product_label`, `status`) VALUES
(34, 2, 12, 7, '2021-10-31 04:49:12', 'Headset Data', '', '51OF7sr7e6L._AC_SL1200_.jpg', '61pTIbaAXHL._AC_SL1500_.jpg', '61bLt3sxlnL._AC_SL1500_.jpg', 450, 400, '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Padded headband and ear pads. Frequency response (Microphone): 100 hertz - 10 kilohertz</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Rotating, noise canceling microphone. Sensitivity (headphone) 94 dBV/Pa +/ 3 dB. Sensitivity (microphone) 17 dBV/Pa +/ 4 dB</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Convenient inline volume and mute controls</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Advanced digital USB, connections: USB compatible (1.1 and 2.0)</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Compatible with Windows Vista, Windows 7, Windows 8, Windows 10 or later and Mac OS X(10.2.8 or later)</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">2 Year Limited warranty</span></li></ul>', '<p><br></p>', '<ol><li><br></li></ol>', 'headset', 'Sale', 'product'),
(35, 2, 12, 8, '2021-11-29 11:35:50', 'Headset  new Model', '', '81adorXFs3L._AC_SL1500_.jpg', '71ESw+xAo+L._AC_SL1500_.jpg', '81eSefFarHL._AC_SL1500_.jpg', 200, 150, '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; padding: 0px; list-style: none; color: rgb(15, 17, 17); font-family: \"Amazon Ember\", Arial, sans-serif;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Padded headband and ear pads. Frequency response (Microphone): 100 hertz - 10 kilohertz</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Rotating, noise canceling microphone. Sensitivity (headphone) 94 dBV/Pa +/ 3 dB. Sensitivity (microphone) 17 dBV/Pa +/ 4 dB</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Convenient inline volume and mute controls</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Advanced digital USB, connections: USB compatible (1.1 and 2.0)</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Compatible with Windows Vista, Windows 7, Windows 8, Windows 10 or later and Mac OS X(10.2.8 or later)</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">2 Year Limited warranty</span></li></ul>', '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; padding: 0px; list-style: none; color: rgb(15, 17, 17); font-family: \"Amazon Ember\", Arial, sans-serif;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Padded headband and ear pads. Frequency response (Microphone): 100 hertz - 10 kilohertz</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Rotating, noise canceling microphone. Sensitivity (headphone) 94 dBV/Pa +/ 3 dB. Sensitivity (microphone) 17 dBV/Pa +/ 4 dB</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Convenient inline volume and mute controls</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Advanced digital USB, connections: USB compatible (1.1 and 2.0)</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Compatible with Windows Vista, Windows 7, Windows 8, Windows 10 or later and Mac OS X(10.2.8 or later)</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">2 Year Limited warranty</span></li></ul>', '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; padding: 0px; list-style: none; color: rgb(15, 17, 17); font-family: \"Amazon Ember\", Arial, sans-serif;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Padded headband and ear pads. Frequency response (Microphone): 100 hertz - 10 kilohertz</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Rotating, noise canceling microphone. Sensitivity (headphone) 94 dBV/Pa +/ 3 dB. Sensitivity (microphone) 17 dBV/Pa +/ 4 dB</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Convenient inline volume and mute controls</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Advanced digital USB, connections: USB compatible (1.1 and 2.0)</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Compatible with Windows Vista, Windows 7, Windows 8, Windows 10 or later and Mac OS X(10.2.8 or later)</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">2 Year Limited warranty</span></li></ul>', 'Bluetooth', 'Sale', 'product'),
(36, 2, 10, 10, '2021-12-14 02:04:59', 'watch', '', '51kyjYuOZhL._AC_SX679_.jpg', '51i6UseuG1L._AC_SL1000_.jpg', '51CZuPt2xDL._AC_SL1000_.jpg', 150, 150, '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" amazon=\"\" ember\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; padding: 0px; list-style: none; font-family: Montserrat, sans-serif; color: rgb(15, 17, 17);\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Padded headband and ear pads. Frequency response (Microphone): 100 hertz - 10 kilohertz</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Rotating, noise canceling microphone. Sensitivity (headphone) 94 dBV/Pa +/ 3 dB. Sensitivity (microphone) 17 dBV/Pa +/ 4 dB</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Convenient inline volume and mute controls</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Advanced digital USB, connections: USB compatible (1.1 and 2.0)</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Compatible with Windows Vista, Windows 7, Windows 8, Windows 10 or later and Mac OS X(10.2.8 or later)</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">2 Year Limited warranty</span></li></ul>', '<p><br></p><ul class=\"a-unordered-list a-vertical a-spacing-mini\" amazon=\"\" ember\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; padding: 0px; list-style: none; font-family: Montserrat, sans-serif; color: rgb(15, 17, 17);\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Padded headband and ear pads. Frequency response (Microphone): 100 hertz - 10 kilohertz</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Rotating, noise canceling microphone. Sensitivity (headphone) 94 dBV/Pa +/ 3 dB. Sensitivity (microphone) 17 dBV/Pa +/ 4 dB</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Convenient inline volume and mute controls</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Advanced digital USB, connections: USB compatible (1.1 and 2.0)</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Compatible with Windows Vista, Windows 7, Windows 8, Windows 10 or later and Mac OS X(10.2.8 or later)</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">2 Year Limited warranty</span></li></ul><table class=\"table table-bordered\"><tbody><tr><td><br></td></tr></tbody></table><p><br></p><p><br></p>', '<p><br></p><table class=\"table table-bordered\"><tbody><tr><td><ul class=\"a-unordered-list a-vertical a-spacing-mini\" amazon=\"\" ember\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; padding: 0px; list-style: none; font-family: Montserrat, sans-serif; color: rgb(15, 17, 17);\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Padded headband and ear pads. Frequency response (Microphone): 100 hertz - 10 kilohertz</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Rotating, noise canceling microphone. Sensitivity (headphone) 94 dBV/Pa +/ 3 dB. Sensitivity (microphone) 17 dBV/Pa +/ 4 dB</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Convenient inline volume and mute controls</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Advanced digital USB, connections: USB compatible (1.1 and 2.0)</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Compatible with Windows Vista, Windows 7, Windows 8, Windows 10 or later and Mac OS X(10.2.8 or later)</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">2 Year Limited warranty</span></li></ul></td></tr></tbody></table><p><br></p>', 'motorola', 'New', 'product');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` varchar(100) NOT NULL,
  `p_cat_top` varchar(100) NOT NULL,
  `p_cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_top`, `p_cat_image`) VALUES
(2, 'Accessories', 'No', 'image2.jpg'),
(7, 'Computers', 'Yes', '71CYU9UGgaS._AC_SL1500_.jpg'),
(8, 'phones', 'Yes', '41LRH4zy0fL._AC_.jpg'),
(9, 'Disk', 'Yes', '61kiU1iGP0S._AC_SL1500_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(10) NOT NULL,
  `service_title` varchar(255) NOT NULL,
  `service_image` varchar(255) NOT NULL,
  `service_desc` text NOT NULL,
  `service_button` varchar(255) NOT NULL,
  `service_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_title`, `service_image`, `service_desc`, `service_button`, `service_url`) VALUES
(1, 'Gift Package', 'service1.jpg', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.</p><p> All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 'Contact for Details', 'http://www.obydullahshishir.com'),
(2, 'Love Serprices', 'service2.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p><p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'Contact for Details &amp; Rates', 'http://www.obydullahshishir.com'),
(7, 'New Service 2', 'product3.png', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It \r\nhas roots in a piece of classical Latin literature from 45 BC, making it\r\n over 2000 years old. Richard McClintock, a Latin professor at \r\nHampden-Sydney College in Virginia, looked up one of the more obscure \r\nLatin words, consectetur, from a Lorem Ipsum passage, and going through \r\nthe cites of the word in classical literature, discovered the \r\nundoubtable source. </p><p>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 \r\nof \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by \r\nCicero, written in 45 BC. This book is a treatise on the theory of \r\nethics, very popular during the Renaissance. The first line of Lorem \r\nIpsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section \r\n1.10.32.</p>', 'Contact for More', 'http://localhost/ecommerce/services.php');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL,
  `slide_title` varchar(255) NOT NULL,
  `slide_text` varchar(255) NOT NULL,
  `slide_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `term_id` int(10) NOT NULL,
  `term_title` varchar(150) NOT NULL,
  `term_link` varchar(255) NOT NULL,
  `term_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`term_id`, `term_title`, `term_link`, `term_desc`) VALUES
(1, 'Terms & Conditions', 'Link1', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro qui ad veniam, commodi. Numquam, id inventore odio ipsum, dolore natus. Voluptatem, explicabo architecto quis reiciendis libero! Error, hic excepturi, maiores voluptate quod officiis quam, asperiores earum ipsam ipsum totam modi deserunt incidunt aliquam eligendi quia harum recusandae illo rem.</p>\r\n<p>Velit, ratione nostrum consequuntur commodi maxime? Dolorem consequatur nihil eligendi culpa autem necessitatibus, provident quidem minima quod quibusdam maxime a molestiae fugit. Iure exercitationem facilis totam incidunt eveniet enim alias accusamus cum sapiente. Veritatis fuga non, porro aperiam neque. Nisi, ipsa dolore, necessitatibus sit atque deserunt culpa sapiente reiciendis voluptate nemo aliquid tenetur perferendis. Quibusdam, qui quisquam soluta eos quidem officia eligendi, aut quae voluptatibus laborum facilis ab necessitatibus. Deleniti quis ab repudiandae dolores qui reprehenderit odio sint neque rem sit, autem necessitatibus sequi possimus expedita praesentium tempora sed in. Pariatur a, voluptatem ratione magni possimus aliquam atque ab porro ipsum mollitia odio maxime, exercitationem, sed quasi eligendi laboriosam voluptatibus blanditiis unde nemo optio tempore.</p>\r\n<p>Eius exercitationem quos magnam quisquam harum possimus temporibus officia maiores, veniam voluptates eum, ex optio aspernatur sit necessitatibus omnis repellat doloremque aut unde, ab sunt architecto. Quod animi necessitatibus atque id nostrum quos, ipsam error repellendus! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro qui ad veniam, commodi. Numquam, id inventore odio ipsum, dolore natus. Voluptatem, explicabo architecto quis reiciendis libero! Error, hic excepturi, maiores voluptate quod officiis quam, asperiores earum ipsam ipsum totam modi deserunt incidunt aliquam eligendi quia harum recusandae illo rem. Velit, ratione nostrum consequuntur commodi maxime? Dolorem consequatur nihil eligendi culpa autem necessitatibus, provident quidem minima quod quibusdam maxime a molestiae fugit. Iure exercitationem facilis totam incidunt eveniet enim alias accusamus cum sapiente. Veritatis fuga non, porro aperiam neque.</p>\r\n<p>Nisi, ipsa dolore, necessitatibus sit atque deserunt culpa sapiente reiciendis voluptate nemo aliquid tenetur perferendis. Quibusdam, qui quisquam soluta eos quidem officia eligendi, aut quae voluptatibus laborum facilis ab necessitatibus. Deleniti quis ab repudiandae dolores qui reprehenderit odio sint neque rem sit, autem necessitatibus sequi possimus expedita praesentium tempora sed in. Pariatur a, voluptatem ratione magni possimus aliquam atque ab porro ipsum mollitia odio maxime, exercitationem, sed quasi eligendi laboriosam voluptatibus blanditiis unde nemo optio tempore.</p>\r\n<p>Eius exercitationem quos magnam quisquam harum possimus temporibus officia maiores, veniam voluptates eum, ex optio aspernatur sit necessitatibus omnis repellat doloremque aut unde, ab sunt architecto. Quod animi necessitatibus atque id nostrum quos, ipsam error repellendus!</p>'),
(2, 'Refund Policy', 'Link2', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, corporis ad inventore ullam amet. Hic, nobis enim quaerat perspiciatis temporibus quia commodi, doloremque neque corrupti dolore facilis quo veritatis, laboriosam in voluptatibus illo! Sapiente, sit, minima? Debitis odio nisi at optio incidunt ex, esse nam, dignissimos non modi temporibus beatae, velit libero aliquam totam nemo est tempore quod. Ab saepe, molestiae mollitia non quisquam.</p>\r\n<p>Ut saepe facilis sunt tenetur rerum nihil exercitationem deleniti dignissimos est odit, neque iste unde aliquam minima minus maiores quam alias pariatur id mollitia quas quisquam. Laudantium animi praesentium repellendus officia a repudiandae et quaerat libero. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, corporis ad inventore ullam amet. Hic, nobis enim quaerat perspiciatis temporibus quia commodi, doloremque neque corrupti dolore facilis quo veritatis, laboriosam in voluptatibus illo! Sapiente, sit, minima? Debitis odio nisi at optio incidunt ex, esse nam, dignissimos non modi temporibus beatae, velit libero aliquam totam nemo est tempore quod.</p>\r\n<p>Ab saepe, molestiae mollitia non quisquam. Ut saepe facilis sunt tenetur rerum nihil exercitationem deleniti dignissimos est odit, neque iste unde aliquam minima minus maiores quam alias pariatur id mollitia quas quisquam. Laudantium animi praesentium repellendus officia a repudiandae et quaerat libero. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, corporis ad inventore ullam amet. Hic, nobis enim quaerat perspiciatis temporibus quia commodi, doloremque neque corrupti dolore facilis quo veritatis, laboriosam in voluptatibus illo! Sapiente, sit, minima?</p>\r\n<p>Debitis odio nisi at optio incidunt ex, esse nam, dignissimos non modi temporibus beatae, velit libero aliquam totam nemo est tempore quod. Ab saepe, molestiae mollitia non quisquam. Ut saepe facilis sunt tenetur rerum nihil exercitationem deleniti dignissimos est odit, neque iste unde aliquam minima minus maiores quam alias pariatur id mollitia quas quisquam. Laudantium animi praesentium repellendus officia a repudiandae et quaerat libero. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, corporis ad inventore ullam amet.</p>\r\n<p>Hic, nobis enim quaerat perspiciatis temporibus quia commodi, doloremque neque corrupti dolore facilis quo veritatis, laboriosam in voluptatibus illo! Sapiente, sit, minima? Debitis odio nisi at optio incidunt ex, esse nam, dignissimos non modi temporibus beatae, velit libero aliquam totam nemo est tempore quod. Ab saepe, molestiae mollitia non quisquam. Ut saepe facilis sunt tenetur rerum nihil exercitationem deleniti dignissimos est odit, neque iste unde aliquam minima minus maiores quam alias pariatur id mollitia quas quisquam. Laudantium animi praesentium repellendus officia a repudiandae et quaerat libero.</p>'),
(3, 'Pricing & Promotions Policy', 'Link3', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae nulla nostrum consequatur exercitationem eaque nam quibusdam laborum officiis quis laboriosam, hic libero dolor fugiat facere porro architecto impedit debitis possimus dicta aperiam obcaecati! Fuga odio vel quia molestias, officia? Iste explicabo adipisci maiores ex quae quidem ullam repellendus repellat quis. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n<p>Quae nulla nostrum consequatur exercitationem eaque nam quibusdam laborum officiis quis laboriosam, hic libero dolor fugiat facere porro architecto impedit debitis possimus dicta aperiam obcaecati! Fuga odio vel quia molestias, officia? Iste explicabo adipisci maiores ex quae quidem ullam repellendus repellat quis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae nulla nostrum consequatur exercitationem eaque nam quibusdam laborum officiis quis laboriosam, hic libero dolor fugiat facere porro architecto impedit debitis possimus dicta aperiam obcaecati!</p>\r\n<p>Fuga odio vel quia molestias, officia? Iste explicabo adipisci maiores ex quae quidem ullam repellendus repellat quis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae nulla nostrum consequatur exercitationem eaque nam quibusdam laborum officiis quis laboriosam, hic libero dolor fugiat facere porro architecto impedit debitis possimus dicta aperiam obcaecati!</p>\r\n<p>Fuga odio vel quia molestias, officia? Iste explicabo adipisci maiores ex quae quidem ullam repellendus repellat quis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae nulla nostrum consequatur exercitationem eaque nam quibusdam laborum officiis quis laboriosam, hic libero dolor fugiat facere porro architecto impedit debitis possimus dicta aperiam obcaecati! Fuga odio vel quia molestias, officia? Iste explicabo adipisci maiores ex quae quidem ullam repellendus repellat quis. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n<p>Quae nulla nostrum consequatur exercitationem eaque nam quibusdam laborum officiis quis laboriosam, hic libero dolor fugiat facere porro architecto impedit debitis possimus dicta aperiam obcaecati! Fuga odio vel quia molestias, officia? Iste explicabo adipisci maiores ex quae quidem ullam repellendus repellat quis.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `customer_id`, `product_id`) VALUES
(7, 14, 17),
(8, 13, 16),
(9, 13, 17),
(10, 13, 30),
(11, 13, 29),
(12, 13, 31);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `boxes_section`
--
ALTER TABLE `boxes_section`
  ADD PRIMARY KEY (`box_id`);

--
-- Indexes for table `bundle_product_relation`
--
ALTER TABLE `bundle_product_relation`
  ADD PRIMARY KEY (`rel_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `enquiry_type`
--
ALTER TABLE `enquiry_type`
  ADD PRIMARY KEY (`enquiry_id`);

--
-- Indexes for table `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`icon_id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `about_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `boxes_section`
--
ALTER TABLE `boxes_section`
  MODIFY `box_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bundle_product_relation`
--
ALTER TABLE `bundle_product_relation`
  MODIFY `rel_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `enquiry_type`
--
ALTER TABLE `enquiry_type`
  MODIFY `enquiry_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `icons`
--
ALTER TABLE `icons`
  MODIFY `icon_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `manufacturer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `term_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
