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

    // Module Category ========================================================
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

    // Module Name ===============================================================
    // Module Name View Template
    public function moduleNameView(Request $request){
        return $this->moduleServiceProvider->moduleNameViewTemplate($request);
    }

    // Module Name Search
    public function moduleNameSearch(Request $request){
        return $this->moduleServiceProvider->moduleNamesSearch($request);
    }

    // Module Name Create
    public function ModuleNameStore(Request $request){
        return $this->moduleServiceProvider->ModuleNamesStore($request);
    }

    // Module Name Edit
    public function ModuleNameEdit($id){
        return $this->moduleServiceProvider->ModuleNamesEdit($id);
    }

    // Module Name Update
    public function ModuleNameUpdate(Request $request, $id){
        return $this->moduleServiceProvider->ModuleNamesUpdate($request, $id);
    }

    // Module Name Delete
    public function ModuleNameDelete($id){
        return $this->moduleServiceProvider->ModuleNamesDelete($id);
    }

    // Module Inject View Templete
    public function index(Request $request)
    {
        return $this->moduleServiceProvider->moduleInjectIndex($request);
    }

}
