<?php

namespace App\Models\Branch;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Branch\District;
use App\Models\Branch\Branch;

class ThanaOrUpazila extends Model
{
    use HasFactory;
    protected $table = 'thana_or_upazilas';
    protected $fillable = [
        'thana_or_upazila_name',
        'district_id',
    ];

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function branches()
    {
        return $this->hasMany(Branch::class, 'upazila_id');
    }
}
