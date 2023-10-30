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

include('src/includes/global/init.php');
include('src/includes/admin/metaboxes.php');

add_action('admin_init', 'slider_gallery_register_meta_boxes');
