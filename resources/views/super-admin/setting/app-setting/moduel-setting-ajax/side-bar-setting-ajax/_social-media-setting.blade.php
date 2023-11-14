<script>
    $(document).ready(function(){
        $("#login_disable_social").show();
        $("#login_enable_social").hide();
        $(document).on('click', '#media_mode',function(){
            if ($("#media_mode:checked").length > 0) {
                $(".social_media_value").removeAttr('disabled');
            } else {
                $(".social_media_value").attr('disabled', true);
            }
            $("#light_focus_social").toggleClass('light2-focus');
            $("#light_focus_social").addClass('light4-focus');
            $("#light_focus_social2").toggleClass('light2-focus');
            $("#light_focus_social2").addClass('light4-focus');
            $("#light_focus_social3").toggleClass('light2-focus');
            $("#light_focus_social3").addClass('light4-focus');
            $("#light_focus_social4").toggleClass('light2-focus');
            $("#light_focus_social4").addClass('light4-focus');
            $("#light_focus_social5").toggleClass('light2-focus');
            $("#light_focus_social5").addClass('light4-focus');
            $("#light_focus_social6").toggleClass('light2-focus');
            $("#light_focus_social6").addClass('light4-focus');
            $("#light_focus_social7").toggleClass('light2-focus');
            $("#light_focus_social7").addClass('light4-focus');
            $("#light_focus_social8").toggleClass('light2-focus');
            $("#light_focus_social8").addClass('light4-focus');

            $("#login_disable_social").toggle();
            $("#login_enable_social").toggle();
        });
    });
</script>
