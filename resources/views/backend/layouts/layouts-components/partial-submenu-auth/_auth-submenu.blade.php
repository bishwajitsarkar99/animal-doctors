<!-- ================= Authentication ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_authentication {{ Request::is('super-admin/user-accounts/account-holder/account-history-*/index') || Request::is('super-admin/register-emails/email-verification-*/index') || Request::is('super-admin/roles/role-index-*/index') || Request::is('super-admin/roles/role-permission-*/index') || Request::is('super-admin/roles/manage-role-*/index') || Request::is('super-admin/users/user-authorization-*/index') ? 'folder-active' : '' }}" role="button" data-bs-toggle="collapse" data-bs-target="#authentication" aria-expanded="false" aria-controls="flush-heading">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_authentication_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_authentication_link" hidden></i>
    </span>
    <svg xml:space="preserve" width="20px" height="20px" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 347.28"><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"/><path fill="#f1c107" fill-rule="nonzero" d="M121.35 118.09l260.64 0 0 -31.3c0.73,-7.76 -4.67,-9.69 -11.24,-9.98 -3.77,-0.18 -7.97,-0.2 -11.76,-0.01l-150.17 0c-36.03,0 -43.17,-19.04 -49.96,-37.13 -3.87,-10.32 -7.56,-20.17 -22.65,-20.17l-104.38 0c-6.76,0 -12.33,5.57 -12.33,12.33l0 253.04 61.44 -139.95c6.5,-14.82 24.13,-26.83 40.41,-26.83zm280.14 0l86.05 0c19.11,0 29.72,16.28 21.83,34.29l0.03 0.01 -73.77 168.06c-6.5,14.83 -24.14,26.83 -40.41,26.83l-366.19 0c-7.65,0 -13.84,-2.56 -18.08,-6.74 -6.2,-5.19 -10.95,-17.13 -10.95,-25.05l0 -283.66c0,-17.52 14.31,-31.83 31.83,-31.83l104.38 0c28.52,0 34.55,16.06 40.86,32.89 4.46,11.89 9.15,24.4 31.75,24.4 51.2,0 102.48,0.33 153.67,0.02 3.05,-0.03 6.18,-0.06 9.1,0.07 16.41,0.76 30.82,5.4 29.88,29.41l0.02 31.3zm85.97 19.05l-366.19 0c-8.66,0 -19,7.42 -22.44,15.25l-73.77 168.06 -0.03 -0.01c-2.05,4.68 -1.46,7.8 4.07,7.8l366.2 0c8.66,0 18.99,-7.43 22.43,-15.26l73.77 -168.06c0.07,0.03 4.09,-7.78 -4.04,-7.78z"/></g></svg> 
    <span class="" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Authentication')}}</span>
</a>
<div id="authentication" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushReport">
    <div class="child-tree">
        <div class="accordion-body sub_box">
            <a type="button" class="nav-link underline nav_space side-bar-link load-page {{ Request::routeIs('get_account-holders.action') ? 'active' : '' }}" data-url="/super-admin/user-accounts/account-holder/account-history-{slug}/index" data-bs-toggle="tooltip" data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#fff;"></i>{{__('translate.Account-History')}}
            </a>
            <a type="button" class="nav-link underline nav_space side-bar-link load-page {{ Request::routeIs('emailVerification') ? 'active' : '' }}" data-url="/super-admin/register-emails/email-verification-{slug}/index" data-bs-toggle="tooltip" data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#fff;"></i>{{__('translate.Email-Verification')}}
            </a>
            <a type="button" class="nav-link underline nav_space side-bar-link load-page {{ Request::routeIs('role_index') ? 'active' : '' }}" data-url="/super-admin/roles/role-index-{slug}/index" data-bs-toggle="tooltip" data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#fff;"></i>{{__('translate.Role Promot')}}
            </a>
            <a type="button" class="nav-link underline nav_space side-bar-link load-page {{ Request::routeIs('role_permission.index') ? 'active' : '' }}" data-url="/super-admin/roles/role-permission-{slug}/index" data-bs-toggle="tooltip" data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#fff;"></i>{{__('translate.Role Permission')}}
            </a>
            <a type="button" class="nav-link underline nav_space side-bar-link load-page {{ Request::routeIs('manageRole') ? 'active' : '' }}" data-url="/super-admin/roles/manage-role-{slug}/index" data-bs-toggle="tooltip" data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#fff;"></i>{{__('translate.Manage Role')}}
            </a>
            <a type="button" class="nav-link underline nav_space side-bar-link load-page {{ Request::routeIs('superAdminUsers') ? 'active' : '' }}" data-url="/super-admin/users/user-authorization-{slug}/index" data-bs-toggle="tooltip" data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#fff;"></i>{{__('translate.Users Authorize')}}
            </a>
        </div>
    </div>
