<script>
    $(document).ready(function(){
        // Email Setting for Verification Login page
        $("#login_enable4g").hide();
        $("#login_disable4g").show();
        $("#email_mode").on('click',function(){
            if ($("#email_mode:checked").length > 0) {
                $(".email_moduel").removeAttr('disabled');
            } else {
                $(".email_moduel").attr('disabled', true);
            }
            $("#login_enable4g").toggle();
            $("#login_disable4g").toggle();

            $("#email_light_focus").toggleClass('sidebar-focus');
            $("#email_light_focus").toggleClass('sidebar-light-focus');
        });

        // Super Admin Login URL setup
        var URL = "{{ route('superadmin.login') }}";
        $('.linkSuperAdminLoginPage').attr('value', URL);
        // Admin Login URL setup
        var URL = "{{ route('admin.login') }}";
        $('.linkAdminLoginPage').attr('value', URL);
        // Accounts Login URL setup
        var URL = "{{ route('accounts.login') }}";
        $('.linkAccountsLoginPage').attr('value', URL);
        // Common User Login URL setup
        var URL = "{{ route('user.login') }}";
        $('.linkCommonUserLoginPage').attr('value', URL);
    });
</script>