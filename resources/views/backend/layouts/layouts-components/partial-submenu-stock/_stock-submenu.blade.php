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
                <a class="nav-link underline nav_space" href="{{setting('stock_book_link')}}" title="{{__('translate.Open Stock-Book')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('stock_book_visual')}}">{{__('translate.Stock-Book')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{setting('adjustment_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Add Stock Adjustment')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('adjustment_visual')}}">{{__('translate.Stock-Adjustment')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{setting('damage_stock_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Open Damage-Stock')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('damage_stock_visual')}}">{{__('translate.Damage-Stock')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{setting('stock_summary_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Open Stock-Summary')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('stock_summary_visual')}}">{{__('translate.Stock-Summary')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{setting('stock_report_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Open Stock-Report')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('stock_report_visual')}}">{{__('translate.Stock-Report')}}</span>
                </a>
            </nav>
        </div>

    </li>

</ul>
<!-- ================= Inventory ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_inventory {{setting('invnetory_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                <!-- <a class="nav-link underline nav_space" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Create-Inventory">
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>Add Inventory
                </a> -->
                <a class="nav-link underline nav_space" href="{{ route('inventory_details.action') }}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Inventory-Details')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('inventory_details_visual')}}">{{__('translate.Inventory Details')}}</span>
                </a>
                <!-- <a class="nav-link underline nav_space" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Inventory-Setting">
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>Inventory Setting
                </a> -->
                <a class="nav-link underline nav_space" href="{{setting('authorization_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Inventory Setting')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('inventory_visual')}}">{{__('translate.Inventory Setting')}}</span>
                </a>
            </nav>
        </div>

    </li>
</ul>
<!-- ================= Supplier ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_supplier {{setting('supplier_title_visual')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                <a class="nav-link underline nav_space" href="{{setting('supplier_setup_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Supplier-Create')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('supplier_setup_display')}}">{{__('translate.Create')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{setting('supplier_details_setup_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Supplier-Record')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('supplier_details_display')}}">{{__('translate.Record')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{setting('supplier_requisition_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Supplier-Requisition')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('supplier_requisition_display')}}">{{__('translate.Requisition')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{route('access-permission.index') }}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Supplier-Setting')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
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
                <a class="nav-link underline" href="{{setting('stock_book_link')}}" title="{{__('translate.Open Stock-Book')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('stock_book_visual')}}">{{__('translate.Stock-Book')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('adjustment_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Add Stock Adjustment')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('adjustment_visual')}}">{{__('translate.Stock-Adjustment')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('damage_stock_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Open Damage-Stock')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('damage_stock_visual')}}">{{__('translate.Damage-Stock')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('stock_summary_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Open Stock-Summary')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('stock_summary_visual')}}">{{__('translate.Stock-Summary')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('stock_report_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Open Stock-Report')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('stock_report_visual')}}">{{__('translate.Stock-Report')}}</span>
                </a>
            </nav>
        </div>

    </li>

</ul>
<!-- ================= Inventory ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_inventory {{setting('invnetory_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                <!-- <a class="nav-link underline" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Create-Inventory">
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>Add Inventory
                </a> -->
                <a class="nav-link underline" href="{{ route('inventory_details.action') }}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Inventory-Details')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('inventory_details_visual')}}">{{__('translate.Inventory Details')}}</span>
                </a>
                <!-- <a class="nav-link underline" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Inventory-Setting">
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>Inventory Setting
                </a> -->
                <a class="nav-link underline" href="{{setting('authorization_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Inventory Setting')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('inventory_visual')}}">{{__('translate.Inventory Setting')}}</span>
                </a>
            </nav>
        </div>

    </li>
</ul>
<!-- ================= Supplier ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_supplier {{setting('supplier_title_visual')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                <a class="nav-link underline" href="{{setting('supplier_setup_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Supplier-Create')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('supplier_setup_display')}}">{{__('translate.Create')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('supplier_details_setup_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Supplier-Record')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('supplier_details_display')}}">{{__('translate.Record')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('supplier_requisition_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Supplier-Requisition')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('supplier_requisition_display')}}">{{__('translate.Requisition')}}</span>
                </a>
                <a class="nav-link underline" href="{{route('access-permission.index') }}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Supplier-Setting')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
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
                <a class="nav-link underline" href="{{setting('stock_book_link')}}" title="{{__('translate.Open Stock-Book')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('stock_book_visual')}}">{{__('translate.Stock-Book')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('adjustment_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Add Stock Adjustment')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('adjustment_visual')}}">{{__('translate.Stock-Adjustment')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('damage_stock_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Open Damage-Stock')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('damage_stock_visual')}}">{{__('translate.Damage-Stock')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('stock_summary_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Open Stock-Summary')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('stock_summary_visual')}}">{{__('translate.Stock-Summary')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('stock_report_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Open Stock-Report')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('stock_report_visual')}}">{{__('translate.Stock-Report')}}</span>
                </a>
            </nav>
        </div>

    </li>

</ul>
<!-- ================= Inventory ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_inventory {{setting('invnetory_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                <!-- <a class="nav-link underline" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Create-Inventory">
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>Add Inventory
                </a> -->
                <a class="nav-link underline" href="{{ route('inventory_details.action') }}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Inventory-Details')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('inventory_details_visual')}}">{{__('translate.Inventory Details')}}</span>
                </a>
                <!-- <a class="nav-link underline" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Inventory-Setting">
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>Inventory Setting
                </a> -->
                <a class="nav-link underline" href="{{setting('authorization_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Inventory Setting')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('inventory_visual')}}">{{__('translate.Inventory Setting')}}</span>
                </a>
            </nav>
        </div>

    </li>
</ul>
<!-- ================= Supplier ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_supplier {{setting('supplier_title_visual')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                <a class="nav-link underline" href="{{setting('supplier_setup_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Supplier-Create')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('supplier_setup_display')}}">{{__('translate.Create')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('supplier_details_setup_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Supplier-Record')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('supplier_details_display')}}">{{__('translate.Record')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('supplier_requisition_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Supplier-Requisition')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('supplier_requisition_display')}}">{{__('translate.Requisition')}}</span>
                </a>
                <a class="nav-link underline" href="{{route('access-permission.index') }}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Supplier-Setting')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
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
                <a class="nav-link underline" href="{{setting('stock_book_link')}}" title="{{__('translate.Open Stock-Book')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('stock_book_visual')}}">{{__('translate.Stock-Book')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('adjustment_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Add Stock Adjustment')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('adjustment_visual')}}">{{__('translate.Stock-Adjustment')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('damage_stock_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Open Damage-Stock')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('damage_stock_visual')}}">{{__('translate.Damage-Stock')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('stock_summary_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Open Stock-Summary')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('stock_summary_visual')}}">{{__('translate.Stock-Summary')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('stock_report_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Open Stock-Report')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('stock_report_visual')}}">{{__('translate.Stock-Report')}}</span>
                </a>
            </nav>
        </div>

    </li>

</ul>
<!-- ================= Inventory ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_inventory {{setting('invnetory_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                <!-- <a class="nav-link underline" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Create-Inventory">
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>Add Inventory
                </a> -->
                <a class="nav-link underline" href="{{ route('inventory_details.action') }}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Inventory-Details')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('inventory_details_visual')}}">{{__('translate.Inventory Details')}}</span>
                </a>
                <!-- <a class="nav-link underline" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Inventory-Setting">
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>Inventory Setting
                </a> -->
                <a class="nav-link underline" href="{{setting('authorization_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Inventory Setting')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('inventory_visual')}}">{{__('translate.Inventory Setting')}}</span>
                </a>
            </nav>
        </div>

    </li>
</ul>
<!-- ================= Supplier ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_supplier {{setting('supplier_title_visual')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                <a class="nav-link underline" href="{{setting('supplier_setup_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Supplier-Create')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('supplier_setup_display')}}">{{__('translate.Create')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('supplier_details_setup_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Supplier-Record')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('supplier_details_display')}}">{{__('translate.Record')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('supplier_requisition_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Supplier-Requisition')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('supplier_requisition_display')}}">{{__('translate.Requisition')}}</span>
                </a>
                <a class="nav-link underline" href="{{route('access-permission.index') }}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Supplier-Setting')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('supplier_requisition_display')}}">{{__('translate.Setting')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>
@endif