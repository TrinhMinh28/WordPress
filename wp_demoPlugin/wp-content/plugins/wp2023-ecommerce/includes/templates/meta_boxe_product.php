<?php
// echo __FILE__;
// wp_nonce_field( basename(__FILE__), 'wp2023_custom_box_nonce' );
//     $value1 = get_post_meta( $post->ID, '_wp2023_meta_key1', true );
//     $value2 = get_post_meta( $post->ID, '_wp2023_meta_key2', true );
//     $value3 = get_post_meta( $post->ID, '_wp2023_meta_key3', true );
// <?php echo esc_attr( $value3 );? > 
global $post;
echo '<pre>';
print_r($post ->ID);
$product_price = get_post_meta($post ->ID,'product_price',true);
$product_price_sale = get_post_meta($post ->ID,'product_price_sale',true);
$product_stock = get_post_meta($post ->ID,'product_stock',true);
?>
  <table class="form-table">
        <tbody>
            <tr>
                <th><label for="blogname">Giá sản phẩm </label></th>
                <td><input type="text" id="product_price" name="product_price" value=" <?=  $product_price;?> "></td>
            </tr>
            <tr>
                <th><label for="blogname">Giá khuyến mãi</label></th>
                <td><input type="text" id="product_price_sale" name="product_price_sale" value="<?= $product_price_sale;?>"></td>
            </tr>
            <tr>
                <th><label for="blogname">Số lượng </label></th>
                <td><input type="text" id="product_stock" name="product_stock" value="<?= $product_stock;?>"></td>
            </tr>
        </tbody>
    </table>