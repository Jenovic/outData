<?php
require_once 'includes/acf-customisations.php';

class theme
{
	public function __construct()
	{
		// Add post thumbnail support
		add_theme_support('post-thumbnails');

		// Add custom image sizes here - (name, width, height, crop)
		add_image_size( 'image-size-name', 500, 500, true );

		// Add SVG Support
		add_filter( 'upload_mimes', array( __CLASS__, 'add_svg_to_mime_types' ) );

		// Register Menus
		register_nav_menus( array(
			'main_menu' => 'Main Navigation',
			'footer_a' => 'Footer menu (A)',
			'footer_legal' => 'Footer Legal Navigation',
		) );

		// Enqueue JS and CSS
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_scripts' ) );

		// ACF Customisations
		ACFCustomisations::add_google_api_key_to_acf();
		ACFCustomisations::add_acf_options_pages();
	}

	/**
	 * Enable svg uploads to media
	 * @param $mimes
	 *
	 * @return mixed
	 */
	public static function add_svg_to_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}

	/**
	 * Enqueue all javascript and css files
	 */
	public static function enqueue_scripts()
	{
		$js_cache_buster = date("YmdHi", filemtime( get_stylesheet_directory() . '/dist/scripts/scripts.js' ) );
		$css_cache_buster = date("YmdHi", filemtime( get_stylesheet_directory() . '/dist/styles/style.css' ) );

		wp_enqueue_script('themejs', get_template_directory_uri() . '/dist/scripts/scripts.js', array('jquery'), $js_cache_buster, true );

		wp_enqueue_style('themecss', get_template_directory_uri() . '/dist/styles/style.css', array(), $css_cache_buster);
		wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;600;700;800', array(), $css_cache_buster);
		wp_enqueue_script('tweenmax', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js', array('jquery'), '1.0.0', true);
	}
}
new theme();