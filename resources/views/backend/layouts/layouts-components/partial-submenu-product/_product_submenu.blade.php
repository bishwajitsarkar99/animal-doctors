<!-- ================== Category ======================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_category collapsed {{setting('categ_title_visual')}} {{ Request::is('product-components/category') ? 'folder-active' : '' }}" role="button" data-bs-toggle="collapse" data-bs-target="#category" aria-expanded="false" aria-controls="flush-collapseOne">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_category_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_category_link" hidden></i>
    </span>
    <svg xml:space="preserve" width="20px" height="20px" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 347.28"><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"/><path fill="#f1c107" fill-rule="nonzero" d="M121.35 118.09l260.64 0 0 -31.3c0.73,-7.76 -4.67,-9.69 -11.24,-9.98 -3.77,-0.18 -7.97,-0.2 -11.76,-0.01l-150.17 0c-36.03,0 -43.17,-19.04 -49.96,-37.13 -3.87,-10.32 -7.56,-20.17 -22.65,-20.17l-104.38 0c-6.76,0 -12.33,5.57 -12.33,12.33l0 253.04 61.44 -139.95c6.5,-14.82 24.13,-26.83 40.41,-26.83zm280.14 0l86.05 0c19.11,0 29.72,16.28 21.83,34.29l0.03 0.01 -73.77 168.06c-6.5,14.83 -24.14,26.83 -40.41,26.83l-366.19 0c-7.65,0 -13.84,-2.56 -18.08,-6.74 -6.2,-5.19 -10.95,-17.13 -10.95,-25.05l0 -283.66c0,-17.52 14.31,-31.83 31.83,-31.83l104.38 0c28.52,0 34.55,16.06 40.86,32.89 4.46,11.89 9.15,24.4 31.75,24.4 51.2,0 102.48,0.33 153.67,0.02 3.05,-0.03 6.18,-0.06 9.1,0.07 16.41,0.76 30.82,5.4 29.88,29.41l0.02 31.3zm85.97 19.05l-366.19 0c-8.66,0 -19,7.42 -22.44,15.25l-73.77 168.06 -0.03 -0.01c-2.05,4.68 -1.46,7.8 4.07,7.8l366.2 0c8.66,0 18.99,-7.43 22.43,-15.26l73.77 -168.06c0.07,0.03 4.09,-7.78 -4.04,-7.78z"/></g></svg>
    <span class="" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        <span class="{{setting('categ_title_visual')}}">{{__('translate.Category')}}</span>
    </span>
</a>
<div id="category" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushProduct">
    <div class="child-tree">
        <div class="accordion-body sub_box">
            <a type="button" id="myLink" class="nav-link underline nav_space side-bar-link load-page {{ Request::routeIs('category.index') ? 'active' : '' }}" data-url="{{route('category.index')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#fff;"></i>
                <span class="{{setting('categ_title_visual')}}">{{__('translate.Add Category')}}</span>
            </a>
        </div>
    </div>
