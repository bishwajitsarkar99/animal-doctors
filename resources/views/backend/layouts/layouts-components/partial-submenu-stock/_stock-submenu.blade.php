@if(auth()->user()->role==1)
<!-- ================== Stock ======================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_stock {{setting('stock_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_stock_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_stock_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> 
    <span class="ps-1" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{ __('translate.Stock')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="stock_" aria-labelledby="headingTwo" data-bs-parent="#stock_">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a class="nav-link underline nav_space load-page" href="#" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('stock_book_visual')}}">{{__('translate.Stock-Book')}}</span>
                </a>
                <a class="nav-link underline nav_space load-page" href="#" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('adjustment_visual')}}">{{__('translate.Stock-Adjustment')}}</span>
                </a>
                <a class="nav-link underline nav_space load-page" href="#" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('damage_stock_visual')}}">{{__('translate.Damage-Stock')}}</span>
                </a>
                <a class="nav-link underline nav_space load-page" href="#" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('stock_summary_visual')}}">{{__('translate.Stock-Summary')}}</span>
                </a>
                <a class="nav-link underline nav_space load-page" href="#" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('stock_report_visual')}}">{{__('translate.Stock-Report')}}</span>
                </a>
            </nav>
        </div>

    </li>

</ul>
<!-- ================= Inventory ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_inventory {{setting('invnetory_title_display')}} {{Request::is('report/inventory-details-record') || Request::is('super-admin/inventory-authorize') ? 'folder-active' : '' }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_inventory_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_inventory_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> 
    <span class="ps-1" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Inventory')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>

        <div class="collapse" id="stock_" aria-labelledby="headingTwo" data-bs-parent="#stock_">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <!-- <a class="nav-link underline nav_space load-page" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Create-Inventory">
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>Add Inventory
                </a> -->
                <a class="nav-link underline nav_space load-page {{Request::routeIs('inventory_details.action') ? 'active' : '' }}" href="{{ route('inventory_details.action') }}" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('inventory_details_visual')}}">{{__('translate.Inventory Details')}}</span>
                </a>
                <!-- <a class="nav-link underline nav_space load-page" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Inventory-Setting">
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>Inventory Setting
                </a> -->
                <a class="nav-link underline nav_space load-page {{Request::routeIs('inventory-auth') ? 'active' : '' }}" href="{{route('inventory-auth')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('inventory_visual')}}">{{__('translate.Inventory Setting')}}</span>
                </a>
            </nav>
        </div>

    </li>
</ul>
<!-- ================= Supplier ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_supplier {{setting('supplier_title_visual')}} {{Request::is('supplier') || Request::is('super-admin/supplier/access-permission') ? 'folder-active' : '' }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_supplier_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_supplier_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> 
    <span class="ps-1" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Supplier')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="stock_" aria-labelledby="headingTwo" data-bs-parent="#stock_">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a class="nav-link underline nav_space load-page {{Request::routeIs('supplier.index') ? 'active' : '' }}" href="{{route('supplier.index')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('supplier_setup_display')}}">{{__('translate.Create')}}</span>
                </a>
                <a class="nav-link underline nav_space load-page" href="#" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('supplier_details_display')}}">{{__('translate.Record')}}</span>
                </a>
                <a class="nav-link underline nav_space load-page" href="#" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('supplier_requisition_display')}}">{{__('translate.Requisition')}}</span>
                </a>
                <a class="nav-link underline nav_space load-page {{Request::routeIs('access-permission.index') ? 'active' : '' }}" href="{{route('access-permission.index') }}" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('supplier_requisition_display')}}">{{__('translate.Setting')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>
@endif
@if(auth()->user()->role==2)
<!-- ================== Stock ======================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_stock {{setting('stock_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_stock_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_stock_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> 
    <span class="ps-1" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{ __('translate.Stock')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="stock_" aria-labelledby="headingTwo" data-bs-parent="#stock_">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a class="nav-link underline load-page" href="#" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('stock_book_visual')}}">{{__('translate.Stock-Book')}}</span>
                </a>
                <a class="nav-link underline load-page" href="#" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('adjustment_visual')}}">{{__('translate.Stock-Adjustment')}}</span>
                </a>
                <a class="nav-link underline load-page" href="#" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('damage_stock_visual')}}">{{__('translate.Damage-Stock')}}</span>
                </a>
                <a class="nav-link underline load-page" href="#" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('stock_summary_visual')}}">{{__('translate.Stock-Summary')}}</span>
                </a>
                <a class="nav-link underline load-page" href="#" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('stock_report_visual')}}">{{__('translate.Stock-Report')}}</span>
                </a>
            </nav>
        </div>

    </li>

