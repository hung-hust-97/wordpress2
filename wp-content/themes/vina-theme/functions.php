<?php
// Add custom Theme Functions here
function vinahost_theme_name_scripts() {
    wp_enqueue_style( 'simplyscrollcss', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-simplyscroll/2.1.1/jquery.simplyscroll.min.css' );

    wp_enqueue_script( 'simplyscrolljs', "https://cdnjs.cloudflare.com/ajax/libs/jquery-simplyscroll/2.1.1/jquery.simplyscroll.min.js", array() );
}
add_action( 'wp_enqueue_scripts', 'vinahost_theme_name_scripts' );
// 

function custom_style() {
  wp_register_style('custom-style', get_stylesheet_directory_uri() . '/assets/css/simply.css', 'all' );
  wp_enqueue_style('custom-style');
}
add_action('wp_enqueue_scripts','custom_style');

require_once get_template_directory() . '/inc/builder/helpers.php';
require get_theme_file_path() .'/productf.php';
require get_theme_file_path() .'/productb.php';
// require get_theme_file_path() .'/calldatathumb1.php';
// require get_theme_file_path() .'/calldatathumf1.php';
require 'inc/Extension.php';

// video popup
function sc_video_popup() {
  ob_start();  
?>
	<span class="video-poput">
		<a href="<?php echo get_option('khac1'); ?>" class="open-video icon">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/iconvideo.png">
		</a>
	</span>

<?php
    $list_post = ob_get_contents();
    ob_end_clean();
    return $list_post;  
}
add_shortcode('sc_video_popup','sc_video_popup');


function my_acf_init() {
    if( function_exists('acf_add_options_page') ) {
        

        $option_pages = acf_add_options_page(array(
            'page_title'    => __('Theme Settings', 'doi_tac'),
            'menu_title'    => __('Đối tác', 'doi_tac'),
            'menu_slug'     => 'theme-settings',
            'position' => 8,
        ));
    }
    
}
add_action('acf/init', 'my_acf_init');


function create_doitac(){
    ob_start();
    ?>
        <ul id="scroller">
               <?php
                 if(get_field('doitac','option')){
                    foreach (get_field('doitac','option') as $key) {
              ?>
                    <li>
                    <a href="<?php echo $key['link'] ?>" target="_blank">
                    	<img src="<?php echo $key['hinh_anh']; ?>" width="290" height="200" />
                	</a>
                  </li>
              <?php
                    }
                 }
              ?>
               <!-- items mirrored twice, total of 12 -->
      
        </ul>           
    <?php
    $rs = ob_get_contents();
    ob_get_clean();
    return $rs;
}
add_shortcode( 'doitac', 'create_doitac' );

// footer 
function create_footer_info(){
    ob_start();
    ?>
	<div class="info_footer">
		<h3 class="hotline"> <?php echo __('Hotline support: ','vinahost') ?></h3>
		<div class="phone_hotline"><?php  echo do_shortcode('[siteInfo args="phone"]'); ?></div>
		<div class="info_company">
			<div class="address">
			<!--<span class="icon_add"><?php echo __('VPGD: ','vinahost') ?></span>
				<span class="content_add"><?php echo do_shortcode('[siteInfo args="address"]') ?></span>-->
			</div>
      <div class="address">
        <span class="icon_add"><?php echo __('Address:','vinahost') ?></span>
        <span class="content_add"><?php echo get_option('address_2') ?></span>
      </div>
			<div class="email">
				<span class="icon_email"><?php echo __('Email: ','vinahost') ?></span>
				<span class="content_email"><?php echo do_shortcode('[siteInfo args="email"]') ?></span>
			</div>
			<div class="">
				<span class="icon_website"><?php echo __('Website','vinahost') ?></span>
				<span class="content_website"><?php echo get_home_url(); ?></span>
			</div>
		</div>
	</div>          
    <?php
    $rs = ob_get_contents();
    ob_get_clean();
    return $rs;
}
add_shortcode( 'footer_info', 'create_footer_info' );

function sc_flowicon(){
    ob_start();
    $facebook = get_option('facebook');
    // $google = get_option('khac1');
    $twitter = get_option('khac2');
    $instagram = get_option('khac3');
    $skype = get_option('sky');
    $zalo = get_option('zalo');
    $youtube = get_option('youtube')
 
   
    ?>
    <div class="icon_social">
      <div class="social-icons follow-icons full-width text-left">
          <span class="facebook chat_icon">
            <a target="_blank" rel="noopener noreferrer" href="<?php echo $facebook ?>">
              <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/fb.png">
            </a>
          </span>
         <span class="google_plus chat_icon">
            <a target="_blank" rel="noopener noreferrer" href="https://google.com">
              <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/gg.png">
            </a>  
        </span>
       <span class="twitter chat_icon">
            <a target="_blank" rel="noopener noreferrer" href="<?php echo $twitter ?>">
              <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/tw.png">
            </a>
        </span>
         <span class="instagram chat_icon">
            <a target="_blank" rel="noopener noreferrer" href="<?php echo $instagram ?>">
              <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/ins.png">
            </a>
        </span>

         <span class="zalo chat_icon">
            <a target="_blank" rel="noopener noreferrer" href="https://zalo.me/<?php echo $zalo ?>">
              <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/zalo.png">
            </a>
        </span>
         <span class="youtube chat_icon">
            <a target="_blank" rel="noopener noreferrer" href="<?php echo $youtube ?>">
              <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/youtube.png">
            </a>
        </span>

        </span>          
      </div>
      <div class="view_onmap">
          <a href="<?php echo get_option('khac4'); ?>">
              <div class="icon-box featured-box icon_gt icon-box-left text-left">
                  <div class="icon-box-img" >
                      <div class="icon">
                          <div class="icon-inner">
                              <img width="60" height="50" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/Vector.png" class="attachment-medium size-medium" alt=""> </div>
                      </div>
                  </div>
                  <div class="icon-box-text last-reset" style="    margin-top: 10px;">
                      View on Google Map
                  </div>
              </div>

          </a>
      </div>
  </div>
    <?php
    $list_post = ob_get_contents();
    ob_end_clean();
    return $list_post; 
}
add_shortcode('sc_flowicon', 'sc_flowicon');

function sc_maps() {
  ob_start();  
    $maps = get_option('maps');
    echo $maps;

    $list_post = ob_get_contents();
    ob_end_clean();
    return $list_post;   
}
add_shortcode('sc_maps', 'sc_maps');

function create_facebook() {
  ob_start();     
    ?>
    <div id="fb-root"></div>
      <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3"></script>
        <div class="fb-page" data-href="<?php echo get_option('facebook') ?>" data-tabs="timeline" data-width="300" data-height="150" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?php echo get_option('facebook') ?>" class="fb-xfbml-parse-ignore"><a href="<?php echo get_option('facebook') ?>"></a></blockquote>
        </div>
    <?php
    $list_post = ob_get_contents();
    ob_end_clean();
    return $list_post;   
}
add_shortcode('sc_facebook', 'create_facebook');


function shortcode_thongke() {
    ob_start();

    ?>
        <ul class="thongke1">
        <li>
          
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mvcvisit.png" alt="mvcvisit"> <?php echo __('Today','vinahost') ?> : <?php echo do_shortcode('[wpstatistics stat=visits time=today]'); ?>
        </li>
        <li>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mvcyesterday.png" alt="mvcvisit">  <?php echo __('Yesterday','vinahost') ?> : <?php echo  do_shortcode('[wpstatistics stat=visits time=yesterday]'); ?>
        </li>
        <li>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mvctotal.png" alt="mvctotal">  <?php echo __('Total','vinahost') ?> : <?php echo 65000 + do_shortcode('[wpstatistics stat=visits time=total]'); ?>
        </li>
        <li>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mvconline.png" alt="mvctotal">  <?php echo __('Online','vinahost') ?> : <?php echo 1+ do_shortcode('[wpstatistics stat=usersonline]'); ?>
        </li>
    <?php
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}
add_shortcode( 'thongke', 'shortcode_thongke' );


function shortcode_topbar_txt() {
    ob_start();
    ?>
    <div class="row-topbar" style="display: flex;">
  <div class="col-top address" >
    <div class="txt_icon">
      <div class="div_img"></div>
      <div class="content_txt"> <?php echo do_shortcode('[siteInfo args="address"]') ?>    </div>
    </div>
  </div>

  <div class="col-top email">
    <div class="txt_icon">
      <div class="div_img"></div>
      <div class="content_txt"> <?php echo do_shortcode('[siteInfo args="email"]') ?> </div>
    </div>
  </div>

  <div class="col-top phone">
    <div class="txt_icon">
      <div class="div_img"></div>
      <div class="content_txt"> <?php echo do_shortcode('[siteInfo args="phone"]') ?></div>
    </div>
  </div>

</div>
    <?php
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}
add_shortcode( 'topbar_txt', 'shortcode_topbar_txt' );

function create_info_footer(){
    ob_start();
    ?>
    <div class="info_page_lienhe">
        <div class="img_footer">
          <img id='image-preview' src='<?php echo wp_get_attachment_url( get_option( 'media_selector_attachment_id' ) ); ?>' alt="">
        </div>
        <div class="sologan"><!--<h3 class="sologan" style="text-transform: capitalize;">Smarten up your Life</h3>--></div>
      <!-- <div class="lienhe_phone"><?php echo __('Phone: ','vinahost'); echo do_shortcode('[siteInfo args="phone"]'); ?></div>
        <div class="lienhe_email"><?php echo __('Email: ','vinahost'); echo do_shortcode('[siteInfo args="email"]'); ?></div>-->
    </div>

    <?php
    $rs = ob_get_contents();
    ob_get_clean();
    return $rs;
}
add_shortcode( 'info_footer', 'create_info_footer' );
function create_info_lienhe_page(){
    ob_start();
    ?>
    <div class="info_page_lienhe">
        <div class="lienhe_company row_border_bot"><?php echo do_shortcode('[siteInfo args="company"]'); ?></div>
       <!-- <div class="lienhe_address"><?php echo __('VPGD: ','vinahost'); echo do_shortcode('[siteInfo args="address"]'); ?></div>-->
        <div class="lienhe_phone"><?php echo __('Phone: ','vinahost'); echo do_shortcode('[siteInfo args="phone"]'); ?></div>
        <div class="lienhe_email"><?php echo __('Email: ','vinahost'); echo do_shortcode('[siteInfo args="email"]'); ?></div>
    </div>

    <?php
    $rs = ob_get_contents();
    ob_get_clean();
    return $rs;
}
add_shortcode( 'info_lienhe_page', 'create_info_lienhe_page' );
// print menu shortcode
function print_menu_shortcode($atts, $content = null) {
    extract(shortcode_atts(array( 'name' => null, ), $atts));
    return wp_nav_menu( array( 'menu' => $name, 'echo' => false ) );
}
add_shortcode('menu', 'print_menu_shortcode');
function sc_breadcumbs() {
  ob_start();
  ?>
    <div class="cs_breadcumbs">
        <?php echo do_shortcode('[wpseo_breadcrumb]'); ?>
    </div>
  <?php
  $content = ob_get_contents();
  ob_end_clean();
  return $content;
}
add_shortcode( 'sc_breadcumbs', 'sc_breadcumbs' );

//create shortcode language
function create_shortcode_language() {
  ob_start();
  $html = '';
 $languages = icl_get_languages('skip_missing=0&orderby=code');
  if(!empty($languages))
  {
    foreach($languages as $l)
    {
      $html.= '';
      if(!$l['active']) $html.= '<li class="languages"><a href="' . $l['url'] . '"><img src="' . $l['country_flag_url'] . '" height="12" alt="' . $l['language_code'] . '" width="18" /></a></li>';
      else
        $html.= '<li class="languages"><a href="' . $l['url'] . '"><img src="' . $l['country_flag_url'] . '" height="12" alt="' . $l['language_code'] . '" width="18" /></a></li>';
      $html.= '';
    }
  }
  $html.= '';
  ob_end_clean();
  return $html;
}
add_shortcode('shortcode_language', 'create_shortcode_language');
/**
 *Them vao function
 *Chuc nang leech hinh anh tu web duoc copy ve media cua wordpress
 */
class Auto_Save_Images{
 
     function __construct(){ 
     
     add_filter( 'content_save_pre',array($this,'post_save_images') ); 
     }
     
     function post_save_images( $content ){
     if( ($_POST['save'] || $_POST['publish'] )){
     set_time_limit(240);
     global $post;
     $post_id=$post->ID;
     $preg=preg_match_all('/<img.*?src="(.*?)"/',stripslashes($content),$matches);
     if($preg){
     foreach($matches[1] as $image_url){
     if(empty($image_url)) continue;
     $pos=strpos($image_url,$_SERVER['HTTP_HOST']);
     if($pos===false){
     $res=$this->save_images($image_url,$post_id);
     $replace=$res['url'];
     $content=str_replace($image_url,$replace,$content);
     }
     }
     }
     }
     remove_filter( 'content_save_pre', array( $this, 'post_save_images' ) );
     return $content;
     }
     
     function save_images($image_url,$post_id){
     $file=file_get_contents($image_url);
     $post = get_post($post_id);
     $posttitle = $post->post_title;
     $postname = sanitize_title($posttitle);
     $im_name = "$postname-$post_id.jpg";
     $res=wp_upload_bits($im_name,'',$file);
     $this->insert_attachment($res['file'],$post_id);
     return $res;
     }
     
     function insert_attachment($file,$id){
     $dirs=wp_upload_dir();
     $filetype=wp_check_filetype($file);
     $attachment=array(
     'guid'=>$dirs['baseurl'].'/'._wp_relative_upload_path($file),
     'post_mime_type'=>$filetype['type'],
     'post_title'=>preg_replace('/\.[^.]+$/','',basename($file)),
     'post_content'=>'',
     'post_status'=>'inherit'
     );
     $attach_id=wp_insert_attachment($attachment,$file,$id);
     $attach_data=wp_generate_attachment_metadata($attach_id,$file);
     wp_update_attachment_metadata($attach_id,$attach_data);
     return $attach_id;
     }
}
new Auto_Save_Images();

/**
 *Ket thuc function leech hinh anh
 */