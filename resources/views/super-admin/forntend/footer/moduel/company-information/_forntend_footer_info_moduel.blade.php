<script>
    $(document).ready(function(){
        // Footer Setting
        $("#login_enable3a").hide();
        $("#login_disable3a").show();
        $("#profile_mode").on('click',function(){
            if ($("#profile_mode:checked").length > 0) {
                $(".profile_value").removeAttr('disabled');
            } else {
                $(".profile_value").attr('disabled', true);
            }
            $("#login_enable3a").toggle();
            $("#login_disable3a").toggle();

            $("#light_focus").toggleClass('light2-focus');
            $("#light_focus").toggleClass('sidebar-light-focus');
            $("#light_focus2").toggleClass('light2-focus');
            $("#light_focus2").toggleClass('sidebar-light-focus');
            $("#light_focus3").toggleClass('light2-focus');
            $("#light_focus3").toggleClass('sidebar-light-focus');
            $("#light_focus4").toggleClass('light2-focus');
            $("#light_focus4").toggleClass('sidebar-light-focus');
            $("#light_focus5").toggleClass('light2-focus');
            $("#light_focus5").toggleClass('sidebar-light-focus');
            $("#light_focus6").toggleClass('light2-focus');
            $("#light_focus6").toggleClass('sidebar-light-focus');
            $("#light_focus7").toggleClass('light2-focus');
            $("#light_focus7").toggleClass('sidebar-light-focus');
            $("#light_focus8").toggleClass('light2-focus');
            $("#light_focus8").toggleClass('sidebar-light-focus');
            $("#light_focus9").toggleClass('light2-focus');
            $("#light_focus9").toggleClass('sidebar-light-focus');
            $("#light_focus10").toggleClass('light2-focus');
            $("#light_focus10").toggleClass('sidebar-light-focus');
            $("#light_focus11").toggleClass('light2-focus');
            $("#light_focus11").toggleClass('sidebar-light-focus');
        });
    });
</script>