<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module\CategoryModule;
use Carbon\Carbon;

class ModuleCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
            array('module_category_name' => 'Purchases Management', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('module_category_name' => 'Accounts Management', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('module_category_name' => 'HRM Management', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('module_category_name' => 'Marketing Management', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('module_category_name' => 'Delivery Team', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('module_category_name' => 'Authentication', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('module_category_name' => 'Layout', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('module_category_name' => 'Fornt-End', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('module_category_name' => 'Settings', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('module_category_name' => 'Pivot-Table', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('module_category_name' => 'Order', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('module_category_name' => 'Item', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('module_category_name' => 'Language', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('module_category_name' => 'Memory', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('module_category_name' => 'Profile', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('module_category_name' => 'Email', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
        ];
        CategoryModule::insert($data);
    }
}
