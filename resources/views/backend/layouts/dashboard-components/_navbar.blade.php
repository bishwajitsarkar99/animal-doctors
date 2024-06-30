<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="{{setting('navbar_all_moduel_display')}}" id="navbar">
            <nav class="navigation form-controll form-controll-sm dsh_nav sticky-top {{setting('navbar_all_moduel_display')}}" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb mt-1">
                    <li class="" aria-current="page">
                        <div class="progress_login_header loadheight">
                            <div id="loader" class="progress-bar progress-bar-striped progress-bar-animated bg-primary ps-5 ms-3" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown dashboard_menubar ms-1">
                            @if(auth()->user()->role ==1)
                            <i class="fa-solid fa-hourglass-half fa-bounce" style="color: darkgray;"></i>
                            <a class="dropbtn" href="{{ route('super-admin.dashboard') }}">{{__('translate.Dashboard')}}</a>
                            @endif
                            @if(auth()->user()->role ==2)
                            <i class="fa-solid fa-hourglass-half fa-bounce" style="color: darkgray;"></i>
                            <a class="dropbtn" href="{{route ('sub-admin.dashboard') }}">{{__('translate.Sub-Admin')}}</a>
                            @endif
                            @if(auth()->user()->role ==3)
                            <i class="fa-solid fa-hourglass-half fa-bounce" style="color: darkgray;"></i>
                            <a class="dropbtn" href="{{route ('admin.dashboard') }}">{{__('translate.Admin')}}</a>
                            @endif
                            @if(auth()->user()->role ==5)
                            <i class="fa-solid fa-hourglass-half fa-bounce" style="color: darkgray;"></i>
                            <a class="dropbtn" href="{{route ('accounts.dashboard') }}">Accounts-Menu</a>
                            @endif
                            @if(auth()->user()->role ==6)
                            <i class="fa-solid fa-hourglass-half fa-bounce" style="color: darkgray;"></i>
                            <a class="dropbtn" href="{{route ('marketing.dashboard') }}">Marketing-Menu</a>
                            @endif
                            @if(auth()->user()->role ==7)
                            <i class="fa-solid fa-hourglass-half fa-bounce" style="color: darkgray;"></i>
                            <a class="dropbtn" href="{{route ('delivery-team.dashboard') }}">Delivery-Menu</a>
                            @endif
                            @if(auth()->user()->role ==0)
                            <i class="fa-solid fa-hourglass-half fa-bounce" style="color: darkgray;"></i>
                            <a class="dropbtn" href="{{route ('doctors.dashboard') }}">{{__('translate.Doctors')}}</a>
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
                            <a class="dropbtn">{{__('translate.Supplier')}}</a>
                            <div class="dropdown-content">
                                <div class="row">
                                    <div class="col-12">
                                        <a class="mt-2" href="{{'/supplier-summary'}}">{{__('translate.Supplier Summary')}}</a>
                                    </div>
                                </div>
                                <span class="custom-summary-arrow"></span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown dashboard_menubar {{setting('navbar_pivot_moduel_display')}}">
                            <a class="dropbtn">{{__('translate.Pivot Table')}}</a>
                            <div class="dropdown-content pivot">
                                <div class="row">
                                    <div class="col-12">
                                        <a class="mt-2" href="{{'/order-pivot-table'}}">{{__('translate.Order')}}</a>
                                        <a href="{{'/sales-pivot-table'}}">{{__('translate.Sales')}}</a>
                                        <a href="{{'/expenses-pivot-table'}}">{{__('translate.Expenses')}}</a>
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
                                        <span class="medicinepart ms-3">{{__('translate.Medicine-Part')}}</span>
                                        <a class="mt-2" href="/category">{{__('translate.Category')}}</a>
                                        <a href="/sub-category">{{__('translate.Sub-Category')}}</a>
                                        <a href="/medicine-group">{{__('translate.Medicine Group')}}</a>
                                        <a href="/medicine-name">{{__('translate.Medicine Name')}}</a>
                                        <a href="/medicine-dosage">{{__('translate.Medicine Dosage')}}</a>
                                    </div>
                                    <div class="col-6 mt-1">
                                        <span class="medicinepart ms-3">{{__('translate.Farm-Product')}}</span>
                                        <a class="mt-2" href="/product">{{__('translate.Product')}}</a>
                                        <a href="/units">{{__('translate.Units')}}</a>
                                        <a href="/origin">{{__('translate.Origin')}}</a>
                                        <a href="/brand">{{__('translate.Brand')}}</a>
                                        <a href="/model">{{__('translate.Model')}}</a>
                                    </div>
                                </div>
                                <span class="custom-list-arrow"></span>
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
                            <a type="button" onclick="myFunction()" class="dropbtn"><i class="fa-solid fa-envelope-circle-check fa-beat" style="color: darkgray; font-size:15px;"></i></a>
                            <div id="myDropdown" class="dropdown-content">
                                <input class="search_message ms-3 mt-3 mb-2" type="text" placeholder="&#xf002; {{__('translate.Search..')}}" id="myInput" onkeyup="filterFunction()">
                                <a href="#about">About</a>
                                <a href="#base">Base</a>
                                <a href="#blog">Blog</a>
                                <a href="#contact">Contact</a>
                                <a href="#custom">Custom</a>
                                <a href="#support">Support</a>
                                <a href="#tools">Tools</a>
                                <a href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <!-- <img class="rounded-circle" src="" alt="..."> -->
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">{{__('translate.Read More Messages')}}</a>
                                <span class="custom-order-arrow mini"></span>
                            </div>
                        </div>
                    </li>
                    <!-- Language -->
                    <li>
                        <div class="dropdown dashboard_menubar">
                            <a class="dropbtn">{{__('translate.Language')}}</a>
                            <div class="dropdown-content custom-select">
                                <select name="" class="language_switcher" id="language-dropdown">
                                    <option>{{ Config::get('languages')[App::getLocale()] }}</option>
                                    @foreach (Config::get('languages') as $lang => $language)
                                        @if ($lang != App::getLocale())
                                            <option value="{{ $lang }}"> <a class="dropdown-item" href="#"> {{$language}}</a> </option>
                                        @endif
                                    @endforeach
                                </select>
                                <span class="custom-arrow"></span>
                            </div>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<!-- ===========DASHBOARD TIME ZONE============= -->
<div class="row mt-2">
    <div class="col-xl-8 col-md-8">
        @if(auth()->user()->role ==1)
        <ol class="breadcrumb">
            <span class="das_head ps-1 pe-1 mt-">
                <li class="breadcrumb-item active font_color_focus">{{__('translate.Dashboard')}}</li>
            </span>
        </ol>
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
                    echo "Server Log Time :";
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