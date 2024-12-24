<?php

namespace App\Models\Branch;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class BranchCategory extends Model
{
    use HasFactory;
    protected $table = 'branch_categories';
    protected $fillable = [
        'branch_type_name',
        'creator',
        'updator',
    ];

    public function creator_users() {
        return $this->belongsTo(User::class, 'creator', 'id');
    }

    public function updator_users() {
        return $this->belongsTo(User::class, 'updator', 'id');
    }

}
