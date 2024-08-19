<div class="sb-sidenav-menu">
    <!-- defult background focus for sidebar/ = class / side_nav_background for id = menu_background -->
    <div class="nav" id="menu_background">
        @if(auth()->user()->role ==1)
        <a class="nav-link" href="{{ route('super-admin.dashboard') }}" id="side_nav">
            <div class="sb-nav-link-icon das_hdname pt-1"><i class="fas fa-tachometer-alt fa-beat-fade"></i></div>
            <span class="dashboard_text">{{__('translate.Dashboard')}}</span>
        </a>
        @endif
        @if(auth()->user()->role ==2)
        <a class="nav-link" href="{{ route('sub-admin.dashboard') }}" id="side_nav">
            <div class="sb-nav-link-icon das_hdname pt-1"><i class="fas fa-tachometer-alt fa-beat-fade"></i></div>
            <span class="dashboard_text">{{__('translate.Dashboard')}}</span>
        </a>
        @endif
        @if(auth()->user()->role ==3)
        <a class="nav-link" href="{{ route('admin.dashboard') }}" id="side_nav">
            <div class="sb-nav-link-icon das_hdname pt-1"><i class="fas fa-tachometer-alt fa-beat-fade"></i></div>
            <span class="dashboard_text">{{__('translate.Dashboard')}}</span>
        </a>
        @endif
        @if(auth()->user()->role ==5)
        <a class="nav-link" href="{{ route('accounts.dashboard') }}" id="side_nav">
            <div class="sb-nav-link-icon das_hdname pt-1" style="color:#003a91;"><i class="fas fa-tachometer-alt fa-beat-fade"></i></div>
            <span class="dashboard_text">Side-Menu</span>
        </a>  
        @endif
        @if(auth()->user()->role ==6)
        <a class="nav-link" href="#" id="side_nav">
            <div class="sb-nav-link-icon das_hdname pt-1" style="color:#ab7800ab;"><i class="fas fa-tachometer-alt fa-beat-fade"></i></div>
            <span class="dashboard_text">Side-Menu</span>
        </a>
        @endif
        @if(auth()->user()->role ==7)
        <a class="nav-link" href="#" id="side_nav">
            <div class="sb-nav-link-icon das_hdname pt-1" style="color:#ab7800ab;"><i class="fas fa-tachometer-alt fa-beat-fade"></i></div>
            <span class="dashboard_text">Side-Menu</span>
        </a> 
        @endif
        @if(auth()->user()->role ==0)
        <a class="nav-link" href="{{ route('doctors.dashboard') }}" id="side_nav">
            <div class="sb-nav-link-icon das_hdname pt-1" style="color:#ab7800ab;"><i class="fas fa-tachometer-alt fa-beat-fade"></i></div>
            <span class="dashboard_text">Side-Menu</span>
        </a>   
        @endif
        @if(auth()->user()->role ==1)
            <span class="ms-4 ps-2" style="font-size: 10px;letter-spacing:1px;font-weight:600;color:white;">
                {{setting('company_name')}}
            </span>
        @endif
        @if(auth()->user()->role ==2)
            <span class="ms-4 ps-2" style="font-size: 10px;letter-spacing:1px;font-weight:600;color:white;">
                {{setting('company_name')}}
            </span>
        @endif
        @if(auth()->user()->role ==3)
            <span class="ms-4 ps-2" style="font-size: 10px;letter-spacing:1px;font-weight:600;color:white;">
                {{setting('company_name')}}
            </span>
        @endif
        @if(auth()->user()->role ==5)
            <span class="ms-4 ps-2" style="font-size: 10px;letter-spacing:1px;font-weight:700;color: #003a91;">
                {{setting('company_name')}}
            </span>
        @endif
        @if(auth()->user()->role ==6)
            <span class="ms-4 ps-2" style="font-size: 10px;letter-spacing:1px;font-weight:600;">
                {{setting('company_name')}}
            </span>
        @endif
        @if(auth()->user()->role ==7)
            <span class="ms-4 ps-2" style="font-size: 10px;letter-spacing:1px;font-weight:600;">
                {{setting('company_name')}}
            </span>
        @endif
        @if(auth()->user()->role ==0)
            <span class="ms-4 ps-2 mb-2" style="font-size: 10px;letter-spacing:1px;font-weight:600;">
                {{setting('company_name')}}
            </span>
        @endif
        <!-- ================= Project Name ================= -->
        @if(auth()->user()->role ==1)
        <div class="sb-sidenav-menu-heading platform_name trapezoid">
            <span class="animation-examples three">
                <img style="width:100%;height:75px;padding:0px;border:1px solid lightgray;" src="{{asset('/image/log/comp-logo.png')}}" alt="company-logo" width="100">
            </span>
        </div>
        @endif
        @if(auth()->user()->role ==2)
        <div class="sb-sidenav-menu-heading platform_name trapezoid">
            <span class="animation-examples three">
                <img style="width:100%;height:75px;padding:0px;border:1px solid lightgray;" src="{{asset('/image/log/comp-logo.png')}}" alt="company-logo" width="100">
            </span>
        </div>
        @endif
        @if(auth()->user()->role ==3)
        <div class="sb-sidenav-menu-heading platform_name trapezoid">
            <span class="animation-examples three">
                <img style="width:100%;height:75px;padding:0px;border:1px solid lightgray;" src="{{asset('/image/log/comp-logo.png')}}" alt="company-logo" width="100">
            </span>
        </div>
        @endif
        @if(auth()->user()->role ==5)
        <div class="sb-sidenav-menu-heading platform_name trapezoid" style="width: 205px;height:150px;">
            <span class="animation-examples three pb-2">
                <i class="fa-solid fa-dice-d6 fa-flip"></i>
                <span class="lar_pro plantform1">{{__('Accounts')}} </span>
                <img class="profile" style="width: 100px;height:100px; border-radius:50%;" src="/image/{{auth()->user()->image}}" alt="profile-image">
            </span>
        </div>
        @endif
        @if(auth()->user()->role ==6)
        <div class="sb-sidenav-menu-heading platform_name trapezoid" style="width: 205px;height:150px;">
            <span class="animation-examples three pb-2">
                <i class="fa-solid fa-dice-d6 fa-flip"></i>
                <span class="lar_pro plantform1">{{__('Marketing')}} </span>
                <img class="profile" style="width: 100px;height:100px; border-radius:50%;" src="/image/{{auth()->user()->image}}" alt="profile-image">
            </span>
        </div>
        @endif
        @if(auth()->user()->role ==7)
        <div class="sb-sidenav-menu-heading platform_name trapezoid" style="width: 205px;height:150px;">
            <span class="animation-examples three pb-2">
                <i class="fa-solid fa-dice-d6 fa-flip"></i>
                <span class="lar_pro plantform1">{{__('Delivery Team')}} </span>
                <img class="profile" style="width: 100px;height:100px; border-radius:50%;" src="/image/{{auth()->user()->image}}" alt="profile-image">
            </span>
        </div>
        @endif
        @if(auth()->user()->role ==0)
        <div class="sb-sidenav-menu-heading platform_name trapezoid" style="width: 205px;height:150px;">
            <span class="animation-examples three pb-2">
                <i class="fa-solid fa-dice-d6 fa-flip"></i>
                <span class="lar_pro plantform1">{{__('translate.Doctor')}}</span><br>
                <img class="profile" style="width: 100px;height:100px; border-radius:50%;" src="/image/{{auth()->user()->image}}" alt="profile-image">
            </span>
        </div>
        @endif
        @if(auth()->user()->role == 1)
        <!-- ================== Purchases Moduel ======================= -->
        <div class="sb-sidenav-menu-heading"><span class="link_menus {{setting('purchases_visual')}}"><i class="fa-solid fa-link fa-beat-fade"></i></span> 
            <span class="{{setting('purchases_visual')}}" style="color:white;">{{__('translate.Purchases Dept.')}}</span>
        </div>
        <!-- ================== Product ======================= -->
        @include('backend.layouts.layouts-components.partial-sidebar._product')

        <!-- ================== Stock ======================= -->
        @include('backend.layouts.layouts-components.partial-sidebar._stock')

        <!-- ================== Accounts Moduel ======================= -->
        <div class="sb-sidenav-menu-heading"><span class="link_menus {{setting('accounts_moduel_display')}}"><i class="fa-solid fa-link fa-beat-fade"></i></span> 
            <span class="{{setting('accounts_moduel_display')}}" style="color:white;">{{__('translate.Accounts Dept.')}}</span>
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
        <div class="sb-sidenav-menu-heading {{setting('hrm_moduel_display')}}" style="color:white;"><span class="link_menus"><i class="fa-solid fa-link fa-beat-fade"></i></span> 
            <span class="{{setting('hrm_moduel_display')}}">{{__('translate.HRM Dept.')}}</span>
        </div>

        <!-- ================== HRM ======================= -->
        @include('backend.layouts.layouts-components.partial-sidebar._hrm')

        <!-- ==================  Auth Moduel ======================= -->
        <div class="sb-sidenav-menu-heading {{setting('auth_moduel_display')}}"><span class="link_menus"><i class="fa-solid fa-link fa-beat-fade"></i></span> 
            <span class="{{setting('auth_moduel_display')}}" style="color:white;">{{__('translate.Authentication')}}</span>
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
            <div class="sb-sidenav-menu-heading"><span class="link_menus"><i class="fa-solid fa-link fa-beat-fade"></i></span> Purchases Dept.</div>
            @include('backend.layouts.layouts-components.partial-sidebar._stock')
            <div class="sb-sidenav-menu-heading"><span class="link_menus"><i class="fa-solid fa-link fa-beat-fade"></i></span> {{__('translate.Post')}}</div>
            @include('backend.layouts.layouts-components.partial-sidebar._admin')
                <!-- ================== Layouts ======================= -->
            @include('backend.layouts.layouts-components.partial-sidebar._layouts')
        @endif
        @if(auth()->user()->role ==2)
        <!-- ==================  Auth Moduel ======================= -->
        <div class="sb-sidenav-menu-heading"><span class="link_menus"><i class="fa-solid fa-link fa-beat-fade"></i></span> Purchases Dept.</div>
        @include('backend.layouts.layouts-components.partial-sidebar._stock')
        @include('backend.layouts.layouts-components.partial-sidebar._sub-admin')
        <!-- ================== Layouts ======================= -->
        @include('backend.layouts.layouts-components.partial-sidebar._layouts')
        @endif
        @if(auth()->user()->role == 5)
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
        <!-- ================== Layouts ======================= -->
        @include('backend.layouts.layouts-components.partial-sidebar._layouts')
        @endif

    </div>
</div>