</ul>
<!-- ================= Inventory ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_inventory {{setting('invnetory_title_display')}} {{Request::is('report/inventory-details-record') || Request::is('super-admin/inventory-authorize') ? 'folder-active' : '' }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_inventory_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_inventory_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> 
    <span class="ps-1" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Inventory')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>

        <div class="collapse" id="stock_" aria-labelledby="headingTwo" data-bs-parent="#stock_">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <!-- <a class="nav-link underline load-page" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Create-Inventory">
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>Add Inventory
                </a> -->
                <a class="nav-link underline load-page {{Request::routeIs('inventory_details.action') ? 'active' : '' }}" href="{{ route('inventory_details.action') }}" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('inventory_details_visual')}}">{{__('translate.Inventory Details')}}</span>
                </a>
                <!-- <a class="nav-link underline load-page" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Inventory-Setting">
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>Inventory Setting
                </a> -->
                <a class="nav-link underline load-page {{Request::routeIs('inventory-auth') ? 'active' : '' }}" href="{{ route('inventory-auth') }}" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('inventory_visual')}}">{{__('translate.Inventory Setting')}}</span>
                </a>
            </nav>
        </div>

    </li>
</ul>
<!-- ================= Supplier ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_supplier {{setting('supplier_title_visual')}} {{Request::is('supplier') || Request::is('super-admin/supplier/access-permission') ? 'folder-active' : '' }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_supplier_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_supplier_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> 
    <span class="ps-1" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Supplier')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>

        <div class="collapse" id="stock_" aria-labelledby="headingTwo" data-bs-parent="#stock_">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a class="nav-link underline load-page {{Request::routeIs('supplier.index') ? 'active' : '' }}" href="{{route('supplier.index')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('supplier_setup_display')}}">{{__('translate.Create')}}</span>
                </a>
                <a class="nav-link underline load-page" href="#" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('supplier_details_display')}}">{{__('translate.Record')}}</span>
                </a>
                <a class="nav-link underline load-page" href="#" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('supplier_requisition_display')}}">{{__('translate.Requisition')}}</span>
                </a>
                <a class="nav-link underline load-page {{Request::routeIs('access-permission.index') ? 'active' : '' }}" href="{{route('access-permission.index') }}" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('supplier_requisition_display')}}">{{__('translate.Setting')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>
@endif
@if(auth()->user()->role==3)
<!-- ================== Stock ======================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_stock {{setting('stock_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_stock_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_stock_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> 
    <span class="ps-1" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{ __('translate.Stock')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="stock_" aria-labelledby="headingTwo" data-bs-parent="#stock_">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a class="nav-link underline load-page" href="#" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('stock_book_visual')}}">{{__('translate.Stock-Book')}}</span>
                </a>
                <a class="nav-link underline load-page" href="#" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('adjustment_visual')}}">{{__('translate.Stock-Adjustment')}}</span>
                </a>
                <a class="nav-link underline load-page" href="#" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('damage_stock_visual')}}">{{__('translate.Damage-Stock')}}</span>
                </a>
                <a class="nav-link underline load-page" href="#" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('stock_summary_visual')}}">{{__('translate.Stock-Summary')}}</span>
                </a>
                <a class="nav-link underline load-page" href="#" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('stock_report_visual')}}">{{__('translate.Stock-Report')}}</span>
                </a>
            </nav>
        </div>

    </li>

</ul>
<!-- ================= Inventory ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_inventory {{setting('invnetory_title_display')}} {{Request::is('report/inventory-details-record') || Request::is('super-admin/inventory-authorize') ? 'folder-active' : '' }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_inventory_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_inventory_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> 
    <span class="ps-1" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Inventory')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>

        <div class="collapse" id="stock_" aria-labelledby="headingTwo" data-bs-parent="#stock_">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <!-- <a class="nav-link underline load-page" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Create-Inventory">
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>Add Inventory
                </a> -->
                <a class="nav-link underline load-page {{Request::routeIs('inventory_details.action') ? 'active' : '' }}" href="{{ route('inventory_details.action') }}" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('inventory_details_visual')}}">{{__('translate.Inventory Details')}}</span>
                </a>
                <!-- <a class="nav-link underline load-page" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Inventory-Setting">
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>Inventory Setting
                </a> -->
                <a class="nav-link underline load-page {{Request::routeIs('inventory-auth') ? 'active' : '' }}" href="{{ route('inventory-auth') }}" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('inventory_visual')}}">{{__('translate.Inventory Setting')}}</span>
                </a>
            </nav>
        </div>

    </li>
