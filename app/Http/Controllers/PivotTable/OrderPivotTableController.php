<?php

namespace App\Http\Controllers\PivotTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LogicBild\PivotTable\PivotTableServiceProvider;

class OrderPivotTableController extends Controller
{
    protected $pivotTableServiceProvider;

    // inject PivotTableServiceProvider
    public function __construct(PivotTableServiceProvider $pivotTableServiceProvider)
    {
        return $this->pivotTableServiceProvider = $pivotTableServiceProvider;
    }

    // Order Pivot Table View
    public function showOrderPivot()
    {
        return $this->pivotTableServiceProvider->viewOrderPivotTable();
    }
}
