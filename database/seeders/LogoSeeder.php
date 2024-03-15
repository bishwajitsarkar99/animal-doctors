<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Logo\Logodegin;

class LogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Logodegin::truncate();
        Logodegin::create([
            'image' => '1694003928.jpg',
        ]);
    }
}
