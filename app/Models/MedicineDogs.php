<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
