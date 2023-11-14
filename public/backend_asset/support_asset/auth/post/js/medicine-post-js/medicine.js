(function($){
    // post-title
    $("#post_title").on('keyup', () =>{
        $('.post-title-icon').removeClass('post-title-hidden');
        $(this).attr('disabled', true);

        setTimeout(() => {
            $('.post-title-icon').addClass('post-title-hidden');
            $(this).attr('disabled', false);
        }, 3000);
    });
    //category
    $("#category").on('change', () =>{
        $('.category-icon').removeClass('category-hidden');
        $(this).attr('disabled', true);

        setTimeout(() => {
            $('.category-icon').addClass('category-hidden');
            $(this).attr('disabled', false);
        }, 3000);

        $('.subcategory-icon').removeClass('subcategory-hidden');
        $(this).attr('disabled', true);

        setTimeout(() => {
            $('.subcategory-icon').addClass('subcategory-hidden');
            $(this).attr('disabled', false);
        }, 3000);
    });
    //sub-category
    $("#subCategory").on('change', () =>{
        $('.subcategory-icon').removeClass('subcategory-hidden');
        $(this).attr('disabled', true);

        setTimeout(() => {
            $('.subcategory-icon').addClass('subcategory-hidden');
            $(this).attr('disabled', false);
        }, 3000);
    });
    //Medicine-group
    $("#group").on('change', () =>{
        $('.group-icon').removeClass('group-hidden');
        $(this).attr('disabled', true);
        setTimeout(() => {
            $('.group-icon').addClass('group-hidden');
            $(this).attr('disabled', false);
        }, 3000);

        $('.medicine-name-icon').removeClass('medicine-name-hidden');
        $(this).attr('disabled', true);
        setTimeout(() => {
            $('.medicine-name-icon').addClass('medicine-name-hidden');
            $(this).attr('disabled', false);
        }, 3000);
    });
    //Medicine-name
    $("#medicine_name").on('change', () =>{
        $('.group-icon').removeClass('group-hidden');
        $(this).attr('disabled', true);
        setTimeout(() => {
            $('.group-icon').addClass('group-hidden');
            $(this).attr('disabled', false);
        }, 3000);

        $('.medicine-dogs-icon').removeClass('medicine-dogs-hidden');
        $(this).attr('disabled', true);
        setTimeout(() => {
            $('.medicine-dogs-icon').addClass('medicine-dogs-hidden');
            $(this).attr('disabled', false);
        }, 3000);
    });
    //Medicine-dogs
    $("#medicine_dogs").on('change', () =>{
        $('.medicine-dogs-icon').removeClass('medicine-dogs-hidden');
        $(this).attr('disabled', true);
        setTimeout(() => {
            $('.medicine-dogs-icon').addClass('medicine-dogs-hidden');
            $(this).attr('disabled', false);
        }, 3000);
    });
    //Medicine-origin
    $("#origin_name").on('change', () =>{
        $('.origin-icon').removeClass('origin-hidden');
        $(this).attr('disabled', true);
        setTimeout(() => {
            $('.origin-icon').addClass('origin-hidden');
            $(this).attr('disabled', false);
        }, 3000);
    });
    //Medicine-size
    $("#product_size").on('change', () =>{
        $('.size-icon').removeClass('size-hidden');
        $(this).attr('disabled', true);
        setTimeout(() => {
            $('.size-icon').addClass('size-hidden');
            $(this).attr('disabled', false);
        }, 3000);
    });
    //Add-post-btn
    $("#postAdd").on('click', () =>{
        $('.add-icon').removeClass('add-hidden');
        $(this).attr('disabled', true);
        setTimeout(() => {
            $('.add-icon').addClass('add-hidden');
            $(this).attr('disabled', false);
        }, 3000);
    });
    //Update-post-btn
    $("#postUpdate").on('click', () =>{
        $('update-icon').removeClass('update-hidden');
        $(this).attr('disabled', true);
        setTimeout(() => {
            $('.update-icon').addClass('update-hidden');
            $(this).attr('disabled', false);
        }, 3000);
    });
})(jQuery);