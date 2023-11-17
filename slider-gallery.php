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
include('src/includes/admin/metaboxes/metabox-image.php');
include('src/includes/admin/metaboxes/metabox-options.php');
include('src/template/metaboxes/template-preview.php');
include('src/includes/admin/metaboxes/metabox-preview.php');
include('src/includes/admin/columns.php');


function slider_gallery_theme_css()
{
	wp_enqueue_style('metaboxes-css', plugin_dir_url(__FILE__) . '/src/assets/css/metaboxes.css', false, NULL, 'all');
	wp_enqueue_style('template_metabox_css', plugin_dir_url(__FILE__) . '/src/assets/css/template-metabox.css', false, NULL, 'all');
	wp_enqueue_style('template_preview_css', plugin_dir_url(__FILE__) . '/src/assets/css/template-preview.css', false, NULL, 'all');

	wp_enqueue_script('metaboxes_js', plugin_dir_url(__FILE__) . '/src/assets/js/metaboxes.js', array(), '1.0.0', true);
	wp_enqueue_script('preview_js', plugin_dir_url(__FILE__) . '/src/assets/js/preview.js', array(), '1.0.0', true);
}
add_action('init', 'slider_gallery_theme_css');
