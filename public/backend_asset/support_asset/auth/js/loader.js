(function($){
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
    // Register Back Button---------
    $("#regist_back").on('click', () =>{
        $('.regst-icon').removeClass('register-hidden');
        $(this).attr('disabled', true);
        $('.btn-regst-text').text('Back...');

        setTimeout(() =>{
            $('.regst-icon').addClass('register-hidden');
            $(this).attr('disabled', false);
            $('.btn-regst-text').text('Back');
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
    // Login Back Button---------
    $("#back_login").on('click', () =>{
        $('.back-icon').removeClass('register-hidden');
        $(this).attr('disabled', true);
        $('.btn-back-text').text('Back...');

        setTimeout(() =>{
            $('.back-icon').addClass('register-hidden');
            $(this).attr('disabled', false);
            $('.btn-back-text').text('Back');
        }, 3000);
    });
    // Email Verification Button---------
    $("#email_submit").on('click', () =>{
        $('.verification-icon').removeClass('register-hidden');
        $(this).attr('disabled', true);
        $('.btn-email-text').text('Email Verification...');

        setTimeout(() =>{
            $('.verification-icon').addClass('register-hidden');
            $(this).attr('disabled', false);
            $('.btn-email-text').text('Email Verification');
        }, 6000);
    });
    // Reset Password Button---------
    $("#reset_password").on('click', () =>{
        $('.reset-icon').removeClass('register-hidden');
        $(this).attr('disabled', true);
        $('.btn-reset-text').text('Reset Password...');

        setTimeout(() =>{
            $('.reset-icon').addClass('register-hidden');
            $(this).attr('disabled', false);
            $('.btn-reset-text').text('Reset Password');
        }, 6000);
    });
    // Reset page Back Button---------
    $("#user__login").on('click', () =>{
        $('.acc-icon').removeClass('register-hidden');
        $(this).attr('disabled', true);
        $('.btn-acc-text').text('sign in...');

        setTimeout(() =>{
            $('.acc-icon').addClass('register-hidden');
            $(this).attr('disabled', false);
            $('.btn-acc-text').text('sign in');
        }, 3000);
    });
    // Change Password Button---------
    $("#change_Password").on('click', () =>{
        $('.change-icon').removeClass('register-hidden');
        $(this).attr('disabled', true);
        $('.btn-change-text').text('Change Password...');

        setTimeout(() =>{
            $('.change-icon').addClass('register-hidden');
            $(this).attr('disabled', false);
            $('.btn-change-text').text('Change Password');
        }, 6000);
    });
})(jQuery);