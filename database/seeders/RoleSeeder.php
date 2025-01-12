<?php

namespace Database\Seeders;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            array('id' => '0','name' => 'User', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('id' => '1','name' => 'Super Admin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('id' => '2','name' => 'Sub Admin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('id' => '3','name' => 'Admin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('id' => '5','name' => 'Accounts', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('id' => '6','name' => 'Marketing', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('id' => '7','name' => 'Delivery Team', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('id' => '8','name' => 'Accounts Admin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('id' => '9','name' => 'Marketing Admin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('id' => '10','name' => 'HRM', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('id' => '11','name' => 'HRM Admin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('id' => '12','name' => 'Transport', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('id' => '13','name' => 'Transport Admin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('id' => '14','name' => 'Supplier Chain', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('id' => '15','name' => 'Purchases', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('id' => '16','name' => 'Purchases Admin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('id' => '17','name' => 'Inventory', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('id' => '18','name' => 'Inventory Admin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('id' => '19','name' => 'Cashier', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('id' => '20','name' => 'Store Keeper', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('id' => '21','name' => 'Costing Department', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
        ];
        Role::insert($data);
    }
}