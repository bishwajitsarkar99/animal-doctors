<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MailSetting;

class EmailSetting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MailSetting::truncate();
        MailSetting::create([
            'mail_transport' => 'smtp',
            'mail_host' => 'smtp.gmail.com',
            'mail_port' => '587',
            'mail_username' => 'bishwajitsarkar99@gmail.com',
            'mail_password' => 'ugqkatbjsgtowpfx',
            'mail_encryption' => 'tls',
            'mail_from' => 'bishwajitsarkar99@gmail.com',
        ]);
    }
}
