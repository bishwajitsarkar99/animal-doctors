<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module\CategoryModule;

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
            array('module_category_name' => 'Index', 'created_at' => '2024-12-29 06:44:59', 'updated_at' => '2024-12-29 06:44:59'),
            array('module_category_name' => 'View', 'created_at' => '2024-12-29 06:44:59', 'updated_at' => '2024-12-29 06:44:59'),
            array('module_category_name' => 'Create', 'created_at' => '2024-12-29 06:44:59', 'updated_at' => '2024-12-29 06:44:59'),
            array('module_category_name' => 'Edit', 'created_at' => '2024-12-29 06:44:59', 'updated_at' => '2024-12-29 06:44:59'),
            array('module_category_name' => 'Update', 'created_at' => '2024-12-29 06:44:59', 'updated_at' => '2024-12-29 06:44:59'),
            array('module_category_name' => 'Delete', 'created_at' => '2024-12-29 06:44:59', 'updated_at' => '2024-12-29 06:44:59'),
            array('module_category_name' => 'Search', 'created_at' => '2024-12-29 06:44:59', 'updated_at' => '2024-12-29 06:44:59'),
            array('module_category_name' => 'Data Get', 'created_at' => '2024-12-29 06:44:59', 'updated_at' => '2024-12-29 06:44:59'),
            array('module_category_name' => 'Access', 'created_at' => '2024-12-29 06:44:59', 'updated_at' => '2024-12-29 06:44:59'),
            array('module_category_name' => 'Data Table', 'created_at' => '2024-12-29 06:44:59', 'updated_at' => '2024-12-29 06:44:59'),
            array('module_category_name' => 'Download', 'created_at' => '2024-12-29 06:44:59', 'updated_at' => '2024-12-29 06:44:59'),
            array('module_category_name' => 'File Manager', 'created_at' => '2024-12-29 06:44:59', 'updated_at' => '2024-12-29 06:44:59'),
            array('module_category_name' => 'Data Export', 'created_at' => '2024-12-29 06:44:59', 'updated_at' => '2024-12-29 06:44:59'),
            array('module_category_name' => 'Print', 'created_at' => '2024-12-29 06:44:59', 'updated_at' => '2024-12-29 06:44:59'),
            array('module_category_name' => 'PDF', 'created_at' => '2024-12-29 06:44:59', 'updated_at' => '2024-12-29 06:44:59'),
        ];
        CategoryModule::insert($data);
    }
}
