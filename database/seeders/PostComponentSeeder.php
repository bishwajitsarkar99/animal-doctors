<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Post\PostCategorySeeder;
use Database\Seeders\Post\PostSubCategorySeeder;
use Database\Seeders\Post\PostGroupSeeder;

class PostComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PostCategorySeeder::class);
        $this->call(PostSubCategorySeeder::class);
        $this->call(PostGroupSeeder::class);
    }
    // Use insert to add multiple records [ use the command : php artisan db:seed --class=PostComponentSeeder]
}
