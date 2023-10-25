<?php

function image_gallery_activate()
{
    $labels = array(
        'name'                  => _x('Galleries', 'Post Type General Name', 'image_gallery'),
        'singular_name'         => _x('Gallery', 'Post Type Singular Name', 'image_gallery'),
        'menu_name'             => __('Galleries', 'image_gallery'),
        'name_admin_bar'        => __('Gallery', 'image_gallery'),
        'archives'              => __('Item Archives', 'image_gallery'),
        'attributes'            => __('Item Attributes', 'image_gallery'),
        'parent_item_colon'     => __('Parent Item:', 'image_gallery'),
        'all_items'             => __('All Items', 'image_gallery'),
        'add_new_item'          => __('Add New Item', 'image_gallery'),
        'add_new'               => __('Add New', 'image_gallery'),
        'new_item'              => __('New Item', 'image_gallery'),
        'edit_item'             => __('Edit Item', 'image_gallery'),
        'update_item'           => __('Update Item', 'image_gallery'),
        'view_item'             => __('View Item', 'image_gallery'),
        'view_items'            => __('View Items', 'image_gallery'),
        'search_items'          => __('Search Item', 'image_gallery'),
        'not_found'             => __('Not found', 'image_gallery'),
        'not_found_in_trash'    => __('Not found in Trash', 'image_gallery'),
        'featured_image'        => __('Featured Image', 'image_gallery'),
        'set_featured_image'    => __('Set featured image', 'image_gallery'),
        'remove_featured_image' => __('Remove featured image', 'image_gallery'),
        'use_featured_image'    => __('Use as featured image', 'image_gallery'),
        'insert_into_item'      => __('Insert into item', 'image_gallery'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'image_gallery'),
        'items_list'            => __('Items list', 'image_gallery'),
        'items_list_navigation' => __('Items list navigation', 'image_gallery'),
        'filter_items_list'     => __('Filter items list', 'image_gallery'),
    );
    $args = array(
        'label'                 => __('Gallery', 'image_gallery'),
        'description'           => __('Easy way to organize and make your carousels', 'image_gallery'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'),
        'taxonomies'            => array('category', 'post_tag'),
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
        'show_in_rest'          => false,
        'menu_icon'             => "dashicons-images-alt2",
    );
    register_post_type('post_type', $args);
};
add_action("init", "image_gallery_activate");
