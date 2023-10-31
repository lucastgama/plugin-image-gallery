<?php
// Register Custom Post Type
function create_post_type_slider_gallery()
{

    $labels = array(
        'name'                  => _x('Slider Galleries', 'Post Type General Name', 'slider_gallery'),
        'singular_name'         => _x('Slider Gallery', 'Post Type Singular Name', 'slider_gallery'),
        'menu_name'             => __('Slider gallery', 'slider_gallery'),
        'name_admin_bar'        => __('Slider gallery', 'slider_gallery'),
        'archives'              => __('Item Archives', 'slider_gallery'),
        'attributes'            => __('Item Attributes', 'slider_gallery'),
        'parent_item_colon'     => __('Parent Item:', 'slider_gallery'),
        'all_items'             => __('All Items', 'slider_gallery'),
        'add_new_item'          => __('Add New Item', 'slider_gallery'),
        'add_new'               => __('Add New', 'slider_gallery'),
        'new_item'              => __('New Item', 'slider_gallery'),
        'edit_item'             => __('Edit Item', 'slider_gallery'),
        'update_item'           => __('Update Item', 'slider_gallery'),
        'view_item'             => __('View Item', 'slider_gallery'),
        'view_items'            => __('View Items', 'slider_gallery'),
        'search_items'          => __('Search Item', 'slider_gallery'),
        'not_found'             => __('Not found', 'slider_gallery'),
        'not_found_in_trash'    => __('Not found in Trash', 'slider_gallery'),
        'featured_image'        => __('Featured Image', 'slider_gallery'),
        'set_featured_image'    => __('Set featured image', 'slider_gallery'),
        'remove_featured_image' => __('Remove featured image', 'slider_gallery'),
        'use_featured_image'    => __('Use as featured image', 'slider_gallery'),
        'insert_into_item'      => __('Insert into item', 'slider_gallery'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'slider_gallery'),
        'items_list'            => __('Items list', 'slider_gallery'),
        'items_list_navigation' => __('Items list navigation', 'slider_gallery'),
        'filter_items_list'     => __('Filter items list', 'slider_gallery'),
    );
    $args = array(
        'label'                 => __('Slider Gallery', 'slider_gallery'),
        'description'           => __('Create your own image carousel here', 'slider_gallery'),
        'labels'                => $labels,
        'supports'              => array('title'),
        'taxonomies'            => array(false),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'menu_icon'             => 'dashicons-images-alt2',

    );
    register_post_type('slider_gallery', $args);
}
add_action('init', 'create_post_type_slider_gallery', 0);
