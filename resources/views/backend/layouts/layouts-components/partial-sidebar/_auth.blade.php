<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item {{setting('auth_visual')}}">
        <button class="accordion-button collapsed ath_button" data-bs-toggle="collapse" data-bs-target="#Auth" aria-expanded="false" aria-controls="Auth">
            <a class="nav-link collapsed sals_menu auth_btn {{ Request::is('company/branch-activity/branch-*/admin-access/index') || Request::is('company/branch-activity/branch-*/create/index') || Request::is('company/branch-activity/branch-*/user-access/index') || Request::is('application/user-log/user-log-activity-*/log-dashboard') || Request::is('super-admin/auth-pages/auth-page-permission') || Request::is('super-admin/user-accounts/account-holder/account-history') || Request::is('super-admin/register-emails/email-verification') || Request::is('super-admin/roles/role-index') || Request::is('super-admin/roles/role-permission') || Request::is('super-admin/roles/manage-role') || Request::is('super-admin/users/user-authorization') || Request::is('application/modules/module-category-index') || Request::is('application/modules/module-name-index') || Request::is('application/modules/module-index') ? 'folder-active' : '' }}" id="navbarDropdown" data-bs-toggle="collapse" data-bs-target="#auth_" aria-expanded="false" aria-controls="collapsePages">
                <span class="auth__btn" id="auth_id" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <span class="{{setting('auth_visual')}} {{ Request::is('company/branch-activity/branch-*/admin-access/index') || Request::is('company/branch-activity/branch-*/create/index') || Request::is('company/branch-activity/branch-*/user-access/index') || Request::is('application/user-log/user-log-activity-*/log-dashboard') || Request::is('super-admin/auth-pages/auth-page-permission') || Request::is('super-admin/user-accounts/account-holder/account-history') || Request::is('super-admin/register-emails/email-verification') || Request::is('super-admin/roles/role-index') || Request::is('super-admin/roles/role-permission') || Request::is('super-admin/roles/manage-role') || Request::is('super-admin/users/user-authorization') || Request::is('application/modules/module-category-index') || Request::is('application/modules/module-name-index') || Request::is('application/modules/module-index') ? 'folder-active' : '' }}">{{__('translate.Auth')}}</span>
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