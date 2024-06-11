<?php

namespace App\Models\Permission;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
use App\Models\User;
use App\Models\Medicine\Inventory;
class InventoryPermission extends Model
{
    use HasFactory;
    protected $table = 'inventory_permissions';
    protected $fillable = [
        'role_id',
        'mail_id',
        'inv_permission_id',
        'issue_name',
        'permission_status',
        'approved_by'
    ];

    public function roles(){
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
    public function users(){
        return $this->belongsTo(User::class, 'mail_id', 'id');
    }
    public function inventories()
    {
        return $this->belongsTo(Inventory::class, 'inv_permission_id', 'inventory_id');
    }
}
