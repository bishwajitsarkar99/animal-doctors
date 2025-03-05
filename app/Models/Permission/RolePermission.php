<?php

namespace App\Models\Permission;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
use App\Models\User;

class RolePermission extends Model
{
    use HasFactory;
    protected $table = 'role_permissions';
    
    protected $fillable =[
        'branch_id',
        'role_id',
        'login_email',
        'status',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function created_user() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updated_user() {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}
