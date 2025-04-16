jQuery(document).ready(function($) {
    $('.next-step').on('click', function() {
        $(this).closest('.wse-step').hide().next().show();
    });
    $('.prev-step').on('click', function() {
        $(this).closest('.wse-step').hide().prev().show();
    });
});
jQuery(document).ready(function($) {
    $('.wse-step').hide(); // Hide all steps initially
    $('.wse-step').first().show(); // Show the first step
});
