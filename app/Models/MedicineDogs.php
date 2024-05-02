<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicine\Inventory;
class MedicineDogs extends Model
{
    use HasFactory;
    protected $tabl='medicine_dogs';
    protected $fillable =[
        'medicine_dogs',
        'created_at',
        'updated_at',
        'status',
    ];

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    public function medicine_names()
    {
        return $this->belongsTo(MedicineName::class, 'medicine_id','id');
    }
}
