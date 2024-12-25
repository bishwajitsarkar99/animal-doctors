<?php

namespace App\Models\Branch;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Branch\District;
use App\Models\Branch\Branch;
use App\Models\Branch\AdminBranchAccessPermission;

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

    public function admin_branch_access_permissions()
    {
        return $this->hasMany(AdminBranchAccessPermission::class, 'division_id');
    }
}
