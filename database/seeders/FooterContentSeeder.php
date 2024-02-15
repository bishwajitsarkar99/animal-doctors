<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Forntend\ForntEndFooter;

class FooterContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        ForntEndFooter::truncate();
        ForntEndFooter::create([
            'company_name' => 'GST Medicine Center',
            'company_address' => 'House-18, Road-15, Uttara,Dhaka-1200.',
            'email' => 'gst@gmail.com',
            'contract_number_one' => '0174000369874',
            'contract_number_two' => '0175066988585',
            'hot_number' => '0175066988585',
            'whatsapp_number_one' => '0175066988585',
            'whatsapp_number_two' => '0175066988585',
            'facebook_address' => 'gst.facebook.com',
            'linkedin' => 'gst.linkedin',
            'youtube_chenel' => 'http://127.0.0.1:8000/super-admin/forntend-footer-information',
            'facebook_link' => 'http://127.0.0.1:8000/super-admin/forntend-footer-information',
            'messaner_link' => '#',
            'whatsapp_link' => '#',
            'linkedin_link' => '#'
        ]);
    }
}