</div>
<!-- ================= Permission ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_permission {{ Request::is('super-admin/auth-pages/auth-page-permission-*/index') ? 'folder-active' : '' }}" role="button" data-bs-toggle="collapse" data-bs-target="#permission" aria-expanded="false" aria-controls="flush-heading">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_permission_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_permission_link" hidden></i>
    </span>
    <svg xml:space="preserve" width="20px" height="20px" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 347.28"><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"/><path fill="#f1c107" fill-rule="nonzero" d="M121.35 118.09l260.64 0 0 -31.3c0.73,-7.76 -4.67,-9.69 -11.24,-9.98 -3.77,-0.18 -7.97,-0.2 -11.76,-0.01l-150.17 0c-36.03,0 -43.17,-19.04 -49.96,-37.13 -3.87,-10.32 -7.56,-20.17 -22.65,-20.17l-104.38 0c-6.76,0 -12.33,5.57 -12.33,12.33l0 253.04 61.44 -139.95c6.5,-14.82 24.13,-26.83 40.41,-26.83zm280.14 0l86.05 0c19.11,0 29.72,16.28 21.83,34.29l0.03 0.01 -73.77 168.06c-6.5,14.83 -24.14,26.83 -40.41,26.83l-366.19 0c-7.65,0 -13.84,-2.56 -18.08,-6.74 -6.2,-5.19 -10.95,-17.13 -10.95,-25.05l0 -283.66c0,-17.52 14.31,-31.83 31.83,-31.83l104.38 0c28.52,0 34.55,16.06 40.86,32.89 4.46,11.89 9.15,24.4 31.75,24.4 51.2,0 102.48,0.33 153.67,0.02 3.05,-0.03 6.18,-0.06 9.1,0.07 16.41,0.76 30.82,5.4 29.88,29.41l0.02 31.3zm85.97 19.05l-366.19 0c-8.66,0 -19,7.42 -22.44,15.25l-73.77 168.06 -0.03 -0.01c-2.05,4.68 -1.46,7.8 4.07,7.8l366.2 0c8.66,0 18.99,-7.43 22.43,-15.26l73.77 -168.06c0.07,0.03 4.09,-7.78 -4.04,-7.78z"/></g></svg> 
    <span class="" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Permission')}}</span>
</a>
<div id="permission" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushReport">
    <div class="child-tree">
        <div class="accordion-body sub_box">
            <a type="button" class="nav-link underline nav_space side-bar-link load-page" data-url="#" id="showPermission" data-bs-toggle="tooltip" data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#fff;"></i>{{__('translate.User-Permission')}}
            </a>
            <a type="button" class="nav-link underline nav_space side-bar-link load-page {{ Request::routeIs('authPageLoad') ? 'active' : '' }}" data-url="/super-admin/auth-pages/auth-page-permission-{slug}/index" data-bs-toggle="tooltip" data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#fff;"></i>{{__('translate.Auth Page')}}
            </a>
        </div>
    </div>
