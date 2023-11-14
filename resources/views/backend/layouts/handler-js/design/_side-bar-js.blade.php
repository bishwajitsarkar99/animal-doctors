<!--============ Side-Bar Lock in Ajax ============-->
<script>
    // Admin-Panel Light Mode
    $(document).ready(function(){
        
    });
    // Plugin Product Lock or Unlock in Ajax 
    $(document).ready(function() {
        $('#unlock').hide();
        $('#lock').show();

        $('#prodct').click(function() {
            $('#unlock').toggle();
            $('#lock').toggle();
        });
    });

    // Plugin Purchases Lock or Unlock in Ajax 
    $(document).ready(function() {
        $('#s_unlock').hide();
        $('#s_lock').show();

        $('#stock_id').click(function() {
        $('#s_unlock').toggle();
        $('#s_lock').toggle();
    });
    });
    
    // Plugin Accounts Lock or Unlock in Ajax 
    $(document).ready(function() {
        $('#a_lock').show();
        $('#a_unlock').hide();

        $('#leger_').click(function() {
            $('#a_lock').toggle();
            $('#a_unlock').toggle();
        });
    });

    // Plugin Sales Lock or Unlock in Ajax 
    $(document).ready(function() {
        $('#sales_lock').show();
        $('#sales_unlock').hide();

        $('#Sales_id').click(function() {
            $('#sales_lock').toggle();
            $('#sales_unlock').toggle();
        });
    });

    // Plugin Voucher Lock or Unlock in Ajax 
    $(document).ready(function() {
        $('#voch_lock').show();
        $('#voch_unlock').hide();

        $('#Voucher_id').click(function() {
            $('#voch_lock').toggle();
            $('#voch_unlock').toggle();
        });
    });

    // Plugin Report Lock or Unlock in Ajax 
    $(document).ready(function() {
        $('#report_lock').show();
        $('#report_unlock').hide();

        $('#Report_id').click(function() {
            $('#report_lock').toggle();
            $('#report_unlock').toggle();
        });
    });

    // Plugin Asset Lock or Unlock in Ajax 
    $(document).ready(function() {
        $('#ast_lock').show();
        $('#ast_unlock').hide();

        $('#Asset_id').click(function() {
            $('#ast_lock').toggle();
            $('#ast_unlock').toggle();
        });
    });

    // Plugin HRM Lock or Unlock in Ajax 
    $(document).ready(function() {
        $('#hrm_lock').show();
        $('#hrm_unlock').hide();

        $('#hrm_id').click(function() {
            $('#hrm_lock').toggle();
            $('#hrm_unlock').toggle();
        });
    });

    // Plugin Auth Lock or Unlock in Ajax 
    $(document).ready(function() {
        $('#auth_lock').show();
        $('#auth_unlock').hide();

        $('#auth_id').click(function() {
            $('#auth_lock').toggle();
            $('#auth_unlock').toggle();
        });
    });

    // Plugin Components Lock or Unlock in Ajax 
    $(document).ready(function() {
        $('#compont_lock').show();
        $('#compont_unlock').hide();

        $('#components_id').click(function() {
            $('#compont_lock').toggle();
            $('#compont_unlock').toggle();
        });
    });

    // Plugin Admin Stock Lock or Unlock in Ajax 
    $(document).ready(function() {
        $('#admin_stock_lock').show();
        $('#admin_stock_unlock').hide();

        $('#admin_stock').click(function() {
            $('#admin_stock_lock').toggle();
            $('#admin_stock_unlock').toggle();
        });
    });
</script>
<script>
    $(document).ready(function(){
        // Product show Button
        $(document).on('click','.prod_button',function(){
            $('.product_btn').toggleClass('product-menu-btn');
            $('.product_btn').fadeIn('slide');
        });
        // Stock show Button
        $(document).on('click','.stck_button',function(){
            $('.stock_btn').toggleClass('product-menu-btn');
            $('.stock_btn').fadeIn('slide');
        });
        // Lager show Button
        $(document).on('click','.lag_button',function(){
            $('.lager_btn').toggleClass('product-menu-btn');
            $('.lager_btn').fadeIn('slide');
        });
        // Sales show Button
        $(document).on('click','.sal_button',function(){
            $('.sales_btn').toggleClass('product-menu-btn');
            $('.sales_btn').fadeIn('slide');
        });
        // Vaoucher show Button
        $(document).on('click','.voau_button',function(){
            $('.vaoucher_btn').toggleClass('product-menu-btn');
            $('.vaoucher_btn').fadeIn('slide');
        });
        // Asset show Button
        $(document).on('click','.ass_button',function(){
            $('.asset_btn').toggleClass('product-menu-btn');
            $('.asset_btn').fadeIn('slide');
        });
        // Report show Button
        $(document).on('click','.rept_button',function(){
            $('.report_btn').toggleClass('product-menu-btn');
            $('.report_btn').fadeIn('slide');
        });
        // HRM show Button
        $(document).on('click','.hm_button',function(){
            $('.hrm_btn').toggleClass('product-menu-btn');
            $('.hrm_btn').fadeIn('slide');
        });
        // Auth show Button
        $(document).on('click','.ath_button',function(){
            $('.auth_btn').toggleClass('product-menu-btn');
            $('.auth_btn').fadeIn('slide');
        });
        // Components show Button
        $(document).on('click','.com_button',function(){
            $('.Components_btn').toggleClass('product-menu-btn');
            $('.auth_btn').fadeIn('slide');
        });
    });
</script>
<script>
    // Admin Sidebar Button Show
    $(document).ready(function(){
        // Post
        $(document).on('click','.post',function(){
            $('.post_btn').toggleClass('product-menu-btn');
            $('.post_btn').fadeIn('slide');
        });
        // Inventory
        $(document).on('click','.inv_btn',function(){
            $('.inventoy_btn').toggleClass('product-menu-btn');
            $('.inventoy_btn').fadeIn('slide');
        });
        // Stock
        $(document).on('click','.adm_stock',function(){
            $('.adminStock_btn').toggleClass('product-menu-btn');
            $('.adminStock_btn').fadeIn('slide');
        });
    });
</script>