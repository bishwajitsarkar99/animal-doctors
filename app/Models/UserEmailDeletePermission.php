<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
use App\Models\User;

class UserEmailDeletePermission extends Model
{
    use HasFactory;
    protected $table = 'user_email_delete_permissions';
    protected $fillable = [
        'user_roles_id',
        'user_emails_id',
        'report_status',
        'message_status',
        'darft_status',
        'other_status',
        'report_email_forward',
        'message_email_forward',
        'report_email_forward_sendbox',
        'report_status_sendbox',
        'email_service',
    ];
    public function roles()
    {
        return $this->hasOne(Role::class,'id', 'user_roles_id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'user_emails_id', 'id');
    }
}
