//* Please note that you should set the offset for each site (height of the fixed header)

//* Scolling internal to one page
jQuery(document).ready(function ($) {
    $(function () {
        $('a[href*="#"]:not([href="#"])').click(function () {
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

                scrollto = target.offset().top - 120;
                console.log('Internal scroll: ' + scrollto);

                if (target.length) {
                    $('html, body').animate({
                        scrollTop: scrollto
                    }, 1000);
                    return false;
                }
            }
        });
    });
});

//* Scrolling when clicking on a link on another page
jQuery(document).ready(function ($) {

    //* Make sure that there's actually a hash (the thing after # in the link).
    //* If not, then we're done here.
    if (window.location.hash != '') {

        scrollto = $(window.location.hash).offset().top - 120;
        console.log('External: ' + scrollto);

        //* Do the actual animation
        $('html,body').animate({
            scrollTop: scrollto
        }, 1000, 'swing');
    }

});