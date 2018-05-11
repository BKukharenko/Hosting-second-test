<?php
get_header();
?>

<div class="wrapper pt-0 front-page" id="single-wrapper">

        <?php
        while (have_rows('home_modules')) : the_row();
        switch (get_row_layout()) {
	        case 'slider_section' :
		        get_template_part('page-templates/modules/slider-section');
		        break;
            case 'search_domain_section' :
                get_template_part('page-templates/modules/search-domain-section');
                break;
	        case 'our_benefits_section' :
		        get_template_part('page-templates/modules/our-benefits-section');
		        break;
	        case 'hot_and_features_section' :
		        get_template_part('page-templates/modules/hot-and-features-section');
		        break;
	        case 'our_hosting_section' :
		        get_template_part('page-templates/modules/our-hosting-section');
		        break;
            default:
                break;
        }
        endwhile;
        ?>

</div><!-- Wrapper end -->


<?php
get_footer();
?>

