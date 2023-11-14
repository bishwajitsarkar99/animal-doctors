<!-- ================= Orders ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty {{setting('order_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}">
        <span class="{{setting('order_title_display')}}">{{__('translate.Orders Book')}}</span>
    </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="sales_" aria-labelledby="headingTwo" data-bs-parent="#sales_">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="{{setting('add_order_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Orders Create')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('order_visual')}}">{{__('translate.ADD Order')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('order_list_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Orders List')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('order_list_visual')}}">{{__('translate.Order List')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('order_setting_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Orders Setting')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('order_setting_visual')}}">{{__('translate.Order Setting')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>
<!-- ================= Invoice ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty {{setting('invoice_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}">
        <span class="{{setting('invoice_title_display')}}">{{__('translate.Invoice Book')}}</span>
    </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="sales_" aria-labelledby="headingTwo" data-bs-parent="#sales_">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="{{setting('add_invoice_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Invoice Create')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('invoice_visual')}}">{{__('translate.ADD Invoice')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('invoice_setting_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Invoice Setting')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('invoice_setting_visual')}}">{{__('translate.Invoice Setting')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>
<!-- ================= Sales-Region ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty {{setting('sales_region_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}">
        <span class="{{setting('sales_region_title_display')}}">{{__('translate.Sales Region')}}</span>
    </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="sales_" aria-labelledby="headingTwo" data-bs-parent="#sales_">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="{{setting('sales_region_list_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.List Of Region')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('sales_region_list_visual')}}">{{__('translate.Sales Region List')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('region_base_sales_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Regional Sales')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('region_base_sales_visual')}}">{{__('translate.Region Base Sales')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('region_sales_setting_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Setting')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('region_sales_setting_visual')}}">{{__('translate.Setting')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>
