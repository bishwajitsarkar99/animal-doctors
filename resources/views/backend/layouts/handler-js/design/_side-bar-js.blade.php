<!--============ Side-Bar Lock in Ajax ============-->
<script>
    // Initialize sidebar-specific behavior
    function initSidebarScripts() {
        // Remove any previous sidebar-toggle bindings (namespaced) and attach a new one
        $('.sidebar-toggle').off('click.sidebar').on('click.sidebar', function() {
            $('.sidebar').toggleClass('collapsed');
        });
    }
    // Helper for toggling lock/unlock icons for buttons (non-delegated actions)
    function toggleLockUnlock(buttonSelector, lockSelector, unlockSelector) {
        // Remove previous bindings with the namespace "lockToggle" to avoid duplicates
        $(document).off('click.lockToggle', buttonSelector)
                   .on('click.lockToggle', buttonSelector, function() {
            if ($(this).hasClass('collapsed')) {
                $(lockSelector).removeAttr('hidden');
                $(unlockSelector).attr('hidden', true);
            } else {
                $(lockSelector).attr('hidden', true);
                $(unlockSelector).removeAttr('hidden');
            }
        });
    }
    // Helper for toggling link icons based on aria-expanded attribute
    function toggleLinkIcon(clickSelector, plusSelector, minusSelector) {
        // Use delegated events with namespacing ("linkToggle")
        $(document).off('click.linkToggle', clickSelector)
                   .on('click.linkToggle', clickSelector, function() {
            if ($(this).attr('aria-expanded') === 'true') {
                $(plusSelector).attr('hidden', true);
                $(minusSelector).removeAttr('hidden');
            } else {
                $(plusSelector).removeAttr('hidden');
                $(minusSelector).attr('hidden', true);
            }
        });
    }
    $(document).ready(function(){
        initSidebarScripts();
        // Initialize lock/unlock toggles for various plugins
        toggleLockUnlock('.product_btn', '#lock', '#unlock');
        toggleLockUnlock('.stock_btn', '#lock_stock', '#unlock_stock');
        toggleLockUnlock('.lager_btn', '#lock_leger', '#unlock_leger');
        toggleLockUnlock('.sales_btn', '#sales_lock', '#sales_unlock');
        toggleLockUnlock('.vaoucher_btn', '#voch_lock', '#voch_unlock');
        toggleLockUnlock('.report_btn', '#report_lock', '#report_unlock');
        toggleLockUnlock('.asset_btn', '#ast_lock', '#ast_unlock');
        toggleLockUnlock('.hrm_btn', '#hrm_lock', '#hrm_unlock');
        toggleLockUnlock('.auth_btn', '#auth_lock', '#auth_unlock');
        toggleLockUnlock('.Components_btn', '#compont_lock', '#compont_unlock');
        // Initialize toggle for link buttons (example calls)
        // Product show Button
        toggleLinkIcon('.prod_button', '#plus', '#minus');
        toggleLinkIcon('.child_category', '#plus_category_link', '#minus_category_link');
        toggleLinkIcon('.child_sub_category', '#plus_sub_category_link', '#minus_sub_category_link');
        toggleLinkIcon('.child_group', '#plus_group_link', '#minus_group_link');
        toggleLinkIcon('.child_product', '#plus_product_link', '#minus_product_link');
        toggleLinkIcon('.child_product_model', '#plus_product_model_link', '#minus_product_model_link');
        toggleLinkIcon('.child_unit', '#plus_unit_link', '#minus_unit_link');
        toggleLinkIcon('.child_brand', '#plus_brand_link', '#minus_brand_link');
        toggleLinkIcon('.child_another_product', '#plus_another_product_link', '#minus_another_product_link');
        // Stock show Button
        toggleLinkIcon('.stck_button', '#plus_stock', '#minus_stock');
        toggleLinkIcon('.child_stock', '#plus_stock_link', '#minus_stock_link');
        toggleLinkIcon('.child_inventory', '#plus_inventory_link', '#minus_inventory_link');
        toggleLinkIcon('.child_supplier', '#plus_supplier_link', '#minus_supplier_link');
        // Lager show Button
        toggleLinkIcon('.lag_button', '#plus_leger', '#minus_leger');
        toggleLinkIcon('.child_daybook', '#plus_daybook_link', '#minus_daybook_link');
        toggleLinkIcon('.child_expenses', '#plus_expenses_link', '#minus_expenses_link');
        toggleLinkIcon('.child_customer', '#plus_customer_link', '#minus_customer_link');
        toggleLinkIcon('.child_petty_cash', '#plus_petty_cash_link', '#minus_petty_cash_link');
        toggleLinkIcon('.child_bank', '#plus_bank_link', '#minus_bank_link');
        toggleLinkIcon('.child_tax', '#plus_tax_link', '#minus_tax_link');
        // Sales show Button
        toggleLinkIcon('.sal_button', '#plus_sales', '#minus_sales');
        toggleLinkIcon('.child_order', '#plus_order_link', '#minus_order_link');
        toggleLinkIcon('.child_invoice', '#plus_invoice_link', '#minus_invoice_link');
        toggleLinkIcon('.child_sales_region', '#plus_sales_region_link', '#minus_sales_region_link');
        // Vaoucher show Button
        toggleLinkIcon('.voau_button', '#plus_vaoucher', '#minus_vaoucher');
        toggleLinkIcon('.child_voucher', '#plus_voucher_link', '#minus_voucher_link');
        toggleLinkIcon('.child_voucher_create', '#plus_voucher_create_link', '#minus_voucher_create_link');
        // Asset show Button
        toggleLinkIcon('.ass_button', '#plus_asset', '#minus_asset');
        toggleLinkIcon('.child_asset', '#plus_asset_link', '#minus_asset_link');
        toggleLinkIcon('.child_asset_details', '#plus_asset_details_link', '#minus_asset_details_link');
        // Report show Button
        toggleLinkIcon('.rept_button', '#plus_report', '#minus_report');
        toggleLinkIcon('.child_report', '#plus_report_link', '#minus_report_link');
        toggleLinkIcon('.child_monthly_report', '#plus_monthly_report_link', '#minus_monthly_report_link');
        toggleLinkIcon('.child_daily_report', '#plus_daily_report_link', '#minus_daily_report_link');
        // HRM show Button
        toggleLinkIcon('.hm_button', '#plus_hrm', '#minus_hrm');
        toggleLinkIcon('.child_employee', '#plus_employee_link', '#minus_employee_link');
        toggleLinkIcon('.child_employee_profile', '#plus_employee_profile_link', '#minus_employee_profile_link');
        toggleLinkIcon('.child_salary', '#plus_salary_link', '#minus_salary_link');
        toggleLinkIcon('.child_emp_performance', '#plus_emp_performance_link', '#minus_emp_performance_link');
        toggleLinkIcon('.child_emp_attendence', '#plus_emp_attendence_link', '#minus_emp_attendence_link');
        toggleLinkIcon('.child_emp_details', '#plus_emp_details_link', '#minus_emp_details_link');
        // Auth show Button
        toggleLinkIcon('.ath_button', '#plus_auth', '#minus_auth');
        toggleLinkIcon('.child_authentication', '#plus_authentication_link', '#minus_authentication_link');
        toggleLinkIcon('.child_permission', '#plus_permission_link', '#minus_permission_link');
        toggleLinkIcon('.child_location', '#plus_loaction_link', '#minus_loaction_link');
        toggleLinkIcon('.child_branch', '#plus_branch_link', '#minus_branch_link');
        toggleLinkIcon('.child_module', '#plus_module_link', '#minus_module_link');
        // User Log Activity
        toggleLinkIcon('.child_log_activity', '#plus_log_activity_link', '#minus_log_activity_link');
        // Layout
        toggleLinkIcon('.child_layout', '#plus_layout_link', '#minus_layout_link');
        // Components Button
        toggleLinkIcon('.com_button', '#plus_component_link', '#minus_component_link');
        toggleLinkIcon('.child_modal', '#plus_modal_link', '#minus_modal_link');
        toggleLinkIcon('.child_form', '#plus_form_link', '#minus_form_link');
        toggleLinkIcon('.child_input', '#plus_input_link', '#minus_input_link');
        toggleLinkIcon('.child_dropdown', '#plus_dropdown_link', '#minus_dropdown_link');
        toggleLinkIcon('.child_table', '#plus_table_link', '#minus_table_link');
        toggleLinkIcon('.child_footer', '#plus_footer_link', '#minus_footer_link');
        toggleLinkIcon('.child_card', '#plus_card_link', '#minus_card_link');
        toggleLinkIcon('.child_setting', '#plus_setting_link', '#minus_setting_link');
    });
</script>
<script>
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