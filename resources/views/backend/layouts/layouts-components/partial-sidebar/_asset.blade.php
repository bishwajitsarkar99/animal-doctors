<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item {{setting('asset_title_display')}}">
        <button class="accordion-button collapsed ass_button" data-bs-toggle="collapse" data-bs-target="#asset_documentioin" aria-expanded="false" aria-controls="asset_documentioin">
            <!-- <i class="fa-solid fa-plus" style="color:white;" id="plus_asset"></i>
            <i class="fa-solid fa-minus" style="color:white;" id="minus_asset" hidden></i> -->
            <a class="nav-link collapsed sals_menu asset_btn" id="navbarDropdown" data-bs-toggle="collapse" data-bs-target="#asset_" aria-expanded="false" aria-controls="collapsePages">
                <span class="prod_label" id="Asset_id" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <span class="{{setting('asset_title_display')}}">{{__('translate.Asset')}}</span>
                    <span class="lock" id="ast_lock">{{__('translate.Lock')}}</span>
                    <span class="unlock" id="ast_unlock" hidden>{{__('translate.Unlock')}}</span>
                </span>
            </a>
            <div class="sb-sidenav-collapse-arrow ms-auto icon-size">▼</div>
        </button>
        <div id="asset_documentioin" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
            <div class="tree">
                <div class="accordion-body sub_box">
                    <!-- ================== Asset Documention ======================= -->
                    @include('backend.layouts.layouts-components.partial-submenu-asset._asset-submenu')
                </div>
            </div>
        </div>
    </div>
</div>