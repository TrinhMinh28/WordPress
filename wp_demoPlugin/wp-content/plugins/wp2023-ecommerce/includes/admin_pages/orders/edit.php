<?php
$order_id = isset($_GET['order_id']) ? $_GET['order_id'] : 0;
if ($order_id) {
    $objwp2023Oder = new wp2023Oder();
    $item = $objwp2023Oder->findId($order_id);
    $item_details = $objwp2023Oder->order_items($order_id);
}
if (isset($_POST['wp2023_save_order'])) {
    check_admin_referer('wp2023-update_order');// nếu giá trị của hàm này khác với wp_nonce_field thì sẽ báo die liên kết
    // người dùng lưu dữ liệu
    //dd($_REQUEST);
    $order_status = isset($_REQUEST['order_status']) ? $_REQUEST['order_status'] : '';
    $note = isset($_REQUEST['note']) ? $_REQUEST['note'] : '';
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
    // xóa bỏ các ký tự đặc biệt ( đoạn mã html) khi cóc tình hoặc vô ý nhập vào hệ thống
    $note = sanitize_text_field($note); // ví dụ như <script> alert(123) </script> 
    $email = sanitize_email($email); //Loai bỏ khảng trăng và ký tự đăc biệt khoie email 
    // Biến đoạn mã html thành dạng chuỗi => esc_html();
    // Ví dụ này chỉ update 2 ường là status và note
    $objwp2023Oder->upDate($order_id, [
        'status' => $order_status,
        'note'  => $note
    ]);

    wp2023_redirect('admin.php?page=wp2023-orders&order_id=' . $order_id);
}
?>

<style>
    table.form-table.bordered th,
    td {
        border: 1px solid #ccc;
        text-align: center;
    }
</style>
<div class="wrap">
    <h1 class="wp-heading-inline">Chi tiết đơn hàng: <?= $item->id; ?></h1>
    <form id="posts-filter" method="post">
        <?php 
        wp_nonce_field('wp2023-update_order');
        ?>
        <div id="poststuff">
            <div id="post-body" class="metabox-holder columns-2">
                <!-- Left columns -->
                <div id="post-body-content">
                    <!-- Thông tin đơn hàng -->
                    <div class="postbox ">
                        <div class="postbox-header">
                            <h2 class="hndle ui-sortable-handle">Thông tin đơn hàng</h2>
                        </div>
                        <div class="inside">
                            <table class="form-table  ">
                                <tr>
                                    <td>Mã đơn hàng</td>
                                    <td> <?= $item->id; ?> </td>
                                </tr>
                                <tr>
                                    <td>Ngày đặt hàng</td>
                                    <td> <?= date('d-m-Y', strtotime($item->created)); ?></td>
                                </tr>
                                <tr>
                                    <td>Tên khách hàng</td>
                                    <td> <?= $item->customer_name; ?> </td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại</td>
                                    <td><?= $item->customer_phone; ?> </td>
                                </tr>
                                <tr>
                                    <td>Email</td>

                                    <td> <input type="" id="" name="email" value="  <?= $item->customer_email; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td> <?= esc_html($item->address) ; ?></td>
                                </tr>
                                <tr>
                                    <td>Ghi chú</td>
                                    <td>
                                        <textarea rows="5" class="large-text" name="note"><?= esc_html($item->note) ; ?></textarea>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- Chi tiết đơn hàng -->
                    <div class="postbox ">
                        <div class="postbox-header">
                            <h2 class="hndle">Chi tiết đơn hàng</h2>
                        </div>
                        <div class="inside">
                            <table class="form-table bordered">
                                <tr>
                                    <th>Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                </tr>
                                <?php
                                foreach ($item_details as $item_detail) { ?>
                                    <tr>
                                        <td><?= $item_detail->product_id ?></td>
                                        <td> <?= $item_detail->product_name ?></td>
                                        <td><?= $item_detail->quantity ?></td>
                                        <td><?= $item_detail->price ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Right columns -->
                <div id="postbox-container-1">
                    <div class="postbox">
                        <div class="postbox-header">
                            <h2 class="hndle">Hành động</h2>
                        </div>
                        <div class="inside">
                            <div class="submitbox">
                                <p>
                                    <select name="order_status" class="large-text ">
                                        <option value="pending">Đơn hàng mới</option>
                                        <option value="completed">Đơn đã hoàn thành</option>
                                        <option value="canceled">Đơn đã hủy</option>
                                    </select>
                                </p>
                                <p>
                                    <input type="submit" name="wp2023_save_order" id="submit" class="button button-primary" value="Lưu thay đổi">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>