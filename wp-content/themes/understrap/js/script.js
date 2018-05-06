jQuery(document).ready(function ($) {
    //First section slider
    if($('div').is('.front-page')){
        $('.main-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            arrows: true,
            dotsClass: "my-dots",
        });
    }

    //Like button on posts
    $('.like').click(function () {
        if ($(this).find('i').hasClass('fa-heart')) {
            $(this).find('i').replaceWith('<i class="fa fa-heart-o" aria-hidden="true"></i>\n');
        } else {
            $(this).find('i').replaceWith('<i class="fa fa-heart" aria-hidden="true"></i>\n');
        }
    });
});