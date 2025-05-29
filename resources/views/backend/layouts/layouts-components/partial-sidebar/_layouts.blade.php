<!-- ========= super-Admin ============ -->
@if(auth()->user()->role == 1)
<span class="{{setting('layouts_moduel_display')}}">
    <a class="accordion-button nav-link collapsed lay_nav font_size child_layout {{setting('layouts_moduel_display')}}" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-git-commit rotate-icon" >
            <circle cx="12" cy="12" r="4" />
            <line x1="1.05" y1="12" x2="7" y2="12" />
            <line x1="17.01" y1="12" x2="22.96" y2="12" />
        </svg>
        <span class="text-animation">
            <span class="layout_label {{setting('layouts_moduel_display')}}">
                {{setting('layouts_moduel_title')}}
            </span>
        </span>
        <div class="sb-sidenav-collapse-arrow {{setting('layouts_moduel_display')}}">▼</div>
    </a>
    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
        <nav class="sb-sidenav-menu-nested nav child-white-tree">
            <a class="nav-link underline nav_space load-page" style="font-size: 12px;color:#fff" id="static_nav" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#ffff;"></i>{{__('translate.File-Manager')}}
            </a>
            <a class="nav-link underline nav_space load-page" style="font-size: 12px;color:#fff" href="#" id="dark_mode" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#ffff;"></i>{{__('translate.Dark Sidenav')}}
            </a>
            <a class="nav-link underline nav_space load-page" style="font-size: 12px;color:#fff" href="#" id="light_mode" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#ffff;"></i>{{__('translate.Light Sidenav')}}
            </a>
        </nav>
    </div>
</span>
@endif
<!-- ========= sub-Admin ============ -->
@if(auth()->user()->role == 2)
<span class="{{setting('layouts_moduel_display')}}">
    <a class="accordion-button nav-link collapsed lay_nav font_size child_layout {{setting('layouts_moduel_display')}}" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-git-commit rotate-icon" >
            <circle cx="12" cy="12" r="4" />
            <line x1="1.05" y1="12" x2="7" y2="12" />
            <line x1="17.01" y1="12" x2="22.96" y2="12" />
        </svg>
        <span class="layout_label {{setting('layouts_moduel_display')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
            {{setting('layouts_moduel_title')}}
        </span>
        <div class="sb-sidenav-collapse-arrow {{setting('layouts_moduel_display')}}">▼</div>
    </a>
    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
        <nav class="sb-sidenav-menu-nested nav child-white-tree">
            <a class="nav-link underline nav_space load-page" style="font-size: 12px;color:#fff" id="static_nav" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#ffff;"></i>{{__('translate.File-Manager')}}
            </a>
            <a class="nav-link underline nav_space load-page" style="font-size: 12px;color:#fff" href="#" id="dark_mode" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#ffff;"></i>{{__('translate.Dark Sidenav')}}
            </a>
            <a class="nav-link underline nav_space load-page" style="font-size: 12px;color:#fff" href="#" id="light_mode" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#ffff;"></i>{{__('translate.Light Sidenav')}}
            </a>
        </nav>
    </div>
</span>
@endif
<!-- ========= Admin ============ -->
@if(auth()->user()->role == 3)
<span class="{{setting('layouts_moduel_display')}}">
    <a class="accordion-button nav-link collapsed lay_nav font_size child_layout {{setting('layouts_moduel_display')}}" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-git-commit rotate-icon" >
            <circle cx="12" cy="12" r="4" />
            <line x1="1.05" y1="12" x2="7" y2="12" />
            <line x1="17.01" y1="12" x2="22.96" y2="12" />
        </svg>
        <span class="layout_label {{setting('layouts_moduel_display')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
            {{setting('layouts_moduel_title')}}
        </span>
        <div class="sb-sidenav-collapse-arrow {{setting('layouts_moduel_display')}}">▼</div>
    </a>
    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
        <nav class="sb-sidenav-menu-nested nav child-white-tree">
            <a class="nav-link underline nav_space load-page" style="font-size: 12px;color:#fff" id="static_nav" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#ffff;"></i>{{__('translate.File-Manager')}}
            </a>
            <a class="nav-link underline nav_space load-page" style="font-size: 12px;color:#fff" href="#" id="dark_mode" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#ffff;"></i>{{__('translate.Dark Sidenav')}}
            </a>
            <a class="nav-link underline nav_space load-page" style="font-size: 12px;color:#fff" href="#" id="light_mode" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#ffff;"></i>{{__('translate.Light Sidenav')}}
            </a>
        </nav>
    </div>
</span>
@endif
<!-- ========= Accounts Department ============ -->
@if(auth()->user()->role == 5)
<span class="{{setting('layouts_moduel_display')}}">
    <a class="accordion-button nav-link collapsed lay_nav font_size child_layout {{setting('layouts_moduel_display')}}" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-git-commit rotate-icon" >
            <circle cx="12" cy="12" r="4" />
            <line x1="1.05" y1="12" x2="7" y2="12" />
            <line x1="17.01" y1="12" x2="22.96" y2="12" />
        </svg>
        <span class="layout_label {{setting('layouts_moduel_display')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
            {{setting('layouts_moduel_title')}}
        </span>
        <div class="sb-sidenav-collapse-arrow {{setting('layouts_moduel_display')}}">▼</div>
    </a>
    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
        <nav class="sb-sidenav-menu-nested nav child-white-tree">
            <a class="nav-link underline nav_space load-page" style="font-size: 12px;color:#fff" id="static_nav" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#ffff;"></i>{{__('translate.File-Manager')}}
            </a>
            <a class="nav-link underline nav_space load-page" style="font-size: 12px;color:#fff" href="#" id="dark_mode" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#ffff;"></i>{{__('translate.Dark Sidenav')}}
            </a>
            <a class="nav-link underline nav_space load-page" style="font-size: 12px;color:#fff" href="#" id="light_mode" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#ffff;"></i>{{__('translate.Light Sidenav')}}
            </a>
        </nav>
    </div>
</span>
@endif
