<?php
/**
 * Template Name: FAQ Page Template
 *
 * Template for displaying a FAQ page.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="page-banner-wrapper"
     style="background: url(<?= get_theme_mod( 'faq_page_banner_bg' ) ?>) no-repeat; background-size: cover">
    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
        <div class="banner-content">
			<?php if ( get_theme_mod( 'faq_page_banner_header' ) ) { ?>
                <h1 class="banner-header text-uppercase mb-0">
					<?= get_theme_mod( 'faq_page_banner_header' ); ?>
                </h1>
			<?php } ?>
			<?php if ( get_theme_mod( 'faq_page_banner_sub_header' ) ) { ?>
                <span class="banner-sub-header text-uppercase">
			        <?= get_theme_mod( 'faq_page_banner_sub_header' ); ?>
                </span>
			<?php } ?>
        </div>
    </div>
</div>

<div class="page-content text-center my-5">
    <div class="<?php echo esc_attr( $container ); ?>">
        <div class="blog-heading text-left">
			<?php if ( get_theme_mod( 'label_above_faq_page_header' ) ) { ?>
                <span class="text-above-section-header text-uppercase">
			    <?= get_theme_mod( 'label_above_faq_page_header' ); ?>
            </span>
			<?php } ?>

			<?php if ( get_theme_mod( 'faq_page_header' ) ) { ?>
                <h2 class="section-header text-uppercase mb-5">
					<?= get_theme_mod( 'faq_page_header' ); ?>
                </h2>
			<?php } ?>
        </div>

	    <?php if ( have_rows( 'questions' ) ): ?>

            <ul class="questions text-left row pl-0 mb-5">

			    <?php while ( have_rows( 'questions' ) ): the_row();
				    ?>

                    <li class="question-item col-md-6 mb-5">
                        <div class="row">
                            <div class="question-letter-wrapper col-lg-2">
							    <?php if ( get_sub_field( 'question_letter' ) ) { ?>
                                    <span class="question-letter">
                                        <?= get_sub_field( 'question_letter' ); ?>
                                    </span>
							    <?php } ?>
                            </div>
                            <div class="question-wrapper mt-4 mt-lg-0 col-lg-10">
							    <?php if ( get_sub_field( 'question_heading' ) ) { ?>
                                    <h3 class="question text-uppercase mb-3">
									    <?= get_sub_field( 'question_heading' ); ?>
                                    </h3>
							    <?php } ?>
							    <?php if ( get_sub_field( 'question_answer' ) ) { ?>
                                    <div class="answer">
									    <?= get_sub_field( 'question_answer' ); ?>
                                    </div>
							    <?php } ?>
                            </div>
                        </div>
                    </li>

			    <?php endwhile; ?>
            </ul>
	    <?php endif; ?>

	    <?php if ( get_theme_mod( 'faq_btn_text' ) ) { ?>
            <a href="#" class="site-btn faq-page-btn">
			    <?= get_theme_mod( 'faq_btn_text' ); ?>
            </a>
	    <?php } ?>

        <div class="faq-question-form-wrapper">
            <div class="blog-heading text-left">
		        <?php if ( get_theme_mod( 'label_above_faq_page_form_header' ) ) { ?>
                    <span class="text-above-section-header text-uppercase">
			    <?= get_theme_mod( 'label_above_faq_page_form_header' ); ?>
            </span>
		        <?php } ?>

		        <?php if ( get_theme_mod( 'faq_page_form_header' ) ) { ?>
                    <h2 class="section-header text-uppercase mb-5">
				        <?= get_theme_mod( 'faq_page_form_header' ); ?>
                    </h2>
		        <?php } ?>
            </div>

            <form action="#" name="faq-question-form" class="faq-question-form text-left">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control required" id="name" name="name" placeholder="Name*" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" class="form-control required" id="email" name="email" placeholder="Email*" required>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control required" id="subject" name="subject" placeholder="Subject*" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control required" id="questions" name="questions" placeholder="Ask your questions here*"
                    rows="8" required></textarea>
                </div>
                <button type="submit" class="btn site-btn questions-form-btn">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php get_footer(); ?>

