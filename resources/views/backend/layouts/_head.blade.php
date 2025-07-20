<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="user-role" content="{{ Auth::user()->role }}">
<meta name="user-email" content="{{ Auth::user()->login_email }}">
<meta name="branch-id" content="{{ Auth::user()->branch_id }}">
<meta name="csrf-token" content="{{csrf_token()}}">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>
    @if(auth()->user()->role == 1)
    Super-Admin
    @endif
    @if(auth()->user()->role == 2)
    Sub-Admin
    @endif
    @if(auth()->user()->role == 3)
    Admin
    @endif
    @if(auth()->user()->role == 5)
    Accounts
    @endif
    @if(auth()->user()->role == 6)
    Marketing
    @endif
    @if(auth()->user()->role == 7)
    Delivery Team
    @endif
    @if(auth()->user()->role == 0)
    Doctors-Center
    @endif
</title>
<!-- ======== fontawesome ======== -->
<link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" />
<link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
<link rel="stylesheet"  href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" />
<link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,900" />
<link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Sofia&effect=neon|outline|emboss|shadow-multiple" />
<link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Faster+One" />
<link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Monoton" />
<link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Archivo+Black" />

<!-- ======== main-css ======== -->
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/css/main-min.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/all-min-css/admin-all-min.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/all-min-css/dashboard-all-min.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/all-min-css/navbar-all-min.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/all-min-css/loader-min.css">
<?php 
    $role = auth()->user()->role;
    $themes = [
        0 => ['sidebar' => 'silver', 'topbar' => 'silver', 'footer' => 'silver', 'trapezoid' => 'silver'],
        1 => ['sidebar' => 'darkblue', 'topbar' => 'darkblue', 'footer' => 'darkblue', 'trapezoid' => 'white'],
        2 => ['sidebar' => 'dark', 'topbar' => 'dark', 'footer' => 'dark', 'trapezoid' => 'gray'],
        3 => ['sidebar' => 'dark', 'topbar' => 'dark', 'footer' => 'dark', 'trapezoid' => 'gray'],
        5 => ['sidebar' => 'cornflower-blue', 'topbar' => 'cornflower-blue', 'footer' => 'cornflower-blue', 'trapezoid' => 'silver'],
        6 => ['sidebar' => 'dark-blue', 'topbar' => 'dark-blue', 'footer' => 'dark-blue', 'trapezoid' => 'silver'],
        7 => ['sidebar' => 'dark-green', 'topbar' => 'dark-green', 'footer' => 'dark-green', 'trapezoid' => 'silver'],
    ];
?>
<link rel="stylesheet" href="{{ asset('backend_asset/main_asset/custom-css/themes-css/sidebar-css/' . $themes[$role]['sidebar'] . '.css') }}" id="themeSilverlink">
<link rel="stylesheet" href="{{ asset('backend_asset/main_asset/css/topbar-css/' . $themes[$role]['topbar'] . '.css') }}" id="topbarGreenlink">
<link rel="stylesheet" href="{{ asset('backend_asset/main_asset/custom-css/themes-css/footer-css/' . $themes[$role]['footer'] . '.css') }}" id="footerGreenlink">
<link rel="stylesheet" href="{{ asset('backend_asset/main_asset/custom-css/themes-css/trapezoid-css/' . $themes[$role]['trapezoid'] . '.css') }}" id="sidebarTrapezoidlink">

<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/scss/background-color/dist/main-background-color.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/scss/background-animation-scss/dist/background-color-animation.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/components-css/all-components-min.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/permission/user-permission/permission.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/themes-css/theme-setting-mode-min.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/components-css/profile-css/profile-min.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/components-css/account-setting-css/accounts-min.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/paginate-css/users-paginate.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/components-css/user-details-css/user-details.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/data-table-css/data-table-min.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/fontawesome-6.4.2-web/css/all.min.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/jquery-ui-css/jquery-ui.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/action-loader/action-loader-min.css">

<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/themes-css/menu-css/silver.css" id="footerMenuGreenlink">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/themes-css/themes-setting-css/orange.css" id="settingGreenlink">
<!-- <link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/themes-css/minilist-css/gold.css" id="miniMenuGreenlink"> -->
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/components-css/modal-css/gold.css" id="smallModalGreenlink">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/dashboard-css/dashboard-result-css/white.css" id="dashboardResultGreenlink">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/dashboard-css/nav-bar-css/white.css" id="dashboardNavbarGreenlink">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/dashboard-css/dashboard-part-css/white.css" id="dashboardPartGreenlink">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/dashboard-css/dashboard-details-css/white.css" id="dashboarddetailsGreenlink">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/dashboard-css/chart-css/white.css" id="dashboardAreaChartSelect">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/dashboard-css/product-score-css/white.css" id="dashboardProdSelect">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/dashboard-css/summary-table-css/order-summary-table.css" id="#">

@if(auth()->user()->role ==1 || auth()->user()->role ==2 || auth()->user()->role ==3)
<!-- File-Manager -->
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/file-manager/fileManager.css">
@endif
