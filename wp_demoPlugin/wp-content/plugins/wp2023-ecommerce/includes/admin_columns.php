<?php
// Hiển thị các cột của post type sản phẩm
add_filter('manage_wporg_product_posts_columns', 'wp2023_admi_nmanage_wporg_product_posts_columns');
function wp2023_admi_nmanage_wporg_product_posts_columns($columns)
{
    $columns['product_price'] = 'Giá sản phẩm';
    $columns['product_price_sale'] = 'Giá khuyến mãi';
    $columns['product_stock'] = 'Số lượng';
    return $columns;
}
// Hiển thị cột ra
add_action('manage_wporg_product_posts_custom_column', 'wp2023_product_posts_custom_column', 10, 2);
function wp2023_product_posts_custom_column($column, $post_id)
{
    switch ($column) {
        case 'product_price':
            $product_price = get_post_meta($post_id, 'product_price', true);
            echo number_format($product_price);
            break;
        case 'product_price_sale':
            $product_price_sale = get_post_meta($post_id, 'product_price_sale', true);
            echo number_format($product_price_sale);
            break;
        case 'product_stock':
            $product_stock = get_post_meta($post_id, 'product_stock', true);
            echo number_format($product_stock);
            break;
        default:
            # code...
            break;
    }
}
// Hiển thị các cột của taxonomy prductcat
add_filter('manage_edit-product_cat_columns' , 'wp2023_manage_edit_product_cat_columns');
function wp2023_manage_edit_product_cat_columns($columns)
{
    $columns['image'] = 'Ảnh';
    return $columns;
}
// Hiện thị giá trị cột hình ảnh(image)
add_action('manage_product_cat_custom_column','wp2023_manage_product_cat_custom_column',10,3);
function wp2023_manage_product_cat_custom_column($out,$column,$term_id){
    if ($column == 'image') {
        $image = get_term_meta($term_id,'image',true);
        echo($image);
    }
}
