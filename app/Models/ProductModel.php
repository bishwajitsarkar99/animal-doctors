<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table ='product_models';
    protected $fillable =[
        'model_name',
        'product_id',
        'created_at',
        'updated_at',
        'status',
    ];
}
