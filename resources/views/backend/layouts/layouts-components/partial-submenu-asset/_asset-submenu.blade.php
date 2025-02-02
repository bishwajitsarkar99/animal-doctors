<a class="nav-link_cgrMenu dropdown-toggle ty child_asset {{setting('new_asset_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:#007effc4;" id="plus_asset_link"></i>
        <i class="fa-solid fa-minus" style="color:#007effc4;" id="minus_asset_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i>
    <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        <span class="{{setting('new_asset_title_display')}}">{{__('translate.New Asset')}}</span>
    </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="asset_" aria-labelledby="headingTwo" data-bs-parent="#asset_">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a class="nav-link underline nav_space" href="{{setting('add_asset_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Asset Add')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('add_asset_visual')}}">{{__('translate.Create Asset')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{setting('asset_details_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Asset List')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('asset_details_visual')}}">{{__('translate.Asset List')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>
<!-- ================= Asset Details ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_asset_details {{setting('details_asset_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:#007effc4;" id="plus_asset_details_link"></i>
        <i class="fa-solid fa-minus" style="color:#007effc4;" id="minus_asset_details_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> 
    <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        <span class="{{setting('details_asset_title_display')}}">{{__('translate.Details')}}</span>
    </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="asset_" aria-labelledby="headingTwo" data-bs-parent="#asset_">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a class="nav-link underline nav_space" href="{{setting('previous_asset_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Previous Asset')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('previous_asset_visual')}}">{{__('translate.Previous Asset')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{setting('current_asset_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Current Asset')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('current_asset_visual')}}">{{__('translate.Current Asset')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{setting('asset_detls_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Asset Details Record')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('aasset_detls_visual')}}">{{__('translate.Asset Details')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{setting('asset_setting_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Asset Setting')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('asset_setting_visual')}}">{{__('translate.Asset Setting')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>