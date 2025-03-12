<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item {{setting('sales_title_display')}}">
        <button class="accordion-button collapsed sal_button" data-bs-toggle="collapse" data-bs-target="#flush-collapse2" aria-expanded="false" aria-controls="flush-collapse2">
            <!-- <i class="fa-solid fa-plus" style="color:white;" id="plus_sales"></i>
            <i class="fa-solid fa-minus" style="color:white;" id="minus_sales" hidden></i> -->
            <a class="nav-link collapsed sals_menu sales_btn" id="navbarDropdown" data-bs-toggle="collapse" data-bs-target="#sales_" aria-expanded="false" aria-controls="collapsePages">
                <span class="prod_label" id="Sales_id" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <span class="{{setting('sales_title_display')}}">{{__('translate.Sales')}}</span>
                    <span class="lock" id="sales_lock">{{__('translate.Lock')}}</span>
                    <span class="unlock" id="sales_unlock" hidden>{{__('translate.Unlock')}}</span>
                </span>
            </a>
            <div class="sb-sidenav-accordion-collapse-arrow ms-auto icon-size">▼</div>
        </button>
        <div id="flush-collapse2" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
            <div class="tree">
                <div class="accordion-body sub_box">
                    <!-- ================== Sales ======================= -->
                    @include('backend.layouts.layouts-components.partial-submenu-sales._sales-submenu')
                </div>
            </div>
        </div>
    </div>
</div>