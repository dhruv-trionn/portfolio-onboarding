<?php
/**
 * Plugin Name: Portfolio Project Date
 * Description: Adds project date field to portfolio items using CMB2
 * Version: 1.0
 * Author: Dhruv <dhruvsolanki.dev@gmail.com>
 */

if (!defined('ABSPATH')) {
    exit;
}

class Portfolio_Project_Date {
    public function __construct() {
        add_action('cmb2_admin_init', array($this, 'register_project_date_metabox'));
        add_filter('the_content', array($this, 'display_project_date'));
    }

    //  Register date metabox using CMB2
    public function register_project_date_metabox() {
        $portfolio_metabox = new_cmb2_box(array(
            'id'            => 'project_date_metabox',
            'title'         => __('Project Date', 'portfolio'),
            'object_types'  => array('portfolio'),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true,
        ));

        $portfolio_metabox->add_field(array(
            'name'       => __('Project Date', 'portfolio'),
            'desc'       => __('Select the date this project was completed', 'portfolio'),
            'id'         => '_project_date',
            'type'       => 'text_date',
            'date_format' => 'Y-m-d',
        ));
    }

    //  Display project date on frontend
    public function display_project_date($content) {
        // Condition for only in Portfolio Post type
        if (!is_singular('portfolio')) {
            return $content;
        }

        $project_date = get_post_meta(get_the_ID(), '_project_date', true);
        // Check if project date is available
        if ($project_date) {
            $date_html = '<div class="project-date">';
            $date_html .= '<strong>Project Date:</strong> ';
            $date_html .= date('F j, Y', strtotime($project_date));
            $date_html .= '</div>';
            
            $content = $date_html . $content;
        }
        
        return $content;
    }
}

// Init plugin
new Portfolio_Project_Date();