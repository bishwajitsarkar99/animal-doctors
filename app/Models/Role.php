<?php

namespace App\Models;

use App\Models\Permission\Permission;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function permission(){
        return $this->hasOne(Permission::class);
    }
    public function user(){
        return $this->hasOne(User::class);
    }
}
