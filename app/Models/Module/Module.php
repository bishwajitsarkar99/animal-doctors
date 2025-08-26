<?php

namespace App\Models\Module;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Module\ModuleLinkUrl;

class Module extends Model
{
    use HasFactory;
    protected $table = 'modules';
    protected $fillable = [
        'module_name',
        'sub_module_id',
        'status',
    ];

    public function moduleLinkUrls(){
        return $this->hasMany(ModuleLinkUrl::class);
    }
}
