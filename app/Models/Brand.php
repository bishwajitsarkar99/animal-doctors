<?php

namespace App\Models;

use App\Models\MedicineOrigin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brands';
    protected $fillable = [
        'brnad_name',
        'origin_id',
        'created_at',
        'updated_at',
        'status',
    ];
    
    public function medicine_origins()
    {
        return $this->belongsTo(MedicineOrigin::class, 'origin_id', 'id');
    }
}
