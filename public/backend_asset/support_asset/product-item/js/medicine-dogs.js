(function($){
    // Medicine Dogs
    $("#medicine_dogs").on('keyup', () =>{
        $('.medicinedogs-icon').removeClass('medicinedogs-hidden');
        $(this).attr('disabled', true);

        setTimeout(() => {
            $('.medicinedogs-icon').addClass('medicinedogs-hidden');
            $(this).attr('disabled', false);
        }, 3000);
    });
    $("#medicine_id").on('keyup', () =>{
        $('.medicineid-icon').removeClass('medicineid-hidden');
        $(this).attr('disabled', true);

        setTimeout(() => {
            $('.medicineid-icon').addClass('medicineid-hidden');
            $(this).attr('disabled', false);
        }, 3000);
    });
})(jQuery);