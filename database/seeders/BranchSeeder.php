<?php

namespace Database\Seeders;
use App\Models\Branch\Division;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['division_name' => 'Barisal', 'created_at' => now(), 'updated_at' => now()],
            ['division_name' => 'Chittagong', 'created_at' => now(), 'updated_at' => now()],
            ['division_name' => 'Dhaka', 'created_at' => now(), 'updated_at' => now()],
            ['division_name' => 'Khulna', 'created_at' => now(), 'updated_at' => now()],
            ['division_name' => 'Mymensingh', 'created_at' => now(), 'updated_at' => now()],
            ['division_name' => 'Rajshahi', 'created_at' => now(), 'updated_at' => now()],
            ['division_name' => 'Sylhet', 'created_at' => now(), 'updated_at' => now()],
            ['division_name' => 'Rangpur', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Use insert to add multiple records [ use the command : php artisan db:seed --class=EmailVerificationSeeder]
        Division::insert($data);
    }
}
