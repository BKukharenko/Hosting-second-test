<?php
/**
 * Understrap Theme Customizer
 *
 * @package understrap
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'understrap_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function understrap_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'understrap_customize_register' );

if ( ! function_exists( 'understrap_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function understrap_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section( 'understrap_theme_layout_options', array(
			'title'       => __( 'Theme Layout Settings', 'understrap' ),
			'capability'  => 'edit_theme_options',
			'description' => __( 'Container width and sidebar defaults', 'understrap' ),
			'priority'    => 160,
		) );

		 //select sanitization function
        function understrap_theme_slug_sanitize_select( $input, $setting ){
         
            //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
            $input = sanitize_key($input);
 
            //get the list of possible select options 
            $choices = $setting->manager->get_control( $setting->id )->choices;
                             
            //return input if valid or return default option
            return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
             
        }

		$wp_customize->add_setting( 'understrap_container_type', array(
			'default'           => 'container',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'understrap_theme_slug_sanitize_select',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_container_type', array(
					'label'       => __( 'Container Width', 'understrap' ),
					'description' => __( "Choose between Bootstrap's container and container-fluid", 'understrap' ),
					'section'     => 'understrap_theme_layout_options',
					'settings'    => 'understrap_container_type',
					'type'        => 'select',
					'choices'     => array(
						'container'       => __( 'Fixed width container', 'understrap' ),
						'container-fluid' => __( 'Full width container', 'understrap' ),
					),
					'priority'    => '10',
				)
			) );

		$wp_customize->add_setting( 'understrap_sidebar_position', array(
			'default'           => 'right',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_sidebar_position', array(
					'label'       => __( 'Sidebar Positioning', 'understrap' ),
					'description' => __( "Set sidebar's default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.",
					'understrap' ),
					'section'     => 'understrap_theme_layout_options',
					'settings'    => 'understrap_sidebar_position',
					'type'        => 'select',
					'sanitize_callback' => 'understrap_theme_slug_sanitize_select',
					'choices'     => array(
						'right' => __( 'Right sidebar', 'understrap' ),
						'left'  => __( 'Left sidebar', 'understrap' ),
						'both'  => __( 'Left & Right sidebars', 'understrap' ),
						'none'  => __( 'No sidebar', 'understrap' ),
					),
					'priority'    => '20',
				)
			) );
	}
} // endif function_exists( 'understrap_theme_customize_register' ).
add_action( 'customize_register', 'understrap_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'understrap_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function understrap_customize_preview_js() {
		wp_enqueue_script( 'understrap_customizer', get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ), '20130508', true );
	}
}
add_action( 'customize_preview_init', 'understrap_customize_preview_js' );

add_action('customize_register', 'header_customizer');
function header_customizer($wp_customize) {
	//adding section in wordpress customizer
	$wp_customize->add_section( 'header_contacts_login', array(
		'title'       => __( 'Header' ),
		'description' => __( 'Add or change your information in header' )
	) );

	$wp_customize->add_setting( 'support_text', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'support_text', array(
		'label'    => 'Support label',
		'section'  => 'header_contacts_login',
		'type'     => 'text',
		'settings' => 'support_text',
	) );

	$wp_customize->add_setting( 'header_email', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'header_email', array(
		'label'    => 'Email',
		'section'  => 'header_contacts_login',
		'type'     => 'text',
		'settings' => 'header_email',
	) );

	$wp_customize->add_setting( 'register_text', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'register_text', array(
		'label'    => 'Register label',
		'section'  => 'header_contacts_login',
		'type'     => 'text',
		'settings' => 'register_text',
	) );

	$wp_customize->add_setting( 'login_text', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'login_text', array(
		'label'    => 'Login label',
		'section'  => 'header_contacts_login',
		'type'     => 'text',
		'settings' => 'login_text',
	) );
};

add_action('customize_register', 'footer_customizer');
function footer_customizer($wp_customize) {
	//adding section in wordpress customizer
	$wp_customize->add_section( 'footer_section', array(
		'title'       => __( 'Footer' ),
		'description' => __( 'Add or change your information in footer' )
	) );

	$wp_customize->add_setting( 'footer_logo', array(
		'default'        => '',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo', array(
		'label'   => 'Footer Logo',
		'section' => 'footer_section',
		'settings'   => 'footer_logo',
	) ) );

	$wp_customize->add_setting( 'copyright_text', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'copyright_text', array(
		'label'    => 'Copyright Text',
		'section'  => 'footer_section',
		'type'     => 'text',
		'settings' => 'copyright_text',
	) );

	$wp_customize->add_setting( 'links_heading', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'links_heading', array(
		'label'    => 'Quick Links Heading',
		'section'  => 'footer_section',
		'type'     => 'text',
		'settings' => 'links_heading',
	) );

	$wp_customize->add_setting( 'contact_us_heading', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'contact_us_heading', array(
		'label'    => 'Contact Us Heading',
		'section'  => 'footer_section',
		'type'     => 'text',
		'settings' => 'contact_us_heading',
	) );

	$wp_customize->add_setting( 'address_label', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'address_label', array(
		'label'    => 'Address Label',
		'section'  => 'footer_section',
		'type'     => 'text',
		'settings' => 'address_label',
	) );

	$wp_customize->add_setting( 'address', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'address', array(
		'label'    => 'Address',
		'section'  => 'footer_section',
		'type'     => 'text',
		'settings' => 'address',
	) );

	$wp_customize->add_setting( 'email_label', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'email_label', array(
		'label'    => 'Email Label',
		'section'  => 'footer_section',
		'type'     => 'text',
		'settings' => 'email_label',
	) );

	$wp_customize->add_setting( 'footer_email', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'footer_email', array(
		'label'    => 'Email',
		'section'  => 'footer_section',
		'type'     => 'text',
		'settings' => 'footer_email',
	) );

	$wp_customize->add_setting( 'phone_label', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'phone_label', array(
		'label'    => 'Phone Label',
		'section'  => 'footer_section',
		'type'     => 'text',
		'settings' => 'phone_label',
	) );

	$wp_customize->add_setting( 'phone_number', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'phone_number', array(
		'label'    => 'Phone Number',
		'section'  => 'footer_section',
		'type'     => 'text',
		'settings' => 'phone_number',
	) );

	$wp_customize->add_setting( 'phone_link', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'phone_link', array(
		'label'    => 'Phone Link',
		'section'  => 'footer_section',
		'type'     => 'text',
		'settings' => 'phone_link',
	) );

};

//Blog Page Customizer
add_action('customize_register', 'blog_page_customizer');
function blog_page_customizer($wp_customize) {
	//adding section in wordpress customizer
	$wp_customize->add_section( 'blog_page', array(
		'title'       => __( 'Blog Page' ),
		'description' => __( 'Add or change banner image and headers on Blog Page' )
	) );

	$wp_customize->add_setting( 'blog_page_banner_bg', array(
		'default'        => '',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'blog_page_banner_bg', array(
		'label'   => 'Banner Image',
		'section' => 'blog_page',
		'settings'   => 'blog_page_banner_bg',
	) ) );

	$wp_customize->add_setting( 'blog_page_banner_header', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'blog_page_banner_header', array(
		'label'    => 'Banner Header',
		'section'  => 'blog_page',
		'type'     => 'text',
		'settings' => 'blog_page_banner_header',
	) );

	$wp_customize->add_setting( 'blog_page_banner_sub_header', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'blog_page_banner_sub_header', array(
		'label'    => 'Banner Sub-Header',
		'section'  => 'blog_page',
		'type'     => 'text',
		'settings' => 'blog_page_banner_sub_header',
	) );

	$wp_customize->add_setting( 'label_above_blog_header', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'label_above_blog_header', array(
		'label'    => 'Label Above Blog Header',
		'section'  => 'blog_page',
		'type'     => 'text',
		'settings' => 'label_above_blog_header',
	) );

	$wp_customize->add_setting( 'blog_header', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'blog_header', array(
		'label'    => 'Blog Header',
		'section'  => 'blog_page',
		'type'     => 'text',
		'settings' => 'blog_header',
	) );

	$wp_customize->add_setting( 'posted_by_label_blog', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'posted_by_label_blog', array(
		'label'    => '"Posted By" label in post',
		'section'  => 'blog_page',
		'type'     => 'text',
		'settings' => 'posted_by_label_blog',
	) );

	$wp_customize->add_setting( 'date_label_blog', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'date_label_blog', array(
		'label'    => '"Date" label in post',
		'section'  => 'blog_page',
		'type'     => 'text',
		'settings' => 'date_label_blog',
	) );
};

//Single Post Page Customizer

add_action('customize_register', 'single_page_customizer');
function single_page_customizer($wp_customize) {
	//adding section in wordpress customizer
	$wp_customize->add_section( 'single_page', array(
		'title'       => __( 'Single Post Page' ),
		'description' => __( 'Add or change banner image and headers on Single Post Page' )
	) );

	$wp_customize->add_setting( 'single_page_banner_bg', array(
		'default'        => '',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'single_page_banner_bg', array(
		'label'   => 'Banner Image',
		'section' => 'single_page',
		'settings'   => 'single_page_banner_bg',
	) ) );

	$wp_customize->add_setting( 'single_page_banner_header', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'single_page_banner_header', array(
		'label'    => 'Banner Header',
		'section'  => 'single_page',
		'type'     => 'text',
		'settings' => 'single_page_banner_header',
	) );

	$wp_customize->add_setting( 'single_page_banner_sub_header', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'single_page_banner_sub_header', array(
		'label'    => 'Banner Sub-Header',
		'section'  => 'single_page',
		'type'     => 'text',
		'settings' => 'single_page_banner_sub_header',
	) );

	$wp_customize->add_setting( 'label_above_single_page_header', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'label_above_single_page_header', array(
		'label'    => 'Label Above Single Page Header',
		'section'  => 'single_page',
		'type'     => 'text',
		'settings' => 'label_above_single_page_header',
	) );

	$wp_customize->add_setting( 'single_page_header', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'single_page_header', array(
		'label'    => 'Single Page Header',
		'section'  => 'single_page',
		'type'     => 'text',
		'settings' => 'single_page_header',
	) );

	$wp_customize->add_setting( 'posted_by_label_single', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'posted_by_label_single', array(
		'label'    => '"Posted By" label in post',
		'section'  => 'single_page',
		'type'     => 'text',
		'settings' => 'posted_by_label_single',
	) );

	$wp_customize->add_setting( 'date_label_single', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'date_label_single', array(
		'label'    => '"Date" label in post',
		'section'  => 'single_page',
		'type'     => 'text',
		'settings' => 'date_label_single',
	) );

	$wp_customize->add_setting( 'comment_form_icon', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'comment_form_icon', array(
		'label'    => 'Comment form icon',
		'section'  => 'single_page',
		'type'     => 'text',
		'settings' => 'comment_form_icon',
	) );

	$wp_customize->add_setting( 'comment_form_header_above_label', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'comment_form_header_above_label', array(
		'label'    => 'Label above comment form header',
		'section'  => 'single_page',
		'type'     => 'text',
		'settings' => 'comment_form_header_above_label',
	) );

	$wp_customize->add_setting( 'comment_form_header', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'comment_form_header', array(
		'label'    => 'Comment form header',
		'section'  => 'single_page',
		'type'     => 'text',
		'settings' => 'comment_form_header',
	) );
};

//FAQ Page customizer
add_action('customize_register', 'faq_page_customizer');
function faq_page_customizer($wp_customize) {
	//adding section in wordpress customizer
	$wp_customize->add_section( 'faq_page', array(
		'title'       => __( 'FAQ Page' ),
		'description' => __( 'Add or change banner image and headers on FAQ Page' )
	) );

	$wp_customize->add_setting( 'faq_page_banner_bg', array(
		'default'        => '',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'faq_page_banner_bg', array(
		'label'   => 'Banner Image',
		'section' => 'faq_page',
		'settings'   => 'faq_page_banner_bg',
	) ) );

	$wp_customize->add_setting( 'faq_page_banner_header', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'faq_page_banner_header', array(
		'label'    => 'Banner Header',
		'section'  => 'faq_page',
		'type'     => 'text',
		'settings' => 'faq_page_banner_header',
	) );

	$wp_customize->add_setting( 'faq_page_banner_sub_header', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'faq_page_banner_sub_header', array(
		'label'    => 'Banner Sub-Header',
		'section'  => 'faq_page',
		'type'     => 'text',
		'settings' => 'faq_page_banner_sub_header',
	) );

	$wp_customize->add_setting( 'label_above_faq_page_header', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'label_above_faq_page_header', array(
		'label'    => 'Label Above FAQ Page Header',
		'section'  => 'faq_page',
		'type'     => 'text',
		'settings' => 'label_above_faq_page_header',
	) );

	$wp_customize->add_setting( 'faq_page_header', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'faq_page_header', array(
		'label'    => 'FAQ Page Header',
		'section'  => 'faq_page',
		'type'     => 'text',
		'settings' => 'faq_page_header',
	) );

	$wp_customize->add_setting( 'faq_btn_text', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'faq_btn_text', array(
		'label'    => 'FAQ Button Text',
		'section'  => 'faq_page',
		'type'     => 'text',
		'settings' => 'faq_btn_text',
	) );

	$wp_customize->add_setting( 'label_above_faq_page_form_header', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'label_above_faq_page_form_header', array(
		'label'    => 'Label Above FAQ Page Form Header',
		'section'  => 'faq_page',
		'type'     => 'text',
		'settings' => 'label_above_faq_page_form_header',
	) );

	$wp_customize->add_setting( 'faq_page_form_header', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'faq_page_form_header', array(
		'label'    => 'FAQ Page Form Header',
		'section'  => 'faq_page',
		'type'     => 'text',
		'settings' => 'faq_page_form_header',
	) );
};

//Testimonials Page customizer
add_action('customize_register', 'testimonials_page_customizer');
function testimonials_page_customizer($wp_customize) {
	//adding section in wordpress customizer
	$wp_customize->add_section( 'testimonials_page', array(
		'title'       => __( 'Testimonials Page' ),
		'description' => __( 'Add or change banner image and headers on Testimonials Page' )
	) );

	$wp_customize->add_setting( 'testimonials_page_banner_bg', array(
		'default'        => '',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'testimonials_page_banner_bg', array(
		'label'   => 'Banner Image',
		'section' => 'testimonials_page',
		'settings'   => 'testimonials_page_banner_bg',
	) ) );

	$wp_customize->add_setting( 'testimonials_page_banner_header', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'testimonials_page_banner_header', array(
		'label'    => 'Banner Header',
		'section'  => 'testimonials_page',
		'type'     => 'text',
		'settings' => 'testimonials_page_banner_header',
	) );

	$wp_customize->add_setting( 'testimonials_page_banner_sub_header', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'testimonials_page_banner_sub_header', array(
		'label'    => 'Banner Sub-Header',
		'section'  => 'testimonials_page',
		'type'     => 'text',
		'settings' => 'testimonials_page_banner_sub_header',
	) );

	$wp_customize->add_setting( 'label_above_testimonials_page_header', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'label_above_testimonials_page_header', array(
		'label'    => 'Label Above Testimonials Page Header',
		'section'  => 'testimonials_page',
		'type'     => 'text',
		'settings' => 'label_above_testimonials_page_header',
	) );

	$wp_customize->add_setting( 'testimonials_page_header', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'testimonials_page_header', array(
		'label'    => 'Testimonials Page Header',
		'section'  => 'testimonials_page',
		'type'     => 'text',
		'settings' => 'testimonials_page_header',
	) );

	$wp_customize->add_setting( 'label_above_testimonials_page_form_header', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'label_above_testimonials_page_form_header', array(
		'label'    => 'Label Above Testimonials Page Form Header',
		'section'  => 'testimonials_page',
		'type'     => 'text',
		'settings' => 'label_above_testimonials_page_form_header',
	) );

	$wp_customize->add_setting( 'testimonials_page_form_header', array(
		'default' => ''
	) );
	$wp_customize->add_control( 'testimonials_page_form_header', array(
		'label'    => 'Testimonials Page Form Header',
		'section'  => 'testimonials_page',
		'type'     => 'text',
		'settings' => 'testimonials_page_form_header',
	) );
};
