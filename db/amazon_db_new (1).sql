-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2018 at 06:34 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amazon_db_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `adb_ads`
--

CREATE TABLE `adb_ads` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `details` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `position` enum('1=side','2=middle','','') NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `adb_banners`
--

CREATE TABLE `adb_banners` (
  `id` int(11) NOT NULL,
  `parent_cat_id` int(11) NOT NULL,
  `child_cat_id` int(11) NOT NULL,
  `banner_title` varchar(250) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `banner_description` text NOT NULL,
  `banner_image` varchar(250) NOT NULL,
  `type` enum('1=box','2=long vertical','3=long horizontal','') NOT NULL,
  `alt` varchar(250) NOT NULL,
  `status` bit(2) NOT NULL,
  `tag` varchar(250) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adb_banners`
--

INSERT INTO `adb_banners` (`id`, `parent_cat_id`, `child_cat_id`, `banner_title`, `slug`, `banner_description`, `banner_image`, `type`, `alt`, `status`, `tag`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 16, 0, 'dsds', 'dsds', 'dsd', '', '1=box', '', b'01', '', 1, '2018-08-30 06:22:02', 1, '2018-08-30 06:22:02'),
(3, 11, 0, 'ffdf', 'ffdf', '<div class=\"alignleft\">\r\n     <script type=\"text/javascript\">\r\n       	amzn_assoc_ad_type = \"banner\";\r\n	amzn_assoc_marketplace = \"amazon\";\r\n	amzn_assoc_region = \"US\";\r\n	amzn_assoc_placement = \"assoc_banner_placement_default\";\r\n	amzn_assoc_campaigns = \"babyregistry\";\r\n	amzn_assoc_banner_type = \"category\";\r\n	amzn_assoc_p = \"12\";\r\n	amzn_assoc_isresponsive = \"false\";\r\n	amzn_assoc_banner_id = \"17XP6BCTHKA75335G382\";\r\n	amzn_assoc_width = \"300\";\r\n	amzn_assoc_height = \"250\";\r\n	amzn_assoc_tracking_id = \"getconsumerpr-20\";\r\n	amzn_assoc_linkid = \"06fa86b5338c9e949e426af56951028e\";\r\n     </script>\r\n     <script src=\"//z-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&Operation=GetScript&ID=OneJS&WS=1\"></script>\r\n    </div>', '', '1=box', '', b'01', '', 1, '2018-08-30 06:23:56', 1, '2018-08-30 06:23:56');

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
(1, 0, 'Computers & Electronics', 'computers-electronics', '', '', 1, 1, 1, NULL, '2018-08-07 13:15:25', NULL),
(3, 0, 'Home', 'home', '', NULL, 1, 1, 1, NULL, '2018-08-07 13:47:00', NULL),
(4, 0, 'Fashion &amp; Jewellery', 'fashion-jewellery', '', NULL, 1, 1, 1, NULL, '2018-08-27 19:35:40', NULL),
(5, 0, 'Home Appliance', 'home-appliance', '', NULL, 1, 1, 1, NULL, '2018-08-28 03:54:45', NULL),
(6, 0, 'Kitchen &amp; Dining', 'kitchen-dining', '', NULL, 1, 1, 1, NULL, '2018-08-29 08:48:04', NULL),
(7, 0, 'Health &amp; Beauty', 'health-beauty', '', NULL, 1, 1, 1, NULL, '2018-08-29 08:48:13', NULL),
(8, 0, 'Fitness &amp; Sports', 'fitness-sports', '', NULL, 1, 1, 1, NULL, '2018-08-29 08:48:19', NULL),
(10, 0, 'Baby &amp; Kids', 'baby-kids', '', NULL, 1, 1, 1, NULL, '2018-08-29 08:48:41', NULL),
(11, 0, 'Gifts', 'gifts', '', NULL, 1, 1, 1, NULL, '2018-08-29 08:48:49', NULL),
(12, 0, 'wearables', 'wearables', '', NULL, 1, 1, 1, NULL, '2018-08-29 08:49:14', NULL),
(13, 1, 'Camera', 'camera', '', NULL, 1, 1, 1, NULL, '2018-08-29 08:49:39', NULL),
(14, 11, 'Christmas Gifts', 'christmas-gifts', '', NULL, 1, 1, 1, NULL, '2018-08-29 08:49:49', NULL),
(15, 11, 'Aniversary Gifts', 'aniversary-gifts', '', NULL, 1, 1, 1, NULL, '2018-08-29 08:49:59', NULL),
(16, 0, 'Family &amp; Pets', 'family-pets', '', NULL, 1, 1, 1, NULL, '2018-08-29 08:50:06', NULL),
(17, 11, 'Hobby Crafts', 'hobby-crafts', '', NULL, 1, 1, 1, NULL, '2018-08-29 08:50:14', NULL),
(18, 1, 'My Shaves', 'my-shaves', '', NULL, 1, 1, 1, NULL, '2018-08-29 08:50:28', NULL),
(19, 1, 'Automotive', 'automotive', '', NULL, 1, 1, 1, NULL, '2018-08-29 08:50:38', NULL),
(20, 0, 'Indoors &amp; Outdoors', 'indoors-outdoors', '', NULL, 1, 1, 1, NULL, '2018-08-29 08:50:47', NULL),
(21, 0, 'Office', 'office', '', NULL, 1, 1, 1, NULL, '2018-08-29 08:50:53', NULL),
(22, 0, 'Travels', 'travels', '', NULL, 1, 1, 1, NULL, '2018-08-29 08:51:54', NULL),
(23, 21, 'Office Decoration', 'office-decoration', '', NULL, 1, 1, 1, NULL, '2018-08-29 08:52:05', NULL),
(24, 4, 'Clothing', 'clothing', '', NULL, 1, 1, 1, NULL, '2018-08-29 08:52:33', NULL),
(25, 0, 'Shoes', 'shoes', '', NULL, 1, 1, 1, NULL, '2018-08-29 08:53:06', NULL),
(26, 1, 'Watches', 'watches', '', NULL, 1, 1, 1, NULL, '2018-08-29 08:53:31', NULL),
(27, 0, 'Health and Beauty', 'health-and-beauty', '', NULL, 1, 1, 1, NULL, '2018-08-29 08:53:41', NULL),
(28, 0, 'Home and Garden', 'home-and-garden', '', NULL, 1, 1, 1, NULL, '2018-08-29 08:53:51', NULL);

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
  `tagslug` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` int(4) NOT NULL,
  `updated_by` int(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adb_product_list`
--

INSERT INTO `adb_product_list` (`id`, `parent_cat_id`, `child_cat_id`, `title`, `description`, `slug`, `image_url`, `price`, `discount_price`, `discount_percentage`, `product_url`, `is_store`, `tag`, `tagslug`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'Gourmia GSV138 Digital Sous Vide Machine Pod Immersion Circulator Cooker - Powerful 1200 Watts Motor - Digital Timer Display - Black - Includes Free Recipe Cookbook', '', 'gourmia-gsv138-digital-sous-vide-machine-pod-immersion-circulator-cooker--powerful-1200-watts-motor--digital-timer-display--black--includes-free-recipe-cookbook', 'https://images-na.ssl-images-amazon.com/images/I/71B%2BGiROEYL._SX569_.jpg', '10$', '0.00', '0.00', 'https://www.amazon.com/Gourmia-Digital-Machine-Immersion-Circulator/dp/B076JKGTZF?ref_=Oct_DLandingS_PC_NA_NA', 1, NULL, '', 1, 1, NULL, '2018-08-10 09:52:38', NULL),
(2, 1, 0, 'AmazonBasics Lightning to USB A Cable - Apple MFi Certified - White - 6 Feet/1.8 Meters', '', 'amazonbasics-lightning-to-usb-a-cable--apple-mfi-certified-white-6-feet18-meters', 'https://images-na.ssl-images-amazon.com/images/I/51Wj4dJ4uVL._SX679_.jpg', '19.47$', '0.00', '0.00', 'https://www.amazon.com/gp/product/B010S9N6OO/ref=s9_acsd_top_hd_bw_b2Y4ZnX_c_x_w?pf_rd_m=ATVPDKIKX0DER&pf_rd_s=merchandised-search-5&pf_rd_r=3SYJFFAV24JJJY1061Q0&pf_rd_t=101&pf_rd_p=b5ae34b4-3d2a-5e2e-a47a-a5fd6c656f71&pf_rd_i=2335752011', 1, NULL, '', 1, 1, NULL, '2018-08-10 09:55:30', NULL),
(3, 5, 0, 'Instant Pot Duo Mini 3 Qt 7-in-1 Multi- Use Programmable Pressure Cooker, Slow Cooker, Rice Cooker, Steamer, Sauté, Yogurt Maker and Warmer', '', 'instant-pot-duo-mini-3-qt-7-in-1-multi-use-programmable-pressure-cooker-slow-cooker-rice-cooker-steamer-saut-yogurt-maker-and-warmer', 'https://images-na.ssl-images-amazon.com/images/I/71l1LsEpOaL._SX569_.jpg', '79.95', '', '', 'https://www.amazon.com/gp/product/B07DDDG669/ref=as_li_ss_tl?ie=UTF8&linkCode=ll1&tag=getconsumerpr-20&linkId=70952416ba0c6cc6b0f9ebff618f695d', 1, 'appliance', '', 1, 1, NULL, '2018-08-28 10:15:32', NULL),
(4, 5, 0, 'Steamer For Clothes, Handheld Clothes Steamers.4-in-1 Powerful Steamer Wrinkle Remover. Clean, Sterilize and Steamer Garment and Soft Fabric. Portable, Compact-Travel/Home.Ultrafast-100% Safe - isteam', '', 'steamer-for-clothes-handheld-clothes-steamers4-in-1-powerful-steamer-wrinkle-remover-clean-sterilize-and-steamer-garment-and-soft-fabric-portable-compact-travelhomeultrafast-100-safe--isteam', 'https://images-na.ssl-images-amazon.com/images/I/71DMmyGuWxL._SX679_.jpg', '2789', '', '', 'https://www.amazon.com/dp/B072PY74HY/ref=as_li_ss_tl?psc=1&pd_rd_i=B072PY74HY&pf_rd_m=ATVPDKIKX0DER&pf_rd_p=a54d13fc-b8a1-4ce8-b285-d77489a09cf6&pf_rd_r=WNGCYMKYGQAVRWTJ4T0S&pd_rd_wg=b5lWz&pf_rd_s=desktop-dp-sims&pf_rd_t=40701&pd_rd_w=xKkUV&pf_rd_i=desktop-dp-sims&pd_rd_r=8efdaf6c-aab6-11e8-8742-171', 1, '', '', 1, 1, NULL, '2018-08-28 12:59:53', NULL),
(5, 5, 0, 'ZENY 6 Qt 14-in-1 Multi- Use Programmable Pressure Cooker Stainless Steel Electric Pressure Cooker 1000W w/LED Display Screen, Rice Cooker, Sauté, Steamer, Slow Cooker, Yogurt Maker & Food Warmer', '', 'zeny-6-qt-14-in-1-multi-use-programmable-pressure-cooker-stainless-steel-electric-pressure-cooker-1000w-wled-display-screen-rice-cooker-saut-steamer-slow-cooker-yogurt-maker-food-warmer', 'https://images-na.ssl-images-amazon.com/images/I/71l1LsEpOaL._SX425_.jpg', '51.89', '', '', 'https://www.amazon.com/gp/product/B06Y1YD5W7/ref=as_li_ss_tl?ie=UTF8&th=1&linkCode=ll1&tag=getconsumerpr-20&linkId=e1d57cf71887ee2acc4c0388d3d389d2', 1, 'Pressure Cooker', '', 1, 1, NULL, '2018-08-28 13:03:39', NULL),
(6, 5, 0, 'Mealthy MultiPot 9-in-1 Programmable Pressure Cooker 6 Quarts with Stainless Steel Pot, Steamer Basket, instant access to recipe app. Pressure cook, slow cook, sauté, rice cooker, yogurt, steam', '', 'mealthy-multipot-9-in-1-programmable-pressure-cooker-6-quarts-with-stainless-steel-pot-steamer-basket-instant-access-to-recipe-app-pressure-cook-slow-cook-saut-rice-cooker-yogurt-steam', 'https://images-na.ssl-images-amazon.com/images/I/61eM5ZNt7sL._SX569_.jpg', '99.95', '', '', 'https://www.amazon.com/dp/B076QJNK8G/ref=as_li_ss_tl?psc=1&pd_rd_i=B076QJNK8G&pf_rd_m=ATVPDKIKX0DER&pf_rd_p=a54d13fc-b8a1-4ce8-b285-d77489a09cf6&pf_rd_r=PZMHA3T07A4EKY674YCD&pd_rd_wg=ro0Bb&pf_rd_s=desktop-dp-sims&pf_rd_t=40701&pd_rd_w=7cKTY&pf_rd_i=desktop-dp-sims&pd_rd_r=0e283dd2-aab9-11e8-a16e-f16', 1, 'Pressure Cooker', 'pressure-cooker', 1, 1, NULL, '2018-08-28 13:05:15', NULL);

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
-- Indexes for table `adb_ads`
--
ALTER TABLE `adb_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adb_banners`
--
ALTER TABLE `adb_banners`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `adb_ads`
--
ALTER TABLE `adb_ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `adb_banners`
--
ALTER TABLE `adb_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `adb_nav_menu`
--
ALTER TABLE `adb_nav_menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `adb_product_list`
--
ALTER TABLE `adb_product_list`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `adb_users`
--
ALTER TABLE `adb_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
