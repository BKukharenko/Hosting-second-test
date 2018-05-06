<?php
$container = get_theme_mod( 'understrap_container_type' );
?>

<section class="our-hosting-section py-5">
    <div class="<?php echo esc_attr( $container ); ?>">

		<?php if ( get_sub_field( 'label_above_section_header' ) ) { ?>
            <span class="text-above-section-header text-uppercase">
			    <?= get_sub_field( 'label_above_section_header' ); ?>
            </span>
		<?php } ?>

		<?php if ( get_sub_field( 'section_header' ) ) { ?>
            <h1 class="section-header text-uppercase mb-5">
				<?= get_sub_field( 'section_header' ); ?>
            </h1>
		<?php } ?>

        <?php
        $args = array(
	        'post_type'        => 'hostings',
	        'posts_per_page'   => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) { ?>
	        <ul class="hostings row pl-0 justify-content-center">
            <?php
	        while ( $query->have_posts() ) {
		        $query->the_post(); ?>
                <li class="hosting col-sm-6 col-lg-3 mb-5">
                    <div class="hosting-wrapper text-center py-5">
				        <?php if ( get_field( 'price' ) ) { ?>
                            <span class="price d-block">
			                            <?= get_field( 'price' ); ?>
                                    </span>
				        <?php } ?>
				        <?php if ( get_field( 'per_text' ) ) { ?>
                            <span class="per-text text-uppercase">
			                            <?= get_field( 'per_text' ); ?>
                                    </span>
				        <?php } ?>
				        <?php if( !empty( $post->post_title ) ) { ?>
                            <h3 class="type-of-plan text-uppercase mt-4 mb-5 mx-auto">
						        <?= get_the_title() ?>
                            </h3>
				        <?php } ?>
                        <div class="hosting-characteristics d-flex flex-column mb-5">
					        <?php if ( get_field( 'disk_space' ) ) { ?>
                                <span class="disk-space characteristic">
                                        <?= get_field( 'disk_space' ); ?>
                                    </span>
					        <?php } ?>
					        <?php if ( get_field( 'bandwidth' ) ) { ?>
                                <span class="bandwidth characteristic">
                                        <?= get_field( 'bandwidth' ); ?>
                                    </span>
					        <?php } ?>
					        <?php if ( get_field( 'protection' ) ) { ?>
                                <span class="protection characteristic">
                                        <?= get_field( 'protection' ); ?>
                                    </span>
					        <?php } ?>
					        <?php if ( get_field( 'backups' ) ) { ?>
                                <span class="backups characteristic">
                                        <?= get_field( 'backups' ); ?>
                                    </span>
					        <?php } ?>
					        <?php if ( get_field( 'type_of_hosting' ) ) { ?>
                                <span class="backups characteristic">
                                        <?= get_field( 'type_of_hosting' ); ?>
                                    </span>
					        <?php } ?>
                        </div>
				        <?php if ( get_field( 'button_text' ) ) { ?>
                            <a href="<?php the_permalink() ?>" class="hosting-btn site-btn">
						        <?= get_field( 'button_text' ); ?>
                            </a>
				        <?php } ?>
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