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
// ala http://www.wpbeginner.com/wp-tutorials/how-to-create-a-wordpress-tinymce-plugin/

class TinyMCE_Custom_Link_Class {
    /**
    * Constructor. Called when the plugin is initialised.
    */
    function __construct() {

    }

}

$tinymce_custom_link_class = new TinyMCE_Custom_Link_Class;
