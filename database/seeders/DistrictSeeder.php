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
            ['district_name' => 'Barguna', 'division_name' => 'Barisal', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Barisal', 'division_name' => 'Barisal', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Bhola', 'division_name' => 'Barisal', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Jhalokati', 'division_name' => 'Barisal', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Patuakhali', 'division_name' => 'Barisal', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Pirojpur', 'division_name' => 'Barisal', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Bandarban', 'division_name' => 'Chittagong', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Brahmanbaria', 'division_name' => 'Chittagong', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Chandpur', 'division_name' => 'Chittagong', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Chittagong', 'division_name' => 'Chittagong', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Comilla', 'division_name' => 'Chittagong', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => "Cox's Bazar", 'division_name' => 'Chittagong', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Feni', 'division_name' => 'Chittagong', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Khagrachari', 'division_name' => 'Chittagong', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Lakshmipur', 'division_name' => 'Chittagong', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Noakhali', 'division_name' => 'Chittagong', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Rangamati', 'division_name' => 'Chittagong', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Dhaka', 'division_name' => 'Dhaka', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Faridpur', 'division_name' => 'Dhaka', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Gazipur', 'division_name' => 'Dhaka', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Gopalganj', 'division_name' => 'Dhaka', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Kishoreganj', 'division_name' => 'Dhaka', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Madaripur', 'division_name' => 'Dhaka', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Manikganj', 'division_name' => 'Dhaka', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Munshiganj', 'division_name' => 'Dhaka', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Narayanganj', 'division_name' => 'Dhaka', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Narsingdi', 'division_name' => 'Dhaka', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Rajbari', 'division_name' => 'Dhaka', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Shariatpur', 'division_name' => 'Dhaka', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Tangail', 'division_name' => 'Dhaka', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Jamalpur', 'division_name' => 'Mymensingh', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Mymensingh', 'division_name' => 'Mymensingh', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Netrakona', 'division_name' => 'Mymensingh', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Sherpur', 'division_name' => 'Mymensingh', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Bagerhat', 'division_name' => 'Khulna', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Chuadanga', 'division_name' => 'Khulna', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Jessore', 'division_name' => 'Khulna', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Jhenaidah', 'division_name' => 'Khulna', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Khulna', 'division_name' => 'Khulna', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Kushtia', 'division_name' => 'Khulna', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Magura', 'division_name' => 'Khulna', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Meherpur', 'division_name' => 'Khulna', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Narail', 'division_name' => 'Khulna', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Shatkhira', 'division_name' => 'Khulna', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Bogra', 'division_name' => 'Rajshahi', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Jaipurhat', 'division_name' => 'Rajshahi', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Naogaon', 'division_name' => 'Rajshahi', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Natore', 'division_name' => 'Rajshahi', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Chapai Nawabganj', 'division_name' => 'Rajshahi', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Pabna', 'division_name' => 'Rajshahi', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Rajshahi', 'division_name' => 'Rajshahi', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Sirajganj', 'division_name' => 'Rajshahi', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Rangpur', 'division_name' => 'Rangpur', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Gaibandha', 'division_name' => 'Rangpur', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Kurigram', 'division_name' => 'Rangpur', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Nilphamari', 'division_name' => 'Rangpur', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Lalmonirhat', 'division_name' => 'Rangpur', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Dinajpur', 'division_name' => 'Rangpur', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Thakurgaon', 'division_name' => 'Rangpur', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Panchagarh', 'division_name' => 'Rangpur', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Habiganj', 'division_name' => 'Sylhet', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Maulvibazar', 'division_name' => 'Sylhet', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Sunamganj', 'division_name' => 'Sylhet', 'created_at' => now(), 'updated_at' => now()],
            ['district_name' => 'Sylhet', 'division_name' => 'Sylhet', 'created_at' => now(), 'updated_at' => now()],

        ];

        // Use insert to add multiple records [ use the command : php artisan db:seed --class=EmailVerificationSeeder]
        District::insert($data);
    }
}
