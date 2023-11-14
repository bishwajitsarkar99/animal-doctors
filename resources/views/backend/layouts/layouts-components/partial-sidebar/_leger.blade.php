<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item {{setting('lager_display')}}">
        <button class="accordion-button collapsed lag_button" data-bs-toggle="collapse" data-bs-target="#flush-collapse1" aria-expanded="false" aria-controls="flush-collapse">
            <span class="prod_font">
                <i class="fa-solid fa-down-long fa-beat" data-bs-toggle="tooltip" data-bs-placement="right" title="Open Prodcut Menu"></i>
            </span>
            <a class="nav-link collapsed sals_menu lager_btn" id="navbarDropdown" data-bs-toggle="collapse" data-bs-target="#leger_id" aria-expanded="false" aria-controls="collapsePages">
                <span class="prod_label" id="leger_" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}">
                    <span class="{{setting('lager_display')}}">{{__('translate.Lager')}}</span>
                </span>
                <div class="sb-sidenav-collapse-arrow ms-1">▼</div>
            </a>
        </button>
        <div id="flush-collapse1" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body sub_box">
                <span class="lock ps-2 pe-2" id="a_lock">{{__('translate.Lock')}}</span><span class="unlock ps-1 pe-1" id="a_unlock">{{__('translate.Unlock')}}</span><br>
                @include('backend.layouts.layouts-components.partial-submenu-leger._leger-submenu')
            </div>
        </div>
    </div>
</div>