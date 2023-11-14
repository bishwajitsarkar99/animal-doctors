<div class="modal-header admin_modal_header themesetting_modal_header">
    <span class="filip"><i class="me-1" id="thmsetting_filip"></i></span>
    <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel">
        Theme Setting
    </h5>

    <button type="button" class="btn-close btn-btn-sm" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-palacement="right" title="Close">
    </button>
</div>
<div class="modal-body admin_modal_body themesettingFont">
    <!-- Theme Background Color -->
    <div class="card form-control form-control-sm mb-2 them_color" id="themSetting">
        <span class="sb-sidenav-collapse-arrow" id="orders_part" data-bs-toggle="tooltip" data-bs-placement="top" title="Color Components">
            <p class="form-check form-switch order_area themebar mt-3">
                <input class="form-check-input ordrs" type="checkbox" id="themeColor" data-bs-toggle="collapse" href="#collapseExample_" role="button" aria-expanded="false" aria-controls="collapseExample">
                <span class="lab_sidebar ps-2 pe-2">Dashboard Setting Mode :</span>
                <label class="form-check-label" for="collapseExample"><span class="smy">
                    <span><span class=""></span><span class="of_switch_theme pt-1 pb-1 marg color_showup">off</span></span>
                    <span class=""></span><span class="on_switch_theme pt-1 pb-1 marg">on</span></span>
                </label>
            </p>
            <span class="ps-1 ms-5">
                <div class="theme_bg_loader ms-5" id="theme_bg_loader"></div>
            </span>
        </span>

    </div>
    @include('backend.layouts.layouts-components.modal-components.theme-setting-components._theme-bg')

    <!-- Form Setting -->
    <div class="card form-control form-control-sm mb-2 them_color" id="themSetting">
        <span class="sb-sidenav-collapse-arrow" id="orders_part" data-bs-toggle="tooltip" data-bs-placement="top" title="Form Components">
            <p class="form-check form-switch order_area themebar mt-3">
                <input class="form-check-input ordrs" type="checkbox" id="formSettings" data-bs-toggle="collapse" href="#formComponent" role="button" aria-expanded="false" aria-controls="collapseExample">
                <span class="lab_sidebar ps-2 pe-2">Form Setting Mode :</span>
                <label class="form-check-label" for="collapseExample"><span class="smy">
                    <span><span class=""></span><span class="of_switch_theme_form pt-1 pb-1 marg color_showup">off</span></span>
                    <span class=""></span><span class="on_switch_theme_form pt-1 pb-1 marg">on</span></span>
                </label>
            </p>
            <span class="ps-1 ms-5">
                <div class="theme_form_loader ms-5" id="theme_form_loader"></div>
            </span>
        </span>

    </div>
    @include('backend.layouts.layouts-components.modal-components.theme-setting-components.form-setting._themeformSetting')
    <!-- Table Setting -->
    <div class="card form-control form-control-sm mb-2 them_color" id="themSetting">
        <span class="sb-sidenav-collapse-arrow" id="orders_part" data-bs-toggle="tooltip" data-bs-placement="top" title="Table Components">
            <p class="form-check form-switch order_area themebar mt-3">
                <input class="form-check-input ordrs" type="checkbox" id="tableSettings" data-bs-toggle="collapse" href="#tableComponent" role="button" aria-expanded="false" aria-controls="collapseExample">
                <span class="lab_sidebar ps-2 pe-2">Table Setting Mode :</span>
                <label class="form-check-label" for="collapseExample"><span class="smy">
                    <span><span class=""></span><span class="of_switch_theme_table pt-1 pb-1 marg color_showup">off</span></span>
                    <span class=""></span><span class="on_switch_theme_table pt-1 pb-1 marg">on</span></span>
                </label>
            </p>
            <span class="ps-1 ms-5">
                <div class="theme_table_loader ms-5" id="theme_table_loader"></div>
            </span>
        </span>
    </div>
    @include('backend.layouts.layouts-components.modal-components.theme-setting-components.table-setting._themetableSetting')

    <!-- Theme Demo -->
    <div class="card form-control form-control-sm them_color" id="themSetting1">
        <span class="sb-sidenav-collapse-arrow" id="orders_part" data-bs-toggle="tooltip" data-bs-placement="right" title="Resize Components">
            <p class="form-check form-switch order_area themebar mt-3">
                <input class="form-check-input ordrs" type="checkbox" id="themeResize" data-bs-toggle="collapse" href="#theme_resize_setting" role="button" aria-expanded="false" aria-controls="collapseExample">
                <span class="lab_sidebar ps-2 pe-2">Demo Setting Mode :</span>
                <label class="form-check-label" for="collapseExample"><span class="smy">
                    <span><span class=""></span><span class="of_switch_theme_resize pt-1 pb-1 marg color_showup">off</span></span>
                    <span class=""></span><span class="on_switch_theme_resize pt-1 pb-1 marg">on</span></span>
                </label>
            </p>
            <span class="ps-1 ms-5">
                <div class="theme_resize_loader ms-5" id="theme_resize_loader"></div>
            </span>
        </span>

    </div>
    @include('backend.layouts.layouts-components.modal-components.theme-setting-components._theme-resize')

</div>
<div class="modal-footer admin_modal_footer themesetting_modal_footer">
    <button type="button" class="btn btn-danger modal_button" data-bs-dismiss="modal">Cancel</button>
</div>