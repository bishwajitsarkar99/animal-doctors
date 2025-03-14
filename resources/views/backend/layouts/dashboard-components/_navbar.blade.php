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
                            <a class="dropbtn {{ Request::routeIs('super-admin.dashboard') ? 'nav-active' : '' }}" href="{{ route('super-admin.dashboard') }}">{{__('translate.Dashboard')}}</a>
                            @endif
                            @if(auth()->user()->role ==2)
                            <i class="fa-solid fa-hourglass-half fa-bounce" style="color: darkgray;"></i>
                            <a class="dropbtn {{ Request::routeIs('sub-admin.dashboard') ? 'nav-active' : '' }}" href="{{route ('sub-admin.dashboard') }}">{{__('translate.Sub-Admin')}}</a>
                            @endif
                            @if(auth()->user()->role ==3)
                            <i class="fa-solid fa-hourglass-half fa-bounce" style="color: darkgray;"></i>
                            <a class="dropbtn {{ Request::routeIs('admin.dashboard') ? 'nav-active' : '' }}" href="{{route ('admin.dashboard') }}">{{__('translate.Admin')}}</a>
                            @endif
                            @if(auth()->user()->role ==5)
                            <i class="fa-solid fa-hourglass-half fa-bounce" style="color: darkgray;"></i>
                            <a class="dropbtn {{ Request::routeIs('accounts.dashboard') ? 'nav-active' : '' }}" href="{{route ('accounts.dashboard') }}">Accounts-Menu</a>
                            @endif
                            @if(auth()->user()->role ==6)
                            <i class="fa-solid fa-hourglass-half fa-bounce" style="color: darkgray;"></i>
                            <a class="dropbtn {{ Request::routeIs('marketing.dashboard') ? 'nav-active' : '' }}" href="{{route ('marketing.dashboard') }}">Marketing-Menu</a>
                            @endif
                            @if(auth()->user()->role ==7)
                            <i class="fa-solid fa-hourglass-half fa-bounce" style="color: darkgray;"></i>
                            <a class="dropbtn {{ Request::routeIs('delivery-team.dashboard') ? 'nav-active' : '' }}" href="{{route ('delivery-team.dashboard') }}">Delivery-Menu</a>
                            @endif
                            @if(auth()->user()->role ==0)
                            <i class="fa-solid fa-hourglass-half fa-bounce" style="color: darkgray;"></i>
                            <a class="dropbtn {{ Request::routeIs('doctors.dashboard') ? 'nav-active' : '' }}" href="{{route ('doctors.dashboard') }}">{{__('translate.Doctors')}}</a>
                            @endif
                        </div>
                    </li>
                    @if(auth()->user()->role ==1)
                    <li>
                        <div class="dropdown dashboard_menubar {{setting('navbar_stock_moduel_display')}}">
                            <a class="dropbtn">{{__('translate.Stock')}}</a>
                            <div class="dropdown-content">
                                <div class="row">
                                    <div class="col-12">
                                        <a class="mt-2" href="#">{{__('translate.Stock Summary')}}</a>
                                    </div>
                                </div>
                                <span class="custom-summary-arrow"></span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown dashboard_menubar {{setting('navbar_supplier_moduel_display')}}">
                            <a class="dropbtn {{ Request::is('supplier-summary') ? 'nav-active' : '' }}">{{__('translate.Supplier')}}</a>
                            <div class="dropdown-content">
                                <div class="row">
                                    <div class="col-12">
                                        <a class="{{ Request::routeIs('supplier_index') ? 'nav_btn_active' : '' }} mt-2" href="{{ route('supplier_index') }}">{{__('translate.Supplier Summary')}}</a>
                                    </div>
                                </div>
                                <span class="custom-summary-arrow"></span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown dashboard_menubar {{setting('navbar_pivot_moduel_display')}}">
                            <a class="dropbtn {{ Request::is('order-pivot-table') || Request::is('sales-pivot-table') || Request::is('expenses-pivot-table') ? 'nav-active' : '' }}">{{__('translate.Pivot Table')}}</a>
                            <div class="dropdown-content pivot">
                                <div class="row">
                                    <div class="col-12">
                                        <a class="{{Request::routeIs('showOrder_pivot') ? 'nav_btn_active' : '' }} mt-2" href="{{route('showOrder_pivot')}}">{{__('translate.Order')}}</a>
                                        <a class="{{Request::routeIs('showSales_pivot') ? 'nav_btn_active' : '' }} " href="{{route('showSales_pivot')}}">{{__('translate.Sales')}}</a>
                                        <a class="{{Request::routeIs('expenses_index') ? 'nav_btn_active' : '' }} " href="{{route('expenses_index')}}">{{__('translate.Expenses')}}</a>
                                    </div>
                                </div>
                                <span class="custom-pivot-list-arrow mini"></span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown dashboard_menubar {{setting('navbar_item_list_moduel_display')}}">
                            <a class="dropbtn">{{__('translate.Iteam List')}}</a>
                            <div class="dropdown-content iteam_list">
                                <div class="row ">
                                    <div class="col-6 medicine mt-1">
                                        <span class="medicinepart ms-2">{{__('translate.Medicine-Part')}}</span>
                                        <a class="mt-2" href="/category">{{__('translate.Category')}}</a>
                                        <a href="/sub-category">{{__('translate.Sub-Category')}}</a>
                                        <a href="/medicine-group">{{__('translate.Medicine Group')}}</a>
                                        <a href="/medicine-name">{{__('translate.Medicine Name')}}</a>
                                        <a href="/medicine-dosage">{{__('translate.Medicine Dosage')}}</a>
                                    </div>
                                    <div class="col-6 mt-1">
                                        <span class="medicinepart ms-2">{{__('translate.Farm-Product')}}</span>
                                        <a class="mt-2" href="/product">{{__('translate.Product')}}</a>
                                        <a href="/units">{{__('translate.Units')}}</a>
                                        <a href="/origin">{{__('translate.Origin')}}</a>
                                        <a href="/brand">{{__('translate.Brand')}}</a>
                                        <a href="/model">{{__('translate.Model')}}</a>
                                    </div>
                                </div>
                                <span class="custom-list-arrow mini"></span>
                            </div>
                        </div>
                    </li>
                    @endif

                    @if(auth()->user()->role==3)
                    <li>
                        <div class="dropdown dashboard_menubar">
                            <a class="dropbtn"><i class="fa-solid fa-hourglass-half fa-bounce" style="color: darkgray;"></i> {{__('translate.Menu List')}}</a>
                            <div class="dropdown-content iteam_list">
                                <div class="row">
                                    <div class="col-6 medicine">
                                        <span class="medicinepart ms-3">{{__('translate.Blog-Post')}}</span>
                                        <a href="{{ route('categories.index') }}">{{__('translate.Category Post List')}}</a>
                                        <a href="{{ route('create.category') }}">{{__('translate.Create Category Post')}}</a>
                                        <a href="{{ route('create.post') }}">{{__('translate.Create Post')}}</a>
                                        <a href="{{ route('post.index') }}">{{__('translate.Post List')}}</a>
                                    </div>
                                    <div class="col-6">
                                        <span class="medicinepart ms-3">{{__('translate.Medicine-Post')}}</span>
                                        <a href="{{ route('create.doctorpost') }}">{{__('translate.Create Medidicine Post')}}</a>
                                        <a href="{{ route('doctors.index') }}">{{__('translate.Post List')}}</a>
                                    </div>
                                    <div class="col-6 medicine">
                                        <span class="medicinepart ms-3">{{__('translate.Inventory')}}</span>
                                        <a href="{{ route('medicine-inventory.index') }}">{{__('translate.Create Inventory')}}</a>
                                    </div>
                                    <div class="col-6">
                                    <span class="medicinepart ms-3"></span>
                                    <a href="#"></a>
                                    </div>
                                </div>
                                <span class="custom-list-arrow"></span>
                            </div>
                        </div>
                    </li>
                    @endif

                    <li>
                        <div class="dropdown {{setting('navbar_order_box_moduel_display')}}">
                            <a type="button" onclick="myFunction()" class="dropbtn">
                                <svg version="1.1" id="Layer_1" width="18px" height="20px" fill="rgb(51, 51, 51)" x="0px" y="0px" viewBox="0 0 122.43 122.88" style="enable-background:new 0 0 122.43 122.88" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path class="st0" d="M22.63,12.6h93.3c6.1,0,5.77,2.47,5.24,8.77l-3.47,44.23c-0.59,7.05-0.09,5.34-7.56,6.41l-68.62,8.73 l3.63,10.53c29.77,0,44.16,0,73.91,0c1,3.74,2.36,9.83,3.36,14h-12.28l-1.18-4.26c-24.8,0-34.25,0-59.06,0 c-13.55-0.23-12.19,3.44-15.44-8.27L11.18,8.11H0V0h19.61C20.52,3.41,21.78,9.15,22.63,12.6L22.63,12.6z M63.49,23.76h17.76v18.02 h15.98L72.39,65.95L47.51,41.78h15.98V23.76L63.49,23.76z M53.69,103.92c5.23,0,9.48,4.25,9.48,9.48c0,5.24-4.24,9.48-9.48,9.48 c-5.24,0-9.48-4.24-9.48-9.48C44.21,108.17,48.45,103.92,53.69,103.92L53.69,103.92z M92.79,103.92c5.23,0,9.48,4.25,9.48,9.48 c0,5.24-4.25,9.48-9.48,9.48c-5.24,0-9.48-4.24-9.48-9.48C83.31,108.17,87.55,103.92,92.79,103.92L92.79,103.92z"/></g></svg>
                            </a>
                            <div id="myDropdown" class="dropdown-content">
                                <div class="row">
                                    <div class="col-xl-5">
                                        <span class="ms-1">
                                            <svg width="30px" height="30px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 441 512.398"><path fill="#009f00" fill-rule="nonzero" d="M102.778 354.886c-5.727 0-10.372-4.645-10.372-10.372s4.645-10.372 10.372-10.372h85.568a148.095 148.095 0 00-7.597 20.744h-77.971zm0-145.37c-5.727 0-10.372-4.645-10.372-10.372 0-5.726 4.645-10.372 10.372-10.372h151.288c5.727 0 10.372 4.646 10.372 10.372 0 5.727-4.645 10.372-10.372 10.372H102.778zm0 72.682c-5.727 0-10.372-4.646-10.372-10.373 0-5.727 4.645-10.372 10.372-10.372H246.05c2.83 0 5.395 1.134 7.265 2.971a149.435 149.435 0 00-25.876 17.774H102.778z"/><path fill="#0d6efd" d="M324.263 278.925c32.23 0 61.418 13.067 82.544 34.192C427.933 334.241 441 363.43 441 395.66c0 32.236-13.067 61.419-34.193 82.544-21.126 21.126-50.31 34.194-82.544 34.194-32.232 0-61.419-13.068-82.543-34.194-21.125-21.125-34.194-50.312-34.194-82.544s13.069-61.417 34.194-82.543c21.126-21.125 50.309-34.192 82.543-34.192zM60.863 0h174.809c3.382 0 6.384 1.619 8.279 4.124l110.107 119.119a10.292 10.292 0 012.745 7.012h.053v119.817a149.591 149.591 0 00-20.752-3.111v-92.212h-43.666v-.042h-.161c-22.046-.349-39.33-6.222-51.694-16.784-12.849-10.979-20.063-26.614-21.504-46.039a10.145 10.145 0 01-.095-1.404V20.752H60.863c-11.02 0-21.049 4.516-28.321 11.79-7.274 7.272-11.79 17.301-11.79 28.321v338.276c0 11.015 4.521 21.037 11.796 28.311 7.278 7.28 17.31 11.802 28.315 11.802h120.749a148.132 148.132 0 008.116 20.752H60.863c-16.73 0-31.958-6.85-42.987-17.881C6.852 431.099 0 415.882 0 399.139V60.863C0 44.114 6.842 28.894 17.87 17.87 28.894 6.842 44.114 0 60.863 0zm178.873 29.983v60.433c1.021 13.737 5.819 24.535 14.302 31.783 8.667 7.404 21.488 11.544 38.4 11.835v-.037h43.442L239.736 29.983zm19.574 355.276l53.294 51.131v-25.502c31.087-6.24 56.244-1.705 76.606 23.636-2.869-44.518-31.927-72.567-76.606-74.456v-25.94l-53.294 51.131z"/></svg> 
                                            Order-List
                                        </span>
                                    </div>
                                    <div class="col-xl-7">
                                        <input class="search_message ms-2 mb-2" type="text" placeholder="{{__('translate.Search..')}}" id="myInput" onkeyup="filterFunction()">
                                    </div>
                                </div>
                                <div class="table table-responsive" style="padding-left:5px;padding-right:5px;">
                                    <table class="table table-sm">
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
                                                <td class="border_ord ps-1 supp_vew"><a href="#about">1</a></td>
                                                <td class="txt_ ps-1 supp_vew2">CU-0000</td>
                                                <td class="txt_ ps-1 supp_vew2">OR-0000</td>
                                                <td class="txt_ ps-1 supp_vew2">Dhaka</td>
                                                <td class="txt_ ps-1 supp_vew2">Pending</td>
                                            </tr>
                                            <tr class="table-row user-table-row supp-table-row">
                                                <td class="border_ord ps-1 supp_vew"><a href="#about">2</a></td>
                                                <td class="txt_ ps-1 supp_vew2">CU-0001</td>
                                                <td class="txt_ ps-1 supp_vew2">OR-0001</td>
                                                <td class="txt_ ps-1 supp_vew2">Dhaka</td>
                                                <td class="txt_ ps-1 supp_vew2">Pending</td>
                                            </tr>
                                            <tr class="table-row user-table-row supp-table-row">
                                                <td class="border_ord ps-1 supp_vew"><a href="#about">3</a></td>
                                                <td class="txt_ ps-1 supp_vew2">CU-0003</td>
                                                <td class="txt_ ps-1 supp_vew2">OR-0003</td>
                                                <td class="txt_ ps-1 supp_vew2">Natore</td>
                                                <td class="txt_ ps-1 supp_vew2">Justified</td>
                                            </tr>
                                            <tr class="table-row user-table-row supp-table-row">
                                                <td class="border_ord ps-1 supp_vew"><a href="#about">4</a></td>
                                                <td class="txt_ ps-1 supp_vew2">CU-0004</td>
                                                <td class="txt_ ps-1 supp_vew2">OR-0004</td>
                                                <td class="txt_ ps-1 supp_vew2">Rangpur</td>
                                                <td class="txt_ ps-1 supp_vew2">Justified</td>
                                            </tr>
                                            <tr class="table-row user-table-row supp-table-row">
                                                <td class="border_ord ps-1 supp_vew"><a href="#about">5</a></td>
                                                <td class="txt_ ps-1 supp_vew2">CU-0005</td>
                                                <td class="txt_ ps-1 supp_vew2">OR-0005</td>
                                                <td class="txt_ ps-1 supp_vew2">Dinajput</td>
                                                <td class="txt_ ps-1 supp_vew2">Justified</td>
                                            </tr>
                                            <tr class="table-row user-table-row supp-table-row">
                                                <td class="border_ord ps-1 supp_vew"><a href="#about">6</a></td>
                                                <td class="txt_ ps-1 supp_vew2">CU-0006</td>
                                                <td class="txt_ ps-1 supp_vew2">OR-0006</td>
                                                <td class="txt_ ps-1 supp_vew2">Gazipur</td>
                                                <td class="txt_ ps-1 supp_vew2">Justified</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <tfoot>
                                        <tr>
                                            <td>
                                                <a class="dropdown-item text-center small text-gray-500" href="#">{{__('translate.Read More Messages')}}</a>
                                                <span class="custom-order-arrow mini"></span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Language -->
                    <li>
                        <div class="dropdown dashboard_menubar">
                            <a class="dropbtn">{{__('translate.Language')}}</a>
                            <div class="dropdown-content">
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
                                <span class="custom-summary-arrow"></span>
                            </div>
                        </div>
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
                        <li class="breadcrumb-item active font_color_focus">{{$page_name}}</li>
                    </span>
                </ol>
            @else
                <ol class="breadcrumb">
                    <span class="das_head ps-1 pe-1 mt-1">
                        <li class="breadcrumb-item active font_color_focus">{{ __('translate.Dashboard') }}</li>
                    </span>
                </ol>
            @endif
        @endif
        @if(auth()->user()->role ==2)
        <ol class="breadcrumb">
            <span class="das_head ps-1 pe-1 mt-1">
                <li class="breadcrumb-item active font_color_focus">{{__('translate.Home')}}</li>
            </span>
        </ol>
        @endif
        @if(auth()->user()->role ==3)
        <ol class="breadcrumb">
            <span class="das_head ps-1 pe-1 mt-1">
                <li class="breadcrumb-item active font_color_focus">{{__('translate.Home')}}</li>
            </span>
        </ol>
        @endif
        @if(auth()->user()->role ==0)
        <ol class="breadcrumb">
            <span class="das_head ps-1 pe-1 mt-1">
                <li class="breadcrumb-item active font_color_focus">{{__('translate.Home')}}</li>
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