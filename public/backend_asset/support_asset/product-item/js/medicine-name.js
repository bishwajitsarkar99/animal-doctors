(function($){
    // Medicine Name
    $("#medicine_name").on('keyup', () =>{
        $('.medicine-icon').removeClass('medicine-hidden');
        $(this).attr('disabled', true);

        setTimeout(() => {
            $('.medicine-icon').addClass('medicine-hidden');
            $(this).attr('disabled', false);
        }, 3000);
    });
    $("#group_id").on('keyup', () =>{
        $('.medicineid-icon').removeClass('medicineid-hidden');
        $(this).attr('disabled', true);

        setTimeout(() => {
            $('.medicineid-icon').addClass('medicineid-hidden');
            $(this).attr('disabled', false);
        }, 3000);
    });
})(jQuery);