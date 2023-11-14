<script>
    // Authentication
    $("#auth_parent_moduel").show();
    $("#auth_parent_moduel2").hide();
    $('.authChild2').hide();
    $(document).ready(function(){
        $(document).on('click','.parent_authModuel',function(){

            $('.authChild2').toggle();
            $("#auth_parent_moduel").toggle();
            $("#auth_parent_moduel2").toggle();
        });
    });

    // Auth
    $("#authChildren1").show();
    $("#authChildren2").hide();
    $(document).ready(function(){
        $(document).on('click','',function(){

            $("#authChildren1").toggle();
            $("#authChildren2").toggle();
        });
    });
</script>