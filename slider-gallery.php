<?php
/*
Plugin Name: Galeria de slider - lite
Description: Plugin feito para organizar seus sliders em seu site.
Version: 0.1.0
Author: Lucas Gama
Text Domain: slider_gallery
Domain Path: languages
*/

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

include('src/includes/global/posttype.php');
include('src/includes/admin/metaboxes/metabox-options.php');

add_action('admin_init', 'slider_gallery_register_meta_boxes');


function slider_gallery_theme_css()
{
	wp_enqueue_style('metaboxes-css', plugin_dir_url(__FILE__) . '/src/assets/css/metaboxes.css', false, NULL, 'all');
}
add_action('init', 'slider_gallery_theme_css');
