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
