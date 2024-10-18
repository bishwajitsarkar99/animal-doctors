<?php

namespace App\Http\Controllers\Forntend\Footer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LogicBild\Forntend\Footer\FooterServiceProvider;

class FooterInformation extends Controller
{
    protected $footerServiceProvider;

    // inject FooterServiceProvider
    public function __construct(FooterServiceProvider $footerServiceProvider)
    {
        return $this->footerServiceProvider = $footerServiceProvider;
    }

    // Footer Information View
    public function index(Request $request)
    {
        return $this->footerServiceProvider->viewFooterInformation($request);
    }

    // Update Footer Information
    public function update(Request $request) 
    {
        return $this->footerServiceProvider->updateFooterInformation($request);
    }

    
}
