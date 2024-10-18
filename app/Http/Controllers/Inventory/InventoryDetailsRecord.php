<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\LandScapPdfService;
use App\LogicBild\Permission\InventoryPermissionServiceProvider;

class InventoryDetailsRecord extends Controller
{
    protected $inventoryPermissionServiceProvider;

    // inject InventoryPermissionServiceProvider
    public function __construct(InventoryPermissionServiceProvider $inventoryPermissionServiceProvider)
    {
        return $this->inventoryPermissionServiceProvider = $inventoryPermissionServiceProvider;
    }

    // Ineventory Details View
    public function index(Request $request)
    {
        return $this->inventoryPermissionServiceProvider->viewInventoryDetails($request);
    }
    
    // Inventory Details Record View
    public function getInventoryDetailsRecord(Request $request)
    {
        return $this->inventoryPermissionServiceProvider->getInventoriesDetailsRecord($request);
    }

    // PDF Download
    public function pdf_inventory(Request $request, LandScapPdfService $landscappdfService)
    {
        return $this->inventoryPermissionServiceProvider->pdf_inventories($request, $landscappdfService);
    }

    // Data Export to Excel Sheet
    public function export(Request $request)
    {
        return $this->inventoryPermissionServiceProvider->excelExport($request);
    }

    // Data Export to CSV format
    public function exportCsv(Request $request)
    {
        return $this->inventoryPermissionServiceProvider->exportCsvFile($request);
    }

    // Print
    public function print(Request $request)
    {
        return $this->inventoryPermissionServiceProvider->prints($request);
    }
    
}
