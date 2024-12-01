<?php
namespace App\LogicBild\ProductIteams;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use App\Models\Brand;
use App\Models\MedicineOrigin;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Folder\Folder_entry;
use App\Models\MedicineGroup;
use App\Models\MedicineName;
use App\Models\MedicineDogs;
use App\Models\Product;
use App\Models\Unit;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;

class ProductIteamsServiceProvider
{
    // ========================= Brand Iteam ===================================
    // =========================================================================
    /**
     * Handle Brand View Page
    */
    public function viewBrand()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        $origins = MedicineOrigin::all();
        return view('super-admin.medicine-item.brand.index', compact('company_profiles','origins'));
    }
    /**
     * Handle Brand Data Fetch
    */
    public function getBrands(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = Brand::with(['medicine_origins'])->orderBy('id','desc')->latest();

        if( $query = $request->get('query')){
            $data->where('origin_id','LIKE','%'.$query.'%')
                ->orWhere('brand_name','LIKE','%'.$query.'%')
                ->orWhere('status','LIKE','%'.$query.'%');      
        } 
        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }
        $data = $data->paginate($perItem)->toArray();
        
        return response()->json( $data, 200);
    }
    /**
     * Handle Origin Data Fetch
    */
    public function getOrigins(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = MedicineOrigin::orderBy('id','desc')->latest();

        if( $query = $request->get('query')){
            $data->Where('origin_name','LIKE','%'.$query.'%')
                ->orWhere('status','LIKE','%'.$query.'%');      
        } 
        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }
        $data = $data->paginate($perItem)->toArray();
        
        return response()->json( $data, 200);
    }
    /**
     * Handle Create Brand Event
    */
    public function createBrands(Request $request)
    {
        // validation
        $validators = validator::make($request->all(),[
            'brand_name'=>'required|max:191|unique:brands',
            'origin_id' =>'required',
        ],[
            'brand_name.required'=>'The brand name is required mandatory.',
            'brand_name.unique'=>'The brand name is already exits.',
            'origin_id.required'=>'The medicine origin is required mandatory.',
        ]);
        if($validators->fails()){
            return response()->json([
                'status'=> 400,
                'errors' =>$validators->messages(),
            ]);
        }    
        else{
            $brands = new Brand;
            $brands->brand_name = $request->input('brand_name');
            $brands->origin_id = $request->input('origin_id');
            $brands->save();
            return response()->json([
                'status'=> 200,
                'messages'=> 'The Brand has added successfully',
            ]);
        }
    }
    /**
     * Handle Edit Brand Event
    */
    public function editBrands($id)
    {
        $brands = Brand::find($id);
        if($brands){
            return response()->json([
                'status'=> 200,
                'messages'=> $brands,
            ]);
        }
        else{
            return response()->json([
                'status'=> 404,
                'messages'=> 'The brand is not found',
            ]);
        }
    }
    /**
     * Handle Update Brand Event
    */
    public function updateBrands(Request $request, $id)
    {
        // validation
        $validators = validator::make($request->all(),[
            'brand_name' => 'required|max:191|unique:brands,brand_name,' . $id,
            'origin_id' =>'required',
        ],[
            'brand_name.required'=>'The brand name is required mandatory.',
            'brand_name.unique'=>'The brand name is already exits.',
            'origin_id.required'=>'The medicine origin is required mandatory.',
        ]);
        if($validators->fails()){
            return response()->json([
                'status'=> 400,
                'errors'=> $validators->messages(),
            ]);
        }    
        else{
            $brands = Brand::find($id);
            if($brands){
                $brands->brand_name = $request->input('brand_name');
                $brands->origin_id = $request->input('origin_id');
                $brands->update();
                return response()->json([
                    'status'=> 200,
                    'messages'=> 'The brand has updated successfully',
                ]);
            }
            else{
                return response()->json([
                    'status'=> 404,
                    'messages'=> 'The brand is not found',
                ]);
            } 
        }
    }
    /**
     * Handle Delete Brand Event
    */
    public function deleteBrands($id)
    {
        $brands = Brand::find($id);
        $brands->delete();

        return response()->json([
            'status'=> 200,
            'messages'=> 'The brand is deleted successfully',
        ]);
    }
    /**
     * Handle Brand Status Update Event
    */
    public function brandUpdateStatus(Request $request)
    {
        $id = (int)$request->input('id');
        $status = (bool)$request->input('status');
        $status = !$status;

        $data = Brand::findOrFail( $id);

        $data->update([
            'status' => (int)$status,
        ]);

        return response()->json([
            'messages' => 'The brand Permission has Updated Successfully',
            'code' => 202,
        ], 202);
    }


    // ========================= Category Iteam ================================
    // =========================================================================
    /**
     * Handle Category View
    */
    public function viewCategory()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        $allfolders = Folder_entry::all();
        return view('super-admin.medicine-item.category.index', compact('company_profiles', 'allfolders'));
    }
    /**
     * Handle Category Fetch Data
    */
    public function getCategories(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        // Sort field and direction
        $sort_field_id = $request->input('sort_field_id', 'id');
        $sort_field_category_name = $request->input('sort_field_category_name', 'category_name');
        $sort_field_status = $request->input('sort_field_status', 'status');
        $sort_direction = $request->input('sort_direction', 'desc');

        $data = Category::query();

        if( $query = $request->get('query')){
            $data->Where('category_name','LIKE','%'.$query.'%')
                ->orWhere('status','LIKE','%'.$query.'%');      
        } 
        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }

        // Apply sorting
        $data = $data->orderBy($sort_field_id, $sort_direction)
                        ->orderBy($sort_field_category_name, $sort_direction)
                        ->orderBy($sort_field_status, $sort_direction);

        $data = $data->paginate($perItem)->toArray();
        
        return response()->json( $data, 200);
    }
    /**
     * Handle Create Category
    */
    public function createCategory(Request $request)
    {
        // validation
        $validators = validator::make($request->all(),[
            'category_name'=>'required|max:191|unique:categories',
        ],[
            'category_name.required' => 'The category name is required.',
            'category_name.unique' => 'The category name already exists.',
        ]);
        if($validators->fails()){
            return response()->json([
                'status'=> 400,
                'errors' =>$validators->messages(),
            ]);
        }    
        else{
            $category = new Category;
            $category->category_name = $request->input('category_name');
            $category->save();
            return response()->json([
                'status'=> 200,
                'messages'=> 'Category added successfully',
            ]);
        }
    }
    /**
     * Handle Edit Category
    */
    public function editCategories($id)
    {
        $category = Category::find($id);
        if($category){
            return response()->json([
                'status'=> 200,
                'messages'=> $category,
            ]);
        }
        else{
            return response()->json([
                'status'=> 404,
                'messages'=> 'Category is not found',
            ]);
        }
    }
    /**
     * Handle Update Category
    */
    public function updateCategories(Request $request, $id)
    {
        // validation
        $validator = validator::make($request->all(),[
            'category_name' => 'required|max:191|unique:categories,category_name,' . $id,
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=> 400,
                'errors'=> $validator->messages(),
            ]);
        }    
        else{
            $category = Category::find($id);
            if($category){
                $category->category_name = $request->input('category_name');
                $category->update();
                return response()->json([
                    'status'=> 200,
                    'messages'=> 'Category updated successfully',
                ]);
            }
            else{
                return response()->json([
                    'status'=> 404,
                    'messages'=> 'Category is not found',
                ]);
            } 
        }
    }
    /**
     * Handle Delete Category
    */
    public function deleteCategories($id)
    {
        $category = Category::find($id);
        $category->delete();

        return response()->json([
            'status'=> 200,
            'messages'=> 'Category is deleted successfully',
        ]);
    }
    /**
     * Handle Category Status Update
    */
    public function categoriesStatusUpdate(Request $request)
    {
        $id = (int)$request->input('id');
        $status = (bool)$request->input('status');
        $status = !$status;

        $data = Category::findOrFail( $id);

        $data->update([
            'status' => (int)$status,
        ]);

        return response()->json([
            'messages' => 'Category Permission Updated Successfully',
            'code' => 202,
        ], 202);
    }


    // ========================= SubCategory Iteam =============================
    // =========================================================================
    /**
     * Sub Category View
    */
    public function viewSubCategories()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        $categories = Category::where('status', '!=', 0)->get();

        return view('super-admin.medicine-item.sub-category.index', compact('company_profiles', 'categories'));
    }
    /**
     * Handle Sub Category Fetch Data
    */
    public function getSubCategories(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        // Sort field and direction
        $sort_field_id = $request->input('sort_field_id', 'id');
        $sort_field_category_name = $request->input('sort_field_category_name', 'category_id');
        $sort_field_sub_category_name = $request->input('sort_field_sub_category_name', 'sub_category_name');
        $sort_field_status = $request->input('sort_field_status', 'status');
        $sort_direction = $request->input('sort_direction', 'desc');

        $data = SubCategory::with(['categories']);

        if( $query = $request->get('query')){
            $data->Where('sub_category_name','LIKE','%'.$query.'%')
                ->orWhere('category_id','LIKE','%'.$query.'%')
                ->orWhere('status','LIKE','%'.$query.'%');      
        } 
        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }

        // Apply sorting
        $data = $data->orderBy($sort_field_id, $sort_direction)
                        ->orderBy($sort_field_category_name, $sort_direction)
                        ->orderBy($sort_field_sub_category_name, $sort_direction)
                        ->orderBy($sort_field_status, $sort_direction);

        $data = $data->paginate($perItem)->toArray();
        
        return response()->json( $data, 200);
    }
    /**
     * Handle Cateogry Data Get
    */
    public function getCategoriesData(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = Category::orderBy('id','desc')->latest()->where('status', '!=', 0);

        if( $query = $request->get('query')){
            $data->Where('category_name','LIKE','%'.$query.'%')
                ->orWhere('status','LIKE','%'.$query.'%');      
        } 
        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }
        $data = $data->paginate($perItem)->toArray();
        
        return response()->json( $data, 200);
    }
    /**
     * Handle Create Sub Cateogry Event
    */
    public function createSubCategories(Request $request)
    {
        // validation
        $validators = validator::make($request->all(),[
            'sub_category_name'=>'required|max:191|unique:sub_categories',
        ],[
            'sub-category.required'=>'The sub-category is required mandatory.',
            'sub-category.unique'=>'The sub-category has already been taken.',
        ]);
        if($validators->fails()){
            return response()->json([
                'status'=> 400,
                'errors' =>$validators->messages(),
            ]);
        }    
        else{
            $subcategory = new SubCategory;
            $subcategory->sub_category_name = $request->input('sub_category_name');
            $subcategory->category_id = $request->input('category_id');
            $subcategory->save();
            return response()->json([
                'status'=> 200,
                'messages'=> 'Sub-Category added successfully',
            ]);
        }
    }
    /**
     * Handle Edit Sub Cateogry Event
    */
    public function editSubCategories($id)
    {
        $subcategory = SubCategory::find($id);
        if($subcategory){
            return response()->json([
                'status'=> 200,
                'messages'=> $subcategory,
            ]);
        }
        else{
            return response()->json([
                'status'=> 404,
                'messages'=> 'Sub-Category is not found',
            ]);
        }
    }
    /**
     * Handle Update Sub Cateogry Event
    */
    public function updateSubCategories(Request $request, $id)
    {
        // validation
        $validator = validator::make($request->all(),[
            'sub_category_name'=>'required|max:191|unique:sub_categories,sub_category_name,' .$id,
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=> 400,
                'errors'=> $validator->messages(),
            ]);
        }    
        else{
            $subcategories = SubCategory::find($id);
            if($subcategories){
                $subcategories->sub_category_name = $request->input('sub_category_name');
                $subcategories->category_id = $request->input('category_id');
                $subcategories->update();
                return response()->json([
                    'status'=> 200,
                    'messages'=> 'Sub-Category updated successfully',
                ]);
            }
            else{
                return response()->json([
                    'status'=> 404,
                    'messages'=> 'Sub-Category is not found',
                ]);
            } 
        }
    }
    /**
     * Handle Delete Sub Cateogry Event
    */
    public function deleteSubCategories($id)
    {
        $subcategory = SubCategory::find($id);
        $subcategory->delete();

        return response()->json([
            'status'=> 200,
            'messages'=> 'Sub-Category is deleted successfully',
        ]);
    }
    /**
     * Handle Sub Cateogry Status Update Event
    */
    public function subCategoriesStatusUpdate(Request $request)
    {
        $id = (int)$request->input('id');
        $status = (bool)$request->input('status');
        $status = !$status;

        $data = SubCategory::findOrFail( $id);

        $data->update([
            'status' => (int)$status,
        ]);

        return response()->json([
            'messages' => 'Category Permission Updated Successfully',
            'code' => 202,
        ], 202);
    }


    // ========================= Medicine Group Iteam ==========================
    // =========================================================================
    /**
     * Handle Medicine Group View
    */
    public function viewMedicineGroup()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        return view('super-admin.medicine-item.medicine-group.index', compact('company_profiles'));
    }
    /**
     * Handle Medicine Group Fetch Data
    */
    public function getMedicineGroups(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = MedicineGroup::orderBy('id','desc')->latest();

        if( $query = $request->get('query')){
            $data->Where('group_name','LIKE','%'.$query.'%')
                ->orWhere('status','LIKE','%'.$query.'%');      
        } 
        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }
        $data = $data->paginate($perItem)->toArray();
        
        return response()->json( $data, 200);
    }
    /**
     * Handle Create Medicine Group Event
    */
    public function createMedicineGroup(Request $request)
    {
        // validation
        $validators = validator::make($request->all(),[
            'group_name'=>'required|max:191|unique:medicine_groups',
        ],[
            'group_name.required'=>'The medicine group is required mandatory.',
            'group_name.unique'=>'The medicine group has already been taken.'
        ]);
        if($validators->fails()){
            return response()->json([
                'status'=> 400,
                'errors' =>$validators->messages(),
            ]);
        }    
        else{
            $medicinegroups = new MedicineGroup;
            $medicinegroups->group_name = $request->input('group_name');
            $medicinegroups->save();
            return response()->json([
                'status'=> 200,
                'messages'=> 'Medicine Group has added successfully',
            ]);
        }
    }
    /**
     * Handle Edit Medicine Group Event
    */
    public function editMedicineGroups($id)
    {
        $medicinegroups = MedicineGroup::find($id);
        if($medicinegroups){
            return response()->json([
                'status'=> 200,
                'messages'=> $medicinegroups,
            ]);
        }
        else{
            return response()->json([
                'status'=> 404,
                'messages'=> 'Medicine Group is not found',
            ]);
        }
    }
    /**
     * Handle Update Medicine Group Event
    */
    public function updateMedicineGroups(Request $request, $id)
    {
        // validation
        $validator = validator::make($request->all(),[
            'group_name'=>'required|max:191|unique:medicine_groups,group_name,' .$id,
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=> 400,
                'errors'=> $validator->messages(),
            ]);
        }    
        else{
            $medicinegroups = MedicineGroup::find($id);
            if($medicinegroups){
                $medicinegroups->group_name = $request->input('group_name');
                $medicinegroups->update();
                return response()->json([
                    'status'=> 200,
                    'messages'=> 'Medicine Group has updated successfully',
                ]);
            }
            else{
                return response()->json([
                    'status'=> 404,
                    'messages'=> 'Medicine Group is not found',
                ]);
            } 
        }
    }
    /**
     * Handle Delete Medicine Group Event
    */
    public function deleteMedicineGroup($id)
    {
        $medicinegroups = MedicineGroup::find($id);
        $medicinegroups->delete();

        return response()->json([
            'status'=> 200,
            'messages'=> 'Medicine Group is deleted successfully',
        ]);
    }
    /**
     * Handle Medicine Group Status Update
    */
    public function MedicineGroupStatusUpdate(Request $request)
    {
        $id = (int)$request->input('id');
        $status = (bool)$request->input('status');
        $status = !$status;

        $data = MedicineGroup::findOrFail( $id);

        $data->update([
            'status' => (int)$status,
        ]);

        return response()->json([
            'messages' => 'Medicine Group Permission has Updated Successfully',
            'code' => 202,
        ], 202);
    }


    // ========================= Medicine Name Iteam ===========================
    // =========================================================================
    /**
     * Handle Medicine Name View
    */
    public function viewMedicineName()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        $medicinegroups = MedicineGroup::where('status','!=', 0)->get();
        return view('super-admin.medicine-item.medicine-name.index', compact('company_profiles','medicinegroups'));
    }
    /**
     * Handle Medicine Name Fetch Data
    */
    public function getMedicineNames(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = MedicineName::with('medicine_groups')->orderBy('id','desc')->latest();

        if( $query = $request->get('query')){
            $data->Where('medicine_name','LIKE','%'.$query.'%')
                ->orWhere('group_id','LIKE','%'.$query.'%')
                ->orWhere('status','LIKE','%'.$query.'%');      
        } 
        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }
        $data = $data->paginate($perItem)->toArray();
        
        return response()->json( $data, 200);
    }
    /**
     * Handle Medicine Group Get Data
    */
    public function getGroups(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = MedicineGroup::orderBy('id','desc')->latest();

        if( $query = $request->get('query')){
            $data->Where('group_name','LIKE','%'.$query.'%')
                ->orWhere('status','LIKE','%'.$query.'%');      
        } 
        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }
        $data = $data->paginate($perItem)->toArray();
        
        return response()->json( $data, 200);
    }
    /**
     * Handle Create Medicine Name Event
    */
    public function createMedicineNames(Request $request)
    {
        // validation
        $validators = validator::make($request->all(),[
            'medicine_name'=>'required|max:191|unique:medicine_names',
            'group_id'=>'required',
        ],[
            'medicine_name.required'=>'The medicine name is required mandatory.',
            'medicine_name.unique'=>'The medicine name has already been taken.',
            'group_id.required'=>'The medicine group id is required mandatory.',
        ]);
        if($validators->fails()){
            return response()->json([
                'status'=> 400,
                'errors' =>$validators->messages(),
            ]);
        }    
        else{
            $medicinenames = new MedicineName;
            $medicinenames->medicine_name = $request->input('medicine_name');
            $medicinenames->group_id = $request->input('group_id');
            $medicinenames->save();
            return response()->json([
                'status'=> 200,
                'messages'=> 'Medicine Name has added successfully',
            ]);
        }
    }
    /**
     * Handle Edit Medicine Name Event
    */
    public function editMedicineNames($id)
    {
        $medicines = MedicineName::find($id);

        if($medicines){
            return response()->json([
                'status' =>200,
                'messages'=>$medicines,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'messages'=>'Medicine Name is not found',
            ]);
        }
    }
    /**
     * Handle Update Medicine Name Event
    */
    public function updateMedicineNames(Request $request, $id)
    {
        // validation
        $validator = validator::make($request->all(),[
            'medicine_name'=>'required|max:191|unique:medicine_names,medicine_name,' .$id,
            'group_id'=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=> 400,
                'errors'=> $validator->messages(),
            ]);
        }    
        else{
            $medicinenames = MedicineName::find($id);
            if($medicinenames){
                $medicinenames->medicine_name = $request->input('medicine_name');
                $medicinenames->group_id = $request->input('group_id');
                $medicinenames->update();
                return response()->json([
                    'status'=> 200,
                    'messages'=> 'Medicine Name has updated successfully',
                ]);
            }
            else{
                return response()->json([
                    'status'=> 404,
                    'messages'=> 'Medicine Name is not found',
                ]);
            } 
        }
    }
    /**
     * Handle Delete Medicine Name Event
    */
    public function deleteMedicineNames($id)
    {
        $medicinenames = MedicineName::find($id);
        $medicinenames->delete();

        return response()->json([
            'status'=> 200,
            'messages'=> 'Medicine Name is deleted successfully',
        ]);
    }
    /**
     * Handle Medicine Name Status Update
    */
    public function MedicineNameStatusUpdate(Request $request)
    {
        $id = (int)$request->input('id');
        $status = (bool)$request->input('status');
        $status = !$status;

        $data = MedicineName::findOrFail( $id);

        $data->update([
            'status' => (int)$status,
        ]);

        return response()->json([
            'messages' => 'Medicine Name Permission has Updated Successfully',
            'code' => 202,
        ], 202);
    }



    // ========================= Medicine Dosage Iteam =========================
    // =========================================================================
    /**
     * Handle Medicine Dosage View
    */
    public function viewMedicineDosage()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        $medicines = MedicineName::Where('status','!=', 0)->get();
        return view('super-admin.medicine-item.medicine-dogs.index', compact('company_profiles', 'medicines'));
    }
    /**
     * Handle Medicine Dosage Fetch Data
    */
    public function getMedicineDosages(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = MedicineDogs::with(['medicine_names'])->orderBy('id','desc')->latest();

        if( $query = $request->get('query')){
            $data->orWhere('id','LIKE','%'.$query.'%')
                ->orWhere('status','LIKE','%'.$query.'%');  
                // ->Where('medicine_dogs','LIKE','%'.$query.'%')
                // ->orWhere('medicine_id','LIKE','%'.$query.'%')    
        } 
        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }
        $data = $data->paginate($perItem)->toArray();
        
        return response()->json( $data, 200);
    }
    /**
     * Handle Medicine Name Data Get
    */
    public function get_medicine_names(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = MedicineName::orderBy('id','desc')->latest();

        if( $query = $request->get('query')){
            $data->Where('medicine_name','LIKE','%'.$query.'%')
                ->orWhere('status','LIKE','%'.$query.'%');      
        } 
        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }
        $data = $data->paginate($perItem)->toArray();
        
        return response()->json( $data, 200);
    }
    /**
     * Handle Create Medicine Dosage Event
    */
    public function createMedicineDosages(Request $request)
    {
        // validation
        $validators = validator::make($request->all(),[
            'dosage'=>'required|max:191',
            'medicine_id'=>'required',
        ],[
            'dosage.required'=>'The medicine dosage is required mandatory.',
            'medicine_id.required'=>'The medicine id is required mandatory.',
        ]);
        if($validators->fails()){
            return response()->json([
                'status'=> 400,
                'errors' =>$validators->messages(),
            ]);
        }    
        else{
            $medicinedogs = new MedicineDogs;
            $medicinedogs->dosage = $request->input('dosage');
            $medicinedogs->medicine_id = $request->input('medicine_id');
            $medicinedogs->save();
            return response()->json([
                'status'=> 200,
                'messages'=> 'Medicine Dogs has added successfully',
            ]);
        }
    }
    /**
     * Handle Edit Medicine Dosage Event
    */
    public function editMedicineDosages($id)
    {
        $medicinedogs = MedicineDogs::find($id);
        if($medicinedogs){
            return response()->json([
                'status'=> 200,
                'messages'=> $medicinedogs,
            ]);
        }
        else{
            return response()->json([
                'status'=> 404,
                'messages'=> 'Medicine Dogs is not found',
            ]);
        }
    }
    /**
     * Handle Update Medicine Dosage Event
    */
    public function updateMedicineDosages(Request $request, $id)
    {
        // validation
        $validator = validator::make($request->all(),[
            'dosage'=>'required|max:191',
            'medicine_id'=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=> 400,
                'errors'=> $validator->messages(),
            ]);
        }    
        else{
            $medicinedogs = MedicineDogs::find($id);
            if($medicinedogs){
                $medicinedogs->dosage = $request->input('dosage');
                $medicinedogs->medicine_id = $request->input('medicine_id');
                $medicinedogs->update();
                return response()->json([
                    'status'=> 200,
                    'messages'=> 'Medicine Dogs has updated successfully',
                ]);
            }
            else{
                return response()->json([
                    'status'=> 404,
                    'messages'=> 'Medicine Dogs is not found',
                ]);
            } 
        }
    }
    /**
     * Handle Delete Medicine Dosage Event
    */
    public function deleteMedicineDosages($id)
    {
        $medicinedogs = MedicineDogs::find($id);
        $medicinedogs->delete();

        return response()->json([
            'status'=> 200,
            'messages'=> 'Medicine Dosage is deleted successfully',
        ]);
    }
    /**
     * Handle Medicine Dosage Status Update 
    */
    public function MedicineDosageStatus(Request $request)
    {
        $id = (int)$request->input('id');
        $status = (bool)$request->input('status');
        $status = !$status;

        $data = MedicineDogs::findOrFail( $id);

        $data->update([
            'status' => (int)$status,
        ]);

        return response()->json([
            'messages' => 'Medicine Dosage Permission has Updated Successfully',
            'code' => 202,
        ], 202);
    }


    // ========================= Product Iteam =================================
    // =========================================================================
    /**
     * Handle Product View
    */
    public function viewProduct()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        return view('super-admin.medicine-item.product.index', compact('company_profiles'));
    }
    /**
     * Handle Product Fetch Data
    */
    public function getProducts(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = Product::orderBy('id','desc')->latest();

        if( $query = $request->get('query')){
            $data->Where('product_name','LIKE','%'.$query.'%')
                ->orWhere('status','LIKE','%'.$query.'%');      
        } 
        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }

        $data = $data->paginate($perItem)->toArray();
        
        return response()->json( $data, 200);
    }
    /**
     * Handle Create Product Event
    */
    public function createProduct(Request $request)
    {
        $validators = validator::make($request->all(),[
            'product_name'=>'required|max:191',
        ],[
            'product.required'=>'The product is required mandatory.',
        ]);
        if($validators->fails()){
            return response()->json([
                'status'=> 400,
                'errors' =>$validators->messages(),
            ]);
        }    
        else{
            $products = new Product;
            $products->product_name = $request->input('product_name');
            $products->save();
            return response()->json([
                'status'=> 200,
                'messages'=> 'Product added successfully',
            ]);
        }
    }
    /**
     * Handle Edit Product Event
    */
    public function editProduct($id)
    {
        $products = Product::find($id);
        if($products){
            return response()->json([
                'status'=> 200,
                'messages'=> $products,
            ]);
        }
        else{
            return response()->json([
                'status'=> 404,
                'messages'=> 'Product is not found',
            ]);
        }
    }
    /**
     * Handle Update Product Event
    */
    public function updateProduct(Request $request, $id)
    {
        // validation
        $validator = validator::make($request->all(),[
            'product_name'=>'required|max:191',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=> 400,
                'errors'=> $validator->messages(),
            ]);
        }    
        else{
            $products = Product::find($id);
            if($products){
                $products->product_name = $request->input('product_name');
                $products->update();
                return response()->json([
                    'status'=> 200,
                    'messages'=> 'Product updated successfully',
                ]);
            }
            else{
                return response()->json([
                    'status'=> 404,
                    'messages'=> 'Product is not found',
                ]);
            } 
        }
    }
    /**
     * Handle Delete Product Event
    */
    public function deleteProduct($id)
    {
        $products = Product::find($id);
        $products->delete();

        return response()->json([
            'status'=> 200,
            'messages'=> 'Product is deleted successfully',
        ]);
    }
    /**
     * Handle Product Status Update
    */
    public function ProductStatusUpdate(Request $request)
    {
        $id = (int)$request->input('id');
        $status = (bool)$request->input('status');
        $status = !$status;

        $data = Product::findOrFail( $id);

        $data->update([
            'status' => (int)$status,
        ]);

        return response()->json([
            'messages' => 'Product Permission Updated Successfully',
            'code' => 202,
        ], 202);
    }


    // ========================= Units =========================================
    // =========================================================================
    /**
     * Handle Units View
    */
    public function viewUnits()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        return view('super-admin.medicine-item.units.index', compact('company_profiles'));
    }
    /**
     * Handle Units Fetch Data
    */
    public function getUnits(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = Unit::orderBy('id','desc')->latest();

        if( $query = $request->get('query')){
            $data->Where('units_name','LIKE','%'.$query.'%')
                ->orWhere('status','LIKE','%'.$query.'%');      
        } 
        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }
        $data = $data->paginate($perItem)->toArray();
        
        return response()->json( $data, 200);
    }
    /**
     * Handle Create Units Event
    */
    public function createUnits(Request $request)
    {
        $validators = validator::make($request->all(),[
            'units_name'=>'required|max:191',
        ],[
            'units_name.required'=>'The medicine dogs is required mandatory.',
        ]);
        if($validators->fails()){
            return response()->json([
                'status'=> 400,
                'errors' =>$validators->messages(),
            ]);
        }    
        else{
            $units = new Unit;
            $units->units_name = $request->input('units_name');
            $units->save();
            return response()->json([
                'status'=> 200,
                'messages'=> 'Unit has added successfully',
            ]);
        }
    }
    /**
     * Handle Edit Units Event
    */
    public function editUnits($id)
    {
        $units = Unit::find($id);
        if($units){
            return response()->json([
                'status'=> 200,
                'messages'=> $units,
            ]);
        }
        else{
            return response()->json([
                'status'=> 404,
                'messages'=> 'Unit is not found',
            ]);
        }
    }
    /**
     * Handle Update Units Event
    */
    public function updateUnits(Request $request, $id)
    {
        // validation
        $validator = validator::make($request->all(),[
            'units_name'=>'required|max:191',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=> 400,
                'errors'=> $validator->messages(),
            ]);
        }    
        else{
            $units = Unit::find($id);
            if($units){
                $units->units_name = $request->input('units_name');
                $units->update();
                return response()->json([
                    'status'=> 200,
                    'messages'=> 'Unit has updated successfully',
                ]);
            }
            else{
                return response()->json([
                    'status'=> 404,
                    'messages'=> 'Unit is not found',
                ]);
            } 
        }
    }
    /**
     * Handle Delete Units Event
    */
    public function deleteUnits($id)
    {
        $units = Unit::find($id);
        $units->delete();

        return response()->json([
            'status'=> 200,
            'messages'=> 'Unit is deleted successfully',
        ]);
    }
    /**
     * Handle Units Status Update
    */
    public function UnitsStatusUpdate(Request $request)
    {
        $id = (int)$request->input('id');
        $status = (bool)$request->input('status');
        $status = !$status;

        $data = Unit::findOrFail( $id);

        $data->update([
            'status' => (int)$status,
        ]);

        return response()->json([
            'messages' => 'Unit Permission has Updated Successfully',
            'code' => 202,
        ], 202);
    }


    // ========================= Origin ========================================
    // =========================================================================
    /**
     * Handle Origin View
    */
    public function viewOrigin()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        return view('super-admin.medicine-item.origin.index', compact('company_profiles'));
    }
    /**
     * Handle Origin Name Fetch Data
    */
    public function getOrigin(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = MedicineOrigin::orderBy('id','desc')->latest();

        if( $query = $request->get('query')){
            $data->Where('origin_name','LIKE','%'.$query.'%')
                ->orWhere('status','LIKE','%'.$query.'%');      
        } 
        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }
        $data = $data->paginate($perItem)->toArray();
        
        return response()->json( $data, 200);
    }
    /**
     * Handle Create Origin Event
    */
    public function createOrigins(Request $request)
    {
        // validation
        $validators = validator::make($request->all(),[
            'origin_name'=>'required|max:191|unique:medicine_origins',
        ],[
            'origin_name.required'=>'The medicine origin is required mandatory.',
            'origin_name.unique'=>'The medicine origin has already been taken.',
        ]);
        if($validators->fails()){
            return response()->json([
                'status'=> 400,
                'errors' =>$validators->messages(),
            ]);
        }    
        else{
            $origins = new MedicineOrigin;
            $origins->origin_name = $request->input('origin_name');
            $origins->save();
            return response()->json([
                'status'=> 200,
                'messages'=> 'The Medicine Origin has added successfully',
            ]);
        }
    }
    /**
     * Handle Edit Origin Event
    */
    public function editOrigins($id)
    {
        $origins = MedicineOrigin::find($id);
        if($origins){
            return response()->json([
                'status'=> 200,
                'messages'=> $origins,
            ]);
        }
        else{
            return response()->json([
                'status'=> 404,
                'messages'=> 'The medicine origin is not found',
            ]);
        }
    }
    /**
     * Handle Update Origin Event
    */
    public function updateOrigins(Request $request, $id)
    {
        // validation
        $validator = validator::make($request->all(),[
            'origin_name'=>'required|max:191|unique:medicine_origins,origin_name,' .$id,
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=> 400,
                'errors'=> $validator->messages(),
            ]);
        }    
        else{
            $origins = MedicineOrigin::find($id);
            if($origins){
                $origins->origin_name = $request->input('origin_name');
                $origins->update();
                return response()->json([
                    'status'=> 200,
                    'messages'=> 'The medicine origin has updated successfully',
                ]);
            }
            else{
                return response()->json([
                    'status'=> 404,
                    'messages'=> 'The medicine origin is not found',
                ]);
            } 
        }
    }
    /**
     * Handle Delete Origin Event
    */
    public function deleteOrigins($id)
    {
        $origins = MedicineOrigin::find($id);
        $origins->delete();

        return response()->json([
            'status'=> 200,
            'messages'=> 'The medicine origin is deleted successfully',
        ]);
    }
    /**
     * Handle Origin Status Update
    */
    public function originStatusUpdate(Request $request)
    {
        $id = (int)$request->input('id');
        $status = (bool)$request->input('status');
        $status = !$status;

        $data = MedicineOrigin::findOrFail( $id);

        $data->update([
            'status' => (int)$status,
        ]);

        return response()->json([
            'messages' => 'The medicine origin Permission has Updated Successfully',
            'code' => 202,
        ], 202);
    }


    // ========================= Product Model =================================
    // =========================================================================
    /**
     * Handle Product Model View
    */
    public function viewProductModel()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        $products = Product::all();
        return view('super-admin.medicine-item.model.index', compact('company_profiles','products'));
    }
    /**
     * Handle Product Model Fetch Data
    */
    public function getProductModels(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = ProductModel::with(['products'])->orderBy('id','desc')->latest();

        if( $query = $request->get('query')){
            $data->Where('product_id', 'LIKE','%'.$query.'%')
                ->orWhere('model_name','LIKE','%'.$query.'%')
                ->orWhere('status','LIKE','%'.$query.'%');      
        } 
        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }
        $data = $data->paginate($perItem)->toArray();
        
        return response()->json( $data, 200);
    }
    /**
     * Handle Product Data Get
    */
    public function getDataProducts(Request $request)
    {
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = Product::orderBy('id','desc')->latest();

        if( $query = $request->get('query')){
            $data->Where('product_name','LIKE','%'.$query.'%')
                ->orWhere('status','LIKE','%'.$query.'%');      
        } 
        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }
        $data = $data->paginate($perItem)->toArray();
        
        return response()->json( $data, 200);
    }
    /**
     * Handle Create Product Model Event
    */
    public function createProductModels(Requset $request)
    {
        // validation
        $validators = validator::make($request->all(),[
            'model_name'=>'required|max:191',
            'product_id' =>'required',
        ],[
            'model_name.required'=>'The model name is required mandatory.',
            'product_id.required'=>'The product id is required mandatory.',
        ]);
        if($validators->fails()){
            return response()->json([
                'status'=> 400,
                'errors' =>$validators->messages(),
            ]);
        }    
        else{
            $product_models = new ProductModel;
            $product_models->model_name = $request->input('model_name');
            $product_models->product_id = $request->input('product_id');
            $product_models->save();
            return response()->json([
                'status'=> 200,
                'messages'=> 'The Product Model has added successfully',
            ]);
        }
    }
    /**
     * Handle Edit Product Model Event
    */
    public function editProductModels($id)
    {
        $product_models = ProductModel::find($id);
        if($product_models){
            return response()->json([
                'status'=> 200,
                'messages'=> $product_models,
            ]);
        }
        else{
            return response()->json([
                'status'=> 404,
                'messages'=> 'The product model is not found',
            ]);
        }
    }
    /**
     * Handle Update Product Model Event
    */
    public function updateProductModels(Request $request, $id)
    {
        $validator = validator::make($request->all(),[
            'model_name'=>'required|max:191',
            'product_id'=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=> 400,
                'errors'=> $validator->messages(),
            ]);
        }    
        else{
            $product_models = ProductModel::find($id);
            if($product_models){
                $product_models->model_name = $request->input('model_name');
                $product_models->product_id = $request->input('product_id');
                $product_models->update();
                return response()->json([
                    'status'=> 200,
                    'messages'=> 'The product model has updated successfully',
                ]);
            }
            else{
                return response()->json([
                    'status'=> 404,
                    'messages'=> 'The product model is not found',
                ]);
            } 
        }
    }
    /**
     * Handle Delete Product Model Event
    */
    public function deleteProductModels($id)
    {
        $product_models = ProductModel::find($id);
        $product_models->delete();

        return response()->json([
            'status'=> 200,
            'messages'=> 'The product model is deleted successfully',
        ]);
    }
    /**
     * Handle Product Model Status Update
    */
    public function ProductModelStatusUpdate(Request $request)
    {
        $id = (int)$request->input('id');
        $status = (bool)$request->input('status');
        $status = !$status;

        $data = ProductModel::findOrFail( $id);

        $data->update([
            'status' => (int)$status,
        ]);

        return response()->json([
            'messages' => 'The product model Permission has Updated Successfully',
            'code' => 202,
        ], 202);
    }

}
