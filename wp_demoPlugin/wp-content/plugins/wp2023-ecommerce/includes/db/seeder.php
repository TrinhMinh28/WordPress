<?php
//Thêm dl mẫu vào

global $wpdb;
$tbl_orders = $wpdb->prefix.'wp2023_orders';
$tbl_orders_detail  = $wpdb->prefix . 'wp2023_orders_detail'; //wp_wp2023_orders_detail

$orders = [
    // lưu ý dấu dách sau =>
    [
        'created' => '2023-04-05',
        'total' => 45000,
        'status' => 'completed',
        'payment_method' => 'Cod',
        'customer_name' => 'Văn A',
        'customer_phone' => '1234',
        'customer_email' => 'minhtrinh@gmail.com',
        'address' => 'Hà Nội',
        'note' => 'Đây là note',
    ],
    [
        'created' => '2023-04-05',
        'total' => 45000,
        'status' => 'completed',
        'payment_method' => 'Cod',
        'customer_name' => 'Văn B',
        'customer_phone' => '1234',
        'customer_email' => 'minhtrinh@gmail.com',
        'address' => 'Hà Nam',
        'note' => 'Đây là note',
    ],
    [
        'created' => '2023-04-05',
        'total' => 45000,
        'status' => 'completed',
        'payment_method' => 'Cod',
        'customer_name' => 'Văn C',
        'customer_phone' => '1234',
        'customer_email' => 'minhtrinh@gmail.com',
        'address' => 'Hòa Bình',
        'note' => 'Đây là note',
    ],
];

foreach ($orders as $order) {
    $wpdb->insert($tbl_orders, $order);
}

$order_details = [
    [
        'quantity' => 14,
        'price' => 10000,
        'product_id' => 55,
        'order_id' => 1,
    ],
    [
        'quantity' => 6,
        'price' => 15000,
        'product_id' => 56,
        'order_id' => 2,
    ],
    [
        'quantity' => 6,
        'price' => 18000,
        'product_id' => 48,
        'order_id' => 3,
    ]
];

foreach ($order_details as $order_detail) {
    $wpdb->insert($tbl_orders_detail, $order_detail);
}