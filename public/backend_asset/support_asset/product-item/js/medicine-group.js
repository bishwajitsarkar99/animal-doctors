(function($){
    // Medicine Group
    $("#group_name").on('keyup', () =>{
        $('.group-icon').removeClass('group-hidden');
        $(this).attr('disabled', true);

        setTimeout(() => {
            $('.group-icon').addClass('group-hidden');
            $(this).attr('disabled', false);
        }, 3000);
    });
})(jQuery);