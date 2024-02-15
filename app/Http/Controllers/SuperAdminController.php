<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CompanyProfile;
use App\Models\Product;
use App\Models\Role;
use App\Models\SubCategory;
use App\Models\Supplier\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;

class SuperAdminController extends Controller
{
    //  Show Super Admin Dashboard Page
    public function dashboard()
    {
        
        $usersCount = [
            'users' => User::where('role', 0)->count(),
            'super_admin' => User::where('role', 1)->count(),
            'sub_admin' => User::where('role', 2)->count(),
            'admin' => User::where('role', 3)->count(),
        ];
        $users = User::latest()->paginate(1);

        $userCountCurentYear = [
            'users' => $this->getUserCounts(0),
            'super_admin' =>  $this->getUserCounts(1),
            'sub_admin' =>  $this->getUserCounts(2),
            'admin' =>  $this->getUserCounts(3),
        ];

        $user = Auth::user();

        // Category
        $categories = Category::orderBy('id', 'desc')->where('status', '=', 1)->get();
        $category_counts = $categories->count();
        // Sub Category
        $subCategories = SubCategory::orderBy('id', 'desc')->where('status', '=', 1)->get();
        $subCategory_counts = $subCategories->count();
        // Brand
        $brands = Brand::orderBy('id', 'desc')->where('status', '=', 1)->get();
        $brand_counts = $brands->count();
        // Product
        $products = Product::orderBy('id', 'desc')->where('status', '=', 1)->get();
        $product_counts = $products->count();
        // Supplier
        $supplier_counts = Supplier::where('type','Supplier')->where('supplier_status',1)->count();
        $vendor_counts = Supplier::where('type','Vendor')->where('supplier_status',1)->count();

        return view('super-admin.dashboard', compact('users', 'user', 'usersCount', 'userCountCurentYear','category_counts','subCategory_counts','brand_counts','product_counts',
        'supplier_counts','vendor_counts'));
    }

    private function getUserCounts($role)  {
        
        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            $data[$i] = $i;
        }
        $year = date("Y"); 

