<?php
/**
 * Template Name: Testimonials Page Template
 *
 * Template for displaying a Testimonials page.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="page-banner-wrapper"
     style="background: url(<?= get_theme_mod( 'testimonials_page_banner_bg' ) ?>) no-repeat; background-size: cover">
    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
        <div class="banner-content">
			<?php if ( get_theme_mod( 'testimonials_page_banner_header' ) ) { ?>
                <h1 class="banner-header text-uppercase mb-0">
					<?= get_theme_mod( 'testimonials_page_banner_header' ); ?>
                </h1>
			<?php } ?>
			<?php if ( get_theme_mod( 'testimonials_page_banner_sub_header' ) ) { ?>
                <span class="banner-sub-header text-uppercase">
			        <?= get_theme_mod( 'testimonials_page_banner_sub_header' ); ?>
                </span>
			<?php } ?>
        </div>
    </div>
</div>

<div class="page-content my-5">
    <div class="<?php echo esc_attr( $container ); ?>">
        <div class="blog-heading pb-4">
			<?php if ( get_theme_mod( 'label_above_testimonials_page_header' ) ) { ?>
                <span class="text-above-section-header text-uppercase">
			    <?= get_theme_mod( 'label_above_testimonials_page_header' ); ?>
            </span>
			<?php } ?>

			<?php if ( get_theme_mod( 'testimonials_page_header' ) ) { ?>
                <h2 class="section-header text-uppercase mb-5">
					<?= get_theme_mod( 'testimonials_page_header' ); ?>
                </h2>
			<?php } ?>
        </div>

		<?php
		$args = array(
			'posts_per_page' => - 1,
			'post_type'      => "testimonials",
			'post_status' => 'publish',
            'orderby' => 'publish_date',
            'order' => 'ASC'
		);

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) { ?>
            <ul class="testimonials-list row pl-0 grid">
				<?php
				while ( $query->have_posts() ) {
					$query->the_post(); ?>
                    <li class="testimonial col-lg-4 grid-item">
	                    <?php if ( get_field( 'testimonial_icon' ) ) { ?>
		                    <?= get_field( 'testimonial_icon' ); ?>
	                    <?php } ?>
                        <div class="testimonial-wrapper">
                            <div class="testimonial-text">
								<?php the_content(); ?>
                            </div>
                            <div class="row testimonial-info mt-4 no-gutters">
                                <div class="image-wrapper">
									<?php the_post_thumbnail(); ?>
                                </div>
                                <div class="testimonial-name-wrapper ml-3 my-auto">
									<?php if ( get_field( 'by_who_text' ) ) { ?>
                                        <span class="text-uppercase">
			                            <?= get_field( 'by_who_text' ); ?>
                                    </span>
									<?php } ?>
                                    <h3 class="testimonial-name text-uppercase mb-0">
										<?php the_title(); ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </li>
					<?php
				} ?>
            </ul>
			<?php
		} else {

		}
		wp_reset_postdata();
		?>


        <div class="testimonials-form-wrapper">
            <div class="blog-heading">
				<?php if ( get_theme_mod( 'label_above_testimonials_page_form_header' ) ) { ?>
                    <span class="text-above-section-header text-uppercase">
			    <?= get_theme_mod( 'label_above_testimonials_page_form_header' ); ?>
            </span>
				<?php } ?>

				<?php if ( get_theme_mod( 'testimonials_page_form_header' ) ) { ?>
                    <h2 class="section-header text-uppercase mb-5">
						<?= get_theme_mod( 'testimonials_page_form_header' ); ?>
                    </h2>
				<?php } ?>
            </div>

            <form action="#" name="testimonials-form" class="testimonials-form">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control required" id="name" name="name" placeholder="Name*"
                               required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" class="form-control required" id="email" name="email" placeholder="Email*"
                               required>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control required" id="subject" name="subject" placeholder="Subject*"
                           required>
                </div>
                <div class="form-group">
                    <textarea class="form-control required" id="questions" name="questions" placeholder="Comments*"
                              rows="8" required></textarea>
                </div>
                <button type="submit" class="btn site-btn testimonials-form-btn">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php get_footer(); ?>

