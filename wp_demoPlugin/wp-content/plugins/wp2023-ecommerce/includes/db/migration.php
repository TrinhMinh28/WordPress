<?php
//Tạo bảng
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
// Dbdeta
global $wpdb;
$tbl_orders = $wpdb->prefix . 'wp2023_orders'; //wp_wp2023_orders
$charset_collate = $wpdb->get_charset_collate("ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci");
$tbl_orders_detail  = $wpdb->prefix . 'wp2023_orders_detail'; //wp_wp2023_orders_detail


$sql = "
CREATE TABLE `$tbl_orders` (
    `id` int NOT NULL AUTO_INCREMENT,
    `created` date DEFAULT NULL,
    `total` double DEFAULT NULL,
    `status` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT 'pending',
    `payment_method` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
    `customer_name` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
    `customer_phone` varchar(20) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
    `customer_email` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
    `address` text COLLATE utf8mb4_vietnamese_ci,
    `note` text COLLATE utf8mb4_vietnamese_ci,
    `deleted` tinyint NOT NULL DEFAULT '0',
    PRIMARY KEY (id)
  )" . $charset_collate . ";";
dbDelta($sql);
$sql = "
CREATE TABLE {$tbl_orders_detail} (
    `id` int NOT NULL AUTO_INCREMENT,
    `quantity` int DEFAULT NULL,
    `price` double DEFAULT NULL,
    `product_id` bigint UNSIGNED NOT NULL,
    `order_id` int DEFAULT NULL,
    PRIMARY KEY (id),
    KEY `product_id` (`product_id`),
    KEY `order_id` (`order_id`),
    CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `wp_posts` (`ID`),
    CONSTRAINT `fk_order_id` FOREIGN KEY (`order_id`) REFERENCES `wp_orders` (`id`)
) {$charset_collate};";
dbDelta($sql);
