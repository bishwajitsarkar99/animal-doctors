<?php

namespace Database\Seeders\Product;
use Illuminate\Database\Seeder;
use App\Models\Unit;
use Carbon\Carbon;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['units_name' => 'Box', 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now() ],
            ['units_name' => 'Carton', 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now() ],
            ['units_name' => 'Pics', 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now() ],
            ['units_name' => 'Bag', 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now() ],
            ['units_name' => 'Kg', 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now() ],
        ];

        Unit::insert($data);
    }
}
