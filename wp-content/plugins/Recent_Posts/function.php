<?php
	/**
	 * Plugin Name: Recent Posts by JJ
	 * Plugin URI: https://www.fb.com/luckystarnbd
	 * Description: Bài viết hoặc sản phẩm mới nhất theo posttype tùy chọn.
	 * Version: 1.0
	 * Author: Jupiter Journey
	 * Author URI: https://www.fb.com/luckystarnbd
	 * License: GPLv2
	 */
?>
<?php 
	add_action( 'widgets_init', 'recent_posts_widget_jj' );

	function recent_posts_widget_jj() {

		register_widget( 'Recent_Post_Widget_JJ' );
	}

class Recent_Post_Widget_JJ extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'classname' => 'recent_posts_jj', 'description' => __('Một widget gọi những bài viết mới nhất.!', 'flatsome'), 'customize_selective_refresh' => true);

		$control_ops = array( 'id_base' => 'recent_posts_jj' );

		parent::__construct( 'recent_posts_jj', __('Recent Posts by JJ', 'flatsome'), $widget_ops, $control_ops );
	}

	function widget($args, $instance) {

		$cache = wp_cache_get('widget_recent_posts', 'widget');

		if ( !is_array($cache) )
			$cache = array();

		if ( !isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();
		extract($args);

		if ( empty( $instance['image'] ) ) $instance['image'] = false;
		$is_image = $instance['image'] ? 'true' : 'false';
        
        if ( empty( $instance['date-stamp'] ) ) $instance['date-stamp'] = false;
		$is_date_stamp = $instance['date-stamp'] ? 'true' : 'false';

		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts', 'flatsome') : $instance['title'], $instance, $this->id_base);
		if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
 			$number = 10;
		$posttype = apply_filters('widget_title', empty($instance['block']) ? __('Recent Posts', 'flatsome') : $instance['block'], $instance, $this->id_base);

		
		$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'post_type'=>$posttype,'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );

		


		if ($r->have_posts()) :
			?>
		<?php echo $before_widget; ?>
		<?php if ( $title ) echo $before_title . $title . $after_title; ?>
		<?php echo '<ul>'; ?>
		<?php while ( $r->have_posts() ) : $r->the_post(); ?>

		<?php
            $image_style = '';
            if($is_image == 'true' && has_post_thumbnail() && $is_date_stamp == 'true') {
                $image_style = 'style="background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.2) ), url('.wp_get_attachment_thumb_url(get_post_thumbnail_id(get_the_ID()) ).'); color:#fff; text-shadow:1px 1px 0px rgba(0,0,0,.5); border:0;"';
            }
            else if($is_image == 'true' && has_post_thumbnail() && $is_date_stamp == 'false') {
                $image_style = 'style="background: url('.wp_get_attachment_thumb_url(get_post_thumbnail_id(get_the_ID()) ).'); border:0;"';
            }
        ?>

		<li class="recent-blog-posts-li">
			<div class="flex-row recent-blog-posts align-top pt-half pb-half">
				<div class="flex-col mr-half">
					<div class="badge post-date <?php if($is_image == 'false') echo 'badge-small';?> badge-<?php echo flatsome_option('blog_badge_style'); ?>">
							<div class="badge-inner bg-fill" <?php echo $image_style;?>>
                                <?php if($is_date_stamp == 'true' || !has_post_thumbnail() || $is_image == 'false') { ?>
								<span class="post-date-day"><?php echo get_the_time('d', get_the_ID()); ?></span><br>
								<span class="post-date-month is-xsmall"><?php echo get_the_time('M', get_the_ID()); ?></span>
                                <?php } ?>
							</div>
					</div>
				</div><!-- .flex-col -->
				<div class="flex-col flex-grow">
					  <a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ? get_the_title() : get_the_ID() ); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a>
				   	  <span class="post_comments op-7 block is-xsmall"><?php comments_popup_link( '', __( '<strong>1</strong> Comment', 'flatsome' ), __( '<strong>%</strong> Comments', 'flatsome' ) ); ?></span>
				</div>
			</div><!-- .flex-row -->
		</li>
		<?php endwhile; ?>
		<?php echo '</ul>'; ?>
		<?php echo $after_widget; ?>
<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_recent_posts', $cache, 'widget');
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		//$instance['posttype'] = strip_tags($new_instance['posttype']);
		$instance['number'] = (int) $new_instance['number'];
	    $instance['image'] = $new_instance['image'];
        $instance['date-stamp'] = $new_instance['date-stamp'];
        $instance['block'] = ( ! empty( $new_instance['block'] ) ) ? strip_tags( $new_instance['block'] ) : '';
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_recent_entries']) )
			delete_option('widget_recent_entries');

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete('widget_recent_posts', 'widget');
	}

	function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		//$posttype     = isset( $instance['posttype'] ) ? esc_attr( $instance['posttype'] ) : '';
		$instance['image'] = isset( $instance['image'] ) ? $instance['image'] : false;
        $instance['date-stamp'] = isset( $instance['date-stamp'] ) ? $instance['date-stamp'] : false;

		$blocks = array(false => '-- None --');

		$posts = flatsome_get_post_type_items('blocks');
	     $args = array(
	       'public'   => true,
	       '_builtin' => false,
	    );

	    $output = 'names'; // names or objects, note names is the default
	    $operator = 'and'; // 'and' or 'or'

	    $post_types = get_post_types( $args, $output, $operator ); 



		if($post_types){
		  foreach ($post_types as $value) {
		    $blocks[$value] = $value;
		  }
		}
        $instance['block'] = isset( $instance['block'] ) ? esc_attr( $instance['block'] ) : '';

	?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'flatsome' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

<!-- 
		<p><label for="<?php echo $this->get_field_id( 'posttype' ); ?>"><?php _e( 'Chọn mục:', 'flatsome' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'posttype' ); ?>" type="text" value="<?php echo $posttype; ?>" /></p> -->


		<p><label for="<?php echo $this->get_field_id( 'block' ); ?>"><?php _e( 'Chọn post_type:', 'flatsome' ); ?></label>
		<select class="widefat" name="<?php echo $this->get_field_name( 'block' ); ?>" id="<?php echo $this->get_field_id( 'block' ); ?>">
			<?php 
				foreach ($blocks as $key => $value) {
		 		   echo '<option '.selected( $instance['block'], $key).' value="'.$key.'">'.$value.'</option>';
		 		} 
	 		?>
		</select></p>

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Số lượng hiển thị:', 'flatsome' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

 		<p><input class="checkbox" type="checkbox" <?php checked($instance['image'], 'on'); ?> id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>" />
		<label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'Hiện thị cùng hình ảnh', 'flatsome' ); ?></label></p>



        <p><input class="checkbox" type="checkbox" <?php checked($instance['date-stamp'], 'on'); ?> id="<?php echo $this->get_field_id('date-stamp'); ?>" name="<?php echo $this->get_field_name('date-stamp'); ?>" />
		<label for="<?php echo $this->get_field_id( 'date-stamp' ); ?>"><?php _e( 'Hiện thị ngày trên hình', 'flatsome' ); ?></label>
        <?php echo '<p><small>' . __('* If a featured image is not set or the "Show Thumbnail" option is disabled, the date stamp will always be displayed.', 'flatsome') . '</small></p>'; ?></p>

<?php
	}
}

?>