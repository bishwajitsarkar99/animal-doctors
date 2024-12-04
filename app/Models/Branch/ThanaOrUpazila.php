<?php

namespace App\Models\Branch;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThanaOrUpazila extends Model
{
    use HasFactory;
    protected $table = 'thana_or_upazilas';
    protected $fillable = [
        'thana_or_upazila_name',
        'district_name',
    ];
}
