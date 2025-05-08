<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item {{setting('auth_visual')}}">
        <button class="accordion-button collapsed ath_button" data-bs-toggle="collapse" data-bs-target="#Auth" aria-expanded="false" aria-controls="Auth">
            <a class="nav-link collapsed sals_menu auth_btn ms-1 {{ Request::is('company/branch-admin-access') || Request::is('company/branch-activity') || Request::is('company/branch-user-access') || Request::is('super-admin/show-user-details') || Request::is('super-admin/auth-page') || Request::is('account-holders') || Request::is('super-admin/email-verification') || Request::is('super-admin/role-index') || Request::is('super-admin/role-permission-index') || Request::is('super-admin/manage-role') || Request::is('super-admin/users') || Request::is('application/module-category-index') || Request::is('application/module-name-index') || Request::is('application/module-index') ? 'folder-active' : '' }}" id="navbarDropdown" data-bs-toggle="collapse" data-bs-target="#auth_" aria-expanded="false" aria-controls="collapsePages">
                <span class="" id="auth_id" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <span class="{{setting('auth_visual')}} {{ Request::is('company/branch-admin-access') || Request::is('company/branch-activity') || Request::is('company/branch-user-access') || Request::is('super-admin/show-user-details') || Request::is('super-admin/auth-page') || Request::is('account-holders') || Request::is('super-admin/email-verification') || Request::is('super-admin/role-index') || Request::is('super-admin/role-permission-index') || Request::is('super-admin/manage-role') || Request::is('super-admin/users') || Request::is('application/module-category-index') || Request::is('application/module-name-index') || Request::is('application/module-index') ? 'folder-active' : '' }}">{{__('translate.Auth')}}</span>
                    <span class="lock" id="auth_lock">{{__('translate.Lock')}}</span>
                    <span class="unlock" id="auth_unlock" hidden>{{__('translate.Unlock')}}</span>
                </span>
            </a>
            <div class="sb-sidenav-accordion-collapse-arrow ms-auto icon-size">▼</div>
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