<?php

namespace App\Models;

use App\Models\Medicine\Inventory;
use App\Models\MedicineName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineGroup extends Model
{
    use HasFactory;
    protected $table = 'medicine_groups';
    
    protected $fillable =[
        'created_at',
        'updated_at',
        'status',
        'group_name',
    ];

    public function inventories()
    {
        return $this->hasMany(Inventory::class,'medicine_group');
    }

    public function medicine_names()
    {
        return $this->hasMany(MedicineName::class);
    }
}
