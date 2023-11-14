<!-- Accounts-Moduel-Setting -->
<script>
    $(document).ready(function(){
        // accounts moduel
        $('#acc_parent_moduel').show();
        $('#acc_parent_moduel2').hide();
        $('.legerChild').hide();
        $('.sales_child').hide();
        $('.vaoucher_child').hide();
        $('.asset_children_siblink2').hide();
        $('.report_children_siblink2').hide();
        $(document).on('click', 'td.parent_accModuel', function() {
            $('#acc_parent_moduel').toggle();
            $('#acc_parent_moduel2').toggle();
            $('.legerChild').toggle();
            $('.sales_child').toggle();
            $('.vaoucher_child').toggle();
            $('.asset_children_siblink2').toggle();
            $('.report_children_siblink2').toggle();
        });

        // leger
        $('#accChildren').show();
        $('#accChildren2').hide();
        $('.acc_children_siblink2').hide();
        $('.exp_children_siblink').hide();
        $('.customer_children_siblink').hide();
        $('.petty_cash_children_siblink').hide();
        $('.bank_children_siblink').hide();
        $('.tax_vat_children_siblink').hide();
        $(document).on('click', 'td.acc_children_siblink', function() {
            $('#accChildren').toggle();
            $('#accChildren2').toggle();
            $('.acc_children_siblink2').toggle();
            $('.exp_children_siblink').toggle();
            $('.customer_children_siblink').toggle();
            $('.petty_cash_children_siblink').toggle();
            $('.bank_children_siblink').toggle();
            $('.tax_vat_children_siblink').toggle();
            $('.legerChild').toggleClass('select-bg');
        });
        // day book active
        $('#dayBhildren').show();
        $('#dayBhildren2').hide();
        $('.acc_children_siblink4').hide();
        $('.acc_children_siblink5').hide();
        $('.acc_children_siblink6').hide();
        $(document).on('click', 'td.acc_children_siblink3', function() {
            $('#dayBhildren').toggle();
            $('#dayBhildren2').toggle();
            $('.acc_children_siblink4').toggle();
            $('.acc_children_siblink5').toggle();
            $('.acc_children_siblink6').toggle();
            $('.acc_children_siblink2').toggleClass('select-bg');
        });
        // Expenses active
        $('#exp_children').show();
        $('#exp_children2').hide();
        $('.exp_children_siblink3').hide();
        $('.exp_children_siblink4').hide();
        $('.exp_children_siblink5').hide();
        $('.exp_children_siblink6').hide();
        $(document).on('click', 'td.exp_children_siblink2', function() {
            $('#exp_children').toggle();
            $('#exp_children2').toggle();
            $('.exp_children_siblink3').toggle();
            $('.exp_children_siblink4').toggle();
            $('.exp_children_siblink5').toggle();
            $('.exp_children_siblink6').toggle();
            $('.exp_children_siblink').toggleClass('select-bg');
        });
        // Customer active
        $('#customer_children').show();
        $('#customer_children2').hide();
        $('.customer_children_siblink3').hide();
        $('.customer_children_siblink4').hide();
        $('.customer_children_siblink5').hide();
        $('.customer_children_siblink6').hide();
        $(document).on('click', 'td.customer_children_siblink2', function() {
            $('#customer_children').toggle();
            $('#customer_children2').toggle();
            $('.customer_children_siblink3').toggle();
            $('.customer_children_siblink4').toggle();
            $('.customer_children_siblink5').toggle();
            $('.customer_children_siblink6').toggle();
            $('.customer_children_siblink').toggleClass('select-bg');
        });
        // Petty Cash active
        $('#petty_cash_children').show();
        $('#petty_cash_children2').hide();
        $('.petty_cash_children_siblink3').hide();
        $('.petty_cash_children_siblink4').hide();
        $('.petty_cash_children_siblink5').hide();
        $('.petty_cash_children_siblink6').hide();
        $(document).on('click', 'td.petty_cash_children_siblink2', function() {
            $('#petty_cash_children').toggle();
            $('#petty_cash_children2').toggle();
            $('.petty_cash_children_siblink3').toggle();
            $('.petty_cash_children_siblink4').toggle();
            $('.petty_cash_children_siblink5').toggle();
            $('.petty_cash_children_siblink6').toggle();
            $('.petty_cash_children_siblink').toggleClass('select-bg');
        });
        // Bank active
        $('#bank_children').show();
        $('#bank_children2').hide();
        $('.bank_children_siblink3').hide();
        $('.bank_children_siblink4').hide();
        $('.bank_children_siblink5').hide();
        $('.bank_children_siblink6').hide();
        $(document).on('click', 'td.bank_children_siblink2', function() {
            $('#bank_children').toggle();
            $('#bank_children2').toggle();
            $('.bank_children_siblink3').toggle();
            $('.bank_children_siblink4').toggle();
            $('.bank_children_siblink5').toggle();
            $('.bank_children_siblink6').toggle();
            $('.bank_children_siblink').toggleClass('select-bg');
        });
        // Vat/Tax active
        $('#tax_vat_children').show();
        $('#tax_vat_children2').hide();
        $('.tax_vat_children_siblink3').hide();
        $('.tax_vat_children_siblink4').hide();
        $('.tax_vat_children_siblink5').hide();
        $('.tax_vat_children_siblink6').hide();
        $(document).on('click', 'td.tax_vat_children_siblink2', function() {
            $('#tax_vat_children').toggle();
            $('#tax_vat_children2').toggle();
            $('.tax_vat_children_siblink3').toggle();
            $('.tax_vat_children_siblink4').toggle();
            $('.tax_vat_children_siblink5').toggle();
            $('.tax_vat_children_siblink6').toggle();
            $('.tax_vat_children_siblink').toggleClass('select-bg');
        });

        // Sales
        $("#sales_children").show();
        $("#sales_children2").hide();
        $('.sales_children_siblink2').hide();
        $('.invoice_children_siblink3').hide();
        $('.invoice_children_siblink2').hide();
        $('.sales_region_children_siblink2').hide();
        $(document).on('click', 'td.sales_children_siblink', function(){
            $("#sales_children").toggle();
            $("#sales_children2").toggle();
            $('.sales_children_siblink2').toggle();
            $('.invoice_children_siblink2').toggle();
            $('.invoice_children_siblink3').toggle();
            $('.sales_region_children_siblink2').toggle();
            $('.sales_child').toggleClass('select-bg');
        });

        // Order
        $("#order_children").show();
        $("#order_children2").hide();
        $('.sales_children_siblink4').hide();
        $('.sales_children_siblink5').hide();
        $('.sales_children_siblink6').hide();
        $(document).on('click', 'td.sales_children_siblink3', function(){
            $("#order_children").toggle();
            $("#order_children2").toggle();
            $('.sales_children_siblink4').toggle();
            $('.sales_children_siblink5').toggle();
            $('.sales_children_siblink6').toggle();
            $('.sales_children_siblink2').toggleClass('select-bg');
        });

        // Invoice
        $("#invoice_children").show();
        $("#invoice_children2").hide();
        $('.invoice_children_siblink4').hide();
        $('.invoice_children_siblink5').hide();
        $(document).on('click', 'td.invoice_children_siblink3', function(){
            $("#invoice_children").toggle();
            $("#invoice_children2").toggle();
            $('.invoice_children_siblink4').toggle();
            $('.invoice_children_siblink5').toggle();
            $('.invoice_children_siblink2').toggleClass('select-bg');
        });
        // Sales Region
        $("#sales_region_children").show();
        $("#sales_region_children2").hide();
        $('.sales_region_children_siblink4').hide();
        $('.sales_region_children_siblink5').hide();
        $('.sales_region_children_siblink6').hide();
        $(document).on('click', 'td.sales_region_children_siblink3', function(){
            $("#sales_region_children").toggle();
            $("#sales_region_children2").toggle();
            $('.sales_region_children_siblink4').toggle();
            $('.sales_region_children_siblink5').toggle();
            $('.sales_region_children_siblink6').toggle();
            $('.sales_region_children_siblink2').toggleClass('select-bg');
        });

        // Vaoucher
        $('#vaoucher_children').show();
        $('#vaoucher_children2').hide();
        $('.vaoucher_children_siblink2').hide();
        $('.vaoucher_children_siblink3').hide();
        $('.main_vaoucher_children_siblink2').hide();
        $('.main_vaoucher_children_siblink3').hide();
        $(document).on('click', 'td.vaoucher_children_siblink', function() {
            $('#vaoucher_children').toggle();
            $('#vaoucher_children2').toggle();
            $('.vaoucher_children_siblink2').toggle();
            $('.main_vaoucher_children_siblink2').toggle();
            $('.vaoucher_children_siblink3').toggle();
            $('.main_vaoucher_children_siblink3').toggle();
            $('.vaoucher_child').toggleClass('select-bg');
            
        });
        // Vaoucher Category
        $("#vaoucher_category_children").show();
        $("#vaoucher_category_children2").hide();
        $('.vaoucher_children_siblink4').hide();
        $('.vaoucher_children_siblink5').hide();

        $(document).on('click', 'td.vaoucher_children_siblink3', function(){
            $("#vaoucher_category_children").toggle();
            $("#vaoucher_category_children2").toggle();
            $('.vaoucher_children_siblink4').toggle();
            $('.vaoucher_children_siblink5').toggle();
            $('.vaoucher_children_siblink2').toggleClass('select-bg');
        });
        // Vaoucher Setting
        $("#main_vaoucher_children").show();
        $("#main_vaoucher_children2").hide();
        $('.main_vaoucher_children_siblink4').hide();
        $('.main_vaoucher_children_siblink5').hide();
        $('.main_vaoucher_children_siblink6').hide();

        $(document).on('click', 'td.main_vaoucher_children_siblink3', function(){
            $("#main_vaoucher_children").toggle();
            $("#main_vaoucher_children2").toggle();
            $('.main_vaoucher_children_siblink4').toggle();
            $('.main_vaoucher_children_siblink5').toggle();
            $('.main_vaoucher_children_siblink6').toggle();
            $('.main_vaoucher_children_siblink2').toggleClass('select-bg');
        });
        // Asset
        $("#asset_children").show();
        $("#asset_children2").hide();
        $('.asset_children_siblink3').hide();
        $('.asset_details_children_siblink2').hide();

        $(document).on('click', 'td.asset_children_siblink', function(){
            $("#asset_children").toggle();
            $("#asset_children2").toggle();
            $('.asset_children_siblink3').toggle();
            $('.asset_details_children_siblink2').toggle();
            $('.asset_children_siblink2').toggleClass('select-bg');
        });
        // New Asset
        $("#new_asset_children").show();
        $("#new_asset_children2").hide();
        $('.asset_children_siblink5').hide();
        $('.asset_children_siblink6').hide();

        $(document).on('click', 'td.asset_children_siblink4', function(){
            $("#new_asset_children").toggle();
            $("#new_asset_children2").toggle();
            $('.asset_children_siblink5').toggle();
            $('.asset_children_siblink6').toggle();
            $('.asset_children_siblink3').toggleClass('select-bg');
        });
        // Asset Details
        $("#details_asset_children").show();
        $("#details_asset_children2").hide();
        $('.asset_details_children_siblink5').hide();
        $('.asset_details_children_siblink6').hide();
        $('.asset_details_children_siblink7').hide();

        $(document).on('click', 'td.asset_details_children_siblink', function(){
            $("#details_asset_children").toggle();
            $("#details_asset_children2").toggle();
            $('.asset_details_children_siblink5').toggle();
            $('.asset_details_children_siblink6').toggle();
            $('.asset_details_children_siblink7').toggle();
            $('.asset_details_children_siblink2').toggleClass('select-bg');
        });

        // Report
        $("#report_children").show();
        $("#report_children2").hide();
        $('.acc_report_children_siblink2').hide();
        $('.monthly_report_children_siblink2').hide();
        $('.daily_report_children_siblink2').hide();

        $(document).on('click', 'td.report_children_siblink', function(){
            $("#report_children").toggle();
            $("#report_children2").toggle();
            $('.acc_report_children_siblink2').toggle();
            $('.monthly_report_children_siblink2').toggle();
            $('.daily_report_children_siblink2').toggle();
            $('.report_children_siblink2').toggleClass('select-bg');
        });

        // Accounting Repoert
        $("#accounting_report_children").show();
        $("#accounting_report_children2").hide();
        $(".acc_asset_details_children_siblink3").hide();
        $(".acc_asset_details_children_siblink4").hide();
        $(".acc_asset_details_children_siblink5").hide();
        $(".acc_asset_details_children_siblink6").hide();
        $(".acc_asset_details_children_siblink7").hide();
        $(".acc_asset_details_children_siblink8").hide();
        $(".acc_asset_details_children_siblink9").hide();
        $(".acc_asset_details_children_siblink10").hide();
        $(".acc_asset_details_children_siblink11").hide();
        $(".acc_asset_details_children_siblink12").hide();
        $(document).on('click', 'td.acc_report_children_siblink', function(){
            $("#accounting_report_children").toggle();
            $("#accounting_report_children2").toggle();
            $(".acc_asset_details_children_siblink3").toggle();
            $(".acc_asset_details_children_siblink4").toggle();
            $(".acc_asset_details_children_siblink5").toggle();
            $(".acc_asset_details_children_siblink6").toggle();
            $(".acc_asset_details_children_siblink7").toggle();
            $(".acc_asset_details_children_siblink8").toggle();
            $(".acc_asset_details_children_siblink9").toggle();
            $(".acc_asset_details_children_siblink10").toggle();
            $(".acc_asset_details_children_siblink11").toggle();
            $(".acc_asset_details_children_siblink12").toggle();
            $('.acc_report_children_siblink2').toggleClass('select-bg');
        });

        // Monthly Report
        $("#monthly_report_children").show();
        $("#monthly_report_children2").hide();
        $(".monthly_report_children_siblink3").hide();
        $(".monthly_report_children_siblink4").hide();

        $(document).on('click', 'td.monthly_report_children_siblink', function(){
            $("#monthly_report_children").toggle();
            $("#monthly_report_children2").toggle();
            $(".monthly_report_children_siblink3").toggle();
            $(".monthly_report_children_siblink4").toggle();
            $('.monthly_report_children_siblink2').toggleClass('select-bg');
        });

        // Daily Report
        $("#daily_report_children").show();
        $("#daily_report_children2").hide();
        $(".daily_report_children_siblink3").hide();
        $(".daily_report_children_siblink4").hide();

        $(document).on('click', 'td.daily_report_children_siblink', function(){
            $("#daily_report_children").toggle();
            $("#daily_report_children2").toggle();
            $(".daily_report_children_siblink3").toggle();
            $(".daily_report_children_siblink4").toggle();
            $('.daily_report_children_siblink2').toggleClass('select-bg');
        });

    });
</script>

