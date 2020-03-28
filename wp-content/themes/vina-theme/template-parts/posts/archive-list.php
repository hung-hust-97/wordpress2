<?php if ( have_posts() ) : ?>

<?php
	// Create IDS
	$ids = array();
	while ( have_posts() ) : the_post();
		array_push($ids, get_the_ID());
	endwhile; // end of the loop.
	$ids = implode(',', $ids);
?>
<?php $query =  get_queried_object(); ?>
<?php 


$category=get_category(get_query_var('product')); // var_dump($category->name);

?>



	<?php if (is_search()) {
		// var_dump($ids);
		?>
		<div class="kq_timkiem">Kết Quả Tìm Kiếm Sản Phẩm</div> 
			<?php  echo do_shortcode('[blog_posts1 style="normal" type="masonry" columns="3" columns__md="2" show_date="false" excerpt="false" excerpt_length="20" image_height="75%" image_size="original" text_align="left" ids="'.$ids.'"]');?>
			<div class="kq_timkiem">Kết Quả Tìm Kiếm Tin Tức</div> 
			<?php  echo do_shortcode('[blog_posts type="row" image_width="100" col_spacing="small" text_align="left" style="masonry" columns="4" ids="'.$ids.'" show_date="text" excerpt="false"  ]');  ?>


		<?php
	}else{
				?>
				<div class="title_cat">
					<div class="title_pruduct_cat"><?php echo $query->name; ?></div>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/title-list.png">
				</div>
				<?php 

					if($query->name =="product" || $query->taxonomy =="product_cat"){
						echo '<div class="blog_products">';
						echo do_shortcode('[blog_posts1 style="normal" type="masonry" columns="3" columns__md="2" show_date="false" excerpt="false" excerpt_length="20" image_height="75%" image_size="original" text_align="left" ]');
						echo "</div>";
					}	
					else{
							
						// do_action('flatsome_before_blog');
						if ($query->term_id ==  '26' || $query->term_id ==  '47') {
							 echo do_shortcode('[blog_posts type="row" image_width="100" col_spacing="small" text_align="left" style="masonry" columns="4" ids="'.$ids.'" show_date="text" excerpt="false"  ]'); 
						}
						else{
							 echo do_shortcode('[blog_posts type="row" image_width="40" col_spacing="small" text_align="left" style="vertical" columns="1" ids="'.$ids.'"  show_date="text" excerpt_length="30" ]'); 
						}
					} 
				?>			 

		<?php flatsome_posts_pagination(); ?>
	<?php
} 
?>



<?php else : ?>

	<?php get_template_part( 'template-parts/posts/content','none'); ?>

<?php endif; ?>

	