</div>
<!-- ================= User Location ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_location" role="button" data-bs-toggle="collapse" data-bs-target="#userLocation" aria-expanded="false" aria-controls="flush-heading">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_loaction_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_loaction_link" hidden></i>
    </span>
    <svg xml:space="preserve" width="20px" height="20px" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 347.28"><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"/><path fill="#f1c107" fill-rule="nonzero" d="M121.35 118.09l260.64 0 0 -31.3c0.73,-7.76 -4.67,-9.69 -11.24,-9.98 -3.77,-0.18 -7.97,-0.2 -11.76,-0.01l-150.17 0c-36.03,0 -43.17,-19.04 -49.96,-37.13 -3.87,-10.32 -7.56,-20.17 -22.65,-20.17l-104.38 0c-6.76,0 -12.33,5.57 -12.33,12.33l0 253.04 61.44 -139.95c6.5,-14.82 24.13,-26.83 40.41,-26.83zm280.14 0l86.05 0c19.11,0 29.72,16.28 21.83,34.29l0.03 0.01 -73.77 168.06c-6.5,14.83 -24.14,26.83 -40.41,26.83l-366.19 0c-7.65,0 -13.84,-2.56 -18.08,-6.74 -6.2,-5.19 -10.95,-17.13 -10.95,-25.05l0 -283.66c0,-17.52 14.31,-31.83 31.83,-31.83l104.38 0c28.52,0 34.55,16.06 40.86,32.89 4.46,11.89 9.15,24.4 31.75,24.4 51.2,0 102.48,0.33 153.67,0.02 3.05,-0.03 6.18,-0.06 9.1,0.07 16.41,0.76 30.82,5.4 29.88,29.41l0.02 31.3zm85.97 19.05l-366.19 0c-8.66,0 -19,7.42 -22.44,15.25l-73.77 168.06 -0.03 -0.01c-2.05,4.68 -1.46,7.8 4.07,7.8l366.2 0c8.66,0 18.99,-7.43 22.43,-15.26l73.77 -168.06c0.07,0.03 4.09,-7.78 -4.04,-7.78z"/></g></svg> 
    <span class="" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.User-Details')}}</span>
</a>
<div id="userLocation" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushReport">
    <div class="child-tree">
        <div class="accordion-body sub_box">
            <a type="button" class="nav-link underline nav_space side-bar-link load-page" data-url="#" data-bs-toggle="tooltip" data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>' >
                <i class="fa-solid fa-minus" style="color:#fff;"></i>User-All-Details
            </a>
        </div>
    </div>
</div>
<!-- ================= Company Branch ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_branch {{ Request::is('company/branch-activity/branch-*/admin-access/index') || Request::is('company/branch-activity/branch-*/index') || Request::is('company/branch-activity/branch-*/user-access/index') ? 'folder-active' : '' }}" role="button" data-bs-toggle="collapse" data-bs-target="#companyBranch" aria-expanded="false" aria-controls="flush-heading">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_branch_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_branch_link" hidden></i>
    </span>
    <svg xml:space="preserve" width="20px" height="20px" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 347.28"><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"/><path fill="#f1c107" fill-rule="nonzero" d="M121.35 118.09l260.64 0 0 -31.3c0.73,-7.76 -4.67,-9.69 -11.24,-9.98 -3.77,-0.18 -7.97,-0.2 -11.76,-0.01l-150.17 0c-36.03,0 -43.17,-19.04 -49.96,-37.13 -3.87,-10.32 -7.56,-20.17 -22.65,-20.17l-104.38 0c-6.76,0 -12.33,5.57 -12.33,12.33l0 253.04 61.44 -139.95c6.5,-14.82 24.13,-26.83 40.41,-26.83zm280.14 0l86.05 0c19.11,0 29.72,16.28 21.83,34.29l0.03 0.01 -73.77 168.06c-6.5,14.83 -24.14,26.83 -40.41,26.83l-366.19 0c-7.65,0 -13.84,-2.56 -18.08,-6.74 -6.2,-5.19 -10.95,-17.13 -10.95,-25.05l0 -283.66c0,-17.52 14.31,-31.83 31.83,-31.83l104.38 0c28.52,0 34.55,16.06 40.86,32.89 4.46,11.89 9.15,24.4 31.75,24.4 51.2,0 102.48,0.33 153.67,0.02 3.05,-0.03 6.18,-0.06 9.1,0.07 16.41,0.76 30.82,5.4 29.88,29.41l0.02 31.3zm85.97 19.05l-366.19 0c-8.66,0 -19,7.42 -22.44,15.25l-73.77 168.06 -0.03 -0.01c-2.05,4.68 -1.46,7.8 4.07,7.8l366.2 0c8.66,0 18.99,-7.43 22.43,-15.26l73.77 -168.06c0.07,0.03 4.09,-7.78 -4.04,-7.78z"/></g></svg> 
    <span class="" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Branch')}}</span>
