<?php
 /**
 * Plugin Name: Change Happens
 * Version: 1.0
 * Author: Lisa Wells
 * Author URI: https://barkingdogweb.com
 * Description: Custom functionality for changehappens.me
 * License: GPL2
 **/


/***** TinyMCE button to create subscribe-to-blog line *****/

// create shortcode for post editor subscribe-to-blog link
// add_shortcode('subscribe-to-blog', 'ch_add_subscribe_to_blog_link');
function ch_add_subscribe_to_blog_link() {
  $result = '<p>Don\'t miss a post, <a id="subscribe-link" href="#">subscribe here.</a></p>';
  return $result;
}
// using init instead of just add_shortcode so we can move to plugin later, which requires it
add_action('init', 'ch_shortcodes_init');
function ch_shortcodes_init(){
  add_shortcode( 'subscribe-to-blog', 'ch_add_subscribe_to_blog_link' );
}

// ala http://www.wpbeginner.com/wp-tutorials/how-to-create-a-wordpress-tinymce-plugin/

// If two WordPress plugins have functions with the same name, then this would cause an error. We will avoid this problem by having our functions wrapped in a class.
class TinyMCE_Subscribe_Shortcode_Class {
    /**
    * Constructor. Called when the plugin is initialised.
    */
    function __construct() {

        if ( is_admin() ) { // if is admin area
            add_action( 'init', array(  $this, 'setup_tinymce_plugin' ) );
        }

    } //end __construct()

    /**
    * Check if the current user can edit Posts or Pages, and is using the Visual Editor
    * If so, add some filters so we can register our plugin
    */
    function setup_tinymce_plugin() {

        // Check if the logged in WordPress User can edit Posts or Pages
        // If not, don't register our TinyMCE plugin

        if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
                    return;
        }

        // Check if the logged in WordPress User has the Visual Editor enabled
        // If not, don't register our TinyMCE plugin
        if ( get_user_option( 'rich_editing' ) !== 'true' ) {
        return;
        }

        // Setup some filters to call functions to load js file and to add button
        add_filter( 'mce_external_plugins', array( &$this, 'add_tinymce_plugin' ) );
        add_filter( 'mce_buttons', array( &$this, 'add_tinymce_toolbar_button' ) );

    }

    /**
    * Adds a TinyMCE plugin compatible JS file to the TinyMCE / Visual Editor instance
    *
    * @param array $plugin_array Array of registered TinyMCE Plugins
    * @return array Modified array of registered TinyMCE Plugins
    */
    function add_tinymce_plugin( $plugin_array ) {

        $plugin_array['subscribe_to_blog'] = plugin_dir_url( __FILE__ ) . 'tinymce-subscribe-shortcode.js';
        return $plugin_array;

    }

    /**
    * Adds a button to the TinyMCE / Visual Editor which the user can click
    * to insert a link with a custom CSS class.
    *
    * @param array $buttons Array of registered TinyMCE Buttons
    * @return array Modified array of registered TinyMCE Buttons
    */
    function add_tinymce_toolbar_button( $buttons ) {

        array_push( $buttons, '|', 'subscribe_to_blog' );
        return $buttons;
    }

} // end class
$tinymce_subscribe_shortcode_class = new TinyMCE_Subscribe_Shortcode_Class;
