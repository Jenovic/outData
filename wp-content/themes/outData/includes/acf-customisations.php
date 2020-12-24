<?php
/**
 * Advanced Custom Fields Customisations
 * Add all hooks and filters to customise acf here
 */
class ACFCustomisations
{
	/**
	 * Add a google api key to acf for google maps
	 */
	public static function add_google_api_key_to_acf()
	{
		add_filter('acf/settings/google_api_key', function() {
			return 'AIzaSyBi4izd8aJjRJMYOaYHDEc00x0vVDBuSQQ';
		});
	}

	/**
	 * Add acf options pages to the WordPress admin
	 */
	public static function add_acf_options_pages()
	{
		if (function_exists('acf_add_options_page')) {
			$option_page = acf_add_options_page(array(
				'page_title' => 'Sitewide Settings',
				'menu_title' => 'Sitewide Settings',
				'menu_slug' => 'acf-options-website-settings',
				'capabilities' => 'edit_posts',
				'redirect' => false,
			));
		}
	}
}