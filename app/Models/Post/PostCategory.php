<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;
    protected $table ='post_categories';
    protected $fillable=[
        'post_title',
        'slug',
        'category_name',
        'sub_category_name',
        'description',
        'image',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'navbar_status',
        'status',
        'created_by',
    ];
}
