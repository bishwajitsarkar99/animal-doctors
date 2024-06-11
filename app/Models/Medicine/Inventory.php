<?php

namespace App\Models\Medicine;

use App\Models\SubCategory;
use App\Models\MedicineDogs;
use App\Models\MedicineGroup;
use App\Models\MedicineName;
use App\Models\MedicineOrigin;
use App\Models\Unit;
use App\Models\User;
use App\Models\Role;
use App\Models\Supplier\Supplier;
use App\Models\Permission\InventoryPermission;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $primaryKey = 'inventory_id';
    protected $fillable = [
        'user_id',
        'inv_id',
        'supplier_id',
        'category_id',
        'medicine_group',
        'medicine_name',
        'medicine_dosage',
        'medicine_origin',
        'medicine_size',
        'price',
        'quantity',
        'amount',
        'vat_percentage',
        'tax_percentage',
        'discount_percentage',
        'sub_total',
        'status',
        'status_inv',
        'manufacture_date',
        'expiry_date',
        'updated_by',
        'permission_token',
        'approved_by',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'amount' => 'decimal:2',
        'vat_percentage' => 'decimal:2',
        'tax_percentage' => 'decimal:2',
        'discount_percentage' => 'decimal:2',
        'sub_total' => 'decimal:2',
        'manufacture_date' => 'date',
        'expiry_date' => 'date',
    ];

    public function roles()
    {
        return $this->hasOne(Role::class,'id', 'role');
    }

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id','id');
    }

    public function sub_categories()
    {
        return $this->belongsTo(SubCategory::class, 'category_id','id');
    }

    public function medicine_groups()
    {
        return $this->belongsTo(MedicineGroup::class, 'medicine_group','id');
    }
    public function medicine_names()
    {
        return $this->belongsTo(MedicineName::class, 'medicine_name','id');
    }

    public function medicine_origins()
    {
        return $this->belongsTo(MedicineOrigin::class, 'medicine_origin','id');
    }

    public function medicine_dogs()
    {
        return $this->belongsTo(MedicineDogs::class, 'medicine_dosage','id');
    }
    
    public function units()
    {
        return $this->belongsTo(Unit::class, 'medicine_size','id');
    }

    public function inventory_permissions()
    {
        return $this->hasMany(InventoryPermission::class, 'inv_inventory_id', 'inventory_id');
    }

}
