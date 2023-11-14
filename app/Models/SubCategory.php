<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $tabl='sub_categories';
    protected $fillable =[
        'category_id',
        'subcategory_name',
        'created_at',
        'updated_at',
        'status',
    ];
}
