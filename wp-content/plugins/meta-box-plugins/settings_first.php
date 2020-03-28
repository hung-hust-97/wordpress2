<?php
/*
Plugin Name: Metabox Taxonomy For Post type
Plugin URI: https://vinawebsite.vn/
Description: Add MetaBox to Taxanomy
Version: 1.0
Author: Vina-Team
Author URI: https://vinawebsite.vn/
License: GPL+
*/
$dir = plugin_dir_path( __FILE__ );
/*Function thumbnail*/
function flatsome_ux_builder_thumbnail_jj( $name ) {
  return plugins_url('flatsome-jj-plugins')  . '/img/' . $name . '.svg';
}

/*require element*/
require_once get_template_directory() . '/inc/builder/helpers.php';


require $dir .'/inc/calldatathumb.php';
require $dir .'/inc/calldatathumf.php';



function register_mysettings() {
    register_setting( 'devj-settings-group', 'devj_option_name' );
    register_setting( 'devj-settings-group', 'devj_select_name' );
    register_setting( 'devj-settings-group', 'devj_select_tax' );
}
 



add_action('admin_menu', 'devj_create_menu');   

if(!function_exists('devj_create_menu')){

  function devj_create_menu() {
   add_submenu_page( 'options-general.php', 'MetaBox Taxanomy', 'MetaBox Taxanomy', 'manage_options', 'setting-metabox', 'devj_settings_page');
  }
  add_action( 'admin_init', 'register_mysettings' );

 }


function devj_settings_page() {
?>
<div class="wrap">
<?php if( isset($_GET['settings-updated']) ) { ?>
    <div id="message" class="updated">
        <p><strong><?php _e('Settings saved.') ?></strong></p>
    </div>
<?php } ?>
  <h1>Tùy chọn Taxanomy</h1>
  <form method="post" action="options.php">
      <?php settings_fields( 'devj-settings-group' ); ?>
      <?php 
        $args = array(
           'public'   => true,
           '_builtin' => false
        );
         
        $output = 'names'; // names or objects, note names is the default
        $operator = 'and'; // 'and' or 'or'
         
        $post_types = get_post_types( $args, $output, $operator ); 

       if($post_types){
          foreach ($post_types as $value) {
            $blocks[$value] = $value;
          }
        }
      
      ?>
    
      <?php 
          $name_post = get_option('devj_select_name');
          $name_tax = get_option('devj_select_tax');
      ?>
      <table class="form-table" role="presentation">
        <tbody>
          <tr>
            <th scope="row"><label>Chọn Post type</label></th>
            <td>
            <select name="devj_select_name">
              <option <?php echo selected( $name_post, $key); ?> value="post">post</option>
              <?php 
                foreach ($blocks as $key => $value) {
                   echo '<option '.selected( $name_post, $key).' value="'.$key.'">'.$value.'</option>';
                } 
              ?>
            </select>
            </td>
          </tr>

          <?php if ($name_post) {
             $taxonomies = get_object_taxonomies($name_post, 'objects'); 
              ?>
              <tr>
                <th scope="row"><label>Chọn Taxanomy</label></th>
                <td>
                <select name="devj_select_tax">                  
                  <?php 
                    foreach ($taxonomies as $keys => $value_name) {
                      echo '<option '.selected( $name_tax, $keys).' value="'.$keys.'">'.$value_name->name.'</option>';                      
                    } 
                  ?>
                </select>
                </td>
              </tr>
              <?php
          } ?>
          


        </tbody>
      </table>
      <?php submit_button(); ?>
  </form>
</div>
<?php }
$nametax = get_option('devj_select_tax');


