<?php

include(__DIR__ . '/../../../template/metaboxes/template-images.php');


function slider_gallery_metabox_images()
{
    add_meta_box(
        'container-meta-box-images',
        __('Slider', 'slider_gallery'),
        'slider_gallery_images_display',
        'slider_gallery',
        "normal",
        'high'
    );
}
add_action('add_meta_boxes', 'slider_gallery_metabox_images');
