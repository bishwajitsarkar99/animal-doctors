<?php

namespace App\Models\Module;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Module\CategoryModule;
use App\Models\Module\SubCategoryModule;
use App\Models\Module\Module;

class ModuleLinkUrl extends Model
{
    use HasFactory;
    protected $table = 'module_link_urls';
    protected $fillable = [
        'module_url',
        'category_module_id',
        'sub_category_module_id',
        'module_id',
        'status',
    ];

    public function categoryModules()
    {
        return $this->belongsTo(CategoryModule::class, 'category_module_id', 'id');
    }

    public function subCategoryModules()
    {
        return $this->belongsTo(SubCategoryModule::class, 'sub_category_module_id', 'id');
    }

    public function modules()
    {
        return $this->belongsTo(Module::class, 'module_id', 'id');
    }
}
