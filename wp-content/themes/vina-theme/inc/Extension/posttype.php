<?php

// Create post type

function create_custom_post_type()

{

     /*

     * Biến $label để chứa các text liên quan đến tên hiển thị của Post Type trong Admin

     */

     //Tạo post type với slug tên là project và các tham số trong biến $args ở trên    
    $namept = array(

        'name' => 'Products', //Tên post type dạng số nhiều

        'singular_name' => 'Products', //Tên post type dạng số ít

        'singular' => 'Products',

        

    );

    // $thuvien = array(

    //     'name' => 'Thư viện', //Tên post type dạng số nhiều

    //     'singular_name' => 'Thư viện', //Tên post type dạng số ít

    //     'singular' => 'Thư viện',

        

    // );

    /*

     * Biến $args là những tham số quan trọng trong Post Type

     */




    $args = array(

        'labels' => $namept, //Gọi các label trong biến $label ở trên

        'description' => 'Post type', //Mô tả của post type

        'supports' => array(

            'title',

            'editor',

            'excerpt',

            'author',

            'thumbnail',

            'comments',

            'trackbacks',

            'revisions',

            'custom-fields'

        ), //Các tính năng được hỗ trợ trong post type

        'taxonomies' => array( 'product_cat', 'post_tag'), //Các taxonomy được phép sử dụng để phân loại nội dung

        'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page

        'public' => true, //Kích hoạt post type

        'show_ui' => true, //Hiển thị khung quản trị như Post/Page

        'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)

        'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus

        'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.

        'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)

        'menu_icon' => 'dashicons-products', //Đường dẫn tới icon sẽ hiển thị

        'can_export' => true, //Có thể export nội dung bằng Tools -> Export

        'has_archive' => true, //Cho phép lưu trữ (month, date, year)

        'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm

        'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true

        'capability_type' => 'post' //

    );

    register_post_type('product', $args); //Tạo post type với slug tên là project và các tham số trong biến $args ở trên 

    

}

/* Kích hoạt hàm tạo custom post type */

add_action('init', 'create_custom_post_type');



add_action('init', 'create_product');

function create_product() {

    register_taxonomy('product_cat', 'product', array(

            'label' => 'Danh mục Products',

            'labels' => array(

                'name'          => __('Danh mục Products'),

                'singular_name' => __('Products'),

                'add_new_item'  => __('Thêm mới'),

                'new_item'      => __('Thêm mới'),

                'add_new'       => __('Thêm mới'),

                'edit_item'     => __('Sửa')

            ),

            'public' => true,

            'hierarchical' => true

        )

    );

    

}

// end post type