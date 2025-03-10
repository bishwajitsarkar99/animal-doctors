<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item {{setting('lager_display')}}">
        <button class="accordion-button collapsed lag_button" data-bs-toggle="collapse" data-bs-target="#flush-collapse1" aria-expanded="false" aria-controls="flush-collapse">
            <!-- <i class="fa-solid fa-plus" style="color:white;" id="plus_leger"></i>
            <i class="fa-solid fa-minus" style="color:white;" id="minus_leger" hidden></i> -->
            <a class="nav-link collapsed sals_menu lager_btn" id="navbarDropdown" data-bs-toggle="collapse" data-bs-target="#leger_id" aria-expanded="false" aria-controls="collapsePages">
                <span class="prod_label" id="leger_" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <span class="{{setting('lager_display')}}">{{__('translate.Lager')}}</span>
                    <span class="lock" id="lock_leger">{{__('translate.Lock')}}</span>
                    <span class="unlock" id="unlock_leger" hidden>{{__('translate.Unlock')}}</span>
                </span>
            </a>
            <div class="sb-sidenav-collapse-arrow ms-auto icon-size">▼</div>
        </button>
        <div id="flush-collapse1" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
            <div class="tree">
                <div class="accordion-body sub_box">
                    @include('backend.layouts.layouts-components.partial-submenu-leger._leger-submenu')
                </div>
            </div>
        </div>
    </div>
</div>