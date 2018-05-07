<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php
if ( is_single() ) { ?>
    <div class="comments-form">
        <div class="<?php echo esc_attr( $container ); ?>">
	        <?php if ( get_theme_mod( 'comment_form_icon' ) ) { ?>
			    <?= get_theme_mod( 'comment_form_icon' ); ?>
	        <?php } ?>
            <div class="blog-heading">
		        <?php if ( get_theme_mod( 'comment_form_header_above_label' ) ) { ?>
                    <span class="text-above-section-header text-uppercase">
			    <?= get_theme_mod( 'comment_form_header_above_label' ); ?>
            </span>
		        <?php } ?>

		        <?php if ( get_theme_mod( 'comment_form_header' ) ) { ?>
                    <h2 class="section-header text-uppercase mb-5">
				        <?= get_theme_mod( 'comment_form_header' ); ?>
                    </h2>
		        <?php } ?>
            </div>
			<?php
			comment_form();
			?>
        </div>
    </div>
	<?php
} else {
	?>

    <div class="newsletter-wrapper py-5">
        <div class="<?php echo esc_attr( $container ); ?>">
            <div class="row">
                <div class="newsletter-form-description col-md-4 col-lg-3 d-flex flex-column">
					<?php if ( get_field( 'icon', 'options' ) ) { ?>
						<?= get_field( 'icon', 'options' ); ?>
					<?php } ?>
					<?php if ( get_field( 'label_above_heading', 'options' ) ) { ?>
                        <span class="newsletter-label-above-heading text-uppercase">
		                <?= get_field( 'label_above_heading', 'options' ); ?>
                    </span>
					<?php } ?>
					<?php if ( get_field( 'heading', 'options' ) ) { ?>
                        <h1 class="newsletter-heading text-uppercase">
							<?= get_field( 'heading', 'options' ); ?>
                        </h1>
					<?php } ?>
                </div>
                <div class="newsletter-form-wrapper col-md-8 col-lg-9">
                    <form action="#" name="newsletter-form" class="form-inline newsletter-form mt-3">
                        <input class="domain-input" type="text" placeholder="Enter your domain here">
                        <input class="newsletter-btn site-btn" type="button" value="Sign Up Now">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<div class="wrapper" id="wrapper-footer">

    <div class="<?php echo esc_attr( $container ); ?>">

        <div class="row">

            <div class="col-md-12">

                <footer class="site-footer" id="colophon">

                    <div class="site-info row no-gutters py-5">
                        <div class="col-sm-6 col-lg-3 logo-copyrights d-flex mb-4">
                            <div class="logo-copyrights-wrapper my-auto mx-auto mx-md-0">
								<?php if ( get_theme_mod( 'footer_logo' ) ) { ?>
                                    <h1 class="footer-logo mb-0">
                                        <a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                            <img src="<?= get_theme_mod( 'footer_logo' ); ?>" alt="footer logo">
                                        </a>
                                    </h1>
								<?php } ?>
                                <time class="copyright-year" datetime="<?= date( 'Y' ); ?>">
									<?= date( 'Y' ); ?>
                                </time>
								<?php if ( get_theme_mod( 'copyright_text' ) ) { ?>
                                    <span class="copyright-text">
                                        <?= get_theme_mod( 'copyright_text' ); ?>
                                    </span>
								<?php } ?>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 quick-links text-center text-sm-left">
							<?php if ( get_theme_mod( 'links_heading' ) ) { ?>
                                <h3 class="quick-links-heading text-uppercase mb-4">
									<?= get_theme_mod( 'links_heading' ); ?>
                                </h3>
							<?php } ?>
                            <nav class="footer-nav">
								<?php wp_nav_menu(
									array(
										'theme_location'  => 'footer-menu',
										'container_class' => 'footer-menu-container row no-gutters justify-content-center justify-content-sm-start',
										'container_id'    => '',
										'menu_class'      => 'footer-menu pl-1',
										'fallback_cb'     => '',
										'menu_id'         => 'footer-menu',
										'walker'          => new footer_nav_walker(),
									)
								); ?>
                            </nav>
                        </div>
                        <div class="col-sm-6 col-lg-3 contact-us text-center text-sm-left mb-3 mb-md-0">
							<?php if ( get_theme_mod( 'contact_us_heading' ) ) { ?>
                                <h3 class="contact-us-heading mb-4 text-uppercase">
									<?= get_theme_mod( 'contact_us_heading' ); ?>
                                </h3>
							<?php } ?>
							<?php if ( get_theme_mod( 'address_label' ) ) { ?>
                            <div class="address mx-auto mx-sm-0">
                                <span class="label">
			                        <?= get_theme_mod( 'address_label' ); ?>
                                </span>
								<?php } ?>
								<?php if ( get_theme_mod( 'address' ) ) { ?>
                                <address class="footer-address d-inline">
									<?= get_theme_mod( 'address' ); ?>
                                </address>
                            </div>
						<?php } ?>
							<?php if ( get_theme_mod( 'email_label' ) ) { ?>
                            <div class="email">
                                <span class="label">
			                        <?= get_theme_mod( 'email_label' ); ?>
                                </span>
								<?php } ?>
								<?php if ( get_theme_mod( 'footer_email' ) ) { ?>
                                <a class="footer-email" href="mailto:<?= get_theme_mod( 'footer_email' ); ?>">
									<?= get_theme_mod( 'footer_email' ); ?>
                                </a>
                            </div>
						<?php } ?>
							<?php if ( get_theme_mod( 'phone_label' ) ) { ?>
                                <span class="label">
			                        <?= get_theme_mod( 'phone_label' ); ?>
                                </span>
							<?php } ?>
							<?php if ( get_theme_mod( 'phone_number' ) ) { ?>
                                <a class="footer-phone" href="tel:<?= get_theme_mod( 'phone_link' ); ?>">
									<?= get_theme_mod( 'phone_number' ); ?>
                                </a>
							<?php } ?>
                        </div>
                        <div class="col-sm-6 col-lg-3 social-links text-center text-sm-left">
							<?php if ( get_field( 'footer_links_heading', 'option' ) ) { ?>
                                <h3 class="social-links-heading mb-4 text-uppercase">
									<?= get_field( 'footer_links_heading', 'option' ); ?>
                                </h3>
							<?php } ?>
							<?php if ( have_rows( 'footer_social_links', 'option' ) ): ?>

                                <ul class="row social-links no-gutters pl-0 justify-content-center justify-content-sm-start">

									<?php while ( have_rows( 'footer_social_links', 'option' ) ): the_row(); ?>

                                        <li>
                                            <a href="<?php the_sub_field( 'link_to_social_site' ); ?>" target="_blank"
                                               class="social-link">
												<?php the_sub_field( 'font_awesome_icon' ); ?>
                                            </a>
                                        </li>

									<?php endwhile; ?>

                                </ul>

							<?php endif; ?>
                        </div>
                    </div><!-- .site-info -->

                </footer><!-- #colophon -->

            </div><!--col end -->

        </div><!-- row end -->

    </div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

