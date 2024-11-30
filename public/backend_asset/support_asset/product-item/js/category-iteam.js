(function($){
    $("#update_btn").hide();
    $(document).on('click', '#search_area', () =>{
        $("#search").removeClass('display_hidden');
        $("#search").addClass('display_hidden');
        $("#search").toggle('slide');
        $("#search").focus();
    });

    $("#category_name").on('keyup', () =>{
        $('.category-icon').removeClass('category-hidden');
        $(this).attr('disabled', true);

        setTimeout(() => {
            $('.category-icon').addClass('category-hidden');
            $(this).attr('disabled', false);
        }, 3000);
    });
    $("#search").on('keyup', () =>{
        $('.catg_search-icon').removeClass('catg_search-hidden');
        $(this).attr('disabled', true);

        setTimeout(() => {
            $('.catg_search-icon').addClass('catg_search-hidden');
            $(this).attr('disabled', false);
        }, 3000);
    });
    $("#save").on('click', () =>{
        $('.add-icon').removeClass('add-hidden');
        $(this).attr('disabled', true);
        $('.add_btn-text').text('Add...');

        setTimeout(() =>{
            $('.add-icon').addClass('add-hidden');
            $(this).attr('disabled', false);
            $('.add_btn-text').text('Add');
        }, 3000);
    });
    $("#update_btn").on('click', () =>{
        $('.update-icon').removeClass('update-hidden');
        $(this).attr('disabled', true);
        $('.update-btn-text').text('Update...');

        setTimeout(() =>{
            $('.update-icon').addClass('update-hidden');
            $(this).attr('disabled', false);
            $('.update-btn-text').text('Update');
        }, 3000);
    });
    $(".delet_btn_user").on('click', () =>{
        $('.delete-icon').removeClass('delete-hidden');
        $(this).attr('disabled', true);
        $('.delete-btn-text').text('Delete...');

        setTimeout(() =>{
            $('.delete-icon').addClass('delete-hidden');
            $(this).attr('disabled', false);
            $('.delete-btn-text').text('Delete');
        }, 3000);
    });

    // sub-Category
    $("#sub_category_name").on('keyup', () =>{
        $('.subcategory-icon').removeClass('subcategory-hidden');
        $(this).attr('disabled', true);

        setTimeout(() => {
            $('.subcategory-icon').addClass('subcategory-hidden');
            $(this).attr('disabled', false);
        }, 3000);
    });
})(jQuery);