        foreach (User::getUserCounts($role) as $key => $user) {
            $month = (int)\str_replace("{$year}-", '', $user->month);
            $data[$month] = $user->user_count;
        }
        return  $data ;
    }
    //  Show Super Admin Get User Page

    public function users()
    {
        $users = User::latest()->paginate(1);

        return view('super-admin.users', compact('users'));
    }
    // Account-Holders Data----------
    public function accounts_holders(Request $request)
    {

        $roles = Role::all();

        $search = $request['search'] ?? "";
        if ($search != null) {
            $users = User::where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->orWhere('contract_number', 'LIKE', '%' . $search . '%')
                ->orWhere('role', 'LIKE', '%' . $search . '%')
                ->orWhere('id', 'LIKE', '%' . $search . '%')
                ->get();
        } else {
            $users = User::latest()->paginate(1);
        }
        return view('super-admin.account-holders.account-holders_list', compact('roles','users'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    // Fetch Users Data-----------
    public function getusers(Request $request)
    {
        $users = User::orderBy('id', 'desc')->latest()->where('role', '!=', 1)->with(['roles']);

        if ($query = $request->get('query')) {
            $users->where('name', 'LIKE', '%' . $query . '%')
                ->orWhere('email', 'LIKE', '%' . $query . '%')
                ->orWhere('contract_number', 'LIKE', '%' . $query . '%')
                ->orWhere('role', 'LIKE', '%' . $query . '%')
                ->orWhere('id', 'LIKE', '%' . $query . '%');
        }

        $perItem = 10;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }

        $users = $users->paginate($perItem)->toArray();

        return response()->json($users, 200);
    }
    // Update User Status---------
    public function update_status(Request $request)
    {
        $id = (int)$request->input('id');
        $status = (bool)$request->input('status');
        $status = !$status;

        $data = User::findOrFail($id);

        $data->update([
            'status' => (int)$status,
        ]);

        return response()->json([
            'messages' => 'User Status Update Successfully',
            'code' => 202,
        ], 202);
    }
    // Edit Users Data-----------
    public function editUsers($id)
    {
        $users = User::findOrFail($id);

        return response()->json([
            'status' => 200,
            'messages' => $users,
            'data' => $users
        ]);
    }
    // View Users Data-----------
    public function showUsers($id)
    {
        $users = User::findOrFail($id);

        if ($users) {
            return response()->json([
                'status' => 200,
                'messages' => $users,
                'data' => $users
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'messages' => 'User is not found!',
            ]);
        }
    }
    // Update Users Data------------
    public function updateUsers(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|max:120',
            'contract_number' => 'required|min:11',
            'email' => 'email|required|max:100',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->contract_number = $request->input('contract_number');

        if ($request->hasFile('image')) {
            $path = 'image/' . $user->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('image/', $filename);
            $user->image = $filename;
        }
        $user->save();

        return response()->json([
            'status' => 200,
            'messages' => 'User account is updated successfully',
            // 'data' => $user->toArray(),
        ]);
    }

    // Delete Users Data-----------
    public function deleteUsers($id)
    {
        $users = User::find($id);
        $users->delete();

        return response()->json([
            'status' => 200,
            'messages' => 'User account is deleted successfully',
        ]);
    }

    // Manage Role-----------
    public function manageRole()
    {
        $users = User::all();
        $company_profiles = companyProfile::where('id', '=', 1)->get();
        $roles = Role::all();
        return view('super-admin.manage-role', compact('users', 'roles'), compact('company_profiles', 'users', 'roles'));
    }
    // Update Manage Role-----------
    public function updateRole(Request $request)
    {
        User::where('id', $request->user_id)->update([
            'role' => $request->role_id
        ]);
        return redirect()->back()->with('success', 'User role and permission is updated');
    }

    // Company Profile--------------
    public function appSetting()
    {
        return view('super-admin.setting.app-setting.index');
    }

    // Company Profile Update--------------
    public function appSettingUpdate(Request $request)
    {
       // return dd($request->all());
        $request->validate([
            'name' => 'required|max:191',
            'address' => 'required|max:191',
            'update_company_logo'=>'required',
            'update_slider1'=>'required',
            'update_slider2'=>'required',
            'update_slider3'=>'required',
            // Page title
            'title' => 'required|max:191',
            'sub_title' => 'required|max:191',
            'register_page_title'=>'required',
            'register_page_sub_title'=>'required',
            'forgot_page_title'=>'required',
            'forgot_page_sub_title'=>'required',
            'reset_page_title'=>'required',
            'reset_page_sub_title'=>'required',
            // Social Media
            'update_social_media_facebook_link'=>'required',
            'update_social_media_messanger_link'=>'required',
            'update_social_media_whatsapp_link'=>'required',
            'update_social_media_linkedin_link'=>'required',
            'update_social_media_facebook'=>'required',
            'update_social_media_messanger'=>'required',
            'update_social_media_whatsapp'=>'required',
            'update_social_media_linkedin'=>'required',
            // Purchases Moduel
            'purches_moduel' => 'required|max:191',
            //'product' => 'required|max:191',
            'purchases_display' => 'required',
            'product_display' => 'required',
            'categ_title_display' => 'required',
            // Category
            'category' => 'required|max:191',
            'add_category' => 'required|max:191',
            'category_url' => 'required',
            'category_display' => 'required',
            // Sub Category
            'sub_category_name' => 'required',
            'sub_categ_title_visual' => 'required',
            'sub_category_title_text' => 'required',
            'subcategory_link' => 'required',
            'subcategory_visual' => 'required',
            // Group
            'group_name'=> 'required',
            'group_title_visual'=> 'required',
            'add_group_title'=> 'required',
            'product_group_link'=> 'required',
            'group_visual'=> 'required',
            // Medicine name
            'medicine_name'=>'required',
            'medicine_title_visual'=>'required',
            'add_medicine_title'=>'required',
            'medicine_group_link'=>'required',
            'medicine_visual'=>'required',
            // Medicine dosage
            'add_medicine_dosage_title'=>'required',
            'medicine_dosage_link'=>'required',
            'medicine_dosage_visual'=>'required',
            // Medicine origin
            'add_medicine_origin_title'=>'required',
            'medicine_oriign_link'=>'required',
            'medicine_origin_visual'=>'required',
            // Product Mdoel
            'product_model_title' =>'required',
            'product_model_title_display' =>'required',
            'add_model_title' =>'required',
            'model_link' =>'required',
            'model_visual' =>'required',
            // Product Size or Unit
            'unit_title'=>'required',
            'unit_title_display'=>'required',
            'add_unit_title'=>'required',
            'unit_link'=>'required',
            'unit_visual'=>'required',
            // Brand
            'brand_title'=>'required',
            'brand_title_display'=>'required',
            'add_brand_title'=>'required',
            'brand_link'=>'required',
            'brand_visual'=>'required',
            // Product
            // 'product'=>'required',
            'product_title_display'=>'required',
            'add_Prodcut_title'=>'required',
            'product_link'=>'required',
            'product_visual_'=>'required',
            // Stock
            'stock_head_title'=>'required',
            'stock_head_title_display'=>'required',
            'stock_title'=>'required',

            'stock_title_display'=>'required',
            'stock_book_title'=>'required',
            'stock_book_link'=>'required',
            'stock_book_visual'=>'required',

            'add_adjustment_title'=>'required',
            'adjustment_link'=>'required',
            'adjustment_visual'=>'required',

            'add_dmage_stock_title'=>'required',
            'damage_stock_link'=>'required',
            'damage_stock_visual'=>'required',

            'add_stock_summary_title'=>'required',
            'stock_summary_link'=>'required',
            'stock_summary_visual'=>'required',

            'add_stock_report_title'=>'required',
            'stock_report_link'=>'required',
            'stock_report_visual'=>'required',

            // Inventory
            'inventory_title'=>'required',
            'invnetory_title_display'=>'required',
            'invnetory_details_title'=>'required',
            'inventory_details_link'=>'required',
            'inventory_details_visual'=>'required',
            'authorization_title'=>'required',
            'authorization_link'=>'required',
            'inventory_visual'=>'required',

            // Supplier
            'supplier_title'=>'required',
            'supplier_title_visual'=>'required',
            'add_supplier_setup_title'=>'required',
            'supplier_setup_link'=>'required',
            'supplier_setup_display'=>'required',
            'suppiler_setup_title'=>'required',
            'supplier_details_setup_link'=>'required',
            'supplier_details_display'=>'required',
            'supplier_requisition_title'=>'required',
            'supplier_requisition_link'=>'required',
            'supplier_requisition_display'=>'required',

            // Accounts Moduel
            'accounts_moduel_title'=>'required',
            'accounts_moduel_display'=>'required',
            // Lager
            'lager_title'=>'required',
            'lager_display'=>'required',
            // Dary Book
            'day_book_title'=>'required',
            'day_book_title_display'=>'required',
            'day_book_entry_title'=>'required',
            'day_book_entry_link'=>'required',
            'day_book_entry_visual'=>'required',
            'day_book_view_title'=>'required',
            'day_book_view_link'=>'required',
            'day_book_view_visual'=>'required',
            'day_book_set_title'=>'required',
            'day_book_setting_link'=>'required',
            'day_book_setting_visual'=>'required',
            // Expenses
            'expenses_title'=>'required',
            'expenses_title_display'=>'required',
            'type_of_expenses_entry_title'=>'required',
            'type_of_expenses_link'=>'required',
            'type_of_expenses_visual'=>'required',
            'add_expenses_title'=>'required',
            'add_expenses_link'=>'required',
            'add_expenses_visual'=>'required',
            'list_expenses_title'=>'required',
            'list_expenses_link'=>'required',
            'list_expenses_visual'=>'required',
            'setting_expenses_title'=>'required',
            'setting_expenses_link'=>'required',
            'setting_expenses_visual'=>'required',
            // Customer
            'customer_title'=>'required',
            'customer_title_display'=>'required',
            'add_customer_title'=>'required',
            'add_customer_link'=>'required',
            'customer_visual'=>'required',
            'customer_due_title'=>'required',
            'customer_due_link'=>'required',
            'customer_due_visual'=>'required',
            'customer_details_title'=>'required',
            'customer_details_link'=>'required',
            'customer_details_visual'=>'required',
            'customer_setting_title'=>'required',
            'customer_setting_link'=>'required',
            'customer_setting_visual'=>'required',
            // Petty Cash
            'petty_cash_title'=>'required',
            'petty_cash_title_display'=>'required',
            'add_petty_cash_title'=>'required',
            'add_petty_cash_link'=>'required',
            'petty_cash_visual'=>'required',
            'all_transaction_title'=>'required',
            'all_transaction_link'=>'required',
            'all_transaction_visual'=>'required',
            'petty_cash_details_title'=>'required',
            'petty_cash_details_link'=>'required',
            'petty_cash_details_visual'=>'required',
            'petty_cash_setting_title'=>'required',
            'petty_cash_setting_link'=>'required',
            'petty_cash_setting_visual'=>'required',
            // Bank
            'bank_title'=>'required',
            'bank_title_display'=>'required',
            'add_list_title'=>'required',
            'add_list_link'=>'required',
            'list_visual'=>'required',
            'bank_transaction_title'=>'required',
            'bank_transaction_link'=>'required',
            'bank_transaction_visual'=>'required',
            'details_record_title'=>'required',
            'details_record_link'=>'required',
            'details_record_visual'=>'required',
            'bank_setting_title'=>'required',
            'bank_setting_link'=>'required',
            'bank_setting_visual'=>'required',
            // Tax/Vat
            'tax_vat_title'=>'required',
            'tax_vat_title_display'=>'required',
            'add_tax_vat_title'=>'required',
            'add_tax_vat_link'=>'required',
            'tax_vat_visual'=>'required',
            'list_vat_tax_title'=>'required',
            'list_vat_tax_link'=>'required',
            'list_vat_tax_visual'=>'required',
            'details_records_title'=>'required',
            'details_records_link'=>'required',
            'details_records_visual'=>'required',
            'vat_tax_setting_title'=>'required',
            'vat_tax_setting_link'=>'required',
            'vat_tax_setting_visual'=>'required',
            // Sales
            'sales_title'=>'required',
            'sales_title_display'=>'required',
            // Order
            'order_title'=>'required',
            'order_title_display'=>'required',
            'add_order_title'=>'required',
            'add_order_link'=>'required',
            'order_visual'=>'required',
            'order_list_title'=>'required',
            'order_list_link'=>'required',
            'order_list_visual'=>'required',
            'order_setting_title'=>'required',
            'order_setting_link'=>'required',
            'order_setting_visual'=>'required',
            // Invoice
            'invoice_title'=>'required',
            'invoice_title_display'=>'required',
            'add_invoice_title'=>'required',
            'add_invoice_link'=>'required',
            'invoice_visual'=>'required',
            'invocie_setting_title'=>'required',
            'invoice_setting_link'=>'required',
            'invoice_setting_visual'=>'required',
            // Sales-Region
            'sales_region_title'=>'required',
            'sales_region_title_display'=>'required',
            'sales_region_list_title'=>'required',
            'sales_region_list_link'=>'required',
            'sales_region_list_visual'=>'required',
            'region_base_sales_title'=>'required',
            'region_base_sales_link'=>'required',
            'region_base_sales_visual'=>'required',
            'region_sales_setting_title'=>'required',
            'region_sales_setting_link'=>'required',
            'region_sales_setting_visual'=>'required',
            // Vaoucher
            'vaoucher_title'=>'required',
            'vaoucher_title_display'=>'required',
            // Vaoucher Category
            'vaoucher_category_title'=>'required',
            'vaoucher_category_title_display'=>'required',
            'vaoucherCategy_title'=>'required',
            'vaoucherCategy_link'=>'required',
            'vaoucherCategy_visual'=>'required',
            'vaoucher_list_title'=>'required',
            'vaoucher_list_link'=>'required',
            'vaoucher_list_visual'=>'required',
            // Vaoucher Setting
            'main_vaoucher_title'=>'required',
            'main_vaoucher_title_display'=>'required',
            'add_vaoucher_title'=>'required',
            'add_vaoucher_link'=>'required',
            'add_vaoucher_visual'=>'required',
            'vaoucher_details_title'=>'required',
            'vaoucher_details_link'=>'required',
            'vaoucher_details_visual'=>'required',
            'vaoucher_setting_title'=>'required',
            'vaoucher_setting_link'=>'required',
            'vaoucher_setting_visual'=>'required',
            // Asset
            'asset_title'=>'required',
            'asset_title_display'=>'required',
            // New Asset
            'new_asset_title'=>'required',
            'new_asset_title_display'=>'required',
            'add_asset_title'=>'required',
            'add_asset_link'=>'required',
            'add_asset_visual'=>'required',
            'asset_details_title'=>'required',
            'asset_details_link'=>'required',
            'asset_details_visual'=>'required',
            // Asset-Details
            'details_asset_title'=>'required',
            'details_asset_title_display'=>'required',
            'previous_asset_title'=>'required',
            'previous_asset_link'=>'required',
            'previous_asset_visual'=>'required',
            'current_asset_title'=>'required',
            'current_asset_link'=>'required',
            'current_asset_visual'=>'required',
            'asset_detls_title'=>'required',
            'asset_detls_link'=>'required',
            'aasset_detls_visual'=>'required',
            'asset_setting_title'=>'required',
            'asset_setting_link'=>'required',
            'asset_setting_visual'=>'required',
            // Report
            'report_title'=>'required',
            'report_title_display'=>'required',
            // Accounting Report
            'acc_report_title'=>'required',
            'acc_report_title_display'=>'required',
            'blance_sheet_title'=>'required',
            'blance_sheet_link'=>'required',
            'blance_sheet_visual'=>'required',
            'trial_blance_sheet_title'=>'required',
            'trial_blance_sheet_link'=>'required',
            'trial_blance_sheet_visual'=>'required',
            'financial_statement_title'=>'required',
            'financial_statement_link'=>'required',
            'financial_statement_visual'=>'required',
            'income_statement_title'=>'required',
            'income_statement_link'=>'required',
            'income_statement_visual'=>'required',
            'cash_flow_statement_title'=>'required',
            'cash_flow_statement_link'=>'required',
            'cash_flow_statement_visual'=>'required',
            'petty_cash_statement_title'=>'required',
            'petty_cash_statement_link'=>'required',
            'petty_cash_statement_visual'=>'required',
            'p_l_statement_title'=>'required',
            'p_l_statement_link'=>'required',
            'p_l_statement_visual'=>'required',
            'tabular_analycis_title'=>'required',
            'tabular_analycis_link'=>'required',
            'tabular_analycis_visual'=>'required',
            'table_blance_sheet_title'=>'required',
            'table_blance_sheet_link'=>'required',
            'table_blance_sheet_visual'=>'required',
            'report_setting_title'=>'required',
            'report_setting_link'=>'required',
            'report_setting_visual'=>'required',
            // Monthly Report
            'acc_monthly_report_title'=>'required',
            'acc_monthly_report_title_display'=>'required',
            'monthly_report_view_title'=>'required',
            'monthly_report_view_link'=>'required',
            'monthly_report_view_visual'=>'required',
            'monthly_report_setting_title'=>'required',
            'monthly_report_setting_link'=>'required',
            'monthly_report_setting_visual'=>'required',
            // Daily Report
            'daily_report_title'=>'required',
            'daily_report_title_display'=>'required',
            'daily_report_view_title'=>'required',
            'daily_report_view_link'=>'required',
            'daily_report_view_visual'=>'required',
            'daily_report_setting_title'=>'required',
            'daily_report_setting_link'=>'required',
            'daily_report_setting_visual'=>'required',
            // HRM Management
            'hrm_moduel_title'=>'required',
            'hrm_moduel_display'=>'required',
            'hrm_title'=>'required',
            'hrm_visual'=>'required',
            // Authentication
            'auth_moduel_title'=>'required',
            'auth_moduel_display'=>'required',
            'auth_title'=>'required',
            'auth_visual'=>'required',
            // Layouts
            'layouts_moduel_title'=>'required',
            'layouts_moduel_display'=>'required',
            // Components
            'components_moduel_title'=>'required',
            'components_moduel_display'=>'required',
            // Footer
            'footer_moduel_title'=>'required',
            'footer_moduel_display'=>'required',
            // Topbar
            'topbar_moduel_display'=>'required',
            'topbar_searchbtn_moduel_display'=>'required',
            // Navbar
            'navbar_stock_moduel_display'=>'required',
            'navbar_supplier_moduel_display'=>'required',
            'navbar_pivot_moduel_display'=>'required',
            'navbar_item_list_moduel_display'=>'required',
            'navbar_order_box_moduel_display'=>'required',
            'navbar_all_moduel_display'=>'required',
            
        ]);
        //update 
        setting([
            'company_name' => $request->input('name'),
            'company_address' => $request->input('address'),
            'update_company_logo' => $request->input('update_company_logo'),
            'update_slider1' => $request->input('update_slider1'),
            'update_slider2' => $request->input('update_slider2'),
            'update_slider3' => $request->input('update_slider3'),
            // Page title
            'login_page_title' => $request->input('title'),
            'page_sub_title' => $request->input('sub_title'),
            'register_page_title' => $request->input('register_page_title'),
            'register_page_sub_title' => $request->input('register_page_sub_title'),
            'forgot_page_title' => $request->input('forgot_page_title'),
            'forgot_page_sub_title' => $request->input('forgot_page_sub_title'),
            'reset_page_title' => $request->input('reset_page_title'),
            'reset_page_sub_title' => $request->input('reset_page_sub_title'),
            
            // Purchases Moduel
            'purches_moduel_title' => $request->input('purches_moduel'),
            'product_title' => $request->input('product', ' '),
            'purchases_visual' => $request->input('purchases_display'),
            'product_visual' => $request->input('product_display'),
            // Category
            'categ_title_visual' => $request->input('categ_title_display'),
            'category_title' => $request->input('category'),
            'add_category_title' => $request->input('add_category'),
            'category_link' => $request->input('category_url'),
            'category_visual' => $request->input('category_display'),
            // Sub Category
            'sub_category_name' => $request->input('sub_category_name'),
            'sub_categ_title_visual' => $request->input('sub_categ_title_visual'),
            'sub_category_title_text' => $request->input('sub_category_title_text'),
            'subcategory_link' => $request->input('subcategory_link'),
            'subcategory_visual' => $request->input('subcategory_visual'),
            // Group
            'group_name' => $request->input('group_name'),
            'group_title_visual' => $request->input('group_title_visual'),
            'add_group_title' => $request->input('add_group_title'),
            'product_group_link' => $request->input('product_group_link'),
            'group_visual' => $request->input('group_visual'),
            //Medicine name
            'medicine_name' => $request->input('medicine_name'),
            'medicine_title_visual' => $request->input('medicine_title_visual'),
            'add_medicine_title' => $request->input('add_medicine_title'),
            'medicine_group_link' => $request->input('medicine_group_link'),
            'medicine_visual' => $request->input('medicine_visual'),
            // Medicine dosage
            'add_medicine_dosage_title' => $request->input('add_medicine_dosage_title'),
            'medicine_dosage_link' => $request->input('medicine_dosage_link'),
            'medicine_dosage_visual' => $request->input('medicine_dosage_visual'),
            // Medicine origin
            'add_medicine_origin_title' => $request->input('add_medicine_origin_title'),
            'medicine_oriign_link' => $request->input('medicine_oriign_link'),
            'medicine_origin_visual' => $request->input('medicine_origin_visual'),
            // Product Model
            'product_model_title' => $request->input('product_model_title'),
            'product_model_title_display' => $request->input('product_model_title_display'),
            'add_model_title' => $request->input('add_model_title'),
            'model_link' => $request->input('model_link'),
            'model_visual' => $request->input('model_visual'),
            // Product Size or Unit
            'unit_title' => $request->input('unit_title'),
            'unit_title_display' => $request->input('unit_title_display'),
            'add_unit_title' => $request->input('add_unit_title'),
            'unit_link' => $request->input('unit_link'),
            'unit_visual' => $request->input('unit_visual'),
            // Brand
            'brand_title' => $request->input('brand_title'),
            'brand_title_display' => $request->input('brand_title_display'),
            'add_brand_title' => $request->input('add_brand_title'),
            'brand_link' => $request->input('brand_link'),
            'brand_visual' => $request->input('brand_visual'),
            // Product
            'product' => $request->input('product_title'),
            'product_title_display' => $request->input('product_title_display'),
            'add_Prodcut_title' => $request->input('add_Prodcut_title'),
            'product_link' => $request->input('product_link'),
            'product_visual_' => $request->input('product_visual_'),
            // Stock
            'stock_head_title' => $request->input('stock_head_title'),
            'stock_head_title_display' => $request->input('stock_head_title_display'),
            'stock_title' => $request->input('stock_title'),
            'stock_title_display' => $request->input('stock_title_display'),
            'stock_book_title' => $request->input('stock_book_title'),
            'stock_book_link' => $request->input('stock_book_link'),
            'stock_book_visual' => $request->input('stock_book_visual'),
            'add_adjustment_title' => $request->input('add_adjustment_title'),
            'adjustment_link' => $request->input('adjustment_link'),
            'adjustment_visual' => $request->input('adjustment_visual'),
            'add_dmage_stock_title' => $request->input('add_dmage_stock_title'),
            'damage_stock_link' => $request->input('damage_stock_link'),
            'damage_stock_visual' => $request->input('damage_stock_visual'),
            'add_stock_summary_title' => $request->input('add_stock_summary_title'),
            'stock_summary_link' => $request->input('stock_summary_link'),
            'stock_summary_visual' => $request->input('stock_summary_visual'),
            'add_stock_report_title' => $request->input('add_stock_report_title'),
            'stock_report_link' => $request->input('stock_report_link'),
            'stock_report_visual' => $request->input('stock_report_visual'),

            // Inventory
            'inventory_title' => $request->input('inventory_title'),
            'invnetory_title_display' => $request->input('invnetory_title_display'),
            'invnetory_details_title' => $request->input('invnetory_details_title'),
            'inventory_details_link' => $request->input('inventory_details_link'),
            'inventory_details_visual' => $request->input('inventory_details_visual'),
            'authorization_title' => $request->input('authorization_title'),
            'authorization_link' => $request->input('authorization_link'),
            'inventory_visual' => $request->input('inventory_visual'),

            // Supplier
            'supplier_title' => $request->input('supplier_title'),
            'supplier_title_visual' => $request->input('supplier_title_visual'),
            'add_supplier_setup_title' => $request->input('add_supplier_setup_title'),
            'supplier_setup_link' => $request->input('supplier_setup_link'),
            'supplier_setup_display' => $request->input('supplier_setup_display'),
            'suppiler_setup_title' => $request->input('suppiler_setup_title'),
            'supplier_details_setup_link' => $request->input('supplier_details_setup_link'),
            'supplier_details_display' => $request->input('supplier_details_display'),
            'supplier_requisition_title' => $request->input('supplier_requisition_title'),
            'supplier_requisition_link' => $request->input('supplier_requisition_link'),
            'supplier_requisition_display' => $request->input('supplier_requisition_display'),

            // Accounts Moduel
            'accounts_moduel_title' => $request->input('accounts_moduel_title'),
            'accounts_moduel_display' => $request->input('accounts_moduel_display'),
            // Lager
            'lager_title' => $request->input('lager_title'),
            'lager_display' => $request->input('lager_display'),
            // Day Book
            'day_book_title' => $request->input('day_book_title'),
            'day_book_title_display' => $request->input('day_book_title_display'),
            'day_book_entry_title' => $request->input('day_book_entry_title'),
            'day_book_entry_link' => $request->input('day_book_entry_link'),
            'day_book_entry_visual' => $request->input('day_book_entry_visual'),
            'day_book_view_title' => $request->input('day_book_view_title'),
            'day_book_view_link' => $request->input('day_book_view_link'),
            'day_book_view_visual' => $request->input('day_book_view_visual'),
            'day_book_set_title' => $request->input('day_book_set_title'),
            'day_book_setting_link' => $request->input('day_book_setting_link'),
            'day_book_setting_visual' => $request->input('day_book_setting_visual'),
            // Expenses
            'expenses_title' => $request->input('expenses_title'),
            'expenses_title_display' => $request->input('expenses_title_display'),
            'type_of_expenses_entry_title' => $request->input('type_of_expenses_entry_title'),
            'type_of_expenses_link' => $request->input('type_of_expenses_link'),
            'type_of_expenses_visual' => $request->input('type_of_expenses_visual'),
            'add_expenses_title' => $request->input('add_expenses_title'),
            'add_expenses_link' => $request->input('add_expenses_link'),
            'add_expenses_visual' => $request->input('add_expenses_visual'),
            'list_expenses_title' => $request->input('list_expenses_title'),
            'list_expenses_link' => $request->input('list_expenses_link'),
            'list_expenses_visual' => $request->input('list_expenses_visual'),
            'setting_expenses_title' => $request->input('setting_expenses_title'),
            'setting_expenses_link' => $request->input('setting_expenses_link'),
            'setting_expenses_visual' => $request->input('setting_expenses_visual'),
            // Customer
            'customer_title' => $request->input('customer_title'),
            'customer_title_display' => $request->input('customer_title_display'),
            'add_customer_title' => $request->input('add_customer_title'),
            'add_customer_link' => $request->input('add_customer_link'),
            'customer_visual' => $request->input('customer_visual'),
            'customer_due_title' => $request->input('customer_due_title'),
            'customer_due_link' => $request->input('customer_due_link'),
            'customer_due_visual' => $request->input('customer_due_visual'),
            'customer_details_title' => $request->input('customer_details_title'),
            'customer_details_link' => $request->input('customer_details_link'),
            'customer_details_visual' => $request->input('customer_details_visual'),
            'customer_setting_title' => $request->input('customer_setting_title'),
            'customer_setting_link' => $request->input('customer_setting_link'),
            'customer_setting_visual' => $request->input('customer_setting_visual'),
            // Petty Cash
            'petty_cash_title' => $request->input('petty_cash_title'),
            'petty_cash_title_display' => $request->input('petty_cash_title_display'),
            'add_petty_cash_title' => $request->input('add_petty_cash_title'),
            'add_petty_cash_link' => $request->input('add_petty_cash_link'),
            'petty_cash_visual' => $request->input('petty_cash_visual'),
            'all_transaction_title' => $request->input('all_transaction_title'),
            'all_transaction_link' => $request->input('all_transaction_link'),
            'all_transaction_visual' => $request->input('all_transaction_visual'),
            'petty_cash_details_title' => $request->input('petty_cash_details_title'),
            'petty_cash_details_link' => $request->input('petty_cash_details_link'),
            'petty_cash_details_visual' => $request->input('petty_cash_details_visual'),
            'petty_cash_setting_title' => $request->input('petty_cash_setting_title'),
            'petty_cash_setting_link' => $request->input('petty_cash_setting_link'),
            'petty_cash_setting_visual' => $request->input('petty_cash_setting_visual'),
            // Bank
            'bank_title' => $request->input('bank_title'),
            'bank_title_display' => $request->input('bank_title_display'),
            'add_list_title' => $request->input('add_list_title'),
            'add_list_link' => $request->input('add_list_link'),
            'list_visual' => $request->input('list_visual'),
            'bank_transaction_title' => $request->input('bank_transaction_title'),
            'bank_transaction_link' => $request->input('bank_transaction_link'),
            'bank_transaction_visual' => $request->input('bank_transaction_visual'),
            'details_record_title' => $request->input('details_record_title'),
            'details_record_link' => $request->input('details_record_link'),
            'details_record_visual' => $request->input('details_record_visual'),
            'bank_setting_title' => $request->input('bank_setting_title'),
            'bank_setting_link' => $request->input('bank_setting_link'),
            'bank_setting_visual' => $request->input('bank_setting_visual'),
            // Tax/Vat
            'tax_vat_title' => $request->input('tax_vat_title'),
            'tax_vat_title_display' => $request->input('tax_vat_title_display'),
            'add_tax_vat_title' => $request->input('add_tax_vat_title'),
            'add_tax_vat_link' => $request->input('add_tax_vat_link'),
            'tax_vat_visual' => $request->input('tax_vat_visual'),
            'list_vat_tax_title' => $request->input('list_vat_tax_title'),
            'list_vat_tax_link' => $request->input('list_vat_tax_link'),
            'list_vat_tax_visual' => $request->input('list_vat_tax_visual'),
            'details_records_title' => $request->input('details_records_title'),
            'details_records_link' => $request->input('details_records_link'),
            'details_records_visual' => $request->input('details_records_visual'),
            'vat_tax_setting_title' => $request->input('vat_tax_setting_title'),
            'vat_tax_setting_link' => $request->input('vat_tax_setting_link'),
            'vat_tax_setting_visual' => $request->input('vat_tax_setting_visual'),
            
            // Sales
            'sales_title' => $request->input('sales_title'),
            'sales_title_display' => $request->input('sales_title_display'),
            // Order
            'order_title' => $request->input('order_title'),
            'order_title_display' => $request->input('order_title_display'),
            'add_order_title' => $request->input('add_order_title'),
            'add_order_link' => $request->input('add_order_link'),
            'order_visual' => $request->input('order_visual'),
            'order_list_title' => $request->input('order_list_title'),
            'order_list_link' => $request->input('order_list_link'),
            'order_list_visual' => $request->input('order_list_visual'),
            'order_setting_title' => $request->input('order_setting_title'),
            'order_setting_link' => $request->input('order_setting_link'),
            'order_setting_visual' => $request->input('order_setting_visual'),
            // Invoice
            'invoice_title' => $request->input('invoice_title'),
            'invoice_title_display' => $request->input('invoice_title_display'),
            'add_invoice_title' => $request->input('add_invoice_title'),
            'add_invoice_link' => $request->input('add_invoice_link'),
            'invoice_visual' => $request->input('invoice_visual'),
            'invocie_setting_title' => $request->input('invocie_setting_title'),
            'invoice_setting_link' => $request->input('invoice_setting_link'),
            'invoice_setting_visual' => $request->input('invoice_setting_visual'),
            // Sales Region
            'sales_region_title' => $request->input('sales_region_title'),
            'sales_region_title_display' => $request->input('sales_region_title_display'),
            'sales_region_list_title' => $request->input('sales_region_list_title'),
            'sales_region_list_link' => $request->input('sales_region_list_link'),
            'sales_region_list_visual' => $request->input('sales_region_list_visual'),
            'region_base_sales_title' => $request->input('region_base_sales_title'),
            'region_base_sales_link' => $request->input('region_base_sales_link'),
            'region_base_sales_visual' => $request->input('region_base_sales_visual'),
            'region_sales_setting_title' => $request->input('region_sales_setting_title'),
            'region_sales_setting_link' => $request->input('region_sales_setting_link'),
            'region_sales_setting_visual' => $request->input('region_sales_setting_visual'),
            // Vaoucher
            'vaoucher_title' => $request->input('vaoucher_title'),
            'vaoucher_title_display' => $request->input('vaoucher_title_display'),
            // Vaoucher Category
            'vaoucher_category_title' => $request->input('vaoucher_category_title'),
            'vaoucher_category_title_display' => $request->input('vaoucher_category_title_display'),
            'vaoucherCategy_title' => $request->input('vaoucherCategy_title'),
            'vaoucherCategy_link' => $request->input('vaoucherCategy_link'),
            'vaoucherCategy_visual' => $request->input('vaoucherCategy_visual'),
            'vaoucher_list_title' => $request->input('vaoucher_list_title'),
            'vaoucher_list_link' => $request->input('vaoucher_list_link'),
            'vaoucher_list_visual' => $request->input('vaoucher_list_visual'),
            // Vaoucher Setting
            'main_vaoucher_title' => $request->input('main_vaoucher_title'),
            'main_vaoucher_title_display' => $request->input('main_vaoucher_title_display'),
            'add_vaoucher_title' => $request->input('add_vaoucher_title'),
            'add_vaoucher_link' => $request->input('add_vaoucher_link'),
            'add_vaoucher_visual' => $request->input('add_vaoucher_visual'),
            'vaoucher_details_title' => $request->input('vaoucher_details_title'),
            'vaoucher_details_link' => $request->input('vaoucher_details_link'),
            'vaoucher_details_visual' => $request->input('vaoucher_details_visual'),
            'vaoucher_setting_title' => $request->input('vaoucher_setting_title'),
            'vaoucher_setting_link' => $request->input('vaoucher_setting_link'),
            'vaoucher_setting_visual' => $request->input('vaoucher_setting_visual'),
            // Asset
            'asset_title' => $request->input('asset_title'),
            'asset_title_display' => $request->input('asset_title_display'),
            // New Asset
            'new_asset_title' => $request->input('new_asset_title'),
            'new_asset_title_display' => $request->input('new_asset_title_display'),
            'add_asset_title' => $request->input('add_asset_title'),
            'add_asset_link' => $request->input('add_asset_link'),
            'add_asset_visual' => $request->input('add_asset_visual'),
            'asset_details_title' => $request->input('asset_details_title'),
            'asset_details_link' => $request->input('asset_details_link'),
            'asset_details_visual' => $request->input('asset_details_visual'),
            'details_asset_title' => $request->input('details_asset_title'),
            // Asset Details
            'details_asset_title_display' => $request->input('details_asset_title_display'),
            'previous_asset_title' => $request->input('previous_asset_title'),
            'previous_asset_link' => $request->input('previous_asset_link'),
            'previous_asset_visual' => $request->input('previous_asset_visual'),
            'current_asset_title' => $request->input('current_asset_title'),
            'current_asset_link' => $request->input('current_asset_link'),
            'current_asset_visual' => $request->input('current_asset_visual'),
            'asset_detls_title' => $request->input('asset_detls_title'),
            'asset_detls_link' => $request->input('asset_detls_link'),
            'aasset_detls_visual' => $request->input('aasset_detls_visual'),
            'asset_setting_title' => $request->input('asset_setting_title'),
            'asset_setting_link' => $request->input('asset_setting_link'),
            'asset_setting_visual' => $request->input('asset_setting_visual'),
            // Report
            'report_title' => $request->input('report_title'),
            'report_title_display' => $request->input('report_title_display'),
            // Accounting Report
            'acc_report_title' => $request->input('acc_report_title'),
            'acc_report_title_display' => $request->input('acc_report_title_display'),
            'blance_sheet_title' => $request->input('blance_sheet_title'),
            'blance_sheet_link' => $request->input('blance_sheet_link'),
            'blance_sheet_visual' => $request->input('blance_sheet_visual'),
            'trial_blance_sheet_title' => $request->input('trial_blance_sheet_title'),
            'trial_blance_sheet_link' => $request->input('trial_blance_sheet_link'),
            'trial_blance_sheet_visual' => $request->input('trial_blance_sheet_visual'),
            'financial_statement_title' => $request->input('financial_statement_title'),
            'financial_statement_link' => $request->input('financial_statement_link'),
            'financial_statement_visual' => $request->input('financial_statement_visual'),
            'income_statement_title' => $request->input('income_statement_title'),
            'income_statement_link' => $request->input('income_statement_link'),
            'income_statement_visual' => $request->input('income_statement_visual'),
            'cash_flow_statement_title' => $request->input('cash_flow_statement_title'),
            'cash_flow_statement_link' => $request->input('cash_flow_statement_link'),
            'cash_flow_statement_visual' => $request->input('cash_flow_statement_visual'),
            'petty_cash_statement_title' => $request->input('petty_cash_statement_title'),
            'petty_cash_statement_link' => $request->input('petty_cash_statement_link'),
            'petty_cash_statement_visual' => $request->input('petty_cash_statement_visual'),
            'p_l_statement_title' => $request->input('p_l_statement_title'),
            'p_l_statement_link' => $request->input('p_l_statement_link'),
            'p_l_statement_visual' => $request->input('p_l_statement_visual'),
            'tabular_analycis_title' => $request->input('tabular_analycis_title'),
            'tabular_analycis_link' => $request->input('tabular_analycis_link'),
            'tabular_analycis_visual' => $request->input('tabular_analycis_visual'),
            'table_blance_sheet_title' => $request->input('table_blance_sheet_title'),
            'table_blance_sheet_link' => $request->input('table_blance_sheet_link'),
            'table_blance_sheet_visual' => $request->input('table_blance_sheet_visual'),
            'report_setting_title' => $request->input('report_setting_title'),
            'report_setting_link' => $request->input('report_setting_link'),
            'report_setting_visual' => $request->input('report_setting_visual'),
            // Monthly Report
            'acc_monthly_report_title' => $request->input('acc_monthly_report_title'),
            'acc_monthly_report_title_display' => $request->input('acc_monthly_report_title_display'),
            'monthly_report_view_title' => $request->input('monthly_report_view_title'),
            'monthly_report_view_link' => $request->input('monthly_report_view_link'),
            'monthly_report_view_visual' => $request->input('monthly_report_view_visual'),
            'monthly_report_setting_title' => $request->input('monthly_report_setting_title'),
            'monthly_report_setting_link' => $request->input('monthly_report_setting_link'),
            'monthly_report_setting_visual' => $request->input('monthly_report_setting_visual'),
            // Daily Report
            'daily_report_title' => $request->input('daily_report_title'),
            'daily_report_title_display' => $request->input('daily_report_title_display'),
            'daily_report_view_title' => $request->input('daily_report_view_title'),
            'daily_report_view_link' => $request->input('daily_report_view_link'),
            'daily_report_view_visual' => $request->input('daily_report_view_visual'),
            'daily_report_setting_title' => $request->input('daily_report_setting_title'),
            'daily_report_setting_link' => $request->input('daily_report_setting_link'),
            'daily_report_setting_visual' => $request->input('daily_report_setting_visual'),
            // Social Media
            'update_social_media_facebook_link' => $request->input('update_social_media_facebook_link'),
            'update_social_media_messanger_link' => $request->input('update_social_media_messanger_link'),
            'update_social_media_whatsapp_link' => $request->input('update_social_media_whatsapp_link'),
            'update_social_media_linkedin_link' => $request->input('update_social_media_linkedin_link'),
            'update_social_media_facebook' => $request->input('update_social_media_facebook'),
            'update_social_media_messanger' => $request->input('update_social_media_messanger'),
            'update_social_media_whatsapp' => $request->input('update_social_media_whatsapp'),
            'update_social_media_linkedin' => $request->input('update_social_media_linkedin'),
            // HRM Management
            'hrm_moduel_title' => $request->input('hrm_moduel_title'),
            'hrm_moduel_display' => $request->input('hrm_moduel_display'),
            'hrm_title' => $request->input('hrm_title'),
            'hrm_visual' => $request->input('hrm_visual'),
            // Authentication
            'auth_moduel_title' => $request->input('auth_moduel_title'),
            'auth_moduel_display' => $request->input('auth_moduel_display'),
            'auth_title' => $request->input('auth_title'),
            'auth_visual' => $request->input('auth_visual'),
            // Layouts
            'layouts_moduel_title' => $request->input('layouts_moduel_title'),
            'layouts_moduel_display' => $request->input('layouts_moduel_display'),
            // Components
            'components_moduel_title' => $request->input('components_moduel_title'),
            'components_moduel_display' => $request->input('components_moduel_display'),
            // Footer
            'footer_moduel_title' => $request->input('footer_moduel_title'),
            'footer_moduel_display' => $request->input('footer_moduel_display'),
            // Topbar
            'topbar_moduel_display' => $request->input('topbar_moduel_display'),
            'topbar_searchbtn_moduel_display' => $request->input('topbar_searchbtn_moduel_display'),
            // Navbar
            'navbar_stock_moduel_display' => $request->input('navbar_stock_moduel_display'),
            'navbar_supplier_moduel_display' => $request->input('navbar_supplier_moduel_display'),
            'navbar_pivot_moduel_display' => $request->input('navbar_pivot_moduel_display'),
            'navbar_item_list_moduel_display' => $request->input('navbar_item_list_moduel_display'),
            'navbar_order_box_moduel_display' => $request->input('navbar_order_box_moduel_display'),
            'navbar_all_moduel_display' => $request->input('navbar_all_moduel_display'),
            
        ]);

        return response()->json([
            'status' => 200,
            'messages' => 'App setting is updated successfully',
        ]);
    }
}
