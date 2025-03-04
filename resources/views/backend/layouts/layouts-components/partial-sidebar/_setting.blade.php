<a class="nav-link collapsed lay_nav font_size child_setting" data-bs-toggle="collapse" data-bs-target="#addons" aria-expanded="false" aria-controls="addons">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:#ffff;" id="plus_setting_link"></i>
        <i class="fa-solid fa-minus" style="color:#ffff;" id="minus_setting_link" hidden></i>
    </span>
    <div class="sb-nav-link-icon">
        <i class="fa-solid fa-wrench fa-beat-fade" style="font-size: 14px;color:white;"></i>
        <span style="font-size: 13px;color:white;" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.SETTING')}}</span>
    </div>
    <div class="sb-sidenav-collapse-arrow">▼</div>
</a>
<div id="addons" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body sub_box">
        <nav class="sb-sidenav-menu-nested nav child-white-tree">
            <a class="nav-link underline nav_space" style="font-family: sans-serif;color:white;font-size:11px;" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>' class="underline nav-link collapsed sals_menu compont" href="{{ route('post_setting.index') }}">
                <i class="fa-solid fa-minus" style="color:#ffff;"></i> {{__('translate.Post-Setting')}}
            </a>
            <a class="nav-link underline nav_space" style="font-family: sans-serif;color:white;font-size:11px;" href="{{route('appSetting')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#ffff;"></i> {{__('translate.App-Setting')}}
            </a>
        </nav>
    </div>
</div>