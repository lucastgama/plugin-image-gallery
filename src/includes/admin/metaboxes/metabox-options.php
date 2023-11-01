<?php

include(__DIR__ . '/../../../template/metaboxes/template-options.php');


function slider_gallery_register_meta_boxes()
{
    add_action('add_meta_boxes', 'slider_gallery_metabox_options');
}

function slider_gallery_metabox_options()
{
    add_meta_box(
        'container-meta-box-options',
        __('Configurações', 'slider_gallery'),
        'slider_gallery_options_display',
        'slider_gallery',
        'normal',
        'high'
    );
}

function slider_gallery_metabox_options_save($post_id)
{
    if (!isset($_POST['metabox_nonce'])) {
        return $post_id;
    }

    if (!wp_verify_nonce($_POST['metabox_nonce'], 'save_slide_options')) {
        return $post_id;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    // $slide_duration = sanitize_text_field($_POST['slide_duration']);
    $slide_options = [];
    $slide_options['slide_duration'] = $_POST['slide_duration'];
    $slide_options['slide_transition'] = $_POST['slide_transition'];
    $slide_options['slide_loop'] = $_POST['slide_loop'];
    $slide_options['slide_stop_on_hover'] = $_POST['slide_stop_on_hover'];
    $slide_options['slide_navigation'] = $_POST['slide_navigation'];
    $slide_options['slide_show_pagination'] = $_POST['slide_show_pagination'];
    update_post_meta($post_id, 'slide_options', json_encode($slide_options));
}

add_action('save_post', 'slider_gallery_metabox_options_save');
