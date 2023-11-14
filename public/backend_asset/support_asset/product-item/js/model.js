(function($){
    // Model
    $("#model_name").on('keyup', () =>{
        $('.model-icon').removeClass('model-hidden');
        $(this).attr('disabled', true);

        setTimeout(() => {
            $('.model-icon').addClass('model-hidden');
            $(this).attr('disabled', false);
        }, 3000);
    });
    $("#product_id").on('keyup', () =>{
        $('.productid-icon').removeClass('productid-hidden');
        $(this).attr('disabled', true);

        setTimeout(() => {
            $('.productid-icon').addClass('productid-hidden');
            $(this).attr('disabled', false);
        }, 3000);
    });
})(jQuery);