<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class SessionModel extends Model
{
    use HasFactory;
    protected $table = 'sessions';

    public function roles()
    {
        return $this->hasOne(Role::class,'id', 'role');
    }
}
