<!-- ================== Category ======================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_category {{setting('categ_title_visual')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:#007effc4;" id="plus_category_link"></i>
        <i class="fa-solid fa-minus" style="color:#007effc4;" id="minus_category_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> 
    <span class="ps-1" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        <span class="{{setting('categ_title_visual')}}">{{__('translate.Category')}}</span>
    </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="product" aria-labelledby="headingTwo" data-bs-parent="#product">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a id="myLink" class="nav-link underline nav_space" href="{{setting('category_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Category List')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('categ_title_visual')}}">{{__('translate.ADD Category')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>
<!-- ================= Sub-Category ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_sub_category {{setting('sub_categ_title_visual')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:#007effc4;" id="plus_sub_category_link"></i>
        <i class="fa-solid fa-minus" style="color:#007effc4;" id="minus_sub_category_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> 
    <span class="ps-1 {{setting('sub_categ_title_visual')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        {{__('translate.Sub Category')}}
    </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="product" aria-labelledby="headingTwo" data-bs-parent="#product">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a class="nav-link underline nav_space {{setting('sub_categ_title_visual')}}" href="{{setting('subcategory_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Sub-Category List')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('subcategory_visual')}}">{{__('translate.ADD Sub Category')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>

<!-- ================= Group ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_group {{setting('group_title_visual')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:#007effc4;" id="plus_group_link"></i>
        <i class="fa-solid fa-minus" style="color:#007effc4;" id="minus_group_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Group')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="product" aria-labelledby="headingTwo" data-bs-parent="#product">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a class="nav-link underline nav_space" href="{{setting('product_group_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Medicine Group')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('group_visual')}}">{{__('translate.ADD Group')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>
<!-- ================= Medicine ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_product {{setting('medicine_title_visual')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:#007effc4;" id="plus_product_link"></i>
        <i class="fa-solid fa-minus" style="color:#007effc4;" id="minus_product_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Medicine Part')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="product" aria-labelledby="headingTwo" data-bs-parent="#product">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a class="nav-link underline nav_space" href="{{setting('medicine_group_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Add Medicine Name')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{ setting('medicine_visual') }}">{{__('translate.ADD Name')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{setting('medicine_dosage_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Add Medicine Dosage')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{ setting('medicine_dosage_visual') }}">{{__('translate.ADD Dosage')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{setting('medicine_oriign_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Add Medicine Origin')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{ setting('medicine_origin_visual') }}">{{__('translate.ADD Origin')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>
<!-- ================= Prodcut-Model ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_product_model {{setting('product_model_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:#007effc4;" id="plus_product_model_link"></i>
        <i class="fa-solid fa-minus" style="color:#007effc4;" id="minus_product_model_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Model')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="product" aria-labelledby="headingTwo" data-bs-parent="#product">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a class="nav-link underline nav_space" href="{{setting('model_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Product Model')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('model_visual')}}">{{__('translate.ADD Model')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>
<!-- ============================= Units ==================== -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_unit {{setting('unit_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:#007effc4;" id="plus_unit_link"></i>
        <i class="fa-solid fa-minus" style="color:#007effc4;" id="minus_unit_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        {{__('translate.Units')}}
    </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="product" aria-labelledby="headingTwo" data-bs-parent="#product">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a class="nav-link underline nav_space" href="{{setting('unit_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Create Units')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('unit_visual')}}">{{__('translate.ADD Unit')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>
<!-- =========================== Brand ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_brand {{setting('brand_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:#007effc4;" id="plus_brand_link"></i>
        <i class="fa-solid fa-minus" style="color:#007effc4;" id="minus_brand_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        {{__('translate.Brand')}}
    </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="product" aria-labelledby="headingTwo" data-bs-parent="#product">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a class="nav-link underline nav_space" href="{{setting('brand_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Add Brand')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('brand_visual')}}">{{__('translate.ADD Brand')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>
<!-- =========================== Product ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_another_product {{setting('product_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:#007effc4;" id="plus_another_product_link"></i>
        <i class="fa-solid fa-minus" style="color:#007effc4;" id="minus_another_product_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        {{__('translate.Product List')}}
    </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="product" aria-labelledby="headingTwo" data-bs-parent="#product">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a class="nav-link underline nav_space" href="{{setting('product_link')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Add Product')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('product_visual_')}}">{{__('translate.ADD Product')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>




