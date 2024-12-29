<?php
namespace App\LogicBild\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
use App\Models\Module\CategoryModule;

class ModuleServiceProvider
{
    // ========================= Module Category Service ==========================
    /**
     * Handle Module Category Templete View
    */
    public function viewModuleCategoryTemplete(Request $request)
    {
        return view('module.module-category.index');
    }

    /**
     * Handle Module Category Search
    */
    public function moduleCategoriesSearch(Request $request)
    {
        if (!$request->ajax()) {
            //abort(404);
        }
    
        $start_day = now()->startOfDay();
        $end_day = now()->endOfDay();
    
        $query = CategoryModule::whereBetween('created_at', [$start_day, $end_day]);
    
        if ($searchQuery = $request->get('query')) {
            $query->where('module_category_name', 'LIKE', '%' . $searchQuery . '%');
        }
    
        $data = $query->get();

        $total = CategoryModule::count();
    
        return response()->json([
            'data' => $data,
            'total' => $total,
        ], 200);
    }

    /**
     * Handle Module Category Store
    */
    public function moduleCategoriesStore(Request $request)
    {
        //
    }

    /**
     * Handle Module Category Edit
    */
    public function moduleCategoriesEdit($id)
    {
        //
    }

    /**
     * Handle Module Category Update
    */
    public function moduleCategoriesUpdate(Request $request, $id)
    {
        //
    }

    /**
     * Handle Module Category Delete
    */
    public function moduleCategoriesDelete($id)
    {
        //
    }

}