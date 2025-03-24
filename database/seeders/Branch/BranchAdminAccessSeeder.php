<?php

namespace Database\Seeders\Branch;
use Illuminate\Database\Seeder;
use App\Models\Branch\AdminBranchAccessPermission;
use Carbon\Carbon;

class BranchAdminAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['branch_id' => 'M-BRN-2025-02-10-423', 'branch_type' => 'Main Branch', 'branch_name' => 'Dhaka Branch', 'division_name' => 'Dhaka', 'district_name' => 'Dhaka', 'upazila_name' => 'Uttara East Thana', 'town_name' => 'Dhaka', 'location' => 'House-18,Road-15,Sector-14,Uttara,Dhaka-1200.', 'user_role_id' => 1, 'user_email_id' => 1, 'created_by' => 1, 'updated_by' => Null, 'approver_by' => 1, 'status' => 1, 'approver_date' => Carbon::now(), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['branch_id' => 'C-BRN-2025-02-10-441', 'branch_type' => 'Corporate Branch', 'branch_name' => 'Barisal-Branch', 'division_name' => 'Barisal', 'district_name' => 'Barisal', 'upazila_name' => 'Barisal-S', 'town_name' => 'Barisal', 'location' => 'Barisal Sadar,Barisal.', 'user_role_id' => 2, 'user_email_id' => 2, 'created_by' => 1, 'updated_by' => Null, 'approver_by' => 1, 'status' => 1, 'approver_date' => Carbon::now(), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['branch_id' => 'M-BRN-2025-02-10-423', 'branch_type' => 'Main Branch', 'branch_name' => 'Dhaka Branch', 'division_name' => 'Dhaka', 'district_name' => 'Dhaka', 'upazila_name' => 'Uttara East Thana', 'town_name' => 'Dhaka', 'location' => 'House-18,Road-15,Sector-14,Uttara,Dhaka-1200.', 'user_role_id' => 3, 'user_email_id' => 3, 'created_by' => 1, 'updated_by' => Null, 'approver_by' => 1, 'status' => 1, 'approver_date' => Carbon::now(), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        AdminBranchAccessPermission::insert($data);
    }
}
