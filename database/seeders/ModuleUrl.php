<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module\ModuleLinkUrl;
use Carbon\Carbon;

class ModuleUrl extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            // Product Sub Module
            array('module_url'=>'/product-components/category-{slug}/index', 'category_module_id'=> 1, 'sub_category_module_id'=> 1, 'module_id'=> 1, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'/product-components/sub-category-{slug}/index', 'category_module_id'=> 1, 'sub_category_module_id'=> 1, 'module_id'=> 2, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'/medicine-components/medicine-group-{slug}/index', 'category_module_id'=> 1, 'sub_category_module_id'=> 1, 'module_id'=> 3, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'/product-components/product-{slug}/index', 'category_module_id'=> 1, 'sub_category_module_id'=> 1, 'module_id'=> 4, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'/product-components/model-{slug}/index', 'category_module_id'=> 1, 'sub_category_module_id'=> 1, 'module_id'=> 5, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'/product-components/units-{slug}/index', 'category_module_id'=> 1, 'sub_category_module_id'=> 1, 'module_id'=> 6, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'/product-components/brand-{slug}/index', 'category_module_id'=> 1, 'sub_category_module_id'=> 1, 'module_id'=> 7, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Product (Medicine Part)
            array('module_url'=>'/medicine-components/medicine-name-{slug}/index', 'category_module_id'=> 1, 'sub_category_module_id'=> 21, 'module_id'=> 8, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'/medicine-components/medicine-dosage-{slug}/index', 'category_module_id'=> 1, 'sub_category_module_id'=> 21, 'module_id'=> 9, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'/product-components/origin-{slug}/index', 'category_module_id'=> 1, 'sub_category_module_id'=> 21, 'module_id'=> 10, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Stock Sub Module
            array('module_url'=>'#', 'category_module_id'=> 1, 'sub_category_module_id'=> 2, 'module_id'=> 11, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 1, 'sub_category_module_id'=> 2, 'module_id'=> 12, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 1, 'sub_category_module_id'=> 2, 'module_id'=> 13, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 1, 'sub_category_module_id'=> 2, 'module_id'=> 14, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 1, 'sub_category_module_id'=> 2, 'module_id'=> 15, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Inventory Sub Module
            array('module_url'=>'#', 'category_module_id'=> 1, 'sub_category_module_id'=> 4, 'module_id'=> 16, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 1, 'sub_category_module_id'=> 4, 'module_id'=> 17, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Supplier Sub Module
            array('module_url'=>'/company-supplier/suppliers/index-{slug}/index', 'category_module_id'=> 1, 'sub_category_module_id'=> 3, 'module_id'=> 18, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 1, 'sub_category_module_id'=> 3, 'module_id'=> 19, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 1, 'sub_category_module_id'=> 3, 'module_id'=> 20, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'/company-supplier/suppliers/access-permission-{slug}/index', 'category_module_id'=> 1, 'sub_category_module_id'=> 3, 'module_id'=> 21, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Lager Sub Module
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 5, 'module_id'=> 22, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 5, 'module_id'=> 23, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 5, 'module_id'=> 24, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 5, 'module_id'=> 25, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 5, 'module_id'=> 26, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 5, 'module_id'=> 27, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 5, 'module_id'=> 28, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 5, 'module_id'=> 29, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 5, 'module_id'=> 30, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 5, 'module_id'=> 31, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 5, 'module_id'=> 32, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 5, 'module_id'=> 33, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 5, 'module_id'=> 34, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 5, 'module_id'=> 35, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 5, 'module_id'=> 36, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 5, 'module_id'=> 37, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 5, 'module_id'=> 38, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 5, 'module_id'=> 39, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 5, 'module_id'=> 40, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 5, 'module_id'=> 41, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 5, 'module_id'=> 42, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 5, 'module_id'=> 43, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 5, 'module_id'=> 44, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Sales Sub Module
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 6, 'module_id'=> 45, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 6, 'module_id'=> 46, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 6, 'module_id'=> 47, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 6, 'module_id'=> 48, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 6, 'module_id'=> 49, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 6, 'module_id'=> 50, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 6, 'module_id'=> 51, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 6, 'module_id'=> 52, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Vaoucher Sub Module
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 7, 'module_id'=> 53, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 7, 'module_id'=> 54, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 7, 'module_id'=> 55, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 7, 'module_id'=> 56, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 7, 'module_id'=> 57, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Asset Sub Module
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 8, 'module_id'=> 58, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 8, 'module_id'=> 59, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 8, 'module_id'=> 60, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 8, 'module_id'=> 61, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 8, 'module_id'=> 62, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 8, 'module_id'=> 63, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Report Sub Module
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 9, 'module_id'=> 64, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 9, 'module_id'=> 65, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 9, 'module_id'=> 66, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 9, 'module_id'=> 67, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 9, 'module_id'=> 68, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 9, 'module_id'=> 69, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 9, 'module_id'=> 70, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 9, 'module_id'=> 71, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 9, 'module_id'=> 72, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 9, 'module_id'=> 73, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 9, 'module_id'=> 74, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 9, 'module_id'=> 75, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 9, 'module_id'=> 76, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 2, 'sub_category_module_id'=> 9, 'module_id'=> 77, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // HRM Sub Module
            array('module_url'=>'#', 'category_module_id'=> 3, 'sub_category_module_id'=> 10, 'module_id'=> 78, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 3, 'sub_category_module_id'=> 10, 'module_id'=> 79, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 3, 'sub_category_module_id'=> 10, 'module_id'=> 80, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 3, 'sub_category_module_id'=> 10, 'module_id'=> 81, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 3, 'sub_category_module_id'=> 10, 'module_id'=> 82, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 3, 'sub_category_module_id'=> 10, 'module_id'=> 83, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 3, 'sub_category_module_id'=> 10, 'module_id'=> 84, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 3, 'sub_category_module_id'=> 10, 'module_id'=> 85, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 3, 'sub_category_module_id'=> 10, 'module_id'=> 86, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 3, 'sub_category_module_id'=> 10, 'module_id'=> 87, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 3, 'sub_category_module_id'=> 10, 'module_id'=> 88, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 3, 'sub_category_module_id'=> 10, 'module_id'=> 89, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 3, 'sub_category_module_id'=> 10, 'module_id'=> 90, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 3, 'sub_category_module_id'=> 10, 'module_id'=> 91, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 3, 'sub_category_module_id'=> 10, 'module_id'=> 92, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 3, 'sub_category_module_id'=> 10, 'module_id'=> 93, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Auth Sub Module
            array('module_url'=>'/super-admin/user-accounts/account-holder/account-history-{slug}/index', 'category_module_id'=> 6, 'sub_category_module_id'=> 11, 'module_id'=> 94, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'/super-admin/register-emails/email-verification-{slug}/index', 'category_module_id'=> 6, 'sub_category_module_id'=> 11, 'module_id'=> 95, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'/super-admin/roles/role-index-{slug}/index', 'category_module_id'=> 6, 'sub_category_module_id'=> 11, 'module_id'=> 96, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'/super-admin/roles/role-permission-{slug}/index', 'category_module_id'=> 6, 'sub_category_module_id'=> 11, 'module_id'=> 97, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'/super-admin/roles/manage-role-{slug}/index', 'category_module_id'=> 6, 'sub_category_module_id'=> 11, 'module_id'=> 98, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'/super-admin/users/user-authorization-{slug}/index', 'category_module_id'=> 6, 'sub_category_module_id'=> 11, 'module_id'=> 99, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 6, 'sub_category_module_id'=> 11, 'module_id'=> 100, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'/super-admin/auth-pages/auth-page-permission-{slug}/index', 'category_module_id'=> 6, 'sub_category_module_id'=> 11, 'module_id'=> 101, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 6, 'sub_category_module_id'=> 11, 'module_id'=> 102, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'/company/branch-activity/branch-{slug}/admin-access/index', 'category_module_id'=> 6, 'sub_category_module_id'=> 11, 'module_id'=> 103, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'/company/branch-activity/branch-{slug}/user-access/index', 'category_module_id'=> 6, 'sub_category_module_id'=> 11, 'module_id'=> 104, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'/company/branch-activity/branch-{slug}/index', 'category_module_id'=> 6, 'sub_category_module_id'=> 11, 'module_id'=> 105, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'/application/user-log/user-log-activity-{slug}/log-dashboard', 'category_module_id'=> 6, 'sub_category_module_id'=> 11, 'module_id'=> 106, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // File Manager Sub Module
            array('module_url'=>'#', 'category_module_id'=> 7, 'sub_category_module_id'=> 12, 'module_id'=> 107, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Fornt-End Sub Module
            array('module_url'=>'#', 'category_module_id'=> 8, 'sub_category_module_id'=> 13, 'module_id'=> 108, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 8, 'sub_category_module_id'=> 13, 'module_id'=> 109, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 8, 'sub_category_module_id'=> 13, 'module_id'=> 110, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 8, 'sub_category_module_id'=> 13, 'module_id'=> 111, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 8, 'sub_category_module_id'=> 13, 'module_id'=> 112, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 8, 'sub_category_module_id'=> 13, 'module_id'=> 113, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 8, 'sub_category_module_id'=> 13, 'module_id'=> 114, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 8, 'sub_category_module_id'=> 13, 'module_id'=> 115, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 8, 'sub_category_module_id'=> 13, 'module_id'=> 116, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'/super-admin/forntend-footer-information-{slug}/index', 'category_module_id'=> 8, 'sub_category_module_id'=> 13, 'module_id'=> 117, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 8, 'sub_category_module_id'=> 13, 'module_id'=> 118, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 8, 'sub_category_module_id'=> 13, 'module_id'=> 119, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 8, 'sub_category_module_id'=> 13, 'module_id'=> 120, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'/super-admin/forntend-footer-newletter-{slug}/index', 'category_module_id'=> 8, 'sub_category_module_id'=> 13, 'module_id'=> 121, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Post Setting Sub Module
            array('module_url'=>'/super-admin/post-setting-{slug}/index', 'category_module_id'=> 9, 'sub_category_module_id'=> 14, 'module_id'=> 122, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // App Setting Sub Module
            array('module_url'=>'/super-admin/app-setting-{slug}/index', 'category_module_id'=> 9, 'sub_category_module_id'=> 14, 'module_id'=> 123, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Pivot Table Sub Module
            array('module_url'=>'/business-summary/pivot-tables/order-pivot-table-{slug}/index', 'category_module_id'=> 10, 'sub_category_module_id'=> 15, 'module_id'=> 124, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'/business-summary/pivot-tables/sales-pivot-table-{slug}/index', 'category_module_id'=> 10, 'sub_category_module_id'=> 15, 'module_id'=> 125, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'/business-summary/pivot-tables/expenses-pivot-table-{slug}/index', 'category_module_id'=> 10, 'sub_category_module_id'=> 15, 'module_id'=> 126, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'/business-summary/pivot-tables/supplier-pivot-table-{slug}/index', 'category_module_id'=> 10, 'sub_category_module_id'=> 15, 'module_id'=> 127, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Item Sub Module
            array('module_url'=>'#', 'category_module_id'=> 12, 'sub_category_module_id'=> 16, 'module_id'=> 128, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 12, 'sub_category_module_id'=> 16, 'module_id'=> 129, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 12, 'sub_category_module_id'=> 16, 'module_id'=> 130, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 12, 'sub_category_module_id'=> 16, 'module_id'=> 131, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 12, 'sub_category_module_id'=> 16, 'module_id'=> 132, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Item Sub Module
            array('module_url'=>'#', 'category_module_id'=> 11, 'sub_category_module_id'=> 17, 'module_id'=> 133, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Language Sub Module
            array('module_url'=>'#', 'category_module_id'=> 13, 'sub_category_module_id'=> 18, 'module_id'=> 134, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Memory Sub Module
            array('module_url'=>'#', 'category_module_id'=> 14, 'sub_category_module_id'=> 19, 'module_id'=> 135, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            array('module_url'=>'#', 'category_module_id'=> 14, 'sub_category_module_id'=> 19, 'module_id'=> 136, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Profile Sub Module
            array('module_url'=>'#', 'category_module_id'=> 15, 'sub_category_module_id'=> 20, 'module_id'=> 137, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
            // Send Email Sub Module
            array('module_url'=>'/application/email-{slug}/index', 'category_module_id'=> 16, 'sub_category_module_id'=> 22, 'module_id'=> 138, 'status'=> 0, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()),
        ];

        ModuleLinkUrl::insert($data);
    }
}
