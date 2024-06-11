<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item {{setting('sales_title_display')}}">
        <button class="accordion-button collapsed sal_button" data-bs-toggle="collapse" data-bs-target="#flush-collapse2" aria-expanded="false" aria-controls="flush-collapse2">
            <span class="prod_font">
                <i class="fa-solid fa-down-long fa-beat" data-bs-toggle="tooltip" data-bs-placement="right" title="Open Sales Menu" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'></i>
            </span>
            <a class="nav-link collapsed sals_menu sales_btn" id="navbarDropdown" data-bs-toggle="collapse" data-bs-target="#sales_" aria-expanded="false" aria-controls="collapsePages">
                <span class="prod_label" id="Sales_id" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <span class="{{setting('sales_title_display')}}">{{__('translate.Sales')}}</span>
                </span>
                <div class="sb-sidenav-collapse-arrow ms-1">▼</div>
            </a>
        </button>
        <div id="flush-collapse2" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body sub_box">

                <!-- ================== Sales ======================= -->
                <span class="lock ps-2 pe-2" id="sales_lock">{{__('translate.Lock')}}</span><span class="unlock ps-1 pe-1" id="sales_unlock">{{__('translate.Unlock')}}</span><br>
                @include('backend.layouts.layouts-components.partial-submenu-sales._sales-submenu')
            </div>
        </div>
    </div>
</div>