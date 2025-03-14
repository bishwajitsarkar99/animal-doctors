@if(auth()->user()->role==1)
<!-- ================== Stock ======================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_stock {{setting('stock_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_stock_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_stock_link" hidden></i>
    </span>
    <svg xml:space="preserve" width="20px" height="20px" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 347.28"><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"/><path fill="#f1c107" fill-rule="nonzero" d="M121.35 118.09l260.64 0 0 -31.3c0.73,-7.76 -4.67,-9.69 -11.24,-9.98 -3.77,-0.18 -7.97,-0.2 -11.76,-0.01l-150.17 0c-36.03,0 -43.17,-19.04 -49.96,-37.13 -3.87,-10.32 -7.56,-20.17 -22.65,-20.17l-104.38 0c-6.76,0 -12.33,5.57 -12.33,12.33l0 253.04 61.44 -139.95c6.5,-14.82 24.13,-26.83 40.41,-26.83zm280.14 0l86.05 0c19.11,0 29.72,16.28 21.83,34.29l0.03 0.01 -73.77 168.06c-6.5,14.83 -24.14,26.83 -40.41,26.83l-366.19 0c-7.65,0 -13.84,-2.56 -18.08,-6.74 -6.2,-5.19 -10.95,-17.13 -10.95,-25.05l0 -283.66c0,-17.52 14.31,-31.83 31.83,-31.83l104.38 0c28.52,0 34.55,16.06 40.86,32.89 4.46,11.89 9.15,24.4 31.75,24.4 51.2,0 102.48,0.33 153.67,0.02 3.05,-0.03 6.18,-0.06 9.1,0.07 16.41,0.76 30.82,5.4 29.88,29.41l0.02 31.3zm85.97 19.05l-366.19 0c-8.66,0 -19,7.42 -22.44,15.25l-73.77 168.06 -0.03 -0.01c-2.05,4.68 -1.46,7.8 4.07,7.8l366.2 0c8.66,0 18.99,-7.43 22.43,-15.26l73.77 -168.06c0.07,0.03 4.09,-7.78 -4.04,-7.78z"/></g></svg>
    <span class="" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{ __('translate.Stock')}}</span>
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
    <svg xml:space="preserve" width="20px" height="20px" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 347.28"><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"/><path fill="#f1c107" fill-rule="nonzero" d="M121.35 118.09l260.64 0 0 -31.3c0.73,-7.76 -4.67,-9.69 -11.24,-9.98 -3.77,-0.18 -7.97,-0.2 -11.76,-0.01l-150.17 0c-36.03,0 -43.17,-19.04 -49.96,-37.13 -3.87,-10.32 -7.56,-20.17 -22.65,-20.17l-104.38 0c-6.76,0 -12.33,5.57 -12.33,12.33l0 253.04 61.44 -139.95c6.5,-14.82 24.13,-26.83 40.41,-26.83zm280.14 0l86.05 0c19.11,0 29.72,16.28 21.83,34.29l0.03 0.01 -73.77 168.06c-6.5,14.83 -24.14,26.83 -40.41,26.83l-366.19 0c-7.65,0 -13.84,-2.56 -18.08,-6.74 -6.2,-5.19 -10.95,-17.13 -10.95,-25.05l0 -283.66c0,-17.52 14.31,-31.83 31.83,-31.83l104.38 0c28.52,0 34.55,16.06 40.86,32.89 4.46,11.89 9.15,24.4 31.75,24.4 51.2,0 102.48,0.33 153.67,0.02 3.05,-0.03 6.18,-0.06 9.1,0.07 16.41,0.76 30.82,5.4 29.88,29.41l0.02 31.3zm85.97 19.05l-366.19 0c-8.66,0 -19,7.42 -22.44,15.25l-73.77 168.06 -0.03 -0.01c-2.05,4.68 -1.46,7.8 4.07,7.8l366.2 0c8.66,0 18.99,-7.43 22.43,-15.26l73.77 -168.06c0.07,0.03 4.09,-7.78 -4.04,-7.78z"/></g></svg> 
    <span class="" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Inventory')}}</span>
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
    <svg xml:space="preserve" width="20px" height="20px" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 347.28"><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"/><path fill="#f1c107" fill-rule="nonzero" d="M121.35 118.09l260.64 0 0 -31.3c0.73,-7.76 -4.67,-9.69 -11.24,-9.98 -3.77,-0.18 -7.97,-0.2 -11.76,-0.01l-150.17 0c-36.03,0 -43.17,-19.04 -49.96,-37.13 -3.87,-10.32 -7.56,-20.17 -22.65,-20.17l-104.38 0c-6.76,0 -12.33,5.57 -12.33,12.33l0 253.04 61.44 -139.95c6.5,-14.82 24.13,-26.83 40.41,-26.83zm280.14 0l86.05 0c19.11,0 29.72,16.28 21.83,34.29l0.03 0.01 -73.77 168.06c-6.5,14.83 -24.14,26.83 -40.41,26.83l-366.19 0c-7.65,0 -13.84,-2.56 -18.08,-6.74 -6.2,-5.19 -10.95,-17.13 -10.95,-25.05l0 -283.66c0,-17.52 14.31,-31.83 31.83,-31.83l104.38 0c28.52,0 34.55,16.06 40.86,32.89 4.46,11.89 9.15,24.4 31.75,24.4 51.2,0 102.48,0.33 153.67,0.02 3.05,-0.03 6.18,-0.06 9.1,0.07 16.41,0.76 30.82,5.4 29.88,29.41l0.02 31.3zm85.97 19.05l-366.19 0c-8.66,0 -19,7.42 -22.44,15.25l-73.77 168.06 -0.03 -0.01c-2.05,4.68 -1.46,7.8 4.07,7.8l366.2 0c8.66,0 18.99,-7.43 22.43,-15.26l73.77 -168.06c0.07,0.03 4.09,-7.78 -4.04,-7.78z"/></g></svg> 
    <span class="" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Supplier')}}</span>
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
    <svg xml:space="preserve" width="20px" height="20px" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 347.28"><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"/><path fill="#f1c107" fill-rule="nonzero" d="M121.35 118.09l260.64 0 0 -31.3c0.73,-7.76 -4.67,-9.69 -11.24,-9.98 -3.77,-0.18 -7.97,-0.2 -11.76,-0.01l-150.17 0c-36.03,0 -43.17,-19.04 -49.96,-37.13 -3.87,-10.32 -7.56,-20.17 -22.65,-20.17l-104.38 0c-6.76,0 -12.33,5.57 -12.33,12.33l0 253.04 61.44 -139.95c6.5,-14.82 24.13,-26.83 40.41,-26.83zm280.14 0l86.05 0c19.11,0 29.72,16.28 21.83,34.29l0.03 0.01 -73.77 168.06c-6.5,14.83 -24.14,26.83 -40.41,26.83l-366.19 0c-7.65,0 -13.84,-2.56 -18.08,-6.74 -6.2,-5.19 -10.95,-17.13 -10.95,-25.05l0 -283.66c0,-17.52 14.31,-31.83 31.83,-31.83l104.38 0c28.52,0 34.55,16.06 40.86,32.89 4.46,11.89 9.15,24.4 31.75,24.4 51.2,0 102.48,0.33 153.67,0.02 3.05,-0.03 6.18,-0.06 9.1,0.07 16.41,0.76 30.82,5.4 29.88,29.41l0.02 31.3zm85.97 19.05l-366.19 0c-8.66,0 -19,7.42 -22.44,15.25l-73.77 168.06 -0.03 -0.01c-2.05,4.68 -1.46,7.8 4.07,7.8l366.2 0c8.66,0 18.99,-7.43 22.43,-15.26l73.77 -168.06c0.07,0.03 4.09,-7.78 -4.04,-7.78z"/></g></svg> 
    <span class="" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{ __('translate.Stock')}}</span>
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
    <svg xml:space="preserve" width="20px" height="20px" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 347.28"><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"/><path fill="#f1c107" fill-rule="nonzero" d="M121.35 118.09l260.64 0 0 -31.3c0.73,-7.76 -4.67,-9.69 -11.24,-9.98 -3.77,-0.18 -7.97,-0.2 -11.76,-0.01l-150.17 0c-36.03,0 -43.17,-19.04 -49.96,-37.13 -3.87,-10.32 -7.56,-20.17 -22.65,-20.17l-104.38 0c-6.76,0 -12.33,5.57 -12.33,12.33l0 253.04 61.44 -139.95c6.5,-14.82 24.13,-26.83 40.41,-26.83zm280.14 0l86.05 0c19.11,0 29.72,16.28 21.83,34.29l0.03 0.01 -73.77 168.06c-6.5,14.83 -24.14,26.83 -40.41,26.83l-366.19 0c-7.65,0 -13.84,-2.56 -18.08,-6.74 -6.2,-5.19 -10.95,-17.13 -10.95,-25.05l0 -283.66c0,-17.52 14.31,-31.83 31.83,-31.83l104.38 0c28.52,0 34.55,16.06 40.86,32.89 4.46,11.89 9.15,24.4 31.75,24.4 51.2,0 102.48,0.33 153.67,0.02 3.05,-0.03 6.18,-0.06 9.1,0.07 16.41,0.76 30.82,5.4 29.88,29.41l0.02 31.3zm85.97 19.05l-366.19 0c-8.66,0 -19,7.42 -22.44,15.25l-73.77 168.06 -0.03 -0.01c-2.05,4.68 -1.46,7.8 4.07,7.8l366.2 0c8.66,0 18.99,-7.43 22.43,-15.26l73.77 -168.06c0.07,0.03 4.09,-7.78 -4.04,-7.78z"/></g></svg> 
    <span class="" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Inventory')}}</span>
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
    <svg xml:space="preserve" width="20px" height="20px" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 347.28"><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"/><path fill="#f1c107" fill-rule="nonzero" d="M121.35 118.09l260.64 0 0 -31.3c0.73,-7.76 -4.67,-9.69 -11.24,-9.98 -3.77,-0.18 -7.97,-0.2 -11.76,-0.01l-150.17 0c-36.03,0 -43.17,-19.04 -49.96,-37.13 -3.87,-10.32 -7.56,-20.17 -22.65,-20.17l-104.38 0c-6.76,0 -12.33,5.57 -12.33,12.33l0 253.04 61.44 -139.95c6.5,-14.82 24.13,-26.83 40.41,-26.83zm280.14 0l86.05 0c19.11,0 29.72,16.28 21.83,34.29l0.03 0.01 -73.77 168.06c-6.5,14.83 -24.14,26.83 -40.41,26.83l-366.19 0c-7.65,0 -13.84,-2.56 -18.08,-6.74 -6.2,-5.19 -10.95,-17.13 -10.95,-25.05l0 -283.66c0,-17.52 14.31,-31.83 31.83,-31.83l104.38 0c28.52,0 34.55,16.06 40.86,32.89 4.46,11.89 9.15,24.4 31.75,24.4 51.2,0 102.48,0.33 153.67,0.02 3.05,-0.03 6.18,-0.06 9.1,0.07 16.41,0.76 30.82,5.4 29.88,29.41l0.02 31.3zm85.97 19.05l-366.19 0c-8.66,0 -19,7.42 -22.44,15.25l-73.77 168.06 -0.03 -0.01c-2.05,4.68 -1.46,7.8 4.07,7.8l366.2 0c8.66,0 18.99,-7.43 22.43,-15.26l73.77 -168.06c0.07,0.03 4.09,-7.78 -4.04,-7.78z"/></g></svg> 
    <span class="" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Supplier')}}</span>
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
    <svg xml:space="preserve" width="20px" height="20px" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 347.28"><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"/><path fill="#f1c107" fill-rule="nonzero" d="M121.35 118.09l260.64 0 0 -31.3c0.73,-7.76 -4.67,-9.69 -11.24,-9.98 -3.77,-0.18 -7.97,-0.2 -11.76,-0.01l-150.17 0c-36.03,0 -43.17,-19.04 -49.96,-37.13 -3.87,-10.32 -7.56,-20.17 -22.65,-20.17l-104.38 0c-6.76,0 -12.33,5.57 -12.33,12.33l0 253.04 61.44 -139.95c6.5,-14.82 24.13,-26.83 40.41,-26.83zm280.14 0l86.05 0c19.11,0 29.72,16.28 21.83,34.29l0.03 0.01 -73.77 168.06c-6.5,14.83 -24.14,26.83 -40.41,26.83l-366.19 0c-7.65,0 -13.84,-2.56 -18.08,-6.74 -6.2,-5.19 -10.95,-17.13 -10.95,-25.05l0 -283.66c0,-17.52 14.31,-31.83 31.83,-31.83l104.38 0c28.52,0 34.55,16.06 40.86,32.89 4.46,11.89 9.15,24.4 31.75,24.4 51.2,0 102.48,0.33 153.67,0.02 3.05,-0.03 6.18,-0.06 9.1,0.07 16.41,0.76 30.82,5.4 29.88,29.41l0.02 31.3zm85.97 19.05l-366.19 0c-8.66,0 -19,7.42 -22.44,15.25l-73.77 168.06 -0.03 -0.01c-2.05,4.68 -1.46,7.8 4.07,7.8l366.2 0c8.66,0 18.99,-7.43 22.43,-15.26l73.77 -168.06c0.07,0.03 4.09,-7.78 -4.04,-7.78z"/></g></svg> 
    <span class="" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{ __('translate.Stock')}}</span>
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
    <svg xml:space="preserve" width="20px" height="20px" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 347.28"><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"/><path fill="#f1c107" fill-rule="nonzero" d="M121.35 118.09l260.64 0 0 -31.3c0.73,-7.76 -4.67,-9.69 -11.24,-9.98 -3.77,-0.18 -7.97,-0.2 -11.76,-0.01l-150.17 0c-36.03,0 -43.17,-19.04 -49.96,-37.13 -3.87,-10.32 -7.56,-20.17 -22.65,-20.17l-104.38 0c-6.76,0 -12.33,5.57 -12.33,12.33l0 253.04 61.44 -139.95c6.5,-14.82 24.13,-26.83 40.41,-26.83zm280.14 0l86.05 0c19.11,0 29.72,16.28 21.83,34.29l0.03 0.01 -73.77 168.06c-6.5,14.83 -24.14,26.83 -40.41,26.83l-366.19 0c-7.65,0 -13.84,-2.56 -18.08,-6.74 -6.2,-5.19 -10.95,-17.13 -10.95,-25.05l0 -283.66c0,-17.52 14.31,-31.83 31.83,-31.83l104.38 0c28.52,0 34.55,16.06 40.86,32.89 4.46,11.89 9.15,24.4 31.75,24.4 51.2,0 102.48,0.33 153.67,0.02 3.05,-0.03 6.18,-0.06 9.1,0.07 16.41,0.76 30.82,5.4 29.88,29.41l0.02 31.3zm85.97 19.05l-366.19 0c-8.66,0 -19,7.42 -22.44,15.25l-73.77 168.06 -0.03 -0.01c-2.05,4.68 -1.46,7.8 4.07,7.8l366.2 0c8.66,0 18.99,-7.43 22.43,-15.26l73.77 -168.06c0.07,0.03 4.09,-7.78 -4.04,-7.78z"/></g></svg> 
    <span class="" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Inventory')}}</span>
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
    <svg xml:space="preserve" width="20px" height="20px" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 347.28"><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"/><path fill="#f1c107" fill-rule="nonzero" d="M121.35 118.09l260.64 0 0 -31.3c0.73,-7.76 -4.67,-9.69 -11.24,-9.98 -3.77,-0.18 -7.97,-0.2 -11.76,-0.01l-150.17 0c-36.03,0 -43.17,-19.04 -49.96,-37.13 -3.87,-10.32 -7.56,-20.17 -22.65,-20.17l-104.38 0c-6.76,0 -12.33,5.57 -12.33,12.33l0 253.04 61.44 -139.95c6.5,-14.82 24.13,-26.83 40.41,-26.83zm280.14 0l86.05 0c19.11,0 29.72,16.28 21.83,34.29l0.03 0.01 -73.77 168.06c-6.5,14.83 -24.14,26.83 -40.41,26.83l-366.19 0c-7.65,0 -13.84,-2.56 -18.08,-6.74 -6.2,-5.19 -10.95,-17.13 -10.95,-25.05l0 -283.66c0,-17.52 14.31,-31.83 31.83,-31.83l104.38 0c28.52,0 34.55,16.06 40.86,32.89 4.46,11.89 9.15,24.4 31.75,24.4 51.2,0 102.48,0.33 153.67,0.02 3.05,-0.03 6.18,-0.06 9.1,0.07 16.41,0.76 30.82,5.4 29.88,29.41l0.02 31.3zm85.97 19.05l-366.19 0c-8.66,0 -19,7.42 -22.44,15.25l-73.77 168.06 -0.03 -0.01c-2.05,4.68 -1.46,7.8 4.07,7.8l366.2 0c8.66,0 18.99,-7.43 22.43,-15.26l73.77 -168.06c0.07,0.03 4.09,-7.78 -4.04,-7.78z"/></g></svg> 
    <span class="" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Supplier')}}</span>
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
    <svg xml:space="preserve" width="20px" height="20px" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 347.28"><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"/><path fill="#f1c107" fill-rule="nonzero" d="M121.35 118.09l260.64 0 0 -31.3c0.73,-7.76 -4.67,-9.69 -11.24,-9.98 -3.77,-0.18 -7.97,-0.2 -11.76,-0.01l-150.17 0c-36.03,0 -43.17,-19.04 -49.96,-37.13 -3.87,-10.32 -7.56,-20.17 -22.65,-20.17l-104.38 0c-6.76,0 -12.33,5.57 -12.33,12.33l0 253.04 61.44 -139.95c6.5,-14.82 24.13,-26.83 40.41,-26.83zm280.14 0l86.05 0c19.11,0 29.72,16.28 21.83,34.29l0.03 0.01 -73.77 168.06c-6.5,14.83 -24.14,26.83 -40.41,26.83l-366.19 0c-7.65,0 -13.84,-2.56 -18.08,-6.74 -6.2,-5.19 -10.95,-17.13 -10.95,-25.05l0 -283.66c0,-17.52 14.31,-31.83 31.83,-31.83l104.38 0c28.52,0 34.55,16.06 40.86,32.89 4.46,11.89 9.15,24.4 31.75,24.4 51.2,0 102.48,0.33 153.67,0.02 3.05,-0.03 6.18,-0.06 9.1,0.07 16.41,0.76 30.82,5.4 29.88,29.41l0.02 31.3zm85.97 19.05l-366.19 0c-8.66,0 -19,7.42 -22.44,15.25l-73.77 168.06 -0.03 -0.01c-2.05,4.68 -1.46,7.8 4.07,7.8l366.2 0c8.66,0 18.99,-7.43 22.43,-15.26l73.77 -168.06c0.07,0.03 4.09,-7.78 -4.04,-7.78z"/></g></svg> 
    <span class="" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{ __('translate.Stock')}}</span>
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
    <svg xml:space="preserve" width="20px" height="20px" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 347.28"><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"/><path fill="#f1c107" fill-rule="nonzero" d="M121.35 118.09l260.64 0 0 -31.3c0.73,-7.76 -4.67,-9.69 -11.24,-9.98 -3.77,-0.18 -7.97,-0.2 -11.76,-0.01l-150.17 0c-36.03,0 -43.17,-19.04 -49.96,-37.13 -3.87,-10.32 -7.56,-20.17 -22.65,-20.17l-104.38 0c-6.76,0 -12.33,5.57 -12.33,12.33l0 253.04 61.44 -139.95c6.5,-14.82 24.13,-26.83 40.41,-26.83zm280.14 0l86.05 0c19.11,0 29.72,16.28 21.83,34.29l0.03 0.01 -73.77 168.06c-6.5,14.83 -24.14,26.83 -40.41,26.83l-366.19 0c-7.65,0 -13.84,-2.56 -18.08,-6.74 -6.2,-5.19 -10.95,-17.13 -10.95,-25.05l0 -283.66c0,-17.52 14.31,-31.83 31.83,-31.83l104.38 0c28.52,0 34.55,16.06 40.86,32.89 4.46,11.89 9.15,24.4 31.75,24.4 51.2,0 102.48,0.33 153.67,0.02 3.05,-0.03 6.18,-0.06 9.1,0.07 16.41,0.76 30.82,5.4 29.88,29.41l0.02 31.3zm85.97 19.05l-366.19 0c-8.66,0 -19,7.42 -22.44,15.25l-73.77 168.06 -0.03 -0.01c-2.05,4.68 -1.46,7.8 4.07,7.8l366.2 0c8.66,0 18.99,-7.43 22.43,-15.26l73.77 -168.06c0.07,0.03 4.09,-7.78 -4.04,-7.78z"/></g></svg> 
    <span class="" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Inventory')}}</span>
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
    <svg xml:space="preserve" width="20px" height="20px" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 347.28"><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"/><path fill="#f1c107" fill-rule="nonzero" d="M121.35 118.09l260.64 0 0 -31.3c0.73,-7.76 -4.67,-9.69 -11.24,-9.98 -3.77,-0.18 -7.97,-0.2 -11.76,-0.01l-150.17 0c-36.03,0 -43.17,-19.04 -49.96,-37.13 -3.87,-10.32 -7.56,-20.17 -22.65,-20.17l-104.38 0c-6.76,0 -12.33,5.57 -12.33,12.33l0 253.04 61.44 -139.95c6.5,-14.82 24.13,-26.83 40.41,-26.83zm280.14 0l86.05 0c19.11,0 29.72,16.28 21.83,34.29l0.03 0.01 -73.77 168.06c-6.5,14.83 -24.14,26.83 -40.41,26.83l-366.19 0c-7.65,0 -13.84,-2.56 -18.08,-6.74 -6.2,-5.19 -10.95,-17.13 -10.95,-25.05l0 -283.66c0,-17.52 14.31,-31.83 31.83,-31.83l104.38 0c28.52,0 34.55,16.06 40.86,32.89 4.46,11.89 9.15,24.4 31.75,24.4 51.2,0 102.48,0.33 153.67,0.02 3.05,-0.03 6.18,-0.06 9.1,0.07 16.41,0.76 30.82,5.4 29.88,29.41l0.02 31.3zm85.97 19.05l-366.19 0c-8.66,0 -19,7.42 -22.44,15.25l-73.77 168.06 -0.03 -0.01c-2.05,4.68 -1.46,7.8 4.07,7.8l366.2 0c8.66,0 18.99,-7.43 22.43,-15.26l73.77 -168.06c0.07,0.03 4.09,-7.78 -4.04,-7.78z"/></g></svg> 
    <span class="" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Supplier')}}</span>
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