<?php
namespace App\LogicBild\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
use App\Models\Module\CategoryModule;
use App\Models\Module\SubCategoryModule;
use App\Models\Module\ModuleName;

class ModuleServiceProvider
{
    // ========================================================================
    // Module Installions Index
    // ========================================================================
    public function moduleInstallionsIndex(Request $request)
    {
        $auth = Auth::user();
        $role = $auth->role;

        if(!$auth){
            return redirect()->route('login');
        }

        if($role === 1){
            $moduleCategories = DB::table('category_modules')->whereNotNull('id')->get();
        }

        $page_name = 'Module Installions';
        return view('module.module-installions.index', compact('page_name', 'moduleCategories'));
    }

    // ========================================================================
    // Module Installions Index
    // ========================================================================
    public function subModuleSearching(Request $request, $id)
    {
        $auth = Auth::user();
        $role = $auth->role;

        if(!$auth){
            return redirect()->route('login');
        }

        if($role === 1){
            $subModules = DB::table('sub_category_modules')->where('category_module_id', $id)->get();
            return response()->json([
                'messages' => $subModules
            ], 200);
        }else{
            return response()->json([
                'messages' => 'No found sub category module.'
            ], 404);
        }
    }

    // ========================= Module Category Service ==========================
    /**
     * Handle Module Category Templete View
    */
    // ============================================================================
    public function viewModuleCategoryTemplete(Request $request)
    {
        $page_name = 'Module Category';
        return view('module.module-category.index', compact('page_name'));
    }

