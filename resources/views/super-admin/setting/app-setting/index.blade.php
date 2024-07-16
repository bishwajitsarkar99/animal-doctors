@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

<div class="card form-control form-control-sm mange_background">
    <div class="card-body manage_role_page">
        <h2 class=" manage_head mb-4">App <span class="">Setting</span></h2>

        <ul class="nav nav-tabs tab_bg skeleton" role="tablist">
            <li class="nav-item">
                <a class="nav-link setting active skeleton" data-bs-toggle="tab" href="#home">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link setting skeleton" data-bs-toggle="tab" href="#menu1" onclick="typewritingPage()">Page</a>
            </li>
            <li class="nav-item">
                <a class="nav-link setting skeleton" data-bs-toggle="tab" href="#menu2" onclick="typewriterEffect()">Social-Media</a>
            </li>
            <li class="nav-item">
                <a class="nav-link setting skeleton" data-bs-toggle="tab" href="#menu6" onclick="typeWriter()">Sidebar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link setting skeleton" data-bs-toggle="tab" href="#menu3" onclick="typewritingNavbar()">Navbar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link setting skeleton" data-bs-toggle="tab" href="#menu4" onclick="typewriting()">Tobar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link setting skeleton" data-bs-toggle="tab" href="#menu5" onclick="typewritingFocus()">Footer</a>
            </li>
        </ul>

        <form action="#" method="POST">
            
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Company Profile -->
                <div id="home" class="container tab-pane active skeleton"><br>
                    <h6>Company Profile</h6>
                    <p class="text-dark font-weight-bold">
                        <span id="#">would you like to update app setting ? Please, click the beside button :</span>
                        <i class="fa-regular fa-hand-point-right fa-beat-fade ms-3 mt-2" style="color: darkcyan;"></i>
                        <input class="company_name form-switch form-check-input skeleton mt-2" type="checkbox" id="profile_mode">
                        <label id="button_mode" class="input_label profile_yes skeleton mt-1" for="select-user"></label>
                    </p>
                    <p>
                        Profile Update Mode :
                        <label id="login_enable3a" class="input_label profile_yes enable skeleton mt-1 ps-2 pe-2" for="select-user">Enable</label>
                        <label id="login_disable3a" class="input_label profile_yes disable skeleton mt-1 ps-2 pe-2" for="select-user">Disable</label>
                    </p>
                    @csrf
                    @include('super-admin.setting.app-setting._company_profile_setting')
                </div>
                <!-- Page Title -->
                <div id="menu1" class="container tab-pane fade"><br>
                    <h6>Page Setting</h6>
                    <p class="text-dark font-weight-bold">
                        <span id="page_set"></span>
                        <i class="fa-regular fa-hand-point-right fa-beat-fade ms-3 mt-2" style="color: darkcyan;"></i>
                        <input class="company_name form-switch form-check-input skeleton mt-2" type="checkbox" id="page_mode" style="cursor: pointer;">
                        <label id="button_mode" class="input_label profile_yes skeleton mt-1" for="select-user"></label>
                    </p>
                    <p>
                        Page Update Mode :
                        <label id="login_enable" class="input_label profile_yes enable skeleton mt-1 ps-2 pe-2" for="select-user">Enable</label>
                        <label id="login_disable" class="input_label profile_yes disable skeleton mt-1 ps-2 pe-2" for="select-user">Disable</label>
                    </p>
                    @include('super-admin.setting.app-setting._page-setting')
                </div>
                <!-- Social Media -->
                <div id="menu2" class="container tab-pane fade"><br>
                    <h6>Social-Media Setting</h6>
                    <p class="text-dark font-weight-bold">
                        <span id="media"></span>
                        <i class="fa-regular fa-hand-point-right fa-beat-fade ms-3 mt-2" style="color: darkcyan;"></i>
                        <input class="company_name form-switch form-check-input skeleton mt-2" type="checkbox" id="media_mode" style="cursor: pointer;">
                        <label id="button_mode" class="input_label profile_yes skeleton mt-1" for="select-user"></label>
                    </p>
                    <p>
                        Social Media Update Mode :
                        <label id="login_enable_social" class="input_label profile_yes enable skeleton mt-1 ps-2 pe-2" for="select-user">Enable</label>
                        <label id="login_disable_social" class="input_label profile_yes disable skeleton mt-1 ps-2 pe-2" for="select-user">Disable</label>
                    </p>
                    @include('super-admin.setting.app-setting._social-media-setting')
                </div>
                <!-- Navbar -->
                <div id="menu3" class="container tab-pane fade"><br>
                    <h6>Navbar-Moduel-Setting</h6>
                    <p class="text-dark font-weight-bold">
                        <span id="navbar_moduel"></span>
                        <i class="fa-regular fa-hand-point-right fa-beat-fade ms-3 mt-2" style="color: darkcyan;"></i>
                        <input class="company_name form-switch form-check-input skeleton mt-2" type="checkbox" id="navbar_mode">
                        <label id="sidebar_button_mode" class="input_label profile_yes skeleton mt-1" for="select-user"></label>
                    </p>
                    <p>
                        Moduel Update Mode :
                        <label id="login_enable4n" class="input_label profile_yes enable skeleton mt-1 ps-2 pe-2" for="select-user">Enable</label>
                        <label id="login_disable4n" class="input_label profile_yes disable skeleton mt-1 ps-2 pe-2" for="select-user">Disable</label>
                    </p>
                    <div class="row">
                        <div id="treeTable" class="">
                            <table class="bg-transparent">
                                @include('super-admin.setting.app-setting.moduel.nav-bar._nav-bar-moduel-setting')
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Top-bar -->
                <div id="menu4" class="container tab-pane fade"><br>
                    <h6>Topbar-Moduel-Setting</h6>
                    <p class="text-dark font-weight-bold">
                        <span id="topbar"></span>
                        <i class="fa-regular fa-hand-point-right fa-beat-fade ms-3 mt-2" style="color: darkcyan;"></i>
                        <input class="company_name form-switch form-check-input skeleton mt-2" type="checkbox" id="topbar_mode">
                        <label id="sidebar_button_mode" class="input_label profile_yes skeleton mt-1" for="select-user"></label>
                    </p>
                    <p>
                        Moduel Update Mode :
                        <label id="login_enable4t" class="input_label profile_yes enable skeleton mt-1 ps-2 pe-2" for="select-user">Enable</label>
                        <label id="login_disable4t" class="input_label profile_yes disable skeleton mt-1 ps-2 pe-2" for="select-user">Disable</label>
                    </p>
                    <div class="row">
                        <div id="treeTable" class="">
                            <table class="bg-transparent">
                                @include('super-admin.setting.app-setting.moduel.top-bar._top-bar-moduel-setting')
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Sidebar -->
                <div id="menu6" class="container tab-pane fade"><br>
                    <h6>Moduel-Setting</h6>
                    <p class="text-dark font-weight-bold">
                        <span id="demo"></span>
                        <i class="fa-regular fa-hand-point-right fa-beat-fade ms-3 mt-2" style="color: darkcyan;"></i>
                        <input class="company_name form-switch form-check-input skeleton mt-2" type="checkbox" id="sidebar_mode">
                        <label id="sidebar_button_mode" class="input_label profile_yes skeleton mt-1" for="select-user"></label>
                    </p>
                    <p>
                        Moduel Update Mode :
                        <label id="login_enable4" class="input_label profile_yes enable skeleton mt-1 ps-2 pe-2" for="select-user">Enable</label>
                        <label id="login_disable4" class="input_label profile_yes disable skeleton mt-1 ps-2 pe-2" for="select-user">Disable</label>
                    </p>
                    <div class="row">
                        <div id="treeTable" class="">
                            <table class="bg-transparent">
                                @include('super-admin.setting.app-setting.moduel.side-bar._purchases-moduel-setting')
                                @include('super-admin.setting.app-setting.moduel.side-bar._accounts-moduel-setting')
                                @include('super-admin.setting.app-setting.moduel.side-bar._hrm-moduel-setting')
                                @include('super-admin.setting.app-setting.moduel.side-bar._auth-moduel-setting')
                                @include('super-admin.setting.app-setting.moduel.side-bar._layouts-setting-moduel')
                                @include('super-admin.setting.app-setting.moduel.side-bar._components-setting-moduel')
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Footer -->
                <div id="menu5" class="container tab-pane fade"><br>
                    <h6>Footer-Moduel-Setting</h6>
                    <p class="text-dark font-weight-bold">
                        <span id="footermenu"></span>
                        <i class="fa-regular fa-hand-point-right fa-beat-fade ms-3 mt-2" style="color: darkcyan;"></i>
                        <input class="company_name form-switch form-check-input skeleton mt-2" type="checkbox" id="footer_mode">
                        <label id="sidebar_button_mode" class="input_label profile_yes skeleton mt-1" for="select-user"></label>
                    </p>
                    <p>
                        Moduel Update Mode :
                        <label id="login_enable4f" class="input_label profile_yes enable skeleton mt-1 ps-2 pe-2" for="select-user">Enable</label>
                        <label id="login_disable4f" class="input_label profile_yes disable skeleton mt-1 ps-2 pe-2" for="select-user">Disable</label>
                    </p>
                    <div class="row">
                        <div id="treeTable" class="">
                            <table class="bg-transparent">
                                @include('super-admin.setting.app-setting.moduel.footer._footer-moduel-setting')
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-xl-10">

                </div>
                <div class="col-xl-2" style="text-align:end;">
                    <button id="company_btn" type="submit" class="btn btn-sm manage_button update_btn loader_btn app_btn_pill me-2">
                        <i class="update-icon fa fa-spinner fa-spin update-hidden"></i>
                        <span class="btn-text">Update</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <p class="mt-3 mb-3">
        <span class="Profile_success_message" id="success_message"></span>
    </p>
