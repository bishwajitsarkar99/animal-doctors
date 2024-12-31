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
            abort(404);
        }

        //$input_value = $request->input('module_category_name');
        $searchQuery = $request->get('query');

        $query = CategoryModule::query();

        // Check if search input is provided
        // if ($input_value) {
        //     $query->where('module_category_name', 'LIKE', '%' . $searchQuery . '%');
        // } else {
        //     // Filter by today's date if no input is provided
        //     $start_day = now()->startOfDay();
        //     $end_day = now()->endOfDay();

        //     $query->whereBetween('created_at', [$start_day, $end_day]);

        //     if ($searchQuery) {
        //         $query->where('module_category_name', 'LIKE', '%' . $searchQuery . '%');
        //     }
        // }

        if ($searchQuery) {
            $query->where('module_category_name', 'LIKE', '%' . $searchQuery . '%');
        }

        // Fetch filtered data
        $data = $query->get();

        // Get total count of records
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
        $module_categories = CategoryModule::find($id);
        if ($module_categories) {
            return response()->json([
                'status' => 200,
                'messages' => $module_categories,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'messages' => 'The module category is not found',
            ]);
        }
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