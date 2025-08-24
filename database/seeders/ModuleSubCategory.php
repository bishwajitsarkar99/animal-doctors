<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module\CategoryModule;
use App\Models\Module\SubCategoryModule;
use Carbon\Carbon;

class ModuleSubCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * 
     * Sub Category Modules
     */
    public function run()
    {
        $data = [
            // Purchases Management(Sub Category Modules)
            array('sub_module_name'=>'Product', 'category_module_id'=> 1, 'status'=> 1, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('sub_module_name'=>'Stock', 'category_module_id'=> 1, 'status'=> 1, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('sub_module_name'=>'Supplier', 'category_module_id'=> 1, 'status'=> 1, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('sub_module_name'=>'Inventory', 'category_module_id'=> 1, 'status'=> 1, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Accounts Management(Sub Category Modules)
            array('sub_module_name'=>'Lager', 'category_module_id'=> 2, 'status'=> 1, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('sub_module_name'=>'Sales', 'category_module_id'=> 2, 'status'=> 1, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('sub_module_name'=>'Vaoucher', 'category_module_id'=> 2, 'status'=> 1, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('sub_module_name'=>'Asset', 'category_module_id'=> 2, 'status'=> 1, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('sub_module_name'=>'Report', 'category_module_id'=> 2, 'status'=> 1, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // HRM Management(Sub Category Modules)
            array('sub_module_name'=>'Hrm', 'category_module_id'=> 3, 'status'=> 1, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Authentication(Sub Category Modules)
            array('sub_module_name'=>'Auth', 'category_module_id'=> 6, 'status'=> 1, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('sub_module_name'=>'Layout', 'category_module_id'=> 7, 'status'=> 1, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('sub_module_name'=>'Fornt-End', 'category_module_id'=> 8, 'status'=> 1, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('sub_module_name'=>'Setting', 'category_module_id'=> 9, 'status'=> 1, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Pivot-Table(Sub Category Modules)
            array('sub_module_name'=>'Pivot-Tables', 'category_module_id'=> 10, 'status'=> 1, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Item(Sub Category Modules)
            array('sub_module_name'=>'Iteams', 'category_module_id'=> 12, 'status'=> 1, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Order(Sub Category Modules)
            array('sub_module_name'=>'Orders', 'category_module_id'=> 11, 'status'=> 1, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Language(Sub Category Modules)
            array('sub_module_name'=>'Language', 'category_module_id'=> 13, 'status'=> 1, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Memory(Sub Category Modules)
            array('sub_module_name'=>'Memories', 'category_module_id'=> 14, 'status'=> 1, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Profile(Sub Category Modules)
            array('sub_module_name'=>'Profile', 'category_module_id'=> 15, 'status'=> 1, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),

        ];

        SubCategoryModule::insert($data);
    }
}
