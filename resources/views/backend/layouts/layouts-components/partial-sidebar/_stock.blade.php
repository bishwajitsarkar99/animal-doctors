@if(auth()->user()->role==1)
<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item {{setting('stock_head_title_display')}}">
        <button class="accordion-button collapsed stck_button" data-bs-toggle="collapse" data-bs-target="#flush-collapse" aria-expanded="false" aria-controls="flush-collapse">
            <i class="fa-solid fa-plus" style="color:white;" id="plus_stock"></i>
            <i class="fa-solid fa-minus" style="color:white;" id="minus_stock" hidden></i>
            <a class="nav-link collapsed sals_menu stock_btn" id="navbarDropdown" data-bs-toggle="collapse" data-bs-target="#stock_" aria-expanded="false" aria-controls="collapsePages">
                <span class="prod_label" id="stock_id" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    {{ __('translate.Stock')}}
                    <span class="lock" id="lock_stock">{{__('translate.Lock')}}</span>
                    <span class="unlock" id="unlock_stock" hidden>{{__('translate.Unlock')}}</span>
                    <div class="sb-sidenav-collapse-arrow">▼</div>
                </span>
            </a>
        </button>
        <div id="flush-collapse" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
            <div class="tree">
                <div class="accordion-body sub_box">
                    @include('backend.layouts.layouts-components.partial-submenu-stock._stock-submenu')
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@if(auth()->user()->role==2)
<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
        <button class="accordion-button collapsed inv_btn" data-bs-toggle="collapse" data-bs-target="#flush-collapse" aria-expanded="false" aria-controls="flush-collapse">
            <i class="fa-solid fa-plus" style="color:#007effc4;" id="plus" hidden></i>
            <i class="fa-solid fa-minus" style="color:#007effc4;" id="minus" hidden></i>
            <a class="nav-link collapsed sals_menu inventoy_btn" id="navbarDropdown" data-bs-toggle="collapse" data-bs-target="#stock_" aria-expanded="false" aria-controls="collapsePages">
                <span class="prod_label" id="stock_id" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}">{{__('translate.Stock')}}</span>
                <div class="sb-sidenav-collapse-arrow ms-2">▼</div>
                <span class="lock ps-2 pe-2" id="s_lock">{{__('translate.Lock')}}</span>
                <span class="unlock ps-1 pe-1" id="s_unlock">{{__('translate.Unlock')}}</span>
            </a>
        </button>
        <div id="flush-collapse" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body sub_box">
                @include('backend.layouts.layouts-components.partial-submenu-stock._stock-submenu')
            </div>
        </div>
    </div>
</div>
@endif

@if(auth()->user()->role==3)
<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
        <button class="accordion-button collapsed inv_btn" data-bs-toggle="collapse" data-bs-target="#flush-collapse" aria-expanded="false" aria-controls="flush-collapse">
            <i class="fa-solid fa-plus" style="color:#007effc4;" id="plus" hidden></i>
            <i class="fa-solid fa-minus" style="color:#007effc4;" id="minus" hidden></i>
            <a class="nav-link collapsed sals_menu inventoy_btn" id="navbarDropdown" data-bs-toggle="collapse" data-bs-target="#stock_" aria-expanded="false" aria-controls="collapsePages">
                <span class="prod_label" id="stock_id" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}">{{__('translate.Stock')}}</span>
                <div class="sb-sidenav-collapse-arrow ms-2">▼</div>
                <span class="lock ps-2 pe-2" id="s_lock">{{__('translate.Lock')}}</span>
                <span class="unlock ps-1 pe-1" id="s_unlock">{{__('translate.Unlock')}}</span>
            </a>
        </button>
        <div id="flush-collapse" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body sub_box">
                @include('backend.layouts.layouts-components.partial-submenu-stock._stock-submenu')
            </div>
        </div>
    </div>
</div>
@endif
@if(auth()->user()->role==5)
<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item {{setting('stock_head_title_display')}}">
        <button class="accordion-button collapsed stck_button" data-bs-toggle="collapse" data-bs-target="#flush-collapse" aria-expanded="false" aria-controls="flush-collapse">
            <i class="fa-solid fa-plus" style="color:#007effc4;" id="plus" hidden></i>
            <i class="fa-solid fa-minus" style="color:#007effc4;" id="minus" hidden></i>
            <a class="nav-link collapsed sals_menu stock_btn" id="navbarDropdown" data-bs-toggle="collapse" data-bs-target="#stock_" aria-expanded="false" aria-controls="collapsePages">
                <span class="prod_label" id="stock_id" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{ __('translate.Stock')}}</span>
                <div class="sb-sidenav-collapse-arrow ms-1">▼</div>
                <span class="lock ps-2 pe-2" id="s_lock">{{__('translate.Lock')}}</span>
                <span class="unlock ps-1 pe-1" id="s_unlock">{{__('translate.Unlock')}}</span>
            </a>
        </button>
        <div id="flush-collapse" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body sub_box">
                @include('backend.layouts.layouts-components.partial-submenu-stock._stock-submenu')
            </div>
        </div>
    </div>
</div>
@endif