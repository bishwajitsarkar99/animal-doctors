<?php

namespace App\Http\Controllers\Stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LogicBild\Stock\StockServiceProvider;

class StockController extends Controller
{
    protected $stockServiceProvider;

    // inject StockServiceProvider
    public function __construct(StockServiceProvider $stockServiceProvider)
    {
        return $this->stockServiceProvider = $stockServiceProvider;
    }

    // Stock View
}
