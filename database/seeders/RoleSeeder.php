<?php

namespace Database\Seeders;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
            array('id' => '0','name' => 'User'),
            array('id' => '1','name' => 'Super Admin'),
            array('id' => '2','name' => 'Sub Admin'),
            array('id' => '3','name' => 'Admin'),
            array('id' => '5','name' => 'Accounts'),
            array('id' => '6','name' => 'Marketing'),
            array('id' => '7','name' => 'Delevery Team'),
            array('id' => '8','name' => 'Accounts Admin'),
            array('id' => '9','name' => 'Marketing Admin'),
            array('id' => '10','name' => 'HRM'),
            array('id' => '11','name' => 'HRM Admin'),
            array('id' => '12','name' => 'Transport'),
            array('id' => '13','name' => 'Transport Admin'),
            array('id' => '14','name' => 'Supplier Chain'),
        ];
        Role::insert($data);
    }
}