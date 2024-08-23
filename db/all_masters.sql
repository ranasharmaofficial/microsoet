-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2022 at 01:21 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopler`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_services`
--

CREATE TABLE `master_services` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `added_by` varchar(6) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin',
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `photos` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail_img` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_provider` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_link` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `overview` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `warranty` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_price` double(20,2) NOT NULL,
  `purchase_price` double(20,2) DEFAULT NULL,
  `variant_product` int(1) NOT NULL DEFAULT 0,
  `attributes` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '[]',
  `choice_options` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `colors` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `variations` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `todays_deal` int(11) NOT NULL DEFAULT 0,
  `published` int(11) NOT NULL DEFAULT 1,
  `approved` tinyint(1) NOT NULL DEFAULT 1,
  `stock_visibility_state` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'quantity',
  `cash_on_delivery` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 = On, 0 = Off',
  `featured` int(11) NOT NULL DEFAULT 0,
  `seller_featured` int(11) NOT NULL DEFAULT 0,
  `current_stock` int(10) NOT NULL DEFAULT 0,
  `unit` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `min_qty` int(11) NOT NULL DEFAULT 1,
  `low_stock_quantity` int(11) DEFAULT NULL,
  `discount` double(20,2) DEFAULT NULL,
  `discount_type` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `discount_start_date` int(11) DEFAULT NULL,
  `discount_end_date` int(11) DEFAULT NULL,
  `tax` double(20,2) DEFAULT NULL,
  `tax_type` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_type` varchar(20) COLLATE utf8_unicode_ci DEFAULT 'flat_rate',
  `shipping_cost` double(20,2) NOT NULL DEFAULT 0.00,
  `is_quantity_multiplied` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 = Mutiplied with shipping cost',
  `est_shipping_days` int(11) DEFAULT NULL,
  `num_of_sale` int(11) NOT NULL DEFAULT 0,
  `meta_title` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pdf` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `rating` double(8,2) NOT NULL DEFAULT 0.00,
  `barcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `digital` int(1) NOT NULL DEFAULT 0,
  `auction_product` int(1) NOT NULL DEFAULT 0,
  `file_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `external_link` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `external_link_btn` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'Buy Now',
  `wholesale_product` int(1) NOT NULL DEFAULT 0,
  `about` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `our_services` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `broucher` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `service_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `service_video_images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `service_video_links` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `service_key` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `service_value` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_employee` int(11) NOT NULL DEFAULT 0,
  `total_projects` int(11) NOT NULL DEFAULT 0,
  `min_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_service_other_infos`
--

CREATE TABLE `master_service_other_infos` (
  `id` bigint(20) NOT NULL,
  `master_service_id` int(11) NOT NULL,
  `key_name` varchar(100) NOT NULL,
  `key_value` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_service_other_infos`
--

INSERT INTO `master_service_other_infos` (`id`, `master_service_id`, `key_name`, `key_value`, `created_at`, `updated_at`) VALUES
(7, 2, 'Rana edited', 'Sharma edited', '2022-10-14 10:43:34', '2022-10-14 10:43:34'),
(8, 2, 'Rana edited', 'Sharma edited', '2022-10-14 10:43:34', '2022-10-14 10:43:34'),
(9, 2, 'Rana edited', 'Sharma edited', '2022-10-14 10:43:34', '2022-10-14 10:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `master_service_taxes`
--

CREATE TABLE `master_service_taxes` (
  `id` int(11) NOT NULL,
  `master_service_id` int(11) NOT NULL,
  `tax_id` int(11) NOT NULL,
  `tax` double(20,2) NOT NULL,
  `tax_type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `master_service_taxes`
--

INSERT INTO `master_service_taxes` (`id`, `master_service_id`, `tax_id`, `tax`, `tax_type`, `created_at`, `updated_at`) VALUES
(7, 2, 4, 0.00, 'amount', '2022-10-14 10:43:34', '2022-10-14 10:43:34'),
(8, 2, 5, 0.00, 'amount', '2022-10-14 10:43:34', '2022-10-14 10:43:34'),
(9, 2, 6, 0.00, 'amount', '2022-10-14 10:43:34', '2022-10-14 10:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `master_service_translations`
--

CREATE TABLE `master_service_translations` (
  `id` bigint(20) NOT NULL,
  `master_service_id` bigint(20) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `master_service_translations`
--

INSERT INTO `master_service_translations` (`id`, `master_service_id`, `name`, `unit`, `description`, `lang`, `created_at`, `updated_at`) VALUES
(1, 0, 'Service Master First One', 'g', 'Service Master First One<p><br></p>', 'en', '2022-10-14 09:41:09', '2022-10-14 09:41:09'),
(2, 0, 'Service Master Second One', 'g', 'Service Master Second One<p><br></p>', 'en', '2022-10-14 09:47:26', '2022-10-14 09:47:26'),
(3, 0, 'Service Master Second One edited', 'g', 'Service Master Second One&nbsp;edited<p><br></p>', 'en', '2022-10-14 10:43:34', '2022-10-14 10:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `related_service_masters`
--

CREATE TABLE `related_service_masters` (
  `id` int(11) NOT NULL,
  `master_service_id` int(11) NOT NULL,
  `items_id` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `related_service_masters`
--

INSERT INTO `related_service_masters` (`id`, `master_service_id`, `items_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, '1', 0, '2022-10-14 09:47:26', '2022-10-14 09:47:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_services`
--
ALTER TABLE `master_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `tags` (`tags`(255)),
  ADD KEY `unit_price` (`unit_price`),
  ADD KEY `created_at` (`created_at`);

--
-- Indexes for table `master_service_other_infos`
--
ALTER TABLE `master_service_other_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_service_taxes`
--
ALTER TABLE `master_service_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_service_translations`
--
ALTER TABLE `master_service_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `related_service_masters`
--
ALTER TABLE `related_service_masters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_services`
--
ALTER TABLE `master_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_service_other_infos`
--
ALTER TABLE `master_service_other_infos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `master_service_taxes`
--
ALTER TABLE `master_service_taxes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `master_service_translations`
--
ALTER TABLE `master_service_translations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `related_service_masters`
--
ALTER TABLE `related_service_masters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