</div>
<!-- ================= Sub-Category ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_sub_category {{setting('sub_categ_title_visual')}} {{Request::is('product-components/sub-category') ? 'folder-active' : ''}}" role="button" data-bs-toggle="collapse" data-bs-target="#subCategory" aria-expanded="false" aria-controls="flush-collapseOne">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_sub_category_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_sub_category_link" hidden></i>
    </span>
    <svg xml:space="preserve" width="20px" height="20px" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 347.28"><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"/><path fill="#f1c107" fill-rule="nonzero" d="M121.35 118.09l260.64 0 0 -31.3c0.73,-7.76 -4.67,-9.69 -11.24,-9.98 -3.77,-0.18 -7.97,-0.2 -11.76,-0.01l-150.17 0c-36.03,0 -43.17,-19.04 -49.96,-37.13 -3.87,-10.32 -7.56,-20.17 -22.65,-20.17l-104.38 0c-6.76,0 -12.33,5.57 -12.33,12.33l0 253.04 61.44 -139.95c6.5,-14.82 24.13,-26.83 40.41,-26.83zm280.14 0l86.05 0c19.11,0 29.72,16.28 21.83,34.29l0.03 0.01 -73.77 168.06c-6.5,14.83 -24.14,26.83 -40.41,26.83l-366.19 0c-7.65,0 -13.84,-2.56 -18.08,-6.74 -6.2,-5.19 -10.95,-17.13 -10.95,-25.05l0 -283.66c0,-17.52 14.31,-31.83 31.83,-31.83l104.38 0c28.52,0 34.55,16.06 40.86,32.89 4.46,11.89 9.15,24.4 31.75,24.4 51.2,0 102.48,0.33 153.67,0.02 3.05,-0.03 6.18,-0.06 9.1,0.07 16.41,0.76 30.82,5.4 29.88,29.41l0.02 31.3zm85.97 19.05l-366.19 0c-8.66,0 -19,7.42 -22.44,15.25l-73.77 168.06 -0.03 -0.01c-2.05,4.68 -1.46,7.8 4.07,7.8l366.2 0c8.66,0 18.99,-7.43 22.43,-15.26l73.77 -168.06c0.07,0.03 4.09,-7.78 -4.04,-7.78z"/></g></svg> 
    <span class="{{setting('sub_categ_title_visual')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        {{__('translate.Sub Category')}}
    </span>
</a>
<div id="subCategory" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushProduct">
    <div class="child-tree">
        <div class="accordion-body sub_box">
            <a type="button" class="nav-link underline nav_space side-bar-link load-page {{setting('sub_categ_title_visual')}} {{Request::routeIs('sub-category.index') ? 'active' : '' }}" data-url="{{route('sub-category.index')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#fff;"></i>
                <span class="{{setting('subcategory_visual')}}">{{__('translate.Add Sub Category')}}</span>
            </a>
        </div>
    </div>
</div>

<!-- ================= Group ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_group {{setting('group_title_visual')}} {{Request::is('medicine-components/medicine-group') ? 'folder-active' : '' }}" role="button" data-bs-toggle="collapse" data-bs-target="#group" aria-expanded="false" aria-controls="flush-collapseOne">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_group_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_group_link" hidden></i>
    </span>
    <svg xml:space="preserve" width="20px" height="20px" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 347.28"><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"/><path fill="#f1c107" fill-rule="nonzero" d="M121.35 118.09l260.64 0 0 -31.3c0.73,-7.76 -4.67,-9.69 -11.24,-9.98 -3.77,-0.18 -7.97,-0.2 -11.76,-0.01l-150.17 0c-36.03,0 -43.17,-19.04 -49.96,-37.13 -3.87,-10.32 -7.56,-20.17 -22.65,-20.17l-104.38 0c-6.76,0 -12.33,5.57 -12.33,12.33l0 253.04 61.44 -139.95c6.5,-14.82 24.13,-26.83 40.41,-26.83zm280.14 0l86.05 0c19.11,0 29.72,16.28 21.83,34.29l0.03 0.01 -73.77 168.06c-6.5,14.83 -24.14,26.83 -40.41,26.83l-366.19 0c-7.65,0 -13.84,-2.56 -18.08,-6.74 -6.2,-5.19 -10.95,-17.13 -10.95,-25.05l0 -283.66c0,-17.52 14.31,-31.83 31.83,-31.83l104.38 0c28.52,0 34.55,16.06 40.86,32.89 4.46,11.89 9.15,24.4 31.75,24.4 51.2,0 102.48,0.33 153.67,0.02 3.05,-0.03 6.18,-0.06 9.1,0.07 16.41,0.76 30.82,5.4 29.88,29.41l0.02 31.3zm85.97 19.05l-366.19 0c-8.66,0 -19,7.42 -22.44,15.25l-73.77 168.06 -0.03 -0.01c-2.05,4.68 -1.46,7.8 4.07,7.8l366.2 0c8.66,0 18.99,-7.43 22.43,-15.26l73.77 -168.06c0.07,0.03 4.09,-7.78 -4.04,-7.78z"/></g></svg> 
    <span class="" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Group')}}</span>