    /**
     * Handle Module Category Search
    */
    public function moduleCategoriesSearch(Request $request)
    {
        if (!$request->ajax()) {
            abort(404);
        }

        $searchQuery = $request->input('query'); // The search input from the request
        $input_value = $request->input('module_category_name'); // The additional filter if provided

        $query = CategoryModule::query()->orderBy('id', 'desc');

        // Apply filters
        if ($input_value) {
            $query->where('module_category_name', 'LIKE', '%' . $input_value . '%');
        }

        if ($searchQuery) {
            $query->where('module_category_name', 'LIKE', '%' . $searchQuery . '%');
        } else {
            // Filter by today's date if no search query is provided
            $start_day = now()->startOfDay();
            $end_day = now()->endOfDay();
            $query->whereBetween('created_at', [$start_day, $end_day]);
        }

        $data = $query->get();
        // Total Module Category Count
        $total = CategoryModule::count();

        if ($data->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No matching current module categories found, Please Search.......',
                'data' => []
            ], 200);
        }

        return response()->json([
            'status' => 'success',
            'data' => $data,
            'current' => $data->count(),
            'total' => $total,
        ], 200);
    }

    /**
     * Handle Module Category Store
    */
    public function moduleCategoriesStore(Request $request)
    {
        $validators = Validator::make($request->all(),[
            'module_category_name' => 'required'
        ],[
            'module_category_name.required' => 'The module category name is required.'
        ]);

        if($validators->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validators->messages()
            ]);
        }else{
            $module_categories = new CategoryModule;
            $module_categories->module_category_name = $request->input('module_category_name');
            $module_categories->save();

            return response()->json([
                'status' => 200,
                'messages' => 'The module category has created.'
            ]);
        }
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
        $validators = Validator::make($request->all(),[
            'module_category_name' => 'required',
        ],[
            'module_category_name.required' => 'Module Category Name Mandatory.',
        ]);

        if($validators->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validators->messages(),
            ]);
        }else{

            $module_categories = CategoryModule::find($id);
            $module_categories->module_category_name = $request->input('module_category_name');
            $module_categories->save();
            
            return response()->json([
                'status' => 200,
                'messages' => 'Module category has updated.'
            ]);
        }
    }

    /**
     * Handle Module Category Delete
    */
    public function moduleCategoriesDelete($id)
    {
        $module_categories = CategoryModule::find($id);
        if($module_categories){
            $module_categories->delete();
            return response()->json([
                'status' => 200,
                'messages' => 'The module category has deleted.'
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'messages' => 'This module category id is not found.'
            ]);
        }
    }


    // ========================= Module Name Service ==========================
    /**
     * Handle Module Name Templete View
    */
    public function moduleNameViewTemplate(Request $request)
    {
        $page_name = 'Module Name';
        return view('module.module-name.index', compact('page_name'));
    }

    /**
     * Handle Module Name Search
    */
    public function moduleNamesSearch(Request $request)
    {
        if (!$request->ajax()) {
            abort(404);
        }

        $searchQuery = $request->input('query'); // The search input from the request
        $input_value = $request->input('module_name'); // The additional filter if provided

        $query = ModuleName::query()->orderBy('id', 'desc');

        // Apply filters
        if ($input_value) {
            $query->where('module_name', 'LIKE', '%' . $input_value . '%');
        }

        if ($searchQuery) {
            $query->where('module_name', 'LIKE', '%' . $searchQuery . '%');
        } else {
            // Filter by today's date if no search query is provided
            $start_day = now()->startOfDay();
            $end_day = now()->endOfDay();
            $query->whereBetween('created_at', [$start_day, $end_day]);
        }

        $data = $query->get();
        // Total Module Category Count
        $total = ModuleName::count();

        if ($data->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No matching current module name found, Please Search.......',
                'data' => []
            ], 200);
        }

        return response()->json([
            'status' => 'success',
            'data' => $data,
            'current' => $data->count(),
            'total' => $total,
        ], 200);
    }

    /**
     * Handle Module Name Create
    */
    public function ModuleNamesStore(Request $request)
    {
        $validators = Validator::make($request->all(),[
            'module_name' => 'required|unique:module_names'
        ],[
            'module_name.required' => 'The module name is required.',
            'module_name.unique' => 'The module name has already taken.'
        ]);

        if($validators->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validators->messages()
            ]);
        }else{
            $module_names= new ModuleName;
            $module_names->module_name = $request->input('module_name');
            $module_names->save();

            return response()->json([
                'status' => 200,
                'messages' => 'The module name has created.'
            ]);
        }
    }

    /**
     * Handle Module Name Edit
    */
    public function ModuleNamesEdit($id)
    {
        $module_names = ModuleName::find($id);
        if ($module_names) {
            return response()->json([
                'status' => 200,
                'messages' => $module_names,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'messages' => 'The module name is not found',
            ]);
        }
    }

    /**
     * Handle Module Name Update
    */
    public function ModuleNamesUpdate(Request $request, $id)
    {
        $validators = Validator::make($request->all(),[
            'module_name' => 'required|unique:module_names'
        ],[
            'module_name.required' => 'The module name is required.',
            'module_name.unique' => 'The module name has already taken.'
        ]);

        if($validators->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validators->messages(),
            ]);
        }else{

            $module_names = ModuleName::find($id);
            $module_names->module_name = $request->input('module_name');
            $module_names->save();
            
            return response()->json([
                'status' => 200,
                'messages' => 'Module name has updated.'
            ]);
        }
    }

    /**
     * Handle Module Name Delete
    */
    public function ModuleNamesDelete($id)
    {
        $module_names = ModuleName::find($id);
        if($module_names){
            $module_names->delete();
            return response()->json([
                'status' => 200,
                'messages' => 'The module name has deleted.'
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'messages' => 'This module name id is not found.'
            ]);
        }
    }

    // ========================= Module Inject Service ==========================
    /**
     * Handle Module Inject Templete View
    */
    public function moduleInjectIndex(Request $request)
    {
        $page_name = 'Module Inject';
        return view('module.module-inject.index', compact('page_name'));
    }

    /**
     * Handle Module Inject Module Name Get
    */
    public function moduleInjectNameGet(Request $request)
    {
        $module_names = ModuleName::orderBy('id', 'asc')->get();
        if($module_names->isEmpty()){
            return response()->json([
                'status' => 'error',
                'message' => 'Module name is not exits.',
                'module_names' => []
            ]);
        }else{
            return response()->json([
                'status' => 'success',
                'module_names' => $module_names,
            ], 200);
        }
    }

    /**
     * Handle Module Inject Module Category Get
    */
    public function moduleInjectCategoryGet(Request $request)
    {
        $module_categories = CategoryModule::orderBy('id', 'asc')->get();
        if($module_categories->isEmpty()){
            return response()->json([
                'status' => 'error',
                'message' => 'Module category is not exits.',
                'module_categories' => []
            ]);
        }else{
            return response()->json([
                'status' => 'success',
                'module_categories' => $module_categories,
            ], 200);
        }
    }

}