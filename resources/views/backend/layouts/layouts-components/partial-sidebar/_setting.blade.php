<a class="nav-link collapsed lay_nav font_size" data-bs-toggle="collapse" data-bs-target="#addons" aria-expanded="false" aria-controls="addons">
    <div class="sb-nav-link-icon">
        <i class="fa-solid fa-gear fa-spin-pulse" style="font-size: 13px;color:darkgoldenrod;"></i>
        <span style="font-size: 13px;color:darkgoldenrod;">{{__('translate.SETTING')}}</span>
    </div>
    <div class="sb-sidenav-collapse-arrow">▼</div>
    <!-- <span>▶</span> -->
</a>
<div id="addons" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body sub_box">
        <span class="prod_label underline">
            <a data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Post-Setting')}}" class="underline nav-link collapsed sals_menu compont" href="{{ route('post_setting.index') }}">
                <i class="fa-regular fa-hand-point-right fa-beat me-1"></i> {{__('translate.Post-Setting')}}
            </a>
        </span>
        <span class="prod_label underline">
            <a class="nav-link underline" href="{{route('appSetting')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.App-Setting')}}">
                <i class="fa-regular fa-hand-point-right fa-beat me-1"></i> {{__('translate.App-Setting')}}
            </a>
        </span>
    </div>
</div>