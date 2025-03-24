<?php

namespace Database\Seeders\Branch;
use Illuminate\Database\Seeder;
use App\Models\Branch\BranchCategory;
use Carbon\Carbon;

class BranchCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
            ['branch_category_name' => 'Main Branch', 'creator' => 1, 'updator' => Null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['branch_category_name' => 'Corporate Branch', 'creator' => 1, 'updator' => Null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['branch_category_name' => 'Local Branch', 'creator' => 1, 'updator' => Null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['branch_category_name' => 'Delivery Branch', 'creator' => 1, 'updator' => Null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        BranchCategory::insert($data);
        // Use insert to add multiple records [ use the command : php artisan db:seed --class=BranchCategorySeeder]
    }
}
