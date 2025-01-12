<?php

namespace Database\Seeders;
use App\Models\Email\EmailVerification;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EmailVerificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['user_id' => 1, 'name' => 'Super Admin', 'email' => 'superadmin@gmail.com', 'role' => 1, 'email_verified_session' => Carbon::now(), 'account_create_session' => Carbon::now(), 'status' => 1, 'updated_at' => Carbon::now()],
            ['user_id' => 2, 'name' => 'Sub Admin', 'email' => 'subadmin@gmail.com', 'role' => 2, 'email_verified_session' => Carbon::now(), 'account_create_session' => Carbon::now(), 'status' => 1, 'updated_at' => Carbon::now()],
            ['user_id' => 3, 'name' => 'Admin', 'email' => 'admin@gmail.com', 'role' => 3, 'email_verified_session' => Carbon::now(), 'account_create_session' => Carbon::now(), 'status' => 1, 'updated_at' => Carbon::now()],
            ['user_id' => 1006, 'name' => 'Accounts', 'email' => 'accounts@gmail.com', 'role' => 5, 'email_verified_session' => Carbon::now(), 'account_create_session' =>Carbon::now(), 'status' => 1, 'updated_at' => Carbon::now()],
            ['user_id' => 1007, 'name' => 'Marketing', 'email' => 'marketing@gmail.com', 'role' => 6, 'email_verified_session' => Carbon::now(), 'account_create_session' => Carbon::now(), 'status' => 1, 'updated_at' => Carbon::now()],
            ['user_id' => 1008, 'name' => 'Delivery-Team', 'email' => 'deliveryteam@gmail.com', 'role' => 7, 'email_verified_session' => Carbon::now(), 'account_create_session' => Carbon::now(), 'status' => 1, 'updated_at' => Carbon::now()],
        ];

        // Use insert to add multiple records [ use the command : php artisan db:seed --class=EmailVerificationSeeder]
        EmailVerification::insert($data);
    }
}
