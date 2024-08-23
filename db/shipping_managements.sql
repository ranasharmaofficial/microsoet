
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

