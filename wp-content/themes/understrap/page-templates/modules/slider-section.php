<?php
$container = get_theme_mod( 'understrap_container_type' );
?>

<section class="slider-section mt-3 mt-md-0">
	<?php if ( have_rows( 'slides' ) ): ?>
        <ul class="main-slider pl-0 mb-0">
			<?php while ( have_rows( 'slides' ) ): the_row(); ?>
                <li class="slide"
                    style="background: url(<?= get_sub_field( "slide_background_image" ) ?>) no-repeat; background-size:cover">
                    <div class="slider-content text-center">
                        <div class="<?php echo esc_attr( $container ); ?>">
	                        <?php if ( get_sub_field( 'slide_heading' ) ) { ?>
                                <h1 class="slide-heading text-uppercase">
			                        <?= get_sub_field( 'slide_heading' ); ?>
                                </h1>
	                        <?php } ?>
	                        <?php if ( get_sub_field( 'slide_sub_heading' ) ) { ?>
                                <h3 class="slide-sub-heading text-uppercase">
			                        <?= get_sub_field( 'slide_sub_heading' ); ?>
                                </h3>
	                        <?php } ?>
                        </div>
                    </div>
                </li>
			<?php endwhile; ?>
        </ul>
	<?php endif; ?>
</section>