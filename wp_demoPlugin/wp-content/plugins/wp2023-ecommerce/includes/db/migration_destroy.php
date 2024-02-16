<?php
global $wpdb;

$tbl_orders = $wpdb->prefix . 'wp2023_orders'; //wp_wp2023_orders
$tbl_orders_detail  = $wpdb->prefix . 'wp2023_orders_detail'; //wp_wp2023_orders_detail


//$wpdb-> query(" DROP TABLE IF EXISTS {$wpdb->prefix} mytable");

// xóa bảng có chứa khóa ngoại trước
$sql =" DROP TABLE IF EXISTS $tbl_orders_detail";
$wpdb-> query($sql);

$sql =" DROP TABLE IF EXISTS $tbl_orders";
$wpdb-> query($sql);

