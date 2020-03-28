<?php

function flatsome_calldatathumf_shortcode( $atts, $content = null ){
  extract( shortcode_atts( array(
  	'woo_category_id'=>'',
  	'soluong' => '',
  	'dongsanpham'=> ''

  ), $atts ) );
	ob_start();
	?>
    <?php
			$categories = get_terms( 'product_cat', array(
		    'orderby'    => 'menu_order',
		    'order'=>'ASC',
		    'number' => $soluong,
		    'hide_empty' => 0,	    
		    'parent'=> 0
			) );
		//var_dump($categories);

		?>
        <div class="row large-columns-<?php echo $dongsanpham ?> medium-columns-1 small-columns-2 row-normal">
            <?php foreach ($categories as $catathumti) {
			 $idthumb = get_term_meta($catathumti->term_id,'product_cat-image-id',true); 
			 $urlthumb = wp_get_attachment_url($idthumb); 
			 $category_link = get_category_link( $catathumti->term_id );
			 ?>
                <div class="col medium-4 small-6 large-4">
                    <div class="col-inner">
                        <div class="box has-hover has-hover dark box-text-bottom">
                            <div class="box-image">
                                <a href="<?php echo $category_link; ?>" target="_self">
                                    <div class="img-inner image-zoom" style="padding: 10%;    text-align: center;">
                                        <img width="300" height="195" src="<?php echo $urlthumb; ?>" style="max-width: 70%;">
                                    </div>
                                </a>
                                <div class="mk-text-block dv-title">
                                    <div style="text-align: center;"><a href="<?php echo $category_link; ?>"><?php echo $catathumti->name; ?></a></div>
                                    <div class="clearboth"></div>
                                </div>
                            </div>
                            <!-- box-image -->
                        </div>
                        <!-- .box  -->
                    </div>
                </div>

                <?php
		} ?>
        </div>

        <?php

	$content = ob_get_contents();

	ob_end_clean();

	return $content;

}

add_shortcode('call_datathum', 'flatsome_calldatathumf_shortcode');