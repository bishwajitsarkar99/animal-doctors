<?php

namespace App\Models\Folder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder_entry extends Model
{
    use HasFactory;
    protected $table = 'folder_entries';
    protected $fillable = [
        'folder_name'
    ];
}
