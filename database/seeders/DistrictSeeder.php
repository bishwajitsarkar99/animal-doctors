<?php

namespace Database\Seeders;
use App\Models\Branch\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['district_name' => 'Barguna', 'division_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Barisal', 'division_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Bhola', 'division_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Jhalokati', 'division_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Patuakhali', 'division_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Pirojpur', 'division_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Bandarban', 'division_id' => '2', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Brahmanbaria', 'division_id' => '2', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Chandpur', 'division_id' => '2', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Chittagong', 'division_id' => '2', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Comilla', 'division_id' => '2', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => "Cox's Bazar", 'division_id' => '2', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Feni', 'division_id' => '2', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Khagrachari', 'division_id' => '2', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Laxmipur', 'division_id' => '2', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Noakhali', 'division_id' => '2', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Rangamati', 'division_id' => '2', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Dhaka', 'division_id' => '3', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Faridpur', 'division_id' => '3', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Gazipur', 'division_id' => '3', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Gopalganj', 'division_id' => '3', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Kishoreganj', 'division_id' => '3', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Madaripur', 'division_id' => '3', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Manikganj', 'division_id' => '3', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Munshiganj', 'division_id' => '3', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Narayanganj', 'division_id' => '3', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Narsingdi', 'division_id' => '3', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Rajbari', 'division_id' => '3', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Shariatpur', 'division_id' => '3', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Tangail', 'division_id' => '3', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Jamalpur', 'division_id' => '5', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Mymensingh', 'division_id' => '5', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Netrakona', 'division_id' => '5', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Sherpur', 'division_id' => '5', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Bagerhat', 'division_id' => '4', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Chuadanga', 'division_id' => '4', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Jessore', 'division_id' => '4', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Jhenaidah', 'division_id' => '4', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Khulna', 'division_id' => '4', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Kushtia', 'division_id' => '4', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Magura', 'division_id' => '4', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Meherpur', 'division_id' => '4', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Narail', 'division_id' => '4', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Shatkhira', 'division_id' => '4', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Bogra', 'division_id' => '6', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Jaipurhat', 'division_id' => '6', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Naogaon', 'division_id' => '6', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Natore', 'division_id' => '6', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Chapai Nawabganj', 'division_id' => '6', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Pabna', 'division_id' => '6', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Rajshahi', 'division_id' => '6', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Sirajganj', 'division_id' => '6', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Rangpur', 'division_id' => '8', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Gaibandha', 'division_id' => '8', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Kurigram', 'division_id' => '8', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Nilphamari', 'division_id' => '8', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Lalmonirhat', 'division_id' => '8', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Dinajpur', 'division_id' => '8', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Thakurgaon', 'division_id' => '8', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Panchagarh', 'division_id' => '8', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Habiganj', 'division_id' => '7', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Maulvibazar', 'division_id' => '7', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Sunamganj', 'division_id' => '7', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Sylhet', 'division_id' => '7', 'created_at' => now(), 'updated_at' => now()],

        ];

        // Use insert to add multiple records [ use the command : php artisan db:seed --class=EmailVerificationSeeder]
        District::insert($data);
    }
}
