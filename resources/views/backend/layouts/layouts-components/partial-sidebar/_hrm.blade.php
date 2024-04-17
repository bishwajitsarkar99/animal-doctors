<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item {{setting('hrm_visual')}}">
        <button class="accordion-button collapsed hm_button" data-bs-toggle="collapse" data-bs-target="#flush-collapse5" aria-expanded="false" aria-controls="flush-collapse5">
            <span class="prod_font">
                <i class="fa-solid fa-down-long fa-beat" data-bs-toggle="tooltip" data-bs-placement="right" title="Open Prodcut Menu"></i>
            </span>
            <a class="nav-link collapsed sals_menu hrm_btn" id="navbarDropdown" data-bs-toggle="collapse" data-bs-target="#hrm_" aria-expanded="false" aria-controls="collapsePages">
                <span class="prod_label" id="hrm_id" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <span class="{{setting('hrm_visual')}}">{{__('translate.HRM')}}</span>
                </span>
                <div class="sb-sidenav-collapse-arrow ms-1">▼</div>
            </a>
        </button>
        <div id="flush-collapse5" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body sub_box">

                <!-- ================== Employee ======================= -->
                <span class="lock ps-2 pe-2" id="hrm_lock">{{__('translate.Lock')}}</span><span class="unlock ps-1 pe-1" id="hrm_unlock">{{__('translate.Unlock')}}</span><br>
                @include('backend.layouts.layouts-components.partial-submenu-hrm._hrm-submenu')
            </div>
        </div>
    </div>
</div>