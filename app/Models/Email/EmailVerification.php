<?php

namespace App\Models\Email;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailVerification extends Model
{
    use HasFactory;
    protected $table = 'email_verifications';
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'role',
        'email_verified_session',
        'account_create_session',
        'status',
        'created_at',
        'updated_at',
    ];
}
