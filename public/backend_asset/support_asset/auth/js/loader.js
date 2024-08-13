(function($){
    // Login page src-loader input field----------
    $(".email_src").on('keyup', () =>{
        $('.src_email').removeClass('src_email-hidden');
        $(this).attr('disabled', true);

        setTimeout(() => {
            $('.src_email').addClass('src_email-hidden');
            $(this).attr('disabled', false);
        }, 3000);
    });
    $(".password_src").on('keyup', () =>{
        $('.src_password').removeClass('src_password-hidden');
        $(this).attr('disabled', true);

        setTimeout(() => {
            $('.src_password').addClass('src_password-hidden');
            $(this).attr('disabled', false);
        }, 3000);
    });
    // success message------
    $(document).on('click', '.register_btn', function(){
        $('#success_message').fadeIn();
        setTimeout(() => {
            $('#success_message').fadeOut();
        }, 3000);
    });

    // name field---------
    $(".filed_src").on('keyup', () =>{
        $('.search-icon').removeClass('search-hidden');
        $(this).attr('disabled', true);
    
        setTimeout(() =>{
            $('.search-icon').addClass('search-hidden');
            $(this).attr('disabled', false);  
        },3000);
    });

    // contract field---------
    $(".contract").on('keyup', () =>{
        $('.contract-icon').removeClass('contract-hidden');
        $(this).attr('disabled', true);
    
        setTimeout(() =>{
            $('.contract-icon').addClass('contract-hidden');
            $(this).attr('disabled', false);  
        },3000);
    });

    // email field---------
    $(".reg_email").on('keyup', () =>{
        $('.email-icon').removeClass('email-hidden');
        $(this).attr('disabled', true);
    
        setTimeout(() =>{
            $('.email-icon').addClass('email-hidden');
            $(this).attr('disabled', false);  
        },3000);
    });

    // password field---------
    $(".password").on('keyup', () =>{
        $('.password-icon').removeClass('password-hidden');
        $(this).attr('disabled', true);
    
        setTimeout(() =>{
            $('.password-icon').addClass('password-hidden');
            $(this).attr('disabled', false);  
        },3000);
    });
    // password field---------
    $(".confirm").on('keyup', () =>{
        $('.confrim-password-icon').removeClass('confrim-password-hidden');
        $(this).attr('disabled', true);
    
        setTimeout(() =>{
            $('.confrim-password-icon').addClass('confrim-password-hidden');
            $(this).attr('disabled', false);  
        },3000);
    });
    // Register Button---------
    $("#reg_submit").on('click', () =>{
        $('.register-icon').removeClass('register-hidden');
        $(this).attr('disabled', true);
        $('.btn-text').text('Register...');

        setTimeout(() =>{
            $('.register-icon').addClass('register-hidden');
            $(this).attr('disabled', false);
            $('.btn-text').text('Register');
        }, 3000);
    });
    
    // Login Button---------
    $("#submit").on('click', () =>{
        $('.loading-icon').removeClass('hidden');
        $(this).attr('disabled', true);
        $('.btn-text').text('Login...');

        setTimeout(() =>{
            $('.loading-icon').addClass('hidden');
            $(this).attr('disabled', false);
            $('.btn-text').text('Login');
        }, 6000);
    });
})(jQuery);