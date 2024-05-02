<?php

namespace App\Models;

use App\Models\ProductModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'product_name',
        'created_at',
        'updated_at',
        'status',
    ];

    public function product_models()
    {
        return $this->hasMany(ProductModel::class);
    }
}
