<a class="accordion-button nav-link collapsed lay_nav font_size child_setting" data-bs-toggle="collapse" data-bs-target="#addons" aria-expanded="false" aria-controls="addons">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-git-commit rotate-icon" >
        <circle cx="12" cy="12" r="4" />
        <line x1="1.05" y1="12" x2="7" y2="12" />
        <line x1="17.01" y1="12" x2="22.96" y2="12" />
    </svg>
    <span class="text-animation">
        <span class="layout_label {{Request::is('super-admin/post-setting') || Request::is('super-admin/app-setting') ? 'folder-active' : '' }}">{{__('translate.Setting')}}</span>
    </span>
    <div class="sb-sidenav-collapse-arrow">▼</div>
</a>
<div id="addons" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body sub_box">
        <nav class="sb-sidenav-menu-nested nav child-white-tree">
            <a class="nav-link underline nav_space load-page {{Request::routeIs('post_setting.index') ? 'active' : '' }}" href="{{ route('post_setting.index') }}" style="font-family: sans-serif;color:white;font-size:12px;" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#ffff;"></i> {{__('translate.Post-Setting')}}
            </a>
            <a class="nav-link underline nav_space load-page {{Request::routeIs('appSetting') ? 'active' : '' }}" href="{{route('appSetting')}}" style="font-family: sans-serif;color:white;font-size:12px;" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#ffff;"></i> {{__('translate.App-Setting')}}
            </a>
        </nav>
    </div>
</div>