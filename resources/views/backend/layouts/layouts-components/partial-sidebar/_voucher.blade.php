<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item {{setting('vaoucher_title_display')}}">
        <button class="accordion-button collapsed voau_button" data-bs-toggle="collapse" data-bs-target="#flush-collapse3" aria-expanded="false" aria-controls="flush-collapse3">
            <!-- <i class="fa-solid fa-plus" style="color:white;" id="plus_vaoucher"></i>
            <i class="fa-solid fa-minus" style="color:white;" id="minus_vaoucher" hidden></i> -->
            <a class="nav-link collapsed sals_menu vaoucher_btn" id="navbarDropdown" data-bs-toggle="collapse" data-bs-target="#voucher_" aria-expanded="false" aria-controls="collapsePages">
                <span class="prod_label" id="Voucher_id" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <span class="{{setting('vaoucher_title_display')}}">{{__('translate.Vaoucher')}}</span>
                    <span class="lock" id="voch_lock">{{__('translate.Lock')}}</span>
                    <span class="unlock" id="voch_unlock" hidden>{{__('translate.Unlock')}}</span>
                </span>
            </a>
            <div class="sb-sidenav-accordion-collapse-arrow ms-auto icon-size">▼</div>
        </button>
        <div id="flush-collapse3" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
            <div class="tree">
                <div class="accordion-body sub_box">
                    <!-- ================== Voucher ======================= -->
                    @include('backend.layouts.layouts-components.partial-submenu-voucher._voucher-submenu')
                </div>
            </div>
        </div>
    </div>
</div>