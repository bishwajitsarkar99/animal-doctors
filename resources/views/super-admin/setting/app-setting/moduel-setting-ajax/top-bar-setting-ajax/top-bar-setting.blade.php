<script>
    $(document).ready(function(){
        // Topbar Setting
        $("#login_enable4t").hide();
        $("#login_disable4t").show();
        $("#topbar_mode").on('click',function(){
            if ($("#topbar_mode:checked").length > 0) {
                $(".purchases_moduel").removeAttr('disabled');
            } else {
                $(".purchases_moduel").attr('disabled', true);
            }
            $("#login_enable4t").toggle();
            $("#login_disable4t").toggle();

            $("#light_focustopbar").toggleClass('sidebar-focus');
            $("#light_focustopbar").toggleClass('sidebar-light-focus');
        });
        // Topbar Moduel
        $("#topbar_parent_moduel1").show();
        $("#topbar_parent_moduel2").hide();
        $(".parent_topbarModuel").on('click',function(){
            $("#topbar_parent_moduel1").toggle();
            $("#topbar_parent_moduel2").toggle();
        });
    });
</script>