@if(auth()->user()->role==1)
<!-- ================== Stock ======================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty {{setting('stock_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}">{{ __('translate.Stock')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="stock_" aria-labelledby="headingTwo" data-bs-parent="#stock_">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="{{setting('stock_book_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Open Stock-Book')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('stock_book_visual')}}">{{__('translate.Stock-Book')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('adjustment_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Add Stock Adjustment')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('adjustment_visual')}}">{{__('translate.Stock-Adjustment')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('damage_stock_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Open Damage-Stock')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('damage_stock_visual')}}">{{__('translate.Damage-Stock')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('stock_summary_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Open Stock-Summary')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('stock_summary_visual')}}">{{__('translate.Stock-Summary')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('stock_report_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Open Stock-Report')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('stock_report_visual')}}">{{__('translate.Stock-Report')}}</span>
                </a>
            </nav>
        </div>

    </li>

</ul>
<!-- ================= Inventory ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty {{setting('invnetory_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> 
    <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}">{{__('translate.Inventory')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>

        <div class="collapse" id="stock_" aria-labelledby="headingTwo" data-bs-parent="#stock_">
            <nav class="sb-sidenav-menu-nested nav">
                <!-- <a class="nav-link underline" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Create-Inventory">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>Add Inventory
                </a> -->
                <a class="nav-link underline" href="{{setting('inventory_details_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Inventory-Details')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('inventory_details_visual')}}">{{__('translate.Inventory Details')}}</span>
                </a>
                <!-- <a class="nav-link underline" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Inventory-Setting">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>Inventory Setting
                </a> -->
                <a class="nav-link underline" href="{{setting('authorization_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Inventory-Authorization')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('inventory_visual')}}">{{__('translate.Authorization')}}</span>
                </a>
            </nav>
        </div>

    </li>
</ul>
<!-- ================= Supplier ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty {{setting('supplier_title_visual')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}">{{__('translate.Supplier')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>

        <div class="collapse" id="stock_" aria-labelledby="headingTwo" data-bs-parent="#stock_">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="{{setting('supplier_setup_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Supplier-Setting')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('supplier_setup_display')}}">{{__('translate.Supplier-Setup')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('supplier_details_setup_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Supplier-Record')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('supplier_details_display')}}">{{__('translate.Details Record')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('supplier_requisition_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Supplier-Requisition')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('supplier_requisition_display')}}">{{__('translate.Supplier Requisition')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>
@endif

@if(auth()->user()->role==3)
<!-- Inventory -->
<a class="nav-link_cgrMenu dropdown-toggle ty " id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}">{{__('translate.Inventory')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="stock_" aria-labelledby="headingTwo" data-bs-parent="#stock_">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="{{ route('medicine-inventory.index') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Create-Inventory')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>{{__('translate.Add Inventory')}}
                </a>
            </nav>
        </div>
    </li>
</ul>
@endif