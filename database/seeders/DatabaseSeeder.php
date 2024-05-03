<?php

namespace Database\Seeders;

use Database\Seeders\LogoSeeder;
use Illuminate\Database\Seeder;
use App\Support\Facades\Setting;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        setting([
            // Profile---------
            'company_name' => 'GST Medicine Center',
            'company_address' => 'House-42, Road-22, Sector-14, Uttara, Dhaka-1200.',
            'update_company_logo'=>'logo-bg-white.png',
            'update_slider1'=>'e-shop.jpg',
            'update_slider2'=>'office.jpg',
            'update_slider3'=>'report.jpg',
            // Page-----------
            'login_page_title' => 'Admin-Login',
            'page_sub_title' => 'sub title',
            'register_page_title'=>'User Register',
            'register_page_sub_title'=>'Sub Title',
            'forgot_page_title'=>'Forgot-Password',
            'forgot_page_sub_title'=>'Sub Title',
            'reset_page_title'=>'Reset-Password',
            'reset_page_sub_title'=>'Sub Title',
            // Social Media
            'update_social_media_facebook_link'=>'https://www.facebook.com/',
            'update_social_media_messanger_link'=>'https://www.messenger.com/',
            'update_social_media_whatsapp_link'=>'https://web.whatsapp.com/',
            'update_social_media_linkedin_link'=>'https://www.linkedin.com/learning-login',
            'update_social_media_facebook'=>'facebook.png',
            'update_social_media_messanger'=>'facebook-messenger.png',
            'update_social_media_whatsapp'=>'whatsapp.png',
            'update_social_media_linkedin'=>'#',
            // Purchases Moduel
            'purches_moduel_title' => 'Purchases Dept.',
            'product_title' => 'Product',
            'purchases_visual' => 'purchases_block',
            'product_visual' => 'product_block',
            // Category
            'categ_title_visual' => 'categ_title_block',
            'category_title' => 'Category',
            'add_category_title' => 'ADD Category',
            'add_category_title' => 'ADD Category',
            'category_link' => 'http://127.0.0.1:8000/category',
            'category_visual' => 'category_url_block',
            // Sub Category
            'sub_category_name' => 'Sub Category',
            'sub_categ_title_visual' => 'subcateg_title_block',
            'sub_category_title_text' => 'ADD Sub Category',
            'subcategory_link' => 'http://127.0.0.1:8000/sub-category',
            'subcategory_visual' => 'subcateg_url_block',
            // Group
            'group_name'=> 'Group',
            'group_title_visual'=> 'group_title_block',
            'add_group_title'=> 'ADD Group',
            'product_group_link'=> 'http://127.0.0.1:8000/medicine-group',
            'group_visual'=> 'group_url_block',
            // Medicine name
            'medicine_name' => 'Medicine',
            'medicine_title_visual' => 'medicine_block',
            'add_medicine_title' => 'ADD Name',
            'medicine_group_link' => 'http://127.0.0.1:8000/medicine-name',
            'medicine_visual' => 'medicine_name_url_block',
            // Medicine dosage
            'add_medicine_dosage_title' => 'ADD Dosage',
            'medicine_dosage_link' => 'http://127.0.0.1:8000/medicine-dosage',
            'medicine_dosage_visual' => 'medicine_dosage_url_block',
            // Medicine origin
            'add_medicine_origin_title' => 'ADD Origin',
            'medicine_oriign_link' => 'http://127.0.0.1:8000/origin',
            'medicine_origin_visual' => 'medicine_origin_url_block',
            // Product Model
            'product_model_title' =>'Model',
            'product_model_title_display' =>'model_block',
            'add_model_title' =>'ADD Model',
            'model_link' =>'http://127.0.0.1:8000/model',
            'model_visual' =>'product_model_url_block',
            // Product Size or Unit
            'unit_title'=>'Unit',
            'unit_title_display'=>'unit_block',
            'add_unit_title'=>'ADD Unit',
            'unit_link'=>'http://127.0.0.1:8000/units',
            'unit_visual'=>'unit_url_block',
            // Brand
            'brand_title'=>'Brand',
            'brand_title_display'=>'brand_block',
            'add_brand_title'=>'ADD Brand',
            'brand_link'=>'http://127.0.0.1:8000/brand',
            'brand_visual'=>'brand_url_block',
            // Product
            'product'=>'Product',
            'product_title_display'=>'products_block',
            'add_Prodcut_title'=>'ADD Product',
            'product_link'=>'http://127.0.0.1:8000/product',
            'product_visual_'=>'product_url_block',
            // Stock
            'stock_head_title'=>'Stock',
            'stock_head_title_display'=>'stock_block',
            'stock_title'=>'Stock',

            'stock_title_display'=>'stock_title_block',
            'stock_book_title'=>'Stock-Book',
            'stock_book_link'=>'http://127.0.0.1:8000/stock-book',
            'stock_book_visual'=>'stock_book_url_block',

            'add_adjustment_title'=>'Stock-Adjustment',
            'adjustment_link'=>'http://127.0.0.1:8000/stock-adjustment',
            'adjustment_visual'=>'adjustment_url_block',

            'add_dmage_stock_title'=>'Damage-Stock',
            'damage_stock_link'=>'http://127.0.0.1:8000/damge-stock',
            'damage_stock_visual'=>'damage_url_block',

            'add_stock_summary_title'=>'Stock-Summary',
            'stock_summary_link'=>'http://127.0.0.1:8000/stock-summary',
            'stock_summary_visual'=>'summary_url_block',

            'add_stock_report_title'=>'Stock-Report',
            'stock_report_link'=>'http://127.0.0.1:8000/stock-report',
            'stock_report_visual'=>'report_url_block',

            // Inventory
            'inventory_title'=>'Inventory',
            'invnetory_title_display'=>'inventory_block',
            'invnetory_details_title'=>'Inventory Details',
            'inventory_details_link'=>'#',
            'inventory_details_visual'=>'inventory_url_block',

            'authorization_title'=>'Authorize',
            'authorization_link'=>'http://127.0.0.1:8000/super-admin/inventory-authorize',
            'inventory_visual'=>'authorize_url_block',

            // Supplier
            'supplier_title'=>'Supplier',
            'supplier_title_visual'=>'supplier_block',
            'add_supplier_setup_title'=>'Supplier-Setup',
            'supplier_setup_link'=>'http://127.0.0.1:8000/supplier',
            'supplier_setup_display'=>'supplier_setup_block',
            'suppiler_setup_title'=>'Details Record',
            'supplier_details_setup_link'=>'#',
            'supplier_details_display'=>'supplier_details_display_block',
            'supplier_requisition_title'=>'Supplier Requisition',
            'supplier_requisition_link'=>'#',
            'supplier_requisition_display'=>'supplier_requisition_url_block',

            // Accounts Moduel
            'accounts_moduel_title'=>'Accounts Dept.',
            'accounts_moduel_display'=>'accounts_moduel_block',
            // Lager
            'lager_title'=>'Lager',
            'lager_display'=>'lager_block',
            // Dary Book
            'day_book_title'=>'Day Book',
            'day_book_title_display'=>'day_book_title_block',
            'day_book_entry_title'=>'Entry Day-Book',
            'day_book_entry_link'=>'#',
            'day_book_entry_visual'=>'entry_day_book_url_block',
            'day_book_view_title'=>'View Day-Book',
            'day_book_view_link'=>'#',
            'day_book_view_visual'=>'day_book_view_url_block',
            'day_book_set_title'=>'Setting Day-Book',
            'day_book_setting_link'=>'#',
            'day_book_setting_visual'=>'setting_day_book_url_block',
            // Expenses
            'expenses_title'=>'Expenses',
            'expenses_title_display'=>'expenses_block',
            'type_of_expenses_entry_title'=>'Type Of Expenses',
            'type_of_expenses_link'=>'#',
            'type_of_expenses_visual'=>'type_of_expenses_url_block',
            'add_expenses_title'=>'ADD Expenses',
            'add_expenses_link'=>'#',
            'add_expenses_visual'=>'expenses_url_block',
            'list_expenses_title'=>'List Of Expenses',
            'list_expenses_link'=>'#',
            'list_expenses_visual'=>'list_of_expenses_url_block',
            'setting_expenses_title'=>'Expenses Setting',
            'setting_expenses_link'=>'#',
            'setting_expenses_visual'=>'expenses_setting_url_block',
            // Customer
            'customer_title'=>'Customer',
            'customer_title_display'=>'customer_block',
            'add_customer_title'=>'ADD Customer',
            'add_customer_link'=>'#',
            'customer_visual'=>'customer_url_block',
            'customer_due_title'=>'Customer Due List',
            'customer_due_link'=>'#',
            'customer_due_visual'=>'customer_due_url_block',
            'customer_details_title'=>'Customer Details Record',
            'customer_details_link'=>'#',
            'customer_details_visual'=>'customer_details_block',
            'customer_setting_title'=>'Custoemr Setting',
            'customer_setting_link'=>'#',
            'customer_setting_visual'=>'customer_setting_url_block',
            // Petty Cash
            'petty_cash_title'=>'Petty-Cash',
            'petty_cash_title_display'=>'petty_cash_block',
            'add_petty_cash_title'=>'Petty Cash Entry',
            'add_petty_cash_link'=>'#',
            'petty_cash_visual'=>'petty_cash_url_block',
            'all_transaction_title'=>'All Transaction',
            'all_transaction_link'=>'#',
            'all_transaction_visual'=>'all_transaction_url_block',
            'petty_cash_details_title'=>'Petty Cash Details',
            'petty_cash_details_link'=>'#',
            'petty_cash_details_visual'=>'petty_cash_details_block',
            'petty_cash_setting_title'=>'Petty Cash Setting',
            'petty_cash_setting_link'=>'#',
            'petty_cash_setting_visual'=>'petty_cash_setting_url_block',
            // Bank
            'bank_title'=>'Bank',
            'bank_title_display'=>'bank_block',
            'add_list_title'=>'List',
            'add_list_link'=>'#',
            'list_visual'=>'list_url_block',
            'bank_transaction_title'=>'Bank Transaction',
            'bank_transaction_link'=>'#',
            'bank_transaction_visual'=>'bank_transaction_url_block',
            'details_record_title'=>'Details Record',
            'details_record_link'=>'#',
            'details_record_visual'=>'details_record_url_block',
            'bank_setting_title'=>'Setting',
            'bank_setting_link'=>'#',
            'bank_setting_visual'=>'setting_url_block',
            // Tax/Vat
            'tax_vat_title'=>'Tax/Vat',
            'tax_vat_title_display'=>'tax_vat_block',
            'add_tax_vat_title'=>'ADD Tax/Vat',
            'add_tax_vat_link'=>'#',
            'tax_vat_visual'=>'tax_vat_url_block',
            'list_vat_tax_title'=>'List Of Tax/Vat',
            'list_vat_tax_link'=>'#',
            'list_vat_tax_visual'=>'list_vat_tax_url_block',
            'details_records_title'=>'Details Record',
            'details_records_link'=>'#',
            'details_records_visual'=>'details_rocord_url_block',
            'vat_tax_setting_title'=>'Setting Tax/Vat',
            'vat_tax_setting_link'=>'#',
            'vat_tax_setting_visual'=>'vat_tax_setting_url_block',
            // Sales
            'sales_title'=>'Sales',
            'sales_title_display'=>'sales_block',
            // Order
            'order_title'=>'Orders',
            'order_title_display'=>'order_block',
            'add_order_title'=>'ADD Order',
            'add_order_link'=>'#',
            'order_visual'=>'order_url_block',
            'order_list_title'=>'Order List',
            'order_list_link'=>'#',
            'order_list_visual'=>'order_list_url_block',
            'order_setting_title'=>'Order Setting',
            'order_setting_link'=>'#',
            'order_setting_visual'=>'order_setting_url_block',
            // Invoice
            'invoice_title'=>'Invoice',
            'invoice_title_display'=>'invoice_block',
            'add_invoice_title'=>'ADD Invoice',
            'add_invoice_link'=>'#',
            'invoice_visual'=>'invoice_url_block',
            'invocie_setting_title'=>'Invoice Setting',
            'invoice_setting_link'=>'#',
            'invoice_setting_visual'=>'invoice_setting_block',
            // Sales-Region
            'sales_region_title'=>'Sales-Region',
            'sales_region_title_display'=>'sales_region_block',
            'sales_region_list_title'=>'Sales Region List',
            'sales_region_list_link'=>'#',
            'sales_region_list_visual'=>'sales_region_url_block',
            'region_base_sales_title'=>'Region Base Sales',
            'region_base_sales_link'=>'#',
            'region_base_sales_visual'=>'region_base_sales_url_block',
            'region_sales_setting_title'=>'Setting',
            'region_sales_setting_link'=>'#',
            'region_sales_setting_visual'=>'region_sales_setting_url_block',
            // Vaoucher
            'vaoucher_title'=>'Vaoucher',
            'vaoucher_title_display'=>'vaoucher_block',
            // Vaoucher Category
            'vaoucher_category_title'=>'Category',
            'vaoucher_category_title_display'=>'category_block',
            'vaoucherCategy_title'=>'Vaoucher Category',
            'vaoucherCategy_link'=>'#',
            'vaoucherCategy_visual'=>'vaoucher_category_block',
            'vaoucher_list_title'=>'Vaoucher List',
            'vaoucher_list_link'=>'#',
            'vaoucher_list_visual'=>'vaoucher_list_block',
            // Vaoucher Setting
            'main_vaoucher_title'=>'Vaoucher',
            'main_vaoucher_title_display'=>'vaoucher_display_block',
            'add_vaoucher_title'=>'ADD Vaoucher',
            'add_vaoucher_link'=>'#',
            'add_vaoucher_visual'=>'add_voucher_url_block',
            'vaoucher_details_title'=>'Vaoucher Details',
            'vaoucher_details_link'=>'#',
            'vaoucher_details_visual'=>'vaoucher_details_url_block',
            'vaoucher_setting_title'=>'Vaoucher Setting',
            'vaoucher_setting_link'=>'#',
            'vaoucher_setting_visual'=>'vaoucher_setting_url_block',
            // Asset
            'asset_title'=>'Asset',
            'asset_title_display'=>'asset_block',
            // New Asset
            'new_asset_title'=>'New Asset',
            'new_asset_title_display'=>'new_asset_block',
            'add_asset_title'=>'Create Asset',
            'add_asset_link'=>'#',
            'add_asset_visual'=>'add_asset_block',
            'asset_details_title'=>'Asset List',
            'asset_details_link'=>'#',
            'asset_details_visual'=>'asset_list_visual_block',
            // Asset-Details
            'details_asset_title'=>'Details',
            'details_asset_title_display'=>'details_block',
            'previous_asset_title'=>'Previous Asset',
            'previous_asset_link'=>'#',
            'previous_asset_visual'=>'previous_asset_url_block',
            'current_asset_title'=>'Current Asset',
            'current_asset_link'=>'#',
            'current_asset_visual'=>'current_asset_url_block',
            'asset_detls_title'=>'Asset Details',
            'asset_detls_link'=>'#',
            'aasset_detls_visual'=>'asset_details_url_block',
            'asset_setting_title'=>'Asset Setting',
            'asset_setting_link'=>'#',
            'asset_setting_visual'=>'asset_setting_block',
            // Report
            'report_title'=>'Report',
            'report_title_display'=>'report_block',
            // Accounting Report
            'acc_report_title'=>'Accounting Report',
            'acc_report_title_display'=>'accounting_report_block',
            'blance_sheet_title'=>'Blance Sheet',
            'blance_sheet_link'=>'#',
            'blance_sheet_visual'=>'blance_sheet_url_block',
            'trial_blance_sheet_title'=>'Trial Blance Sheet',
            'trial_blance_sheet_link'=>'#',
            'trial_blance_sheet_visual'=>'trial_blance_sheet_url_block',
            'financial_statement_title'=>'Financial Statement',
            'financial_statement_link'=>'#',
            'financial_statement_visual'=>'financial_statement_url_block',
            'income_statement_title'=>'Income Statement',
            'income_statement_link'=>'#',
            'income_statement_visual'=>'income_statement_url_block',
            'cash_flow_statement_title'=>'Cash Flow Statement',
            'cash_flow_statement_link'=>'#',
            'cash_flow_statement_visual'=>'cash_flow_statement_url_block',
            'petty_cash_statement_title'=>'Petty Cash Statement',
            'petty_cash_statement_link'=>'#',
            'petty_cash_statement_visual'=>'petty_cash_statement_url_block',
            'p_l_statement_title'=>'P/L Statement',
            'p_l_statement_link'=>'#',
            'p_l_statement_visual'=>'p_l_statement_url_block',
            'tabular_analycis_title'=>'Tabular Analycis',
            'tabular_analycis_link'=>'#',
            'tabular_analycis_visual'=>'tabular_analycis',
            'table_blance_sheet_title'=>'Table Of Blance Sheet',
            'table_blance_sheet_link'=>'#',
            'table_blance_sheet_visual'=>'table_of_blance_sheet_url_block',
            'report_setting_title'=>'Setting',
            'report_setting_link'=>'#',
            'report_setting_visual'=>'setting_url_block',
            // Monthly Report
            'acc_monthly_report_title'=>'Monthly Report',
            'acc_monthly_report_title_display'=>'monthly_report_block',
            'monthly_report_view_title'=>'Monthly Report View',
            'monthly_report_view_link'=>'#',
            'monthly_report_view_visual'=>'monthly_report_url_block',
            'monthly_report_setting_title'=>'Setting',
            'monthly_report_setting_link'=>'#',
            'monthly_report_setting_visual'=>'setting_url_block',
            // Daily Report
            'daily_report_title'=>'Daily Report',
            'daily_report_title_display'=>'daily_report_block',
            'daily_report_view_title'=>'Daily Report View',
            'daily_report_view_link'=>'#',
            'daily_report_view_visual'=>'daily_report_view_url_block',
            'daily_report_setting_title'=>'Setting',
            'daily_report_setting_link'=>'#',
            'daily_report_setting_visual'=>'setting_url_block',
            // HRM Management
            'hrm_moduel_title'=>'HRM Management',
            'hrm_moduel_display'=>'hrm_modurl_block',
            'hrm_title'=>'HRM',
            'hrm_visual'=>'hrm_block',
            // Authentication
            'auth_moduel_title'=>'Authentication',
            'auth_moduel_display'=>'auth_moduel_block',
            'auth_title'=>'Auth',
            'auth_visual'=>'auth_visual_block',
            // Layouts
            'layouts_moduel_title'=>'Layouts',
            'layouts_moduel_display'=>'layouts_block',
            // Components
            'components_moduel_title'=>'Components',
            'components_moduel_display'=>'components_block',
            // Footer
            'footer_moduel_title'=>'Footer Menu Bar',
            'footer_moduel_display'=>'footer_menu_bar_block',
            // Topbar
            'topbar_moduel_display'=>'search_box_block',
            'topbar_searchbtn_moduel_display'=>'search_btn_block',
            // Navbar
            'navbar_stock_moduel_display'=>'nav_stock_block',
            'navbar_supplier_moduel_display'=>'nav_supplier_block',
            'navbar_pivot_moduel_display'=>'nav_pivot_blcok',
            'navbar_item_list_moduel_display'=>'nav_item_list_blcok',
            'navbar_order_box_moduel_display'=>'nav_order_blcok',
            'navbar_all_moduel_display'=>'nav_all_block',

        ]);

        $this->call(DemoSeeder::class);
        $this->call(FooterContentSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(LogoSeeder::class);

    }
    
}

