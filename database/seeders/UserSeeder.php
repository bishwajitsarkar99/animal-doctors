<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
            array('name' => 'Super Admin','email' => 'superadmin@gmail.com','role' => '1','email_verified_at' => NULL,'password' => '$2y$10$u2j3MDwcogeYGLyUpmYChuHwqYL.FYtyqmZkly/dFd8s.LR7Gzdlu','contract_number' => '01840336541','image' => '1694003928.jpg','status' => '0', 'reference_email' => 'superadmin@gmail.com', 'login_email' => 'superadmingstmedicinecenter4215@gmail.com', 'mailing_email' => 'superadming42@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'Sub Admin','email' => 'subadmin@gmail.com','role' => '2','email_verified_at' => NULL,'password' => '$2y$10$7/pn0nV.XjG9tfkq5/lU4.gPrF5IF7VX.bWSiEat/57V0TVErqlYq','contract_number' => '01840336541','image' => '1694003977.jpeg','status' => '0', 'reference_email' => 'superadmin@gmail.com', 'login_email' => 'subadmingstmedicinecenter4216@gmail.com', 'mailing_email' => 'subadming43@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'Admin','email' => 'admin@gmail.com','role' => '3','email_verified_at' => NULL,'password' => '$2y$10$KaxAm3v8habk2qJ7cn391eAPGm0BA6xwdVtaFcTD36hC19lGDuH..','contract_number' => '01740006589','image' => '1694892693.jpg','status' => '0', 'reference_email' => 'superadmin@gmail.com', 'login_email' => 'admingstmedicinecenter4219@gmail.com', 'mailing_email' => 'adming44@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'Accounts','email' => 'accounts@gmail.com','role' => '5','email_verified_at' => NULL,'password' => '$2y$10$0b6FBlOHW5JC9I5ZyY./zOg6gYC05piEIFgcivlyh5oUpHlGj1nQS','contract_number' => '01740665423','image' => '1719607102.jpg','status' => '0', 'reference_email' => 'superadmin@gmail.com', 'login_email' => 'accountsgstmedicinecenter4415@gmail.com', 'mailing_email' => 'accounts45@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'Marketing','email' => 'marketing@gmail.com','role' => '6','email_verified_at' => NULL,'password' => '$2y$10$awdcgOrgq3H3h4DhkKFm4ecn1VyLCr5eQRV7cgk2HjSbKX4hqalau','contract_number' => '01740669875','image' => '1719680322.jpg','status' => '0', 'reference_email' => 'superadmin@gmail.com', 'login_email' => 'marketinggstmedicinecenter2648@gmail.com', 'mailing_email' => 'marketing46@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'Delivery-Team','email' => 'deliveryteam@gmail.com','role' => '7','email_verified_at' => NULL,'password' => '$2y$10$F3a8S0t77LQPqWmOjzinWe35FmueaDYIQZu5xK4BPI3YOlMhF2EPm','contract_number' => '01852446578','image' => '1719688693.jpg','status' => '0', 'reference_email' => 'superadmin@gmail.com', 'login_email' => 'deliveryteamgstmedicinecenter5204@gmail.com', 'mailing_email' => 'deliveryteam47@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'MD.Hasan','email' => 'hasan@gmail.com','role' => '0','email_verified_at' => NULL,'password' => '$2y$10$R3IMBjBUYWJN/Ub/ZbK18uNL6.kFLq7KHkUXG7MMkqSnJAZAfA4/q','contract_number' => '01840336541','image' => '1694901636.jpg','status' => '0', 'reference_email' => 'superadmin@gmail.com', 'login_email' => 'md.hasangstmedicinecenter3491@gmail.com', 'mailing_email' => 'hasan48@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'MD.Rabbi','email' => 'rabbi@gmail.com','role' => '0','email_verified_at' => NULL,'password' => '$2y$10$2ccKdLoTHYD2PMpPxXb/vOEUlNv6r24ZbXuWenIG3eW7u9A5fAyy6','contract_number' => '01740009874','image' => '1694104927.jpg','status' => '0', 'reference_email' => 'superadmin@gmail.com', 'login_email' => 'md.rabbistmedicinecenter3645@gmail.com', 'mailing_email' => 'rabbi49@gmail.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()), 
        ];
        User::insert($data);
    }
}
