<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicine\Inventory;
use App\Models\Category;

class SubCategory extends Model
{
    use HasFactory;
    protected $table='sub_categories';
    protected $fillable =[
        'category_id',
        'subcategory_name',
        'created_at',
        'updated_at',
        'status',
    ];

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id','id');
    }
}
