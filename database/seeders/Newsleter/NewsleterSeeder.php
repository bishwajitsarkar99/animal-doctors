<?php

namespace Database\Seeders\Newsleter;
use App\Models\Api\Newsleter;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class NewsleterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Newsleter::truncate();
        foreach($this->data() as $value){
            Newsleter::create($value);
        }

        // Newsleter::factory(100)->create();
    }

    public function data(){
        return array(
            array('email' => 'abirrahman@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('email' => 'anis@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('email' => 'rahman@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('email' => 'hellal@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('email' => 'tohid@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('email' => 'harun@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('email' => 'jubier@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('email' => 'babu@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('email' => 'porag@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('email' => 'hasan@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('email' => 'habib@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('email' => 'dulal@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('email' => 'hafiz@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('email' => 'badhon@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('email' => 'raton@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('email' => 'dilip@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('email' => 'shahin@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('email' => 'polash@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('email' => 'prodip@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('email' => 'hiren@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('email' => 'bidhan@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
        );
    }
}
