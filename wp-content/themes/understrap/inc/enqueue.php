<?php
/**
 * Understrap enqueue scripts
 *
 * @package understrap
 */

if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript sources.
	 */
	function understrap_scripts() {
		// Get the theme data.
		$the_theme = wp_get_theme();
		wp_enqueue_style( 'understrap-styles', get_stylesheet_directory_uri() . '/css/theme.min.css', array(), $the_theme->get( 'Version' ) );
		if (is_front_page()) {
			wp_enqueue_style( 'slick-styles', get_stylesheet_directory_uri() . '/libs/slick.css', array(), $the_theme->get( 'Version' ), false );
			wp_enqueue_style( 'slick-theme-styles', get_stylesheet_directory_uri() . '/libs/slick-theme.css', array(), $the_theme->get( 'Version' ), false );
		}
		wp_enqueue_script( 'jquery');
		wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), true);
		if (is_front_page()) {
			wp_enqueue_script( 'slick-scripts', get_template_directory_uri() . '/libs/slick.min.js', array( 'jquery' ), $the_theme->get( 'Version' ), true );
		}
		if (is_page('testimonials-page')) {
			wp_enqueue_script( 'masonry-script', 'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js', array( 'jquery' ), $the_theme->get( 'Version' ), true );
		}
		wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $the_theme->get( 'Version' ), true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // endif function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );
