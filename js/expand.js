jQuery(document).ready(function ($) {

    $('.expand').siblings('ul').children().hide();
    $('.expand').siblings('ul').children(':nth-of-type(1),:nth-of-type(2),:nth-of-type(3),:nth-of-type(4)').show();

    $('.expand').on('click', expandnearest);

    function expandnearest(event) {
        event.preventDefault();

        $(this).siblings('ul').addClass('showall');
        $(this).hide();

    }

});