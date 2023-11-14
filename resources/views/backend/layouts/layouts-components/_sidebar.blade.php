<div class="sb-sidenav-menu">
    <!-- defult background focus for sidebar/ = class / side_nav_background for id = menu_background -->
    <div class="nav" id="menu_background">
        <a class="nav-link" href="{{ route('super-admin.dashboard') }}" id="side_nav">
            <div class="sb-nav-link-icon das_hdname pt-1"><i class="fas fa-tachometer-alt fa-beat-fade"></i></div>
            @if(auth()->user()->role ==1)
            <span class="dashboard_text">{{__('translate.Dashboard')}}</span>
            @endif
            @if(auth()->user()->role ==2)
            <span class="dashboard_text">{{__('translate.Dashboard')}}</span>
            @endif
            @if(auth()->user()->role ==3)
            <span class="dashboard_text">{{__('translate.Dashboard')}}</span>
            @endif
            @if(auth()->user()->role ==0)
            <span class="dashboard_text">{{__('translate.Dashboard')}}</span>
            @endif
        </a>
        @if(auth()->user()->role ==1)
            <span class="text-warning ms-4 ps-2" style="font-size: 10px;letter-spacing:1px;font-weight:600;">
                {{setting('company_name')}}
            </span>
        @endif
        @if(auth()->user()->role ==2)
            <span class="text-warning ms-4 ps-2" style="font-size: 10px;letter-spacing:1px;font-weight:600;">
                {{setting('company_name')}}
            </span>
        @endif
        @if(auth()->user()->role ==3)
            <span class="text-warning ms-4 ps-2" style="font-size: 10px;letter-spacing:1px;font-weight:600;">
                {{setting('company_name')}}
            </span>
        @endif
        @if(auth()->user()->role ==0)
            <span class="text-warning ms-4 ps-2 mb-2" style="font-size: 10px;letter-spacing:1px;font-weight:600;">
                {{setting('company_name')}}
            </span>
        @endif
        <!-- ================= Project Name ================= -->
        @if(auth()->user()->role ==1)
        <div class="sb-sidenav-menu-heading platform_name trapezoid">
            <span class="animation-examples three ps-1 pe-1">
                <i class="fa-solid fa-dice-d6 fa-flip" style="color:cadetblue;"></i>
                <span class="e changed-style">E<span class="shop">2</span></span>
                <span class="lar_pro plantform1">{{__('translate.Plat-Form')}}</span>
            </span>
        </div>
        @endif
        @if(auth()->user()->role ==2)
        <div class="sb-sidenav-menu-heading platform_name trapezoid">
            <span class="animation-examples three ps-1 pe-1">
                <i class="fa-solid fa-dice-d6 fa-flip"></i>
                <span class="lar_pro plantform1"> {{__('translate.Sub-Admin')}} </span>
            </span>
        </div>
        @endif
        @if(auth()->user()->role ==3)
        <div class="sb-sidenav-menu-heading platform_name trapezoid">
            <span class="animation-examples three ps-1 pe-1">
                <i class="fa-solid fa-dice-d6 fa-flip"></i>
                <span class="lar_pro plantform1">{{__('translate.Admin')}} </span>
            </span>
        </div>
        @endif
        @if(auth()->user()->role ==0)
        <div class="sb-sidenav-menu-heading platform_name trapezoid" style="width: 205px;height:150px;">
            <span class="animation-examples three ps-1 pe-1">
                <i class="fa-solid fa-dice-d6 fa-flip"></i>
                <span class="lar_pro plantform1">{{__('translate.Doctor')}}</span><br>
                <img class="profile" style="width: 100px;height:100px; border-radius:3px;" src="/image/{{auth()->user()->image}}" alt="profile-image">
            </span>
        </div>
        @endif
        @if(auth()->user()->role == 1)
        <!-- ================== Purchases Moduel ======================= -->
        <div class="sb-sidenav-menu-heading"><span class="link_menus {{setting('purchases_visual')}}"><i class="fa-solid fa-link fa-beat-fade"></i></span> 
            <span class="{{setting('purchases_visual')}}">{{__('translate.Purchases Dept.')}}</span>
        </div>
        <!-- ================== Product ======================= -->
        @include('backend.layouts.layouts-components.partial-sidebar._product')

        <!-- ================== Stock ======================= -->
        @include('backend.layouts.layouts-components.partial-sidebar._stock')

        <!-- ================== Accounts Moduel ======================= -->
        <div class="sb-sidenav-menu-heading"><span class="link_menus {{setting('accounts_moduel_display')}}"><i class="fa-solid fa-link fa-beat-fade"></i></span> 
            <span class="{{setting('accounts_moduel_display')}}">{{__('translate.Accounts Dept.')}}</span>
        </div>

        <!-- ================== Leger ======================= -->
        @include('backend.layouts.layouts-components.partial-sidebar._leger')


        <!-- ================== Sales ======================= -->
        @include('backend.layouts.layouts-components.partial-sidebar._sales')

        <!-- ================== Voucher ======================= -->
        @include('backend.layouts.layouts-components.partial-sidebar._voucher')

        <!-- ================== Asset ======================= -->
        @include('backend.layouts.layouts-components.partial-sidebar._asset')

        <!-- ================== Report ======================= -->
        @include('backend.layouts.layouts-components.partial-sidebar._report')


        <!-- ==================  HRM Moduel ======================= -->
        <div class="sb-sidenav-menu-heading {{setting('hrm_moduel_display')}}"><span class="link_menus"><i class="fa-solid fa-link fa-beat-fade"></i></span> 
            <span class="{{setting('hrm_moduel_display')}}">{{__('translate.HRM Dept.')}}</span>
        </div>

        <!-- ================== HRM ======================= -->
        @include('backend.layouts.layouts-components.partial-sidebar._hrm')

        <!-- ==================  Auth Moduel ======================= -->
        <div class="sb-sidenav-menu-heading {{setting('auth_moduel_display')}}"><span class="link_menus"><i class="fa-solid fa-link fa-beat-fade"></i></span> 
            <span class="{{setting('auth_moduel_display')}}">{{__('translate.Authentication')}}</span>
        </div>

        @include('backend.layouts.layouts-components.partial-sidebar._auth')


        <!-- ================== Layouts ======================= -->
        @include('backend.layouts.layouts-components.partial-sidebar._layouts')

        <!-- ================== Components ======================= -->
        @include('backend.layouts.layouts-components.partial-sidebar._components')
        
        <!-- ================== Setting ======================= -->
        @include('backend.layouts.layouts-components.partial-sidebar._setting')
        @endif

        @if(auth()->user()->role ==3)
            <!-- ==================  Auth Moduel ======================= -->
            <div class="sb-sidenav-menu-heading"><span class="link_menus"><i class="fa-solid fa-link fa-beat-fade"></i></span> {{__('translate.Post')}}</div>
            @include('backend.layouts.layouts-components.partial-sidebar._admin')
            <div class="sb-sidenav-menu-heading"><span class="link_menus"><i class="fa-solid fa-link fa-beat-fade"></i></span> {{__('translate.Inventory')}}</div>
            @include('backend.layouts.layouts-components.partial-sidebar._stock')
            <div class="sb-sidenav-menu-heading"><span class="link_menus"><i class="fa-solid fa-link fa-beat-fade"></i></span> {{__('translate.Stock')}}</div>
            @include('backend.layouts.layouts-components.partial-sidebar._admin-stock')
        @endif
        @if(auth()->user()->role ==2)
        <!-- ==================  Auth Moduel ======================= -->
        <div class="sb-sidenav-menu-heading"><span class="link_menus"><i class="fa-solid fa-link fa-beat-fade"></i></span> Auth</div>
        @include('backend.layouts.layouts-components.partial-sidebar._sub-admin')
        @endif
    </div>
</div>