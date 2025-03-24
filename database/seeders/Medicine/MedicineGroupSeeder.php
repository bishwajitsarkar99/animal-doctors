<?php

namespace Database\Seeders\Medicine;
use Illuminate\Database\Seeder;
use App\Models\MedicineGroup;
use Carbon\Carbon;

class MedicineGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['group_name' => 'Domperidon', 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now() ],
            ['group_name' => 'Penson', 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now() ],
        ];

        MedicineGroup::insert($data);
    }
}
