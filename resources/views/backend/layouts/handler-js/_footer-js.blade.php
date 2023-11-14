<script>
    $(document).ready(function() {
        $("#setting").hide();
        $("#component").hide();
        $("#menu").hide();
        $("#accounts").hide();
        $("#stock").hide();
        $("#report").hide();
        $("#page").hide();
        $("#hrm_depart").hide();
        $("#purchases").hide();
        $("#inventory").hide();
        $("#sales").hide();
        $("#customer").hide();

        $(document).on('click', '#sidebarToggle', function() {
            $("#admin_footer").toggleClass('bg-success');
            $("#admin_footer").toggleClass('.sb-sidenav-lime');

            $("#setting").toggle();
            $("#component").toggle();
            $("#menu").toggle();
            $("#accounts").toggle();
            $("#stock").toggle();
            $("#report").toggle();
            $("#page").toggle();
            $("#hrm_depart").toggle();
            $("#purchases").toggle();
            $("#inventory").toggle();
            $("#sales").toggle();
            $("#customer").toggle();
        });


    });

</script>