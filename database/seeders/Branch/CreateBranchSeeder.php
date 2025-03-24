<?php

namespace Database\Seeders\Branch;
use Illuminate\Database\Seeder;
use App\Models\Branch\Branches;
use Carbon\Carbon;

class CreateBranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['branch_id' => 'M-BRN-2025-02-10-423', 'branch_type' => 'Main Branch', 'branch_name' => 'Dhaka Branch', 'division_id' => 3, 'district_id' => 18, 'upazila_id' => 193, 'town_name' => 'Dhaka', 'location' => 'House-18,Road-15,Sector-14,Uttara,Dhaka-1200.', 'created_by' => 1, 'updated_by' => Null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['branch_id' => 'C-BRN-2025-02-10-441', 'branch_type' => 'Corporate Branch', 'branch_name' => 'Barisal-Branch', 'division_id' => 1, 'district_id' => 2, 'upazila_id' => 11, 'town_name' => 'Barisal', 'location' => 'Barisal Sadar,Barisal,', 'created_by' => 1, 'updated_by' => Null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['branch_id' => 'L-BRN-2025-02-10-575', 'branch_type' => 'Local Branch', 'branch_name' => 'Natore-Branch', 'division_id' => 6, 'district_id' => 48, 'upazila_id' => 409, 'town_name' => 'Natore', 'location' => 'Natore,Lalpur,Natore.', 'created_by' => 1, 'updated_by' => Null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['branch_id' => 'D-BRN-2025-02-10-312', 'branch_type' => 'Delivery Branch', 'branch_name' => 'Pabna-Branch', 'division_id' => 6, 'district_id' => 50, 'upazila_id' => 419, 'town_name' => 'Pabna', 'location' => 'Pabna Sadar,Pabna.', 'created_by' => 1, 'updated_by' => Null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        Branches::insert($data);
    }
}
