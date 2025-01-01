<?php

namespace Database\Seeders;
use App\Models\Module\ModuleName;
use Illuminate\Database\Seeder;

class ModuleNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
            array('module_name' => 'Admin', 'created_at' => '2024-12-31 11:59:02', 'updated_at' => '2024-12-31 11:59:02'),
            array('module_name' => 'Sub-Admin', 'created_at' => '2024-12-31 11:59:02', 'updated_at' => '2024-12-31 11:59:02'),
            array('module_name' => 'Accounts-Admin', 'created_at' => '2024-12-31 11:59:02', 'updated_at' => '2024-12-31 11:59:02'),
            array('module_name' => 'Accounts', 'created_at' => '2024-12-31 11:59:02', 'updated_at' => '2024-12-31 11:59:02'),
            array('module_name' => 'Accountant', 'created_at' => '2024-12-31 11:59:02', 'updated_at' => '2024-12-31 11:59:02'),
            array('module_name' => 'Marketing-Admin', 'created_at' => '2024-12-31 11:59:02', 'updated_at' => '2024-12-31 11:59:02'),
            array('module_name' => 'Marketing', 'created_at' => '2024-12-31 11:59:02', 'updated_at' => '2024-12-31 11:59:02'),
            array('module_name' => 'HRM-Admin', 'created_at' => '2024-12-31 11:59:02', 'updated_at' => '2024-12-31 11:59:02'),
            array('module_name' => 'HRM', 'created_at' => '2024-12-31 11:59:02', 'updated_at' => '2024-12-31 11:59:02'),
            array('module_name' => 'Delivery-Admin', 'created_at' => '2024-12-31 11:59:02', 'updated_at' => '2024-12-31 11:59:02'),
            array('module_name' => 'Delivery', 'created_at' => '2024-12-31 11:59:02', 'updated_at' => '2024-12-31 11:59:02'),
            array('module_name' => 'Inventory', 'created_at' => '2024-12-31 11:59:02', 'updated_at' => '2024-12-31 11:59:02'),
            array('module_name' => 'Stock', 'created_at' => '2024-12-31 11:59:02', 'updated_at' => '2024-12-31 11:59:02'),
            array('module_name' => 'Customer', 'created_at' => '2024-12-31 11:59:02', 'updated_at' => '2024-12-31 11:59:02'),
            array('module_name' => 'Supplier', 'created_at' => '2024-12-31 11:59:02', 'updated_at' => '2024-12-31 11:59:02'),
            array('module_name' => 'Report', 'created_at' => '2024-12-31 11:59:02', 'updated_at' => '2024-12-31 11:59:02'),
            array('module_name' => 'Data-table', 'created_at' => '2024-12-31 11:59:02', 'updated_at' => '2024-12-31 11:59:02'),
            array('module_name' => 'Post', 'created_at' => '2024-12-31 11:59:02', 'updated_at' => '2024-12-31 11:59:02'),
            array('module_name' => 'Invoice', 'created_at' => '2024-12-31 11:59:02', 'updated_at' => '2024-12-31 11:59:02'),
            array('module_name' => 'Voucher', 'created_at' => '2024-12-31 11:59:02', 'updated_at' => '2024-12-31 11:59:02'),
            array('module_name' => 'File-Manager', 'created_at' => '2024-12-31 11:59:02', 'updated_at' => '2024-12-31 11:59:02'),
        ];
        ModuleName::insert($data);
    }
}
