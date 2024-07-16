<?php

namespace App\Models\Supplier;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierPermission extends Model
{
    use HasFactory;
    protected $table = 'supplier_permissions';
    
    protected $fillable =[
        'id',
        'user_roles_id',
        'user_emails_id',
        'create_status',
        'update_status',
        'delete_status',
        'view_status',
        'data_export_status',
        'data_table_status',
        'supplier_requisition_status',
        'supplier_payment_status',
        'supplier_setting_status',
        'supplier_summary_status',
        'supplier_searching_status',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'name' => 'json',
    ];

    public function roles(){
        return $this->belongsTo(Role::class, 'user_roles_id', 'id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'user_emails_id', 'id');
    }
}
