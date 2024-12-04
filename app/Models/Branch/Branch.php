<?php

namespace App\Models\Branch;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $table = 'branches';
    protected $fillable = [
        'branch_id',
        'branch_type',
        'branch_name',
        'division_name',
        'district_name',
        'upazila_name',
        'town_name',
        'location',
        'roles_id',
        'emails_id',
        'user_name',
        'status',
        'access_status',
        'created_by',
        'approved_by',
        'updated_by',
    ];
}