</a>
<div id="companyBranch" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushReport">
    <div class="child-tree">
        <div class="accordion-body sub_box">
            <a type="button" class="nav-link underline nav_space side-bar-link load-page {{ Request::routeIs('branch_access.view') ? 'active' : '' }}" data-url="/company/branch-activity/branch-{slug}/admin-access/index" data-bs-toggle="tooltip" data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>' >
                <i class="fa-solid fa-minus" style="color:#fff;"></i>{{__('translate.Admin Access')}}
            </a>
            <a type="button" class="nav-link underline nav_space side-bar-link load-page {{ Request::routeIs('branch_access_permission.view') ? 'active' : '' }}" data-url="/company/branch-activity/branch-{slug}/user-access/index" data-bs-toggle="tooltip" data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>' >
                <i class="fa-solid fa-minus" style="color:#fff;"></i>{{__('translate.User Access')}}
            </a>
            <a type="button" class="nav-link underline nav_space side-bar-link load-page {{ Request::routeIs('branch.index') ? 'active' : '' }}" data-url="/company/branch-activity/branch-{slug}/index" data-bs-toggle="tooltip" data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>' >
                <i class="fa-solid fa-minus" style="color:#fff;"></i>{{__('translate.Setting')}}
            </a>
        </div>
    </div>
</div>
<!-- ================= Module ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_module {{ Request::is('application/modules/module-category-index') || Request::is('application/modules/module-name-index') || Request::is('application/modules/module-index') || Request::is('application/module/module-installions-*/index') || Request::is('application/module/module-installions-*/index') ? 'folder-active' : '' }}" role="button" data-bs-toggle="collapse" data-bs-target="#appModule" aria-expanded="false" aria-controls="flush-heading">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_module_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_module_link" hidden></i>
    </span>
    <svg xml:space="preserve" width="20px" height="20px" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 347.28"><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"/><path fill="#f1c107" fill-rule="nonzero" d="M121.35 118.09l260.64 0 0 -31.3c0.73,-7.76 -4.67,-9.69 -11.24,-9.98 -3.77,-0.18 -7.97,-0.2 -11.76,-0.01l-150.17 0c-36.03,0 -43.17,-19.04 -49.96,-37.13 -3.87,-10.32 -7.56,-20.17 -22.65,-20.17l-104.38 0c-6.76,0 -12.33,5.57 -12.33,12.33l0 253.04 61.44 -139.95c6.5,-14.82 24.13,-26.83 40.41,-26.83zm280.14 0l86.05 0c19.11,0 29.72,16.28 21.83,34.29l0.03 0.01 -73.77 168.06c-6.5,14.83 -24.14,26.83 -40.41,26.83l-366.19 0c-7.65,0 -13.84,-2.56 -18.08,-6.74 -6.2,-5.19 -10.95,-17.13 -10.95,-25.05l0 -283.66c0,-17.52 14.31,-31.83 31.83,-31.83l104.38 0c28.52,0 34.55,16.06 40.86,32.89 4.46,11.89 9.15,24.4 31.75,24.4 51.2,0 102.48,0.33 153.67,0.02 3.05,-0.03 6.18,-0.06 9.1,0.07 16.41,0.76 30.82,5.4 29.88,29.41l0.02 31.3zm85.97 19.05l-366.19 0c-8.66,0 -19,7.42 -22.44,15.25l-73.77 168.06 -0.03 -0.01c-2.05,4.68 -1.46,7.8 4.07,7.8l366.2 0c8.66,0 18.99,-7.43 22.43,-15.26l73.77 -168.06c0.07,0.03 4.09,-7.78 -4.04,-7.78z"/></g></svg> 
    <span class="" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Module')}}</span>
