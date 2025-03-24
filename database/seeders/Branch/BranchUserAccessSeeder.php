<?php

namespace Database\Seeders\Branch;
use Illuminate\Database\Seeder;
use App\Models\Branch\UserBranchAccessPermission;
use Carbon\Carbon;

class BranchUserAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['branch_id' => 'C-BRN-2025-02-10-441', 'branch_type' => 'Corporate Branch', 'branch_name' => 'Barisal-Branch', 'division_id' => 1, 'district_id' => 2, 'upazila_id' => 11, 'town_name' => 'Barisal', 'location' => 'Barisal Sadar,Barisal.', 'created_by' => 1, 'creator_email' => 1, 'updated_by' => 1, 'updator_email' => 1, 'role_id' => 1, 'email_id' => 1, 'admin_approval_status' => 0, 'super_admin_approval_status' => 1, 'change_status' => 1, 'status' => 0, 'approver_by' => 1, 'approver_email' => 1,'admin_approver_date' => Null, 'super_admin_approver_date' => Carbon::now(), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['branch_id' => 'C-BRN-2025-02-10-441', 'branch_type' => 'Corporate Branch', 'branch_name' => 'Barisal-Branch', 'division_id' => 1, 'district_id' => 2, 'upazila_id' => 11, 'town_name' => 'Barisal', 'location' => 'Barisal Sadar,Barisal.', 'created_by' => 1, 'creator_email' => 1, 'updated_by' => Null, 'updator_email' => Null, 'role_id' => 6, 'email_id' => 5, 'admin_approval_status' => 0, 'super_admin_approval_status' => 1, 'change_status' => 0, 'status' => 0, 'approver_by' => 1, 'approver_email' => 1,'admin_approver_date' => Null, 'super_admin_approver_date' => Carbon::now(), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['branch_id' => 'C-BRN-2025-02-10-441', 'branch_type' => 'Corporate Branch', 'branch_name' => 'Barisal-Branch', 'division_id' => 1, 'district_id' => 2, 'upazila_id' => 11, 'town_name' => 'Barisal', 'location' => 'Barisal Sadar,Barisal.', 'created_by' => 1, 'creator_email' => 1, 'updated_by' => Null, 'updator_email' => Null, 'role_id' => 7, 'email_id' => 6, 'admin_approval_status' => 0, 'super_admin_approval_status' => 1, 'change_status' => 0, 'status' => 0, 'approver_by' => 1, 'approver_email' => 1,'admin_approver_date' => Null, 'super_admin_approver_date' => Carbon::now(), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['branch_id' => 'L-BRN-2025-02-10-575', 'branch_type' => 'Local Branch', 'branch_name' => 'Natore-Branch', 'division_id' => 6, 'district_id' => 48, 'upazila_id' => 409, 'town_name' => 'Natore', 'location' => 'Natore,Lalpur,Natore.', 'created_by' => 1, 'creator_email' => 1, 'updated_by' => Null, 'updator_email' => Null, 'role_id' => 7, 'email_id' => 8, 'admin_approval_status' => 0, 'super_admin_approval_status' => 1, 'change_status' => 0, 'status' => 0, 'approver_by' => 1, 'approver_email' => 1,'admin_approver_date' => Null, 'super_admin_approver_date' => Carbon::now(), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['branch_id' => 'L-BRN-2025-02-10-575', 'branch_type' => 'Local Branch', 'branch_name' => 'Natore-Branch', 'division_id' => 6, 'district_id' => 48, 'upazila_id' => 409, 'town_name' => 'Natore', 'location' => 'Natore,Lalpur,Natore.', 'created_by' => 1, 'creator_email' => 1, 'updated_by' => 1, 'updator_email' => 1, 'role_id' => 5, 'email_id' => 7, 'admin_approval_status' => 0, 'super_admin_approval_status' => 1, 'change_status' => 1, 'status' => 0, 'approver_by' => 1, 'approver_email' => 1,'admin_approver_date' => Null, 'super_admin_approver_date' => Carbon::now(), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['branch_id' => 'L-BRN-2025-02-10-575', 'branch_type' => 'Local Branch', 'branch_name' => 'Natore-Branch', 'division_id' => 6, 'district_id' => 48, 'upazila_id' => 409, 'town_name' => 'Natore', 'location' => 'Natore,Lalpur,Natore.', 'created_by' => 1, 'creator_email' => 1, 'updated_by' => 1, 'updator_email' => 1, 'role_id' => 7, 'email_id' => 9, 'admin_approval_status' => 0, 'super_admin_approval_status' => 1, 'change_status' => 0, 'status' => 0, 'approver_by' => 1, 'approver_email' => 1,'admin_approver_date' => Null, 'super_admin_approver_date' => Carbon::now(), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];
        UserBranchAccessPermission::insert($data);
    }
}
