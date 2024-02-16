<?php
// add_action('admin_post_save_wp2023_settings', 'wp2023_save_settings');
// function wp2023_save_settings()
// {
if (!current_user_can('manage_options')) {
    wp_die('Bạn không có quyền truy cập vào trang này!');
}
$wp2023_settings_filed_name = isset($_GET['settings-updated']) ? $_GET['settings-updated'] : 'base';
pr($wp2023_settings_filed_name);
// update_option('wp2023_settings_options', $wp2023_settings_filed_name);
if ($wp2023_settings_filed_name == 'base' ) {
    
   
} else if ($wp2023_settings_filed_name == true) {
    // Thêm thông báo lưu thành công khi giá trị của trường cài đặt hợp lệ
    add_settings_error(
        'wp2023_settings_page',
        'wp2023_settings_saved',
        __('Các cài đặt đã được lưu thành công.', 'wp2023'),
        'updated'
    );
} 
    else if ($wp2023_settings_filed_name != true) {
    // Thêm thông báo lưu thành công khi giá trị của trường cài đặt hợp lệ
    add_settings_error(
        'wp2023_settings_page',
        'wp2023_settings_saved',
        __('Các cài đặt đã được lưu thành công.', 'wp2023'),
        'updated'
    );
} 

// Hiển thị các thông báo lỗi hoặc lưu thành công
settings_errors('wp2023_settings_page');
// }
?>
<div class="wrap">
    <h1>WP2023 Settings</h1>
    <form method="post" action="options.php">
        <?php
        settings_fields('wp2023_settings_page');
        do_settings_sections('wp2023_settings_page');
        submit_button('Lưu Lại');
        ?>
    </form>
</div>
<script>
    // jQuery(document).ready(function($) {
    //     // Kiểm tra giá trị của trường cài đặt sau khi người dùng nhấn nút "Save Changes"
    //     $('form').on('submit', function() {
    //         var value = $('#options').val();
    //         console.log(value);
    //         if (!value) {
    //             // Hiển thị hộp thoại thông báo nếu giá trị của trường cài đặt không tồn tại
    //             alert('Giá trị của trường cài đặt không hợp lệ.');
    //             return false; // Ngăn chặn gửi biểu mẫu nếu giá trị không hợp lệ
    //         }
    //         else {
    //             wp_die( 'Dữ liệu đã được ghi thành công vào cơ sở dữ liệu!' ); 
    //         }
    //     });
    // });
    // 
</script>