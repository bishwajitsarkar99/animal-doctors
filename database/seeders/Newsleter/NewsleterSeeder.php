<?php

namespace Database\Seeders\Newsleter;
use App\Models\Api\Newsleter;
use Illuminate\Database\Seeder;

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
            array('email' => 'abirrahman@gmail.com'),
            array('email' => 'anis@gmail.com'),
            array('email' => 'rahman@gmail.com'),
            array('email' => 'hellal@gmail.com'),
            array('email' => 'tohid@gmail.com'),
            array('email' => 'harun@gmail.com'),
            array('email' => 'jubier@gmail.com'),
            array('email' => 'babu@gmail.com'),
            array('email' => 'porag@gmail.com'),
            array('email' => 'hasan@gmail.com'),
            array('email' => 'habib@gmail.com'),
            array('email' => 'dulal@gmail.com'),
            array('email' => 'hafiz@gmail.com'),
            array('email' => 'badhon@gmail.com'),
            array('email' => 'raton@gmail.com'),
            array('email' => 'dilip@gmail.com'),
            array('email' => 'shahin@gmail.com'),
            array('email' => 'polash@gmail.com'),
            array('email' => 'prodip@gmail.com'),
            array('email' => 'hiren@gmail.com'),
            array('email' => 'bidhan@gmail.com'),
        );
    }
}
