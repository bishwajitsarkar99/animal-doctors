<script>
    $(document).ready(function(){
        // Footer Setting
        $("#login_enable4f").hide();
        $("#login_disable4f").show();
        $("#footer_mode").on('click',function(){
            if ($("#footer_mode:checked").length > 0) {
                $(".purchases_moduel").removeAttr('disabled');
            } else {
                $(".purchases_moduel").attr('disabled', true);
            }
            $("#login_enable4f").toggle();
            $("#login_disable4f").toggle();

            $("#light_focusfooter").toggleClass('sidebar-focus');
            $("#light_focusfooter").toggleClass('sidebar-light-focus');
        });
        // Footer Moduel
        $("#footer_parent_moduel1").show();
        $("#footer_parent_moduel2").hide();
        $(".parent_footerModuel").on('click',function(){
            $("#footer_parent_moduel1").toggle();
            $("#footer_parent_moduel2").toggle();
        });
    });
</script>