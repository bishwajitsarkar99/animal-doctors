<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item {{setting('product_visual')}}">
        <button class="accordion-button collapsed prod_button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            <span class="prod_font">
                <i class="fa-solid fa-down-long fa-beat" data-bs-toggle="tooltip" data-bs-placement="right" title="Open Prodcut Menu"></i>
            </span>
            <a class="nav-link collapsed sals_menu product_link product_btn" id="navbarDropdown" data-bs-toggle="collapse" data-bs-target="#product" aria-expanded="false" aria-controls="collapsePages">
                <span class="prod_label" id="prodct" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}"><span class="{{setting('product_visual')}}">{{__('translate.Product')}}</span></span>
                <div class="sb-sidenav-collapse-arrow ms-1">▼</div>
            </a>
        </button>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body sub_box">
                <span class="lock ps-2 pe-2" id="lock">{{__('translate.Lock')}}</span>
                <span class="unlock ps-1 pe-1" id="unlock">{{__('translate.Unlock')}}</span><br>
                @include('backend.layouts.layouts-components.partial-submenu-product._product_submenu')
            </div>
        </div>
    </div>
</div>