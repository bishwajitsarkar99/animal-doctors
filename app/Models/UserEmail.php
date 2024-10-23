<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class UserEmail extends Model
{
    use HasFactory;
    protected $table = 'user_emails';
    protected $fillable =[
        'user_to',
        'user_cc',
        'user_bcc',
        'subject',
        'main_content',
        'email_attachments',
        'attachment_type',
        'sender_email',
        'sender_user',
        'status',
    ];

    public function roles()
    {
        return $this->hasOne(Role::class,'id', 'role',);
    }
}
