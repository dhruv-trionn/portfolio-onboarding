<?php
/**
 * Theme functions and definitions.
 *
 * For additional information on potential customization options,
 * read the developers' documentation:
 *
 * https://developers.elementor.com/docs/hello-elementor-theme/
 *
 * @package HelloElementorChild
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

define('HELLO_ELEMENTOR_CHILD_VERSION', '2.0.0');

/**
 * Load child theme scripts & styles.
 *
 * @return void
 */
function hello_elementor_child_scripts_styles()
{

	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		HELLO_ELEMENTOR_CHILD_VERSION
	);

	$css_file_path = get_stylesheet_directory() . '/assets/css/portfolio.css';
	$css_file_uri = get_stylesheet_directory_uri() . '/assets/css/portfolio.css';
	
	$js_file_path = get_stylesheet_directory() . '/assets/js/portfolio.js';
	$js_file_uri = get_stylesheet_directory_uri() . '/assets/js/portfolio.js';

	// Get the last modified time of the CSS & JS file
	$css_version = filemtime($css_file_path);
	$js_version = filemtime($js_file_path);

	// Enqueue the style & script with the auto-versioning
	wp_enqueue_style('yt-custom-css', $css_file_uri, array(), $css_version);
	
	wp_enqueue_script('jquery');
    wp_add_inline_script('jquery-core', '$ = jQuery;');
	wp_enqueue_script('yt-custom-js', $js_file_uri, array('jquery'), $js_version, true);

}
add_action('wp_enqueue_scripts', 'hello_elementor_child_scripts_styles', 20);

/* allow svg uploads in media library */
function yt_mime_types($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'yt_mime_types');

/* Disable Widgets Block Editor */
add_filter('use_widgets_block_editor', '__return_false');
add_filter('use_block_editor_for_post', '__return_false', 10);

/* Enable shortcodes in text widgets */
add_filter('widget_text', 'do_shortcode');

require get_stylesheet_directory() . '/inc/CMB2_metabox.php';
require get_stylesheet_directory() . '/inc/custom-post-types.php';
