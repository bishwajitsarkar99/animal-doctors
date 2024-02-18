<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'product_categories';
    protected $fillable = [
        'category_title',
        'slug',
        'category_name',
        'sub_category_name',
        'description',
        'image_one',
        'image_two',
        'image_three',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'navbar_status',
        'status',
        'created_by',
    ];

}
