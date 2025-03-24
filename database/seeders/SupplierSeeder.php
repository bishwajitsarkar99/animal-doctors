<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Support\Facades\Supplier;
use Carbon\Carbon;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['branch_id' => '', 'branch_category' => '', 'type' => '', 'bussiness_type' => '', 'name' => '', 'office_address' => '', 'current_address' => '', 'contact_number_one' => '', 'contact_number_two' => '', 'whatsapp_number' => '', 'email' => '', 'supplier_status' => '', 'supplier_access_date' => '', 'supplier_deny_date' => '', 'created_by' => '', 'updated_by' => '', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['branch_id' => '', 'branch_category' => '', 'type' => '', 'bussiness_type' => '', 'name' => '', 'office_address' => '', 'current_address' => '', 'contact_number_one' => '', 'contact_number_two' => '', 'whatsapp_number' => '', 'email' => '', 'supplier_status' => '', 'supplier_access_date' => '', 'supplier_deny_date' => '', 'created_by' => '', 'updated_by' => '', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];
        Supplier::insert($data);
    }
    // Use insert to add multiple records [ use the command : php artisan db:seed --class=SupplierSeeder]
}
