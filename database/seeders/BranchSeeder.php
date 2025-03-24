<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Database\Seeders\Branch\BranchCategorySeeder;
use Database\Seeders\Branch\CreateBranchSeeder;
use Database\Seeders\Branch\BranchAdminAccessSeeder;
use Database\Seeders\Branch\BranchUserAccessSeeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BranchCategorySeeder::class);
        $this->call(CreateBranchSeeder::class);
        $this->call(BranchAdminAccessSeeder::class);
        //$this->call(BranchUserAccessSeeder::class);
    }
}
