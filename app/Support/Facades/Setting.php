<?php

namespace App\Support\Facades;

use Illuminate\Support\Facades\Facade;
use App\Support\Setting as SettingFacade;

/**
 * @see \App\Support\Setting;
 */
class Setting extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor()
    {
        return SettingFacade::class;
    }
}