<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item {{setting('vaoucher_title_display')}}">
        <button class="accordion-button collapsed voau_button" data-bs-toggle="collapse" data-bs-target="#flush-collapse3" aria-expanded="false" aria-controls="flush-collapse3">
            <span class="prod_font">
                <i class="fa-solid fa-down-long fa-beat" data-bs-toggle="tooltip" data-bs-placement="right" title="Open Voucher Menu"data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'></i>
            </span>
            <a class="nav-link collapsed sals_menu vaoucher_btn" id="navbarDropdown" data-bs-toggle="collapse" data-bs-target="#voucher_" aria-expanded="false" aria-controls="collapsePages">
                <span class="prod_label" id="Voucher_id" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <span class="{{setting('vaoucher_title_display')}}">{{__('translate.Vaoucher')}}</span>
                </span>
                <div class="sb-sidenav-collapse-arrow ms-1">▼</div>
            </a>
        </button>
        <div id="flush-collapse3" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body sub_box">

                <!-- ================== Voucher ======================= -->
                <span class="lock ps-2 pe-2" id="voch_lock">{{__('translate.Lock')}}</span><span class="unlock ps-1 pe-1" id="voch_unlock">{{__('translate.Unlock')}}</span><br>
                @include('backend.layouts.layouts-components.partial-submenu-voucher._voucher-submenu')
            </div>
        </div>
    </div>
</div>