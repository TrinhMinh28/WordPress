<?php
class wp2023Oder
{
    private $_orders = '';
    private $_orders_detail = '';
    // Khởi tạo
    public function __construct()
    {
        global $wpdb;
        $this->_orders = $wpdb->prefix . 'wp2023_orders'; //tên bảng là: wp_orders
        $this->_orders_detail = $wpdb->prefix . 'wp2023_orders_detail'; //tên bảng là: wp_orders_detail
    }

    // lấy dữ liệu
    public function getAllData()
    {
        global $wpdb;
        $sql = "SELECT * FROM $this->_orders";
        $items = $wpdb->get_results($sql);
        return $items;
    }

    // Dữ liệu phân trang
    public function paginate($limit = 20)
    {
        global $wpdb;
        // pr($_REQUEST);
        $s = isset($_REQUEST['s']) ? $_REQUEST['s'] : '';
        $status = isset($_REQUEST['status']) ? $_REQUEST['status'] : '';
        //Phân trang
        $paged = isset($_REQUEST['paged']) ? $_REQUEST['paged'] : '1';
        $cat_filter = isset($_REQUEST['cat_filter']) ? $_REQUEST['cat_filter'] : '';

        // lấy tổng số recods
        $sql = "SELECT count(id) FROM $this->_orders WHERE deleted = 0";
        // Tìm kiếm
        if ($s) {
            $sql .= " AND (customer_name LIKE '%$s%' OR customer_phone LIKE '%$s%') ";
        }
        if ($status) {
            $sql .= " AND status = '$status'";
        }
        if ($cat_filter) {
            $sql .= " AND status = '$cat_filter'";
        }
        $total_items = $wpdb->get_var($sql);
        // Thuật toán phần tang
        /*
        Limit = limit
        Tổng số trang = total_pages
        Tính offset
         */
        $total_pages = ceil($total_items / $limit); // só trang bằng tổng số sp / 20 sp mỗi trang
        $offset = ($paged * $limit) - $limit;
        $sql = "SELECT * FROM $this->_orders WHERE deleted = 0";
        // Tìm kiếm
        if ($s) {
            $sql .= " AND (customer_name LIKE '%$s%' OR customer_phone LIKE '%$s%') ";
        }
        if ($status) {
            $sql .= " AND status = '$status'";
        }
        if ($cat_filter) {
            $sql .= " AND status = '$cat_filter'";
        }
        $sql .= " ORDER BY id DESC ";
        $sql .= " LIMIT $limit OFFSET $offset ";
        // var_dump($sql);
        // var_dump('Số lượng item =',$total_items);

        $items = $wpdb->get_results($sql);
        return [
            'total_pages' => $total_pages,
            'total_items' => $total_items,
            'items'       => $items
        ];
    }

    //
    public function order_items($order_id)
    {
        global $wpdb;
        $sql = "SELECT products.post_title as product_name, order_detail.* 
        FROM $this->_orders_detail as order_detail
        JOIN $wpdb->posts as products ON products.ID = order_detail.product_id
        WHERE order_detail.order_id = $order_id
        ORDER BY order_detail.id DESC";

        $items = $wpdb->get_results($sql);
        return $items;
    }

    // Tìm kiếm theo khóa
    public function findId($id)
    {
        global $wpdb;
        $sql = "SELECT * FROM $this->_orders WHERE id = $id";
        $items = $wpdb->get_row($sql);
        return $items;
    }
    // Lưu , insert
    public function Save($data)
    {
        global $wpdb;
        $wpdb->insert($this->_orders, $data);
        $lastId = $wpdb->insert_id;
        $item = $this->findId($lastId);
        return $item;
    }

    // Update
    public function upDate($id, $data)
    {
        global $wpdb;
        $wpdb->update($this->_orders, $data, [
            'id' => $id
        ]);
        $item = $this->findId($id);
        return $item;
    }
    public function trash($id)
    {
        global $wpdb;
        $wpdb->update(
            $this->_orders,
            [
                'deleted' => 1
            ],
            [
                'id' => $id
            ]
        );
        return true;
    }

    // delete
    public function Delete($id)
    {
        global $wpdb;
        $wpdb->delete($this->_orders, [
            'id' => $id
        ]);
        return true;
    }
    public function change_status($order_id, $status)
    {
        global $wpdb;
        $wpdb->update(
            $this->_orders,
            [
                'status' => $status
            ],
            [
                'id' => $order_id
            ]
        );
        return true;
    }
}
