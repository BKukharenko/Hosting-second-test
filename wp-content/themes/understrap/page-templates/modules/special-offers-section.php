<?php
$container = get_theme_mod( 'understrap_container_type' );
?>

<section class="special-offers-section my-5">
    <div class="<?php echo esc_attr( $container ); ?>">

		<?php if ( get_sub_field( 'label_above_section_header' ) ) { ?>
            <span class="text-above-section-header text-uppercase">
			    <?= get_sub_field( 'label_above_section_header' ); ?>
            </span>
		<?php } ?>

		<?php if ( get_sub_field( 'section_header' ) ) { ?>
            <h1 class="section-header text-uppercase">
				<?= get_sub_field( 'section_header' ); ?>
            </h1>
		<?php } ?>

		<?php
		$args  = array(
			'post_type'      => 'offers',
			'posts_per_page' => 2,
			'post_status'    => 'publish',
			'orderby'        => 'rand',
		);
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) { ?>
            <div class="special-offers-wrapper mt-5 row">
				<?php
				while ( $query->have_posts() ) {
					$query->the_post(); ?>
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <div class="row">
							<?php if ( has_post_thumbnail() ) { ?>
                                <div class="col-sm-6 col-md-6 image-wrapper">
									<?php the_post_thumbnail(); ?>
                                </div>
							<?php } ?>
                            <div class="col-sm-6 col-md-6 mt-3 mt-sm-0 post-content-wrapper">
								<?php if ( ! empty( $post->post_title ) ) { ?>
                                    <h3 class="offer-title text-uppercase"><?php the_title(); ?></h3>
								<?php } ?>
                                <div class="offer-description">
									<?php the_content(); ?>
                                </div>
								<?php if ( get_field( 'button_text' ) ) { ?>
                                    <a href="<?php the_permalink(); ?>" class="offer-link site-btn mt-auto">
										<?php the_field( 'button_text' ); ?>
                                    </a>
								<?php } ?>
                            </div>
                        </div>
                    </div>
					<?php
				} // end while ?>
            </div>
			<?php
		} // end if
		wp_reset_query();

		?>
    </div>
</section>