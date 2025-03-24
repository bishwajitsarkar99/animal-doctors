<?php

namespace Database\Seeders;

use App\Models\Permission\RolePermission;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['branch_id' => 'M-BRN-2025-02-10-423', 'role_id' => 1, 'login_email' => 'superadmingstmedicinecenter4215@gmail.com', 'status' => 1, 'created_by' => 1, 'updated_by' => Null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['branch_id' => 'C-BRN-2025-02-10-441', 'role_id' => 2, 'login_email' => 'subadmingstmedicinecenter4216@gmail.com', 'status' => 1, 'created_by' => 1, 'updated_by' => Null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['branch_id' => 'C-BRN-2025-02-10-441', 'role_id' => 3, 'login_email' => 'admingstmedicinecenter4219@gmail.com', 'status' => 1, 'created_by' => 1, 'updated_by' => Null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['branch_id' => 'C-BRN-2025-02-10-441', 'role_id' => 5, 'login_email' => 'accountsgstmedicinecenter4415@gmail.com', 'status' => 1, 'created_by' => 1, 'updated_by' => Null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['branch_id' => 'C-BRN-2025-02-10-441', 'role_id' => 6, 'login_email' => 'marketinggstmedicinecenter2648@gmail.com', 'status' => 1, 'created_by' => 1, 'updated_by' => Null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['branch_id' => 'C-BRN-2025-02-10-441', 'role_id' => 7, 'login_email' => 'deliveryteamgstmedicinecenter5204@gmail.com', 'status' => 1, 'created_by' => 1, 'updated_by' => Null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['branch_id' => 'L-BRN-2025-02-10-575', 'role_id' => 7, 'login_email' => 'bishwajitgstmedicinecenter66@gmail.com', 'status' => 1, 'created_by' => 1, 'updated_by' => Null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['branch_id' => 'L-BRN-2025-02-10-575', 'role_id' => 0, 'login_email' => 'md.rabbistmedicinecenter3645@gmail.com', 'status' => 1, 'created_by' => 1, 'updated_by' => Null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['branch_id' => 'L-BRN-2025-02-10-575', 'role_id' => 0, 'login_email' => 'md.hasangstmedicinecenter3491@gmail.com', 'status' => 1, 'created_by' => 1, 'updated_by' => Null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        RolePermission::insert($data);
    }
    // Use insert to add multiple records [ use the command : php artisan db:seed --class=RolePermissionSeeder]
}
