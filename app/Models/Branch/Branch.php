<?php

namespace App\Models\Branch;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Branch\Division;
use App\Models\Branch\District;
use App\Models\Branch\ThanaOrUpazila;

class Branch extends Model
{
    use HasFactory;
    protected $table = 'branches';
    protected $fillable = [
        'branch_id',
        'branch_type',
        'branch_name',
        'division_id',
        'district_id',
        'upazila_id',
        'town_name',
        'location',
        'roles_id',
        'emails_id',
        'user_name',
        'access_status',
        'permission_status',
        'created_by',
        'approved_by',
        'updated_by',
    ];

    public function divisions()
    {
        return $this->belongsTo(Division::class, 'division_id', 'id');
    }

    public function districts()
    {
        return $this->belongsTo(Division::class, 'district_id', 'id');
    }

    public function thana_or_upazilas()
    {
        return $this->belongsTo(ThanaOrUpazila::class, 'upazila_id', 'id');
    }
}
