/* 07-12-2022 by subhash */
ALTER TABLE `users` DROP INDEX `users_email_unique`;
ALTER TABLE `ebb`.`users` ADD INDEX `email_user_type` (`email`, `user_type`);
ALTER TABLE `ebb`.`users` ADD INDEX `phone_user_type` (`phone`, `user_type`);

/* 09 December 2022 by Avinash Singh */
DROP TABLE `service_enquiries`;

CREATE TABLE `service_enquiries` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL DEFAULT 0,
  `vendor_id` bigint(20) NOT NULL DEFAULT 0,
  `service_id` bigint(20) NOT NULL DEFAULT 0,
  `service_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `nature_work` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `property_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gst` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additional_info` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
ALTER TABLE `service_enquiries`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `service_enquiries`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

/* 10-12-2022 by subhash */
update `product_master_translations` as pmt set name=(select name from product_masters where id = pmt.product_id),description=(select description from product_masters where id = pmt.product_id);

/* 12 December 2022 by Avinash Singh */
ALTER TABLE `services` ADD `working_exp` INT(3) NOT NULL DEFAULT '1' AFTER `min_order`;
/* 18-12-2022 by subhash */
ALTER TABLE `sellers` CHANGE `secondary_business` `secondary_business` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL;

/* 20 December 2022 by Avinash Singh */
ALTER TABLE `categories` ADD `is_form_field` TINYINT(1) NOT NULL DEFAULT '0' AFTER `slug`, ADD `form_fields` TEXT NULL DEFAULT NULL AFTER `is_form_field`;

/* 21 December 2022 by Avinash Singh */
ALTER TABLE `service_enquiries` CHANGE `gst` `alternate_no` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL;

/* 23-12-2022 By Subhash */
ALTER TABLE `users` ADD `forgot_password_key` VARCHAR(50) NULL DEFAULT NULL AFTER `password`;

/* 30-12-2022 By Subhash */
CREATE TABLE seller_category_update_requests (
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
  user_id INTEGER DEFAULT 0,
  vendor_type VARCHAR(200) DEFAULT NULL,
  product_category_ids VARCHAR(500) DEFAULT NULL,
  service_category_ids VARCHAR(500) DEFAULT NULL,
  status TINYINT(1) DEFAULT 1 COMMENT "1 => active, 2 => completed, 3 => updated",
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
ALTER TABLE `seller_category_update_requests` CHANGE `status` `status` TINYINT(1) NULL DEFAULT '1' COMMENT '1 => active, 2 => approved, 3 => updated, 4 => declined';

/* 04 Jan 2023 by AviSingh*/
ALTER TABLE `service_enquiries` CHANGE `gst` `phone` VARCHAR(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL;

ALTER TABLE `service_orders` ADD `service_type` VARCHAR(255) NULL AFTER `shipping_address`, ADD `common_info` TEXT NULL AFTER `service_type`;

-- ==================   Updated on server by AviSingh ===============

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `first_category_id` int(11) NOT NULL,
  `second_category_id` int(11) NOT NULL,
  `third_category_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1=Active, 0=Inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
ALTER TABLE `services` ADD `type_id` INT NOT NULL DEFAULT '0' AFTER `category_id`;
ALTER TABLE `master_services` ADD `type_id` INT NOT NULL DEFAULT '0' AFTER `category_id`;


ALTER TABLE `product_masters` ADD `item_weight` VARCHAR(100) NOT NULL AFTER `user_id`, ADD `item_unit` VARCHAR(100) NOT NULL AFTER `item_weight`;

ALTER TABLE `order_details` ADD `length` VARCHAR(100) NULL AFTER `product_referral_code`, ADD `breadth` VARCHAR(100) NULL AFTER `length`, ADD `height` VARCHAR(100) NULL AFTER `breadth`, ADD `item_weight` VARCHAR(100) NULL AFTER `height`, ADD `ship_order_id` VARCHAR(100) NULL AFTER `item_weight`, ADD `shipment_id` VARCHAR(100) NULL AFTER `ship_order_id`, ADD `status_code` VARCHAR(100) NULL AFTER `shipment_id`;

CREATE TABLE `ship_rockets` ( `id` bigint(20) NOT NULL, `first_name` varchar(100) NOT NULL, `last_name` varchar(100) NOT NULL, `email` varchar(100) NOT NULL, `password` varchar(100) NOT NULL, `company_id` varchar(100) NOT NULL, `token` text NOT NULL, `created_at` timestamp NOT NULL DEFAULT current_timestamp(), `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp() ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `ship_rockets` ADD PRIMARY KEY (`id`);
ALTER TABLE `ship_rockets` MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

CREATE TABLE `shipping_managements` (
  `id` bigint(20) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `pincode` varchar(100) NOT NULL,
  `shipment` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `shipping_managements`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `shipping_managements`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;


CREATE TABLE `sitemaps` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `sitemaps`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `sitemaps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

-- FInal Chnages
ALTER TABLE `order_details` ADD `cancellation_reason` VARCHAR(255) NULL DEFAULT NULL AFTER `status_code`;
ALTER TABLE `order_details` ADD `cancellation_time` DATETIME NULL DEFAULT NULL AFTER `cancellation_reason`;


