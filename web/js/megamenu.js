$(document).ready(function() {
    $('.dropdown-toggle').click(function() {
        $(this).css('z-index', '1001');
        $(this).parent().css('display', 'flex');
        $('.dropdown-menu').toggle();
    });
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.megamenu').length) $('.dropdown-menu').hide();
        e.stopPropagation();
    });
});