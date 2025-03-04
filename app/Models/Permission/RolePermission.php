<?php

namespace App\Models\Permission;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class RolePermission extends Model
{
    use HasFactory;
    protected $table = 'role_permissions';
    
    protected $fillable =[
        'branch_id',
        'role',
        'login_email',
        'status',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public function roles(){
        return $this->belongsTo(Role::class, 'role', 'id');
    }
}
