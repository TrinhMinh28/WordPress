<?php
/*  REST API WordPress (hay còn gọi là WP REST API) là một giao diện lập trình ứng dụng (API) được tích hợp sẵn trong WordPress,
 cho phép các nhà phát triển tương tác với dữ liệu của WordPress thông qua các yêu cầu HTTP.
  Với REST API WordPress, bạn có thể lấy và tương tác với các nội dung WordPress như bài đăng,
   trang, phương tiện, người dùng và các loại bài đăng tùy chỉnh khác.

    REST API WordPress được xây dựng trên kiến trúc RESTful,
 một kiến trúc phần mềm web tiêu chuẩn để tạo ra các API dễ sử dụng, linh hoạt và bảo mật. 
 RESTful API sử dụng các yêu cầu HTTP như GET, POST, PUT, DELETE để thực hiện các hành động trên dữ liệu của ứng dụng.
 
    REST API WordPress cho phép các nhà phát triển tạo ra các ứng dụng web và di động độc lập với WordPress, 
hoặc tích hợp WordPress vào các ứng dụng khác. 
Các ứng dụng này có thể lấy và hiển thị dữ liệu từ WordPress, cũng như thực hiện các thao tác cập nhật, xóa và tạo mới dữ liệu trên WordPress.

    REST API WordPress cũng có thể được sử dụng để tích hợp WordPress với các ứng dụng và dịch vụ bên ngoài như 
React, Angular, Vue.js, iOS và Android. 
    Nó mở ra nhiều cơ hội cho các nhà phát triển để tạo ra các ứng dụng đa nền tảng 
hoặc tích hợp WordPress vào các ứng dụng hiện có.
*/
add_action('rest_api_init', 'wp2023_api_init');
function wp2023_api_init()
{
    $namespace = 'wp2023/v1';
    $base = 'orders';
    register_rest_route(
        $namespace,
        '/' . $base,
        array(
            array(
                'methods' => WP_REST_Server::READABLE, // GET
                'callback' => 'wp2023_api_init_orders_all'
            ),
            array(
                'methods' => WP_REST_Server::CREATABLE, // POST
                'callback' => 'wp2023_api_init_orders_stores'
            )
        )
    );
    //https://yourdoamin.com//wp-json/wp2023/v1/orders

    register_rest_route($namespace, '/' . $base . '/(?P<id>[\d]+)', array(
        [
            'methods' => WP_REST_Server::READABLE, //get
            'callback' => 'wp2023_api_init_orders_show'
        ],
        [
            'methods' => WP_REST_Server::EDITABLE, //put
            'callback' => 'wp2023_api_init_orders_update',
        ],
        [
            'methods' => WP_REST_Server::DELETABLE, //delete
            'callback' => 'wp2023_api_init_orders_destroy',
        ]
    ));
    //https://yourdoamin.com//wp-json/wp2023/v1/orders/5(id)
}

// //GET,  lấy toàn bộ
function wp2023_api_init_orders_all($request)
{
    $objwp2023Order = new wp2023Oder();
    $result = $objwp2023Order->paginate();
    $data = [
        'success' => true,
        'data'=>$result,
    ];
    return new WP_REST_Response($data,200); 

}
//POST, thêm mới
function wp2023_api_init_orders_stores($request)
{
    $objwp2023Order = new wp2023Oder();
    $saved = $objwp2023Order->Save($_POST);
    $data = [
        'success' => true,
        'data'=>$saved,
    ];
    return new WP_REST_Response($data,201); 
}
//GET, lấy theo id
function wp2023_api_init_orders_show($request)
{
    $id=($request['id']);
    $objwp2023Order = new wp2023Oder();
    $item = $objwp2023Order->findId($id);
    $data = [
        'success' => true,
        'data'=>$item,
    ];
    return new WP_REST_Response($data,201); 

}
//PUT, cập nhật theo id
function wp2023_api_init_orders_update($request)
{
    $id=($request['id']);
    $objwp2023Order = new wp2023Oder();
    $item = $objwp2023Order->upDate($id,$_POST);
    $data = [
        'success' => true,
        'data'=>$item,
    ];
    return new WP_REST_Response($data,201); 
    
}
// DELETE, Xóa theo id
function wp2023_api_init_orders_destroy($request)
{
    $id=($request['id']);
    $objwp2023Order = new wp2023Oder();
    $item = $objwp2023Order->delete($id,$_POST);
    $data = [
        'success' => true
    ];
    return new WP_REST_Response($data,201); 
}