</div>

@endsection

@section('css')
<!-- ================ manage-role-css ================= -->
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/manage-role-css/manage.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/company-profile/company_profile.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/company-profile/app_setting.css">
@endsection
@section('script')
<!-- Sidebar-Writer -->
<script>
    var i = 0;
    var txt = 'Would you like to update app setting ? Please, click the beside button :';
    var speed = 30;

    function typeWriter() {
        if (i < txt.length) {
            document.getElementById("demo").innerHTML += txt.charAt(i);
            i++;
            setTimeout(typeWriter, speed);
        }
    }
</script>
<!-- Page-Writer -->
<script>
    function typewritingPage(elementId, text, speed) {
        var i = 0;

        function type() {
            if (i < text.length) {
                document.getElementById(elementId).innerHTML += text.charAt(i);
                i++;
                setTimeout(type, speed);
            }
        }
        type();
    }
    typewritingPage("page_set", "Would you like to update app setting ? Please, click the beside button :", 50);
</script>
<!-- Social-Media-Writer -->
<script>
    function typewriterEffect(elementId, text, speed) {
        var i = 0;

        function type() {
            if (i < text.length) {
                document.getElementById(elementId).innerHTML += text.charAt(i);
                i++;
                setTimeout(type, speed);
            }
        }
        type();
    }
    typewriterEffect("media", "Would you like to update app setting ? Please, click the beside button :", 50);
