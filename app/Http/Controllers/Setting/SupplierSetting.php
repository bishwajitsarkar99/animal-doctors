<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Support\Facades\Setting;


class SupplierSetting extends Controller
{
    public function supplierSettingUpdate(Request $request)
    {

        $request->validate([
            'supplier_title'=>'required',
            'supplier_title_visual'=>'required',
            'supplier_setup_link'=>'required',
            'supplier_setup_display'=>'required',
            
        ]);
        //update 
        setting([
            'supplier_title' => $request->input('supplier_title'),
            'supplier_title_visual' => $request->input('supplier_title_visual'),
            'supplier_setup_link' => $request->input('supplier_setup_link'),
            'supplier_setup_display' => $request->input('supplier_setup_display'),
            
        ]);

        return response()->json([
            'status' => 200,
            'messages' => 'Supplier setting is updated successfully',
        ]);
    }
}
