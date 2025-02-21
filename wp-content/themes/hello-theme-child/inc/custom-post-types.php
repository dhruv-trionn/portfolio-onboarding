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
                'rewrite' => array('slug' => 'portfolio', 'with_front' => false),
                'show_ui' => true,
            )
        );

        /* Portfolio Custom Taxonomy */
        register_taxonomy('project_category', array('portfolio'), array(
            'hierarchical' => true,
            'labels' => array(
                'name' => __('Project Categories', 'portfolio'),
                'singular_name' => __('Project Category', 'portfolio'),
                'search_items' => __('Search Project Categories', 'portfolio'),
                'all_items' => __('All Project Categories', 'portfolio'),
                'parent_item' => __('Parent Project Categories', 'portfolio'),
                'parent_item_colon' => __('Parent Project Category:', 'portfolio'),
                'edit_item' => __('Edit Project Category', 'portfolio'),
                'update_item' => __('Update Project Category', 'portfolio'),
                'add_new_item' => __('Add New Project Category', 'portfolio'),
                'new_item_name' => __('New Project Category Name', 'portfolio'),
                'menu_name' => __('Project Categories', 'portfolio'),
            ),
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'project-category', 'with_front' => false),
            'show_admin_column' => true
        ));

        // Add three categories when the taxonomy is registered
        if (!term_exists('Web Developement', 'project_category')) {
            wp_insert_term('Web Developement', 'project_category');
        }
        if (!term_exists('Next Js', 'project_category')) {
            wp_insert_term('Next Js', 'project_category');
        }
        if (!term_exists('Wordpress', 'project_category')) {
            wp_insert_term('Wordpress', 'project_category');
        }

    }
}

$register_post_type = new registerPostType();
