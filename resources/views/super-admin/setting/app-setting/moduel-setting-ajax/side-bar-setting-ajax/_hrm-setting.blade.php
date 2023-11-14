<script>
    $(document).ready(function(){
        // HRM MANAGEMENT
        $("#hrm_parent_moduel").show();
        $("#hrm_parent_moduel2").hide();
        $(".hrmChild2").hide();
        $(document).on('click','.parent_hrmModuel',function(){
            $("#hrm_parent_moduel").toggle();
            $("#hrm_parent_moduel2").toggle();
            $(".hrmChild2").toggle();
        });
        // HRM
        $("#hrmChildren1").show();
        $("#hrmChildren2").hide();
        $(document).on('click','.hrmChild',function(){
            $("#hrmChildren1").toggle();
            $("#hrmChildren2").toggle();
        });
    });
</script>