</a>
<div id="group" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushProduct">
    <div class="child-tree">
        <div class="accordion-body sub_box">
            <a type="button" class="nav-link underline nav_space side-bar-link load-page {{Request::routeIs('medicine-group.index') ? 'active' : '' }}" data-url="{{route('medicine-group.index')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#fff;"></i>
                <span class="{{setting('group_visual')}}">{{__('translate.Add Group')}}</span>
            </a>
        </div>
    </div>
</div>
<!-- =========================== Product ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_another_product {{setting('product_title_display')}} {{Request::is('product-components/product') ? 'folder-active' : '' }}" role="button" data-bs-toggle="collapse" data-bs-target="#product" aria-expanded="false" aria-controls="flush-collapseOne">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_another_product_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_another_product_link" hidden></i>
    </span>
    <svg xml:space="preserve" width="20px" height="20px" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 347.28"><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"/><path fill="#f1c107" fill-rule="nonzero" d="M121.35 118.09l260.64 0 0 -31.3c0.73,-7.76 -4.67,-9.69 -11.24,-9.98 -3.77,-0.18 -7.97,-0.2 -11.76,-0.01l-150.17 0c-36.03,0 -43.17,-19.04 -49.96,-37.13 -3.87,-10.32 -7.56,-20.17 -22.65,-20.17l-104.38 0c-6.76,0 -12.33,5.57 -12.33,12.33l0 253.04 61.44 -139.95c6.5,-14.82 24.13,-26.83 40.41,-26.83zm280.14 0l86.05 0c19.11,0 29.72,16.28 21.83,34.29l0.03 0.01 -73.77 168.06c-6.5,14.83 -24.14,26.83 -40.41,26.83l-366.19 0c-7.65,0 -13.84,-2.56 -18.08,-6.74 -6.2,-5.19 -10.95,-17.13 -10.95,-25.05l0 -283.66c0,-17.52 14.31,-31.83 31.83,-31.83l104.38 0c28.52,0 34.55,16.06 40.86,32.89 4.46,11.89 9.15,24.4 31.75,24.4 51.2,0 102.48,0.33 153.67,0.02 3.05,-0.03 6.18,-0.06 9.1,0.07 16.41,0.76 30.82,5.4 29.88,29.41l0.02 31.3zm85.97 19.05l-366.19 0c-8.66,0 -19,7.42 -22.44,15.25l-73.77 168.06 -0.03 -0.01c-2.05,4.68 -1.46,7.8 4.07,7.8l366.2 0c8.66,0 18.99,-7.43 22.43,-15.26l73.77 -168.06c0.07,0.03 4.09,-7.78 -4.04,-7.78z"/></g></svg> 
    <span class="ps-" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        {{__('translate.Product')}}
    </span>
</a>
<div id="product" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushProduct">
    <div class="child-tree">
        <div class="accordion-body sub_box">
            <a type="button" class="nav-link underline nav_space side-bar-link load-page {{Request::routeIs('product.index') ? 'active' : '' }}" data-url="{{route('product.index')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#fff;"></i>
                <span class="{{setting('product_visual_')}}">{{__('translate.Add Product')}}</span>
            </a>
        </div>
    </div>
