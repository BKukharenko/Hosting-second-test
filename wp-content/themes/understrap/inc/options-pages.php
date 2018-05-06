<?php
if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page( array(
		'page_title' => 'Footer Social Links',
		'menu_title' => 'Footer Social Links Settings',
		'menu_slug'  => 'footer-social-links-settings',
		'capability' => 'edit_posts',
		'redirect'   => false
	) );

	acf_add_options_page( array(
		'page_title' => 'Newsletter Form',
		'menu_title' => 'Newsletter Form Settings',
		'menu_slug'  => 'newsletter-form-settings',
		'capability' => 'edit_posts',
		'redirect'   => false
	) );
}