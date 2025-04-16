jQuery(document).ready(function($) {
    $('.next-step').on('click', function() {
        $(this).closest('.wse-step').hide().next().show();
    });
    $('.prev-step').on('click', function() {
        $(this).closest('.wse-step').hide().prev().show();
    });
});