</div>
<!-- ================= Prodcut-Model ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_product_model {{setting('product_model_title_display')}} {{Request::is('product-components/model') ? 'folder-active' : '' }}" role="button" data-bs-toggle="collapse" data-bs-target="#productModel" aria-expanded="false" aria-controls="flush-collapseOne">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_product_model_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_product_model_link" hidden></i>
    </span>
    <svg xml:space="preserve" width="20px" height="20px" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 347.28"><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"/><path fill="#f1c107" fill-rule="nonzero" d="M121.35 118.09l260.64 0 0 -31.3c0.73,-7.76 -4.67,-9.69 -11.24,-9.98 -3.77,-0.18 -7.97,-0.2 -11.76,-0.01l-150.17 0c-36.03,0 -43.17,-19.04 -49.96,-37.13 -3.87,-10.32 -7.56,-20.17 -22.65,-20.17l-104.38 0c-6.76,0 -12.33,5.57 -12.33,12.33l0 253.04 61.44 -139.95c6.5,-14.82 24.13,-26.83 40.41,-26.83zm280.14 0l86.05 0c19.11,0 29.72,16.28 21.83,34.29l0.03 0.01 -73.77 168.06c-6.5,14.83 -24.14,26.83 -40.41,26.83l-366.19 0c-7.65,0 -13.84,-2.56 -18.08,-6.74 -6.2,-5.19 -10.95,-17.13 -10.95,-25.05l0 -283.66c0,-17.52 14.31,-31.83 31.83,-31.83l104.38 0c28.52,0 34.55,16.06 40.86,32.89 4.46,11.89 9.15,24.4 31.75,24.4 51.2,0 102.48,0.33 153.67,0.02 3.05,-0.03 6.18,-0.06 9.1,0.07 16.41,0.76 30.82,5.4 29.88,29.41l0.02 31.3zm85.97 19.05l-366.19 0c-8.66,0 -19,7.42 -22.44,15.25l-73.77 168.06 -0.03 -0.01c-2.05,4.68 -1.46,7.8 4.07,7.8l366.2 0c8.66,0 18.99,-7.43 22.43,-15.26l73.77 -168.06c0.07,0.03 4.09,-7.78 -4.04,-7.78z"/></g></svg> 
    <span class="ps-" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Model')}}</span>
</a>
<div id="productModel" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushProduct">
    <div class="child-tree">
        <div class="accordion-body sub_box">
            <a type="button" class="nav-link underline nav_space side-bar-link load-page {{Request::routeIs('model.index') ? 'active' : '' }}" data-url="{{route('model.index')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#fff;"></i>
                <span class="{{setting('model_visual')}}">{{__('translate.Add Model')}}</span>
            </a>
        </div>
    </div>
</div>
<!-- ============================= Units ==================== -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_unit {{setting('unit_title_display')}} {{Request::is('product-components/units') ? 'folder-active' : '' }}" role="button" data-bs-toggle="collapse" data-bs-target="#units" aria-expanded="false" aria-controls="flush-collapseOne">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_unit_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_unit_link" hidden></i>
    </span>
    <svg xml:space="preserve" width="20px" height="20px" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 347.28"><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"/><path fill="#f1c107" fill-rule="nonzero" d="M121.35 118.09l260.64 0 0 -31.3c0.73,-7.76 -4.67,-9.69 -11.24,-9.98 -3.77,-0.18 -7.97,-0.2 -11.76,-0.01l-150.17 0c-36.03,0 -43.17,-19.04 -49.96,-37.13 -3.87,-10.32 -7.56,-20.17 -22.65,-20.17l-104.38 0c-6.76,0 -12.33,5.57 -12.33,12.33l0 253.04 61.44 -139.95c6.5,-14.82 24.13,-26.83 40.41,-26.83zm280.14 0l86.05 0c19.11,0 29.72,16.28 21.83,34.29l0.03 0.01 -73.77 168.06c-6.5,14.83 -24.14,26.83 -40.41,26.83l-366.19 0c-7.65,0 -13.84,-2.56 -18.08,-6.74 -6.2,-5.19 -10.95,-17.13 -10.95,-25.05l0 -283.66c0,-17.52 14.31,-31.83 31.83,-31.83l104.38 0c28.52,0 34.55,16.06 40.86,32.89 4.46,11.89 9.15,24.4 31.75,24.4 51.2,0 102.48,0.33 153.67,0.02 3.05,-0.03 6.18,-0.06 9.1,0.07 16.41,0.76 30.82,5.4 29.88,29.41l0.02 31.3zm85.97 19.05l-366.19 0c-8.66,0 -19,7.42 -22.44,15.25l-73.77 168.06 -0.03 -0.01c-2.05,4.68 -1.46,7.8 4.07,7.8l366.2 0c8.66,0 18.99,-7.43 22.43,-15.26l73.77 -168.06c0.07,0.03 4.09,-7.78 -4.04,-7.78z"/></g></svg>
    <span class="ps-" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        {{__('translate.All Units')}}
    </span>
