<?php
    // Stock Menu
    $stockMenuButtons = [
        ['btnId'=>'','label'=>'Stock Summary','btnClass'=>'sub-menu-btn side-bar-link','url'=>'#'],
        ['btnId'=>'','label'=>'Stock-Book','btnClass'=>'sub-menu-btn side-bar-link','url'=>'#'],
        ['btnId'=>'','label'=>'Adjustment','btnClass'=>'sub-menu-btn side-bar-link','url'=>'#'],
        ['btnId'=>'','label'=>'Damage-Stock','btnClass'=>'sub-menu-btn side-bar-link','url'=>'#'],
        ['btnId'=>'','label'=>'Stock-Report','btnClass'=>'sub-menu-btn side-bar-link','url'=>'#']
    ];
    // Supplier Menu
    $supplierMenuButtons = [
        ['btnId' => '','label' => 'Create','btnClass' => 'sub-menu-btn side-bar-link' . (Request::routeIs('supplier.index') ? ' menu_btn_active' : ''),'url' => route('supplier.index')],
        ['btnId' => '','label' => 'Record','btnClass' => 'sub-menu-btn side-bar-link','url' => '#'],
        ['btnId' => '','label' => 'Requisition','btnClass' => 'sub-menu-btn side-bar-link','url' => '#'],
        ['btnId' => '','label' => 'Setting','btnClass' => 'sub-menu-btn side-bar-link','url' => '#']
    ];
    // Pivot Table Menu
    $pivotTableMenuButtons = [
        ['btnId' => '','label' => 'Order','btnClass' => 'sub-menu-btn side-bar-link' . (Request::routeIs('showOrder_pivot') ? ' menu_btn_active' : ''),'url' => route('showOrder_pivot')],
        ['btnId' => '','label' => 'Sales','btnClass' => 'sub-menu-btn side-bar-link' . (Request::routeIs('showSales_pivot') ? ' menu_btn_active' : ''),'url' => route('showSales_pivot')],
        ['btnId' => '','label' => 'Expenses','btnClass' => 'sub-menu-btn side-bar-link' . (Request::routeIs('expenses_index') ? ' menu_btn_active' : ''),'url' => route('expenses_index')],
        ['btnId' => '','label' => 'Supplier','btnClass' => 'sub-menu-btn side-bar-link' . (Request::routeIs('supplier_index') ? ' menu_btn_active' : ''),'url' => route('supplier_index')]
    ];
    // Item Menu
    $medicineItemMenuButtons = [
        ['btnId' => '','label' => 'Medicine Group','btnClass' => 'sub-menu-btn side-bar-link' . (Request::routeIs('medicine-group.index') ? ' menu_btn_active' : ''),'url' => route('medicine-group.index')],
        ['btnId' => '','label' => 'Medicine Name','btnClass' => 'sub-menu-btn side-bar-link' . (Request::routeIs('medicine-name.index') ? ' menu_btn_active' : ''),'url' => route('medicine-name.index')],
        ['btnId' => '','label' => 'Medicine Dosage','btnClass' => 'sub-menu-btn side-bar-link' . (Request::routeIs('medicine-dogs.index') ? ' menu_btn_active' : ''),'url' => route('medicine-dogs.index')]
    ];
    $productQuotationItemMenuButtons = [
        ['btnId' => '','label' => 'Product Quotation','btnClass' => 'sub-menu-btn side-bar-link','url' => '#']
    ];
    $postItemMenuButtons = [
        ['btnId' => '','label' => 'Category','btnClass' => 'sub-menu-btn side-bar-link','url' => '#'],
        ['btnId' => '','label' => 'Sub Category','btnClass' => 'sub-menu-btn side-bar-link','url' => '#'],
        ['btnId' => '','label' => 'Group','btnClass' => 'sub-menu-btn side-bar-link','url' => '#'],
        ['btnId' => '','label' => 'Post Setting','btnClass' => 'sub-menu-btn side-bar-link','url' => '#']
    ];
    $productItemMenuButtons = [
        ['btnId' => '','label' => 'Category','btnClass' => 'sub-menu-btn side-bar-link' . (Request::routeIs('category.index') ? ' menu_btn_active' : ''),'url' => route('category.index')],
        ['btnId' => '','label' => 'Sub-Category','btnClass' => 'sub-menu-btn side-bar-link' . (Request::routeIs('sub-category.index') ? ' menu_btn_active' : ''),'url' => route('sub-category.index')],
        ['btnId' => '','label' => 'Product-Group','btnClass' => 'sub-menu-btn side-bar-link','url' => '#'],
        ['btnId' => '','label' => 'Product','btnClass' => 'sub-menu-btn side-bar-link' . (Request::routeIs('product.index') ? ' menu_btn_active' : ''),'url' => route('product.index')],
        ['btnId' => '','label' => 'Units','btnClass' => 'sub-menu-btn side-bar-link' . (Request::routeIs('units.index') ? ' menu_btn_active' : ''),'url' => route('units.index')],
        ['btnId' => '','label' => 'Origin','btnClass' => 'sub-menu-btn side-bar-link' . (Request::routeIs('origin.index') ? ' menu_btn_active' : ''),'url' => route('origin.index')],
        ['btnId' => '','label' => 'Brand','btnClass' => 'sub-menu-btn side-bar-link' . (Request::routeIs('brand.index') ? ' menu_btn_active' : ''),'url' => route('brand.index')],
        ['btnId' => '','label' => 'Model','btnClass' => 'sub-menu-btn side-bar-link' . (Request::routeIs('model.index') ? ' menu_btn_active' : ''),'url' => route('model.index')]
    ];
