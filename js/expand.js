jQuery(document).ready(function ($) {

    // $('.expand').siblings('ul').children().hide();

    $('.expand').on('click', expandnearest);

    function expandnearest(event) {
        event.preventDefault();

        $(this).siblings('ul').addClass('showall');
        $(this).hide();

    }

});