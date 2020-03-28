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
			$tax = get_option('devj_select_tax');
			$categories = get_terms($tax, array(

		    'orderby'    => 'count',

		    'order'=>'date',

		    'number' => $soluong,

		    'hide_empty' => 0,

		    'parent'=> $woo_category_id

			) );

			//var_dump($categories);

		?>

		<div class="row large-columns-<?php echo $dongsanpham ?> medium-columns-1 small-columns-1 row-normal">  

			

		<?php foreach ($categories as $catathumti) {



			 $idthumb = get_term_meta($catathumti->term_id,'category-image-id',true); 

			 $urlthumb = wp_get_attachment_url($idthumb); 

			 $category_link = get_category_link( $catathumti->term_id );

			 ?> 					

				<div class="col medium-4 small-12 large-4">



					<div class="col-inner">
						<a href="<?php echo $category_link; ?>" target="_self">			
							<div class="box has-hover has-hover box-text-bottom">
								<div class="box-image">
									<div class="image-cover image-zoom" style="padding-top:65%;">
										<img width="300" height="195" src="<?php echo $urlthumb; ?>">				
										<div class="overlay" style="background-color:1"></div>							
									</div>
								</div><!-- box-image -->
								<div class="box-text text-center">
									<div class="box-text-inner blog-post-inner">
										<h5 class="post-title is-large "><?php echo $catathumti->name; ?></h5>
											<div class="is-divider"></div>
									</div><!-- .box-text-inner -->
								</div>

							</div>
						</a>
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