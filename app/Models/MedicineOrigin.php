<?php

namespace App\Models;
use App\Models\Medicine\Inventory;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineOrigin extends Model
{
    use HasFactory;
    protected $table = 'medicine_origins';
    protected $fillable =[
        'created_at',
        'updated_at',
        'status',
        'origin_name',
    ];

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    public function brands()
    {
        return $this->hasMany(Brand::class);
    }
}