</a>
<div id="appModule" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushReport">
    <div class="child-tree">
        <div class="accordion-body sub_box">
            <a type="button" class="nav-link underline nav_space side-bar-link load-page {{ Request::routeIs('module_category_view.action') ? 'active' : '' }}" data-url="{{ route('module_category_view.action') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>' >
                <i class="fa-solid fa-minus" style="color:#fff;"></i>{{__('translate.Category')}}
            </a>
            <a type="button" class="nav-link underline nav_space side-bar-link load-page {{ Request::routeIs('module_name_view.action') ? 'active' : '' }}" data-url="{{ route('module_name_view.action') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>' >
                <i class="fa-solid fa-minus" style="color:#fff;"></i>{{__('translate.Name')}}
            </a>
            <a type="button" class="nav-link underline nav_space side-bar-link load-page {{ Request::routeIs('module.index') ? 'active' : '' }}" data-url="{{ route('module.index') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>' >
                <i class="fa-solid fa-minus" style="color:#fff;"></i>{{__('translate.Inject')}}
            </a>
            <a type="button" class="nav-link underline nav_space side-bar-link load-page {{ Request::routeIs('module.installions') ? 'active' : '' }}" data-url="/application/module/module-installions-{slug}/index" data-bs-toggle="tooltip" data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>' >
                <i class="fa-solid fa-minus" style="color:#fff;"></i>{{__('translate.Installations')}}
            </a>
        </div>
    </div>
</div>
<!-- ================= Log Activity ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_log_activity {{ Request::is('application/user-log/user-log-activity-*/log-dashboard') ? 'folder-active' : '' }}" role="button" data-bs-toggle="collapse" data-bs-target="#userLog" aria-expanded="false" aria-controls="flush-heading">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_log_activity_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_log_activity_link" hidden></i>
    </span>
    <svg xml:space="preserve" width="20px" height="20px" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 347.28"><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"/><path fill="#f1c107" fill-rule="nonzero" d="M121.35 118.09l260.64 0 0 -31.3c0.73,-7.76 -4.67,-9.69 -11.24,-9.98 -3.77,-0.18 -7.97,-0.2 -11.76,-0.01l-150.17 0c-36.03,0 -43.17,-19.04 -49.96,-37.13 -3.87,-10.32 -7.56,-20.17 -22.65,-20.17l-104.38 0c-6.76,0 -12.33,5.57 -12.33,12.33l0 253.04 61.44 -139.95c6.5,-14.82 24.13,-26.83 40.41,-26.83zm280.14 0l86.05 0c19.11,0 29.72,16.28 21.83,34.29l0.03 0.01 -73.77 168.06c-6.5,14.83 -24.14,26.83 -40.41,26.83l-366.19 0c-7.65,0 -13.84,-2.56 -18.08,-6.74 -6.2,-5.19 -10.95,-17.13 -10.95,-25.05l0 -283.66c0,-17.52 14.31,-31.83 31.83,-31.83l104.38 0c28.52,0 34.55,16.06 40.86,32.89 4.46,11.89 9.15,24.4 31.75,24.4 51.2,0 102.48,0.33 153.67,0.02 3.05,-0.03 6.18,-0.06 9.1,0.07 16.41,0.76 30.82,5.4 29.88,29.41l0.02 31.3zm85.97 19.05l-366.19 0c-8.66,0 -19,7.42 -22.44,15.25l-73.77 168.06 -0.03 -0.01c-2.05,4.68 -1.46,7.8 4.07,7.8l366.2 0c8.66,0 18.99,-7.43 22.43,-15.26l73.77 -168.06c0.07,0.03 4.09,-7.78 -4.04,-7.78z"/></g></svg> 
    <span class="" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Log-Activity')}}</span>
</a>
<div id="userLog" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushReport">
    <div class="child-tree">
        <div class="accordion-body sub_box">
            <a type="button" class="nav-link underline nav_space side-bar-link load-page {{ Request::routeIs('user.details') ? 'active' : '' }}" data-url="/application/user-log/user-log-activity-{slug}/log-dashboard" data-bs-toggle="tooltip" data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>' >
                <i class="fa-solid fa-minus" style="color:#fff;"></i>{{__('translate.User Log Activity')}}
            </a>
        </div>
    </div>
</div>