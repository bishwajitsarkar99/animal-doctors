@if(auth()->user()->role==2)
<a class="nav-link_cgrMenu dropdown-toggle ty" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>Inventory</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="auth_" aria-labelledby="headingTwo" data-bs-parent="#auth_">
            <nav class="sb-sidenav-menu-nested nav">
                <a type="button" class="nav-link underline side-bar-link load-page" data-url="{{ route('medicine-inventory.index') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Create Inventory" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>{{__('translate.Add Inventory')}}
                </a>
                <a type="button" class="nav-link underline side-bar-link load-page" data-url="{{ route('inventory_details.action') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Inventory Data Export" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>Inventory Download
                </a>
            </nav>
        </div>

    </li>
</ul>
<!-- =========== Supplier =============== -->
<a class="nav-link_cgrMenu dropdown-toggle ty" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>Supplier</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="auth_" aria-labelledby="headingTwo" data-bs-parent="#auth_">
            <nav class="sb-sidenav-menu-nested nav">
                <a type="button" class="nav-link underline side-bar-link load-page" data-url="{{ route('supplier.index') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Create Supplier" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>{{__('translate.Supplier-Create')}}
                </a>
                <a type="button" class="nav-link underline side-bar-link load-page" data-url="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Supplier Record" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>{{__('translate.Supplier Record')}}
                </a>
                <a type="button" class="nav-link underline side-bar-link load-page" data-url="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Supplier Requsition" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>{{__('translate.Supplier Requisition')}}
                </a>
            </nav>
        </div>

    </li>
</ul>
@endif