(function($){
    // sub-Category
    $("#sub_category_name").on('keyup', () =>{
        $('.subcategory-icon').removeClass('subcategory-hidden');
        $(this).attr('disabled', true);

        setTimeout(() => {
            $('.subcategory-icon').addClass('subcategory-hidden');
            $(this).attr('disabled', false);
        }, 3000);
    });
    $("#category_id").on('keyup', () =>{
        $('.subcategoryid-icon').removeClass('subcategoryid-hidden');
        $(this).attr('disabled', true);

        setTimeout(() => {
            $('.subcategoryid-icon').addClass('subcategoryid-hidden');
            $(this).attr('disabled', false);
        }, 3000);
    });
})(jQuery);
