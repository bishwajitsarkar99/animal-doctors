<?php

namespace App\Http\Controllers\PivotTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LogicBild\PivotTable\PivotTableServiceProvider;

class SupplierRecordController extends Controller
{
    protected $pivotTableServiceProvider;

    // inject PivotTableServiceProvider
    public function __construct(PivotTableServiceProvider $pivotTableServiceProvider)
    {
        return $this->pivotTableServiceProvider = $pivotTableServiceProvider;
    }

    // Supplier Summary View
    public function index(){
        return $this->pivotTableServiceProvider->viewSupplierSummary();
    }
}
