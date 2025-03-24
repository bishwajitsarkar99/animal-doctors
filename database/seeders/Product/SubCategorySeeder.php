<?php

namespace Database\Seeders\Product;
use Illuminate\Database\Seeder;
use App\Models\SubCategory;
use Carbon\Carbon;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['sub_category_name' => 'Animal-Medicine', 'category_id' => 2, 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now() ],
        ];

        SubCategory::insert($data);
    }
}
