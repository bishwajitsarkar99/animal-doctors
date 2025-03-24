<?php

namespace Database\Seeders\Medicine;
use Illuminate\Database\Seeder;
use App\Models\MedicineOrigin;
use Carbon\Carbon;

class MedicineOriginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['origin_name' => 'America', 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now() ],
            ['origin_name' => 'India', 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now() ],
        ];

        MedicineOrigin::insert($data);
    }
}
