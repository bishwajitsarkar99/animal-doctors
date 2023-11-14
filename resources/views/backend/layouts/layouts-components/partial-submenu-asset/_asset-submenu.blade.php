<a class="nav-link_cgrMenu dropdown-toggle ty {{setting('new_asset_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}">
        <span class="{{setting('new_asset_title_display')}}">{{__('translate.New Asset')}}</span>
    </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="asset_" aria-labelledby="headingTwo" data-bs-parent="#asset_">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="{{setting('add_asset_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Asset Add')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('add_asset_visual')}}">{{__('translate.Create Asset')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('asset_details_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Asset List')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('asset_details_visual')}}">{{__('translate.Asset List')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>
<!-- ================= Asset Details ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty {{setting('details_asset_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}">
        <span class="{{setting('details_asset_title_display')}}">{{__('translate.Details')}}</span>
    </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="asset_" aria-labelledby="headingTwo" data-bs-parent="#asset_">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="{{setting('previous_asset_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Previous Asset')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('previous_asset_visual')}}">{{__('translate.Previous Asset')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('current_asset_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Current Asset')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('current_asset_visual')}}">{{__('translate.Current Asset')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('asset_detls_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Asset Details Record')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('aasset_detls_visual')}}">{{__('translate.Asset Details')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('asset_setting_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Asset Setting')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('asset_setting_visual')}}">{{__('translate.Asset Setting')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>