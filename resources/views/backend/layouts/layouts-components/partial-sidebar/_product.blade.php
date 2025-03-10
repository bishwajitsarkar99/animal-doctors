<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item {{setting('product_visual')}}">
        <button class="accordion-button collapsed prod_button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            <!-- <i class="fa-solid fa-plus" style="color:white;" id="plus"></i>
            <i class="fa-solid fa-minus" style="color:white;" id="minus" hidden></i> -->
            <a class="nav-link collapsed sals_menu product_link product_btn {{ Request::is('category') || Request::is('sub-category') || Request::is('medicine-group') || Request::is('medicine-name') || Request::is('medicine-dosage') || Request::is('units') || Request::is('origin') || Request::is('brand') || Request::is('model') || Request::is('product') ? 'folder-active' : '' }}" id="navbar_Dropdown" data-bs-toggle="collapse" data-bs-target="#product" aria-expanded="false" aria-controls="collapsePages">
                <span class="prod_label" id="prodct" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <span class="{{setting('product_visual')}} {{ Request::is('category') || Request::is('sub-category') || Request::is('medicine-group') || Request::is('medicine-name') || Request::is('medicine-dosage') || Request::is('units') || Request::is('origin') || Request::is('brand') || Request::is('model') || Request::is('product') ? 'folder-active' : '' }}">
                        {{__('translate.Product')}}
                        <span class="lock" id="lock">{{__('translate.Lock')}}</span>
                        <span class="unlock" id="unlock" hidden>{{__('translate.Unlock')}}</span>
                    </span>
                </span>
            </a>
            <div class="sb-sidenav-collapse-arrow layouts_block ms-auto icon-size" style="float:right;">▼</div>
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