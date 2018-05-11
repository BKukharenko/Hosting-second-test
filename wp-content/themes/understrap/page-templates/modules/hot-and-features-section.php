<?php
$container = get_theme_mod( 'understrap_container_type' );
?>

<section class="hot-and-features-section">
    <div class="<?php echo esc_attr( $container ); ?>">
        <div class="row">
            <div class="col-lg-5 what-is-hot-wrapper d-flex flex-column mb-5 mb-lg-0">
				<?php if ( get_sub_field( 'label_above_discount_header' ) ) { ?>
                    <span class="text-above-section-header text-uppercase">
			    <?= get_sub_field( 'label_above_discount_header' ); ?>
            </span>
				<?php } ?>

				<?php if ( get_sub_field( 'discount_header' ) ) { ?>
                    <h1 class="section-header text-uppercase mb-5">
						<?= get_sub_field( 'discount_header' ); ?>
                    </h1>
				<?php } ?>

                <div class="discount-outer-wrapper">
                    <div class="discount-inner-wrapper">
						<?php if ( get_sub_field( 'label_above_percents' ) ) { ?>
                            <span class="label-above-percents text-uppercase">
			                     <?= get_sub_field( 'label_above_percents' ); ?>
                            </span>
						<?php } ?>
						<?php if ( get_sub_field( 'discount_percents' ) && get_sub_field( 'off_label' ) ) { ?>
                            <div class="row discount-percents-wrapper">
                                <h2 class="text-uppercase discount-percents">
                                <span class="percents">
			                        <?= get_sub_field( 'discount_percents' ); ?>
                                </span>
									<?= get_sub_field( 'off_label' ); ?>
                                </h2>
                                <div class="d-flex flex-column discount-description my-auto">
	                                <?php if ( get_sub_field( 'discount_description_label' ) ) { ?>
                                        <span class="discount_description_label text-uppercase">
			                                <?= get_sub_field( 'discount_description_label' ); ?>
                                        </span>
	                                <?php } ?>
	                                <?php if ( get_sub_field( 'discount_of_what' ) ) { ?>
                                        <h3 class="text-uppercase">
			                                <?= get_sub_field( 'discount_of_what' ); ?>
                                        </h3>
	                                <?php } ?>
                                </div>
                            </div>
						<?php } ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 features-wrapper">
				<?php if ( get_sub_field( 'label_above_features_header' ) ) { ?>
                    <span class="text-above-section-header text-uppercase">
			    <?= get_sub_field( 'label_above_features_header' ); ?>
            </span>
				<?php } ?>

				<?php if ( get_sub_field( 'features_header' ) ) { ?>
                    <h1 class="section-header text-uppercase mb-5">
						<?= get_sub_field( 'features_header' ); ?>
                    </h1>
				<?php } ?>
	            <?php if ( get_sub_field( 'features' ) ) { ?>
                    <div class="features-wrapper row no-gutters">
                        <?= get_sub_field( 'features' ); ?>
	                    <?php if ( get_sub_field( 'button_text' ) ) { ?>
                            <a href="#" class="features-btn site-btn">
			                    <?= get_sub_field( 'button_text' ); ?>
                            </a>
	                    <?php } ?>
                    </div>
	            <?php } ?>
            </div>
        </div>
    </div>
</section>