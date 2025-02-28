<!-- Navbar Brand-->
<a class="navbar-brand ps-1 admin_panel" href="#" id="side_bar">
    <span class="visit_link mini-btn-one" onclick="openFullscreen()" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Open Full Screen Mode')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        @if(auth()->user()->role ==0)
            <span><i class="fa-solid fa-expand" style="color: darkblue;"></i></span>
        @else
            <span><i class="fa-solid fa-expand" style="color: darkgoldenrod;"></i></span>  
        @endif  
    </span>
    <span class="visit_link mini-btn-two" onclick="closeFullscreen()" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close Full Screen Mode')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        @if(auth()->user()->role ==0)
            <span><i class="fa-regular fa-rectangle-xmark" style="color: darkblue;"></i></span>
        @else
            <span><i class="fa-regular fa-rectangle-xmark" style="color: orangered;"></i></span>
        @endif
    </span>
    @if(auth()->user()->role ==1)
    Super Admin
    @endif

    @if(auth()->user()->role ==2)
    Sub Admin
    @endif

    @if(auth()->user()->role ==3)
    Admin
    @endif

    @if(auth()->user()->role ==5)
    Accounts
    @endif

    @if(auth()->user()->role ==6)
    Marketing
    @endif

    @if(auth()->user()->role ==7)
    Delivery Team
    @endif

    @if(auth()->user()->role ==0)
    Default Role
    @endif
</a>
<!-- Sidebar Toggle-->
@if(auth()->user()->role ==1)
<button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 footer_toggle" id="sidebarToggle" href="#!" data-bs-toggle="tooltip"  data-bs-placement="left" title="Close side-bar" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'><i class="fas fa-bars"></i></button>
@endif
@if(auth()->user()->role ==2)
<button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 footer_toggle" id="sidebarToggle" href="#!" data-bs-toggle="tooltip"  data-bs-placement="left" title="Close side-bar" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'><i class="fas fa-bars"></i></button>
@endif
@if(auth()->user()->role ==3)
<button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 footer_toggle" id="sidebarToggle" href="#!" data-bs-toggle="tooltip"  data-bs-placement="left" title="Close side-bar" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'><i class="fas fa-bars"></i></button>
@endif
@if(auth()->user()->role ==5)
<button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 footer_toggle" id="sidebarToggle" href="#!" style="font-size:10px;" data-bs-toggle="tooltip" data-bs-placement="left" title="side-bar Menu" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'><i class="fas fa-bars"></i></button>
@endif
@if(auth()->user()->role ==6)
<button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 footer_toggle" id="sidebarToggle" href="#!" data-bs-toggle="tooltip"  data-bs-placement="left" title="side-bar Menu" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'><i class="fas fa-bars"></i></button>
@endif
@if(auth()->user()->role ==7)
<button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 footer_toggle" id="sidebarToggle" href="#!" data-bs-toggle="tooltip"  data-bs-placement="left" title="side-bar Menu" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'><i class="fas fa-bars"></i></button>
@endif
@if(auth()->user()->role ==0)
<button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 footer_toggle top__btn" style="color:darkblue;animation: none;" id="sidebarToggle" href="#!" data-bs-toggle="tooltip"  data-bs-placement="left" title="side-bar Menu" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'><i class="fas fa-bars"></i></button>
@endif
@if(auth()->user()->role ==0)
    <span style="color:darkblue;font-weight:700;font-size: .9rem;">{{Auth::user()->branch_name}} </span>
@elseif(auth()->user()->role ==1)
    <span class="admin_email">{{Auth::user()->branch_type}} </span>
@else
    <span class="admin_email">{{Auth::user()->branch_name}} </span>
@endif

<!-- Navbar Search-->
<form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0 {{setting('topbar_moduel_display')}}">
    <div class="input-group">
        <input type="search" list="datalistOptionsTop" class="form-control form-control-sm src_form {{setting('topbar_moduel_display')}}" id="srch_url" placeholder="{{__('translate.Search..')}}" aria-label="Search for..." aria-describedby="btnNavbarSearch" />
        <button class="btn btn-success btn-btn-sm {{setting('topbar_searchbtn_moduel_display')}}" id="btnNavbarSearch" type="submit" data-bs-toggle="tooltip"  data-bs-placement="left" title="Search" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'><i class="fas fa-search"></i></button>
        <datalist id="datalistOptionsTop">
            <option value="{{setting('category_link')}}">
        </datalist>
    </div>
</form>
<!-- Navbar Dropdown Menu-->
<ul class="navbar-nav ms-auto ms-md-0 me-lg-2">
    <li class="nav-item dropdown">
        <a class="dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="padding-left: 0.5rem;">
            <img class="img-profile rounded-circle" style="margin-top: -2px;" id="output" src="/storage/image/user-image/{{auth()->user()->image}}">
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" id="themeMenuListBackground">
            <li>
                <a class="dropdown-item pro_link" id="profile_urllinks">
                    <span class="show-profile badge rounded-pill bg-green text-white" hidden><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> {{__('translate.Profile')}}</span>
                </a>
                <span class="show-prof ms-2" id="profileSkel"></span>
            </li>
            <li>
                <a class="dropdown-item pro_link" href="{{route('email.index')}}">
                    <span class="show-email badge rounded-pill bg-green text-white" hidden><i class="fa-solid fa-envelope-circle-check fa-beat" style="color: white; font-size:10px;"></i> Send-Email</span>
                </a>
                <span class="show-prof ms-2" id="emailSkel"></span>
            </li>
            <li>
                <a class="dropdown-item pro_link" id="logout_click">
                    <span class="show-logout badge rounded-pill bg-danger text-white" hidden><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> {{__('translate.Logout')}}</span>
                    <span class="show-log ms-2" id="logoutSkel"></span>
                </a>
            </li>
        </ul>
    </li>

</ul>