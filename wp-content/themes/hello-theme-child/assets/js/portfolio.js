$(document).ready(function ($) {
    // display first section by default
    $('.checkout-accordion .accordion-section:first-child').addClass('active')
        .find('.accordion-content').show();

    $('.accordion-header').on('click', function () {
        var $section = $(this).parent();

        if (!$section.hasClass('active')) {
            $('.accordion-section').removeClass('active')
                .find('.accordion-content').slideUp(300);

            $section.addClass('active')
                .find('.accordion-content').slideDown(300);

            // Scroll to section
            $('html, body').animate({
                scrollTop: $section.offset().top - 100
            }, 500);
        }
    });
});