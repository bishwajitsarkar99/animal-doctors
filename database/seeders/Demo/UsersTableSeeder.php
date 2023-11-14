<?php

namespace Database\Seeders\Demo;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        foreach ($this->data() as $value) {
            User::create( $value);
        }

        User::factory(1000)->create();
    }

    public function data() {
       return array(
            array('name' => 'Super Admin','email' => 'superadmin@gmail.com','role' => '1','email_verified_at' => NULL,'password' => '$2y$10$u2j3MDwcogeYGLyUpmYChuHwqYL.FYtyqmZkly/dFd8s.LR7Gzdlu','contract_number' => '01840336541','image' => '1694003928.jpg','status' => '0'),
            array('name' => 'Sub Admin','email' => 'subadmin@gmail.com','role' => '2','email_verified_at' => NULL,'password' => '$2y$10$7/pn0nV.XjG9tfkq5/lU4.gPrF5IF7VX.bWSiEat/57V0TVErqlYq','contract_number' => '01840336541','image' => '1694003977.jpeg','status' => '0'),
            array('name' => 'Admin','email' => 'admin@gmail.com','role' => '3','email_verified_at' => NULL,'password' => '$2y$10$KaxAm3v8habk2qJ7cn391eAPGm0BA6xwdVtaFcTD36hC19lGDuH..','contract_number' => '01740006589','image' => '1694892693.jpg','status' => '0'),
            array('name' => 'MD.Hasan','email' => 'hasan@gmail.com','role' => '0','email_verified_at' => NULL,'password' => '$2y$10$R3IMBjBUYWJN/Ub/ZbK18uNL6.kFLq7KHkUXG7MMkqSnJAZAfA4/q','contract_number' => '01840336541','image' => '1694901636.jpg','status' => '0'),
            array('name' => 'MD.Rabbi','email' => 'rabbi@gmail.com','role' => '0','email_verified_at' => NULL,'password' => '$2y$10$2ccKdLoTHYD2PMpPxXb/vOEUlNv6r24ZbXuWenIG3eW7u9A5fAyy6','contract_number' => '01740009874','image' => '1694104927.jpg','status' => '1')
        );
    }
}
