<?php
/**
 * Template Name: About Us Page Template
 *
 * Template for displaying a About Us page.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="page-banner-wrapper"
     style="background: url(<?= get_theme_mod( 'about_us_page_banner_bg' ) ?>) no-repeat; background-size: cover">
    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
        <div class="banner-content">
			<?php if ( get_theme_mod( 'about_us_page_banner_header' ) ) { ?>
                <h1 class="banner-header text-uppercase mb-0">
					<?= get_theme_mod( 'about_us_page_banner_header' ); ?>
                </h1>
			<?php } ?>
			<?php if ( get_theme_mod( 'about_us_page_banner_sub_header' ) ) { ?>
                <span class="banner-sub-header text-uppercase">
			        <?= get_theme_mod( 'about_us_page_banner_sub_header' ); ?>
                </span>
			<?php } ?>
        </div>
    </div>
</div>

<div class="page-content my-5">
    <div class="<?php echo esc_attr( $container ); ?>">
        <div class="blog-heading">
			<?php if ( get_theme_mod( 'label_above_about_us_page_header' ) ) { ?>
                <span class="text-above-section-header text-uppercase">
			    <?= get_theme_mod( 'label_above_about_us_page_header' ); ?>
            </span>
			<?php } ?>

			<?php if ( get_theme_mod( 'about_us_page_header' ) ) { ?>
                <h2 class="section-header text-uppercase mb-5">
					<?= get_theme_mod( 'about_us_page_header' ); ?>
                </h2>
			<?php } ?>
        </div>

		<?php
		if ( have_posts() ) {
			?>
            <div class="row details-wrapper">
				<?php
				while ( have_posts() ) {
					the_post(); ?>
					<?php if ( has_post_thumbnail() ) { ?>
                        <div class="image-wrapper mb-3 mb-lg-0 col-lg-6">
							<?php the_post_thumbnail( 'full' ); ?>
                        </div>
					<?php } ?>
                    <div class="details-content col-lg-6 d-flex flex-column">
						<?php the_content(); ?>
						<?php if ( get_field( 'quote_text' ) ) { ?>
                            <div class="quote mt-auto">
								<?= get_field( 'quote_text' ); ?>
                            </div>
						<?php } ?>
                    </div>
				<?php } ?>
            </div>
			<?php
		}
		?>
    </div>

	<?php
	while ( have_rows( 'about_us_modules' ) ) : the_row();
		switch ( get_row_layout() ) {
			case 'our_team_section' :
				get_template_part( 'page-templates/modules/our-team-section' );
				break;
			case 'special_offers_section' :
				get_template_part( 'page-templates/modules/special-offers-section' );
				break;
			default:
				break;
		}
	endwhile;
	?>
</div>

<?php get_footer(); ?>

