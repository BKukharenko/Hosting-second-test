<?php
$container = get_theme_mod( 'understrap_container_type' );
?>

<section class="our-team-section py-5">
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
			'post_type'      => 'team',
			'posts_per_page' => - 1,
			'post_status'    => 'publish',
			'orderby'        => 'publish_date',
			'order'          => 'ASC'
		);
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) { ?>
            <ul class="team-members row pl-0 justify-content-center">
				<?php
				while ( $query->have_posts() ) {
					$query->the_post(); ?>
                    <li class="team-member col-sm-6 col-lg-4 col-xl-3">
                        <div class="member-wrapper py-5">
                            <div class="image-wrapper">
								<?php the_post_thumbnail(); ?>
                            </div>
                            <div class="member-info-wrapper mt-4 row no-gutters justify-content-between">
                                <div class="member-info">
                                    <h3 class="member-name text-uppercase mb-0"><?php the_title();?></h3>
	                                <?php if ( get_field( 'position' ) ) { ?>
                                    <span class="member-position">
                                        <?php the_field( 'position' ); ?>
                                    </span>
	                                <?php } ?>
                                </div>
								<?php if ( have_rows( 'member_links' ) ): ?>
                                    <ul class="member-links row ml-sm-auto pl-0 no-gutters my-auto">

										<?php while ( have_rows( 'member_links' ) ): the_row(); ?>

                                            <li class="member-link">
												<?php if ( get_sub_field( 'social_link' ) ) { ?>
                                                    <a href="<?php the_sub_field( 'social_link' ); ?>" target="_blank"
                                                       class="social-link">
														<?php if ( get_sub_field( 'social_link_icon' ) ) { ?>
															<?php the_sub_field( 'social_link_icon' ); ?>
														<?php } ?>
                                                    </a>
												<?php } ?>
                                            </li>
										<?php endwhile; ?>
                                    </ul>
								<?php endif; ?>
                            </div>
                        </div>
                    </li>
					<?php
				} // end while ?>
            </ul>
			<?php
		} // end if
		wp_reset_query();

		?>
    </div>
</section>