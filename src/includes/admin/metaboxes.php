<?php
function slider_gallery_register_meta_boxes()
{
    global $post;

    if ($post->post_type) {

        return;
    }
    add_action('add_meta_boxes', 'slider_gallery_metaboxes_images');
    add_action('add_meta_boxes', 'slider_gallery_slider_settings');
}


function slider_gallery_metaboxes_images()
{
    add_meta_box(
        'meta-box-id',
        __('Suba suas imagens aqui', 'slider_gallery'),
        'slider_gallery_images_display',
        'slider_gallery',
        "normal",
        'high'
    );
}

function slider_gallery_images_display()
{
?>
    <h1>Drag and Drop Files to Upload</h1>
<?php
}

function slider_gallery_slider_settings()
{
    add_meta_box(
        'slider_gallery_slider_settings',
        __('Slider settings', 'slider_gallery'),
        'slider_gallery_slider_settings_display',
        'slider_gallery',
        "normal",
        'high'
    );
}

function slider_gallery_slider_settings_display()
{
?>
    <h1>Drag and Drop Files to Upload</h1>
<?php
}
