<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Newsleter\NewsleterSeeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(NewsleterSeeder::class);
    }
}
