<?php

namespace App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryAccessPermission extends Model
{
    use HasFactory;
    protected $table = 'inventory_access_permissions';
    
    protected $fillable =[
        'id',
        'roles_id',
        'emails_id',
        'permission_status',
        'data_export_status',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'name' => 'json',
    ];

    public function roles(){
        return $this->belongsTo(Role::class, 'roles_id', 'id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'emails_id', 'id');
    }
}
