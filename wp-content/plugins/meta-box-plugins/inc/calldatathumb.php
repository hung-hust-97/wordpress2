<?php

add_action( 'ux_builder_setup', function () {

add_ux_builder_shortcode( 'call_datathum', array(
   

    'name' => __( 'MetaBox Taxanomy' ),

    'thumbnail' =>  flatsome_ux_builder_thumbnail( 'blog_posts' ),

    'info' => '{{ height }}',

    'allow_in' => array('text_box'),

    'wrap' => false,



     'options' => array(

            'soluong' => array(

                'type' => 'textfield',

                'heading' => 'Số lượng hiện thị',

                'default' => '',

            ),

            'dongsanpham' => array(

                'type' => 'textfield',

                'heading' => 'Số dòng hiển thị',

                'default' => '',

            ),

            'woo_category_id' => array(

                'type' => 'select',

                'heading' => 'Chọn danh mục',

                'param_name' => 'ids',

                'config' => array(                    

                    'placeholder' => 'Select..',

                    'termSelect' => array(

                        'post_type' => get_option('devj_select_name'),

                        'taxonomies' => get_option('devj_select_tax')

                    ),

                )

            )





        ),

) );

});

