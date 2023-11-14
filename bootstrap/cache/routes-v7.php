<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::K3ekjjhKdby2VjRu',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ewOdYHqYrgG1dx9V',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vXgEIcddpc9TRWSF',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::uHV1hzs9GmKeCh9e',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'register',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::REDCbrOLrLiI6r8D',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'login',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8v7egUwXIfHjTSR5',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/forget-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.forget',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reset-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passwords.sent',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'password.reset',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3WTJS6yB7ISGfx1U',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/super-admin/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'super-admin.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/super-admin/users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'superAdminUsers',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/super-admin/get-users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'search_users.action',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/super-admin/status-users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update_status.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/super-admin/manage-role' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manageRole',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/super-admin/update-role' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'updateRole',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/super-admin/app-setting' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'appSetting',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/all-permission' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permission.show',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/create-permission' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permission.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/store-permission' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permission.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/permission-status-update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permission.status_update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/expenses-pivot-table' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::B4IOBVzMp9ab6oXf',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/order-pivot-table' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DOecOtrDHtQtMuIc',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sales-pivot-table' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Jr4v8NHbk4aHd8bp',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/supplier-summary' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gFPFEaPbZo3dNGGw',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/account-holders' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get_account-holders.action',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/add-category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'add.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'search-category.action',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/status-category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category_status.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sub-category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sub-category.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-data-category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get-categories.action',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/add-sub-category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'add_subcategory.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-sub-category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'search-subcategory.action',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/status-sub-category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'subcategory_status.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/medicine-group' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'medicine-group.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/add-medicine-group' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'add_medicinegroup.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-medicine-group' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'search-medicinegroup.action',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/status-medicine-group' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'medicinegroup_status.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/medicine-name' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'medicine-name.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-group' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'group.action',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/add-medicine-name' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'add_medicinename.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-medicine-name' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'search-medicinename.action',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/status-medicine-name' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'medicinename_status.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/medicine-dosage' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'medicine-dogs.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-medicine' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'medicine_name.action',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/add-medicine-dosage' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'add_medicinedogs.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-medicine-dosage' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'search-medicinedogs.action',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/status-medicine-dosage' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'medicinedogs_status.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/units' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'units.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/add-units' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'add_units.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-units' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'search-units.action',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/status-units' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'units_status.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/origin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'origin.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/add-origin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'add_origin.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-origin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'search-origin.action',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/status-origin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'origin_status.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/brand' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'brand.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-data-origin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get_origin.action',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/add-brand' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'add_brand.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-brand' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'search-brand.action',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/status-brand' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'brand_status.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/model' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'model.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-data-product' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get_product.action',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/add-model' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'add_model.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-model' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'search-model.action',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/status-model' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'model_status.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/product' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'product.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/add-product' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'add_product.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-product' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'search-product.action',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/status-product' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'product_status.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/supplier' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'supplier.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/add-supplier' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'add_supplier.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-supplier' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'search-supplier.action',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/status-supplier' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'supplier_update_status.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/super-admin/post-setting' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post_setting.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/super-admin/get-post-setting' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'search_category_post.action',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/super-admin/post-category-status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post_category_status.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/super-admin/get-main-post-setting' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'search_main_post.action',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/super-admin/main-post-status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'main_post_status.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/super-admin/inventory-authorize' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'inventory-auth',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/super-admin/inventory-get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'search-inventory.action',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/super-admin/inventory-status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'inventory-authorize.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/super-admin/get-inventory-delete-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get_inventory_data.action',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/super-admin/inventory-delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-inventory',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sub-admin/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sub-admin.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/categories-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'categories.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/add-category-post' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create.category',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'add_category.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/post-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/add-post' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create.post',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'add_post.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/doctors' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'doctors.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/add-doctors' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create.doctorpost',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'add_doctors.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/doctors/home' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'doctors.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/doctors/users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'Users',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XSHdAG6u3dhPVH1I',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/inventories' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'medicine-inventory.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'medicine-inventory.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/inventories-edit-get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'search-inv.action',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/inventories-unauthorized-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'search-unauthorized.action',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/stock' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'stock.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'stock.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/stock-edit-get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'seach-stock.action',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/stock-details' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'stock-details.action',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::FTqDPQcsYJvdcRrI',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::giAAjDZTP3jdGZLP',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/s(?|how\\-users/([^/]++)(*:31)|uper\\-admin/delete\\-(?|post\\-category/([^/]++)(*:84)|main\\-post/([^/]++)(*:110)))|/edit\\-(?|u(?|sers/([^/]++)(*:147)|nits/([^/]++)(*:168))|p(?|ermission/([^/]++)(*:199)|roduct/([^/]++)(*:222))|category/([^/]++)(*:248)|su(?|b\\-category/([^/]++)(*:281)|pplier/([^/]++)(*:304))|m(?|edicine\\-(?|group/([^/]++)(*:343)|name/([^/]++)(*:364)|dosage/([^/]++)(*:387))|odel/([^/]++)(*:409))|origin/([^/]++)(*:433)|brand/([^/]++)(*:455))|/update\\-(?|u(?|sers/([^/]++)(*:493)|nits/([^/]++)(*:514))|app\\-setting/([^/]++)(*:544)|p(?|ermission/([^/]++)(*:574)|roduct/([^/]++)(*:597))|category/([^/]++)(*:623)|su(?|b\\-category/([^/]++)(*:656)|pplier/([^/]++)(*:679))|m(?|edicine\\-(?|group/([^/]++)(*:718)|name/([^/]++)(*:739)|dosage/([^/]++)(*:762))|odel/([^/]++)(*:784))|origin/([^/]++)(*:808)|brand/([^/]++)(*:830))|/delete\\-(?|u(?|sers/([^/]++)(*:868)|nits/([^/]++)(*:889))|p(?|ermission/([^/]++)(*:920)|roduct/([^/]++)(*:943))|category/([^/]++)(*:969)|su(?|b\\-category/([^/]++)(*:1002)|pplier/([^/]++)(*:1026))|m(?|edicine\\-(?|group/([^/]++)(*:1066)|name/([^/]++)(*:1088)|dosage/([^/]++)(*:1112))|odel/([^/]++)(*:1135))|origin/([^/]++)(*:1160)|brand/([^/]++)(*:1183))|/admin/(?|edit\\-(?|category\\-post/([^/]++)(*:1235)|post/([^/]++)(*:1257))|update\\-(?|category\\-post/([^/]++)(*:1301)|post/([^/]++)(*:1323))|inventories\\-(?|edit/([^/]++)(*:1362)|update/([^/]++)(*:1386))|stock\\-(?|edit/([^/]++)(*:1419)|update/([^/]++)(*:1443)))|/request\\-(?|data/([^/]++)(*:1480)|medicine\\-(?|name/([^/]++)(*:1515)|dogs/([^/]++)(*:1537)))|/lang/([^/]++)(*:1562))/?$}sDu',
    ),
    3 => 
    array (
      31 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      84 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete_post_category.action',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      110 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete_main_post.action',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      147 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8rbyfMrJfYDhw2A5',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      168 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zYDyPyoWVztGVqaS',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      199 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permission.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      222 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Glwkj8Hpj2EoEhC4',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      248 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UYgZt6KwiM3M8qGe',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      281 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lgWjHdjhnc2WGCrJ',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      304 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gPrBaNntSfvjrdcw',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      343 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hEhrz0HeDMAKhCyE',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      364 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::eIu8uqDCrQlwnXUH',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      387 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ps9Rrjbj0EZE20Hh',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      409 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zfon1Nd4zHsCVajc',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      433 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mBCBT7NKKodXoF6l',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      455 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::I8K0rO6N3bWyZ8XI',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      493 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      514 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'units.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      544 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'updateappSetting',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      574 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permission.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      597 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'product.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      623 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      656 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'subcategory.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      679 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'supplier.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      718 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'medicinegroup.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      739 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'medicinename.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      762 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'medicinedogs.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      784 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'model.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      808 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'origin.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      830 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'brand.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      868 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      889 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete_units.action',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      920 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permission.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      943 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete_product.action',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      969 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete_category.action',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1002 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete_subcategory.action',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1026 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete_supplier.action',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1066 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete_medicinegroup.action',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1088 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete_medicinename.action',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1112 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete_medicinedogs.action',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1135 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete_model.action',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1160 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete_origin.action',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1183 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete_brand.action',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1235 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OjvS8X0EPdu0vGIb',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1257 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GuMTczIWHWB7ch65',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1301 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'categ.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1323 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1362 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UabD6TPyG5pJXJLz',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1386 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update_inventory.action',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1419 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::E09qG4teNvXTheKH',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1443 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update_stock.action',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1480 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wrxgcmXnK8LEP70r',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1515 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qvBMXWlRenjFvMhC',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1537 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::r2sCqDFxNeYtkSa6',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1562 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lang.switch',
          ),
          1 => 
          array (
            0 => 'lang',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'generated::K3ekjjhKdby2VjRu' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'generated::K3ekjjhKdby2VjRu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ewOdYHqYrgG1dx9V' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:295:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000005a80000000000000000";}";s:4:"hash";s:44:"nAJt/FX0tO+anORq2O+pCmA6ZeVOZ4ZAAC49Vi6lX/M=";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::ewOdYHqYrgG1dx9V',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vXgEIcddpc9TRWSF' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@loadLogin',
        'controller' => 'App\\Http\\Controllers\\AuthController@loadLogin',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::vXgEIcddpc9TRWSF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::uHV1hzs9GmKeCh9e' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@loadRegister',
        'controller' => 'App\\Http\\Controllers\\AuthController@loadRegister',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::uHV1hzs9GmKeCh9e',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::REDCbrOLrLiI6r8D' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:262:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:44:"function () {
    return \\redirect(\'/\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000005ad0000000000000000";}";s:4:"hash";s:44:"EwJdkm+JdZ4xoxFGP/h4wFJ1DbpzqdCGGIDBUDsAjgc=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::REDCbrOLrLiI6r8D',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8v7egUwXIfHjTSR5' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@logout',
        'controller' => 'App\\Http\\Controllers\\AuthController@logout',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::8v7egUwXIfHjTSR5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'register' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@register',
        'controller' => 'App\\Http\\Controllers\\AuthController@register',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'register',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'login' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@login',
        'controller' => 'App\\Http\\Controllers\\AuthController@login',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.forget' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'forget-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@forgetPassword',
        'controller' => 'App\\Http\\Controllers\\AuthController@forgetPassword',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.forget',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passwords.sent' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'reset-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@sendResetLinkEmail',
        'controller' => 'App\\Http\\Controllers\\AuthController@sendResetLinkEmail',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'passwords.sent',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.reset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reset-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@resetPassword',
        'controller' => 'App\\Http\\Controllers\\AuthController@resetPassword',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.reset',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3WTJS6yB7ISGfx1U' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'reset-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@setPassword',
        'controller' => 'App\\Http\\Controllers\\AuthController@setPassword',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::3WTJS6yB7ISGfx1U',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'super-admin.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\SuperAdminController@dashboard',
        'controller' => 'App\\Http\\Controllers\\SuperAdminController@dashboard',
        'namespace' => NULL,
        'prefix' => '/super-admin',
        'where' => 
        array (
        ),
        'as' => 'super-admin.dashboard',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'superAdminUsers' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\SuperAdminController@users',
        'controller' => 'App\\Http\\Controllers\\SuperAdminController@users',
        'namespace' => NULL,
        'prefix' => '/super-admin',
        'where' => 
        array (
        ),
        'as' => 'superAdminUsers',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'search_users.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/get-users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\SuperAdminController@getusers',
        'controller' => 'App\\Http\\Controllers\\SuperAdminController@getusers',
        'namespace' => NULL,
        'prefix' => '/super-admin',
        'where' => 
        array (
        ),
        'as' => 'search_users.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update_status.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'super-admin/status-users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\SuperAdminController@update_status',
        'controller' => 'App\\Http\\Controllers\\SuperAdminController@update_status',
        'namespace' => NULL,
        'prefix' => '/super-admin',
        'where' => 
        array (
        ),
        'as' => 'update_status.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manageRole' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/manage-role',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\SuperAdminController@manageRole',
        'controller' => 'App\\Http\\Controllers\\SuperAdminController@manageRole',
        'namespace' => NULL,
        'prefix' => '/super-admin',
        'where' => 
        array (
        ),
        'as' => 'manageRole',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'updateRole' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'super-admin/update-role',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\SuperAdminController@updateRole',
        'controller' => 'App\\Http\\Controllers\\SuperAdminController@updateRole',
        'namespace' => NULL,
        'prefix' => '/super-admin',
        'where' => 
        array (
        ),
        'as' => 'updateRole',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'appSetting' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/app-setting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\SuperAdminController@appSetting',
        'controller' => 'App\\Http\\Controllers\\SuperAdminController@appSetting',
        'namespace' => NULL,
        'prefix' => '/super-admin',
        'where' => 
        array (
        ),
        'as' => 'appSetting',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'show-users/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\SuperAdminController@showUsers',
        'controller' => 'App\\Http\\Controllers\\SuperAdminController@showUsers',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'users.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8rbyfMrJfYDhw2A5' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'edit-users/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\SuperAdminController@editUsers',
        'controller' => 'App\\Http\\Controllers\\SuperAdminController@editUsers',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::8rbyfMrJfYDhw2A5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'update-users/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\SuperAdminController@updateUsers',
        'controller' => 'App\\Http\\Controllers\\SuperAdminController@updateUsers',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'users.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'delete-users/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\SuperAdminController@deleteUsers',
        'controller' => 'App\\Http\\Controllers\\SuperAdminController@deleteUsers',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'users.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'updateappSetting' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'update-app-setting/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\SuperAdminController@appSettingUpdate',
        'controller' => 'App\\Http\\Controllers\\SuperAdminController@appSettingUpdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'updateappSetting',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'permission.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'all-permission',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Permission\\PermissionController@index',
        'controller' => 'App\\Http\\Controllers\\Permission\\PermissionController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'permission.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'permission.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'create-permission',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Permission\\PermissionController@createPermission',
        'controller' => 'App\\Http\\Controllers\\Permission\\PermissionController@createPermission',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'permission.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'permission.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'store-permission',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Permission\\PermissionController@storePermission',
        'controller' => 'App\\Http\\Controllers\\Permission\\PermissionController@storePermission',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'permission.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'permission.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'edit-permission/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Permission\\PermissionController@editPermission',
        'controller' => 'App\\Http\\Controllers\\Permission\\PermissionController@editPermission',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'permission.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'permission.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'update-permission/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Permission\\PermissionController@updatePermission',
        'controller' => 'App\\Http\\Controllers\\Permission\\PermissionController@updatePermission',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'permission.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'permission.delete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'delete-permission/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Permission\\PermissionController@deletePermission',
        'controller' => 'App\\Http\\Controllers\\Permission\\PermissionController@deletePermission',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'permission.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'permission.status_update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'permission-status-update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Permission\\PermissionController@permissionStatusUpdate',
        'controller' => 'App\\Http\\Controllers\\Permission\\PermissionController@permissionStatusUpdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'permission.status_update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::B4IOBVzMp9ab6oXf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'expenses-pivot-table',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\PivotTable\\PivotTableController@index',
        'controller' => 'App\\Http\\Controllers\\PivotTable\\PivotTableController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::B4IOBVzMp9ab6oXf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::DOecOtrDHtQtMuIc' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'order-pivot-table',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\PivotTable\\OrderPivotTableController@showOrderPivot',
        'controller' => 'App\\Http\\Controllers\\PivotTable\\OrderPivotTableController@showOrderPivot',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::DOecOtrDHtQtMuIc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Jr4v8NHbk4aHd8bp' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sales-pivot-table',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\PivotTable\\SalesPivotTableController@showSalesPivot',
        'controller' => 'App\\Http\\Controllers\\PivotTable\\SalesPivotTableController@showSalesPivot',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Jr4v8NHbk4aHd8bp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gFPFEaPbZo3dNGGw' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'supplier-summary',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\PivotTable\\SupplierRecordController@index',
        'controller' => 'App\\Http\\Controllers\\PivotTable\\SupplierRecordController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::gFPFEaPbZo3dNGGw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get_account-holders.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'account-holders',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\SuperAdminController@accounts_holders',
        'controller' => 'App\\Http\\Controllers\\SuperAdminController@accounts_holders',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'get_account-holders.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\CategoryController@index',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\CategoryController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'category.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'add.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'add-category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\CategoryController@storeData',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\CategoryController@storeData',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'add.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'search-category.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'get-category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\CategoryController@getCategory',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\CategoryController@getCategory',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'search-category.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UYgZt6KwiM3M8qGe' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'edit-category/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\CategoryController@editCategory',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\CategoryController@editCategory',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::UYgZt6KwiM3M8qGe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'update-category/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\CategoryController@updateCategory',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\CategoryController@updateCategory',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'category.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category_status.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'status-category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\CategoryController@updateCategoryStatus',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\CategoryController@updateCategoryStatus',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'category_status.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete_category.action' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'delete-category/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\CategoryController@deleteCategory',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\CategoryController@deleteCategory',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'delete_category.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sub-category.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sub-category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\SubCategoryController@index',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\SubCategoryController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'sub-category.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get-categories.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'get-data-category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\SubCategoryController@getCategories',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\SubCategoryController@getCategories',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'get-categories.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'add_subcategory.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'add-sub-category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\SubCategoryController@storeData',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\SubCategoryController@storeData',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'add_subcategory.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'search-subcategory.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'get-sub-category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\SubCategoryController@getSubCategory',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\SubCategoryController@getSubCategory',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'search-subcategory.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::lgWjHdjhnc2WGCrJ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'edit-sub-category/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\SubCategoryController@editSubCategory',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\SubCategoryController@editSubCategory',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::lgWjHdjhnc2WGCrJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'subcategory.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'update-sub-category/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\SubCategoryController@updateSubCategory',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\SubCategoryController@updateSubCategory',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'subcategory.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'subcategory_status.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'status-sub-category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\SubCategoryController@updateSubCategoryStatus',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\SubCategoryController@updateSubCategoryStatus',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'subcategory_status.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete_subcategory.action' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'delete-sub-category/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\SubCategoryController@deleteSubCategory',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\SubCategoryController@deleteSubCategory',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'delete_subcategory.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'medicine-group.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'medicine-group',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\GroupController@index',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\GroupController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'medicine-group.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'add_medicinegroup.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'add-medicine-group',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\GroupController@storeData',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\GroupController@storeData',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'add_medicinegroup.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'search-medicinegroup.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'get-medicine-group',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\GroupController@getmedicinegroup',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\GroupController@getmedicinegroup',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'search-medicinegroup.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hEhrz0HeDMAKhCyE' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'edit-medicine-group/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\GroupController@editmedicinegroup',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\GroupController@editmedicinegroup',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::hEhrz0HeDMAKhCyE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'medicinegroup.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'update-medicine-group/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\GroupController@updatemedicinegroup',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\GroupController@updatemedicinegroup',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'medicinegroup.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'medicinegroup_status.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'status-medicine-group',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\GroupController@updatemedicinegroupStatus',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\GroupController@updatemedicinegroupStatus',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'medicinegroup_status.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete_medicinegroup.action' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'delete-medicine-group/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\GroupController@deletemedicinegroup',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\GroupController@deletemedicinegroup',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'delete_medicinegroup.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'medicine-name.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'medicine-name',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\MedicineNameController@index',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\MedicineNameController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'medicine-name.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'group.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'get-group',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\MedicineNameController@getGroup',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\MedicineNameController@getGroup',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'group.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'add_medicinename.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'add-medicine-name',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\MedicineNameController@storeData',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\MedicineNameController@storeData',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'add_medicinename.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'search-medicinename.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'get-medicine-name',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\MedicineNameController@getmedicinename',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\MedicineNameController@getmedicinename',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'search-medicinename.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::eIu8uqDCrQlwnXUH' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'edit-medicine-name/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\MedicineNameController@editmedicinename',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\MedicineNameController@editmedicinename',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::eIu8uqDCrQlwnXUH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'medicinename.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'update-medicine-name/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\MedicineNameController@updatemedicinename',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\MedicineNameController@updatemedicinename',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'medicinename.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'medicinename_status.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'status-medicine-name',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\MedicineNameController@updatemedicinenameStatus',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\MedicineNameController@updatemedicinenameStatus',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'medicinename_status.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete_medicinename.action' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'delete-medicine-name/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\MedicineNameController@deletemedicinename',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\MedicineNameController@deletemedicinename',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'delete_medicinename.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'medicine-dogs.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'medicine-dosage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\MedicineDogsController@index',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\MedicineDogsController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'medicine-dogs.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'medicine_name.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'get-medicine',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\MedicineDogsController@get_medicine',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\MedicineDogsController@get_medicine',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'medicine_name.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'add_medicinedogs.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'add-medicine-dosage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\MedicineDogsController@storeData',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\MedicineDogsController@storeData',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'add_medicinedogs.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'search-medicinedogs.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'get-medicine-dosage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\MedicineDogsController@getmedicinedogs',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\MedicineDogsController@getmedicinedogs',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'search-medicinedogs.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ps9Rrjbj0EZE20Hh' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'edit-medicine-dosage/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\MedicineDogsController@editmedicinedogs',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\MedicineDogsController@editmedicinedogs',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::ps9Rrjbj0EZE20Hh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'medicinedogs.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'update-medicine-dosage/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\MedicineDogsController@updatemedicinedogs',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\MedicineDogsController@updatemedicinedogs',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'medicinedogs.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'medicinedogs_status.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'status-medicine-dosage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\MedicineDogsController@updatemedicinedogsStatus',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\MedicineDogsController@updatemedicinedogsStatus',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'medicinedogs_status.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete_medicinedogs.action' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'delete-medicine-dosage/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\MedicineDogsController@deletemedicinedogs',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\MedicineDogsController@deletemedicinedogs',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'delete_medicinedogs.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'units.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'units',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\UnitController@index',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\UnitController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'units.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'add_units.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'add-units',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\UnitController@storeData',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\UnitController@storeData',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'add_units.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'search-units.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'get-units',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\UnitController@getunits',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\UnitController@getunits',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'search-units.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::zYDyPyoWVztGVqaS' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'edit-units/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\UnitController@editunits',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\UnitController@editunits',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::zYDyPyoWVztGVqaS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'units.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'update-units/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\UnitController@updateunits',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\UnitController@updateunits',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'units.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'units_status.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'status-units',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\UnitController@updateunitsStatus',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\UnitController@updateunitsStatus',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'units_status.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete_units.action' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'delete-units/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\UnitController@deleteunits',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\UnitController@deleteunits',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'delete_units.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'origin.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'origin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\MedicineOrginController@index',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\MedicineOrginController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'origin.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'add_origin.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'add-origin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\MedicineOrginController@storeData',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\MedicineOrginController@storeData',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'add_origin.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'search-origin.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'get-origin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\MedicineOrginController@getorigin',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\MedicineOrginController@getorigin',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'search-origin.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mBCBT7NKKodXoF6l' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'edit-origin/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\MedicineOrginController@editorigin',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\MedicineOrginController@editorigin',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::mBCBT7NKKodXoF6l',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'origin.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'update-origin/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\MedicineOrginController@updateorigin',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\MedicineOrginController@updateorigin',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'origin.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'origin_status.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'status-origin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\MedicineOrginController@updateoriginStatus',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\MedicineOrginController@updateoriginStatus',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'origin_status.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete_origin.action' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'delete-origin/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\MedicineOrginController@deleteorigin',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\MedicineOrginController@deleteorigin',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'delete_origin.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'brand.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'brand',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\BrandController@index',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\BrandController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'brand.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get_origin.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'get-data-origin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\BrandController@getDataOrigin',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\BrandController@getDataOrigin',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'get_origin.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'add_brand.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'add-brand',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\BrandController@storeData',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\BrandController@storeData',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'add_brand.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'search-brand.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'get-brand',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\BrandController@getbrand',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\BrandController@getbrand',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'search-brand.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::I8K0rO6N3bWyZ8XI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'edit-brand/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\BrandController@editbrand',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\BrandController@editbrand',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::I8K0rO6N3bWyZ8XI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'brand.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'update-brand/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\BrandController@updatebrand',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\BrandController@updatebrand',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'brand.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'brand_status.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'status-brand',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\BrandController@updatebrandStatus',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\BrandController@updatebrandStatus',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'brand_status.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete_brand.action' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'delete-brand/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\BrandController@deletebrand',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\BrandController@deletebrand',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'delete_brand.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'model.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'model',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\ProductModelController@index',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\ProductModelController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'model.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get_product.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'get-data-product',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\ProductModelController@getDataProduct',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\ProductModelController@getDataProduct',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'get_product.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'add_model.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'add-model',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\ProductModelController@storeData',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\ProductModelController@storeData',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'add_model.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'search-model.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'get-model',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\ProductModelController@getmodel',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\ProductModelController@getmodel',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'search-model.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::zfon1Nd4zHsCVajc' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'edit-model/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\ProductModelController@editmodel',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\ProductModelController@editmodel',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::zfon1Nd4zHsCVajc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'model.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'update-model/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\ProductModelController@updatemodel',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\ProductModelController@updatemodel',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'model.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'model_status.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'status-model',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\ProductModelController@updatemodelStatus',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\ProductModelController@updatemodelStatus',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'model_status.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete_model.action' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'delete-model/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductIteam\\ProductModelController@deletemodel',
        'controller' => 'App\\Http\\Controllers\\ProductIteam\\ProductModelController@deletemodel',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'delete_model.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'product.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'product',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Productiteam\\ProductController@index',
        'controller' => 'App\\Http\\Controllers\\Productiteam\\ProductController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'product.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'add_product.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'add-product',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Productiteam\\ProductController@storeData',
        'controller' => 'App\\Http\\Controllers\\Productiteam\\ProductController@storeData',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'add_product.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'search-product.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'get-product',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Productiteam\\ProductController@getproduct',
        'controller' => 'App\\Http\\Controllers\\Productiteam\\ProductController@getproduct',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'search-product.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Glwkj8Hpj2EoEhC4' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'edit-product/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Productiteam\\ProductController@editproduct',
        'controller' => 'App\\Http\\Controllers\\Productiteam\\ProductController@editproduct',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Glwkj8Hpj2EoEhC4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'product.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'update-product/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Productiteam\\ProductController@updateproduct',
        'controller' => 'App\\Http\\Controllers\\Productiteam\\ProductController@updateproduct',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'product.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'product_status.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'status-product',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Productiteam\\ProductController@updateproductStatus',
        'controller' => 'App\\Http\\Controllers\\Productiteam\\ProductController@updateproductStatus',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'product_status.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete_product.action' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'delete-product/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Productiteam\\ProductController@deleteproduct',
        'controller' => 'App\\Http\\Controllers\\Productiteam\\ProductController@deleteproduct',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'delete_product.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'supplier.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'supplier',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Supplier\\SupplierController@index',
        'controller' => 'App\\Http\\Controllers\\Supplier\\SupplierController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'supplier.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'add_supplier.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'add-supplier',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Supplier\\SupplierController@stroeData',
        'controller' => 'App\\Http\\Controllers\\Supplier\\SupplierController@stroeData',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'add_supplier.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'search-supplier.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'get-supplier',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Supplier\\SupplierController@getSupplier',
        'controller' => 'App\\Http\\Controllers\\Supplier\\SupplierController@getSupplier',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'search-supplier.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gPrBaNntSfvjrdcw' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'edit-supplier/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Supplier\\SupplierController@editSupplier',
        'controller' => 'App\\Http\\Controllers\\Supplier\\SupplierController@editSupplier',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::gPrBaNntSfvjrdcw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'supplier.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'update-supplier/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Supplier\\SupplierController@updateSupplier',
        'controller' => 'App\\Http\\Controllers\\Supplier\\SupplierController@updateSupplier',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'supplier.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'supplier_update_status.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'status-supplier',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Supplier\\SupplierController@updatesupplierStatus',
        'controller' => 'App\\Http\\Controllers\\Supplier\\SupplierController@updatesupplierStatus',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'supplier_update_status.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete_supplier.action' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'delete-supplier/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Supplier\\SupplierController@deleteSupplier',
        'controller' => 'App\\Http\\Controllers\\Supplier\\SupplierController@deleteSupplier',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'delete_supplier.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'post_setting.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/post-setting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Setting\\PostSettngController@index',
        'controller' => 'App\\Http\\Controllers\\Setting\\PostSettngController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'post_setting.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'search_category_post.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/get-post-setting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Setting\\PostSettngController@getPost',
        'controller' => 'App\\Http\\Controllers\\Setting\\PostSettngController@getPost',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'search_category_post.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'post_category_status.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'super-admin/post-category-status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Setting\\PostSettngController@updatepostCategoryStatus',
        'controller' => 'App\\Http\\Controllers\\Setting\\PostSettngController@updatepostCategoryStatus',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'post_category_status.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete_post_category.action' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'super-admin/delete-post-category/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Setting\\PostSettngController@deletePostCategory',
        'controller' => 'App\\Http\\Controllers\\Setting\\PostSettngController@deletePostCategory',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'delete_post_category.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'search_main_post.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/get-main-post-setting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Setting\\PostSettngController@getMainPost',
        'controller' => 'App\\Http\\Controllers\\Setting\\PostSettngController@getMainPost',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'search_main_post.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'main_post_status.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'super-admin/main-post-status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Setting\\PostSettngController@updateMainPostStatus',
        'controller' => 'App\\Http\\Controllers\\Setting\\PostSettngController@updateMainPostStatus',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'main_post_status.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete_main_post.action' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'super-admin/delete-main-post/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Setting\\PostSettngController@deleteMainPost',
        'controller' => 'App\\Http\\Controllers\\Setting\\PostSettngController@deleteMainPost',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'delete_main_post.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'inventory-auth' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/inventory-authorize',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Inventory\\InventoryAuthorization@index',
        'controller' => 'App\\Http\\Controllers\\Inventory\\InventoryAuthorization@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'inventory-auth',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'search-inventory.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/inventory-get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Inventory\\InventoryAuthorization@getInventoryData',
        'controller' => 'App\\Http\\Controllers\\Inventory\\InventoryAuthorization@getInventoryData',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'search-inventory.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'inventory-authorize.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'super-admin/inventory-status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Inventory\\InventoryAuthorization@inventoryAuthorize',
        'controller' => 'App\\Http\\Controllers\\Inventory\\InventoryAuthorization@inventoryAuthorize',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'inventory-authorize.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get_inventory_data.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/get-inventory-delete-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Inventory\\InventoryAuthorization@getInventoryDeleteData',
        'controller' => 'App\\Http\\Controllers\\Inventory\\InventoryAuthorization@getInventoryDeleteData',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'get_inventory_data.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-inventory' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'super-admin/inventory-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Inventory\\InventoryAuthorization@inventoryDelete',
        'controller' => 'App\\Http\\Controllers\\Inventory\\InventoryAuthorization@inventoryDelete',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'delete-inventory',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sub-admin.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sub-admin/dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isSubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\SubAdminController@dashboard',
        'controller' => 'App\\Http\\Controllers\\SubAdminController@dashboard',
        'namespace' => NULL,
        'prefix' => '/sub-admin',
        'where' => 
        array (
        ),
        'as' => 'sub-admin.dashboard',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@dashboard',
        'controller' => 'App\\Http\\Controllers\\AdminController@dashboard',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin.dashboard',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'categories.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/categories-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isAdmin',
          4 => 'isAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Post\\CreateCategoryPostController@index',
        'controller' => 'App\\Http\\Controllers\\Post\\CreateCategoryPostController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'categories.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create.category' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/add-category-post',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isAdmin',
          4 => 'isAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Post\\CreateCategoryPostController@createCategoryPost',
        'controller' => 'App\\Http\\Controllers\\Post\\CreateCategoryPostController@createCategoryPost',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'create.category',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'add_category.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/add-category-post',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isAdmin',
          4 => 'isAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Post\\CreateCategoryPostController@storeData',
        'controller' => 'App\\Http\\Controllers\\Post\\CreateCategoryPostController@storeData',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'add_category.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::OjvS8X0EPdu0vGIb' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/edit-category-post/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isAdmin',
          4 => 'isAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Post\\CreateCategoryPostController@editCateg',
        'controller' => 'App\\Http\\Controllers\\Post\\CreateCategoryPostController@editCateg',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::OjvS8X0EPdu0vGIb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'categ.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/update-category-post/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isAdmin',
          4 => 'isAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Post\\CreateCategoryPostController@updateCateg',
        'controller' => 'App\\Http\\Controllers\\Post\\CreateCategoryPostController@updateCateg',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'categ.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'post.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/post-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isAdmin',
          4 => 'isAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Post\\CreatePostController@index',
        'controller' => 'App\\Http\\Controllers\\Post\\CreatePostController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'post.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create.post' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/add-post',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isAdmin',
          4 => 'isAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Post\\CreatePostController@createPost',
        'controller' => 'App\\Http\\Controllers\\Post\\CreatePostController@createPost',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'create.post',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'add_post.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/add-post',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isAdmin',
          4 => 'isAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Post\\CreatePostController@storeData',
        'controller' => 'App\\Http\\Controllers\\Post\\CreatePostController@storeData',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'add_post.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::GuMTczIWHWB7ch65' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/edit-post/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isAdmin',
          4 => 'isAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Post\\CreatePostController@editPost',
        'controller' => 'App\\Http\\Controllers\\Post\\CreatePostController@editPost',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::GuMTczIWHWB7ch65',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'post.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/update-post/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isAdmin',
          4 => 'isAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Post\\CreatePostController@updatePost',
        'controller' => 'App\\Http\\Controllers\\Post\\CreatePostController@updatePost',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'post.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'doctors.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/doctors',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isAdmin',
          4 => 'isAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Post\\MedicinePostController@index',
        'controller' => 'App\\Http\\Controllers\\Post\\MedicinePostController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'doctors.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create.doctorpost' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/add-doctors',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isAdmin',
          4 => 'isAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Post\\MedicinePostController@createDoctorPost',
        'controller' => 'App\\Http\\Controllers\\Post\\MedicinePostController@createDoctorPost',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'create.doctorpost',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'add_doctors.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/add-doctors',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isAdmin',
          4 => 'isAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Post\\MedicinePostController@storageMedicinePost',
        'controller' => 'App\\Http\\Controllers\\Post\\MedicinePostController@storageMedicinePost',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'add_doctors.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'doctors.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'doctors/home',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isUser',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@dashboard',
        'controller' => 'App\\Http\\Controllers\\UserController@dashboard',
        'namespace' => NULL,
        'prefix' => '/doctors',
        'where' => 
        array (
        ),
        'as' => 'doctors.dashboard',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'Users' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'doctors/users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isUser',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@users',
        'controller' => 'App\\Http\\Controllers\\UserController@users',
        'namespace' => NULL,
        'prefix' => '/doctors',
        'where' => 
        array (
        ),
        'as' => 'Users',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XSHdAG6u3dhPVH1I' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'get-users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isUser',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@getusers',
        'controller' => 'App\\Http\\Controllers\\UserController@getusers',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::XSHdAG6u3dhPVH1I',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wrxgcmXnK8LEP70r' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'request-data/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Post\\MedicinePostController@requestSubcategory',
        'controller' => 'App\\Http\\Controllers\\Post\\MedicinePostController@requestSubcategory',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::wrxgcmXnK8LEP70r',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::qvBMXWlRenjFvMhC' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'request-medicine-name/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Post\\MedicinePostController@requestMedicineName',
        'controller' => 'App\\Http\\Controllers\\Post\\MedicinePostController@requestMedicineName',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::qvBMXWlRenjFvMhC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::r2sCqDFxNeYtkSa6' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'request-medicine-dogs/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Post\\MedicinePostController@requestMedicineDogs',
        'controller' => 'App\\Http\\Controllers\\Post\\MedicinePostController@requestMedicineDogs',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::r2sCqDFxNeYtkSa6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'medicine-inventory.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/inventories',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Inventory\\MedicineInventory@index',
        'controller' => 'App\\Http\\Controllers\\Inventory\\MedicineInventory@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'medicine-inventory.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'medicine-inventory.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/inventories',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Inventory\\MedicineInventory@store',
        'controller' => 'App\\Http\\Controllers\\Inventory\\MedicineInventory@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'medicine-inventory.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'search-inv.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/inventories-edit-get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Inventory\\MedicineInventory@getData',
        'controller' => 'App\\Http\\Controllers\\Inventory\\MedicineInventory@getData',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'search-inv.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UabD6TPyG5pJXJLz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/inventories-edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Inventory\\MedicineInventory@editInventory',
        'controller' => 'App\\Http\\Controllers\\Inventory\\MedicineInventory@editInventory',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::UabD6TPyG5pJXJLz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update_inventory.action' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/inventories-update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Inventory\\MedicineInventory@updateInventory',
        'controller' => 'App\\Http\\Controllers\\Inventory\\MedicineInventory@updateInventory',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'update_inventory.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'search-unauthorized.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/inventories-unauthorized-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Inventory\\MedicineInventory@unauthorizedData',
        'controller' => 'App\\Http\\Controllers\\Inventory\\MedicineInventory@unauthorizedData',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'search-unauthorized.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'stock.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/stock',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Stock\\StockController@index',
        'controller' => 'App\\Http\\Controllers\\Stock\\StockController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'stock.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'stock.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/stock',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Stock\\StockController@storeStock',
        'controller' => 'App\\Http\\Controllers\\Stock\\StockController@storeStock',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'stock.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'seach-stock.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/stock-edit-get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Stock\\StockController@getData',
        'controller' => 'App\\Http\\Controllers\\Stock\\StockController@getData',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'seach-stock.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::E09qG4teNvXTheKH' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/stock-edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Stock\\StockController@editStock',
        'controller' => 'App\\Http\\Controllers\\Stock\\StockController@editStock',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::E09qG4teNvXTheKH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update_stock.action' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/stock-update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Stock\\StockController@updateStock',
        'controller' => 'App\\Http\\Controllers\\Stock\\StockController@updateStock',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'update_stock.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'stock-details.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/stock-details',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Stock\\StockController@getStock',
        'controller' => 'App\\Http\\Controllers\\Stock\\StockController@getStock',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'stock-details.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::FTqDPQcsYJvdcRrI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingController@index',
        'controller' => 'App\\Http\\Controllers\\SettingController@index',
        'namespace' => NULL,
        'prefix' => '/settings',
        'where' => 
        array (
        ),
        'excluded_middleware' => 
        array (
          0 => 'auth',
        ),
        'as' => 'generated::FTqDPQcsYJvdcRrI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::giAAjDZTP3jdGZLP' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingController@update',
        'controller' => 'App\\Http\\Controllers\\SettingController@update',
        'namespace' => NULL,
        'prefix' => '/settings',
        'where' => 
        array (
        ),
        'as' => 'generated::giAAjDZTP3jdGZLP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lang.switch' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lang/{lang}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Language\\LanguageController@switchLang',
        'controller' => 'App\\Http\\Controllers\\Language\\LanguageController@switchLang',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'lang.switch',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
