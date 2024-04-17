<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
        <button class="accordion-button collapsed post" data-bs-toggle="collapse" data-bs-target="#Auth" aria-expanded="false" aria-controls="Auth">
            <span class="prod_font">
                <i class="fa-solid fa-down-long fa-beat" data-bs-toggle="tooltip" data-bs-placement="right" title="Open Prodcut Menu"></i>
            </span>
            <a class="nav-link collapsed sals_menu post_btn" id="navbarDropdown" data-bs-toggle="collapse" data-bs-target="#auth_" aria-expanded="false" aria-controls="collapsePages">
                <span class="prod_label" id="auth_id" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Post')}}</span>
                <div class="sb-sidenav-collapse-arrow ms-2">▼</div>

            </a>
        </button>
        <div id="Auth" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body sub_box">

                <!-- ================== Authentication ======================= -->
                <span class="lock ps-2 pe-2" id="auth_lock">{{__('translate.Lock')}}</span><span class="unlock ps-1 pe-1" id="auth_unlock">{{__('translate.Unlock')}}</span><br>
                @include('backend.layouts.layouts-components.partial-submenu-admin._admin_auth-submenu')
            </div>
        </div>
    </div>
</div>