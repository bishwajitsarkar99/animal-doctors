<?php

namespace App\Http\Controllers\PivotTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LogicBild\PivotTable\PivotTableServiceProvider;

class SalesPivotTableController extends Controller
{
    protected $pivotTableServiceProvider;

    // inject PivotTableServiceProvider
    public function __construct(PivotTableServiceProvider $pivotTableServiceProvider)
    {
        return $this->pivotTableServiceProvider = $pivotTableServiceProvider;
    }

    // Sales Pivot Table View
    public function showSalesPivot(){
        return $this->pivotTableServiceProvider->viewSalesPivotTable();
    }
}
