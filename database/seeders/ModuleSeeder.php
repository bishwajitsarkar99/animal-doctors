<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module\Module;
use Carbon\Carbon;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            // Product
            array('module_name'=>'Category', 'sub_module_id'=> 1, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Sub Category', 'sub_module_id'=> 1, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Group', 'sub_module_id'=> 1, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Product', 'sub_module_id'=> 1, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Model', 'sub_module_id'=> 1, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'All Units', 'sub_module_id'=> 1, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Brand', 'sub_module_id'=> 1, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Medicine
            array('module_name'=>'Medicine Name', 'sub_module_id'=> 21, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_'=>'Medicine Dosage', 'sub_module_id'=> 21, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Medicine Origin', 'sub_module_id'=> 21, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // stock
            array('module_name'=>'Stock-Book', 'sub_module_id'=> 2, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Stock-Adjustment', 'sub_module_id'=> 2, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Damage-Stock', 'sub_module_id'=> 2, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Stock-Summary', 'sub_module_id'=> 2, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Stock-Reprot', 'sub_module_id'=> 2, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Inventory
            array('module_name'=>'Inventory Details', 'sub_module_id'=> 4, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Inventory Setting', 'sub_module_id'=> 4, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Supplier
            array('module_name'=>'Create', 'sub_module_id'=> 3, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Record', 'sub_module_id'=> 3, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Requistion', 'sub_module_id'=> 3, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Setting', 'sub_module_id'=> 3, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Accounts Lager
            array('module_name'=>'Entry Day-Book', 'sub_module_id'=> 5, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Entry View-Book', 'sub_module_id'=> 5, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Setting Day-Book', 'sub_module_id'=> 5, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Expenses Book
            array('module_name'=>'Type Of Expenses', 'sub_module_id'=> 5, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Add Expenses', 'sub_module_id'=> 5, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'List Of Expenses', 'sub_module_id'=> 5, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Expenses Setting', 'sub_module_id'=> 5, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Customer
            array('module_name'=>'Add Customer', 'sub_module_id'=> 5, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Customer Due List', 'sub_module_id'=> 5, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Customer Details', 'sub_module_id'=> 5, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Customer Setting', 'sub_module_id'=> 5, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Bank
            array('module_name'=>'Add List', 'sub_module_id'=> 5, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Bank Transaction', 'sub_module_id'=> 5, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Details Record', 'sub_module_id'=> 5, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Setting', 'sub_module_id'=> 5, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Petty Cash
            array('module_name'=>'Petty Cash Entry', 'sub_module_id'=> 5, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'All Trnasaction', 'sub_module_id'=> 5, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Petty Cash Details', 'sub_module_id'=> 5, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Petty Cash Setting', 'sub_module_id'=> 5, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Tax/Vat
            array('module_name'=>'Add Tax/Vat', 'sub_module_id'=> 5, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'List Of Tax/Vat', 'sub_module_id'=> 5, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Details Record', 'sub_module_id'=> 5, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Setting Tax/Vat', 'sub_module_id'=> 5, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Sales(Order)
            array('module_name'=>'Add Order', 'sub_module_id'=> 6, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Order List', 'sub_module_id'=> 6, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Order Setting', 'sub_module_id'=> 6, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Sales(Invoice)
            array('module_name'=>'Add Invoice', 'sub_module_id'=> 6, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Invoice Setting', 'sub_module_id'=> 6, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Sales(Sales Region)
            array('module_name'=>'Sales Region List', 'sub_module_id'=> 6, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Region Base Sales', 'sub_module_id'=> 6, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Setting', 'sub_module_id'=> 6, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Vaoucher(Category)
            array('module_name'=>'Vaoucher Category Create', 'sub_module_id'=> 7, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Vaoucher Category List', 'sub_module_id'=> 7, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Vaoucher
            array('module_name'=>'Add Vaoucher', 'sub_module_id'=> 7, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Vaoucher Details', 'sub_module_id'=> 7, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Vaoucher Setting', 'sub_module_id'=> 7, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Asset(New Asset)
            array('module_name'=>'Create Asset', 'sub_module_id'=> 5, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Asset List', 'sub_module_id'=> 5, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Asset(Details)
            array('module_name'=>'Previous Asset', 'sub_module_id'=> 8, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Current Asset', 'sub_module_id'=> 8, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Asset Details', 'sub_module_id'=> 8, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Asset Setting', 'sub_module_id'=> 8, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Report(Accounting)
            array('module_name'=>'Blance Sheet', 'sub_module_id'=> 9, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Trial Blance Sheet', 'sub_module_id'=> 9, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Financial Statement', 'sub_module_id'=> 9, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Income Statement', 'sub_module_id'=> 9, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Cash Flow Statement', 'sub_module_id'=> 9, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Petty Cash Statement', 'sub_module_id'=> 9, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'P/L Statement', 'sub_module_id'=> 9, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Tabular Analycis', 'sub_module_id'=> 9, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Blance Sheet Table', 'sub_module_id'=> 9, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Setting', 'sub_module_id'=> 9, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Report(Mothly)
            array('module_name'=>'Monthly Report View', 'sub_module_id'=> 9, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Setting', 'sub_module_id'=> 9, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Report(Daily)
            array('module_name'=>'Daily Report View', 'sub_module_id'=> 9, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Setting', 'sub_module_id'=> 9, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // HRM Management(Employee)
            array('module_name'=>'Add Information', 'sub_module_id'=> 10, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Add Experience', 'sub_module_id'=> 10, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Add Employee', 'sub_module_id'=> 10, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Employee List', 'sub_module_id'=> 10, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Setting', 'sub_module_id'=> 10, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // HRM Management(Employee Profile)
            array('module_name'=>'Employee Profile', 'sub_module_id'=> 10, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // HRM Management(Employee Salary Payment)
            array('module_name'=>'Add Salary', 'sub_module_id'=> 10, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Salary Payment', 'sub_module_id'=> 10, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Salary Record', 'sub_module_id'=> 10, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Setting', 'sub_module_id'=> 10, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // HRM Management(Employee Performance)
            array('module_name'=>'Employee Performance', 'sub_module_id'=> 10, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Setting', 'sub_module_id'=> 10, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // HRM Management(Employee Attendence)
            array('module_name'=>'Employee Attendence', 'sub_module_id'=> 10, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Setting', 'sub_module_id'=> 10, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // HRM Management(Employee Record)
            array('module_name'=>'Employee Details', 'sub_module_id'=> 10, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Setting', 'sub_module_id'=> 10, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Auth(Authentication)
            array('module_name'=>'Account-History', 'sub_module_id'=> 11, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Email Verification', 'sub_module_id'=> 11, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Role Promot', 'sub_module_id'=> 11, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Role Permission', 'sub_module_id'=> 11, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Manage Role', 'sub_module_id'=> 11, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'User Authorize', 'sub_module_id'=> 11, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Auth(Permission)
            array('module_name'=>'User Permission', 'sub_module_id'=> 11, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Auth Page', 'sub_module_id'=> 11, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Auth(User All Details)
            array('module_name'=>'User All Details', 'sub_module_id'=> 11, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Auth(Branch)
            array('module_name'=>'Admin Access', 'sub_module_id'=> 11, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'User Access', 'sub_module_id'=> 11, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Setting', 'sub_module_id'=> 11, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Auth(Log Activity)
            array('module_name'=>'User Log Activity', 'sub_module_id'=> 11, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Layout
            array('module_name'=>'File Manager', 'sub_module_id'=> 12, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Fornt-End
            array('module_name'=>'Add Header', 'sub_module_id'=> 13, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Add Top-Bar', 'sub_module_id'=> 13, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Add Nav-Bar', 'sub_module_id'=> 13, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // pages
            array('module_name'=>'Page One', 'sub_module_id'=> 13, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Page Two', 'sub_module_id'=> 13, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Page Three', 'sub_module_id'=> 13, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // post
            array('module_name'=>'Post One', 'sub_module_id'=> 13, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Post Two', 'sub_module_id'=> 13, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Post Three', 'sub_module_id'=> 13, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Setting
            array('module_name'=>'Company Information', 'sub_module_id'=> 13, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Payment Getway', 'sub_module_id'=> 13, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Features', 'sub_module_id'=> 13, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Content', 'sub_module_id'=> 13, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Footer
            array('module_name'=>'News Letter', 'sub_module_id'=> 13, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Application Setting
            array('module_name'=>'Post Setting', 'sub_module_id'=> 14, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'App Setting', 'sub_module_id'=> 14, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Pivot Tables
            array('module_name'=>'Order', 'sub_module_id'=> 15, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Sales', 'sub_module_id'=> 15, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Expenses', 'sub_module_id'=> 15, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Supplier', 'sub_module_id'=> 15, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Item(Product Quotation)
            array('module_name'=>'Product Quotation', 'sub_module_id'=> 16, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Item(Post Component)
            array('module_name'=>'Post Category', 'sub_module_id'=> 16, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Post Sub Category', 'sub_module_id'=> 16, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Post Group', 'sub_module_id'=> 16, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'Post Setting', 'sub_module_id'=> 16, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Order Menu
            array('module_name'=>'Orders', 'sub_module_id'=> 17, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Language
            array('module_name'=>'Language', 'sub_module_id'=> 18, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Memory
            array('module_name'=>'RAM', 'sub_module_id'=> 19, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_name'=>'ROM', 'sub_module_id'=> 19, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Profile
            array('module_name'=>'Profile', 'sub_module_id'=> 20, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Send Email
            array('module_name'=>'Send Email', 'sub_module_id'=> 22, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
        ];

        Module::insert($data);
    }
}
