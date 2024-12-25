<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
        'contract_number',
        'image',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->hasOne(Role::class,'id', 'role',);
    }

    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->exists();
    }

    public static function getUserCounts($role = 0, $year = null)
    {
        $query = self::select([
            DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
            DB::raw('count(*) as user_count')
        ])->whereYear('created_at', $year ?? now()->year);
    
        if ($role !== null) {
            $query->where('role', $role);
        }
    
        return $query->groupBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'))
                     ->orderBy('month', 'asc')
                     ->get();
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    public function inventory_permissions()
    {
        return $this->hasMany(InventoryPermission::class);
    }
    
    public function emailVerification()
    {
        return $this->hasMany(\App\Models\Email\EmailVerification::class, 'user_id');
    }

    public function user_email_delete_permissions()
    {
        return $this->hasMany(UserEmailDeletePermission::class);
    }

    public function branchs()
    {
        return $this->hasMany(Branch::class);
    }

    public function admin_branch_access_permissions()
    {
        return $this->hasMany(AdminBranchAccessPermission::class);
    }
}
