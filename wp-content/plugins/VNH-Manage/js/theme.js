jQuery(document).ready(function($) {
	
	// Navigation accordion menu
	// $("body:not(.folded) #adminmenu > li.menu-top:not(.wp-has-current-submenu)").hover(function(){
	// 	$(this).find("ul.wp-submenu").slideToggle( "slow" );
	// }, function(){
	// 	$(this).find("ul.wp-submenu").slideToggle( "slow" );
	// });

	// $("body:not(.folded) #adminmenu > li.menu-top:not(.wp-has-current-submenu)").hover(function(){
	// 	$(this).find("ul.wp-submenu").slideToggle( "slow" );
	// }, function(){
	// 	$(this).find("ul.wp-submenu").slideToggle( "slow" );
	// });

	// add button arrow menu
	$('<span class="toggle"><i class="fas fa-plus"></i></span>').insertAfter($('#adminmenu li.menu-top.wp-has-submenu > a'));
	$("body:not(.folded) #adminmenu li.menu-top.wp-has-submenu.wp-has-current-submenu > span.toggle i").removeClass('fa-plus').addClass('fa-minus');

	// add event click menu admin
	$("body:not(.folded) #adminmenu li.menu-top.wp-has-submenu:not(.wp-has-current-submenu) > span.toggle").click(function(){
		$(this).parent().toggleClass('menu_hover');
		$(this).find('i').toggleClass('fa-plus','remove');
		$(this).find('i').toggleClass('fa-minus','add');
		$(this).parent().find("ul.wp-submenu").toggle('slow');
	});

	$("body:not(.folded) #adminmenu li.menu-top.wp-has-submenu.wp-has-current-submenu > span.toggle").click(function(){
		$(this).parent().toggleClass('menu_hover');
		$(this).find('i').toggleClass('fa-plus','remove');
		$(this).find('i').toggleClass('fa-minus','add');
		$(this).parent().find("ul.wp-submenu").toggle('slow');
	});

	// add class for menu item
	$('#menu-dashboard, #menu-posts, #menu-media, #menu-pages, #menu-comments, #toplevel_page_wpcf7, #menu-appearance, #menu-users, #menu-settings, #toplevel_page_woocommerce, #menu-posts-product').addClass('custom_menu');

	// change icon menu sidebar
	$('#menu-dashboard .wp-menu-image').html('<i class="fas fa-home"></i>');
	$('#menu-posts .wp-menu-image').html('<i class="fas fa-newspaper"></i>');
	$('#menu-media .wp-menu-image').html('<i class="fas fa-photo-video"></i>');
	$('#menu-pages .wp-menu-image').html('<i class="fas fa-pager"></i>');
	$('#menu-comments .wp-menu-image').html('<i class="far fa-comment-dots"></i>');
	$('#toplevel_page_wpcf7 .wp-menu-image').html('<i class="fas fa-envelope-open-text"></i>');
	$('#menu-appearance .wp-menu-image').html('<i class="fab fa-yelp"></i>');
	$('#menu-users .wp-menu-image').html('<i class="fas fa-user-cog"></i>');
	$('#menu-settings .wp-menu-image').html('<i class="fas fa-cogs"></i>');
	$('#toplevel_page_woocommerce .wp-menu-image').html('<i class="fas fa-shopping-cart"></i>');
	$('#menu-posts-product .wp-menu-image').html('<i class="fas fa-store-alt"></i>');

	// add icon Quick Stats
	$('#dashboard-widgets-wrap #dashboard-widgets #wp-statistics-quickstats-widget h2.hndle').prepend('<i class="fas fa-chart-pie icon_color"></i>');
	$('#dashboard-widgets-wrap #dashboard-widgets #wp-statistics-hits-widget h2.hndle').prepend('<i class="fas fa-chart-area icon_color"></i>');
	$('#dashboard-widgets-wrap #dashboard-widgets #dashboard_activity h2.hndle').prepend('<i class="far fa-newspaper icon_color"></i>');

});