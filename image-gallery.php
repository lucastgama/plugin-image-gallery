<?php
/*
Plugin Name: Galeria de Imagens Responsiva
Description: Um plugin para criar galerias de imagens responsivas.
Version: 0.1.0
Text Domain: image_gallery
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

//activate hooks
include("src/controllers/includes/init.php");

add_action("init", "image_gallery_activate");
