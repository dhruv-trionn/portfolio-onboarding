<?php
class registerPostType
{
    function __construct()
    {
        add_action('init', array($this, 'create_post_type'));
    }

    function create_post_type()
    {

        /* Portfolio Custom Post Type */
        register_post_type(
            'portfolio',
            array(
                'labels' => array(
                    'name' => __('Portfolios', 'portfolio'),
                    'singular_name' => __('Portfolio', 'portfolio'),
                    'menu_name' => __('Portfolio', 'portfolio'),
                    'name_admin_bar' => __('Portfolio', 'portfolio'),
                    'add_new' => __('Add New', 'portfolio'),
                    'add_new_item' => __('Add New Portfolio', 'portfolio'),
                    'new_item' => __('New Portfolio', 'portfolio'),
                    'edit_item' => __('Edit Portfolio', 'portfolio'),
                    'view_item' => __('View Portfolio', 'portfolio'),
                    'all_items' => __('All Portfolios', 'portfolio'),
                ),
                'public' => true,
                'has_archive' => true,
                'hierarchical' => true, // Enable hierarchy like pages
                'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'), // Enable title, editor, featured images etc.
                'menu_position' => 5,
                'menu_icon' => 'dashicons-portfolio',
                'rewrite' => array('slug' => 'integrations', 'with_front' => false),
                'show_ui' => true,
            )
        );

    }
}

$register_post_type = new registerPostType();