?>
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="{{setting('navbar_all_moduel_display')}}" id="navbar">
            <nav class="navigation form-controll form-controll-sm dsh_nav sticky-top {{setting('navbar_all_moduel_display')}}" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb mt-1">
                    <li class="" aria-current="page">
                        <div class="progress_login_header loadheight">
                            <div id="loader" class="progress-bar progress-bar-striped progress-bar-animated bg-primary ps-5 ms-3" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown dashboard_menubar ms-1">
                            @if(auth()->user()->role ==1)
                            <i class="fa-solid fa-hourglass-half fa-bounce" style="color: darkgray;"></i>
                            <a type="button" class="dropbtn side-bar-link {{ Request::routeIs('super-admin.dashboard') ? 'nav-active' : '' }}" data-url="{{ route('super-admin.dashboard') }}"><strong>{{__('translate.Dashboard')}}</strong></a>
                            @endif
                            @if(auth()->user()->role ==2)
                            <i class="fa-solid fa-hourglass-half fa-bounce" style="color: darkgray;"></i>
                            <a type="button" class="dropbtn side-bar-link {{ Request::routeIs('sub-admin.dashboard') ? 'nav-active' : '' }}" data-url="{{route ('sub-admin.dashboard') }}"><strong>{{__('translate.Sub-Admin')}}</strong></a>
                            @endif
                            @if(auth()->user()->role ==3)
                            <i class="fa-solid fa-hourglass-half fa-bounce" style="color: darkgray;"></i>
                            <a type="button" class="dropbtn side-bar-link {{ Request::routeIs('admin.dashboard') ? 'nav-active' : '' }}" data-url="{{route ('admin.dashboard') }}"><strong>{{__('translate.Admin')}}</strong></a>
                            @endif
                            @if(auth()->user()->role ==5)
                            <i class="fa-solid fa-hourglass-half fa-bounce" style="color: darkgray;"></i>
                            <a type="button" class="dropbtn side-bar-link {{ Request::routeIs('accounts.dashboard') ? 'nav-active' : '' }}" data-url="{{route ('accounts.dashboard') }}"><strong>Accounts-Menu</strong></a>
                            @endif
                            @if(auth()->user()->role ==6)
                            <i class="fa-solid fa-hourglass-half fa-bounce" style="color: darkgray;"></i>
                            <a type="button" class="dropbtn side-bar-link {{ Request::routeIs('marketing.dashboard') ? 'nav-active' : '' }}" data-url="{{route ('marketing.dashboard') }}"><strong>Marketing-Menu</strong></a>
                            @endif
                            @if(auth()->user()->role ==7)
                            <i class="fa-solid fa-hourglass-half fa-bounce" style="color: darkgray;"></i>
                            <a type="button" class="dropbtn side-bar-link {{ Request::routeIs('delivery-team.dashboard') ? 'nav-active' : '' }}" data-url="{{route ('delivery-team.dashboard') }}"><strong>Delivery-Menu</strong></a>
                            @endif
                            @if(auth()->user()->role ==0)
                            <i class="fa-solid fa-hourglass-half fa-bounce" style="color: darkgray;"></i>
                            <a type="button" class="dropbtn side-bar-link {{ Request::routeIs('doctors.dashboard') ? 'nav-active' : '' }}" data-url="{{route ('doctors.dashboard') }}"><strong>{{__('translate.Doctors')}}</strong></a>
                            @endif
                        </div>
                    </li>
                    @if(auth()->user()->role ==1)
                    <!-- ======= Stock-Menu ============ -->
                    <li>
                        <x-MenuCards.MenuCard menuParentClass="dropdown menubar-component {{setting('navbar_stock_moduel_display')}}" menuChildClass="dropdown-content dropdown-menu-component menu-card" activeMenu="" wrapperId="NavBarStockMenuCard" menuName="{{__('translate.Stock')}}" menuId="dropbtn" showIdClassName="" menuIcon="">
                            <div class="menu-card-header">
                                <svg id="Layer_1" data-name="Layer 1" width="20px" height="20px" fill="rgba(0,123,255,0.4)" viewBox="0 0 135.42 122.88"><title>bar-chart</title><path d="M65.62,14.08H85.85a2,2,0,0,1,2,2V95.56a2,2,0,0,1-2,2H65.62a2,2,0,0,1-2-2V16a2,2,0,0,1,2-2Zm69.8,108.8H9.93v0A9.89,9.89,0,0,1,0,113H0V0H12.69V110.19H135.42v12.69ZM103.05,53.8h20.23a2,2,0,0,1,2,2V95.56a2,2,0,0,1-2,2H103.05a2,2,0,0,1-2-2V55.75a2,2,0,0,1,2-2ZM28.19,29.44H48.42a2,2,0,0,1,1.95,1.95V95.56a2,2,0,0,1-1.95,2H28.19a2,2,0,0,1-2-2V31.39a2,2,0,0,1,2-1.95Z"/></svg>
                                <span class="ms-1">Stock Book</span>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <ul class="menu-btn-group">
                                        @foreach($stockMenuButtons as $data)
                                        <li class="child-line-row">
                                            <x-Buttons.MenuButtons.SubMenuCardButton className="{{ $data['btnClass'] }}" dataURL="{{ $data['url'] }}" subMenuBtnId="{{ $data['btnId'] }}">
                                                <svg width="18" height="17" viewBox="0 0 24 24" fill="none" stroke="dodgerblue" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link-2">
                                                    <path d="M15 7h3a5 5 0 0 1 5 5 5 5 0 0 1-5 5h-3m-6 0H6a5 5 0 0 1-5-5 5 5 0 0 1 5-5h3"/>
                                                    <line x1="8" y1="12" x2="16" y2="12"/>
                                                </svg>
                                                <span class="ms-2">{{__('translate.'.$data['label'])}}</span>
                                            </x-Buttons.MenuButtons.SubMenuCardButton>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <span class="menu-card-arrow"></span>
                        </x-MenuCard.MenuCard>
                    </li>
                    <!-- ======= Supplier-Menu ============ -->
                    <li>
                        <x-MenuCards.MenuCard menuParentClass="dropdown menubar-component {{setting('navbar_supplier_moduel_display')}}" menuChildClass="dropdown-content dropdown-menu-component menu-card" activeMenu="ms-2 {{ Request::is('company-supplier/suppliers/index') || Request::is('company-supplier/suppliers/access-permission') ? 'nav-active' : '' }}" wrapperId="NavBarSupplierMenuCard" menuName="{{__('translate.Supplier')}}" menuId="dropbtn" showIdClassName="" menuIcon="">
                            <div class="menu-card-header">
                                <svg  width="20px" height="20px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 479.16">
                                    <path fill="rgba(0,123,255,0.4)" d="m0 431.82 366 47.34 139.66-90.53L507.59 44 184.93 0 0 83.91z"/>
                                    <path fill="rgba(0,123,255,0.8)" d="m507.59 44-142.87 89.47L0 83.91 184.93 0z"/>
                                    <path fill="rgba(0,123,255,0.8)" d="m366.06 479.16-1.34-345.69L507.59 44 512 389.98z"/>
                                    <path fill="rgba(0,123,255,0.8)" d="m249.76 8.84 105.69 14.41-151.29 90.4-.09 156.47-53.83-36.66-53.84 30.43 6.72-164.29z"/>
                                </svg>
                                <span class="ms-1">Supplier</span>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <ul class="menu-btn-group">
                                        @foreach($supplierMenuButtons as $data)
                                        <li class="child-line-row">
                                            <x-Buttons.MenuButtons.SubMenuCardButton className="{{ $data['btnClass'] }}" dataURL="{{ $data['url'] }}" subMenuBtnId="{{ $data['btnId'] }}">
                                                <svg width="18" height="17" viewBox="0 0 24 24" fill="none" stroke="dodgerblue" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link-2">
                                                    <path d="M15 7h3a5 5 0 0 1 5 5 5 5 0 0 1-5 5h-3m-6 0H6a5 5 0 0 1-5-5 5 5 0 0 1 5-5h3"/>
                                                    <line x1="8" y1="12" x2="16" y2="12"/>
                                                </svg>
                                                <span class="ms-2">{{__('translate.'.$data['label'])}}</span>
                                            </x-Buttons.MenuButtons.SubMenuCardButton>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <span class="menu-card-arrow"></span>
                        </x-MenuCard.MenuCard>
                    </li>
                    <!-- ======= Pivot Table-Menu ============ -->
                    <li>
                        <x-MenuCards.MenuCard menuParentClass="dropdown menubar-component {{setting('navbar_pivot_moduel_display')}}" menuChildClass="dropdown-content dropdown-menu-component menu-card" activeMenu="ms-2 {{ Request::is('super-admin/pivot-tables/supplier-pivot-table') || Request::is('super-admin/pivot-tables/order-pivot-table') || Request::is('super-admin/pivot-tables/sales-pivot-table') || Request::is('super-admin/pivot-tables/expenses-pivot-table') ? 'nav-active' : '' }}" wrapperId="NavBarPivotTableMenuCard" menuName="{{__('translate.Pivot-Table')}}" menuId="dropbtn" showIdClassName="" menuIcon="">
                            <div class="menu-card-header">
                                <svg version="1.1" id="Layer_1" width="25px" height="25px" fill="rgba(0,123,255,0.4)" x="0px" y="0px" viewBox="0 0 122.9 85.6" style="enable-background:new 0 0 122.9 85.6" xml:space="preserve">
                                    <style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style>
                                    <g>
                                        <path class="st0" d="M7.5,0h107.9c4.1,0,7.5,3.4,7.5,7.5v70.6c0,4.1-3.4,7.5-7.5,7.5H7.5c-4.1,0-7.5-3.4-7.5-7.5V7.5 C0,3.4,3.4,0,7.5,0L7.5,0z M69.9,63.3h28.5v4H69.9V63.3L69.9,63.3z M69.9,53.1H109v4H69.9V53.1L69.9,53.1z M92.1,35h5.6 c0.3,0,0.5,0.2,0.5,0.5v11c0,0.3-0.2,0.5-0.5,0.5h-5.6c-0.3,0-0.5-0.2-0.5-0.5v-11C91.6,35.3,91.8,35,92.1,35L92.1,35L92.1,35z M70.5,28.3h5.6c0.3,0,0.5,0.2,0.5,0.5v17.8c0,0.3-0.2,0.5-0.5,0.5h-5.6c-0.3,0-0.5-0.2-0.5-0.5V28.8 C69.9,28.5,70.2,28.3,70.5,28.3L70.5,28.3L70.5,28.3L70.5,28.3z M81.3,24.5h5.6c0.3,0,0.5,0.2,0.5,0.5v21.6c0,0.3-0.2,0.5-0.5,0.5 h-5.6c-0.3,0-0.5-0.2-0.5-0.5V25C80.8,24.7,81,24.5,81.3,24.5L81.3,24.5L81.3,24.5z M39.3,48.2l17,0.3c0,6.1-3,11.7-8,15.1 L39.3,48.2L39.3,48.2L39.3,48.2z M37.6,45.3l-0.2-19.8l0-1.3l1.3,0.1h0h0c1.6,0.1,3.2,0.4,4.7,0.8c1.5,0.4,2.9,1,4.3,1.7 c6.9,3.6,11.7,10.8,12.1,19l0.1,1.3l-1.3,0l-19.7-0.6l-1.1,0L37.6,45.3L37.6,45.3L37.6,45.3z M39.8,26.7L40,44.1l17.3,0.5 c-0.7-6.8-4.9-12.7-10.7-15.8c-1.2-0.6-2.5-1.1-3.8-1.5C41.7,27.1,40.8,26.9,39.8,26.7L39.8,26.7L39.8,26.7z M35.9,47.2L45.6,64 c-3,1.7-6.3,2.6-9.7,2.6c-10.7,0-19.4-8.7-19.4-19.4c0-10.4,8.2-19,18.6-19.4L35.9,47.2L35.9,47.2L35.9,47.2z M115.6,14.1H7.2v64.4 h108.4V14.1L115.6,14.1L115.6,14.1z"/>
                                    </g>
                                </svg>
                                <span class="ms-1">Pivot Table</span>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <ul class="menu-btn-group">
                                        @foreach($pivotTableMenuButtons as $data)
                                        <li class="child-line-row">
                                            <x-Buttons.MenuButtons.SubMenuCardButton className="{{ $data['btnClass'] }}" dataURL="{{ $data['url'] }}" subMenuBtnId="{{ $data['btnId'] }}">
                                                <svg width="18" height="17" viewBox="0 0 24 24" fill="none" stroke="dodgerblue" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link-2">
                                                    <path d="M15 7h3a5 5 0 0 1 5 5 5 5 0 0 1-5 5h-3m-6 0H6a5 5 0 0 1-5-5 5 5 0 0 1 5-5h3"/>
                                                    <line x1="8" y1="12" x2="16" y2="12"/>
                                                </svg>
                                                <span class="ms-2">{{__('translate.'.$data['label'])}}</span>
                                            </x-Buttons.MenuButtons.SubMenuCardButton>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <span class="menu-card-arrow"></span>
                        </x-MenuCard.MenuCard>
                    </li>
                    <!-- ======= Item-Menu ============ -->
                    <li>
                        <x-MenuCards.MenuCard menuParentClass="dropdown menubar-component {{setting('navbar_item_list_moduel_display')}}" 
                            menuChildClass="dropdown-content dropdown-menu-component menu-card" 
                            activeMenu="ms-2 {{ Request::is('product-components/category') || Request::is('product-components/sub-category') || 
                                Request::is('medicine-components/medicine-group') || Request::is('medicine-components/medicine-name') || Request::is('medicine-components/medicine-dosage')
                                || Request::is('product-components/product') || Request::is('product-components/product') || Request::is('product-components/units') || Request::is('product-components/origin')
                                || Request::is('product-components/brand') || Request::is('product-components/model') ? 'nav-active' : '' }}" 
                            wrapperId="NavBarItemsMenuCard" menuName="{{__('translate.Iteam')}}" menuId="dropbtn" showIdClassName="" menuIcon="">
                            <div class="menu-card-header">
                                <svg id="Layer_1" data-name="Layer 1" width="25px" height="25px" fill="rgba(0,123,255,0.4)" viewBox="0 0 122.88 111.48">
                                    <defs><style>.cls-1{fill-rule:#cf8b00;}</style></defs><title>tech</title>
                                    <path class="" d="M50.21,38.57A17.17,17.17,0,1,1,33,55.74,17.17,17.17,0,0,1,50.21,38.57ZM91.31,94V85.28H67.46a44,44,0,0,0,5.64-6.17H94.38a3.09,3.09,0,0,1,3.08,3.07V94A9,9,0,1,1,91.31,94ZM89.16,30.71H75.51A44.78,44.78,0,0,0,71,24.55H86.09v-7a9,9,0,1,1,6.15-.06V27.64a3.07,3.07,0,0,1-3.08,3.07ZM122.88,15a9,9,0,1,0-12.65,8.25v18H80.12a43.4,43.4,0,0,1,1.27,6.16H113.3a3.09,3.09,0,0,0,3.07-3.08V23.67A9,9,0,0,0,122.88,15Zm-.15,49.93a9,9,0,0,0-17.49-3.08H80.88A42.08,42.08,0,0,1,79.14,68h26.1a9,9,0,0,0,17.49-3.07ZM49.56,105.3H46a6.13,6.13,0,0,1-6.12-6.11V92.93a38.11,38.11,0,0,1-10-3.78l-4.18,4.18a6.13,6.13,0,0,1-8.65,0L12,88.24a6.14,6.14,0,0,1,0-8.65l3.81-3.81a38,38,0,0,1-4.47-10.33H6.12A6.13,6.13,0,0,1,0,59.34v-7.2A6.13,6.13,0,0,1,6.12,46h5.12a38,38,0,0,1,4.44-10.44L12,31.88a6.14,6.14,0,0,1,0-8.64l5.09-5.09a6.13,6.13,0,0,1,8.65,0l4,4a38,38,0,0,1,10.13-3.87v-6A6.13,6.13,0,0,1,46,6.18h7.19A6.13,6.13,0,0,1,59.27,12V32.48A24.54,24.54,0,0,0,50.84,31c-.43,0-.86,0-1.28,0s-.85,0-1.27,0a24.61,24.61,0,1,0,0,49.21c.42,0,.85,0,1.27,0s.85,0,1.28,0a24.54,24.54,0,0,0,8.43-1.48V99.48a6.13,6.13,0,0,1-6.11,5.82Z"/>
                                </svg>
                                <span class="ms-2">Items Menu</span>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <ul class="menu-btn-group">
                                        <!-- Medicine-SubMenu -->
                                        <li class="line-row dropdown-medicine-submenu-component-wrapper">
                                            <x-Buttons.MenuButtons.MenuCardButton className="menu-btn" dataURL="#" menuBtnId="medicineMenu">
                                                <svg width="15px" height="10px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 511.999 507.107">
                                                    <path fill="dodgerblue" fill-rule="nonzero" d="M25.967 505.131l479.615-241.993c8.555-4.05 8.555-15.093 0-19.147L25.964 2.005C10.301-5.855-5.728 10.881 2.05 26.448l120.852 227.115L2.05 480.679c-7.868 15.689 8.377 32.206 23.917 24.452zm-1.657-22.342l116.464-218.858H458.11L24.31 482.789z"/>
                                                </svg>
                                                <span class="ms-2">{{__('translate.Medicine-Component')}}</span>
                                            </x-Buttons.MenuButtons.MenuCardButton>
                                            <x-MenuCards.SubMenuCards.SubMenuCard subMenuCardClass="dropdown-medicine-submenu-component submenu-card">
                                                @foreach($medicineItemMenuButtons as $data)
                                                <li class="child-line-row">
                                                    <x-Buttons.MenuButtons.SubMenuCardButton className="{{ $data['btnClass'] }}" dataURL="{{ $data['url'] }}" subMenuBtnId="{{ $data['btnId'] }}">
                                                        <svg width="18" height="17" viewBox="0 0 24 24" fill="none" stroke="dodgerblue" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link-2">
                                                            <path d="M15 7h3a5 5 0 0 1 5 5 5 5 0 0 1-5 5h-3m-6 0H6a5 5 0 0 1-5-5 5 5 0 0 1 5-5h3"/>
                                                            <line x1="8" y1="12" x2="16" y2="12"/>
                                                        </svg>
                                                        <span class="ms-2">{{__('translate.'.$data['label'])}}</span>
                                                    </x-Buttons.MenuButtons.SubMenuCardButton>
                                                </li>
                                                @endforeach
                                            </x-MenuCards.SubMenuCards.SubMenuCard>
                                        </li>
                                        <!-- Product Quotation-SubMenu -->
                                        <li class="line-row dropdown-product-quotation-submenu-component-wrapper">
                                            <x-Buttons.MenuButtons.MenuCardButton className="menu-btn" dataURL="#" menuBtnId="productQuotationMenu">
                                                <svg width="15px" height="10px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 511.999 507.107">
                                                    <path fill="dodgerblue" fill-rule="nonzero" d="M25.967 505.131l479.615-241.993c8.555-4.05 8.555-15.093 0-19.147L25.964 2.005C10.301-5.855-5.728 10.881 2.05 26.448l120.852 227.115L2.05 480.679c-7.868 15.689 8.377 32.206 23.917 24.452zm-1.657-22.342l116.464-218.858H458.11L24.31 482.789z"/>
                                                </svg>
                                                <span class="ms-2">{{__('translate.Product Quotation')}}</span>
                                            </x-Buttons.MenuButtons.MenuCardButton>
                                            <x-MenuCards.SubMenuCards.SubMenuCard subMenuCardClass="dropdown-product-quotation-submenu-component submenu-card">
                                                @foreach($productQuotationItemMenuButtons as $data)
                                                <li class="child-line-row">
                                                    <x-Buttons.MenuButtons.SubMenuCardButton className="{{ $data['btnClass'] }}" dataURL="{{ $data['url'] }}" subMenuBtnId="{{ $data['btnId'] }}">
                                                        <svg width="18" height="17" viewBox="0 0 24 24" fill="none" stroke="dodgerblue" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link-2">
                                                            <path d="M15 7h3a5 5 0 0 1 5 5 5 5 0 0 1-5 5h-3m-6 0H6a5 5 0 0 1-5-5 5 5 0 0 1 5-5h3"/>
                                                            <line x1="8" y1="12" x2="16" y2="12"/>
                                                        </svg>
                                                        <span class="ms-2">{{__('translate.'.$data['label'])}}</span>
                                                    </x-Buttons.MenuButtons.SubMenuCardButton>
                                                </li>
                                                @endforeach
                                            </x-MenuCards.SubMenuCards.SubMenuCard>
                                        </li>
                                        <!-- Post-SubMenu -->
                                        <li class="line-row dropdown-post-submenu-component-wrapper">
                                            <x-Buttons.MenuButtons.MenuCardButton className="menu-btn" dataURL="#" menuBtnId="postMenu">
                                                <svg width="15px" height="10px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 511.999 507.107">
                                                    <path fill="dodgerblue" fill-rule="nonzero" d="M25.967 505.131l479.615-241.993c8.555-4.05 8.555-15.093 0-19.147L25.964 2.005C10.301-5.855-5.728 10.881 2.05 26.448l120.852 227.115L2.05 480.679c-7.868 15.689 8.377 32.206 23.917 24.452zm-1.657-22.342l116.464-218.858H458.11L24.31 482.789z"/>
                                                </svg>
                                                <span class="ms-2">{{__('translate.Post-Component')}}</span>
                                            </x-Buttons.MenuButtons.MenuCardButton>
                                            <x-MenuCards.SubMenuCards.SubMenuCard subMenuCardClass="dropdown-post-submenu-component submenu-card">
                                                @foreach($postItemMenuButtons as $data)
                                                <li class="child-line-row">
                                                    <x-Buttons.MenuButtons.SubMenuCardButton className="{{ $data['btnClass'] }}" dataURL="{{ $data['url'] }}" subMenuBtnId="{{ $data['btnId'] }}">
                                                        <svg width="18" height="17" viewBox="0 0 24 24" fill="none" stroke="dodgerblue" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link-2">
                                                            <path d="M15 7h3a5 5 0 0 1 5 5 5 5 0 0 1-5 5h-3m-6 0H6a5 5 0 0 1-5-5 5 5 0 0 1 5-5h3"/>
                                                            <line x1="8" y1="12" x2="16" y2="12"/>
                                                        </svg>
                                                        <span class="ms-2">{{__('translate.'.$data['label'])}}</span>
                                                    </x-Buttons.MenuButtons.SubMenuCardButton>
                                                </li>
                                                @endforeach
                                            </x-MenuCards.SubMenuCards.SubMenuCard>
                                        </li>
                                        <!-- Product-SubMenu -->
                                        <li class="line-row dropdown-product-submenu-component-wrapper">
                                            <x-Buttons.MenuButtons.MenuCardButton className="menu-btn" dataURL="#" menuBtnId="postMenu">
                                                <svg width="15px" height="10px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 511.999 507.107">
                                                    <path fill="dodgerblue" fill-rule="nonzero" d="M25.967 505.131l479.615-241.993c8.555-4.05 8.555-15.093 0-19.147L25.964 2.005C10.301-5.855-5.728 10.881 2.05 26.448l120.852 227.115L2.05 480.679c-7.868 15.689 8.377 32.206 23.917 24.452zm-1.657-22.342l116.464-218.858H458.11L24.31 482.789z"/>
                                                </svg>
                                                <span class="ms-2">{{__('translate.Product-Component')}}</span>
                                            </x-Buttons.MenuButtons.MenuCardButton>
                                            <x-MenuCards.SubMenuCards.SubMenuCard subMenuCardClass="dropdown-product-submenu-component submenu-card">
                                                @foreach($productItemMenuButtons as $data)
                                                <li class="child-line-row">
                                                    <x-Buttons.MenuButtons.SubMenuCardButton className="{{ $data['btnClass'] }}" dataURL="{{ $data['url'] }}" subMenuBtnId="{{ $data['btnId'] }}">
                                                        <svg width="18" height="17" viewBox="0 0 24 24" fill="none" stroke="dodgerblue" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link-2">
                                                            <path d="M15 7h3a5 5 0 0 1 5 5 5 5 0 0 1-5 5h-3m-6 0H6a5 5 0 0 1-5-5 5 5 0 0 1 5-5h3"/>
                                                            <line x1="8" y1="12" x2="16" y2="12"/>
                                                        </svg>
                                                        <span class="ms-2">{{__('translate.'.$data['label'])}}</span>
                                                    </x-Buttons.MenuButtons.SubMenuCardButton>
                                                </li>
                                                @endforeach
                                            </x-MenuCards.SubMenuCards.SubMenuCard>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <span class="menu-card-arrow"></span>
                        </x-MenuCard.MenuCard>
                    </li>
                    @endif

                    @if(auth()->user()->role==3)
                    <li>
                        <div class="dropdown dashboard_menubar">
                            <a class="dropbtn"><i class="fa-solid fa-hourglass-half fa-bounce" style="color: darkgray;"></i> {{__('translate.Menu List')}}</a>
                            <div class="dropdown-content iteam_list">
                                <div class="row">
                                    <div class="col-6 medicine">
                                        <span class="medicinepart ms-3"> {{__('translate.Blog-Post')}}</span>
                                        <a type="button" class="side-bar-link" data-url="{{ route('categories.index') }}">
                                            <svg width="15px" height="10px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 511.999 507.107"><path fill="#2470BD" fill-rule="nonzero" d="M25.967 505.131l479.615-241.993c8.555-4.05 8.555-15.093 0-19.147L25.964 2.005C10.301-5.855-5.728 10.881 2.05 26.448l120.852 227.115L2.05 480.679c-7.868 15.689 8.377 32.206 23.917 24.452zm-1.657-22.342l116.464-218.858H458.11L24.31 482.789z"/></svg>
                                            {{__('translate.Category Post List')}}
                                        </a>
                                        <a type="button" class="side-bar-link" data-url="{{ route('create.category') }}">
                                            <svg width="15px" height="10px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 511.999 507.107"><path fill="#2470BD" fill-rule="nonzero" d="M25.967 505.131l479.615-241.993c8.555-4.05 8.555-15.093 0-19.147L25.964 2.005C10.301-5.855-5.728 10.881 2.05 26.448l120.852 227.115L2.05 480.679c-7.868 15.689 8.377 32.206 23.917 24.452zm-1.657-22.342l116.464-218.858H458.11L24.31 482.789z"/></svg>
                                            {{__('translate.Create Category Post')}}
                                        </a>
                                        <a type="button" class="side-bar-link" data-url="{{ route('create.post') }}">
                                            <svg width="15px" height="10px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 511.999 507.107"><path fill="#2470BD" fill-rule="nonzero" d="M25.967 505.131l479.615-241.993c8.555-4.05 8.555-15.093 0-19.147L25.964 2.005C10.301-5.855-5.728 10.881 2.05 26.448l120.852 227.115L2.05 480.679c-7.868 15.689 8.377 32.206 23.917 24.452zm-1.657-22.342l116.464-218.858H458.11L24.31 482.789z"/></svg>
                                            {{__('translate.Create Post')}}
                                        </a>
                                        <a type="button" class="side-bar-link" data-url="{{ route('post.index') }}">
                                            <svg width="15px" height="10px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 511.999 507.107"><path fill="#2470BD" fill-rule="nonzero" d="M25.967 505.131l479.615-241.993c8.555-4.05 8.555-15.093 0-19.147L25.964 2.005C10.301-5.855-5.728 10.881 2.05 26.448l120.852 227.115L2.05 480.679c-7.868 15.689 8.377 32.206 23.917 24.452zm-1.657-22.342l116.464-218.858H458.11L24.31 482.789z"/></svg>
                                            {{__('translate.Post List')}}
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <span class="medicinepart ms-3">{{__('translate.Medicine-Post')}}</span>
                                        <a type="button" class="side-bar-link" data-url="{{ route('create.doctorpost') }}">
                                            <svg width="15px" height="10px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 511.999 507.107"><path fill="#2470BD" fill-rule="nonzero" d="M25.967 505.131l479.615-241.993c8.555-4.05 8.555-15.093 0-19.147L25.964 2.005C10.301-5.855-5.728 10.881 2.05 26.448l120.852 227.115L2.05 480.679c-7.868 15.689 8.377 32.206 23.917 24.452zm-1.657-22.342l116.464-218.858H458.11L24.31 482.789z"/></svg>
                                            {{__('translate.Create Medidicine Post')}}
                                        </a>
                                        <a type="button" class="side-bar-link" data-url="{{ route('doctors.index') }}">
                                            <svg width="15px" height="10px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 511.999 507.107"><path fill="#2470BD" fill-rule="nonzero" d="M25.967 505.131l479.615-241.993c8.555-4.05 8.555-15.093 0-19.147L25.964 2.005C10.301-5.855-5.728 10.881 2.05 26.448l120.852 227.115L2.05 480.679c-7.868 15.689 8.377 32.206 23.917 24.452zm-1.657-22.342l116.464-218.858H458.11L24.31 482.789z"/></svg>
                                            {{__('translate.Post List')}}
                                        </a>
                                    </div>
                                    <div class="col-6 medicine">
                                        <span class="medicinepart ms-3">{{__('translate.Inventory')}}</span>
                                        <a type="button" class="side-bar-link" data-url="{{ route('medicine-inventory.index') }}">
                                            <svg width="15px" height="10px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 511.999 507.107"><path fill="#2470BD" fill-rule="nonzero" d="M25.967 505.131l479.615-241.993c8.555-4.05 8.555-15.093 0-19.147L25.964 2.005C10.301-5.855-5.728 10.881 2.05 26.448l120.852 227.115L2.05 480.679c-7.868 15.689 8.377 32.206 23.917 24.452zm-1.657-22.342l116.464-218.858H458.11L24.31 482.789z"/></svg>
                                            {{__('translate.Create Inventory')}}
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <span class="medicinepart ms-3"></span>
                                        <a type="button" class="side-bar-link" data-url="#"></a>
                                    </div>
                                </div>
                                <span class="custom-list-arrow"></span>
                            </div>
                        </div>
                    </li>
                    @endif

                    <!-- ======= Order List ============ -->
                    <li>
                        <x-MenuCards.MenuCard menuParentClass="dropdown menubar-component {{setting('navbar_order_box_moduel_display')}}" menuChildClass="dropdown-content dropdown-menu-component menu-card" activeMenu="ms-2" wrapperId="NavBarOrderMenuCard" menuName="Order" menuId="dropbtn" showIdClassName="" menuIcon="">
                            <div class="menu-card-header">
                                <svg width="35px" height="35px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 441 512.398"><path fill="#009f00" fill-rule="nonzero" d="M102.778 354.886c-5.727 0-10.372-4.645-10.372-10.372s4.645-10.372 10.372-10.372h85.568a148.095 148.095 0 00-7.597 20.744h-77.971zm0-145.37c-5.727 0-10.372-4.645-10.372-10.372 0-5.726 4.645-10.372 10.372-10.372h151.288c5.727 0 10.372 4.646 10.372 10.372 0 5.727-4.645 10.372-10.372 10.372H102.778zm0 72.682c-5.727 0-10.372-4.646-10.372-10.373 0-5.727 4.645-10.372 10.372-10.372H246.05c2.83 0 5.395 1.134 7.265 2.971a149.435 149.435 0 00-25.876 17.774H102.778z"/><path fill="#0d6efd" d="M324.263 278.925c32.23 0 61.418 13.067 82.544 34.192C427.933 334.241 441 363.43 441 395.66c0 32.236-13.067 61.419-34.193 82.544-21.126 21.126-50.31 34.194-82.544 34.194-32.232 0-61.419-13.068-82.543-34.194-21.125-21.125-34.194-50.312-34.194-82.544s13.069-61.417 34.194-82.543c21.126-21.125 50.309-34.192 82.543-34.192zM60.863 0h174.809c3.382 0 6.384 1.619 8.279 4.124l110.107 119.119a10.292 10.292 0 012.745 7.012h.053v119.817a149.591 149.591 0 00-20.752-3.111v-92.212h-43.666v-.042h-.161c-22.046-.349-39.33-6.222-51.694-16.784-12.849-10.979-20.063-26.614-21.504-46.039a10.145 10.145 0 01-.095-1.404V20.752H60.863c-11.02 0-21.049 4.516-28.321 11.79-7.274 7.272-11.79 17.301-11.79 28.321v338.276c0 11.015 4.521 21.037 11.796 28.311 7.278 7.28 17.31 11.802 28.315 11.802h120.749a148.132 148.132 0 008.116 20.752H60.863c-16.73 0-31.958-6.85-42.987-17.881C6.852 431.099 0 415.882 0 399.139V60.863C0 44.114 6.842 28.894 17.87 17.87 28.894 6.842 44.114 0 60.863 0zm178.873 29.983v60.433c1.021 13.737 5.819 24.535 14.302 31.783 8.667 7.404 21.488 11.544 38.4 11.835v-.037h43.442L239.736 29.983zm19.574 355.276l53.294 51.131v-25.502c31.087-6.24 56.244-1.705 76.606 23.636-2.869-44.518-31.927-72.567-76.606-74.456v-25.94l-53.294 51.131z"/></svg> 
                                <span class="ms-1 pt-1">Order-List</span>
                            </div>
                            <div class="row mt-2">
                                <div class="col-xl-12">
                                    <input class="search_message ms-1 mb-3" type="text" placeholder="{{__('translate.Search..')}}" id="myInput" onkeyup="filterFunction()">
                                </div>
                            </div>
                            <div class="order-table order-table-responsive" style="padding-left:5px;padding-right:5px;">
                                <table class="order-table table-sm" style="width:100%;">
                                    <thead>
                                        <tr class="table-row order_body acc_setting_table">
                                            <th id="th_sort" style="background-color: white;" class="table_th_color tot_pending_ ps-1">S.N</th>
                                            <th id="th_sort" style="background-color: white;" class="table_th_color tot_pending_ ps-1">Customer</th>
                                            <th id="th_sort" style="background-color: white;" class="table_th_color tot_pending_ ps-1">Order</th>
                                            <th id="th_sort" style="background-color: white;" class="table_th_color tot_pending_ ps-1">Location</th>
                                            <th id="th_sort" style="background-color: white;" class="table_th_color tot_pending_ ps-1">Justify</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-transparent">
                                        <tr class="table-row user-table-row supp-table-row">
                                            <td class="border_ord ps-1"><a type="button" data-url="#about">1</a></td>
                                            <td class="txt_ ps-1">CU-0000</td>
                                            <td class="txt_ ps-1">OR-0000</td>
                                            <td class="txt_ ps-1">Dhaka</td>
                                            <td class="txt_ ps-1">Pending</td>
                                        </tr>
                                        <tr class="table-row user-table-row supp-table-row">
                                            <td class="border_ord ps-1"><a type="button" data-url="#about">2</a></td>
                                            <td class="txt_ ps-1">CU-0001</td>
                                            <td class="txt_ ps-1">OR-0001</td>
                                            <td class="txt_ ps-1">Dhaka</td>
                                            <td class="txt_ ps-1">Pending</td>
                                        </tr>
                                        <tr class="table-row user-table-row supp-table-row">
                                            <td class="border_ord ps-1"><a type="button" data-url="#about">3</a></td>
                                            <td class="txt_ ps-1">CU-0003</td>
                                            <td class="txt_ ps-1">OR-0003</td>
                                            <td class="txt_ ps-1">Natore</td>
                                            <td class="txt_ ps-1">Justified</td>
                                        </tr>
                                        <tr class="table-row user-table-row supp-table-row">
                                            <td class="border_ord ps-1"><a type="button" data-url="#about">4</a></td>
                                            <td class="txt_ ps-1">CU-0004</td>
                                            <td class="txt_ ps-1">OR-0004</td>
                                            <td class="txt_ ps-1">Rangpur</td>
                                            <td class="txt_ ps-1">Justified</td>
                                        </tr>
                                        <tr class="table-row user-table-row supp-table-row">
                                            <td class="border_ord ps-1"><a type="button" data-url="#about">5</a></td>
                                            <td class="txt_ ps-1">CU-0005</td>
                                            <td class="txt_ ps-1">OR-0005</td>
                                            <td class="txt_ ps-1">Dinajput</td>
                                            <td class="txt_ ps-1">Justified</td>
                                        </tr>
                                        <tr class="table-row user-table-row supp-table-row">
                                            <td class="border_ord ps-1"><a type="button" data-url="#about">6</a></td>
                                            <td class="txt_ ps-1">CU-0006</td>
                                            <td class="txt_ ps-1">OR-0006</td>
                                            <td class="txt_ ps-1">Gazipur</td>
                                            <td class="txt_ ps-1">Justified</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <tfoot>
                                    <tr>
                                        <td>
                                            <a type="button" class="dropdown-item text-center small text-gray-500 side-bar-link" data-url="#">{{__('translate.Read More Messages')}}</a>
                                        </td>
                                    </tr>
                                </tfoot>
                            </div>
                            <span class="menu-card-arrow"></span>
                        </x-MenuCard.MenuCard>
                    </li>
                    <!-- ======= Language ============ -->
                    <li>
                        <x-MenuCards.MenuCard menuParentClass="dropdown menubar-component" menuChildClass="dropdown-content dropdown-menu-component menu-card" activeMenu="ms-2" wrapperId="NavBarLanguageMenuCard" menuName="{{__('translate.Language')}}" menuId="dropbtn" showIdClassName="" menuIcon="">
                            <div class="row">
                                <div class="col-12">
                                    <select name="" class="language_switcher" id="language-dropdown">
                                        <option>{{ Config::get('languages')[App::getLocale()] }}</option>
                                        @foreach (Config::get('languages') as $lang => $language)
                                            @if ($lang != App::getLocale())
                                                <option value="{{ $lang }}"> {{$language}} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <span class="custom-arrow"></span>
                                </div>
                            </div>
                            <span class="menu-card-arrow"></span>
                        </x-MenuCard.MenuCard>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<!-- ===========DASHBOARD TIME ZONE============= -->
<div class="row mt-1">
    <div class="col-xl-8 col-md-8">
        @if(auth()->user()->role ==1)
            @if(isset($page_name) && $page_name)
                <ol class="breadcrumb">
                    <span class="das_head ps-1 pe-1 mt-1">
                        <!-- active -->
                        <li class="breadcrumb-item font_color_focus">{{$page_name}}</li>
                    </span>
                </ol>
            @else
                <ol class="breadcrumb">
                    <span class="das_head ps-1 pe-1 mt-1">
                        <li class="breadcrumb-item font_color_focus">{{ __('translate.Dashboard') }}</li>
                    </span>
                </ol>
            @endif
        @endif
        @if(auth()->user()->role ==2)
        <ol class="breadcrumb">
            <span class="das_head ps-1 pe-1 mt-1">
                <li class="breadcrumb-item font_color_focus">{{__('translate.Home')}}</li>
            </span>
        </ol>
        @endif
        @if(auth()->user()->role ==3)
        <ol class="breadcrumb">
            <span class="das_head ps-1 pe-1 mt-1">
                <li class="breadcrumb-item font_color_focus">{{__('translate.Home')}}</li>
            </span>
        </ol>
        @endif
        @if(auth()->user()->role ==0)
        <ol class="breadcrumb">
            <span class="das_head ps-1 pe-1 mt-1">
                <li class="breadcrumb-item font_color_focus">{{__('translate.Home')}}</li>
            </span>
        </ol>
        @endif

    </div>
    <div class="col-xl-4 col-md-4">
        <p class="small server pt-2">
            <span class="plantform">
                <span class="serv">
                    <?php
                    $timezone = date_default_timezone_get();
                    echo "Server Time :";
                    ?>
                </span>
                <?php
                date_default_timezone_set('Asia/Dhaka');
                echo date('d l M Y') . " || ";
                echo date("h:i:sA");
                ?>
            </span>
        </p>
    </div>
</div>