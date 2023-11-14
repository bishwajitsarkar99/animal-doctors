<script>
    // Components Setting
    $(document).ready(function(){
        $("#components_parent_moduel1").show();
        $("#components_parent_moduel2").hide();
        $(document).on('click','.parent_componentsModuel',function(){
            $("#components_parent_moduel1").toggle();
            $("#components_parent_moduel2").toggle();
        });
    });
</script>