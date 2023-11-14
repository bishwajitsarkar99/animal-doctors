<?php

namespace App\Models;

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
}
