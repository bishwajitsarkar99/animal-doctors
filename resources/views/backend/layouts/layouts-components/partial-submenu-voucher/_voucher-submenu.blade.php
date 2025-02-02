<!-- ================= Voucher Category ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_voucher {{setting('vaoucher_category_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:#007effc4;" id="plus_voucher_link"></i>
        <i class="fa-solid fa-minus" style="color:#007effc4;" id="minus_voucher_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> 
    <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        <span class="{{setting('vaoucher_category_title_display')}}">{{__('translate.Vaoucher Category')}}</span>
    </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="voucher_" aria-labelledby="headingTwo" data-bs-parent="#voucher_">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a class="nav-link underline nav_space" href="{{setting('vaoucherCategy_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Voucher Category')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('vaoucherCategy_visual')}}">{{__('translate.Vaoucher Category')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{setting('vaoucher_list_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Vaoucher List')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('vaoucher_list_visual')}}">{{__('translate.Vaoucher List')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>
<!-- ================= Voucher Create ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_voucher_create {{setting('main_vaoucher_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:#007effc4;" id="plus_voucher_create_link"></i>
        <i class="fa-solid fa-minus" style="color:#007effc4;" id="minus_voucher_create_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> 
    <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        <span class="{{setting('main_vaoucher_title_display')}}">{{__('translate.Vaoucher')}}</span>
    </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="voucher_" aria-labelledby="headingTwo" data-bs-parent="#voucher_">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a class="nav-link underline nav_space" href="{{setting('add_vaoucher_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Voucher Create')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('add_vaoucher_visual')}}">{{__('translate.ADD Vaoucher')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{setting('vaoucher_details_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Voucher-Details')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('vaoucher_details_visual')}}">{{__('translate.Vaoucher Details')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{setting('vaoucher_setting_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Voucher Setting')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('vaoucher_setting_visual')}}">{{__('translate.Vaoucher Setting')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>