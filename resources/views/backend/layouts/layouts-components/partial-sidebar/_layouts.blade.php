<!-- ========= super-Admin ============ -->
@if(auth()->user()->role == 1)
<span class="{{setting('layouts_moduel_display')}}">
    <a class="nav-link collapsed lay_nav font_size{{setting('layouts_moduel_display')}}" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
        <div class="sb-nav-link-icon"><i class="fa-solid fa-folder-open fa-beat" style="font-size: 12px;color:white;"></i></div>
        <span class="{{setting('layouts_moduel_display')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{setting('layouts_moduel_title')}}</span>
        <div class="sb-sidenav-collapse-arrow {{setting('layouts_moduel_display')}}">
            ▼
        </div>
    </a>
    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
        <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link underline" style="font-size: 12px;color:#fff" id="static_nav" data-bs-toggle="tooltip"  data-bs-placement="right" title="File-Manager" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>File-Manager</a>
            <a class="nav-link underline" style="font-size: 12px;color:#fff" href="#" id="dark_mode" data-bs-toggle="tooltip"  data-bs-placement="right" title="Dark Sidenav" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>Dark Sidenav</a>
            <a class="nav-link underline" style="font-size: 12px;color:#fff" href="#" id="light_mode" data-bs-toggle="tooltip"  data-bs-placement="right" title="Light Sidenav" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>Light Sidenav</a>
        </nav>
    </div>
</span>
@endif
<!-- ========= sub-Admin ============ -->
@if(auth()->user()->role == 2)
<span class="{{setting('layouts_moduel_display')}}">
    <a class="nav-link collapsed lay_nav font_size{{setting('layouts_moduel_display')}}" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
        <div class="sb-nav-link-icon"><i class="fa-solid fa-folder-open fa-beat" style="font-size: 12px;color:white;"></i></div>
        <span class="{{setting('layouts_moduel_display')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{setting('layouts_moduel_title')}}</span>
        <div class="sb-sidenav-collapse-arrow {{setting('layouts_moduel_display')}}">
            ▼
        </div>
    </a>
    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
        <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link underline" style="font-size: 12px;color:#fff" id="static_nav" data-bs-toggle="tooltip"  data-bs-placement="right" title="File-Manager" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>File-Manager</a>
            <a class="nav-link underline" style="font-size: 12px;color:#fff" href="#" id="dark_mode" data-bs-toggle="tooltip"  data-bs-placement="right" title="Dark Sidenav" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>Dark Sidenav</a>
            <a class="nav-link underline" style="font-size: 12px;color:#fff" href="#" id="light_mode" data-bs-toggle="tooltip"  data-bs-placement="right" title="Light Sidenav" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>Light Sidenav</a>
        </nav>
    </div>
</span>
@endif
<!-- ========= Admin ============ -->
@if(auth()->user()->role == 3)
<span class="{{setting('layouts_moduel_display')}}">
    <a class="nav-link collapsed lay_nav font_size{{setting('layouts_moduel_display')}}" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
        <div class="sb-nav-link-icon"><i class="fa-solid fa-folder-open fa-beat" style="font-size: 12px;color:white;"></i></div>
        <span class="{{setting('layouts_moduel_display')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{setting('layouts_moduel_title')}}</span>
        <div class="sb-sidenav-collapse-arrow {{setting('layouts_moduel_display')}}">
            ▼
        </div>
    </a>
    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
        <nav class="sb-sidenav-menu-nested nav">
            <!-- File-manager open id="static_nav" -->
            <a class="nav-link underline" style="font-size: 12px;color:#fff" data-bs-toggle="tooltip"  data-bs-placement="right" title="File-Manager" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>File-Manager</a>
            <a class="nav-link underline" style="font-size: 12px;color:#fff" href="#" id="dark_mode" data-bs-toggle="tooltip"  data-bs-placement="right" title="Dark Sidenav" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>Dark Sidenav</a>
            <a class="nav-link underline" style="font-size: 12px;color:#fff" href="#" id="light_mode" data-bs-toggle="tooltip"  data-bs-placement="right" title="Light Sidenav" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>Light Sidenav</a>
        </nav>
    </div>
</span>
@endif
<!-- ========= Accounts Department ============ -->
@if(auth()->user()->role == 5)
<span class="{{setting('layouts_moduel_display')}}">
    <a class="nav-link collapsed lay_nav font_size{{setting('layouts_moduel_display')}}" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
        <div class="sb-nav-link-icon"><i class="fa-solid fa-folder-open fa-beat" style="font-size: 12px;color:rgb(60, 60, 255);"></i></div>
        <span class="{{setting('layouts_moduel_display')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{setting('layouts_moduel_title')}}</span>
        <div class="sb-sidenav-collapse-arrow {{setting('layouts_moduel_display')}}">
            ▼
        </div>
    </a>
    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
        <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link underline" style="font-size: 12px;color:darkblue;" id="static_nav" data-bs-toggle="tooltip"  data-bs-placement="right" title="File-Manager" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>File-Manager</a>
            <a class="nav-link underline" style="font-size: 12px;color:darkblue;" href="#" id="dark_mode" data-bs-toggle="tooltip"  data-bs-placement="right" title="Dark Sidenav" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>Dark Sidenav</a>
            <a class="nav-link underline" style="font-size: 12px;color:darkblue;" href="#" id="light_mode" data-bs-toggle="tooltip"  data-bs-placement="right" title="Light Sidenav" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>Light Sidenav</a>
        </nav>
    </div>
</span>
@endif
