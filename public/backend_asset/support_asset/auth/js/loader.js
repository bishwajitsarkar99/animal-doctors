(function($){
    // Login page src-loader input field----------
    // Check and set the border style for email input on page load
    var emailErrorMessage = $(".show-error").text().trim();
    $(".show-error").attr("data-error", emailErrorMessage);

    if (emailErrorMessage !== '') {
        $(".email_src").removeClass('show-current-border').addClass('show-error-border');
    } else {
        var emailVal = $(".email_src").val().trim();
        if (emailVal !== '') {
            $(".email_src").removeClass('show-current-border').addClass('show-success-border');
            $(".src_email").removeClass('src_email-hidden');
        } else {
            $(".email_src").addClass('show-current-border').removeClass('show-error-border');
        }
    }

    // Check and set the border style for password input on page load
    var passwordErrorMessage = $(".show-error2").text().trim();
    $(".show-error2").attr("data-error", passwordErrorMessage);

    if (passwordErrorMessage !== '') {
        $(".password_src").removeClass('show-current-border').addClass('show-error-border');
    } else {
        var passwordVal = $(".password_src").val().trim();
        if (passwordVal !== '') {
            $(".password_src").removeClass('show-current-border').addClass('show-success-border');
            $(".src_password").removeClass('src_password-hidden');
        } else {
            $(".password_src").addClass('show-current-border').removeClass('show-error-border');
        }
    }

    // Handle input changes for email
    $(document).on('keyup', '.email_src', function() {
        var inputVal = $(this).val();
        $(".remove-error-one").text('');
        $(".email_src").removeClass('show-error-border');

        if (inputVal !== '') {
            $(this).removeClass('show-current-border').addClass('show-success-border');
            $(".src_email").removeClass('src_email-hidden');
        } else {
            $(this).addClass('show-current-border').removeClass('show-success-border');
            $(".src_email").addClass('src_email-hidden');
        }
    });

    // Handle input changes for password
    $(document).on('keyup', '.password_src', function() {
        var inputVal = $(this).val();
        $(".remove-error-two").text('');
        $(".password_src").removeClass('show-error-border');

        if (inputVal !== '') {
            $(this).removeClass('show-current-border').addClass('show-success-border');
            $(".src_password").removeClass('src_password-hidden');
        } else {
            $(this).addClass('show-current-border').removeClass('show-success-border');
            $(".src_password").addClass('src_password-hidden');
        }
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