<script>
    // Layouts-setting
    $(document).ready(function(){
        $("#layouts_parent_moduel").show();
        $("#layouts_parent_moduel2").hide();
        $(document).on('click','.parent_layoutsModuel',function(){

            $("#layouts_parent_moduel").toggle();
            $("#layouts_parent_moduel2").toggle();
        });
    });
</script>