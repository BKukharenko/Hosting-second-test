<?php
get_header();
$container = get_theme_mod( 'understrap_container_type' ); ?>

<div class="page-banner-wrapper"
     style="background: url(<?= get_theme_mod( 'blog_page_banner_bg' ) ?>) no-repeat; background-size: cover">
    <div class="<?php echo esc_attr( $container ); ?>">
        <div class="banner-content">
			<?php if ( get_theme_mod( 'blog_page_banner_header' ) ) { ?>
                <h1 class="banner-header text-uppercase mb-0">
					<?= get_theme_mod( 'blog_page_banner_header' ); ?>
                </h1>
			<?php } ?>
			<?php if ( get_theme_mod( 'blog_page_banner_sub_header' ) ) { ?>
                <span class="banner-sub-header text-uppercase">
			        <?= get_theme_mod( 'blog_page_banner_sub_header' ); ?>
                </span>
			<?php } ?>
        </div>
    </div>
</div>

<div class="page-content my-5">
    <div class="<?php echo esc_attr( $container ); ?>">
        <div class="blog-heading">
			<?php if ( get_theme_mod( 'label_above_blog_header' ) ) { ?>
                <span class="text-above-section-header text-uppercase">
			    <?= get_theme_mod( 'label_above_blog_header' ); ?>
            </span>
			<?php } ?>

			<?php if ( get_theme_mod( 'blog_header' ) ) { ?>
                <h2 class="section-header text-uppercase mb-5">
					<?= get_theme_mod( 'blog_header' ); ?>
                </h2>
			<?php } ?>
        </div>
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post(); ?>
                <article class="post mb-5">
					<?php if ( has_post_thumbnail() ) { ?>
                        <a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail(); ?>
                        </a>
					<?php } ?>
					<?php if ( ! empty( $post->post_title ) ) { ?>
                        <a href="<?php the_permalink(); ?>">
                            <h1 class="post-heading text-uppercase mt-4">
								<?php the_title(); ?>
                            </h1>
                        </a>
					<?php } ?>
                    <div class="post-information">
						<?php if ( get_theme_mod( 'posted_by_label_blog' ) ) { ?>
                            <span class="author-label">
			                    <?= get_theme_mod( 'posted_by_label_blog' ); ?>
                            </span>
                            <a class="post-author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ),
								get_the_author_meta( 'user_nicename' ) ); ?>"><?= get_the_author_meta( 'first_name' ); ?></a>
						<?php } ?>
						<?php if ( get_theme_mod( 'date_label_blog' ) ) { ?>
                            <span class="date-label">
			                    <?= get_theme_mod( 'date_label_blog' ); ?>
                            </span>
                            <time class="post-date" datetime="<?= get_the_date( 'Y-m-d' ); ?>">
								<?= get_the_date( 'm-d-Y' ); ?>
                            </time>
						<?php } ?>
                    </div>
                    <div class="excerpt mt-4">
						<?php the_excerpt(); ?>
                    </div>

                    <div class="post-comments-share mt-5 row no-gutters">
                        <div class="post-comments my-auto">
							<?php comments_number( '<span class="comments-number">0</span> <span class="comments-label">Comments</span>',
								'<span class="comments-number">1</span> <span class="comments-label">Comment</span>',
								'<span class="comments-number">%</span> <span class="comments-label">Comments</span>' ); ?>
                        </div>
                        <div class="like pl-3">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                            <span class="like-label"><?= __( 'Like', 'understrap' ) ?></span>
                        </div>
                        <div class="share pl-sm-3">
                            <i class="fa fa-share-alt" aria-hidden="true"></i>
                            <span class="share-label"><?= __( 'Share:', 'understrap' ) ?></span>
							<?= do_shortcode( '[addtoany buttons="facebook,twitter,linkedin,google_plus"]' ) ?>
                        </div>
                    </div>
                </article>
				<?php
			} // end while
			?>
            <div class="pagination row ml-3 ml-sm-0">
				<?php custom_pagination(); ?>
            </div>
			<?php
		} // end if
		?>
    </div>
</div>
<?php
get_footer();
?>
