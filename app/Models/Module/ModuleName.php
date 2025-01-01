<?php

namespace App\Models\Module;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleName extends Model
{
    use HasFactory;
    protected $table = 'module_names';
    protected $fillable = [
        'module_name',
    ];
}
