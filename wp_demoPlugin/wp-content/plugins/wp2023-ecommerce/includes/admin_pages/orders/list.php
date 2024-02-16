<div class="wrap">
    <h1 class="wp-heading-inline">
        <?= __('Manger Orders','wp2023-ecommerce')?></h1>

    <hr class="wp-header-end">
    <ul class="subsubsub">
        <li class="all"><a href="admin.php?page=wp2023-orders" class="current" aria-current="page"><?= __('All Orders','wp2023-ecommerce')?><span class="count">(<?= $total_items ?>)</span></a> |</li>
        <li class="publish"><a href="admin.php?page=wp2023-orders&status=pending"><?= __('New Orders','wp2023-ecommerce')?><span class="count">(1)</span></a></li>
        <li class="publish"><a href="admin.php?page=wp2023-orders&status=completed"><?= __('Orders Completed','wp2023-ecommerce')?> <span class="count">(1)</span></a></li>
        <li class="publish"><a href="admin.php?page=wp2023-orders&status=canceled"><?= __('Orders Destroyed','wp2023-ecommerce')?> <span class="count">(1)</span></a></li>
    </ul>
    <form id="posts-filter" method="get">
        <input type="hidden" name="page" value="wp2023-orders">
        <!-- <input type="hidden" name="paged" value="1"> -->
        <p class="search-box">
            <label class="screen-reader-text" for="post-search-input"><?= __('Search Orders','wp2023-ecommerce')?></label>
            <input type="search" placeholder="Tìm kiếm đơn hàng" id="post-search-input" name="s" value="">
            <input type="submit" id="search-submit" class="button" value="<?= __('Search','wp2023-ecommerce')?>">
        </p>

        <div class="tablenav top">
            <div class="alignleft actions bulkactions">
                <label for="bulk-action-selector-top" class="screen-reader-text">Lựa chọn thao tác hàng loạt</label><select name="action" id="bulk-action-selector-top">
                    <option value="-1">Hành động</option>
                    <option value="edit" class="hide-if-no-js">Chỉnh sửa</option>
                    <option value="trash">Bỏ vào thùng rác</option>
                </select>
                <input type="submit" id="doaction" class="button action" value="Áp dụng">
            </div>
            <div class="alignleft actions">
                <label for="filter-by-date" class="screen-reader-text">Lọc theo ngày</label>
                <select name="m" id="filter-by-date">
                    <option selected="selected" value="0">Tất cả các ngày</option>
                    <option value="202306">Tháng Sáu 2023</option>
                </select>
                <label class="screen-reader-text" for="cat_filter">Lọc theo danh mục</label>
                <select name="cat_filter" id="cat_filter" class="postform">
                    <option value="0">Tất cả trạng thái</option>
                    <option class="level-0" value="pending">Đơn hàng mới</option>
                    <option class="level-0" value="completed">Đơn đã hoàn thành</option>
                    <option class="level-0" value="canceled">Đơn đã hủy</option>
                </select>
                <input type="submit" name="filter_action" id="post-query-submit" class="button" value="Lọc">
            </div>
            <?php
            // Thêm  đường dẫn tới file html được chèn vào
            include WP2023_PART . 'includes/templates/elements/elm-paginate.php';
            ?>
            <br class="clear">
        </div>
        <h2 class="screen-reader-text">Danh sách bài viết</h2>
        <table class="wp-list-table widefat fixed striped table-view-list posts">
            <thead>
                <tr>
                    <td id="cb" class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-1">Chọn toàn bộ</label><input id="cb-select-all-1" type="checkbox"></td>
                    <th scope="col" id="title" class="manage-column column-title column-primary sortable desc"><a href="#"><span>Mã đơn hàng</span><span class="sorting-indicator"></span></a></th>
                    <th scope="col" id="author" class="manage-column column-author"> Tổng tiền</th>
                    <th scope="col" id="categories" class="manage-column column-categories"> Khách hàng</th>
                    <th scope="col" id="tags" class="manage-column column-tags">Điện Thoại</th>
                    <th scope="col" id="tags" class="manage-column column-tags">Trạng thái</th>
                    <th scope="col" id="date" class="manage-column column-date sortable asc"><a href="http://localhost/wp_demoPlugin/wp-admin/edit.php?orderby=date&amp;order=desc"><span>Thời gian</span><span class="sorting-indicator"></span></a></th>
                </tr>
            </thead>

            <tbody id="the-list">
                <?php foreach ($items as $item) : ?>

                    <tr id="<?= $item->id;  ?>" class="iedit author-self level-0 post-<?= $item->id;  ?> type-post status-publish format-standard hentry category-khong-phan-loai">
                        <th scope="row" class="check-column">
                            <input id="cb-select-1" type="checkbox" name="post[]" value="<?= $item->id; ?>">
                        </th>
                        <td class="title column-title has-row-actions column-primary page-title" data-colname="Tiêu đề">

                            <strong><a class="row-title" href="admin.php?page=wp2023-orders&order_id=<?=$item->id; ?>" aria-label=""><?= $item->id;  ?></a></strong>
                            <div class="row-actions"><span class="edit"><a href="#;action=edit" aria-label="Sửa “Chào tất cả mọi người!”">Chỉnh sửa</a> | </span><span class="inline hide-if-no-js"><button type="button" class="button-link editinline" aria-label="Chỉnh sửa nhanh “Chào tất cả mọi người!”" aria-expanded="false">Sửa nhanh</button> | </span><span class="trash"><a href="#;action=trash&amp;_wpnonce=5faeff3804" class="submitdelete" aria-label="Bỏ “Chào tất cả mọi người!” vào thùng rác">Thùng rác</a> | </span><span class="view"><a href="#" rel="bookmark" aria-label="Xem “Chào tất cả mọi người!”">Xem</a></span></div><button type="button" class="toggle-row"><span class="screen-reader-text">Hiển thị chi tiết</span></button>
                        </td>
                        <td class="author column-author" data-colname="Tổng Tiền"><a href="#"><?= number_format($item->total);  ?></a></td>
                        <td class="categories column-categories" data-colname=" Tên khách hàng"><a href="#"><?= $item->customer_name;  ?></a></td>
                        <td class="author column-author" data-colname="Số điện thoại"><a href="#"><?= $item->customer_phone;  ?></a></td>
                        <td class="comments column-comments" data-colname="Trạng Thái">
                            <!-- Đây là phần sửa lại action của lựa chọn đặt hàng -->
                            <select class="action_orders" name="action_orders" id="bulk-action-selector-top" data-id="<?= $item->id;  ?>">
                                <option <?= $item->status == 'pending' ? 'selected':'' ;?> value="pending">Đơn hàng mới</option>
                                <option <?= $item->status == 'completed' ? 'selected':'' ;?> value="completed">Đã hoàn thành</option>
                                <option <?= $item->status == 'canceled' ? 'selected':'' ;?> value="canceled">Đã hủy</option>
                            </select>
                        </td>
                        <td class="date column-date" data-colname="Thời gian">Đã xuất bản<br><?= date('d-m-Y', strtotime($item->created)); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

            <tfoot>
                <tr>
                    <td class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-2">Chọn toàn bộ</label><input id="cb-select-all-2" type="checkbox"></td>
                    <th scope="col" class="manage-column column-title column-primary sortable desc"><a href="http://localhost/wp_demoPlugin/wp-admin/edit.php?orderby=title&amp;order=asc"><span>Tiêu đề</span><span class="sorting-indicator"></span></a></th>
                    <th scope="col" class="manage-column column-author">Tác giả</th>
                    <th scope="col" class="manage-column column-categories">Chuyên mục</th>
                    <th scope="col" class="manage-column column-tags">Thẻ</th>
                    <th scope="col" class="manage-column column-comments num sortable desc"><a href="http://localhost/wp_demoPlugin/wp-admin/edit.php?orderby=comment_count&amp;order=asc"><span><span class="vers comment-grey-bubble" title="Bình luận" aria-hidden="true"></span><span class="screen-reader-text">Bình luận</span></span><span class="sorting-indicator"></span></a></th>
                    <th scope="col" class="manage-column column-date sortable asc"><a href="http://localhost/wp_demoPlugin/wp-admin/edit.php?orderby=date&amp;order=desc"><span>Thời gian</span><span class="sorting-indicator"></span></a></th>
                </tr>
            </tfoot>

        </table>
        <div class="tablenav bottom">

            <div class="alignleft actions bulkactions">
                <label for="bulk-action-selector-bottom" class="screen-reader-text">Lựa chọn thao tác hàng loạt</label><select name="action2" id="bulk-action-selector-bottom">
                    <option value="-1">Hành động</option>
                    <option value="edit" class="hide-if-no-js">Chỉnh sửa</option>
                    <option value="trash">Bỏ vào thùng rác</option>
                </select>
                <input type="submit" id="doaction2" class="button action" value="Áp dụng">
            </div>
            <div class="alignleft actions">
            </div>
            <?php
            // Thêm  đường dẫn tới file html được chèn vào
            include WP2023_PART . 'includes/templates/elements/elm-paginate.php';
            ?>
            <br class="clear">
        </div>

    </form>

    <div id="ajax-response"></div>
    <div class="clear"></div>
</div>
<script>
    // Đường dẫn sử lý ajax 
    let nonce = '<?= wp_create_nonce('wp2023_update_orders_status')?>';
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
                    status : status,
                    _wpnonce : nonce
                },
                success:function(res){
                    if (res.success) {
                        alert('Cập nhật thành công');
                    }
                    else{
                        alert('Cập nhật ko thành công');
                    }
                    
                },
                error:function(err){
                    alert('Cập nhật fail');

                }
            });
        });
    });
</script>