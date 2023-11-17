<?php

function slider_gallery_new_columns($columns)
{
    $new_colums = array(
        'cb' => '<input type="checkbox" />',
        'title' => 'Título',
        'shortcode' => 'Shortcode',
        'author' => 'Autor',
        'date' => "Date",
    );

    return $new_colums;
}
add_filter('manage_slider_gallery_posts_columns', 'slider_gallery_new_columns');

function slider_gallery_shortcode_template($atts)
{
    if (!isset($atts['id'])) {
        return 'ID do post não especificado no shortcode.';
    }

    $post_id = intval($atts['id']);
    $slide_options = get_post_meta($post_id, 'slide_options', true);
    $slide_images = get_post_meta($post_id, 'slide_images', true);
    $slide_images_array = json_decode($slide_images, true);


    $output = '<div class="carousel-container">';
    $output .= '<div class="carousel">';
    if ($slide_images_array) {
        foreach ($slide_images_array as $position => $info) {
            $alt = $info['alt'];
            $url = $info['url'];
            $output .=  "<div class='carousel-item' data-position='$position'><img src='$url' alt='$alt'></div>";
        }
    }
    $output .= '</div>';
    $output .= '<div class="pagination"></div>';
    $output .= "<input class='slide-option' type='hidden' value='$slide_options' />";
    $output .= '</div>';


    return $output;
}
add_shortcode('shortcode_slider_gallery', 'slider_gallery_shortcode_template');


function slider_gallery_show_shortcode($column, $post_id)
{
    if ($column == 'shortcode') {
        echo '[shortcode_slider_gallery id="' . esc_attr($post_id) . '"]';
    }
}
add_action('manage_slider_gallery_posts_custom_column', 'slider_gallery_show_shortcode', 10, 2);