</ul>
<!-- ================= Supplier ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_supplier {{setting('supplier_title_visual')}} {{Request::is('supplier') || Request::is('super-admin/supplier/access-permission') ? 'folder-active' : '' }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_supplier_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_supplier_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> 
    <span class="ps-1" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Supplier')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>

        <div class="collapse" id="stock_" aria-labelledby="headingTwo" data-bs-parent="#stock_">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a class="nav-link underline load-page {{Request::routeIs('supplier.index') ? 'active' : '' }}" href="{{route('supplier.index')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('supplier_setup_display')}}">{{__('translate.Create')}}</span>
                </a>
                <a class="nav-link underline load-page" href="#" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('supplier_details_display')}}">{{__('translate.Record')}}</span>
                </a>
                <a class="nav-link underline load-page" href="#" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('supplier_requisition_display')}}">{{__('translate.Requisition')}}</span>
                </a>
                <a class="nav-link underline load-page {{Request::routeIs('access-permission.index') ? 'active' : '' }}" href="{{route('access-permission.index') }}" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('supplier_requisition_display')}}">{{__('translate.Setting')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>
@endif
@if(auth()->user()->role==5)
<!-- ================== Stock ======================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_stock {{setting('stock_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_stock_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_stock_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> 
    <span class="ps-1" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{ __('translate.Stock')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="stock_" aria-labelledby="headingTwo" data-bs-parent="#stock_">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a class="nav-link underline load-page" href="#" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('stock_book_visual')}}">{{__('translate.Stock-Book')}}</span>
                </a>
                <a class="nav-link underline load-page" href="#" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('adjustment_visual')}}">{{__('translate.Stock-Adjustment')}}</span>
                </a>
                <a class="nav-link underline load-page" href="#" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('damage_stock_visual')}}">{{__('translate.Damage-Stock')}}</span>
                </a>
                <a class="nav-link underline load-page" href="#" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('stock_summary_visual')}}">{{__('translate.Stock-Summary')}}</span>
                </a>
                <a class="nav-link underline load-page" href="#" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('stock_report_visual')}}">{{__('translate.Stock-Report')}}</span>
                </a>
            </nav>
        </div>

    </li>

</ul>
<!-- ================= Inventory ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_inventory {{setting('invnetory_title_display')}} {{Request::is('report/inventory-details-record') || Request::is('super-admin/inventory-authorize') ? 'folder-active' : '' }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_inventory_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_inventory_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> 
    <span class="ps-1" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Inventory')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>

        <div class="collapse" id="stock_" aria-labelledby="headingTwo" data-bs-parent="#stock_">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <!-- <a class="nav-link underline load-page" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Create-Inventory">
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>Add Inventory
                </a> -->
                <a class="nav-link underline load-page {{Request::routeIs('inventory_details.action') ? 'active' : '' }}" href="{{ route('inventory_details.action') }}" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('inventory_details_visual')}}">{{__('translate.Inventory Details')}}</span>
                </a>
                <!-- <a class="nav-link underline load-page" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Inventory-Setting">
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>Inventory Setting
                </a> -->
                <a class="nav-link underline load-page {{Request::routeIs('inventory-auth') ? 'active' : '' }}" href="{{ route('inventory-auth') }}" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('inventory_visual')}}">{{__('translate.Inventory Setting')}}</span>
                </a>
            </nav>
        </div>

    </li>
</ul>
<!-- ================= Supplier ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_supplier {{setting('supplier_title_visual')}} {{Request::is('supplier') || Request::is('super-admin/supplier/access-permission') ? 'folder-active' : '' }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_supplier_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_supplier_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> 
    <span class="ps-1" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Supplier')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>

        <div class="collapse" id="stock_" aria-labelledby="headingTwo" data-bs-parent="#stock_">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a class="nav-link underline load-page {{Request::routeIs('supplier.index') ? 'active' : '' }}" href="{{route('supplier.index')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('supplier_setup_display')}}">{{__('translate.Create')}}</span>
                </a>
                <a class="nav-link underline load-page" href="#" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('supplier_details_display')}}">{{__('translate.Record')}}</span>
                </a>
                <a class="nav-link underline load-page" href="#" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('supplier_requisition_display')}}">{{__('translate.Requisition')}}</span>
                </a>
                <a class="nav-link underline load-page {{Request::routeIs('access-permission.index') ? 'active' : '' }}" href="{{route('access-permission.index') }}" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('supplier_requisition_display')}}">{{__('translate.Setting')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>
@endif