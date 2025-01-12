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
            array('module_category_name' => 'Index', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('module_category_name' => 'View', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('module_category_name' => 'Create', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('module_category_name' => 'Edit', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('module_category_name' => 'Update', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('module_category_name' => 'Delete', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('module_category_name' => 'Search', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('module_category_name' => 'Data Get', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('module_category_name' => 'Access', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('module_category_name' => 'Data Table', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('module_category_name' => 'Download', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('module_category_name' => 'File Manager', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('module_category_name' => 'Data Export', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('module_category_name' => 'Print', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('module_category_name' => 'PDF', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
        ];
        CategoryModule::insert($data);
    }
}
