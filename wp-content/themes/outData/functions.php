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
		add_image_size( 'archive-thumbnail', 700, 460, true );

		// Add SVG Support
		add_filter( 'upload_mimes', array( __CLASS__, 'add_svg_to_mime_types' ) );

		// Register Menus
		register_nav_menus( array(
			'main_menu' => 'Main Navigation',
			'footer_a' => 'Footer menu (A)',
			'footer_legal' => 'Footer Legal Navigation',
		) );

		// Add Advanced Custom Fields Options Page
		if ( function_exists( 'acf_add_options_page' ) )
		{
			$option_page = acf_add_options_page( array(
				'page_title' => 'Theme General Settings',
				'menu_title' => 'Website Options',
				'menu_slug'  => 'website-settings',
				'capability' => 'edit_posts',
				'redirect'   => false,
			) );

			// Sub page for article to set content for the archive
			acf_add_options_sub_page(array(
				'page_title' => 'Article Archive Content',
				'menu_title' => 'Article Archive Content',
				'parent_slug' => 'edit.php?post_type=article'
			));
		}

		// Enqueue JS and CSS
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_scripts' ) );

		// ACF Customisations
		ACFCustomisations::add_google_api_key_to_acf();
		ACFCustomisations::add_acf_options_pages();
	}

	/* Function which displays your post date in time ago format */
	public static function meks_time_ago() {
		return human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' );
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
	 * Get meta for different post types and return to the search
	 *
	 * @param $post
	 *
	 * @return string
	 */
	public static function get_post_type_meta($post)
	{
			global $post;

			switch ( get_post_type($post) ) {
				
					case 'Article' :
						$category = get_the_terms($post, 'article_cat');
						$date = get_the_date('jS F Y', $post);
						$meta = $date . " <span>&bull;</span> " . $category[0]->name;
						break;
					case 'page' :
						$meta = ( $post->post_parent ) ? get_the_title($post->post_parent) : 'Page';
						break;
					default :
						break;
			}
			
			return $meta;
	}

	/**
	 * Enqueue all javascript and css files
	 */
	public static function enqueue_scripts()
	{
		$js_cache_buster = date("YmdHi", filemtime( get_stylesheet_directory() . '/dist/scripts/scripts.js' ) );
		$css_cache_buster = date("YmdHi", filemtime( get_stylesheet_directory() . '/dist/styles/style.css' ) );

		wp_enqueue_script('jQuery', 'https://code.jquery.com/jquery-3.5.1.min.js', array(), '1.0', true);
		wp_enqueue_script('themejs', get_template_directory_uri() . '/dist/scripts/scripts.js', array('jquery'), $js_cache_buster, true );
		wp_enqueue_style('themecss', get_template_directory_uri() . '/dist/styles/style.css', array(), $css_cache_buster);

		if (is_front_page()) {
			wp_enqueue_script('typejs', 'https://cdn.jsdelivr.net/npm/typed.js@2.0.9', array('jquery'), false);
		}
	}
}
function numeric_posts_nav() {
 
	if( is_singular() )
			return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
			return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/** Add current page to the array */
	if ( $paged >= 1 )
			$links[] = $paged;

	/** Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
			$links[] = $paged - 1;
			$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
			$links[] = $paged + 2;
			$links[] = $paged + 1;
	}

	echo '<div class="pagination"><ul>' . "\n";

	/** Previous Post Link */
	// if ( get_previous_posts_link() )
	// 		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/** Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
			$class = 1 == $paged ? ' class="active"' : '';

			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

			if ( ! in_array( 2, $links ) )
					echo '<li>…</li>';
	}

	/** Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
			$class = $paged == $link ? ' class="active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/** Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
			if ( ! in_array( $max - 1, $links ) )
					echo '<li>…</li>' . "\n";

			$class = $paged == $max ? ' class="active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/** Next Post Link */
	// if ( get_next_posts_link() )
	// 		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}

/**
 * Returns information about the current post's discussion, with cache support.
 */
function outdata_get_discussion_data() {
	static $discussion, $post_id;

	$current_post_id = get_the_ID();
	if ( $current_post_id === $post_id ) {
		return $discussion; /* If we have discussion information for post ID, return cached object */
	} else {
		$post_id = $current_post_id;
	}

	$comments = get_comments(
		array(
			'post_id' => $current_post_id,
			'orderby' => 'comment_date_gmt',
			'order'   => get_option( 'comment_order', 'asc' ), /* Respect comment order from Settings » Discussion. */
			'status'  => 'approve',
			'number'  => 20, /* Only retrieve the last 20 comments, as the end goal is just 6 unique authors */
		)
	);

	$authors = array();
	foreach ( $comments as $comment ) {
		$authors[] = ( (int) $comment->user_id > 0 ) ? (int) $comment->user_id : $comment->comment_author_email;
	}

	$authors    = array_unique( $authors );
	$discussion = (object) array(
		'authors'   => array_slice( $authors, 0, 6 ),           /* Six unique authors commenting on the post. */
		'responses' => get_comments_number( $current_post_id ), /* Number of responses. */
	);

	return $discussion;
}

/**
 * Returns the size for avatars used in the theme.
 */
function outdata_get_avatar_size() {
	return 60;
}
new theme();