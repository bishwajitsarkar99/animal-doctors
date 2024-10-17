<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LogicBild\SettingService\SupplierSettingServiceProvider;

class SupplierSetting extends Controller
{
    protected $supplierSettingServiceProvider;

    // inject SupplierSettingServiceProvider
    public function __construct(SupplierSettingServiceProvider $supplierSettingServiceProvider)
    {
        return $this->supplierSettingServiceProvider = $supplierSettingServiceProvider;
    }

    // Supplier Setting Update
    public function supplierSettingUpdate(Request $request)
    {
        return $this->supplierSettingServiceProvider->updateSupplierSetting($request);
    }
}
