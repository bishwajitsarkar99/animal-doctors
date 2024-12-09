<?php

namespace App\Models\Branch;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Branch\District;
use App\Models\Branch\Branch;

class Division extends Model
{
    use HasFactory;
    protected $table = 'divisions';
    protected $fillable = [
        'division_name',
    ];

    public function districts()
    {
        return $this->hasMany(District::class, 'division_id');
    }

    public function branches()
    {
        return $this->hasMany(Branch::class, 'division_id');
    }
}
