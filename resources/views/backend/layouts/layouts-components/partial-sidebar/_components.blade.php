<span class="{{setting('components_moduel_display')}}">
    <a class="accordion-button nav-link collapsed lay_nav font_size com_button {{setting('components_moduel_display')}}" data-bs-toggle="collapse" data-bs-target="#components" aria-expanded="false" aria-controls="components">
        <span class="collapsed">
            <!-- <i class="fa-solid fa-plus" style="color:#ffff;" id="plus_component_link"></i>
            <i class="fa-solid fa-minus" style="color:#ffff;" id="minus_component_link" hidden></i> -->
        </span>
        <div class="sb-nav-link-icon {{setting('components_moduel_display')}}">
            <!-- <i class="fa-solid fa-folder-open fa-beat" style="font-size: 14px;color:white;"></i> -->
        </div>
        <span class="layout_label {{setting('components_moduel_display')}}
        {{Request::is('super-admin/forntend-footer-information') || Request::is('super-admin/forntend-footer-newletter') ? 'folder-active' : '' }}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Fornt-End')}}</span>
        <div class="sb-sidenav-collapse-arrow {{setting('components_moduel_display')}}">▼</div>
    </a>
    
    <div id="components" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
        <div class="child-white-tree">
            <div class="accordion-body sub_box">
                <a class="compontent-btn nav-link collapsed sals_menu compont Components_btn" id="navbarDropdown" data-bs-toggle="collapse" data-bs-target="#components_" aria-expanded="false" aria-controls="collapsePages">
                    <span class="prod_label" id="components_id" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                        <span class="lock ps-2 pe-2 ms-1" id="compont_lock">Lock</span>
                        <span class="unlock ps-1 pe-1 ms-1" id="compont_unlock" hidden>Unlock</span>
                        <div class="sb-sidenav-collapse-arrow ms-1">▼</div>
                    </span>
                </a>
                @include('backend.layouts.layouts-components.partial-submenu-components._components-submenu')
            </div>
        </div>
    </div>    
</span>