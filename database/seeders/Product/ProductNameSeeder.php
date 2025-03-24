<?php

namespace Database\Seeders\Product;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Carbon\Carbon;

class ProductNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['product_name' => 'Pantone Book', 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now() ],
            ['product_name' => 'Tube Light', 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now() ],
        ];

        Product::insert($data);
    }
}
