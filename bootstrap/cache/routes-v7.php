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
            '_route' => 'generated::VlappmisalDE0T8t',
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
      '/api/get-blog-post' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5lBCbACQ2I9XOnIz',
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
      '/api/get-blog-category-post' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::szU9t6ipsiu8YW4p',
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
      '/api/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'auth.register',
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
      '/api/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WSfp5cuXtLSG4wtL',
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
      '/api/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6z8fWa9B0iC4Gq22',
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
      '/api/loggeduser' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::aQ70TwrbISYxogpA',
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
      '/api/changepassword' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rWypCyEmxIo0jeYE',
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
      '/api/newsleter' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'newsleter.store',
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
      '/api/products' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'products.index',
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
      '/api/super-admin/forntend-footer-information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'forntend-footer-information.index',
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
            '_route' => 'forntend-footer-information.store',
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
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZFlTSKUcAlKjS8nv',
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
      '/login-door' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login_door.index',
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
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'superadmin.login',
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
      '/login-page-get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login_page.action',
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
      '/registration-form' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'registraion_form.index',
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
      '/registration-get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'email_register.action',
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
      '/admin-login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.login',
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
      '/accounts-login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'accounts.login',
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
      '/common-user-login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.login',
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
        1 => 
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
        2 => 
        array (
          0 => 
          array (
            '_route' => 'password.update',
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
      '/send-link' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'send.link',
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
      '/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'register.loading',
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
      '/email-verification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'email.verification',
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
      '/email' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'email.index',
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
      '/email/send' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'email.send',
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
      '/email/send/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'email.send_list',
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
      '/email/fetch' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'email.fetch',
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
      '/email/fetch/drafts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'email.draft',
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
      '/email/view/status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'email.view_draft',
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
      '/email/delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'email.delete',
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
      '/email-delete-permission/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'email.store',
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
      '/email-record/fetch' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'email.record',
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
      '/email-setting' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'email.setting',
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
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logout',
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
      '/admin-logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'adminLogout',
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
      '/accounts-logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'accountsLogout',
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
      '/common-user-logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'commonUserLogout',
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
      '/users/fetch-role' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'fetch_role.action',
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
      '/users/fetch-role-branch' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'fetch_branch_role.action',
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
      '/super-admin/role-index' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role_index',
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
      '/super-admin/role-create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role_create.action',
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
      '/super-admin/role-get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role_get.action',
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
      '/super-admin/role-search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role_search.action',
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
      '/super-admin/role-promot' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role_promot.action',
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
      '/super-admin/role-permission-index' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role_permission.index',
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
      '/super-admin/role-permission-create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role_permission_create.action',
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
      '/super-admin/email-verification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'emailVerification',
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
      '/super-admin/email-verification-status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'email_update_status.action',
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
      '/super-admin/auth-page' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'authPageLoad',
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
      '/update-app-setting' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'updateappSetting',
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
      '/super-admin/inventory-data-request' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'inventory-search.action',
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
      '/super-admin/inventory-permission-update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'inventory_permission_status.action',
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
      '/super-admin/inventory-permission' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'action.inventory-permission',
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
      '/super-admin/get-inventory-permission' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'search-inventory-permission.action',
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
            '_route' => 'generated::gfyfVIuIFY6bR28N',
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
      '/accounts/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'accounts.dashboard',
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
      '/marketing/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'marketing.dashboard',
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
      '/delivery-team/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delivery-team.dashboard',
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
      '/super-admin/show-user-details' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.details',
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
      '/super-admin/show-user-activity' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.activity',
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
      '/super-admin/get-user-activity' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.get_activity',
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
      '/super-admin/forntend-footer-information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'forntend_footer.index',
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
      '/super-admin/forntend-footer-get-information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get_information.action',
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
      '/super-admin/forntend-footer-update-information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update.action',
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
      '/super-admin/forntend-footer-newletter' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'forntend_footer_newletter.index',
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
      '/super-admin/forntend-footer-get-newletter' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'forntend_footer_get_newsletter.action',
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
      '/super-admin/forntend-footer-filter-newletter' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'newsletter_filter.action',
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
      '/super-admin/forntend-footer-newletter-pdf' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'forntend_footer_newletter_pdf.action',
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
      '/super-admin/fontend-footer-newsletter/export-cvs-format' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'forntend_footer_newletter_cvs_file.action',
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
      '/super-admin/supplier/access-permission' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'access-permission.index',
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
      '/super-admin/store-permission' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user-permission.store',
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
      '/super-admin/permission-status-update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user-permission.status_update',
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
      '/super-admin/supplier-module-permission' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module.action',
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
      '/suppliers/permission-status-update' => 
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
      '/medicine/inventories' => 
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
      '/medicine/inventories-edit-get' => 
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
      '/medicine/inventories-unauthorized-data' => 
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
      '/report/inventory-details-record' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'inventory_details.action',
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
      '/report/get-inventory-details-record' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get_inventory_details.action',
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
      '/report/inventory-details-record-pdf' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'inventory-details-record_pdf.action',
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
      '/report/inventory-details-record/export-excel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'inventory-details-record_excel.action',
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
      '/report/inventory-details-record/export-cvs-format' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'inventory-details-record_cvs_file.action',
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
      '/report/inventory-details-record/print' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'inventory-details-record.print',
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
      '/stock' => 
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
      '/stock-edit-get' => 
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
      '/stock-details' => 
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
      '/get-division' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'division.get',
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
      '/company/branch-type-create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'branch_type.store',
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
      '/company/branch-type-search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'search-branch-type.action',
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
      '/company/branch-activity' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'branch.index',
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
      '/company/branch-create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'branch.store',
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
      '/company/branch-search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'search-branch.action',
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
      '/company/branch-admin-access' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'branch_access.view',
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
      '/company/branch-admin-permission-store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'branch_access_store.action',
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
      '/company/branch-admin-permission' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'access_status.action',
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
      '/company/branch-user-access' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'branch_access_permission.view',
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
      '/company/branch-data-fetch' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'branch_fetch.action',
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
      '/company/branch-specify-name-fetch' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'branch_specify_search.action',
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
      '/company/branch-user-permission-create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permission_create.action',
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
      '/company/branch-user-permission' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permission_status.action',
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
      '/permission/user-permission-index' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user_permission.index',
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
      '/permission/user-permission-store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user_permission.store',
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
      '/application/module-category-index' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module_category_view.action',
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
      '/application/module-category-store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module_category_store.action',
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
      '/application/module-category-search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module_category_search.action',
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
      '/application/module-name-index' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module_name_view.action',
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
      '/application/module-name-store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module_name_store.action',
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
      '/application/module-name-search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module_name_search.action',
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
      '/application/module-index' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module.index',
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
      '/application/module-name-get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module_name_get.action',
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
      '/application/module-category-get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module_category_get.action',
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
      '/application/module-store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module.store',
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
            '_route' => 'generated::IbmSO9BySrLLUqSN',
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
            '_route' => 'generated::D3olrI87uUtBtlZJ',
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
            '_route' => 'generated::b5ofKujajatZhK4N',
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
            '_route' => 'generated::aM8aFVLhHxKtcBe3',
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
      '/file-manager/modal-content' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'file.modalContent',
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
      '/file-manager/upload-file' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'upload.file',
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
      '/file-manager/get-folders' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'folder.getFolder',
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
      '/file-manager/fetch-folders' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'folder.fetchFolder',
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
      '/file-manager/create-folder' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'file-manager.create-folder',
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
      '/file-manager/select-file-folder' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getFolder.action',
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
            '_route' => 'generated::drG2k3oN1UaJYbnS',
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
            '_route' => 'generated::7iAT8w35p9MQFPu3',
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
      0 => '{^(?|/a(?|p(?|i/super\\-admin/forntend\\-footer\\-information/([^/]++)(?|(*:72))|plication/module\\-(?|category\\-(?|edit/([^/]++)(*:127)|update/([^/]++)(*:150)|delete/([^/]++)(*:173))|name\\-(?|edit/([^/]++)(*:204)|update/([^/]++)(*:227)|delete/([^/]++)(*:250))|edit/([^/]++)(*:272)|update/([^/]++)(*:295)|delete/([^/]++)(*:318)|search/([^/]++)(*:341)))|dmin/(?|edit\\-(?|category\\-post/([^/]++)(*:391)|post/([^/]++)(*:412))|update\\-(?|category\\-post/([^/]++)(*:455)|post/([^/]++)(*:476))))|/e(?|mail(?|/forward/(?|([^/]++)(*:519)|send(*:531))|\\-(?|delete\\-permission/(?|edit/([^/]++)(*:580)|update/([^/]++)(*:603)|delete/([^/]++)(*:626))|setting/update/([^/]++)(*:658)))|dit\\-(?|u(?|sers/([^/]++)(*:693)|nits/([^/]++)(*:714))|p(?|ermission/([^/]++)(*:745)|roduct/([^/]++)(*:768))|su(?|pplier/([^/]++)(*:797)|b\\-category/([^/]++)(*:825))|category/([^/]++)(*:851)|m(?|edicine\\-(?|group/([^/]++)(*:889)|name/([^/]++)(*:910)|dosage/([^/]++)(*:933))|odel/([^/]++)(*:955))|origin/([^/]++)(*:979)|brand/([^/]++)(*:1001)))|/u(?|ser(?|\\-email/([^/]++)(*:1039)|s/fetch\\-email(?|/([^/]++)(*:1074)|\\-(?|branch/([^/]++)(*:1103)|one/([^/]++)(*:1124)|two/([^/]++)(*:1145))))|pdate\\-(?|u(?|sers/([^/]++)(*:1184)|nits/([^/]++)(*:1206))|p(?|ermission/([^/]++)(*:1238)|roduct/([^/]++)(*:1262))|su(?|pplier/([^/]++)(*:1292)|b\\-category/([^/]++)(*:1321))|category/([^/]++)(*:1348)|m(?|edicine\\-(?|group/([^/]++)(*:1387)|name/([^/]++)(*:1409)|dosage/([^/]++)(*:1433))|odel/([^/]++)(*:1456))|origin/([^/]++)(*:1481)|brand/([^/]++)(*:1504)))|/s(?|uper\\-admin/(?|role\\-(?|edit/([^/]++)(*:1557)|update/([^/]++)(*:1581)|delete/([^/]++)(*:1605))|auth\\-page\\-filter/([^/]++)(*:1642)|update\\-(?|auth\\-page/([^/]++)(*:1681)|permission/([^/]++)(*:1709))|delete\\-(?|p(?|ost\\-category/([^/]++)(*:1756)|ermission/([^/]++)(*:1783))|main\\-post/([^/]++)(*:1812)|inventory\\-permission/([^/]++)(*:1851))|inventory\\-authorize\\-user/([^/]++)(*:1896)|token\\-inventory\\-permission/([^/]++)(*:1942)|forntend\\-footer\\-newletter/(?|([^/]++)(*:1990)|export\\-excel(*:2012))|get\\-email/([^/]++)(*:2041)|edit\\-permission/([^/]++)(*:2075))|how\\-users/([^/]++)(*:2104)|tock\\-(?|edit/([^/]++)(*:2135)|update/([^/]++)(*:2159)))|/delete\\-(?|u(?|sers/([^/]++)(*:2199)|nits/([^/]++)(*:2221))|p(?|ermission/([^/]++)(*:2253)|roduct/([^/]++)(*:2277))|su(?|pplier/([^/]++)(*:2307)|b\\-category/([^/]++)(*:2336))|category/([^/]++)(*:2363)|m(?|edicine\\-(?|group/([^/]++)(*:2402)|name/([^/]++)(*:2424)|dosage/([^/]++)(*:2448))|odel/([^/]++)(*:2471))|origin/([^/]++)(*:2496)|brand/([^/]++)(*:2519))|/get\\-(?|email/([^/]++)(*:2552)|district/([^/]++)(*:2578)|upazila/([^/]++)(*:2603))|/view\\-supplier/([^/]++)(*:2637)|/request\\-(?|data/([^/]++)(*:2672)|medicine\\-(?|name/([^/]++)(*:2707)|dogs/([^/]++)(*:2729)))|/medicine/inventories\\-(?|edit/([^/]++)(*:2779)|update/([^/]++)(*:2803))|/company/branch\\-(?|type\\-(?|edit/([^/]++)(*:2855)|update/([^/]++)(*:2879)|delete/([^/]++)(*:2903))|edit/([^/]++)(*:2926)|u(?|pdate/([^/]++)(*:2953)|ser\\-(?|email\\-fetch/([^/]++)(*:2991)|permission\\-(?|role/([^/]++)(*:3028)|e(?|mail/([^/]++)(*:3054)|dit/([^/]++)(*:3075))|update/([^/]++)(*:3100)|delete/([^/]++)(*:3124))))|delete/([^/]++)(*:3151)|get\\-data/([^/]++)(*:3178)|name\\-query/([^/]++)(*:3207))|/permission/user\\-permission\\-(?|edit/([^/]++)(*:3263)|update/([^/]++)(*:3287)|delete/([^/]++)(*:3311)|search/([^/]++)(*:3335))|/file(?|s/([^/]++)(*:3363)|\\-manager/(?|delete/([^/]++)/([^/]++)(*:3409)|edit\\-folders/([^/]++)(*:3440)|update\\-folders/([^/]++)(*:3473)|folder\\-delete/([^/]++)(*:3505)))|/lang/([^/]++)(*:3530))/?$}sDu',
    ),
    3 => 
    array (
      72 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'forntend-footer-information.show',
          ),
          1 => 
          array (
            0 => 'forntend_footer_information',
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
          0 => 
          array (
            '_route' => 'forntend-footer-information.update',
          ),
          1 => 
          array (
            0 => 'forntend_footer_information',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'forntend-footer-information.destroy',
          ),
          1 => 
          array (
            0 => 'forntend_footer_information',
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
      127 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module_category_edit.action',
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
      150 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module_category_update.action',
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
      173 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module_category_delete.action',
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
      204 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module_name_edit.action',
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
      227 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module_name_update.action',
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
      250 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module_name_delete.action',
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
      272 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module.edit',
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
      295 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module.update',
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
      318 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module.delete',
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
      341 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'module.search',
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
      391 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Jxc85mzJu4FUIKr2',
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
      412 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ffFIlzCav0kJVYqS',
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
      476 => 
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
      519 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'email.forward',
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
      531 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'email.forward.send',
          ),
          1 => 
          array (
          ),
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
      580 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'email.permission_edit',
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
      603 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'email.permission_update',
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
      626 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'email.permission_delete',
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
      658 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'email.setting_update',
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
      693 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7XRMFRgGhjJy7Q1q',
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
      714 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sukOHc6luW1gaq17',
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
      745 => 
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
      768 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::FGCTLJCU0djooiy8',
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
      797 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OAULw62mBiOXboIB',
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
      825 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::f3u7xGsiBkk3dIMk',
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
      851 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mTWOVt0okOYLVCBl',
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
      889 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ERQbMrkzd3v1kWey',
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
      910 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YIJi3DFguq5enevu',
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
      933 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::O8vwZpxTk83K3UXC',
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
      955 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7hZDauU2jGfnYjDB',
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
      979 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gAZ4dtqPMX5E8jhb',
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
      1001 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Bnb6wmjAb45EQkcl',
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
      1039 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.email',
          ),
          1 => 
          array (
            0 => 'selectedRole',
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
      1074 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'fetch_email.action',
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
      1103 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'fetch_branch_email.action',
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
      1124 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'fetch_email_one.action',
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
      1145 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'fetch_email_two.action',
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
      1184 => 
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
      1206 => 
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
      1238 => 
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
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1262 => 
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
      1292 => 
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
      1321 => 
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
      1348 => 
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
      1387 => 
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
      1409 => 
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
      1433 => 
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
      1456 => 
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
      1481 => 
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
      1504 => 
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
      1557 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role_edit.action',
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
      1581 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role_update.action',
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
      1605 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role_delete.action',
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
      1642 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filter.action',
          ),
          1 => 
          array (
            0 => 'page_id',
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
      1681 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update_auth_page.action',
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
      1709 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user-permission.update',
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
      1756 => 
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
      1783 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user-permission.delete',
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
      1812 => 
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
      1851 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'inventory_permission_delete.action',
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
      1896 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'auth-role.action',
          ),
          1 => 
          array (
            0 => 'selectedRole',
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
      1942 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'inventory-token.action',
          ),
          1 => 
          array (
            0 => 'inventory_id',
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
      1990 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'forntend_footer_newletter_delete.action',
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
      2012 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'forntend_footer_newletter_excel.action',
          ),
          1 => 
          array (
          ),
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
      2041 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user-permission.email',
          ),
          1 => 
          array (
            0 => 'selectedUserRole',
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
      2075 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user-permission.edit',
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
      2104 => 
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
      2135 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DuguXwe2l16XPK6F',
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
      2159 => 
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
      2199 => 
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
      2221 => 
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
      2253 => 
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
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2277 => 
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
      2307 => 
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
      2336 => 
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
      2363 => 
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
      2402 => 
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
      2424 => 
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
      2448 => 
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
      2471 => 
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
      2496 => 
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
      2519 => 
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
      2552 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permission.email',
          ),
          1 => 
          array (
            0 => 'selectedRole',
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
      2578 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'district.get',
          ),
          1 => 
          array (
            0 => 'selectedDivision',
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
      2603 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'upazila.get',
          ),
          1 => 
          array (
            0 => 'selectedDistrict',
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
      2637 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'view_supplier.action',
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
      2672 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::81BpLZPaYGk874lY',
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
      2707 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2nGnzCsp1lDh6I94',
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
      2729 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::cAUIyOYAlTUgRdsU',
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
      2779 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::f8eyX0ZkoICAnCsp',
          ),
          1 => 
          array (
            0 => 'inventory_id',
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
      2803 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update_inventory.action',
          ),
          1 => 
          array (
            0 => 'inventory_id',
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
      2855 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'edit-branch-type.action',
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
      2879 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update_branch_type.action',
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
      2903 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'branch_type.delete',
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
      2926 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'edit-branch.action',
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
      2953 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update_branch.action',
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
      2991 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'branch_user_email_fetch.action',
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
      3028 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permission_user_role.action',
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
      3054 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permission_user_email.action',
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
      3075 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permission_edit.action',
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
      3100 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permission_update.action',
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
      3124 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permission_delete.action',
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
      3151 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'branch.delete',
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
      3178 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'branch_get.action',
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
      3207 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'branch_name_search.action',
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
      3263 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user_permission.edit',
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
      3287 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user_permission.update',
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
      3311 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user_permission.delete',
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
      3335 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user_permission.search',
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
      3363 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'files.showFiles',
          ),
          1 => 
          array (
            0 => 'folder',
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
      3409 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'file.delete',
          ),
          1 => 
          array (
            0 => 'folder',
            1 => 'filename',
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
      3440 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VBYULNu87oYHtk6p',
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
      3473 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-folder.action',
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
      3505 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'folder-delete.action',
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
      3530 => 
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
    'generated::VlappmisalDE0T8t' => 
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
        'as' => 'generated::VlappmisalDE0T8t',
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
    'generated::5lBCbACQ2I9XOnIz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/get-blog-post',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BlogPostController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\BlogPostController@index',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::5lBCbACQ2I9XOnIz',
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
    'generated::szU9t6ipsiu8YW4p' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/get-blog-category-post',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BlogPostController@blogCategory',
        'controller' => 'App\\Http\\Controllers\\Api\\BlogPostController@blogCategory',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::szU9t6ipsiu8YW4p',
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
    'auth.register' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\AuthController@register',
        'controller' => 'App\\Http\\Controllers\\Api\\AuthController@register',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'auth.register',
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
    'generated::WSfp5cuXtLSG4wtL' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\AuthController@login',
        'controller' => 'App\\Http\\Controllers\\Api\\AuthController@login',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::WSfp5cuXtLSG4wtL',
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
    'generated::6z8fWa9B0iC4Gq22' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\AuthController@logout',
        'controller' => 'App\\Http\\Controllers\\Api\\AuthController@logout',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::6z8fWa9B0iC4Gq22',
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
    'generated::aQ70TwrbISYxogpA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/loggeduser',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\AuthController@logged_user',
        'controller' => 'App\\Http\\Controllers\\Api\\AuthController@logged_user',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::aQ70TwrbISYxogpA',
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
    'generated::rWypCyEmxIo0jeYE' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/changepassword',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\AuthController@change_password',
        'controller' => 'App\\Http\\Controllers\\Api\\AuthController@change_password',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::rWypCyEmxIo0jeYE',
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
    'newsleter.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/newsleter',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\NewsleterController@store',
        'controller' => 'App\\Http\\Controllers\\Api\\NewsleterController@store',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'newsleter.store',
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
    'products.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/products',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ProductController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\ProductController@index',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'products.index',
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
    'forntend-footer-information.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/super-admin/forntend-footer-information',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'forntend-footer-information.index',
        'uses' => 'App\\Http\\Controllers\\Api\\Forntend\\Footer\\FooterInformation@index',
        'controller' => 'App\\Http\\Controllers\\Api\\Forntend\\Footer\\FooterInformation@index',
        'namespace' => NULL,
        'prefix' => 'api/super-admin',
        'where' => 
        array (
        ),
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
    'forntend-footer-information.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/super-admin/forntend-footer-information',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'forntend-footer-information.store',
        'uses' => 'App\\Http\\Controllers\\Api\\Forntend\\Footer\\FooterInformation@store',
        'controller' => 'App\\Http\\Controllers\\Api\\Forntend\\Footer\\FooterInformation@store',
        'namespace' => NULL,
        'prefix' => 'api/super-admin',
        'where' => 
        array (
        ),
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
    'forntend-footer-information.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/super-admin/forntend-footer-information/{forntend_footer_information}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'forntend-footer-information.show',
        'uses' => 'App\\Http\\Controllers\\Api\\Forntend\\Footer\\FooterInformation@show',
        'controller' => 'App\\Http\\Controllers\\Api\\Forntend\\Footer\\FooterInformation@show',
        'namespace' => NULL,
        'prefix' => 'api/super-admin',
        'where' => 
        array (
        ),
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
    'forntend-footer-information.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/super-admin/forntend-footer-information/{forntend_footer_information}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'forntend-footer-information.update',
        'uses' => 'App\\Http\\Controllers\\Api\\Forntend\\Footer\\FooterInformation@update',
        'controller' => 'App\\Http\\Controllers\\Api\\Forntend\\Footer\\FooterInformation@update',
        'namespace' => NULL,
        'prefix' => 'api/super-admin',
        'where' => 
        array (
        ),
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
    'forntend-footer-information.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/super-admin/forntend-footer-information/{forntend_footer_information}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'forntend-footer-information.destroy',
        'uses' => 'App\\Http\\Controllers\\Api\\Forntend\\Footer\\FooterInformation@destroy',
        'controller' => 'App\\Http\\Controllers\\Api\\Forntend\\Footer\\FooterInformation@destroy',
        'namespace' => NULL,
        'prefix' => 'api/super-admin',
        'where' => 
        array (
        ),
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
    'generated::ZFlTSKUcAlKjS8nv' => 
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
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:298:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:80:"function () {
    return \\view(\'login-door\');
    //return view(\'welcome\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000000000062b0000000000000000";}";s:4:"hash";s:44:"4wrZR3mEPMhB5ze4ZtsnDxWzY78YDO7nkolAJ/ssGlQ=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::ZFlTSKUcAlKjS8nv',
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
    'login_door.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login-door',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@loginDoor',
        'controller' => 'App\\Http\\Controllers\\AuthController@loginDoor',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'login_door.index',
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
    'superadmin.login' => 
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
        'uses' => 'App\\Http\\Controllers\\AuthController@loadLogin',
        'controller' => 'App\\Http\\Controllers\\AuthController@loadLogin',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'superadmin.login',
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
    'login_page.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login-page-get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'loginPage',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@openLogin',
        'controller' => 'App\\Http\\Controllers\\AuthController@openLogin',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'login_page.action',
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
    'registraion_form.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'registration-form',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'userRegistration',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@loadingRegistrationForm',
        'controller' => 'App\\Http\\Controllers\\AuthController@loadingRegistrationForm',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'registraion_form.index',
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
    'email_register.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'registration-get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'registrationAction',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@userEmailRegister',
        'controller' => 'App\\Http\\Controllers\\AuthController@userEmailRegister',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'email_register.action',
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
    'admin.login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin-login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'adminLoginPage',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@loadAdminLogin',
        'controller' => 'App\\Http\\Controllers\\AuthController@loadAdminLogin',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'admin.login',
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
    'accounts.login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'accounts-login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'accountsLoginPage',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@loadAccountsLogin',
        'controller' => 'App\\Http\\Controllers\\AuthController@loadAccountsLogin',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'accounts.login',
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
    'user.login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'common-user-login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'commonUserLoginPage',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@loadCommonUserLogin',
        'controller' => 'App\\Http\\Controllers\\AuthController@loadCommonUserLogin',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'user.login',
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
          1 => 'forgetPage',
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
          1 => 'resetPage',
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
          1 => 'resetPage',
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
    'password.update' => 
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
          1 => 'resetPage',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@setPassword',
        'controller' => 'App\\Http\\Controllers\\AuthController@setPassword',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.update',
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
    'send.link' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'send-link',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@sendLink',
        'controller' => 'App\\Http\\Controllers\\AuthController@sendLink',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'send.link',
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
    'register.loading' => 
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
          1 => 'registerPage',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@loadRegister',
        'controller' => 'App\\Http\\Controllers\\AuthController@loadRegister',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'register.loading',
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
          1 => 'registerPage',
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
    'email.verification' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'email-verification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'emailVerificationPage',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@loadLink',
        'controller' => 'App\\Http\\Controllers\\AuthController@loadLink',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'email.verification',
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
    'email.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'email',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:SuperAdmin|Admin|SubAdmin|Accounts|Marketing|DeliveryTeam|User',
        ),
        'uses' => 'App\\Http\\Controllers\\Email\\EmailController@index',
        'controller' => 'App\\Http\\Controllers\\Email\\EmailController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'email.index',
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
    'email.send' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'email/send',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:SuperAdmin|Admin|SubAdmin|Accounts|Marketing|DeliveryTeam|User',
        ),
        'uses' => 'App\\Http\\Controllers\\Email\\EmailController@sendEmail',
        'controller' => 'App\\Http\\Controllers\\Email\\EmailController@sendEmail',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'email.send',
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
    'email.send_list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'email/send/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:SuperAdmin|Admin|SubAdmin|Accounts|Marketing|DeliveryTeam|User',
        ),
        'uses' => 'App\\Http\\Controllers\\Email\\EmailController@sendFetchEmail',
        'controller' => 'App\\Http\\Controllers\\Email\\EmailController@sendFetchEmail',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'email.send_list',
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
    'email.fetch' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'email/fetch',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:SuperAdmin|Admin|SubAdmin|Accounts|Marketing|DeliveryTeam|User',
        ),
        'uses' => 'App\\Http\\Controllers\\Email\\EmailController@inboxFetchEmail',
        'controller' => 'App\\Http\\Controllers\\Email\\EmailController@inboxFetchEmail',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'email.fetch',
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
    'email.forward' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'email/forward/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:SuperAdmin|Admin|SubAdmin|Accounts|Marketing|DeliveryTeam|User',
        ),
        'uses' => 'App\\Http\\Controllers\\Email\\EmailController@forwardEmail',
        'controller' => 'App\\Http\\Controllers\\Email\\EmailController@forwardEmail',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'email.forward',
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
    'email.forward.send' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'email/forward/send',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:SuperAdmin|Admin|SubAdmin|Accounts|Marketing|DeliveryTeam|User',
        ),
        'uses' => 'App\\Http\\Controllers\\Email\\EmailController@sendForwardedEmail',
        'controller' => 'App\\Http\\Controllers\\Email\\EmailController@sendForwardedEmail',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'email.forward.send',
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
    'email.draft' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'email/fetch/drafts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:SuperAdmin|Admin|SubAdmin|Accounts|Marketing|DeliveryTeam|User',
        ),
        'uses' => 'App\\Http\\Controllers\\Email\\EmailController@getDraftFetchEmail',
        'controller' => 'App\\Http\\Controllers\\Email\\EmailController@getDraftFetchEmail',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'email.draft',
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
    'email.view_draft' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'email/view/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:SuperAdmin|Admin|SubAdmin|Accounts|Marketing|DeliveryTeam|User',
        ),
        'uses' => 'App\\Http\\Controllers\\Email\\EmailController@emailView',
        'controller' => 'App\\Http\\Controllers\\Email\\EmailController@emailView',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'email.view_draft',
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
    'email.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'email/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:SuperAdmin|Admin|SubAdmin|Accounts|Marketing|DeliveryTeam|User',
        ),
        'uses' => 'App\\Http\\Controllers\\Email\\EmailController@deleteEmail',
        'controller' => 'App\\Http\\Controllers\\Email\\EmailController@deleteEmail',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'email.delete',
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
    'user.email' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user-email/{selectedRole}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:SuperAdmin|Admin|SubAdmin|Accounts|Marketing|DeliveryTeam|User',
        ),
        'uses' => 'App\\Http\\Controllers\\Email\\EmailController@getUserEmail',
        'controller' => 'App\\Http\\Controllers\\Email\\EmailController@getUserEmail',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'user.email',
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
    'email.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'email-delete-permission/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Email\\EmailController@store',
        'controller' => 'App\\Http\\Controllers\\Email\\EmailController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'email.store',
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
    'email.permission_edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'email-delete-permission/edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Email\\EmailController@permissionEdit',
        'controller' => 'App\\Http\\Controllers\\Email\\EmailController@permissionEdit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'email.permission_edit',
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
    'email.permission_update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'email-delete-permission/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Email\\EmailController@permissionUpdate',
        'controller' => 'App\\Http\\Controllers\\Email\\EmailController@permissionUpdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'email.permission_update',
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
    'email.permission_delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'email-delete-permission/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Email\\EmailController@deletePermissionEmail',
        'controller' => 'App\\Http\\Controllers\\Email\\EmailController@deletePermissionEmail',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'email.permission_delete',
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
    'email.record' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'email-record/fetch',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Email\\EmailController@emailRecord',
        'controller' => 'App\\Http\\Controllers\\Email\\EmailController@emailRecord',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'email.record',
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
    'email.setting' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'email-setting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Email\\EmailController@emailSetting',
        'controller' => 'App\\Http\\Controllers\\Email\\EmailController@emailSetting',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'email.setting',
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
    'email.setting_update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'email-setting/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Email\\EmailController@emailSettingUpdate',
        'controller' => 'App\\Http\\Controllers\\Email\\EmailController@emailSettingUpdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'email.setting_update',
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
    'logout' => 
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
        'as' => 'logout',
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
    'adminLogout' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin-logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@adminLogout',
        'controller' => 'App\\Http\\Controllers\\AuthController@adminLogout',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'adminLogout',
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
    'accountsLogout' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'accounts-logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@accountsLogout',
        'controller' => 'App\\Http\\Controllers\\AuthController@accountsLogout',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'accountsLogout',
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
    'commonUserLogout' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'common-user-logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@commonUserLogout',
        'controller' => 'App\\Http\\Controllers\\AuthController@commonUserLogout',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'commonUserLogout',
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
    'fetch_role.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'users/fetch-role',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@fetchRole',
        'controller' => 'App\\Http\\Controllers\\AuthController@fetchRole',
        'namespace' => NULL,
        'prefix' => '/users',
        'where' => 
        array (
        ),
        'as' => 'fetch_role.action',
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
    'fetch_email.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'users/fetch-email/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@fetchEmail',
        'controller' => 'App\\Http\\Controllers\\AuthController@fetchEmail',
        'namespace' => NULL,
        'prefix' => '/users',
        'where' => 
        array (
        ),
        'as' => 'fetch_email.action',
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
    'fetch_branch_role.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'users/fetch-role-branch',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@fetchBranchRoles',
        'controller' => 'App\\Http\\Controllers\\AuthController@fetchBranchRoles',
        'namespace' => NULL,
        'prefix' => '/users',
        'where' => 
        array (
        ),
        'as' => 'fetch_branch_role.action',
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
    'fetch_branch_email.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'users/fetch-email-branch/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@fetchBranchEmails',
        'controller' => 'App\\Http\\Controllers\\AuthController@fetchBranchEmails',
        'namespace' => NULL,
        'prefix' => '/users',
        'where' => 
        array (
        ),
        'as' => 'fetch_branch_email.action',
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
    'fetch_email_one.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'users/fetch-email-one/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@fetchEmailOne',
        'controller' => 'App\\Http\\Controllers\\AuthController@fetchEmailOne',
        'namespace' => NULL,
        'prefix' => '/users',
        'where' => 
        array (
        ),
        'as' => 'fetch_email_one.action',
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
    'fetch_email_two.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'users/fetch-email-two/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@fetchEmailTwo',
        'controller' => 'App\\Http\\Controllers\\AuthController@fetchEmailTwo',
        'namespace' => NULL,
        'prefix' => '/users',
        'where' => 
        array (
        ),
        'as' => 'fetch_email_two.action',
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
    'role_index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/role-index',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\SuperAdminController@roleIndex',
        'controller' => 'App\\Http\\Controllers\\SuperAdminController@roleIndex',
        'namespace' => NULL,
        'prefix' => '/super-admin',
        'where' => 
        array (
        ),
        'as' => 'role_index',
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
    'role_create.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'super-admin/role-create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\SuperAdminController@roleCreate',
        'controller' => 'App\\Http\\Controllers\\SuperAdminController@roleCreate',
        'namespace' => NULL,
        'prefix' => '/super-admin',
        'where' => 
        array (
        ),
        'as' => 'role_create.action',
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
    'role_get.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/role-get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\SuperAdminController@roleGet',
        'controller' => 'App\\Http\\Controllers\\SuperAdminController@roleGet',
        'namespace' => NULL,
        'prefix' => '/super-admin',
        'where' => 
        array (
        ),
        'as' => 'role_get.action',
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
    'role_search.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/role-search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\SuperAdminController@roleSearch',
        'controller' => 'App\\Http\\Controllers\\SuperAdminController@roleSearch',
        'namespace' => NULL,
        'prefix' => '/super-admin',
        'where' => 
        array (
        ),
        'as' => 'role_search.action',
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
    'role_edit.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/role-edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\SuperAdminController@roleEdit',
        'controller' => 'App\\Http\\Controllers\\SuperAdminController@roleEdit',
        'namespace' => NULL,
        'prefix' => '/super-admin',
        'where' => 
        array (
        ),
        'as' => 'role_edit.action',
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
    'role_update.action' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'super-admin/role-update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\SuperAdminController@roleUpdate',
        'controller' => 'App\\Http\\Controllers\\SuperAdminController@roleUpdate',
        'namespace' => NULL,
        'prefix' => '/super-admin',
        'where' => 
        array (
        ),
        'as' => 'role_update.action',
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
    'role_delete.action' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'super-admin/role-delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\SuperAdminController@roleDelete',
        'controller' => 'App\\Http\\Controllers\\SuperAdminController@roleDelete',
        'namespace' => NULL,
        'prefix' => '/super-admin',
        'where' => 
        array (
        ),
        'as' => 'role_delete.action',
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
    'role_promot.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'super-admin/role-promot',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\SuperAdminController@rolePromotIndex',
        'controller' => 'App\\Http\\Controllers\\SuperAdminController@rolePromotIndex',
        'namespace' => NULL,
        'prefix' => '/super-admin',
        'where' => 
        array (
        ),
        'as' => 'role_promot.action',
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
    'role_permission.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/role-permission-index',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\SuperAdminController@rolePermission',
        'controller' => 'App\\Http\\Controllers\\SuperAdminController@rolePermission',
        'namespace' => NULL,
        'prefix' => '/super-admin',
        'where' => 
        array (
        ),
        'as' => 'role_permission.index',
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
    'role_permission_create.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'super-admin/role-permission-create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\SuperAdminController@rolePermissionCreate',
        'controller' => 'App\\Http\\Controllers\\SuperAdminController@rolePermissionCreate',
        'namespace' => NULL,
        'prefix' => '/super-admin',
        'where' => 
        array (
        ),
        'as' => 'role_permission_create.action',
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
    'emailVerification' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/email-verification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\SuperAdminController@loadEmailVerification',
        'controller' => 'App\\Http\\Controllers\\SuperAdminController@loadEmailVerification',
        'namespace' => NULL,
        'prefix' => '/super-admin',
        'where' => 
        array (
        ),
        'as' => 'emailVerification',
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
    'email_update_status.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'super-admin/email-verification-status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\SuperAdminController@updateEmailStatus',
        'controller' => 'App\\Http\\Controllers\\SuperAdminController@updateEmailStatus',
        'namespace' => NULL,
        'prefix' => '/super-admin',
        'where' => 
        array (
        ),
        'as' => 'email_update_status.action',
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
    'authPageLoad' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/auth-page',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\SuperAdminController@loadAuthPage',
        'controller' => 'App\\Http\\Controllers\\SuperAdminController@loadAuthPage',
        'namespace' => NULL,
        'prefix' => '/super-admin',
        'where' => 
        array (
        ),
        'as' => 'authPageLoad',
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
    'filter.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/auth-page-filter/{page_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\SuperAdminController@pageItemFilter',
        'controller' => 'App\\Http\\Controllers\\SuperAdminController@pageItemFilter',
        'namespace' => NULL,
        'prefix' => '/super-admin',
        'where' => 
        array (
        ),
        'as' => 'filter.action',
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
    'update_auth_page.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'super-admin/update-auth-page/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\SuperAdminController@authManagePage',
        'controller' => 'App\\Http\\Controllers\\SuperAdminController@authManagePage',
        'namespace' => NULL,
        'prefix' => '/super-admin',
        'where' => 
        array (
        ),
        'as' => 'update_auth_page.action',
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
    'generated::7XRMFRgGhjJy7Q1q' => 
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
        'as' => 'generated::7XRMFRgGhjJy7Q1q',
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
      'uri' => 'update-app-setting',
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
    'permission.email' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'get-email/{selectedRole}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Permission\\PermissionController@getEmail',
        'controller' => 'App\\Http\\Controllers\\Permission\\PermissionController@getEmail',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'permission.email',
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
        0 => 'PUT',
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
        0 => 'DELETE',
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
    'auth-role.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/inventory-authorize-user/{selectedRole}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Inventory\\InventoryAuthorization@getSelectRole',
        'controller' => 'App\\Http\\Controllers\\Inventory\\InventoryAuthorization@getSelectRole',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'auth-role.action',
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
    'inventory-search.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/inventory-data-request',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Inventory\\InventoryAuthorization@searchInventory',
        'controller' => 'App\\Http\\Controllers\\Inventory\\InventoryAuthorization@searchInventory',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'inventory-search.action',
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
    'inventory_permission_status.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'super-admin/inventory-permission-update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Inventory\\InventoryAuthorization@inventoryPermissionStatusUpdate',
        'controller' => 'App\\Http\\Controllers\\Inventory\\InventoryAuthorization@inventoryPermissionStatusUpdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'inventory_permission_status.action',
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
    'inventory_permission_delete.action' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'super-admin/delete-inventory-permission/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Inventory\\InventoryAuthorization@inventoryPermissionDelete',
        'controller' => 'App\\Http\\Controllers\\Inventory\\InventoryAuthorization@inventoryPermissionDelete',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'inventory_permission_delete.action',
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
    'action.inventory-permission' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'super-admin/inventory-permission',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Inventory\\InventoryAuthorization@inventoryPermission',
        'controller' => 'App\\Http\\Controllers\\Inventory\\InventoryAuthorization@inventoryPermission',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'action.inventory-permission',
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
    'search-inventory-permission.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/get-inventory-permission',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Inventory\\InventoryAuthorization@inventoryPermissionGet',
        'controller' => 'App\\Http\\Controllers\\Inventory\\InventoryAuthorization@inventoryPermissionGet',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'search-inventory-permission.action',
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
    'inventory-token.action' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'super-admin/token-inventory-permission/{inventory_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Inventory\\InventoryAuthorization@inventoryToken',
        'controller' => 'App\\Http\\Controllers\\Inventory\\InventoryAuthorization@inventoryToken',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'inventory-token.action',
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
    'generated::Jxc85mzJu4FUIKr2' => 
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
        'as' => 'generated::Jxc85mzJu4FUIKr2',
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
    'generated::ffFIlzCav0kJVYqS' => 
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
        'as' => 'generated::ffFIlzCav0kJVYqS',
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
    'generated::gfyfVIuIFY6bR28N' => 
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
        'as' => 'generated::gfyfVIuIFY6bR28N',
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
    'accounts.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'accounts/dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isAccounts',
        ),
        'uses' => 'App\\Http\\Controllers\\Accounts\\AccountsController@dashboard',
        'controller' => 'App\\Http\\Controllers\\Accounts\\AccountsController@dashboard',
        'namespace' => NULL,
        'prefix' => '/accounts',
        'where' => 
        array (
        ),
        'as' => 'accounts.dashboard',
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
    'marketing.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'marketing/dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isMarketing',
        ),
        'uses' => 'App\\Http\\Controllers\\Marketing\\MarketingController@dashboard',
        'controller' => 'App\\Http\\Controllers\\Marketing\\MarketingController@dashboard',
        'namespace' => NULL,
        'prefix' => '/marketing',
        'where' => 
        array (
        ),
        'as' => 'marketing.dashboard',
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
    'delivery-team.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'delivery-team/dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'web',
          3 => 'isDeliveryTeam',
        ),
        'uses' => 'App\\Http\\Controllers\\DeliveryTeam\\DeliveryTeamController@dashboard',
        'controller' => 'App\\Http\\Controllers\\DeliveryTeam\\DeliveryTeamController@dashboard',
        'namespace' => NULL,
        'prefix' => '/delivery-team',
        'where' => 
        array (
        ),
        'as' => 'delivery-team.dashboard',
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
    'user.details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/show-user-details',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Location\\UserLocationController@details',
        'controller' => 'App\\Http\\Controllers\\Location\\UserLocationController@details',
        'namespace' => NULL,
        'prefix' => '/super-admin',
        'where' => 
        array (
        ),
        'as' => 'user.details',
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
    'user.activity' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/show-user-activity',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Location\\UserLocationController@activity',
        'controller' => 'App\\Http\\Controllers\\Location\\UserLocationController@activity',
        'namespace' => NULL,
        'prefix' => '/super-admin',
        'where' => 
        array (
        ),
        'as' => 'user.activity',
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
    'user.get_activity' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/get-user-activity',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Location\\UserLocationController@getActivity',
        'controller' => 'App\\Http\\Controllers\\Location\\UserLocationController@getActivity',
        'namespace' => NULL,
        'prefix' => '/super-admin',
        'where' => 
        array (
        ),
        'as' => 'user.get_activity',
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
    'forntend_footer.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/forntend-footer-information',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Forntend\\Footer\\FooterInformation@index',
        'controller' => 'App\\Http\\Controllers\\Forntend\\Footer\\FooterInformation@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'forntend_footer.index',
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
    'get_information.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/forntend-footer-get-information',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Forntend\\Footer\\FooterInformation@get_information',
        'controller' => 'App\\Http\\Controllers\\Forntend\\Footer\\FooterInformation@get_information',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'get_information.action',
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
    'update.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'super-admin/forntend-footer-update-information',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Forntend\\Footer\\FooterInformation@update',
        'controller' => 'App\\Http\\Controllers\\Forntend\\Footer\\FooterInformation@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'update.action',
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
    'forntend_footer_newletter.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/forntend-footer-newletter',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Forntend\\Footer\\Newsletter\\NewsletterController@index',
        'controller' => 'App\\Http\\Controllers\\Forntend\\Footer\\Newsletter\\NewsletterController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'forntend_footer_newletter.index',
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
    'forntend_footer_get_newsletter.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/forntend-footer-get-newletter',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Forntend\\Footer\\Newsletter\\NewsletterController@get_newsletter',
        'controller' => 'App\\Http\\Controllers\\Forntend\\Footer\\Newsletter\\NewsletterController@get_newsletter',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'forntend_footer_get_newsletter.action',
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
    'newsletter_filter.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/forntend-footer-filter-newletter',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Forntend\\Footer\\Newsletter\\NewsletterController@filter_newsletter',
        'controller' => 'App\\Http\\Controllers\\Forntend\\Footer\\Newsletter\\NewsletterController@filter_newsletter',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'newsletter_filter.action',
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
    'forntend_footer_newletter_delete.action' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'super-admin/forntend-footer-newletter/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Forntend\\Footer\\Newsletter\\NewsletterController@deletenewsletter',
        'controller' => 'App\\Http\\Controllers\\Forntend\\Footer\\Newsletter\\NewsletterController@deletenewsletter',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'forntend_footer_newletter_delete.action',
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
    'forntend_footer_newletter_pdf.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/forntend-footer-newletter-pdf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Forntend\\Footer\\Newsletter\\NewsletterController@pdf_newsletter',
        'controller' => 'App\\Http\\Controllers\\Forntend\\Footer\\Newsletter\\NewsletterController@pdf_newsletter',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'forntend_footer_newletter_pdf.action',
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
    'forntend_footer_newletter_excel.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/forntend-footer-newletter/export-excel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Forntend\\Footer\\Newsletter\\NewsletterController@export',
        'controller' => 'App\\Http\\Controllers\\Forntend\\Footer\\Newsletter\\NewsletterController@export',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'forntend_footer_newletter_excel.action',
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
    'forntend_footer_newletter_cvs_file.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/fontend-footer-newsletter/export-cvs-format',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Forntend\\Footer\\Newsletter\\NewsletterController@exportCsv',
        'controller' => 'App\\Http\\Controllers\\Forntend\\Footer\\Newsletter\\NewsletterController@exportCsv',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'forntend_footer_newletter_cvs_file.action',
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
    'access-permission.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/supplier/access-permission',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Supplier\\SupplierController@Supplier_Access_Permission',
        'controller' => 'App\\Http\\Controllers\\Supplier\\SupplierController@Supplier_Access_Permission',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'access-permission.index',
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
    'user-permission.email' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/get-email/{selectedUserRole}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Supplier\\SupplierController@getUserEmail',
        'controller' => 'App\\Http\\Controllers\\Supplier\\SupplierController@getUserEmail',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'user-permission.email',
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
    'user-permission.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'super-admin/store-permission',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Supplier\\SupplierController@storeUserPermission',
        'controller' => 'App\\Http\\Controllers\\Supplier\\SupplierController@storeUserPermission',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'user-permission.store',
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
    'user-permission.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'super-admin/edit-permission/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Supplier\\SupplierController@editUserPermission',
        'controller' => 'App\\Http\\Controllers\\Supplier\\SupplierController@editUserPermission',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'user-permission.edit',
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
    'user-permission.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'super-admin/update-permission/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Supplier\\SupplierController@updateUserPermission',
        'controller' => 'App\\Http\\Controllers\\Supplier\\SupplierController@updateUserPermission',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'user-permission.update',
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
    'user-permission.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'super-admin/delete-permission/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Supplier\\SupplierController@deleteUserPermission',
        'controller' => 'App\\Http\\Controllers\\Supplier\\SupplierController@deleteUserPermission',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'user-permission.delete',
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
    'user-permission.status_update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'super-admin/permission-status-update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Supplier\\SupplierController@permissionUserStatusUpdate',
        'controller' => 'App\\Http\\Controllers\\Supplier\\SupplierController@permissionUserStatusUpdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'user-permission.status_update',
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
    'module.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'super-admin/supplier-module-permission',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Setting\\SupplierSetting@supplierSettingUpdate',
        'controller' => 'App\\Http\\Controllers\\Setting\\SupplierSetting@supplierSettingUpdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'module.action',
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
          2 => 'supplierCreate',
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
          2 => 'supplierCreate',
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
          2 => 'supplierCreate',
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
    'generated::OAULw62mBiOXboIB' => 
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
          2 => 'supplierUpdate',
        ),
        'uses' => 'App\\Http\\Controllers\\Supplier\\SupplierController@editSupplier',
        'controller' => 'App\\Http\\Controllers\\Supplier\\SupplierController@editSupplier',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::OAULw62mBiOXboIB',
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
          2 => 'supplierUpdate',
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
          2 => 'supplierDelete',
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
    'view_supplier.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'view-supplier/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'supplierView',
        ),
        'uses' => 'App\\Http\\Controllers\\Supplier\\SupplierController@viewSupplier',
        'controller' => 'App\\Http\\Controllers\\Supplier\\SupplierController@viewSupplier',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'view_supplier.action',
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
      'uri' => 'suppliers/permission-status-update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'supplierMySqlData',
        ),
        'uses' => 'App\\Http\\Controllers\\Supplier\\SupplierController@updatesupplierStatus',
        'controller' => 'App\\Http\\Controllers\\Supplier\\SupplierController@updatesupplierStatus',
        'namespace' => NULL,
        'prefix' => '/suppliers',
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
    'generated::mTWOVt0okOYLVCBl' => 
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
        'as' => 'generated::mTWOVt0okOYLVCBl',
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
    'generated::f3u7xGsiBkk3dIMk' => 
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
        'as' => 'generated::f3u7xGsiBkk3dIMk',
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
    'generated::ERQbMrkzd3v1kWey' => 
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
        'as' => 'generated::ERQbMrkzd3v1kWey',
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
    'generated::YIJi3DFguq5enevu' => 
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
        'as' => 'generated::YIJi3DFguq5enevu',
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
    'generated::O8vwZpxTk83K3UXC' => 
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
        'as' => 'generated::O8vwZpxTk83K3UXC',
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
    'generated::sukOHc6luW1gaq17' => 
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
        'as' => 'generated::sukOHc6luW1gaq17',
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
    'generated::gAZ4dtqPMX5E8jhb' => 
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
        'as' => 'generated::gAZ4dtqPMX5E8jhb',
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
    'generated::Bnb6wmjAb45EQkcl' => 
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
        'as' => 'generated::Bnb6wmjAb45EQkcl',
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
    'generated::7hZDauU2jGfnYjDB' => 
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
        'as' => 'generated::7hZDauU2jGfnYjDB',
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
    'generated::FGCTLJCU0djooiy8' => 
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
        'as' => 'generated::FGCTLJCU0djooiy8',
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
    'generated::81BpLZPaYGk874lY' => 
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
          2 => 'inventoryPermission',
        ),
        'uses' => 'App\\Http\\Controllers\\Post\\MedicinePostController@requestSubcategory',
        'controller' => 'App\\Http\\Controllers\\Post\\MedicinePostController@requestSubcategory',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::81BpLZPaYGk874lY',
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
    'generated::2nGnzCsp1lDh6I94' => 
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
          2 => 'inventoryPermission',
        ),
        'uses' => 'App\\Http\\Controllers\\Post\\MedicinePostController@requestMedicineName',
        'controller' => 'App\\Http\\Controllers\\Post\\MedicinePostController@requestMedicineName',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::2nGnzCsp1lDh6I94',
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
    'generated::cAUIyOYAlTUgRdsU' => 
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
          2 => 'inventoryPermission',
        ),
        'uses' => 'App\\Http\\Controllers\\Post\\MedicinePostController@requestMedicineDogs',
        'controller' => 'App\\Http\\Controllers\\Post\\MedicinePostController@requestMedicineDogs',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::cAUIyOYAlTUgRdsU',
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
      'uri' => 'medicine/inventories',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'inventoryPermission',
        ),
        'uses' => 'App\\Http\\Controllers\\Inventory\\MedicineInventory@index',
        'controller' => 'App\\Http\\Controllers\\Inventory\\MedicineInventory@index',
        'namespace' => NULL,
        'prefix' => '/medicine',
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
      'uri' => 'medicine/inventories',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'inventoryPermission',
        ),
        'uses' => 'App\\Http\\Controllers\\Inventory\\MedicineInventory@store',
        'controller' => 'App\\Http\\Controllers\\Inventory\\MedicineInventory@store',
        'namespace' => NULL,
        'prefix' => '/medicine',
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
      'uri' => 'medicine/inventories-edit-get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'inventoryPermission',
        ),
        'uses' => 'App\\Http\\Controllers\\Inventory\\MedicineInventory@getData',
        'controller' => 'App\\Http\\Controllers\\Inventory\\MedicineInventory@getData',
        'namespace' => NULL,
        'prefix' => '/medicine',
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
    'generated::f8eyX0ZkoICAnCsp' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'medicine/inventories-edit/{inventory_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'inventoryPermission',
        ),
        'uses' => 'App\\Http\\Controllers\\Inventory\\MedicineInventory@editInventory',
        'controller' => 'App\\Http\\Controllers\\Inventory\\MedicineInventory@editInventory',
        'namespace' => NULL,
        'prefix' => '/medicine',
        'where' => 
        array (
        ),
        'as' => 'generated::f8eyX0ZkoICAnCsp',
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
      'uri' => 'medicine/inventories-update/{inventory_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'inventoryPermission',
        ),
        'uses' => 'App\\Http\\Controllers\\Inventory\\MedicineInventory@updateInventory',
        'controller' => 'App\\Http\\Controllers\\Inventory\\MedicineInventory@updateInventory',
        'namespace' => NULL,
        'prefix' => '/medicine',
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
      'uri' => 'medicine/inventories-unauthorized-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'inventoryPermission',
        ),
        'uses' => 'App\\Http\\Controllers\\Inventory\\MedicineInventory@unauthorizedData',
        'controller' => 'App\\Http\\Controllers\\Inventory\\MedicineInventory@unauthorizedData',
        'namespace' => NULL,
        'prefix' => '/medicine',
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
    'inventory_details.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/inventory-details-record',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'inventoryDataExport',
        ),
        'uses' => 'App\\Http\\Controllers\\Inventory\\InventoryDetailsRecord@index',
        'controller' => 'App\\Http\\Controllers\\Inventory\\InventoryDetailsRecord@index',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'inventory_details.action',
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
    'get_inventory_details.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/get-inventory-details-record',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'inventoryDataExport',
        ),
        'uses' => 'App\\Http\\Controllers\\Inventory\\InventoryDetailsRecord@getInventoryDetailsRecord',
        'controller' => 'App\\Http\\Controllers\\Inventory\\InventoryDetailsRecord@getInventoryDetailsRecord',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'get_inventory_details.action',
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
    'inventory-details-record_pdf.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/inventory-details-record-pdf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'inventoryDataExport',
        ),
        'uses' => 'App\\Http\\Controllers\\Inventory\\InventoryDetailsRecord@pdf_inventory',
        'controller' => 'App\\Http\\Controllers\\Inventory\\InventoryDetailsRecord@pdf_inventory',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'inventory-details-record_pdf.action',
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
    'inventory-details-record_excel.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/inventory-details-record/export-excel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'inventoryDataExport',
        ),
        'uses' => 'App\\Http\\Controllers\\Inventory\\InventoryDetailsRecord@export',
        'controller' => 'App\\Http\\Controllers\\Inventory\\InventoryDetailsRecord@export',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'inventory-details-record_excel.action',
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
    'inventory-details-record_cvs_file.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/inventory-details-record/export-cvs-format',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'inventoryDataExport',
        ),
        'uses' => 'App\\Http\\Controllers\\Inventory\\InventoryDetailsRecord@exportCsv',
        'controller' => 'App\\Http\\Controllers\\Inventory\\InventoryDetailsRecord@exportCsv',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'inventory-details-record_cvs_file.action',
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
    'inventory-details-record.print' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/inventory-details-record/print',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'inventoryDataExport',
        ),
        'uses' => 'App\\Http\\Controllers\\Inventory\\InventoryDetailsRecord@print',
        'controller' => 'App\\Http\\Controllers\\Inventory\\InventoryDetailsRecord@print',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'inventory-details-record.print',
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
      'uri' => 'stock',
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
      'uri' => 'stock',
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
      'uri' => 'stock-edit-get',
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
    'generated::DuguXwe2l16XPK6F' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'stock-edit/{id}',
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
        'as' => 'generated::DuguXwe2l16XPK6F',
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
      'uri' => 'stock-update/{id}',
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
      'uri' => 'stock-details',
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
    'division.get' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'get-division',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Branch\\BranchController@getDivision',
        'controller' => 'App\\Http\\Controllers\\Branch\\BranchController@getDivision',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'division.get',
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
    'district.get' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'get-district/{selectedDivision}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Branch\\BranchController@getDistrict',
        'controller' => 'App\\Http\\Controllers\\Branch\\BranchController@getDistrict',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'district.get',
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
    'upazila.get' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'get-upazila/{selectedDistrict}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Branch\\BranchController@getUpazila',
        'controller' => 'App\\Http\\Controllers\\Branch\\BranchController@getUpazila',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'upazila.get',
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
    'branch_type.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'company/branch-type-create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Branch\\BranchController@branchTypeStore',
        'controller' => 'App\\Http\\Controllers\\Branch\\BranchController@branchTypeStore',
        'namespace' => NULL,
        'prefix' => '/company',
        'where' => 
        array (
        ),
        'as' => 'branch_type.store',
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
    'search-branch-type.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'company/branch-type-search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Branch\\BranchController@searchBranchType',
        'controller' => 'App\\Http\\Controllers\\Branch\\BranchController@searchBranchType',
        'namespace' => NULL,
        'prefix' => '/company',
        'where' => 
        array (
        ),
        'as' => 'search-branch-type.action',
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
    'edit-branch-type.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'company/branch-type-edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Branch\\BranchController@editBranchType',
        'controller' => 'App\\Http\\Controllers\\Branch\\BranchController@editBranchType',
        'namespace' => NULL,
        'prefix' => '/company',
        'where' => 
        array (
        ),
        'as' => 'edit-branch-type.action',
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
    'update_branch_type.action' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'company/branch-type-update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Branch\\BranchController@updateBranchType',
        'controller' => 'App\\Http\\Controllers\\Branch\\BranchController@updateBranchType',
        'namespace' => NULL,
        'prefix' => '/company',
        'where' => 
        array (
        ),
        'as' => 'update_branch_type.action',
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
    'branch_type.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'company/branch-type-delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Branch\\BranchController@deleteBranchType',
        'controller' => 'App\\Http\\Controllers\\Branch\\BranchController@deleteBranchType',
        'namespace' => NULL,
        'prefix' => '/company',
        'where' => 
        array (
        ),
        'as' => 'branch_type.delete',
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
    'branch.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'company/branch-activity',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Branch\\BranchController@index',
        'controller' => 'App\\Http\\Controllers\\Branch\\BranchController@index',
        'namespace' => NULL,
        'prefix' => '/company',
        'where' => 
        array (
        ),
        'as' => 'branch.index',
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
    'branch.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'company/branch-create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Branch\\BranchController@store',
        'controller' => 'App\\Http\\Controllers\\Branch\\BranchController@store',
        'namespace' => NULL,
        'prefix' => '/company',
        'where' => 
        array (
        ),
        'as' => 'branch.store',
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
    'search-branch.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'company/branch-search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Branch\\BranchController@searchBranch',
        'controller' => 'App\\Http\\Controllers\\Branch\\BranchController@searchBranch',
        'namespace' => NULL,
        'prefix' => '/company',
        'where' => 
        array (
        ),
        'as' => 'search-branch.action',
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
    'edit-branch.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'company/branch-edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Branch\\BranchController@editBranch',
        'controller' => 'App\\Http\\Controllers\\Branch\\BranchController@editBranch',
        'namespace' => NULL,
        'prefix' => '/company',
        'where' => 
        array (
        ),
        'as' => 'edit-branch.action',
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
    'update_branch.action' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'company/branch-update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Branch\\BranchController@updateBranch',
        'controller' => 'App\\Http\\Controllers\\Branch\\BranchController@updateBranch',
        'namespace' => NULL,
        'prefix' => '/company',
        'where' => 
        array (
        ),
        'as' => 'update_branch.action',
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
    'branch.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'company/branch-delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Branch\\BranchController@deleteBranch',
        'controller' => 'App\\Http\\Controllers\\Branch\\BranchController@deleteBranch',
        'namespace' => NULL,
        'prefix' => '/company',
        'where' => 
        array (
        ),
        'as' => 'branch.delete',
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
    'branch_access.view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'company/branch-admin-access',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Branch\\BranchController@branchAccessView',
        'controller' => 'App\\Http\\Controllers\\Branch\\BranchController@branchAccessView',
        'namespace' => NULL,
        'prefix' => '/company',
        'where' => 
        array (
        ),
        'as' => 'branch_access.view',
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
    'branch_access_store.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'company/branch-admin-permission-store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Branch\\BranchController@branchAcessStore',
        'controller' => 'App\\Http\\Controllers\\Branch\\BranchController@branchAcessStore',
        'namespace' => NULL,
        'prefix' => '/company',
        'where' => 
        array (
        ),
        'as' => 'branch_access_store.action',
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
    'access_status.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'company/branch-admin-permission',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Branch\\BranchController@accessBranch',
        'controller' => 'App\\Http\\Controllers\\Branch\\BranchController@accessBranch',
        'namespace' => NULL,
        'prefix' => '/company',
        'where' => 
        array (
        ),
        'as' => 'access_status.action',
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
    'branch_access_permission.view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'company/branch-user-access',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Branch\\BranchController@branchAccessUserPermission',
        'controller' => 'App\\Http\\Controllers\\Branch\\BranchController@branchAccessUserPermission',
        'namespace' => NULL,
        'prefix' => '/company',
        'where' => 
        array (
        ),
        'as' => 'branch_access_permission.view',
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
    'branch_get.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'company/branch-get-data/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Branch\\BranchController@branchGetData',
        'controller' => 'App\\Http\\Controllers\\Branch\\BranchController@branchGetData',
        'namespace' => NULL,
        'prefix' => '/company',
        'where' => 
        array (
        ),
        'as' => 'branch_get.action',
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
    'branch_fetch.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'company/branch-data-fetch',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Branch\\BranchController@branchDataFetch',
        'controller' => 'App\\Http\\Controllers\\Branch\\BranchController@branchDataFetch',
        'namespace' => NULL,
        'prefix' => '/company',
        'where' => 
        array (
        ),
        'as' => 'branch_fetch.action',
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
    'branch_user_email_fetch.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'company/branch-user-email-fetch/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Branch\\BranchController@branchUserEmail',
        'controller' => 'App\\Http\\Controllers\\Branch\\BranchController@branchUserEmail',
        'namespace' => NULL,
        'prefix' => '/company',
        'where' => 
        array (
        ),
        'as' => 'branch_user_email_fetch.action',
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
    'branch_specify_search.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'company/branch-specify-name-fetch',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Branch\\BranchController@branchSearchSpecify',
        'controller' => 'App\\Http\\Controllers\\Branch\\BranchController@branchSearchSpecify',
        'namespace' => NULL,
        'prefix' => '/company',
        'where' => 
        array (
        ),
        'as' => 'branch_specify_search.action',
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
    'branch_name_search.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'company/branch-name-query/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Branch\\BranchController@branchSearchName',
        'controller' => 'App\\Http\\Controllers\\Branch\\BranchController@branchSearchName',
        'namespace' => NULL,
        'prefix' => '/company',
        'where' => 
        array (
        ),
        'as' => 'branch_name_search.action',
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
    'permission_create.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'company/branch-user-permission-create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Branch\\BranchController@permissionCreate',
        'controller' => 'App\\Http\\Controllers\\Branch\\BranchController@permissionCreate',
        'namespace' => NULL,
        'prefix' => '/company',
        'where' => 
        array (
        ),
        'as' => 'permission_create.action',
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
    'permission_user_role.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'company/branch-user-permission-role/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Branch\\BranchController@permission_role',
        'controller' => 'App\\Http\\Controllers\\Branch\\BranchController@permission_role',
        'namespace' => NULL,
        'prefix' => '/company',
        'where' => 
        array (
        ),
        'as' => 'permission_user_role.action',
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
    'permission_user_email.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'company/branch-user-permission-email/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Branch\\BranchController@permission_email',
        'controller' => 'App\\Http\\Controllers\\Branch\\BranchController@permission_email',
        'namespace' => NULL,
        'prefix' => '/company',
        'where' => 
        array (
        ),
        'as' => 'permission_user_email.action',
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
    'permission_edit.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'company/branch-user-permission-edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Branch\\BranchController@permissionEdit',
        'controller' => 'App\\Http\\Controllers\\Branch\\BranchController@permissionEdit',
        'namespace' => NULL,
        'prefix' => '/company',
        'where' => 
        array (
        ),
        'as' => 'permission_edit.action',
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
    'permission_update.action' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'company/branch-user-permission-update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Branch\\BranchController@permissionUpdate',
        'controller' => 'App\\Http\\Controllers\\Branch\\BranchController@permissionUpdate',
        'namespace' => NULL,
        'prefix' => '/company',
        'where' => 
        array (
        ),
        'as' => 'permission_update.action',
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
    'permission_delete.action' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'company/branch-user-permission-delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Branch\\BranchController@permissionDelete',
        'controller' => 'App\\Http\\Controllers\\Branch\\BranchController@permissionDelete',
        'namespace' => NULL,
        'prefix' => '/company',
        'where' => 
        array (
        ),
        'as' => 'permission_delete.action',
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
    'permission_status.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'company/branch-user-permission',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Branch\\BranchController@permissionBranch',
        'controller' => 'App\\Http\\Controllers\\Branch\\BranchController@permissionBranch',
        'namespace' => NULL,
        'prefix' => '/company',
        'where' => 
        array (
        ),
        'as' => 'permission_status.action',
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
    'user_permission.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'permission/user-permission-index',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Permission\\UserPermission@index',
        'controller' => 'App\\Http\\Controllers\\Permission\\UserPermission@index',
        'namespace' => NULL,
        'prefix' => '/permission',
        'where' => 
        array (
        ),
        'as' => 'user_permission.index',
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
    'user_permission.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'permission/user-permission-store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Permission\\UserPermission@store',
        'controller' => 'App\\Http\\Controllers\\Permission\\UserPermission@store',
        'namespace' => NULL,
        'prefix' => '/permission',
        'where' => 
        array (
        ),
        'as' => 'user_permission.store',
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
    'user_permission.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'permission/user-permission-edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Permission\\UserPermission@edit',
        'controller' => 'App\\Http\\Controllers\\Permission\\UserPermission@edit',
        'namespace' => NULL,
        'prefix' => '/permission',
        'where' => 
        array (
        ),
        'as' => 'user_permission.edit',
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
    'user_permission.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'permission/user-permission-update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Permission\\UserPermission@update',
        'controller' => 'App\\Http\\Controllers\\Permission\\UserPermission@update',
        'namespace' => NULL,
        'prefix' => '/permission',
        'where' => 
        array (
        ),
        'as' => 'user_permission.update',
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
    'user_permission.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'permission/user-permission-delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Permission\\UserPermission@delete',
        'controller' => 'App\\Http\\Controllers\\Permission\\UserPermission@delete',
        'namespace' => NULL,
        'prefix' => '/permission',
        'where' => 
        array (
        ),
        'as' => 'user_permission.delete',
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
    'user_permission.search' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'permission/user-permission-search/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Permission\\UserPermission@search',
        'controller' => 'App\\Http\\Controllers\\Permission\\UserPermission@search',
        'namespace' => NULL,
        'prefix' => '/permission',
        'where' => 
        array (
        ),
        'as' => 'user_permission.search',
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
    'module_category_view.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'application/module-category-index',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Module\\ModuleController@moduleCategoryView',
        'controller' => 'App\\Http\\Controllers\\Module\\ModuleController@moduleCategoryView',
        'namespace' => NULL,
        'prefix' => '/application',
        'where' => 
        array (
        ),
        'as' => 'module_category_view.action',
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
    'module_category_store.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'application/module-category-store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Module\\ModuleController@moduleCategoryStore',
        'controller' => 'App\\Http\\Controllers\\Module\\ModuleController@moduleCategoryStore',
        'namespace' => NULL,
        'prefix' => '/application',
        'where' => 
        array (
        ),
        'as' => 'module_category_store.action',
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
    'module_category_edit.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'application/module-category-edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Module\\ModuleController@moduleCategoryEdit',
        'controller' => 'App\\Http\\Controllers\\Module\\ModuleController@moduleCategoryEdit',
        'namespace' => NULL,
        'prefix' => '/application',
        'where' => 
        array (
        ),
        'as' => 'module_category_edit.action',
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
    'module_category_update.action' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'application/module-category-update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Module\\ModuleController@moduleCategoryUpdate',
        'controller' => 'App\\Http\\Controllers\\Module\\ModuleController@moduleCategoryUpdate',
        'namespace' => NULL,
        'prefix' => '/application',
        'where' => 
        array (
        ),
        'as' => 'module_category_update.action',
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
    'module_category_delete.action' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'application/module-category-delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Module\\ModuleController@moduleCategoryDelete',
        'controller' => 'App\\Http\\Controllers\\Module\\ModuleController@moduleCategoryDelete',
        'namespace' => NULL,
        'prefix' => '/application',
        'where' => 
        array (
        ),
        'as' => 'module_category_delete.action',
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
    'module_category_search.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'application/module-category-search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Module\\ModuleController@moduleCategorySearch',
        'controller' => 'App\\Http\\Controllers\\Module\\ModuleController@moduleCategorySearch',
        'namespace' => NULL,
        'prefix' => '/application',
        'where' => 
        array (
        ),
        'as' => 'module_category_search.action',
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
    'module_name_view.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'application/module-name-index',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Module\\ModuleController@moduleNameView',
        'controller' => 'App\\Http\\Controllers\\Module\\ModuleController@moduleNameView',
        'namespace' => NULL,
        'prefix' => '/application',
        'where' => 
        array (
        ),
        'as' => 'module_name_view.action',
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
    'module_name_store.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'application/module-name-store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Module\\ModuleController@ModuleNameStore',
        'controller' => 'App\\Http\\Controllers\\Module\\ModuleController@ModuleNameStore',
        'namespace' => NULL,
        'prefix' => '/application',
        'where' => 
        array (
        ),
        'as' => 'module_name_store.action',
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
    'module_name_edit.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'application/module-name-edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Module\\ModuleController@ModuleNameEdit',
        'controller' => 'App\\Http\\Controllers\\Module\\ModuleController@ModuleNameEdit',
        'namespace' => NULL,
        'prefix' => '/application',
        'where' => 
        array (
        ),
        'as' => 'module_name_edit.action',
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
    'module_name_update.action' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'application/module-name-update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Module\\ModuleController@ModuleNameUpdate',
        'controller' => 'App\\Http\\Controllers\\Module\\ModuleController@ModuleNameUpdate',
        'namespace' => NULL,
        'prefix' => '/application',
        'where' => 
        array (
        ),
        'as' => 'module_name_update.action',
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
    'module_name_delete.action' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'application/module-name-delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Module\\ModuleController@ModuleNameDelete',
        'controller' => 'App\\Http\\Controllers\\Module\\ModuleController@ModuleNameDelete',
        'namespace' => NULL,
        'prefix' => '/application',
        'where' => 
        array (
        ),
        'as' => 'module_name_delete.action',
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
    'module_name_search.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'application/module-name-search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Module\\ModuleController@moduleNameSearch',
        'controller' => 'App\\Http\\Controllers\\Module\\ModuleController@moduleNameSearch',
        'namespace' => NULL,
        'prefix' => '/application',
        'where' => 
        array (
        ),
        'as' => 'module_name_search.action',
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
    'module.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'application/module-index',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Module\\ModuleController@index',
        'controller' => 'App\\Http\\Controllers\\Module\\ModuleController@index',
        'namespace' => NULL,
        'prefix' => '/application',
        'where' => 
        array (
        ),
        'as' => 'module.index',
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
    'module_name_get.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'application/module-name-get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Module\\ModuleController@moduleNameGet',
        'controller' => 'App\\Http\\Controllers\\Module\\ModuleController@moduleNameGet',
        'namespace' => NULL,
        'prefix' => '/application',
        'where' => 
        array (
        ),
        'as' => 'module_name_get.action',
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
    'module_category_get.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'application/module-category-get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Module\\ModuleController@moduleCategoryGet',
        'controller' => 'App\\Http\\Controllers\\Module\\ModuleController@moduleCategoryGet',
        'namespace' => NULL,
        'prefix' => '/application',
        'where' => 
        array (
        ),
        'as' => 'module_category_get.action',
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
    'module.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'application/module-store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Module\\ModuleController@store',
        'controller' => 'App\\Http\\Controllers\\Module\\ModuleController@store',
        'namespace' => NULL,
        'prefix' => '/application',
        'where' => 
        array (
        ),
        'as' => 'module.store',
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
    'module.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'application/module-edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Module\\ModuleController@edit',
        'controller' => 'App\\Http\\Controllers\\Module\\ModuleController@edit',
        'namespace' => NULL,
        'prefix' => '/application',
        'where' => 
        array (
        ),
        'as' => 'module.edit',
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
    'module.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'application/module-update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Module\\ModuleController@update',
        'controller' => 'App\\Http\\Controllers\\Module\\ModuleController@update',
        'namespace' => NULL,
        'prefix' => '/application',
        'where' => 
        array (
        ),
        'as' => 'module.update',
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
    'module.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'application/module-delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Module\\ModuleController@delete',
        'controller' => 'App\\Http\\Controllers\\Module\\ModuleController@delete',
        'namespace' => NULL,
        'prefix' => '/application',
        'where' => 
        array (
        ),
        'as' => 'module.delete',
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
    'module.search' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'application/module-search/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\Module\\ModuleController@moduleSearch',
        'controller' => 'App\\Http\\Controllers\\Module\\ModuleController@moduleSearch',
        'namespace' => NULL,
        'prefix' => '/application',
        'where' => 
        array (
        ),
        'as' => 'module.search',
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
    'generated::IbmSO9BySrLLUqSN' => 
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
        'as' => 'generated::IbmSO9BySrLLUqSN',
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
    'generated::D3olrI87uUtBtlZJ' => 
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
        'as' => 'generated::D3olrI87uUtBtlZJ',
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
    'generated::b5ofKujajatZhK4N' => 
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
        'as' => 'generated::b5ofKujajatZhK4N',
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
    'generated::aM8aFVLhHxKtcBe3' => 
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
        'as' => 'generated::aM8aFVLhHxKtcBe3',
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
    'file.modalContent' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'file-manager/modal-content',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\FileManagerController\\FileManagerController@modalContent',
        'controller' => 'App\\Http\\Controllers\\FileManagerController\\FileManagerController@modalContent',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'file.modalContent',
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
    'upload.file' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'file-manager/upload-file',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\FileManagerController\\FileManagerController@uploadFile',
        'controller' => 'App\\Http\\Controllers\\FileManagerController\\FileManagerController@uploadFile',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'upload.file',
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
    'folder.getFolder' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'file-manager/get-folders',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\FileManagerController\\FileManagerController@getFolder',
        'controller' => 'App\\Http\\Controllers\\FileManagerController\\FileManagerController@getFolder',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'folder.getFolder',
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
    'folder.fetchFolder' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'file-manager/fetch-folders',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\FileManagerController\\FileManagerController@fetchFolder',
        'controller' => 'App\\Http\\Controllers\\FileManagerController\\FileManagerController@fetchFolder',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'folder.fetchFolder',
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
    'file-manager.create-folder' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'file-manager/create-folder',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\FileManagerController\\FileManagerController@createFolder',
        'controller' => 'App\\Http\\Controllers\\FileManagerController\\FileManagerController@createFolder',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'file-manager.create-folder',
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
    'files.showFiles' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'files/{folder}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\FileManagerController\\FileManagerController@showFiles',
        'controller' => 'App\\Http\\Controllers\\FileManagerController\\FileManagerController@showFiles',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'files.showFiles',
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
    'file.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'file-manager/delete/{folder}/{filename}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\FileManagerController\\FileManagerController@delete',
        'controller' => 'App\\Http\\Controllers\\FileManagerController\\FileManagerController@delete',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'file.delete',
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
    'generated::VBYULNu87oYHtk6p' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'file-manager/edit-folders/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\FileManagerController\\FileManagerController@editFolder',
        'controller' => 'App\\Http\\Controllers\\FileManagerController\\FileManagerController@editFolder',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::VBYULNu87oYHtk6p',
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
    'update-folder.action' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'file-manager/update-folders/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\FileManagerController\\FileManagerController@updateFolder',
        'controller' => 'App\\Http\\Controllers\\FileManagerController\\FileManagerController@updateFolder',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'update-folder.action',
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
    'folder-delete.action' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'file-manager/folder-delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\FileManagerController\\FileManagerController@deleteFolder',
        'controller' => 'App\\Http\\Controllers\\FileManagerController\\FileManagerController@deleteFolder',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'folder-delete.action',
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
    'getFolder.action' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'file-manager/select-file-folder',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:SuperAdmin|Admin|SubAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\FileManagerController\\FileManagerController@getFolderSelect',
        'controller' => 'App\\Http\\Controllers\\FileManagerController\\FileManagerController@getFolderSelect',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'getFolder.action',
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
    'generated::drG2k3oN1UaJYbnS' => 
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
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingController@index',
        'controller' => 'App\\Http\\Controllers\\SettingController@index',
        'namespace' => NULL,
        'prefix' => '/settings',
        'where' => 
        array (
        ),
        'as' => 'generated::drG2k3oN1UaJYbnS',
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
    'generated::7iAT8w35p9MQFPu3' => 
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
          2 => 'isSuperAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingController@update',
        'controller' => 'App\\Http\\Controllers\\SettingController@update',
        'namespace' => NULL,
        'prefix' => '/settings',
        'where' => 
        array (
        ),
        'as' => 'generated::7iAT8w35p9MQFPu3',
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
