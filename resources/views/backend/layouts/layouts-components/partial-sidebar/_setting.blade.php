<a class="nav-link collapsed lay_nav font_size" data-bs-toggle="collapse" data-bs-target="#addons" aria-expanded="false" aria-controls="addons">
    <div class="sb-nav-link-icon">
        <i class="fa-solid fa-gear fa-spin-pulse" style="font-size: 13px;color:white;"></i>
        <span style="font-size: 13px;color:white;" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.SETTING')}}</span>
    </div>
    <div class="sb-sidenav-collapse-arrow">▼</div>
    <!-- <span>▶</span> -->
</a>
<div id="addons" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body sub_box">
        <span class="prod_label underline">
            <a style="font-family: sans-serif;color:white;font-size:11px;" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Post-Setting')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>' class="underline nav-link collapsed sals_menu compont" href="{{ route('post_setting.index') }}">
                <i class="fa-regular fa-hand-point-right fa-beat me-1"></i> {{__('translate.Post-Setting')}}
            </a>
        </span>
        <span class="prod_label underline">
            <a style="font-family: sans-serif;color:white;font-size:11px;" class="nav-link underline" href="{{route('appSetting')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.App-Setting')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-regular fa-hand-point-right fa-beat me-1"></i> {{__('translate.App-Setting')}}
            </a>
        </span>
    </div>
</div>