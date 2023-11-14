<!-- =========== Footer-menu-js ============== -->
<script>
    $(document).ready(function(){
        $("#product_lock").show();
        $("#product_unlock").hide();

        $("#stock_unlock").hide();
        $("#stock_lock").show();

        $("#leger_unlock").hide();
        $("#leger_lock").show();

        $("#sale_unlock").hide();
        $("#sale_lock").show();


        $("#vouch_unlock").hide();
        $("#vouch_lock").show();

        $("#asst_unlock").hide();
        $("#asst_lock").show();

        $("#reprt_unlock").hide();
        $("#reprt_lock").show();

        $("#hm_unlock").hide();
        $("#hm_lock").show();

        $("#ath_unlock").hide();
        $("#ath_lock").show();

        $("#compo_unlock").hide();
        $("#compo_lock").show();

        $(document).on('click', '#Menubar', function(){
            $("#footerMenubar").modal('show');
        });

        // Product Menu
        $(document).on('click', '#prodct', function(){
            $("#product_unlock").toggle();
            $("#product_lock").toggle();
            $("#navbarDropdown").addClass('a nav-link_cgrMenu dropdown-toggle ty');
        });

        // Stock Menu
        $(document).on('click', '#stockMenu', function(){
            $("#stock_unlock").toggle();
            $("#stock_lock").toggle();
        });

        // Leger Menu
        $(document).on('click', '#legerMenu', function(){
            $("#leger_unlock").toggle();
            $("#leger_lock").toggle();
        });

        // Sales Menu
        $(document).on('click', '#salesMenu', function(){
            $("#sale_unlock").toggle();
            $("#sale_lock").toggle();
        });

        // Voucher Menu
        $(document).on('click', '#vouchersMenu', function(){
            $("#vouch_unlock").toggle();
            $("#vouch_lock").toggle();
        });

        // Asset Menu
        $(document).on('click', '#assetMenu', function(){
            $("#asst_unlock").toggle();
            $("#asst_lock").toggle();
        });

        // Report Menu
        $(document).on('click', '#reportMenu', function(){
            $("#reprt_unlock").toggle();
            $("#reprt_lock").toggle();
        });

        // HRM Menu
        $(document).on('click', '#hrmMenu', function(){
            $("#hm_unlock").toggle();
            $("#hm_lock").toggle();
        });

        // AUTH Menu
        $(document).on('click', '#authMenu', function(){
            $("#ath_unlock").toggle();
            $("#ath_lock").toggle();
        });

        // Components Menu
        $(document).on('click', '#componentsMenu', function(){
            $("#compo_unlock").toggle();
            $("#compo_lock").toggle();
        });
    });
</script>
