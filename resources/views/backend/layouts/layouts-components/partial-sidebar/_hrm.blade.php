<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item {{setting('hrm_visual')}}">
        <button class="accordion-button collapsed hm_button" data-bs-toggle="collapse" data-bs-target="#flush-collapse5" aria-expanded="false" aria-controls="flush-collapse5">
            <i class="fa-solid fa-plus" style="color:#007effc4;" id="plus_hrm"></i>
            <i class="fa-solid fa-minus" style="color:#007effc4;" id="minus_hrm" hidden></i>
            <a class="nav-link collapsed sals_menu hrm_btn" id="navbarDropdown" data-bs-toggle="collapse" data-bs-target="#hrm_" aria-expanded="false" aria-controls="collapsePages">
                <span class="prod_label" id="hrm_id" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <span class="{{setting('hrm_visual')}}">{{__('translate.HRM')}}</span>
                </span>
                <div class="sb-sidenav-collapse-arrow ms-1">▼</div>
                <span class="lock ps-2 pe-2 ms-1" id="hrm_lock">{{__('translate.Lock')}}</span>
                <span class="unlock ps-1 pe-1 ms-1" id="hrm_unlock" hidden>{{__('translate.Unlock')}}</span>
            </a>
        </button>
        <div id="flush-collapse5" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
            <div class="tree">
                <div class="accordion-body sub_box">
                    <!-- ================== Employee ======================= -->
                    @include('backend.layouts.layouts-components.partial-submenu-hrm._hrm-submenu')
                </div>
            </div>
        </div>
    </div>
</div>