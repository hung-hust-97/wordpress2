<?php

/*

Template name: Page - Home

*/

get_header(); ?>



<?php do_action( 'flatsome_before_page' ); ?>



<div id="content" role="main" class="content-area">

    <style type="text/css">
        .section {
            padding: 10px;
        }
    </style>
    <div id="fullpage">

        <div class="section" id="section0" style="background-size: cover !important;">

            <?php echo do_shortcode('[block id="slider-home"]'); ?>

        </div>

        <div class="section " id="section1" style="background-size: cover !important;">

            <?php echo do_shortcode('[block id="gioi-thieu-ve-chung-toi"]') ?>

        </div>

        <div class="section" id="section2" style="background-size: cover !important;">

            <?php echo do_shortcode('[block id="san-pham"]') ?>

        </div>

        <div class="section" id="section3" style="background-size: cover !important;">

            <div class="row row-small">

                <div class="col small-12 large-12">
                    <div class="col-inner">

                        <?php echo do_shortcode('[block id="tin-tuc"]') ?>

                    </div>

                </div>

            </div>
        </div>

        <div class="section" id="section4" style="background-size: cover !important;">

            <div class="row row-small">

                <div class="col small-12 large-12">
                    <div class="col-inner">

                        <?php echo do_shortcode('[block id="du-an-da-trien-khai"]') ?>

                    </div>

                </div>

            </div>

        </div>

        <div class="section" id="section5" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bgft.jpg'); background-size: cover;">

            <div class="row row-small">

                <div class="col small-12 large-12" style="padding: 10px;">
                    <div class="col-inner">

                        <?php echo do_shortcode('[block id="footer"]'); ?>
                            <div class="menu_footerr">
                                <div class=" menu_fot">
                                    <?php echo do_shortcode('[menu name="menu-footer"]'); ?>
                                </div>
                            </div>
                            <?php echo do_shortcode('[block id="footer2"]'); ?>

                    </div>

                </div>

            </div>

        </div>
    </div>

</div>


<?php do_action( 'flatsome_after_page' ); ?>

<?php get_footer(); ?>



