(function($){
    // Origin
    $("#units_name").on('keyup', () =>{
        $('.origin-icon').removeClass('origin-hidden');
        $(this).attr('disabled', true);

        setTimeout(() => {
            $('.origin-icon').addClass('origin-hidden');
            $(this).attr('disabled', false);
        }, 3000);
    });
})(jQuery);