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


function slider_gallery_metabox_images_save($post_id)
{

    if (!isset($_POST['metabox_images'])) {
        return $post_id;
    }

    if (!wp_verify_nonce($_POST['metabox_images'], 'save_slide_images')) {
        return $post_id;
    }


    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    // $slide_duration = sanitize_text_field($_POST['slide_duration']);
    $slide_options = stripslashes(filter_input(INPUT_POST, 'selected-images-id'));

    update_post_meta($post_id, 'slide_images', $slide_options);
}

add_action('save_post', 'slider_gallery_metabox_images_save');
