<?php

namespace Database\Seeders\Product;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['category_name' => 'Fashison', 'status' => 1, 'created_at' => Carbon::now(), 'updated_at' =>  Carbon::now() ],
            ['category_name' => 'Medicine', 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now() ],
            ['category_name' => 'Electronic', 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now() ],
            ['category_name' => 'Food', 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now() ],
            ['category_name' => 'Garments', 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now() ],
            ['category_name' => 'Animal-Product', 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now() ],
            ['category_name' => 'Sport', 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now() ],
            ['category_name' => 'Interior', 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now() ],
            ['category_name' => 'Industrial Equipment', 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now() ],
            ['category_name' => 'Baby-Food', 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now() ],
        ];

        Category::insert($data);
    }
}
