<?php

namespace Database\Seeders\Medicine;
use Illuminate\Database\Seeder;
use App\Models\MedicineName;
use Carbon\Carbon;

class MedicineNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['medicine_name' => 'Paradox', 'group_id' => 2, 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now() ],
            ['medicine_name' => 'Dulux', 'group_id' => 1, 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now() ],
            ['medicine_name' => 'Pantone', 'group_id' => 2, 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now() ],
        ];

        MedicineName::insert($data);
    }
}
