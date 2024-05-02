<?php

namespace App\Models;

use App\Models\Medicine\Inventory;
use App\Models\MedicineGroup;
use App\Models\MedicineDogs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineName extends Model
{
    use HasFactory;
    protected $tabl='medicine_names';
    protected $fillable =[
        'group_id',
        'medicine_name',
        'created_at',
        'updated_at',
        'status',
    ];

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    public function medicine_dogs()
    {
        return $this->hasMany(MedicineDogs::class);
    }

    public function medicine_groups()
    {
        return $this->belongsTo(MedicineGroup::class, 'group_id', 'id');
    }
}
