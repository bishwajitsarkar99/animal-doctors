<?php

namespace App\Models\Module;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Module\SubCategoryModule;

class CategoryModule extends Model
{
    use HasFactory;
    protected $table = 'category_modules';
    protected $fillable = [
        'module_category_name',
    ];

    public function SubCategoryModules(){
        return $this->hasMany(SubCategoryModule::class);
    }
}
