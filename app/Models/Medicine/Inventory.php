<?php

namespace App\Models\Medicine;

use App\Models\SubCategory;
use App\Models\MedicineDogs;
use App\Models\MedicineGroup;
use App\Models\MedicineName;
use App\Models\MedicineOrigin;
use App\Models\Unit;
use App\Models\Supplier\Supplier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $primaryKey = 'medicine_group_id';
    protected $fillable = [
        'inv_id',
        'supplier_id',
        'category_id',
        'medicine_group',
        'medicine_name',
        'medicine_dogs',
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
        'status_stock',
        'stock_id',
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

    public function supplier_id()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function category_id()
    {
        return $this->belongsTo(SubCategory::class, 'category_id');
    }

    public function medicine_group()
    {
        return $this->belongsTo(MedicineGroup::class, 'medicine_group');
    }
    public function medicine_name()
    {
        return $this->belongsTo(MedicineName::class, 'medicine_name');
    }

    public function medicine_origin()
    {
        return $this->belongsTo(MedicineOrigin::class, 'origin_name');
    }

    public function medicine_dogs()
    {
        return $this->belongsTo(MedicineDogs::class, 'medicine_dogs');
    }
    
    public function medicine_size()
    {
        return $this->belongsTo(Unit::class, 'units_name');
    }

}
