<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicine\Inventory;

class Unit extends Model
{
    use HasFactory;
    protected $table = 'units';
    
    protected $fillable =[
        'created_at',
        'updated_at',
        'status',
        'units_name',
    ];


    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
