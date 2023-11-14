<?php

namespace App\Models;

use App\Models\Medicine\Inventory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    
    protected $fillable =[
        'created_at',
        'updated_at',
        'status',
        'category_name',
    ];

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
