<?php
// Chinh sửa thêm mới sản phẩm  
// Đăng ký meta box chó ản phẩm.
add_action('add_meta_boxes', 'wp2023_add_custom_box');
function wp2023_add_custom_box()
{
	$screens = ['post', 'wporg_product'];
	foreach ($screens as $screen) {
		add_meta_box(
			'wporg_box_id',                 // Unique ID
			'Thông tin sản phẩm',      // Box title
			'wp2023_custom_box_html',  // Content callback, must be of type callable
			$screen                            // Post type
		);
	}
}
function wp2023_custom_box_html()
{
	// echo '<p>Đây là nội dung metabox</p>';
	include_once WP2023_PART . 'includes/templates/meta_boxe_product.php';
}

// Save cơ sở dữ liệu 
add_action('save_post', 'wp2023_save_product');
function wp2023_save_product($post_id)
{
	// echo '<pre>';
	// var_dump($post_id);
	// print_r($_REQUEST);
	// die();
	if ($_REQUEST['post_type'] == 'wporg_product') {
		if (isset($_REQUEST['product_price'])) {
			$product_price = $_REQUEST['product_price'];
			update_post_meta($post_id, 'product_price', $product_price);
		}
		if (isset($_REQUEST['product_price_sale'])) {
			$product_price_sale = $_REQUEST['product_price_sale'];
			update_post_meta($post_id, 'product_price_sale', $product_price_sale);
		}
		if (isset($_REQUEST['product_stock'])) {
			$product_stock = $_REQUEST['product_stock'];
			update_post_meta($post_id, 'product_stock', $product_stock);
		}
		
	}
}

// Category Screen.
// Đăng ký thêm trường cho taxonomy
add_action('product_cat_add_form_fields', 'wp2023_product_cat_add_from_fields');

function wp2023_product_cat_add_from_fields()
{
	include_once WP2023_PART . 'includes/templates/meta_boxe_product_cat_add_from_fields.php';
}

// Sửa trường 
add_action('product_cat_edit_form_fields', 'wp2023_product_cat_edit_from_fields',10,2);
function wp2023_product_cat_edit_from_fields($tag,$taxonomy)
{
	include_once WP2023_PART . 'includes/templates/meta_boxe_product_cat_edit_from_fields.php';
}

// Xử lý khi lưu ter
/*
do_action(edit<taxonomy_name>);
do_action(add<taxonomy_name>);
*/
add_action('create_product_cat','wp_meta_box_product_cat_add_save',10,1);
function wp_meta_box_product_cat_add_save ($term_id){
	$image = $_POST ['image'];
	update_term_meta($term_id,'image',$image);
}
add_action('edit_product_cat','wp_meta_box_product_cat_edit_save',10,1);
function wp_meta_box_product_cat_edit_save ($term_id){
	$image = $_POST['image'];
	update_term_meta($term_id,'image',$image);
}