<span class="{{setting('components_moduel_display')}}">
    <a class="nav-link collapsed lay_nav font_size com_button {{setting('components_moduel_display')}}" data-bs-toggle="collapse" data-bs-target="#components" aria-expanded="false" aria-controls="components">
        <div class="sb-nav-link-icon {{setting('components_moduel_display')}}"><i class="fa-solid fa-folder-open fa-beat" style="font-size: 12px;color:darkgoldenrod;"></i></div>
        <span class="{{setting('components_moduel_display')}}">{{setting('components_moduel_title')}}</span>
        <div class="sb-sidenav-collapse-arrow {{setting('components_moduel_display')}}">▼</div>
    </a>
    
    <div id="components" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body sub_box">
            <a class="nav-link collapsed sals_menu compont Components_btn" id="navbarDropdown" data-bs-toggle="collapse" data-bs-target="#components_" aria-expanded="false" aria-controls="collapsePages">
                <span class="prod_label" id="components_id" data-bs-toggle="tooltip" data-bs-placement="right" title="click">Fornt-End</span>
                <div class="sb-sidenav-collapse-arrow ms-1">▼</div>
            </a>
            <span class="lock ps-2 pe-2" id="compont_lock">Lock</span><span class="unlock ps-1 pe-1" id="compont_unlock">Unlock</span><br>
            @include('backend.layouts.layouts-components.partial-submenu-components._components-submenu')
        </div>
    </div>
</span>