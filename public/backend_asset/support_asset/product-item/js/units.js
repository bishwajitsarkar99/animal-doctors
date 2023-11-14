(function($){
    // Units
    $("#units_name").on('keyup', () =>{
        $('.units-icon').removeClass('units-hidden');
        $(this).attr('disabled', true);

        setTimeout(() => {
            $('.units-icon').addClass('units-hidden');
            $(this).attr('disabled', false);
        }, 3000);
    });
})(jQuery);