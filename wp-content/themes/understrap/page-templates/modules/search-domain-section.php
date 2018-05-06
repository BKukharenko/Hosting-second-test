<?php
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="search-domain-section py-5">
    <div class="<?php echo esc_attr( $container ); ?>">
        <div class="row">
            <div class="search-domain-form-description col-md-3 col-lg-2 d-flex flex-column">
				<?php if ( get_sub_field( 'icon' ) ) { ?>
					<?= get_sub_field( 'icon' ); ?>
				<?php } ?>
				<?php if ( get_sub_field( 'label_above_heading' ) ) { ?>
                    <span class="search-domain-label-above-heading text-uppercase">
		                <?= get_sub_field( 'label_above_heading' ); ?>
                    </span>
				<?php } ?>
				<?php if ( get_sub_field( 'heading' ) ) { ?>
                    <h1 class="search-domain-heading text-uppercase">
						<?= get_sub_field( 'heading' ); ?>
                    </h1>
				<?php } ?>
            </div>
            <div class="search-domain-form-wrapper col-md-9 col-lg-10">
                <form action="#" name="search-domain-form" class="search-domain-form mt-3">
                    <input class="domain-input" type="text" placeholder="Enter your domain here">
                    <select class="year-select">
                        <option>Year (0-1 year)</option>
                        <option>Year (2-3 year)</option>
                        <option>Year (4-5 year)</option>
                        <option>Year (6-7 year)</option>
                    </select>
                    <select class="domain-select">
                        <option>.com</option>
                        <option>.org</option>
                        <option>.eu</option>
                        <option>.eu</option>
                    </select>
                    <input class="search-domain-btn site-btn" type="button" value="Search">
                </form>
            </div>
        </div>
    </div>
</div>