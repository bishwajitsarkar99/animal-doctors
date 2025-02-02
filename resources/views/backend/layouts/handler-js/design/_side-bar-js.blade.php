<!--============ Side-Bar Lock in Ajax ============-->
<script>
    // Admin-Panel Light Mode
    $(document).ready(function(){
        
    });
    // Plugin Product Lock or Unlock in Ajax 
    $(document).ready(function() {
        $('.product_btn').click(function() {
            if ($(this).hasClass('collapsed')) {
                $('#lock').removeAttr('hidden');
                $('#unlock').attr('hidden', true);
            } else {
                $('#lock').attr('hidden', true);
                $('#unlock').removeAttr('hidden');
            }
        });
    });

    // Plugin Purchases Lock or Unlock in Ajax 
    $(document).ready(function() {
        $('.stock_btn').click(function() {
            if ($(this).hasClass('collapsed')) {
                $('#lock_stock').removeAttr('hidden');
                $('#unlock_stock').attr('hidden', true);
            } else {
                $('#lock_stock').attr('hidden', true);
                $('#unlock_stock').removeAttr('hidden');
            }
        });
    });
    
    // Plugin Accounts Lock or Unlock in Ajax 
    $(document).ready(function() {
        $('.lager_btn').click(function() {
            if ($(this).hasClass('collapsed')) {
                $('#lock_leger').removeAttr('hidden');
                $('#unlock_leger').attr('hidden', true);
            } else {
                $('#lock_leger').attr('hidden', true);
                $('#unlock_leger').removeAttr('hidden');
            }
        });
    });

    // Plugin Sales Lock or Unlock in Ajax 
    $(document).ready(function() {
        $('.sales_btn').click(function() {
            if ($(this).hasClass('collapsed')) {
                $('#sales_lock').removeAttr('hidden');
                $('#sales_unlock').attr('hidden', true);
            } else {
                $('#sales_lock').attr('hidden', true);
                $('#sales_unlock').removeAttr('hidden');
            }
        });
    });

    // Plugin Voucher Lock or Unlock in Ajax 
    $(document).ready(function() {
        $('.vaoucher_btn').click(function() {
            if ($(this).hasClass('collapsed')) {
                $('#voch_lock').removeAttr('hidden');
                $('#voch_unlock').attr('hidden', true);
            } else {
                $('#voch_lock').attr('hidden', true);
                $('#voch_unlock').removeAttr('hidden');
            }
        });
    });

    // Plugin Report Lock or Unlock in Ajax 
    $(document).ready(function() {
        $('.report_btn').click(function() {
            if ($(this).hasClass('collapsed')) {
                $('#report_lock').removeAttr('hidden');
                $('#report_unlock').attr('hidden', true);
            } else {
                $('#report_lock').attr('hidden', true);
                $('#report_unlock').removeAttr('hidden');
            }
        });
    });

    // Plugin Asset Lock or Unlock in Ajax 
    $(document).ready(function() {
        $('.asset_btn').click(function() {
            if ($(this).hasClass('collapsed')) {
                $('#ast_lock').removeAttr('hidden');
                $('#ast_unlock').attr('hidden', true);
            } else {
                $('#ast_lock').attr('hidden', true);
                $('#ast_unlock').removeAttr('hidden');
            }
        });
    });

    // Plugin HRM Lock or Unlock in Ajax 
    $(document).ready(function() {
        $('.hrm_btn').click(function() {
            if ($(this).hasClass('collapsed')) {
                $('#hrm_lock').removeAttr('hidden');
                $('#hrm_unlock').attr('hidden', true);
            } else {
                $('#hrm_lock').attr('hidden', true);
                $('#hrm_unlock').removeAttr('hidden');
            }
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
            if ($(this).hasClass('collapsed')) {
                $('#plus').removeAttr('hidden');
                $('#minus').attr('hidden', true);
            } else {
                $('#plus').attr('hidden', true);
                $('#minus').removeAttr('hidden');
            }
            $('.product_btn').toggleClass('product-menu-btn');
            $('.product_btn').fadeIn('slide');
        });
        // Category LInk Button
        $(document).on('click', '.child_category', function() {
            let $plusIcon = $('#plus_category_link');
            let $minusIcon = $('#minus_category_link');

            if ($(this).attr('aria-expanded') === 'true') {
                $plusIcon.attr('hidden', true);
                $minusIcon.removeAttr('hidden');
            } else {
                $plusIcon.removeAttr('hidden');
                $minusIcon.attr('hidden', true);
            }
        });
        // Sub Category LInk Button
        $(document).on('click', '.child_sub_category', function() {
            let $plusIcon = $('#plus_sub_category_link');
            let $minusIcon = $('#minus_sub_category_link');

            if ($(this).attr('aria-expanded') === 'true') {
                $plusIcon.attr('hidden', true);
                $minusIcon.removeAttr('hidden');
            } else {
                $plusIcon.removeAttr('hidden');
                $minusIcon.attr('hidden', true);
            }
        });
        // Group LInk Button
        $(document).on('click', '.child_group', function() {
            let $plusIcon = $('#plus_group_link');
            let $minusIcon = $('#minus_group_link');

            if ($(this).attr('aria-expanded') === 'true') {
                $plusIcon.attr('hidden', true);
                $minusIcon.removeAttr('hidden');
            } else {
                $plusIcon.removeAttr('hidden');
                $minusIcon.attr('hidden', true);
            }
        });
        // Medicine as Product LInk Button
        $(document).on('click', '.child_product', function() {
            let $plusIcon = $('#plus_product_link');
            let $minusIcon = $('#minus_product_link');

            if ($(this).attr('aria-expanded') === 'true') {
                $plusIcon.attr('hidden', true);
                $minusIcon.removeAttr('hidden');
            } else {
                $plusIcon.removeAttr('hidden');
                $minusIcon.attr('hidden', true);
            }
        });
        // Product Model LInk Button
        $(document).on('click', '.child_product_model', function() {
            let $plusIcon = $('#plus_product_model_link');
            let $minusIcon = $('#minus_product_model_link');

            if ($(this).attr('aria-expanded') === 'true') {
                $plusIcon.attr('hidden', true);
                $minusIcon.removeAttr('hidden');
            } else {
                $plusIcon.removeAttr('hidden');
                $minusIcon.attr('hidden', true);
            }
        });
        // Unit LInk Button
        $(document).on('click', '.child_unit', function() {
            let $plusIcon = $('#plus_unit_link');
            let $minusIcon = $('#minus_unit_link');

            if ($(this).attr('aria-expanded') === 'true') {
                $plusIcon.attr('hidden', true);
                $minusIcon.removeAttr('hidden');
            } else {
                $plusIcon.removeAttr('hidden');
                $minusIcon.attr('hidden', true);
            }
        });
        // Brand LInk Button
        $(document).on('click', '.child_brand', function() {
            let $plusIcon = $('#plus_brand_link');
            let $minusIcon = $('#minus_brand_link');

            if ($(this).attr('aria-expanded') === 'true') {
                $plusIcon.attr('hidden', true);
                $minusIcon.removeAttr('hidden');
            } else {
                $plusIcon.removeAttr('hidden');
                $minusIcon.attr('hidden', true);
            }
        });
        // Another Product LInk Button
        $(document).on('click', '.child_another_product', function() {
            let $plusIcon = $('#plus_another_product_link');
            let $minusIcon = $('#minus_another_product_link');

            if ($(this).attr('aria-expanded') === 'true') {
                $plusIcon.attr('hidden', true);
                $minusIcon.removeAttr('hidden');
            } else {
                $plusIcon.removeAttr('hidden');
                $minusIcon.attr('hidden', true);
            }
        });
        // Stock show Button
        $(document).on('click','.stck_button',function(){
            if ($(this).hasClass('collapsed')) {
                $('#plus_stock').removeAttr('hidden');
                $('#minus_stock').attr('hidden', true);
            } else {
                $('#plus_stock').attr('hidden', true);
                $('#minus_stock').removeAttr('hidden');
            }
            $('.stock_btn').toggleClass('product-menu-btn');
            $('.stock_btn').fadeIn('slide');
        });
        // Stock LInk Button
        $(document).on('click', '.child_stock', function() {
            let $plusIcon = $('#plus_stock_link');
            let $minusIcon = $('#minus_stock_link');

            if ($(this).attr('aria-expanded') === 'true') {
                $plusIcon.attr('hidden', true);
                $minusIcon.removeAttr('hidden');
            } else {
                $plusIcon.removeAttr('hidden');
                $minusIcon.attr('hidden', true);
            }
        });
        // Inventory LInk Button
        $(document).on('click', '.child_inventory', function() {
            let $plusIcon = $('#plus_inventory_link');
            let $minusIcon = $('#minus_inventory_link');

            if ($(this).attr('aria-expanded') === 'true') {
                $plusIcon.attr('hidden', true);
                $minusIcon.removeAttr('hidden');
            } else {
                $plusIcon.removeAttr('hidden');
                $minusIcon.attr('hidden', true);
            }
        });
        // Supplier LInk Button
        $(document).on('click', '.child_supplier', function() {
            let $plusIcon = $('#plus_supplier_link');
            let $minusIcon = $('#minus_supplier_link');

            if ($(this).attr('aria-expanded') === 'true') {
                $plusIcon.attr('hidden', true);
                $minusIcon.removeAttr('hidden');
            } else {
                $plusIcon.removeAttr('hidden');
                $minusIcon.attr('hidden', true);
            }
        });
        // Lager show Button
        $(document).on('click','.lag_button',function(){
            if ($(this).hasClass('collapsed')) {
                $('#plus_leger').removeAttr('hidden');
                $('#minus_leger').attr('hidden', true);
            } else {
                $('#plus_leger').attr('hidden', true);
                $('#minus_leger').removeAttr('hidden');
            }
            $('.lager_btn').toggleClass('product-menu-btn');
            $('.lager_btn').fadeIn('slide');
        });
        // Day Book LInk Button
        $(document).on('click', '.child_daybook', function() {
            let $plusIcon = $('#plus_daybook_link');
            let $minusIcon = $('#minus_daybook_link');

            if ($(this).attr('aria-expanded') === 'true') {
                $plusIcon.attr('hidden', true);
                $minusIcon.removeAttr('hidden');
            } else {
                $plusIcon.removeAttr('hidden');
                $minusIcon.attr('hidden', true);
            }
        });
        // Expenses LInk Button
        $(document).on('click', '.child_expenses', function() {
            let $plusIcon = $('#plus_expenses_link');
            let $minusIcon = $('#minus_expenses_link');

            if ($(this).attr('aria-expanded') === 'true') {
                $plusIcon.attr('hidden', true);
                $minusIcon.removeAttr('hidden');
            } else {
                $plusIcon.removeAttr('hidden');
                $minusIcon.attr('hidden', true);
            }
        });
        // Customer LInk Button
        $(document).on('click', '.child_customer', function() {
            let $plusIcon = $('#plus_customer_link');
            let $minusIcon = $('#minus_customer_link');

            if ($(this).attr('aria-expanded') === 'true') {
                $plusIcon.attr('hidden', true);
                $minusIcon.removeAttr('hidden');
            } else {
                $plusIcon.removeAttr('hidden');
                $minusIcon.attr('hidden', true);
            }
        });
        // Petty Cash LInk Button
        $(document).on('click', '.child_petty_cash', function() {
            let $plusIcon = $('#plus_petty_cash_link');
            let $minusIcon = $('#minus_petty_cash_link');

            if ($(this).attr('aria-expanded') === 'true') {
                $plusIcon.attr('hidden', true);
                $minusIcon.removeAttr('hidden');
            } else {
                $plusIcon.removeAttr('hidden');
                $minusIcon.attr('hidden', true);
            }
        });
        // Bank Transaction LInk Button
        $(document).on('click', '.child_bank', function() {
            let $plusIcon = $('#plus_bank_link');
            let $minusIcon = $('#minus_bank_link');

            if ($(this).attr('aria-expanded') === 'true') {
                $plusIcon.attr('hidden', true);
                $minusIcon.removeAttr('hidden');
            } else {
                $plusIcon.removeAttr('hidden');
                $minusIcon.attr('hidden', true);
            }
        });
        // Tax/VAT LInk Button
        $(document).on('click', '.child_tax', function() {
            let $plusIcon = $('#plus_tax_link');
            let $minusIcon = $('#minus_tax_link');

            if ($(this).attr('aria-expanded') === 'true') {
                $plusIcon.attr('hidden', true);
                $minusIcon.removeAttr('hidden');
            } else {
                $plusIcon.removeAttr('hidden');
                $minusIcon.attr('hidden', true);
            }
        });
        // Sales show Button
        $(document).on('click','.sal_button',function(){
            if ($(this).hasClass('collapsed')) {
                $('#plus_sales').removeAttr('hidden');
                $('#minus_sales').attr('hidden', true);
            } else {
                $('#plus_sales').attr('hidden', true);
                $('#minus_sales').removeAttr('hidden');
            }
            $('.sales_btn').toggleClass('product-menu-btn');
            $('.sales_btn').fadeIn('slide');
        });
        // Order LInk Button
        $(document).on('click', '.child_order', function() {
            let $plusIcon = $('#plus_order_link');
            let $minusIcon = $('#minus_order_link');

            if ($(this).attr('aria-expanded') === 'true') {
                $plusIcon.attr('hidden', true);
                $minusIcon.removeAttr('hidden');
            } else {
                $plusIcon.removeAttr('hidden');
                $minusIcon.attr('hidden', true);
            }
        });
        // Invoice LInk Button
        $(document).on('click', '.child_invoice', function() {
            let $plusIcon = $('#plus_invoice_link');
            let $minusIcon = $('#minus_invoice_link');

            if ($(this).attr('aria-expanded') === 'true') {
                $plusIcon.attr('hidden', true);
                $minusIcon.removeAttr('hidden');
            } else {
                $plusIcon.removeAttr('hidden');
                $minusIcon.attr('hidden', true);
            }
        });
        // Sales Region LInk Button
        $(document).on('click', '.child_sales_region', function() {
            let $plusIcon = $('#plus_sales_region_link');
            let $minusIcon = $('#minus_sales_region_link');

            if ($(this).attr('aria-expanded') === 'true') {
                $plusIcon.attr('hidden', true);
                $minusIcon.removeAttr('hidden');
            } else {
                $plusIcon.removeAttr('hidden');
                $minusIcon.attr('hidden', true);
            }
        });
        // Vaoucher show Button
        $(document).on('click','.voau_button',function(){
            let $plusIcon = $('#plus_vaoucher');
            let $minusIcon = $('#minus_vaoucher');

            if ($(this).attr('aria-expanded') === 'true') {
                $plusIcon.attr('hidden', true);
                $minusIcon.removeAttr('hidden');
            } else {
                $plusIcon.removeAttr('hidden');
                $minusIcon.attr('hidden', true);
            }
            $('.vaoucher_btn').toggleClass('product-menu-btn');
            $('.vaoucher_btn').fadeIn('slide');
        });
        // Voucher LInk Button
        $(document).on('click', '.child_voucher', function() {
            let $plusIcon = $('#plus_voucher_link');
            let $minusIcon = $('#minus_voucher_link');

            if ($(this).attr('aria-expanded') === 'true') {
                $plusIcon.attr('hidden', true);
                $minusIcon.removeAttr('hidden');
            } else {
                $plusIcon.removeAttr('hidden');
                $minusIcon.attr('hidden', true);
            }
        });
        // Voucher Create LInk Button
        $(document).on('click', '.child_voucher_create', function() {
            let $plusIcon = $('#plus_voucher_create_link');
            let $minusIcon = $('#minus_voucher_create_link');

            if ($(this).attr('aria-expanded') === 'true') {
                $plusIcon.attr('hidden', true);
                $minusIcon.removeAttr('hidden');
            } else {
                $plusIcon.removeAttr('hidden');
                $minusIcon.attr('hidden', true);
            }
        });
        // Asset show Button
        $(document).on('click','.ass_button',function(){
            let $plusIcon = $('#plus_asset');
            let $minusIcon = $('#minus_asset');

            if ($(this).attr('aria-expanded') === 'true') {
                $plusIcon.attr('hidden', true);
                $minusIcon.removeAttr('hidden');
            } else {
                $plusIcon.removeAttr('hidden');
                $minusIcon.attr('hidden', true);
            }
            $('.asset_btn').toggleClass('product-menu-btn');
            $('.asset_btn').fadeIn('slide');
        });
        // Asset LInk Button
        $(document).on('click', '.child_asset', function() {
            let $plusIcon = $('#plus_asset_link');
            let $minusIcon = $('#minus_asset_link');

            if ($(this).attr('aria-expanded') === 'true') {
                $plusIcon.attr('hidden', true);
                $minusIcon.removeAttr('hidden');
            } else {
                $plusIcon.removeAttr('hidden');
                $minusIcon.attr('hidden', true);
            }
        });
        // Asset Details LInk Button
        $(document).on('click', '.child_asset_details', function() {
            let $plusIcon = $('#plus_asset_details_link');
            let $minusIcon = $('#minus_asset_details_link');

            if ($(this).attr('aria-expanded') === 'true') {
                $plusIcon.attr('hidden', true);
                $minusIcon.removeAttr('hidden');
            } else {
                $plusIcon.removeAttr('hidden');
                $minusIcon.attr('hidden', true);
            }
        });
        // Report show Button
        $(document).on('click','.rept_button',function(){
            let $plusIcon = $('#plus_report');
            let $minusIcon = $('#minus_report');

            if ($(this).attr('aria-expanded') === 'true') {
                $plusIcon.attr('hidden', true);
                $minusIcon.removeAttr('hidden');
            } else {
                $plusIcon.removeAttr('hidden');
                $minusIcon.attr('hidden', true);
            }
            $('.report_btn').toggleClass('product-menu-btn');
            $('.report_btn').fadeIn('slide');
        });
        // Report LInk Button
        $(document).on('click', '.child_report', function() {
            let $plusIcon = $('#plus_report_link');
            let $minusIcon = $('#minus_report_link');

            if ($(this).attr('aria-expanded') === 'true') {
                $plusIcon.attr('hidden', true);
                $minusIcon.removeAttr('hidden');
            } else {
                $plusIcon.removeAttr('hidden');
                $minusIcon.attr('hidden', true);
            }
        });
        // Monthly Report LInk Button
        $(document).on('click', '.child_monthly_report', function() {
            let $plusIcon = $('#plus_monthly_report_link');
            let $minusIcon = $('#minus_monthly_report_link');

            if ($(this).attr('aria-expanded') === 'true') {
                $plusIcon.attr('hidden', true);
                $minusIcon.removeAttr('hidden');
            } else {
                $plusIcon.removeAttr('hidden');
                $minusIcon.attr('hidden', true);
            }
        });
        // Daily Report LInk Button
        $(document).on('click', '.child_daily_report', function() {
            let $plusIcon = $('#plus_daily_report_link');
            let $minusIcon = $('#minus_daily_report_link');

            if ($(this).attr('aria-expanded') === 'true') {
                $plusIcon.attr('hidden', true);
                $minusIcon.removeAttr('hidden');
            } else {
                $plusIcon.removeAttr('hidden');
                $minusIcon.attr('hidden', true);
            }
        });
        // HRM show Button
        $(document).on('click','.hm_button',function(){
            let $plusIcon = $('#plus_hrm');
            let $minusIcon = $('#minus_hrm');

            if ($(this).attr('aria-expanded') === 'true') {
                $plusIcon.attr('hidden', true);
                $minusIcon.removeAttr('hidden');
            } else {
                $plusIcon.removeAttr('hidden');
                $minusIcon.attr('hidden', true);
            }
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