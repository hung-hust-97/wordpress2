<?php $color = get_option('vnhteam_icon_backgruod'); ?>
<style>
	.RmyIcon{
		border:15px solid <?=$color?>;
	}
	.Rcircle-over,.Rcircle-over{
		background-color:<?=$color?>;
	}
	.Rhide-close{
		border:15px solid <?=$color?>;
		background-color:<?=$color?>;
	}
	.RmyIcon i, .RmyIcon svg{
		color:<?=$color?>;
	}
</style>
  <?php 
      $mes = get_option('vnhteam_icon_message');
      $emails = get_option('vnhteam_icon_mail');
      $zalos = get_option('vnhteam_icon_zalo');
      $phones = get_option('vnhteam_icon_phone');
  ?>
<section class="Rcircle-contact">
    <!-- Circle button -->
    <div class="Rcircle-btn" onclick="toggleDisplay()">
        <?php
          if ($mes) {
            ?>
            <!-- Messenger -->
              <div class="RmyIcon" id="Rfad">
                  <i class="fab fa-facebook-messenger"></i>
              </div>
            <?php
          }
        ?>
        <?php
          if ($emails) {
            ?>
            <!-- Email -->

            <div class="RmyIcon" id="Rfad">
                <i class="far fa-envelope"></i>
            </div>
            <?php
          }
        ?>
        <?php
          if ($zalos) {
            ?>
            <!-- Zalo -->
            <div class="RmyIcon" id="Rfad">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 460.1 436.6">
                    <path fill="currentColor" class="st0"
                          d="M82.6 380.9c-1.8-.8-3.1-1.7-1-3.5 1.3-1 2.7-1.9 4.1-2.8 13.1-8.5 25.4-17.8 33.5-31.5 6.8-11.4 5.7-18.1-2.8-26.5C69 269.2 48.2 212.5 58.6 145.5 64.5 107.7 81.8 75 107 46.6c15.2-17.2 33.3-31.1 53.1-42.7 1.2-.7 2.9-.9 3.1-2.7-.4-1-1.1-.7-1.7-.7-33.7 0-67.4-.7-101 .2C28.3 1.7.5 26.6.6 62.3c.2 104.3 0 208.6 0 313 0 32.4 24.7 59.5 57 60.7 27.3 1.1 54.6.2 82 .1 2 .1 4 .2 6 .2H290c36 0 72 .2 108 0 33.4 0 60.5-27 60.5-60.3v-.6-58.5c0-1.4.5-2.9-.4-4.4-1.8.1-2.5 1.6-3.5 2.6-19.4 19.5-42.3 35.2-67.4 46.3-61.5 27.1-124.1 29-187.6 7.2-5.5-2-11.5-2.2-17.2-.8-8.4 2.1-16.7 4.6-25 7.1-24.4 7.6-49.3 11-74.8 6zm72.5-168.5c1.7-2.2 2.6-3.5 3.6-4.8 13.1-16.6 26.2-33.2 39.3-49.9 3.8-4.8 7.6-9.7 10-15.5 2.8-6.6-.2-12.8-7-15.2-3-.9-6.2-1.3-9.4-1.1-17.8-.1-35.7-.1-53.5 0-2.5 0-5 .3-7.4.9-5.6 1.4-9 7.1-7.6 12.8 1 3.8 4 6.8 7.8 7.7 2.4.6 4.9.9 7.4.8 10.8.1 21.7 0 32.5.1 1.2 0 2.7-.8 3.6 1-.9 1.2-1.8 2.4-2.7 3.5-15.5 19.6-30.9 39.3-46.4 58.9-3.8 4.9-5.8 10.3-3 16.3s8.5 7.1 14.3 7.5c4.6.3 9.3.1 14 .1 16.2 0 32.3.1 48.5-.1 8.6-.1 13.2-5.3 12.3-13.3-.7-6.3-5-9.6-13-9.7-14.1-.1-28.2 0-43.3 0zm116-52.6c-12.5-10.9-26.3-11.6-39.8-3.6-16.4 9.6-22.4 25.3-20.4 43.5 1.9 17 9.3 30.9 27.1 36.6 11.1 3.6 21.4 2.3 30.5-5.1 2.4-1.9 3.1-1.5 4.8.6 3.3 4.2 9 5.8 14 3.9 5-1.5 8.3-6.1 8.3-11.3.1-20 .2-40 0-60-.1-8-7.6-13.1-15.4-11.5-4.3.9-6.7 3.8-9.1 6.9zm69.3 37.1c-.4 25 20.3 43.9 46.3 41.3 23.9-2.4 39.4-20.3 38.6-45.6-.8-25-19.4-42.1-44.9-41.3-23.9.7-40.8 19.9-40 45.6zm-8.8-19.9c0-15.7.1-31.3 0-47 0-8-5.1-13-12.7-12.9-7.4.1-12.3 5.1-12.4 12.8-.1 4.7 0 9.3 0 14v79.5c0 6.2 3.8 11.6 8.8 12.9 6.9 1.9 14-2.2 15.8-9.1.3-1.2.5-2.4.4-3.7.2-15.5.1-31 .1-46.5z">
                    </path>
                </svg>
            </div>
            <?php
          }
        ?>
        <?php
          if ($phones) {
            ?>
            <!-- Phone -->
            <div class="RmyIcon" id="Rfad">
                <i class="fa fa-phone"></i>
            </div>
            <?php
          }
        ?>





        <div class="Rhide-close" id="Rhide-close">
            <svg width="12" height="13" viewBox="0 0 14 14" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="Canvas" transform="translate(-4087 108)">
                    <g id="Vector">
                        <use xlink:href="#path0_fill" transform="translate(4087 -108)" fill="currentColor"></use>
                    </g>
                </g>
                <defs>
                    <path id="path0_fill" d="M 14 1.41L 12.59 0L 7 5.59L 1.41 0L 0 1.41L 5.59 7L 0 12.59L 1.41 14L 7 8.41L 12.59 14L 14 12.59L 8.41 7L 14 1.41Z">
                    </path>
                </defs>
            </svg>
        </div>
        <div class="Rcircle-over"></div>
        <div class="Rcircle-over"></div>
    </div>
    <!-- End Circle button -->

    <!-- Contact content -->
    <div class="Rcircle-content" id="Rcircle-content">


        <?php
          if ($mes) {
            ?>
            <!-- Messenger -->
                <a class="facebook-messenger" href="https://www.messenger.com/t/<?php echo get_option('vnhteam_icon_message'); ?>" target="_blank">
                <span style="background-color:#567AFF">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="currentColor" d="M224 32C15.9 32-77.5 278 84.6 400.6V480l75.7-42c142.2 39.8 285.4-59.9 285.4-198.7C445.8 124.8 346.5 32 224 32zm23.4 278.1L190 250.5 79.6 311.6l121.1-128.5 57.4 59.6 110.4-61.1-121.1 128.5z">
                    </path>
                  </svg>
                </span>
                    <p>Messenger</p>
                </a>
            <?php
          }
        ?>
      
        <?php
          if ($emails) {
            ?>
            <!-- email -->
            <a class="envelope" href=mailto:<?php echo get_option('vnhteam_icon_mail'); ?>" target="_blank">
            <span style="background-color:#FF643A">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor"
                                  d="M464 64H48C21.5 64 0 85.5 0 112v288c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM48 96h416c8.8 0 16 7.2 16 16v41.4c-21.9 18.5-53.2 44-150.6 121.3-16.9 13.4-50.2 45.7-73.4 45.3-23.2.4-56.6-31.9-73.4-45.3C85.2 197.4 53.9 171.9 32 153.4V112c0-8.8 7.2-16 16-16zm416 320H48c-8.8 0-16-7.2-16-16V195c22.8 18.7 58.8 47.6 130.7 104.7 20.5 16.4 56.7 52.5 93.3 52.3 36.4.3 72.3-35.5 93.3-52.3 71.9-57.1 107.9-86 130.7-104.7v205c0 8.8-7.2 16-16 16z">
                </path>
              </svg>
            </span>
                <p>Email us</p>
            </a>
            <?php
          }
        ?>


        <?php
          if ($zalos) {
            ?>
              <!-- zalo -->
              <a class="zalo" href="https://zalo.me/<?php echo get_option('vnhteam_icon_zalo'); ?>" target="_blank">
              <span style="background-color:#006FB2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 460.1 436.6">
                  <path fill="currentColor" class="st0"
                                    d="M82.6 380.9c-1.8-.8-3.1-1.7-1-3.5 1.3-1 2.7-1.9 4.1-2.8 13.1-8.5 25.4-17.8 33.5-31.5 6.8-11.4 5.7-18.1-2.8-26.5C69 269.2 48.2 212.5 58.6 145.5 64.5 107.7 81.8 75 107 46.6c15.2-17.2 33.3-31.1 53.1-42.7 1.2-.7 2.9-.9 3.1-2.7-.4-1-1.1-.7-1.7-.7-33.7 0-67.4-.7-101 .2C28.3 1.7.5 26.6.6 62.3c.2 104.3 0 208.6 0 313 0 32.4 24.7 59.5 57 60.7 27.3 1.1 54.6.2 82 .1 2 .1 4 .2 6 .2H290c36 0 72 .2 108 0 33.4 0 60.5-27 60.5-60.3v-.6-58.5c0-1.4.5-2.9-.4-4.4-1.8.1-2.5 1.6-3.5 2.6-19.4 19.5-42.3 35.2-67.4 46.3-61.5 27.1-124.1 29-187.6 7.2-5.5-2-11.5-2.2-17.2-.8-8.4 2.1-16.7 4.6-25 7.1-24.4 7.6-49.3 11-74.8 6zm72.5-168.5c1.7-2.2 2.6-3.5 3.6-4.8 13.1-16.6 26.2-33.2 39.3-49.9 3.8-4.8 7.6-9.7 10-15.5 2.8-6.6-.2-12.8-7-15.2-3-.9-6.2-1.3-9.4-1.1-17.8-.1-35.7-.1-53.5 0-2.5 0-5 .3-7.4.9-5.6 1.4-9 7.1-7.6 12.8 1 3.8 4 6.8 7.8 7.7 2.4.6 4.9.9 7.4.8 10.8.1 21.7 0 32.5.1 1.2 0 2.7-.8 3.6 1-.9 1.2-1.8 2.4-2.7 3.5-15.5 19.6-30.9 39.3-46.4 58.9-3.8 4.9-5.8 10.3-3 16.3s8.5 7.1 14.3 7.5c4.6.3 9.3.1 14 .1 16.2 0 32.3.1 48.5-.1 8.6-.1 13.2-5.3 12.3-13.3-.7-6.3-5-9.6-13-9.7-14.1-.1-28.2 0-43.3 0zm116-52.6c-12.5-10.9-26.3-11.6-39.8-3.6-16.4 9.6-22.4 25.3-20.4 43.5 1.9 17 9.3 30.9 27.1 36.6 11.1 3.6 21.4 2.3 30.5-5.1 2.4-1.9 3.1-1.5 4.8.6 3.3 4.2 9 5.8 14 3.9 5-1.5 8.3-6.1 8.3-11.3.1-20 .2-40 0-60-.1-8-7.6-13.1-15.4-11.5-4.3.9-6.7 3.8-9.1 6.9zm69.3 37.1c-.4 25 20.3 43.9 46.3 41.3 23.9-2.4 39.4-20.3 38.6-45.6-.8-25-19.4-42.1-44.9-41.3-23.9.7-40.8 19.9-40 45.6zm-8.8-19.9c0-15.7.1-31.3 0-47 0-8-5.1-13-12.7-12.9-7.4.1-12.3 5.1-12.4 12.8-.1 4.7 0 9.3 0 14v79.5c0 6.2 3.8 11.6 8.8 12.9 6.9 1.9 14-2.2 15.8-9.1.3-1.2.5-2.4.4-3.7.2-15.5.1-31 .1-46.5z">
                  </path>
                </svg>
              </span>
                  <p>Zalo</p>
              </a>
            <?php
          }
        ?>

        <?php
          if ($phones) {
            ?>
            <!-- phone -->
            <a class="phone" href="tel:<?php echo get_option('vnhteam_icon_phone'); ?>" target="_blank">
            <span style="background-color:#FF2306">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor"
                                  d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z">
                </path>
              </svg>
            </span>
                <p><?php echo get_option('vnhteam_icon_phone'); ?></p>
            </a>
            
            <?php
          }
        ?>


    </div>
    <!-- End Contact content -->
</section>
  <script type="text/javascript">
      // Change the icons in the circle-container
      let iconIndex = 0;
      showIcons();
      function showIcons() {
          let i;
          let icons = document.getElementsByClassName("RmyIcon");
          for (i = 0; i < icons.length; i++)
          {
              icons[i].style.display = "none";
          }
          iconIndex++;
          if (iconIndex > icons.length)
          {
              iconIndex = 1
          }
          icons[iconIndex-1].style.display = "block";
          setTimeout(showIcons, 1000); // Change icon every 1 seconds
      }
      // =============================================================================
      var flag = false;
      function toggleDisplay() {
          let hide = document.getElementById("Rhide-close");
          let content = document.getElementById('Rcircle-content');
          let fad = document.getElementById('Rfad');
          if (flag===false)
          {
              hide.style.opacity = '1';
              content.style.display = 'inline-block';
              fad.style.transform = 'scale(0.2)';
              flag=true;
          } else {
              hide.style.opacity = '0';
              content.style.display = 'none';
              fad.style.transform = 'scale(1)';
              flag=false;
          }
      }
  </script>
