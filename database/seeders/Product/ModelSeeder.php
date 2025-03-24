<?php

namespace Database\Seeders\Product;
use Illuminate\Database\Seeder;
use App\Models\ProductModel;
use Carbon\Carbon;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['model_name' => 'M-65', 'product_id' => 2, 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now() ],
            ['model_name' => 'Pantone-160', 'product_id' => 1, 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now() ],
        ];

        ProductModel::insert($data);
    }
}