if ($nametax) {
  if ( ! class_exists( 'CT_TAX_META' ) ) {

class CT_TAX_META {
  public function __construct() {

    //

  }

 /*

  * Initialize the class and start calling our hooks and filters

  * @since 1.0.0

 */
 public function init() {
  $nametaxs = get_option('devj_select_tax');
    $cate_field = $nametaxs.'_add_form_fields';
    $created = 'created_'.$nametaxs;
    $cate_edits = $nametaxs.'_edit_form_fields';
    $editeds = 'edited_'.$nametaxs;


    add_action( $cate_field, array ( $this, 'add_category_image' ), 10, 2 );
    add_action( $created, array ( $this, 'save_category_image' ), 10, 2 );
    add_action( $cate_edits, array ( $this, 'update_category_image' ), 10, 2 );
    add_action( $editeds, array ( $this, 'updated_category_image' ), 10, 2 );
    add_action( 'admin_enqueue_scripts', array( $this, 'load_media' ) );
    add_action( 'admin_footer', array ( $this, 'add_script' ) );
 }
public function load_media() {

 wp_enqueue_media();

}
 /*

  * Add a form field in the new category page

  * @since 1.0.0

 */

 public function add_category_image ( $taxonomy ) { ?>

   <div class="form-field term-group">

     <label for="category-image-id"><?php _e('Image', 'hero-theme'); ?></label>

     <input type="hidden" id="category-image-id" name="category-image-id" class="custom_media_url" value="">

     <div id="category-image-wrapper"></div>

     <p>

       <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'hero-theme' ); ?>" />

       <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'hero-theme' ); ?>" />

    </p>

   </div>

 <?php

 }
 /*

  * Save the form field

  * @since 1.0.0

 */

 public function save_category_image ( $term_id, $tt_id ) {

   if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] ){

     $image = $_POST['category-image-id'];

     add_term_meta( $term_id, 'category-image-id', $image, true );

   }

 }
 /*

  * Edit the form field

  * @since 1.0.0

 */

 public function update_category_image ( $term, $taxonomy ) { ?>

   <tr class="form-field term-group-wrap">

     <th scope="row">

       <label for="category-image-id"><?php _e( 'Image', 'hero-theme' ); ?></label>

     </th>

     <td>

       <?php $image_id = get_term_meta ( $term ->term_id, 'category-image-id', true ); ?>

       <input type="hidden" id="category-image-id" name="category-image-id" value="<?php echo $image_id; ?>">

       <div id="category-image-wrapper">

         <?php if ( $image_id ) { ?>

           <?php echo wp_get_attachment_image ( $image_id, 'thumbnail' ); ?>

         <?php } ?>

       </div>

       <p>

         <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'hero-theme' ); ?>" />

         <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'hero-theme' ); ?>" />

       </p>

     </td>

   </tr>

 <?php

 }
/*

 * Update the form field value

 * @since 1.0.0

 */

 public function updated_category_image ( $term_id, $tt_id ) {

   if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] ){

     $image = $_POST['category-image-id'];

     update_term_meta ( $term_id, 'category-image-id', $image );

   } else {

     update_term_meta ( $term_id, 'category-image-id', '' );

   }

 }

/*

 * Add script

 * @since 1.0.0

 */

 public function add_script() { ?>

   <script>

     jQuery(document).ready( function($) {

       function ct_media_upload(button_class) {

         var _custom_media = true,

         _orig_send_attachment = wp.media.editor.send.attachment;

         $('body').on('click', button_class, function(e) {

           var button_id = '#'+$(this).attr('id');

           var send_attachment_bkp = wp.media.editor.send.attachment;

           var button = $(button_id);

           _custom_media = true;

           wp.media.editor.send.attachment = function(props, attachment){

             if ( _custom_media ) {

               $('#category-image-id').val(attachment.id);

               $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');

               $('#category-image-wrapper .custom_media_image').attr('src',attachment.url).css('display','block');

             } else {

               return _orig_send_attachment.apply( button_id, [props, attachment] );

             }

            }

         wp.media.editor.open(button);

         return false;

       });

     }

     ct_media_upload('.ct_tax_media_button.button'); 

     $('body').on('click','.ct_tax_media_remove',function(){

       $('#category-image-id').val('');

       $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');

     });

     $(document).ajaxComplete(function(event, xhr, settings) {

       var queryStringArr = settings.data.split('&');

       if( $.inArray('action=add-tag', queryStringArr) !== -1 ){

         var xml = xhr.responseXML;

         $response = $(xml).find('term_id').text();

         if($response!=""){

           // Clear the thumb image

           $('#category-image-wrapper').html('');

         }

       }

     });

   });
 </script>
 <?php }
  }
  $CT_TAX_META = new CT_TAX_META();

  $CT_TAX_META -> init();

}
}