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

/* Add support to override woocommerce template into child theme */
function my_child_theme_woocommerce_setup() {
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'my_child_theme_woocommerce_setup');

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

/* Display Portfolio Posts Using Shortcode */
function display_latest_portfolio_posts()
{
	// Query arguments
	$args = array(
		'post_type' => 'portfolio',
		'posts_per_page' => 3,         // 3 posts to display
		'order' => 'DESC',
		'post_status' => 'publish'
	);

	// New query
	$portfolio_query = new WP_Query($args);
	ob_start();

	if ($portfolio_query->have_posts()):
		$posts_array = $portfolio_query->posts;
		?>
		<div class="latest-portfolio-posts">
			<h2>Latest Portfolio Items</h2>
			<?php
			foreach ($posts_array as $post):
				setup_postdata($post);

				$post_id = $post->ID;
				$title = get_the_title($post_id);
				$permalink = get_permalink($post_id);
				$excerpt = get_the_excerpt($post_id);

				$portfolio_categories = get_the_terms($post_id, 'project_category');
				?>

				<article id="post-<?php echo esc_attr($post_id); ?>">
					<?php if (has_post_thumbnail($post_id)): ?>
						<div class="portfolio-thumbnail">
							<?php echo get_the_post_thumbnail($post_id, 'full'); ?>
						</div>
					<?php endif; ?>

					<div class="portfolio-content">
						<h3 class="portfolio-title">
							<a href="<?php echo esc_url($permalink); ?>">
								<?php echo esc_html($title); ?>
							</a>
						</h3>

						<?php if (!empty($portfolio_categories)): ?>
							<div class="portfolio-categories">
								<span class="taxonomy-label">Categories:</span>
								<?php foreach ($portfolio_categories as $category): ?>
									<span class="taxonomy-category">
										<?php echo esc_html($category->name); ?>
									</span>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>

						<div class="portfolio-excerpt">
							<?php echo wp_kses_post($excerpt); ?>
						</div>
					</div>
				</article>
				<?php
			endforeach;
			?>
		</div>
		<?php
		// Reset post data
		wp_reset_postdata();
	endif;
	return ob_get_clean();
}

// Shortcode for display post wherever you want
add_shortcode('latest_portfolio', 'display_latest_portfolio_posts');