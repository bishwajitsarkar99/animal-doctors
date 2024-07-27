<?php
namespace App\Support\Facades;
use Illuminate\Support\Facades\Facade;
use App\Support\Supplier as SupplierFacade;

/**
 * @see \App\Support\Setting;
 */
class Supplier extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor()
    {
        return SupplierFacade::class;
    }
}