<?php

namespace App\Models\Module;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Module\CategoryModule;
use App\Models\Module\ModuleLinkUrl;

class SubCategoryModule extends Model
{
    use HasFactory;

    protected $table = 'sub_category_modules';
    protected $fillable = [
        'sub_module_name',
        'category_module_id',
        'status'
    ];

    public function categoryModules(){
        return $this->belongsTo(CategoryModule::class, 'category_module_id', 'id');
    }

    public function moduleLinkUrls(){
        return $this->hasMany(ModuleLinkUrl::class);
    }
}
