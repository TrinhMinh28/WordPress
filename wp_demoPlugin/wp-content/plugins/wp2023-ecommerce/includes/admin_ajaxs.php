<?php
// khi đã đăng nhập
add_action('wp_ajax_wp2023_order_change_status','wp2023_order_change_status');
// kHi chưa đnăg nhập
add_action('wp_ajax_nopri_wp2023_order_change_status','wp2023_order_change_status');
function wp2023_order_change_status (){
    $order_id  = $_REQUEST['order_id'];
    $status  = $_REQUEST['status'];
    $_nonce  = $_REQUEST['_wpnonce'];
 //   check_ajax_referer('wp2023_update_orders_status');// cách 1 
    if (wp_verify_nonce($_nonce,'wp2023_update_orders_status')) { // ách 2
        $objwp2023Oder = new wp2023Oder();
        $objwp2023Oder -> change_status($order_id,$status);
        $res = [
            'success' => true
        ];
        }
        else{
            $res = [
                'success' => false
            ];
        }
    
    echo json_encode($res);
    die();
}