<?php

namespace App\Models\Supplier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicine\Inventory;

class Supplier extends Model
{
    use HasFactory;

    protected $table ='suppliers';
    // protected $primaryKey ='supplier_id';
    protected $fillable=[
        'branch_id',
        'branch_category',
        'type',
        'bussiness_type',
        'name',
        'office_address',
        'current_address',
        'contact_number_one',
        'contact_number_two',
        'whatsapp_number',
        'email',
        'supplier_status',
        'supplier_access_date',
        'supplier_deny_date',
        'created_by',
        'updated_by',
        
    ];
    
    protected $dates = ['supplier_access_date', 'supplier_deny_date', 'created_at', 'updated_at'];

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
