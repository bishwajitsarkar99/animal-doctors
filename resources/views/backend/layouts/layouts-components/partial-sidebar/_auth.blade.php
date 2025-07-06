<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item {{setting('auth_visual')}}">
        <button class="accordion-button collapsed ath_button" data-bs-toggle="collapse" data-bs-target="#Auth" aria-expanded="false" aria-controls="Auth">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-git-commit rotate-icon" >
                <circle cx="12" cy="12" r="4" />
                <line x1="1.05" y1="12" x2="7" y2="12" />
                <line x1="17.01" y1="12" x2="22.96" y2="12" />
            </svg>
            <span class="auth__btn text-animation">
                <span class="{{setting('auth_visual')}} {{ Request::is('company/branch-activity/branch-*/admin-access/index') || Request::is('company/branch-activity/branch-*/index') || Request::is('company/branch-activity/branch-*/user-access/index') || Request::is('application/user-log/user-log-activity-*/log-dashboard') || Request::is('super-admin/auth-pages/auth-page-permission') || Request::is('super-admin/user-accounts/account-holder/account-history') || Request::is('super-admin/register-emails/email-verification') || Request::is('super-admin/roles/role-index') || Request::is('super-admin/roles/role-permission') || Request::is('super-admin/roles/manage-role') || Request::is('super-admin/users/user-authorization') || Request::is('application/modules/module-category-index') || Request::is('application/modules/module-name-index') || Request::is('application/modules/module-index') ? 'folder-active' : '' }}">{{__('translate.Auth')}}</span>
            </span>
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