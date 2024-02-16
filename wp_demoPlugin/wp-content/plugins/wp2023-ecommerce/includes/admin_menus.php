<?php
add_action('admin_menu','wp2023_admin_menu');
function wp2023_admin_menu(){
    // thêm menu cha
    add_menu_page(
        'Word press 2023',
        'Word press 2023',
        'manage_options',
        'wp2023',
        'wp_admin_page_dasboard',
        'dashicons-admin-page',
        25         //vị trí thanh menu.
    );
    add_submenu_page(
        'wp2023',
        'Quản lý đơn hàng',
        'Đơn hàng',
        'manage_options',
        'wp2023-orders',
        $callback = 'wp_admin_page_orders',
        $position = 26
    );
    add_submenu_page(
        'wp2023',
        'Quản lý Cấu hình',
        'Cấu hình',
        'manage_options',
        'wp2023-settings',
        $callback = 'wp_admin_page_settings',
        $position = 26
    );
}
function wp_admin_page_dasboard(){
    include_once WP2023_PART.'includes/admin_pages/dashboard.php';
}
function wp_admin_page_orders(){
    
    include_once WP2023_PART.'includes/admin_pages/orders.php';
}
// cấu hình chứa html
function wp_admin_page_settings(){
    include_once WP2023_PART.'includes/admin_pages/settings.php';
}