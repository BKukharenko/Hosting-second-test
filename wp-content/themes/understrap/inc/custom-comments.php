<?php
/**
 * Comment layout.
 *
 * @package understrap
 */

// Comments form.
add_filter( 'comment_form_default_fields', 'understrap_bootstrap_comment_form_fields' );

/**
 * Creates the comments form.
 *
 * @param string $fields Form fields.
 *
 * @return array
 */

if ( ! function_exists( 'understrap_bootstrap_comment_form_fields' ) ) {

	function understrap_bootstrap_comment_form_fields( $fields ) {
		$commenter = wp_get_current_commenter();
		$req       = get_option( 'require_name_email' );
		$aria_req  = ( $req ? " aria-required='true'" : '' );
		$html5     = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
		$fields    = array(
			'author' => ' <div class="row"> <div class="col-lg-6">
						  <div class="form-group comment-form-author">' .
			            '<input class="form-control" id="author" name="author" type="text" placeholder="Name" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . '></div>',
			'email'  => '<div class="form-group comment-form-email">' .
			            '<input class="form-control" id="email" name="email" placeholder="Email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . '></div>',
			'url'    => '<div class="form-group comment-form-url">' .
			            '<input class="form-control" id="subject" name="subject" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="" placeholder="Subject" size="30"></div></div>',
		);

		return $fields;
	}
} // endif function_exists( 'understrap_bootstrap_comment_form_fields' )

add_filter( 'comment_form_defaults', 'understrap_bootstrap_comment_form' );

/**
 * Builds the form.
 *
 * @param string $args Arguments for form's fields.
 *
 * @return mixed
 */

if ( ! function_exists( 'understrap_bootstrap_comment_form' ) ) {

	function understrap_bootstrap_comment_form( $args ) {
		$args ['class_form'] = 'd-flex flex-column';
		$args['comment_notes_before'] = '';
		$args['title_reply'] = '';
		$args['comment_field'] = '<div class="col-lg-6"><div class="form-group comment-form-comment">
	    <textarea class="form-control" id="comment" name="comment" aria-required="true" placeholder="Comment" cols="45" rows="8"></textarea>
	    </div>
	    </div>
	    </div>';
		$args['label_submit'] = __('Submit', 'understrap');
		$args['class_submit']  = 'btn site-btn ml-auto'; // since WP 4.1.
		return $args;
	}
} // endif function_exists( 'understrap_bootstrap_comment_form' )
