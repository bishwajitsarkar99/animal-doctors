<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
use App\Models\User;

class SessionModel extends Model
{
    use HasFactory;
    protected $table = 'sessions';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public function roles()
    {
        return $this->hasOne(Role::class,'id', 'role');
    }

    public function users()
    {
        return $this->beLongsTo(User::class, 'user_id');
    }
}
