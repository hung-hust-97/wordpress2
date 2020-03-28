jQuery(function() {
	var currentTime = new Date();
	var year = currentTime.getFullYear();
	jQuery('body.login').append('<div class="copyright">Copyright © '+year+' VinaHost.vn. All Rights Reserved.</div>');
});
jQuery(document).ready(function() {
	jQuery('#of-nav .tab-links a').on('click', function(e) {
		var currentAttrValue = jQuery(this).attr('href');

		// Show/Hide Tabs
		jQuery('.wap-content ' + currentAttrValue).show().siblings().hide();

		// Change/remove current tab to active
		jQuery(this).parent('li').addClass('current').siblings().removeClass('current');

		e.preventDefault();
	});
});

// add jquery for template admin
jQuery(function($) {
	
});