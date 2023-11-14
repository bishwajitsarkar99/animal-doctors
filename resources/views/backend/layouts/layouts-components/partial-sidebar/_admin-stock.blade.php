@if(auth()->user()->role ==3)
<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
        <button class="accordion-button collapsed adm_stock" data-bs-toggle="collapse" data-bs-target="#flush-collapse-stock" aria-expanded="false" aria-controls="flush-collapse">
            <span class="prod_font">
                <i class="fa-solid fa-down-long fa-beat" data-bs-toggle="tooltip" data-bs-placement="right" title="Open Prodcut Menu"></i>
            </span>
            <a class="nav-link collapsed sals_menu adminStock_btn" id="navbarDropdown" data-bs-toggle="collapse" data-bs-target="#adminStock" aria-expanded="false" aria-controls="collapsePages">
                <span class="prod_label" id="admin_stock" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}">{{__('translate.Stock')}}</span>
                <div class="sb-sidenav-collapse-arrow ms-2">▼</div>

            </a>
        </button>
        <div id="flush-collapse-stock" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body sub_box">
                <span class="lock ps-2 pe-2" id="admin_stock_lock">{{__('translate.Lock')}}</span><span class="unlock ps-1 pe-1" id="admin_stock_unlock">{{__('translate.Unlock')}}</span><br>
                @include('backend.layouts.layouts-components.partial-submenu-stock.partial-submenu-admin-stock._admin-stock-part')
            </div>
        </div>
    </div>
</div>
@endif