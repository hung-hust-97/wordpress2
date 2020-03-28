<?php
/**
 * Plugin Name: Vinahost Option
 * Plugin URI: https://vinahost.vn/
 * Description: Quyền supper user - Và giao diện WP 
 * Version: 1.6
 * Author: Vinahost - VNHTeam
 * Author URI: https://vinahost.vn/
 * License: GPLv2
 */
	define('PLUGIN_URL', plugin_dir_url(__FILE__));
	define('PLUGIN_RIR', plugin_dir_path(__FILE__));
	if ( ! function_exists( 'devvn_ilc_mce_buttons' ) ) {
	    function devvn_ilc_mce_buttons($buttons){
	        array_push($buttons,
	            "alignjustify",
	            "subscript",
	            "superscript"
	        );
	        return $buttons;
	    }
	    add_filter("mce_buttons", "devvn_ilc_mce_buttons");
	}
	if ( ! function_exists( 'devvn_ilc_mce_buttons_2' ) ) {
	    function devvn_ilc_mce_buttons_2($buttons){
	        array_push($buttons,
	            "fontselect",
	            "cleanup"
	        );
	        return $buttons;
	    }
	    add_filter("mce_buttons_2", "devvn_ilc_mce_buttons_2", 9999);
	}
	if ( ! function_exists( 'flatsome_editor_text_sizes' ) ) {
			function flatsome_editor_text_sizes($initArray){
		    $initArray['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 17px 18px 19px 20px 21px 24px 28px 32px 36px";
		    return $initArray;
		};
	}
//Super Short Shortcode 
	function siteInfo($title)
	{
		if ($title['args'] === 'phone')
		  return get_option('phone_number1');
		if ($title['args'] === 'address')
		  return get_option('address_1');

		if ($title['args'] === 'company')
		  return get_option('namecompany');

		if ($title['args'] === 'email')
		  return get_option('gmail');
	}
	add_shortcode('siteInfo', 'siteInfo');


	add_action('admin_menu', 'my_create_menu_theme_option');	 

	if(!function_exists('my_create_menu_theme_option')){

		function my_create_menu_theme_option() {

		        /*

		        @page_title : Tiêu đề menu trên tab

		        @menu_title : Tiêu đề hiện thị bên list menu

		        @capability : Quyền hạn sử dụng : xem thêm : https://codex.wordpress.org/Roles_and_Capabilities

		        @menu_slug : Đường dẫn thiết lập cho phần option này

		        */

	         $page = add_menu_page( 'My Theme option', 'Manage Options', 'manage_options', 'my-optionpage-vnh', 'hf_my_settings_page', 'dashicons-layout', 6 );
	        	// Save attachment ID LOGO
				if ( isset( $_POST['submit'] ) && isset( $_POST['image_attachment_id'] ) ) :
					update_option( 'media_selector_attachment_id', absint( $_POST['image_attachment_id'] ) );
				endif;
	        	// Save attachment ID favicon
				if ( isset( $_POST['submit'] ) && isset( $_POST['image_attachment_id_favicon'] ) ) :
					update_option( 'media_selector_attachment_id_favicon', absint( $_POST['image_attachment_id_favicon'] ) );
				endif;
				

	     }
	     //add_action( 'admin_footer', 'media_selector_print_scriptss' );
		// function media_selector_print_scriptss() {

		// 	$my_saved_attachment_post_id = get_option( 'media_selector_attachment_id', 0 );
		// 	$my_saved_attachment_post_id_favicon = get_option( 'media_selector_attachment_id_favicon', 0 );

		// }

	 }

	add_action( 'admin_init', 'register_theme_settings' );

	function register_theme_settings(){
	    register_setting( 'my-optionpage-groups', 'footer_scripts' );
	    register_setting( 'my-optionpage-groups', 'head_scripts' );
	    register_setting( 'my-optionpage-groups', 'phone_number1' ); 
	    register_setting( 'my-optionpage-groups', 'phone_number2' );
		register_setting( 'my-optionpage-groups', 'namecompany' ); 
	    register_setting( 'my-optionpage-groups', 'address_1' ); 
	    register_setting( 'my-optionpage-groups', 'address_2' );
	    register_setting( 'my-optionpage-groups', 'facebook' ); 
	    register_setting( 'my-optionpage-groups', 'gmail' ); 
	    register_setting( 'my-optionpage-groups', 'mst' ); 
		register_setting( 'my-optionpage-groups', 'youtube'); 
	    register_setting( 'my-optionpage-groups', 'zalo' );
	    register_setting( 'my-optionpage-groups', 'sky' );
	    register_setting( 'my-optionpage-groups', 'maps' );
	    register_setting( 'my-optionpage-groups', 'khac1' );
	    register_setting( 'my-optionpage-groups', 'khac2' );
		register_setting( 'my-optionpage-groups', 'khac3' );
		register_setting( 'my-optionpage-groups', 'khac4' );
	    register_setting( 'my-optionpage-groups', 'option_checkbox' );	
		register_setting( 'my-optionpage-groups', 'option_checkbox_head' );
	    register_setting( 'my-optionpage-groups', 'option_checkbox_phone' );
       	register_setting( 'my-optionpage-groups', 'wp_phonering_option_url' );
        register_setting( 'my-optionpage-groups', 'wp_phonering_option_phone' );
		register_setting( 'my-optionpage-groups', 'option_checkbox_fb' );
		register_setting( 'my-optionpage-groups', 'wp_phonering_option_url_fb' );
		register_setting( 'my-optionpage-groups', 'wp_phonering_option_url_fb_me' );
		register_setting( 'my-optionpage-groups', 'option_checkbox_all_vnhteam' );
        register_setting('my-optionpage-groups', 'vnhteam_icon_phone');
        register_setting('my-optionpage-groups', 'vnhteam_icon_mail');
        register_setting('my-optionpage-groups', 'vnhteam_icon_message');
        register_setting('my-optionpage-groups', 'vnhteam_icon_zalo');
        register_setting('my-optionpage-groups', 'vnhteam_icon_map');
        register_setting('my-optionpage-groups', 'vnhteam_icon_backgruod');
        register_setting('my-optionpage-groups', 'vnhteam_icon_chatkhac');
        register_setting('my-optionpage-groups', 'vnhteam_custom_theme');
        register_setting('my-optionpage-groups', 'vnhteam_menu_fix');
        register_setting('my-optionpage-groups', 'vnhteam_primary_color');
        register_setting('my-optionpage-groups', 'vnhteam_second_color');
        register_setting('my-optionpage-groups', 'vnhteam_sidebar_color');
	}

	//tao function view
	if(!function_exists('hf_my_settings_page')){
		function hf_my_settings_page() { ?>
		<div id="of_container">
			<form id="of_form" method="post" action="options.php">
				<?php settings_fields( 'my-optionpage-groups' ); ?>
				<div id="main">
					<div id="of-nav">
						<div class="logo">		
							<h3>
								<div class="logo-img"><img src="<?php echo plugins_url('/images/logo.png', __FILE__) ?>"></div><br>
								<span>DEV by Journey Đạt</span>
							</h3>
						</div>
						<ul class="tab-links">
							<li class="logoandicons current active"><a title="Logo and icons" href="#of-option-logoandicons">Hình logo & favicon</a></li>
						  	<li class="globalsettings"><a title="Global settings" href="#of-option-head">Chèn mã trong thẻ head</a></li>
							<li class="globalsettings"><a title="Global settings" href="#of-option-globalfooter">Chèn mã trong footer</a></li>
						  	<li class="globalsettings"><a title="Global settings" href="#of-option-globalother">Thông tin khác</a></li>
						  	<li class="globalsettings"><a title="Global settings" href="#of-option-phonering">Cài đặt Phonering</a></li>
							<li class="globalsettings"><a title="Global settings" href="#of-option-all">Cài đặt tổng nút liên hệ</a></li>
							<li class="globalsettings"><a title="Global settings" href="#of-option-theme">Tùy chỉnh giao diện admin</a></li>
						</ul>
					</div>
					<div id="content">
						<div class="wap-content">
							<!-- add logo -->
								<div class="group" id="of-option-logoandicons" style="display: block;">
									<?php 
										wp_enqueue_media();
										$my_saved_attachment_post_id = get_option( 'media_selector_attachment_id', 0 );
										$my_saved_attachment_post_id_favicon = get_option( 'media_selector_attachment_id_favicon', 0 );
									?>
									<script type='text/javascript'>
										jQuery( document ).ready( function( $ ) {
											// Uploading files
											var file_frame;
											var file_frame_favicon;
											var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
											var wp_media_post_id_favicon = wp.media.model.settings.post.id; // Store the old id
											var set_to_post_id = <?php echo $my_saved_attachment_post_id; ?>; // Set this
											jQuery('#upload_image_button').on('click', function( event ){
												event.preventDefault();
												// If the media frame already exists, reopen it.
												if ( file_frame ) {
													// Set the post ID to what we want
													file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
													// Open frame
													file_frame.open();
													return;
												} else {
													// Set the wp.media post id so the uploader grabs the ID we want when initialised
													wp.media.model.settings.post.id = set_to_post_id;
												}
												// Create the media frame.
												file_frame = wp.media.frames.file_frame = wp.media({
													title: 'Chọn hình ảnh upload',
													button: {
														text: 'Sử dụng ảnh này',
													},
													multiple: false	// Set to true to allow multiple files to be selected
												});
												// When an image is selected, run a callback.
												file_frame.on( 'select', function() {
													// We set multiple to false so only get one image from the uploader
													attachment = file_frame.state().get('selection').first().toJSON();
													// Do something with attachment.id and/or attachment.url here
													$( '#image-preview' ).attr( 'src', attachment.url ).css( 'width', 'auto' );
													$( '#image_attachment_id' ).val( attachment.id );
													// Restore the main post ID
													wp.media.model.settings.post.id = wp_media_post_id;
												});
													// Finally, open the modal
													file_frame.open();
											});
											var set_to_post_id_favicon = <?php echo $my_saved_attachment_post_id_favicon; ?>;
											jQuery('#upload_image_button_favicon').on('click', function( event ){
												event.preventDefault();
												// If the media frame already exists, reopen it.
												if ( file_frame_favicon ) {
													// Set the post ID to what we want
													file_frame_favicon.uploader.uploader.param( 'post_id', set_to_post_id_favicon );
													// Open frame
													file_frame_favicon.open();
													return;
												} else {
													// Set the wp.media post id so the uploader grabs the ID we want when initialised
													wp.media.model.settings.post.id = set_to_post_id_favicon;
												}
												// Create the media frame.
												file_frame_favicon = wp.media.frames.file_frame_favicon = wp.media({
													title: 'Chọn hình ảnh upload',
													button: {
														text: 'Sử dụng ảnh này',
													},
													multiple: false	// Set to true to allow multiple files to be selected
												});
												// When an image is selected, run a callback.
												file_frame_favicon.on( 'select', function() {
													// We set multiple to false so only get one image from the uploader
													attachment = file_frame_favicon.state().get('selection').first().toJSON();
													// Do something with attachment.id and/or attachment.url here
													$( '#image-preview_favicon' ).attr( 'src', attachment.url ).css( 'width', 'auto' );
													$( '#image_attachment_id_favicon' ).val( attachment.id );
													// Restore the main post ID
													wp.media.model.settings.post.id = wp_media_post_id_favicon;
												});
													// Finally, open the modal
													file_frame_favicon.open();
											});
											// Restore the main ID when the add media button is pressed
											jQuery( 'a.add_media' ).on( 'click', function() {
												wp.media.model.settings.post.id = wp_media_post_id;
											});
											jQuery( 'a.add_media' ).on( 'click', function() {
												wp.media.model.settings.post.id = wp_media_post_id_favicon;
											});
										});
									</script>
									<h2>Hình logo & favicon</h2>
									<div id="section-site_logo" class="section section-media ">
										<h3 class="heading">Logo website</h3>
										<div class="option">
											<div class="controls">
												<div class='image-preview-wrapper'>
													<img id='image-preview' src='<?php echo wp_get_attachment_url( get_option( 'media_selector_attachment_id' ) ); ?>' height='100'>
												</div>
												<input id="upload_image_button" type="button" class="button media_upload_button" value="<?php _e( 'Chọn LOGO' ); ?>" style="width: 28%; line-height: 0;" />
												<input type='hidden' name='image_attachment_id' id='image_attachment_id' value='<?php echo get_option( 'media_selector_attachment_id' ); ?>'>
											</div>
											<div class="explain">Upload logo tại đây.!</div>
											<div class="clear"> </div>
										</div>
									</div>
									<div id="section-" class="section section-info ">
										<h3 class="heading">Favicon (Biểu tượng site)</h3>
										<div class="controls">
											<div class='image-preview-wrapper'>
												<img id='image-preview_favicon' src='<?php echo wp_get_attachment_url( get_option( 'media_selector_attachment_id_favicon' ) ); ?>' height='100'>
											</div>
											<input id="upload_image_button_favicon" type="button" class="button media_upload_button" value="<?php _e( 'Chọn Favicon' ); ?>" style="width: 28%; line-height: 0;" />
											<input type='hidden' name='image_attachment_id_favicon' id='image_attachment_id_favicon' value='<?php echo get_option( 'media_selector_attachment_id_favicon' ); ?>'>
										</div>
										<div class="explain">Biểu tượng Site là những gì bạn nhìn thấy ở bên trái tên website ở đầu mỗi tab trên cửa sổ trình duyệt. Tải lên tại đây!
											<br>Icon cho trang web phải là hình vuông và ít nhất là 512 × 512 pixel.
										</div>
									</div>
								</div>
							<!-- end logo -->

							<!-- add code header -->
						  		<div class="group tab-ct" id="of-option-head">
						  			<h2>Mã code chèn trong thẻ HEAD</h2>
									<div id="section-minified_flatsome" class="section section-checkbox ">
										<h3 class="heading">Kích hoat head </h3>
										<div class="option">
											<div class="controls">
												<input type="hidden" class="checkbox of-input" name="minified_flatsome" id="minified_flatsome" value="0">
												<input type="checkbox" class="checkbox of-input" name="option_checkbox_head" id="minified_flatsome" value="1" <?php checked( '1', get_option( 'option_checkbox_head' ) ); ?>>
											</div>
											<div class="explain">Kích hoạt !!! Hiện thị trong HEAD
											</div>
											<div class="clear"> </div>
										</div>
									</div>
									<div id="section-html_scripts_footer" class="section section-textarea ">
										<h3 class="heading">Head Scripts</h3>
										<div class="option">
											<div class="controls">
												<textarea class="of-input" name="head_scripts" id="head_scripts" cols="8" rows="8"><?php echo get_option('head_scripts'); ?></textarea>
											</div>
											<div class="explain">Thêm đoạn code JS tùy chỉnh bên trong thẻ HEAD.</div>
											<div class="clear"> </div>
										</div>
									</div>
								</div>
							<!-- end code header -->

							<!-- add code footer -->
						  		<div class="group tab-ct" id="of-option-globalfooter">
						  			<h2>Mã code chèn trong footer</h2>
									<div id="section-minified_flatsome" class="section section-checkbox ">
										<h3 class="heading">Kích hoạt footer</h3>
										<div class="option">
											<div class="controls">
												<input type="hidden" class="checkbox of-input" name="minified_flatsome" id="minified_flatsome" value="0">
												<input type="checkbox" class="checkbox of-input" name="option_checkbox" id="minified_flatsome" value="1" <?php checked( '1', get_option( 'option_checkbox' ) ); ?>>
											</div>
											<div class="explain">Kích hoạt !!! hiển thị trong footer
											</div>
											<div class="clear"> </div>
										</div>
									</div>
									<div id="section-html_scripts_footer" class="section section-textarea ">
										<h3 class="heading">Footer Scripts</h3>
										<div class="option">
											<div class="controls">
												<textarea class="of-input" name="footer_scripts" id="footer_scripts" cols="8" rows="8"><?php echo get_option('footer_scripts'); ?></textarea>
											</div>
											<div class="explain">Đây là nơi để dán mã Google Analytics của bạn hoặc bất kỳ mã JS nào khác mà bạn có thể muốn thêm để được tải vào phần chân trang web của mình.</div>
											<div class="clear"> </div>
										</div>
									</div>
								</div>
							<!-- end code footer -->

							<!-- add code Thong tin khac Tab -->
						  		<div class="group tab-ct" id="of-option-globalother">
						  			<h2>Thông tin khác</h2>
									<div id="section-html_scripts_footer" class="section section-textarea ">
										<div class="option">
											<h3 class="heading">Tên công ty: </h3> 
											Mã: namecompany
											<div class="controls">
												<input class="of-input " name="namecompany" id="namecompany" type="text" value="<?php echo get_option('namecompany'); ?>">
											</div>
											<h3 class="heading">Địa chỉ 1: </h3> 
											Mã: address_1
											<div class="controls">
												<input class="of-input " name="address_1" id="address1" type="text" value="<?php echo get_option('address_1'); ?>">
											</div>
											<h3 class="heading">Địa chỉ 2: </h3>
											Mã: address_2
											<div class="controls">
												<input class="of-input " name="address_2" id="address2" type="text" value="<?php echo get_option('address_2'); ?>">
											</div>
											<h3 class="heading">Số điện thoại 1: </h3>
											Mã: phone_number1
											<div class="controls">
												<input class="of-input " name="phone_number1" id="number1" type="text" value="<?php echo get_option('phone_number1'); ?>">
											</div>
											<h3 class="heading">Số điện thoại 2: </h3>
											Mã: phone_number2
											<div class="controls">
												<input class="of-input " name="phone_number2" id="number2" type="text" value="<?php echo get_option('phone_number2'); ?>">
											</div>
											<h3 class="heading">Facebook </h3>
											Mã: facebook
											<div class="controls">
												<input class="of-input " name="facebook" id="number1" type="text" value="<?php echo get_option('facebook'); ?>">
											</div>
											<h3 class="heading">Gmail </h3>
											Mã: gmail
											<div class="controls">
												<input class="of-input " name="gmail" id="gmail" type="text" value="<?php echo get_option('gmail'); ?>">
											</div>
											<h3 class="heading">Mã số thuế </h3>
											Mã: mst
											<div class="controls">
												<input class="of-input " name="mst" id="mst" type="text" value="<?php echo get_option('mst'); ?>">
											</div>
											<h3 class="heading">Youtube </h3>
											Mã: youtube
											<div class="controls">
												<input class="of-input " name="youtube" id="youtube" type="text" value="<?php echo get_option('youtube'); ?>">
											</div>
											<h3 class="heading">Zalo </h3>
											Mã: zalo
											<div class="controls">
												<input class="of-input " name="zalo" id="number2" type="text" value="<?php echo get_option('zalo'); ?>">
											</div>
											<h3 class="heading">Sky </h3>
											Mã: sky
											<div class="controls">
												<input class="of-input " name="sky" id="number2" type="text" value="<?php echo get_option('sky'); ?>">
											</div>
											<h3 class="heading">Khác 1 </h3>
											Mã: khac1
											<div class="controls">
												<input class="of-input " name="khac1" id="khac1" type="text" value="<?php echo get_option('khac1'); ?>">
											</div>
											<h3 class="heading">Khác 2 </h3>
											Mã: khac2
											<div class="controls">
												<input class="of-input " name="khac2" id="khac2" type="text" value="<?php echo get_option('khac2'); ?>">
											</div>
											<h3 class="heading">Khác 3 </h3>
											Mã: khac3
											<div class="controls">
												<input class="of-input " name="khac3" id="khac3" type="text" value="<?php echo get_option('khac3'); ?>">
											</div>
											<h3 class="heading">Khác 4 </h3>
											Mã: khac4
											<div class="controls">
												<input class="of-input " name="khac4" id="khac4" type="text" value="<?php echo get_option('khac4'); ?>">
											</div>
											<h3 class="heading">Bản đồ </h3>
											Mã: maps
											<div class="controls">
												<textarea class="of-input" name="maps" id="maps" cols="8" rows="8"><?php echo get_option('maps'); ?></textarea>
											</div>
											<div class="clear"> </div>
										</div>
									</div>
								</div>
							<!-- end code Thong tin khac Tab -->

							<!-- add code Cai dat goi -->
						  		<div class="group tab-ct" id="of-option-phonering">
						  			<h2>Cài đặt gọi</h2>
						  			<div id="section-minified_flatsome" class="section section-checkbox ">
										<h3 class="heading">Kích hoạt phone gọi riêng</h3>
										<div class="option">
											<div class="controls">
												<input type="hidden" class="checkbox of-input" name="minified_flatsome" id="minified_flatsome" value="0">
												<input type="checkbox" class="checkbox of-input" name="option_checkbox_phone" id="minified_flatsome" value="1" <?php checked( '1', get_option( 'option_checkbox_phone' ) ); ?>>
											</div>
											<div class="explain">Kích hoạt !!! hiển thị phonering
											</div>
											<div class="clear"> </div>
										</div>
									</div>
								    <table class="form-table">
								        <tr valign="top">
								        	<th scope="row" style="width: 100px;">Link Target</th>
								        	<td><input size="40" type="url" name="wp_phonering_option_url" placeholder="" value="<?php echo get_option('wp_phonering_option_url'); ?> " style="width: 20%;"/></td>
								        </tr>
								        <tr valign="top">
									        <th scope="row" style="width: 100px;">Phone</th>
									        <td><input size="40" type="tel" name="wp_phonering_option_phone" placeholder="" value="<?php echo get_option('wp_phonering_option_phone'); ?>" style="width: 20%;"/></td>
								        </tr>
							    	</table>
								</div>
							<!-- end code Cai dat goi -->

							<!-- add code Tong nut lien he -->
						  		<div class="group tab-ct" id="of-option-all">
						  			<h2>Cài đặt tổng nút liên hệ</h2>
						  			<div id="section-minified_flatsome" class="section section-checkbox ">
										<h3 class="heading">Kích hoạt chat facebook</h3>
										<div class="option">
											<div class="controls">
												<input type="hidden" class="checkbox of-input" name="minified_flatsome" value="0">
												<input type="checkbox" class="checkbox of-input" name="option_checkbox_all_vnhteam" value="1" <?php checked( '1', get_option( 'option_checkbox_all_vnhteam' ) ); ?>>
											</div>
											<div class="explain">Kích hoạt !!! hiển thị nút liên hệ
											</div>
											<div class="clear"> </div>
										</div>
									</div>
								    <table class="form-table__lion">
								        <tr>
								            <th scope="row">Background</th>
								            <th scope="row" class="wap-color-vnhteam">
								              <input type="text"

								              value="<?php echo get_option('vnhteam_icon_backgruod'); ?>"

								              name="vnhteam_icon_backgruod"

								              class="my-color-field"

								              data-default-color="#effeff"

								              />
								            </th>
								        </tr>
								         <tr>
								            <th scope="row">Email</th>
								            <td >
								              <input type="text" name="vnhteam_icon_mail" value="<?php echo get_option('vnhteam_icon_mail'); ?>" placeholder="Nhập địa chỉ mail.">
								            </td>
								         </tr>
								         <!-- end mail -->
								         <tr>
								            <th scope="row">Phone</th>
								            <td >
								              <input type="number" name="vnhteam_icon_phone" value="<?php echo get_option('vnhteam_icon_phone'); ?>" placeholder="Nhập số điện thoại làm hotline của bạn.!!!">
								            </td>
								         </tr>
								         <!-- end phone -->
								         <tr>
								            <th scope="row">Message Facebook</th>
								            <td >
								              <input type="text" name="vnhteam_icon_message" value="<?php echo get_option('vnhteam_icon_message'); ?>" placeholder="Nhập id của page. VD: Fb.com/vinahost ID là vinahost ">
								            </td>
								         </tr>
								         <!-- end message -->
								         <tr>
								            <th scope="row">Zalo</th>
								            <td >
								              <input type="text" name="vnhteam_icon_zalo" value="<?php echo get_option('vnhteam_icon_zalo'); ?>" placeholder="Nhập số điện thoại zalo của bạn.">
								            </td>
								         </tr>
								         <!-- end zalo -->
								         <tr>
								            <th scope="row">Chat thứ 3</th>
								            <td >
								              <textarea class="of-input" name="vnhteam_icon_chatkhac" id="vnhteam_icon_chatkhac" cols="8" rows="8"><?php echo get_option('vnhteam_icon_chatkhac'); ?></textarea>
								              <div class="explain">Thêm đoạn code JS chat thứ 3 ở đây.</div>
								            </td>
								         </tr>
							      	</table>
								</div>
							<!-- end code Tong nut lien he -->

							<!-- add code Tùy chỉnh giao diện admin -->
								<div class="group tab-ct" id="of-option-theme">
									<h2>Tùy chỉnh giao diện admin</h2>
						  			<div id="section-minified_flatsome" class="section section-checkbox ">
										<h3 class="heading">Kích hoạt tùy chỉnh</h3>
										<div class="option">
											<div class="controls">
												<input type="hidden" class="checkbox of-input" name="minified_flatsome" id="minified_flatsome" value="0">
												<input type="checkbox" class="checkbox of-input" name="vnhteam_custom_theme" id="minified_flatsome" value="1" <?php checked( '1', get_option( 'vnhteam_custom_theme' ) ); ?>>
											</div>
											<div class="explain">Kích hoạt !!! tùy chỉnh giao diện
											</div>
											<div class="clear"> </div>
										</div>
									</div>
									<table class="form-table__lion">
								        <tr>
								            <td scope="row">Primary color</td>
								            <td scope="row" class="wap-color-vnhteam">
								              <input type="text" value="<?php echo get_option('vnhteam_primary_color'); ?>" name="vnhteam_primary_color" class="my-color-field" data-default-color="#ff7201" />
								            </td>
								        </tr>
								        <tr>
								            <td scope="row">Second color</td>
								            <td scope="row" class="wap-color-vnhteam">
								              <input type="text" value="<?php echo get_option('vnhteam_second_color'); ?>" name="vnhteam_second_color" class="my-color-field" data-default-color="#ffc21e" />
								            </td>
								        </tr>
								        <tr>
								            <td scope="row">Sidebar color</td>
								            <td scope="row" class="wap-color-vnhteam">
								              <input type="text" value="<?php echo get_option('vnhteam_sidebar_color'); ?>" name="vnhteam_sidebar_color" class="my-color-field" data-default-color="#0c0c20" />
								            </td>
								        </tr>
							      	</table>	
							      	<div id="section-minified_flatsome" class="section section-checkbox ">
										<h3 class="heading">Kích hoạt menu</h3>
										<div class="option">
											<div class="controls">
												<input type="hidden" class="checkbox of-input" name="minified_flatsome" id="minified_flatsome" value="0">
												<input type="checkbox" class="checkbox of-input" name="vnhteam_menu_fix" id="minified_flatsome" value="1" <?php checked( '1', get_option( 'vnhteam_menu_fix' ) ); ?>>
											</div>
											<div class="explain">Kích hoạt !!! Menu Fix
											</div>
											<div class="clear"> </div>
										</div>
									</div>						    
								</div>
							<!-- end code Giao dien Vina admin -->
						</div>
			  			<div class="save_bar" style="padding-left:0;"> 
							<input type="submit" name="submit" id="of_save" class="button button-primary" value="Lưu thay đổi">
						</div><!--.save_bar--> 

						<strong>Shortcode: </strong> gọi ra dùng VD: "<strong>[siteInfo args="phone"]</strong>" hiện tại build cho trường: phone, address, company, email <br>
						<strong>Lưu ý: </strong> gọi ra dùng "<strong>get_option('#MÃ');</strong>" <br>
						<strong>Đối với WPML: </strong> dùng "<strong> vd: echo __(#mã option,'flatsome');</strong>" đề dịch chuổi string.!
				  	</div>
					<div class="clear"></div>
				</div>
				<script type="text/javascript">
					jQuery(document).ready(function() {
						jQuery('#of-nav .tab-links a').on('click', function(e) {
							var currentAttrValue = jQuery(this).attr('href');
							// Show/Hide Tabs
							jQuery('.group ' + currentAttrValue).show().siblings().hide();
							// Change/remove current tab to active
							jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
							e.preventDefault();
						});
					});
				</script>
			</form>
			<div id="saveResult"></div>
			<script type="text/javascript">
				jQuery(document).ready(function() {
				   jQuery('#of_form').submit(function() {
				      jQuery(this).ajaxSubmit({
				         success: function(){
				            jQuery('#saveResult').html("<div id='saveMessage' class='successModal'></div>");
				            jQuery('#saveMessage').append("<p><?php echo htmlentities(__('Settings Saved Successfully','wp'),ENT_QUOTES); ?></p>").show();
				         }, 
				         timeout: 5000
				      }); 
				      setTimeout("jQuery('#saveMessage').hide('slow');", 5000);
				      return false; 
				   });
				});
			</script>
		</div>
	<?php }
	} /*end all*/


	// add load option footer
	function header_hf_load(){
		$rrr = get_option( 'option_checkbox' );
		if ($rrr) {
			echo get_option('footer_scripts');
		}
	}
	add_action( 'wp_footer', 'header_hf_load' );
	function menu_fix_flasome(){
		$theme = get_option( 'vnhteam_menu_fix' ); 
		if ($theme) {
			?>
			<script>
			   jQuery(document).ready(function($) {
			      $(window).load(function() {
			        // The slider being synced must be initialized first        
			        $( ".header-nav-main >li" ).hover(function() {
			          var totalw = $('.container').offset().left;
			          var leftw = $(this).offset().left;
			          var rts = ($(window).width() - (leftw + $(this).outerWidth()));          
			          var wd = $('#header .nav-dropdown').width()*2;
			          var tong = totalw/2+rts-50;
			           if(tong<wd){
			            $(this).find('.nav-dropdown ul').css({"left": "unset", "right": "100%"});
			           }
			          
			        });
			      });
			   });   
			</script>

		<?php
			wp_register_style('fix_menu_css_styles', plugins_url('/css/fix_menu.css', __FILE__));
	    	wp_enqueue_style('fix_menu_css_styles');
		}
		
	}
	
	add_action( 'wp_footer', 'menu_fix_flasome' );
	// add load another chat
	function loadchatkhac(){
		$rrr = get_option( 'vnhteam_icon_chatkhac' ); 
		if ($rrr) {
			echo get_option('vnhteam_icon_chatkhac');
		}
	}
	add_action( 'wp_footer', 'loadchatkhac' );

	// add load option header
	function head_hf_load(){
		$id_logo_favicon =  get_option( 'media_selector_attachment_id_favicon' );
		$url_logo_favicon = wp_get_attachment_url($id_logo_favicon);
		?>
			<link rel="icon" href="<?php echo $url_logo_favicon; ?>" sizes="32x32" />
			<link rel="icon" href="<?php echo $url_logo_favicon; ?>" sizes="192x192" />
		<?php
		$head = get_option( 'option_checkbox_head' ); 
		if ($head) {
			echo get_option('head_scripts');
		}
	}
	add_action( 'wp_head', 'head_hf_load' );

	// add phonering_loads
	add_action( 'wp_footer', 'phonering_loads' );
	function phonering_loads()
	{
		$phone_ring = get_option( 'option_checkbox_phone' );
		if ($phone_ring) {
			?>
				<a href="tel:<?php echo get_option('wp_phonering_option_phone'); ?>">
		            <div class="coccoc-alo-phone coccoc-alo-green coccoc-alo-show" id="coccoc-alo-phoneIcon">
		                <div class="coccoc-alo-ph-circle"></div>
		                <div class="coccoc-alo-ph-circle-fill"></div>
		                <div class="coccoc-alo-ph-img-circle"></div>
		            </div>
		        </a>
			<?php
		}
	}

	// add all contact button
	$nutlienhe = get_option( 'option_checkbox_all_vnhteam' ); 
	if ($nutlienhe) {
	    add_action('wp_footer', 'add_template_contact_icon');
	    function add_template_contact_icon(){
	        include(PLUGIN_RIR . 'template-fontend.php');
	    }
	}

	// add js color picker
    add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker');
    function mw_enqueue_color_picker( $hook_suffix ) {
        // first check that $hook_suffix is appropriate for your admin page
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'my-script-handle', plugins_url('color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
  	}	

	// add fb_loads
	function fb_loads()
	{
		$fb = get_option( 'option_checkbox_fb' ); 
		if ($fb) {
			?>
				<div class="fb-livechat"> 
					<div class="ctrlq fb-overlay"></div>
					<div class="fb-widget"> 
						<div class="ctrlq fb-close"></div>
						<div class="fb-page" data-href="<?php echo get_option('wp_phonering_option_url_fb'); ?>" data-tabs="messages" data-width="360" data-height="400" data-small-header="true" data-hide-cover="true" data-show-facepile="false"> </div>
						<div class="fb-credit"> <a href="<?php echo get_option('wp_phonering_option_url_fb_me'); ?>" target="_blank">Powered by Vinahost</a> </div>
						<div id="fb-root"></div>
					</div>
					<a href="<?php echo get_option('wp_phonering_option_url_fb_me'); ?>" title="Gửi tin nhắn cho chúng tôi qua Facebook" class="ctrlq fb-button">
						<div class="bubble">1</div>
						<div class="bubble-msg">Bạn cần hỗ trợ?</div>
					</a>
				</div>
				<script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9"></script>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
				<script>$(document).ready(function(){function detectmob(){if( navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i) ){return true;}else{return false;}}var t={delay: 125, overlay: $(".fb-overlay"), widget: $(".fb-widget"), button: $(".fb-button")}; setTimeout(function(){$("div.fb-livechat").fadeIn()}, 8 * t.delay); if(!detectmob()){$(".ctrlq").on("click", function(e){e.preventDefault(), t.overlay.is(":visible") ? (t.overlay.fadeOut(t.delay), t.widget.stop().animate({bottom: 0, opacity: 0}, 2 * t.delay, function(){$(this).hide("slow"), t.button.show()})) : t.button.fadeOut("medium", function(){t.widget.stop().show().animate({bottom: "30px", opacity: 1}, 2 * t.delay), t.overlay.fadeIn(t.delay)})})}});</script>

			<?php

		}
	}
	add_action( 'wp_footer', 'fb_loads' );

	// add menu page
	add_action('admin_menu', 'my_create_menu');
	if(!function_exists('my_create_menu')){
	    function my_create_menu() {
	        $page = add_menu_page( 'My Theme option', 'Supper Account', 'manage_options', 'my-optionpage', 'my_settings_page', 'dashicons-smiley', 6 );
	    }
	}

	// Create data sql
	global $wpdb; 
	$charset_collate  = $wpdb->get_charset_collate();
	$max_index_length = 191;
	$table = $wpdb->prefix . 'save_data';
	$wpdb->hocwpmeta = $table;	
	$sql = "CREATE TABLE IF NOT EXISTS $table (
		meta_id bigint(20) unsigned NOT NULL auto_increment,
		save_id int(20),
		save_data_text longtext,
		UNIQUE KEY id (meta_id)
	) $charset_collate;";

	if ( ! function_exists( 'dbDelta' ) ) {
	    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );	
	}
	dbDelta( $sql );
	// end sql

	//tao function view
	if(!function_exists('my_settings_page')){
		function my_settings_page() { ?>
			<div class="wrap">
			 	<h2>Theme Settings</h2>
			  	<form id="landingOptions" method="post" action="#">
					<?php settings_fields( 'my-settings-group' ); ?>
					<?php 
						global $menu, $submenu;
						global $wpdb;
						$table = $wpdb->prefix.'save_data';
						$sql = 'SELECT save_data_text FROM '.$table.' WHERE "meta_id" IS NOT NULL';
						if(count($wpdb->get_results($sql)) == 0)
					    {
					        $wpdb->insert($table, array(
								'save_id' => '999',
						    	'save_data_text' => 'my-optionpage',
							));	
					    }
					    else
					    {
					        $result = $wpdb->get_results($sql) or die(mysql_error());
					    }
						foreach ( $menu as $index => $meta ) { ?>
							<label class="switch">
							  <input 
									<?php 
										foreach( $result as $results ) {
										    if($results->save_data_text==$meta[2]){
										    	echo "checked";
										    }
										}
									?>
									type="checkbox" name="check_list[]" id="slideThree" value="<?php echo $meta[2]; ?>"> 
							  <span class="slider_check round"></span>
							  <span class="title-check"><?php echo $meta[0]; ?></span>
							</label>
						<?php
						}
					?>
					<input type="submit" class="button-primary" name="save" value="Save Changes" />
				</form>
				<?php
					if(isset($_POST['save'])){//to run PHP script on submit
						if(!empty($_POST['check_list'])){
						// Loop to store and display values of individual checked checkbox.
							$meta_id = 1;
							global $wpdb;
							$table = $wpdb->prefix . 'save_data';
							$wpdb->query('TRUNCATE TABLE '.$table);
							foreach($_POST['check_list'] as $selected){	
								$meta_id++;	
								global $wpdb;
								$wpdb->insert($table, array(
									'save_id' => $meta_id,
							    	'save_data_text' => $selected,
								));			
							}
							?>
								<script type="text/javascript">
									window.location.reload(); 
								</script>
							<?php
						}
					}	
				?>
			</div>
		<?php }
	} /*end all*/

	function st_register_styles() {
	    wp_register_style('st_trademark_styles', plugins_url('/css/style.css', __FILE__));
	    wp_enqueue_style('st_trademark_styles');

	    wp_register_script('jquery', plugins_url( '/js/jquery.js', __FILE__ ));
        wp_enqueue_script( 'jquery' );

	    wp_register_script('my-plugin-script', plugins_url( '/js/script.js', __FILE__ ));
        wp_enqueue_script( 'my-plugin-script' );
	}
	add_action('wp_print_scripts', 'st_register_styles');

	// Custom Admin footer
	function wpexplorer_remove_footer_admin () {
		echo 'Copyright by <a href="http://www.vinahost.vn" target="_blank">Vinahost</a>';
	}
	add_filter( 'admin_footer_text', 'wpexplorer_remove_footer_admin' );

	//add admin css
	function my_admin_theme_style() {
	    wp_enqueue_style('my-admin-theme', plugins_url('/css/admin.css', __FILE__));
	}
	add_action('admin_enqueue_scripts', 'my_admin_theme_style');

	// when active custom theme
	$theme = get_option( 'vnhteam_custom_theme' ); 
	if( $theme ):
		// add css & js
		function my_admin_theme() {
		    wp_enqueue_style('theme_css', plugins_url('/css/theme.css', __FILE__));
		    wp_enqueue_script('theme_js', plugins_url( '/js/theme.js', __FILE__ ));	

		    // add font awesome
		    wp_enqueue_style('fontawesome_css', plugins_url('/css/fontawesome/css/fontawesome.css', __FILE__));
		    wp_enqueue_style('brands_css', plugins_url('/css/fontawesome/css/brands.css', __FILE__));
		    wp_enqueue_style('solid_css', plugins_url('/css/fontawesome/css/solid.css', __FILE__));  
		    wp_enqueue_style('regular_css', plugins_url('/css/fontawesome/css/regular.css', __FILE__));   
		}
		add_action('admin_enqueue_scripts', 'my_admin_theme');

		// add javascript footer admin
		add_action('admin_footer', 'my_admin_add_js');
		function my_admin_add_js() {			
			// add logo icon
			$id_logo =  get_option( 'media_selector_attachment_id' );
			$url_logo = wp_get_attachment_url($id_logo);
			if( $url_logo ):
				$logo = $url_logo;
			else:
				$logo = plugins_url('/images/vinahost.png', __FILE__);
			endif;
			?>
				<!-- add custom java script -->
				<script type="text/javascript" defer>
					jQuery(function($) {		
						// add icon logo
						$('#adminmenuwrap #adminmenu').prepend('<li class="menu_top menu_logo"><a href="<?php echo site_url(); ?>" class="menu-top"><img src="<?php echo $logo; ?>" ></a></li>');
					});
				</script>
			<?php
		}

		// add custom style footer admin
		add_action('admin_footer', 'custom_style_footer');
		function custom_style_footer() {
			$pri = get_option('vnhteam_primary_color'); 
			$sec = get_option('vnhteam_second_color'); 
			$sidebar = get_option('vnhteam_sidebar_color');
			if( $pri ):
				$col_pri = $pri;
			else:
				$col_pri = '#ff7201';
			endif;
			if( $sec ):
				$col_sec = $sec;
			else:
				$col_sec = '#ffc21e';
			endif;
			if( $sidebar ):
				$col_sidebar = $sidebar;
			else:
				$col_sidebar = '#0c0c20';
			endif;
			?>
				<!-- add custom style sidebar admin -->
				<style type="text/css">
					/* #wpadminbar */
					#wpadminbar
					{
						background-color: <?php echo $col_sidebar; ?> !important;
					}
					#wpadminbar #wp-toolbar > ul > li:hover > a, #wpadminbar #wp-toolbar > ul > li > a:hover, #wpadminbar #wp-toolbar > ul > li > a:focus
					{
						text-shadow: 1px 1px 0 rgba(0,0,0,.2);
					    background: <?php echo $col_pri; ?>;
					    background: -moz-linear-gradient(top,<?php echo $col_sec; ?> 0%,<?php echo $col_pri; ?> 100%);
					    background: -webkit-gradient(linear,left top,left bottom,color-stop(0%,<?php echo $col_sec; ?>),color-stop(100%,<?php echo $col_pri; ?>));
					    background: -webkit-linear-gradient(top,<?php echo $col_sec; ?> 0%,<?php echo $col_pri; ?> 100%);
					    background: -o-linear-gradient(top,<?php echo $col_sec; ?> 0%,<?php echo $col_pri; ?> 100%);
					    background: -ms-linear-gradient(top,<?php echo $col_sec; ?> 0%,<?php echo $col_pri; ?> 100%);
					    background: linear-gradient(to bottom,<?php echo $col_sec; ?> 0%,<?php echo $col_pri; ?> 100%);
					    color: #fff;
					}					
					/* change backgroud color */
					#adminmenu, #adminmenuback, #adminmenuwrap, #adminmenu .wp-submenu
					{
						background-color: <?php echo $col_sidebar; ?> !important;
					}
					/* change color when active menu */
					#adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head, #adminmenu .wp-menu-arrow, #adminmenu .wp-menu-arrow div, #adminmenu li.current a.menu-top, #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, .folded #adminmenu li.current.menu-top, .folded #adminmenu li.wp-has-current-submenu
					{
						text-shadow: 1px 1px 0 rgba(0,0,0,.2);
					    background: <?php echo $col_pri; ?>;
					    background: -moz-linear-gradient(top,<?php echo $col_sec; ?> 0%,<?php echo $col_pri; ?> 100%);
					    background: -webkit-gradient(linear,left top,left bottom,color-stop(0%,<?php echo $col_sec; ?>),color-stop(100%,<?php echo $col_pri; ?>));
					    background: -webkit-linear-gradient(top,<?php echo $col_sec; ?> 0%,<?php echo $col_pri; ?> 100%);
					    background: -o-linear-gradient(top,<?php echo $col_sec; ?> 0%,<?php echo $col_pri; ?> 100%);
					    background: -ms-linear-gradient(top,<?php echo $col_sec; ?> 0%,<?php echo $col_pri; ?> 100%);
					    background: linear-gradient(to bottom,<?php echo $col_sec; ?> 0%,<?php echo $col_pri; ?> 100%);
					}
					/* menu hover */
					#adminmenu li.menu-top:hover, #adminmenu li.opensub>a.menu-top, #adminmenu li>a.menu-top:focus
					{
						color: #fff !important;
					}
					#adminmenu li.menu-top:hover > a, #adminmenu li.menu-top.menu_hover > a
					{
						text-shadow: 1px 1px 0 rgba(0,0,0,.2);
					    background: <?php echo $col_pri; ?>;
					    background: -moz-linear-gradient(top,<?php echo $col_sec; ?> 0%,<?php echo $col_pri; ?> 100%);
					    background: -webkit-gradient(linear,left top,left bottom,color-stop(0%,<?php echo $col_sec; ?>),color-stop(100%,<?php echo $col_pri; ?>));
					    background: -webkit-linear-gradient(top,<?php echo $col_sec; ?> 0%,<?php echo $col_pri; ?> 100%);
					    background: -o-linear-gradient(top,<?php echo $col_sec; ?> 0%,<?php echo $col_pri; ?> 100%);
					    background: -ms-linear-gradient(top,<?php echo $col_sec; ?> 0%,<?php echo $col_pri; ?> 100%);
					    background: linear-gradient(to bottom,<?php echo $col_sec; ?> 0%,<?php echo $col_pri; ?> 100%);
						color: #fff !important;
					}
					#adminmenu li.menu-top > a:hover
					{
						color: #fff !important;
					}
					#adminmenu li a:focus div.wp-menu-image:before, #adminmenu li.opensub div.wp-menu-image:before, #adminmenu li:hover div.wp-menu-image:before
					{
						color: #fff !important;
					}
					/* page-title-action */
					.page-title-action
					{
						padding: 5px 15px !important;
					}
					.page-title-action:hover
					{
						text-shadow: 1px 1px 0 rgba(0,0,0,.2) !important;
					    background: <?php echo $col_pri; ?> !important;
					    background: -moz-linear-gradient(top,<?php echo $col_sec; ?> 0%,<?php echo $col_pri; ?> 100%) !important;
					    background: -webkit-gradient(linear,left top,left bottom,color-stop(0%,<?php echo $col_sec; ?>),color-stop(100%,<?php echo $col_pri; ?>)) !important;
					    background: -webkit-linear-gradient(top,<?php echo $col_sec; ?> 0%,<?php echo $col_pri; ?> 100%) !important;
					    background: -o-linear-gradient(top,<?php echo $col_sec; ?> 0%,<?php echo $col_pri; ?> 100%) !important;
					    background: -ms-linear-gradient(top,<?php echo $col_sec; ?> 0%,<?php echo $col_pri; ?> 100%) !important;
					    background: linear-gradient(to bottom,<?php echo $col_sec; ?> 0%,<?php echo $col_pri; ?> 100%) !important;
					    color: #fff !important;
					   border-color: transparent !important;
					}
					/* icon_color */
					.icon_color
					{
						color: #000;
					}
					/* table quick statics */
					#wp-statistics-quickstats-div #summary-stats tbody tr th:nth-child(1):before
					{
						color: <?php echo $col_pri; ?>;
					}
				</style>
			<?php
		}
	endif;	

	// admin_menu
	add_action('admin_menu', 'remove_item_base_user_role', 9000);
    function remove_item_base_user_role() {
        global $current_user;
        wp_get_current_user();
        //An bot menu item cho client de quan ly'
		$user_info = get_userdata(1);
        if($current_user->user_login != 'vina_admin') {
        	function disable_update_notifications()
			{
			    global $wp_version;
			    return (object) array(
			      'last_checked'=> time(),
			      'version_checked'=> $wp_version
			    );
			}
			add_filter('pre_site_transient_update_core','disable_update_notifications');
			add_filter('pre_site_transient_update_plugins','disable_update_notifications');
			add_filter('pre_site_transient_update_themes','disable_update_notifications');
			function hide_update_notice_to_all_but_admin_users() 
			{
			    if (!current_user_can('update_core')) {
			        remove_action( 'admin_notices', 'update_nag', 3 );
			    }
			}
			add_action( 'admin_head', 'hide_update_notice_to_all_but_admin_users', 1 );

			global $wpdb;
			$table = $wpdb->prefix . 'save_data';
			$sql = 'SELECT save_data_text FROM '.$table;
			$result = $wpdb->get_results($sql) or die(mysql_error());
			foreach( $result as $results ) {
				$name = $results->save_data_text;
		    	remove_menu_page($name);
			}

            add_action( 'admin_head', 'register_css_replacer' );
            function register_css_replacer() {
                ?>
                <style type="text/css">
                    .toplevel_page_flatsome-panel{
                        display: none;
                    }
                </style>
                <script type="text/javascript">
                	 jQuery(document).ready(function(){
				       var value = jQuery("#user_login").val();
				       if (value=='vina_admin') {
				       		jQuery('#password').remove();
				       		jQuery('.user-sessions-wrap').remove();
				       }
				    })
                </script>
                <?php
            }
            
            // check vnhteam_custom_theme 
            $theme = get_option( 'vnhteam_custom_theme' );
            if( $theme ):
            	global $pagenow;
            	if( $pagenow == 'index.php' ):
            		add_action( 'admin_head', 'hide_button_not_vinaadmin' );
		            function hide_button_not_vinaadmin() {
		                ?>
			                <style type="text/css">
			                    #screen-options-link-wrap
			                    {
			                    	display: none;
			                    }
			                </style>
		                <?php
		            }
        		endif;
        		add_action('admin_footer', 'custom_meta_box_admin');
				function custom_meta_box_admin() { 
					?>
						<!-- add custom java script -->
						<script type="text/javascript" defer>
							jQuery(function($) {		
								// change position meta box dashboard
								$('#dashboard-widgets-wrap #dashboard-widgets #postbox-container-3 .meta-box-sortables').append($('#dashboard-widgets-wrap #dashboard-widgets #postbox-container-1 #dashboard_activity'));
								$('#dashboard-widgets-wrap #dashboard-widgets #postbox-container-2 .meta-box-sortables').append($('#dashboard-widgets-wrap #dashboard-widgets #postbox-container-1 #wp-statistics-hits-widget'));
							});
						</script>
					<?php
				}         	
            endif;
        }
        else{
            add_action( 'admin_head', 'register_css_replacers' );
            function register_css_replacers() {
                ?>
                <style type="text/css">
                    li#wp-admin-bar-flatsome_panel, li#wp-admin-bar-flatsome-activate {
                        display: block!important;
                    }
                </style>
                <?php
            }

            add_action('admin_footer', 'custom_meta_box_admin');
			function custom_meta_box_admin() { 
				?>
					<!-- add custom java script -->
					<script type="text/javascript" defer>
						jQuery(function($) {		
							// change position meta box dashboard
							$('#dashboard-widgets-wrap #dashboard-widgets #postbox-container-3 .meta-box-sortables').append($('#dashboard-widgets-wrap #dashboard-widgets #postbox-container-1 #dashboard_activity'));
							$('#dashboard-widgets-wrap #dashboard-widgets #postbox-container-2 .meta-box-sortables').append($('#dashboard-widgets-wrap #dashboard-widgets #postbox-container-1 #wp-statistics-hits-widget'));
						});
					</script>
				<?php
			}
        }
    }

    // list active dashboard widgets
	function remove_dashboard_widgets() {
	    global $wp_meta_boxes;
	    // var_dump($wp_meta_boxes);
	 
	 	unset($wp_meta_boxes['dashboard']['normal']['high']['dashboard_php_nag']);
	    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
	    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	    unset($wp_meta_boxes['dashboard']['side']['high']['wpseo-dashboard-overview']);

	    remove_meta_box( 'wpseo-dashboard-overview', 'dashboard', 'side' );
	    remove_meta_box( 'wp-statistics-summary-widget', 'dashboard', 'side' );
	    remove_meta_box( 'wp-statistics-pages-widget', 'dashboard', 'side' );
	    remove_meta_box( 'wp-statistics-browsers-widget', 'dashboard', 'side' );
	    remove_meta_box( 'wp-statistics-referring-widget', 'dashboard', 'side' );
	    remove_meta_box( 'wp-statistics-search-widget', 'dashboard', 'side' );
     	remove_meta_box( 'wp-statistics-words-widget', 'dashboard', 'side' );
     	remove_meta_box( 'wp-statistics-top-visitors-widget', 'dashboard', 'side' );
     	remove_meta_box( 'wp-statistics-recent-widget', 'dashboard', 'side' );
     	remove_meta_box( 'wp-statistics-hitsmap-widget', 'dashboard', 'side' );
     	remove_meta_box( 'woocommerce_dashboard_recent_reviews', 'dashboard', 'side' );
     	remove_meta_box( 'woocommerce_dashboard_status', 'dashboard', 'side' );
	    remove_action('welcome_panel', 'wp_welcome_panel');
	 
	}	 
	add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );


?>