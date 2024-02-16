<?php
$objwp2023Oder = new wp2023Oder();
$result = $objwp2023Oder->paginate(2);
// dd($result);
// có thể dùng 3 dòng dưới hoặc  dùng hàm extract()
// $items       = $result['items'];
// $total_pages = $result['total_pages'];
// $total_items = $result['total_items'];
pr($_REQUEST);
extract($result);
/* 
'total_pages'
'total_items' 
'items'    
 */
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
if ($action == 'trash') {
    $orDerIds = $_REQUEST['post'];
    if (count($orDerIds) ) {
        foreach ($orDerIds as $orDerId) {
            $objwp2023Oder->trash($orDerId);
        }
    }
    wp2023_redirect('admin.php?page=wp2023-orders');
}
if (isset($_GET['order_id'])&&$_GET['order_id']!='') {
    include_once WP2023_PART.'includes/admin_pages/orders/edit.php';
}
else {
    include_once WP2023_PART.'includes/admin_pages/orders/list.php';
}
?>

<script>
    // Đường dẫn sử lý ajax 
    let ajax_url = '<?= admin_url('admin-ajax.php');?>';
    jQuery(document).ready (function(){
        // alert('J');
        jQuery('.action_orders').on('change',function(){
            let order_id = jQuery(this).data('id');// data-id
            let status = jQuery(this).val();
         //console.log(ajax_url);
            jQuery.ajax({
                url:ajax_url,
                method:'POST',
                dataType:'json',
                data: {
                    action:'wp2023_order_change_status',
                    order_id : order_id,
                    status : status
                },
                success:function(res){
                    alert('Cập nhật thành công');
                },
                error:function(err){
                    alert('Cập nhật fail');

                }
            });
        });
    });
</script>