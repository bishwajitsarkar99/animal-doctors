<?php

namespace Database\Seeders\Medicine;
use Illuminate\Database\Seeder;
use App\Models\MedicineDogs;
use Carbon\Carbon;

class MedicineDosageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['dosage' => '500mg', 'medicine_id' => 1, 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now() ],
            ['dosage' => '125mg', 'medicine_id' => 2, 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now() ],
            ['dosage' => '250mg', 'medicine_id' => 3, 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now() ],
            ['dosage' => '1.25mg', 'medicine_id' => 1, 'status' => 1, 'created_at' =>  Carbon::now(), 'updated_at' =>  Carbon::now() ],
        ];

        MedicineDogs::insert($data);
    }
}
