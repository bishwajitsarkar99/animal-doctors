(function($){
    // Brand
    $("#brand_name").on('keyup', () =>{
        $('.brand-icon').removeClass('brand-hidden');
        $(this).attr('disabled', true);

        setTimeout(() => {
            $('.brand-icon').addClass('brand-hidden');
            $(this).attr('disabled', false);
        }, 3000);
    });
    $("#origin_id").on('keyup', () =>{
        $('.origin-icon').removeClass('origin-hidden');
        $(this).attr('disabled', true);

        setTimeout(() => {
            $('.origin-icon').addClass('origin-hidden');
            $(this).attr('disabled', false);
        }, 3000);
    });
})(jQuery);