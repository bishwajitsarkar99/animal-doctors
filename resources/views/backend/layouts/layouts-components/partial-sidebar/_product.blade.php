<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item {{setting('product_visual')}}">
        <button class="accordion-button collapsed prod_button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            <i class="fa-solid fa-plus" style="color:#007effc4;" id="plus"></i>
            <i class="fa-solid fa-minus" style="color:#007effc4;" id="minus" hidden></i>
            <a class="nav-link collapsed sals_menu product_link product_btn" id="navbarDropdown" data-bs-toggle="collapse" data-bs-target="#product" aria-expanded="false" aria-controls="collapsePages">
                <span class="prod_label" id="prodct" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <span class="{{setting('product_visual')}}">{{__('translate.Product')}}</span>
                </span>
                <div class="sb-sidenav-collapse-arrow ms-1">▼</div>
                <span class="lock ps-2 pe-2 ms-1" id="lock">{{__('translate.Lock')}}</span>
                <span class="unlock ps-1 pe-1 ms-1" id="unlock" hidden>{{__('translate.Unlock')}}</span>
            </a>
        </button>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="tree">
                <div class="accordion-body sub_box">
                    @include('backend.layouts.layouts-components.partial-submenu-product._product_submenu')
                </div>
            </div>
        </div>
    </div>
</div>