</script>
<!-- Navbar-Writer -->
<script>
    function typewritingNavbar(elementId, text, speed) {
        var i = 0;

        function type() {
            if (i < text.length) {
                document.getElementById(elementId).innerHTML += text.charAt(i);
                i++;
                setTimeout(type, speed);
            }
        }
        type();
    }
    typewritingNavbar("navbar_moduel", "Would you like to update app setting ? Please, click the beside button :", 50);
</script>
<!-- Topbar-Writer -->
<script>
    function typewriting(elementId, text, speed) {
        var i = 0;

        function type() {
            if (i < text.length) {
                document.getElementById(elementId).innerHTML += text.charAt(i);
                i++;
                setTimeout(type, speed);
            }
        }
        type();
    }
    typewriting("topbar", "Would you like to update app setting ? Please, click the beside button :", 50);
</script>
<!-- Footer-Writer -->
<script>
    function typewritingFocus(elementId, text, speed) {
        var i = 0;

        function type() {
            if (i < text.length) {
                document.getElementById(elementId).innerHTML += text.charAt(i);
                i++;
                setTimeout(type, speed);
            }
        }
        type();
    }
    typewritingFocus("footermenu", "Would you like to update app setting ? Please, click the beside button :", 50);
</script>

<!-- Avatara -->
<script>
    // update avatar
    $("#image_view").on('click', function(e) {
        e.preventDefault();
        $(".edit_image").click();
    });
    // put and upload avatar/image
    $(".edit_image").on('change', function(event) {
        if (event.target.files && event.target.files[0]) {
            const tempurl = URL.createObjectURL(event.target.files[0]);

            $("#image_view").attr('src', tempurl);
        }
    });
</script>

