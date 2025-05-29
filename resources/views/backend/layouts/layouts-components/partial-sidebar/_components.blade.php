<span class="{{setting('components_moduel_display')}}">
    <a class="accordion-button nav-link collapsed lay_nav font_size com_button {{setting('components_moduel_display')}}" data-bs-toggle="collapse" data-bs-target="#components" aria-expanded="false" aria-controls="components">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-git-commit rotate-icon" >
            <circle cx="12" cy="12" r="4" />
            <line x1="1.05" y1="12" x2="7" y2="12" />
            <line x1="17.01" y1="12" x2="22.96" y2="12" />
        </svg>
        <span class="text-animation">
            <span class="layout_label {{setting('components_moduel_display')}}
                {{Request::is('super-admin/forntend-footer-information') || Request::is('super-admin/forntend-footer-newletter') ? 'folder-active' : '' }}">
                {{__('translate.Fornt-End')}}
            </span>
        </span>
        <div class="sb-sidenav-collapse-arrow {{setting('components_moduel_display')}}">▼</div>
    </a>
    <div id="components" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
        <div class="child-white-tree">
            <div class="accordion-body sub_box">
                @include('backend.layouts.layouts-components.partial-submenu-components._components-submenu')
            </div>
        </div>
    </div>    
</span>