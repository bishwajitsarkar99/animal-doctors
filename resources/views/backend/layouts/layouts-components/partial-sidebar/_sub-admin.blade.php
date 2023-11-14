<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#Auth" aria-expanded="false" aria-controls="Auth">
            <span class="prod_font">
                <i class="fa-solid fa-down-long fa-beat" data-bs-toggle="tooltip" data-bs-placement="right" title="Open Prodcut Menu"></i>
            </span>
            <a class="nav-link collapsed sals_menu" id="navbarDropdown" data-bs-toggle="collapse" data-bs-target="#auth_" aria-expanded="false" aria-controls="collapsePages">
                <span class="prod_label" id="auth_id" data-bs-toggle="tooltip" data-bs-placement="right" title="click">Auth</span>
                <div class="sb-sidenav-collapse-arrow ms-4"><i class="fa-solid fa-toggle-on ps-1"></i></div>

            </a>
        </button>
        <div id="Auth" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body sub_box">

                <!-- ================== Authentication ======================= -->
                <span class="lock ps-2 pe-2" id="auth_lock">Lock</span><span class="unlock ps-1 pe-1" id="auth_unlock">Unlock</span><br>
                @include('backend.layouts.layouts-components.partial-submenu-subadmin._sub-admin_auth-submenu')
            </div>
        </div>
    </div>
</div>