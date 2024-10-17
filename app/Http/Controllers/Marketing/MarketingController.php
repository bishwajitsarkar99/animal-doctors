<?php

namespace App\Http\Controllers\Marketing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LogicBild\Marketing\MarketingServiceProvider;

class MarketingController extends Controller
{
    protected $marketingServiceProvider;

    // inject MarketingServiceProvider
    public function __construct(MarketingServiceProvider $marketingServiceProvider)
    {
        return $this->marketingServiceProvider = $marketingServiceProvider;
    }

    //Marketing Home Page View
    public function dashboard()
    {   
        return $this->marketingServiceProvider->viewDashboard();
    }
}
