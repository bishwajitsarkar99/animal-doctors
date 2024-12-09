<?php

namespace App\Models\Branch;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Branch\Division;
use App\Models\Branch\ThanaOrUpazila;
use App\Models\Branch\Branch;

class District extends Model
{
    use HasFactory;
    protected $table = 'districts';
    protected $fillable = [
        'district_name',
        'division_id'
    ];

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id', 'id');
    }

    public function upazilas()
    {
        return $this->hasMany(ThanaOrUpazila::class, 'district_id');
    }

    public function branches()
    {
        return $this->hasMany(Branch::class, 'district_id', 'id');
    }
}
