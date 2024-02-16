<?php
  // đăng ký post_types và taxonomy
  // gọi tới post file
  include_once WP2023_PART.'includes/post_types.php';

  // Đăng ký metabox 
  include_once WP2023_PART.'includes/metaboxes.php';

  // Thêm cột vào post type và custom taxonomy 
  include_once WP2023_PART.'includes/admin_columns.php';
  
  // Tạo menu cho admin
  include_once WP2023_PART.'includes/admin_menus.php';
  // Làm việc với cơ sở dữ liệu
  include_once WP2023_PART.'includes/classes/wp2023Order.php';
// Đăng ký dùng ...
  include_once WP2023_PART.'includes/functions.php';
  // Khai báo ajax php
  include_once WP2023_PART.'includes/admin_ajaxs.php';
  // Chỉnh sửa setting cho admin
  include_once WP2023_PART.'includes/admin_settings.php';
  // APIful cho website
  include_once WP2023_PART.'includes/apis.php';

