<!-- Navbar Brand-->
<a class="navbar-brand ps-3 admin_panel" href="#" id="side_bar">
    <span class="visit_link" onclick="openFullscreen()" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Open Full Screen Mode')}}">
        <span><i class="fa-solid fa-expand" style="color: #ffffff;"></i></span>
    </span>
    <span class="visit_link" onclick="closeFullscreen()" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close Full Screen Mode')}}">
        <span><i class="fa-regular fa-rectangle-xmark" style="color: #ffffff;"></i></span>
    </span>
    @if(auth()->user()->role ==1)
    {{Auth::user()->name}}
    @endif

    @if(auth()->user()->role ==2)
    {{Auth::user()->name}}
    @endif

    @if(auth()->user()->role ==3)
    {{Auth::user()->name}}
    @endif

    @if(auth()->user()->role ==0)
    Dr.{{Auth::user()->name}}
    @endif
</a>
<!-- Sidebar Toggle-->
<button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 footer_toggle" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
<span class="admin_email">{{Auth::user()->email}} </span>

<!-- Navbar Search-->
<form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0 {{setting('topbar_moduel_display')}}">
    <div class="input-group">
        <input type="search" list="datalistOptionsTop" class="form-control form-control-sm src_form {{setting('topbar_moduel_display')}}" id="srch_url" placeholder="{{__('translate.Search..')}}" aria-label="Search for..." aria-describedby="btnNavbarSearch" />
        <button class="btn btn-success btn-btn-sm {{setting('topbar_searchbtn_moduel_display')}}" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
        <datalist id="datalistOptionsTop">
            <option value="{{setting('category_link')}}">
            <option value="">
            <option value="">
            <option value="">
            <option value="">
            <option value="">
            <option value="">
            <option value="">
            <option value="">
            <option value="">
        </datalist>
    </div>
</form>
<!-- Navbar Dropdown Menu-->
<ul class="navbar-nav ms-auto ms-md-0 me-lg-2">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="img-profile rounded-circle" id="output" src="/image/{{auth()->user()->image}}">
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" id="themeMenuListBackground">
            @if(auth()->user()->role ==0)
            <li>
                <a class="dropdown-item pro_link" id="profile_urllinks"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> {{__('translate.Profile')}}</a>
            </li>
            @elseif(auth()->user()->role ==2)
            <li>
                <a class="dropdown-item pro_link" id="profile_urllinks"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> {{__('translate.Profile')}}</a>
            </li>
            @elseif(auth()->user()->role ==3)
            <li>
                <a class="dropdown-item pro_link" id="profile_urllinks"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> {{__('translate.Profile')}}</a>
            </li>
            <li>
                @elseif(auth()->user()->role ==1)
            <li>
                <a class="dropdown-item pro_link" id="profile_urllinks"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> {{__('translate.Profile')}}</a>
            </li>
            <!-- <li>
                <a class="dropdown-item pro_link" id="themsetting_click"><i class="fa-solid fa-gear"></i> Theme Setting</a>
            </li>
            <hr class="dropdown-divider" /> -->
            <!-- <li>
                <a class="dropdown-item pro_link" id="activity_log_url"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i> Activity Log</a>
            </li> -->
            @endif
            <li>
                <a class="dropdown-item pro_link mt-2" id="logout_click"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> {{__('translate.Logout')}}</a>
            </li>
        </ul>
    </li>

</ul>