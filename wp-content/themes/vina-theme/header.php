<!DOCTYPE html>
<!--[if IE 9 ]> <html <?php language_attributes(); ?> class="ie9 <?php flatsome_html_classes(); ?>"> <![endif]-->
<!--[if IE 8 ]> <html <?php language_attributes(); ?> class="ie8 <?php flatsome_html_classes(); ?>"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> class="<?php flatsome_html_classes(); ?>"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/jquery.fullPage.css" />
  <link rel="stylesheet/less" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/styles.less" />
  <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.7.1/less.min.js" ></script>
	<?php wp_head(); ?>

</head>


<body <?php body_class(); // Body classes is added from inc/helpers-frontend.php ?>>
  <?php
function isMobileDevice() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
if(isMobileDevice()){
   
}
else {
    ?> <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery.fullPage.js"></script> <?php
}
?>


<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'flatsome' ); ?></a>

<div id="wrapper">

<?php do_action('flatsome_before_header'); ?>

<header id="header" class="header <?php flatsome_header_classes();  ?>">
   <div class="header-wrapper">
	<?php
		get_template_part('template-parts/header/header', 'wrapper');
	?>
   </div><!-- header-wrapper-->
</header>

<?php do_action('flatsome_after_header'); ?>

<main id="main" class="<?php flatsome_main_classes();  ?>">
<!-- 	<div class="overlay_load">
  		<div class="overlay_load-loader">
  			<?php $id_logo =  get_option( 'media_selector_attachment_id' ); ?>
			<?php $url_logo = wp_get_attachment_url($id_logo); ?>
			<img width="260" height="115" src="<?php echo $url_logo; ?>" class="header_logo header-logo" alt="Thiết kế nội thất hiện đại và tân cổ điển">
  		</div>
	</div> -->
<div class="page_bread">
    <?php echo do_shortcode('[block id="slide-page"]'); ?>
        <div class="container section-title-container" style="margin-top: 10px;">
            <?php echo do_shortcode('[sc_breadcumbs]'); ?>
        </div>
        <!-- add title page -->
        <style type="text/css">
            .cs_breadcumbs {
                padding: 10px 20px;
                background: #f1e9e9;
            }
            
            .home .page_bread,.page-template-default .page_bread {
                display: none;
            }
        </style>
</div>
	