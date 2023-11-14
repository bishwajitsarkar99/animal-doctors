<?php

namespace App\Models\Permission;

use App\Models\Role;
use App\Models\roles;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $table = 'permissions';
    
    protected $fillable =[
        'id',
        'name',
        'role_id',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'name' => 'json',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    
    // public function user(){
    //     return $this->belongsTo(User::class);
    // }
}
