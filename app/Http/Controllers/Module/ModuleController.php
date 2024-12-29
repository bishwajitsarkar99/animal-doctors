<?php

namespace App\Http\Controllers\Module;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LogicBild\Module\ModuleServiceProvider;

class ModuleController extends Controller
{
    protected $moduleServiceProvider;

    // inject ModuleServiceProvider
    public function __construct(ModuleServiceProvider $moduleServiceProvider)
    {
        return $this->moduleServiceProvider = $moduleServiceProvider;
    }

    // Module Category View Templete
    public function moduleCategoryView(Request $request){
        return $this->moduleServiceProvider->viewModuleCategoryTemplete($request);
    }

    // Module Category Search
    public function moduleCategorySearch(Request $request){
        return $this->moduleServiceProvider->moduleCategoriesSearch($request);
    }

    // Module Category Store
    public function moduleCategoryStore(Request $request){
        return $this->moduleServiceProvider->moduleCategoriesStore($request);
    }

    // Module Category Edit
    public function moduleCategoryEdit($id){
        return $this->moduleServiceProvider->moduleCategoriesEdit($id);
    }

    // Module Category Update
    public function moduleCategoryUpdate(Request $request, $id){
        return $this->moduleServiceProvider->moduleCategoriesUpdate($request, $id);
    }

    // Module Category Delete
    public function moduleCategoryDelete($id){
        return $this->moduleServiceProvider->moduleCategoriesDelete($id);
    }

}
