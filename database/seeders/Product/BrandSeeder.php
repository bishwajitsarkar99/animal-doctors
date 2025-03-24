<?php

namespace Database\Seeders\Product;
use Illuminate\Database\Seeder;
use App\Models\Brand;
use Carbon\Carbon;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['brand_name' => 'Pantone', 'origin_id' => 1, 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now()],
            ['brand_name' => 'Batone', 'origin_id' => 2, 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now()],
        ];

        Brand::insert($data);
    }
}
