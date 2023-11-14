<?php

namespace App\Models\Post;
use App\Models\Post\PostCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PostTable extends Model
{
    use HasFactory;
    protected $table ='post_tables';
    protected $fillable=[
        'category_id',
        'post_title',
        'slug',
        'category_name',
        'sub_category_name',
        'description',
        'yt_iframe',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'navbar_status',
        'created_by',
    ];

    public function category()
    {
        return $this->belongsTo(PostCategory::class,'category_id','id');
    }
}
