(function($){
    // Product
    $("#product_name").on('keyup', () =>{
        $('.product-icon').removeClass('product-hidden');
        $(this).attr('disabled', true);

        setTimeout(() => {
            $('.product-icon').addClass('product-hidden');
            $(this).attr('disabled', false);
        }, 3000);
    });
})(jQuery);