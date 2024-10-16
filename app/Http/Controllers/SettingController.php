<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LogicBild\SettingService\SettingProvider;

class SettingController extends Controller
{
    protected $settingProvider;
    // inject setting provider
    public function __construct(SettingProvider $settingProvider)
    {
        return $this->settingProvider = $settingProvider;
    }

    // Setting Get
    public function index(Request $request)
    {
        return $this->settingProvider->settingGet($request);
    }

    // Setting Update
    public function update(Request $request)
    {
        return $this->settingProvider->settingUpdate($request);
    }
}
