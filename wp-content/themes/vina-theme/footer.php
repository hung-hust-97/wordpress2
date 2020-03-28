<?php
/**
 * The template for displaying the footer.
 *
 * @package flatsome
 */

global $flatsome_opt;
?>

</main><!-- #main -->

<script type="text/javascript">
(function($) {
  $(function() { //on DOM ready 
        $("#scroller").simplyScroll();
  });
 })(jQuery);
</script> 
<script type="text/javascript">
  jQuery(document).ready(function() {
    jQuery('#fullpage').fullpage({
      verticalCentered: false,
      fixedElements: '#footer',
      navigation: true,
      controlArrows: false,
      resetSliders: 100,
      afterLoad: function(anchorLink, index){
         if(index == 8 )
            {
              jQuery('footer').addClass('footer_fixed');
            }else{
              jQuery('footer').removeClass('footer_fixed');
            }
          if (index == 7) {
              autoslide = setInterval(function() {
                  jQuery.fn.fullpage.moveSlideRight();
              }, 7000);
          }
      },

    });
 
  });

</script>



<footer id="footer" class="footer-wrapper">
<div class="menu_footerr">
<div class=" menu_fot">
<?php echo do_shortcode('[menu name="menu-footer"]'); ?>
</div>
</div>

	<?php do_action('flatsome_footer'); ?>

</footer><!-- .footer-wrapper -->


</div><!-- #wrapper -->
<!-- 
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
<script id="rendered-js">
  ;(function () {

  'use strict';

  var btn = document.querySelector('.button'),
  overlay = document.querySelector('.overlay_load'),
  loader = document.querySelector('.overlay_load-loader'),
  overlayTL = new TimelineMax(),
  loaderTL = new TimelineMax();

  var animateOut = function () {
    overlayTL.to(overlay, .6, { left: '100%', ease: Power4.easeInOut, delay: .25 });
    loaderTL.to(loader, .5, { y: '-40', opacity: 0 });
  };

  var animateOut_2 = function () {
    overlayTL.to(overlay, .6, { right: '100%', ease: Power4.easeInOut, delay: .25 });
    loaderTL.to(loader, .5, { y: '40', opacity: 0 });
  };

  var animateIn = function () {
    overlayTL.fromTo(overlay, .6, { right: '100%', left: 0 }, { right: 0, ease: Power4.easeInOut });
    loaderTL.fromTo(loader, .1, { y: '40', opacity: 0, delay: .1 }, { y: 0, opacity: 1, delay: .6, ease: Power2.easeOut });
  };

  animateIn();
    setTimeout(animateOut_2, 1500);

 
  
})();
          //# sourceURL=pen.js
        </script> -->
<?php wp_footer(); ?>

</body>
</html>