</a>
<div id="units" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushProduct">
    <div class="child-tree">
        <div class="accordion-body sub_box">
            <a type="button" class="nav-link underline nav_space side-bar-link load-page {{Request::routeIs('units.index') ? 'active' : '' }}" data-url="{{route('units.index')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#fff;"></i>
                <span class="{{setting('unit_visual')}}">{{__('translate.Add Unit')}}</span>
            </a>
        </div>
    </div>
</div>
<!-- =========================== Brand ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_brand {{setting('brand_title_display')}} {{Request::is('product-components/brand') ? 'folder-active' : '' }}" role="button" data-bs-toggle="collapse" data-bs-target="#brand" aria-expanded="false" aria-controls="flush-collapseOne">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_brand_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_brand_link" hidden></i>
    </span>
    <svg xml:space="preserve" width="20px" height="20px" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 347.28"><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"/><path fill="#f1c107" fill-rule="nonzero" d="M121.35 118.09l260.64 0 0 -31.3c0.73,-7.76 -4.67,-9.69 -11.24,-9.98 -3.77,-0.18 -7.97,-0.2 -11.76,-0.01l-150.17 0c-36.03,0 -43.17,-19.04 -49.96,-37.13 -3.87,-10.32 -7.56,-20.17 -22.65,-20.17l-104.38 0c-6.76,0 -12.33,5.57 -12.33,12.33l0 253.04 61.44 -139.95c6.5,-14.82 24.13,-26.83 40.41,-26.83zm280.14 0l86.05 0c19.11,0 29.72,16.28 21.83,34.29l0.03 0.01 -73.77 168.06c-6.5,14.83 -24.14,26.83 -40.41,26.83l-366.19 0c-7.65,0 -13.84,-2.56 -18.08,-6.74 -6.2,-5.19 -10.95,-17.13 -10.95,-25.05l0 -283.66c0,-17.52 14.31,-31.83 31.83,-31.83l104.38 0c28.52,0 34.55,16.06 40.86,32.89 4.46,11.89 9.15,24.4 31.75,24.4 51.2,0 102.48,0.33 153.67,0.02 3.05,-0.03 6.18,-0.06 9.1,0.07 16.41,0.76 30.82,5.4 29.88,29.41l0.02 31.3zm85.97 19.05l-366.19 0c-8.66,0 -19,7.42 -22.44,15.25l-73.77 168.06 -0.03 -0.01c-2.05,4.68 -1.46,7.8 4.07,7.8l366.2 0c8.66,0 18.99,-7.43 22.43,-15.26l73.77 -168.06c0.07,0.03 4.09,-7.78 -4.04,-7.78z"/></g></svg>
    <span class="ps-" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        {{__('translate.Brand')}}
    </span>
</a>
<div id="brand" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushProduct">
    <div class="child-tree">
        <div class="accordion-body sub_box">
            <a type="button" class="nav-link underline nav_space side-bar-link load-page {{Request::routeIs('brand.index') ? 'active' : '' }}" data-url="{{route('brand.index')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#fff;"></i>
                <span class="{{setting('brand_visual')}}">{{__('translate.Add Brand')}}</span>
            </a>
        </div>
    </div>
