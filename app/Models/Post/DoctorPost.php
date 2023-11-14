<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorPost extends Model
{
    use HasFactory;

    protected $table ='doctor_posts';
    protected $fillable=[
        'category_id',
        'post_title',
        'slug',
        'category_name',
        'sub_category_name',
        'group_name',
        'medicine_name',
        'medicine_dogs',
        'origin_name',
        'units_name',
        'description',
        'image',
        'permission_status',
        'doctor_status',
        'created_by',
    ];
}
