<!-- ================== Category ======================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty {{setting('categ_title_visual')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}"><span class="{{setting('categ_title_visual')}}">{{__('translate.Category')}}</span></span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="product" aria-labelledby="headingTwo" data-bs-parent="#product">
            <nav class="sb-sidenav-menu-nested nav">
                <a id="myLink" class="nav-link underline" href="{{setting('category_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Category List')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i><span class="{{setting('categ_title_visual')}}">{{__('translate.ADD Category')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>
<!-- ================= Sub-Category ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty {{setting('sub_categ_title_visual')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> 
    <span class="ps-1 {{setting('sub_categ_title_visual')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}">
        {{__('translate.Sub Category')}}
    </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="product" aria-labelledby="headingTwo" data-bs-parent="#product">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline {{setting('sub_categ_title_visual')}}" href="{{setting('subcategory_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Sub-Category List')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('subcategory_visual')}}">{{__('translate.ADD Sub Category')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>

<!-- ================= Group ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty {{setting('group_title_visual')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}">{{__('translate.Group')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="product" aria-labelledby="headingTwo" data-bs-parent="#product">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="{{setting('product_group_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Medicine Group')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i><span class="{{setting('group_visual')}}">{{__('translate.ADD Group')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>
<!-- ================= Medicine ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty {{setting('medicine_title_visual')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}">{{__('translate.Medicine Part')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="product" aria-labelledby="headingTwo" data-bs-parent="#product">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="{{setting('medicine_group_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Add Medicine Name')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i><span class="{{ setting('medicine_visual') }}">{{__('translate.ADD Name')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('medicine_dosage_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Add Medicine Dosage')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i><span class="{{ setting('medicine_dosage_visual') }}">{{__('translate.ADD Dosage')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('medicine_oriign_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Add Medicine Origin')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i><span class="{{ setting('medicine_origin_visual') }}">{{__('translate.ADD Origin')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>
<!-- ================= Prodcut-Model ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty {{setting('product_model_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}">{{__('translate.Model')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="product" aria-labelledby="headingTwo" data-bs-parent="#product">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="{{setting('model_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Product Model')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i><span class="{{setting('model_visual')}}">{{__('translate.ADD Model')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>
<!-- ============================= Units ==================== -->
<a class="nav-link_cgrMenu dropdown-toggle ty {{setting('unit_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}">
        {{__('translate.Units')}}
    </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="product" aria-labelledby="headingTwo" data-bs-parent="#product">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="{{setting('unit_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Create Units')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('unit_visual')}}">{{__('translate.ADD Unit')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>
<!-- =========================== Brand ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty {{setting('brand_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}">
        {{__('translate.Brand')}}
    </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="product" aria-labelledby="headingTwo" data-bs-parent="#product">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="{{setting('brand_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Add Brand')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('brand_visual')}}">{{__('translate.ADD Brand')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>
<!-- =========================== Product ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty {{setting('product_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}">
        {{__('translate.Product List')}}
    </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="product" aria-labelledby="headingTwo" data-bs-parent="#product">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="{{setting('product_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Add Product')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('product_visual_')}}">{{__('translate.ADD Product')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>




