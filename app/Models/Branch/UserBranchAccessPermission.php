<?php

namespace App\Models\Branch;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Branch\Division;
use App\Models\Branch\District;
use App\Models\Branch\ThanaOrUpazila;
use App\Models\User;
use App\Models\Role;

class UserBranchAccessPermission extends Model
{
    use HasFactory;
    protected $table = 'user_branch_access_permissions';
    protected $fillable = [
        'branch_id',
        'branch_type',
        'branch_name',
        'division_id',
        'district_id',
        'upazila_id',
        'town_name',
        'location',
        'created_by',
        'creator_email',
        'updated_by',
        'updator_email',
        'role_id',
        'email_id',
        'admin_approval_status',
        'super_admin_approval_status',
        'change_status',
        'status',
        'approver_by',
        'approver_email',
        'admin_approver_date',
        'super_admin_approver_date',
    ];

    public function divisions()
    {
        return $this->belongsTo(Division::class, 'division_id', 'id');
    }

    public function districts()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function thana_or_upazilas()
    {
        return $this->belongsTo(ThanaOrUpazila::class, 'upazila_id', 'id');
    }

    public function created_users() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function creator_emails() {
        return $this->belongsTo(User::class, 'creator_email', 'id');
    }

    public function updated_users() {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function updator_emails() {
        return $this->belongsTo(User::class, 'updator_email', 'id');
    }

    public function approver_users() {
        return $this->belongsTo(User::class, 'approver_by', 'id');
    }

    public function approver_emails() {
        return $this->belongsTo(User::class, 'approver_email', 'id');
    }

    public function user_emails() {
        return $this->belongsTo(User::class, 'email_id', 'id');
    }

    public function user_roles() {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
}
