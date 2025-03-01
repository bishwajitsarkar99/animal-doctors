<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item {{setting('auth_visual')}}">
        <button class="accordion-button collapsed ath_button" data-bs-toggle="collapse" data-bs-target="#Auth" aria-expanded="false" aria-controls="Auth">
            <i class="fa-solid fa-plus" style="color:white;" id="plus_auth"></i>
            <i class="fa-solid fa-minus" style="color:white;" id="minus_auth" hidden></i>
            <a class="nav-link collapsed sals_menu auth_btn {{ Request::is('company/branch-admin-access') || Request::is('company/branch-activity') || Request::is('company/branch-user-access') || Request::is('super-admin/show-user-details') || Request::is('super-admin/auth-page') || Request::is('account-holders') || Request::is('super-admin/email-verification') || Request::is('super-admin/role-index') || Request::is('super-admin/role-permission-index') || Request::is('super-admin/manage-role') || Request::is('super-admin/users') || Request::is('application/module-category-index') || Request::is('application/module-name-index') || Request::is('application/module-index') ? 'folder-active' : '' }}" id="navbarDropdown" data-bs-toggle="collapse" data-bs-target="#auth_" aria-expanded="false" aria-controls="collapsePages">
                <span class="prod_label" id="auth_id" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <span class="{{setting('auth_visual')}} {{ Request::is('company/branch-admin-access') || Request::is('company/branch-activity') || Request::is('company/branch-user-access') || Request::is('super-admin/show-user-details') || Request::is('super-admin/auth-page') || Request::is('account-holders') || Request::is('super-admin/email-verification') || Request::is('super-admin/role-index') || Request::is('super-admin/role-permission-index') || Request::is('super-admin/manage-role') || Request::is('super-admin/users') || Request::is('application/module-category-index') || Request::is('application/module-name-index') || Request::is('application/module-index') ? 'folder-active' : '' }}">{{__('translate.Auth')}}</span>
                </span>
                <span class="lock ps-2 pe-2 ms-1" id="auth_lock">{{__('translate.Lock')}}</span>
                <span class="unlock ps-1 pe-1 ms-1" id="auth_unlock" hidden>{{__('translate.Unlock')}}</span>
                <div class="sb-sidenav-collapse-arrow ms-1">▼</div>
            </a>
        </button>
        <div id="Auth" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
            <div class="tree">
                <div class="accordion-body sub_box">
                    <!-- ================== Authentication ======================= -->
                    @include('backend.layouts.layouts-components.partial-submenu-auth._auth-submenu')
                </div>
            </div>
        </div>
    </div>
</div>