</div>
<!-- ================= Medicine ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_product {{setting('medicine_title_visual')}} {{Request::is('medicine-components/medicine-name') || Request::is('medicine-components/medicine-dosage') || Request::is('product-components/origin') ? 'folder-active' : '' }}" role="button" data-bs-toggle="collapse" data-bs-target="#medicine" aria-expanded="false" aria-controls="flush-collapseOne">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_product_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_product_link" hidden></i>
    </span>
    <svg xml:space="preserve" width="20px" height="20px" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 347.28"><g id="Layer_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"/><path fill="#f1c107" fill-rule="nonzero" d="M121.35 118.09l260.64 0 0 -31.3c0.73,-7.76 -4.67,-9.69 -11.24,-9.98 -3.77,-0.18 -7.97,-0.2 -11.76,-0.01l-150.17 0c-36.03,0 -43.17,-19.04 -49.96,-37.13 -3.87,-10.32 -7.56,-20.17 -22.65,-20.17l-104.38 0c-6.76,0 -12.33,5.57 -12.33,12.33l0 253.04 61.44 -139.95c6.5,-14.82 24.13,-26.83 40.41,-26.83zm280.14 0l86.05 0c19.11,0 29.72,16.28 21.83,34.29l0.03 0.01 -73.77 168.06c-6.5,14.83 -24.14,26.83 -40.41,26.83l-366.19 0c-7.65,0 -13.84,-2.56 -18.08,-6.74 -6.2,-5.19 -10.95,-17.13 -10.95,-25.05l0 -283.66c0,-17.52 14.31,-31.83 31.83,-31.83l104.38 0c28.52,0 34.55,16.06 40.86,32.89 4.46,11.89 9.15,24.4 31.75,24.4 51.2,0 102.48,0.33 153.67,0.02 3.05,-0.03 6.18,-0.06 9.1,0.07 16.41,0.76 30.82,5.4 29.88,29.41l0.02 31.3zm85.97 19.05l-366.19 0c-8.66,0 -19,7.42 -22.44,15.25l-73.77 168.06 -0.03 -0.01c-2.05,4.68 -1.46,7.8 4.07,7.8l366.2 0c8.66,0 18.99,-7.43 22.43,-15.26l73.77 -168.06c0.07,0.03 4.09,-7.78 -4.04,-7.78z"/></g></svg>
    <span class="" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>{{__('translate.Medicine-Part')}}</span>
</a>
<div id="medicine" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushProduct">
    <div class="child-tree">
        <div class="accordion-body sub_box">
            <a type="button" class="nav-link underline nav_space side-bar-link load-page {{Request::routeIs('medicine-name.index') ? 'active' : '' }}" data-url="{{route('medicine-name.index')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#fff;"></i>
                <span class="{{ setting('medicine_visual') }}">{{__('translate.Add Medicine Name')}}</span>
            </a>
            <a type="button" class="nav-link underline nav_space side-bar-link load-page {{Request::routeIs('medicine-dogs.index') ? 'active' : '' }}" data-url="{{route('medicine-dogs.index')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#fff;"></i>
                <span class="{{ setting('medicine_dosage_visual') }}">{{__('translate.Add Dosage')}}</span>
            </a>
            <a type="button" class="nav-link underline nav_space side-bar-link load-page {{Request::routeIs('origin.index') ? 'active' : '' }}" data-url="{{route('origin.index')}}" data-bs-toggle="tooltip"  data-bs-placement="right" title="<i class='fa-solid fa-plug fa-beat-fade' style='font-size:18px;'>‌</i>" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <i class="fa-solid fa-minus" style="color:#fff;"></i>
                <span class="{{ setting('medicine_origin_visual') }}">{{__('translate.Add Origin')}}</span>
            </a>
        </div>
    </div>
</div>