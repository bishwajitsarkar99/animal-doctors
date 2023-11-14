<script>
    $(document).ready(function(){
        // Navbar Setting
        $("#login_enable4n").hide();
        $("#login_disable4n").show();
        $("#navbar_mode").on('click',function(){
            if ($("#navbar_mode:checked").length > 0) {
                $(".purchases_moduel").removeAttr('disabled');
            } else {
                $(".purchases_moduel").attr('disabled', true);
            }
            $("#login_enable4n").toggle();
            $("#login_disable4n").toggle();

            $("#light_focusnavbar").toggleClass('sidebar-focus');
            $("#light_focusnavbar").toggleClass('sidebar-light-focus');
            $("#light_focusnavbar2").toggleClass('sidebar-focus');
            $("#light_focusnavbar2").toggleClass('sidebar-light-focus');
            $("#light_focusnavbar3").toggleClass('sidebar-focus');
            $("#light_focusnavbar3").toggleClass('sidebar-light-focus');
            $("#light_focusnavbar4").toggleClass('sidebar-focus');
            $("#light_focusnavbar4").toggleClass('sidebar-light-focus');
        });
        // Navbar Moduel
        $("#parent_navbarModuel").show();
        $("#parent_navbarModuel2").hide();
        $(".navbarChild2").hide();
        $(".navbarChild3").hide();
        $(".navbarChild5").hide();
        $(".parent_navbarModuel").on('click',function(){
            $("#parent_navbarModuel").toggle();
            $("#parent_navbarModuel2").toggle();
            $(".navbarChild2").toggle();
            $(".navbarChild3").toggle();
            $(".navbarChild5").toggle();
        });
    });
</script>