<div class="modal-header menu_footer">
    <i class="fa-thin fa-square-full fa-flip" style="color: orangered;"></i>
    <h5 class="modal-title admin_title ps-1 pe-1" id="staticBackdropLabel">
        Menu
    </h5>

    <button type="button" class="btn-close btn-btn-sm" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="Delete" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'>
    </button>
</div>
<div class="modal-body admin_modal_body footer_menubar">
    <!-- ============= Purchases-Moduel ===================== -->
    <span class="purchases_moduel"><span class="link_menus"><i class="fa-solid fa-link fa-beat-fade"></i></span> <span class="moduel_label ps-1 pe-1"> Purchases</span></span>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <button class="accordion-button collapsed footer_menu" data-bs-toggle="collapse" data-bs-target="#product_footerMenu" aria-expanded="false" aria-controls="product_footerMenu">
                <span class="prod_font pt-1">
                    <i class="fa-solid fa-down-long fa-beat" data-bs-toggle="tooltip" data-bs-placement="right" title="Open Prodcut Menu"></i>
                </span>
                <a class="nav-link collapsed sals_menu" id="navbarDropdown" data-bs-toggle="collapse" data-bs-target="#product" aria-expanded="false" aria-controls="collapsePages">
                    <span class="prod_label footer_menu ps-1" id="prodct" data-bs-toggle="tooltip" data-bs-placement="right" title="Click" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'> Product</span>
                </a>
            </button>
            <div id="product_footerMenu" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body sub_box">

                    <!-- ================== Product ======================= -->
                    <span class="lock ps-2 pe-2" id="product_lock">Lock</span><span class="unlock ps-1 pe-1" id="product_unlock">Unlock</span><br>
                    @include('backend.layouts.layouts-components.partial-submenu-product._product_submenu')
                </div>
            </div>
        </div>
    </div>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <button class="accordion-button collapsed footer_menu" data-bs-toggle="collapse" data-bs-target="#stock_footerMenu" aria-expanded="false" aria-controls="stock_footerMenu">
                <span class="prod_font pt-1">
                    <i class="fa-solid fa-down-long fa-beat" data-bs-toggle="tooltip" data-bs-placement="right" title="Open Prodcut Menu"></i>
                </span>
                <a class="nav-link collapsed sals_menu" id="stockMenu" data-bs-toggle="collapse" data-bs-target="#stock_" aria-expanded="false" aria-controls="collapsePages">
                    <span class="prod_label footer_menu ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Click" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'> Stock</span>
                </a>
            </button>
            <div id="stock_footerMenu" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body sub_box">

                    <!-- ================== Stock ======================= -->
                    <span class="lock ps-2 pe-2" id="stock_lock">Lock</span><span class="unlock ps-1 pe-1" id="stock_unlock">Unlock</span><br>
                    @include('backend.layouts.layouts-components.partial-submenu-stock._stock-submenu')
                </div>
            </div>
        </div>
    </div>
    <!-- ============= Accounts-Moduel ===================== -->
    <span class="purchases_moduel"><span class="link_menus"><i class="fa-solid fa-link fa-beat-fade"></i></span> <span class="moduel_label ps-1 pe-1"> Accounts</span></span>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <button class="accordion-button collapsed footer_menu" data-bs-toggle="collapse" data-bs-target="#leger_footerMenu" aria-expanded="false" aria-controls="leger_footerMenu">
                <span class="prod_font pt-1">
                    <i class="fa-solid fa-down-long fa-beat" data-bs-toggle="tooltip" data-bs-placement="right" title="Open Prodcut Menu"></i>
                </span>
                <a class="nav-link collapsed sals_menu" id="legerMenu" data-bs-toggle="collapse" data-bs-target="#leger_id" aria-expanded="false" aria-controls="collapsePages">
                    <span class="prod_label footer_menu ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Click" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'> Leger</span>
                </a>
            </button>
            <div id="leger_footerMenu" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body sub_box">

                    <!-- ================== Leger ======================= -->
                    <span class="lock ps-2 pe-2" id="leger_lock">Lock</span><span class="unlock ps-1 pe-1" id="leger_unlock">Unlock</span><br>
                    @include('backend.layouts.layouts-components.partial-submenu-leger._leger-submenu')
                </div>
            </div>
        </div>
    </div>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <button class="accordion-button collapsed footer_menu" data-bs-toggle="collapse" data-bs-target="#sales_footerMenu" aria-expanded="false" aria-controls="sales_footerMenu">
                <span class="prod_font pt-1">
                    <i class="fa-solid fa-down-long fa-beat" data-bs-toggle="tooltip" data-bs-placement="right" title="Open Prodcut Menu"></i>
                </span>
                <a class="nav-link collapsed sals_menu" id="salesMenu" data-bs-toggle="collapse" data-bs-target="#sales_" aria-expanded="false" aria-controls="collapsePages">
                    <span class="prod_label footer_menu ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Click" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'> Sales</span>
                </a>
            </button>
            <div id="sales_footerMenu" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body sub_box">

                    <!-- ================== sales ======================= -->
                    <span class="lock ps-2 pe-2" id="sale_lock">Lock</span><span class="unlock ps-1 pe-1" id="sale_unlock">Unlock</span><br>
                    @include('backend.layouts.layouts-components.partial-submenu-sales._sales-submenu')
                </div>
            </div>
        </div>
    </div>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <button class="accordion-button collapsed footer_menu" data-bs-toggle="collapse" data-bs-target="#voucher_footerMenu" aria-expanded="false" aria-controls="voucher_footerMenu">
                <span class="prod_font pt-1">
                    <i class="fa-solid fa-down-long fa-beat" data-bs-toggle="tooltip" data-bs-placement="right" title="Open Prodcut Menu"></i>
                </span>
                <a class="nav-link collapsed sals_menu" id="vouchersMenu" data-bs-toggle="collapse" data-bs-target="#voucher_" aria-expanded="false" aria-controls="collapsePages">
                    <span class="prod_label footer_menu ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Click" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'> Voucher</span>
                </a>
            </button>
            <div id="voucher_footerMenu" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body sub_box">

                    <!-- ================== Voucher ======================= -->
                    <span class="lock ps-2 pe-2" id="vouch_lock">Lock</span><span class="unlock ps-1 pe-1" id="vouch_unlock">Unlock</span><br>
                    @include('backend.layouts.layouts-components.partial-submenu-voucher._voucher-submenu')
                </div>
            </div>
        </div>
    </div>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <button class="accordion-button collapsed footer_menu" data-bs-toggle="collapse" data-bs-target="#asset_footerMenu" aria-expanded="false" aria-controls="asset_footerMenu">
                <span class="prod_font pt-1">
                    <i class="fa-solid fa-down-long fa-beat" data-bs-toggle="tooltip" data-bs-placement="right" title="Open Prodcut Menu"></i>
                </span>
                <a class="nav-link collapsed sals_menu" id="assetMenu" data-bs-toggle="collapse" data-bs-target="#asset_" aria-expanded="false" aria-controls="collapsePages">
                    <span class="prod_label footer_menu ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Click" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'> Asset</span>
                </a>
            </button>
            <div id="asset_footerMenu" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body sub_box">

                    <!-- ================== Voucher ======================= -->
                    <span class="lock ps-2 pe-2" id="asst_lock">Lock</span><span class="unlock ps-1 pe-1" id="asst_unlock">Unlock</span><br>
                    @include('backend.layouts.layouts-components.partial-submenu-asset._asset-submenu')
                </div>
            </div>
        </div>
    </div>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <button class="accordion-button collapsed footer_menu" data-bs-toggle="collapse" data-bs-target="#report_footerMenu" aria-expanded="false" aria-controls="report_footerMenu">
                <span class="prod_font pt-1">
                    <i class="fa-solid fa-down-long fa-beat" data-bs-toggle="tooltip" data-bs-placement="right" title="Open Prodcut Menu"></i>
                </span>
                <a class="nav-link collapsed sals_menu" id="reportMenu" data-bs-toggle="collapse" data-bs-target="#report_" aria-expanded="false" aria-controls="collapsePages">
                    <span class="prod_label footer_menu ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Click" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'> Reports</span>
                </a>
            </button>
            <div id="report_footerMenu" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body sub_box">

                    <!-- ================== Reports ======================= -->
                    <span class="lock ps-2 pe-2" id="reprt_lock">Lock</span><span class="unlock ps-1 pe-1" id="reprt_unlock">Unlock</span><br>
                    @include('backend.layouts.layouts-components.partial-submenu-report._report-submenu')
                </div>
            </div>
        </div>
    </div>
    <!-- ============= HRM-Moduel ===================== -->
    <span class="purchases_moduel"><span class="link_menus"><i class="fa-solid fa-link fa-beat-fade"></i></span> <span class="moduel_label ps-1 pe-1"> HRM Management</span></span>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <button class="accordion-button collapsed footer_menu" data-bs-toggle="collapse" data-bs-target="#hrm_footerMenu" aria-expanded="false" aria-controls="hrm_footerMenu">
                <span class="prod_font pt-1">
                    <i class="fa-solid fa-down-long fa-beat" data-bs-toggle="tooltip" data-bs-placement="right" title="Open Prodcut Menu"></i>
                </span>
                <a class="nav-link collapsed sals_menu" id="hrmMenu" data-bs-toggle="collapse" data-bs-target="#hrm_" aria-expanded="false" aria-controls="collapsePages">
                    <span class="prod_label footer_menu ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Click" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'> HRM</span>
                </a>
            </button>
            <div id="hrm_footerMenu" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body sub_box">

                    <!-- ================== HRM ======================= -->
                    <span class="lock ps-2 pe-2" id="hm_lock">Lock</span><span class="unlock ps-1 pe-1" id="hm_unlock">Unlock</span><br>
                    @include('backend.layouts.layouts-components.partial-submenu-hrm._hrm-submenu')
                </div>
            </div>
        </div>
    </div>
    <!-- ============= AUTH-Moduel ===================== -->
    <span class="purchases_moduel"><span class="link_menus"><i class="fa-solid fa-link fa-beat-fade"></i></span> <span class="moduel_label ps-1 pe-1"> Auth</span></span>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <button class="accordion-button collapsed footer_menu" data-bs-toggle="collapse" data-bs-target="#auth_footerMenu" aria-expanded="false" aria-controls="auth_footerMenu">
                <span class="prod_font pt-1">
                    <i class="fa-solid fa-down-long fa-beat" data-bs-toggle="tooltip" data-bs-placement="right" title="Open Prodcut Menu"></i>
                </span>
                <a class="nav-link collapsed sals_menu" id="authMenu" data-bs-toggle="collapse" data-bs-target="#auth_" aria-expanded="false" aria-controls="collapsePages">
                    <span class="prod_label footer_menu ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Click" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'> Auth</span>
                </a>
            </button>
            <div id="auth_footerMenu" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body sub_box">

                    <!-- ================== HRM ======================= -->
                    <span class="lock ps-2 pe-2" id="ath_lock">Lock</span><span class="unlock ps-1 pe-1" id="ath_unlock">Unlock</span><br>
                    @include('backend.layouts.layouts-components.partial-submenu-auth._auth-submenu')
                </div>
            </div>
        </div>
    </div>
    
    <!-- ============= Components-Moduel ===================== -->
    <span class="purchases_moduel"><span class="link_menus"><i class="fa-solid fa-link fa-beat-fade"></i></span> <span class="moduel_label ps-1 pe-1"> Components</span></span>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <button class="accordion-button collapsed footer_menu" data-bs-toggle="collapse" data-bs-target="#compnents_footerMenu" aria-expanded="false" aria-controls="compnents_footerMenu">
                <span class="prod_font pt-1">
                    <i class="fa-solid fa-down-long fa-beat" data-bs-toggle="tooltip" data-bs-placement="right" title="Open Prodcut Menu"></i>
                </span>
                <a class="nav-link collapsed sals_menu" id="componentsMenu" data-bs-toggle="collapse" data-bs-target="#components_" aria-expanded="false" aria-controls="collapsePages">
                    <span class="prod_label footer_menu ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Click" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'> Components</span>
                </a>
            </button>
            <div id="compnents_footerMenu" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body sub_box">

                    <!-- ================== HRM ======================= -->
                    <span class="lock ps-2 pe-2" id="compo_lock">Lock</span><span class="unlock ps-1 pe-1" id="compo_unlock">Unlock</span><br>
                    @include('backend.layouts.layouts-components.partial-submenu-components._components-submenu')
                </div>
            </div>
        </div>
    </div>
    
</div>
<div class="modal-footer menu_footer">
    <a type="button" class="btn btn-sm text-danger modal_button menu_btn" data-bs-dismiss="modal">Cancel</a>
</div>