<?php
$container = get_theme_mod( 'understrap_container_type' );
?>

<section class="our-benefits-section py-5">
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

		<?php if ( have_rows( 'benefits' ) ): ?>

            <ul class="benefits row pl-0">

				<?php while ( have_rows( 'benefits' ) ): the_row();
					?>

                    <li class="benefit col-md-6 col-lg-4 mb-5">
                        <div class="row">
                            <div class="benefit-icon col-3">
								<?php if ( get_sub_field( 'benefit_icon' ) ) { ?>
									<?= get_sub_field( 'benefit_icon' ); ?>
								<?php } ?>
                            </div>
                            <div class="benefit-description col-9">
								<?php if ( get_sub_field( 'benefit_label' ) ) { ?>
                                    <h3 class="benefit-label">
										<?= get_sub_field( 'benefit_label' ); ?>
                                    </h3>
								<?php } ?>
	                            <?php if ( get_sub_field( 'benefit_description' ) ) { ?>
                                    <p class="benefit-description">
			                            <?= get_sub_field( 'benefit_description' ); ?>
                                    </p>
	                            <?php } ?>
                            </div>
                        </div>
                    </li>

				<?php endwhile; ?>

            </ul>

		<?php endif; ?>
    </div>
</section>