@include('super-admin.setting.app-setting.moduel-setting-ajax.side-bar-setting-ajax._purchases-setting')
@include('super-admin.setting.app-setting.moduel-setting-ajax.side-bar-setting-ajax._accounts-setting')
@include('super-admin.setting.app-setting.moduel-setting-ajax.side-bar-setting-ajax._social-media-setting')
@include('super-admin.setting.app-setting.moduel-setting-ajax.side-bar-setting-ajax._hrm-setting')
@include('super-admin.setting.app-setting.moduel-setting-ajax.side-bar-setting-ajax._auth-setting')
@include('super-admin.setting.app-setting.moduel-setting-ajax.side-bar-setting-ajax._layouts-setting')
@include('super-admin.setting.app-setting.moduel-setting-ajax.side-bar-setting-ajax._components-setting')
@include('super-admin.setting.app-setting.moduel-setting-ajax.footer-setting-ajax.footer-setting')
@include('super-admin.setting.app-setting.moduel-setting-ajax.top-bar-setting-ajax.top-bar-setting')
@include('super-admin.setting.app-setting.moduel-setting-ajax.nav-bar-setting-ajax.nav-bar-setting')
<script type="text/javascript">
    // Update Company Profile
    $(document).ready(function() {
        $(document).on('click', '#company_btn', function(e) {
            e.preventDefault();
            var company_id = $('#company_id').val();
            var data = {
                'name': $('#update_company_name').val(),
                'address': $('#update_company_address').val(),
                'update_company_logo': $('#update_comp_logo').val(),
                'update_slider1': $('#update_silder1').val(),
                'update_slider2': $('#update_silder2').val(),
                'update_slider3': $('#update_silder3').val(),
                // Page title
                'title': $('#update_company_title').val(),
                'sub_title': $('#update_login_form_label_one').val(),
                'register_page_title': $('#update_register_title').val(),
                'register_page_sub_title': $('#update_register_form_label_one').val(),
                'forgot_page_title': $('#update_forgot_title').val(),
                'forgot_page_sub_title': $('#update_forgot_form_label_one').val(),
                'reset_page_title': $('#update_reset_title').val(),
                'reset_page_sub_title': $('#update_reset_form_label_one').val(),
                // Social Media
                'update_social_media_facebook_link': $('#update_social_media1').val(),
                'update_social_media_messanger_link': $('#update_social_media2').val(),
                'update_social_media_whatsapp_link': $('#update_social_media3').val(),
                'update_social_media_linkedin_link': $('#update_social_media4').val(),
                'update_social_media_facebook': $('#update_social_media5').val(),
                'update_social_media_messanger': $('#update_social_media6').val(),
                'update_social_media_whatsapp': $('#update_social_media7').val(),
                'update_social_media_linkedin': $('#update_social_media8').val(),

                // PUrchases Moduel
                'purches_moduel': $('#update_purchases_moduel').val(),
                'product_title': $('#update_purchases_moduel2').val(),
                'purchases_display': $('#update_purchases_moduel7').val(),
                'product_display': $('#update_purchases_moduel8').val(),
                'categ_title_display': $('#update_purchases_moduel9').val(),
                // Category
                'category': $('#update_purchases_moduel3').val(),
                'add_category': $('#update_purchases_moduel4').val(),
                'category_url': $('#update_purchases_moduel5').val(),
                'category_display': $('#update_purchases_moduel6').val(),
                // Sub-Category
                'sub_category_name': $('#update_purchases_moduel_subcatg').val(),
                'sub_categ_title_visual': $('#update_purchases_moduel_subcatg2').val(),
                'sub_category_title_text': $('#update_purchases_moduel_subcatg3').val(),
                'subcategory_link': $('#update_purchases_moduel_subcatg4').val(),
                'subcategory_visual': $('#update_purchases_moduel_subcatg5').val(),
                // Group
                'group_name': $('#update_purchases_moduel_group').val(),
                'group_title_visual': $('#update_purchases_moduel10').val(),
                'add_group_title': $('#update_purchases_group_moduel').val(),
                'product_group_link': $('#update_purchases_group_moduel2').val(),
                'group_visual': $('#update_purchases_group_moduel3').val(),
                // Medicine name
                'medicine_name': $('#update_purchases_moduel14').val(),
                'medicine_title_visual': $('#update_purchases_moduel15').val(),
                'add_medicine_title': $('#update_purchases_moduel16').val(),
                'medicine_group_link': $('#update_purchases_moduel17').val(),
                'medicine_visual': $('#update_purchases_moduel18').val(),
                // Medicine dosage
                'add_medicine_dosage_title': $('#update_purchases_moduel19').val(),
                'medicine_dosage_link': $('#update_purchases_moduel20').val(),
                'medicine_dosage_visual': $('#update_purchases_moduel21').val(),
                // Medicine origin
                'add_medicine_origin_title': $('#update_purchases_moduel22').val(),
                'medicine_oriign_link': $('#update_purchases_moduel23').val(),
                'medicine_origin_visual': $('#update_purchases_moduel24').val(),
                // Product Model
                'product_model_title': $('#update_purchases_moduel25').val(),
                'product_model_title_display': $('#update_purchases_moduel26').val(),
                'add_model_title': $('#update_purchases_moduel27').val(),
                'model_link': $('#update_purchases_moduel28').val(),
                'model_visual': $('#update_purchases_moduel29').val(),
                // Product Size or Unit
                'unit_title': $('#update_purchases_moduel30').val(),
                'unit_title_display': $('#update_purchases_moduel31').val(),
                'add_unit_title': $('#update_purchases_moduel32').val(),
                'unit_link': $('#update_purchases_moduel33').val(),
                'unit_visual': $('#update_purchases_moduel34').val(),
                // Brand
                'brand_title': $('#update_purchases_moduel35').val(),
                'brand_title_display': $('#update_purchases_moduel36').val(),
                'add_brand_title': $('#update_purchases_moduel37').val(),
                'brand_link': $('#update_purchases_moduel38').val(),
                'brand_visual': $('#update_purchases_moduel39').val(),
                // Product
                'product_head': $('#update_purchases_moduel40').val(),
                'product_title_display': $('#update_purchases_moduel41').val(),
                'add_Prodcut_title': $('#update_purchases_moduel42').val(),
                'product_link': $('#update_purchases_moduel43').val(),
                'product_visual_': $('#update_purchases_moduel44').val(),
                // Stock
                'stock_head_title': $('#update_purchases_moduel45').val(),
                'stock_head_title_display': $('#update_purchases_moduel46').val(),
                'stock_title': $('#update_purchases_moduel47').val(),

                'stock_title_display': $('#update_purchases_moduel48').val(),
                'stock_book_title': $('#update_purchases_moduel49').val(),
                'stock_book_link': $('#update_purchases_modue50').val(),
                'stock_book_visual': $('#update_purchases_moduel51').val(),

                'add_adjustment_title': $('#update_purchases_moduel52').val(),
                'adjustment_link': $('#update_purchases_moduel53').val(),
                'adjustment_visual': $('#update_purchases_moduel54').val(),

                'add_dmage_stock_title': $('#update_purchases_moduel55').val(),
                'damage_stock_link': $('#update_purchases_moduel56').val(),
                'damage_stock_visual': $('#update_purchases_moduel57').val(),

                'add_stock_summary_title': $('#update_purchases_moduel58').val(),
                'stock_summary_link': $('#update_purchases_moduel59').val(),
                'stock_summary_visual': $('#update_purchases_moduel60').val(),

                'add_stock_report_title': $('#update_purchases_moduel61').val(),
                'stock_report_link': $('#update_purchases_moduel62').val(),
                'stock_report_visual': $('#update_purchases_moduel63').val(),

                // Inventory
                'inventory_title': $('#update_purchases_moduel64').val(),
                'invnetory_title_display': $('#update_purchases_moduel65').val(),
                'invnetory_details_title': $('#update_purchases_moduel66').val(),
                'inventory_details_link': $('#update_purchases_moduel67').val(),
                'inventory_details_visual': $('#update_purchases_moduel68').val(),
                'authorization_title': $('#update_purchases_moduel69').val(),
                'authorization_link': $('#update_purchases_moduel70').val(),
                'inventory_visual': $('#update_purchases_moduel71').val(),

                // Supplier
                'supplier_title': $('#update_purchases_moduel72').val(),
                'supplier_title_visual': $('#update_purchases_moduel73').val(),
                'add_supplier_setup_title': $('#update_purchases_moduel74').val(),
                'supplier_setup_link': $('#update_purchases_moduel75').val(),
                'supplier_setup_display': $('#update_purchases_moduel76').val(),
                'suppiler_setup_title': $('#update_purchases_moduel77').val(),
                'supplier_details_setup_link': $('#update_purchases_moduel78').val(),
                'supplier_details_display': $('#update_purchases_moduel79').val(),
                'supplier_requisition_title': $('#update_purchases_moduel80').val(),
                'supplier_requisition_link': $('#update_purchases_moduel81').val(),
                'supplier_requisition_display': $('#update_purchases_moduel82').val(),

                // Accounts Moduel
                'accounts_moduel_title': $('#update_purchases_moduel_Acc').val(),
                'accounts_moduel_display': $('#update_purchases_moduel_Acc2').val(),
                // Lager
                'lager_title': $('#update_purchases_moduel_Acc3').val(),
                'lager_display': $('#update_purchases_moduel_Acc4').val(),
                // Dary Book
                'day_book_title': $('#update_purchases_moduel_Acc5').val(),
                'day_book_title_display': $('#update_purchases_moduel_Acc6').val(),
                'day_book_entry_title': $('#update_purchases_moduel_Acc7').val(),
                'day_book_entry_link': $('#update_purchases_moduel_Acc8').val(),
                'day_book_entry_visual': $('#update_purchases_moduel_Acc9').val(),
                'day_book_view_title': $('#update_purchases_moduel_Acc10').val(),
                'day_book_view_link': $('#update_purchases_moduel_Acc11').val(),
                'day_book_view_visual': $('#update_purchases_moduel_Acc12').val(),
                'day_book_set_title': $('#update_purchases_moduel_Acc13').val(),
                'day_book_setting_link': $('#update_purchases_moduel_Acc14').val(),
                'day_book_setting_visual': $('#update_purchases_moduel_Acc15').val(),
                // Expenses
                'expenses_title': $('#update_purchases_moduel_Acc16').val(),
                'expenses_title_display': $('#update_purchases_moduel_Acc17').val(),
                'type_of_expenses_entry_title': $('#update_purchases_moduel_Acc18').val(),
                'type_of_expenses_link': $('#update_purchases_moduel_Acc19').val(),
                'type_of_expenses_visual': $('#update_purchases_moduel_Acc20').val(),
                'add_expenses_title': $('#update_purchases_moduel_Acc21').val(),
                'add_expenses_link': $('#update_purchases_moduel_Acc22').val(),
                'add_expenses_visual': $('#update_purchases_moduel_Acc23').val(),
                'list_expenses_title': $('#update_purchases_moduel_Acc24').val(),
                'list_expenses_link': $('#update_purchases_moduel_Acc25').val(),
                'list_expenses_visual': $('#update_purchases_moduel_Acc26').val(),
                'setting_expenses_title': $('#update_purchases_moduel_Acc27').val(),
                'setting_expenses_link': $('#update_purchases_moduel_Acc28').val(),
                'setting_expenses_visual': $('#update_purchases_moduel_Acc29').val(),
                // Customer
                'customer_title': $('#update_purchases_moduel_Acc30').val(),
                'customer_title_display': $('#update_purchases_moduel_Acc31').val(),
                'add_customer_title': $('#update_purchases_moduel_Acc32').val(),
                'add_customer_link': $('#update_purchases_moduel_Acc33').val(),
                'customer_visual': $('#update_purchases_moduel_Acc34').val(),
                'customer_due_title': $('#update_purchases_moduel_Acc35').val(),
                'customer_due_link': $('#update_purchases_moduel_Acc36').val(),
                'customer_due_visual': $('#update_purchases_moduel_Acc37').val(),
                'customer_details_title': $('#update_purchases_moduel_Acc38').val(),
                'customer_details_link': $('#update_purchases_moduel_Acc39').val(),
                'customer_details_visual': $('#update_purchases_moduel_Acc40').val(),
                'customer_setting_title': $('#update_purchases_moduel_Acc41').val(),
                'customer_setting_link': $('#update_purchases_moduel_Acc42').val(),
                'customer_setting_visual': $('#update_purchases_moduel_Acc43').val(),
                // Petty Cash
                'petty_cash_title': $('#update_purchases_moduel_Acc44').val(),
                'petty_cash_title_display': $('#update_purchases_moduel_Acc45').val(),
                'add_petty_cash_title': $('#update_purchases_moduel_Acc46').val(),
                'add_petty_cash_link': $('#update_purchases_moduel_Acc47').val(),
                'petty_cash_visual': $('#update_purchases_moduel_Acc48').val(),
                'all_transaction_title': $('#update_purchases_moduel_Acc49').val(),
                'all_transaction_link': $('#update_purchases_moduel_Acc50').val(),
                'all_transaction_visual': $('#update_purchases_moduel_Acc51').val(),
                'petty_cash_details_title': $('#update_purchases_moduel_Acc52').val(),
                'petty_cash_details_link': $('#update_purchases_moduel_Acc53').val(),
                'petty_cash_details_visual': $('#update_purchases_moduel_Acc54').val(),
                'petty_cash_setting_title': $('#update_purchases_moduel_Acc55').val(),
                'petty_cash_setting_link': $('#update_purchases_moduel_Acc56').val(),
                'petty_cash_setting_visual': $('#update_purchases_moduel_Acc57').val(),
                // Bank
                'bank_title': $('#update_purchases_moduel_Acc58').val(),
                'bank_title_display': $('#update_purchases_moduel_Acc59').val(),
                'add_list_title': $('#update_purchases_moduel_Acc60').val(),
                'add_list_link': $('#update_purchases_moduel_Acc61').val(),
                'list_visual': $('#update_purchases_moduel_Acc62').val(),
                'bank_transaction_title': $('#update_purchases_moduel_Acc63').val(),
                'bank_transaction_link': $('#update_purchases_moduel_Acc64').val(),
                'bank_transaction_visual': $('#update_purchases_moduel_Acc65').val(),
                'details_record_title': $('#update_purchases_moduel_Acc66').val(),
                'details_record_link': $('#update_purchases_moduel_Acc67').val(),
                'details_record_visual': $('#update_purchases_moduel_Acc68').val(),
                'bank_setting_title': $('#update_purchases_moduel_Acc69').val(),
                'bank_setting_link': $('#update_purchases_moduel_Acc70').val(),
                'bank_setting_visual': $('#update_purchases_moduel_Acc71').val(),
                // Tax/Vat
                'tax_vat_title': $('#update_purchases_moduel_Acc72').val(),
                'tax_vat_title_display': $('#update_purchases_moduel_Acc73').val(),
                'add_tax_vat_title': $('#update_purchases_moduel_Acc74').val(),
                'add_tax_vat_link': $('#update_purchases_moduel_Acc75').val(),
                'tax_vat_visual': $('#update_purchases_moduel_Acc76').val(),
                'list_vat_tax_title': $('#update_purchases_moduel_Acc77').val(),
                'list_vat_tax_link': $('#update_purchases_moduel_Acc78').val(),
                'list_vat_tax_visual': $('#update_purchases_moduel_Acc79').val(),
                'details_records_title': $('#update_purchases_moduel_Acc80').val(),
                'details_records_link': $('#update_purchases_moduel_Acc81').val(),
                'details_records_visual': $('#update_purchases_moduel_Acc82').val(),
                'vat_tax_setting_title': $('#update_purchases_moduel_Acc83').val(),
                'vat_tax_setting_link': $('#update_purchases_moduel_Acc84').val(),
                'vat_tax_setting_visual': $('#update_purchases_moduel_Acc85').val(),
                // Sales
                'sales_title': $('#update_purchases_moduel_Acc86').val(),
                'sales_title_display': $('#update_purchases_moduel_Acc87').val(),
                // Order
                'order_title': $('#update_purchases_moduel_Acc88').val(),
                'order_title_display': $('#update_purchases_moduel_Acc89').val(),
                'add_order_title': $('#update_purchases_moduel_Acc90').val(),
                'add_order_link': $('#update_purchases_moduel_Acc91').val(),
                'order_visual': $('#update_purchases_moduel_Acc92').val(),
                'order_list_title': $('#update_purchases_moduel_Acc93').val(),
                'order_list_link': $('#update_purchases_moduel_Acc94').val(),
                'order_list_visual': $('#update_purchases_moduel_Acc95').val(),
                'order_setting_title': $('#update_purchases_moduel_Acc96').val(),
                'order_setting_link': $('#update_purchases_moduel_Acc97').val(),
                'order_setting_visual': $('#update_purchases_moduel_Acc98').val(),
                // Invoice
                'invoice_title': $('#update_purchases_moduel_Acc99').val(),
                'invoice_title_display': $('#update_purchases_moduel_Acc100').val(),
                'add_invoice_title': $('#update_purchases_moduel_Acc101').val(),
                'add_invoice_link': $('#update_purchases_moduel_Acc102').val(),
                'invoice_visual': $('#update_purchases_moduel_Acc103').val(),
                'invocie_setting_title': $('#update_purchases_moduel_Acc104').val(),
                'invoice_setting_link': $('#update_purchases_moduel_Acc105').val(),
                'invoice_setting_visual': $('#update_purchases_moduel_Acc106').val(),
                // Sales-Region
                'sales_region_title': $('#update_purchases_moduel_Acc107').val(),
                'sales_region_title_display': $('#update_purchases_moduel_Acc108').val(),
                'sales_region_list_title': $('#update_purchases_moduel_Acc109').val(),
                'sales_region_list_link': $('#update_purchases_moduel_Acc110').val(),
                'sales_region_list_visual': $('#update_purchases_moduel_Acc111').val(),
                'region_base_sales_title': $('#update_purchases_moduel_Acc112').val(),
                'region_base_sales_link': $('#update_purchases_moduel_Acc113').val(),
                'region_base_sales_visual': $('#update_purchases_moduel_Acc114').val(),
                'region_sales_setting_title': $('#update_purchases_moduel_Acc115').val(),
                'region_sales_setting_link': $('#update_purchases_moduel_Acc116').val(),
                'region_sales_setting_visual': $('#update_purchases_moduel_Acc117').val(),
                // Vaoucher
                'vaoucher_title': $('#update_purchases_moduel_Acc118').val(),
                'vaoucher_title_display': $('#update_purchases_moduel_Acc119').val(),
                // Vaoucher Category
                'vaoucher_category_title': $('#update_purchases_moduel_Acc120').val(),
                'vaoucher_category_title_display': $('#update_purchases_moduel_Acc121').val(),
                'vaoucherCategy_title': $('#update_purchases_moduel_Acc122').val(),
                'vaoucherCategy_link': $('#update_purchases_moduel_Acc123').val(),
                'vaoucherCategy_visual': $('#update_purchases_moduel_Acc124').val(),
                'vaoucher_list_title': $('#update_purchases_moduel_Acc125').val(),
                'vaoucher_list_link': $('#update_purchases_moduel_Acc126').val(),
                'vaoucher_list_visual': $('#update_purchases_moduel_Acc127').val(),
                // Vaoucher Setting
                'main_vaoucher_title': $('#update_purchases_moduel_Acc128').val(),
                'main_vaoucher_title_display': $('#update_purchases_moduel_Acc129').val(),
                'add_vaoucher_title': $('#update_purchases_moduel_Acc130').val(),
                'add_vaoucher_link': $('#update_purchases_moduel_Acc131').val(),
                'add_vaoucher_visual': $('#update_purchases_moduel_Acc132').val(),
                'vaoucher_details_title': $('#update_purchases_moduel_Acc133').val(),
                'vaoucher_details_link': $('#update_purchases_moduel_Acc134').val(),
                'vaoucher_details_visual': $('#update_purchases_moduel_Acc135').val(),
                'vaoucher_setting_title': $('#update_purchases_moduel_Acc136').val(),
                'vaoucher_setting_link': $('#update_purchases_moduel_Acc137').val(),
                'vaoucher_setting_visual': $('#update_purchases_moduel_Acc138').val(),
                // Asset
                'asset_title': $('#update_purchases_moduel_Acc139').val(),
                'asset_title_display': $('#update_purchases_moduel_Acc140').val(),
                // New Asset
                'new_asset_title': $('#update_purchases_moduel_Acc141').val(),
                'new_asset_title_display': $('#update_purchases_moduel_Acc142').val(),
                'add_asset_title': $('#update_purchases_moduel_Acc143').val(),
                'add_asset_link': $('#update_purchases_moduel_Acc144').val(),
                'add_asset_visual': $('#update_purchases_moduel_Acc145').val(),
                'asset_details_title': $('#update_purchases_moduel_Acc146').val(),
                'asset_details_link': $('#update_purchases_moduel_Acc147').val(),
                'asset_details_visual': $('#update_purchases_moduel_Acc148').val(),
                // Asset-Details
                'details_asset_title': $('#update_purchases_moduel_Acc149').val(),
                'details_asset_title_display': $('#update_purchases_moduel_Acc150').val(),
                'previous_asset_title': $('#update_purchases_moduel_Acc151').val(),
                'previous_asset_link': $('#update_purchases_moduel_Acc152').val(),
                'previous_asset_visual': $('#update_purchases_moduel_Acc153').val(),
                'current_asset_title': $('#update_purchases_moduel_Acc154').val(),
                'current_asset_link': $('#update_purchases_moduel_Acc155').val(),
                'current_asset_visual': $('#update_purchases_moduel_Acc156').val(),
                'asset_detls_title': $('#update_purchases_moduel_Acc157').val(),
                'asset_detls_link': $('#update_purchases_moduel_Acc158').val(),
                'aasset_detls_visual': $('#update_purchases_moduel_Acc159').val(),
                'asset_setting_title': $('#update_purchases_moduel_Acc160').val(),
                'asset_setting_link': $('#update_purchases_moduel_Acc161').val(),
                'asset_setting_visual': $('#update_purchases_moduel_Acc162').val(),
                // Report
                'report_title': $('#update_purchases_moduel_Acc163').val(),
                'report_title_display': $('#update_purchases_moduel_Acc164').val(),
                // Accounting Report
                'acc_report_title': $('#update_purchases_moduel_Acc165').val(),
                'acc_report_title_display': $('#update_purchases_moduel_Acc166').val(),
                'blance_sheet_title': $('#update_purchases_moduel_Acc167').val(),
                'blance_sheet_link': $('#update_purchases_moduel_Acc168').val(),
                'blance_sheet_visual': $('#update_purchases_moduel_Acc169').val(),
                'trial_blance_sheet_title': $('#update_purchases_moduel_Acc170').val(),
                'trial_blance_sheet_link': $('#update_purchases_moduel_Acc171').val(),
                'trial_blance_sheet_visual': $('#update_purchases_moduel_Acc172').val(),
                'financial_statement_title': $('#update_purchases_moduel_Acc173').val(),
                'financial_statement_link': $('#update_purchases_moduel_Acc174').val(),
                'financial_statement_visual': $('#update_purchases_moduel_Acc175').val(),
                'income_statement_title': $('#update_purchases_moduel_Acc176').val(),
                'income_statement_link': $('#update_purchases_moduel_Acc177').val(),
                'income_statement_visual': $('#update_purchases_moduel_Acc178').val(),
                'cash_flow_statement_title': $('#update_purchases_moduel_Acc179').val(),
                'cash_flow_statement_link': $('#update_purchases_moduel_Acc180').val(),
                'cash_flow_statement_visual': $('#update_purchases_moduel_Acc181').val(),
                'petty_cash_statement_title': $('#update_purchases_moduel_Acc182').val(),
                'petty_cash_statement_link': $('#update_purchases_moduel_Acc183').val(),
                'petty_cash_statement_visual': $('#update_purchases_moduel_Acc184').val(),
                'p_l_statement_title': $('#update_purchases_moduel_Acc185').val(),
                'p_l_statement_link': $('#update_purchases_moduel_Acc186').val(),
                'p_l_statement_visual': $('#update_purchases_moduel_Acc187').val(),
                'tabular_analycis_title': $('#update_purchases_moduel_Acc188').val(),
                'tabular_analycis_link': $('#update_purchases_moduel_Acc189').val(),
                'tabular_analycis_visual': $('#update_purchases_moduel_Acc190').val(),
                'table_blance_sheet_title': $('#update_purchases_moduel_Acc191').val(),
                'table_blance_sheet_link': $('#update_purchases_moduel_Acc192').val(),
                'table_blance_sheet_visual': $('#update_purchases_moduel_Acc193').val(),
                'report_setting_title': $('#update_purchases_moduel_Acc194').val(),
                'report_setting_link': $('#update_purchases_moduel_Acc195').val(),
                'report_setting_visual': $('#update_purchases_moduel_Acc196').val(),
                // Monthly Report
                'acc_monthly_report_title': $('#update_purchases_moduel_Acc197').val(),
                'acc_monthly_report_title_display': $('#update_purchases_moduel_Acc198').val(),
                'monthly_report_view_title': $('#update_purchases_moduel_Acc199').val(),
                'monthly_report_view_link': $('#update_purchases_moduel_Acc200').val(),
                'monthly_report_view_visual': $('#update_purchases_moduel_Acc201').val(),
                'monthly_report_setting_title': $('#update_purchases_moduel_Acc202').val(),
                'monthly_report_setting_link': $('#update_purchases_moduel_Acc203').val(),
                'monthly_report_setting_visual': $('#update_purchases_moduel_Acc204').val(),
                // Daily Report
                'daily_report_title': $('#update_purchases_moduel_Acc205').val(),
                'daily_report_title_display': $('#update_purchases_moduel_Acc206').val(),
                'daily_report_view_title': $('#update_purchases_moduel_Acc207').val(),
                'daily_report_view_link': $('#update_purchases_moduel_Acc208').val(),
                'daily_report_view_visual': $('#update_purchases_moduel_Acc209').val(),
                'daily_report_setting_title': $('#update_purchases_moduel_Acc210').val(),
                'daily_report_setting_link': $('#update_purchases_moduel_Acc211').val(),
                'daily_report_setting_visual': $('#update_purchases_moduel_Acc212').val(),

                // HRM Management
                'hrm_moduel_title': $('#update_hrm_moduel').val(),
                'hrm_moduel_display': $('#update_hrm_moduel2').val(),
                'hrm_title': $('#update_hrm_moduel3').val(),
                'hrm_visual': $('#update_hrm_moduel4').val(),
                // Authentication
                'auth_moduel_title': $('#update_auth_moduel').val(),
                'auth_moduel_display': $('#update_auth_moduel2').val(),
                'auth_title': $('#update_auth_moduel3').val(),
                'auth_visual': $('#update_auth_moduel4').val(),
                // Layouts
                'layouts_moduel_title': $('#update_layouts_moduel').val(),
                'layouts_moduel_display': $('#update_layouts_moduel2').val(),
                // Components
                'components_moduel_title': $('#update_components_moduel').val(),
                'components_moduel_display': $('#update_components_moduel2').val(),
                // Footer
                'footer_moduel_title': $('#update_footer_moduel').val(),
                'footer_moduel_display': $('#update_footer_moduel2').val(),
                // Topbar
                'topbar_moduel_display': $('#update_topbar_moduel2').val(),
                'topbar_searchbtn_moduel_display': $('#update_topbar_moduel3').val(),
                // Navbar
                'navbar_stock_moduel_display': $('#update_navbar_moduel2').val(),
                'navbar_supplier_moduel_display': $('#update_navbar_moduel3').val(),
                'navbar_pivot_moduel_display': $('#update_navbar_moduel4').val(),
                'navbar_item_list_moduel_display': $('#update_navbar_moduel5').val(),
                'navbar_order_box_moduel_display': $('#update_navbar_moduel6').val(),
                'navbar_all_moduel_display': $('#update_navbar_moduel7').val(),
            }

            //<----Ajax Form Header Setup for csrf token----------->
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/update-app-setting/",
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#updateForm_errorList').html("");
                            $('#updateForm_errorList').append('<span>' + err_value + '</span>');
                        });
                    } else if (response.status == 404) {
                        $('#updateForm_errorList').html("");
                        $('#success_message').text(response.messages);
                    } else {
                        $('#updateForm_errorList').html("");
                        $('#success_message').html("");
                        $('#success_message').fadeIn();
                        $('#success_message').text(response.messages);
                        setTimeout(() => {
                            $('#success_message').fadeOut();
                        }, 3000);
                    }
                }
            });

        });
    });
</script>
@endsection