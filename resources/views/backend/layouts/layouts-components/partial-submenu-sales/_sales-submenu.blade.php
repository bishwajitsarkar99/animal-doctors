<!-- ================= Orders ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_order {{setting('order_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_order_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_order_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> 
    <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        <span class="{{setting('order_title_display')}}">{{__('translate.Orders Book')}}</span>
    </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="sales_" aria-labelledby="headingTwo" data-bs-parent="#sales_">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a class="nav-link underline nav_space" href="{{setting('add_order_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Orders Create')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('order_visual')}}">{{__('translate.ADD Order')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{setting('order_list_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Orders List')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('order_list_visual')}}">{{__('translate.Order List')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{setting('order_setting_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Orders Setting')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('order_setting_visual')}}">{{__('translate.Order Setting')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>
<!-- ================= Invoice ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_invoice {{setting('invoice_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_invoice_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_invoice_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> 
    <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        <span class="{{setting('invoice_title_display')}}">{{__('translate.Invoice Book')}}</span>
    </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="sales_" aria-labelledby="headingTwo" data-bs-parent="#sales_">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a class="nav-link underline nav_space" href="{{setting('add_invoice_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Invoice Create')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('invoice_visual')}}">{{__('translate.ADD Invoice')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{setting('invoice_setting_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Invoice Setting')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('invoice_setting_visual')}}">{{__('translate.Invoice Setting')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>
<!-- ================= Sales-Region ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_sales_region {{setting('sales_region_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_sales_region_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_sales_region_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> 
    <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        <span class="{{setting('sales_region_title_display')}}">{{__('translate.Sales Region')}}</span>
    </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="sales_" aria-labelledby="headingTwo" data-bs-parent="#sales_">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a class="nav-link underline nav_space" href="{{setting('sales_region_list_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.List Of Region')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('sales_region_list_visual')}}">{{__('translate.Sales Region List')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{setting('region_base_sales_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Regional Sales')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('region_base_sales_visual')}}">{{__('translate.Region Base Sales')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{setting('region_sales_setting_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Setting')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('region_sales_setting_visual')}}">{{__('translate.Setting')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>
