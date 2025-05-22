@if(auth()->user()->role==1)
<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item {{setting('stock_head_title_display')}}">
        <button class="accordion-button collapsed stck_button" data-bs-toggle="collapse" data-bs-target="#flush-collapse" aria-expanded="false" aria-controls="flush-collapse">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-git-commit rotate-icon" >
                <circle cx="12" cy="12" r="4" />
                <line x1="1.05" y1="12" x2="7" y2="12" />
                <line x1="17.01" y1="12" x2="22.96" y2="12" />
            </svg>
            <span class="prod_label text-animation {{Request::is('report/inventory-details-record') || 
                Request::is('super-admin/inventory-authorize') || 
                Request::is('company-supplier/suppliers/index') || 
                Request::is('company-supplier/suppliers/access-permission') ? 'folder-active' : '' }}">
                {{ __('translate.Stock')}}
            </span>
            <div class="sb-sidenav-accordion-collapse-arrow ms-auto icon-size">▼</div>
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
    <div class="accordion-item {{setting('stock_head_title_display')}}">
        <button class="accordion-button collapsed stck_button" data-bs-toggle="collapse" data-bs-target="#flush-collapse" aria-expanded="false" aria-controls="flush-collapse">
            <!-- <i class="fa-solid fa-plus" style="color:white;" id="plus_stock"></i>
            <i class="fa-solid fa-minus" style="color:white;" id="minus_stock" hidden></i> -->
            <a class="nav-link collapsed sals_menu stock_btn 
                {{Request::is('report/inventory-details-record') || 
                Request::is('super-admin/inventory-authorize') || 
                Request::is('company-supplier/suppliers/index') || 
                Request::is('company-supplier/suppliers/access-permission') ? 'folder-active' : '' }}" id="navbarDropdown" data-bs-toggle="collapse" data-bs-target="#stock_" aria-expanded="false" aria-controls="collapsePages">
                <span class="prod_label" id="stock_id" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    {{ __('translate.Stock')}}
                    <span class="lock" id="lock_stock">{{__('translate.Lock')}}</span>
                    <span class="unlock" id="unlock_stock" hidden>{{__('translate.Unlock')}}</span>
                </span>
            </a>
            <div class="sb-sidenav-accordion-collapse-arrow ms-auto icon-size">▼</div>
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

@if(auth()->user()->role==3)
<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item {{setting('stock_head_title_display')}}">
        <button class="accordion-button collapsed stck_button" data-bs-toggle="collapse" data-bs-target="#flush-collapse" aria-expanded="false" aria-controls="flush-collapse">
            <!-- <i class="fa-solid fa-plus" style="color:white;" id="plus_stock"></i>
            <i class="fa-solid fa-minus" style="color:white;" id="minus_stock" hidden></i> -->
            <a class="nav-link collapsed sals_menu stock_btn 
                {{Request::is('report/inventory-details-record') || 
                Request::is('super-admin/inventory-authorize') || 
                Request::is('company-supplier/suppliers/index') || 
                Request::is('company-supplier/suppliers/access-permission') ? 'folder-active' : '' }}" id="navbarDropdown" data-bs-toggle="collapse" data-bs-target="#stock_" aria-expanded="false" aria-controls="collapsePages">
                <span class="prod_label" id="stock_id" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    {{ __('translate.Stock')}}
                    <span class="lock" id="lock_stock">{{__('translate.Lock')}}</span>
                    <span class="unlock" id="unlock_stock" hidden>{{__('translate.Unlock')}}</span>
                </span>
            </a>
            <div class="sb-sidenav-accordion-collapse-arrow ms-auto icon-size">▼</div>
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
@if(auth()->user()->role==5)
<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item {{setting('stock_head_title_display')}}">
        <button class="accordion-button collapsed stck_button" data-bs-toggle="collapse" data-bs-target="#flush-collapse" aria-expanded="false" aria-controls="flush-collapse">
            <!-- <i class="fa-solid fa-plus" style="color:white;" id="plus_stock"></i>
            <i class="fa-solid fa-minus" style="color:white;" id="minus_stock" hidden></i> -->
            <a class="nav-link collapsed sals_menu stock_btn 
                {{Request::is('report/inventory-details-record') || 
                Request::is('super-admin/inventory-authorize') || 
                Request::is('company-supplier/suppliers/index') || 
                Request::is('company-supplier/suppliers/access-permission') ? 'folder-active' : '' }}" id="navbarDropdown" data-bs-toggle="collapse" data-bs-target="#stock_" aria-expanded="false" aria-controls="collapsePages">
                <span class="prod_label" id="stock_id" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    {{ __('translate.Stock')}}
                    <span class="lock" id="lock_stock">{{__('translate.Lock')}}</span>
                    <span class="unlock" id="unlock_stock" hidden>{{__('translate.Unlock')}}</span>
                </span>
            </a>
            <div class="sb-sidenav-accordion-collapse-arrow ms-auto icon-size">▼</div>
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