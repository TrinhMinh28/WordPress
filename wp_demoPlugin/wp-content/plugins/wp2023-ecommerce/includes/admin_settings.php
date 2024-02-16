<?php
// Đăng ký cấu hình 
/*
 $option_group :wp2023_settings_page
 $option_name  :wp2023_settings_options

 //value="<?=$options[$args['label_for']];?>"

 wp2023_settings_options_shop_info : 'My Plugin Thông tin Cửa Hàng',
 wp2023_settings_filed_name: Tên cửa hàng
 wp2023_settings_filed_phone: Số điện thoại
 wp2023_settings_filed_mail: Địa chỉ mail

 wp2023_settings_options_shop_payment : 'My Plugin Thông Tài khoản',
 wp2023_settings_filed_bank_name: Tên Ngân hàng
 wp2023_settings_filed_number: Số Tài khoản
 wp2023_settings_filed_bank_user: Tên Tài Khoản
 */

add_action('admin_init', 'wp2023_settings_init');
function wp2023_settings_init()
{
    /*
    register_setting('wporg','wporg_options');
        add_settings_section( 'my-plugin-section', 'My Plugin Settings', 'my_plugin_section_callback', 'my-plugin-settings' );
        add_settings_field( 'my-plugin-setting-1', 'Setting 1', 'my_plugin_setting_1_callback', 'my-plugin-settings', 'my-plugin-section' );
     */
    register_setting('wp2023_settings_page', 'wp2023_settings_options');
    add_settings_section(
        'wp2023_settings_options_shop_info',
        'My Plugin Thông tin Cửa Hàng',
        'wp2023_settings_options_shop_info_callback',
        'wp2023_settings_page'
    );

    add_settings_field(
        'wp2023_settings_filed_name',
        'Tên Khách hàng ',
        'wp2023_settings_filed_name_callback',
        'wp2023_settings_page',
        'wp2023_settings_options_shop_info',
        [
            'label_for' => 'wp2023_settings_filed_name',
            'type' => 'textarea',
            'class' => 'wp2023-settings-field',
            'description' => 'Nhập tên cửa hàng của bạn',
            'default' => 'Tên cửa hàng của tôi'
        ]
    );
    add_settings_field(
        'wp2023_settings_filed_phone',
        'Số điện thoại',
        'wp2023_settings_filed_name_callback',
        'wp2023_settings_page',
        'wp2023_settings_options_shop_info',
        [
            'label_for' => 'wp2023_settings_filed_phone',
            'type' => 'textarea',
            'class' => 'wp2023-settings-field',
            'description' => 'Nhập tên cửa hàng của bạn',
            'default' => 'Tên cửa hàng của tôi'
        ]
    );
    add_settings_field(
        'wp2023_settings_filed_email',
        'Email',
        'wp2023_settings_filed_name_callback',
        'wp2023_settings_page',
        'wp2023_settings_options_shop_info',
        [
            'label_for' => 'wp2023_settings_filed_email',
            'type' => 'textarea',
            'class' => 'wp2023-settings-field',
            'description' => 'Nhập tên cửa hàng của bạn',
            'default' => 'Tên cửa hàng của tôi'
        ]
    );
    // Filed thứ hai
    add_settings_section(
        'wp2023_settings_options_shop_payment',
        'Thông tin Ngân hàng',
        'wp2023_settings_options_shop_payment_callback',
        'wp2023_settings_page'
    );
    add_settings_field(
        'wp2023_settings_filed_bank_name',
        'Tên Ngân hàng',
        'wp2023_settings_filed_name_callback',
        'wp2023_settings_page',
        'wp2023_settings_options_shop_payment',
        [
            'label_for' => 'wp2023_settings_filed_bank_name',
            'type' => 'textarea',
            'class' => 'wp2023-settings-field',
            'description' => 'Nhập tên cửa hàng của bạn',
            'default' => 'Tên cửa hàng của tôi'
        ]
    );
    add_settings_field(
        'wp2023_settings_filed_bank_number',
        'Số Tài Khoản',
        'wp2023_settings_filed_name_callback',
        'wp2023_settings_page',
        'wp2023_settings_options_shop_payment',
        [
            'label_for' => 'wp2023_settings_filed_bank_number',
            'type' => 'textarea',
            'class' => 'wp2023-settings-field',
            'description' => 'Nhập tên cửa hàng của bạn',
            'default' => 'Tên cửa hàng của tôi'
        ]
    );
    add_settings_field(
        'wp2023_settings_filed_bank_user',
        'Tên Tài Khoản',
        'wp2023_settings_filed_name_callback',
        'wp2023_settings_page',
        'wp2023_settings_options_shop_payment',
        [
            'label_for' => 'wp2023_settings_filed_bank_user',
            'type' => 'textarea',
            'class' => 'wp2023-settings-field',
            'description' => 'Nhập tên cửa hàng của bạn',
            'default' => 'Tên cửa hàng của tôi'
        ]
    );
};
function wp2023_settings_options_shop_info_callback()
{
    echo ' <p> đây là TT về của cửa hàng của bạn </p>  ';
}
function wp2023_settings_options_shop_payment_callback()
{
    echo ' <p> đây là TT tài Khoản Ngân hàng của bạn </p>  ';
}

function wp2023_settings_filed_name_callback($args)
{
    $type = isset($args['type']) ? $args['type'] : ' text';
    $options = get_option('wp2023_settings_options');
    // nếu CSDL trống 
    if (!$options) {
        # code...
        switch ($type) {
            case 'text':
            ?>
                <input type="text" name="wp2023_settings_options[<?= $args['label_for']; ?>]">
            <?php
                break;
            case 'textarea':
            ?>
                <input type="textarea" name="wp2023_settings_options[<?= $args['label_for']; ?>]">
            <?php
                break;

            default:

                break;
        }
    }
    else {
          # code...
          switch ($type) {
              case 'text':
              ?>
                  <input type="text" name="wp2023_settings_options[<?= $args['label_for']; ?>]"
                  value="<?=$options[$args['label_for']];?>"
                  >
              <?php
                  break;
              case 'textarea':
              ?>
                  <input type="textarea" name="wp2023_settings_options[<?= $args['label_for']; ?>]"
                  value="<?=$options[$args['label_for']];?>"
                  >
              <?php
                  break;
  
              default:
  
                  break;
          }
    }
}
