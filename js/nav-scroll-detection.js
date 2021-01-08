jQuery(document).ready(function ($) {

    // Elements
    var header = $('.site-header');

    function setHeaderClasses() {

        if (scroll >= 50) {
            header.removeClass('header-at-top').addClass('header-scrolled');
        } else {
            header.removeClass('header-scrolled').addClass('header-at-top');
        }
    }

    // Do everything on our events
    $(window).on("load resize scroll", function () {

        // windowWidth = $(window).width();
        scroll = $(window).scrollTop();

        setHeaderClasses();
    });

});