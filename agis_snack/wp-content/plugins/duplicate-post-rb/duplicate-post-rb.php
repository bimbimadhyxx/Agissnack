<?php
/*
Plugin Name: Duplicate Post RB
Plugin URI: https://www.rbplugins.com/duplicate-post-rb
Description: Duplicate Post RB is a simple and lightweight plugin that allows you to duplicate any post easily 
Version: 1.0.8
Author: rbPlugins
Author URI: https://profiles.wordpress.org/rbplugins/
License: GPL2
Text Domain: duplicate-post-rb
Domain Path: /languages/
*/

if (!defined('WPINC') || !defined("ABSPATH")) {
    die();
}
define("RB_DUPLICATE_POST_VERSION", '1.0.8' );
define("RB_DUPLICATE_POST_PATH", plugin_dir_path(__FILE__));
define("RB_DUPLICATE_POST_URL", plugin_dir_url(__FILE__));

include_once(RB_DUPLICATE_POST_PATH .'class_rb_duplicate_post.php');
rbsDuplicatePost::getInstance();
