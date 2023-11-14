<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Demo\UsersTableSeeder;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(UsersTableSeeder::class);
    }
}
