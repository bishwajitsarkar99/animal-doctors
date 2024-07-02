<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
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
<link rel="icon" type="shortcut icon" href="{{asset('backend_asset')}}/main_asset/img/favicon.png">
<!-- Bootstrap5-Data table min.css CDN link -->
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
<!-- Font-Awesome min.css CDN link -->
<link rel="stylesheet" href="{{ asset('backend_asset/main_asset/fontawesome-6.4.2-web/css/all.min.css') }}">
<!--============== Google Fonts Link ==================-->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
<!-- ================== Jquery Autocomplete Style Link ============================= -->
<!--============== Jquery Autocomplete ui.css ==================-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link href="{{asset('backend_asset')}}/main_asset/jquery-ui-css/jquery-ui.css" rel="stylesheet" />
<!-- Bootstrap5 core main css file -->
<!-- ================ all-min-Css file ================= -->
<link href="{{asset('backend_asset')}}/main_asset/css/main-min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/all-min-css/admin-all-min.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/all-min-css/dashboard-all-min.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/all-min-css/navbar-all-min.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/all-min-css/loader-min.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/scss/background-color/dist/main-background-color.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/scss/background-animation-scss/dist/background-color-animation.css">
<!-- Google Font CDN link -->
<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,900" rel="stylesheet">

<!-- ================ Admin Panel(googleleapis cdn link) Custom Css file ================= -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=neon|outline|emboss|shadow-multiple">
<link href='https://fonts.googleapis.com/css?family=Faster One' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Monoton' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Archivo Black' rel='stylesheet'>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=neon|outline|emboss|shadow-multiple">

<!-- ================ Admin Panel(Components-min-css) Custom Css file ================= -->
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/components-css/all-components-min.css">

<!-- ================ Admin Panel Side-bar ================= -->
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/themes-css/theme-setting-mode-min.css">
@if(auth()->user()->role ==1)
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/themes-css/sidebar-css/dark.css" id="themeSilverlink">
@endif
@if(auth()->user()->role ==2)
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/themes-css/sidebar-css/dark.css" id="themeSilverlink">
@endif
@if(auth()->user()->role ==3)
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/themes-css/sidebar-css/dark.css" id="themeSilverlink">
@endif
@if(auth()->user()->role ==3)
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/themes-css/sidebar-css/dark.css" id="themeSilverlink">
@endif
@if(auth()->user()->role ==5)
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/themes-css/sidebar-css/cornflower-blue.css" id="themeSilverlink">
@endif
@if(auth()->user()->role ==6)
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/themes-css/sidebar-css/dark-blue.css" id="themeSilverlink">
@endif
@if(auth()->user()->role ==7)
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/themes-css/sidebar-css/dark-green.css" id="themeSilverlink">
@endif
@if(auth()->user()->role ==0)
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/themes-css/sidebar-css/silver.css" id="themeSilverlink">
@endif
<!-- ================ Admin Panel top-bar ================= -->
@if(auth()->user()->role ==1)
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/css/topbar-css/dark.css" id="topbarGreenlink">
@endif
@if(auth()->user()->role ==2)
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/css/topbar-css/dark.css" id="topbarGreenlink">
@endif
@if(auth()->user()->role ==3)
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/css/topbar-css/dark.css" id="topbarGreenlink">
@endif
@if(auth()->user()->role ==5)
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/css/topbar-css/cornflower-blue.css" id="topbarGreenlink">
@endif
@if(auth()->user()->role ==6)
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/css/topbar-css/dark-blue.css" id="topbarGreenlink">
@endif
@if(auth()->user()->role ==7)
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/css/topbar-css/dark-green.css" id="topbarGreenlink">
@endif
@if(auth()->user()->role ==0)
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/css/topbar-css/silver.css" id="topbarGreenlink">
@endif
<!-- ================ Admin Panel Footer ================= -->
@if(auth()->user()->role ==1)
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/themes-css/footer-css/dark.css" id="footerGreenlink">
@endif
@if(auth()->user()->role ==2)
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/themes-css/footer-css/dark.css" id="footerGreenlink">
@endif
@if(auth()->user()->role ==3)
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/themes-css/footer-css/dark.css" id="footerGreenlink">
@endif
@if(auth()->user()->role ==5)
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/themes-css/footer-css/cornflower-blue.css" id="footerGreenlink">
@endif
@if(auth()->user()->role ==6)
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/themes-css/footer-css/dark-blue.css" id="footerGreenlink">
@endif
@if(auth()->user()->role ==7)
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/themes-css/footer-css/dark-green.css" id="footerGreenlink">
@endif
@if(auth()->user()->role ==0)
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/themes-css/footer-css/silver.css" id="footerGreenlink">
@endif
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/themes-css/menu-css/gold.css" id="footerMenuGreenlink">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/themes-css/themes-setting-css/orange.css" id="settingGreenlink">
<!-- <link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/themes-css/minilist-css/gold.css" id="miniMenuGreenlink"> -->
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/components-css/modal-css/gold.css" id="smallModalGreenlink">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/dashboard-css/dashboard-result-css/white.css" id="dashboardResultGreenlink">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/dashboard-css/nav-bar-css/white.css" id="dashboardNavbarGreenlink">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/dashboard-css/dashboard-part-css/white.css" id="dashboardPartGreenlink">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/dashboard-css/dashboard-details-css/white.css" id="dashboarddetailsGreenlink">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/dashboard-css/chart-css/white.css" id="dashboardAreaChartSelect">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/dashboard-css/product-score-css/white.css" id="dashboardProdSelect">
<!-- ================ Admin Panel Trapezoid ================= -->
@if(auth()->user()->role ==1)
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/themes-css/trapezoid-css/gray.css" id="sidebarTrapezoidlink">
@endif
@if(auth()->user()->role ==2)
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/themes-css/trapezoid-css/gray.css" id="sidebarTrapezoidlink">
@endif
@if(auth()->user()->role ==3)
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/themes-css/trapezoid-css/gray.css" id="sidebarTrapezoidlink">
@endif
@if(auth()->user()->role ==5)
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/themes-css/trapezoid-css/silver.css" id="sidebarTrapezoidlink">
@endif
@if(auth()->user()->role ==6)
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/themes-css/trapezoid-css/silver.css" id="sidebarTrapezoidlink">
@endif
@if(auth()->user()->role ==7)
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/themes-css/trapezoid-css/silver.css" id="sidebarTrapezoidlink">
@endif
@if(auth()->user()->role ==0)
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/themes-css/trapezoid-css/silver.css" id="sidebarTrapezoidlink">
@endif
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/dashboard-css/summary-table-css/order-summary-table.css" id="#">
<!-- ================ Admin Panel(sub-menu-iteam) file ================= -->
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/components-css/profile-css/profile-min.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/components-css/account-setting-css/accounts-min.css">
<!-- <link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/components-css/activity-log-css/activity-log-min.css"> -->
<!-- ================ Paginate-css ================= -->
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/paginate-css/users-paginate.css">
<!-- ================ user(account)-details-css ================= -->
<link rel="stylesheet" href="{{asset('backend_asset/main_asset/custom-css/components-css/user-details-css/user-details.css')}}">
<!-- Summar-Note -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<!-- Data-Table-Css -->
<!-- <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/data-table-css/data-table-min.css">
@if(auth()->user()->role ==1)
<!-- File-Manager -->
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/file-manager/fileManager.css">
@endif
@if(auth()->user()->role ==2)
<!-- File-Manager -->
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/file-manager/fileManager.css">
@endif
@if(auth()->user()->role ==3)
<!-- File-Manager -->
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/file-manager/fileManager.css">
@endif
