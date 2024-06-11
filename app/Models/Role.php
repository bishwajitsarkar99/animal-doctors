<?php

namespace App\Models;

use App\Models\Permission\Permission;
use App\Models\User;
use App\Models\permission\InventoryPermission;
use App\Models\Medicine\Inventory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function permission(){
        return $this->hasMany(Permission::class);
    }
    public function user(){
        return $this->hasMany(User::class);
    }
    public function inventory_permissions()
    {
        return $this->hasMany(InventoryPermission::class);
    }
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
