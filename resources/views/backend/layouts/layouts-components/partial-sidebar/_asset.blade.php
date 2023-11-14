<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item {{setting('asset_title_display')}}">
        <button class="accordion-button collapsed ass_button" data-bs-toggle="collapse" data-bs-target="#asset_documentioin" aria-expanded="false" aria-controls="asset_documentioin">
            <span class="prod_font">
                <i class="fa-solid fa-down-long fa-beat" data-bs-toggle="tooltip" data-bs-placement="right" title="Open Prodcut Menu"></i>
            </span>
            <a class="nav-link collapsed sals_menu asset_btn" id="navbarDropdown" data-bs-toggle="collapse" data-bs-target="#asset_" aria-expanded="false" aria-controls="collapsePages">
                <span class="prod_label" id="Asset_id" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}">
                    <span class="{{setting('asset_title_display')}}">{{__('translate.Asset')}}</span>
                </span>
                <div class="sb-sidenav-collapse-arrow ms-1">▼</div>
            </a>
        </button>
        <div id="asset_documentioin" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body sub_box">

                <!-- ================== Asset Documention ======================= -->
                <span class="lock ps-2 pe-2" id="ast_lock">{{__('translate.Lock')}}</span><span class="unlock ps-1 pe-1" id="ast_unlock">{{__('translate.Unlock')}}</span><br>
                @include('backend.layouts.layouts-components.partial-submenu-asset._asset-submenu')
            </div>
        </div>
    </div>
</div>