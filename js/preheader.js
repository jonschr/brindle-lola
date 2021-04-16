jQuery(document).ready(function ($) {

    var preheader = $('.preheader');
    var body = $('body');

    function showPreheader() {
        var height = preheader.outerHeight();

        preheader.addClass('active');
        body.css('padding-top', height + 'px');

    }

    $(window).on('load resize', showPreheader);

});