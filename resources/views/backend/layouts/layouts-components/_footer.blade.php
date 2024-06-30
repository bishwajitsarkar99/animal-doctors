@if(auth()->user()->role ==1)
<footer class="py-2 text-white fixed-bottom mini_footer footer_silver" id="admin_footer">
    <div class="container-fluid px-4 footer_menu" >
        <div class="row">
            <div class="col-12" id="setting">
                <a type="button" class="{{setting('footer_moduel_display')}}" id="Menubar">
                    <i class="fa-solid fa-folder-open fa-beat" style="color:white"></i>
                    <span class="footer_menu_product {{setting('footer_moduel_display')}}">
                        <span class="{{setting('footer_moduel_display')}}">{{setting('footer_moduel_title')}}</span>
                    </span>
                </a>
            </div>
        </div>
    </div>

</footer>

@include('backend.layouts.layouts-components.partial-footer-menu._product-footer-menu')
@endif
@if(auth()->user()->role ==2)
<footer class="py-2 text-white fixed-bottom mini_footer footer_silver" id="admin_footer">
    <div class="container-fluid px-4 footer_menu" >
        <div class="row">
            <div class="col-12" id="setting">
                <!-- <a type="button" class="" id="Menubar">
                    <i class="fa-solid fa-folder-open fa-beat" style="color:white"></i>
                    <span class="footer_menu_product">Footer Menu Bar</span>
                </a> -->
            </div>
        </div>
    </div>

</footer>

@include('backend.layouts.layouts-components.partial-footer-menu._product-footer-menu')
@endif
@if(auth()->user()->role ==3)
<footer class="py-2 text-white fixed-bottom mini_footer footer_silver" id="admin_footer">
    <div class="container-fluid px-4 footer_menu" >
        <div class="row">
            <div class="col-12" id="setting">
                <!-- <a type="button" class="" id="Menubar">
                    <i class="fa-solid fa-folder-open fa-beat" style="color:white"></i>
                    <span class="footer_menu_product">Footer Menu Bar</span>
                </a> -->
            </div>
        </div>
    </div>

</footer>

@include('backend.layouts.layouts-components.partial-footer-menu._product-footer-menu')
@endif
@if(auth()->user()->role ==5)
<footer class="py-2 text-white fixed-bottom mini_footer footer_silver" id="admin_footer">
    <div class="container-fluid px-4 footer_menu" >
        <div class="row">
            <div class="col-12" id="setting">
                <!-- <a type="button" class="" id="Menubar">
                    <i class="fa-solid fa-folder-open fa-beat" style="color:white"></i>
                    <span class="footer_menu_product">Footer Menu Bar</span>
                </a> -->
            </div>
        </div>
    </div>

</footer>

@include('backend.layouts.layouts-components.partial-footer-menu._product-footer-menu')
@endif
@if(auth()->user()->role ==6)
<footer class="py-2 text-white fixed-bottom mini_footer footer_silver" id="admin_footer">
    <div class="container-fluid px-4 footer_menu" >
        <div class="row">
            <div class="col-12" id="setting">
                <!-- <a type="button" class="" id="Menubar">
                    <i class="fa-solid fa-folder-open fa-beat" style="color:white"></i>
                    <span class="footer_menu_product">Footer Menu Bar</span>
                </a> -->
            </div>
        </div>
    </div>

</footer>

@include('backend.layouts.layouts-components.partial-footer-menu._product-footer-menu')
@endif
@if(auth()->user()->role ==7)
<footer class="py-2 text-white fixed-bottom mini_footer footer_silver" id="admin_footer">
    <div class="container-fluid px-4 footer_menu" >
        <div class="row">
            <div class="col-12" id="setting">
                <!-- <a type="button" class="" id="Menubar">
                    <i class="fa-solid fa-folder-open fa-beat" style="color:white"></i>
                    <span class="footer_menu_product">Footer Menu Bar</span>
                </a> -->
            </div>
        </div>
    </div>

</footer>

@include('backend.layouts.layouts-components.partial-footer-menu._product-footer-menu')
@endif