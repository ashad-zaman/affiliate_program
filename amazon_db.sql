-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2018 at 12:41 PM
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
-- Database: `amazon_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `adb_nav_menu`
--

CREATE TABLE `adb_nav_menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `cat_parent_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `slug` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `cat_child_group_by_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `cat_icon` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `is_position` tinyint(1) NOT NULL COMMENT '1 = top nav, 2 = side category nav',
  `status` tinyint(1) NOT NULL,
  `created_by` int(4) NOT NULL,
  `updated_by` int(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adb_nav_menu`
--

INSERT INTO `adb_nav_menu` (`id`, `cat_parent_id`, `name`, `slug`, `cat_child_group_by_name`, `cat_icon`, `is_position`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 0, 'Electronics', 'electronics', '', NULL, 1, 1, 1, NULL, '2018-08-07 13:15:25', NULL),
(3, 0, 'Home', 'home', '', NULL, 1, 1, 1, NULL, '2018-08-07 13:47:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `adb_product_list`
--

CREATE TABLE `adb_product_list` (
  `id` int(11) UNSIGNED NOT NULL,
  `parent_cat_id` int(11) UNSIGNED NOT NULL,
  `child_cat_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `slug` varchar(300) NOT NULL,
  `image_url` varchar(300) NOT NULL,
  `price` varchar(10) NOT NULL,
  `discount_price` varchar(10) DEFAULT NULL,
  `discount_percentage` varchar(4) DEFAULT NULL,
  `product_url` varchar(300) NOT NULL,
  `is_store` tinyint(1) NOT NULL COMMENT '1 = amazon, 2 = ebay, 3 = ali baba, 4 = ali express ',
  `tag` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` int(4) NOT NULL,
  `updated_by` int(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adb_product_list`
--

INSERT INTO `adb_product_list` (`id`, `parent_cat_id`, `child_cat_id`, `title`, `description`, `slug`, `image_url`, `price`, `discount_price`, `discount_percentage`, `product_url`, `is_store`, `tag`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'Gourmia GSV138 Digital Sous Vide Machine Pod Immersion Circulator Cooker - Powerful 1200 Watts Motor - Digital Timer Display - Black - Includes Free Recipe Cookbook', '', 'gourmia-gsv138-digital-sous-vide-machine-pod-immersion-circulator-cooker--powerful-1200-watts-motor--digital-timer-display--black--includes-free-recipe-cookbook', 'https://images-na.ssl-images-amazon.com/images/I/71B%2BGiROEYL._SX569_.jpg', '10$', '0.00', '0.00', 'https://www.amazon.com/Gourmia-Digital-Machine-Immersion-Circulator/dp/B076JKGTZF?ref_=Oct_DLandingS_PC_NA_NA', 1, NULL, 0, 1, NULL, '2018-08-10 09:52:38', NULL),
(2, 1, 0, 'AmazonBasics Lightning to USB A Cable - Apple MFi Certified - White - 6 Feet/1.8 Meters', '', 'amazonbasics-lightning-to-usb-a-cable--apple-mfi-certified-white-6-feet18-meters', 'https://images-na.ssl-images-amazon.com/images/I/51Wj4dJ4uVL._SX679_.jpg', '19.47$', '0.00', '0.00', 'https://www.amazon.com/gp/product/B010S9N6OO/ref=s9_acsd_top_hd_bw_b2Y4ZnX_c_x_w?pf_rd_m=ATVPDKIKX0DER&pf_rd_s=merchandised-search-5&pf_rd_r=3SYJFFAV24JJJY1061Q0&pf_rd_t=101&pf_rd_p=b5ae34b4-3d2a-5e2e-a47a-a5fd6c656f71&pf_rd_i=2335752011', 1, NULL, 1, 1, NULL, '2018-08-10 09:55:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `adb_users`
--

CREATE TABLE `adb_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `l_name` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) CHARACTER SET utf8 NOT NULL,
  `role` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adb_users`
--

INSERT INTO `adb_users` (`id`, `f_name`, `l_name`, `email`, `username`, `password`, `role`, `status`, `created_by`, `created_at`) VALUES
(1, 'sajib', 'mridha', 'sajib@gmail.com', 'ksajib', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, 0, '2018-08-07 07:40:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adb_nav_menu`
--
ALTER TABLE `adb_nav_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adb_product_list`
--
ALTER TABLE `adb_product_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adb_users`
--
ALTER TABLE `adb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adb_nav_menu`
--
ALTER TABLE `adb_nav_menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `adb_product_list`
--
ALTER TABLE `adb_product_list`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `adb_users`
--
ALTER TABLE `adb_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
