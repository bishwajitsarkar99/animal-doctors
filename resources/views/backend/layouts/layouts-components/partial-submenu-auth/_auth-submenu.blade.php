<a class="nav-link_cgrMenu dropdown-toggle ty child_authentication" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:#007effc4;" id="plus_authentication_link"></i>
        <i class="fa-solid fa-minus" style="color:#007effc4;" id="minus_authentication_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> 
    <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Authentication')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="auth_" aria-labelledby="headingTwo" data-bs-parent="#auth_">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a class="nav-link underline nav_space" href="{{route('get_account-holders.action')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Account-History')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>{{__('translate.Account-History')}}
                </a>
                <a class="nav-link underline nav_space" href="{{route('emailVerification')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Email-Verification')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>{{__('translate.Email-Verification')}}
                </a>
                <a class="nav-link underline nav_space" href="{{route('role_index')}}" id="role_promot_index" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Role Promot')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>{{__('translate.Role Promot')}}
                </a>
                <a class="nav-link underline nav_space" href="{{route('role_permission.index')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Role Permission')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>{{__('translate.Role Permission')}}
                </a>
                <a class="nav-link underline nav_space" href="{{route('manageRole')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Manage Role')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>{{__('translate.Manage Role')}}
                </a>
                <a class="nav-link underline nav_space" href="{{route('superAdminUsers')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Users Access')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>{{__('translate.Users Access')}}
                </a>
            </nav>
        </div>
    </li>
</ul>
<!-- ================= Permission ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_permission" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:#007effc4;" id="plus_permission_link"></i>
        <i class="fa-solid fa-minus" style="color:#007effc4;" id="minus_permission_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> 
    <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Permission')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="auth_" aria-labelledby="headingTwo" data-bs-parent="#auth_">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a class="nav-link underline nav_space" href="#" id="showPermission" data-bs-toggle="tooltip" data-bs-placement="right" title="Permission" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>{{__('translate.User-Permission')}}
                </a>
                <a class="nav-link underline nav_space" href="{{route('authPageLoad')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="User Permission" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>{{__('translate.Page Permission')}}
                </a>
                <!-- <a class="nav-link underline nav_space" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Permission Setting">
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>Role Setting
                </a> -->
            </nav>
        </div>

    </li>

</ul>

<!-- ================= User Location ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_location" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:#007effc4;" id="plus_loaction_link"></i>
        <i class="fa-solid fa-minus" style="color:#007effc4;" id="minus_loaction_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> 
    <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.User-Details')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="auth_" aria-labelledby="headingTwo" data-bs-parent="#auth_">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a class="nav-link underline nav_space" href="{{ route('user.details') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="User Details" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>' >
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>{{__('translate.User-Details')}}
                </a>
                <!-- <a class="nav-link underline nav_space" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.404 Page')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>' >
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>{{__('translate.404 Page')}}
                </a>
                <a class="nav-link underline nav_space" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.500 Page')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>' >
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>{{__('translate.500 Page')}}
                </a> -->
            </nav>
        </div>
    </li>
</ul>

<!-- ================= Company Branch ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_branch" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:#007effc4;" id="plus_branch_link"></i>
        <i class="fa-solid fa-minus" style="color:#007effc4;" id="minus_branch_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> 
    <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Branch')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="auth_" aria-labelledby="headingTwo" data-bs-parent="#auth_">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a class="nav-link underline nav_space" href="{{ route('branch.index') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Create" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>' >
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>{{__('translate.Create')}}
                </a>
                <a class="nav-link underline nav_space" href="{{ route('branch_access.view') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Admin Access" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>' >
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>{{__('translate.Admin Access')}}
                </a>
                <a class="nav-link underline nav_space" href="{{ route('branch_access_permission.view') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="User Access" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>' >
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>{{__('translate.User Access')}}
                </a>
            </nav>
        </div>

    </li>

</ul>

<!-- ================= Module ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_module" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:#007effc4;" id="plus_module_link"></i>
        <i class="fa-solid fa-minus" style="color:#007effc4;" id="minus_module_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> 
    <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Module')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="auth_" aria-labelledby="headingTwo" data-bs-parent="#auth_">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a class="nav-link underline nav_space" href="{{ route('module_category_view.action') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Module Category" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>' >
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>{{__('translate.Category')}}
                </a>
                <a class="nav-link underline nav_space" href="{{ route('module_name_view.action') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Module Name" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>' >
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>{{__('translate.Name')}}
                </a>
                <a class="nav-link underline nav_space" href="{{ route('module.index') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Module inject" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>' >
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>{{__('translate.Inject')}}
                </a>
                <a class="nav-link underline nav_space" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Module Installations" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>' >
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>{{__('translate.Installations')}}
                </a>
            </nav>
        </div>
    </li>
</ul>

<!-- ================= Log Activity ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_log_activity" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:#007effc4;" id="plus_log_activity_link"></i>
        <i class="fa-solid fa-minus" style="color:#007effc4;" id="minus_log_activity_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> 
    <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Log-Activity')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="auth_" aria-labelledby="headingTwo" data-bs-parent="#auth_">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a class="nav-link underline nav_space" href="{{ route('user.details') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Permission" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>' >
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>{{__('translate.User Activity')}}
                </a>
                <!-- <a class="nav-link underline nav_space" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.404 Page')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>' >
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>{{__('translate.404 Page')}}
                </a>
                <a class="nav-link underline nav_space" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.500 Page')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>' >
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>{{__('translate.500 Page')}}
                </a> -->
            </nav>
        </div>
    </li>
</ul>