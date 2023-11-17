<?php



function slider_gallery_preview_slider()
{
    add_meta_box(
        'container-meta-box-preview',
        __('Previa', 'slider_gallery'),
        'slider_gallery_preview_display',
        'slider_gallery',
        "normal",
        'high'
    );
}
add_action('add_meta_boxes', 'slider_gallery_preview_slider');
