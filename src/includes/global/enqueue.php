<?php
function slider_gallery_theme_css()
{
	var_dump(plugin_dir_url(__FILE__));
	var_dump(__FILE__);
	var_dump(get_stylesheet_uri());

	// wp_enqueue_style('metaboxes-css', plugin_dir_url(__FILE__) . 'assets/css/metaboxes.css', false, NULL, 'all');
}